<?php
require "bdVentas.php";

session_start();

if($_SESSION['CI']==null){
    header("location:../login.html");
    exit();
}else{
    if($_SESSION['Rol']=="administrador"){
        $CI = $_SESSION['CI'];
    }else{
        header("location:../login.html");
        exit();
    }
}

$ID = $_GET['ID'];

$sql = "DELETE FROM Ventas WHERE ID=$ID";

if ($conexion->query($sql) === TRUE) {
    $mensaje = "La venta ha sido eliminada correctamente.";
}else{
    $mensaje = "Error: " . $conexion->error;
}

$conexion->close();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Eliminar Venta</title>

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
            border-radius: 30px;

            color: #EFE2DA;

            text-align: center;

            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        h1{
            margin-top: 0;
            margin-bottom: 20px;

            font-size: 30px;

            color: #EFE2DA;
        }

        p{
            margin-bottom: 30px;

            font-size: 17px;
            color: #EFE2DA;
        }

        a{
            display: inline-block;

            padding: 12px 20px;

            border: none;
            border-radius: 10px;

            background-color: #E64B6B;
            color: #EFE2DA;

            text-decoration: none;

            font-size: 16px;

            transition: 0.3s;
        }

        a:hover{
            background-color: #EFE2DA;
            color: #6A253A;

            transform: translateY(-2px);
        }

        @media(max-width:600px){

            body{
                padding: 15px;
            }

            div{
                width: 100%;
                padding: 30px 20px;
                border-radius: 20px;
            }

            h1{
                font-size: 26px;
            }

            p{
                font-size: 15px;
            }

            a{
                width: 100%;
            }

        }

    </style>

</head>

<body>

    <div>

        <h1>Eliminar Venta</h1>

        <p><?= $mensaje ?></p>

        <a href="leerVentass.php">Volver a Ventas</a>

    </div>

</body>

</html>