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
    header("location:login.php");
}else {
  if($_SESSION['Rol']=="administrador"){
    $CI = $_SESSION['CI'];
  } else{
    header("location:login.php");
  }
}

$CI = trim($_SESSION['CI']);

$stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE CI=?");
$stmt->bind_param("s", $CI);
$stmt->execute();
$resultadoe = $stmt->get_result();

$stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE CI=?");
$stmt->bind_param("s", $CI);
$stmt->execute();
$resultadop = $stmt->get_result();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

<link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
/* ==========================
   COLORES
   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
========================== */
* {
    box-sizing: border-box;
}

html,
body {
    width: 100%;
    max-width: 100%;
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

img {
    max-width: 100%;
    height: auto;
}


/* ==============================
   HEADER
============================== */

header {
    width: 100%;
    max-width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: nowrap;
}

.logo {
    flex-shrink: 0;
    white-space: nowrap;
}

.busqueda {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    min-width: 0;
    max-width: 700px;
}

.busqueda input {
    width: 100%;
    min-width: 0;
    max-width: 100%;
}

.busqueda button {
    flex-shrink: 0;
    white-space: nowrap;
}

#carritoIcono {
    flex-shrink: 0;
    white-space: nowrap;
}


/* ==============================
   CONTENIDO
============================== */

main {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    overflow-x: hidden;
}

#productosbusqueda,
#productos {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

#productosbusqueda > *,
#productos > * {
    min-width: 0;
    max-width: 100%;
}


/* ==============================
   CARRITO
============================== */

#sidebar {
    max-width: 100vw;
    min-width: 0;
}

#contenidoCarrito {
    width: 100%;
    max-width: 100%;
    min-width: 0;
    overflow-x: hidden;
    overflow-y: auto;
}

.sidebarHeader,
.sidebarFooter {
    max-width: 100%;
    min-width: 0;
}

.sidebarHeader h2,
.sidebarFooter h3 {
    max-width: 100%;
    overflow-wrap: break-word;
}


/* ==============================
   MODAL COMPRA
============================== */

#modalCompra {
    width: 100%;
    max-width: 100vw;
    padding: 20px;
    overflow-y: auto;
}

.modalContenido {
    width: min(520px, 95vw);
    max-width: 95vw;
    max-height: 90vh;
    overflow-x: hidden;
    overflow-y: auto;
}

#formCompra {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

#formCompra input,
#formCompra select {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

.botonesModal {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.botonesModal button {
    min-width: 0;
    max-width: 100%;
}


/* ==============================
   MODAL PRODUCTO
============================== */

#modalProducto {
    width: min(900px, 94vw);
    max-width: 94vw;
    max-height: 90vh;
    overflow-x: hidden;
    overflow-y: auto;
}

.productoDetalle {
    width: 100%;
    max-width: 100%;
    min-width: 0;
}

.productoDetalleImagen {
    min-width: 0;
    max-width: 100%;
}

.productoDetalleImagen img {
    display: block;
    width: 100%;
    max-width: 100%;
    height: auto;
}

.productoDetalleInfo {
    min-width: 0;
    max-width: 100%;
}

.productoDetalleInfo h2,
.productoDetalleInfo h3,
.productoDetalleInfo p {
    max-width: 100%;
    min-width: 0;
    overflow-wrap: break-word;
    word-wrap: break-word;
}

#detalleDescripcion {
    overflow-wrap: anywhere;
}


@media (max-width: 1000px) {

    header {
        flex-wrap: wrap;
        gap: 15px;
    }

    .busqueda {
        order: 3;
        width: 100%;
        max-width: 100%;
        flex-basis: 100%;
    }

}


@media (max-width: 768px) {

    header {
        padding-left: 4%;
        padding-right: 4%;
    }

    .logo {
        font-size: 20px;
    }

    #carritoIcono {
        font-size: 18px;
    }

    .busqueda {
        width: 100%;
        flex-basis: 100%;
    }

    .productoDetalle {
        display: flex;
        flex-direction: column;
        align-items: stretch;
        gap: 20px;
    }

    .productoDetalleImagen {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
    }

    .productoDetalleInfo {
        width: 100%;
        text-align: center;
    }

    #detalleDescripcion {
        text-align: left;
    }

    #detalleAgregar {
        max-width: 100%;
    }

    #sidebar {
        width: 90vw;
        max-width: 90vw;
    }

}

