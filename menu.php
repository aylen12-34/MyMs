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


/* =========================================
   CONFIGURACIÓN GENERAL
========================================= */

* {
    font-family: 'Chillax', sans-serif;
}


/* =========================================
   SECCIÓN
========================================= */

#seccion-acordeon-categorias {
    padding: 80px 5%;
    background-color: var(--negro);
    text-align: center;
}


/* =========================================
   TÍTULO GENERAL
========================================= */

.titulo-acordeon span {
    color: var(--beige);
    font-size: 0.85rem;
    letter-spacing: 3px;
    text-transform: uppercase;
}


.titulo-acordeon h1 {
    color: var(--light);
    font-size: 2.2rem;
    letter-spacing: 30px;
    font-weight: 300;
    margin: 10px 0 50px 0;
    text-transform: uppercase;
}


.titulo-acordeon h1.escala {
    color: var(--light);
    font-size: 2.5rem;
    font-weight: 300;
    margin: 15px 0 50px 0;

    text-transform: uppercase;

    display: flex;
    justify-content: center;
    align-items: center;

    gap: 4px;

    cursor: default;
}


.titulo-acordeon h1.escala span {
    display: inline-block;

    transition:
        transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275),
        color 0.8s;
}


.titulo-acordeon h1.escala span:hover {
    transform: scale(1.9) translateY(-10px);
    color: beige;
}


/* =========================================
   CONTENEDOR DE LAS TARJETAS
========================================= */

.contenedor-acordeon {
    display: flex;

    width: 100%;
    height: 500px;

    gap: 15px;
}


/* =========================================
   TARJETAS
========================================= */

.tarjeta-acordeon {
    flex: 0.7;

    background-size: cover;
    background-position: center;

    position: relative;

    border-radius: 20px;

    cursor: pointer;

    overflow: hidden;

    transition:
        all 0.7s cubic-bezier(0.25, 1, 0.5, 1);

    border: 1px solid var(--borde-color);
}


/* =========================================
   OSCURECIMIENTO DE LA IMAGEN
========================================= */

.tarjeta-acordeon::after {
    content: '';

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 100%;

    background:
        linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.85) 0%,
            rgba(0, 0, 0, 0.2) 100%
        );

    z-index: 1;

    transition: opacity 0.5s ease;
}


/* =========================================
   TARJETA ACTIVA
========================================= */

.tarjeta-acordeon.active {
    flex: 4;
}


.tarjeta-acordeon.active::after {
    background:
        linear-gradient(
            0deg,
            rgba(0, 0, 0, 0.9) 0%,
            rgba(0, 0, 0, 0.4) 100%
        );
}


/* =========================================
   ICONO
========================================= */

.icono {
    position: absolute;

    bottom: 25px;
    left: 50%;

    transform: translateX(-50%);

    background: rgba(255, 255, 255, 0.1);

    backdrop-filter: blur(5px);

    width: 50px;
    height: 50px;

    border-radius: 50%;

    display: flex;
    justify-content: center;
    align-items: center;

    color: var(--beige);

    font-size: 1.2rem;

    z-index: 3;

    transition: all 0.5s ease;

    border: 1px solid rgba(255, 255, 255, 0.1);
}


/* =========================================
   ICONO CUANDO ESTÁ ACTIVA
========================================= */

.tarjeta-acordeon.active .icono {
    opacity: 0;

    transform:
        translateX(-50%)
        translateY(20px);

    pointer-events: none;
}


/* =========================================
   CONTENIDO DE LA TARJETA
========================================= */

.contenido {
    position: absolute;

    bottom: 35px;

    left: 35px;
    right: 35px;

    text-align: left;

    z-index: 2;

    opacity: 0;

    transform: translateY(30px);

    transition:
        all 0.5s ease 0.2s;

    pointer-events: none;
}


/* =========================================
   CONTENIDO CUANDO ESTÁ ACTIVO
========================================= */

.tarjeta-acordeon.active .contenido {
    opacity: 1;

    transform: translateY(0);

    pointer-events: auto;
}


/* =========================================
   NOMBRE DE LA CATEGORÍA
========================================= */

.contenido h3 {
    position: relative;

    margin: 0 0 18px 0;

    color: #E64B6B;

    font-family: 'Chillax', sans-serif;

    font-size: 2.2rem;

    font-weight: 600;

    letter-spacing: 3px;

    text-transform: uppercase;

    text-align: left;

    /* Sombra elegante */
    text-shadow:
        0 2px 8px rgba(0, 0, 0, 0.8),
        0 0 15px rgba(230, 75, 107, 0.25);
}


