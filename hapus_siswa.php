<?php
	include 'koneksi.php';
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_siswa where nisn = '$kode'");

	if ($sql) {
		$hapus = $koneksi->query("DELETE from tb_pembayaran where nisn = '$kode'");
		if ($hapus) {
?>
			<script type="text/javascript">
				alert ("Data Berhasil Di Hapus");
				window.location.href="data_siswa.php";
			</script>

<?php
		} else {
?>
			<script type="text/javascript">
				alert ("Data Gagal Di Hapus");
				window.location.href="data_siswa.php";
			</script>
<?php		
		} 
	}
?>