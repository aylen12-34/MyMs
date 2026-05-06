<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="updateditarUsuario.php" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>
        <br>
        <label for="Direccion">Dirección:</label>
        <input type="text" id="Direccion" name="Direccion" required>
        <br>
        <label for="Celular">Celular:</label>
        <input type="text" id="Celular" name="Celular" required>
        <br>
        <label for="Rol">Rol:</label>
        <input type="text" id="Rol" name="Rol" required>
        <br>
        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" required>
        <br>
        <input type="submit" value="Editar">
    </form>
</body>
</html>