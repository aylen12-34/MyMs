<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$ID=$_GET['ID'];
$sql = "SELECT * FROM Pedidos WHERE ID=$ID";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $Nombre=$fila['Nombre'];
        $Fecha=$fila['Fecha'];
        $Estado=$fila['Estado'];
        $NombreVendedor=$fila['NombreVendedor'];
    }
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
        <h1>Editar Pedido</h1>
    <form action="updateEditarPedidos.php" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value='<?=$Nombre?>' required>  <br>  <br>
        <label for="Fecha">Fecha:</label>
        <input type="date" id="Fecha" name="Fecha" value='<?=$Fecha?>' required>  <br>  <br>
        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" value='<?=$Estado?>' required>  <br>  <br>
        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor" value='<?=$NombreVendedor?>' required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">← Volver</button><br>
    </div>
</body>
</html>