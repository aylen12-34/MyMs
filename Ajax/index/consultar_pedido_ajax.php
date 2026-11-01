<?php
session_start();
require_once __DIR__ . "/conexion.php";

header("Content-Type: application/json; charset=utf-8");

function responder($ok, $mensaje = "", $pedido = null, $codigo = 200) {
    http_response_code($codigo);
    $respuesta = ["ok" => $ok];
    if ($mensaje !== "") {
        $respuesta["mensaje"] = $mensaje;
    }
    if ($pedido !== null) {
        $respuesta["pedido"] = $pedido;
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    responder(false, "Método no permitido", null, 405);
}

$id = isset($_POST["id"]) ? trim((string) $_POST["id"]) : "";
if ($id === "" || !ctype_digit($id) || (int) $id < 1) {
    responder(false, "Ingresa un número de pedido válido");
}

$stmt = $conn->prepare(
    "SELECT ID, Nombre, Fecha, Estado, NombreVendedor
     FROM Pedidos
     WHERE ID = ?
     LIMIT 1"
);

if (!$stmt) {
    responder(false, "No se pudo preparar la consulta", null, 500);
}

$idNumerico = (int) $id;
$stmt->bind_param("i", $idNumerico);

if (!$stmt->execute()) {
    $stmt->close();
    responder(false, "No se pudo realizar la consulta", null, 500);
}

$resultado = $stmt->get_result();
$pedido = $resultado ? $resultado->fetch_assoc() : null;
$stmt->close();
$conn->close();

if (!$pedido) {
    responder(false, "No existe ningún pedido con ese número");
}

responder(true, "", [
    "ID" => (int) $pedido["ID"],
    "Nombre" => $pedido["Nombre"] ?: "No especificado",
    "Fecha" => $pedido["Fecha"] ?: "No especificada",
    "Estado" => $pedido["Estado"] ?: "No especificado",
    "NombreVendedor" => !empty($pedido["NombreVendedor"])
        ? $pedido["NombreVendedor"]
        : "Pendiente"
]);
?>
