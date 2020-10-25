-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 11:51 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bughound`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

CREATE TABLE `areas` (
  `area_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `area` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`area_id`, `prog_id`, `area`) VALUES
(1036, 1013, 'Ada95 Parser'),
(1037, 1013, 'Ada95 Lexer'),
(1038, 1013, 'ADA95 IDE'),
(1044, 1014, 'Logon'),
(1045, 1014, 'start'),
(1046, 1014, 'DB Maintenence'),
(1047, 1014, 'Search'),
(1048, 1014, 'Insert New'),
(1049, 1014, 'Search Results'),
(1050, 1014, 'Add edit Areas'),
(1051, 1014, 'Add Employees'),
(1052, 1014, 'Add Programs'),
(1053, 1014, 'view bugs'),
(1054, 1015, 'Lexer'),
(1055, 1015, 'Parser'),
(1056, 1015, 'Code generator'),
(1057, 1015, 'Linker'),
(1058, 1020, 'Lexer'),
(1059, 1020, 'Parser'),
(1060, 1020, 'Code generator'),
(1061, 1020, 'Linker'),
(1062, 1017, 'Lexer'),
(1063, 1017, 'Parser'),
(1064, 1017, 'Code generator'),
(1065, 1017, 'Linker'),
(1066, 1017, 'IDE'),
(1069, 1018, 'Lexer'),
(1070, 1018, 'Parser'),
(1071, 1018, 'Code generator'),
(1072, 1018, 'IDE'),
(1073, 1019, 'Editor'),
(1074, 1019, 'spell checeker'),
(1075, 1019, 'Dynodraw'),
(1076, 1019, 'formulator'),
(1077, 1014, 'Export');

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `attachment_id` int(11) NOT NULL,
  `attachment` text NOT NULL,
  `attachment_type` text NOT NULL,
  `attachment_size` int(30) NOT NULL,
  `bug_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`attachment_id`, `attachment`, `attachment_type`, `attachment_size`, `bug_id`) VALUES
(12, '92900-Lecture-4.pdf', 'application/pdf', 2010931, 226),
(13, '9165-SoC-Part-1.pdf', 'application/pdf', 3776390, 231),
(14, '26845-Capture_bugform.PNG', 'image/png', 42509, 235),
(15, '46684-ilovepdf_merged.pdf', 'application/pdf', 9404683, 235),
(16, '35492-ilovepdf_merged.pdf', 'application/pdf', 9404683, 235);

-- --------------------------------------------------------

--
-- Table structure for table `bugtable`
--

CREATE TABLE `bugtable` (
  `bug_id` int(11) NOT NULL,
  `prog_id` int(11) NOT NULL,
  `area_id` int(11) DEFAULT NULL,
  `report_type` varchar(32) NOT NULL,
  `severity` varchar(32) NOT NULL,
  `problem_summary` text NOT NULL,
  `problem` text NOT NULL,
  `reproducible` varchar(32) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `suggested_fix` text NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `comments` text NOT NULL,
  `status` varchar(32) NOT NULL,
  `priority` varchar(32) NOT NULL,
  `resolution` varchar(32) NOT NULL,
  `resolution_version` varchar(32) NOT NULL,
  `resolved_by` int(11) DEFAULT NULL,
  `resolved_date` date NOT NULL,
  `tested_by` int(11) DEFAULT NULL,
  `test_date` date NOT NULL,
  `deferred` varchar(32) NOT NULL,
  `attachment` text NOT NULL,
  `attachment_type` text NOT NULL,
  `attachment_size` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bugtable`
--

