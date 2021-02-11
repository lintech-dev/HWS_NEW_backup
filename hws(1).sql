-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2021 at 12:09 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hws`
--

-- --------------------------------------------------------

--
-- Table structure for table `cordinator_customer_request`
--

DROP TABLE IF EXISTS `cordinator_customer_request`;
CREATE TABLE IF NOT EXISTS `cordinator_customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(300) DEFAULT NULL,
  `Customer_id` varchar(300) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `brand` varchar(1000) DEFAULT NULL,
  `model` varchar(1000) DEFAULT NULL,
  `issue` text,
  `serialno` varchar(500) DEFAULT NULL,
  `itemno` varchar(500) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sla` varchar(200) DEFAULT NULL,
  `time_taken` varchar(200) DEFAULT NULL,
  `processed_by` varchar(300) DEFAULT NULL,
  `process_remaks` text,
  `shipper_id` varchar(200) DEFAULT NULL,
  `shipper_exp` varchar(200) DEFAULT NULL,
  `shipper_assigned_date` datetime DEFAULT NULL,
  `shipper_status` varchar(250) DEFAULT NULL,
  `time_left` varchar(250) DEFAULT NULL,
  `shipper_closed_date` datetime DEFAULT NULL,
  `shipper_remarks` text,
  `service_eng_id` varchar(200) DEFAULT NULL,
  `service_eng_assign_date` datetime DEFAULT NULL,
  `service_eng_status` varchar(250) DEFAULT NULL,
  `actual_issue` varchar(250) DEFAULT NULL,
  `cost_inv` varchar(250) DEFAULT NULL,
  `service_eng_remarks` text,
  `customer_status` varchar(250) DEFAULT NULL,
  `cust_app_reg_date` datetime DEFAULT NULL,
  `customer_remarks` text,
  `se_closed_date` datetime DEFAULT NULL,
  `se_closed_reamrks` text,
  `del_shipper_id` varchar(100) DEFAULT NULL,
  `del_shipper_date` datetime DEFAULT NULL,
  `del_shipper_status` varchar(100) DEFAULT NULL,
  `del_shipper_closed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cordinator_customer_request`
--

INSERT INTO `cordinator_customer_request` (`id`, `requested_id`, `Customer_id`, `type`, `brand`, `model`, `issue`, `serialno`, `itemno`, `request_date`, `status`, `sla`, `time_taken`, `processed_by`, `process_remaks`, `shipper_id`, `shipper_exp`, `shipper_assigned_date`, `shipper_status`, `time_left`, `shipper_closed_date`, `shipper_remarks`, `service_eng_id`, `service_eng_assign_date`, `service_eng_status`, `actual_issue`, `cost_inv`, `service_eng_remarks`, `customer_status`, `cust_app_reg_date`, `customer_remarks`, `se_closed_date`, `se_closed_reamrks`, `del_shipper_id`, `del_shipper_date`, `del_shipper_status`, `del_shipper_closed_date`) VALUES
(1, '0010', 'gopal@gmail.com', NULL, 'HCL Info', 'model1', 'test', '2323wwww', 'q212311', '2020-12-11 05:31:28', 'New', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cordinator_users`
--

DROP TABLE IF EXISTS `cordinator_users`;
CREATE TABLE IF NOT EXISTS `cordinator_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `Expertise` text COLLATE utf8mb4_unicode_ci,
  `Experience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_Documents` text COLLATE utf8mb4_unicode_ci,
  `Experience_Documents` text COLLATE utf8mb4_unicode_ci,
  `no_issue_resolved` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cordinator_users`
--

