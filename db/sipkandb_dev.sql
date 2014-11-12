-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2013 at 11:33 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipkandb_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `r_agama`
--

CREATE TABLE IF NOT EXISTS `r_agama` (
  `kd_agama` int(1) NOT NULL AUTO_INCREMENT,
  `agama` varchar(10) NOT NULL,
  PRIMARY KEY (`kd_agama`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `r_agama`
--

INSERT INTO `r_agama` (`kd_agama`, `agama`) VALUES
(1, 'ISLAM'),
(2, 'PROTESTAN'),
(3, 'KATOLIK'),
(4, 'HINDU'),
(5, 'BUDHA'),
(6, 'KONGHUCHU');

-- --------------------------------------------------------

--
-- Table structure for table `r_grup_akses`
--

CREATE TABLE IF NOT EXISTS `r_grup_akses` (
  `kd_akses` int(2) NOT NULL AUTO_INCREMENT,
  `nm_akses` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_akses`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `r_grup_akses`
--

INSERT INTO `r_grup_akses` (`kd_akses`, `nm_akses`) VALUES
(1, 'Melihat Statistik Perkara di Halaman Utama'),
(2, 'Melihat Agenda di Halaman Utama'),
(3, 'Melihat Data Perkara'),
(4, 'Menambah Berkas SPDP'),
(5, 'Menambah Berkas Penuntutan'),
(6, 'Melihat Berkas SPDP'),
(7, 'Kelola Berkas SPDP'),
(8, 'Ubah Tanggal Masuk SPDP'),
(9, 'Melihat Berkas P-16');

-- --------------------------------------------------------

--
-- Table structure for table `r_jabatan`
--

CREATE TABLE IF NOT EXISTS `r_jabatan` (
  `kd_jabatan` int(1) NOT NULL AUTO_INCREMENT,
  `nm_jabatan` varchar(30) NOT NULL,
  `hak_akses` varchar(50) NOT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `r_jabatan`
--

INSERT INTO `r_jabatan` (`kd_jabatan`, `nm_jabatan`, `hak_akses`) VALUES
(1, 'KASI INTEL', ''),
(2, 'KASI DATUN', ''),
(3, 'KASI PIDANA KHUSUS', ''),
(4, 'KASI PIDANA UMUM', ''),
(5, 'KASUBAGBIN', ''),
(6, 'JAKSA FUNGSIONAL PIDUM', ''),
(7, 'JAKSA FUNGSIONAL PIDSUS', ''),
(8, 'JAKSA FUNGSIONAL INTEL', ''),
(9, 'JAKSA FUNGSIONAL DATUN', ''),
(10, 'TATA USAHA PEMBINAAN', ''),
(11, 'TATA USAHA INTEL', ''),
(12, 'TATA USAHA PIDSUS', ''),
(13, 'TATA USAHA DATUN', ''),
(14, 'HONORER', '');

-- --------------------------------------------------------

--
-- Table structure for table `r_jenis_pidana`
--

CREATE TABLE IF NOT EXISTS `r_jenis_pidana` (
  `kd_pidana` int(1) NOT NULL AUTO_INCREMENT,
  `jns_pidana` varchar(5) NOT NULL,
  PRIMARY KEY (`kd_pidana`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `r_jenis_pidana`
--

INSERT INTO `r_jenis_pidana` (`kd_pidana`, `jns_pidana`) VALUES
(1, 'Ep.1'),
(2, 'Epp.1'),
(3, 'Euh.1');

-- --------------------------------------------------------

--
-- Table structure for table `r_kesatuan`
--

CREATE TABLE IF NOT EXISTS `r_kesatuan` (
  `kd_kesatuan` int(1) NOT NULL AUTO_INCREMENT,
  `nm_kesatuan` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kd_kesatuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `r_kesatuan`
--

INSERT INTO `r_kesatuan` (`kd_kesatuan`, `nm_kesatuan`) VALUES
(1, 'Polda Jatim'),
(2, 'Polrestabes Surabaya'),
(3, 'Polres Pelabuhan Tan'),
(4, 'Polsekta Simokerto'),
(5, 'Polsekta Kenjeran'),
(6, 'Polsekta Tambaksari'),
(7, 'Polsekta Sukolilo'),
(8, 'Polsekta Rungkut'),
(9, 'Polsekta Gubeng'),
(10, 'Polsekta Tenggilis M'),
(11, 'Polsekta Pabean Cant'),
(12, 'Polsekta Krembangan'),
(13, 'Polsekta Semampir'),
(14, 'Polsekta Tandes'),
(15, 'Polsekta Bubutan'),
(16, 'Polsekta Benowo'),
(17, 'Polsekta Wonokromo'),
(18, 'Polsekta Wonocolo'),
(19, 'Polsekta Sawahan'),
(20, 'Polsekta Tegalsari'),
(21, 'Polsekta Genteng'),
(22, 'Polsekta Lakarsantri'),
(23, 'Polsekta Gayungan'),
(24, 'Polsekta Karang Pilang'),
(25, 'Polsekta KP3 Tanjung'),
(26, 'Polwil Surabaya'),
(27, 'Polsekta Jambangan'),
(28, 'Polsekta wiyung'),
(29, 'Polsekta mulyorejo'),
(30, 'Polsek Dukuh Pakis');

-- --------------------------------------------------------

--
-- Table structure for table `r_pangkat`
--

CREATE TABLE IF NOT EXISTS `r_pangkat` (
  `kd_pangkat` int(1) NOT NULL AUTO_INCREMENT,
  `jns_pangkat` enum('jaksa','polisi') NOT NULL,
  `nm_pangkat` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kd_pangkat`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `r_pangkat`
--

INSERT INTO `r_pangkat` (`kd_pangkat`, `jns_pangkat`, `nm_pangkat`) VALUES
(1, 'jaksa', 'AJUN JAKSA MADYA'),
(2, 'jaksa', 'AJUN JAKSA'),
(3, 'jaksa', 'JAKSA PRATAMA'),
(4, 'jaksa', 'JAKSA MUDA'),
(5, 'jaksa', 'JAKSA MADYA'),
(6, 'jaksa', 'JAKSA UTAMA PRATAMA'),
(7, 'jaksa', 'JAKSA UTAMA MUDA'),
(8, 'jaksa', 'JAKSA UTAMA MADYA'),
(9, 'jaksa', 'JAKSA UTAMA'),
(10, 'polisi', 'ajun brigadir polisi'),
(11, 'polisi', 'ajun brigadir polisi satu'),
(12, 'polisi', 'ajun brigadir polisi dua'),
(13, 'polisi', 'bhayangkara kepala'),
(14, 'polisi', 'bhayangkara satu'),
(15, 'polisi', 'bhayangkara dua'),
(16, 'polisi', 'brigadir polisi kepala'),
(17, 'polisi', 'brigadir polisi'),
(18, 'polisi', 'brigadir polisi satu'),
(19, 'polisi', 'brigadir polisi dua'),
(20, 'polisi', 'ajun inspektur polisi satu'),
(21, 'polisi', 'ajun inspektur polisi dua'),
(22, 'polisi', 'ajun komisaris polisi'),
(23, 'polisi', 'inspektur polisi satu'),
(24, 'polisi', 'inspektur polisi dua'),
(25, 'polisi', 'komisaris besar polisi'),
(26, 'polisi', 'ajun komisaris besar polisi'),
(27, 'polisi', 'komisaris polisi');

-- --------------------------------------------------------

--
-- Table structure for table `t_bb`
--

CREATE TABLE IF NOT EXISTS `t_bb` (
  `kd_bb` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `kd_reg_bb` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`kd_bb`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_bb_detail`
--

CREATE TABLE IF NOT EXISTS `t_bb_detail` (
  `kd_bb_detail` int(11) NOT NULL AUTO_INCREMENT,
  `kd_reg_bb` int(11) NOT NULL,
  `nm_bb` varchar(100) NOT NULL,
  `jns_bb` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pinjam` tinyint(1) NOT NULL,
  PRIMARY KEY (`kd_bb_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_bb_pinjam`
--

CREATE TABLE IF NOT EXISTS `t_bb_pinjam` (
  `kd_bb_pinjam` int(11) NOT NULL DEFAULT '0',
  `kd_bb_detail` int(11) NOT NULL,
  `kd_pegawai` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  PRIMARY KEY (`kd_bb_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_bp`
--

CREATE TABLE IF NOT EXISTS `t_bp` (
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(30) NOT NULL,
  `tgl_dikeluarkan` date NOT NULL,
  `tgl_diterima` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_bp`
--

INSERT INTO `t_bp` (`kd_perkara`, `no_surat`, `tgl_dikeluarkan`, `tgl_diterima`) VALUES
('KNS20130002', 'BP/106/III/2013/Reskrim', '2013-03-13', '2013-04-09 00:00:00'),
('KNS20130004', 'BP/106/III/2013/Reskrim', '2013-04-02', '2013-04-10 00:00:00'),
('KNS20130006', 'BP/106/III/2013/Reskrim', '2013-04-02', '2013-04-11 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `t_bp_log`
--

CREATE TABLE IF NOT EXISTS `t_bp_log` (
  `kd_bap` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_loginout`
--

CREATE TABLE IF NOT EXISTS `t_loginout` (
  `kd_pengguna` int(11) NOT NULL,
  `aksi` enum('in','out') NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_loginout`
--

INSERT INTO `t_loginout` (`kd_pengguna`, `aksi`, `waktu`) VALUES
(1, 'out', '2013-04-09 22:09:47'),
(2, 'in', '2013-04-09 22:10:26'),
(2, 'out', '2013-04-09 22:10:28'),
(3, 'in', '2013-04-09 22:10:48'),
(3, 'out', '2013-04-09 22:10:56'),
(1, 'in', '2013-04-09 22:10:59'),
(1, 'out', '2013-04-09 22:11:04'),
(3, 'in', '2013-04-09 22:11:12'),
(3, 'out', '2013-04-09 22:12:16'),
(3, 'in', '2013-04-09 22:12:20'),
(3, 'out', '2013-04-09 22:17:37'),
(1, 'in', '2013-04-09 22:17:41'),
(1, 'out', '2013-04-09 22:19:42'),
(3, 'in', '2013-04-09 22:19:45'),
(3, 'out', '2013-04-09 22:59:45'),
(1, 'in', '2013-04-09 22:59:48'),
(1, 'out', '2013-04-09 23:00:32'),
(2, 'in', '2013-04-09 23:00:37'),
(2, 'out', '2013-04-09 23:01:03'),
(3, 'in', '2013-04-09 23:03:31'),
(3, 'out', '2013-04-09 23:03:45'),
(2, 'in', '2013-04-09 23:03:59'),
(2, 'out', '2013-04-09 23:04:32'),
(3, 'in', '2013-04-09 23:04:37'),
(3, 'out', '2013-04-09 23:08:13'),
(2, 'in', '2013-04-09 23:08:21'),
(2, 'out', '2013-04-09 23:09:21'),
(3, 'in', '2013-04-09 23:09:29'),
(3, 'out', '2013-04-09 23:09:58'),
(3, 'in', '2013-04-09 23:10:01'),
(3, 'out', '2013-04-09 23:10:06'),
(2, 'in', '2013-04-09 23:10:15'),
(2, 'out', '2013-04-09 23:10:47'),
(3, 'in', '2013-04-09 23:10:51'),
(3, 'out', '2013-04-09 23:10:56'),
(2, 'in', '2013-04-09 23:16:43'),
(2, 'out', '2013-04-10 00:21:01'),
(3, 'in', '2013-04-10 00:21:08'),
(3, 'out', '2013-04-10 00:27:06'),
(1, 'in', '2013-04-10 00:27:10'),
(1, 'out', '2013-04-10 00:48:33'),
(6, 'in', '2013-04-10 00:48:40'),
(6, 'out', '2013-04-10 00:53:32'),
(1, 'in', '2013-04-10 00:53:35'),
(1, 'out', '2013-04-10 00:53:37'),
(1, 'in', '2013-04-10 00:53:41'),
(1, 'out', '2013-04-10 00:53:46'),
(2, 'in', '2013-04-10 00:53:51'),
(2, 'out', '2013-04-10 00:55:36'),
(1, 'in', '2013-04-10 00:55:39'),
(1, 'out', '2013-04-10 00:55:43'),
(1, 'in', '2013-04-10 00:55:48'),
(1, 'out', '2013-04-10 00:55:53'),
(3, 'in', '2013-04-10 00:55:56'),
(3, 'out', '2013-04-10 00:57:03'),
(1, 'in', '2013-04-10 00:57:14'),
(1, 'out', '2013-04-10 00:57:21'),
(2, 'in', '2013-04-10 00:57:26'),
(2, 'out', '2013-04-10 00:57:32'),
(4, 'in', '2013-04-10 00:57:55'),
(4, 'out', '2013-04-10 00:58:53'),
(3, 'in', '2013-04-10 00:58:57'),
(3, 'out', '2013-04-10 01:04:04'),
(4, 'in', '2013-04-10 01:04:08'),
(4, 'out', '2013-04-10 01:04:13'),
(4, 'in', '2013-04-10 01:06:15'),
(4, 'out', '2013-04-10 01:13:18'),
(2, 'in', '2013-04-10 01:13:23'),
(2, 'out', '2013-04-10 01:13:28'),
(3, 'in', '2013-04-10 01:13:32'),
(7, 'in', '2013-04-10 05:00:29'),
(7, 'out', '2013-04-10 05:07:27'),
(1, 'in', '2013-04-10 05:07:33'),
(1, 'out', '2013-04-10 05:07:37'),
(4, 'in', '2013-04-10 05:07:44'),
(4, 'out', '2013-04-10 05:07:47'),
(3, 'in', '2013-04-10 05:07:51'),
(3, 'out', '2013-04-10 05:07:52'),
(7, 'in', '2013-04-10 05:08:07'),
(7, 'in', '2013-04-10 05:11:32'),
(7, 'out', '2013-04-10 05:12:07'),
(1, 'in', '2013-04-10 05:12:27'),
(1, 'out', '2013-04-10 05:12:58'),
(6, 'in', '2013-04-10 05:13:05'),
(6, 'out', '2013-04-10 05:15:07'),
(3, 'in', '2013-04-10 05:15:18'),
(3, 'out', '2013-04-10 05:15:44'),
(2, 'in', '2013-04-10 05:15:51'),
(2, 'out', '2013-04-10 05:16:10'),
(3, 'in', '2013-04-10 05:16:15'),
(3, 'out', '2013-04-10 05:16:27'),
(7, 'in', '2013-04-10 05:16:38'),
(7, 'in', '2013-04-10 05:17:30'),
(7, 'out', '2013-04-10 06:23:09'),
(7, 'in', '2013-04-10 06:23:34'),
(7, 'out', '2013-04-10 06:32:33'),
(2, 'in', '2013-04-10 06:32:39'),
(2, 'out', '2013-04-10 06:32:57'),
(3, 'in', '2013-04-10 06:36:58'),
(3, 'out', '2013-04-10 06:38:07'),
(1, 'in', '2013-04-10 06:38:14'),
(1, 'out', '2013-04-10 07:13:19'),
(2, 'in', '2013-04-10 07:13:29'),
(2, 'out', '2013-04-10 07:14:32'),
(4, 'in', '2013-04-10 07:14:41'),
(4, 'out', '2013-04-10 07:27:47'),
(2, 'in', '2013-04-10 07:27:56'),
(2, 'out', '2013-04-10 07:28:14'),
(4, 'in', '2013-04-10 07:28:19'),
(4, 'out', '2013-04-10 07:31:33'),
(2, 'in', '2013-04-10 07:31:40'),
(2, 'out', '2013-04-10 07:34:55'),
(4, 'in', '2013-04-10 07:35:02'),
(7, 'in', '2013-04-10 14:20:07'),
(7, 'out', '2013-04-10 14:37:12'),
(3, 'in', '2013-04-10 14:37:15'),
(3, 'out', '2013-04-10 14:38:31'),
(7, 'in', '2013-04-10 14:38:41'),
(7, 'out', '2013-04-10 14:41:45'),
(1, 'in', '2013-04-10 14:41:50'),
(1, 'out', '2013-04-10 15:08:02'),
(4, 'in', '2013-04-10 15:08:10'),
(4, 'out', '2013-04-10 15:08:17'),
(1, 'in', '2013-04-10 15:10:33'),
(1, 'in', '2013-04-10 15:44:03'),
(1, 'out', '2013-04-10 16:50:08'),
(3, 'in', '2013-04-10 16:50:16'),
(3, 'out', '2013-04-10 16:50:30'),
(1, 'in', '2013-04-10 23:21:23'),
(1, 'out', '2013-04-10 23:34:41'),
(2, 'in', '2013-04-10 23:34:55'),
(1, 'in', '2013-04-11 15:28:48'),
(1, 'in', '2013-04-11 15:59:32'),
(1, 'out', '2013-04-11 16:06:55'),
(1, 'in', '2013-04-11 16:06:58'),
(1, 'out', '2013-04-11 16:07:08'),
(2, 'in', '2013-04-11 16:07:14'),
(2, 'out', '2013-04-11 16:08:14'),
(1, 'in', '2013-04-11 16:08:22'),
(1, 'out', '2013-04-11 16:08:42'),
(2, 'in', '2013-04-11 16:08:50'),
(2, 'out', '2013-04-11 16:10:54'),
(4, 'in', '2013-04-11 16:11:02'),
(1, 'in', '2013-04-11 19:34:16'),
(1, 'out', '2013-04-11 19:37:24'),
(3, 'in', '2013-04-11 19:37:28'),
(3, 'out', '2013-04-11 19:41:37'),
(1, 'in', '2013-04-11 19:41:40'),
(1, 'out', '2013-04-11 19:42:00'),
(2, 'in', '2013-04-11 19:42:05'),
(2, 'out', '2013-04-11 19:42:41'),
(6, 'in', '2013-04-11 19:42:53'),
(6, 'out', '2013-04-11 19:42:56'),
(7, 'in', '2013-04-11 19:47:39'),
(7, 'out', '2013-04-11 19:49:14'),
(3, 'in', '2013-04-11 19:49:22'),
(3, 'out', '2013-04-11 19:50:10'),
(1, 'in', '2013-04-11 19:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `t_p16`
--

CREATE TABLE IF NOT EXISTS `t_p16` (
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_p16a`
--

CREATE TABLE IF NOT EXISTS `t_p16a` (
  `kd_perkara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_p16a_jaksa`
--

CREATE TABLE IF NOT EXISTS `t_p16a_jaksa` (
  `kd_perkara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_p16a_log`
--

CREATE TABLE IF NOT EXISTS `t_p16a_log` (
  `kd_perkara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_p16_jaksa`
--

CREATE TABLE IF NOT EXISTS `t_p16_jaksa` (
  `kd_perkara` varchar(11) NOT NULL,
  `kd_pegawai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_p16_jaksa`
--

INSERT INTO `t_p16_jaksa` (`kd_perkara`, `kd_pegawai`) VALUES
('KNS20130002', 6),
('KNS20130002', 10),
('KNS20130002', 14),
('KNS20130001', 6),
('KNS20130001', 13),
('KNS20130004', 6),
('KNS20130004', 10),
('KNS20130006', 6);

-- --------------------------------------------------------

--
-- Table structure for table `t_p16_log`
--

CREATE TABLE IF NOT EXISTS `t_p16_log` (
  `kd_p16` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_p18`
--

CREATE TABLE IF NOT EXISTS `t_p18` (
  `kd_p18` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  PRIMARY KEY (`kd_p18`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_p19`
--

CREATE TABLE IF NOT EXISTS `t_p19` (
  `kd_p19` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  PRIMARY KEY (`kd_p19`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_p21`
--

CREATE TABLE IF NOT EXISTS `t_p21` (
  `kd_p21` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  PRIMARY KEY (`kd_p21`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_p21a`
--

CREATE TABLE IF NOT EXISTS `t_p21a` (
  `kd_p21a` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  PRIMARY KEY (`kd_p21a`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_pegawai`
--

CREATE TABLE IF NOT EXISTS `t_pegawai` (
  `kd_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(18) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kd_jabatan` int(1) NOT NULL,
  `kd_pangkat` int(1) DEFAULT NULL,
  `kd_pengguna` int(11) DEFAULT NULL,
  `nm_lengkap` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(160) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(12) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_hp` varchar(15) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kd_pegawai`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `t_pegawai`
--

INSERT INTO `t_pegawai` (`kd_pegawai`, `nip`, `kd_jabatan`, `kd_pangkat`, `kd_pengguna`, `nm_lengkap`, `alamat`, `no_telp`, `no_hp`) VALUES
(1, '197010071998031003', 4, 4, 2, 'MOCHAMAD JUDHY ISMONO, SH', '', '', '081347318777'),
(2, '196606081996031001', 1, 4, 0, 'SRI KUNCORO  ', '', '', '08179356996'),
(3, '196103201990031001', 2, 5, 0, 'DJAUHARUL F ', '', '', '085230909090'),
(4, '197003281996031100', 3, 5, 0, 'NURCAHYO', '', '', '08128944498'),
(5, '197208021993031004', 5, 4, 0, 'EDY WINARKO ', '', '', '081331969281'),
(6, '230013573', 6, 4, 3, 'TITIN ', '', '', '088805169237'),
(7, '197110011996032 ', 6, 4, 0, 'RISTA ERNA', '', '', '08123579707'),
(8, '197207241996032001', 6, 4, 0, 'DARMAWATI ', '', '', '081331135967'),
(9, '197210111993031001', 6, 4, 0, 'RIVIANTO, SH.', '', '', '081216381546'),
(10, '197711222001122002', 6, 3, 0, 'NOVITA, SH', '', '', '081331746266'),
(11, '198007052005012 ', 6, 3, 0, 'SUCI ANGGRAENI ', '', '', '081330031266'),
(12, '198109192006031011', 6, 2, 0, 'SUDARMADJI', '', '', ''),
(13, '197207291993031 ', 7, 4, 0, 'I WAYAN WAHYU Y', '', '', '085230043572'),
(14, '197908092003121 ', 6, 3, 0, 'AHMAD HAJAR ZAENAL, SH', '', '', '082124964874'),
(15, '19771015200212100', 6, 2, 0, 'ARIEF FATHURROHMAN', '', '', '081230558830'),
(16, '197307241996032002', 7, 4, 0, 'M. WULAN, SH', '', '', '081332438003'),
(17, '198004012006032001', 7, 3, 0, 'FARIDA', '', '', '081225871788'),
(18, '196707071994032004', 7, 4, 0, 'ANOEK EKAWATI, SH        ', '', '', '08121739988'),
(19, '198408292007031001', 7, 2, 0, 'SUWASKITO, SH', '', '', '081235999957'),
(20, '198003042003121002', 7, 3, 0, 'ENDRO, SH', '', '', '081335554355'),
(21, '197911012003121002', 7, 3, 0, 'HASAN EFENDI', '', '', ''),
(22, '197504022000121001', 7, 3, 0, 'ANDRI WINANTO, SH', '', '', '08111201275'),
(23, '197911062005011005', 7, 3, 0, 'HANAFI RACHMAD E, SH', '', '', '081332382783'),
(24, '198204152005012010', 7, 2, 0, 'SITI QOMARIYAH, SH', '', '', '081332211322'),
(25, '197808282000122002', 8, 4, 0, 'LINDA BETRIX K, SH', '', '', '081314100288'),
(26, '197109111994032001', 8, 3, 0, 'SRI RAHAYU, SH', '', '', '081231554423'),
(27, '197905242003121001', 8, 3, 0, 'I WAYAN OJA MIASTA, SH.', '', '', '081337823163'),
(28, '197503081998031003', 8, 3, 0, 'ACHMAD JAYA, SH', '', '', '08124223343'),
(29, '197910032002121005', 8, 3, 0, 'KUSBIANTORO, SH', '', '', '082140071440'),
(30, '196802291988031002', 8, 4, 0, 'HENRI PRABOWO ', '', '', '081358316868'),
(31, '198001122003121001', 8, 3, 0, 'I NYOMAN S ', '', '', '087852266040'),
(32, '196706081992032002', 8, 4, 0, 'ASTUTIK ', '', '', '08179300254'),
(33, '197705292003121005', 8, 3, 0, 'MUKHLIS ANDIYANTO, SH', '', '', '081330895444'),
(34, '197910292002121003', 8, 3, 0, 'DEDDY AGUS OKTAVIANTO, SH. MH.', '', '', '085258619074'),
(35, '197701262002122005', 9, 3, 0, 'RIRIN INDRAWATI, SH.', '', '', '081230007111'),
(36, '230019370', 9, 4, 0, 'SITI NURHADIASIH, SH', '', '', '081330639885'),
(37, '', 9, 4, 0, 'ACHMAD IRIANTO', '', '', '085933780888'),
(38, '', 10, 0, 0, 'IQBAL NURULLAH ', '', '', '0811348032'),
(39, '', 10, 0, 0, 'MEMET', '', '', '081330250909'),
(40, '', 10, 0, 0, 'INAWATI', '', '', '081333006828'),
(41, '', 10, 0, 0, 'HARIYONO', '', '', '085746239672');

-- --------------------------------------------------------

--
-- Table structure for table `t_pengaturan`
--

CREATE TABLE IF NOT EXISTS `t_pengaturan` (
  `kunci` varchar(30) NOT NULL,
  `nilai` varchar(100) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`kunci`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_pengaturan`
--

INSERT INTO `t_pengaturan` (`kunci`, `nilai`, `keterangan`) VALUES
('berkas_huruf_besar', '1', NULL),
('berkas_huruf_tebal', '1', NULL),
('instansi', 'Kejaksaan Negeri Surabaya', NULL),
('jpu', '6,7,8,9', NULL),
('kd_instansi', 'KNS', NULL),
('tanda_tangan', '4', NULL),
('versi_app', '0.4.9', NULL),
('versi_db', '0.4.9', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengguna`
--

CREATE TABLE IF NOT EXISTS `t_pengguna` (
  `kd_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `jns_pengguna` enum('superadmin','admin','kasipidum','kasi','jaksa','sekretariat','pratut','penuntutan','barangbukti') NOT NULL,
  PRIMARY KEY (`kd_pengguna`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `t_pengguna`
--

INSERT INTO `t_pengguna` (`kd_pengguna`, `username`, `password`, `jns_pengguna`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin'),
(2, 'kasipidum', 'b39ab03e909370ce871dbb378c951106', 'kasipidum'),
(3, 'jaksa', '7cc8b7b34ceaedba106d53e02b348707', 'jaksa'),
(4, 'pratut', 'f23302c41a0be45f3523e2ce19b61bde', 'pratut'),
(5, 'penuntutan', 'c29fbfb3cb6d57d1073905a99f61f145', 'penuntutan'),
(6, 'barangbukti', '9a4dc0ab9a3f03bd9c553161ae0e992d', 'barangbukti'),
(7, 'sekretariat', '593277eb017ecbe3d5bc8e552d68ff53', 'sekretariat');

-- --------------------------------------------------------

--
-- Table structure for table `t_peringatan`
--

CREATE TABLE IF NOT EXISTS `t_peringatan` (
  `kd_peringatan` int(11) NOT NULL,
  `kd_pengguna` int(11) NOT NULL,
  `terbaca` enum('y','t') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_perkara`
--

CREATE TABLE IF NOT EXISTS `t_perkara` (
  `kd_perkara` varchar(11) NOT NULL,
  `tgl_dimulai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `selesai` enum('y','t') NOT NULL DEFAULT 't'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_perkara`
--

INSERT INTO `t_perkara` (`kd_perkara`, `tgl_dimulai`, `selesai`) VALUES
('KNS20130001', '2013-04-08 17:00:00', 't'),
('KNS20130002', '2013-04-08 17:00:00', 't'),
('KNS20130003', '2013-04-09 17:00:00', 't'),
('KNS20130004', '2013-04-08 17:00:00', 't'),
('KNS20130005', '2013-04-10 02:39:10', 't'),
('KNS20130006', '2013-04-11 07:34:29', 't');

-- --------------------------------------------------------

--
-- Table structure for table `t_pesan`
--

CREATE TABLE IF NOT EXISTS `t_pesan` (
  `kd_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pegawai` int(11) NOT NULL,
  `isi_pesan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  `terbaca` enum('y','t') NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_polisi`
--

CREATE TABLE IF NOT EXISTS `t_polisi` (
  `kd_polisi` int(11) NOT NULL,
  `kd_pangkat` int(1) NOT NULL,
  `kd_kesatuan` int(1) NOT NULL,
  `kd_pengguna` int(11) NOT NULL,
  `nm_lengkap` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kd_polisi`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_sms`
--

CREATE TABLE IF NOT EXISTS `t_sms` (
  `kd_sms` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pesan` int(11) NOT NULL,
  `kd_pegawai` int(11) NOT NULL,
  `kd_perkara` varchar(11) NOT NULL,
  `kirim` tinyint(1) NOT NULL,
  PRIMARY KEY (`kd_sms`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_sms`
--

INSERT INTO `t_sms` (`kd_sms`, `kd_pesan`, `kd_pegawai`, `kd_perkara`, `kirim`) VALUES
(1, 4, 6, 'KNS20130004', 1),
(2, 4, 10, 'KNS20130004', 1),
(3, 4, 6, 'KNS20130006', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_sms_pesan`
--

CREATE TABLE IF NOT EXISTS `t_sms_pesan` (
  `kd_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `isi_pesan` varchar(255) NOT NULL,
  PRIMARY KEY (`kd_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `t_sms_pesan`
--

INSERT INTO `t_sms_pesan` (`kd_pesan`, `isi_pesan`) VALUES
(4, 'Anda ditunjuk sebagai JPU untuk perkara [kd_perkara]'),
(5, 'Anda belum menentukan sikap untuk perkara [kd_perkara]'),
(6, 'Waktu untuk membuat berkas P-19 untuk perkara [kd_perkara] hampir habis'),
(7, 'Waktu untuk membuat berkas P-19 untuk perkara [kd_perkara] hampir habis'),
(8, 'Tambahan waktu penyelidikan untuk perkara [kd_perkar] hampir habis silahkan membuat berkas P-20');

-- --------------------------------------------------------

--
-- Table structure for table `t_spdp`
--

CREATE TABLE IF NOT EXISTS `t_spdp` (
  `kd_perkara` varchar(11) NOT NULL,
  `no_polisi` varchar(30) NOT NULL,
  `tgl_penyidikan` date NOT NULL,
  `kd_kesatuan` int(1) NOT NULL,
  `melanggar_pasal` varchar(160) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_datang` datetime DEFAULT NULL,
  `tgl_diterima` datetime NOT NULL,
  PRIMARY KEY (`kd_perkara`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_spdp`
--

INSERT INTO `t_spdp` (`kd_perkara`, `no_polisi`, `tgl_penyidikan`, `kd_kesatuan`, `melanggar_pasal`, `kd_pidana`, `tgl_datang`, `tgl_diterima`) VALUES
('KNS20130001', 'B/ 88/IX/12/RESKRIM', '2013-04-04', 2, '378 KUHP DAN 372 KUHP', 2, '0000-00-00 00:00:00', '2013-04-09 00:00:00'),
('KNS20130002', 'B/ 75/II/13/RESKRIM', '2013-02-06', 8, '378 KUHP DAN 372 KUHP', 1, '0000-00-00 00:00:00', '2013-04-09 00:00:00'),
('KNS20130003', 'B/ 75/II/13/RESKRIM', '2013-04-02', 7, '378 KUHP DAN 372 KUHP', 3, '0000-00-00 00:00:00', '2013-04-10 00:00:00'),
('KNS20130004', 'B/ 75/II/13/RESKRIM', '2013-04-03', 4, '378 KUHP DAN 372 KUHP', 3, '0000-00-00 00:00:00', '2013-04-09 00:00:00'),
('KNS20130005', 'B/ 75/II/13/RESKRIM', '2013-04-03', 5, '378 KUHP DAN 372 KUHP', 2, '0000-00-00 00:00:00', '2013-04-10 09:39:10'),
('KNS20130006', 'B/ 88/IX/12/RESKRIM', '2013-04-01', 7, '378 KUHP DAN 372 KUHP', 2, '0000-00-00 00:00:00', '2013-04-11 14:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `t_spdp_log`
--

CREATE TABLE IF NOT EXISTS `t_spdp_log` (
  `kd_spdp` int(11) NOT NULL,
  `kd_pegawai` int(11) NOT NULL,
  `aksi` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_t4`
--

CREATE TABLE IF NOT EXISTS `t_t4` (
  `kd_t4` int(11) NOT NULL AUTO_INCREMENT,
  `kd_perkara` varchar(11) NOT NULL,
  `no_surat` varchar(4) NOT NULL,
  `kd_pidana` int(1) NOT NULL,
  `tgl_dikeluarkan` datetime NOT NULL,
  PRIMARY KEY (`kd_t4`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_t4_log`
--

CREATE TABLE IF NOT EXISTS `t_t4_log` (
  `kd_perkara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `t_tahanan`
--

CREATE TABLE IF NOT EXISTS `t_tahanan` (
  `kd_tahanan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_tersangka` int(11) NOT NULL,
  `no_register` int(11) NOT NULL,
  `tgl_ditambahkan` datetime NOT NULL,
  PRIMARY KEY (`kd_tahanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_tersangka`
--

CREATE TABLE IF NOT EXISTS `t_tersangka` (
  `kd_tersangka` int(11) NOT NULL AUTO_INCREMENT,
  `nm_lengkap` varchar(100) NOT NULL,
  `tmp_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) DEFAULT NULL,
  `umur` varchar(10) DEFAULT NULL,
  `jns_kelamin` enum('L','P') NOT NULL,
  `warganegara` varchar(30) NOT NULL,
  `tmp_tinggal` varchar(160) NOT NULL,
  `kd_agama` int(1) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `pendidikan` varchar(30) DEFAULT NULL,
  `keterangan` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`kd_tersangka`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `t_tersangka`
--

INSERT INTO `t_tersangka` (`kd_tersangka`, `nm_lengkap`, `tmp_lahir`, `tgl_lahir`, `umur`, `jns_kelamin`, `warganegara`, `tmp_tinggal`, `kd_agama`, `pekerjaan`, `pendidikan`, `keterangan`) VALUES
(1, 'ACHMAD AGUS AL JONO BIN NITI', '', '', '', 'L', '', '', 1, '', '', ''),
(2, 'ACHMAD MUBAROK', '', '', '', 'L', '', '', 1, '', '', ''),
(3, 'BAGUS GURUH SUHARNO', 'SURABAYA', '1980-09-14', '33', 'L', 'INDONESIA', 'SURABAYA', 1, 'SWASTA', '', ''),
(4, 'DJOKO SUMARIANTO BIN RAHMAN', 'SURABAYA', '1978-05-12', '35', 'L', 'INDONESIA', 'SURABAYA', 1, 'SWASTA', '', ''),
(5, 'DOFFIE HARDIAWAN BIN HARUN HARDJITO', 'SURABAYA', '1975-09-30', '38', 'L', 'INDONESIA', 'SURABAYA', 1, 'SWASTA', '', ''),
(6, 'DIAN ARIEF CAHYONO', '', '', '', 'L', '', '', 1, '', '', ''),
(7, 'FAISAL AFIF HERMAWAN', '', '', '', 'L', '', '', 1, '', '', ''),
(8, 'MOHAMAD YUSUF ISMAIL BIN MOH.THOYIB ISMAIL', '', '', '', 'L', '', '', 1, '', '', ''),
(9, 'ACHMAD IRIANTO', '', '', '', 'L', '', '', 1, '', '', ''),
(10, 'BAGUS GURUH SUHARNO', '', '', '', 'L', '', '', 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_tersangka_spdp`
--

CREATE TABLE IF NOT EXISTS `t_tersangka_spdp` (
  `kd_perkara` varchar(11) NOT NULL,
  `kd_tersangka` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t_tersangka_spdp`
--

INSERT INTO `t_tersangka_spdp` (`kd_perkara`, `kd_tersangka`) VALUES
('KNS20130001', 1),
('KNS20130001', 2),
('KNS20130002', 3),
('KNS20130002', 4),
('KNS20130002', 5),
('KNS20130003', 6),
('KNS20130003', 7),
('KNS20130004', 8),
('KNS20130006', 9),
('KNS20130006', 10);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
