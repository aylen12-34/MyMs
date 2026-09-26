<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $estrella = isset($_POST["Cali"]) ? intval($_POST["Cali"]) : 0;
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $come = isset($_POST["come"]) ? trim($_POST["come"]) : "";
    if ($estrella < 1 || $estrella > 5 || $nombre == "" || $come == "") {
        die("Por favor, completa todos los campos.");
    }
    $nombre = str_replace(["\r", "\n"], " ", $nombre);
    $come = str_replace(["\r", "\n"], " ", $come);
    $contenido = $estrella . "⭐\n";
    $contenido .= $nombre . "\n";
    $contenido .= $come . "\n";
    $contenido .= "****\n";
    file_put_contents(
        "comentario.txt",
        $contenido,
        FILE_APPEND | LOCK_EX
    );

    header("Location: reseña.php");
    exit;
    
} else {
    header("Location: reseña.php");
    exit;
}

?>