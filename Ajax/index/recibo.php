
<?php
require "../../Ventas/bdVentas.php";




$Pedidos_ID=$_POST['Pedidos_ID'];
$Metodo=$_POST['Metodo'];

$sql="SELECT * FROM carrito JOIN pedidos ON carrito.Pedidos_ID=pedidos.ID WHERE carrito.Pedidos_ID='$Pedidos_ID'";


$resultado=$conexion->query($sql);


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
<?php echo $Metodo; ?>
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


$sqlProductos=" SELECT * FROM carrito c JOIN productos p ON c.Productos_Codigo=p.Codigo WHERE c.Pedidos_ID='$Pedidos_ID' ";


$resultadoProductos=$conexion->query($sqlProductos);


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
<button id="volverProductos"> <a href="../../Carrito/leerCarritos.php?Pedidos_ID=<?=$Pedidos_ID?>">Volver a Productos </a> </button>

<script>

document
.getElementById("volverProductos")
.addEventListener("click",()=>{

    fetch("php/nueva_compra.php")

    .then(res=>res.json())

    .then(data=>{

        if(data.ok){

            window.location.href="index.php";

        }

    });

});

</script>


</body>

</html>