-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 06, 2023 at 07:35 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_pengadilan`
--

-- --------------------------------------------------------

--
-- Table structure for table `ijin_geledah`
--

CREATE TABLE `ijin_geledah` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `membaca` longtext,
  `menimbang` longtext,
  `menetapkan` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `nama_ketua` varchar(150) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `tujuan_kepolisian` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ijin_penahanan`
--

CREATE TABLE `ijin_penahanan` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `membaca` longtext,
  `menimbang` longtext,
  `menetapkan` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `nama_ketua` varchar(150) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `tujuan_kepolisian` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ijin_sita`
--

CREATE TABLE `ijin_sita` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `membaca` longtext,
  `menimbang` longtext,
  `menetapkan` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `nama_ketua` varchar(150) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `tujuan_kepolisian` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penahanan_hakim`
--

CREATE TABLE `penahanan_hakim` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `membaca` longtext,
  `menimbang` longtext,
  `menetapkan` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `hakim_ketua` varchar(150) DEFAULT NULL,
  `hakim_satu` varchar(150) DEFAULT NULL,
  `hakim_dua` varchar(150) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tujuan_kejaksaan` varchar(50) DEFAULT NULL,
  `tujuan_lapas` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penahanan_kpn`
--

CREATE TABLE `penahanan_kpn` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(250) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `membaca` longtext,
  `menimbang` longtext,
  `menetapkan` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `nama_ketua` varchar(150) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `tujuan_kejaksaan` varchar(50) DEFAULT NULL,
  `tujuan_lapas` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penetapan_hs`
--

CREATE TABLE `penetapan_hs` (
  `id_hs` int(11) NOT NULL,
  `no_perkara` varchar(150) DEFAULT NULL,
  `nama_terdakwa` varchar(200) DEFAULT NULL,
  `membaca` longtext,
  `tgl_menetapkan` date DEFAULT NULL,
  `wkt_menetapkan` time DEFAULT NULL,
  `tgl_ditetapkan` date DEFAULT NULL,
  `nama_hakim` varchar(200) DEFAULT NULL,
  `file_hs` varchar(250) DEFAULT NULL,
  `status_hs` varchar(50) DEFAULT NULL,
  `tujuan_hs` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `petikan_putusan`
--

CREATE TABLE `petikan_putusan` (
  `id` int(11) NOT NULL,
  `no_perkara` varchar(50) DEFAULT NULL,
  `nama` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `umur` int(11) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `kelamin` varchar(50) DEFAULT NULL,
  `kebangsaan` varchar(50) DEFAULT NULL,
  `tempat_tinggal` text,
  `agama` varchar(50) DEFAULT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `membaca` longtext,
  `mengingat` longtext,
  `mengadili` longtext,
  `tgl_ditetapkan` date DEFAULT NULL,
  `hakim_ketua` varchar(150) DEFAULT NULL,
  `hakim_satu` varchar(150) DEFAULT NULL,
  `hakim_dua` varchar(150) DEFAULT NULL,
  `panitera_pengganti` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `file` varchar(250) DEFAULT NULL,
  `tujuan_kejaksaan` varchar(50) DEFAULT NULL,
  `tujuan_lapas` varchar(50) DEFAULT NULL,
  `waktu_tunggu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname_user` varchar(250) DEFAULT NULL,
  `name_user` varchar(100) DEFAULT NULL,
  `pass_user` varchar(250) DEFAULT NULL,
  `level_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname_user`, `name_user`, `pass_user`, `level_user`) VALUES
(1, 'Pengadilan Negeri Tondano', 'PNTondano', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin'),
(3, 'Ketua PN', 'KetuaPN', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ketua_pn'),
(4, 'Kejaksaan Minahasa', 'K-Minahasa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kejaksaan_minahasa'),
(5, 'Majelis Hakim', 'MH', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'majelis_hakim'),
(6, 'Panitera Pengganti', 'PP', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'panitera_pengganti'),
(7, 'Kejaksaan Minahasa Selatan', 'K-Minsel', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kejaksaan_minahasa_selatan'),
(8, 'Kejaksaan Tomohon', 'K-Tomohon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kejaksaan_tomohon'),
(9, 'Lapas Minahasa', 'LP-Minahasa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lapas_minahasa'),
(10, 'Lapas Tomohon', 'LP-Tomohon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lapas_tomohon'),
(11, 'Rutan Minahasa Selatan', 'Rutan-Minsel', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'rutan_minahasa_selatan'),
(12, 'Kepolisian Minahasa', 'KP-Minahasa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kepolisian_minahasa'),
(13, 'Kepolisian Tomohon', 'KP-Tomohon', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kepolisian_tomohon'),
(14, 'Kepolisian Minahasa Tenggara', 'KP-Mitra', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kepolisian_minahasa_tenggara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ijin_geledah`
--
ALTER TABLE `ijin_geledah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijin_penahanan`
--
ALTER TABLE `ijin_penahanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ijin_sita`
--
ALTER TABLE `ijin_sita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penahanan_hakim`
--
ALTER TABLE `penahanan_hakim`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penahanan_kpn`
--
ALTER TABLE `penahanan_kpn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penetapan_hs`
--
ALTER TABLE `penetapan_hs`
  ADD PRIMARY KEY (`id_hs`);

--
-- Indexes for table `petikan_putusan`
--
ALTER TABLE `petikan_putusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ijin_geledah`
--
ALTER TABLE `ijin_geledah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ijin_penahanan`
--
ALTER TABLE `ijin_penahanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ijin_sita`
--
ALTER TABLE `ijin_sita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penahanan_hakim`
--
ALTER TABLE `penahanan_hakim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penahanan_kpn`
--
ALTER TABLE `penahanan_kpn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penetapan_hs`
--
ALTER TABLE `penetapan_hs`
  MODIFY `id_hs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petikan_putusan`
--
ALTER TABLE `petikan_putusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
