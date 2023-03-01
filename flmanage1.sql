-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2023 at 12:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flmanage1`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `flight_no` int(10) NOT NULL,
  `fl_name` varchar(20) NOT NULL,
  `fl_destination` varchar(20) NOT NULL,
  `fl_source` varchar(20) NOT NULL,
  `fl_departure_dt` date NOT NULL,
  `fl_depart_time` time NOT NULL,
  `price` int(11) NOT NULL,
  `fl_arr_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`flight_no`, `fl_name`, `fl_destination`, `fl_source`, `fl_departure_dt`, `fl_depart_time`, `price`, `fl_arr_time`) VALUES
(101, 'AirIndia', 'Mumbai', 'Goa', '2022-12-12', '18:32:00', 4570, '19:32:00'),
(102, 'JetAirways', 'Delhi', 'Bangalore', '2022-12-26', '14:50:00', 6700, '15:50:00'),
(103, 'JetAirways', 'Delhi', 'Mumbai', '2022-12-27', '20:30:00', 7500, '22:00:00'),
(104, 'Indigo', 'Mumbai', 'Rajasthan', '2023-01-02', '34:25:00', 3000, '35:25:00'),
(105, 'GoAir', 'Delhi', 'Goa', '2022-12-05', '31:30:00', 5700, '32:30:00'),
(106, 'AirIndia', 'Bangalore', 'Delhi', '2022-12-14', '27:21:54', 7500, '28:21:00'),
(107, 'AirIndia', 'Goa', 'Mumbai', '2022-12-13', '14:23:00', 3000, '15:30:00'),
(108, 'Indigo', 'Goa', 'Bangalore', '2023-01-17', '26:33:00', 7500, '24:30:00'),
(109, 'GoAir', 'Mumbai', 'Jaipur', '2022-12-20', '28:00:00', 4000, '29:00:00'),
(110, 'Indigo', 'Jaipur', 'Delhi', '2023-01-26', '26:20:00', 3000, '27:20:00'),
(111, 'GoAir', 'Mumbai', 'Goa', '2022-12-12', '10:59:41', 4000, '12:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `pid` int(11) NOT NULL,
  `psprt_no` varchar(20) NOT NULL,
  `pfname` varchar(20) NOT NULL,
  `plname` varchar(20) NOT NULL,
  `p_dob` date NOT NULL,
  `p_age` int(11) NOT NULL,
  `p_gender` varchar(20) NOT NULL,
  `flight_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`pid`, `psprt_no`, `pfname`, `plname`, `p_dob`, `p_age`, `p_gender`, `flight_no`) VALUES
(120, '2323', 'quisha', 'gjhg', '2022-12-21', 32, 'female', 101);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `user_id` int(15) DEFAULT NULL,
  `passenger_id` int(15) NOT NULL,
  `ticket_id` int(15) NOT NULL,
  `flight_id` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`user_id`, `passenger_id`, `ticket_id`, `flight_id`) VALUES
(16, 120, 942504, 101);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_email` text NOT NULL,
  `user_ph_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(20) NOT NULL,
  `user_lname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_email`, `user_ph_no`, `user_id`, `user_fname`, `user_lname`, `username`, `user_pwd`) VALUES
('JaneD@GMAIL.COM', 2147483647, 15, 'jane', 'Doe', 'JaneD', '123'),
('gauridhore83@gmail.com', 767676, 16, 'gauri', 'barve', 'gauri', 'gauri'),
('qui@gmail.com', 0, 17, 'quisha', 'coutinho', 'QuishaC', '123'),
('qc@gmail.com', 12345, 18, 'quisha', 'coutinho', 'quisha', '111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`,`passenger_id`) USING BTREE,
  ADD KEY `Fk_2` (`passenger_id`),
  ADD KEY `Fk_3` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `Fk_2` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`pid`) ON DELETE CASCADE,
  ADD CONSTRAINT `Fk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
