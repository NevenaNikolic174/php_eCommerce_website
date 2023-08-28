-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 02:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webio-sajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `name`, `comment`, `created_at`) VALUES
(84, 0, 37, 'asd', 'dfg', '2023-06-03 01:25:40'),
(85, 0, 37, 'Mika', 'sdf', '2023-06-03 01:26:48'),
(86, 0, 37, 'asd', 'asd', '2023-06-03 01:57:06'),
(87, 0, 38, 'Lol', 'Ajde i ovde neki kom', '2023-06-03 01:58:45'),
(88, 0, 38, 'Mika', 'asd', '2023-06-03 02:12:16'),
(89, 0, 38, 'Username', 'Hehe', '2023-06-03 11:52:30'),
(90, 0, 38, 'Test', 'moj komentar', '2023-06-03 22:11:28'),
(91, 0, 38, 'test', 'asdsadas', '2023-06-06 14:10:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `userEmail` varchar(100) NOT NULL,
  `subject` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `userEmail`, `subject`) VALUES
(8, NULL, 'Pitanje kao guest', 'Neko pitanje... ?'),
(9, 100, 'Pitanje kao test korisnik', 'Drugo pitanje... ?'),
(18, NULL, 'neki naslov', 'bla bla'),
(19, NULL, 'neki naslov opet', 'userski odg'),
(20, 105, 'aj opet', 'aksdflksflsdf'),
(21, NULL, 'Naslov', 'lalala'),
(22, 125, 'asd@gmail.com', 'asd'),
(23, 125, 'asd@gmail.com', 'sdfsdfsdf'),
(24, 125, 'asd@gmail.com', 'asd'),
(25, 125, 'asd@gmail.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE `galerija` (
  `id` int(11) NOT NULL,
  `putanja` text NOT NULL,
  `alt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id`, `putanja`, `alt`) VALUES
(1, 'event.jpg', 'Event Website'),
(2, 'commerc.jpg', 'eCommerce Website'),
(3, 'business.jpg', 'Business Website'),
(4, 'personal.jpg', 'Personal Website');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(87, 1, 38);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `attempts` int(11) DEFAULT 0,
  `last_attempt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navigations`
--

CREATE TABLE `navigations` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `href` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `navigations`
--

INSERT INTO `navigations` (`id`, `title`, `href`) VALUES
(10, 'Home', 'index'),
(11, 'Contact', 'contact'),
(12, 'More', 'more'),
(13, 'Gallery', 'gallery'),
(14, 'Author', 'author');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `likes` int(11) DEFAULT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `content`, `likes`, `published`, `created_at`) VALUES
(38, 115, 25, 'Personal post', '1685714256_246903554_4966271533400266_7938359866200936132_n.jpg', 'fgh', 9, 1, '2023-06-02 15:57:36');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `id` int(11) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`id`, `answer`) VALUES
(1, 'Very good'),
(2, 'Good'),
(3, 'Mediocre'),
(4, 'Bad'),
(5, 'Very bad');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(24, 'Event', '123'),
(25, 'Personal', 'sdf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `failed_login_attempts` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `locked` tinyint(1) NOT NULL DEFAULT 0,
  `last_failed_login` datetime DEFAULT NULL,
  `lock_reset_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `email`, `password`, `failed_login_attempts`, `created_at`, `locked`, `last_failed_login`, `lock_reset_time`) VALUES
(115, 1, 'admin', 'admin@gmail.com', '$2y$10$s29Cd6EfW1TdEomhxIhRceY.awblX8XNhyuE1ORV4KXVgOEG9S0AK', 5, '2023-06-01 23:20:53', 0, NULL, '2023-06-06 01:34:27'),
(125, 0, 'test', 'test@gmail.com', '$2y$10$j7NHEn/UEZCIroXoEZYGheTbhtapaqb7kWY6D8FvGVzynbn0/h4o6', 1, '2023-06-02 13:39:53', 1, NULL, '2023-06-06 21:24:07'),
(129, 0, 'novi', 'novi@gmail.com', '$2y$10$frnKtJUay0dTxcvWtUV5OutDFfOCEsxhU/uuW3EetEahesMqFTgm2', 0, '2023-06-06 11:57:31', 0, NULL, NULL),
(130, 0, 'korisnik', 'korisnik@gmail.com', '$2y$10$vweMaqf73pYzg1st6YTzPuFIOWLTOtJbqOjlE4o3qDgGoqJBR1Mg2', 0, '2023-06-06 19:16:41', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_posts`
--

CREATE TABLE `users_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_posts`
--

INSERT INTO `users_posts` (`id`, `user_id`, `post_id`, `comment`) VALUES
(187, 118, 38, NULL),
(188, 118, 37, NULL),
(194, NULL, 37, NULL),
(195, NULL, 38, NULL),
(196, NULL, 38, NULL),
(197, NULL, 37, NULL),
(198, NULL, 37, 'fgh'),
(199, 125, 37, 'neki komentar'),
(200, 125, 38, 'asd'),
(201, 125, 37, 'sdf'),
(202, 125, 37, 'dgh');

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

CREATE TABLE `user_answer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user_answer`
--

INSERT INTO `user_answer` (`id`, `user_id`, `answer_id`) VALUES
(6, 100, 3),
(7, 100, 5),
(8, 100, 5),
(9, 100, 1),
(10, 100, 4),
(11, 100, 3),
(12, 100, 1),
(13, 125, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `navigations`
--
ALTER TABLE `navigations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_posts`
--
ALTER TABLE `users_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_answer`
--
ALTER TABLE `user_answer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `navigations`
--
ALTER TABLE `navigations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `users_posts`
--
ALTER TABLE `users_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `user_answer`
--
ALTER TABLE `user_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
