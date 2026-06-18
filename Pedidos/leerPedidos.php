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
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

    <style>

*{
    font-family: 'Chillax-Semibold';
    box-sizing: border-box;
}

body{
    background-image: url(../imagenes/2.png);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

    display: flex;
    justify-content: center;
    align-items: center;

    min-height: 100vh;
    margin: 0;
    padding: 20px;
}

.contenedor{
    width: 95%;
    max-width: 1200px;
    padding: 35px;
    background-color: #6A253A;
    border: 2px solid #EFE2DA;
    border-radius: 30px;
    color: #EFE2DA;
}

h2{
    text-align: center;
    margin-bottom: 25px;
    font-size: 32px;
}

table{
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 15px;
}

th{
    background-color: #E64B6B;
    color: #EFE2DA;
    padding: 14px;
    font-size: 15px;
}

td{
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid rgba(239, 226, 218, 0.2);
    color: #EFE2DA;
}

tr{
    background-color: rgba(255,255,255,0.04);
    transition: 0.3s;
}

tr:hover{
    background-color: rgba(230, 75, 107, 0.25);
}

button{
    padding: 8px 14px;
    margin: 3px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    color: #EFE2DA;
}

.mostrar,
.editar,
.eliminar{
    background-color: #E64B6B;
}

.mostrar:hover,
.editar:hover,
.eliminar:hover{
    background-color: #EFE2DA;
    color: #6A253A;
}

.volver{
    padding: 10px 20px;
    border: none;
    color: #EFE2DA;
    border-radius: 5px;
    background: #E64B6B;
    cursor: pointer;
    font-size: 16px;
    margin-top: 10px;
}

.volver:hover{
    background-color: #EFE2DA;
    color:#E64B6B;
}

a{
    text-decoration:none;
    color: inherit;
}

.botones{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-top: 20px;
}

@media(max-width:800px){

    .contenedor{
        width: 100%;
        padding: 20px;
        border-radius: 20px;
        overflow-x: auto;
    }

    h2{
        font-size: 26px;
    }

    table{
        min-width: 750px;
    }

    th,
    td{
        padding: 10px;
        font-size: 14px;
    }

    .botones{
        flex-direction: column;
    }

    .volver{
        width: 100%;
    }
}

    </style>
</head>

<body>

<div class="contenedor">

    <h2>Lista de Pedidos</h2>

    <table>

        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Vendedor</th>
            <th>Acciones</th>
        </tr>

        <?php

        if ($resultado->num_rows > 0) {

            while($fila = $resultado->fetch_assoc()) {

                $ID = $fila["ID"];

                echo "<tr>";

                echo "<td>".$fila['ID']."</td>";
                echo "<td>".$fila['Nombre']."</td>";
                echo "<td>".$fila['Fecha']."</td>";
                echo "<td>".$fila['Estado']."</td>";
                echo "<td>".$fila['NombreVendedor']."</td>";

                echo "<td>

                        <a href='leerPedido.php?ID=$ID'>
                            <button class='mostrar'>Mostrar</button>
                        </a>

                        <a href='formupdatePedidos.php?ID=$ID'>
                            <button class='editar'>Editar</button>
                        </a>

                        <a href='EliminarPedidos.php?ID=$ID'>
                            <button class='eliminar'>Eliminar</button>
                        </a>

                      </td>";

                echo "</tr>";
            }

        } else {

            echo "<tr>";
            echo "<td colspan='6'>No hay pedidos registrados</td>";
            echo "</tr>";

        }

        $conexion->close();

        ?>

    </table>

    <div class="botones">
        <button class="volver">
            <a href="../vendedor.php">Perfil</a>
        </button>
        <button class="volver">
            <a href="../inicio.html">Inicio Público</a>
        </button>
        <button class="volver">
            <a href="formRegistroPedidos.php">Registrar nuevo pedido</a>
        </button>
    </div>

</div>

</body>
</html>