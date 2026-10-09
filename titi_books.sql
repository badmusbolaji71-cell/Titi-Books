-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2026 at 05:35 PM
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
-- Database: `titi books`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_sign_upp`
--

CREATE TABLE `admin_sign_upp` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_sign_upp`
--

INSERT INTO `admin_sign_upp` (`id`, `email`, `password`) VALUES
(1, 'bolajibooks@yahoo.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `pictute` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date_of_release` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `pictute`, `title`, `author`, `category`, `price`, `quantity`, `date_of_release`) VALUES
(13, 'b971537b816545ecc9391b811081773c.jpg', 'My story', 'Ezekiel Ada', 'Drama', '309', '23', '1998-06-09'),
(14, 'IMG-20260201-WA0182.jpg', 'Warrior', 'Adesina Yusroh', 'Prose', '67', '89', '2012-08-18'),
(17, 'IMG-20260415-WA0003.jpg', 'HOME', 'Asake Azeez', 'prose', '20', '21', '1996-06-13'),
(18, 'Annotation 2026-04-15 075833.png', 'Delight', 'Azin Shigah', 'drama', '590', '24', '2019-02-06'),
(19, 'Annotation 2026-04-15 075725.png', 'The cook of the house', 'Adesina Aduni', 'drama', '45', '60', '2013-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `pictute` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `date_of_release` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sign_up`
--

CREATE TABLE `user_sign_up` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_sign_up`
--

INSERT INTO `user_sign_up` (`id`, `name`, `email`, `password`) VALUES
(1, 'Badmus', 'shade@gmail.com', '22'),
(2, 'Badmus Shakirullaah', 'ekgfhk@gmail', '22'),
(3, 'Adeleke kelil', 'ade@gmail.com', 'ade'),
(4, 'khalid ozein', 'khalid@gmail.com', 'khalid'),
(5, 'toyyibah', 'toyyibah@gmail.com', 'keji'),
(6, 'Badmus Tomiwa', 'tommy@gmail.com', 'tommy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_sign_upp`
--
ALTER TABLE `admin_sign_upp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sign_up`
--
ALTER TABLE `user_sign_up`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_sign_upp`
--
ALTER TABLE `admin_sign_upp`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sign_up`
--
ALTER TABLE `user_sign_up`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
