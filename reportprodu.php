<?php
// --- 1. CONEXIÓN A LA BASE DE DATOS ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

@$conn->query("SET lc_time_names = 'es_ES'");

// --- 2. CONSULTA TOP 3 PRODUCTOS MÁS VENDIDOS ---
// Realizamos los JOINs necesarios según las relaciones de tus tablas
$sql_top_productos = "SELECT 
                        p.Nombre AS producto, 
                        COUNT(c.Pedidos_ID) AS unidades, 
                        SUM(p.Precio) AS ingreso_total
                     FROM productos p
                     INNER JOIN carrito c ON p.Codigo = c.Productos_Codigo
                     INNER JOIN pedidos ped ON c.Pedidos_ID = ped.ID
                     INNER JOIN ventas v ON ped.ID = v.Pedidos_ID
                     WHERE v.Estado = 'Activo'
                     GROUP BY p.Codigo, p.Nombre
                     ORDER BY unidades DESC
                     LIMIT 3";

$res_top = $conn->query($sql_top_productos);

// Si las claves foráneas tienen nombres distintos (ej. id_producto, id_pedido, id_venta),
// ajusta los nombres en el JOIN arriba o usa esta consulta alternativa si el total se calcula por la tabla Carrito:
if (!$res_top) {
    // Consulta fallback simplificada por si difieren algunos nombres de foreign keys
    $sql_top_productos = "SELECT 
                            p.Nombre AS producto, 
                            COUNT(*) AS unidades, 
                            SUM(p.Precio) AS ingreso_total
                         FROM productos p
                         JOIN carrito c ON p.Codigo = c.Productos_Codigo
                         JOIN pedidos ped ON c.Pedidos_ID = ped.ID
                         JOIN ventas v ON ped.ID = v.Pedidos_ID
                         WHERE v.Estado = 'Activo'
                         GROUP BY p.Nombre
                         ORDER BY unidades DESC
                         LIMIT 3";
    $res_top = $conn->query($sql_top_productos);
}

if (!$res_top) {
    die("<b>Error en la consulta de productos:</b> " . $conn->error);
}

$etiquetas   = [];
$totales     = [];
$filas_tabla = [];

while ($row = $res_top->fetch_assoc()) {
    $etiquetas[]   = $row['producto'];
    $totales[]     = (int)$row['unidades'];
    $filas_tabla[] = $row;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Productos Más Vendidos</title>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background: #f4f0ed; 
            margin: 30px; 
        }
        .card { 
            background: #EFE2DA; 
            padding: 25px; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.12); 
            max-width: 700px; 
            margin: auto; 
        }
        h2 { 
            color: #6A253A; 
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .chart-container { 
            position: relative; 
            height: 320px; 
            width: 100%;
            margin: 0 auto;
        }
        .no-data {
            text-align: center;
            color: #888;
            padding: 30px 0;
            font-style: italic;
        }
        .top-products { 
            margin-top: 25px; 
            border-top: 1px solid #dcd1ca; 
            padding-top: 15px; 
        }
        .sales-table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 15px; 
            background: #ffffff; 
            border-radius: 8px; 
            overflow: hidden; 
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        .sales-table th { 
            background-color: #E64B6B; 
            color: #ffffff; 
            text-align: left; 
            padding: 12px 15px; 
            font-size: 14px; 
        }
        .sales-table td { 
            padding: 12px 15px; 
            border-bottom: 1px solid #eef2f5; 
            color: #333; 
            font-size: 14px; 
        }
        .rank-badge { 
            background: #6A253A; 
            color: #ffffff; 
            padding: 4px 10px; 
            border-radius: 50%; 
            font-weight: bold; 
            font-size: 12px; 
        }
        .btn-volver {
            display: inline-block;
            margin-top: 20px;
            background: #6A253A;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            text-decoration: none;
        }
        .btn-volver:hover {
            background: #E64B6B;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Top 3 Productos Más Vendidos</h2>

    <div class="chart-container">
        <?php if (!empty($etiquetas)): ?>
            <canvas id="graficoProductos"></canvas>
        <?php else: ?>
            <div class="no-data">No se encontraron ventas activas de productos registrados.</div>
        <?php endif; ?>
    </div>

    <div class="top-products">
        <h3>Detalle de Ventas</h3>
        <?php if (!empty($filas_tabla)): ?>
            <table class="sales-table">
                <thead>
                    <tr>
                        <th style="width: 10%;">Pos.</th>
                        <th>Producto</th>
                        <th>Veces Vendido</th>
                        <th>Total Generado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $posicion = 1;
                    foreach ($filas_tabla as $prod): 
                    ?>
                        <tr>
                            <td><span class="rank-badge">#<?php echo $posicion++; ?></span></td>
                            <td><strong><?php echo htmlspecialchars($prod['producto']); ?></strong></td>
                            <td><?php echo number_format($prod['unidades']); ?> veces</td>
                            <td>Bs. <?php echo number_format($prod['ingreso_total'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Sin datos disponibles para mostrar.</p>
        <?php endif; ?>
    </div>

    <button class="btn-volver" onclick="history.back()">← Volver</button>
</div>

<script>
const etiquetas = <?php echo json_encode($etiquetas); ?>;
const totales = <?php echo json_encode($totales); ?>;

console.log("Productos:", etiquetas);
console.log("Ventas:", totales);

if (etiquetas.length > 0) {
    const ctx = document.getElementById('graficoProductos').getContext('2d');
    
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Cantidad de Veces Vendido',
                data: totales,
                backgroundColor: [
                    '#6A253A', 
                    '#E64B6B', 
                    '#D9A25E'  
                ],
                borderColor: '#EFE2DA',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        color: '#333'
                    }
                },
                x: {
                    ticks: { color: '#333' }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: { color: '#333', font: { size: 13 } }
                }
            }
        }
    });
}
</script>

</body>
</html>