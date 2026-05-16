<?php
$servername = "localhost";
$username = "root";
$password = "";
$bdname = "MYMS";

$conexion = new mysqli($servername, $username,$password,$bdname);

if($conexion -> connect_error){
    echo "Hubo un error";
}
$CI = $_GET['CI'];
$sql = "DELETE FROM Usuarios WHERE  CI = '$CI'";
if ($conexion->query($sql) === TRUE) {
    echo "";
}
 else {
    echo "Error: " . $conexion->error;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>
    <style>
    *{
        font-family: 'Chillax-Semibold';
    }
        body {
            background-image: url(2.png);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 30px 0;
        }
        div {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
            color: #EFE2DA;
        }
        h2 {
            text-align: center;
        }
        a{
            color: #EFE2DA;
        }
        #id{
            background-color: #E64B6B;
            color: #EFE2DA;
            transition: 0.3s;
        }
        #id:hover{
            background-color: #EFE2DA;
            color: #6A253A;
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
        }
        a{
            text-decoration: none;
            
        }
        @media(max-width:800px){

  body{
    padding: 20px;
  }

  div{
    width: 100%;
    max-width: 320px;
    padding: 25px;
    border-radius: 25px;
    text-align: center;
  }

  h2{
    font-size: 28px;
  }

  p{
    font-size: 16px;
    line-height: 1.5;
  }

  .volver{
    width: 100%;
    margin-top: 10px;
    box-sizing: border-box;
  }
}
    </style>
</head>
<body>
    <div>
        <h2>Eliminar Usuario</h2>
        <p>
            <?php 
        echo "El usuario ha sido eliminado.";
        $conexion->close(); 
      ?>
      </p><br>
        
        
<button class="volver"><a href="readleerUsuarios.php">Tabla Usuarios</a></button>
        
    </div>
    </div>
</body>
</html>
