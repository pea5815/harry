-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 10:41 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harry`
--

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(11) NOT NULL,
  `house_name` varchar(20) NOT NULL,
  `house_detail` varchar(100) NOT NULL,
  `house_picture` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `house_name`, `house_detail`, `house_picture`) VALUES
(1, 'บ้านกริฟฟินดอร์', 'ตัวแทนความกล้าหาญ มีคุณธรรม มีความซื่อสัตย์ มีไหวพริบ และชอบความท้าทาย', ''),
(2, 'บ้านฮัฟเฟิลพัฟ', 'ตัวแทนความซื่อสัตย์ มีความยุติธรรม มีความอดทน และมีความตั้งใจ', ''),
(3, 'บ้านเรเวนคลอ', 'ตัวแทนความเฉลียวฉลาด มีสติปัญญาดี มีความคิดสร้างสรรค์ มีบุคลิกดี', ''),
(4, 'บ้านสลิธีริน', 'ตัวแทนความเป็นผู้นำ ฉลาดแกมโกง มีความเด็ดขาด', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_fullname` varchar(50) NOT NULL,
  `house_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_fullname`, `house_id`) VALUES
(111, 'สามารถ จงนอก', 3),
(112, 'นายพลพจน์	จันทร์คำ', 2),
(113, 'นายสิทธิศักดิ์	โตพะไล', 2),
(114, 'นายโอภาส	นนท์นอก', 2),
(115, 'นายวิเชียร	จัตุรงค์', 2),
(116, 'dsf', 4),
(117, 'นางพิกุล	ศรีโยธา', 1),
(118, 'นางพรวิณี	วณิชาชีวะ', 4),
(119, 'นางพรวิณี	วณิชาชีวะ', 3),
(120, 'นางพรวิณี	วณิชาชีวะ', 1),
(121, 'นางพรวิณี	วณิชาชีวะ', 4),
(122, 'นางพรวิณี	วณิชาชีวะ', 1),
(123, 'นางพรวิณี	วณิชาชีวะ', 4),
(124, 'นางพรวิณี	วณิชาชีวะ', 1),
(125, 'นางพรวิณี	วณิชาชีวะ', 2),
(126, 'สามารถ จงนอก', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
