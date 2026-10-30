<?php
session_start();
require_once("conexion.php");

header("Content-Type: application/json; charset=utf-8");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode([
        "ok" => false,
        "mensaje" => "Método no permitido"
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$id = isset($_POST["id"]) ? trim($_POST["id"]) : "";

if ($id === "" || !ctype_digit($id) || (int)$id < 1) {
    echo json_encode([
        "ok" => false,
        "mensaje" => "Ingresa un número de pedido válido"
    ], JSON_UNESCAPED_UNICODE);
    exit;
}

$stmt = $conn->prepare(
    "SELECT ID, Nombre, Fecha, Estado, NombreVendedor
     FROM pedidos
     WHERE ID = ?
     LIMIT 1"
);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "ok" => false,
        "mensaje" => "No se pudo realizar la consulta"
    ], JSON_UNESCAPED_UNICODE);
    $conn->close();
    exit;
}

$stmt->bind_param("s", $id);

if (!$stmt->execute()) {
    http_response_code(500);
    echo json_encode([
        "ok" => false,
        "mensaje" => "No se pudo realizar la consulta"
    ], JSON_UNESCAPED_UNICODE);
    $stmt->close();
    $conn->close();
    exit;
}

$resultado = $stmt->get_result();

if ($resultado && $resultado->num_rows > 0) {
    $pedido = $resultado->fetch_assoc();

    echo json_encode([
        "ok" => true,
        "pedido" => [
            "ID" => $pedido["ID"],
            "Nombre" => $pedido["Nombre"],
            "Fecha" => $pedido["Fecha"],
            "Estado" => $pedido["Estado"],
            "NombreVendedor" => !empty($pedido["NombreVendedor"])
                ? $pedido["NombreVendedor"]
                : "Pendiente"
        ]
    ], JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode([
        "ok" => false,
        "mensaje" => "No existe ningún pedido con ese número"
    ], JSON_UNESCAPED_UNICODE);
}

$stmt->close();
$conn->close();
?>
