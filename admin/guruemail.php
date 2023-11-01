
<?php 
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}


use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email){
    $email_pengirim = "moodissmansawi@gmail.com";
    $nama_pengirim = "MOODIS";
    
    //Load Composer's autoloader
    require getcwd().'/vendor/autoload.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = $email_pengirim;                     
        $mail->Password   = 'lydn xtnh ikjr mren';                               
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
        $mail->Port       = 465;                                    
    
        //Recipients
        $mail->setFrom($email_pengirim, $nama_penerima);
        $mail->addAddress($email_penerima, $nama_penerima);     
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $judul_email;
        $mail->Body    = $isi_email;
        
    
        $mail->send();
        echo "<script>alert('Email Berhasil Terkirim');</script>";
        return "sukses"; 
        
    } catch (Exception $e) {
        echo "<script>alert('Email Gagal Terkirim $mail->ErrorInfo');</script>";
        return "gagal: {$mail->ErrorInfo}";
    }
}
if(isset($_POST['kirim'])){
    $namaasli = $_GET['nama'];
    $nama = str_replace('-', ' ',$namaasli);
    $namaortu = "Orangtua $nama";
    $email = $_POST['email'];
    $gambarSrc = "../assets/img/moodis.png";    
$gam = '<img src="' . $gambarSrc . '" alt="Bunga">';
$lok = "https://moodis.redonionz.com/admin/laporanpelanggaran.php?op=laporan&name=$namaasli";
$buttonLink = "$lok";
$linkheader = "https://moodis.redonionz.com/assets/img/logoemail.png";

    $judul_email = "Laporan Pelanggaran Tata-tertib : $nama";
    $isi_email = "<img src='$linkheader'/><br/>";
    $isi_email .= "Kepada Orangtua / Wali Siswa,<br/><br/>";
    $isi_email .="Kami ingin memberitahukan kepada Anda bahwa anak Anda, <b>$nama</b>, telah melakukan pelanggaran tatatertib lebih dari 5 kali dalam kurun waktu 1 bulan terakhir. Kami sangat prihatin dengan kejadian ini dan kami merasa penting untuk berbagi informasi ini dengan Anda.<br/>";
    $isi_email .= "Kami ingin bekerja sama dengan Anda untuk memastikan bahwa anak Anda memahami pentingnya mentaati aturan sekolah dan menjalani pendidikan dengan baik. Agar Anda dapat memantau pelanggaran tatatertib anak Anda, kami telah menyediakan akses ke laporan pelanggaran di laman bawah ini.<br/><br/>";
    $isi_email .= "<a href='" . $buttonLink . "' target='blank' style='background-color: #0050b3; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Lihat Laporan Pelanggaran</a> <br/><br/>";
    $isi_email .="Atau : <a href='" . $buttonLink . "' target='blank' >$buttonLink</a> <br/>";
    
    $isi_email .= "Terima kasih atas perhatian Anda dalam hal ini.<br/><br/>";
    $isi_email .= "Hormat kami,<br/>";
    $isi_email .= "Guru BK SMAN 1 Slawi <br/>";

 
    kirim_email($email, $namaortu, $judul_email, $isi_email);

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
                        <h1>MOODIS-Kirim Email</h1>
                    </div>
                    <ul class="menu menubro">

                        <li class="active"><a href="guru.php">Kembali</a></li>
                    </ul>
                    <i class="fa-solid fa-bars menu-bar"></i>
                </div>

            </div>
        </div>

        <?php 
        $nm = $_GET['nama'];
        $nama = str_replace(' ', '-',$nm);
        $no = "0878";
        $ns = "1212";
        $nup = $ns.$nm.$no.$op;
        $tokennya = $nup;
        if($op == 'email' ){
    $nm = $_GET['nama'];
    $nama = str_replace('-', ' ',$nm);
    
    
    
?> <div class="hero">
            <div class="container">
                <div class="containerlaporr blur " id="edit">
                    <h1 class="namatabel">Kirim Email Untuk Orang Tua Dari :<br /> <?php echo $nama ?></h1>
                    <form action="" method="post" class="tama">



                        <label for="aksi">Masukan Email Penerima</label><br />
                        <input type="email" id="email" required value="" placeholder="Masukan Email"
                            name="email" /><br />


                        <button type="submit" name="kirim">Kirim</button>
                    </form>
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