<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} 
require '../functions.php';

if (editMasyarakat($_POST) > 0) {
  echo "
    <script>
      document.location.href = 'profile';
    </script>
    ";
} else {
  echo "
    <script>
      document.location.href = 'profile';
    </script>
    ";
}
?>