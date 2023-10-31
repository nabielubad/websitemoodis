<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap");
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        border: 0;
    }

    body {}

    img {}

    header {
        width: 98%;
    }

    #logo {}

    #wrapper {}

    #social {}

    #social>li {
        display: inline;
    }

    #social>li>a>img {
        max-width: 35px;
    }

    h1,
    p {}

    .deco {}

    .btn {}

    hr {}

    #contact {}
    </style>
</head>

<body style="border: 0;
        font-family: 'Poppins', sans-serif;

        background-color: #d8dada;
        font-size: 19px;
        max-width: 800px;
        margin: 0 auto;
        padding: 3%;">
    <div id="wrapper" style="background-color: #f0f6fb;">
        <header style="width: 98%;">
            <div id="logo" style="max-width: 120px;
        margin: 3% 0 3% 3%;
        float: left;">
                <img style="max-width: 100%;" src="https://moodis.redonionz.com/assets/img/logoemail.png" alt="" />
            </div>
            <div>
                <ul id="social" style="float: right;
        margin: 3% 2% 4% 3%;
        list-style-type: none;">

                </ul>
            </div>
        </header>
        <div id="banner">
            <img style="max-width: 100%;" src="https://moodis.redonionz.com/assets/img/banner.png" alt="" />
        </div>
        <div class="one-col">
            <h1 style="margin: 3%;">Laporan Pelanggaran Tata-tertib : $nama</h1>

            <p style=" margin: 3%;">
                Kepada Orangtua / Wali Siswa,<br />
                Kami ingin memberitahukan kepada Anda bahwa anak Anda, <b>$nama</b>, telah melakukan pelanggaran
                tatatertib lebih dari 5 kali dalam kurun waktu 1 bulan terakhir. Kami sangat prihatin dengan kejadian
                ini dan kami merasa penting untuk berbagi informasi ini dengan Anda. Kami ingin bekerja sama dengan Anda
                untuk memastikan bahwa anak Anda memahami pentingnya mentaati aturan sekolah dan menjalani pendidikan
                dengan baik. Agar Anda dapat memantau pelanggaran tatatertib anak Anda, kami telah menyediakan akses ke
                laporan pelanggaran di laman bawah ini.
            </p>

            <p style=" margin: 3%;">
                Kami mengharapkan kerjasama Anda dalam mendukung anak Anda untuk memperbaiki perilaku dan menghindari
                pelanggaran tatatertib di masa mendatang. Jika Anda memiliki pertanyaan atau kekhawatiran, jangan ragu
                untuk menghubungi kami. Terima kasih atas perhatian Anda dalam hal ini.
            </p>
            <p style=" margin: 3%;">Hormat kami,<br />Guru BK SMAN 1 Slawi</p>

            <a href="$lok laporanpelanggaran.php?op=laporan&name=$namaasli" class="btn" style="float: right;
        margin: 0 2% 4% 0;
        background-color: #0050b3;
        color: #f6faff;
        text-decoration: none;
        font-weight: 800;
        padding: 8px 12px;
        border-radius: 8px;
        letter-spacing: 2px;">Lihat Pelanggaran</a>

            <hr style="height: 1px;
        background-color: #303840;
        clear: both;
        width: 96%;
        margin: auto;" />

            <footer>
                <p id="contact" style=" margin: 3%;" style="text-align: center;
        padding-bottom: 3%;
        line-height: 16px;
        font-size: 12px;
        color: #303840;">
                    &copy; Kelompok 3 <br />
                    Informatika 2023 <br />


                </p>
            </footer>
        </div>
    </div>
</body>

</html>