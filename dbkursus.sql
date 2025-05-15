-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Bulan Mei 2025 pada 13.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbkursus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_profiles`
--

CREATE TABLE `admin_profiles` (
  `idAdmin` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_profiles`
--

INSERT INTO `admin_profiles` (`idAdmin`, `nama`, `password`) VALUES
('adm001', 'Emmanuel', '111'),
('adm002', 'Daniel', '222');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instruktur_profiles`
--

CREATE TABLE `instruktur_profiles` (
  `idInstruktur` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kursus_user`
--

CREATE TABLE `jadwal_kursus_user` (
  `idJadwalKursus` int(10) NOT NULL,
  `idUser` int(10) NOT NULL,
  `namaKursus` varchar(20) NOT NULL,
  `namaUser` varchar(20) NOT NULL,
  `idJadwal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_kursus_user`
--

INSERT INTO `jadwal_kursus_user` (`idJadwalKursus`, `idUser`, `namaKursus`, `namaUser`, `idJadwal`, `tanggal`, `waktu`, `status`) VALUES
(1, 1, 'Mobil', 'David', 1, '2024-11-30', '23:40:42', 'request'),
(16, 5, 'Mobil', 'Deni', 1, '2024-11-30', '22:44:32', 'request'),
(17, 6, 'Mobil', 'Kuda', 1, '2024-12-18', '12:45:00', 'request'),
(19, 6, 'Mobil', 'Kuda', 2, '2024-12-26', '14:00:00', 'request'),
(20, 1, 'Mobil', 'David', 2, '2024-12-26', '14:00:00', 'request'),
(24, 5, 'Mobil', 'Deni', 1, '2024-12-18', '12:45:00', 'request'),
(25, 1, 'Mobil', 'David', 1, '2024-12-18', '12:45:00', 'request'),
(26, 1, 'Mobil', 'David', 2, '2024-12-26', '14:00:00', 'request'),
(27, 7, 'Mobil', 'Vicko', 2, '2024-12-26', '14:00:00', 'request'),
(28, 7, 'Mobil', 'Vicko', 1, '2024-12-18', '12:45:00', 'request'),
(29, 1, 'Mobil', 'David', 1, '2024-12-18', '12:45:00', 'request');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_ready`
--

CREATE TABLE `jadwal_ready` (
  `idJadwal` int(10) NOT NULL,
  `namaJadwal` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_ready`
--

INSERT INTO `jadwal_ready` (`idJadwal`, `namaJadwal`, `tanggal`, `waktu`) VALUES
(1, 'Mobil', '2024-12-18', '12:45:00'),
(2, 'Mobil', '2024-12-26', '14:00:00'),
(9, 'Mobil', '2025-05-16', '17:58:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profiles`
--

CREATE TABLE `user_profiles` (
  `idUser` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_profiles`
--

INSERT INTO `user_profiles` (`idUser`, `nama`, `password`) VALUES
(1, 'David', '123'),
(2, 'Maria', '123'),
(3, 'El', '123'),
(5, 'Deni', '123'),
(6, 'Kuda', '123'),
(7, 'Vicko', '222'),
(8, 'Avokudel', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_profiles`
--
ALTER TABLE `admin_profiles`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indeks untuk tabel `instruktur_profiles`
--
ALTER TABLE `instruktur_profiles`
  ADD PRIMARY KEY (`idInstruktur`);

--
-- Indeks untuk tabel `jadwal_kursus_user`
--
ALTER TABLE `jadwal_kursus_user`
  ADD PRIMARY KEY (`idJadwalKursus`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idjadwal` (`idJadwal`);

--
-- Indeks untuk tabel `jadwal_ready`
--
ALTER TABLE `jadwal_ready`
  ADD PRIMARY KEY (`idJadwal`);

--
-- Indeks untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `instruktur_profiles`
--
ALTER TABLE `instruktur_profiles`
  MODIFY `idInstruktur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kursus_user`
--
ALTER TABLE `jadwal_kursus_user`
  MODIFY `idJadwalKursus` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `jadwal_ready`
--
ALTER TABLE `jadwal_ready`
  MODIFY `idJadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_kursus_user`
--
ALTER TABLE `jadwal_kursus_user`
  ADD CONSTRAINT `jadwal_kursus_user_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user_profiles` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_kursus_user_ibfk_2` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal_ready` (`idJadwal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
