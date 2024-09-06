-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 10:59 AM
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
-- Database: `somsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(8, 'INSTITUTE OF NURSING'),
(9, 'COLLEGE OF TEACHER EDUCATION'),
(10, 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(25) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `organization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_management`
--

CREATE TABLE `events_management` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `officers`
--

CREATE TABLE `officers` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `officer_email` varchar(255) NOT NULL,
  `officer_phone` varchar(20) NOT NULL,
  `course` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `personal_statement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `officers`
--

INSERT INTO `officers` (`id`, `student_name`, `officer_email`, `officer_phone`, `course`, `year`, `organization_name`, `position`, `personal_statement`) VALUES
(19, '13', 'hdeuhf21@gmail.com', '09987654321', 0, '', '7', 'Treasurer', ''),
(20, '13', 'delacruzalyssa607@gmail.com', '09465379305', 0, '', '7', 'Vice President', ''),
(21, '10', 'yedhsnskdj@gmail.com', '99875443345', 0, '', '7', 'P.R.Os.', ''),
(23, 'Alyssa Dela Cruz', 'hdiwdni@gmail.com', '123456789', 0, '4th Year', '[value-7]', 'President', 'kjfhiuecenucej');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `organization_name` varchar(255) NOT NULL,
  `organization_type` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `advisor_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `organization_name`, `organization_type`, `department`, `advisor_name`, `contact_email`, `logo`, `created_at`) VALUES
(7, 'INFORMATION TECHNOLOGY STUDENT ORGANIZATION', 'Academic', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'abcdefg', 'rfsdxsz@gmail.com', '66b511a9a2d881.25436988.png', '2024-08-08 18:42:49'),
(10, 'PSU-BC', 'Sports', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'aswa', 'aew@ghj.com', '66b597f1f24f47.45481820.jpg', '2024-08-09 04:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `year` varchar(10) NOT NULL,
  `section` varchar(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `age` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `street` varchar(255) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `municipality` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `username`, `password`, `lastname`, `firstname`, `middlename`, `course`, `year`, `section`, `gender`, `dob`, `age`, `email`, `phone`, `street`, `barangay`, `municipality`, `province`, `role`) VALUES
(8, '20-BGU-190', 'Admin', 'admin', 'Dela Cruz', 'Alyssa', 'Lanorio', 'BS Information Technology', 'III', '3', 'Female', '2002-07-08', 22, 'delacruzalyssa607@gmail.com', '09465379305', 'zone 1', 'Vacante', 'Bautista', 'Pangasinan', 'Admin'),
(10, '12-GYT-898', 'Alyssaaaa', '', 'edcsce', 'odoewdmw', 'iuijkre', 'BS Business Administration', 'II', '3', 'Female', '2004-08-09', 20, 'hdeuhf21@gmail.com', '09987654321', 'Namualan Sur', 'Diaz', 'Bautista', 'Pangasinan', 'Students');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `officers`
--
ALTER TABLE `officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `officers`
--
ALTER TABLE `officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
