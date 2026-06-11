<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";   
 
$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$Nombre=$_POST['Nombre'];
$Fecha=$_POST['Fecha'];
$Estado=$_POST['Estado'];
$NombreVendedor=$_POST['NombreVendedor'];
    
           $sql="INSERT INTO Pedidos (Nombre, Fecha, Estado, NombreVendedor) VALUES ('$Nombre', '$Fecha', '$Estado', '$NombreVendedor')";
        if ($conexion->query($sql) === TRUE) {
            echo "Pedidos registrado correctamente";
        }
      ?>
