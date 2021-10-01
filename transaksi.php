<?php 
session_start();
error_reporting(0);


if ($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['siswa']) {
   
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Payment SPP</title>


  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

   

      <?php 
        include 'sidebar.php';
      ?>
       
     

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          
            <?php include 'menu2.php'; ?>
        

        </nav>
        <!-- End of Topbar -->


        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <form action="" method="get">
                      <table class="table">
                          <tr>    
                            <td>
                                <input class="form-control" type="text" name="nis" placeholder="CARI SISWA BERDASARKAN NIS">
                            </td>
                            <td>
                                <button class="btn btn-danger" type="submit"><i class="fas fa-search"></i> Search</button>
                            </td>
                          </tr>
                      </table>
                    </form>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 style="text-align:center;" class="m-0 font-weight-bold text-primary">Biodata Siswa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php 
                    include 'koneksi.php';
                    if (isset($_GET['nis'])){
                        $cari = $_GET['nis'];
                        $sql = $koneksi->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas INNER JOIN tb_spp ON tb_siswa.id_spp = tb_spp.id_spp WHERE nis LIKE '%$cari'");
                        $data = $sql->fetch_assoc();
                    ?>
                    <div class="panel panel-info">
                        <div class="panel panel-body">
                            <table class="table table-bordered">
                              <tr>
                                <td>Nis</td>
                                <td><?= $data['nis'] ?></td>
                              </tr>
                              <tr>
                                <td>Nama Siswa</td>
                                <td><?= $data['nama'] ?></td>
                              </tr>
                              <tr>
                                <td>Kelas</td>
                                <td><?= $data['nama_kelas'] ?></td>
                              </tr>
                              <tr>
                                <td>Alamat</td>
                                <td><?= $data['alamat'] ?></td>
                              </tr>
                    </table>
                    <?php } ?>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

        
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h5 style="text-align:center;" class="m-0 font-weight-bold text-primary">Tagihan Spp Siswa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="panel panel-info">
                      <div class="panel panel-body" style="text-align: center;">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>NO</th>
                              <th>Bulan</th>
                              <th>Tahun Ajaran</th>
                              <th>No bayar</th>
                              <th>Tanggal Bayar</th>
                              <th>Jumlah</th>
                              <th>Keterangan</th>
                              <?php if ($_SESSION['admin'] || $_SESSION['petugas']) { ?>
                              <th>Bayar</th>
                              <?php } ?>
                            </tr>
                          </thead>

                          <tbody>
                            <?php
                            error_reporting(0); 
                              $kode = $data['nisn'];
                              $no = 1;
                              $sql = $koneksi->query("SELECT * FROM tb_pembayaran INNER JOIN tb_spp ON tb_pembayaran.id_spp = tb_spp.id_spp  WHERE nisn = '$kode'");
                              while ($data = $sql->fetch_assoc()) {
                            ?>
                            
                            <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $data['bulan_dibayar']; ?></td>
                              <td><?= $data['tahun']; ?></td>
                              <td><?= $data['no_bayar']; ?></td>
                              <td><?= $data['tgl_bayar']; ?></td>
                              <td>Rp. <?= number_format($data['nominal']); ?></td>
                              <td style="color:#0bb365;"><?= $data['ket']; ?></td>
                              <?php if ($_SESSION['admin'] || $_SESSION['petugas']) { ?>
                              <td>
                                <?php
                                
                                if ($data['no_bayar'] == '') {?>
                                  <a href="proses_transaksi.php?nis=<?= $cari; ?>&act=bayar&id=<?= $data['id_pembayaran']; ?>" class="btn btn-primary"><i class="fa fa-dollar-sign"></i> Bayar</a>
                                <?php
                                } else { ?>
                                  <a href="proses_transaksi.php?nis=<?= $cari; ?>&act=batal&id=<?= $data['id_pembayaran']; ?>" class="btn btn-danger"><i class="fa fa-times"></i> Batal</a>
                                  <a class="btn btn-success" href="print_transaksi.php?nis=<?= $cari; ?>&act=bayar&id=<?= $data['id_pembayaran']; ?>" target="blank"><i class="fa fa-print"></i> Cetak</a>
                                <?php
                                }
                            }
                                ?>  
                              </td>
                            </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js2/bootstrap.js"></script>

</body>

</html>



  <?php
    }
    else {
      header("location:login.php"); 
    }
  ?>