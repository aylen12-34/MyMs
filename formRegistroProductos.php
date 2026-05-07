<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="registroProductos.php" method="POST">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre"><br><br>
        <label for="Descripcion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion"><br><br>
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio"><br><br>
        <label for="Stock">Stock:</label>
        <input type="text" id="Stock" name="Stock"><br><br>
        <input type="submit" value="Registrar Productos">

    </form>
</body>
</html>