<?php include("inc_header.php");
$sukses = "";
if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op == 'delete'){
    $id = $_GET['id'];
    $sql1 = "delete from master where id = '$id'";
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


<h1>Data Admin Moodis</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $sql1 = "select * from master ";
        $q1 = mysqli_query($koneksi,$sql1);
        $nomor =1;
        while($r1 = mysqli_fetch_array($q1)){
            ?>
        <tr>
            <td><?php echo $nomor++?></td>
            <td><?php echo ($r1['nama']) ?></td>


            <td>
                <a href="datarahasia.php?op=delete&id=<?php echo$r1['id']?>" onclick="return confirm('Yakin ya broow')">
                    <span class="badge text-bg-danger">Hapus</span></a>
            </td>
        </tr>
        <?php
        }
        ?>

    </tbody>
</table>
<?php include("inc_footer.php")?>