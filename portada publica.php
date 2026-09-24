<?php

// ==========================
// CONEXIÓN A LA BASE DE DATOS
// ==========================

$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// ==========================
// CONSULTAR PRECIO Y DETALLADO
// ==========================

if (isset($_GET['codigo'])) {

    $codigo = intval($_GET['codigo']);

    $consulta = $conn->query(
        "SELECT Precio, Detallado
         FROM Productos
         WHERE Codigo = $codigo"
    );

    if ($consulta && $producto = $consulta->fetch_assoc()) {

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "Precio" => $producto["Precio"],
            "Detallado" => $producto["Detallado"]
        ]);

    } else {

        header('Content-Type: application/json; charset=utf-8');

        echo json_encode([
            "Precio" => "No disponible",
            "Detallado" => "No hay información detallada para este producto."
        ]);
    }

    exit;
}

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>M&M's</title>

    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">


<style>
/* ==================================================
   COLORES

   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
================================================== */
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

main{

    grid-area:main;

    padding:60px 40px;

    background-image:url("imagenes/2.png");

    background-size:cover;

    background-position:center;

    background-attachment:fixed;

    background-repeat:no-repeat;

}
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

    border:none;

    cursor:pointer;

}


.btn:hover{

    background:#E64B6B;

    transform:translateY(-3px);

}

#modalProducto{

    position:fixed;

    inset:0;

    width:100%;

    height:100%;

    background:rgba(0,0,0,.78);

    display:none;

    align-items:center;

    justify-content:center;

    padding:30px;

    z-index:9999;

    backdrop-filter:blur(6px);

    overflow:hidden;

}


#modalProducto.activo{

    display:flex;

}

.tarjeta-modal{

    position:relative;

    width:1000px;

    max-width:95%;

    max-height:90vh;

    display:flex;

    flex-direction:column;

    gap:28px;

    padding:42px;

    background:#E64B6B;

    border:4px solid #6A253A;

    border-radius:32px;

    box-shadow:

        0 20px 60px rgba(0,0,0,.55),

        0 0 40px rgba(106,37,58,.25);

    animation:aparecerModal .3s ease;

    overflow-y:auto;

    overflow-x:hidden;

}

@keyframes aparecerModal{

    from{

        opacity:0;

        transform:scale(.85);

    }

    to{

        opacity:1;

        transform:scale(1);

    }

}
.modal-superior{

    width:100%;

    display:flex;

    align-items:center;

    gap:40px;

}

#modalImagen{

    width:330px;

    height:330px;

    flex-shrink:0;

    object-fit:contain;

    background:#EFE2DA;

    padding:18px;

    border-radius:45px;

    box-shadow:

        0 12px 30px rgba(106,37,58,.30),

        0 0 0 5px rgba(239,226,218,.35);

    transition:.3s ease;

}


#modalImagen:hover{

    transform:scale(1.025) rotate(-1deg);

}

.modal-info{

    flex:1;

    min-width:0;

    color:#000;

}

#modalEtiqueta{

    display:inline-block;

    background:#6A253A;

    color:#EFE2DA;

    padding:8px 16px;

    border-radius:30px;

    font-size:14px;

    margin-bottom:12px;

}

#modalNombre{

    color:#000;

    font-size:38px;

    line-height:1.1;

    margin:8px 0 18px 0;

    overflow-wrap:anywhere;

}

#modalDescripcion{

    color:#000;

    font-family:'Poppins',sans-serif;

    font-size:15px;

    line-height:1.7;

    margin-bottom:18px;

}

.modal-precio{

    display:inline-block;

    margin:5px 0 0 0;

    padding:10px 20px;

    background:#EFE2DA;

    border:2px solid #6A253A;

    border-radius:17px;

    box-shadow:

        0 5px 15px rgba(106,37,58,.12);

}


.modal-precio small{

    display:block;

    color:#6A253A;

    font-family:'Poppins',sans-serif;

    font-size:12px;

    margin-bottom:2px;

}


#modalPrecio{

    color:#000;

    font-size:25px;

}

.modal-detallado{

    width:100%;

}


.modal-detallado .modal-info{

    width:100%;

}


.modal-info h3{

    color:#6A253A;

    font-size:23px;

    margin-bottom:10px;

}

#modalDetallado{

    width:100%;

    min-height:120px;

    max-height:230px;

    background:#EFE2DA;

    color:#000;

    padding:20px 22px;

    border-radius:20px;

    border-left:6px solid #6A253A;

    font-family:'Poppins',sans-serif;

    font-size:14px;

    line-height:1.75;

    overflow-y:auto;

    overflow-x:hidden;

    overflow-wrap:anywhere;

    word-break:normal;

    box-shadow:

        inset 0 2px 8px rgba(106,37,58,.08),

        0 5px 15px rgba(106,37,58,.10);

}
#modalDetallado::-webkit-scrollbar{

    width:8px;

}


#modalDetallado::-webkit-scrollbar-track{

    background:rgba(106,37,58,.10);

    border-radius:20px;

    margin:8px;

}


