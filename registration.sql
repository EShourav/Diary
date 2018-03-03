-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2017 at 10:23 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

DROP TABLE IF EXISTS `data`;
CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL,
  `date` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `date`, `message`) VALUES
(9, 'December, 13 2017', 'dasdasd'),
(9, 'December, 13 2017', 'Hello! This is Muntasher Morshed. How are you??'),
(9, 'December, 13 2017', 'Hi guys!!'),
(11, 'December, 13 2017', 'Hi there!!'),
(11, 'December, 13 2017', 'asd'),
(12, 'December, 13 2017', 'Hi! This is San2 here!!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `image` text NOT NULL,
  `date` text NOT NULL,
  `bday` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `image`, `date`, `bday`) VALUES
(6, 'Ayesha', 'Shantu', 'ayeshashantu@gmail.com', '25f9e794323b453885f5181f1b624d0b', '1642754846846591502809504.jpg', 'August, 15 2017', '05/26/1994'),
(8, 'Muntasher', 'Morshed', 'ijeshourav1409@gmail.com', 'e3e0e0b164ed59c430312854451d1d22', '2036132059805121509771756.jpg', 'November, 04 2017', '03/01/1994'),
(9, 'Muntasher', 'Morshed', 'ijeshourav1409@outlook.com', '25f9e794323b453885f5181f1b624d0b', '8549881961698671513175405.jpg', 'December, 13 2017', '06/13/1994'),
(10, 'Ayesha', 'Shantu', 'ayesha@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2901694181955141513203254.jpg', 'December, 13 2017', '04/26/1996'),
(11, 'Ismail', 'Kiron', 'ismailkiron5@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7056687159129181513203295.jpg', 'December, 13 2017', '12/05/1992'),
(12, 'Ayesha', 'Shantu', 'shantu@gmail.com', '25f9e794323b453885f5181f1b624d0b', '9418456784911991513203677.jpg', 'December, 13 2017', '04/26/1996');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
