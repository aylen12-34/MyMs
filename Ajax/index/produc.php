<?php

$usuario = "root";
$contraseña = "";
$direccion = "localhost";
$baseDeDatos = "MYMS";

$conexion = new mysqli(
    $direccion,
    $usuario,
    $contraseña,
    $baseDeDatos
);

if ($conexion->connect_error) {
    die("No se ha podido conectar a la base de datos");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Comentario - MyMs</title>

    <link rel="stylesheet"
          href="../tipografia/Fonts/WEB/css/chillax.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Chillax-Semibold';
        }


        body {

            min-height: 100vh;

            background-image:
                url("../../imagenes/2.png");

            background-size: cover;
            background-position: center;
            background-attachment: fixed;

            display: flex;
            justify-content: center;
            align-items: center;

            padding: 40px 20px;

        }


        .contenedor {

            width: 100%;
            max-width: 1100px;

            background-color: #6A253A;

            border: 2px solid #EFE2DA;

            border-radius: 30px;

            padding: 40px;

            color: #EFE2DA;

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.30);

        }


        h2 {

            text-align: left;

            font-size: 34px;

            margin-bottom: 30px;

            color: #EFE2DA;

        }


        .contenido {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 40px;

            align-items: stretch;

        }


        .formulario {

            width: 100%;

            padding-right: 10px;

        }


        .formulario label {

            display: block;

            margin-bottom: 8px;

            font-size: 16px;

            color: #EFE2DA;

        }



        .formulario input[type="text"],
        .formulario textarea {

            width: 100%;

            background-color: #EFE2DA;

            border: 2px solid transparent;

            border-radius: 12px;

            padding: 12px 15px;

            color: #6A253A;

            font-size: 15px;

            outline: none;

            transition: 0.3s;

        }


        .formulario input[type="text"] {

            height: 45px;

        }


        .formulario textarea {

            min-height: 140px;

            resize: vertical;

        }


        .formulario input[type="text"]:focus,
        .formulario textarea:focus {

            border-color: #E64B6B;

            box-shadow:
                0 0 0 3px rgba(230, 75, 107, 0.20);

        }



        .rating-group {

            display: flex;

            flex-direction: row-reverse;

            justify-content: flex-end;

            width: fit-content;

            margin-bottom: 25px;

        }


        .rating-group input {

            display: none;

        }


        .rating-group label {

            font-family: Arial, sans-serif;

            display: block;

            font-size: 38px;

            color: rgba(239, 226, 218, 0.35);

            cursor: pointer;

            margin: 0;

            padding: 0 3px;

            transition: 0.2s;

        }

        .rating-group label:hover,
        .rating-group label:hover ~ label {

            color:  #E64B6B;

            transform: scale(1.08);

        }

        .rating-group input:checked ~ label {

            color: #ffca08;

        }

        .botones {

            display: flex;

            gap: 12px;

            margin-top: 20px;

        }


        .botones input {

            border: none;

            border-radius: 10px;

            padding: 12px 25px;

            font-size: 15px;

            cursor: pointer;

            transition: 0.3s;

        }


        /* Enviar */

        .enviar {

            background-color: #E64B6B;

            color: #EFE2DA;

        }


        .enviar:hover {

            background-color: #EFE2DA;

            color: #6A253A;

            transform: translateY(-2px);

        }


        /* Borrar */

        .borrar {

            background-color: rgba(239, 226, 218, 0.15);

            color: #EFE2DA;

            border: 1px solid #EFE2DA !important;

        }


        .borrar:hover {

            background-color: #EFE2DA;

            color: #6A253A;

            transform: translateY(-2px);

        }


        /* =========================
           CAJA DERECHA
        ========================= */

       .espacio-derecho {

    height: 500px;

    border: 2px solid rgba(239, 226, 218, 0.35);

    border-radius: 20px;

    padding: 20px;

    overflow-y: auto;

    background-color: rgba(0, 0, 0, 0.10);

}


/* Barra de desplazamiento */

.espacio-derecho::-webkit-scrollbar {
    width: 8px;
}