@media (max-width: 600px) {

    header {
        width: 100%;
        padding: 15px 4%;
        gap: 12px;
    }

    .logo {
        font-size: 18px;
    }

    #carritoIcono {
        font-size: 17px;
    }

    .busqueda {
        display: flex;
        flex-direction: column;
        width: 100%;
        gap: 8px;
    }

    .busqueda input,
    .busqueda button {
        width: 100%;
        max-width: 100%;
    }

    main {
        padding-left: 4%;
        padding-right: 4%;
    }

    #sidebar {
        width: 94vw;
        max-width: 94vw;
    }

    #modalCompra {
        padding: 10px;
    }

    .modalContenido {
        width: 94vw;
        max-width: 94vw;
        max-height: 92vh;
        padding: 20px 15px;
    }

    .botonesModal {
        flex-direction: column;
    }

    .botonesModal button {
        width: 100%;
        flex: none;
    }

    #modalProducto {
        width: 94vw;
        max-width: 94vw;
        max-height: 92vh;
        padding: 18px 15px;
    }

    .productoDetalleInfo h2 {
        font-size: 22px;
    }

    .productoDetalleInfo h3 {
        font-size: 19px;
    }

    .productoDetalleInfo p {
        font-size: 15px;
        line-height: 1.5;
    }

}

@media (max-width: 400px) {

    header {
        padding-left: 3%;
        padding-right: 3%;
    }

    .logo {
        font-size: 16px;
    }

    #carritoIcono {
        font-size: 15px;
    }

    main {
        padding-left: 3%;
        padding-right: 3%;
    }

    #sidebar {
        width: 96vw;
        max-width: 96vw;
    }

    #modalProducto,
    .modalContenido {
        width: 96vw;
        max-width: 96vw;
    }

    .modalContenido {
        padding: 17px 12px;
    }

    .productoDetalleInfo h2 {
        font-size: 20px;
    }

    .productoDetalleInfo h3 {
        font-size: 18px;
    }

    .productoDetalleInfo p {
        font-size: 14px;
    }

}


@media (max-width: 330px) {

    header {
        padding-left: 2%;
        padding-right: 2%;
    }

    .logo {
        font-size: 15px;
    }

    #carritoIcono {
        font-size: 14px;
    }

    main {
        padding-left: 2%;
        padding-right: 2%;
    }

    #modalProducto,
    .modalContenido {
        width: 98vw;
        max-width: 98vw;
    }

}
</style>
</head>
<body>
     <?php include("includes/navpro.php"); ?>
     <?php include("includes/header.php"); ?>
<main>
    <div class="panel">
        <h3>👥 Personal</h3>
        <?php include("includes/usuario.php"); ?><br><br>
        <a href="racha.php"><button> Reportes</button></a>
        <a href="Ventas/leerVentass.php"><button>Ver ventas</button></a><br>
    </div>
    <div class="foto-admin">
        <?php
        if ($resultadop->num_rows > 0) {
            while($fila = $resultadop->fetch_assoc()) {
             echo "<img src='".$fila["imagen"]."' width='300'>";
            }    
        } 
        ?>
    </div>
    <div class="panel">
        <h1>Datos Personales</h1>
    <?php
if ($resultadoe->num_rows > 0) {
    $fila = $resultadoe->fetch_assoc();
    echo "<table>";
    echo "<tr>";
    echo "<td class='titulo'>CI</td>";
    echo "<td>".$fila["CI"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Nombre</td>";
    echo "<td>".$fila["Nombre"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Dirección</td>";
    echo "<td>".$fila["Direccion"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Celular</td>";
    echo "<td>".$fila["Celular"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Rol</td>";
    echo "<td>".$fila["Rol"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Estado</td>";
    echo "<td>".$fila["Estado"]."</td>";
    echo "</tr>";

    echo "</table>";
} 
echo "<a href='Usuario/formUpdateUsuario.php?CI=".$fila["CI"]."'><button>Editar</button></a>"?> <br>
    </div>
</main>
     <?php include("includes/footer.php"); ?>
</body>
</html>