<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comentarios</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #EFE2DA;
            padding: 40px 20px;
        }

        .contenedor {
            width: 100%;
            max-width: 850px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: #6A253A;
            margin-bottom: 35px;
            font-size: 32px;
        }

        .comentario {
            background: white;
            padding: 22px;
            margin-bottom: 20px;

            border-radius: 18px;

            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);

            border-left: 6px solid #E64B6B;

            transition: 0.3s;
        }

        .comentario:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.16);
        }

        .estrellas {
            font-size: 25px;
            color: #E64B6B;
            letter-spacing: 3px;
            margin-bottom: 10px;
        }

        .nombre {
            color: #6A253A;
            font-size: 19px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .texto {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        .vacio {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 18px;
            color: #777;
        }

        .volver {
            display: block;
            margin: 30px auto 0;

            background: #6A253A;
            color: white;

            border: none;
            border-radius: 12px;

            padding: 12px 25px;

            font-size: 16px;

            cursor: pointer;

            transition: 0.3s;
        }

        .volver:hover {
            background: #E64B6B;
            transform: scale(1.05);
        }
        a {
    text-decoration: none;
}

    </style>

</head>

<body>

<div class="contenedor">

    <h1>💬 Comentarios de nuestros clientes</h1>

    <?php

    $archivo = "comentario.txt";

    if (file_exists($archivo)) {

        $lineas = file(
            $archivo,
            FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES
        );

        $estrella = "";
        $nombre = "";
        $come = "";

        $hayComentarios = false;

        foreach ($lineas as $linea) {

            $linea = trim($linea);
            if ($linea == "****") {

                if ($nombre != "" || $come != "") {

                    $hayComentarios = true;
                   preg_match('/\d+/', $estrella, $resultado);

                    $cantidadEstrellas = isset($resultado[0])
                        ? intval($resultado[0])
                        : 0;

                    if ($cantidadEstrellas < 1) {
                    $cantidadEstrellas = 1;
                    }

                    if ($cantidadEstrellas > 5) {
                        $cantidadEstrellas = 5;
                    }
                    $estrellasLlenas = str_repeat(
                        "★",
                        $cantidadEstrellas
                    );
                    $estrellasVacias = str_repeat(
                        "☆",
                        5 - $cantidadEstrellas
                    );


                    echo '<div class="comentario">';

                        echo '<div class="estrellas">';
                            echo $estrellasLlenas;
                            echo $estrellasVacias;
                        echo '</div>';

                        echo '<div class="nombre">';
                            echo htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
                        echo '</div>';

                        echo '<div class="texto">';
                            echo htmlspecialchars($come, ENT_QUOTES, 'UTF-8');
                        echo '</div>';

                    echo '</div>';
                }
                $estrella = "";
                $nombre = "";
                $come = "";

            }

            else {
                if ($estrella == "") {

                    $estrella = $linea;

                }
                else if ($nombre == "") {

                    $nombre = $linea;

                }
                else {

                    $come .= " " . $linea;

                }

            }

        }

        if (!$hayComentarios) {

            echo '<div class="vacio">';
                echo 'Todavía no hay comentarios.';
            echo '</div>';

        }

    }

    else {

        echo '<div class="vacio">';
            echo 'Todavía no hay comentarios.';
        echo '</div>';

    }

    ?>

    <button class="volver" onclick="history.back()">
        ← Volver
    </button>
    
        <a href="../../portada publica.php"><button class="volver">Inicio</button></a>
    

</div>

</body>
</html>