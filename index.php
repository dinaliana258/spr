<?php include 'header.php'; ?>

<style>
	body {
		overflow-x: hidden;
	}

	.container {
		padding-top: 20px;
	}

	.panel-body {
		text-align: center;
		margin-bottom: 40px;
	}

	.panel-body h2 {
		font-weight: bold;
	}

	.img-fluid {
		max-width: 100%;
		height: auto;
	}

	.card-img-top {
		height: 200px;
		object-fit: cover;
	}

	.card {
		box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
		border: none;
		border-radius: 10px;
		overflow: hidden;
	}

	.profil-section {
		text-align: center;
		margin-bottom: 50px;
	}
</style>

<div class="container">
	<div class="panel-body">
		<h2>SELAMAT DATANG DI HALAMAN UTAMA WEB PEMBAYARAN RETRIBUSI SAMPAH</h2>
		<h5>DPKPLH BANJARNEGARA</h5>
	</div>

	<!-- Profil DPKPLH -->
	<div class="profil-section">
		<img src="logodpkplh.png" alt="Logo DPKPLH" class="img-fluid mb-3" style="max-height: 150px;">
		<h4 class="mb-3">Profil DPKPLH</h4>
		<p class="text-justify">
			Dinas Perumahan, Kawasan Permukiman dan Lingkungan Hidup (DPKPLH) Banjarnegara merupakan instansi
			yang bertanggung jawab dalam pengelolaan retribusi sampah, pelestarian lingkungan, dan penataan kawasan permukiman.
			Komitmen kami adalah menjaga kebersihan dan kenyamanan lingkungan hidup demi masa depan yang lebih baik.
		</p>
	</div>

	<!-- Galeri -->
	<h4 class="mb-4" style="text-align: center;">Galeri Kegiatan</h4>
	<div class="row g-3">
		<?php
		$galeri = [
			"foto.jpg",
			"123.png",
			"foto2.jpg",
			"foto3.jpg",
			"foto4.jpg",
			"foto1.jpg",
		];

		foreach ($galeri as $foto): ?>
			<div class="col-md-4 col-sm-6">
				<div class="card h-100">
					<img src="<?= $foto ?>" class="card-img-top" alt="Galeri Kegiatan">
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<?php include 'footer.php'; ?>