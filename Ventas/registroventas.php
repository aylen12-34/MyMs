<?php
session_start();
require "bdVentas.php";

$Pedidos_ID = trim($_GET['ID']);

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
$NombreVendedor=trim($_SESSION['NombreVendedor']);
$Estado ='Activo';
$_SESSION['Estado']='Activo';

// 1. Obtener la suma total de los productos del carrito para este pedido
$stmt = $conexion->prepare(
    "SELECT SUM(CostoTotal) AS Total 
     FROM carrito 
     WHERE Pedidos_ID=?"
);

$stmt->bind_param("s", $Pedidos_ID);
$stmt->execute();

$resultadocar = $stmt->get_result();

$rowcar = $resultadocar->fetch_assoc();
$CostoTotal = $rowcar['Total'] ?? 0;

/* 
  MODIFICACIÓN AQUÍ:
  Ya no se modifica el 'Metodo' en el UPDATE porque ya se guardó correctamente 
  al crear el pedido en 'nueva_compra.php'. Se conserva el valor que ya existe en la BD.
*/

$stmt = $conexion->prepare(
    "UPDATE Ventas 
     SET Costototal=?, Estado='Activo' 
     WHERE Pedidos_ID=?"
);

$stmt->bind_param("ss", $CostoTotal, $Pedidos_ID);
$stmt->execute();

if ($stmt->affected_rows >= 0) {

    $stmt = $conexion->prepare(
        "SELECT * FROM carrito WHERE Pedidos_ID=?"
    );

    $stmt->bind_param("s", $Pedidos_ID);
    $stmt->execute();

    $resultado = $stmt->get_result();
    
    while($fila = $resultado->fetch_assoc()) {

        $Codigo1 = trim($fila['Productos_Codigo']);
        $Cantidad = trim($fila['Cantidad']);
        
        $stmt = $conexion->prepare(
            "SELECT Stock FROM productos WHERE Codigo=?"
        );

        $stmt->bind_param("s", $Codigo1);
        $stmt->execute();

        $resultadocarrito = $stmt->get_result();

        $producto = $resultadocarrito->fetch_assoc();
        
        $Stock = $producto['Stock'];

        $stmt = $conexion->prepare(
            "UPDATE productos 
             SET Stock = Stock - ? 
             WHERE Codigo=?"
        );

        $stmt->bind_param("ss", $Cantidad, $Codigo1);
        $stmt->execute();
    }
}

$stmt = $conexion->prepare(
    "UPDATE pedidos 
     SET NombreVendedor=?, Estado='Aceptado' 
     WHERE ID=?"
);

$stmt->bind_param("ss", $NombreVendedor, $Pedidos_ID);
$stmt->execute();

if ($stmt->affected_rows >= 0) {
    header("location:leerVentass.php");
} else {
    echo "Hubo un error: " . $stmt->error;
}
?>