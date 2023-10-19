<?php include("inc_header.php");
$sukses = "";
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Data berhasil dihapus";
    }
}

?>

<?php
if($sukses){
    ?><div class="alert alert-success" role="alert">
    <?php echo $sukses ?>
</div><?php
}
?>


<h1 align="center">Data Siswa</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th class="col-1">#</th>
            <th>Nama Siswa </th>
            <th class="col-1">Kelas</th>
            <th class="col-1">Tanggal</th>
            <th class="col-2">Tindakan</th>
            <th class="col-2">Gambar</th>
            <th class="col-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql1 = "select * from halaman order by id desc";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor =1;
        while($r1 = mysqli_fetch_array($q1)){
            $dir_foto = "../gambar/";
            $linkfoto = $r1['gambar'];
            $urlfoto = $dir_foto.$linkfoto;
            ?>
        <tr>
            <td><?php echo $nomor++?></td>
            <td><?php echo $r1['nama'] ?></td>
            <td><?php echo $r1['kelas'] ?></td>
            <td><?php echo $r1['tgl_isi'] ?></td>
            <td><?php echo $r1['aksi'] ?></td>
            <td><?php echo '<a href="' . $urlfoto . '" target="_blank">' ?>
                <?php echo "<img src='../gambar/".$r1['gambar']."'style='width:100px; height:100px;'>"?>
                <?php    '</a>'?>
            </td>
            <td>
                <a href="halaman.php?op=delete&id=<?php echo$r1['id']?>" onclick="return confirm('Yakin ya broow')">
                    <span class="badge text-bg-danger">Hapus</span></a>
            </td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<?php include("inc_footer.php")?>