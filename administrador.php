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

$CI = $_SESSION['CI'];

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
   COLORES
   morado: #6A253A
   rosado: #E64B6B
   crema:  #EFE2DA
========================== */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Chillax-Semibold';
}

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
    grid-area: main;

    background-image: url("imagenes/2.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;

    padding: 50px;

    display: grid;
    grid-template-columns: 1fr 350px 1fr;
    gap: 30px;

    align-items: start;
}

/* Tarjetas */

.panel{
    background: rgba(239, 226, 218, 0.92);
   

    border-radius: 20px;
    padding: 25px;

    box-shadow: 0 8px 25px rgba(0,0,0,.15);
}

/* Títulos */

main h1,
main h3{
    color:#6A253A;
    margin-bottom:15px;
}

/* Botones */

main button{
    width:100%;
    margin-bottom:12px;

    border:none;
    border-radius:12px;

    padding:14px;

    background:#E64B6B;
    color:white;

    font-size:16px;
    transition:.3s;
    cursor:pointer;
}

main button:hover{
    transform:translateY(-3px);
    background:#c73b58;
    box-shadow:0 5px 15px rgba(0,0,0,.2);
}

button a{
    text-decoration:none;
    color:white;
    display:block;
    width:100%;
}

.foto-admin{
    background: rgba(239, 226, 218, 0.92);

    border-radius:20px;
    padding:20px;

    text-align:center;

    box-shadow:0 8px 25px rgba(0,0,0,.15);
}

#yo{
    width:100%;
    max-width:280px;

    border-radius:20px;

    object-fit:cover;

    box-shadow:0 5px 20px rgba(0,0,0,.2);
}
table{
    width:100%;
    border-collapse:collapse;
}

table tr{
    border-bottom:1px solid rgba(106,37,58,.2);
}

table td{
    padding:12px;
}

.titulo{
    font-weight:bold;
    color:#6A253A;
}

table td:last-child{
    color:#444;
}

@media(max-width:1000px){

    main{
        grid-template-columns:1fr;
    }

    .foto-admin{
        order:-1;
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

        <?php include("includes/leerUsuarios.php"); ?>

        <button>
            Reportes
        </button>

    </div>

    <div class="foto-admin">

        <img id="yo"
        src="https://images.mubicdn.net/images/cast_member/281456/cache-179563-1559374083/image-w856.jpg"
        alt="Administrador">

    </div>

    <div class="panel">

        <h1>Datos Personales</h1>
    <?php

if ($resultado->num_rows > 0) {

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

} ?>

    </div>

</main>
     <?php include("includes/footer.php"); ?>
</body>
</html>