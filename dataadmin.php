<?php include 'header.php'; ?>
<style>
    body {
        background-color: #f8f9fa; /* Warna abu-abu terang untuk latar belakang */
        color: #333; /* Warna teks utama */
        font-family: Arial, sans-serif;
    }

    .container {
        background: linear-gradient(to right, #e0f8e0, #ffffff); /* Gradasi hijau ke putih */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .page-header h2 {
        color: #28a745; /* Warna hijau gelap */
    }

    .btn {
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #28a745; /* Warna hijau */
        border-color: #28a745;
    }

    .btn-primary:hover {
        background-color: #1e7e34;
        border-color: #1e7e34;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    table {
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }

    th {
        background-color: #28a745; /* Warna hijau untuk header tabel */
        color: white;
        text-align: center;
        padding: 10px;
    }

    td {
        padding: 8px;
        border: 1px solid #ddd;
    }

    tr:nth-child(even) {
        background-color: #e0f8e0; /* Warna hijau muda untuk baris genap */
    }

    tr:hover {
        background-color: #b2e6b2; /* Warna hijau lebih terang saat hover */
    }
</style>



<div class="container">
	<div class="page-header">
<h2> DATA ADMIN DPKPLH</h2>
	</div>
<a class="btn btn-primary " href="tambahAD.php">TAMBAH DATA</a>
<?php
	?>
<table class="table table-bordered table-striped">
 	<tr>
 		<th>NO</th>
 		<th>ID</th>
 		<th>NAMA ADMIN</th>
		<th>AKSI</th>
 	</tr>
 	<?php 
 	include 'koneksi.php';
	$data = mysqli_query($konek,"SELECT * FROM admin ORDER BY idadmin ASC");	
 	$i=1; 
 	while($dta = mysqli_fetch_assoc($data) ):
 	 ?>
 	 <tr>
 	 	<td width="40px" align="center"><?= $i; ?></td>
 	 	<td align="center"><?= $dta['idadmin'] ?></td>
 	 	<td><?= $dta['namalengkap'] ?></td>
 	 	<td width="160px">
 	 		<a class="btn btn-warning btn-sm" href="updateAD.php?id=<?= $dta['idadmin'] ?>">EDIT</a> 
 	 		<a class="btn btn-danger btn-sm" href="hapusAD.php?id=<?= $dta['idadmin'] ?>" onclick ="return confirm('apakah anda yakin ingin menghapus data admin? ')">HAPUS</a>
 	 	</td>
 	 </tr>
 	 <?php $i++;  ?>
 	<?php endwhile; ?>
 </table>
</body>
</div>
</html>
<?php include 'footer.php'; ?>