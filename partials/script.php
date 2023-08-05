<script src="<?= $root?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= $root?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= $root?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= $root?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= $root?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= $root?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $root?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= $root?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= $root?>plugins/moment/moment.min.js"></script>
<script src="<?= $root?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= $root?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= $root?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= $root?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $root?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $root?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= $root?>dist/js/pages/dashboard.js"></script>

<script src="<?= $root?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $root?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $root?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $root?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= $root?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $root?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $root?>plugins/jszip/jszip.min.js"></script>
<script src="<?= $root?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $root?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $root?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $root?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= $root?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= $root?>plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= $root?>plugins/toastr/toastr.min.js"></script>

<script src="https://kit.fontawesome.com/03b5eda5f6.js" crossorigin="anonymous"></script>

<script>
  $(function () {
  $("#example1").DataTable({
    "responsive": false,
    "lengthChange": false,
    "buttons": [
      {
        extend: 'copyHtml5',
        exportOptions: {
          orthogonal: 'landscape'
        },
        customize: function (doc) {
          doc.defaultStyle.orientation = 'landscape';
        }
      },
      {
        extend: 'csvHtml5',
        exportOptions: {
          orthogonal: 'landscape'
        },
        customize: function (doc) {
          doc.defaultStyle.orientation = 'landscape';
        }
      },
      {
        extend: 'excelHtml5',
        exportOptions: {
          orthogonal: 'landscape'
        },
        customize: function (xlsx) {
          var sheet = xlsx.xl.worksheets['sheet1.xml'];
          $('row', sheet).each(function () {
            $(this).attr('spans', '1:100');
          });
        }
      },
      {
        extend: 'pdfHtml5',
        exportOptions: {
          orthogonal: 'landscape'
        },
        customize: function (doc) {
          doc.defaultStyle.orientation = 'landscape';
        }
      },
      {
        extend: 'print',
        exportOptions: {
          orthogonal: 'landscape'
        },
        customize: function (win) {
          $(win.document.body).addClass('landscape')
        }
      }
    ],
    "language": {
      "zeroRecords": "Tidak ada hasil yang ditemukan",
      "emptyTable": "Tidak ada data :)"
    }
  }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  $('#example2').DataTable({
    "paging": true,
    "lengthChange": false,
    "searching": false,
    "ordering": true,
    "info": true,
  });
});


  // SWEETALERT 
  var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 4000
    });

    // hapus
    
    <?php if (isset($_SESSION['hapusPengaduan'])) : ?>
      toastr.success('Data Berhasil Dihapus')
  <?php unset($_SESSION['hapusPengaduan']);endif; ?>
  
  // tambah pengaduan
  <?php if (isset($_SESSION['tambahPengaduan'])) : ?>
    toastr.success('Aduan Berhasil Dikirim');
  <?php unset($_SESSION['tambahPengaduan']);endif; ?>

  // CHANGE PASSWORD
    // change password / berhasil
    <?php if (isset($_SESSION['passwordSuccess'])) : ?>
      toastr.success('Password Diubah');
    <?php unset($_SESSION['passwordSuccess']);endif; ?>

    // change password / samePassword
    <?php if (isset($_SESSION['samePassword'])) : ?>
      toastr.error('Password Lama Tidak Sesuai');
    <?php unset($_SESSION['samePassword']);endif; ?>

    // change password / confirmPassword
    <?php if (isset($_SESSION['confirmPassword'])) : ?>
      toastr.error('Konfirmasi Password Tidak Sesuai');
    <?php unset($_SESSION['confirmPassword']);endif; ?>

  // edit masyarakat
  <?php if (isset($_SESSION['editMasyarakat'])) : ?>
    toastr.success('Data Berhasil Diubah');
  <?php unset($_SESSION['editMasyarakat']);endif; ?>

  // edit pengaduan
  <?php if (isset($_SESSION['ubahBerhasil'])) : ?>
    toastr.success('Data Berhasil Diubah');
  <?php unset($_SESSION['ubahBerhasil']);endif; ?>

  // File terlalu besar
  <?php if (isset($_SESSION['overSize'])) : ?>
    toastr.error('Ukuran foto terlalu besar');
  <?php unset($_SESSION['overSize']);endif; ?>

  // Tipe yg dimasukkan bukan gambar (bisa jadi virus)
  <?php if (isset($_SESSION['errorType'])) : ?>
    toastr.error('Harap masukkan file gambar!');
  <?php unset($_SESSION['errorType']);endif; ?>

  // Status Verifikasi)
  <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "diverifikasi") : ?>
  toastr.success('Laporan berhasil diverifikasi!');
  <?php unset($_SESSION['status']);endif; ?>

  // Status DITOLAK
  <?php if (isset($_SESSION['status']) && $_SESSION['status'] == "ditolak") : ?>
  toastr.success('Laporan berhasil ditolak!');
  <?php unset($_SESSION['status']);endif; ?>

  // Kirim engaduan
  <?php if (isset($_SESSION['kirimTanggapan'])) : ?>
    toastr.success('Tanggapan berhasil dikirim!');
  <?php unset($_SESSION['kirimTanggapan']);endif; ?>




  

</script>
