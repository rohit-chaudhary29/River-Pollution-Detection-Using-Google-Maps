-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2017 at 10:57 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `insert`
--

-- --------------------------------------------------------

--
-- Table structure for table `insert`
--

CREATE TABLE IF NOT EXISTS `insert` (
  `id` varchar(255) NOT NULL,
  `area` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `population` double NOT NULL,
  `arealength` int(11) NOT NULL,
  `car_repair` int(11) NOT NULL,
  `car_wash` int(11) NOT NULL,
  `gas_station` int(11) NOT NULL,
  `hospital` int(11) NOT NULL,
  `laundry` int(11) NOT NULL,
  `park` int(11) NOT NULL,
  `zoo` int(11) NOT NULL,
  `university` int(11) NOT NULL,
  `school` int(11) NOT NULL,
  `industry` int(11) NOT NULL,
  `public` varchar(100) NOT NULL,
  `impact` varchar(100) NOT NULL,
  `pimpact` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insert`
--

INSERT INTO `insert` (`id`, `area`, `latitude`, `longitude`, `population`, `arealength`, `car_repair`, `car_wash`, `gas_station`, `hospital`, `laundry`, `park`, `zoo`, `university`, `school`, `industry`, `public`, `impact`, `pimpact`) VALUES
('ganga', 'Ghaziabad', 28.6789878, 77.5106601, 9898, 55, 14, 16, 11, 9, 1, 9, 16, 14, 8, 42, '56', '0.75', '7.577288341079E-5'),
('ganga', 'Ghaziabad', 28.6789878, 77.5106601, 9, 65, 7, 5, 16, 16, 8, 3, 2, 20, 14, 36, '55', '0.65454545454545', '0.072727272727273'),
('yamuna', 'Ghaziabad', 28.6789878, 77.5106601, 54, 44, 12, 7, 16, 13, 4, 8, 3, 12, 10, 39, '46', '0.84782608695652', '0.015700483091787'),
('ganga', 'Dasna', 28.679011700000004, 77.5107443, 22, 44, 5, 5, 12, 9, 6, 8, 2, 11, 23, 28, '53', '0.52830188679245', '0.02401372212693'),
('ganga', 'Dasna', 28.6789627, 77.51074059999999, 0, 0, 10, 6, 22, 14, 10, 6, 3, 10, 20, 48, '53', '0.90566037735849', ''),
('ganga', 'Dasna', 28.6789627, 77.51074059999999, 0, 0, 6, 3, 31, 8, 9, 9, 2, 21, 25, 49, '65', '0.75384615384615', ''),
('ganga', 'Guwahati', 1, 2, 22, 454, 6, 8, 8, 7, 6, 2, 3, 12, 13, 28, '37', '0.75675675675676', '0.034398034398034');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
