<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
</head>

<body>
    <div>
        <h1>Registro de Pedidos</h1>

        <form action="registroPedidos.php" method="post">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre">
            <br><br>

            <label for="Fecha">Fecha:</label>
            <input type="date" id="Fecha" name="Fecha">
            <br><br>

            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado">
            <br><br>

            <label for="NombreVendedor">NombreVendedor:</label>
            <input type="text" id="NombreVendedor" name="NombreVendedor">
            <br><br>

            <input type="submit" value="Registrar Pedidos">

        </form>
    </div>
</body>
</html>