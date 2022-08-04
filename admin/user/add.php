<?php
if(!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if(isset($_POST['add_user'])) {

   $nis  = $_POST['nis'];
   $nama = $_POST['nama'];
   
   $kls  = $_POST['kelas'];
   //cek nis
   $get_id = $con->prepare("SELECT * FROM t_user WHERE id_user = ?");
   $get_id->bind_param('s', $nis);
   $get_id->execute();
   $get_id->store_result();
   $numb = $get_id->num_rows();
   //validasi
   if($nis == '' || $nama == '' || $kls == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");</script>';

   } else if(!preg_match("/^[a-zA-z \'.]*$/",$nama)) {

      echo '<script type="text/javascript">alert("Nama hanya boleh mengandung huruf, titik(.), petik tunggal");</script>';

   } else if($numb > 0){

      echo '<script type="text/javascript">alert("Nis tidak dapat digunakan");window.history.go(-1);</script>';

   } else {

      $sql = $con->prepare("INSERT INTO t_user(id_user, fullname, kelas) VALUES(?, ?, ?)");
      $sql->bind_param('sss', $nis, $nama, $kls);
      $sql->execute();

      header('location: ?page=user');

   }

}
?>
<h3>Tambah Data Pemilih</h3>
<hr />
<div class="row">
    <div class="col-md-8 col-sm-12">
        <form action="" method="post" class="form-horizontal">
    <div class="form-group">
                <label class="col-sm-2 control-label">Username </label>
                <div class="col-md-8">
                    <input class="form-control" name="nama" type="text" placeholder="Username "/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="nis" placeholder="Password" />
                </div>
            </div>

           

            

            
                <div class="form-group">
                <label class="col-sm-2 control-label">Email </label>
                <div class="col-md-8">
                    <input class="form-control" name="kelas" type="text" placeholder="Alamat "/>
                </div>
            
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" name="add_user" value="Tambah User" class="btn btn-success">Tambah Pemilih</button>
                    <button type="button" onclick="window.history.back()" class="btn btn-danger">Kembali</button>
                </div>
            </div>
        </form>
    </div>
</div>
