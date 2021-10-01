<?php
	include 'koneksi.php';
	$kode = $_GET['id'];
	$sql = $koneksi->query("delete from tb_pembayaran where id_pembayaran = '$kode'");

	if ($sql) {
		?>
			<script type="text/javascript">
				alert ("Data Berhasil Di Hapus");
				window.location.href="transaksi.php";
			</script>

	<?php
	}
	?>