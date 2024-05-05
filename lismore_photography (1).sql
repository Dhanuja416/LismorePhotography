-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 03:00 PM
-- Server version: 8.0.36
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lismore_photography`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_photos`
--

CREATE TABLE `gallery_photos` (
  `photo_id` int NOT NULL,
  `photo_url` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gallery_photos`
--

INSERT INTO `gallery_photos` (`photo_id`, `photo_url`) VALUES
(1, 'aboutus.jpg'),
(2, 'ContactUS.jpg'),
(3, 'SC_Emma+&+Adams+Wedding_603.jpeg'),
(4, 'Approach-to-Wedding-Photography.jpg'),
(5, 'Yorkshire-wedding-photographer-wedding-photography-in-west-yorkshire-33.webp'),
(6, 'simone-addison-photography-perth-city-wedding-photographer-66-2.jpg'),
(7, '1710228903_1S1A5005c.webp'),
(8, 'gujarati-wedding-photography-ahmedabad-best-mandap-photos-best-gujju-wedding-photographer-76.webp'),
(9, '1898ec4851adc56734da1668d47a8f22.jpg'),
(10, 'Candid-vs.-Traditional-Wedding-Photography-Find-Your-Perfect-Style-Yabesh-Photography-1200x675.jpg'),
(25, 'slack-logo-isolated-transparent-background-284287548.webp'),
(26, '1638079565-Untitleddesign-2021-11-28T100532825.webp');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `i_id` int NOT NULL,
  `i_desc` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `i_date` date DEFAULT NULL,
  `c_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `c_tpno` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `event_venue` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `i_status` enum('Pending','Completed','Canceled') DEFAULT NULL,
  `e_type` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`i_id`, `i_desc`, `i_date`, `c_name`, `c_tpno`, `event_date`, `event_venue`, `i_status`, `e_type`) VALUES
(3, 'Wedding', '2024-01-24', 'Sithum Pramod', '0769496494', '2024-01-29', 'Kegalle', 'Pending', 'wedding'),
(5, 'Simple Wedding', '2024-01-24', 'Piyal Fernando', '0754689654', '2024-01-31', 'Colombo', 'Pending', 'wedding'),
(6, 'Its a birthday party of a child.', '2024-01-24', 'Prashan Kumara', '0712356894', '2024-03-25', 'Kelaniya', 'Pending', 'bday');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `user_role` enum('Admin','Customer') DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `UserID` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_role`, `name`, `UserID`) VALUES
('Dhanuja@gmail.com', 'Dhanuja@1234', 'Admin', 'Dhanuja', NULL),
('divan@gmail.com', '123456789', 'Customer', 'Divan', 3),
('Shehara@gmail.com', 'abc@123', 'Admin', 'Shehara', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `UserId` int NOT NULL,
  `UFname` varchar(100) DEFAULT NULL,
  `ULname` varchar(100) DEFAULT NULL,
  `UType` enum('Customer','Admin') DEFAULT NULL,
  `UTPNo` varchar(10) DEFAULT NULL,
  `UEmail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`UserId`, `UFname`, `ULname`, `UType`, `UTPNo`, `UEmail`) VALUES
(1, 'Saman', 'Kumara', 'Customer', '012536898', 'saman@gmail.com'),
(2, 'Amal', 'Perera', 'Customer', '456789654', 'a@gmail.com'),
(3, 'Divan', 'Sathsara', 'Customer', '0789865984', 'divan@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  ADD PRIMARY KEY (`photo_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery_photos`
--
ALTER TABLE `gallery_photos`
  MODIFY `photo_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `i_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `usertable` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
