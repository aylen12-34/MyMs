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

// 1. Obtener la suma total de los productos del carrito para este pedido
$sqlcar = "SELECT SUM(CostoTotal) AS Total FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
$resultadocar = $conexion->query($sqlcar);
$rowcar = $resultadocar->fetch_assoc();
$CostoTotal = $rowcar['Total'] ?? 0;

/* 
  MODIFICACIÓN AQUÍ:
  Ya no se modifica el 'Metodo' en el UPDATE porque ya se guardó correctamente 
  al crear el pedido en 'nueva_compra.php'. Se conserva el valor que ya existe en la BD.
*/
$sql = "UPDATE Ventas SET Costototal='$CostoTotal', Estado='Activo' WHERE Pedidos_ID='$Pedidos_ID'";

if ($conexion->query($sql)) {
    $sql = "SELECT * FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
    $resultado = $conexion->query($sql);
    
    while($fila = $resultado->fetch_assoc()) {
        $Codigo1 = $fila['Productos_Codigo'];
        $Cantidad = $fila['Cantidad'];
        
        $sqlcarrito = "SELECT Stock FROM productos WHERE Codigo='$Codigo1'";
        $resultadocarrito = $conexion->query($sqlcarrito);
        $producto = $resultadocarrito->fetch_assoc();
        
        $Stock = $producto['Stock'];
        $sqlc = "UPDATE productos SET Stock = Stock - $Cantidad WHERE Codigo='$Codigo1'";
        $conexion->query($sqlc);
    }
}

$sqlp = "UPDATE pedidos SET NombreVendedor='$NombreVendedor', Estado='Aceptado' WHERE ID='$Pedidos_ID'";

if ($conexion->query($sqlp) === TRUE) {
    header("location:leerVentass.php");
} else {
    echo "Hubo un error: " . $conexion->error;
}
?>