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

if ($resultado->num_rows == 0) {
    die("No se encontró la venta con ID: " . $ID);
}

$fila = $resultado->fetch_assoc();

$ID = $fila['ID'];
$Pedidos_ID = $fila['Pedidos_ID'];
$Costototal = $fila['Costototal'];
$Estado = $fila['Estado'];
$Metodo = $fila['Metodo'];

if (isset($_SESSION['Nombre'])) {
    $NombreVendedor = $_SESSION['Nombre'];
} else {
    $NombreVendedor = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
</head>

<body>

<div>

    <h1>Editar Venta</h1>

    <form action="updateVentas.php" method="post">

        <input type="hidden" name="ID" value="<?= $ID ?>">
        <input type="hidden" name="Pedidos_ID" value="<?= $Pedidos_ID ?>">

        <label for="Costototal">Costo Total:</label>
        <input type="text"  id="Costototal" name="Costototal"  value="<?= $Costototal ?>"  required>

        <br><br>

        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado"  value="<?= $Estado ?>"  required>

        <br><br>

        <label for="Metodo">Método:</label>
        <input   type="text" id="Metodo" name="Metodo" value="<?= $Metodo ?>" required>

        <br><br>

        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor"  value="<?= $NombreVendedor ?>"  readonly>

        <br><br>

        <input type="submit" value="Editar">

    </form>

    <br>

    <button class="volver" onclick="history.back()">
        ← Volver
    </button>

</div>

</body>
</html>