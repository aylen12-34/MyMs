<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pedido Personalizado</title>

    <link rel="stylesheet" href="../../tipografia/Fonts/WEB/css/chillax.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>

* {
    box-sizing: border-box;
    font-family: 'Chillax-Semibold';
}

html,
body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    background-image: url(../../imagenes/2.png);
    background-size: cover;
    color: #6A253A;
}

body {
    padding-top: 85px;
}

main {
    width: 90%;
    max-width: 900px;
    margin: 40px auto;
    background: #6A253A;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
}

.titulo {
    text-align: center;
    font-size: 35px;
    color: #EFE2DA;
    margin-bottom: 10px;
}

.descripcion {
    text-align: center;
    color: #EFE2DA;
    margin-bottom: 35px;
    font-size: 17px;
    line-height: 1.5;
}

.grupo {
    margin-bottom: 20px;
}

.grupo label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #EFE2DA;
}

.obligatorio {
    color: #E64B6B;
}

.grupo input,
.grupo textarea {
    width: 100%;
    padding: 13px;
    border: 2px solid #E64B6B;
    border-radius: 10px;
    font-size: 16px;
    outline: none;
    background: #ffffff;
    color: #6A253A;
}

.grupo input::placeholder,
.grupo textarea::placeholder {
    color: #6A253A;
    opacity: 0.65;
}

.grupo input:focus,
.grupo textarea:focus {
    border-color: #E64B6B;
    box-shadow: 0 0 0 2px rgba(230, 75, 107, 0.2);
}

.fila {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.grupo textarea {
    resize: vertical;
    min-height: 120px;
}

#enviarPedido {
    width: 100%;
    padding: 15px;
    margin-top: 15px;
    border: none;
    border-radius: 12px;
    background: #E64B6B;
    color: #EFE2DA;
    font-size: 18px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

#enviarPedido:hover {
    background: #EFE2DA;
    color: #6A253A;
}

#enviarPedido:active {
    transform: scale(0.98);
}

@media (max-width: 700px) {

    main {
        width: 94%;
        padding: 25px 20px;
        margin: 25px auto;
    }

    .titulo {
        font-size: 28px;
    }

    .descripcion {
        font-size: 15px;
    }

    .fila {
        grid-template-columns: 1fr;
        gap: 0;
    }

}

@media (max-width: 400px) {

    main {
        width: 96%;
        padding: 22px 15px;
    }

    .titulo {
        font-size: 25px;
    }

    #enviarPedido {
        font-size: 16px;
    }
    .btn-volver-esquina {
            top: 15px;
            left: 15px;
            width: 45px;
            height: 45px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.30);
        }
            .btn-volver-esquina {
        top: 15px;
        left: 15px;
        width: 45px;
        height: 45px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.30);
    }
    .btn-volver-esquina::before {
        width: 8px;
        height: 8px;
        border-left: 2.5px solid #EFE2DA;
        border-bottom: 2.5px solid #EFE2DA;
        left: 19px;
        top: 17px;
        margin: 0;
    }
    .btn-volver-esquina:hover {
        transform: scale(1.08);
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.40);
    }

    .btn-volver-esquina:active {
        transform: scale(0.95);
    }

}
.btn-volver-esquina {
        position: fixed;
        top: 25px;
        left: 25px;

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #6A253A;
        border: none;
        border-radius: 50%;

        cursor: pointer;

        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.30);

        transition: transform 0.2s ease, box-shadow 0.2s ease;

        z-index: 9999;
        text-decoration: none;
    }
        .btn-volver-esquina::before {
    content: "";

    position: absolute;

    width: 9px;
    height: 9px;

    border-left: 3px solid #EFE2DA;
    border-bottom: 3px solid #EFE2DA;

    transform: rotate(45deg);

    left: 23px;
    top: 20px;
}
        .btn-volver-esquina:hover {
            transform: scale(1.1);

            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
        }
        .btn-volver-esquina:active {
            transform: scale(0.95);
        }
</style>

</head>

<body>
      <a href="index1.php"><button href="" class="btn-volver-esquina" aria-label="Volver"> </button></a>
    <main>

    <h1 class="titulo">
        Pedido Personalizado
    </h1>

    <p class="descripcion">
        ¿Tienes una idea especial?
        Cuéntanos cómo la imaginas y nos pondremos en contacto contigo
        para definir los detalles y el precio.
    </p>

    <form id="formPedidoPersonalizado">

        <div class="fila">

            <div class="grupo">

                <label for="nombre">
                    Nombre completo 
                </label>

                <input
                    type="text"
                    id="nombre"
                    maxlength="50"
                    placeholder="Ej. Mathias Torrico">

            </div>

            <div class="grupo">

                <label for="celular">
                    Número de celular 
                </label>

                <input
                    type="text"
                    id="celular"
                    maxlength="8"
                    placeholder="Ej. 69505739"
                    inputmode="numeric">

            </div>

        </div>

        <div class="grupo">

            <label for="producto">
                ¿Qué quieres pedir? 
            </label>

            <input
                type="text"
                id="producto"
                maxlength="100"
                placeholder="Ej. Torta, galletas, brownies...">

        </div>

        <div class="fila">

            <div class="grupo">

                <label for="cantidad">
                    Cantidad
                </label>

                <input
                    type="number"
                    id="cantidad"
                    min="1"
                    max="1000"
                    placeholder="Ej. 12">

            </div>

            <div class="grupo">

                <label for="fecha">
                    Fecha deseada 
                </label>

                <input
                    type="date"
                    id="fecha">

            </div>

        </div>

        <div class="grupo">

            <label for="sabor">
                Sabor
            </label>

            <input
                type="text"
                id="sabor"
                maxlength="100"
                placeholder="Ej. Chocolate">

        </div>

        <div class="grupo">

            <label for="relleno">
                Relleno
            </label>

            <input
                type="text"
                id="relleno"
                maxlength="100"
                placeholder="Ej. Dulce de leche">

        </div>

        <div class="grupo">

            <label for="decoracion">
                Decoración o temática
            </label>

            <input
                type="text"
                id="decoracion"
                maxlength="200"
                placeholder="Ej. Temática de fútbol, colores negro y dorado...">

        </div>

        <div class="grupo">

            <label for="detalles">
                Detalles adicionales
            </label>

            <textarea
                id="detalles"
                maxlength="500"
                placeholder="Cuéntanos cualquier otro detalle que quieras agregar..."></textarea>

        </div>

        <button type="button" id="enviarPedido">
            Enviar pedido por WhatsApp
        </button>

    </form>

