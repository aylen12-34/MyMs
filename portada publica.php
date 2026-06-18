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

/* ==========================
   HERO
========================== */

#hero{

    text-align:center;

    max-width:900px;

    margin:0 auto 100px auto;
}

#hero h1{

    font-size:70px;

    color:#6A253A;

    margin-bottom:20px;
}

#hero p{

    max-width:750px;

    margin:auto;

    font-size:22px;

    color:#555;

    line-height:1.8;
}

#n{

    text-align:center;

    color:#6A253A;

    font-size:50px;

    margin-bottom:80px;
}

/* ==========================
   PRODUCTOS
========================== */

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
    box-shadow .1s ease;
}

.prod:hover{

    transform:scale(1.08) rotate(-2deg);

    box-shadow:
        0 0 30px #ff5b8c,
        0 0 60px rgba(106,37,58,.6),
        0 0 90px rgba(239,226,218,.9);
}

.info{

    max-width:500px;
}

.etiqueta{

    display:inline-block;

    background:#E64B6B;

    color:white;

    padding:8px 15px;

    border-radius:50px;

    font-size:14px;

    margin-bottom:15px;
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

.btn{

    display:inline-block;

    margin-top:25px;

    padding:14px 35px;

    background:#6A253A;

    color:white;

    text-decoration:none;

    border-radius:50px;

    transition:.3s ease;
}

.btn:hover{

    background:#E64B6B;

    transform:translateY(-3px);
}

/* ==========================
   PEDIDO
========================== */

#pedido{
    width:1800px;
    height:300px;
    text-align:center;

    margin-top:120px;

    background-image: url("imagenes/galletas/oficial.png");
    background-size:cover;
        background-repeat:no-repeat;
        background-position:center;
    padding:60px;

    border-radius:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,.08);
}

#pedido h2{

    color:#6A253A;

    font-size:40px;

    margin-bottom:15px;
}

#pedido p{

    color:#555;

    font-size:18px;

    margin-bottom:20px;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:900px){

    body{

        grid-template-rows:auto auto auto;
    }

    main{

        padding:30px 20px;
    }

    #hero h1{

        font-size:42px;
    }

    #hero p{

        font-size:18px;
    }

    #n{

        font-size:36px;
    }

    .producto,
    .inverso{

        flex-direction:column;

        gap:30px;

        text-align:center;

        margin:80px auto;
    }

    .prod{

        width:280px;
    }

    .info h2{

        font-size:34px;
    }

    .info p{

        font-size:16px;
    }

    #pedido{

        padding:35px 20px;
    }

    #pedido h2{

        font-size:30px;
    }
}
</style>

</head>

<body>

    <?php include("includes/nav.php"); ?>

    <?php include("includes/header.php"); ?>

    <main>

        <section id="hero">

            <h1>Especiales De La Semana</h1>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/1.png" class="prod" alt="Tortas y Brownies">

            <div class="info">

                <span class="etiqueta">Nuestros favoritos</span>

                <h2>Root Beer Float Cookie</h2>

                <p>
                    Una galleta marmoleada de vainilla y cerveza de raíz, 
                    coronada con un remolino de mousse cremoso de vainilla 
                    y cerveza de raíz.
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/1,5.png" class="prod" alt="Bebidas Frías">

            <div class="info">

                <span class="etiqueta">Exquisita</span>

                <h2>Peanut Butter Cup Cookie ft. REESE'S</h2>

                <p>
                    Una clásica galleta de mantequilla de cacahuete cubierta 
                    con trocitos de mantequilla de cacahuete derretida, 
                    bañada en chocolate con leche fundido y espolvoreada con 
                    bombones REESE'S
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/3.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>Everything But The Dad Jokes Cookie</h2>

                <p>
                    Una galleta original repleta de trocitos de caramelo y 
                    chips de mantequilla de cacahuete, cubierta con una 
                    capa de mantequilla de cacahuete derretida y patatas 
                    fritas crujientes recubiertas de mantequilla de cacahuete, 
                    y terminada con explosiones de más trocitos de caramelo.
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/4.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Tradicionales</span>

                <h2>Cookies & Cream Grill-It Cookie</h2>

                <p>
                    Una galleta de galleta y crema hecha en sartén, 
                    cubierta con un remolino de mousse de galleta y crema de chocolate, 
                    decorada con un diseño de parrilla de chocolate semidulce y ositos 
                    de goma en un palillo.
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/6.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>Dubai-Style Chocolate Cheesecake</h2>

                <p>
                    Una exquisita tarta de queso con chocolate sobre una base de galleta
                    Graham de chocolate, cubierta con un relleno crujiente de Kataifi y 
                    pistacho, un chorrito de crema de pistacho y una cucharada de nata montada
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/7.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Tradicionales</span>

                <h2>Chocolate Chip Cookie</h2>

                <p>
                    Una clásica galleta tibia de azúcar moreno, repleta de trocitos 
                    de chocolate con leche fundido y trozos de chocolate semidulce 
                    de alta calidad.
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/8.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>Pink Sugar Cookie</h2>

                <p>
                    Una clásica galleta de azúcar y almendras cubierta con una 
                    suave capa rosada de glaseado de almendras auténticas.
                </p>

                <a href="menu.php" class="btn">Ver más</a>

            </div>

        </section>
        <section id="pedido">

            <h2>¿Listo para ordenar?</h2>

            <p>
                Explora nuestro menú completo y realiza tu pedido de forma rápida
                y sencilla.
            </p>

            <a href="menu.php" class="btn">Menú y pedidos</a>

        </section>
        
    </main>

    <?php include("includes/footer.php"); ?>

</body>
</html>