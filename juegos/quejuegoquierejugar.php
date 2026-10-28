<?php
session_start();
include("../includes/navjuegos.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zona de juegos | MyMs</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

    <style>
        :root {
            --vino: #6A253A;
            --vino-oscuro: #4F1B2C;
            --rosado: #E64B6B;
            --rosado-claro: #F5B5C2;
            --crema: #FFF8F4;
            --crema-oscuro: #EFE2DA;
            --texto-suave: #80656A;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 55px 24px 30px;
            background:
                linear-gradient(#FFF8F4B3, #FFF8F4B3),
                url("../imagenes/2.png") center center / cover fixed no-repeat;
            color: var(--vino-oscuro);
            font-family: 'Chillax-Semibold', sans-serif;
        }

        .zona-juegos {
            width: min(100%, 1100px);
            margin: 0 auto;
        }

        .presentacion {
            margin-bottom: 42px;
            text-align: center;
        }

        .etiqueta {
            display: inline-block;
            margin-bottom: 12px;
            color: var(--rosado);
            font-size: 12px;
            letter-spacing: 3px;
        }

        .presentacion h1 {
            margin: 0;
            color: var(--vino);
            font-size: clamp(32px, 5vw, 48px);
            line-height: 1.2;
        }

        .presentacion p {
            max-width: 570px;
            margin: 16px auto 0;
            color: var(--texto-suave);
            font-size: 15px;
            line-height: 1.8;
        }

        .decoracion {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-top: 22px;
            color: var(--rosado-claro);
            font-size: 20px;
        }

        .decoracion::before,
        .decoracion::after {
            width: 45px;
            height: 1px;
            background: var(--rosado-claro);
            content: "";
        }

        .lista-juegos {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 28px;
        }

        .tarjeta-juego {
            overflow: hidden;
            background: white;
            border: 1px solid #E9D8D0;
            border-radius: 24px;
            box-shadow: 0 12px 35px #6A253A0D;
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .tarjeta-juego:hover {
            transform: translateY(-6px);
            box-shadow: 0 18px 40px #6A253A1A;
        }

        .ilustracion {
            min-height: 225px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .ilustracion-snake {
            gap: 18px;
            background-color: var(--crema-oscuro);
            background-image:
                linear-gradient(#FFF8F4 1px, transparent 1px),
                linear-gradient(90deg, #FFF8F4 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .serpiente-visual {
            display: flex;
            align-items: center;
            gap: 5px;
            transform: rotate(-12deg);
        }

        .segmento {
            width: 29px;
            height: 29px;
            background: var(--vino);
            border-radius: 9px;
            box-shadow: 0 3px 5px #4F1B2C18;
        }

        .segmento:nth-child(2),
        .segmento:nth-child(4) {
            transform: translateY(8px);
        }

        .cabeza-serpiente {
            position: relative;
            width: 37px;
            height: 37px;
            background: var(--vino-oscuro);
            border-radius: 12px;
        }

        .cabeza-serpiente::before {
            position: absolute;
            top: 8px;
            right: 7px;
            width: 5px;
            height: 5px;
            background: var(--crema);
            border-radius: 50%;
            content: "";
            box-shadow: 0 12px 0 var(--crema);
        }

        .galleta-snake {
            position: absolute;
            right: 17%;
            bottom: 32px;
            font-size: 37px;
        }

        .ilustracion-raya {
            background: #F5B5C24D;
        }

        .tablero-raya {
            display: grid;
            grid-template-columns: repeat(3, 54px);
            grid-template-rows: repeat(3, 54px);
            gap: 5px;
            transform: rotate(-3deg);
        }

        .casilla {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--crema);
            border: 1px solid #E9D8D0;
            border-radius: 10px;
            color: var(--vino);
            font-size: 30px;
        }

        .casilla.galleta {
            font-size: 26px;
        }

        .ilustracion-chef-run {
            background: radial-gradient(circle at 50% 35%, #FFF8F4 0%, #F5B5C2 100%);
        }

        .mini-escena {
            position: relative;
            width: 100%;
            height: 225px;
            overflow: hidden;
        }

        .mini-sol {
            position: absolute;
            top: 28px;
            right: 22%;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            background: #FFF8F4;
        }

        .mini-suelo {
            position: absolute;
            right: 0;
            bottom: 36px;
            left: 0;
            height: 5px;
            background: var(--vino);
            box-shadow: 0 12px 0 #6A253A18;
        }

        .mini-dino {
            position: absolute;
            left: 27%;
            bottom: 41px;
            width: 72px;
            height: 78px;
            border-radius: 24px 24px 12px 12px;
            background: var(--vino);
            box-shadow: inset -10px 0 #4F1B2C;
        }

        .mini-dino::before {
            content: "";
            position: absolute;
            left: 8px;
            top: -25px;
            width: 49px;
            height: 28px;
            border-radius: 50% 50% 8px 8px;
            background: white;
            border: 3px solid var(--crema-oscuro);
            box-shadow: 8px -9px 0 -2px white, -5px -7px 0 -2px white;
        }

        .mini-dino::after {
            content: "•";
            position: absolute;
            top: 7px;
            right: 10px;
            color: var(--crema);
            font-size: 24px;
        }

        .mini-obstaculo {
            position: absolute;
            right: 25%;
            bottom: 41px;
            font-size: 39px;
            transform: rotate(-12deg);
        }

        .contenido-tarjeta {
            padding: 26px;
        }

        .categoria {
            color: var(--rosado);
            font-size: 11px;
            letter-spacing: 1.5px;
        }

        .contenido-tarjeta h2 {
            margin: 10px 0;
            color: var(--vino);
            font-size: 29px;
        }

        .contenido-tarjeta p {
            min-height: 76px;
            margin: 0 0 23px;
            color: var(--texto-suave);
            font-size: 14px;
            line-height: 1.8;
        }

        .boton-jugar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 18px;
            background: var(--vino);
            border-radius: 13px;
            color: white;
            font-size: 14px;
            text-decoration: none;
            transition: background 0.2s, transform 0.2s;
        }

        .boton-jugar:hover {
            background: var(--rosado);
            transform: translateY(-2px);
        }

        .flecha {
            font-size: 22px;
        }

        .pie-juegos {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            margin-top: 38px;
            padding-top: 22px;
            border-top: 1px solid #E9D8D0;
            color: var(--texto-suave);
            font-size: 12px;
        }

        .volver {
            color: var(--vino);
            text-decoration: none;
            transition: color 0.2s;
        }

        .volver:hover {
            color: var(--rosado);
        }

        @media (max-width: 700px) {
            body {
                padding: 35px 16px 24px;
            }

            .lista-juegos {
                grid-template-columns: 1fr;
                gap: 22px;
            }

            .presentacion {
                margin-bottom: 30px;
            }

            .ilustracion {
                min-height: 190px;
            }

            .contenido-tarjeta p {
                min-height: auto;
            }

            .pie-juegos {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                transition: none !important;
            }

        }
    </style>
</head>

<body>

    <main class="zona-juegos">

        <header class="presentacion">
            <span class="etiqueta">MYMS · UN MOMENTO PARA TI</span>

            <h1>¿A qué quieres jugar?</h1>

            <p>
                ¡Bienvenido a nuestra zona de juegos!
                Elige tu favorito, diviértete y disfruta
                de un pequeño descanso con sabor a galletitas.
            </p>

            <div class="decoracion">🍪</div>
        </header>

        <section class="lista-juegos">

            <article class="tarjeta-juego">
                <div class="ilustracion ilustracion-snake">
                    <div class="serpiente-visual">
                        <div class="cabeza-serpiente"></div>
                        <div class="segmento"></div>
                        <div class="segmento"></div>
                        <div class="segmento"></div>
                        <div class="segmento"></div>
                    </div>

                    <span class="galleta-snake">🍪</span>
                </div>

                <div class="contenido-tarjeta">
                    <span class="categoria">REFLEJOS · DIVERSIÓN</span>
                    <h2>Snake</h2>

                    <p>
                        Controla tu serpiente, recoge las galletitas
                        de MyMs y hazla crecer sin chocar contra
                        las paredes ni contra ti mismo.
                    </p>

                    <a href="snake.php" class="boton-jugar">
                        <span>Jugar Snake</span>
                        <span class="flecha">→</span>
                    </a>
                </div>
            </article>

            <article class="tarjeta-juego">
                <div class="ilustracion ilustracion-raya">
                    <div class="tablero-raya">
                        <div class="casilla galleta">🍪</div>
                        <div class="casilla">×</div>
                        <div class="casilla">○</div>

                        <div class="casilla">○</div>
                        <div class="casilla galleta">🍪</div>
                        <div class="casilla">×</div>

                        <div class="casilla">×</div>
                        <div class="casilla">○</div>
                        <div class="casilla galleta">🍪</div>
                    </div>
                </div>

                <div class="contenido-tarjeta">
                    <span class="categoria">ESTRATEGIA · RETOS</span>
                    <h2>Tres en Raya</h2>

                    <p>
                        Pon a prueba tu estrategia, completa
                        una línea de tres y vence a tu rival.
                        ¿Podrás ganar la partida?
                    </p>

                    <a href="tresenraya.php" class="boton-jugar">
                        <span>Jugar Tres en Raya</span>
                        <span class="flecha">→</span>
                    </a>
                </div>
            </article>

            <article class="tarjeta-juego">
                <div class="ilustracion ilustracion-chef-run">
                    <div class="mini-escena" aria-hidden="true">
                        <div class="mini-sol"></div>
                        <div class="mini-dino"></div>
                        <span class="mini-obstaculo">🧁</span>
                        <div class="mini-suelo"></div>
                    </div>
                </div>

                <div class="contenido-tarjeta">
                    <span class="categoria">REFLEJOS · VELOCIDAD</span>
                    <h2>MyMs Chef Run</h2>

                    <p>
                        ¡Corre con nuestro dinosaurio chef! Salta los cupcakes,
                        esquiva los rodillos y consigue la mayor puntuación
                        mientras la cocina se vuelve cada vez más rápida.
                    </p>

                    <a href="thecube/index.php" class="boton-jugar">
                        <span>Jugar Chef Run</span>
                        <span class="flecha">→</span>
                    </a>
                </div>
            </article>

        </section>

        <footer class="pie-juegos">
            <span>Un toque dulce en cada partida · MyMs</span>
        </footer>

    </main>

</body>
</html>