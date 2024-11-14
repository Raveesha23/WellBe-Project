-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2024 at 10:11 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellbe_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_channel_details`
--

DROP TABLE IF EXISTS `appointment_channel_details`;
CREATE TABLE IF NOT EXISTS `appointment_channel_details` (
  `doctor_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `appointment_number` int NOT NULL,
  `appointment_fees` varchar(100) NOT NULL,
  `doctor_notes` varchar(1000) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_patient_details`
--

DROP TABLE IF EXISTS `appointment_patient_details`;
CREATE TABLE IF NOT EXISTS `appointment_patient_details` (
  `patient_fname` varchar(1000) NOT NULL,
  `nationality` enum('Sri Lankan','Foreign') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `NIC` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `contact_no` int NOT NULL,
  `emergency_contact_no` int NOT NULL,
  `save_permission` enum('YES','NO') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment_patient_details`
--

INSERT INTO `appointment_patient_details` (`patient_fname`, `nationality`, `NIC`, `email`, `contact_no`, `emergency_contact_no`, `save_permission`) VALUES
('Mumu', 'Foreign', '200260502667', 'mumu@gmail.com', 771333370, 77423723, 'YES'),
('Bunny', 'Sri Lankan', '200145968732', 'bunny@gmail.com', 771458974, 776321485, 'YES'),
('maze', 'Foreign', '8965412368', 'mazi@gmail.com', 774526398, 223569874, 'YES'),
('koko', 'Foreign', '456987123556', 'koko@gmail.com', 96587412, 965478213, 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
CREATE TABLE IF NOT EXISTS `checkout` (
  `title` varchar(10) NOT NULL,
  `name_on_card` varchar(1000) NOT NULL,
  `card_number` int NOT NULL,
  `expiry_date` date NOT NULL,
  `cvv` int NOT NULL,
  `otp` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Appointment_fees` double NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `available_date` date NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `password`, `first_name`, `last_name`, `specialization`, `Appointment_fees`, `mobile`, `available_date`) VALUES
('200123145674', 'messi@10', 'Sandaru', 'Perera', 'neurology', 2000, '0701122334', '2024-11-09'),
('200143701245', 'kumar@123', 'Pradeep', 'Kumar', 'cardiology', 5000, '0775566112', '2024-11-30'),
('200260502667', 'kumkum', 'Weera', 'Soora', 'Eye Surgeon', 3500, '077733343', '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `lab_technician`
--

DROP TABLE IF EXISTS `lab_technician`;
CREATE TABLE IF NOT EXISTS `lab_technician` (
  `id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lab_technician`
--

INSERT INTO `lab_technician` (`id`, `password`, `first_name`, `last_name`, `mobile`) VALUES
('lt_412355', 'hishan982', 'Hishan', 'Mentise', 789455589);

-- --------------------------------------------------------

--
-- Table structure for table `medication_requests`
--

DROP TABLE IF EXISTS `medication_requests`;
CREATE TABLE IF NOT EXISTS `medication_requests` (
  `id` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL DEFAULT 'pending',
  KEY `state` (`state`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medication_requests`
--

INSERT INTO `medication_requests` (`id`, `doctor_id`, `patient_id`, `state`) VALUES
('112344123', 'D_123443', 'P_123443', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `medication_request_details`
--

DROP TABLE IF EXISTS `medication_request_details`;
CREATE TABLE IF NOT EXISTS `medication_request_details` (
  `id` varchar(100) NOT NULL,
  `medication_name` varchar(200) NOT NULL,
  `dosage` varchar(100) NOT NULL,
  `taken_time` text NOT NULL,
  `substitution` tinyint(1) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medication_request_details`
--

INSERT INTO `medication_request_details` (`id`, `medication_name`, `dosage`, `taken_time`, `substitution`) VALUES
('112344123', 'Amoxicillin', '2mg', '2 3 1 1', 0),
('112344123', 'Aspirin', '5mg', '1 2 1 1', 0),
('112344123', 'Sertraline', '2mg', '0 2 3 1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `user_role` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `receiver` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `files` text,
  `date` datetime NOT NULL,
  `seen` int NOT NULL DEFAULT '0',
  `received` int NOT NULL DEFAULT '0',
  `deleted_sender` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_receiver` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`),
  KEY `date` (`date`),
  KEY `seen` (`seen`),
  KEY `deleted_receiver` (`deleted_receiver`),
  KEY `deleted_sender` (`deleted_sender`),
  KEY `user_role` (`user_role`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_role`, `sender`, `receiver`, `message`, `files`, `date`, `seen`, `received`, `deleted_sender`, `deleted_receiver`) VALUES
(1, 'Pharmacist', '1', '3', 'hello', NULL, '2024-11-09 01:44:21', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `patient_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `password`, `first_name`, `last_name`, `mobile`) VALUES
('123456789V', 'Nimali@555', 'Nimali', 'Silva', '0705556669'),
('132723444V', '19921011', 'Kasun', 'Udawela', '0725826497');

-- --------------------------------------------------------

--
-- Table structure for table `patient_search_for_doc`
--

DROP TABLE IF EXISTS `patient_search_for_doc`;
CREATE TABLE IF NOT EXISTS `patient_search_for_doc` (
  `doctor_id` int NOT NULL,
  `doctor_fname` varchar(300) NOT NULL,
  `specialization` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Appointment_no` int NOT NULL AUTO_INCREMENT,
  `date_time` date NOT NULL,
  UNIQUE KEY `Appointment_no` (`Appointment_no`),
  KEY `fk_doctor_id` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `patient_search_for_doc`
--

INSERT INTO `patient_search_for_doc` (`doctor_id`, `doctor_fname`, `specialization`, `Appointment_no`, `date_time`) VALUES
(0, 'Sandaru', 'neurology', 1, '2024-12-03'),
(0, 'Pradeep', 'cardiology', 2, '2024-10-09'),
(0, 'Weera', 'Eye Surgeon', 3, '2024-11-09'),
(0, 'Pradeep', 'Eye Surgeon', 4, '2024-11-30'),
(0, 'Weera', 'cardiology', 5, '2024-11-17'),
(0, 'Weera', 'neurology', 6, '2024-11-29'),
(0, 'Weera', 'cardiology', 7, '2024-11-22'),
(0, 'Weera', 'Eye Surgeon', 8, '2024-11-02');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

DROP TABLE IF EXISTS `pharmacist`;
CREATE TABLE IF NOT EXISTS `pharmacist` (
  `id` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `password`, `first_name`, `last_name`, `mobile`) VALUES
('', 'jan4325', 'Vimal', 'Vikiran', 785465465);

-- --------------------------------------------------------

--
-- Table structure for table `test_requests`
--

DROP TABLE IF EXISTS `test_requests`;
CREATE TABLE IF NOT EXISTS `test_requests` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `test_request_id` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `test_request_id` (`test_request_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_requests`
--

INSERT INTO `test_requests` (`id`, `doctor_id`, `patient_id`, `date`, `test_request_id`, `state`) VALUES
(1, 'D_234543', 'P_123533', '2024-11-09 01:33:59', 'lt_1234333', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `test_request_details`
--

DROP TABLE IF EXISTS `test_request_details`;
CREATE TABLE IF NOT EXISTS `test_request_details` (
  `test_request_id` varchar(100) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  KEY `test_request_id` (`test_request_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_request_details`
--

INSERT INTO `test_request_details` (`test_request_id`, `test_name`) VALUES
('lt_1234333', 'Urine\r\n'),
('lt_1234333', 'Blood(Acute)\r\n'),
('lt_1234333', 'eye');

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

DROP TABLE IF EXISTS `timeslot`;
CREATE TABLE IF NOT EXISTS `timeslot` (
  `slot_id` int NOT NULL,
  `date` date NOT NULL,
  `doctor_timeslot` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`slot_id`)
) ;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`slot_id`, `date`, `doctor_timeslot`) VALUES
(1, '2024-11-09', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"11:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(2, '2024-11-10', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(3, '2024-11-11', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(4, '2024-11-12', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(5, '2024-11-13', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(6, '2024-11-14', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(7, '2024-11-15', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
