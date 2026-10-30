<?php
    $usuario = "root";
    $contraseña = "";     
    $direccion = "localhost";
    $baseDeDatos = "MYMS";    
    $conexion = new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    echo "No se ha podido conectar a la base de datos";}
$sql_carrusel = "SELECT * FROM usuarios LIMIT 6";
$res_carrusel = $conexion->query($sql_carrusel);

$usuarios_carrusel = [];
if ($res_carrusel && $res_carrusel->num_rows > 0) {
    while($row = $res_carrusel->fetch_assoc()) {
        $usuarios_carrusel[] = $row;
    }
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.carrusel-seccion {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 10px 0;
}

.carrusel-seccion .header-acciones {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
    flex-wrap: wrap;
    justify-content: center;
}

.carrusel-seccion .btn-agregar-global {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background-color: #E64B6B;
    color: #EFE2DA;
    padding: 10px 16px;
    border-radius: 10px;
    text-decoration: none;
    font-weight: bold;
    font-size: 0.85rem;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(230, 75, 107, 0.3);
}

.carrusel-seccion .btn-agregar-global:hover {
    transform: translateY(-2px);
    background-color: #6A253A;
}

.carrusel-seccion .carrusel-contenedor {
    position: relative;
    width: 100%;
    max-width: 100%;
    height: 400px;
    margin: 0 auto;
    perspective: 1000px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.carrusel-seccion .carrusel-pista {
    position: relative;
    width: 100%;
    height: 100%;
    transform-style: preserve-3d;
}

.carrusel-seccion .tarjeta-carrusel {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 250px;
    height: 370px;
    margin-top: -185px;
    margin-left: -125px;
    border-radius: 16px;
    background: #6A253A;
    border: 1px solid rgba(239, 226, 218, 0.3);
    box-shadow: 0 12px 30px rgba(0,0,0,0.3);
    overflow: hidden;
    transition: transform 0.5s cubic-bezier(0.25, 1, 0.5, 1), 
                opacity 0.5s cubic-bezier(0.25, 1, 0.5, 1),
                z-index 0.5s;
    cursor: pointer;
    user-select: none;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="0"] {
    transform: translate3d(0, 0, 0) scale(1);
    z-index: 10;
    opacity: 1;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="1"] {
    transform: translate3d(140px, 0, -100px) rotateY(-15deg) scale(0.82);
    z-index: 5;
    opacity: 0.7;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="-1"] {
    transform: translate3d(-140px, 0, -100px) rotateY(15deg) scale(0.82);
    z-index: 5;
    opacity: 0.7;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="2"] {
    transform: translate3d(240px, 0, -200px) rotateY(-25deg) scale(0.65);
    z-index: 2;
    opacity: 0.3;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="-2"] {
    transform: translate3d(-240px, 0, -200px) rotateY(25deg) scale(0.65);
    z-index: 2;
    opacity: 0.3;
}

.carrusel-seccion .tarjeta-carrusel[data-pos="oculto"] {
    transform: translate3d(0, 0, -300px) scale(0.4);
    z-index: 0;
    opacity: 0;
    pointer-events: none;
}

.carrusel-seccion .tarjeta-header {
    height: 140px;
    background-size: cover;
    background-position: center;
    position: relative;
}

.carrusel-seccion .tarjeta-header::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.1) 55%, #6A253A 100%);
}

.carrusel-seccion .icono-avatar {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: rgba(230, 75, 107, 0.6);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #EFE2DA;
    z-index: 2;
    font-size: 0.85rem;
}

.carrusel-seccion .tarjeta-body {
    padding: 10px 14px 14px;
    display: flex;
    flex-direction: column;
    gap: 5px;
    text-align: left;
}

