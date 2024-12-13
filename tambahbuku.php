<?php
    include 'layout/header.php';

    if (isset($_POST['tambah'])){
        if (create_barang($_POST) > 0){
            echo "<script>
                    alert('Barang Berhasil Ditambahkan');
                    document.location.href = 'databuku.php';
                </script>";
        } else {
            echo "<script>
            alert('Barang Gagal Ditambahkan');
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
                    Tambah Buku
                </div>
                <div class="card-body">

                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="user" class="form-label">Judul Buku</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="judulbuku" name="judul_buku" placeholder="Judul Buku" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Pengarang</label>
                            <input type="text" class="form-control" id="pencipta" name="pengarang" placeholder="Pengarang" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Penerbit</label>
                            <input type="text" class="form-control" id="terbit" name="penerbit" placeholder="Penerbit" required>
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Stok</label>
                            <input type="number" class="form-control" id="pass" name="jumlah_stok" placeholder="Jumlah Stok" required>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-success" style="float: right;">Simpan</button>
                        <p><button onclick="history.back()">Kembali</button></p>
                    </form>
                </div>
                <div class="card-footer" style="height: 40px;">
                </div>
            </div>
            <!-- akhir card -->
        </div>
    </div>