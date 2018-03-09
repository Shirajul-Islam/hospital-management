-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 09:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mysqli_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(25) NOT NULL,
  `dname` varchar(25) NOT NULL,
  `adate` date NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `pname`, `dname`, `adate`, `visible`, `time`) VALUES
(1, 'kutta', 'Dr. Madhob ', '2018-03-13', 0, NULL),
(2, 'shirajul ', 'Dr. Madhob Chabdra Ray', '2018-03-12', 0, NULL),
(3, 'aa', 'aaaaaa', '2018-03-26', 0, NULL),
(4, 'madhob kumar', 'maal', '2018-03-17', 0, '03:00:00'),
(5, 'Md Zahid Hasan', 'komol', '2018-03-22', 1, '05:00:00'),
(6, 'i', 'j', '2018-03-28', 1, '07:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `specialist` varchar(25) NOT NULL,
  `join_date` date NOT NULL,
  `mobile` int(11) NOT NULL,
  `visible` int(1) DEFAULT NULL,
  `svisit` time DEFAULT NULL,
  `evisit` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `address`, `specialist`, `join_date`, `mobile`, `visible`, `svisit`, `evisit`) VALUES
(1, 'Dr. Madhob Chardra Ray', 'HSTU, Zea Hall', 'Orthopaedics', '2018-03-05', 1737937457, 0, NULL, NULL),
(2, 'Md Zahid Hasan', 'HSTU, Zea Hall', 'Cardiologist', '2018-03-19', 1789988776, 0, NULL, NULL),
(3, 'a', 'x', 'c', '2018-03-19', 2147483647, 1, NULL, NULL),
(4, 'Dr. Madhob Chardra Ray', 'HSTU, Zea Hall', 'Cardiologist', '2018-03-21', 1700000000, 0, '00:00:01', '00:00:00'),
(5, 'jinnatun', 'j', 'g', '2018-03-29', 1788888888, 1, '00:00:00', '00:00:00'),
(6, 'jinna', 'kosba', 'g', '2018-03-29', 1867676766, 0, '10:00:00', '20:00:00'),
(7, 'x', 'HSTU, Zea Hall', 'heart', '2018-03-28', 1790987654, 1, '02:00:00', '10:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `address` varchar(25) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `jdate` date NOT NULL,
  `room_no` int(10) NOT NULL,
  `mobile` int(11) NOT NULL,
  `visible` int(1) NOT NULL,
  `visit` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `address`, `gender`, `jdate`, `room_no`, `mobile`, `visible`, `visit`) VALUES
(1, 'Md Zahid', '', '', '2018-03-05', 0, 1737937458, 0, NULL),
(2, 'Md shirajul islam', 'HSTU, Zea Hall', 'Male', '2018-03-13', 0, 1867434321, 1, NULL),
(3, 'Md Majid', 'majid@gmail.com', 'make', '2017-05-09', 0, 233334, 1, NULL),
(4, 'sojib', 'sajib@gmail.com', 'Male', '2018-03-20', 0, 2147483647, 1, NULL),
(5, 'aaa', 'sss', 'ddd', '2018-03-26', 0, 2147483647, 1, NULL),
(6, 'bbb', 'kkk', 'male', '2018-02-04', 0, 1777777777, 1, 300),
(7, 'jinna', 'kosoba', 'Female', '2018-04-14', 0, 1738842329, 1, NULL),
(8, 'k', 'kosba', 'Male', '2018-03-28', 0, 987654321, 1, NULL),
(9, 'x', 't', 'Male', '2018-03-30', 0, 1700000000, 1, NULL),
(10, 'Md Harunur jaman', 'Basher hat', 'Male', '2018-03-15', 201, 1789898989, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `username`, `email`, `password`) VALUES
(2, 'Jinnatun', 'jinnatun@gmail.com', '$2y$10$m50ypkffhLtRRF7Rie4ESuobnsUjLG9GguJVI4.i8nmJRC9BenDQG'),
(3, 'Shiraj', 'shirajultee@gmail.com', '$2y$10$XGKp18yH/kwcalGUNQZDUOanNfbXOlr1BML6BPSRmdgtJw57vD0wK'),
(4, 'Tanmay Das', 'td@gmail.com', '$2y$10$32uPLJ9rFawiVsu45E7ZB.O1i8DW3argzUNFDTr8oEydNoDb9bmGy'),
(5, 'Madhod Roy', 'madhobhstu@gmai.com', '$2y$10$5ZOz1Badu9vKwLG1CNyfye61osCkCoaHo6FSdOQ0PBYsGS.WNAsNG'),
(6, 'Harun ', 'haru@gmail.com', '$2y$10$8Y6fgPzS0YqD.RjYCbwwc.T5Kl3RDummS5D7MifAZ5PWcnGj4CpXS');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `login` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `visible` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `name`, `login`, `password`, `visible`, `timestamp`) VALUES
(1, '', '', '', 0, '2018-03-02 20:24:20'),
(2, 'madhob', 'madhob', 'mad', 1, '2018-03-02 08:37:03'),
(3, 'nitin shukla', 'nitin', '007', 0, '2018-03-02 08:39:34'),
(4, 'Osman Gani', 'osman', '1947', 0, '2018-03-02 08:19:31'),
(5, 'Lucifer Morningstar', 'lucifer', '9876', 0, '2018-01-26 13:10:54'),
(6, 'nitish kumar', 'nitish', '3434', 0, '2018-03-02 08:05:50');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
