<?php
$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$sql = "SELECT * FROM Pedidos";
$resultado = $conexion->query($sql);



        if ($resultado->num_rows > 0) {

            while($fila = $resultado->fetch_assoc()) {


                echo "<tr>";

                echo "<td>".$fila['Nombre']."</td>";
                echo "<td>".$fila['Fecha']."</td>";
                echo "<td>".$fila['Estado']."</td>";
                echo "<td>".$fila['NombreVendedor']."</td>";

                echo "<td>
                        <a href='leerPedido.php?ID=$ID'>
                            <button class='mostrar'>Mostrar</button>
                        </a>

                        <a href='formUpdatePedido.php?ID=$ID'>
                            <button class='editar'>Editar</button>
                        </a>

                        <a href='eliminarUsuario.php?ID=$ID'>
                            <button class='eliminar'>Eliminar</button>
                        </a>
                      </td>";

                echo "</tr>";
            }

        } else {
            echo "<tr>";
            echo "<td colspan='7'>No hay pedidos registrados</td>";
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