<?php
// --- 1. CONEXIÓN Y CONFIGURACIÓN DE FECHA (Backend) ---
$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS"; // Asegúrate de que este sea el nombre correcto de tu BD

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Intentar establecer el idioma en español (si falla, no interrumpe la ejecución)
@$conn->query("SET lc_time_names = 'es_ES'");

// Capturar el filtro de agrupación (por defecto: 'dias')
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'dias';

// Construcción de consultas dinámicas
if ($filtro === 'semanas') {
    $sql_ventas = "SELECT CONCAT('Semana ', WEEK(fecha, 1), ' - ', DATE_FORMAT(fecha, '%b')) AS etiqueta, 
                          SUM(total) AS total 
                   FROM pedidos 
                   GROUP BY YEARWEEK(fecha, 1) 
                   ORDER BY fecha ASC LIMIT 12";
} elseif ($filtro === 'meses') {
    $sql_ventas = "SELECT DATE_FORMAT(fecha, '%M %Y') AS etiqueta, 
                          SUM(total) AS total 
                   FROM pedidos 
                   GROUP BY DATE_FORMAT(fecha, '%Y-%m') 
                   ORDER BY fecha ASC LIMIT 12";
} else {
    $sql_ventas = "SELECT DATE_FORMAT(fecha, '%W, %d/%m') AS etiqueta, 
                          SUM(total) AS total 
                   FROM pedidos 
                   GROUP BY DATE(fecha) 
                   ORDER BY fecha ASC LIMIT 15";
}

// Ejecutar consulta de ventas con verificación de error
$res_ventas = $conn->query($sql_ventas);
if (!$res_ventas) {
    die("<b>Error en la consulta de ventas:</b> " . $conn->error);
}

$etiquetas = [];
$totales   = [];

while ($row = $res_ventas->fetch_assoc()) {
    $etiquetas[] = ucfirst($row['etiqueta']);
    $totales[]   = (float)$row['CostoTotal'];
}

// Consulta de los 3 productos más vendidos con verificación de error
$sql_top = "SELECT producto, SUM(cantidad) AS unidades, SUM(subtotal) AS ingreso_total 
            FROM detalle_ventas 
            GROUP BY producto 
            ORDER BY unidades DESC LIMIT 3";

$res_top = $conn->query($sql_top);
if (!$res_top) {
    die("<b>Error en la consulta de productos top:</b> " . $conn->error);
}

// Respuesta JSON exclusiva para peticiones AJAX
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
    <!-- Librería Chart.js para renderizar los gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 30px; }
        .card { background: #fff; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); max-width: 850px; margin: auto; }
        .controls { margin-bottom: 25px; display: flex; gap: 15px; flex-wrap: wrap; }
        .control-group { display: flex; flex-direction: column; gap: 5px; }
        label { font-size: 13px; font-weight: bold; color: #555; }
        select { padding: 8px 12px; border-radius: 6px; border: 1px solid #ccc; font-size: 14px; outline: none; }
        .chart-container { position: relative; height: 350px; width: 100%; }
        
        /* Estilos de la tabla de top productos */
        .top-products { margin-top: 35px; border-top: 1px solid #eee; padding-top: 20px; }
        .sales-table { width: 100%; border-collapse: collapse; margin-top: 15px; background: #fff; border-radius: 8px; overflow: hidden; }
        .sales-table th { background-color: #007bff; color: #ffffff; text-align: left; padding: 12px 15px; font-size: 14px; }
        .sales-table td { padding: 12px 15px; border-bottom: 1px solid #eef2f5; color: #333; font-size: 14px; }
        .sales-table tr:last-child td { border-bottom: none; }
        .sales-table tr:hover { background-color: #f8f9fa; }
        .rank-badge { background: #e9ecef; color: #495057; padding: 4px 8px; border-radius: 50%; font-weight: bold; font-size: 12px; }
    </style>
</head>
<body>

<div class="card">
    <h2>📊 Reporte de Ventas en Tiempo Real</h2>
    
    <div class="controls">
        <!-- Selector 1: Agrupación de fechas -->
        <div class="control-group">
            <label for="filtro">Agrupar por:</label>
            <select id="filtro" onchange="cambiarFiltro(this.value)">
                <option value="dias" <?php if($filtro=='dias') echo 'selected'; ?>>Días (Ej: Lunes, 29/08)</option>
                <option value="semanas" <?php if($filtro=='semanas') echo 'selected'; ?>>Semanas (Ej: Semana 34)</option>
                <option value="meses" <?php if($filtro=='meses') echo 'selected'; ?>>Meses (Ej: Agosto 2026)</option>
            </select>
        </div>

        <!-- Selector 2: Tipo de Visualización -->
        <div class="control-group">
            <label for="tipoGrafico">Tipo de Gráfico:</label>
            <select id="tipoGrafico" onchange="cambiarTipoGrafico(this.value)">
                <option value="bar">Barras Verticales</option>
                <option value="line">Línea de Tendencia</option>
            </select>
        </div>
    </div>

    <!-- Contenedor del Gráfico -->
    <div class="chart-container">
        <canvas id="graficoVentas"></canvas>
    </div>

    <!-- Sección de la Tabla de los 3 Productos Más Vendidos -->
    <div class="top-products">
        <h3>🔥 Top 3 Productos Más Vendidos</h3>
        <table class="sales-table">
            <thead>
                <tr>
                    <th style="width: 10%;">Pos.</th>
                    <th>Producto</th>
                    <th>Unidades Vendidas</th>
                    <th>Total Generado</th>
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
                        <td><?php echo number_format($prod['unidades']); ?> uds.</td>
                        <td>$<?php echo number_format($prod['ingreso_total'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
// Carga de datos iniciales en JavaScript traídos desde PHP
let etiquetas = <?php echo json_encode($etiquetas); ?>;
let totales = <?php echo json_encode($totales); ?>;

const ctx = document.getElementById('graficoVentas').getContext('2d');
let tipoActual = 'bar';
let miGrafico;

// Función para inicializar o actualizar la estructura del gráfico
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
                backgroundColor: tipo === 'line' ? 'rgba(54, 162, 235, 0.2)' : 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
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
                        minRotation: 90, // Letras verticales a 90 grados
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

// Renderizar el gráfico inicial
crearGrafico(tipoActual, etiquetas, totales);

// Cambia la vista entre Barras y Líneas dinámicamente
function cambiarTipoGrafico(nuevoTipo) {
    tipoActual = nuevoTipo;
    crearGrafico(tipoActual, miGrafico.data.labels, miGrafico.data.datasets[0].data);
}

// Petición AJAX al cambiar la agrupación de fechas
function cambiarFiltro(periodo) {
    fetch(`index.php?filtro=${periodo}&ajax=1`)
        .then(response => response.json())
        .then(data => {
            crearGrafico(tipoActual, data.etiquetas, data.totales);
        })
        .catch(error => console.error('Error al actualizar:', error));
}
</script>

</body>
</html>