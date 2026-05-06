<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}

$sql = "SELECT * FROM Usuarios";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo "Nombre: " . $fila["Nombre"] . " - Dirección: " . $fila["Direccion"] . " - Celular: " . $fila["Celular"] . " - Rol: " . $fila["Rol"] . " - Estado: " . $fila["Estado"] . "<br>";
    }
} else {
    echo "No se encontraron usuarios.";
}
?>