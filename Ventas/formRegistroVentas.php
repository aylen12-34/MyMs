<?php
require "bdVentas.php";

$Pedidos_ID=$_GET['Pedidos_ID'];
$sql = "SELECT * FROM carrito where Pedidos_ID='$Pedidos_ID'";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
$CostoTotal = $fila['CostoTotal'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>

<body>
    <div>
        <h1>Registro de Ventas</h1>

        <form action="registroVentas.php" method="post">
            <label for="Pedidos_ID">ID del Pedido:</label>
            <input type="number" id="Pedidos_ID" name="Pedidos_ID" value="<?=$Pedidos_ID?>" readonly>
            <br><br>
            <label for="Costototal">Costo Total:</label>
            <input type="number" id="Costototal" name="Costototal" value="<?=$CostoTotal?>" readonly>
            <br><br>
            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado" value="Pendiente" readonly>
            <br><br>
            <label for="Metodo">Método de Pago:</label>
            <select name="Metodo" id="Metodo" required>
                <option value="">Seleccione un método de pago</option>
                <option value="metodo">Efectivo</option>
                <option value="metodo">QR</option>
            </select>
            <br><br>

            <input type="submit" value="Registrar Ventas">

        </form>
    </div>
    
</body>
</html>