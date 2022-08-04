<?php
if(!isset($_SESSION['id_admin']) && !isset($_GET['id'])) {
   header('location: ../');
}
$id = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql = $con->prepare("SELECT * FROM t_kelas WHERE id_kelas = ?");
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$num = $sql->num_rows();
$sql->bind_result($idk, $kelas);
$sql->fetch();

if ($num > 0) {
?>
<h3>Update Kelas</h3>
<hr />
<div class="row">
    <div class="col-md-4">

        <form action="./kelas/update.php" method="post">
            <div class="form-group">
                <label>Id Kelas</label>
                <input class="form-control" type="text" name="id" readonly value="<?php echo $idk; ?>" />
            </div>

            <div class="form-group">
                <label>Nama Kelas</label>
                <input class="form-control" name="kelas" type="text" placeholder="Nama Kelas" value="<?php echo $kelas; ?>"/>
            </div>

            <div class="form-group">
                <button type="submit" name="update" value="Update" class="btn btn-success">
                    Update Kelas
                </button>
                <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                    Kembali
                </button>
            </div>
      </form>
   </div>
</div>


<?php
} else {
   header('location:?page=kelas');
}
?>
