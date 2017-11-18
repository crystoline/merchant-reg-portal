-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2017 at 11:16 AM
-- Server version: 5.5.53
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrp`
--
CREATE DATABASE IF NOT EXISTS `mrp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mrp`;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `bank_id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `bank_code` varchar(3) NOT NULL,
  `bank_enabled` enum('0','1') NOT NULL DEFAULT '1',
  `bankId` int(11) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `bankStatus` int(11) NOT NULL,
  `bankNibssCode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contains a list of banks supported by BranchCollect';

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`bank_id`, `bank_name`, `bank_code`, `bank_enabled`, `bankId`, `bankName`, `bankStatus`, `bankNibssCode`) VALUES
(1, 'Access Bank', '044', '1', 1, 'Access Bank', 2, '044'),
(2, 'Citibank', '023', '1', 2, 'Citibank', 2, '023'),
(3, 'Diamond Bank', '063', '1', 3, 'Diamond Bank', 2, '063'),
(4, 'Ecobank', '050', '1', 4, 'Ecobank', 2, '050'),
(5, 'Enterprise Bank Limited', '998', '0', 5, 'Enterprise Bank Limited', 1, '998'),
(6, 'Fidelity Bank', '070', '1', 6, 'Fidelity Bank', 2, '070'),
(7, 'First Bank', '011', '1', 7, 'First Bank', 2, '011'),
(8, 'First City Monument Bank', '214', '1', 8, 'First City Monument Bank', 2, '214'),
(9, 'Guaranty Trust Bank', '058', '1', 9, 'Guaranty Trust Bank', 2, '058'),
(10, 'Heritage Bank', '030', '1', 10, 'Heritage Bank', 2, '030'),
(11, 'Keystone Bank', '082', '1', 11, 'Keystone Bank', 2, '082'),
(12, 'Mainstreet Bank', '014', '1', 12, 'Mainstreet Bank', 2, '014'),
(13, 'Savannah Bank', '999', '0', 13, 'Savannah Bank', 1, '998'),
(14, 'Skye Bank', '076', '1', 14, 'Skye Bank', 2, '076'),
(15, 'Stanbic IBTC Bank', '221', '1', 15, 'Stanbic IBTC Bank', 2, '221'),
(16, 'Standard Chartered Bank', '068', '1', 16, 'Standard Chartered Bank', 2, '068'),
(17, 'Sterling Bank', '232', '1', 17, 'Sterling Bank', 2, '232'),
(18, 'Union Bank', '032', '1', 18, 'Union Bank', 2, '032'),
(19, 'United Bank for Africa', '033', '1', 19, 'United Bank for Africa', 2, '033'),
(20, 'Unity Bank', '215', '1', 20, 'Unity Bank', 2, '215'),
(21, 'Wema Bank', '035', '1', 21, 'Wema Bank', 2, '035'),
(22, 'Zenith Bank', '057', '1', 22, 'Zenith Bank', 2, '057'),
(23, 'Spring Bank', '084', '1', 23, 'Spring Bank', 2, '084'),
(24, 'UNSPECIFIED BANK', '000', '1', 24, 'UNSPECIFIED BANK', 2, '000'),
(25, 'JAIZ BANK', '301', '1', 25, 'JAIZ BANK', 2, '301'),
(26, 'PROVIDOUS BANK', '101', '1', 26, 'PROVIDOUS BANK', 2, '101'),
(27, 'No Bank', '', '1', 27, 'No Bank', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(9) NOT NULL,
  `event` varchar(100) NOT NULL,
  `result_of_event` varchar(100) NOT NULL,
  `user_id` int(9) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `merchants`
--

CREATE TABLE `merchants` (
  `id` int(9) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `rc_no` varchar(50) NOT NULL,
  `type_of_ownership` int(9) NOT NULL,
  `date_reg` varchar(50) NOT NULL,
  `office_phone` varchar(50) NOT NULL,
  `staff_strength` int(9) NOT NULL,
  `cus_serv_phone` varchar(50) NOT NULL,
  `office_email` varchar(50) NOT NULL,
  `office_address` varchar(500) NOT NULL,
  `postal_address` varchar(500) NOT NULL,
  `name_of_p_cont_pers` varchar(100) NOT NULL,
  `email_of_p_cont_pers` varchar(100) NOT NULL,
  `des_of_p_cont_pers` varchar(100) NOT NULL,
  `phone_of_p_cont_pers` varchar(50) NOT NULL,
  `name_of_s_cont_pers` varchar(100) NOT NULL,
  `des_of_s_cont_pers` varchar(100) NOT NULL,
  `email_of_s_cont_pers` varchar(100) NOT NULL,
  `phone_of_s_cont_pers` varchar(100) NOT NULL,
  `website_name` varchar(100) NOT NULL,
  `website_url` varchar(100) NOT NULL,
  `desc_prod` varchar(500) NOT NULL,
  `cust_pre_reg` enum('Yes','No') NOT NULL,
  `if_cust_pre_reg` text NOT NULL,
  `trans_vol_per_day` int(9) NOT NULL,
  `no_of_days_for_delev` int(9) NOT NULL,
  `method_of_deliv` varchar(100) NOT NULL,
  `merchant_bank` int(4) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_no` int(9) NOT NULL,
  `account_type` varchar(50) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `additional_information` varchar(500) NOT NULL,
  `date_of_reg` timestamp NULL DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `merchant_status` enum('0','1','2') NOT NULL COMMENT '0 means not validated, 1 means validated,2 means flagged ',
  `user_id` int(11) NOT NULL,
  `date_validated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `validated_user` int(9) NOT NULL,
  `reason` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchants`
