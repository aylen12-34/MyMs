<?php
require "bdVentas.php";
session_start();
if($_SESSION['CI']==null){
    header("location:../login.html");
}else {
  if($_SESSION['Rol']=="administrador"){
    $CI = $_SESSION['CI'];
  } else{
    header("location:../login.html");
  }
}

$Pedidos_ID = $_GET['Pedidos_ID'];
$sql = "DELETE FROM Ventas WHERE Pedidos_ID=$Pedidos_ID";
if ($conexion->query($sql) === TRUE) {
    echo "";
}
 else {
    echo "Error: " . $conexion->error;
}

echo "El producto ha sido eliminado.";
$conexion->close(); 
?>
