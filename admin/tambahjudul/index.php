<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./tambahjudul/add.php');
         break;


      case 'edit':
         include('./tambahjudul/edit.php');
         break;
		 

      case 'view':
         include('./tambahjudul/view.php');
         break;

      case 'hapus':
$sql   = $con->prepare("DELETE FROM judul(judul) =?");
       
		if (isset($_GET['id'])) {

            $id   = $_GET['id'];

            $sql   = $con->prepare("SELECT foto FROM judul WHERE judul = ?");
            $sql->bind_param('s', $id);
            $sql->execute();
            $sql->store_result();
            $sql->bind_result($f);
            $sql->fetch();
            unlink('../assets/img/kandidat/'.$f);

            $sql   = $con->prepare("DELETE FROM judul WHERE judul = ?");
			
            $sql->bind_param('s', $id);
            $sql->execute();

            header('location: ?page=tambahjudul');

         } else {

            header('location: ./');

         }

         break;
		 
      default:
         include('./tambahjudul/list.php');
         break;
   }

} else {

   include('./tambahjudul/list.php');

}
?>
