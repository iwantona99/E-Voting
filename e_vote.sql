-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2021 pada 03.21
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` tinyint(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`) VALUES
(1, 'admin', 'administrator', '$2y$10$5ok3rcIOv/yNIlPIGo49a.cXRAiA5ZsnxbpijFoyy5EuuYyVrZetu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kandidat`
--

CREATE TABLE `t_kandidat` (
  `id_kandidat` smallint(4) NOT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `suara` smallint(4) NOT NULL DEFAULT 0,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kandidat`
--

INSERT INTO `t_kandidat` (`id_kandidat`, `nama_calon`, `alamat`, `foto`, `visi`, `misi`, `suara`, `periode`) VALUES
(32, 'Tgk. Daud Umar', 'Uning Pegantungen', '0.92257400 1634777503.jpg', 'Narkoba', 'Hukum Narkoba Dalam Islam dan Efek Negatif nya Bagi Masyarakat Khususnya Para Remaja', 5, '2021/2022'),
(33, 'Tgk. Subhan,SE', 'Atang Jungket', '1(8).png', 'Judi Online', 'Skater Perusak Generasi Muda Bangsa dan Menjadikan Kemalasan Semakin Merajalela', 5, '2021/2022'),
(34, 'Tgk. Sabardi', 'Kayu Kul', '1(8).png', 'Shalat 5 Waktu', 'Pentingnya Menunaikan Shalat 5 Waktu dalam Keadaan Sibuk dan Penuh Kesibukan', 9, '2021/2022'),
(35, 'Tgk. M.Ihsan', 'Simpang Kelaping', '1(7).png', 'Teknologi', 'Pengaruh Kemajuan Teknologi Terhadap Kehidupan Umat Beragama Khususnya Islam di Era Globalisasi Seperti Sekarang Ini', 5, '2021/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_khutbah`
--

CREATE TABLE `t_khutbah` (
  `id_khutbah` smallint(4) NOT NULL,
  `materi` varchar(500) NOT NULL,
  `suara` smallint(6) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_khutbah`
--

INSERT INTO `t_khutbah` (`id_khutbah`, `materi`, `suara`) VALUES
(1, 'asda', 0),
(2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemilih`
--

CREATE TABLE `t_pemilih` (
  `nis` varchar(10) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pemilih`
--

INSERT INTO `t_pemilih` (`nis`, `periode`) VALUES
('1', '2021/2022'),
('2', '2021/2022'),
('3', '2021/2022'),
('4', '2021/2022'),
('5', '2021/2022'),
('6', '2021/2022'),
('7', '2021/2022'),
('8', '2021/2022'),
('9', '2021/2022'),
('10', '2021/2022'),
('12', '2021/2022'),
('13', '2021/2022'),
('14', '2021/2022'),
('15', '2021/2022'),
('16', '2021/2022'),
('17', '2021/2022'),
('18', '2021/2022'),
('19', '2021/2022'),
('20', '2021/2022'),
('21', '2021/2022'),
('22', '2021/2022'),
('23', '2021/2022'),
('24', '2021/2022'),
('25', '2021/2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jk` enum('L') NOT NULL,
  `pemilih` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `fullname`, `kelas`, `jk`, `pemilih`) VALUES
('1', 'Kasman', 'Kayu Kul', 'L', 'Y'),
('10', 'Zahri', 'Kayu Kul', 'L', 'Y'),
('11', 'Iwan Senye', 'Kayu Kul', 'L', 'Y'),
('12', 'Sahri', 'Kayu Kul', 'L', 'Y'),
('13', 'Julpan', 'Kayu Kul', 'L', 'Y'),
('14', 'Budi', 'Uning', 'L', 'Y'),
('15', 'Fauzan', 'Kayu Kul', 'L', 'Y'),
('16', 'Sulfi', 'Kayu Kul', 'L', 'Y'),
('17', 'Darmin', 'Kayu Kul', 'L', 'Y'),
('18', 'Dani', 'Kayu Kul', 'L', 'Y'),
('19', 'Zuhri', 'Kayu Kul', 'L', 'Y'),
('2', 'Pitra', 'Kayu Kul', 'L', 'Y'),
('20', 'Kiki', 'Kayu Kul', 'L', 'Y'),
('21', 'Edwin', 'Kayu Kul', 'L', 'Y'),
('22', 'Sadri', 'Kayu Kul', 'L', 'Y'),
('23', 'Madan', 'Uning', 'L', 'Y'),
('24', 'Padli', 'Kayu Kul', 'L', 'Y'),
('25', 'Fauzi', 'Kayu Kul', 'L', 'Y'),
('26', 'Suhada', 'Kayu Kul', 'L', 'Y'),
('3', 'Subhan', 'Kayu Kul', 'L', 'Y'),
('4', 'Arifin', 'Kayu Kul', 'L', 'Y'),
('5', 'Ricki', 'Kayu Kul', 'L', 'Y'),
('6', 'Ziran Ahmad', 'Kayu Kul', 'L', 'Y'),
('7', 'Sukri', 'Uning', 'L', 'Y'),
('8', 'Sumarno', 'Kayu Kul', 'L', 'Y'),
('9', 'Abdullah', 'Kayu Kul', 'L', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_kandidat`
--
ALTER TABLE `t_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `t_khutbah`
--
ALTER TABLE `t_khutbah`
  ADD PRIMARY KEY (`id_khutbah`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_kandidat`
--
ALTER TABLE `t_kandidat`
  MODIFY `id_kandidat` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `t_khutbah`
--
ALTER TABLE `t_khutbah`
  MODIFY `id_khutbah` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
