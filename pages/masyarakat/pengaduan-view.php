<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "Pengaduan";
$username = $_SESSION['username'];
$page = $_SESSION['page'];
$level = $_SESSION['level'];
$id_pengaduan = $_GET['id'];
$dataPengaduan = query("SELECT * FROM pengaduan WHERE id_pengaduan = $id_pengaduan")[0];
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
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Pengaduan</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <form action="pengaduan-ubah.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="container">
                      <img src="<?= $root?>dist/img/pengaduan/<?= $dataPengaduan['foto'];?>" class="img-fluid" alt="Foto">
                    </div>
                    <?php if ($dataPengaduan['status'] === "0" ) :?>
                    <div class="form-group mt-4">
                      <label for="foto">Upload Foto</label>  
                      <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                      <input type="hidden" class="form-control" name="id_pengaduan" value="<?= $id_pengaduan?>">
                      <i class="text-info ml-1">kosongkan jika tidak ingin mengubah foto! [JPG, JPEG, PNG]</i>
                    </div>
                    <?php endif; ?>
                    <div class="form-group">
                      <label for="isi_laporan">Isi Laporan</label>
                      <textarea id="isi_laporan" class="form-control" rows="6" name="isi_laporan"><?= $dataPengaduan['isi_laporan'];?></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="nama">Tgl Pengaduan</label>
                    <div class="input-group mb-3">
                      <style>
                        input[type="date"]::-webkit-calendar-picker-indicator {
                          display: none;
                        }
                      </style>
                      <input type="date" id="nama" maxlength="35" readonly class="form-control" name="nama" value="<?=$dataPengaduan['tgl_pengaduan'];?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="username">Status</label>
                    <div class="input-group mb-3">
                      <input type="username" id="username" readonly maxlength="25" class="form-control" name="username" value="<?=ucfirst($dataPengaduan['status']);?>">
                      <div class="input-group-append">
                        <div class="input-group-text">
                          <i class="fa fa-spinner" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <?php if ($dataPengaduan['status'] === "0") : ?>
                    <button name='back' class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success float-right" name="simpan">Save Changes</button>
                    <?php endif; ?>
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
