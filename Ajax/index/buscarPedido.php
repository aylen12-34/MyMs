<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "MYMS";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión");
}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 

$id = isset($_GET["ID"]) ? trim($_GET["ID"]) : "";

if ($id === "") {
    echo "<script>
            alert('Ingresa un ID de recibo válido');
            window.history.back();
          </script>";
    exit;
}

$stmt = $conn->prepare("
    SELECT ID
    FROM Pedidos
    WHERE ID = ?
");

$stmt->bind_param("s", $id);

$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {

    header("Location: recibo.php?ID=" . urlencode($id));
    exit;

} else {

    $idSeguro = htmlspecialchars(
        $id,
        ENT_QUOTES,
        'UTF-8'
    );

    ?>

    <script>

        Swal.fire({

            title: 'Alerta',

            background: '#e65c78',

            color: '#EFE2DA',

            imageUrl: '../../imagenes/gatocajasad.png',

            imageHeight: 150,

            imageAlt: 'Icono personalizado',

            confirmButtonText: 'OK',

            confirmButtonColor: '#6A253A',

            text: 'No existe ningún pedido con el ID de recibo <?php echo $idSeguro; ?>',

            didOpen: () => {

                const audio =
                    new Audio('../../imagenes/gatous.mp3');

                const imagenSwal =
                    Swal.getImage();

                if (imagenSwal) {

                    imagenSwal.style.cursor = 'pointer';

                    imagenSwal.addEventListener('click', () => {

                        audio.currentTime = 0;

                        audio.play();

                    });

                }

            }

        }).then((result) => {

            if (result.isConfirmed) {

                window.history.back();

            }

        });

    </script>

    <?php
}

$stmt->close();
$conn->close();

?>