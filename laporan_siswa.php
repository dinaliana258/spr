<?php 
session_start();
if(isset($_SESSION['login']) ) {
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Laporan Data Obyek</title>
	
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
	<b>LAPORAN DATA OBYEK</b>
	<br/>
	<hr/>
	
	<table border="1" cellspacing="" cellpadding="4" width="100%">
	<tr>
		<th>NO</th>
		<th>ID</th>
		<th>Obyek</th>
		<th>Nominal</th>
		<th>Jumlah obyek</th>
		<th>Bulan</th>
	</tr>
	<?php 
	$data = $konek -> query("SELECT * FROM siswa ORDER BY idsiswa ASC ");
	$i=1;
	while ($dta = mysqli_fetch_assoc($data)) :
	 ?>
	<tr>
		<td align="center"><?= $i ?></td>
		<td align="center"><?= $dta['idsiswa'] ?></td>
		<td align="center"><?= $dta['nis'] ?></td>
		<td align=""><?= $dta['namasiswa'] ?></td>
		<td align=""><?= $dta['kelas'] ?></td>
		<td align=""><?= $dta['tahunajaran'] ?></td>
	</tr>
	<?php $i++; ?>
<?php endwhile; ?>
	</table>
<table width="100%">
	<tr>
		<td></td>
		<td width="200px">
			<p>Banjarnegara , <?= date('d/m/y') ?> <br/>
				Yanu Harsono,
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