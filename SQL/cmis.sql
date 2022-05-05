-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2020 at 10:38 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `id` int(50) NOT NULL,
  `contract_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `bid_number` varchar(50) COLLATE utf8_bin NOT NULL,
  `category` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_by` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_by_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `owner` varchar(70) COLLATE utf8_bin NOT NULL,
  `location` text COLLATE utf8_bin NOT NULL,
  `bid_amount` varchar(50) COLLATE utf8_bin NOT NULL,
  `bid_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_time` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_status` varchar(70) COLLATE utf8_bin NOT NULL,
  `approval_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `billing_cycle` varchar(70) COLLATE utf8_bin NOT NULL,
  `contract_status` varchar(20) COLLATE utf8_bin NOT NULL,
  `start_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `end_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `has_finished` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`id`, `contract_title`, `bid_number`, `category`, `bid_by`, `bid_by_email`, `owner`, `location`, `bid_amount`, `bid_date`, `bid_time`, `bid_status`, `approval_date`, `billing_cycle`, `contract_status`, `start_date`, `end_date`, `has_finished`) VALUES
(1, 'Test edited', 'PCL0001CV', 'Electrical', 'kelvin elenwo', 'kelenwo68@gmail.com', 'uniuyo', 'University of  uyo, uyo', '250,000', '09-09-2020', '1599647987', 'approved', '14-Sep-2020', 'One time', 'active', '2020-09-18', '2021-01-06', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(50) NOT NULL,
  `name` varchar(70) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `subject` varchar(100) COLLATE utf8_bin NOT NULL,
  `message` text COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `date`) VALUES
(1, 'Joseph Caroline', 'carolynjoe9@gmail.com', 'helleko', 'hjkhkhk', '16 September, 2020');

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(50) NOT NULL,
  `contract_owner` varchar(250) COLLATE utf8_bin NOT NULL,
  `owner_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `contract_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `contract_number` varchar(70) COLLATE utf8_bin NOT NULL,
  `category` varchar(70) COLLATE utf8_bin NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `start_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `end_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `billing_amount` varchar(20) COLLATE utf8_bin NOT NULL,
  `billing_cycle` varchar(70) COLLATE utf8_bin NOT NULL,
  `first_billing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `last_billing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `has_renewal` varchar(20) COLLATE utf8_bin NOT NULL,
  `renewal_period` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `owner` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_owner`, `owner_email`, `contract_title`, `contract_number`, `category`, `status`, `start_date`, `end_date`, `billing_amount`, `billing_cycle`, `first_billing_date`, `last_billing_date`, `description`, `has_renewal`, `renewal_period`, `date`, `owner`) VALUES
(4, 'kelvin elenwo', 'kelenwo68@gmail.com', 'Test edited', 'PCL0001CV', 'Electrical', 'completed', '2020-09-18', '2021-01-06', '250,000', 'One time', '2020-10-08', '2020-09-08', 'Sample description', '', '', '14 Sep 2020', 'ePROCLOUD');

-- --------------------------------------------------------

--
-- Table structure for table `contract_bidding`
--

CREATE TABLE `contract_bidding` (
  `id` int(20) NOT NULL,
  `contract_title` varchar(250) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `bid_opening_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_closing_date` varchar(70) COLLATE utf8_bin NOT NULL,
  `category` varchar(70) COLLATE utf8_bin NOT NULL,
  `location` varchar(70) COLLATE utf8_bin NOT NULL,
  `bid_number` varchar(70) COLLATE utf8_bin NOT NULL,
  `owner` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `contract_bidding`
--

INSERT INTO `contract_bidding` (`id`, `contract_title`, `description`, `bid_opening_date`, `bid_closing_date`, `category`, `location`, `bid_number`, `owner`, `date`) VALUES
(1, 'Test edited', 'sample description', '2020-09-01', '2020-09-16', 'Civil Works', 'University of  uyo, uyo', 'PCL0001CV', 'uniuyo', '03-Sep-2020'),
(2, 'Test 1 ', 'Sample', '2020-09-02', '2020-09-02', 'civil', 'University of  uyo', 'PCL002CB', 'uniuyo', '04-Sep-2020');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(20) NOT NULL,
  `owner` varchar(250) COLLATE utf8_bin NOT NULL,
  `owner_email` varchar(250) COLLATE utf8_bin NOT NULL,
  `event_title` varchar(70) COLLATE utf8_bin NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `type` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(20) NOT NULL,
  `title` varchar(250) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `status`, `date`) VALUES
(1, 'Call for articles', 'We hereby request you start submitting your aticles. edited', 'Active', '19-Jul-2020');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `phone` varchar(70) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `marital_status` varchar(20) COLLATE utf8_bin NOT NULL,
  `religion` varchar(70) COLLATE utf8_bin NOT NULL,
  `account_state` varchar(20) COLLATE utf8_bin NOT NULL,
  `rights` varchar(70) COLLATE utf8_bin NOT NULL,
  `password` varchar(250) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `auth` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `marital_status`, `religion`, `account_state`, `rights`, `password`, `date`, `auth`) VALUES
(1, 'kelvin elenwo', '08161718348', 'kelenwo68@gmail.com', 'single', 'christianity', 'subscriber', 'administrator', '$2y$10$fyMtBy6GxeU0sDxpUN2peO3RYLL5JDoBkvIYHSRdLb/huFJNncaP6', '07-Sep-2020', '$2y$10$tfeH.TIgmF/3zq5tOV68qu.3eyF23HcQ2u4p0dbGl2F20NCGWF30.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_bidding`
--
ALTER TABLE `contract_bidding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `contract_bidding`
--
ALTER TABLE `contract_bidding`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
