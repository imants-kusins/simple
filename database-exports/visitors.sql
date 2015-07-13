-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2015 at 12:27 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eskimo`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `first_name`, `surname`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(17, 'Imants', 'Kusins', 'imants.kusins@gmail.com', '07412345678', '2015-06-08 20:49:26', '2015-06-08 20:49:26'),
(18, 'Jane', 'Doe', 'janedoe@email.com', '07496857698', '2015-06-08 20:49:47', '2015-06-08 20:49:47'),
(19, 'Alex', 'Doe', 'alexdoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(20, 'Ronald', 'Doe', 'ronalddoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(21, 'Lisa', 'Doe', 'lisadoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(22, 'Benjamin', 'Doe', 'bendoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(23, 'Anna', 'Doe', 'annadoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(24, 'Susan', 'Doe', 'susandoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(25, 'Richard', 'Doe', 'richarddoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08'),
(26, 'Luke', 'Doe', 'lukedoe@email.com', '07695847364', '2015-06-08 20:50:08', '2015-06-08 20:50:08');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
