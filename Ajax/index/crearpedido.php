<?php

session_start();

require("conexion.php");

header("Content-Type: application/json");


$datos = json_decode(
    file_get_contents("php://input"),
    true
);


if (!$datos) {

    echo json_encode([
        "ok" => false,
        "mensaje" => "No se recibieron datos"
    ]);

    exit;
}


$nombre = isset($datos["Nombre"])
    ? trim($datos["Nombre"])
    : '';

$metodo = isset($datos["Metodo"])
    ? trim($datos["Metodo"])
    : '';

$telefono = isset($datos["Celular"])
    ? trim($datos["Celular"])
    : '';

$direccion = isset($datos["Direccion"])
    ? trim($datos["Direccion"])
    : '';


$stmt = $conn->prepare(
    "INSERT INTO pedidos
    (Nombre, Fecha, Celular, Direccion, Estado, NombreVendedor)
    VALUES (?, NOW(), ?, ?, 'Abierto', 'Pendiente')"
);


$stmt->bind_param(
    "sss",
    $nombre,
    $telefono,
    $direccion
);


if ($stmt->execute()) {

    $idPedido = $conn->insert_id;

    $_SESSION["pedidos"] = $idPedido;


    $stmtVenta = $conn->prepare(
        "INSERT INTO ventas
        (Pedidos_ID, Costototal, Estado, Metodo)
        VALUES (?, 0.00, 'No confirmado', ?)"
    );


    $stmtVenta->bind_param(
        "ss",
        $idPedido,
        $metodo
    );


    if ($stmtVenta->execute()) {

        echo json_encode([
            "ok" => true,
            "pedidos" => $idPedido,
            "sesion" => $_SESSION["pedidos"]
        ]);

    } else {

        echo json_encode([
            "ok" => false,
            "mensaje" => "Pedido creado, pero falló al registrar en ventas",
            "mysql" => $stmtVenta->error
        ]);

    }

    $stmtVenta->close();


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