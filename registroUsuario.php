<?php
require "bdUsuario.php";
$CI=$_POST['CI'];
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$Celular=$_POST['Celular'];
$Rol=$_POST['Rol'];
$Estado=$_POST['Estado'];

$sql="INSERT INTO Usuarios (CI,Nombre, Direccion, Celular, Rol, Estado) VALUES ('$CI','$Nombre', '$Direccion', '$Celular', '$Rol', '$Estado')";
if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
}
?>