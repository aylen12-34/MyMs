<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}
$ID=$_GET['ID'];
$sql = "SELECT * FROM Pedidos WHERE ID='$ID'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();

    echo "<table>";

    echo "<tr>";
    echo "<td class='titulo'>Nombre</td>";
    echo "<td>".$fila["Nombre"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Fecha</td>";
    echo "<td>".$fila["Fecha"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Estado</td>";
    echo "<td>".$fila["Estado"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>NombreVendedor</td>";
    echo "<td>".$fila["NombreVendedor"]."</td>";
    echo "</tr>";

    echo "</table>";

} else {

    echo "No se encontraron usuarios.";

}

$conexion->close();

?>
<button class="volver" onclick="history.back()">← Volver</button><br>
</div>

</body>
</html>