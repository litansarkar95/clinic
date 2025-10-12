-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2025 at 08:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_statement`
--

CREATE TABLE `account_statement` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `transaction_date` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `debit` decimal(10,2) DEFAULT 0.00,
  `adjustment` decimal(10,2) DEFAULT 0.00,
  `credit` decimal(10,2) DEFAULT 0.00,
  `balance` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `account_statement`
--

INSERT INTO `account_statement` (`id`, `sales_id`, `type`, `transaction_date`, `description`, `debit`, `adjustment`, `credit`, `balance`, `created_at`) VALUES
(1213, 1208, '', 1760119200, NULL, '500.00', '0.00', '0.00', '0.00', '2025-10-11 16:19:49'),
(1214, 1209, '', 1760119200, NULL, '500.00', '0.00', '0.00', '0.00', '2025-10-11 16:20:58'),
(1215, 1210, '', 1760119200, NULL, '500.00', '0.00', '0.00', '0.00', '2025-10-11 16:21:41'),
(1216, 1211, '', 1760205600, NULL, '500.00', '0.00', '0.00', '0.00', '2025-10-12 10:43:45'),
(1217, 1212, '', 1760205600, NULL, '100.00', '0.00', '0.00', '0.00', '2025-10-12 17:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_info`
--

CREATE TABLE `auth_users_info` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `usersid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `device_name` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `logintime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bill_details`
--

CREATE TABLE `bill_details` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `test_info_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `comments` text NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_details`
--

INSERT INTO `bill_details` (`id`, `bill_id`, `registration_id`, `test_info_id`, `price`, `comments`, `create_date`) VALUES
(1264, 1211, 0, 49, 500, '', 0),
(1265, 0, 1227, 0, 100, '', 1760289532),
(1266, 0, 1229, 51, 100, '', 1760290501),
(1267, 1212, 0, 52, 100, '', 1760291324);

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `date_code` year(4) NOT NULL,
  `month_code` float NOT NULL,
  `code_random` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `subTotal` double NOT NULL,
  `discountType` varchar(100) NOT NULL,
  `discountAmount` double NOT NULL,
  `totalDisAmount` double NOT NULL,
  `isPaid` varchar(255) NOT NULL,
  `totalAmount` double NOT NULL,
  `paidAmount` double NOT NULL,
  `dueAmount` double NOT NULL,
  `paymentType` varchar(255) NOT NULL,
  `invoice_date` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`id`, `ip_address`, `date_code`, `month_code`, `code_random`, `invoiceNumber`, `patient_id`, `doctor_id`, `subTotal`, `discountType`, `discountAmount`, `totalDisAmount`, `isPaid`, `totalAmount`, `paidAmount`, `dueAmount`, `paymentType`, `invoice_date`, `status`, `created_at`, `updated_at`) VALUES
(1203, '::1', 2025, 10, 1, 'INV-000001', 1216, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760198729, 0),
(1204, '::1', 2025, 10, 2, 'INV-000002', 1217, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199299, 0),
(1205, '::1', 2025, 10, 3, 'INV-000003', 1218, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199393, 0),
(1206, '::1', 2025, 10, 4, 'INV-000004', 1219, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199410, 0),
(1207, '::1', 2025, 10, 5, 'INV-000005', 1220, 0, 534, 'flat', 0, 0, 'Due', 534, 0, 534, 'Cash', 1760119200, 1, 1760199439, 0),
(1208, '::1', 2025, 10, 6, 'INV-000006', 1221, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199589, 0),
(1209, '::1', 2025, 10, 7, 'INV-000007', 1222, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199657, 0),
(1210, '::1', 2025, 10, 8, 'INV-000008', 1223, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760119200, 1, 1760199701, 0),
(1211, '::1', 2025, 10, 9, 'INV-000009', 1224, 0, 500, 'flat', 0, 0, 'Due', 500, 0, 500, 'Cash', 1760205600, 1, 1760265824, 0),
(1212, '::1', 2025, 10, 10, 'INV-000010', 1225, 0, 100, 'flat', 0, 0, 'Due', 100, 0, 100, 'Cash', 1760205600, 1, 1760291324, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `slug` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `picture`, `is_active`, `create_user`, `create_date`) VALUES
(2, 'Spacial', '', '', 1, 2, 1760281600);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `is_active`, `create_date`) VALUES
(1, 'Bangladeshi', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `nid` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `party_type` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `opening_balance` decimal(10,2) NOT NULL,
  `current_balance` decimal(10,2) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `ip_address`, `name`, `contact_no`, `email`, `city`, `state`, `zip`, `country_id`, `nid`, `address`, `party_type`, `picture`, `opening_balance`, `current_balance`, `is_active`, `create_user`, `create_date`) VALUES
(9, '::1', 'Md Litan Sarkar', '01829107469', 'email', '', '', 'ww', 0, '', 'dhaka', 'Retailer', '', '0.00', '0.00', 1, 0, 1741678803);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `commission` decimal(10,2) NOT NULL,
  `imap_username` varchar(191) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_from_header` tinyint(1) NOT NULL DEFAULT 0,
  `host` varchar(150) DEFAULT NULL,
  `password` mediumtext DEFAULT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(191) NOT NULL DEFAULT 'INBOX',
  `delete_after_import` int(11) NOT NULL DEFAULT 0,
  `calendar_id` mediumtext DEFAULT NULL,
  `hidefromclient` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` int(11) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `commission`, `imap_username`, `email`, `email_from_header`, `host`, `password`, `encryption`, `folder`, `delete_after_import`, `calendar_id`, `hidefromclient`, `is_active`, `create_user`, `create_date`) VALUES
(6, 'Laber ', '0.00', '', '', 0, '', '', '', 'INBOX', 0, NULL, 0, 1, 0, 1734514677);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `is_active`, `create_date`) VALUES
(1, 'Cumilla', 1, 1759898283),
(2, 'sdsdds', 1, 1759922251);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `id_no`, `name`, `mobile`, `degree`, `is_active`, `create`) VALUES
(14, '', 'DR. GAZI MD. ARIFUL ISLAM VELIA', '01718533330', 'MBBS, BCS, MS - ORTHOPAEDIC SURGERY ', 1, '2025-10-11 04:35:25'),
(16, '1028', 'Dr Hakim', '01928262', 'MBBS', 1, '2025-10-11 04:46:21'),
(17, '01028', 'Abir', '2434343', '4343', 1, '2025-10-11 05:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `phrase` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL,
  `bangla` varchar(255) NOT NULL,
  `arbic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`, `arbic`) VALUES
(1, 'email', 'Email', 'ইমেইল', ''),
(2, 'password', 'Password', 'পাসওয়ার্ড', ''),
(3, 'captcha', 'Captcha', 'ক্যাপচা', ''),
(4, 'dashboard', 'Dashboard', 'ড্যাশবোর্ড', ''),
(6, 'courses', 'Courses', 'কোর্স', ''),
(7, 'course_categories', 'Course Categories', 'কোর্স ক্যাটেগরি', ''),
(8, 'course_list', 'Course List', 'কোর্স লিস্ট', ''),
(9, 'categories', 'Categories', 'ক্যাটেগরি', ''),
(10, 'save', 'Save', 'সেইভ করুন', ''),
(11, 'reset', 'Reset', 'রিসেট', ''),
(12, 'name', 'Name', 'নাম', ''),
(13, 'parent', 'Parent', 'প্যারেন্ট', ''),
(14, 'select', 'Select', 'নির্বাচন করুন', ''),
(15, 'sl', 'SL', 'সিরিয়াল ', ''),
(16, 'create_date', 'Create Date', 'তারিখ', ''),
(17, 'status', 'Status', 'স্ট্যাটাস', ''),
(18, 'action', 'Action', 'অ্যাকশন', ''),
(19, 'list', 'List', 'তালিকা', ''),
(20, 'edit', 'Edit', 'এডিট', ''),
(21, 'update', 'Update', 'আপডেট', ''),
(22, 'cancel', 'Cancel', 'বাতিল', ''),
(23, 'enter', 'Enter', 'প্রবেশ করান', ''),
(24, 'first_name', 'First Name', 'প্রথম নাম', ''),
(25, 'last_name', 'Last Name', 'শেষ নাম', ''),
(26, 'mobile_no', 'Mobile No', 'মোবাইল নং', ''),
(27, 'create', 'Create', 'তৈরি করুন', ''),
(28, 'role', 'Role', 'রোল', ''),
(29, 'qualification', 'Qualification', 'যোগ্যতা', ''),
(30, 'work_exp', 'Work Experience', 'কাজের অভিজ্ঞতা', ''),
(31, 'father_name', 'Father Name', 'পিতার নাম', ''),
(32, 'mother_name', 'Mother Name', 'মায়ের নাম', ''),
(33, 'contact_no', 'Contact No', 'যোগাযোগ নম্বর', ''),
(34, 'emergency_contact_no', 'Emergency Contact No', 'জরুরী যোগাযোগ নম্বর', ''),
(35, 'dob', 'Date of Birth', 'জন্ম তারিখ', ''),
(36, 'marital_status', 'Marital Status', 'বৈবাহিক অবস্থা', ''),
(37, 'date_of_joining', 'Date of Joining', 'যোগদানের তারিখ', ''),
(38, 'date_of_leaving', 'Date of Leaving', 'ছাড়ার তারিখ', ''),
(39, 'gender', 'Gender', 'জেন্ডার', ''),
(40, 'facebook', 'Facebook', 'ফেইসবুক', ''),
(41, 'twitter', 'Twitter', 'টুইটার', ''),
(42, 'linkedin', 'Linkedin', 'লিঙ্কেডিন', ''),
(43, 'instagram', 'Instagram', 'ইনস্টাগ্রাম', ''),
(44, 'local_address', 'Local Address', 'স্থানীয় ঠিকানা', ''),
(45, 'permanent_address', 'Permanent Address', 'স্থায়ী ঠিকানা', ''),
(46, 'employee_id', 'Employee Id', 'কর্মচারী আইডি', ''),
(47, 'resume', 'Resume', 'সিভি ', ''),
(48, 'english', 'English', 'ইংলিশ', ''),
(49, 'bangla', 'Bangla', 'বাংলা ', ''),
(50, 'staff', 'Staff', 'স্টাফ', ''),
(51, 'picture', 'Picture', 'ছবি', ''),
(52, 'icons', 'Icons', 'আইকন', ''),
(53, 'basic_salary', 'Basic Salary', 'বেসিক বেতন', ''),
(54, 'change', 'Change', 'পরিবর্তন', ''),
(55, 'active', 'Active', 'একটিভ', ''),
(56, 'inactive', 'Inactive', 'ইনক্টিভ', ''),
(57, 'today', 'Today', 'আজকের', ''),
(58, 'weekly', 'Weekly', 'সাপ্তাহিক', ''),
(59, 'monthly', 'Monthly', 'মাসিক', ''),
(60, 'yearly', 'Yearly', 'বার্ষিক', ''),
(61, 'today_purchase', 'Today Purchase', 'আজ কেনাকাটা', ''),
(62, 'today_sales', 'Today Sales', 'আজ বিক্রয়', ''),
(63, 'today_cash_sell', 'Today Cash Sell', 'আজ নগদ বিক্রি', ''),
(64, 'today_cash_purchase', 'Today Cash Purchase', 'আজ নগদ ক্রয়', ''),
(65, 'weekly_purchase', 'Weekly Purchase', 'সাপ্তাহিক ক্রয়', ''),
(66, 'weekly_sales', 'Weekly Sales', 'সাপ্তাহিক বিক্রয়', ''),
(67, 'weekly_cash_purchase', 'Weekly Cash Purchase', 'সাপ্তাহিক নগদ ক্রয়', ''),
(68, 'weekly_cash_sell', 'Weekly Cash Sell', 'সাপ্তাহিক ক্যাশ সেল', ''),
(69, 'general_settings', 'General Settings', 'সাধারণ সেটিংস', ''),
(70, 'email_settings', 'Email Settings', 'ইমেল সেটিংস', ''),
(71, 'settings', 'Settings', 'সেটিংস', ''),
(72, 'language', 'Language', 'ভাষা', ''),
(73, 'title', 'Title', 'টাইটেল', ''),
(74, 'address', 'Address', 'ঠিকানা', ''),
(75, 'product', 'Product', 'পণ্য', ''),
(76, 'human_resources', 'Human Resources', 'মানব সম্পদ', ''),
(77, 'reports', 'Reports', 'রিপোর্ট', ''),
(78, 'accounts', 'Accounts', 'একাউন্টস', ''),
(79, 'purchase', 'Purchase', 'ক্রয়', ''),
(80, 'sales', 'Sales', 'বিক্রয়', ''),
(81, 'add_as_multiple_of_other_unit', 'Add as multiple of other unit', 'অন্যান্য ইউনিটের একাধিক হিসাবে যোগ করুন', ''),
(82, '1_unit', '1 Unit', '১ ইউনিট', ''),
(83, 'unit', 'Unit', 'ইউনিট', ''),
(84, 'short_name', 'Short Name', 'সংক্ষিপ্ত নাম', ''),
(85, 'base_unit', 'Base Unit', 'বেস ইউনিট', ''),
(86, 'products', 'Products', 'প্রোডাক্টস', ''),
(87, 'purchase_price', 'Purchase Price', 'ক্রয় মূল্য', ''),
(88, 'sales_price', 'Sales Price', 'বিক্রয় মূল্য', ''),
(89, 'alert_quantity', 'Alert Quantity', 'সতর্কতা পরিমাণ', ''),
(90, 'code', 'Code', 'কোড', ''),
(91, 'description', 'Description', 'বিবরণ', ''),
(92, 'transport', 'Transport', 'পরিবহন', ''),
(93, 'transport_cost', 'Transport Cost', 'পরিবহন খরচ', ''),
(94, 'challan_no', 'Challan No', 'চালান নং', ''),
(95, 'invoice_no', 'Invoice No', 'ইনভয়েস নং', ''),
(96, 'date', 'Date', 'তারিখ', ''),
(97, 'supplier', 'Supplier', 'সরবরাহকারী', ''),
(98, 'warehouse', 'Warehouse', 'গুদাম', 'গুদাম'),
(99, 'delete', 'Delete', 'ডিলিট', ''),
(100, 'shipping_method', 'Shipping Method', 'শিপিং পদ্ধতি', ''),
(101, 'please_try_again', 'Please Try Again', 'আবার চেষ্টা করুন', ''),
(102, 'save_successfully', 'Save Successfully', 'সফলভাবে সংরক্ষণ করুন', ''),
(103, 'purchase_product_list', 'Purchase Product List', 'পণ্য তালিকা ক্রয়', ''),
(104, 'grand_total', 'Grand Total', 'গ্র্যান্ড টোটাল', ''),
(105, 'paid_amount', 'Paid Amount', 'পেইড এমাউন্ট', ''),
(106, 'due_amount', 'Due Amounts', 'বকেয়া পরিমাণ', ''),
(107, 'purchase_date', 'Purchase Date', 'ক্রয় তারিখ', ''),
(108, 'accounts_head', 'Accounts Head', 'একাউন্টস হেড', ''),
(109, 'sales_list', 'Sales List', 'বিক্রয় তালিকা', ''),
(110, 'customer_list', 'Customer List', 'কাস্টমার লিস্ট', ''),
(111, 'designation_list', 'Designation List', 'পদবী লিস্ট', ''),
(112, 'employee_list', 'Employee List', 'কর্মচারী লিস্ট', ''),
(113, 'daily_attendance', 'Daily Attendance', 'দৈনিক হাজিরা', ''),
(114, 'monthly_attendance', 'Monthly Attendance', 'মাসিক হাজিরা', ''),
(115, 'loan_exchange', 'Loan Exchange', 'লোন আদান প্রদান', ''),
(116, 'salary_allowance', 'Salary Allowance', 'বেতন ভাতা', ''),
(117, 'income_sector', 'Income Sector', 'আয়ের খাত', ''),
(118, 'expenditure_sector', 'Expenditure Sector', 'ব্যয়ের খাত', ''),
(119, 'other_sector', 'Other Sector', 'অন্যন্যা খাত', ''),
(120, 'all_transactions', 'All Transactions', 'সকল লেনদেন ', ''),
(121, 'purchase_of_paddy', 'Purchase of Paddy', 'ধান ক্রয়', ''),
(122, 'paddy_purchase_ledger', 'Paddy Purchase Ledger', 'ধান ক্রয় লেজার', ''),
(123, 'rice_purchase_ledger', 'Rice Purchase Ledger', 'চাউল ক্রয় লেজার', ''),
(124, 'purchase_of_rice', 'Purchase of Rice', 'চাউল ক্রয়', ''),
(125, 'sales_ledger', 'Sales Ledger', 'বিক্রয় লেজার', ''),
(126, 'new_party', 'New Party', 'নতুন পার্টি ', ''),
(127, 'party_list', 'Party List', 'পার্টি লিস্ট', ''),
(128, 'party_payment', 'Party Payment', 'পার্টি পেমেন্ট', ''),
(129, 'party_debit', 'Party Debit', 'পার্টি দেনা', ''),
(130, 'party_credit', 'Party Credit', 'পার্টি পাওনা', ''),
(131, 'party', 'Party', 'পার্টি', ''),
(132, 'daily_report', 'Daily Report', 'দৈনিক রিপোর্ট', ''),
(133, 'financial_statement', 'Financial Statement', 'ফিনান্সিয়াল স্টেটমেন্ট', ''),
(134, 'production', 'Production', 'প্রোডাকশন', ''),
(135, 'production_order', 'Production Order', 'প্রোডাকশন অর্ডার', ''),
(136, 'production_details', 'Production Details', 'প্রোডাকশন বিস্তারিত', ''),
(137, 'production_stocks', 'Production Stocks', 'প্রোডাকশন স্টকস', ''),
(138, 'production_stocks_details', 'Production Stocks Details', 'প্রোডাকশন স্টকস বিস্তারিত', ''),
(139, 'last_purchase_list', 'Last Purchase List', 'লাস্ট ক্রয়ের তালিকা', ''),
(140, 'designation', 'Designation', 'পদবী', ''),
(141, 'attendance_type', 'Attendance Type', 'উপস্থিতির ধরন', ''),
(142, 'in_time', 'In Time', 'ইন টাইম', ''),
(143, 'out_time', 'Out Time', 'আউট টাইম', ''),
(144, 'note', 'Note', 'নোট', ''),
(145, 'chart_Of_accounts', 'Chart Of Accounts', 'চার্ট অফ একাউন্টস', ''),
(146, 'keyword', 'Keyword', 'কীওয়ার্ড', ''),
(147, 'root_type', 'Root Type', 'রুট টাইপ', ''),
(148, 'nid_number', 'NID Number', 'NID নম্বর', ''),
(149, 'tin_number', 'Tin Number', 'টিন নম্বর', ''),
(150, 'opening_balance', 'Opening Balance', 'ওপেনিং ব্যালেন্স', ''),
(151, 'current_balance', 'Current Balance', 'বর্তমান ব্যালেন্স', ''),
(152, 'party_ledger', 'Party Ledger', 'পার্টি লেজার', ''),
(153, 'from_date', 'From Date', 'তারিখ থেকে', ''),
(154, 'end_date', 'End Date', 'শেষ তারিখ', ''),
(155, 'customer_name', 'Customer Name', 'গ্রাহকের নাম', ''),
(156, 'search', 'Search', 'অনুসন্ধান', ''),
(157, 'demo_is_not_allowed_please_buy_the_software', 'Demo is not allowed, please buy the software', 'ডেমো অনুমোদিত নয়, দয়া করে সফটওয়্যারটি কিনুন', ''),
(158, 'chart_of_accounts_view', 'Chart of Accounts View', 'চার্ট অফ একাউন্টস ভিউ', ''),
(159, 'journal_voucher', 'Journal Voucher', 'জার্নাল ভাউচার', ''),
(160, 'balance_sheet', 'Balance Sheet', 'ব্যালেন্স শিট', ''),
(161, 'chart_of_accounts_create', 'Chart of Accounts Create', 'চার্ট অফ একাউন্টস তৈরি', ''),
(162, 'voucher_no', 'Voucher No', 'ভাউচার নং', ''),
(167, 'particulars', 'Particulars', 'বিবরণ', ''),
(168, 'credit', 'Credit', 'ক্রেডিট', ''),
(169, 'debit', 'Debit', 'ডেবিট', ''),
(170, 'voucher_type', 'Voucher Type', 'ভাউচার টাইপ', ''),
(171, 'acc_coa_head', 'Acc COA Head', 'Acc COA Head', ''),
(172, 'is_active', 'Is Active', 'সক্রিয় আছে', ''),
(173, 'hourly_rate', 'Hourly Rate', 'ঘন্টার রেট', ''),
(174, 'member_departments', 'Member Departments', 'মেম্বার ডিপার্টমেন্টস', ''),
(175, 'staff_type', 'Staff Type', 'স্টাফ টাইপ', ''),
(176, 'departments', 'Departments', 'ডিপার্টমেন্ট', ''),
(177, 'customers', 'Customers', 'কাস্টমার', ''),
(178, 'company_name', 'Company Name', 'কোম্পানির নাম', ''),
(179, 'website', 'Website', 'ওয়েবসাইট', ''),
(181, 'city', 'City', 'সিটি', ''),
(182, 'state', 'State', 'স্টেট', ''),
(183, 'zip_code', 'Zip Code', 'জিপ কোড', ''),
(185, 'country', 'Country', 'দেশ', ''),
(186, 'customers_payment', 'Customers Payment', 'গ্রাহকদের পেমেন্ট', ''),
(187, 'customers_debit', 'Customers Debit', 'গ্রাহকদের ডেবিট', ''),
(188, 'customers_credit', 'Customers Credit', 'গ্রাহকদের ক্রেডিট', ''),
(189, 'products_purchase', 'Products Purchase', 'পণ্য ক্রয়', ''),
(190, 'products_purchase_ledger', 'Products Purchase Ledger', 'পণ্য ক্রয় লেজার', ''),
(191, 'username', 'Username', 'ব্যবহারকারীর নাম', ''),
(192, 'is_customer', 'Is Customer', 'গ্রাহক তৈরি করুন', ''),
(193, 'is_supplier', 'Is Supplier', 'সরবরাহকারী তৈরি করুন', ''),
(194, 'suppliers', 'Suppliers', 'সরবরাহকারী', ''),
(195, 'suppliers_payment', 'Suppliers Payment', 'সরবরাহকারীদের অর্থপ্রদান', ''),
(196, 'suppliers_debit', 'Suppliers Debit', 'সরবরাহকারী ডেবিট', ''),
(197, 'suppliers_credit', 'Suppliers Credit', 'সরবরাহকারী ক্রেডিট', ''),
(200, 'today_expense', 'Today Expense', 'আজকের খরচ', ''),
(201, 'details_see', 'Details', 'বিস্তারিত দেখুন', ''),
(202, 'total_purchase', 'Total Purchase', 'মোট ক্রয়', ''),
(203, 'total_sales', 'Total Sales', 'মোট বিক্রয়', ''),
(204, 'total_expense', 'Total Expense', 'মোট খরচ', ''),
(205, 'total_customers', 'Total Customers', 'মোট গ্রাহক', ''),
(206, 'total_suppliers', 'Total Suppliers', 'মোট সরবরাহকারী', ''),
(207, 'total_staff', 'Total Staff', 'মোট স্টাফ', ''),
(208, 'today_attendance', 'Today\'s Attendance', 'আজকের উপস্থিতি', ''),
(209, 'accounts_receivable', 'Accounts Receivable', 'একাউন্টস রেসেইভাব্লে', ''),
(210, 'accounts_payable', 'Accounts Payable', 'প্রদেয় হিসাব', ''),
(211, 'inactive_account', 'Inactive Account', 'নিষ্ক্রিয় অ্যাকাউন্ট', ''),
(212, 'username_password_incorrect', 'Username & Password Incorrect', 'ব্যবহারকারীর নাম ও পাসওয়ার্ড ভুল', ''),
(213, 'customer_ledger', 'Customer Ledger', 'কাস্টমার লেজার', ''),
(214, 'supplier_ledger', 'Supplier Ledger', 'সরবরাহকারী লেজার', ''),
(215, 'purchase_ledger', 'Purchase Ledger', 'ক্রয় লেজার', ''),
(216, 'staff_reports', 'Staff Reports', 'স্টাফ রিপোর্ট', ''),
(217, 'sms_settings', 'SMS Settings', 'এসএমএস সেটিংস', ''),
(218, 'stock_ledger', 'Stock Ledger', 'স্টক লেজার', ''),
(219, 'total_supplier_summary', 'Total Supplier Summary', 'মোট সরবরাহকারীর সামারি', ''),
(220, 'trial_balance', 'Trial Balance', 'ট্রায়াল ব্যালেন্স', ''),
(221, 'payment_amount', 'Payment Amount', 'পেমেন্ট এমাউন্ট', ''),
(222, 'payment_method', 'Payment Method', 'পেমেন্ট পদ্ধতি', ''),
(223, 'received_date', 'Received Date', 'প্রাপ্তির তারিখ', ''),
(224, 'supplier_balance', 'Supplier Balance', 'সরবরাহকারী ব্যালেন্স', ''),
(225, 'quick_link', 'Quick Link', 'কুইক লিংক', ''),
(226, 'agents_ledger', 'Agents Ledger', 'এজেন্ট লেজার', ''),
(227, 'company_ledger', 'Company Ledger', 'কোম্পানি লেজার', ''),
(228, 'total_agents', 'Total Agents', 'মোট এজেন্ট', ''),
(229, 'accounts_type', 'Accounts Type', 'একাউন্টস টাইপ', ''),
(230, 'level', 'Level', 'লেভেল', ''),
(231, 'cashbook', 'Cashbook', 'ক্যাশবুক', ''),
(232, 'bankbook', 'Bank Book', 'ব্যাংকবুক', ''),
(233, 'youtube', 'Youtube', 'ইউটিউব', ''),
(234, 'short_description', 'Short Description', 'শর্ট ডেসক্রিপশন', ''),
(235, 'income_statement', 'Income Statement', 'আয় বিবরণী', ''),
(236, 'production_setup', 'Production Setup', 'উৎপাদন সেটআপ', ''),
(237, 'husk', 'Husk', 'ভুসি', ''),
(238, 'rice', 'Rice', 'চাউল', ''),
(239, 'quantity', 'Quantity', 'পরিমাণ', ''),
(240, 'convert', 'Convert', 'কনভার্ট', ''),
(241, 'add_supplier', 'Add Supplier', 'সমস্ত সরবরাহকারী', ''),
(242, 'all_suppliers', 'All Suppliers', 'সরবরাহকারী যোগ করুন', ''),
(246, 'sales_new', 'Sales New', 'নতুন বিক্রয়', ''),
(247, 'purchase_new', 'Purchase New', 'নতুন ক্রয়', ''),
(248, 'sales_return', 'Sales Return', 'বিক্রয় ফেরত ', ''),
(249, 'purchase_list', 'Purchase List', 'ক্রয়ের তালিকা', ''),
(250, 'purchase_return', 'Purchase Return', 'ক্রয় ফেরত', ''),
(251, 'all_product', 'All Product', 'সমস্ত পণ্য', ''),
(252, 'add_product', 'Add Product', 'পণ্য যোগ করুন', ''),
(253, 'add_new_product', 'Add New Product', 'নতুন পণ্য যোগ করুন', ''),
(254, 'add_new_categories', 'Add New Categories', 'নতুন বিভাগ যোগ করুন', ''),
(255, 'product_category', 'Product Category', 'পণ্য বিভাগ', ''),
(256, 'low_stock_qty', 'Low Stock Qty', 'কম স্টক পরিমাণ', ''),
(257, 'product_brand', 'Product Brand', 'পণ্যের ব্র্যান্ড', ''),
(258, 'product_unit', 'Product Unit', 'পণ্য ইউনিট', ''),
(259, 'select_vat', 'Select Vat', 'ভ্যাট নির্বাচন করুন', ''),
(260, 'vat_type', 'Vat Type', 'ভ্যাটের ধরণ', ''),
(261, 'purchase_price_exclusive', 'Purchase Price Exclusive', 'এক্সক্লুসিভ ক্রয় মূল্য', ''),
(262, 'purchase_price_inclusive', 'Purchase Price Inclusive', 'ক্রয় মূল্য সহ', ''),
(263, 'profit_margin', 'Profit Margin', 'লাভের মার্জিন', ''),
(264, 'wholesale_price', 'Wholesale Price', 'পাইকারি মূল্য', ''),
(265, 'dealer_price', 'Dealer Price', 'ডিলারের দাম', ''),
(266, 'barcode', 'Barcode', 'বারকোড', ''),
(267, 'expire_date', 'Expire Date', 'মেয়াদ শেষ হওয়ার তারিখ', ''),
(268, 'image', 'Image', 'ছবি', ''),
(269, 'product_name', 'Product Name', 'পণ্যের নাম', ''),
(270, 'brand', 'Brand', 'ব্র্যান্ড', ''),
(271, 'category', 'Category', 'বিভাগ', ''),
(272, 'add_new_brand', 'Add New Brand', 'নতুন ব্র্যান্ড যোগ করুন', ''),
(273, 'total', 'Total', 'মোট', ''),
(274, 'paid', 'Paid', 'পেইড', ''),
(275, 'due', 'Due', 'বকেয়া', ''),
(276, 'payment', 'Payment', 'পেমেন্ট', ''),
(277, 'supplier_name', 'Supplier Name', 'সরবরাহকারীর নাম', ''),
(278, 'add_customer', 'Add Customer', 'গ্রাহক যোগ করুন', ''),
(279, 'all_customers', 'All Customers', 'সকল গ্রাহক', ''),
(280, 'customer', 'Customer', 'গ্রাহক', ''),
(281, 'party_type', 'Party Type', 'পার্টির ধরণ', ''),
(282, 'orders', 'Orders', 'অর্ডারস', ''),
(283, 'new_order', 'New Order', 'নতুন অর্ডার', ''),
(284, 'order_list', 'Order List', 'অর্ডার তালিকা', ''),
(285, 'remarks', 'Remarks', 'মন্তব্য', ''),
(286, 'type', 'Type', 'টাইপ', ''),
(287, 'all_stock', 'All Stock', 'সমস্ত স্টক', ''),
(288, 'low_stock', 'Low Stock', 'লো স্টক', ''),
(289, 'expired_products', 'Expired Products', 'মেয়াদোত্তীর্ণ পণ্য', ''),
(290, 'stock_list', 'Stock List', 'স্টক তালিকা', ''),
(291, 'cost', 'Cost', 'দাম', ''),
(292, 'stock_value', 'Stock Value', 'স্টক মূল্য', ''),
(293, 'qty', 'Qty', 'পরিমাণ', ''),
(294, 'expired_date', 'Expired Date', 'মেয়াদোত্তীর্ণ তারিখ', ''),
(295, 'stock', 'Stock', 'স্টক', ''),
(296, 'my_order', 'My Order', 'আমার অর্ডার', ''),
(297, 'profile', 'Profile', 'প্রোফাইল', ''),
(298, 'change_password', 'Change Password', 'পাসওয়ার্ড পরিবর্তন করুন', ''),
(299, 'shipping_address', 'Shipping Address', 'শিপিং এড্রেস', ''),
(300, 'pending', 'Pending', 'pending', ''),
(301, 'all_list', 'All List', 'সকল তালিকা', ''),
(302, 'reference', 'Reference', 'রেফারেন্স', ''),
(303, 'supplier_due', 'Supplier Due', 'সরবরাহকারীর বকেয়া', ''),
(304, 'customer_due', 'Customer Due', 'গ্রাহকের বকেয়া', ''),
(305, 'sales_reports', 'Sales Reports', 'বিক্রয় প্রতিবেদন', ''),
(306, 'purchase_reports', 'Purchase Reports', 'ক্রয় প্রতিবেদন', ''),
(307, 'delivery_status', 'Delivery Status', 'ডেলিভারি স্ট্যাটাস', ''),
(308, 'delivery_person', 'Delivery Person', 'ডেলিভারি ব্যক্তি', ''),
(309, 'sales_ledger_reports', 'Sales Ledger Reports', 'বিক্রয় লেজার রিপোর্ট', ''),
(310, 'breaking_news', 'Breaking News', 'ব্রেকিং নিউস', ''),
(311, 'link', 'Link', 'লিংক', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_credential`
--

