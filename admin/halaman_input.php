<?php include("inc_header.php")?>
<?php
$nama = "";
$kelas = "";
$gambar = "";
$aksi = "";
$error = "";
$sukses = "";

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $aksi = $_POST['aksi'];
    $gambar = $_FILES['gambar']['name'];
        $foto_tmp = $_FILES['gambar']['tmp_name'];

   
    if($aksi == '' or $gambar ==''){
        $error = "Silahkan isi semua data dengan benar!";
    }
    if(empty($error)){
        
        move_uploaded_file($foto_tmp, '../gambar/'.$gambar);
      
        $sql1 = "insert into halaman(nama,kelas,aksi,gambar) values ('$nama','$kelas','$aksi','$gambar')";
        
        $q1 = mysqli_query($koneksi,$sql1);
        
        if($q1){
            $sukses = "Sukses melaporkan";
        }else{
            $error = "Gagal melaporkan";
        }
    }
}
?>
<h1 align="center">Halaman Admin Input Data</h1>


<?php
if($error){
    ?><div class="alert alert-danger" role="alert">
    <?php echo $error ?>
</div><?php
}
?>
<?php
if($sukses){
    ?><div class="alert alert-success" role="alert">
    <?php echo $sukses ?>
</div><?php
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kelas" value="<?php echo $kelas ?>" name="kelas">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kelas" class="col-sm-2 col-form-label">aksi</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="aksi" value="<?php echo $kelas ?>" name="aksi">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gambar" class="col-sm-2 col-form-label">Bukti Foto</label>
        <div class="col-sm-10">
            <input type="file" id="gambar" name="gambar" accept="image/jpeg, image/png, image/gif" class="form-control">

        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Laporkan!" class="btn btn-primary">
        </div>
    </div>
</form>
<?php include("inc_footer.php")?>