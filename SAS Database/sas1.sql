-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 08:41 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sas1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `A_Id` int(11) NOT NULL,
  `A_Name` varchar(25) NOT NULL,
  `A_Dob` date NOT NULL,
  `A_Email` varchar(25) NOT NULL,
  `A_MobileNo` varchar(10) NOT NULL,
  `A_Username` varchar(10) NOT NULL,
  `A_Password` varchar(6) NOT NULL,
  `Security_Question` varchar(75) NOT NULL,
  `Security_Answer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`A_Id`, `A_Name`, `A_Dob`, `A_Email`, `A_MobileNo`, `A_Username`, `A_Password`, `Security_Question`, `Security_Answer`) VALUES
(1, 'Panchal Kirtan', '1971-11-08', 'admin@gmail.com', '9879538164', 'Admin', '8649', 'What is your favourite Book?', 'Harry Potter');

-- --------------------------------------------------------

--
-- Table structure for table `announcement_info`
--

CREATE TABLE `announcement_info` (
  `A_Id` int(11) NOT NULL,
  `Announcer_Name` varchar(10) NOT NULL,
  `A_Message` varchar(150) NOT NULL,
  `Announcement_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement_info`
--

INSERT INTO `announcement_info` (`A_Id`, `Announcer_Name`, `A_Message`, `Announcement_date`) VALUES
(1, 'Admin', 'Test 1', '2022-03-06'),
(2, 'Pri.Daksha', 'Test 2', '2022-03-06'),
(3, 'Pri.Daksha', 'In the account of Holi Students will have Holiday on 18 - March and 19 - March', '2022-03-06'),
(4, 'Pri.Daksha', 'Test4', '2022-03-06'),
(5, 'Pri.Daksha', 'Test 5', '2022-03-06'),
(6, 'Admin', 'Test 6', '2022-03-09'),
(7, 'Pri.Daksha', 'Test 7', '2022-03-26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_info`
--

