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
-- Struktur dari tabel `informasi_bidang`
--

CREATE TABLE `informasi_bidang` (
  `ID_Info` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Gambar` varchar(100) NOT NULL,
  `Waktu` date NOT NULL,
  `Isi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi_bidang`
--

INSERT INTO `informasi_bidang` (`ID_Info`, `ID_Admin`, `Judul`, `Jenis`, `Gambar`, `Waktu`, `Isi`) VALUES
(4, 5, 'Contoh kasus pidana umum', 'umum', 'uploads/pidana-umum.jpg', '2023-04-21', 'Sebagai kantor hukum, advokat dan / atau pengacara di Indonesia pada umumnya, kantor hukum LHS & PARTNERS juga melayani penanganan kasus hukum pidana umum sebagaimana tercantum dalam KUHP dan masalah hukum lainnya seperti kantor pengacara lainnya. Dalam penanganan kasus yang diduga ada tindak pidana / pelanggaran hukum pidana, sebelum perkara tersebut dilaporkan ke Kepolisian atau aparat penegak hukum lainnya, kami biasanya akan mengusahakan  penanganan secara nonlitigasi dan kekeluargaan.\r\n\r\nBerikut ini adalah beberapa kasus hukum pidana umum yang dapat kami berikan layanan jasa hukumnya, antara lain sebagai berikut :\r\n\r\n+ PENIPUAN & PENGGELAPAN\r\n+ PENCEMARAN NAMA BAIK & FITNAH\r\n+ PENGANIAYAAN & PENGEROYOKAN\r\n+ KASUS PIDANA PEMBUNUHAN\r\n+ PEMERASAN & PENGANCAMAN\r\n+ PERSELINGKUHAN & NIKAH SIRI\r\n+ TINDAK PIDANA PENCABULAN\r\n+ PERUSAKAN BARANG / BENDA\r\n+ KECELAKAAN LALULINTAS\r\n+ KASUS PIDANA PERJUDIAN\r\n+ PEMALSUAN SURAT & MATA UANG\r\n+ KASUS PIDANA PENADAHAN\r\n+ PENCURIAN & PERAMPOKAN\r\n+ PEMBUKAAN RAHASIA ORANG\r\n+ SUMPAH & SAKSI PALSU\r\n+ MASUK RUMAH & PEKARANGAN\r\n+ DAN LAIN SEBAGAINYA\r\n\r\nBagi Anda yang sedang mengalami atau terkena kasus pidana umum seperti tersebut diatas, baik sebagai pelapor, saksi, korban ataupun Tersangka, kantor kami dapat membantu Anda sebagai Pengacara yang akan mendampingi Anda dalam setiap proses hukum terhadap kasus yang sedang berjalan tersebut.\r\n\r\nBagi anda yang menghendaki layanan jasa hukum penanganan kasus-kasus hukum diatas dari kantor kami, silahkan menghubungi kami di Nomor HP / WhatsApp : 0813-9226-3999.\r\n\r\nSelain memberikan layanan jasa hukum di atas, LHS & PARTNERS juga menangani berbagai kasus hukum seperti kasus pidana umum meliputi : Penipuan & Penggelapan, Pencemaran Nama Baik & Fitnah, Penganiayaan & Pengeroyokan, Kasus Pembunuhan, Pemerasan & Pengancaman, Perselingkuhan & Nikah Siri, Pidana Pencabulan, Perusakan Barang / Benda, Kecelakaan Lalulintas, Kasus Perjudian, Pemalsuan Surat & Mata Uang, Kasus Penadahan, Pencurian & Perampokan, Pembukaan Rahasia Orang, Sumpah & Saksi Palsu, Masuk Rumah / Pekarangan Orang, kasus pidana khusus meliputi : Narkotika & Psikotropika, Tindak pidana UU ITE, Tindak pidana HAKI, Pidana kependudukan, Pidana Kewarganegaraan & imigrasi, Korupsi & gratifikasi, Pidana pornografi, Kdrt / kekerasan dalam rumah tangga, Tindak pidana Lingkungan, Tindak pidana Kehutanan, Pidana pencucian uang, Tindak pidana Kesehatan, Tindak pidana Pangan, Pidana perikanan & kelautan, Tindak pidana Pendidikan, Pidana Eksport Import, Pidana perlindungan anak, Pidana transportasi & penerbangan, Tindak pidana telekomunikasi, Pidana perlindungan konsumen, kasus perdata umum meliputi : Gugatan Perbuatan Melawan Hukum, Kasus Hutang Piutang, Gugatan Sengketa Kerjasama, Gugatan Wanprestasi, Gugatan Lelang Eksekusi, Permohonan Ganti Nama, Pembetulan Asal Usul Orang,  Gugatan Pencemaran Nama Baik, kasus hukum keluarga dan waris meliputi : Adopsi / Pengangkatan Anak, Pengakuan Anak Di Luar Nikah, Pengesahan Anak, Permohonan Wali / Pengampu, Penetapan Ahli Waris, Gugatan Sengketa Warisan, Pengurusan & Pelaksanaan Wasiat, Pembagian Waris Hukum Islam, Pembagian Warisan Non Islam, Pembetulan Akta Kelahiran, kasus hukum perkawinan dan perceraian meliputi : Gugatan Cerai Di Pengadilan Agama, Gugatan Cerai Non Mulsim Di Pn, Gugatan Cerai Pns, Tni & Polri, Pembagian Harta Gono-Gini, Tuntutan Nafkah Anak & Isteri, Gugatan Sengketa Hak Asuh Anak, Dispensasi Perkawinan, Perkawinan Indonesia Asing, Pengesahan Perkawinan / Itsbat Nikah, Pembatalan Perkawinan, kasus hukum pertanahan dan property meliputi : Sengketa Jual Beli Tanah, Sewa Menyewa Tanah & Bangunan, Sengketa Pembelian Aparttemen, Kasus Pembangunan Rumah, Pembebasan Tanah Proyek, Eksekusi Tanah Jaminan Kredit, Pemalsuan Dokumen Tanah, Penempatan Tanah Tanpa Hak, Pidana Pertanahan, dan kasus hukum tata usaha negara meliputi : Pemberhentian Pns, Pemberhentian Pns, Tni & Polri, Pemberhentian Pejabat Daerah, Pemberhentian Pamong Desa, Gugatan Pembatalan Sertifikat Tanah, Penurunan Pangkat Jabatan, Penolakan Pelantikan Pejabat, Dan Lain Sebagainya. Serta kasus hukum bisnis dan perusahaan di Indonesia.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  ADD PRIMARY KEY (`ID_Info`),
  ADD KEY `admin3` (`ID_Admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  MODIFY `ID_Info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  ADD CONSTRAINT `admin3` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
