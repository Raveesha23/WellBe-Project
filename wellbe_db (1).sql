-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 19, 2024 at 10:44 AM
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
-- Table structure for table `administrative_staff`
--

DROP TABLE IF EXISTS `administrative_staff`;
CREATE TABLE IF NOT EXISTS `administrative_staff` (
  `id` int NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_channel_details`
--

DROP TABLE IF EXISTS `appointment_channel_details`;
CREATE TABLE IF NOT EXISTS `appointment_channel_details` (
  `id` int NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `appointment_id` int NOT NULL,
  `appointment_number` int NOT NULL,
  `appointment_fees` varchar(100) NOT NULL,
  `doctor_notes` varchar(1000) NOT NULL,
  PRIMARY KEY (`appointment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `id` int NOT NULL,
  `nic` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int NOT NULL,
  `emergency_contact` int NOT NULL,
  `emergency_contact_relationship` varchar(50) NOT NULL,
  `medical_license_no` varchar(30) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `experience` int NOT NULL,
  `qualifications_cerifications` varchar(255) NOT NULL,
  `medical_school` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `nic`, `first_name`, `last_name`, `dob`, `age`, `gender`, `address`, `email`, `contact`, `emergency_contact`, `emergency_contact_relationship`, `medical_license_no`, `specialization`, `experience`, `qualifications_cerifications`, `medical_school`, `user_id`) VALUES
(1, '200260502668', 'Dr. Ajith', 'Nipun', '1990-11-19', 34, 'M', '123,Kinf,Kandy', 'Ajith@gmail.com', 778965412, 773698521, 'Wife', 'MD2210', 'Cardiology', 5, 'vbesy14dnehdb2bd3eb2', 'UOC', 1),
(2, '200260502669', 'Dr. Vijitha', 'Kamal', '1954-08-20', 70, 'M', '234, Kandy Road, Jaffna', 'Vijitha@gmail.com', 778965214, 778932146, 'Son', 'MD44903', 'Neurology', 20, 'vrdh2neq xhjqwbfd3ewqs', 'UOM', 2);

-- --------------------------------------------------------

--
-- Table structure for table `lab_technician`
--

DROP TABLE IF EXISTS `lab_technician`;
CREATE TABLE IF NOT EXISTS `lab_technician` (
  `id` int NOT NULL,
  `nic` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int NOT NULL,
  `medical_license_no` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `experience` int NOT NULL,
  `qualifications_certifications` varchar(255) DEFAULT NULL,
  `prev_employment_history` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lab_tech_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medication_requests`
--

DROP TABLE IF EXISTS `medication_requests`;
CREATE TABLE IF NOT EXISTS `medication_requests` (
  `id` varchar(100) NOT NULL,
  `doctor_id` varchar(100) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `remark` text,
  `state` varchar(100) NOT NULL DEFAULT 'pending',
  KEY `state` (`state`),
  KEY `id` (`id`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `medication_requests`
--

INSERT INTO `medication_requests` (`id`, `doctor_id`, `patient_id`, `date`, `time`, `remark`, `state`) VALUES
('112344123', 'D_123443', 'P_123443', '0000-00-00', '00:00:00', NULL, 'pending');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  KEY `deleted_sender` (`deleted_sender`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `sender`, `receiver`, `message`, `files`, `date`, `seen`, `received`, `deleted_sender`, `deleted_receiver`) VALUES
(1, '1', '3', 'hello', NULL, '2024-11-09 01:44:21', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
CREATE TABLE IF NOT EXISTS `patient` (
  `id` int NOT NULL,
  `nic` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int NOT NULL,
  `medical_history` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `emergency_contact_name` varchar(255) NOT NULL,
  `emergency_contact_no` int NOT NULL,
  `emergency_contact_relationship` varchar(50) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patient_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `nic` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `gender` char(1) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` int NOT NULL,
  `emergency_contact_no` int NOT NULL,
  `medical_license_no` varchar(30) NOT NULL,
  `experiience` int NOT NULL,
  `qualifications_certifications` varchar(255) NOT NULL,
  `prev_employment_histroy` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pharmacist_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

DROP TABLE IF EXISTS `receptionist`;
CREATE TABLE IF NOT EXISTS `receptionist` (
  `id` int NOT NULL,
  `nic` varchar(12) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `experience` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receptionist_profile_fk` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `doctor_id` int NOT NULL,
  `booked_slots` int NOT NULL,
  `available_slots` int NOT NULL,
  `status` varchar(20) NOT NULL,
  `appointment_fee` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_doc_fk` (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_cancellation`
--

DROP TABLE IF EXISTS `session_cancellation`;
CREATE TABLE IF NOT EXISTS `session_cancellation` (
  `id` int NOT NULL,
  `session_id` int NOT NULL,
  `cancellation_reason` int NOT NULL,
  `cacellation_date` date NOT NULL,
  `rescheduled_time_slot` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `session_fk` (`session_id`),
  KEY `rescheduled_slot_fk` (`rescheduled_time_slot`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `file` text,
  `state` varchar(50) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`),
  KEY `state` (`state`),
  KEY `test_request_id` (`test_request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_requests`
--

INSERT INTO `test_requests` (`id`, `doctor_id`, `patient_id`, `date`, `test_request_id`, `file`, `state`) VALUES
(1, 'D_234543', 'P_123533', '2024-11-09 01:33:59', 'lt_1234333', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `test_request_details`
--

DROP TABLE IF EXISTS `test_request_details`;
CREATE TABLE IF NOT EXISTS `test_request_details` (
  `test_request_id` varchar(100) NOT NULL,
  `test_name` varchar(200) NOT NULL,
  KEY `test_request_id` (`test_request_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `test_request_details`
--

INSERT INTO `test_request_details` (`test_request_id`, `test_name`) VALUES
('lt_1234333', 'Urine\r\n'),
('lt_1234333', 'Blood(Acute)\r\n'),
('lt_1234333', 'eye');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `slot_id` int NOT NULL,
  `date` date NOT NULL,
  `doctor_timeslot` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`slot_id`, `date`, `doctor_timeslot`) VALUES
(1, '2024-11-09', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"11:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(2, '2024-11-10', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(3, '2024-11-11', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(4, '2024-11-12', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(5, '2024-11-13', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(6, '2024-11-14', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}'),
(7, '2024-11-15', '{\r\n  \"200123145674\": [\r\n    {\"start\": \"08:00\", \"end\": \"10:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"15:00\"}\r\n  ],\r\n  \"200143701245\": [\r\n    {\"start\": \"09:00\", \"end\": \"12:00\"},\r\n    {\"start\": \"13:00\", \"end\": \"16:00\"}\r\n  ]\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

DROP TABLE IF EXISTS `user_profile`;
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `username`, `password`, `role`) VALUES
(1, '200260502668', 'Ajith123', 'Doctor'),
(2, '200260502669', 'Vijitha123', 'Doctor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrative_staff`
--
ALTER TABLE `administrative_staff`
  ADD CONSTRAINT `admin_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `lab_technician`
--
ALTER TABLE `lab_technician`
  ADD CONSTRAINT `lab_tech_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD CONSTRAINT `pharmacist_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD CONSTRAINT `receptionist_profile_fk` FOREIGN KEY (`user_id`) REFERENCES `user_profile` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
  ADD CONSTRAINT `session_doc_fk` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `session_cancellation`
--
ALTER TABLE `session_cancellation`
  ADD CONSTRAINT `rescheduled_slot_fk` FOREIGN KEY (`rescheduled_time_slot`) REFERENCES `time_slot` (`slot_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `session_fk` FOREIGN KEY (`session_id`) REFERENCES `session` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

