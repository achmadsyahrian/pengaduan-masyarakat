<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "Password";
$id = $_SESSION['id_user'];
$page = $_SESSION['page'];
$level = $_SESSION['level'];
$data = query("SELECT * FROM $page WHERE id_user = '$id' ")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../partials/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=$root?>dist/img/pengaduan.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <?php include('../../partials/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('../../partials/sidebar.php'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <?php include('../../partials/content-header.php'); ?>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Changes Password</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="password-ubah.php" method="POST">
                  <div class="form-group">
                    <label for="passwordOld">Password Sekarang</label>
                    <div class="input-group mb-3">
                      <input type="password" id="passwordOld" required class="form-control" name="passwordOld" placeholder="Enter Current Password"> 
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>

                    <input type="hidden" class="form-control" name="nik" value="<?=$data['nik'];?>">
                    <input type="hidden" class="form-control" name="username" value="<?=$data['username'];?>">
                    <input type="hidden" class="form-control" name="telp" value="<?=$data['telp'];?>">
                    <input type="hidden" class="form-control" name="nama" value="<?=$data['nama'];?>">

                  </div>
                  <div class="form-group">
                    <label for="passwordNew">Password Baru</label>
                    <div class="input-group mb-3">
                      <input type="password" id="passwordNew" required maxlength="35" class="form-control" name="passwordNew" placeholder="Enter New Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="passwordNew2">Konfirmasi Password Baru</label>
                    <div class="input-group mb-3">
                      <input type="password" id="passwordNew2" required maxlength="35" class="form-control" name="passwordNew2" placeholder="Enter Confirm New Password">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="reset" class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success float-right" name="simpan">Save Changes</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <div class="row">
        <div class="col-3">
          
        </div>
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('../../partials/footer.php'); ?>
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('../../partials/script.php'); ?>
</body>
</html>
