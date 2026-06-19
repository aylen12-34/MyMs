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
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #EFE2DA;
            color:#E64B6B;
        }
        .volver{
        padding: 10px 20px;
        border: none;
        color: #EFE2DA;
        border-radius: 5px;
        background: #E64B6B;
        cursor: pointer;
        font-size: 16px;
        }

        .volver:hover{
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
        @media(max-width:800px){

  body{
    padding: 20px;
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

  input[type="submit"],
  .volver{
    width: 100%;
    margin-top: 10px;
  }
}

    </style>
</head>
<body>
    <div>
        <h1>Registro de Usuario</h1>
    
        <form action="registroUsuario.php" method="POST" onsubmit="return validar()">
            <label for="CI">CI:</label>
            <input type="number" id="CI" name="CI"> <br> <br>
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre"><br><br>
            <label for="Direccion">Dirección:</label>
            <input type="text" id="Direccion" name="Direccion"><br><br>
            <label for="Celular">Celular:</label>
            <input type="text" id="Celular" name="Celular"><br><br>
            <label for="Rol">Rol:</label>
            <input type="text" id="Rol" name="Rol"><br><br>
            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado"><br><br>
            <input type="submit" value="Registrar Usuario">

        </form>
        <button class="volver" onclick="history.back()">← Volver</button>
    </div>
    <script>
    var ci = document.getElementById("CI");
    var nombre = document.getElementById("Nombre");
    var direccion = document.getElementById("Direccion");
    var celular = document.getElementById("Celular");
    var rol = document.getElementById("Rol");
    var estado = document.getElementById("Estado");

    var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
    var expRegRol = /^[a-z]+$/;

    function validar() {

        if (ci.value == "") {
            alert("⚠ Ingrese su CI");
            ci.focus();
            return false;
        }

        if (!/^\d+$/.test(ci.value)) {
            alert("⚠ El CI debe contener solo números");
            ci.focus();
            return false;
        }

        if (nombre.value == "") {
            alert("⚠ Ingrese su nombre");
            nombre.focus();
            return false;
        }

        if (!expRegNombre.test(nombre.value)) {
            alert("⚠ El nombre debe contener solo letras");
            nombre.focus();
            return false;
        }

        if (nombre.value.length < 3) {
            alert("⚠ El nombre debe tener al menos 3 letras");
            nombre.focus();
            return false;
        }

        if (direccion.value == "") {
            alert("⚠ Ingrese su dirección");
            direccion.focus();
            return false;
        }

        if (celular.value == "") {
            alert("⚠ Ingrese su celular");
            celular.focus();
            return false;
        }

        if (!/^\d+$/.test(celular.value)) {
            alert("⚠ El celular debe contener solo números");
            celular.focus();
            return false;
        }

        if (celular.value.length != 8) {
            alert("⚠ El celular debe tener exactamente 8 dígitos");
            celular.focus();
            return false;
        }

        if (rol.value == "") {
            alert("⚠ Ingrese el rol");
            rol.focus();
            return false;
        }
        if (!expRegRol.test(rol.value)) {
            alert("⚠ El rol debe contener solo letras minúsculas");
            rol.focus();
            return false;
        }

        if (rol.value != "vendedor" && rol.value != "administrador") {
            alert("⚠ El rol solo puede ser 'vendedor' o 'administrador'");
            rol.focus();
            return false;
        }
        if (estado.value == "") {
            alert("⚠ Ingrese el estado");
            estado.focus();
            return false;
        }

        return true;
    }
</script>
</body>
</html>