<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Consultar Pedido</title>

<link rel="stylesheet" href="css/estilos.css">

</head>


<body>


<h2 id="tituloPedido">
Consultar Pedido
</h2>


<div id="formularioPedido">


<label>
Número de pedido:
</label>


<input 
type="number"
id="numeroPedido"
placeholder="Ejemplo: 44"
required
minlength="1"
maxlength="10"
>


<button id="consultar">

Consultar Estado

</button>


<div id="resultado">

</div>


</div>



<script src="../js/consultar.js"></script>


</body>

</html>