<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $nombre=$_POST["nombre"];
    $come=$_POST["come"];
    $comentario = fopen("comentario.txt", "a");
        if($comentario){
            fwrite($comentario, $nombre .PHP_EOL);
            fwrite($comentario,$come .PHP_EOL);
            fwrite($comentario,"****".PHP_EOL);
        }
    fclose($comentario);
    $comentario= fopen("comentario.txt","r");
    if($comentario){
        while(!feof($comentario)){
        $ver = fgets($comentario);    
       $leer= nl2br($ver);
       echo $leer;
    }
    }
    fclose($comentario);
    ?>
<button class="volver" onclick="history.back()">← Volver</button><br>
</body>
</html>