<?php
	include 'koneksi.php';
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_petugas where id_petugas = '$kode'");

	if ($sql) {
		?>
			<script type="text/javascript">
				alert ("Data Berhasil Di Hapus");
				window.location.href="data_petugas.php";
			</script>

	<?php
	}
	?>