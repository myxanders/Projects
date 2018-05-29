-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 06:00 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `corporate_directory`
--
CREATE DATABASE IF NOT EXISTS `corporate_directory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `corporate_directory`;
-- --------------------------------------------------------

--
-- Table structure for table `access_log`
--

CREATE TABLE `access_log` (
  `logid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `ad` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_log`
--

INSERT INTO `access_log` (`logid`, `eid`, `ad`) VALUES
(1, 1, '2017-11-01 04:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appid` int(11) NOT NULL,
  `description` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appid`, `description`) VALUES
(1, 'Skype'),
(2, 'Salesforce'),
(3, 'Assets'),
(4, 'Outlook'),
(5, 'Teamcity'),
(6, 'Artifactory');

-- --------------------------------------------------------

--
-- Table structure for table `application_access_log`
--

CREATE TABLE `application_access_log` (
  `appid` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `application_access_log`
--

INSERT INTO `application_access_log` (`appid`, `eid`) VALUES
(4, 3),
(3, 5),
(5, 3),
(4, 3),
(5, 5),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `application_request`
--

CREATE TABLE `application_request` (
  `reqid` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  `rd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `did` int(11) NOT NULL,
  `description` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`did`, `description`) VALUES
(1, 'Marketing'),
(2, 'Sales'),
(3, 'Plant and Infrastructure'),
(4, 'Information Technology'),
(5, 'Product Development'),
(6, 'Human Resources');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `did` int(11) DEFAULT NULL,
  `username` varchar(96) NOT NULL,
  `reportsTo` int(11) DEFAULT NULL,
  `firstname` varchar(96) NOT NULL,
  `lastname` varchar(96) NOT NULL,
  `picture` varchar(96) DEFAULT 'defaultprofile.png',
  `dob` date NOT NULL,
  `hireDate` date NOT NULL,
  `homePhone` bigint(30) NOT NULL,
  `workExt` int(11) NOT NULL,
  `email` varchar(96) NOT NULL,
  `streetAddress` varchar(96) NOT NULL,
  `city_town` varchar(96) NOT NULL,
  `state` varchar(96) DEFAULT NULL,
  `country` varchar(96) NOT NULL,
  `zip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `oid`, `tid`, `did`, `username`, `reportsTo`, `firstname`, `lastname`, `picture`, `dob`, `hireDate`, `homePhone`, `workExt`, `email`, `streetAddress`, `city_town`, `state`, `country`, `zip`) VALUES
(1, 1, 1, 6, 'kaimanners', NULL, 'kai', 'manners', DEFAULT, '1996-02-22', '2001-08-09', 2147483647, 324, 'somethingweird102@gmail.com', '8721 Nero St.', 'Hollis', 'NY', 'USA', 11423),
(3, 3, 4, 3, 'barackobama', 1, 'barack', 'obama', DEFAULT, '2017-02-05', '2017-11-05', 985059483, 898, 'barackobama@gmail.com', '21 Pennsylvania Avenue', 'Washington DC', 'VA', 'USA', 9281),
(5, 5, 2, 4, 'Hideki.Kamiya', 3, 'Hideki ', 'Kamiya', DEFAULT, '2017-03-26', '2017-11-07', 7189098282, 898, 'viewtifuljoe@gmail.com', '87 Nanako Street', 'Nagano Perfecture', NULL, 'JP', 11433),
(6, 2, 2, 2, 'kwest', 5, 'Kanye ', 'West', DEFAULT, '1980-11-11', '2017-08-21', 7489830493, 321, 'iamagod@gmail.com', '76 Chitown St.', 'Chicago', 'Illinois', 'USA', 54672),
(7, 5, 4, 5, 'quentintarantino', 6, 'quentin', 'tarantino', DEFAULT, '1975-11-09', '2017-08-21', 7489580293, 758, 'killbill@hotmail.com', '87 Pulp Lane', 'Los Angeles', 'CA', 'USA', 64785),
(8, 1, 2, 2, 'hov', 1, 'shawn', 'carter', DEFAULT, '1967-08-07', '2017-05-22', 7890987364, 758, 'younghov@gmail.com', '87 Magna Carta St.', 'New York City', 'NY', 'USA', 64785),
(9, 3, 3, 6, 'HR', 1, 'Human', 'Resources', DEFAULT, '1990-01-01', '2017-11-01', 7185909384, 876, 'hr@gmail.com', '76 Utopia Lane', 'Astoria', 'NY', 'USA', 11423),
(10, 3, 4, 3, 'georgebush', NULL, 'George', 'Bush', DEFAULT, '1990-02-09', '2011-08-09', 7489507584, 839, 'georgebush@president.com', '900 Rockland St', 'Clarke', '', 'USA', 73849),
(11, 2, 2, 2, 'richardgere', NULL, 'Richard', 'Gere', DEFAULT, '1970-08-09', '2017-02-03', 7485940392, 748, 'richardgere@gmail.com', '98 Apple Road', 'Rockland', 'OR', 'USA', 92830),
(12, 2, 4, 5, 'levarburton', 1, 'levar', 'burton', DEFAULT, '1980-11-09', '2017-01-01', 8379405930, 29, 'levarburton@gmail.com', '80 Karoake Street', 'Portis', 'Utah', 'USA', 9827),
(13, 4, 5, 3, 'miyamoto', 11, 'shigeru', 'miyamoto', DEFAULT, '1987-02-09', '2017-11-05', 8179483029, 827, 'nintendo@gmail.com', '90 Kirbyville', 'Tontsu', NULL, 'JP', 16273),
(14, 2, 2, 3, 'opethalice', NULL, 'opeth', 'alice', DEFAULT, '1970-01-01', '2017-08-01', 8394098978, 231, 'opethalice@gmail.com', '89 Polle Ave', 'Hollywood', 'NY', 'USA', 32143),
(15, 1, 1, 1, 'mickjagger', 6, 'mick', 'jagger', DEFAULT, '2017-07-17', '2017-11-15', 7182983049, 617, 'mickjagger@gmail.com', '8721 popopo', 'hollis', NULL, 'USA', 15245),
(16, 1, 2, 5, 'asdasd', NULL, 'asd', 'asd', DEFAULT, '1990-02-09', '1970-01-01', 7648589879, 321, 'somethingweird102@gmail.com', '12318273', 'asd', 'asdasd', 'USA', 11423),
(17, 2, 1, 2, 'willywonka', NULL, 'willy', 'wonka', DEFAULT, '1970-01-01', '1990-02-22', 7584938123, 321, 'willywonka@gmail.com', '90 Rick Lane', 'Mew York', '', 'USA', 11423),
(18, 5, 3, 3, 'ninjaturtle', NULL, 'leonardo', 'theturtle', DEFAULT, '2017-11-08', '2017-01-10', 98789798797, 876, 'ninjaturtle@gmail.com', '78 Poop', 'Hollis', '', 'USA', 11423),
(19, 4, 3, 4, 'hellomyguy', NULL, 'qwe', 'qwe', DEFAULT, '2017-11-23', '2017-11-01', 8768768123, 312, 'password@gmail.com', '87 popop', 'asda', '', 'iuio', 12332),
(20, 2, 3, 2, 'poopooman', NULL, 'bitch', 'mcconnell', DEFAULT, '2017-11-01', '2017-11-22', 918273912873, 132, 'poo@gmail.com', '90 KAKAKA', 'NEW', '', 'USA', 82822),
(21, 2, 1, 4, 'billburr', NULL, 'bill', 'burr', DEFAULT, '2017-11-01', '2017-11-14', 87632111111, 321, 'somethingweird102@gmail.com', '87 bill burr lane', 'Hollis', 'NY', 'USA', 11423),
(22, 6, 3, 2, 'johnnydepp', NULL, 'johnny', 'depp', DEFAULT, '2017-11-14', '2017-11-06', 87629382732, 313, 'jdepp@gmail.com', '09 Poop Box', 'Hollis', '', 'USA', 11123),
(23, 6, 3, 2, 'hannahmontana', NULL, 'hannah', 'montana', DEFAULT, '2017-11-01', '2017-11-22', 9728374938, 910, 'hm@gmail.com', '87 Kentucky Road', 'Derby', 'KY', 'USA', 17283),
(24, 3, 1, 3, 'ellaella', NULL, 'ella', 'ella', '20171016_211753.jpg', '2017-11-30', '2017-11-01', 123123817231, 321, 'ella@gmail.com', '98798 asdadasd', 'Loooo', '', 'USA', 32123),
(25, 2, 4, 5, 'ryanreynolds', NULL, 'ryan', 'reynolds', 'superior-foes-team-meeting.jpg', '2017-11-02', '2017-11-01', 12312313123, 123, 'ryan@gmail.com', 'efqewfqefqefqwq', 'kjhg', 'kjgh', 'gkghkjgh', 654654),
(26, 2, 2, 4, 'myxanders', NULL, 'mitchell', 'xanders', DEFAULT, '2017-12-04', '2011-11-11', 7608518161, 205, 'myxanders@acme.org', '718 Mariner', 'Lakeway', 'TX', 'USA', 78734);
-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(96) NOT NULL,
  `pwd` varchar(96) NOT NULL,
  `pwdset` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `pwd`, `pwdset`) VALUES
('asdasd', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af', DEFAULT),
('barackobama', 'password', DEFAULT),
('georgebush', 'password', DEFAULT),
('hellomyguy', '$2y$11$FDnnEDq9e5MRHRHlXVOiSu9V.527P26G5opvKFAY0Z5GaArt/qvWq', DEFAULT),
('Hideki.Kamiya', 'bayonetta123', DEFAULT),
('HR', 'password', DEFAULT),
('kaimanners', 'ihatemylife647', DEFAULT),
('levarburton', 'password', DEFAULT),
('mickjagger', 'password', DEFAULT),
('miyamoto', 'password', DEFAULT),
('ninjaturtle', '$2y$11$H4tgy7zzO9pP5N3gYOLRY.xhtoS71Qvjgkdn9dL/5d9zhJRdIV0Zq', DEFAULT),
('opethalice', '', DEFAULT),
('poopooman', '$2y$11$LRIHmDkdUKvcMvn1.HpwYeNtgoSV4tZwfqrxThkl/3bfk8bycIclq', DEFAULT),
('richardgere', 'password', DEFAULT),
('willywonka', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af', DEFAULT),
('myxanders', '', DEFAULT);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `oid` int(11) NOT NULL,
  `location` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`oid`, `location`) VALUES
(2, 'Chicago'),
(6, 'London'),
(3, 'Los Angeles'),
(1, 'New York City'),
(5, 'Paris'),
(4, 'Tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `systems`
--

CREATE TABLE `systems` (
  `sysid` int(11) NOT NULL,
  `descrip` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systems`
