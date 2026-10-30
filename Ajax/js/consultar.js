document.addEventListener("DOMContentLoaded", () => {
    const botonConsultar = document.getElementById("consultar");
    const inputID = document.getElementById("numeroPedido");
    const mensaje = document.getElementById("mensajeConsulta");

    const fondoModal = document.getElementById("fondoModalPedido");
    const botonCerrar = document.getElementById("cerrarModalPedido");

    const modalID = document.getElementById("modalPedidoID");
    const modalNombre = document.getElementById("modalPedidoNombre");
    const modalFecha = document.getElementById("modalPedidoFecha");
    const modalEstado = document.getElementById("modalPedidoEstado");
    const modalVendedor = document.getElementById("modalPedidoVendedor");
    const enlaceRecibo = document.getElementById("enlaceReciboPedido");

    function abrirModal() {
        fondoModal.classList.add("activo");
        fondoModal.setAttribute("aria-hidden", "false");
        document.body.classList.add("modal-pedido-abierto");
        botonCerrar.focus();
    }

    function cerrarModal() {
        fondoModal.classList.remove("activo");
        fondoModal.setAttribute("aria-hidden", "true");
        document.body.classList.remove("modal-pedido-abierto");
    }

    function mostrarPedido(pedido) {
        // Se utiliza textContent para mostrar los datos sin interpretar HTML.
        modalID.textContent = pedido.ID ?? "—";
        modalNombre.textContent = pedido.Nombre ?? "No especificado";
        modalFecha.textContent = pedido.Fecha ?? "No especificada";
        modalEstado.textContent = pedido.Estado ?? "No especificado";
        modalVendedor.textContent = pedido.NombreVendedor || "Pendiente";

        enlaceRecibo.href = "recibo.php?ID=" + encodeURIComponent(pedido.ID);
        abrirModal();
    }

    function mostrarPedidoInexistente(id) {
        if (typeof Swal === "undefined") {
            alert("No existe ningún pedido con el ID " + id);
            return;
        }

        Swal.fire({
            title: "¡Pedido no encontrado!",
            text: "No existe ningún pedido con el ID de recibo " + id,
            background: "#FFF8F4",
            color: "#6A253A",
            imageUrl: "../../imagenes/gatocajasad.png",
            imageHeight: 150,
            imageAlt: "Gatito de MyMs",
            confirmButtonText: "Entendido",
            confirmButtonColor: "#6A253A",
            customClass: {
                popup: "swal-myms",
                title: "swal-myms-titulo",
                confirmButton: "swal-myms-boton"
            },
            didOpen: () => {
                const audio = new Audio("../../imagenes/gatous.mp3");
                const imagenSwal = Swal.getImage();

                if (imagenSwal) {
                    imagenSwal.style.cursor = "pointer";
                    imagenSwal.title = "Haz clic para reproducir el sonido";
                    imagenSwal.addEventListener("click", () => {
                        audio.currentTime = 0;
                        const reproduccion = audio.play();
                        if (reproduccion && typeof reproduccion.catch === "function") {
                            reproduccion.catch(() => {});
                        }
                    });
                }
            }
        });
    }

    async function consultarPedido() {
        const id = inputID.value.trim();

        if (!id || !/^[0-9]+$/.test(id) || Number(id) < 1) {
            mensaje.textContent = "Ingresa un número de pedido válido.";
            inputID.focus();
            return;
        }

        mensaje.textContent = "Consultando pedido...";
        botonConsultar.disabled = true;

        try {
            const respuesta = await fetch("consultar_pedido_ajax.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8"
                },
                body: new URLSearchParams({ id: id }).toString()
            });

            const data = await respuesta.json();

            if (!respuesta.ok) {
                throw new Error(data.mensaje || "No se pudo consultar el pedido.");
            }

            mensaje.textContent = "";

            if (data.ok && data.pedido) {
                mostrarPedido(data.pedido);
            } else {
                mostrarPedidoInexistente(id);
            }
        } catch (error) {
            console.error("Error al consultar el pedido:", error);
            mensaje.textContent = "No se pudo realizar la consulta. Intenta nuevamente.";
        } finally {
            botonConsultar.disabled = false;
        }
    }

    botonConsultar.addEventListener("click", consultarPedido);

    inputID.addEventListener("keydown", (evento) => {
        if (evento.key === "Enter") {
            evento.preventDefault();
            consultarPedido();
        }
    });

    botonCerrar.addEventListener("click", cerrarModal);

    // Cerrar únicamente cuando se hace clic en el fondo oscuro.
    fondoModal.addEventListener("click", (evento) => {
        if (evento.target === fondoModal) {
            cerrarModal();
        }
    });

    document.addEventListener("keydown", (evento) => {
        if (evento.key === "Escape" && fondoModal.classList.contains("activo")) {
            cerrarModal();
        }
    });
});
