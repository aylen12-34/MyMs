<?php
require "../../Ventas/bdVentas.php";

$Pedidos_ID=$_GET['Pedidos_ID'];

$sqlr="SELECT * FROM Ventas WHERE Pedidos_ID='$Pedidos_ID'";
$resultador = $conexion->query($sqlr);

while($fila=$resultador->fetch_assoc()){
    $Metodo = $fila['Metodo'];
}

$sql="SELECT * FROM carrito JOIN pedidos ON carrito.Pedidos_ID=pedidos.ID WHERE carrito.Pedidos_ID='$Pedidos_ID'";

$resultado=$conexion->query($sql);

$pedido=$resultado->fetch_assoc();

?>

<!DOCTYPE html>
<html>

<head>

<title>Recibo</title>

<link rel="stylesheet" href="css/ticket.css">

<style>

@import url('https://fonts.googleapis.com/css2?family=Cinzel+Decorative:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    min-height: 100vh;
    padding: 40px 20px;

    background-image: url("../../imagenes/2.png");

    background-size: cover;
    background-position: center;
    background-attachment: fixed;

    font-family: 'Poppins', sans-serif;
    color: #6A253A;

    display: flex;
    flex-direction: column;
    align-items: center;
}

body::before {
    content: "";
    position: fixed;
    inset: 0;

    background: rgba(239, 226, 218, 0.55);

    z-index: -1;
}

h1 {
    width: 100%;
    max-width: 650px;

    text-align: center;

    font-family: 'Cinzel Decorative', serif;
    font-size: 34px;

    color: #6A253A;

    margin-bottom: 5px;

    text-shadow: 1px 2px 3px rgba(0, 0, 0, 0.15);
}

/* RECIBO DE PEDIDO */

h2 {
    width: 100%;
    max-width: 650px;

    text-align: center;

    background: #6A253A;
    color: #EFE2DA;

    padding: 15px;

    border-radius: 14px 14px 0 0;

    font-size: 21px;
    letter-spacing: 1px;

    box-shadow: 0 8px 20px rgba(106, 37, 58, 0.25);
}

/* INFORMACIÓN DEL PEDIDO */

p {
    width: 100%;
    max-width: 650px;

    background: #EFE2DA;

    padding: 12px 20px;

    font-size: 15px;

    color: #4d1b2b;

    border-left: 4px solid #E64B6B;
}

/* SEPARACIÓN ENTRE DATOS */

p + p {
    border-top: 1px solid rgba(106, 37, 58, 0.12);
}

/* LÍNEA */

hr {
    width: 100%;
    max-width: 650px;

    border: none;

    border-top: 2px dashed #E64B6B;

    margin: 18px 0;
}

/* TÍTULOS */

h3 {
    width: 100%;
    max-width: 650px;

    text-align: center;

    color: #6A253A;

    font-size: 19px;

    margin: 10px 0;
}

/* PRODUCTOS */

h3 + p {
    border-radius: 12px;

    margin-bottom: 10px;

    box-shadow: 0 4px 10px rgba(106, 37, 58, 0.12);
}

/* TOTAL */

h2:last-of-type {
    width: 100%;
    max-width: 650px;

    margin-top: 15px;

    padding: 18px;

    text-align: center;

    background: #E64B6B;

    color: white;

    border-radius: 12px;

    font-size: 24px;

    box-shadow: 0 6px 15px rgba(230, 75, 107, 0.3);
}

/* MENSAJE DE ESTADO */

h3:last-of-type {
    background: #EFE2DA;

    padding: 15px;

    border-radius: 12px;

    color: #6A253A;

    font-size: 16px;

    box-shadow: 0 4px 12px rgba(106, 37, 58, 0.15);
}


/* ========================= */
/* CÓDIGO QR */
/* ========================= */

.qr-recibo {
    width: 100%;
    max-width: 650px;

    background: #EFE2DA;

    padding: 20px;

    margin: 20px 0;

    text-align: center;

    border-radius: 14px;

    border: 2px solid rgba(106, 37, 58, 0.15);

    box-shadow: 0 5px 15px rgba(106, 37, 58, 0.15);
}

.qr-recibo h3 {
    width: 100%;

    margin: 0 0 15px 0;

    padding: 0;

    background: none;

    box-shadow: none;

    color: #6A253A;

    font-size: 18px;
}

.qr-recibo img {
    width: 250px;
    height: 250px;

    padding: 8px;

    background: white;

    border-radius: 10px;

    border: 2px solid #6A253A;

    box-shadow: 0 4px 10px rgba(106, 37, 58, 0.2);
}

.qr-recibo p {
    width: 100%;
    max-width: none;

    background: none;

    border: none;

    padding: 10px 0 0;

    margin: 0;

    color: #6A253A;

    font-size: 13px;
}


/* ========================= */
/* BOTONES */
/* ========================= */

button {
    border: none;

    border-radius: 10px;

    padding: 12px 22px;

    margin: 8px 5px;

    font-family: 'Poppins', sans-serif;

    font-size: 14px;

    font-weight: 600;

    cursor: pointer;

    transition: 0.3s ease;
}

/* BOTÓN IMPRIMIR */

button:first-of-type {
    background: #6A253A;

    color: #EFE2DA;
}

button:first-of-type:hover {
    background: #E64B6B;

    transform: translateY(-2px);

    box-shadow: 0 5px 12px rgba(106, 37, 58, 0.3);
}

/* BOTÓN VOLVER */

#volverProductos {
    background: #EFE2DA;

    border: 2px solid #6A253A;

    color: #6A253A;
}

