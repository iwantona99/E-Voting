<?php
if(!isset($_SESSION['id_admin']) || !isset($_GET['id'])) {
   header('location:../');
}

$id   = $_GET['id'];
$sql  = $con->prepare("SELECT * FROM t_kandidat WHERE id_kandidat = ?") or die($con->error);
$sql->bind_param('i', $id);
$sql->execute();
$sql->store_result();
$sql->bind_result($id, $nama, $alamat, $foto, $judull, $visi, $misi, $suara, $periode);
$sql->fetch();
?>
<h3>Edit Calon Khatib Beserta Materi Khutbah</h3>
<hr />
<div class="row">
   <div class="col-md-3">
      <div class="callout text-center">
         <img src="../assets/img/kandidat/<?php echo $foto; ?>" class="img-responsive"/>
      </div>
   </div>
   <div class="col-md-8">
        <form action="./kandidat/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">
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
                <label class="col-sm-3 control-label">Pendidikan Terakhir / Lulusan </label>
                <div class="col-md-6">
                    <input type="text" name="visi" class="form-control" required="Visi"value="<?php echo $visi; ?>" />
                </div>
            </div>

            <div class="form-group">
                  <label class="col-sm-3 control-label">Foto </label>
               <div class="col-md-6">
                  <input type="file" class="form-control" name="foto"required="foto"value="<?php echo $foto; ?>"/>
               </div>
            </div>

            
			<div class="form-group">
                <label class="col-sm-3 control-label">Judul Khutbah</label>
                <div class="col-md-6">
                    <select name="judull" required="judull" class="form-control" name="judull"value="<?php echo $judull; ?>">
                        <option value="#">-- Pilih Judul --</option>
                        <?php
                            $judul = mysqli_query($con, "SELECT * FROM judul");
                            while ($key = mysqli_fetch_array($judul)) {
                            ?>
                                <option value="<?php echo $key['judul']; ?>">
                                    <?php echo $key['judul']; ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
           
            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-8 col-md-offset-3">
                    <button type="submit" name="update" value="Update Kandidat" class="btn btn-success">
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
