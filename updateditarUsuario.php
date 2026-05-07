<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "Hubo un error al conectar a la base de datos";
}

$CI=$_POST['CI'];
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$Celular=$_POST['Celular'];
$Rol=$_POST['Rol'];
$Estado=$_POST['Estado'];
$sql="UPDATE Usuarios SET Nombre='$Nombre', Direccion='$Direccion', Celular='$Celular', Rol='$Rol', Estado='$Estado' WHERE CI='$CI'";
if ($conexion->query($sql) === TRUE) {
    echo "Se edito el usuario correctamente";
} else {
    echo "Error al actualizar el usuario: " . $conexion->error;
}
?>