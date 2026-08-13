<?php
require "bdVentas.php";
/*
$ID = "";
$CostoTotal = "";

if (isset($_GET['ID'])) {
    $ID = $_GET['ID'];

    $sql = "SELECT * FROM carrito WHERE ID='$ID'";
    $resultado = $conexion->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $CostoTotal = $fila['CostoTotal'];
    }
}*/
$Pedidos_ID=$_GET['Pedidos_ID'];
$sql = "SELECT * FROM carrito WHERE Pedidos_ID='$Pedidos_ID'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $CostoTotal=$fila['CostoTotal'];
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Ventas</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
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
input[type="number"],
input[type="text"],
select{
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
input[type="number"]:focus,
input[type="text"]:focus,
select:focus{
    border-color: #EFE2DA;
    box-shadow: 0 0 8px rgba(239, 226, 218, 0.5);
}

/* CAMPOS SOLO LECTURA */
input[readonly]{
    background-color: #FFFFFF;
    color: #6A253A;
    cursor: not-allowed;
}

/* SELECT */
select{
    background-color: #FFFFFF;
    color: #6A253A;
    cursor: pointer;
}

select option{
    background-color: #FFFFFF;
    color: #6A253A;
}

/* BOTÓN REGISTRAR */
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
}

/* ESPACIADO ENTRE CAMPOS */
br{
    display: none;
}

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

    input[type="number"],
    input[type="text"],
    select{
        font-size: 14px;
    }

    input[type="submit"]{
        font-size: 15px;
    }
}
</style>
</head>

<body>

    <div>
        <h1>Registro de Ventas</h1>

        <form action="registroventas.php" method="post">

            <label for="Pedidos_ID">ID del Pedido:</label>
            <input type="number" id="ID" name="Pedidos_ID" value="<?= $Pedidos_ID ?>" readonly>

            <br><br>

            <label for="Costototal">Costo Total:</label>
            <input type="number" id="Costototal" name="Costototal" value="<?= $CostoTotal ?>" readonly>

            <br><br>

            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado" value="Pendiente" readonly>

            <br><br>

            <label for="Metodo">Método de Pago:</label>
            <select name="Metodo" id="Metodo" required>
                <option value="">Seleccione un método de pago</option>
                <option value="Efectivo">Efectivo</option>
                <option value="QR">QR</option>
            </select>

            <br><br>

            <input type="submit" value="Registrar Ventas">

        </form>
    </div>

</body>
</html>