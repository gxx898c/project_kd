-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 02:59 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `category_listID` smallint(3) NOT NULL,
  `category_listName` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category_name`
--

CREATE TABLE `category_name` (
  `category_nameID` smallint(3) NOT NULL,
  `category_nameName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farm_id` smallint(3) NOT NULL,
  `farm_name` varchar(1000) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `farm_name`, `lat`, `lng`) VALUES
(1, 'ฟาร์มสมชาย', 13.1231895615616, 13.1261895156189),
(2, 'ฟาร์มสมหมอย', 12.26159612156312, 12.12318915615615),
(3, 'สวนสมร', 13.212224236, 13.248251026),
(4, 'สวนแดงฉาน', 20.125165123123, 20.023165162123),
(21, 'ฟาร์มสมชัย สาขาหนองงูด่างแห', 12.122525, 19.232125),
(22, 'ฟาร์มสมชัย สาขาหนองงูด่างแห', 12.122525, 19.232125),
(23, 'ฟาร์ม เทสๆ', 12.121212, 12.44744);

-- --------------------------------------------------------

--
-- Table structure for table `farm_user_acc`
--

CREATE TABLE `farm_user_acc` (
  `farm_uid` smallint(3) NOT NULL,
  `farm_id` smallint(3) NOT NULL,
  `user_id` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `farm_user_acc`
--

INSERT INTO `farm_user_acc` (`farm_uid`, `farm_id`, `user_id`) VALUES
(1, 1, 1),
(2, 3, 4),
(3, 3, 4),
(4, 2, 4),
(6, 1, 3),
(14, 11, 2),
(18, 16, 2),
(19, 17, 2),
(20, 18, 2),
(21, 19, 2),
(22, 20, 1),
(23, 21, 5),
(24, 22, 5),
(25, 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groupsensor`
--

CREATE TABLE `groupsensor` (
  `group_id` smallint(3) NOT NULL,
  `group_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groupsensor`
--

INSERT INTO `groupsensor` (`group_id`, `group_name`) VALUES
(1, 'Node 1'),
(2, 'Node 2'),
(3, 'Node 3'),
(4, 'Node 4');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `sensor_id` smallint(3) NOT NULL,
  `value` double NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `sensor_id`, `value`, `time`) VALUES
