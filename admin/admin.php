<?php 
include('../inc/inc_koneksi.php');

session_start();
if($_SESSION['admin_username']==''){
    header("location:master.php");
    exit();
}


$nama = "";
$kelas = "";
$gambar = "";
$aksi ="";
$error = "";
$sukses = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Data berhasil dihapus";
    }
}


if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $aksi  =$_POST['aksi'];
        $foto_tmp = $_FILES['gambar']['tmp_name'];

   
    if($aksi == ''){
        $error = "Silahkan isi semua data dengan benar!";
    }
    if(empty($error)){
        
        move_uploaded_file($foto_tmp, '../gambar/'.$gambar);
      
        $sql1 = "insert into halaman(nama,kelas,aksi,gambar) values ('$nama','$kelas','$aksi','$gambar')";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            $sukses = "Sukses melaporkan";
        }else{
            $error = "Gagal melaporkan";
        }
    }
}
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
        $sql1 = "insert into master(username, password, nama) values ('$us','$pw','$username')";
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
<html lang="en" id="home">

<head>
    <meta charset="UTF-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="../assets/img/icon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="../style.css" />

    <title>ADMIN MOODIS</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>MOODIS</h1>
                    </div>
                    <ul class="menu menubro">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#laporan">Laporan</a></li>
                        <li><a href="#tambah">Tambah Data</a></li>
                        <li><a href="#uss">Tambah Username</a></li>
                        <li class="active"><a href="logout.php">Logout</a></li>
                    </ul>
                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>
            </div>
        </div>




        </div>
        </div>

        <div class="hero">
            <div class="container">
                <div class="box-hero">
                    <div class="box">
                        <h1>
                            HALLO <span class="halo"><?php echo $_SESSION['admin_username']?></span> <br />
                            DI MENU ADMIN
                        </h1>
                        <p></p>

                    </div>
                    <div class="box">
                        <img src="../assets/img/moodis.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </header>




    <!-- laporan -->
    <div class="services" id="laporan">
        <div class="containertbl">
            <h1 class="namatabel1  uf">
                DATA SISWA
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>

                            <th class="col-3">Nama Siswa </th>
                            <th class="col-1">Kelas</th>
                            <th class="col-2">Tanggal</th>
                            <th class="col-2">Tindakan</th>

                            <th class="col-2">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        $sql1 = "select * from halaman order by id desc";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor =1;
        while($r1 = mysqli_fetch_array($q1)){
            $dir_foto = "../gambar/";
            $linkfoto = $r1['gambar'];
            $urlfoto = $dir_foto.$linkfoto;
            ?>
                        <tr>

                            <td><?php echo $r1['nama'] ?></td>
                            <td><?php echo $r1['kelas'] ?></td>
                            <td><?php echo $r1['tgl_isi'] ?></td>
                            <td><?php echo $r1['aksi'] ?></td>

                            <td>
                                <div class="btnwrap">
                                    <a href="admin.php?op=delete&id=<?php echo$r1['id']?>" class="btn">Hapus</a>
                                    <a href="<?php echo  $urlfoto  ?>" class="btngambar">Gambar</a>
                                </div>
                            </td>
                        </tr>
                        <?php
        }
        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Services -->

    <div class="containerlapor " id="tambah">
        <h1 class="namatabel1 bk">TAMBAH DATA</h1>
        <form action="" method="post" enctype="multipart/form-data" class="tama">
            <label for="nama">Nama Siswa</label><br />
            <input type="text" id="nama" value="" name="nama" placeholder="Masukan Nama" /><br />
            <label for="kelas">Kelas</label><br />
            <input type="text" id="kelas" value="" name="kelas" placeholder="Masukan Kelas" /><br />
            <label for="aksi">Aksi</label><br />
            <input type="text" id="aksi" value="" placeholder="Masukan Aksi" name="aksi" /><br />

            <label for="gambar">Bukti</label><br />
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/gif, image/mp4" /><br />
            <button type="submit" name="simpan">Tambah</button>
        </form>
    </div>

    <div class="containerlapor " id="uss">
        <h1 class="namatabel1 bk">TAMBAH USERNAME</h1>
        <form action="" method="post" enctype="multipart/form-data" class="tama">
            <label for="nama">Username</label><br />
            <input type="text" class="form-control" id="username" name="username"
                placeholder="Masukkan Username Anda" /><br />
            <label for="kelas">Password</label><br />
            <input type="text" class="form-control" id="password" name="password"
                placeholder="Masukan Password bos" /><br />

            <button type="submit" name="Login">Tambah</button>
        </form>
    </div>
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="box-footer">
                <div class="box">
                    <h2>Moodis</h2>
                    <p>Moodis, singkatan dari "Murid Disiplin," adalah sebuah aplikasi inovatif yang dirancang untuk
                        menjaga ketertiban di lingkungan sekolah. Aplikasi ini memungkinkan para siswa untuk melaporkan
                        pelanggaran tata tertib yang terjadi di sekolah kepada Guru Bimbingan Konseling (BK) sebagai
                        administrator, sehingga tindakan korektif dapat segera diambil.</p>
                </div>
                <div class="box">

                </div>
                <div class="box">
                    <p>&copy; Copyright by <span><a href="rahasia.php" class="deco">Kelompok 3 (XI.3) </a></span> SMAN 1
                        SLAWI
                        2023, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    <script src="../dist/js/script.js"></script>
</body>

</html>