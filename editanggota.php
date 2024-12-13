<?php
    include 'layout/header.php';

    // mengambil id dari url
    $id = (int)$_GET['id'];

    $user = select("SELECT * FROM user WHERE id = $id")[0];

    // check apakah tombol tambah ditekan
    if (isset($_POST['edit'])){
        if (update_anggota($_POST) > 0){
            echo "<script>
                    alert('Data Berhasil Diubah');
                    document.location.href = 'dataanggota.php';
                </script>";
        } else {
            echo "<script>
            alert('Data Gagal Diubah');
            document.location.href = 'dataanggota.php';
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
                    Edit Anggota
                </div>
                <div class="card-body">

                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $user['id'];?>">
                        <div class="mb-3">
                            <label for="user" class="form-label">nama</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $user['tgl_lahir']; ?>" placeholder="Tanggal Lahir" required>
                        </div>

                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
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