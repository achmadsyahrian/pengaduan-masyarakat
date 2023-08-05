<?php 
$page = $_SESSION['page'];
$level = $_SESSION['level'];


?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="<?=$root?>dist/img/pengaduan.png" alt="AdminLTE Logo" class="mx-1 brand-image img-circle elevation-3" style="opacity: .9">
      <span class="brand-text font-weight-light">Pengaduan Masyarakat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
          <li class="nav-header">PAGES</li>
          <li class="nav-item ">
            <a href="<?=$root?>pages/<?=$page?>/" class="nav-link <?php if ($title == "Dashboard") { echo 'active';}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">USER</li>
          <li class="nav-item <?php if ($title == "My Profile" || $title == "Password") { echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php if ($title == "My Profile" || $title == "Password") { echo 'active';}?>">
              <i class="fa-solid fa-user nav-icon"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile" class="nav-link <?php if ($title == "My Profile") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profile Saya</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="password" class="nav-link <?php if ($title == "Password") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ganti Password</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- NAVBAR MASYARAKAT-->
          <?php if ($level == "Masyarakat") :?>
            <li class="nav-item <?php if ($title == "Pengaduan") { echo 'menu-open';}?>">
              <a href="#" class="nav-link <?php if ($title == "Pengaduan") { echo 'active';}?>">
                <i class="nav-icon fa fa-wrench" aria-hidden="true"></i>
                <p>
                  Pengaturan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pengaduan" class="nav-link <?php if ($title == "Pengaduan") { echo 'active';}?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Tulis Pengaduan</p>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif; ?>
          <!-- NAVBAR ADMIN -->
          <?php if ($level == "Admin" || $level == "Petugas") : ?>
            <li class="nav-header">ADMIN</li>
            <li class="nav-item <?php if ($title == "Pengaduan Masuk" || $title == "Pengaduan Proses" || $title == "Pengaduan Selesai" || $title == "Pengaduan Ditolak" || $title == "Pengaduan") { echo 'menu-open';}?>">
            <a href="#" class="nav-link <?php if ($title == "Pengaduan Masuk" || $title == "Pengaduan Proses" || $title == "Pengaduan Selesai" || $title == "Pengaduan Ditolak" || $title == "Pengaduan") { echo 'active';}?>">
              <i class="fa-solid fa-user-gear nav-icon ml-1"></i>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pengaduan-masuk" class="nav-link <?php if ($title == "Pengaduan Masuk") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengaduan-proses" class="nav-link <?php if ($title == "Pengaduan Proses") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengaduan-selesai" class="nav-link <?php if ($title == "Pengaduan Selesai") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan Selesai</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pengaduan-ditolak" class="nav-link <?php if ($title == "Pengaduan Ditolak") { echo 'active';}?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pengaduan Ditolak</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if ($level == "Admin") : ?>
          <li class="nav-item ">
            <a href="laporan" class="nav-link <?php if ($title == "Laporan") { echo 'active';}?>">
              <i class="nav-icon fa-solid fa-print"></i>
              <p>
                Generate Laporan
              </p>
            </a>
          </li>
          <?php endif; ?>
          <?php endif; ?>
          
          
          <li class="nav-header">AUTENTIKASI</li>
          <li class="nav-item ">
            <a href="<?=$root?>pages/autentikasi/logout" class="nav-link">
              <i class="nav-icon fa fa-share-square" aria-hidden="true"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>