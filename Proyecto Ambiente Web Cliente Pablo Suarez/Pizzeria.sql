-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2018 at 12:23 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE SCHEMA pizzeria;
USE pizzeria;
--
-- Database: `Pizzeria`
--

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes`
--

CREATE TABLE `ingredientes` (
  `nombre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ingredientes`
--

INSERT INTO `ingredientes` (`nombre`, `tipo`) VALUES
('cebolla', 'vegetal'),
('chile', 'vegetal'),
('hongo', 'vegetal'),
('jamon', 'carne'),
('peperoni', 'carne'),
('queso', 'vegetal'),
('salami', 'carne');

-- --------------------------------------------------------

--
-- Table structure for table `ingredientes_x_pizzas`
--

CREATE TABLE `ingredientes_x_pizzas` (
  `pizza` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ingrediente` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ingredientes_x_pizzas`
--

INSERT INTO `ingredientes_x_pizzas` (`pizza`, `ingrediente`) VALUES
('GrdPep', 'peperoni'),
('GrdPep', 'queso'),
('GrdVeg', 'cebolla'),
('GrdVeg', 'chile'),
('GrdVeg', 'hongo'),
('GrdVeg', 'queso'),
('MedSup', 'cebolla'),
('MedSup', 'chile'),
('MedSup', 'hongo'),
('MedSup', 'jamon'),
('MedSup', 'queso'),
('PeqJam', 'jamon'),
('PeqJam', 'queso'),
('PerTodo', 'cebolla'),
('PerTodo', 'chile'),
('PerTodo', 'hongo'),
('PerTodo', 'jamon'),
('PerTodo', 'peperoni'),
('PerTodo', 'queso'),
('PerTodo', 'salami');

-- --------------------------------------------------------

--
-- Table structure for table `ordenes`
--

CREATE TABLE `ordenes` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cliente` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ordenes`
--

INSERT INTO `ordenes` (`id`, `fecha`, `cliente`) VALUES
('psu14307', '11/11/2018 14:30', 'psuarez'),
('psu143241', '11/11/2018 14:32', 'psuarez'),
('psu152033', '11/11/2018 15:20', 'psuarez'),
('psu163027', '11/11/2018 16:30', 'psuarez'),
('psu165442', '11/11/2018 16:54', 'psuarez'),
('psu17236', '11/11/2018 17:23', 'psuarez');

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `nombre`, `precio`) VALUES
('GrdPep', 'Peperoni Grande', 10000),
('GrdVeg', 'Grande Vegetales', 6000),
('MedSup', 'Mediana Suprema', 7500),
('PeqJam', 'Pequeña Jamon', 5000),
('PerTodo', 'Personal Todo', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `pizzas_x_orden`
--

CREATE TABLE `pizzas_x_orden` (
  `orden` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `pizza` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `masa` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `pizzas_x_orden`
--

INSERT INTO `pizzas_x_orden` (`orden`, `pizza`, `masa`, `cantidad`) VALUES
('psu143241', 'GrdPep', 'Gruesa', 1),
('psu143241', 'MedSup', 'Delgada', 1),
('psu143241', 'PeqJam', 'Gruesa', 1),
('psu152033', 'PerTodo', 'Delgada', 1),
('psu163027', 'GrdPep', 'Delgada', 2),
('psu165442', 'GrdVeg', 'Delgada', 3),
('psu17236', 'GrdVeg', 'Delgada', 1),
('psu17236', 'MedSup', 'Delgada', 1),
('psu17236', 'PeqJam', 'Delgada', 1),
('psu17236', 'PerTodo', 'Delgada', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tipos_masa`
--

CREATE TABLE `tipos_masa` (
  `tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `tipos_masa`
--

INSERT INTO `tipos_masa` (`tipo`) VALUES
('Delgada'),
('Gruesa'),
('Relleno');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `username` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`username`, `nombre`, `password`) VALUES
('1', '1', '1'),
('2', '2', '2'),
('kimi', 'kimberly', '000'),
('pksf', 'Pablo', '4321'),
('psuarez', 'Pablo Suarez', '123'),
('test', 'test', '123'),
('testing', 'teste', 'Test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`nombre`);

--
-- Indexes for table `ingredientes_x_pizzas`
--
ALTER TABLE `ingredientes_x_pizzas`
  ADD PRIMARY KEY (`pizza`,`ingrediente`),
  ADD KEY `ingrediente` (`ingrediente`);

--
-- Indexes for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pizzas_x_orden`
--
ALTER TABLE `pizzas_x_orden`
  ADD PRIMARY KEY (`orden`,`pizza`),
  ADD KEY `pizza` (`pizza`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ingredientes_x_pizzas`
--
ALTER TABLE `ingredientes_x_pizzas`
  ADD CONSTRAINT `ingredientes_x_pizzas_ibfk_1` FOREIGN KEY (`pizza`) REFERENCES `pizzas` (`id`),
  ADD CONSTRAINT `ingredientes_x_pizzas_ibfk_2` FOREIGN KEY (`ingrediente`) REFERENCES `ingredientes` (`nombre`);

--
-- Constraints for table `ordenes`
--
ALTER TABLE `ordenes`
  ADD CONSTRAINT `ordenes_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `usuarios` (`username`);

--
-- Constraints for table `pizzas_x_orden`
--
ALTER TABLE `pizzas_x_orden`
  ADD CONSTRAINT `pizzas_x_orden_ibfk_1` FOREIGN KEY (`orden`) REFERENCES `ordenes` (`id`),
  ADD CONSTRAINT `pizzas_x_orden_ibfk_2` FOREIGN KEY (`pizza`) REFERENCES `pizzas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
