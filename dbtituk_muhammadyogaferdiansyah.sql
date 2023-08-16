-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Agu 2023 pada 07.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtituk_muhammadyogaferdiansyah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_ukmtabel_muhammadyogaferdiansyah`
--

CREATE TABLE `anggota_ukmtabel_muhammadyogaferdiansyah` (
  `id_anggota` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_ukm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `anggota_ukmtabel_muhammadyogaferdiansyah`
--

INSERT INTO `anggota_ukmtabel_muhammadyogaferdiansyah` (`id_anggota`, `nim`, `id_ukm`) VALUES
(3, 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswatabel_muhammadyogaferdiansyah`
--

CREATE TABLE `mahasiswatabel_muhammadyogaferdiansyah` (
  `nim` varchar(50) NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `alamat_mahasiswa` varchar(255) NOT NULL,
  `id_beasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `mahasiswatabel_muhammadyogaferdiansyah`
--

INSERT INTO `mahasiswatabel_muhammadyogaferdiansyah` (`nim`, `nama_mahasiswa`, `tanggal_lahir`, `alamat_mahasiswa`, `id_beasiswa`) VALUES
('101012', 'Kopex', '2000-03-10', 'Paringin jer', 103),
('c030320018', 'Muhammad Yoga Ferdiansyah', '01-07-2002', 'Barabai City', 0),
('C030320072', 'Stepennn', '2002-05-24', 'Barabai', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukmtabel_muhammadyogaferdiansyah`
--

CREATE TABLE `ukmtabel_muhammadyogaferdiansyah` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `ukmtabel_muhammadyogaferdiansyah`
--

INSERT INTO `ukmtabel_muhammadyogaferdiansyah` (`id_ukm`, `nama_ukm`, `deskripsi`) VALUES
(1, 'Futsal', 'Ini merupakan ukm futsal polibannn'),
(3, 'Musik', 'Ini merupakan untuk pengembangan bakat pada musik'),
(4, 'Becatur', 'Ini merupakan UKM hiih iyaam asli');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `id_level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('akademik', '0b5652714faf87700d60a912f753cc55', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota_ukmtabel_muhammadyogaferdiansyah`
--
ALTER TABLE `anggota_ukmtabel_muhammadyogaferdiansyah`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `mahasiswatabel_muhammadyogaferdiansyah`
--
ALTER TABLE `mahasiswatabel_muhammadyogaferdiansyah`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `ukmtabel_muhammadyogaferdiansyah`
--
ALTER TABLE `ukmtabel_muhammadyogaferdiansyah`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota_ukmtabel_muhammadyogaferdiansyah`
--
ALTER TABLE `anggota_ukmtabel_muhammadyogaferdiansyah`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ukmtabel_muhammadyogaferdiansyah`
--
ALTER TABLE `ukmtabel_muhammadyogaferdiansyah`
  MODIFY `id_ukm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
