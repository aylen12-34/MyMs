<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros</title>
    
<link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

<link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<style>
/* ==========================
   COLORES
   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
========================== */

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Chillax-Semibold';
}

body {
    display: grid;

    grid-template-areas:
        "header"
        "main"
        "footer";

    grid-template-rows: 350px auto 200px;

    min-height: 100vh;
}

main {
    grid-area: main;

    padding: 80px 6% 120px;

    background-image:
        url("imagenes/2.png");

    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;
}


#hola {
    text-align: center;

    max-width: 950px;

    margin: 0 auto 110px;

    position: relative;
}

#hola::after {
    content: "";

    display: block;

    width: 90px;
    height: 4px;

    background: #E64B6B;

    margin: 30px auto 0;

    border-radius: 10px;
}

#hola h1 {
    font-size: clamp(50px, 6vw, 78px);

    color: #6A253A;

    line-height: 1;

    margin-bottom: 30px;

    letter-spacing: 1px;
}

#hola p {
    color: #4f4f4f;

    font-family: 'Poppins', sans-serif;

    font-size: 17px;

    line-height: 1.9;

    max-width: 850px;

    margin: auto;
}


/* ==========================
   SECCIONES
========================== */

.producto {

    display: flex;

    align-items: center;

    justify-content: center;

    gap: clamp(50px, 8vw, 120px);

    max-width: 1250px;

    margin: 0 auto 100px;

    padding: 45px;

    background: rgba(255, 255, 255, 0.45);

    border: 1px solid rgba(106, 37, 58, 0.12);

    border-radius: 30px;

    box-shadow:
        0 15px 40px rgba(106, 37, 58, 0.10);

    backdrop-filter: blur(4px);

    transition: transform .4s ease, box-shadow .4s ease;
}

.producto:hover {
    transform: translateY(-7px);

    box-shadow:
        0 20px 50px rgba(106, 37, 58, 0.18);
}


/* ==========================
   ORDEN INVERSO
========================== */

.inverso {
    flex-direction: row-reverse;
}


/* ==========================
   IMÁGENES
========================== */

.prod {

    width: min(390px, 38vw);

    height: auto;

    object-fit: contain;

    border-radius: 20px;

    filter: drop-shadow(
        0 15px 20px rgba(106, 37, 58, 0.20)
    );

    transition:
        transform .4s ease,
        filter .4s ease;
}

.prod:hover {

    transform: scale(1.04) rotate(-1deg);

    filter: drop-shadow(
        0 20px 30px rgba(106, 37, 58, 0.30)
    );
}


/* ==========================
   INFORMACIÓN
========================== */

.info {

    max-width: 540px;

    position: relative;
}

.info h2 {

    color: #6A253A;

    font-size: clamp(42px, 5vw, 62px);

    line-height: 1;

    margin-bottom: 25px;

    position: relative;
}

.info h2::after {

    content: "";

    display: block;

    width: 55px;
    height: 4px;

    background: #E64B6B;

    border-radius: 10px;

    margin-top: 14px;
}

.info p {

    color: #555;

    font-family: 'Poppins', sans-serif;

    font-size: 16px;

    line-height: 1.9;

    text-align: justify;
}


/* ==========================
   RESPONSIVE
========================== */

@media (max-width: 900px) {

    main {
        padding: 60px 25px 80px;
    }

    #hola {
        margin-bottom: 70px;
    }

    .producto,
    .inverso {

        flex-direction: column;

        text-align: center;

        gap: 40px;

        padding: 35px 25px;

        margin-bottom: 60px;
    }

    .prod {
        width: min(380px, 85%);
    }

    .info {
        max-width: 700px;
    }

    .info h2::after {
        margin-left: auto;
        margin-right: auto;
    }

    .info p {
        text-align: center;
    }
}


@media (max-width: 500px) {

    main {
        padding: 50px 18px 60px;
    }

    #hola h1 {
        font-size: 45px;
    }

    #hola p {
        font-size: 15px;
        line-height: 1.7;
    }

    .producto {
        padding: 25px 18px;
        border-radius: 22px;
    }

    .prod {
        width: 90%;
    }

    .info h2 {
        font-size: 40px;
    }

    .info p {
        font-size: 14px;
        line-height: 1.75;
    }
}
</style>
</head>
<body>
    <?php include("includes/nav.php"); ?>
    <?php include("includes/header.php"); ?>

    <main>
            <section id="hola">
            <h1>Sobre Nosotros</h1>

           <p>Somos un emprendimiento boliviano dedicado a la elaboración 
            de productos personalizados y saludables,pensados especialmente 
            para personas con necesidades alimentarias específicas como celíacos, 
            diabéticos intolerantes a ciertos ingredientes o para quienes buscan 
            una alimentación mas natural.</p>

        </section>
    <section class="producto">

            <img src="imagenes/vision.png" class="prod" alt="Tortas y Brownies">

            <div class="info">
                <h2>Visión</h2>

                <p class="info-p">Ser un emprendimiento lider en la elaboracion y comercializacion de
                    prodyuctos alimenticios personalizados y saludables, reconocido por su 
                    innovacion, calida e impacto social, contribuyendo al desarrolla sostenible,
                    al apoyo de productores nacionales y a una mejor calidad de vida para las personas 
                    con necesidades alimentarias especificas.</p>
                </p>


            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/mision.png" class="prod" alt="Bebidas Frías">

            <div class="info">

                <h2>Misión</h2>

                <p class="info-p">Brindar productos alimenticios personalizados, saludables 
                y de alta calidad para personas con necesidades alimentarias especiales, 
                utilizando ingredientes naturales y orgánicos provenientes de productores 
                bolivianos, con el compromiso de promover el bienestar, la inclusión 
                alimentaria y el consumo responsable.</p>


            </div>

        </section>
        
    </main>
    <?php include("includes/footer.php");?>
</body>
</html>