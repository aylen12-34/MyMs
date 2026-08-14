<?php

session_start();

// Eliminar el pedido activo
unset($_SESSION["pedidos"]);

echo json_encode([
    "ok" => true
]);

?>