<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <style>
    *{
        font-family: 'Chillax-Semibold';
    }

    body {
        background-image: url(../imagenes/2.png);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
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
        border-radius: 10%;
        color: #EFE2DA;
    }

    label.error{
        color: #ffd6de;
        background-color: #E64B6B;
        padding: 6px 10px;
        border-radius: 8px;
        margin-top: -5px;
        margin-bottom: 10px;
        display: inline-block;
        font-size: 13px;
    }@media(max-width:800px){

  body{
    padding: 20px;
    height: auto;
    min-height: 100vh;
  }

  div{
    width: 100%;
    max-width: 320px;
    padding: 25px;
    border-radius: 25px;
  }

  h1{
    text-align: center;
    font-size: 28px;
  }

  form{
    width: 100%;
  }

  input{
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"]{
    width: 100%;
    margin-top: 10px;
  }
label.error{
    display:none !important;
}
}
    </style>
</head>

<body>
    <div>
        <h1>Registro de Carrito</h1>

        <form action="registroCarrito.php" method="post">

            <label for="Cantidad">Cantidad:</label>
            <input type="number" id="Cantidad" name="Cantidad" required> 
            <br><br>

            <label for="CostoTotal">Costo Total:</label>
            <input type="number" id="CostoTotal" name="CostoTotal" required>
            <br><br>

            <input type="submit" value="Subir al Carrito">

        </form>
    </div>
</body>
</html>