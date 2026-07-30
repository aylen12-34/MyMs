<?php
//no funciona aun

include "bdProductos.php";


$sql="SELECT * FROM producto";


$resultado=mysqli_query($conn,$sql);


$productos=[];


while($fila=mysqli_fetch_assoc($resultado)){

    $productos[]=$fila;

}


echo json_encode($productos);


?>