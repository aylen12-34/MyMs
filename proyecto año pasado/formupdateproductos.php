 <?php
$servername ="localhost";
$username ="root";
$password ="";
$dbname="MyMS";
 
$conn = new mysqli ($servername,$username,$password,$dbname);

if ($conn->connect_error){
    echo "Hubo un error:(";
}
$idproducto=$_GET['idproducto'];
$sql ="SELECT*FROM PRODUCTOS WHERE idproducto=$idproducto";
$resultado=$conn->query($sql);
if($resultado->num_rows > 0){
    while ($fila=$resultado->fetch_assoc()){
        $preciounitario=$fila['preciounitario'];
        $producto=$fila['producto'];
        $cantidad=$fila['cantidad'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALLATE AYLEN</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
  <style>
    *{
      font-family: 'Cinzel Decorative', serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #242424;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    form {
      background: linear-gradient(to bottom, #ffffff, #3a3a3a);
      padding: 30px 40px;
      border-radius: 10px;
      border: 5px solid #c59d5f;
      box-shadow: 0 0 20px rgba(0,0,0,0.3);
      width: 450px;
      text-align: center;
      color: #1a1a1a;
    }

    h2 {
      text-align: center;
      color: #3a3a3a;
      margin-bottom: 20px;
      border-bottom: 2px solid #c59d5f;
      padding-bottom: 10px;
    }

    label {
      display: block;
      text-align: left;
      color: #1a1a1a;
      margin-top: 15px;
      font-size: 16px;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 15px;
    }

    input[type="submit"] {
      background-color: #ffffff;
      color: #000000;
      padding: 10px 20px;
      border-radius: 4px;
      border: 2px solid #c59d5f;
      margin-top: 25px;
      cursor: pointer;
      transition: 0.3s;
    }

    input[type="submit"]:hover {
      background-color: #000000;
      color: #ffffff;
      box-shadow: 0 4px 10px #c59d5f;
    }

    a {
      text-decoration: none;
      color: #b2b2b2;
      display: inline-block;
      margin-top: 20px;
      transition: 0.3s;
    }

    a:hover {
      color: #000000;
      box-shadow: 0 4px 10px #c59d5f;
    }
  </style>
</head>
<body>
    <form action="updateproductos.php" method="post">
        <label for="cantidad">Cantidad de productos:</label>
        <input type="number" name="cantidad" value='<?=$cantidad?>'>
        <label for="idproducto">ID del producto:</label>
        <input type="number" name="idproducto" value='<?=$idproducto?>'>
        <label for="producto">Producto de su Preferencia</label>
        <input type="text" name="producto" value='<?=$producto?>'>
        <label for="preciounitario">preciounitario:</label>
        <input type="number" name="preciounitario" value='<?=$preciounitario?>'>

        <input type="submit" value="actualizar">
    </form>
</body>
</html>
