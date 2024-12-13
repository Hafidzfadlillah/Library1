-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2024 pada 16.41
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugaslogin2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(10) NOT NULL,
  `judul_buku` varchar(50) NOT NULL,
  `pengarang` text NOT NULL,
  `penerbit` text NOT NULL,
  `jumlah_stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `pengarang`, `penerbit`, `jumlah_stok`) VALUES
(1, 'mtk', 'hapis', 'fidi', 3),
(2, 'IPA', 'Jinos', 'azza', 6),
(5, 'Olahraga', 'Pegi', 'cv.pamulang', 5),
(6, 'SI Tanggang', 'aang', 'cv.pamulang', 1),
(7, 'Mantappu Corp', 'Jerome Polin', 'cv.mentari', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id_lunas` int(6) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `denda` int(11) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id_lunas`, `peminjam`, `denda`, `payment_date`) VALUES
(4, 'josep', 20000, '2024-12-12'),
(5, 'azza', 30000, '2024-12-12'),
(6, 'josep', 20000, '2024-12-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(11) NOT NULL,
  `judul_buku` varchar(25) NOT NULL,
  `peminjam` varchar(50) NOT NULL,
  `tgl_pinjam` date NOT NULL DEFAULT current_timestamp(),
  `jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `judul_buku`, `peminjam`, `tgl_pinjam`, `jatuh_tempo`) VALUES
(28, 'SI Tanggang', 'budi', '2024-11-22', '2024-11-18'),
(30, 'Mantappu Corp', 'azza', '2024-11-22', '2024-11-23'),
(35, 'Olahraga', 'budi', '2024-12-12', '2024-12-14'),
(40, 'Mantappu Corp', 'azza', '2024-12-12', '2024-12-17'),
(41, 'IPA', 'hafidz', '2024-12-12', '2024-12-12'),
(42, 'SI Tanggang', 'hafidz', '2024-12-12', '2024-12-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `tgl_lahir`, `jenis_kelamin`) VALUES
(18, 'josep', 'josep', '$2y$10$jy5derZBQGPBFAQPO223Oum8xs.36aNxnw.sG0oeQXbWKcEsNQdY2', '2005-02-08', 'Pria'),
(19, 'budi', 'budi', '$2y$10$8WVOaPBm/LTN7C//XqTRWObZRikXVVwYd3led6htF/LlljUl307Sq', '2005-02-06', 'Pria'),
(20, 'azza', 'azza123', '$2y$10$LZNrUvrwZapoYGqPEOcqae90mpUPk3XahlXqcvVtKuX2.ngXV8vQi', '2004-06-08', 'Pria'),
(21, 'hafidz', 'hafidz', '$2y$10$2N5/3Y/mCEmBilRLFwgaku7v9/gymvD/ydqV7USr3YWDWt/8ehm2G', '2005-03-04', 'Pria');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_lunas`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id_lunas` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
