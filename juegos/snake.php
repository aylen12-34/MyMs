
<?php
session_start();
include("../includes/navjuegos.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serpiente | MyMs</title>
    <link rel="stylesheet" href="snake.css">
    <script src="snake.js" defer></script>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

</head>
<body>

    <main class="contenedor-juego">
        <header class="encabezado-juego">
            <p class="etiqueta">MYMS · JUEGOS</p>
            <h1>Serpiente de galletitas</h1>
            <p class="descripcion">
                ¡Come galletitas y consigue la mayor puntuación!
            </p>
        </header>

        <section class="panel-juego">
            <div class="barra-superior">
                <span>Galletitas recogidas</span>
                <span id="puntuacion">0</span>
            </div>

            <div class="contenedor-canvas">
                <canvas id="tablero" width="480" height="480">
                    Tu navegador no admite canvas.
                </canvas>

                <div id="pantallaFinal" class="pantalla-final" hidden>
                    <div class="tarjeta-final">
                        <span class="galleta-final">🍪</span>
                        <h2>¡Fin de la partida!</h2>
                        <p>
                            Recogiste
                            <strong id="puntuacionFinal">0</strong>
                            galletitas.
                        </p>
                        <button id="reiniciar" type="button">
                            Volver a jugar
                        </button>
                    </div>
                </div>
            </div>

            <p class="instrucciones">
                Usa las flechas del teclado para moverte.
            </p>
        </section>
    </main>

</body>
</html>
