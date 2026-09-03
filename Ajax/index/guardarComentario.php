<?php

// Verificamos que el formulario haya sido enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibimos los datos del formulario
    $estrella = isset($_POST["Cali"]) ? intval($_POST["Cali"]) : 0;
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : "";
    $come = isset($_POST["come"]) ? trim($_POST["come"]) : "";

    // Verificamos que los datos estén completos
    if ($estrella < 1 || $estrella > 5 || $nombre == "" || $come == "") {
        die("Por favor, completa todos los campos.");
    }

    // Limpiamos los datos
    $nombre = str_replace(["\r", "\n"], " ", $nombre);
    $come = str_replace(["\r", "\n"], " ", $come);

    // Creamos el texto que se guardará
    $contenido = $estrella . "⭐\n";
    $contenido .= $nombre . "\n";
    $contenido .= $come . "\n";
    $contenido .= "****\n";

    // Guardamos el comentario al final del archivo
    file_put_contents(
        "comentario.txt",
        $contenido,
        FILE_APPEND | LOCK_EX
    );

    // Redirigimos a la página donde se muestran los comentarios
    header("Location: reseña.php");
    exit;
    
} else {
    // Si alguien entra directamente al archivo
    header("Location: reseña.php");
    exit;
}

?>