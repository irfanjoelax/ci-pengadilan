-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 18, 2022 at 05:49 AM
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
  `tujuan_kepolisian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijin_geledah`
--

INSERT INTO `ijin_geledah` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `menimbang`, `menetapkan`, `tgl_ditetapkan`, `nama_ketua`, `nip`, `status`, `file`, `tujuan_kepolisian`) VALUES
(1, '06/PHS/2022 Tnn', 'Westham Sneijder', 'Paris', 29, '2022-10-17', 'Laki-Laki', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', 'Membaca surat permohonan penyidik Nomor: ', 'Menimbang, bahwa berdasarkan laporan dari Penyidik', 'Memberikan persetujuan penggeledahan', '2022-10-17', 'Nova Loura Sasube, S.H., M.H.', '19700128 199703 1 001', 'SELESAI', 'Ijin_Geledah.pdf', 'kepolisian_tomohon');

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
  `tujuan_kepolisian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijin_penahanan`
--

INSERT INTO `ijin_penahanan` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `menimbang`, `menetapkan`, `tgl_ditetapkan`, `nama_ketua`, `nip`, `status`, `file`, `tujuan_kepolisian`) VALUES
(1, '05/PHS/2022 Tnn', 'Paul Gilberts', 'San fransisko', 38, '2022-10-17', 'Laki-Laki', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', 'Membaca surat permohonan perpanjangan masa tahanan dari Penyidik                          RESOR MINAHASA Nomor : ………  tanggal   ……… atas nama Tersangka:', 'Tersangka ditahan dalam tahanan Rutan masing-masing oleh:\r\n1. Penyidik sejak tanggal ……… sampai dengan  tanggal ………; \r\n2. Perpanjangan Penuntut Umum sejak ……………… sampai dengan  tanggal ………;\r\n\r\n\r\nMenimbang, bahwa Tersangka telah disangka melakukan tindak pidana sebagaimana diatur dalam Pasal ………...\r\n\r\nMenimbang, bahwa untuk kepentingan penyidikan perlu memperpanjang masa tahanan Tersangka tersebut di atas;\r\n\r\nMemperhatikan ………   tentang Hukum Acara Pidana;\r\n', '1. Memperpanjang masa tahanan Tersangka ………dalam tahanan ……… paling lama ………, dihitung sejak tanggal  ……… s/d tanggal ………;\r\n\r\n2. Memerintahkan agar salinan penetapan ini segera disampaikan kepada Tersangka dan keluarganya.\r\n', '2022-10-17', 'ERENST JANNES ULAEN, S.H., M.H.', '19700128 199703 1 001', 'SELESAI', 'Ijin_Geledah.pdf', 'kepolisian_tomohon');

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
  `tujuan_kepolisian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ijin_sita`
--

INSERT INTO `ijin_sita` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `menimbang`, `menetapkan`, `tgl_ditetapkan`, `nama_ketua`, `nip`, `status`, `file`, `tujuan_kepolisian`) VALUES
(1, '04/PHS/2022 Tnn', 'Albert Widum', 'Westalis', 35, '2022-10-17', 'Laki-Laki', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', '<div xss=removed>Membaca surat permohonan Penyidik RESOR MINAHASA Nomor <span xss=removed> 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</span></div>', '<div xss=\"removed\"><div xss=\"removed\"><span xss=\"removed\">Menimbang, bahwa berdasarkan laporan dari Penyidik </span><span lang=\"EN-US\" xss=\"removed\">……… nomor</span><span lang=\"id\" xss=\"removed\"> </span><span lang=\"EN-US\" xss=\"removed\">……………………………</span><span lang=\"EN-US\" xss=\"removed\"> </span><span lang=\"id\" xss=\"removed\"><span xss=\"removed\">tanggal</span><span xss=\"removed\"> </span></span><span lang=\"EN-US\" xss=\"removed\">…….</span><span lang=\"EN-US\" xss=\"removed\">\r\n</span><span lang=\"id\" xss=\"removed\"><span xss=\"removed\">telah</span><span xss=\"removed\">  </span><span xss=\"removed\">dilakukan</span><span xss=\"removed\"> </span><span xss=\"removed\">penyitaan</span><span xss=\"removed\"> </span><span xss=\"removed\">dengan</span><span xss=\"removed\"> </span><span xss=\"removed\">alasan</span><span xss=\"removed\"> </span><span xss=\"removed\">keadaan</span><span xss=\"removed\">\r\n</span><span xss=\"removed\">yang</span><span xss=\"removed\"> </span><span xss=\"removed\">sangat</span><span xss=\"removed\"> </span><span xss=\"removed\">perlu</span><span xss=\"removed\">\r\n</span><span xss=\"removed\">dan</span><span xss=\"removed\"> </span><span xss=\"removed\">mendesak;</span></span></div></div><span xss=\"removed\">\r\n\r\n</span><p class=\"MsoBodyText\" xss=\"removed\"><br></p><p class=\"MsoNormal\" xss=\"removed\"><span lang=\"id\" xss=\"removed\"><o></o></span></p>', '<div xss=removed>Memberi persetujuan penyitaan <span xss=removed>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</span></div>', '2022-10-17', 'Nova Loura Sasube, S.H., M.H.', '19731125 199903 2 003', 'SELESAI', '<p>The upload path does not appear to be valid.</p>', 'kepolisian_minahasa_tenggara');

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
  `tujuan_lapas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penahanan_hakim`
--

INSERT INTO `penahanan_hakim` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `menimbang`, `menetapkan`, `tgl_ditetapkan`, `hakim_ketua`, `hakim_satu`, `hakim_dua`, `file`, `status`, `tujuan_lapas`) VALUES
(1, '03/PHS/2022 Tnn', 'Putri Elon Musk', 'Colorado', 34, '2022-10-16', 'Perempuan', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', '<ol><li xss=removed><span xss=\"removed\">t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'</span></li><li><div xss=removed>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div><div xss=removed><br></div></li></ol>', 'Menimbang, bahwa terdakwa telah didakwa melakukan tindak pidana sebagaimana diatur dalam Pasal ', '<ol><li xss=removed><span xss=\"removed\">t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\'</span></li><li xss=removed><span xss=\"removed\">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span></li></ol>', '2022-10-16', 'Nova Laura Sasube, S.H., M.H.', 'Nur Dewi Sundari, S.H.', 'Dominggus Adrian Puturuhu, S.H., M.H.', '<p>You did not select a file to upload.</p>', 'TERVALIDASI', 'lapas_tomohon');

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
  `tujuan_lapas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penahanan_kpn`
--

INSERT INTO `penahanan_kpn` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `menimbang`, `menetapkan`, `tgl_ditetapkan`, `nama_ketua`, `file`, `status`, `tujuan_kejaksaan`, `tujuan_lapas`) VALUES
(1, '04/PHS/2022 Tnn', 'Paul John', 'Washington', 44, '2022-10-17', 'Laki-Laki', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', '<p xss=removed>Terdakwa ditahan dalam Tahanan Rutan Lapas</p><ol><li><span xss=removed>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></li><li><span xss=removed>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</span><span xss=removed><br><div xss=removed><br></div></span></li></ol>', 'Menimbang, bahwa terdakwa telah didakwa melakukan tindak pidana sebagaimana diatur dalam Pasal ', '<ol><li><span xss=removed><div></div></span></li><li><span xss=removed>t has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span></li><li><span xss=removed>Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</span></li></ol>', '2022-10-17', 'Nova Loura Sasube, S.H., M.H.', 'Pen__Ketua_PN3.pdf', 'SELESAI', 'kejaksaan_minahasa', 'lapas_minahasa');

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
  `tujuan_hs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penetapan_hs`
--

INSERT INTO `penetapan_hs` (`id_hs`, `no_perkara`, `nama_terdakwa`, `membaca`, `tgl_menetapkan`, `wkt_menetapkan`, `tgl_ditetapkan`, `nama_hakim`, `file_hs`, `status_hs`, `tujuan_hs`) VALUES
(3, '01/PHS/2022 Tnn', 'John Doe', '<ol><li xss=removed><span xss=\"removed\">The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></li><li><div xss=removed>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable</div><br></li></ol>', '2022-10-01', '10:00:00', '2022-10-15', 'Dewi Noor Alida, S.H., M.H.', 'Pen_Hari_Sidang.pdf', 'SELESAI', 'kejaksaan_minahasa'),
(4, '02/PHS/2022 Tnn', 'David Cooperfile', '<ol><li xss=removed>The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</li><li xss=removed>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable<br></li></ol>', '2022-09-30', '15:08:00', '2022-10-14', 'Dewi Noor Alida, S.H., M.H.', 'catatan.docx', 'SELESAI', 'kejaksaan_minahasa_selatan');

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
  `tujuan_lapas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petikan_putusan`
--

INSERT INTO `petikan_putusan` (`id`, `no_perkara`, `nama`, `tempat_lahir`, `umur`, `tgl_lahir`, `kelamin`, `kebangsaan`, `tempat_tinggal`, `agama`, `pekerjaan`, `membaca`, `mengingat`, `mengadili`, `tgl_ditetapkan`, `hakim_ketua`, `hakim_satu`, `hakim_dua`, `panitera_pengganti`, `status`, `file`, `tujuan_kejaksaan`, `tujuan_lapas`) VALUES
(1, '06/PHS/2022 Tnn', 'Sherlock Holmes', 'Britania', 33, '2022-10-18', 'Laki-Laki', 'Indonesia', 'Jalan Las Vegas', 'None', 'Wirausaha', '1. Penyidik tidak dilakukan Penahanan  ', 'mengingat, bahwa terdakwa telah didakwa melakukan tindak pidana sebagaimana diatur dalam Pasal ', '', '2022-10-18', 'Nova Laura Sasube, S.H., M.H.', 'Nur Dewi Sundari, S.H.', 'Dominggus Adrian Puturuhu, S.H., M.H.', 'Rietha V. Karouw, S.H.', 'SELESAI', 'PETIKAN_PUTUSAN1.doc', 'kejaksaan_tomohon', 'lapas_tomohon');

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
  MODIFY `id_hs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
