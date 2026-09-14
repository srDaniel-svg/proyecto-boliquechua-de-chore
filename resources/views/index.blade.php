<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>BOLIQUECHUA - Aprende Quechua</title>
    <script>
        (function() {
            var theme = localStorage.getItem('boliquechua_theme') || 'dark';
            document.documentElement.setAttribute('data-theme', theme);
        })();
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700;800&family=Nunito:wght@600;700;800;900&family=Creepster&family=Eater&family=Pacifico&display=swap" rel="stylesheet">
    <style>
        /* ============================
           BOLIQUECHUA · Futurista Andino
           Reemplazo total de CSS (mantiene IDs/clases existentes)
           ============================ */

        :root {
            --pri: #ff4a10;
            --pri-dk: #b12d07;
            --pri-lt: #ff7a3e;
            --gold: #ffd166;
            --teal: #00e6c3;
            --purple: #a66bff;
            --blue: #4bb3ff;

            --bg0: #050202;
            --bg1: #0a0503;
            --card: rgba(255, 244, 230, 0.04);
            --card2: rgba(255, 244, 230, 0.06);
            --text: #f3e6d3;
            --muted: rgba(243, 230, 211, 0.62);
            --muted2: rgba(243, 230, 211, 0.46);

            --border: rgba(255, 74, 16, 0.18);
            --border2: rgba(255, 209, 102, 0.14);

            --shadow: 0 18px 60px rgba(0, 0, 0, 0.55);
            --shadow2: 0 10px 30px rgba(0, 0, 0, 0.35);

            --r-lg: 22px;
            --r-md: 16px;
            --r-sm: 12px;

            --ease: cubic-bezier(.22, 1, .36, 1);
        }

        html[data-theme="light"] {
            --bg0: #fdfbf7;
            --bg1: #f3eee6;
            --card: rgba(0, 0, 0, 0.04);
            --card2: rgba(0, 0, 0, 0.08);
            --text: #2b1c14;
            --muted: rgba(43, 28, 20, 0.7);
            --muted2: rgba(43, 28, 20, 0.5);
            --border: rgba(255, 74, 16, 0.3);
            --border2: rgba(255, 209, 102, 0.4);
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --shadow2: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        html[data-theme="light"] body {
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 74, 16, 0.12), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 230, 195, 0.1), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(255, 209, 102, 0.15), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #e9e1d5);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        html, body { height: 100%; }
        body {
            font-family: 'Nunito', system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            color: var(--text);
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 74, 16, 0.20), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 230, 195, 0.14), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(255, 209, 102, 0.14), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #040101);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
            text-rendering: geometricPrecision;
        }

        /* Accesibilidad */
        :focus-visible {
            outline: 2px solid rgba(255, 209, 102, 0.85);
            outline-offset: 3px;
            border-radius: 10px;
        }
        @media (prefers-reduced-motion: reduce) {
            * { animation-duration: 0.001ms !important; animation-iteration-count: 1 !important; transition-duration: 0.001ms !important; scroll-behavior: auto !important; }
        }

        /* ====== SPLASH ====== */
        #splash {
            position: fixed;
            inset: 0;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: radial-gradient(850px 520px at 50% 30%, rgba(255, 74, 16, 0.18), transparent 62%),
                        radial-gradient(900px 600px at 42% 68%, rgba(255, 209, 102, 0.10), transparent 65%),
                        linear-gradient(180deg, #050202, #0a0503 55%, #050202);
        }

        #splash::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.06) 1px, transparent 1px);
            background-size: 42px 42px;
            opacity: 0.75;
            mask-image: radial-gradient(circle at 50% 40%, black 0 45%, transparent 70%);
            animation: gridPulse 3.2s ease-in-out infinite;
        }

        #splash::after {
            content: '';
            position: absolute;
            inset: -2px;
            background:
                radial-gradient(900px 520px at 50% 35%, rgba(0, 230, 195, 0.08), transparent 65%),
                radial-gradient(1200px 900px at 50% 100%, rgba(255, 209, 102, 0.08), transparent 55%);
            pointer-events: none;
            filter: blur(0.2px);
        }

        @keyframes gridPulse { 0%,100%{opacity:.55} 50%{opacity:1} }

        .radar-rings {
            position: absolute;
            width: min(780px, 92vw);
            height: min(780px, 92vw);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.95;
        }

        .ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 74, 16, 0.20);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ringPulse 3.6s ease-out infinite;
            box-shadow: 0 0 36px rgba(255, 74, 16, 0.08) inset;
        }

        .ring:nth-child(1){width:110px;height:110px;animation-delay:0s}
        .ring:nth-child(2){width:240px;height:240px;animation-delay:.32s}
        .ring:nth-child(3){width:390px;height:390px;animation-delay:.64s}
        .ring:nth-child(4){width:540px;height:540px;animation-delay:.96s}
        .ring:nth-child(5){width:690px;height:690px;animation-delay:1.28s}

        @keyframes ringPulse {
            0%{opacity:0;transform:translate(-50%,-50%) scale(.86)}
            34%{opacity:1}
            100%{opacity:0;transform:translate(-50%,-50%) scale(1.06)}
        }

        .chakana-bg {
            position: absolute;
            width: min(420px, 80vw);
            height: min(420px, 80vw);
            opacity: .07;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            filter: drop-shadow(0 0 50px rgba(255, 74, 16, 0.20));
            animation: chakSpin 24s linear infinite;
        }

        @keyframes chakSpin {
            from{transform:translate(-50%,-50%) rotate(0)}
            to  {transform:translate(-50%,-50%) rotate(360deg)}
        }

        .sp-cont { position: absolute; inset: 0; pointer-events: none; }
        .sp { position: absolute; border-radius: 50%; opacity: 0; animation: spUp linear infinite; }
        @keyframes spUp {
            0%{opacity:0;transform:translateY(0) scale(1)}
            8%{opacity:1}
            88%{opacity:.85}
            100%{opacity:0;transform:translateY(-110vh) scale(.15)}
        }

        .splash-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 0 18px;
            animation: sReveal .85s var(--ease) .35s both;
        }

        @keyframes sReveal {
            from{opacity:0;transform:translateY(34px) scale(.92);filter:blur(1.5px)}
            to  {opacity:1;transform:translateY(0) scale(1);filter:blur(0)}
        }

        .splash-llama {
            width: clamp(92px, 13vw, 118px);
            height: clamp(92px, 13vw, 118px);
            margin: 0 auto 18px;
            display: block;
            animation: llamaFloat 2.1s ease-in-out infinite;
            filter: drop-shadow(0 0 26px rgba(255, 74, 16, .75));
        }

        @keyframes llamaFloat { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-12px)} }

        .splash-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(2.35em, 7.4vw, 4.15em);
            font-weight: 800;
            letter-spacing: clamp(5px, 1.2vw, 10px);
            color: #fff;
            text-transform: uppercase;
            line-height: 1;
            text-shadow: 0 0 34px rgba(255, 74, 16, .55);
        }
        .splash-title span { color: var(--gold); text-shadow: 0 0 34px rgba(255, 209, 102, .55); }

        .splash-sub {
            font-family: 'Rajdhani', sans-serif;
            font-size: .92em;
            letter-spacing: 6px;
            color: rgba(255,255,255,.38);
            text-transform: uppercase;
            margin-top: 10px;
        }

        .s-lines {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 14px;
            margin: 28px 0;
            animation: sReveal .85s var(--ease) .65s both;
        }

        .s-line { height: 1px; width: min(110px, 24vw); background: linear-gradient(90deg, transparent, rgba(255, 74, 16, .85), transparent); }
        .s-dia  { width: 10px; height: 10px; background: var(--gold); transform: rotate(45deg); box-shadow: 0 0 16px rgba(255, 209, 102, .6); }

        .splash-welcome { position: relative; z-index: 2; text-align: center; animation: sReveal .85s var(--ease) .95s both; }
        .sw-lbl { font-family:'Rajdhani',sans-serif;font-size:1em;letter-spacing:5px;color:rgba(255,255,255,.42);text-transform:uppercase; }
        .sw-name { font-family:'Rajdhani',sans-serif;font-size:1.85em;font-weight:700;letter-spacing:3px;color:#fff;text-shadow:0 0 18px rgba(255, 209, 102, .35); }

        .splash-loader { position: relative; z-index: 2; width: 240px; margin-top: 34px; animation: sReveal .85s var(--ease) 1.15s both; }
        .l-track { height: 3px; background: rgba(255,255,255,.09); border-radius: 99px; overflow: hidden; }
        .l-bar {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, var(--pri), var(--gold));
            border-radius: 99px;
            box-shadow: 0 0 18px rgba(255, 74, 16, .45);
            animation: lBar 2.55s var(--ease) 1.35s forwards;
        }
        @keyframes lBar { 0%{width:0%} 55%{width:74%} 100%{width:100%} }
        .l-pct { font-family:'Rajdhani',sans-serif;font-size:.8em;letter-spacing:2px;color:rgba(255,255,255,.30);text-align:right;margin-top:7px; }

        .splash-exit { animation: sOut .62s cubic-bezier(.4,0,1,1) forwards; }
        @keyframes sOut { 0%{opacity:1;transform:scale(1)} 100%{opacity:0;transform:scale(1.04);filter:blur(1px)} }

        /* ====== GAME LOADER ====== */
        #gameLoader {
            position: fixed;
            inset: 0;
            z-index: 8000;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(180deg, #050202, #0a0503 60%, #050202);
        }
        #gameLoader.show { display: flex; }
        #gameLoader::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            animation: gridPulse 3.2s ease-in-out infinite;
            opacity: 0.9;
            mask-image: radial-gradient(circle at 50% 50%, black 0 50%, transparent 78%);
        }
        .gl-rings { position:absolute;width:min(520px,92vw);height:min(520px,92vw);top:50%;left:50%;transform:translate(-50%,-50%); }
        .gl-ring {
            position: absolute;
            border-radius: 50%;
            border: 1px solid rgba(255, 74, 16, 0.22);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: ringPulse 3.1s ease-out infinite;
        }
        .gl-ring:nth-child(1){width:86px;height:86px;animation-delay:0s}
        .gl-ring:nth-child(2){width:190px;height:190px;animation-delay:.28s}
        .gl-ring:nth-child(3){width:318px;height:318px;animation-delay:.56s}
        .gl-ring:nth-child(4){width:446px;height:446px;animation-delay:.84s}
        .gl-content { position: relative; z-index: 2; text-align: center; padding: 0 18px; }
        .gl-icon { width: 84px; height: 84px; margin: 0 auto 16px; filter: drop-shadow(0 0 20px rgba(255, 74, 16, .70)); animation: llamaFloat 2s ease-in-out infinite; }
        .gl-title { font-family:'Rajdhani',sans-serif;font-size:clamp(1.4em,4vw,2.2em);font-weight:700;letter-spacing:5px;color:#fff;text-transform:uppercase;text-shadow:0 0 22px rgba(255, 74, 16, .45); }
        .gl-sub { font-family:'Rajdhani',sans-serif;font-size:.82em;letter-spacing:4px;color:rgba(255,255,255,.35);text-transform:uppercase;margin-top:6px; }
        .gl-bar-wrap { width: 200px; margin-top: 28px; }
        .gl-track { height: 3px; background: rgba(255,255,255,.09); border-radius: 99px; overflow: hidden; }
        .gl-bar { height: 100%; width: 0%; background: linear-gradient(90deg, var(--pri), var(--gold)); border-radius: 99px; box-shadow: 0 0 14px rgba(255, 74, 16, .38); }

        /* ====== APP ====== */
        #app { display: none; flex-direction: column; height: 100vh; width: 100%; }
        #app.visible { display: flex; }

        /* Lobby particles layer */
        #lp { position: fixed; inset: 0; pointer-events: none; z-index: 1; overflow: hidden; }
        .lp { position: absolute; border-radius: 50%; opacity: 0; filter: drop-shadow(0 0 8px rgba(255, 209, 102, 0.15)); animation: lpUp linear infinite; }
        @keyframes lpUp { 0%{opacity:0;transform:translateY(0) scale(1)} 10%{opacity:1} 86%{opacity:.85} 100%{opacity:0;transform:translateY(-108vh) scale(.16)} }

        /* ====== HEADER ====== */
        #topbar {
            position: relative;
            z-index: 100;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: clamp(12px, 1.8vh, 20px) clamp(16px, 3vw, 54px);
            background: rgba(7, 3, 2, 0.76);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid rgba(255, 74, 16, 0.12);
        }
        #topbar::before {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background: radial-gradient(900px 220px at 18% 0%, rgba(255, 74, 16, 0.16), transparent 55%),
                        radial-gradient(700px 220px at 82% 0%, rgba(0, 230, 195, 0.09), transparent 60%);
            opacity: .85;
        }
        #topbar::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 12%;
            right: 12%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 74, 16, 0.95), transparent);
            box-shadow: 0 0 12px rgba(255, 74, 16, 0.35);
            opacity: .9;
        }

        .logo {
            position: relative;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.65em, 3vw, 2.55em);
            font-weight: 800;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: rgba(255,255,255,.92);
            line-height: 1;
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.18);
            white-space: nowrap;
        }
        .logo span { color: var(--pri); text-shadow: 0 0 18px rgba(255, 74, 16, .35); }
        .tagline { font-family:'Rajdhani',sans-serif;font-size:clamp(.56em,.75vw,.74em);letter-spacing:3.2px;color:var(--muted2);text-transform:uppercase;margin-top:4px; }

        .topbar-center { display: flex; gap: clamp(8px, 1.2vw, 16px); align-items: center; position: relative; z-index: 1; }
        .stat-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            border: 1px solid rgba(255, 74, 16, 0.15);
            border-radius: 14px;
            padding: clamp(7px, 1vh, 11px) clamp(10px, 1.5vw, 18px);
            position: relative;
            overflow: hidden;
            box-shadow: 0 10px 24px rgba(0,0,0,.18);
        }
        .stat-chip svg { width: 18px; height: 18px; flex-shrink: 0; opacity: .95; }
        .stat-chip::before {
            content:'';
            position:absolute;
            inset:0;
            background: radial-gradient(120px 50px at 30% 0%, rgba(255, 209, 102, 0.10), transparent 65%);
            opacity: .9;
            pointer-events: none;
        }
        .stat-chip::after { content:''; position:absolute; bottom:0; left:14%; right:14%; height:2px; border-radius: 2px; opacity:.95; }
        .stat-chip.hp::after  { background:#ff4d4d; box-shadow:0 0 8px rgba(255, 77, 77, .55); }
        .stat-chip.str::after { background:var(--gold); box-shadow:0 0 8px rgba(255, 209, 102, .45); }
        .stat-chip.pts::after { background:var(--teal); box-shadow:0 0 8px rgba(0, 230, 195, .45); }
        .stat-chip-val { font-family:'Rajdhani',sans-serif; font-size: clamp(1em, 1.4vw, 1.3em); font-weight: 700; color: rgba(255,255,255,.92); }

        .avatar-btn {
            position: relative;
            z-index: 1;
            width: clamp(40px, 4vw, 52px);
            height: clamp(40px, 4vw, 52px);
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 122, 62, 0.95), rgba(177, 45, 7, 0.95));
            border: 1px solid rgba(255, 74, 16, 0.35);
            box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.10), 0 16px 30px rgba(0,0,0,.35);
            cursor: pointer;
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), filter .18s var(--ease);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .avatar-btn svg { width: 22px; height: 22px; }
        .avatar-btn:hover { transform: translateY(-1px) scale(1.06); box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.14), 0 18px 40px rgba(0,0,0,.48); filter: saturate(1.08); }
        .avatar-btn:active { transform: scale(.98); }

        .stats-mobile {
            display: none;
            position: relative;
            z-index: 10;
            flex-shrink: 0;
            gap: 10px;
            padding: 10px 16px 6px;
            background: rgba(7, 3, 2, 0.62);
            border-bottom: 1px solid rgba(255, 74, 16, 0.12);
            backdrop-filter: blur(14px);
        }
        .sm-chip {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 6px;
            background: linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.03));
            border: 1px solid rgba(255, 74, 16, 0.15);
            border-radius: 14px;
            padding: 9px 10px;
            position: relative;
            overflow: hidden;
        }
        .sm-chip svg { width: 16px; height: 16px; opacity: .95; }
        .sm-chip::after { content:''; position:absolute; bottom:0; left:12%; right:12%; height:2px; border-radius: 2px; opacity:.95; }
        .sm-chip.hp::after  { background:#ff4d4d; box-shadow:0 0 7px rgba(255, 77, 77, .55); }
        .sm-chip.str::after { background:var(--gold); box-shadow:0 0 7px rgba(255, 209, 102, .45); }
        .sm-chip.pts::after { background:var(--teal); box-shadow:0 0 7px rgba(0, 230, 195, .45); }
        .sm-chip-val { font-family:'Rajdhani',sans-serif; font-size: 1.12em; font-weight: 700; color: rgba(255,255,255,.92); }

        /* ====== MAIN ====== */
        #main {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
            z-index: 2;
            padding: clamp(16px, 2.5vh, 28px) clamp(16px, 3vw, 54px) clamp(18px, 2vh, 26px);
        }

        #main::before {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background:
                radial-gradient(1200px 420px at 10% 0%, rgba(255, 74, 16, 0.10), transparent 62%),
                radial-gradient(900px 420px at 90% 0%, rgba(0, 230, 195, 0.06), transparent 60%);
            opacity: .9;
        }

        .sec-head { position: relative; z-index: 1; display: flex; align-items: center; gap: 14px; margin-bottom: clamp(14px, 2vh, 22px); }
        .sec-line { flex: 1; height: 1px; background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent); }
        .sec-title {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.8em, 1.1vw, .98em);
            font-weight: 800;
            letter-spacing: 4px;
            color: rgba(255, 209, 102, 0.70);
            text-transform: uppercase;
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.12);
        }

        .cat-grid {
            position: relative;
            z-index: 1;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(clamp(210px, 22vw, 340px), 1fr));
            gap: clamp(12px, 1.8vw, 24px);
        }

        .cat-card {
            background: linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(255, 244, 230, 0.03));
            border-radius: var(--r-lg);
            border: 1px solid rgba(255, 74, 16, 0.16);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow2);
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), border-color .18s var(--ease), filter .18s var(--ease);
            min-height: 220px;
        }
        .cat-card:hover { transform: translateY(-6px); box-shadow: var(--shadow); border-color: rgba(255, 209, 102, 0.18); filter: saturate(1.06); }
        .cat-card:active { transform: translateY(-2px) scale(.985); }
        .cat-card:nth-child(2n) { --cc: var(--gold); }
        .cat-card:nth-child(3n) { --cc: var(--teal); }
        .cat-card:nth-child(4n) { --cc: var(--purple); }
        .cat-card:nth-child(5n) { --cc: var(--blue); }
        .cat-card:nth-child(6n) { --cc: var(--pri); }

        .cat-card::before {
            content:'';
            position:absolute;
            inset:-2px;
            background:
                radial-gradient(520px 220px at 18% 0%, rgba(255, 209, 102, 0.10), transparent 55%),
                radial-gradient(520px 240px at 80% 0%, color-mix(in srgb, var(--cc, var(--pri)) 20%, transparent), transparent 60%),
                linear-gradient(120deg, transparent 0 28%, rgba(255, 255, 255, 0.04) 34%, transparent 44%),
                radial-gradient(1000px 600px at 50% 120%, rgba(255, 74, 16, 0.08), transparent 62%);
            opacity: .95;
            pointer-events:none;
        }
        .cat-card::after {
            content:'';
            position:absolute;
            inset: 0;
            pointer-events:none;
            background:
                linear-gradient(180deg, rgba(0,0,0,0.0), rgba(0,0,0,0.18) 70%, rgba(0,0,0,0.30));
            opacity: .9;
        }

        .cc-topbar {
            position: relative;
            z-index: 1;
            height: 4px;
            background: linear-gradient(90deg, var(--cc, var(--pri)), rgba(255, 209, 102, 0.7));
            box-shadow: 0 0 18px color-mix(in srgb, var(--cc, var(--pri)) 55%, transparent);
        }

        .cc-body {
            position: relative;
            z-index: 2;
            padding: clamp(18px, 2.5vw, 30px) clamp(14px, 2vw, 24px) clamp(16px, 2vh, 24px);
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            gap: 10px;
        }

        .cc-img-wrap {
            width: clamp(74px, 9vw, 122px);
            height: clamp(74px, 9vw, 122px);
            border-radius: 18px;
            background: radial-gradient(80px 80px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 74, 16, 0.08);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: clamp(10px, 1.2vh, 14px);
            overflow: hidden;
            box-shadow: 0 10px 22px rgba(0,0,0,.22);
            transition: transform .2s var(--ease), box-shadow .2s var(--ease), border-color .2s var(--ease);
        }
        .cat-card:hover .cc-img-wrap { transform: translateY(-3px) scale(1.07); border-color: rgba(255, 209, 102, 0.16); box-shadow: 0 14px 34px rgba(0,0,0,.34); }
        .cc-img-wrap svg { width: 62%; height: 62%; }

        .cc-name {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.2em, 1.9vw, 1.7em);
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,.94);
            text-shadow: 0 0 18px rgba(255, 74, 16, 0.12);
        }
        .cc-cta {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.72em, .95vw, .88em);
            font-weight: 800;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--cc, var(--pri)) 70%, var(--gold));
            margin-top: 2px;
            opacity: .92;
        }

        /* Flecha (existe en HTML) */
        .cc-arrow {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            border-radius: 14px;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.14);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3;
            transition: transform .18s var(--ease), border-color .18s var(--ease), background .18s var(--ease);
        }
        .cc-arrow svg { width: 18px; height: 18px; stroke: rgba(243, 230, 211, 0.68); }
        .cat-card:hover .cc-arrow { transform: translateY(-50%) translateX(2px); border-color: rgba(255, 209, 102, 0.16); background: rgba(255, 244, 230, 0.07); }

        /* ====== SUBMENU ====== */
        #submenu {
            position: fixed;
            inset: 0;
            z-index: 400;
            display: none;
            flex-direction: column;
            background: rgba(5, 2, 1, 0.88);
            backdrop-filter: blur(18px);
            overflow-y: auto;
        }
        #submenu.open { display: flex; }
        #submenu::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255, 74, 16, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 74, 16, 0.05) 1px, transparent 1px);
            background-size: 42px 42px;
            pointer-events: none;
            opacity: .9;
            mask-image: radial-gradient(circle at 50% 40%, black 0 55%, transparent 80%);
        }
        .sm-inner {
            position: relative;
            z-index: 2;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: clamp(16px, 2.5vh, 28px) clamp(16px, 3vw, 54px) clamp(80px, 10vh, 110px);
            animation: smSlide .36s var(--ease) both;
        }
        @keyframes smSlide { from{opacity:0;transform:translateY(26px);filter:blur(1px)} to{opacity:1;transform:translateY(0);filter:blur(0)} }

        .sm-header { display: flex; align-items: center; gap: 16px; margin-bottom: clamp(18px, 3vh, 34px); }
        .sm-back {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform .18s var(--ease), border-color .18s var(--ease), background .18s var(--ease);
        }
        .sm-back svg { width: 20px; height: 20px; stroke: rgba(243, 230, 211, 0.70); }
        .sm-back:hover { transform: translateY(-1px); border-color: rgba(255, 209, 102, 0.16); background: rgba(255, 244, 230, 0.07); }
        .sm-back:active { transform: translateY(0) scale(.98); }

        .sm-cat-info { display: flex; align-items: center; gap: 14px; }
        .sm-cat-img {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: radial-gradient(70px 50px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 74, 16, 0.08);
            border: 1px solid rgba(255, 74, 16, 0.16);
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 14px 34px rgba(0,0,0,.30);
        }
        .sm-cat-img svg { width: 70%; height: 70%; }
        .sm-cat-name { font-family:'Rajdhani',sans-serif;font-size:clamp(1.35em,3vw,2.25em);font-weight:900;letter-spacing:4px;text-transform:uppercase;color:rgba(255,255,255,.94); }
        .sm-cat-sub { font-family:'Rajdhani',sans-serif;font-size:clamp(.76em,1vw,.92em);letter-spacing:3px;color:var(--muted);text-transform:uppercase;margin-top:4px; }

        .sm-divider { height: 1px; background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent); margin-bottom: clamp(18px, 3vh, 34px); }
        .sm-sec-title { font-family:'Rajdhani',sans-serif;font-size:clamp(.78em,1vw,.9em);font-weight:900;letter-spacing:4px;color:rgba(255, 209, 102, 0.70);text-transform:uppercase;margin-bottom:clamp(14px,2vh,22px); }

        .sm-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(clamp(220px, 24vw, 420px), 1fr)); gap: clamp(14px, 2vw, 26px); }

        .mode-card {
            background: linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(255, 244, 230, 0.03));
            border-radius: 24px;
            border: 1px solid rgba(255, 74, 16, 0.16);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            text-decoration: none;
            display: block;
            transition: transform .18s var(--ease), box-shadow .18s var(--ease), border-color .18s var(--ease), filter .18s var(--ease);
            padding: clamp(24px, 3vw, 40px) clamp(20px, 2.5vw, 36px);
            box-shadow: var(--shadow2);
            min-height: 210px;
        }

        .mode-card::before {
            content: '';
            position: absolute;
            inset: 0;
            pointer-events: none;
            background:
                radial-gradient(520px 220px at 15% 0%, rgba(255, 209, 102, 0.10), transparent 60%),
                radial-gradient(520px 240px at 86% 0%, color-mix(in srgb, var(--mc, var(--pri)) 22%, transparent), transparent 62%),
                linear-gradient(115deg, transparent 0 36%, rgba(255,255,255,.04) 42%, transparent 52%);
            opacity: .95;
        }

        .mode-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--mc, var(--pri)), rgba(255, 209, 102, 0.75));
            box-shadow: 0 0 16px color-mix(in srgb, var(--mc, var(--pri)) 55%, transparent);
        }
        .mode-card:nth-child(1) { --mc: var(--pri); }
        .mode-card:nth-child(2) { --mc: var(--gold); }
        .mode-card:nth-child(3) { --mc: var(--teal); }
        .mode-card:nth-child(4) { --mc: var(--purple); }

        .mode-card:hover { transform: translateY(-7px); box-shadow: var(--shadow); border-color: rgba(255, 209, 102, 0.18); filter: saturate(1.06); }
        .mode-card:active { transform: translateY(-2px) scale(.985); }

        .mc-icon {
            position: relative;
            z-index: 1;
            width: clamp(50px, 5.5vw, 74px);
            height: clamp(50px, 5.5vw, 74px);
            background: radial-gradient(70px 50px at 30% 30%, rgba(255, 209, 102, 0.10), transparent 70%),
                        rgba(255, 244, 230, 0.04);
            border-radius: 16px;
            border: 1px solid rgba(255,255,255,.08);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: clamp(14px, 1.8vh, 22px);
            transition: transform .18s var(--ease), border-color .18s var(--ease);
            box-shadow: 0 12px 22px rgba(0,0,0,.18);
        }
        .mc-icon svg { width: 26px; height: 26px; stroke: rgba(243, 230, 211, 0.80); }
        .mode-card:hover .mc-icon { transform: scale(1.09) translateY(-2px); border-color: rgba(255, 209, 102, 0.12); }

        .mc-name {
            position: relative;
            z-index: 1;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.3em, 2.2vw, 1.95em);
            font-weight: 900;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: rgba(255,255,255,.94);
            margin-bottom: 8px;
        }
        .mc-desc { position: relative; z-index: 1; font-size: clamp(.8em, 1vw, .95em); font-weight: 700; color: var(--muted); line-height: 1.5; }
        .mc-badge {
            position: relative;
            z-index: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-top: clamp(12px, 1.5vh, 18px);
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.70em, .85vw, .86em);
            font-weight: 900;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: color-mix(in srgb, var(--mc, var(--pri)) 72%, var(--gold));
            border: 1px solid color-mix(in srgb, var(--mc, var(--pri)) 55%, transparent);
            border-radius: 10px;
            padding: 6px 12px;
            background: rgba(255, 244, 230, 0.03);
            transition: transform .18s var(--ease), background .18s var(--ease);
        }
        .mode-card:hover .mc-badge { transform: translateY(-1px); background: rgba(255, 244, 230, 0.06); }

        /* ====== FOOTER / NAVBAR ====== */
        #navbar {
            position: relative;
            z-index: 100;
            flex-shrink: 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            gap: 10px;
            padding: clamp(8px, 1.2vh, 14px) clamp(8px, 2vw, 54px) clamp(14px, 2vh, 22px);
            background: rgba(7, 3, 2, 0.76);
            backdrop-filter: blur(16px);
            border-top: 1px solid rgba(255, 74, 16, 0.12);
        }
        #navbar::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 22%;
            right: 22%;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 74, 16, 0.95), transparent);
            box-shadow: 0 0 12px rgba(255, 74, 16, 0.35);
            opacity: .85;
        }
        .nb-btn {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            padding: clamp(6px, 1vh, 10px) clamp(14px, 2.5vw, 40px);
            border-radius: 14px;
            background: transparent;
            border: 1px solid transparent;
            font-family: inherit;
            transition: background .15s var(--ease), border-color .15s var(--ease), transform .15s var(--ease);
        }
        .nb-btn svg { width: 22px; height: 22px; }
        .nb-btn:hover { background: rgba(255, 244, 230, 0.04); border-color: rgba(255, 74, 16, 0.10); transform: translateY(-1px); }
        .nb-btn:active { transform: translateY(0) scale(.98); }
        .nb-btn.active { background: rgba(255, 74, 16, 0.10); border-color: rgba(255, 74, 16, 0.16); }
        .nb-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 24%;
            right: 24%;
            height: 2px;
            background: rgba(255, 74, 16, 0.95);
            box-shadow: 0 0 8px rgba(255, 74, 16, 0.45);
            border-radius: 99px 99px 0 0;
        }
        .nb-lbl {
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(.62em, .75vw, .80em);
            font-weight: 900;
            letter-spacing: 2px;
            color: rgba(243, 230, 211, 0.56);
            text-transform: uppercase;
        }
        .nb-btn.active .nb-lbl { color: rgba(255, 74, 16, 0.92); }

        /* ====== MODALES ====== */
        .overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 600;
            background: rgba(0, 0, 0, .64);
            backdrop-filter: blur(8px);
            align-items: center;
            justify-content: center;
            cursor: pointer;
            padding: 18px;
        }
        .overlay.show { display: flex; }
        .sheet {
            width: 100%;
            max-width: 520px;
            max-height: 88vh;
            overflow-y: auto;
            cursor: default;

            border-radius: 26px;
            border: 1px solid rgba(255, 74, 16, 0.18);
            background:
                radial-gradient(540px 260px at 18% 0%, rgba(255, 209, 102, 0.10), transparent 60%),
                radial-gradient(560px 280px at 85% 0%, rgba(0, 230, 195, 0.06), transparent 62%),
                linear-gradient(180deg, rgba(255, 244, 230, 0.06), rgba(10, 5, 3, 0.94));
            box-shadow: var(--shadow);
            padding: clamp(18px, 2.5vh, 28px) clamp(18px, 2.5vw, 32px) clamp(20px, 3vh, 36px);
            animation: sheetPop .30s var(--ease);
        }
        @keyframes sheetPop { from{transform:scale(.95) translateY(14px);opacity:0;filter:blur(1px)} to{transform:scale(1) translateY(0);opacity:1;filter:blur(0)} }

        .profile-ava {
            width: clamp(62px, 7vw, 84px);
            height: clamp(62px, 7vw, 84px);
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 122, 62, 0.95), rgba(177, 45, 7, 0.95));
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            box-shadow: 0 0 0 3px rgba(255, 74, 16, 0.10), 0 20px 44px rgba(0,0,0,.45);
            border: 1px solid rgba(255, 74, 16, 0.22);
        }
        .profile-ava svg { width: 26px; height: 26px; }
        .profile-name {
            text-align: center;
            font-family: 'Rajdhani', sans-serif;
            font-size: clamp(1.05em, 1.6vw, 1.3em);
            font-weight: 900;
            letter-spacing: 2px;
            color: rgba(255,255,255,.94);
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: clamp(14px, 2.5vw, 28px);
            margin: 16px 0;
            padding: 14px;
            background: rgba(5, 2, 1, 0.55);
            border-radius: 16px;
            border: 1px solid rgba(255, 74, 16, 0.14);
        }
        .ps-item { text-align: center; }
        .ps-val { font-family:'Rajdhani',sans-serif;font-size:clamp(1.3em,2vw,1.7em);font-weight:900;color: rgba(255, 209, 102, 0.90); }
        .ps-lbl { font-size:clamp(.6em,.75vw,.74em);font-weight:900;color: rgba(243, 230, 211, 0.56);letter-spacing:1.5px;text-transform:uppercase; }

        .sh-divider, hr.sh-divider {
            border: 0;
            height: 1px;
            background: linear-gradient(90deg, rgba(255, 74, 16, 0.22), transparent);
            margin: 16px 0;
        }

        .sh-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            width: 100%;
            background: rgba(255, 244, 230, 0.05);
            border: 1px solid rgba(255, 74, 16, 0.16);
            border-radius: 16px;
            padding: clamp(11px, 1.5vh, 15px) 16px;
            font-family: inherit;
            font-size: clamp(.92em, 1.1vw, 1.05em);
            font-weight: 900;
            color: rgba(255,255,255,.92);
            cursor: pointer;
            margin-bottom: 10px;
            transition: transform .16s var(--ease), background .16s var(--ease), border-color .16s var(--ease);
        }
        .sh-btn:hover { transform: translateY(-1px); background: rgba(255, 244, 230, 0.07); border-color: rgba(255, 209, 102, 0.16); }
        .sh-btn:active { transform: translateY(0) scale(.99); }

        .logro-list { display: flex; flex-direction: column; gap: 10px; margin-bottom: 16px; }
        .logro-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 13px 15px;
            background: rgba(5, 2, 1, 0.55);
            border-radius: 14px;
            border: 1px solid rgba(255, 74, 16, 0.14);
        }
        .logro-item svg { width: 22px; height: 22px; flex-shrink: 0; }
        .logro-name { font-family:'Rajdhani',sans-serif; font-weight: 900; letter-spacing: 1px; color: rgba(255,255,255,.94); }
        .logro-desc { font-weight: 800; color: rgba(243, 230, 211, 0.62); font-size: .92em; margin-top: 2px; }
        .logro-locked { opacity: .35; filter: grayscale(.85); }

        /* ====== THEME TOGGLE BUTTON ====== */
        .theme-toggle-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
            background: var(--card);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 8px 14px;
            border-radius: 30px;
            cursor: pointer;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95em;
            font-weight: 700;
            letter-spacing: 1px;
            transition: all 0.22s var(--ease);
            user-select: none;
        }
        .theme-toggle-btn:hover {
            background: var(--card2);
            border-color: var(--gold);
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(255, 209, 102, 0.2);
        }
        .theme-toggle-btn:active {
            transform: translateY(0) scale(0.98);
        }
        .theme-icon {
            font-size: 1.1em;
            display: inline-block;
            transition: transform 0.3s var(--ease);
        }
        .theme-toggle-btn:hover .theme-icon {
            transform: rotate(25deg) scale(1.15);
        }
        .theme-lbl {
            font-size: 0.88em;
            font-weight: 800;
            text-transform: uppercase;
        }

        /* ====== MODO CLARO (LIGHT THEME) ====== */
        html[data-theme="light"] {
            --bg0: #fbf8f3;
            --bg1: #f3ece0;
            --card: rgba(255, 255, 255, 0.88);
            --card2: rgba(255, 255, 255, 0.96);
            --text: #23150c;
            --muted: #6b5344;
            --muted2: #8a7364;
            --border: rgba(214, 60, 10, 0.18);
            --border2: rgba(201, 133, 0, 0.22);
            --shadow: 0 16px 45px rgba(90, 40, 10, 0.10);
            --shadow2: 0 8px 25px rgba(90, 40, 10, 0.08);
        }

        html[data-theme="light"] body {
            color: var(--text);
            background: radial-gradient(1200px 700px at 20% 10%, rgba(255, 122, 62, 0.14), transparent 55%),
                        radial-gradient(900px 520px at 85% 22%, rgba(0, 201, 167, 0.10), transparent 60%),
                        radial-gradient(900px 650px at 55% 92%, rgba(245, 166, 35, 0.12), transparent 62%),
                        linear-gradient(180deg, var(--bg0), var(--bg1) 55%, #eae0cf);
        }

        html[data-theme="light"] #topbar {
            background: rgba(251, 248, 243, 0.90);
            border-bottom: 1px solid rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] #navbar {
            background: rgba(251, 248, 243, 0.92);
            border-top: 1px solid rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .logo {
            color: #23150c;
            text-shadow: none;
        }

        html[data-theme="light"] .stat-chip {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 4px 14px rgba(90, 40, 10, 0.06);
        }
        html[data-theme="light"] .sm-chip {
            background: rgba(255, 255, 255, 0.92);
            border-color: rgba(214, 60, 10, 0.16);
        }

        html[data-theme="light"] .stat-chip-val,
        html[data-theme="light"] .sm-chip-val {
            color: var(--text);
        }

        html[data-theme="light"] .nb-lbl {
            color: var(--muted);
        }

        html[data-theme="light"] .nb-btn.active .nb-lbl {
            color: rgba(214, 60, 10, 0.92);
        }


        html[data-theme="light"] .cat-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.95), rgba(248, 243, 235, 0.90));
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.07);
        }
        html[data-theme="light"] .cat-card:hover {
            border-color: rgba(201, 133, 0, 0.35);
            box-shadow: 0 18px 45px rgba(90, 40, 10, 0.13);
        }

        html[data-theme="light"] .cc-name {
            color: #23150c;
            text-shadow: none;
        }
        html[data-theme="light"] .cc-arrow {
            background: rgba(214, 60, 10, 0.06);
            border-color: rgba(214, 60, 10, 0.16);
        }
        html[data-theme="light"] .cc-arrow svg {
            stroke: #6b5344;
        }

        html[data-theme="light"] #submenu {
            background: rgba(251, 248, 243, 0.95);
        }
        html[data-theme="light"] .sm-cat-name {
            color: #23150c;
        }
        html[data-theme="light"] .sm-cat-img {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.18);
            box-shadow: 0 8px 20px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .sm-back {
            background: #ffffff;
            border-color: rgba(214, 60, 10, 0.18);
        }
        html[data-theme="light"] .sm-back svg {
            stroke: #23150c;
        }
        html[data-theme="light"] .mode-card {
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.96), rgba(248, 243, 235, 0.92));
            border-color: rgba(214, 60, 10, 0.16);
            box-shadow: 0 10px 30px rgba(90, 40, 10, 0.08);
        }
        html[data-theme="light"] .mode-card:hover {
            border-color: rgba(201, 133, 0, 0.35);
            box-shadow: 0 18px 45px rgba(90, 40, 10, 0.13);
        }
        html[data-theme="light"] .mc-name {
            color: #23150c;
        }
        html[data-theme="light"] .mc-icon {
            background: rgba(214, 60, 10, 0.08);
            border-color: rgba(214, 60, 10, 0.18);
        }
        html[data-theme="light"] .mc-icon svg {
            stroke: #23150c;
        }
        html[data-theme="light"] .mc-badge {
            background: rgba(214, 60, 10, 0.06);
        }

        html[data-theme="light"] .sheet {
            background:
                radial-gradient(540px 260px at 18% 0%, rgba(245, 166, 35, 0.12), transparent 60%),
                radial-gradient(560px 280px at 85% 0%, rgba(0, 201, 167, 0.08), transparent 62%),
                linear-gradient(180deg, #ffffff, #f7f1e6);
            border-color: rgba(214, 60, 10, 0.20);
            box-shadow: 0 20px 60px rgba(90, 40, 10, 0.18);
        }
        html[data-theme="light"] .profile-name {
            color: #23150c;
        }
        html[data-theme="light"] .profile-stats,
        html[data-theme="light"] .logro-item {
            background: rgba(240, 231, 219, 0.7);
            border-color: rgba(214, 60, 10, 0.14);
        }
        html[data-theme="light"] .logro-name {
            color: #23150c;
        }
        html[data-theme="light"] .logro-desc {
            color: var(--muted);
        }
        html[data-theme="light"] .ps-lbl {
            color: var(--muted);
        }
        html[data-theme="light"] .sh-btn {
            background: rgba(240, 231, 219, 0.85);
            border-color: rgba(214, 60, 10, 0.2);
            color: #23150c;
        }
        html[data-theme="light"] .sh-btn:hover {
            background: rgba(230, 218, 202, 0.95);
        }

        /* ====== RESPONSIVE ====== */
        @media (max-width: 768px) {
            .topbar-center { display: none; }
            .stats-mobile { display: flex; }
            .cat-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
            .sm-grid { grid-template-columns: repeat(2, 1fr); }
            .cc-arrow { display: none; }
            .dashboard-llama { display: none !important; }
            
            /* Ajustes para la vista de Cuentos (árbol) en celular */
            .cuentos-tree-wrapper {
                min-width: 800px !important; /* Volvemos al tamaño grande inicial */
                margin-bottom: 2% !important;
            }
            .nodo-cuento {
                width: clamp(42px, 11vw, 55px) !important;
                height: clamp(42px, 11vw, 55px) !important;
            }
            .nodo-icon {
                font-size: clamp(1.1em, 4vw, 1.6em) !important;
            }
            .nodo-label {
                font-size: clamp(0.65em, 2.8vw, 0.85em) !important;
            }
            
            /* Coordenadas específicas de Móvil para el fondo y la llama */
            .cuentos-tree-wrapper > img {
                top: 6.69% !important;
                left: 4.25% !important;
            }
            #llama-img {
                top: 91.53% !important;
                left: 65.21% !important;
                transform: translate(-50%, -50%) scale(2.3) rotate(0deg) !important;
            }
        }
        @media (max-width: 480px) {
            #topbar { padding: 12px 14px; }
            #main { padding: 16px 14px 18px; }
            .cat-grid { grid-template-columns: 1fr; }
            .sm-grid { grid-template-columns: 1fr; }
            .theme-lbl { display: none; }
            .theme-toggle-btn { padding: 7px 10px; border-radius: 50%; }
        }
        
        .theme-toggle-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 18px;
            border-radius: 9999px;
            border: 1px solid rgba(255, 120, 60, 0.5);
            background: rgba(18, 24, 32, 0.85);
            color: #ffffff;
            font-family: 'Rajdhani', sans-serif;
            font-size: 0.95em;
            font-weight: 800;
            letter-spacing: 1px;
            cursor: pointer;
            backdrop-filter: blur(12px);
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            user-select: none;
        }
        .theme-toggle-btn:hover {
            transform: translateY(-2px) scale(1.04);
            border-color: rgba(255, 120, 60, 0.9);
            box-shadow: 0 6px 20px rgba(255, 74, 16, 0.35);
        }
        .theme-toggle-btn:active {
            transform: scale(0.97);
        }
        html[data-theme="light"] .theme-toggle-btn {
            background: rgba(255, 255, 255, 0.9);
            color: #1e293b;
            border-color: rgba(255, 74, 16, 0.4);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* ====== CUENTOS VIEW ====== */
        #cuentos-view { display: none; position: fixed; inset: 0; z-index: 500; background-image: url('{{ asset("images/fondo de cuentos.svg") }}'); background-size: cover; background-position: center bottom; background-repeat: no-repeat; overflow: hidden; flex-direction: column; }
        #cuentos-view.active { display: flex; }
        .cuentos-header { position: absolute; top: clamp(16px, 2.5vh, 28px); left: clamp(16px, 3vw, 54px); z-index: 20; }
        .nodo-cuento { position: absolute; width: clamp(50px, 6vw, 65px); height: clamp(50px, 6vw, 65px); border-radius: 50%; display: flex; flex-direction: column; align-items: center; justify-content: center; font-family: 'Rajdhani', sans-serif; font-weight: 900; cursor: pointer; transition: transform 0.1s, box-shadow 0.1s; transform: translate(-50%, -50%); z-index: 10; background: var(--pri); border: none; box-shadow: 0 6px 0 var(--pri-dk), 0 8px 15px rgba(0,0,0,0.4); margin-top: 0; }
        .nodo-cuento:hover { filter: brightness(1.15); }
        .nodo-cuento:active { transform: translate(-50%, calc(-50% + 6px)); box-shadow: 0 0px 0 var(--pri-dk), 0 2px 4px rgba(0,0,0,0.4); }
        .nodo-icon { font-size: clamp(1.4em, 2.5vw, 2em); line-height: 1; }
        .nodo-label { position: absolute; top: 115%; font-size: clamp(0.75em, 1vw, 0.95em); white-space: nowrap; text-shadow: 0 2px 4px rgba(0,0,0,0.8); color: #fff; background: rgba(0,0,0,0.6); padding: 3px 8px; border-radius: 8px; pointer-events: none; }
        html[data-theme="light"] .nodo-noche { display: none !important; }
        html[data-theme="dark"] .nodo-dia { display: none !important; }
        
        /* ===== LIGHT THEME CUENTOS NODES ===== */
        html[data-theme="light"] .nodo-cuento { background: #ff9b73; box-shadow: 0 6px 0 #d46c42, 0 8px 15px rgba(0,0,0,0.15); }
        html[data-theme="light"] .nodo-cuento:active { box-shadow: 0 0px 0 #d46c42, 0 2px 4px rgba(0,0,0,0.15); }
        html[data-theme="light"] .nodo-actual { background: #ffe399; box-shadow: 0 6px 0 #d4ad48, 0 8px 15px rgba(0,0,0,0.15); }
        html[data-theme="light"] .nodo-actual:active { box-shadow: 0 0px 0 #d4ad48, 0 2px 4px rgba(0,0,0,0.15); }
        html[data-theme="light"] .nodo-label { background: rgba(255, 255, 255, 0.85); color: #2b1c14; text-shadow: none; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .nodo-actual { background: var(--gold); box-shadow: 0 6px 0 #c2992a, 0 8px 15px rgba(0,0,0,0.4); }
        .nodo-actual:active { box-shadow: 0 0px 0 #c2992a, 0 2px 4px rgba(0,0,0,0.4); }
        .indicador-pajaro { position: absolute; top: -38px; left: 50%; transform: translateX(-50%); width: 35px; height: 35px; animation: bounce 1.5s infinite; pointer-events: none; z-index: 20; }
        @keyframes pulse-nodo { 0% { transform: translate(-50%, -50%) scale(1); box-shadow: 0 0 10px rgba(255, 209, 102, 0.4); } 100% { transform: translate(-50%, -50%) scale(1.1); box-shadow: 0 0 20px rgba(255, 209, 102, 0.8), 0 0 10px rgba(255, 209, 102, 0.6) inset; } }
        #proximamente-view { display: none; position: absolute; inset: 0; z-index: 600; background: rgba(0,0,0,0.85); backdrop-filter: blur(5px); flex-direction: column; align-items: center; justify-content: center; text-align: center; }
        #proximamente-view.active { display: flex; }
        
        /* ================= CUADERNO 3D (HIMNOS) ================= */
        #himnos-view { display: none; position: absolute; inset: 0; z-index: 600; background: rgba(0,0,0,0.85); backdrop-filter: blur(5px); flex-direction: column; align-items: center; justify-content: center; perspective: 1500px; overflow: hidden; }
        #himnos-view.active { display: flex; }
        
        .book { position: relative; width: 350px; height: 500px; transform-style: preserve-3d; transition: transform 0.8s ease-in-out; }
        
        .page { position: absolute; width: 100%; height: 100%; top: 0; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1); border-radius: 5px 15px 15px 5px; box-shadow: inset 0px 0px 20px rgba(0, 0, 0, 0.05); }
        
        .page-front, .page-back { position: absolute; width: 100%; height: 100%; -webkit-backface-visibility: hidden; backface-visibility: hidden; display: flex; flex-direction: column; justify-content: flex-start; align-items: center; padding: 30px; box-sizing: border-box; border-radius: 5px 15px 15px 5px; background-color: #f4e4bc; border: 1px solid #c8a97e; color: #4a3525; overflow-y: auto; overflow-x: hidden; scrollbar-width: none; font-family: 'Rajdhani', sans-serif; font-weight: 700; box-shadow: inset 0 0 50px rgba(139,69,19,0.15); }
        .page-front::-webkit-scrollbar, .page-back::-webkit-scrollbar { display: none; }
        
        .page-front::before, .page-back::before { content: ''; position: absolute; top: 0; bottom: 0; width: 30px; background: linear-gradient(to right, rgba(139,69,19,0.2) 0%, rgba(0,0,0,0) 100%); pointer-events: none; }
        .page-front::before { left: 0; }
        .page-back::before { right: 0; background: linear-gradient(to left, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0) 100%); }
        
        .page-back { transform: rotateY(180deg); border-radius: 15px 5px 5px 15px; }
        .flipped { transform: rotateY(-180deg); }
        
        /* Portada especial */
        #himno-page-0 .page-front { background: var(--pri); color: #fff; justify-content: center; }
        #himno-page-0 .page-front img { width: 150px; margin-bottom: 20px; }
        #himno-page-6 .page-back { background: var(--pri); }
        
        .book-controls { margin-top: 40px; display: flex; gap: 20px; z-index: 10; }
        .book-controls button { padding: 10px 25px; font-size: 16px; border: none; border-radius: 30px; background-color: var(--pri); color: white; cursor: pointer; box-shadow: 0 4px 6px rgba(0,0,0,0.3); transition: background 0.3s, transform 0.1s; }
        .book-controls button:hover { background-color: var(--gold); color: #000; }
        .book-controls button:disabled { background-color: #555; cursor: not-allowed; }
        
        .index-list { list-style: none; padding: 0; width: 100%; }
        .index-list li { padding: 10px; border-bottom: 1px dashed #ccc; cursor: pointer; color: var(--pri); font-weight: bold; text-align: left; }
        .index-list li:hover { color: var(--gold); }
        
        .lang-toggle { display: flex; gap: 10px; margin-bottom: 15px; }
        .lang-toggle button { padding: 5px 10px; border: 1px solid var(--pri); background: transparent; color: var(--pri); border-radius: 5px; cursor: pointer; }
        .lang-toggle button.active { background: var(--pri); color: white; }
        
        @media (max-width: 480px) { .book { width: 90vw; height: 75vh; } }
        
        /* ================= CUADERNO LEYENDAS (Exacto) ================= */
        #leyendas-view { display: none; position: absolute; inset: 0; z-index: 600; background: rgba(0,0,0,0.85); backdrop-filter: blur(5px); justify-content: center; align-items: center; perspective: 1800px; overflow: hidden; user-select: none; }
        #leyendas-view.active { display: flex; }
        
        #leyendas-view .l-book { position: relative; width: 420px; height: 550px; transform-style: preserve-3d; transition: transform 0.8s ease-in-out; cursor: grab; margin-top: 50px; }
        #leyendas-view .l-book:active { cursor: grabbing; }

        #leyendas-view .l-page { position: absolute; width: 100%; height: 100%; top: 0; left: 0; transform-origin: left center; transform-style: preserve-3d; transition: transform 0.8s cubic-bezier(0.645, 0.045, 0.355, 1); border-radius: 3px 15px 15px 3px; }
        
        #leyendas-view .l-front, #leyendas-view .l-back { position: absolute; width: 100%; height: 100%; backface-visibility: hidden; display: flex; flex-direction: column; padding: 30px; box-sizing: border-box; background-color: #fdfbf7; border: 1px solid #c7c7c7; border-radius: 3px 15px 15px 3px; box-shadow: inset 0px 0px 30px rgba(0, 0, 0, 0.03); overflow: hidden; font-family: 'Rajdhani', sans-serif; }
        #leyendas-view .l-back { transform: rotateY(180deg); border-radius: 15px 3px 3px 15px; }
        #leyendas-view .l-flipped { transform: rotateY(-180deg); }
        
        #leyendas-view .l-front::before, #leyendas-view .l-back::before { content: ''; position: absolute; top: 0; bottom: 0; width: 40px; background: linear-gradient(to right, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0) 100%); z-index: 10; pointer-events: none; }
        #leyendas-view .l-front::before { left: 0; }
        #leyendas-view .l-back::before { right: 0; background: linear-gradient(to left, rgba(0,0,0,0.15) 0%, rgba(0,0,0,0) 100%); }

        /* Clases Duales para PC / Celular */
        @media (max-width: 768px) {
            .hide-on-mobile { display: none !important; }
        }
        @media (min-width: 769px) {
            .hide-on-pc { display: none !important; }
        }

        /* Estilos Portada Originales */
        #leyendas-view .l-cover { background-color: #2b2b2b; color: #f98b00; justify-content: center; align-items: center; text-align: center; border: 2px solid #1a1a1a; }
        #leyendas-view .l-cover-title { font-family: 'Eater', cursive; font-size: 4.5rem; line-height: 1; margin: 0 0 40px 0; text-shadow: 3px 3px 5px rgba(0,0,0,0.8); font-weight: normal; }
        #leyendas-view .l-cover-subtitle { font-family: 'Creepster', cursive; font-size: 2rem; color: #d1d1d1; margin-bottom: 50px; letter-spacing: 2px; }
        
        /* Efecto 3D Estilo "Music" */
        .fancy-title {
            font-family: 'Pacifico', cursive;
            font-size: 56px;
            color: #ffffff;
            -webkit-text-stroke: 2px #ffd166;
            filter: drop-shadow(0px 5px 0px #ff4a10) drop-shadow(0px 10px 15px rgba(0,0,0,0.6));
            transform: rotate(-3deg);
            margin: 15px 0;
            display: inline-block;
            line-height: 1.3;
            letter-spacing: 4px;
        }

        /* Botones Duolingo Originales */
        #leyendas-view .l-btn { background-color: #58cc02; color: white; border: none; border-bottom: 5px solid #46a302; border-radius: 15px; padding: 15px 30px; font-size: 1.2rem; font-weight: bold; cursor: pointer; transition: all 0.1s; font-family: 'Rajdhani', sans-serif; z-index: 20; }
        #leyendas-view .l-btn:active { border-bottom: 0px; transform: translateY(5px); }
        #leyendas-view .l-btn-blue { background-color: #1cb0f6; border-bottom-color: #1482b6; color: white; }
        #leyendas-view .l-btn-red { background-color: #ff4b4b; border-bottom-color: #c73636; padding: 10px 20px; font-size: 1rem; margin-top: auto; }

        /* Interfaz de Menú y Lectura */
        #leyendas-view .l-menu-title { color: #3c3c3c; font-size: 2rem; text-align: center; margin-bottom: 20px; margin-top: 5px; font-weight: 900; }
        #leyendas-view .l-legend-btn { display: flex; align-items: center; background-color: #ffffff; border: 2px solid #e5e5e5; border-bottom: 5px solid #e5e5e5; border-radius: 15px; padding: 15px; margin-bottom: 12px; cursor: pointer; transition: all 0.1s ease; z-index: 20; }
        #leyendas-view .l-legend-btn:hover { background-color: #f7f7f7; }
        #leyendas-view .l-legend-btn:active { border-bottom: 2px solid #e5e5e5; transform: translateY(3px); }
        #leyendas-view .l-legend-icon { font-size: 2.2rem; margin-right: 15px; }
        #leyendas-view .l-legend-name { font-size: 1.2rem; font-weight: bold; color: #4b4b4b; }

        #leyendas-view .l-story-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; padding-bottom: 10px; border-bottom: 2px solid #eee; }
        #leyendas-view .l-story-title { font-size: 1.5rem; color: var(--pri); margin: 0; font-weight: bold; }
        #leyendas-view .l-back-btn { background: none; border: none; color: #afafaf; font-weight: bold; font-size: 1rem; cursor: pointer; z-index: 20; font-family: 'Rajdhani', sans-serif; }

        #leyendas-view .l-scrollable-content { flex-grow: 1; overflow-y: auto; padding-right: 10px; margin-bottom: 20px; user-select: text; -webkit-overflow-scrolling: touch; transform: translateZ(0); }
        #leyendas-view .l-paragraph-block { margin-bottom: 25px; animation: fadeInLeyenda 0.5s ease-out forwards; }
        @keyframes fadeInLeyenda { 
            0% { opacity: 0; transform: translateY(20px); } 
            100% { opacity: 1; transform: translateY(0); } 
        }
        #leyendas-view .l-quechua-text { font-size: 1.2rem; font-weight: bold; color: #3c3c3c; cursor: pointer; padding: 15px; border-radius: 12px; border: 2px dashed #e5e5e5; z-index: 20; transition: all 0.2s; }
        #leyendas-view .l-quechua-text:hover { background-color: rgba(255, 122, 0, 0.1); border-color: var(--pri); }
        #leyendas-view .l-spanish-translation { display: none; font-size: 1.05rem; color: var(--pri); margin-top: 10px; padding-left: 15px; border-left: 4px solid var(--pri); }

        /* Contenedor de Imagen (Adaptado para Móvil) */
        #leyendas-view .l-image-container { display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%; }
        #leyendas-view .l-image-container img { max-width: 100%; max-height: 75%; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.2); border: 4px solid #fff; pointer-events: none; }
        #leyendas-view .l-image-title { margin-top: 15px; font-family: 'Rajdhani', sans-serif; font-size: 2.5rem; color: #3c3c3c; font-weight: 900; }
        #leyendas-view .l-swipe-hint { position: absolute; bottom: 20px; font-size: 0.9rem; color: rgba(255,255,255,0.7); font-style: italic; }        
        
        @media (max-width: 768px) {
            #leyendas-view .l-book { width: 90vw; height: 85vh; margin-top: 0; }
            #leyendas-view .l-image-container { height: auto; margin-bottom: 10px; }
            #leyendas-view .l-image-container img { max-height: 140px; }
            #leyendas-view .l-image-title { display: none; }
            #leyendas-view .l-scrollable-content { min-height: 0; flex-shrink: 1; }
        }
        /* ========== MINIJUEGO ORDENA ========== */
        #ordena-view { display: none; position: absolute; inset: 0; z-index: 600; background: rgba(0,0,0,0.85); backdrop-filter: blur(5px); color: #fff; overflow: hidden; font-family: 'Inter', sans-serif; }
        #ordena-view.active { display: flex; flex-direction: column; }
        
        #ordena-view .o-game-container { width: 100%; max-width: 600px; margin: 0 auto; display: flex; flex-direction: column; height: 100vh; position: relative; }
        
        #ordena-view .o-start-screen { display: flex; flex-direction: column; align-items: center; justify-content: center; height: 100%; text-align: center; padding: 20px; }
        #ordena-view .o-start-screen h2 { color: #fff; font-size: 2.5rem; margin-bottom:10px; font-family: 'Rajdhani', sans-serif; font-weight: 900; }
        #ordena-view .o-start-screen p { margin-bottom: 30px; color: rgba(255,255,255,0.7); font-size:1.2rem; }
        #ordena-view .o-start-screen img { width: 150px; min-height: 150px; border-radius: 20px; cursor: pointer; transition: transform 0.2s; margin-bottom: 20px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.5)); }
        #ordena-view .o-start-screen img:hover { transform: scale(1.05); }
        #ordena-view .o-start-screen img:active { transform: translateY(4px); }
        
        #ordena-view .o-header { display: flex; align-items: center; padding: 20px; gap: 15px; }
        #ordena-view .o-progress-container { flex-grow: 1; height: 16px; background-color: rgba(255,255,255,0.1); border-radius: 10px; overflow: hidden; }
        #ordena-view .o-progress-bar { height: 100%; background-color: var(--pri); width: 0%; border-radius: 10px; transition: width 0.3s ease; }
        #ordena-view .o-lives { font-weight: bold; color: #ff4b4b; font-size: 1.2rem; display: flex; align-items: center; gap: 5px; }
        
        #ordena-view .o-level-content { flex-grow: 1; padding: 0 20px; display: flex; flex-direction: column; }
        #ordena-view .o-level-content h2 { font-size: 1.5rem; margin-bottom: 10px; color: #fff; font-family: 'Rajdhani', sans-serif; font-weight: 900; }
        #ordena-view .o-translation { font-size: 1.2rem; color: rgba(255,255,255,0.8); margin-bottom: 30px; border-bottom: 2px dashed rgba(255,255,255,0.2); padding-bottom: 10px; }
        
        #ordena-view .o-drop-zone { min-height: 60px; border-bottom: 2px solid rgba(255,255,255,0.2); display: flex; flex-wrap: wrap; gap: 10px; margin-bottom: 40px; padding-bottom: 10px; }
        #ordena-view .o-word-bank { display: flex; flex-wrap: wrap; gap: 10px; justify-content: center; }
        
        #ordena-view .o-word-btn { background-color: #fff; border: 2px solid #ddd; border-bottom: 4px solid #ddd; border-radius: 12px; padding: 10px 15px; font-size: 1.1rem; font-weight: bold; color: #333; cursor: pointer; transition: transform 0.1s; user-select: none; }
        #ordena-view .o-word-btn:active { transform: translateY(2px); border-bottom-width: 2px; margin-top: 2px; }
        #ordena-view .o-word-btn.placeholder { background-color: rgba(255,255,255,0.1); color: transparent; border-color: transparent; pointer-events: none; box-shadow: none; }
        
        #ordena-view .o-footer { padding: 20px; border-top: 2px solid rgba(255,255,255,0.1); display: flex; flex-direction: column; gap: 10px; transition: background-color 0.3s; }
        #ordena-view .o-action-btn { background-color: rgba(255,255,255,0.1); color: rgba(255,255,255,0.5); border: none; border-radius: 15px; padding: 15px; font-size: 1.2rem; font-weight: bold; text-transform: uppercase; cursor: default; width: 100%; transition: all 0.2s; }
        #ordena-view .o-action-btn.active { background-color: var(--pri); color: #fff; border-bottom: 4px solid var(--pri-dk); cursor: pointer; }
        #ordena-view .o-action-btn.active:active { transform: translateY(4px); border-bottom-width: 0px; }
        #ordena-view .o-action-btn.error { background-color: #ff4b4b; color: #fff; border-bottom: 4px solid #cc0000; cursor: pointer; }
        
        #ordena-view .o-feedback-msg { display: none; font-weight: bold; font-size: 1.2rem; margin-bottom: 10px; }
        
        #ordena-view .o-end-screen { display: none; flex-direction: column; align-items: center; justify-content: center; height: 100%; text-align: center; padding: 20px; }
        #ordena-view .o-end-screen h1 { color: var(--gold); font-size: 2.5rem; margin-bottom: 20px; font-family: 'Rajdhani', sans-serif; font-weight: 900; text-shadow: 0 0 20px var(--pri); }
        #ordena-view .o-end-screen p { font-size: 1.2rem; color: #fff; }
        #ordena-view .o-bonus-life { background-color: rgba(255,255,255,0.1); padding: 20px; border-radius: 20px; margin-top: 20px; display: none; animation: popIn 0.5s ease; border: 2px solid var(--pri); }

        /* Modal Game Over */
        #ordena-view .o-game-over-modal { display: none; position: absolute; inset: 0; background: rgba(0,0,0,0.8); z-index: 700; align-items: center; justify-content: center; padding: 20px; }
        #ordena-view .o-game-over-content { background: var(--card); border: 2px solid var(--border); border-bottom: 6px solid var(--border); border-radius: 24px; padding: 30px 20px; text-align: center; width: 100%; max-width: 400px; box-shadow: var(--shadow); animation: popIn 0.3s ease-out; }
        #ordena-view .o-game-over-content h2 { color: #ff4b4b; font-family: 'Rajdhani', sans-serif; font-weight: 900; font-size: 2.2rem; margin-bottom: 10px; }
        #ordena-view .o-game-over-content p { color: var(--text); font-size: 1.1rem; margin-bottom: 25px; }
        #ordena-view .o-game-over-content img { width: 80px; margin-bottom: 15px; filter: grayscale(100%) opacity(0.8); }
        
        .proximamente-text { font-family: 'Rajdhani', sans-serif; font-size: clamp(2em, 8vw, 4em); font-weight: 900; color: var(--gold); text-shadow: 0 0 20px var(--pri); margin-top: 20px; animation: bounce 2s infinite; }
        .proximamente-icon { 
            width: clamp(120px, 35vw, 220px); 
            height: clamp(120px, 35vw, 220px); 
            /* Difuminar los bordes recortados de la animación */
            -webkit-mask-image: radial-gradient(ellipse at center, black 60%, transparent 98%);
            mask-image: radial-gradient(ellipse at center, black 60%, transparent 98%);
        }
        @keyframes bounce { 0%, 20%, 50%, 80%, 100% {transform: translateY(0);} 40% {transform: translateY(-20px);} 60% {transform: translateY(-10px);} }
    </style>
</head>
<body>

<!-- ========== SPLASH ========== -->
<div id="splash">
    <div class="radar-rings">
        <div class="ring"></div><div class="ring"></div>
        <div class="ring"></div><div class="ring"></div><div class="ring"></div>
    </div>
    <svg class="chakana-bg" viewBox="0 0 100 100" fill="none"><path d="M33 0H67V33H100V67H67V100H33V67H0V33H33V0Z" fill="#E8450A"/><circle cx="50" cy="50" r="10" fill="none" stroke="#E8450A" stroke-width="2"/></svg>
    <div class="sp-cont" id="spCont"></div>
    <div class="splash-content">
        <img src="{{ asset('frames de saludo sin fondo/frame_1.png') }}" class="splash-llama" alt="Mascota animada">
        <div class="splash-title">BOLI<span>QUECHUA</span></div>
        <div class="splash-sub">Sistema de aprendizaje · v2.0</div>
    </div>
    <div class="s-lines"><div class="s-line"></div><div class="s-dia"></div><div class="s-line"></div></div>
    <div class="splash-welcome"><div class="sw-lbl">Bienvenido de vuelta</div><div class="sw-name">{{ $nombreUsuario }}</div></div>
    <div class="splash-loader"><div class="l-track"><div class="l-bar"></div></div><div class="l-pct" id="lPct">0%</div></div>
</div>

<!-- ========== GAME LOADER ========== -->
<div id="gameLoader"><div class="gl-rings"><div class="gl-ring"></div><div class="gl-ring"></div><div class="gl-ring"></div><div class="gl-ring"></div></div><div class="gl-content"><img src="{{ asset('frames de saludo sin fondo/frame_1.png') }}" class="gl-icon" alt="Mascota animada"><div class="gl-title" id="glTitle">Cargando...</div><div class="gl-sub">BOLIQUECHUA</div><div class="gl-bar-wrap"><div class="gl-track"><div class="gl-bar" id="glBar"></div></div></div></div></div>

<!-- ========== APP ========== -->
<div id="app">
    <div id="lp"></div>
    <header id="topbar">
        <div><div class="logo">BOLI<span>QUECHUA</span></div><div class="tagline">Aprende quechua jugando</div></div>
        <div class="topbar-center">
            <div class="stat-chip hp"><svg viewBox="0 0 24 24" fill="#e74c3c"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg><span class="stat-chip-val">{{ $vidas }}</span></div>
            <div class="stat-chip str"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><span class="stat-chip-val">{{ $racha }}</span></div>
            <div class="stat-chip pts"><svg viewBox="0 0 24 24" fill="#00C9A7"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><span class="stat-chip-val">{{ $puntuacion }}</span></div>
        </div>
        <div style="display: flex; align-items: center; gap: 10px;">
            <button class="theme-toggle-btn" id="themeToggleBtn" onclick="toggleTheme()" title="Cambiar modo claro / oscuro">
                <span class="theme-icon">☀️</span>
                <span class="theme-lbl">Modo</span>
            </button>
            <button class="avatar-btn" onclick="window.location.href='{{ route('profile.edit') }}'" title="Ver mi perfil">
                @if(isset($avatar) && (str_starts_with($avatar, '/uploads/') || str_starts_with($avatar, 'http')))
                    <img src="{{ asset($avatar) }}" alt="Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                @elseif(isset($avatar) && $avatar === 'llama')
                    <span style="font-size: 24px;">🦙</span>
                @elseif(isset($avatar) && $avatar === 'condor')
                    <span style="font-size: 24px;">🦅</span>
                @elseif(isset($avatar) && $avatar === 'inca')
                    <span style="font-size: 24px;">👑</span>
                @elseif(isset($avatar) && $avatar === 'coya')
                    <span style="font-size: 24px;">👸</span>
                @elseif(isset($avatar) && $avatar === 'inti')
                    <span style="font-size: 24px;">☀️</span>
                @elseif(isset($avatar) && $avatar === 'chakana')
                    <span style="font-size: 24px;">🏔️</span>
                @elseif(isset($avatar) && $avatar === 'puma')
                    <span style="font-size: 24px;">🏹</span>
                @elseif(isset($avatar) && $avatar === 'diablada')
                    <span style="font-size: 24px;">🎭</span>
                @else
                    <svg viewBox="0 0 24 24" fill="none" stroke="#F0DCC0" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
                @endif
            </button>
        </div>
    </header>
    <div class="stats-mobile" id="statsMobile">
        <div class="sm-chip hp"><svg viewBox="0 0 24 24" fill="#e74c3c"><path d="M12 21.593c-5.63-5.539-11-10.297-11-14.402 0-3.791 3.068-5.191 5.281-5.191 1.312 0 4.151.501 5.719 4.457 1.59-3.968 4.464-4.447 5.726-4.447 2.54 0 5.274 1.621 5.274 5.181 0 4.069-5.136 8.625-11 14.402z"/></svg><span class="sm-chip-val">{{ $vidas }}</span></div>
        <div class="sm-chip str"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2.2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><span class="sm-chip-val">{{ $racha }}</span></div>
        <div class="sm-chip pts"><svg viewBox="0 0 24 24" fill="#00C9A7"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><span class="sm-chip-val">{{ $puntuacion }}</span></div>
    </div>
    <main id="main">
        <div class="sec-head"><div class="sec-line"></div><div class="sec-title">Elige una categoría</div><div class="sec-line" style="background:linear-gradient(270deg,var(--border),transparent)"></div></div>
        <div class="cat-grid" id="catGrid">
            @foreach($categorias as $cat)
            @php
                $catKey = strtolower(trim($cat->nombre));
                $catNameMap = [
                    'saludos' => 'saludos.png',
                    'animales' => 'animales.png',
                    'partes del cuerpo' => 'partes del cuerpo.png',
                    'colores' => 'colores.png',
                    'emociones' => 'Emociones.png',
                    'expresiones' => 'expresiones.png'
                ];
                $imgSrc = isset($catNameMap[$catKey]) ? asset('imagenes_botones/' . $catNameMap[$catKey]) : '';
            @endphp
            <div class="cat-card" onclick="window.location.href='{{ route('niveles', ['id' => $cat->id]) }}'">
                @if($imgSrc)
                <div style="position: absolute; inset: 0; background-image: url('{{ $imgSrc }}'); background-size: cover; background-position: center; z-index: 1;"></div>
                @endif
                <div class="cc-topbar"></div>
                <div class="cc-body" style="height: 100%; justify-content: flex-end; padding-top: 45%;">
                    <div class="cc-name" style="text-shadow: 0 2px 8px rgba(0,0,0,1);">{{ $cat->nombre }}</div>
                    <div class="cc-cta" style="text-shadow: 0 2px 6px rgba(0,0,0,1);">Seleccionar ▶</div>
                </div>
                <div class="cc-arrow"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="9 18 15 12 9 6"/></svg></div>
            </div>
            @endforeach
        </div>
        <!-- Mascota animada en bucle en el dashboard -->
        <img src="{{ asset('frames de saludo sin fondo/frame_1.png') }}" class="dashboard-llama" alt="Condorio animado" style="position: fixed; bottom: 80px; right: 10px; width: clamp(120px, 25vw, 200px); pointer-events: none; z-index: 10; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.3));">
    </main>
    <nav id="navbar">
        <button class="nb-btn" onclick="window.location.href='{{ url('/categorias') }}'"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg><span class="nb-lbl">Inicio</span></button>
        <button class="nb-btn" onclick="showCuentos()"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><span class="nb-lbl">Práctica</span></button>
        <button class="nb-btn" onclick="showLogros()"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg><span class="nb-lbl">Logros</span></button>
        <button class="nb-btn" onclick="window.location.href='{{ route('profile.edit') }}'"><svg viewBox="0 0 24 24" fill="none" stroke="var(--muted)" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg><span class="nb-lbl">Perfil</span></button>
    </nav>
</div>

<!-- ========== CUENTOS VIEW ========== -->
<div id="cuentos-view">
    <!-- Video de fondo (se asigna src por JS) -->
    <video id="cuentos-bg-video" autoplay loop muted playsinline style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0; pointer-events: none; transition: opacity 0.5s ease; opacity: 1;"></video>
    <div class="sm-back" onclick="hideCuentos()" style="z-index: 600;"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg></div>
    
    <div style="position: absolute; top: clamp(16px, 2.5vh, 28px); right: clamp(16px, 3vw, 54px); z-index: 600;">
        <button class="theme-toggle-btn" onclick="toggleTheme()" title="Cambiar modo claro / oscuro">
            <span class="theme-icon">☀️</span>
            <span class="theme-lbl">CLARO</span>
        </button>
    </div>
    
    <div style="position: absolute; inset: 0; overflow: hidden; display: flex; align-items: flex-end; justify-content: center; pointer-events: none; z-index: 10;">
        <div class="cuentos-tree-wrapper" style="position: relative; width: 100%; max-width: 1200px; min-width: 800px; aspect-ratio: 1843 / 2261; pointer-events: auto; margin-bottom: -5%;">
            <img src="{{ asset('arbol cuentos (2).svg') }}" style="position: absolute; top: 0.33%; left: 1.15%; width: 94.12%; height: auto; display: block; pointer-events: none;">
            
            <!-- ================= NODOS NOCHE (13) ================= -->
            <div class="nodo-cuento nodo-noche nodo-actual" style="top: 65.9%; left: 46.5%;" onclick="showProximamente()">
                <img src="{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}" class="indicador-pajaro" alt="Indicador">
                <span class="nodo-icon">❌</span>
                <div class="nodo-label">Errores</div>
            </div>
            
            <div class="nodo-cuento nodo-noche" style="top: 54.2%; left: 27.3%;" onclick="showProximamente()">
                <span class="nodo-icon">📖</span>
                <div class="nodo-label">Palabras</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 55.0%; left: 61.1%;" onclick="showProximamente()">
                <span class="nodo-icon">🧠</span>
                <div class="nodo-label">Difíciles</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 80.0%; left: 25.2%;" onclick="showProximamente()">
                <span class="nodo-icon">👂</span>
                <div class="nodo-label">Oír</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 62.9%; left: 36.6%;" onclick="showProximamente()">
                <span class="nodo-icon">🎧</span>
                <div class="nodo-label">Dictado</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 67.4%; left: 24.6%;" onclick="window.location.href='{{ route('juego', ['id' => 1]) }}?modo=hablar&es_practica=1'">
                <span class="nodo-icon">🎤</span>
                <div class="nodo-label">Hablar</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 67.7%; left: 67.1%;" onclick="window.location.href='{{ route('juego', ['id' => 1]) }}?modo=hablar&es_practica=1'">
                <span class="nodo-icon">🗣️</span>
                <div class="nodo-label">Pronuncia</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 76.0%; left: 10.7%;" onclick="showProximamente()">
                <span class="nodo-icon">💬</span>
                <div class="nodo-label">Charla</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 78.3%; left: 34.8%;" onclick="showHimnos()">
                <span class="nodo-icon">📖</span>
                <div class="nodo-label">Himno</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 47.3%; left: 46.8%;" onclick="showProximamente()">
                <span class="nodo-icon">🔥</span>
                <div class="nodo-label">Repaso</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 59.8%; left: 68.6%;" onclick="window.location.href='{{ route('juego', ['id' => 1]) }}?modo=contrarreloj&es_practica=1'">
                <span class="nodo-icon">⚡</span>
                <div class="nodo-label">Rápido</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 72.5%; left: 81.7%;" onclick="showProximamente()">
                <span class="nodo-icon">🎯</span>
                <div class="nodo-label">Reto</div>
            </div>
            <div class="nodo-cuento nodo-noche" style="top: 74.2%; left: 63.1%;" onclick="showProximamente()">
                <span class="nodo-icon">👑</span>
                <div class="nodo-label">Perfecto</div>
            </div>

            <!-- ================= NODOS DÍA (10) ================= -->
            <div class="nodo-cuento nodo-dia nodo-actual" style="top: 65.9%; left: 46.5%;" onclick="window.location.href='{{ route('juego', ['id' => 1]) }}?modo=completar&es_practica=1'">
                <img src="{{ asset('animaciones condorio en gif/condorio esperando_processed.gif') }}" class="indicador-pajaro" alt="Indicador">
                <span class="nodo-icon">🧩</span>
                <div class="nodo-label">Completar</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 54.2%; left: 27.3%;" onclick="showProximamente()">
                <span class="nodo-icon">🖼️</span>
                <div class="nodo-label">Imagen</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 55.0%; left: 61.1%;" onclick="showProximamente()">
                <span class="nodo-icon">🔊</span>
                <div class="nodo-label">Sonido</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 80.0%; left: 25.2%;" onclick="window.location.href='{{ route('juego.memoria') }}'">
                <span class="nodo-icon">🃏</span>
                <div class="nodo-label">Memoria</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 62.9%; left: 36.6%;" onclick="showProximamente()">
                <span class="nodo-icon">📗</span>
                <div class="nodo-label">Cuentos</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 67.4%; left: 24.6%;" onclick="showProximamente()">
                <span class="nodo-icon">🏔️</span>
                <div class="nodo-label">Cultura</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 67.7%; left: 67.1%;" onclick="showLeyendas()">
                <span class="nodo-icon">📚</span>
                <div class="nodo-label">Leyendas</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 76.0%; left: 10.7%;" onclick="showProximamente()">
                <span class="nodo-icon">❤️🔥</span>
                <div class="nodo-label">Supervive</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 78.3%; left: 34.8%;" onclick="showProximamente()">
                <span class="nodo-icon">👑</span>
                <div class="nodo-label">Prueba</div>
            </div>
            <div class="nodo-cuento nodo-dia" style="top: 47.3%; left: 46.8%;" onclick="showProximamente()">
                <span class="nodo-icon">🎲</span>
                <div class="nodo-label">Sorpresa</div>
            </div>
            <!-- Condorio animado sin fondo -->
            <img id="condorio-video" src="{{ asset('animaciones condorio en gif/condorio_amable_processed.gif') }}" alt="Condorio" style="position: absolute; top: 89.07%; left: 109.64%; transform: translate(-50%, -50%); width: 22.09%; height: auto; z-index: 15; pointer-events: none;">
            
            <!-- Llama -->
            <img id="llama-img" src="{{ asset('animaciones condorio en gif/llama_processed.png') }}" style="position: absolute; top: 83.42%; left: 70.2%; transform: translate(-50%, -50%) scale(3) rotate(0deg); width: 10%; height: auto; z-index: 16; pointer-events: auto;">
        </div>
    </div>

    <div id="proximamente-view">
        <img src="{{ asset('condorio saludando animado.gif') }}" class="proximamente-icon" alt="Correcto">
        <div class="proximamente-text">¡PRÓXIMAMENTE!</div>
        <button class="sh-btn" style="margin-top: 30px;" onclick="hideProximamente()">Volver atrás</button>
    </div>

    <div id="himnos-view">
        <div class="sm-back" onclick="hideHimnos()" style="z-index: 600;">
            <span><</span>
        </div>
        <div class="book" id="himnos-book">
            <!-- Portada -->
            <div class="page" id="himno-page-0" style="z-index: 4;">
                <div class="page-front">
                    <img src="{{ asset('nuevo_icono_transparent.png') }}" alt="Icono Boliquechua">
                    <h2 class="fancy-title">Cancionero</h2>
                </div>
                <div class="page-back"></div>
            </div>

            <!-- Índice -->
            <div class="page" id="himno-page-1" style="z-index: 6;">
                <div class="page-front">
                    <h2 style="color:var(--pri); margin-bottom: 20px;">Índice</h2>
                    <ul class="index-list">
                        <li onclick="goToHimnoPage(2)">1. Himno Nacional de Bolivia</li>
                        <li onclick="goToHimnoPage(3)">2. Himno a la Bandera</li>
                        <li onclick="goToHimnoPage(4)">3. Himno a Santa Cruz</li>
                        <li onclick="goToHimnoPage(5)">4. Himno A la UAGRM</li>
                    </ul>
                </div>
                <div class="page-back"></div>
            </div>

            <!-- Himno 1 -->
            <div class="page" id="himno-page-2" style="z-index: 5;">
                <div class="page-front" style="display: block; padding: 0;">
                    <div style="width: 100%; height: 100%; padding: 20px; overflow-y: auto; text-align: left;">
                        <h3 style="color:var(--pri); text-align:center; margin-top:0; font-size:1.5rem;">Himno Nacional de Bolivia</h3>
                        <div class="lang-toggle" style="justify-content: center; margin-bottom: 15px;">
                            <button class="active" onclick="toggleLang(this, 'qu')">Quechua</button>
                            <button onclick="toggleLang(this, 'es')">Español</button>
                        </div>
                        <div class="lyrics lyrics-qu">
                            <p style="white-space: pre-wrap; font-size:0.9em; line-height: 1.4;">Qullasuyup qhapaq sutinta
qunqur chaki yupaychasunchik,
sumaq kawsay suyasqanchikta
munayninmanjina tarinchik.

Ch'in ch'ulla qayna p'unchawpiqa
sinchi q'aqcha maqanakuy karqa
kunanqa sumaq kawsay k'anchamun
llaqtanchikpaq q'uñi khuyaypi.

Coro:
Qhapaq suyu, Llaqta,
Hatun sutiykita
Wiñaypaq k'anchaypi waqaychasun
Kamachinta musuqmanta wakichisun
Wañuna qhasita kawsanata,
Wañuna qhasita kawsanata,
Wañuna qhasita kawsanata.</p>
                        </div>
                        <div class="lyrics lyrics-es" style="display:none;">
                            <p style="white-space: pre-wrap; font-size:0.9em; line-height: 1.4;">Bolivianos, el hado propicio
coronó nuestros votos y anhelo;
es ya libre, ya libre este suelo,
ya cesó su servil condición.

Al estruendo marcial que ayer fuera,
y al clamor de la guerra horroroso,
siguen hoy en contraste armonioso,
dulces himnos de paz y de unión. 

Coro:
De la patria, el alto nombre
en glorioso esplendor conservemos
y en sus aras de nuevo juremos
¡Morir antes que esclavos vivir!</p>
                        </div>
                    </div>
                </div>
                <div class="page-back"></div>
            </div>

            <!-- Himno 2 -->
            <div class="page" id="himno-page-3" style="z-index: 4;">
                <div class="page-front" style="display: block; padding: 0;">
                    <div style="width: 100%; height: 100%; padding: 20px; overflow-y: auto; text-align: left;">
                        <h3 style="color:var(--pri); text-align:center; margin-top:0; font-size:1.5rem;">Himno a la Bandera</h3>
                        <div class="lang-toggle" style="justify-content: center; margin-bottom: 15px;">
                            <button class="active" onclick="toggleLang(this, 'qu')">Quechua</button>
                            <button onclick="toggleLang(this, 'es')">Español</button>
                        </div>
                        <div class="lyrics lyrics-qu">
                            <p style="white-space: pre-wrap; font-size:0.85em; line-height: 1.3;">Kinsa llimphi wiphala k'anchanki
Qullasuyup hanan pachampi,
K'uychijina atipay lliphipiy,
Sumaq kawsaywan hukllachay unancha.

Willka p'alltayki ukhupi jap'inki
Khuyakuq llaqtaykip munayninta,
Anti urqukunamanta qaparikuspa
Sumaq munakuywan yupaychasunki.

Phutuqutu waqyay uyarikunman
Yawar mayu maqanakuyman wajhaspa,
Qhasqunchikmi pirqa jina kanqa
Iñiyninwan, kallpanwan sayananpaq.

Sutiykita rimaq waqrakuna
Wayraman kacharispa takininta,
Karupura qhuchakunapim q'aparinqa
Chakiykita much'aq mama quchapi.

Kinsa llimphi wiphala, siq'iykiwan
Llawril, quri, nina puka;
Qanrayku janaqpachaman mañakuni,
Qanrayku Apuman kawsayniyta quni.

P'alltaykita wayraman kachariptiiki
Wasinchikta, q'isanchikta jark'aspa,
Qanpaqmi kawsayniykup tuqtuqiynin
Huk sunquyuq llaqtaykimanta.</p>
                        </div>
                        <div class="lyrics lyrics-es" style="display:none;">
                            <p style="white-space: pre-wrap; font-size:0.85em; line-height: 1.3;">Pabellón tricolor que te ostentas
de Bolivia en el cielo radiante,
como el iris de gloria triunfante,
como emblema de paz y de unión.

En tus pliegues benditos acoges
los anhelos del pueblo que te ama,
que en las cumbres andinas te aclama
y te rinde homenaje de amor.

Si el clarín de la guerra resuena
y nos llama a la cruenta batalla,
nuestros pechos serán la muralla
que resista con fe y con valor.

Las cornetas que dicen tu nombre
desgranando a los vientos sus notas,
vibrarán en las playas remotas
sobre el mar que tus plantas besó.

Pabellón tricolor con tus franjas
de laurel, de oro vivo y de fuego;
por ti elevo a los cielos mi ruego,
por ti ofrezco mi vida al Señor.

Cuando sueltas tus pliegues al viento
protegiendo heredades y nidos,
tuyos son los vehementes latidos
de tu pueblo que es un corazón.</p>
                        </div>
                    </div>
                </div>
                <div class="page-back"></div>
            </div>

            <!-- Himno 3 -->
            <div class="page" id="himno-page-4" style="z-index: 3;">
                <div class="page-front" style="display: block; padding: 0;">
                    <div style="width: 100%; height: 100%; padding: 20px; overflow-y: auto; text-align: left;">
                        <h3 style="color:var(--pri); text-align:center; margin-top:0; font-size:1.5rem;">Himno a Santa Cruz</h3>
                        <div class="lang-toggle" style="justify-content: center; margin-bottom: 15px;">
                            <button class="active" onclick="toggleLang(this, 'qu')">Quechua</button>
                            <button onclick="toggleLang(this, 'es')">Español</button>
                        </div>
                        <div class="lyrics lyrics-qu">
                            <p style="white-space: pre-wrap; font-size:0.9em; line-height: 1.4;">Américaq aswan ch'uya hanaq pachanpi
Ñuflo de Chávez allpanpi,
qisqisqa p'isqukuna qispikayta takinku
sumaq p'achanta rikuchispa.

Sumaq pachap t'ikankunamanta
misk'i q'apaynin quspa
qispikay, qispikay nispa purinku
Sumaq kawsaywan munakuy wajyariypi.

Hatun España
sumaq samiyuq,
kaypi mallkirqa
qispichiy unanchata.

Llanthunpim paqarimurqa
k'anchaq mat'iyuq
huk hatun llaqta
chiqaq sunquyuq.</p>
                        </div>
                        <div class="lyrics lyrics-es" style="display:none;">
                            <p style="white-space: pre-wrap; font-size:0.9em; line-height: 1.4;">Bajo el cielo más puro de América
y en la tierra de Ñuflo de Chávez,
libertad van trinando las aves
de su veste ostentando el primor.

De las flores del mundo galano
su ambrosía perfumada ofreciendo
libertad, libertad van diciendo
en efluvios de paz y de amor.

La España grandiosa
con hado benigno
aquí plantó el signo
de la redención.

Y surgió en su sombra
un pueblo eminente
de límpida frente
de leal corazón</p>
                        </div>
                    </div>
                </div>
                <div class="page-back"></div>
            </div>

            <!-- Himno 4 -->
            <div class="page" id="himno-page-5" style="z-index: 2;">
                <div class="page-front" style="display: block; padding: 0;">
                    <div style="width: 100%; height: 100%; padding: 20px; overflow-y: auto; text-align: left;">
                        <h3 style="color:var(--pri); text-align:center; margin-top:0; font-size:1.4rem;">Himno a la UAGRM</h3>
                        <div class="lang-toggle" style="justify-content: center; margin-bottom: 10px;">
                            <button class="active" onclick="toggleLang(this, 'qu')">Quechua</button>
                            <button onclick="toggleLang(this, 'es')">Español</button>
                        </div>
                        <div class="lyrics lyrics-qu">
                            <p style="white-space: pre-wrap; font-size:0.75em; line-height: 1.3;">Wayna sipaskuna, wiñay kallpa! 
Kallpaykim qhapaq kunkata qaparin, qispikay!
Musuq pachakunata paqarichinaykipaq pusasuspa
Sumaq kawsayta, paqtakayta, chiqaq kaytapas.
Llaqtanchikpa kawsaynin musuqmanta paqarimunanpaq
Rimasqaykimanta, sumaq ruwasqaykimantapas,
Ama hayk'aqpas qunquriychu
chiqniy, maqanakuy, waqay sasachakuykunaman.

Willakuyninchikta ruwanki p'akispa
llakiy ñanta saqispa,
Mana qhasipaqchu Alma Mater sutiyki,
Yachaymi wiñay k'anchayniykiqa.

Qanpaqmi wiñaypaq hatun runakunap yachay wasin
Qanpaqmi atipay llawril unancha,
maqanakuypi kallpayki kachkan,
Yuyay kamachiqpaq sayaynin.

Paqariypa muhunmi mat'iyki
Yuyayniykikunaqa sayariq mayujina,
Sumaq suyakuywan yuyaychasunki
Munakuymanta, iñiymanta raphranjina.

Kay allpa qusunki layqa kayninta,
Karumanta qhawariypi pachamamata,
Morenop hatun yachayninwan,
Intipa k'anchasqan sach'a sach'anwan.
Inti k'anchay wayna sipaskuna.</p>
                        </div>
                        <div class="lyrics lyrics-es" style="display:none;">
                            <p style="white-space: pre-wrap; font-size:0.75em; line-height: 1.3;">Juventud, fuerza eterna ¡tú impulso
vibra altiva esta voz, libertad!
y te lleve a crear nuevos mundos
de belleza, justicia y verdad,
que los patrios destinos resurjan
de tu verbo y tu acción ejemplar
y no cedan jamás al influjo
de los odios, la guerra, el azar.

Gestaras nuestra historia quebrando
de su curso la curva fatal
que no en vano Alma Mater te llaman
y es la ciencia tu luz inmortal.

Tuya es siempre la escuela de próceres
tuyo el signo triunfal del laurel
sigue siendo el vigor en las luchas
y del rey pensamiento el troquel.

Semillero de auroras la frente
tus ideas torrentes de pie
que te inspira fecundo optimismo
cual un ala de amor y de fe.

Y te brinde esta tierra la magia
de horizonte universo crisol
con el vasto saber de Moreno
y su selva radiante de sol.

Juventud radiante de sol.</p>
                        </div>
                    </div>
                </div>
                <div class="page-back"></div>
            </div>
            
            <!-- Fin -->
            <div class="page" id="himno-page-6" style="z-index: 1;">
                <div class="page-front" style="justify-content:center;">
                    <h3 style="color:var(--pri); text-align:center;">Fin del cancionero</h3>
                </div>
                <div class="page-back"></div>
            </div>
        </div>

        <div class="book-controls">
            <button id="bookPrevBtn" disabled>&#8592; Anterior</button>
            <button id="bookNextBtn">Siguiente &#8594;</button>
        </div>
    </div>
    
    <!-- ========== LEYENDAS ========== -->
    <div id="leyendas-view">
        <!-- VERSIÓN PC (2 CARAS, IGUAL AL MODELO) -->
        <div class="l-book hide-on-mobile" id="leyendas-book-pc">
            <!-- HOJA 1: PORTADA -->
            <div class="l-page" id="pc-page1" style="z-index: 3;">
                <div class="l-front l-cover">
                    <div class="l-cover-subtitle">Mitos y</div>
                    <div class="l-cover-title">LEYENDAS</div>
                    <button class="l-btn" onclick="openLeyendasBook()">Abrir &#8594;</button>
                    <div class="l-swipe-hint">O desliza hacia la izquierda &larr;</div>
                </div>
                <div class="l-back">
                    <div style="text-align: center; margin-top: 40px;">
                        <img src="{{ asset('nuevo_icono_transparent.png') }}" style="width:120px; border-radius:50%; margin-bottom:10px; pointer-events:none;">
                        <h2 style="color: #4b4b4b;">¡Bienvenido!</h2>
                        <p style="color: #777; font-size: 1rem; line-height: 1.5;">
                            Selecciona una leyenda a la derecha. <br>
                            Toca el texto en quechua para ver su traducción.
                        </p>
                        <button class="l-btn l-btn-red" style="margin-top: 40px;" onclick="hideLeyendas()">Cerrar Cuaderno</button>
                    </div>
                </div>
            </div>

            <!-- HOJA 2: MENÚ / IMAGEN -->
            <div class="l-page" id="pc-page2" style="z-index: 2;">
                <div class="l-front">
                    <h2 class="l-menu-title">Elige una Leyenda</h2>
                    
                    <div class="l-legend-btn" onclick="loadLeyenda('duende')">
                        <div class="l-legend-icon">🍄</div>
                        <div class="l-legend-name">El Duende</div>
                    </div>
                    <div class="l-legend-btn" onclick="loadLeyenda('viudita')">
                        <div class="l-legend-icon">👰‍♀️</div>
                        <div class="l-legend-name">La Viudita</div>
                    </div>
                    <div class="l-legend-btn" onclick="loadLeyenda('carreton')">
                        <div class="l-legend-icon">🐂</div>
                        <div class="l-legend-name">El Carretón</div>
                    </div>
                </div>
                <div class="l-back">
                    <div class="l-image-container">
                        <img id="pc-story-image" src="" alt="Ilustración" style="display:none;">
                        <div class="l-image-title" id="pc-story-image-title"></div>
                    </div>
                </div>
            </div>

            <!-- HOJA 3: LECTURA / CONTRAPORTADA -->
            <div class="l-page" id="pc-page3" style="z-index: 1;">
                <div class="l-front">
                    <div class="l-story-header">
                        <button class="l-back-btn" onclick="closeLeyendaStory()">❮ Volver</button>
                        <h2 class="l-story-title" id="pc-story-header-title">Título</h2>
                    </div>
                    <div id="pc-story-content" class="l-scrollable-content"></div>
                    <button id="pc-continue-btn" class="l-btn" style="width:100%; display:none; margin-bottom: 10px;" onclick="nextLeyendaParagraph()">Continuar</button>
                    <button id="pc-finish-btn" class="l-btn l-btn-blue" style="width:100%; display:none; margin-bottom: 10px;" onclick="closeLeyendaStory()">¡Completado!</button>
                </div>
                <div class="l-back l-cover">
                    <div class="l-cover-title" style="font-size: 3rem;">FIN</div>
                </div>
            </div>
        </div>

        <!-- VERSIÓN MÓVIL (1 CARA, PARA QUE NO SE CORTE) -->
        <div class="l-book hide-on-pc" id="leyendas-book-mobile">
            <div class="l-page" id="mb-page0" style="z-index: 5;">
                <div class="l-front l-cover">
                    <div class="l-cover-subtitle">Mitos y</div>
                    <div class="l-cover-title">LEYENDAS</div>
                    <button class="l-btn" onclick="openLeyendasBook()">Abrir &#8594;</button>
                    <div class="l-swipe-hint">O desliza hacia la izquierda &larr;</div>
                </div>
                <div class="l-back" style="background:var(--pri);"></div>
            </div>

            <div class="l-page" id="mb-page1" style="z-index: 4;">
                <div class="l-front">
                    <div style="text-align: center; margin-top: 40px;">
                        <img src="{{ asset('nuevo_icono_transparent.png') }}" style="width:120px; border-radius:50%; margin-bottom:10px; pointer-events:none;">
                        <h2 style="color: #4b4b4b;">¡Bienvenido!</h2>
                        <p style="color: #777; font-size: 1.1rem; line-height: 1.5; font-weight: bold;">
                            Desliza para elegir una leyenda. <br><br>
                            Toca el texto en quechua para ver su traducción.
                        </p>
                        <button class="l-btn l-btn-red" style="margin-top: 40px;" onclick="hideLeyendas()">Cerrar Cuaderno</button>
                    </div>
                </div>
                <div class="l-back"></div>
            </div>

            <div class="l-page" id="mb-page2" style="z-index: 3;">
                <div class="l-front">
                    <h2 class="l-menu-title">Elige una Leyenda</h2>
                    <div class="l-legend-btn" onclick="loadLeyenda('duende')">
                        <div class="l-legend-icon">🍄</div>
                        <div class="l-legend-name">El Duende</div>
                    </div>
                    <div class="l-legend-btn" onclick="loadLeyenda('viudita')">
                        <div class="l-legend-icon">👰‍♀️</div>
                        <div class="l-legend-name">La Viudita</div>
                    </div>
                    <div class="l-legend-btn" onclick="loadLeyenda('carreton')">
                        <div class="l-legend-icon">🐂</div>
                        <div class="l-legend-name">El Carretón</div>
                    </div>
                </div>
                <div class="l-back"></div>
            </div>

            <div class="l-page" id="mb-page3" style="z-index: 2;">
                <div class="l-front">
                    <div class="l-story-header">
                        <button class="l-back-btn" onclick="closeLeyendaStory()">❮ Volver</button>
                        <h2 class="l-story-title" id="mb-story-header-title">Título</h2>
                    </div>
                    <div class="l-image-container" id="mb-story-img-container" style="display:none; margin-bottom: 20px;">
                        <img id="mb-story-image" src="" alt="Ilustración">
                    </div>
                    <div id="mb-story-content" class="l-scrollable-content"></div>
                    <button id="mb-continue-btn" class="l-btn" style="width:100%; display:none; margin-bottom: 10px;" onclick="nextLeyendaParagraph()">Continuar</button>
                    <button id="mb-finish-btn" class="l-btn l-btn-blue" style="width:100%; display:none; margin-bottom: 10px;" onclick="closeLeyendaStory()">¡Completado!</button>
                </div>
                <div class="l-back"></div>
            </div>
            
            <div class="l-page" id="mb-page4" style="z-index: 1;">
                <div class="l-front l-cover">
                    <div class="l-cover-title" style="font-size: 3rem;">FIN</div>
                </div>
                <div class="l-back" style="background:var(--pri);"></div>
            </div>
        </div>
    </div>

</div>

    <!-- ========== MINIJUEGO ORDENA ========== -->
    <div id="ordena-view">
        <div class="o-game-container">
            
            <!-- Pantalla de Inicio -->
            <div id="o-start-screen" class="o-start-screen">
                <h2>Ordena las Palabras</h2>
                <p>Toca el botón para empezar a ordenar oraciones en quechua.</p>
                <img src="{{ asset('nuevo_icono_transparent.png') }}" alt="Inicia el nivel" onclick="oStartGame()">
                <h3 style="color:var(--gold);">¡Empieza ahora!</h3>
                <button class="o-action-btn" style="margin-top: 40px; width: auto; padding: 10px 20px;" onclick="hideOrdenaGame()">Volver al Mapa</button>
            </div>

            <!-- Pantalla de Juego -->
            <div id="o-game-screen" style="display: none; flex-direction: column; height: 100%;">
                <div class="o-header">
                    <button onclick="hideOrdenaGame()" style="background:none; border:none; color:var(--muted); font-size:1.5rem; cursor:pointer;">&times;</button>
                    <div class="o-progress-container">
                        <div class="o-progress-bar" id="o-progress-bar"></div>
                    </div>
                    <div class="o-lives">❤️ <span id="o-lives-count">3</span></div>
                </div>

                <div class="o-level-content">
                    <h2>Traduce esta oración</h2>
                    <div class="o-translation" id="o-spanish-text">Cargando...</div>
                    
                    <div class="o-drop-zone" id="o-drop-zone"></div>
                    <div class="o-word-bank" id="o-word-bank"></div>
                </div>

                <div class="o-footer" id="o-footer">
                    <div class="o-feedback-msg" id="o-feedback-msg"></div>
                    <button class="o-action-btn" id="o-check-btn" onclick="oCheckOrNext()">COMPROBAR</button>
                </div>
            </div>

            <!-- Pantalla Final -->
            <div id="o-end-screen" class="o-end-screen">
                <h1>¡Lección Completada!</h1>
                <p>Has ordenado correctamente todas las oraciones.</p>
                
                <div class="o-bonus-life" id="o-bonus-life">
                    <h2 style="color: var(--gold);">¡Misión Perfecta!</h2>
                    <p style="color: rgba(255,255,255,0.7); margin-bottom: 10px;">0 Errores cometidos.</p>
                    <h1 style="color: #ff4b4b; text-shadow: none;">+1 ❤️ VIDA EXTRA</h1>
                </div>
                
                <button class="o-action-btn active" style="margin-top: 40px; width: 80%;" onclick="hideOrdenaGame()">Volver al Mapa</button>
            </div>

            <!-- Modal Game Over -->
            <div id="o-game-over" class="o-game-over-modal">
                <div class="o-game-over-content">
                    <img src="{{ asset('nuevo_icono_transparent.png') }}" alt="Sin vidas">
                    <h2>¡Te has quedado sin vidas!</h2>
                    <p>No te rindas, vuelve a intentarlo para dominar estas oraciones.</p>
                    <button class="o-action-btn error" style="margin-top: 10px; width: 100%;" onclick="closeOrdenaGameOver()">REINTENTAR</button>
                </div>
            </div>

        </div>
    </div>

<!-- ========== SUBMENÚ ========== -->
<div id="submenu">
    <div class="sm-inner">
        <div class="sm-header">
            <div class="sm-back" onclick="closeSubmenu()"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.5"><polyline points="15 18 9 12 15 6"/></svg></div>
            <div class="sm-cat-info"><div class="sm-cat-img" id="smCatImg"><svg viewBox="0 0 64 64" fill="none"><circle cx="32" cy="32" r="20" stroke="#E8450A" stroke-width="1.5" fill="rgba(232,69,10,0.1)"/></svg></div><div><div class="sm-cat-name" id="smCatName">Categoría</div><div class="sm-cat-sub">Elige tu modo de juego</div></div></div>
        </div>
        <div class="sm-divider"></div>
        <div class="sm-sec-title">Modos de juego disponibles</div>
        <div class="sm-grid" id="smGrid">
            <a class="mode-card" data-mode="multiple" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div><div class="mc-name">Opción Múltiple</div><div class="mc-desc">Elige la respuesta correcta entre varias opciones.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="flashcards" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><rect x="2" y="5" width="20" height="14" rx="3"/><line x1="2" y1="10" x2="22" y2="10"/></svg></div><div class="mc-name">Flashcards</div><div class="mc-desc">Voltea las tarjetas y memoriza palabras en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="match" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><circle cx="6" cy="6" r="3"/><circle cx="18" cy="18" r="3"/><path d="M9 6h3a3 3 0 0 1 3 3v6"/></svg></div><div class="mc-name">Relacionar</div><div class="mc-desc">Conecta cada palabra en español con su traducción en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
            <a class="mode-card" data-mode="escribir" href="#"><div class="mc-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg></div><div class="mc-name">¿Cómo se dice?</div><div class="mc-desc">Escribe cómo se dice la palabra mostrada en quechua.</div><span class="mc-badge">Jugar ahora ▶</span></a>
        </div>
    </div>
</div>

<!-- ========== MODAL LOGROS ========== -->
<div class="overlay" id="logrosModal" onclick="closeModal('logrosModal')">
    <div class="sheet" onclick="event.stopPropagation()">
        <div class="profile-ava"><svg viewBox="0 0 24 24" fill="#FFD166"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg></div>
        <div class="profile-name">Mis Logros</div>
        <div class="profile-stats"><div class="ps-item"><span class="ps-val">6</span><span class="ps-lbl">Categorías</span></div><div class="ps-item"><span class="ps-val">{{ $puntuacion }}</span><span class="ps-lbl">Puntos</span></div></div>
        <hr class="sh-divider">
        <div class="logro-list"><div class="logro-item"><svg viewBox="0 0 24 24" fill="#FFD166"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg><div><div class="logro-name">Primera lección</div><div class="logro-desc">Completaste tu primera lección</div></div></div><div class="logro-item {{ $racha >= 7 ? '' : 'logro-locked' }}"><svg viewBox="0 0 24 24" fill="none" stroke="#F5A623" stroke-width="2"><path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"/></svg><div><div class="logro-name">Racha de 7 días</div><div class="logro-desc">Juega 7 días seguidos</div></div></div><div class="logro-item {{ $puntuacion >= 100 ? '' : 'logro-locked' }}"><svg viewBox="0 0 24 24" fill="none" stroke="#00C9A7" stroke-width="2"><path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg><div><div class="logro-name">100 Puntos</div><div class="logro-desc">Alcanza 100 puntos en quechua</div></div></div></div>
        <button class="sh-btn" onclick="closeModal('logrosModal')">Cerrar</button>
    </div>
</div>

<!-- ========== MODAL PERFIL ========== -->
<div class="overlay" id="profileModal" onclick="closeModal('profileModal')">
    <div class="sheet" onclick="event.stopPropagation()">
        <div class="profile-ava">
            @if(isset($avatar) && (str_starts_with($avatar, '/uploads/') || str_starts_with($avatar, 'http')))
                <img src="{{ asset($avatar) }}" alt="Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
            @elseif(isset($avatar) && $avatar === 'llama')
                <span style="font-size: 38px;">🦙</span>
            @elseif(isset($avatar) && $avatar === 'condor')
                <span style="font-size: 38px;">🦅</span>
            @elseif(isset($avatar) && $avatar === 'inca')
                <span style="font-size: 38px;">👑</span>
            @elseif(isset($avatar) && $avatar === 'coya')
                <span style="font-size: 38px;">👸</span>
            @elseif(isset($avatar) && $avatar === 'inti')
                <span style="font-size: 38px;">☀️</span>
            @elseif(isset($avatar) && $avatar === 'chakana')
                <span style="font-size: 38px;">🏔️</span>
            @elseif(isset($avatar) && $avatar === 'puma')
                <span style="font-size: 38px;">🏹</span>
            @elseif(isset($avatar) && $avatar === 'diablada')
                <span style="font-size: 38px;">🎭</span>
            @else
                <svg viewBox="0 0 24 24" fill="none" stroke="#F0DCC0" stroke-width="1.8"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            @endif
        </div>
        <div class="profile-name">{{ $nombreUsuario }}</div>
        <div class="profile-stats"><div class="ps-item"><span class="ps-val">{{ $puntuacion }}</span><span class="ps-lbl">Puntos</span></div><div class="ps-item"><span class="ps-val">{{ $racha }}</span><span class="ps-lbl">Racha</span></div><div class="ps-item"><span class="ps-val">{{ $vidas }}</span><span class="ps-lbl">Vidas</span></div></div>
        <hr class="sh-divider">
        <button type="button" class="sh-btn" id="toggleMusicBtn" onclick="toggleMusic()">🔊 Silenciar Música</button>
        <button type="button" class="sh-btn" onclick="toggleTheme()">🌓 Alternar Modo Claro / Oscuro</button>
        <button type="button" class="sh-btn" style="background: linear-gradient(135deg, var(--pri), var(--pri-dk)); color: #fff; font-weight: 700;" onclick="window.location.href='{{ route('profile.edit') }}'">🌟 Ver Perfil Completo y Avatar</button>
        <form method="POST" action="{{ route('logout') }}">@csrf<button type="submit" class="sh-btn" style="color: #ff7676;">Cerrar sesión</button></form>
        <button class="sh-btn" onclick="closeModal('profileModal')">Cerrar</button>
    </div>
</div>

<script>
    // Animación de mascota ping-pong
    const animFrames = [];
    for (let i = 1; i <= 40; i++) {
        if (i <= 10) {
            animFrames.push(`{{ asset('frames de saludo sin fondo/frame_') }}${i}.png`);
        } else {
            animFrames.push(`{{ asset('frames de saludo sin fondo/frame_') }}${i}-removebg-preview.png`);
        }
    }
    const splashImg = document.querySelector('.splash-llama');
    const glImg = document.querySelector('.gl-icon');
    const dashboardImg = document.querySelector('.dashboard-llama');
    let frameIdx = 0;
    let animDir = 1;
    setInterval(() => {
        if (splashImg && document.getElementById('splash').style.display !== 'none') {
            splashImg.src = animFrames[frameIdx];
        }
        if (glImg && document.getElementById('gameLoader').style.display !== 'none') {
            glImg.src = animFrames[frameIdx];
        }
        if (dashboardImg) {
            dashboardImg.src = animFrames[frameIdx];
        }
        
        frameIdx += animDir;
        if (frameIdx >= 39) { animDir = -1; frameIdx = 39; }
        if (frameIdx <= 0) { animDir = 1; frameIdx = 0; }
    }, 45); // ~22fps

    // Partículas splash
    for (let i = 0; i < 40; i++) {
        let p = document.createElement('div');
        p.className = 'sp';
        p.style.cssText = `left:${Math.random()*100}%;top:${72+Math.random()*28}%;width:${2+Math.random()*3.5}px;height:${2+Math.random()*3.5}px;background:${Math.random()>.5?'#F5A623':'#E8450A'};animation-duration:${3+Math.random()*6}s;animation-delay:${Math.random()*4}s;box-shadow:0 0 ${4+Math.random()*3}px ${Math.random()>.5?'#F5A623':'#E8450A'};`;
        document.getElementById('spCont').appendChild(p);
    }
    let pct = 0;
    let interval = setInterval(() => { pct = Math.min(pct + Math.floor(Math.random()*8)+2, 100); document.getElementById('lPct').innerText = pct+'%'; if(pct>=100) clearInterval(interval); }, 70);
    setTimeout(() => {
        document.getElementById('splash').classList.add('splash-exit');
        setTimeout(() => { document.getElementById('splash').style.display = 'none'; document.getElementById('app').classList.add('visible'); spawnLobbyParticlesLoop(); }, 650);
    }, 3800);
    function spawnLobbyParticlesLoop() { for(let i=0;i<35;i++) setTimeout(spawnLP, i*90); setInterval(spawnLP, 270); }
    function spawnLP() { let p = document.createElement('div'); p.className = 'lp'; let s = 2+Math.random()*4; p.style.cssText = `left:${Math.random()*100}%;bottom:${-4+Math.random()*8}%;width:${s}px;height:${s}px;background:${['#F5A623','#E8450A','#FFD166','#FF6B35','#00C9A7'][Math.floor(Math.random()*5)]};animation-duration:${5+Math.random()*8}s;`; document.getElementById('lp').appendChild(p); setTimeout(()=>p.remove(), (5+Math.random()*8)*1000); }
    let currentCat = null;
    function openSubmenu(id, name, icon) {
        currentCat = id;
        document.getElementById('smCatName').innerText = name;
        document.getElementById('submenu').classList.add('open');
        document.body.style.overflow = 'hidden';
        let cards = document.querySelectorAll('#smGrid .mode-card');
        cards.forEach(card => {
            let mode = card.dataset.mode || 'multiple';
            card.href = `/juego/${id}?modo=${mode}`;
        });
    }
    function closeSubmenu() { document.getElementById('submenu').classList.remove('open'); document.body.style.overflow = ''; }
    function showLogros() { document.getElementById('logrosModal').classList.add('show'); }
    function showProfile() { document.getElementById('profileModal').classList.add('show'); }
    function closeModal(id) { document.getElementById(id).classList.remove('show'); }
    window.addEventListener('click', (e) => { if(e.target.classList.contains('overlay')) closeModal(e.target.id); });
    // Modo claro / oscuro persistente
    function updateThemeUI(theme) {
        const btns = document.querySelectorAll('.theme-toggle-btn');
        btns.forEach(btn => {
            const icon = btn.querySelector('.theme-icon');
            const lbl = btn.querySelector('.theme-lbl');
            if (theme === 'light') {
                if (icon) icon.textContent = '🌙';
                if (lbl) lbl.textContent = 'OSCURO';
                btn.title = 'Cambiar a Modo Oscuro';
            } else {
                if (icon) icon.textContent = '☀️';
                if (lbl) lbl.textContent = 'CLARO';
                btn.title = 'Cambiar a Modo Claro';
            }
        });

        // Alternar fondo de video / svg en Cuentos
        const cuentosVideo = document.getElementById('cuentos-bg-video');
        if (cuentosVideo) {
            if (theme === 'dark') {
                if (cuentosVideo.getAttribute('data-current-theme') !== 'dark') {
                    cuentosVideo.src = "{{ asset('images/fondo de arbol modo oscuro.mp4') }}";
                    cuentosVideo.setAttribute('data-current-theme', 'dark');
                }
            } else {
                if (cuentosVideo.getAttribute('data-current-theme') !== 'light') {
                    cuentosVideo.src = "{{ asset('images/fond de arbol modo claro.mp4') }}";
                    cuentosVideo.setAttribute('data-current-theme', 'light');
                }
            }
            cuentosVideo.style.opacity = '1'; // Siempre visible
            cuentosVideo.play().catch(e => console.log('Video play:', e));
        }
    }

    function toggleTheme() {
        const current = document.documentElement.getAttribute('data-theme') || 'dark';
        const next = current === 'dark' ? 'light' : 'dark';
        document.documentElement.setAttribute('data-theme', next);
        localStorage.setItem('boliquechua_theme', next);
        updateThemeUI(next);
        if (typeof closeModal === 'function') {
            closeModal('profileModal');
        }
    }

    // Inicializar UI de tema
    document.addEventListener('DOMContentLoaded', () => {
        const theme = localStorage.getItem('boliquechua_theme') || 'dark';
        document.documentElement.setAttribute('data-theme', theme);
        updateThemeUI(theme);
    });

    function showCuentos() {
        document.getElementById('app').style.display = 'none';
        document.getElementById('cuentos-view').classList.add('active');
        
        const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
        updateThemeUI(currentTheme);
        
        // Cambiar música de fondo al tema del árbol
        switchMusicTo('tree');
    }
    
    function hideCuentos() {
        document.getElementById('cuentos-view').classList.remove('active');
        document.getElementById('app').style.display = 'flex';
        
        // Volver a la música del menú principal
        switchMusicTo('main');
    }
    
    // ====== LÓGICA DE MÚSICA DE FONDO ======
    let isMusicMuted = localStorage.getItem('boliquechua_music_muted') === 'true';
    let currentActiveMusic = 'main'; // 'main' o 'tree'

    function updateMusicUI() {
        const btn = document.getElementById('toggleMusicBtn');
        if (btn) {
            btn.innerHTML = isMusicMuted ? '🔇 Activar Música' : '🔊 Silenciar Música';
            if (isMusicMuted) {
                btn.style.background = '#e74c3c';
                btn.style.color = '#fff';
            } else {
                btn.style.background = 'var(--card)';
                btn.style.color = 'var(--text)';
            }
        }
        
        const mainAudio = document.getElementById('bg-music-main');
        const treeAudio = document.getElementById('bg-music-tree');
        
        let savedVol = localStorage.getItem('boliquechua_music_volume');
        let vol = savedVol !== null ? parseFloat(savedVol) : 1.0;

        if (mainAudio) {
            mainAudio.muted = isMusicMuted;
            mainAudio.volume = vol;
        }
        if (treeAudio) {
            treeAudio.muted = isMusicMuted;
            treeAudio.volume = vol;
        }
        
        if (!isMusicMuted && currentActiveMusic) {
            const activeAudio = currentActiveMusic === 'main' ? mainAudio : treeAudio;
            if (activeAudio) activeAudio.play().catch(e => console.log('Autoplay blocked:', e));
        } else {
            if (mainAudio) mainAudio.pause();
            if (treeAudio) treeAudio.pause();
        }
    }

    function toggleMusic() {
        isMusicMuted = !isMusicMuted;
        localStorage.setItem('boliquechua_music_muted', isMusicMuted);
        updateMusicUI();
    }

    function switchMusicTo(mode) {
        currentActiveMusic = mode;
        const mainAudio = document.getElementById('bg-music-main');
        const treeAudio = document.getElementById('bg-music-tree');
        
        if (mode === 'main') {
            if (treeAudio) treeAudio.pause();
            if (!isMusicMuted && mainAudio) mainAudio.play().catch(e => console.log('Autoplay blocked:', e));
        } else if (mode === 'tree') {
            if (mainAudio) mainAudio.pause();
            if (!isMusicMuted && treeAudio) treeAudio.play().catch(e => console.log('Autoplay blocked:', e));
        }
    }

    // Intentar reanudar la música en cualquier interacción si el navegador la bloqueó al inicio
    const resumeAudioContext = () => {
        if (!isMusicMuted && currentActiveMusic) {
            const audioEl = currentActiveMusic === 'main' ? document.getElementById('bg-music-main') : document.getElementById('bg-music-tree');
            if (audioEl && audioEl.paused) {
                audioEl.play().catch(e => console.log('Autoplay bloqueado (intentando reanudar):', e));
            }
        }
    };
    
    ['click', 'touchstart', 'keydown'].forEach(evt => {
        document.addEventListener(evt, resumeAudioContext, { passive: true });
    });

    document.addEventListener('DOMContentLoaded', () => {
        updateMusicUI();
        const isTreeActive = document.getElementById('cuentos-view') && document.getElementById('cuentos-view').classList.contains('active');
        switchMusicTo(isTreeActive ? 'tree' : 'main');
    });
    
    function showProximamente() {
        document.getElementById('proximamente-view').classList.add('active');
    }
    function hideProximamente() {
        document.getElementById('proximamente-view').classList.remove('active');
    }
    
    // ================= LÓGICA DEL CUADERNO =================
    function showHimnos() {
        document.getElementById('app').style.display = 'none';
        document.getElementById('himnos-view').classList.add('active');
        // Reset book a portada
        currentPage = 0;
        document.querySelectorAll('#himnos-book .page').forEach((p, i) => {
            p.classList.remove('flipped');
            p.style.zIndex = document.querySelectorAll('#himnos-book .page').length - i;
        });
        updateBookButtons();
    }
    
    function hideHimnos() {
        document.getElementById('himnos-view').classList.remove('active');
        document.getElementById('app').style.display = 'flex';
    }

    let currentPage = 0;
    
    function updateBookButtons() {
        const pages = document.querySelectorAll('#himnos-book .page');
        const prevBtn = document.getElementById('bookPrevBtn');
        const nextBtn = document.getElementById('bookNextBtn');
        const book = document.getElementById('himnos-book');
        
        if (!book) return;
        
        prevBtn.disabled = currentPage === 0;
        nextBtn.disabled = currentPage === pages.length;
        
        // Efecto de centrado dinámico en PC
        if (window.innerWidth > 480) {
            if (currentPage > 0 && currentPage < pages.length) {
                book.style.transform = "translateX(175px)";
            } else if (currentPage === pages.length) {
                book.style.transform = "translateX(350px)";
            } else {
                book.style.transform = "translateX(0px)";
            }
        } else {
            book.style.transform = "translateX(0px)"; // En móvil no se traslada
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const nextBtn = document.getElementById('bookNextBtn');
        const prevBtn = document.getElementById('bookPrevBtn');
        
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                const pages = document.querySelectorAll('#himnos-book .page');
                if (currentPage < pages.length) {
                    pages[currentPage].classList.add('flipped');
                    pages[currentPage].style.zIndex = currentPage + 1;
                    currentPage++;
                    updateBookButtons();
                }
            });
        }
        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                const pages = document.querySelectorAll('#himnos-book .page');
                if (currentPage > 0) {
                    currentPage--;
                    pages[currentPage].classList.remove('flipped');
                    pages[currentPage].style.zIndex = pages.length - currentPage;
                    updateBookButtons();
                }
            });
        }

        // ====== GESTOS TÁCTILES Y DE RATÓN (SWIPE) ======
        let touchStartX = 0;
        let touchEndX = 0;
        let isDraggingBook = false;
        const himnosBook = document.getElementById('himnos-book');
        
        if (himnosBook) {
            // Móvil (Táctil)
            himnosBook.addEventListener('touchstart', e => {
                touchStartX = e.changedTouches[0].screenX;
            }, {passive: true});

            himnosBook.addEventListener('touchend', e => {
                touchEndX = e.changedTouches[0].screenX;
                handleHimnoSwipe();
            }, {passive: true});
            
            // PC (Ratón)
            himnosBook.addEventListener('mousedown', e => {
                isDraggingBook = true;
                touchStartX = e.screenX;
            });
            
            window.addEventListener('mouseup', e => {
                if (!isDraggingBook) return;
                isDraggingBook = false;
                touchEndX = e.screenX;
                handleHimnoSwipe();
            });

            function handleHimnoSwipe() {
                if (touchEndX < touchStartX - 50) {
                    // Swipe Izquierda -> Siguiente página
                    if(nextBtn && !nextBtn.disabled) nextBtn.click();
                }
                if (touchEndX > touchStartX + 50) {
                    // Swipe Derecha -> Página anterior
                    if(prevBtn && !prevBtn.disabled) prevBtn.click();
                }
            }
        }
    });

    function goToHimnoPage(targetPageNum) {
        const pages = document.querySelectorAll('#himnos-book .page');
        // Avanza o retrocede páginas hasta llegar al target
        while (currentPage < targetPageNum) {
            pages[currentPage].classList.add('flipped');
            pages[currentPage].style.zIndex = currentPage + 1;
            currentPage++;
        }
        while (currentPage > targetPageNum) {
            currentPage--;
            pages[currentPage].classList.remove('flipped');
            pages[currentPage].style.zIndex = pages.length - currentPage;
        }
        updateBookButtons();
    }
    
    function toggleLang(btn, lang) {
        const container = btn.closest('.page-front, .page-back');
        container.querySelectorAll('.lang-toggle button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        
        container.querySelectorAll('.lyrics').forEach(l => l.style.display = 'none');
        container.querySelector(`.lyrics-${lang}`).style.display = 'block';
    }
    // ==========================================
    // ESTADO GLOBAL DEL CUADERNO LEYENDAS
    // 0 = Cerrado, 1 = Menú, 2 = Leyenda Abierta
    // ==========================================
    let leyendasBookState = 0; // Para PC
    let lMbCurrentPage = 0;    // Para Móvil
    
    function showLeyendas() {
        document.getElementById('app').style.display = 'none';
        document.getElementById('leyendas-view').classList.add('active');
        resetLeyendas();
    }

    function hideLeyendas() {
        const isMobile = window.innerWidth <= 768;
        if (!isMobile && leyendasBookState === 2) closeLeyendaStory();
        
        setTimeout(() => {
            resetLeyendas();
            setTimeout(() => {
                document.getElementById('leyendas-view').classList.remove('active');
                document.getElementById('app').style.display = 'flex';
            }, 600);
        }, (!isMobile && leyendasBookState === 2) ? 600 : 0);
    }

    function resetLeyendas() {
        leyendasBookState = 0;
        lMbCurrentPage = 0;
        
        // Reset PC
        document.querySelectorAll('#leyendas-book-pc .l-page').forEach(p => p.classList.remove('l-flipped'));
        if(document.getElementById('pc-page1')) document.getElementById('pc-page1').style.zIndex = 3;
        if(document.getElementById('pc-page2')) document.getElementById('pc-page2').style.zIndex = 2;
        if(document.getElementById('pc-page3')) document.getElementById('pc-page3').style.zIndex = 1;
        if(document.getElementById('leyendas-book-pc')) document.getElementById('leyendas-book-pc').style.transform = "translateX(0px)";
        
        // Reset Mobile
        document.querySelectorAll('#leyendas-book-mobile .l-page').forEach((p, i) => {
            p.classList.remove('l-flipped');
            p.style.zIndex = 5 - i;
        });
    }

    function openLeyendasBook() {
        const isMobile = window.innerWidth <= 768;
        if (isMobile) {
            if (lMbCurrentPage === 0) {
                document.getElementById('mb-page0').classList.add('l-flipped');
                document.getElementById('mb-page0').style.zIndex = 4;
                lMbCurrentPage = 1; // Muestra Bienvenido
            }
        } else {
            if(leyendasBookState >= 1) return;
            const page1 = document.getElementById('pc-page1');
            const book = document.getElementById('leyendas-book-pc');
            page1.classList.add('l-flipped');
            page1.style.zIndex = 1;
            book.style.transform = "translateX(210px)";
            leyendasBookState = 1;
        }
    }

    function closeLeyendaStory() {
        const isMobile = window.innerWidth <= 768;
        if (isMobile) {
            // Retroceder de Historia a Menú
            document.getElementById('mb-page2').classList.remove('l-flipped');
            setTimeout(() => { document.getElementById('mb-page2').style.zIndex = 3; }, 400);
            lMbCurrentPage = 2;
        } else {
            if(leyendasBookState !== 2) return;
            const page2 = document.getElementById('pc-page2');
            page2.classList.remove('l-flipped');
            setTimeout(() => { page2.style.zIndex = 2; }, 400);
            leyendasBookState = 1;
        }
    }

    // ==========================================
    // GESTOS TÁCTILES Y DE RATÓN (SWIPES)
    // ==========================================
    const lScene = document.getElementById('leyendas-view');
    let lStartX = 0, lStartY = 0, lEndX = 0, lEndY = 0;
    let lIsDragging = false;
    const lSwipeThreshold = 60;

    function handleLDragStart(x, y) {
        lStartX = x; lStartY = y; lIsDragging = true;
    }
    function handleLDragEnd(x, y) {
        if (!lIsDragging) return;
        lEndX = x; lEndY = y; lIsDragging = false;
        processLSwipe();
    }
    function processLSwipe() {
        let deltaX = lEndX - lStartX;
        let deltaY = lEndY - lStartY;
        if (Math.abs(deltaX) > Math.abs(deltaY) && Math.abs(deltaX) > lSwipeThreshold) {
            const isMobile = window.innerWidth <= 768;
            if (deltaX < 0) {
                // Swipe Izquierda (Siguiente)
                if (isMobile) {
                    if (lMbCurrentPage < 4 && lMbCurrentPage !== 2 && lMbCurrentPage !== 3) { // 2=Menu, 3=Story (controlados por botones)
                        document.getElementById(`mb-page${lMbCurrentPage}`).classList.add('l-flipped');
                        document.getElementById(`mb-page${lMbCurrentPage}`).style.zIndex = lMbCurrentPage;
                        lMbCurrentPage++;
                    }
                } else {
                    if (leyendasBookState === 0) openLeyendasBook();
                }
            } else {
                // Swipe Derecha (Atrás)
                if (isMobile) {
                    if (lMbCurrentPage > 0 && lMbCurrentPage !== 3) {
                        lMbCurrentPage--;
                        document.getElementById(`mb-page${lMbCurrentPage}`).classList.remove('l-flipped');
                        document.getElementById(`mb-page${lMbCurrentPage}`).style.zIndex = 5 - lMbCurrentPage;
                    }
                } else {
                    if (leyendasBookState === 1) hideLeyendas();
                    if (leyendasBookState === 2) closeLeyendaStory();
                }
            }
        }
    }

    lScene.addEventListener('touchstart', e => handleLDragStart(e.changedTouches[0].screenX, e.changedTouches[0].screenY), {passive: true});
    lScene.addEventListener('touchend', e => handleLDragEnd(e.changedTouches[0].screenX, e.changedTouches[0].screenY), {passive: true});
    lScene.addEventListener('mousedown', e => handleLDragStart(e.clientX, e.clientY));
    lScene.addEventListener('mouseup', e => handleLDragEnd(e.clientX, e.clientY));
    lScene.addEventListener('mouseleave', () => { lIsDragging = false; });

    // ==========================================
    // BASE DE DATOS Y LÓGICA DE LECTURA
    // ==========================================
    const lStories = {
        duende: {
            title: "El Duende",
            image: "https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/Roberto_Alejandro_Vargas_Valdez-El_duende.png/500px-Roberto_Alejandro_Vargas_Valdez-El_duende.png",
            paragraphs: [
                { q: "Uj juch'uy runa, jatun sombreroyoj, sach'a sach'api tiyan.", s: "Un hombrecito con sombrero grande vive en el monte." },
                { q: "Wawaswan pukllayta munan, chinkachin.", s: "Busca jugar con los niños y se los lleva para perderlos." },
                { q: "Payqa juch'uy makiyoj, manchachikullaj.", s: "Tiene las manos pequeñas y le gusta asustar en las noches." }
            ]
        },
        viudita: {
            title: "La Viudita",
            image: "https://www.soysantacruz.com.bo/Contenidos/Dibujos/D_LEPO/D_LEPO_0019.jpg",
            paragraphs: [
                { q: "Chaupi tutapi, yana p'achayoj warmi purin.", s: "A la medianoche, camina una mujer solitaria vestida de negro." },
                { q: "Machasqa qharispaq mask'an, waqaspa purin.", s: "Busca a los hombres borrachos mientras finge llorar por las calles." },
                { q: "Uyanta qhawaspa, calavera kashan.", s: "Al destapar su velo, los hombres ven que su rostro es una calavera." }
            ]
        },
        carreton: {
            title: "El Carretón",
            image: "https://www.soysantacruz.com.bo/Contenidos/Dibujos/D_LEPO/D_LEPO_0006.jpg",
            paragraphs: [
                { q: "Tuta ch'inpi, k'ullu carretón qaparin.", s: "En el silencio de la madrugada, suena el crujir de un carretón de madera." },
                { q: "Jatun turus aysanku, nina ñawiyoj.", s: "Es jalado por bueyes gigantes que tienen fuego en los ojos." },
                { q: "Supaypa carretonnin, juchasapasta apan.", s: "Es el carretón del diablo, dicen que viene a llevarse a los pecadores." }
            ]
        }
    };

    let lCurrentStory = null;
    let lParagraphIndex = 0;

    function loadLeyenda(storyId) {
        lCurrentStory = lStories[storyId];
        lParagraphIndex = 0;
        
        const isMobile = window.innerWidth <= 768;
        const prefix = isMobile ? 'mb-' : 'pc-';

        document.getElementById(prefix + 'story-image').src = lCurrentStory.image;
        document.getElementById(prefix + 'story-image').style.display = 'block';
        if (document.getElementById(prefix + 'story-image-title')) {
            document.getElementById(prefix + 'story-image-title').textContent = lCurrentStory.title;
        }
        document.getElementById(prefix + 'story-header-title').textContent = lCurrentStory.title;
        
        if (isMobile) {
            document.getElementById('mb-story-img-container').style.display = 'flex';
        }
        
        const contentDiv = document.getElementById(prefix + 'story-content');
        contentDiv.innerHTML = '';
        document.getElementById(prefix + 'continue-btn').style.display = 'none';
        document.getElementById(prefix + 'finish-btn').style.display = 'none';

        if (isMobile) {
            document.getElementById('mb-page2').classList.add('l-flipped');
            document.getElementById('mb-page2').style.zIndex = 2;
            lMbCurrentPage = 3;
        } else {
            const page2 = document.getElementById('pc-page2');
            page2.classList.add('l-flipped');
            page2.style.zIndex = 1; 
            leyendasBookState = 2; 
        }

        setTimeout(renderLeyendaParagraph, 400); 
    }

    function renderLeyendaParagraph() {
        const isMobile = window.innerWidth <= 768;
        const prefix = isMobile ? 'mb-' : 'pc-';
        
        document.getElementById(prefix + 'continue-btn').style.display = 'none';
        const pData = lCurrentStory.paragraphs[lParagraphIndex];
        const contentDiv = document.getElementById(prefix + 'story-content');
        
        const block = document.createElement('div');
        block.className = 'l-paragraph-block';
        
        const quechuaEl = document.createElement('div');
        quechuaEl.className = 'l-quechua-text';
        quechuaEl.textContent = pData.q;
        
        const spanishEl = document.createElement('div');
        spanishEl.className = 'l-spanish-translation';
        spanishEl.textContent = pData.s;
        
        quechuaEl.addEventListener('click', () => {
            spanishEl.style.display = 'block';
            quechuaEl.style.borderColor = 'var(--pri)';
            quechuaEl.style.backgroundColor = 'rgba(255, 122, 0, 0.1)';
            
            if (lParagraphIndex < lCurrentStory.paragraphs.length - 1) {
                document.getElementById(prefix + 'continue-btn').style.display = 'block';
            } else {
                document.getElementById(prefix + 'finish-btn').style.display = 'block';
            }
            setTimeout(() => contentDiv.scrollTo({ top: contentDiv.scrollHeight, behavior: 'smooth' }), 100);
        }, { once: true });
        
        block.appendChild(quechuaEl);
        block.appendChild(spanishEl);
        contentDiv.appendChild(block);
    }

    function nextLeyendaParagraph() {
        lParagraphIndex++;
        if (lParagraphIndex < lCurrentStory.paragraphs.length) {
            renderLeyendaParagraph();
        }
    }

    // ========== LOGICA MINIJUEGO ORDENA ==========
    const oLevels = [
        { spanish: "Yo soy estudiante.", quechua: ["Ñuqa", "yachakuq", "kani"] },
        { spanish: "Él está en la casa.", quechua: ["Payqa", "wasipi", "kachkan"] },
        { spanish: "Buenos días.", quechua: ["Allin", "p'unchaw"] },
        { spanish: "El perro come carne.", quechua: ["Allqu", "aychata", "mikhun"] },
        { spanish: "¿Cómo te llamas?", quechua: ["Imataq", "sutiki?"] }
    ];

    let oCurrentLevel = 0;
    let oLives = 3;
    let oTotalErrors = 0;
    let oCurrentSelectedWords = [];
    let oState = "PLAYING"; 

    function showOrdenaGame() {
        document.getElementById('app').style.display = 'none';
        document.getElementById('ordena-view').classList.add('active');
        
        document.getElementById('o-start-screen').style.display = 'flex';
        document.getElementById('o-game-screen').style.display = 'none';
        document.getElementById('o-end-screen').style.display = 'none';
        document.getElementById('o-game-over').style.display = 'none';
        
        oCurrentLevel = 0;
        oLives = 3;
        oTotalErrors = 0;
        document.getElementById('o-lives-count').innerText = oLives;
        document.getElementById('o-bonus-life').style.display = 'none';
    }

    function hideOrdenaGame() {
        document.getElementById('ordena-view').classList.remove('active');
        document.getElementById('app').style.display = 'block';
    }

    function closeOrdenaGameOver() {
        document.getElementById('o-game-over').style.display = 'none';
        showOrdenaGame(); // Reinicia al inicio
    }

    function oShuffleArray(array) {
        let shuffled = [...array];
        for (let i = shuffled.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [shuffled[i], shuffled[j]] = [shuffled[j], shuffled[i]];
        }
        if(JSON.stringify(shuffled) === JSON.stringify(array) && array.length > 1) {
            return oShuffleArray(array);
        }
        return shuffled;
    }

    function oStartGame() {
        document.getElementById('o-start-screen').style.display = 'none';
        document.getElementById('o-game-screen').style.display = 'flex';
        oLoadLevel();
    }

    function oLoadLevel() {
        if (oCurrentLevel >= oLevels.length) {
            oFinishGame();
            return;
        }

        oState = "PLAYING";
        oCurrentSelectedWords = [];
        const dropZone = document.getElementById('o-drop-zone');
        const wordBank = document.getElementById('o-word-bank');
        dropZone.innerHTML = '';
        wordBank.innerHTML = '';
        
        const footer = document.getElementById('o-footer');
        const feedbackMsg = document.getElementById('o-feedback-msg');
        const checkBtn = document.getElementById('o-check-btn');
        
        footer.style.backgroundColor = 'transparent';
        feedbackMsg.style.display = 'none';
        checkBtn.className = 'o-action-btn';
        checkBtn.innerText = 'COMPROBAR';

        const levelData = oLevels[oCurrentLevel];
        document.getElementById('o-spanish-text').innerText = levelData.spanish;
        
        document.getElementById('o-progress-bar').style.width = `${(oCurrentLevel / oLevels.length) * 100}%`;

        const shuffledWords = oShuffleArray(levelData.quechua);
        
        shuffledWords.forEach((word, index) => {
            const btn = document.createElement('div');
            btn.className = 'o-word-btn';
            btn.innerText = word;
            btn.dataset.id = index;
            btn.onclick = () => oSelectWord(btn, word);
            wordBank.appendChild(btn);
        });
        
        oCheckButtonState();
    }

    function oSelectWord(btn, word) {
        if (oState !== "PLAYING") return;

        btn.classList.add('placeholder');

        const dropBtn = document.createElement('div');
        dropBtn.className = 'o-word-btn';
        dropBtn.innerText = word;
        dropBtn.dataset.originId = btn.dataset.id;
        
        dropBtn.onclick = () => oDeselectWord(dropBtn);
        
        document.getElementById('o-drop-zone').appendChild(dropBtn);
        oCurrentSelectedWords.push(word);
        
        oCheckButtonState();
    }

    function oDeselectWord(dropBtn) {
        if (oState !== "PLAYING") return;

        const originId = dropBtn.dataset.originId;
        const originalBtn = document.getElementById('o-word-bank').querySelector(`.o-word-btn[data-id="${originId}"]`);
        if(originalBtn) originalBtn.classList.remove('placeholder');

        const wordIndex = oCurrentSelectedWords.indexOf(dropBtn.innerText);
        if (wordIndex > -1) {
            oCurrentSelectedWords.splice(wordIndex, 1);
        }
        dropBtn.remove();
        
        oCheckButtonState();
    }

    function oCheckButtonState() {
        const checkBtn = document.getElementById('o-check-btn');
        const totalWords = oLevels[oCurrentLevel].quechua.length;
        if (oCurrentSelectedWords.length === totalWords) {
            checkBtn.classList.add('active');
        } else {
            checkBtn.classList.remove('active');
        }
    }

    function oCheckOrNext() {
        const checkBtn = document.getElementById('o-check-btn');
        if (oState === "PLAYING" && checkBtn.classList.contains('active')) {
            oComprobar();
        } else if (oState === "SUCCESS") {
            oCurrentLevel++;
            oLoadLevel();
        } else if (oState === "ERROR") {
            oLoadLevel();
        }
    }

    function oComprobar() {
        const correctOrder = oLevels[oCurrentLevel].quechua;
        const footer = document.getElementById('o-footer');
        const feedbackMsg = document.getElementById('o-feedback-msg');
        const checkBtn = document.getElementById('o-check-btn');
        
        if (JSON.stringify(oCurrentSelectedWords) === JSON.stringify(correctOrder)) {
            // ¡CORRECTO!
            oState = "SUCCESS";
            footer.style.backgroundColor = 'rgba(255, 74, 16, 0.1)';
            feedbackMsg.style.display = 'block';
            feedbackMsg.style.color = 'var(--pri)';
            feedbackMsg.innerText = '¡Correcto! Muy bien hecho.';
            
            checkBtn.className = 'o-action-btn active';
            checkBtn.innerText = 'CONTINUAR';
        } else {
            // ¡INCORRECTO!
            oState = "ERROR";
            oTotalErrors++;
            oLives--;
            document.getElementById('o-lives-count').innerText = oLives;
            
            footer.style.backgroundColor = 'rgba(255, 75, 75, 0.1)';
            feedbackMsg.style.display = 'block';
            feedbackMsg.style.color = '#ff4b4b';
            feedbackMsg.innerHTML = 'Respuesta correcta:<br>' + correctOrder.join(" ");
            
            checkBtn.className = 'o-action-btn error';
            checkBtn.innerText = 'ENTENDIDO';

            if (oLives <= 0) {
                document.getElementById('o-game-over').style.display = 'flex';
            }
        }
    }

    function oFinishGame() {
        document.getElementById('o-game-screen').style.display = 'none';
        document.getElementById('o-end-screen').style.display = 'flex';
        
        if (oTotalErrors === 0) {
            const bonus = document.getElementById('o-bonus-life');
            bonus.style.display = 'block';
            
            // Petición AJAX para sumar vida real a la BD
            fetch("{{ route('ganar.vida') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Content-Type": "application/json",
                    "Accept": "application/json"
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    // Actualizar UI del usuario (dashboard)
                    document.querySelectorAll('.stat-chip.hp .stat-chip-val, .sm-chip.hp .sm-chip-val, .ps-item:nth-child(3) .ps-val').forEach(el => {
                        el.innerText = data.vidas;
                    });
                }
            })
            .catch(err => console.error("Error al sumar vida:", err));
        }
    }
</script>


    <!-- Background Music Elements -->
    <audio id="bg-music-main" src="{{ asset('canciones de fondo/tema principal.mp3') }}" loop preload="auto"></audio>
    <audio id="bg-music-tree" src="{{ asset('canciones de fondo/tema del arbol.mp3') }}" loop preload="auto"></audio>

</body>
</html>