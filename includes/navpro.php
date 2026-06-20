<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
<link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <style>
        *{
      font-family:'Chillax-Semibold';
        }
        #overlay{
            position:fixed;
            inset:0;
            background:rgba(0,0,0,0.6);
            opacity:0;
            visibility:hidden;
            transition:0.6s;
            z-index:1000;
        }

        #overlay.activo{
            opacity:1;
            visibility:visible;
        }

        nav{
            position:fixed;
            top:50%;
            left:-350px;
            transform:translateY(-50%);
            width:280px;
            height:80vh;
            background:#6A253A;
            border-right:5px solid #E64B6B;
            border-radius:0 25px 25px 0;
            z-index:2000;
            transition:0.7s ease;
            display:flex;
            align-items:center;
        }

        nav.activo{
            left:0;
        }

        .indice ul{
            list-style:none;
            padding:0;
            margin:0;
            width:100%;
        }

        .indice a{
            text-decoration:none;
            color:#EFE2DA;
            display:block;
            padding:22px;
            transition:0.4s;
        }

        .indice a:hover{
            background:#E64B6B;
        }

        #compra{
            border-radius:50%;
            width:20px;
            height:20px;
        }

        #botonMenu{
            position:fixed;
            top:20px;
            left:20px;
            width:75px;
            height:75px;
            border-radius:50%;
            background:#E64B6B;
            display:flex;
            justify-content:center;
            align-items:center;
            cursor:pointer;
            z-index:3000;
            box-shadow:0 5px 15px rgba(0,0,0,0.4);
        }

        #botonMenu img{
            width:55px;
            height:55px;
            transition:0.7s ease;
        }

        #botonMenu.abrir img{
            transform:rotate(360deg);
        }

        #botonMenu.cerrar img{
            transform:rotate(-360deg);
        }

    </style>

</head>
<body>

    <div id="botonMenu">
        <img src="imagenes/ISOTIPO BRUMA PASTEL.png" alt="Menu">
    </div>

    <div id="overlay"></div>

    <nav class="indice" id="menu">
        <ul>
            <li><a>Mi Portada</a></li>
            <li><a href="login.php">Iniciar sesión</a></li>
            <li><a href="">Historial</a></li>
            <li><a href="cerrar.php">Cerrar sesion</a></li>
            <li>
                <a href="Pedidos/formRegistroPedidos.php">
                    <img src="https://cdn-icons-png.freepik.com/512/9341/9341730.png" id="compra" alt="Carrito">
                </a>
            </li>
        </ul>
    </nav>

    <script>

        const boton = document.getElementById("botonMenu");
        const menu = document.getElementById("menu");
        const overlay = document.getElementById("overlay");

        let abierto = false;

        boton.addEventListener("click", () => {

            if(!abierto){

                menu.classList.add("activo");
                overlay.classList.add("activo");

                boton.classList.remove("cerrar");
                boton.classList.add("abrir");

                abierto = true;

            }else{

                menu.classList.remove("activo");
                overlay.classList.remove("activo");

                boton.classList.remove("abrir");
                boton.classList.add("cerrar");

                abierto = false;
            }

        });

        overlay.addEventListener("click", () => {

            menu.classList.remove("activo");
            overlay.classList.remove("activo");

            boton.classList.remove("abrir");
            boton.classList.add("cerrar");

            abierto = false;

        });

    </script>

</body>
</html>