<<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bloqueado</title>

    <style>


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

            font-family: Arial, sans-serif;

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

    </style>

</head>


<body>
    <div class="zona-bloqueado">

        <h2>
            FELICIDADES, ESTÁS BLOQUEADO
        </h2>

    </div>

    <div id="carita">
        😭
    </div>


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