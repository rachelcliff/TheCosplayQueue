-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 10, 2020 at 03:41 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosplay_queue`
--

-- --------------------------------------------------------

--
-- Table structure for table `changelog`
--

DROP TABLE IF EXISTS `changelog`;
CREATE TABLE IF NOT EXISTS `changelog` (
  `changelogID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `browser` varchar(200) NOT NULL,
  `actiontype` varchar(50) NOT NULL,
  PRIMARY KEY (`changelogID`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `changelog`
--

INSERT INTO `changelog` (`changelogID`, `user_id`, `date`, `browser`, `actiontype`) VALUES
(1, 21, '2020-11-01 13:35:53.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'join queue'),
(2, 22, '2020-11-01 13:37:02.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'register'),
(6, 26, '2020-11-01 15:27:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'join queue'),
(12, 22, '2020-11-01 18:15:16.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(13, 22, '2020-11-01 18:15:17.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(14, 22, '2020-11-01 18:26:21.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(15, 22, '2020-11-01 18:26:21.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(30, 42, '2020-11-02 17:31:19.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'register'),
(31, 42, '2020-11-02 17:31:26.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Safari/537.36', 'update'),
(37, 46, '2020-11-02 17:37:53.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'register'),
(38, 46, '2020-11-02 18:05:38.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(39, 46, '2020-11-02 18:06:38.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(40, 46, '2020-11-02 18:11:08.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(41, 46, '2020-11-02 18:11:54.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'update'),
(42, 46, '2020-11-02 18:21:41.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(43, 46, '2020-11-02 18:22:19.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(44, 46, '2020-11-02 18:22:44.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(45, 46, '2020-11-02 18:29:29.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(46, 46, '2020-11-02 18:29:33.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(47, 46, '2020-11-02 18:30:53.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(48, 46, '2020-11-02 18:31:49.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(49, 46, '2020-11-02 18:32:29.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(50, 46, '2020-11-02 18:33:20.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(51, 46, '2020-11-02 18:34:13.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(52, 46, '2020-11-02 18:36:54.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(53, 46, '2020-11-02 18:37:18.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(54, 46, '2020-11-02 18:37:50.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(55, 46, '2020-11-02 18:38:20.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(56, 46, '2020-11-02 18:39:17.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(57, 46, '2020-11-02 18:39:43.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(58, 46, '2020-11-02 18:39:55.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(59, 46, '2020-11-02 18:40:08.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(60, 46, '2020-11-02 18:40:19.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(61, 46, '2020-11-02 18:41:53.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(62, 46, '2020-11-02 18:42:29.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(63, 46, '2020-11-02 18:43:58.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(64, 46, '2020-11-02 18:44:08.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(65, 46, '2020-11-02 18:48:33.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(66, 46, '2020-11-02 18:49:43.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(67, 46, '2020-11-02 18:50:17.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(68, 46, '2020-11-02 18:50:47.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(69, 46, '2020-11-02 18:52:00.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(70, 46, '2020-11-02 18:53:58.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(71, 46, '2020-11-02 18:54:00.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(72, 46, '2020-11-02 18:54:20.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(73, 46, '2020-11-02 18:55:26.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(74, 46, '2020-11-02 18:55:47.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(75, 46, '2020-11-02 18:56:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(76, 46, '2020-11-02 18:56:28.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(77, 46, '2020-11-02 18:59:20.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(78, 46, '2020-11-02 18:59:44.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(79, 46, '2020-11-02 19:00:07.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(80, 46, '2020-11-02 19:00:24.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(81, 46, '2020-11-02 19:03:34.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(82, 46, '2020-11-02 19:04:06.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(83, 46, '2020-11-02 19:04:34.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(84, 46, '2020-11-02 19:04:57.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(85, 46, '2020-11-02 19:05:31.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(86, 46, '2020-11-02 19:06:57.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(89, 46, '2020-11-02 19:16:08.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(90, 46, '2020-11-02 19:16:38.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(91, 46, '2020-11-02 19:16:45.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(93, 46, '2020-11-02 19:17:52.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(94, 46, '2020-11-02 19:18:28.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(95, 46, '2020-11-02 19:18:34.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(96, 46, '2020-11-02 19:18:57.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(98, 46, '2020-11-02 19:19:27.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(102, 46, '2020-11-02 19:22:28.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(103, 46, '2020-11-02 19:22:50.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(112, 46, '2020-11-02 19:31:41.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(113, 46, '2020-11-02 19:32:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'login'),
(115, 63, '2020-11-02 19:34:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.111 Mobile Safari/537.36', 'join queue'),
(116, 64, '2020-11-08 15:10:21.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue'),
(117, 65, '2020-11-08 15:11:11.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'register'),
(118, 65, '2020-11-08 15:11:38.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(119, 65, '2020-11-08 15:13:01.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(120, 65, '2020-11-08 15:13:36.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(121, 65, '2020-11-08 15:14:13.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(122, 65, '2020-11-08 16:35:04.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(123, 65, '2020-11-08 16:35:28.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'update'),
(124, 66, '2020-11-08 16:36:15.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue'),
(125, 67, '2020-11-08 16:42:29.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'register'),
(126, 14, '2020-11-08 16:42:39.000000', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Safari/537.36', 'login'),
(127, 14, '2020-11-09 14:20:31.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(128, 68, '2020-11-09 14:23:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'register'),
(129, 68, '2020-11-09 14:23:23.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'update'),
(130, 69, '2020-11-09 14:24:04.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'register'),
(131, 68, '2020-11-09 14:24:34.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'login'),
(132, 70, '2020-11-09 14:25:33.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue'),
(133, 71, '2020-11-09 14:28:33.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue'),
(134, 72, '2020-11-09 14:46:10.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue'),
(135, 73, '2020-11-09 14:46:37.000000', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.183 Mobile Safari/537.36', 'join queue');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) NOT NULL,
  `location` varchar(300) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `name`, `location`, `date`) VALUES
(1, 'Supanova Brisbane', 'Brisbane', '2020-11-07'),
(2, 'Supanova Adelaide', 'Adelaide', '2020-11-14'),
(3, 'Supanova Perth', 'Perth', '2020-11-21'),
(4, 'Supanova Sydney', 'Sydney', '2020-12-05'),
(5, 'Supanova Melbourne', 'Melbourne', '2021-04-10'),
(6, 'Supanova Gold Coast', 'Gold Coast', '2021-04-17'),
(7, 'Oz Comic Con Sydney', 'Sydney', '2021-03-06'),
(8, 'Oz Comic Con Brisbane', 'Brisbane', '2021-03-13'),
(9, 'Oz Comic Con Adelaide', 'Adelaide', '2021-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE IF NOT EXISTS `logins` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `cosplay_name` varchar(150) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_id`, `cosplay_name`, `password`) VALUES
(1, 'ggritten0', '94RQVib'),
(2, 'imckerron1', '1xo9wWtLLy'),
(3, 'ddumphries2', 'SHu2r9YxwPCP'),
(4, 'rhaverson3', 'Q49s01'),
(5, 'cdarrigone4', 'EGas50'),
(6, 'bbannister5', 'cI0fJDzXdU'),
(7, 'ctreweela6', 'EVRoT7'),
(8, 'asharply7', 'LZ3icdnfE'),
(9, 'pkobke8', 'mroXCC5jIS4'),
(10, 'akilmaster9', 'cjZ6TQsWv'),
(11, 'docarneya', '2OcjLHF'),
(12, 'mgeibelb', 'rD6surtlr'),
(13, 'avinckc', 'GzQRFjEqxQT'),
(14, 'sshimmingsd', '3JcI7dnz6Taj'),
(15, 'asouthernse', 'SjgQcm'),
(16, 'arodearf', 'reoEMqnDZ'),
(17, 'bhazlegroveg', '6JQu2xokx'),
(18, 'bventurolih', 'eyZIt8uZkE'),
(19, 'ohelmi', 'wCCwDd1eQfxo'),
(20, 'thaythornej', 'rP3dtn3Sq'),
(23, 'test1', '$2y$10$BnNxw327OuYVUrlu3.GHKua3QVGkY6lX/emWJnq78Mpsuo/DpA6XO'),
(24, 'Eli', '$2y$10$NzQ1A/9kJT5NaHglVgKmKeFNeIJxTVHRfxE8nzC4Uz1uVhh4pigFO'),
(33, 'tester5', '$2y$10$LRO.u7jF0Iuug7oGaYG/ceT.wBshWtrICKTrrsd8EjyBlbPN27bRW'),
(40, 'Redbird', '$2y$10$g6tUf2L6NIisU8r9QKVK/OH0OfZy8bfyxMii7mmC5akMhcbpbSRna'),
(44, 'Redbird13', '$2y$10$qlHE01rh/M3o9fNbDA2qf.veCgAqg35Wi1YzlCMMbq71w0Qem.tvy'),
(45, 'Redbird14', '$2y$10$fSwMtqu6wsvsvNRS62gWpeag4RLukCqz3Vrjh3q6Lh0WDfH4VjBxK');

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

DROP TABLE IF EXISTS `queue`;
CREATE TABLE IF NOT EXISTS `queue` (
  `queue_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reference_photo` longtext,
  `character_name` varchar(200) NOT NULL,
  `series` varchar(200) NOT NULL,
  `genre` varchar(200) NOT NULL,
  `r_group` varchar(5) DEFAULT NULL,
  `photo_taken` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`queue_id`),
  KEY `user_queue_id` (`user_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`queue_id`, `event_id`, `user_id`, `reference_photo`, `character_name`, `series`, `genre`, `r_group`, `photo_taken`) VALUES
(1, 1, 1, 'https://vignette.wikia.nocookie.net/disney/images/7/75/Profile_-_Alice.jpeg/revision/latest?cb=20190312054522', 'Alice', 'Alice in Wonderland', 'Fantasy', 'No ', 'yes'),
(2, 1, 2, 'https://images.immediate.co.uk/production/volatile/sites/3/2019/09/stormbreaker-67baf17.jpeg?webp=true&quality=90&resize=620%2C413', 'Alex Rider', 'Alex Rider', 'Action', 'no ', 'yes'),
(3, 1, 3, 'https://vignette.wikia.nocookie.net/my-little-universe/images/f/fe/Real_Pink_Diamond.png/revision/latest?cb=20180629104552', 'Pink Diamond', 'Steven Universe', 'Fantasy', 'no', 'yes'),
(4, 1, 4, 'https://i.schoolido.lu/c/335idolizedEli.png', 'Eli Ayase', 'Love Live School Idol Project', 'Anime', 'no', 'yes'),
(5, 1, 5, 'https://cdn.shopify.com/s/files/1/1425/8892/products/IKO0806--XMen-Mystique-Statue-10_45a9c635-59cd-43b7-af8e-f8c24e65f871_1024x1024.jpg?v=1597195460', 'Mystique', 'X-Men', 'Comics', 'no', 'yes'),
(6, 1, 6, 'https://www.blossomcostumes.com.au/media/catalog/product/cache/1185f706b8ef162d8da5f2f0cc44da8d/m/o/mortal-kombat-x-adult-sub-zero-costume.jpg', 'Sub Zero', 'Mortal Combat', 'Games', 'no', 'yes'),
(7, 1, 7, 'https://vignette.wikia.nocookie.net/harrypotter/images/3/36/Newton_Scamander_Profile_crop.png/revision/latest?cb=20190609204955', 'Newt Scamander', 'Harry Potter', 'Fantasy', 'no', 'yes'),
(8, 1, 9, 'https://grantland.com/wp-content/uploads/2014/07/hp_toei_sailormoon_800.jpg?w=800', 'Sailor Moon', 'Sailor Moon', 'Anime', 'yes', 'yes'),
(9, 1, 8, 'http://dummyimage.com/197x141.png/5fa2dd/ffffff', 'Brittni Crennell', 'nibh', 'sapien', 'no', 'no'),
(10, 1, 10, 'http://dummyimage.com/223x117.jpg/ff4444/ffffff', 'Erasmus Lymer', 'ac nulla sed', 'potenti', 'no', 'no'),
(11, 1, 11, 'http://dummyimage.com/199x109.png/ff4444/ffffff', 'Rachelle Duncklee', 'at velit eu est congue elementum', 'turpis', 'no', 'no'),
(12, 1, 12, 'http://dummyimage.com/239x186.jpg/ff4444/ffffff', 'Malory Peret', 'pellentesque ultrices phasellus id sapien in', 'massa', 'no', 'no'),
(13, 1, 13, 'http://dummyimage.com/243x246.png/5fa2dd/ffffff', 'Carlynne Derwin', 'volutpat in congue etiam justo etiam', 'turpis', 'no', 'no'),
(14, 1, 14, 'http://dummyimage.com/214x194.jpg/cc0000/ffffff', 'Carree Georgius', 'sociis natoque penatibus et magnis', 'ullamcorper', 'no', 'void'),
(15, 1, 15, 'http://dummyimage.com/135x242.bmp/cc0000/ffffff', 'Ashli Mityashin', 'lacinia erat', 'sit', 'no', 'no'),
(16, 1, 16, 'http://dummyimage.com/125x132.png/cc0000/ffffff', 'Nerta Hehl', 'sapien cursus vestibulum proin eu', 'turpis', 'no', 'no'),
(17, 1, 17, 'http://dummyimage.com/131x155.jpg/cc0000/ffffff', 'Peyton Foley', 'aenean sit amet', 'massa', 'no', 'void'),
(18, 1, 18, 'http://dummyimage.com/172x226.png/ff4444/ffffff', 'Cammie Sherwill', 'convallis', 'justo', 'no', 'no'),
(19, 1, 19, 'http://dummyimage.com/128x207.bmp/cc0000/ffffff', 'Jeno Towle', 'blandit nam nulla', 'platea', 'no', 'no'),
(20, 1, 20, 'http://dummyimage.com/118x248.bmp/5fa2dd/ffffff', 'Ellerey Erb', 'lacus', 'sapien', 'no', 'no'),
(21, 1, 21, '', 'Arida', 'Original Character', 'Anime Idol', 'yes', 'no'),
(35, NULL, 64, '', 'Tester13', 'Fallout', 'Games', 'no', 'void'),
(37, NULL, 70, '', 'test', 'testq', 'test', 'no', 'void'),
(38, NULL, 71, '', 'sfds', 'sdfg', 'sdrf', 'no', 'void'),
(39, NULL, 72, '', 'sfds', 'sdfg', 'sdrf', 'no', 'void'),
(40, NULL, 73, '', ' vnggvh ', ' vngvg ', ' vn vghn', 'no', 'void');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `cosplay_name` varchar(200) NOT NULL,
  `facebook` varchar(300) NOT NULL,
  `instagram` varchar(300) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `login_id` (`login_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `cosplay_name`, `facebook`, `instagram`, `phone`, `email`, `login_id`) VALUES
(1, 'Meggi Kellough', 'mkellough0', 'https://va.gov/mauris/enim/leo/rhoncus/sed.aspx?orci=aliquam&luctus=convallis&et=nunc&ultrices=proin&posuere=at&cubilia=turpis', 'https://prnewswire.com/ac/nibh/fusce/lacus/purus/aliquet.js?quis=odio&lectus=elementum&suspendisse=eu&potenti=interdum&in=eu&eleifend=tincidunt&quam=in&a=leo&odio=maecenas&in=pulvinar&hac=lobortis&habitasse=est&platea=phasellus&dictumst=sit&maecenas=amet&ut=erat&massa=nulla&quis=tempus&augue=vivamus', '614-969-6580', 'mkellough0@sfgate.com', 1),
(2, 'Tuesday Fish', 'tfish1', 'https://yahoo.co.jp/primis/in.aspx?mus=urna&vivamus=ut&vestibulum=tellus&sagittis=nulla&sapien=ut&cum=erat&sociis=id&natoque=mauris&penatibus=vulputate&et=elementum&magnis=nullam&dis=varius&parturient=nulla&montes=facilisi&nascetur=cras&ridiculus=non&mus=velit&etiam=nec&vel=nisi&augue=vulputate&vest', 'http://nymag.com/libero/non.png?est=felis&quam=sed&pharetra=lacus&magna=morbi&ac=sem&consequat=mauris&metus=laoreet&sapien=ut&ut=rhoncus&nunc=aliquet&vestibulum=pulvinar&ante=sed&ipsum=nisl&primis=nunc&in=rhoncus&faucibus=dui&orci=vel&luctus=sem&et=sed&ultrices=sagittis&posuere=nam&cubilia=congue&cu', '961-238-7951', 'tfish1@cbslocal.com', 2),
(3, 'Bevan Blew', 'bblew2', 'http://abc.net.au/morbi/a/ipsum.xml?tellus=justo&nisi=morbi&eu=ut&orci=odio&mauris=cras&lacinia=mi&sapien=pede&quis=malesuada&libero=in&nullam=imperdiet&sit=et&amet=commodo&turpis=vulputate&elementum=justo&ligula=in&vehicula=blandit&consequat=ultrices&morbi=enim&a=lorem&ipsum=ipsum&integer=dolor&a=s', 'http://nasa.gov/volutpat/eleifend/donec/ut/dolor/morbi.aspx?tortor=id&id=justo&nulla=sit&ultrices=amet&aliquet=sapien&maecenas=dignissim&leo=vestibulum&odio=vestibulum&condimentum=ante&id=ipsum&luctus=primis&nec=in&molestie=faucibus&sed=orci&justo=luctus&pellentesque=et&viverra=ultrices&pede=posuere', '841-731-7548', 'bblew2@phoca.cz', 3),
(4, 'Iver Dumpleton', 'idumpleton3', 'http://cbsnews.com/quis/turpis/eget.js?lectus=condimentum&vestibulum=neque&quam=sapien&sapien=placerat&varius=ante&ut=nulla&blandit=justo&non=aliquam&interdum=quis&in=turpis&ante=eget&vestibulum=elit&ante=sodales&ipsum=scelerisque&primis=mauris&in=sit&faucibus=amet&orci=eros&luctus=suspendisse&et=ac', 'http://nasa.gov/mattis/pulvinar.xml?pellentesque=blandit&volutpat=non&dui=interdum&maecenas=in&tristique=ante&est=vestibulum&et=ante&tempus=ipsum&semper=primis&est=in&quam=faucibus&pharetra=orci&magna=luctus&ac=et&consequat=ultrices&metus=posuere&sapien=cubilia&ut=curae&nunc=duis&vestibulum=faucibus', '531-302-5869', 'idumpleton3@mac.com', 4),
(5, 'Quillan Francioli', 'qfrancioli4', 'https://posterous.com/mauris.json?mauris=vehicula&morbi=condimentum&non=curabitur&lectus=in&aliquam=libero&sit=ut&amet=massa&diam=volutpat&in=convallis&magna=morbi&bibendum=odio&imperdiet=odio&nullam=elementum&orci=eu&pede=interdum&venenatis=eu&non=tincidunt&sodales=in&sed=leo&tincidunt=maecenas&eu=', 'https://flickr.com/ipsum/dolor/sit/amet.json?facilisi=tellus&cras=in&non=sagittis&velit=dui&nec=vel&nisi=nisl&vulputate=duis&nonummy=ac&maecenas=nibh&tincidunt=fusce&lacus=lacus&at=purus&velit=aliquet&vivamus=at&vel=feugiat&nulla=non&eget=pretium&eros=quis&elementum=lectus&pellentesque=suspendisse&q', '370-361-6126', 'qfrancioli4@apache.org', 5),
(6, 'Reinhard Koubu', 'rkoubu5', 'http://ucoz.com/elementum/in/hac/habitasse.json?quis=duis&lectus=faucibus&suspendisse=accumsan&potenti=odio&in=curabitur&eleifend=convallis&quam=duis&a=consequat&odio=dui&in=nec&hac=nisi&habitasse=volutpat&platea=eleifend&dictumst=donec&maecenas=ut&ut=dolor&massa=morbi', 'https://tripod.com/maecenas/tristique/est.png?quis=ac&tortor=nibh&id=fusce&nulla=lacus&ultrices=purus&aliquet=aliquet&maecenas=at&leo=feugiat&odio=non&condimentum=pretium&id=quis&luctus=lectus&nec=suspendisse&molestie=potenti&sed=in&justo=eleifend&pellentesque=quam&viverra=a&pede=odio&ac=in&diam=hac', '737-762-3578', 'rkoubu5@un.org', 6),
(7, 'Florenza MacAndrew', 'fmacandrew6', 'https://nps.gov/tortor/sollicitudin/mi.jsp?odio=nisl&cras=duis&mi=bibendum&pede=felis&malesuada=sed', 'https://drupal.org/porttitor/lacus.js?sed=integer&tristique=pede&in=justo&tempus=lacinia&sit=eget&amet=tincidunt&sem=eget&fusce=tempus&consequat=vel&nulla=pede&nisl=morbi&nunc=porttitor&nisl=lorem&duis=id&bibendum=ligula&felis=suspendisse&sed=ornare&interdum=consequat&venenatis=lectus&turpis=in&enim', '887-640-1658', 'fmacandrew6@msn.com', 7),
(8, 'Pasquale Fussie', 'pfussie7', 'http://desdev.cn/congue.html?donec=varius&semper=nulla&sapien=facilisi&a=cras&libero=non&nam=velit&dui=nec&proin=nisi', 'http://friendfeed.com/mi/nulla/ac/enim/in/tempor.png?quam=etiam&fringilla=faucibus&rhoncus=cursus&mauris=urna&enim=ut&leo=tellus&rhoncus=nulla&sed=ut&vestibulum=erat&sit=id&amet=mauris&cursus=vulputate&id=elementum&turpis=nullam&integer=varius&aliquet=nulla&massa=facilisi&id=cras&lobortis=non&conval', '448-781-9437', 'pfussie7@list-manage.com', 8),
(9, 'Dominic Paradis', 'dparadis8', 'http://dailymail.co.uk/sed/tristique/in/tempus/sit/amet.html?augue=amet&quam=consectetuer&sollicitudin=adipiscing&vitae=elit&consectetuer=proin&eget=interdum&rutrum=mauris&at=non&lorem=ligula&integer=pellentesque&tincidunt=ultrices&ante=phasellus&vel=id&ipsum=sapien&praesent=in&blandit=sapien&lacini', 'https://t-online.de/pede.html?ut=dapibus&odio=augue&cras=vel&mi=accumsan&pede=tellus&malesuada=nisi&in=eu&imperdiet=orci&et=mauris&commodo=lacinia&vulputate=sapien&justo=quis&in=libero&blandit=nullam&ultrices=sit&enim=amet&lorem=turpis&ipsum=elementum', '166-659-8184', 'dparadis8@shareasale.com', 9),
(10, 'Simone Cecely', 'scecely9', 'https://vistaprint.com/orci/luctus.png?eget=tortor&eleifend=sollicitudin&luctus=mi&ultricies=sit&eu=amet&nibh=lobortis&quisque=sapien&id=sapien&justo=non&sit=mi&amet=integer&sapien=ac&dignissim=neque&vestibulum=duis&vestibulum=bibendum&ante=morbi&ipsum=non&primis=quam&in=nec&faucibus=dui&orci=luctus', 'http://ycombinator.com/erat/curabitur/gravida.jpg?integer=nascetur&a=ridiculus&nibh=mus&in=vivamus&quis=vestibulum&justo=sagittis&maecenas=sapien&rhoncus=cum&aliquam=sociis&lacus=natoque&morbi=penatibus&quis=et&tortor=magnis&id=dis&nulla=parturient&ultrices=montes&aliquet=nascetur&maecenas=ridiculus', '699-449-1952', 'scecely9@jigsy.com', 10),
(11, 'Alyson Baniard', 'abaniarda', 'https://canalblog.com/praesent/lectus/vestibulum.json?aenean=sit&lectus=amet&pellentesque=erat&eget=nulla&nunc=tempus&donec=vivamus&quis=in&orci=felis&eget=eu&orci=sapien&vehicula=cursus&condimentum=vestibulum&curabitur=proin&in=eu&libero=mi&ut=nulla&massa=ac&volutpat=enim&convallis=in&morbi=tempor&', 'https://zimbio.com/quis/turpis/sed/ante/vivamus/tortor/duis.jpg?est=tristique&risus=est&auctor=et&sed=tempus&tristique=semper&in=est&tempus=quam&sit=pharetra&amet=magna&sem=ac&fusce=consequat&consequat=metus&nulla=sapien&nisl=ut&nunc=nunc&nisl=vestibulum&duis=ante&bibendum=ipsum&felis=primis&sed=in&', '906-487-7232', 'abaniarda@irs.gov', 11),
(12, 'Floria Moggach', 'fmoggachb', 'https://virginia.edu/ornare/imperdiet/sapien.png?nam=mauris&nulla=sit&integer=amet&pede=eros&justo=suspendisse&lacinia=accumsan&eget=tortor&tincidunt=quis&eget=turpis&tempus=sed&vel=ante&pede=vivamus&morbi=tortor&porttitor=duis&lorem=mattis&id=egestas&ligula=metus&suspendisse=aenean&ornare=fermentum', 'https://reuters.com/tortor.jpg?vitae=rhoncus&mattis=mauris&nibh=enim&ligula=leo&nec=rhoncus&sem=sed&duis=vestibulum&aliquam=sit&convallis=amet&nunc=cursus&proin=id&at=turpis&turpis=integer&a=aliquet&pede=massa&posuere=id&nonummy=lobortis&integer=convallis&non=tortor&velit=risus&donec=dapibus&diam=au', '992-792-4638', 'fmoggachb@jiathis.com', 12),
(13, 'Marcie Kime', 'mkimec', 'https://nbcnews.com/nisi/venenatis/tristique/fusce/congue/diam/id.html?mauris=non&sit=mi&amet=integer&eros=ac&suspendisse=neque&accumsan=duis&tortor=bibendum&quis=morbi&turpis=non&sed=quam&ante=nec&vivamus=dui&tortor=luctus&duis=rutrum&mattis=nulla&egestas=tellus&metus=in&aenean=sagittis&fermentum=d', 'https://hc360.com/aliquet.html?nec=rutrum&euismod=nulla&scelerisque=tellus&quam=in&turpis=sagittis&adipiscing=dui&lorem=vel&vitae=nisl&mattis=duis&nibh=ac&ligula=nibh&nec=fusce&sem=lacus&duis=purus&aliquam=aliquet&convallis=at&nunc=feugiat&proin=non&at=pretium&turpis=quis&a=lectus&pede=suspendisse&p', '591-675-1929', 'mkimec@mail.ru', 13),
(14, 'Brina Rathbone', 'brathboned', 'http://canalblog.com/nec/sem/duis/aliquam/convallis/nunc/proin.js?ultrices=volutpat&mattis=quam&odio=pede&donec=lobortis&vitae=ligula&nisi=sit&nam=amet&ultrices=eleifend&libero=pede&non=libero&mattis=quis&pulvinar=orci&nulla=nullam&pede=molestie&ullamcorper=nibh&augue=in&a=lectus&suscipit=pellentesq', 'http://ifeng.com/praesent/lectus/vestibulum/quam/sapien.html?tempus=sollicitudin&vivamus=ut&in=suscipit&felis=a&eu=feugiat&sapien=et&cursus=eros&vestibulum=vestibulum&proin=ac&eu=est&mi=lacinia&nulla=nisi&ac=venenatis&enim=tristique&in=fusce&tempor=congue&turpis=diam&nec=id&euismod=ornare&scelerisqu', '518-941-2158', 'brathboned@google.es', 14),
(15, 'Sonny McKea', 'smckeae', 'http://cnet.com/donec/vitae/nisi/nam/ultrices.jpg?maecenas=faucibus&rhoncus=orci&aliquam=luctus&lacus=et&morbi=ultrices&quis=posuere&tortor=cubilia&id=curae&nulla=donec&ultrices=pharetra&aliquet=magna&maecenas=vestibulum&leo=aliquet&odio=ultrices&condimentum=erat&id=tortor&luctus=sollicitudin&nec=mi', 'http://marketwatch.com/luctus/rutrum/nulla/tellus.aspx?libero=volutpat&nullam=convallis&sit=morbi&amet=odio&turpis=odio&elementum=elementum&ligula=eu&vehicula=interdum&consequat=eu&morbi=tincidunt&a=in&ipsum=leo&integer=maecenas&a=pulvinar&nibh=lobortis&in=est&quis=phasellus&justo=sit&maecenas=amet&', '453-431-2993', 'smckeae@unblog.fr', 15),
(16, 'Valene Pawlicki', 'vpawlickif', 'https://umich.edu/habitasse/platea/dictumst.xml?id=at&nulla=nunc&ultrices=commodo&aliquet=placerat&maecenas=praesent&leo=blandit&odio=nam&condimentum=nulla&id=integer&luctus=pede&nec=justo&molestie=lacinia&sed=eget&justo=tincidunt&pellentesque=eget&viverra=tempus&pede=vel&ac=pede&diam=morbi&cras=por', 'http://arizona.edu/posuere/cubilia.xml?enim=morbi&sit=porttitor&amet=lorem&nunc=id&viverra=ligula&dapibus=suspendisse&nulla=ornare&suscipit=consequat&ligula=lectus&in=in&lacus=est&curabitur=risus&at=auctor&ipsum=sed&ac=tristique&tellus=in&semper=tempus&interdum=sit&mauris=amet&ullamcorper=sem&purus=', '606-219-7955', 'vpawlickif@tripod.com', 16),
(17, 'Micky Fright', 'mfrightg', 'https://naver.com/odio/consequat/varius/integer/ac/leo/pellentesque.png?ullamcorper=primis&augue=in&a=faucibus&suscipit=orci&nulla=luctus&elit=et&ac=ultrices&nulla=posuere&sed=cubilia&vel=curae&enim=nulla&sit=dapibus&amet=dolor&nunc=vel&viverra=est&dapibus=donec&nulla=odio&suscipit=justo&ligula=soll', 'https://taobao.com/libero/rutrum/ac/lobortis.html?ligula=at&vehicula=lorem&consequat=integer&morbi=tincidunt&a=ante&ipsum=vel&integer=ipsum&a=praesent&nibh=blandit&in=lacinia&quis=erat&justo=vestibulum&maecenas=sed&rhoncus=magna&aliquam=at&lacus=nunc&morbi=commodo&quis=placerat&tortor=praesent&id=bl', '226-708-2795', 'mfrightg@com.com', 17),
(18, 'Myriam Munroe', 'mmunroeh', 'http://hubpages.com/vitae/quam/suspendisse.js?fusce=donec&posuere=diam&felis=neque&sed=vestibulum&lacus=eget&morbi=vulputate&sem=ut&mauris=ultrices&laoreet=vel&ut=augue&rhoncus=vestibulum&aliquet=ante&pulvinar=ipsum&sed=primis&nisl=in&nunc=faucibus&rhoncus=orci&dui=luctus&vel=et&sem=ultrices&sed=pos', 'http://hp.com/non/sodales/sed/tincidunt/eu/felis.xml?tortor=vestibulum&id=ante&nulla=ipsum&ultrices=primis&aliquet=in&maecenas=faucibus&leo=orci&odio=luctus&condimentum=et', '870-495-2985', 'mmunroeh@paypal.com', 18),
(19, 'Jaquenette Hurton', 'jhurtoni', 'http://jigsy.com/ligula.jpg?dolor=nam&morbi=dui&vel=proin&lectus=leo&in=odio&quam=porttitor&fringilla=id&rhoncus=consequat&mauris=in&enim=consequat&leo=ut&rhoncus=nulla&sed=sed&vestibulum=accumsan&sit=felis&amet=ut&cursus=at&id=dolor&turpis=quis&integer=odio&aliquet=consequat&massa=varius&id=integer', 'https://ihg.com/erat/fermentum/justo/nec/condimentum/neque.jpg?sagittis=potenti&sapien=cras&cum=in&sociis=purus&natoque=eu&penatibus=magna&et=vulputate&magnis=luctus&dis=cum&parturient=sociis&montes=natoque&nascetur=penatibus&ridiculus=et&mus=magnis&etiam=dis&vel=parturient&augue=montes&vestibulum=n', '277-657-1023', 'jhurtoni@cisco.com', 19),
(20, 'Cad Cortes', 'ccortesj', 'https://rambler.ru/in/faucibus/orci.jpg?adipiscing=penatibus&elit=et&proin=magnis&risus=dis&praesent=parturient&lectus=montes&vestibulum=nascetur&quam=ridiculus&sapien=mus&varius=etiam&ut=vel&blandit=augue&non=vestibulum&interdum=rutrum&in=rutrum&ante=neque&vestibulum=aenean&ante=auctor&ipsum=gravid', 'http://ftc.gov/in/sapien/iaculis/congue/vivamus.png?nulla=cursus&pede=urna&ullamcorper=ut&augue=tellus&a=nulla&suscipit=ut&nulla=erat&elit=id&ac=mauris&nulla=vulputate&sed=elementum&vel=nullam&enim=varius&sit=nulla&amet=facilisi&nunc=cras&viverra=non&dapibus=velit', '864-171-4892', 'ccortesj@ameblo.jp', 20),
(21, 'Rachel Cliff', 'Redbird_Cosplay', 'Redbird_Cosplay', 'Redbird_Cosplay', '0411295900', 'rachredbird42@gmail.com', NULL),
(22, 'Rachel Cliff', 'Redbird', 'Redbird_Cosplay', 'Redbird_Cosplay', '0423100587', 'rachredbird42@gmail.com', 21),
(26, 'Teste', 'egtrd', 'dsgt', 'drg', '53445', 'sdfdsf@sadfsd.com', NULL),
(42, 'Eli Ayase', 'Eli', 'AyaseEli', 'AyaseEli2', '1234567890', 'AyaseEli@hotmail.com', 30),
(46, 'Arida', 'tester5', 'Tester5', 'Tester5', '123456789', 'tester5@test.com.au', 33),
(63, 'gerg', 'rctest_2', 'dgjhjgf', 'jgfhj', '156404640', 'esrt@jrhe.com', NULL),
(64, 'Tester', 'Test13', 'Tester13', 'Tester13', '123456789', 'tester13@gmail.com', NULL),
(65, 'Tester', 'Tester13', 'Tester13', 'Tester14', '123456789', 'tester13@gmail.com', 42),
(66, 'gerg', 'test', 'cfgfxc', 'Test', '41156454', 'hgjf@cfgd.com', NULL),
(67, 'Rachel Cliff', 'Redbird', 'dfgdf', 'Redbird_Cosplay', '9154', 'retrd@dfgdg.com', 43),
(68, 'Arida Redbird', 'Redbird13', 'test2', 'test', '123456789', 'redbird13@gmail.com', 44),
(69, 'Arida Redbird', 'Redbird14', 'test', 'test', '123456789', 'redbird13@gmail.com', 45),
(70, 'gerg', 'rctest_2', 'dgjhjgf', 'Test', '45641561', 'esste@sdf.com', NULL),
(71, 'gerg', 'rctest_2', 'test', 'test', '4564564165', 'dsgfd@sdfs.com', NULL),
(72, 'gerg', 'rctest_2', 'test', 'test', '4564564165', 'dsgfd@sdfs.com', NULL),
(73, 'gerg', 'Redbird', 'egrtg', 'Test', '41156454', 'esrt@jrhe.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `changelog`
--
ALTER TABLE `changelog`
  ADD CONSTRAINT `userID` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `event_id` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_queue_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
