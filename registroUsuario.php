<?php
require "bdUsuario.php";
$CI=$_POST['CI'];
$Nombre=$_POST['Nombre'];
$Direccion=$_POST['Direccion'];
$Celular=$_POST['Celular'];
$Rol=$_POST['Rol'];
$Estado=$_POST['Estado'];

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
        #id{
            background-color: #E64B6B;
            color: #EFE2DA;
            transition: 0.3s;
        }
        #id:hover{
            background-color: #EFE2DA;
            color: #6A253A;
        }
    </style>
</head>
<body>
    <div>
        <h2>Registro de Usuario</h2>
        <p>
            <?php 
            $sql="INSERT INTO Usuarios (CI,Nombre, Direccion, Celular, Rol, Estado) VALUES ('$CI','$Nombre', '$Direccion', '$Celular', '$Rol', '$Estado')";
                if ($conexion->query($sql) === TRUE) {
                    echo "Cliente registrado correctamente";
            }
      ?>
        </p><br>
        <button onclick="history.back()" id="volver">Volver</button>
    </div>
</body>
</html>