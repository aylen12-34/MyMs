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
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #EFE2DA;
            color:#E64B6B;
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
        div {
            width: 420px;
            padding: 35px;
            background-color: #6A253A;
            border: 2px solid #EFE2DA;
            border-radius: 40px;
            color: #EFE2DA;
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
  }

  h1{
    text-align: center;
    font-size: 28px;
  }

  form{
    width: 100%;
  }

  input{
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"],
  .volver{
    width: 100%;
    margin-top: 10px;
  }
}

    </style>
</head>
<body>
    <div>
        <h1>Registro de Usuario</h1>
    
        <form action="registroUsuario.php" method="POST" >
            <label for="CI">CI:</label>
            <input type="number" id="CI" name="CI"> <br> <br>
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre"><br><br>
            <label for="Direccion">Dirección:</label>
            <input type="text" id="Direccion" name="Direccion"><br><br>
            <label for="Celular">Celular:</label>
            <input type="text" id="Celular" name="Celular"><br><br>
            <label for="Rol">Rol:</label>
            <input type="text" id="Rol" name="Rol"><br><br>
            <label for="Estado">Estado:</label>
            <input type="text" id="Estado" name="Estado"><br><br>
            <input type="submit" value="Registrar Usuario">

        </form>
        <button class="volver" onclick="history.back()">← Volver</button>
    </div>
    <script>
        $("form").validate({
    rules: {
        CI: {
            required: true,
        },
        Nombre: {
            required: true,
            minlength: 3
        },

        Direccion: {
            required: true
        },

        Celular: {
            required: true,
            digits: true,
            minlength: 8,
            maxlength: 8
        },

        Rol: {
            required: true
        },

        Estado: {
            required: true
        }
    },

    messages: {
        CI: {
            required: "Ingrese su CI",
        },
        Nombre: {
            required: "Ingrese su nombre",
            minlength: "Mínimo 3 letras"
        },

        Direccion: {
            required: "Ingrese su dirección"
        },

        Celular: {
            required: "Ingrese su celular",
            digits: "Solo números",
            minlength: "Debe tener 8 dígitos",
            maxlength: "Debe tener 8 dígitos"
        },

        Rol: {
            required: "Ingrese el rol"
        },

        Estado: {
            required: "Ingrese el estado"
        }
    },
     showErrors: function(errorMap, errorList) {

        $("input").each(function() {
            $(this).attr("placeholder", "");
        });

        $.each(errorList, function(index, error) {
            $(error.element).val("");
            $(error.element).attr("placeholder", error.message);
        });

        this.defaultShowErrors();
    }
});
    </script>
</body>
</html>