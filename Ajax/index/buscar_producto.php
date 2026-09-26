<?php

include "conexion.php";


$nombre = trim($_GET["nombre"]);


$stmt = $conn->prepare(
    "SELECT *
     FROM productos
     WHERE Nombre=?"
);


$stmt->bind_param(
    "s",
    $nombre
);


$stmt->execute();


$resultado = $stmt->get_result();


$productos = [];


while($fila = $resultado->fetch_assoc()){

    $productos[] = $fila;

}


echo json_encode($productos);


?>