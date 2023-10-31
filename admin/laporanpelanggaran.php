<?php 
include('../inc/inc_koneksi.php');




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
if($op == 'email'){   
    $nama = $_GET['nama'];




}
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
<?php if($op == 'laporan'){
    $namaaa = $_GET['name'];
    $nama = str_replace('-', ' ', $namaaa);
    
    
    
?>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>MOODIS</h1>
                    </div>
                    <ul class="menu menubro">

                        <li class="active"><a href=""><?php echo $nama?></a></li>
                    </ul>
                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>

            </div>
        </div>

        <div class="hero">
            <div class="container">
                <div class="services " id="tambah">
                    <div class="containertbl">
                        <h1 class="namatabel1  uf">
                            Laporan Pelanggaran : <?php echo $nama?>
                        </h1>
                        <div class="box-services">
                            <table class="table bg-black">
                                <thead>
                                    <tr>

                                        <th class="col-3">Nama (Kelas) </th>


                                        <th class="col-2">Tanggal</th>
                                        <th class="col-3">Tindakan</th>
                                        <th class="col-2">Gambar</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
        $sql1 = "select * from final where nama = '$nama' order by tgl_isi desc";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor =1;
        while($r1 = mysqli_fetch_array($q1)){
            $dir_foto = "../gambar/";
            $linkfoto = $r1['gambar'];
            $urlfoto = $dir_foto.$linkfoto;
            ?>
                                    <tr>

                                        <td><?php echo $r1['nama']?> (<?php echo $r1['kelas'] ?>)</td>

                                        <td><?php echo $r1['tgl_isi']?></td>
                                        <td><?php echo $r1['aksi'] ?></td>
                                        <td>
                                            <?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                                            <?php echo "<img src='../gambar/".$r1['gambar']."' class='lap' style=''>"?>
                                            <?php    '</a>'?>
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
            </div>
        </div><?php    
    
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