/* =========================================
   LÍNEA DECORATIVA DEL TÍTULO
========================================= */

.contenido h3::after {
    content: "";

    display: block;

    width: 55px;
    height: 3px;

    margin-top: 9px;

    background: #E64B6B;

    border-radius: 10px;

    box-shadow:
        0 0 8px rgba(230, 75, 107, 0.5);
}


/* =========================================
   LISTA DE PRODUCTOS
========================================= */

.contenido li {
    list-style: none;

    margin: 0;
    padding: 0;

    color: #EFE2DA;

    font-family: 'Chillax', sans-serif;

    text-align: left;
}


/* =========================================
   CADA PRODUCTO
========================================= */

.contenido li ol {
    position: relative;

    list-style: none;

    margin: 7px 0;

    padding: 0 0 0 22px;

    color: #EFE2DA;

    font-family: 'Chillax', sans-serif;

    font-size: 0.95rem;

    font-weight: 400;

    letter-spacing: 1px;

    text-align: left;

    transition:
        color 0.3s ease,
        transform 0.3s ease;
}


/* =========================================
   PUNTO ROSADO
========================================= */

.contenido li ol::before {
    content: "•";

    position: absolute;

    left: 0;
    top: -1px;

    color: #E64B6B;

    font-size: 1.2rem;

    transition:
        transform 0.3s ease;
}


/* =========================================
   EFECTO HOVER EN LOS PRODUCTOS
========================================= */

.contenido li ol:hover {
    color: #ffffff;

    transform: translateX(7px);
}


.contenido li ol:hover::before {
    transform: scale(1.4);
}
</style>

</head>

<body>
    <main>
        <div class="contenedor-acordeon">
        
    <div class="tarjeta-acordeon active" onclick="seleccionar(this)" style="background-image: url('../../imagenes/categoria/1.png');">
        <div class="icono"><i class="fa-solid fa-seedling"></i></div>
        <div class="contenido">
            <h3>Galletas</h3>
            <li>
                <ol>Root Beer Float Cookie</ol>
                <ol>Peanut Butter Cup Cookie ft. REESEs</ol>
                <ol>Everything But The Dad Jokes Cookie</ol>
                <ol>Cookies & Cream Grill-It Cookie</ol>
                <ol>Dubai-Style Chocolate Cheesecake</ol>
                <ol>Chocolate Chip Cookie</ol>
                <ol>Pink Sugar Cookie</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/categoria/3.png');">
        <div class="icono"><i class="fa-solid fa-moon"></i></div>
        <div class="contenido">
            <h3>Croasants</h3>
            <li>
                <ol>Oreo Bliss</ol>
                <ol>Caramel Crunch</ol>
                <ol>Berry Cream</ol>
                <ol>Tropical Choco</ol>
                <ol>Strawberry Lovers</ol>
                <ol>Pistachio Dream</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/categoria/2.png');">
        <div class="icono"><i class="fa-solid fa-leaf"></i></div>
        <div class="contenido">
            <h3>Bebidas frias</h3>
            <li>
                <ol>Coffee Crush</ol>
                <ol>Caramel Vibes</ol>
                <ol>Berry Kiss</ol>
                <ol>Cookies & Cream</ol>
                <ol>Matcha Mood</ol>
                <ol>Choco Latte Ice</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/galletas/21.png');">
        <div class="icono"><i class="fa-solid fa-lemon"></i></div>
        <div class="contenido">
            <h3>Bebidas calientes</h3>
            <li>
                <ol>Bebida 1</ol>
                <ol>Bebida 2</ol>
                <ol>Bebida 3</ol>
                <ol>Bebida 4</ol>
                <ol>Bebida 5</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/galletas/15.png');">
        <div class="icono"><i class="fa-solid fa-ice-cream"></i></div>
        <div class="contenido">
            <h3>Empanadas</h3>
            <li>
                <ol>Empanada 1</ol>
                <ol>Empanada 2</ol>
                <ol>Empanada 3</ol>
                <ol>Empanada 4</ol>
                <ol>Empanada 5</ol>
            </li>
        </div>
    </div>

</div>
</main>
<script>

    var listaTarjetas = document.querySelectorAll('.tarjeta-acordeon');

    function seleccionar(tarjetaSeleccionada) {
        for (var i = 0; i < listaTarjetas.length; i++) {
            listaTarjetas[i].classList.remove('active');
        }

        tarjetaSeleccionada.classList.add('active');
    }
</script>

</body>
</html>