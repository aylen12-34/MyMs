<?php
include "conexion.php";
$nombre = trim($_GET["nombre"]);

if($nombre === ""){
    echo json_encode([]);
    exit;
}
$busqueda = "%" . $nombre . "%";
$stmt = $conn->prepare(
    "SELECT * FROM productos WHERE Nombre LIKE ? OR Descripcion LIKE ? OR Detallado LIKE ?
     ORDER BY
        CASE
            WHEN Nombre LIKE ? THEN 1
            WHEN Descripcion LIKE ? THEN 2
            WHEN Detallado LIKE ? THEN 3
            ELSE 4
        END"
);
$stmt->bind_param(
    "ssssss",
    $busqueda,
    $busqueda,
    $busqueda,
    $busqueda,
    $busqueda,
    $busqueda
);
$stmt->execute();
$resultado = $stmt->get_result();
$productos = [];
while($fila = $resultado->fetch_assoc()){
    $productos[] = $fila;
}
echo json_encode($productos);
?>