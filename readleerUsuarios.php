<?php
$usuario = "root";
$contraseña = "";     
$direccion = "localhost";
$baseDeDatos = "MYMS";    

$conexion=new mysqli($direccion, $usuario, $contraseña, $baseDeDatos);
if ($conexion->connect_error) {
    
    echo "No se ha podido conectar a la base de datos";
}

$sql = "SELECT * FROM Usuarios";
$resultado = $conexion->query($sql);
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_assoc()) {
        echo    "<br>"."CI: ".$fila["CI"]."<br>". "Nombre: " .$fila["Nombre"] ."<br>". "Dirección: " . $fila["Direccion"] ."<br>"." Celular: " . $fila["Celular"] ."<br>"."Rol: " . $fila["Rol"] ."<br>"."Estado: " . $fila["Estado"] . "<br>";
        $CI=$fila['CI'];
        echo "<a href='readleerUsuario.php? CI=$CI'><button>Mostrar</button></a>";
    }
}

 /*if($resultado->num_rows > 0) {
          while ($fila=$resultado->fetch_assoc()) {
              $CI=$fila['CI'];
              echo "<tr>";
              echo "<td>".$fila['CI']."</td>";
              echo "<td>".$fila['CI']."</td>";
              echo "<td>".$fila['CI']."</td>";
              echo "<td>".$fila['CI']."</td>";
              echo "<td>
                      <a href='formUpdateUsuario.php?CI=$CI'><button>Editar</button></a>
                      <a href='eliminar.php?CI=$CI'><button>Eliminar</button></a>
                      <a href='readleerUsuario.php?CI=$CI'><button>Mostrar</button></a>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='5'>No hay ventas registradas</td></tr>";
      }
      $conexion->close();*/
?>