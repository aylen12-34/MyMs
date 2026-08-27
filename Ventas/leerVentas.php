<?php
session_start();
require "bdVentas.php";

if (!isset($_GET['ID'])) {
    die("No se recibió el ID de la venta.");
}

$ID = $_GET['ID'];

$sql = "SELECT * FROM Ventas WHERE Pedidos_ID='$ID'";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mostrar Venta</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

<style>
*{
    font-family: 'Chillax-Semibold';
    box-sizing: border-box;
}

body{
    background-image: url(../imagenes/2.png);
    background-size: cover;
    background-position: center;
    background-attachment: fixed;

    display: flex;
    justify-content: center;
    align-items: center;

    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

div{
    width: 95%;
    max-width: 1200px;

    padding: 35px;

    background-color: #6A253A;

    border: 2px solid #EFE2DA;
    border-radius: 30px;

    color: #EFE2DA;

    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}

h2{
    text-align: center;

    margin-top: 0;
    margin-bottom: 25px;

    font-size: 32px;

    color: #EFE2DA;
}

table{
    width: 100%;

    border-collapse: collapse;

    overflow: hidden;

    border-radius: 15px;

    border: 1px solid rgba(239,226,218,0.3);
}

td{
    padding: 14px;

    text-align: center;

    color: #EFE2DA;

    border-bottom: 1px solid rgba(239,226,218,0.2);

    background-color: rgba(255,255,255,0.04);
}

/* NOMBRE DEL DATO */
td.titulo{
    width: 30%;

    background-color: rgba(239,226,218,0.12);

    color: #EFE2DA;

    font-weight: bold;
}

/* QUITAMOS EL ROSADO DEL HOVER */
tr{
    transition: 0.3s;
}

tr:hover td{
    background-color: rgba(239,226,218,0.10);
}

/* BOTÓN VOLVER */
.volver{
    display: block;

    width: 100%;

    padding: 12px 20px;

    margin-top: 20px;

    border: none;

    border-radius: 10px;

    background-color: #E64B6B;

    color: #EFE2DA;

    font-family: 'Chillax-Semibold';

    font-size: 16px;

    cursor: pointer;

    transition: 0.3s;
}

.volver:hover{
    background-color: #EFE2DA;

    color: #6A253A;

    transform: translateY(-2px);
}

/* RESPONSIVE */
@media(max-width:600px){

    body{
        padding: 15px;
    }

    div{
        width: 100%;

        padding: 25px 20px;

        border-radius: 20px;
    }

    h2{
        font-size: 27px;
    }

    td{
        padding: 11px 8px;

        font-size: 14px;
    }

    td.titulo{
        width: 35%;
    }

}
</style>
</head>

<body>

<div class="contenedor">

    <h2>Datos de la Venta</h2>

    <?php

    if ($resultado->num_rows > 0) {

        $fila = $resultado->fetch_assoc();

        echo "<table>";

        echo "<tr>";
        echo "<td class='titulo'>ID de Venta</td>";
        echo "<td>" . $fila["ID"] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='titulo'>ID del Pedido</td>";
        echo "<td>" . $fila["Pedidos_ID"] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='titulo'>Costo Total</td>";
        echo "<td>" . $fila["Costototal"] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='titulo'>Estado</td>";
        echo "<td>" . $fila["Estado"] . "</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td class='titulo'>Método de Pago</td>";
        echo "<td>" . $fila["Metodo"] . "</td>";
        echo "</tr>";

        if (isset($_SESSION['Nombre'])) {

            echo "<tr>";
            echo "<td class='titulo'>Nombre del Vendedor</td>";
            echo "<td>" . $_SESSION['Nombre'] . "</td>";
            echo "</tr>";

        }

        echo "</table>";

    } else {

        echo "<p>No se encontró la venta.</p>";

    }

    $conexion->close();

    ?>

    <button class="volver" onclick="history.back()">
        ← Volver
    </button>

</div>

</body>
</html>