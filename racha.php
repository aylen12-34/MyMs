<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Racha de Fuego Morado</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            height: 100vh;
            overflow: hidden;
            background: #09000f;
            font-family: Arial, sans-serif;
        }

        /* Pantalla principal */
        .pantalla {
            position: relative;
            width: 100%;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Contenido central */
        .racha {
            position: relative;
            z-index: 10;

            text-align: center;
            color: white;

            animation: aparecer 1s ease-out;
        }

        .racha h1 {
            margin: 0;

            font-size: 90px;
            font-weight: bold;

            text-shadow:
                0 0 10px #e0aaff,
                0 0 25px #b026ff,
                0 0 50px #8000ff,
                0 0 80px #4a0072;
        }

        .racha p {
            margin: 10px 0 0;

            font-size: 28px;
            font-weight: bold;

            text-shadow:
                0 0 10px #b026ff,
                0 0 25px #8000ff;
        }


        /* =========================
           FUEGO INFERIOR
        ========================= */

        .fuego {
            position: absolute;
            z-index: 5;

            bottom: -80px;

            width: 120px;
            height: 180px;

            background: linear-gradient(
                to top,
                #4a0072,
                #8000ff,
                #b026ff,
                #e0aaff,
                transparent
            );

            border-radius: 50% 50% 35% 35%;

            filter: blur(8px);

            animation:
                fuegoSubir 1s infinite alternate ease-in-out;
        }


        /* Diferentes posiciones */

        .f1 {
            left: 5%;
            animation-delay: 0s;
            transform: rotate(-8deg);
        }

        .f2 {
            left: 20%;
            animation-delay: .2s;
            transform: rotate(7deg);
        }

        .f3 {
            left: 38%;
            animation-delay: .4s;
            transform: rotate(-5deg);
        }

        .f4 {
            right: 25%;
            animation-delay: .1s;
            transform: rotate(8deg);
        }

        .f5 {
            right: 8%;
            animation-delay: .3s;
            transform: rotate(-7deg);
        }


        /* =========================
           FUEGO LATERAL IZQUIERDO
        ========================= */

        .fuego-izq {
            position: absolute;
            left: -50px;
            top: 0;

            width: 130px;
            height: 100%;

            background: linear-gradient(
                to right,
                #4a0072,
                #8000ff,
                #b026ff,
                transparent
            );

            filter: blur(15px);

            animation:
                invadirIzquierda 2s infinite alternate ease-in-out;
        }


        /* =========================
           FUEGO LATERAL DERECHO
        ========================= */

        .fuego-der {
            position: absolute;
            right: -50px;
            top: 0;

            width: 130px;
            height: 100%;

            background: linear-gradient(
                to left,
                #4a0072,
                #8000ff,
                #b026ff,
                transparent
            );

            filter: blur(15px);

            animation:
                invadirDerecha 2s infinite alternate ease-in-out;
        }


        /* =========================
           CHISPAS
        ========================= */

        .chispa {
            position: absolute;

            width: 7px;
            height: 7px;

            background: #e0aaff;

            border-radius: 50%;

            box-shadow:
                0 0 8px #b026ff,
                0 0 15px #8000ff,
                0 0 25px #d580ff;

            animation:
                chispear 2s infinite ease-out;
        }


        .c1 {
            left: 10%;
            bottom: 20%;
            animation-delay: .2s;
        }

        .c2 {
            left: 25%;
            bottom: 10%;
            animation-delay: .7s;
        }

        .c3 {
            left: 45%;
            bottom: 15%;
            animation-delay: 1s;
        }

        .c4 {
            right: 25%;
            bottom: 20%;
            animation-delay: .4s;
        }

        .c5 {
            right: 10%;
            bottom: 15%;
            animation-delay: 1.2s;
        }

        .c6 {
            right: 40%;
            bottom: 5%;
            animation-delay: .8s;
        }


        /* =========================
           BOTÓN
        ========================= */

        button {
            position: absolute;
            z-index: 20;

            bottom: 40px;

            padding: 15px 30px;

            border: none;
            border-radius: 30px;

            background: #8000ff;
            color: white;

            font-size: 18px;
            font-weight: bold;

            cursor: pointer;

            box-shadow:
                0 0 15px #8000ff,
                0 0 30px #b026ff,
                0 0 45px #4a0072;

            transition: transform .2s;
        }

        button:hover {
            transform: scale(1.08);
        }


        /* =========================
           OSCURECIMIENTO
        ========================= */

        .oscuro {
            position: absolute;
            z-index: 2;

            width: 100%;
            height: 100%;

            background: radial-gradient(
                circle,
                transparent 10%,
                rgba(0, 0, 0, .55) 80%
            );
        }


        /* =========================
           ANIMACIONES
        ========================= */

        @keyframes fuegoSubir {

            from {
                transform:
                    translateY(20px)
                    scale(1);

                opacity: .7;
            }

            to {
                transform:
                    translateY(-40px)
                    scale(1.2);

                opacity: 1;
            }
        }


        @keyframes invadirIzquierda {

            from {
                width: 80px;
            }

            to {
                width: 230px;
            }
        }


        @keyframes invadirDerecha {

            from {
                width: 80px;
            }

            to {
                width: 230px;
            }
        }


        @keyframes chispear {

            0% {
                transform:
                    translateY(0)
                    scale(1);

                opacity: 0;
            }

            20% {
                opacity: 1;
            }

            100% {
                transform:
                    translateY(-250px)
                    translateX(30px)
                    scale(.2);

                opacity: 0;
            }
        }


        @keyframes aparecer {

            from {
                transform: scale(.3);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

    </style>
</head>


<body>

    <div class="pantalla">

        <!-- Oscurecimiento -->
        <div class="oscuro"></div>


        <!-- Fuego inferior -->

        <div class="fuego f1"></div>
        <div class="fuego f2"></div>
        <div class="fuego f3"></div>
        <div class="fuego f4"></div>
        <div class="fuego f5"></div>


        <!-- Fuego lateral -->

        <div class="fuego-izq"></div>
        <div class="fuego-der"></div>


        <!-- Chispas -->

        <div class="chispa c1"></div>
        <div class="chispa c2"></div>
        <div class="chispa c3"></div>
        <div class="chispa c4"></div>
        <div class="chispa c5"></div>
        <div class="chispa c6"></div>


        <!-- Racha -->

        <div class="racha">

            <h1>🔥 <?php echo date('F'); ?></h1>

            <p>
                ¡Empleados del mes!
            </p>

        </div>


        <!-- Botón -->

        <button onclick="reiniciarRacha()">
            🔥 ¡Ver reporte!
        </button>

    </div>


    <script>

        function reiniciarRacha() {

            window.location.href = "reportes.php";

        }

    </script>

</body>
</html>