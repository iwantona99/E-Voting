<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

$id   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

$sql  = $con->prepare("SELECT * FROM t_user WHERE id_user = ?") or die($con->error);
$sql->bind_param('s', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id_user, $fullname, $kelas, $jk, $pemilih);
$sql->fetch();

?>
<h3>Update Data Pemilih</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="./user/update.php" method="post" class="form-horizontal">
      
            <div class="form-group">
                <label class="col-sm-2 control-label">ID Jamaah</label>
                <div class="col-md-4">
                    <input class="form-control" type="number" name="nis" placeholder="ID Jamaah" type="number" readonly value="<?php echo $id_user; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Nama pemilih</label>
                <div class="col-md-8">
                    <input class="form-control" name="nama" type="text" placeholder="Nama " value="<?php echo $fullname; ?>"/>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Jenis Kelamin</label>
                <div class="col-md-10">
                    <label class="radio-inline">
                        <input type="radio" name="jk" value="L" id="L" <?php if($jk == 'L') { echo 'checked'; } ?>> Laki - laki
                    </label>
                    
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Alamat </label>
                <div class="col-md-8">
                    <input class="form-control" name="kelas" type="text" placeholder="Alamat "value="<?php echo $kelas; ?>"/>
                </div>
            
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 control-label">Pemilih</label>
                <div class="col-md-6">
                    <select name="pemilih" required="Pemilih" class="form-control">
                        <option value="Y" <?php if($pemilih == 'Y') { echo 'selected';} ?>>Aktif</option>
                        <option value="N" <?php if($pemilih == 'N') { echo 'selected';} ?>>Tidak</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="update" value="Update User" class="btn btn-success">Update Pemilih</button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</button>
                </div>
            </div>
      
        </form>
    </div>
</div>
