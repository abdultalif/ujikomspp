<?php error_reporting(0) ?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Payment SPP</div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider  ">

  <!-- Heading -->
  <div class="sidebar-heading">
    Dashboard
  </div>

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Dashboard</span></a>
  </li>
  <?php if ($_SESSION['admin'] ) { ?>
  
    <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Menu Data
  </div>

  <li class="nav-item">
    <a class="nav-link" href="data_petugas.php">
      <i class="fas fa-user-secret"></i>
    <span>Data Petugas</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="data_kelas.php">
      <i class="fas fa-dollar-sign"></i>
    <span>Data kelas</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="data_spp.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Data Spp</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="data_siswa.php">
      <i class="fas fa-users"></i>
    <span>Data Siswa</span></a>
  </li>

  <?php } ?>
  
  <?php if ($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['siswa']) { ?>
        
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <div class="sidebar-heading">
    Menu Transaksi
  </div>

  <li class="nav-item">
    <a class="nav-link" href="transaksi.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Transaksi</span></a>
  </li>

  <?php } ?>
  <?php if ($_SESSION['admin'] || $_SESSION['petugas']) { ?>

  <li class="nav-item">
    <a class="nav-link" href="data_transaksi.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Data Transaksi</span></a>
  </li>
  <?php } ?>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
   
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->
