<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$sql = "SELECT * FROM Carrito";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar el Carrito</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body>

<div>

<h2>Datos del Carrito</h2>

<?php

if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();

    echo "<table>";

    echo "<tr>";
    echo "<td class='titulo'>Cantidad</td>";
    echo "<td>".$fila["Cantidad"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Costo Total</td>";
    echo "<td>".$fila["CostoTotal"]."</td>";
    echo "</tr>";

    echo "</table>";

} else {

    echo "No se encontraron productos en el carrito.";

}

$conexion->close();

?>
<button class="volver" onclick="history.back()">← Volver</button><br>
</div>

</body>
</html>