<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>
<h3>Tambah Judul Khutbah</h3>
<hr />
<div class="row">
    <div class="col-md-8">
        <form action="./kandidat/simpanjudul.php" method="post" enctype="multipart/form-data" class="form-horizontal">
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Judul </label>
                <div class="col-md-6">
                    <input type="text" name="judul" class="form-control" required="Judul " />
                </div>
            </div>
			

            

           

            <div class="form-group" style="padding-top:20px;">
                <div class="col-md-offset-3 col-md-8">
                    <button type="submit" name="tambahjudul" value="Tambah Judult" class="btn btn-success">
                        Tambah Judul
                    </button>
                    <button type="button" onclick="window.history.go(-1)" class="btn btn-danger">
                        Kembali
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>
