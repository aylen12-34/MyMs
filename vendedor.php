<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}
session_start();
if($_SESSION['CI']==null){
    header("location:login.html");
} else {
  if($_SESSION['Rol']=="vendedor"){
    $CI = $_SESSION['CI'];
  } else{
    header("location:login.html");
  }
}



$sql = "SELECT * FROM Usuarios WHERE CI='$CI'";
$resultado = $conexion->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">

    <style>
        *{
        font-family: 'Chillax-Semibold';
    }
        body{
            display: grid;
            grid-template-rows: 250px auto 100px;
            grid-template-columns: 15% 85%;
            grid-template-areas: 
            "menu tit"
            "menu text"
            "menu foo" ;
            min-height: 100vh;
            margin: 0;
        }

        header{
            grid-area: tit;
            background-image: url(imagenes/cabecera.png);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            border-bottom: 5px solid #E64B6B;
        }
        header img{
  animation: aparecer 1.5s ease;
}

@keyframes aparecer{
  from{
    opacity: 0;
    transform: scale(0.7);
  }
  to{
    opacity: 1;
    transform: scale(1);
  }
}
        #g{
      scale: 0.5;
    }

        #uno{
            color: #EFE2DA;
            text-align: center;
            font-size: 100px;
            margin: 1rem 0;
        }

        nav{
            grid-area: menu;
            background-color: #6A253A;
            color: #EFE2DA;
            font-family: Arial, sans-serif;
            top: 0;
            left: 0;
            border-right: 5px solid #E64B6B;
    }
    .indice ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .indice a {
      text-decoration: none;
      color: #EFE2DA;
      display: block;
      padding: 20px;
      transition: background-color 0.6s, color 0.6s;
    }

    .indice a:hover {
      background-color: #E64B6B;
      color: #EFE2DA;
    }
    section{
    grid-area: text;
    background: url(imagenes/2.png);
    padding: 30px;
    font-size: larger;
}

section h1{
    margin-top: 20px;
    color: #6A253A;
    border-bottom: 3px solid #E64B6B;
}

section p{
    margin-bottom: 10px;
    font-family: Arial, sans-serif;
    color: #6A253A;
}

section h3{
    margin-top: 15px;
    color: #6A253A;
}

section button{
    margin: 10px 10px 0 0;
    padding: 10px 15px;
    border: none;
    background-color: #E64B6B;
    color: white;
    border-radius: 8px;
    cursor: pointer;
}

section button:hover{
    background-color: #c73b58;
}
#perfil{
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}
div img{
    width: 100%;
    max-width: 300px;
    height: auto;
    border-radius: 50%;
}
    
    footer{
            grid-area: foo;
            background-color: #6A253A;
            color: #EFE2DA;
            display: flex;
            justify-content: center;
            align-items: center;
            border-top: 3px solid #E64B6B;
        }
        a{
            text-decoration: none;
            color: #EFE2DA;
        }
        @media(max-width:800px){

  body{
    grid-template-columns: 100%;
    grid-template-rows: auto auto auto auto;
    grid-template-areas:
      "tit"
      "menu"
      "text"
      "foo";
  }


  header{
    height: 180px;
    padding: 20px;
    text-align: center;
  }

  #g{
    width: 250px;
    scale: 1;
  }


  nav{
    border-right: none;
    border-bottom: 5px solid #E64B6B;
  }

  .indice ul{
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .indice li{
    flex: 1 1 120px;
  }

  .indice a{
    padding: 15px;
    text-align: center;
    font-size: 15px;
  }


  section{
    padding: 20px;
    text-align: center;
  }

  section h1{
    font-size: 30px;
  }

  section h3{
    font-size: 22px;
  }

  section p{
    font-size: 16px;
    line-height: 1.5;
  }


  #perfil{
    flex-direction: column-reverse;
    align-items: center;
    gap: 20px;
  }

  div img{
    max-width: 220px;
  }


  section button{
    width: 100%;
    max-width: 320px;
    margin: 8px 0;
    padding: 12px;
    font-size: 16px;
  }


  footer{
    text-align: center;
    padding: 15px;
    font-size: 14px;
  }
}

    </style>
</head>

<body>

<header>
    <img src="imagenes/MYMS 4 SIN FONDO.png" alt="" id="g">
</header>

<nav class="indice">
    <ul>
    <li><a href="inicio.html">Inicio</a></li>
    <li><a href="">Clientes</a></li>
    <li><a href="">Ventas</a></li>
    <li><a href="cerrar.php">Cerrar Sesión</a></li>
    </ul>
</nav>

<section>
    <h1>Datos Personales</h1>
    <div id="perfil">
        <?php

if ($resultado->num_rows > 0) {

    $fila = $resultado->fetch_assoc();

    echo "<table>";

    echo "<tr>";
    echo "<td class='titulo'>CI</td>";
    echo "<td>".$fila["CI"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Nombre</td>";
    echo "<td>".$fila["Nombre"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Dirección</td>";
    echo "<td>".$fila["Direccion"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Celular</td>";
    echo "<td>".$fila["Celular"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Rol</td>";
    echo "<td>".$fila["Rol"]."</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td class='titulo'>Estado</td>";
    echo "<td>".$fila["Estado"]."</td>";
    echo "</tr>";

    echo "</table>";

} ?>
        <div>
            <?php
              switch ($_SESSION['CI']){
                case "123";
                echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn57_OKTIjVTsTFKw2m-3dWGAMdiJSoCmK3-oSSVj7Ug&s" alt="">';
                break;
                case "234";
                echo '<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR2m2goQVl8DK0LnYv6B_CT0IKIbqRb2jqTv0yEukN4DWb4ZEt6j80pS8mX&s=10" alt="">';
                case "321";
                echo '<img src="https://www.nutrisslovers.com/Portals/nutrisslovers/Articulos%20Nutriss%20Gatos/gatos-unicos-guia-de-razas-y-como-nutrir-su-mundo/cuales-son-las-razas-de-gatos-mas-populares-en-colombia.jpg?ver=T9w4YcvobP-L1GXta8uTAA%3D%3D" alt="">';
              }
            ?>
        </div>
    </div>
    <h1>REGISTROS</h1>
    <h3>Inventario de producto:</h3>
    <button><a href="Productos/readleeProductos.php">Productos disponibles</a></button>
    <button><a href="Pedidos/leerPedidos.php">Pedidos registradas</a></button>
</section>

<footer>
    <div>
        <p>&copy; 2026 M&M's. Todos los derechos reservados.&nbsp;&nbsp;INSTAGRAM:@myms.sweetstudio</p>
    </div>
</footer>

</body>
</html>