(1, 1, 32.5, '2019-01-29 09:36:14'),
(2, 1, 32.4, '2019-01-29 09:36:14'),
(3, 1, 35.5, '2019-01-29 09:36:31'),
(4, 1, 35.5, '2019-01-29 09:36:31'),
(23, 1, 29, '2019-03-05 00:10:00'),
(24, 1, 30, '2019-03-05 00:20:00'),
(25, 1, 31, '2019-03-05 00:30:00'),
(26, 1, 32, '2019-03-05 00:40:00'),
(27, 1, 33, '2019-03-05 00:50:00'),
(28, 1, 34, '2019-03-05 01:00:00'),
(29, 1, 33, '2019-03-05 01:10:00'),
(30, 1, 32, '2019-03-05 01:20:00'),
(31, 1, 31, '2019-03-05 01:30:00'),
(32, 1, 30, '2019-03-05 01:40:00'),
(33, 1, 29, '2019-03-05 01:50:00'),
(34, 1, 28, '2019-03-05 02:00:00'),
(35, 1, 29, '2019-03-05 02:10:00'),
(36, 1, 30, '2019-03-05 02:20:00'),
(37, 1, 29, '2019-03-05 03:00:00'),
(38, 1, 30, '2019-03-05 03:20:00'),
(39, 1, 31, '2019-03-05 03:30:00'),
(40, 1, 32, '2019-03-05 03:40:00'),
(41, 1, 33, '2019-03-05 03:50:00'),
(42, 1, 34, '2019-03-05 04:00:00'),
(43, 1, 33, '2019-03-05 05:10:00'),
(44, 1, 32, '2019-03-05 06:20:00'),
(45, 1, 31, '2019-03-05 07:30:00'),
(46, 1, 30, '2019-03-05 08:40:00'),
(47, 1, 29, '2019-03-05 08:50:00'),
(48, 1, 28, '2019-03-05 09:00:00'),
(49, 1, 29, '2019-03-05 09:10:00'),
(50, 1, 30, '2019-03-05 09:20:00'),
(51, 3, 30, '2019-03-12 12:33:19'),
(52, 7, 80, '2019-03-12 12:45:00'),
(53, 7, 70, '2019-03-12 13:00:00'),
(54, 7, 80, '2019-03-12 13:10:00'),
(55, 7, 75, '2019-03-12 13:10:00'),
(56, 7, 80, '2019-03-12 13:15:00'),
(57, 7, 80, '2019-03-12 13:20:00'),
(58, 7, 75, '2019-03-12 13:30:00'),
(59, 3, 20, '2019-03-12 06:20:00'),
(60, 3, 20, '2019-03-12 06:20:00'),
(61, 3, 22, '2019-03-12 06:22:00'),
(62, 3, 22.2, '2019-03-12 06:29:00'),
(63, 3, 30, '2019-03-12 06:40:00'),
(65, 2, 22, '2019-03-11 23:00:00'),
(66, 2, 22, '2019-03-11 23:00:00'),
(67, 2, 23, '2019-03-11 23:05:00'),
(68, 2, 22.5, '2019-03-11 23:10:00'),
(69, 2, 22.2, '2019-03-11 23:15:00'),
(70, 2, 22, '2019-03-11 23:20:00'),
(71, 2, 23, '2019-03-11 23:20:00'),
(72, 2, 22.8, '2019-03-11 23:25:00'),
(73, 2, 22, '2019-03-11 23:30:00'),
(74, 2, 25, '2019-03-12 00:00:00'),
(75, 2, 25, '2019-03-12 00:00:00'),
(76, 2, 24, '2019-03-12 00:05:00'),
(77, 2, 24.2, '2019-03-12 00:10:00'),
(78, 2, 24.5, '2019-03-12 00:15:00'),
(79, 2, 25.1, '2019-03-12 00:20:00'),
(80, 2, 25, '2019-03-12 00:25:00'),
(81, 2, 24.8, '2019-03-12 00:30:00'),
(82, 2, 26, '2019-03-12 00:35:00'),
(83, 2, 25, '2019-03-12 00:40:00'),
(84, 2, 26, '2019-03-12 00:45:00'),
(85, 2, 25, '2019-03-12 00:50:00'),
(86, 2, 25, '2019-03-12 00:55:00'),
(87, 2, 24.8, '2019-03-12 01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sensor`
--

CREATE TABLE `sensor` (
  `sensor_id` smallint(3) NOT NULL,
  `sensor_name` varchar(200) NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `unit_id` smallint(3) NOT NULL,
  `min` smallint(5) NOT NULL,
  `max` smallint(5) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `category_name` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor`
--

INSERT INTO `sensor` (`sensor_id`, `sensor_name`, `dateadd`, `unit_id`, `min`, `max`, `lat`, `lng`, `category_name`) VALUES
(1, 'วัดอุณหภูมิ', '2019-03-05 15:48:14', 1, 0, 100, 13.1231895615617, 13.1231895615618, 0),
(2, 'วัดความชื้น', '2019-03-05 15:48:19', 2, 0, 100, 13.1251665126, 13.3215616513, 0),
(3, 'วัดแรงลม', '2019-03-05 15:48:25', 3, 0, 100, 13.1231895615616, 13.1231895615618, 0),
(4, 'วัด UV', '2019-03-05 15:48:31', 4, 0, 100, 15.251651165151, 16.216513615156, 0),
(7, 'น้ำ 1', '2019-03-04 17:09:01', 5, 0, 100, 2132213123, 12123213312, 0),
(8, 'ลม 1', '2019-03-04 17:10:02', 3, 0, 100, 12121, 1111134534534, 0),
(9, 'UV 1', '2019-03-05 14:47:03', 4, 0, 100, 121, 1124, 0),
(10, 'UV 2', '2019-03-05 14:47:21', 4, 0, 100, 114, 1114, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sensorgroup`
--

CREATE TABLE `sensorgroup` (
  `sensorgroup_id` int(3) NOT NULL,
  `sensor_id` smallint(3) NOT NULL,
  `group_id` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensorgroup`
--

INSERT INTO `sensorgroup` (`sensorgroup_id`, `sensor_id`, `group_id`) VALUES
(1, 1, 2),
(2, 3, 2),
(3, 7, 1),
(4, 8, 2),
(5, 9, 2),
(6, 10, 2),
(7, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sensor_farm`
--

CREATE TABLE `sensor_farm` (
  `senfarm_id` smallint(3) NOT NULL,
  `farm_id` smallint(3) NOT NULL,
  `sensor_id` smallint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sensor_farm`
--

INSERT INTO `sensor_farm` (`senfarm_id`, `farm_id`, `sensor_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 1),
(6, 2, 2),
(7, 1, 7),
(8, 1, 8),
(9, 1, 9),
(10, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `unittype`
--

CREATE TABLE `unittype` (
  `unit_id` smallint(3) NOT NULL,
  `unit_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unittype`
--

INSERT INTO `unittype` (`unit_id`, `unit_name`) VALUES
(1, 'องศาเซลเซียส'),
(2, 'ความชื้นสัมพัทธ์'),
(3, 'กิโลเมตร/ชม.'),
(4, 'UV'),
(5, 'ลูกบาศ์กเซนติเมตร');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` smallint(3) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `farm_info` varchar(1000) NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `regdate`, `farm_info`, `role`) VALUES
(1, 'username1', '123456', '2019-01-29 15:32:57', 'test', 0),
(2, 'administrator', '123123', '2019-01-29 15:33:21', 'test2', 1),
(3, 'farm01', '11911', '2019-01-29 15:15:47', 'farm01', 0),
(4, 'farmtest', '1191', '2019-01-29 09:22:13', 'farmtest', 0),
(5, 'somchai', '123789', '2019-01-29 15:43:20', 'สมชัยนะ', 0),
(6, 'somying', '123654', '2019-01-29 15:48:43', '123123123123123123123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`category_listID`);

--
-- Indexes for table `category_name`
--
ALTER TABLE `category_name`
  ADD PRIMARY KEY (`category_nameID`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farm_id`);

--
-- Indexes for table `farm_user_acc`
--
ALTER TABLE `farm_user_acc`
  ADD PRIMARY KEY (`farm_uid`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `farm_id` (`farm_id`);

--
-- Indexes for table `groupsensor`
--
ALTER TABLE `groupsensor`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`sensor_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `sensorgroup`
--
ALTER TABLE `sensorgroup`
  ADD PRIMARY KEY (`sensorgroup_id`),
  ADD KEY `sensor_id` (`sensor_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `sensor_farm`
--
ALTER TABLE `sensor_farm`
  ADD PRIMARY KEY (`senfarm_id`),
  ADD KEY `farm_id` (`farm_id`),
  ADD KEY `sensor_id` (`sensor_id`);

--
-- Indexes for table `unittype`
--
ALTER TABLE `unittype`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `category_listID` smallint(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_name`
--
ALTER TABLE `category_name`
  MODIFY `category_nameID` smallint(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `farm`
--
ALTER TABLE `farm`
  MODIFY `farm_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `farm_user_acc`
--
ALTER TABLE `farm_user_acc`
  MODIFY `farm_uid` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `groupsensor`
--
ALTER TABLE `groupsensor`
  MODIFY `group_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `sensor_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sensorgroup`
--
ALTER TABLE `sensorgroup`
  MODIFY `sensorgroup_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sensor_farm`
--
ALTER TABLE `sensor_farm`
  MODIFY `senfarm_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `unittype`
--
ALTER TABLE `unittype`
  MODIFY `unit_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` smallint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_name`
--
ALTER TABLE `category_name`
  ADD CONSTRAINT `category_name_ibfk_1` FOREIGN KEY (`category_nameID`) REFERENCES `category_list` (`category_listID`);

--
-- Constraints for table `farm_user_acc`
--
ALTER TABLE `farm_user_acc`
  ADD CONSTRAINT `farm_user_acc_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `farm_user_acc_ibfk_3` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`);

--
-- Constraints for table `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unittype` (`unit_id`);

--
-- Constraints for table `sensorgroup`
--
ALTER TABLE `sensorgroup`
  ADD CONSTRAINT `sensorgroup_ibfk_1` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`),
  ADD CONSTRAINT `sensorgroup_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groupsensor` (`group_id`);

--
-- Constraints for table `sensor_farm`
--
ALTER TABLE `sensor_farm`
  ADD CONSTRAINT `sensor_farm_ibfk_3` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`),
  ADD CONSTRAINT `sensor_farm_ibfk_4` FOREIGN KEY (`sensor_id`) REFERENCES `sensor` (`sensor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
