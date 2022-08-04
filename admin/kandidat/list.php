<?php include '../connection.php';
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>

<div class="row">
   <div class="col-md-9">
      <h3>DAFTAR CALON KHATIB BESERTA MATERI KHUTBAH DI MASJID AL LATIFAH KAMPUNG KAYU KUL</h3>
   </div>
   <div class="col-md-3" style="padding-top:0px;">
      <a class="btn btn-primary" href="?page=kandidat&action=tambah">Tambah Calon Khatib</a>
   </div>
   <div class="col-md-3" style="padding-top:0px;">
      <a class="btn btn-primary" href="?page=kandidat&action=tambahjudul">Tambah Judul Khutbah</a>
   </div>
   
   <br>
   <div class="col-md-3" style="padding-left:1398px;">
      <a href="?page=kandidat&action=hapuss" class="btn btn-danger" onclick="return confirm('Yakin ingin mereset status pemilih dan melakukan voting kembali? ?')">Reset Status Pemilih</a>
   </div>
   </br>
   </br>
   
                   
</div>
<hr />
<div class="row">
    <div class="col-md-3">
        
    </div>
    <div style="clear:both"></div>
    <br />
    <div class="col-md-12">
        <div id="data">
        </div>
    </div>
</div>
<?php
if(isset($_POST['simpantgl'])){
	include('../include/connection.php');
       $tanggal = $_POST['tanggal'];
       
        $sql = $con->prepare("INSERT INTO ttgl(tanggal) VALUES(?)") or die($con->error);
               $sql->bind_param('s', $tanggal);
               $sql->execute();
          
        }

    
   



?>