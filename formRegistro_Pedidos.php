<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>

<body>
    <div>
        <h1>Registro de Pedidos</h1>

        <form action="registro_Pedidos.php" method="post">

            <label for="ID">ID:</label>
            <input type="number" id="ID" name="ID" required> 
            <br><br>

            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre">
            <br><br>

            <label for="Fecha">Fecha:</label>
            <input type="text" id="Fecha" name="Fecha">
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