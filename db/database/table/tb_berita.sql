-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Apr 2023 pada 08.28
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
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `ID_Berita` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar` varchar(200) NOT NULL,
  `Judul` varchar(150) NOT NULL,
  `Tanggal` date NOT NULL,
  `Isi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`ID_Berita`, `ID_Admin`, `Gambar`, `Judul`, `Tanggal`, `Isi`) VALUES
(6, 5, 'uploads/img2.jpg', 'Kegiatan Jaksa Menyapa dengan Restorative Justice', '2023-04-04', 'Pada hari Rabu 25 Aprol 2022 mulai pukul 11.00 sampai dengan 12.00 wita bertempat di Kantor RRI Samarinda telah dilaksanakan program Jaksa Menyapa  iteraktif melalui radio RRI Pro1 Samarinda yang disiarkan juga secara online melalui Facebook RRI Pro1 Samarinda dipandu oleh sdri. METTA Selaku penyiar RRI Samarinda Pro1 FM 97.6 Mhz dqn 88.5 FM.'),
(7, 5, 'uploads/img3.jpg', 'Jaksa Masuk Sekolah (JMS) di Madrasah Aliyah An Nur Samarinda', '2023-04-20', 'Pada hari Selasa tanggal 31 Mei 2022 sekira pukul 14.00 WITA, Kejaksaan Tinggi Kalimantan Timur melalui Bidang Intelijen kembali melaksanakan kegiatan Penyuluhan hukum melalui program Jaksa Masuk Sekolah (JMS) kepada siswa-siswi di Madrasah Aliyah An Nur Samarinda. \r\n\r\nKegiatan Jaksa Masuk Sekolah ini mengangkat tema pengenalan tupoksi Kejaksaan, Narkotika dan Perlindungan serta pencegahan kekerasan terhadap anak, yang disampaikan langsung oleh narasumber dari Kejaksaan Tinggi Kalimantan Timur Sdr. Toni Yuswanto, SH.MH (Kasi Penkum Kejati Kaltim) dan Sdr. Praden Kasep Simanjuntak, SH (Kasi B Kejati Kaltim) dan dihadiri oleh peserta siswa-siswi dari Madrasah Aliyah An Nur sebanyak 50 (lima puluh)  orang.\r\n\r\nDalam kegiatan JMS dibukalangsung oleh Bapak Dr.H. BAEQUNI selaku Kepala Kantor Kementrian Agama Kota Samarinda yang didampingi oleh Bapak JUNAIDI NOOR Kasi Penmad Kemenag Kota Samarinda dan Bapak ACHMAD HAMIDI Kepala Madrasah An Nur Samarinda dan acara dilanjutkan dengan pemaparan materi oleh narasumber dari Tim JMS Kejati Kaltim. Selama kegiatan JMS, siswa-siswi nampak antusias dengan banyak mengajukan pertanyaan kepada narasumber. \r\n\r\nDengan kegiatan JMS inidi maksudkan untuk meningkatkan kesadaran hukum generasi muda, dengan memperkenalkan hukum sejak dininantinya diharapkan para pelajar melakakan hukum. Dengan para pelajar mengenali hukum sejak dini maka akan dapat menjauhkan diri dari hukuman dan mampu sebagai corong hukum kepada masyarakat disekitarnya. \r\n\r\n#kejaksaanri #kejaksaanagung #kejatikaltim #jms2022 #jaksamasuksekolah #Madrasahlaiyah #depdikbud #depag');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`ID_Berita`),
  ADD KEY `admin` (`ID_Admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `admin` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
