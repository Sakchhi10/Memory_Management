-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2022 at 07:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `SRN` varchar(20) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `SRN` varchar(15) NOT NULL,
  `NAME` text NOT NULL,
  `SCORE` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`SRN`, `NAME`, `SCORE`) VALUES
('PES1PG21CA012', 'Ashish', 88),
('PES1PG21CA037', 'Sakchiii', 38),
('PES1PG21CA039', 'mahesh', 25),
('PES1PG21CA048', 'Rishav', 38),
('PES1PG21CA052', 'Saheli', 0),
('PES1PG21CA060', 'Priyanka', 25),
('PES1PG21CA065', 'Rishabh Singh', 25),
('PES1PG21CA071', 'sfadf', 13),
('PES1PG21CA076', 'Rishabh Singh', 13),
('PES1PG21CA080', 'vijay singh', 25),
('PES1PG21CA087', 'shubhanshu', 25),
('PES1PG21CA090', 'wesdrfgh', 25),
('PES1PG21CA091', 'vijay singh', 50),
('PES1PG21CA093', 'Rishabh Singh', 50),
('PES1PG21CA095', 'vijay singh', 25),
('PES1PG21CA100', 'mahesh', 38);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(2) UNSIGNED NOT NULL,
  `question` varchar(500) DEFAULT NULL,
  `opt1` varchar(400) DEFAULT NULL,
  `opt2` varchar(400) DEFAULT NULL,
  `opt3` varchar(400) DEFAULT NULL,
  `opt4` varchar(400) DEFAULT NULL,
  `option` varchar(400) DEFAULT NULL,
  `explanation` varchar(400) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `option`, `explanation`) VALUES
(2, 'What is true about memory management?', 'Memory management keeps track of each and every memory location', 'It decides which process will get memory at what time.', 'It tracks whenever some memory gets freed or unallocated and correspondingly it updates the status.', 'All of the above', 'd', 'No explanation'),
(3, 'In which type of Fragmentation, Memory block assigned to process is bigger. Some portion of memory is left unused, as it cannot be used by another process.', 'External fragmentation', 'Internal fragmentation', 'Both A and B', 'None of the above', 'b', 'In internal fragmentation , memory size assigned is bigger than process size'),
(4, 'How many types of Fragmentation are there?', '2', '3', '4', '5', 'a', 'Internal fragmentation and External Fragmentation'),
(5, 'The first fit, best fit and worst fit are strategies to select a ____________', 'process from a queue to put in memory', 'processor to run the next process', 'free hole from a set of available holes', 'all of the mentioned', 'c', 'No explanation'),
(6, '__________ is generally faster than _________ and _________', 'first fit, best fit, worst fit', 'best fit, first fit, worst fit', 'worst fit, best fit, first fit', 'none of the mentioned', 'a', 'In First fit, we dont have to scan all the holes , we just do it till we find a hole big enough to store the process '),
(7, 'External fragmentation exists when?', 'enough total memory exists to satisfy a request but it is not contiguous', 'the total memory is insufficient to satisfy a request', 'a request cannot be satisfied even when the total memory is free', ' none of the mentioned', 'a', 'No explanation'),
(8, 'External fragmentation will not occur when?', 'first fit is used', 'best fit is used', 'worst fit is used', 'no matter which algorithm is used, it will always occur', 'd', 'None of the mentioned algorithm can prevent External Fragmentation'),
(9, 'When the memory allocated to a process is slightly larger than the process, then ____________', 'internal fragmentation occurs', 'external fragmentation occurs', 'both internal and external fragmentation occurs', 'neither internal nor external fragmentation occurs', 'a', 'No explanation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`SRN`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`SRN`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
