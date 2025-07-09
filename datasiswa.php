<?php
include 'koneksi.php';
include 'header.php';
?>

<div class="container">
    <div class="page-header">
        <h2>DATA OBYEK</h2>
    </div>
    <a class="btn btn-primary" href="tambahSW.php">TAMBAH DATA</a>
    <a class="btn btn-primary" href="tambahkt.php">TAMBAH KATEGORI</a>
    <br /><br />

    <?php
    // Ambil semua guru
    $gurus = $konek->query("SELECT * FROM guru ORDER BY namaguru ASC");

    while ($guru = $gurus->fetch_assoc()):
        $idguru = $guru['idguru'];
        $namaguru = $guru['namaguru'];

        // Ambil kelas yang diampu guru ini
        $kelas_result = $konek->query("SELECT kelas FROM walikelas WHERE idguru = $idguru");
        $kelas_list = [];

        while ($k = $kelas_result->fetch_assoc()) {
            $kelas_list[] = "'" . $k['kelas'] . "'";
        }

        // Jika guru tidak pegang kelas, skip
        if (count($kelas_list) == 0) continue;

        $kelas_str = implode(",", $kelas_list);

        // Ambil siswa dari kelas-kelas tersebut
        $data_siswa = $konek->query("SELECT * FROM siswa WHERE kelas IN ($kelas_str) ORDER BY idsiswa ASC");
    ?>

        <h4>KATEGORI: <?= strtoupper($namaguru) ?></h4>
        <table class="table table-bordered table-striped mb-5">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>OBJEK </th>
                    <th>JUMLAH OBYEK </th>
                    <th>NOMINAL</th>
                    <th>BULAN </th>
                    <th>JUMLAH RUPIAH </th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($siswa = $data_siswa->fetch_assoc()):
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $siswa['kelas']; ?></td>
                        <td><?= $siswa['nis']; ?></td>
                        <td><?= $siswa['namasiswa']; ?></td>
                        <td><?= $siswa['tahunajaran']; ?></td>
                        <td><?= number_format($siswa['biaya'], 0, ',', '.'); ?></td>
                        <td>
                            <a class="btn btn-warning btn-sm" href="ubahSW.php?id=<?= $siswa['idsiswa']; ?>">EDIT</a>
                            <a class="btn btn-danger btn-sm" href="hapusSW.php?id=<?= $siswa['idsiswa']; ?>" onclick="return confirm('Yakin ingin menghapus data? Data SPP siswa akan ikut terhapus')">HAPUS</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

    <?php endwhile; ?>

    <p align="center" style="font-family: arial; color: red;">Menghapus Data Obyek Maka Akan menghapus Data Pembayaran dan data tagihan Obyek pada tabel Retribusi</p>
</div>

<?php include 'footer.php'; ?>