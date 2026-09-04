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

// --- 2. CONSULTA TOP 3 CLIENTES MÁS FRECUENTES ---
$sql_top_clientes = "SELECT Nombre, COUNT(*) AS total_pedidos
                    FROM Pedidos
                    WHERE Estado = 'Aceptado'
                    GROUP BY Nombre
                    ORDER BY total_pedidos DESC
                    LIMIT 3";

$res_clientes = $conn->query($sql_top_clientes);
if (!$res_clientes) {
    die("<b>Error en la consulta de clientes:</b> " . $conn->error);
}

$etiquetas = [];
$totales   = [];

while ($row = $res_clientes->fetch_assoc()) {
    $etiquetas[] = $row['Nombre'];
    $totales[]   = (int)$row['total_pedidos'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top 3 Clientes Más Frecuentes</title>
    <!-- Se incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image:url(imagenes/2.png); 
            margin: 30px; 
        }
        .card { background: #EFE2DA;border:5px solid #6A253A; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); max-width: 850px; margin: auto; }
        h2 { 
            color: #6A253A; 
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .chart-container { 
            position: relative; 
            height: 300px; 
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
    border: 5px solid #6A253A;
    margin-top: 15px; 
    background: #EFE2DA; 
    border-radius: 15px; 
    overflow: hidden; 
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
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
        
    </style>
</head>
<body>
<?php
 include ("includes/botonvolver.php"); 
?>
<div class="card">
    <h2>Top 3 Clientes Más Frecuentes</h2>

    <div class="chart-container">
        <?php if (!empty($etiquetas)): ?>
            <canvas id="graficoClientes"></canvas>
        <?php else: ?>
            <div class="no-data">No se encontraron pedidos con el estado 'Aceptado' en la base de datos.</div>
        <?php endif; ?>
    </div>

    <div class="top-products">
        <h3>Detalle de Pedidos</h3>
        <?php if (!empty($etiquetas)): ?>
            <table class="sales-table">
                <thead>
                    <tr>
                        <th style="width: 50px;">Pos.</th>
                        <th>Nombre del Cliente</th>
                        <th style="text-align: right;">Total Pedidos</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($etiquetas as $i => $cliente): ?>
                        <tr>
                            <td><span class="rank-badge"><?php echo $i + 1; ?></span></td>
                            <td><strong><?php echo htmlspecialchars($cliente); ?></strong></td>
                            <td style="text-align: right;"><?php echo $totales[$i]; ?> pedido(s)</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Sin datos para listar.</p>
        <?php endif; ?>
    </div>
</div>

<script>
// Imprimir en consola los datos que PHP está entregando a JavaScript
const etiquetas = <?php echo json_encode($etiquetas); ?>;
const totales = <?php echo json_encode($totales); ?>;

console.log("Etiquetas recibidas:", etiquetas);
console.log("Totales recibidos:", totales);

if (etiquetas.length > 0) {
    const ctx = document.getElementById('graficoClientes').getContext('2d');
    
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Pedidos Aceptados',
                data: totales,
                backgroundColor: [
                    '#6A253A', 
                    '#E64B6B', 
                    '#e4c5b3'  
                ],
                borderColor: '#EFE2DA',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#333',
                        font: { size: 13 }
                    }
                }
            }
        }
    });
}
</script>

</body>
</html>