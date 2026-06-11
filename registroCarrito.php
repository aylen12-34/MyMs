<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";   
 
$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$Codigo=$_POST['Codigo'];
$Nombre=$_POST['Nombre'];
$Descripcion=$_POST['Descripcion'];
$Precio=$_POST['Precio'];
$Stock=$_POST['Stock'];

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
        <h2>Registro de Carrito</h2>
        <p>
            <?php 
           $sql="INSERT INTO Productos (Codigo, Nombre, Descripcion, Precio, Stock) VALUES ('$Codigo', '$Nombre', '$Descripcion', '$Precio', '$Stock')";
        if ($conexion->query($sql) === TRUE) {
            echo "Productos registrado correctamente";
        }
      ?>
        </p><br>
                
        <button class="volver" onclick="history.back()">← Volver</button><br>
        <button class="volver"><a href="readleeProductos.php">Tabla Productos</a></button>
    </div>
</body>
</html>