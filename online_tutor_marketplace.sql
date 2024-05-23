-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_tutor_marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `tutor_id` int(11) NOT NULL,
  `booking_date` datetime DEFAULT current_timestamp(),
  `payment_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `student_id`, `tutor_id`, `booking_date`, `payment_status`) VALUES
(1, 7, 1, '2024-05-16 00:00:00', '3456789');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `lesson_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `date_Time` datetime DEFAULT current_timestamp(),
  `lesson_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`lesson_id`, `student_id`, `tutor_id`, `subject_id`, `duration`, `date_Time`, `lesson_status`) VALUES
(1, 6, 1, 1, '3hours', '2024-05-13 12:21:31', 'Was payed'),
(2, 7, 1, 8, '17hours', '2024-05-13 12:22:33', 'Well subscriptions');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `makeAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `user_id`, `message`, `makeAt`) VALUES
(1, 1, 'time is now ', '2024-05-18 22:54:27'),
(2, 4, 'Am sorry ', '2024-05-21 18:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `payment_date` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `makeAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `lesson_id`, `amount`, `payment_date`, `payment_method`, `makeAt`) VALUES
(1, 2, '1234555', '2024-05-13', 'MOM Pay', '2024-05-13 12:59:48'),
(2, 2, '1,00,000 rwf', '2024-05-23', 'MTN', '2024-05-21 17:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `commentAll` varchar(100) DEFAULT NULL,
  `dateView` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `tutor_id`, `student_id`, `commentAll`, `dateView`) VALUES
(1, 1, 7, 'so your performed well', '2024-05-13 14:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_type` varchar(100) NOT NULL,
  `makeAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `session_type`, `makeAt`) VALUES
(1, 1, 'Web Programming', '2024-05-18 23:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `grade_level` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `makeAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `grade_level`, `subject_id`, `makeAt`) VALUES
(6, 'Vestine', 'veve123@gmail.com', 'L4', 12, '2024-05-13 10:58:24'),
(7, 'Murazeyesu Jackson official', 'murazeyesujackson1@gmail.com', 'L2', 8, '2024-05-13 10:59:38'),
(8, 'Jackson Mura', 'emmy@gmail.com', 'L1 and L3', 10, '2024-05-14 12:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `makeAt` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `description`, `level`, `makeAt`) VALUES
(1, 'Web Programming', 'Gud subject in those time', 'advanced and Intermediate', '2024-05-09 21:48:31'),
(2, 'java Programming', 'lernmore', 'Intermediate', '2024-05-09 22:02:30'),
(6, 'FUNDAMENTAL ACCOUNTING', 'Gud subject in those Time', 'Advanced and Intermediate Course', '2024-05-10 18:44:44'),
(7, 'E-commerce', 'Gud subject in those time', 'Intermediate', '2024-05-10 18:46:28'),
(8, 'Java Programming', 'Functionality requirement', 'Advanced', '2024-05-11 22:38:03'),
(9, 'English', 'Functionality requirement more than 2hours to fix those subject', 'advanced', '2024-05-12 15:24:09'),
(10, 'Web technology', 'functionality requirement', 'advanced', '2024-05-12 21:10:36'),
(11, 'Business Subject', 'Enterprise', 'Advanced and Intermediate', '2024-05-13 08:58:09'),
(12, 'oop', 'interested', 'advanced', '2024-05-13 10:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

CREATE TABLE `tutors` (
  `tutor_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `hourly_rate` datetime NOT NULL,
  `availability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`tutor_id`, `name`, `description`, `subject_id`, `hourly_rate`, `availability`) VALUES
(1, 'Mathematic', 'how to solve mathematic all Question', 11, '2024-05-13 01:11:11', 'every day');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registrationDate` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `dob`, `email`, `username`, `password`, `registrationDate`) VALUES
(1, 'mura', 'Murazeyesu', '2006', 'murazeyesujackson1@gmail.com', 'jamura', '123456', '2024-05-15 11:22:25'),
(2, 'Murazeyesu', 'Jackson', '2001', 'murazeyesujackson8@gmail.com', 'jamura', '12345', '2024-05-15 11:26:28'),
(4, 'Kwizera', 'bonheur', '2002', 'murazeyesujackson2@gmail.com', 'Jamura', '123455', '2024-05-15 11:45:18'),
(5, 'Murazeyesu', 'bonheur', '1999', 'vese@gmail.com', 'Jamura1', '$2y$10$DPrGnRjLLa1.rXn77/KSge09QDWzBx27Ss2RSN9sbtpMG2K1MjUYS', '2024-05-22 09:42:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`lesson_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tutors`
--
ALTER TABLE `tutors`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `lesson_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tutors`
--
ALTER TABLE `tutors`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`);

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`),
  ADD CONSTRAINT `lessons_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`lesson_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutors` (`tutor_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `tutors`
--
ALTER TABLE `tutors`
  ADD CONSTRAINT `tutors_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
