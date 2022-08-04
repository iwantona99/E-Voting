<?php
define('BASEPATH', dirname(__FILE__));
session_start();

if (isset($_SESSION['siswa'])) {
   header('location:./user/index.php');
}

if (isset($_POST['submit'])) {

   require('include/connection.php');

   $nis     = $_POST['nis'];
   $fullname= $_POST['fullname'];
   $thn     = date('Y');
   $dpn     = date('Y') + 1;
   $periode = $thn.'/'.$dpn;

   $cek = $con->prepare("SELECT * FROM t_pemilih WHERE nis = ? && periode = ?") or die($con->error);
   $cek->bind_param('ss', $nis, $periode);
   $cek->execute();
   $cek->store_result();

   if ($cek->num_rows() > 2) {

      echo '<script type="text/javascript">alert("Anda sudah memberikan suara");</script>';
echo '<meta http-equiv="refresh" content="0; url=index.php">';
   } else {

      $sql = $con->prepare("SELECT * FROM t_user WHERE id_user = ? && fullname = ? && pemilih = 'Y'") or die($con->error);
      $sql->bind_param('ss', $nis, $fullname);
      $sql->execute();
      $sql->store_result();

      if ($sql->num_rows() > 0 ) {
         $sql->bind_result($id, $user, $kelas, $jk, $pemilih);
         $sql->fetch();

         $_SESSION['siswa'] = $id;

         header('location:./user/index.php');

      } else {

         echo '<script type="text/javascript">alert("Anda tidak berhak memberikan suara");</script>';
echo '<meta http-equiv="refresh" content="0; url=index.php">';
      }

   }

}


?>
<!DOCTYPE html>
<html>
      <head>
            <meta charset="utf-8">
            <title>E - Voting</title>
            <link rel="stylesheet" href="./assets/css/bootstrap.min.css"/>
            <link rel="stylesheet" href="./assets/css/custom.css"/>
            <style type="text/css">
                  #content-slider {
                  position: relative;
                  width: 400px;
                  height: 300px;
                  overflow: hidden;
                  }
                  #content-slider img {
                  display: block;
                  width: 400px;
                  height: 300px;
                  }
                  .img-thanks {
                        max-width: 200px;
                        width: 100%;
                        max-height: 250px;
                  }
            </style>
      </head>
      <body>
            <div class="container">
                  <div class="row">
                        <div class="col-md-12">
                        <?php
                        if (isset($_GET['page'])) {
                        switch ($_GET['page']) {
                              case 'thanks':
                              include('./thanks.php');
                              break;

                              default:
                              include('./form.php');
                              break;
                        }
                        } else {
                        include('./form.php');
                        }
                        ?>

                              <footer>
                                 
                              </footer>
                        </div>
                  </div>
            </div>
            <script type="text/javascript" src="./assets/js/jquery-2.2.3.min.js"></script>
            <script type="text/javascript" src="./assets/js/jquery-cycle.min.js"></script>
            <script type="text/javascript">
            $(document).ready(function() {
            
            });
            </script>
      </body>
</html>
