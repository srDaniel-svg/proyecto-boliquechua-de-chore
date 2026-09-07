<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Memoria - BOLIQUECHUA</title>
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    (function() {
        var theme = localStorage.getItem('boliquechua_theme') || 'dark';
        document.documentElement.setAttribute('data-theme', theme);
    })();
</script>
<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700;900&family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<style>
  :root {
      --pri: #E8450A;
      --pri-dk: #9B2D06;
      --gold: #F5A623;
      --gold-dk: #b38b18;
      --bg: #0D0704;
      --card: #1E0E06;
      --text: #F0DCC0;
      --muted: #A07050;
      --border: rgba(232,100,10,0.15);
  }

  html[data-theme="light"] {
      --bg: #f5f0e6;
      --card: #ffffff;
      --text: #2b1c14;
      --muted: #8b7355;
      --border: rgba(232,100,10,0.2);
  }

  body {
    font-family: 'Nunito', sans-serif;
    background-color: var(--bg);
    color: var(--text);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }

  #app-container {
    width: 100%;
    max-width: 500px;
    background-color: var(--card);
    border-radius: 24px;
    padding: 20px;
    box-sizing: border-box;
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    display: flex;
    flex-direction: column;
    text-align: center;
    border: 1px solid var(--border);
  }

  .top-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
  }

  .back-btn {
      background: rgba(255,255,255,0.05);
      border: 1px solid var(--border);
      border-radius: 50%;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text);
      cursor: pointer;
      text-decoration: none;
      font-weight: bold;
      font-size: 20px;
      transition: 0.2s;
  }
  .back-btn:hover {
      background: var(--pri);
      color: white;
  }

  .header {
    font-family: 'Rajdhani', sans-serif;
    font-size: 28px;
    font-weight: 900;
    color: var(--gold);
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 20px;
  }

  .tarjeta {
    height: 120px;
    perspective: 1000px;
    cursor: pointer;
    user-select: none;
  }

  .tarjeta:not(.volteada):not(.resuelta):active .tarjeta-front {
    transform: translateY(4px);
    border-bottom-width: 2px;
  }

  .tarjeta-inner {
    position: relative;
    width: 100%;
    height: 100%;
    transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    transform-style: preserve-3d;
  }

  .tarjeta.volteada .tarjeta-inner,
  .tarjeta.resuelta .tarjeta-inner {
    transform: rotateY(180deg);
  }

  .tarjeta-front, .tarjeta-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 16px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 16px;
    font-weight: 800;
    box-sizing: border-box;
    padding: 10px;
    text-align: center;
    word-break: break-word;
  }

  .tarjeta-front {
    background-color: var(--pri);
    border: none;
    border-bottom: 6px solid var(--pri-dk);
    transition: transform 0.1s, border-bottom-width 0.1s;
  }

  .signo-img {
    width: 60px;
    height: 60px;
    object-fit: contain;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
  }

  .tarjeta-back {
    background-color: var(--card);
    border: 2px solid var(--border);
    border-bottom: 6px solid var(--border);
    transform: rotateY(180deg);
    color: var(--text);
  }

  .tarjeta.resuelta .tarjeta-back {
    background-color: rgba(245, 166, 35, 0.15);
    border-color: var(--gold);
    border-bottom-color: var(--gold-dk);
    color: var(--gold);
  }

  .btn-reset {
    width: 100%;
    height: 50px;
    border-radius: 16px;
    border: none;
    font-size: 18px;
    font-family: 'Rajdhani', sans-serif;
    font-weight: 900;
    letter-spacing: 1px;
    color: white;
    cursor: pointer;
    background-color: var(--pri);
    box-shadow: 0 6px 0 var(--pri-dk);
    transition: transform 0.1s;
  }
  .btn-reset:active {
    transform: translateY(6px);
    box-shadow: 0 0px 0 transparent;
  }
</style>
</head>
<body>

<div id="app-container">
  <div class="top-bar">
      <a href="{{ route('categorias') }}" class="back-btn">✕</a>
      <div class="header">Memoria</div>
      <div style="width: 40px;"></div>
  </div>
  
  <div class="grid" id="tablero"></div>
  <button class="btn-reset" onclick="iniciarJuego()">REINICIAR</button>
</div>

<div id="modal-felicidades" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.85); z-index: 1000; align-items: center; justify-content: center; flex-direction: column; text-align: center; padding: 20px;">
    <h2 style="font-family: 'Rajdhani', sans-serif; font-size: clamp(2.5em, 8vw, 4em); font-weight: 900; color: var(--gold); text-shadow: 0 0 20px var(--pri); margin-bottom: 10px;">¡Felicidades!</h2>
    <p style="font-size: clamp(1.2em, 4vw, 1.8em); color: white; margin-bottom: 30px;">¡Ganaste 1 corazón! ❤️</p>
    <button onclick="window.location.href='{{ route('categorias') }}'" class="btn-reset" style="width: 200px;">Volver</button>
</div>

<script>
  // Palabras obtenidas desde el backend
  const paresDB = @json($pares);
  
  // Mapear al formato que necesita el juego
  let pares = paresDB.map(p => {
      return {
          id: p.id,
          texto: p.texto
      };
  });

  let tablero = document.getElementById('tablero');
  let cartasVolteadas = [];
  let bloqueo = false;
  let paresEncontrados = 0;
  
  const iconoSrc = "{{ asset('nuevo icono.png') }}";

  function barajar(array) {
    return array.sort(() => Math.random() - 0.5);
  }

  function iniciarJuego() {
    tablero.innerHTML = '';
    cartasVolteadas = [];
    bloqueo = false;
    paresEncontrados = 0;
    
    let cartasMezcladas = barajar([...pares]);

    cartasMezcladas.forEach((carta) => {
      let elemento = document.createElement('div');
      elemento.classList.add('tarjeta');
      elemento.dataset.id = carta.id;
      
      elemento.innerHTML = `
        <div class="tarjeta-inner">
          <div class="tarjeta-front">
            <img src="${iconoSrc}" class="signo-img" alt="Icono">
          </div>
          <div class="tarjeta-back">
            <span>${carta.texto}</span>
          </div>
        </div>
      `;

      elemento.addEventListener('click', () => voltearCarta(elemento));
      tablero.appendChild(elemento);
    });
  }

  function voltearCarta(carta) {
    if (bloqueo || carta.classList.contains('volteada') || carta.classList.contains('resuelta')) return;

    carta.classList.add('volteada');
    cartasVolteadas.push(carta);

    if (cartasVolteadas.length === 2) {
      bloqueo = true;
      verificarPar();
    }
  }

  function verificarPar() {
    let [carta1, carta2] = cartasVolteadas;

    if (carta1.dataset.id === carta2.dataset.id) {
      carta1.classList.replace('volteada', 'resuelta');
      carta2.classList.replace('volteada', 'resuelta');
      paresEncontrados++;
      resetearTurno();

      if (paresEncontrados === paresDB.length / 2) {
        setTimeout(() => {
            // Lanza confeti
            confetti({
              particleCount: 150,
              spread: 70,
              origin: { y: 0.6 }
            });

            // Muestra mensaje
            document.getElementById('modal-felicidades').style.display = 'flex';

            // Gana un corazón en backend
            fetch('{{ route('ganar.vida') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });
        }, 500);
      }
    } else {
      setTimeout(() => {
        carta1.classList.remove('volteada');
        carta2.classList.remove('volteada');
        resetearTurno();
      }, 1000);
    }
  }

  function resetearTurno() {
    cartasVolteadas = [];
    bloqueo = false;
  }

  iniciarJuego();
</script>

</body>
</html>
