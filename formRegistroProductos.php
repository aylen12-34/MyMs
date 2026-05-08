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
            height: 100vh;
        }
        form {
            max-width: 400px;
        }



        label {
            display: block;
            margin-bottom: 5px;
            color: #EFE2DA;
        }



        
        input[type="text"] {
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
            margin: 4px;
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 10%;
            color: #EFE2DA;
        }
        </style>
</head>
<body>
    <div>
        <h1>Registro de Productos</h1>
    <form action="registroProductos.php" method="POST">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre"><br><br>
        <label for="Descripcion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion"><br><br>
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio"><br><br>
        <label for="Stock">Stock:</label>
        <input type="text" id="Stock" name="Stock"><br><br>
        <input type="submit" value="Registrar Productos">
    </div>
    </form>
</body>
</html>