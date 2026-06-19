<?php
$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Actualización Carrito</title>

<link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

<style>
*{
    font-family: 'Chillax-Semibold';
}

body {
    background-image: url(../imagenes/2.png);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 30px 0;
}

.card {
    width: 420px;
    padding: 35px;
    background-color: #6A253A;
    border: 2px solid #EFE2DA;
    border-radius: 40px;
    color: #EFE2DA;
    text-align: center;
}

h2 {
    text-align: center;
}

p {
    font-size: 16px;
    line-height: 1.5;
}

.btn {
    padding: 10px 20px;
    border: none;
    color: #EFE2DA;
    border-radius: 5px;
    background: #E64B6B;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
    text-decoration: none;
    display: inline-block;
    transition: 0.3s;
}

.btn:hover {
    background-color: #EFE2DA;
    color: #6A253A;
}

@media(max-width:800px){
    .card{
        width: 100%;
        max-width: 320px;
        padding: 25px;
        border-radius: 25px;
    }

    .btn{
        width: 100%;
        box-sizing: border-box;
    }
}
</style>

</head>

<body>

<div class="card">
    <h2>Actualización Carrito</h2>

    <p>
    <?php
    $conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

    if ($conexion->connect_error) {
        die("Error de conexión");
    }
    $ID_Producto = $_POST['Codigo'];
    $precio= $_POST['Precio'];
    $Cantidad = $_POST['Cantidad'];
    $CostoTotal = $precio*$Cantidad;
    $Pedidos_ID = $_POST['Pedidos_ID'];

    $sql = "UPDATE Carrito SET Cantidad='$Cantidad', CostoTotal='$CostoTotal' WHERE Productos_Codigo='$ID_Producto'";


    if ($conexion->query($sql) === TRUE) {
        header("location:leercarritos.php?Pedidos_ID=".$Pedidos_ID);
    } else {
        echo "Error al actualizar: " . $conexion->error;
    }
    ?>
    </p>

    <a class="btn" href="readleerCarrito.php">Tabla Carrito</a>
</div>

</body>
</html>