--

INSERT INTO `merchants` (`id`, `company_name`, `rc_no`, `type_of_ownership`, `date_reg`, `office_phone`, `staff_strength`, `cus_serv_phone`, `office_email`, `office_address`, `postal_address`, `name_of_p_cont_pers`, `email_of_p_cont_pers`, `des_of_p_cont_pers`, `phone_of_p_cont_pers`, `name_of_s_cont_pers`, `des_of_s_cont_pers`, `email_of_s_cont_pers`, `phone_of_s_cont_pers`, `website_name`, `website_url`, `desc_prod`, `cust_pre_reg`, `if_cust_pre_reg`, `trans_vol_per_day`, `no_of_days_for_delev`, `method_of_deliv`, `merchant_bank`, `account_name`, `account_no`, `account_type`, `bank_branch`, `additional_information`, `date_of_reg`, `date_updated`, `merchant_status`, `user_id`, `date_validated`, `validated_user`, `reason`) VALUES
(1, 'NetronIT', '261661', 0, '2017-08-01', '', 25, '', '', '', '				</div>\r\n				<label class="error"></label>\r\n			</div>\r\n		</div>\r\n		<div class="col-sm-3">\r\n			<div class="form-group">\r\n				<label for="phone_of_p_cont_pers">Contact Person''s Telephone</label>\r\n				<div class="form-line ">\r\n					<input class="form-control" type="text" name="phone_of_p_cont_pers" id="phone_of_p_cont_pers"\r\n					       value="">\r\n				</div>\r\n				<label class="error"></label>\r\n			</div>\r\n		</div>\r\n	</div>\r\n	<div class="row">\r\n		<div class="col-sm-3">\r\n			<div class="form-group">', '', '', '', '', '', '', '', '', '', 'lssklslkklklklasklsklsk', '', 'Yes', 'a:1:{i:0;s:0:"";}', 0, 0, 'a:1:{i:0;s:0:"";}', 0, '', 0, '', '', '', '2017-11-18 10:11:06', '2017-11-18 10:11:06', '0', 1, '2017-11-18 10:01:45', 1, 'sddsndjdndjkndss'),
(3, 'NetronIT', '261661', 0, '2017-08-01', '9876251656', 7, '9876543', 'crystoline@gmail.com', 's duihduisdh', 'djksd hddsjkd sh', 'd ijisdhjsdiosdh', 'osdhisd hso', ' iodhsdiohs', 'isdh sdiohsdo', 'diohsdsd iohsdio', 'dhsiosdhisd', 'dhisdohsdo', 'dihsioshd', 'sihiihsishsishs', 'dihsdisdsd hi', 'i dosidhsosdh', 'Yes', 'a:5:{i:0;s:4:"Name";i:1;s:7:"Address";i:2;s:3:"DOB";i:3;s:9:"Phone No.";i:4;s:0:"";}', 0, 0, 'a:3:{i:0;s:7:"Courier";i:1;s:24:"Direct Credit to Account";i:2;s:0:"";}', 13, 'slskhsli', 9876543, 'Savings Account', 'Lagos', 'sakl jijdosjsisjskl', '2017-11-18 08:52:17', '2017-11-18 10:01:25', '1', 1, '2017-11-18 10:01:25', 1, 'jkkasjasjkxkdnssdjkndjksd');

-- --------------------------------------------------------

--
-- Table structure for table `ownership_type`
--

CREATE TABLE `ownership_type` (
  `ot_id` int(9) NOT NULL,
  `ot_name` varchar(100) NOT NULL,
  `ot_status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('0','1') NOT NULL COMMENT '0 is not active; 1 is active',
  `user_type` varchar(40) NOT NULL DEFAULT 'Inputer',
  `date_registered` timestamp NULL DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `user_type`, `date_registered`, `date_modified`) VALUES
(1, 'Adekunle', 'Adekoya', 'crystoline@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '1', 'admin', NULL, '2017-11-16 14:36:31'),
(2, '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '0', 'Inputer', NULL, '2017-11-17 08:53:46'),
(3, 'Salau', 'Abiola', 'salau.abiola@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', 'Inputer', '2017-11-17 09:01:37', '2017-11-17 09:01:37'),
(4, 'Omotayo', 'Ogunlade', 'omotayo.ogunlade@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', 'admin', '2017-11-17 09:09:29', '2017-11-17 09:09:29'),
(5, 'Akeem', 'Gbadamosi', 'akeem.gbada@yahoo.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', 'admin', '2017-11-17 09:12:18', '2017-11-17 09:12:18'),
(6, 'Damiel', 'Babatunde', 'daniel.babatunde@hotmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', 'admin', '2017-11-17 09:14:42', '2017-11-17 09:14:42'),
(7, 'Oluwaniberu', 'Awilo', 'skdks@ddksd.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '0', 'Inputer', '2017-11-17 09:16:08', '2017-11-17 09:16:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ownership_type`
--
ALTER TABLE `ownership_type`
  ADD PRIMARY KEY (`ot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `bank_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ownership_type`
--
ALTER TABLE `ownership_type`
  MODIFY `ot_id` int(9) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
