<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="MyMS";
 
$conn = new mysqli ($servername,$username,$password,$dbname);

if ($conn->connect_error){
    echo "Hubo un error:(";
}
$sql ="SELECT*FROM VENTAS ";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Ventas</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Cinzel Decorative', serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      background-color: #242424;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .contenedor {
      background: linear-gradient(to bottom, #ffffff, #3a3a3a);
      border: 5px solid #c59d5f;
      border-radius: 10px;
      padding: 40px;
      width: 90%;
      max-width: 900px;
      color: #1a1a1a;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      animation: aparecer 0.8s ease-out;
      text-align: center;
      overflow-y: auto;
      max-height: 90vh;
    }
    h2 {
      border-bottom: 2px solid #c59d5f;
      margin-bottom: 20px;
      color: #3a3a3a;
      padding-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      padding: 12px;
      border-bottom: 2px solid #c59d5f;
    }
    th {
      background-color: #c59d5f;
      color: #fff;
      font-weight: bold;
    }
    
    a {
      text-decoration: none;
      margin: 3px;
    }
    button {
      font-family: 'Cinzel Decorative', serif;
      background-color: #ffffff;
      color: #000000;
      border: 2px solid #c59d5f;
      border-radius: 6px;
      padding: 5px 10px;
      cursor: pointer;
      transition: 0.3s;
    }
    button:hover {
      background-color: #000000;
      color: #ffffff;
      box-shadow: 0 4px 10px #c59d5f;
    }
    .volver {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      background-color: #ffffff;
      color: #000000;
      padding: 10px 20px;
      border-radius: 4px;
      border: 2px solid #c59d5f;
      transition: 0.3s;
    }
    .volver:hover {
      background-color: #000000;
      color: #ffffff;
      box-shadow: 0 4px 10px #c59d5f;
    }
  </style>
  </style>
</head>
<body>
  <div class="contenedor">
    <h2>Lista de Ventas Registradas</h2>
    <table>
      <tr>
        <th>Número Teléfono</th>
        <th>Cliente</th>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Acciones</th>
      </tr>
      <?php
      if($resultado->num_rows > 0) {
          while ($fila=$resultado->fetch_assoc()) {
              $numtelf=$fila['numtelf'];
              echo "<tr>";
              echo "<td>".$fila['numtelf']."</td>";
              echo "<td>".$fila['cliente']."</td>";
              echo "<td>".$fila['producto']."</td>";
              echo "<td>".$fila['cantidad']."</td>";
              echo "<td>
                      <a href='formupdate.php?numtelf=$numtelf'><button>Editar</button></a>
                      <a href='eliminar.php?numtelf=$numtelf'><button>Eliminar</button></a>
                      <a href='readget.php?numtelf=$numtelf'><button>Mostrar</button></a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No hay ventas registradas</td></tr>";
      }
      $conn->close();
      ?>
    </table>
    <a href="menu.html" class="volver">Volver al menú</a>
  </div>
</body>
</html>