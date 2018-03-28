-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2018 at 07:55 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjectdetails`
--

CREATE TABLE `subjectdetails` (
  `sub_id` varchar(6) NOT NULL,
  `subjectname` varchar(100) NOT NULL,
  `test name` varchar(100) NOT NULL,
  `test description` varchar(5000) NOT NULL,
  `no_of_questions` bigint(200) NOT NULL,
  `time` time NOT NULL,
  `date from` date NOT NULL,
  `date to` date NOT NULL,
  `secret code` varchar(1000) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectdetails`
--

INSERT INTO `subjectdetails` (`sub_id`, `subjectname`, `test name`, `test description`, `no_of_questions`, `time`, `date from`, `date to`, `secret code`, `status`) VALUES
('111023', 'q', 'q', 'q', 12, '01:00:00', '2018-03-15', '2018-03-31', 'sa', 'No'),
('111111', 'a', 'a', 'a', 12, '00:24:00', '2018-03-16', '2018-03-25', 'as', 'No'),
('111189', 'science', 'so', 'olympiad', 10, '00:12:00', '2018-03-15', '2018-03-18', 'so', 'No'),
('112311', 'Computer Science', 'amcat', 'Exam for job recruitment for Computer Science Engineers', 12, '00:00:12', '2018-03-12', '2018-03-16', 'ska', 'No'),
('123211', 'maths', 'Maths Olympiad', 'Maths', 20, '00:02:00', '2018-03-13', '2018-03-21', 'maths', 'No'),
('123564', 'w', 'w', 'w', 12, '02:52:32', '2018-03-15', '2018-03-23', 'sasa', 'No'),
('FaiyGR', 'b', 'b', 'b', 23, '03:02:54', '2018-03-16', '2018-03-30', 'asa', 'No'),
('HEYuq1', 'l', 'l', 'l', 6, '02:45:24', '2018-03-16', '2018-03-31', 'kl', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `fullname` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `college` varchar(1000) NOT NULL,
  `year` bigint(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `rollnumber` bigint(20) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`fullname`, `email`, `college`, `year`, `section`, `mobile`, `rollnumber`, `password`) VALUES
('sahil', 'abv@gmail.com', 'kl', 1, 'A', 123, 123, '123'),
('sahil', 'mnp@gmail.com', 'kec', 1, 'A', 563, 563, '123'),
('sahil', 'xyz@gmail.com', 'kec', 1, 'A', 96352, 12032, '0120'),
('rishavh', 'rishi@gm.com', 'kec', 1, 'A', 654454, 1516110156, '12'),
('ska', 'akash121@hotmail.com', 'ddps', 3, 'B', 9784561234, 1515151516, 'ska');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subjectdetails`
--
ALTER TABLE `subjectdetails`
  ADD PRIMARY KEY (`sub_id`),
  ADD UNIQUE KEY `subjectname` (`subjectname`),
  ADD UNIQUE KEY `test name` (`test name`),
  ADD UNIQUE KEY `subjectname_2` (`subjectname`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`mobile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
