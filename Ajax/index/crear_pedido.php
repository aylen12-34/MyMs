
<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

session_start();


require("conexion.php");

header("Content-Type: application/json");


$datos=json_decode(
file_get_contents("php://input"),
true
);


if(!$datos){

    echo json_encode([
        "ok"=>false,
        "mensaje"=>"No se recibieron datos"
    ]);

    exit;

}


$nombre=$datos["Nombre"];
$telefono=$datos["Celular"];
$direccion=$datos["Direccion"];
$metodo=$datos["Metodo"];



$stmt=$conn->prepare("

INSERT INTO pedidos
(
Nombre,
Fecha,
Estado,
Celular,
Direccion,
Metodo
)

VALUES
(
?,
NOW(),
'Activo',
?,
?,
?
)

");


$stmt->bind_param(
"ssss",
$nombre,
$telefono,
$direccion,
$metodo
);

if($stmt->execute()){

    $idPedido=$conn->insert_id;

    $_SESSION["pedido"]=$idPedido;

    echo json_encode([
        "ok"=>true,
        "pedido"=>$idPedido,
        "sesion"=>$_SESSION["pedido"]
    ]);

}else{

    echo json_encode([
        "ok"=>false,
        "mensaje"=>$stmt->error,
        "mysql"=>$conn->error
    ]);

}


$stmt->close();
$conn->close();

?>