<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./pemenang/add.php');
         break;
		       case 'pemenang':
         include('./pemenang/pemenang/list.php');
         break;

      case 'edit':
         include('./pemenang/edit.php');
         break;

      case 'view':
         include('./pemenang/view.php');
         break;

      case 'hapus':
$sql   = $con->prepare("DELETE FROM t_pemilih(nis, periode) =?");
       
		if (isset($_GET['id'])) {

            $id   = $_GET['id'];

            $sql   = $con->prepare("SELECT foto FROM pemenang WHERE id_kandidat = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($f);
            $sql->fetch();
            unlink('../assets/img/kandidat/'.$f);

            $sql   = $con->prepare("DELETE FROM pemenang WHERE id_kandidat = ?");
			
            $sql->bind_param('s', $id);
            $sql->execute();

            header('location: ?page=pemenang');

         } else {

            header('location: ./');

         }

         break;
		 case 'hapuss':
$sql = $con->prepare("DELETE FROM t_pemilih ");
$sql->bind_param('s', $nis, $periode);
$sql->execute();


            
           

            header('location: ?page=pemenang');

         

         

         

         break;
      default:
         include('./pemenang/list.php');
         break;
   }

} else {

   include('./pemenang/list.php');

}
?>
