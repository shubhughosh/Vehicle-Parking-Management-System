-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2020 at 09:19 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_vehicle`
--

CREATE TABLE IF NOT EXISTS `add_vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_no` varchar(200) NOT NULL,
  `parking_area_no` varchar(200) NOT NULL,
  `vehicle_type` varchar(200) NOT NULL,
  `parking_charge` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `arrival_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_vehicle`
--

INSERT INTO `add_vehicle` (`id`, `vehicle_no`, `parking_area_no`, `vehicle_type`, `parking_charge`, `status`, `arrival_time`) VALUES
(1, 'BR 11N 4576', '2', 'Four Wheeler', '80', '1', '2020-04-19 19:34:58'),
(2, 'BR 11N 4566', '2', 'Four Wheeler', '80', '0', '2020-04-19 19:36:18'),
(3, 'test', '10', 'Cycle', '10', '1', '2020-04-22 16:33:09'),
(4, 'test1', '10', 'Cycle', '10', '0', '2020-04-22 16:34:00'),
(5, 'BR-23 23323 23', '2', 'Four Wheeler', '80', '0', '2020-04-22 19:43:47'),
(6, 'test', '10', 'Cycle', '10', '0', '2020-04-22 19:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'VPMS ADMIN', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_id` int(11) NOT NULL,
  `parking_area_no` varchar(100) NOT NULL,
  `vehicle_type` varchar(100) NOT NULL,
  `vehicle_limit` varchar(200) NOT NULL,
  `parking_charge` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '0',
  `doc` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `parking_area_no`, `vehicle_type`, `vehicle_limit`, `parking_charge`, `status`, `doc`) VALUES
(1, '2', 'Four Wheeler', '2', '80', '1', '2020-04-19 19:33:44'),
(2, '10', 'Cycle', '2', '10', '1', '2020-04-22 16:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
