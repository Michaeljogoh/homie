-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 09:07 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rep_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `d_id` int(10) UNSIGNED NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_weight` varchar(100) NOT NULL,
  `p_height` varchar(100) NOT NULL,
  `p_bp` varchar(100) NOT NULL,
  `p_temp` varchar(100) NOT NULL,
  `treatment` varchar(100) NOT NULL,
  `drugs` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`d_id`, `p_id`, `p_name`, `p_weight`, `p_height`, `p_bp`, `p_temp`, `treatment`, `drugs`, `date`, `doctor_id`) VALUES
(1, 1, '1', 'w', 'y', 'r', 'e', 'qq', 'qq', '2021-03-24', 1),
(2, 1, '1', 'w', 'y', 'r', 'e', 'qq', 'qq', '2021-03-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `doctor_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `hospital_name` varchar(11) NOT NULL,
  `license_id` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `secure_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `age`, `email`, `state`, `address`, `phone_no`, `hospital_name`, `license_id`, `file`, `password`, `secure_password`) VALUES
(1, 'EBUBE', 20, 'ebubecharles1@gmail.com', 'Anambra', 'no 3 valley view close', '07013567146', 'The Code Cl', '04/03/2001', 'me1.jpeg', '6april1969', 'ad97abe895c3025a99068693e8de0381'),
(2, 'EMMANUEL EFFIONG', 28, 'emma@gmail.com', 'Akwa Ibom', ' Abuja, Kado water park', '07013567146', 'Afri Global', '06/09/2002', 'tg.jfif', 'emma', '00a809937eddc44521da9521269e75c6'),
(3, 'PAUL', 35, 'paul@outlook.com', 'Enugu', 'igwe orizu road', '09064110947', 'Odogwu Clin', '09/02/1986', 'pp.jpg', 'paul', '6c63212ab48e8401eaf6b59b95d816a9'),
(4, 'EREN', 22, 'marcus@gmail.com', 'Anambra', 'mark crescent no3 ', '08130054682', 'PARADIS HOS', '04/02/2000', 'Screenshot (250).png', 'eren', 'a209541310cac0ba0f9d419d51061198'),
(5, 'AYUBA EMMANUEL', 22, 'emmanuel@outlook.com', 'Borno', 'Kado water park no 35', '08083459938', 'Ayuba Healt', '1000-01-201', 'IMG-20210314-WA0047.jpg', 'ayuba', '874f883cb7b2cadede6b0b72b8387fe6');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` varchar(3) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `doctor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `name`, `age`, `weight`, `gender`, `blood_group`, `state`, `address`, `phone_no`, `doctor_id`) VALUES
(1, 'JOHN', '18', '70KG', 'M', 'A', 'Anambra', 'egbeda lagos', '07013456783', 1),
(2, 'SANDRA', '20', '70KG', 'F', 'A', 'Anambra', 'Abuja, Kubwa', '07013456734', 1),
(3, 'TOBI', '16', '60KG', 'M', 'A', 'Edo', 'ogun state', '08045671231', 2),
(4, 'Esther', '20', '80kg', 'F', 'AB', 'Lagos', 'lugbe, pyiakassa', '09064110970', 2),
(5, 'CHIMDI', '21', '90KG', 'F', 'A', 'Abia', 'gwarimpa abuja 35', '08085270039', 2),
(6, 'SANDRA UCHE DIBOR', '23', '77.1KG', 'F', 'A', 'Anambra', 'NO 3 VALLEY VIEW', '08170147370', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `d_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
