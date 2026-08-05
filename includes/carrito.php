<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$sqlc = "SELECT * FROM Carrito JOIN productos ON 'productos.Codigo'='carrito.Productos_Codigo'";
$resultadoc = $conexion->query($sqlc);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar el Carrito</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body>

<div>

<h2>Productos dentro del carrito</h2>
<table>

        <tr>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th colspan=2>Agregar al Carrito</th>
        </tr>

        <?php

        if ($resultadoc->num_rows > 0) {

            while($fila = $resultadoc->fetch_assoc()) {
                echo "<td>".$fila["Codigo"]."</td>";
                echo "<td>".$fila["Nombre"]."</td>";
                echo "<td>".$fila["Descripcion"]."</td>";
                echo "<td>".$fila["Precio"]."</td>";
                echo "<td>".$fila["Cantidad"]."</td>";
                
            }
                echo "<table border='1'>";
        } else {

            echo "<tr>";
            echo "<td colspan='6'>No se agregaron productos</td>";
            echo "</tr>";

        }
?>
</div>

</body>
</html>