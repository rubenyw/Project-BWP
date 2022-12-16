-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 04:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_actionfigure`
--

-- --------------------------------------------------------

--
-- Table structure for table `actionfigure`
--

DROP TABLE IF EXISTS `actionfigure`;
CREATE TABLE IF NOT EXISTS `actionfigure` (
  `af_id` varchar(5) NOT NULL,
  `af_name` varchar(500) NOT NULL,
  `af_price` double NOT NULL,
  `af_stock` int(10) NOT NULL,
  `af_status` int(10) NOT NULL,
  `af_se_id` varchar(5) NOT NULL,
  PRIMARY KEY (`af_id`),
  KEY `FKSERIES_ACTIONFIGURE` (`af_se_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionfigure`
--

INSERT INTO `actionfigure` (`af_id`, `af_name`, `af_price`, `af_stock`, `af_status`, `af_se_id`) VALUES
('AF001', 'Luffy D. Monkey Gear 3 Deluxe Edition 7cm', 1000000, 11, 1, 'SE001'),
('AF002', 'Sasuke Uchiha Susanoo Matakao 3x5cm', 2000000, 5, 1, 'SE002'),
('AF003', 'Son Goku Super Saiyan Anniversary Edition 8cm', 500000, 71, 1, 'SE003'),
('AF004', 'Asta Full Body Figure 7cm', 900000, 28, 1, 'SE004');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actionfigure`
--
ALTER TABLE `actionfigure`
  ADD CONSTRAINT `FKSERIES_ACTIONFIGURE` FOREIGN KEY (`af_se_id`) REFERENCES `series` (`se_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
