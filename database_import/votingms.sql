-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 08:09 PM
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
-- Database: `votingms`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cand_id` int(11) NOT NULL,
  `elec_id` int(11) NOT NULL,
  `cand_name` varchar(220) NOT NULL,
  `cand_add` varchar(400) DEFAULT NULL,
  `symbol` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cand_id`, `elec_id`, `cand_name`, `cand_add`, `symbol`) VALUES
(2, 2, 'Shayam', '14, Mohini Apartments\r\nKarol Bagh\r\nDelhi.', '../assets/images/cand_photos408724Acer_Wallpaper_02_5000x2813.jpg'),
(4, 2, 'Mohan', 'Lalkuan, Nainital\r\nUttarakhand', '../assets/images/cand_photos448051Acer_Wallpaper_01_5000x2814.jpg'),
(5, 6, 'Mohanjodaro', 'Indus valley', '../assets/images/cand_photos770308Planet9_Wallpaper_5000x2813.jpg'),
(6, 6, 'Akbar', 'I/55\r\nLodhi colony\r\nDelhi', '../assets/images/cand_photos166407Acer_Wallpaper_03_5000x2814.jpg'),
(7, 6, 'Ramu', 'FH-99, \r\nChamparan\r\nBihar', '../assets/images/cand_photos544771Acer_Wallpaper_02_5000x2813.jpg'),
(9, 7, 'Yeta Keets', '11 Maxwell Apartments\r\nPanji, Goa', '../assets/images/cand_photos593675Planet9_Wallpaper_5000x2813.jpg'),
(10, 7, 'Salunkhe', 'G-787, Ring Road\r\nPonda', '../assets/images/cand_photos590150Acer_Wallpaper_01_5000x2814.jpg'),
(11, 7, 'Daya Patel', 'House no. 55\r\nNear jetty,\r\nMargao', '../assets/images/cand_photos465890Acer_Wallpaper_02_5000x2813.jpg'),
(12, 6, 'Abdul Samad', '45, Raju City, Near Rajiv Chowk, Delhi', '../assets/images/cand_photos131663Indian_Election_Symbol_Telephone.png'),
(13, 6, 'Daijobu Singh', 'I/44 Rajiv Gandhi Nagar, Indore', '../assets/images/cand_photos523868download.png'),
(14, 8, 'Teena', '88 karol Bagh', '../assets/images/cand_photos210686download.png');

-- --------------------------------------------------------

--
-- Table structure for table `elections`
--

CREATE TABLE `elections` (
  `elec_id` int(15) NOT NULL,
  `elec_name` varchar(220) NOT NULL,
  `no_cand` int(30) NOT NULL,
  `sd` date NOT NULL,
  `ed` date NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `elections`
--

INSERT INTO `elections` (`elec_id`, `elec_name`, `no_cand`, `sd`, `ed`, `status`) VALUES
(2, 'LOK sabha', 2, '2023-03-27', '2023-04-07', 'Expired'),
(6, 'Rajya sabha', 6, '2023-04-05', '2023-04-26', 'Active Now'),
(7, 'Goa Election', 3, '2023-04-10', '2023-05-22', 'Active Now'),
(8, 'Kerala Election', 10, '2023-04-12', '2023-05-18', 'Upcoming'),
(9, 'Nagal Mundi Relection', 6, '2023-04-29', '2023-05-11', 'Upcoming'),
(11, 'Karnataka Election', 9, '2023-04-21', '2023-05-17', 'Upcoming'),
(12, 'Bihar Election', 2, '2023-04-17', '2023-04-30', 'Upcoming'),
(13, 'Parsakhera Re-election', 5, '2023-04-22', '2023-04-23', 'Upcoming'),
(14, 'Maharashtra election', 14, '2023-04-12', '2023-04-30', 'Upcoming'),
(15, 'UP Election', 10, '2023-04-25', '2023-05-25', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `username` varchar(225) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`username`, `password`, `email`, `address`) VALUES
('Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 'admin@gmail.com', 'Shankar Bhawan\r\nBITS Pilani\r\nRajasthan'),
('amit', '0754b34cf57bc01d13ec9e604ca974ef9e698a6f', 'amit709@gmail.com', 'k-99,\r\nMalabar Hill,\r\nMumbai.'),
('Ankita', '05b32add97ab627cdd839e3dd07a11d7cb15baa7', 'Ankitaroy@gmail.com', 'Fh-11, MohanBagh, Gangtok,Sikkim.'),
('david', '32339611df027ade1e4c7ce52fc19d50c05be10e', 'davidDC@gmail.com', 'U-55, Prakash Gang, Vishakhapatnam'),
('Laalsingh', 'f0e5c532e2a5ab226c45e18cdf355c81ba5bd4df', 'laalsingh@gmail.com', '90 Gautami Heights, Rohtak, Haryana'),
('Mukesh', '256d23ebdfeb388c10a3019a2c223ca5c90edfcc', 'mukesh@gmail.com', '88 Karol Bagh Delhi'),
('rahul', '06d0880acf1cbfb87e70a0fcada38f5d49449b87', 'rahul_cs@gmail.com', '45 Mohini Apartments\r\nKarol Bagh \r\nDelhi'),
('rinku', '502b7dfff6fb4dc619b4933e1cb122df34605430', 'rinkusama@gmail.com', '5,B3-87\r\nSpolion city\r\nKolkata'),
('sam', 'f16bed56189e249fe4ca8ed10a1ecae60e8ceac0', 'dsfjsdfkljsdflkjsdkaj', 'adadddfjsfkjsdfjasoasjosdjfkosaj'),
('sarabjit', '3608a6d1a05aba23ea390e5f3b48203dbb7241f7', 'sarabjit8@gmail.com', 'LI-87\r\nRajiv Gandhi Nagar\r\nAmritsar'),
('Simmi', 'e4c5b6f760e81738b6b06237b97275a6a0f07753', 'simmiraj@gmail.com', 'YU-88, Near Bhagat Chowk, Ludhiana');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(20) NOT NULL,
  `cand_id` int(20) NOT NULL,
  `username` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `cand_id`, `username`) VALUES
(3, 2, 'rahul'),
(4, 2, 'sarabjit'),
(6, 2, 'amit'),
(9, 5, 'rahul'),
(11, 7, 'sarabjit'),
(12, 7, 'amit'),
(13, 2, 'sam'),
(15, 7, 'rinku'),
(16, 7, 'sam'),
(17, 9, 'rahul'),
(19, 11, 'sam'),
(20, 7, 'Mukesh'),
(21, 9, 'Mukesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cand_id`),
  ADD KEY `elec_id` (`elec_id`);

--
-- Indexes for table `elections`
--
ALTER TABLE `elections`
  ADD PRIMARY KEY (`elec_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `username` (`username`),
  ADD KEY `cand_id` (`cand_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `elections`
--
ALTER TABLE `elections`
  MODIFY `elec_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`elec_id`) REFERENCES `elections` (`elec_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`username`) REFERENCES `voters` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`cand_id`) REFERENCES `candidates` (`cand_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
