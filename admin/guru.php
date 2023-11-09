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
if($op == 'success'){
    $id = $_GET['id'];
    if($id == '1'){
        echo "<script>alert('Data Berhasil Diperbarui');</script>";
    }
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
        
        $tgl= $r1['tgl'];
        if (!empty($tgl)) {
            $tgl_isi = $tgl;
        } else {
            $tgl_isi = $r1['tgl_isi'];
        }
        
        $pub = "insert into final (nama, kelas, tgl_isi, aksi, gambar) values ('".$r1['nama']."','".$r1['kelas']."','$tgl_isi','".$r1['aksi']."','".$r1['gambar']."')";
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
if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $aksi  =$_POST['aksi'];
    $foto_tmp = $_FILES['gambar']['tmp_name']; 
    if($aksi == ''){
        $error = "Silahkan isi semua data dengan benar!";
    }
    $queryCek = "SELECT * FROM final WHERE nama = '$nama' AND kelas = '$kelas' AND aksi = '$aksi' AND gambar = '$gambar'";
$result = $koneksi->query($queryCek);
    if ($result->num_rows > 0){
    echo "<script>alert('Laporan sudah ada');</script>";
    $eror ="data sudah ada";
}
    if(empty($eror)){
        
        move_uploaded_file($foto_tmp, '../gambar/'.$gambar);
        $wktu = $_POST['waktu'];
        $jam = $_POST['jam'];
        $tanggal_submit = "$wktu $jam";
      
        $sql1 = "insert into final(nama,kelas,aksi,gambar,tgl_isi) values ('$nama','$kelas','$aksi','$gambar','$tanggal_submit')";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            
            echo "<script>alert('Berhasil Melaporkan);</script>";
        }else{
            $error = "Gagal melaporkan";
        }
    }
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
                        <h1>MOODIS</h1>
                    </div>
                    <ul class="menu menubro">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#laporan">Laporan</a></li>
                        <li><a href="#tambah">Data Pelanggaran</a></li>
                        <li><a href="#kirmail">Tindakan</a></li>
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
                            HALLO <span class="halo"><?php echo $_SESSION['guru_username']?></span> <br />
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
                Laporan Siswa
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-3">Nama (Kelas)</th>
                            <th class="col-1">Tanggal</th>
                            <th class="col-2">Aksi</th>
                            <th class="col-2">Gambar</th>


                            <th class="col-2">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        $sql1 = "select * from halaman order by tgl_isi desc";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor =1;
        while($r1 = mysqli_fetch_array($q1)){
            $dir_foto = "../gambar/";
            $linkfoto = $r1['gambar'];
            $urlfoto = $dir_foto.$linkfoto;
            $tgl = $r1['tgl'];

if (!empty($tgl)) {
    $tgl_isi = $tgl;
} else {
    $tgl_isi = $r1['tgl_isi'];
}
            ?>
                        <tr>

                            <td><?php echo $r1['nama'] ?> (<?php echo $r1['kelas'] ?>)</td>
                            <td><?php echo $tgl_isi ?></td>
                            <td><?php echo $r1['aksi'] ?></td>
                            <td>
                                <?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                                <?php echo "<img src='../gambar/".$r1['gambar']."' class='lap' style=''>"?>
                                <?php    '</a>'?>
                            </td>
                            <td>
                                <div class="btnwrap">

                                    <a href="guru.php?op=delete&id=<?php echo$r1['id']?>" class="btn">Hapus</a>
                                    <a href="guru-edit.php?op=edit&id=<?php echo$r1['id']?>&img=<?php echo$r1['gambar']?>"
                                        class="btnedit">Edit</a>
                                    <a href="guru.php?op=publish&id=<?php echo$r1['id']?>"
                                        class="btnpublish">Publish</a>
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
    <div class="services" id="tambah">
        <div class="containertbl">
            <h1 class="namatabel1  uf">
                Data Pelanggaran Siswa
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>

                            <th class="col-3">Nama (Kelas) </th>

                            <th class="col-1">Tanggal</th>
                            <th class="col-3">Tindakan</th>
                            <th class="col-2">Gambar</th>
                            <th class="col-1">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        $sql1 = "select * from final order by nama asc";
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

                            <td>
                                <div class="btnwrap">
                                    <a href="guru.php?op=deletefinal&id=<?php echo$r1['id']?>" class="btn">Hapus</a>

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
    <div class="services" id="">
        <div class="containertbl" id="kirmail">
            <h1 class="namatabel1  uf">
                Kirim Email Peringatan
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-3">Nama</th>


                            <th class="col-4">Pelanggaran</th>
                            <th class="col-1">Jumlah Pelanggaran</th>
                            <th class="col-1">Fungsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
        $sql1 = "SELECT nama, GROUP_CONCAT(aksi) AS aksi,GROUP_CONCAT(tgl_isi) AS tgl_isi, COUNT(aksi) AS jumlah FROM final GROUP BY nama order by jumlah desc";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor = 1 ;

        while($r1 = mysqli_fetch_array($q1)){
            $nm = $r1['nama'] ;
            $no = "0878";
            $ns = "1212";
            $opm = "email";
            $nup = $ns.$nm.$no.$opm;
            $r1nm = $r1['nama'];
            $namaemail = str_replace(' ', '-', $r1nm);
            ?>
                        <tr>
                            <td><?php echo $nomor++?> </td>
                            <td><?php echo $r1['nama']?> </td>


                            <td><?php echo $r1['aksi'] ?></td>
                            <td>
                                <?php echo $r1['jumlah'] ?>
                            </td>

                            <td>
                                <div class="btnwrap">
                                    <a href="guruemail.php?op=email&nama=<?php echo $namaemail ?>"
                                        class="btnemail">Email</a>

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

    <div class="containerlapor " id="uss">
        <h1 class="namatabel1 bk">TAMBAH DATA</h1>
        <form action="" method="post" enctype="multipart/form-data" class="tama">
            <label for="nama">Nama Siswa</label><br />
            <input type="text" required id="nama" value="" name="nama" placeholder="Masukan Nama" /><br />
            <label for="kelas">Kelas</label><br />
            <input type="text" id="kelas" required value="" name="kelas" placeholder="Masukan Kelas" /><br />
            <label for="aksi">Aksi</label><br />
            <input type="text" id="aksi" required value="" placeholder="Masukan Aksi" name="aksi" /><br />
            <label for="aksi">Waktu</label><br />
            <input type="date" id="waktu" required value="" placeholder="Masukan Waktu" name="waktu" /><br />
            <label for="aksi">Jam</label><br />
            <input type="time" id="jam" required value="" placeholder="Masukan J    am" name="jam" /><br />
            <label for="gambar">Bukti</label><br />
            <input type="file" id="gambar" required name="gambar"
                accept="image/jpeg, image/png, image/gif, image/mp4" /><br />
            <button type="submit" name="simpan">Tambah</button>
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