.carrusel-seccion .tarjeta-body h3 {
    font-size: 1.05rem;
    color: #EFE2DA;
    margin-bottom: 2px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.carrusel-seccion .info-linea {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.78rem;
    color: #EFE2DA;
}

.carrusel-seccion .info-linea i {
    width: 14px;
    color: #E64B6B;
    text-align: center;
}

.carrusel-seccion .badge-estado {
    display: inline-block;
    padding: 1px 6px;
    border-radius: 10px;
    font-size: 0.7rem;
    background: rgba(239, 226, 218, 0.2);
    color: #EFE2DA;
}

.carrusel-seccion .acciones-db {
    display: flex;
    gap: 6px;
    margin-top: 6px;
    padding-top: 6px;
    border-top: 1px solid rgba(239, 226, 218, 0.2);
}

.carrusel-seccion .btn-db {
    flex: 1;
    padding: 6px 8px;
    border-radius: 6px;
    font-size: 0.75rem;
    text-decoration: none;
    color: #EFE2DA;
    font-weight: bold;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    transition: background 0.2s;
}

.carrusel-seccion .btn-actualizar { background-color: #E64B6B; }
.carrusel-seccion .btn-actualizar:hover { background-color: #c73b58; }
.carrusel-seccion .btn-eliminar { background-color: rgba(0,0,0,0.3); border: 1px solid #E64B6B; }
.carrusel-seccion .btn-eliminar:hover { background-color: #E64B6B; }

.carrusel-seccion .carrusel-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #6A253A;
    border: 1px solid rgba(239, 226, 218, 0.4);
    color: #EFE2DA;
    font-size: 1rem;
    cursor: pointer;
    z-index: 20;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s;
}

.carrusel-seccion .carrusel-btn:hover {
    background: #E64B6B;
}

.carrusel-seccion .carrusel-btn.prev { left: -5px; }
.carrusel-seccion .carrusel-btn.next { right: -5px; }

.carrusel-seccion .carrusel-puntos {
    display: flex;
    gap: 6px;
    justify-content: center;
    margin-top: 10px;
}

.carrusel-seccion .punto {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(106, 37, 58, 0.3);
    cursor: pointer;
    transition: all 0.3s;
}

.carrusel-seccion .punto.activo {
    width: 20px;
    border-radius: 8px;
    background: #E64B6B;
}
</style>

<div class="carrusel-seccion">
    <div class="header-acciones">
        <a href="Usuario/formRegistroUsuario.php" class="btn-agregar-global"><i class="fa-solid fa-user-plus"></i> Agregar</a>
        <a href="Usuario/readleerUsuarios.php" class="btn-agregar-global"><i class="fa-solid fa-users"></i> Ver Todo</a>
    </div>

    <?php if (!empty($usuarios_carrusel)): ?>
    <div class="carrusel-contenedor">
        <button class="carrusel-btn prev" onclick="moverCarrusel(-1)"><i class="fa-solid fa-chevron-left"></i></button>

        <div class="carrusel-pista" id="pistaCarrusel">
            <?php foreach ($usuarios_carrusel as $i => $u): 
                $img = !empty($u['imagen']) ? $u['imagen'] : 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500';
            ?>
                <div class="tarjeta-carrusel" 
                     data-index="<?php echo $i; ?>" 
                     onclick="seleccionarTarjetaCarrusel(<?php echo $i; ?>)">
                    
                    <div class="tarjeta-header" style="background-image: url('<?php echo htmlspecialchars($img); ?>');">
                        <div class="icono-avatar">
                            <i class="fa-solid fa-user"></i>
                        </div>
                    </div>

                    <div class="tarjeta-body">
                        <h3><?php echo htmlspecialchars($u['Nombre']); ?></h3>
                        
                        <div class="info-linea">
                            <i class="fa-solid fa-id-card"></i>
                            <span><strong>CI:</strong> <?php echo htmlspecialchars($u['CI']); ?></span>
                        </div>

                        <div class="info-linea">
                            <i class="fa-solid fa-user-tag"></i>
                            <span><strong>Rol:</strong> <?php echo htmlspecialchars($u['Rol']); ?></span>
                        </div>

                        <div class="info-linea">
                            <i class="fa-solid fa-location-dot"></i>
                            <span><strong>Dir:</strong> <?php echo htmlspecialchars($u['Direccion']); ?></span>
                        </div>

                        <div class="info-linea">
                            <i class="fa-solid fa-phone"></i>
                            <span><strong>Cel:</strong> <?php echo htmlspecialchars($u['Celular']); ?></span>
                        </div>

                        <div class="info-linea">
                            <i class="fa-solid fa-toggle-on"></i>
                            <span><strong>Estado:</strong> <span class="badge-estado"><?php echo htmlspecialchars($u['Estado']); ?></span></span>
                        </div>

                        <div class="acciones-db">
                            <a href="Usuario/formUpdateUsuario.php?CI=<?php echo $u['CI']; ?>" 
                               class="btn-db btn-actualizar" 
                               onclick="event.stopPropagation();">
                                <i class="fa-solid fa-pen"></i>
                            </a>
                            
                            <a href="Usuario/eliminarUsuario.php?CI=<?php echo $u['CI']; ?>" 
                               class="btn-db btn-eliminar" 
                               onclick="event.stopPropagation(); return confirm('¿Eliminar usuario <?php echo htmlspecialchars($u['Nombre']); ?>?');">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carrusel-btn next" onclick="moverCarrusel(1)"><i class="fa-solid fa-chevron-right"></i></button>
    </div>

    <div class="carrusel-puntos" id="puntosCarrusel">
        <?php foreach ($usuarios_carrusel as $i => $u): ?>
            <div class="punto <?php echo $i === 0 ? 'activo' : ''; ?>" onclick="seleccionarTarjetaCarrusel(<?php echo $i; ?>)"></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>

<script>
    let indiceActualCarrusel = 0;
    const tarjetasCarrusel = document.querySelectorAll('.carrusel-seccion .tarjeta-carrusel');
    const puntosCarrusel = document.querySelectorAll('.carrusel-seccion .punto');
    const totalCarrusel = tarjetasCarrusel.length;

    function actualizarVistaCarrusel() {
        tarjetasCarrusel.forEach((tarjeta, i) => {
            let diff = i - indiceActualCarrusel;

            if (diff > totalCarrusel / 2) diff -= totalCarrusel;
            if (diff < -totalCarrusel / 2) diff += totalCarrusel;

            if (diff === 0) {
                tarjeta.setAttribute('data-pos', '0');
            } else if (diff === 1) {
                tarjeta.setAttribute('data-pos', '1');
            } else if (diff === -1) {
                tarjeta.setAttribute('data-pos', '-1');
            } else if (diff === 2) {
                tarjeta.setAttribute('data-pos', '2');
            } else if (diff === -2) {
                tarjeta.setAttribute('data-pos', '-2');
            } else {
                tarjeta.setAttribute('data-pos', 'oculto');
            }
        });

        puntosCarrusel.forEach((punto, i) => {
            punto.classList.toggle('activo', i === indiceActualCarrusel);
        });
    }

    function moverCarrusel(direccion) {
        if (totalCarrusel === 0) return;
        indiceActualCarrusel = (indiceActualCarrusel + direccion + totalCarrusel) % totalCarrusel;
        actualizarVistaCarrusel();
    }

    function seleccionarTarjetaCarrusel(indice) {
        indiceActualCarrusel = indice;
        actualizarVistaCarrusel();
    }

    actualizarVistaCarrusel();
</script>