CREATE TABLE `login_credential` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` tinyint(2) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1(active) 0(deactivate)',
  `last_login` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `login_credential`
--

INSERT INTO `login_credential` (`id`, `user_id`, `username`, `password`, `role`, `active`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 1, 'litan@gmail.com', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 1, 1, '2024-12-18 10:29:18', '2024-10-21 15:42:57', '2025-03-11 12:50:11'),
(2, 6, 'admin@gmail.com', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 2, 1, '2025-10-12 22:12:09', '2024-11-16 23:35:56', '2025-10-12 22:12:09'),
(14, 9, '01829107469', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 7, 1, '2025-04-08 22:42:01', '2025-03-11 13:40:03', '2025-04-08 22:42:01'),
(15, 12, 'niloy@gmail.com', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 5, 1, NULL, '2025-03-13 13:00:36', '2025-03-13 13:00:36'),
(16, 13, '01712', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 5, 1, '2025-03-23 15:14:59', '2025-03-20 13:23:31', '2025-03-23 15:14:59'),
(17, 14, '01123', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 6, 1, NULL, '2025-03-22 13:37:32', '2025-03-22 13:37:32'),
(18, 15, 'admin2@gmail.com', 'UHZVdVBOTWI0VkwrN0MvQjRRRUZkdz09', 2, 1, '2025-04-18 16:00:46', '2025-04-18 12:00:25', '2025-04-18 12:00:46');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `record_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `agent` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES
(1, 'New Record inserted On patients id 1229', 1229, 6, 'Insert', '::1', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2025-10-12 17:35:01', '2025-10-12'),
(2, 'New Record inserted On bill_details id 1266', 1266, 6, 'Insert', '::1', 'Windows 10', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWeb', '2025-10-12 17:35:01', '2025-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `name`, `is_active`, `create_date`) VALUES
(1, 'Cook', 1, 0),
(3, 'Checf', 1, 1759905118);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `serial_no` int(11) NOT NULL,
  `registration_no` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `registration_date` int(11) NOT NULL,
  `father_husband_name` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `age` varchar(20) DEFAULT NULL,
  `district_id` int(11) NOT NULL,
  `upazilla_id` int(11) NOT NULL,
  `village` varchar(255) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `adult_child` varchar(50) NOT NULL,
  `bed_type` varchar(50) NOT NULL,
  `bed` varchar(50) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` int(11) NOT NULL,
  `registration_int_no` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `month`, `day`, `year`, `serial_no`, `registration_no`, `name`, `registration_date`, `father_husband_name`, `mobile_no`, `gender`, `age`, `district_id`, `upazilla_id`, `village`, `occupation_id`, `religion`, `nationality_id`, `doctor_id`, `adult_child`, `bed_type`, `bed`, `is_active`, `create_date`, `registration_int_no`) VALUES
(1224, 10, 12, 2025, 1, 'R-0011', 'Md. Ali', 1760205600, 'Ikra', '01928277363', 'Male', '21', 1, 3, 'shovoki', 1, 'Islam', 1, 14, 'Adult', '', '', 1, 1760243577, 11),
(1225, 10, 12, 2025, 2, 'R-0012', 'Md Litan Sarkat', 1760205600, 'asdsad', '01829107', 'Male', 'sads', 1, 3, 'ee', 1, 'Islam', 1, 14, 'Adult', '', '', 1, 1760251070, 12),
(1226, 10, 12, 2025, 3, 'R-0013', 'Monira', 1760205600, 'Iddis', '01829293837', 'Female', '21', 1, 3, 'Cumilla Sader', 1, 'Islam', 1, 14, 'Adult', '', '', 1, 1760289492, 13),
(1227, 10, 12, 2025, 4, 'R-0014', 'Monira', 1760205600, 'Iddis', '01829293837', 'Female', '21', 1, 0, 'Cumilla Sader', 1, 'Islam', 1, 14, 'Adult', '', '', 1, 1760289532, 14),
(1228, 10, 12, 2025, 5, 'R-0015', 'sdsad', 1760205600, 'saddsd', 'dssd', 'Others', '33', 1, 2, '33', 1, 'Hindu', 1, 14, 'Adult', '', '', 1, 1760290347, 15),
(1229, 10, 12, 2025, 6, 'R-0016', 'sdsad', 1760205600, 'saddsd', 'dssd', 'Others', '33', 1, 2, '33', 1, 'Hindu', 1, 14, 'Adult', '', '', 1, 1760290501, 16);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_system` int(11) NOT NULL,
  `is_superadmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`) VALUES
