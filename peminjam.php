<?php
include 'layout/header.php';

// Mengambil data buku dan pengguna
$buku = mysqli_query($conn, "SELECT * FROM buku");
$users = mysqli_query($conn, "SELECT * FROM user");

// Menambah data peminjaman
if (isset($_POST['submit'])) {
    $judul_buku = htmlspecialchars($_POST['judul_buku']);
    $peminjam = htmlspecialchars($_POST['peminjam']);
    $jatuh_tempo = htmlspecialchars($_POST['jatuh_tempo']);

    $query = "INSERT INTO peminjaman (judul_buku, peminjam, jatuh_tempo) 
              VALUES ('$judul_buku', '$peminjam', '$jatuh_tempo')";
    if (mysqli_query($conn, $query)) {
        // Kurangi jumlah stok buku
        mysqli_query($conn, "UPDATE buku SET jumlah_stok = jumlah_stok - 1 WHERE judul_buku = '$judul_buku'");
        echo "<script>alert('Data peminjaman berhasil ditambahkan');</script>";
        header("Location: sirkulasi.php");
        exit();
    } else {
        echo "<script>alert('Gagal menambahkan data peminjaman');</script>";
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
                Peminjaman
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="judul_buku" class="form-label">Judul Buku</label>
                        <select class="form-control" id="judul_buku" name="judul_buku" required>
                            <option value="" disabled selected>Pilih Buku</option>
                            <?php while ($row = mysqli_fetch_assoc($buku)): ?>
                                <option value="<?= htmlspecialchars($row['judul_buku']); ?>"><?= htmlspecialchars($row['judul_buku']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="peminjam" class="form-label">Peminjam</label>
                        <select class="form-control" id="peminjam" name="peminjam" required>
                            <option value="" disabled selected>Pilih Peminjam</option>
                            <?php while ($row = mysqli_fetch_assoc($users)): ?>
                                <option value="<?= htmlspecialchars($row['nama']); ?>"><?= htmlspecialchars($row['nama']); ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="jatuh_tempo" class="form-label">Jatuh Tempo</label>
                        <input type="date" class="form-control" id="jatuh_tempo" name="jatuh_tempo" placeholder="Jatuh Tempo" required>
                    </div>

                    <button type="submit" name="submit" class="btn btn-success" style="float: right;">Simpan</button>
                    <p><button onclick="history.back()">Kembali</button></p>
                </form>
            </div>
            <div class="card-footer" style="height: 40px;">
            </div>
        </div>
        <!-- akhir card -->
    </div>
</div>
