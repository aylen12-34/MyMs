<?php
require "bdVentas.php";
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

        <form action="registroVentas.php" method="post" onsubmit="return validar()">
            <label for="Pedidos_ID">ID del Pedido:</label>
            <input type="number" id="Pedidos_ID" name="Pedidos_ID">
            <br><br>
            <label for="Costototal">Costo Total:</label>
            <input type="number" id="Costototal" name="Costototal">
            <br><br>
            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado">
            <br><br>
            <label for="Metodo">Método de Pago:</label>
            <input type="text" id="Metodo" name="Metodo">
            <br><br>

            <input type="submit" value="Registrar Ventas">

        </form>
    </div>
    
</body>
</html>