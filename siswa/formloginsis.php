<?php 
session_start();
if(isset($_SESSION['siswa_username'])!=''){
    header("location:index.php");
    exit();
}
include("../inc/inc_koneksi.php");

$username   = "";
$password   = "";
$eror       = "";
$nisn = "";

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
            echo "<script>alert('Username Tidak Ada');</script>";
        }elseif($r1['password'] != md5($password)){
            echo "<script>alert('Password Salah');</script>";
        }else{
            $_SESSION['siswa_username']     = $username;
            header("location:index.php");
            exit();
        }
    }
}
if(isset($_POST['registrasi'])){
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $nisn       = $_POST['nisn'];
    $pw       = md5($password);
    $us = md5($username);

    $sql1 = "select * from siswa where nisn = '$nisn'";
    $sql2 = "select * from siswa where nama = '$username'";
    $q1 = mysqli_query($koneksi,$sql1);
    $q2 = mysqli_query($koneksi,$sql2);
    if (mysqli_num_rows($q1) > 0){
        echo "<script>alert('NISN Telah Terdaftar');</script>";
    }elseif (mysqli_num_rows($q2) > 0){
        echo "<script>alert('Username Sudah Ada');</script>";
    }else{
        $sql1 = "insert into siswa(username, password, nisn, nama) values ('$us','$pw','$nisn','$username')";
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            echo "<script>alert('Username Berhasil Ditambahkan');</script>";
        }else{
            echo "<script>alert('Username Gagal Ditambahkan');</script>";
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../dist/stylelogin.css" />
    <link rel="icon" href="../assets/img/icon.png" />
    <title>Login-Moodis</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="" class="sign-in-form" method="POST">
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="" id="username" name="username" placeholder="Username"
                            value="<?php echo $username?>" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" required class="" id="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Login" name="Login" class=" btn solid" />
                    <p class="social-text">Atau Login Dengan Flatform lain</p>
                    <div class="social-media">


                        <a href="" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div>
                </form>
                <form action="" method="POST" class="sign-up-form">
                    <h2 class="title">Registrasi</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" pattern="[0-9]{5}" title="NISN harus terdiri dari 5 angka" class="" id="nisn"
                            name="nisn" placeholder="NISN" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" class="" id="username" name="username" placeholder="Username"
                            value="<?php echo $username?>" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" required class="form-control" id="password" name="password"
                            placeholder="Password" />
                    </div>
                    <input type="submit" class="btn" value="Registrasi" />
                    <p class="social-text">Atau Registrasi Dengan Flatfrom Lain</p>
                    <div class="social-media">

                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>

                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Kamu baru disini yah?</h3>
                    <p>
                        Belum punya akun? Registrasi sekarang!
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Registrasi
                    </button>
                </div>
                <img src="../assets/img/moodis1.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Hai bro!</h3>
                    <p>
                        Belum bisa melaporkan? Ayo login!
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </div>
                <img src="../assets/img/moodis1.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="../dist/js/app.js"></script>
</body>

</html>