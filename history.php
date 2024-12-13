<?php
include 'layout/header.php';

$search = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $data_pelunasan = select("SELECT * FROM history WHERE peminjam LIKE '%$search%' OR denda LIKE '%$search%' ORDER BY id_lunas DESC");
} else {
    $data_pelunasan = select("SELECT * FROM history ORDER BY id_lunas DESC");
}
?>

<link rel="stylesheet" href="css/history.css">
<div class="konten row">
    <div class="col-md-10 mx-auto">
        <div class="card mt-3">
            <div class="card-header text-light text-center">
                RIWAYAT PELUNASAN
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <input type="text" name="search" placeholder="Cari..." value="<?= $search ?>">
                    <button type="submit" class="btn btn-primary mb-1 float-right">Cari</button>
                </form>
                <div class="col">
                    <table class="table table-bordered table-striped mt-3" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Peminjam</th>
                                <th>Denda</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_pelunasan as $history): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $history['peminjam']; ?></td>
                                <td>Rp <?= number_format($history['denda'], 0, ',', '.'); ?></td>
                                <td><?= $history['payment_date']; ?></td>
                                <td>
                                    <a href="#" class="btn btn-success mb-1 float-right">Lunas</a>
                                </td>
                                <td width="15%" class="text-center">
                                    <a href="hapus-barang.php?id_lunas=<?= $history['id_lunas']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Barang Ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="sirkulasi.php" class="btn btn-primary mb-1 float-right">Kembali</a>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
