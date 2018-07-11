-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 11, 2018 at 12:40 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chrome_extension`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `id` int(11) NOT NULL,
  `analyst_name` varchar(100) NOT NULL,
  `main_program` varchar(100) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `fuels_serving_home` varchar(50) NOT NULL,
  `qhec_for_sfh` varchar(50) NOT NULL,
  `qhec_for_apt` varchar(50) NOT NULL,
  `9w_a19_led` varchar(50) NOT NULL,
  `11_watt_led` varchar(50) NOT NULL,
  `15_watt_led` varchar(50) NOT NULL,
  `9/11/15_wattt_3-way` varchar(50) NOT NULL,
  `17_watt_r40_flood` varchar(50) NOT NULL,
  `11_watt_br30_led` varchar(50) NOT NULL,
  `5_watt_led_candelabra` varchar(50) NOT NULL,
  `6_watt_led_globe` varchar(50) NOT NULL,
  `hot_water_pipe_insulation` varchar(50) NOT NULL,
  `low_flow_shower_heads_white_-_1.5` varchar(50) NOT NULL,
  `low_flow_shower_heads_chrome_-_1.5` varchar(50) NOT NULL,
  `low_flow_shower_heads_white_1.75` varchar(50) NOT NULL,
  `low_flow_shower_heads_white_-_1.75` varchar(50) NOT NULL,
  `low_flow_shower_heads_chrome_-_1.75` varchar(50) NOT NULL,
  `low_flow_shower_heads_handheld_white_-_1.5` varchar(50) NOT NULL,
  `low_flow_shower_heads_handheld_chrome_-_1.5` varchar(50) NOT NULL,
  `faucet_aerators_kitchen` varchar(50) NOT NULL,
  `faucet_aerators_bathroom` varchar(50) NOT NULL,
  `smart_strips` varchar(50) NOT NULL,
  `temperature_turndown` varchar(50) NOT NULL,
  `date_inserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `reg_date`, `status`) VALUES
(1, 'Bobby', 'Hurlbut', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2018-07-05 14:57:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
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
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
