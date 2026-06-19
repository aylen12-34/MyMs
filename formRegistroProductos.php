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
label.error{
    display:none !important;
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
        $("form").validate({
    rules: {
        Codigo: {
            required: true,
        },
        Nombre: {
            required: true,
            minlength: 3
        },

        Descripcion: {
            required: true
        },

        Precio: {
            required: true,
            digits: true
        },

        Stock: {
            required: true
        }

    },

    messages: {
        Codigo: {
            required: "&#9888;Ingrese su ID",
        },
        Nombre: {
            required: "&#9888;Ingrese su nombre",
            minlength: "Mínimo 3 letras"
        },

        Descripcion: {
            required: "&#9888;Ingrese su descripción"
        },

        Precio: {
            required: "&#9888;Ingrese el precio",
            digits: "Solo números"
        },
        Stock: {
            required: "&#9888;Ingrese el stock"
        }
        }
    });
    </script>
</body>
</html>