<?php
if(!isset($_SESSION['id_admin']) || !isset($_GET['id'])) {
   header('location:../');
}

$id   = $_GET['id'];
$sql  = $con->prepare("SELECT * FROM pemenang WHERE id_kandidat = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $alamat, $foto, $visi, $misi, $suara, $tanggal, $periode);
$sql->fetch();
?>
<h3>Edit Pemenang</h3>
<hr />
<div class="row">
   <div class="col-md-3">
      <div class="callout text-center">
         <img src="../assets/img/kandidat/<?php echo $foto; ?>" class="img-responsive"/>
      </div>
   </div>
   <div class="col-md-8">
        <form action="./pemenang/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <input type="hidden" name="f" value="<?php echo $foto; ?>" />

            <div class="form-group">
                <label class="col-sm-3 control-label">Nama </label>
                <div class="col-md-8">
                    <input type="text" class="form-control" name="nama" required="Nama" value="<?php echo $nama; ?>"/>
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-3 control-label">Alamat </label>
                <div class="col-md-6">
                    <input type="text" name="alamat" class="form-control" required="Alamat"value="<?php echo $alamat; ?>" />
                </div>
            </div>

            <div class="form-group">
                  <label class="col-sm-3 control-label">Foto </label>
               <div class="col-md-6">
                  <input type="file" class="form-control" name="foto"/>
               </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Tema Khutbah</label>
                <div class="col-md-8">
                    <textarea name="visi" class="form-control" rows="3" required="Visi"><?php echo $visi; ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Judul Khutbah</label>
                <div class="col-md-8">
                    <textarea name="misi"class="form-control" rows="3" required="Misi"><?php echo $misi; ?></textarea>
                </div>
            </div>

            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update" value="Update Pemenang" class="btn btn-success">
                        Update Data
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

         </form>
   </div>
</div>
