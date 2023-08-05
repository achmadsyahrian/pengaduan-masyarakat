<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "Pengaduan";
$level = $_SESSION['level'];


$id_pengaduan = $_GET['id'];
$resultPengaduan = query("SELECT * FROM pengaduan WHERE id_pengaduan = $id_pengaduan")[0];


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../partials/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->


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
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
                      <div class="row mb-3">
                        <div class="col-sm-12">
                          <img class="img-fluid" src="../../dist/img/pengaduan/<?=$resultPengaduan['foto']?>" style="width:1000px; height:370px; object-fit:cover; " alt="Photo">
                        </div>
                      </div>
                    </div>
                    <div class="post">
                      <p><?= $resultPengaduan['isi_laporan']; ?></p>
                    </div>
                  </div>
                  <?php if ($resultPengaduan['status'] == '0') : ?>
                    <form action="pengaduan-verif" method="POST">
                      <div class="form-group clearfix">
                        <div class="icheck-danger d-inline">
                          <input type="radio" name="status" value="tolak" checked id="radioSuccess1">
                          <input type="hidden" name="id_pengaduan" value="<?= $resultPengaduan['id_pengaduan']?>" checked id="radioSuccess1">
                          <label for="radioSuccess1">Tolak</label>
                        </div>
                        <div class="icheck-success d-inline ml-2">
                          <input type="radio" name="status" value="verifikasi" id="radioSuccess2">
                          <label for="radioSuccess2">Verifikasi</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4" name="simpan">Submit</button>
                      </div>
                    </form>
                  <?php elseif ($resultPengaduan['status'] == "selesai") :
                    $resultTanggapan = query("SELECT * FROM tanggapan WHERE id_pengaduan = $id_pengaduan")[0];
                    $idPetugasTanggapan = $resultTanggapan['id_petugas'];
                    $resultPetugas = query("SELECT * FROM petugas WHERE id_petugas = $idPetugasTanggapan")[0];
                    ?>
                    <div class="tab-content">
                      <div class="active tab-pane" id="activity">
                        <div class="post">
                          <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?=$root?>dist/img/pengaduan.png" alt="user image">
                            <span class="username">
                              <a class="text-primary"><?= $resultPetugas['nama_petugas']; ?><span class="badge bg-success ml-2">Petugas</span></a>
                            </span>
                            <span class="description">
                              Tanggapan
                              - <?= $resultTanggapan['tgl_tanggapan']; ?>
                            </span>
                          </div>
                          </div>
                        </div>
                        <div class="post">
                          <p><?= $resultTanggapan['tanggapan']; ?></p>
                        </div>
                      </div>
                    </div>
                    <div class="alert alert-success">
                      <h1 class="h4 text-center mb-0"><i class="fa-solid fa-circle-check"></i> Laporan Selesai </h1>
                    </div>
                  <?php elseif ($resultPengaduan['status'] == "ditolak") : ?>
                    <div class="alert alert-danger">
                      <h1 class="h4 text-center mb-0"><i class="fa-solid fa-triangle-exclamation"></i> Laporan Ditolak </h1>
                    </div>
                  <?php elseif ($resultPengaduan['status'] == "proses") : ?>
                    <div class="alert alert-warning">
                      <h1 class="h4 text-center mb-0"><i class="fa-solid fa-triangle-exclamation"></i> Laporan Belum Ditanggapi </h1>
                    </div>
                  <?php endif; ?>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
