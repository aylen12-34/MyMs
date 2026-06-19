<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}
session_start();
if($_SESSION['CI']==null){
    header("location:login.html");
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
        background-image: url(imagenes/2.png);
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
}
    </style>
</head>

<body>
    <div>
        <h1>Registro de Productos</h1>

        <form action="registroProductos.php" method="post">

            <label for="Codigo">Codigo:</label>
            <input type="number" id="Codigo" name="Codigo"> 
            <br><br>

            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre">
            <br><br>

            <label for="Descripcion">Descripción:</label>
            <input type="text" id="Descripcion" name="Descripcion">
            <br><br>

            <label for="Precio">Precio:</label>
            <input type="text" id="Precio" name="Precio">
            <br><br>

            <label for="Stock">Stock:</label>
            <input type="text" id="Stock" name="Stock">
            <br><br>

            <input type="submit" value="Registrar Productos">

        </form>
    </div>
<script>
    var codigo = document.getElementById("Codigo");
    var nombre = document.getElementById("Nombre");
    var descripcion = document.getElementById("Descripcion");
    var precio = document.getElementById("Precio");
    var stock = document.getElementById("Stock");

    function validar() {

        if (codigo.value == "") {
            alert("⚠ Ingrese el ID");
            codigo.focus();
            return false;
        }

        if (!/^\d+$/.test(codigo.value)) {
            alert("⚠ El ID debe contener solo números");
            codigo.focus();
            return false;
        }

        if (nombre.value == "") {
            alert("⚠ Ingrese el nombre");
            nombre.focus();
            return false;
        }

        if (nombre.value.length < 3) {
            alert("⚠ Mínimo 3 letras");
            nombre.focus();
            return false;
        }

        if (descripcion.value == "") {
            alert("⚠ Ingrese la descripción");
            descripcion.focus();
            return false;
        }

        if (precio.value == "") {
            alert("⚠ Ingrese el precio");
            precio.focus();
            return false;
        }

        if (!/^\d+$/.test(precio.value)) {
            alert("⚠ El precio debe contener solo números");
            precio.focus();
            return false;
        }

        if (stock.value == "") {
            alert("⚠ Ingrese el stock");
            stock.focus();
            return false;
        }

        if (!/^\d+$/.test(stock.value)) {
            alert("⚠ El stock debe contener solo números");
            stock.focus();
            return false;
        }

        return true;
    }
</script>
           
</body>
</html>