-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2022 at 06:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentmarksheet`
--

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `course` varchar(25) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `sub1` varchar(5) NOT NULL,
  `sub2` varchar(5) NOT NULL,
  `sub3` varchar(5) NOT NULL,
  `sub4` varchar(5) NOT NULL,
  `sub5` varchar(5) NOT NULL,
  `total` varchar(10) NOT NULL,
  `percentage` varchar(5) NOT NULL,
  `class` varchar(20) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `stud_id`, `course`, `semester`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `total`, `percentage`, `class`, `result`) VALUES
(1, 1, '', '1', '80', '95', '86', '92', '89', '442', '88.4', 'FIRST DISTINCTION', 'PASS'),
(2, 2, '', '1', '45', '50', '60', '75', '85', '315', '63', '', 'FAIL'),
(3, 3, '', '1', '85', '80', '70', '60', '88', '383', '76.6', 'FIRST DISTINCTION', 'PASS'),
(6, 4, '', '2', '80', '95', '86', '92', '85', '438', '87.6', 'FIRST DISTINCTION', 'PASS');

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `stud_id` int(11) NOT NULL,
  `sname` varchar(25) NOT NULL,
  `scourse` varchar(25) NOT NULL,
  `scontact` varchar(15) NOT NULL,
  `sgender` varchar(10) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `spassword` varchar(20) NOT NULL,
  `image` longtext NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`stud_id`, `sname`, `scourse`, `scontact`, `sgender`, `semail`, `spassword`, `image`, `status`) VALUES
(1, 'Lavkush Maurya', 'MCA', '76 0035 0611', 'male', 'lavkush@gmail.com', 'lavkush', 'uploadd/20181113001822_IMG_5643.JPG', 'Deactive'),
(2, 'Adesh Pawar', 'mscit', '8787454511', 'male', 'adesh@gmail.com', 'adesh', 'uploadd/photo-1.jpg', 'Active'),
(3, 'Ashish', 'MCA', '7875454512', 'male', 'ashish@gmail.com', 'ashish', 'uploadd/20180922051438_IMG_0233.JPG', 'Active'),
(4, 'vipul nadge', 'mca', '8783562322', 'male', 'vipul@gmail.com', 'vipul', 'uploadd/20181019011818_IMG_2888.JPG', 'Active'),
(6, 'Ashish', 'mca', '7457811214', 'male', 'ashish@gmail.com', 'ashish', 'uploadd/20180922051610_IMG_0236.JPG', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD UNIQUE KEY `stud_id` (`stud_id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`stud_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
