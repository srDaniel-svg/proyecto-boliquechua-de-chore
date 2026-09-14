# Rimasun 🎙️ — Aprende quechua escuchando tu propia voz

Juego estilo Duolingo (corazones, XP, racha, progreso por unidad) donde en
vez de escribir o elegir opciones, **hablas al micrófono**. Mientras grabas,
ves una forma de onda animada como la de una nota de voz de WhatsApp; al
soltar, la grabación queda "congelada" en una burbuja reproducible, igual
que en WhatsApp.

## Cómo corregir tu pronunciación (tres capas, de mejor a peor esfuerzo)

1. **Modelo real de quechua** — [`ivangtorre/wav2vec2-xlsr-300m-quechua`]
   (https://huggingface.co/ivangtorre/wav2vec2-xlsr-300m-quechua), afinado
   con el dataset de AmericasNLP 2022 para quechua sureño. Transcribe de
   verdad tu audio y el servidor compara el texto contra la palabra
   esperada para calcular el % de coincidencia. Se descarga solo (una vez,
   ~1.2 GB) la primera vez que arrancas el servidor y necesita internet
   ese primer momento; después funciona sin conexión.
2. **Respaldo en español** — si el modelo de quechua no cargó (falta
   `torch`, falta `ffmpeg`, sin internet la primera vez, etc.), el
   servidor intenta una transcripción aproximada en español con la API
   gratuita de Google vía `SpeechRecognition`, solo como pista.
3. **Heurístico local** — si tampoco hay servidor disponible (por
   ejemplo, abriste el HTML sin correr `app.py`), el navegador mide
   duración y volumen de tu grabación. Es la señal más débil, pero el
   juego nunca se queda trabado esperando algo que no va a llegar.

El juego siempre intenta la capa 1 primero y va bajando automáticamente;
no necesitas configurar nada para que funcione, solo instalar las
dependencias de abajo si quieres la verificación real.

## Cómo correrlo

```bash
cd quechua_app
pip install -r requirements.txt
# torch pesa bastante; si quieres la versión CPU explícita (más liviana):
pip install torch --index-url https://download.pytorch.org/whl/cpu
python app.py
```

Además necesitas **ffmpeg** instalado en el sistema (no es un paquete de
pip, lo usa `pydub` para convertir el audio del navegador):
- Ubuntu/Debian: `sudo apt install ffmpeg`
- macOS: `brew install ffmpeg`
- Windows: descárgalo de ffmpeg.org y agrégalo al PATH

Abre **http://localhost:5000** en Chrome o Firefox. El navegador pedirá
permiso de micrófono — acéptalo (por seguridad, el micrófono solo funciona
en `localhost` o en sitios con HTTPS, así que ábrelo tal cual, sin
`file://`). La primera grabación puede tardar uno o dos minutos mientras
el servidor descarga y carga el modelo de quechua en segundo plano;
mientras tanto el juego sigue funcionando con las capas de respaldo.

## Si no quieres instalar el modelo de quechua

No pasa nada: simplemente no instales `torch`/`transformers`, o bórralos
de `requirements.txt`. El servidor detecta que no están disponibles y usa
automáticamente el respaldo en español o el heurístico local.

## Editar el vocabulario

Las unidades y palabras están en el arreglo `UNITS` al inicio del
`<script>` en `templates/index.html`. Cada palabra es:

```js
{ q: "Sulpayki", ph: "sul-PAY-ki", es: "Gracias" }
```

Agrega tantas unidades y palabras como quieras siguiendo ese formato.

## Estructura

```
quechua_app/
├── app.py                 # Servidor Flask + verificación en 3 capas
├── requirements.txt
├── templates/
│   └── index.html         # Interfaz completa (HTML + CSS + JS)
└── README.md
```

