<?php while($row = mysqli_fetch_assoc($res)) { ?>
    <tr>
        <td>
            <b><?php echo $row['nombre']; ?></b>
            <i><?php echo $row['fechaC'];
                if (isset($row['fechaE'])){
                    echo "(Editado: ".$row['fechaE'].")";
                }
            ?>
            </i>
            <br>
            <?php
            echo "<p>".$row['contenido']."</p>";

            //nombre del posible archivo
            $nombreArchivo="P-".$val."-".$row['id'];
            $directorio = "../media/";
            //lista de todas las extenciones posibles
            $extensiones = ["pdf", "jpg", "jpeg", "png", "gif", "webp", "docx", "xlsx", "txt", "zip"];
            //bandera para verificar todo tipo de archivo
            $archivoEncontrado = null;
            //verificar si el archivo se creo en alguna extension conocida
            foreach ($extensiones as $ext) {
                //nombre del archivo con cada extension
                $ruta = $directorio . $nombreArchivo . "." . $ext;
                //verifica
                if (file_exists($ruta)) {
                    $archivoEncontrado = $ruta;
                    // detenemos la búsqueda en cuanto lo encuentra
                    break;
                }
            }

            //verifica si encontró algun archivo con el nombre
            if ($archivoEncontrado) {
                $extension = strtolower(pathinfo($archivoEncontrado, PATHINFO_EXTENSION));
                // Mostrar según el tipo
                if (in_array($extension, ["jpg", "jpeg", "png", "gif", "webp"])) {
                    echo "<img src='$archivoEncontrado' alt='Archivo' width='250'>";
                } elseif ($extension === "pdf") {
                    echo "<embed src='$archivoEncontrado' type='application/pdf' width='400' height='250'>";
                } else {
                    echo "<a href='$archivoEncontrado' download>📂 Descargar archivo</a>";
                }
            }
            ?>
<?php
}
?>