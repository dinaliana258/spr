<?php 
session_start();
if (isset($_SESSION['login'])) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Slip Pembayaran Retribusi</title>
	<style>
		body {
			font-family: arial;
		}
		.print {
			margin-top: 10px;
		}
		@media print {
			.print {
				display: none;
			}
		}
		table {
			border-collapse: collapse;
		}
	</style>
</head>
<body>
	<h3>DPKPLH Banjarnegara<br/><b>LAPORAN PEMBAYARAN RETRIBUSI</b></h3>
	<br/>
	<hr/>
	
	<?php 
	// Amankan input
	$nis = isset($_GET['nis']) ? mysqli_real_escape_string($konek, $_GET['nis']) : '';
	
	$siswa = $konek->query("SELECT * FROM siswa WHERE nis='$nis'");
	$sw = mysqli_fetch_assoc($siswa);

	if ($sw) {
	?>
	<table>
		<tr>
			<td>Nominal</td>
			<td>:</td>
			<td><?= $sw['namasiswa'] ?></td>
		</tr>
		<tr>
			<td>Jumlah Obyek</td>
			<td>:</td>
			<td><?= $sw['nis'] ?></td>
		</tr>
		<tr>
			<td>Obyek</td>
			<td>:</td>
			<td><?= $sw['kelas'] ?></td>
		</tr>
	</table>
	<?php 
	} else {
		echo "<p style='color:red;'>Data siswa dengan NIS <b>$nis</b> tidak ditemukan.</p>";
	}
	?>

	<hr>

	<table border="1" cellspacing="0" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>NO. BAYAR</th>
		<th>PEMBAYARAN BULAN</th>
		<th>JUMLAH</th>
		<th>KETERANGAN</th>
	</tr>

	<?php 
	$id = isset($_GET['id']) ? mysqli_real_escape_string($konek, $_GET['id']) : '';
	$spp = $konek->query("SELECT spp.*, siswa.nis, siswa.namasiswa, siswa.kelas
							FROM spp 
							INNER JOIN siswa ON spp.idsiswa = siswa.idsiswa
							WHERE idspp = '$id'
							ORDER BY nobayar ASC");
	$i = 1;
	while ($dta = mysqli_fetch_array($spp)) :
	?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['idsiswa'] ?></td>
		<td><?= $dta['nobayar'] ?></td>
		<td><?= $dta['bulan'] ?></td>
		<td align="right"><?= $dta['jumlah'] ?></td>
		<td align="center"><?= $dta['ket'] ?></td>
	</tr>
	<?php 
	$i++;
	endwhile;

	if (mysqli_num_rows($spp) == 0) {
		echo '<tr><td colspan="6" align="center">Data pembayaran tidak ditemukan.</td></tr>';
	}
	?>
	</table>

	<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<br/>
			<p>Banjarnegara, <?= date('d/m/y') ?><br/>
			Yanu Harsono,<br/><br/><br/>
			<p>__________________________</p>
		</td>
	</tr>
	</table>

	<a href="#" onclick="window.print();"><button class="print">CETAK</button></a>
</body>
</html>

<?php 
} else {
	header("Location: login.php");
	exit;
}
?>
