<?php
require "bdUsuario.php";
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$Celular=$_POST['Celular'];
$Rol=$_POST['Rol'];
$Estado=$_POST['Estado'];

$sql="INSERT INTO Usuarios (Nombre, Direccion, Celular, Rol, Estado) VALUES ('$Nombre', '$Direccion', '$Celular', '$Rol', '$Estado')";
if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
}
?>