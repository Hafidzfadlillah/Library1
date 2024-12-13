<?php
include 'layout/header.php';

$search = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $search = $_POST['search'];
    $data_buku = select("SELECT * FROM peminjaman WHERE judul_buku LIKE '%$search%' OR peminjam LIKE '%$search%' OR tgl_pinjam LIKE '%$search%' ORDER BY id_pinjam DESC");
} else {
    $data_buku = select("SELECT * FROM peminjaman ORDER BY id_pinjam DESC");
}
?>
<style>
.badge {
    color: black;
}
.btn-success {
    
    background-color: white;
}
</style>
<link rel="stylesheet" href="css/databarang.css">
<div class="konten row">
    <div class="col-md-10 mx-auto">
        <div class="card mt-3">
            <div class="card-header text-light text-center">
                DATA PEMINJAM
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
                                <th>Judul Buku</th>
                                <th>Peminjam</th>
                                <th>Tgl Pinjam</th>
                                <th>Jatuh Tempo</th>
                                <th>Denda</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_buku as $user): ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $user['judul_buku']; ?></td>
                                <td><?= $user['peminjam']; ?></td>
                                <td><?= $user['tgl_pinjam']; ?></td>
                                <td><?= $user['jatuh_tempo']; ?></td>
                                <td width="15%" class="text-center">
                                    <?php
                                        $denda_info = calculateDenda($user['jatuh_tempo']);
                                    ?>
                                    <span class="badge badge-danger">Rp. <?= number_format($denda_info['total_denda'], 0, ',', '.'); ?></span><br>
                                    Terlambat: <?= $denda_info['days_late']; ?> Hari
                                </td>
                                <td width="15%" class="text-center">
                                    <a href="hapus-barang.php?id_pinjam=<?= $user['id_pinjam']; ?>" class="btn btn-success" onclick="return confirm('Periksa Kembali Pelunasan Apakah Sudah Benar?')">&#10004;</span></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <a href="peminjam.php" class="btn btn-primary mb-1 float-right">Tambah</a>
                    <a href="history.php" class="btn btn-danger mb-1 float-right">Riwayat Pelunasan</a>
                </div>
            </div>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>
