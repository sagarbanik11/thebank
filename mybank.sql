-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 03, 2020 at 08:07 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13141944_mybank`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `t_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accHolder` varchar(100) NOT NULL,
  `date` varchar(25) NOT NULL,
  `title` varchar(100) NOT NULL,
  `desc` varchar(250) NOT NULL,
  `dr` double NOT NULL DEFAULT 0,
  `cr` double NOT NULL,
  `accNo` varchar(25) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`t_id`, `user_id`, `accHolder`, `date`, `title`, `desc`, `dr`, `cr`, `accNo`, `timestamp`) VALUES
(65, 80, 'Sagar Banik', '2018-07-12', 'SAVINGS', 'New Account', 0, 55167350, '180712082008', '2020-04-03 18:56:47'),
(66, 81, 'Showgata Chakraborty', '2018-07-12', 'SAVINGS', 'New Account', 0, 6566500, '180712082106', '2020-04-03 18:56:27'),
(67, 82, 'Sumit Banik', '2018-07-12', 'SAVINGS', 'New Account', 0, 9600000, '180712082620', '2018-07-12 18:26:28'),
(68, 83, 'Prasanjit Dey', '2018-07-12', 'SAVINGS', 'New Account', 0, 65650000, '180712082720', '2018-07-12 18:28:40'),
(69, 85, 'Kakoli Bhadra', '2020-04-03', 'SAVINGS', 'New Account', 0, 15357, '200403074321', '2020-04-03 19:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `statements`
--

CREATE TABLE `statements` (
  `t_id` int(15) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `descr` varchar(250) NOT NULL,
  `ref_no` varchar(100) NOT NULL DEFAULT '0',
  `dr` double NOT NULL DEFAULT 0,
  `cr` double NOT NULL DEFAULT 0,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statements`
--

INSERT INTO `statements` (`t_id`, `user_id`, `date`, `descr`, `ref_no`, `dr`, `cr`, `balance`) VALUES
(78, '80', '2018-07-12', 'Opening Balance', '', 0, 55000000, 55000000),
(79, '81', '2018-07-12', 'Opening Balance', '', 0, 6500000, 6500000),
(80, '82', '2018-07-12', 'Opening Balance', '', 0, 9600000, 9600000),
(81, '83', '2018-07-12', 'Opening Balance', '', 0, 65000000, 65000000),
(82, '80', '2018-07-12', 'Transfer', 'TRANSFER TO 180712082106', 65000, 0, 54935000),
(83, '81', '2018-07-12', 'Transfer', 'TRANSFER BY 180712082008', 0, 65000, 6565000),
(84, '80', '2018-07-12', 'Withdraw', '', 95000, 0, 54840000),
(85, '80', '2018-07-12', 'Deposit', '', 0, 75000, 54915000),
(86, '80', '2018-07-12', 'Transfer', 'TRANSFER TO 180712082720', 650000, 0, 54265000),
(87, '83', '2018-07-12', 'Transfer', 'TRANSFER BY 180712082008', 0, 650000, 65650000),
(88, '80', '2018-07-12', 'Withdraw', '', 50000, 0, 54215000),
(89, '80', '2018-07-12', 'Deposit', '', 0, 950000, 55165000),
(90, '80', '2020-04-03', 'Deposit', '0', 0, 1000, 55169000),
(91, '80', '2020-04-03', 'Transfer', 'TRANSFER TO 180712082106', 1000, 0, 55167500),
(92, '81', '2020-04-03', 'Transfer', 'TRANSFER BY 180712082008', 0, 1000, 6566500),
(93, '80', '2020-04-03', 'Withdraw', '0', 150, 0, 55167350),
(94, '85', '2020-04-03', 'Opening Balance', '0', 0, 15457, 15457),
(95, '85', '2020-04-03', 'Withdraw', '0', 100, 0, 15357);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` varchar(5) NOT NULL,
  `accNo` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `mobile`, `address`, `password`, `type`, `accNo`, `status`, `timestamp`) VALUES
(80, 'Sagar Banik', 'sagarbanik11@gmail.com', '8509697554', 'East Vivekananda Pally', '41ed44e3038dbeee7d2ffaa7f51d8a4b', 'U', '180712082008', 1, '2020-04-03 18:47:35'),
(81, 'Showgata Chakraborty', 'showgata123@gmail.com', '9641340489', 'Getbazar', 'd3ce803e952b10b2fb5576b12d0c70fe', 'U', '180712082106', 1, '2018-07-12 18:21:06'),
(82, 'Sumit Banik', 'sumitbanik11@gmail.com', '9547854125', 'Ashram Para', '7225ff71e8821b24fd72b4c8fda95b9a', 'U', '180712082620', 1, '2018-07-12 18:26:20'),
(83, 'Prasanjit Dey', 'prasanjitdey@gmail.com', '9874568745', 'SIliguri', '611f3304e75e26448125d9cdd442ac2a', 'U', '180712082720', 1, '2018-07-12 18:27:20'),
(84, 'Bijoy Banik', 'bijoybanik11@gmail.com', '3256415254', 'Ashram Para', '605ab26297d84bf9ff5344870dd8a85a', 'U', '180712083425', 1, '2018-07-12 18:34:25'),
(85, 'Kakoli Bhadra', 'bhadrakakoli@gmail.com', '6342424553', 'Bangchatra Road', '6ad7ab33a42be84fa5cfc60a39f3e9a4', 'U', '200403074321', 1, '2020-04-03 19:54:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `statements`
--
ALTER TABLE `statements`
  MODIFY `t_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
