<?php
    include 'layout/header.php';
    // Query untuk menghitung total buku 
    $query1 = "SELECT SUM(jumlah_stok) AS total_stok FROM buku";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_assoc($result1);
    $total_stok = $row1['total_stok'];

    // Query untuk menghitung total pengguna
    $query2 = "SELECT COUNT(*) AS total_pengguna FROM user";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $total_pengguna = $row2['total_pengguna'];

    // Query untuk menghitung total peminjam
    $query2 = "SELECT COUNT(*) AS total_peminjam FROM peminjaman";
    $result2 = mysqli_query($conn, $query2);
    $row2 = mysqli_fetch_assoc($result2);
    $total_peminjam = $row2['total_peminjam'];
?>
<style>
    
    .card-number {
        margin-right: 0px;
        align-items: left;
    }
</style>
<link rel="stylesheet" href="css/beranda.css">
<div class="konten my-5">
        <div class="row justify-content-center">
            <!-- Buku -->
        <div class="col-md-3">
                <div class="card-custom book-card">
                    <img src="foto/book.svg" class="card-image" alt="Icon">
                    <div class="card-content">
                        <div>Buku</div>
                        <div class="card-number"><?php echo $total_stok?></div>
                    </div>
                </div>
            </div>
            <!-- Pengguna -->
            <div class="col-md-3">
                <div class="card-custom clients-card">
                    <img src="foto/person.svg" class="card-image" alt="Icon">
                    <div class="card-content">
                        <div class="card-left"> 
                            <div>Pengguna</div>
                            <div class="card-number"><?php echo $total_pengguna?></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- peminjam -->
            <div class="col-md-3">
                <div class="card-custom jobs-card">
                    <img src="foto/peminjam.png" class="card-image" alt="Icon">
                    <div class="card-content">
                        <div class="card-left"> 
                            <div>Peminjam</div>
                            <div class="card-number"><?php echo $total_peminjam?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    