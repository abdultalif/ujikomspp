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

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    
      <?php 
      include 'sidebar.php'
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
              <h5 class="m-0 font-weight-bold text-primary" align="Center">Data Petugas</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Id Petugas</th>
                      <th>Username</th>
                      <th>Password</th>
                      <th>Petugas</th>
                      <th>Level</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php
                    include 'koneksi.php';
                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM tb_petugas");

                      while ($data = $sql->fetch_assoc()) {

                        ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['id_petugas']; ?></td>
                      <td><?php echo $data['username']; ?></td>
                      <td><?php echo $data['password']; ?></td>
                      <td><?php echo $data['nama_petugas']; ?></td>
                      <td><?php echo $data['level']; ?></td>
                      <td>

                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['id_petugas']; ?>"><i class="fa fa-edit"></i></button>

                        <a href="hapus_petugas.php?id=<?php echo $data['id_petugas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini ?')"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>

<!-- Modal Tambah -->
<div class="modal fade" id="edit<?= $data['id_petugas']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Edit Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
            <?php
            $kode = $data['id_petugas'];
            $sql_edit = $koneksi->query("SELECT * FROM tb_petugas WHERE id_petugas='$kode'");
            while ($data_edit = $sql_edit->fetch_assoc()) {           
            ?>

          <div class="form-group">
            <label for="exampleInputNama">Id Petugas</label>
            <input type="text" name="id_petugas" class="form-control" readonly value="<?php echo $data_edit['id_petugas']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?php echo $data_edit['username']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Password</label>
            <input type="text" name="pass" class="form-control" placeholder="Masukan Jurusan" value="<?php echo $data_edit['password']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Petugas</label>
            <input type="text" name="petugas" class="form-control" placeholder="Masukan Jurusan" value="<?php echo $data_edit['nama_petugas']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Level</label>
            <select name="level" class="form-control">
              <option value="<?= $data['level']; ?>"><?= $data['level']; ?></option>
              <option value="Admin">Admin</option>
              <option value="Petugas">Petugas</option>
              <option value="siswa">Siswa</option>
            </select>
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
        $id = $_POST['id_petugas'];               
        $username = $_POST['username'];
        $pass = md5($_POST['pass']);
        $petugas = $_POST['petugas'];
        $level = $_POST['level'];
                        
        $sql2 = $koneksi->query("UPDATE tb_petugas set id_petugas='$id', username='$username', password='$pass', nama_petugas='$petugas', level='$level' where id_petugas='$id'");
        if ($sql2) {
  ?>
      <script type="text/javascript">
        alert("Data Behasil Diedit");
        window.location.href="data_petugas.php";
      </script>
                

  <?php
        }
        else {
  ?>
        <script type="text/javascript">
          alert ("Data Gagal Diedit");
          window.location.href="data_petugas.php";
        </script>

  <?php
        }
      }
  ?>

                  <?php } ?>
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
            $sql = $koneksi->query("select id_petugas from tb_petugas order by id_petugas desc");
            $data = $sql->fetch_assoc();

            $id = $data['id_petugas'];

            $urut = substr($id, 2, 3);

            $tambah = (int) $urut+1;

            if (strlen($tambah) == 1) {
              $format = "DP"."00".$tambah;
            }
            elseif (strlen($tambah) == 2) {
              $format = "DP"."0".$tambah;
            }
            else {
              $format = "DP".$tambah;
            }


         ?>

<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">

        <div class="form-group">
            <label for="exampleInputNama">Id Petugas</label>
            <input type="text" name="id" class="form-control" readonly value="<?php echo $format; ?>">
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Password</label>
            <input type="password" name="pass" class="form-control" placeholder="Masukan Password" required>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Petugas</label>
            <input type="text" name="petugas" class="form-control" placeholder="Masukan Petugas" required>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Level</label>
            <select name="level" class="form-control">
            <option value="">-Pilih Level-</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="siswa">Siswa</option>
            </select>
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
      $id = $_POST['id'];
      $username = $_POST['username'];
      $password = md5($_POST['pass']);
      $petugas = $_POST['petugas'];
      $level = $_POST['level'];
    
      $sql = $koneksi->query("insert into tb_petugas (id_petugas, username, password, nama_petugas, level)values('$id','$username','$password','$petugas','$level')");
      if ($sql) {
?>      
      <script type="text/javascript">
        alert ("Data Berhasil Disimpan");
        window.location.href="data_petugas.php";
      </script>

<?php
      }
      else {
?>
      <script type="text/javascript">
        alert ("Data Gagal Disimpan");
        window.location.href="data_petugas.php";
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