<?php
session_start();
if ( !isset($_SESSION['login']) ) {
	header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>HALAMAN UTAMA</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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


</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">Aplikasi Retribusi Sampah</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="./">Home</a></li>
            <li><a href="dataadmin.php">DATA ADMIN</a></li>
            <li><a href="dataguru.php">DATA KATEGORI</a></li>
            <li><a href="datasiswa.php">DATA OBYEK</a></li>
            <li><a href="transaksi.php">TRANSAKSI</a></li>
            <li><a href="laporan.php">LAPORAN</a></li>
            <li><a href="logout.php">LOGOUT</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
</body>
</html>
