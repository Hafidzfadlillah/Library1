<?php
$servername = "localhost";
$user = "root";
$pass = "";
$dbname = "tugaslogin2";

// Membuat koneksi
$conn = new mysqli($servername, $user, $pass, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>