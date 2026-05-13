<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "No se ha podido conectar a la base de datos";
}
$CI=$_GET['CI'];
$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo  "CI: ".$fila["CI"]."<br>"."Nombre: ".$fila["Nombre"] ."<br>"."Dirección: " . $fila["Direccion"] ."<br>"."Celular: " . $fila["Celular"] ."<br>"."Rol: " . $fila["Rol"] ."<br>"."Estado: " . $fila["Estado"]. "<br>";
    }
} else {
    echo "No se encontraron usuarios.";
}
?>