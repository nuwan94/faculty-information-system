-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql107.byetcluster.com
-- Generation Time: Apr 04, 2021 at 07:00 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fis`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseId` varchar(6) NOT NULL,
  `CourseName` varchar(128) NOT NULL,
  `StudentCount` int(6) NOT NULL,
  `CourseDescription` varchar(1028) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseName`, `StudentCount`, `CourseDescription`) VALUES
('SENG', 'Software Engineering', 0, NULL),
('IMGT', 'Management and Information Technology', 0, NULL),
('ENCM', 'Environmental Conversation and Management ', 0, NULL),
('STCS', 'Physical Science(Statistic and Computer Science)', 0, NULL),
('STPY', 'Physical Science(Statistic and Physics)', 0, NULL),
('MCBO', 'Bio Science(Micro Biology and Botany)', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faqID` int(10) NOT NULL,
  `faqHeading` varchar(256) NOT NULL,
  `faqContent` varchar(1024) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faqID`, `faqHeading`, `faqContent`) VALUES
(1, 'Why my results are pending?', '<p>There can be several reasons to show results as \"pending\". Please contact the administrative division in the admin unit.</p>'),
(2, 'What is the method of calculating GPA?', '<p>Our faculty use Standard GPA system with 4.0 scale as following.</p>\r\n<table>\r\n<thead>\r\n<tr><th>Grade</th><th>Marks</th><th>GPA</th><th>Grade</th><th>Marks</th><th>GPA</th></tr>\r\n</thead>\r\n<tbody>\r\n<tr><td>A+</td><td>85-100</td><td>4.0</td><td>C+</td><td>45-49</td><td>2.3</td></tr>\r\n<tr><td>A</td><td>70-84</td><td>4.0</td><td>C</td><td>40-44</td><td>2.0</td></tr>\r\n<tr><td>A-</td><td>65-69</td><td>3.7</td><td>C-</td><td>35-39</td><td>1.7</td></tr>\r\n<tr><td>B+</td><td>60-64</td><td>3.3</td><td>D+</td><td>30-34</td><td>1.3</td></tr>\r\n<tr><td>B</td><td>55-59</td><td>3.0</td><td>D</td><td>25-29</td><td>1.0</td></tr>\r\n<tr><td>B-</td><td>50-54</td><td>2.7</td><td>E</td><td>00-24</td><td>0.0</td></tr>\r\n</tbody>\r\n</table>'),
(3, 'What is the pass mark for a exam?', '<p>If you obtained <b>Grade C</b> or higher for a subject you will be considers as pass. If not you have to sat for the repeat exam next year. However highest grade you can get in next year is C.</p>'),
(4, 'When will be the admission released?', '<p>Admission will be released on the 31<sup>st</sup> July 2018. Please collect your admission from dean office between 08.30AM - 3.30PM. </p>');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `StudentNo` varchar(11) NOT NULL,
  `CourseId` varchar(6) NOT NULL,
  `SubjectId` varchar(10) NOT NULL,
  `Marks` int(3) DEFAULT NULL,
  `Year` int(4) NOT NULL,
  `Semester` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`StudentNo`, `CourseId`, `SubjectId`, `Marks`, `Year`, `Semester`) VALUES
('SE/2015/003', 'SENG', 'SENG 11213', 78, 2015, 1),
('SE/2015/003', 'SENG', 'SENG 11223', 92, 2015, 1),
('SE/2015/003', 'SENG', 'SENG 12213', 80, 2015, 2),
('SE/2015/003', 'SENG', 'DELT 11232', 76, 2015, 1),
('SE/2015/003', 'SENG', 'DELT 11212', 79, 2015, 1),
('SE/2015/003', 'SENG', 'PMAT 11212', 65, 2015, 1),
('SE/2015/003', 'SENG', 'SENG 11243', 57, 2015, 1),
('SE/2015/003', 'SENG', 'SENG 11232', 92, 2015, 1),
('SE/2015/003', 'SENG', 'DELT 12212', 61, 2015, 2),
('SE/2015/003', 'SENG', 'SENG 12223', 84, 2015, 2),
('SE/2015/003', 'SENG', 'SENG 12242', 79, 2015, 2),
('SE/2015/003', 'SENG', 'SENG 12233', 80, 2015, 2),
('SE/2015/003', 'SENG', 'PMAT 12212', 79, 2015, 2);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffNo` varchar(12) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffNo`, `Name`, `Password`, `Email`, `level`) VALUES
('Admin', 'Admin', '12345', 'admin@mail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `StudentNo` varchar(11) NOT NULL,
  `StudentName` varchar(256) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `EmailPersonal` varchar(128) DEFAULT NULL,
  `EmailKLN` varchar(128) NOT NULL,
  `AcYear` int(4) NOT NULL,
  `Address` varchar(256) NOT NULL,
  `ContactNo` varchar(10) DEFAULT NULL,
  `ZScore` float NOT NULL,
  `CourseId` varchar(16) NOT NULL,
  `GPA` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`StudentNo`, `StudentName`, `Password`, `EmailPersonal`, `EmailKLN`, `AcYear`, `Address`, `ContactNo`, `ZScore`, `CourseId`, `GPA`) VALUES
('SE/2015/003', 'Nuwan Sameera Alawatta', '12345', 'nuwansalawatta@gmail.com', 'alawatta_se15003@gmail.com', 2015, 'No. 3/7, Magalegoda, Veyangoda.', '0757871494', 1.7702, 'SENG', 3.76),
('17/rp/01007', 'mucyo', '12345', 'erwe@mail.com', 'mucyo_007@stu.kln.ac.lk', 2021, 'kn6785', '0785792941', 1, 'SENG', 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SubjectCode` varchar(10) NOT NULL,
  `SubjectName` varchar(256) NOT NULL,
  `CourseId` varchar(6) NOT NULL,
  `CourseContet` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectCode`, `SubjectName`, `CourseId`, `CourseContet`) VALUES
('SENG 21213', 'Computer Architecture and Operating Systems', 'SENG', 'download/test.pdf'),
('SENG 21243', 'Software Modelling', 'SENG', ''),
('DELT 12212', 'Communication Skills for Professionals', 'SENG', ''),
('SENG 11213', 'Fundamentals of Computing', 'SENG', 'download/test.pdf'),
('SENG 11223', 'Programming Concepts', 'SENG', 'download/test.pdf'),
('SENG 11232', 'Engineering Foundation', 'SENG', 'download/test.pdf'),
('SENG 11243', 'Statistics', 'SENG', 'download/test.pdf'),
('SENG 12213', 'Data Structures and Algorithms', 'SENG', 'download/test.pdf'),
('PMAT 11212', 'Discrete Mathematics for Computing I', 'SENG', 'download/test.pdf'),
('PMAT 12212', 'Discrete Mathematics for Computing II', 'SENG', ''),
('GNCT 13212', 'Personal Progress and Development I', 'SENG', ''),
('SENG 21272', 'Management for Software Engineering II', 'SENG', ''),
('GNCT 23212', 'Personal Progress and Development II', 'SENG', ''),
('PMAT 22213', 'Mathematical Methods', 'SENG', ''),
('COSC 11513', 'Introduction to Computer Science', 'STCS', ''),
('COSC 11522', 'Introduction to Programming Concepts', 'STCS', ''),
('ENCM 11512', 'Evolution of Earth and Biogeography', 'ENCM', ''),
('ENCM 11522', 'Introduction to Environmental Management', 'ENCM', ''),
('ENCM 11532', 'Hydrology and Meteorology', 'ENCM', ''),
('ENCM 31513', 'Environmental Economics', 'ENCM', ''),
('SENG 12223', 'Database Design and Development', 'SENG', ''),
('SENG 12233', 'Object Oriented Programming', 'SENG', ''),
('SENG 12242', 'Management for Software Engineering I', 'SENG', ''),
('DELT 11212', 'English for Professionals', 'SENG', ''),
('SENG 21253', 'Web Application Development', 'SENG', ''),
('SENG 21263', 'Interactive Application Development', 'SENG', ''),
('SENG 22212', 'Software Architecture and Design', 'SENG', ''),
('SENG 22223', 'Human Computer Interaction', 'SENG', ''),
('SENG 22233', 'Software Verification and Validation', 'SENG', ''),
('SENG 22243', 'Mobile Application Development', 'SENG', ''),
('SENG 22253', 'Embedded Systems Development', 'SENG', ''),
('SENG 24213', 'Computer Networks', 'SENG', ''),
('SENG 31212', 'Software Quality', 'SENG', ''),
('SENG 31222', 'Information Security', 'SENG', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faqID`,`faqHeading`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`SubjectId`,`StudentNo`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffNo`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`StudentNo`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SubjectCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faqID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