#modalDetallado::-webkit-scrollbar-thumb{

    background:#6A253A;

    border-radius:20px;

}


#modalDetallado::-webkit-scrollbar-thumb:hover{

    background:#4e1b2c;

}

#cerrarModal{

    position:absolute;

    top:15px;

    right:18px;

    width:42px;

    height:42px;

    border:none;

    border-radius:50%;

    background:#6A253A;

    color:#EFE2DA;

    font-size:27px;

    cursor:pointer;

    transition:.3s ease;

    z-index:10;

}


#cerrarModal:hover{

    background:#000;

    transform:rotate(90deg);

}

#pedido{

    width:1800px;

    height:300px;

    text-align:center;

    margin-top:120px;

    background-image:url("imagenes/galletas/oficial.png");

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

        width:100%;

        height:auto;

        padding:35px 20px;

    }


    #pedido h2{

        font-size:30px;

    }

    #modalProducto{

        padding:20px;

    }


    .tarjeta-modal{

        width:750px;

        max-width:100%;

        max-height:90vh;

        padding:38px 30px;

        gap:25px;

    }


    .modal-superior{

        gap:28px;

    }


    #modalImagen{

        width:250px;

        height:250px;

        border-radius:35px;

    }


    #modalNombre{

        font-size:30px;

    }


    #modalDescripcion{

        font-size:14px;

    }


    #modalDetallado{

        max-height:210px;

    }

}

@media(max-width:650px){

    #modalProducto{

        padding:15px;

        align-items:center;

    }


    .tarjeta-modal{

        width:100%;

        max-width:100%;

        max-height:94vh;

        padding:45px 20px 25px;

        border-radius:27px;

        gap:22px;

    }


    .modal-superior{

        flex-direction:column;

        gap:20px;

        text-align:center;

    }

    #modalImagen{

        width:210px;

        height:210px;

        padding:14px;

        border-radius:32px;

    }


    .modal-info{

        width:100%;

    }


    #modalEtiqueta{

        font-size:13px;

        padding:7px 14px;

    }


    #modalNombre{

        font-size:27px;

        line-height:1.15;

        margin:8px 0 15px;

    }


    #modalDescripcion{

        font-size:13px;

        line-height:1.65;

        margin-bottom:15px;

    }


    .modal-precio{

        padding:9px 18px;

    }


    #modalPrecio{

        font-size:23px;

    }

    .modal-detallado{

        text-align:left;

    }


    .modal-info h3{

        font-size:20px;

        margin-bottom:9px;

    }


    #modalDetallado{

        min-height:110px;

        max-height:190px;

        padding:17px;

        font-size:13px;

        line-height:1.65;

        border-radius:17px;

    }
    #cerrarModal{

        top:10px;

        right:10px;

        width:38px;

        height:38px;

        font-size:24px;

    }

}

</style>

</head>


<body>


<?php include("includes/nav.php"); ?>


<?php include("includes/header.php"); ?>


<main>

<section id="hero">

    <h1>
        Especiales De La Semana
    </h1>

</section>

<section class="producto">

    <img
        src="imagenes/galletas/1.png"
        class="prod"
        alt="Tortas y Brownies"
    >

    <div class="info">

        <span class="etiqueta">
            Nuestros favoritos
        </span>

        <h2>
            Root Beer Float Cookie
        </h2>

        <p>
            Galleta marmoleada de vainilla y cerveza de raíz,
            coronada con un remolino de mousse cremoso de vainilla
            y cerveza de raíz.
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="1"
        >
            Ver más
        </a>

    </div>

</section>

<section class="producto inverso">

    <img
        src="imagenes/galletas/1,5.png"
        class="prod"
        alt="Bebidas Frías"
    >

    <div class="info">

        <span class="etiqueta">
            Exquisita
        </span>

        <h2>
            Peanut Butter Cup Cookie ft. REESE'S
        </h2>

        <p>
            Una clásica galleta de mantequilla de cacahuete cubierta
            con trocitos de mantequilla de cacahuete derretida,
            bañada en chocolate con leche fundido y espolvoreada
            con bombones REESE'S
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="2"
        >
            Ver más
        </a>

    </div>

</section>

<section class="producto">

    <img
        src="imagenes/galletas/3.png"
        class="prod"
        alt="Bebidas Calientes"
    >

    <div class="info">

        <span class="etiqueta">
            Clásicos
        </span>

        <h2>
            Everything But The Dad Jokes Cookie
        </h2>

        <p>
            Una galleta original repleta de trocitos de caramelo y
            chips de mantequilla de cacahuete, cubierta con una
            capa de mantequilla de cacahuete derretida y patatas
            fritas crujientes recubiertas de mantequilla de cacahuete,
            y terminada con explosiones de más trocitos de caramelo.
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="3"
        >
            Ver más
        </a>

    </div>

</section>


<section class="producto inverso">

    <img
        src="imagenes/galletas/4.png"
        class="prod"
        alt="Masitas"
    >

    <div class="info">

        <span class="etiqueta">
            Tradicionales
        </span>

        <h2>
            Cookies & Cream Grill-It Cookie
        </h2>

        <p>
            Una galleta de galleta y crema hecha en sartén,
            cubierta con un remolino de mousse de galleta y crema
            de chocolate, decorada con un diseño de parrilla de
            chocolate semidulce y ositos de goma en un palillo.
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="4"
        >
            Ver más
        </a>

    </div>

