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
        <h1>Registro de Carrito</h1>

        <form action="registro_Carrito.php" method="post">

            <label for="Cantidad">Cantidad:</label>
            <input type="number" id="Cantidad" name="Cantidad" required> 
            <br><br>

            <label for="CostoTotal">Costo Total:</label>
            <input type="number" id="CostoTotal" name="CostoTotal" required>
            <br><br>

            <input type="submit" value="Subir al Carrito">

        </form>
    </div>
</body>
</html>