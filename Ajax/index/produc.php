<?php
$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";
$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Usuario</title>
    <link rel="stylesheet" href="../tipografia/Fonts/WEB/css/chillax.css">
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.js"></script>

    <style>
*{
    font-family: 'Chillax-Semibold';
    box-sizing: border-box;
}

body{
    background-image: url(../imagenes/2.png);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
}

div{
    width: 95%;
    max-width: 1200px;
    padding: 35px;
    background-color: #6A253A;
    border: 2px solid #EFE2DA;
    border-radius: 30px;
    color: #EFE2DA;
}

h2{
    text-align: center;
    margin-bottom: 25px;
    font-size: 32px;
}

table{
    width: 100%;
    border-collapse: collapse;
    overflow: hidden;
    border-radius: 15px;
}

th{
    background-color: #E64B6B;
    color: #EFE2DA;
    padding: 14px;
    font-size: 15px;
}

td{
    padding: 14px;
    text-align: center;
    border-bottom: 1px solid rgba(239, 226, 218, 0.2);
    color: #EFE2DA;
}

tr{
    background-color: rgba(255,255,255,0.04);
    transition: 0.3s;
}

tr:hover{
    background-color: rgba(230, 75, 107, 0.25);
}

button{
    padding: 8px 14px;
    margin: 3px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.3s;
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
        }

        .volver:hover{
            background-color: #EFE2DA;
            color:#E64B6B;
        }

        .rating-group {
            height: 10px;
            width: 230px;
    display: inline-flex;
    flex-direction: row-reverse; /* Invierte el orden para iluminar hacia la izquierda */
    justify-content: flex-end;
  }

  .rating-group input {
    display: none; /* Oculta los radio buttons feos */
  }

  .rating-group label {
    font-size: 2rem;
    color: #ccc; /* Color de estrella apagada */
    cursor: pointer;
    transition: color 0.2s ease-in-out;
  }

  /* Ilumina la estrella sobre la que pasa el cursor y las anteriores */
  .rating-group label:hover,
  .rating-group label:hover ~ label {
    color: #ffca08;
  }

  /* Mantiene iluminadas las estrellas seleccionadas */
  .rating-group input:checked ~ label {
    color: #ffca08;
  }
</style>
</head>
<body>

<div>
<h2>Comentario</h2>
<form action="reseña.php" method="post">
    <label>Calificación</label><br>
<div class="rating-group" name="estrella">
  <input type="radio" id="star5" name="Cali" value="5" required />
  <label for="star5" title="5 estrellas">★</label>

  <input type="radio" id="star4" name="Cali" value="4" />
  <label for="star4" title="4 estrellas">★</label>

  <input type="radio" id="star3" name="Cali" value="3" />
  <label for="star3" title="3 estrellas">★</label>

  <input type="radio" id="star2" name="Cali" value="2" />
  <label for="star2" title="2 estrellas">★</label>

  <input type="radio" id="star1" name="Cali" value="1" />
  <label for="star1" title="1 estrellas">★</label>
</div> <br><br>
    <label for="">Nombre o Correo electronico</label> <br>
    <input type="text" name="nombre"> <br><br>
    <label for="">Comentario</label> <br>
    <textarea name="come" id=""></textarea> <br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
    
</form>
<button class="volver" onclick="history.back()">← Volver</button><br>
</div>

</body>
</html>