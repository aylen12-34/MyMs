<?php
// Compatibilidad con enlaces antiguos: la búsqueda ahora se realiza en el
// formulario unificado y el resultado se muestra en el modal.
$id = isset($_GET["ID"]) ? trim((string) $_GET["ID"]) : "";
$destino = "consultar_pedido.php";
if ($id !== "") {
    $destino .= "?ID=" . rawurlencode($id);
}
header("Location: " . $destino);
exit;
?>
