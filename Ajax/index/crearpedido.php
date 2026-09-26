<?php
session_start();
require("conexion.php");
header("Content-Type: application/json");

$datos = json_decode(file_get_contents("php://input"), true);

if (!$datos) {
    echo json_encode(["ok" => false, "mensaje" => "No se recibieron datos"]);
    exit;
}

$nombre    = $datos["Nombre"] ?? '';
$metodo    = $datos["Metodo"] ?? ''; 
$telefono  = $datos["Celular"] ?? '';
$direccion = $datos["Direccion"] ?? '';

// 1. Insertar el Pedido usando parámetros preparados
$stmt = $conn->prepare("INSERT INTO pedidos (Nombre, Fecha, Celular, Direccion, Estado, NombreVendedor) VALUES (?, NOW(), ?, ?, 'Abierto', 'Pendiente')");
$stmt->bind_param("sss", $nombre, $telefono, $direccion);

if ($stmt->execute()) {
    $idPedido = $conn->insert_id;
    $_SESSION["pedidos"] = $idPedido;

    // 2. Insertar en la tabla VENTAS antes de finalizar la respuesta
    $sqlVenta = "INSERT INTO ventas (Pedidos_ID, Costototal, Estado, Metodo) VALUES ('$idPedido', 0.00, 'No confirmado', '$metodo')";
    
    if ($conn->query($sqlVenta)) {
        echo json_encode([
            "ok" => true,
            "pedidos" => $idPedido,
            "sesion" => $_SESSION["pedidos"]
        ]);
    } else {
        echo json_encode([
            "ok" => false,
            "mensaje" => "Pedido creado, pero falló al registrar en ventas",
            "mysql" => $conn->error
        ]);
    }

} else {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Error al crear el pedido",
        "mysql" => $stmt->error
    ]);
}

$stmt->close();
$conn->close();
?>