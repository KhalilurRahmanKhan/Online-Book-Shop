-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 01:39 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_book_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `join_time`) VALUES
(1, 'admin', 'admin', '2020-12-23 16:23:27');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `publishing_year` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `category_id`, `book_name`, `image`, `author`, `publishing_year`, `price`, `quantity`, `title`, `description`, `status`) VALUES
(30, 24, 'Snake Of Fortune', '1_no4pKR0.jpg', 'Alexandra', 2010, 100, 10, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(31, 22, 'Raven Of Greatness', '550-2EXfVq1535745486.jpg', 'Bernadette', 2011, 200, 5, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(32, 23, 'Spider Without Glory', '2017_06_20_00_03_14_87b6c6e0-93f5-41eb-ae68-7dc1aed816d8_bookleftalign.png', 'Elizabeth', 2012, 200, 10, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(33, 21, 'Thieves With Strength', 'a4aac1f3d86869bcfd2833e8be768014.jpg', 'Jennifer', 2013, 100, 3, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(34, 25, 'Bandits Of Dusk', 'action-thriller-book-cover-design-template-3675ae3e3ac7ee095fc793ab61b812cc_screen.jpg', 'Jonathan', 2014, 200, 10, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(35, 24, 'Traitors And Lions', 'bbcjuly19verynice.jpg', 'Bernadette', 2014, 100, 5, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(36, 23, 'Girls And Officers', 'contemporary-fiction-night-time-book-cover-design-template-1be47835c3058eb42211574e0c4ed8bf_screen.jpg', 'Jennifer', 2010, 100, 2, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1),
(37, 25, 'Hope Of Stone', 'design-for-writers-book-cover-tf-2-a-million-to-one.jpg', 'Jonathan', 2012, 500, 0, 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_order`
--

CREATE TABLE `book_order` (
  `order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_order`
--

INSERT INTO `book_order` (`order_id`, `user_id`, `book_id`, `category_id`, `quantity`, `name`, `address`, `phone`, `email`, `status`, `time`) VALUES
(450, 4, 37, 25, 1, 'name', 'address', 123456666, 'user@test.com', 1, '2021-01-17 11:17:57'),
(451, 4, 33, 21, 2, 'name', 'address', 123456666, 'user@test.com', 1, '2021-01-17 11:21:21'),
(452, 4, 36, 0, 1, 'name', 'address', 1234567, 'user@test.com', 1, '2021-01-17 11:21:22'),
(453, 4, 37, 0, 1, 'name', 'address', 1234567, 'user@test.com', 1, '2021-01-17 11:21:22'),
(454, 4, 37, 25, 2, 'name', 'address', 1234567, 'user@test.com', 1, '2021-01-17 11:21:23'),
(455, 4, 37, 25, 1, 'name', 'address', 1234567, 'user@test.com', 1, '2021-01-17 11:21:24'),
(456, 4, 36, 23, 2, 'name', 'address', 1234567, 'user@test.com', 0, '2021-01-17 11:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_order_bkash`
--

CREATE TABLE `book_order_bkash` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bkash_num` int(255) NOT NULL,
  `tran_id` int(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_order_bkash`
--

INSERT INTO `book_order_bkash` (`id`, `user_id`, `book_id`, `category_id`, `quantity`, `name`, `address`, `phone`, `email`, `bkash_num`, `tran_id`, `status`, `time`) VALUES
(5, 4, 35, 24, 1, 'name', 'address', 1234567, 'user@test.com', 1234567, 123456, 0, '2021-01-17 08:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `status`) VALUES
(21, 'Horror', 1),
(22, 'Comedy', 1),
(23, 'Historical', 1),
(24, 'Adventure', 1),
(25, 'Science', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `comment`, `time`) VALUES
(3, 'name', 'user@test.com', 1234567, 'comment', '2021-01-17 08:13:14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `join_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `email`, `phone`, `password`, `join_time`) VALUES
(4, 'user', 'user@test.com', 1234567, 'user', '');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `book_id` int(255) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlist_id`, `user_id`, `book_id`, `book_name`, `image`, `price`) VALUES
(26, 4, 36, 'Girls And Officers', 'contemporary-fiction-night-time-book-cover-design-template-1be47835c3058eb42211574e0c4ed8bf_screen.jpg', 100),
(27, 4, 35, 'Traitors And Lions', 'bbcjuly19verynice.jpg', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_order`
--
ALTER TABLE `book_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `book_order_bkash`
--
ALTER TABLE `book_order_bkash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `book_order`
--
ALTER TABLE `book_order`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;

--
-- AUTO_INCREMENT for table `book_order_bkash`
--
ALTER TABLE `book_order_bkash`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
