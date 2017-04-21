-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 02 Mar 2017 pada 06.35
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simyan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_masuk`
--

CREATE TABLE `berkas_masuk` (
  `id` bigint(20) NOT NULL,
  `skpd` int(11) NOT NULL,
  `nomor_berkas` varchar(255) NOT NULL,
  `nomor_spm` varchar(255) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `alur_berkas` varchar(100) NOT NULL,
  `jenis_berkas` int(11) NOT NULL,
  `riwayat_berkas_terakhir` bigint(20) NOT NULL DEFAULT '0',
  `status_berkas` int(11) NOT NULL DEFAULT '1' COMMENT '1 lanjut, -1 dibatalkan, 0 ditunda,4 selesai',
  `tgl_dokumen_selesai` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas_masuk`
--

INSERT INTO `berkas_masuk` (`id`, `skpd`, `nomor_berkas`, `nomor_spm`, `tanggal_masuk`, `penerima`, `keterangan`, `alur_berkas`, `jenis_berkas`, `riwayat_berkas_terakhir`, `status_berkas`, `tgl_dokumen_selesai`) VALUES
(50, 17, 'REG-2016-11-0001', '001/SPM-GU/01.01.02.05/2016', '2016-11-18 01:34:00', '3', 'dari Badan Ketahanan Pangan', '', 2, 135, 1, '0000-00-00'),
(51, 14, 'REG-2016-11-0002', '004/SPM-GU/01.03.01.01/2016', '2016-11-18 01:35:00', '3', 'dari BKPP', '', 9, 136, 1, '0000-00-00'),
(52, 20, 'REG-2016-11-0003', '003/SPM-GU/01.03.01.41/2016', '2016-11-18 01:36:00', '2', 'dari BPM', '', 6, 138, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_masuk`
--

CREATE TABLE `file_masuk` (
  `id` bigint(20) NOT NULL,
  `id_berkas` bigint(20) NOT NULL,
  `nama_dokumen` varchar(200) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_berkas`
--

CREATE TABLE `jenis_berkas` (
  `id` int(11) NOT NULL,
  `jenis_berkas` varchar(255) NOT NULL,
  `durasi_urgent` int(11) NOT NULL COMMENT 'dalam menit'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_berkas`
--

INSERT INTO `jenis_berkas` (`id`, `jenis_berkas`, `durasi_urgent`) VALUES
(1, 'SPM-UP', 26),
(2, 'SPM-GU', 75),
(3, 'SPM-TU', 46),
(4, 'SPM-LS Gaji', 31),
(5, 'SPM-LS Bendahara', 68),
(6, 'SPM-LS Barang Jasa', 74),
(7, 'SPM-LS Hibah/Bantuan', 31),
(8, 'SPM-LS Pembiayaan', 26),
(9, 'SPM-GU/TU Nihil', 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_alur_berkas`
--

CREATE TABLE `riwayat_alur_berkas` (
  `id` bigint(20) NOT NULL,
  `id_berkas` bigint(20) NOT NULL,
  `posisi_berkas` enum('Akuntansi','Perbendaharaan','Sekretariat','Kepala Dinas') NOT NULL,
  `tanggal_diterima` datetime NOT NULL,
  `tanggal_dikirimkan` datetime NOT NULL,
  `penerima` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 terima,0 belum diterima,-1 ditolak,2 lanjut, 3 disposisi,4 dokumen selesai, 5 dokumen ditandatangani, 6 dokumen selesai',
  `tanggal_disposisi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_alur_berkas`
--

INSERT INTO `riwayat_alur_berkas` (`id`, `id_berkas`, `posisi_berkas`, `tanggal_diterima`, `tanggal_dikirimkan`, `penerima`, `pengirim`, `keterangan`, `status`, `tanggal_disposisi`) VALUES
(132, 52, 'Akuntansi', '2016-11-18 01:38:07', '2016-11-18 01:36:56', 3, 5, 'dari sekre', 3, '2016-11-18 01:43:24'),
(133, 51, 'Akuntansi', '2016-11-18 01:38:06', '2016-11-18 01:37:12', 3, 5, 'dari sekre', 3, '2016-11-18 01:43:15'),
(134, 50, 'Akuntansi', '2016-11-18 01:38:02', '2016-11-18 01:37:28', 3, 5, 'dari sekre', 3, '2016-11-18 01:43:05'),
(135, 50, 'Perbendaharaan', '2016-11-18 01:45:56', '2016-11-18 01:43:04', 2, 3, 'dari akuntansi', 1, '0000-00-00 00:00:00'),
(136, 51, 'Perbendaharaan', '2016-11-18 01:45:54', '2016-11-18 01:43:15', 2, 3, 'dari akuntansi', 1, '0000-00-00 00:00:00'),
(137, 52, 'Perbendaharaan', '2016-11-18 01:45:50', '2016-11-18 01:43:24', 2, 3, 'dari akuntansi', 3, '2016-11-18 01:46:17'),
(138, 52, 'Kepala Dinas', '2016-11-18 01:46:17', '2016-11-18 01:46:17', 0, 2, 'dari perben', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_proses_dibatalkan`
--

CREATE TABLE `riwayat_proses_dibatalkan` (
  `id` bigint(20) NOT NULL,
  `id_berkas` bigint(20) NOT NULL,
  `tanggal_dibatalkan` datetime NOT NULL,
  `keterangan` text NOT NULL,
  `pemeriksa` int(11) NOT NULL,
  `id_alur_berkas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skpd`
--

CREATE TABLE `skpd` (
  `id` int(11) NOT NULL,
  `skpd` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skpd`
--

INSERT INTO `skpd` (`id`, `skpd`) VALUES
(1, 'Dinas Pendidikan'),
(2, 'Dinas Kependudukan dan Catatan Sipil'),
(3, 'Dinas Tata Ruang, Perumahan, dan Pemukiman'),
(4, 'Dinas Sosial dan Tenaga Kerja'),
(5, 'Dinas Pertanian'),
(6, 'Dinas Perindustrian dan Perdagangan'),
(7, 'Dinas Perhubungan, Komunikasi dan Informatika'),
(8, 'Dinas Pendapatan'),
(9, 'Dinas Kesehatan'),
(10, 'Dinas Kebersihan'),
(11, 'Dinas Kebudayaan, Pariwisata, Pemuda dan Olahraga'),
(12, 'Dinas Bina Marga'),
(13, 'Inspektorat'),
(14, ' Badan Kepegawaian, Pendidikan dan Pelatihan'),
(15, 'Badan Perencanaan Pembangunan Daerah'),
(16, 'Badan Kesatuan Bangsa, Politik dan Perlindungan Masyarakat'),
(17, 'Badan Ketahanan Pangan'),
(18, 'Badan Lingkungan Hidup'),
(19, 'Badan Pelayanan Perizinan Terpadu'),
(20, 'Badan Pemberdayaan Masyarakat'),
(21, 'Badan Pemberdayaan Perempuan dan KB'),
(22, 'Badan Penanaman Modal Dan Promosi'),
(23, 'Badan Penelitian Pengembangan Statistik'),
(24, 'Bagian Administrasi Kesejahteraan Rakyat'),
(25, 'Bagian Adminitrasi Pemerintahan Umum'),
(26, 'Bagian Administrasi Kemasyarakatan'),
(27, 'Bagian Administrasi Perekonomian'),
(28, 'Bagian Administrasi Umum dan Perlengkapan'),
(29, 'Bagian Hukum dan PUU'),
(30, 'Bagian Administrasi Pembangunan'),
(31, 'Bagian Keuangan dan Aset'),
(32, 'Bagian Organisasi dan Tata Laksana'),
(33, 'Bagian Humas dan Protokoler'),
(34, 'Kantor Pemadam Kebakaran'),
(35, 'Kantor Perpustakaan'),
(36, 'Kantor Siantar Barat'),
(37, 'Kantor Siantar Marihat'),
(38, 'Kantor Siantar Selatan'),
(39, 'Kantor Siantar Utara'),
(40, 'Kantor Siantar Timur'),
(41, 'Kantor Siantar Sitalasari'),
(42, 'Kantor Siantar Martoba'),
(43, 'Kantor Siantar Marimbun'),
(44, 'Kantor Satpol PP'),
(45, 'RSUD'),
(46, 'Sekretariat DPRD'),
(47, 'Badan Penanggulangan Bencana Daerah'),
(48, 'Dinas Koperasi dan Usaha Kecil dan Menengah'),
(49, 'Kepala Daerah dan Wakil Kepala Daerah'),
(50, 'Dewan Perwakilan Rakyat Daerah'),
(51, 'Dinas Pendapatan, Pengelolaan Keuangan dan Aset Daerah'),
(52, 'Sekretariat Daerah'),
(53, 'Sekretariat Dewan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_berkas`
--

CREATE TABLE `status_berkas` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_berkas`
--

INSERT INTO `status_berkas` (`id`, `status`) VALUES
(-1, 'dibatalkan'),
(0, 'ditunda'),
(1, 'lanjut'),
(4, 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(20) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_md5` varchar(255) NOT NULL,
  `level` enum('Administrator','Sekretariat','Akuntansi','Perbendaharaan','Kepala Dinas') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama_pengguna`, `nip`, `email`, `no_telp`, `username`, `password`, `password_md5`, `level`, `status`) VALUES
(1, 'Administrator', '12312', 'leo.silaen@gmail.com', '13123123', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'Aktif'),
(2, 'jacky', '14332434', 'jacky@gmail.com', '13123123', 'jacky', 'jacky', '9661fd65249b026ebea0f49927e82f0e', 'Perbendaharaan', 'Aktif'),
(3, 'akuntansi', '113123123', 'akuntansi', '13123123', 'akuntansi', 'akuntansi', '1139f90d50ba3bb7ff4b2602ad03aa26', 'Akuntansi', 'Aktif'),
(4, 'bendahara', 'bendahara', 'bendahara', '13123123', 'bendahara', 'bendahara', 'c9ccd7f3c1145515a9d3f7415d5bcbea', 'Perbendaharaan', 'Aktif'),
(5, 'sekretariat', 'sekretariat', 'sekretariat', '13123123', 'sekretariat', 'sekretariat', '593277eb017ecbe3d5bc8e552d68ff53', 'Sekretariat', 'Aktif'),
(6, 'Tami', '123', 'asd@gmail.com', '0622', 'kadis', 'kadis', 'f984fbd6a856851e26cb3109fba5411f', 'Kepala Dinas', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_masuk`
--
ALTER TABLE `berkas_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_masuk`
--
ALTER TABLE `file_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_berkas`
--
ALTER TABLE `jenis_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_alur_berkas`
--
ALTER TABLE `riwayat_alur_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_proses_dibatalkan`
--
ALTER TABLE `riwayat_proses_dibatalkan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skpd`
--
ALTER TABLE `skpd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_berkas`
--
ALTER TABLE `status_berkas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_masuk`
--
ALTER TABLE `berkas_masuk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `file_masuk`
--
ALTER TABLE `file_masuk`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jenis_berkas`
--
ALTER TABLE `jenis_berkas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `riwayat_alur_berkas`
--
ALTER TABLE `riwayat_alur_berkas`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;
--
-- AUTO_INCREMENT for table `riwayat_proses_dibatalkan`
--
ALTER TABLE `riwayat_proses_dibatalkan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skpd`
--
ALTER TABLE `skpd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
