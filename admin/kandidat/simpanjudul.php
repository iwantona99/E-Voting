<?php

define('BASEPATH', dirname(__FILE__));
if (!isset($_POST['tambahjudul'])) {

   header('location:../');

} else {

   $judul     = $_POST['judul'];
   

    if ($judul == '') {

      echo '<script type="text/javascript">alert("Semua form harus terisi");window.history.go(-1);</script>';

   } else {

      include('../../include/connection.php');

               $sql = $con->prepare("INSERT INTO judul(judul) VALUES(?)") or die($con->error);
               $sql->bind_param('s', $judul);
               $sql->execute();
			   

               header('location:../dashboard.php?page=kandidat');

   }

         }

      

   


?>
