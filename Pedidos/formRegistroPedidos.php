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
}else {
  if($_SESSION['Rol']=="vendedor"){
    $CI = $_SESSION['CI'];
    $NombreVendedor= $_SESSION['Nombre'];
  } else{
    header("location:../login.html");
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
</head>

<body>
    <div>
        <h1>Registro de Pedidos</h1>

        <form action="registroPedidos.php" method="post" onsubmit="return validar()">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre">
            <br><br>

            <label for="Fecha">Fecha:</label>
            <input type="date" id="Fecha" name="Fecha" value='<?php echo date('Y-m-d');?>' readonly>
            <br><br>

            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado">
            <br><br>

            <label for="NombreVendedor">NombreVendedor:</label>
            <input type="text" name="NombreVendedor" value='<?=$_SESSION['Nombre']?>' readonly>
            <br><br>

            <input type="submit" value="Registrar Pedidos">

        </form>
    </div>
    <script>
        var nombre = document.getElementById("Nombre");
        var estado = document.getElementById("Estado");

        var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
        var expRegEstado = /^[a-z]+$/;

        function validar() {

            if (nombre.value == "") {
                alert("⚠ Ingrese el nombre");
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

            if (estado.value == "") {
                alert("⚠ Ingrese el estado");
                estado.focus();
                return false;
            }

            if (!expRegEstado.test(estado.value)) {
                alert("⚠ El estado debe contener solo letras minúsculas");
                estado.focus();
                return false;
            }

            if (
                estado.value != "pendiente" &&
                estado.value != "entregado" &&
                estado.value != "cancelado"
            ) {
                alert("⚠ El estado solo puede ser: pendiente, entregado o cancelado");
                estado.focus();
                return false;
            }

            return true;
        }
    </script>
</body>
</html>