-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 30, 2015 at 07:53 PM
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
(51, '11/04/2015', 253, 2, 0, 2),
(52, '11/04/2015', 254, 2, 0, 2),
(53, '11/18/2015', 262, 2, 0, 2),
(54, '12/03/2015', 291, 2, 0, 3);

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
(1, 'Shanto', '01565-455623', 'Dhanmondi 11, Dhaka', 'shanto.56@hotmail.com', 1),
(2, 'Eshan', '0125366985233\r\n', 'Bank Colony,Savar,Dhaka', 'atahjid@gmail.com', 4),
(3, 'test', 'test', 'test', 'test', 0),
(4, 'Mubin', '0163698756', 'dhaka', 'atahjid@gmail.com', 1),
(5, '', '', '', '', 0);

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
('', '', 1),
('admin', 'admin', 2),
('Eshan', 'eshan', 1),
('Fathe', 'fathe', 1),
('Mubin', 'mubin', 1),
('test', 'test', 1);

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

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`customerNo`, `Amount`) VALUES
(2, 1500);

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
(1, 'Dhaka', 'Chittagong'),
(2, 'Chittagong', 'Dhaka'),
(3, 'Chittagong', 'Khulna'),
(4, 'Dhaka', 'Khulna'),
(5, 'Khulna', 'Dhaka'),
(6, 'Khulna', 'Chittagong');

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
  `empty` int(2) NOT NULL DEFAULT '0',
  `schedule` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`SeatNo`, `ClassNo`, `empty`, `schedule`) VALUES
(102, 1, 0, 3),
(252, 1, 0, 3),
(253, 2, 1, 2),
(254, 2, 1, 2),
(255, 1, 0, 2),
(256, 1, 0, 2),
(257, 1, 0, 2),
(258, 1, 0, 2),
(259, 1, 0, 2),
(260, 1, 0, 2),
(261, 2, 0, 2),
(262, 3, 1, 2),
(263, 3, 0, 2),
(264, 3, 0, 2),
(265, 3, 0, 2),
(266, 3, 0, 2),
(267, 3, 0, 2),
(268, 3, 0, 2),
(269, 3, 0, 2),
(270, 3, 0, 2),
(271, 3, 0, 2),
(272, 3, 0, 2),
(273, 3, 0, 2),
(274, 3, 0, 2),
(275, 2, 0, 2),
(276, 3, 0, 2),
(277, 2, 0, 2),
(278, 2, 0, 2),
(279, 2, 0, 2),
(280, 2, 0, 2),
(281, 2, 0, 2),
(282, 2, 0, 2),
(283, 2, 0, 2),
(284, 2, 0, 2),
(285, 2, 0, 2),
(286, 2, 0, 2),
(287, 2, 0, 2),
(288, 3, 0, 3),
(289, 3, 0, 3),
(290, 1, 0, 3),
(291, 2, 1, 3),
(292, 2, 0, 3),
(293, 1, 0, 3),
(294, 2, 0, 3);

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

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`TicketNo`, `BookingNo`) VALUES
(9, 51),
(10, 52),
(11, 53),
(12, 54);

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
(3, 500, 'Mohanogor Provati', 297),
(5, 295, 'DhakaRail156', 278);

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
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleNo` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `SeatNo` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;
--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `TicketNo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`ClassNo`) REFERENCES `class` (`classNo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`BookingNo`) REFERENCES `booking` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
