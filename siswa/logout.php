<?php 
session_start();
unset($_SESSION['siswa_username']);
session_destroy();
header("location:../index.php")
?>