INSERT INTO `cordinator_users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mnumber`, `pin`, `address`, `Expertise`, `Experience`, `Personal_Documents`, `Experience_Documents`, `no_issue_resolved`) VALUES
(1, 'gopal', 'gopalkrishna_b@lintechnokrats.com', 'User', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '8892022172', '560100', 'krishna dhama', NULL, NULL, NULL, NULL, NULL),
(2, 'krishna', 'gopalavb@gmail.com', 'Coordinator', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '8892022171', NULL, 'Raichur', NULL, NULL, NULL, NULL, NULL),
(3, 'sandhya', 'sandhya@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9611992811', '560010', 'address 3 test', NULL, '2', NULL, NULL, NULL),
(4, 'sandhya 2', 'sandhya2@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9988776655', '560010', 'address 3 test', NULL, '5', NULL, NULL, NULL),
(5, 'dealer', 'dealer@gmail.com', 'Dealer', NULL, '$2y$10$ku1oUFSESrHlI0n6P7nj9.tuNoKftQeLobpHhSWuGfrEMMaX/VQGO', NULL, NULL, NULL, '8892022172', NULL, 'raichur', NULL, NULL, NULL, NULL, NULL),
(6, 'nani 11', 'se@gmail.com', 'Service Engineer', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '0889 202 217222', NULL, '7-7-48/12 , Krishna Dhamass\r\nSavithri colony\r\nNear infant Jesus school', 'Network Security', '4', 'By_Speed_post_Registered_Post.csv', 'file_no_sub_out.csv', '2'),
(7, 'Raghu', 'raghu@gmail.com', 'User', NULL, '$2y$10$Iy3EmcGwAxadoLwUCkBiputy0cdq2jCKPRfGb0WYLwNgm9WmRmtjC', NULL, NULL, NULL, '8800990022', '22111', 'marathalli', NULL, NULL, NULL, NULL, NULL),
(8, 'Gopalkrishna B', 'gopal@gmail.com', 'User', NULL, '$2y$10$G/9Rcz2EvUyNs089P3c2K.jRy4p42s1cE2EMkURK8NSs2nDSWBsT.', NULL, NULL, NULL, '0889 202 2172', '584103', '7-7-48/12 , Krishna Dhama\r\nSavithri colony\r\nNear infant Jesus school', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_request`
--

DROP TABLE IF EXISTS `customer_request`;
CREATE TABLE IF NOT EXISTS `customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(300) DEFAULT NULL,
  `Customer_id` varchar(300) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `brand` varchar(1000) DEFAULT NULL,
  `model` varchar(1000) DEFAULT NULL,
  `issue` text,
  `serialno` varchar(500) DEFAULT NULL,
  `itemno` varchar(500) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sla` varchar(200) DEFAULT NULL,
  `time_taken` varchar(200) DEFAULT NULL,
  `processed_by` varchar(300) DEFAULT NULL,
  `process_remaks` text,
  `shipper_id` varchar(200) DEFAULT NULL,
  `shipper_exp` varchar(200) DEFAULT NULL,
  `shipper_assigned_date` datetime DEFAULT NULL,
  `shipper_status` varchar(250) DEFAULT NULL,
  `shipper_pickup_date` varchar(250) DEFAULT NULL,
  `time_left` varchar(250) DEFAULT NULL,
  `shipper_closed_date` datetime DEFAULT NULL,
  `shipper_remarks` text,
  `service_eng_id` varchar(200) DEFAULT NULL,
  `service_eng_assign_date` datetime DEFAULT NULL,
  `service_eng_status` varchar(250) DEFAULT NULL,
  `actual_issue` varchar(250) DEFAULT NULL,
  `cost_inv` varchar(250) DEFAULT NULL,
  `service_eng_remarks` text,
  `customer_status` varchar(250) DEFAULT NULL,
  `cust_app_reg_date` datetime DEFAULT NULL,
  `customer_remarks` text,
  `se_closed_date` datetime DEFAULT NULL,
  `se_closed_reamrks` text,
  `del_shipper_id` varchar(100) DEFAULT NULL,
  `del_shipper_date` datetime DEFAULT NULL,
  `del_shipper_status` varchar(100) DEFAULT NULL,
  `del_shipper_closed_date` datetime DEFAULT NULL,
  `dealer_id` varchar(250) DEFAULT NULL,
  `dealer_name` varchar(500) DEFAULT NULL,
  `dealer_location` text,
  `dealer_address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_request`
--

INSERT INTO `customer_request` (`id`, `requested_id`, `Customer_id`, `type`, `brand`, `model`, `issue`, `serialno`, `itemno`, `request_date`, `status`, `sla`, `time_taken`, `processed_by`, `process_remaks`, `shipper_id`, `shipper_exp`, `shipper_assigned_date`, `shipper_status`, `shipper_pickup_date`, `time_left`, `shipper_closed_date`, `shipper_remarks`, `service_eng_id`, `service_eng_assign_date`, `service_eng_status`, `actual_issue`, `cost_inv`, `service_eng_remarks`, `customer_status`, `cust_app_reg_date`, `customer_remarks`, `se_closed_date`, `se_closed_reamrks`, `del_shipper_id`, `del_shipper_date`, `del_shipper_status`, `del_shipper_closed_date`, `dealer_id`, `dealer_name`, `dealer_location`, `dealer_address`) VALUES
(1, '001', 'gopalkrishna_b@lintechnokrats.com', NULL, 'HCL Info', 'model1', 'teting description', '1234', NULL, '2020-11-02 05:32:14', 'Closed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '002', 'gopalkrishna_b@lintechnokrats.com', NULL, 'D-Link India', 'model2', 'testing remarks by customer', '3432', NULL, '2020-11-03 01:10:42', 'On Progress', NULL, NULL, NULL, NULL, '3', '2', '2020-11-19 04:27:37', 'Closed', NULL, NULL, '2020-11-21 04:22:56', 'test reamrks closed by shipper', '6', '2020-11-23 03:24:09', 'Closed', 'HDD', '2000', 'test se one', 'Approve', '2020-11-30 02:03:34', 'customer approved go head', '2020-12-02 03:26:45', 'se cosed', '4', '2020-12-03 10:58:18', 'Closed', '2020-12-03 01:51:33', NULL, NULL, NULL, NULL),
(3, '003', 'sandhya@gmail.com', NULL, NULL, NULL, 'test issue', '4322', NULL, '2020-11-07 12:49:17', 'Pending', NULL, NULL, NULL, NULL, '4', '5', '2020-12-12 01:17:06', 'Closed', NULL, NULL, '2020-12-12 01:27:21', 'closed', '6', '2020-12-12 01:29:03', 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '004', 'sandhya2@gmail.com', NULL, 'Cerebra Int', 'model2', 'test', '3344', NULL, '2020-11-07 12:51:54', 'New', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '005', 'gopalkrishna_b@lintechnokrats.com', NULL, 'HCL Info', 'model2', 'test issue 3', '2323wwww', 'q212311', '2020-11-30 09:56:52', 'On Progress', NULL, NULL, NULL, NULL, '3', '2', '2020-11-30 10:01:06', 'Closed', NULL, NULL, '2020-11-30 10:07:46', 'shipper remarks submit', '6', '2020-11-30 10:13:34', 'on going', 'Mother bord', '5000', 'test issue', 'Approve', '2020-11-30 10:23:00', 'test approved', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '006', 'raghu@gmail.com', NULL, 'D-Link India', 'model1', 'router issue', '22ww222', '211122', '2020-12-04 01:23:33', 'Pending', NULL, NULL, NULL, NULL, '4', '5', '2020-12-18 10:54:58', 'Closed', NULL, NULL, '2020-12-24 12:32:24', 'submit', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '009', 'gopalkrishna_b@lintechnokrats.com', NULL, 'HCL Info', 'model2', 'testing today', '2311ww23', '342ww2', '2020-12-09 11:20:05', 'On Progress', NULL, NULL, NULL, NULL, '4', '2', '2020-12-10 04:51:58', 'Closed', NULL, NULL, '2020-12-10 05:02:24', 'shipper closed', '6', '2020-12-10 05:03:57', 'Closed', 'RAM', '1200', 'ram gon', 'Approve', '2020-12-10 05:25:36', 'approved by client', '2020-12-10 05:26:14', 'se last closed remarks', '4', '2020-12-10 05:27:00', 'Closed', '2020-12-10 05:31:21', NULL, NULL, NULL, NULL),
(10, '0010', 'gopal@gmail.com', NULL, 'HCL Info', 'model1', 'test', '2323wwww', 'q212311', '2020-12-11 05:31:28', 'Pending', NULL, NULL, NULL, NULL, '4', '2', '2020-12-11 05:35:24', 'Closed', NULL, NULL, '2020-12-11 05:37:06', 'submited', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

DROP TABLE IF EXISTS `dealers`;
CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `dealer_name` varchar(25) NOT NULL,
  `dlocation` varchar(500) DEFAULT NULL,
  `loeng` varchar(300) DEFAULT NULL,
  `contact_person` varchar(25) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `address` varchar(2000) NOT NULL,
  `status` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `dealer_name`, `dlocation`, `loeng`, `contact_person`, `mobile`, `email`, `city`, `pin_code`, `address`, `status`) VALUES
(1, 'R S Bhargav', NULL, NULL, 'Anirudh', '9480654057', 'bhargav.r.shashidhar@gmail.com', 'Bangalore', '560061', 'Uttarahalli, Bangalore', 'Active'),
(2, 'Shreyas M J', NULL, NULL, 'Santhosh K', '7895464667', 'shreyas@gmail.com', 'Mysore', '560098', 'Chikkalasandra, Bangalore', 'Inactive'),
(3, 'Karthik', NULL, NULL, 'Suresh S', '7895464689', 'karthik@gmail.com', 'Hassan', '560075', 'Yadagiri, Mysore', 'Active'),
(4, 'Mohan Rao', NULL, NULL, 'Mahesh K', '656756755', 'mohan.kumar@gmail.com', 'Hosapete', '560057', 'Theerthahalli, Shimogga', 'Inactive'),
(5, 'Karthik B E', NULL, NULL, 'Sagari H', '9546756756', 'karthik.hk@gmail.com', 'Mangalore', '560045', 'Naganahalli, Mandya', 'Active'),
(6, 'Pradeep P', NULL, NULL, 'Pavan kumar', '8944545589', 'pradeep@gmail.com', 'Bangalore', '560089', 'Jayanagar, Bangalore', 'Inactive'),
(7, 'Adishwar', 'Rajaji nagar', '5', 'rakesh', '8892022172', 'rakesh@gmail.com', 'Banglore', '560010', 'rajaji nagar', 'Active'),
(8, 'dmart', 'Indra nagar', '', 'ramesh', '8892022172', 'ramesh@gmail.com', 'Banglore', '560010', 'address 3 test', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `delear_photos`
--

DROP TABLE IF EXISTS `delear_photos`;
CREATE TABLE IF NOT EXISTS `delear_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(250) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delear_photos`
--

INSERT INTO `delear_photos` (`id`, `ticket_id`, `path`) VALUES
(1, '002', '2.png'),
(2, '002', '3.png'),
(3, '002', '4.png'),
(4, '002', '5.png'),
(5, '005', '7.png'),
(6, '005', '8.png'),
(7, '008', 'Allergan_Logo_Tm.png'),
(8, '008', 'ni.png');

-- --------------------------------------------------------

--
-- Table structure for table `direct_customer_request`
--

DROP TABLE IF EXISTS `direct_customer_request`;
CREATE TABLE IF NOT EXISTS `direct_customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(300) DEFAULT NULL,
  `Customer_id` varchar(300) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `brand` varchar(1000) DEFAULT NULL,
  `model` varchar(1000) DEFAULT NULL,
  `issue` text,
  `serialno` varchar(500) DEFAULT NULL,
  `itemno` varchar(500) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sla` varchar(200) DEFAULT NULL,
  `time_taken` varchar(200) DEFAULT NULL,
  `processed_by` varchar(300) DEFAULT NULL,
  `process_remaks` text,
  `shipper_id` varchar(200) DEFAULT NULL,
  `shipper_exp` varchar(200) DEFAULT NULL,
  `shipper_assigned_date` datetime DEFAULT NULL,
  `shipper_status` varchar(250) DEFAULT NULL,
  `time_left` varchar(250) DEFAULT NULL,
  `shipper_closed_date` datetime DEFAULT NULL,
  `shipper_remarks` text,
  `service_eng_id` varchar(200) DEFAULT NULL,
  `service_eng_assign_date` datetime DEFAULT NULL,
  `service_eng_status` varchar(250) DEFAULT NULL,
  `actual_issue` varchar(250) DEFAULT NULL,
  `cost_inv` varchar(250) DEFAULT NULL,
  `service_eng_remarks` text,
  `customer_status` varchar(250) DEFAULT NULL,
  `cust_app_reg_date` datetime DEFAULT NULL,
  `customer_remarks` text,
  `se_closed_date` datetime DEFAULT NULL,
  `se_closed_reamrks` text,
  `del_shipper_id` varchar(100) DEFAULT NULL,
  `del_shipper_date` datetime DEFAULT NULL,
  `del_shipper_status` varchar(100) DEFAULT NULL,
  `del_shipper_closed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `direct_customer_request`
--

INSERT INTO `direct_customer_request` (`id`, `requested_id`, `Customer_id`, `type`, `brand`, `model`, `issue`, `serialno`, `itemno`, `request_date`, `status`, `sla`, `time_taken`, `processed_by`, `process_remaks`, `shipper_id`, `shipper_exp`, `shipper_assigned_date`, `shipper_status`, `time_left`, `shipper_closed_date`, `shipper_remarks`, `service_eng_id`, `service_eng_assign_date`, `service_eng_status`, `actual_issue`, `cost_inv`, `service_eng_remarks`, `customer_status`, `cust_app_reg_date`, `customer_remarks`, `se_closed_date`, `se_closed_reamrks`, `del_shipper_id`, `del_shipper_date`, `del_shipper_status`, `del_shipper_closed_date`) VALUES
(1, '009', 'gopalkrishna_b@lintechnokrats.com', NULL, 'HCL Info', 'model2', 'testing today', '2311ww23', '342ww2', '2020-12-09 11:20:05', 'New', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `direct_users`
--

DROP TABLE IF EXISTS `direct_users`;
CREATE TABLE IF NOT EXISTS `direct_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `Expertise` text COLLATE utf8mb4_unicode_ci,
  `Experience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_Documents` text COLLATE utf8mb4_unicode_ci,
  `Experience_Documents` text COLLATE utf8mb4_unicode_ci,
  `no_issue_resolved` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leveloeng_customer_request`
--

DROP TABLE IF EXISTS `leveloeng_customer_request`;
CREATE TABLE IF NOT EXISTS `leveloeng_customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(300) DEFAULT NULL,
  `Customer_id` varchar(300) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `brand` varchar(1000) DEFAULT NULL,
  `model` varchar(1000) DEFAULT NULL,
  `issue` text,
  `serialno` varchar(500) DEFAULT NULL,
  `itemno` varchar(500) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sla` varchar(200) DEFAULT NULL,
  `time_taken` varchar(200) DEFAULT NULL,
  `processed_by` varchar(300) DEFAULT NULL,
  `process_remaks` text,
  `shipper_id` varchar(200) DEFAULT NULL,
  `shipper_exp` varchar(200) DEFAULT NULL,
  `shipper_assigned_date` datetime DEFAULT NULL,
  `shipper_status` varchar(250) DEFAULT NULL,
  `shipper_pickup_date` varchar(250) DEFAULT NULL,
  `time_left` varchar(250) DEFAULT NULL,
  `shipper_closed_date` datetime DEFAULT NULL,
  `shipper_remarks` text,
  `service_eng_id` varchar(200) DEFAULT NULL,
  `service_eng_assign_date` datetime DEFAULT NULL,
  `service_eng_status` varchar(250) DEFAULT NULL,
  `actual_issue` varchar(250) DEFAULT NULL,
  `cost_inv` varchar(250) DEFAULT NULL,
  `service_eng_remarks` text,
  `customer_status` varchar(250) DEFAULT NULL,
  `cust_app_reg_date` datetime DEFAULT NULL,
  `customer_remarks` text,
  `se_closed_date` datetime DEFAULT NULL,
  `se_closed_reamrks` text,
  `del_shipper_id` varchar(100) DEFAULT NULL,
  `del_shipper_date` datetime DEFAULT NULL,
  `del_shipper_status` varchar(100) DEFAULT NULL,
  `del_shipper_closed_date` datetime DEFAULT NULL,
  `dealer_id` varchar(250) DEFAULT NULL,
  `dealer_name` varchar(500) DEFAULT NULL,
  `dealer_location` text,
  `dealer_address` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leveloeng_customer_request`
--

INSERT INTO `leveloeng_customer_request` (`id`, `requested_id`, `Customer_id`, `type`, `brand`, `model`, `issue`, `serialno`, `itemno`, `request_date`, `status`, `sla`, `time_taken`, `processed_by`, `process_remaks`, `shipper_id`, `shipper_exp`, `shipper_assigned_date`, `shipper_status`, `shipper_pickup_date`, `time_left`, `shipper_closed_date`, `shipper_remarks`, `service_eng_id`, `service_eng_assign_date`, `service_eng_status`, `actual_issue`, `cost_inv`, `service_eng_remarks`, `customer_status`, `cust_app_reg_date`, `customer_remarks`, `se_closed_date`, `se_closed_reamrks`, `del_shipper_id`, `del_shipper_date`, `del_shipper_status`, `del_shipper_closed_date`, `dealer_id`, `dealer_name`, `dealer_location`, `dealer_address`) VALUES
(1, '007', 'vijaya@gmail.com', NULL, 'D-Link India', 'model1', 'netwoek issue', '22ww2qqq', '2w3322', '2020-12-05 01:27:12', 'On Progress', NULL, NULL, NULL, NULL, '4', '5', '2020-12-24 12:31:24', 'Closed', '2020-12-24T14:31', NULL, '2020-12-24 12:32:33', 'submit', '6', '2020-12-24 01:09:32', 'Closed', 'Mother bord', '500', 'testing', 'Approve', '2020-12-24 05:41:42', 'approved by cust', '2020-12-24 05:49:20', 'closed by se', '4', '2020-12-24 05:54:42', 'Closed', '2020-12-24 06:03:49', '7', 'Adishwar', 'Rajaji nagar', 'rajaji nagar'),
(2, '008', 'gopal@gmail.com', NULL, 'HCL Info', 'model1', 'test issue', '22111', 'ww221', '2020-12-08 04:37:41', 'Pending', NULL, NULL, NULL, NULL, '4', '5', '2020-12-24 12:31:24', 'pickup', '2020-12-24T14:31', NULL, '2020-12-18 11:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'Adishwar', 'Rajaji nagar', 'rajaji nagar'),
(3, '0011', 'ram@gmail.com', 'Laptop', 'HCL Info', 'model1', 'test issue', 'ww22', 'ee2233', '2020-12-16 02:56:59', 'Pending', NULL, NULL, NULL, NULL, '4', '5', '2020-12-24 12:31:24', 'In-Transit', '2020-12-24T14:31', NULL, '2020-12-24 12:32:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'Adishwar', 'Rajaji nagar', 'rajaji nagar'),
(4, '0011', 'mah@gmail.com', 'Desktop', 'D-Link India', 'model2', 'test', '2311ww23', '342ww2', '2020-12-16 02:57:36', 'Pending', NULL, NULL, NULL, NULL, '4', '5', '2020-12-24 12:31:24', 'In-Transit', '2020-12-24T14:31', NULL, '2020-12-24 12:32:09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7', 'Adishwar', 'Rajaji nagar', 'rajaji nagar');

-- --------------------------------------------------------

--
-- Table structure for table `leve_engin_users`
--

DROP TABLE IF EXISTS `leve_engin_users`;
CREATE TABLE IF NOT EXISTS `leve_engin_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `Expertise` text COLLATE utf8mb4_unicode_ci,
  `Experience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_Documents` text COLLATE utf8mb4_unicode_ci,
  `Experience_Documents` text COLLATE utf8mb4_unicode_ci,
  `no_issue_resolved` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leve_engin_users`
--

INSERT INTO `leve_engin_users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mnumber`, `pin`, `address`, `Expertise`, `Experience`, `Personal_Documents`, `Experience_Documents`, `no_issue_resolved`) VALUES
(1, 'vijay', 'vijaya@gmail.com', 'User', NULL, '$2y$10$KH1nZZjs0IeLlC42jyPTX.LKisFm6t.22Uhbhs.nV9ptoFkynJv9u', NULL, NULL, NULL, '9988007766', '2323', 'raichur', NULL, NULL, NULL, NULL, NULL),
(2, 'Gopalkrishna B', 'gopal@gmail.com', 'User', NULL, '$2y$10$x.iATj1gU/BjBdzCvUhLPODsLS3nODppE1DjsWuK28mE3Exus66DC', NULL, NULL, NULL, '0889 202 2172', '584103', '7-7-48/12 , Krishna Dhama', NULL, NULL, NULL, NULL, NULL),
(3, 'ramu', 'ram@gmail.com', 'User', NULL, '$2y$10$oxwRjqYwHkO2ZQo7oteGouIADOeGL3tmzI976uYCyUVvTXmQ2l6Ma', NULL, NULL, NULL, '8892022172', '560010', 'address 3 test', NULL, NULL, NULL, NULL, NULL),
(4, 'mahesh', 'mah@gmail.com', 'User', NULL, '$2y$10$0kWlP03LyEH9g9/klKaueuV9X8Wdug05E35Jm61RCqZjZjkPg0mFW', NULL, NULL, NULL, '8892022172', '560010', 'test', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rcallback_customer_request`
--

DROP TABLE IF EXISTS `rcallback_customer_request`;
CREATE TABLE IF NOT EXISTS `rcallback_customer_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_id` varchar(300) DEFAULT NULL,
  `Customer_id` varchar(300) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `brand` varchar(1000) DEFAULT NULL,
  `model` varchar(1000) DEFAULT NULL,
  `issue` text,
  `serialno` varchar(500) DEFAULT NULL,
  `itemno` varchar(500) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `sla` varchar(200) DEFAULT NULL,
  `time_taken` varchar(200) DEFAULT NULL,
  `processed_by` varchar(300) DEFAULT NULL,
  `process_remaks` text,
  `shipper_id` varchar(200) DEFAULT NULL,
  `shipper_exp` varchar(200) DEFAULT NULL,
  `shipper_assigned_date` datetime DEFAULT NULL,
  `shipper_status` varchar(250) DEFAULT NULL,
  `time_left` varchar(250) DEFAULT NULL,
  `shipper_closed_date` datetime DEFAULT NULL,
  `shipper_remarks` text,
  `service_eng_id` varchar(200) DEFAULT NULL,
  `service_eng_assign_date` datetime DEFAULT NULL,
  `service_eng_status` varchar(250) DEFAULT NULL,
  `actual_issue` varchar(250) DEFAULT NULL,
  `cost_inv` varchar(250) DEFAULT NULL,
  `service_eng_remarks` text,
  `customer_status` varchar(250) DEFAULT NULL,
  `cust_app_reg_date` datetime DEFAULT NULL,
  `customer_remarks` text,
  `se_closed_date` datetime DEFAULT NULL,
  `se_closed_reamrks` text,
  `del_shipper_id` varchar(100) DEFAULT NULL,
  `del_shipper_date` datetime DEFAULT NULL,
  `del_shipper_status` varchar(100) DEFAULT NULL,
  `del_shipper_closed_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rcallback_users`
--

DROP TABLE IF EXISTS `rcallback_users`;
CREATE TABLE IF NOT EXISTS `rcallback_users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `Expertise` text COLLATE utf8mb4_unicode_ci,
  `Experience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_Documents` text COLLATE utf8mb4_unicode_ci,
  `Experience_Documents` text COLLATE utf8mb4_unicode_ci,
  `no_issue_resolved` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rcallback_users`
--

INSERT INTO `rcallback_users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mnumber`, `pin`, `address`, `Expertise`, `Experience`, `Personal_Documents`, `Experience_Documents`, `no_issue_resolved`) VALUES
(1, 'gopal', 'gopalkrishna_b@lintechnokrats.com', 'User', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '8892022172', '560100', 'krishna dhama', NULL, NULL, NULL, NULL, NULL),
(2, 'krishna', 'gopalavb@gmail.com', 'Coordinator', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '8892022171', NULL, 'Raichur', NULL, NULL, NULL, NULL, NULL),
(3, 'sandhya', 'sandhya@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9611992811', '560010', 'address 3 test', NULL, '2', NULL, NULL, NULL),
(4, 'sandhya 2', 'sandhya2@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9988776655', '560010', 'address 3 test', NULL, '5', NULL, NULL, NULL),
(5, 'dealer', 'dealer@gmail.com', 'Dealer', NULL, '$2y$10$ku1oUFSESrHlI0n6P7nj9.tuNoKftQeLobpHhSWuGfrEMMaX/VQGO', NULL, NULL, NULL, '8892022172', NULL, 'raichur', NULL, NULL, NULL, NULL, NULL),
(6, 'nani 11', 'se@gmail.com', 'Service Engineer', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '0889 202 217222', NULL, '7-7-48/12 , Krishna Dhamass\r\nSavithri colony\r\nNear infant Jesus school', 'Network Security', '4', 'By_Speed_post_Registered_Post.csv', 'file_no_sub_out.csv', '2'),
(7, 'Raghu', 'raghu@gmail.com', 'User', NULL, '$2y$10$Iy3EmcGwAxadoLwUCkBiputy0cdq2jCKPRfGb0WYLwNgm9WmRmtjC', NULL, NULL, NULL, '8800990022', '22111', 'marathalli', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_call_back`
--

DROP TABLE IF EXISTS `request_call_back`;
CREATE TABLE IF NOT EXISTS `request_call_back` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile_no` varchar(200) DEFAULT NULL,
  `system_otp` varchar(100) DEFAULT NULL,
  `user_otp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_call_back`
--

INSERT INTO `request_call_back` (`id`, `mobile_no`, `system_otp`, `user_otp`) VALUES
(1, '8892022172', '55446', NULL),
(2, '8892022172', '252', NULL),
(3, '8892022172', '0836', NULL),
(4, '8892022172', '2114', NULL),
(5, '8892022172', '153', NULL),
(6, '8892022172', '28152', NULL),
(7, '8892022172', '12603', NULL),
(8, '8892022172', '366', NULL),
(9, '8892022172', '7733', NULL),
(10, '8892022172', '36124', NULL),
(11, '8892022172', '66373', '66373'),
(12, '8892022172', '82', '82'),
(13, '9900870890', '0693', NULL),
(14, '9900870890', '9798', NULL),
(15, '9900870890', '04481', NULL),
(16, '8892022172', '9674859', '9674859'),
(17, '8892022172', '456908', '456908'),
(18, '8892022182', '3912', NULL),
(19, '8892022182', '92027', NULL),
(20, '8892022172', '42', '42'),
(21, '8892022172', '5347', '5347'),
(22, '8892022172', '823', NULL),
(23, '8892022172', '857', '857'),
(24, '8892022172', '819', '819'),
(25, '8892022172', '524', '524');

-- --------------------------------------------------------

--
-- Table structure for table `shipper_photos`
--

DROP TABLE IF EXISTS `shipper_photos`;
CREATE TABLE IF NOT EXISTS `shipper_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(250) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipper_photos`
--

INSERT INTO `shipper_photos` (`id`, `ticket_id`, `path`) VALUES
(1, '002', '2.png'),
(2, '002', '3.png'),
(3, '002', '4.png'),
(4, '002', '5.png'),
(5, '005', '7.png'),
(6, '005', '8.png'),
(7, '009', 'Allergan_Logo_Tm.png'),
(8, '009', 'ni.png'),
(9, '0010', 'Lintechnokrats-Logo.png'),
(10, '003', 'ni.png'),
(11, '006', 'Lintechnokrats-Logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `shipper_photos_del`
--

DROP TABLE IF EXISTS `shipper_photos_del`;
CREATE TABLE IF NOT EXISTS `shipper_photos_del` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(250) DEFAULT NULL,
  `path` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipper_photos_del`
--

INSERT INTO `shipper_photos_del` (`id`, `ticket_id`, `path`) VALUES
(1, '002', 'Lintechnokrats-Logo.png'),
(2, '002', 'logo.png'),
(3, '009', '1.jpeg'),
(4, '007', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mnumber` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `Expertise` text COLLATE utf8mb4_unicode_ci,
  `Experience` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_Documents` text COLLATE utf8mb4_unicode_ci,
  `Experience_Documents` text COLLATE utf8mb4_unicode_ci,
  `no_issue_resolved` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `mnumber`, `pin`, `address`, `Expertise`, `Experience`, `Personal_Documents`, `Experience_Documents`, `no_issue_resolved`) VALUES
(1, 'gopal', 'gopalkrishna_b@lintechnokrats.com', 'User', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '8892022172', '560100', 'krishna dhama', NULL, NULL, NULL, NULL, NULL),
(2, 'krishna', 'gopalavb@gmail.com', 'Coordinator', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '8892022171', NULL, 'Raichur', NULL, NULL, NULL, NULL, NULL),
(3, 'sandhya', 'sandhya@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9611992811', '560010', 'address 3 test', NULL, '2', NULL, NULL, NULL),
(4, 'sandhya 2', 'sandhya2@gmail.com', 'Shipper', NULL, '$2y$10$S0Bucnzf4Bl/tudLAGXTjes7Ljgu7b8eaRegC13YdAKOWXH3aGKjS', NULL, NULL, NULL, '9988776655', '560010', 'address 3 test', NULL, '5', NULL, NULL, NULL),
(5, 'LOE', 'loe@gmail.com', 'Level 1 Engineer', NULL, '$2y$10$ku1oUFSESrHlI0n6P7nj9.tuNoKftQeLobpHhSWuGfrEMMaX/VQGO', NULL, NULL, NULL, '8892022172', NULL, 'raichur', NULL, NULL, NULL, NULL, NULL),
(6, 'nani 11', 'se@gmail.com', 'Service Engineer', NULL, '$2y$10$0goTFV02iAT523ijittEeu8/RnaQ4Yu/BY8H/PAoY1BE6DbcnQCfa', NULL, NULL, NULL, '0889 202 217222', NULL, '7-7-48/12 , Krishna Dhamass\r\nSavithri colony\r\nNear infant Jesus school', 'Network Security', '4', 'By_Speed_post_Registered_Post.csv', 'file_no_sub_out.csv', '2'),
(7, 'Raghu', 'raghu@gmail.com', 'User', NULL, '$2y$10$Iy3EmcGwAxadoLwUCkBiputy0cdq2jCKPRfGb0WYLwNgm9WmRmtjC', NULL, NULL, NULL, '8800990022', '22111', 'marathalli', NULL, NULL, NULL, NULL, NULL),
(8, 'vijay', 'vijaya@gmail.com', 'User', NULL, '$2y$10$5LBzfxVQhmVTBRi1oZCvae1OK1DilB8d5xdFnl.twGBN5M05JDz3e', NULL, NULL, NULL, '9988007766', '2323', 'raichur', NULL, NULL, NULL, NULL, NULL),
(9, 'Gopalkrishna B', 'gopal@gmail.com', 'User', NULL, '$2y$10$/sM1YOCO1h9em.O3wGwNi.AMWhEwTg4wAILStFJVMmDtkv1E6/rc2', NULL, NULL, NULL, '0889 202 2172', '584103', '7-7-48/12 , Krishna Dhama', NULL, NULL, NULL, NULL, NULL),
(10, 'Gopalkrishna B', 'gopal@gmail.com', 'User', NULL, '$2y$10$ybM6rfV9RmMOugmaBvvHhe.ItwKjJ30NuXqo3/T4IWauQGjO6uQrq', NULL, NULL, NULL, '0889 202 2172', '584103', '7-7-48/12 , Krishna Dhama\r\nSavithri colony\r\nNear infant Jesus school', NULL, NULL, NULL, NULL, NULL),
(11, 'ramu', 'ram@gmail.com', 'User', NULL, '$2y$10$i3qv9DUPm3ZYmSH6Bpi21ObrN/bsKklihmigjqOc5y.Ih.wuZq5mW', NULL, NULL, NULL, '8892022172', '560010', 'address 3 test', NULL, NULL, NULL, NULL, NULL),
(12, 'mahesh', 'mah@gmail.com', 'User', NULL, '$2y$10$VEyjM0LglL9L3NgiHPYP.uEstv1oawM/eBk0Pi.QJGkVO017y6mpO', NULL, NULL, NULL, '8892022172', '560010', 'test', NULL, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
