<?php
session_start();
require "bdVentas.php";

$Pedidos_ID = $_GET['ID'];
$Costototal = $_SESSION['CostoTotal'] ?? 'No especificado';
if($_SESSION['CI']==null){
    header("location:login.php");
} else {
  if($_SESSION['Rol']=="vendedor"){
    $Nombre = $_SESSION['Nombre'];
  } else{
    header("location:login.php");
  }
}
$Metodo = $_SESSION['Metodo'] ?? 'No especificado';
$_SESSION['NombreVendedor']=$Nombre;
$NombreVendedor=$_SESSION['NombreVendedor'];
$Estado ='Activo';
$_SESSION['Estado']='Activo';
$sql = "INSERT INTO Ventas (Pedidos_ID, Costototal, Estado, Metodo) VALUES ('$Pedidos_ID', '$Costototal', 'Activo', '$Metodo')";
$sqlp = "UPDATE pedidos SET NombreVendedor='$NombreVendedor', Estado='$Estado' WHERE ID='$Pedidos_ID'";


if ($conexion->query($sql) === TRUE) {
    if ($conexion->query($sqlp) === TRUE) {
    header("location:leerVentass.php");
} }else {
    echo "Hubo un error: " . $conexion->error;
}
?>