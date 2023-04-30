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
-- Struktur dari tabel `profile_text`
--

CREATE TABLE `profile_text` (
  `ID_Profile` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Waktu` date NOT NULL,
  `Isi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile_text`
--

INSERT INTO `profile_text` (`ID_Profile`, `ID_Admin`, `Jenis`, `Waktu`, `Isi`) VALUES
(1, 5, 'VisiMisi', '0000-00-00', 'Visi Kejaksaan R.I :\r\n\r\n\"Menjadi Lembaga Penegak Hukum yang Professional, Proporsional dan Akuntabel\"\r\n\r\nDengan Penjelasan :\r\n\r\nLembaga Penegak Hukum: Kejaksaan RI sebagai salah satu lembaga penegak hukum di Indonesia yang mempunyai tugas dan fungsi sebagai penyidik pada tindak pidana tertentu, penuntut umum, pelaksana penetapan hakim, pelaksana putusan pengadilan yang telah memperoleh kekuatan hukum tetap, melakukan pengawasan terhadap pelaksanaan putusan pidana bersyarat, pidana pengawasan dan lepas bersyarat, bertindak sebagai Pengacara Negara serta turut membina ketertiban dan ketentraman umum melalui upaya antara lain : meningkatkan kesadaran hukum masyarakat, Pengamanan kebijakan penegakan hukum dan Pengawasan Aliran Kepercayaan dan penyalahgunaan penodaan agama\r\nProfesional: Segenap aparatur Kejaksaan RI dalam melaksanakan tugas didasrkan atas nilai luhur TRI KRAMA ADHYAKSA serta kompetensi dan kapabilitas yang ditunjang dengan pengetahuan dan wawasan yang luas serta pengalaman kerja yang memadai dan berpegang teguh pada aturan serta kode etik profesi yang berlaku\r\nProporsional: Dalam melaksanakan tugas dan fungsinya Kejaksaan selalu memakai semboyan yakni menyeimbangkan yang tersurat dan tersirat dengan penuh tanggungjawab, taat azas, efektif dan efisien serta penghargaan terhadap hak-hak publik\r\nAkuntabel: Bahwa kinerja Kejaksaan Republik Indonesia dapat dipertanggungjawabkan sesuai dengan ketentuan yang berlaku\r\n \r\n\r\nMisi Kejaksaan R.I :\r\n\r\nMeningkatkan Peran Kejaksaan Republik Indonesia Dalam Program Pencegahan Tindak Pidana\r\nMeningkatkan Professionalisme Jaksa Dalam Penanganan Perkara Tindak Pidana\r\nMeningkatkan Peran Jaksa Pengacara Negara Dalam Penyelesaian Masalah Perdata dan Tata Usaha Negara \r\nMewujudkan Upaya Penegakan Hukum Memenuhi Rasa Keadilan Masyarakat\r\nMempercepat Pelaksanaan Reformasi Birokrasi dan Tata Kelola Kejaksaan Republik Indonesia yang Bersih dan Bebas Korupsi, Kolusi dan Nepotisme\r\n \r\n\r\n(Sumber: Peraturan Jaksa Agung Nomor: 007/A/JA/08/2016 tentang Perubahan Atas Peraturan Jaksa Agung Republik Indonesia Nomor PER-010/A/JA/06/2015 Tentang Rencana Strategis Kejaksaan Republik Indonesia Tahun 2015-2019 tanggal 4 Agustus 2016)'),
(2, 5, 'Doktrin', '2023-04-21', 'Trikrama Adhyaksa\r\n\r\nSATYA\r\n\r\nKesetiaan yang bersumber pada rasa jujur, baik terhadap Tuhan Yang Maha Esa, terhadap diri pribadi dan keluarga maupun kepada sesama manusia.\r\n\r\n \r\n\r\nADHI\r\n\r\nKesempurnaan dalam bertugas dan berunsur utama pada rasa tanggung jawab terhadap Tuhan Yang Maha Esa,  keluarga dan sesama manusia.\r\n\r\n \r\n\r\nWICAKSANA\r\n\r\nBijaksana dalam tutur kata dan tingkah laku, khususnya dalam penerapan kekuasaan dan kewenangannya.'),
(3, 5, 'Tugas', '2023-04-21', 'TUGAS & WEWENANG\r\n \r\n\r\nBerdasarkan Pasal 30 Undang Undang Nomor 16 Tahun 2004 tentang Kejaksaan Republik Indonesia, berikut adalah tugas dan wewenang Kejaksaan.\r\n\r\nDi bidang pidana :\r\n\r\n1. melakukan penuntutan;\r\n2. melaksanakan penetapan hakim dan putusan pengadilan yang telah memperoleh kekuatan hukum tetap;\r\n3. melakukan pengawasan terhadap pelaksanaan putusan pidana bersyarat, putusan pidana pengawasan, dan keputusan lepas bersyarat;\r\n4. melakukan penyidikan terhadap tindak pidana tertentu berdasarkan undang- undang;\r\n5. melengkapi berkas perkara tertentu dan untuk itu dapat melakukan pemeriksaan tambahan sebelum dilimpahkan ke pengadilan yang dalam pelaksanaannya dikoordinasikan dengan penyidik.\r\n\r\nDi bidang perdata dan tata usaha negara :\r\nKejaksaan dengan kuasa khusus, dapat bertindak baik di dalam maupun di luar pengadilan untuk dan atas nama negara atau pemerintah.\r\n\r\nDalam bidang ketertiban dan ketenteraman umum, Kejaksaan turut menyelenggarakan kegiatan:\r\n\r\n1. peningkatan kesadaran hukum masyarakat;\r\n2. pengamanan kebijakan penegakan hukum;\r\n3. pengawasan peredaran barang cetakan;\r\n4. pengawasan aliran kepercayaan yang dapat membahayakan masyarakat dan negara;\r\n5. pencegahan penyalahgunaan dan/atau penodaan agama;\r\n6. penelitian dan pengembangan hukum serta statistik kriminal.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `profile_text`
--
ALTER TABLE `profile_text`
  ADD PRIMARY KEY (`ID_Profile`),
  ADD KEY `admin1` (`ID_Admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `profile_text`
--
ALTER TABLE `profile_text`
  MODIFY `ID_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `profile_text`
--
ALTER TABLE `profile_text`
  ADD CONSTRAINT `admin1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
