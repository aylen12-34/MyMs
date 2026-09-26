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

/* =========================================================
   COLORES
   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
========================================================= */

#seccion-acordeon-categorias {

    width: 100%;

    padding: 80px 5%;

    background-color: var(--negro);

    text-align: center;

    box-sizing: border-box;

}


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


.contenedor-acordeon {

    display: flex;

    width: 100%;

    height: 500px;

    gap: 15px;

    box-sizing: border-box;

}


.tarjeta-acordeon {

    flex: 0.7;

    min-width: 0;

    background-size: cover;

    background-position: center;

    position: relative;

    border-radius: 20px;

    cursor: pointer;

    overflow: hidden;

    transition:
        flex 0.7s cubic-bezier(0.25, 1, 0.5, 1),
        border-color 0.5s ease,
        transform 0.3s ease;

    border: 1px solid var(--borde-color);

    box-sizing: border-box;

}

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

.icono {

    position: absolute;

    bottom: 25px;

    left: 50%;

    transform: translateX(-50%);

    background: rgba(255, 255, 255, 0.1);

    backdrop-filter: blur(5px);

    -webkit-backdrop-filter: blur(5px);

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

.tarjeta-acordeon.active .icono {

    opacity: 0;

    transform:
        translateX(-50%)
        translateY(20px);

    pointer-events: none;

}

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

    min-width: 0;

}

.tarjeta-acordeon.active .contenido {

    opacity: 1;

    transform: translateY(0);

    pointer-events: auto;

}


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

    line-height: 1.2;

    overflow-wrap: break-word;

    text-shadow:
        0 2px 8px rgba(0, 0, 0, 0.8),
        0 0 15px rgba(230, 75, 107, 0.25);

}

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


.contenido ul {

    list-style: none;

    margin: 0;

    padding: 0;

}

.contenido li {

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

    line-height: 1.45;

    overflow-wrap: break-word;

    transition:
        color 0.3s ease,
        transform 0.3s ease;

}
.contenido li::before {

    content: "•";

    position: absolute;

    left: 0;

    top: -1px;

    color: #E64B6B;

    font-size: 1.2rem;

    transition:
        transform 0.3s ease;

}

.contenido li:hover {

    color: #ffffff;

    transform: translateX(7px);

}


.contenido li:hover::before {

    transform: scale(1.4);

}


@media (max-width: 1100px) {

    #seccion-acordeon-categorias {

        padding: 65px 4%;

    }


    .contenedor-acordeon {

        height: 450px;

        gap: 12px;

    }


    .contenido {

        left: 25px;

        right: 25px;

        bottom: 28px;

    }


    .contenido h3 {

        font-size: 1.9rem;

        letter-spacing: 2px;

    }


    .contenido li {

        font-size: 0.88rem;

    }

}

@media (max-width: 850px) {

    #seccion-acordeon-categorias {

        padding: 55px 3%;

    }


    .titulo-acordeon h1 {

        font-size: 2rem;

        letter-spacing: 18px;

    }


    .titulo-acordeon h1.escala {

        font-size: 2.2rem;

        letter-spacing: 8px;

    }


    .contenedor-acordeon {

        height: 420px;

        gap: 10px;

    }


    .tarjeta-acordeon {

        border-radius: 17px;

    }


    .contenido {

        left: 20px;

        right: 20px;

        bottom: 22px;

    }


    .contenido h3 {

        font-size: 1.6rem;

        letter-spacing: 1.5px;

        margin-bottom: 13px;

    }


    .contenido li {

        font-size: 0.78rem;

        padding-left: 17px;

        margin: 5px 0;

    }


    .icono {

        width: 45px;

        height: 45px;

        font-size: 1rem;

    }

}

