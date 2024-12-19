-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 15, 2023 at 05:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `WatchNow`
--

-- --------------------------------------------------------

--
-- Table structure for table `Bookings`
--

CREATE TABLE `Bookings` (
  `bookingID` int(10) UNSIGNED NOT NULL,
  `showTime` time NOT NULL,
  `showDate` date NOT NULL,
  `custID` int(10) UNSIGNED NOT NULL,
  `promoID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Cinemas`
--

CREATE TABLE `Cinemas` (
  `cinID` int(10) UNSIGNED NOT NULL,
  `location` varchar(45) NOT NULL,
  `numShowRooms` tinyint(128) DEFAULT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Movies`
--

CREATE TABLE `Movies` (
  `movieID` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `director` varchar(45) DEFAULT NULL,
  `producer` varchar(45) DEFAULT NULL,
  `synopsis` varchar(45) DEFAULT NULL,
  `trailer` varchar(45) DEFAULT NULL,
  `rating` varchar(45) DEFAULT NULL,
  `cast` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment_Info`
--

CREATE TABLE `Payment_Info` (
  `paymentID` int(10) UNSIGNED NOT NULL,
  `cardNum` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `expiration` date NOT NULL,
  `cvv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Promotions`
--

CREATE TABLE `Promotions` (
  `promoID` int(10) UNSIGNED NOT NULL,
  `isValid` tinyint(2) DEFAULT NULL,
  `discount` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Seats`
--

CREATE TABLE `Seats` (
  `row` varchar(4) NOT NULL,
  `number` tinyint(200) NOT NULL,
  `booking_num` tinyint(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Showings`
--

CREATE TABLE `Showings` (
  `showID` int(10) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `duration` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Showrooms`
--

CREATE TABLE `Showrooms` (
  `roomID` int(10) UNSIGNED NOT NULL,
  `cinID` int(10) UNSIGNED NOT NULL,
  `roomNum` int(11) NOT NULL,
  `numSeats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE `Status` (
  `custID` int(10) UNSIGNED NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `suspended` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Tickets`
--

CREATE TABLE `Tickets` (
  `tickID` int(10) UNSIGNED NOT NULL,
  `custID` int(10) UNSIGNED NOT NULL,
  `ticketType` tinyint(3) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `bookingID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `TicketSeat`
--

CREATE TABLE `TicketSeat` (
  `showID` int(10) UNSIGNED NOT NULL,
  `seatRow` varchar(4) DEFAULT NULL,
  `seatNum` tinyint(200) DEFAULT NULL,
  `ticketID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `userID` int(10) UNSIGNED NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` tinyint(2) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`userID`, `email`, `password`, `userType`, `phoneNumber`, `name`) VALUES
(2, 'z@gmail.com', 'a', 2, 'sdf', NULL),
(3, 'zfeininger@gmail.com', 'pies', 2, '7708624034', 'Zachary Feininger'),
(4, 'zac@gmail.com', '$2y$10$C/vCjKBK0a9vEPtNz.xgW.lHZeKyazWnCqC2bspzOFXmWAReJjV/i', 2, 'sdf', 'zac'),
(5, 'munchin@munch.gov', '$2y$10$qLLsi3OQI/9OcysA//cCo.223TKgtGL1t2vm6UNkT8HcM/bmP1cem', 2, '7708434034', 'ThatBoy AMunch');

-- --------------------------------------------------------

--
-- Table structure for table `Written_Reviews`
--

CREATE TABLE `Written_Reviews` (
  `reviewID` int(10) UNSIGNED NOT NULL,
  `text` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Bookings`
--
ALTER TABLE `Bookings`
  ADD PRIMARY KEY (`bookingID`,`custID`);

--
-- Indexes for table `Cinemas`
--
ALTER TABLE `Cinemas`
  ADD PRIMARY KEY (`cinID`);

--
-- Indexes for table `Movies`
--
ALTER TABLE `Movies`
  ADD PRIMARY KEY (`movieID`,`name`);

--
-- Indexes for table `Payment_Info`
--
ALTER TABLE `Payment_Info`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `Promotions`
--
ALTER TABLE `Promotions`
  ADD PRIMARY KEY (`promoID`);

--
-- Indexes for table `Showings`
--
ALTER TABLE `Showings`
  ADD PRIMARY KEY (`showID`);

--
-- Indexes for table `Showrooms`
--
ALTER TABLE `Showrooms`
  ADD PRIMARY KEY (`roomID`);

--
-- Indexes for table `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`custID`);

--
-- Indexes for table `Tickets`
--
ALTER TABLE `Tickets`
  ADD PRIMARY KEY (`tickID`,`custID`);

--
-- Indexes for table `TicketSeat`
--
ALTER TABLE `TicketSeat`
  ADD PRIMARY KEY (`ticketID`,`showID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `Written_Reviews`
--
ALTER TABLE `Written_Reviews`
  ADD PRIMARY KEY (`reviewID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Bookings`
--
ALTER TABLE `Bookings`
  MODIFY `bookingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Cinemas`
--
ALTER TABLE `Cinemas`
  MODIFY `cinID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Movies`
--
ALTER TABLE `Movies`
  MODIFY `movieID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment_Info`
--
ALTER TABLE `Payment_Info`
  MODIFY `paymentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Promotions`
--
ALTER TABLE `Promotions`
  MODIFY `promoID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Showings`
--
ALTER TABLE `Showings`
  MODIFY `showID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Showrooms`
--
ALTER TABLE `Showrooms`
  MODIFY `roomID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Tickets`
--
ALTER TABLE `Tickets`
  MODIFY `tickID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Written_Reviews`
--
ALTER TABLE `Written_Reviews`
  MODIFY `reviewID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
