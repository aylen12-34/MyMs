<?php
require "bdVentas.php";
session_start();
if (!isset($_SESSION['CI'])) {
    header("location: ../login.php");
    exit();
}

$CI = trim($_SESSION['CI']);
if($_SESSION['CI']==null){
    header("location:login.php");
}else {
    $stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE CI=?");
    $stmt->bind_param("s", $CI);
    $stmt->execute();
    $resultadou = $stmt->get_result();
    if ($resultadou->num_rows > 0) {
        while($fila=$resultadou->fetch_assoc()) {
            $Rol = $fila['Rol'];
        }
    }
}
$CostoTotal = $_SESSION['CostoTotal'] ?? 'No especificado';
$sql = "SELECT * FROM ventas JOIN pedidos ON ventas.Pedidos_ID=pedidos.ID WHERE ventas.Estado='Aceptada'";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Ventas</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <style>
        * {
            font-family: 'Chillax-Semibold';
            box-sizing: border-box;
        }

        body {
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

        .contenedor {
            width: 95%;
            max-width: 1200px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 30px;
            color: #EFE2DA;
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 32px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 15px;
        }

        th {
            background-color: #E64B6B;
            color: #EFE2DA;
            padding: 14px;
            font-size: 15px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid rgba(239, 226, 218, 0.2);
            color: #EFE2DA;
        }

        tr {
            background-color: rgba(255,255,255,0.04);
            transition: 0.3s;
        }

        tr:hover {
            background-color: rgba(230, 75, 107, 0.25);
        }

        button {
            padding: 8px 14px;
            margin: 3px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            color: #EFE2DA;
        }

        .mostrar, .editar, .eliminar {
            background-color: #E64B6B;
        }

        .mostrar:hover, .editar:hover, .eliminar:hover {
            background-color: #EFE2DA;
            color: #6A253A;
        }

        .volver {
            padding: 10px 20px;
            border: none;
            color: #EFE2DA;
            border-radius: 5px;
            background: #E64B6B;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .volver:hover {
            background-color: #EFE2DA;
            color:#E64B6B;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .botones {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        @media(max-width: 800px) {
            .contenedor {
                width: 100%;
                padding: 20px;
                border-radius: 20px;
                overflow-x: auto;
            }

            h2 {
                font-size: 26px;
            }

            table {
                min-width: 750px;
            }

            th, td {
                padding: 10px;
                font-size: 14px;
            }

            .botones {
                flex-direction: column;
            }

            .volver {
                width: 100%;
            }
        }
    .btn-volver-esquina {
        position: fixed;
        top: 25px;
        left: 25px;
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #E64B6B;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.30);
        transition: all 0.2s ease;
        z-index: 9999;
        text-decoration: none;
    }

    /* Flecha */
    .btn-volver-esquina::before {
        content: "";
        width: 12px;
        height: 12px;
        border-left: 3px solid #EFE2DA;
        border-bottom: 3px solid #EFE2DA;
        transform: rotate(45deg);
        margin-left: 6px;
    }

    .btn-volver-esquina:hover {
        background: #6A253A;
        transform: scale(1.1);
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
    }

    .btn-volver-esquina:active {
        transform: scale(0.95);
    }
    </style>
</head>
<body>
 <a href="../Pedidos/leerPedidos.php" class="btn-volver-esquina" aria-label="Volver" title="Volver"> </a>
 <?php
        if ($_SESSION['Rol'] === "administrador") { 
        echo "<a href='../administrador.php' class='btn-volver-esquina' aria-label='Volver' title='Volver'> </a>";
}?>
 
<div class="contenedor">
    <h2>Lista de Ventas</h2>
    <table>
        <tr>
            <th>ID Venta</th>
            <th>Id del Pedido</th>
            <th>Costo Total</th>
            <th>Estado</th>
            <th>Método</th>
            <th>Vendedor</th>
            <th>Acciones</th>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                $ID = $fila["ID"];
                $Pedidos_ID = $fila["Pedidos_ID"];
                echo "<tr>";
                echo "<td>" . $fila['ID'] . "</td>";
                echo "<td>" . $fila['Pedidos_ID'] . "</td>";
                echo "<td>" . $fila['Costototal'] . "</td>";
                echo "<td>" . $fila['Estado'] . "</td>";
                echo "<td>" . $fila['Metodo'] . "</td>";
                echo "<td>" . $fila['NombreVendedor'] . "</td>";
                echo "<td>";
                echo "<a href='leerVentas.php?ID=$Pedidos_ID'><button class='mostrar'>Mostrar</button></a>";
                if ($_SESSION['Rol'] === "administrador") {
                    echo "<a href='formupdateVentas.php?ID=$ID'><button class='editar'>Editar</button></a> ";
                    echo "<a href='eliminarVentas.php?ID=$ID'><button class='eliminar'>Eliminar</button></a>";
                }
                echo "</td>";
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
        <a href="../perfil.php" class="volver" >Perfil</a>
        <a href="../portada publica.php"><button class="volver">Inicio Público</button></a>
        <?php
        if ($_SESSION['Rol'] === "vendedor") { 
        echo "<a href='../Pedidos/leerPedidos.php?ID=".$ID."'><button class='volver'>Registrar nueva venta</button></a>";
}?>
    </div>
</div>

</body>
</html>
