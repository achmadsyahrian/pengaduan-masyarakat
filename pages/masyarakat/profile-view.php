<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "My Profile";
$id_user = $_SESSION['id_user'];
$page = $_SESSION['page'];
$level = $_SESSION['level'];
$data = query("SELECT * FROM $page WHERE id_user = '$id_user' ")[0];



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
                <h3 class="card-title">Edit Profile</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="profile-ubah.php" method="POST">
                  <div class="form-group">
                    <label for="nik">NIK</label>
                    <div class="input-group mb-3">
                      <input type="text" id="nik" readonly class="form-control" name="nik" value="<?=$data['nik'];?>">
                      <input type="hidden" id="nik" required class="form-control" name="id_user" value="<?=$data['id_user'];?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-id-card" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                    <script>
                      const nik = document.getElementById("nik");
                      nik.addEventListener("input", function() {
                        if (this.value.length > 16) {
                          this.value = this.value.slice(0, 16);
                        }
                      });
                    </script>
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <div class="input-group mb-3">
                      <input type="text" id="nama" maxlength="35" required class="form-control" name="nama" value="<?=$data['nama'];?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-id-card" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" class="form-control" name="password" value="<?=$data['password'];?>">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group mb-3">
                      <input type="username" id="username" required maxlength="25" class="form-control" name="username" value="<?=$data['username'];?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-user-circle" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telp">No. Telepon</label>
                    <div class="input-group mb-3">
                      <input type="number" id="telp" required class="form-control" name="telp" value="<?=$data['telp'];?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-phone mirror" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <button name='back' class="btn btn-secondary">Cancel</button>
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
