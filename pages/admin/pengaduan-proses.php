<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}

require '../functions.php';
$title = "Pengaduan Proses";
$level = $_SESSION['level'];

$resultPengaduanMasuk = query("SELECT * FROM pengaduan WHERE status = 'proses'");


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

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
            <?php if (count($resultPengaduanMasuk) > 0) :
                $i = 1;
                foreach ($resultPengaduanMasuk as $row) :
                $nik = $row['nik'];
                $dataMas = query("SELECT * FROM masyarakat WHERE nik = '$nik'");
            ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Masyarakat
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b><?= $dataMas[0]['nama'] ?></b></h2>
                                    <p class="text-muted text-sm"><b>Laporan: </b> <?= substr($row['isi_laporan'], 0, 30 ) . '...'; ?> </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Tanggal : <?= $row['tgl_pengaduan']; ?></li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?= $dataMas[0]['telp'] ?></li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/pengaduan/<?= $row['foto']?>" style="width:130px; height:120px; object-fit:cover; " alt="user-avatar" class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="pengaduan-detail?nik=<?=$row['nik']?>&id=<?=$row['id_pengaduan']?>" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-eye"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; else: ?>
              <div class="col-12 text-center">
                <div class="my-5 bg-light p-3 rounded">
                  <h4 class="text-muted"><i class="fa-solid fa-circle-exclamation"></i> Belum ada pengaduan</h4>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">6</a></li>
              <li class="page-item"><a class="page-link" href="#">7</a></li>
              <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

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
