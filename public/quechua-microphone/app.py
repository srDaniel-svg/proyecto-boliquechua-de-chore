"""
Rimasun - Aprende Quechua escuchando tu propia voz
====================================================
Servidor Flask que sirve la interfaz del juego y verifica tu pronunciación
en tres capas, de mejor a peor esfuerzo:

  1. MODELO DE QUECHUA (ivangtorre/wav2vec2-xlsr-300m-quechua, Hugging Face)
     Transcribe de verdad el audio en quechua sureño y compara el texto
     contra la palabra esperada. Es la verificación "real". Requiere
     torch + transformers + ffmpeg instalados (ver requirements.txt) y
     conexión a internet solo la primera vez, para descargar el modelo
     (~1.2 GB). Después funciona sin conexión.

  2. RESPALDO EN ESPAÑOL (SpeechRecognition + API gratuita de Google)
     Si el modelo de quechua no se pudo cargar (falta torch, falta
     ffmpeg, etc.), se intenta una transcripción aproximada en español
     como pista adicional. Requiere internet.

  3. HEURÍSTICO DE AUDIO (en el navegador, dentro de index.html)
     Si ninguna de las dos anteriores está disponible, el navegador mide
     duración y volumen de tu grabación. Es la señal más débil, pero
     nunca rompe el juego.

Cómo correrlo:
    pip install -r requirements.txt
    python app.py
Luego abre http://localhost:5000 (el navegador pedirá permiso de
micrófono: acéptalo). La primera vez que grabes algo, la descarga y
carga del modelo de quechua puede tardar uno o dos minutos.
"""

from flask import Flask, render_template, request, jsonify
import base64
import difflib
import os
import tempfile
import threading
import unicodedata

app = Flask(__name__)

# ---------------------------------------------------------------------
# Capa 1: modelo de quechua (carga perezosa, en segundo plano)
# ---------------------------------------------------------------------
QUECHUA_MODEL_NAME = "ivangtorre/wav2vec2-xlsr-300m-quechua"

quechua_state = {
    "status": "not_loaded",   # not_loaded | loading | ready | unavailable
    "processor": None,
    "model": None,
    "error": None,
}
_quechua_lock = threading.Lock()


def _load_quechua_model():
    """Carga el modelo en un hilo aparte para no bloquear el servidor."""
    with _quechua_lock:
        if quechua_state["status"] in ("loading", "ready"):
            return
        quechua_state["status"] = "loading"

    try:
        import torch  # noqa: F401
        from transformers import Wav2Vec2ForCTC, Wav2Vec2Processor

        processor = Wav2Vec2Processor.from_pretrained(QUECHUA_MODEL_NAME)
        model = Wav2Vec2ForCTC.from_pretrained(QUECHUA_MODEL_NAME)
        model.eval()

        quechua_state["processor"] = processor
        quechua_state["model"] = model
        quechua_state["status"] = "ready"
    except Exception as exc:  # falta torch/transformers, sin internet, etc.
        quechua_state["status"] = "unavailable"
        quechua_state["error"] = str(exc)


def ensure_quechua_model_loading():
    """Dispara la carga del modelo la primera vez que se necesita."""
    if quechua_state["status"] == "not_loaded":
        threading.Thread(target=_load_quechua_model, daemon=True).start()


# ---------------------------------------------------------------------
# Capa 2: SpeechRecognition (español, opcional)
# ---------------------------------------------------------------------
try:
    import speech_recognition as sr
    SR_AVAILABLE = True
except ImportError:
    SR_AVAILABLE = False


# ---------------------------------------------------------------------
# Utilidades de audio y comparación de texto
# ---------------------------------------------------------------------
def _decode_audio_to_wav(audio_bytes, wav_path):
    """Convierte el blob (normalmente audio/webm del navegador) a WAV
    mono de 16kHz, el formato que espera el modelo de quechua."""
    from pydub import AudioSegment

    with tempfile.NamedTemporaryFile(suffix=".webm", delete=False) as tmp_in:
        tmp_in.write(audio_bytes)
        tmp_in_path = tmp_in.name

    try:
        audio = AudioSegment.from_file(tmp_in_path)
        audio = audio.set_frame_rate(16000).set_channels(1)
        audio.export(wav_path, format="wav")
    finally:
        os.remove(tmp_in_path)


def _normalize_text(text):
    """Minúsculas y sin tildes, para comparar de forma tolerante."""
    text = text.strip().lower()
    text = "".join(
        c for c in unicodedata.normalize("NFD", text)
        if unicodedata.category(c) != "Mn"
    )
    return text