@media (max-width: 650px) {

    #seccion-acordeon-categorias {

        padding: 45px 18px;

    }


    .titulo-acordeon span {

        font-size: 0.7rem;

        letter-spacing: 2px;

    }


    .titulo-acordeon h1 {

        font-size: 1.6rem;

        letter-spacing: 8px;

        line-height: 1.3;

        margin: 10px 0 30px 0;

    }


    .titulo-acordeon h1.escala {

        font-size: 1.7rem;

        letter-spacing: 4px;

        margin-bottom: 30px;

        gap: 2px;

    }


    .contenedor-acordeon {

        width: 100%;

        height: auto;

        min-height: 0;

        display: flex;

        flex-direction: column;

        gap: 12px;

    }


    .tarjeta-acordeon {

        width: 100%;

        height: 85px;

        min-height: 85px;

        flex: none;

        border-radius: 16px;

        transition:
            height 0.6s cubic-bezier(0.25, 1, 0.5, 1),
            flex 0.6s cubic-bezier(0.25, 1, 0.5, 1);

    }


    .tarjeta-acordeon.active {

        height: 390px;

        flex: none;

    }


    .tarjeta-acordeon::after {

        background:
            linear-gradient(
                90deg,
                rgba(0, 0, 0, 0.82) 0%,
                rgba(0, 0, 0, 0.3) 100%
            );

    }


    .tarjeta-acordeon.active::after {

        background:
            linear-gradient(
                0deg,
                rgba(0, 0, 0, 0.92) 0%,
                rgba(0, 0, 0, 0.25) 100%
            );

    }


    .icono {

        width: 42px;

        height: 42px;

        bottom: 50%;

        font-size: 0.95rem;

    }


    .contenido {

        left: 20px;

        right: 20px;

        bottom: 20px;

        max-height: calc(100% - 40px);

        overflow-y: auto;

        padding-right: 3px;

        box-sizing: border-box;

    }


    .contenido h3 {

        font-size: 1.55rem;

        letter-spacing: 2px;

        margin-bottom: 12px;

    }


    .contenido li {

        font-size: 0.82rem;

        letter-spacing: 0.6px;

        line-height: 1.45;

        margin: 6px 0;

    }


    .contenido li:hover {

        transform: translateX(4px);

    }

}
======================================================= */

@media (max-width: 480px) {

    #seccion-acordeon-categorias {

        padding: 38px 13px;

    }


    .titulo-acordeon span {

        font-size: 0.65rem;

        letter-spacing: 1.5px;

    }


    .titulo-acordeon h1 {

        font-size: 1.35rem;

        letter-spacing: 5px;

        margin-bottom: 25px;

    }


    .titulo-acordeon h1.escala {

        font-size: 1.45rem;

        letter-spacing: 2px;

    }


    .contenedor-acordeon {

        gap: 10px;

    }


    .tarjeta-acordeon {

        height: 75px;

        min-height: 75px;

        border-radius: 14px;

    }


    .tarjeta-acordeon.active {

        height: 360px;

    }


    .contenido {

        left: 17px;

        right: 17px;

        bottom: 17px;

    }


    .contenido h3 {

        font-size: 1.35rem;

        letter-spacing: 1px;

        margin-bottom: 10px;

    }


    .contenido h3::after {

        width: 45px;

        height: 2px;

        margin-top: 7px;

    }


    .contenido li {

        font-size: 0.76rem;

        padding-left: 15px;

        line-height: 1.4;

        margin: 5px 0;

    }


    .contenido li::before {

        font-size: 1rem;

    }


    .icono {

        width: 38px;

        height: 38px;

        font-size: 0.85rem;

    }

}

@media (max-width: 360px) {

    #seccion-acordeon-categorias {

        padding: 32px 10px;

    }


    .titulo-acordeon h1 {

        font-size: 1.15rem;

        letter-spacing: 3px;

    }


    .titulo-acordeon h1.escala {

        font-size: 1.25rem;

        letter-spacing: 1px;

    }


    .tarjeta-acordeon {

        height: 70px;

        min-height: 70px;

    }


    .tarjeta-acordeon.active {

        height: 340px;

    }


    .contenido {

        left: 14px;

        right: 14px;

        bottom: 14px;

    }


    .contenido h3 {

        font-size: 1.2rem;

    }


    .contenido li {

        font-size: 0.7rem;

        padding-left: 14px;

    }

}


