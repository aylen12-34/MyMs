<?php 
$contenido = $_POST['contenido'];
$ci=$_SESSION['ci'];
date_default_timezone_set('America/La_Paz');
$fechaC = date("Y-m-d H:i:s");
$sql2 = "SELECT * FROM informacion WHERE ci='$ci' LIMIT 1";
$res2 = mysqli_query($conn, $sql2);

if ($res2 && mysqli_num_rows($res2) == 1) {
    $row2 = mysqli_fetch_assoc($res2);
    $nombre=$row2['apellidos']." ".$row2['nombres'];
}
$idClases = $_POST['id'];

//2
$sql = "INSERT INTO publicaciones (contenido, fechaC, nombre, clases_id) VALUES ('$contenido', '$fechaC', '$nombre', '$idClases')";
//3
if (mysqli_query($conn, $sql)) {
    //4
    
    //Define a que carpeta irá el archivo
    $target_dir = "../media/";
    //recuperar el tipo de archivo (extension)
    $imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION));
    //Define el nombre del archivo P-[id de la clase]-[id de la publicación]
    $newFileName = "P-".$idClases."-".$conn->insert_id.".".$imageFileType;
    //ruta completa de carpeta+nombre donde se guardara el archivo
    $target_file = $target_dir . $newFileName;
    //variable que funcionara como "bandera" si el valor es 1 se puede subir, si es 0 algo pasó
    $uploadOk = 1;
    echo $target_file;

    // Verificar si el archivo existe
    if (file_exists($target_file)) {
        echo "Lo sentimos, ya subiste este archivo.";
        $uploadOk = 0;
    }

    // Valida tamaño
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Lo sentimos, tu archivo es muy grande.";
        $uploadOk = 0;
    }

    //subir archivo
    if ($uploadOk == 0) {
        echo "Ocurrió algun error.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " se subió.";
        } else {
            echo "No se pudo subir tu archivo.";
        }
    }
    header("Location: ../clases/tablon.php?id=$idClases");
} else {
    echo "Error: " . mysqli_error($conn);
}