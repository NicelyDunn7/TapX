-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2017 at 03:00 AM
-- Server version: 5.5.54
-- PHP Version: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tapX`
--
CREATE DATABASE IF NOT EXISTS `tapX` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tapX`;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `business_id` int(8) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(35) NOT NULL DEFAULT '',
  `address` varchar(35) DEFAULT NULL,
  `address2` varchar(16) DEFAULT NULL,
  `city` varchar(35) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `ZIP` int(5) DEFAULT NULL,
  PRIMARY KEY (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `businesses`
--

TRUNCATE TABLE `businesses`;
--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`business_id`, `business_name`, `address`, `address2`, `city`, `state`, `ZIP`) VALUES
(1, 'Harpo''s Bar and Grill', '29 S 10th Street', NULL, 'Columbia', 'MO', 65201),
(2, 'Campus Bar & Grill', '304 S 9th St', NULL, 'Columbia', 'MO', 65201),
(3, 'McNally''s', '7 N 6th St', NULL, 'Columbia', 'MO', 65201),
(4, 'Gus'' Food & Spirits', '2421 Coral Ct', NULL, 'Coralville', 'IA', 52241),
(5, 'Lantern''s Keep', '49 W 44th St', NULL, 'New York', 'NY', 10036);

-- --------------------------------------------------------

--
-- Table structure for table `business_admins`
--

