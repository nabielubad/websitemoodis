<?php use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
function kirim_email($email_penerima, $nama_penerima, $judul_email, $isi_email){
    $email_pengirim = "moodissmansawi@gmail.com";
    $nama_pengirim = "MOODIS";
    
    //Load Composer's autoloader
    require getcwd().'/../vendor/autoload.php';
    
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