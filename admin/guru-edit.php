<?php 
include('../inc/inc_koneksi.php');

session_start();
if($_SESSION['guru_username']==''){
    header("location:formlogin.php");
    exit();
}


$nama = "";
$kelas = "";
$gambar = "";
$aksi ="";
$eror = "";
$sukses = "";

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
//oprasi hapus
if($op == 'delete'){
    $id = $_GET['id'];
    $query = "SELECT gambar FROM halaman WHERE id = $id";
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_array($result)){ 
    $namafile = $row['gambar'];
    $folder = '../gambar/';
    $lokasi = $folder.$namafile;
    if (file_exists($lokasi)){
        unlink($lokasi);
    }
    
    }    
    $id = $_GET['id'];
    $sql1 = "delete from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);

    if($q1){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
    }
}
//oprasi hapus data final
if($op == 'deletefinal'){
    $id = $_GET['id'];
    $sql1 = "select * from final where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);

    if(mysqli_num_rows($q1) > 0){
    $id = $_GET['id'];
    $query = "SELECT gambar FROM final WHERE id = $id";
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_array($result)){ 
    $namafile = $row['gambar'];
    $folder = '../gambar/';
    $lokasi = $folder.$namafile;
    if (file_exists($lokasi)){
        unlink($lokasi);
    }
    
    }    
    $id = $_GET['id'];
    $sql1 = "delete from final where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);

    if($q1){
        echo "<script>alert('Data Berhasil Dihapus');</script>";
    }
}}
//oprasi publish
if($op == 'publish'){   
    $id = $_GET['id'];
    $sql1 = "select * from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);

    if(mysqli_num_rows($q1) > 0){
        $r1 = mysqli_fetch_array($q1);
        $pub = "insert into final (nama, kelas, tgl_isi, aksi, gambar) values ('".$r1['nama']."','".$r1['kelas']."','".$r1['tgl_isi']."','".$r1['aksi']."','".$r1['gambar']."')";
        $q2 = mysqli_query($koneksi,$pub);
        if ($q2 === TRUE){
            $id = $_GET['id'];
            $sql1 = "delete from halaman where id = '$id'";
            $q1 = mysqli_query($koneksi,$sql1);

            if($q1){
                echo "<script>alert('Data Berhasil Dipublish');</script>";
            }            
        }else{
            echo "<script>alert('Data Gagal Dipublish');</script>";
        }
        
    }else{
        echo "<script>alert('Data Tidak Ada');</script>";
    }
}
//upload data
if($op == 'edit'){   
    $id = $_GET['id'];
if(isset($_POST['perbarui'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $aksi  =$_POST['aksi'];
    $tgl_isi  =$_POST['tgl'];
    $gambarurl = $_GET['img'];    

    $gambarup = '';
if (!empty($gambar)) {
    $query = "SELECT gambar FROM halaman WHERE id = $id";
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_array($result)){ 
    $namafile = $row['gambar'];
    $folder = '../gambar/';
    $lokasi = $folder.$namafile;
    if (file_exists($lokasi)){
        unlink($lokasi);
    }
    
    }
    $gambarup = $gambar;
    $foto_tmp = $_FILES['gambar']['tmp_name'];
move_uploaded_file($foto_tmp, '../gambar/'.$gambarup);
} else {
    $gambarup = $gambarurl;
}

        $sql1 = "update halaman set nama='$nama',kelas='$kelas',aksi='$aksi',gambar='$gambarup',tgl='$tgl_isi' where id ='$id'";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            header("Location: guru.php?op=success&id=1");
    exit;
        }else{
            echo "<script>alert('Gagal Memperbarui);</script>";
        }
    
}}
//login
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
//oprasi edit

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

    <title>Menu Guru Moodis</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>MOODIS-Edit Data</h1>
                    </div>
                    <ul class="menu menubro">

                        <li class="active"><a href="guru.php">Kembali</a></li>
                    </ul>
                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>

            </div>
        </div>

        <?php if($op == 'edit'){
    $id = $_GET['id'];
    $query = "SELECT * FROM halaman WHERE id = $id";
    $result = mysqli_query($koneksi,$query);
    while($row = mysqli_fetch_array($result)){ 
        $dir_foto = "../gambar/";
        $linkfoto = $row['gambar'];
        $urlfoto = $dir_foto.$linkfoto;
        $tgl = $row['tgl'];

if (!empty($tgl)) {
    $tgl_isi = $tgl;
} else {
    $tgl_isi = $row['tgl_isi'];
}
    
?> <div class="hero">
            <div class="container">
                <div class="containerlaporr blur " id="edit">

                    <form action="" method="post" enctype="multipart/form-data" class="tama">
                        <label for="nama">Nama Siswa</label><br />
                        <input type="text" required id="nama" value="<?php echo $row['nama'] ?>" name="nama"
                            placeholder="Masukan Nama" /><br />
                        <label for="kelas">Kelas</label><br />
                        <input type="text" id="kelas" required value="<?php echo $row['kelas'] ?>" name="kelas"
                            placeholder="Masukan Kelas" /><br />
                        <label for="aksi">Aksi</label><br />
                        <input type="text" id="aksi" required value="<?php echo $row['aksi'] ?>"
                            placeholder="Masukan Aksi" name="aksi" /><br />
                        <label for="aksi">Waktu</label><br />
                        <input type="text" id="tgl" required value="<?php echo $tgl_isi ?>" placeholder="Masukan Waktu"
                            name="tgl" /><br />
                        <label for="gambar">Bukti</label><br />
                        <label><?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                            <?php echo "<img src='../gambar/".$row['gambar']."' class='lap' style='width:80px; height:80px'>"?>
                            <?php    '</a>'?></label><br />
                        <input type="file" id="gambar" name="gambar"
                            accept="image/jpeg, image/png, image/gif, image/mp4" /><br />

                        <button type="submit" name="perbarui">Perbarui </button>
                    </form>
                </div>
            </div>
        </div><?php }    
    
}?>

    </header>


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
                    <p>&copy; Copyright by <span><a class="deco">Kelompok 3 (XI.3) </a></span> SMAN 1
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