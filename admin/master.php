<?php 
session_start();
if(isset($_SESSION['admin_username'])!=''){
    header("location:admin.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username   = "";
$password   = "";
$err        = "";

if(isset($_POST['Login'])){
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $uss=md5($username);

    if($username == '' or $password == ''){
        $err    = "Silakan masukkan semua isian";
    }else{
        $sql1   = "select * from siswa where username = '$uss'";
        $q1     = mysqli_query($koneksi,$sql1);
        $r1     = mysqli_fetch_array($q1);
        $n1     = mysqli_num_rows($q1);

        if($n1 < 1){
            $err = "Username tidak ditemukan";
        }elseif($r1['password'] != md5($password)){
            $err = "Password yang kamu masukkan tidak sesuai";
        }else{
            $_SESSION['admin_username']     = $username;
            header("location:admin.php");
            exit();
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
    <link rel="icon" href="../assets/img/icon.png" />
    <link rel="stylesheet" href="../style.css">
</head>

<body style="width:100%;max-width:330px;margin:auto;padding:15px; background-color:black;">
    <form action="" method="POST">
        <h1 style="color:white">Login</h1>
        <?php 
        if($err){
        ?>
        <div class="alert alert-danger">
            <?php echo $err ?>
        </div>
        <?php
        }
        ?>
        <div class="form-group">
            <label for="username" style="color:white">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username Anda"
                value="<?php echo $username?>" />
        </div>
        <div class="form-group">
            <label for="password" style="color:white">Password</label>
            <input type="password" class="form-control" id="password" name="password"
                placeholder="Masukan Password bos" />
        </div>
        <button type="submit" class="btn btn-primary mt-3" name="Login">Login</button>
    </form>
</body>

</html>