CREATE TABLE `attendance_info` (
  `A_Id` int(11) NOT NULL,
  `S_Id` int(11) NOT NULL,
  `Attendance_date` date NOT NULL DEFAULT current_timestamp(),
  `Attendance_status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance_info`
--

INSERT INTO `attendance_info` (`A_Id`, `S_Id`, `Attendance_date`, `Attendance_status`) VALUES
(208, 1, '2022-05-01', 'Present'),
(209, 2, '2022-05-01', 'Present'),
(210, 3, '2022-05-01', 'Present'),
(211, 4, '2022-05-01', 'Absent'),
(212, 5, '2022-05-01', 'Present'),
(213, 6, '2022-05-01', 'Present'),
(214, 7, '2022-05-01', 'Absent'),
(215, 8, '2022-05-01', 'Present'),
(216, 9, '2022-05-01', 'Absent'),
(217, 11, '2022-05-01', 'Absent'),
(218, 12, '2022-05-01', 'Present'),
(219, 13, '2022-05-01', 'Present'),
(220, 14, '2022-05-01', 'Absent'),
(221, 15, '2022-05-01', 'Present'),
(222, 16, '2022-05-01', 'Present'),
(233, 12, '0000-00-00', 'Present'),
(234, 13, '0000-00-00', 'Present'),
(235, 14, '0000-00-00', 'Present'),
(236, 15, '0000-00-00', 'Absent'),
(237, 16, '0000-00-00', 'Present'),
(238, 1, '2022-05-02', 'Present'),
(239, 2, '2022-05-02', 'Present'),
(240, 3, '2022-05-02', 'Absent'),
(241, 4, '2022-05-02', 'Present'),
(242, 5, '2022-05-02', 'Absent'),
(243, 6, '2022-05-02', 'Present'),
(244, 7, '2022-05-02', 'Present'),
(245, 8, '2022-05-02', 'Present'),
(246, 9, '2022-05-02', 'Absent'),
(247, 11, '2022-05-02', 'Present'),
(248, 12, '2022-05-02', 'Present'),
(249, 13, '2022-05-02', 'Present'),
(250, 14, '2022-05-02', 'Present'),
(251, 15, '2022-05-02', 'Absent'),
(252, 16, '2022-05-02', 'Present'),
(253, 1, '2022-11-07', 'Present'),
(254, 2, '2022-11-07', 'Present'),
(255, 3, '2022-11-07', 'Absent'),
(256, 4, '2022-11-07', 'Present'),
(257, 5, '2022-11-07', 'Absent'),
(258, 6, '2022-11-07', 'Present'),
(259, 7, '2022-11-07', 'Present'),
(260, 8, '2022-11-07', 'Absent'),
(261, 9, '2022-11-07', 'Present'),
(262, 11, '2022-11-07', 'Present'),
(263, 12, '2022-11-07', 'Absent'),
(264, 13, '2022-11-07', 'Absent'),
(265, 14, '2022-11-07', 'Present'),
(266, 15, '2022-11-07', 'Absent'),
(267, 16, '2022-11-07', 'Present'),
(268, 17, '2022-11-07', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `complain_info`
--

CREATE TABLE `complain_info` (
  `C_Id` int(11) NOT NULL,
  `S_Id` int(11) NOT NULL,
  `C_About` varchar(25) NOT NULL,
  `C_Message` varchar(150) NOT NULL,
  `C_Reply` varchar(100) NOT NULL,
  `E_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain_info`
--

INSERT INTO `complain_info` (`C_Id`, `S_Id`, `C_About`, `C_Message`, `C_Reply`, `E_Date`) VALUES
(1, 1, 'Misbehave', 'Jay is not behaving Properly with me from last few days', 'Ok we will do something about that', '2022-03-06'),
(2, 2, 'Misbehave', 'Jay is not behaving Properly with me from last few days', 'Pending', '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `division_info`
--

CREATE TABLE `division_info` (
  `D_Id` int(11) NOT NULL,
  `D_Name` varchar(1) NOT NULL,
  `Stan_Name` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `division_info`
--

INSERT INTO `division_info` (`D_Id`, `D_Name`, `Stan_Name`) VALUES
(1, 'A', '12'),
(2, 'B', '12'),
(4, 'C', '12'),
(5, 'A', '9'),
(6, 'B', '9'),
(7, 'C', '9'),
(8, 'A', '10'),
(9, 'B', '10'),
(10, 'C', '10'),
(11, 'A', '11'),
(12, 'B', '11'),
(13, 'C', '11'),
(14, 'D', '12');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_info`
--

CREATE TABLE `faculty_info` (
  `F_Id` int(11) NOT NULL,
  `F_Name` varchar(25) NOT NULL,
  `F_Gender` varchar(6) NOT NULL,
  `F_Dob` date NOT NULL,
  `F_Email` varchar(25) NOT NULL,
  `F_MobileNo` varchar(10) NOT NULL,
  `F_Address` varchar(100) NOT NULL,
  `F_Username` varchar(10) NOT NULL,
  `F_Password` varchar(6) NOT NULL,
  `Security_Question` varchar(75) NOT NULL,
  `Security_Answer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_info`
--

INSERT INTO `faculty_info` (`F_Id`, `F_Name`, `F_Gender`, `F_Dob`, `F_Email`, `F_MobileNo`, `F_Address`, `F_Username`, `F_Password`, `Security_Question`, `Security_Answer`) VALUES
(1, 'Heta Dasondi', 'Female', '1994-08-29', 'hetadasondi@gmail.com', '9879879875', 'Ahmedabad,Gujarat', 'Prof.Heta', '756', 'What city were you born in?', 'Ahmedabad'),
(2, 'Neha Vaswani', 'Female', '1994-12-12', 'nehavaswani@gmail.com', '6545987536', 'Ahmedabad, Gujarat', 'Prof. Neha', '123', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_leave_info`
--

CREATE TABLE `faculty_leave_info` (
  `L_Id` int(11) NOT NULL,
  `F_Id` int(11) NOT NULL,
  `Leave_Reason` varchar(150) NOT NULL,
  `NoDays` int(2) NOT NULL,
  `Leave_Status` varchar(8) NOT NULL,
  `E_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_leave_info`
--

INSERT INTO `faculty_leave_info` (`L_Id`, `F_Id`, `Leave_Reason`, `NoDays`, `Leave_Status`, `E_Date`) VALUES
(1, 1, 'Due to Cold and fewer I want be able to come school for few more days', 3, 'Accept', '2022-03-06'),
(2, 1, 'Due to Cold and fewer I want be able to come school for few more days', 3, 'Pending', '2022-03-06');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_answer`
--

CREATE TABLE `feedback_answer` (
  `FB_Id` int(11) NOT NULL,
  `FB_Question` varchar(70) NOT NULL,
  `FB_Answer` varchar(20) NOT NULL,
  `F_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_answer`
--

INSERT INTO `feedback_answer` (`FB_Id`, `FB_Question`, `FB_Answer`, `F_Id`) VALUES
(199, 'Interaction in a class', 'Outstanding', 1),
(200, 'Regularity and Punctuality', 'Excellent', 1),
(201, 'Willingness to solve doubts', 'Good', 1),
(202, 'Interaction in a class', 'Excellent', 1),
(203, 'Regularity and Punctuality', 'Good', 1),
(204, 'Willingness to solve doubts', 'Outstanding', 1),
(205, 'Interaction in a class', 'Outstanding', 1),
(206, 'Regularity and Punctuality', 'Good', 1),
(207, 'Willingness to solve doubts', 'Staisfactory', 1),
(208, 'Interaction in a class', 'Outstanding', 2),
(209, 'Regularity and Punctuality', 'Outstanding', 2),
(210, 'Willingness to solve doubts', 'Excellent', 2);

-- --------------------------------------------------------

--
-- Table structure for table `feedback_question`
--

CREATE TABLE `feedback_question` (
  `FB_Id` int(11) NOT NULL,
  `FB_Question` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback_question`
--

INSERT INTO `feedback_question` (`FB_Id`, `FB_Question`) VALUES
(3, 'Interaction in a class'),
(4, 'Regularity and Punctuality'),
(5, 'Willingness to solve doubts');

-- --------------------------------------------------------

--
-- Table structure for table `principal_info`
--

CREATE TABLE `principal_info` (
  `P_Id` int(11) NOT NULL,
  `P_Name` varchar(25) NOT NULL,
  `P_Gender` varchar(6) NOT NULL,
  `P_Dob` date NOT NULL,
  `P_Email` varchar(25) NOT NULL,
  `P_MobileNo` varchar(10) NOT NULL,
  `P_Address` varchar(100) NOT NULL,
  `P_Username` varchar(10) NOT NULL,
  `P_Password` varchar(6) NOT NULL,
  `Security_Question` varchar(75) NOT NULL,
  `Security_Answer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `principal_info`
--

INSERT INTO `principal_info` (`P_Id`, `P_Name`, `P_Gender`, `P_Dob`, `P_Email`, `P_MobileNo`, `P_Address`, `P_Username`, `P_Password`, `Security_Question`, `Security_Answer`) VALUES
(1, 'Daksha Trivedi', 'Female', '1969-07-23', 'DakshaTrivedi@gmail.com', '9512295122', 'Ahmedabad,Gujarat', 'Pri.Daksha', '7731', 'What is the name of your First School?', 'CK');

-- --------------------------------------------------------

--
-- Table structure for table `standard_info`
--

CREATE TABLE `standard_info` (
  `S_Id` int(11) NOT NULL,
  `Stan_Name` varchar(15) NOT NULL,
  `E_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `standard_info`
--

INSERT INTO `standard_info` (`S_Id`, `Stan_Name`, `E_date`) VALUES
(1, '9', '2022-03-06'),
(2, '10', '2022-03-06'),
(3, '11', '2022-03-06'),
(4, '12', '2022-03-10');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `S_Id` int(11) NOT NULL,
  `S_Name` varchar(30) NOT NULL,
  `S_RollNo` int(3) NOT NULL,
  `S_Standard` int(2) NOT NULL,
  `S_Division` varchar(1) NOT NULL,
  `S_Dob` date NOT NULL,
  `S_Gender` varchar(6) NOT NULL,
  `S_Email` varchar(25) NOT NULL,
  `S_MobileNo` varchar(10) NOT NULL,
  `S_Address` varchar(100) NOT NULL,
  `S_Username` varchar(10) NOT NULL,
  `S_Password` varchar(6) NOT NULL,
  `Security_Question` varchar(75) NOT NULL,
  `Security_Answer` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`S_Id`, `S_Name`, `S_RollNo`, `S_Standard`, `S_Division`, `S_Dob`, `S_Gender`, `S_Email`, `S_MobileNo`, `S_Address`, `S_Username`, `S_Password`, `Security_Question`, `Security_Answer`) VALUES
(1, 'Panchal Kirtan Hareshbhai', 1, 12, 'A', '2002-02-23', 'Male', 'panchalkirtan2302@gmail.c', '9512893101', 'Shastringaar, ahmedabad, Gujarat', 'Kirtan', '547826', 'What is the name of your First Pet?', 'Liza'),
(2, 'Parmar Mihir', 2, 12, 'A', '2002-03-27', 'Male', 'Mihir@gmail.com', '9512289512', 'Law Garden, Ahmedabad, Gujarat', 'Mihir', '123', 'What city were you born in?', 'Ahmedabad'),
(3, 'Parmar Tirth', 3, 12, 'A', '2002-04-28', 'Male', 'Tirth@gmail.com', '9879879879', 'Law garden ,Ahmedabad, Gujarat', 'Tirth', '123', 'What city were you born in?', 'Ahmedabad'),
(4, 'Shreya', 4, 12, 'A', '2001-05-12', 'Female', 'Shreya@gmail.com', '6598765987', 'Ahmedabad, Gujarat', 'Shreya', '125', 'What is the name of your First School?', 'CK'),
(5, 'Agola Harshkumar Amurlal', 5, 12, 'A', '2002-01-11', 'Male', 'harsh@gmail.com', '9556654532', 'Ahmedabad, Gujarat', 'Harsh', '123', 'Pending', 'Pending'),
(6, 'Balani Harshita Naresh ', 6, 12, 'A', '2002-02-01', 'Female', 'harshita@gmail.com', '9871239871', 'Ahmedabad, Gujarat', 'Harshita', '123', 'Pending', 'Pending'),
(7, 'Balar Shruti Bhavesh', 7, 12, 'A', '2002-03-05', 'Female', 'Shruti@gmail.com', '9512882159', 'Ahmedabad, Gujarat', 'Shruti', '123', 'Pending', 'Pending'),
(8, 'Patel Aayush', 8, 12, 'A', '2001-06-12', 'Male', 'aayush@gmail.com', '6588569779', 'Ahmedabad, Gujarat', 'Aayush', '123', 'Pending', 'Pending'),
(9, 'Bera Rohit Nitai ', 9, 12, 'A', '2002-08-23', 'Male', 'rohit@gmail.com', '7569873512', 'Ahmedabad, Gujarat', 'Rohit', '123', 'Pending', 'Pending'),
(11, 'Mourya Aadarsh', 10, 12, 'A', '2001-10-05', 'Male', 'aadarsh@gmail.com', '4566547897', 'Ahmedabad, Gujarat', 'Aadarsh', '123', 'Pending', 'Pending'),
(12, 'Gorani Janvi Hareshbhai ', 11, 12, 'A', '2002-12-12', 'Female', 'janvi@gmail.com', '6523325686', 'Ahmedabad, Gujarat', 'Janvi', '123', 'Pending', 'Pending'),
(13, 'Patel Aaditya', 12, 12, 'A', '2001-10-09', 'Male', 'aaditya@gmail.com', '6547569812', 'Ahmedabad, Gujarat', 'Aaditya', '123', 'Pending', 'Pending'),
(14, 'Patel Mansi', 13, 12, 'A', '2002-01-02', 'Female', 'mansi@gmail.com', '4566547893', 'Ahmedabad, Gujarat', 'Mansi', '123', 'Pending', 'Pending'),
(15, 'Jadav Prowess Ashokbhai', 14, 12, 'A', '2001-11-05', 'Male', 'prowess@gmail.com', '8976532586', 'Ahmedabad, Gujarat', 'Prowess', '123', 'Pending', 'Pending'),
(16, 'Banavali Dhruv', 15, 12, 'A', '2001-10-23', 'Male', 'Dhruv@gmail.com', '2345665432', 'Saraspur, Ahmedabad, Gujarat', 'Dhruv', '123', 'Pending', 'Pending'),
(17, 'Dipen', 16, 12, 'A', '2002-11-08', 'Male', 'dipen@gmail.com', '9879879876', 'Surendranagar, Ahmedabad', 'Dipen', '123', 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `student_leave_info`
--

CREATE TABLE `student_leave_info` (
  `L_Id` int(11) NOT NULL,
  `S_Id` int(11) NOT NULL,
  `Leave_Reason` varchar(150) NOT NULL,
  `NoDays` int(2) NOT NULL,
  `Leave_Status` varchar(8) NOT NULL,
  `E_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_leave_info`
--

INSERT INTO `student_leave_info` (`L_Id`, `S_Id`, `Leave_Reason`, `NoDays`, `Leave_Status`, `E_Date`) VALUES
(1, 1, 'Due to Cold and fewer I want be able to come school for few days', 2, 'Accept', '2022-03-06'),
(2, 1, 'Due to Cold and fewer I want be able to come school for few more days', 3, 'Reject', '2022-03-06'),
(3, 2, 'Due to Cold and fewer I want be able to come school for few days', 1, 'Pending', '2022-03-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `announcement_info`
--
ALTER TABLE `announcement_info`
  ADD PRIMARY KEY (`A_Id`);

--
-- Indexes for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD PRIMARY KEY (`A_Id`),
  ADD KEY `attendance_info` (`S_Id`);

--
-- Indexes for table `complain_info`
--
ALTER TABLE `complain_info`
  ADD PRIMARY KEY (`C_Id`),
  ADD KEY `complain_info` (`S_Id`);

--
-- Indexes for table `division_info`
--
ALTER TABLE `division_info`
  ADD PRIMARY KEY (`D_Id`);

--
-- Indexes for table `faculty_info`
--
ALTER TABLE `faculty_info`
  ADD PRIMARY KEY (`F_Id`);

--
-- Indexes for table `faculty_leave_info`
--
ALTER TABLE `faculty_leave_info`
  ADD PRIMARY KEY (`L_Id`),
  ADD KEY `faculty_leave_info` (`F_Id`);

--
-- Indexes for table `feedback_answer`
--
ALTER TABLE `feedback_answer`
  ADD PRIMARY KEY (`FB_Id`),
  ADD KEY `feedback_answer` (`F_Id`);

--
-- Indexes for table `feedback_question`
--
ALTER TABLE `feedback_question`
  ADD PRIMARY KEY (`FB_Id`);

--
-- Indexes for table `principal_info`
--
ALTER TABLE `principal_info`
  ADD PRIMARY KEY (`P_Id`);

--
-- Indexes for table `standard_info`
--
ALTER TABLE `standard_info`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`S_Id`);

--
-- Indexes for table `student_leave_info`
--
ALTER TABLE `student_leave_info`
  ADD PRIMARY KEY (`L_Id`),
  ADD KEY `student_leave_info` (`S_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcement_info`
--
ALTER TABLE `announcement_info`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance_info`
--
ALTER TABLE `attendance_info`
  MODIFY `A_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `complain_info`
--
ALTER TABLE `complain_info`
  MODIFY `C_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `division_info`
--
ALTER TABLE `division_info`
  MODIFY `D_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faculty_info`
--
ALTER TABLE `faculty_info`
  MODIFY `F_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `faculty_leave_info`
--
ALTER TABLE `faculty_leave_info`
  MODIFY `L_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback_answer`
--
ALTER TABLE `feedback_answer`
  MODIFY `FB_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;

--
-- AUTO_INCREMENT for table `feedback_question`
--
ALTER TABLE `feedback_question`
  MODIFY `FB_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `principal_info`
--
ALTER TABLE `principal_info`
  MODIFY `P_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `standard_info`
--
ALTER TABLE `standard_info`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `S_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `student_leave_info`
--
ALTER TABLE `student_leave_info`
  MODIFY `L_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_info`
--
ALTER TABLE `attendance_info`
  ADD CONSTRAINT `attendance_info` FOREIGN KEY (`S_Id`) REFERENCES `student_info` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `complain_info`
--
ALTER TABLE `complain_info`
  ADD CONSTRAINT `complain_info` FOREIGN KEY (`S_Id`) REFERENCES `student_info` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty_leave_info`
--
ALTER TABLE `faculty_leave_info`
  ADD CONSTRAINT `faculty_leave_info` FOREIGN KEY (`F_Id`) REFERENCES `faculty_info` (`F_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback_answer`
--
ALTER TABLE `feedback_answer`
  ADD CONSTRAINT `feedback_answer` FOREIGN KEY (`F_Id`) REFERENCES `faculty_info` (`F_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_leave_info`
--
ALTER TABLE `student_leave_info`
  ADD CONSTRAINT `student_leave_info` FOREIGN KEY (`S_Id`) REFERENCES `student_info` (`S_Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
