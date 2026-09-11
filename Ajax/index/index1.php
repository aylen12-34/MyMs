

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menú</title>

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilosbuscar.css">
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
    <!--================== CABECERA ==================-->

    <header>

        <div class="logo">

            🛍 <span>Menu</span>

        </div>

        <div class="busqueda">

            
                <input
                type="text"
                id="textoBuscar"
                placeholder="Buscar producto...">
            <button onclick="buscarProducto()" id="ahj">🔍 Buscar</button>

   

        </div>

        <div id="carritoIcono">

            🛒 <span id="cantidadCarrito">0</span>

        </div>

    </header>
    <?php include("../../includes/navindex.php"); ?>
    <!--================== PRODUCTOS ==================-->

    <main>
 
        <h2 class="titulo">
            Productos Disponibles
        </h2>
        <br>
         <?php include("../../menu.php"); ?>
         <br>
<div id="productosbusqueda">


</div>
        <button id="generarPedido">
            Generar Pedido
        </button>

<div id="productos">
            
</div>
        <section id="productos">

        </section>

    </main>
    


</div>
<!--================== FONDO OSCURO ==================-->

    <div id="fondo"></div>

    <!--================== SIDEBAR ==================-->

    <aside id="sidebar">

        <div class="sidebarHeader">

            <h2>🛒 Mi Carrito</h2>

            <button id="cerrarCarrito">✖</button>

        </div>

        <div id="contenidoCarrito">

        </div>

        <div class="sidebarFooter">

            <h3 id="totalCarrito">

                Total: Bs 0

            </h3>

            <button id="vaciarCarrito">

                Vaciar carrito

            </button>

            <button id="comprar">

                Comprar

            </button>

        </div>

    </aside>
 



<!--================== MODAL COMPRA ==================-->

<div id="modalCompra" class="modal">

    <div class="modalContenido">

        <h2>𓌉◯𓇋 Finalizar Compra</h2>

        <form id="formCompra">

            <input type="text"
                   id="Nombre"
                   placeholder="Nombre completo">

            <input type="text"
                   id="Celular"
                   placeholder="Teléfono">

            <input type="text"
                   id="Direccion"
                   placeholder="Dirección">

            <select id="Metodo">
                <option value="QR">Pago mediante QR</option>
                <option value="Efectivo">Pago en efectivo</option>

            </select>

            <div class="botonesModal">

                <button type="button" id="confirmarPedido">
                    Confirmar Compra
                </button>

                <button type="button" id="cancelarCompra">
                    Cancelar
                </button>

            </div>

        </form>

    </div>

</div>
<script>
document.getElementById("confirmarPedido").addEventListener("click", function(event) {

    var nombre = $("#Nombre").val().trim();
    var celular = $("#Celular").val().trim();
    var direccion = $("#Direccion").val().trim();
    var metodo = $("#Metodo").val();
    var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    var expRegRol = /^[a-z]+$/;

    if (nombre === "") {
        event.stopImmediatePropagation();
        Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese su nombre ⚠',
    didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
        $("#Nombre").focus();
        return;
    }

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(nombre)) {
        event.stopImmediatePropagation();
        Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El nombre debe contener solo letras ⚠',
   didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
        $("#Nombre").focus();
        return;
    }

    if (nombre.value.length < 3) {
        event.stopImmediatePropagation();
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El nombre debe tener al menos 3 letras ⚠',
    didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
            $("#Nombre").focus();
            return false;
        }

    if (celular === "") {
        event.stopImmediatePropagation();
        Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese su celular ⚠',
    didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
        $("#Celular").focus();
        return;
    }

    if (!/^\d+$/.test(celular.value)) {
        event.stopImmediatePropagation();
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El celular debe contener solo números ⚠',
   didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
            $("#Celular").focus();
            return false;
        }

    if (!/^[0-9]{8}$/.test(celular)) {
        event.stopImmediatePropagation();
        Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El celular debe tener exactamente 8 dígitos ⚠',
    didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
        $("#Celular").focus();
        return false;
    }

    if (direccion === "") {
        event.stopImmediatePropagation();
        Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../../imagenes/gatous.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese su dirección ⚠',
   didOpen: () => {
        const audio = new Audio('../../imagenes/gatous.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
        $("#Direccion").focus();
        return false;
    }

}, true);
</script>

<!--================== FONDO MODAL PRODUCTO ==================-->

<div id="fondoProducto"></div>


<!--================== MODAL VER MÁS ==================-->

<div id="modalProducto">

    <button id="cerrarProducto">✖</button>

    <div class="productoDetalle">

        <div class="productoDetalleImagen">

            <img id="detalleImagen" src="" alt="Producto">

        </div>

        <div class="productoDetalleInfo">

            <h2 id="detalleNombre">
                Nombre del producto
            </h2>

            <h3 id="detallePrecio">
                Bs 0
            </h3>

            <p id="detalleDescripcion">
                Descripción del producto
            </p>

            <button id="detalleAgregar">
                🛒 Agregar al carrito
            </button>

        </div>

    </div>

</div>
<script src="../js/productos.js"></script>
<script src="../js/pedido.js"></script>
<script src="../js/carrito.js"></script>
<script src="../js/buscar.js"></script>
</body>

</html>