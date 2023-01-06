-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 01:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_students`
--

CREATE TABLE `assign_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL COMMENT 'user_id=student_id',
  `roll` int(11) DEFAULT NULL,
  `class_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_students`
--

INSERT INTO `assign_students` (`id`, `student_id`, `roll`, `class_id`, `year_id`, `group_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, 5, 2, 2, 2, '2023-01-04 13:53:21', '2023-01-04 13:53:21'),
(2, 10, NULL, 3, 1, 1, 1, '2023-01-05 05:41:28', '2023-01-05 05:41:28'),
(3, 11, NULL, 1, 1, 1, 2, '2023-01-05 05:44:20', '2023-01-05 12:33:31'),
(4, 12, NULL, 2, 2, 1, 1, '2023-01-05 06:11:21', '2023-01-05 12:28:24'),
(5, 11, NULL, 2, 2, 1, 2, '2023-01-06 13:11:45', '2023-01-06 13:11:45'),
(6, 13, NULL, 3, 3, 1, 1, '2023-01-06 13:16:09', '2023-01-06 13:16:09'),
(7, 13, NULL, 4, 4, 1, 2, '2023-01-06 13:19:36', '2023-01-06 13:19:36'),
(8, 13, NULL, 4, 4, 1, 1, '2023-01-06 13:23:03', '2023-01-06 13:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subjects`
--

CREATE TABLE `assign_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `full_mark` double NOT NULL,
  `pass_mark` double NOT NULL,
  `subjective_mark` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_subjects`
--

INSERT INTO `assign_subjects` (`id`, `class_id`, `subject_id`, `full_mark`, `pass_mark`, `subjective_mark`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 100, 33, 100, '2023-01-02 05:58:06', '2023-01-02 05:58:06'),
(3, 2, 3, 100, 33, 100, '2023-01-02 05:58:07', '2023-01-02 05:58:07'),
(4, 2, 5, 100, 33, 100, '2023-01-02 05:58:07', '2023-01-02 05:58:07'),
(5, 2, 6, 100, 33, 100, '2023-01-02 05:58:07', '2023-01-02 05:58:07'),
(6, 3, 2, 100, 33, 100, '2023-01-02 05:58:59', '2023-01-02 05:58:59'),
(7, 3, 3, 100, 33, 100, '2023-01-02 05:58:59', '2023-01-02 05:58:59'),
(8, 3, 5, 100, 33, 100, '2023-01-02 05:58:59', '2023-01-02 05:58:59'),
(9, 3, 6, 100, 33, 100, '2023-01-02 05:58:59', '2023-01-02 05:58:59'),
(10, 3, 7, 100, 33, 100, '2023-01-02 05:58:59', '2023-01-02 05:58:59'),
(20, 1, 2, 100, 33, 100, '2023-01-02 10:23:05', '2023-01-02 10:23:05'),
(21, 1, 3, 100, 33, 100, '2023-01-02 10:23:06', '2023-01-02 10:23:06'),
(22, 1, 5, 100, 33, 100, '2023-01-02 10:23:06', '2023-01-02 10:23:06');

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
(3, 'Head Teacher', '2023-01-02 11:02:18', '2023-01-02 11:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `discount_students`
--

CREATE TABLE `discount_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assign_student_id` int(11) NOT NULL,
  `fee_category_id` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_students`
--

INSERT INTO `discount_students` (`id`, `assign_student_id`, `fee_category_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 10, '2023-01-04 09:45:11', '2023-01-04 09:45:11'),
(2, 3, 1, 10, '2023-01-04 12:29:13', '2023-01-05 12:33:31'),
(3, 4, 1, 25, '2023-01-04 12:32:08', '2023-01-05 12:28:24'),
(4, 1, 1, 10, '2023-01-04 13:53:21', '2023-01-04 13:53:21'),
(5, 2, 1, 10, '2023-01-05 05:41:28', '2023-01-05 05:41:28'),
(6, 3, 1, 5, '2023-01-05 05:44:20', '2023-01-05 05:44:20'),
(7, 4, 1, 10, '2023-01-05 06:11:21', '2023-01-05 06:11:21'),
(8, 5, 1, 5, '2023-01-06 13:11:45', '2023-01-06 13:11:45'),
(9, 6, 1, 100, '2023-01-06 13:16:09', '2023-01-06 13:16:09'),
(10, 7, 1, 150, '2023-01-06 13:19:36', '2023-01-06 13:19:36'),
(11, 8, 1, 100, '2023-01-06 13:23:03', '2023-01-06 13:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `exam_types`
--

CREATE TABLE `exam_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_types`
--

INSERT INTO `exam_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, 'Final', '2023-01-01 09:54:45', '2023-01-01 09:55:13'),
(4, 'Mid Term', '2023-01-01 10:52:56', '2023-01-01 10:52:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(3, '1st Installment', '2022-12-30 13:03:08', '2022-12-30 13:03:39'),
(4, '2nd Installment', '2022-12-30 13:07:15', '2022-12-30 13:08:05'),
(5, 'Registration Fee', '2022-12-30 13:57:10', '2022-12-30 13:57:10'),
(6, 'Exam Fee', '2023-01-01 05:32:05', '2023-01-01 05:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `fee_category_amounts`
--

CREATE TABLE `fee_category_amounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fee_category_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_category_amounts`
--

INSERT INTO `fee_category_amounts` (`id`, `fee_category_id`, `class_id`, `amount`, `created_at`, `updated_at`) VALUES
(15, 5, 1, 700, '2023-01-01 07:01:23', '2023-01-01 07:01:23'),
(16, 6, 2, 1000, '2023-01-01 07:02:02', '2023-01-01 07:02:02'),
(17, 6, 1, 300, '2023-01-01 07:02:02', '2023-01-01 07:02:02'),
(18, 6, 3, 500, '2023-01-01 07:02:02', '2023-01-01 07:02:02');

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2022_12_25_085044_create_sessions_table', 1),
(17, '2022_12_30_175636_create_fee_categories_table', 7),
(19, '2022_12_29_185227_create_student_shifts_table', 8),
(20, '2022_12_29_160550_create_student_groups_table', 9),
(21, '2022_12_29_103408_create_student_classes_table', 10),
(22, '2022_12_29_133858_create_student_years_table', 11),
(23, '2022_12_30_192401_create_fee_category_amounts_table', 12),
(24, '2023_01_01_141217_create_exam_types_table', 13),
(25, '2023_01_01_171056_create_subjects_table', 14),
(26, '2023_01_02_102153_create_assign_subjects_table', 15),
(27, '2023_01_02_163438_create_designations_table', 16),
(28, '2023_01_02_174547_create_student_registers_table', 17),
(29, '2014_10_12_000000_create_users_table', 18),
(31, '2023_01_02_193444_create_discount_students_table', 19),
(33, '2023_01_02_192413_create_assign_students_table', 20);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('7eFAsAfUnoPSQyBZTfurCxTp95AZFP4cSEaFwMKt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/108.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWFBqZkdmOWphUXhUajlQNkxRSU9FNWRhSFVvQmFURkxNeUdRbXhQSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRRMWZxMXNoSGZoSHNPdFN1aDdZeC9lcDVKaEZ6aWxadFF1NTJldUp3MHNaYk5MSndaVEJlNiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6ODk6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9zdHVkZW50cy9zdHVkZW50L3llYXIvY2xhc3MvZGF0YT9jbGFzc19pZD0zJnNlYXJjaD1TZWFyY2gmeWVhcl9pZD0zIjt9fQ==', 1673033005);

-- --------------------------------------------------------

--
-- Table structure for table `student_classes`
--

CREATE TABLE `student_classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_classes`
--

INSERT INTO `student_classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class One', '2022-12-30 12:33:29', '2022-12-30 12:33:29'),
(2, 'Class Two', '2023-01-01 04:17:51', '2023-01-01 04:17:51'),
(3, 'Class three', '2023-01-01 04:18:07', '2023-01-01 04:18:07'),
(4, 'Class Foure', '2023-01-02 05:43:14', '2023-01-02 05:43:14'),
(5, 'Class Five', '2023-01-02 05:43:34', '2023-01-02 05:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `student_groups`
--

CREATE TABLE `student_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_groups`
--

INSERT INTO `student_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'science', '2022-12-30 12:32:37', '2022-12-30 12:32:37'),
(2, 'Arts', '2022-12-30 12:33:04', '2022-12-30 12:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_registers`
--

CREATE TABLE `student_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_shifts`
--

CREATE TABLE `student_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_shifts`
--

INSERT INTO `student_shifts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Morning Shift', '2022-12-30 12:37:34', '2022-12-30 12:37:34'),
(2, 'Day Shift', '2022-12-30 12:37:54', '2022-12-30 12:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_years`
--

CREATE TABLE `student_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_years`
--

INSERT INTO `student_years` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '2016', '2022-12-30 12:36:42', '2022-12-30 12:36:42'),
(2, '2017', '2022-12-30 12:36:57', '2022-12-30 12:36:57'),
(3, '2018', '2023-01-06 13:07:55', '2023-01-06 13:07:55'),
(4, '2019', '2023-01-06 13:08:12', '2023-01-06 13:08:12'),
(5, '2020', '2023-01-06 13:08:28', '2023-01-06 13:08:28'),
(6, '2021', '2023-01-06 13:08:43', '2023-01-06 13:08:43'),
(7, '2022', '2023-01-06 13:08:59', '2023-01-06 13:08:59'),
(8, '2023', '2023-01-06 13:09:22', '2023-01-06 13:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Bangla', '2023-01-01 11:33:44', '2023-01-01 11:33:44'),
(3, 'English', '2023-01-01 11:34:01', '2023-01-01 11:34:01'),
(5, 'Math', '2023-01-02 05:44:23', '2023-01-02 05:44:23'),
(6, 'Physics', '2023-01-02 05:45:05', '2023-01-02 05:45:05'),
(7, 'Chemistry', '2023-01-02 05:45:40', '2023-01-02 05:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `user_id`, `name`, `personal_team`, `created_at`, `updated_at`) VALUES
(1, 1, 'Shubha\'s Team', 1, '2022-12-25 03:00:21', '2022-12-25 03:00:21'),
(2, 2, 'Shubha\'s Team', 1, '2022-12-26 10:48:23', '2022-12-26 10:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Student,Employee,Admin',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of Software,operator,computer operator,user=employee',
  `join_date` date DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `salary` double DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `user_name`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `fname`, `mname`, `religion`, `id_no`, `dob`, `code`, `role`, `join_date`, `designation_id`, `salary`, `status`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Shubha', 'shubhamandal70@gmail.com', 'Shubha009', '2022-12-25 03:04:01', '$2y$10$Q1fq1shHfhHsOtSuh7Yx/ep5JhFzilZtQu52euJw0sZbNLJwZTBe6', '01822823912', 'Rathbari', 'Male', '202212281620for_my_About_Section-removebg-preview.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Admin', NULL, NULL, NULL, 1, NULL, NULL, 'profile-photos/VJERO1ChlYHmCoC879f2aCf789CeHHeUzGQ4T61y.jpg', NULL, NULL),
(3, 'Admin', 'Shubha Mandal', 'shubha@gmail.com', 'shubha001', '2023-01-03 05:07:26', '$2y$10$tEOquty/70YAquTCy3YCV.0.xrwbBR3mooSU9rZlXhkvNZ9wfvyV6', NULL, NULL, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Operator', NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-03 05:01:31', '2023-01-03 05:58:03'),
(6, 'Student', 'trtrtr', NULL, NULL, NULL, '$2y$10$fpRRsUIy7CUe7RD9AD1hBOTtlVD57vIQj0mdLUS7//BAXAe7inA3y', '012222222', 'Rathabri, Kadambari, Raoir, Madaripur', 'Female', '202301041545Ambrose-Chui-Cropped-200x200.jpg', 'errwrwerew', 'rewrwerewr', 'Hindu', '20160001', '2023-01-05', '3741', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-04 09:45:11', '2023-01-04 09:45:11'),
(7, 'Student', 'fffgfdg', NULL, NULL, NULL, '$2y$10$76c7lxpOuvTJ21QOSddJhu8aj4LYOuuG2uZV3mIF3KI2vNjokI3lq', '+8801822823912', 'RATHBARI, KADAMBARI< RAJOIR, MADARIPUR, DHAKA, BANGLADESH', 'Female', '202301041829patrick2.jpg', 'fgdfgdg', 'dgdfgfd', 'Hindu', '20170007', '2023-01-04', '8760', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-04 12:29:13', '2023-01-04 12:29:13'),
(8, 'Student', 'tete', NULL, NULL, NULL, '$2y$10$7wAEy2s0ZbqrVBFghzeXZu7O6iT1MNQpctOYXldihraYiZKjIbgwW', '+8801741607170', '321', 'Male', '202301041832student-profile-javon-nathaniel.jpg', 'tretetr', 'ertetert', 'Hindu', '20170008', '2023-01-06', '6096', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-04 12:32:08', '2023-01-04 12:32:08'),
(9, 'Student', 'dfgfdgfdf', NULL, NULL, NULL, '$2y$10$zhFhAvg/UuEbeseaD6nBTuiDATsQuWCup.EeTAeO3qxrvZY9NCU8a', '+8801822823912', 'RATHBARI, KADAMBARI< RAJOIR, MADARIPUR, DHAKA, BANGLADESH', NULL, '202301041953photo_1078846.jpg', 'gdfgfdgdg', 'gfdgfdgfd', 'Hindu', '20170009', '2023-01-03', '6205', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-04 13:53:21', '2023-01-04 13:53:21'),
(10, 'Student', 'dsffs', NULL, NULL, NULL, '$2y$10$yQFN4sNpniM1i/RdkXur8u6ptWSuZ3qlWcoFew1/s9vSLUH1NAHmu', '+8801822823912', 'RATHBARI, KADAMBARI< RAJOIR, MADARIPUR, DHAKA, BANGLADESH', NULL, '202301051141Stan1.jpg', 'sfsdfds', 'sfsdfds', 'Hindu', '20160010', '2023-01-04', '79', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-05 05:41:28', '2023-01-05 05:41:28'),
(11, 'Student', 'Finale Test', NULL, NULL, NULL, '$2y$10$h3ar8iaZb9jl/nqCT/Ybfei6rTa1fHxXaiUveGHLBHGyn13y3NRF2', '01741607170', 'Finale mbmbm', 'Female', '202301051833karena_354x354_mills.jpg', 'Finale', 'Finale', 'Christan', '20170011', '1995-01-09', '1700', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-05 05:44:20', '2023-01-05 12:33:31'),
(12, 'Student', 'test name', NULL, NULL, NULL, '$2y$10$n779RLNCRnkRqop504MIIOdQFXO3WW3IODyhgh94sOxice7U3zfcy', '01822823912', 'aaaaaa', 'Female', '202301051828answer pic.jpg', 'ffffffff', 'mmmmmmmmmmmmm', 'Hindu', '20160012', '1995-01-08', '4647', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-05 06:11:21', '2023-01-05 12:28:24'),
(13, 'Student', 'SHUBHA MANDAL', NULL, NULL, NULL, '$2y$10$oC3Xk8ZVmL9m1fGk3z7yKuE6OcjSzQPxSv8JbMtBNnYNKaUEvpHoi', '+8801822823912', 'RATHBARI, KADAMBARI< RAJOIR, MADARIPUR, DHAKA, BANGLADESH', 'Male', '202301061916Kevin-website.jpg', 'sdsd45', 'mmmmmmmmmmmmm', 'Hindu', '20180013', '1996-01-01', '2926', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '2023-01-06 13:16:09', '2023-01-06 13:19:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_students`
--
ALTER TABLE `assign_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `designations_name_unique` (`name`);

--
-- Indexes for table `discount_students`
--
ALTER TABLE `discount_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_types`
--
ALTER TABLE `exam_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `exam_types_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fee_categories_name_unique` (`name`);

--
-- Indexes for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `student_classes`
--
ALTER TABLE `student_classes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_classes_name_unique` (`name`);

--
-- Indexes for table `student_groups`
--
ALTER TABLE `student_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_groups_name_unique` (`name`);

--
-- Indexes for table `student_registers`
--
ALTER TABLE `student_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_shifts`
--
ALTER TABLE `student_shifts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_shifts_name_unique` (`name`);

--
-- Indexes for table `student_years`
--
ALTER TABLE `student_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_years_name_unique` (`name`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subjects_name_unique` (`name`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_name_unique` (`user_name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_students`
--
ALTER TABLE `assign_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `assign_subjects`
--
ALTER TABLE `assign_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discount_students`
--
ALTER TABLE `discount_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `exam_types`
--
ALTER TABLE `exam_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `fee_category_amounts`
--
ALTER TABLE `fee_category_amounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_classes`
--
ALTER TABLE `student_classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student_groups`
--
ALTER TABLE `student_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_registers`
--
ALTER TABLE `student_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_shifts`
--
ALTER TABLE `student_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_years`
--
ALTER TABLE `student_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
