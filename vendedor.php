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
} else {
  if($_SESSION['Rol']=="vendedor"){
    $CI = $_SESSION['CI'];
  } else{
    header("location:login.html");
  }
}



$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

<link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* ==========================
   FUENTE Y RESET
========================== */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Chillax-Semibold';
}

/* ==========================
   COLORES

   Morado: #6A253A
   Rosado: #E64B6B
   Crema : #EFE2DA
========================== */

body{

    display:grid;

    grid-template-areas:
    "header"
    "main"
    "footer";

    grid-template-rows:350px auto 200px;

    min-height:100vh;
}

/* ==========================
   MAIN
========================== */

main{

    grid-area:main;

    background-image:url("imagenes/2.png");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;

    padding:50px;

    display:grid;
    grid-template-columns:1fr 320px 1fr;
    gap:30px;

    align-items:start;
}

/* ==========================
   TARJETAS
========================== */

.panel{

    background:rgba(239,226,218,.92);

    backdrop-filter:blur(5px);
    -webkit-backdrop-filter:blur(5px);

    padding:25px;

    border-radius:20px;

    box-shadow:0 8px 25px rgba(0,0,0,.15);
}

.foto{

    background:rgba(239,226,218,.92);

    backdrop-filter:blur(5px);
    -webkit-backdrop-filter:blur(5px);

    padding:20px;

    border-radius:20px;

    text-align:center;

    box-shadow:0 8px 25px rgba(0,0,0,.15);
}

/* ==========================
   TITULOS
========================== */

main h1{
    color:#6A253A;
    margin-bottom:20px;
}

main h3{
    color:#6A253A;
    margin-bottom:15px;
}

/* ==========================
   BOTONES
========================== */

main button{

    width:100%;

    margin-bottom:12px;

    padding:14px;

    border:none;
    border-radius:12px;

    background:#E64B6B;

    color:white;

    font-size:16px;

    cursor:pointer;

    transition:.3s;
}

main button:hover{

    transform:translateY(-3px);

    background:#c73b58;

    box-shadow:0 5px 15px rgba(0,0,0,.2);
}

button a{

    color:white;

    text-decoration:none;

    display:block;

    width:100%;
}

/* ==========================
   FOTO PERFIL
========================== */

.foto img{

    width:100%;

    max-width:260px;

    height:260px;

    object-fit:cover;

    border-radius:20px;

    box-shadow:0 5px 20px rgba(0,0,0,.2);
}

/* ==========================
   TABLA
========================== */

table{

    width:100%;

    border-collapse:collapse;
}

table td{

    padding:12px;
}

table tr{

    border-bottom:1px solid rgba(106,37,58,.2);
}

.titulo{

    font-weight:bold;

    color:#6A253A;
}

table td:last-child{

    color:#444;
}

/* ==========================
   TEXTO GENERAL
========================== */

main p{

    color:#444;

    line-height:1.6;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:1000px){

    body{

        grid-template-rows:
        250px
        auto
        150px;
    }

    main{

        grid-template-columns:1fr;

        padding:25px;
    }

    .foto{

        order:-1;
    }

    .foto img{

        max-width:220px;

        height:220px;
    }

    main h1{

        text-align:center;
    }

    main h3{

        text-align:center;
    }
}

@media(max-width:600px){

    main{

        padding:15px;
    }

    .panel,
    .foto{

        padding:18px;
    }

    main button{

        padding:12px;

        font-size:15px;
    }

    table td{

        padding:10px;
        font-size:14px;
    }
}
    </style>
</head>
<body>

<?php include("includes/nav.php"); ?>

<?php include("includes/header.php"); ?>

<main>
    <div class="panel">

        <h1>📦 Registros</h1>

        <h3>Inventario de productos</h3>

        <button>
            <a href="Productos/readleeProductos.php">
                Productos disponibles
            </a>
        </button>

        <button>
            <a href="Pedidos/leerPedidos.php">
                Pedidos registrados
            </a>
        </button>
        

    </div>
    <div class="foto">

        <?php

        switch($_SESSION['CI']){

            case "123":
                echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn57_OKTIjVTsTFKw2m-3dWGAMdiJSoCmK3-oSSVj7Ug&s" alt="Perfil">';
                break;

            case "234":
                echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2m2goQVl8DK0LnYv6B_CT0IKIbqRb2jqTv0yEukN4DWb4ZEt6j80pS8mX&s=10" alt="Perfil">';
                break;

            case "321":
                echo '<img src="https://www.nutrisslovers.com/Portals/nutrisslovers/Articulos%20Nutriss%20Gatos/gatos-unicos-guia-de-razas-y-como-nutrir-su-mundo/cuales-son-las-razas-de-gatos-mas-populares-en-colombia.jpg?ver=T9w4YcvobP-L1GXta8uTAA%3D%3D" alt="Perfil">';
                break;

            default:
                echo '<img src="imagenes/perfil.png" alt="Perfil">';
        }

        ?>

    </div>
    <div class="panel">

        <h1>Datos Personales</h1>

        <?php

        if($resultado->num_rows > 0){

            $fila = $resultado->fetch_assoc();

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

        ?>

    </div>

</main>

<?php include("includes/footer.php"); ?>

</body>
</html>