INSERT INTO `bugtable` (`bug_id`, `prog_id`, `area_id`, `report_type`, `severity`, `problem_summary`, `problem`, `reproducible`, `reported_by`, `date`, `suggested_fix`, `assigned_to`, `comments`, `status`, `priority`, `resolution`, `resolution_version`, `resolved_by`, `resolved_date`, `tested_by`, `test_date`, `deferred`, `attachment`, `attachment_type`, `attachment_size`) VALUES
(226, 1013, NULL, 'Coding Error', 'Minor', 'The last two lines of output are concatenated on a single line', 'Lines 32 and 33 in the output report are not on separate lines', 'YES', 1109, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(227, 1013, NULL, 'Design issue', 'Minor', 'IDE File-', 'Print defaults to PDF – should be blank initially.', 'YES', 1108, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(228, 1019, NULL, 'Design issue', 'Serious', 'Formulator missing capital Greek Sigma', 'Formulator missing capital Greek Sigma', 'YES', 1113, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(229, 1018, NULL, 'Suggestion', 'Minor', 'says IDE should have a toolbar for compiling, linking, running', 'says IDE should have a toolbar for compiling, linking, running', 'YES', 1112, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(230, 1015, NULL, 'Design issue', 'Serious', '\"La distance n\'est pas en kilomètres!\" ', '\"La distance n\'est pas en kilomètres!\" ', 'YES', 1111, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '59756-New Text Document.txt', 'text/plain', 79),
(231, 1014, 1050, 'Coding Error', 'Serious', '“add areas page” has no means to Cancel or quit after adding', '“add areas page” has no means to Cancel or quit after adding', 'YES', 1108, '2020-04-30', 'Add Cancel button to page', 1113, '', 'closed', 'Fix immediately', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(232, 1013, NULL, 'Coding Error', 'Fatal', 'that the math.p library is not found by the linker', 'that the math.p library is not found by the linker', 'YES', 1109, '2020-04-30', '', NULL, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(234, 1019, NULL, 'Hardware', 'Serious', 'HP scanners appear in the hardware list but are grayed out and un-selectable \r\n', '', 'YES', 1110, '2020-05-05', '', 1108, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(235, 1014, NULL, 'Coding Error', 'Fatal', 'Bughound incorrectly processes single quotes', 'If a \'single quote\' is used in a string it breaks the SQL statement inserting it\r\n', 'YES', 1111, '2020-05-05', '', 1108, '', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0),
(236, 1013, NULL, 'Coding Error', 'Fatal', 'There\'s a quote in this', 'There\'s a quote in this', 'YES', 1107, '2020-05-05', 'There\'s a quote in this', 1108, 'There\'s a quote in this', 'open', '', '', '', NULL, '0000-00-00', NULL, '0000-00-00', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userlevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `name`, `username`, `password`, `userlevel`) VALUES
(1105, 'aayush95', 'beast', 'beast16', 3),
(1107, 'Bob', 'smithbob', '123456', 3),
(1108, 'Sue', 'jonessue', '123456', 2),
(1109, 'Habib', 'smithhabib', '123456', 2),
(1110, 'Yoshi', 'jonesyoshi', '123456', 3),
(1111, 'Francois', 'smithfrancois', '123456', 2),
(1112, 'Becky', 'jonesbecky', '123456', 1),
(1113, 'Felix', 'smithfelix', '123456', 2);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `prog_id` int(11) NOT NULL,
  `program` varchar(32) NOT NULL,
  `program_release` varchar(32) NOT NULL,
  `program_version` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`prog_id`, `program`, `program_release`, `program_version`) VALUES
(1013, 'Ada 95 Coder', '1', '1(8)'),
(1014, 'BugHound', '1', '1'),
(1015, 'COBOL Coder', '1', '1'),
(1017, 'COBOL Coder', '2', '1'),
(1018, 'Pascal Coder', '1', '1'),
(1019, 'Word Writer 2019', '1', '1'),
(1020, 'COBOL Coder', '1', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `prog_id_fk` (`prog_id`);

--
-- Indexes for table `attachments`
--
ALTER TABLE `attachments`
  ADD PRIMARY KEY (`attachment_id`),
  ADD KEY `bug_id` (`bug_id`);

--
-- Indexes for table `bugtable`
--
ALTER TABLE `bugtable`
  ADD PRIMARY KEY (`bug_id`),
  ADD KEY `prog_id` (`prog_id`),
  ADD KEY `reported_by` (`reported_by`),
  ADD KEY `resolved_by` (`resolved_by`),
  ADD KEY `tested_by` (`tested_by`),
  ADD KEY `area_id` (`area_id`),
  ADD KEY `assigned_to` (`assigned_to`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`prog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areas`
--
ALTER TABLE `areas`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1079;

--
-- AUTO_INCREMENT for table `attachments`
--
ALTER TABLE `attachments`
  MODIFY `attachment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bugtable`
--
ALTER TABLE `bugtable`
  MODIFY `bug_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1117;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `prog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `prog_id_fk` FOREIGN KEY (`prog_id`) REFERENCES `programs` (`prog_id`);

--
-- Constraints for table `attachments`
--
ALTER TABLE `attachments`
  ADD CONSTRAINT `attachments_ibfk_1` FOREIGN KEY (`bug_id`) REFERENCES `bugtable` (`bug_id`);

--
-- Constraints for table `bugtable`
--
ALTER TABLE `bugtable`
  ADD CONSTRAINT `bugtable_ibfk_1` FOREIGN KEY (`prog_id`) REFERENCES `programs` (`prog_id`),
  ADD CONSTRAINT `bugtable_ibfk_3` FOREIGN KEY (`reported_by`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bugtable_ibfk_4` FOREIGN KEY (`resolved_by`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bugtable_ibfk_5` FOREIGN KEY (`tested_by`) REFERENCES `employees` (`emp_id`),
  ADD CONSTRAINT `bugtable_ibfk_6` FOREIGN KEY (`area_id`) REFERENCES `areas` (`area_id`),
  ADD CONSTRAINT `bugtable_ibfk_7` FOREIGN KEY (`assigned_to`) REFERENCES `employees` (`emp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
