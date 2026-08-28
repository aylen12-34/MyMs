<?php
if($_SESSION['Estado']=='bloqueado'){
    header("Location:../cuentas/verbloqueo.php");
}