-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2022 at 06:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

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
CREATE DATABASE IF NOT EXISTS `db_actionfigure` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_actionfigure`;

-- --------------------------------------------------------

--
-- Table structure for table `actionfigure`
--

DROP TABLE IF EXISTS `actionfigure`;
CREATE TABLE `actionfigure` (
  `af_id` varchar(5) NOT NULL,
  `af_name` varchar(500) NOT NULL,
  `af_price` double NOT NULL,
  `af_stock` int(10) NOT NULL,
  `af_status` int(10) NOT NULL,
  `af_se_id` varchar(5) NOT NULL,
  `af_desc` varchar(255) NOT NULL,
  `af_image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actionfigure`
--

INSERT INTO `actionfigure` (`af_id`, `af_name`, `af_price`, `af_stock`, `af_status`, `af_se_id`, `af_desc`, `af_image_path`) VALUES
('AF001', 'Luffy D. Monkey - Gear 3', 1700000, 11, 1, 'SE001', 'Luffy D. Monkey - Gear 3\r\nSeri : One Piece\r\nTinggi : 15 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF001.jpg'),
('AF002', 'Sasuke Uchiha - Susanoo', 3100000, 5, 1, 'SE002', 'Sasuke Uchiha - Susanoo\r\nSeri : Naruto\r\nTinggi : 23 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF002.jpg'),
('AF003', 'Son Goku - Super Saiyan', 500000, 71, 1, 'SE003', 'Son Goku - Super Saiyan\r\nSeri : Goku\r\nTinggi : 43 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF003.jpg'),
('AF004', 'Asta', 900000, 28, 1, 'SE004', 'Asta\r\nSeri : Black Clover\r\nTinggi : 14 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF004.jpg'),
('AF005', 'Doraemon', 300000, 7, 1, 'SE005', 'Doraemon\r\nSeri : Doraemon\r\nTinggi : 8 cm\r\nMaterial : PVC\r\n', 'assets/GambarFigure/AF005.jpg'),
('AF006', 'Sanji', 4200000, 29, 1, 'SE001', 'Sanji\r\nSeri : One Piece\r\nTinggi : 18 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF006.jpg'),
('AF007', 'Attack Titan', 560000, 8, 1, 'SE006', 'Attack Titan\r\nSeri : Attack on Titan\r\nTinggi : 16 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF007.jpg'),
('AF008', 'Colossal Titan', 400000, 41, 1, 'SE006', 'Colossal Titan\r\nSeri : Attack on Titan\r\nTinggi : 12cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF008.jpg'),
('AF009', 'Denji - Chainsaw Devil', 450000, 22, 1, 'SE007', 'Denji - Chainsaw Devil\r\nSeri : Chainsaw Man\r\nSeri : Naruto\r\nTinggi : 23 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF009.jpg'),
('AF010', 'Naruto - Rasengan', 250000, 56, 1, 'SE002', 'Naruto\r\nSeri : Naruto\r\nTinggi : 12 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF010.jpg'),
('AF011', 'Milizé Vladilena', 1700000, 29, 1, 'SE009', 'Milizé Vladilena\r\nSeri : 86\r\nTinggi : 21 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF011.jpg'),
('AF012', 'Ogiso Setsuna - White Dress', 2700000, 27, 1, 'SE008', 'Ogiso Setsuna - White Dress\r\nSeri : White Album 2\r\nTinggi : 25 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF012.jpg'),
('AF013', 'Ryuk', 270000, 71, 1, 'SE010', 'Ryuk\r\nSeri : Death Note\r\nTinggi : 24 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF013.jpg'),
('AF014', 'Kurosaki Ichigo - Bankai', 600000, 16, 1, 'SE011', 'Kurosaki Ichigo - Bankai\r\nSeri : Bleach\r\nTinggi : 24 cm\r\nMaterial : ABS', 'assets/GambarFigure/AF014.jpg'),
('AF015', 'Sakata Gintoki', 120000, 99, 1, 'SE012', 'Sakata Gintoki\r\nSeri : Gintama\r\nTinggi : 18 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF015.jpg'),
('AF016', 'Touma Kazusa - White Dress', 3900000, 2, 1, 'SE008', 'Touma Kazusa - White Dress\r\nSeri : White Album 2\r\nTinggi : 25 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF016.jpg'),
('AF017', 'Violet Evergarden - Chibi', 190000, 77, 1, 'SE013', 'Violet Evergarden - Chibi\r\nSeri : Violet Evergarden\r\nTinggi : 15 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF017.jpg'),
('AF018', 'Kamado Tanjirou', 1800000, 8, 1, 'SE014', 'Kamado Tanjirou\r\nSeri : Kimetsu no Yaiba\r\nTinggi : 18 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF018.jpg'),
('AF019', 'Megumin', 1650000, 22, 1, 'SE020', 'Megumin\r\nSeri : Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)\r\nTinggi : 25 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF019.jpg'),
('AF020', 'Saber - Combat Outfit', 745000, 4, 1, 'SE017', 'Saber - Combat Outfit\r\nSeri : Fate\r\nTinggi : 20 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF020.jpg'),
('AF021', 'Astolfo - Full Body', 690000, 6, 1, 'SE017', 'Astolfo - Full Body\r\nSeri : Fate\r\nTinggi : 23 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF021.jpg'),
('AF022', 'Lelouch Lamperouge - Emperor', 2100000, 20, 1, 'SE015', 'Lelouch Lamperouge - Emperor\r\nSeri : Code Geass\r\nTinggi : 23 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF022.jpg'),
('AF023', 'Lelouch Lamperouge', 3700000, 9, 1, 'SE015', 'Lelouch Lamperouge - Emperor\r\nSeri : Code Geass\r\nTinggi : 25 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF023.jpg'),
('AF024', 'Nanachi - Fishing', 1750000, 16, 1, 'SE016', 'Nanachi - Fishing\r\nSeri : Made in Abyss\r\nTinggi : 28 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF024.jpg'),
('AF025', 'Gojou Satoru - Hello', 590000, 91, 1, 'SE018', 'Gojou Satoru - Hello\r\nSeri : Jujutsu Kaisen\r\nTinggi : 25 cm\r\nMaterial : PVC\r\n', 'assets/GambarFigure/AF025.jpg'),
('AF026', 'Vegeta - Super Saiyan', 610000, 32, 1, 'SE003', 'Vegeta - Super Saiyan\r\nSeri : Dragon Ball\r\nTinggi : 16 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF026.jpg'),
('AF027', 'Miyazono Kaori - Complete Set', 1500000, 25, 1, 'SE019', 'Miyazono Kaori - Complete Set\r\nSeri : Shigatsu wa Kimi no Uso\r\nTinggi : 20 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF027.jpg'),
('AF028', 'Gon Freecss - Standing on Rock', 1290000, 61, 1, 'SE021', 'Gon Freecss - Standing on Rock\r\nSeri : Hunter x Hunter\r\nTinggi : 16 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF028.jpg'),
('AF029', 'Senkuu - Full Body', 720000, 7, 1, 'SE022', 'Senkuu - Full Body\r\nSeri : Dr. Stone\r\nTinggi : 18 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF029.jpg'),
('AF030', 'Emilia', 1380000, 21, 1, 'SE023', 'Emilia\r\nSeri : Re:Zero kara Hajimeru Isekai Seikatsu\r\nTinggi : 17 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF030.jpg'),
('AF031', 'Esdeath', 1420000, 6, 1, 'SE024', 'Esdeath\r\nSeri : Akame Ga Kill\r\nTinggi : 19 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF031.jpg'),
('AF032', 'Ayanami - Chibi', 290000, 164, 1, 'SE025', 'Ayanami - Chibi\r\nSeri : Azur Lane\r\nTinggi : 12 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF032.jpg'),
('AF033', 'Gilgamesh - Combat Suit', 1900000, 2, 1, 'SE017', 'Gilgamesh - Combat Suit\r\nSeri : Fate\r\nTinggi : 26 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF033.jp'),
('AF034', 'Tohsaka Rin', 780000, 8, 1, 'SE017', 'Tohsaka Rin\r\nSeri : Fate\r\nTinggi : 26 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF034.jp'),
('AF035', 'Archer', 750000, 12, 1, 'SE017', 'Archer\r\nSeri : Fate\r\nTinggi : 25 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF035.jp'),
('AF036', 'Kamado Nezuko', 1500000, 9, 1, 'SE014', 'Kamado Nezuko\r\nSeri : Kimetsu no Yaiba\r\nTinggi : 21 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF036.jp'),
('AF037', 'Aqua', 600000, 19, 1, 'SE020', 'Aqua\r\nSeri : Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)\r\nTinggi : 20 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF037.jp'),
('AF038', 'Ishtar', 790000, 22, 1, 'SE017', 'Ishtar\r\nSeri : Fate\r\nTinggi : 23 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF038.jp'),
('AF039', 'Rem', 450000, 7, 1, 'SE023', 'Rem\r\nSeri : Re:Zero kara Hajimeru Isekai Seikatsu\r\nTinggi : 19 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF039.jp'),
('AF040', 'Ryomen Sukuna', 300000, 72, 1, 'SE018', 'Ryomen Sukuna\r\nSeri : Jujutsu Kaisen\r\nTinggi : 19 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF040.jp'),
('AF041', 'Yuta Okkotsu', 480000, 4, 1, 'SE018', 'Yuta Okkotsu\r\nSeri : Jujutsu Kaisen\r\nTinggi : 17 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF041.jp'),
('AF042', 'Kagura', 1720000, 18, 1, 'SE012', 'Kagura\r\nSeri : Gintama\r\nTinggi : 20 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF042.jp'),
('AF043', 'Akame', 4700000, 17, 1, 'SE024', 'Akame\r\nSeri : Akame Ga Kill\r\nTinggi : 23 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF043.jpg'),
('AF044', 'C.C - Prisoner Suit', 4200000, 4, 1, 'SE015', 'C.C. - Prisoner Suit\r\nSeri : Code Geass\r\nTinggi : 20 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF044.jpg'),
('AF045', 'Echidna - Uniform', 2100000, 27, 1, 'SE023', 'Echidna - Uniform\r\nSeri : Re:Zero kara Hajimeru Isekai Seikatsu\r\nTinggi : 19 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF045.jpg'),
('AF046', 'Makima', 3900000, 15, 1, 'SE007', 'Makima\r\nSeri : Chainsaw Man\r\nTinggi : 23 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF046.jpg'),
('AF047', 'Hyuga Hinata', 1800000, 32, 1, 'SE002', 'Hyuga Hinata\r\nSeri : Naruto\r\nTinggi : 19 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF047.jpg'),
('AF048', 'Megumin - White Dress', 6100000, 2, 1, 'SE020', 'Megumin - White Dress\r\nSeri : Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)\r\nTinggi : 18 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF048.jpg'),
('AF049', 'Dustiness Ford Lalatina', 2700000, 22, 1, 'SE020', 'Dustiness Ford Lalatina\r\nSeri : Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)\r\nTinggi : 21 cm\r\nMaterial : PVC', 'assets/GambarFigure/AF049.jpg'),
('AF050', 'Eris', 2900000, 7, 1, 'SE020', 'Eris\r\nSeri : Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)\r\nTinggi : 20 cm\r\nMaterial : PVC, ABS', 'assets/GambarFigure/AF050.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `ca_us_id` varchar(5) NOT NULL,
  `ca_af_id` varchar(5) NOT NULL,
  `ca_status` varchar(11) NOT NULL,
  `ca_qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ca_us_id`, `ca_af_id`, `ca_status`, `ca_qty`) VALUES
('US001', 'AF016', 'Requested', 1),
('US004', 'AF008', 'Requested', 6);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE `discount` (
  `di_id` varchar(5) NOT NULL,
  `di_nama` varchar(255) NOT NULL,
  `di_value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`di_id`, `di_nama`, `di_value`) VALUES
