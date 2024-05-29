-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2021 at 11:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codextime_dompdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `address`) VALUES
(9, 'Akansha singh', 'akanshak@gmail.com', '4444334343', 'Delhi'),
(10, 'Ashok Kumar singh', 'ashoksingh@gmail.com', '5985485955', 'Gujrata'),
(11, 'Priya Singh', 'priya@gmail.com', '1231231231', 'Lucknow'),
(12, 'Anita singh', 'anitakumari@gmail.com', '3211232425', 'Mumbai'),
(13, 'Rahul Kumar', 'rahulkumar@gmail.com', '9889808808', 'Kolkata'),
(14, 'Alok Kumar', 'alok@gmail.com', '3453453453', 'Mumbai, maharashtara'),
(16, 'Arvind Kumar', 'arvindKumar@gmail.com', '3234242342', 'Ahuja nagar Delhi'),
(17, 'abhishek Bacchan', 'amithabhg@gmail.com', '1090000000', 'Mumbai, maharashtara');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
