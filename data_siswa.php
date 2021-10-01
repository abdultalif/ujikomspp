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
              <h5 class="m-0 font-weight-bold text-primary" align="Center">Data Siswa</h5>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i> Tambah Data</button>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr style="text-align: center;">
                      <th>No</th>
                      <th>Nisn</th>
                      <th>Nis</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Alamat</th>
                      <th>No Telp</th>
                      <th>Tahun Ajaran</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  
                  <tbody>
                     <?php
                    include 'koneksi.php';
                      $no = 1;
                      $sql = $koneksi->query("SELECT * FROM tb_siswa, tb_kelas, tb_spp WHERE tb_siswa.id_kelas = tb_kelas.id_kelas AND tb_siswa.id_spp = tb_spp.id_spp ORDER BY nisn ASC");

                      while ($data = $sql->fetch_assoc()) {

                        ?>
                    <tr style="text-align: center;">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['nisn']; ?></td>
                      <td><?php echo $data['nis']; ?></td>
                      <td><?php echo $data['nama']; ?></td>
                      <td><?php echo $data['nama_kelas']; ?></td>
                      <td><?php echo $data['alamat']; ?></td>
                      <td><?php echo $data['no_telp']; ?></td>
                      <td><?php echo $data['tahun']; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $data['nisn']; ?>"><i class="fa fa-edit"></i></button>
                        <a href="hapus_siswa.php?id=<?php echo $data['nisn']; ?>" onclick="return confirm('Apakah Anda Ingin Menghapus <?php echo $data[nama]; ?> ???')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
<!-- Modal EDIT -->
<div class="modal fade" id="edit<?= $data['nisn']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post">
        <?php
            $kode = $data['nisn'];
            $sql_edit = $koneksi->query("SELECT * FROM tb_siswa WHERE nisn='$kode'");
            while ($data_edit = $sql_edit->fetch_assoc()) {           
        ?>

        <div class="form-group">
            <label for="exampleInputNama">Nisn</label>
            <input type="text" name="nisn" class="form-control" readonly value="<?php echo $data_edit['nisn']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">nis</label>
            <input type="text" name="nis" class="form-control" value="<?php echo $data_edit['nis']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required value="<?= $data_edit['nama']; ?>">
          </div>
          
          <div class="form-group">
            <label for="exampleInputNama">Kelas</label>
            <select name="kelas" class="form-control">
              <option> -Pilih Kelas-</option>
              <?php
              $sql_kelas = $koneksi->query("SELECT * FROM tb_kelas ORDER BY nama_kelas ASC");
              while ($data_kelas=mysqli_fetch_array($sql_kelas)) {
                if ($data_edit['id_kelas']==$data_kelas['id_kelas']) {
                $selected="selected";
                }else{
                $selected="";
                }
                echo "<option value='$data_kelas[id_kelas]' $selected>$data_kelas[nama_kelas]</option>";
              }
              ?>      
            </select>
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Alamat</label>
            <textarea type="text" name="alamat" class="form-control" cols="4" rows="3" placeholder="Masukan Alamat"><?php echo $data_edit['alamat']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="exampleInputNama">No Telp</label>
            <input type="number" name="no" class="form-control" placeholder="Masukan Nomor" value="<?= $data_edit['no_telp']; ?>">
          </div>

          <div class="form-group">
            <label for="exampleInputNama">Tahun Ajaran</label>
            <select name="tahun" class="form-control">
              <option> -Pilih Tahun Ajaran-</option>
              <?php
              $sql_spp = $koneksi->query("SELECT * FROM tb_spp ORDER BY tahun ASC");
              while ($data_spp = $sql_spp->fetch_assoc()) {
                if ($data_edit['id_spp']==$data_spp['id_spp']) {
                $selected="selected";
                }else{
                $selected="";
                }
                echo "<option value='$data_spp[id_spp]' $selected>$data_spp[tahun]</option>";
              }
              ?>      
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
      $nisn = $_POST['nisn'];
      $nis = $_POST['nis'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $alamat = $_POST['alamat'];
      $no = $_POST['no'];
      $tahun = $_POST['tahun'];
      $sql = $koneksi->query("UPDATE tb_siswa SET nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$kelas', alamat='$alamat', no_telp='$no', id_spp='$tahun' WHERE nisn='$nisn'");
            if ($sql) {
                ?>
                <script>
                    alert("Data Ini Berhasil Di Edit");
                    window.location.href = "data_siswa.php";
                </script>
                <?php
            }
            else {
                ?>
                <script>
                    alert("Data Ini Gagal Di Edit");
                    window.location.href = "data_siswa.php";
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
      </div>
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
            $sql = $koneksi->query("select nisn from tb_siswa order by nisn desc");
            $data = $sql->fetch_assoc();

            $id = $data['nisn'];

            $urut = substr($id, 4, 2);

            $tambah = (int) $urut+1;

            if (strlen($tambah) == 1) {
              $format = "2207"."0".$tambah;
            }
            else {
              $format = "2207".$tambah;
            }


         ?>


<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="post">

        <div class="form-group">
            <label for="exampleInputNama">Nisn</label>
            <input type="number" name="nisn" readonly class="form-control" value="<?php echo $format; ?>" required>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Nis</label>
            <input type="number" name="nis" class="form-control" placeholder="Masukan Nis" required>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Nama</label>
            <input type="text" name="nama" class="form-control" placeholder="Masukan Nama" required>
        </div>

        <div class="form-group">
            <label>Kelas</label>
            <select class="form-control select2" name="kelas" required="">
            <option value="">-Pilih kelas-</option>
            <?php
            include 'koneksi.php';
            $sql = $koneksi->query("select * from tb_kelas order by nama_kelas asc");
            while ($data=$sql->fetch_assoc()) {
                echo "
            <option value='$data[id_kelas]'>$data[nama_kelas]</option>
                ";
            } 
            ?>       
            </select>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">Alamat</label>
            <textarea type="text" name="alamat" class="form-control" cols="4" rows="3" placeholder="Masukan Alamat" required ></textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputNama">No Telp</label>
            <input type="number" name="no" class="form-control" placeholder="Masukan Nomor" required>
        </div>

        <div class="form-group">
            <label>Tahun</label>
            <select class="form-control select2" style="width: 100%;" name="tahun" required="">
            <option value="">-Pilih Tahun Ajaran-</option>
            <?php
            include 'koneksi.php';
            $sql = $koneksi->query("select * from tb_spp");
            while ($data=$sql->fetch_assoc()) {
                echo "
                <option value='$data[id_spp]'>$data[tahun]</option>
                ";
            } 
            ?>
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
      $nisn = $_POST['nisn'];
      $nis = $_POST['nis'];
      $nama = $_POST['nama'];
      $kelas = $_POST['kelas'];
      $alamat = $_POST['alamat'];
      $no = $_POST['no'];
      $tahun = $_POST['tahun'];

      $bulanIndo =[
        '01' => 'januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
      ];
    
      $sql = $koneksi->query("INSERT into tb_siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp)values('$nisn','$nis','$nama','$kelas','$alamat','$no','$tahun')");
      if ($sql) {
        $dk = mysqli_query($koneksi, "SELECT nisn FROM tb_siswa ORDER BY nisn DESC LIMIT 1");
        $ds = $dk->fetch_array();
        $id_siswa = $ds['nisn'];

        
        for ($i=0 ; $i<12; $i++){
          $bulan     = $bulanIndo[date('m' ,strtotime("+$i month"))];
          // simpan data
          $add = $koneksi->query("INSERT INTO tb_pembayaran (nisn, bulan_dibayar, id_spp) VALUES ('$id_siswa','$bulan','$tahun')");
        }
        if ($add) {
          ?>
          <script>
              alert("Data Ini Berhasil Di Simpan");
              window.location.href = "data_siswa.php";
          </script>
          <?php
      }
      else {
          ?>
          <script>
              alert("Data Ini Gagal Di Simpan");
              window.location.href = "data_siswa.php";
          </script>
          <?php

      }
      }
  
  }
  ?>

  <?php
    }
    else {
      header("location:login.php"); 
    }
  ?>