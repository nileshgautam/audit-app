-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 01:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auditapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_data_required`
--

CREATE TABLE `tbl_data_required` (
  `id` int(11) NOT NULL,
  `data_required` text NOT NULL,
  `sub_process_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_data_required`
--

INSERT INTO `tbl_data_required` (`id`, `data_required`, `sub_process_id`, `status`) VALUES
(1, 'Vendor Master', 1, 0),
(2, 'Vendor Master Change Log', 1, 0),
(3, 'List of new vendors created / deleted / blocked along with relevant approvals and documentation ', 1, 0),
(4, 'Approvals for change in details of vendor master', 1, 0),
(5, 'Vendor appraisal / performance reports', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process`
--

CREATE TABLE `tbl_process` (
  `id` int(11) NOT NULL,
  `process_name` text NOT NULL,
  `process_id` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_process`
--

INSERT INTO `tbl_process` (`id`, `process_name`, `process_id`, `status`) VALUES
(1, 'Procurement', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_risk`
--

CREATE TABLE `tbl_risk` (
  `risk_id` int(11) NOT NULL,
  `sub_process_id` int(11) NOT NULL,
  `risk_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_risk`
--

INSERT INTO `tbl_risk` (`risk_id`, `sub_process_id`, `risk_name`) VALUES
(1, 1, 'Redundant vendors exist in VMF'),
(2, 1, 'Duplicate Vendors exist in VMF'),
(3, 2, 'vendors performance is not reviewed.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_process`
--

CREATE TABLE `tbl_sub_process` (
  `id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  `sub_process_name` text NOT NULL,
  `sub_process_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_process`
--

INSERT INTO `tbl_sub_process` (`id`, `process_id`, `sub_process_name`, `sub_process_id`, `status`) VALUES
(1, 1, 'Vendor master maintenance', 1, 0),
(2, 1, 'Vendor performance appraisal', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_first_name` varchar(50) NOT NULL,
  `user_last_name` varchar(50) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_first_name`, `user_last_name`, `user_id`, `user_password`, `user_role`, `user_phone`) VALUES
(1, 'GennextIT', 'Consultant & Management', 'admin@test.com', '123456', '10', '7894561230');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_work_steps`
--

CREATE TABLE `tbl_work_steps` (
  `work_seteps_id` int(11) NOT NULL,
  `sub_process_id` int(11) NOT NULL,
  `steps_name` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_work_steps`
--

INSERT INTO `tbl_work_steps` (`work_seteps_id`, `sub_process_id`, `steps_name`, `status`) VALUES
(1, 2, 'Check if the company has rolled out vendor appraisal policies and procedures ', 0),
(2, 2, 'Check if the policies are being implemented for the appraisal ', 0),
(3, 2, 'A formal appraisal policy should be implemented for the critical vendors especially', 0),
(4, 1, 'Obtain an overview of process for updating and maintenance f the vendors ', 0),
(5, 1, 'Review compliance with procedures for updating amendments to vendor master', 0),
(6, 1, 'At the time of vendor creation, the accounts personnel should check if the vendor already exists in the vendor master.', 0),
(7, 1, 'A review if the duplicate/ redundant vendors codes in the and the vendor master should be done regularly. ', 0),
(8, 1, 'Understand the process followed by the company for identifying the redundant vendor codes and deactivating them', 0),
(9, 1, 'Identify vendors with no transaction in the past one year-these will be the redundant vendors.', 0),
(10, 1, 'check if the redundant vendors have been deactivated or not.', 0),
(11, 1, 'Pay particular attention to the vendors creation data - creating of a new duplicate code indicates that duplicates is an ongoing process issues rather than a data clean up issue.', 0),
(20, 1, 'Identify the duplicate vendors (using basis like common PAN no, address, etc.)', 0),
(21, 1, 'For a sample, check weather the details are updated correctly in the master from the vendor registration forms, especially for important details like PAN, bank details service tax registration number, payment terms.', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_data_required`
--
ALTER TABLE `tbl_data_required`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_process`
--
ALTER TABLE `tbl_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
  ADD PRIMARY KEY (`risk_id`);

--
-- Indexes for table `tbl_sub_process`
--
ALTER TABLE `tbl_sub_process`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_work_steps`
--
ALTER TABLE `tbl_work_steps`
  ADD PRIMARY KEY (`work_seteps_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_data_required`
--
ALTER TABLE `tbl_data_required`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_process`
--
ALTER TABLE `tbl_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_risk`
--
ALTER TABLE `tbl_risk`
  MODIFY `risk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sub_process`
--
ALTER TABLE `tbl_sub_process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_work_steps`
--
ALTER TABLE `tbl_work_steps`
  MODIFY `work_seteps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
