<?php
session_start();
require "bdVentas.php";

$Pedidos_ID = $_GET['ID'];
if($_SESSION['CI']==null){
    header("location:login.php");
} else {
  if($_SESSION['Rol']=="vendedor"){
    $Nombre = $_SESSION['Nombre'];
  } else{
    header("location:login.php");
  }
}
$_SESSION['NombreVendedor']=$Nombre;
$NombreVendedor=$_SESSION['NombreVendedor'];
$Estado ='Activo';
$_SESSION['Estado']='Activo';
  $Metodo = $_SESSION['Metodo'] ?? 'No especificado';
$sqlcar = "SELECT * FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
$resultadocar = $conexion->query($sqlcar);
if ($resultadocar->num_rows > 0) {
    while($fila = $resultadocar->fetch_assoc()) {
    $Codigo=$fila['Productos_Codigo'];
    $CostoTotal=$fila['CostoTotal'];
  }}
$sql = "INSERT INTO Ventas (Pedidos_ID, Costototal, Estado, Metodo) VALUES ('$Pedidos_ID', '$CostoTotal', 'Activo', '$Metodo')";
if ($conexion->query($sql)) {
  $sql = "SELECT * FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
$resultado = $conexion->query($sql);
  while($fila = $resultado->fetch_assoc()) {
    $Codigo1=$fila['Productos_Codigo'];
    $Cantidad=$fila['Cantidad'];
    $sqlcarrito = "SELECT Stock FROM productos WHERE Codigo='$Codigo1'";
$resultadocarrito = $conexion->query($sqlcarrito);
$producto=$resultadocarrito -> fetch_assoc();
    $Stock=$producto['Stock'];
$sqlc = "UPDATE productos SET Stock=Stock-$Cantidad WHERE Codigo='$Codigo1'";

$conexion ->query($sqlc);
    }}
$sqlp = "UPDATE pedidos SET NombreVendedor='$NombreVendedor', Estado='Aceptado' WHERE ID='$Pedidos_ID'";
if ($conexion->query($sqlp) === TRUE) {
    header("location:leerVentass.php");
}else {
    echo "Hubo un error: " . $conexion->error;
}
?>