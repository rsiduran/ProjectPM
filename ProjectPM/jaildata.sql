-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 05:18 PM
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
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateofcapture` date NOT NULL,
  `dateohbirth` date NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `education` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `physicalcondition` enum('Good','Not Good') NOT NULL,
  `placeofcapture` varchar(255) NOT NULL,
  `placeofbirth` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `photofront` varchar(255) NOT NULL,
  `photoleft` varchar(255) NOT NULL,
  `preparedby` varchar(255) NOT NULL,
  `dateofprepared` date NOT NULL,
  `placeofprison` varchar(255) NOT NULL,
  `status` enum('Detained','Released') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `name`, `dateofcapture`, `dateohbirth`, `nationality`, `education`, `religion`, `sex`, `physicalcondition`, `placeofcapture`, `placeofbirth`, `address`, `father`, `mother`, `photofront`, `photoleft`, `preparedby`, `dateofprepared`, `placeofprison`, `status`) VALUES
(10, 'asdas', '2024-12-11', '2024-12-04', 'asdasd', 'asdsad', 'asdsad', 'Male', 'Good', 'asdasdasdas', '0000-00-00', 'dasdad', 'adadad', 'adadada', 'img1_67598091880b40.47756694.png', 'img2_67598091881077.25793706.jpg', 'asdsadasdas', '2024-12-04', 'asdasdasdasd', 'Detained');

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
(2, 'Jane Doe', 'JaneDoe@gmail.com', '09123456789', 'National ID', '232132144', 'John Does', 'img/uploadsStickers.jpg', '09123746278', 'Parent', 'Worried', 2);

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
  `terms_accepted` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visitation`
--

INSERT INTO `visitation` (`id`, `visitor_name`, `email`, `phone_number`, `id_type`, `id_number`, `inmate_name`, `inmate_id`, `relationship`, `visit_reason`, `terms_accepted`) VALUES
(2, 'John Doe', 'Email@gmail.com', '09123456789', 'Driver\'s License', '23412334451', 'John', 'img/uploadslogo.png', 'Parent', 'Nawawala', '2');

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
-- Indexes for table `record`
--
ALTER TABLE `record`
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
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
