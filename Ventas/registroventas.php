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

$sqlcar = "SELECT * FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
$resultadocar = $conexion->query($sqlcar);
if ($resultadocar->num_rows > 0) {
    while($fila = $resultadocar->fetch_assoc()) {
    $Codigo=$fila['Productos_Codigo'];
    $Cantidad=$fila['Cantidad'];
    $CostoTotal=$fila['CostoTotal'];
    
    }
    $sqlcarrito = "SELECT * FROM Productos WHERE Codigo='$Codigo'";
$resultadocarrito = $conexion->query($sqlcarrito);
if ($resultadocarrito->num_rows > 0) {
    while($fila = $resultadocarrito->fetch_assoc()) {
    $Codigo=$fila['Codigo'];
    $Stock=$fila['Stock'];
    $Precio=$fila['Precio'];
    }
}
}

$Metodo = $_SESSION['Metodo'] ?? 'No especificado';
$_SESSION['NombreVendedor']=$Nombre;
$NombreVendedor=$_SESSION['NombreVendedor'];
$Estado ='Activo';
$_SESSION['Estado']='Activo';
$sql = "INSERT INTO Ventas (Pedidos_ID, Costototal, Estado, Metodo) VALUES ('$Pedidos_ID', '$CostoTotal', 'Activo', '$Metodo')";
$sqlp = "UPDATE pedidos SET NombreVendedor='$NombreVendedor', Estado='$Estado' WHERE ID='$Pedidos_ID'";
$sqlc = "UPDATE productos SET Stock=Stock-$Cantidad WHERE Codigo='$Codigo'";

if ($conexion->query($sql) === TRUE) {
    if ($conexion->query($sqlp) === TRUE) {
      if ($conexion->query($sqlc) === TRUE) {
    header("location:leerVentass.php");
}} }else {
    echo "Hubo un error: " . $conexion->error;
}
?>