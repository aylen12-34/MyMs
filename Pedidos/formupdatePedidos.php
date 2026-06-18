<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
session_start();
if($_SESSION['CI']==null){
    header("location:../login.html");
}else {
  if($_SESSION['Rol']=="vendedor"){
    $CI = $_SESSION['CI'];
    $NombreVendedor= $_SESSION['Nombre'];
  } else{
    header("location:../login.html");
  }
}
$ID=$_GET['ID'];
$sql = "SELECT * FROM Pedidos WHERE ID='$ID'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $ID=$fila['ID'];
        $Nombre=$fila['Nombre'];
        $Fecha=$fila['Fecha'];
        $Estado=$fila['Estado'];
        $NombreVendedor=$_SESSION['Nombre'];
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
label.error{
    display:none !important;
}
    </style>
</head>
<body>
    <div>
        <h1>Editar Pedido</h1>
    <form action="updatePedidos.php" method="post">
        <input type="hidden" name="ID" value="<?=$ID?>">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" value='<?=$Nombre?>' required>  <br>  <br>
        <label for="Fecha">Fecha:</label>
        <input type="date" id="Fecha" name="Fecha" value='<?=$Fecha?>' required>  <br>  <br>
        <label for="Estado">Estado:</label>
        <input type="text" id="Estado" name="Estado" value='<?=$Estado?>' required>  <br>  <br>
        <label for="NombreVendedor">Nombre del Vendedor:</label>
        <input type="text" id="NombreVendedor" name="NombreVendedor" value='<?=$NombreVendedor?>' required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">← Volver</button><br>
    </div>
</body>
</html>