-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 03:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sister`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Lastname` varchar(40) NOT NULL,
  `Admin_Firstname` varchar(40) DEFAULT NULL,
  `Admin_Middlename` varchar(40) NOT NULL,
  `Admin_Username` varchar(40) NOT NULL,
  `Admin_Password` varchar(40) NOT NULL,
  `Registered_On` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Lastname`, `Admin_Firstname`, `Admin_Middlename`, `Admin_Username`, `Admin_Password`, `Registered_On`) VALUES
(2, '', 'admin', '', 'admin', '098f6bcd4621d373cade4e832627b4f6', '2022-11-07 07:14:56'),
(3, '', NULL, '', 'admin123', '$2y$10$qb4aGBvidQWd0xKtcMgls.NkwrU8Nbsp3', '2022-11-28 06:46:28'),
(4, '', NULL, '', 'testadmin', '$2y$10$TqSYCBEsWG0drdJtLshJBuT3ASIOBxvax', '2022-11-28 06:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `Admission_ID` int(11) NOT NULL,
  `Admission_DateTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Department_ID` int(11) NOT NULL,
  `Clearance_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `advising`
--

CREATE TABLE `advising` (
  `Advising_ID` int(11) NOT NULL,
  `Prospectus` varchar(40) DEFAULT NULL,
  `School_Year` varchar(40) DEFAULT NULL,
  `Load` varchar(40) DEFAULT NULL,
  `Reg_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `Announcement_ID` int(11) NOT NULL,
  `Announcement_For` varchar(255) NOT NULL,
  `Announcement_Subject` varchar(255) NOT NULL,
  `Announcement_Paragraph` varchar(255) NOT NULL,
  `Announcement_Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`Announcement_ID`, `Announcement_For`, `Announcement_Subject`, `Announcement_Paragraph`, `Announcement_Date`) VALUES
