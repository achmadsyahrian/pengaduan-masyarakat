<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} 
require '../functions.php';

if (editPasswordAdmin($_POST) > 0) {
  echo "
    <script>
      document.location.href = 'password';
    </script>
    ";
} else {
  echo "
    <script>
      document.location.href = 'password';
    </script>
    ";
}
?>