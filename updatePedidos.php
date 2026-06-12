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
</head>
<body>
    <div>
        <h2>Actualizacion de Pedidos</h2>
        <p>
            <?php 
            $conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "Hubo un error al conectar a la base de datos";
}
$Nombre=$_POST['Nombre'];
$Fecha=$_POST['Fecha'];
$Estado=$_POST['Estado'];
$NombreVendedor=$_POST['NombreVendedor'];  
$sql="UPDATE Pedidos SET Nombre='$Nombre', Fecha='$Fecha', Estado='$Estado', NombreVendedor='$NombreVendedor'";
if ($conexion->query($sql) === TRUE) {
    echo "Se edito el pedido correctamente";
    
} else {
    echo "Error al actualizar el pedido: " . $conexion->error;
}
      ?>
        </p><br>
        <button class="volver"><a href="leerPedidos.php">Tabla Pedidos</a></button>
    </div>
    </div>
</body>
</html>
