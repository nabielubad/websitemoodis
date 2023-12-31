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
        $eror = "Silahkan isi semua data dengan benar!";
    }
    
    $queryCek = "SELECT * FROM halaman WHERE nama = '$nama' AND kelas = '$kelas' AND aksi = '$aksi' AND gambar = '$gambar'";
$result = $koneksi->query($queryCek);

if ($result->num_rows > 0){
    echo "<script>alert('Laporan sudah ada');</script>";
    $eror ="data sudah ada";
}
    if(empty($eror)){
        
        move_uploaded_file($foto_tmp, 'gambar/'.$gambar);
      
        $sql1 = "insert into halaman(nama,kelas,aksi,gambar) values ('$nama','$kelas','$aksi','$gambar')";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            $sukses = "Sukses melaporkan";
        }else{
            $sukses = "Gagal melaporkan";
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
    <meta name="keywords"
        content="Aplikasi Moodis, Pelaporan Pelanggaran Siswa, Tata Tertib SMA Negeri 1 Slawi, Literasi Kedisiplinan Siswa, Moodis App Kelas 11.3, Pelanggaran Tata Tertib Sekolah, SMA Negeri 1 Slawi, Moodis - Aplikasi Siswa, Laporan Kedisiplinan Siswa, Web Moodis Sekolah, Pelaporan Online Siswa, Literasi Disiplin Sekolah, Aplikasi Siswa SLAWI, Sistem Pelaporan Pelanggaran, Kelas 11.3 SMA Negeri 1 Slawi, Moodis Web App, Tertib Siswa SLAWI, Web Kedisiplinan Sekolah, Moodis - Aplikasi Kedisiplinan, Siswa Berdisiplin SMA Negeri 1 Slawi, Murid Disiplin, Aplikasi Murid Disiplin, Aplikasi Murid Disiplin SMAN 1 Slawi, Tugas Informatika, Tugas Pak Fian, Nabil, Guru Bk SMAN 1 Slawi, Tata - Tertib SMAN 1 Slawi, Murid Pintar, Murid Cerdas, Pelanggaran Siswa">

    <!-- Font Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap"
        rel="stylesheet" />
    <link rel="icon" href="assets/img/icon.png" />

    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
                    <ul class="menu menubro">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#guru">Guru</a></li>
                        <li><a href="#laporan">Laporan</a></li>
                        <li><a href="#laporkan">Laporkan!</a></li>
                        <li class="active"><a href="siswa/formloginsis.php">Login</a></li>
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
                    <div class="box anim ">
                        <h1 class="kirikanan">
                            MENJADI DISIPLIN <br />
                            DARI YANG TERDISIPLIN!
                        </h1>
                        <p class="kirikanan">Kedisiplinan adalah kunci kesuksesan siswa di SMA Negeri 1 Slawi, membantu
                            mereka
                            mengembangkan karakter kuat dan siap menghadapi masa depan.</p>
                        <button onclick="arahkanKeTujuan()" class="ngilang bawahatas">LAPORKAN!</button>
                    </div>
                    <div class="box">
                        <img src="assets/img/ngapung.png" alt="" class=" anim atasbawah" />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <section class="about" id="about">
            <div class="about-img kirikanan">
                <img src="assets/img/kartun.png" alt="" srcset="">
            </div>
            <div class="about-content">
                <h2 class="heading">Pentingnya <span>Kedisiplinan</span></h2>
                <h3>Apa Sih Pentingnya <span>Kedisiplinan</span> Itu?</h3>
                <p>Kedisiplinan siswa di SMA Negeri 1 Slawi adalah fondasi utama dalam menciptakan suasana belajar yang
                    kondusif dan produktif. Tingkat kedisiplinan yang tinggi memungkinkan siswa menyesuaikan diri dengan
                    norma-norma sekolah, menciptakan lingkungan pembelajaran yang nyaman. Kedisiplinan bukan hanya
                    tanggung jawab individu, tetapi juga investasi bersama untuk mencapai tujuan bersama dalam
                    pembelajaran. Kerjasama antara guru, orang tua, dan pihak sekolah diperlukan untuk membimbing siswa
                    mengembangkan nilai-nilai disiplin, memberikan manfaat jangka panjang pada perkembangan pribadi dan
                    akademis mereka. Dengan menjadikan kedisiplinan sebagai landasan utama, SMA Negeri 1 Slawi terus
                    menginspirasi dan membentuk pemimpin masa depan yang tangguh dan bertanggung jawab.</p>
                <button id="linktatib" onclick="linktatib()" class="abtcntn">LIHAT TATATERTIB</button>
            </div>
        </section>
    </div>
    <div class="container">
        <h1 class="namatabel1 bk uf" id="guru">
            DAFTAR GURU BK SMAN 1 SLAWI
        </h1>

        <div class="bodi">
            <section class="cards tama">

                <article class="card ">
                    <div class="card-info-hover">


                    </div>
                    <div class="card-img"></div>
                    <a href="https://wa.me/+628789898034265" target="_blank">
                        <div class="card-img-hover" style="background-image: url(assets/img/1.JPG);">
                        </div>
                    </a>
                    <div class="card-info">

                        <h3 class="card-title">Nadiroh</h3>
                        <span class="card-by">
                            No Hp :
                            <p class="card-admin">087898982153</p>
                        </span>
                    </div>
                </article>


                <article class="card ">
                    <div class="card-info-hover">


                    </div>
                    <div class="card-img"></div>
                    <a href="">
                        <div class="card-img-hover" style="background-image: url(assets/img/2.JPG);">
                        </div>
                    </a>
                    <div class="card-info">

                        <h3 class="card-title">Pradita</h3>
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
        <div class="containertbl">
            <h1 class="namatabel1 bk uf">
                DAFTAR SISWA YANG MELANGGAR TATA TERTIB SMAN 1 SLAWI
            </h1>
            <div class="box-services">
                <table class="table">
                    <thead>
                        <tr>

                            <th class="col-3">Nama</th>
                            <th class="col-1">Kelas</th>
                            <th class="col-2">Waktu</th>
                            <th class="col-2">Aksi</th>
                            <th class="col-2">Gambar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
              $sql1 = "select * from final order by tgl_isi desc";
              $q1 = mysqli_query($koneksi,$sql1);
              $nomor =1;
              while($r1 = mysqli_fetch_array($q1)){
                  $dir_foto = "gambar/";
                  $linkfoto = $r1['gambar'];
                  $urlfoto = $dir_foto.$linkfoto;
                  
                  ?>
                        <tr>

                            <td><?php echo $r1['nama'] ?></td>
                            <td><?php echo $r1['kelas'] ?></td>
                            <td><?php echo $r1['tgl_isi'] ?></td>
                            <td><?php echo $r1['aksi'] ?></td>
                            <td>
                                <?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                                <?php echo "<img src='gambar/".$r1['gambar']."' class='lap' style=''>"?>
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

    <div class="containerlapor " id="laporkan">
        <h1 class="namatabel1 bk">SEGERA LAPORKAN PELANGGARAN TATA TERTIB!</h1>
        <form action="siswa/formloginsis.php" class="tama">
            <label for=" nama">Nama Siswa</label><br />
            <input type="text" id="nama" value="" name="nama" /><br />
            <label for="kelas">Kelas</label><br />
            <input type="text" id="kelas" value="" name="kelas" /><br />
            <label for="aksi">Aksi*</label><br />
            <input type="text" id="aksi" value="" name="aksi" /><br />

            <label for="gambar">Bukti*</label><br />
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/gif" /><br />
            <label for="aksi">* Wajib Diisi!</label><br /><br />
            <button type="submit">LAPORKAN!</button>

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
                    <p>Versi 2.0.1<a href="readme.txt" class="deco1"> Lihat Apa Yang Baru!</a></br><a
                            href="admin/formlogin.php" class="decog">>> Menu GURU << </a>
                    </p>

                </div>
                <div class="box">

                </div>
                <div class="box">
                    <p>&copy; Copyright by <span>Kelompok 3 (XI.3) </span> SMAN 1 SLAWI 2023, Indonesia</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->

    <script src="dist/js/script.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
</body>

</html>