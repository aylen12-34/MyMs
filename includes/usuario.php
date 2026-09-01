<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}

// Obtener datos de la tabla usuarios
$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Acordeón de Usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Estilos ajustados al contenedor y formato original */
        .contenedor-acordeon {
            display: flex;
            width: 720px;
            height: 400px;
            gap: 10px;
        }

        .tarjeta-acordeon {
            position: relative;
            flex: 1;
            border-radius: 20px;
            background-size: cover;
            background-position: center;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .tarjeta-acordeon.active {
            flex: 5;
        }

        .icono {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 0, 149, 0.2);
            backdrop-filter: blur(5px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            z-index: 2;
        }

        .contenido {
            position: absolute;
            bottom: 20px;
            left: 20px;
            right: 20px;
            color: #fff;
            z-index: 2;
        }

        .contenido h3 {
            font-size: 1.4rem;
            margin-bottom: 5px;
            white-space: nowrap;
        }

        .contenido p {
            font-size: 0.9rem;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        .tarjeta-acordeon.active .contenido p {
            opacity: 1;
            transform: translateY(0);
        }

        /* Botones integrados respetando el espacio del acordeón */
        .acciones-db {
            display: flex;
            gap: 8px;
            margin-top: 10px;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease 0.1s;
        }

        .tarjeta-acordeon.active .acciones-db {
            opacity: 1;
            transform: translateY(0);
        }

        .btn-db {
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.8rem;
            text-decoration: none;
            color: white;
            font-weight: bold;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-actualizar { background-color: #6A253A; }
        .btn-eliminar { background-color: #6A253A; }
        
        .btn-agregar-global {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #E64B6B;
            color: white;
            padding: 10px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

    <!-- Botón para ir a agregar.php -->
    <a href="Usuario/formRegistroUsuario.php" class="btn-agregar-global">
        <i class="fa-solid fa-user-plus"></i> Agregar Usuario
    </a>

    <!-- Contenedor Acordeón Original -->
    <div class="contenedor-acordeon">
        <?php 
        $primerItem = true;
        if ($resultado && $resultado->num_rows > 0):
            while($usuario = $resultado->fetch_assoc()): 
                $claseActiva = $primerItem ? 'active' : '';
                $primerItem = false;
        ?>
            <div class="tarjeta-acordeon <?php echo $claseActiva; ?>" 
                 onclick="seleccionar(this)" 
                 style="background-image: url('<?php echo htmlspecialchars($usuario['imagen']); ?>');">
                
                <div class="icono">
                    <i class="fa-solid fa-user"></i>
                </div>
                
                <div class="contenido">
                    <h3><?php echo htmlspecialchars($usuario['Nombre']); ?></h3>
                    <p><i class="fa-solid fa-id-badge"></i> CI: <?php echo htmlspecialchars($usuario['CI']); ?></p>
                    <p><i class="fa-solid fa-id-badge"></i> Rol: <?php echo htmlspecialchars($usuario['Rol']); ?></p>
                    <p><i class="fa-solid fa-id-badge"></i> Direccion: <?php echo htmlspecialchars($usuario['Direccion']); ?></p>
                    <p><i class="fa-solid fa-id-badge"></i> Estado: <?php echo htmlspecialchars($usuario['Estado']); ?></p>
                    <p><i class="fa-solid fa-id-badge"></i> Celular: <?php echo htmlspecialchars($usuario['Celular']); ?></p>
                    
                    <!-- Botones que dirigen a archivos PHP independientes -->
                    <div class="acciones-db">
                        <a href="Usuario/formUpdateUsuario.php?CI=<?php echo $usuario['CI']; ?>" 
                           class="btn-db btn-actualizar" 
                           onclick="event.stopPropagation();">
                            <i class="fa-solid fa-pen"></i> Actualizar
                        </a>
                        
                        <a href="Usuario/eliminarUsuario.php?CI=<?php echo $usuario['CI']; ?>" 
                           class="btn-db btn-eliminar" 
                           onclick="event.stopPropagation(); return confirm('¿Eliminar usuario con ID <?php echo $usuario['CI']; ?>?');">
                            <i class="fa-solid fa-trash"></i> Eliminar
                        </a>
                    </div>
                </div>
            </div>
        <?php 
            endwhile;
        endif; 
        ?>
    </div>

    <script>
        function seleccionar(elemento) {
            document.querySelectorAll('.tarjeta-acordeon').forEach(tarjeta => {
                tarjeta.classList.remove('active');
            });
            elemento.classList.add('active');
        }
    </script>

</body>
</html>