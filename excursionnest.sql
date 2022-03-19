-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 07:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `excursionnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `Name` varchar(80) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`Name`, `Phone`, `mail`, `password`, `location`) VALUES
('ExcursionNest', '01313962424', 'admin2628@gmail.com', 'Admin2628', 'Aust');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `mail` varchar(80) NOT NULL,
  `p_name` varchar(80) DEFAULT NULL,
  `phone` varchar(80) DEFAULT NULL,
  `place` varchar(80) DEFAULT NULL,
  `StartD` varchar(80) DEFAULT NULL,
  `EndIng` varchar(80) DEFAULT NULL,
  `HOTEL` varchar(80) DEFAULT NULL,
  `Others` varchar(80) DEFAULT NULL,
  `COST` int(11) DEFAULT NULL,
  `PERSON` int(11) DEFAULT NULL,
  `NUM` int(11) NOT NULL,
  `FLAG` int(11) DEFAULT 0,
  `CANCEL` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked`
--

INSERT INTO `booked` (`mail`, `p_name`, `phone`, `place`, `StartD`, `EndIng`, `HOTEL`, `Others`, `COST`, `PERSON`, `NUM`, `FLAG`, `CANCEL`) VALUES
('muttakieva@gmail.com', 'Tahsina Muttaki', '01625394906', 'Dhaka to Kuakata', '2022-02-18', '2022-02-21', 'A Resort near Beach', 'Meal All day', 8800, 2, 998, 1, 1),
('muttakieva@gmail.com', 'Tahsina Muttaki', '01625394906', 'Dhaka to BichanaKandi', '2022-02-12', '2022-02-17', 'A Resort near Beach', 'Meal All day', 7800, 2, 999, 1, 1),
('muttakieva@gmail.com', 'Tahsina Muttaki', '01625394906', 'Dhaka to Cox Bazar', '2022-03-12', '2022-03-17', 'A Resort near Beach', 'Parasailing, Meal All day', 11700, 3, 1002, 0, 0),
('safwanmasuk4@gmail.com', 'Safwan Ibne Masuk', '01625154677', 'Dhaka to Sundarbans', '2022-02-20', '2022-03-24', 'Tents', 'Guide All Day', 6900, 2, 997, 1, 1),
('safwanmasuk4@gmail.com', 'Safwan Ibne Masuk', '01625154677', 'Dhaka to Cox Bazar', '2022-03-12', '2022-03-17', 'A Resort near Beach', 'Parasailing, Meal All day', 7800, 2, 1002, 0, 0),
('safwanmasuk4@gmail.com', 'Safwan Ibne Masuk', '01625154677', 'Dhaka to Boga Lake', '2022-03-05', '2022-03-06', 'Local Hotel (Any)', 'Meal 2 times', 7200, 4, 1019, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `upcoming`
--

CREATE TABLE `upcoming` (
  `StartP` varchar(80) DEFAULT NULL,
  `StartD` varchar(80) DEFAULT NULL,
  `togo` varchar(80) DEFAULT NULL,
  `EndIng` varchar(80) DEFAULT NULL,
  `HOTEL` varchar(80) DEFAULT NULL,
  `Others` varchar(80) DEFAULT NULL,
  `Pic` varchar(80) DEFAULT NULL,
  `COST` int(11) DEFAULT NULL,
  `NUM` int(11) NOT NULL,
  `FLAG` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `upcoming`
--

INSERT INTO `upcoming` (`StartP`, `StartD`, `togo`, `EndIng`, `HOTEL`, `Others`, `Pic`, `COST`, `NUM`, `FLAG`) VALUES
('Dhaka', '2022-03-12', 'Cox Bazar', '2022-03-17', 'A Resort near Beach', 'Parasailing, Meal All day', 'Coxs Bazar Beauty.jpg', 3900, 1002, 0),
('Dhaka', '2022-02-20', 'Rangamati', '2022-02-23', 'Local Hotel (Any)', 'Meal 3 times a day', 'Rangamati Green.jpg', 4000, 1007, 1),
('Dhaka', '2022-02-19', 'Sajek Valley', '2022-02-23', 'A Famous Resort', 'Meal 3 times a day', 'Sajek Valley.jpg', 5000, 1011, 1),
('Dhaka', '2022-02-20', 'Sundarbans', '2022-02-22', 'Tents', 'Guide only', 'Sundarbans.jpg', 4000, 1012, 1),
('Dhaka', '2022-02-20', 'Rangamati', '2022-02-24', 'Local Hotel (Any)', 'Meal 3 times a day', 'Rangamati Green.jpg', 4000, 1015, 1),
('Dhaka', '2022-02-16', 'Nijhum Dwip', '2022-02-20', 'Tents', 'Meal All day', 'Nijhum Dwip.jpg', 7000, 1016, 1),
('Dhaka', '2022-02-23', 'Saint Martin', '2022-02-27', 'Hotel Sky Blue', 'Meal,Guide all day', 'St. Martin.jpg', 8000, 1017, 1),
('Dhaka', '2022-03-05', 'Kaptai Lake', '2022-03-06', 'Hotel Sky Blue', 'Meal,Guide all day', 'Kaptai Lake.jpg', 4000, 1018, 1),
('Dhaka', '2022-03-05', 'Boga Lake', '2022-03-06', 'Local Hotel (Any)', 'Meal 2 times', 'Boga Lake.jpg', 1800, 1019, 1),
('Dhaka', '2022-03-05', 'Bichanakandi', '2022-03-07', 'Hotel SunShine', 'Meal,Guide all day', 'Bichanakandi.jpg', 2000, 1020, 1),
('Dhaka', '2022-03-09', 'Bandarban', '2022-03-14', 'Tents', 'Meal 3 times a day, Vehicle included', 'Bandarban.jpg', 6000, 1021, 0),
('Dhaka', '2022-03-10', 'Sundarbans', '2022-03-13', 'Rest House', 'Meal 3 times a day', 'Sundarbans.jpg', 7500, 1022, 0),
('Dhaka', '2022-03-07', 'Rangamati', '2022-03-12', 'Hill View Resort', 'Meal 2 times', 'Rangamati Green.jpg', 5500, 1023, 0),
('Dhaka', '2022-03-09', 'Kuakata', '2022-03-12', 'Tents', 'Meal 3 times a day', 'kuakata_faded sun.jpg', 3000, 1024, 0),
('Dhaka', '2022-03-10', 'Sylhet', '2022-03-13', 'Hotel Sky Blue', 'Meal 3 times, Guide all day', 'Sylhet Tea Estate.jpg', 1700, 1025, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Name` varchar(80) DEFAULT NULL,
  `Phone` varchar(15) DEFAULT NULL,
  `mail` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `location` varchar(20) DEFAULT NULL,
  `Msg` varchar(255) DEFAULT NULL,
  `rep` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Phone`, `mail`, `password`, `location`, `Msg`, `rep`) VALUES
('Moeen Ali', '01625984966', 'ali12@gmail.com', 'Moeen120', 'Sylhet', NULL, NULL),
('Asif Iftekher Fahim', '01710272727', 'asif27@gmail.com', '27Fahima', 'Netrokona', 'Hello, This is Fahim.\r\nCan you tell me about trips of Dhaka-Saint Martin?', NULL),
('Tahsina Muttaki', '01625394906', 'muttakieva@gmail.com', '26Muttaki', 'Lakshmipur', 'Hello, This is Tahsina.\r\nCan you tell me about trips that will be starting on 7th March,2022?', 'There are 2 trips on that day. Dhaka-Kuakata & Dhaka - Coxs Bazar.'),
('Safwan Ibne Masuk', '01625154677', 'safwanmasuk4@gmail.com', '28Safwan', 'Dhaka', 'Hello, This is Safwan. If possible,Can you please reduce the cost of trip#1019?', NULL),
('Shakib Al Hasan', '01710757575', 'sah75@gmail.com', 'Shakib075', 'Magura', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`mail`,`NUM`);

--
-- Indexes for table `upcoming`
--
ALTER TABLE `upcoming`
  ADD PRIMARY KEY (`NUM`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `upcoming`
--
ALTER TABLE `upcoming`
  MODIFY `NUM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1026;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
