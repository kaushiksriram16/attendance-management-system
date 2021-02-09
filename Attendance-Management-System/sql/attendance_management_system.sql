-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 03:57 PM
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
-- Database: `attendance_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily_attendance`
--

CREATE TABLE `daily_attendance` (
  `date` date NOT NULL,
  `sid` varchar(20) NOT NULL,
  `attendance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daily_attendance`
--

INSERT INTO `daily_attendance` (`date`, `sid`, `attendance`) VALUES
('2021-02-08', '18ra1a0501', 'present'),
('2021-02-08', '18ra1a0514', 'absent'),
('2021-02-08', '18ra1a0533', 'present'),
('2021-02-08', '18ra1a0538', 'absent'),
('2021-02-08', '18ra1a0549', 'present'),
('2021-02-08', '18ra1a0557', 'absent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(20) NOT NULL,
  `id` varchar(20) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `year` int(2) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `total_attendance_percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `id`, `branch`, `year`, `email`, `password`, `total_attendance_percentage`) VALUES
('Thakur Akshay Singh', '18ra1a0501', 'CSE', 3, 'singhakshay7088@gmail.com', '1234', NULL),
('Sriram Kaushik', '18ra1a0514', 'CSE', 3, 'kaushik162000@gmail.com', '1234', NULL),
('Prem', '18ra1a0533', 'CSE', 3, 'premkumarjangid@gmail.com', 'kprit123', NULL),
('Nimmakanti Saicharan', '18ra1a0538', 'CSE', 3, 'nsaicharan20@gmail.com', '1234', NULL),
('S.Suchit Kumar', '18ra1a0549', 'CSE', 3, 'suchitkumar@gmail.com', '1234', NULL),
('Vamshi Krishna', '18ra1a0557', 'CSE', 3, 'vamshikrishna@gmail.com', '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tid` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`firstname`, `lastname`, `email`, `tid`, `password`) VALUES
('kaushik', 'sriram', 'kaushik162000@gmail.com', 1, 'kprit123'),
('Akshay', 'Singh', 'singhakshay@123', 5, '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD KEY `foreign_key_name` (`sid`);

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
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daily_attendance`
--
ALTER TABLE `daily_attendance`
  ADD CONSTRAINT `foreign_key_name` FOREIGN KEY (`sid`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
