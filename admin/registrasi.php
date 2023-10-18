<?php 

include("../inc/inc_koneksi.php");
include("inc_header.php");

$username   = "";
$password   = "";
$err        = "";
$sks="";

if(isset($_POST['Login'])){
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $pw       = md5($password);
    $us = md5($username);

    if($username == '' or $password == ''){
        $err    = "Silakan masukkan semua isian";
    }
    if(empty($error)){
        $sql1 = "insert into master(username, password) values ('$us','$pw')";
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            $sks = "Username telah ditambahkan";
        }else{
            $err = "Gagal melaporkan";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Login Admin MOODIS</title>
</head>

<body>
    <form action="" method="POST">
        <h1 align="center">Buat Username baru</h1>
        <?php 
        if($err){
        ?>
        <div class="alert alert-danger">
            <?php echo $err ?>
        </div>
        <?php
        }
        ?>
        <?php 
        if($sks){
        ?>
        <div class="alert alert-success">
            <?php echo $sks ?>
        </div>
        <?php
        }
        ?>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda"
                value="<?php echo $username?>" />
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password bos" />
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="Login">Login</button>
    </form>
</body>

</html>