-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 07:07 PM
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
('AF001', 'Luffy D. Monkey Gear 3 Deluxe Edition 15cm', 1000000, 11, 1, 'SE001', 'One Piece Luffy Gear 3\r\n\r\nukuran tinggi : 15 cm\r\nukuran alas/tatak hitam : 7.5 x 10 cm\r\nmaterial : PVC\r\n100% New Loose Pack (OPP Bag)', 'assets/GambarFigure/AF001.jpg'),
('AF002', 'Sasuke Uchiha Susanoo Matakao 33cm', 2000000, 5, 1, 'SE002', 'Statue Sasuke Uchiha Susanoo Matakao  with LED premium grade\r\n\r\n- tinggi produk : 33cm\r\n- dimensi produk : 26 x 27 x 33cm\r\n- tidak ada artikulasi\r\n- bahan : HIgh quality PVC ABS\r\n- lengkap dengan LED\r\n- menggunakan kabel USB , TIDAK ADA COLOKAN LISTRIK\r\n-', 'assets/GambarFigure/AF002.jpg'),
('AF003', 'Son Goku Super Saiyan Anniversary Edition 43cm', 500000, 71, 1, 'SE003', 'Dragon Ball Z Goku\r\n\r\nKondisi: Baru\r\nBahan: PVC\r\nTinggi: 43 cm\r\nLengkap dengan box', 'assets/GambarFigure/AF003.jpg'),
('AF004', 'Asta Full Body Figure 14cm', 900000, 28, 1, 'SE004', 'Black Clover Asta Yuno Yuno Grinbellor 14CM Model Action Figure Original Limited Anime JUMP\r\n\r\nDimensi : 14CM ', 'assets/GambarFigure/AF004.jpg'),
('AF005', 'Doraemon 8cm', 300000, 7, 1, 'SE005', 'tinggi boneka 8 cm\r\n', 'assets/GambarFigure/AF005.jpg'),
('AF006', 'Sanji - One Piece 12cm', 800000, 29, 1, 'SE001', 'Sanji Figur Aksi\r\n\r\nDeskripsi :\r\nDimensi: 27cm\r\nPaket: tas Opp\r\nMaterial: PVC', 'assets/GambarFigure/AF006.jpg'),
('AF007', 'Attack Titan 16cm', 560000, 8, 1, 'SE006', '+ Ukuran+/- 17CM Medium Size\r\n+ Material High Quality Pvc, Padat\r\n+ Finishing halus warna cerah', 'assets/GambarFigure/AF007.jpg'),
('AF008', 'Colossal Titan 12cm', 400000, 41, 1, 'SE006', '', 'assets/GambarFigure/AF008.jpg'),
('AF009', 'Denji full body 12cm', 450000, 22, 1, 'SE007', '', 'assets/GambarFigure/AF009.jpg'),
('AF010', 'Naruto - Rasengan 12cm', 250000, 56, 1, 'SE002', '', 'assets/GambarFigure/AF010.jpg'),
('AF011', 'Milizé Vladilena full body 10cm', 350000, 29, 1, 'SE009', '', 'assets/GambarFigure/AF011.jpg'),
('AF012', 'Ogiso Setsuna - White Dress 14cm', 680000, 27, 1, 'SE008', '', 'assets/GambarFigure/AF012.jpg'),
('AF013', 'Ryuk 8cm', 270000, 71, 1, 'SE010', '', 'assets/GambarFigure/AF013.jpg'),
('AF014', 'Kurosaki Ichigo - Bankai 12cm', 800000, 16, 1, 'SE011', '', 'assets/GambarFigure/AF014.jpg'),
('AF015', 'Sakata Gintoki 12cm', 120000, 99, 1, 'SE012', '', 'assets/GambarFigure/AF015.jpg'),
('AF016', 'Touma Kazusa - White Dress', 3900000, 2, 1, 'SE008', '', 'assets/GambarFigure/AF016.jpg'),
('AF017', 'Violet Evergarden - chibi 4.5cm', 190000, 77, 1, 'SE013', '', 'assets/GambarFigure/AF017.jpg'),
('AF018', 'Kamado Tanjirou - Water Breathing Technique 14cm', 900000, 8, 1, 'SE014', '', 'assets/GambarFigure/AF018.jpg'),
('AF019', 'Megumin 12cm', 475000, 22, 1, 'SE020', '', 'assets/GambarFigure/AF019.jpg'),
('AF020', 'Saber - Combat Outfit 12cm', 745000, 4, 1, 'SE017', '', 'assets/GambarFigure/AF020.jpg'),
('AF021', 'Astolfo full body 12cm', 690000, 6, 1, 'SE017', '', 'assets/GambarFigure/AF021.jpg'),
('AF022', 'Emperor Lelouch 14cm', 721000, 20, 1, 'SE015', '', 'assets/GambarFigure/AF022.jpg'),
('AF023', 'Lelouch Lamperouge 12cm', 820000, 9, 1, 'SE015', '', 'assets/GambarFigure/AF023.jpg'),
('AF024', 'Nanachi - Fishing 12cm', 480000, 16, 1, 'SE016', '', 'assets/GambarFigure/AF024.jpg'),
('AF025', 'Gojou Satoru - Hello 12cm', 590000, 91, 1, 'SE018', '', 'assets/GambarFigure/AF025.jpg'),
('AF026', 'Vegeta - Super Saiyan 12cm', 610000, 32, 1, 'SE003', '', 'assets/GambarFigure/AF026.jpg'),
('AF027', 'Miyazono Kaori Complete Set 12cm', 500000, 25, 1, 'SE019', '', 'assets/GambarFigure/AF027.jpg'),
('AF028', 'Gon Freecss Standing on Rock 16cm', 290000, 61, 1, 'SE021', '', 'assets/GambarFigure/AF028.jpg'),
('AF029', 'Senkuu full body 12cm', 720000, 7, 1, 'SE022', '', 'assets/GambarFigure/AF029.jpg'),
('AF030', 'Emilia - White 10cm', 380000, 21, 1, 'SE023', '', 'assets/GambarFigure/AF030.jpg'),
('AF031', 'Esdeath - Standing on Ice 14cm', 420000, 6, 1, 'SE024', '', 'assets/GambarFigure/AF031.jpg'),
('AF032', 'Ayanami - Chibi 6cm', 200000, 164, 1, 'SE025', '', 'assets/GambarFigure/AF032.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `ca_us_id` varchar(5) NOT NULL,
  `ca_af_id` varchar(5) NOT NULL,
  `ca_status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ca_us_id`, `ca_af_id`, `ca_status`) VALUES
