-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2024 at 05:27 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodcts_alain_fernandez_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `type`, `name`, `email`, `password`, `remember_token`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(3, 1, 'admin', 'admin@alainfernandez.com', '$2y$10$5hZKsbe9LOCDTm/yn4OZqeLCcFBvmWoDh16RfL6kmSUkJa/pLaYhS', NULL, 1, 0, '2023-12-12 18:18:05', '2024-01-12 18:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `category_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `topic`, `slug`, `short_desc`, `long_desc`, `img_path`, `category_id`, `created_at`, `is_featured`, `updated_at`, `is_active`, `is_deleted`) VALUES
(26, 'Type Your Heading Here', NULL, 'type-your-heading-here', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.', '<p><strong><span style=\"font-size:24px\">Lorem ipsum dolor sit&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>', 'Uploads/Blogs/thumbnails/26111641094897/SVr27APImkl4JlvhGlamr9vkaCTQEhoAHhObTNJ7.png', '3', '2024-01-12 19:50:01', '0', '2024-01-12 19:50:01', 1, 0),
(27, 'Type Your Heading Here', NULL, 'type-your-heading-here-1', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.', '<p><strong><span style=\"font-size:24px\">Lorem ipsum dolor sit&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>', 'Uploads/Blogs/thumbnails/26111641094897/SVr27APImkl4JlvhGlamr9vkaCTQEhoAHhObTNJ7.png', '3', '2024-01-12 19:50:01', '0', '2024-01-12 19:55:52', 1, 0),
(28, 'Type Your Heading Here', NULL, 'type-your-heading-here-2', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.', '<p><strong><span style=\"font-size:24px\">Lorem ipsum dolor sit&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>', 'Uploads/Blogs/thumbnails/26111641094897/SVr27APImkl4JlvhGlamr9vkaCTQEhoAHhObTNJ7.png', '3', '2024-01-12 19:50:01', '0', '2024-01-12 19:55:57', 1, 0),
(29, 'Type Your new Heading Here', NULL, 'type-your-new-heading-here-1', 'Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.', '<p><strong><span style=\"font-size:24px\">Lorem ipsum dolor sit&nbsp;</span></strong></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>\r\n\r\n<p><span style=\"font-size:14px\">Lorem ipsum dolor sit amet,consectetur adipiscing elit, sed do eiusm-od tempor incididunt magna aliqua.&nbsp;</span></p>', 'Uploads/Blogs/thumbnails/26111641094897/SVr27APImkl4JlvhGlamr9vkaCTQEhoAHhObTNJ7.png', '3', '2024-01-12 19:50:01', '0', '2024-01-12 19:56:02', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` tinyint(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_delete` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `title`, `slug`, `created_at`, `updated_at`, `is_active`, `is_delete`) VALUES
(3, 'dummy', 'dummy', '2024-01-12 19:46:20', '2024-01-12 19:47:09', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_menu` tinyint(11) DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `slug`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(2, 'products', 'products', 1, 0, '2023-08-25 18:16:55', '2023-08-25 18:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `flag_type` varchar(255) DEFAULT NULL,
  `flag_value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag_additionalText` text,
  `is_active` tinyint(4) DEFAULT '1',
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `flag_type`, `flag_value`, `created_at`, `updated_at`, `flag_additionalText`, `is_active`, `is_deleted`) VALUES
(1963, 'FACEBOOK', 'https://www.facebook.com/', '2021-11-10 03:49:50', '2024-01-12 17:57:38', 'https://www.facebook.com/', 1, 0),
(1964, 'INSTAGRAM', 'https://www.instagram.com/', '2021-11-10 03:49:50', '2021-11-10 03:49:50', 'https://www.instagram.com/', 1, 0),
(1965, 'YOUTUBE', 'https://www.youtube.com/', '2021-11-10 03:49:50', '2021-11-10 03:49:50', 'https://www.youtube.com/', 1, 0),
(1966, 'COMPANYEMAIL', 'infinitiranger21@icloud.com', '2021-11-10 03:49:50', '2024-01-12 13:07:31', 'infinitiranger21@icloud.com', 1, 0),
(1967, 'COMPANYPHONE', '239-494-0350', '2021-11-10 03:49:50', '2024-01-12 13:07:31', '239-494-0350', 1, 0),
(1968, 'COMPANYADDRESS', 'Demo adress,1234', '2021-11-10 03:49:50', '2024-01-12 13:07:31', 'Demo adress,1234', 1, 0),
(1969, 'EXTERNALEMAIL', 'info@compfit.com', '2022-02-21 16:25:48', '2022-07-18 10:40:07', 'info@compfit.com', 1, 0),
(1970, 'TWITTER', 'https://www.twitter.com/', '2022-02-21 16:26:17', '2022-02-21 11:30:04', 'https://www.twitter.com/', 1, 0),
(1971, 'EXTRADELIVERYFEE', '5', '2022-04-18 18:17:53', '2022-04-18 13:47:24', '5', 1, 0),
(1972, 'TAX', '7', '2022-04-18 18:19:36', '2022-04-18 13:47:24', '7', 1, 0),
(1973, 'DAMAGEWAIVER', '10', '2022-04-18 18:20:54', '2022-04-18 13:47:24', '10', 1, 0),
(1974, 'PINTEREST', 'https://www.pinterest.com/', '2022-04-20 22:12:22', '2022-04-20 17:19:43', 'https://www.pinterest.com/', 1, 0),
(1975, 'LINKEDIN', 'https://www.linkedin.com/', '2022-04-20 22:12:50', '2022-04-20 17:19:43', 'https://www.linkedin.com/', 1, 0),
(1976, 'BUSINESSHOURS', '3:30 p.m.-8:30 p.m.We have 24 Hour Availability', '2021-11-10 03:49:50', '2022-04-20 17:19:53', '3:30 p.m.-8:30 p.m.We have 24 Hour Availability', 1, 0),
(1977, 'COMPANYPHONE2', '(951) 225-1331', '2021-11-10 03:49:50', '2022-06-16 08:30:11', '(951) 225-1331', 1, 0),
(1978, 'COMPANYPHONE3', '(909) 247-1550', '2021-11-10 03:49:50', '2023-12-29 12:46:59', '(909) 247-1550', 1, 0),
(1979, 'SHIPPINGPRICE', '22.37', '2021-11-10 03:49:50', '2023-12-29 12:52:10', '22.37', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `page_name` varchar(500) DEFAULT NULL,
  `page_heading` text CHARACTER SET utf8,
  `content1` text CHARACTER SET utf8,
  `content2` text CHARACTER SET utf8,
  `content3` text CHARACTER SET utf8,
  `content4` text CHARACTER SET utf8,
  `content5` text CHARACTER SET utf8,
  `content6` text CHARACTER SET utf8,
  `content7` text CHARACTER SET utf8,
  `img1` text CHARACTER SET utf8,
  `img2` text CHARACTER SET utf8,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(100) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `fees` int(100) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `winning_amount` int(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `title`, `slug`, `fees`, `expiry_date`, `is_active`, `winning_amount`, `created_at`, `updated_at`, `is_deleted`) VALUES
(22, 'contest 2', 'contest-2', 200, '2024-02-20', 1, 2000, '2023-12-15 17:21:30', '2023-12-18 17:37:46', 0),
(24, 'contest 1', 'contest-1-2', 100, '2023-12-17', 1, 1000, '2023-12-15 17:22:30', '2023-12-18 17:38:39', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contest_participants`
--

CREATE TABLE `contest_participants` (
  `id` int(11) NOT NULL,
  `user_id` tinyint(11) DEFAULT NULL,
  `contest_id` tinyint(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img_path` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `vote` int(100) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_participants`
--

INSERT INTO `contest_participants` (`id`, `user_id`, `contest_id`, `name`, `img_path`, `created_at`, `updated_at`, `vote`, `is_active`) VALUES
(36, 22, 24, 'Michael Orr', 'uploads/contest/participants/design-images/LWYs9ubvWYfPkPuDa9nW9vQvkqhg8DaxlQRjnt3J.png', '2023-12-19 16:44:52', '2023-12-19 16:44:52', NULL, 1),
(41, 22, 22, 'Olivia Hurley', NULL, '2023-12-19 17:15:16', '2023-12-19 17:15:16', NULL, 1),
(42, 25, 22, 'david design', NULL, '2023-12-19 18:00:06', '2023-12-19 18:00:06', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img_path` varchar(800) DEFAULT NULL,
  `short_desc` text NOT NULL,
  `course_type` int(11) DEFAULT NULL,
  `scorm_fIle` text,
  `pdf_file` text,
  `course_link` text,
  `course_email` text,
  `course_password` text,
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(255) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer` text CHARACTER SET utf8,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `slug`, `created_at`, `is_active`, `updated_at`) VALUES
(1, 'Are all your team members veterans?', 'While many are veterans, we value diverse backgrounds, ensuring a well-rounded and skilled team.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(2, 'Can I purchase firearms online, or is it in-store only?', 'Yes, you can purchase firearms online, subject to all legal requirements and regulations.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(3, 'Do you offer training for first-time firearm owners?', 'Absolutely, we provide comprehensive training for individuals at all experience levels.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(4, 'What sets your products apart from other retailers?', 'We prioritize quality, functionality, and reliability, ensuring our offerings meet the highest standards in the industry.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(5, 'Is there a return policy for purchased items?', 'Yes, we have a return policy. Please refer to our Returns and Exchanges page for detailed information.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(6, 'Can you assist with firearm licenses and permits?', 'While we don\'t directly handle licensing, we can guide you through the process and connect you with relevant resources.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(7, 'Are your firearms and accessories compliant with state regulations?', 'We stay informed on state laws and ensure our products comply with all relevant regulations.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(8, 'Is there a warranty on your products?', 'Yes, our products come with warranties. Details vary, so check the specific product for warranty information.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(9, 'Do you offer bulk purchasing or discounts for law enforcement?', 'Yes, we have special programs for law enforcement. Contact us directly for more information on bulk purchasing and discounts.', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28'),
(10, 'How can I join your mission and become part of the Alain Fernandez family?', 'We\'re always looking for passionate individuals. Contact us through the website for current opportunities or reach out to us directly', NULL, '2024-01-19 20:58:28', 1, '2024-01-19 20:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `img_path` text,
  `title` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `img_path`, `title`, `created_at`, `updated_at`) VALUES
(28, 'uploads/galleries/thumbnails/cTLy3ljQ6BcsNB8AGykvTQYI4aPkdmjSB0LOsSCN.png', NULL, '2023-12-22 12:30:03', '2023-12-22 12:30:03'),
(29, 'uploads/galleries/thumbnails/Q9w7npc03IpADYUG6SQB10fXIj1jmXlR0tnRRTb5.png', NULL, '2023-12-22 12:30:18', '2023-12-22 12:30:18'),
(30, 'uploads/galleries/thumbnails/oLjF6P0eoueWx1Yg4HbQ7QmShXTDzZyQoXZHaxwa.png', NULL, '2023-12-22 12:30:30', '2023-12-22 12:30:30'),
(31, 'uploads/galleries/thumbnails/uYnxjAzzqR6yqnbj3ccMWjLlPmlGNiIq6aRjoDmF.png', NULL, '2023-12-22 15:06:53', '2023-12-22 15:06:53'),
(32, 'uploads/galleries/thumbnails/pfmykwUHCPm8qqROQY59cbvP8MwsiNm5WAOyi8qZ.png', NULL, '2023-12-22 15:07:10', '2023-12-22 15:07:10'),
(33, 'uploads/galleries/thumbnails/Zdfv9VGDpZKr1CqY33MFDlFXkf0SEHOQ6STHqdCB.png', NULL, '2023-12-22 15:07:26', '2023-12-22 15:07:26'),
(34, 'uploads/galleries/thumbnails/dh8NIsNpkBZKJXY81g4vz1sWhjQvScT3m0exuRPS.png', NULL, '2023-12-22 15:07:44', '2023-12-22 15:07:44'),
(35, 'uploads/galleries/thumbnails/aMmR5aIDGJLSiMgGxSUdvA2zw2zqQjTl8f03MUBz.png', NULL, '2023-12-22 15:08:05', '2023-12-22 15:08:05'),
(36, 'uploads/galleries/thumbnails/DYGxcy3LDaVQjOIT7m9yXKra0KbysTPFOa5w62Cq.png', NULL, '2023-12-22 15:08:20', '2023-12-22 15:08:20'),
(37, 'uploads/galleries/thumbnails/MrTdWJxHwWOJbdsZ1Km3ke7arGc0TNB2zlny3j2C.png', NULL, '2023-12-22 15:09:12', '2023-12-22 15:09:13'),
(38, 'uploads/galleries/thumbnails/ber44tCpI5xnMm8TVQ0SbMdTn6GXqEYXawVpkvQA.png', NULL, '2023-12-22 15:09:31', '2023-12-22 15:09:31'),
(39, 'uploads/galleries/thumbnails/U6OIhJv0NM3iCl2UchVVBDTOI8PaZ0jiOHb4lnWV.png', NULL, '2023-12-22 15:09:55', '2023-12-22 15:09:55'),
(40, 'uploads/galleries/thumbnails/Rc4yhM88KuG8EQr4NclFKBMhwnckgdrcMPNQLjSZ.png', NULL, '2023-12-22 15:10:08', '2023-12-22 15:10:08'),
(41, 'uploads/galleries/thumbnails/kt3VpVL8ux8powZdBQiTOD8RDjRwYiiz6ZzuXiu5.png', NULL, '2023-12-22 15:10:26', '2023-12-22 15:10:26'),
(42, 'uploads/galleries/thumbnails/TuI9oRDASY0xkLBClMscHZk97WB0V3q2yXgOCRSB.png', NULL, '2023-12-22 15:10:41', '2023-12-22 15:10:41'),
(43, 'uploads/galleries/thumbnails/lps07WAIKriQlxZU1iFRYYV8raclOuwQUJBKP7TO.png', NULL, '2023-12-22 15:10:56', '2023-12-22 15:10:56'),
(44, 'uploads/galleries/thumbnails/T9Y177Qr3RAPmckku0JyH4nD3vHZvZKTi3dSvaNA.png', NULL, '2023-12-22 15:11:18', '2023-12-22 15:11:18'),
(45, 'uploads/galleries/thumbnails/UfdEcIWcf8huzVDJ6jPcCI7VewTwUvw4ncJVYBBl.png', NULL, '2023-12-22 15:11:32', '2023-12-22 15:11:32'),
(46, 'uploads/galleries/thumbnails/v1EG1I3eMa0VhJg7yJciVUuEfAqvlW5PSrg6ew3h.png', NULL, '2023-12-22 15:11:50', '2023-12-22 15:11:50'),
(47, 'uploads/galleries/thumbnails/Pes8jciHmYCSLgOCa13M2ZWtP1C4w6lGAR7Cc6TI.png', NULL, '2023-12-22 15:12:06', '2023-12-22 15:12:06'),
(48, 'uploads/galleries/thumbnails/r0fLA3EkkzXD7qKsEiZMCYXFRTmEnwFQEzvRhqoV.png', NULL, '2023-12-22 15:12:21', '2023-12-22 15:12:21'),
(49, 'uploads/galleries/thumbnails/I3gtBFdF9tsqa018CalSyjQSDIRtA8CHraixQBj5.png', NULL, '2023-12-22 15:12:35', '2023-12-22 15:12:35'),
(50, 'uploads/galleries/thumbnails/jRFvVffF35lni4tspyrhyub0hP7ihohXhlJFEYP1.png', NULL, '2023-12-22 15:12:50', '2023-12-22 15:12:50'),
(51, 'uploads/galleries/thumbnails/1R2cJalyrhvi6jkBwMITA2orzRMOLBd4bINcvnhY.png', NULL, '2023-12-22 15:13:04', '2023-12-22 15:13:04'),
(52, 'uploads/galleries/thumbnails/11ZcuvsQqxtzPSbiMc291C5U0nWF1Imzo6sCyb6J.png', NULL, '2023-12-22 15:13:22', '2023-12-22 15:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `imagetable`
--

CREATE TABLE `imagetable` (
  `id` int(11) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `img_path` text CHARACTER SET utf8mb4,
  `footer_logo` text,
  `color_code` varchar(255) DEFAULT NULL,
  `headings` text CHARACTER SET utf8,
  `subHeading` varchar(255) DEFAULT NULL,
  `long_desc` text,
  `btn_text` text,
  `btn_link` text,
  `video_link` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) DEFAULT '1',
  `is_active_img` varchar(1) DEFAULT '1',
  `additional_attributes` text,
  `img_href` text,
  `img_width` varchar(255) DEFAULT NULL,
  `img_height` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagetable`
--

INSERT INTO `imagetable` (`id`, `table_name`, `img_path`, `footer_logo`, `color_code`, `headings`, `subHeading`, `long_desc`, `btn_text`, `btn_link`, `video_link`, `created_at`, `updated_at`, `type`, `is_active_img`, `additional_attributes`, `img_href`, `img_width`, `img_height`) VALUES
(10, 'logo', 'Uploads/Logo/124949649293/kswfs1DUq3eP56JmTNeYjmzkjZfzNJPudyObVHb9.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 14:12:46', '2023-08-25 14:12:46', 1, '1', NULL, NULL, NULL, NULL),
(11, 'logo', 'Uploads/Logo/1134060611791/n6YoFqNEjR6r5jMGCzePzyvD9U6FXXJB2BwlF3V4.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-25 14:13:39', '2023-08-25 14:13:39', 1, '1', NULL, NULL, NULL, NULL),
(12, 'logo', 'Uploads/Logo/1211462313381/pfi48lv8irzli2o7zq2n9WTr7ksMI8R7NT7rlkL1.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-28 18:52:40', '2023-08-28 18:52:40', 1, '1', NULL, NULL, NULL, NULL),
(13, 'logo', 'Uploads/Logo/121015057124/OwpqXCXGWdUavrNA9oa99dxQ0jGNP9Ikw1FMTdt3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-08-28 18:52:58', '2023-08-28 18:52:58', 1, '1', NULL, NULL, NULL, NULL),
(17, 'logo', 'Uploads/Logo/1192822057670/dDRU2PMHG6JgathGbd6D1fGoVm5WQmTGb0FRbH6w.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-09-19 14:25:40', '2023-09-19 14:25:40', 1, '1', NULL, NULL, NULL, NULL),
(24, 'logo', 'Uploads/Logo/1140282987142/wumL91qS4flzxyVjEk4HLwcD6LzFNoPn7wQ0wUlW.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-22 12:42:34', '2023-11-22 12:42:34', 1, '1', NULL, NULL, NULL, NULL),
(30, NULL, 'Uploads/homeslider/124747635640/rtR6d8nHG36uUIql2ru9ONzevUkIvjPrHNVFQvmk.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-04 17:42:43', '2023-12-04 12:42:43', 1, '1', NULL, NULL, NULL, NULL),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-04 12:48:35', '2023-12-04 12:48:35', 1, '1', NULL, NULL, NULL, NULL),
(37, 'logo', 'Uploads/Logo/1187053584554/OJhEOa3fWNzD1GLrXwaCURxzWYblTRIf8vlXpZTu.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-08 14:21:54', '2023-12-08 14:21:54', 1, '1', NULL, NULL, NULL, NULL),
(38, 'logo', 'Uploads/Logo/1115244202665/EFEN5wqNixK35gtoFWHO9Lr3JeygWOMkoY1giJD5.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-08 14:25:00', '2023-12-08 14:25:00', 1, '1', NULL, NULL, NULL, NULL),
(39, 'logo', 'Uploads/Logo/1139161652765/mLY09pW3MLYK6qv6dDUKwuZJPSfHoFIJJ6iLhBr2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-08 14:25:37', '2023-12-08 14:25:37', 1, '1', NULL, NULL, NULL, NULL),
(40, 'about', 'Uploads/banners/40113442397829/zth7g4cfNBhoYoVNL5iGEIVLdixJxS7V30RjcE4V.jpg', NULL, NULL, 'About Us', NULL, NULL, NULL, NULL, NULL, '2024-01-06 00:17:42', '2024-01-06 06:17:42', 2, '1', NULL, NULL, NULL, NULL),
(48, 'logo', 'Uploads/Logo/3198869315527/ke1psNziFXvZVkigKH1ojGfJiy5yq8uRcC9hPyEw.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 16:21:31', '2023-12-20 16:21:31', 1, '1', NULL, NULL, NULL, NULL),
(49, 'logo', 'Uploads/Logo/3116470872561/EPZdM51sYwUzwFPK5PZl9cJ2NIMHfvX1kS95mkq6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 16:23:16', '2023-12-20 16:23:16', 1, '1', NULL, NULL, NULL, NULL),
(50, 'logo', 'Uploads/Logo/378743465032/OakfeF8R3DSonpUOXwIOOdCfYsz0zx9we9HtyAIe.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-20 16:23:36', '2023-12-20 16:23:36', 1, '1', NULL, NULL, NULL, NULL),
(52, 'partyPackage', 'Uploads/homeslider/50591945630/mMvN7WxYfORJIRmZlqGBSpJdkhldbmw9t5scFcuH.png', NULL, NULL, 'Party Package', NULL, NULL, NULL, NULL, NULL, '2023-12-20 23:40:53', '2023-12-20 18:40:53', 2, '1', NULL, NULL, NULL, NULL),
(53, 'services', 'Uploads/homeslider/196080288587/bNfBgpGP8dJM60QW24n0fIL116eIte5D7GsZ0pN9.png', NULL, NULL, 'Services', NULL, NULL, NULL, NULL, NULL, '2023-12-20 23:41:54', '2023-12-20 18:41:54', 2, '1', NULL, NULL, NULL, NULL),
(55, 'planningTip', 'Uploads/homeslider/199648404899/HzRjhBpBDCLbvqXgmxWQClOPfGtFYkuLgHZ24BbD.png', NULL, NULL, 'Planning Tips', NULL, NULL, NULL, NULL, NULL, '2023-12-20 23:51:24', '2023-12-20 18:51:24', 2, '1', NULL, NULL, NULL, NULL),
(56, 'blog', 'Uploads/homeslider/63826075030/owBkgijBJLeBe271iODzDCRlehmjgbwPhfSeauYM.png', NULL, NULL, 'Blogs', NULL, NULL, NULL, NULL, NULL, '2023-12-20 23:56:07', '2023-12-20 18:56:07', 2, '1', NULL, NULL, NULL, NULL),
(57, 'quoteRequest', 'Uploads/homeslider/86353537085/zkIJc7qbub6Osx4HOKrqAusw70kNKDxJ2Bi0xMna.png', NULL, NULL, 'Quote Request', NULL, NULL, NULL, NULL, NULL, '2023-12-21 00:01:29', '2023-12-20 19:01:29', 2, '1', NULL, NULL, NULL, NULL),
(60, 'cart', 'Uploads/homeslider/159557803274/qqghcfIJEwE2al9ymbx5Dhus4efHbPGgJzu24v01.png', NULL, NULL, 'Add To Cart', NULL, NULL, NULL, NULL, NULL, '2023-12-21 17:40:09', '2023-12-21 12:40:09', 2, '1', NULL, NULL, NULL, NULL),
(62, 'products', 'Uploads/homeslider/31098320018/NyCMyqqOeAY79j2NMbPppsXUR5z7N74L9Uy1ro4l.png', NULL, NULL, 'Products', NULL, NULL, NULL, NULL, NULL, '2023-12-21 21:45:09', '2023-12-21 16:45:09', 2, '1', NULL, NULL, NULL, NULL),
(63, 'logo', 'Uploads/Logo/332744008738/y1KrGFkImSpoSI5XRKojnu62PuVnxwgQ96uqL6Uf.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-02 06:17:40', '2024-01-02 06:17:40', 1, '1', NULL, NULL, NULL, NULL),
(65, 'logo', 'Uploads/Logo/351694945918/uu6jloUKFM6XVJ0OoumKQqqI0ted5KM3xbGeiME6.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-01-12 13:14:11', '2024-01-12 13:14:11', 1, '1', NULL, NULL, NULL, NULL),
(66, 'welcome-slider', 'Uploads/welcome-slider/thumbnails/6668288452668/ipaXrCAudw8UPRG1r9uO2swSvNEucEfBjaI991XE.png', NULL, NULL, 'ELEVATING EXPERIENCES', 'IN WEAPONS AND BEYOND', 'Veteran-owned, family-driven. Exceptional weapons and products meet personalized service. Join our mission of respect, partnership, and excellence.', NULL, NULL, NULL, '2024-01-19 20:45:45', '2024-01-20 02:45:45', 3, '1', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` text CHARACTER SET utf8,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text CHARACTER SET utf8,
  `is_read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `fname`, `lname`, `company_name`, `email`, `phone`, `subject`, `message`, `is_read`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(27, 'hobamo', 'bimete', NULL, 'sybater@mailinator.com', 'fasotala', NULL, 'Laboris vitae nihil', 1, '2024-01-12 15:50:12', '2024-01-12 15:51:54', 1, 0),
(28, 'hozu@mailinator.com', 'damom@mailinator.com', NULL, 'cysogeqore@mailinator.com', 'fufy@mailinator.com', NULL, 'Eligendi tempora sed', 1, '2024-01-24 22:16:33', '2024-01-24 22:17:34', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `product_details` text,
  `amount_paid` int(11) DEFAULT NULL,
  `amount_due` int(11) DEFAULT NULL,
  `1_month` int(11) DEFAULT NULL,
  `2_month` int(11) DEFAULT NULL,
  `3_month` int(11) DEFAULT NULL,
  `4_month` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_flag`
--

CREATE TABLE `m_flag` (
  `id` int(11) NOT NULL,
  `flag_type` varchar(100) NOT NULL,
  `flag_value` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flag_additionalText` text,
  `has_image` varchar(1) DEFAULT '0',
  `is_active` varchar(1) DEFAULT '1',
  `is_config` varchar(1) DEFAULT '0',
  `flag_show_text` text,
  `is_featured` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_flag`
--

INSERT INTO `m_flag` (`id`, `flag_type`, `flag_value`, `created_at`, `updated_at`, `flag_additionalText`, `has_image`, `is_active`, `is_config`, `flag_show_text`, `is_featured`, `is_deleted`, `user_id`) VALUES
(90, 'HOMETXT2', 'HOMETXT2', '2023-09-20 00:49:00', '2023-09-20 00:49:00', 'Trusted By Over 100+ Customers', '0', '1', '0', '', 1, 0, 0),
(93, 'HOMETXT15', 'HOMETXT15', '2023-09-20 00:56:13', '2023-09-20 00:56:13', '&lt;ul&gt;&lt;li&gt;Sales Funnel set up with Videos Sales Letters&lt;/li&gt;&lt;li&gt;The real estate workflows automation&lt;/li&gt;&lt;li&gt;Get Live Support&lt;/li&gt;&lt;/ul&gt;', '0', '1', '0', '', 1, 0, 0),
(94, 'HOMETXT25', 'HOMETXT25', '2023-09-20 00:59:55', '2023-09-20 00:59:55', 'Join Our Newsletter', '0', '1', '0', '', 1, 0, 0),
(97, 'ABOUTTXT12', 'ABOUTTXT12', '2023-09-20 01:04:42', '2023-09-20 01:04:42', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,Lorem ipsum dolor sit amet, consetetur.&lt;br&gt;&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,Lorem ipsum dolor sit amet, consetetur.&lt;br&gt;​​​​​​​&lt;br&gt;Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,Lorem ipsum dolor sit amet, consetetur.&lt;br&gt;&lt;br&gt;', '0', '1', '0', '', 1, 0, 0),
(99, 'IN4', 'IN4', '2023-12-11 22:05:26', '2023-12-11 22:05:26', 'Create Design', '0', '1', '0', '', 1, 0, 0),
(102, 'f2', 'f2', '2023-12-11 22:53:48', '2023-12-11 22:53:48', 'Let’s keep onmm', '0', '1', '0', '', 1, 0, 0),
(104, 'f10', 'f10', '2023-12-11 22:57:43', '2023-12-11 22:57:43', 'Let’s keep on', '0', '1', '0', '', 1, 0, 0),
(106, 'IN6', 'IN6', '2023-12-19 23:39:50', '2023-12-19 23:39:50', 'KEEP UP-TO-DATE ON THE LATEST', '0', '1', '0', '', 1, 0, 0),
(107, 'IN22', 'IN22', '2024-01-01 21:15:35', '2024-01-01 21:15:35', 'We will take care of&amp;nbsp; all your corporate events.', '0', '1', '0', '', 1, 0, 0),
(109, 'IN1', 'IN1', '2024-01-03 20:34:24', '2024-01-03 20:34:24', 'About us', '0', '1', '0', '', 1, 0, 0),
(111, 'INNERCONTENT3', 'INNERCONTENT3', '2024-01-12 21:57:30', '2024-01-12 21:57:30', 'FEATURED PRODUCTS', '0', '1', '0', '', 1, 0, 0),
(113, 'INNERCONTENT5', 'INNERCONTENT5', '2024-01-12 21:58:47', '2024-01-12 21:58:47', 'about&lt;br&gt;​​​​​​​ ALAIN FERNANDEZ', '0', '1', '0', '', 1, 0, 0),
(117, 'INNERCONTENT6', 'INNERCONTENT6', '2024-01-12 21:59:52', '2024-01-12 21:59:52', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing&lt;br&gt;&lt;br&gt;​​​​​​​Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing&lt;br&gt;', '0', '1', '0', '', 1, 0, 0),
(127, 'INNERCONTENT28', 'INNERCONTENT28', '2024-01-12 22:33:50', '2024-01-12 22:33:50', 'WHAT OUR CLIENTS SAY', '0', '1', '0', '', 1, 0, 0),
(132, 'HOMECONTENT5', 'HOMECONTENT5', '2024-01-19 20:46:42', '2024-01-19 20:46:42', 'ABOUT&lt;br&gt;​​​​​​​ALAIN FERNANDEZ', '0', '1', '0', '', 1, 0, 0),
(134, 'HOMECONTENT6', 'HOMECONTENT6', '2024-01-19 20:46:56', '2024-01-19 20:46:56', '&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;Welcome to Alain Fernandez, where a unique experience awaits you at the intersection of expertise, respect, and partnership. Established in 2023 by Alain Fernandez, a distinguished 14-year military veteran, licensed private investigator, and certified weapons instructor, our company is more than just a purveyor of quality products – we are a family bound by shared values.&lt;/span&gt;&lt;/span&gt;&lt;br&gt;​​​​​​​&lt;br&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;Alain Fernandez brings a wealth of experience from his military background and a unique perspective gained during his tenure as a marketing consultant for major networks like NBC/ABC and Univision. This distinctive blend of skills has shaped our approach, distinguishing us from the conventional and fostering a deep understanding of the difference between a mere customer and a valued client.&lt;/span&gt;&lt;/span&gt;', '0', '1', '0', '', 1, 0, 0),
(135, 'HOMECONTENT9', 'HOMECONTENT9', '2024-01-19 20:47:10', '2024-01-19 20:47:10', 'HEAR FROM OUR CLIENTS', '0', '1', '0', '', 1, 0, 0),
(136, 'HOMECONTENT11', 'HOMECONTENT11', '2024-01-19 21:02:08', '2024-01-19 21:02:08', 'SUBSCRIBE TO OUR NEWSLETTER', '0', '1', '0', '', 1, 0, 0),
(140, 'INNERCONTENT19', 'INNERCONTENT19', '2024-01-19 21:02:45', '2024-01-19 21:02:45', 'ABOUT&lt;br&gt; ALAIN FERNANDEZ', '0', '1', '0', '', 1, 0, 0),
(142, 'INNERCONTENT21', 'INNERCONTENT21', '2024-01-19 21:02:59', '2024-01-19 21:02:59', '&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;Welcome to Alain Fernandez, where a unique experience awaits you at the intersection of expertise, respect, and partnership. Established in 2023 by Alain Fernandez, a distinguished 14-year military veteran, licensed private investigator, and certified weapons instructor, our company is more than just a purveyor of quality products – we are a family bound by shared values.&lt;/span&gt;&lt;/span&gt;&lt;br&gt;&lt;br&gt;Alain Fernandez brings a wealth of experience from his military background and a unique perspective gained during his tenure as a marketing consultant for major networks like NBC/ABC and Univision. This distinctive blend of skills has shaped our approach, distinguishing us from the conventional and fostering a deep understanding of the difference between a mere customer and a valued client.', '0', '1', '0', '', 1, 0, 0),
(148, 'INNERCONTENT22', 'INNERCONTENT22', '2024-01-19 21:03:30', '2024-01-19 21:03:30', '&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;At Alain Fernandez, our mission goes beyond transactions; it&#039;s about building lasting relationships. We pride ourselves on delivering a personalized experience that transcends the typical retail encounter. There&#039;s no high-pressure sales tactics here, only a dedicated team committed to our core values of respect, integrity, and fostering genuine partnerships.&lt;/span&gt;&lt;/span&gt;&lt;br&gt;&lt;br&gt;&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;As proud Americans and fellow countrymen, we stand firm in our commitment to balance the status quo in our control. The heart of our company beats with a sense of duty, gratitude, and the belief that we can make a positive impact on our community and nation.What sets us apart is not just the quality of our products but the spirit of camaraderie that defines us. Alain Fernandez is not merely a business; it&#039;s a collective endeavor owned entirely by our dedicated employees, both current and future team members. This ownership structure ensures that our commitment to excellence and client satisfaction is unwavering.&lt;br&gt;&lt;br&gt;​​​​​​​As you explore our website, you&#039;ll discover a curated selection of products and services, each designed to enhance your experience and align with our shared values. Thank you for considering Alain Fernandez – a company that goes beyond selling, aiming to be a trusted ally on your journey. May God bless us all as we embark on this venture together.&lt;/span&gt;&lt;/span&gt;&lt;br&gt;', '0', '1', '0', '', 1, 0, 0),
(149, 'INNERCONTENT12', 'INNERCONTENT12', '2024-01-19 21:13:25', '2024-01-19 21:13:25', '&lt;span style=&quot;font-size:11pt&quot;&gt;&lt;span style=&quot;font-family:Arial,sans-serif&quot;&gt;Where expertise meets integrity. Elevate your experience with our curated selection of quality weapons and gear. Join us today.&lt;/span&gt;&lt;/span&gt;', '0', '1', '0', '', 1, 0, 0),
(150, 'PRIVACYPOLICY1', 'PRIVACYPOLICY1', '2024-01-19 21:32:33', '2024-01-19 21:32:33', 'privacy policy', '0', '1', '0', '', 1, 0, 0),
(151, 'PRIVACYPOLICY2', 'PRIVACYPOLICY2', '2024-01-19 21:32:34', '2024-01-19 21:32:34', 'privacy policy', '0', '1', '0', '', 1, 0, 0),
(153, 'TERMSANDCONDITIONS1', 'TERMSANDCONDITIONS1', '2024-01-19 21:33:01', '2024-01-19 21:33:01', 'terms and&amp;nbsp; conditions', '0', '1', '0', '', 1, 0, 0),
(155, 'TERMSANDCONDITIONS2', 'TERMSANDCONDITIONS2', '2024-01-19 21:33:10', '2024-01-19 21:33:10', 'terms and conditions', '0', '1', '0', '', 1, 0, 0),
(156, 'REFUNDPOLICY1', 'REFUNDPOLICY1', '2024-01-19 21:33:19', '2024-01-19 21:33:19', 'refund policy', '0', '1', '0', '', 1, 0, 0),
(157, 'REFUNDPOLICY2', 'REFUNDPOLICY2', '2024-01-19 21:33:19', '2024-01-19 21:33:19', 'refund policy', '0', '1', '0', '', 1, 0, 0),
(158, 'INNERCONTENTFAQ1', 'INNERCONTENTFAQ1', '2024-01-19 21:34:20', '2024-01-19 21:34:20', 'FAQs', '0', '1', '0', '', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `img_path` varchar(800) DEFAULT NULL,
  `short_desc` text NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT '1',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `email`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(15, NULL, 'siqyzu@mailinator.com', '2024-01-12 13:29:49', '2024-01-12 13:29:49', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `apartment` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `note` text,
  `pay_type` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `order_amount` varchar(255) DEFAULT NULL,
  `order_response` text,
  `user_id` int(11) DEFAULT NULL,
  `pay_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `details` text CHARACTER SET utf8,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_limited` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `sub_title`, `short_desc`, `img_path`, `price`, `type`, `is_limited`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(15, 'Regular', 'Starter Plan', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', NULL, '100', 'month', 1, '2023-09-28 04:55:50', '2023-09-28 04:55:50', 1, 0),
(16, 'Plantinum', 'For the best results', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', NULL, '342', 'month', 1, '2023-09-28 04:56:26', '2023-09-28 04:56:26', 1, 0),
(17, 'Standard', 'Most popular', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', NULL, '234', 'month', 1, '2023-09-28 04:57:00', '2023-09-28 04:57:00', 1, 0),
(18, 'Regular', 'Starter Plan', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', NULL, '100', 'year', 1, '2023-09-28 04:57:51', '2023-09-28 04:57:51', 1, 0),
(20, 'Plantinum', 'For the best results', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.', NULL, '342', 'year', 1, '2023-09-28 04:58:53', '2023-09-28 04:58:53', 1, 0),
(22, 'Decor Rental', NULL, NULL, 'C:\\xampp\\tmp\\phpB9C6.tmp', NULL, NULL, NULL, '2023-12-25 14:06:34', '2023-12-25 14:06:34', 1, 0),
(23, 'Decor Rental', NULL, NULL, 'C:\\xampp\\tmp\\phpEF59.tmp', NULL, NULL, NULL, '2023-12-25 14:07:53', '2023-12-25 14:07:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `packages_perks`
--

CREATE TABLE `packages_perks` (
  `id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `perk` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `packages_perks`
--

INSERT INTO `packages_perks` (`id`, `package_id`, `perk`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(120, 15, 'Lorem Ipsum Dolor', '2023-09-28 04:55:50', '2023-09-28 04:55:50', 1, 0),
(124, 16, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:56:26', '2023-09-28 04:56:26', 1, 0),
(125, 16, 'Lorem Ipsum Dolor', '2023-09-28 04:56:26', '2023-09-28 04:56:26', 1, 0),
(126, 16, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:56:26', '2023-09-28 04:56:26', 1, 0),
(127, 16, 'Lorem Ipsum Dolor', '2023-09-28 04:56:26', '2023-09-28 04:56:26', 1, 0),
(128, 17, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:00', '2023-09-28 04:57:00', 1, 0),
(129, 17, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:00', '2023-09-28 04:57:00', 1, 0),
(130, 17, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:00', '2023-09-28 04:57:00', 1, 0),
(131, 17, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:00', '2023-09-28 04:57:00', 1, 0),
(132, 18, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:57:51', '2023-09-28 04:57:51', 1, 0),
(133, 18, 'Lorem Ipsum Dolor', '2023-09-28 04:57:51', '2023-09-28 04:57:51', 1, 0),
(134, 18, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:51', '2023-09-28 04:57:51', 1, 0),
(135, 18, 'Lorem Ipsum', '2023-09-28 04:57:51', '2023-09-28 04:57:51', 1, 0),
(136, 19, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:57:52', '2023-09-28 04:57:52', 1, 0),
(137, 19, 'Lorem Ipsum Dolor', '2023-09-28 04:57:52', '2023-09-28 04:57:52', 1, 0),
(138, 19, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:57:52', '2023-09-28 04:57:52', 1, 0),
(139, 19, 'Lorem Ipsum', '2023-09-28 04:57:52', '2023-09-28 04:57:52', 1, 0),
(140, 20, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:58:53', '2023-09-28 04:58:53', 1, 0),
(141, 20, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:58:53', '2023-09-28 04:58:53', 1, 0),
(142, 20, 'Lorem Ipsum Dolor', '2023-09-28 04:58:53', '2023-09-28 04:58:53', 1, 0),
(143, 20, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:58:53', '2023-09-28 04:58:53', 1, 0),
(144, 21, 'Lorem Ipsum Dolor Amet Consect', '2023-09-28 04:59:34', '2023-09-28 04:59:34', 1, 0),
(145, 21, 'Lorem Ipsum Dolor Amet', '2023-09-28 04:59:34', '2023-09-28 04:59:34', 1, 0),
(146, 21, 'Lorem Ipsum', '2023-09-28 04:59:34', '2023-09-28 04:59:34', 1, 0),
(147, 21, 'Lorem Ipsum', '2023-09-28 04:59:34', '2023-09-28 04:59:34', 1, 0),
(148, 22, 'Lorem Ipsum Dolor', '2023-09-28 05:08:38', '2023-09-28 05:08:38', 1, 0),
(149, 22, 'Lorem Ipsum Dolor', '2023-09-28 05:08:38', '2023-09-28 05:08:38', 1, 0),
(150, 22, 'Lorem Ipsum', '2023-09-28 05:08:38', '2023-09-28 05:08:38', 1, 0),
(151, 23, 'Distinctio In eos v', '2023-09-28 05:09:02', '2023-09-28 05:09:02', 1, 0),
(153, 23, 'Maxime sapiente expe', '2023-09-28 05:09:02', '2023-09-28 05:09:02', 1, 0),
(154, 24, 'lund', '2023-09-28 05:12:08', '2023-09-28 05:12:08', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `party_packages`
--

CREATE TABLE `party_packages` (
  `id` tinyint(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` text,
  `is_active` tinyint(4) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `party_packages`
--

INSERT INTO `party_packages` (`id`, `title`, `img_path`, `is_active`, `created_at`, `updated_at`) VALUES
(1, ' Decor Rentals', 'uploads/galleries/thumbnails/eVa7AZQIk0FtGrlIprmO6vszRvKoN7XPI7RYwv5C.png', 1, '2024-01-09 00:00:11', '2024-01-09 06:00:11'),
(2, 'Full Event Production', 'uploads/galleries/thumbnails/yG4OwclVN6CY0HqNHICGGBWMiIYaWZeIjTv6fSt5.png', 1, '2023-12-25 20:05:28', '2023-12-25 20:05:28'),
(3, 'Floral Designs', 'uploads/galleries/thumbnails/kItmVToVNbTcsKObEexdJHlWIBUAeQ7Zaf1OgMRr.png', 1, '2023-12-25 20:05:36', '2023-12-25 20:05:36'),
(4, '70s Party Package For 50 1234', 'uploads/galleries/thumbnails/bkZR4NyhAphy72jG0hktqBJilBpwPypUm1kd6rRJ.png', 1, '2023-12-25 20:03:49', '2023-12-25 15:03:49'),
(5, 'Reception Package For 50 guest Inside', 'uploads/galleries/thumbnails/jrRBSMZvfukt2A5wjLzdnIiCwmD87zyfKRR3Ywdl.png', 1, '2023-12-25 20:04:09', '2023-12-25 15:04:09'),
(6, 'Package for 100 Guest', 'uploads/galleries/thumbnails/Il5bus5ecxSVNQErOj8UlyxLd8qzcxDRSn1YMZAg.png', 1, '2023-12-25 20:04:46', '2023-12-25 15:04:46'),
(7, 'Tent 30\' X 30\'', 'uploads/galleries/thumbnails/LuFn9qUbjgF0WJPzeY9eAFGqMnitzJvO3YFXM1Wg.jpg', 1, '2024-01-08 23:42:49', '2024-01-09 05:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

CREATE TABLE `payment_logs` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `amount` float(8,2) DEFAULT NULL,
  `name_on_card` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) DEFAULT NULL,
  `transaction_id` text,
  `auth_id` varchar(255) DEFAULT NULL,
  `message_code` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plane`
--

CREATE TABLE `plane` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `stripe_plan` varchar(255) DEFAULT NULL,
  `paypal_product` text,
  `price` int(11) NOT NULL,
  `pkg` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `planning_tips`
--

CREATE TABLE `planning_tips` (
  `id` int(11) NOT NULL,
  `headings` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) DEFAULT '1',
  `is_delete` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `planning_tips`
--

INSERT INTO `planning_tips` (`id`, `headings`, `description`, `created_at`, `updated_at`, `is_active`, `is_delete`) VALUES
(1, 'CERTAIN GUEST MIGHT HAVE SPECIAL DIETARY NEEDS', 'When planning the reception, take into consideration guests who may have special dietary needs (kosher, vegetarian, etc.).', '2023-12-25 17:44:10', '2023-12-25 12:44:10', 1, NULL),
(2, 'WHEN PLANNING GAMES, REMEMBER YOUR AGE GROUP', 'It is important when planning a party to focus on the ages of the invitees. What may seem like an extremely simple game to an adult could prove to be quite complicated to...', '2023-12-25 12:03:45', '2023-12-25 12:03:45', 1, NULL),
(3, 'BEVERAGE CALCULATOR', 'Include beverages in your party food planning. The amount of punch or number of cocktails or beers a guest will drink varies. Allow for the length of the party, the strength of the beverage, the day of the week, the rowdiness of the crowd, or lack thereof...', '2023-12-25 12:46:39', '2023-12-25 12:46:39', 1, NULL),
(4, 'SEATING ARRANGEMENTS AT A DINNER PARTY', 'Planning dinner-party seating requires providing place cards or escort cards, seating the elderly and children near restrooms and grouping close family and friends together.', '2023-12-25 12:47:25', '2023-12-25 12:47:25', 1, NULL),
(5, 'GRADUATION PARTY FAVOR IDEA', 'Have a memory note station. Set up \"note boxes\" for each guest, and paper and pens to write notes to each other. The teens can write their memories of the other person down and stick it in their friend\`s box.', '2023-12-25 12:47:42', '2023-12-25 12:47:42', 1, NULL),
(6, 'RESERVE YOUR RENTALS IN ADVANCE', 'Get everything on your rental \"wish list\" by reserving your rental equipment early, usually three months in advance of your celebration date. However, during the popular summer season, June brides should make reservations as early as six months ahead of time to ensure the availability of certain equipment.', '2023-12-25 12:47:58', '2023-12-25 12:47:58', 1, NULL),
(7, 'WHEN PLANNING GAMES, REMEMBER YOUR AGE GROUP', 'It is important when planning a party to focus on the ages of the invitees. What may seem like an extremely simple game to an adult could prove to be quite complicated to a small child. Remember that...', '2023-12-25 12:48:21', '2023-12-25 12:48:21', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `quantity` int(11) DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `category_id` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `in_deal` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `short_desc`, `long_desc`, `quantity`, `price`, `rating`, `img_path`, `category_id`, `created_at`, `is_featured`, `in_deal`, `updated_at`, `is_active`, `is_deleted`) VALUES
(2, 'Product', 'product-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s.', NULL, NULL, '99', NULL, 'Uploads/products/Images/2212471856753/lxgerjl2SAABq0qPH6ECsdyBqQkejf9aHMUHnH5i.png', '1', '2024-01-15 22:36:21', '1', 0, '2024-01-15 22:47:36', 1, 0),
(3, 'Product', 'product-5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s.', NULL, NULL, '100', NULL, 'Uploads/products/Images/310684730150/ACqorm1UsG9pvlx3K2PANq3i1N9PlRSKh0MvBxu5.png', '2', '2024-01-15 22:45:29', '1', 1, '2024-01-15 23:20:53', 1, 0),
(4, 'Product', 'product-3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\`s.', NULL, NULL, '100', NULL, 'Uploads/products/Images/447938866617/dmJf1Q6cAPz1aBGpm35eFnUupiTtVkxb2xkUQo8G.png', '3', '2024-01-15 22:46:34', '1', 0, '2024-01-15 22:47:15', 1, 0),
(5, 'Product', 'product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\`s.', NULL, NULL, '100', NULL, 'Uploads/products/Images/5212309798436/pu4l5wQiGqjcFR1bCyxiXv7FayTaScDsqoG0dfax.png', '1', '2024-01-15 22:49:31', '1', 0, '2024-01-15 22:49:31', 1, 0),
(6, 'Product', 'product-2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry`s.', NULL, NULL, '99', NULL, 'Uploads/products/Images/2212471856753/lxgerjl2SAABq0qPH6ECsdyBqQkejf9aHMUHnH5i.png', '1', '2024-01-15 22:36:21', '0', 1, '2024-01-15 22:47:36', 1, 0),
(7, 'Product', 'product', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\`s.', NULL, NULL, '100', NULL, 'Uploads/products/Images/5212309798436/pu4l5wQiGqjcFR1bCyxiXv7FayTaScDsqoG0dfax.png', '1', '2024-01-15 22:49:31', '0', 1, '2024-01-15 22:49:31', 1, 0),
(8, 'Product', 'product-4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\`s.', NULL, NULL, '100', NULL, 'Uploads/products/Images/897788680466/D8PYBKZVhk55I77TNkEMimqDrO1PliGsIaGb79dJ.png', '1', '2024-01-15 22:49:31', '0', 1, '2024-01-15 23:20:13', 1, 0),
(9, 'SAVA19201', 'sava19201-1', NULL, NULL, NULL, '157.00', NULL, NULL, NULL, '2024-01-20 02:23:27', '0', NULL, '2024-01-20 02:24:36', 1, 0),
(10, 'SAVA19202', 'sava19202-1', NULL, NULL, NULL, '157.00', NULL, NULL, NULL, '2024-01-20 02:23:27', '0', NULL, '2024-01-20 02:24:36', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `title`, `slug`, `category_code`, `img_path`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, 'firearms', 'firearms-1', NULL, 'Uploads/category/thumbnails/159004520961/0lbEBcpvdl4sRRkqCMzbjc5Br9fFO9iev9Y6O0eR.png', '2024-01-15 22:01:01', '2024-01-15 22:53:09', 1, 0),
(2, 'guns', 'guns', NULL, 'Uploads/category/thumbnails/261644463734/JtmKZ6rTfytJpq6nD6qwyJogQh2UfxL7ydbDQaSi.png', '2024-01-15 22:05:25', '2024-01-15 22:05:25', 1, 0),
(3, 'ammunition', 'ammunition', NULL, 'Uploads/category/thumbnails/356971894945/ra0wzzO5fk4STKdbyvRrSJDL2eoJ95716tTWhKXk.png', '2024-01-15 22:07:57', '2024-01-15 22:07:57', 1, 0),
(4, 'Action Kits', 'action-kits-1', 'ACTION_KITS', NULL, '2024-01-20 00:00:07', '2024-01-20 02:26:25', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `img_path` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `img_path`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(110, 7, 'Uploads/Product/other-images/187927096282/CxGfvRETK9vhxq83Z55nM51hpqt5SxnzzQOkBQyb.png', '2023-08-30 02:22:15', '2023-08-30 02:22:15', 1, 0),
(112, 7, 'Uploads/Product/other-images/1543817189849/XeFaekcCFvesdcbgs74nTxb2O7oI98vFg91LU5Yl.png', '2023-08-30 02:22:15', '2023-08-30 02:22:15', 1, 0),
(113, 7, 'Uploads/Product/other-images/1780865755347/6x2E5W9EprOPeGYCEsikz2KWJdnLJOyUNRLE8Vs6.jpg', '2023-08-30 02:25:17', '2023-08-30 02:25:17', 1, 0),
(114, 7, 'Uploads/Product/other-images/212288147646/y8949KKWvzF626tpjYR8hI2wtwnAWhFRxzKHk8gu.jpg', '2023-08-30 02:54:28', '2023-08-30 02:54:28', 1, 0),
(115, 9, 'Uploads/Product/other-images/324156577350/l6kdxCtJtJVJFV6ldThpRpHh5GPbQv2T3WUcR6c1.jpg', '2023-12-25 16:57:50', '2023-12-25 16:57:50', 1, 0),
(116, 9, 'Uploads/Product/other-images/1481514752723/zlB8xxxV8qsjleCB4UHvitR7qxLKEjsAaey0Ctif.webp', '2023-12-25 16:57:50', '2023-12-25 16:57:50', 1, 0),
(129, 2, 'Uploads/Product/other-images/1529793351820/SGUlXuwJX8iHzxxGEWrK8tCtxwvOxEZbKUzPmmaU.png', '2024-01-15 16:36:21', '2024-01-15 16:36:21', 1, 0),
(130, 2, 'Uploads/Product/other-images/393067593992/mM2idoxPTtPBaFeIcBRwobEdHAvTlWAKJvsEFsSI.png', '2024-01-15 16:36:21', '2024-01-15 16:36:21', 1, 0),
(131, 2, 'Uploads/Product/other-images/1557992930211/1uSWKzRYnGpzK0RLAW4Nh0ZcrTGRHbBp8CazVAxz.png', '2024-01-15 16:36:21', '2024-01-15 16:36:21', 1, 0),
(132, 3, 'Uploads/Product/other-images/101002685617/ucsVi6n7xrqPQiQh40HuKmjnuv88govxOhjzLyQe.png', '2024-01-15 16:45:30', '2024-01-15 16:45:30', 1, 0),
(133, 3, 'Uploads/Product/other-images/155853386298/Pvgce4yTqW9BkYdVvd49V9O879WDBIMOCHyPXo8D.png', '2024-01-15 16:45:30', '2024-01-15 16:45:30', 1, 0),
(134, 3, 'Uploads/Product/other-images/319104706348/Heaw6iTmdjO8HmjI0DESpNda5qEavEe04e4CdBGC.png', '2024-01-15 16:45:30', '2024-01-15 16:45:30', 1, 0),
(135, 4, 'Uploads/Product/other-images/1653208180990/UxbnvCsstVJgLz2vDQCqNJpogO5HbN71EQIU23jg.png', '2024-01-15 16:46:34', '2024-01-15 16:46:34', 1, 0),
(136, 4, 'Uploads/Product/other-images/1412972004229/FHjBbd0DI8J5dyuIzNCkBoRartU5MhyA8fEtkLBi.png', '2024-01-15 16:46:34', '2024-01-15 16:46:34', 1, 0),
(137, 4, 'Uploads/Product/other-images/840009835358/9HzsBcNN8lvjwxbpn3ixcoxJ1NOzPBTj2sWaxbbn.png', '2024-01-15 16:46:34', '2024-01-15 16:46:34', 1, 0),
(138, 5, 'Uploads/Product/other-images/1818931023275/fGUPrDBHqd163obfEmk6H8q561Z6DNnmyJO5IRkx.png', '2024-01-15 16:49:31', '2024-01-15 16:49:31', 1, 0),
(139, 5, 'Uploads/Product/other-images/654191750891/CG8KRIMRKDxMFCmb0bFqyMk0btCtJ7akO4erKmOu.png', '2024-01-15 16:49:31', '2024-01-15 16:49:31', 1, 0),
(140, 5, 'Uploads/Product/other-images/1777054773349/uJ4l0TjQYqzCez6epckSAJIOMvxWWcvQ4IiEpz8e.png', '2024-01-15 16:49:31', '2024-01-15 16:49:31', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `rating` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `user_id`, `product_id`, `full_name`, `email`, `message`, `rating`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(2, 36, 3, 'Alexa Reese', 'tilahaxepu@mailinator.com', 'Ut impedit velit e', '4', '2024-01-15 19:06:38', '2024-01-15 19:08:06', 1, 0),
(3, 37, 3, 'Anika Stephens', 'sudubepog@mailinator.com', 'Repellendus Irure o', '3', '2024-01-15 19:09:44', '2024-01-15 19:09:57', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `other_address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `h_phone` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contact_method` varchar(255) DEFAULT NULL,
  `e_date` varchar(255) DEFAULT NULL,
  `e_location` varchar(255) DEFAULT NULL,
  `about_us` varchar(255) DEFAULT NULL,
  `e_planning` varchar(255) DEFAULT NULL,
  `persons` varchar(100) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `d_date` varchar(255) DEFAULT NULL,
  `d_time` varchar(255) DEFAULT NULL,
  `pickup` varchar(255) DEFAULT NULL,
  `p_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1',
  `is_read` tinyint(4) DEFAULT '0',
  `is_deleted` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `name`, `company_name`, `address`, `other_address`, `city`, `state`, `zip`, `email`, `h_phone`, `phone`, `contact_method`, `e_date`, `e_location`, `about_us`, `e_planning`, `persons`, `message`, `d_date`, `d_time`, `pickup`, `p_time`, `created_at`, `updated_at`, `is_active`, `is_read`, `is_deleted`) VALUES
(2, 'Isaac Estes', 'Short and Ellison Trading', 'Assumenda dolore con', 'Incididunt duis veli', 'Rerum aliquip aperia', 'Nulla provident qui', '90814', 'forovek@mailinator.com', '+1 (758) 631-5454', '+1 (628) 962-3754', '1', '17-Oct-1977', 'Impedit facere sit', 'Qui est deserunt dol', 'Sed ut porro nihil v', 'Aliquam quis in inci', 'Minima neque autem p', 'Sunday (Additional fee applies)', '8AM-6PM (Standard business hours)', '1 Business Day After', '12Noon-1PM (Additional fee would apply)', '2023-12-22 18:01:50', '2024-01-01 18:27:38', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `img_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `short_desc`, `long_desc`, `img_path`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(13, 'Event Rental In Corona, California', 'event-rental-in-corona,-california', 'All Occasion Rentals provides excellent service by assisting you with all of your event rental needs including: tents, staging, dance floors, heating, lighting, kitchen equipment and appliances, china, glassware, flatware, silverwares, linens, tables, chairs, service items, wedding items, and much more. Many decisions can be made over the phone with one of our experienced staff. Using this website, you can choose your chairs, linen, china...just about everything you\`ll need, but a knowledgeable event coordinator can help with some of the trickier aspects of planning your party. On-Site consultations are free.', '<ul>\r\n	<li>Event Coordinators</li>\r\n	<li>Phone Assistance</li>\r\n	<li>Knowledgeable Staff</li>\r\n	<li>Variety of Choices</li>\r\n</ul>', 'Uploads/services/images/13206272801744/bNS55a5qkH1O0RRgKXNxVhXxm2lLUOpGsKnDYNz7.png', '2023-12-07 11:57:26', '2024-01-04 02:29:10', 1, 0),
(20, 'Delivery And Pickup Services', 'delivery-and-pickup-services', 'All Occasion Rentals has a fleet of delivery vehicles and experienced drivers. Our drivers are trained on accurately delivering, and picking up your rental items on time.Your rental equipment needs will be confirmed and a delivery time will be scheduled a few days before your event. Equipment is dropped off at a dock, door or garage that is immediately accessible to our truck. On pick-up, equipment must be re-stacked and available to our drivers. Dishes should be rinsed and in their original containers.', '<ul>\r\n	<li>Convenient Delivery</li>\r\n	<li>Reasonable Rates</li>\r\n	<li>Accommodating Pick-up</li>\r\n	<li>Available Set-up &amp; Take-down</li>\r\n</ul>', 'Uploads/services/images/20104287656483/iSZzwQl0V3Vy6qNrVYFFagOQBKMvshZ3p9FZl9yh.png', '2023-12-21 15:11:49', '2023-12-21 15:38:51', 1, 0),
(21, 'Our Showroom Full Of Ideas', 'our-showroom-full-of-ideas', 'All Occasion Rentals Party Rentals` showroom and warehouse is located in Corona California. In our showroom, we have samples of many of our rental items on display for you to view and help you choose. We are available to show our rental items to you during regular business hours, or if you would rather make an appointment, that can be arranged as well.All Occasion Rentals Party Rentals’ showroom and warehouse is located in Corona California. In our showroom, we have samples of many of our rental items on display for you to view and help you choose. We are available to show our rental items to you during regular business hours, or if you would rather make an appointment, that can be arranged as well.', NULL, 'Uploads/services/images/21192573256695/RWwM1YhQZRUJt3LOBCZ3gnqKZ6DUtelt62gRMgzQ.png', '2023-12-21 15:39:55', '2023-12-21 15:39:55', 1, 0),
(22, 'Professional Rental And Consultation', 'professional-rental-and-consultation', 'Our knowledgeable sales staff is available to help you choose the items you need for your event. They will help you weed through the literally thousands of items we have available for rent to perfectly round out your special occasion. The sales staff is able to promptly provide you with written quotes and order changes as well as process billing and accounts receivable in a timely fashion.Our knowledgeable sales staff is available to help you choose the items you need for your event. They will help you weed through the literally thousands of items we have available for rent to perfectly round out your special occasion. The sales staff is able to promptly provide you with written quotes and order changes as well as process billing and accounts receivable in a timely fashion.', NULL, 'Uploads/services/images/2262137095570/nRDOwfP3ahenfXMkVN0qd2N5rver056lLG3MdHsQ.png', '2023-12-21 15:40:44', '2023-12-21 15:40:44', 1, 0),
(23, 'Rental Equipment Assistance', 'rental-equipment-assistance', 'Although most people do not need instruction on how to sit in a chair, some of our equipment does require some explanation. All Occasion Rentals friendly staff is happy to provide clear and concise instruction on how to use our rental equipment as necessary.Although most people do not need instruction on how to sit in a chair, some of our equipment does require some explanation. All Occasion Rentals friendly staff is happy to provide clear and concise instruction on how to use our rental equipment as necessary.', NULL, 'Uploads/services/images/2364007441082/i5ZRwcWu6WXBMZlDCERMfaeImoqURWm0yGb37dnn.png', '2023-12-21 15:41:26', '2023-12-21 15:41:26', 1, 0),
(24, 'Installations', 'installations', 'All Occasion Rentals expiries crew will set-up your tent quickly and safely. All precautions are taken when securing a tent, either by stakes, 50 gallon drums or steel weighted plates considering the location. We\`ll deliver your heaters and light the pilots if your event starts within a couple of hours, otherwise a staff member will show you how to light them.', '<ul>\r\n	<li>Quick Set-up</li>\r\n	<li>Experienced Staff</li>\r\n	<li>Delivery Available</li>\r\n</ul>\r\n\r\n<ul>\r\n	<li>Safety Precautions</li>\r\n	<li>Small Additional Fee</li>\r\n	<li>Demonstration by Staff</li>\r\n</ul>', 'Uploads/services/images/243573429067/CQ8rT7jyxjWec6neSevnE5SUbNipyrdupZFCzSyQ.png', '2023-12-21 15:42:29', '2023-12-21 15:42:40', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `title`, `img_path`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'template 1', 'Uploads/templates/thumbnails/153416051671/4c9o4ESHXcqrNMOF5yZpoW3de3sz8wuWkJpofwOy.png', 1, 0, '2023-10-04 00:30:47', '2023-10-05 06:18:53'),
(2, 'template 2', 'Uploads/templates/thumbnails/296544311014/iKxkAt52SrCsDrkgQqCkp8hIp4eKMuPjWsJtfzjl.png', 1, 0, '2023-10-04 00:38:20', '2023-10-05 04:45:16'),
(3, 'template 3', 'Uploads/templates/thumbnails/327718123662/AKb9Kk1xlgINYG7bHHY9X1JPd4RaC20Lh1DDK81s.png', 1, 0, '2023-10-04 00:38:52', '2023-10-05 04:45:40'),
(4, 'template 4', 'Uploads/templates/thumbnails/4184467661328/zAJQRdDUnRsFyZKvZ2wty1bkczyNXy1UPuXct2LA.png', 1, 0, '2023-10-04 00:39:23', '2023-10-05 04:46:04');

-- --------------------------------------------------------

--
-- Table structure for table `templates_inquiries`
--

CREATE TABLE `templates_inquiries` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` text,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates_inquiries`
--

INSERT INTO `templates_inquiries` (`id`, `user_id`, `template_id`, `full_name`, `email`, `phone`, `message`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(25, 14, 4, 'Caryn Kelly', 'jumybiropo@mailinator.com', '66', 'Illo deserunt nostru', 1, 0, '2023-10-30 23:19:37', '2023-10-30 23:19:37'),
(26, 14, 4, 'Cameron Murray', 'koruwurad@mailinator.com', '100', 'Fugit soluta deseru', 1, 0, '2023-10-31 00:40:35', '2023-10-31 00:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `designation` text,
  `img_path` text,
  `description` text CHARACTER SET utf8,
  `rating` int(11) DEFAULT NULL,
  `is_featured` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `profile_id`, `table_name`, `name`, `designation`, `img_path`, `description`, `rating`, `is_featured`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(1, NULL, 'main-testimonial', 'John', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'Alain Fernandez delivers not just quality products but an unparalleled commitment to training. As a security professional, their expertise is invaluable.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0),
(2, NULL, 'main-testimonial', 'Emily', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'Navigating the world of firearms was daunting until I found Alain Fernandez. Patient guidance, top-notch products, and a welcoming atmosphere made all the difference.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0),
(3, NULL, 'main-testimonial', 'Carlos', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'Alain Fernandez understands the needs of law enforcement. Their commitment to excellence, personalized service, and quality gear make them an indispensable resource for officers.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0),
(4, NULL, 'main-testimonial', 'Karen', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'From hunting to outdoor adventures, Alain Fernandez is my go-to. Their selection of gear, coupled with expert advice, ensures I\`m always prepared for any situation.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0),
(5, NULL, 'main-testimonial', 'David', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'Being a tactical training enthusiast, finding a place that values precision and professionalism is crucial. Alain Fernandez not only meets but exceeds expectations. Highly recommended.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0),
(6, NULL, 'main-testimonial', 'Maria', NULL, 'Uploads/description/thumbnails/74176580803129/nMI8tQkjpc15plv7APIelYrU26GrbHp7txu6yVd2.png', 'Running security for a corporation demands reliability. Alain Fernandez not only provides top-tier equipment but a level of service and trust that sets them apart in the industry.', NULL, 1, '2024-01-19 20:54:21', '2024-01-19 20:54:21', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_img` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verified_user` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `slug`, `email`, `phone`, `address`, `city`, `country`, `profile_img`, `password`, `verified_user`, `created_at`, `updated_at`, `is_active`, `is_deleted`) VALUES
(36, 'John Doe', NULL, 'john@gmail.com', '+1 (000) 000-0000', '1436 street ave', 'california', 'usa', 'Uploads/User/avatar3655677206559/lyLqc9AEoHHE7PfD5N2npNep2SJMohq7vzyzMpI9.png', '$2y$10$MrcACZaFVUVt62u03FHKsOA9W/9OmaKmC2gLP6CsobA13vJ8LS6tW', 0, '2024-01-12 16:13:36', '2024-01-24 00:25:09', 1, 0),
(37, 'david', NULL, 'david@gmail.com', '13349221868', NULL, NULL, NULL, NULL, '$2y$10$aXPTtFshT29lBbpeMH/kjeFpCLyFdKN0TMaK6.N856p4BXqjFEV2S', 0, '2024-01-15 19:09:03', '2024-01-15 19:09:03', 1, 0),
(38, 'alex', NULL, 'alex@gmail.com', '13349221868', NULL, NULL, NULL, NULL, '$2y$10$QaCOHvODHzAB2tMhGVD8U.//B0Tf6EJZDwYWrM9FUCJLNii8PGdly', 0, '2024-01-24 02:01:40', '2024-01-24 02:01:40', 1, 0),
(39, 'cisacu@mailinator.com', NULL, 'japevel@mailinator.com', 'vyfep@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$hoBXuAvB1fXO4Q9DcjedO.XuvBRcUvqIYWqEZlO0.HryzAvENHr0q', 0, '2024-01-30 03:43:26', '2024-01-30 03:43:26', 1, 0),
(40, 'fupuwefob@mailinator.com', NULL, 'qunajexo@mailinator.com', 'kahiny@mailinator.com', NULL, NULL, NULL, NULL, '$2y$10$gtlGHG89Gchq42KUTX.5sOjK9jgOG0Y8qTfb6IbvnQ3lJ2xSrLJV2', 0, '2024-01-30 03:52:44', '2024-01-30 03:52:44', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_templates`
--

CREATE TABLE `users_templates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `template_id` int(11) DEFAULT NULL,
  `template_data` text,
  `receive_email` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_templates`
--

INSERT INTO `users_templates` (`id`, `user_id`, `template_id`, `template_data`, `receive_email`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES
(19, 14, 1, NULL, 'noshadpanhweroh@gmail.com, mahersif01@gmail.com', 1, 0, '2023-10-27 23:41:04', '2023-10-31 21:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img_path` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_participants`
--
ALTER TABLE `contest_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `imagetable`
--
ALTER TABLE `imagetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_flag`
--
ALTER TABLE `m_flag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages_perks`
--
ALTER TABLE `packages_perks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party_packages`
--
ALTER TABLE `party_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plane`
--
ALTER TABLE `plane`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `planning_tips`
--
ALTER TABLE `planning_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates_inquiries`
--
ALTER TABLE `templates_inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_templates`
--
ALTER TABLE `users_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1980;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `contest_participants`
--
ALTER TABLE `contest_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `imagetable`
--
ALTER TABLE `imagetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_flag`
--
ALTER TABLE `m_flag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `packages_perks`
--
ALTER TABLE `packages_perks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `party_packages`
--
ALTER TABLE `party_packages`
  MODIFY `id` tinyint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plane`
--
ALTER TABLE `plane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `planning_tips`
--
ALTER TABLE `planning_tips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10642;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `templates_inquiries`
--
ALTER TABLE `templates_inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `users_templates`
--
ALTER TABLE `users_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
