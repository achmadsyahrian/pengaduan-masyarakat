<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "My Profile";
$id_petugas = $_SESSION['id_petugas'];
$page = $_SESSION['page'];
$level = $_SESSION['level'];

$data = query("SELECT * FROM petugas WHERE id_petugas = '$id_petugas' ")[0];



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
          <div class="col-md-5">
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                </div>
                <p class="profile-username text-center fw-bolder"><?= $data['nama_petugas']; ?></p>
                <p class="text-muted text-center"><?= ucfirst($data['level']); ?></p>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Nama</b> <a class="float-right"><?= $data['nama_petugas']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Username</b> <a class="float-right"><?= $data['username']; ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>No. Telp</b> <a class="float-right"><?= $data['telp']; ?></a>
                  </li>
                </ul>

                <a href="profile-view" class="btn btn-primary btn-block"><b>Edit</b></a>
              </div>
              <!-- /.card-body -->
            </div>
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
