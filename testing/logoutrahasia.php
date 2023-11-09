<?php 
session_start();
unset($_SESSION['admin_rahasia']);
session_destroy();
header("location:../index.php")
?>