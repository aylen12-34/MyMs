<?php
session_start();
session_destroy();
header ("location:portada publica.php");
?>