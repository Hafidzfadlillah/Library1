<?php
    include 'layout/header.php';

    // mengambil id_buku dari url
    $id_buku = (int)$_GET['id_buku'];

    $buku = select("SELECT * FROM buku WHERE id_buku = $id_buku")[0];

    // check apakah tombol tambah ditekan
    if (isset($_POST['edit'])){
        if (update_barang($_POST) > 0){
            echo "<script>
                    alert('Barang Berhasil Diubah');
                    document.location.href = 'databuku.php';
                </script>";
        } else {
            echo "<script>
            alert('Barang Gagal Diubah');
            document.location.href = 'databuku.php';
                </script>";
        }
    }
?>
<link rel="stylesheet" href="css/tambahbarang.css">
<div class="konten row">
        <!-- awal col -->
        <div class="card-kotak col-md-5 mx-auto">
            <!-- awal card -->
            <div class="card mt-3 shadow">
                <div class="card-header text-center" style="height: 40px;">
                    Edit Buku
                </div>
                <div class="card-body">

                    <form action="" method="post">
                    <input type="hidden" name="id_buku" value="<?= $buku['id_buku'];?>">
                        <div class="mb-3">
                            <label for="user" class="form-label">Judul Buku</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="judulbuku" name="judul_buku" value="<?= $buku['judul_buku']; ?>" placeholder="Judul Buku" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pencipta" name="pengarang" value="<?= $buku['pengarang']; ?>" placeholder="Pengarang" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="terbit" name="penerbit" value="<?= $buku['penerbit']; ?>" placeholder="Penerbit" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="pass" name="jumlah_stok" value="<?= $buku['jumlah_stok']; ?>" placeholder="Jumlah Stok" required>
                        </div>
                        <button type="submit" name="edit" class="btn btn-success" style="float: right;">Simpan</button>
                        <p><button type="button" onclick="history.back()">Kembali</button></p>
                    </form>
                </div>
                <div class="card-footer" style="height: 40px;">
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </div>