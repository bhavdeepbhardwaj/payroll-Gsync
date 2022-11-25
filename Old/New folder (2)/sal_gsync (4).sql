-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2022 at 12:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sal_gsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_employees`
--

CREATE TABLE `gs_employees` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(255) NOT NULL,
  `emp_name` varchar(255) NOT NULL,
  `emp_desg` varchar(255) NOT NULL,
  `emp_mail` varchar(255) NOT NULL,
  `doj` date NOT NULL,
  `emp_dept` varchar(255) NOT NULL,
  `emp_pan` varchar(255) NOT NULL,
  `emp_uan` varchar(255) DEFAULT 'NA',
  `emp_esi` varchar(255) DEFAULT 'NA',
  `emp_pic` longtext DEFAULT NULL,
  `emp_paymode` varchar(150) NOT NULL,
  `emp_bank` varchar(255) DEFAULT 'NA',
  `emp_ifsc` varchar(255) DEFAULT 'NA',
  `emp_acc` varchar(255) DEFAULT 'NA',
  `emp_gsal` varchar(150) NOT NULL,
  `emp_food` varchar(50) DEFAULT NULL,
  `emp_travel` varchar(50) DEFAULT NULL,
  `emp_spl` varchar(80) DEFAULT NULL,
  `emp_meal` tinyint(1) NOT NULL,
  `emp_cab` tinyint(1) NOT NULL,
  `emp_stinc` varchar(150) DEFAULT NULL,
  `emp_inc` varchar(150) DEFAULT NULL,
  `emp_other` varchar(150) DEFAULT NULL,
  `emp_exitdate` date DEFAULT NULL,
  `emp_desp` longtext DEFAULT NULL,
  `emp_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_employees`
--

INSERT INTO `gs_employees` (`id`, `emp_id`, `emp_name`, `emp_desg`, `emp_mail`, `doj`, `emp_dept`, `emp_pan`, `emp_uan`, `emp_esi`, `emp_pic`, `emp_paymode`, `emp_bank`, `emp_ifsc`, `emp_acc`, `emp_gsal`, `emp_food`, `emp_travel`, `emp_spl`, `emp_meal`, `emp_cab`, `emp_stinc`, `emp_inc`, `emp_other`, `emp_exitdate`, `emp_desp`, `emp_status`, `created_at`) VALUES
(1, 'GSync000', 'Test Name MM', 'Administrator', 'test@gmail.com', '2000-02-01', 'Sales', 'ABCDEF12354GM', '1236547890M', '9999885511M', 'profiles/GSync000003m.jpg', 'Wire Transfer', 'ICICI', 'SBI000078M', '77886655111100', '90000000', '2500', '2500', '1200', 0, 1, '3500', '3500', '1000', '0000-00-00', 'Integer congue est nec magna accumsan, a mattis nulla pretium. Vestibulum quis orci scelerisque, venenatis est quis, tincidunt mauris. Awesome.', 1, '2022-07-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `emp_sal_month` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `emp_sal_month`, `fullname`, `email`, `phone`) VALUES
(76, 'GSync0012022-06', 'Manish singh', 'mann@mail.com', 888),
(77, 'GSync0022022-06', 'mann', 'atul@gmailme.com', 12345),
(78, 'GSync0032022-06', 'Patil Akshayyy', 'dont@hotmail.com', 789);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `user_type` int(1) NOT NULL DEFAULT 3,
  `user_status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `user_type`, `user_status`) VALUES
(1, 'admin', '$2y$10$mqA/Q2zckikdSty6Fvqh5eyE9V0yzHVZnAYNurwhhAd30jrAIN9yO', '2022-02-24 08:37:57', 1, 1),
(2, 'finance', '$2y$10$dIx1ALQpWjbl57HPmHlOE.84Bm3jfxmKZ.dSiX30a3QldnRARzqiu', '2022-06-23 14:19:44', 2, 1),
(3, 'hr', '$2y$10$VcYkHwh2DlRFIpemcp2GoO32N7Bp2xjrCqmLYomEePmG6mCR26qh2', '2022-06-23 14:20:25', 2, 1),
(4, 'GSync000', '$2y$10$rZBycKqwz4o8qNacQEZG8uGJ5oqGPErQuqK8fjiZlz0NT1n0GgQSm', '2022-06-23 14:20:25', 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_employees`
--
ALTER TABLE `gs_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emp_sal_month` (`emp_sal_month`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_employees`
--
ALTER TABLE `gs_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
