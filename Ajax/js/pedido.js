document.addEventListener("DOMContentLoaded", () => {

    verificarEstadoPedido();

});


//==============================
// ABRIR FORMULARIO
//==============================

document.getElementById("generarPedido").addEventListener("click", () => {

    document
        .getElementById("modalCompra")
        .style.display = "flex";

});


//==============================
// CERRAR FORMULARIO
//==============================

document.getElementById("cancelarCompra").addEventListener("click", () => {

    document.getElementById("modalCompra")
        .style.display = "none";

});


//==============================
// CONFIRMAR COMPRA
//==============================

document.getElementById("confirmarPedido").addEventListener("click", () => {

    let datos = {

        Nombre: document.getElementById("Nombre").value.trim(),
        Celular: document.getElementById("Celular").value.trim(),
        Direccion: document.getElementById("Direccion").value.trim(),
        Metodo: document.getElementById("Metodo").value

    };


    //==============================
    // VALIDAR MÉTODO DE PAGO
    //==============================

    const metodosPermitidos = ["QR", "Efectivo"];

    if (!metodosPermitidos.includes(datos.Metodo)) {

        alert("Método de pago inválido");
        return;

    }


    //==============================
    // ENVIAR PEDIDO
    //==============================

    fetch("../index/crearpedido.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify(datos)

    })


    .then(res => res.json())


    .then(data => {

        console.log(data);


        if (data.ok) {

            document.getElementById("modalCompra").style.display = "none";


            //==============================
            // VIDEO DE CONFIRMACIÓN
            //==============================

            const videoChimuelo = document.createElement("video");

            videoChimuelo.src = "../../imagenes/chimuelo.mp4";
            videoChimuelo.autoplay = true;
            videoChimuelo.muted = false;

            videoChimuelo.style.width = "200px";
            videoChimuelo.style.borderRadius = "20px";
            videoChimuelo.style.border = "3px solid #EFE2DA";
            videoChimuelo.style.display = "block";
            videoChimuelo.style.margin = "0 auto";


            //==============================
            // MENSAJE DE CONFIRMACIÓN
            //==============================

            Swal.fire({

                title: "Pedido N°" + data.pedidos,

                background: "#e65c78",

                color: "#EFE2DA",

                html: videoChimuelo,

                confirmButtonText: "OK",

                confirmButtonColor: "#6A253A",

                text: "Gracias por tu compra"

            }).then((result) => {

                if (result.isConfirmed) {

                    const idPedido = Number(data.pedidos);

                    if (!Number.isInteger(idPedido) || idPedido <= 0) {

                        console.error("ID de pedido inválido");
                        return;

                    }

                    window.location.href =
                        "index1.php?ID=" + encodeURIComponent(idPedido);

                }

            });


        } else {

            alert(data.mensaje);

        }


    })


    .catch(error => {

        console.log("Error:", error);

    });


});


//==============================
// VERIFICAR ESTADO DEL PEDIDO
//==============================

function verificarEstadoPedido() {

    fetch("estadopedido.php")

        .then(res => res.json())

        .then(data => {

            if (data.ok) {

                let pedido = data.pedido;


                if (pedido.Estado == "Pendiente") {

                    document.getElementById("formularioPedido").style.display = "none";

                    document.getElementById("resumenPedido").style.display = "block";



                    const datosPedido =
                        document.getElementById("datosPedido");
                    datosPedido.replaceChildren();

                    const pNumero = document.createElement("p");

                    pNumero.textContent =
                        "Número pedido: " + pedido.id;

                    datosPedido.appendChild(pNumero);

                    const pCliente = document.createElement("p");

                    pCliente.textContent =
                        "Cliente: " + pedido.Nombre;

                    datosPedido.appendChild(pCliente);
                    const pTelefono = document.createElement("p");

                    pTelefono.textContent =
                        "Teléfono: " + pedido.telefono;

                    datosPedido.appendChild(pTelefono);
                    const pDireccion = document.createElement("p");

                    pDireccion.textContent =
                        "Dirección: " + pedido.direccion;

                    datosPedido.appendChild(pDireccion);
                    const pMetodo = document.createElement("p");

                    pMetodo.textContent =
                        "Método pago: " + pedido.metodoPago;

                    datosPedido.appendChild(pMetodo);
                    const pEstado = document.createElement("p");

                    pEstado.textContent =
                        "Estado: Pendiente de aprobación";

                    datosPedido.appendChild(pEstado);

                }

            }

        })

        .catch(error => {

            console.log("Error al verificar el pedido:", error);

        });

}