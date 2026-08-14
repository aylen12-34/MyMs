<?php

session_start();

require("conexion.php");





if(!isset($_SESSION["pedidos"])){

    echo "No existe pedido activo";

    exit;

}


$id=$_SESSION["pedidos"];



$sql="
SELECT *
FROM pedidos
WHERE ID='$id'
";


$resultado=$conn->query($sql);


$pedido=$resultado->fetch_assoc();

?>


<!DOCTYPE html>
<html>

<head>

<title>Recibo</title>


<link rel="stylesheet" href="css/ticket.css">


</head>


<body>


<h1>MI TIENDA</h1>


<h2>
Recibo de Pedido
</h2>


<p>
Número:
<?php echo $pedido["Pedidos_ID"]; ?>
</p>


<p>
Cliente:
<?php echo $pedido["Nombre"]; ?>
</p>


<p>
Teléfono:
<?php echo $pedido["Celular"]; ?>
</p>


<p>
Dirección:
<?php echo $pedido["Direccion"]; ?>
</p>


<p>
Método de pago:
<?php echo $pedido["Metodo"]; ?>
</p>


<p>
Estado:
<?php echo $pedido["Estado"]; ?>
</p>


<hr>


<h3>
Productos
</h3>


<?php


$sqlProductos="

SELECT 
p.Nombre,
c.Cantidad,
c.CostoTotal

FROM carrito c

INNER JOIN productos p

ON c.Productos_Codigo=p.Codigo

WHERE c.Pedidos_ID='$id'

";


$resultadoProductos=$conn->query($sqlProductos);


$total=0;


while($producto=$resultadoProductos->fetch_assoc()){


$total += $producto["CostoTotal"];


echo "

<p>
".$producto["Nombre"]."
<br>
Cantidad: ".$producto["Cantidad"]."
<br>
Subtotal: Bs ".$producto["CostoTotal"]."
</p>

";


}


?>


<h2>
Total: Bs <?php echo $total; ?>
</h2>


<h3>
Esperando aprobación del vendedor
</h3>
<button onclick="window.print()">
    

🖨 Imprimir

</button>
<button id="volverProductos">

Volver a Productos

</button>

<script>

document
.getElementById("volverProductos")
.addEventListener("click",()=>{

    fetch("nueva_compra.php")

    .then(res=>res.json())

    .then(data=>{

        if(data.ok){

            window.location.href="index1.php";

        }

    });

});

</script>


</body>

</html>