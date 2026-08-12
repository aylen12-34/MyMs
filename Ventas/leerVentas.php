<?php
session_start();
require "bdVentas.php";

if (!isset($_GET['ID'])) {
    die("No se recibió el ID de la venta.");
}

$ID = $_GET['ID'];

$sql = "SELECT * FROM Ventas WHERE ID='$ID'";
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

        * {
            font-family: 'Chillax-Semibold';
            box-sizing: border-box;
        }

        body {
            background-image: url('../imagenes/2.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
            margin: 0;
        }

        .contenedor {
            width: 95%;
            max-width: 1200px;
            padding: 35px;

            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 30px;

            color: #EFE2DA;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 32px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 15px;
        }

        th {
            background-color: #E64B6B;
            color: #EFE2DA;
            padding: 14px;
            font-size: 15px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid rgba(239, 226, 218, 0.2);
            color: #EFE2DA;
        }

        tr {
            background-color: rgba(255,255,255,0.04);
            transition: 0.3s;
        }

        tr:hover {
            background-color: rgba(230, 75, 107, 0.25);
        }

        .titulo {
            background-color: #E64B6B;
            font-weight: bold;
        }

        .volver {
            padding: 10px 20px;
            border: none;
            color: #EFE2DA;
            border-radius: 5px;
            background: #E64B6B;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .volver:hover {
            background-color: #EFE2DA;
            color: #E64B6B;
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