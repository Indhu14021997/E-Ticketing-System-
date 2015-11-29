-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 28, 2015 at 06:03 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID` int(7) NOT NULL,
  `date` text NOT NULL,
  `seat_no` int(50) NOT NULL,
  `customerNo` int(100) NOT NULL,
  `Checked` int(1) NOT NULL DEFAULT '0',
  `ScheduleNo` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID`, `date`, `seat_no`, `customerNo`, `Checked`, `ScheduleNo`) VALUES
(1, '10/12/15', 231, 1, 1, 2),
(2, '10/12.', 252, 2, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `classNo` int(5) NOT NULL,
  `TicketPrice` int(6) NOT NULL,
  `ClassName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`classNo`, `TicketPrice`, `ClassName`) VALUES
(1, 500, 'First'),
(2, 350, 'Second'),
(3, 250, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `booked` int(7) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `mail`, `booked`) VALUES
(1, 'Shanto', '01565-455623', 'Dhanmondi 11, Dhaka', 'shanto.56@hotmail.com', 0),
(2, 'Eshan', '0125366985233\r\n', 'Bank Colony,Savar,Dhaka', 'atahjid@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `Class` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Name` varchar(30) NOT NULL,
  `Password` varchar(11) NOT NULL,
  `Class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Name`, `Password`, `Class`) VALUES
('admin', 'admin', 2),
('Eshan', 'eshan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Notice`
--

CREATE TABLE `Notice` (
  `ScheduleNo` int(100) NOT NULL,
  `Notice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `customerNo` int(100) NOT NULL,
  `Amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(100) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `source`, `destination`) VALUES
(1, 'Dhaka', 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `ScheduleNo` int(3) NOT NULL,
  `RouteNo` int(7) NOT NULL,
  `Arrival` time NOT NULL,
  `Departure` time NOT NULL,
  `trainNo` int(10) NOT NULL,
  `station` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleNo`, `RouteNo`, `Arrival`, `Departure`, `trainNo`, `station`) VALUES
(1, 0, '05:00:00', '06:00:00', 5, 1),
(2, 1, '02:00:00', '03:00:00', 5, 1),
(3, 1, '02:00:00', '03:00:00', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `SeatNo` int(50) NOT NULL,
  `ClassNo` int(100) NOT NULL,
  `TrainNo` int(100) NOT NULL,
  `empty` int(2) NOT NULL DEFAULT '0',
  `schedule` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatNo`, `ClassNo`, `TrainNo`, `empty`, `schedule`) VALUES
(102, 1, 5, 0, 3),
(252, 1, 5, 0, 3),
(253, 2, 5, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `name` varchar(100) NOT NULL,
  `id` int(100) NOT NULL,
  `Location` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`name`, `id`, `Location`) VALUES
('Kamalapur Station', 1, 'Dhaka'),
('Tejgao Station', 2, 'Dhaka'),
('Dampara Station', 4, 'Chittagong'),
('Rajbari Station', 6, 'Rajshahi'),
('University station', 8, 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `TicketNo` int(7) NOT NULL,
  `BookingNo` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `no` int(100) NOT NULL,
  `total_seat` int(100) NOT NULL,
  `trainName` varchar(100) NOT NULL,
  `freeSeat` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`no`, `total_seat`, `trainName`, `freeSeat`) VALUES
(3, 500, 'Mohanogor Provati', 300),
(5, 295, 'DhakaRail156', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `seat_no` (`seat_no`),
  ADD KEY `customerNo` (`customerNo`),
  ADD KEY `ScheduleNo` (`ScheduleNo`),
  ADD KEY `seat_no_2` (`seat_no`),
  ADD KEY `seat_no_3` (`seat_no`),
  ADD KEY `seat_no_4` (`seat_no`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`classNo`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Name`),
  ADD KEY `Class` (`Class`);

--
-- Indexes for table `Notice`
--
ALTER TABLE `Notice`
  ADD KEY `ScheduleNo` (`ScheduleNo`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `customerNo` (`customerNo`),
  ADD KEY `customerNo_2` (`customerNo`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleNo`),
  ADD KEY `RouteNo` (`RouteNo`),
  ADD KEY `trainNo` (`trainNo`),
  ADD KEY `station` (`station`),
  ADD KEY `RouteNo_2` (`RouteNo`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`SeatNo`),
  ADD KEY `ClassNo` (`ClassNo`),
  ADD KEY `TrainNo` (`TrainNo`),
  ADD KEY `schedule` (`schedule`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`TicketNo`),
  ADD KEY `BookingNo` (`BookingNo`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customerNo`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`ScheduleNo`) REFERENCES `schedule` (`ScheduleNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Name`) REFERENCES `login` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customerNo`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`station`) REFERENCES `station` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`trainNo`) REFERENCES `train` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`ClassNo`) REFERENCES `class` (`classNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`TrainNo`) REFERENCES `train` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`BookingNo`) REFERENCES `booking` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
