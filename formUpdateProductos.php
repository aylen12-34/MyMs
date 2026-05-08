<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="updateEditarProductos.php" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>  <br>  <br>
        <label for="Direccion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion" required>  <br>  <br>
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio" required>  <br>  <br>
        <label for="Stock">Stock:</label>
        <input type="text" id="Stock" name="Stock" required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>