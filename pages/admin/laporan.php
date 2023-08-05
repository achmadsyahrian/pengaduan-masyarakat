<?php 
session_start();
if (!isset($_SESSION['username'])) {
  header('Location:../autentikasi/login');
}
require "../functions.php";
$title = "Laporan";
$level = $_SESSION['level'];

$resultPengaduan = query("SELECT * FROM pengaduan WHERE status = 'selesai' ");

$query = query("SELECT p.*, t.*, m.nama
FROM pengaduan p 
LEFT JOIN tanggapan t ON p.id_pengaduan = t.id_pengaduan 
LEFT JOIN masyarakat m ON p.nik = m.nik 
WHERE p.status = 'selesai'
");


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('../../partials/head.php'); ?>
  <style>
  .dataTables_filter {
    float: right;
  }

  .pagination {
    justify-content: flex-end;
  }

  .page-item.active .page-link {
    background-color: #4caf50;
    border-color: #4caf50;
    color: white;
  }

  .card-title {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 20px;
  }

  .dataTables_empty {
  text-align: center;
}


</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
 

  <!-- Navbar -->
  <?php include('../../partials/navbar.php'); ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include('../../partials/sidebar.php'); ?>


  <div class="content-wrapper">

    <?php include('../../partials/content-header.php'); ?>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped table-hover" width="1500px">
                    <thead class="bg-success">
                      <tr class="text-center">
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Laporan</th>
                        <th>Tanggal P</th>
                        <th>Status</th>
                        <th>Tanggapan</th>
                        <th>Tanggal T</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $i=1; ?>
                      <?php foreach ($query as $row) : ?>
                        <tr class="text-center">
                          <td><?= $i++; ?></td>
                          <td width="120px"><?= $row['nama']; ?></td>
                          <td><?= $row['nik']; ?></td>
                          <td width="450px"><?= $row['isi_laporan'] ?></td>
                          <td width="120px"><?= $row['tgl_pengaduan']; ?></td>
                          <td><span class="badge badge-success"> <?= $row['status']; ?> </span> </td>
                          <td width="400px"><?= $row['tanggapan'] ?></td>
                          <td width="120px"><?= $row['tgl_tanggapan']; ?></td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
          <!-- /.col -->
      </div>
      <!-- /.container-fluid -->
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
