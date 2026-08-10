<?php
require "bdVentas.php";

$Pedidos_ID=$_GET['Pedidos_ID'];
$sql = "SELECT * FROM Ventas WHERE Pedidos_ID='$Pedidos_ID'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $Pedidos_ID=$fila['Pedidos_ID'];
        $Costototal=$fila['Costototal'];
        $Estado=$fila['Estado'];
        $Metodo=$fila['Metodo'];
        $NombreVendedor=$_SESSION['Nombre'];
    }
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
    <div>
        <h1>Editar Venta</h1>
    <form action="updateVentas.php" method="post" onsubmit="return validar()">
        <input type="hidden" name="Pedidos_ID" value="<?=$Pedidos_ID?>">
        <label for="Costototal">Costo Total:</label>
        <input type="text" id="Costototal" name="Costototal" value='<?=$Costototal?>' required>  <br>  <br>
        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" value='<?=$Estado?>' required>  <br>  <br>
        <label for="Metodo">Metodo:</label>
        <input type="text" id="Metodo" name="Metodo" value='<?=$Metodo?>' required>  <br>  <br>
        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor" value='<?=$_SESSION['Nombre']?>' readonly>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">← Volver</button><br>
    </div>
    
</body>
</html>