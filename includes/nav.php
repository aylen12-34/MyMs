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

        /* ========================= */
        /* BUSCAR PEDIDO */
        /* ========================= */

        .buscar-pedido{
            display:flex;
            flex-direction:column;
            align-items:center;
            gap:10px;
            margin-top:15px;
            padding:10px;
        }

        .buscar-pedido span{
            color:#EFE2DA;
            font-size:18px;
            text-align:center;
        }

        .buscar-pedido form{
            display:flex;
            gap:8px;
            width:100%;
            justify-content:center;
            align-items:center;
        }

        .pedido-form input, .buscar-pedido input{
            width:130px;
            padding:10px;
            border:2px solid #E64B6B;
            border-radius:10px;
            outline:none;
            background:#EFE2DA;
            color:#6A253A;
            font-family:inherit;
            text-align:center;
        }

        .buscar-pedido input::placeholder{
            color:#6A253A;
            opacity:0.6;
        }

        .buscar-pedido button{
            padding:10px 15px;
            border:none;
            border-radius:10px;
            background:#E64B6B;
            color:#EFE2DA;
            cursor:pointer;
            font-family:inherit;
            transition:0.2s;
        }

        .buscar-pedido button:hover{
            background:#EFE2DA;
            color:#6A253A;
        }
    </style>
<link rel="stylesheet" href="Ajax/index/consultar_pedido.css">
</head>
<body>
    <div id="botonMenu">
        <img src="imagenes/ISOTIPO BRUMA PASTEL.png" alt="Menu">
    </div>
    <div id="overlay"></div>
    <nav class="indice" id="menu">
        <ul>
            <li><a href="portada publica.php">Inicio</a></li>
            <li><a href="perfil.php" class="volver">Perfil</a></li>
            <li><a href="login.php">Iniciar sesión</a></li>
            <li><a href="Ajax/index/index1.php">Menú</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="formulario ambiental MYMS.pdf" target="_blank">Ficha ambiental</a></li>
            <li><a href="Ajax/index/produc.php">Deja tu comentario</a></li>
            <li><a href="juegos/quejuegoquierejugar.php">Juegos</a></li>
            <li class="buscar-pedido">
                <span>
                    ¿Tienes un pedido?
                </span>
                <form class="form-buscar-pedido" data-endpoint="Ajax/index/consultar_pedido_ajax.php" novalidate>
                    <input type="number" name="ID" placeholder="ID del recibo" min="1" step="1" required>
                    <button type="submit">Buscar</button>
                </form>
            </li>
        </ul>
    </nav>
<!-- Resultado de búsqueda de pedido: permanece en la página actual -->
<div id="fondoModalPedido" class="fondo-modal-pedido" aria-hidden="true">
    <section id="modalPedido" class="marco-modal-pedido" role="dialog" aria-modal="true" aria-labelledby="tituloModalPedido">
        <div class="contenido-modal-pedido">
            <button type="button" id="cerrarModalPedido" class="cerrar-modal-pedido" aria-label="Cerrar ventana">×</button>
            <span class="detalle-modal-superior">INFORMACIÓN DE TU COMPRA</span>
            <h2 id="tituloModalPedido">Pedido encontrado</h2>
            <div class="numero-pedido-modal"><span>PEDIDO N.º</span><strong id="modalPedidoID">—</strong></div>
            <div class="dato-pedido-modal"><span>Cliente</span><strong id="modalPedidoNombre">—</strong></div>
            <div class="dato-pedido-modal"><span>Fecha</span><strong id="modalPedidoFecha">—</strong></div>
            <div class="dato-pedido-modal"><span>Estado del pedido</span><strong id="modalPedidoEstado" class="estado-pedido-modal">—</strong></div>
            <div class="dato-pedido-modal"><span>Vendedor</span><strong id="modalPedidoVendedor">—</strong></div>
            <a id="enlaceReciboPedido" class="enlace-recibo-pedido" href="Ajax/index/recibo.php">¿Necesitas de nuevo el recibo?</a>
        </div>
    </section>
</div>

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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="Ajax/js/consultar_nav.js"></script>
</body>
</html>