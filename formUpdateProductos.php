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

    </style>
</head>
<body>
    <div>
        <h1>Editar Producto</h1>
    <form action="updateEditarProductos.php" method="post">
        <label for="Nombre">Nombre:</label>
        <input type="text" id="Nombre" name="Nombre" required>  <br>  <br>
        <label for="Direccion">Descripción:</label>
        <input type="text" id="Descripcion" name="Descripcion" required>  <br>  <br>
        <label for="Precio">Precio:</label>
        <input type="text" id="Precio" name="Precio" required>  <br>  <br>
        <label for="Stock">Stock:</label>
        <input type="text" id="Stock" name="Stock" required>  <br>  <br>
        <input type="submit" value="Editar">
    </form>
    </div>
</body>
</html>