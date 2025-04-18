-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 10:12 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `email` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`email`, `password`, `first_name`, `last_name`) VALUES
('demo@gmail.com', '', 'a', 'a'),
('amal@gmail.com', '', 'a', 'Amal'),
('amal@gmail.com', '', 'a', 'Amal'),
('amal@gmail.com', '200', 'a', 'Amal'),
('amal@gmail.com', '200', 'a', 'Amal'),
('amal@gmail.com', '200', 'a', 'Amal'),
('demo3@gmail.com', '200', 'amal', 's'),
('', '', '', ''),
('demo3@gmail.com', '2000', 'malitha', 'tishamal'),
('nimal@gmail.com', '21455', 'nimal', 'senaka');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `sd_name` varchar(15) NOT NULL,
  `sd_email` varchar(30) NOT NULL,
  `sd_date` varchar(10) NOT NULL,
  `sd_number` int(10) NOT NULL,
  `sd_message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`sd_name`, `sd_email`, `sd_date`, `sd_number`, `sd_message`) VALUES
('sender1', 'demo@gmail.com', '', 0, ''),
('contact2', 'demo2@outlook.c', '', 0, ''),
('contact2', 'demo3@gmail.com', '', 752384848, 'Contcact me 0786562590'),
('contact1', 'demo@gmail.com', '', 0, ''),
('contact4', '', '', 0, ''),
('sender1', '', '', 786569875, ''),
('contact1', 'demo@gmail.com', '2024-09-18', 754545454, 'Check');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` varchar(10) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_time` varchar(10) NOT NULL,
  `course_date` varchar(15) NOT NULL,
  `duration_months` varchar(30) NOT NULL,
  `duration_hours` varchar(30) NOT NULL,
  `course_type` varchar(30) NOT NULL,
  `students` varchar(15) NOT NULL,
  `payments` varchar(30) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`, `course_time`, `course_date`, `duration_months`, `duration_hours`, `course_type`, `students`, `payments`, `link`) VALUES
('java', 'Java Programming', '21:35', '2024-11-02', '8', '120', 'Online | Instatute', '20', '15000 (5000x3)', 'zoom.us'),
('python', 'Python Programming', '13:30', '2024-11-03', '6', '120', 'Online | Instatute', '25', '18000 (6000x3)', 'zoon.us'),
('web', 'Web Development', '09:30', '2024-11-01', '6', '120', 'Online | Instatute', '20', '18000 (6000x3)', 'zoom.us'),
('iot', 'Robotic ', '13:30', '2024-10-31', '6', '60', 'Online | Instatute', '20', '15000 (5000x3)', 'zoom.us'),
('c01', 'IOT', '09:30', '2024-11-13', '8', '120', 'Online | Instatute', '25', '15000 (5000x3)', 'zoom.us');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `name` varchar(30) NOT NULL,
  `nic_no` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `number` int(10) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `city` varchar(10) NOT NULL,
  `java` int(5) NOT NULL,
  `web` int(5) NOT NULL,
  `python` int(5) NOT NULL,
  `class` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`name`, `nic_no`, `email`, `number`, `age`, `gender`, `city`, `java`, `web`, `python`, `class`) VALUES
('Amal', '20', 'amal@gmail.com', 755552485, 22, '', 'Galle', 0, 0, 0, ''),
('amal', '2002066036875', 'demo3@gmail.com', 775426877, 22, 'male', 'Galle', 15000, 0, 0, 'physic'),
('Amal', '20020660368752', 'amal@gmail.com', 755552485, 22, 'male', 'Galle', 0, 10000, 12000, ''),
('Amal', '202', 'amal@gmail.com', 755552485, 22, '', 'Galle', 0, 0, 0, ''),
('Amal', '203', 'amal@gmail.com', 755552485, 22, '', 'Galle', 0, 0, 0, ''),
('saman', '20320857485', 'demo@gmail.com', 755552485, 22, 'male', 'Matara', 0, 10000, 0, 'online'),
('Amal', '204', 'amal@gmail.com', 755552485, 11, '', 'Galle', 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`nic_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
