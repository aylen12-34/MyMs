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

    background-image:url("imagenes/fondoelegido.png");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
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

        <section id="hero">

            <h1>Momentos Dulces & Salados</h1>

            <p>
                Descubre nuestras especialidades artesanales preparadas con los
                mejores ingredientes. Cada producto está elaborado con dedicación
                para brindarte una experiencia única en cada bocado.
            </p>

        </section>

        <h2 id="n">Nuestra Variedad</h2>
        <section class="producto">

            <img src="imagenes/galletas/1.png" class="prod" alt="Tortas y Brownies">

            <div class="info">

                <span class="etiqueta">Nuestros favoritos</span>

                <h2>TORTAS Y BROWNIES</h2>

                <p>
                    Deliciosas tortas y brownies elaborados artesanalmente,
                    perfectos para cumpleaños, reuniones y ocasiones especiales.
                    Preparados con ingredientes de calidad para ofrecer un sabor
                    inolvidable en cada porción.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/2.png" class="prod" alt="Bebidas Frías">

            <div class="info">

                <span class="etiqueta">Refrescantes</span>

                <h2>BEBIDAS FRÍAS</h2>

                <p>
                    Frappés, milkshakes y bebidas heladas preparadas al momento
                    para acompañar tus postres favoritos. La combinación perfecta
                    para refrescar cualquier día.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/3.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>BEBIDAS CALIENTES</h2>

                <p>
                    Café, capuchinos, chocolates calientes y otras bebidas
                    elaboradas para acompañar tus mañanas, tardes y momentos
                    especiales.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/4.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Tradicionales</span>

                <h2>MASITAS</h2>

                <p>
                    Una selección de masitas artesanales horneadas diariamente
                    con ingredientes cuidadosamente seleccionados para conservar
                    el auténtico sabor de la tradición.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/8.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>BEBIDAS CALIENTES</h2>

                <p>
                    Café, capuchinos, chocolates calientes y otras bebidas
                    elaboradas para acompañar tus mañanas, tardes y momentos
                    especiales.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto inverso">

            <img src="imagenes/galletas/6.png" class="prod" alt="Masitas">

            <div class="info">

                <span class="etiqueta">Tradicionales</span>

                <h2>MASITAS</h2>

                <p>
                    Una selección de masitas artesanales horneadas diariamente
                    con ingredientes cuidadosamente seleccionados para conservar
                    el auténtico sabor de la tradición.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section class="producto">

            <img src="imagenes/galletas/7.png" class="prod" alt="Bebidas Calientes">

            <div class="info">

                <span class="etiqueta">Clásicos</span>

                <h2>BEBIDAS CALIENTES</h2>

                <p>
                    Café, capuchinos, chocolates calientes y otras bebidas
                    elaboradas para acompañar tus mañanas, tardes y momentos
                    especiales.
                </p>

                <a href="" class="btn">Ver más</a>

            </div>

        </section>
        <section id="pedido">

            <h2>¿Listo para ordenar?</h2>

            <p>
                Explora nuestro menú completo y realiza tu pedido de forma rápida
                y sencilla.
            </p>

            <a href="" class="btn">Menú y pedidos</a>

        </section>
        
    </main>

    <?php include("includes/footer.php"); ?>

</body>
</html>