</section>

<section class="producto">

    <img
        src="imagenes/galletas/6.png"
        class="prod"
        alt="Bebidas Calientes"
    >

    <div class="info">

        <span class="etiqueta">
            Clásicos
        </span>

        <h2>
            Dubai-Style Chocolate Cheesecake
        </h2>

        <p>
            Una exquisita tarta de queso con chocolate sobre una base
            de galleta Graham de chocolate, cubierta con un relleno
            crujiente de Kataifi y pistacho, un chorrito de crema de
            pistacho y una cucharada de nata montada
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="5"
        >
            Ver más
        </a>

    </div>

</section>

<section class="producto inverso">

    <img
        src="imagenes/galletas/7.png"
        class="prod"
        alt="Masitas"
    >

    <div class="info">

        <span class="etiqueta">
            Tradicionales
        </span>

        <h2>
            Chocolate Chip Cookie
        </h2>

        <p>
            Una clásica galleta tibia de azúcar moreno, repleta
            de trocitos de chocolate con leche fundido y trozos
            de chocolate semidulce de alta calidad.
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="6"
        >
            Ver más
        </a>

    </div>

</section>

<section class="producto">

    <img
        src="imagenes/galletas/8.png"
        class="prod"
        alt="Bebidas Calientes"
    >

    <div class="info">

        <span class="etiqueta">
            Clásicos
        </span>

        <h2>
            Pink Sugar Cookie
        </h2>

        <p>
            Una clásica galleta de azúcar y almendras cubierta con una
            suave capa rosada de glaseado de almendras auténticas.
        </p>

        <a
            href="#"
            class="btn btn-ver-mas"
            data-codigo="7"
        >
            Ver más
        </a>

    </div>

</section>


<section id="pedido">

    <h2>
        ¿Listo para ordenar?
    </h2>

    <p>
        Explora nuestro menú completo y realiza tu pedido de forma rápida
        y sencilla.
    </p>

    <a
        href="Ajax/index/index1.php"
        class="btn"
    >
        Menú y pedidos
    </a>

</section>


</main>


<?php include("includes/footer.php"); ?>

<div id="modalProducto">


    <div class="tarjeta-modal">

        <button
            id="cerrarModal"
            type="button"
        >
            ×
        </button>

        <div class="modal-superior">

            <img
                id="modalImagen"
                src=""
                alt="Producto"
            >
            <div class="modal-info">
                <span id="modalEtiqueta">
                    Producto
                </span>

                <h2 id="modalNombre">
                    Producto
                </h2>

                <p id="modalDescripcion">
                    Descripción
                </p>

                <div class="modal-precio">

                    <small>
                        Precio
                    </small>

                    <strong id="modalPrecio">
                        Cargando...
                    </strong>

                </div>


            </div>

        </div>

        <div class="modal-separador"></div>

        <div class="modal-detallado">


            <div class="modal-info">


                <h3>
                    Detallado
                </h3>


                <p id="modalDetallado">
                    Cargando información...
                </p>


            </div>


        </div>


    </div>

</div>



<script>

const modal = document.getElementById("modalProducto");

const cerrar = document.getElementById("cerrarModal");

const modalImagen = document.getElementById("modalImagen");

const modalEtiqueta = document.getElementById("modalEtiqueta");

const modalNombre = document.getElementById("modalNombre");

const modalDescripcion = document.getElementById("modalDescripcion");

const modalPrecio = document.getElementById("modalPrecio");

const modalDetallado = document.getElementById("modalDetallado");

document.querySelectorAll(".btn-ver-mas").forEach(function(boton){

    boton.addEventListener("click", function(e){

        e.preventDefault();

        const producto = boton.closest(".producto");

        const codigo = boton.dataset.codigo;

        modalImagen.src =
            producto.querySelector(".prod").src;


        modalNombre.textContent =
            producto.querySelector("h2").textContent.trim();


        modalDescripcion.textContent =
            producto.querySelector(".info p").textContent.trim();


        modalEtiqueta.textContent =
            producto.querySelector(".etiqueta").textContent.trim();

        modal.classList.add("activo");

        document.body.style.overflow = "hidden";


        modalPrecio.textContent =
            "Cargando...";

        modalDetallado.textContent =
            "Cargando información...";

        fetch("?codigo=" + codigo)

            .then(function(respuesta){

                return respuesta.json();

            })

            .then(function(datos){

                modalPrecio.textContent =
                    "Bs. " + datos.Precio;


                modalDetallado.textContent =
                    datos.Detallado;

            })

            .catch(function(){

                modalPrecio.textContent =
                    "No disponible";


                modalDetallado.textContent =
                    "No se pudo cargar la información.";

            });

    });

});

cerrar.addEventListener("click", function(){

    modal.classList.remove("activo");

    document.body.style.overflow = "";

});


</script>


</body>

</html>