<?php
require "bdVentas.php";
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
