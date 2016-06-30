-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2016 at 11:47 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ts`
--

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) UNSIGNED NOT NULL,
  `empid` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyenc` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `departmentname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `keyenc`, `departmentname`, `created_at`, `updated_at`) VALUES
(1, 'eyJpdiI6IkVUK2s2WHQyQVRcL2FOeEk0QXlCZXVRPT0iLCJ2YWx1ZSI6InZ3XC8wZXNxNVJqUWpmVWs0WnNzQzJ3PT0iLCJtYWMiOiI3YzM1MmE5ZmNjMmRhOGM5N2Q3M2MwZmQzZDg2NzNjM2UwYTQwZmRhMDQwOTM5NzlmNTNlNGRlNDIwMjE4YTgzIn0=', 'Digital Marketing', '2016-06-30 09:15:24', '2016-06-30 09:15:24'),
(3, 'eyJpdiI6ImlPK2xRZk9KMDQ2VUhFc1d3YzdRNHc9PSIsInZhbHVlIjoiWkNIY05OZFJKdFE5YXJLcmduZHNHUT09IiwibWFjIjoiZmRjZjFkM2YzZjhjMDcyYzRiYmNhMzg3ZmFiN2YwODhkZWMwYzQ3MTY2ZDBkNWE5ODRmZWJjNjdmZTVhNGYwMiJ9', 'Ecommerce', '2016-06-30 09:39:48', '2016-06-30 09:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_05_12_145743_create_users_table', 1),
('2016_05_17_122129_create_sessions_table', 2),
('2016_06_01_162442_create_calendar_table', 3),
('2016_06_01_170006_create_calendar_table', 4),
('2016_06_03_153614_create_department_table', 4),
('2016_06_03_153629_create_position_table', 4),
('2016_06_07_093220_create_roles_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(10) UNSIGNED NOT NULL,
  `departmentid` int(11) NOT NULL,
  `userlevel` int(11) NOT NULL,
  `positionname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'Full access to the System', '2016-06-30 02:06:15', '2016-06-30 02:06:15'),
(2, 'Manager', 'Manage Leaves, Overtime and many more', '2016-06-30 02:06:15', '2016-06-30 02:06:15'),
(3, 'User', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-30 02:06:15', '2016-06-30 02:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8_unicode_ci,
  `payload` text COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) UNSIGNED NOT NULL,
  `keyenc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empno` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userlevel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `keyenc`, `empno`, `avatar`, `username`, `fullname`, `email`, `password`, `phone`, `address`, `gender`, `department`, `position`, `userlevel`, `active`, `online`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eyJpdiI6IkVUK2s2WHQyQVRcL2FOeEk0QXlCZXVRPT0iLCJ2YWx1ZSI6InZ3XC8wZXNxNVJqUWpmVWs0WnNzQzJ3PT0iLCJtYWMiOiI3YzM1MmE5ZmNjMmRhOGM5N2Q3M2MwZmQzZDg2NzNjM2UwYTQwZmRhMDQwOTM5NzlmNTNlNGRlNDIwMjE4YTgzIn0=', 2150091, 'uploads/avatar.jpg', 'juls', 'Julius DS. Mateo', 'mateojulius98@yahoo.com', '$2y$10$zFi78mFIEEf.93NfZYE/w.GtOaoM8QCO6UERukOXtDksezwUdfCKu', 0, '', 'Male', 'Web Integration', 'Associate', '1', 1, 0, 'bZJlNFsPBL39lSlCLnG0GBgpSoVrxUYSX1KyFxeQWea3AGvnuRNVzZQkUveR', '2016-05-17 04:04:52', '2016-06-30 09:41:34'),
(2, 'eyJpdiI6Imd5OWZET3NnTEVEQUlFS2FGZElDb0E9PSIsInZhbHVlIjoiWXdwbnVPdEMxaTEwTkVEanluU0FwQT09IiwibWFjIjoiZmJmMjhlYzg0Y2Y2MDRiODZhNjhiYjExN2Y3MjkxNmNmNTU2NmMzYWI3ZDIwMDY4ZjFmOTA3NDE4Zjk2ZTVkYSJ9', 21500113, 'uploads/avatar.jpg', 'renan', 'renan caluag', 'renan@gmail.com', '$2y$10$EJIPhDEXHoCXcaKEzTjxquasrrHXqwD/nJirv3eQCxN733dAFx87u', 0, '', 'Male', 'Web Integration', 'Associate', '3', 1, 0, 'NO10IWdzPAQ1Fuvq8j5XLpPw1pPK0oi16doVQYSXIRjCGVr0nMRAaNCPfnKS', '2016-05-26 02:25:52', '2016-06-30 04:30:16'),
(3, 'eyJpdiI6IlNqdjhvYnRVRCtwQmhha0NXdFR2Qnc9PSIsInZhbHVlIjoiUlJjVHNDMkRhN0pOU1hSdkVySCtBUT09IiwibWFjIjoiNzU2ZTcyNDZkNGQ4NTE5MWExYzYyOWI5YTdmMmNjMWY4MjA4NzJlNWE3MTc0ZjhjZDQ5NTE2MTYzOWJiZjEyYiJ9', 2150092, 'uploads/avatar.jpg', 'zxc', 'pengster', 'pengster@gmail.com', '$2y$10$yxTBfdWymuUpHd/ZKh.BDOKhfbAOovqYE6A20L3D9Hti/rNBFkoS6', 0, '', 'Female', 'E-Commerce', 'HR', '1', 0, 0, NULL, '2016-06-30 02:30:07', '2016-06-30 02:30:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `department_departmentname_unique` (`departmentname`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `position_positionname_unique` (`positionname`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_empno_unique` (`empno`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `keyenc` (`keyenc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
