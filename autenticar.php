<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "No se ha podido conectar a la base de datos";
}

$CI = trim($_REQUEST['CI']);
$Nombre = trim($_POST['Nombre']);

$stmt = $conexion->prepare(
    "SELECT * FROM Usuarios WHERE CI=? AND Nombre=?"
);

$stmt->bind_param(
    "ss",
    $CI,
    $Nombre
);

$stmt->execute();

$resultado = $stmt->get_result();
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        session_start();
        $_SESSION['CI']=$fila['CI'];
        $_SESSION['Nombre']=$fila['Nombre'];
        $_SESSION['Rol']=$fila['Rol'];
        if($_SESSION['Rol']=="vendedor"){
            header("location:vendedor.php?CI=".$fila['CI']);
        }else{
            header("location:administrador.php?CI=".$fila['CI']);
        }
    }
}else{
   echo "<script>
        alert('❌ Usuario o contraseña incorrectos');
        window.location.href='login.php';
    </script>";
}
?>