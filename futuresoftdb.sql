-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 06:40 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `futuresoftdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `owned_license`
--

CREATE TABLE `owned_license` (
  `id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `purchase_date` varchar(50) NOT NULL,
  `expiration_date` varchar(50) NOT NULL,
  `machine_id` varchar(50) NOT NULL,
  `new_machine_id` varchar(50) NOT NULL,
  `license_code` varchar(50) NOT NULL,
  `software` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owned_license`
--

INSERT INTO `owned_license` (`id`, `user_id`, `purchase_date`, `expiration_date`, `machine_id`, `new_machine_id`, `license_code`, `software`) VALUES
(6, 4, '6/30/2019', '7/30/2019', 'TIMER2', 'TIMER2', 'II9B4AHK1Z6XS2YM', 'Scarlet Timer'),
(7, 4, '6/30/2019', '7/30/2019', 'TIMER2', 'TIMER2', 'H08K9K4HZNEM9QV6', 'Scarlet Timer'),
(8, 4, '6/30/2019', '7/30/2019', '', '', '3B5AWA4J4V0EH0Z9', 'Scarlet Timer'),
(9, 4, '7/1/2019', '8/1/2019', '', '', '3W4BULNBEH9KORQY', 'Scarlet Timer'),
(10, 4, '7/1/2019', '8/1/2019', '', '', '80V59LE51IM9HQNA', 'Scarlet Timer'),
(11, 4, '7/1/2019', '8/1/2019', '', '', 'SSDVHVJM87KYUYC7', 'Scarlet Timer'),
(12, 4, '7/6/2019', '8/6/2019', 'Browser', 'Browser', 'BOS05V0P7OYSDF4T', 'Scarlet Timer'),
(13, 4, '7/7/2019', '8/7/2019', '123', '123', '19RQHFLNWVVIYHOY', 'Scarlet Timer'),
(14, 5, '7/12/2019', '8/12/2019', 'TIMER2', 'TIMER2', 'G39WBX796NOJD1TZ', 'Scarlet Timer'),
(15, 5, '7/12/2019', '8/12/2019', '', '', 'G23D0AXCZRRJU1PO', 'Scarlet Timer'),
(16, 5, '7/12/2019', '8/12/2019', '', '', 'IWVIFZ68JEJ39A19', '1'),
(17, 5, '7/12/2019', '8/12/2019', 'Kholyn', '123', '2KQAQWWWY0XMKH9I', 'Scarlet Timer'),
(18, 5, '7/12/2019', '8/12/2019', '', '', 'R02PNAH491TLBDBX', 'Scarlet Timer'),
(19, 5, '7/12/2019', '8/12/2019', 'TIMER2', '', 'BT2I739ZLCU66ZVY', 'Scarlet Timer'),
(20, 4, '7/14/2019', '8/14/2019', '', '', 'M0EIFSEKGQ48CE7X', 'Scarlet Timer'),
(21, 4, '7/15/2019', '8/15/2019', '', '', 'Y308VAGTG9H6OCAQ', 'Scarlet Timer'),
(22, 4, '7/15/2019', '8/15/2019', '', '', 'FXF7IBMY3ODTGU6Y', 'Scarlet Timer'),
(23, 4, '7/15/2019', '8/15/2019', '', '', '864CMW45NJPRUKX0', 'Scarlet Timer');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `product_description` varchar(250) NOT NULL,
  `product_photo` varchar(250) NOT NULL,
  `product_price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `category`, `product_description`, `product_photo`, `product_price`) VALUES
(1, 'Scarlet Timer', '', 'License', 'NONE', 300),
(2, 'RAM', 'hardware', 'It is use for computer unit', 'photo.jpg', 1200),
(3, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(4, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(5, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(6, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(7, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(8, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(9, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(10, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(11, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(12, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(13, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(14, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(15, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(16, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(17, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500),
(18, 'CPU', 'hardware', 'its the central processing unit', 'photo.jpg', 500);

-- --------------------------------------------------------

--
-- Table structure for table `receive_deposit`
--

CREATE TABLE `receive_deposit` (
  `id` int(11) NOT NULL,
  `transcode` varchar(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receive_deposit`
--

INSERT INTO `receive_deposit` (`id`, `transcode`, `amount`, `user_id`, `fullname`, `time`, `date`) VALUES
(2, '12356', 2000, '4', 'FB', '09:22:55 AM', '7/6/2019');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `wallet_address` varchar(50) NOT NULL,
  `wallet_fund` int(20) NOT NULL,
  `wallet_earn` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `address`, `contact`, `email`, `password`, `wallet_address`, `wallet_fund`, `wallet_earn`) VALUES
(4, 'F', 'M', 'B', '6117', '09199693161', 'FMB@gmail.com', '123', '24873158', 84861, 346);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owned_license`
--
ALTER TABLE `owned_license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receive_deposit`
--
ALTER TABLE `receive_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owned_license`
--
ALTER TABLE `owned_license`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `receive_deposit`
--
ALTER TABLE `receive_deposit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
