<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} 
require '../functions.php';

if (simpanStatus($_POST) > 0) {
  echo "
    <script>
      document.location.href = 'pengaduan-masuk';
    </script>
    ";
} else {
  echo "
    <script>
      document.location.href = 'pengaduan-masuk';
    </script>
    ";
}
?>