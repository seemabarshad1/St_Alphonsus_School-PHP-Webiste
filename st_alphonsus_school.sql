-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2025 at 12:34 PM
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
-- Database: `st_alphonsus_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `Class_ID` int(11) NOT NULL,
  `Teacher_ID` int(11) DEFAULT NULL,
  `ClassName` varchar(55) NOT NULL,
  `Capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`Class_ID`, `Teacher_ID`, `ClassName`, `Capacity`) VALUES
(1, 1, 'Year One', 35);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `Parent_ID` int(11) NOT NULL,
  `FirstName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`Parent_ID`, `FirstName`, `LastName`, `Email`, `Phone`, `Address`) VALUES
(1, 'Alexa', 'Smith', 'Alexa@gmail.com', '0987654321', 'NY');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `Pupil_ID` int(11) NOT NULL,
  `FirstName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `DOB` date NOT NULL,
  `Address` text NOT NULL,
  `Medical_Info` text DEFAULT NULL,
  `Class_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`Pupil_ID`, `FirstName`, `LastName`, `DOB`, `Address`, `Medical_Info`, `Class_ID`) VALUES
(1, 'James', 'MOrgan', '2015-06-15', 'Sydeny', 'No allergies', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pupil_parent`
--

CREATE TABLE `pupil_parent` (
  `Pupil_ID` int(11) NOT NULL,
  `Parent_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `Teacher_ID` int(11) NOT NULL,
  `FirstName` varchar(55) NOT NULL,
  `LastName` varchar(55) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `AnnualSalary` decimal(10,2) NOT NULL,
  `Background_check` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`Teacher_ID`, `FirstName`, `LastName`, `phone`, `address`, `AnnualSalary`, `Background_check`) VALUES
(1, 'April', 'Day', '1234567890', 'NY', 45000.00, 'Passed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`Class_ID`),
  ADD UNIQUE KEY `ClassName` (`ClassName`),
  ADD UNIQUE KEY `Teacher_ID` (`Teacher_ID`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`Parent_ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`Pupil_ID`),
  ADD KEY `Class_ID` (`Class_ID`);

--
-- Indexes for table `pupil_parent`
--
ALTER TABLE `pupil_parent`
  ADD PRIMARY KEY (`Pupil_ID`,`Parent_ID`),
  ADD KEY `Parent_ID` (`Parent_ID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`Teacher_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `Class_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `Parent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pupils`
--
ALTER TABLE `pupils`
  MODIFY `Pupil_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `Teacher_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`Teacher_ID`) REFERENCES `teachers` (`Teacher_ID`) ON DELETE SET NULL;

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `pupils_ibfk_1` FOREIGN KEY (`Class_ID`) REFERENCES `classes` (`Class_ID`) ON DELETE SET NULL;

--
-- Constraints for table `pupil_parent`
--
ALTER TABLE `pupil_parent`
  ADD CONSTRAINT `pupil_parent_ibfk_1` FOREIGN KEY (`Pupil_ID`) REFERENCES `pupils` (`Pupil_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `pupil_parent_ibfk_2` FOREIGN KEY (`Parent_ID`) REFERENCES `parents` (`Parent_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
