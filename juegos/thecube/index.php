<?php
session_start();
include("../../includes/navcubo.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#FFF8F4">
    <title>MyMs Chef Run | Zona de juegos</title>
    <link rel="stylesheet" href="../../tipografia/Fonts/WEB/css/chillax.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js?v=chef-run-fix-2" defer></script>
</head>
<body class="chef-run-body">
<main class="chef-run-page">
    <header class="chef-run-heading">
        <span class="chef-run-label"><span class="label-dot"></span> MYMS · ZONA DE JUEGOS</span>
        <h1>Chef <span>Run!</span></h1>
        <p>Salta los dulces, esquiva los utensilios y sigue corriendo.</p>
    </header>
    <section class="chef-run-panel" aria-label="Juego MyMs Chef Run">
        <div class="panel-topline"><span><i class="live-dot"></i> CARRERA DE REPOSTERÍA</span><span class="level-chip" id="levelChip">NIVEL 01 · COCINA</span></div>
        <div class="chef-run-toolbar">
            <div class="score-block score-current"><span class="score-icon" aria-hidden="true">✦</span><div><small>PUNTOS</small><strong id="score">00000</strong></div></div>
            <div class="score-block score-best"><span class="score-icon" aria-hidden="true">♛</span><div><small>RÉCORD</small><strong id="best">00000</strong></div></div>
            <div class="speed-meter" aria-label="Velocidad"><span>RITMO</span><div class="speed-track"><i id="speedFill"></i></div></div>
        </div>
        <div class="canvas-wrap" id="canvasWrap">
            <canvas id="chefCanvas" width="960" height="360" aria-label="Juego de correr. Pulsa espacio o toca para saltar."></canvas>
            <div class="game-overlay" id="gameOverlay">
                <div class="overlay-card">
                    <div class="overlay-emblem" aria-hidden="true"><span id="overlayIcon">🍪</span></div>
                    <span class="overlay-eyebrow" id="overlayEyebrow">PREPARA · LISTA · ¡CORRE!</span>
                    <h2 id="overlayTitle">¡A hornear la victoria!</h2>
                    <p id="overlayText">Salta los dulces, esquiva los utensilios y consigue el récord de la cocina.</p>
                    <button id="startButton" type="button"><span>¡A jugar!</span><b aria-hidden="true">→</b></button>
                    <div class="overlay-hint"><kbd>ESPACIO</kbd><span>o toca para saltar</span></div>
                </div>
            </div>
            <div class="toast-message" id="toastMessage" aria-live="polite"></div>
        </div>
        <div class="chef-run-bottom">
            <div class="controls-hint"><span class="keycap">SPACE</span><span class="keycap">↑</span><span>SALTAR</span><i></i><span class="keycap">↓</span><span>AGACHARSE</span></div>
            <button id="restartButton" type="button" class="restart-button"><span aria-hidden="true">↻</span> Reiniciar</button>
        </div>
    </section>
    <div class="run-tip"><span class="tip-icon" aria-hidden="true">✦</span><p><strong>Consejo de chef:</strong> a medida que avances, el ritmo subirá y cambiarás de escenario.</p><span class="tip-cookie" aria-hidden="true">✦</span></div>
    <footer class="chef-run-footnote"><span>MYMS</span> · Un toque dulce en cada partida</footer>
</main>
</body>
</html>
