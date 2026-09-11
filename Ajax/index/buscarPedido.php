<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión");
}

$id = isset($_GET["ID"]) ? intval($_GET["ID"]) : 0;

if ($id <= 0) {
    echo "<script>
            alert('Ingresa un ID de recibo válido');
            window.history.back();
          </script>";
    exit;
}

$stmt = $conn->prepare("
    SELECT ID
    FROM Pedidos
    WHERE ID = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {

    // EXISTE → ENVIAR AL RECIBO
    header("Location: recibo.php?ID=" . $id);
    exit;

} else {

    // NO EXISTE
    echo "<script>
            alert('No existe ningún pedido con el ID de recibo $id');
            window.history.back();
          </script>";

}

$stmt->close();
$conn->close();

?>