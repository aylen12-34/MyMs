<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "MYMS";

$conexion = new mysqli($servername, $username,$password,$bdname);

if($conexion -> connect_error){
    echo "Hubo un error";
}

$Codigo = $_GET['Codigo'];
$sql = "DELETE FROM Carrito";
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
</head>
<body>
    <div>
        <h2>Eliminar Productos del Carrito</h2>
        <p>
      <?php
        echo "El producto ha sido eliminado.";
        $conexion->close(); 
      ?>
    </p><br>
        
        
<button class="volver"><a href="leerCarrito.php">Tabla Carrito</a></button>
        
    </div>
    </div>
</body>
</html>
