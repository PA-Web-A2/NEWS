-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2023 pada 15.24
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Pass` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Username`, `Pass`) VALUES
(5, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `ID_Berita` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Jenis` varchar(50) NOT NULL,
  `Gambar` varchar(50) NOT NULL,
  `Judul` varchar(100) NOT NULL,
  `Tanggal` date NOT NULL,
  `Isi` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`ID_Berita`, `ID_Admin`, `Jenis`, `Gambar`, `Judul`, `Tanggal`, `Isi`) VALUES
(2, 5, 'berita', 'uploads/img3.jpg', 'Kegiatan Jaksa Menyapa dengan Restorative Justice', '2023-04-10', 'Tes');

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
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`ID_Berita`),
  ADD KEY `admin5` (`ID_Admin`);

--
-- Indeks untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  ADD PRIMARY KEY (`ID_Info`),
  ADD KEY `admin3` (`ID_Admin`);

--
-- Indeks untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  ADD PRIMARY KEY (`ID_Profile`),
  ADD KEY `admin2` (`ID_Admin`);

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
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  MODIFY `ID_Info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  MODIFY `ID_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `profile_text`
--
ALTER TABLE `profile_text`
  MODIFY `ID_Profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `admin5` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `informasi_bidang`
--
ALTER TABLE `informasi_bidang`
  ADD CONSTRAINT `admin3` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile_img`
--
ALTER TABLE `profile_img`
  ADD CONSTRAINT `admin2` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile_text`
--
ALTER TABLE `profile_text`
  ADD CONSTRAINT `admin1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
