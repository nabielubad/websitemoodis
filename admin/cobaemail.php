<?php use PHPMailer\PHPMailer\PHPMailer;
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
$lok = getcwd()."/laporanpelanggaran.php?op=laporan&name=$namaasli";
$buttonLink = "$lok";
$linkheader = getcwd()."/assets/img/logoemail.png";

    $judul_email = "Laporan Pelanggaran Tata-tertib : $nama";
    $isi_email = "<img src='$linkheader'/><br/>";
    $isi_email .= "Kepada Orangtua / Wali Siswa,<br/><br/>";
    $isi_email .="Kami ingin memberitahukan kepada Anda bahwa anak Anda, <b>$nama</b>, telah melakukan pelanggaran tatatertib lebih dari 5 kali dalam kurun waktu 1 bulan terakhir. Kami sangat prihatin dengan kejadian ini dan kami merasa penting untuk berbagi informasi ini dengan Anda.<br/>";
    $isi_email .= "Kami ingin bekerja sama dengan Anda untuk memastikan bahwa anak Anda memahami pentingnya mentaati aturan sekolah dan menjalani pendidikan dengan baik. Agar Anda dapat memantau pelanggaran tatatertib anak Anda, kami telah menyediakan akses ke laporan pelanggaran di laman bawah ini.<br/><br/>";
    $isi_email .= "<a href='" . $buttonLink . "' target='blank' style='background-color: #0050b3; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Lihat Laporan Pelanggaran</a> ";
    $isi_email .="Atau : <a href='" . $buttonLink . "' target='blank' >$buttonLink</a> <br/><br/>";
    
    $isi_email .= "Terima kasih atas perhatian Anda dalam hal ini.<br/><br/>";
    $isi_email .= "Hormat kami,<br/>";
    $isi_email .= "Guru BK SMAN 1 Slawi <br/>";

 
    kirim_email($email, $namaortu, $judul_email, $isi_email);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="hero">
        <div class="container">
            <div class="containerlaporr blur " id="edit">
                <h1 class="namatabel">Kirim Email Untuk Orang Tua Dari :</h1>
                <form action="" method="post" class="tama">



                    <label for="aksi">Masukan Email Penerima</label><br />
                    <input type="email" id="email" required value="" placeholder="Masukan Email" name="email" /><br />


                    <button type="submit" name="kirim">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>