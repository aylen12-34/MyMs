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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Carritos</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body>

<div>

    <h2>Lista de pedidos en el carrito</h2>

    <table>
        <tr>
            <th>Cantidad</th>
            <th>Costo Total</th>
        </tr>

        <?php
        if ($resultado->num_rows > 0) {

            while($fila = $resultado->fetch_assoc()) {

                echo "<tr>";
                echo "<td>".$fila['Cantidad']."</td>";
                echo "<td>".$fila['CostoTotal']."</td>";
                echo "</tr>";
            }

        } else {
            echo "<tr>";
            echo "<td colspan='2'>No hay pedidos en el carrito</td>";
            echo "</tr>";
        }

        $conexion->close();
        ?>

    </table>
            <th>Acciones</th>
        </tr>

        <?php
        if ($resultado->num_rows > 0) {

            while($fila = $resultado->fetch_assoc()) {

                echo "<tr>";

                echo "<td>".$fila['Cantidad']."</td>";
                echo "<td>".$fila['CostoTotal']."</td>";

                echo "<td>
                        <a href='readleerCarrito.php?CI=$CI'>
                            <button class='mostrar'>Mostrar</button>
                        </a>

                        <a href='formUpdateCarrito.php?CI=$CI'>
                            <button class='editar'>Editar</button>
                        </a>

                        <a href='eliminarCarrito.php?CI=$CI'>
                            <button class='eliminar'>Eliminar</button>
                        </a>
                      </td>";

                echo "</tr>";
            }

        } else {
            echo "<tr>";
            echo "<td colspan='7'>No hay usuarios registrados</td>";
            echo "</tr>";
        }

        $conexion->close();
        ?>

    </table>
<button class="volver"><a href="vendedor.html">Inicio vendedor</a></button>
<button class="volver"><a href="administrador.html">Inicio Administrador</a></button>
<button class="volver"><a href="inicio.html">Inicio Publico</a></button>
<button class="volver"><a href="formRegistroUsuario.php">Registrar Usuarios</a></button>
</div>

</body>
</html>