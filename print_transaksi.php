<?php 
session_start();
if ($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['siswa']) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Kwitansi Pembayaran SPP</title>
	
	<style >
		body{
			font-family: arial;
		}
		.print{
			margin-top: 10px;
		}
		@media print{
			.print{
				display: none;
			}
		}
		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>SMK INFOKOM BOGOR<b><br/>Kwitansi PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	<?php 
    $kode = $_GET['nis'];
	$siswa = $koneksi->query("SELECT * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE nis ='$kode'");
	$data_siswa = $siswa->fetch_assoc();

	 ?>
	<table>
        <tr>
            <td>Nis </td>
			<td>:</td>
			<td> <?= $data_siswa['nis'] ?></td>
		</tr>
        <tr>
            <td>Nama Siswa </td>
            <td>:</td>
            <td> <?= $data_siswa['nama'] ?></td>
        </tr>
		<tr>
			<td>Kelas </td>
			<td>:</td>
			<td> <?= $data_siswa['nama_kelas'] ?></td>
		</tr>
	</table>
	<hr>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>No Pembayaran</th>
		<th>Bulan Pembayaran</th>
		<th>Tahun Ajaran</th>
		<th>Jumlah</th>
		<th>Keterangan</th>
	</tr>
	<?php
    $no=1; 
    $id = $_GET['id'];
    $sql = $koneksi->query("SELECT tb_pembayaran.*, tb_spp.*, tb_petugas.id_petugas, tb_petugas.nama_petugas, tb_petugas.level FROM tb_pembayaran INNER JOIN tb_spp ON tb_pembayaran.id_spp = tb_spp.id_spp INNER JOIN tb_petugas ON tb_pembayaran.id_petugas = tb_petugas.id_petugas WHERE id_pembayaran = '$id'");
	
	while($data = $sql->fetch_assoc()) {
	 ?>
	<tr style="text-align:center;">
		<td><?= $no++ ?></td>
		<td><?= $data['no_bayar'] ?></td>
		<td><?= $data['bulan_dibayar'] ?></td>
		<td><?= $data['tahun'] ?></td>
		<td>Rp. <?= number_format($data['nominal']) ?></td>
		<td><?= $data['ket'] ?></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Bogor, <?= date('d/m/y') ?> <br/>
				<?= $data['nama_petugas']; ?> Sebagai <?= $data['level'] ?>,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>
<?php } ?>


	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>