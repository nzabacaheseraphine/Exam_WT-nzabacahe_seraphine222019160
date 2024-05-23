-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 06:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virtual_graphic_design_workshop_platforms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `attendance_id` int(11) NOT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attendance_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`attendance_id`, `workshop_id`, `user_id`, `attendance_date`) VALUES
(6, 2, 3, '2024-05-20'),
(7, 3, 4, '2024-07-15'),
(8, 4, 2, '2024-08-05');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `title`, `description`, `instructor_id`, `start_date`, `end_date`, `price`) VALUES
(1, 'Rwandan History', 'Explore the rich history of Rwanda', 1, '2024-06-01', '2024-07-15', 49.99),
(2, 'Kinyarwanda Language Basics', 'Learn the fundamentals of the Kinyarwanda language', 2, '2024-05-20', '2024-06-30', 29.99),
(3, 'Leadership Development', 'Develop leadership skills for personal and professional growth', 3, '2024-07-10', '2024-08-25', 99.99),
(4, 'Cybersecurity Essentials', 'Master the essentials of cybersecurity for a safer digital world', 4, '2024-06-15', '2024-08-10', 79.99);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `enrollment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollment_id`, `user_id`, `course_id`, `enrollment_date`) VALUES
(1, 2, 1, '2024-06-02'),
(2, 3, 2, '2024-05-21'),
(3, 4, 3, '2024-07-12'),
(4, 1, 4, '2024-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `graphicdesignresources`
--

CREATE TABLE `graphicdesignresources` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upload_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `graphicdesignresources`
--

INSERT INTO `graphicdesignresources` (`resource_id`, `title`, `description`, `upload_date`) VALUES
(1, 'Introduction to Typography', 'A beginner\'s guide to typography principles', '2024-05-18'),
(3, 'Logo Design Techniques', 'Learn how to design impactful logos', '2024-07-05'),
(4, 'Photoshop Essentials', 'Essential tips and tricks for mastering Photoshop', '2024-08-10'),
(5, 'gra', 'rseources', '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `instructor_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `expertise` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`instructor_id`, `user_id`, `bio`, `expertise`) VALUES
(1, 1, 'Current student in  Rwanda', 'Leadership, Governance'),
(2, 2, 'Language enthusiast promoting Kinyarwanda', 'Kinyarwanda, Linguistics'),
(3, 3, 'Advocate for human rights and social justice', 'Activism, Advocacy'),
(4, 4, 'student', 'IT, Strategy WEB TECH');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message_content` text DEFAULT NULL,
  `send_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `message_content`, `send_datetime`) VALUES
(1, 2, 1, 'Mr. student, I admire your leadership.', '2024-06-10 12:20:00'),
(2, 3, 4, ',we need to discuss security concerns.', '2024-07-20 09:10:00'),
(3, 1, 2, 'Thank you for promoting our language.', '2024-06-25 14:30:00'),
(4, 4, 3, 'welldone', '2024-08-01 07:00:00'),
(5, 3, 5, 'hello', '2024-05-17 14:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `user_id`, `message`, `timestamp`) VALUES
(1, 2, 'Your enrollment in the Leadership Development course has been confirmed.', '2024-07-12 08:30:00'),
(2, 1, 'New assignment added: Reflect on Rwanda\'s journey to reconciliation.', '2024-06-05 13:45:00'),
(3, 3, 'Reminder: Kinyarwanda Language Basics course starts tomorrow.', '2024-05-19 07:00:00'),
(4, 4, 'Your submission for the Cybersecurity Essentials course has been graded.', '2024-08-05 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submission_id` int(11) NOT NULL,
  `assignment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `grade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submission_id`, `assignment_id`, `user_id`, `grade`) VALUES
(1, 1, 2, 85.50),
(2, 2, 3, 78.00),
(3, 3, 4, 90.25),
(4, 4, 1, 95.75),
(5, 2, 4, 45.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `role`) VALUES
(1, 'gisa', '2024', 'Paul', 'gisa', 'gisa@gmail.com', 'student'),
(2, 'umunyarwanda', '123', 'Umugabo', 'Umunyarwanda', 'umunyarwanda@gmail.com', 'citizen'),
(3, 'ingabire', 'ingabirepass', 'ngabire', 'nadia', 'nadia@gmail.com', 'student'),
(4, 'seraphine', 'sera', 'nzabacahe', 'sera', 'sera@gmail.com', 'student'),
(5, 'era', '123', 'era', 'sera', 'sera@gmail.com', 'student'),
(6, 'aniel', '123', 'habiri', 'danie ', 'habiyare2021@gmail.com', 'admin'),
(7, 'Pierre', '1234', 'pio', 'yera', 'chris@gmail.com', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `workshop_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`workshop_id`, `title`, `start_date`, `end_date`) VALUES
(1, 'Introduction to Photography', '2024-07-10 09:00:00', '2024-07-10 16:00:00'),
(2, 'Digital Marketing Strategies', '2024-05-25 10:00:00', '2024-05-25 18:00:00'),
(3, 'Design Workshop', '2024-07-15 10:00:00', '2024-07-16 17:00:00'),
(4, 'Creative Writing Seminar', '2024-08-05 13:00:00', '2024-08-05 17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `workshop_id` (`workshop_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `graphicdesignresources`
--
ALTER TABLE `graphicdesignresources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`instructor_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submission_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`workshop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `graphicdesignresources`
--
ALTER TABLE `graphicdesignresources`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `workshops`
--
ALTER TABLE `workshops`
  MODIFY `workshop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_ibfk_1` FOREIGN KEY (`workshop_id`) REFERENCES `workshops` (`workshop_id`),
  ADD CONSTRAINT `attendances_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
