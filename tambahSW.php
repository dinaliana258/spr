<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nis         = $_POST['nis'];
    $namasiswa   = $_POST['namasiswa'];
    $kelas       = $_POST['kelas'];
    $tahunajaran = $_POST['tahunajaran'];
    $biaya       = $_POST['biaya'];
    $awaltempo   = $_POST['jatuhtempo'];

    $bulanIndo = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    if ($nis == '' || $namasiswa == '' || $kelas == '') {
        echo "Form belum lengkap";
    } else {
        $simpan = mysqli_query($konek, "INSERT INTO siswa(nis,namasiswa,kelas,tahunajaran,biaya)
            VALUES('$nis','$namasiswa','$kelas','$tahunajaran','$biaya')");

        if (!$simpan) {
            echo "<script>alert('Data gagal disimpan');</script>";
        } else {
            $ds = mysqli_fetch_array(mysqli_query($konek, "SELECT idsiswa FROM siswa ORDER BY idsiswa DESC LIMIT 1"));
            $idsiswa = $ds['idsiswa'];

            for ($i = 0; $i < 12; $i++) {
                $jatuhtempo = date("Y-m-d", strtotime("+$i month", strtotime($awaltempo)));
                $bulan = $bulanIndo[date('m', strtotime($jatuhtempo))] . " " . date('Y', strtotime($jatuhtempo));

                $add = mysqli_query($konek, "INSERT INTO spp(idsiswa, jatuhtempo, bulan, jumlah) 
                    VALUES ('$idsiswa','$jatuhtempo','$bulan','$biaya')");
            }

            header('Location: datasiswa.php');
            exit();
        }
    }
}

include 'header.php';
?>

<div class="container">
    <div class="page-header">
        <h2>TAMBAH DATA</h2>
    </div>
    <form action="" method="post">
        <table class="table">
            <tr>
                <td>Jumlah Obyek</td>
                <td><input class="form-control" type="text" name="nis" placeholder="Masukan Jumlah Obyek" required></td>
            </tr>
            <tr>
                <td>Nominal</td>
                <td><input class="form-control" type="text" name="namasiswa" placeholder="Masukan Nominal" required></td>
            </tr>
            <tr>
                <td>Obyek</td>
                <td>
                    <select class="form-control" name="kelas" required>
                        <option value="" selected>-- Pilih Obyek (Berdasarkan Kategori) --</option>
                        <?php
                        $queryGuru = mysqli_query($konek, "SELECT * FROM guru ORDER BY namaguru ASC");
                        while ($guru = mysqli_fetch_assoc($queryGuru)) {
                            echo '<optgroup label="' . htmlspecialchars($guru['namaguru']) . '">';
                            $idguru = $guru['idguru'];
                            $kelas = mysqli_query($konek, "SELECT * FROM walikelas WHERE idguru = $idguru ORDER BY kelas ASC");
                            while ($k = mysqli_fetch_assoc($kelas)) {
                                echo '<option value="' . htmlspecialchars($k['kelas']) . '">' . htmlspecialchars($k['kelas']) . '</option>';
                            }
                            echo '</optgroup>';
                        }
                        ?>
                    </select>

                </td>
            </tr>
            <tr>
                <td>Tahun</td>
                <td><input class="form-control" type="text" name="tahunajaran" value="2024"></td>
            </tr>
            <tr>
                <td>Biaya</td>
                <td><input class="form-control" type="text" name="biaya" value="250000"></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td><input class="form-control" type="text" name="jatuhtempo" value="2025-10-10"></td>
            </tr>
            <tr>
                <td></td>
                <td><button class="btn btn-success" type="submit" name="tambah">SIMPAN DATA</button></td>
            </tr>
        </table>
    </form>
</div>

<?php include 'footer.php'; ?>