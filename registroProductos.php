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
$Nombrep=$_POST['Nombrep'];
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
    <style>
    *{
        font-family: 'Chillax-Semibold';
    }
        body {
            background-image: url(2.png);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 0;
        }
        div {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
            color: #EFE2DA;
        }
        h2 {
            text-align: center;
        }
        a{
            color: #EFE2DA;
        }
.volver{
        padding: 10px 20px;
        border: none;
        color: #EFE2DA;
        border-radius: 5px;
        background: #E64B6B;
        cursor: pointer;
        font-size: 16px;
        margin:3px;
        }

        .volver:hover{
            background-color: #EFE2DA;
            color: #E64B6B;
        }
    </style>
</head>
<body>
    <div>
        <h2>Registro de Producto</h2>
        <p>
            <?php 
           $sql="INSERT INTO Productos (Codigo, Nombrep, Descripcion, Precio, Stock) VALUES ($Codigo, '$Nombrep', '$Descripcion', '$Precio', '$Stock')";
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