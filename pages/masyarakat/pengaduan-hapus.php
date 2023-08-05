<?php 

session_start();
if (!isset($_SESSION['level'])) {
	header("Location:../autentikasi/login");
} 
require '../functions.php';

$id = $_GET["id"];

if (hapusPengaduan($id) > 0) {
  echo "
    <script>
      window.history.back();
    </script>
    ";
    
}
?>