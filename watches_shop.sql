-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 01:26 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watches_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`) VALUES
(1, 'candino'),
(2, 'casio'),
(3, 'citizen'),
(4, 'seiko'),
(5, 'op'),
(6, 'daniel wellington (DW)'),
(7, 'skagen'),
(8, 'g-shock & baby-g'),
(9, 'orient'),
(10, 'micheal kors'),
(11, 'fossil'),
(12, 'doxa'),
(13, 'tissot'),
(14, 'longines'),
(15, 'movado'),
(16, 'sevenfriday'),
(17, 'frederique constant');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `color` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color`) VALUES
(1, 'trắng'),
(2, 'vàng'),
(3, 'đen'),
(4, 'hồng');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time_init` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time_edit_last` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `origin`
--

CREATE TABLE `origin` (
  `id` int(10) UNSIGNED NOT NULL,
  `nation` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `origin`
--

INSERT INTO `origin` (`id`, `nation`) VALUES
(1, 'Thụy Sỹ'),
(2, 'Nhật Bản'),
(3, 'Mĩ'),
(4, 'Đan Mạch'),
(5, 'Thụy Điển');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_brand` int(10) UNSIGNED NOT NULL,
  `id_origin` int(10) UNSIGNED NOT NULL,
  `id_color` int(10) UNSIGNED NOT NULL,
  `style` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clockwork` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wire` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `case` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `glass` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diameter` varchar(4) NOT NULL,
  `thickness` varchar(4) NOT NULL,
  `waterproof` varchar(15) NOT NULL,
  `guarantee` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_provider` int(10) UNSIGNED NOT NULL,
  `price` int(9) NOT NULL,
  `sale` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `id_brand`, `id_origin`, `id_color`, `style`, `clockwork`, `wire`, `case`, `glass`, `diameter`, `thickness`, `waterproof`, `guarantee`, `id_provider`, `price`, `sale`) VALUES
(6, 'Đồng hồ Orient FUNG6003W0 Nữ', 'images/5aa64119b5b345.16662503.jpg', 9, 2, 1, 'nữ', 'pin (quartz)', 'thép không gỉ', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 1, 1140000, 0.5),
(8, 'đồng hồ casio nam dây da', 'images/5aa63e24140c10.73760054.jpg', 2, 2, 3, 'nam', 'pin (quartz)', 'da', 'nhựa', 'mineral crystal (kính cứng)', '30mm', '10mm', '5ATM', '5 năm', 1, 2300000, NULL),
(10, 'đồng hồ orient pin nam', 'images/5aa647cce472a8.33693541.jpg', 9, 2, 2, 'nam', 'pin (quartz)', 'thép không gỉ', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 3, 2000000, NULL),
(12, 'đồng hồ orient pin nam', 'images/5aa65516ef4396.64815776.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '30mm', '7mm', '3ATM', '5 năm', 1, 2300000, NULL),
(13, 'đồng hồ orient pin nam', 'images/5aa6554936e833.43099741.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 1, 2300000, NULL),
(14, 'đồng hồ orient pin nam', 'images/5aa6555ee0e340.42296313.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 1, 2000000, NULL),
(15, 'đồng hồ casio nam dây da', 'images/5aa6557db03ed2.93305115.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 1, 4000000, NULL),
(16, 'Đồng hồ Orient FUNG6003W0 Nữ', 'images/5aa655a155adb1.72305376.jpg', 1, 1, 2, 'nữ', 'pin (quartz)', 'thép không gỉ', 'thép không gỉ', 'mineral crystal (kính cứng)', '30mm', '10mm', '5ATM', '5 năm', 1, 2000000, NULL),
(17, 'đồng hồ orient pin nam', 'images/5aa655b7d6a7c1.68562372.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '3ATM', '5 năm', 1, 2000000, NULL),
(18, 'đồng hồ casio nam dây da', 'images/5aa655d26dcd43.02193324.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '27mm', '7mm', '5ATM', '5 năm', 1, 2300000, NULL),
(19, 'đồng hồ orient pin nam', 'images/5aa655f270ef38.28308914.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '30mm', '7mm', '5ATM', '5 năm', 1, 4000000, NULL),
(20, 'đồng hồ casio nam dây da', 'images/5aa65629732ad7.16423233.jpg', 1, 1, 1, 'nam', 'pin (quartz)', 'da', 'thép không gỉ', 'mineral crystal (kính cứng)', '30mm', '7mm', '3ATM', '5 năm', 1, 4000000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `address`, `phone`) VALUES
(1, 'đại lí Hải Triều', '612 đường Hoàng Văn Thụ, tp Thái Nguyên', '012345678963'),
(2, 'đại lí Đức Hùng', '123 đường Tân Thịnh, tp Thái Nguyên', '14984816516'),
(3, 'đại lí Hiếu Tín', '123 đường Tân Thịnh, tp Thái Nguyên', '14984816516');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT '1',
  `address` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `privilege` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `image`, `name`, `sex`, `address`, `phone`, `email`, `privilege`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', NULL, 'Phạm Trung Kiên', 1, 'Thái nguyên', '01644463582', 'kiendp00@gmail.com', 'admin'),
(2, 'kien', '8cb2237d0679ca88db6464eac60da96345513964', NULL, 'Kiên', 1, '', '', '', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `origin`
--
ALTER TABLE `origin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_brand` (`id_brand`),
  ADD KEY `id_origin` (`id_origin`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `id_provider` (`id_provider`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `origin`
--
ALTER TABLE `origin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_10` FOREIGN KEY (`id_provider`) REFERENCES `providers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_origin`) REFERENCES `origin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`id_origin`) REFERENCES `origin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`id_origin`) REFERENCES `origin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_8` FOREIGN KEY (`id_origin`) REFERENCES `origin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_9` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
