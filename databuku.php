<?php
    include 'layout/header.php';

    $search = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $search = $_POST['search'];
        $data_buku = select("SELECT * FROM buku WHERE judul_buku LIKE '%$search%' OR pengarang LIKE '%$search%' OR penerbit LIKE '%$search%' ORDER BY id_buku DESC");
    } else {
        $data_buku = select("SELECT * FROM buku ORDER BY id_buku DESC");
    }
?>
<link rel="stylesheet" href="css/databarang.css">
<div class="konten row">
    <div class="col-md-10 mx-auto">
        <div class="card mt-3">
            <div class="card-header text-light text-center">
                DATA BUKU
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
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($data_buku as $buku):?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $buku['judul_buku']; ?></td>
                                <td><?= $buku['pengarang']; ?></td>
                                <td><?= $buku['penerbit']; ?></td>
                                <td><?= $buku['jumlah_stok']; ?></td>
                                <td width="15%" class="text-center">
                                    <a href="editbuku.php?id_buku=<?= $buku['id_buku']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="hapus-barang.php?id_buku=<?= $buku['id_buku']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Barang Ini?')">Hapus</a>
                                </td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                    <a href="tambahbuku.php" class="btn btn-primary mb-1 float-right">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
</div>
