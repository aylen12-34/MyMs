<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    
$conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "No se ha podido conectar a la base de datos";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>M&M's - Categorías</title>

<link rel="stylesheet" href="tipografia/Fonts/WEB/css/chillax.css">
<link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Cinzel+Decorative&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Chillax-Semibold', 'Poppins', sans-serif;
}

.seccion-luces-menu {
    position: relative;
    width: 100%;
    min-height: 380px;
    padding: 50px 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-sizing: border-box;
    overflow: hidden;
}

.encabezado-luces {
    text-align: center;
    margin-bottom: 25px;
    z-index: 2;
}

.encabezado-luces span {
    color: #E64B6B;
    font-size: 0.85rem;
    letter-spacing: 4px;
    text-transform: uppercase;
    font-weight: 600;
}

.encabezado-luces h2 {
    color: #2D2725;
    font-size: 2.2rem;
    letter-spacing: 2px;
    margin-top: 4px;
    text-transform: uppercase;
    font-weight: 400;
}

.guirnalda-escena {
    position: relative;
    width: 100%;
    max-width: 900px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.cable-guirnalda {
    position: relative;
    width: 100%;
    height: 60px;
    border-bottom: 2px dashed rgba(45, 39, 37, 0.2);
    border-radius: 0 0 50% 50% / 0 0 40px 40px;
    margin-bottom: 20px;
}

.luces-contenedor {
    position: absolute;
    top: 35px;
    width: 100%;
    display: flex;
    justify-content: space-around;
    padding: 0 20px;
    box-sizing: border-box;
}

.foco-item {
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    cursor: pointer;
    transform-origin: top center;
    animation: balanceoFoco 4s ease-in-out infinite alternate;
}

.foco-item:nth-child(2) { animation-delay: -0.8s; }
.foco-item:nth-child(3) { animation-delay: -1.6s; }
.foco-item:nth-child(4) { animation-delay: -2.4s; }
.foco-item:nth-child(5) { animation-delay: -3.2s; }

@keyframes balanceoFoco {
    0% { transform: rotate(-4deg); }
    100% { transform: rotate(4deg); }
}

.hilo-foco {
    width: 2px;
    height: 25px;
    background: #2D2725;
    opacity: 0.4;
}

.soquete-foco {
    width: 16px;
    height: 10px;
    background: #8E827E;
    border-radius: 3px 3px 0 0;
    box-shadow: inset 0 2px 4px rgba(0,0,0,0.2);
}

.foco-luz {
    width: 58px;
    height: 58px;
    border-radius: 50%;
    background: #FFFFFF;
    border: 2px solid #EAE3DE;
    color: #2D2725;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    box-shadow: 0 8px 20px rgba(45, 39, 37, 0.08);
    transition: all 0.35s ease;
}

.foco-item:hover .foco-luz {
    transform: scale(1.1);
    border-color: #E64B6B;
    color: #E64B6B;
}

.foco-item.encendido .foco-luz {
    background: #E64B6B;
    border-color: #E64B6B;
    color: #FFFFFF;
    box-shadow: 0 0 25px rgba(230, 75, 107, 0.7), 0 10px 25px rgba(230, 75, 107, 0.4);
    transform: scale(1.15);
}

.foco-etiqueta {
    margin-top: 8px;
    font-size: 0.8rem;
    color: #6E6562;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    font-weight: 600;
    transition: color 0.3s ease;
}

.foco-item.encendido .foco-etiqueta {
    color: #E64B6B;
}

.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(45, 39, 37, 0.45);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.35s ease;
    padding: 20px;
}

.modal-overlay.activo {
    opacity: 1;
    pointer-events: auto;
}

.tarjeta-emergente {
    position: relative;
    width: 100%;
    max-width: 420px;
    background: #FFFFFF;
    border-radius: 32px;
    border: 1px solid #EAE3DE;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transform: scale(0.8) translateY(20px);
    transition: transform 0.35s cubic-bezier(0.25, 1, 0.5, 1);
}

.modal-overlay.activo .tarjeta-emergente {
    transform: scale(1) translateY(0);
}

.btn-cerrar-modal {
    position: absolute;
    top: 15px;
    right: 15px;
    width: 36px;
    height: 36px;
    background: rgba(255, 255, 255, 0.85);
    border: 1px solid #EAE3DE;
    border-radius: 50%;
    color: #2D2725;
    font-size: 1rem;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 10;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    transition: all 0.25s ease;
}

.btn-cerrar-modal:hover {
    background: #E64B6B;
    color: #FFFFFF;
    border-color: #E64B6B;
    transform: scale(1.1);
}

