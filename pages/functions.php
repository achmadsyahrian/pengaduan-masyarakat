<?php 
// Koneksi DB
$connect = mysqli_connect('localhost', 'root', '', 'pdm_ukk');

// =========================================================

function query($query) {
  global $connect;
  $result = mysqli_query($connect, $query);
  $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
    }
    return $rows;
}

// =========================================================


// =========================================================
function register($data) {
  global $connect;

  // panggil semua data jadi variabel
  $nik = $data['nik'];
  $nama = mysqli_real_escape_string($connect, $data['nama']);
  $username = mysqli_real_escape_string($connect, $data['username']);
  $password = md5($data['password']);
  $password2 = md5($data['password2']);
  $telp = mysqli_real_escape_string($connect, $data['telp']);

  // cek username sudah pernah ada atau belum di DB
  $result = mysqli_query($connect, "SELECT nik FROM masyarakat WHERE nik = '$nik' ");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
      alert('NIK sudah terdaftar!');
    </script>";
    return false;
  }

  // cek konfirmasi password
  if ($password2 !== $password) {
    echo "
    <script>
      alert('Konfirmasi Password Tidak Sesuai!');
    </script>";
    return false;
  }

  // input data ke DB TB.Masyarakat
  $query = "INSERT INTO masyarakat VALUES (NULL, '$nik', '$nama', '$username', '$password', '$telp', 'masyarakat') ";
  mysqli_query($connect, $query);

  // cek status input apakah berhasil atau tidak
  return mysqli_affected_rows($connect);
}
// =========================================================


// =========================================================
function login($data) {
  global $connect;

  $username = htmlspecialchars($data['username']);
  $password = md5($data['password']);

  $query = "SELECT id_user AS id, username, password, level FROM masyarakat WHERE username='$username' AND password='$password'
            UNION
            SELECT id_petugas AS id, username, password, level FROM petugas WHERE username='$username' AND password='$password'";

  $cekUser = mysqli_query($connect, $query);

  if (!$cekUser) {
    throw new Exception(mysqli_error($connect));
  }

  if (mysqli_num_rows($cekUser) > 0) {
    $data = mysqli_fetch_assoc($cekUser);

    if ($data['level'] == "masyarakat") {
      $_SESSION['username'] = $data['username'];
      $_SESSION['id_user'] = $data['id'];
      $_SESSION['level'] = "Masyarakat";
      $_SESSION['page'] = "masyarakat";
      header('Location:../masyarakat/');
      return true;

    } elseif ($data['level'] == "petugas") {
      $_SESSION['username'] = $data['username'];
      $_SESSION['id_petugas'] = $data['id'];
      $_SESSION['level'] = "Petugas";
      $_SESSION['page'] = "petugas";
      header('Location:../petugas/');
      return true;

    } elseif ($data['level'] == "admin") {
      $_SESSION['username'] = $data['username'];
      $_SESSION['id_petugas'] = $data['id'];
      $_SESSION['level'] = "Admin";
      $_SESSION['page'] = "admin";
      header('Location:../admin/');
      return true;
    }

  } else {
    // user tidak ditemukan
    return false;
  }
}





// =========================================================


// =========================================================
function editMasyarakat($data) {
  global $connect;

  $id_user = $data['id_user'];
  $nama = htmlspecialchars($data['nama']);
  $username = htmlspecialchars(strtolower($data['username']));
  $telp = $data['telp'];

  $query = "UPDATE masyarakat SET
            nama = '$nama',
            username = '$username',
            telp = '$telp'
            WHERE id_user = '$id_user'
            ";

  $result = mysqli_query($connect, $query);
  if ($result) {
    return $_SESSION['editMasyarakat'] = true;
  } else {
    echo mysqli_error($connect);
  }

}


// =========================================================

// =========================================================
function editPasswordMasyarakat($data) {
  global $connect;

  // Definisikan variabel $response di awal fungsi
  $response = array();

  $nik = $data['nik'];
  $nama =$data['nama'];
  $username = $data['username'];
  $telp = $data['telp'];

  $passwordOld = md5($data['passwordOld']);
  $passwordNew = md5($data['passwordNew']);
  $passwordNew2 = md5($data['passwordNew2']);
  $result = mysqli_query($connect, "SELECT password FROM masyarakat WHERE password = '$passwordOld' ");

  // cek password yang lama
  if (!mysqli_fetch_assoc($result)) {
    $_SESSION['samePassword'] = true;
    return $_SESSION['samePassword'];
  }

  // cek konfirmasi password
  if ($passwordNew2 !== $passwordNew) {
    $_SESSION['confirmPassword'] = true;
    return $_SESSION['confirmPassword'];
  }

  $password = $passwordNew2;
  
  $query = "UPDATE masyarakat SET
            nik = $nik,
            nama = '$nama',
            username = '$username',
            password = '$password',
            telp = $telp,
            level = 'masyarakat'
            ";
  mysqli_query($connect, $query);

  if (mysqli_affected_rows($connect) > 0) {
    $_SESSION['passwordSuccess'] = true;
    return $_SESSION['passwordSuccess'];
  } 

  return $_SESSION;
}


// =========================================================


// =========================================================
function upload() {
  global $connect;

  $namaFile = $_FILES['foto']['name'];
  $error = $_FILES['foto']['error'];
  $ukuranFile = $_FILES['foto']['size'];
  $tmpName = $_FILES['foto']['tmp_name'];

   // cek ukuran file
  if ($ukuranFile > 4000000) { // satuan perhitungannya adalah kilobyte(kb)
    $_SESSION['overSize'] = true;
    return false;
  }

  //lolos pengecekan
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $namaFile;
  $lokasiUpload = "../../dist/img/pengaduan/";
  move_uploaded_file($tmpName, $lokasiUpload.$namaFileBaru);
  return $namaFileBaru;
}

