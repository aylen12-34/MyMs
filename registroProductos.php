<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";   
 
$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}

$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Stock=$_POST['Stock'];

$sql="INSERT INTO Productos (Nombre, Descripcion, Precio, Stock) VALUES ('$Nombre', '$Descripcion', '$Precio', '$Stock')";
if ($conexion->query($sql) === TRUE) {
    echo "Productos registrado correctamente";
}
?>