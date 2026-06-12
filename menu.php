<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <style>

         .header{
     
height: 200px;
      background-image:url(https://aurogenesis.com/wp-content/uploads/2025/07/Ponceau-4R-Colour-in-Malaysia.jpg);

      background-size:cover;
      background-repeat:no-repeat;

      display:flex;
      justify-content:center;
      align-items:center;

      border-bottom:5px solid #E64B6B;
    }

    #g{
      scale:0.5;
    }
    /* ================= FONDO OSCURO ================= */

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

    /* ================= NAV ================= */

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

    /* ================= BOTON ================= */

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
      width:40px;
      height:40px;

      transition:0.7s ease;
    }

    /* giro horario */
    #botonMenu.abrir img{
      transform:rotate(360deg);
    }

    /* giro antihorario */
    #botonMenu.cerrar img{
      transform:rotate(-360deg);
    }

    </style>
</head>
<body>
     <!-- BOTON -->
  <div id="botonMenu">
    <img src="https://cdn-icons-png.flaticon.com/512/1828/1828859.png">
  </div>

  <!-- OSCURECER -->
  <div id="overlay"></div>

  <!-- NAV -->
  <nav class="indice" id="menu">

    <ul>
      <li><a href="">Inicio</a></li>
      <li><a href="">Pestaña 1</a></li>
      <li><a href="">Pestaña 2</a></li>
      <li><a href="">Pestaña 3</a></li>
      <li><a href="">Pestaña 4</a></li>
    </ul>

  </nav>

  <!-- HEADER -->
  <header class="header">
    <img src="imagenes/MYMS 4 SIN FONDO.png" id="g">
  </header>
</body>
</html>