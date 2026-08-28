<?php
    $direccion = "localhost";
    $usuario = "root";
    $contraseña = "";
    $nombreBase = "MyMs";

    $conexion = new mysqli($direccion, $usuario, $contraseña, $nombreBase);
    if ($conexion->connect_error) {
        echo "Hubo un error al conectar a la base de datos";
    }
      $CI = $_GET['CI'];
session_start();
$CIU=$_SESSION['CI'];

    $sql = "UPDATE usuarios SET Estado='Activo' WHERE CI='$CI'";

    if ($conexion->query($sql) === TRUE) {
        header("location: ../administrador.php?CI=".$CIU);
    }
    else {
        echo "Error al editar: " . $conexion->error;
    }
?>
