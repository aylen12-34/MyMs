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

$idPedido = trim($_SESSION["pedidos"]);

$accion = isset($_POST["accion"])
    ? trim($_POST["accion"])
    : "";


switch($accion){

    case "agregar":

        $codigo = trim($_POST["codigo"]);


        $stmt = $conn->prepare(
            "SELECT * 
             FROM productos 
             WHERE Codigo=?"
        );

        $stmt->bind_param(
            "s",
            $codigo
        );

        $stmt->execute();

        $resultadoProducto =
            $stmt->get_result();


        if($resultadoProducto->num_rows == 0){

            echo json_encode([
                "ok"=>false,
                "mensaje"=>"Producto no encontrado"
            ]);

            exit;

        }


        $producto =
            $resultadoProducto->fetch_assoc();


        $stmt = $conn->prepare(
            "SELECT * 
             FROM carrito
             WHERE Pedidos_ID=?
             AND Productos_Codigo=?"
        );

        $stmt->bind_param(
            "ss",
            $idPedido,
            $codigo
        );

        $stmt->execute();

        $resultadoExiste =
            $stmt->get_result();


        if($resultadoExiste->num_rows > 0){

            $fila =
                $resultadoExiste->fetch_assoc();

            $cantidad =
                $fila["Cantidad"] + 1;

            $subtotal =
                $cantidad * $producto["Precio"];


            $stmt = $conn->prepare(
                "UPDATE carrito
                 SET Cantidad=?,
                     CostoTotal=?
                 WHERE Pedidos_ID=?
                 AND Productos_Codigo=?"
            );

            $stmt->bind_param(
                "ssss",
                $cantidad,
                $subtotal,
                $idPedido,
                $codigo
            );

        }else{

            $subtotal =
                $producto["Precio"];


            $cantidad = 1;


            $stmt = $conn->prepare(
                "INSERT INTO carrito
                (Pedidos_ID, Productos_Codigo, Cantidad, CostoTotal)
                VALUES (?, ?, ?, ?)"
            );

            $stmt->bind_param(
                "ssss",
                $idPedido,
                $codigo,
                $cantidad,
                $subtotal
            );

        }


        if($stmt->execute()){

            echo json_encode([
                "ok"=>true,
                "mensaje"=>"Producto agregado correctamente"
            ]);

        }else{

            echo json_encode([
                "ok"=>false,
                "mensaje"=>$stmt->error
            ]);

        }

    break;


    case "mostrar":


        $stmt = $conn->prepare(
            "SELECT
                c.Productos_Codigo,
                c.Cantidad,
                c.CostoTotal,
                p.Nombre,
                p.Precio,
                p.imagen
             FROM carrito c
             INNER JOIN productos p
             ON c.Productos_Codigo = p.Codigo
             WHERE c.Pedidos_ID=?"
        );


        $stmt->bind_param(
            "s",
            $idPedido
        );


        $stmt->execute();


        $resultado =
            $stmt->get_result();


        $carrito = [];


        while($fila =
            $resultado->fetch_assoc()){

            $carrito[] = $fila;

        }


        echo json_encode($carrito);

    break;


    case "vaciar":


        $stmt = $conn->prepare(
            "DELETE FROM carrito
             WHERE Pedidos_ID=?"
        );


        $stmt->bind_param(
            "s",
            $idPedido
        );


        if($stmt->execute()){

            echo json_encode([
                "ok"=>true,
                "mensaje"=>"Carrito vaciado correctamente"
            ]);

        }else{

            echo json_encode([
                "ok"=>false,
                "mensaje"=>$stmt->error
            ]);

        }

    break;

}
?>