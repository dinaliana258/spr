<?php
ob_start();
include 'koneksi.php';
include 'header.php';
?>

<div class="container">
    <div class="page-header">
        <h2>TAMBAH DATA OBYEK</h2>
    </div>

    <!-- Form tambah obyek -->
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>OBYEK</td>
                <td>
                    <input class="form-control" type="text" name="kelas" placeholder="Masukkan Nama Obyek" required>
                </td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td>
                    <select class="form-control" name="idguru" required>
                        <option value="">-- Pilih Kategori --</option>
                        <?php
                        $guruQuery = $konek->query("SELECT * FROM guru ORDER BY namaguru ASC");
                        while ($guru = $guruQuery->fetch_assoc()) {
                            echo "<option value='{$guru['idguru']}'>{$guru['namaguru']}</option>";
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button></td>
            </tr>
        </table>
    </form>

    <hr>

    <!-- Tabel daftar obyek yang sudah ada -->
    <h4>DAFTAR OBYEK YANG SUDAH DITAMBAHKAN</h4>
    <?php
    $guruList = $konek->query("SELECT * FROM guru ORDER BY namaguru ASC");
    while ($g = $guruList->fetch_assoc()):
        $gid = $g['idguru'];
        $gname = $g['namaguru'];

        $kelasList = $konek->query("SELECT * FROM walikelas WHERE idguru = $gid ORDER BY kelas ASC");

        if ($kelasList->num_rows > 0):
    ?>
            <h5><?= strtoupper($gname) ?></h5>
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th>Nama Obyek</th>
                        <th style="width:15%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    while ($k = $kelasList->fetch_assoc()): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= htmlspecialchars($k['kelas']) ?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus obyek ini?')" href="?hapus=<?= urlencode($k['kelas']) ?>">HAPUS</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
    <?php
        endif;
    endwhile;
    ?>

</div>

<?php
// Tambah data
if (isset($_POST['tambah'])) {
    $kelas = trim(mysqli_real_escape_string($konek, $_POST['kelas']));
    $idguru = intval($_POST['idguru']);

    if ($kelas == '' || $idguru <= 0) {
        echo "<script>alert('Form belum lengkap!');</script>";
    } else {
        $cek = $konek->query("SELECT * FROM walikelas WHERE kelas='$kelas'");
        if ($cek->num_rows > 0) {
            echo "<script>alert('Data obyek sudah ada!');</script>";
        } else {
            $simpan = $konek->query("INSERT INTO walikelas (kelas, idguru) VALUES ('$kelas', $idguru)");
            echo $simpan ? "<script>alert('Berhasil ditambahkan');window.location='';</script>"
                : "<script>alert('Gagal simpan data');</script>";
        }
    }
}

// Hapus data
if (isset($_GET['hapus'])) {
    $kelasHapus = mysqli_real_escape_string($konek, $_GET['hapus']);
    $hapus = $konek->query("DELETE FROM walikelas WHERE kelas='$kelasHapus'");
    echo "<script>window.location.href='tambahkt.php';</script>";
}

include 'footer.php';
ob_end_flush();
?>