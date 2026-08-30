<?php
// --- 1. CONEXIÓN Y CONFIGURACIÓN DE FECHA ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

@$conn->query("SET lc_time_names = 'es_ES'");

$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'dias';

// Construcción de consultas uniendo 'ventas' y 'pedidos' por Pedidos_ID
if ($filtro === 'semanas') {
    $sql_ventas = "SELECT CONCAT('Semana ', WEEK(p.fecha, 1), ' - ', DATE_FORMAT(p.fecha, '%b')) AS etiqueta, 
                          SUM(v.costototal) AS total 
                   FROM ventas v
                   INNER JOIN pedidos p ON v.Pedidos_ID = p.id
                   GROUP BY YEARWEEK(p.fecha, 1) 
                   ORDER BY p.fecha ASC LIMIT 12";
} elseif ($filtro === 'meses') {
    $sql_ventas = "SELECT DATE_FORMAT(p.fecha, '%M %Y') AS etiqueta, 
                          SUM(v.costototal) AS total 
                   FROM ventas v
                   INNER JOIN pedidos p ON v.Pedidos_ID = p.id
                   GROUP BY DATE_FORMAT(p.fecha, '%Y-%m') 
                   ORDER BY p.fecha ASC LIMIT 12";
} else {
    $sql_ventas = "SELECT DATE_FORMAT(p.fecha, '%W, %d/%m') AS etiqueta, 
                          SUM(v.costototal) AS total 
                   FROM ventas v
                   INNER JOIN pedidos p ON v.Pedidos_ID = p.id
                   GROUP BY DATE(p.fecha) 
                   ORDER BY p.fecha ASC LIMIT 15";
}

$res_ventas = $conn->query($sql_ventas);
if (!$res_ventas) {
    die("<b>Error en la consulta de ventas:</b> " . $conn->error);
}

$etiquetas = [];
$totales   = [];

while ($row = $res_ventas->fetch_assoc()) {
    $etiquetas[] = ucfirst($row['etiqueta'] ?? '');
    $totales[]   = (float)($row['total'] ?? 0); // Corregido a 'total'
}

// Consulta de los 3 productos más vendidos uniendo carrito y productos
$sql_top = "SELECT pr.nombre AS producto, 
                   COUNT(c.Productos_Codigo) AS unidades, 
                   SUM(c.costototal) AS ingreso_total 
            FROM carrito c
            INNER JOIN productos pr ON c.Productos_Codigo = pr.codigo
            GROUP BY c.Productos_Codigo, pr.nombre 
            ORDER BY unidades DESC LIMIT 3";

$res_top = $conn->query($sql_top);
if (!$res_top) {
    die("<b>Error en la consulta de productos top:</b> " . $conn->error);
}