(1, 'Super Admin', 'super_admin', 0, 0, 1),
(2, 'Admin', 'admin', 1, 1, 0),
(3, 'Staff', 'staff', 1, 1, 0),
(4, 'Suppliers', 'suppliers', 1, 1, 0),
(5, 'Delivery Person', 'delivery_person', 1, 1, 0),
(6, 'Doctor', 'doctor', 1, 1, 0),
(7, 'User', 'user', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(300) NOT NULL,
  `short_description` text NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `linkedin` text NOT NULL,
  `instagram` text NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_icon` varchar(50) NOT NULL,
  `language` varchar(250) NOT NULL,
  `timezone` varchar(50) NOT NULL,
  `dateformat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `name`, `short_description`, `address`, `email`, `phone`, `facebook`, `twitter`, `linkedin`, `instagram`, `youtube`, `logo`, `favicon`, `country`, `currency`, `currency_icon`, `language`, `timezone`, `dateformat`) VALUES
(1, 'ROYAL EYE HOSPITAL', 'ROYAL EYE HOSPITAL', '', 'BIBIR BAZAR ROAD, ADARSHA SADAR, CUMILLA', '', '01767-622322', '', '', '', '', '', '4f190a5b190c94cc7d920f0c6a74535b.jpeg', '481da8be288c83ee345bce7e9a6d54b5.jpeg', 'BD', 'BD', '$', 'english', 'Asia/Dhaka', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(500) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `work_exp` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `emergency_contact_no` varchar(255) NOT NULL,
  `dob` int(11) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `date_of_joining` int(11) NOT NULL,
  `date_of_leaving` int(11) NOT NULL,
  `local_address` varchar(300) NOT NULL,
  `permanent_address` varchar(300) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `account_title` varchar(300) NOT NULL,
  `bank_account_no` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `lang_id` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `basic_salary` decimal(10,2) NOT NULL,
  `staff_type` int(11) NOT NULL,
  `hourly_rate` decimal(8,2) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `joining_letter` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `create_user` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `employee_id`, `department`, `designation_id`, `ip_address`, `first_name`, `last_name`, `email`, `roles_id`, `qualification`, `work_exp`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `lang_id`, `bank_branch`, `basic_salary`, `staff_type`, `hourly_rate`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `is_active`, `picture`, `create_user`, `create_date`) VALUES
