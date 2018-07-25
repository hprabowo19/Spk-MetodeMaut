-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2017 at 05:49 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `santri_maut`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai`
--

CREATE TABLE IF NOT EXISTS `bobot_nilai` (
`kode_bobot` int(4) NOT NULL,
  `nama_bobot` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `nilai_bobot` decimal(6,2) DEFAULT NULL,
  `kode_kriteria` varchar(10) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `bobot_nilai`
--

INSERT INTO `bobot_nilai` (`kode_bobot`, `nama_bobot`, `nilai_bobot`, `kode_kriteria`) VALUES
(1, 'Stabil', '70.00', 'PSY01'),
(2, 'Cukup Stabil', '50.00', 'PSY01'),
(3, 'Kurang Stabil', '30.00', 'PSY01'),
(4, 'Fasih', '70.00', 'BAQ01'),
(5, 'Cukup Fasih', '50.00', 'BAQ01'),
(6, 'Kurang Fasih', '30.00', 'BAQ01'),
(7, 'Baik', '70.00', 'IBA01'),
(8, 'Cukup Baik', '50.00', 'IBA01'),
(9, 'Kurang Baik', '30.00', 'IBA01'),
(10, 'Lebih dari 80', '70.00', 'IM01'),
(11, '60 sampai 80', '50.00', 'IM01'),
(12, 'Kurang dari 60', '30.00', 'IM01'),
(13, 'Lebih dari 80', '70.00', 'ILA01'),
(14, '60 sampai 80', '50.00', 'ILA01'),
(15, 'Kurang dari 60', '30.00', 'ILA01'),
(16, 'Lebih dari 80', '70.00', 'ILU01'),
(17, '60 sampai 80', '50.00', 'ILU01'),
(18, 'Kurang dari 60', '30.00', 'ILU01'),
(19, 'Lebih dari 80', '70.00', 'IU01'),
(20, '60 sampai 80', '50.00', 'IU01'),
(21, 'Kurang dari 60', '30.00', 'IU01'),
(22, 'Lebih dari 80', '70.00', 'IA01'),
(23, '60 sampai 80', '50.00', 'IA01'),
(24, 'Kurang dari 60', '30.00', 'IA01');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_maut`
--

CREATE TABLE IF NOT EXISTS `hasil_maut` (
`id_hasil` int(5) NOT NULL,
  `nisn` int(10) NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=954 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `hasil_maut`
--

INSERT INTO `hasil_maut` (`id_hasil`, `nisn`, `nilai`) VALUES
(915, 17184030, 75),
(916, 17184019, 0),
(917, 17184006, 35),
(918, 17184031, 100),
(919, 17184035, 80),
(920, 17184032, 20),
(921, 17184005, 90),
(922, 17184037, 100),
(923, 17184004, 20),
(924, 17184001, 100),
(925, 17184039, 40),
(926, 17184017, 70),
(927, 17184018, 100),
(928, 17184012, 0),
(929, 17184003, 100),
(930, 17184009, 75),
(931, 17184015, 60),
(932, 17184028, 20),
(933, 17184007, 90),
(934, 17184036, 90),
(935, 17184011, 100),
(936, 17184024, 90),
(937, 17184023, 90),
(938, 17184020, 20),
(939, 17184013, 75),
(940, 17184016, 100),
(941, 17184022, 90),
(942, 17184034, 80),
(943, 17184025, 90),
(944, 17184033, 70),
(945, 17184026, 100),
(946, 17184002, 90),
(947, 17184027, 85),
(948, 17184029, 100),
(949, 17184008, 90),
(950, 17184021, 20),
(951, 17184038, 35),
(952, 17184010, 20),
(953, 17184014, 100);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kode_kriteria` varchar(10) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `nama_kriteria` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `bobot` int(1) unsigned DEFAULT NULL,
  `tot_bobot` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `bobot`, `tot_bobot`) VALUES
('PSY01', 'Psychotest', 20, '0.00'),
('BAQ01', 'Baca Al-Quran', 30, '0.00'),
('IBA01', 'Ibadah Amaliyah', 15, '0.00'),
('IM01', 'Imla', 15, '0.00'),
('IU01', 'Ilmu Umum', 10, '0.00'),
('IA01', 'Ilmu Agama', 10, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
`id_nilai` int(5) unsigned NOT NULL,
  `nisn` int(10) NOT NULL,
  `kode_kriteria` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `kode_bobot` int(4) DEFAULT NULL,
  `nilai` decimal(6,2) DEFAULT NULL,
  `min` int(3) unsigned NOT NULL,
  `max` int(3) unsigned NOT NULL,
  `nilai1` int(3) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=327 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_nilai`, `nisn`, `kode_kriteria`, `kode_bobot`, `nilai`, `min`, `max`, `nilai1`) VALUES
