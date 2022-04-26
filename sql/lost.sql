-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2022 at 04:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lost`
--

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

DROP TABLE IF EXISTS `cat`;
CREATE TABLE IF NOT EXISTS `cat` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`cid`, `name`) VALUES
(1, 'Mobile Phone'),
(2, 'Mobile Tablet'),
(3, 'Car Keys'),
(4, 'Laptop'),
(5, 'Document'),
(6, 'Passport'),
(7, 'NRC'),
(8, 'Keys'),
(9, 'Shoes'),
(10, 'Money'),
(11, 'Bag'),
(12, 'Book'),
(13, 'Identity Card'),
(14, 'Other'),
(15, 'Certificate'),
(16, 'Letter');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(200) NOT NULL,
  `uid` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `des` text NOT NULL,
  `loc` varchar(200) NOT NULL DEFAULT ' ',
  `img` varchar(200) NOT NULL DEFAULT '',
  `owner` varchar(200) NOT NULL DEFAULT ' ',
  `lostarea` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT '0',
  `rdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cdate` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`iid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`iid`, `cid`, `uid`, `name`, `des`, `loc`, `img`, `owner`, `lostarea`, `status`, `rdate`, `cdate`) VALUES
(1, '1', '1', 'Iphone 6s Plus', 'It has cracks on the screen with battery issues', 'Lusaka along cairo road', '92497137121.jpg', ' ', '', '0', '2022-03-04 08:32:58', ''),
(2, '3', '1', 'Car Keys', 'For toyota Ford Ranger', 'Near makeni shopping mall', '38208130207.jpg', ' ', '', '0', '2022-03-04 08:32:44', ''),
(3, '9', '1', 'Shoes', 'One shoe found and its just a new pair', 'Kamwala', '18673187381.png', ' ', '', '0', '2022-03-04 08:30:40', ''),
(4, '4', '1', 'HP laptop', 'it ha no battery and it somehow works like that', 'In someones car', '41171311488.png', ' ', '', '0', '2022-03-04 08:31:26', ''),
(5, '2', '1', 'Imac Tablet', 'Its black in color', 'At EHC', '18846128940.png', '2', 'Some where near lusaka', '1', '2022-03-29 02:27:41', 'Tue, 29th Mar 2022'),
(6, '6', '1', 'Passport', 'New unused passport', 'Kabwe', '80441194188.png', ' ', '', '0', '2022-03-04 08:40:44', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `pn` varchar(200) NOT NULL,
  `nrc` varchar(200) NOT NULL,
  `loc` varchar(200) NOT NULL,
  `em` varchar(200) NOT NULL,
  `pwd` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `pn`, `nrc`, `loc`, `em`, `pwd`, `date`) VALUES
(1, 'Bruce', 'Chikola', '123456789', '213456789', '21345', 'chikolabruce23@gmail.com', '$2y$10$KFtKbgnuBk5dY7PBQZG2IeeojbRTpvb.cqtFpnm.SUhDZRKKGT9ZO', '2022-03-29 04:29:52'),
(2, 'Reuben', 'Chikoka', '0979370213', '883763298', '32332', 'mwansachikoka@gmail.com', '$2y$10$Uy.wQVcPzGFMBZp3fid96eL51CETWufJLA7Bql/vCowNKWDmrSyyS', '2022-03-29 02:42:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
