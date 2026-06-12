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
<style>
*{
    font-family: 'Chillax-Semibold';
    box-sizing: border-box;
}

body{
    background-image: url(imagenes/2.png);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

div{
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
.mostrar{
    background-color: #E64B6B;
    transition: 0.3s;
}

.mostrar:hover{
    background-color: #EFE2DA;
    color: #6A253A;
}


.editar{
    background-color: #E64B6B;
    transition: 0.3s;
}

.editar:hover{
    background-color: #EFE2DA;
    color: #6A253A;
}


.eliminar{
    background-color: #E64B6B;
    transition: 0.3s;
}

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
        }

        .volver:hover{
            background-color: #EFE2DA;
            color:#E64B6B;
        }
        a{
            text-decoration:none;
            color: #EFE2DA;
        }@media(max-width:800px){

  body{
    padding: 15px;
  }

  div{
    width: 100%;
    padding: 20px;
    border-radius: 20px;
    overflow-x: auto;
  }

  h2{
    font-size: 26px;
  }

  table{
    min-width: 650px;
  }

  th,
  td{
    padding: 10px;
    font-size: 14px;
  }

  button{
    width: 100%;
    margin-top: 5px;
  }

  .volver{
    width: 100%;
    margin-top: 10px;
  }
}

</style>
</head>
<body>

<div>

    <h2>Lista de pedidos en el carrito</h2>

    <table>
        <tr>
            <th>Cantidad</th>
            <th>Costo Total</th>
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
            echo "<td colspan='3'>No hay usuarios registrados</td>";
            echo "</tr>";
        }

        $conexion->close();
        ?>

    </table>
<button class="volver"><a href="vendedor.html">Inicio vendedor</a></button>
<button class="volver"><a href="administrador.html">Inicio Administrador</a></button>
<button class="volver"><a href="inicio.html">Inicio Publico</a></button>
<button class="volver"><a href="formCarrito.php">Registrar nuevo carrito</a></button>
</div>

</body>
</html>