<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$sql = "SELECT * FROM Carrito";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $Cantidad=$fila['Cantidad'];
        $CostoTotal=$fila['CostoTotal'];
    }
}
session_start();
if($_SESSION['CI']==null){
    header("location:login.html");
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
        <h1>Editar Carrito</h1>
    <form action="updateCarrito.php" method="post">
        <label for="">ID del Producto:</label>
                <input type="text" name="ID_Producto" value='<?=$ID_Producto?>' required>
                <label for="">Cantidad:</label>
                <input type="text" name="Cantidad" value='<?=$Cantidad?>' required>
        <br>
        <label for="">Costo Total:</label>
        <input type="text" name="CostoTotal" value='<?=$CostoTotal?>' required>
        <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">Volver</button><br>
</div>
</body>
</html>