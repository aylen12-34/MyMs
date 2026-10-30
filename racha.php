<?php
session_start();
if (!isset($_SESSION['Rol']) || $_SESSION['Rol'] != "administrador") {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Reportes</title>
    <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Chillax-Semibold';
}
body {
    margin: 0;
    height: 100vh;
    overflow: hidden;
    font-family: 'Chillax-Semibold';
    position: relative;
    background: linear-gradient(
        to right,
        #6A253A 0%,
        #EFE2DA 3%,
        #EFE2DA 97%,
        #6A253A 100%
    ),
    linear-gradient(
            to bottom,
           #6A253A 0%,
        #EFE2DA 3%,
        #EFE2DA 97%,
        #6A253A 100%
        );
    min-height: 100vh;
    background-blend-mode: multiply;
    background-attachment: fixed;
}
#canvas-lluvia {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    z-index: -1;
    pointer-events: none;
}
.pantalla {
    position: relative;
    width: 100%;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}
.racha {
    position: relative;
    z-index: 10;
    text-align: center;
    color: white;
    animation: aparecer 1s ease-out;
}
.racha h1 {
    margin: 0;
    font-size: 90px;
    font-weight: bold;
    font-family: 'Chillax-Semibold';
    color: #6A253A;
    text-shadow:
        0 0 3px rgba(255, 255, 255, 0.75),
        0 0 7px rgba(255, 255, 255, 0.35);
    animation: crecerTexto 3s ease-in-out infinite;
}
.racha h1 img {
    vertical-align: middle;
    width: 100px;
    filter:
        drop-shadow(0 0 3px rgba(255, 255, 255, 0.65))
        drop-shadow(0 0 7px rgba(255, 255, 255, 0.25));
    transition: filter 0.3s ease;
}
.racha h1 img:hover {
    filter:
        drop-shadow(0 0 4px rgba(255, 255, 255, 0.85))
        drop-shadow(0 0 9px rgba(255, 255, 255, 0.35));
}
.racha p {
    margin: 10px 0 0;
    font-size: 28px;
    font-weight: bold;
    font-family: 'Chillax-Semibold';
    color: #6A253A;
    text-shadow:
        0 0 3px rgba(255, 255, 255, 0.8),
        0 0 8px rgba(255, 255, 255, 0.35);
    animation: crecerTexto 3s ease-in-out infinite;
}
@keyframes crecerTexto {
    0% {transform: scale(1);}
    50% {transform: scale(1.025);}
    100% {transform: scale(1);}
}
.botones {
    position: absolute;
    bottom: 45px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 20;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    width: 90%;
}
.botones button {
    min-width: 200px;
    padding: 14px 20px;
    border: 2px solid #6A253A;
    border-radius: 12px;
    background: #6A253A;
    color: #EFE2DA;
    font-family: 'Chillax-Semibold';
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition:
        transform 0.3s ease,
        background 0.3s ease,
        border-color 0.3s ease,
        box-shadow 0.3s ease,
        text-shadow 0.3s ease;
    box-shadow:
        0 4px 10px rgba(106, 37, 58, 0.20);
    text-shadow:
        0 0 2px rgba(239, 226, 218, 0.25);
}
.botones button:hover {
    transform: translateY(-3px);
    background: #E64B6B;
    border-color: #EFE2DA;
    color: #EFE2DA;
    box-shadow:
        0 0 5px rgba(239, 226, 218, 0.35),
        0 0 12px rgba(239, 226, 218, 0.15),
        0 6px 15px rgba(106, 37, 58, 0.25);
    text-shadow:
        0 0 4px rgba(239, 226, 218, 0.45);
}
.botones a {
    text-decoration: none;
}
@media (max-width: 800px) {
    .racha h1 {
        font-size: 55px;
    }
    .racha h1 img {
        width: 70px;
    }
    .racha p {
        font-size: 22px;
    }
    .botones {
        width: 95%;
        gap: 10px;
    }
    .botones button {
        min-width: 0;
        width: 100%;
        padding: 12px 10px;
        font-size: 14px;
    }
}
@media (max-width: 550px) {
    .botones {
        flex-direction: column;
        bottom: 20px;
        gap: 8px;
    }
    .botones button {
        width: 220px;
    }
    .racha h1 {
        font-size: 40px;
    }
}
.imagen-interactiva {
      width: 150px;
      cursor: pointer;
      transition: transform 0.2s ease, filter 0.2s ease;
      border-radius: 12px;
    }
    .imagen-interactiva:hover {
      transform: scale(1.08);
      filter: brightness(1.1);
    }
    .imagen-interactiva:active {
      transform: scale(0.95);
    }
