<?php 

$lok = getcwd()."/laporanpelanggaran.php?op=laporan&name=";
$buttonLink = "https://google.com";
$linkheader = "../assets/img/logoemail.png";

    $judul_email = "Laporan Pelanggaran Tata-tertib : ";
    $isi_email = "<img src='$linkheader'/><br/>";
    $isi_email .= "Kepada Orangtua / Wali Siswa,<br/><br/>";
    $isi_email .="Kami ingin memberitahukan kepada Anda bahwa anak Anda, <b></b>, telah melakukan pelanggaran tatatertib lebih dari 5 kali dalam kurun waktu 1 bulan terakhir. Kami sangat prihatin dengan kejadian ini dan kami merasa penting untuk berbagi informasi ini dengan Anda.<br/>";
    $isi_email .= "Kami ingin bekerja sama dengan Anda untuk memastikan bahwa anak Anda memahami pentingnya mentaati aturan sekolah dan menjalani pendidikan dengan baik. Agar Anda dapat memantau pelanggaran tatatertib anak Anda, kami telah menyediakan akses ke laporan pelanggaran di laman bawah ini.<br/><br/>";
    $isi_email .= "<a href='" . $buttonLink . "' target='blank' style='background-color: #0050b3; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Lihat Laporan Pelanggaran</a> ";
    $isi_email .="Atau : <a href='" . $buttonLink . "' target='blank' >$buttonLink</a> <br/><br/>";
    
    $isi_email .= "Terima kasih atas perhatian Anda dalam hal ini.<br/><br/>";
    $isi_email .= "Hormat kami,<br/>";
    $isi_email .= "Guru BK SMAN 1 Slawi <br/>";
   
echo $isi_email;