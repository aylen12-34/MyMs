<?php
session_start();
include("../../includes/navcubo.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyMs Chef Run | Zona de juegos</title>
    <link rel="stylesheet" href="../../../tipografia/Fonts/WEB/css/chillax.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js?v=20261028fix1" defer></script>
</head>
<body class="chef-run-body">
<main class="chef-run-page">
    <header class="chef-run-heading">
        <span class="chef-run-label">MYMS · ZONA DE JUEGOS</span>
        <h1>MyMs Chef Run</h1>
        <p>¡Corre, salta y esquiva los dulces de la cocina!</p>
    </header>
    <section class="chef-run-panel" aria-label="Juego MyMs Chef Run">
        <div class="chef-run-toolbar">
            <div class="score-block"><span>PUNTOS</span><strong id="score">00000</strong></div>
            <div class="score-block"><span>RÉCORD</span><strong id="best">00000</strong></div>
        </div>
        <div class="canvas-wrap">
            <canvas id="chefCanvas" width="960" height="320" aria-label="Juego de correr. Pulsa espacio o toca para saltar."></canvas>
            <div class="game-overlay" id="gameOverlay">
                <div class="overlay-card">
                    <span class="overlay-cookie" id="overlayIcon">🍪</span>
                    <h2 id="overlayTitle">¡A cocinar y correr!</h2>
                    <p id="overlayText">Salta los cupcakes y rodillos. Pulsa espacio, ↑ o toca el juego para empezar.</p>
                    <button id="startButton" type="button">¡Empezar!</button>
                </div>
            </div>
        </div>
        <div class="chef-run-bottom">
            <p>Espacio / ↑ para saltar · ↓ para agacharte · En móvil, toca para saltar</p>
            <button id="restartButton" type="button" class="restart-button">↻ Reiniciar</button>
        </div>
    </section>
    <p class="chef-run-footnote">Un toque dulce en cada partida · MyMs</p>
</main>
</body>
</html>
