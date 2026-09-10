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
#seccion-acordeon-categorias {
    padding: 80px 5%;
    background-color: var(--negro); 
    text-align: center;
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
    transition: transform 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275), color 0.8s;
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
}


.tarjeta-acordeon {
    flex: 0.7; 
    background-size: cover;
    background-position: center;
    position: relative;
    border-radius: 20px;
    cursor: pointer;
    overflow: hidden;
    transition: all 0.7s cubic-bezier(0.25, 1, 0.5, 1); 
    border: 1px solid var(--borde-color);
}

.tarjeta-acordeon::after {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: linear-gradient(0deg, rgba(0,0,0,0.85) 0%, rgba(0,0,0,0.2) 100%);
    z-index: 1;
    transition: opacity 0.5s ease;
}


.tarjeta-acordeon.active {
    flex: 4; 
}

.tarjeta-acordeon.active::after {
    background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0.4) 100%);
}

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

.tarjeta-acordeon.active .icono {
    opacity: 0;
    transform: translateX(-50%) translateY(20px);
    pointer-events: none;
}

.contenido {
    position: absolute;
    bottom: 40px;
    left: 40px;
    right: 40px;
    text-align: left;
    z-index: 2;
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.5s ease 0.2s; 
    pointer-events: none;
}


.tarjeta-acordeon.active .contenido {
    opacity: 1;
    transform: translateY(0);
    pointer-events: auto;
}

.contenido h3 {
    font-size: 2rem;
    color: var(--beige);
    font-weight: 300;
    letter-spacing: 4px;
    text-transform: uppercase;
    margin-bottom: 10px;
}

.contenido p {
    font-size: 0.95rem;
    color: rgba(255,255,255,0.8);
    font-weight: 300;
    line-height: 1.6;
    margin-bottom: 20px;
    max-width: 500px;
}


</style>

</head>

<body>
    <main>
        <div class="contenedor-acordeon">
        
    <div class="tarjeta-acordeon active" onclick="seleccionar(this)" style="background-image: url('../../imagenes/galletas/1.png');">
        <div class="icono"><i class="fa-solid fa-seedling"></i></div>
        <div class="contenido">
            <h3>Galletas</h3>
            <li>
                <ol>galleta 1</ol>
                <ol>galleta 2</ol>
                <ol>galleta 3</ol>
                <ol>galleta 4</ol>
                <ol>galleta 5</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/galletas/10.png');">
        <div class="icono"><i class="fa-solid fa-moon"></i></div>
        <div class="contenido">
            <h3>Croasants</h3>
            <li>
                <ol>Croissant 1</ol>
                <ol>Croissant 2</ol>
                <ol>Croissant 3</ol>
                <ol>Croissant 4</ol>
                <ol>Croissant 5</ol>
            </li>
        </div>
    </div>

    <div class="tarjeta-acordeon" onclick="seleccionar(this)" style="background-image: url('../../imagenes/galletas/17.png');">
        <div class="icono"><i class="fa-solid fa-leaf"></i></div>
        <div class="contenido">
            <h3>Bebidas frias</h3>
            <li>
                <ol>Frappe 1</ol>
                <ol>Frappe 2</ol>
                <ol>Frappe 3</ol>
                <ol>Frappe 4</ol>
                <ol>Frappe 5</ol>
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