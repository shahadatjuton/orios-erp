-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2020 at 04:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orios`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `user_id`, `designation`, `department`, `name`, `email`, `experience`, `description`, `cv`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'test', 'Accounts', 'juton', 'applicant@orios.com', 5.00, 'This is about myself', 'LINTA.ISLAM_CV.pdf', 1, '2020-06-13 22:30:45', '2020-06-13 23:40:06'),
(2, 4, 'test', 'Accounts', 'Applicant', 'applicant@orios.com', 2.00, 'this is all of my information', 'LINTA.ISLAM_CV.pdf', 2, '2020-06-13 22:31:03', '2020-06-23 00:31:56'),
(3, 4, 'Assistant Programmer', 'IT', 'Applicant', 'applicant@orios.com', 5.00, 'jahfkea', 'LINTA.ISLAM_CV.pdf', 0, '2020-07-01 06:35:58', '2020-07-01 06:35:58'),
(4, 4, 'Assistant Programmer', 'IT', 'Applicant', 'applicant@orios.com', 5.00, 'jahfkea', 'LINTA.ISLAM_CV.pdf', 0, '2020-07-01 06:38:24', '2020-07-01 06:38:24'),
(6, 4, 'Assistant Programmer', 'IT', 'Applicant', 'applicant@orios.com', 6.00, 'this is for testing purpose...', 'applicant-2020-07-02-5efd51b399ef8.pdf', 0, '2020-07-01 21:17:07', '2020-07-01 21:17:07');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_invitations`
--

CREATE TABLE `assessment_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assessment_invitations`
--

INSERT INTO `assessment_invitations` (`id`, `user_id`, `designation`, `department`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 2, 'Junior Developer', '1', '2020-06-16', '11:39:00', '2020-06-14 22:43:10', '2020-06-14 22:43:10'),
(9, 1, 'Assistant Programmer', 'IT', '2020-07-10', '03:26:00', '2020-07-02 02:25:44', '2020-07-02 02:25:44');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2020-06-20 21:24:22', '2020-06-20 21:24:22'),
(2, 'HR', '2020-06-20 21:24:31', '2020-06-20 21:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Assistant Programmer', '2020-06-20 21:24:08', '2020-06-20 21:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_invitations`
--

CREATE TABLE `interview_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `interview_invitations`
--

INSERT INTO `interview_invitations` (`id`, `user_id`, `designation`, `department`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 4, 'Junior Developer', 'IT', '2020-06-16', '12:21:00', '2020-06-14 23:23:32', '2020-06-14 23:23:32'),
(2, 4, 'Assistant Programmer', 'IT', '2020-07-17', '10:09:00', '2020-07-01 21:08:18', '2020-07-01 21:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation_id` bigint(20) UNSIGNED NOT NULL,
  `experience` double(8,2) NOT NULL,
  `vacancy` int(11) NOT NULL,
  `circular` datetime NOT NULL,
  `deadline` datetime NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `department_id`, `designation_id`, `experience`, `vacancy`, `circular`, `deadline`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2.00, 5, '2020-06-21 00:00:00', '2020-06-30 00:00:00', 'This is a new job circular', 1, '2020-06-20 21:39:45', '2020-06-23 00:11:29'),
