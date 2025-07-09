<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="container">
	<div class="page-header">
		<h2>CARI BERDASARKAN OBYEK</h2>
	</div>
	<form action="" method="get">
		<table class="table">
			<tr>
				<td>OBYEK</td>
				<td>:</td>
				<td>
					<select class="form-control" name="kelas" required>
						<option value="">-- Pilih Obyek Berdasarkan Kategori --</option>
						<?php
						$kategori = $konek->query("SELECT * FROM guru ORDER BY namaguru ASC");
						while ($g = $kategori->fetch_assoc()) {
							echo "<optgroup label='" . htmlspecialchars($g['namaguru']) . "'>";
							$kelas = $konek->query("SELECT * FROM walikelas WHERE idguru = " . $g['idguru'] . " ORDER BY kelas ASC");
							while ($k = $kelas->fetch_assoc()) {
								$selected = (isset($_GET['kelas']) && $_GET['kelas'] == $k['kelas']) ? 'selected' : '';
								echo "<option value='" . htmlspecialchars($k['kelas']) . "' $selected>" . htmlspecialchars($k['kelas']) . "</option>";
							}
							echo "</optgroup>";
						}
						?>
					</select>
				</td>
				<td>
					<button class="btn btn-success" type="submit" name="cari">Cari</button>
				</td>
			</tr>
		</table>
	</form>

	<?php
	if (isset($_GET['kelas']) && $_GET['kelas'] != '') {
		$kelas = mysqli_real_escape_string($konek, $_GET['kelas']);
		$data = $konek->query("SELECT * FROM siswa WHERE kelas = '$kelas' LIMIT 1");

		if ($data->num_rows > 0) {
			$dta = $data->fetch_assoc();
			$nis = $dta['nis'];
			$nis = $dta['kelas'];
	?>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3>Obyek</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped">
						<tr>
							<td>Obyek</td>
							<td><?= $dta['nis'] ?></td>
						</tr>
						<tr>
							<td>Obyek</td>
							<td><?= $dta['namasiswa'] ?></td>
						</tr>
						<tr>
							<td>Nominal</td>
							<td><?= $dta['kelas'] ?></td>
						</tr>
						<tr>
							<td>Bulan</td>
							<td><?= $dta['tahunajaran'] ?></td>
						</tr>
					</table>
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3>Tagihan Retribusi Sampah</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered table-striped">
						<tr>
							<th>NO</th>
							<th>Bulan</th>
							<th>Jatuh Tempo</th>
							<th>No Bayar</th>
							<th>Tanggal Bayar</th>
							<th>Jumlah</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
						<?php
						$sql = mysqli_query($konek, "SELECT * FROM spp WHERE idsiswa = '$dta[idsiswa]' ORDER BY jatuhtempo ASC");
						$i = 1;
						while ($sq = mysqli_fetch_assoc($sql)) {
							echo "<tr>
                            <td>$i</td>
                            <td>{$sq['bulan']}</td>
                            <td>{$sq['jatuhtempo']}</td>
                            <td>{$sq['nobayar']}</td>
                            <td>{$sq['tglbayar']}</td>
                            <td>{$sq['jumlah']}</td>
                            <td>{$sq['ket']}</td>
                            <td align='center'>";
							if ($sq['nobayar'] == '') {
								echo "<a class='btn btn-primary btn-sm' href='proses_transaksi.php?nis=$nis&act=bayar&id={$sq['idspp']}'>Bayar</a>";
							} else {
								echo "<a class='btn btn-danger btn-sm' href='proses_transaksi.php?nis=$nis&act=batal&id={$sq['idspp']}'>Batal</a> ";
								echo "<a class='btn btn-success btn-sm' href='cetak_slip_transaksi.php?nis=$nis&act=bayar&id={$sq['idspp']}' target='_blank'>Cetak</a>";
							}
							echo "</td></tr>";
							$i++;
						}
						?>
					</table>
				</div>
			</div>

	<?php
		} else {
			echo "<div class='alert alert-warning'>Data obyek <strong>" . htmlspecialchars($_GET['kelas']) . "</strong> belum terdaftar atau belum ada data obyek.</div>";
		}
	}
	?>

	<p style="color: red;">Pembayaran dilakukan dengan cara mencari obyek</p>

</div>

<?php include 'footer.php'; ?>