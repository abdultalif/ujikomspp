<?php 
session_start();
error_reporting(0);
if ($_SESSION['admin'] || $_SESSION['petugas'] || $_SESSION['siswa']) {
	include 'koneksi.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pembayaran</title>
	
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
	<h3>SMK INFOKOM BOGOR<b><br/>LAPORAN PEMBAYARAN SPP</b></h3>
	<br/>
	<hr/>
	Dari Tanggal <?= $_GET['awal']." - ".$_GET['akhir'];  ?>
	<br/>
	<br>
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr style="text-align:center;">
		<th>No</th>
		<th>Nis</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Nomor Bayar</th>
		<th>Bulan Bayar</th>
		<th>Tahun Ajaran</th>
		<th>Tanggal Bayar</th>
		<th>Jumlah Bayar</th>
		<th>Keterangan</th>
	</tr>
	<?php 
    $no = 1;
	$total = 0;
	$sql = $koneksi->query("SELECT * FROM tb_pembayaran INNER JOIN tb_spp ON tb_pembayaran.id_spp = tb_spp.id_spp INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn INNER JOIN tb_kelas ON tb_siswa.id_kelas = tb_kelas.id_kelas WHERE tgl_bayar BETWEEN '$_GET[awal]' AND '$_GET[akhir]'");
	
	while($data = $sql->fetch_assoc()) {
	 ?>
	<tr style="text-align:center;">
		<td><?= $no++; ?></td>
		<td><?= $data['nis'] ?></td>
		<td><?= $data['nama'] ?></td>
		<td><?= $data['nama_kelas'] ?></td>
		<td><?= $data['no_bayar'] ?></td>
		<td><?= $data['bulan_dibayar'] ?></td>
		<td><?= $data['tahun'] ?></td>       
		<td><?= $data['tgl_bayar'] ?></td>       
		<td>Rp. <?= number_format($data['nominal']) ?></td>
		<td><?= $data['ket'] ?></td>
	</tr>
	<?php $total += $data['nominal']; ?>
    <?php } ?>

<tr>
		<th colspan="8" align="right">TOTAL</th>
		<th>RP. <?= number_format($total); ?></th>
		<td style="background:#858796;"></td>
	</tr>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<BR/>
			<p>Dermayu , <?= date('d/m/y') ?> <br/>
				 Sebagai ,
			<br/>
			<br/>
			<br/>
		<p>__________________________</p>
		</td>
	</tr>
</table>



	<a  href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>


<?php 
} else {
	header("location : login.php");
}
?>