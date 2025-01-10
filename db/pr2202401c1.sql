-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 08:37 AM
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
-- Database: `pr2202401c1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(1, 'footwear fashions', 'download (19).jpg'),
(2, 'bags', 'download (14).jpg'),
(3, 'abbayas', 'images.jpg'),
(4, 'watches', 'download.jpg'),
(5, 'women fashions', 'EMLNET-1_0026_AKS04329_360x.webp'),
(6, 'men fashions', 'cap_1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoiceId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `totalProductQuantity` int(11) NOT NULL,
  `itemCount` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `invoiceDate` date NOT NULL,
  `invoiceTime` time NOT NULL,
  `userPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`invoiceId`, `userName`, `userEmail`, `totalProductQuantity`, `itemCount`, `subtotal`, `invoiceDate`, `invoiceTime`, `userPhone`) VALUES
(1, 'fariha', 'fareehajabeen62@gmail.com', 3, 2, 12000, '2025-01-10', '12:31:06', '03052563576');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPhone` varchar(15) NOT NULL,
  `userAddress` varchar(200) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productTotal` int(11) NOT NULL,
  `productImage` varchar(200) NOT NULL,
  `orderDate` date NOT NULL,
  `orderTime` time NOT NULL,
  `orderStatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `userEmail`, `userPhone`, `userAddress`, `userName`, `productName`, `productPrice`, `productQuantity`, `productTotal`, `productImage`, `orderDate`, `orderTime`, `orderStatus`) VALUES
(1, 1, 'fareehajabeen62@gmail.com', '03052563576', 'karachi\r\n', 'fariha', 'nike shoes', 5000, 1, 5000, 'download (15).jpg', '2025-01-10', '12:31:06', 'pending'),
(2, 1, 'fareehajabeen62@gmail.com', '03052563576', 'karachi\r\n', 'fariha', 'time check watch', 3500, 2, 7000, 'download (1).jpg', '2025-01-10', '12:31:06', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productQuantity` int(11) NOT NULL,
  `productImage` varchar(150) NOT NULL,
  `productDesciption` varchar(200) NOT NULL,
  `productCatId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `productName`, `productPrice`, `productQuantity`, `productImage`, `productDesciption`, `productCatId`) VALUES
(4, 'time check watch', 3500, 5, 'download (1).jpg', 'ghfhrtyirioior', 4),
(5, 'nike shoes', 5000, 5, 'download (15).jpg', 'dfgvdhrfutyut7i7u', 1),
(6, 'women footwear fashion', 5550, 8, 'download (18).jpg', 'FGYJGHGUJTYU', 1),
(7, 'slik abbaya', 12000, 9, 'download (8).jpg', 'gtyhtujhyty', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL,
  `user_phone` varchar(11) NOT NULL,
  `user_role_type` varchar(30) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_phone`, `user_role_type`) VALUES
(1, 'fariha', 'fareehajabeen62@gmail.com', '$2y$10$hJlmcXUohIhtHiTciWQhO.RgJpBOgzX7eNGwK63zyzhqO3xniBlYu', '03052563576', 'user'),
(2, 'ADMIN', 'admin@gmail.com', '$2y$10$ssHaVLLjyjtR9T0k5SgKKO6vqgZrw7xTn2UhKQf/Mns3tsSbJtiqS', '03152545748', 'admin'),
(3, 'kinza', 'kinza@gmail.cm', '$2y$10$ezy5rdMLiJKTfmiSOrFUquIGjgr.w1P1wvpmXlYCDdUlJ6n4yiaru', '03154748946', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productCatId` (`productCatId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoiceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`productCatId`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