(1, 17184001, 'PSY01', 1, '70.00', 30, 70, 1),
(2, 17184001, 'BAQ01', 5, '50.00', 30, 70, 1),
(3, 17184001, 'IBA01', 8, '50.00', 30, 70, 1),
(4, 17184001, 'IM01', 10, '70.00', 30, 70, 1),
(5, 17184001, 'ILA01', 13, '70.00', 30, 70, 1),
(6, 17184001, 'ILU01', 16, '70.00', 30, 70, 1),
(7, 17184002, 'PSY01', 1, '70.00', 30, 70, 1),
(8, 17184002, 'BAQ01', 4, '70.00', 30, 70, 1),
(9, 17184002, 'IBA01', 7, '70.00', 30, 70, 1),
(10, 17184002, 'IM01', 10, '70.00', 30, 70, 1),
(11, 17184002, 'ILA01', 13, '70.00', 30, 70, 1),
(12, 17184002, 'ILU01', 17, '50.00', 30, 70, 1),
(13, 17184003, 'PSY01', 1, '70.00', 30, 70, 1),
(14, 17184003, 'BAQ01', 4, '70.00', 30, 70, 1),
(15, 17184003, 'IBA01', 7, '70.00', 30, 70, 1),
(16, 17184003, 'IM01', 10, '70.00', 30, 70, 1),
(17, 17184003, 'ILA01', 13, '70.00', 30, 70, 1),
(18, 17184003, 'ILU01', 18, '30.00', 30, 70, 0),
(19, 17184004, 'PSY01', 3, '30.00', 30, 70, 0),
(20, 17184004, 'BAQ01', 6, '30.00', 30, 70, 0),
(21, 17184004, 'IBA01', 9, '30.00', 30, 70, 0),
(22, 17184004, 'IM01', 12, '30.00', 30, 70, 0),
(23, 17184004, 'ILA01', 15, '30.00', 30, 70, 0),
(24, 17184004, 'ILU01', 18, '30.00', 30, 70, 0),
(25, 17184005, 'PSY01', 1, '70.00', 30, 70, 1),
(26, 17184005, 'BAQ01', 4, '70.00', 30, 70, 1),
(27, 17184005, 'IBA01', 7, '70.00', 30, 70, 1),
(28, 17184005, 'IM01', 10, '70.00', 30, 70, 1),
(29, 17184005, 'ILA01', 14, '50.00', 30, 70, 1),
(30, 17184005, 'ILU01', 16, '70.00', 30, 70, 1),
(31, 17184006, 'PSY01', 3, '30.00', 30, 70, 0),
(32, 17184006, 'BAQ01', 6, '30.00', 30, 70, 0),
(33, 17184006, 'IBA01', 9, '30.00', 30, 70, 0),
(34, 17184006, 'IM01', 11, '50.00', 30, 70, 1),
(35, 17184006, 'ILA01', 14, '50.00', 30, 70, 1),
(36, 17184006, 'ILU01', 17, '50.00', 30, 70, 1),
(37, 17184007, 'PSY01', 1, '70.00', 30, 70, 1),
(38, 17184007, 'BAQ01', 4, '70.00', 30, 70, 1),
(39, 17184007, 'IBA01', 7, '70.00', 30, 70, 1),
(40, 17184007, 'IM01', 10, '70.00', 30, 70, 1),
(41, 17184007, 'ILA01', 15, '30.00', 30, 70, 0),
(42, 17184007, 'ILU01', 16, '70.00', 30, 70, 1),
(43, 17184008, 'PSY01', 1, '70.00', 30, 70, 1),
(44, 17184008, 'BAQ01', 4, '70.00', 30, 70, 1),
(45, 17184008, 'IBA01', 7, '70.00', 30, 70, 1),
(46, 17184008, 'IM01', 11, '50.00', 30, 70, 1),
(47, 17184008, 'ILA01', 13, '70.00', 30, 70, 1),
(48, 17184008, 'ILU01', 16, '70.00', 30, 70, 1),
(49, 17184009, 'PSY01', 1, '70.00', 30, 70, 1),
(50, 17184009, 'BAQ01', 4, '70.00', 30, 70, 1),
(51, 17184009, 'IBA01', 7, '70.00', 30, 70, 1),
(52, 17184009, 'IM01', 12, '30.00', 30, 70, 0),
(53, 17184009, 'ILA01', 13, '70.00', 30, 70, 1),
(54, 17184009, 'ILU01', 16, '70.00', 30, 70, 1),
(55, 17184010, 'PSY01', 3, '30.00', 30, 70, 0),
(56, 17184010, 'BAQ01', 6, '30.00', 30, 70, 0),
(57, 17184010, 'IBA01', 9, '30.00', 30, 70, 0),
(58, 17184010, 'IM01', 12, '30.00', 30, 70, 0),
(59, 17184010, 'ILA01', 15, '30.00', 30, 70, 0),
(60, 17184010, 'ILU01', 18, '30.00', 30, 70, 0),
(61, 17184011, 'PSY01', 1, '70.00', 30, 70, 1),
(62, 17184011, 'BAQ01', 4, '70.00', 30, 70, 1),
(63, 17184011, 'IBA01', 8, '50.00', 30, 70, 1),
(64, 17184011, 'IM01', 10, '70.00', 30, 70, 1),
(65, 17184011, 'ILA01', 13, '70.00', 30, 70, 1),
(66, 17184011, 'ILU01', 16, '70.00', 30, 70, 1),
(67, 17184012, 'PSY01', 3, '30.00', 30, 70, 0),
(68, 17184012, 'BAQ01', 6, '30.00', 30, 70, 0),
(69, 17184012, 'IBA01', 9, '30.00', 30, 70, 0),
(70, 17184012, 'IM01', 12, '30.00', 30, 70, 0),
(71, 17184012, 'ILA01', 15, '30.00', 30, 70, 0),
(72, 17184012, 'ILU01', 18, '30.00', 30, 70, 0),
(73, 17184013, 'PSY01', 1, '70.00', 30, 70, 1),
(74, 17184013, 'BAQ01', 4, '70.00', 30, 70, 1),
(75, 17184013, 'IBA01', 9, '30.00', 30, 70, 0),
(76, 17184013, 'IM01', 10, '70.00', 30, 70, 1),
(77, 17184013, 'ILA01', 13, '70.00', 30, 70, 1),
(78, 17184013, 'ILU01', 16, '70.00', 30, 70, 1),
(79, 17184014, 'PSY01', 1, '70.00', 30, 70, 1),
(80, 17184014, 'BAQ01', 5, '50.00', 30, 70, 1),
(81, 17184014, 'IBA01', 7, '70.00', 30, 70, 1),
(82, 17184014, 'IM01', 10, '70.00', 30, 70, 1),
(83, 17184014, 'ILA01', 13, '70.00', 30, 70, 1),
(84, 17184014, 'ILU01', 16, '70.00', 30, 70, 1),
(246, 17184040, 'ILU01', 16, '70.00', 30, 70, 1),
(244, 17184040, 'IM01', 12, '30.00', 30, 70, 0),
(242, 17184040, 'BAQ01', 5, '50.00', 30, 70, 1),
(241, 17184040, 'PSY01', 1, '70.00', 30, 70, 1),
(91, 17184016, 'PSY01', 2, '50.00', 30, 70, 1),
(92, 17184016, 'BAQ01', 4, '70.00', 30, 70, 1),
(93, 17184016, 'IBA01', 7, '70.00', 30, 70, 1),
(94, 17184016, 'IM01', 10, '70.00', 30, 70, 1),
(95, 17184016, 'ILA01', 13, '70.00', 30, 70, 1),
(96, 17184016, 'ILU01', 16, '70.00', 30, 70, 1),
(97, 17184017, 'PSY01', 3, '30.00', 30, 70, 0),
(98, 17184017, 'BAQ01', 4, '70.00', 30, 70, 1),
(99, 17184017, 'IBA01', 7, '70.00', 30, 70, 1),
(100, 17184017, 'IM01', 10, '70.00', 30, 70, 1),
(101, 17184017, 'ILA01', 13, '70.00', 30, 70, 1),
(102, 17184017, 'ILU01', 16, '70.00', 30, 70, 1),
(103, 17184018, 'PSY01', 1, '70.00', 30, 70, 1),
(104, 17184018, 'BAQ01', 4, '70.00', 30, 70, 1),
(105, 17184018, 'IBA01', 7, '70.00', 30, 70, 1),
(106, 17184018, 'IM01', 10, '70.00', 30, 70, 1),
(107, 17184018, 'ILA01', 13, '70.00', 30, 70, 1),
(108, 17184018, 'ILU01', 16, '70.00', 30, 70, 1),
(109, 17184019, 'PSY01', 3, '30.00', 30, 70, 0),
(110, 17184019, 'BAQ01', 6, '30.00', 30, 70, 0),
(111, 17184019, 'IBA01', 9, '30.00', 30, 70, 0),
(112, 17184019, 'IM01', 12, '30.00', 30, 70, 0),
(113, 17184019, 'ILA01', 15, '30.00', 30, 70, 0),
(114, 17184019, 'ILU01', 18, '30.00', 30, 70, 0),
(115, 17184020, 'PSY01', 3, '30.00', 30, 70, 0),
(116, 17184020, 'BAQ01', 6, '30.00', 30, 70, 0),
(117, 17184020, 'IBA01', 9, '30.00', 30, 70, 0),
(118, 17184020, 'IM01', 12, '30.00', 30, 70, 0),
(119, 17184020, 'ILA01', 15, '30.00', 30, 70, 0),
(120, 17184020, 'ILU01', 18, '30.00', 30, 70, 0),
(121, 17184021, 'PSY01', 3, '30.00', 30, 70, 0),
(122, 17184021, 'BAQ01', 6, '30.00', 30, 70, 0),
(123, 17184021, 'IBA01', 9, '30.00', 30, 70, 0),
(124, 17184021, 'IM01', 12, '30.00', 30, 70, 0),
(125, 17184021, 'ILA01', 15, '30.00', 30, 70, 0),
(126, 17184021, 'ILU01', 18, '30.00', 30, 70, 0),
(127, 17184022, 'PSY01', 1, '70.00', 30, 70, 1),
(128, 17184022, 'BAQ01', 4, '70.00', 30, 70, 1),
(129, 17184022, 'IBA01', 7, '70.00', 30, 70, 1),
(130, 17184022, 'IM01', 10, '70.00', 30, 70, 1),
(131, 17184022, 'ILA01', 13, '70.00', 30, 70, 1),
(132, 17184022, 'ILU01', 17, '50.00', 30, 70, 1),
(133, 17184023, 'PSY01', 1, '70.00', 30, 70, 1),
(134, 17184023, 'BAQ01', 4, '70.00', 30, 70, 1),
(135, 17184023, 'IBA01', 7, '70.00', 30, 70, 1),
(136, 17184023, 'IM01', 10, '70.00', 30, 70, 1),
(137, 17184023, 'ILA01', 13, '70.00', 30, 70, 1),
(138, 17184023, 'ILU01', 18, '30.00', 30, 70, 0),
(139, 17184024, 'PSY01', 1, '70.00', 30, 70, 1),
(140, 17184024, 'BAQ01', 4, '70.00', 30, 70, 1),
(141, 17184024, 'IBA01', 7, '70.00', 30, 70, 1),
(142, 17184024, 'IM01', 10, '70.00', 30, 70, 1),
(143, 17184024, 'ILA01', 14, '50.00', 30, 70, 1),
(144, 17184024, 'ILU01', 16, '70.00', 30, 70, 1),
(145, 17184025, 'PSY01', 1, '70.00', 30, 70, 1),
(146, 17184025, 'BAQ01', 4, '70.00', 30, 70, 1),
(147, 17184025, 'IBA01', 7, '70.00', 30, 70, 1),
(148, 17184025, 'IM01', 10, '70.00', 30, 70, 1),
(149, 17184025, 'ILA01', 15, '30.00', 30, 70, 0),
(150, 17184025, 'ILU01', 16, '70.00', 30, 70, 1),
(151, 17184026, 'PSY01', 1, '70.00', 30, 70, 1),
(152, 17184026, 'BAQ01', 4, '70.00', 30, 70, 1),
(153, 17184026, 'IBA01', 7, '70.00', 30, 70, 1),
(154, 17184026, 'IM01', 11, '50.00', 30, 70, 1),
(155, 17184026, 'ILA01', 13, '70.00', 30, 70, 1),
(156, 17184026, 'ILU01', 16, '70.00', 30, 70, 1),
(157, 17184027, 'PSY01', 1, '70.00', 30, 70, 1),
(158, 17184027, 'BAQ01', 4, '70.00', 30, 70, 1),
(159, 17184027, 'IBA01', 7, '70.00', 30, 70, 1),
(160, 17184027, 'IM01', 12, '30.00', 30, 70, 0),
(161, 17184027, 'ILA01', 13, '70.00', 30, 70, 1),
(162, 17184027, 'ILU01', 16, '70.00', 30, 70, 1),
(163, 17184028, 'PSY01', 3, '30.00', 30, 70, 0),
(164, 17184028, 'BAQ01', 6, '30.00', 30, 70, 0),
(165, 17184028, 'IBA01', 9, '30.00', 30, 70, 0),
(166, 17184028, 'IM01', 12, '30.00', 30, 70, 0),
(167, 17184028, 'ILA01', 15, '30.00', 30, 70, 0),
(168, 17184028, 'ILU01', 18, '30.00', 30, 70, 0),
(169, 17184029, 'PSY01', 1, '70.00', 30, 70, 1),
(170, 17184029, 'BAQ01', 4, '70.00', 30, 70, 1),
(171, 17184029, 'IBA01', 8, '50.00', 30, 70, 1),
(172, 17184029, 'IM01', 10, '70.00', 30, 70, 1),
(173, 17184029, 'ILA01', 13, '70.00', 30, 70, 1),
(174, 17184029, 'ILU01', 16, '70.00', 30, 70, 1),
(175, 17184030, 'PSY01', 1, '70.00', 30, 70, 1),
(176, 17184030, 'BAQ01', 4, '70.00', 30, 70, 1),
(177, 17184030, 'IBA01', 9, '30.00', 30, 70, 0),
(178, 17184030, 'IM01', 10, '70.00', 30, 70, 1),
(179, 17184030, 'ILA01', 13, '70.00', 30, 70, 1),
(180, 17184030, 'ILU01', 16, '70.00', 30, 70, 1),
(181, 17184031, 'PSY01', 1, '70.00', 30, 70, 1),
(182, 17184031, 'BAQ01', 5, '50.00', 30, 70, 1),
(183, 17184031, 'IBA01', 7, '70.00', 30, 70, 1),
(184, 17184031, 'IM01', 10, '70.00', 30, 70, 1),
(185, 17184031, 'ILA01', 13, '70.00', 30, 70, 1),
(186, 17184031, 'ILU01', 16, '70.00', 30, 70, 1),
(187, 17184032, 'PSY01', 3, '30.00', 30, 70, 0),
(188, 17184032, 'BAQ01', 6, '30.00', 30, 70, 0),
(189, 17184032, 'IBA01', 9, '30.00', 30, 70, 0),
(190, 17184032, 'IM01', 12, '30.00', 30, 70, 0),
(191, 17184032, 'ILA01', 15, '30.00', 30, 70, 0),
(192, 17184032, 'ILU01', 18, '30.00', 30, 70, 0),
(193, 17184033, 'PSY01', 1, '70.00', 30, 70, 1),
(194, 17184033, 'BAQ01', 6, '30.00', 30, 70, 0),
(195, 17184033, 'IBA01', 7, '70.00', 30, 70, 1),
(196, 17184033, 'IM01', 10, '70.00', 30, 70, 1),
(197, 17184033, 'ILA01', 13, '70.00', 30, 70, 1),
(198, 17184033, 'ILU01', 16, '70.00', 30, 70, 1),
(199, 17184034, 'PSY01', 2, '50.00', 30, 70, 1),
(200, 17184034, 'BAQ01', 4, '70.00', 30, 70, 1),
(201, 17184034, 'IBA01', 7, '70.00', 30, 70, 1),
(202, 17184034, 'IM01', 10, '70.00', 30, 70, 1),
(203, 17184034, 'ILA01', 13, '70.00', 30, 70, 1),
(204, 17184034, 'ILU01', 16, '70.00', 30, 70, 1),
(205, 17184035, 'PSY01', 3, '30.00', 30, 70, 0),
(206, 17184035, 'BAQ01', 4, '70.00', 30, 70, 1),
(207, 17184035, 'IBA01', 7, '70.00', 30, 70, 1),
(208, 17184035, 'IM01', 10, '70.00', 30, 70, 1),
(209, 17184035, 'ILA01', 13, '70.00', 30, 70, 1),
(210, 17184035, 'ILU01', 16, '70.00', 30, 70, 1),
(211, 17184036, 'PSY01', 1, '70.00', 30, 70, 1),
(212, 17184036, 'BAQ01', 4, '70.00', 30, 70, 1),
(213, 17184036, 'IBA01', 7, '70.00', 30, 70, 1),
(214, 17184036, 'IM01', 10, '70.00', 30, 70, 1),
(215, 17184036, 'ILA01', 13, '70.00', 30, 70, 1),
(216, 17184036, 'ILU01', 16, '70.00', 30, 70, 1),
(217, 17184037, 'PSY01', 1, '70.00', 30, 70, 1),
(218, 17184037, 'BAQ01', 4, '70.00', 30, 70, 1),
(219, 17184037, 'IBA01', 7, '70.00', 30, 70, 1),
(220, 17184037, 'IM01', 10, '70.00', 30, 70, 1),
(221, 17184037, 'ILA01', 13, '70.00', 30, 70, 1),
(222, 17184037, 'ILU01', 17, '50.00', 30, 70, 1),
(223, 17184038, 'PSY01', 3, '30.00', 30, 70, 0),
(224, 17184038, 'BAQ01', 6, '30.00', 30, 70, 0),
(225, 17184038, 'IBA01', 9, '30.00', 30, 70, 0),
(226, 17184038, 'IM01', 11, '50.00', 30, 70, 1),
(227, 17184038, 'ILA01', 14, '50.00', 30, 70, 1),
(228, 17184038, 'ILU01', 17, '50.00', 30, 70, 1),
(229, 17184039, 'PSY01', 2, '50.00', 30, 70, 1),
(230, 17184039, 'BAQ01', 6, '30.00', 30, 70, 0),
(231, 17184039, 'IBA01', 9, '30.00', 30, 70, 0),
(232, 17184039, 'IM01', 12, '30.00', 30, 70, 0),
(233, 17184039, 'ILA01', 14, '50.00', 30, 70, 1),
(234, 17184039, 'ILU01', 17, '50.00', 30, 70, 1),
(245, 17184040, 'ILA01', 13, '70.00', 30, 70, 1),
(243, 17184040, 'IBA01', 8, '50.00', 30, 70, 1),
(235, 17184015, 'PSY01', 1, '70.00', 30, 70, 1),
(236, 17184015, 'BAQ01', 6, '30.00', 30, 70, 0),
(237, 17184015, 'IBA01', 7, '70.00', 30, 70, 1),
(238, 17184015, 'IM01', 10, '70.00', 30, 70, 1),
(239, 17184015, 'ILA01', 13, '70.00', 30, 70, 1),
(240, 17184015, 'ILU01', 16, '70.00', 30, 70, 1),
(247, 17184001, 'IU01', 19, '70.00', 0, 70, 1),
(248, 17184001, 'IA01', 22, '70.00', 0, 70, 1),
(249, 17184002, 'IU01', 19, '70.00', 0, 70, 1),
(250, 17184002, 'IA01', 24, '30.00', 0, 70, 0),
(251, 17184003, 'IU01', 19, '70.00', 0, 70, 1),
(252, 17184003, 'IA01', 23, '50.00', 0, 70, 1),
(253, 17184004, 'IU01', 19, '70.00', 0, 70, 1),
(254, 17184004, 'IA01', 22, '70.00', 0, 70, 1),
(255, 17184005, 'IU01', 20, '50.00', 0, 70, 1),
(256, 17184005, 'IA01', 24, '30.00', 0, 70, 0),
(257, 17184006, 'IU01', 20, '50.00', 0, 70, 1),
(258, 17184006, 'IA01', 23, '50.00', 0, 70, 1),
(259, 17184007, 'IU01', 19, '70.00', 0, 70, 1),
(260, 17184007, 'IA01', 24, '30.00', 0, 70, 0),
(261, 17184008, 'IU01', 21, '30.00', 0, 70, 0),
(262, 17184008, 'IA01', 22, '70.00', 0, 70, 1),
(263, 17184009, 'IU01', 21, '30.00', 0, 70, 0),
(264, 17184009, 'IA01', 22, '70.00', 0, 70, 1),
(265, 17184010, 'IU01', 19, '70.00', 0, 70, 1),
(266, 17184010, 'IA01', 22, '70.00', 0, 70, 1),
(267, 17184011, 'IU01', 20, '50.00', 0, 70, 1),
(268, 17184011, 'IA01', 23, '50.00', 0, 70, 1),
(269, 17184012, 'IU01', 21, '30.00', 0, 70, 0),
(270, 17184012, 'IA01', 24, '30.00', 0, 70, 0),
(271, 17184013, 'IU01', 19, '70.00', 0, 70, 1),
(272, 17184013, 'IA01', 24, '30.00', 0, 70, 0),
(273, 17184014, 'IU01', 20, '50.00', 0, 70, 1),
(274, 17184014, 'IA01', 22, '70.00', 0, 70, 1),
(275, 17184015, 'IU01', 21, '30.00', 0, 70, 0),
(276, 17184015, 'IA01', 23, '50.00', 0, 70, 1),
(277, 17184016, 'IU01', 20, '50.00', 0, 70, 1),
(278, 17184016, 'IA01', 22, '70.00', 0, 70, 1),
(279, 17184017, 'IU01', 19, '70.00', 0, 70, 1),
(280, 17184017, 'IA01', 24, '30.00', 0, 70, 0),
(281, 17184018, 'IU01', 20, '50.00', 0, 70, 1),
(282, 17184018, 'IA01', 22, '70.00', 0, 70, 1),
(283, 17184019, 'IU01', 21, '30.00', 0, 70, 0),
(284, 17184019, 'IA01', 24, '30.00', 0, 70, 0),
(285, 17184020, 'IU01', 20, '50.00', 0, 70, 1),
(286, 17184020, 'IA01', 22, '70.00', 0, 70, 1),
(287, 17184021, 'IU01', 19, '70.00', 0, 70, 1),
(288, 17184021, 'IA01', 23, '50.00', 0, 70, 1),
(289, 17184022, 'IU01', 20, '50.00', 0, 70, 1),
(290, 17184022, 'IA01', 24, '30.00', 0, 70, 0),
(291, 17184023, 'IU01', 20, '50.00', 0, 70, 1),
(292, 17184023, 'IA01', 24, '30.00', 0, 70, 0),
(293, 17184024, 'IU01', 21, '30.00', 0, 70, 0),
(294, 17184024, 'IA01', 23, '50.00', 0, 70, 1),
(295, 17184025, 'IU01', 20, '50.00', 0, 70, 1),
(296, 17184025, 'IA01', 24, '30.00', 0, 70, 0),
(297, 17184026, 'IU01', 20, '50.00', 0, 70, 1),
(298, 17184026, 'IA01', 22, '70.00', 0, 70, 1),
(299, 17184027, 'IU01', 19, '70.00', 0, 70, 1),
(300, 17184027, 'IA01', 22, '70.00', 0, 70, 1),
(301, 17184028, 'IU01', 20, '50.00', 0, 70, 1),
(302, 17184028, 'IA01', 22, '70.00', 0, 70, 1),
(303, 17184029, 'IU01', 19, '70.00', 0, 70, 1),
(304, 17184029, 'IA01', 23, '50.00', 0, 70, 1),
(305, 17184030, 'IU01', 20, '50.00', 0, 70, 1),
(306, 17184030, 'IA01', 24, '30.00', 0, 70, 0),
(307, 17184031, 'IU01', 20, '50.00', 0, 70, 1),
(308, 17184031, 'IA01', 23, '50.00', 0, 70, 1),
(309, 17184032, 'IU01', 19, '70.00', 0, 70, 1),
(310, 17184032, 'IA01', 23, '50.00', 0, 70, 1),
(311, 17184033, 'IU01', 20, '50.00', 0, 70, 1),
(312, 17184033, 'IA01', 23, '50.00', 0, 70, 1),
(313, 17184034, 'IU01', 21, '30.00', 0, 70, 0),
(314, 17184034, 'IA01', 24, '30.00', 0, 70, 0),
(315, 17184035, 'IU01', 20, '50.00', 0, 70, 1),
(316, 17184035, 'IA01', 23, '50.00', 0, 70, 1),
(317, 17184036, 'IU01', 20, '50.00', 0, 70, 1),
(318, 17184036, 'IA01', 24, '30.00', 0, 70, 0),
(319, 17184037, 'IU01', 20, '50.00', 0, 70, 1),
(320, 17184037, 'IA01', 23, '50.00', 0, 70, 1),
(321, 17184038, 'IU01', 19, '70.00', 0, 70, 1),
(322, 17184038, 'IA01', 23, '50.00', 0, 70, 1),
(323, 17184039, 'IU01', 19, '70.00', 0, 70, 1),
(324, 17184039, 'IA01', 23, '50.00', 0, 70, 1),
(325, 17184040, 'IU01', NULL, '0.00', 0, 70, 0),
(326, 17184040, 'IA01', NULL, '0.00', 0, 70, 0);

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE IF NOT EXISTS `santri` (
  `nisn` int(10) NOT NULL,
  `nama_santri` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `no_peserta` int(10) NOT NULL,
  `jk` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `ujian` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nama_ortu` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `biaya` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `hasil` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `bayar` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `nilai_akhir` int(4) NOT NULL,
  `status` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `santri`
--

INSERT INTO `santri` (`nisn`, `nama_santri`, `no_peserta`, `jk`, `ujian`, `nama_ortu`, `biaya`, `hasil`, `bayar`, `nilai_akhir`, `status`) VALUES
(17184001, 'Eka J Rahmawati', 17184001, 'Perempuan', 'Aliyah', 'Ulfah', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184002, 'Safwan Nur Fauzan', 17184002, 'Laki-laki', 'Aliyah', 'Jum Sawung', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184003, 'Harits Calvin Dzulfaqar', 17184003, 'Laki-laki', 'Aliyah', 'Asep Hadiyan', 'Orangtua', 'Lebih', 'Lunas', 90, 'LULUS'),
(17184004, 'Dzakwan Kemal Iswan', 17184004, 'Laki-laki', 'Aliyah', 'Euis Nursusianah', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184005, 'Devia Ghaida Hafidz', 17184005, 'Perempuan', 'Aliyah', 'Deden Hendarto', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184006, 'Ayu Nadila', 17184006, 'Perempuan', 'Aliyah', 'Arifah K', 'Wali', 'Lebih', 'Lunas', 40, 'DI TANGGUHKAN'),
(17184007, 'Muhajir Nur Haq', 17184007, 'Laki-laki', 'Aliyah', 'Taufiqurohman', 'Orangtua', 'Lebih', 'Lunas', 90, 'LULUS'),
(17184008, 'Silvia Gusmiati', 17184008, 'Perempuan', 'Aliyah', 'Lili Karmawan', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184009, 'Khaira Shaliha', 17184009, 'Perempuan', 'Aliyah', 'M Adil Akbar', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184010, 'Sufi Maharani', 17184010, 'Perempuan', 'Aliyah', 'Neneng Masitoh', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184011, 'Mutia Amelina Rahmah', 17184011, 'Perempuan', 'Aliyah', 'M Rusliani', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184012, 'Fulan', 17184012, 'Laki-laki', 'Aliyah', 'Fulan', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184013, 'Nurul Isma', 17184013, 'Perempuan', 'Aliyah', 'Asep', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184014, 'Syifa Lutfia', 17184014, 'Perempuan', 'Aliyah', 'Iwan', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184015, 'M Irsyad Hasballah Rompas', 17184015, 'Laki-laki', 'Aliyah', 'Rinaldy Ranpas', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184016, 'Putri Mutia Rahman', 17184016, 'Perempuan', 'Aliyah', 'Abdul Rohman', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184017, 'Faris Awaludin', 17184017, 'Laki-laki', 'Aliyah', 'Sri Mulyawan', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184018, 'Fasya Mazaya Asri Kania', 17184018, 'Perempuan', 'Aliyah', 'Asep Sutiana, SP', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184019, 'Almira Pinkan Carissa', 17184019, 'Perempuan', 'Aliyah', 'Lina Herlina', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184020, 'Nur Intan Lidyana Puspitasari', 17184020, 'Perempuan', 'Aliyah', 'Budi Haryanto', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184021, 'Siti Fatimah Nur Azizah', 17184021, 'Perempuan', 'Aliyah', 'H. Ayi Marfu', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184022, 'Raffly Al-Zikri', 17184022, 'Laki-laki', 'Aliyah', 'Endang Stiawati', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184023, 'Nisrina Salma Mardiah', 17184023, 'Perempuan', 'Aliyah', 'Abdul hakim', 'Orangtua', 'Lebih', 'Lunas', 90, 'LULUS'),
(17184024, 'Naila Salsabila', 17184024, 'Perempuan', 'Aliyah', 'M Arief', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184025, 'Raihan Yusuf Deis A', 17184025, 'Laki-laki', 'Aliyah', 'Dede Sopandi', 'Orangtua', 'Lebih', 'Lunas', 90, 'LULUS'),
(17184026, 'Rizki Firmansyah', 17184026, 'Laki-laki', 'Aliyah', 'Ahmad Dahlan', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184027, 'Salwa Fauziayyah', 17184027, 'Perempuan', 'Aliyah', 'Bpk. Mumu A.M', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184028, 'Mira Nuhara Sunarya', 17184028, 'Perempuan', 'Aliyah', 'Bpk. Ujang Sunarya', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184029, 'Satura Ariea Sena', 17184029, 'Laki-laki', 'Aliyah', 'Agus Witarsa', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184030, 'Alif Saefulloh', 17184030, 'Laki-laki', 'Aliyah', 'Abdul Kosim', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184031, 'Berliana Mutiara', 17184031, 'Perempuan', 'Aliyah', 'Daman', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184032, 'Dafa Muhammad Firmansyah', 17184032, 'Laki-laki', 'Aliyah', 'Ahmad Romdani', 'Wali', '2juta', '50%', 0, 'TIDAK LULUS'),
(17184033, 'Rizal Ipriansyah', 17184033, 'Laki-laki', 'Aliyah', 'Ipin Sopian', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184034, 'Rahma Devia', 17184034, 'Perempuan', 'Aliyah', 'Rahmat Gunadi', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184035, 'Candi Yora Pratiwi', 17184035, 'Perempuan', 'Aliyah', 'Deni Romansyah', 'Orangtua', 'Lebih', 'Lunas', 80, 'LULUS'),
(17184036, 'Muhammad Revansa Adriansyah', 17184036, 'Laki-laki', 'Aliyah', 'Nurhasanah', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184037, 'Diane Fauziyyah', 17184037, 'Perempuan', 'Aliyah', 'Suharjadi Sunarja', 'Orangtua', 'Lebih', 'Lunas', 100, 'LULUS'),
(17184038, 'Solehatun Salamah', 17184038, 'Perempuan', 'Aliyah', 'Tomy', 'Wali', 'Lebih', 'Lunas', 40, 'DI TANGGUHKAN'),
(17184039, 'Eriza Hanzani', 17184039, 'Perempuan', 'Aliyah', 'Sumardi', 'Wali', 'Lebih', 'Lunas', 40, 'DI TANGGUHKAN');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `nama` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `akses` enum('tu','ppsb') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `nama`, `akses`) VALUES
('tu', 'b6b4ce6df035dcfaa26f3bc32fb89e6a', 'Tata Usaha', 'tu'),
('ppsb', '4ff6ae6324a3474f040989cfbafa45bb', 'PPSB', 'ppsb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
 ADD PRIMARY KEY (`kode_bobot`);

--
-- Indexes for table `hasil_maut`
--
ALTER TABLE `hasil_maut`
 ADD PRIMARY KEY (`id_hasil`), ADD UNIQUE KEY `kd_alternatif` (`nisn`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
 ADD PRIMARY KEY (`kode_kriteria`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
 ADD PRIMARY KEY (`id_nilai`), ADD UNIQUE KEY `nik_penilai` (`nisn`,`kode_kriteria`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
 ADD PRIMARY KEY (`nisn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot_nilai`
--
ALTER TABLE `bobot_nilai`
MODIFY `kode_bobot` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `hasil_maut`
--
ALTER TABLE `hasil_maut`
MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=954;
--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
MODIFY `id_nilai` int(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
