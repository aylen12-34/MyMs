<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "MYMS";

$conexion = new mysqli($servername, $username,$password,$bdname);

if($conexion -> connect_error){
    echo "Hubo un error";
}

$ID = $_GET['ID'];
$sql = "DELETE FROM Pedidos WHERE ID=$ID";
if ($conexion->query($sql) === TRUE) {
    echo "";
}
 else {
    echo "Error: " . $conexion->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
</head>
<body>
    <div>
        <h2>Eliminar Pedidos</h2>
        <p>
      <?php
        echo "El pedido ha sido eliminado.";
        $conexion->close(); 
      ?>
    </p><br>
        
        
<button class="volver"><a href="leerPedidos.php">Tabla Pedidos</a></button>
        
    </div>
    </div>
</body>
</html>