.emergente-banner {
    position: relative;
    height: 190px;
    width: 100%;
    background-size: cover;
    background-position: center;
    transition: background-image 0.4s ease;
}

.emergente-banner::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.02) 40%, rgba(255,255,255,1) 100%);
}

.emergente-badge {
    position: absolute;
    bottom: -18px;
    left: 25px;
    width: 48px;
    height: 48px;
    background: #E64B6B;
    color: #FFFFFF;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    box-shadow: 0 8px 20px rgba(230, 75, 107, 0.35);
    z-index: 2;
}

.emergente-cuerpo {
    padding: 26px 24px 25px 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.emergente-cuerpo h3 {
    color: #2D2725;
    font-size: 1.55rem;
    text-transform: uppercase;
    margin-bottom: 8px;
    letter-spacing: 1px;
}

.emergente-cuerpo ul {
    list-style: none;
    max-height: 160px;
    overflow-y: auto;
    scrollbar-width: thin;
    scrollbar-color: #E64B6B transparent;
}

.emergente-cuerpo ul::-webkit-scrollbar { width: 3px; }
.emergente-cuerpo ul::-webkit-scrollbar-thumb { background-color: #E64B6B; border-radius: 3px; }

.emergente-cuerpo li {
    position: relative;
    padding-left: 16px;
    margin: 6px 0;
    color: #6E6562;
    font-size: 0.92rem;
    line-height: 1.35;
}

.emergente-cuerpo li::before {
    content: "•";
    position: absolute;
    left: 0;
    color: #E64B6B;
    font-weight: bold;
}

@media (max-width: 768px) {
    .luces-contenedor { padding: 0 5px; }
    .foco-luz { width: 46px; height: 46px; font-size: 1rem; }
    .foco-etiqueta { font-size: 0.7rem; }
    .tarjeta-emergente { max-width: 320px; }
    .emergente-banner { height: 150px; }
}
</style>
</head>

<body>

<main>
<section class="seccion-luces-menu">
    <div class="guirnalda-escena">
        <div class="cable-guirnalda">
            <div class="luces-contenedor">
                <div class="foco-item" data-title="Galletas" data-icon="fa-cookie" data-bg="../../imagenes/categoria/1.png">
                    <div class="hilo-foco"></div>
                    <div class="soquete-foco"></div>
                    <div class="foco-luz">
                        <i class="fa-solid fa-cookie"></i>
                    </div>
                    <span class="foco-etiqueta">Galletas</span>
                    <template class="php-data">
                        <?php
                        $resultado = $conexion->query("SELECT Nombre FROM Productos WHERE Codigo BETWEEN 1 AND 7");
                        if ($resultado && $resultado->num_rows > 0) {
                            while($fila = $resultado->fetch_assoc()) {
                                echo "<li>" . htmlspecialchars($fila['Nombre']) . "</li>";
                            }
                        } else {
                            echo "<li>No hay productos registrados</li>";
                        }
                        ?>
                    </template>
                </div>
                <div class="foco-item" data-title="Croissants" data-icon="fa-wheat-awn" data-bg="../../imagenes/categoria/3.png">
                    <div class="hilo-foco"></div>
                    <div class="soquete-foco"></div>
                    <div class="foco-luz">
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                    <span class="foco-etiqueta">Croissants</span>
                    <template class="php-data">
                        <?php
                        $resultado2 = $conexion->query("SELECT Nombre FROM Productos WHERE Codigo BETWEEN 8 AND 13");
                        if ($resultado2 && $resultado2->num_rows > 0) {
                            while($fila = $resultado2->fetch_assoc()) {
                                echo "<li>" . htmlspecialchars($fila['Nombre']) . "</li>";
                            }
                        }
                        ?>
                    </template>
                </div>
                <div class="foco-item" data-title="Bebidas Frías" data-icon="fa-snowflake" data-bg="../../imagenes/categoria/2.png">
                    <div class="hilo-foco"></div>
                    <div class="soquete-foco"></div>
                    <div class="foco-luz">
                        <i class="fa-regular fa-snowflake"></i>
                    </div>
                    <span class="foco-etiqueta">Frías</span>
                    <template class="php-data">
                        <?php
                        $resultado3 = $conexion->query("SELECT Nombre FROM Productos WHERE Codigo BETWEEN 14 AND 19");
                        if ($resultado3 && $resultado3->num_rows > 0) {
                            while($fila = $resultado3->fetch_assoc()) {
                                echo "<li>" . htmlspecialchars($fila['Nombre']) . "</li>";
                            }
                        }
                        ?>
                    </template>
                </div>
                <div class="foco-item" data-title="Bebidas Calientes" data-icon="fa-mug-hot" data-bg="../../imagenes/categoria/4.jpg">
                    <div class="hilo-foco"></div>
                    <div class="soquete-foco"></div>
                    <div class="foco-luz">
                        <i class="fa-solid fa-mug-hot"></i>
                    </div>
                    <span class="foco-etiqueta">Calientes</span>
                    <template class="php-data">
                        <?php
                        $resultado4 = $conexion->query("SELECT Nombre FROM Productos WHERE Codigo BETWEEN 20 AND 24");
                        if ($resultado4 && $resultado4->num_rows > 0) {
                            while($fila = $resultado4->fetch_assoc()) {
                                echo "<li>" . htmlspecialchars($fila['Nombre']) . "</li>";
                            }
                        }
                        ?>
                    </template>
                </div>
                <div class="foco-item" data-title="Brownies" data-icon="fa-bread-slice" data-bg="../../imagenes/categoria/5.jpg">
                    <div class="hilo-foco"></div>
                    <div class="soquete-foco"></div>
                    <div class="foco-luz">
                        <i class="fa-solid fa-bread-slice"></i>
                    </div>
                    <span class="foco-etiqueta">Brownies</span>
                    <template class="php-data">
                        <?php
                        $resultado5 = $conexion->query("SELECT Nombre FROM Productos WHERE Codigo BETWEEN 25 AND 29");
                        if ($resultado5 && $resultado5->num_rows > 0) {
                            while($fila = $resultado5->fetch_assoc()) {
                                echo "<li>" . htmlspecialchars($fila['Nombre']) . "</li>";
                            }
                        }
                        ?>
                    </template>
                </div>

            </div>
        </div>

    </div>

</section>

<div class="modal-overlay" id="modalOverlay">
    <div class="tarjeta-emergente">
        <button class="btn-cerrar-modal" id="btnCerrarModal" aria-label="Cerrar">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="emergente-banner" id="emergenteBanner">
            <div class="emergente-badge" id="emergenteBadge"></div>
        </div>
        <div class="emergente-cuerpo">
            <h3 id="emergenteTitle"></h3>
            <ul id="emergenteList"></ul>
        </div>
    </div>
</div>

</main>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const focos = Array.from(document.querySelectorAll('.foco-item'));
    const modalOverlay = document.getElementById('modalOverlay');
    const btnCerrarModal = document.getElementById('btnCerrarModal');
    const emergenteBanner = document.getElementById('emergenteBanner');
    const emergenteBadge = document.getElementById('emergenteBadge');
    const emergenteTitle = document.getElementById('emergenteTitle');
    const emergenteList = document.getElementById('emergenteList');
    
    let audioCtx = null;
    function playBubbleSound() {
        try {
            if (!audioCtx) audioCtx = new (window.AudioContext || window.webkitAudioContext)();
            if (audioCtx.state === 'suspended') audioCtx.resume();
            
            const osc = audioCtx.createOscillator();
            const gain = audioCtx.createGain();
            
            osc.type = 'sine';
            osc.frequency.setValueAtTime(320, audioCtx.currentTime);
            osc.frequency.exponentialRampToValueAtTime(880, audioCtx.currentTime + 0.12);
            
            gain.gain.setValueAtTime(0.08, audioCtx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, audioCtx.currentTime + 0.12);
            
            osc.connect(gain);
            gain.connect(audioCtx.destination);
            
            osc.start();
            osc.stop(audioCtx.currentTime + 0.12);
        } catch(e) {}
    }

    function abrirModal(focoActivo) {
        focos.forEach(f => f.classList.remove('encendido'));
        focoActivo.classList.add('encendido');

        emergenteTitle.textContent = focoActivo.dataset.title;
        emergenteBanner.style.backgroundImage = `url('${focoActivo.dataset.bg}')`;
        emergenteBadge.innerHTML = `<i class="fa-solid ${focoActivo.dataset.icon}"></i>`;

        const template = focoActivo.querySelector('.php-data');
        if (template) {
            emergenteList.innerHTML = template.innerHTML;
        }

        modalOverlay.classList.add('activo');
    }

    function cerrarModal() {
        modalOverlay.classList.remove('activo');
        focos.forEach(f => f.classList.remove('encendido'));
    }

    focos.forEach(foco => {
        foco.addEventListener('click', function() {
            playBubbleSound();
            abrirModal(this);
        });
    });

    btnCerrarModal.addEventListener('click', cerrarModal);
    modalOverlay.addEventListener('click', function(e) {
        if (e.target === modalOverlay) {
            cerrarModal();
        }
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modalOverlay.classList.contains('activo')) {
            cerrarModal();
        }
    });
});
</script>
</body>
</html>
<?php
$conexion->close();
?>