</main>
      <script>

document.getElementById("enviarPedido").addEventListener("click", function() {

    var nombre = document.getElementById("nombre").value.trim();
    var celular = document.getElementById("celular").value.trim();
    var producto = document.getElementById("producto").value.trim();
    var cantidad = document.getElementById("cantidad").value.trim();
    var sabor = document.getElementById("sabor").value.trim();
    var relleno = document.getElementById("relleno").value.trim();
    var decoracion = document.getElementById("decoracion").value.trim();
    var fecha = document.getElementById("fecha").value;
    var detalles = document.getElementById("detalles").value.trim();

    if (nombre === "") {

        Swal.fire({
            title: "Alerta",
            text: "Ingrese su nombre.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("nombre").focus();
        return;
    }

    if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/.test(nombre)) {

        Swal.fire({
            title: "Alerta",
            text: "El nombre debe contener solamente letras.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("nombre").focus();
        return;
    }

    if (nombre.length < 3) {

        Swal.fire({
            title: "Alerta",
            text: "El nombre debe tener al menos 3 letras.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("nombre").focus();
        return;
    }

    if (celular === "") {

        Swal.fire({
            title: "Alerta",
            text: "Ingrese su número de celular.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("celular").focus();
        return;
    }

    if (!/^[0-9]{8}$/.test(celular)) {

        Swal.fire({
            title: "Alerta",
            text: "El celular debe contener exactamente 8 números.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("celular").focus();
        return;
    }

    if (producto === "") {

        Swal.fire({
            title: "Alerta",
            text: "Indique qué producto desea.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("producto").focus();
        return;
    }

    if (cantidad === "" || cantidad < 1) {

        Swal.fire({
            title: "Alerta",
            text: "Ingrese una cantidad válida.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("cantidad").focus();
        return;
    }

    if (fecha === "") {

        Swal.fire({
            title: "Alerta",
            text: "Seleccione la fecha en la que necesita su pedido.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("fecha").focus();
        return;
    }

    var fechaSeleccionada = new Date(fecha + "T00:00:00");
    var hoy = new Date();

    hoy.setHours(0, 0, 0, 0);

    if (fechaSeleccionada < hoy) {

        Swal.fire({
            title: "Alerta",
            text: "La fecha del pedido no puede ser anterior a hoy.",
            background: "#e65c78",
            color: "#EFE2DA",
            confirmButtonColor: "#6A253A"
        });

        document.getElementById("fecha").focus();
        return;
    }

    var mensaje =
    "🍰 *NUEVO PEDIDO PERSONALIZADO - MYMS*%0A%0A" +

    "👤 *DATOS DEL CLIENTE*%0A" +
    "Nombre: " + encodeURIComponent(nombre) + "%0A" +
    "Celular: " + encodeURIComponent(celular) + "%0A%0A" +

    "🍪 *DETALLES DEL PEDIDO*%0A" +
    "Producto: " + encodeURIComponent(producto) + "%0A" +
    "Cantidad: " + encodeURIComponent(cantidad) + "%0A";

if (sabor !== "") {
    mensaje += "Sabor: " + encodeURIComponent(sabor) + "%0A";
}

if (relleno !== "") {
    mensaje += "Relleno: " + encodeURIComponent(relleno) + "%0A";
}

if (decoracion !== "") {
    mensaje += "%0A🎨 *PERSONALIZACIÓN*%0A" +
               "Decoración/temática: " +
               encodeURIComponent(decoracion) + "%0A";
}

mensaje +=
    "%0A📅 *FECHA DE ENTREGA*%0A" +
    encodeURIComponent(fecha) + "%0A";

if (detalles !== "") {
    mensaje +=
        "%0A📝 *DETALLES ADICIONALES*%0A" +
        encodeURIComponent(detalles) + "%0A";
}

mensaje +=
    "%0A━━━━━━━━━━━━━━%0A" +
    "Este pedido es una solicitud de personalización.%0A" +
    "El precio y los detalles finales deben ser confirmados con el cliente.";

var numeroMyMs = "591XXXXXXXX";

var url =
    "https://wa.me/" +
    numeroMyMs +
    "?text=" +
    mensaje;

window.open(url, "_blank");

});

</script>
</body>

</html>