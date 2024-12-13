<?php
include 'config/app.php';

// Memeriksa dan menerima id barang yang dipilih admin
if (isset($_GET['id_buku'])) {
    $id_buku = (int)$_GET['id_buku'];
    if (delete_barang($id_buku) > 0) {
        echo "<script>
             alert('Data Berhasil Dihapus'); 
             document.location.href = 'databuku.php';
        </script>";
    } else {
        echo "<script>
             alert('Data Gagal Dihapus'); 
             document.location.href = 'databuku.php';
        </script>";
    }
}

// Memeriksa dan menerima id anggota yang dipilih admin
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    if (delete_anggota($id) > 0) {
        echo "<script>
             alert('Data Berhasil Dihapus'); 
             document.location.href = 'dataanggota.php';
        </script>";
    } else {
        echo "<script>
             alert('Data Gagal Dihapus'); 
             document.location.href = 'dataanggota.php';
        </script>";
    }
}

// Memeriksa dan menerima id anggota yang dipilih admin
if (isset($_GET['id_lunas'])) {
    $id_lunas = (int)$_GET['id_lunas'];
    if (delete_history($id_lunas) > 0) {
        echo "<script>
             alert('Data Berhasil Dihapus'); 
             document.location.href = 'history.php';
        </script>";
    } else {
        echo "<script>
             alert('Data Gagal Dihapus'); 
             document.location.href = 'history.php';
        </script>";
    }
}

// Memeriksa dan menerima id peminjaman yang dipilih admin
if (isset($_GET['id_pinjam'])) {
    $id_pinjam = $_GET['id_pinjam'];
    
    // Ambil data yang akan dihapus
    $query = "SELECT * FROM peminjaman WHERE id_pinjam = $id_pinjam";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Hitung informasi denda
    $denda_info = calculateDenda($data['jatuh_tempo']);
    
    // Masukkan data ke tabel history
    $peminjam = $data['peminjam'];
    $denda = $denda_info['total_denda'];
    insert_into_history($peminjam, $denda);
    
    // Hapus data dari tabel peminjaman
    if (delete_sirkulasi($id_pinjam)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location='sirkulasi.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.'); window.location='sirkulasi.php';</script>";
    }
}
?>