.swal2-popup {
    background: linear-gradient(135deg, #E64B6B, #6A253A) !important;
    border: 2px solid #EFE2DA;
    border-radius: 20px;
}
    </style>
</head>
<body>
    <canvas id="canvas-lluvia"></canvas>
    <?php include("includes/navpro.php"); ?>
    <div class="pantalla">
        <div class="racha">
            <h1>
        <img src="imagenes/gatito.png" alt="Elemento interactivo" class="imagen-interactiva" onclick="reproducirSonido()">  
        <script>
    const sonido = new Audio('imagenes/gatoo.mp3');
    function reproducirSonido() {
      sonido.currentTime = 0;
      sonido.play();
    }
  </script>
                <?php echo date('F'); ?>
            </h1>
            <p> Ver Reportes</p>
        </div>
        <div class="botones">
            <button onclick="reiniciarRacha()">Reporte de ventas</button>
            <a href="reportclient.php"><button>Reporte de Clientes</button></a>
            <a href="reportprodu.php"><button>Top Productos</button></a>
        </div>
    </div>
    <script>
        function reiniciarRacha() {
            window.location.href = "reportes.php";
        }
        const canvas = document.getElementById('canvas-lluvia');
        const ctx = canvas.getContext('2d');

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        }
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();
        const rutasGalletas = [
            'imagenes/galletas/galleta1.png',
            'imagenes/galletas/galleta2.png',
            'imagenes/galletas/galleta3.png',
            'imagenes/galletas/galleta4.png'
        ];

        let imagenesGalletas = [];
        let imagenesCargadas = 0;

        rutasGalletas.forEach((ruta, index) => {
            const img = new Image();
            img.src = ruta;
            img.onload = () => {
                imagenesCargadas++;
            };
            imagenesGalletas.push(img);
        });

        class CopoGalleta {
            constructor() {
                this.reiniciar();
            }
            reiniciar() {
                this.x = Math.random() * canvas.width;
                this.y = Math.random() * -canvas.height;
                this.tamano = Math.random() * 60 + 90;
                this.velocidadY = Math.random() * 1.5 + 0.5;
                this.velocidadX = Math.random() * 1 - 0.5;
                this.rotacion = Math.random() * Math.PI * 2;
                this.velocidadRotacion = (Math.random() - 0.5) * 0.02;
                this.imagenIndex = Math.floor(Math.random() * imagenesGalletas.length);
                this.opacidad = Math.random() * 0.5 + 0.3;
            }
            actualizar() {
                this.y += this.velocidadY;
                this.x += this.velocidadX;
                this.rotacion += this.velocidadRotacion;

                if (this.y > canvas.height + 100) {
                    this.reiniciar();
                    this.y = -100;
                }
            }
            dibujar() {
                if (imagenesGalletas[this.imagenIndex].complete && imagenesGalletas[this.imagenIndex].naturalWidth !== 0) {
                    ctx.save();
                    ctx.globalAlpha = this.opacidad;
                    ctx.translate(this.x, this.y);
                    ctx.rotate(this.rotacion);
                    ctx.drawImage(
                        imagenesGalletas[this.imagenIndex],
                        -this.tamano / 2,
                        -this.tamano / 2,
                        this.thisTamano || this.tamano,
                        this.thisTamano || this.tamano
                    );
                    ctx.restore();
                }
            }
        }

        const cantidadGalletas = 25;
        const lluvia = [];
        for (let i = 0; i < cantidadGalletas; i++) {
            lluvia.push(new CopoGalleta());
        }

        function animar() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            lluvia.forEach(galleta => {
                galleta.actualizar();
                galleta.dibujar();
            });
            requestAnimationFrame(animar);
        }

        animar();

document.addEventListener("DOMContentLoaded", function() {
    let timerInterval;
    Swal.fire({
        title: 'Bienvenido Administrador',
        html: 'Cargando cantidad <b></b> de reportes.',
        timer: 2000,
        timerProgressBar: true,
        background: '#E64B6B',
        color: '#EFE2DA',
        confirmButtonColor: '#6A253A',
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector('b');
            timerInterval = setInterval(() => {
                timer.textContent = Swal.getTimerLeft();
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
    }).then((result) => {
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log('Alerta cerrada correctamente');
        }
    });
});
</script>
</body>
</html>