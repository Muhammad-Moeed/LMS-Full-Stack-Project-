-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 11:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `join_checking`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `Course_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `Course_name`) VALUES
(1, 'fullstack'),
(2, 'next_js'),
(3, 'react_js'),
(4, 'mobile_app'),
(5, 'web_development'),
(7, 'python programming');

-- --------------------------------------------------------

--
-- Table structure for table `forget_password`
--

CREATE TABLE `forget_password` (
  `id` int(11) NOT NULL,
  `Code` varchar(250) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forget_password`
--

INSERT INTO `forget_password` (`id`, `Code`, `Email`) VALUES
(22, '5188589', 'nazsaira950@gmail.com'),
(23, '8968722', 'nazsaira950@gmail.com'),
(24, '3152159', 'nazsaira950@gmail.com'),
(25, '741134', 'nazsaira950@gmail.com'),
(26, '6404336', 'nazsaira950@gmail.com'),
(27, '6979553', 'nazsaira950@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `CNIC` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'unverified',
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `CNIC`, `address`, `age`, `gender`, `role`, `status`, `date`, `course_id`) VALUES
(15, 'asad', 'asad@gmail.com', '5656', '1232353', 'saddar', 15, 'male', 'student', 'verified', '2024-06-23 18:50:47', 3),
(24, 'aryan', 'aryan@gmail.com', '1414', '122', 'karachi', 22, 'male', 'student', 'verified', '2024-06-23 19:42:11', 4),
(30, 'moeed', 'm.moeedq497@gmail.com', '456', '122125', 'nazimabad', 16, 'male', 'student', 'verified', '2024-06-24 21:42:42', 4),
(37, 'farhan', 'farhan@gmail.com', '1133', '00989898', 'pak colony', 21, 'Male', 'student', 'unverified', '2024-06-24 19:31:19', 7),
(38, 'areeb', 'areeb@gmail.com', '4747', '465662565', 'sakhi hassan', 18, 'male', 'student', 'verified', '2024-06-24 19:35:12', 7),
(39, 'yaseen', 'yaseen@gmail.com', '3333', '1212323', 'nagan chorangi', 17, 'Male', 'student', 'unverified', '2024-06-24 19:36:32', 3),
(41, 'amin', 'amin@gmail.com', '565', '1253556', 'new karachi', 20, 'Male', 'student', 'unverified', '2024-06-24 21:27:36', 1),
(42, 'furqan', 'furqan@gmail.com', '1414', '12556', 'johar', 19, 'male', 'stuenet', 'verified', '2024-06-24 19:45:09', 7),
(43, 'Qadri', 'qadri@gmail.com', '7459', '00989898', 'nagan chorangi', 20, 'Male', 'student', 'unverified', '2024-06-24 21:42:48', 1),
(44, 'farzeel', 'farzeel@gmail.com', '145', '223233', 'karachi', 20, 'Male', 'student', 'unverified', '2024-06-24 21:26:39', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `CNIC` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `CNIC`, `address`, `age`, `gender`, `role`, `date`) VALUES
(1, 'sir talib', 'talib@gmail.com', '123456789', '12304589632', 'sindh', 30, 'Male', 'Teacher', '2024-05-02 06:03:00'),
(2, 'fahad', 'fahad@gmail.com', '4444', '323232', 'malir halt', 20, 'Male', 'Teacher', '2024-06-23 19:45:00'),
(3, 'ejaz', 'ejaz@gmail.com', '123', '12233', 'karachi', NULL, 'male', 'Teacher', '2024-06-23 20:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `video_lectures`
--

CREATE TABLE `video_lectures` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `Videos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video_lectures`
--

INSERT INTO `video_lectures` (`id`, `Name`, `description`, `course_id`, `Videos`) VALUES
(35, 'what is fullstack', 'full stack decelopment', 1, 'What is Full Stack Web Development.mp4'),
(36, 'fullstack', 'full stack development', 1, 'What is Full Stack Web Development.mp4'),
(37, 'python', 'python programming', 7, 'What is Python_ Why Python is So Popular_.mp4'),
(38, 'php in 100 seconds', 'php ', 1, 'PHP in 100 Seconds.mp4'),
(39, 'java srcipt in 100 second', 'mobile app development', 4, 'JavaScript in 100 Seconds.mp4'),
(40, 'next 14 crash', 'next js', 2, 'Next 14 Crash Course #1 - Introduction.mp4'),
(41, 'python in 100 second', 'python programming', 7, 'Python in 100 Seconds.mp4'),
(42, 'what is react', 'react js', 3, 'What is React.mp4'),
(43, 'react in 100 second', 'react js', 3, 'React in 100 Seconds.mp4'),
(44, 'css in 100 second', 'web development', 5, 'CSS in 100 Seconds.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forget_password`
--
ALTER TABLE `forget_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `video_lectures`
--
ALTER TABLE `video_lectures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign Key` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forget_password`
--
ALTER TABLE `forget_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `video_lectures`
--
ALTER TABLE `video_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);

--
-- Constraints for table `video_lectures`
--
ALTER TABLE `video_lectures`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
