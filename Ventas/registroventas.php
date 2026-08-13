<?php
require "bdVentas.php";

$Pedidos_ID = $_POST['Pedidos_ID'];
$Costototal = $_POST['Costototal'];
$Estado = $_POST['Estado'];
$Metodo = $_POST['Metodo'];

$sql = "INSERT INTO Ventas (Pedidos_ID, Costototal, Estado, Metodo) VALUES ('$Pedidos_ID', '$Costototal', '$Estado', '$Metodo')";

if ($conexion->query($sql) === TRUE) {
    header("location:../Ajax/index/recibo.php?Pedidos_ID=".$Pedidos_ID);
} else {
    echo "Hubo un error: " . $conexion->error;
}
?>