<?php 
include('inc/inc_koneksi.php');
$nama = "";
$kelas = "";
$gambar = "";
$aksi ="";
$error = "";
$sukses = "";

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $gambar = $_FILES['gambar']['name'];
    $aksi  =$_POST['aksi'];
        $foto_tmp = $_FILES['gambar']['tmp_name'];

   
    if($aksi == '' or $gambar ==''){
        $error = "Silahkan isi semua data dengan benar!";
    }
    if(empty($error)){
        
        move_uploaded_file($foto_tmp, 'gambar/'.$gambar);
      
        $sql1 = "insert into halaman(nama,kelas,aksi,gambar) values ('$nama','$kelas','$aksi','$gambar')";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            $sukses = "Sukses melaporkan";
        }else{
            $error = "Gagal melaporkan";
        }
    }
}?>
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
    <link rel="icon" href="assets/img/icon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>MOODIS - Murid Disiplin</title>
</head>

<body>
    <header>
        <div class="navbar">
            <div class="container">
                <div class="box-navbar">
                    <div class="logo">
                        <h1>MOODIS</h1>
                    </div>
                    <ul class="menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#guru">Guru</a></li>
                        <li><a href="#laporan">Laporan</a></li>
                        <li><a href="#laporkan">Laporkan!</a></li>
                        <li class="active"><a href="admin/master.php">Login</a></li>
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
                            MENJADI DISIPLIN <br />
                            DARI YANG TERDISIPLIN!
                        </h1>
                        <p>Kedisiplinan adalah kunci kesuksesan siswa di SMA Negeri 1 Slawi, membantu mereka
                            mengembangkan karakter kuat dan siap menghadapi masa depan.</p>
                        <button onclick="arahkanKeTujuan()">LAPORKAN!</button>
                    </div>
                    <div class="box">
                        <img src="assets/img/ngapung.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 class="namatabel1" id="guru">
            DAFTAR GURU BK SMAN 1 SLAWI
        </h1>
        <div class="bodi">
            <section class="cards">

                <article class="card">
                    <div class="card-info-hover">


                    </div>
                    <div class="card-img"></div>
                    <a href="https://wa.me/+628789898034265" target="_blank">
                        <div class="card-img-hover" style="background-image: url(assets/img/solo.JPG);">
                        </div>
                    </a>
                    <div class="card-info">

                        <h3 class="card-title">Gunawan FC</h3>
                        <span class="card-by">
                            No Hp :
                            <p class="card-admin">087898982153</p>
                        </span>
                    </div>
                </article>


                <article class="card">
                    <div class="card-info-hover">


                    </div>
                    <div class="card-img"></div>
                    <a href="">
                        <div class="card-img-hover" style="background-image: url(assets/img/solo.JPG);">
                        </div>
                    </a>
                    <div class="card-info">

                        <h3 class="card-title">Gunawan FC</h3>
                        <span class="card-by">
                            No Hp :
                            <p class="card-admin">087898982153</p>
                        </span>
                    </div>
                </article>



            </section>
        </div>
    </div>


    <!-- laporan -->
    <div class="services" id="laporan">
        <div class="container">
            <h1 class="namatabel">
                DAFTAR SISWA YANG MELANGGAR TATA TERTIB SMAN 1 SLAWI
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-1">No</th>
                            <th class="col-3">Nama Siswa</th>
                            <th class="col-1">Kelas</th>
                            <th class="col-1">Waktu</th>
                            <th class="col-2">Tindakan</th>
                            <th class="col-2">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
              $sql1 = "select * from halaman order by id desc";
              $q1 = mysqli_query($koneksi,$sql1);
              $nomor =1;
              while($r1 = mysqli_fetch_array($q1)){
                  $dir_foto = "gambar/";
                  $linkfoto = $r1['gambar'];
                  $urlfoto = $dir_foto.$linkfoto;
                  
                  ?>
                        <tr>
                            <td><?php echo $nomor++?></td>
                            <td><?php echo $r1['nama'] ?></td>
                            <td><?php echo $r1['kelas'] ?></td>
                            <td><?php echo $r1['tgl_isi'] ?></td>
                            <td><?php echo $r1['aksi'] ?></td>
                            <td>
                                <?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                                <?php echo "<img src='gambar/".$r1['gambar']."'style='width:100px; height:100px;'>"?>
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
    <!-- Services -->

    <div class="containerlapor container" id="laporkan">
        <h1>SEGERA LAPORKAN PELANGGARAN TATA TERTIB!</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="nama">Nama Siswa</label><br />
            <input type="text" id="nama" value="<?php echo $nama ?>" name="nama" /><br />
            <label for="kelas">Kelas</label><br />
            <input type="text" id="kelas" value="<?php echo $kelas ?>" name="kelas" /><br />
            <label for="aksi">Aksi</label><br />
            <input type="text" id="aksi" value="<?php echo $aksi ?>" name="aksi" /><br />

            <label for="gambar">Bukti</label><br />
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/gif" /><br />
            <button type="submit" name="simpan">LAPORKAN!</button>
        </form>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="containerftr">
            <p class="ftr">&copy; Copyright by <span>NABIELL ANJAY MABAR</span></p>
        </div>
    </div>
    <!-- Footer -->

    <script src="dist/js/script.js"></script>
</body>

</html>