('US001', 'AF001', 'Requested'),
('US001', 'AF003', 'Requested');

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
  `db_subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtrans_beli`
--

INSERT INTO `dtrans_beli` (`db_id`, `db_amount`, `db_hb_id`, `db_subtotal`) VALUES
('DB001', 1, 'HB001', 300000),
('DB002', 1, 'HB002', 20900),
('DB003', 2, 'HB003', 15691500),
('DB004', 1, 'HB003', 300000),
('DB005', 3, 'HB004', 28500000),
('DB006', 1, 'HB004', 180000),
('DB007', 1, 'HB005', 185000),
('DB008', 1, 'HB005', 260000),
('DB009', 2, 'HB005', 5392170);

-- --------------------------------------------------------

--
-- Table structure for table `htrans_beli`
--

DROP TABLE IF EXISTS `htrans_beli`;
CREATE TABLE `htrans_beli` (
  `hb_id` varchar(5) NOT NULL,
  `hb_date` date NOT NULL,
  `hb_invoice_number` varchar(10) NOT NULL,
  `hb_total` double NOT NULL,
  `hb_customerid` varchar(5) NOT NULL,
  `hb_status` int(10) NOT NULL,
  `hb_employeeid` varchar(5) NOT NULL,
  `hb_di_id` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `htrans_beli`
--

INSERT INTO `htrans_beli` (`hb_id`, `hb_date`, `hb_invoice_number`, `hb_total`, `hb_customerid`, `hb_status`, `hb_employeeid`, `hb_di_id`) VALUES
('HB001', '2022-10-26', 'B221026001', 275000, 'US005', 1, 'US001', 'DI001'),
('HB002', '2022-10-26', 'B221026002', 20900, 'US007', 1, 'US002', NULL),
('HB003', '2022-10-28', 'B221028001', 15991500, 'US004', 1, 'US002', NULL),
('HB004', '2022-11-02', 'B221102001', 28680000, 'US008', 1, 'US001', NULL),
('HB005', '2022-11-11', 'B221111001', 0, 'US004', 1, 'US003', 'DI003'),
('HB006', '2022-11-11', 'B221111002', 102350, 'US009', 1, 'US003', 'DI003'),
('HB007', '2022-11-15', 'B221115001', 10568225, 'US010', 1, 'US001', 'DI002'),
('HB008', '2022-11-16', 'B221116001', 5148670, 'US007', 1, 'US006', NULL),
('HB009', '2022-11-16', 'B221116002', 16000000, 'US008', 1, 'US001', NULL),
('HB010', '2022-11-18', 'B221118003', 20760000, 'US009', 1, 'US010', NULL),
('HB011', '2022-11-20', 'B221120004', 52573175, 'US005', 1, 'US009', NULL),
('HB012', '2022-11-23', 'B221123005', 7811855, 'US006', 1, 'US001', NULL),
('HB013', '2022-11-23', 'B221123006', 2282000, 'US010', 1, 'US007', NULL),
('HB014', '2022-11-24', 'B221124007', 910900, 'US005', 1, 'US001', NULL),
('HB015', '2022-11-26', 'B221126008', 1800000, 'US004', 1, 'US006', NULL),
('HB016', '2022-11-30', 'B221130009', 166098375, 'US005', 1, 'US005', NULL),
('HB017', '2022-11-30', 'B221130010', 230000, 'US009', 1, 'US008', NULL),
('HB018', '2022-12-02', 'B221202011', 50123175, 'US006', 1, 'US006', NULL),
('HB019', '2022-12-07', 'B221207012', 12115000, 'US010', 1, 'US007', NULL),
('HB020', '2022-12-07', 'B221207013', 10278000, 'US007', 1, 'US004', 'DI004');

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
  `us_password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_username`, `us_email`, `us_gender`, `us_password`) VALUES
