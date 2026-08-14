<?php

session_start();

require("conexion.php");

header("Content-Type: application/json");


if(!isset($_SESSION["pedidos"])){

    echo json_encode([
        "ok"=>false,
        "mensaje"=>"No existe pedido"
    ]);

    exit;

}


$idPedido=$_SESSION["pedidos"];


$sql="
UPDATE pedidos
SET Estado='Pendiente'
WHERE Pedidos_ID='$idPedido'
";


if($conn->query($sql)){


    echo json_encode([

        "ok"=>true,
        "pedidos"=>$idPedido

    ]);


}else{


    echo json_encode([

        "ok"=>false,
        "mensaje"=>$conn->error

    ]);


}


?>