<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli(
    $direccion,
    $usuario,
    $contraseña,
    $baseDeDatos
);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

if (!isset($_GET['ID'])) {
    die("No se recibió el ID del pedido.");
}

$ID = $_GET['ID'];

$sql = "SELECT * FROM Pedidos WHERE ID='$ID'";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Mostrar Pedido</title>

    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">

    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>


<style>

/* ==========================
   ESTILO GENERAL
========================== */

*{
    font-family: 'Chillax-Semibold';
    box-sizing: border-box;
}


/* ==========================
   BODY
========================== */

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


/* ==========================
   CONTENEDOR
========================== */

.contenedor{

    width: 95%;

    max-width: 1200px;

    padding: 35px;

    background-color: #6A253A;

    border: 2px solid #EFE2DA;

    border-radius: 30px;

    color: #EFE2DA;

    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}


/* ==========================
   TITULO
========================== */

h2{

    text-align: center;

    margin-top: 0;

    margin-bottom: 25px;

    font-size: 32px;

    color: #EFE2DA;
}


/* ==========================
   TABLA
========================== */

table{

    width: 100%;

    border-collapse: collapse;

    overflow: hidden;

    border-radius: 15px;

    border: 1px solid rgba(239,226,218,0.3);
}


/* ==========================
   CELDAS
========================== */

td{

    padding: 14px;

    text-align: center;

    color: #EFE2DA;

    border-bottom: 1px solid rgba(239,226,218,0.2);

    background-color: rgba(255,255,255,0.04);
}


/* ==========================
   TITULO DE CADA DATO
========================== */

td.titulo{

    width: 30%;

    background-color: rgba(239,226,218,0.12);

    color: #EFE2DA;

    font-weight: bold;
}


/* ==========================
   HOVER DE FILAS
========================== */

tr{

    transition: 0.3s;
}


tr:hover td{

    background-color: rgba(239,226,218,0.10);
}


/* ==========================
   CELDA DE BOTONES
========================== */

td.acciones{

    padding: 20px;

    background-color: rgba(255,255,255,0.04);

    text-align: center;
}


/* ==========================
   ENLACES DE LOS BOTONES
========================== */

.acciones a{

    text-decoration: none;
}


/* ==========================
   BOTONES
========================== */

.volver{

    display: inline-block;

    padding: 12px 20px;

    margin: 5px;

    border: none;

    border-radius: 10px;

    background-color: #E64B6B;

    color: #EFE2DA;

    font-family: 'Chillax-Semibold';

    font-size: 16px;

    cursor: pointer;

    transition: 0.3s;

}


/* ==========================
   HOVER BOTONES
========================== */

.volver:hover{

    background-color: #EFE2DA;

    color: #6A253A;

    transform: translateY(-2px);
}


/* ==========================
   BOTON VOLVER ABAJO
========================== */

.boton-volver{

    display: block;

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


.boton-volver:hover{

    background-color: #EFE2DA;

    color: #6A253A;

    transform: translateY(-2px);
}


/* ==========================
   RESPONSIVE
========================== */

@media(max-width: 600px){

    body{

        padding: 15px;
    }


    .contenedor{

        width: 100%;

        padding: 25px 20px;

        border-radius: 20px;
    }


    h2{

        font-size: 27px;
    }


    td{

        padding: 11px 8px;

        font-size: 14px;
    }


    td.titulo{

        width: 35%;
    }


    .volver{

        display: block;

        width: 100%;

        margin: 7px 0;

        font-size: 14px;
    }

}

</style>

</head>


<body>


<div class="contenedor">


    <h2>Datos del Pedido</h2>


    <?php

    if ($resultado && $resultado->num_rows > 0) {

        $fila = $resultado->fetch_assoc();


        echo "<table>";


        /* ==========================
           NOMBRE
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Nombre</td>";

        echo "<td>" . $fila["Nombre"] . "</td>";

        echo "</tr>";


        /* ==========================
           FECHA
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Fecha</td>";

        echo "<td>" . $fila["Fecha"] . "</td>";

        echo "</tr>";


        /* ==========================
           CELULAR
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Celular</td>";

        echo "<td>" . $fila["Celular"] . "</td>";

        echo "</tr>";


        /* ==========================
           DIRECCION
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Dirección</td>";

        echo "<td>" . $fila["Direccion"] . "</td>";

        echo "</tr>";


        /* ==========================
           ESTADO
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Estado</td>";

        echo "<td>" . $fila["Estado"] . "</td>";

        echo "</tr>";


        /* ==========================
           VENDEDOR
        ========================== */

        echo "<tr>";

        echo "<td class='titulo'>Nombre del Vendedor</td>";

        echo "<td>" . $fila["NombreVendedor"] . "</td>";

        echo "</tr>";


        /* ==========================
           BOTONES
        ========================== */

        echo "<tr>";

        echo "<td colspan='2' class='acciones'>";


        echo "
        <a href='../Ventas/registroventas.php?ID=$ID'>
            <button class='volver'>
                Aceptar venta
            </button>
        </a>
        ";


        echo "
        <a href='EliminarPedidos.php?ID=$ID'>
            <button class='volver'>
                Rechazar Pedido
            </button>
        </a>
        ";


        echo "
        <a href='../Carrito/leerCarrito.php?ID=$ID'>
            <button class='volver'>
                Ver productos
            </button>
        </a>
        ";


        echo "</td>";

        echo "</tr>";


        echo "</table>";


    } else {

        echo "<p>No se encontró el pedido.</p>";

    }


    $conexion->close();

    ?>


    <!-- ==========================
         BOTON VOLVER
    ========================== -->

    <button
        class="boton-volver"
        onclick="history.back()"
    >
        ← Volver
    </button>


</div>


</body>

</html>