def _similarity_score(expected, heard):
    """0-100: qué tan parecido es lo transcrito a la palabra esperada."""
    if not heard:
        return 0
    a, b = _normalize_text(expected), _normalize_text(heard)
    ratio = difflib.SequenceMatcher(None, a, b).ratio()
    return round(ratio * 100)


def _transcribe_with_quechua_model(wav_path):
    import soundfile as sf
    import torch
    import torch.nn.functional as F

    processor = quechua_state["processor"]
    model = quechua_state["model"]

    wav, sample_rate = sf.read(wav_path, dtype="float32")
    feats = torch.from_numpy(wav).float()
    with torch.no_grad():
        feats = F.layer_norm(feats, feats.shape)
        feats = torch.unsqueeze(feats, 0)
        logits = model(feats).logits
    predicted_ids = torch.argmax(logits, dim=-1)
    transcription = processor.batch_decode(predicted_ids)[0]
    return transcription


# ---------------------------------------------------------------------
# Rutas
# ---------------------------------------------------------------------
@app.route("/")
def index():
    ensure_quechua_model_loading()  # empieza a cargar el modelo desde ya
    return render_template("index.html")


@app.route("/api/model-status")
def model_status():
    """El frontend consulta esto para saber si ya puede usar el modelo
    de quechua o si debe apoyarse en el heurístico local mientras tanto."""
    return jsonify({
        "status": quechua_state["status"],
        "error": quechua_state["error"] if quechua_state["status"] == "unavailable" else None,
    })


@app.route("/api/check", methods=["POST"])
def check_pronunciation():
    data = request.get_json(silent=True) or {}
    audio_b64 = data.get("audio")
    expected = (data.get("expected") or "").strip()

    if not audio_b64:
        return jsonify({"ok": False, "reason": "No llegó audio."}), 400

    try:
        audio_bytes = base64.b64decode(audio_b64.split(",")[-1])
    except Exception:
        return jsonify({"ok": False, "reason": "Audio inválido."}), 400

    fallback_reason = None

    # --- Capa 1: modelo de quechua ---
    if quechua_state["status"] == "ready":
        wav_path = None
        try:
            wav_path = tempfile.mktemp(suffix=".wav")
            _decode_audio_to_wav(audio_bytes, wav_path)
            heard = _transcribe_with_quechua_model(wav_path)
            score = _similarity_score(expected, heard) if expected else None
            return jsonify({
                "ok": True,
                "engine": "quechua",
                "heard": heard,
                "score": score,
            })
        except Exception as exc:
            # Si algo falla en tiempo de ejecución (ffmpeg ausente, audio
            # corrupto, etc.) caemos al respaldo en vez de romper el juego.
            fallback_reason = f"Fallo el modelo de quechua: {exc}"
        finally:
            if wav_path and os.path.exists(wav_path):
                os.remove(wav_path)
    elif quechua_state["status"] in ("not_loaded", "loading"):
        ensure_quechua_model_loading()
        fallback_reason = "El modelo de quechua todavía se está cargando."
    else:
        fallback_reason = quechua_state["error"] or "Modelo de quechua no disponible."

    # --- Capa 2: respaldo en español ---
    if SR_AVAILABLE:
        tmp_path = None
        try:
            recognizer = sr.Recognizer()
            with tempfile.NamedTemporaryFile(suffix=".wav", delete=False) as tmp:
                tmp_path = tmp.name
            _decode_audio_to_wav(audio_bytes, tmp_path)
            with sr.AudioFile(tmp_path) as source:
                audio = recognizer.record(source)
            heard = recognizer.recognize_google(audio, language="es-PE")
            return jsonify({
                "ok": True,
                "engine": "spanish_fallback",
                "heard": heard,
                "score": None,  # no comparamos texto quechua vs. transcripción en español
                "note": fallback_reason,
            })
        except sr.UnknownValueError:
            return jsonify({"ok": True, "engine": "spanish_fallback", "heard": None,
                             "score": None, "note": fallback_reason})
        except Exception as exc:
            return jsonify({"ok": False, "reason": f"{fallback_reason} / respaldo también falló: {exc}"})
        finally:
            if tmp_path and os.path.exists(tmp_path):
                os.remove(tmp_path)

    # --- Sin ninguna capa de servidor disponible ---
    return jsonify({"ok": False, "reason": fallback_reason})


if __name__ == "__main__":
    app.run(debug=True, port=5000)
