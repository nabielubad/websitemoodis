<?php 
session_start();
if(isset($_SESSION['admin_username'])){
    header("location:logout.php");
    exit();
}else{
    header("location:../index.php");
    exit();
}
?>