('DI001', 'Oktoberbahagia', 10),
('DI002', 'Cuci Gudang', 15),
('DI003', 'Promo 11.11', 20),
('DI004', 'Tahun Baru', 25);

-- --------------------------------------------------------

--
-- Table structure for table `dtrans_beli`
--

DROP TABLE IF EXISTS `dtrans_beli`;
CREATE TABLE `dtrans_beli` (
  `db_id` varchar(5) NOT NULL,
  `db_amount` int(10) NOT NULL,
  `db_hb_id` varchar(5) NOT NULL,
  `db_subtotal` double NOT NULL,
  `db_af_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans_beli`
--

INSERT INTO `dtrans_beli` (`db_id`, `db_amount`, `db_hb_id`, `db_subtotal`, `db_af_id`) VALUES
('DB001', 1, 'HB001', 300000, ''),
('DB002', 1, 'HB002', 20900, ''),
('DB003', 2, 'HB003', 15691500, ''),
('DB004', 1, 'HB003', 300000, ''),
('DB005', 3, 'HB004', 28500000, ''),
('DB006', 1, 'HB004', 180000, ''),
('DB007', 1, 'HB005', 185000, ''),
('DB008', 1, 'HB005', 260000, ''),
('DB009', 2, 'HB005', 5392170, ''),
('DB010', 1, 'HB025', 500000, 'AF003'),
('DB011', 1, 'HB026', 1700000, 'AF001');

-- --------------------------------------------------------

--
-- Table structure for table `htrans_beli`
--

DROP TABLE IF EXISTS `htrans_beli`;
CREATE TABLE `htrans_beli` (
  `hb_id` varchar(5) NOT NULL,
  `hb_date` date NOT NULL,
  `hb_total` double NOT NULL,
  `hb_customerid` varchar(5) NOT NULL,
  `hb_di_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans_beli`
--

INSERT INTO `htrans_beli` (`hb_id`, `hb_date`, `hb_total`, `hb_customerid`, `hb_di_id`) VALUES
('HB001', '2022-10-26', 275000, 'US005', 'DI001'),
('HB002', '2022-10-26', 20900, 'US007', NULL),
('HB003', '2022-10-28', 15991500, 'US004', NULL),
('HB004', '2022-11-02', 28680000, 'US008', NULL),
('HB005', '2022-11-11', 0, 'US004', 'DI003'),
('HB006', '2022-11-11', 102350, 'US009', 'DI003'),
('HB007', '2022-11-15', 10568225, 'US010', 'DI002'),
('HB008', '2022-11-16', 5148670, 'US007', NULL),
('HB009', '2022-11-16', 16000000, 'US008', NULL),
('HB010', '2022-11-18', 20760000, 'US009', NULL),
('HB011', '2022-11-20', 52573175, 'US005', NULL),
('HB012', '2022-11-23', 7811855, 'US006', NULL),
('HB013', '2022-11-23', 2282000, 'US010', NULL),
('HB014', '2022-11-24', 910900, 'US005', NULL),
('HB015', '2022-11-26', 1800000, 'US004', NULL),
('HB016', '2022-11-30', 166098375, 'US005', NULL),
('HB017', '2022-11-30', 230000, 'US009', NULL),
('HB018', '2022-12-02', 50123175, 'US006', NULL),
('HB019', '2022-12-07', 12115000, 'US010', NULL),
('HB020', '2022-12-07', 10278000, 'US007', 'DI004'),
('HB021', '2022-12-18', 47200000, 'US001', NULL),
('HB022', '2022-12-18', 47200000, 'US001', NULL),
('HB023', '2022-12-18', 500000, 'US001', NULL),
('HB024', '2022-12-18', 500000, 'US001', NULL),
('HB025', '2022-12-18', 500000, 'US001', NULL),
('HB026', '2022-12-18', 4400000, 'US001', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE `series` (
  `se_id` varchar(5) NOT NULL,
  `se_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`se_id`, `se_name`) VALUES
('SE001', 'One Piece'),
('SE002', 'Naruto'),
('SE003', 'Dragon Ball'),
('SE004', 'Black Clover'),
('SE005', 'Doraemon'),
('SE006', 'Attack on Titan'),
('SE007', 'Chainsaw Man'),
('SE008', 'White Album'),
('SE009', '86'),
('SE010', 'Death Note'),
('SE011', 'Bleach'),
('SE012', 'Gintama'),
('SE013', 'Violet Evergarden'),
('SE014', 'Kimetsu no Yaiba'),
('SE015', 'Code Geass'),
('SE016', 'Made in Abyss'),
('SE017', 'Fate'),
('SE018', 'Jujutsu Kaisen'),
('SE019', 'Shigatsu wa Kimi no Uso'),
('SE020', 'Kono Subarashii Sekai ni Shukufuku wo! (Konosuba)'),
('SE021', 'Hunter x Hunter'),
('SE022', 'Dr. Stone'),
('SE023', 'Re:Zero kara Hajimeru Isekai Seikatsu'),
('SE024', 'Akame Ga Kill'),
('SE025', 'Azur Lane'),
('SE026', 'Darling in The Franxx'),
('SE027', 'Domestic na Kanojo'),
('SE028', 'Enen no Shouboutai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi` (
  `tr_id` varchar(5) NOT NULL,
  `tr_af_id` varchar(5) NOT NULL,
  `tr_us_id` varchar(5) NOT NULL,
  `tr_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `us_id` varchar(5) NOT NULL,
  `us_username` varchar(255) NOT NULL,
  `us_email` varchar(255) NOT NULL,
  `us_gender` tinyint(1) NOT NULL COMMENT '1=Male, 0=Female',
  `us_password` varchar(30) NOT NULL,
  `us_status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_username`, `us_email`, `us_gender`, `us_password`, `us_status`) VALUES
('US001', 'arsa', 'arsa@gmail.com', 1, '123', 1),
('US002', 'yesnt', 'ruben@gmail.com', 1, '123', 1),
('US003', 'badut', 'vincent@gmail.com', 0, '123', 1),
('US004', 'Yurtin', 'yurtan@gmail.com', 1, '123', 1),
('US005', 'vithunchan', 'vithun@gmail.com', 0, '123', 1),
('US006', 'Ken', 'ken@gmail.com', 1, '123', 1),
('US007', 'gajelas', 'nich@gmail.com', 0, '123', 1),
('US008', 'quarter', 'rz@gmail.com', 1, '123', 1),
('US009', 'kampus4life', 'kampus4life@gmail.com', 1, '123', 1),
('US010', 'transgender', 'tim@gmail.com', 0, '123', 1),
('US011', 'rubenyw', 'rubenyasonwinarta@gmail.com', 0, '123', 1),
('US012', 'FlyingTable', 'mejapeot@gmail.com', 1, 'aaa', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actionfigure`
--
ALTER TABLE `actionfigure`
  ADD PRIMARY KEY (`af_id`),
  ADD KEY `FKSERIES_ACTIONFIGURE` (`af_se_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ca_us_id`,`ca_af_id`),
  ADD KEY `ca_af_id` (`ca_af_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`di_id`);

--
-- Indexes for table `dtrans_beli`
--
ALTER TABLE `dtrans_beli`
  ADD PRIMARY KEY (`db_id`),
  ADD KEY `FKHTRANS_DTRANSBELI` (`db_hb_id`);

--
-- Indexes for table `htrans_beli`
--
ALTER TABLE `htrans_beli`
  ADD PRIMARY KEY (`hb_id`),
  ADD KEY `FKCUSTOMER_HTRANSBELI` (`hb_customerid`),
  ADD KEY `FKDISCOUNT_HTRANSBELI` (`hb_di_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`se_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`tr_id`),
  ADD KEY `tr_af_id` (`tr_af_id`),
  ADD KEY `tr_us_id` (`tr_us_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `actionfigure`
--
ALTER TABLE `actionfigure`
  ADD CONSTRAINT `FKSERIES_ACTIONFIGURE` FOREIGN KEY (`af_se_id`) REFERENCES `series` (`se_id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ca_us_id`) REFERENCES `users` (`us_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ca_af_id`) REFERENCES `actionfigure` (`af_id`);

--
-- Constraints for table `dtrans_beli`
--
ALTER TABLE `dtrans_beli`
  ADD CONSTRAINT `FKHTRANS_DTRANSBELI` FOREIGN KEY (`db_hb_id`) REFERENCES `htrans_beli` (`hb_id`);

--
-- Constraints for table `htrans_beli`
--
ALTER TABLE `htrans_beli`
  ADD CONSTRAINT `FKCUSTOMER_HTRANSBELI` FOREIGN KEY (`hb_customerid`) REFERENCES `users` (`us_id`),
  ADD CONSTRAINT `FKDISCOUNT_HTRANSBELI` FOREIGN KEY (`hb_di_id`) REFERENCES `discount` (`di_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`tr_af_id`) REFERENCES `actionfigure` (`af_id`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`tr_us_id`) REFERENCES `users` (`us_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
