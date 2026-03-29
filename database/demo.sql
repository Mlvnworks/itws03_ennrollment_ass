-- Enrollment System Database Schema
-- Import this file into MySQL/MariaDB

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(120) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `uq_users_username` (`username`),
  UNIQUE KEY `uq_users_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL AUTO_INCREMENT,
  `roleName` varchar(80) NOT NULL,
  `roleDesc` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`roleID`),
  UNIQUE KEY `uq_role_roleName` (`roleName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `courseCode` varchar(50) NOT NULL,
  `courseName` varchar(120) NOT NULL,
  `courseDesc` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`courseID`),
  UNIQUE KEY `uq_course_courseCode` (`courseCode`),
  UNIQUE KEY `uq_course_courseName` (`courseName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `campus` (
  `campusID` int(11) NOT NULL AUTO_INCREMENT,
  `campusName` varchar(120) NOT NULL,
  `campusAddress` varchar(200) NOT NULL,
  `campusHead` varchar(120) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`campusID`),
  UNIQUE KEY `uq_campus_campusName` (`campusName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL AUTO_INCREMENT,
  `studentNo` varchar(50) NOT NULL,
  `fullName` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `yearLevel` varchar(30) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`studentID`),
  UNIQUE KEY `uq_students_studentNo` (`studentNo`),
  UNIQUE KEY `uq_students_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `enrollment` (
  `enrollmentID` int(11) NOT NULL AUTO_INCREMENT,
  `enrollmentNo` varchar(50) NOT NULL,
  `studentName` varchar(120) NOT NULL,
  `courseName` varchar(120) NOT NULL,
  `campusName` varchar(120) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`enrollmentID`),
  UNIQUE KEY `uq_enrollment_enrollmentNo` (`enrollmentNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `settings` (
  `settingsID` int(11) NOT NULL AUTO_INCREMENT,
  `schoolName` varchar(150) NOT NULL,
  `schoolEmail` varchar(120) NOT NULL,
  `schoolPhone` varchar(30) NOT NULL,
  `schoolAddress` varchar(255) NOT NULL,
  `dateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `dateUpdated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `dateDeleted` date DEFAULT NULL,
  PRIMARY KEY (`settingsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`userID`, `fullName`, `username`, `email`, `password`) VALUES
(1, 'System Admin', 'admin', 'admin@schoolportal.com', '$2y$12$wDBls6U2zkpglGkxYRoyHOIO3deiix.DZjq/qIY.bmu5QmtpnDBtq'),
(2, 'Registrar Clerk', 'registrar', 'registrar@schoolportal.com', '$2y$12$wDBls6U2zkpglGkxYRoyHOIO3deiix.DZjq/qIY.bmu5QmtpnDBtq');

INSERT INTO `role` (`roleID`, `roleName`, `roleDesc`) VALUES
(1, 'Administrator', 'Manages the entire system'),
(2, 'Registrar', 'Handles student records and enrollment');

INSERT INTO `course` (`courseID`, `courseCode`, `courseName`, `courseDesc`) VALUES
(1, 'BSIT', 'Bachelor of Science in Information Technology', 'Four-year IT degree program'),
(2, 'BSCS', 'Bachelor of Science in Computer Science', 'Four-year CS degree program');

INSERT INTO `campus` (`campusID`, `campusName`, `campusAddress`, `campusHead`) VALUES
(1, 'Main Campus', '123 Main St, Manila', 'Dr. Maria Santos'),
(2, 'North Campus', '45 North Ave, Quezon City', 'Dr. Ramon Cruz');

INSERT INTO `students` (`studentID`, `studentNo`, `fullName`, `email`, `yearLevel`) VALUES
(1, '2026-0001', 'John Dela Cruz', 'john.delacruz@studentmail.com', '1st Year'),
(2, '2026-0002', 'Anna Reyes', 'anna.reyes@studentmail.com', '2nd Year');

INSERT INTO `enrollment` (`enrollmentID`, `enrollmentNo`, `studentName`, `courseName`, `campusName`, `status`) VALUES
(1, 'ENR-2026-0001', 'John Dela Cruz', 'Bachelor of Science in Information Technology', 'Main Campus', 'Pending'),
(2, 'ENR-2026-0002', 'Anna Reyes', 'Bachelor of Science in Computer Science', 'North Campus', 'Enrolled');

INSERT INTO `settings` (`settingsID`, `schoolName`, `schoolEmail`, `schoolPhone`, `schoolAddress`) VALUES
(1, 'International School Demo', 'info@schoolportal.com', '+63 2 8123 4567', '100 Education Ave, Manila, Philippines');

COMMIT;
