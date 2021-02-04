-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 04:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendance`
--

CREATE TABLE `daily_attendance` (
  `date` date NOT NULL,
  `sid` varchar(20) NOT NULL,
  `subject` int(50) NOT NULL,
  `attendance` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student-teacher`
--

CREATE TABLE `student-teacher` (
  `sid` varchar(20) NOT NULL,
  `tid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `year` int(2) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_attendance_percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `id`, `password`, `year`, `branch`, `email`, `total_attendance_percentage`) VALUES
('Thakur Akshay Singh', '18ra1a0501', '', 3, 'CSE', 'singhakshay7088@gmail.com', NULL),
('Sriram Kaushik', '18ra1a0514', '', 3, 'CSE', 'kaushik162000@gmail.com', NULL),
('Nimmakanti Saicharan', '18ra1a0538', '', 3, 'CSE', 'nsaicharan20@gmail.com', NULL),
('S.Suchit Kumar', '18ra1a0549', '', 3, 'CSE', 'suchitkumar@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `tid` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD KEY `foreign_key_name` (`sid`);

--
-- Indexes for table `student-teacher`
--
ALTER TABLE `student-teacher`
  ADD PRIMARY KEY (`sid`,`tid`),
  ADD KEY `constraint2` (`tid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`tid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD CONSTRAINT `foreign_key_name` FOREIGN KEY (`sid`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student-teacher`
--
ALTER TABLE `student-teacher`
  ADD CONSTRAINT `constaint` FOREIGN KEY (`sid`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `constraint2` FOREIGN KEY (`tid`) REFERENCES `teachers` (`tid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