DROP TABLE IF EXISTS `business_admins`;
CREATE TABLE IF NOT EXISTS `business_admins` (
  `business_id` int(8) DEFAULT NULL,
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL DEFAULT 'admin',
  `password` varchar(60) NOT NULL DEFAULT '',
  `salt` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Truncate table before insert `business_admins`
--

TRUNCATE TABLE `business_admins`;
--
-- Dumping data for table `business_admins`
--

INSERT INTO `business_admins` (`business_id`, `user_id`, `username`, `password`, `salt`) VALUES
(1, 1, 'admin_1', '$2a$06$Y0aITCfE.4ypuur/yQw/4etGnO6I3MWTSuucXrGRyAlWVBMYYM68a', '$2a$06$KpsKrhRddlHZwbd1EbErA.tXHauVERXda3qSfTAEjcF8h0pSCDwA.'),
(2, 2, 'admin_2', '$2a$06$qQM1yOWbjCXn9f1hq06O4OGkokO0rmLfCiFCL31qhcVnst8IlwiMa', '$2a$06$UaFhGMdA48xq7lhJ/f0/N.SFyLwzrACmij6jME4cMWrM0otDMLRC.'),
(3, 3, 'admin_3', '$2a$06$90aFKAa2taUviyLrzqgyieC4qKtILZvvqicttMVqavsaZ/Vr7pvHG', '$2a$06$7YmHSy2bgqklkLa1qoOfgeM7UY7A7Rfk4SrYIhQ96ztk5ziWLY31S'),
(1, 4, 'admin_1alt', '$2a$06$lcDvMYIAxjNLa.iZtooowOgo79h40U5IGpufe9k3NfAw6ukm0rnDO', '$2a$06$Jvzh.wW34jf4c1AIEynxQ.I0iTwUbH./4bIsMPkVF6vHf8kMXChRm');

-- --------------------------------------------------------

--
-- Table structure for table `item_list`
--

DROP TABLE IF EXISTS `item_list`;
CREATE TABLE IF NOT EXISTS `item_list` (
  `business_id` int(8) DEFAULT NULL,
  `Bud_Light_Draft_16oz` decimal(4,2) DEFAULT NULL,
  `Bud_Light_Bottle` decimal(4,2) DEFAULT NULL,
  `Budweiser_Draft_16oz` decimal(4,2) DEFAULT NULL,
  `Budweiser_Bottle` decimal(4,2) DEFAULT NULL,
  `Jack_and_Coke_Single_Well` decimal(4,2) DEFAULT NULL,
  `Jack_and_Coke_Double_Well` decimal(4,2) DEFAULT NULL,
  `Jack_and_Coke_Triple_Well` decimal(4,2) DEFAULT NULL,
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `item_list`
--

TRUNCATE TABLE `item_list`;
--
-- Dumping data for table `item_list`
--

INSERT INTO `item_list` (`business_id`, `Bud_Light_Draft_16oz`, `Bud_Light_Bottle`, `Budweiser_Draft_16oz`, `Budweiser_Bottle`, `Jack_and_Coke_Single_Well`, `Jack_and_Coke_Double_Well`, `Jack_and_Coke_Triple_Well`) VALUES
(2, '2.05', '1.50', '1.85', '1.50', NULL, '2.00', NULL),
(1, '2.00', '2.00', '3.00', NULL, '1.05', NULL, '2.50');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

DROP TABLE IF EXISTS `tables`;
CREATE TABLE IF NOT EXISTS `tables` (
  `business_id` int(8) DEFAULT NULL,
  `table_id` int(8) NOT NULL AUTO_INCREMENT,
  `table_num` int(3) NOT NULL DEFAULT '0',
  `table_pass` varchar(60) NOT NULL DEFAULT '',
  `salt` varchar(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`table_id`),
  UNIQUE KEY `table_id` (`table_id`),
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Truncate table before insert `tables`
--

TRUNCATE TABLE `tables`;
--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`business_id`, `table_id`, `table_num`, `table_pass`, `salt`) VALUES
(1, 1, 0, '$2a$06$ZI9MEwC1vIskCPH6mVz2s.L6hLRgdLqWeRpuVc8hgTPEKoCrAKdGu', '$2a$06$KpsKrhRddlHZwbd1EbErA.tXHauVERXda3qSfTAEjcF8h0pSCDwA.'),
(1, 2, 1, '$2a$06$9tfZXkaYG6SrQWdShxXifezYn2vs1w3UsK3U36CiQ.gduNTlsMOaq', '$2a$06$vMAFClS/nNVAjoJvRJ65YOc3WH6ucdzX6sFXGgDQtBXg77LHoGn3G'),
(1, 4, 2, '$2a$06$GhJWgWHvb7Xy9lxENf3Q2eN4JTesR/9bl2njaaVmve5Eryf34up6e', '$2a$06$jpLS0nyzo.vRWazFlzFEReJZd2xvlqvIVBsijcRv8/Ae6tkaxqMp2'),
(2, 5, 1, '$2a$06$dIUqwWPnUOrYKIl7Swr9wOUjHX5kFKZHWv0AgtugZt3EMQJCiqKMe', '$2a$06$dejEUmtOxruIDqP3S8.QUO4jMTu4Dw49V6U74/WKORqt1Dvk9.112'),
(2, 6, 0, '$2a$06$8DqM/RFKX7SuxEpg99tdHe4NTTggIk6vdjTxjZSBeRO3DG3RjiSBG', '$2a$06$aptGT86KVOR0XyAjbfkfuuL7yjaXq4S0aHou32hdL4ZD800brg6TO'),
(2, 7, 2, '$2a$06$PiiPONivoXdVWgIFbMIQGOUk5jrlvIgHx6LQioDJIa2m6.M0enJUW', '$2a$06$yJL6/WolIbbqjkjQIMtIreIFPDjTPOGjv3WQYv1PmegTt0x6Mqiqa'),
(3, 8, 0, '$2a$06$z8sRvRVMEzZ1s3IphO/NqOH7rG/7XSYfGgfIeu4ujKyr5a0YCmKS6', '$2a$06$yMm4QqpLC060Qmz1/KJsE.e6248/S8aOTM/pUWkw7zfWLWD3G9eIW');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `business_admins`
--
ALTER TABLE `business_admins`
  ADD CONSTRAINT `business_admins_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`business_id`);

--
-- Constraints for table `item_list`
--
ALTER TABLE `item_list`
  ADD CONSTRAINT `item_list_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`business_id`);

--
-- Constraints for table `tables`
--
ALTER TABLE `tables`
  ADD CONSTRAINT `tables_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `businesses` (`business_id`);
