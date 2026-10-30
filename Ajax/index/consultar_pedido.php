<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar pedido | MyMs</title>

    <link rel="stylesheet" href="../../tipografia/Fonts/WEB/css/chillax.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="consultar_pedido.css">
</head>
<body class="pagina-consultar-pedido">

    <main class="contenedor-consulta">
        <section class="formularioPedido">
            <span class="etiqueta-consulta">MYMS · ATENCIÓN AL CLIENTE</span>
            <h1>Consultar pedido</h1>
            <p class="descripcion-consulta">
                Ingresa el número de tu pedido para conocer su estado.
            </p>

            <label for="numeroPedido">Número de pedido</label>
            <input
                type="number"
                id="numeroPedido"
                placeholder="Ejemplo: 44"
                min="1"
                step="1"
                required
            >

            <button type="button" id="consultar">Consultar estado</button>
            <p id="mensajeConsulta" class="mensaje-consulta" aria-live="polite"></p>
        </section>
    </main>

    <!-- Fondo oscuro y ventana del resultado -->
    <div id="fondoModalPedido" class="fondo-modal-pedido" aria-hidden="true">
        <section
            id="modalPedido"
            class="marco-modal-pedido"
            role="dialog"
            aria-modal="true"
            aria-labelledby="tituloModalPedido"
        >
            <div class="contenido-modal-pedido">
                <button
                    type="button"
                    id="cerrarModalPedido"
                    class="cerrar-modal-pedido"
                    aria-label="Cerrar ventana"
                >×</button>

                <span class="detalle-modal-superior">INFORMACIÓN DE TU COMPRA</span>
                <h2 id="tituloModalPedido">Pedido encontrado</h2>

                <div class="numero-pedido-modal">
                    <span>PEDIDO N.º</span>
                    <strong id="modalPedidoID">—</strong>
                </div>

                <div class="dato-pedido-modal">
                    <span>Cliente</span>
                    <strong id="modalPedidoNombre">—</strong>
                </div>

                <div class="dato-pedido-modal">
                    <span>Fecha</span>
                    <strong id="modalPedidoFecha">—</strong>
                </div>

                <div class="dato-pedido-modal">
                    <span>Estado del pedido</span>
                    <strong id="modalPedidoEstado" class="estado-pedido-modal">—</strong>
                </div>

                <div class="dato-pedido-modal">
                    <span>Vendedor</span>
                    <strong id="modalPedidoVendedor">—</strong>
                </div>

                <a id="enlaceReciboPedido" class="enlace-recibo-pedido" href="#">
                    ¿Necesitas de nuevo el recibo?
                </a>
            </div>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../js/consultar.js"></script>
</body>
</html>
