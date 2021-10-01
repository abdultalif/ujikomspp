<?php
	include 'koneksi.php';
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_kelas where id_kelas = '$kode'");

	if ($sql) {
		?>
			<script type="text/javascript">
				alert ("Data Berhasil Di Hapus");
				window.location.href="data_kelas.php";
			</script>

	<?php
	}
	?>