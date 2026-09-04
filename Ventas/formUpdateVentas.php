<?php
session_start();
require "bdVentas.php";

if (!isset($_GET['ID'])) {
    die("No se recibió el ID de la venta.");
}

$ID = $_GET['ID'];

$sql = "SELECT * FROM Ventas WHERE Pedidos_ID='$ID'";
$resultado = $conexion->query($sql);

if (!$resultado) {
    die("Error en la consulta: " . $conexion->error);
}

if ($resultado->num_rows == 0) {
    die("No se encontró la venta con ID: " . $ID);
}

$fila = $resultado->fetch_assoc();

$ID = $fila['ID'];
$Pedidos_ID = $fila['Pedidos_ID'];
$Costototal = $fila['Costototal'];
$Estado = $fila['Estado'];
$Metodo = $fila['Metodo'];

if (isset($_SESSION['Nombre'])) {
    $NombreVendedor = $_SESSION['Nombre'];
} else {
    $NombreVendedor = '';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Venta</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

    <style>

        *{
            font-family: 'Chillax-Semibold';
            box-sizing: border-box;
        }

        body{
            background-image: url(../imagenes/2.png);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            display: flex;
            justify-content: center;
            align-items: center;

            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        div{
            width: 95%;
            max-width: 550px;

            padding: 40px;

            background-color: #6A253A;

            border: 2px solid #EFE2DA;
            border-radius: 30px;

            color: #EFE2DA;

            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        h1{
            text-align: center;

            margin-top: 0;
            margin-bottom: 30px;

            font-size: 32px;

            color: #EFE2DA;
        }

        form{
            width: 100%;
        }

        label{
            display: block;

            margin-bottom: 8px;

            color: #EFE2DA;

            font-size: 16px;
        }

        /* CAMPOS */

        input[type="text"]{
            width: 100%;

            padding: 12px 14px;

            border: 2px solid #E64B6B;
            border-radius: 10px;

            background-color: #FFFFFF;
            color: #6A253A;

            font-family: 'Chillax-Semibold';
            font-size: 15px;

            outline: none;

            transition: 0.3s;
        }

        /* EFECTO AL SELECCIONAR */

        input[type="text"]:focus{
            border-color: #EFE2DA;

            box-shadow: 0 0 8px rgba(239, 226, 218, 0.5);
        }



        input[readonly]{
            background-color: #FFFFFF;
            color: #6A253A;

            cursor: not-allowed;
        }

  

        input[type="submit"]{
            width: 100%;

            padding: 12px 20px;

            margin-top: 10px;

            border: none;
            border-radius: 10px;

            background-color: #E64B6B;
            color: #EFE2DA;

            font-family: 'Chillax-Semibold';
            font-size: 16px;

            cursor: pointer;

            transition: 0.3s;
        }

        input[type="submit"]:hover{
            background-color: #EFE2DA;
            color: #6A253A;

            transform: translateY(-2px);
            margin-top: 20px;
        }

        .volver{
    width: 100%;

    padding: 12px 20px;

    margin-top: 20px;

    border: none;
    border-radius: 10px;

    background-color: #E64B6B;
    color: #EFE2DA;

    font-family: 'Chillax-Semibold';
    font-size: 16px;

    cursor: pointer;

    transition: 0.3s;
}

        .volver:hover{
            background-color: #EFE2DA;
            color: #6A253A;

            transform: translateY(-2px);
        }

        /* QUITAR LOS SALTOS DE LÍNEA */

        br{
            display: none;
        }

        /* ESPACIO ENTRE CAMPOS */

        label:not(:first-of-type){
            margin-top: 20px;
        }

        /* RESPONSIVE */

        @media(max-width: 600px){

            body{
                padding: 15px;
            }

            div{
                width: 100%;

                padding: 25px 20px;

                border-radius: 20px;
            }

            h1{
                font-size: 27px;
            }

            input[type="text"]{
                font-size: 14px;
            }

            input[type="submit"],
            .volver{
                font-size: 15px;
            }

        }

    </style>

</head>

<body>

<div>

    <h1>Editar Venta</h1>

    <form action="updateVentas.php" method="post" onsubmit="return validar()">

        <input type="hidden" name="ID" value="<?= $ID ?>">
        <input type="hidden" name="Pedidos_ID" value="<?= $Pedidos_ID ?>">

        <label for="Costototal">Costo Total:</label>
        <input type="text" id="Costototal" name="Costototal"
               value="<?= $Costototal ?>" required>

        <br><br>

        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado"
               value="<?= $Estado ?>" required>

        <br><br>

        <label for="Metodo">Método:</label>
        <input type="text" id="Metodo" name="Metodo"
               value="<?= $Metodo ?>" required>

        <br><br>

        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor"
               value="<?= $NombreVendedor ?>" readonly>

        <br><br>

        <input type="submit" value="Editar">

    </form>

    <button class="volver" onclick="history.back()">
        ← Volver
    </button>

</div>
<script>
    var a= document.getElementById("ID");
    var b= document.getElementById("Costototal");
    var c= document.getElementById("Estado");
    var d= document.getElementById("Metodo");
    var e= document.getElementById("NombreVendedor");

    function validar() {
        if (ID.value == "") {
            alert("⚠ Ingrese el ID");
            codigo.focus();
            return false;
        }
        if (Costototal.value == "") {
            alert("⚠ Ingrese el costo");
            codigo.focus();
            return false;
        }
        if (Estado.value == "") {
            alert("⚠ Ingrese el código");
            codigo.focus();
            return false;
        }
        if (Metodo.value == "") {
            alert("⚠ Ingrese el código");
            codigo.focus();
            return false;
        }
        if (NombreVendedor.value == "") {
            alert("⚠ Ingrese el código");
            codigo.focus();
            return false;
        }
        return true;
    }
</script>

</body>
</html>