</style>

</head>


<body>

<main>

<div class="contenedor-acordeon">

    <div
        class="tarjeta-acordeon active"
        onclick="seleccionar(this)"
        style="background-image: url('../../imagenes/categoria/1.png');"
    >

        <div class="icono">
            <i class="fa-solid fa-seedling"></i>
        </div>


        <div class="contenido">

            <h3>Galletas</h3>

            <ul>

                <li>Root Beer Float Cookie</li>

                <li>Peanut Butter Cup Cookie ft. REESEs</li>

                <li>Everything But The Dad Jokes Cookie</li>

                <li>Cookies &amp; Cream Grill-It Cookie</li>

                <li>Dubai-Style Chocolate Cheesecake</li>

                <li>Chocolate Chip Cookie</li>

                <li>Pink Sugar Cookie</li>

            </ul>

        </div>

    </div>

    <div
        class="tarjeta-acordeon"
        onclick="seleccionar(this)"
        style="background-image: url('../../imagenes/categoria/3.png');"
    >

        <div class="icono">
            <i class="fa-solid fa-moon"></i>
        </div>


        <div class="contenido">

            <h3>Croissants</h3>

            <ul>

                <li>Oreo Bliss</li>

                <li>Caramel Crunch</li>

                <li>Berry Cream</li>

                <li>Tropical Choco</li>

                <li>Strawberry Lovers</li>

                <li>Pistachio Dream</li>

            </ul>

        </div>

    </div>


    <div
        class="tarjeta-acordeon"
        onclick="seleccionar(this)"
        style="background-image: url('../../imagenes/categoria/2.png');"
    >

        <div class="icono">
            <i class="fa-solid fa-leaf"></i>
        </div>


        <div class="contenido">

            <h3>Bebidas frías</h3>

            <ul>

                <li>Coffee Crush</li>

                <li>Caramel Vibes</li>

                <li>Berry Kiss</li>

                <li>Cookies &amp; Cream</li>

                <li>Matcha Mood</li>

                <li>Choco Latte Ice</li>

            </ul>

        </div>

    </div>


    <div
        class="tarjeta-acordeon"
        onclick="seleccionar(this)"
        style="background-image: url('../../imagenes/categoria/4.jpg');"
    >

        <div class="icono">
            <i class="fa-solid fa-lemon"></i>
        </div>


        <div class="contenido">

            <h3>Bebidas calientes</h3>

            <ul>

                <li>Americano Clásico</li>

                <li>Espresso Intenso</li>

                <li>Capuccino Cremoso</li>

                <li>Latte Clásico</li>

                <li>Mocha Clásico</li>

            </ul>

        </div>

    </div>


    <div
        class="tarjeta-acordeon"
        onclick="seleccionar(this)"
        style="background-image: url('../../imagenes/categoria/5.jpg');"
    >

        <div class="icono">
            <i class="fa-solid fa-ice-cream"></i>
        </div>


        <div class="contenido">

            <h3>Brownies</h3>

            <ul>

                <li>Brownies con cobertura de Chocolate</li>

                <li>Brownies bañados en Nutella</li>

                <li>Brownies con Fresas</li>

                <li>Brownies con Crema</li>

                <li>Brownies rellenos de Chocolate</li>

            </ul>

        </div>

    </div>


</div>

</main>


<script>


var listaTarjetas =
    document.querySelectorAll('.tarjeta-acordeon');


function seleccionar(tarjetaSeleccionada) {

    for (var i = 0; i < listaTarjetas.length; i++) {

        listaTarjetas[i].classList.remove('active');

    }

    tarjetaSeleccionada.classList.add('active');

}

</script>


</body>

</html>