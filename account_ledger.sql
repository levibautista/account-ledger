-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 20, 2022 at 01:59 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `al_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_ledger`
--

CREATE TABLE `account_ledger` (
  `id` int(11) NOT NULL,
  `details` varchar(250) DEFAULT NULL,
  `reference` varchar(150) DEFAULT NULL,
  `debit` float DEFAULT NULL,
  `credit` float DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account_ledger`
--

INSERT INTO `account_ledger` (`id`, `details`, `reference`, `debit`, `credit`, `created_date`) VALUES
(1, 'Cash Deposit', 'J12345', 2000, 0, '2022-02-20 00:40:43'),
(2, 'Cash Deposit', 'J1111', 1550, 0, '2022-02-20 00:41:00'),
(3, 'Cash Payment', 'A123123', 0, 750, '2022-02-20 00:41:31'),
(4, 'Cash Payment', 'T11111', 100, 0, '2022-02-20 01:06:20'),
(5, 'Cash Deposit', 'J2222', 300, 0, '2022-02-20 01:07:07'),
(6, 'Payment', 'R1111', 0, 150, '2022-02-20 01:10:09'),
(7, 'Cash Deposit', 'J1222', 500, 0, '2022-02-20 01:10:54'),
(8, 'Cash Deposit', 'J11223', 3000, 0, '2022-02-20 01:13:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_ledger`
--
ALTER TABLE `account_ledger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_ledger`
--
ALTER TABLE `account_ledger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