(3, 1, 1, 3.00, 10, '2020-06-22 00:00:00', '2020-06-30 00:00:00', 'Another opportunities for programmers. Grab the opportunities if you are qualified', 0, '2020-06-21 22:51:09', '2020-06-22 05:57:44'),
(4, 1, 1, 3.00, 2, '2020-06-10 00:00:00', '2020-06-30 00:00:00', 'The degree will be consider', 1, '2020-06-22 05:53:52', '2020-06-23 00:03:02'),
(5, 1, 1, 5.00, 12, '2020-06-20 00:00:00', '2020-06-25 00:00:00', 'Responsibilities:\r\n\r\n    Answer and direct phone calls\r\n\r\n    Organize and schedule meetings and appointments\r\n\r\n    Maintain contact lists\r\n\r\n    Produce and distribute correspondence memos, letters, faxes and forms\r\n\r\n    Assist in the preparation of regularly scheduled reports\r\n\r\n    Develop and maintain a filing system\r\n\r\n    Order office supplies\r\n\r\n    Book travel arrangements\r\n\r\n    Submit and reconcile expense reports\r\n\r\n    Provide general support to visitors\r\n\r\n    Provide information by answering questions and requests\r\n\r\n    Take dictation\r\n\r\n    Research and creates presentations\r\n\r\n    Generate reports\r\n\r\n    Handle multiple projects\r\n\r\n    Prepare and monitor invoices\r\n\r\n    Develop administrative staff by providing information, educational opportunities and experiential growth opportunities', 1, '2020-06-22 05:55:59', '2020-06-22 05:59:11'),
(6, 1, 1, 5.00, 3, '2020-06-18 00:00:00', '2020-06-30 00:00:00', 'Responsibilities:\r\n\r\n    Answer and direct phone calls\r\n\r\n    Organize and schedule meetings and appointments\r\n\r\n    Maintain contact lists\r\n\r\n    Produce and distribute correspondence memos, letters, faxes and forms\r\n\r\n    Assist in the preparation of regularly scheduled reports\r\n\r\n    Develop and maintain a filing system\r\n\r\n    Order office supplies\r\n\r\n    Book travel arrangements\r\n\r\n    Submit and reconcile expense reports\r\n\r\n    Provide general support to visitors\r\n\r\n    Provide information by answering questions and requests\r\n\r\n    Take dictation\r\n\r\n    Research and creates presentations\r\n\r\n    Generate reports\r\n\r\n    Handle multiple projects\r\n\r\n    Prepare and monitor invoices\r\n\r\n    Develop administrative staff by providing information, educational opportunities and experiential growth opportunities', 1, '2020-06-22 05:56:27', '2020-06-22 23:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `emp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `days` int(11) DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `for` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `leave_type_id`, `user_id`, `emp_name`, `str_date`, `end_date`, `days`, `reason`, `for`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Admin', '2020-06-04 00:00:00', '2020-06-04 00:00:00', NULL, 'testing ...', 'superadmin', 1, '2020-06-09 05:12:59', '2020-06-14 00:08:35'),
(2, 1, 2, 'Admin', '2020-06-04 00:00:00', '2020-06-04 00:00:00', NULL, 'testing ...', 'superadmin', 1, '2020-06-09 05:13:20', '2020-06-14 00:23:19'),
(3, 2, 2, 'Admin', '2020-06-10 00:00:00', '2020-06-11 00:00:00', NULL, 'testing ...', 'superadmin', 0, '2020-06-09 05:13:53', '2020-06-14 00:20:43'),
(4, 2, 3, 'User', '2020-06-12 00:00:00', '2020-06-13 00:00:00', NULL, 'testing for user', 'admin', 2, '2020-06-10 05:10:14', '2020-06-14 00:56:57'),
(5, 2, 3, 'User', '2020-06-12 00:00:00', '2020-06-13 00:00:00', NULL, 'testing for user', 'admin', 1, '2020-06-10 05:11:17', '2020-06-14 00:57:01'),
(6, 2, 3, 'User', '2020-06-17 00:00:00', '2020-06-20 00:00:00', NULL, 'nmmk', 'admin', 1, '2020-06-14 03:33:21', '2020-06-20 05:42:25'),
(7, 2, 3, 'User', '2020-06-17 00:00:00', '2020-06-20 00:00:00', NULL, 'nmmk', 'admin', 0, '2020-06-14 03:33:40', '2020-06-14 03:33:40'),
(8, 1, 3, 'User', '2020-06-14 00:00:00', '2020-06-20 00:00:00', NULL, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'admin', 0, '2020-06-14 03:34:08', '2020-06-14 03:34:08'),
(9, 1, 3, 'User', '2020-06-14 00:00:00', '2020-06-20 00:00:00', NULL, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjj', 'admin', 0, '2020-06-14 03:44:10', '2020-06-14 03:44:10'),
(10, 1, 1, 'Super Admin', '2020-06-23 00:00:00', '2020-06-30 00:00:00', NULL, 'Because of Covid-19', 'own', 1, '2020-06-23 06:00:31', '2020-06-23 06:00:31');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `leave_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `leave_type`, `created_at`, `updated_at`) VALUES
(1, 'Medical', '2020-06-08 03:22:26', '2020-06-09 00:35:19'),
(2, 'Monthly', '2020-06-08 04:32:32', '2020-06-08 04:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_06_08_091349_create_leave_types_table', 3),
(11, '2020_06_08_044611_create_leaves_table', 4),
(13, '2020_06_06_044633_create_roles_table', 5),
(14, '2020_06_11_075347_create_presents_table', 6),
(18, '2020_06_13_070545_create_applications_table', 9),
(19, '2020_06_15_040600_create_assessment_invitations_table', 9),
(20, '2020_06_15_045850_create_interview_invitations_table', 10),
(23, '2020_06_15_053618_create_ratings_table', 11),
(27, '2020_06_11_114446_create_designations_table', 12),
(28, '2020_06_12_020948_create_departments_table', 12),
(29, '2020_06_12_024248_create_jobs_table', 12),
(30, '2020_06_21_024702_create_employees_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presents`
--

CREATE TABLE `presents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `attendance` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presents`
--

INSERT INTO `presents` (`id`, `user_id`, `attendance`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2020-06-11 04:30:09', '2020-06-11 04:30:09'),
(3, 1, 1, '2020-06-11 04:34:26', '2020-06-11 04:34:26'),
(4, 1, 1, '2020-05-11 04:48:10', '2020-06-11 04:48:10'),
(5, 3, 0, '2020-06-11 04:48:14', '2020-06-11 04:48:14'),
(8, 2, 1, '2020-06-11 20:06:55', '2020-06-11 20:06:55'),
(12, 3, 1, '2020-06-18 03:24:06', '2020-06-19 03:24:06'),
(13, 2, 1, '2020-06-19 03:31:44', '2020-06-19 03:31:44'),
(14, 1, 1, '2020-06-19 03:36:18', '2020-06-19 03:36:18'),
(15, 3, 1, '2020-06-22 04:05:34', '2020-06-22 04:05:34'),
(16, 2, 1, '2020-06-26 19:42:37', '2020-06-26 19:42:37'),
(17, 3, 0, '2020-07-02 02:48:25', '2020-07-02 02:48:25'),
(18, 2, 1, '2020-07-02 02:59:16', '2020-07-02 02:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appearence` int(11) NOT NULL,
  `body_language` int(11) NOT NULL,
  `job_knowledge` int(11) NOT NULL,
  `experience` int(11) NOT NULL,
  `literacy` int(11) NOT NULL,
  `communication_skill` int(11) NOT NULL,
  `total` double(8,2) NOT NULL,
  `action` int(11) NOT NULL,
  `written_mark` double NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary` double NOT NULL,
  `expected_joining_date` date NOT NULL,
  `proposed_joining_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `application_id`, `name`, `designation`, `department`, `appearence`, `body_language`, `job_knowledge`, `experience`, `literacy`, `communication_skill`, `total`, `action`, `written_mark`, `remark`, `salary`, `expected_joining_date`, `proposed_joining_date`, `status`, `created_at`, `updated_at`) VALUES
(2, 1, 'Applicant', 'Junior Developer', 'Accounts', 3, 5, 4, 2, 5, 5, 120.00, 1, 0, '', 0, '0000-00-00', '0000-00-00', 0, '2020-06-15 02:16:18', '2020-06-15 02:16:18'),
(3, 1, 'Applicant', 'Junior Developer', 'Accounts', 3, 5, 4, 2, 5, 5, 24.00, 0, 0, '', 0, '0000-00-00', '0000-00-00', 0, '2020-06-15 02:21:15', '2020-06-15 02:21:15'),
(4, 1, 'Applicant', 'Junior Developer', 'Accounts', 3, 3, 5, 5, 2, 4, 22.00, 2, 0, '', 0, '0000-00-00', '0000-00-00', 0, '2020-06-19 03:41:20', '2020-06-19 03:41:20'),
(5, 1, 'Applicant', 'Junior Developer', 'IT', 1, 1, 5, 5, 2, 3, 17.00, 3, 37, 'he is not up to the mark', 30000, '2020-07-10', '2020-07-17', 0, '2020-07-02 04:22:17', '2020-07-02 04:22:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', NULL, NULL),
(2, 'Admin', 'admin', NULL, NULL),
(3, 'User', 'user', NULL, NULL),
(4, 'Applicant', 'applicant', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 4,
  `designation` bigint(20) UNSIGNED NOT NULL,
  `department` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `designation`, `department`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 1, 0, 0, 'default.png', 'superadmin@orios.com', NULL, '$2y$10$F30SS5lcNK9zjne4biiqEOoAe0sHiIKOoMyBh/NDe3R5ae/VvcVqS', NULL, '2020-06-05 07:36:48', NULL),
(2, 'Admin', 2, 0, 0, 'default.png', 'admin@orios.com', NULL, '$2y$10$3m/dO.hf/0Ru2vFOlaobDu9xC6fFnSO7ClcxPX/mBCDmEP3pvu6wa', NULL, '2020-06-05 07:37:04', NULL),
(3, 'User', 3, 0, 0, 'default.png', 'user@orios.com', NULL, '$2y$10$8rAtGRily0aDcmSXvujw9OJ9LnzhCDVrNpAieIlqC/iMr6bP43hgi', NULL, '2020-06-05 07:37:11', NULL),
(4, 'Applicant', 4, 0, 0, 'default.png', 'applicant@orios.com', NULL, '$2y$10$smZhIMz2tX9iqn8g8uWbLO9xwuIBNHm.RhHIfJknsPMqLFafx8rHO', NULL, '2020-06-05 07:37:16', NULL),
(5, 'mim', 3, 1, 1, 'default.png', 'mim@gmail.com', NULL, '$2y$10$.0jaZ2KeDSBQ8JJXta3YPehBLi9LeKOr/7AQdBEBLJEjhSjE6f/9K', NULL, '2020-06-21 11:11:44', '2020-06-21 11:11:44'),
(6, 'Test User', 3, 1, 1, 'default.png', 'shahadatjuton9@gmail.com', NULL, '$2y$10$5MXNL5vdFbs8icUFE/JobueRoxXU9nidDtNKkiRGLZCPFfSBmEkSS', NULL, '2020-06-21 22:45:06', '2020-06-21 22:45:06'),
(8, 'juton', 2, 1, 1, 'default.png', 'shahadatjuton@gmail.com', NULL, '$2y$10$d64tsnUwuhFdnCaGSFVugeiB93PwMiXkeIPE.61n/wR.34SZUm3ua', NULL, '2020-06-23 08:15:17', '2020-06-23 08:15:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assessment_invitations`
--
ALTER TABLE `assessment_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_invitations`
--
ALTER TABLE `interview_invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_department_id_foreign` (`department_id`),
  ADD KEY `jobs_designation_id_foreign` (`designation_id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_leave_type_id_foreign` (`leave_type_id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `presents`
--
ALTER TABLE `presents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presents_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_application_id_foreign` (`application_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `assessment_invitations`
--
ALTER TABLE `assessment_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_invitations`
--
ALTER TABLE `interview_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `presents`
--
ALTER TABLE `presents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_designation_id_foreign` FOREIGN KEY (`designation_id`) REFERENCES `designations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `presents`
--
ALTER TABLE `presents`
  ADD CONSTRAINT `presents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `applications` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
