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

$ID = $_GET['ID'];
$sql = "DELETE FROM Ventas WHERE ID=$ID";
if ($conexion->query($sql) === TRUE) {
    echo "";
}
 else {
    echo "Error: " . $conexion->error;
}

echo "El producto ha sido eliminado.";
$conexion->close(); 
?>