// =========================================================


// =========================================================
function tambahPengaduan($data) {
  global $connect;

  $isi_laporan = htmlspecialchars($data['isi_laporan']);
  $nik = $data['nik'];
  $tgl_pengaduan = date("Y-m-d");
  // cek masuk ke function upload
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO pengaduan
                VALUES
            (NULL, '$tgl_pengaduan', '$nik', '$isi_laporan', '$gambar', '0')
            ";

  mysqli_query($connect, $query);

  return $_SESSION['tambahPengaduan'] = true;

}
// =========================================================


// =========================================================

function hapusPengaduan($id) {
  global $connect;

  $result_nama_file = mysqli_query($connect, "SELECT foto FROM pengaduan WHERE id_pengaduan = $id");
  $nama_file = mysqli_fetch_assoc($result_nama_file)['foto'];
  
  $file_path = "../../dist/img/pengaduan/" . $nama_file;
  if (file_exists($file_path)) {
      unlink($file_path);
  }
  
  mysqli_query($connect, "DELETE FROM pengaduan WHERE id_pengaduan = $id");
  
  return $_SESSION['hapusPengaduan'] = true;
  
}

// =========================================================

function editPengaduan($data) {
  global $connect;

  $id_pengaduan = $data['id_pengaduan'];  
  $isi_laporan = htmlspecialchars($data['isi_laporan']);

  $gambar = null;
  if (!empty($_FILES['foto']['name'])) {
    $gambar = upload();
    if (!$gambar) {
      return false;
    }
  }

  if ($gambar) {
    $query = "UPDATE pengaduan SET isi_laporan = '$isi_laporan', foto = '$gambar' WHERE id_pengaduan = $id_pengaduan";
  } else {
    $query = "UPDATE pengaduan SET isi_laporan = '$isi_laporan' WHERE id_pengaduan = $id_pengaduan";
  }

  $result = mysqli_query($connect, $query);
  if ($result) {
    $_SESSION['ubahBerhasil'] = true;
  }

  return $result;
}





// ADMIN
// profile admin
function editAdmin($data) {
  global $connect;

  $id_petugas = $data['id_petugas'];
  $nama = htmlspecialchars($data['nama']);
  $username = htmlspecialchars(strtolower($data['username']));
  $telp = $data['telp'];

  $query = "UPDATE petugas SET
            nama_petugas = '$nama',
            username = '$username',
            telp = '$telp'
            WHERE id_petugas = $id_petugas
            ";

  $result = mysqli_query($connect, $query);
  if ($result) {
    return $_SESSION['editMasyarakat'] = true;
  } else {
    echo mysqli_error($connect);
  }

}


// password admin
function editPasswordAdmin($data) {
  global $connect;

  // Definisikan variabel $response di awal fungsi
  $response = array();

  $id = $data['id_petugas'];
  $passwordOld = md5($data['passwordOld']);
  $passwordNew = md5($data['passwordNew']);
  $passwordNew2 = md5($data['passwordNew2']);
  $result = mysqli_query($connect, "SELECT password FROM petugas WHERE password = '$passwordOld' ");

  // cek password yang lama
  if (!mysqli_fetch_assoc($result)) {
    $_SESSION['samePassword'] = true;
    return $_SESSION['samePassword'];
  }

  // cek konfirmasi password
  if ($passwordNew2 !== $passwordNew) {
    $_SESSION['confirmPassword'] = true;
    return $_SESSION['confirmPassword'];
  }

  $password = $passwordNew2;
  
  $query = "UPDATE petugas SET
            password = '$password'
            WHERE id_petugas = $id
            ";
  mysqli_query($connect, $query);

  if (mysqli_affected_rows($connect) > 0) {
    $_SESSION['passwordSuccess'] = true;
    return $_SESSION['passwordSuccess'];
  } 

  return $_SESSION;
}


// Set Status Verif
function simpanStatus($data) {
  global $connect;

  $status = $data['status'];
  $id = $data['id_pengaduan'];

  if($status == 'tolak') {
    $nilai = 'ditolak';
    $_SESSION['status'] = 'ditolak';
  } else {
    $nilai = 'proses';
    $_SESSION['status'] = 'diverifikasi';
  }

  $query = "UPDATE pengaduan SET status='$nilai' WHERE id_pengaduan='$id'";

  mysqli_query($connect, $query);

  if (mysqli_affected_rows($connect) > 0) {
    return $_SESSION;
  } else {
    return false; // Jika tidak ada baris yang terpengaruh oleh operasi UPDATE
  }
}



// PETUGAS
// kirim tanggapan
function kirimTanggapan($data) {
  global $connect;

  $id_pengaduan = $data['id_pengaduan'];
  $id_petugas = $data['id_petugas'];
  $tgl_tanggapan = date("Y-m-d");
  $tanggapan = htmlspecialchars($data['tanggapan']);

  // Tambahkan tanggapan pada tabel tanggapan
  $query_tanggapan = "INSERT INTO tanggapan VALUES (NULL, $id_pengaduan, '$tgl_tanggapan', '$tanggapan', $id_petugas )";
  $result_tanggapan = mysqli_query($connect, $query_tanggapan);

  // Jika tanggapan berhasil ditambahkan, update status pengaduan menjadi "selesai"
  if ($result_tanggapan) {
    $query_pengaduan = "UPDATE pengaduan SET status = 'selesai' WHERE id_pengaduan = $id_pengaduan";
    $result_pengaduan = mysqli_query($connect, $query_pengaduan);

    if ($result_pengaduan) {
      $_SESSION['kirimTanggapan'] = true;
    }
  }

  return $_SESSION['kirimTanggapan'];
}







?>