.espacio-derecho::-webkit-scrollbar-track {
    background: rgba(239, 226, 218, 0.10);
    border-radius: 10px;
}

.espacio-derecho::-webkit-scrollbar-thumb {
    background: #E64B6B;
    border-radius: 10px;
}

.espacio-derecho::-webkit-scrollbar-thumb:hover {
    background: #EFE2DA;
}
.espacio-derecho {

    height: 500px;

    border: 2px solid rgba(239, 226, 218, 0.35);

    border-radius: 20px;

    padding: 20px;

    overflow-y: auto;

    background-color: rgba(0, 0, 0, 0.10);

}


/* Barra de desplazamiento */

.espacio-derecho::-webkit-scrollbar {
    width: 8px;
}

.espacio-derecho::-webkit-scrollbar-track {
    background: rgba(239, 226, 218, 0.10);
    border-radius: 10px;
}

.espacio-derecho::-webkit-scrollbar-thumb {
    background: #E64B6B;
    border-radius: 10px;
}

.espacio-derecho::-webkit-scrollbar-thumb:hover {
    background: #EFE2DA;
}


        /* =========================
           BOTÓN VOLVER
        ========================= */

        .volver {

            margin-top: 35px;

            padding: 11px 25px;

            border: none;

            color: #EFE2DA;

            border-radius: 10px;

            background: #E64B6B;

            cursor: pointer;

            font-size: 16px;

            transition: 0.3s;

        }


        .volver:hover {

            background-color: #EFE2DA;

            color: #6A253A;

            transform: translateX(-3px);

        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 750px) {

            body {

                padding: 20px 12px;

            }


            .contenedor {

                padding: 25px;

                border-radius: 22px;

            }


            h2 {

                font-size: 28px;

            }


            .contenido {

                grid-template-columns: 1fr;

                gap: 25px;

            }


            .espacio-derecho {

                min-height: 250px;

            }

        }
        .vacio {

    width: 100%;

    min-height: 150px;

    display: flex;

    justify-content: center;

    align-items: center;

    text-align: center;

    color: #EFE2DA;

    font-size: 16px;

    opacity: 0.7;

}
.comentario {
    width: 100%;
    background-color: #EFE2DA;
    border-radius: 15px;
    padding: 18px;
    margin-bottom: 20px;

    border-left: 5px solid #E64B6B;

    box-shadow: 0 4px 10px rgba(0,0,0,0.15);

    color: #6A253A;

    overflow-wrap: anywhere;
    word-break: break-word;

    transition: 0.3s;
}

.comentario:not(:last-child) {
    border-bottom: 3px solid #EFE2DA;
    margin-bottom: 25px;
}


        @media (max-width: 450px) {

            .contenedor {

                padding: 20px;

            }


            h2 {

                font-size: 25px;

            }


            .rating-group label {

                font-size: 32px;

            }


            .botones {

                flex-direction: column;

            }


            .botones input {

                width: 100%;

            }

        }

    </style>

</head>


<body>


