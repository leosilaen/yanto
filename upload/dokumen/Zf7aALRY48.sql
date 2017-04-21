-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 09:48 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hasil_pemeriksaan_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `nama`, `alamat`) VALUES
(1, 'PT Bank A', 'Jln  Jamin Ginting No 17 Jakarta'),
(2, 'PT Bank B', 'Jalan Sudirman no 15'),
(3, 'PT Bank C', 'Jalan Kebon Jahe II no 16');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(11) NOT NULL,
  `bulan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_pemeriksaan`
--

CREATE TABLE `hasil_pemeriksaan` (
  `id` bigint(20) NOT NULL,
  `lokasi_temuan` varchar(500) NOT NULL,
  `surat_introduksi` varchar(255) NOT NULL,
  `awp` varchar(255) NOT NULL,
  `bulan_posisi_pemeriksaan` date NOT NULL COMMENT 'Posisi/Periode Pemeriksaan',
  `tahun_pemeriksaan` int(11) NOT NULL,
  `risalah_exit_meeting` varchar(255) NOT NULL COMMENT 'Jangka Waktu Pemeriksaan',
  `bank` varchar(255) NOT NULL COMMENT 'Nama Bank',
  `khp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_pemeriksaan`
--

INSERT INTO `hasil_pemeriksaan` (`id`, `lokasi_temuan`, `surat_introduksi`, `awp`, `bulan_posisi_pemeriksaan`, `tahun_pemeriksaan`, `risalah_exit_meeting`, `bank`, `khp`) VALUES
(1, 'Medan', 'xU4AqNt4nq.png', 'q6Jh0TkkOa.png', '2016-10-30', 2016, '', '1', ''),
(2, 'Medan', 'z8L4unVnJt.docx', 'gHlYkFGzbh.docx', '2016-10-30', 2016, '23oKZEkTvd.png', '1', 'WUbrAg7y5W.png');

-- --------------------------------------------------------

--
-- Table structure for table `history_perubahan_data`
--

CREATE TABLE `history_perubahan_data` (
  `id` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `id_temuan` int(11) NOT NULL,
  `sebelum_perubahan` varchar(200) NOT NULL,
  `sesudah_perubahan` varchar(255) NOT NULL,
  `tgl_perubahan` datetime NOT NULL,
  `aktivitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_perubahan_data`
--

INSERT INTO `history_perubahan_data` (`id`, `id_pengguna`, `id_pemeriksaan`, `id_temuan`, `sebelum_perubahan`, `sesudah_perubahan`, `tgl_perubahan`, `aktivitas`) VALUES
(1, 1, 0, 2, 'Selesai', 'Selesai', '2016-10-21 00:00:00', 'Mengubah status temuan'),
(2, 1, 0, 1, 'pUlqswVb2F.docx', 'wKGCII2IvK.png', '2016-10-21 00:00:00', 'Mengupload dokumen penyelesaian temuan'),
(3, 1, 0, 1, '', '', '2016-10-21 00:00:00', 'Mencetak dokumen tindak lanjut temuan.'),
(4, 1, 1, 0, '', '', '2016-10-21 00:00:00', 'Mencetak dokumen konfirmasi temuan bank.'),
(5, 1, 0, 1, 'Dalam Proses', 'Dalam Proses', '2016-10-21 00:00:00', 'Mengubah status temuan'),
(6, 1, 1, 0, '', '', '2016-10-21 01:52:50', 'Mengupload AWP.'),
(7, 1, 1, 0, '', '', '2016-10-21 01:57:30', 'Mencetak dokumen konfirmasi temuan bank.'),
(8, 1, 1, 0, '', '', '2016-10-21 01:58:49', 'Mencetak dokumen konfirmasi temuan bank.'),
(9, 1, 1, 0, '', '', '2016-10-21 01:59:54', 'Mencetak dokumen konfirmasi temuan bank.'),
(10, 1, 1, 0, '', '', '2016-10-21 02:01:09', 'Mencetak dokumen konfirmasi temuan bank.'),
(11, 1, 1, 0, '', '', '2016-10-21 02:01:27', 'Mencetak dokumen konfirmasi temuan bank.'),
(12, 1, 1, 0, '', '', '2016-10-21 02:01:43', 'Mencetak dokumen konfirmasi temuan bank.'),
(13, 1, 1, 0, '', '', '2016-10-21 02:02:14', 'Mencetak dokumen konfirmasi temuan bank.'),
(14, 1, 1, 0, '', '', '2016-10-21 02:02:28', 'Mencetak dokumen konfirmasi temuan bank.'),
(15, 1, 1, 0, '', '', '2016-10-21 02:06:05', 'Mencetak dokumen konfirmasi temuan bank.'),
(16, 1, 1, 0, '', '', '2016-10-21 02:15:00', 'Mencetak dokumen konfirmasi temuan bank.'),
(17, 1, 1, 0, '', '', '2016-10-21 02:20:01', 'Mencetak dokumen tindak lanjut temuan.'),
(18, 1, 1, 0, '', '', '2016-10-21 02:21:57', 'Mencetak dokumen tindak lanjut temuan.'),
(19, 1, 1, 0, '', '', '2016-10-21 02:22:06', 'Mencetak dokumen tindak lanjut temuan.'),
(20, 1, 1, 0, '', '', '2016-10-21 02:22:38', 'Mencetak dokumen tindak lanjut temuan.');

-- --------------------------------------------------------

--
-- Table structure for table `history_perubahan_tanggal_komitmen_bank`
--

CREATE TABLE `history_perubahan_tanggal_komitmen_bank` (
  `id` int(11) NOT NULL,
  `id_pemeriksaan` int(11) NOT NULL,
  `sebelum_perubahan` date NOT NULL,
  `sesudah_perubahan` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_perubahan_tanggal_komitmen_bank`
--

INSERT INTO `history_perubahan_tanggal_komitmen_bank` (`id`, `id_pemeriksaan`, `sebelum_perubahan`, `sesudah_perubahan`, `keterangan`, `id_pengguna`) VALUES
(1, 2, '2016-11-10', '2016-11-30', '', 0),
(2, 9, '0000-00-00', '2016-10-21', '', 1),
(3, 9, '2016-10-21', '2016-11-01', '', 1),
(4, 2, '2016-11-18', '2016-11-18', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_email`
--

CREATE TABLE `jadwal_email` (
  `id` int(11) NOT NULL,
  `jadwal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_email`
--

INSERT INTO `jadwal_email` (`id`, `jadwal`) VALUES
(1, '10:19');

-- --------------------------------------------------------

--
-- Table structure for table `jaringan_bank`
--

CREATE TABLE `jaringan_bank` (
  `id` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `nama_jaringan_bank` varchar(100) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jaringan_bank`
--

INSERT INTO `jaringan_bank` (`id`, `id_bank`, `nama_jaringan_bank`, `alamat`) VALUES
(1, 1, 'HSBC Cabang Surabaya', 'd'),
(2, 2, 'Citibank Bandung', 'asd'),
(3, 3, 'Kantor Pusat', 'asdsd'),
(4, 1, 'Kantor Pusat', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_hasil_pemeriksaan`
--

CREATE TABLE `konfirmasi_hasil_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `temuan` text NOT NULL,
  `dampak_resiko` text NOT NULL COMMENT 'Dampak/Resiko',
  `tanggapan_bank` text NOT NULL COMMENT 'Tanggapan Bank',
  `ref` varchar(255) NOT NULL,
  `status_penyelesaian` enum('Selesai','Dalam Proses','Tidak Tercapai') NOT NULL DEFAULT 'Dalam Proses',
  `tanggal_komitmen_bank` date NOT NULL,
  `keterangan` text NOT NULL,
  `lokasi_temuan` varchar(255) NOT NULL,
  `bidang_temuan` varchar(200) NOT NULL,
  `progress_bank` text NOT NULL,
  `status_temuan` enum('Selesai','Dalam Proses','Tidak Tercapai') NOT NULL DEFAULT 'Dalam Proses',
  `file_progress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi_hasil_pemeriksaan`
--

INSERT INTO `konfirmasi_hasil_pemeriksaan` (`id_pemeriksaan`, `id`, `temuan`, `dampak_resiko`, `tanggapan_bank`, `ref`, `status_penyelesaian`, `tanggal_komitmen_bank`, `keterangan`, `lokasi_temuan`, `bidang_temuan`, `progress_bank`, `status_temuan`, `file_progress`) VALUES
(1, 1, 'Ditemukan CCTV yang  tidak berfungsi.', 'Risiko Operasional', 'Sudah diganti dengan CCTV yang baru.', 'Boho', 'Selesai', '0000-00-00', 'Bank sudah menindaklanjuti', 'Kantor Pusat', 'OPERASIONAL', '', 'Dalam Proses', 'wKGCII2IvK.png'),
(1, 2, 'Terdapat agunan yang perikatannya masih belum sah secara agama.', 'Risiko Kredit', 'Akan dicek kembali', 'M. Fadly', 'Dalam Proses', '2016-11-18', '', 'Kantor Pusat', 'KEBIJAKAN PERKREDITAN', '', 'Selesai', ''),
(1, 3, 'Pencairan kredit tidak sesuai ketentuan.', 'Risiko Kredit', 'Akan diperbaiki', 'Sekar', 'Dalam Proses', '2016-11-20', '', 'KCPPematangsiantar', 'KEBIJAKAN PERKREDITAN', '', 'Dalam Proses', ''),
(1, 4, 'Uang yang tersisa di kasir pada tanggal 15 Oktober 2016 dibawah batas ketentuan yang telah dituangkan di dalam SOP.', 'Risiko Operasional', 'Kontrol supervisor akan ditingkatkan.', 'Sekar, Dito', 'Selesai', '0000-00-00', '', 'Kantor Pusat', 'OPERASIONAL', '', 'Selesai', ''),
(1, 5, 'Tidak terdapat pemisahan tugas antara karyawan yang melakukan pembayaran dan karyawan yang mengambil uang dari tempat penyimpanan uang.', 'Risiko Operasional', 'Telah dilakukan penambahan tenaga khusus untuk mengambil uang dari tempat penyimpanan', 'Dito', 'Selesai', '0000-00-00', '', 'Kantor Pusat', 'OPERASIONAL', '', 'Selesai', ''),
(1, 6, 'Terdapat klausul yang kurang jelas dalam kontrak yang harus ditandatangani oleh calon debitur.', 'Risiko Hukum', 'Kontrak akan diperbaiki.', 'Fadly', 'Dalam Proses', '2016-11-18', '', 'KC Tanah Abang', 'MARKET CONDUCT', '', 'Dalam Proses', ''),
(1, 7, 'Terdapat nasabah yang telah dikinikan data pekerjaannya namun dalamdatabasemasih dicantumkan pekerjaan yang lama. Hal tersebut menunjukkandatabaseyang kurang akurat dalam mencatat informasi terkini nasabah', 'Risiko Kepatuhan', 'Sedang proses melengkapi informasi nasabah termasuk dalam program “data cleansing“.', 'Boho, Sekar', 'Selesai', '0000-00-00', '', 'Kantor Pusat', 'PENERAPAN PROGRAM APU-PPT', '', 'Selesai', ''),
(1, 8, 'Terdapat perangkapan jabatanServicesManagerdenganHead Teller.Perangkapan tersebut berpotensi kurang optimalnya pelaksanaan kontrolyang seharusnya dilakukan olehServicesManagerkarena salah satu tugasServicesManagerdiantaranya adalah melakukancash countsaldohead tellerdansurprise cash countsaldohead teller.', 'Risiko Operasional', 'Bank akan melakukanreviewterhadapketentuan yang menjadi dasar penentuan rangkap jabatan antara posisiServices ManagerdanHead Teller.', 'Fadly,Sekar', 'Dalam Proses', '2016-11-18', '', 'Kantor Pusat', 'STRUKTUR ORGANISASI', '', 'Dalam Proses', ''),
(2, 9, 'Ditemukan CCTV yang  tidak berfungsi.', 'Risiko Operasional', 'Sudah diganti dengan CCTV yang baru.', 'Boho', 'Selesai', '2016-11-01', '', '', 'OPERASIONAL', '', 'Selesai', ''),
(2, 10, 'Terdapat agunan yang perikatannya masih belum sah secara agama.', 'Risiko Kredit', 'Akan dicek kembali', 'M. Fadly', 'Dalam Proses', '2016-11-10', '', '', 'KEBIJAKAN PERKREDITAN', '', 'Dalam Proses', ''),
(2, 11, 'Pencairan kredit tidak sesuai ketentuan.', 'Risiko Kredit', 'Akan diperbaiki', 'Sekar', 'Dalam Proses', '2016-11-20', '', '', 'KEBIJAKAN PERKREDITAN', '', 'Dalam Proses', ''),
(2, 12, 'Uang yang tersisa di kasir pada tanggal 15 Oktober 2016 dibawah batas ketentuan yang telah dituangkan di dalam SOP.', 'Risiko Operasional', 'Kontrol supervisor akan ditingkatkan.', 'Sekar, Dito', 'Selesai', '0000-00-00', '', '', 'OPERASIONAL', '', 'Selesai', ''),
(2, 13, 'Tidak terdapat pemisahan tugas antara karyawan yang melakukan pembayaran dan karyawan yang mengambil uang dari tempat penyimpanan uang.', 'Risiko Operasional', 'Telah dilakukan penambahan tenaga khusus untuk mengambil uang dari tempat penyimpanan', 'Dito', 'Selesai', '0000-00-00', '', '', 'OPERASIONAL', '', 'Selesai', ''),
(2, 14, 'Terdapat klausul yang kurang jelas dalam kontrak yang harus ditandatangani oleh calon debitur.', 'Risiko Hukum', 'Kontrak akan diperbaiki.', 'Fadly', 'Dalam Proses', '2016-11-18', '', '', 'MARKET CONDUCT', '', 'Dalam Proses', ''),
(2, 15, 'Terdapat nasabah yang telah dikinikan data pekerjaannya namun dalamdatabasemasih dicantumkan pekerjaan yang lama. Hal tersebut menunjukkandatabaseyang kurang akurat dalam mencatat informasi terkini nasabah', 'Risiko Kepatuhan', 'Sedang proses melengkapi informasi nasabah termasuk dalam program “data cleansing“.', 'Boho, Sekar', 'Selesai', '0000-00-00', '', '', 'PENERAPAN PROGRAM APU-PPT', '', 'Selesai', ''),
(2, 16, 'Terdapat perangkapan jabatanServicesManagerdenganHead Teller.Perangkapan tersebut berpotensi kurang optimalnya pelaksanaan kontrolyang seharusnya dilakukan olehServicesManagerkarena salah satu tugasServicesManagerdiantaranya adalah melakukancash countsaldohead tellerdansurprise cash countsaldohead teller.', 'Risiko Operasional', 'Bank akan melakukanreviewterhadapketentuan yang menjadi dasar penentuan rangkap jabatan antara posisiServices ManagerdanHead Teller.', 'Fadly,Sekar', 'Dalam Proses', '2016-11-18', '', '', 'STRUKTUR ORGANISASI', '', 'Dalam Proses', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengawas_bank`
--

CREATE TABLE `pengawas_bank` (
  `id` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `hapus` int(11) NOT NULL,
  `lihat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengawas_bank`
--

INSERT INTO `pengawas_bank` (`id`, `id_bank`, `id_pengguna`, `add`, `edit`, `hapus`, `lihat`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 4, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pihak_bank`
--

CREATE TABLE `pihak_bank` (
  `id` bigint(20) NOT NULL,
  `id_pemeriksaan` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pihak_bank`
--

INSERT INTO `pihak_bank` (`id`, `id_pemeriksaan`, `nama`, `jabatan`, `email`) VALUES
(1, 1, 'Dani', 'Direksi', 'dani@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `profil_bank`
--

CREATE TABLE `profil_bank` (
  `id` bigint(20) NOT NULL,
  `kode_bank` varchar(60) NOT NULL,
  `nama_bank` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `profil_pengawas`
--

CREATE TABLE `profil_pengawas` (
  `id` bigint(20) NOT NULL,
  `nip` varchar(60) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL,
  `level` enum('Pengawas','Administrator','Operator IKU') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil_pengawas`
--

INSERT INTO `profil_pengawas` (`id`, `nip`, `nama`, `email`, `username`, `password`, `password_md5`, `status`, `level`) VALUES
(1, 'H02200', 'Boho', 'bohonaibaho@gmail.com', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Aktif', 'Administrator'),
(2, 'H02201', 'Fadly', 'mfadlirumzi@gmail.com', 'fadly', 'fadly', '2d61bf88e0aa417e5949c026af16bc5b', 'Aktif', 'Pengawas'),
(3, 'H02312', 'Sekar', 'sekar@gmail.com', 'sekar', 'sekar', '114148d50080f83b81f26ead2941b69f', 'Aktif', ''),
(4, 'H02315', 'Andriani', 'andriani@gmail.com', 'andri', 'andri', '6bd3108684ccc9dfd40b126877f850b0', 'Aktif', 'Operator IKU'),
(5, 'H02317', 'Dito', 'dito@gmail.com', 'dito', 'dito', 'f6943b8c64042f28124e7c73c62ebde1', 'Aktif', 'Pengawas');

-- --------------------------------------------------------

--
-- Table structure for table `risiko_bank`
--

CREATE TABLE `risiko_bank` (
  `id` int(11) NOT NULL,
  `risiko` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `risiko_bank`
--

INSERT INTO `risiko_bank` (`id`, `risiko`) VALUES
(1, 'Risiko Pasar'),
(2, 'Risiko Kredit'),
(3, 'Risiko Likuiditas'),
(4, 'Risiko Hukum'),
(5, 'Risiko Kepatuhan'),
(6, 'Risiko Strategik'),
(7, 'Risiko Operasional'),
(8, 'Risiko Reputasi');

-- --------------------------------------------------------

--
-- Table structure for table `status_kirim_hari_ini`
--

CREATE TABLE `status_kirim_hari_ini` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kirim_hari_ini`
--

INSERT INTO `status_kirim_hari_ini` (`id`, `status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_konfirmasi_hasil_pemeriksaan`
--

CREATE TABLE `temp_konfirmasi_hasil_pemeriksaan` (
  `id_pemeriksaan` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `temuan` text NOT NULL,
  `dampak_resiko` text NOT NULL COMMENT 'Dampak/Resiko',
  `tanggapan_bank` text NOT NULL COMMENT 'Tanggapan Bank',
  `ref` varchar(255) NOT NULL,
  `status_penyelesaian` varchar(100) NOT NULL DEFAULT 'Dalam Proses',
  `tanggal_komitmen_bank` date NOT NULL,
  `keterangan` text NOT NULL,
  `lokasi_temuan` text NOT NULL,
  `bidang_temuan` varchar(200) NOT NULL,
  `status_temuan` enum('Selesai','Dalam Proses','Tidak Tercapai') NOT NULL DEFAULT 'Dalam Proses',
  `periode_pemantauan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tim_pemeriksa`
--

CREATE TABLE `tim_pemeriksa` (
  `id` int(255) NOT NULL,
  `id_pengawas` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `pemeriksaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tim_pemeriksa`
--

INSERT INTO `tim_pemeriksa` (`id`, `id_pengawas`, `email`, `jabatan`, `pemeriksaan`) VALUES
(1, '4', '', 'Anggota', 1),
(2, '1', '', 'Ketua', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_perubahan_data`
--
ALTER TABLE `history_perubahan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_perubahan_tanggal_komitmen_bank`
--
ALTER TABLE `history_perubahan_tanggal_komitmen_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_email`
--
ALTER TABLE `jadwal_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jaringan_bank`
--
ALTER TABLE `jaringan_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konfirmasi_hasil_pemeriksaan`
--
ALTER TABLE `konfirmasi_hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengawas_bank`
--
ALTER TABLE `pengawas_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pihak_bank`
--
ALTER TABLE `pihak_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_bank`
--
ALTER TABLE `profil_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profil_pengawas`
--
ALTER TABLE `profil_pengawas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `risiko_bank`
--
ALTER TABLE `risiko_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kirim_hari_ini`
--
ALTER TABLE `status_kirim_hari_ini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_konfirmasi_hasil_pemeriksaan`
--
ALTER TABLE `temp_konfirmasi_hasil_pemeriksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim_pemeriksa`
--
ALTER TABLE `tim_pemeriksa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hasil_pemeriksaan`
--
ALTER TABLE `hasil_pemeriksaan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history_perubahan_data`
--
ALTER TABLE `history_perubahan_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `history_perubahan_tanggal_komitmen_bank`
--
ALTER TABLE `history_perubahan_tanggal_komitmen_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal_email`
--
ALTER TABLE `jadwal_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jaringan_bank`
--
ALTER TABLE `jaringan_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konfirmasi_hasil_pemeriksaan`
--
ALTER TABLE `konfirmasi_hasil_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pengawas_bank`
--
ALTER TABLE `pengawas_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pihak_bank`
--
ALTER TABLE `pihak_bank`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `profil_bank`
--
ALTER TABLE `profil_bank`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `profil_pengawas`
--
ALTER TABLE `profil_pengawas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `risiko_bank`
--
ALTER TABLE `risiko_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `status_kirim_hari_ini`
--
ALTER TABLE `status_kirim_hari_ini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `temp_konfirmasi_hasil_pemeriksaan`
--
ALTER TABLE `temp_konfirmasi_hasil_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tim_pemeriksa`
--
ALTER TABLE `tim_pemeriksa`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
