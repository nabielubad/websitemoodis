<?php 
session_start();
unset($_SESSION['guru_username']);
session_destroy();
header("location:../index.php")
?>