<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
session_start();
if($_SESSION['CI']==null){
    header("location:../login.php");
}
$CI=$_GET['CI'];
$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $CI=$fila['CI'];
        $Nombre=$fila['Nombre'];
        $Direccion=$fila['Direccion'];
        $Celular=$fila['Celular'];
        $Rol=$fila['Rol'];
        $Estado=$fila['Estado'];
    }
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
        <h1>Editar Usuario</h1>
    <form action="updateditarUsuario.php" method="post" onsubmit="return validar()">
        <label for="">Carnet de Identidad</label>
        <input type="text" name="CI" value='<?=$CI?>' readonly>
        <label for="">Nombre:</label>
        <input type="text" name="Nombre" value='<?=$Nombre?>'>
        <br>
        <label for="">Dirección:</label>
        <input type="text" name="Direccion" value='<?=$Direccion?>' required>
        <br>
        <label for="">Celular:</label>
        <input type="number" name="Celular" value='<?=$Celular?>' required>
        <br>
        <label for="">Rol:</label>
        <input type="text" name="Rol" value='<?=$Rol?>' required>
        <br>
        <label for="">Estado:</label>
        <input type="text" name="Estado" value='<?=$Estado?>' readonly>
        <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">
         Volver</button><br>
</div>
    <script>
    var ci = document.getElementsByName("CI")[0];
    var nombre = document.getElementsByName("Nombre")[0];
    var direccion = document.getElementsByName("Direccion")[0];
    var celular = document.getElementsByName("Celular")[0];
    var rol = document.getElementsByName("Rol")[0];
    var estado = document.getElementsByName("Estado")[0];
    var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    var expRegRol = /^[a-z]+$/;

    function validar() {

        if (nombre.value == "") {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingresa tu nombre ⚠'
    });
            nombre.focus();
            return false;
        }

        if (!expRegNombre.test(nombre.value)) {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El nombre debe contener solo letras ⚠'
    });
            nombre.focus();
            return false;
        }

        if (nombre.value.length < 3) {
            Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El nombre debe tener al menos 3 letras ⚠'
    });
            nombre.focus();
            return false;
        }

        if (direccion.value == "") {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingresa tu dirección ⚠'
    });
            direccion.focus();
            return false;
        }

        if (celular.value == "") {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingresa tu celular ⚠'
    });
            celular.focus();
            return false;
        }

        if (!/^\d+$/.test(celular.value)) {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El celular debe contener solo números ⚠'
    });
            celular.focus();
            return false;
        }

        if (celular.value.length != 8) {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El celular debe tener 8 dígitos ⚠'
    });
            celular.focus();
            return false;
        }

        if (rol.value == "") {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ Ingresa el rol ⚠'
    });
            rol.focus();
            return false;
        }

        if (!expRegRol.test(rol.value)) {
             Swal.fire({
        title: 'Alerta',
        background: '#e65c78',
        color: '#EFE2DA',
        imageUrl: '../imagenes/galletaus.png',
        imageHeight: 150,
        imageAlt: 'Icono personalizado',
        confirmButtonText: 'OK',
    confirmButtonColor: '#6A253A',
        text: '⚠ El rol debe contener solo letras minúsculas ⚠'
    });
            rol.focus();
            return false;
        }

        return true;
    }
    </script>
</body>
</html>