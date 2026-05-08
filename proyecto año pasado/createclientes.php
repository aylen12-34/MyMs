<?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="MyMS";
 
$conn = new mysqli ($servername,$username,$password,$dbname);

if ($conn->connect_error){
    die ( "conexion fallida:". $conn->connect_error);
}
$ci = $_POST['ci'];
$telf = $_POST['telf'];
$nombre  = $_POST['nombre'];
$sql = "INSERT INTO CLIENTES(ci,telf,nombre) VALUES ('$ci','$telf','$nombre' )";

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
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
      width: 500px;
      height: 250px;
      color: #1a1a1a;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      animation: aparecer 0.8s ease-out;
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
    <h2> REGISTER </h2>
    <p>
      <?php 
       if ($conn->query($sql) === TRUE){
    echo "Cliente Registrado";
} else {
    echo "ERROR:". $sql . "<br>" . $conn->error;
}

$conn->close();
      ?>
      <br><br><br>
      <a href="readclientes.php">Ver tabla de registro</a>
    </p>
  </div>
</body>
</html>
