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
if ($filtro === 'anios') {
    $sql_ventas = "SELECT DATE_FORMAT(p.fecha, '%Y') AS etiqueta, 
                          SUM(v.costototal) AS total 
                   FROM ventas v
                   INNER JOIN pedidos p ON v.Pedidos_ID = p.id
                   GROUP BY YEAR(p.fecha) 
                   ORDER BY p.fecha ASC LIMIT 10";
} elseif ($filtro === 'semanas') {
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
    $totales[]   = (float)($row['total'] ?? 0);
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
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image:url(imagenes/2.png); 
            margin: 30px; 
        }
        .card { background: #EFE2DA;border:5px solid #6A253A; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); max-width: 850px; margin: auto; }


.controls {
    margin-bottom: 30px;
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
}

.control-group {
    display: flex;
    flex-direction: column;
    gap: 8px;
    min-width: 180px;
}

label {
    font-size: 13px;
    font-weight: bold;
    color: #6A253A;
    letter-spacing: 0.5px;
}

/* SELECT ESTILIZADO */

select {
    appearance: none;
    -webkit-appearance: none;

    padding: 12px 42px 12px 15px;

    background-color: #ffffff;

    border: 2px solid #6A253A;
    border-radius: 10px;

    color: #6A253A;
    font-size: 14px;
    font-weight: bold;

    cursor: pointer;
    outline: none;

    /* Flechita */
    background-image: linear-gradient(45deg, transparent 50%, #E64B6B 50%),
                      linear-gradient(135deg, #E64B6B 50%, transparent 50%);
    background-position: calc(100% - 18px) 50%,
                         calc(100% - 12px) 50%;
    background-size: 6px 6px,
                     6px 6px;
    background-repeat: no-repeat;

    transition: all 0.25s ease;

    box-shadow: 0 3px 8px rgba(106, 37, 58, 0.12);
}

select:hover {
    border-color: #E64B6B;
    box-shadow: 0 5px 12px rgba(230, 75, 107, 0.20);
    transform: translateY(-2px);
}

select:focus {
    border-color: #E64B6B;
    box-shadow: 0 0 0 3px rgba(230, 75, 107, 0.20);
}


/* ==========================
   TABLA DE PRODUCTOS
========================== */

/* ==========================
   TABLA DE PRODUCTOS
========================== */

.top-products {
    margin-top: 40px;
    padding-top: 25px;
    border-top: 2px dashed #6A253A;
}

.top-products h3 {
    color: #6A253A;
    margin-bottom: 20px;
    font-size: 22px;
}


/* TABLA */

.sales-table { 
    width: 100%; 
    border-collapse: collapse; 
    border: 5px solid #6A253A;
    margin-top: 15px; 
    background: #EFE2DA; 
    border-radius: 15px; 
    overflow: hidden; 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
}


/* ENCABEZADO */

.sales-table th {
    background: #E64B6B;
    color: #ffffff;

    text-align: left;

    padding: 17px 18px;

    font-size: 15px;
    font-weight: bold;

    border: none;
}


/* CELDAS */

.sales-table td {
    padding: 17px 18px;

    border-bottom: 1px solid rgba(106, 37, 58, 0.12);

    color: #333;

    font-size: 15px;

    transition: all 0.2s ease;
}


/* FILAS */

.sales-table tbody tr {
    transition: all 0.25s ease;
}

.sales-table tbody tr:hover {
    background: #fff0f4;
    transform: scale(1.008);
}

.sales-table tr:last-child td {
    border-bottom: none;
}


/* ==========================
   RANKING
========================== */

.rank-badge {
    width: 34px;
    height: 34px;

    border-radius: 50%;

    background: #6A253A;
    color: #ffffff;

    font-weight: bold;
    font-size: 14px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    box-shadow: 0 3px 8px rgba(106, 37, 58, 0.25);
}


/* PRIMEROS PUESTOS */

.puesto-1 {
    background: #E64B6B;
    box-shadow: 0 0 12px rgba(230, 75, 107, 0.4);
}

.puesto-2 {
    background: #6A253A;
}

.puesto-3 {
    background: #431825;
}


/* PRECIO */

.sales-table td:last-child {
    color: #6A253A;
    font-weight: bold;
    font-size: 16px;
}


/* ==========================
   RESPONSIVE
========================== */

@media (max-width: 700px) {

    .controls {
        flex-direction: column;
    }

    .control-group {
        width: 100%;
    }

    select {
        width: 100%;
    }

    .sales-table {
        font-size: 12px;
    }

    .sales-table th,
    .sales-table td {
        padding: 10px 8px;
    }

}
/* ==========================
   FLECHA PARA SIGUIENTE REPORTE
========================== */

.flecha-siguiente {
    position: fixed;

    right: 18px;
    top: 50%;
    transform: translateY(-50%);

    width: 55px;
    height: 55px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #E64B6B;
    color: #EFE2DA;

    border: 3px solid #EFE2DA;
    border-radius: 50%;

    text-decoration: none;

    font-family: Arial, sans-serif;
    font-size: 32px;
    font-weight: bold;

    box-shadow: 0 4px 12px rgba(106, 37, 58, 0.35);

    z-index: 100;

    transition: 
        transform 0.25s ease,
        background 0.25s ease,
        box-shadow 0.25s ease;
}

.flecha-siguiente:hover {
    background: #6A253A;

    transform: translateY(-50%) scale(1.1);

    box-shadow: 
        0 0 10px rgba(230, 75, 107, 0.5),
        0 5px 15px rgba(106, 37, 58, 0.4);
}

.flecha-siguiente:active {
    transform: translateY(-50%) scale(0.95);
}
    </style>
</head>
<body>
<?php
 include ("includes/botonvolver.php"); 
?>

<a href="reportclient.php" class="flecha-siguiente">
    ›
</a>
<div class="card">
    <h2>Reporte de Ventas</h2>
    
    <div class="controls">
        <div class="control-group">
            <label for="filtro">Agrupar por:</label>
            <select id="filtro" onchange="cambiarFiltro(this.value)">
                <option value="dias" <?php if($filtro=='dias') echo 'selected'; ?>>Días</option>
                <option value="semanas" <?php if($filtro=='semanas') echo 'selected'; ?>>Semanas</option>
                <option value="meses" <?php if($filtro=='meses') echo 'selected'; ?>>Meses</option>
                <option value="anios" <?php if($filtro=='anios') echo 'selected'; ?>>Años</option>
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

    <!-- TABLA DE TOP 3 PRODUCTOS MÁS VENDIDOS -->
    <div class="top-products">
        <h3>Top 3 Productos Más Vendidos</h3>
        <table class="sales-table">
            <thead>
                <tr>
                    <th style="width: 50px; text-align: center;">#</th>
                    <th>Producto</th>
                    <th>Unidades Vendidas</th>
                    <th>Ingreso Total ($)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $posicion = 1;
                if ($res_top->num_rows > 0):
                    while ($top = $res_top->fetch_assoc()): 
                ?>
                    <tr>
                        <td style="text-align: center;"><span class="rank-badge"><?php echo $posicion++; ?></span></td>
                        <td><strong><?php echo htmlspecialchars($top['producto']); ?></strong></td>
                        <td><?php echo number_format($top['unidades']); ?></td>
                        <td>$<?php echo number_format($top['ingreso_total'], 2); ?></td>
                    </tr>
                <?php 
                    endwhile;
                else: 
                ?>
                    <tr>
                        <td colspan="4" style="text-align: center;">No hay registros de ventas.</td>
                    </tr>
                <?php endif; ?>
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
                backgroundColor: tipo === 'line' ? 'rgba(255, 0, 115, 0.2)' : 'rgba(240, 18, 96, 0.6)',
                borderColor: 'rgb(154, 12, 78)',
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
    fetch(`<?php echo $_SERVER['PHP_SELF']; ?>?filtro=${periodo}&ajax=1`)
        .then(response => response.json())
        .then(data => {
            crearGrafico(tipoActual, data.etiquetas, data.totales);
        })
        .catch(error => console.error('Error al actualizar:', error));
}
</script>

</body>
</html>