<?php

session_start();
if (!isset($_SESSION['Rol'])) {
    header("Location: login.php");
    exit();

}

if ($_SESSION['Rol'] === "vendedor") {

    header("Location: vendedor.php");
    exit();

}

if ($_SESSION['Rol'] === "administrador") {

    header("Location: administrador.php");
    exit();

}
?>