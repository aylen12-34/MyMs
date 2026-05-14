<?php
$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$sql = "SELECT * FROM Usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        .contenedor{
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td{
            border: 1px solid #ccc;
            padding: 12px;
            text-align: center;
        }

        th{
            background: #333;
            color: white;
        }

        tr:nth-child(even){
            background: #f2f2f2;
        }

        button{
            padding: 6px 12px;
            margin: 2px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .mostrar{
            background: #3498db;
            color: white;
        }

        .editar{
            background: #f39c12;
            color: white;
        }

        .eliminar{
            background: #e74c3c;
            color: white;
        }
    </style>
</head>
<body>

<div class="contenedor">

    <h2>Lista de Usuarios</h2>

    <table>
        <tr>
            <th>CI</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Celular</th>
            <th>Rol</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php
        if ($resultado->num_rows > 0) {

            while($fila = $resultado->fetch_assoc()) {

                $CI = $fila['CI'];

                echo "<tr>";

                echo "<td>".$fila['CI']."</td>";
                echo "<td>".$fila['Nombre']."</td>";
                echo "<td>".$fila['Direccion']."</td>";
                echo "<td>".$fila['Celular']."</td>";
                echo "<td>".$fila['Rol']."</td>";
                echo "<td>".$fila['Estado']."</td>";

                echo "<td>
                        <a href='readleerUsuario.php?CI=$CI'>
                            <button class='mostrar'>Mostrar</button>
                        </a>

                        <a href='formUpdateUsuario.php?CI=$CI'>
                            <button class='editar'>Editar</button>
                        </a>

                        <a href='eliminarUsuario.php?CI=$CI'>
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

</div>

</body>
</html>