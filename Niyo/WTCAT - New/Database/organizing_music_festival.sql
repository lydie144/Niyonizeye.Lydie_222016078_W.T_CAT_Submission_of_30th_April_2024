-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 01:20 AM
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
-- Database: `organizing_music_festival`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `ArtistID` int(5) NOT NULL,
  `stageName` varchar(100) NOT NULL,
  `Genre` varchar(30) NOT NULL,
  `platform` varchar(15) NOT NULL,
  `Email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`ArtistID`, `stageName`, `Genre`, `platform`, `Email`) VALUES
(1, 'NINA', 'RNB', 'spotify', 'kwiarcade@gmail.com'),
(2, 'Okkam', 'POP', 'youtube', 'okk001@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `AttendeeID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `festival`
--

CREATE TABLE `festival` (
  `FestivalID` int(5) NOT NULL,
  `Name` varchar(1000) NOT NULL,
  `StartDate` varchar(15) NOT NULL,
  `EndDate` varchar(10) NOT NULL,
  `OrganizerID` int(5) NOT NULL,
  `Ticket Price` decimal(5,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `festival`
--

INSERT INTO `festival` (`FestivalID`, `Name`, `StartDate`, `EndDate`, `OrganizerID`, `Ticket Price`) VALUES
(3, 'Pontensiano ', '2024-04-22', '2024-04-26', 1, 1000),
(5, 'BUSHALI', '2024-04-25', '2024-04-28', 1, 1000),
(6, 'She.ma', '2024-04-25', '2024-04-23', 2, 2000),
(7, 'EAST AFRICAN PR', '2024-04-07', '2024-04-12', 4, 1000),
(8, 'Berck-sur-Mer Kite Festival', '2024-04-18', '2024-04-21', 5, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `organizer`
--

CREATE TABLE `organizer` (
  `OrganizerID` int(5) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Email` varchar(15) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `Location` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer`
--

INSERT INTO `organizer` (`OrganizerID`, `Name`, `Phone`, `Email`, `Title`, `Location`) VALUES
(1, 'KWIZERA Al', '0788304180', 'kwiarcade@gmail', 'producer', 'kigali'),
(3, 'HITIMANA F', '0788854186', 'hitimana@gmail.', 'Manager', 'Gakenke'),
(4, 'Niyonizeye', '079823456', 'lydieniyonizeye', 'Producer', 'kigali'),
(5, 'SHEMA Chri', '0787513434', 'rugwirochristia', 'Cordinator', 'kigali');

-- --------------------------------------------------------

--
-- Table structure for table `performances`
--

CREATE TABLE `performances` (
  `PerformanceID` int(11) NOT NULL,
  `FestivalID` int(11) DEFAULT NULL,
  `ArtistID` int(11) DEFAULT NULL,
  `PerformanceDate` date DEFAULT NULL,
  `StartTime` time DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int(11) NOT NULL,
  `AttendeeID` int(11) DEFAULT NULL,
  `FestivalID` int(11) DEFAULT NULL,
  `PurchaseDate` date DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`ArtistID`);

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`AttendeeID`);

--
-- Indexes for table `festival`
--
ALTER TABLE `festival`
  ADD PRIMARY KEY (`FestivalID`);

--
-- Indexes for table `organizer`
--
ALTER TABLE `organizer`
  ADD PRIMARY KEY (`OrganizerID`);

--
-- Indexes for table `performances`
--
ALTER TABLE `performances`
  ADD PRIMARY KEY (`PerformanceID`),
  ADD KEY `FestivalID` (`FestivalID`),
  ADD KEY `ArtistID` (`ArtistID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`),
  ADD KEY `AttendeeID` (`AttendeeID`),
  ADD KEY `FestivalID` (`FestivalID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `ArtistID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `AttendeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `festival`
--
ALTER TABLE `festival`
  MODIFY `FestivalID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organizer`
--
ALTER TABLE `organizer`
  MODIFY `OrganizerID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `performances`
--
ALTER TABLE `performances`
  MODIFY `PerformanceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `performances`
--
ALTER TABLE `performances`
  ADD CONSTRAINT `performances_ibfk_1` FOREIGN KEY (`FestivalID`) REFERENCES `festival` (`FestivalID`),
  ADD CONSTRAINT `performances_ibfk_2` FOREIGN KEY (`ArtistID`) REFERENCES `artist` (`ArtistID`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`AttendeeID`) REFERENCES `attendees` (`AttendeeID`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`FestivalID`) REFERENCES `festival` (`FestivalID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
