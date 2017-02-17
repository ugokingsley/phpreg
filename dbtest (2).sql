-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 11:49 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitcoin`
--

CREATE TABLE IF NOT EXISTS `bitcoin` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `amt` int(100) NOT NULL,
  `wallet` varchar(255) NOT NULL,
  `hashcode` varchar(255) NOT NULL,
  `time_created` varchar(100) NOT NULL,
  `time_expires` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bitcoin`
--

INSERT INTO `bitcoin` (`id`, `userID`, `amt`, `wallet`, `hashcode`, `time_created`, `time_expires`) VALUES
(1, 1, 29000, 'kingsley666', 'kdjf;ouboui', '05:10:15', '05:10:15'),
(2, 2, 12500, 'tyyoop', 'oinlnwpounu', '05:17:28', '05:17:28'),
(3, 2, 13899, 'uibyuihuiuy', 'rerjaboyuvi', '05:17:56', '05:17:56'),
(4, 1, 5000, 'igoboy', 'jhjkhkiyh s', '2017-02-07 ', '2017-02-08 '),
(5, 1, 5000, 'igoboy', 'jhjkhkiyh s', '2017-02-07 ', '2017-02-08 '),
(6, 1, 5000, 'igoboy', 'jhjkhkiyh s', '10:46:09', '10:46:09'),
(7, 1, 29000, 'kingsley666', 'lhukiyuoyui', '17-02-07 10', '10:47:51'),
(8, 1, 5000, 'igoboy', 'iuhikyovy7 9npu09i', '17-02-07 10:51:20', '10:51:20'),
(9, 1, 29000, 'rkjfj3rhj333j3jj3', 'rwww', '17-02-09 11:09:34', '17-02-10 11:09:34'),
(10, 1, 3000, '1h3is9939549949cdhdhhhhweyuuhs', '1283884hhaeiiSEIIEIISOOOooeiiei', '17-02-09 03:35:54', '17-02-10 03:35:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `gsm` varchar(20) NOT NULL,
  `userStatus` enum('Y','N') NOT NULL DEFAULT 'N',
  `tokenCode` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `gsm`, `userStatus`, `tokenCode`) VALUES
(1, 'ugochukwu kingsley', 'ugokingsley5@gmail.com', '07ec3080804e4df6c50cc7180ed52c15', '08087421177', 'Y', '79b9f9541beafa7046d00daa7d66bede'),
(2, 'daeta', 'daetacity@gmail.com', 'a090dd133973391f8f33a8c7c19b5d9b', 'daeta', 'Y', 'dc00a92c9f95d233f353209fa03fba2e'),
(3, 'agu', 'agu@gmail.com', '2dc820d33443893318f00c9f57556905', '90900', 'N', '49c727aa0a139d00b2eb636ffc078bad'),
(4, 'ike', 'samsoncreators@gmail.com', 'e75d526a83338923aeff7627cc79a9f1', '09090930000', 'N', '343a9819f136ba0ee79c3f5d522f6534');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitcoin`
--
ALTER TABLE `bitcoin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitcoin`
--
ALTER TABLE `bitcoin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
