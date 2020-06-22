-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: mariadb
-- Generation Time: Aug 08, 2019 at 01:11 PM
-- Server version: 10.4.7-MariaDB-1:10.4.7+maria~bionic
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_store`
--
CREATE DATABASE IF NOT EXISTS `web_store` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `web_store`;

-- --------------------------------------------------------

--
-- Table structure for table `app_model_customers`
--

DROP TABLE IF EXISTS `app_model_customers`;
CREATE TABLE IF NOT EXISTS `app_model_customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `app_model_customers`
--

TRUNCATE TABLE `app_model_customers`;
--
-- Dumping data for table `app_model_customers`
--

INSERT INTO `app_model_customers` (`id`, `username`, `email`, `password`) VALUES
(1, 'testuser', 'testemail@email.com', '1234'),
(2, 'ivancho', 'ivan@gmail.com', '1234'),
(3, 'petio', 'petio@asf.com', 'asd'),
(4, 'petka', 'petka@av.bg', 'flask'),
(5, 'koko', 'koko@av.bg', 'asd'),
(6, 'kiro', 'kiro@a.bg', 'asd'),
(7, 'pepi', 'pepi@sd.com', '123'),
(8, 'dani', 'dani@df.com', '123'),
(9, 'rei', 'rei@er.com', '123'),
(10, 'asfasf', 'aaaa@aaa.com', 'fas'),
(11, 'fassfasf', 'fasasfasf@abv.bg', 'fsasa'),
(12, 'fasasfasf', 'aaaa@aaa.com', 'fasasf'),
(13, '125125125', '125125@abv.bg', 'fasfsasf'),
(16, '<script>alert(\"hello\")</script>', 'koko@av.bg', '123'),
(17, 'select * from customers', 'fasfas@abv.bg', '123'),
(18, 'DELETE FROM app_model_customers WHERE  id=17', 'aaaa@aaa.com', '123'),
(19, '` DELETE FROM app_model_customers WHERE  id=17', 'fasfas@abv.bg', '51212'),
(20, 'tpolzer', 'tpolzer@gmx.net', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `app_model_products`
--

DROP TABLE IF EXISTS `app_model_products`;
CREATE TABLE IF NOT EXISTS `app_model_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `app_model_products`
--

TRUNCATE TABLE `app_model_products`;
--
-- Dumping data for table `app_model_products`
--

INSERT INTO `app_model_products` (`id`, `title`, `description`, `photo`, `price`, `quantity`, `category`) VALUES
(1, 'Printer HP', 'Reliable, discounted, gorgeous!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTE-UCwVD32NJr7juPIjIp4CcTEP8HrDFswnT2J5UUGr0QE4fuU9w', 9.99, 1, 'Printer'),
(2, 'Xerox', 'Fast work, bright colors!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQo8Wj1TKz_rrV_VzwbVi8XPF0OL1l0L2IxxjLcjYJwiY6vbjSY', 133, 2, 'Printer'),
(3, 'Alienware', 'The best of the best!!!', 'https://www.lifewire.com/thmb/N5roZf_HL6w9t8Yq5diORGEM8SA=/1500x1500/filters:fill(auto,1)/_hero_SQ_2LW4045927-1-7ee01493034d4631894328a424e3ac52.jpg', 9990, 1, 'Desktop'),
(4, 'Asus ROG', 'Mercedes of desktops!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT3Jfick7Fu9AEAcwAwGIoiIHMFwwZhN08Arr_8LkPMCRt8nEbDPw', 1000, 1, 'Desktop'),
(5, 'Pravets', 'Not great, not terrible!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGTtAx4Oh8xuC6x_9hZff5nAKpc78kHez8qLstz1ZylYeCZnv9xA', 9.9, 1, 'Desktop');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
