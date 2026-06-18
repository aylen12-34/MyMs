<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Myms</title>
    
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

    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Chillax-Semibold';
}
    body{

    display:grid;

    grid-template-areas:
    "header"
    "main"
    "footer";

    grid-template-rows:350px auto 200px;

    min-height:100vh;
}

/* ==========================
   MAIN
========================== */

main{

    grid-area:main;

    padding:60px 40px;
    background-image: url("imagenes/2.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;

}
    #hola{
        text-align:center;
        max-width:900px;
        margin:0 auto 100px auto;
    }
    #hola h1{
        font-size:70px;
        color:#6A253A;
        margin-bottom:20px;
    }
    #M{
    text-align:center;
    color:#6A253A;
    font-size:50px;
    margin-bottom:80px;
    }
    #mis{
    display:flex;
    align-items:right;
    justify-content:right;
    gap:100px;
    max-width:1400px;
    margin:120px auto;
    }
    .producto{

    display:flex;

    align-items:center;

    justify-content:center;

    gap:100px;

    max-width:1400px;

    margin:120px auto;
}

.inverso{

    flex-direction:row-reverse;
}

.prod{

    width:420px;

    height:auto;

    object-fit:contain;
    border-radius:10px;
    transition:
    transform .4s ease,
    box-shadow .4s ease;
}

.prod:hover{

    transform:scale(1.08) rotate(-2deg);

    box-shadow:
        0 0 30px #6A253A,
        0 0 60px rgba(106,37,58,.6),
        0 0 90px rgba(239,226,218,.9);
}

.info{

    max-width:500px;
}

.info h2{

    color:#6A253A;

    font-size:52px;

    line-height:1.1;

    margin-bottom:20px;
}

.info p{

    color:#555;

    font-size:18px;

    line-height:1.9;
}
.info-p{

    color:#555;

    font-size:18px;

    line-height:1.9;
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