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
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body>
    <div>
        <h2>Actualizacion Carrito</h2>
        <p>
            <?php 
            $conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "Hubo un error al conectar a la base de datos";
}
$Cantidad=$_POST['Cantidad'];
$CostoTotal=$_POST['CostoTotal'];
$ID_Producto=$_POST['ID_Producto'];
$sql="UPDATE Carrito SET Cantidad='$Cantidad', CostoTotal='$CostoTotal'";
if ($conexion->query($sql) === TRUE) {
    echo "Se edito el producto correctamente";
    
} else {
    echo "Error al actualizar el producto: " . $conexion->error;
}
      ?>
        </p><br>
      
        <button class="volver"><a href="readleerCarrito.php">Tabla Carrito</a></button>
    </div>
    </div>
</body>
</html>
