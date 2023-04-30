-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2023 pada 10.35
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kejaksaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_img`
--

CREATE TABLE `profile_img` (
  `ID_Profile` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Waktu` date NOT NULL,
  `Gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile_img`
--

INSERT INTO `profile_img` (`ID_Profile`, `ID_Admin`, `Jenis`, `Waktu`, `Gambar`) VALUES
(1, 5, 'Struktur', '2023-04-21', 'uploads/struktur.png'),
(2, 5, 'Perintah', '2023-04-14', 'uploads/img1.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  ADD PRIMARY KEY (`ID_Profile`),
  ADD KEY `admin2` (`ID_Admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  MODIFY `ID_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  ADD CONSTRAINT `admin2` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
