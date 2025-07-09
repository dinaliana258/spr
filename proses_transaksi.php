<?php
session_start();
if (isset($_SESSION['login'])) {
	include 'koneksi.php';

	if ($_GET['act'] == 'bayar') {
		$idspp = $_GET['id'];
		$kelas = $_GET['nis']; // ini sebenarnya kelas

		// buat nomor bayar
		$today = date("ymd");
		$query = mysqli_query($konek, "SELECT max(nobayar) AS last FROM spp WHERE nobayar LIKE '$today%'");
		$data = mysqli_fetch_assoc($query);
		$lastNobayar = $data['last'];
		$lastNoUrut = (int)substr( $lastNobayar??'0000000000',  6,  4);
		$nextNobayar = $today . sprintf( '%04s', $lastNoUrut + 1);

		$tglbayar = date('Y-m-d');
		$admin = $_SESSION['id'];

		$byr = mysqli_query($konek, "UPDATE spp SET 
            nobayar = '$nextNobayar',
            tglbayar = '$tglbayar',
            ket = 'LUNAS',
            idadmin = '$admin' 
            WHERE idspp = '$idspp'");

		if ($byr) {
			header("Location: transaksi.php?kelas=" . urlencode($kelas) . "&cari=Cari");
			exit;
		} else {
			echo "<script>alert('Gagal melakukan pembayaran!');window.history.back();</script>";
		}
	} elseif ($_GET['act'] == 'batal') {
		$idspp = $_GET['id'];
		$kelas = $_GET['nis']; // ini juga kelas

		$batal = mysqli_query($konek, "UPDATE spp SET 
            nobayar = NULL,
            tglbayar = NULL,
            ket = NULL,
            idadmin = NULL 
            WHERE idspp = '$idspp'");

		if ($batal) {
			header("Location: transaksi.php?kelas=" . urlencode($kelas) . "&cari=Cari");
			exit;
		} else {
			echo "<script>alert('Gagal membatalkan pembayaran!');window.history.back();</script>";
		}
	}
}
