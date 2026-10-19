<?php
session_start();
include("../../includes/navcubo.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>The Cube | MyMs Zona de juegos</title>
    <meta name="viewport" content="width=device-width,height=device-height,user-scalable=no,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">

    <link rel="stylesheet" href="../../../tipografia/Fonts/WEB/css/chillax.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="ui myms-cubo">

    <div class="ui__background"></div>

    <div class="ui__game"></div>

    <div class="ui__texts">
        <h1 class="text text--title">
            <span>THE</span>
            <span>CUBE</span>
        </h1>

        <div class="text text--note">
            Toca dos veces para empezar
        </div>

        <div class="text text--timer">
            0:00
        </div>

        <div class="text text--complete">
            <span>¡Completado!</span>
        </div>

        <div class="text text--best-time">
            <icon trophy></icon>
            <span>¡Mejor tiempo!</span>
        </div>
    </div>

    <div class="ui__prefs">
        <range name="size" title="Tamaño del cubo" list="2,3,4,5"></range>
        <range name="flip" title="Tipo de giro" list="Swift&nbsp;,Smooth,Bounce"></range>
        <range name="scramble" title="Longitud de mezcla" list="20,25,30"></range>
        <range name="fov" title="Ángulo de cámara" list="Orthographic,Perspective"></range>
        <range name="theme" title="Esquema de color" list="Cube,Erno,Dust,Camo,Rain"></range>
    </div>

    <div class="ui__theme">
        <range name="hue" title="Tono" color></range>
        <range name="saturation" title="Saturación" color></range>
        <range name="lightness" title="Luminosidad" color></range>
    </div>

    <div class="ui__stats">
        <div class="stats" name="cube-size">
            <i>Cubo:</i><b>3x3x3</b>
        </div>

        <div class="stats" name="total-solves">
            <i>Partidas:</i><b>-</b>
        </div>

        <div class="stats" name="best-time">
            <i>Mejor tiempo:</i><b>-</b>
        </div>

        <div class="stats" name="worst-time">
            <i>Peor tiempo:</i><b>-</b>
        </div>

        <div class="stats" name="average-5">
            <i>Promedio de 5:</i><b>-</b>
        </div>

        <div class="stats" name="average-12">
            <i>Promedio de 12:</i><b>-</b>
        </div>

        <div class="stats" name="average-25">
            <i>Promedio de 25:</i><b>-</b>
        </div>
    </div>

    <div class="ui__buttons">
        <button class="btn btn--bl btn--stats">
            <icon trophy></icon>
        </button>

        <button class="btn btn--br btn--prefs">
            <icon settings></icon>
        </button>

        <button class="btn btn--bl btn--back">
            <icon back></icon>
        </button>

        <button class="btn btn--br btn--theme">
            <icon theme></icon>
        </button>

        <button class="btn btn--br btn--reset">
            <icon reset></icon>
        </button>
    </div>

</div>

<script src="js/three.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>