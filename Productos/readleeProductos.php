<?php
$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$sql = "SELECT * FROM Productos";
$resultado = $conexion->query($sql);

// Variables para controlar alertas globales en vez de por cada fila
$alertaStockBajo = false;
$alertaSinStock = false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* Aplicamos fuentes solo a la tipografía base, evitando afectar a SweetAlert */
        body, table, button, h2, a {
            font-family: 'Chillax-Semibold', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-image: url(../imagenes/2.png);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .main-card {
            width: 100%;
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

        /* Contenedor responsivo para la tabla */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 15px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 15px;
            min-width: 800px; /* Previene el aplastamiento de columnas */
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

        .btn-action {
            padding: 8px 14px;
            margin: 3px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
            color: #EFE2DA;
            background-color: #E64B6B;
        }

        .btn-action:hover {
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
            transition: 0.3s;
            display: inline-block;
        }

        .volver:hover {
            background-color: #EFE2DA;
            color: #E64B6B;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        @media(max-width: 800px) {
            body {
                padding: 15px;
            }

            .main-card {
                padding: 20px;
                border-radius: 20px;
            }

            h2 {
                font-size: 26px;
            }

            .volver {
                width: 100%;
                margin-top: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="main-card">
    <h2>Lista de Productos</h2>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado && $resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$fila["Codigo"]."</td>";
                        echo "<td>".$fila["Nombre"]."</td>";
                        echo "<td>".$fila["Descripcion"]."</td>";
                        echo "<td><img src='../".$fila["imagen"]."' width='80' style='border-radius: 12px; border: 2px solid #E64B6B;'></td>";
                        echo "<td>$".$fila["Precio"]."</td>";
                        
                        // Lógica de visualización de Stock
                        if ($fila["Stock"] <= 3) {
                            echo "<td style='color: #ee6612; font-weight: bold;'>".$fila["Stock"]."</td>";
                            $alertaSinStock = true;
                        } else if ($fila["Stock"] < 10) {
                            echo "<td style='color: #eedc12; font-weight: bold;'>".$fila["Stock"]."</td>";
                            $alertaStockBajo = true;
                        } else {
                            echo "<td>".$fila["Stock"]."</td>";
                        }
                        
                        echo "<td>
                                <a href='formUpdateProductos.php?Codigo=" . $fila["Codigo"] . "'>
                                    <button class='btn-action'>Editar</button>
                                </a>
                                <a href='eliminarProductos.php?Codigo=" . $fila["Codigo"] . "'>
                                    <button class='btn-action'>Eliminar</button>
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No se encontraron productos</td></tr>";
                }

                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>

    <a href="../vendedor.php"><button class="volver">Perfil</button></a>
    <a href="formRegistroProductos.php"><button class="volver">Registrar Producto</button></a>
</div>

<!-- Lógica de alertas agrupadas fuera del bucle -->
<?php if ($alertaSinStock): ?>
<script>
    Swal.fire({
        title: 'Atención con el Inventario',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/gato.png', // Ruta a tu imagen o icono
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: 'Tienes productos agotados (Stock en 0).'
    });
</script>
<?php elseif ($alertaStockBajo): ?>
<script>
    Swal.fire({
        title: 'Stock Bajo',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/gato.png', // Ruta a tu imagen o icono
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: 'Se recomienda reponer productos con pocas unidades.'
    });
</script>
<?php endif; ?>

</body>
</html>