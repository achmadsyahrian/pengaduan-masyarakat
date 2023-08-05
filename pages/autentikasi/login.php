<?php
session_start();
if (isset($_SESSION['username'])) {
  $direktori = $_SESSION['page'];
  header('Location:../' . $direktori . '/');
}

require '../functions.php';
$title="Login";

if (isset($_POST['login'])) {
	if (login($_POST) > 0) {
  } else {
			echo "<script>
						alert('Username atau Password Salah');
						</script>";
      echo mysqli_error($connect);
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../partials/head.php');?> 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3 class="h3"><b>Pengaduan </b>Masyarakat</h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Log In Your Account</p>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-user-circle" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <center>
        <p class="mb-0">
          <a href="register" class="text-center">Belum memiliki akun?</a>
        </p>
      </center>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
  <?php include('../../partials/head.php'); ?>
</body>
</html>
