<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

<link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <title>Reportes</title>

    <style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Chillax-Semibold';
}


/* =========================
   BODY
========================= */

body {
    margin: 0;
    height: 100vh;
    overflow: hidden;

    font-family: 'Chillax-Semibold';

    /* =========================
       FONDO
    ========================= */

    background-image: url("imagenes/2.png");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


/* =========================
   PANTALLA PRINCIPAL
========================= */

.pantalla {
    position: relative;

    width: 100%;
    height: 100vh;

    display: flex;
    justify-content: center;
    align-items: center;

    overflow: hidden;
}


/* =========================
   CONTENIDO CENTRAL
========================= */

.racha {
    position: relative;
    z-index: 10;

    text-align: center;
    color: white;

    animation: aparecer 1s ease-out;
}


/* =========================
   TÍTULO
========================= */

/* =========================
   TÍTULO CENTRAL
========================= */

.racha h1 {
    margin: 0;

    font-size: 90px;
    font-weight: bold;

    font-family: 'Chillax-Semibold';

    /* Color oscuro de la paleta */
    color: #6A253A;

    /* Sombra blanca brillante */
    text-shadow:
        0 0 3px rgba(255, 255, 255, 0.75),
        0 0 7px rgba(255, 255, 255, 0.35);

    /* Agrandamiento muy leve */
    animation: crecerTexto 3s ease-in-out infinite;
}


/* =========================
   GATITO
========================= */

.racha h1 img {
    vertical-align: middle;

    width: 100px;

    /* Brillo blanco muy suave */
    filter:
        drop-shadow(0 0 3px rgba(255, 255, 255, 0.65))
        drop-shadow(0 0 7px rgba(255, 255, 255, 0.25));

    transition: filter 0.3s ease;
}


/* =========================
   BRILLO DEL GATITO
========================= */

.racha h1 img:hover {
    filter:
        drop-shadow(0 0 4px rgba(255, 255, 255, 0.85))
        drop-shadow(0 0 9px rgba(255, 255, 255, 0.35));
}


/* =========================
   TEXTO "VER REPORTES"
========================= */

.racha p {
    margin: 10px 0 0;

    font-size: 28px;
    font-weight: bold;

    font-family: 'Chillax-Semibold';

    /* Morado oscuro */
    color: #6A253A;

    /* Sombra blanca brillante */
    text-shadow:
        0 0 3px rgba(255, 255, 255, 0.8),
        0 0 8px rgba(255, 255, 255, 0.35);

    /* Misma animación, ligeramente más suave */
    animation: crecerTexto 3s ease-in-out infinite;
}


/* =========================
   ANIMACIÓN DE AGRANDAMIENTO
========================= */

@keyframes crecerTexto {

    0% {
        transform: scale(1);
    }

    50% {
        transform: scale(1.025);
    }

    100% {
        transform: scale(1);
    }

}
/* =========================
   GALLETAS
========================= */

.galleta {
    position: absolute;

    z-index: 5;

    width: 390px;
    height: 390px;

    object-fit: contain;

    animation: saltoGalleta 3s infinite ease-in-out;
}


/* =========================
   POSICIONES DE GALLETAS
========================= */

.g1 {
    left: 5%;
    bottom: 8%;

    animation-delay: 0s;
}

.g2 {
    left: 22%;
    bottom: 12%;

    animation-delay: .45s;
}

.g3 {
    left: 42%;
    bottom: 5%;

    animation: saltoGalletaVuelta 3.1s infinite ease-in-out;
    animation-delay: .9s;
}

.g4 {
    right: 22%;
    bottom: 11%;

    animation-delay: .25s;
}

.g5 {
    right: 5%;
    bottom: 7%;

    animation-delay: .7s;
}


/* =========================
   BOTONES
========================= */

.botones {
    position: absolute;

    bottom: 45px;

    left: 50%;
    transform: translateX(-50%);

    z-index: 20;

    display: flex;

    justify-content: center;
    align-items: center;

    gap: 15px;

    width: 90%;
}


/* =========================
   BOTONES INDIVIDUALES
========================= */

.botones button {
    min-width: 200px;

    padding: 14px 20px;

    border: 2px solid #6A253A;

    border-radius: 12px;

    background: #6A253A;

    color: #EFE2DA;

    font-family: 'Chillax-Semibold';

    font-size: 16px;
    font-weight: bold;

    cursor: pointer;

    transition:
        transform 0.3s ease,
        background 0.3s ease,
        border-color 0.3s ease,
        box-shadow 0.3s ease,
        text-shadow 0.3s ease;

    /* Sombra normal */
    box-shadow:
        0 4px 10px rgba(106, 37, 58, 0.20);

    /* Brillo casi nulo en las letras */
    text-shadow:
        0 0 2px rgba(239, 226, 218, 0.25);
}


/* =========================
   HOVER DE BOTONES
========================= */

.botones button:hover {

    transform: translateY(-3px);

    background: #E64B6B;

    border-color: #EFE2DA;

    color: #EFE2DA;

    /* Brillo MUY suave */
    box-shadow:
        0 0 5px rgba(239, 226, 218, 0.35),
        0 0 12px rgba(239, 226, 218, 0.15),
        0 6px 15px rgba(106, 37, 58, 0.25);

    text-shadow:
        0 0 4px rgba(239, 226, 218, 0.45);
}


/* =========================
   ENLACES
========================= */

.botones a {
    text-decoration: none;
}


/* =========================
   ANIMACIÓN DE GALLETAS
========================= */

@keyframes saltoGalleta {

    0% {
        transform: translateY(0) rotate(0deg);
    }

    25% {
        transform: translateY(-45px) rotate(-5deg);
    }

    50% {
        transform: translateY(0) rotate(5deg);
    }

    75% {
        transform: translateY(-25px) rotate(-3deg);
    }

    100% {
        transform: translateY(0) rotate(0deg);
    }
}


/* =========================
   GALLETA QUE DA LA VUELTA
========================= */

@keyframes saltoGalletaVuelta {

    /* =========================
       SUBIDA SUAVE
    ========================= */

    0% {
        transform: translateY(0) rotate(0deg);
    }

    5% {
        transform: translateY(-8px) rotate(0deg);
    }

    10% {
        transform: translateY(-20px) rotate(0deg);
    }

    15% {
        transform: translateY(-35px) rotate(0deg);
    }

    20% {
        transform: translateY(-52px) rotate(0deg);
    }

    25% {
        transform: translateY(-70px) rotate(0deg);
    }

    30% {
        transform: translateY(-88px) rotate(0deg);
    }

    35% {
        transform: translateY(-104px) rotate(0deg);
    }

    40% {
        transform: translateY(-117px) rotate(0deg);
    }

    45% {
        transform: translateY(-127px) rotate(0deg);
    }

    48% {
        transform: translateY(-132px) rotate(0deg);
    }

    50% {
        transform: translateY(-135px) rotate(0deg);
    }


    /* =========================
       GIRO RÁPIDO ARRIBA
    ========================= */

    51% {
        transform: translateY(-135px) rotate(30deg);
    }

    52% {
        transform: translateY(-135px) rotate(60deg);
    }

    53% {
        transform: translateY(-135px) rotate(90deg);
    }

    54% {
        transform: translateY(-135px) rotate(120deg);
    }

    55% {
        transform: translateY(-135px) rotate(150deg);
    }

    56% {
        transform: translateY(-135px) rotate(180deg);
    }

    57% {
        transform: translateY(-135px) rotate(210deg);
    }

    58% {
        transform: translateY(-135px) rotate(240deg);
    }

    59% {
        transform: translateY(-135px) rotate(270deg);
    }

    60% {
        transform: translateY(-135px) rotate(300deg);
    }

    61% {
        transform: translateY(-135px) rotate(330deg);
    }

    62% {
        transform: translateY(-135px) rotate(360deg);
    }

    63% {
        transform: translateY(-135px) rotate(360deg);
    }


    /* =========================
       BAJADA SUAVE
    ========================= */

    66% {
        transform: translateY(-133px) rotate(360deg);
    }

    70% {
        transform: translateY(-126px) rotate(360deg);
    }

    74% {
        transform: translateY(-114px) rotate(360deg);
    }

    78% {
        transform: translateY(-98px) rotate(360deg);
    }

    82% {
        transform: translateY(-78px) rotate(360deg);
    }

    86% {
        transform: translateY(-56px) rotate(360deg);
    }

    90% {
        transform: translateY(-35px) rotate(360deg);
    }

    94% {
        transform: translateY(-17px) rotate(360deg);
    }

    97% {
        transform: translateY(-7px) rotate(360deg);
    }

    100% {
        transform: translateY(0) rotate(360deg);
    }
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 800px) {

    .racha h1 {
        font-size: 55px;
    }

    .racha h1 img {
        width: 70px;
    }

    .racha p {
        font-size: 22px;
    }

    .galleta {
        width: 80px;
        height: 80px;
    }

    .botones {
        width: 95%;
        gap: 10px;
    }

    .botones button {
        min-width: 0;
        width: 100%;
        padding: 12px 10px;
        font-size: 14px;
    }
}


@media (max-width: 550px) {

    .botones {
        flex-direction: column;

        bottom: 20px;

        gap: 8px;
    }

    .botones button {
        width: 220px;
    }

    .racha h1 {
        font-size: 40px;
    }

    .galleta {
        width: 65px;
        height: 65px;
    }

    .g1 {
        left: 2%;
    }

    .g2 {
        left: 15%;
    }

    .g3 {
        left: auto;
        right: 40%;
    }

    .g4 {
        right: 15%;
    }

    .g5 {
        right: 2%;
    }
}

</style>
</head>


<body>

    <?php include("includes/navpro.php"); ?>


    <div class="pantalla">


        <!-- =========================
             GALLETAS
        ========================= -->

        <!-- Cambia los nombres de las imágenes
             por los archivos de tus galletas -->

        <img src="imagenes/galletas/galleta1.png" class="galleta g1" alt="Galleta">

        <img src="imagenes/galletas/galleta2.png" class="galleta g2" alt="Galleta">

        <img src="imagenes/galletas/galleta3.png" class="galleta g3" alt="Galleta">

        <img src="imagenes/galletas/galleta4.png" class="galleta g4" alt="Galleta">

        <img src="imagenes/galletas/galleta2.png" class="galleta g5" alt="Galleta">


        <!-- =========================
             CONTENIDO CENTRAL
        ========================= -->

        <div class="racha">

            <h1>
                <img src="imagenes/gatito.png" alt="" width="100">

                <?php echo date('F'); ?>
            </h1>

            <p>
                Ver Reportes
            </p>

        </div>


        <!-- =========================
             BOTONES
        ========================= -->

        <div class="botones">

            <button onclick="reiniciarRacha()">
                Reporte de ventas
            </button>

            <a href="reportclient.php">
                <button>
                    Reporte de Clientes
                </button>
            </a>

            <a href="reportprodu.php">
                <button>
                    Top Productos
                </button>
            </a>

        </div>

    </div>


    <script>

        function reiniciarRacha() {

            window.location.href = "reportes.php";

        }

    </script>

</body>
</html>