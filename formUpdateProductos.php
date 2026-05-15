<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$sql = "SELECT * FROM Productos";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $Nombrep=$fila['Nombrep'];
        $Descripcion=$fila['Descripcion'];
        $Precio=$fila['Precio'];
        $Stock=$fila['Stock'];
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
        form {
            max-width: 400px;
        }



        label {
            display: block;
            margin-bottom: 5px;
            color: #EFE2DA;
        }



        
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2.5px solid #E64B6B;
            border-radius: 10px;
        }



        input[type="submit"] {
            background-color: #E64B6B;
            color:#EFE2DA;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #EFE2DA;
            color:#E64B6B;
        }





        div {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
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
        <h1>Editar Producto</h1>
    <form action="updateEditarProductos.php" method="post">
        <label for="">Nombre:</label>
        <input type="text" name="Nombrep" value='<?=$Nombrep?>' required>  <br>  <br>
        <label for="">Descripción:</label>
        <input type="text" name="Descripcion" value='<?=$Descripcion?>' required>  <br>  <br>
        <label for="">Precio:</label>
        <input type="text" name="Precio" value='<?=$Precio?>' required>  <br>  <br>
        <label for="">Stock:</label>
        <input type="text" name="Stock" value='<?=$Stock?>' required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">← Volver</button><br>
    </div>
</body>
</html>