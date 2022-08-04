<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./kandidat/add.php');
         break;
case 'menang':
if (isset($_GET['id'])) {

            $id   = $_GET['id'];
           
	  
               $sql = $con->prepare("INSERT INTO pemenang(nama_calon, alamat, foto,judull, visi, periode) VALUES( ?, ?, ?, ?, ?, ?)") or die($con->error);
               $sql->bind_param('ssssss', $nama, $alamat, $foto,$judull, $visi, $periode);
               $sql->execute();

            header('location: ?page=pemenang');

         } else {

           echo '<script type="text/javascript">alert("Tambah Pemenang Gagal");window.history.go(-1);</script>';

         }
         break;

      case 'edit':
         include('./kandidat/edit.php');
         break;
		 

      case 'view':
         include('./kandidat/view.php');
         break;
case 'tambahjudul':
         include('./kandidat/tambahjudul.php');
         break;
      case 'hapus':
$sql   = $con->prepare("DELETE FROM t_pemilih(nis, periode) =?");
       
		if (isset($_GET['id'])) {

            $id   = $_GET['id'];

            $sql   = $con->prepare("SELECT foto FROM t_kandidat WHERE id_kandidat = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($f);
            $sql->fetch();
            unlink('../assets/img/kandidat/'.$f);

            $sql   = $con->prepare("DELETE FROM t_kandidat WHERE id_kandidat = ?");
			
            $sql->bind_param('s', $id);
            $sql->execute();

            header('location: ?page=kandidat');

         } else {

            header('location: ./');

         }

         break;
		 case 'hapuss':
$sql = $con->prepare("DELETE FROM t_pemilih ");
$sql->bind_param('s', $nis, $periode);
$sql->execute();

$sql   = $con->prepare("DELETE FROM t_kandidat WHERE suara = ?");
			
            $sql->bind_param('s', $suara);
            $sql->execute();

            
           

            header('location: ?page=kandidat');

         

         

         

         break;
      default:
         include('./kandidat/list.php');
         break;
   }

} else {

   include('./kandidat/list.php');

}
?>
