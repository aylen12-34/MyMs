<?php
session_start();
require("conexion.php");
header("Content-Type: application/json");

$datos = json_decode(file_get_contents("php://input"), true);

if(!$datos){
    echo json_encode(["ok"=>false, "mensaje"=>"No se recibieron datos"]);
    exit;
}

$nombre = $datos["Nombre"];
$metodo = $datos["Metodo"]; // Lo guardaremos en sesión para la tabla 'venta'
$telefono=$datos["Celular"];
$direccion=$datos["Direccion"];
// Insertar en la tabla 'pedidos' de Bougies
$stmt = $conn->prepare("INSERT INTO pedidos (Nombre, Fecha, Celular, Direccion, Estado, NombreVendedor) VALUES (?, NOW(),'$telefono', '$direccion', 'Abierto', 'Pendiente')");

$stmt->bind_param("s", $nombre);

if($stmt->execute()){
    $idPedido = $conn->insert_id;
    $_SESSION["pedidos"] = $idPedido;
    $_SESSION["Metodo"] = $metodo;

    echo json_encode([
        "ok" => true,
        "pedidos" => $idPedido,
        "sesion" => $_SESSION["pedidos"]
    ]);
}else{
    echo json_encode([
        "ok" => false,
        "mensaje" => $stmt->error,
        "mysql" => $conn->error
    ]);
}
$stmt->close();
$conn->close();
?>