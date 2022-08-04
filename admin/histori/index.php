<?php
if (!isset($_SESSION['id_admin'])) {
   header('location: ../');
}

if (isset($_GET['action'])) {

   switch ($_GET['action']) {
      case 'tambah':
         include('./histori/add.php');
         break;
case 'view':
         include('./histori/view.php');
         break;
      case 'edit':
         include('./histori/edit.php');
         break;

      case 'hapus':

         if (isset($_GET['id'])) {

            $nis   = strip_tags(mysqli_real_escape_string($con, $_GET['id']));

            $sql   = $con->prepare("DELETE FROM t_user WHERE id_user = ?");
            $sql->bind_param('s', $nis);
            $sql->execute();

            header('location: ?page=histori');

         } else {

            header('location: ./');

         }

         break;
      default:
         include('./histori/list.php');
         break;
   }

} else {

   include('./histori/list.php');

}
?>
