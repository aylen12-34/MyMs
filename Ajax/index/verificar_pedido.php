<?php
session_start();
header("Content-Type: application/json");
if(isset($_SESSION["pedidos"])){


echo json_encode([

"pedidoActivo"=>true,
"pedido"=>$_SESSION["pedidos"]

]);


}else{


echo json_encode([

"pedidoActivo"=>false

]);


}

?>