('US001', 'arsa', 'arsa@gmail.com', 1, '123'),
('US002', 'yesnt', 'ruben@gmail.com', 1, '123'),
('US003', 'badut', 'vincent@gmail.com', 0, '123'),
('US004', 'Yurtin', 'yurtan@gmail.com', 1, '123'),
('US005', 'vithunchan', 'vithun@gmail.com', 0, '123'),
('US006', 'Ken', 'ken@gmail.com', 1, '123'),
('US007', 'gajelas', 'nich@gmail.com', 0, '123'),
('US008', 'quarter', 'rz@gmail.com', 1, '123'),
('US009', 'kampus4life', 'kampus4life@gmail.com', 1, '123'),
('US010', 'transgender', 'tim@gmail.com', 0, '123'),
('US011', 'rubenyw', 'rubenyasonwinarta@gmail.com', 0, '123'),
('US012', 'FlyingTable', 'mejapeot@gmail.com', 1, 'aaa');

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
  ADD KEY `FKDISCOUNT_HTRANSBELI` (`hb_di_id`),
  ADD KEY `FKEMPLOYEE_HTRANSBELI` (`hb_employeeid`);

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
  ADD CONSTRAINT `FKDISCOUNT_HTRANSBELI` FOREIGN KEY (`hb_di_id`) REFERENCES `discount` (`di_id`),
  ADD CONSTRAINT `FKEMPLOYEE_HTRANSBELI` FOREIGN KEY (`hb_employeeid`) REFERENCES `users` (`us_id`);

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
