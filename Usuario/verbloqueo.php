<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <title>Bloqueado</title>

    <style>
*{
        font-family: 'Chillax-Semibold', sans-serif;
    }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url("../imagenes/2.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .zona-bloqueado {
            width: 100vw;
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
        }

        h2 {
            color: #EFE2DA;

            background-color: #6A253A;

            padding: 35px 60px;

            border-radius: 20px;

            text-align: center;

            font-size: 2.5rem;

            transition: 0.3s;
        }

        #carita {
            position: fixed;

            display: none;

            font-size: 35px;

            pointer-events: none;

            z-index: 1000;

            transform: translate(0, 0);
        }
a {
            color: #EFE2DA;
        }
    .btn-volver-esquina {
        position: fixed;
        top: 25px;
        left: 25px;

        width: 52px;
        height: 52px;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #E64B6B;
        border: none;
        border-radius: 50%;

        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.30);

        transition: all 0.2s ease;
        z-index: 9999;

        text-decoration: none;
    }

    /* Flecha */
    .btn-volver-esquina::before {
        content: "";

        width: 12px;
        height: 12px;

        border-left: 3px solid #EFE2DA;
        border-bottom: 3px solid #EFE2DA;

        transform: rotate(45deg);

        margin-left: 6px;
    }

    .btn-volver-esquina:hover {
        background: #6A253A;

        transform: scale(1.1);

        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
    }

    .btn-volver-esquina:active {
        transform: scale(0.95);
    }
    </style>

</head>


<body>
    <div class="zona-bloqueado">
        <h2> FELICIDADES, ESTÁS BLOQUEADO</h2>
    </div>
    <div id="carita">😭</div>
    <a 
    href="../portada publica.php" class="btn-volver-esquina" aria-label="Volver" title="Volver"> </a>
    <script>

        const carita = document.querySelector("#carita");
        document.addEventListener("mousemove", function(event) {

            carita.style.display = "block";

            carita.style.left = (event.clientX + 15) + "px";
            carita.style.top = (event.clientY + 15) + "px";

        });

    </script>


</body>

</html>