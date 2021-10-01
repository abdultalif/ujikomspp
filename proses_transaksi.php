<?php
    session_start();
    include 'koneksi.php';
    if ($_GET['act'] == 'bayar') {
        $id_pembayaran = $_GET['id'];
        $nis = $_GET['nis'];
    
        $tglbayar = date('Y-m-d');
		$nobayar = date('dmYHisis');
		$id_admin = $_SESSION['id'];
        
        $bayar = $koneksi->query("UPDATE tb_pembayaran SET no_bayar = '$nobayar', tgl_bayar = '$tglbayar', ket = 'LUNAS', id_petugas = '$id_admin' WHERE id_pembayaran = '$id_pembayaran'");

        if ($bayar) {
            header('location: transaksi.php?nis='. $nis);
        } else {
            echo "
			<script>
			alert('gagal')
			</script>
			";
        }


    } elseif ($_GET['act'] == 'batal') {
        $id_pembayaran = $_GET['id'];
        $nis = $_GET['nis'];

        $batal = $koneksi->query("UPDATE tb_pembayaran SET 
			no_bayar = null,
			tgl_bayar = null,
			ket = null,
			id_petugas = null 
			WHERE id_pembayaran = '$id_pembayaran'");

        if ($batal) {
            header('location: transaksi.php?nis='.$nis);
        }
    }
?>