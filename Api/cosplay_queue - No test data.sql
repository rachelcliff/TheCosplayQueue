-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 01, 2020 at 02:29 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`login_id`, `cosplay_name`, `password`) VALUES
(33, 'tester5', '$2y$10$LRO.u7jF0Iuug7oGaYG/ceT.wBshWtrICKTrrsd8EjyBlbPN27bRW'),
(34, 'tester13', '$2y$10$kxPN1TISweMV2eMXvTlc8ucAvLqBid68AvvHpYyLQv7rkHT16J9eG');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

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
  `permissions` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `login_id` (`login_id`),
  KEY `permissions` (`permissions`)
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `cosplay_name`, `facebook`, `instagram`, `phone`, `email`, `login_id`, `permissions`) VALUES
(46, 'Arida', 'tester5', 'Tester5', 'Tester5', '123456789', 'tester5@test.com.au', 33, 'admin'),
(108, 'Tester13', 'tester13', 'test', 'test', '123456789', 'test@test.com', 34, 'user');

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

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `login_id` FOREIGN KEY (`login_id`) REFERENCES `logins` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
