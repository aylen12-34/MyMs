<?php
session_start();
require "bdVentas.php";

if (!isset($_GET['ID'])) {
    die("No se recibió el ID de la venta.");
}

$ID = trim($_GET['ID']);

$stmt = $conexion->prepare(
    "SELECT * FROM ventas 
     JOIN pedidos ON ventas.Pedidos_ID = pedidos.ID 
     WHERE Pedidos_ID=?"
);

$stmt->bind_param("s", $ID);

$stmt->execute();

$resultado = $stmt->get_result();

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
$NombreVendedor = $fila['NombreVendedor'];
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Venta</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
    *{
        font-family: 'Chillax-Semibold';
    }
    
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

    <h1>Editar Venta</h1>

    <form action="updateVentas.php" method="post" onsubmit="return validar()">
        <input type="hidden" name="ID" value="<?= $ID ?>">
        <input type="hidden" name="Pedidos_ID" value="<?= $Pedidos_ID ?>">
        <label for="Costototal">Costo Total:</label>
        <input type="text" id="Costototal" name="Costototal" value="<?= $Costototal ?>" required minlength="1" maxlength="20"><br><br>
        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" value="<?= $Estado ?>" required minlength="3" maxlength="30" pattern="[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+"><br><br>
        <label for="Metodo">Método:</label>
        <input type="text" id="Metodo" name="Metodo" value="<?= $Metodo ?>" required minlength="3" maxlength="30" pattern="[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+"><br><br>
        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor" value="<?= $NombreVendedor ?>" readonly><br><br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">  ← Volver </button>
</div>
<script>
    function validar() {
        var costototal = document.getElementById("Costototal");
        var estado = document.getElementById("Estado");
        var metodo = document.getElementById("Metodo");

        if (costototal.value.trim() === "") {
            Swal.fire({
                title: 'Alerta',
                background: '#e65c78',
                color: '#EFE2DA',
                imageUrl: '../imagenes/gatoventa.png',
                imageHeight: 150,
                imageAlt: 'Icono personalizado',
                confirmButtonText: 'OK',
                confirmButtonColor: '#6A253A',
                text: '⚠ Ingrese el costo total ⚠',
   didOpen: () => {
        const audio = new Audio('../imagenes/gatoventa.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
            costototal.focus();
            return false;
        }
        if (estado.value.trim() === "") {
            Swal.fire({
                title: 'Alerta',
                background: '#e65c78',
                color: '#EFE2DA',
                imageUrl: '../imagenes/gatoventa.png',
                imageHeight: 150,
                imageAlt: 'Icono personalizado',
                confirmButtonText: 'OK',
                confirmButtonColor: '#6A253A',
                text: '⚠ Ingrese el estado ⚠',
    didOpen: () => {
        const audio = new Audio('../imagenes/gatoventa.mp3');
        const imagenSwal = Swal.getImage();
        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
            estado.focus();
            return false;
        }
        if (metodo.value.trim() === "") {
            Swal.fire({
                title: 'Alerta',
                background: '#e65c78',
                color: '#EFE2DA',
                imageUrl: '../imagenes/gatoventa.png',
                imageHeight: 150,
                imageAlt: 'Icono personalizado',
                confirmButtonText: 'OK',
                confirmButtonColor: '#6A253A',
                text: '⚠ Ingrese el método ⚠',
    didOpen: () => {
        const audio = new Audio('../imagenes/gatoventa.mp3');
        const imagenSwal = Swal.getImage();

        if (imagenSwal) {
            imagenSwal.style.cursor = 'pointer';
            imagenSwal.addEventListener('click', () => {
                audio.currentTime = 0;
                audio.play();
            });
        }
    }
});
            metodo.focus();
            return false;
        }

        return true;}
</script>

</body>
</html>