<div class="contenedor">

    <h2>Deja tu comentario</h2>


    <div class="contenido">


        <!-- =========================
             FORMULARIO
        ========================== -->

        <div class="formulario">

            <form
                action="guardarComentario.php"
                method="post"
            >


                <!-- CALIFICACIÓN -->

                <label>
                    Calificación
                </label>


                <div class="rating-group">

                    <input
                        type="radio"
                        id="star5"
                        name="Cali"
                        value="5"
                        required
                    >

                    <label
                        for="star5"
                        title="5 estrellas"
                    >
                        ★
                    </label>


                    <input
                        type="radio"
                        id="star4"
                        name="Cali"
                        value="4"
                    >

                    <label
                        for="star4"
                        title="4 estrellas"
                    >
                        ★
                    </label>


                    <input
                        type="radio"
                        id="star3"
                        name="Cali"
                        value="3"
                    >

                    <label
                        for="star3"
                        title="3 estrellas"
                    >
                        ★
                    </label>


                    <input
                        type="radio"
                        id="star2"
                        name="Cali"
                        value="2"
                    >

                    <label
                        for="star2"
                        title="2 estrellas"
                    >
                        ★
                    </label>


                    <input
                        type="radio"
                        id="star1"
                        name="Cali"
                        value="1"
                    >

                    <label
                        for="star1"
                        title="1 estrella"
                    >
                        ★
                    </label>

                </div>


                <!-- NOMBRE -->

                <label for="nombre">
                    Nombre o correo electrónico
                </label>

                <input
                    type="text"
                    id="nombre"
                    name="nombre"
                    placeholder="Escribe tu nombre o correo"
                    required
                >


                <br><br>


                <!-- COMENTARIO -->

                <label for="come">
                    Comentario
                </label>

                <textarea
                    id="come"
                    name="come"
                    placeholder="Escribe aquí tu opinión..."
                    required
                ></textarea>


                <!-- BOTONES -->

                <div class="botones">

                    <input
                        type="submit"
                        value="Enviar comentario"
                        class="enviar"
                    >

                    <input
                        type="reset"
                        value="Borrar"
                        class="borrar"
                    >

                </div>


            </form>


            <!-- VOLVER -->

            <button
                class="volver"
                onclick="history.back()"
            >
                ← Volver
            </button>

        </div>

        <div class="espacio-derecho">

<?php

$archivo = "comentario.txt";

$hayComentarios = false;

if (file_exists($archivo)) {

    $lineas = file(
        $archivo,
        FILE_IGNORE_NEW_LINES
    );

    $estrella = "";
    $nombre = "";
    $come = "";

    foreach ($lineas as $linea) {

        $linea = trim($linea);

        // Ignorar líneas vacías
        if ($linea === "") {
            continue;
        }


        // Cuando encontramos ****
        if ($linea === "****") {

            if ($estrella !== "" && $nombre !== "") {

                $hayComentarios = true;


                // Obtener número de estrellas
                preg_match(
                    '/\d+/',
                    $estrella,
                    $resultado
                );


                $cantidadEstrellas =
                    isset($resultado[0])
                    ? intval($resultado[0])
                    : 1;


                // Limitar entre 1 y 5

                if ($cantidadEstrellas < 1) {
                    $cantidadEstrellas = 1;
                }

                if ($cantidadEstrellas > 5) {
                    $cantidadEstrellas = 5;
                }


                // Crear estrellas

                $estrellasLlenas = str_repeat(
                    "★",
                    $cantidadEstrellas
                );

                $estrellasVacias = str_repeat(
                    "☆",
                    5 - $cantidadEstrellas
                );


                /*
                 * MOSTRAR TARJETA
                 */

                echo '<div class="comentario">';


                    // Estrellas

                    echo '<div class="estrellas">';

                        echo '<span class="llenas">';
                        echo $estrellasLlenas;
                        echo '</span>';

                        echo '<span class="vacias">';
                        echo $estrellasVacias;
                        echo '</span>';

                    echo '</div>';


                    // Nombre

                    echo '<div class="nombre">';

                        echo htmlspecialchars(
                            $nombre,
                            ENT_QUOTES,
                            'UTF-8'
                        );

                    echo '</div>';


                    // Comentario

                    echo '<div class="texto">';

                        echo nl2br(
                            htmlspecialchars(
                                $come,
                                ENT_QUOTES,
                                'UTF-8'
                            )
                        );

                    echo '</div>';


                echo '</div>';

            }


            // Reiniciar

            $estrella = "";
            $nombre = "";
            $come = "";

        }

        else {

            // Primera línea = estrellas

            if ($estrella === "") {

                $estrella = $linea;

            }

            // Segunda línea = nombre

            else if ($nombre === "") {

                $nombre = $linea;

            }

            // Tercera línea en adelante = comentario

            else {

                if ($come !== "") {

                    $come .= "\n";

                }

                $come .= $linea;

            }

        }

    }


    // Si no hay comentarios

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
        </div>


    </div>

</div>


</body>

</html>