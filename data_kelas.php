<?php 
session_start();


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
            <div class="card-header py-3">
              <h5 class="m-0 font-weight-bold text-primary" align="Center">Data Kelas</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Id Kelas</th>
                      <th>Kelas</th>
                      <th>Jurusan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    include 'koneksi.php';
                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM tb_kelas");

                      while ($data = $sql->fetch_assoc()) {
                  ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['id_kelas']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['kompetensi_keahlian']; ?></td>
                      
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['id_kelas']; ?>"><i class="fa fa-edit"></i></button>
                        <a href="hapus_kelas.php?id=<?php echo $data['id_kelas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus <?php echo $data['nama_kelas'] ?> ?')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                       

<!-- Modal Edit -->
<div class="modal fade" id="edit<?= $data['id_kelas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
        <?php
          $kode = $data['id_kelas'];
          $sql_edit = $koneksi->query("SELECT * FROM tb_kelas WHERE id_kelas='$kode'");
          while ($data_edit = $sql_edit->fetch_assoc()) {           
        ?>

        <div class="form-group">
            <label for="exampleInputNama">Id Kelas</label>
            <input type="text" name="id_kelas" class="form-control" readonly value="<?php echo $data_edit['id_kelas']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Kelas</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas" value="<?php echo $data_edit['nama_kelas']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" value="<?php echo $data_edit['kompetensi_keahlian']; ?>">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
      </div>
      </form>
      <?php } ?>
    </div>
  </div>
</div>

<?php
  include 'koneksi.php';
    if (isset($_POST['edit'])) {
      $id_kelas = $_POST['id_kelas'];
      $kelas = $_POST['kelas'];
      $jurusan = $_POST['jurusan'];
    
      $sql = $koneksi->query("UPDATE tb_kelas SET id_kelas='$id_kelas', nama_kelas='$kelas', kompetensi_keahlian='$jurusan' WHERE id_kelas='$id_kelas'");
            if ($sql) {
                ?>
                <script>
                    alert("Data Ini Berhasil Di Edit");
                    window.location.href = "data_kelas.php";
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    alert("Data Ini Gagal Di Edit");
                    window.location.href = "data_kelas.php";
                </script>
                <?php

            }
        }

?>

               
                <?php }  ?>
                  </tbody>
                </table>
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
            include 'koneksi.php';
            $sql = $koneksi->query("select id_kelas from tb_kelas order by id_kelas desc");
            $data = $sql->fetch_assoc();

            $id = $data['id_kelas'];

            $urut = substr($id, 2, 3);

            $tambah = (int) $urut+1;

            if (strlen($tambah) == 1) {
              $format = "DK"."00".$tambah;
            }
            elseif (strlen($tambah) == 2) {
              $format = "DK"."0".$tambah;
            }
            else {
              $format = "DK".$tambah;
            }
         ?>

         
<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kelas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">

          <div class="form-group">
            <label for="exampleInputNama">Id kelas</label>
            <input type="text" name="id_kelas" class="form-control" readonly value="<?php echo $format; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Kelas</label>
            <input type="text" name="kelas" class="form-control" placeholder="Masukan Kelas" required>
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Jurusan</label>
            <input type="text" name="jurusan" class="form-control" placeholder="Masukan Jurusan" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

<?php
  include 'koneksi.php';
    if (isset($_POST['simpan'])) {
      $id_kelas = $_POST['id_kelas'];
      $kelas = $_POST['kelas'];
      $jurusan = $_POST['jurusan'];
    
      $sql = $koneksi->query("insert into tb_kelas (id_kelas, nama_kelas, kompetensi_keahlian)values('$id_kelas','$kelas','$jurusan')");
            if ($sql) {
                ?>
                <script>
                    alert("Data Ini Berhasil Di Simpan");
                    window.location.href = "data_kelas.php";
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    alert("Data Ini Gagal Di Simpan");
                    window.location.href = "data_kelas.php";
                </script>
                <?php

            }
        }

      ?>

  <?php
    }
    else {
      header("location:login.php"); 
    }
  ?>