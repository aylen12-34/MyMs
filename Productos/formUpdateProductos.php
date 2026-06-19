<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}

$Codigo=$_GET['Codigo'];
$sql = "SELECT * FROM Productos WHERE Codigo=$Codigo";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $Codigo=$fila['Codigo'];
        $Nombre=$fila['Nombre'];
        $Descripcion=$fila['Descripcion'];
        $Precio=$fila['Precio'];
        $Stock=$fila['Stock'];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <style>
    *{
        font-family: 'Chillax-Semibold';
    }
        body {
            background-image: url(../imagenes/2.png);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 0;
        }
        form {
            max-width: 400px;
        }



        label {
            display: block;
            margin-bottom: 5px;
            color: #EFE2DA;
        }



        
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 2.5px solid #E64B6B;
            border-radius: 10px;
        }



        input[type="submit"] {
            background-color: #E64B6B;
            color:#EFE2DA;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #EFE2DA;
            color:#E64B6B;
        }





        div {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
            color: #EFE2DA;
        }
        .volver{
        padding: 10px 20px;
        border: none;
        color: #EFE2DA;
        border-radius: 5px;
        background: #E64B6B;
        cursor: pointer;
        font-size: 16px;
        margin:3px;
        }

        .volver:hover{
            background-color: #EFE2DA;
            color: #E64B6B;
        }@media(max-width:800px){

  body{
    padding: 20px;
  }

  div{
    width: 100%;
    max-width: 320px;
    padding: 25px;
    border-radius: 25px;
  }

  h1{
    text-align: center;
    font-size: 28px;
  }

  form{
    width: 100%;
  }

  input{
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"],
  .volver{
    width: 100%;
    margin-top: 10px;
  }
}
    </style>
</head>
<body>
    <div>
        <h1>Editar Producto</h1>
    <form action="updateEditarProductos.php" method="post" onsubmit="return validar()">
        <label for="Codigo">Codigo:</label>
        <input type="number" id="Codigo" name="Codigo" value='<?=$Codigo?>' required>  <br>  <br>
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value='<?=$Nombre?>' required>  <br>  <br>
        <label for="Descripcion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion" value='<?=$Descripcion?>' required>  <br>  <br>
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio" value='<?=$Precio?>' required>  <br>  <br>
        <label for="Stock">Stock:</label>
        <input type="text" id="Stock" name="Stock" value='<?=$Stock?>' required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">Volver</button><br>
    </div>
    <script>
    var codigo = document.getElementById("Codigo");
    var nombre = document.getElementById("Nombre");
    var descripcion = document.getElementById("Descripcion");
    var precio = document.getElementById("Precio");
    var stock = document.getElementById("Stock");

    var expRegNombre = /^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;

    function validar() {

        if (codigo.value == "") {
            alert("⚠ Ingrese el código");
            codigo.focus();
            return false;
        }

        if (!/^\d+$/.test(codigo.value)) {
            alert("⚠ El código debe contener solo números");
            codigo.focus();
            return false;
        }

        if (nombre.value == "") {
            alert("⚠ Ingrese el nombre del producto");
            nombre.focus();
            return false;
        }

        if (nombre.value.length < 3) {
            alert("⚠ El nombre debe tener al menos 3 caracteres");
            nombre.focus();
            return false;
        }

        if (descripcion.value == "") {
            alert("⚠ Ingrese la descripción");
            descripcion.focus();
            return false;
        }

        if (precio.value == "") {
            alert("⚠ Ingrese el precio");
            precio.focus();
            return false;
        }

        if (!/^\d+(\.\d{1,2})?$/.test(precio.value)) {
            alert("⚠ El precio debe ser un número válido");
            precio.focus();
            return false;
        }

        if (stock.value == "") {
            alert("⚠ Ingrese el stock");
            stock.focus();
            return false;
        }

        if (!/^\d+$/.test(stock.value)) {
            alert("⚠ El stock debe contener solo números");
            stock.focus();
            return false;
        }

        return true;
    }
</script>
</body>
</html>