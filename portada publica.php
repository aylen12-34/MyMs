<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>M&M's</title>

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
    box-sizing:border-box;
}

body{
    margin:0;
    font-family:'Chillax-Semibold';

    display:grid;

    grid-template-areas:
    "header"
    "main"
    "footer";

    grid-template-rows:250px auto 100px;

    min-height:100vh;
}
<<<<<<< HEAD

/* ==========================
   HEADER
========================== */

header{
    grid-area:header;

    background-image:url(imagenes/cabeceraorg.png);

    background-size:cover;
    background-repeat:no-repeat;
    background-position:center;

    display:flex;
    justify-content:center;
    align-items:center;

    border-bottom:5px solid #E64B6B;
}

header img{
    animation:aparecer 1.5s ease;
}

#g{
    scale:0.5;
}

@keyframes aparecer{

    from{
        opacity:0;
        transform:scale(0.7);
    }

    to{
        opacity:1;
        transform:scale(1);
    }

}

=======
>>>>>>> f87def85d23c3267085fb809b315ab8b3757df5b
/* ==========================
   MAIN
========================== */

main{
    grid-area:main;

    padding:40px;

    background-image:url("imagenes/2.png");
    background-size:cover;
    background-repeat:no-repeat;
}

#n{
    font-family:'Chillax-Medium';

    font-size:45px;

    color:#6A253A;

    border-bottom:2px solid #E64B6B;

    display:inline-block;

    margin-bottom:30px;
}

/* ==========================
   PRODUCTOS
========================== */

#fotos{

    display:grid;

    grid-template-columns:repeat(2,1fr);

    gap:40px;

    margin-top:20px;
}

#fotos div{
    display:flex;
    flex-direction:column;
}

.prod{

    width:100%;
    max-width:500px;
    height:400px;

    border-radius:20px;

    object-fit:cover;

    transition:
    transform .4s ease,
    box-shadow .4s ease,
    filter .4s ease;
}

.prod:hover{

    transform:scale(1.05) translateY(-8px);

    box-shadow:0 12px 25px rgba(0,0,0,.3);

    filter:brightness(1.08);
}

h3{

    font-family:'Chillax-Light';

    font-size:25px;

    color:#6A253A;

    border-bottom:2px solid #E64B6B;

    display:inline-block;

    margin-top:15px;
}

h3 a{
    color:#6A253A;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:800px){

    body{

        grid-template-areas:
        "header"
        "main"
        "footer";

        grid-template-rows:auto auto auto;
    }

    header{

        height:180px;

        padding:20px;
    }

    #g{

        width:250px;

        scale:1;
    }

    main{
        padding:20px;
    }

    #n{

        font-size:35px;

        text-align:center;
    }

    #fotos{

        grid-template-columns:1fr;

        gap:30px;
    }

    .prod{

        width:100%;
        max-width:320px;

        height:250px;
    }

    h3{

        font-size:20px;
    }

}

</style>

</head>

<body>
    
    <?php include("includes/nav.php"); ?>

    <?php include("includes/header.php"); ?>

    <main>

        <h2 id="n">Nuestra Variedad</h2>

        <section id="fotos">

            <div>
                <a href="">
                    <img src="imagenes/applepie.jpg" class="prod">
                </a>

                <h3>TORTAS Y BROWNIES</h3>
            </div>

            <div>
                <a href="">
                    <img src="imagenes/frappe.png" class="prod">
                </a>

                <h3>BEBIDAS FRÍAS</h3>
            </div>

            <div>
                <a href="">
                    <img src="imagenes/cafe.jpg" class="prod">
                </a>

                <h3>BEBIDAS CALIENTES</h3>
            </div>

            <div>
                <a href="">
                    <img src="imagenes/cinnamonrolls.jpg" class="prod">
                </a>

                <h3>MASITAS</h3>
            </div>

        </section>

        <h3>
            Para realizar su pedido, escoja sus productos en:
            <a href="">Menú y pedidos</a>
        </h3>

    </main>

    <?php include("includes/footer.php"); ?>

</body>
</html>