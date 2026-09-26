<?php

session_start();

unset($_SESSION["pedidos"]);

echo json_encode([
    "ok" => true
]);

?>