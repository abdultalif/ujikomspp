<?php
	include 'koneksi.php';
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_spp where id_spp = '$kode'");

	if ($sql) {
		?>
			<script type="text/javascript">
				alert ("Data Berhasil Di Hapus");
				window.location.href="data_spp.php";
			</script>

	<?php
		}
	?>