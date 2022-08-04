<?php
session_start();

if(isset($_SESSION['id_admin'])) {
   header('location: ./dashboard.php');
}

if(isset($_POST['submit'])) {
   define('BASEPATH', dirname(__FILE__));
   include('../include/connection.php');

   $user = $_POST['username'];
   $pass = mysqli_real_escape_string($con, $_POST['pass']);

   if ($user == null || $pass == null) {

      echo '<script type="text/javascript">alert("Username / Password tidak boleh kosong");</script>';

   } else {

      $log = $con->prepare("SELECT * FROM t_admin WHERE username = ?") or die($con->error);
      $log->bind_param('s', $user);
      $log->execute();
      $log->store_result();
      $jml = $log->num_rows();
      $log->bind_result($id, $username, $fullname, $password);
      $log->fetch();

      if ($jml > 0) {

         if (password_verify($pass, $password)) {

            $_SESSION['id_admin']   = $id;
            $_SESSION['user']       = $fullname;

            header('location:./dashboard.php');

         } else {

            echo '<script type="text/javascript">alert("Password Salah");</script>';
         }

      } else {

         echo '<script type="text/javascript">alert("Username tidak dikenali");</script>';

      }

   }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pemilihan Online- Halaman Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="./"><b>Pemilihan Khatib dan Materi Khutbah Online</b> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h4 class="login-box-msg">Silahkan Login</h4>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <label>Username</label>
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name="submit" value="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
		<div class="col-xs-4">
          <a href="/evoting-main" class="btn btn-primary btn-block btn-flat">Keluar</a>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../assets/js/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>
