-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2018 at 08:03 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

DROP SCHEMA IF EXISTS equifax;
CREATE SCHEMA equifax;
USE equifax;
SET AUTOCOMMIT = 0;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `equifax`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--
DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `nombre` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `acceso` varchar(32) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `clave`, `acceso`) VALUES
('00', '69', 'noAdmin'),
('01', '00', 'noAdmin'),
('02', '46', 'noAdmin'),
('03', '52', 'noAdmin'),
('04', '76', 'noAdmin'),
('05', '32', 'noAdmin'),
('06', '77', 'noAdmin'),
('07', '93', 'noAdmin'),
('08', '57', 'noAdmin'),
('09', '02', 'noAdmin'),
('10', '74', 'noAdmin'),
('11', '34', 'noAdmin'),
('12', '93', 'noAdmin'),
('13', '50', 'Admin'),
('14', '00', 'noAdmin'),
('15', '03', 'noAdmin'),
('16', '73', 'noAdmin'),
('17', '26', 'noAdmin'),
('18', '33', 'noAdmin'),
('19', '36', 'noAdmin'),
('20', '02', 'noAdmin'),
('21', '29', 'noAdmin'),
('22', '77', 'noAdmin'),
('23', '52', 'noAdmin'),
('24', '01', 'noAdmin'),
('25', '79', 'noAdmin'),
('26', '14', 'noAdmin'),
('27', '36', 'noAdmin'),
('28', '17', 'noAdmin'),
('29', '31', 'noAdmin'),
('30', '71', 'noAdmin'),
('31', '86', 'noAdmin'),
('32', '22', 'noAdmin'),
('33', '94', 'noAdmin'),
('34', '02', 'noAdmin'),
('35', '74', 'noAdmin'),
('36', '70', 'noAdmin'),
('37', '51', 'noAdmin'),
('38', '68', 'noAdmin'),
('39', '35', 'noAdmin'),
('40', '78', 'noAdmin'),
('41', '44', 'noAdmin'),
('42', '88', 'Admin'),
('43', '73', 'noAdmin'),
('44', '20', 'noAdmin'),
('45', '07', 'noAdmin'),
('46', '78', 'noAdmin'),
('47', '49', 'noAdmin'),
('48', '21', 'noAdmin'),
('49', '83', 'noAdmin'),
('50', '98', 'noAdmin'),
('51', '62', 'noAdmin'),
('52', '05', 'noAdmin'),
('53', '15', 'noAdmin'),
('54', '51', 'noAdmin'),
('55', '07', 'noAdmin'),
('56', '37', 'noAdmin'),
('57', '51', 'noAdmin'),
('58', '06', 'noAdmin'),
('59', '53', 'noAdmin'),
('60', '96', 'noAdmin'),
('61', '82', 'noAdmin'),
('62', '80', 'noAdmin'),
('63', '84', 'noAdmin'),
('64', '63', 'noAdmin'),
('65', '30', 'noAdmin'),
('66', '02', 'noAdmin'),
('67', '51', 'noAdmin'),
('68', '97', 'noAdmin'),
('69', '78', 'Admin'),
('70', '71', 'noAdmin'),
('71', '92', 'noAdmin'),
('72', '31', 'noAdmin'),
('73', '76', 'noAdmin'),
('74', '23', 'noAdmin'),
('75', '07', 'noAdmin'),
('76', '72', 'noAdmin'),
('77', '72', 'noAdmin'),
('78', '06', 'noAdmin'),
('79', '02', 'noAdmin'),
('80', '12', 'noAdmin'),
('81', '21', 'noAdmin'),
('82', '15', 'noAdmin'),
('83', '57', 'noAdmin'),
('84', '43', 'noAdmin'),
('85', '05', 'noAdmin'),
('86', '47', 'noAdmin'),
('87', '84', 'noAdmin'),
('88', '49', 'noAdmin'),
('89', '24', 'noAdmin'),
('90', '04', 'noAdmin'),
('91', '02', 'noAdmin'),
('92', '07', 'noAdmin'),
('93', '70', 'noAdmin'),
('94', '27', 'noAdmin'),
('95', '42', 'noAdmin'),
('96', '90', 'noAdmin'),
('97', '39', 'noAdmin'),
('98', '13', 'noAdmin'),
('99', '17', 'noAdmin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
