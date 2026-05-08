<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="MyMS";
 
$conn = new mysqli ($servername,$username,$password,$dbname);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Compra</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
  <style>
    *{
      font-family: 'Cinzel Decorative', serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body{
      background-color: #242424;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .mensaje{
      background: linear-gradient(to bottom, #ffffff, #3a3a3a);
      border: 5px solid #c59d5f;
      border-radius: 10px;
      padding: 40px;
      text-align: center;
      width: 550px;
      color: #1a1a1a;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
    }
    h2{
      border-bottom: 2px solid #c59d5f;
      margin-bottom: 20px;
      color: #3a3a3a;
      padding-bottom: 10px;
    }
    p{
      color: #1a1a1a;
      font-size: 18px;
      margin-bottom: 25px;
      line-height: 1.6;
    }
    a{
      text-decoration: none;
      background-color: #ffffff;
      color: #000000;
      padding: 10px 20px;
      border-radius: 4px;
      border: 2px solid #c59d5f;
      transition: 0.3s;
    }
    a:hover{
      background-color: #000000;
      color: #ffffff;
      box-shadow: 0 4px 10px #c59d5f;
    }
  </style>
</head>
<body>
  <div class="mensaje">
    <h2>Resultado de la Modificación</h2>
    <p>
      <?php
      if ($conn->connect_error){
          echo "Hubo un error:(";
      }
      $ci=$_POST['ci'];
      $telf=$_POST['telf'];
      $nombre=$_POST['nombre'];

      $sql="UPDATE CLIENTES SET ci='$ci',telf='$telf',nombre=$nombre ";
      if($conn->query($sql)=== TRUE){
          echo "Se actualizo la base de clientes.";
      }
      ?>
    </p>
    <a href="menu.html">Volver al menú</a>
  </div>
</body>
</html>
