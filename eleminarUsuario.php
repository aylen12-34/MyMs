<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";   
 
$conn = new mysqli ($usuario,$contraseña,$direccion,$baseDeDatos);
$sql="DELETE FROM Usuario WHERE CI=".$_GET['CI'];
$conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar Registro</title>
  <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">

</head>
<body>
  <div class="mensaje">
    <h2>Eliminación de Registro</h2>
    <p>
      <?php
        echo "El registro ha sido eliminado.";
        $conn->close(); 
      ?>
    </p>
    <a href="menu.html">Volver al menú</a>
  </div>
</body>
</html>
    