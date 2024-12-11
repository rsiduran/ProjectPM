-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 02:28 PM
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
-- Database: `jaildata`
--

-- --------------------------------------------------------

--
-- Table structure for table `appeal`
--

CREATE TABLE `appeal` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `appeal_type` varchar(255) NOT NULL,
  `inmate_name` varchar(255) NOT NULL,
  `appeal_description` varchar(255) NOT NULL,
  `supporting_docs` varchar(255) NOT NULL,
  `previous_comms` varchar(255) NOT NULL,
  `consent` tinyint(1) NOT NULL,
  `terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medical`
--

CREATE TABLE `medical` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `inmate_name` varchar(255) NOT NULL,
  `inmate_age` int(11) NOT NULL,
  `medical_condition` varchar(255) NOT NULL,
  `medical_history` varchar(255) NOT NULL,
  `assistance` varchar(255) NOT NULL,
  `additional_info` text NOT NULL,
  `terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `RegistrationID` int(11) NOT NULL,
  `FullName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Address` text NOT NULL,
  `DetaineesFullName` varchar(255) NOT NULL,
  `Relationship` varchar(100) NOT NULL,
  `IDPicture` varchar(255) NOT NULL,
  `RegistrationStatus` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`RegistrationID`, `FullName`, `Email`, `Address`, `DetaineesFullName`, `Relationship`, `IDPicture`, `RegistrationStatus`, `Password`) VALUES
(10, 'asdasd', 'abc@gmail.com', 'asdasd', 'asdasd', 'parent', '6758476d6d3e3.jpg', 'Approved', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `virtual`
--

CREATE TABLE `virtual` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_type` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `inmate_name` varchar(255) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `number_call` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `virtual`
--

INSERT INTO `virtual` (`id`, `visitor_name`, `email`, `phone_number`, `id_type`, `id_number`, `inmate_name`, `inmate_id`, `number_call`, `relationship`, `reason`, `terms`) VALUES
(2, 'Jane Doe', 'JaneDoe@gmail.com', '09123456789', 'National ID', '232132144', 'John Does', 'img/uploadsStickers.jpg', '09123746278', 'Parent', 'Worried', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitation`
--

CREATE TABLE `visitation` (
  `id` int(11) NOT NULL,
  `visitor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `id_type` varchar(255) NOT NULL,
  `id_number` varchar(255) NOT NULL,
  `inmate_name` varchar(255) NOT NULL,
  `inmate_id` varchar(255) NOT NULL,
  `relationship` varchar(255) NOT NULL,
  `visit_reason` text NOT NULL,
  `terms_accepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitation`
--

INSERT INTO `visitation` (`id`, `visitor_name`, `email`, `phone_number`, `id_type`, `id_number`, `inmate_name`, `inmate_id`, `relationship`, `visit_reason`, `terms_accepted`) VALUES
(2, 'John Doe', 'Email@gmail.com', '09123456789', 'Driver\'s License', '23412334451', 'John', 'img/uploadslogo.png', 'Parent', 'Nawawala', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appeal`
--
ALTER TABLE `appeal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical`
--
ALTER TABLE `medical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`RegistrationID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `virtual`
--
ALTER TABLE `virtual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitation`
--
ALTER TABLE `visitation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appeal`
--
ALTER TABLE `appeal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medical`
--
ALTER TABLE `medical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `RegistrationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `virtual`
--
ALTER TABLE `virtual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitation`
--
ALTER TABLE `visitation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
