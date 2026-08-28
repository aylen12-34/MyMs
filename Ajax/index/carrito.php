<?php

session_start();
require("conexion.php");

header("Content-Type: application/json");

if(!isset($_SESSION["pedidos"])){
    echo json_encode([
        "ok"=>false,
        "mensaje"=>"No existe pedido activo"
    ]);
    exit;
}

$idPedido = $_SESSION["pedidos"];

$accion = isset($_POST["accion"]) ? $_POST["accion"] : 0;

switch($accion){

    case "agregar":

        $codigo = $_POST["codigo"];

        // Buscar producto
        $sqlProducto = "SELECT * FROM productos WHERE Codigo='$codigo'";
        $resultadoProducto = $conn->query($sqlProducto);
        if($resultadoProducto->num_rows == 0){

    echo json_encode([
        "ok"=>false,
        "mensaje"=>"Producto no encontrado"
    ]);

    exit;

}
        $producto = $resultadoProducto->fetch_assoc();

        // Verificar si ya existe
        $sqlExiste = "SELECT * FROM carrito
                       WHERE Pedidos_ID='$idPedido'
                       AND Productos_Codigo='$codigo'";

        $resultadoExiste = $conn->query($sqlExiste);

        if($resultadoExiste->num_rows > 0){

            $fila = $resultadoExiste->fetch_assoc();

            $cantidad = $fila["Cantidad"] + 1;

            $subtotal = $cantidad * $producto["Precio"];

            $sql = "UPDATE carrito
                    SET Cantidad='$cantidad',
                        CostoTotal='$subtotal'
                    WHERE Pedidos_ID='$idPedido'
                    AND Productos_Codigo='$codigo'";

        }else{

            $subtotal = $producto["Precio"];

            $sql = "INSERT INTO carrito
                    (Pedidos_ID,Productos_Codigo,Cantidad,CostoTotal)
                    VALUES
                    ('$idPedido','$codigo',1,'$subtotal')";

        }

        if($conn->query($sql)){

    echo json_encode([
        "ok"=>true,
        "mensaje"=>"Producto agregado correctamente"
    ]);

}else{

    echo json_encode([
        "ok"=>false,
        "mensaje"=>$conn->error
    ]);

}

    break;
    case "mostrar":

    $sql = "SELECT
                c.Productos_Codigo,
                c.Cantidad,
                c.CostoTotal,
                p.Nombre,
                p.Precio,
                p.imagen
            FROM carrito c
            INNER JOIN productos p
            ON c.Productos_Codigo = p.Codigo
            WHERE c.Pedidos_ID='$idPedido'";

    $resultado = $conn->query($sql);
    
    $carrito = [];

    while($fila = $resultado->fetch_assoc()){

        $carrito[] = $fila;

    }
    
    echo json_encode($carrito);

break;
case "vaciar":

    $sql = "DELETE FROM carrito
            WHERE Pedidos_ID='$idPedido'";

    if($conn->query($sql)){

        echo json_encode([
            "ok"=>true,
            "mensaje"=>"Carrito vaciado correctamente"
        ]);

    }else{

        echo json_encode([
            "ok"=>false,
            "mensaje"=>$conn->error
        ]);

    }

break;

}