(1, '', 0, 0, '', 'Admin', '', 'litan@gmail.com', 1, '', '', '', '', '', '', 0, '', 0, 0, '', '', '', '', '', '', '', '', '0.00', 0, '0.00', '', '', '', '', '', '', 1, '0.png', 0, 0),
(14, '', 0, 4, '', 'Alim ', '', 'alim@gmail.com', 6, '', '', '', '', '01123', '', 1742580000, '', 1742580000, 0, '', '', 'Male', '', '', '', '', '', '0.00', 1, '0.00', '', '', '', '', '', '', 1, '0.png', 0, 1742629052),
(15, '', 0, 0, '', 'ABU RASEL ', ' Kabir', 'admin2@gmail.com', 2, '', '', '', '', 'admin2@gmail.com', '', 1744912800, '', 1744912800, 0, '', '', '', '', '', '', '', '', '0.00', 1, '0.00', '', '', '', '', '', '', 1, '0.png', 0, 1744970425);

-- --------------------------------------------------------

--
-- Table structure for table `testinfo`
--

CREATE TABLE `testinfo` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `testFee` decimal(10,0) NOT NULL,
  `is_active` int(11) NOT NULL,
  `create_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testinfo`
--

INSERT INTO `testinfo` (`id`, `name`, `categories_id`, `testFee`, `is_active`, `create_date`) VALUES
(51, 'OUT DOOR FEE', 2, '100', 1, 1760196810),
(52, 'Test One Part', 2, '100', 1, 1760282265);

-- --------------------------------------------------------

--
-- Table structure for table `upazila`
--

CREATE TABLE `upazila` (
  `id` int(11) NOT NULL,
  `district_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `upazila`
--

INSERT INTO `upazila` (`id`, `district_id`, `name`, `is_active`, `create_date`) VALUES
(2, 1, 'Brahmanpara', 1, 1759902726),
(3, 1, 'Chandina', 1, 1759902743);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_statement`
--
ALTER TABLE `account_statement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_users_info`
--
ALTER TABLE `auth_users_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_no` (`contact_no`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phrase` (`phrase`);

--
-- Indexes for table `login_credential`
--
ALTER TABLE `login_credential`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testinfo`
--
ALTER TABLE `testinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazila`
--
ALTER TABLE `upazila`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_statement`
--
ALTER TABLE `account_statement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1218;

--
-- AUTO_INCREMENT for table `auth_users_info`
--
ALTER TABLE `auth_users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1268;

--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1213;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `login_credential`
--
ALTER TABLE `login_credential`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1230;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `testinfo`
--
ALTER TABLE `testinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `upazila`
--
ALTER TABLE `upazila`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
