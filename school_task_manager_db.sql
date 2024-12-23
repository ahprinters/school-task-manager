-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2023 at 08:38 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_task_manager_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `tbl_subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_teacher` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`tbl_subject_id`, `subject_name`, `subject_teacher`) VALUES
(1, 'Math', 'Teacher 1'),
(2, 'Science', 'Teacher 2'),
(3, 'MAPEH', 'Teacher 3'),
(4, 'Filipino', 'Teacher 4'),
(5, 'TLE', 'Teacher 5'),
(6, 'GMRC', 'Teacher 6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_task`
--

CREATE TABLE `tbl_task` (
  `tbl_task_id` int(11) NOT NULL,
  `tbl_subject_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `task_deadline` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_task`
--

INSERT INTO `tbl_task` (`tbl_task_id`, `tbl_subject_id`, `task_name`, `task_status`, `task_deadline`) VALUES
(3, 1, 'Activity 3', 'Pending', '2023-10-06 23:59:00'),
(4, 2, 'Assignment 2', 'Pending', '2023-10-13 23:59:00'),
(5, 3, 'Music Video', 'In Progress', '2023-10-20 23:59:00'),
(6, 3, 'Coffee Painting', 'Completed', '2023-10-02 12:00:00'),
(7, 4, 'Isang Daang Tula', 'In Progress', '2023-10-06 23:59:00'),
(8, 6, 'Assignment 5', 'Completed', '2023-10-02 23:59:00'),
(9, 5, 'RJ45', 'Completed', '2023-10-03 23:59:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`tbl_subject_id`);

--
-- Indexes for table `tbl_task`
--
ALTER TABLE `tbl_task`
  ADD PRIMARY KEY (`tbl_task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `tbl_subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_task`
--
ALTER TABLE `tbl_task`
  MODIFY `tbl_task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
