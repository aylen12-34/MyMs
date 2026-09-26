<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menú</title>

    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="estilosbuscar.css">
    <link rel="stylesheet" href="../../tipografia/Fonts/WEB/css/chillax.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>

* {
    box-sizing: border-box;
}

html,
body {
    max-width: 100%;
    overflow-x: hidden;
}

img {
    max-width: 100%;
    height: auto;
}

/* HEADER */

header {
    width: 100%;
}

.logo {
    flex-shrink: 0;
}

.busqueda {
    min-width: 0;
    max-width: 100%;
}

.busqueda input {
    min-width: 0;
    max-width: 100%;
}

#carritoIcono {
    flex-shrink: 0;
}

main {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
}

#productosbusqueda,
#productos {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

#productosbusqueda > *,
#productos > * {
    min-width: 0;
    max-width: 100%;
}

#sidebar {
    max-width: 100vw;
}

#contenidoCarrito {
    max-width: 100%;
    overflow-x: hidden;
}

#modalCompra {
    max-width: 100vw;
    padding: 20px;
}

.modalContenido {
    width: min(520px, 95vw);
    max-width: 95vw;
    max-height: 90vh;
    overflow-y: auto;
}

#formCompra {
    width: 100%;
}

#formCompra input,
#formCompra select {
    width: 100%;
    max-width: 100%;
}

.botonesModal {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.botonesModal button {
    max-width: 100%;
}

#modalProducto {
    width: min(900px, 94vw);
    max-width: 94vw;
    max-height: 90vh;
    overflow-y: auto;
    overflow-x: hidden;
}

.productoDetalle {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

.productoDetalleImagen {
    min-width: 0;
    max-width: 100%;
}

.productoDetalleImagen img {
    max-width: 100%;
    height: auto;
}

.productoDetalleInfo {
    min-width: 0;
    max-width: 100%;
}

.productoDetalleInfo h2,
.productoDetalleInfo h3,
.productoDetalleInfo p {
    max-width: 100%;
    overflow-wrap: break-word;
}


@media (max-width: 1000px) {

    header {
        flex-wrap: wrap;
        gap: 15px;
    }

    .busqueda {
        order: 3;
        width: 100%;
        flex-basis: 100%;
    }

}

@media (max-width: 768px) {

    header {
        padding-left: 4%;
        padding-right: 4%;
    }

    .busqueda {
        width: 100%;
        flex-basis: 100%;
    }

    .productoDetalle {
        flex-direction: column;
    }

    .productoDetalleImagen {
        width: 100%;
        max-width: 500px;
        margin: auto;
    }

    .productoDetalleInfo {
        width: 100%;
        text-align: center;
    }

    #detalleDescripcion {
        text-align: left;
    }

}


@media (max-width: 600px) {

    header {
        padding: 15px 4%;
    }

    .busqueda {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 8px;
    }

    .busqueda input,
    .busqueda button {
        width: 100%;
        max-width: 100%;
    }

    main {
        padding-left: 4%;
        padding-right: 4%;
    }

    #sidebar {
        width: 94vw;
        max-width: 94vw;
    }

    #modalCompra {
        padding: 10px;
    }

    .modalContenido {
        width: 94vw;
        max-width: 94vw;
        padding: 20px 15px;
    }

    .botonesModal {
        flex-direction: column;
    }

    .botonesModal button {
        width: 100%;
    }

    #modalProducto {
        width: 94vw;
        max-width: 94vw;
        padding: 18px 15px;
    }

}

@media (max-width: 400px) {

    header {
        padding-left: 3%;
        padding-right: 3%;
    }

    main {
        padding-left: 3%;
        padding-right: 3%;
    }

    #modalProducto,
    .modalContenido {
        width: 96vw;
        max-width: 96vw;
    }

}

</style>

</head>

<body>

    <header>

        <div class="logo">
            ☕︎ <span>Menu</span>
        </div>

        <div class="busqueda">

            <input
                type="text"
                id="textoBuscar"
                placeholder="Buscar producto...">

            <button onclick="buscarProducto()" id="ahj">
                🔍 Buscar
            </button>

        </div>

        <div id="carritoIcono">
            🛒 <span id="cantidadCarrito">0</span>
        </div>

    </header>

    <?php include("../../includes/navindex.php"); ?>

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

    <div id="fondo"></div>

    <aside id="sidebar">

        <div class="sidebarHeader">

            <h2>🛒 Mi Carrito</h2>

            <button id="cerrarCarrito">
                ✖
            </button>

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

    <div id="modalCompra" class="modal">

        <div class="modalContenido">

            <h2>𓌉◯𓇋 Finalizar Compra</h2>

            <form id="formCompra">

                <input
                    type="text"
                    id="Nombre"
                    placeholder="Nombre completo"
                    required
                    minlength="3"
                    maxlength="50"
                    pattern="[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+">

                <input
                     type="text"
                     id="Celular"
                     placeholder="Número de celular"
                     required
                     minlength="8"
                     maxlength="8"
                     pattern="[0-9]{8}"
                     inputmode="numeric">

                <input
                    type="text"
                    id="Direccion"
                    placeholder="Dirección"
                    maxlength="255"
                    minlength="5"
                    required
                    autocomplete="street-address">

                <select id="Metodo" required>

                    <option value="QR">
                        Pago mediante QR
                    </option>

                    <option value="Efectivo">
                        Pago en efectivo
                    </option>

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

            var expRegNombre =
                /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

            var expRegRol =
                /^[a-z]+$/;

            var modal =
                document.getElementById("modalCompra");

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

                        }

                    }

                });

                $("#Nombre").focus();

                return;

            }

            if (nombre.length < 3) {

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

                        }

                    }

                });

                $("#Celular").focus();

                return;

            }

            if (!/^\d+$/.test(celular)) {

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

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

                    willOpen: () => {
                        modal.style.display = 'none';
                    },

                    willClose: () => {
                        modal.style.display = 'flex';
                    },

                    didOpen: () => {

                        const audio =
                            new Audio('../../imagenes/gatous.mp3');

                        const imagenSwal =
                            Swal.getImage();

                        if (imagenSwal) {

                            imagenSwal.style.cursor = 'pointer';

                            imagenSwal.addEventListener(
                                'click',
                                () => {

                                    audio.currentTime = 0;
                                    audio.play();

                                }
                            );

                        }

                    }

                });

                $("#Direccion").focus();

                return false;

            }

        }, true);

    </script>

    <div id="fondoProducto"></div>

    <div id="modalProducto">

        <button id="cerrarProducto">
            ✖
        </button>

        <div class="productoDetalle">

            <div class="productoDetalleImagen">

                <img
                    id="detalleImagen"
                    src=""
                    alt="Producto">

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