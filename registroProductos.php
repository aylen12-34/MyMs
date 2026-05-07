<?php
require "bdProductos.php";
$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Stock=$_POST['Stock'];

$sql="INSERT INTO Productos (Nombre, Descripcion, Precio, Stock) VALUES ('$Nombre', '$Descripcion', '$Precio', '$Stock')";
if ($conexion->query($sql) === TRUE) {
    echo "Productos registrado correctamente";
}
?>