#volverProductos:hover {
    background: #6A253A;

    color: #EFE2DA;

    transform: translateY(-2px);
}

#volverProductos a {
    color: inherit;

    text-decoration: none;
}


/* ========================= */
/* RESPONSIVE */
/* ========================= */

@media (max-width: 700px) {

    body {
        padding: 25px 12px;
    }

    h1 {
        font-size: 27px;
    }

    h2:first-of-type {
        font-size: 18px;
    }

    p {
        font-size: 14px;

        padding: 11px 15px;
    }

    h2:last-of-type {
        font-size: 21px;
    }

    button {
        width: 90%;

        max-width: 300px;
    }

    .qr-recibo img {
        width: 220px;
        height: 220px;
    }
}


/* ========================= */
/* IMPRESIÓN */
/* ========================= */

@media print {

    @page {
        size: A4;
        margin: 10mm;
    }

    body {
        background-image: url("../../imagenes/2.png") !important;

        background-size: cover;
        background-position: center;

        padding: 0;

        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    body::before {
        display: block;
    }

    button {
        display: none !important;
    }

    h1 {
        margin-top: 0;
        margin-bottom: 2px;

        font-size: 28px;
    }

    h2 {
        padding: 8px;

        font-size: 17px;

        box-shadow: none;
    }

    p {
        padding: 7px 12px;

        font-size: 12px;
    }

    hr {
        margin: 8px 0;
    }

    h3 {
        margin: 5px 0;

        font-size: 14px;
    }

    h2:last-of-type {
        margin-top: 7px;

        padding: 10px;

        font-size: 19px;
    }
    .qr-recibo {
        padding: 8px;

        margin: 8px 0;

        box-shadow: none;
    }

    .qr-recibo h3 {
        margin-bottom: 5px;

        font-size: 14px;
    }

    .qr-recibo img {
        width: 130px;
        height: 130px;

        padding: 5px;

        box-shadow: none;
    }

    .qr-recibo p {
        padding: 4px 0 0;

        font-size: 10px;
    }

    h2,
    p,
    h3,
    .qr-recibo {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
}

</style>

</head>


<body>


<h1>MI TIENDA</h1>


<h2>
Recibo de Pedido
</h2>


<p>
Número:
<?php echo $pedido["Pedidos_ID"]; ?>
</p>


<p>
Cliente:
<?php echo $pedido["Nombre"]; ?>
</p>


<p>
Teléfono:
<?php echo $pedido["Celular"]; ?>
</p>


<p>
Dirección:
<?php echo $pedido["Direccion"]; ?>
</p>


<p>
Método de pago:
<?php echo $Metodo; ?>
</p>


<p>
Estado:
<?php echo $pedido["Estado"]; ?>
</p>


<hr>


<h2>
Productos
</h2>


<?php

$sqlProductos="SELECT * FROM carrito c JOIN productos p ON c.Productos_Codigo=p.Codigo WHERE c.Pedidos_ID='$Pedidos_ID'";

$resultadoProductos=$conexion->query($sqlProductos);

$total=0;


/*
=========================================
CREAMOS LOS DATOS QUE IRÁN EN EL QR
=========================================
*/

$datosQR =
"RECIBO DE PEDIDO\n" .
"--------------------------\n" .
"Numero: " . $pedido["Pedidos_ID"] . "\n" .
"Cliente: " . $pedido["Nombre"] . "\n" .
"Telefono: " . $pedido["Celular"] . "\n" .
"Direccion: " . $pedido["Direccion"] . "\n" .
"Metodo de pago: " . $Metodo . "\n" .
"Estado: " . $pedido["Estado"] . "\n" .
"--------------------------\n" .
"PRODUCTOS\n";


while($producto=$resultadoProductos->fetch_assoc()){

    $total += $producto["CostoTotal"];


    echo "

    <p>
    ".$producto["Nombre"]."
    <br>
    Cantidad: ".$producto["Cantidad"]."
    <br>
    Subtotal: Bs ".$producto["CostoTotal"]."
    </p>

    ";


    /*
    Agregamos cada producto al QR
    */

    $datosQR .=
    $producto["Nombre"] . "\n" .
    "Cantidad: " . $producto["Cantidad"] . "\n" .
    "Subtotal: Bs " . $producto["CostoTotal"] . "\n" .
    "--------------------------\n";

}


/*
=========================================
AGREGAMOS EL TOTAL AL QR
=========================================
*/

$datosQR .= "TOTAL: Bs " . $total;


/*
=========================================
GENERAMOS EL CÓDIGO QR
=========================================
*/

$qr = "https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=" . urlencode($datosQR);

?>


<h2>
Total: Bs <?php echo $total; ?>
</h2>


<!-- ============================== -->
<!-- QR DEL RECIBO -->
<!-- ============================== -->

<div class="qr-recibo">

    <h3>
        Escanea para ver los datos del recibo
    </h3>

    <img 
        src="<?php echo $qr; ?>" 
        alt="Código QR del recibo"
    >

    <p>
        Escanea este código para consultar todos los datos de tu pedido.
    </p>

</div>


<h3>
Esperando aprobación del vendedor
</h3>


<button onclick="window.print()">
    
    🖨 Imprimir

</button>


<button id="volverProductos">
    
    <a href="index1.php">
        Volver a menu
    </a>

</button>


<script>

document
.getElementById("volverProductos")
.addEventListener("click",()=>{

    fetch("php/nueva_compra.php")

    .then(res=>res.json())

    .then(data=>{

        if(data.ok){

            window.location.href="index.php";

        }

    });

});

</script>


</body>

</html>