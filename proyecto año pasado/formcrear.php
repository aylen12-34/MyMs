<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet" />
    <style>
        *{
            font-family:'Cinzel Decorative', serif; ;
        }

        body {
            background-color:#242424;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background:linear-gradient(to bottom, white,#3a3a3a);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 5px solid #c59d5f;
            
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 450px;
            padding: 8px;
            margin-bottom: 10px;
            padding-left: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #ffffff;
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            border-bottom: #c59d5f;
            border-radius: 4px;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #000000;
            color: #ffffff;
        }
        h2 {
            text-align: center;
            color: #3a3a3a;
            margin-bottom: 20px;
            border-bottom: #c59d5f;
        }
        label {
            color: #1a1a1a;
            border-bottom: #c59d5f;
        }
        p a{
            text-decoration: none;
            color: #b2b2b2;
            transition: 0.3s;
        }
        p a:hover{
            box-shadow: 0 4px 10px #c59d5f;
            color: #000000;
        }
    </style>
</head>
<body>
    <form action="createinsert.php" method="post">
        <h2>Nueva Compra</h2>

        <label for="cliente">Nombre de Cliente:</label>
        <input type="text" name="cliente" required>
        <label for="numtelf">Numero de Telefono:</label>
        <input type="number" name="numtelf" required>
        <label for="producto">Producto de su Preferencia</label>
        <input type="text" name="producto" required>
        <label for="cantidad">Cantidad</label>
        <input type="number" name="cantidad" required>

        <input type="submit" value="comprar">
    </form>
</body>
</html>