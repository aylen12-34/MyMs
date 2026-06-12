<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";   
 
$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$Nombre=$_POST['Nombre'];
$Fecha=$_POST['Fecha'];
$Estado=$_POST['Estado'];
$NombreVendedor=$_POST['NombreVendedor'];
    
           $sql="INSERT INTO Pedidos (Nombre, Fecha, Estado, NombreVendedor) VALUES ('$Nombre', '$Fecha', '$Estado', '$NombreVendedor')";
        if ($conexion->query($sql) === TRUE) {
            echo "Pedidos registrado correctamente";
        }
      ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button class="volver" onclick="history.back()">← Volver</button><br>
    <button class="volver"><a href="leerPedidos.php">Tabla Pedidos</a></button>
</body>
</html>
