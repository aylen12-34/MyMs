<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$CI=$_POST['CI'];
$Nombre=$_POST['Nombre'];
$sql = "SELECT * FROM Usuarios WHERE CI='$CI' AND Nombre='$Nombre'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        session_start();
        $_SESSION['CI']=$fila['CI'];
        $_SESSION['Nombre']=$fila['Nombre'];
        header("location:vendedor.php?CI=".$fila['CI']);
    }
}
?>