(2, 'Student', 'wqeqeqewqewqewq', '                                                            Hi students                    qwewqe                    ', '2022-12-02 03:53:44'),
(3, 'Student', 'wqeqeqewqewqewq', '                                                            Hi students                    qwewqe                    ', '2022-12-02 03:53:44'),
(4, 'Student', 'wqeqeqewqewqewq', '                                                            Hi students                    qwewqe                    ', '2022-12-02 03:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `Assessment_ID` int(11) NOT NULL,
  `School_Year` varchar(40) NOT NULL,
  `Semester` varchar(40) NOT NULL,
  `Payment_Status` varchar(40) NOT NULL,
  `Total` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `Clearance_ID` int(11) NOT NULL,
  `Transaction_Date_Time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Clearance_Status` varchar(40) NOT NULL,
  `Liabilities_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `College_ID` int(11) NOT NULL,
  `College_Name` varchar(255) NOT NULL,
  `Population` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`College_ID`, `College_Name`, `Population`) VALUES
(1, 'CED(College of Education)', ''),
(2, 'CCS(College of Computer Studies)', ''),
(3, 'CEBA(College of Economics, Business & Account)', ''),
(4, 'CSM(College of Science & Mathematics)', ''),
(5, 'COET(College of Engineering &Technology)', ''),
(6, 'CON(College of Nursing)', ''),
(7, 'CASS(College of Arts & Social Sciences)', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `Course_ID` int(11) NOT NULL,
  `Course_name` varchar(40) NOT NULL,
  `Credits` varchar(40) NOT NULL,
  `Syllabus` varchar(40) NOT NULL,
  `Prerequisite` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_offering`
--

CREATE TABLE `course_offering` (
  `Course_Offering_ID` int(11) NOT NULL,
  `Sched_Day` varchar(40) NOT NULL,
  `Time_Start` time NOT NULL,
  `Time_End` time NOT NULL,
  `Section` varchar(40) NOT NULL,
  `Room` varchar(40) NOT NULL,
  `Semester` varchar(40) NOT NULL,
  `School_Year` varchar(40) NOT NULL,
  `Total_slot` varchar(40) NOT NULL,
  `Taken_slot` varchar(40) NOT NULL,
  `Course_ID` int(11) NOT NULL,
  `Faculty_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course_offering_advising`
--

CREATE TABLE `course_offering_advising` (
  `Course_Offering_ID` int(11) NOT NULL,
  `Advising_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_ID` int(11) NOT NULL,
  `Department_Name` varchar(40) NOT NULL,
  `No_of_Students` varchar(40) NOT NULL,
  `College_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_ID`, `Department_Name`, `No_of_Students`, `College_ID`) VALUES
(1, 'General Education', '', 7),
(2, 'Political Science', '', 7),
(4, 'English', '', 7),
(5, 'Philosophy and Humanities', '', 7),
(6, 'Filipino', '', 7),
(7, 'History', '', 7),
(8, 'Psychology', '', 7),
(9, 'Sociology', '', 7),
(10, 'Computer Application', '', 2),
(11, 'Computer Science', '', 2),
(12, 'Information Technology', '', 2),
(14, 'Health Science', '', 6),
(15, 'Information Systems', '', 2),
(16, 'Hospitality Management', '', 3),
(17, 'Accountancy ', '', 3),
(18, 'Economics', '', 3),
(19, 'Marketing', '', 3),
(20, 'Industrial Technology Education', '', 1),
(21, 'Professional Education', '', 1),
(22, 'Science and Mathematics Education', '', 1),
(23, 'Physical Education', '', 1),
(24, 'Bachelor of Physical Education (SNP)', '', 1),
(25, 'Technology Teacher Education', '', 1),
(26, 'Home Technology Education', '', 1),
(27, 'Special Science Program', '', 4),
(28, 'Mathematics and Statistics', '', 4),
(29, 'Physics', '', 4),
(30, 'Chemistry', '', 4),
(31, 'Biological Sciences', '', 4),
(32, 'Marine Science', '', 4),
(33, 'Engineering Technology Management', '', 5),
(34, 'Industrial Automation & Control E.T. ', '', 5),
(35, 'Refrigeration & Air Conditioning E.T.', '', 5),
(36, 'DIAMT Dept.', '', 5),
(37, 'Electrical/E.C.E./ Computer Engineering', '', 5),
(43, 'Electrical Engineering Technology', '', 5),
(44, 'Industrial Automation & Mechatronics', '', 5),
(45, 'Metallurgical Engineering Technology ', '', 5),
(46, 'Materials Science & Engineering Technolo', '', 5),
(47, 'Environmental Engineering Technology', '', 5),
(48, 'Related Subjects', '', 5),
(49, 'Ceramics/Mining/Metallurgical Engineerin', '', 5),
(50, 'Mechanical Engineering Technology', '', 5),
(51, 'Mechanical & Engineering Science', '', 5),
(52, 'Automotive Engineering', '', 5),
(53, 'Civil Engineering', '', 5),
(54, 'Civil Engineering Technology', '', 5),
(55, 'Chemical Engineering Technology', '', 5),
(56, 'Chemical Engineering & Technology', '', 5),
(57, 'DCHT Department', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `Faculty_ID` int(11) NOT NULL,
  `Faculty_Lastname` varchar(40) NOT NULL,
  `Faculty_Firstname` varchar(40) DEFAULT NULL,
  `Faculty_Middlename` varchar(40) NOT NULL,
  `Faculty_Birthdate` varchar(40) NOT NULL,
  `Faculty_Gender` varchar(40) NOT NULL,
  `Faculty_Email` varchar(40) NOT NULL,
  `Faculty_Phone` varchar(40) NOT NULL,
  `Faculty_Address` year(4) NOT NULL,
  `Faculty_Username` varchar(40) NOT NULL,
  `Faculty_Password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`Faculty_ID`, `Faculty_Lastname`, `Faculty_Firstname`, `Faculty_Middlename`, `Faculty_Birthdate`, `Faculty_Gender`, `Faculty_Email`, `Faculty_Phone`, `Faculty_Address`, `Faculty_Username`, `Faculty_Password`) VALUES
(1, '', 'facultytest', '', '', '', '', '', 0000, 'faculty', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `Fee_ID` int(11) NOT NULL,
  `Fee_Desc` varchar(40) NOT NULL,
  `Amount` varchar(40) NOT NULL,
  `Assessment_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `liabilities`
--

CREATE TABLE `liabilities` (
  `Liabilities_ID` int(11) NOT NULL,
  `Liability_Count` varchar(40) NOT NULL,
  `Liability_Status` varchar(40) NOT NULL,
  `Liability_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `liability`
--

CREATE TABLE `liability` (
  `Liability_ID` int(11) NOT NULL,
  `Liability_Name` varchar(40) NOT NULL,
  `Liability_Fee` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `Major_ID` int(11) NOT NULL,
  `Major_Name` varchar(40) NOT NULL,
  `Program_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Program_ID` int(11) NOT NULL,
  `Program_Name` varchar(40) NOT NULL,
  `Department_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Program_ID`, `Program_Name`, `Department_ID`) VALUES
(1, 'BSIT', 12),
(3, 'BSCS', 11);

-- --------------------------------------------------------

--
-- Table structure for table `program_registration`
--

CREATE TABLE `program_registration` (
  `Program_ID` int(11) NOT NULL,
  `Reg_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Reg_ID` int(11) NOT NULL,
  `Date_Time_Registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Assessment_ID` int(11) NOT NULL,
  `Student_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_ID` int(11) NOT NULL,
  `Student_Lastname` varchar(40) NOT NULL,
  `Student_Firstname` varchar(40) NOT NULL,
  `Student_Middlename` varchar(40) NOT NULL,
  `Student_Birthdate` date NOT NULL,
  `Student_Gender` varchar(40) NOT NULL,
  `Student_Email` varchar(40) NOT NULL,
  `Student_Password` varchar(40) NOT NULL,
  `Student_Phone` varchar(40) NOT NULL,
  `Student_Program` varchar(255) NOT NULL,
  `Student_Year_Level` varchar(40) NOT NULL,
  `zip` varchar(40) NOT NULL,
  `province` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `barangay` varchar(40) NOT NULL,
  `purok` varchar(40) NOT NULL,
  `street` varchar(40) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `Scholarship_Status` varchar(40) NOT NULL,
  `Scholastic_Status` varchar(40) NOT NULL,
  `Registered_On` timestamp NOT NULL DEFAULT current_timestamp(),
  `Status` varchar(255) NOT NULL,
  `Update_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Student_Profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_ID`, `Student_Lastname`, `Student_Firstname`, `Student_Middlename`, `Student_Birthdate`, `Student_Gender`, `Student_Email`, `Student_Password`, `Student_Phone`, `Student_Program`, `Student_Year_Level`, `zip`, `province`, `city`, `barangay`, `purok`, `street`, `cgpa`, `Scholarship_Status`, `Scholastic_Status`, `Registered_On`, `Status`, `Update_on`, `Student_Profile`) VALUES
(36, 'Penales', 'Christian Jay', ' Maglangit', '1999-12-12', 'male', 'chan_penales@yahoo.com', '57ed41e802bcc0568450d7e2d52085b5', '09979912025', 'BSIT', '', '9200', 'Lanao del Norte', 'Iligan City', 'Santiago', '', 'Avocado Street', '', '', '', '2022-12-01 09:40:22', 'Active', '2022-12-01 09:40:51', ''),
(37, 'Scott', 'Travis', ' Macita', '1999-12-12', 'male', ' travis@gmail.com', '67baae2573be610bba8411eac665794d', '99999999999', 'BSIT', '', '9200', 'Lanao del Norte', 'Iligan City', 'San Miguel', '', 'Pineapple', '', '', '', '2022-12-01 09:46:17', 'Active', '2022-12-01 09:46:17', ''),
(38, 'qwewq', 'eqwe', ' wqewqewq', '1999-12-12', 'male', ' chan_penales@yahoo.com', '96809295a763caf5ad8da17118c037a5', '99999999', 'BSCS', '', '9200', 'Province', 'City', 'Santiago', '', 'Avocado Street', '', '', '', '2022-12-01 10:01:46', 'Active', '2022-12-01 10:01:46', ''),
(39, 'Test', 'Christian Jay', ' Test', '1889-12-12', 'male', ' test@email.com', 'e38c416f23c8dcf2b0b8837e1951d91e', '9999999999', 'BSIT', '', '9200', 'Province', 'Iligan City', 'San Miguel', '', 'Pineapple', '', '', '', '2022-12-01 10:06:06', 'Active', '2022-12-01 10:06:06', ''),
(40, 'Penales', 'Christian', ' Penales', '1999-12-12', 'male', ' chan_penales@yahoo.com', 'd4b130cc769617de3ee89285593adc75', '0990909090', 'BSIT', '', '9200', 'Lanao del Norte', 'Iligan City', 'Santiago', '', 'Avocado Street', '', '', '', '2022-12-01 10:45:49', 'Active', '2022-12-01 10:45:49', ''),
(41, 'Penales', 'Clarene', ' Harve', '1898-12-12', 'male', ' chan_penales@yahoo.com', '5b452354c62fb7db03f3225c5b6648c4', '09979912025', 'BSIT', '', '9200', 'Lanao del Norte', 'Iligan City', 'Santiago', '', 'Avocado Street', '', '', '', '2022-12-01 10:47:51', 'Active', '2022-12-01 10:47:51', ''),
(42, 'Test', 'Christian Jay', ' Test', '1999-12-12', 'male', ' chan_penales@yahoo.com', 'e38c416f23c8dcf2b0b8837e1951d91e', '132131', 'BSIT', '', 'Zip', 'Lanao del Norte', 'Iligan City', 'Barangay', '', 'Street', '', '', '', '2022-12-01 10:49:37', 'Active', '2022-12-01 10:49:37', ''),
(43, 'qwewq', 'Christian Jay', ' Test', '1990-12-12', 'male', ' chan_penales@yahoo.com', '0fdfbf4aba5fa96909eaad3e0a6aadbc', '13213', 'BSIT', '', '9200', 'Lanao del Norte', 'Iligan City', 'San Miguel', '', 'Avocado Street', '', '', '', '2022-12-01 10:50:49', 'Active', '2022-12-01 10:50:49', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`Admission_ID`),
  ADD KEY `Department_Admission` (`Department_ID`),
  ADD KEY `Clearance_Admission` (`Clearance_ID`),
  ADD KEY `Student_Admission` (`Student_ID`);

--
-- Indexes for table `advising`
--
ALTER TABLE `advising`
  ADD PRIMARY KEY (`Advising_ID`),
  ADD KEY `Registration_Advising` (`Reg_ID`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`Announcement_ID`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`Assessment_ID`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`Clearance_ID`),
  ADD KEY `Liabilities_Clearance` (`Liabilities_ID`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`College_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`Course_ID`);

--
-- Indexes for table `course_offering`
--
ALTER TABLE `course_offering`
  ADD PRIMARY KEY (`Course_Offering_ID`),
  ADD KEY `Course_Course_Offering` (`Course_ID`),
  ADD KEY `Faculty_Course_Offering` (`Faculty_ID`);

--
-- Indexes for table `course_offering_advising`
--
ALTER TABLE `course_offering_advising`
  ADD KEY `Course_Offering_Course_Offering_Advising` (`Course_Offering_ID`),
  ADD KEY `Advising_Course_Offering_Advising` (`Advising_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_ID`),
  ADD KEY `College_Department` (`College_ID`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`Faculty_ID`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`Fee_ID`),
  ADD KEY `Assessment_Fee` (`Assessment_ID`);

--
-- Indexes for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD PRIMARY KEY (`Liabilities_ID`),
  ADD KEY `Liability_Liabilities` (`Liability_ID`);

--
-- Indexes for table `liability`
--
ALTER TABLE `liability`
  ADD PRIMARY KEY (`Liability_ID`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`Major_ID`),
  ADD KEY `Program_Major` (`Program_ID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Program_ID`),
  ADD KEY `Department_Program` (`Department_ID`);

--
-- Indexes for table `program_registration`
--
ALTER TABLE `program_registration`
  ADD KEY `Program_Program_Registration` (`Program_ID`),
  ADD KEY `Registration_Program_Registration` (`Reg_ID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Reg_ID`),
  ADD KEY `Assessment_Registration` (`Assessment_ID`),
  ADD KEY `Student_Registration` (`Student_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `Admission_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `advising`
--
ALTER TABLE `advising`
  MODIFY `Advising_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `Announcement_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `Assessment_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `Clearance_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `College_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `Course_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_offering`
--
ALTER TABLE `course_offering`
  MODIFY `Course_Offering_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `Faculty_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `Fee_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liabilities`
--
ALTER TABLE `liabilities`
  MODIFY `Liabilities_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `liability`
--
ALTER TABLE `liability`
  MODIFY `Liability_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `Major_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `Program_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Reg_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admission`
--
ALTER TABLE `admission`
  ADD CONSTRAINT `Clearance_Admission` FOREIGN KEY (`Clearance_ID`) REFERENCES `clearance` (`Clearance_ID`),
  ADD CONSTRAINT `Department_Admission` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`),
  ADD CONSTRAINT `Student_Admission` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);

--
-- Constraints for table `advising`
--
ALTER TABLE `advising`
  ADD CONSTRAINT `Registration_Advising` FOREIGN KEY (`Reg_ID`) REFERENCES `registration` (`Reg_ID`);

--
-- Constraints for table `clearance`
--
ALTER TABLE `clearance`
  ADD CONSTRAINT `Liabilities_Clearance` FOREIGN KEY (`Liabilities_ID`) REFERENCES `liabilities` (`Liabilities_ID`);

--
-- Constraints for table `course_offering`
--
ALTER TABLE `course_offering`
  ADD CONSTRAINT `Course_Course_Offering` FOREIGN KEY (`Course_ID`) REFERENCES `course` (`Course_ID`),
  ADD CONSTRAINT `Faculty_Course_Offering` FOREIGN KEY (`Faculty_ID`) REFERENCES `faculty` (`Faculty_ID`);

--
-- Constraints for table `course_offering_advising`
--
ALTER TABLE `course_offering_advising`
  ADD CONSTRAINT `Advising_Course_Offering_Advising` FOREIGN KEY (`Advising_ID`) REFERENCES `advising` (`Advising_ID`),
  ADD CONSTRAINT `Course_Offering_Course_Offering_Advising` FOREIGN KEY (`Course_Offering_ID`) REFERENCES `course_offering` (`Course_Offering_ID`);

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `College_Department` FOREIGN KEY (`College_ID`) REFERENCES `college` (`College_ID`);

--
-- Constraints for table `fee`
--
ALTER TABLE `fee`
  ADD CONSTRAINT `Assessment_Fee` FOREIGN KEY (`Assessment_ID`) REFERENCES `assessment` (`Assessment_ID`);

--
-- Constraints for table `liabilities`
--
ALTER TABLE `liabilities`
  ADD CONSTRAINT `Liability_Liabilities` FOREIGN KEY (`Liability_ID`) REFERENCES `liability` (`Liability_ID`);

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `Program_Major` FOREIGN KEY (`Program_ID`) REFERENCES `program` (`Program_ID`);

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `Department_Program` FOREIGN KEY (`Department_ID`) REFERENCES `department` (`Department_ID`);

--
-- Constraints for table `program_registration`
--
ALTER TABLE `program_registration`
  ADD CONSTRAINT `Program_Program_Registration` FOREIGN KEY (`Program_ID`) REFERENCES `program` (`Program_ID`),
  ADD CONSTRAINT `Registration_Program_Registration` FOREIGN KEY (`Reg_ID`) REFERENCES `registration` (`Reg_ID`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `Assessment_Registration` FOREIGN KEY (`Assessment_ID`) REFERENCES `assessment` (`Assessment_ID`),
  ADD CONSTRAINT `Student_Registration` FOREIGN KEY (`Student_ID`) REFERENCES `student` (`Student_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