--

INSERT INTO `systems` (`sysid`, `descrip`) VALUES
(2, 'email'),
(4, 'instant messaging'),
(1, 'phone'),
(3, 'web server');

-- --------------------------------------------------------

--
-- Table structure for table `system_mgmt`
--

CREATE TABLE `system_mgmt` (
  `sysid` int(11) NOT NULL,
  `eid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_mgmt`
--

INSERT INTO `system_mgmt` (`sysid`, `eid`) VALUES
(2, 3),
(3, 1),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `tid` int(11) NOT NULL,
  `posname` varchar(96) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`tid`, `posname`) VALUES
(2, 'Administrator'),
(1, 'CEO/Board'),
(5, 'Employee'),
(3, 'HR'),
(4, 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_log`
--
ALTER TABLE `access_log`
  ADD PRIMARY KEY (`logid`),
  ADD KEY `FOREIGN_KEY` (`eid`) COMMENT 'foreign_key';

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `application_access_log`
--
ALTER TABLE `application_access_log`
  ADD KEY `FOREIGN_KEY` (`appid`) COMMENT 'foreign_key',
  ADD KEY `FOREIGN_KEY2` (`eid`) COMMENT 'foreign_key';

--
-- Indexes for table `application_request`
--
ALTER TABLE `application_request`
  ADD PRIMARY KEY (`reqid`),
  ADD KEY `foreign_key` (`app_id`),
  ADD KEY `foreign_key2` (`e_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `eid` (`eid`),
  ADD KEY `FOREIGN_KEY` (`oid`) COMMENT 'foreign_key',
  ADD KEY `FOREIGN_KEY3` (`username`) COMMENT 'foreign_key3',
  ADD KEY `FOREIGN_KEY2` (`tid`) COMMENT 'foreign_key2',
  ADD KEY `did` (`did`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`oid`),
  ADD UNIQUE KEY `location` (`location`);

--
-- Indexes for table `systems`
--
ALTER TABLE `systems`
  ADD PRIMARY KEY (`sysid`),
  ADD KEY `descrip` (`descrip`);

--
-- Indexes for table `system_mgmt`
--
ALTER TABLE `system_mgmt`
  ADD KEY `FOREIGN_KEY` (`eid`) COMMENT 'foreign_key',
  ADD KEY `sysid` (`sysid`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `posname` (`posname`),
  ADD KEY `tid` (`tid`),
  ADD KEY `posname_2` (`posname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_log`
--
ALTER TABLE `access_log`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `application_request`
--
ALTER TABLE `application_request`
  MODIFY `reqid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `systems`
--
ALTER TABLE `systems`
  MODIFY `sysid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_log`
--
ALTER TABLE `access_log`
  ADD CONSTRAINT `access_log_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_access_log`
--
ALTER TABLE `application_access_log`
  ADD CONSTRAINT `application_access_log_ibfk_1` FOREIGN KEY (`appid`) REFERENCES `application` (`appid`),
  ADD CONSTRAINT `application_access_log_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `application_request`
--
ALTER TABLE `application_request`
  ADD CONSTRAINT `application_request_ibfk_1` FOREIGN KEY (`app_id`) REFERENCES `application` (`appid`),
  ADD CONSTRAINT `application_request_ibfk_2` FOREIGN KEY (`e_id`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `did` FOREIGN KEY (`did`) REFERENCES `department` (`did`),
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `organization` (`oid`),
  ADD CONSTRAINT `tid` FOREIGN KEY (`tid`) REFERENCES `title` (`tid`);
COMMIT;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `employee` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_mgmt`
--
ALTER TABLE `system_mgmt`
  ADD CONSTRAINT `system_mgmt_ibfk_1` FOREIGN KEY (`sysid`) REFERENCES `systems` (`sysid`),
  ADD CONSTRAINT `system_mgmt_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
