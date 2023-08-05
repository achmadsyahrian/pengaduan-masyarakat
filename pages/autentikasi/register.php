<?php
session_start();
if (isset($_SESSION['username'])) {
  $direktori = $_SESSION['page'];
  header('Location:../' . $direktori . '/');
}

require '../functions.php';
$title="Register";

if (isset($_POST['register'])) {
  if (register($_POST) > 0) {
    echo "<script>
      alert('Akun Berhasil Didaftar');
      document.location.href='login';
    </script>";
  } else {
    echo "<script>
      alert('Akun Gagal Didaftarkan');
    </script>";
    echo mysqli_error($connect);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../partials/head.php'); ?>
  <style>
    .mirror {
      transform: scaleX(-1);
    }
  </style>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <h3 class="h3"><b>Pengaduan </b>Masyarakat</h3>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register Your Account</p>
      <form action="" method="POST">
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="NIK" name="nik">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-id-card" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nama" name="nama">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-id-card" aria-hidden="true"></i>
            </div>
          </div>
        </div>
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
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="number" class="form-control" placeholder="No. Telp" name="telp">
          <div class="input-group-append">
            <div class="input-group-text">
              <i class="fa fa-phone mirror" aria-hidden="true"></i>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" name="register">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <br>
      <center>
        <a href="login" class="text-center">Sudah memiliki akun?</a>
      </center>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<?php include('../../partials/script.php'); ?>
</body>
</html>
