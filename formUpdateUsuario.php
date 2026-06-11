<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}
$CI=$_GET['CI'];
$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila=$resultado->fetch_assoc()) {
        $CI=$fila['CI'];
        $Nombre=$fila['Nombre'];
        $Direccion=$fila['Direccion'];
        $Celular=$fila['Celular'];
        $Rol=$fila['Rol'];
        $Estado=$fila['Estado'];
    }
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
label.error{
    display:none !important;
}
    </style>
</head>
<body>
    <div>
        <h1>Editar Usuario</h1>
    <form action="updateditarUsuario.php" method="post">
        <label for="">Carnet de Identidad</label>
                <input type="text" name="CI" value='<?=$CI?>' required>
                <label for="">Nombre:</label>
                <input type="text" name="Nombre" value='<?=$Nombre?>' required>
        <br>
        <label for="">Dirección:</label>
        <input type="text" name="Direccion" value='<?=$Direccion?>' required>
        <br>
        <label for="">Celular:</label>
        <input type="text" name="Celular" value='<?=$Celular?>' required>
        <br>
        <label for="">Rol:</label>
        <input type="text" name="Rol" value='<?=$Rol?>' required>
        <br>
        <label for="">Estado:</label>
        <input type="text" name="Estado" value='<?=$Estado?>' required>
        <br>
        <input type="submit" value="Editar">
    </form>
    <button class="volver" onclick="history.back()">
         Volver</button><br>
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