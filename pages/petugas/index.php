<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}
require "../functions.php";
$title = "Dashboard";
$level = $_SESSION['level'];

$resultPetugas = mysqli_query($connect, "SELECT * FROM petugas");
$jumlahPetugas = mysqli_num_rows($resultPetugas);

$resultPengaduan = mysqli_query($connect, "SELECT * FROM pengaduan");
$jumlahPengaduan = mysqli_num_rows($resultPengaduan);

$resultPengaduanProses = mysqli_query($connect, "SELECT * FROM pengaduan WHERE status = 'proses' ");
$jumlahPengaduanProses = mysqli_num_rows($resultPengaduanProses);

$resultPengaduanSelesai = mysqli_query($connect, "SELECT * FROM pengaduan WHERE status = 'selesai' ");
$jumlahPengaduanSelesai = mysqli_num_rows($resultPengaduanSelesai);

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


  <div class="content-wrapper">

    <?php include('../../partials/content-header.php'); ?>

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?= $jumlahPetugas; ?></h3>
                <p>Petugas</p>
              </div>
              <div class="icon">
                <i class="fa fa-users" style="font-size:60px;" aria-hidden="true"></i>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-6 ">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 class="text-light"><?= $jumlahPengaduan; ?></h3>
                <p class="text-light">Semua Pengaduan</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-envelope" style="font-size:60px;"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning ">
              <div class="inner">
                <h3 class="text-light"><?= $jumlahPengaduanProses; ?></h3>
                <p class="text-light">Pengaduan Diproses</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-envelope" style="font-size:60px;"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jumlahPengaduanSelesai; ?></h3>
                <p>Pengaduan Selesai</p>
              </div>
              <div class="icon">
                <i class="fa-solid fa-envelope" style="font-size:60px;"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
  </div>

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
