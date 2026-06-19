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
            background-image: url(imagenes/2.png);
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
        a {
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
        }

        .volver:hover{
            background-color: #EFE2DA;
            color:#E64B6B;
        }
        #a{
    text-decoration: none;
    color: #EFE2DA;
}
    </style>
</head>
<body>
    <div>
    <h1>Iniciar Sesión</h1>
    <form action="autenticar.php" method="POST" >
            <label for="CI">CI:</label>
            <input type="number" id="CI" name="CI"> <br> <br>
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre"><br><br>
            <input type="submit" value="Iniciar Sesion">
            <h3>no tienes cuenta? <a href="Usuario/formRegistroUsuario.php">Registrate aquí</a></h3>
        </form>
    <button class="volver"><a href="inicio.html" id="a">← Volver</a></button>
</div>
<script>
        $("form").validate({
            rules: {
                CI: {
                    required: true,
                    number: true
                },
                Nombre: {
                    required: true
                }
            },
            messages: {
                CI: {
                    required: "&#9888; Por favor, ingresa tu CI",
                    number: "&#9888; Por favor, ingresa un número válido"
                },
                Nombre: {
                    required: "&#9888;Por favor, ingresa tu nombre"
                }
            }
        });
    </script>
</body>
</html>