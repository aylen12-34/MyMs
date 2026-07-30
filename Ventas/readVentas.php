<?php
require "bdVentas.php";
$sql = "SELECT * FROM Ventas";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
while($fila = $resultado->fetch_assoc()) {
    echo "<tr>";

    echo "<td>".$fila["Pedidos_ID"]."</td>";
    echo "<td>".$fila["Nombre"]."</td>";
    echo "<td>".$fila["Descripcion"]."</td>";
    echo "<td>".$fila["Precio"]."</td>";
    echo "<td>".$fila["Stock"]."</td>";


echo "<td>
    <a href='formUpdateProductos.php?Codigo=" . $fila["Codigo"] . "'>
        <button class='editar'>Editar</button>
    </a>

    <a href='eliminarProductos.php?Codigo=" . $fila["Codigo"] . "'>
        <button class='eliminar'>Eliminar</button>
    </a>
</td>";

echo "</tr>";
}

} else {

    echo "<tr>";
    echo "<td colspan='6'>No se encontraron productos</td>";
    echo "</tr>";

}

    $conexion->close();

?>

    </table>
<button class="volver"><a href="../vendedor.php">Perfil</a></button>
<button class="volver"><a href="formRegistroProductos.php">Registrar Producto</a></button>
</div>

</body>
</html>
