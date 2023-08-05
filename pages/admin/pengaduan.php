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
$data = query("SELECT * FROM $page WHERE username = '$username' ")[0];
$userNik = query("SELECT nik FROM masyarakat WHERE username = '$username' ")[0];
$nik = $userNik['nik'];
$dataPengaduan = query("SELECT * FROM pengaduan WHERE nik = '$nik'");


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
                <form action="pengaduan-tambah.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="isi_laporan">Isi Laporan</label>
                    <textarea id="isi_laporan" class="form-control" rows="6" name="isi_laporan"></textarea>
                    <input type="hidden" class="form-control" name="nik" value="<?=$data['nik'];?>">
                  </div>
                  <div class="form-group">
                    <label for="foto">Upload Foto</label>  
                    <input type="file" class="form-control" id="foto" aria-describedby="foto" aria-label="Upload" name="foto">
                  </div>
                  <div class="form-group">
                    <button name='reset' class="btn btn-secondary">Cancel</button>
                    <button type="submit" class="btn btn-success float-right" name="simpan">Kirim Pengaduan</button>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

        <!-- DATA PENGADUAN -->
        
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Data Pengaduan</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="" class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                    <tr class="text-center">
                      <th>No</th>
                      <th>Isi Laporan</th>
                      <th>Tgl Laporan</th>
                      <th>Foto</th>
                      <th>Status</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1; ?>
                      <?php foreach ($dataPengaduan as $row ) :   ?>
                    <tr class="text-center">
                      <td><?= $i++; ?></td>
                      <td><?= $row['isi_laporan']; ?></td>
                      <td><?= $row['tgl_pengaduan']; ?></td>
                      <td>
                        <img src="<?= $root?>dist/img/pengaduan/<?= $row['foto']?>" width="100px" alt="">
                      </td>
                      <td>
                        <span class="badge 
                          <?php 
                            if ($row['status'] === '0') { echo "class= bg-danger"; $text = 'Belum Di Verifikasi';} 
                            elseif ($row['status'] === "proses") { echo "class= bg-warning"; $text = 'Sedang Di Proses';} 
                            else {echo "class= bg-success"; $text = 'Selesai';} 
                          ?> 
                        ">
                        <?= $text; ?>
                        </span>
                      </td>
                      <td class="project-actions">
                        <a class="btn btn-info btn-sm" href="pengaduan-view?id=<?= $row['id_pengaduan'];?>">
                            <i class="fas fa-pencil-alt"></i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="pengaduan-hapus?id=<?=$row['id_pengaduan'];?>">
                            <i class="fas fa-trash"></i>
                            Delete
                        </a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <?php if(empty($dataPengaduan)) : ?>
                  <p class="text-muted text-center">Belum Ada Pengaduan :)</p>
                <?php endif; ?>
              </div>
              <!-- /.card-body -->
            </div>
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
