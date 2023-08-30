-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 29, 2018 at 09:24 AM
-- Server version: 5.6.40-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infoau_logistics`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_voucher`
--

CREATE TABLE `account_voucher` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ledger_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `bank_details` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `closing_bal` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `acc_inv` varchar(50) NOT NULL,
  `trans_detail` varchar(50) NOT NULL,
  `mod_voucher_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_voucher`
--

INSERT INTO `account_voucher` (`id`, `intAdminId`, `ledger_id`, `ent_date`, `type`, `amount`, `pay_mode`, `pay_type`, `bank_details`, `cheque_no`, `closing_bal`, `remarks`, `acc_inv`, `trans_detail`, `mod_voucher_no`) VALUES
(1, 1, 'Cash', '2018-06-11', 'Payment', '23000', 'Receipt Voucher', 'Cash', 'Cash', '', '23000', '', 'Lakshmi Cargo Company Ltd.', '', '1'),
(2, 18, 'Billing', '2018-06-12', 'Billing', '2500', 'Payment Voucher', 'Bill Amount', '', '', '2500', '', '', '', '1'),
(3, 18, 'Billing', '2018-06-12', 'Billing', '4086', 'Payment Voucher', 'Bill Amount', '', '', '6586', '', '', '', '2'),
(4, 1, 'Cash', '2018-06-12', 'Payment', '5586', 'Payment Voucher', 'Cash', 'Cash', '', '17414', '', 'ASS Roadways', '', '3'),
(5, 18, 'Billing', '2018-06-18', 'Billing', '-4311', 'Payment Voucher', 'Bill Amount', '', '', '2275', '', '', '', '4'),
(6, 1, 'Cash', '2018-06-18', 'Payment', '25000', 'Payment Voucher', 'Cash', 'Cash', '', '-7586', '', 'ASS Roadways', '', '5'),
(7, 1, 'Cash', '2018-06-18', 'Payment', '600', 'Payment Voucher', 'Cash', 'Cash', '', '-8186', '', 'ASS Roadways', '', '6'),
(8, 1, 'MKM Cash', '2018-07-13', 'Payment', '69', 'Payment Voucher', 'NEFT', 'MKM Cash', 'dfsg6fd54gs4df', '-69', '', 'ASS Roadways', '', '7'),
(9, 1, 'Cash', '2018-07-13', 'Payment', '10000', 'Receipt Voucher', 'Cash', 'Cash', '', '1814', '', 'Gee Krishna Transport', '', '2'),
(10, 1, 'Cash', '2018-07-13', 'Payment', '10000', 'Receipt Voucher', 'Cash', 'Cash', '', '11814', '', 'Gee Krishna Transport', '', '3'),
(11, 18, 'Billing', '2018-07-13', 'Billing', '5300', 'Payment Voucher', 'Bill Amount', '', '', '7575', '', '', '', '8'),
(12, 1, 'Cash', '2018-07-17', 'Payment', '30000', 'Receipt Voucher', 'Cash', 'MKM Cash', '', '41814', '', 'KRD Transports', '', '4'),
(13, 23, 'Billing', '2018-07-17', 'Billing', '45000', 'Payment Voucher', 'Bill Amount', '', '', '52575', '', '', '', '9'),
(14, 1, 'Cash', '2018-07-17', 'Payment', '40000', 'Payment Voucher', 'Cash', 'MKM Cash', '', '1814', '', 'ASSL Trans', '', '10'),
(15, 1, 'Cash', '2018-07-24', 'Payment', '5300', 'Payment Voucher', 'Cash', 'Cash', '', '-3486', '', 'ASS Roadways', '', '11'),
(16, 18, 'Billing', '2018-08-09', 'Billing', '50000', 'Payment Voucher', 'Bill Amount', '', '', '102575', '', '', '', '12'),
(17, 1, 'Cash', '2018-08-13', 'Payment', '1000', 'Receipt Voucher', 'Cash', '', '', '-2486', '', 'Adichiamman Transports', '', '5'),
(18, 1, 'Cash', '2018-08-13', 'Payment', '50000', 'Payment Voucher', 'Cash', '', '', '-52486', '', 'ASS Roadways', '', '13');

-- --------------------------------------------------------

--
-- Table structure for table `assl_transentries`
--

CREATE TABLE `assl_transentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transentries`
--

INSERT INTO `assl_transentries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 1, 1, '2018-04-01', '2000.00', '2000.00', 'Trip Advance For Trip10'),
(2, NULL, 2, 1, '2018-04-01', '2000.00', '2000.00', 'Driver Advance For Trip10'),
(3, NULL, 1, 2, '2018-07-17', '5000.00', '5000.00', 'Trip Advance on Trip24Place:ChennaiVechNo:TN04AS3105-Chennai'),
(4, NULL, 2, 2, '2018-07-17', '5000.00', '5000.00', 'Trip Advance on Trip24Place:ChennaiVechNo:TN04AS3105-Chennai'),
(5, NULL, 4, 1, '2018-07-17', '50000.00', '50000.00', 'Bill Amount5 '),
(6, NULL, 1, 3, '2018-07-17', '40000.00', '40000.00', 'Payment for Bill Amount5 '),
(7, NULL, 4, 2, '2018-07-17', '40000.00', '40000.00', 'Payment for Bill Amount5 '),
(8, NULL, 1, 4, '2018-08-22', '111.00', '111.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114-Chennai'),
(9, NULL, 2, 3, '2018-08-22', '111.00', '111.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114-Chennai'),
(10, NULL, 1, 5, '2018-08-22', '222.00', '222.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114-MKM'),
(11, NULL, 2, 4, '2018-08-22', '222.00', '222.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114-MKM'),
(12, NULL, 4, 3, '2018-08-22', '1212.00', '1212.00', 'Diesel Advance on Trip33Place:ChennaiVechNo:TN04AS3114');

-- --------------------------------------------------------

--
-- Table structure for table `assl_transentryitems`
--

CREATE TABLE `assl_transentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transentryitems`
--

INSERT INTO `assl_transentryitems` (`id`, `entry_id`, `ledger_id`, `amount`, `dc`, `reconciliation_date`) VALUES
(1, 1, 58, '2000.00', 'C', NULL),
(2, 1, 1, '2000.00', 'D', NULL),
(3, 2, 1, '2000.00', 'C', NULL),
(4, 2, 54, '2000.00', 'D', NULL),
(5, 3, 58, '5000.00', 'C', NULL),
(6, 3, 1, '5000.00', 'D', NULL),
(7, 4, 1, '5000.00', 'C', NULL),
(8, 4, 2, '5000.00', 'D', NULL),
(9, 5, 58, '50000.00', 'C', NULL),
(10, 5, 40, '50000.00', 'D', NULL),
(11, 6, 1, '40000.00', 'C', NULL),
(12, 6, 58, '40000.00', 'D', NULL),
(13, 7, 40, '40000.00', 'D', NULL),
(14, 7, 59, '40000.00', 'C', NULL),
(15, 8, 58, '111.00', 'C', NULL),
(16, 8, 1, '111.00', 'D', NULL),
(17, 9, 1, '111.00', 'C', NULL),
(19, 10, 58, '222.00', 'C', NULL),
(20, 10, 1, '222.00', 'D', NULL),
(21, 11, 1, '222.00', 'C', NULL),
(23, 12, 37, '1212.00', 'C', NULL),
(24, 12, 58, '1212.00', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assl_transentrytypes`
--

CREATE TABLE `assl_transentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transentrytypes`
--

INSERT INTO `assl_transentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `assl_transgroups`
--

CREATE TABLE `assl_transgroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transgroups`
--

INSERT INTO `assl_transgroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assl_transledgers`
--

CREATE TABLE `assl_transledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transledgers`
--

INSERT INTO `assl_transledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '1239093.00', 'D', 0, 0, ''),
(59, 3, 'Income', NULL, '0.00', 'D', 0, 0, ''),
(61, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `assl_translogs`
--

CREATE TABLE `assl_translogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assl_transsettings`
--

CREATE TABLE `assl_transsettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assl_transsettings`
--

INSERT INTO `assl_transsettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASSL Trans', 'Maduranthagam', 'assltrans78@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assl_transtags`
--

CREATE TABLE `assl_transtags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assreferences`
--

CREATE TABLE `assreferences` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaysentries`
--

CREATE TABLE `ass_roadwaysentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwaysentries`
--

INSERT INTO `ass_roadwaysentries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 1, 1, '2018-06-07', '3500.00', '3500.00', 'Trip Advance For Trip1'),
(2, NULL, 2, 1, '2018-06-07', '3500.00', '3500.00', 'Driver Advance For Trip1'),
(3, NULL, 1, 2, '2018-04-01', '2000.00', '2000.00', 'Trip Advance For Trip7'),
(4, NULL, 2, 2, '2018-04-01', '2000.00', '2000.00', 'Driver Advance For Trip7'),
(5, NULL, 1, 3, '2018-04-01', '2000.00', '2000.00', 'Trip Advance For Trip8'),
(6, NULL, 2, 3, '2018-04-01', '2000.00', '2000.00', 'Driver Advance For Trip8'),
(7, NULL, 1, 4, '2018-04-01', '2000.00', '2000.00', 'Trip Advance For Trip9'),
(8, NULL, 2, 4, '2018-04-01', '2000.00', '2000.00', 'Driver Advance For Trip9'),
(9, NULL, 1, 5, '2018-04-01', '4000.00', '4000.00', 'Trip Advance For Trip11'),
(10, NULL, 2, 5, '2018-04-01', '4000.00', '4000.00', 'Driver Advance For Trip11'),
(11, NULL, 1, 6, '2018-04-01', '3500.00', '3500.00', 'Trip Advance For Trip12'),
(12, NULL, 2, 6, '2018-04-01', '3500.00', '3500.00', 'Driver Advance For Trip12'),
(13, NULL, 1, 7, '2018-06-08', '700.00', '700.00', 'Trip Advance For Trip21'),
(14, NULL, 2, 7, '2018-06-08', '700.00', '700.00', 'Driver Advance For Trip21'),
(15, NULL, 1, 8, '2018-06-11', '5000.00', '5000.00', 'Advance Amountc'),
(16, NULL, 1, 9, '2018-04-01', '76800.00', '76800.00', 'Home Halt Advance on Chennai6800 and MKM70000'),
(17, NULL, 2, 8, '2018-04-01', '76800.00', '76800.00', 'Home Halt Advance on Chennai6800 and MKM70000'),
(18, NULL, 1, 10, '2018-04-01', '9797.00', '9797.00', 'Home Halt Advance on Chennai797 and MKM9000'),
(19, NULL, 2, 9, '2018-04-01', '9797.00', '9797.00', 'Home Halt Advance on Chennai797 and MKM9000'),
(20, NULL, 1, 11, '2018-04-01', '14999.00', '14999.00', 'Home Halt Advance on Chennai8000 and MKM6999'),
(21, NULL, 2, 10, '2018-04-01', '14999.00', '14999.00', 'Home Halt Advance on Chennai8000 and MKM6999'),
(22, NULL, 1, 12, '2018-04-01', '15000.00', '15000.00', 'Home Halt Advance on Chennai7000 and MKM8000'),
(23, NULL, 2, 11, '2018-04-01', '15000.00', '15000.00', 'Home Halt Advance on Chennai7000 and MKM8000'),
(24, NULL, 1, 13, '2018-06-12', '2000.00', '2000.00', 'Advance Amountc'),
(25, NULL, 4, 1, '2018-06-12', '1500.00', '1500.00', 'Bill Amount1 '),
(26, NULL, 4, 2, '2018-06-12', '4086.00', '4086.00', 'Bill Amount2 '),
(27, NULL, 1, 14, '2018-06-12', '5000.00', '5000.00', 'Advance Amountc'),
(28, NULL, 1, 15, '2018-06-12', '5586.00', '5586.00', 'Payment for Bill Amount2 '),
(29, NULL, 4, 3, '2018-06-12', '5586.00', '5586.00', 'Payment for Bill Amount2 '),
(30, NULL, 1, 16, '2018-06-13', '1000.00', '1000.00', 'Trip Advance On8Return'),
(31, NULL, 2, 12, '2018-06-13', '1000.00', '1000.00', 'Driver Return Advance For Trip8'),
(32, NULL, 1, 17, '2018-06-18', '10000.00', '10000.00', 'Trip Advance on Trip23Place:VelloreVechNo:TN04AS2218-Chennai'),
(33, NULL, 2, 13, '2018-06-18', '10000.00', '10000.00', 'Trip Advance on Trip23Place:VelloreVechNo:TN04AS2218-Chennai'),
(34, NULL, 4, 4, '2018-06-18', '6000.00', '6000.00', 'Diesel Advance on Trip23Place:VelloreVechNo:TN04AS2218'),
(35, NULL, 1, 18, '2018-06-18', '3000.00', '3000.00', 'On Road Advance For Trip23'),
(36, NULL, 2, 14, '2018-06-18', '3000.00', '3000.00', 'Onroad Driver Advance For Trip23'),
(37, NULL, 4, 5, '2018-06-18', '102400.00', '102400.00', 'Bill Amount3 '),
(38, NULL, 1, 19, '2018-06-18', '25000.00', '25000.00', 'Payment for Bill Amount3 '),
(39, NULL, 4, 6, '2018-06-18', '25000.00', '25000.00', 'Payment for Bill Amount3 '),
(40, NULL, 1, 20, '2018-06-18', '600.00', '600.00', 'Payment for Bill Amount3 '),
(41, NULL, 4, 7, '2018-06-18', '600.00', '600.00', 'Payment for Bill Amount3 '),
(42, NULL, 1, 21, '2018-06-26', '10000.00', '10000.00', 'Tollplaza'),
(43, NULL, 1, 22, '2018-07-13', '69.00', '69.00', 'Payment for Bill Amount3 '),
(44, NULL, 4, 8, '2018-07-13', '69.00', '69.00', 'Payment for Bill Amount3 '),
(45, NULL, 4, 9, '2018-07-13', '6000.00', '6000.00', 'Bill Amount4 '),
(46, NULL, 1, 23, '2018-07-24', '5300.00', '5300.00', 'Payment for Bill Amount4 '),
(47, NULL, 4, 10, '2018-07-24', '5300.00', '5300.00', 'Payment for Bill Amount4 '),
(48, NULL, 4, 11, '2018-08-09', '70000.00', '70000.00', 'Bill Amount6 '),
(49, NULL, 1, 24, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181-Chennai'),
(50, NULL, 2, 15, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181-Chennai'),
(51, NULL, 1, 25, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181-MKM'),
(52, NULL, 2, 16, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181-MKM'),
(53, NULL, 4, 12, '2018-08-13', '100.00', '100.00', 'Diesel Advance on Trip28Place:MadhepuraVechNo:TN19U0181'),
(54, NULL, 1, 26, '2018-08-13', '900.00', '900.00', 'Trip Advance On28Return'),
(55, NULL, 2, 17, '2018-08-13', '900.00', '900.00', 'Driver Return Advance For Trip29'),
(56, NULL, 1, 27, '2018-08-13', '700.00', '700.00', 'On Road Advance For Trip28'),
(57, NULL, 2, 18, '2018-08-13', '700.00', '700.00', 'Onroad Driver Advance For Trip28'),
(58, NULL, 1, 28, '2018-08-13', '1300.00', '1300.00', 'Home Halt Advance on Chennai700 and MKM600'),
(59, NULL, 2, 19, '2018-08-13', '1300.00', '1300.00', 'Home Halt Advance on Chennai700 and MKM600'),
(60, NULL, 1, 29, '2018-08-13', '3000.00', '3000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196-Chennai'),
(61, NULL, 2, 20, '2018-08-13', '3000.00', '3000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196-Chennai'),
(62, NULL, 1, 30, '2018-08-13', '1000.00', '1000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196-MKM'),
(63, NULL, 2, 21, '2018-08-13', '1000.00', '1000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196-MKM'),
(64, NULL, 4, 13, '2018-08-13', '7200.00', '7200.00', 'Diesel Advance on Trip29Place:CoimbatoreVechNo:TN21L9196'),
(65, NULL, 1, 31, '2018-08-12', '2000.00', '2000.00', 'On Road Advance For Trip25'),
(66, NULL, 2, 22, '2018-08-12', '2000.00', '2000.00', 'Onroad Driver Advance For Trip25'),
(67, NULL, 1, 32, '2018-08-13', '10000.00', '10000.00', 'Tollplaza'),
(68, NULL, 1, 33, '2018-08-13', '50000.00', '50000.00', 'Payment for Bill Amount6 '),
(69, NULL, 4, 14, '2018-08-13', '50000.00', '50000.00', 'Payment for Bill Amount6 '),
(70, NULL, 1, 34, '2018-08-14', '2000.00', '2000.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181-Chennai'),
(71, NULL, 2, 23, '2018-08-14', '2000.00', '2000.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181-Chennai'),
(72, NULL, 1, 35, '2018-08-14', '200.00', '200.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181-MKM'),
(73, NULL, 2, 24, '2018-08-14', '200.00', '200.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181-MKM'),
(74, NULL, 4, 15, '2018-08-14', '100.00', '100.00', 'Diesel Advance on Trip30Place:VechNo:TN19U0181'),
(75, NULL, 1, 36, '2018-08-14', '50000.00', '50000.00', 'Trip Advance on Trip31Place:TapiVechNo:TN21AY3063-Chennai'),
(76, NULL, 2, 25, '2018-08-14', '50000.00', '50000.00', 'Trip Advance on Trip31Place:TapiVechNo:TN21AY3063-Chennai'),
(77, NULL, 1, 37, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218-Chennai'),
(78, NULL, 2, 26, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218-Chennai'),
(79, NULL, 1, 38, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218-MKM'),
(80, NULL, 2, 27, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218-MKM'),
(81, NULL, 4, 16, '2018-08-16', '500.00', '500.00', 'Diesel Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaysentryitems`
--

CREATE TABLE `ass_roadwaysentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwaysentryitems`
--

INSERT INTO `ass_roadwaysentryitems` (`id`, `entry_id`, `ledger_id`, `amount`, `dc`, `reconciliation_date`) VALUES
(1, 1, 58, '3500.00', 'C', NULL),
(2, 1, 1, '3500.00', 'D', NULL),
(3, 2, 1, '3500.00', 'C', NULL),
(4, 2, 8, '3500.00', 'D', NULL),
(5, 3, 58, '2000.00', 'C', NULL),
(6, 3, 1, '2000.00', 'D', NULL),
(7, 4, 1, '2000.00', 'C', NULL),
(8, 4, 46, '2000.00', 'D', NULL),
(9, 5, 58, '2000.00', 'C', NULL),
(10, 5, 1, '2000.00', 'D', NULL),
(11, 6, 1, '2000.00', 'C', NULL),
(12, 6, 9, '2000.00', 'D', NULL),
(13, 7, 58, '2000.00', 'C', NULL),
(14, 7, 1, '2000.00', 'D', NULL),
(15, 8, 1, '2000.00', 'C', NULL),
(16, 8, 49, '2000.00', 'D', NULL),
(17, 9, 58, '4000.00', 'C', NULL),
(18, 9, 1, '4000.00', 'D', NULL),
(19, 10, 1, '4000.00', 'C', NULL),
(20, 10, 15, '4000.00', 'D', NULL),
(21, 11, 58, '3500.00', 'C', NULL),
(22, 11, 1, '3500.00', 'D', NULL),
(23, 12, 1, '3500.00', 'C', NULL),
(24, 12, 19, '3500.00', 'D', NULL),
(25, 13, 58, '700.00', 'C', NULL),
(26, 13, 1, '700.00', 'D', NULL),
(27, 14, 1, '700.00', 'C', NULL),
(28, 14, 47, '700.00', 'D', NULL),
(29, 15, 1, '5000.00', 'C', NULL),
(30, 15, 58, '5000.00', 'D', NULL),
(31, 16, 58, '76800.00', 'C', NULL),
(32, 16, 1, '76800.00', 'D', NULL),
(33, 17, 1, '76800.00', 'C', NULL),
(34, 17, 3, '76800.00', 'D', NULL),
(35, 18, 58, '9797.00', 'C', NULL),
(36, 18, 1, '9797.00', 'D', NULL),
(37, 19, 1, '9797.00', 'C', NULL),
(38, 19, 4, '9797.00', 'D', NULL),
(39, 20, 58, '14999.00', 'C', NULL),
(40, 20, 1, '14999.00', 'D', NULL),
(41, 21, 1, '14999.00', 'C', NULL),
(42, 21, 19, '14999.00', 'D', NULL),
(43, 22, 58, '15000.00', 'C', NULL),
(44, 22, 1, '15000.00', 'D', NULL),
(45, 23, 1, '15000.00', 'C', NULL),
(46, 23, 17, '15000.00', 'D', NULL),
(47, 24, 1, '2000.00', 'C', NULL),
(48, 24, 58, '2000.00', 'D', NULL),
(49, 25, 58, '1500.00', 'C', NULL),
(50, 25, 40, '1500.00', 'D', NULL),
(51, 26, 58, '4086.00', 'C', NULL),
(52, 26, 40, '4086.00', 'D', NULL),
(53, 27, 1, '5000.00', 'C', NULL),
(54, 27, 58, '5000.00', 'D', NULL),
(55, 28, 1, '5586.00', 'C', NULL),
(56, 28, 58, '5586.00', 'D', NULL),
(57, 29, 40, '5586.00', 'D', NULL),
(58, 29, 60, '5586.00', 'C', NULL),
(59, 30, 58, '1000.00', 'C', NULL),
(60, 30, 1, '1000.00', 'D', NULL),
(61, 31, 1, '1000.00', 'C', NULL),
(62, 31, 9, '1000.00', 'D', NULL),
(63, 32, 58, '10000.00', 'C', NULL),
(64, 32, 1, '10000.00', 'D', NULL),
(65, 33, 1, '10000.00', 'C', NULL),
(66, 33, 15, '10000.00', 'D', NULL),
(67, 34, 37, '6000.00', 'C', NULL),
(68, 34, 58, '6000.00', 'D', NULL),
(69, 35, 58, '3000.00', 'C', NULL),
(70, 35, 1, '3000.00', 'D', NULL),
(71, 36, 1, '3000.00', 'C', NULL),
(72, 36, 15, '3000.00', 'D', NULL),
(73, 37, 58, '102400.00', 'C', NULL),
(74, 37, 40, '102400.00', 'D', NULL),
(75, 38, 1, '25000.00', 'C', NULL),
(76, 38, 58, '25000.00', 'D', NULL),
(77, 39, 40, '25000.00', 'D', NULL),
(78, 39, 60, '25000.00', 'C', NULL),
(79, 40, 1, '600.00', 'C', NULL),
(80, 40, 58, '600.00', 'D', NULL),
(81, 41, 40, '600.00', 'D', NULL),
(82, 41, 60, '600.00', 'C', NULL),
(83, 42, 1, '10000.00', 'C', NULL),
(84, 42, 58, '10000.00', 'D', NULL),
(85, 43, 1, '69.00', 'C', NULL),
(86, 43, 58, '69.00', 'D', NULL),
(87, 44, 40, '69.00', 'D', NULL),
(88, 44, 60, '69.00', 'C', NULL),
(89, 45, 58, '6000.00', 'C', NULL),
(90, 45, 40, '6000.00', 'D', NULL),
(91, 46, 1, '5300.00', 'C', NULL),
(92, 46, 58, '5300.00', 'D', NULL),
(93, 47, 40, '5300.00', 'D', NULL),
(94, 47, 60, '5300.00', 'C', NULL),
(95, 48, 58, '70000.00', 'C', NULL),
(96, 48, 40, '70000.00', 'D', NULL),
(97, 49, 58, '100.00', 'C', NULL),
(98, 49, 1, '100.00', 'D', NULL),
(99, 50, 1, '100.00', 'C', NULL),
(100, 50, 5, '100.00', 'D', NULL),
(101, 51, 58, '100.00', 'C', NULL),
(102, 51, 1, '100.00', 'D', NULL),
(103, 52, 1, '100.00', 'C', NULL),
(104, 52, 5, '100.00', 'D', NULL),
(105, 53, 37, '100.00', 'C', NULL),
(106, 53, 58, '100.00', 'D', NULL),
(108, 54, 1, '900.00', 'D', NULL),
(109, 55, 1, '900.00', 'C', NULL),
(110, 55, 5, '900.00', 'D', NULL),
(111, 56, 58, '700.00', 'C', NULL),
(112, 56, 1, '700.00', 'D', NULL),
(113, 57, 1, '700.00', 'C', NULL),
(114, 57, 5, '700.00', 'D', NULL),
(115, 58, 58, '1300.00', 'C', NULL),
(116, 58, 1, '1300.00', 'D', NULL),
(117, 59, 1, '1300.00', 'C', NULL),
(118, 59, 5, '1300.00', 'D', NULL),
(119, 60, 58, '3000.00', 'C', NULL),
(120, 60, 1, '3000.00', 'D', NULL),
(121, 61, 1, '3000.00', 'C', NULL),
(122, 61, 2, '3000.00', 'D', NULL),
(123, 62, 58, '1000.00', 'C', NULL),
(124, 62, 1, '1000.00', 'D', NULL),
(125, 63, 1, '1000.00', 'C', NULL),
(126, 63, 2, '1000.00', 'D', NULL),
(127, 64, 37, '7200.00', 'C', NULL),
(128, 64, 58, '7200.00', 'D', NULL),
(129, 65, 58, '2000.00', 'C', NULL),
(130, 65, 1, '2000.00', 'D', NULL),
(131, 66, 1, '2000.00', 'C', NULL),
(133, 67, 1, '10000.00', 'C', NULL),
(134, 67, 58, '10000.00', 'D', NULL),
(135, 68, 1, '50000.00', 'C', NULL),
(136, 68, 58, '50000.00', 'D', NULL),
(137, 69, 40, '50000.00', 'D', NULL),
(138, 69, 60, '50000.00', 'C', NULL),
(139, 70, 58, '2000.00', 'C', NULL),
(140, 70, 1, '2000.00', 'D', NULL),
(141, 71, 1, '2000.00', 'C', NULL),
(142, 71, 5, '2000.00', 'D', NULL),
(143, 72, 58, '200.00', 'C', NULL),
(144, 72, 1, '200.00', 'D', NULL),
(145, 73, 1, '200.00', 'C', NULL),
(146, 73, 5, '200.00', 'D', NULL),
(147, 74, 37, '100.00', 'C', NULL),
(148, 74, 58, '100.00', 'D', NULL),
(149, 75, 58, '50000.00', 'C', NULL),
(150, 75, 1, '50000.00', 'D', NULL),
(151, 76, 1, '50000.00', 'C', NULL),
(152, 76, 8, '50000.00', 'D', NULL),
(153, 77, 58, '1000.00', 'C', NULL),
(154, 77, 1, '1000.00', 'D', NULL),
(155, 78, 1, '1000.00', 'C', NULL),
(156, 78, 15, '1000.00', 'D', NULL),
(157, 79, 58, '1000.00', 'C', NULL),
(158, 79, 1, '1000.00', 'D', NULL),
(159, 80, 1, '1000.00', 'C', NULL),
(160, 80, 15, '1000.00', 'D', NULL),
(161, 81, 37, '500.00', 'C', NULL),
(162, 81, 58, '500.00', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaysentrytypes`
--

CREATE TABLE `ass_roadwaysentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwaysentrytypes`
--

INSERT INTO `ass_roadwaysentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaysgroups`
--

CREATE TABLE `ass_roadwaysgroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwaysgroups`
--

INSERT INTO `ass_roadwaysgroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaysledgers`
--

CREATE TABLE `ass_roadwaysledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwaysledgers`
--

INSERT INTO `ass_roadwaysledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '3458059.00', 'D', 0, 0, ''),
(59, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, ''),
(60, 3, 'Income', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwayslogs`
--

CREATE TABLE `ass_roadwayslogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwayssettings`
--

CREATE TABLE `ass_roadwayssettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadwayssettings`
--

INSERT INTO `ass_roadwayssettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways', 'Madurantakam', 'assroadways@yahoo.com', '2018-05-01', '2019-04-30', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadwaystags`
--

CREATE TABLE `ass_roadwaystags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banuentries`
--

CREATE TABLE `ass_roadways_-_banuentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_banuentries`
--

INSERT INTO `ass_roadways_-_banuentries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 1, 1, '2018-06-08', '1000.00', '1000.00', 'Trip Advance For Trip18'),
(2, NULL, 2, 1, '2018-06-08', '1000.00', '1000.00', 'Driver Advance For Trip18');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banuentryitems`
--

CREATE TABLE `ass_roadways_-_banuentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banuentrytypes`
--

CREATE TABLE `ass_roadways_-_banuentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_banuentrytypes`
--

INSERT INTO `ass_roadways_-_banuentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banugroups`
--

CREATE TABLE `ass_roadways_-_banugroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_banugroups`
--

INSERT INTO `ass_roadways_-_banugroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banuledgers`
--

CREATE TABLE `ass_roadways_-_banuledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_banuledgers`
--

INSERT INTO `ass_roadways_-_banuledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '1652124.00', 'D', 0, 0, ''),
(59, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, ''),
(60, 3, 'Income', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banulogs`
--

CREATE TABLE `ass_roadways_-_banulogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banusettings`
--

CREATE TABLE `ass_roadways_-_banusettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_banusettings`
--

INSERT INTO `ass_roadways_-_banusettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways - Banu', 'Maduranthagam', 'assroadwaysbanu@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_banutags`
--

CREATE TABLE `ass_roadways_-_banutags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshentries`
--

CREATE TABLE `ass_roadways_-_mageshentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshentryitems`
--

CREATE TABLE `ass_roadways_-_mageshentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshentrytypes`
--

CREATE TABLE `ass_roadways_-_mageshentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_mageshentrytypes`
--

INSERT INTO `ass_roadways_-_mageshentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshgroups`
--

CREATE TABLE `ass_roadways_-_mageshgroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_mageshgroups`
--

INSERT INTO `ass_roadways_-_mageshgroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshledgers`
--

CREATE TABLE `ass_roadways_-_mageshledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_mageshledgers`
--

INSERT INTO `ass_roadways_-_mageshledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '0.00', 'D', 0, 0, ''),
(59, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, ''),
(60, 3, 'Income', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshlogs`
--

CREATE TABLE `ass_roadways_-_mageshlogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshsettings`
--

CREATE TABLE `ass_roadways_-_mageshsettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_mageshsettings`
--

INSERT INTO `ass_roadways_-_mageshsettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways - Magesh', 'Madurantakam', 'assrashok@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_mageshtags`
--

CREATE TABLE `ass_roadways_-_mageshtags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukaentries`
--

CREATE TABLE `ass_roadways_-_renukaentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukaentryitems`
--

CREATE TABLE `ass_roadways_-_renukaentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukaentrytypes`
--

CREATE TABLE `ass_roadways_-_renukaentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_renukaentrytypes`
--

INSERT INTO `ass_roadways_-_renukaentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukagroups`
--

CREATE TABLE `ass_roadways_-_renukagroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_renukagroups`
--

INSERT INTO `ass_roadways_-_renukagroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukaledgers`
--

CREATE TABLE `ass_roadways_-_renukaledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_renukaledgers`
--

INSERT INTO `ass_roadways_-_renukaledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(59, 11, 'Ass Logistics', NULL, '331938.00', 'D', 0, 0, ''),
(60, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, ''),
(61, 3, 'Income', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukalogs`
--

CREATE TABLE `ass_roadways_-_renukalogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukasettings`
--

CREATE TABLE `ass_roadways_-_renukasettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_renukasettings`
--

INSERT INTO `ass_roadways_-_renukasettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways - Renuka', 'Maduranthagam', 'assroadwaysrenuka@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_renukatags`
--

CREATE TABLE `ass_roadways_-_renukatags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshentries`
--

CREATE TABLE `ass_roadways_-_sureshentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshentries`
--

INSERT INTO `ass_roadways_-_sureshentries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 1, 1, '2018-06-08', '5000.00', '5000.00', 'Trip Advance For Trip19'),
(2, NULL, 2, 1, '2018-06-08', '5000.00', '5000.00', 'Driver Advance For Trip19'),
(3, NULL, 1, 1, '2018-06-08', '5000.00', '5000.00', 'Trip Advance For Trip19'),
(4, NULL, 2, 1, '2018-06-08', '5000.00', '5000.00', 'Driver Advance For Trip19'),
(5, NULL, 1, 2, '2018-06-08', '5000.00', '5000.00', 'Trip Advance For Trip19'),
(6, NULL, 2, 2, '2018-06-08', '5000.00', '5000.00', 'Driver Advance For Trip19'),
(7, NULL, 1, 3, '2018-06-08', '1000.00', '1000.00', 'Trip Advance For Trip22'),
(8, NULL, 2, 3, '2018-06-08', '1000.00', '1000.00', 'Driver Advance For Trip22');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshentryitems`
--

CREATE TABLE `ass_roadways_-_sureshentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshentryitems`
--

INSERT INTO `ass_roadways_-_sureshentryitems` (`id`, `entry_id`, `ledger_id`, `amount`, `dc`, `reconciliation_date`) VALUES
(9, 5, 59, '5000.00', 'C', NULL),
(10, 5, 1, '5000.00', 'D', NULL),
(11, 6, 1, '5000.00', 'C', NULL),
(12, 6, 8, '5000.00', 'D', NULL),
(13, 7, 59, '1000.00', 'C', NULL),
(14, 7, 1, '1000.00', 'D', NULL),
(15, 8, 1, '1000.00', 'C', NULL),
(16, 8, 15, '1000.00', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshentrytypes`
--

CREATE TABLE `ass_roadways_-_sureshentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshentrytypes`
--

INSERT INTO `ass_roadways_-_sureshentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshgroups`
--

CREATE TABLE `ass_roadways_-_sureshgroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshgroups`
--

INSERT INTO `ass_roadways_-_sureshgroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshledgers`
--

CREATE TABLE `ass_roadways_-_sureshledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshledgers`
--

INSERT INTO `ass_roadways_-_sureshledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(59, 11, 'Ass Logistics', NULL, '3385341.00', 'D', 0, 0, ''),
(60, 3, 'Income', NULL, '0.00', 'D', 0, 0, ''),
(61, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshlogs`
--

CREATE TABLE `ass_roadways_-_sureshlogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshsettings`
--

CREATE TABLE `ass_roadways_-_sureshsettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_sureshsettings`
--

INSERT INTO `ass_roadways_-_sureshsettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways - Suresh', 'Madurantakam', 'assrsuresh@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_sureshtags`
--

CREATE TABLE `ass_roadways_-_sureshtags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umaentries`
--

CREATE TABLE `ass_roadways_-_umaentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umaentries`
--

INSERT INTO `ass_roadways_-_umaentries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 1, 1, '2018-06-08', '100.00', '100.00', 'Trip Advance For Trip20'),
(2, NULL, 2, 1, '2018-06-08', '100.00', '100.00', 'Driver Advance For Trip20');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umaentryitems`
--

CREATE TABLE `ass_roadways_-_umaentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umaentryitems`
--

INSERT INTO `ass_roadways_-_umaentryitems` (`id`, `entry_id`, `ledger_id`, `amount`, `dc`, `reconciliation_date`) VALUES
(1, 1, 58, '100.00', 'C', NULL),
(2, 1, 1, '100.00', 'D', NULL),
(3, 2, 1, '100.00', 'C', NULL),
(4, 2, 21, '100.00', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umaentrytypes`
--

CREATE TABLE `ass_roadways_-_umaentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umaentrytypes`
--

INSERT INTO `ass_roadways_-_umaentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umagroups`
--

CREATE TABLE `ass_roadways_-_umagroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umagroups`
--

INSERT INTO `ass_roadways_-_umagroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umaledgers`
--

CREATE TABLE `ass_roadways_-_umaledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umaledgers`
--

INSERT INTO `ass_roadways_-_umaledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '1239093.00', 'D', 0, 0, ''),
(59, 3, 'Income', NULL, '0.00', 'D', 0, 0, ''),
(60, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umalogs`
--

CREATE TABLE `ass_roadways_-_umalogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umasettings`
--

CREATE TABLE `ass_roadways_-_umasettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ass_roadways_-_umasettings`
--

INSERT INTO `ass_roadways_-_umasettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'ASS Roadways - Uma', 'Maduranthagam', 'assroadwaysuma@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ass_roadways_-_umatags`
--

CREATE TABLE `ass_roadways_-_umatags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accno` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_nme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `intAdminId`, `name`, `accno`, `ifsc`, `comp_nme`, `cust_id`, `city`, `area`, `address`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Axis Bank Ltd', '', '', '', '', '', '', '', 0, NULL, NULL),
(2, 1, 'ICICI Bank', '', '', '', '', '', '', '', 0, NULL, NULL),
(4, 1, 'Kotak Mahindra Bank', '', '', '', '', '', '', '', 0, NULL, NULL),
(5, 1, 'Indusind Bank', '', '', '', '', '', '', '', 0, NULL, NULL),
(6, 1, 'State Bank Of India', '', '', '', '', '', '', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bank_records`
--

CREATE TABLE `bank_records` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accno` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comp_nme` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cust_id` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_records`
--

INSERT INTO `bank_records` (`id`, `intAdminId`, `name`, `accno`, `ifsc`, `comp_nme`, `cust_id`, `city`, `area`, `address`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 1, 'Axis Bank Ltd', '914020015148894', 'UTIB0001120', 'Ass Roadways', 'TRANSP5419', '', '', '', 0, NULL, NULL),
(2, 1, 'Axis Bank Ltd', '914020015148894', 'UTIB000120', 'ASS Roadways', 'TRANSP6825', '', '', '', 0, NULL, NULL),
(3, 1, 'State Bank Of India', '37654655188', 'SBIN0000965', 'Sureshkumar', 'TRANSP8274', '', '', '', 0, NULL, NULL),
(7, 1, 'State Bank Of India', '37657545558', 'SBIN0000965', 'Banumathi', 'TRANSP9807', '', '', '', 0, NULL, NULL),
(11, 1, 'Axis Bank Ltd', '8523698541', 'SBI852369', 'Sara66', 'COMP8035', '', '', '', 0, NULL, NULL),
(12, 1, 'ICICI Bank', '99000', 'ASAW3345', 'Gorgo', 'COMP8141', '', '', '', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactName` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobNum` bigint(50) NOT NULL,
  `PhNum` bigint(50) NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ServiceTaxNo` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstNo` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cstNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinCode` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comp_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `intAdminId`, `name`, `contactName`, `MobNum`, `PhNum`, `email`, `ServiceTaxNo`, `gstNo`, `cstNo`, `panNo`, `state`, `city`, `area`, `address`, `pinCode`, `created_at`, `updated_at`, `comp_id`) VALUES
(12, 1, 'Ass Logistics', 'asdas', 4564686465, 9785254512, 'admin@gmail.com', '', 'asdasdas', '', 'dasda', '1', '1', 'asdasdas', 'dasdasdas', 56651561, NULL, NULL, 'COMP1729');

-- --------------------------------------------------------

--
-- Table structure for table `consignees`
--

CREATE TABLE `consignees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consigners`
--

CREATE TABLE `consigners` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contra_entries`
--

CREATE TABLE `contra_entries` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `from_ledger` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `to_ledger` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(220) NOT NULL,
  `alias` varchar(50) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `comm_id` varchar(100) NOT NULL,
  `billtype` varchar(100) NOT NULL,
  `mobNum` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `servicetax` varchar(200) NOT NULL,
  `gstNo` varchar(150) NOT NULL,
  `cstNo` varchar(150) NOT NULL,
  `panNo` varchar(150) NOT NULL,
  `aadhar` varchar(50) NOT NULL,
  `state` int(50) NOT NULL,
  `city` int(50) NOT NULL,
  `area` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pinCode` int(100) NOT NULL,
  `pref_1` int(10) NOT NULL,
  `pref_2` int(10) NOT NULL,
  `pref_3` int(10) NOT NULL,
  `aadhar_upld` varchar(100) NOT NULL,
  `ledger_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `intAdminId`, `name`, `alias`, `cust_name`, `comm_id`, `billtype`, `mobNum`, `email`, `servicetax`, `gstNo`, `cstNo`, `panNo`, `aadhar`, `state`, `city`, `area`, `address`, `pinCode`, `pref_1`, `pref_2`, `pref_3`, `aadhar_upld`, `ledger_id`) VALUES
(1, 1, 'Adichiamman Transports', '', 'Ramu', '6564', '', '9841731502', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '#2/465, Agathiyar Street, Mugappair East, Chennai', 600037, 0, 0, 0, '', '63'),
(2, 1, 'Alwin Cargo Pvt. Ltd.', '', 'Buvanendran', '9105', '', '9841207878', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '64'),
(3, 1, 'Arsha Logistics', '', 'Hasan', '4751', '', '9176454999', 'primesms1@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '111A, IInd Floor, Annasalai, Chennai', 600032, 0, 0, 0, '', '65'),
(4, 1, 'Cargo Container Carrier', '', 'Cargo Container Carrier', '4588', '', '111111111111111', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '66'),
(5, 1, 'Ensen Shippings', '', 'Venkatesan', '9347', '', '9840080860', 'admin@ensenshippings.com, venkateshensen@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '109/223, Second Floor,  Thambuchetty Street, Chennai, Phone - 044 25250045 / 044 25250009', 600001, 0, 0, 0, '', '67'),
(6, 1, 'F5 Carrier', '', 'Magesh', '8315', '', '9884242422', 'f5carriers.chennai@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '68'),
(7, 1, 'Fynsea Lines and Logistics Pvt. Ltd.', '', 'Shanugam', '5301', '', '9444044432', 'chatpt@fynsea.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Suite No : 13A, IInd Floor, Wellingdon Estate,No: 53, Ethiraj Salai, Egmore, Chennai', 600008, 0, 0, 0, '', '69'),
(8, 1, 'Gee Krishna Transport', '', 'Namperumal', '3818', '', '7601974889', 'geektrans@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Manjambakkam', 'Manjambakkam, Chennai', 0, 0, 0, 0, '', '70'),
(9, 1, 'G.K Logistics', '', 'Moorthy', '2728', '', '9566276396', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Triplicane', 'Triplicane, Chennai', 600014, 0, 0, 0, '', '71'),
(10, 1, 'Gokul Transport', '', 'Gokul', '4136', '', '9841075022', 'gokultrans76@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Chennai', 600001, 0, 0, 0, '', '72'),
(11, 1, 'Hari Om Transports', '', 'Hari Om Transports', '9303', '', '111111111111111', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '73'),
(12, 1, 'Help Cargo Carriers', '', 'Babu', '8253', '', '9600078343', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Manndy, Chennai', 600001, 0, 0, 0, '', '74'),
(13, 1, 'Insha Transport', '', 'Mani', '9136', '', '9841027865', 'inshatransport@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '51/52, Appolo Armstrong Nagar, Chinna Mathur', 600068, 0, 0, 0, '', '75'),
(14, 1, 'Karthi Transport', '', 'Karthi Transport', '6716', '', '111111111111111', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '76'),
(15, 1, 'Kingfisher Logistics', '', 'Buvanendran', '5297', '', '9841207878', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Manndy, Chennai', 600001, 0, 0, 0, '', '77'),
(16, 1, 'KPS and Co', '', 'Baskar', '5713', '', '8754540010', 'gm@kpsgroups.net', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '12/21, 2nd Line Beach, Chennai', 600001, 0, 0, 0, '', '78'),
(17, 1, 'KRD Transports', '', 'Buvanendran', '8566', '', '9841207878', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '79'),
(18, 1, 'Kumaar Transport', '', 'Sathish', '8872', '', '9840987558', 'kumaartransports@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Manjambakkam, Chennai', 0, 0, 0, 0, '', '80'),
(19, 1, 'Lakshmi Cargo Company Ltd.', '', 'Sathya', '1058', '', '9003030530', 'transportche@lakshmicargo.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Unit-5, 3rd Floor, Raja Annamalai Building, No.72, Rukmani Lakshmipathy Road, Egmore, Chennai', 600028, 1, 1, 0, '', '81'),
(20, 1, 'Logsol Pvt. Ltd.', '', 'Hasan', '6508', '', '9176454999', 'primesms1@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '#4/64, 4th Street, Ganga Nagar, Kodambakkam, Chennai', 6000024, 0, 0, 0, '', '82'),
(21, 1, 'Metro Logistics', '', 'Buvanendran', '2908', '', '9841207878', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Manndy, Chennai', 600001, 0, 0, 0, '', '83'),
(22, 1, 'Murugan Transports', '', 'Buvanendran', '1822', '', '9841207878', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Manndy, Chennai', 600001, 0, 0, 0, '', '84'),
(23, 1, 'Namakkal South India Transports', '', 'Sivakumar', '8130', '', '9840133710', 'namakkalvsnl@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'SMJ Parrys Plaza, 2-E 2nd Floor, 28 Second Line Beach, Chennai', 600001, 0, 0, 0, '', '85'),
(24, 1, 'Nikhil Logistics', '', 'Ramesh Verma', '8586', '', '9841002639', 'nikhil.logistics@yahoo.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '2nd Floor, Walltax Road, Chennai', 0, 0, 0, 0, '', '86'),
(25, 1, 'Oceanus Transports', '', 'Shahul', '9339', '', '9003210398', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Sathyamoorthy Nagar, Manali, Chennai', 0, 0, 0, 0, '', '87'),
(26, 1, 'PSTS Heavy Lift and ShiftLtd.', '', 'Kannan', '1657', '', '9840093119', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Wavoo Mansion, II Floor, 48, RajajiSalai, Chennai', 600001, 0, 0, 0, '', '88'),
(27, 1, 'Raja Transports', '', 'Raja', '7829', '', '9710909077', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Manndy, Chennai', 600001, 0, 0, 0, '', '89'),
(28, 1, 'Royal Logistics', '', 'Ramesh Verma', '3818', '', '9841002639', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '2nd Floor, Walltax Road, Chennai', 0, 0, 0, 0, '', '90'),
(29, 1, 'RSG Movers Pvt. Ltd.', '', 'Rajesh MD', '4501', '', '9840024561', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '38/50, 2nd Floor, Rajaji Salai, Chennai', 600001, 0, 0, 0, '', '91'),
(30, 1, 'R S Transport', '', 'Raju', '7214', '', '893990716', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '92'),
(31, 1, 'RSU Transport', '', 'Shanugam', '3942', '', '9790563302', 'rsutrans@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '93'),
(32, 1, 'Shreyas Relay Systems', '', 'Dinesh', '9074', '', '9790563302', 'dineshkumar.srs@transworld.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Transworld House - Annexe, No.2, 9th Lane, Dr. Radhakrishnana Salai, Mylapore, Chennai', 600004, 1, 0, 1, '', '94'),
(33, 1, 'Sri Angalaparameshwari Transport', '', 'Rajkumar', '4320', '', '9884032823', 'rcalogistics333@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Thambuchetty Street, Chennai', 600001, 0, 0, 0, '', '95'),
(34, 1, 'Sri Murugan Logistics', '', 'Buvanendran', '2142', '', '9841207878', 'rsutrans@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '96'),
(35, 1, 'Sri Sai Logistics', '', 'Agarwal', '9192', '', '7812005600', 'sri_sailogistics@yahoo.in', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Madhavaram, Chennai', 0, 0, 0, 0, '', '97'),
(36, 1, 'SRS Cargo Logistics India Ltd.,', '', 'Chandramohan', '7313', '', '9840863633', 'chandermohan@srscargo.org', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', '4/16, Gandhi Avenue, Ground Floor, Gangadeeshwar Koil Street, Purasawalkam, Chennai', 600084, 0, 0, 0, '', '98'),
(37, 1, 'SST Karthick Trans', '', 'Karthick', '7679', '', 'Karthick', 'sstkarthik007@gmail.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'AM Tower, # 36/239, Angappan Naicken Street', 600001, 0, 0, 0, '', '99'),
(38, 1, 'Swamy Saranam Transport', '', 'Murugesan', '4379', '', '9080965652', '', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Chennai', 0, 0, 0, 0, '', '100'),
(39, 1, 'Venus Roadlines', '', 'Visu', '9340', '', '9884509933', 'venus_vrl@yahoo.com', '', '111111111111111', '', '1111111111', '111111111111111', 31, 498, 'Chennai', 'Corelmerchant Street, Chennai', 600001, 0, 0, 0, '', '101');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pan_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lr_gc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iwb_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_bill_det`
--

CREATE TABLE `customer_bill_det` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `trip_invoice` varchar(30) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `advance` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `billing_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_bill_det`
--

INSERT INTO `customer_bill_det` (`id`, `intAdminId`, `trip_invoice`, `cust_id`, `amount`, `advance`, `balance`, `billing_id`, `ent_date`) VALUES
(1, 1, '1', 'Lakshmi Cargo Company Ltd.', '23000', '0', '23000', 'Bill1', '2018-06-11'),
(2, 1, '23', 'Gee Krishna Transport', '70000', '12000', '58000', 'Bill2', '2018-06-18'),
(3, 1, '24', 'KRD Transports', '50000', '10000', '40000', 'Bill3', '2018-07-17'),
(4, 1, '8', 'Fynsea Lines and Logistics Pvt', '8000', '0', '8000', 'Bill4', '2018-07-24'),
(5, 1, '28', 'Adichiamman Transports', '1896', '500', '1396', 'Bill5', '2018-08-13');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `ent_date` date NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `vouch_id` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `voucher_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`id`, `intAdminId`, `cust_id`, `amount`, `ent_date`, `invoice_no`, `vouch_id`, `pay_type`, `account_no`, `remarks`, `voucher_type`) VALUES
(1, 1, 'Lakshmi Cargo Company Ltd.', '23000', '2018-06-11', 'Bill1', '', 'Cash', 'NULL', 'Payment', ''),
(2, 1, 'Gee Krishna Transport', '10000', '2018-07-13', 'Bill2', '', 'Cash', 'NULL', 'hughuj', ''),
(3, 1, 'Gee Krishna Transport', '10000', '2018-07-13', 'Bill2', '', 'Cash', 'NULL', '', ''),
(4, 1, 'KRD Transports', '30000', '2018-07-17', 'Bill3', '', 'Cash', 'NULL', 'Pending Amount', ''),
(5, 1, 'Adichiamman Transports', '1000', '2018-08-13', 'Bill5', '', 'Cash', 'NULL', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `dieseldetails`
--

CREATE TABLE `dieseldetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `gcentry_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `DistCode` int(11) NOT NULL,
  `StCode` int(11) DEFAULT NULL,
  `DistrictName` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`DistCode`, `StCode`, `DistrictName`) VALUES
(2, 1, 'South Andama'),
(3, 1, 'Nicobar'),
(4, 2, 'Anantapur'),
(5, 2, 'Chittoor'),
(6, 2, 'East Godavari'),
(7, 2, 'Guntur'),
(8, 2, 'Krishna'),
(9, 2, 'Kurnool'),
(10, 2, 'Prakasam'),
(11, 2, 'Srikakulam'),
(12, 2, 'Sri Potti Sri Ramulu Nellore'),
(13, 2, 'Vishakhapatnam'),
(14, 2, 'Vizianagaram'),
(15, 2, 'West Godavari'),
(16, 2, 'Cudappah'),
(17, 3, 'Anjaw'),
(18, 3, 'Changlang'),
(19, 3, 'East Siang'),
(20, 3, 'East Kameng'),
(21, 3, 'Kurung Kumey'),
(22, 3, 'Lohit'),
(23, 3, 'Lower Dibang Valley'),
(24, 3, 'Lower Subansiri'),
(25, 3, 'Papum Pare'),
(26, 3, 'Tawang'),
(27, 3, 'Tirap'),
(28, 3, 'Dibang Valley'),
(29, 3, 'Upper Siang'),
(30, 3, 'Upper Subansiri'),
(31, 3, 'West Kameng'),
(32, 3, 'West Siang'),
(33, 4, 'Baksa'),
(34, 4, 'Barpeta'),
(35, 4, 'Bongaigao'),
(36, 4, 'Cachar'),
(37, 4, 'Chirang'),
(38, 4, 'Darrang'),
(39, 4, 'Dhemaji'),
(40, 4, 'Dima Hasao'),
(41, 4, 'Dhubri'),
(42, 4, 'Dibrugarh'),
(43, 4, 'Goalpara'),
(44, 4, 'Golaghat'),
(45, 4, 'Hailakandi'),
(46, 4, 'Jorhat'),
(47, 4, 'Kamrup'),
(48, 4, 'Kamrup Metropolita'),
(49, 4, 'Karbi Anglong'),
(50, 4, 'Karimganj'),
(51, 4, 'Kokrajhar'),
(52, 4, 'Lakhimpur'),
(53, 4, 'Morigao'),
(54, 4, 'Nagao'),
(55, 4, 'Nalbari'),
(56, 4, 'Sivasagar'),
(57, 4, 'Sonitpur'),
(58, 4, 'Tinsukia'),
(59, 4, 'Udalguri'),
(60, 5, 'Araria'),
(61, 5, 'Arwal'),
(62, 5, 'Aurangabad'),
(63, 5, 'Banka'),
(64, 5, 'Begusarai'),
(65, 5, 'Bhagalpur'),
(66, 5, 'Bhojpur'),
(67, 5, 'Buxar'),
(68, 5, 'Darbhanga'),
(69, 5, 'East Champara'),
(70, 5, 'Gaya'),
(71, 5, 'Gopalganj'),
(72, 5, 'Jamui'),
(73, 5, 'Jehanabad'),
(74, 5, 'Kaimur'),
(75, 5, 'Katihar'),
(76, 5, 'Khagaria'),
(77, 5, 'Kishanganj'),
(78, 5, 'Lakhisarai'),
(79, 5, 'Madhepura'),
(80, 5, 'Madhubani'),
(81, 5, 'Munger'),
(82, 5, 'Muzaffarpur'),
(83, 5, 'Nalanda'),
(84, 5, 'Nawada'),
(85, 5, 'Patna'),
(86, 5, 'Purnia'),
(87, 5, 'Rohtas'),
(88, 5, 'Saharsa'),
(89, 5, 'Samastipur'),
(90, 5, 'Sara'),
(91, 5, 'Sheikhpura'),
(92, 5, 'Sheohar'),
(93, 5, 'Sitamarhi'),
(94, 5, 'Siwa'),
(95, 5, 'Supaul'),
(96, 5, 'Vaishali'),
(97, 5, 'West Champara'),
(98, 6, 'Chandigarh'),
(99, 7, 'Bastar'),
(100, 7, 'Bijapur'),
(101, 7, 'Bilaspur'),
(102, 7, 'Dantewada'),
(103, 7, 'Dhamtari'),
(104, 7, 'Durg'),
(105, 7, 'Jashpur'),
(106, 7, 'Janjgir-Champa'),
(107, 7, 'Korba'),
(108, 7, 'Koriya'),
(109, 7, 'Kanker'),
(110, 7, 'Kabirdham (formerly Kawardha);'),
(111, 7, 'Mahasamund'),
(112, 7, 'Narayanpur'),
(113, 7, 'Raigarh'),
(114, 7, 'Rajnandgao'),
(115, 7, 'Raipur'),
(116, 7, 'Surajpur'),
(117, 8, 'Dadra and Nagar Haveli'),
(118, 9, 'Dama'),
(119, 9, 'Diu'),
(120, 10, 'Central Delhi'),
(121, 10, 'East Delhi'),
(122, 10, 'New Delhi'),
(123, 10, 'North Delhi'),
(124, 10, 'North East Delhi'),
(125, 10, 'North West Delhi'),
(126, 10, 'South Delhi'),
(127, 10, 'South West Delhi'),
(128, 10, 'West Delhi'),
(129, 11, 'North Goa'),
(130, 11, 'South Goa'),
(131, 12, 'Ahmedabad'),
(132, 12, 'Amreli'),
(133, 12, 'Anand'),
(134, 12, 'Aravalli'),
(135, 12, 'Banaskantha'),
(136, 12, 'Bharuch'),
(137, 12, 'Bhavnagar'),
(138, 12, 'Dahod'),
(139, 12, 'Dang'),
(140, 12, 'Gandhinagar'),
(141, 12, 'Jamnagar'),
(142, 12, 'Junagadh'),
(143, 12, 'Kutch'),
(144, 12, 'Kheda'),
(145, 12, 'Mehsana'),
(146, 12, 'Narmada'),
(147, 12, 'Navsari'),
(148, 12, 'Pata'),
(149, 12, 'Panchmahal'),
(150, 12, 'Porbandar'),
(151, 12, 'Rajkot'),
(152, 12, 'Sabarkantha'),
(153, 12, 'Surendranagar'),
(154, 12, 'Surat'),
(155, 12, 'Tapi'),
(156, 12, 'Vadodara'),
(157, 12, 'Valsad'),
(158, 13, 'Ambala'),
(159, 13, 'Bhiwani'),
(160, 13, 'Faridabad'),
(161, 13, 'Fatehabad'),
(162, 13, 'Gurgao'),
(163, 13, 'Hissar'),
(164, 13, 'Jhajjar'),
(165, 13, 'Jind'),
(166, 13, 'Karnal'),
(167, 13, 'Kaithal'),
(168, 13, 'Kurukshetra'),
(169, 13, 'Mahendragarh'),
(170, 13, 'Mewat'),
(171, 13, 'Palwal'),
(172, 13, 'Panchkula'),
(173, 13, 'Panipat'),
(174, 13, 'Rewari'),
(175, 13, 'Rohtak'),
(176, 13, 'Sirsa'),
(177, 13, 'Sonipat'),
(178, 13, 'Yamuna Nagar'),
(179, 14, 'Bilaspur'),
(180, 14, 'Chamba'),
(181, 14, 'Hamirpur'),
(182, 14, 'Kangra'),
(183, 14, 'Kinnaur'),
(184, 14, 'Kullu'),
(185, 14, 'Lahaul and Spiti'),
(186, 14, 'Mandi'),
(187, 14, 'Shimla'),
(188, 14, 'Sirmaur'),
(189, 14, 'Sola'),
(190, 14, 'Una'),
(191, 15, 'Anantnag'),
(192, 15, 'Badgam'),
(193, 15, 'Bandipora'),
(194, 15, 'Baramulla'),
(195, 15, 'Doda'),
(196, 15, 'Ganderbal'),
(197, 15, 'Jammu'),
(198, 15, 'Kargil'),
(199, 15, 'Kathua'),
(200, 15, 'Kishtwar'),
(202, 15, 'Kupwara'),
(203, 15, 'Kulgam'),
(204, 15, 'Leh'),
(205, 15, 'Poonch'),
(206, 15, 'Pulwama'),
(207, 15, 'Rajouri'),
(208, 15, 'Ramba'),
(209, 15, 'Reasi'),
(210, 15, 'Samba'),
(211, 15, 'Shopia'),
(212, 15, 'Srinagar'),
(213, 15, 'Udhampur'),
(214, 16, 'Bokaro'),
(215, 16, 'Chatra'),
(216, 16, 'Deoghar'),
(217, 16, 'Dhanbad'),
(218, 16, 'Dumka'),
(219, 16, 'East Singhbhum'),
(220, 16, 'Garhwa'),
(221, 16, 'Giridih'),
(222, 16, 'Godda'),
(223, 16, 'Gumla'),
(224, 16, 'Hazaribag'),
(225, 16, 'Jamtara'),
(226, 16, 'Khunti'),
(227, 16, 'Koderma'),
(228, 16, 'Latehar'),
(229, 16, 'Lohardaga'),
(230, 16, 'Pakur'),
(231, 16, 'Palamu'),
(232, 16, 'Ramgarh'),
(233, 16, 'Ranchi'),
(234, 16, 'Sahibganj'),
(235, 16, 'Seraikela Kharsawa'),
(236, 16, 'Simdega'),
(237, 16, 'West Singhbhum'),
(238, 17, 'Bagalkot'),
(239, 17, 'Bangalore Rural'),
(240, 17, 'Bangalore Urba'),
(241, 17, 'Belgaum'),
(242, 17, 'Bellary'),
(243, 17, 'Bidar'),
(244, 17, 'Bijapur'),
(245, 17, 'Chamarajnagar'),
(246, 17, 'Chikkamagaluru'),
(247, 17, 'Chikkaballapur'),
(248, 17, 'Chitradurga'),
(249, 17, 'Davanagere'),
(250, 17, 'Dharwad'),
(251, 17, 'Dakshina Kannada'),
(252, 17, 'Gadag'),
(253, 17, 'Gulbarga'),
(254, 17, 'Hassa'),
(255, 17, 'Haveri'),
(256, 17, 'Kodagu'),
(257, 17, 'Kolar'),
(258, 17, 'Koppal'),
(259, 17, 'Mandya'),
(260, 17, 'Mysore'),
(261, 17, 'Raichur'),
(262, 17, 'Shimoga'),
(263, 17, 'Tumkur'),
(264, 17, 'Udupi'),
(265, 17, 'Uttara Kannada'),
(266, 17, 'Ramanagara'),
(267, 17, 'Yadgir'),
(268, 18, 'Alappuzha'),
(269, 18, 'Ernakulam'),
(270, 18, 'Idukki'),
(271, 18, 'Kannur'),
(272, 18, 'Kasaragod'),
(273, 18, 'Kollam'),
(274, 18, 'Kottayam'),
(275, 18, 'Kozhikode'),
(276, 18, 'Malappuram'),
(277, 18, 'Palakkad'),
(278, 18, 'Pathanamthitta'),
(279, 18, 'Thrissur'),
(280, 18, 'Thiruvananthapuram'),
(281, 18, 'Wayanad'),
(282, 19, 'Lakshadweep'),
(283, 20, 'Agar'),
(284, 20, 'Alirajpur'),
(285, 20, 'Anuppur'),
(286, 20, 'Ashok Nagar'),
(287, 20, 'Balaghat'),
(288, 20, 'Barwani'),
(289, 20, 'Betul'),
(290, 20, 'Bhind'),
(291, 20, 'Bhopal'),
(292, 20, 'Burhanpur'),
(293, 20, 'Chhatarpur'),
(294, 20, 'Chhindwara'),
(295, 20, 'Damoh'),
(296, 20, 'Datia'),
(297, 20, 'Dewas'),
(298, 20, 'Dhar'),
(299, 20, 'Dindori'),
(300, 20, 'Guna'),
(301, 20, 'Gwalior'),
(302, 20, 'Harda'),
(303, 20, 'Hoshangabad'),
(304, 20, 'Indore'),
(305, 20, 'Jabalpur'),
(306, 20, 'Jhabua'),
(307, 20, 'Katni'),
(308, 20, 'Khandwa (East Nimar);'),
(309, 20, 'Khargone (West Nimar);'),
(310, 20, 'Mandla'),
(311, 20, 'Mandsaur'),
(312, 20, 'Morena'),
(313, 20, 'Narsinghpur'),
(314, 20, 'Neemuch'),
(315, 20, 'Panna'),
(316, 20, 'Raise'),
(317, 20, 'Rajgarh'),
(318, 20, 'Ratlam'),
(319, 20, 'Rewa'),
(320, 20, 'Sagar'),
(321, 20, 'Satna'),
(322, 20, 'Sehore'),
(323, 20, 'Seoni'),
(324, 20, 'Shahdol'),
(325, 20, 'Shajapur'),
(326, 20, 'Sheopur'),
(327, 20, 'Shivpuri'),
(328, 20, 'Sidhi'),
(329, 20, 'Singrauli'),
(330, 20, 'Tikamgarh'),
(331, 20, 'Ujjai'),
(332, 20, 'Umaria'),
(333, 20, 'Vidisha'),
(334, 21, 'Ahmednagar'),
(335, 21, 'Akola'),
(336, 21, 'Amravati'),
(337, 21, 'Aurangabad'),
(338, 21, 'Beed'),
(339, 21, 'Bhandara'),
(340, 21, 'Buldhana'),
(341, 21, 'Chandrapur'),
(342, 21, 'Dhule'),
(343, 21, 'Gadchiroli'),
(344, 21, 'Gondia'),
(345, 21, 'Hingoli'),
(346, 21, 'Jalgao'),
(347, 21, 'Jalna'),
(348, 21, 'Kolhapur'),
(349, 21, 'Latur'),
(350, 21, 'Mumbai City'),
(351, 21, 'Mumbai suburba'),
(352, 21, 'Nanded'),
(353, 21, 'Nandurbar'),
(354, 21, 'Nagpur'),
(355, 21, 'Nashik'),
(356, 21, 'Osmanabad'),
(357, 21, 'Parbhani'),
(358, 21, 'Pune'),
(359, 21, 'Raigad'),
(360, 21, 'Ratnagiri'),
(361, 21, 'Sangli'),
(362, 21, 'Satara'),
(363, 21, 'Sindhudurg'),
(364, 21, 'Solapur'),
(365, 21, 'Thane'),
(366, 21, 'Wardha'),
(367, 21, 'Washim'),
(368, 21, 'Yavatmal'),
(369, 22, 'Bishnupur'),
(370, 22, 'Churachandpur'),
(371, 22, 'Chandel'),
(372, 22, 'Imphal East'),
(373, 22, 'Senapati'),
(374, 22, 'Tamenglong'),
(375, 22, 'Thoubal'),
(376, 22, 'Ukhrul'),
(377, 22, 'Imphal West'),
(378, 23, 'East Garo Hills'),
(379, 23, 'East Khasi Hills'),
(380, 23, 'Jaintia Hills'),
(381, 23, 'Ri Bhoi'),
(382, 23, 'South Garo Hills'),
(383, 23, 'West Garo Hills'),
(384, 23, 'West Khasi Hills'),
(385, 24, 'Aizawl'),
(386, 24, 'Champhai'),
(387, 24, 'Kolasib'),
(388, 24, 'Lawngtlai'),
(389, 24, 'Lunglei'),
(390, 24, 'Mamit'),
(391, 24, 'Saiha'),
(392, 24, 'Serchhip'),
(393, 25, 'Dimapur'),
(394, 25, 'Kiphire'),
(395, 25, 'Kohima'),
(396, 25, 'Longleng'),
(397, 25, 'Mokokchung'),
(398, 25, 'Mo'),
(399, 25, 'Pere'),
(400, 25, 'Phek'),
(401, 25, 'Tuensang'),
(402, 25, 'Wokha'),
(403, 25, 'Zunheboto'),
(404, 26, 'Angul'),
(405, 26, 'Boudh (Bauda);'),
(406, 26, 'Bhadrak'),
(407, 26, 'Balangir'),
(408, 26, 'Bargarh (Baragarh);'),
(409, 26, 'Balasore'),
(410, 26, 'Cuttack'),
(411, 26, 'Debagarh (Deogarh);'),
(412, 26, 'Dhenkanal'),
(413, 26, 'Ganjam'),
(414, 26, 'Gajapati'),
(415, 26, 'Jharsuguda'),
(416, 26, 'Jajpur'),
(417, 26, 'Jagatsinghpur'),
(418, 26, 'Khordha'),
(419, 26, 'Kendujhar (Keonjhar);'),
(420, 26, 'Kalahandi'),
(421, 26, 'Kandhamal'),
(422, 26, 'Koraput'),
(423, 26, 'Kendrapara'),
(424, 26, 'Malkangiri'),
(425, 26, 'Mayurbhanj'),
(426, 26, 'Nabarangpur'),
(427, 26, 'Nuapada'),
(428, 26, 'Nayagarh'),
(429, 26, 'Puri'),
(430, 26, 'Rayagada'),
(431, 26, 'Sambalpur'),
(432, 26, 'Subarnapur (Sonepur);'),
(433, 26, 'Sundergarh'),
(434, 27, 'Karaikal'),
(435, 27, 'Mahe'),
(436, 27, 'Pondicherry'),
(437, 27, 'Yanam'),
(438, 28, 'Amritsar'),
(439, 28, 'Barnala'),
(440, 28, 'Bathinda'),
(441, 28, 'Firozpur'),
(442, 28, 'Faridkot'),
(443, 28, 'Fatehgarh Sahib'),
(444, 28, 'Fazilka'),
(445, 28, 'Gurdaspur'),
(446, 28, 'Hoshiarpur'),
(447, 28, 'Jalandhar'),
(448, 28, 'Kapurthala'),
(449, 28, 'Ludhiana'),
(450, 28, 'Mansa'),
(451, 28, 'Moga'),
(452, 28, 'Sri Muktsar Sahib'),
(453, 28, 'Pathankot'),
(454, 28, 'Patiala'),
(455, 28, 'Rupnagar'),
(456, 28, 'Ajitgarh (Mohali);'),
(457, 28, 'Sangrur'),
(458, 28, 'Shahid Bhagat Singh Nagar'),
(459, 28, 'Tarn Tara'),
(460, 29, 'Ajmer'),
(461, 29, 'Alwar'),
(462, 29, 'Bikaner'),
(463, 29, 'Barmer'),
(464, 29, 'Banswara'),
(465, 29, 'Bharatpur'),
(466, 29, 'Bara'),
(467, 29, 'Bundi'),
(468, 29, 'Bhilwara'),
(469, 29, 'Churu'),
(470, 29, 'Chittorgarh'),
(471, 29, 'Dausa'),
(472, 29, 'Dholpur'),
(473, 29, 'Dungapur'),
(474, 29, 'Ganganagar'),
(475, 29, 'Hanumangarh'),
(476, 29, 'Jhunjhunu'),
(477, 29, 'Jalore'),
(478, 29, 'Jodhpur'),
(479, 29, 'Jaipur'),
(480, 29, 'Jaisalmer'),
(481, 29, 'Jhalawar'),
(482, 29, 'Karauli'),
(483, 29, 'Kota'),
(484, 29, 'Nagaur'),
(485, 29, 'Pali'),
(486, 29, 'Pratapgarh'),
(487, 29, 'Rajsamand'),
(488, 29, 'Sikar'),
(489, 29, 'Sawai Madhopur'),
(490, 29, 'Sirohi'),
(491, 29, 'Tonk'),
(492, 29, 'Udaipur'),
(493, 30, 'East Sikkim'),
(494, 30, 'North Sikkim'),
(495, 30, 'South Sikkim'),
(496, 30, 'West Sikkim'),
(497, 31, 'Ariyalur'),
(498, 31, 'Chennai'),
(499, 31, 'Coimbatore'),
(500, 31, 'Cuddalore'),
(501, 31, 'Dharmapuri'),
(502, 31, 'Dindigul'),
(503, 31, 'Erode'),
(504, 31, 'Kanchipuram'),
(505, 31, 'Kanyakumari'),
(506, 31, 'Karur'),
(507, 31, 'Krishnagiri'),
(508, 31, 'Madurai'),
(509, 31, 'Nagapattinam'),
(510, 31, 'Nilgiris'),
(511, 31, 'Namakkal'),
(512, 31, 'Perambalur'),
(513, 31, 'Pudukkottai'),
(514, 31, 'Ramanathapuram'),
(515, 31, 'Salem'),
(516, 31, 'Sivaganga'),
(517, 31, 'Tirupur'),
(518, 31, 'Tiruchirappalli'),
(519, 31, 'Theni'),
(520, 31, 'Tirunelveli'),
(521, 31, 'Thanjavur'),
(522, 31, 'Thoothukudi'),
(523, 31, 'Tiruvallur'),
(524, 31, 'Tiruvarur'),
(525, 31, 'Tiruvannamalai'),
(526, 31, 'Vellore'),
(527, 31, 'Viluppuram'),
(528, 31, 'Virudhunagar'),
(529, 32, 'Adilabad'),
(530, 32, 'Hyderabad'),
(531, 32, 'Karimnagar'),
(532, 32, 'Khammam'),
(533, 32, 'Mahbubnagar'),
(534, 32, 'Medak'),
(535, 32, 'Nalgonda'),
(536, 32, 'Nizamabad'),
(537, 32, 'Ranga Reddy'),
(538, 32, 'Warangal'),
(539, 33, 'Dhalai'),
(540, 33, 'North Tripura'),
(541, 33, 'South Tripura'),
(542, 33, 'Khowai'),
(543, 33, 'West Tripura'),
(544, 35, 'Agra'),
(545, 35, 'Aligarh'),
(546, 35, 'Allahabad'),
(547, 35, 'Ambedkar Nagar'),
(548, 35, 'Auraiya'),
(549, 35, 'Azamgarh'),
(550, 35, 'Bagpat'),
(551, 35, 'Bahraich'),
(552, 35, 'Ballia'),
(553, 35, 'Balrampur'),
(554, 35, 'Banda'),
(555, 35, 'Barabanki'),
(556, 35, 'Bareilly'),
(557, 35, 'Basti'),
(558, 35, 'Bijnor'),
(559, 35, 'Budau'),
(560, 35, 'Bulandshahr'),
(561, 35, 'Chandauli'),
(562, 35, 'Amethi (Chhatrapati Shahuji Maharaj Nagar)'),
(563, 35, 'Chitrakoot'),
(564, 35, 'Deoria'),
(565, 35, 'Etah'),
(566, 35, 'Etawah'),
(567, 35, 'Faizabad'),
(568, 35, 'Farrukhabad'),
(569, 35, 'Fatehpur'),
(570, 35, 'Firozabad'),
(571, 35, 'Gautam Buddh Nagar'),
(572, 35, 'Ghaziabad'),
(573, 35, 'Ghazipur'),
(574, 35, 'Gonda'),
(575, 35, 'Gorakhpur'),
(576, 35, 'Hamirpur'),
(577, 35, 'Hardoi'),
(578, 35, 'Hathras (Mahamaya Nagar);'),
(579, 35, 'Jalau'),
(580, 35, 'Jaunpur'),
(581, 35, 'Jhansi'),
(582, 35, 'Jyotiba Phule Nagar'),
(583, 35, 'Kannauj'),
(584, 35, 'Kanpur Dehat (Ramabai Nagar);'),
(585, 35, 'Kanpur Nagar'),
(586, 35, 'Kanshi Ram Nagar'),
(587, 35, 'Kaushambi'),
(588, 35, 'Kushinagar'),
(589, 35, 'Lakhimpur Kheri'),
(590, 35, 'Lalitpur'),
(591, 35, 'Lucknow'),
(592, 35, 'Maharajganj'),
(593, 35, 'Mahoba'),
(594, 35, 'Mainpuri'),
(595, 35, 'Mathura'),
(596, 35, 'Mau'),
(597, 35, 'Meerut'),
(598, 35, 'Mirzapur'),
(599, 35, 'Moradabad'),
(600, 35, 'Muzaffarnagar'),
(601, 35, 'Panchsheel Nagar (Hapur);'),
(602, 35, 'Pilibhit'),
(603, 35, 'Pratapgarh'),
(604, 35, 'Raebareli'),
(605, 35, 'Rampur'),
(606, 35, 'Saharanpur'),
(607, 35, 'Sambhal(Bheem Nagar);'),
(608, 35, 'Sant Kabir Nagar'),
(609, 35, 'Sant Ravidas Nagar'),
(610, 35, 'Shahjahanpur'),
(611, 35, 'Shamli'),
(612, 35, 'Shravasti'),
(613, 35, 'Siddharthnagar'),
(614, 35, 'Sitapur'),
(615, 35, 'Sonbhadra'),
(616, 35, 'Sultanpur'),
(617, 35, 'Unnao'),
(618, 35, 'Varanasi'),
(619, 34, 'Almora'),
(620, 34, 'Bageshwar'),
(621, 34, 'Chamoli'),
(622, 34, 'Champawat'),
(623, 34, 'Dehradu'),
(624, 34, 'Haridwar'),
(625, 34, 'Nainital'),
(626, 34, 'Pauri Garhwal'),
(627, 34, 'Pithoragarh'),
(628, 34, 'Rudraprayag'),
(629, 34, 'Tehri Garhwal'),
(630, 34, 'Udham Singh Nagar'),
(631, 34, 'Uttarkashi'),
(632, 36, 'Bankura'),
(633, 36, 'Bardhama'),
(634, 36, 'Birbhum'),
(635, 36, 'Cooch Behar'),
(636, 36, 'Dakshin Dinajpur'),
(637, 36, 'Darjeeling'),
(638, 36, 'Hooghly'),
(639, 36, 'Howrah'),
(640, 36, 'Jalpaiguri'),
(641, 36, 'Kolkata'),
(642, 36, 'Maldah'),
(643, 36, 'Murshidabad'),
(644, 36, 'Nadia'),
(645, 36, 'North 24 Parganas'),
(646, 36, 'Paschim Medinipur'),
(647, 36, 'Purba Medinipur'),
(648, 36, 'Purulia'),
(649, 36, 'South 24 Parganas'),
(650, 36, 'Uttar Dinajpur'),
(651, 31, 'Tiruchengode'),
(657, 31, 'Ambur'),
(658, 31, 'palladam'),
(659, 8, 'North and Middle Andaman'),
(660, 1, 'North and Middle Andaman'),
(661, 31, 'Vadapalani');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maritialstat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobNum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voterid` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batchno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenseno` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licensename` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licexpdate` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtoarea` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(50) NOT NULL,
  `city` int(50) NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(50) NOT NULL,
  `namebnk` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bnkname` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accno` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ifsc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licupld` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aadharupld` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgupld` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voterupld` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ledger_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `intAdminId`, `name`, `dob`, `maritialstat`, `MobNum`, `aadharno`, `voterid`, `batchno`, `licenseno`, `licensename`, `licexpdate`, `rtoarea`, `state`, `city`, `area`, `address`, `pincode`, `namebnk`, `bnkname`, `accno`, `ifsc`, `licupld`, `aadharupld`, `imgupld`, `voterupld`, `remarks`, `created_at`, `updated_at`, `ledger_id`) VALUES
(1, 18, 'Akbar Ali', '18/05/1985', '1', '333333333333333', '111111111111', '', '17451', 'TN0520030019855', '', '17/07/2020', 'Chennai North', 31, 498, 'Chennai', '77/1, Kumaran Nagar, 14th Street, Chennai', 600099, '', '', '', '', '1_Akbar Ali.pdf', '', '1_bgimg.jpeg', '', '', NULL, NULL, '9'),
(2, 18, 'Ananadan V', '04/04/1992', '2', '8428343859', '111111111111', '', '617', 'TN25Z20130001615', '', '22/05/2019', 'Cheyyar', 31, 498, 'Kovalai Village', '123, EDA Street, Vandavasi Taluk', 0, '', '', '', '', '2_Anandan V.pdf', '', '2_ASSL LOGO 1.jpg', '', '', NULL, NULL, '10'),
(3, 18, 'Arunachalam V', '04/04/1982', '1', '7904184678', '111111111111', '', '64447', 'TN21X20020000365', '', '21/10/2020', 'Cheyyar', 31, 525, 'Keezh Seesamangalam Village ', 'Keezh Seesamangalam Village, Vandavasi Taluk', 604403, '', '', '', '', '3_Arunachalam V.pdf', '', '3_ASSL LOGO 1.jpg', '', '', NULL, NULL, '11'),
(4, 18, 'Ashok Varman T', '10/04/1984', '1', '9597253755', '111111111111', '', '2572', 'TN5020050000213', '', '07/02/2020', 'Thiruvarur', 31, 524, 'Thiruvarur', '20/8, Sivaprakasa Mada Street, Thiruvarur', 0, '', '', '', '', '4_Ashok Varman T.pdf', '', '4_ASSL LOGO 1.jpg', '', '', NULL, NULL, '12'),
(5, 18, 'Babu M', '04/04/1980', '1', '222222222222222', '111111111111', '', '63312', 'TN21X19980001556', '', '13/12/2020', 'Madurantakam', 31, 504, 'Vedavakkam', 'Vedavakkam, Madurantakam Taluk', 603306, '', '', '', '', '5_Babu M.pdf', '', '5_ASSL LOGO 1.jpg', '', '', NULL, NULL, '13'),
(6, 18, 'Baskar R', '06/01/1983', '1', '22222222222222', '111111111111', '', '52973', 'TN2820020005147', '', '21/06/2020', 'Namakkal - North', 31, 511, 'Kariyaperumal Pudur  ', '2/129, Kariyaperumal Pudur , Sivanaickenpatti, Bodinaickenpatti, Namakkal', 637405, '', '', '', '', '6_Baskar R.pdf', '', '6_ASSL LOGO 1.jpg', '', '', NULL, NULL, '14'),
(7, 18, 'C Kanniyappan', '16/06/1974', '1', '8754788071', '111111111111', '', '17864', 'TN25Z20030000364', '', '03/12/2019', 'Arni', 31, 525, 'Sathupperi Village', '229, Achari Street, Sathupperi Village & Post, Gudalore Village, Arni Taluk, ', 606905, '', '', '', '', '7_C Kanniyappan.pdf', '', '7_ASSL LOGO 1.jpg', '', '', NULL, NULL, '15'),
(8, 18, 'C Panneerselvam', '06/05/1977', '1', '8124368383', '111111111111', '', '52984', 'TN1919980001524', '', '22/06/2019', 'Cheyyar', 31, 525, 'Keezh Seesamangalam Village ', '116, Keezh Seesamangalam Village, Vandavasi Taluk', 604402, '', '', '', '', '8_C Panneerselvam.pdf', '', '8_ASSL LOGO 1.jpg', '', '', NULL, NULL, '16'),
(9, 18, 'Dhatchanamoorthi M', '26/01/1996', '2', '8489121208', '111111111111', '', '00049', 'TN25Z20140003534', '', '17/02/2019', 'Cheyyar', 31, 525, 'Kovalai Village', '306, Bajanai Koil Street, Kovalai Village & Post, Vandavasi Taluk', 0, '', '', '', '', '9_Dhatchanamoorthi M.pdf', '', '9_ASSL LOGO 1.jpg', '', '', NULL, NULL, '17'),
(10, 18, 'Doss S', '02/05/1985', '1', '9597879203', '111111111111', '', '872', 'TN21X20050001987', '', '11/07/2018', 'Madurantakam', 31, 504, 'Nelli', 'Nelli, Madurantakam Taluk, Kanchipuram', 603306, '', '', '', '', '10_Doss S.pdf', '', '10_download.jpg', '', '', NULL, NULL, '18'),
(11, 18, 'Durairaj B', '01/05/1987', '1', '9940484833', '111111111111', '', '22386', 'TN25Z20050001318', '', '08/05/2019', 'Arni', 31, 525, 'Arni', '17A Mullipattu Road, 9/26, Colony, Arni Taluk', 0, '', '', '', '', '11_Durairaj B.pdf', '', '11_ASSL LOGO 1.jpg', '', '', NULL, NULL, '19'),
(12, 18, 'Elumalai A', '02/03/1973', '1', '9789829907', '111111111111', '', '40380', 'TN21X19930002352', '', '27/10/2020', 'Madurantakam', 31, 504, 'Zameen Endathur Village', 'Zameen Endathur Village, Melakandai, Madurantakam', 603311, '', '', '', '', '12_Elumalai A.pdf', '', '12_ASSL LOGO 1.jpg', '', '', NULL, NULL, '20'),
(13, 18, 'Ganapathi S', '11/10/1995', '2', '9080940277', '111111111111', '', '189', 'TN25Z20160001085', '', '17/05/2019', 'Arni', 31, 525, 'Kasthambadi Village', '11 Mariyamman Koil Street, Kasthambadi Village, Polur Taluk', 606903, '', '', '', '', '13_Ganapathi S.pdf', '', '13_ASSL LOGO 1.jpg', '', '', NULL, NULL, '21'),
(14, 18, 'H Masthan', '10/07/1984', '1', '9952399756', '111111111111', '', '00527', 'TN0520060021333', '', '29/12/2020', 'Chennai North', 31, 498, 'Kolathur', '14/6, Sakthivel Nagar, 1st Street, Kolathur', 600099, '', '', '', '', '14_H Masthan.pdf', '', '14_ASSL LOGO 1.jpg', '', '', NULL, NULL, '22'),
(15, 18, 'Karthikeyan M', '16/04/1964', '1', '8637440148', '111111111111', '', '52241', 'TN0119840002000', '', '19/06/2020', 'Chennai - North West', 31, 498, 'Anna Nagar West', '65 Thiruvalleswarar Nagar, Anna Nagar West, Chennai', 600040, '', '', '', '', '15_Karthikeyan M.pdf', '', '15_ASSL LOGO 1.jpg', '', '', NULL, NULL, '23'),
(16, 18, 'Kathirvel K', '20/03/1993', '2', '8838323624', '111111111111', '', '00178', 'TN5120110002935', '', '31/03/2019', 'Nagapattinam', 31, 509, 'Katharipulam Village', '2/89, Panaiyadikuthagai Nadupakuthi, Katharipulam Village, Vedaranyam Taluk', 614808, '', '', '', '', '16_Kathirvel K.pdf', '', '16_ASSL LOGO 1.jpg', '', '', NULL, NULL, '24'),
(23, 18, 'Kumar G', '12/05/1973', '1', '9940538715', '111111111111', '', '9204', 'TN5019940001121', '', '15/04/2019', 'Thiruvarur', 31, 524, 'Thiruvarur', '14 Main Road, Keezhappadugai Post, Thiruvarur', 0, '', '', '', '', '23_Kumar G.pdf', '', '23_ASSL LOGO 1.jpg', '', '', NULL, NULL, '25'),
(24, 18, 'Loganathan N', '19/05/1987', '1', '9600896338', '111111111111', '', '142', 'TN4720090000033', '', '16/03/2021', 'Kulithalai', 31, 506, 'Pillur', '4/13T, No.4/32, Aanaigoundanpatty, Pillur, Kulithalai Taluk', 639104, '', '', '', '', '24_Loganathan N.pdf', '', '24_ASSL LOGO 1.jpg', '', '', NULL, NULL, '26'),
(25, 18, 'M Ashraf Ali', '10/05/1989', '1', '22222222222222', '1', '', '01052', 'TN0520070019413', '', '02/04/2021', 'Chennai North', 31, 498, 'Vysarpadi', '16/5, MKB Nagar, Vysarpadi, Chennai', 600039, '', '', '', '', '25_M Ashiraf Ali.pdf', '', '25_ASSL LOGO 1.jpg', '', '', NULL, NULL, '27'),
(26, 18, 'Manikandan K', '07/12/1984', '1', '22222222222222', '111111111111', '', '49907', 'TN3220030005901', '', '15/09/2020', 'Villupuram', 31, 527, 'Kedar Village', '6463, Police Station Street, Kedar Village, Villupuram ', 605402, '', '', '', '', '26_Manikandan K.pdf', '', '26_ASSL LOGO 1.jpg', '', '', NULL, NULL, '28'),
(27, 18, 'Mayakrishnan S', '12/02/1985', '2', '9894845779', '111111111111', '', '19896', 'TN25Z20050000925', '', '15/05/2020', 'Cheyyar', 31, 525, 'Irumbedu', '3/24A, East Street, Irumbedu Village & Post, Vandavasi Taluk', 604403, '', '', '', '', '27_Mayakrishnan S.pdf', '', '27_ASSL LOGO 1.jpg', '', '', NULL, NULL, '29'),
(28, 18, 'Muruganadham M', '10/06/1980', '1', '22222222222222', '111111111111', '', '222245', 'TN5020000001270', '', '27/10/2020', 'Mannarkudi', 31, 524, 'Kalachery', '57B, Sothriyam, Kalachery, Needamangalam, Thiruvarur', 614404, '', '', '', '', '28_Muruganadham M.pdf', '', '28_ASSL LOGO 1.jpg', '', '', NULL, NULL, '30'),
(29, 18, 'Natarajan M', '25/04/1989', '2', '9566351527', '111111111111', '', '00107', 'TN21X20070006881', '', '27/05/2018', 'Madurantakam', 31, 504, 'Madurantakam', '3/16, Sinthamani Mariyamman Koil Street, Miniyanthangal, Madurantakam Taluk', 0, '', '', '', '', '29_Natarajan M.pdf', '', '29_ASSL LOGO 1.jpg', '', '', NULL, NULL, '31'),
(30, 18, 'Pandiyan R', '11/05/1978', '1', '22222222222222', '111111111111', '', '00738', 'TN5120000001690', '', '10/11/2019', 'Nagapattinam', 31, 509, 'Katharipulam Village', '2/23, Nadupaguthi, Katharipulam Village, Vedaranyam Taluk', 0, '', '', '', '', '30_Pandiyan R.pdf', '', '30_ASSL LOGO 1.jpg', '', '', NULL, NULL, '32'),
(31, 18, 'Panneer S', '20/05/1977', '1', '22222222222222', '111111111111', '', '19857', 'TN2519960001235', '', '11/11/2018', 'Tiruvannamalai', 31, 525, 'T Vellore Village', 'T Vellore Village, Thanipadi Post, Chengam Taluk', 0, '', '', '', '', '31_Panneer S.pdf', '', '31_ASSL LOGO 1.jpg', '', '', NULL, NULL, '33'),
(32, 18, 'Prabakaran R', '20/06/1977', '1', '9786193628', '111111111111', '', '12679', 'TN5019960000824', '', '10/07/2019', 'Thiruvarur', 31, 524, 'Adiyakkamangalam ', 'New Colony, West Street, Adiyakkamangalam, Thiruvarur', 0, '', '', '', '', '32_Prabakaran R.pdf', '', '32_ASSL LOGO 1.jpg', '', '', NULL, NULL, '34'),
(33, 18, 'Prabu G', '26/03/1993', '2', '9003181761', '111111111111', '', '00695', 'TN3120120003593', '', '20/05/2019', 'Cuddalore', 31, 500, 'Panruti', '52, Keel Arungunam Main Road, eel Arungunam, Panruti', 0, '', '', '', '', '33_Prabu G.pdf', '', '33_ASSL LOGO 1.jpg', '', '', NULL, NULL, '35'),
(34, 18, 'Purusothaman S', '17/05/1997', '2', '7094329969', '111111111111', '', '', 'TN19Z20160000519', '', '24/10/2020', '', 31, 525, 'Keezh Seesamangalam Village ', '45, Big Street, Salavedu Post, Keezh Seesamangalam Village , Vandavasi Taluk', 604403, '', '', '', '', '34_Purusothaman S.pdf', '', '34_ASSL LOGO 1.jpg', '', '', NULL, NULL, '36'),
(35, 18, 'Ragothaman K', '04/03/1982', '1', '22222222222222', '111111111111', '', '41063', 'TN3220000001877', '', '22/04/2020', 'Villupuram', 31, 527, 'Thirukoilur', 'North Street, Kadaganur, Thirukoilur Taluk', 605757, '', '', '', '', '35_Ragothaman K.pdf', '', '35_ASSL LOGO 1.jpg', '', '', NULL, NULL, '37'),
(36, 18, 'Raj N', '10/01/1982', '1', '22222222222222', '111111111111', '', '00303', 'TN4720080005507', '', '21/06/2019', 'Madurantakam', 31, 504, 'Zameen Endathur Village', 'Zameen Endathur Village, Melakandai, Madurantakam', 603311, '', '', '', '', '36_Raj N.pdf', '', '36_ASSL LOGO 1.jpg', '', '', NULL, NULL, '38'),
(37, 18, 'Rajendiran E', '24/05/1993', '2', '22222222222222', '111111111111', '', '00308', 'TN32Z20120000983', '', '17/06/2018', 'Ulundurpet', 31, 0, 'Ulundurpet', '8A/84, Mariamman Koil Street, East Marudur, Ulundurpet Taluk', 0, '', '', '', '', '37_Rajendiran E.pdf', '', '37_ASSL LOGO 1.jpg', '', '', NULL, NULL, '39'),
(38, 18, 'Rajeshkannan M', '05/02/1990', '2', '8248753975', '111111111111', '', '00108', 'TN3220090000142', '', '23/02/2019', 'Villupuram', 31, 527, 'Kedar Village', '643/3, Durgaiamman Koli Street, Kedar Post, Villupuram', 605402, '', '', '', '', '38_Rajeshkannan M.pdf', '', '38_ASSL LOGO 1.jpg', '', '', NULL, NULL, '40'),
(39, 18, 'Rajganesh T', '01/12/1989', '2', '8608891130', '111111111111', '', '45', 'TN0220080015755', '', '19/06/2019', 'Meenambakkam, Alandur', 31, 498, 'Madipakkam', '2/1803, 4th Main Road, LIC Nagar, Madipakkam', 600091, '', '', '', '', '39_Rajganesh T.pdf', '', '39_ASSL LOGO 1.jpg', '', '', NULL, NULL, '41'),
(40, 18, 'Ramasamy C', '26/05/1988', '2', '22222222222222', '111111111111', '', '00277', 'TN32Z20090000947', '', '18/03/2021', 'Kallakurichi', 31, 527, 'Kallakurichi', '136/44, Road Street, V Palayam Post, Kallakurichi Taluk', 606206, '', '', '', '', '40_Ramasamy C.pdf', '', '40_ASSL LOGO 1.jpg', '', '', NULL, NULL, '42'),
(41, 18, 'Ramesh D', '03/01/1973', '1', '8220243725', '111111111111', '', '18332', 'TN3219940002785', '', '02/05/2020', 'Villupuram', 31, 527, 'Thirukoilur', 'Kadaganur, Thirukoilur Taluk, Villupuram', 605757, '', '', '', '', '41_Ramesh D.pdf', '', '41_ASSL LOGO 1.jpg', '', '', NULL, NULL, '43'),
(42, 18, 'Rose S', '11/02/1969', '1', '8946017706', '111111111111', '', '52268', 'TN21X19930002563', '', '25/03/2019', 'Madurantakam', 31, 504, 'Madurantakam', '24, GST Road, Madurantakam Taluk', 603306, '', '', '', '', '42_Rose S.pdf', '', '42_ASSL LOGO 1.jpg', '', '', NULL, NULL, '44'),
(43, 18, 'Samsukani S', '17/08/1989', '2', '22222222222222', '111111111111', '', '00258', 'TN6920080002438', '', '15/06/2019', 'Thoothukudi', 31, 522, 'Thoothukudi', '246/8A, Vetrivelpuram, Thoothukudi', 628001, '', '', '', '', '43_Samsukani S.pdf', '', '43_ASSL LOGO 1.jpg', '', '', NULL, NULL, '45'),
(44, 18, 'Santhoshkumar S', '10/05/1992', '2', '22222222222222', '111111111111', '', '01078', 'TN1520150001844', '', '12/04/2019', 'Chennai - North East', 31, 527, 'Ulundurpet', '37, Mariamman Koil Street, Sivapattinam, Ulundurpet Taluk', 0, '', '', '', '', '44_Santhoshkumar S.pdf', '', '44_ASSL LOGO 1.jpg', '', '', NULL, NULL, '46'),
(45, 18, 'Selladurai M', '11/02/1990', '2', '8838953734', '111111111111', '', '00635', 'TN3220110000607', '', '04/11/2018', 'Arakkonam', 31, 0, 'Arakkonam', '54/8, Itchiputhur Colony, Arakkonam Taluk', 0, '', '', '', '', '45_Selladurai M.pdf', '', '45_ASSL LOGO 1.jpg', '', '', NULL, NULL, '47'),
(46, 18, 'Sevakumar K', '14/05/1991', '2', '22222222222222', '111111111111', '', '598', 'TN20Z20100011712', '', '27/12/2020', 'Chennai - North East', 31, 527, 'Kadaganur', '2/19, Mettu Street, Kadaganur, Villupuram', 605755, '', '', '', '', '46_Selva Kumar K.pdf', '', '46_ASSL LOGO 1.jpg', '', '', NULL, NULL, '48'),
(47, 18, 'Senthil M', '01/07/1986', '1', '9944253448', '111111111111', '', '56690', 'TN3220070005482', '', '30/08/2019', 'Villupuram', 31, 527, 'Kadaganur', 'Mettu Street, Kadaganur, Mugaiyur Post, Thirukoilur Taluk', 605757, '', '', '', '', '47_Senthil M.pdf', '', '47_ASSL LOGO 1.jpg', '', '', NULL, NULL, '49'),
(48, 18, 'Shahul Hameed H', '15/03/1991', '2', '22222222222222', '111111111111', '', '00106', 'TN5020090004248', '', '10/02/2019', 'Thiruvarur', 31, 524, 'Nannilam', '57, Manalmedu Athangarai Street, Kaduvangudi, Nannilam Taluk', 0, '', '', '', '', '48_Shahul Hameed H.pdf', '', '48_ASSL LOGO 1.jpg', '', '', NULL, NULL, '50'),
(49, 18, 'Sankar A', '20/03/1974', '1', '7708676734', '111111111111', '', '1633', 'TN21X20050005613', '', '15/09/2020', 'Madurantakam', 31, 504, 'Madurantakam', '13, Chinnacolony, Madurantakam', 603306, '', '', '', '', '49_Shankar A.pdf', '', '49_ASSL LOGO 1.jpg', '', '', NULL, NULL, '51'),
(50, 18, 'Sivasankar M', '01/06/1994', '2', '9994562155', '111111111111', '', '00278', 'TN3220150001294', '', '08/04/2021', 'Villupuram', 31, 527, 'Viluppuram', '3/167, Chennai National Highway Street, Pappanampattu, Panayapuram Post, Viluppuram', 605601, '', '', '', '', '50_Sivasankar M.pdf', '', '50_ASSL LOGO 1.jpg', '', '', NULL, NULL, '52'),
(51, 18, 'Suresh N', '05/06/1987', '2', '9626406141', '111111111111', '', '23292', 'TN25Z20060001161', '', '16/07/2019', 'Cheyyar', 31, 525, 'Kavedu', 'JJ Nagar, Kavedu, Vandavasi Taluk', 0, '', '', '', '', '51_Suresh N.pdf', '', '51_ASSL LOGO 1.jpg', '', '', NULL, NULL, '53'),
(52, 18, 'Suresh T', '08/04/1986', '1', '8124986809', '111111111111', '', '64367', 'TN32Z20070001985', '', '12/03/2020', 'Kallakurichi', 31, 0, 'Sankarapuram', '847, South Street, Thairukanangur Alathur Post, Sankarapuram Taluk', 0, '', '', '', '', '52_Suresh T.pdf', '', '52_ASSL LOGO 1.jpg', '', '', NULL, NULL, '54'),
(53, 18, 'V Arulkumar', '26/06/1985', '1', '8220473868', '111111111111', '', '21158', 'TN25Z20060001251', '', '10/05/2018', 'Arni', 31, 525, 'Kovalai Village', 'EDA Street, Kovalai Village, Vandavasi Taluk', 0, '', '', '', '', '53_V Arulkumar.pdf', '', '53_ASSL LOGO 1.jpg', '', '', NULL, NULL, '55'),
(54, 18, 'Vadivel G', '04/08/1979', '1', '9790168312', '111111111111', '', '7392', 'TN0720060024736', '', '14/02/2019', 'Cheyyar', 31, 525, 'Cheyyar', '170, Madha Koil Street, Elangadu Village & post, Cheyyar Taluk', 604408, '', '', '', '', '54_Vadivel G.pdf', '', '54_ASSL LOGO 1.jpg', '', '', NULL, NULL, '56'),
(55, 18, 'Vasu S', '17/02/1984', '1', '9566540563', '111111111111', '', '27174', 'TN25Z20020001863', '', '11/03/2019', 'Cheyyar', 31, 525, 'Irumbedu Village', '2/166A, Thattankula Street, Irumbedu Village, Vandavasi Taluk ', 0, '', '', '', '', '55_Vasu S.pdf', '', '55_ASSL LOGO 1.jpg', '', '', NULL, NULL, '57'),
(56, 18, 'Velraj M', '21/07/1984', '1', '7639377791', '111111111111', '', '03034', 'TN7620030000157', '', '09/10/2020', 'Tenkasi', 31, 520, 'Uthumalai', '5/128C, Nellai Road, Uthumalai, Veerakeralamputhur, Tirunelveli ', 627860, '', '', '', '', '56_Velraj M.pdf', '', '56_ASSL LOGO 1.jpg', '', '', NULL, NULL, '58'),
(57, 18, 'Vignesh S', '07/05/1990', '2', '9790120817', '111111111111', '', '28136', 'TN25Z20090006116', '', '04/10/2019', 'Cheyyar', 31, 525, 'Kottai Village', '473, Valluvar Street, Kottai Village & Post, Vandavasi Taluk', 0, '', '', '', '', '57_Vignesh S.pdf', '', '57_ASSL LOGO 1.jpg', '', '', NULL, NULL, '59'),
(58, 18, 'Vijayan E', '16/02/1988', '1', '9600885572', '111111111111', '', '00283', 'TN3220070003344', '', '20/04/2020', 'Villupuram', 31, 527, 'Thirukoilur', 'Throwpathiamman Koil Street, Veeracholapuram, Thirukoilur Taluk', 605757, '', '', '', '', '58_Vijayan E.pdf', '', '58_ASSL LOGO 1.jpg', '', '', NULL, NULL, '60'),
(59, 18, 'Vijayan M', '17/05/1987', '1', '9585891939', '111111111111', '', '23293', 'TN25Z20060003952', '', '16/07/2019', 'Cheyyar', 31, 525, 'Kilpakkam Village', 'Ettayamman Koil Street, Kilpakkam Village & post, Vandavasi Taluk', 0, '', '', '', '', '59_Vijayan M.pdf', '', '59_ASSL LOGO 1.jpg', '', '', NULL, NULL, '61'),
(60, 18, 'Senthil K', '18/06/1979', '1', '9790507923', '111111111111', '', '66324', 'TN21X20000004560', '', '08/06/2018', 'Madurantakam', 31, 504, 'Madurantakam', '55, Chinna Colony, Madurantakam', 603306, '', '', '', '', '60_Senthil K.pdf', '', '60_ASSL LOGO 1.jpg', '', '', NULL, NULL, '62'),
(62, 18, 'Gunasekaran', '01/10/1970', '1', '9790284983', '111111111111111', '', '', '4545465465465', '', '', 'Madurantakam', 31, 504, 'Madurantakam', '', 0, '', '', '', '', '', '', '', '', '', NULL, NULL, '107');

-- --------------------------------------------------------

--
-- Table structure for table `driver_mgt`
--

CREATE TABLE `driver_mgt` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `driver_id` int(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `fuel_ent_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver_mgt`
--

INSERT INTO `driver_mgt` (`id`, `intAdminId`, `driver_id`, `amount`, `ent_date`, `type`, `reason`, `tripid`, `fuel_ent_id`) VALUES
(32, 1, 2, '600', '2018-01-04', '2', 'Diesel Payment', 'Home Halt', '13'),
(35, 1, 24, '666', '2018-01-04', '2', 'Diesel Payment', 'Home Halt', '14'),
(42, 1, 14, '3000', '0000-00-00', '2', 'Diesel Payment', '23', '17'),
(52, 1, 4, '100', '2018-08-13', '1', 'Load Advance', '28', ''),
(53, 1, 4, '100', '2018-08-13', '1', 'Load Advance', '28', ''),
(54, 1, 4, '100', '2018-08-13', '1', 'Diesel Advance', '28', ''),
(55, 1, 4, '900', '2018-08-13', '1', 'Return Advance', '28', ''),
(56, 1, 4, '700', '2018-08-13', '1', 'OnRoad Advance', '28', ''),
(57, 1, 4, '700', '2018-08-13', '1', 'Home Halt Advance Chennai', '', ''),
(58, 1, 1, '3000', '2018-08-13', '1', 'Load Advance', '29', ''),
(59, 1, 1, '1000', '2018-08-13', '1', 'Load Advance', '29', ''),
(60, 1, 1, '7200', '2018-08-13', '1', 'Diesel Advance', '29', ''),
(61, 1, 3, '2000', '2018-08-12', '1', 'OnRoad Advance', '25', ''),
(62, 1, 4, '2000', '2018-08-14', '1', 'Load Advance', '30', ''),
(63, 1, 4, '200', '2018-08-14', '1', 'Load Advance', '30', ''),
(64, 1, 4, '100', '2018-08-14', '1', 'Diesel Advance', '30', ''),
(65, 1, 7, '50000', '2018-08-14', '1', 'Load Advance', '31', ''),
(66, 1, 7, '0', '2018-08-14', '1', 'Load Advance', '31', ''),
(67, 1, 14, '1000', '2018-08-16', '1', 'Load Advance', '32', ''),
(68, 1, 14, '1000', '2018-08-16', '1', 'Load Advance', '32', ''),
(69, 1, 14, '500', '2018-08-16', '1', 'Diesel Advance', '32', ''),
(70, 1, 62, '111', '2018-08-22', '1', 'Load Advance', '33', ''),
(71, 1, 62, '222', '2018-08-22', '1', 'Load Advance', '33', ''),
(72, 1, 62, '1212', '2018-08-22', '1', 'Diesel Advance', '33', '');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `tag_id`, `entrytype_id`, `number`, `date`, `dr_total`, `cr_total`, `narration`) VALUES
(1, NULL, 4, 1, '2018-04-01', '11914.00', '11914.00', 'Fuel Purchase1Qty:123.59lts.'),
(2, NULL, 4, 2, '2018-04-01', '8414.00', '8414.00', 'Fuel Purchase1Qty:123.59lts.'),
(3, NULL, 4, 3, '2018-04-01', '8414.00', '8414.00', 'Fuel Purchase1Qty:123.59lts.'),
(4, NULL, 4, 4, '2018-04-01', '8414.00', '8414.00', 'Fuel Purchase1Qty:123.59lts.'),
(5, NULL, 4, 5, '2018-06-07', '8414.00', '8414.00', 'Fuel Purchase1Qty:123.59lts.'),
(6, NULL, 2, 1, '2018-06-07', '3500.00', '3500.00', 'Trip Advance'),
(7, NULL, 4, 6, '2018-04-01', '14160.64', '14160.64', 'Fuel Purchase2Qty:208lts.'),
(8, NULL, 2, 2, '2018-04-01', '3500.00', '3500.00', 'Trip Advance'),
(9, NULL, 4, 7, '2018-04-01', '9853.89', '9853.89', 'Fuel PurchaseHome HaltQty:144.74lts.'),
(10, NULL, 4, 8, '2018-04-01', '15113.76', '15113.76', 'Fuel Purchase3Qty:222lts.'),
(11, NULL, 2, 3, '2018-04-01', '3500.00', '3500.00', 'Trip Advance'),
(12, NULL, 2, 4, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(13, NULL, 4, 9, '2018-04-01', '14092.56', '14092.56', 'Fuel Purchase5Qty:207lts.'),
(14, NULL, 2, 5, '2018-04-01', '4000.00', '4000.00', 'Trip Advance'),
(15, NULL, 2, 6, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(16, NULL, 4, 10, '2018-04-01', '17020.00', '17020.00', 'Fuel Purchase7Qty:250lts.'),
(17, NULL, 2, 7, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(18, NULL, 2, 8, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(19, NULL, 2, 9, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(20, NULL, 2, 10, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(21, NULL, 4, 11, '2018-04-01', '11711.10', '11711.10', 'Fuel Purchase11Qty:172.02lts.'),
(22, NULL, 2, 11, '2018-04-01', '4000.00', '4000.00', 'Trip Advance'),
(23, NULL, 2, 12, '2018-04-01', '3500.00', '3500.00', 'Trip Advance'),
(24, NULL, 2, 13, '2018-04-01', '2000.00', '2000.00', 'Trip Advance'),
(25, NULL, 2, 14, '2018-04-01', '3000.00', '3000.00', 'Trip Advance'),
(26, NULL, 2, 15, '2018-06-07', '50000.00', '50000.00', ''),
(27, NULL, 4, 12, '2018-04-02', '13774.38', '13774.38', 'Fuel PurchaseHome HaltQty:202lts.'),
(28, NULL, 2, 16, '2018-04-02', '3000.00', '3000.00', 'Trip Advance'),
(29, NULL, 2, 17, '2018-06-07', '50000.00', '50000.00', ''),
(31, 1, 2, 18, '2018-06-07', '10000.00', '10000.00', ''),
(32, NULL, 1, 1, '2018-06-08', '4000.00', '4000.00', 'Advance Payment on Trip16'),
(33, NULL, 2, 19, '2018-06-08', '4000.00', '4000.00', 'Trip Advance'),
(34, NULL, 1, 2, '2018-06-08', '5000.00', '5000.00', 'Advance Payment on Trip17'),
(35, NULL, 2, 20, '2018-06-08', '1000.00', '1000.00', 'Trip Advance'),
(36, NULL, 1, 3, '2018-06-08', '1000.00', '1000.00', 'Advance Payment on Trip18'),
(37, NULL, 2, 21, '2018-06-08', '1000.00', '1000.00', 'Trip Advance'),
(38, NULL, 1, 4, '2018-06-08', '4500.00', '4500.00', 'Advance Payment on Trip19'),
(39, NULL, 2, 22, '2018-06-08', '5000.00', '5000.00', 'Trip Advance'),
(40, NULL, 1, 5, '2018-06-08', '4500.00', '4500.00', 'Advance Payment on Trip19'),
(41, NULL, 2, 23, '2018-06-08', '5000.00', '5000.00', 'Trip Advance'),
(42, NULL, 1, 6, '2018-06-08', '4500.00', '4500.00', 'Advance Payment on Trip19'),
(43, NULL, 2, 24, '2018-06-08', '5000.00', '5000.00', 'Trip Advance'),
(44, NULL, 1, 7, '2018-06-08', '100.00', '100.00', 'Advance Payment on Trip20'),
(45, NULL, 2, 25, '2018-06-08', '100.00', '100.00', 'Trip Advance'),
(46, NULL, 1, 8, '2018-06-08', '700.00', '700.00', 'Advance Payment on Trip21'),
(47, NULL, 2, 26, '2018-06-08', '700.00', '700.00', 'Trip Advance'),
(48, NULL, 1, 9, '2018-06-08', '1000.00', '1000.00', 'Advance Payment on Trip22'),
(49, NULL, 2, 27, '2018-06-08', '1000.00', '1000.00', 'Trip Advance'),
(50, NULL, 2, 28, '2018-06-11', '10000.00', '10000.00', 'ADVANCE'),
(51, NULL, 2, 29, '2018-06-11', '10000.00', '10000.00', 'ADVANCE'),
(52, NULL, 2, 30, '2018-06-11', '5000.00', '5000.00', 'ADVANCE'),
(53, NULL, 4, 13, '2018-01-04', '600.00', '600.00', 'Fuel PurchaseHome HaltQty:2lts.'),
(54, NULL, 4, 14, '2018-01-04', '600.00', '600.00', 'Fuel PaymentHome HaltQty:2lts.'),
(55, NULL, 4, 15, '2018-01-04', '600.00', '600.00', 'Fuel PaymentHome HaltQty:2lts.PaID BY Ananadan VFor TN21AY3063'),
(56, NULL, 2, 31, '2018-04-01', '76800.00', '76800.00', 'Home Halt Advance on Chennai6800 and MKM70000'),
(57, NULL, 2, 32, '2018-04-01', '9797.00', '9797.00', 'Home Halt Advance on Chennai797 and MKM9000'),
(58, NULL, 4, 16, '2018-01-04', '666.00', '666.00', 'Fuel PurchaseHome HaltQty:3lts.'),
(59, NULL, 4, 17, '2018-01-04', '666.00', '666.00', 'Fuel PaymentHome HaltQty:3lts.'),
(60, NULL, 4, 18, '2018-01-04', '666.00', '666.00', 'Fuel PaymentHome HaltQty:3lts.PaID BY Loganathan NFor TN21L9196'),
(61, NULL, 2, 33, '2018-04-01', '14999.00', '14999.00', 'Home Halt Advance on Chennai8000 and MKM6999'),
(62, NULL, 2, 34, '2018-04-01', '15000.00', '15000.00', 'Home Halt Advance on Chennai7000 and MKM8000'),
(63, NULL, 4, 19, '2018-06-11', '23000.00', '23000.00', 'Bill Amount for Bill1'),
(64, NULL, 1, 10, '2018-06-11', '23000.00', '23000.00', 'Payment for bill no Bill1'),
(65, NULL, 4, 20, '2018-06-11', '23000.00', '23000.00', 'Payment for bill no Bill1'),
(66, NULL, 4, 21, '2018-06-11', '4500.00', '4500.00', 'Fuel Purchase23Qty:15lts.'),
(67, NULL, 2, 35, '2018-06-11', '4500.00', '4500.00', 'Fuel Purchase Payment23Qty:15lts.ForTN21AY3063'),
(68, NULL, 4, 22, '2018-06-11', '4500.00', '4500.00', 'Fuel Payment23Qty:15lts.For TN21AY3063'),
(69, NULL, 2, 36, '2018-06-12', '2000.00', '2000.00', 'Advance Amount'),
(70, NULL, 4, 23, '2018-06-12', '1500.00', '1500.00', 'Bill Amount : 1 '),
(71, NULL, 4, 24, '2018-06-12', '4086.00', '4086.00', 'Bill Amount : 2 '),
(72, NULL, 2, 37, '2018-06-12', '5000.00', '5000.00', 'Advance Amount'),
(73, NULL, 2, 38, '2018-06-12', '5586.00', '5586.00', 'Payment for Bill Amount2 '),
(74, NULL, 4, 25, '2018-06-12', '5586.00', '5586.00', 'Payment for Bill Amount2 '),
(75, NULL, 2, 39, '2018-06-13', '1000.00', '1000.00', 'Return Advance on Trip8'),
(76, NULL, 2, 40, '2018-06-13', '1000.00', '1000.00', ''),
(77, NULL, 4, 26, '2018-06-18', '6000.00', '6000.00', 'Fuel Purchase23Qty:500lts.'),
(78, NULL, 1, 11, '2018-06-18', '5000.00', '5000.00', 'Advance Payment on Trip23'),
(79, NULL, 2, 41, '2018-06-18', '10000.00', '10000.00', 'Trip Advance on Trip23Place:VelloreVechNo:TN04AS2218'),
(80, NULL, 4, 27, '2018-06-18', '6000.00', '6000.00', 'Diesel Advance on Trip23Place:VelloreVechNo:TN04AS2218'),
(81, NULL, 4, 28, '0000-00-00', '3000.00', '3000.00', 'Fuel Purchase23Qty:50lts.'),
(82, NULL, 4, 29, '0000-00-00', '3000.00', '3000.00', 'Fuel Payment23Qty:50lts.'),
(83, NULL, 4, 30, '0000-00-00', '3000.00', '3000.00', 'Fuel Payment23Qty:50lts.PaID BY H MasthanFor TN04AS2218'),
(84, NULL, 2, 42, '2018-06-18', '3000.00', '3000.00', 'On Road Advance on Trip23'),
(85, NULL, 1, 12, '2018-06-18', '7000.00', '7000.00', 'Advance Payment Included'),
(86, NULL, 4, 31, '2018-06-18', '58000.00', '58000.00', 'Bill Amount for Bill2'),
(87, NULL, 4, 32, '2018-06-18', '102400.00', '102400.00', 'Bill Amount : 3 '),
(88, NULL, 2, 43, '2018-06-18', '25000.00', '25000.00', 'Payment for Bill Amount3 '),
(89, NULL, 4, 33, '2018-06-18', '25000.00', '25000.00', 'Payment for Bill Amount3 '),
(90, NULL, 2, 44, '2018-06-18', '600.00', '600.00', 'Payment for Bill Amount3 '),
(91, NULL, 4, 34, '2018-06-18', '600.00', '600.00', 'Payment for Bill Amount3 '),
(92, NULL, 2, 45, '2018-06-26', '10000.00', '10000.00', 'Tollplaza'),
(93, NULL, 2, 46, '2018-07-13', '69.00', '69.00', 'Payment for Bill Amount3 '),
(94, NULL, 4, 35, '2018-07-13', '69.00', '69.00', 'Payment for Bill Amount3 '),
(95, NULL, 1, 13, '2018-07-13', '10000.00', '10000.00', 'Payment for bill no Bill2'),
(96, NULL, 4, 36, '2018-07-13', '10000.00', '10000.00', 'Payment for bill no Bill2'),
(97, NULL, 1, 14, '2018-07-13', '10000.00', '10000.00', 'Payment for bill no Bill2'),
(98, NULL, 4, 37, '2018-07-13', '10000.00', '10000.00', 'Payment for bill no Bill2'),
(99, NULL, 4, 38, '2018-07-13', '6000.00', '6000.00', 'Bill Amount : 4 '),
(100, NULL, 1, 15, '2018-07-17', '10000.00', '10000.00', 'Advance Payment on Trip24'),
(101, NULL, 2, 47, '2018-07-17', '5000.00', '5000.00', 'Trip Advance on Trip24Place:ChennaiVechNo:TN04AS3105'),
(102, NULL, 4, 39, '2018-07-17', '40000.00', '40000.00', 'Bill Amount for Bill3'),
(103, NULL, 1, 16, '2018-07-17', '30000.00', '30000.00', 'Payment for bill no Bill3'),
(104, NULL, 4, 40, '2018-07-17', '50000.00', '50000.00', 'Bill Amount : 5 '),
(105, NULL, 2, 48, '2018-07-17', '40000.00', '40000.00', 'Payment for Bill Amount5 '),
(106, NULL, 4, 41, '2018-07-17', '40000.00', '40000.00', 'Payment for Bill Amount5 '),
(107, NULL, 4, 42, '2018-07-24', '8000.00', '8000.00', 'Bill Amount for Bill4'),
(108, NULL, 2, 49, '2018-07-24', '5300.00', '5300.00', 'Payment for Bill Amount4 '),
(109, NULL, 4, 43, '2018-07-24', '5300.00', '5300.00', 'Payment for Bill Amount4 '),
(110, NULL, 1, 17, '2018-08-04', '40000.00', '40000.00', 'Advance Payment on Trip26'),
(111, NULL, 4, 44, '2018-08-04', '2000000.00', '2000000.00', 'Fuel Purchase27Qty:5000lts.'),
(112, NULL, 4, 45, '2018-08-09', '65456.00', '65456.00', 'Fuel Purchase28Qty:450lts.'),
(113, NULL, 4, 46, '2018-08-09', '65456.00', '65456.00', 'Fuel Purchase28Qty:450lts.'),
(114, NULL, 4, 47, '2018-08-09', '70000.00', '70000.00', 'Bill Amount : 6 '),
(115, NULL, 4, 48, '2018-08-13', '12345.00', '12345.00', 'Fuel Purchase28Qty:123lts.'),
(116, NULL, 2, 50, '2018-08-13', '12345.00', '12345.00', 'Fuel Purchase Payment28Qty:123lts.ForTN19U0181'),
(117, NULL, 4, 49, '2018-08-13', '12345.00', '12345.00', 'Fuel Payment28Qty:123lts.For TN19U0181'),
(118, NULL, 1, 18, '2018-08-13', '500.00', '500.00', 'Advance Payment on Trip28'),
(119, NULL, 2, 51, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181'),
(120, NULL, 2, 52, '2018-08-13', '100.00', '100.00', 'Trip Advance on Trip28Place:MadhepuraVechNo:TN19U0181-MKM'),
(121, NULL, 4, 50, '2018-08-13', '100.00', '100.00', 'Diesel Advance on Trip28Place:MadhepuraVechNo:TN19U0181'),
(122, NULL, 2, 53, '2018-08-13', '900.00', '900.00', 'Return Advance on Trip688VechNo:TN19U0181-Cash'),
(123, NULL, 2, 54, '2018-08-13', '700.00', '700.00', 'On Road Advance on Trip28'),
(124, NULL, 4, 51, '2018-08-13', '800.00', '800.00', 'Fuel PurchaseHome HaltQty:8lts.'),
(125, NULL, 2, 55, '2018-08-13', '800.00', '800.00', 'Fuel Purchase PaymentHome HaltQty:8lts.ForTN19U0181'),
(126, NULL, 4, 52, '2018-08-13', '800.00', '800.00', 'Fuel PaymentHome HaltQty:8lts.For TN19U0181'),
(127, NULL, 2, 56, '2018-08-13', '1300.00', '1300.00', 'Home Halt Advance on Chennai700 and MKM600'),
(128, NULL, 4, 53, '2018-08-13', '7200.00', '7200.00', 'Fuel Purchase29Qty:100lts.'),
(129, NULL, 2, 57, '2018-08-13', '3000.00', '3000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196'),
(130, NULL, 2, 58, '2018-08-13', '1000.00', '1000.00', 'Trip Advance on Trip29Place:CoimbatoreVechNo:TN21L9196-MKM'),
(131, NULL, 4, 54, '2018-08-13', '7200.00', '7200.00', 'Diesel Advance on Trip29Place:CoimbatoreVechNo:TN21L9196'),
(132, NULL, 2, 59, '2018-08-13', '20000.00', '20000.00', 'Trip Advance'),
(133, NULL, 4, 55, '2018-08-12', '7200.00', '7200.00', 'Fuel Purchase25Qty:100lts.'),
(134, NULL, 2, 60, '2018-08-12', '2000.00', '2000.00', 'On Road Advance on Trip25'),
(135, NULL, 4, 56, '2018-08-13', '1396.00', '1396.00', 'Bill Amount for Bill5'),
(136, NULL, 1, 19, '2018-08-13', '10000.00', '10000.00', 'Advance Amount'),
(137, NULL, 1, 20, '2018-08-13', '10000.00', '10000.00', 'Advance Amount'),
(138, NULL, 1, 21, '2018-08-13', '1000.00', '1000.00', 'Payment for bill no Bill5'),
(139, NULL, 2, 61, '2018-08-13', '10000.00', '10000.00', 'Tollplaza'),
(140, NULL, 2, 62, '2018-08-13', '50000.00', '50000.00', 'Payment for Bill Amount6 '),
(141, NULL, 4, 57, '2018-08-13', '50000.00', '50000.00', 'Payment for Bill Amount6 '),
(142, NULL, 2, 63, '2018-08-14', '2000.00', '2000.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181'),
(143, NULL, 2, 64, '2018-08-14', '200.00', '200.00', 'Trip Advance on Trip30Place:VechNo:TN19U0181-MKM'),
(144, NULL, 4, 58, '2018-08-14', '100.00', '100.00', 'Diesel Advance on Trip30Place:VechNo:TN19U0181'),
(145, NULL, 1, 22, '2018-08-14', '100000.00', '100000.00', 'Advance Payment on Trip31'),
(146, NULL, 2, 65, '2018-08-14', '50000.00', '50000.00', 'Trip Advance on Trip31Place:TapiVechNo:TN21AY3063'),
(147, NULL, 4, 59, '2018-08-14', '145.00', '145.00', 'Fuel Purchase31Qty:500lts.'),
(148, NULL, 2, 66, '2018-08-14', '145.00', '145.00', 'Fuel Purchase Payment31Qty:500lts.ForTN21AY3063'),
(149, NULL, 4, 60, '2018-08-14', '145.00', '145.00', 'Fuel Payment31Qty:500lts.For TN21AY3063'),
(150, NULL, 4, 61, '2018-08-16', '500.00', '500.00', 'Fuel Purchase32Qty:5lts.'),
(151, NULL, 2, 67, '2018-08-16', '500.00', '500.00', 'Fuel Purchase Payment32Qty:5lts.ForTN04AS2218'),
(152, NULL, 4, 62, '2018-08-16', '500.00', '500.00', 'Fuel Payment32Qty:5lts.For TN04AS2218'),
(153, NULL, 1, 23, '2018-08-16', '2000.00', '2000.00', 'Advance Payment on Trip32'),
(154, NULL, 2, 68, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218'),
(155, NULL, 2, 69, '2018-08-16', '1000.00', '1000.00', 'Trip Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218-MKM'),
(156, NULL, 4, 63, '2018-08-16', '500.00', '500.00', 'Diesel Advance on Trip32Place:TiruchirappalliVechNo:TN04AS2218'),
(157, NULL, 4, 64, '2018-08-22', '1212.00', '1212.00', 'Fuel Purchase33Qty:222lts.'),
(158, NULL, 2, 70, '2018-08-22', '1212.00', '1212.00', 'Fuel Purchase Payment33Qty:222lts.ForTN04AS3114'),
(159, NULL, 4, 65, '2018-08-22', '1212.00', '1212.00', 'Fuel Payment33Qty:222lts.For TN04AS3114'),
(160, NULL, 1, 24, '2018-08-22', '4242.00', '4242.00', 'Advance Payment on Trip33'),
(161, NULL, 2, 71, '2018-08-22', '111.00', '111.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114'),
(162, NULL, 2, 72, '2018-08-22', '222.00', '222.00', 'Trip Advance on Trip33Place:ChennaiVechNo:TN04AS3114-MKM'),
(163, NULL, 4, 66, '2018-08-22', '1212.00', '1212.00', 'Diesel Advance on Trip33Place:ChennaiVechNo:TN04AS3114'),
(164, NULL, 4, 67, '2018-08-28', '21.00', '21.00', 'Fuel Purchase34Qty:45lts.'),
(165, NULL, 2, 73, '2018-08-28', '21.00', '21.00', 'Fuel Purchase Payment34Qty:45lts.ForTN19Z8350'),
(166, NULL, 4, 68, '2018-08-28', '21.00', '21.00', 'Fuel Payment34Qty:45lts.For TN19Z8350');

-- --------------------------------------------------------

--
-- Table structure for table `entryitems`
--

CREATE TABLE `entryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entryitems`
--

INSERT INTO `entryitems` (`id`, `entry_id`, `ledger_id`, `amount`, `dc`, `reconciliation_date`) VALUES
(1, 1, 59, '11914.00', 'C', NULL),
(2, 1, 7, '11914.00', 'D', NULL),
(3, 2, 59, '8414.00', 'C', NULL),
(4, 2, 7, '8414.00', 'D', NULL),
(5, 3, 59, '8414.00', 'C', NULL),
(6, 3, 7, '8414.00', 'D', NULL),
(7, 4, 59, '8414.00', 'C', NULL),
(8, 4, 7, '8414.00', 'D', NULL),
(9, 5, 59, '8414.00', 'C', NULL),
(10, 5, 7, '8414.00', 'D', '2018-06-01'),
(11, 6, 17, '3500.00', 'C', NULL),
(12, 6, 1, '3500.00', 'D', NULL),
(13, 7, 59, '14160.64', 'C', NULL),
(14, 7, 7, '14160.64', 'D', NULL),
(15, 8, 20, '3500.00', 'C', NULL),
(16, 8, 1, '3500.00', 'D', NULL),
(17, 9, 59, '9853.89', 'C', NULL),
(18, 9, 7, '9853.89', 'D', NULL),
(19, 10, 59, '15113.76', 'C', NULL),
(20, 10, 7, '15113.76', 'D', NULL),
(21, 11, 27, '3500.00', 'C', NULL),
(22, 11, 1, '3500.00', 'D', NULL),
(23, 12, 23, '2000.00', 'C', NULL),
(24, 12, 1, '2000.00', 'D', NULL),
(25, 13, 59, '14092.56', 'C', NULL),
(26, 13, 7, '14092.56', 'D', NULL),
(27, 14, 25, '4000.00', 'C', NULL),
(28, 14, 1, '4000.00', 'D', NULL),
(29, 15, 23, '2000.00', 'C', NULL),
(30, 15, 1, '2000.00', 'D', NULL),
(31, 16, 59, '17020.00', 'C', NULL),
(32, 16, 7, '17020.00', 'D', NULL),
(33, 17, 17, '2000.00', 'C', NULL),
(34, 17, 1, '2000.00', 'D', NULL),
(35, 18, 17, '2000.00', 'C', NULL),
(36, 18, 1, '2000.00', 'D', NULL),
(37, 19, 17, '2000.00', 'C', NULL),
(38, 19, 1, '2000.00', 'D', NULL),
(39, 20, 28, '2000.00', 'C', NULL),
(40, 20, 1, '2000.00', 'D', NULL),
(41, 21, 59, '11711.10', 'C', NULL),
(42, 21, 7, '11711.10', 'D', NULL),
(43, 22, 17, '4000.00', 'C', NULL),
(44, 22, 1, '4000.00', 'D', NULL),
(45, 23, 17, '3500.00', 'C', NULL),
(46, 23, 1, '3500.00', 'D', NULL),
(47, 24, 30, '2000.00', 'C', NULL),
(48, 24, 1, '2000.00', 'D', NULL),
(49, 25, 30, '3000.00', 'C', NULL),
(50, 25, 1, '3000.00', 'D', NULL),
(51, 26, 1, '50000.00', 'C', NULL),
(52, 26, 59, '50000.00', 'D', NULL),
(53, 27, 59, '13774.38', 'C', NULL),
(54, 27, 7, '13774.38', 'D', '2018-06-01'),
(55, 28, 20, '3000.00', 'C', NULL),
(56, 28, 1, '3000.00', 'D', NULL),
(57, 29, 1, '50000.00', 'C', NULL),
(58, 29, 17, '50000.00', 'D', NULL),
(61, 31, 1, '10000.00', 'C', NULL),
(62, 31, 17, '10000.00', 'D', NULL),
(63, 32, 1, '4000.00', 'C', NULL),
(64, 32, 12, '4000.00', 'D', NULL),
(65, 33, 25, '4000.00', 'C', NULL),
(66, 33, 1, '4000.00', 'D', NULL),
(67, 34, 1, '5000.00', 'C', NULL),
(68, 34, 14, '5000.00', 'D', NULL),
(69, 35, 23, '1000.00', 'C', NULL),
(70, 35, 1, '1000.00', 'D', NULL),
(71, 36, 1, '1000.00', 'C', NULL),
(72, 36, 31, '1000.00', 'D', NULL),
(73, 37, 23, '1000.00', 'C', NULL),
(74, 37, 1, '1000.00', 'D', NULL),
(75, 38, 1, '4500.00', 'C', NULL),
(76, 38, 14, '4500.00', 'D', NULL),
(77, 39, 20, '5000.00', 'C', NULL),
(78, 39, 1, '5000.00', 'D', NULL),
(79, 40, 1, '4500.00', 'C', NULL),
(80, 40, 14, '4500.00', 'D', NULL),
(81, 41, 20, '5000.00', 'C', NULL),
(82, 41, 1, '5000.00', 'D', NULL),
(83, 42, 1, '4500.00', 'C', NULL),
(84, 42, 14, '4500.00', 'D', NULL),
(85, 43, 20, '5000.00', 'C', NULL),
(86, 43, 1, '5000.00', 'D', NULL),
(87, 44, 1, '100.00', 'C', NULL),
(88, 44, 12, '100.00', 'D', NULL),
(89, 45, 25, '100.00', 'C', NULL),
(90, 45, 1, '100.00', 'D', NULL),
(91, 46, 1, '700.00', 'C', NULL),
(92, 46, 12, '700.00', 'D', NULL),
(93, 47, 17, '700.00', 'C', NULL),
(94, 47, 1, '700.00', 'D', NULL),
(95, 48, 1, '1000.00', 'C', NULL),
(96, 48, 12, '1000.00', 'D', NULL),
(97, 49, 20, '1000.00', 'C', NULL),
(98, 49, 1, '1000.00', 'D', NULL),
(99, 50, 1, '10000.00', 'D', NULL),
(100, 50, 7, '10000.00', 'C', NULL),
(101, 51, 1, '10000.00', 'D', NULL),
(102, 51, 7, '10000.00', 'C', NULL),
(103, 52, 1, '5000.00', 'D', NULL),
(104, 52, 17, '5000.00', 'C', NULL),
(105, 53, 59, '600.00', 'C', NULL),
(106, 53, 7, '600.00', 'D', NULL),
(108, 54, 59, '600.00', 'D', NULL),
(110, 55, 7, '600.00', 'D', NULL),
(111, 56, 17, '76800.00', 'C', NULL),
(112, 56, 1, '76800.00', 'D', NULL),
(113, 57, 17, '9797.00', 'C', NULL),
(114, 57, 1, '9797.00', 'D', NULL),
(115, 58, 59, '666.00', 'C', NULL),
(116, 58, 7, '666.00', 'D', NULL),
(118, 59, 59, '666.00', 'D', NULL),
(120, 60, 7, '666.00', 'D', NULL),
(121, 61, 17, '14999.00', 'C', NULL),
(122, 61, 1, '14999.00', 'D', NULL),
(123, 62, 17, '15000.00', 'C', NULL),
(124, 62, 1, '15000.00', 'D', NULL),
(125, 63, 38, '23000.00', 'C', NULL),
(126, 63, 6, '23000.00', 'D', NULL),
(127, 64, 1, '23000.00', 'C', NULL),
(128, 64, 38, '23000.00', 'D', NULL),
(129, 65, 6, '23000.00', 'D', NULL),
(130, 65, 70, '23000.00', 'C', NULL),
(131, 66, 59, '4500.00', 'C', NULL),
(132, 66, 7, '4500.00', 'D', NULL),
(133, 67, 1, '4500.00', 'C', NULL),
(134, 67, 59, '4500.00', 'D', NULL),
(136, 68, 7, '4500.00', 'D', NULL),
(137, 69, 1, '2000.00', 'D', NULL),
(138, 69, 17, '2000.00', 'C', NULL),
(139, 70, 7, '1500.00', 'C', NULL),
(140, 70, 17, '1500.00', 'D', NULL),
(141, 71, 7, '4086.00', 'C', NULL),
(142, 71, 17, '4086.00', 'D', NULL),
(143, 72, 1, '5000.00', 'D', NULL),
(144, 72, 17, '5000.00', 'C', NULL),
(145, 73, 17, '5586.00', 'C', NULL),
(146, 73, 1, '5586.00', 'D', NULL),
(147, 74, 7, '5586.00', 'D', NULL),
(148, 74, 71, '5586.00', 'C', NULL),
(149, 75, 17, '1000.00', 'C', NULL),
(150, 75, 1, '1000.00', 'D', NULL),
(151, 76, 1, '1000.00', 'C', NULL),
(152, 76, 73, '1000.00', 'D', NULL),
(153, 77, 59, '6000.00', 'C', NULL),
(154, 77, 7, '6000.00', 'D', NULL),
(155, 78, 1, '5000.00', 'C', NULL),
(156, 78, 21, '5000.00', 'D', NULL),
(157, 79, 17, '10000.00', 'C', NULL),
(158, 79, 1, '10000.00', 'D', NULL),
(159, 80, 17, '6000.00', 'C', NULL),
(160, 80, 6, '6000.00', 'D', NULL),
(161, 81, 59, '3000.00', 'C', NULL),
(162, 81, 7, '3000.00', 'D', NULL),
(164, 82, 59, '3000.00', 'D', NULL),
(166, 83, 7, '3000.00', 'D', NULL),
(167, 84, 17, '3000.00', 'C', NULL),
(168, 84, 1, '3000.00', 'D', NULL),
(171, 85, 1, '7000.00', 'D', NULL),
(172, 85, 21, '7000.00', 'C', NULL),
(173, 86, 21, '58000.00', 'C', NULL),
(174, 86, 6, '58000.00', 'D', NULL),
(175, 87, 7, '102400.00', 'C', NULL),
(176, 87, 17, '102400.00', 'D', NULL),
(177, 88, 17, '25000.00', 'C', NULL),
(178, 88, 1, '25000.00', 'D', NULL),
(179, 89, 7, '25000.00', 'D', NULL),
(180, 89, 71, '25000.00', 'C', NULL),
(181, 90, 17, '600.00', 'C', NULL),
(182, 90, 1, '600.00', 'D', NULL),
(183, 91, 7, '600.00', 'D', NULL),
(184, 91, 71, '600.00', 'C', NULL),
(185, 92, 1, '10000.00', 'D', NULL),
(186, 92, 17, '10000.00', 'C', NULL),
(187, 93, 17, '69.00', 'C', NULL),
(189, 94, 7, '69.00', 'D', NULL),
(190, 94, 71, '69.00', 'C', NULL),
(191, 95, 1, '10000.00', 'C', NULL),
(192, 95, 21, '10000.00', 'D', NULL),
(193, 96, 6, '10000.00', 'D', NULL),
(194, 96, 70, '10000.00', 'C', NULL),
(195, 97, 1, '10000.00', 'C', NULL),
(196, 97, 21, '10000.00', 'D', NULL),
(197, 98, 6, '10000.00', 'D', NULL),
(198, 98, 70, '10000.00', 'C', NULL),
(199, 99, 7, '6000.00', 'C', NULL),
(200, 99, 17, '6000.00', 'D', NULL),
(201, 100, 72, '10000.00', 'C', NULL),
(202, 100, 35, '10000.00', 'D', NULL),
(203, 101, 28, '5000.00', 'C', NULL),
(204, 101, 1, '5000.00', 'D', NULL),
(205, 102, 35, '40000.00', 'C', NULL),
(206, 102, 6, '40000.00', 'D', NULL),
(207, 103, 1, '30000.00', 'C', NULL),
(208, 103, 35, '30000.00', 'D', NULL),
(209, 104, 7, '50000.00', 'C', NULL),
(210, 104, 28, '50000.00', 'D', NULL),
(211, 105, 28, '40000.00', 'C', NULL),
(212, 105, 1, '40000.00', 'D', NULL),
(213, 106, 7, '40000.00', 'D', NULL),
(214, 106, 71, '40000.00', 'C', NULL),
(215, 107, 19, '8000.00', 'C', NULL),
(216, 107, 6, '8000.00', 'D', NULL),
(217, 108, 17, '5300.00', 'C', NULL),
(218, 108, 1, '5300.00', 'D', NULL),
(219, 109, 7, '5300.00', 'D', NULL),
(220, 109, 71, '5300.00', 'C', NULL),
(221, 110, 1, '40000.00', 'C', NULL),
(222, 110, 38, '40000.00', 'D', NULL),
(223, 111, 59, '2000000.00', 'C', NULL),
(224, 111, 7, '2000000.00', 'D', NULL),
(225, 112, 59, '65456.00', 'C', NULL),
(226, 112, 7, '65456.00', 'D', NULL),
(227, 113, 59, '65456.00', 'C', NULL),
(228, 113, 7, '65456.00', 'D', NULL),
(229, 114, 7, '70000.00', 'C', NULL),
(230, 114, 17, '70000.00', 'D', NULL),
(231, 115, 59, '12345.00', 'C', NULL),
(232, 115, 7, '12345.00', 'D', NULL),
(233, 116, 1, '12345.00', 'C', NULL),
(234, 116, 59, '12345.00', 'D', NULL),
(236, 117, 7, '12345.00', 'D', NULL),
(237, 118, 1, '500.00', 'C', NULL),
(238, 118, 12, '500.00', 'D', NULL),
(239, 119, 17, '100.00', 'C', NULL),
(240, 119, 1, '100.00', 'D', NULL),
(241, 120, 17, '100.00', 'C', NULL),
(242, 120, 1, '100.00', 'D', NULL),
(243, 121, 17, '100.00', 'C', NULL),
(244, 121, 6, '100.00', 'D', NULL),
(245, 122, 17, '900.00', 'C', NULL),
(246, 122, 1, '900.00', 'D', NULL),
(247, 123, 17, '700.00', 'C', NULL),
(248, 123, 1, '700.00', 'D', NULL),
(249, 124, 59, '800.00', 'C', NULL),
(250, 124, 7, '800.00', 'D', NULL),
(251, 125, 1, '800.00', 'C', NULL),
(252, 125, 59, '800.00', 'D', NULL),
(254, 126, 7, '800.00', 'D', NULL),
(255, 127, 17, '1300.00', 'C', NULL),
(256, 127, 1, '1300.00', 'D', NULL),
(257, 128, 59, '7200.00', 'C', NULL),
(258, 128, 7, '7200.00', 'D', NULL),
(259, 129, 17, '3000.00', 'C', NULL),
(260, 129, 1, '3000.00', 'D', NULL),
(261, 130, 17, '1000.00', 'C', NULL),
(262, 130, 1, '1000.00', 'D', NULL),
(263, 131, 17, '7200.00', 'C', NULL),
(264, 131, 6, '7200.00', 'D', NULL),
(267, 133, 59, '7200.00', 'C', NULL),
(268, 133, 7, '7200.00', 'D', NULL),
(269, 134, 17, '2000.00', 'C', NULL),
(270, 134, 1, '2000.00', 'D', NULL),
(271, 135, 12, '1396.00', 'C', NULL),
(272, 135, 6, '1396.00', 'D', NULL),
(273, 136, 1, '10000.00', 'D', NULL),
(274, 136, 12, '10000.00', 'C', NULL),
(275, 137, 1, '10000.00', 'D', NULL),
(276, 137, 19, '10000.00', 'C', NULL),
(277, 138, 1, '1000.00', 'C', NULL),
(278, 138, 12, '1000.00', 'D', NULL),
(279, 139, 1, '10000.00', 'D', NULL),
(280, 139, 17, '10000.00', 'C', NULL),
(281, 140, 17, '50000.00', 'C', NULL),
(282, 140, 1, '50000.00', 'D', NULL),
(283, 141, 7, '50000.00', 'D', NULL),
(284, 141, 71, '50000.00', 'C', NULL),
(285, 142, 17, '2000.00', 'C', NULL),
(286, 142, 1, '2000.00', 'D', NULL),
(287, 143, 17, '200.00', 'C', NULL),
(288, 143, 1, '200.00', 'D', NULL),
(289, 144, 17, '100.00', 'C', NULL),
(290, 144, 6, '100.00', 'D', NULL),
(291, 145, 1, '100000.00', 'C', NULL),
(292, 145, 31, '100000.00', 'D', NULL),
(293, 146, 17, '50000.00', 'C', NULL),
(294, 146, 1, '50000.00', 'D', NULL),
(295, 147, 59, '145.00', 'C', NULL),
(296, 147, 7, '145.00', 'D', NULL),
(297, 148, 1, '145.00', 'C', NULL),
(298, 148, 59, '145.00', 'D', NULL),
(300, 149, 7, '145.00', 'D', NULL),
(301, 150, 59, '500.00', 'C', NULL),
(302, 150, 7, '500.00', 'D', NULL),
(303, 151, 1, '500.00', 'C', NULL),
(304, 151, 59, '500.00', 'D', NULL),
(306, 152, 7, '500.00', 'D', NULL),
(307, 153, 1, '2000.00', 'C', NULL),
(308, 153, 38, '2000.00', 'D', NULL),
(309, 154, 17, '1000.00', 'C', NULL),
(310, 154, 1, '1000.00', 'D', NULL),
(311, 155, 17, '1000.00', 'C', NULL),
(312, 155, 1, '1000.00', 'D', NULL),
(313, 156, 17, '500.00', 'C', NULL),
(314, 156, 6, '500.00', 'D', NULL),
(315, 157, 59, '1212.00', 'C', NULL),
(316, 157, 7, '1212.00', 'D', NULL),
(317, 158, 1, '1212.00', 'C', NULL),
(318, 158, 59, '1212.00', 'D', NULL),
(320, 159, 7, '1212.00', 'D', NULL),
(321, 160, 1, '4242.00', 'C', NULL),
(322, 160, 58, '4242.00', 'D', NULL),
(323, 161, 28, '111.00', 'C', NULL),
(324, 161, 1, '111.00', 'D', NULL),
(325, 162, 28, '222.00', 'C', NULL),
(326, 162, 1, '222.00', 'D', NULL),
(327, 163, 28, '1212.00', 'C', NULL),
(328, 163, 6, '1212.00', 'D', NULL),
(329, 164, 59, '21.00', 'C', NULL),
(330, 164, 7, '21.00', 'D', NULL),
(331, 165, 1, '21.00', 'C', NULL),
(332, 165, 59, '21.00', 'D', NULL),
(334, 166, 7, '21.00', 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `entrytypes`
--

CREATE TABLE `entrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entrytypes`
--

INSERT INTO `entrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fc_details`
--

CREATE TABLE `fc_details` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `vnum` varchar(50) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `type_work` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `rto_details` varchar(50) NOT NULL,
  `rto_fees` decimal(10,0) NOT NULL,
  `mis_charge` decimal(10,0) NOT NULL,
  `fc_date` date NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance_details`
--

CREATE TABLE `finance_details` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `v_num` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `finance_amount` decimal(10,0) NOT NULL,
  `finance_tenure` varchar(50) NOT NULL,
  `finance_emi` decimal(10,0) NOT NULL,
  `dop` date NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `paying_amount` decimal(10,0) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `amount_collector` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `mod_pay` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `finance_master`
--

CREATE TABLE `finance_master` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `company_id` varchar(20) NOT NULL,
  `MobNum` varchar(30) NOT NULL,
  `PhNum` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `freights`
--

CREATE TABLE `freights` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tripid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gcentry_id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loading_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unloading_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_bill_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_freight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_cash_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adv_cash_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `advance_cheque_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adv_cque_date` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frieghtdetails`
--

CREATE TABLE `frieghtdetails` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `ent_date` date NOT NULL,
  `tripid` varchar(100) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `loading_charge` varchar(50) NOT NULL,
  `unloading_charge` varchar(50) NOT NULL,
  `weight_bill_charge` varchar(50) NOT NULL,
  `others_amount` varchar(50) NOT NULL,
  `others_description` varchar(150) NOT NULL,
  `halt_days` varchar(50) NOT NULL,
  `halt_rate` varchar(50) NOT NULL,
  `halt_amount` varchar(50) NOT NULL,
  `total_freight` varchar(50) NOT NULL,
  `advance_cash_amount` varchar(50) NOT NULL,
  `adv_cash_date` varchar(100) NOT NULL,
  `advance_cheque_amount` varchar(50) NOT NULL,
  `adv_cque_date` varchar(100) NOT NULL,
  `bank` varchar(150) NOT NULL,
  `cheque_no` varchar(150) NOT NULL,
  `balance` varchar(50) NOT NULL,
  `diedte` varchar(150) NOT NULL,
  `dievendor` varchar(150) NOT NULL,
  `diepaytype` varchar(150) NOT NULL,
  `dieqty` varchar(50) NOT NULL,
  `dieppl` varchar(50) NOT NULL,
  `dieamt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frieghtdetails`
--

INSERT INTO `frieghtdetails` (`id`, `intAdminId`, `ent_date`, `tripid`, `amount`, `loading_charge`, `unloading_charge`, `weight_bill_charge`, `others_amount`, `others_description`, `halt_days`, `halt_rate`, `halt_amount`, `total_freight`, `advance_cash_amount`, `adv_cash_date`, `advance_cheque_amount`, `adv_cque_date`, `bank`, `cheque_no`, `balance`, `diedte`, `dievendor`, `diepaytype`, `dieqty`, `dieppl`, `dieamt`) VALUES
(1, 1, '2018-06-07', '1', '23000', '', '', '', '', '', '', '', '', '23000', '', '07/06/2018', 'Cash', '', '1', '', '23000', '', '', '', '', '', ''),
(2, 1, '2018-04-01', '2', '16400', '', '800', '', '', '', '', '', '', '17200', '', '01/04/2018', 'Cash', '', '1', '', '17200', '', '', '', '', '', ''),
(3, 1, '2018-04-01', '3', '33000', '', '', '', '', '', '', '', '', '33000', '', '01/04/2018', 'Cash', '', '1', '', '33000', '', '', '', '', '', ''),
(4, 1, '2018-04-01', '4', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(5, 1, '2018-04-01', '5', '33000', '', '', '', '', '', '', '', '', '33000', '', '01/04/2018', 'Cash', '', '1', '', '33000', '', '', '', '', '', ''),
(6, 1, '2018-04-01', '6', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '', '', '8000', '', '', '', '', '', ''),
(7, 1, '2018-04-01', '7', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(8, 1, '2018-04-01', '8', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(9, 1, '2018-04-01', '9', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(10, 1, '2018-04-01', '10', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(11, 1, '2018-04-01', '11', '16400', '', '800', '', '', '', '', '', '', '17200', '', '01/04/2018', 'Cash', '', '1', '', '17200', '', '', '', '', '', ''),
(12, 1, '2018-04-01', '12', '13000', '', '', '', '', '', '', '', '', '13000', '', '01/04/2018', 'Cash', '', '1', '', '13000', '', '', '', '', '', ''),
(13, 1, '2018-04-01', '13', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(14, 1, '2018-04-01', '14', '8000', '', '', '', '', '', '', '', '', '8000', '', '01/04/2018', 'Cash', '', '1', '', '8000', '', '', '', '', '', ''),
(15, 1, '2018-04-02', '15', '25000', '', '', '', '', '', '', '', '', '25000', '', '02/04/2018', 'Cash', '', '1', '', '25000', '', '', '', '', '', ''),
(16, 1, '2018-06-08', '16', '5000', '', '', '', '', '', '', '', '', '5000', '4000', '08/06/2018', 'Cash', '', '1', '', '1000', '', '', '', '', '', ''),
(17, 1, '2018-06-08', '17', '7000', '', '', '', '', '', '', '', '', '7000', '5000', '08/06/2018', 'Cash', '', '1', '', '2000', '', '', '', '', '', ''),
(18, 1, '2018-06-08', '18', '50000', '', '', '', '', '', '', '', '', '50000', '1000', '08/06/2018', 'Cash', '', '1', '', '49000', '', '', '', '', '', ''),
(19, 1, '2018-06-08', '19', '70000', '', '', '', '', '', '', '', '', '70000', '4500', '08/06/2018', 'Cash', '', '1', '', '65500', '', '', '', '', '', ''),
(20, 1, '2018-06-08', '19', '70000', '', '', '', '', '', '', '', '', '70000', '4500', '08/06/2018', 'Cash', '', '1', '', '65500', '', '', '', '', '', ''),
(21, 1, '2018-06-08', '19', '70000', '', '', '', '', '', '', '', '', '70000', '4500', '08/06/2018', 'Cash', '', '1', '', '65500', '', '', '', '', '', ''),
(22, 1, '2018-06-08', '20', '5000', '', '', '', '', '', '', '', '', '5000', '100', '08/06/2018', 'Cash', '', '1', '', '4900', '', '', '', '', '', ''),
(23, 1, '2018-06-08', '21', '6000', '', '', '', '', '', '', '', '', '6000', '700', '08/06/2018', 'Cash', '', '1', '', '5300', '', '', '', '', '', ''),
(24, 1, '2018-06-08', '22', '70000', '', '', '', '', '', '', '', '', '70000', '1000', '08/06/2018', 'Cash', '', '1', '', '69000', '', '', '', '', '', ''),
(25, 1, '2018-06-18', '23', '70000', '800', '800', '', '', '', '', '', '', '71600', '5000', '18/06/2018', 'Cash', '', '1', '', '66600', '', '', '', '', '', ''),
(26, 1, '2018-07-17', '24', '50000', '1000', '500', '', '', '', '', '', '', '51500', '10000', '17/07/2018', 'Cash', '', '72', '', '41500', '', '', '', '', '', ''),
(27, 1, '2018-07-21', '25', '', '', '', '', '', '', '', '', '', '', '', '21/07/2018', 'Cash', '', '', '', '', '', '', '', '', '', ''),
(28, 1, '2018-07-21', '25', '', '', '', '', '', '', '', '', '', '', '', '21/07/2018', 'Cash', '', '', '', '', '', '', '', '', '', ''),
(29, 1, '2018-08-04', '26', '50000', '2000', '1000', '', '', '', '', '', '0', '53000', '40000', '04/08/2018', 'Cash', '', '1', '', '13000', '', '', '', '', '', ''),
(30, 1, '2018-08-04', '27', '20000', '1500', '1000', '', '', '', '', '', '', '22500', '', '04/08/2018', 'Cash', '', '1', '', '22500', '', '', '', '', '', ''),
(31, 1, '2018-08-13', '28', '999', '888', '9', '', '', '', '', '', '', '1896', '500', '13/08/2018', 'Cash', '', '1', 'oijuihiuy', '1396', '', '', '', '', '', ''),
(32, 1, '2018-08-13', '29', '25000', '1000', '1000', '', '', '', '', '', '', '27000', '', '13/08/2018', 'Cash', '', '', '', '27000', '', '', '', '', '', ''),
(33, 1, '2018-08-14', '30', '', '', '', '', '', '', '', '', '', '', '', '14/08/2018', 'Cash', '', '', '', '', '', '', '', '', '', ''),
(34, 1, '2018-08-14', '31', '500000', '', '', '', '', '', '', '', '', '500000', '100000', '14/08/2018', 'Cash', '', '1', '', '400000', '', '', '', '', '', ''),
(35, 1, '2018-08-16', '32', '8000', '100', '100', '', '', '', '', '', '', '8200', '2000', '16/08/2018', 'Cash', '', '1', '', '6200', '', '', '', '', '', ''),
(36, 1, '2018-08-22', '33', '9876', '5623', '121', '', '', '', '', '', '0', '15620', '4242', '22/08/2018', 'Cash', '', '1', '', '11378', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fuel`
--

CREATE TABLE `fuel` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `tripid` varchar(150) NOT NULL,
  `ent_date` date NOT NULL,
  `vechno` varchar(100) NOT NULL,
  `driver` varchar(150) NOT NULL,
  `vendor` varchar(150) NOT NULL,
  `place` varchar(150) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `ppl` decimal(10,0) NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  `paytype` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fuel`
--

INSERT INTO `fuel` (`id`, `intAdminId`, `tripid`, `ent_date`, `vechno`, `driver`, `vendor`, `place`, `qty`, `ppl`, `cost`, `paytype`) VALUES
(5, 1, '1', '2018-06-07', 'TN21AY3063', '7', 'Bagavathi Priya Energy Management Services', 'Kolathur', '124', '68', '8414', 'Credit'),
(6, 1, '2', '2018-04-01', 'TN19U0054', '55', 'Bagavathi Priya Energy Management Services', 'Kolathur', '208', '68', '14161', 'Credit'),
(7, 1, 'Home Halt', '2018-04-01', 'TN19U0299', '26', 'Bagavathi Priya Energy Management Services', 'Kolathur', '145', '68', '9854', 'Credit'),
(8, 1, '3', '2018-04-01', 'TN19U3956', '60', 'Bagavathi Priya Energy Management Services', 'Kolathur', '222', '68', '15114', 'Credit'),
(9, 1, '5', '2018-04-01', 'TN19U4101', '62', 'Bagavathi Priya Energy Management Services', 'Kolathur', '207', '68', '14093', 'Credit'),
(10, 1, '7', '2018-04-01', 'TN04AS2155', '49', 'Bagavathi Priya Energy Management Services', 'Kolathur', '250', '68', '17020', 'Credit'),
(11, 1, '11', '2018-04-01', 'TN04AS3013', '14', 'Bagavathi Priya Energy Management Services', 'Kolathur', '172', '68', '11711', 'Credit'),
(12, 1, 'Home Halt', '2018-04-02', 'TN21L9196', '13', 'Bagavathi Priya Energy Management Services', 'Kolathur', '202', '68', '13774', 'Credit'),
(13, 1, 'Home Halt', '2018-04-01', 'TN21AY3063', '2', 'Bagavathi Priya Energy Management Services', 'trichy', '2', '300', '600', 'Driver Cash'),
(14, 1, 'Home Halt', '2018-04-01', 'TN21L9196', '24', 'Bagavathi Priya Energy Management Services', 'madhurai', '3', '222', '666', 'Driver Cash'),
(15, 1, '23', '2018-06-11', 'TN21AY3063', '7', 'Bagavathi Priya Energy Management Services', 'chennai', '15', '300', '4500', 'Cash'),
(16, 1, '23', '2018-06-18', 'TN04AS2218', '14', 'Bagavathi Priya Energy Management Services', '', '500', '12', '6000', 'Credit'),
(17, 1, '23', '2018-06-18', 'TN04AS2218', '14', 'Bagavathi Priya Energy Management Services', '', '50', '60', '3000', 'Driver Cash'),
(18, 1, '27', '2018-04-08', 'TN04AS3452', '5', 'Bagavathi Priya Energy Management Services', 'Maduravoyal', '50', '40', '2000', 'Cheque'),
(21, 1, '28', '0000-00-00', 'TN19U0181', '4', 'Bagavathi Priya Energy Management Services', 'chennai', '50', '2', '100', 'Cash'),
(22, 1, 'Home Halt', '2018-08-13', 'TN19U0181', '4', 'Bagavathi Priya Energy Management Services', 'ccc', '8', '100', '800', 'Cash'),
(23, 1, '29', '2018-08-13', 'TN21L9196', '1', 'Bagavathi Priya Energy Management Services', 'Chennai', '100', '72', '7200', 'Credit'),
(24, 1, '25', '2018-08-12', 'TN19U0372', '13', 'Bagavathi Priya Energy Management Services', 'Chennai', '100', '72', '7200', 'Credit'),
(25, 1, '31', '2018-08-14', 'TN21AY3063', '8', 'Bagavathi Priya Energy Management Services', '', '500', '0', '145', 'Cash'),
(26, 1, '32', '2018-08-16', 'TN04AS2218', '14', 'Bagavathi Priya Energy Management Services', 'chennai', '5', '100', '500', 'Cash'),
(27, 1, '33', '2018-08-22', 'TN04AS3114', '62', 'Bagavathi Priya Energy Management Services', 'BAgavathy Place', '222', '5', '1212', 'Cash'),
(28, 1, '34', '2018-08-28', 'TN19Z8350', '', 'Bagavathi Priya Energy Management Services', '45', '45', '0', '21', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `gcentries`
--

CREATE TABLE `gcentries` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drivername` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cdrivername` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `madvance` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diesel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechNo` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workshop` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mfrom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mto` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaddte` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transporter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehicle_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `driver` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ass_gc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consigner_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consignee_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_articles` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goods_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `party_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gc_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reference_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cotainer_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cotainer_size` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `load_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seal_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direction` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gc_details`
--

CREATE TABLE `gc_details` (
  `id` int(20) NOT NULL,
  `intAdminId` int(10) NOT NULL,
  `ent_date` date NOT NULL,
  `gcno` varchar(20) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `consignor_name` varchar(100) NOT NULL,
  `consignee_name` varchar(100) NOT NULL,
  `articles` int(50) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gc_details`
--

INSERT INTO `gc_details` (`id`, `intAdminId`, `ent_date`, `gcno`, `tripid`, `consignor_name`, `consignee_name`, `articles`, `value`, `description`) VALUES
(1, 0, '2018-06-11', '', '', '', '', 0, '0', ''),
(2, 1, '2018-06-11', 'HRP', '23', 'Adichiamman Transports', 'Alwin Cargo Pvt. Ltd.', 15, '1000', 'Test'),
(4, 0, '2018-07-21', '', '', '', '', 0, '0', ''),
(6, 0, '2018-07-23', '', '', '', '', 0, '0', ''),
(7, 1, '2018-08-04', '26', '27', 'Cargo Container Carrier', 'Kingfisher Logistics', 5, '78000', ''),
(8, 0, '2018-08-24', '', '', '', '', 0, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 6, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1),
(17, 6, 'Sundry Debtors', NULL, 1),
(18, 9, 'Sundry Creditors', NULL, 1),
(19, 9, 'ASSR', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_name`
--

CREATE TABLE `group_name` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_name`
--

INSERT INTO `group_name` (`id`, `intAdminId`, `name`, `type`) VALUES
(1, 1, 'Debtors', ''),
(2, 1, 'Creditors', ''),
(3, 1, 'Sundry Debt', 'Cr'),
(4, 1, 'Banks', 'Cr'),
(5, 1, 'Bill', 'Dr'),
(6, 1, 'Loading Mamul', 'Cr'),
(7, 1, 'Intrest', 'Cr');

-- --------------------------------------------------------

--
-- Table structure for table `halt_entry`
--

CREATE TABLE `halt_entry` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ent_date` date NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `vechnum` varchar(50) NOT NULL,
  `cost` float(50,2) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `adv_place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hhalt_entry`
--

CREATE TABLE `hhalt_entry` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `vechno` varchar(30) NOT NULL,
  `mkm_advance` decimal(11,0) NOT NULL,
  `chn_adv` decimal(11,0) NOT NULL,
  `driver` varchar(20) NOT NULL,
  `ent_date` date NOT NULL,
  `place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hhalt_entry`
--

INSERT INTO `hhalt_entry` (`id`, `intAdminId`, `vechno`, `mkm_advance`, `chn_adv`, `driver`, `ent_date`, `place`) VALUES
(1, 1, 'TN21AY3063', '8000', '7000', '16', '2018-04-01', 'Chennai');

-- --------------------------------------------------------

--
-- Table structure for table `hiredetails`
--

CREATE TABLE `hiredetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gcentry_id` int(10) UNSIGNED NOT NULL,
  `billdetails` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billdate` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commision` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loading_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unloading_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight_bill_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_days` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `halt_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hire` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chn_advance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mkm_adv` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mkm_bank` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mkm_cque_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cash_advance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_diesel_advance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_diesel_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_balance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hire_freight`
--

CREATE TABLE `hire_freight` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `hire_id` int(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `loading_charge` decimal(10,0) NOT NULL,
  `unloading_charge` decimal(10,0) NOT NULL,
  `weight_bill_charge` decimal(10,0) NOT NULL,
  `others_amount` decimal(10,0) NOT NULL,
  `others_description` varchar(100) NOT NULL,
  `halt_days` int(20) NOT NULL,
  `halt_rate` decimal(10,0) NOT NULL,
  `halt_amount` decimal(10,0) NOT NULL,
  `total_freight` decimal(10,0) NOT NULL,
  `advance_cash_amount` decimal(10,0) NOT NULL,
  `adv_cash_date` varchar(50) NOT NULL,
  `advance_cheque_amount` decimal(10,0) NOT NULL,
  `adv_cque_date` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_freight`
--

INSERT INTO `hire_freight` (`id`, `intAdminId`, `hire_id`, `amount`, `loading_charge`, `unloading_charge`, `weight_bill_charge`, `others_amount`, `others_description`, `halt_days`, `halt_rate`, `halt_amount`, `total_freight`, `advance_cash_amount`, `adv_cash_date`, `advance_cheque_amount`, `adv_cque_date`, `bank`, `cheque_no`, `balance`) VALUES
(1, 1, 1, '0', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '08/06/2018', '0', '08/06/2018', '', '', '0'),
(2, 1, 2, '0', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '08/06/2018', '0', '08/06/2018', '', '', '0'),
(3, 1, 3, '0', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '13/08/2018', '0', '13/08/2018', '', '', '0'),
(4, 1, 4, '0', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '13/08/2018', '0', '13/08/2018', '', '', '0'),
(5, 1, 5, '27000', '1000', '1000', '0', '500', 'Toll Bill Charges', 0, '0', '0', '29650', '0', '13/08/2018', '0', '13/08/2018', '', '', '29650'),
(6, 1, 6, '0', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '22/08/2018', '0', '22/08/2018', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hire_hire`
--

CREATE TABLE `hire_hire` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `hire_id` int(20) NOT NULL,
  `hire_amount` decimal(10,0) NOT NULL,
  `loading_charge` decimal(10,0) NOT NULL,
  `unloading_charge` decimal(10,0) NOT NULL,
  `weight_bill_charge` decimal(10,0) NOT NULL,
  `other_description` varchar(100) NOT NULL,
  `other_amount` decimal(10,0) NOT NULL,
  `halt_days` int(20) NOT NULL,
  `halt_rate` decimal(10,0) NOT NULL,
  `halt_amount` decimal(10,0) NOT NULL,
  `total_hire` decimal(10,0) NOT NULL,
  `chn_advance` decimal(10,0) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `mkm_adv` decimal(10,0) NOT NULL,
  `mkm_bank` varchar(50) NOT NULL,
  `mkm_cque_no` varchar(50) NOT NULL,
  `total_cash_advance` decimal(10,0) NOT NULL,
  `total_diesel_advance` decimal(10,0) NOT NULL,
  `total_diesel_quantity` decimal(10,0) NOT NULL,
  `hire_balance` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_hire`
--

INSERT INTO `hire_hire` (`id`, `intAdminId`, `hire_id`, `hire_amount`, `loading_charge`, `unloading_charge`, `weight_bill_charge`, `other_description`, `other_amount`, `halt_days`, `halt_rate`, `halt_amount`, `total_hire`, `chn_advance`, `bank`, `cheque_no`, `mkm_adv`, `mkm_bank`, `mkm_cque_no`, `total_cash_advance`, `total_diesel_advance`, `total_diesel_quantity`, `hire_balance`) VALUES
(1, 1, 1, '0', '0', '0', '0', '', '0', 0, '0', '0', '0', '0', '', '', '0', '', '', '0', '0', '0', '0'),
(2, 1, 2, '0', '0', '0', '0', '', '0', 0, '0', '0', '0', '0', '', '', '0', '', '', '0', '0', '0', '0'),
(3, 1, 3, '0', '0', '0', '0', '', '0', 0, '0', '0', '0', '0', '', '', '0', '', '', '0', '0', '0', '0'),
(4, 1, 4, '0', '0', '0', '0', '', '0', 0, '0', '0', '0', '0', '', '', '0', '', '', '0', '0', '0', '0'),
(5, 1, 5, '25000', '1000', '1000', '150', '', '500', 0, '0', '0', '27650', '20000', '', '', '0', '', '', '20000', '0', '0', '7650'),
(6, 1, 6, '0', '0', '0', '0', '', '0', 0, '0', '0', '0', '0', '', '', '0', '', '', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `hire_load`
--

CREATE TABLE `hire_load` (
  `id` int(20) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `ent_date` date NOT NULL,
  `from_place` varchar(100) NOT NULL,
  `vechno` varchar(50) NOT NULL,
  `to_place` varchar(100) NOT NULL,
  `transporter` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `party_gc` varchar(50) NOT NULL,
  `ref_no` varchar(50) NOT NULL,
  `cont_no` varchar(50) NOT NULL,
  `contsize` varchar(50) NOT NULL,
  `cont_wt` varchar(50) NOT NULL,
  `load_type` varchar(50) NOT NULL,
  `sealno` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire_load`
--

INSERT INTO `hire_load` (`id`, `intAdminId`, `ent_date`, `from_place`, `vechno`, `to_place`, `transporter`, `driver`, `party_name`, `party_gc`, `ref_no`, `cont_no`, `contsize`, `cont_wt`, `load_type`, `sealno`, `remarks`) VALUES
(1, 1, '2018-06-08', 'Cachar', '', 'Sabarkantha', '', '', '', '', '', '', '20', '', '', '', ''),
(2, 1, '2018-06-08', 'Sabarkantha', '', 'Agar', '', '', '', '', '', '', '20', '', '', '', ''),
(3, 1, '2018-08-13', '', '', '', '', '', '', '', '', '', '20', '', '', '', ''),
(4, 1, '2018-08-13', 'Chennai', '', 'Coimbatore', 'Sri Kaliamman Trailer Service', '', '', '', '', '', '20', '', '', '', ''),
(5, 1, '2018-08-13', 'Chennai', 'TN04AZ2569', 'Coimbatore', 'Sri Kaliamman Trailer Service', '', 'Lakshmi Cargo Company Ltd.', '21568', '12534', 'PONU2548954', '20', '22.200`', 'Import', '', ''),
(6, 1, '2018-08-22', '', '', '', '', '', '', '', '', '', '20', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_details`
--

CREATE TABLE `insurance_details` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `vnum` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `top` varchar(50) NOT NULL,
  `from_duration` date NOT NULL,
  `to_duration` date NOT NULL,
  `policy_no` varchar(50) NOT NULL,
  `rto_location` varchar(50) NOT NULL,
  `insured_value` decimal(10,0) NOT NULL,
  `premium_value` decimal(10,0) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `insurance_details`
--

INSERT INTO `insurance_details` (`id`, `intAdminId`, `name`, `vnum`, `address`, `top`, `from_duration`, `to_duration`, `policy_no`, `rto_location`, `insured_value`, `premium_value`, `status`) VALUES
(1, 18, '', '', '', '', '0000-00-00', '0000-00-00', '', '', '0', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `insurance_master`
--

CREATE TABLE `insurance_master` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `company_id` varchar(50) NOT NULL,
  `MobNum` varchar(50) NOT NULL,
  `PhNum` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `journal_entries`
--

CREATE TABLE `journal_entries` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `cust_id` varchar(30) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `ent_date` date NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `vouch_id` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `voucher_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledger`
--

CREATE TABLE `ledger` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `opening_bal` decimal(10,0) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `under` varchar(50) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `ent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger`
--

INSERT INTO `ledger` (`id`, `intAdminId`, `name`, `opening_bal`, `group_name`, `type`, `under`, `nature`, `ent_date`) VALUES
(1, 1, 'ASS Roadways', '3458059', 'Creditors', '', 'Logistics', 'Transporter', '2018-04-26'),
(2, 1, 'ASS Roadways - Suresh', '3385341', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-01'),
(3, 1, 'ASS Roadways - Banu', '1652124', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-07'),
(4, 1, 'ASS Roadways - Uma', '1239093', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-07'),
(5, 1, 'ASS Roadways - Renuka', '331938', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-07'),
(6, 1, 'ASSL Trans', '1239093', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-07'),
(7, 1, 'ASS Roadways - Magesh', '0', 'Creditors', '', 'Logistics', 'Transporter', '2018-05-01'),
(9, 18, 'Akbar Ali', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(10, 18, 'Ananadan V', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(11, 18, 'Arunachalam V', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(12, 18, 'Ashok Varman T', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(13, 18, 'Babu M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(14, 18, 'Baskar R', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(15, 18, 'C Kanniyappan', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(16, 18, 'C Panneerselvam', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(17, 18, 'Dhatchanamoorthi M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(18, 18, 'Doss S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(19, 18, 'Durairaj B', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(20, 18, 'Elumalai A', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(21, 18, 'Ganapathi S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(22, 18, 'H Masthan', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(23, 18, 'Karthikeyan M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(24, 18, 'Kathirvel K', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(25, 18, 'Kumar G', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(26, 18, 'Loganathan N', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(27, 18, 'M Ashraf Ali', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(28, 18, 'Manikandan K', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(29, 18, 'Mayakrishnan S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(30, 18, 'Muruganadham M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(31, 18, 'Natarajan M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(32, 18, 'Pandiyan R', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(33, 18, 'Panneer S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(34, 18, 'Prabakaran R', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(35, 18, 'Prabu G', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(36, 18, 'Purusothaman S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(37, 18, 'Ragothaman K', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(38, 18, 'Raj N', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(39, 18, 'Rajendiran E', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(40, 18, 'Rajeshkannan M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(41, 18, 'Rajganesh T', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(42, 18, 'Ramasamy C', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(43, 18, 'Ramesh D', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(44, 18, 'Rose S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-14'),
(45, 18, 'Samsukani S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(46, 18, 'Santhoshkumar S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(47, 18, 'Selladurai M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(48, 18, 'Sevakumar K', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(49, 18, 'Senthil M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(50, 18, 'Shahul Hameed H', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(51, 18, 'Sankar A', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(52, 18, 'Sivasankar M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(53, 18, 'Suresh N', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(54, 18, 'Suresh T', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(55, 18, 'V Arulkumar', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(56, 18, 'Vadivel G', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(57, 18, 'Vasu S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(58, 18, 'Velraj M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(59, 18, 'Vignesh S', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(60, 18, 'Vijayan E', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(61, 18, 'Vijayan M', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(62, 18, 'Senthil K', '0', 'Debtors', 'Cr', 'TRANSP6825', 'Driver', '2018-05-15'),
(63, 1, 'Adichiamman Transports', '46431', 'Debtors', '', 'Logistics', 'Customer', '0000-00-00'),
(64, 1, 'Alwin Cargo Pvt. Ltd.', '606561', 'Debtors', '', 'Logistics', 'Customer', '0000-00-00'),
(65, 1, 'Arsha Logistics', '448500', 'Debtors', '', 'Logistics', 'Customer', '0000-00-00'),
(66, 1, 'Cargo Container Carrier', '10000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(67, 1, 'Ensen Shippings', '4586074', 'Debtors', 'Cr', 'Logistics', 'Customer', '0000-00-00'),
(68, 1, 'F5 Carrier', '37000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(69, 1, 'Fynsea Lines and Logistics Pvt. Ltd.', '273000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(70, 1, 'Gee Krishna Transport', '95515', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(71, 1, 'G.K Logistics', '3000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(72, 1, 'Gokul Transport', '45000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(73, 1, 'Hari Om Transports', '16230', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(74, 1, 'Help Cargo Carriers', '14900', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(75, 1, 'Insha Transport', '78500', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(76, 1, 'Karthi Transport', '6000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(77, 1, 'Kingfisher Logistics', '27788', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(78, 1, 'KPS and Co', '1501300', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(79, 1, 'KRD Transports', '1123650', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(80, 1, 'Kumaar Transport', '573646', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(81, 1, 'Lakshmi Cargo Company Ltd.', '732129', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(82, 1, 'Logsol Pvt. Ltd.', '822400', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(83, 1, 'Metro Logistics', '328000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(84, 1, 'Murugan Transports', '317775', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(85, 1, 'Namakkal South India Transports', '113000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(86, 1, 'Nikhil Logistics', '41848', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(87, 1, 'Oceanus Transports', '51000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(88, 1, 'PSTS Heavy Lift and ShiftLtd.', '411760', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(89, 1, 'Raja Transports', '76000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(90, 1, 'Royal Logistics', '140720', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(91, 1, 'RSG Movers Pvt. Ltd.', '275400', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(92, 1, 'R S Transport', '28000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(93, 1, 'RSU Transport', '311000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(94, 1, 'Shreyas Relay Systems', '5484620', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(95, 1, 'Sri Angalaparameshwari Transport', '17000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(96, 1, 'Sri Murugan Logistics', '188725', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(97, 1, 'Sri Sai Logistics', '61500', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(98, 1, 'SRS Cargo Logistics India Ltd.,', '214350', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(99, 1, 'SST Karthick Trans', '36000', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(100, 1, 'Swamy Saranam Transport', '390565', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(101, 1, 'Venus Roadlines', '73500', 'Debtors', 'Dr', 'Logistics', 'Customer', '0000-00-00'),
(102, 1, 'Bagavathi Priya Energy Management Services', '1996918', 'Creditors', 'Cr', 'Logistics', 'Diesel Station', '0000-00-00'),
(107, 18, 'Gunasekaran', '0', 'Creditors', '', 'TRANSP6825', 'Driver', '2018-06-03'),
(108, 1, 'Axis Bank Ltd', '25000', 'Creditors', 'Cr', '11', 'Transporter', '2018-06-11'),
(109, 1, 'fgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfg', '0', '5', '12', 'Logistics', 'Transporter', '2018-07-23'),
(110, 1, 'Translen', '777777', '5', 'LG1234', 'Logistics', 'Transporter', '2018-07-25'),
(111, 1, 'ICICI Bank', '1000', 'Banks', 'Cr', '12', 'Driver', '2018-07-27'),
(112, 1, 'asdasfasfsaf', '235', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(113, 1, 'aDSADSD', '325', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(114, 1, 'dshvdsj', '453', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(115, 1, 'xas', '23456', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(116, 1, 'sindhu', '21412', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(117, 1, 'aaa', '125', '5', '', 'Logistics', 'Transporter', '2018-08-02'),
(118, 1, 'mani', '325', '12', '5474', 'Logistics', 'Transporter', '2018-08-02'),
(119, 1, 'Martin Transport', '0', '6', '235235', 'Logistics', 'Transporter', '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `ledgers`
--

CREATE TABLE `ledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ledgers`
--

INSERT INTO `ledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 6, 'Cash', NULL, '88105.00', 'D', 1, 0, ''),
(6, 9, 'Bills Payable', NULL, '0.00', 'C', 0, 0, ''),
(7, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 1, ''),
(12, 17, 'Adichiamman Transports', NULL, '46431.00', 'D', 0, 0, ''),
(13, 17, 'Alwin Cargo Pvt. Ltd.', NULL, '606561.00', 'D', 0, 0, ''),
(14, 17, 'Arsha Logistics', NULL, '448500.00', 'D', 0, 0, ''),
(15, 17, 'Cargo Container Carrier', NULL, '10000.00', 'D', 0, 0, ''),
(16, 17, 'Ensen Shippings', NULL, '4586074.00', 'D', 0, 0, ''),
(17, 18, 'ASS Roadways', NULL, '3458059.00', 'C', 0, 0, ''),
(18, 17, 'F5 Carrier', NULL, '37000.00', 'D', 0, 0, ''),
(19, 17, 'Fynsea Lines and Logistics Pvt. Ltd.', NULL, '273000.00', 'D', 0, 0, ''),
(20, 18, 'ASS Roadways - Suresh', NULL, '3385341.00', 'C', 0, 0, ''),
(21, 17, 'Gee Krishna Transport', NULL, '95515.00', 'D', 0, 0, ''),
(22, 17, 'G.K Logistics', NULL, '3000.00', 'D', 0, 0, ''),
(23, 18, 'ASS Roadways - Banu', NULL, '1652124.00', 'C', 0, 0, ''),
(24, 17, 'Gokul Transport', NULL, '45000.00', 'D', 0, 0, ''),
(25, 18, 'ASS Roadways - Uma', NULL, '1239093.00', 'C', 0, 0, ''),
(26, 17, 'Hari Om Transports', NULL, '16230.00', 'D', 0, 0, ''),
(27, 18, 'ASS Roadways - Renuka', NULL, '331938.00', 'C', 0, 0, ''),
(28, 18, 'ASSL Trans', NULL, '1239093.00', 'C', 0, 0, ''),
(29, 17, 'Help Cargo Carriers', NULL, '14900.00', 'D', 0, 0, ''),
(30, 18, 'ASS Roadways - Magesh', NULL, '0.00', 'C', 0, 0, ''),
(31, 17, 'Insha Transport', NULL, '78500.00', 'D', 0, 0, ''),
(32, 17, 'Karthi Transport', NULL, '6000.00', 'D', 0, 0, ''),
(33, 17, 'Kingfisher Logistics', NULL, '27788.00', 'D', 0, 0, ''),
(34, 17, 'KPS and Co', NULL, '1501300.00', 'D', 0, 0, ''),
(35, 17, 'KRD Transports', NULL, '1123650.00', 'D', 0, 0, ''),
(36, 18, 'New Barath Logistics', NULL, '0.00', 'D', 0, 0, ''),
(37, 17, 'Kumaar Transport', NULL, '573646.00', 'D', 0, 0, ''),
(38, 17, 'Lakshmi Cargo Company Ltd.', NULL, '732129.00', 'D', 0, 0, ''),
(39, 17, 'Logsol Pvt. Ltd.', NULL, '822400.00', 'D', 0, 0, ''),
(40, 17, 'Metro Logistics', NULL, '328000.00', 'D', 0, 0, ''),
(41, 17, 'Murugan Transports', NULL, '317775.00', 'D', 0, 0, ''),
(42, 17, 'Namakkal South India Transports', NULL, '113000.00', 'D', 0, 0, ''),
(43, 17, 'Nikhil Logistics', NULL, '41848.00', 'D', 0, 0, ''),
(44, 17, 'Oceanus Transports', NULL, '51000.00', 'D', 0, 0, ''),
(45, 17, 'PSTS Heavy Lift and ShiftLtd.', NULL, '411760.00', 'D', 0, 0, ''),
(46, 17, 'Raja Transports', NULL, '76000.00', 'D', 0, 0, ''),
(47, 17, 'Royal Logistics', NULL, '140720.00', 'D', 0, 0, ''),
(48, 17, 'RSG Movers Pvt. Ltd.', NULL, '275400.00', 'D', 0, 0, ''),
(49, 17, 'R S Transport', NULL, '28000.00', 'D', 0, 0, ''),
(50, 17, 'RSU Transport', NULL, '311000.00', 'D', 0, 0, ''),
(51, 17, 'Shreyas Relay Systems', NULL, '5484620.00', 'D', 0, 0, ''),
(52, 17, 'Sri Angalaparameshwari Transport', NULL, '17000.00', 'D', 0, 0, ''),
(53, 17, 'Sri Murugan Logistics', NULL, '188725.00', 'D', 0, 0, ''),
(54, 17, 'Sri Sai Logistics', NULL, '61500.00', 'D', 0, 0, ''),
(55, 17, 'SRS Cargo Logistics India Ltd.,', NULL, '214350.00', 'D', 0, 0, ''),
(56, 17, 'SST Karthick Trans', NULL, '36000.00', 'D', 0, 0, ''),
(57, 17, 'Swamy Saranam Transport', NULL, '390565.00', 'D', 0, 0, ''),
(58, 17, 'Venus Roadlines', NULL, '73500.00', 'D', 0, 0, ''),
(59, 10, 'Bagavathi Priya Energy Management Services', NULL, '1996918.00', 'C', 0, 0, ''),
(61, 8, 'Suresh Kumar', NULL, '784620.50', 'C', 0, 0, ''),
(62, 10, 'Ajith Hand Loan A/c', NULL, '450000.00', 'C', 0, 0, ''),
(63, 10, 'Ramesh Loan', NULL, '390000.00', 'C', 0, 0, ''),
(64, 10, 'SFL Diesel Account Ashok', NULL, '1078115.00', 'C', 0, 0, ''),
(65, 10, 'Shriram Hand Loan - Padalam', NULL, '800000.00', 'C', 0, 0, ''),
(66, 10, 'Shriram Hand Loan - Sothupakkam', NULL, '900000.00', 'C', 0, 0, ''),
(67, 10, 'Thirunavukkarasu Kotak Card', NULL, '150000.00', 'C', 0, 0, ''),
(68, 10, 'Thirunavukkarasu SCB Card', NULL, '150000.00', 'C', 0, 0, ''),
(70, 3, 'Income', NULL, '0.00', 'D', 0, 0, ''),
(71, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, ''),
(72, 6, 'MKM Cash', NULL, '0.00', 'D', 1, 0, ''),
(73, 19, 'Tollplaza', NULL, '0.00', 'D', 0, 0, ''),
(74, 5, 'fgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgf', '12', '0.00', 'D', 0, 0, ''),
(75, 5, 'Translen', 'LG1234', '777777.00', 'D', 0, 0, ''),
(76, 5, 'asdasfasfsaf', '', '235.00', 'D', 0, 0, ''),
(77, 3, 'Axis Bank', 'AXIS 001', '0.00', 'C', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `ledger_accounts`
--

CREATE TABLE `ledger_accounts` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ledger_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `bank_details` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `closing_bal` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `acc_inv` varchar(50) NOT NULL,
  `trans_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ledger_approval`
--

CREATE TABLE `ledger_approval` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `opening_bal` decimal(10,0) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `under` varchar(50) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `ent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ledger_approval`
--

INSERT INTO `ledger_approval` (`id`, `intAdminId`, `name`, `opening_bal`, `group_name`, `type`, `under`, `nature`, `ent_date`) VALUES
(1, 1, 'Axis Bank Ltd', '0', 'Creditors', 'Cr', '1', 'Transporter', '2018-04-26'),
(2, 1, 'Axis Bank Ltd', '13084', 'Creditors', 'Cr', '2', 'Transporter', '2018-04-26'),
(3, 1, 'State Bank Of India', '0', 'Creditors', 'Cr', '3', 'Transporter', '2018-05-07'),
(4, 1, 'State Bank Of India', '0', 'Creditors', 'Cr', '4', 'Transporter', '2018-05-07'),
(5, 1, 'State Bank Of India', '0', 'Creditors', 'Cr', '5', 'Transporter', '2018-05-07'),
(6, 1, 'State Bank Of India', '0', 'Debtors', 'Dr', '6', 'Transporter', '2018-05-07'),
(7, 1, 'State Bank Of India', '0', 'Debtors', 'Dr', '7', 'Transporter', '2018-05-07'),
(8, 1, 'IDBI Bank', '50000', 'Debtors', 'Cr', '8', 'Diesel Station', '2018-05-11'),
(9, 1, 'Axis Bank Ltd', '1343141', 'Debtors', 'Cr', '9', 'Transporter', '2018-05-11'),
(10, 1, 'Axis Bank Ltd', '2342', 'Debtors', 'Cr', '10', 'Diesel Station', '2018-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `load_det`
--

CREATE TABLE `load_det` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(100) NOT NULL,
  `ent_date` date NOT NULL,
  `from_place` varchar(150) NOT NULL,
  `to_place` varchar(150) NOT NULL,
  `vechno` varchar(150) NOT NULL,
  `driver` varchar(150) NOT NULL,
  `company` varchar(100) NOT NULL,
  `transporter` varchar(100) NOT NULL,
  `party_name` varchar(150) NOT NULL,
  `party_gc` varchar(100) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `cont_no` varchar(100) NOT NULL,
  `contsize` int(20) NOT NULL,
  `cont_wt` float(50,2) NOT NULL,
  `load_type` varchar(100) NOT NULL,
  `sealno` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `identify` int(10) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_det`
--

INSERT INTO `load_det` (`id`, `intAdminId`, `tripid`, `ent_date`, `from_place`, `to_place`, `vechno`, `driver`, `company`, `transporter`, `party_name`, `party_gc`, `ref_no`, `cont_no`, `contsize`, `cont_wt`, `load_type`, `sealno`, `remarks`, `identify`) VALUES
(1, 1, '1', '2018-06-07', 'Chennai', 'Coimbatore', 'TN21AY3063', '7', 'Ass Logistics', 'ASS Roadways', 'Lakshmi Cargo Company Ltd.', '004712', '79504', 'NYKU3573767', 20, 6.50, 'Import', '', '', 10),
(2, 1, '2', '2018-04-01', 'Chennai', 'Tiruvannamalai', 'TN19U0054', '55', 'Ass Logistics', 'ASS Roadways - Suresh', 'Shreyas Relay Systems', '', '', 'TRHU1879697', 20, 24.00, 'Import', '', '', 10),
(3, 1, '3', '2018-04-01', 'Chennai', 'Coimbatore', 'TN19U3956', '60', 'Ass Logistics', 'ASS Roadways - Renuka', 'Lakshmi Cargo Company Ltd.', '004713', '79504', 'NYKU3663860', 20, 18.43, 'Import', '', '', 10),
(4, 1, '4', '2018-04-01', '', '', 'TN19U3983', '9', 'Ass Logistics', 'ASS Roadways - Banu', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'TCKU1814248', 20, 25.00, 'Export', '', '', 10),
(5, 1, '5', '2018-04-01', 'Chennai', 'Coimbatore', 'TN19U4101', '62', 'Ass Logistics', 'ASS Roadways - Uma', 'Lakshmi Cargo Company Ltd.', '004712', '79504', 'NYKU3573767', 20, 18.44, 'Import', '', '', 10),
(6, 1, '6', '2018-04-01', 'Chennai', 'Gummidipoondi', 'TN19T2264', '12', 'Ass Logistics', 'ASS Roadways - Banu', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'TCKU1844497', 20, 25.00, 'Export', '', '', 10),
(7, 1, '7', '2018-04-01', '', '', 'TN04AS2155', '49', 'Ass Logistics', 'ASS Roadways', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'TCKU2935821', 20, 25.00, 'Export', '', '', 10),
(8, 1, '8', '2018-04-01', 'Chennai', 'Gummidipoondi', 'TN04AS2178', '8', 'Ass Logistics', 'ASS Roadways', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'BMOU2542379', 20, 25.00, 'Export', '', '', 10),
(9, 1, '9', '2018-04-01', 'Chennai', 'Gummidipoondi', 'TN04AS3521', '52', 'Ass Logistics', 'ASS Roadways', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'BMOU2850710', 20, 25.00, 'Export', '', '', 10),
(10, 1, '10', '2018-04-01', '', '', 'TN04AS3127', '57', 'Ass Logistics', 'ASSL Trans', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'BMOU2675725', 20, 25.00, 'Export', '', '', 10),
(11, 1, '11', '2018-04-01', 'Chennai', 'Tiruvannamalai', 'TN04AS3013', '14', 'Ass Logistics', 'ASS Roadways', 'Shreyas Relay Systems', '', '', 'TRHU3044871', 20, 24.00, 'Import', '', '', 10),
(12, 1, '12', '2018-04-01', 'Chennai', 'Sriperumbudur', 'TN04AS3958', '24', 'Ass Logistics', 'ASS Roadways', 'Shreyas Relay Systems', '', '', 'GESU6368890', 20, 25.00, 'Import', '', '', 10),
(13, 1, '13', '2018-04-01', 'Chennai', 'Gummidipoondi', 'TN04AQ5191', '11', 'Ass Logistics', 'ASS Roadways - Magesh', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'TCKU1546954', 20, 25.00, 'Export', '', '', 10),
(14, 1, '14', '2018-04-01', 'Chennai', 'Gummidipoondi', 'TN04AR3568', '1', 'Ass Logistics', 'ASS Roadways - Magesh', 'Fynsea Lines and Logistics Pvt. Ltd.', '', '', 'BMOU2017030', 20, 25.00, 'Export', '', '', 10),
(15, 1, '15', '2018-04-02', 'Chennai', 'Tiruvarur', 'TN19Z8615', '58', 'Ass Logistics', 'ASS Roadways - Suresh', 'Shreyas Relay Systems', '', '', 'TRHU1892873', 20, 27.00, 'Import', '', '', 10),
(16, 1, '16', '2018-06-08', 'Cachar', 'Chamoli', 'TN19T2254', '23', 'Ass Logistics', 'ASS Roadways - Uma', 'Adichiamman Transports', 'test', 'test', 'TEST', 20, 465.00, 'Import', '', 'asdas', 10),
(17, 1, '17', '2018-06-08', 'Central Delhi', 'Saharanpur', 'TN19U4073', '3', 'Ass Logistics', 'ASS Roadways - Banu', 'Arsha Logistics', 'asdasd', 'asdasd', 'ASDA', 20, 0.00, 'Import', '', '', 10),
(18, 1, '18', '2018-06-08', 'Central Delhi', 'Sabarkantha', 'TN19U4088', '14', 'Ass Logistics', 'ASS Roadways - Banu', 'Insha Transport', 'test', '', '', 20, 0.00, '', '', '', 10),
(19, 1, '19', '2018-06-08', 'Sabarkantha', 'Agar', 'TN19U0036', '7', 'Ass Logistics', 'ASS Roadways - Suresh', 'Arsha Logistics', 'asd', 'asdas', 'DASD', 40, 0.00, 'Import', '', '', 10),
(20, 1, '19', '2018-06-08', 'Sabarkantha', 'Agar', 'TN19U0036', '7', 'Ass Logistics', 'ASS Roadways - Suresh', 'Arsha Logistics', 'asd', 'asdas', 'DASD', 40, 0.00, 'Import', '', '', 10),
(21, 1, '19', '2018-06-08', 'Sabarkantha', 'Agar', 'TN19U0036', '7', 'Ass Logistics', 'ASS Roadways - Suresh', 'Arsha Logistics', 'asd', 'asdas', 'DASD', 40, 0.00, 'Import', '', '', 10),
(22, 1, '20', '2018-06-08', 'Cachar', 'Sagar', 'TN19U4092', '26', 'Ass Logistics', 'ASS Roadways - Uma', 'Adichiamman Transports', 'dasd', '', '', 20, 0.00, '', '', '', 10),
(23, 1, '21', '2018-06-08', 'Cachar', 'Adilabad', 'TN21K5958', '50', 'Ass Logistics', 'ASS Roadways', 'Adichiamman Transports', 'dasd', 'asd', 'ASDF', 20, 0.00, 'Import', '', 'asdf', 10),
(24, 1, '22', '2018-06-08', 'East Delhi', 'Sagar', 'TN19U0299', '14', 'Ass Logistics', 'ASS Roadways - Suresh', 'Adichiamman Transports', 'aasd', 'asdasd', 'ASDA4474694', 20, 54475.00, 'Import', '', 'asdasd', 10),
(25, 1, '23', '2018-06-18', 'Chennai', 'Vellore', 'TN04AS2218', '14', 'Ass Logistics', 'ASS Roadways', 'Gee Krishna Transport', '64654', '46546', 'FHFG6565465', 20, 465465.00, 'Import', '', 'hfghf', 10),
(26, 1, '24', '2018-07-17', 'Agra', 'Chennai', 'TN04AS3105', '1', 'Ass Logistics', 'ASSL Trans', 'KRD Transports', '12', '23456', 'DLRG0213456', 20, 500.00, 'Export', '11', 'Hi', 10),
(27, 1, '25', '2018-07-21', '', '', 'TN19U0372', '3', 'Ass Logistics', 'ASS Roadways', '', '', '', '', 20, 0.00, '', '', '', 10),
(28, 1, '25', '2018-07-21', '', '', 'TN19U0372', '3', 'Ass Logistics', 'ASS Roadways', '', '', '', '', 20, 0.00, '', '', '', 10),
(29, 1, '26', '2018-08-04', 'Chennai', 'Bangalore Rural', 'TN04AS4248', '6', 'Ass Logistics', 'ASS Roadways', 'Lakshmi Cargo Company Ltd.', 'ASS 001', '100', 'MAS', 20, 500.00, 'Export', '', 'If any', 10),
(30, 1, '27', '2018-08-04', 'Chikkamagaluru', 'Chennai', 'TN04AS3468', '58', 'Ass Logistics', 'ASS Roadways', 'Kumaar Transport', '27', '27', 'CGMA1', 20, 25.00, 'Import', '', '', 10),
(31, 1, '28', '2018-08-13', 'Morigao', 'Madhepura', 'TN19U0181', '4', 'Ass Logistics', 'ASS Roadways', 'Adichiamman Transports', 'mm', 'mm', 'MMM', 20, 9.00, 'Import', '', 'test', 10),
(32, 1, '29', '2018-08-13', 'Chennai', 'Coimbatore', 'TN21L9196', '1', 'Ass Logistics', 'ASS Roadways', 'Lakshmi Cargo Company Ltd.', '1231221', '112121', 'ILCU2546978', 20, 25.20, 'Import', '', '', 10),
(33, 1, '30', '2018-08-14', '', '', 'TN19U0181', '4', 'Ass Logistics', 'ASS Roadways', '', '', '', '', 20, 0.00, '', '', '', 10),
(34, 1, '31', '2018-08-14', 'Chennai', 'Tapi', 'TN21AY3063', '8', 'Ass Logistics', 'ASS Roadways', 'Insha Transport', 'asdfa', 'sdfasdfa', 'SDFA6545645', 20, 564.00, 'Import', '', '5565465656', 10),
(35, 1, '32', '2018-08-16', 'Chennai', 'Tiruchirappalli', 'TN04AS2218', '14', 'Ass Logistics', 'ASS Roadways', 'Lakshmi Cargo Company Ltd.', '789769', '96767969', 'GFJF5444444', 20, 57547548.00, 'Import', '', 'testing', 10),
(36, 1, '33', '2018-08-22', 'Thiruvananthapuram', 'Chennai', 'TN04AS3114', '62', 'Ass Logistics', 'ASSL Trans', 'Venus Roadlines', 'GC12345', 'REF1234', 'ABCD', 40, 500.00, 'Import', '', 'A new Entry for testing', 10);

-- --------------------------------------------------------

--
-- Table structure for table `load_hire`
--

CREATE TABLE `load_hire` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `hire_amount` decimal(10,0) NOT NULL,
  `commision` decimal(10,0) NOT NULL,
  `loading_charge` decimal(10,0) NOT NULL,
  `unloading_charge` decimal(10,0) NOT NULL,
  `weight_bill_charge` decimal(10,0) NOT NULL,
  `other_amount` decimal(10,0) NOT NULL,
  `other_description` varchar(100) NOT NULL,
  `halt_days` int(50) NOT NULL,
  `halt_rate` decimal(10,0) NOT NULL,
  `halt_amount` decimal(10,0) NOT NULL,
  `total_hire` decimal(10,0) NOT NULL,
  `chn_advance` decimal(10,0) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `mkm_adv` decimal(10,0) NOT NULL,
  `mkm_bank` varchar(100) NOT NULL,
  `mkm_cque_no` varchar(50) NOT NULL,
  `total_cash_advance` decimal(10,0) NOT NULL,
  `total_diesel_advance` decimal(10,0) NOT NULL,
  `total_diesel_quantity` decimal(10,0) NOT NULL,
  `hire_balance` decimal(10,0) NOT NULL,
  `bill_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_hire`
--

INSERT INTO `load_hire` (`id`, `intAdminId`, `tripid`, `ent_date`, `hire_amount`, `commision`, `loading_charge`, `unloading_charge`, `weight_bill_charge`, `other_amount`, `other_description`, `halt_days`, `halt_rate`, `halt_amount`, `total_hire`, `chn_advance`, `bank`, `cheque_no`, `mkm_adv`, `mkm_bank`, `mkm_cque_no`, `total_cash_advance`, `total_diesel_advance`, `total_diesel_quantity`, `hire_balance`, `bill_id`) VALUES
(1, 1, '1', '2018-06-07', '23000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '3500', '1', '', '0', '1', '', '3500', '8414', '124', '10586', '2 '),
(2, 1, '2', '2018-04-01', '16400', '500', '0', '800', '0', '0', '', 0, '0', '0', '0', '3500', '1', '', '0', '1', '', '3500', '14161', '208', '-961', '0'),
(3, 1, '3', '2018-04-01', '33000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '3500', '1', '', '0', '1', '', '3500', '15114', '222', '13886', '0'),
(4, 1, '4', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '0'),
(5, 1, '5', '2018-04-01', '33000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '4000', '1', '', '0', '1', '', '4000', '14093', '207', '14407', '0'),
(6, 1, '6', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '0'),
(7, 1, '7', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '17020', '250', '-11520', '3 '),
(8, 1, '8', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '3 '),
(9, 1, '9', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '1 '),
(10, 1, '10', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '0'),
(11, 1, '11', '2018-04-01', '16400', '500', '0', '800', '0', '0', '', 0, '0', '0', '0', '4000', '1', '', '0', '1', '', '4000', '11711', '172', '989', '3 '),
(12, 1, '12', '2018-04-01', '13000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '3500', '1', '', '0', '1', '', '3500', '0', '0', '9000', '1 '),
(13, 1, '13', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '0', '1', '', '2000', '0', '0', '5500', '0'),
(14, 1, '14', '2018-04-01', '8000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '3000', '1', '', '0', '1', '', '3000', '0', '0', '4500', '0'),
(15, 1, '15', '2018-04-02', '25000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '3000', '1', '', '0', '1', '', '3000', '0', '0', '21500', '0'),
(16, 1, '16', '2018-06-08', '5000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '4000', '1', '', '0', '1', '', '4000', '0', '0', '500', '0'),
(17, 1, '17', '2018-06-08', '7000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '1000', '1', '', '0', '1', '', '1000', '0', '0', '5500', '0'),
(18, 1, '18', '2018-06-08', '50000', '500', '0', '0', '0', '0', '', 0, '0', '0', '-500', '1000', '1', '', '0', '1', '', '1000', '0', '0', '48500', '0'),
(19, 1, '19', '2018-06-08', '70000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '5000', '1', '', '0', '1', '', '5000', '0', '0', '64500', '0'),
(20, 1, '19', '2018-06-08', '70000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '5000', '1', '', '0', '1', '', '5000', '0', '0', '64500', '0'),
(21, 1, '19', '2018-06-08', '70000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '5000', '1', '', '0', '1', '', '5000', '0', '0', '64500', '0'),
(22, 1, '20', '2018-06-08', '5000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '100', '1', '', '0', '1', '', '100', '0', '0', '4400', '0'),
(23, 1, '21', '2018-06-08', '6000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '700', '1', '', '0', '1', '', '700', '0', '0', '4800', '4 '),
(24, 1, '22', '2018-06-08', '70000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '1000', '1', '', '0', '1', '', '1000', '0', '0', '68500', '0'),
(25, 1, '23', '2018-06-18', '70000', '500', '800', '800', '0', '0', '', 0, '0', '0', '0', '10000', '1', '', '0', '1', '', '10000', '6000', '500', '55100', '3 '),
(26, 1, '24', '2018-07-17', '50000', '500', '1000', '500', '0', '0', '', 0, '0', '0', '0', '5000', '1', '', '0', '1', '', '5000', '0', '0', '46000', '5 '),
(27, 1, '25', '2018-07-21', '0', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '1', '', '0', '1', '', '0', '0', '0', '0', '6 '),
(28, 1, '25', '2018-07-21', '0', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '0', '1', '', '0', '1', '', '0', '0', '0', '0', ''),
(29, 1, '26', '2018-08-04', '50000', '500', '2000', '1000', '0', '0', '', 0, '0', '0', '0', '0', '1', '', '0', '1', '', '0', '0', '0', '52500', '6 '),
(30, 1, '27', '2018-08-04', '20000', '500', '1500', '1000', '0', '0', '', 0, '0', '0', '0', '0', '1', '', '0', '1', '', '0', '0', '0', '22000', '6 '),
(31, 1, '28', '2018-08-13', '999', '500', '888', '9', '0', '0', '', 0, '0', '0', '1396', '100', '1', '', '100', '1', '', '200', '100', '500', '1096', ''),
(32, 1, '29', '2018-08-13', '25000', '500', '1000', '1000', '0', '0', '', 0, '0', '0', '0', '3000', '1', '', '1000', '1', '', '4000', '7200', '100', '15300', ''),
(33, 1, '30', '2018-08-14', '0', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '2000', '1', '', '200', '1', '', '2200', '100', '0', '-2300', ''),
(34, 1, '31', '2018-08-14', '500000', '500', '0', '0', '0', '0', '', 0, '0', '0', '0', '50000', '1', '', '0', '1', '', '50000', '0', '0', '449500', ''),
(35, 1, '32', '2018-08-16', '8000', '500', '100', '100', '0', '0', '', 0, '0', '0', '0', '1000', '1', '', '1000', '1', '', '2000', '500', '5', '5200', ''),
(36, 1, '33', '2018-08-22', '9876', '5000', '5623', '121', '0', '0', '', 0, '0', '0', '10620', '111', '1', '', '222', '1', '', '333', '1212', '222', '9075', '');

-- --------------------------------------------------------

--
-- Table structure for table `load_return`
--

CREATE TABLE `load_return` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ent_date` date NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `from_place` varchar(100) NOT NULL,
  `to_place` varchar(100) NOT NULL,
  `vechno` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `driver_change` varchar(100) NOT NULL,
  `return_adv` decimal(10,0) NOT NULL,
  `party_name` varchar(100) NOT NULL,
  `party_gc` varchar(50) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `cont_no` varchar(100) NOT NULL,
  `cont_size` int(10) NOT NULL,
  `cont_wt` decimal(10,0) NOT NULL,
  `load_type` varchar(100) NOT NULL,
  `sealno` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `loading_charge` decimal(10,0) NOT NULL,
  `unloading_charge` decimal(10,0) NOT NULL,
  `weight_bill_charge` decimal(10,0) NOT NULL,
  `identify` int(10) NOT NULL DEFAULT '11',
  `adv_place` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_return`
--

INSERT INTO `load_return` (`id`, `intAdminId`, `ent_date`, `tripid`, `from_place`, `to_place`, `vechno`, `driver`, `driver_change`, `return_adv`, `party_name`, `party_gc`, `ref_no`, `cont_no`, `cont_size`, `cont_wt`, `load_type`, `sealno`, `remarks`, `loading_charge`, `unloading_charge`, `weight_bill_charge`, `identify`, `adv_place`) VALUES
(1, 1, '2018-04-02', '1', 'Coimbatore', 'Chennai', 'TN21AY3063', '7', '', '0', '', '', '', '', 0, '0', '', '', '', '0', '0', '0', 11, ''),
(2, 1, '2018-06-13', '8', 'Gummidipoondi', 'Chennai', 'TN04AS2178', '8', '', '1000', '', '', '', '', 0, '0', '', '', '', '0', '0', '0', 11, ''),
(3, 1, '2018-06-18', '23', 'Vellore', 'Chennai', 'TN04AS2218', '14', '', '0', '', '', '', '', 0, '0', '', '', '', '0', '0', '0', 11, '1'),
(4, 1, '2018-07-17', '24', 'Chennai', 'Agra', 'TN04AS3105', '1', '', '0', '', '', '', '', 0, '0', '', '', '', '0', '0', '0', 11, '1'),
(5, 1, '2018-08-13', '28', 'Madhepura', 'Morigao', 'TN19U0181', '4', '', '900', 'fff', '6y6t8', '688', 'HJHJ7879999', 20, '70', 'Import', '', 'test', '0', '0', '0', 11, '1');

-- --------------------------------------------------------

--
-- Table structure for table `load_stat`
--

CREATE TABLE `load_stat` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(100) NOT NULL,
  `ent_date` date NOT NULL,
  `vechnum` varchar(100) NOT NULL,
  `load_det` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `load_stat`
--

INSERT INTO `load_stat` (`id`, `intAdminId`, `tripid`, `ent_date`, `vechnum`, `load_det`, `status`) VALUES
(1, 1, '1', '2018-06-07', 'TN21AY3063', '', 'Load'),
(2, 1, '2', '2018-04-01', 'TN19U0054', '', 'Load'),
(3, 1, '3', '2018-04-01', 'TN19U3956', '', 'Load'),
(4, 1, '4', '2018-04-01', 'TN19U3983', '', 'Load'),
(5, 1, '5', '2018-04-01', 'TN19U4101', '', 'Load'),
(6, 1, '6', '2018-04-01', 'TN19T2264', '', 'Load'),
(7, 1, '7', '2018-04-01', 'TN04AS2155', '', 'Load'),
(8, 1, '8', '2018-04-01', 'TN04AS2178', '', 'Load'),
(9, 1, '9', '2018-04-01', 'TN04AS3521', '', 'Load'),
(10, 1, '10', '2018-04-01', 'TN04AS3127', '', 'Load'),
(11, 1, '11', '2018-04-01', 'TN04AS3013', '', 'Load'),
(12, 1, '12', '2018-04-01', 'TN04AS3958', '', 'Load'),
(13, 1, '13', '2018-04-01', 'TN04AQ5191', '', 'Load'),
(14, 1, '14', '2018-04-01', 'TN04AR3568', '', 'Load'),
(15, 1, '1', '2018-04-02', 'TN21AY3063', '', 'Returnemp'),
(16, 1, '15', '2018-04-02', 'TN19Z8615', '', 'Load'),
(17, 1, '16', '2018-06-08', 'TN19T2254', '', 'Load'),
(18, 1, '17', '2018-06-08', 'TN19U4073', '', 'Load'),
(19, 1, '18', '2018-06-08', 'TN19U4088', '', 'Load'),
(20, 1, '19', '2018-06-08', 'TN19U0036', '', 'Load'),
(21, 1, '19', '2018-06-08', 'TN19U0036', '', 'Load'),
(22, 1, '19', '2018-06-08', 'TN19U0036', '', 'Load'),
(23, 1, '20', '2018-06-08', 'TN19U4092', '', 'Load'),
(24, 1, '21', '2018-06-08', 'TN21K5958', '', 'Load'),
(25, 1, '22', '2018-06-08', 'TN19U0299', '', 'Load'),
(26, 1, '8', '2018-06-13', 'TN04AS2178', '', 'Returnemp'),
(27, 1, '23', '2018-06-18', 'TN04AS2218', '', 'Load'),
(28, 1, '23', '2018-06-18', 'TN04AS2218', '', 'OnRoad'),
(29, 1, '23', '2018-06-18', 'TN04AS2218', '', 'Returnemp'),
(30, 1, '24', '2018-07-17', 'TN04AS3105', '', 'Load'),
(31, 1, '24', '2018-07-17', 'TN04AS3105', '', 'Returnemp'),
(32, 1, '25', '2018-07-21', 'TN19U0372', '', 'Load'),
(33, 1, '25', '2018-07-21', 'TN19U0372', '', 'Load'),
(34, 1, '26', '2018-08-04', 'TN04AS4248', '', 'Load'),
(35, 1, '27', '2018-08-04', 'TN04AS3468', '', 'Load'),
(36, 1, '28', '2018-08-13', 'TN19U0181', '', 'Load'),
(37, 1, '28', '2018-08-13', 'TN19U0181', '', 'Return'),
(38, 1, '28', '2018-08-13', 'TN19U0181', '', 'OnRoad'),
(39, 1, '29', '2018-08-13', 'TN21L9196', '', 'Load'),
(40, 1, '25', '2018-08-12', 'TN19U0372', '', 'OnRoad'),
(41, 1, '30', '2018-08-14', 'TN19U0181', '', 'Load'),
(42, 1, '31', '2018-08-14', 'TN21AY3063', '', 'Load'),
(43, 1, '31', '2018-08-14', 'TN21AY3063', '', 'OnRoad'),
(44, 1, '32', '2018-08-16', 'TN04AS2218', '', 'Load'),
(45, 1, '33', '2018-08-22', 'TN04AS3114', '', 'Load');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `station` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `substation` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frieght` double NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `milage_note`
--

CREATE TABLE `milage_note` (
  `id` int(10) NOT NULL,
  `intAdminId` int(10) NOT NULL,
  `vechno` varchar(50) NOT NULL,
  `current_kms` varchar(50) NOT NULL,
  `last_updated` varchar(50) NOT NULL,
  `milage` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `milage_note`
--

INSERT INTO `milage_note` (`id`, `intAdminId`, `vechno`, `current_kms`, `last_updated`, `milage`) VALUES
(1, 0, 'TN21AY3063', '', '07/06/2018', '0'),
(2, 0, 'TN21AY3063', '0', '', '0'),
(3, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(4, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(5, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(6, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(7, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(8, 0, 'TN21AY3063', '', '13/07/2018', '0'),
(9, 0, 'TN19U0181', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `mode_of_payment`
--

CREATE TABLE `mode_of_payment` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `mode_pay` varchar(30) NOT NULL,
  `mode_desc` varchar(50) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nature`
--

CREATE TABLE `nature` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nature`
--

INSERT INTO `nature` (`id`, `intAdminId`, `name`) VALUES
(0, 1, 'Diesel Station'),
(0, 1, 'Transporter'),
(0, 1, 'Customer'),
(0, 1, 'Driver'),
(0, 1, 'Bank'),
(0, 1, 'Bills'),
(0, 1, 'Fuel');

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticsentries`
--

CREATE TABLE `new_barath_logisticsentries` (
  `id` bigint(18) NOT NULL,
  `tag_id` bigint(18) DEFAULT NULL,
  `entrytype_id` bigint(18) NOT NULL,
  `number` bigint(18) DEFAULT NULL,
  `date` date NOT NULL,
  `dr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `cr_total` decimal(25,2) NOT NULL DEFAULT '0.00',
  `narration` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticsentryitems`
--

CREATE TABLE `new_barath_logisticsentryitems` (
  `id` bigint(18) NOT NULL,
  `entry_id` bigint(18) NOT NULL,
  `ledger_id` bigint(18) NOT NULL,
  `amount` decimal(25,2) NOT NULL DEFAULT '0.00',
  `dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `reconciliation_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticsentrytypes`
--

CREATE TABLE `new_barath_logisticsentrytypes` (
  `id` bigint(18) NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `base_type` int(2) NOT NULL DEFAULT '0',
  `numbering` int(2) NOT NULL DEFAULT '1',
  `prefix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suffix` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zero_padding` int(2) NOT NULL DEFAULT '0',
  `restriction_bankcash` int(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_barath_logisticsentrytypes`
--

INSERT INTO `new_barath_logisticsentrytypes` (`id`, `label`, `name`, `description`, `base_type`, `numbering`, `prefix`, `suffix`, `zero_padding`, `restriction_bankcash`) VALUES
(1, 'receipt', 'Receipt', 'Received in Bank account or Cash account', 1, 1, '', '', 0, 2),
(2, 'payment', 'Payment', 'Payment made from Bank account or Cash account', 1, 1, '', '', 0, 3),
(3, 'contra', 'Contra', 'Transfer between Bank account and Cash account', 1, 1, '', '', 0, 4),
(4, 'journal', 'Journal', 'Transfer between Non Bank account and Cash account', 1, 1, '', '', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticsgroups`
--

CREATE TABLE `new_barath_logisticsgroups` (
  `id` bigint(18) NOT NULL,
  `parent_id` bigint(18) DEFAULT '0',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `affects_gross` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_barath_logisticsgroups`
--

INSERT INTO `new_barath_logisticsgroups` (`id`, `parent_id`, `name`, `code`, `affects_gross`) VALUES
(1, NULL, 'Assets', NULL, 0),
(2, NULL, 'Liabilities and Owners Equity', NULL, 0),
(3, NULL, 'Incomes', NULL, 0),
(4, NULL, 'Expenses', NULL, 0),
(5, 1, 'Fixed Assets', NULL, 0),
(6, 1, 'Current Assets', NULL, 0),
(7, 1, 'Investments', NULL, 0),
(8, 2, 'Capital Account', NULL, 0),
(9, 2, 'Current Liabilities', NULL, 0),
(10, 2, 'Loans (Liabilities)', NULL, 0),
(11, 3, 'Direct Incomes', NULL, 1),
(12, 4, 'Direct Expenses', NULL, 1),
(13, 3, 'Indirect Incomes', NULL, 0),
(14, 4, 'Indirect Expenses', NULL, 0),
(15, 3, 'Sales', NULL, 1),
(16, 4, 'Purchases', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticsledgers`
--

CREATE TABLE `new_barath_logisticsledgers` (
  `id` bigint(18) NOT NULL,
  `group_id` bigint(18) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `op_balance` decimal(25,2) NOT NULL DEFAULT '0.00',
  `op_balance_dc` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL DEFAULT '0',
  `reconciliation` int(1) NOT NULL DEFAULT '0',
  `notes` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_barath_logisticsledgers`
--

INSERT INTO `new_barath_logisticsledgers` (`id`, `group_id`, `name`, `code`, `op_balance`, `op_balance_dc`, `type`, `reconciliation`, `notes`) VALUES
(1, 8, 'Cash', NULL, '0.00', 'D', 1, 0, ''),
(2, 12, 'Akbar Ali', NULL, '0.00', 'D', 0, 0, ''),
(3, 12, 'Ananadan V', NULL, '0.00', 'D', 0, 0, ''),
(4, 12, 'Arunachalam V', NULL, '0.00', 'D', 0, 0, ''),
(5, 12, 'Ashok Varman T', NULL, '0.00', 'D', 0, 0, ''),
(6, 12, 'Babu M', NULL, '0.00', 'D', 0, 0, ''),
(7, 12, 'Baskar R', NULL, '0.00', 'D', 0, 0, ''),
(8, 12, 'C Kanniyappan', NULL, '0.00', 'D', 0, 0, ''),
(9, 12, 'C Panneerselvam', NULL, '0.00', 'D', 0, 0, ''),
(10, 12, 'Dhatchanamoorthi M', NULL, '0.00', 'D', 0, 0, ''),
(11, 12, 'Doss S', NULL, '0.00', 'D', 0, 0, ''),
(12, 12, 'Durairaj B', NULL, '0.00', 'D', 0, 0, ''),
(13, 12, 'Elumalai A', NULL, '0.00', 'D', 0, 0, ''),
(14, 12, 'Ganapathi S', NULL, '0.00', 'D', 0, 0, ''),
(15, 12, 'H Masthan', NULL, '0.00', 'D', 0, 0, ''),
(16, 12, 'Karthikeyan M', NULL, '0.00', 'D', 0, 0, ''),
(17, 12, 'Kathirvel K', NULL, '0.00', 'D', 0, 0, ''),
(18, 12, 'Kumar G', NULL, '0.00', 'D', 0, 0, ''),
(19, 12, 'Loganathan N', NULL, '0.00', 'D', 0, 0, ''),
(20, 12, 'M Ashraf Ali', NULL, '0.00', 'D', 0, 0, ''),
(21, 12, 'Manikandan K', NULL, '0.00', 'D', 0, 0, ''),
(22, 12, 'Mayakrishnan S', NULL, '0.00', 'D', 0, 0, ''),
(23, 12, 'Muruganadham M', NULL, '0.00', 'D', 0, 0, ''),
(24, 12, 'Natarajan M', NULL, '0.00', 'D', 0, 0, ''),
(25, 12, 'Pandiyan R', NULL, '0.00', 'D', 0, 0, ''),
(26, 12, 'Panneer S', NULL, '0.00', 'D', 0, 0, ''),
(27, 12, 'Prabakaran R', NULL, '0.00', 'D', 0, 0, ''),
(28, 12, 'Prabu G', NULL, '0.00', 'D', 0, 0, ''),
(29, 12, 'Purusothaman S', NULL, '0.00', 'D', 0, 0, ''),
(30, 12, 'Ragothaman K', NULL, '0.00', 'D', 0, 0, ''),
(31, 12, 'Raj N', NULL, '0.00', 'D', 0, 0, ''),
(32, 12, 'Rajendiran E', NULL, '0.00', 'D', 0, 0, ''),
(33, 12, 'Rajeshkannan M', NULL, '0.00', 'D', 0, 0, ''),
(34, 12, 'Rajganesh T', NULL, '0.00', 'D', 0, 0, ''),
(35, 12, 'Ramasamy C', NULL, '0.00', 'D', 0, 0, ''),
(36, 12, 'Ramesh D', NULL, '0.00', 'D', 0, 0, ''),
(37, 9, 'Accounts Payable', NULL, '0.00', 'C', 0, 0, ''),
(38, 12, 'Rose S', NULL, '0.00', 'D', 0, 0, ''),
(39, 12, 'Samsukani S', NULL, '0.00', 'D', 0, 0, ''),
(40, 9, 'Bills Payable', NULL, '0.00', 'D', 0, 0, ''),
(41, 12, 'Santhoshkumar S', NULL, '0.00', 'D', 0, 0, ''),
(42, 12, 'Selladurai M', NULL, '0.00', 'D', 0, 0, ''),
(43, 12, 'Sevakumar K', NULL, '0.00', 'D', 0, 0, ''),
(44, 12, 'Senthil M', NULL, '0.00', 'D', 0, 0, ''),
(45, 12, 'Shahul Hameed H', NULL, '0.00', 'D', 0, 0, ''),
(46, 12, 'Sankar A', NULL, '0.00', 'D', 0, 0, ''),
(47, 12, 'Sivasankar M', NULL, '0.00', 'D', 0, 0, ''),
(48, 12, 'Suresh N', NULL, '0.00', 'D', 0, 0, ''),
(49, 12, 'Suresh T', NULL, '0.00', 'D', 0, 0, ''),
(50, 12, 'V Arulkumar', NULL, '0.00', 'D', 0, 0, ''),
(51, 12, 'Vadivel G', NULL, '0.00', 'D', 0, 0, ''),
(52, 12, 'Vasu S', NULL, '0.00', 'D', 0, 0, ''),
(53, 12, 'Velraj M', NULL, '0.00', 'D', 0, 0, ''),
(54, 12, 'Vignesh S', NULL, '0.00', 'D', 0, 0, ''),
(55, 12, 'Vijayan E', NULL, '0.00', 'D', 0, 0, ''),
(56, 12, 'Vijayan M', NULL, '0.00', 'D', 0, 0, ''),
(57, 12, 'Senthil K', NULL, '0.00', 'D', 0, 0, ''),
(58, 11, 'Ass Logistics', NULL, '0.00', 'D', 0, 0, ''),
(59, 3, 'Income', NULL, '0.00', 'D', 0, 0, ''),
(60, 12, 'Expenses', NULL, '0.00', 'D', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticslogs`
--

CREATE TABLE `new_barath_logisticslogs` (
  `id` bigint(18) NOT NULL,
  `date` datetime NOT NULL,
  `level` int(1) NOT NULL,
  `host_ip` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_agent` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticssettings`
--

CREATE TABLE `new_barath_logisticssettings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `new_barath_logisticssettings`
--

INSERT INTO `new_barath_logisticssettings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'New Barath Logistics', 'Maduranthagam', 'newbarathlogistics@gmail.com', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `new_barath_logisticstags`
--

CREATE TABLE `new_barath_logisticstags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `onroad_details`
--

CREATE TABLE `onroad_details` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `vechnum` varchar(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `from_place` varchar(50) NOT NULL,
  `to_place` varchar(50) NOT NULL,
  `driver` varchar(20) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `adv_place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `onroad_details`
--

INSERT INTO `onroad_details` (`id`, `intAdminId`, `vechnum`, `tripid`, `ent_date`, `from_place`, `to_place`, `driver`, `amount`, `adv_place`) VALUES
(1, 1, 'TN04AS2218', '23', '2018-06-18', 'Chennai', 'Vellore', '14', '3000', ''),
(2, 1, 'TN19U0181', '28', '2018-08-13', 'Morigao', 'Madhepura', '4', '700', ''),
(3, 1, 'TN19U0372', '25', '2018-08-12', '', '', '3', '2000', ''),
(4, 1, 'TN21AY3063', '31', '2018-08-14', 'Chennai', 'Tapi', '8', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `opening_balance`
--

CREATE TABLE `opening_balance` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `type` varchar(50) NOT NULL,
  `opening_bal` decimal(10,0) NOT NULL,
  `ent_date` date NOT NULL,
  `ent_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `open_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opening_balance`
--

INSERT INTO `opening_balance` (`id`, `intAdminId`, `type`, `opening_bal`, `ent_date`, `ent_id`, `name`, `open_id`) VALUES
(1, 1, 'Transporter', '0', '2018-05-11', 'TRANSP3837', 'New Barath Logistics', ''),
(2, 18, 'Driver', '0', '2018-05-14', '1', 'Akbar Ali', ''),
(3, 18, 'Driver', '0', '2018-05-14', '2', 'Ananadan V', ''),
(4, 18, 'Driver', '0', '2018-05-14', '3', 'Arunachalam V', ''),
(5, 18, 'Driver', '0', '2018-05-14', '4', 'Ashok Varman T', ''),
(6, 18, 'Driver', '0', '2018-05-14', '5', 'Babu M', ''),
(7, 18, 'Driver', '0', '2018-05-14', '6', 'Baskar R', ''),
(8, 18, 'Driver', '0', '2018-05-14', '7', 'C Kanniyappan', ''),
(9, 18, 'Driver', '0', '2018-05-14', '8', 'C Panneerselvam', ''),
(10, 18, 'Driver', '0', '2018-05-14', '9', 'Dhatchanamoorthi M', ''),
(11, 18, 'Driver', '0', '2018-05-14', '10', 'Doss S', ''),
(12, 18, 'Driver', '0', '2018-05-14', '11', 'Durairaj B', ''),
(13, 18, 'Driver', '0', '2018-05-14', '12', 'Elumalai A', ''),
(14, 18, 'Driver', '0', '2018-05-14', '13', 'Ganapathi S', ''),
(15, 18, 'Driver', '0', '2018-05-14', '14', 'H Masthan', ''),
(16, 18, 'Driver', '0', '2018-05-14', '15', 'Karthikeyan M', ''),
(17, 18, 'Driver', '0', '2018-05-14', '16', 'Kathirvel K', ''),
(18, 18, 'Driver', '0', '2018-05-14', '17', 'Kathirvel K', ''),
(19, 18, 'Driver', '0', '2018-05-14', '18', 'Kathirvel K', ''),
(20, 18, 'Driver', '0', '2018-05-14', '19', 'Kathirvel K', ''),
(21, 18, 'Driver', '0', '2018-05-14', '20', 'Kathirvel K', ''),
(22, 18, 'Driver', '0', '2018-05-14', '21', 'Kathirvel K', ''),
(23, 18, 'Driver', '0', '2018-05-14', '22', 'Kathirvel K', ''),
(24, 18, 'Driver', '0', '2018-05-14', '23', 'Kumar G', ''),
(25, 18, 'Driver', '0', '2018-05-14', '24', 'Loganathan N', ''),
(26, 18, 'Driver', '0', '2018-05-14', '25', 'M Ashraf Ali', ''),
(27, 18, 'Driver', '0', '2018-05-14', '26', 'Manikandan K', ''),
(28, 18, 'Driver', '0', '2018-05-14', '27', 'Mayakrishnan S', ''),
(29, 18, 'Driver', '0', '2018-05-14', '28', 'Muruganadham M', ''),
(30, 18, 'Driver', '0', '2018-05-14', '29', 'Natarajan M', ''),
(31, 18, 'Driver', '0', '2018-05-14', '30', 'Pandiyan R', ''),
(32, 18, 'Driver', '0', '2018-05-14', '31', 'Panneer S', ''),
(33, 18, 'Driver', '0', '2018-05-14', '32', 'Prabakaran R', ''),
(34, 18, 'Driver', '0', '2018-05-14', '33', 'Prabu G', ''),
(35, 18, 'Driver', '0', '2018-05-14', '34', 'Purusothaman S', ''),
(36, 18, 'Driver', '0', '2018-05-14', '35', 'Ragothaman K', ''),
(37, 18, 'Driver', '0', '2018-05-14', '36', 'Raj N', ''),
(38, 18, 'Driver', '0', '2018-05-14', '37', 'Rajendiran E', ''),
(39, 18, 'Driver', '0', '2018-05-14', '38', 'Rajeshkannan M', ''),
(40, 18, 'Driver', '0', '2018-05-14', '39', 'Rajganesh T', ''),
(41, 18, 'Driver', '0', '2018-05-14', '40', 'Ramasamy C', ''),
(42, 18, 'Driver', '0', '2018-05-14', '41', 'Ramesh D', ''),
(43, 18, 'Driver', '0', '2018-05-14', '42', 'Rose S', ''),
(44, 18, 'Driver', '0', '2018-05-15', '43', 'Samsukani S', ''),
(45, 18, 'Driver', '0', '2018-05-15', '44', 'Santhoshkumar S', ''),
(46, 18, 'Driver', '0', '2018-05-15', '45', 'Selladurai M', ''),
(47, 18, 'Driver', '0', '2018-05-15', '46', 'Sevakumar K', ''),
(48, 18, 'Driver', '0', '2018-05-15', '47', 'Senthil M', ''),
(49, 18, 'Driver', '0', '2018-05-15', '48', 'Shahul Hameed H', ''),
(50, 18, 'Driver', '0', '2018-05-15', '49', 'Sankar A', ''),
(51, 18, 'Driver', '0', '2018-05-15', '50', 'Sivasankar M', ''),
(52, 18, 'Driver', '0', '2018-05-15', '51', 'Suresh N', ''),
(53, 18, 'Driver', '0', '2018-05-15', '52', 'Suresh T', ''),
(54, 18, 'Driver', '0', '2018-05-15', '53', 'V Arulkumar', ''),
(55, 18, 'Driver', '0', '2018-05-15', '54', 'Vadivel G', ''),
(56, 18, 'Driver', '0', '2018-05-15', '55', 'Vasu S', ''),
(57, 18, 'Driver', '0', '2018-05-15', '56', 'Velraj M', ''),
(58, 18, 'Driver', '0', '2018-05-15', '57', 'Vignesh S', ''),
(59, 18, 'Driver', '0', '2018-05-15', '58', 'Vijayan E', ''),
(60, 18, 'Driver', '0', '2018-05-15', '59', 'Vijayan M', ''),
(61, 18, 'Driver', '0', '2018-05-15', '60', 'Senthil K', ''),
(62, 1, 'Customer', '46431', '2018-05-16', '6564', 'Adichiamman Transports', ''),
(63, 1, 'Customer', '606561', '2018-05-16', '9105', 'Alwin Cargo Pvt. Ltd.', ''),
(64, 1, 'Customer', '448500', '2018-05-16', '4751', 'Arsha Logistics', ''),
(65, 1, 'Customer', '10000', '2018-05-16', '4588', 'Cargo Container Carrier', ''),
(66, 1, 'Customer', '4586074', '2018-05-16', '9347', 'Ensen Shippings', ''),
(67, 1, 'Customer', '37000', '2018-05-16', '8315', 'F5 Carrier', ''),
(68, 1, 'Customer', '273000', '2018-05-16', '5301', 'Fynsea Lines and Logistics Pvt. Ltd.', ''),
(69, 1, 'Customer', '95515', '2018-05-16', '3818', 'Gee Krishna Transport', ''),
(70, 1, 'Customer', '3000', '2018-05-16', '2728', 'G.K Logistics', ''),
(71, 1, 'Customer', '45000', '2018-05-16', '4136', 'Gokul Transport', ''),
(72, 1, 'Customer', '16230', '2018-05-16', '9303', 'Hari Om Transports', ''),
(73, 1, 'Customer', '14900', '2018-05-16', '8253', 'Help Cargo Carriers', ''),
(74, 1, 'Customer', '78500', '2018-05-16', '9136', 'Insha Transport', ''),
(75, 1, 'Customer', '6000', '2018-05-16', '6716', 'Karthi Transport', ''),
(76, 1, 'Customer', '27788', '2018-05-16', '5297', 'Kingfisher Logistics', ''),
(77, 1, 'Customer', '1501300', '2018-05-16', '5713', 'KPS and Co', ''),
(78, 1, 'Customer', '1123650', '2018-05-16', '8566', 'KRD Transports', ''),
(79, 1, 'Customer', '573646', '2018-05-16', '8872', 'Kumaar Transport', ''),
(80, 1, 'Customer', '732129', '2018-05-16', '1058', 'Lakshmi Cargo Company Ltd.', ''),
(81, 1, 'Customer', '822400', '2018-05-16', '6508', 'Logsol Pvt. Ltd.', ''),
(82, 1, 'Customer', '328000', '2018-05-16', '2908', 'Metro Logistics', ''),
(83, 1, 'Customer', '317775', '2018-05-16', '1822', 'Murugan Transports', ''),
(84, 1, 'Customer', '113000', '2018-05-16', '8130', 'Namakkal South India Transports', ''),
(85, 1, 'Customer', '41848', '2018-05-16', '8586', 'Nikhil Logistics', ''),
(86, 1, 'Customer', '51000', '2018-05-16', '9339', 'Oceanus Transports', ''),
(87, 1, 'Customer', '411760', '2018-05-16', '1657', 'PSTS Heavy Lift and ShiftLtd.', ''),
(88, 1, 'Customer', '76000', '2018-05-16', '7829', 'Raja Transports', ''),
(90, 1, 'Customer', '275400', '2018-05-16', '4501', 'RSG Movers Pvt. Ltd.', ''),
(91, 1, 'Customer', '28000', '2018-05-16', '7214', 'R S Transport', ''),
(92, 1, 'Customer', '311000', '2018-05-16', '3942', 'RSU Transport', ''),
(93, 1, 'Customer', '5484620', '2018-05-16', '9074', 'Shreyas Relay Systems', ''),
(94, 1, 'Customer', '17000', '2018-05-16', '4320', 'Sri Angalaparameshwari Transport', ''),
(95, 1, 'Customer', '188725', '2018-05-16', '2142', 'Sri Murugan Logistics', ''),
(96, 1, 'Customer', '61500', '2018-05-16', '9192', 'Sri Sai Logistics', ''),
(97, 1, 'Customer', '214350', '2018-05-16', '7313', 'SRS Cargo Logistics India Ltd.,', ''),
(98, 1, 'Customer', '36000', '2018-05-16', '7679', 'SST Karthick Trans', ''),
(99, 1, 'Customer', '390565', '2018-05-16', '4379', 'Swamy Saranam Transport', ''),
(100, 1, 'Customer', '73500', '2018-05-16', '9340', 'Venus Roadlines', ''),
(101, 1, 'Customer', '1996918', '2018-05-16', '2708', 'Bagavathi Priya Energy Management Services', ''),
(102, 25, 'Driver', '30000', '2018-05-29', '61', 'testdriver', ''),
(103, 18, 'Driver', '0', '2018-06-03', '62', 'Gunasekaran', '');

-- --------------------------------------------------------

--
-- Table structure for table `other_exp`
--

CREATE TABLE `other_exp` (
  `id` int(11) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `vechno` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `amount` float(50,2) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party_calculation`
--

CREATE TABLE `party_calculation` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `bill_ent_date` date NOT NULL,
  `cust_id` int(50) NOT NULL,
  `tripid` int(50) NOT NULL,
  `amount` int(50) NOT NULL,
  `payment` int(50) NOT NULL,
  `payment_date` date NOT NULL,
  `balance` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `party_payments`
--

CREATE TABLE `party_payments` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ent_date` date NOT NULL,
  `party` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_voucher`
--

CREATE TABLE `payment_voucher` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ledger_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `bank_details` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `closing_bal` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `acc_inv` varchar(50) NOT NULL,
  `trans_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_voucher`
--

INSERT INTO `payment_voucher` (`id`, `intAdminId`, `ledger_id`, `ent_date`, `type`, `amount`, `pay_mode`, `pay_type`, `bank_details`, `cheque_no`, `closing_bal`, `remarks`, `acc_inv`, `trans_detail`) VALUES
(1, 18, '', '2018-06-12', 'Bill Amount', '2500', 'Dr', '', '', '', '2500', '1 ', 'ASS Logistics', ''),
(2, 18, '', '2018-06-12', 'Bill Amount', '4086', 'Dr', '', '', '', '6586', '2 ', 'ASS Logistics', ''),
(3, 1, 'ASS Roadways', '2018-06-12', 'Payment', '5586', '', 'Cash', 'Cash', '', '3463645', '', 'Cash', ''),
(4, 18, '', '2018-06-18', 'Bill Amount', '-4311', 'Dr', '', '', '', '2275', '3 ', 'ASS Logistics', ''),
(5, 1, 'ASS Roadways', '2018-06-18', 'Payment', '25000', '', 'Cash', 'Cash', '', '3488645', '', 'Cash', ''),
(6, 1, 'ASS Roadways', '2018-06-18', 'Payment', '600', '', 'Cash', 'Cash', '', '3489245', '', 'Cash', ''),
(7, 1, 'ASS Roadways', '2018-07-13', 'Payment', '69', '', 'NEFT', 'MKM Cash', 'dfsg6fd54gs4df', '3489314', 'sdfgsdfg', 'MKM Cash', ''),
(8, 18, '', '2018-07-13', 'Bill Amount', '5300', 'Dr', '', '', '', '7575', '4 ', 'ASS Logistics', ''),
(9, 23, '', '2018-07-17', 'Bill Amount', '45000', 'Dr', '', '', '', '52575', '5 ', 'ASS Logistics', ''),
(10, 1, 'ASSL Trans', '2018-07-17', 'Payment', '40000', '', 'Cash', 'MKM Cash', '', '1279093', 'dfgdfg', 'Cash', ''),
(11, 1, 'ASS Roadways', '2018-07-24', 'Payment', '5300', '', 'Cash', 'Cash', '', '3494614', '', 'Cash', ''),
(12, 18, '', '2018-08-09', 'Bill Amount', '50000', 'Dr', '', '', '', '102575', '6 ', 'ASS Logistics', ''),
(13, 1, 'ASS Roadways', '2018-08-13', 'Payment', '50000', '', 'Cash', '', '', '3544614', '', 'Cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `pay_type`
--

CREATE TABLE `pay_type` (
  `id` int(20) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `intAdminId` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pay_type`
--

INSERT INTO `pay_type` (`id`, `pay_type`, `intAdminId`) VALUES
(2, 'Cash', 1),
(3, 'NEFT', 1),
(5, 'RTGS', 1),
(6, 'IMPS', 1),
(7, 'Cheque', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pc_entry`
--

CREATE TABLE `pc_entry` (
  `id` int(20) NOT NULL,
  `intAdminId` varchar(20) NOT NULL,
  `ent_date` date NOT NULL,
  `driver` varchar(50) NOT NULL,
  `vechno` varchar(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pc_entry`
--

INSERT INTO `pc_entry` (`id`, `intAdminId`, `ent_date`, `driver`, `vechno`, `tripid`, `place`, `amount`) VALUES
(1, '', '1970-01-01', '', '', '', '', '0'),
(2, '', '1970-01-01', '', '', '', '', '0'),
(3, '', '1970-01-01', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pindetails`
--

CREATE TABLE `pindetails` (
  `intId` int(11) NOT NULL,
  `intMId` varchar(50) DEFAULT NULL,
  `pinId` varchar(50) DEFAULT NULL,
  `pingenid` int(11) NOT NULL,
  `CreatedDate` datetime NOT NULL,
  `pinStatus` varchar(11) NOT NULL DEFAULT 'unused'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pingenerate`
--

CREATE TABLE `pingenerate` (
  `intId` int(11) NOT NULL,
  `intMId` int(11) NOT NULL,
  `pinAmount` int(11) NOT NULL,
  `pinCount` int(11) NOT NULL,
  `varPin` varchar(55) NOT NULL,
  `varCreateDate` date NOT NULL,
  `varPStatus` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pod`
--

CREATE TABLE `pod` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `company` varchar(50) NOT NULL,
  `tripid` varchar(20) NOT NULL,
  `copy` varchar(50) NOT NULL,
  `ent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pod`
--

INSERT INTO `pod` (`id`, `intAdminId`, `company`, `tripid`, `copy`, `ent_date`) VALUES
(1, 1, 'Lakshmi Cargo Company Ltd.', '1', '1_test (2).sql', '2018-06-11'),
(2, 1, 'Gee Krishna Transport', '23', '23_Invoice - Vitruvian Solutions.docx', '2018-06-18'),
(3, 1, 'Gee Krishna Transport', '23', '23_Invoice 2- Vitruvian Solutions.docx', '2018-06-18'),
(4, 1, 'Gee Krishna Transport', '23', '23_Invoice 3- Vitruvian Solutions.docx', '2018-06-18'),
(5, 1, 'Gee Krishna Transport', '23', '23_Jayaprakaash_9962115157.docx', '2018-06-18'),
(6, 1, 'Gee Krishna Transport', '23', '23_Link India Global - Digital Marketing (1).pdf', '2018-06-18'),
(7, 1, 'Gee Krishna Transport', '23', '23_Link India Global - Digital Marketing.pdf', '2018-06-18'),
(8, 1, 'KRD Transports', '24', '24_5CF9D8CF-F958-4A31-976E-881B37937515.png', '2018-07-17'),
(9, 1, 'KRD Transports', '24', '24_CAB837AC-924C-4559-98BA-4FAA444C21EC.png', '2018-07-17'),
(10, 1, 'Fynsea Lines and Logistics Pvt. Ltd.', '', '_', '2018-07-21'),
(11, 1, 'Fynsea Lines and Logistics Pvt. Ltd.', '8', '8_', '2018-07-24'),
(12, 1, 'Adichiamman Transports', '28', '28_Online National Permit _ Pay National Permit Au', '2018-08-13'),
(13, 1, 'Lakshmi Cargo Company Ltd.', '', '_Avana Logistek.pdf', '2018-08-13'),
(14, 1, 'Lakshmi Cargo Company Ltd.', 'h_5', 'h_5_pos req.txt', '2018-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `recipt_voucher`
--

CREATE TABLE `recipt_voucher` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ledger_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `bank_details` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `closing_bal` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `acc_inv` varchar(50) NOT NULL,
  `trans_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipt_voucher`
--

INSERT INTO `recipt_voucher` (`id`, `intAdminId`, `ledger_id`, `ent_date`, `type`, `amount`, `pay_mode`, `pay_type`, `bank_details`, `cheque_no`, `closing_bal`, `remarks`, `acc_inv`, `trans_detail`) VALUES
(1, 1, 'Lakshmi Cargo Company Ltd.', '2018-06-11', 'Payment', '23000', '', 'Cash', 'Cash', '', '755129', 'Payment', 'Cash', ''),
(2, 1, 'Gee Krishna Transport', '2018-07-13', 'Payment', '10000', '', 'Cash', 'Cash', '', '105515', 'hughuj', 'Cash', ''),
(3, 1, 'Gee Krishna Transport', '2018-07-13', 'Payment', '10000', '', 'Cash', 'Cash', '', '115515', '', 'Cash', ''),
(4, 1, 'KRD Transports', '2018-07-17', 'Payment', '30000', '', 'Cash', 'MKM Cash', '', '1153650', 'Pending Amount', 'Cash', ''),
(5, 1, 'Adichiamman Transports', '2018-08-13', 'Payment', '1000', '', 'Cash', '', '', '47431', '', 'Cash', '');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `intId` int(11) NOT NULL,
  `intMemId` varchar(50) NOT NULL,
  `varpinID` varchar(150) NOT NULL,
  `SponsorId` varchar(150) NOT NULL,
  `prename` varchar(200) NOT NULL,
  `cusName` varchar(200) NOT NULL,
  `prefname` varchar(200) NOT NULL,
  `cusFName` varchar(200) NOT NULL,
  `cusDob` date NOT NULL,
  `cusGender` varchar(200) NOT NULL,
  `cusAddress` text NOT NULL,
  `cusState` varchar(200) NOT NULL,
  `cusCity` varchar(200) NOT NULL,
  `cusPin` varchar(200) NOT NULL,
  `cusPhone` varchar(200) NOT NULL,
  `cusMobile` varchar(200) NOT NULL,
  `cusEmail` varchar(200) NOT NULL,
  `cusMStatus` varchar(200) NOT NULL,
  `cusProfession` varchar(200) NOT NULL,
  `cusNomineeName` varchar(200) NOT NULL,
  `cusRelation` varchar(200) NOT NULL,
  `cusRelationDob` date NOT NULL,
  `cusBank` varchar(200) NOT NULL,
  `cusBranch` varchar(200) NOT NULL,
  `cusAccno` varchar(200) NOT NULL,
  `cusPanNo` varchar(200) NOT NULL,
  `cusPaytm` varchar(200) NOT NULL,
  `cusIFSC` varchar(200) NOT NULL,
  `varPayType` varchar(150) NOT NULL,
  `varStatus` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_empty`
--

CREATE TABLE `return_empty` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ent_date` varchar(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `from_place` varchar(100) NOT NULL,
  `to_place` varchar(100) NOT NULL,
  `vechno` varchar(100) NOT NULL,
  `driver` varchar(100) NOT NULL,
  `driver_change` varchar(100) NOT NULL,
  `return_adv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rto_entry`
--

CREATE TABLE `rto_entry` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ent_date` date NOT NULL,
  `driver` varchar(100) NOT NULL,
  `vechno` varchar(100) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `place` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rto_entry`
--

INSERT INTO `rto_entry` (`id`, `intAdminId`, `ent_date`, `driver`, `vechno`, `tripid`, `place`, `amount`) VALUES
(1, 0, '1970-01-01', '', '', '', '', '0'),
(2, 0, '1970-01-01', '', '', '', '', '0'),
(3, 18, '1970-01-01', '8', 'TN04AS2178', '8', 'vfxfg', '400'),
(4, 0, '1970-01-01', '', '', '', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fy_start` date NOT NULL,
  `fy_end` date NOT NULL,
  `currency_symbol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `currency_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `decimal_places` int(2) NOT NULL DEFAULT '2',
  `date_format` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timezone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `manage_inventory` int(1) NOT NULL DEFAULT '0',
  `account_locked` int(1) NOT NULL DEFAULT '0',
  `email_use_default` int(1) NOT NULL DEFAULT '0',
  `email_protocol` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email_host` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_port` int(5) NOT NULL,
  `email_tls` int(1) NOT NULL DEFAULT '0',
  `email_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_from` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `print_paper_height` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_paper_width` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_top` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_bottom` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_left` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_margin_right` decimal(10,3) NOT NULL DEFAULT '0.000',
  `print_orientation` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `print_page_format` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `database_version` int(10) NOT NULL,
  `settings` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `email`, `fy_start`, `fy_end`, `currency_symbol`, `currency_format`, `decimal_places`, `date_format`, `timezone`, `manage_inventory`, `account_locked`, `email_use_default`, `email_protocol`, `email_host`, `email_port`, `email_tls`, `email_username`, `email_password`, `email_from`, `print_paper_height`, `print_paper_width`, `print_margin_top`, `print_margin_bottom`, `print_margin_left`, `print_margin_right`, `print_orientation`, `print_page_format`, `database_version`, `settings`) VALUES
(1, 'Logistics', 'Chennai', 'google@gmail.co', '2018-04-01', '2019-03-31', '', 'none', 2, 'd-M-Y|dd-M-yy', 'UTC', 0, 0, 1, 'Smtp', '', 0, 0, '', '', '', '0.000', '0.000', '0.000', '0.000', '0.000', '0.000', 'P', 'H', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_entires`
--

CREATE TABLE `sparepart_entires` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `invoice_no` varchar(50) NOT NULL,
  `dop` date NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `qty` decimal(10,0) NOT NULL,
  `unit_price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `spare_total` decimal(10,0) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sparepart_pay`
--

CREATE TABLE `sparepart_pay` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `paying_amount` decimal(10,0) NOT NULL,
  `amount_paid` decimal(10,0) NOT NULL,
  `balance` decimal(10,0) NOT NULL,
  `amount_collector` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `mop` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spare_fuel_pay`
--

CREATE TABLE `spare_fuel_pay` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `fuel` varchar(50) NOT NULL,
  `fuel_capacity` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spare_fuel_pay`
--

INSERT INTO `spare_fuel_pay` (`id`, `intAdminId`, `fuel`, `fuel_capacity`) VALUES
(1, 18, 'saf', '0'),
(2, 18, '21442', '21323');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StCode` int(11) NOT NULL,
  `StateName` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StCode`, `StateName`) VALUES
(1, 'Andaman and Nicobar Island (UT)'),
(2, 'Andhra Pradesh'),
(3, 'Arunachal Pradesh'),
(4, 'Assam'),
(5, 'Bihar'),
(6, 'Chandigarh (UT)'),
(7, 'Chhattisgarh'),
(8, 'Dadra and Nagar Haveli (UT)'),
(9, 'Daman and Diu (UT)'),
(10, 'Delhi (NCT)'),
(11, 'Goa'),
(12, 'Gujarat'),
(13, 'Haryana'),
(14, 'Himachal Pradesh'),
(15, 'Jammu and Kashmir'),
(16, 'Jharkhand'),
(17, 'Karnataka'),
(18, 'Kerala'),
(19, 'Lakshadweep (UT)'),
(20, 'Madhya Pradesh'),
(21, 'Maharashtra'),
(22, 'Manipur'),
(23, 'Meghalaya'),
(24, 'Mizoram'),
(25, 'Nagaland'),
(26, 'Odisha'),
(27, 'Puducherry (UT)'),
(28, 'Punjab'),
(29, 'Rajastha'),
(30, 'Sikkim'),
(31, 'Tamil Nadu'),
(32, 'Telangana'),
(33, 'Tripura'),
(34, 'Uttarakhand'),
(35, 'Uttar Pradesh'),
(36, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `supp_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact_person` varchar(50) NOT NULL,
  `mob_no` varchar(30) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `gst_no` varchar(30) NOT NULL,
  `pan_no` varchar(30) NOT NULL,
  `adhar_no` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `area` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `pinCode` int(20) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(18) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` char(6) COLLATE utf8_unicode_ci NOT NULL,
  `background` char(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `color`, `background`) VALUES
(1, 'Tollplaza Payment', 'ff0000', 'cccc00');

-- --------------------------------------------------------

--
-- Table structure for table `transporters`
--

CREATE TABLE `transporters` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MobNum` bigint(100) NOT NULL,
  `PhNum` bigint(100) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ServiceTaxNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gstNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cstNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `panNo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(20) NOT NULL,
  `city` int(20) NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(191) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `comp_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `voucherid` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transporters`
--

INSERT INTO `transporters` (`id`, `intAdminId`, `name`, `alias`, `contactName`, `MobNum`, `PhNum`, `email`, `ServiceTaxNo`, `gstNo`, `cstNo`, `panNo`, `state`, `city`, `area`, `address`, `pincode`, `remarks`, `created_at`, `updated_at`, `comp_id`, `type`, `voucherid`) VALUES
(1, 1, 'ASS Roadways', '', 'Ashokkumar', 8695868383, 0, 'assroadways@yahoo.com', '', '123456789', '', 'ALHPA0858J', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP6825', '', '1'),
(2, 1, 'ASS Roadways - Suresh', '', 'Ashokkumar', 8695868383, 0, 'assrsuresh@gmail.com', '', '123456789', '', 'BHKPS2540B', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP8274', '', '2'),
(3, 1, 'ASS Roadways - Banu', '', 'Ashokkumar', 8695868383, 0, 'assroadwaysbanu@gmail.com', '', '123456789', '', 'BLSPB7901H', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP9807', '', '3'),
(4, 1, 'ASS Roadways - Uma', '', 'Ashokkumar', 8695868383, 0, 'assroadwaysuma@gmail.com', '', '123456789', '', 'AFAPU8243E', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP3130', '', '4'),
(5, 1, 'ASS Roadways - Renuka', '', 'Ashokkumar', 8695868383, 0, 'assroadwaysrenuka@gmail.com', '', '123456789', '', 'AZKPR6922P', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP6474', '', '5'),
(6, 1, 'ASSL Trans', '', 'Ashokkumar', 8695868383, 0, 'assltrans78@gmail.com', '', '123456789', '', 'BHKPS2540B', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP3948', '', '6'),
(7, 1, 'ASS Roadways - Magesh', '', 'Ashokkumar', 8695868383, 0, 'assrashok@gmail.com', '', '123456789', '', 'BIHPM8307C', 31, 0, 'Madurantakam', '# 6, Pillaiyar Koil Street, Senguntharpet', 603306, '', NULL, NULL, 'TRANSP8264', '', '7'),
(8, 1, 'New Barath Logistics', '', 'Magesh', 7397393293, 0, 'newbarathlogistics@gmail.com', '', '123456789', '', 'BIHPM8307C', 31, 498, 'Mylapore', 'PNK Garden', 600004, '', NULL, NULL, 'TRANSP3837', 'Hire', '8'),
(9, 1, 'asdasfasfsaf', '', 'safsafasf', 3253253255, 32555555555, 'skmadhan96@gmail.com', '', 'q3w325555555555', '', '3255555555', 0, 0, '', '', 325555, '', NULL, NULL, 'TRANSP9097', '', ''),
(10, 1, 'aDSADSD', '235235', 'saasfasf', 2355555555, 0, 'admin@gmail.com', '', '235555555555555', '', '2352353253', 0, 0, '', '', 235555, '', NULL, NULL, 'TRANSP8572', '', '113'),
(11, 1, 'dshvdsj', 'bcdi', 'jfvniivi', 7854755693, 74932830450, 'skmadhan96@gmail.com', '', '478ty3783746932', '', 'dbiuw47832', 0, 0, '', '', 435756, '', NULL, NULL, 'TRANSP5165', '', '114'),
(12, 1, 'xas', 'ffd', 'hgf', 3425465756, 23456756865, 'skmadhan96@gmail.com', '', '123456787456345', '', '3456y78956', 0, 0, '', '', 234567, '', NULL, NULL, 'TRANSP8482', '', '115'),
(13, 1, 'xas', 'ffd', 'hgf', 3425465756, 23456756865, 'skmadhan96@gmail.com', '', '123456787456345', '', '3456y78956', 0, 0, '', '', 234567, '', NULL, NULL, 'TRANSP3313', '', ''),
(14, 1, 'sindhu', 'Horance', 'Martin', 9867654322, 12412412412, 'skmadhan96@gmail.com', '', '124124124124124', '', '1321241241', 15, 206, '', '', 124124, '', NULL, NULL, 'TRANSP7684', '', '116'),
(15, 1, 'aaa', 'erter', 'asfasf', 4353463463, 23535235, 'asd@gmasds.com', '', '325235235235235', '', 'qwr1234124', 0, 0, '', '', 151212, '', NULL, NULL, 'TRANSP3057', '', '117'),
(16, 1, 'mani', 'kannan', 'kannan', 8765432222, 76554432456, 'sindublossoms@gmail.com', '', '986754321111111', '', '7687546234', 14, 181, '235235235', '235235', 325252, '', NULL, NULL, 'TRANSP3695', '', '118'),
(17, 1, 'Martin Transport', 'Horance', 'Martin', 4353463463, 12414412124, 'admin@gmail.com', '', '325235235235235', '', '2819347981', 10, 122, 'chennai', 'chennai', 769657, '', NULL, NULL, 'TRANSP4243', '', '119'),
(18, 1, 'Sri Kaliamman Trailer Service', '', 'Ramu', 2544444444, 0, 'dasdasd@gmail.com', '', '123456789123456', '', 'bhap987987', 31, 498, '', '', 600001, '', NULL, NULL, 'TRANSP2568', 'Hire', '120');

-- --------------------------------------------------------

--
-- Table structure for table `transporter_advances`
--

CREATE TABLE `transporter_advances` (
  `id` int(20) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `ent_date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `transporter` varchar(100) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `voucher_type` varchar(50) NOT NULL,
  `reason` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transporter_billing`
--

CREATE TABLE `transporter_billing` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `billingid` varchar(50) NOT NULL,
  `hire_amount` decimal(10,0) NOT NULL,
  `ent_date` date NOT NULL,
  `transporter` varchar(50) NOT NULL,
  `total_adv` decimal(10,0) NOT NULL,
  `bill_amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporter_billing`
--

INSERT INTO `transporter_billing` (`id`, `intAdminId`, `tripid`, `billingid`, `hire_amount`, `ent_date`, `transporter`, `total_adv`, `bill_amount`) VALUES
(1, 18, '9', '1 ', '8000', '2018-06-12', 'ASS Roadways', '9000', '-1000'),
(2, 18, '12', '1 ', '13000', '2018-06-12', 'ASS Roadways', '10500', '2500'),
(3, 18, '1', '2 ', '23000', '2018-06-12', 'ASS Roadways', '18914', '4086'),
(4, 18, '7', '3 ', '8000', '2018-06-18', 'ASS Roadways', '24020', '-16020'),
(5, 18, '8', '3 ', '8000', '2018-06-18', 'ASS Roadways', '8000', '0'),
(6, 18, '23', '3 ', '70000', '2018-06-18', 'ASS Roadways', '24000', '46000'),
(7, 18, '11', '3 ', '16400', '2018-06-18', 'ASS Roadways', '20711', '-4311'),
(8, 18, '21', '4 ', '6000', '2018-07-13', 'ASS Roadways', '700', '5300'),
(9, 23, '24', '5 ', '50000', '2018-07-17', 'ASSL Trans', '5000', '45000'),
(10, 18, '25', '6 ', '0', '2018-08-09', 'ASS Roadways', '0', '0'),
(11, 18, '27', '6 ', '20000', '2018-08-09', 'ASS Roadways', '0', '20000'),
(12, 18, '26', '6 ', '50000', '2018-08-09', 'ASS Roadways', '0', '50000');

-- --------------------------------------------------------

--
-- Table structure for table `transporter_payment`
--

CREATE TABLE `transporter_payment` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `ent_date` date NOT NULL,
  `amount` varchar(50) NOT NULL,
  `transporter` varchar(100) NOT NULL,
  `pay_type` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `bill_id` varchar(50) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `voucher_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transporter_payment`
--

INSERT INTO `transporter_payment` (`id`, `intAdminId`, `ent_date`, `amount`, `transporter`, `pay_type`, `account_no`, `bill_id`, `remarks`, `voucher_type`) VALUES
(1, 1, '2018-06-12', '1500', 'ASS Roadways', 'Cash', 'NULL', '1 ', '', ''),
(2, 1, '2018-06-12', '4086', 'ASS Roadways', 'Cash', 'NULL', '2 ', '', ''),
(3, 1, '2018-06-18', '25000', 'ASS Roadways', 'Cash', 'NULL', '3 ', '', ''),
(4, 1, '2018-06-18', '600', 'ASS Roadways', 'Cash', 'NULL', '3 ', '', ''),
(5, 1, '2018-07-13', '69', 'ASS Roadways', 'NEFT', '', '3 ', 'sdfgsdfg', ''),
(6, 1, '2018-07-17', '40000', 'ASSL Trans', 'Cash', 'NULL', '5 ', 'dfgdfg', ''),
(7, 1, '2018-07-24', '5300', 'ASS Roadways', 'Cash', 'NULL', '4 ', '', ''),
(8, 1, '2018-08-13', '50000', 'ASS Roadways', 'Cash', 'NULL', '6 ', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `trip_calculation`
--

CREATE TABLE `trip_calculation` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `ent_date` date NOT NULL,
  `tripid` varchar(50) NOT NULL,
  `vechno` varchar(50) NOT NULL,
  `driver` varchar(50) NOT NULL,
  `rental_amt` decimal(10,0) NOT NULL,
  `total_adv` decimal(10,0) NOT NULL,
  `loading_charges` decimal(10,0) NOT NULL,
  `unloading_charges` decimal(10,0) NOT NULL,
  `weigh_charges` decimal(10,0) NOT NULL,
  `toll_charges` decimal(10,0) NOT NULL,
  `pc` decimal(10,0) NOT NULL,
  `rto` decimal(10,0) NOT NULL,
  `others` decimal(10,0) NOT NULL,
  `diesel_amt` decimal(10,0) NOT NULL,
  `driver_halt_wage` decimal(10,0) NOT NULL,
  `driver_wages` decimal(10,0) NOT NULL,
  `deduction` decimal(10,0) NOT NULL,
  `ded_remarks` varchar(200) NOT NULL,
  `load_expense` decimal(10,0) NOT NULL,
  `rental_bal` decimal(10,0) NOT NULL,
  `driver_exp_wow` decimal(10,0) NOT NULL,
  `driver_exp_ww` decimal(10,0) NOT NULL,
  `driver_bal` decimal(10,0) NOT NULL,
  `type` int(50) NOT NULL,
  `billing_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_maintan`
--

CREATE TABLE `tyre_maintan` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `vnum` varchar(30) NOT NULL,
  `tyre_code` varchar(30) NOT NULL,
  `date_fxing` date NOT NULL,
  `km_fxing` varchar(30) NOT NULL,
  `tyre_type` varchar(30) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_master`
--

CREATE TABLE `tyre_master` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `tyre_code` varchar(30) NOT NULL,
  `manu_name` varchar(50) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  `dop` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tyre_retreading`
--

CREATE TABLE `tyre_retreading` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `retreading_id` varchar(30) NOT NULL,
  `vnum` varchar(30) NOT NULL,
  `tyre_code` varchar(30) NOT NULL,
  `route_from` varchar(50) NOT NULL,
  `route_to` varchar(50) NOT NULL,
  `travels_name` varchar(50) NOT NULL,
  `km_retreading` varchar(50) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `com_retreading` varchar(50) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `intId` int(11) NOT NULL,
  `intMId` varchar(100) NOT NULL,
  `varMName` varchar(255) NOT NULL,
  `varMEmail` varchar(255) NOT NULL,
  `varMPassword` varchar(255) NOT NULL,
  `varMType` varchar(255) NOT NULL,
  `VarMStatus` int(11) NOT NULL DEFAULT '0',
  `transporter_id` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`intId`, `intMId`, `varMName`, `varMEmail`, `varMPassword`, `varMType`, `VarMStatus`, `transporter_id`) VALUES
(1, '1', 'Ass Logistics', 'admin@gmail.com', 'admin', 'administrator', 1, 0),
(22, '1', 'ASS Roadways - Renuka', 'assroadwaysrenuka@gmail.com', 'assr', 'Transporter', 0, 5),
(21, '1', 'ASS Roadways - Uma', 'assroadwaysuma@gmail.com', 'assr', 'Transporter', 0, 4),
(20, '1', 'ASS Roadways - Banu', 'assroadwaysbanu@gmail.com', 'ASSR', 'Transporter', 0, 3),
(19, '1', 'ASS Roadways - Suresh', 'assrsuresh@gmail.com', 'ASSR', 'Transporter', 0, 2),
(18, '1', 'ASS Roadways', 'assroadways@yahoo.com', 'assr', 'Transporter', 0, 1),
(23, '1', 'ASSL Trans', 'assltrans78@gmail.com', 'assr', 'Transporter', 0, 6),
(24, '1', 'ASS Roadways - Magesh', 'assrashok@gmail.com', 'assr', 'Transporter', 0, 7),
(26, '1', 'fgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgfgf', 'martin.f@infogenx.com124235689', '', 'Transporter', 0, 0),
(27, '1', 'Translen', 'admin@slenix.com', 'admin', 'Transporter', 0, 0),
(28, '1', 'asdasfasfsaf', 'skmadhan96@gmail.com', '123456', 'Transporter', 0, 0),
(29, '1', 'asdasfasfsaf', 'skmadhan96@gmail.com', '123456', 'Transporter', 0, 9),
(30, '1', 'aDSADSD', 'admin@gmail.com', '123456', 'Transporter', 0, 10),
(31, '1', 'dshvdsj', 'skmadhan96@gmail.com', 'qweqwe', 'Transporter', 0, 11),
(32, '1', 'xas', 'skmadhan96@gmail.com', '123123', 'Transporter', 0, 12),
(33, '1', 'xas', 'skmadhan96@gmail.com', '123456', 'Transporter', 0, 13),
(34, '1', 'sindhu', 'skmadhan96@gmail.com', '123456', 'Transporter', 0, 14),
(35, '1', 'aaa', 'asd@gmasds.com', '111111', 'Transporter', 0, 15),
(36, '1', 'mani', 'sindublossoms@gmail.com', '123123', 'Transporter', 0, 16),
(37, '1', 'Martin Transport', 'admin@gmail.com', '123123', 'Transporter', 0, 17);

-- --------------------------------------------------------

--
-- Table structure for table `vechstat`
--

CREATE TABLE `vechstat` (
  `id` int(50) NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `vechnum` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tripid` varchar(100) NOT NULL,
  `ent_date` date NOT NULL,
  `from_place` varchar(150) NOT NULL,
  `to_place` varchar(150) NOT NULL,
  `driver` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vechstat`
--

INSERT INTO `vechstat` (`id`, `intAdminId`, `vechnum`, `status`, `tripid`, `ent_date`, `from_place`, `to_place`, `driver`) VALUES
(1, 1, 'TN21K5958', 'HHalt', '', '2018-04-01', 'Chennai', '', ''),
(2, 1, 'TN21L9196', 'HHalt', '', '2018-04-01', 'Chennai', '', '13'),
(3, 1, 'TN21AY3063', 'Load', '1', '2018-06-07', 'Chennai', 'Coimbatore', '7'),
(4, 1, 'TN19Z8350', 'HHalt', '', '2018-04-01', 'Chennai', '', '60'),
(5, 1, 'TN19Z8615', 'HHalt', '', '2018-04-01', 'Chennai', '', '58'),
(6, 1, 'TN19Z8636', 'HHalt', '', '2018-04-01', 'Chennai', '', '60'),
(7, 1, 'TN19Y2752', 'HHalt', '', '2018-04-01', 'Chennai', '', ''),
(8, 1, 'TN19Y3057', 'HHalt', '', '2018-04-01', 'Chennai', '', '23'),
(9, 1, 'TN19U0036', 'HHalt', '', '2018-04-01', 'Chennai', '', '29'),
(10, 1, 'TN19U0054', 'Load', '2', '2018-04-01', 'Chennai', 'Tiruvannamalai', '55'),
(11, 1, 'TN19U0181', 'HHalt', '', '2018-04-01', 'Chennai', '', '41'),
(12, 1, 'TN19U0299', 'HHalt', '', '2018-04-01', 'Chennai', '', '26'),
(13, 1, 'TN19U0372', 'HHalt', '', '2018-04-01', 'Chennai', '', '42'),
(14, 1, 'TN19U0490', 'HHalt', '', '2018-04-01', 'Chennai', '', '39'),
(15, 1, 'TN19U3956', 'Load', '3', '2018-04-01', 'Chennai', 'Coimbatore', '60'),
(16, 1, 'TN19U3983', 'Load', '4', '2018-04-01', '', '', '9'),
(17, 1, 'TN19U4073', 'HHalt', '', '2018-04-01', 'Chennai', '', '32'),
(18, 1, 'TN19U4088', 'HHalt', '', '2018-04-01', 'Chennai', '', '54'),
(19, 1, 'TN19U4092', 'HHalt', '', '2018-04-01', 'Chennai', '', '60'),
(20, 1, 'TN19U4101', 'Load', '5', '2018-04-01', 'Chennai', 'Coimbatore', '62'),
(21, 1, 'TN04AS4248', 'HHalt', '', '2018-04-01', 'Chennai', '', '50'),
(22, 1, 'TN19T2254', 'HHalt', '', '2018-04-01', 'Chennai', '', '3'),
(23, 1, 'TN19T2264', 'Load', '6', '2018-04-01', 'Chennai', 'Gummidipoondi', '12'),
(24, 1, 'TN04AS2155', 'Load', '7', '2018-04-01', '', '', '49'),
(25, 1, 'TN04AS2178', 'Load', '8', '2018-04-01', 'Chennai', 'Gummidipoondi', '8'),
(26, 1, 'TN04AS2218', 'HHalt', '', '2018-04-01', 'Chennai', '', '51'),
(27, 1, 'TN04AS3521', 'Load', '9', '2018-04-01', 'Chennai', 'Gummidipoondi', '52'),
(28, 1, 'TN04AS3105', 'Accident', 'NULL', '2018-04-01', 'Ocheri', 'Chennai', ''),
(29, 1, 'TN04AS3114', 'HHalt', '', '2018-04-01', 'Chennai', '', '38'),
(30, 1, 'TN04AS3127', 'Load', '10', '2018-04-01', '', '', '57'),
(31, 1, 'TN04AS3013', 'Load', '11', '2018-04-01', 'Chennai', 'Tiruvannamalai', '14'),
(32, 1, 'TN04AS3034', 'HHalt', '', '2018-04-01', 'Chennai', '', ''),
(33, 1, 'TN04AS3452', 'HHalt', '', '2018-04-01', 'Chennai', '', '2'),
(34, 1, 'TN04AS3468', 'HHalt', '', '2018-04-01', 'Chennai', '', ''),
(35, 1, 'TN04AS3958', 'Load', '12', '2018-04-01', 'Chennai', 'Sriperumbudur', '24'),
(36, 1, 'TN04AQ5191', 'Load', '13', '2018-04-01', 'Chennai', 'Gummidipoondi', '11'),
(37, 1, 'TN04AR3568', 'Load', '14', '2018-04-01', 'Chennai', 'Gummidipoondi', '1'),
(38, 1, 'TN21L9196', 'HHalt', '', '2018-04-02', 'Chennai', '', '13'),
(39, 1, 'TN21AY3063', 'Returnemp', '1', '2018-04-02', 'Coimbatore', 'Chennai', '7'),
(40, 1, 'TN19Z8350', 'Accident', 'NULL', '2018-04-02', 'Chennai', '', ''),
(41, 1, 'TN19Z8615', 'Load', '15', '2018-04-02', 'Chennai', 'Tiruvarur', '58'),
(42, 1, 'TN19T2254', 'Load', '16', '2018-06-08', 'Cachar', 'Chamoli', '23'),
(43, 1, 'TN19U4073', 'Load', '17', '2018-06-08', 'Central Delhi', 'Saharanpur', '3'),
(44, 1, 'TN19U4088', 'Load', '18', '2018-06-08', 'Central Delhi', 'Sabarkantha', '14'),
(45, 1, 'TN19U0036', 'Load', '19', '2018-06-08', 'Sabarkantha', 'Agar', '7'),
(46, 1, 'TN19U0036', 'Load', '19', '2018-06-08', 'Sabarkantha', 'Agar', '7'),
(47, 1, 'TN19U0036', 'Load', '19', '2018-06-08', 'Sabarkantha', 'Agar', '7'),
(48, 1, 'TN19U4092', 'Load', '20', '2018-06-08', 'Cachar', 'Sagar', '26'),
(49, 1, 'TN21K5958', 'Load', '21', '2018-06-08', 'Cachar', 'Adilabad', '50'),
(50, 1, 'TN19U0299', 'Load', '22', '2018-06-08', 'East Delhi', 'Sagar', '14'),
(51, 1, 'TN21AY3063', 'HHalt', '', '2018-04-01', 'Chennai', '', '2'),
(52, 1, 'TN21L9196', 'HHalt', '', '2018-04-01', 'Chennai', '', '3'),
(53, 1, 'TN21L9196', 'HHalt', '', '2018-04-01', 'Chennai', '', '24'),
(54, 1, 'TN21AY3063', 'HHalt', '', '2018-04-01', 'Chennai', '', '16'),
(55, 1, 'TN04AS2178', 'Returnemp', '8', '2018-06-13', 'Gummidipoondi', 'Chennai', '8'),
(56, 1, 'TN04AS2218', 'Load', '23', '2018-06-18', 'Chennai', 'Vellore', '14'),
(57, 1, 'TN04AS2218', 'OnRoad', '23', '2018-06-18', 'Chennai', 'Vellore', '14'),
(58, 1, 'TN04AS2218', 'Returnemp', '23', '2018-06-18', 'Vellore', 'Chennai', '14'),
(59, 1, 'TN04AS3105', 'Load', '24', '2018-07-17', 'Agra', 'Chennai', '1'),
(60, 1, 'TN04AS3105', 'Returnemp', '24', '2018-07-17', 'Chennai', 'Agra', '1'),
(61, 1, 'TN19Z8636', 'Parking', '', '2018-07-24', '', '', ''),
(62, 1, 'TN19U0372', 'Load', '25', '2018-07-21', '', '', '13'),
(63, 1, 'TN19U0372', 'Load', '25', '2018-07-21', '', '', '13'),
(64, 1, 'TN04AS4248', 'Load', '26', '2018-08-04', 'Chennai', 'Bangalore Rural', '6'),
(65, 1, 'TN04AS3468', 'Load', '27', '2018-08-04', 'Chikkamagaluru', 'Chennai', '58'),
(66, 1, 'TN19U0181', 'Load', '28', '2018-08-13', 'Morigao', 'Madhepura', '4'),
(67, 1, 'TN19U0181', 'Return', '28', '2018-08-13', 'Madhepura', 'Morigao', ''),
(68, 1, 'TN19U0181', 'OnRoad', '28', '2018-08-13', 'Morigao', 'Madhepura', '4'),
(69, 1, 'TN19U0181', 'HHalt', '', '2018-08-13', 'Chennai', '', '4'),
(70, 1, 'TN21L9196', 'Load', '29', '2018-08-13', 'Chennai', 'Coimbatore', '1'),
(71, 1, 'TN19U0372', 'OnRoad', '25', '2018-08-12', '', '', '3'),
(72, 1, 'TN19U0181', 'Load', '30', '2018-08-14', '', '', '4'),
(73, 1, 'TN21AY3063', 'Load', '31', '2018-08-14', 'Chennai', 'Tapi', '7'),
(74, 1, 'TN21AY3063', 'OnRoad', '31', '2018-08-14', 'Chennai', 'Tapi', '8'),
(75, 1, 'TN04AS2218', 'Load', '32', '2018-08-16', 'Chennai', 'Tiruchirappalli', '14'),
(76, 1, 'TN04AS3114', 'Load', '33', '2018-08-22', 'Thiruvananthapuram', 'Chennai', '62');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `vechNo` varchar(30) NOT NULL,
  `vechmake` varchar(30) NOT NULL,
  `vechtype` varchar(30) NOT NULL,
  `bdytype` varchar(30) NOT NULL,
  `cc` varchar(30) NOT NULL,
  `manu_year` varchar(30) NOT NULL,
  `seatiing_capcity` varchar(30) NOT NULL,
  `chasisNum` varchar(30) NOT NULL,
  `engno` varchar(30) NOT NULL,
  `fuel_type` varchar(30) NOT NULL,
  `fule_capcity` varchar(30) NOT NULL,
  `vech_usage` varchar(30) NOT NULL,
  `vechOwner` varchar(50) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `intAdminId` int(50) NOT NULL,
  `vechcode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechNo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechOwner` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chasisNum` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `engno` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gvw` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tyrenos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechmake` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdytype` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechtype` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vechcolour` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permitNum` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perValDte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fcValdte` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit2` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per2valdte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rdtaxval` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policyNum` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `policyValDte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscopy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fccopy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rccopy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit1doc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permit2doc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roadtaxcpy` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `current_kms` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `intAdminId`, `vechcode`, `vechNo`, `vechOwner`, `chasisNum`, `engno`, `gvw`, `tyrenos`, `vechmake`, `bdytype`, `vechtype`, `vechcolour`, `permitNum`, `perValDte`, `fcValdte`, `permit2`, `per2valdte`, `rdtaxval`, `insurance`, `policyNum`, `policyValDte`, `inscopy`, `fccopy`, `rccopy`, `permit1doc`, `permit2doc`, `roadtaxcpy`, `created_at`, `updated_at`, `current_kms`) VALUES
(2, 18, '13622', 'TN21K5958', 'ASS Roadways', '40LC5F002603', 'E683CD5F007865', '25000', '10', 'Eicher Motors Ltd', 'Skeleton', '3025', 'Brown', '133/TN19/GV/2012', '01/02/2022', '11/04/2019', '254/PY/GV/2017', '01/02/2022', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0435670000101', '30/11/2018', '2_TN 21 K 5958_4.jpg', '2_TN 21 K 5958_6.jpg', '2_TN 21 K 5958_1.jpg', '2_TN 21 K 5958_3.jpg', '2_TN 21 K 5958_2.jpg', '2_5958.pdf', NULL, NULL, '400000'),
(3, 18, '01709', 'TN21L9196', 'ASS Roadways', '40LC5F002590', 'E683CD5E007841', '25000', '10', 'Eicher Motors Ltd', 'Skeleton', '3025', 'Brown', '1037/TN19/GV/2016', '26/09/2021', '09/05/2018', '36/PY/GV/2017', '26/09/2021', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0470033000100', '07/08/2018', '3_TN 21 L 9196_5.jpg', '3_TN 21 L 9196_2.jpg', '3_TN 21 L 9196_1.jpg', '3_TN 21 L 9196_3.jpg', '3_TN 21 L 9196_4.jpg', '', NULL, NULL, '400000'),
(4, 18, '03046', 'TN21AY3063', 'ASS Roadways', '40KF7G005434', 'E683CD7G016969', '25000', '10', 'Eicher Motors Ltd', 'Skeleton', '3025', 'Yellow', '1214/TN/19/GV/2011', '09/10/2021', '05/12/2018', '37/PY/GV/2011', '09/10/2021', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0470037000100', '10/08/2018', '4_TN 21 AY 3063_3.jpg', '4_TN 21 AY 3063_2.jpg', '4_TN 21 AY 3063_1.jpg', '4_TN 21 AY 3063_4.jpg', '4_TN 21 AY 3063_5.jpg', '4_3063.pdf', NULL, NULL, ''),
(5, 18, '03862', 'TN19Z8350', 'ASS Roadways', 'MB1CMDWC1AEVC6494', 'VAE122739Z', '25000', '10', 'Ashok Leyland Ltd.', 'Skeleton', '2214', 'Yellow', '598/TN19/GV/2015', '12/07/2020', '24/07/2018', '661/PY/GV/2015', '12/07/2020', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0458746000100', '28/04/2018', '5_TN 21 AY 3063_3.jpg', '5_TN 21 AY 3063_2.jpg', '5_TN 21 AY 3063_1.jpg', '5_TN 21 AY 3063_4.jpg', '5_TN 21 AY 3063_5.jpg', '5_8350.pdf', NULL, NULL, '400000'),
(6, 18, '04485', 'TN19U0181', 'ASS Roadways', 'MEC2241CKEP011932', '400950D0012147', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '61/TN19/NP/2014', '02/12/2019', '26/11/2018', 'NP/TN/19/112017/76766', '19/11/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0481128000100', '28/10/2018', '6_TN 19 U 0181_5.jpg', '6_TN 19 U 0181_2.jpg', '6_TN 19 U 0181_1.jpg', '6_TN 19 U 0181_3.jpg', '6_TN 19 U 0181_4.jpg', '6_TN 19 U 0181 - Tax.pdf', NULL, NULL, '350000'),
(7, 18, '05146', 'TN19U0372', 'ASS Roadways', 'MEC2241CKEP011988', '400950D0012216', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '62/TN19/NP/2014', '08/12/2019', '05/12/2018', 'NP/TN/19/122017/11875', '02/12/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0482725000100', '06/11/2018', '7_TN 19 U 0372_5.jpg', '7_TN 19 U 0372_2.jpg', '7_TN 19 U 0372_1.jpg', '7_TN 19 U 0372_3.jpg', '7_TN 19 U 0372_4.jpg', '7_TN 19 U 0372 - Tax.pdf', NULL, NULL, '35000'),
(8, 18, '08659', 'TN04AS2155', 'ASS Roadways', 'MEC2971CFGP032023', '400950D0032019', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '678/TN04/NP/2016', '28/11/2021', '27/11/2018', 'NP/TN/4/122017/39359', '28/11/2018', '30/06/2018', 'Reliance General Insurance', '120321723340010431', '15/11/2018', '8_TN 04 AS 2155_4.jpg', '', '8_TN 04 AS 2155_1.jpg', '8_TN 04 AS 2155_2.jpg', '8_TN 04 AS 2155_3.jpg', '8_2155.pdf', NULL, NULL, '150000'),
(9, 18, '09742', 'TN04AS2178', 'ASS Roadways', 'MEC2971CFGP032029', '400950D0032020', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '679/TN04/NP/2016', '29/11/2021', '27/11/2018', 'NP/TN/4/122017/40480', '29/11/2018', '30/06/2018', 'Reliance General Insurance', '120321723340010428', '15/11/2018', '9_TN 04 AS 2155_4.jpg', '', '9_TN 04 AS 2155_1.jpg', '9_TN 04 AS 2155_2.jpg', '9_TN 04 AS 2155_3.jpg', '9_2178.pdf', NULL, NULL, '150000'),
(10, 18, '10360', 'TN04AS2218', 'ASS Roadways', 'MEC2971CFGP032064', '400950D0032053', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '676/TN04/NP/2016', '28/11/2021', '27/11/2018', 'NP/TN/4/122017/39348', '28/11/2018', '30/06/2018', 'Reliance General Insurance', '120321723340010420', '15/11/2018', '10_TN 04 AS 2218_4.jpg', '', '10_TN 04 AS 2218_1.jpg', '10_TN 04 AS 2218_2.jpg', '10_TN 04 AS 2218_3.jpg', '10_2218.pdf', NULL, NULL, '150000'),
(11, 18, '11016', 'TN04AS3013', 'ASS Roadways', 'MEC2621CKFP023074', '400950D0023216', '40200', '18', 'Daimler India Commercial Vehicles Pvt. Ltd.', '20 Feet Trailer Skeleton', '4023TT', 'White', '733/TN04/NP/2016', '29/12/2021', '27/12/2018', 'NP/TN/4/122017/81237', '29/12/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0485096000100', '24/11/2018', '11_TN 04 AS 3013_4.jpg', '', '11_TN 04 AS 3013_1.jpg', '11_TN 04 AS 3013_2.jpg', '11_TN 04 AS 3013_3.jpg', '11_3013.pdf', NULL, NULL, '150000'),
(12, 18, '11343', 'TN04AS3034', 'ASS Roadways', 'MEC2621CKFP023066', '400950D0023211', '40200', '18', 'Daimler India Commercial Vehicles Pvt. Ltd.', '20 Feet Trailer Skeleton', '4023TT', 'White', '734/TN04/NP/2016', '29/12/2021', '27/12/2018', 'NP/TN/4/122017/81207', '29/12/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0485090000100', '24/11/2018', '12_3034 Insurance.pdf', '', '12_TN 04 AS 3034_1.jpg', '12_TN 04 AS 3034_2.jpg', '12_TN 04 AS 3034_3.jpg', '12_3034.pdf', NULL, NULL, ''),
(13, 18, '14315', 'TN04AS3452', 'ASS Roadways', 'MEC2621CKFP022979', '400950D0023167', '40200', '18', 'Daimler India Commercial Vehicles Pvt. Ltd.', '20 Feet Trailer Skeleton', '4023TT', 'White', '22/TN04/NP/2017', '11/01/2022', '09/01/2019', 'NP/TN/4/012018/86198', '11/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0485093000100', '24/11/2018', '13_3452 Insurance.pdf', '', '13_TN 04 AS 3452_1.jpg', '13_TN 04 AS 3452_2.jpg', '13_TN 04 AS 3452 - NP.pdf', '13_3452.pdf', NULL, NULL, '150000'),
(14, 18, '14761', 'TN04AS3468', 'ASS Roadways', 'MEC2621CKFP022981', '400950D0023168', '40200', '18', 'Daimler India Commercial Vehicles Pvt. Ltd.', '20 Feet Trailer Skeleton', '4023TT', 'White', '23/TN04/NP/2017', '11/01/2022', '09/01/2019', 'NP/TN/4/012018/86161', '11/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0485091000100', '24/11/2018', '14_3468 Insurance.pdf', '', '14_TN 04 AS 3468_1.jpg', '14_TN 04 AS 3468_2.jpg', '14_TN 04 AS 3468 - NP.pdf', '14_3468.pdf', NULL, NULL, '150000'),
(15, 18, '16926', 'TN04AS3521', 'ASS Roadways', 'MEC2971CGFP020548', '400950D0020739', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '34/TN04/NP/2017', '18/01/2022', '10/01/2019', 'NP/TN/4/012018/86201', '18/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0489123000100', '05/05/2018', '15_TN 04 AS 3521_4.jpg', '', '15_TN 04 AS 3521_1.jpg', '15_TN 04 AS 3521_2.jpg', '15_TN 04 AS 3521 - NP.pdf', '15_3521.pdf', NULL, NULL, '150000'),
(16, 18, '17359', 'TN04AS3958', 'ASS Roadways', 'MECS2621CKFP022971', '400950D0023158', '40200', '18', 'Daimler India Commercial Vehicles Pvt. Ltd.', '40 Feet Trailer Skeleton', '4023TT', 'White', '51/TN04/NP/2017', '01/02/2022', '26/01/2019', 'NP/TN/4/122017/79780', '01/02/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0485089000100', '24/11/2018', '16_3958 Insurance.pdf', '', '16_TN 04 AS 3958_1.jpg', '16_TN 04 AS 3958_2.jpg', '16_TN 04 AS 3958_3.jpg', '16_3958.pdf', NULL, NULL, '150000'),
(17, 18, '18024', 'TN04AS4248', 'ASS Roadways', 'MECS2241CHFP021202', '400950D0021424', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '60/TN04/NP/2017', '06/02/2022', '02/02/2019', 'NP/TN/4/022018/27907', '06/02/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0494204000100', '20/01/2019', '17_4248 Insurance .pdf', '', '17_TN 04 AS 4248_1.jpg', '17_TN 04 AS 4248_2.jpg', '17_TN 04 AS 4248 - NP.pdf', '17_4248.pdf', NULL, NULL, '150000'),
(18, 19, '20207', 'TN19Z8615', 'ASS Roadways - Suresh', 'MB1CMDWC9ARTB6170', 'TAH623307', '25000', '10', 'Ashok Leyland Ltd', 'Skeleton', '2214', 'Yellow', '968/TN19/GV/2012', '13/07/2022', '06/08/2018', '578/PY/GV/2017', '13/07/2022', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0459380000100', '03/05/2018', '18_TN 19 Z 8615_5.jpg', '18_TN 19 Z 8615_2.jpg', '18_TN 19 Z 8615_1.jpg', '18_TN 19 Z 8615_3.jpg', '18_TN 19 Z 8615_4.jpg', '18_8615.pdf', NULL, NULL, '400000'),
(19, 19, '21256', 'TN19Z8636', 'ASS Roadways - Suresh', 'MB1CMDWC4ARTB6965', 'TAE123562Z', '25000', '10', 'Ashok Leyland Ltd', 'Skeleton', '2214', 'Yellow', '967/TN19/GV/2012', '13/07/2022', '28/06/2018', '579/PY/GV/2017', '13/07/2022', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0459378000100', '03/05/2018', '19_TN 19 Z 8636_4.jpg', '19_TN 19 Z 8636_5.jpg', '19_TN 19 Z 8636_1.jpg', '19_TN 19 Z 8636_2.jpg', '19_TN 19 Z 8636_3.jpg', '19_8636.pdf', NULL, NULL, '400000'),
(20, 19, '22231', 'TN19Y2752', 'ASS Roadways - Suresh', 'MAT466375A2N26293', 'O1L62947895', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Yellow', '141/TN19/GV/2014', '10/02/2019', '30/01/2019', '465/PY/GV/2014', '10/02/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0436346000101', '07/12/2018', '20_TN 19 Y 2752_6.jpg', '20_TN 19 Y 2752_2.jpg', '20_TN 19 Y 2752_1.jpg', '20_TN 19 Y 2752_5.jpg', '20_TN 19 Y 2752_3.jpg', '20_TN 19 Y 2752 - Tax.pdf', NULL, NULL, '400000'),
(21, 19, '22749', 'TN19Y3057', 'ASS Roadways - Suresh', 'MAT466383A2P28835', 'B591803101M62960162', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Yellow', '209/TN19/GV/2018', '27/02/2023', '20/02/2019', '209/PY/GV/2018', '27/02/2023', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0438305000101', '23/12/2018', '21_TN 19 Y 3057_6.jpg', '21_TN 19 Y 3057_2.jpg', '21_TN 19 Y 3057_1.jpg', '21_TN 19 Y 3057_3.jpg', '21_TN 19 Y 3057_4.jpg', '21_3057.pdf', NULL, NULL, '400000'),
(22, 19, '23460', 'TN19U0036', 'ASS Roadways - Suresh', 'MEC2241CKEP011868', '400950D0012091', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '59/TN19/NP/2014', '20/11/2019', '15/11/2018', 'NP/TN/19/112017/73649', '19/11/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0481230000100', '28/10/2018', '22_TN 19 U 0036_5.jpg', '22_TN 19 U 0036_2.jpg', '22_TN 19 U 0036_1.jpg', '22_TN 19 U 0036_3.jpg', '22_TN 19 U 0036_4.jpg', '22_TN 19 U 0036 - Tax.pdf', NULL, NULL, '350000'),
(23, 19, '24164', 'TN19U0054', 'ASS Roadways - Suresh', 'MEC2241CJEP010853', '400950D0011063', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '58/TN19/NP/2014', '20/11/2019', '05/11/2018', 'NP/TN/19/112017/76765', '19/11/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0481115000100', '28/10/2018', '23_TN 19 U 0054_5.jpg', '23_TN 19 U 0054_2.jpg', '23_TN 19 U 0054_1.jpg', '23_TN 19 U 0054_3.jpg', '23_TN 19 U 0054_4.jpg', '23_TN 19 U 0054 - Tax.pdf', NULL, NULL, '350000'),
(24, 19, '24747', 'TN19U0299', 'ASS Roadways - Suresh', 'MEC2241CKEP011997', '400950D0012224', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '63/TN19/NP/2014', '08/12/2019', '05/12/2018', 'NP/TN/19/122017/11876', '02/12/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0482708000100', '06/11/2018', '24_TN 19 U 0299_5.jpg', '24_TN 19 U 0299_2.jpg', '24_TN 19 U 0299_1.jpg', '24_TN 19 U 0299_3.jpg', '24_TN 19 U 0299_4.jpg', '24_TN 19 U 0299 - Tax.pdf', NULL, NULL, '350000'),
(25, 19, '25312', 'TN19U0490', 'ASS Roadways - Suresh', 'MEC2241CJEP011469', '400950D0011679', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '64/TN19/NP/2014', '08/12/2019', '18/12/2018', 'NP/TN/19/122017/24690', '02/12/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0483548000100', '13/11/2018', '25_TN 19 U 0490_5.jpg', '25_TN 19 U 0490_2.jpg', '25_TN 19 U 0490_1.jpg', '25_TN 19 U 0490_3.jpg', '25_TN 19 U 0490_4.jpg', '25_TN 19 U 0490 - Tax.pdf', NULL, NULL, '350000'),
(26, 22, '26213', 'TN19U3956', 'ASS Roadways - Renuka', 'MAT466388F2C03742', '51C63427086', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Brown', '228/TN04/NP/2017', '24/04/2022', '29/04/2019', 'NP/TN/4/042018/111206', '24/04/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0458673000100', '27/04/2018', '26_TN 19 U 3956_5.jpg', '26_TN 19 U 3956_2.jpg', '26_TN 19 U 3956_1.jpg', '26_TN 19 U 3956_3.jpg', '26_TN 19 U 3956_4.jpg', '26_3956.pdf', NULL, NULL, '300000'),
(27, 20, '04853', 'TN19U3983', 'ASS Roadways - Banu', 'MAT466388F2C03779', '51B63426720', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Brown', '229/TN04/NP/2017', '24/04/2022', '29/04/2019', 'NP/TN/4/042018/111215', '24/04/2019', '30/06/2018', 'Shriram General Insurance Company Ltd.', '10003/31/19/040414', '15/04/2019', '27_TN 19 U 3983_5.jpg', '27_TN 19 U 3983_2.jpg', '27_TN 19 U 3983_1.jpg', '27_TN 19 U 3983_3.jpg', '27_TN 19 U 3983_4.jpg', '27_3983.pdf', NULL, NULL, '300000'),
(28, 20, '05608', 'TN19U4073', 'ASS Roadways - Banu', 'MAT466388F1C05904', '51C634291180', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Brown', '244/TN04/NP/2017', '01/05/2022', '24/04/2019', 'NP/TN/4/042017/94583', '01/05/2018', '30/06/2018', 'Shriram General Insurance Company Ltd.', '10003/31/19/040395', '15/04/2019', '28_TN 19 U 4073_6.jpg', '28_TN 19 U 4073_2.jpg', '28_TN 19 U 4073_1.jpg', '28_TN 19 U 4073_5.jpg', '28_TN 19 U 4073_4.jpg', '28_TN 19 U 4073_3.jpg', NULL, NULL, '300000'),
(29, 20, '06089', 'TN19U4088', 'ASS Roadways - Banu', 'MAT466388F10C05905', '51C63429183', '31000', '12', 'Tata Motors Ltd.', 'Skeleton', '3118', 'Brown', '228/TN04/NP/2017', '26/04/2022', '04/05/2018', 'NP/TN/4/042018/111201', '26/04/2019', '30/06/2018', 'Shriram General Insurance Company Ltd.', '10003/31/19/040395', '15/04/2019', '', '', '', '', '29_TN 19 U 4088_1.jpg', '29_4088.pdf', NULL, NULL, '300000'),
(30, 20, '07158', 'TN19T2264', 'ASS Roadways - Banu', 'MEC2971CCGP027927 ', '400950D0027960', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '228/TN04/NP/2017', '11/04/2018', '22/04/2019', 'NP/TN/4/042018/111201', '11/04/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0454588000101', '30/03/2019', '30_VGC0454588000101.pdf', '30_TN 19 Y 2264_1.jpg', '', '', '', '30_2264.pdf', NULL, NULL, '250000'),
(31, 21, '08091', 'TN19U4092', 'ASS Roadways - Uma', 'MB1KADYC6FECR5513', 'FCEZ405628', '25000', '12', 'Ashok Leyland Ltd', 'Skeleton', '3116XL', 'Brown', '264/TN04/NP/2017', '07/05/2022', '24/04/2019', 'NP/TN/4/052017/20399', '07/05/2018', '30/06/2018', 'Shriram General Insurance Company Ltd.', '10003/31/19/041623', '16/04/2019', '31_TN 19 U 4092_6.jpg', '31_TN 19 U 4092_2.jpg', '31_TN 19 U 4092_1.jpg', '31_TN 19 U 4092_4.jpg', '31_TN 19 U 4092_5.jpg', '31_TN 19 U 4092_3.jpg', NULL, NULL, '300000'),
(32, 21, '08614', 'TN19U4101', 'ASS Roadways - Uma', 'MB1KADYC5FECR5499', 'FCEZ405626', '31000', '12', 'Ashok Leyland Ltd', 'Skeleton', '3116XL', 'Brown', '275/TN04/NP/2017', '22/05/2022', '24/04/2019', 'NP/TN/4/052017/58248', '22/05/2018', '30/06/2018', 'Shriram General Insurance Company Ltd.', '10003/31/19/041640', '16/04/2019', '32_TN 19 U 4101_4.jpg', '32_TN 19 U 4101_6.jpg', '32_TN 19 U 4101_1.jpg', '32_TN 19 U 4101_3.jpg', '32_TN 19 U 4101_2.jpg', '32_TN 19 U 4101_5.jpg', NULL, NULL, '300000'),
(33, 21, '09673', 'TN19T2254', 'ASS Roadways - Uma', 'MEC2971CCGP027907', '400950D0027935', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '228/TN04/NP/2017', '11/04/2018', '11/04/2018', 'NP/TN/4/042017/94583', '11/04/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0454624000101', '30/03/2019', '33_VGC0454624000101.pdf', '', '', '', '', '33_2254.pdf', NULL, NULL, '300000'),
(34, 23, '10653', 'TN04AS3105', 'ASSL Trans', 'MC2M7SRC0GL000324', 'VEDX5315196A1P', '37000', '14', 'VE Commercial Vehicles Ltd', 'Skeleton', '6037S', 'Brown', '16/TN04/NP/2017', '04/01/2022', '01/01/2019', 'NP/TN/4/012018/30462', '04/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0486943000100', '07/12/2018', '34_TN 04 AS 3105_4.jpg', '', '34_TN 04 AS 3105_1.jpg', '34_TN 04 AS 3105_2.jpg', '34_TN 04 AS 3105_3.jpg', '34_3105.pdf', NULL, NULL, '100000'),
(35, 23, '11168', 'TN04AS3114', 'ASSL Trans', 'MC2M7SRC0GL000325', 'VEDX5315199A1P', '37000', '14', 'VE Commercial Vehicles Ltd', 'Skeleton', '6037S', 'Brown', '15/TN04/NP/2017', '04/01/2022', '01/01/2019', 'NP/TN/4/012018/30602', '04/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0486940000100', '07/12/2018', '35_TN 04 AS 3114_4.jpg', '', '35_TN 04 AS 3114_1.jpg', '35_TN 04 AS 3114_2.jpg', '35_TN 04 AS 3114 - NP.pdf', '35_3114.pdf', NULL, NULL, '150000'),
(36, 23, '11703', 'TN04AS3127', 'ASSL Trans', 'MC2M7SRC0GL000328', 'VEDX5315208A1P', '37000', '14', 'VE Commercial Vehicles Ltd', 'Skeleton', '6037S', 'Brown', '14/TN04/NP/2017', '04/01/2022', '01/01/2019', 'NP/TN/4/012018/30583', '04/01/2019', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0486942000100', '07/12/2018', '36_TN 04 AS 3127_4.jpg', '', '36_TN 04 AS 3127_1.jpg', '36_TN 04 AS 3127_2.jpg', '36_TN 04 AS 3127 - NP.pdf', '36_3127.pdf', NULL, NULL, '150000'),
(37, 24, '12731', 'TN04AQ5191', 'ASS Roadways - Magesh', 'MEC2241CFFP019324', '400950D0019659', '31000', '12', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3123R', 'Brown', '527/TN04/NP/2015', '29/10/2020', '14/11/2018', 'NP/TN/4/112017/53390', '29/10/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0478851000100', '11/10/2018', '37_TN 04 AQ 5191_5.jpg', '37_TN 04 AQ 5191_2.jpg', '37_TN 04 AQ 5191_1.jpg', '37_TN 04 AQ 5191_3.jpg', '37_TN 04 AQ 5191_4.jpg', '37_5191.pdf', NULL, NULL, '300000'),
(38, 24, '13372', 'TN04AR3568', 'ASS Roadways - Magesh', 'MEC2971CDGP029244', '400950D0029260', '37000', '14', 'Daimler India Commercial Vehicles Pvt. Ltd.', 'Skeleton', '3723R', 'Brown', '337/TN04/NP/2016', '26/05/2021', '24/05/2018', 'NP/TN/4/082017/79159', '26/05/2018', '30/06/2018', 'Royal Sundaram General Insurance Co. Ltd.', 'VGC0436346000101', '09/05/2018', '', '', '38_TN 04 AS 3568_1.jpg', '38_TN 04 AS 3568_2.jpg', '38_TN 04 AS 3568_3.jpg', '38_3568.pdf', NULL, NULL, '200000'),
(39, 18, '11864', '234', 'ASS Roadways', '235235', '235235', '235235', '235', '325', '23', '325', '53', '235', '07/08/2018', '07/08/2018', '325', '07/08/2018', '07/08/2018', '325', '325', '07/08/2018', '', '', '39_Penguins.jpg', '', '', '', NULL, NULL, '325');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `ledger_id` varchar(50) NOT NULL,
  `ent_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `pay_mode` varchar(50) NOT NULL,
  `pay_type` varchar(50) NOT NULL,
  `bank_details` varchar(50) NOT NULL,
  `cheque_no` varchar(50) NOT NULL,
  `closing_bal` decimal(10,0) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `acc_inv` varchar(50) NOT NULL,
  `trans_detail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voucher_type`
--

CREATE TABLE `voucher_type` (
  `id` int(20) NOT NULL,
  `intAdminId` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ent_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher_type`
--

INSERT INTO `voucher_type` (`id`, `intAdminId`, `name`, `ent_date`) VALUES
(1, 1, 'Advance Amount', '2018-06-08'),
(2, 1, 'Tollplaza', '2018-06-26'),
(3, 1, 'Reliance Tyre', '2018-08-13'),
(4, 1, 'Payment', '2018-08-14'),
(5, 1, 'Diesel', '2018-08-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_voucher`
--
ALTER TABLE `account_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assl_transentries`
--
ALTER TABLE `assl_transentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `assl_transentryitems`
--
ALTER TABLE `assl_transentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `assl_transentrytypes`
--
ALTER TABLE `assl_transentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assl_transgroups`
--
ALTER TABLE `assl_transgroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `assl_transledgers`
--
ALTER TABLE `assl_transledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `assl_translogs`
--
ALTER TABLE `assl_translogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assl_transsettings`
--
ALTER TABLE `assl_transsettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assl_transtags`
--
ALTER TABLE `assl_transtags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `assreferences`
--
ALTER TABLE `assreferences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ass_roadwaysentries`
--
ALTER TABLE `ass_roadwaysentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadwaysentryitems`
--
ALTER TABLE `ass_roadwaysentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadwaysentrytypes`
--
ALTER TABLE `ass_roadwaysentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadwaysgroups`
--
ALTER TABLE `ass_roadwaysgroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadwaysledgers`
--
ALTER TABLE `ass_roadwaysledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadwayslogs`
--
ALTER TABLE `ass_roadwayslogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadwayssettings`
--
ALTER TABLE `ass_roadwayssettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadwaystags`
--
ALTER TABLE `ass_roadwaystags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_banuentries`
--
ALTER TABLE `ass_roadways_-_banuentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadways_-_banuentryitems`
--
ALTER TABLE `ass_roadways_-_banuentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadways_-_banuentrytypes`
--
ALTER TABLE `ass_roadways_-_banuentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_banugroups`
--
ALTER TABLE `ass_roadways_-_banugroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadways_-_banuledgers`
--
ALTER TABLE `ass_roadways_-_banuledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadways_-_banulogs`
--
ALTER TABLE `ass_roadways_-_banulogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_banusettings`
--
ALTER TABLE `ass_roadways_-_banusettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_banutags`
--
ALTER TABLE `ass_roadways_-_banutags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_mageshentries`
--
ALTER TABLE `ass_roadways_-_mageshentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadways_-_mageshentryitems`
--
ALTER TABLE `ass_roadways_-_mageshentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadways_-_mageshentrytypes`
--
ALTER TABLE `ass_roadways_-_mageshentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_mageshgroups`
--
ALTER TABLE `ass_roadways_-_mageshgroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadways_-_mageshledgers`
--
ALTER TABLE `ass_roadways_-_mageshledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadways_-_mageshlogs`
--
ALTER TABLE `ass_roadways_-_mageshlogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_mageshsettings`
--
ALTER TABLE `ass_roadways_-_mageshsettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_mageshtags`
--
ALTER TABLE `ass_roadways_-_mageshtags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_renukaentries`
--
ALTER TABLE `ass_roadways_-_renukaentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadways_-_renukaentryitems`
--
ALTER TABLE `ass_roadways_-_renukaentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadways_-_renukaentrytypes`
--
ALTER TABLE `ass_roadways_-_renukaentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_renukagroups`
--
ALTER TABLE `ass_roadways_-_renukagroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadways_-_renukaledgers`
--
ALTER TABLE `ass_roadways_-_renukaledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadways_-_renukalogs`
--
ALTER TABLE `ass_roadways_-_renukalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_renukasettings`
--
ALTER TABLE `ass_roadways_-_renukasettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_renukatags`
--
ALTER TABLE `ass_roadways_-_renukatags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_sureshentries`
--
ALTER TABLE `ass_roadways_-_sureshentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadways_-_sureshentryitems`
--
ALTER TABLE `ass_roadways_-_sureshentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadways_-_sureshentrytypes`
--
ALTER TABLE `ass_roadways_-_sureshentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_sureshgroups`
--
ALTER TABLE `ass_roadways_-_sureshgroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadways_-_sureshledgers`
--
ALTER TABLE `ass_roadways_-_sureshledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadways_-_sureshlogs`
--
ALTER TABLE `ass_roadways_-_sureshlogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_sureshsettings`
--
ALTER TABLE `ass_roadways_-_sureshsettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_sureshtags`
--
ALTER TABLE `ass_roadways_-_sureshtags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_umaentries`
--
ALTER TABLE `ass_roadways_-_umaentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `ass_roadways_-_umaentryitems`
--
ALTER TABLE `ass_roadways_-_umaentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `ass_roadways_-_umaentrytypes`
--
ALTER TABLE `ass_roadways_-_umaentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_umagroups`
--
ALTER TABLE `ass_roadways_-_umagroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `ass_roadways_-_umaledgers`
--
ALTER TABLE `ass_roadways_-_umaledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ass_roadways_-_umalogs`
--
ALTER TABLE `ass_roadways_-_umalogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_umasettings`
--
ALTER TABLE `ass_roadways_-_umasettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ass_roadways_-_umatags`
--
ALTER TABLE `ass_roadways_-_umatags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_records`
--
ALTER TABLE `bank_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consignees`
--
ALTER TABLE `consignees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consigners`
--
ALTER TABLE `consigners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contra_entries`
--
ALTER TABLE `contra_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_bill_det`
--
ALTER TABLE `customer_bill_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dieseldetails`
--
ALTER TABLE `dieseldetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dieseldetails_gcentry_id_foreign` (`gcentry_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`DistCode`),
  ADD KEY `StCode` (`StCode`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver_mgt`
--
ALTER TABLE `driver_mgt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `entryitems`
--
ALTER TABLE `entryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `entrytypes`
--
ALTER TABLE `entrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `fc_details`
--
ALTER TABLE `fc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_details`
--
ALTER TABLE `finance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finance_master`
--
ALTER TABLE `finance_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freights`
--
ALTER TABLE `freights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `freights_gcentry_id_foreign` (`gcentry_id`);

--
-- Indexes for table `frieghtdetails`
--
ALTER TABLE `frieghtdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuel`
--
ALTER TABLE `fuel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gcentries`
--
ALTER TABLE `gcentries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gc_details`
--
ALTER TABLE `gc_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `group_name`
--
ALTER TABLE `group_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `halt_entry`
--
ALTER TABLE `halt_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hhalt_entry`
--
ALTER TABLE `hhalt_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hiredetails`
--
ALTER TABLE `hiredetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hiredetails_gcentry_id_foreign` (`gcentry_id`);

--
-- Indexes for table `hire_freight`
--
ALTER TABLE `hire_freight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_hire`
--
ALTER TABLE `hire_hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_load`
--
ALTER TABLE `hire_load`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_details`
--
ALTER TABLE `insurance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_master`
--
ALTER TABLE `insurance_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `journal_entries`
--
ALTER TABLE `journal_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger`
--
ALTER TABLE `ledger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `ledger_accounts`
--
ALTER TABLE `ledger_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_approval`
--
ALTER TABLE `ledger_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_det`
--
ALTER TABLE `load_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_hire`
--
ALTER TABLE `load_hire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_return`
--
ALTER TABLE `load_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `load_stat`
--
ALTER TABLE `load_stat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milage_note`
--
ALTER TABLE `milage_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `new_barath_logisticsentries`
--
ALTER TABLE `new_barath_logisticsentries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `tag_id` (`tag_id`),
  ADD KEY `entrytype_id` (`entrytype_id`);

--
-- Indexes for table `new_barath_logisticsentryitems`
--
ALTER TABLE `new_barath_logisticsentryitems`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `entry_id` (`entry_id`),
  ADD KEY `ledger_id` (`ledger_id`);

--
-- Indexes for table `new_barath_logisticsentrytypes`
--
ALTER TABLE `new_barath_logisticsentrytypes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `label` (`label`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `new_barath_logisticsgroups`
--
ALTER TABLE `new_barath_logisticsgroups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `new_barath_logisticsledgers`
--
ALTER TABLE `new_barath_logisticsledgers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `new_barath_logisticslogs`
--
ALTER TABLE `new_barath_logisticslogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `new_barath_logisticssettings`
--
ALTER TABLE `new_barath_logisticssettings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `new_barath_logisticstags`
--
ALTER TABLE `new_barath_logisticstags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `onroad_details`
--
ALTER TABLE `onroad_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opening_balance`
--
ALTER TABLE `opening_balance`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ent_id` (`ent_id`);

--
-- Indexes for table `other_exp`
--
ALTER TABLE `other_exp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_calculation`
--
ALTER TABLE `party_calculation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_payments`
--
ALTER TABLE `party_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_type`
--
ALTER TABLE `pay_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pc_entry`
--
ALTER TABLE `pc_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pindetails`
--
ALTER TABLE `pindetails`
  ADD PRIMARY KEY (`intId`);

--
-- Indexes for table `pingenerate`
--
ALTER TABLE `pingenerate`
  ADD PRIMARY KEY (`intId`);

--
-- Indexes for table `pod`
--
ALTER TABLE `pod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipt_voucher`
--
ALTER TABLE `recipt_voucher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`intId`);

--
-- Indexes for table `return_empty`
--
ALTER TABLE `return_empty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rto_entry`
--
ALTER TABLE `rto_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `sparepart_entires`
--
ALTER TABLE `sparepart_entires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sparepart_pay`
--
ALTER TABLE `sparepart_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spare_fuel_pay`
--
ALTER TABLE `spare_fuel_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StCode`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `transporters`
--
ALTER TABLE `transporters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transporter_advances`
--
ALTER TABLE `transporter_advances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transporter_billing`
--
ALTER TABLE `transporter_billing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transporter_payment`
--
ALTER TABLE `transporter_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_calculation`
--
ALTER TABLE `trip_calculation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_maintan`
--
ALTER TABLE `tyre_maintan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_master`
--
ALTER TABLE `tyre_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tyre_retreading`
--
ALTER TABLE `tyre_retreading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`intId`);

--
-- Indexes for table `vechstat`
--
ALTER TABLE `vechstat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher_type`
--
ALTER TABLE `voucher_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_voucher`
--
ALTER TABLE `account_voucher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `assl_transentries`
--
ALTER TABLE `assl_transentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assl_transentryitems`
--
ALTER TABLE `assl_transentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `assl_transentrytypes`
--
ALTER TABLE `assl_transentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assl_transgroups`
--
ALTER TABLE `assl_transgroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `assl_transledgers`
--
ALTER TABLE `assl_transledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `assl_translogs`
--
ALTER TABLE `assl_translogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assl_transtags`
--
ALTER TABLE `assl_transtags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assreferences`
--
ALTER TABLE `assreferences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadwaysentries`
--
ALTER TABLE `ass_roadwaysentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `ass_roadwaysentryitems`
--
ALTER TABLE `ass_roadwaysentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `ass_roadwaysentrytypes`
--
ALTER TABLE `ass_roadwaysentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadwaysgroups`
--
ALTER TABLE `ass_roadwaysgroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadwaysledgers`
--
ALTER TABLE `ass_roadwaysledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ass_roadwayslogs`
--
ALTER TABLE `ass_roadwayslogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadwaystags`
--
ALTER TABLE `ass_roadwaystags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banuentries`
--
ALTER TABLE `ass_roadways_-_banuentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banuentryitems`
--
ALTER TABLE `ass_roadways_-_banuentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banuentrytypes`
--
ALTER TABLE `ass_roadways_-_banuentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banugroups`
--
ALTER TABLE `ass_roadways_-_banugroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banuledgers`
--
ALTER TABLE `ass_roadways_-_banuledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banulogs`
--
ALTER TABLE `ass_roadways_-_banulogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_banutags`
--
ALTER TABLE `ass_roadways_-_banutags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshentries`
--
ALTER TABLE `ass_roadways_-_mageshentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshentryitems`
--
ALTER TABLE `ass_roadways_-_mageshentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshentrytypes`
--
ALTER TABLE `ass_roadways_-_mageshentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshgroups`
--
ALTER TABLE `ass_roadways_-_mageshgroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshledgers`
--
ALTER TABLE `ass_roadways_-_mageshledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshlogs`
--
ALTER TABLE `ass_roadways_-_mageshlogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_mageshtags`
--
ALTER TABLE `ass_roadways_-_mageshtags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukaentries`
--
ALTER TABLE `ass_roadways_-_renukaentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukaentryitems`
--
ALTER TABLE `ass_roadways_-_renukaentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukaentrytypes`
--
ALTER TABLE `ass_roadways_-_renukaentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukagroups`
--
ALTER TABLE `ass_roadways_-_renukagroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukaledgers`
--
ALTER TABLE `ass_roadways_-_renukaledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukalogs`
--
ALTER TABLE `ass_roadways_-_renukalogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_renukatags`
--
ALTER TABLE `ass_roadways_-_renukatags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshentries`
--
ALTER TABLE `ass_roadways_-_sureshentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshentryitems`
--
ALTER TABLE `ass_roadways_-_sureshentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshentrytypes`
--
ALTER TABLE `ass_roadways_-_sureshentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshgroups`
--
ALTER TABLE `ass_roadways_-_sureshgroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshledgers`
--
ALTER TABLE `ass_roadways_-_sureshledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshlogs`
--
ALTER TABLE `ass_roadways_-_sureshlogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_sureshtags`
--
ALTER TABLE `ass_roadways_-_sureshtags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umaentries`
--
ALTER TABLE `ass_roadways_-_umaentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umaentryitems`
--
ALTER TABLE `ass_roadways_-_umaentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umaentrytypes`
--
ALTER TABLE `ass_roadways_-_umaentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umagroups`
--
ALTER TABLE `ass_roadways_-_umagroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umaledgers`
--
ALTER TABLE `ass_roadways_-_umaledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umalogs`
--
ALTER TABLE `ass_roadways_-_umalogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ass_roadways_-_umatags`
--
ALTER TABLE `ass_roadways_-_umatags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bank_records`
--
ALTER TABLE `bank_records`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `consignees`
--
ALTER TABLE `consignees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consigners`
--
ALTER TABLE `consigners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contra_entries`
--
ALTER TABLE `contra_entries`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_bill_det`
--
ALTER TABLE `customer_bill_det`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_payment`
--
ALTER TABLE `customer_payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dieseldetails`
--
ALTER TABLE `dieseldetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `DistCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=662;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `driver_mgt`
--
ALTER TABLE `driver_mgt`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `entryitems`
--
ALTER TABLE `entryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `entrytypes`
--
ALTER TABLE `entrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fc_details`
--
ALTER TABLE `fc_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance_details`
--
ALTER TABLE `finance_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance_master`
--
ALTER TABLE `finance_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `freights`
--
ALTER TABLE `freights`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `frieghtdetails`
--
ALTER TABLE `frieghtdetails`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `fuel`
--
ALTER TABLE `fuel`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gcentries`
--
ALTER TABLE `gcentries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gc_details`
--
ALTER TABLE `gc_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `group_name`
--
ALTER TABLE `group_name`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `halt_entry`
--
ALTER TABLE `halt_entry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hhalt_entry`
--
ALTER TABLE `hhalt_entry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hiredetails`
--
ALTER TABLE `hiredetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hire_freight`
--
ALTER TABLE `hire_freight`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hire_hire`
--
ALTER TABLE `hire_hire`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hire_load`
--
ALTER TABLE `hire_load`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `insurance_details`
--
ALTER TABLE `insurance_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurance_master`
--
ALTER TABLE `insurance_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journal_entries`
--
ALTER TABLE `journal_entries`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger`
--
ALTER TABLE `ledger`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `ledgers`
--
ALTER TABLE `ledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `ledger_accounts`
--
ALTER TABLE `ledger_accounts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ledger_approval`
--
ALTER TABLE `ledger_approval`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `load_det`
--
ALTER TABLE `load_det`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `load_hire`
--
ALTER TABLE `load_hire`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `load_return`
--
ALTER TABLE `load_return`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `load_stat`
--
ALTER TABLE `load_stat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `milage_note`
--
ALTER TABLE `milage_note`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mode_of_payment`
--
ALTER TABLE `mode_of_payment`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `new_barath_logisticsentries`
--
ALTER TABLE `new_barath_logisticsentries`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_barath_logisticsentryitems`
--
ALTER TABLE `new_barath_logisticsentryitems`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_barath_logisticsentrytypes`
--
ALTER TABLE `new_barath_logisticsentrytypes`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `new_barath_logisticsgroups`
--
ALTER TABLE `new_barath_logisticsgroups`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `new_barath_logisticsledgers`
--
ALTER TABLE `new_barath_logisticsledgers`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `new_barath_logisticslogs`
--
ALTER TABLE `new_barath_logisticslogs`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_barath_logisticstags`
--
ALTER TABLE `new_barath_logisticstags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `onroad_details`
--
ALTER TABLE `onroad_details`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `opening_balance`
--
ALTER TABLE `opening_balance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `other_exp`
--
ALTER TABLE `other_exp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_calculation`
--
ALTER TABLE `party_calculation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `party_payments`
--
ALTER TABLE `party_payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_voucher`
--
ALTER TABLE `payment_voucher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pay_type`
--
ALTER TABLE `pay_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pc_entry`
--
ALTER TABLE `pc_entry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pindetails`
--
ALTER TABLE `pindetails`
  MODIFY `intId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pingenerate`
--
ALTER TABLE `pingenerate`
  MODIFY `intId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pod`
--
ALTER TABLE `pod`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `recipt_voucher`
--
ALTER TABLE `recipt_voucher`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `intId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `return_empty`
--
ALTER TABLE `return_empty`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rto_entry`
--
ALTER TABLE `rto_entry`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sparepart_entires`
--
ALTER TABLE `sparepart_entires`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sparepart_pay`
--
ALTER TABLE `sparepart_pay`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spare_fuel_pay`
--
ALTER TABLE `spare_fuel_pay`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transporters`
--
ALTER TABLE `transporters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transporter_advances`
--
ALTER TABLE `transporter_advances`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transporter_billing`
--
ALTER TABLE `transporter_billing`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transporter_payment`
--
ALTER TABLE `transporter_payment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `trip_calculation`
--
ALTER TABLE `trip_calculation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyre_maintan`
--
ALTER TABLE `tyre_maintan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tyre_master`
--
ALTER TABLE `tyre_master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tyre_retreading`
--
ALTER TABLE `tyre_retreading`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `intId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `vechstat`
--
ALTER TABLE `vechstat`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voucher_type`
--
ALTER TABLE `voucher_type`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assl_transentries`
--
ALTER TABLE `assl_transentries`
  ADD CONSTRAINT `assl_transentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `assl_transentrytypes` (`id`),
  ADD CONSTRAINT `assl_transentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `assl_transtags` (`id`);

--
-- Constraints for table `assl_transentryitems`
--
ALTER TABLE `assl_transentryitems`
  ADD CONSTRAINT `assl_transentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `assl_transentries` (`id`),
  ADD CONSTRAINT `assl_transentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `assl_transledgers` (`id`);

--
-- Constraints for table `assl_transgroups`
--
ALTER TABLE `assl_transgroups`
  ADD CONSTRAINT `assl_transgroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `assl_transgroups` (`id`);

--
-- Constraints for table `assl_transledgers`
--
ALTER TABLE `assl_transledgers`
  ADD CONSTRAINT `assl_transledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `assl_transgroups` (`id`);

--
-- Constraints for table `ass_roadwaysentries`
--
ALTER TABLE `ass_roadwaysentries`
  ADD CONSTRAINT `ass_roadwaysentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadwaysentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadwaysentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadwaystags` (`id`);

--
-- Constraints for table `ass_roadwaysentryitems`
--
ALTER TABLE `ass_roadwaysentryitems`
  ADD CONSTRAINT `ass_roadwaysentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadwaysentries` (`id`),
  ADD CONSTRAINT `ass_roadwaysentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadwaysledgers` (`id`);

--
-- Constraints for table `ass_roadwaysgroups`
--
ALTER TABLE `ass_roadwaysgroups`
  ADD CONSTRAINT `ass_roadwaysgroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadwaysgroups` (`id`);

--
-- Constraints for table `ass_roadwaysledgers`
--
ALTER TABLE `ass_roadwaysledgers`
  ADD CONSTRAINT `ass_roadwaysledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadwaysgroups` (`id`);

--
-- Constraints for table `ass_roadways_-_banuentries`
--
ALTER TABLE `ass_roadways_-_banuentries`
  ADD CONSTRAINT `ass_roadways_-_banuentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadways_-_banuentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadways_-_banuentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadways_-_banutags` (`id`);

--
-- Constraints for table `ass_roadways_-_banuentryitems`
--
ALTER TABLE `ass_roadways_-_banuentryitems`
  ADD CONSTRAINT `ass_roadways_-_banuentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadways_-_banuentries` (`id`),
  ADD CONSTRAINT `ass_roadways_-_banuentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadways_-_banuledgers` (`id`);

--
-- Constraints for table `ass_roadways_-_banugroups`
--
ALTER TABLE `ass_roadways_-_banugroups`
  ADD CONSTRAINT `ass_roadways_-_banugroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadways_-_banugroups` (`id`);

--
-- Constraints for table `ass_roadways_-_banuledgers`
--
ALTER TABLE `ass_roadways_-_banuledgers`
  ADD CONSTRAINT `ass_roadways_-_banuledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadways_-_banugroups` (`id`);

--
-- Constraints for table `ass_roadways_-_mageshentries`
--
ALTER TABLE `ass_roadways_-_mageshentries`
  ADD CONSTRAINT `ass_roadways_-_mageshentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadways_-_mageshentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadways_-_mageshentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadways_-_mageshtags` (`id`);

--
-- Constraints for table `ass_roadways_-_mageshentryitems`
--
ALTER TABLE `ass_roadways_-_mageshentryitems`
  ADD CONSTRAINT `ass_roadways_-_mageshentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadways_-_mageshentries` (`id`),
  ADD CONSTRAINT `ass_roadways_-_mageshentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadways_-_mageshledgers` (`id`);

--
-- Constraints for table `ass_roadways_-_mageshgroups`
--
ALTER TABLE `ass_roadways_-_mageshgroups`
  ADD CONSTRAINT `ass_roadways_-_mageshgroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadways_-_mageshgroups` (`id`);

--
-- Constraints for table `ass_roadways_-_mageshledgers`
--
ALTER TABLE `ass_roadways_-_mageshledgers`
  ADD CONSTRAINT `ass_roadways_-_mageshledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadways_-_mageshgroups` (`id`);

--
-- Constraints for table `ass_roadways_-_renukaentries`
--
ALTER TABLE `ass_roadways_-_renukaentries`
  ADD CONSTRAINT `ass_roadways_-_renukaentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadways_-_renukaentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadways_-_renukaentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadways_-_renukatags` (`id`);

--
-- Constraints for table `ass_roadways_-_renukaentryitems`
--
ALTER TABLE `ass_roadways_-_renukaentryitems`
  ADD CONSTRAINT `ass_roadways_-_renukaentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadways_-_renukaentries` (`id`),
  ADD CONSTRAINT `ass_roadways_-_renukaentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadways_-_renukaledgers` (`id`);

--
-- Constraints for table `ass_roadways_-_renukagroups`
--
ALTER TABLE `ass_roadways_-_renukagroups`
  ADD CONSTRAINT `ass_roadways_-_renukagroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadways_-_renukagroups` (`id`);

--
-- Constraints for table `ass_roadways_-_renukaledgers`
--
ALTER TABLE `ass_roadways_-_renukaledgers`
  ADD CONSTRAINT `ass_roadways_-_renukaledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadways_-_renukagroups` (`id`);

--
-- Constraints for table `ass_roadways_-_sureshentries`
--
ALTER TABLE `ass_roadways_-_sureshentries`
  ADD CONSTRAINT `ass_roadways_-_sureshentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadways_-_sureshentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadways_-_sureshentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadways_-_sureshtags` (`id`);

--
-- Constraints for table `ass_roadways_-_sureshentryitems`
--
ALTER TABLE `ass_roadways_-_sureshentryitems`
  ADD CONSTRAINT `ass_roadways_-_sureshentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadways_-_sureshentries` (`id`),
  ADD CONSTRAINT `ass_roadways_-_sureshentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadways_-_sureshledgers` (`id`);

--
-- Constraints for table `ass_roadways_-_sureshgroups`
--
ALTER TABLE `ass_roadways_-_sureshgroups`
  ADD CONSTRAINT `ass_roadways_-_sureshgroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadways_-_sureshgroups` (`id`);

--
-- Constraints for table `ass_roadways_-_sureshledgers`
--
ALTER TABLE `ass_roadways_-_sureshledgers`
  ADD CONSTRAINT `ass_roadways_-_sureshledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadways_-_sureshgroups` (`id`);

--
-- Constraints for table `ass_roadways_-_umaentries`
--
ALTER TABLE `ass_roadways_-_umaentries`
  ADD CONSTRAINT `ass_roadways_-_umaentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `ass_roadways_-_umaentrytypes` (`id`),
  ADD CONSTRAINT `ass_roadways_-_umaentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `ass_roadways_-_umatags` (`id`);

--
-- Constraints for table `ass_roadways_-_umaentryitems`
--
ALTER TABLE `ass_roadways_-_umaentryitems`
  ADD CONSTRAINT `ass_roadways_-_umaentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `ass_roadways_-_umaentries` (`id`),
  ADD CONSTRAINT `ass_roadways_-_umaentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ass_roadways_-_umaledgers` (`id`);

--
-- Constraints for table `ass_roadways_-_umagroups`
--
ALTER TABLE `ass_roadways_-_umagroups`
  ADD CONSTRAINT `ass_roadways_-_umagroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `ass_roadways_-_umagroups` (`id`);

--
-- Constraints for table `ass_roadways_-_umaledgers`
--
ALTER TABLE `ass_roadways_-_umaledgers`
  ADD CONSTRAINT `ass_roadways_-_umaledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `ass_roadways_-_umagroups` (`id`);

--
-- Constraints for table `dieseldetails`
--
ALTER TABLE `dieseldetails`
  ADD CONSTRAINT `dieseldetails_gcentry_id_foreign` FOREIGN KEY (`gcentry_id`) REFERENCES `gcentries` (`id`);

--
-- Constraints for table `entries`
--
ALTER TABLE `entries`
  ADD CONSTRAINT `entries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `entrytypes` (`id`),
  ADD CONSTRAINT `entries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `entryitems`
--
ALTER TABLE `entryitems`
  ADD CONSTRAINT `entryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `entries` (`id`),
  ADD CONSTRAINT `entryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `ledgers` (`id`);

--
-- Constraints for table `freights`
--
ALTER TABLE `freights`
  ADD CONSTRAINT `freights_gcentry_id_foreign` FOREIGN KEY (`gcentry_id`) REFERENCES `gcentries` (`id`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `hiredetails`
--
ALTER TABLE `hiredetails`
  ADD CONSTRAINT `hiredetails_gcentry_id_foreign` FOREIGN KEY (`gcentry_id`) REFERENCES `gcentries` (`id`);

--
-- Constraints for table `ledgers`
--
ALTER TABLE `ledgers`
  ADD CONSTRAINT `ledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `new_barath_logisticsentries`
--
ALTER TABLE `new_barath_logisticsentries`
  ADD CONSTRAINT `new_barath_logisticsentries_fk_check_entrytype_id` FOREIGN KEY (`entrytype_id`) REFERENCES `new_barath_logisticsentrytypes` (`id`),
  ADD CONSTRAINT `new_barath_logisticsentries_fk_check_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `new_barath_logisticstags` (`id`);

--
-- Constraints for table `new_barath_logisticsentryitems`
--
ALTER TABLE `new_barath_logisticsentryitems`
  ADD CONSTRAINT `new_barath_logisticsentryitems_fk_check_entry_id` FOREIGN KEY (`entry_id`) REFERENCES `new_barath_logisticsentries` (`id`),
  ADD CONSTRAINT `new_barath_logisticsentryitems_fk_check_ledger_id` FOREIGN KEY (`ledger_id`) REFERENCES `new_barath_logisticsledgers` (`id`);

--
-- Constraints for table `new_barath_logisticsgroups`
--
ALTER TABLE `new_barath_logisticsgroups`
  ADD CONSTRAINT `new_barath_logisticsgroups_fk_check_parent_id` FOREIGN KEY (`parent_id`) REFERENCES `new_barath_logisticsgroups` (`id`);

--
-- Constraints for table `new_barath_logisticsledgers`
--
ALTER TABLE `new_barath_logisticsledgers`
  ADD CONSTRAINT `new_barath_logisticsledgers_fk_check_group_id` FOREIGN KEY (`group_id`) REFERENCES `new_barath_logisticsgroups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
