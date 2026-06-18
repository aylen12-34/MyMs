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
.banner-croissants{
    width: 100%;
    height: 120px;

    background: #6A253A;

    display: flex;
    justify-content: center;
    align-items: center;

    color: white;
    text-align: center;

    margin: 30px 0;

    border-radius: 5px;

    /* sombra blanca suave por defecto */
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.61);

    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* texto */
.banner-croissants h2{
    font-size: 40px;
    margin: 0;
    letter-spacing: 2px;
}

/* hover simple */
.banner-croissants:hover{
    transform: scale(1.03);
    box-shadow: 0 10px 25px rgba(0,0,0,0.35);
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

    text-align:center;

    margin-top:120px;

    background:white;

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
          <section class="banner-croissants">
            <h2>COOKIES</h2>
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
    <section class="banner-croissants">
            <h2>CROISSANTS</h2>
          </section>
        <section class="producto">

            <img src="imagenes/galletas/10.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Oreo Bliss</h2>

                <p>
                    Croissant cubierto con chocolate blanco 
                    y trozos de galleta Oreo. La combinación 
                    perfecta entre suavidad y un irresistible 
                    toque crujiente.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/11.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Caramel Crunch</h2>

                <p>
                    Relleno y decorado con salsa de caramelo 
                    y nueces crocantes. Un equilibrio delicioso 
                    entre dulzura y textura en cada bocado.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/12.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Berry Cream</h2>

                <p>
                    Croissant acompañado de frambuesas frescas 
                    y un delicado toque de crema. Dulce, ligero 
                    y lleno de sabor.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
                <section class="producto inverso">

            <img src="imagenes/galletas/13.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Tropical Choco</h2>

                <p>
                    La intensidad del chocolate se combina con 
                    rodajas de kiwi y plátano para crear una 
                    experiencia fresca y sorprendente.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/14.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Strawberry Lovers</h2>

                <p>
                    Fresas frescas bañadas en una generosa cobertura 
                    de chocolate. Una tentación irresistible para 
                    los amantes de los sabores clásicos.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
                        <section class="producto inverso">

            <img src="imagenes/galletas/15.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">CROISSANTS</span>

                <h2>Pistachio Dream</h2>

                <p>
                    Exquisita crema de pistacho y pistachos troceados 
                    sobre un croissant recién horneado. 
                    Un sabor sofisticado que conquista desde el primer 
                    bocado.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="banner-croissants">
            <h2>BEBIDAS FRIAS</h2>
          </section>
          <section class="producto">
            <img src="imagenes/galletas/17.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Frappe</span>

                <h2>Coffee Crush</h2>

                <p>
                    Frappé de café con crema batida y salsa de caramelo.
                    Dulce y súper refrescante.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/18.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Batido</span>

                <h2>Caramel Vibes</h2>

                <p>
                    Café helado con caramelo y crema batida.
                    El equilibrio perfecto entre dulce y cremoso.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/19.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Batido</span>

                <h2>Berry Kiss</h2>

                <p>
                    Batido de fresa con crema, salsa de fresa y
                    fresas frescas. Tan rico como se ve.
                </p>

                <a href="" class="btn">Comparar</a>

            </div>

        </section>
                <section class="producto inverso">

            <img src="imagenes/galletas/20.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Frappe</span>

                <h2>Cookies & Cream</h2>

                <p>
                    Galletas Oreo trituradas y
                    una base cremosa que enamora 
                    en cada sorbo.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/21.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Fresh Cream</span>

                <h2>Matcha Mood</h2>

                <p>
                    Leche fría, hielo y auténtico matcha. 
                    Refrescante y diferente.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
            <section class="producto inverso">

            <img src="imagenes/galletas/22.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Fresh Cream</span>

                <h2>Choco Latte Ice</h2>

                <p>
                   Chocolate, café y leche fría sobre 
                   hielo. Cremoso y lleno de sabor.
                </p>

                <a href="" class="btn">Comprar</a>

            </div>

        </section>
</main>

    <?php include("includes/footer.php"); ?>

</body>
</html>