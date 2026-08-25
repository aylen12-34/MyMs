

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu</title>

    <link rel="stylesheet" href="estilos.css">

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
                id="Buscar"
                placeholder="Buscar producto...">
            <button id="textoBuscar">
            Buscar
        </button>

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

        <button id="generarPedido">
            Generar Pedido
        </button>

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

        <h2>🛍 Finalizar Compra</h2>

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

            <button id="confirmarPedido">
                Confirmar Compra
            </button>

            <button id="cancelarCompra">
                Cancelar
            </button>

        </div>

    </div>

</div>

</div>
    

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