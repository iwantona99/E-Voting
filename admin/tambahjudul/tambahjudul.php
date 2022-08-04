<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<h3>Tambah Calon Khatib Beserta Materi Khutbah</h3>
<hr />
<div class="row">
    <div class="col-md-8">
        <form action="./kandidat/simpan.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama </label>
                <div class="col-md-6">
                    <input type="text" name="nama" class="form-control" required="Nama " />
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-3 control-label">Alamat </label>
                <div class="col-md-6">
                    <input type="text" name="alamat" class="form-control" required="Alamat" />
                </div>
            </div>
			<div class="form-group">
                <label class="col-sm-3 control-label">Pendidikan Terakhir / Lulusan </label>
                <div class="col-md-6">
                    <input type="text" name="visi" class="form-control" required="Visi" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Foto </label>
                <div class="col-md-5">
                    <input type="file" name="foto" class="form-control" required="Foto"/>
                </div>
            </div>

            

            <div class="form-group">
                <label class="col-sm-3 control-label">Judul Khutbah</label>
                <div class="col-md-6">
                    <select name="judul" required="judul" class="form-control">
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
                <div class="col-md-offset-3 col-md-8">
                    <button type="submit" name="add_kandidat" value="Tambah Kandidat" class="btn btn-success">
                        Tambah Kandidat
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