// Respuesta JSON para llamadas AJAX
if (isset($_GET['ajax'])) {
    header('Content-Type: application/json');
    echo json_encode([
        'etiquetas' => $etiquetas,
        'totales'   => $totales
    ]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Dinámico de Ventas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* ==========================
   COLORES
   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
========================== */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-image:url('imagenes/2.png'); margin: 30px; }
        .card { background: #EFE2DA; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); max-width: 850px; margin: auto; }
        .controls { margin-bottom: 25px; display: flex; gap: 15px; flex-wrap: wrap; }
        .control-group { display: flex; flex-direction: column; gap: 5px; }
        label { font-size: 13px; font-weight: bold; color: #010101; }
        select { padding: 8px 12px; border-radius: 6px; border: 1px solid #431825; font-size: 14px; outline: none; }
        .chart-container { position: relative; height: 350px; width: 100%; }
        
        .top-products { margin-top: 35px; border-top: 1px solid #eee; padding-top: 20px; }
        .sales-table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; border-radius: 8px; overflow: hidden; }
        .sales-table th { background-color: #E64B6B; color: #ffffff; text-align: left; padding: 12px 15px; font-size: 14px; }
        .sales-table td { padding: 12px 15px; border-bottom: 1px solid #eef2f5; color: #333; font-size: 14px; }
        .sales-table tr:last-child td { border-bottom: none; }
        .sales-table tr:hover { background-color: #f8f9fa; }
        .rank-badge { background: #e9ecef; color: #495057; padding: 4px 8px; border-radius: 50%; font-weight: bold; font-size: 12px; }
    </style>
</head>
<body>

<div class="card">
    <h2>📊 Reporte de Ventas</h2>
    
    <div class="controls">
        <div class="control-group">
            <label for="filtro">Agrupar por:</label>
            <select id="filtro" onchange="cambiarFiltro(this.value)">
                <option value="dias" <?php if($filtro=='dias') echo 'selected'; ?>>Días</option>
                <option value="semanas" <?php if($filtro=='semanas') echo 'selected'; ?>>Semanas</option>
                <option value="meses" <?php if($filtro=='meses') echo 'selected'; ?>>Meses</option>
            </select>
        </div>

        <div class="control-group">
            <label for="tipoGrafico">Gráfico por:</label>
            <select id="tipoGrafico" onchange="cambiarTipoGrafico(this.value)">
                <option value="bar">Barras</option>
                <option value="line">Línea</option>
            </select>
        </div>
    </div>

    <div class="chart-container">
        <canvas id="graficoVentas"></canvas>
    </div>

    <div class="top-products">
        <h3>🔥 Top 3 Productos Más Vendidos 🔥</h3>
        <table class="sales-table">
            <thead>
                <tr>
                    <th style="width: 10%;">Pos.</th>
                    <th>Producto</th>
                    <th>Veces Vendido</th>
                    <th>Total Generados</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $posicion = 1;
                while ($prod = $res_top->fetch_assoc()): 
                ?>
                    <tr>
                        <td><span class="rank-badge">#<?php echo $posicion++; ?></span></td>
                        <td><strong><?php echo htmlspecialchars($prod['producto']); ?></strong></td>
                        <td><?php echo number_format($prod['unidades']); ?> veces</td>
                        <td>Bs. <?php echo number_format($prod['ingreso_total'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
let etiquetas = <?php echo json_encode($etiquetas); ?>;
let totales = <?php echo json_encode($totales); ?>;

const ctx = document.getElementById('graficoVentas').getContext('2d');
let tipoActual = 'bar';
let miGrafico;

function crearGrafico(tipo, labels, data) {
    if (miGrafico) {
        miGrafico.destroy();
    }

    miGrafico = new Chart(ctx, {
        type: tipo,
        data: {
            labels: labels,
            datasets: [{
                label: 'Ventas Totales ($)',
                data: data,
                backgroundColor: tipo === 'line' ? 'rgba(252, 0, 235, 0.2)' : 'rgba(251, 2, 89, 0.6)',
                borderColor: 'rgb(114, 11, 107)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                tooltip: { enabled: true }
            },
            scales: {
                x: {
                    ticks: {
                        minRotation: 90,
                        maxRotation: 90
                    }
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

crearGrafico(tipoActual, etiquetas, totales);

function cambiarTipoGrafico(nuevoTipo) {
    tipoActual = nuevoTipo;
    crearGrafico(tipoActual, miGrafico.data.labels, miGrafico.data.datasets[0].data);
}

function cambiarFiltro(periodo) {
    // Reemplaza 'index.php' si tu archivo tiene otro nombre
    fetch(`<?php echo $_SERVER['PHP_SELF']; ?>?filtro=${periodo}&ajax=1`)
        .then(response => response.json())
        .then(data => {
            crearGrafico(tipoActual, data.etiquetas, data.totales);
        })
        .catch(error => console.error('Error al actualizar:', error));
}
</script>
<button class="volver" onclick="history.back()">
        ← Volver
    </button>

</body>
</html>