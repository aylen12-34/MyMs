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
    header("location:../login.php");
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    body, table, button, h2, a, input, select {
            font-family: 'Chillax-Semibold', sans-serif;
            box-sizing: border-box;
        }

        body {
            background-image: url(../imagenes/2.png);
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 0;
            margin: 0;
        }

        /* SE CAMBIÓ 'div' POR LA CLASE '.contenedor-registro' */
        .contenedor-registro {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
            color: #EFE2DA;
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }

        .contenedor-registro h1 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
        }

        form {
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #EFE2DA;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 2.5px solid #E64B6B;
            border-radius: 10px;
            outline: none;
        }

        /* SELECT */
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 2.5px solid #E64B6B;
            border-radius: 10px;
            background-color: white;
            color: #6A253A;
            font-size: 15px;
            cursor: pointer;
            outline: none;
        }

        select:focus {
            border-color: #EFE2DA;
        }

        select option {
            background-color: white;
            color: #6A253A;
        }

        /* ARCHIVO */
        input[type="file"] {
            background-color: white;
            color: #6A253A;
            cursor: pointer;
        }

        input[type="file"]::file-selector-button {
            background-color: #E64B6B;
            color: #EFE2DA;
            border: none;
            border-radius: 8px;
            padding: 8px 12px;
            margin-right: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        input[type="file"]::file-selector-button:hover {
            background-color: #EFE2DA;
            color: #6A253A;
        }

        input[type="submit"] {
            background-color: #E64B6B;
            color: #EFE2DA;
            padding: 12px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #EFE2DA;
            color: #E64B6B;
        }

        .volver {
            width: 100%;
            padding: 12px;
            border: none;
            color: #EFE2DA;
            border-radius: 10px;
            background: #E64B6B;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: 0.3s;
        }

        .volver:hover {
            background-color: #EFE2DA;
            color: #E64B6B;
        }

        @media(max-width:800px){
            body {
                padding: 20px;
            }

            .contenedor-registro {
                width: 100%;
                max-width: 340px;
                padding: 25px;
                border-radius: 25px;
            }

            .contenedor-registro h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <div class="contenedor-registro">
        <h1>Registro de Productos</h1>

        <form action="registroProductos.php" method="post" onsubmit="return validar()">

            <label for="Codigo">Codigo:</label>
            <input type="number" id="Codigo" name="Codigo"> 
            <br><br>

            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre">
            <br><br>

            <label for="Descripcion">Descripción:</label>
            <input type="text" id="Descripcion" name="Descripcion">
            <br><br>

            <label for="imagen">Producto</label>
            <input type="file" name="imagen" accept="image/*">
            <br><br>

            <label for="Precio">Precio:</label>
            <input type="number" id="Precio" name="Precio">
            <br><br>

            <label for="Stock">Stock:</label>
            <input type="number" id="Stock" name="Stock">
            <br><br>

            <label>Estado</label>
            <input type="text" value="Disponible" name="Estado" > <br><br>

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
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese el código ⚠'
    });
            codigo.focus();
            return false;
        }

        if (!/^\d+$/.test(codigo.value)) {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El código debe contener solo números ⚠'
    });
            codigo.focus();
            return false;
        }

        if (nombre.value == "") {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese el nombre ⚠'
    });
            nombre.focus();
            return false;
        }

        if (nombre.value.length < 3) {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El nombre debe tener al menos 3 letras ⚠'
    });
            nombre.focus();
            return false;
        }

        if (descripcion.value == "") {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese la descripción ⚠'
    });
            descripcion.focus();
            return false;
        }

        if (precio.value == "") {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese el precio ⚠'
    });
            precio.focus();
            return false;
        }

       if (!/^\d+(\.\d{1,2})?$/.test(precio.value)) {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese un precio válido (ej: 10 o 10.50) ⚠'
    });
            precio.focus();
            return false;
        }
        if (stock.value == "") {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingrese el stock ⚠'
    });
            stock.focus();
            return false;
        }

        if (!/^\d+$/.test(stock.value)) {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletapro.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El stock debe contener solo números ⚠'
    });
            stock.focus();
            return false;
        }

        return true;
    }
</script>
</body>
</html>