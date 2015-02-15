-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2015 at 10:27 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukom`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kk_id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `NIP` varchar(25) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `telp` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kk_id` (`kk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `kk_id`, `nama`, `NIP`, `alamat`, `telp`) VALUES
(1, 1, 'BudiA', '2121212', 'Hai', 'joss');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_keahlian`
--

CREATE TABLE IF NOT EXISTS `kompetensi_keahlian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diklat_id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `diklat_id` (`diklat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kompetensi_keahlian`
--

INSERT INTO `kompetensi_keahlian` (`id`, `diklat_id`, `nama`) VALUES
(1, 1, 'RPL');

-- --------------------------------------------------------

--
-- Table structure for table `mata_diklat`
--

CREATE TABLE IF NOT EXISTS `mata_diklat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nama` (`nama`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mata_diklat`
--

INSERT INTO `mata_diklat` (`id`, `nama`) VALUES
(3, 'Hai'),
(1, 'Matematika\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `sk_id` int(11) NOT NULL,
  `nilai_angka` char(2) NOT NULL,
  `nilai_huruf` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `siswa_id` (`siswa_id`,`guru_id`,`sk_id`),
  KEY `guru_id` (`guru_id`),
  KEY `sk_id` (`sk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nisn` char(10) NOT NULL,
  `kk_id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `foto` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kk_id` (`kk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `standar_kompetensi`
--

CREATE TABLE IF NOT EXISTS `standar_kompetensi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kk_id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `kelas` char(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kk_id` (`kk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `standar_kompetensi`
--

INSERT INTO `standar_kompetensi` (`id`, `kk_id`, `nama`, `kelas`) VALUES
(1, 1, 'RPL', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 0),
(2, 'user', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wali_murid`
--

CREATE TABLE IF NOT EXISTS `wali_murid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siswa_id` int(11) NOT NULL,
  `nama_ayah` varchar(225) NOT NULL,
  `pekerjaan_ayah` varchar(225) NOT NULL,
  `nama_ibu` varchar(225) NOT NULL,
  `pekerjaan_ibu` varchar(225) NOT NULL,
  `alamat_wali` varchar(225) NOT NULL,
  `telp_wali` varchar(225) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `siswa_id` (`siswa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`kk_id`) REFERENCES `kompetensi_keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kompetensi_keahlian`
--
ALTER TABLE `kompetensi_keahlian`
  ADD CONSTRAINT `kompetensi_keahlian_ibfk_1` FOREIGN KEY (`diklat_id`) REFERENCES `mata_diklat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_3` FOREIGN KEY (`sk_id`) REFERENCES `standar_kompetensi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kk_id`) REFERENCES `kompetensi_keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `standar_kompetensi`
--
ALTER TABLE `standar_kompetensi`
  ADD CONSTRAINT `standar_kompetensi_ibfk_1` FOREIGN KEY (`kk_id`) REFERENCES `kompetensi_keahlian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali_murid`
--
ALTER TABLE `wali_murid`
  ADD CONSTRAINT `wali_murid_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
