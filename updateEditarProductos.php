<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "Hubo un error al conectar a la base de datos";
}

$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Stock=$_POST['Stock'];
$sql="UPDATE Productos SET Nombre='$Nombre', Descripcion='$Descripcion', Precio='$Precio', Stock='$Stock' WHERE Nombre='$Nombre'";
if ($conexion->query($sql) === TRUE) {
    echo "Se edito el producto correctamente";
} else {
    echo "Error al actualizar el producto: " . $conexion->error;
}
?>
