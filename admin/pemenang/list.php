<?php include '../connection.php';
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}
?>

<div class="row">
   <div class="col-md-9">
      <h3>PEMENANG KHATIB BESERTA MATERI KHUTBAH DI MASJID AL LATIFAH KAMPUNG KAYU KUL</h3>
   </div>
   <div class="col-md-3" style="padding-top:0px;">
      
   </div>
   
   <br>
   
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
        $taggl = $_POST['taggl'];
        
     

        $sql_simpan = "INSERT INTO t_tgl (tanggal) VALUES ('$taggl')";
        $query_simpan = mysqli_query($connection,$sql_simpan);

}
    
   



?>