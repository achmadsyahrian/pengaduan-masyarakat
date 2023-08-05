<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

$title = "Dashboard";
$level = $_SESSION['level'];

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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Web Pelaporan Pengaduan Masyarakat</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          Selamat datang di situs Pelaporan Pengaduan Masyarakat <br>
          Website ini dibuat sebagai sarana untuk melaporkan segala keluhan yang ada di lingkungan masyarakat.
        </div>

        <div class="card-footer">
          <div id="time"></div>
          <script>
            function displayTime() {
              var time = new Date();
              document.getElementById("time").innerHTML = time.toLocaleTimeString();
            }
            setInterval(displayTime, 1000);
          </script>
        </div>
      </div>
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
