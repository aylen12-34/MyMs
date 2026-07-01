<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

$CI = $_GET['CI'];

$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Usuario</title>
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
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

div{
    width: 95%;
    max-width: 1200px;
    padding: 35px;
    background-color: #6A253A;
    border: 2px solid #EFE2DA;
    border-radius: 30px;
    color: #EFE2DA;
}

h2{
    text-align: center;
    margin-bottom: 25px;
    font-size: 32px;
}

table{
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 15px;
}

th{
    background-color: #E64B6B;
    color: #EFE2DA;
    padding: 14px;
    font-size: 15px;
}

td{
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid rgba(239, 226, 218, 0.2);
    color: #EFE2DA;
}

tr{
    background-color: rgba(255,255,255,0.04);
    transition: 0.3s;
}

tr:hover{
    background-color: rgba(230, 75, 107, 0.25);
}

button{
    padding: 8px 14px;
    margin: 3px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
    color: #EFE2DA;
}
#id{
            background-color: #E64B6B;
            color: #EFE2DA;
            transition: 0.3s;
        }
        #id:hover{
            background-color: #EFE2DA;
            color: #6A253A;
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
</style>
</head>
<body>

<div>

<h2>Datos del Usuario</h2>

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

} else {

    echo "No se encontraron usuarios.";

}

$conexion->close();

?>
<button class="volver" onclick="history.back()">← Volver</button><br>
</div>

</body>
</html>