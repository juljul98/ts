-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2016 at 11:21 AM
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
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`id`, `empid`, `title`, `description`, `color`, `start_date`, `created_at`, `updated_at`) VALUES
(13, 1, 'Mhon''s Transformation', 'Gumagwapo na si Mhon angas bhe', '#00b8d4', '2016-06-15', '2016-06-02 01:14:57', '2016-06-02 01:14:57'),
(60, 2, 'sdsd', 'sdssdsdsdsd', '#3a87ad', '2016-06-22', '2016-06-03 06:29:27', '2016-06-03 06:29:27');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
('2016_06_03_153614_create_department_table', 5),
('2016_06_03_153629_create_position_table', 6),
('2016_06_07_093220_create_roles_table', 6);

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
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'Administrator', 'Full access to the System', '2016-06-09 05:16:40', '2016-06-09 05:16:40'),
(2, 'Manager', 'Manage Leaves, Overtime and many more', '2016-06-09 05:16:40', '2016-06-09 05:16:40'),
(3, 'User', 'A standard user that can have a licence assigned to them. No administrative features.', '2016-06-09 05:16:40', '2016-06-09 05:16:40');

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
  `id` int(10) UNSIGNED NOT NULL,
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

INSERT INTO `users` (`id`, `empno`, `avatar`, `username`, `fullname`, `email`, `password`, `phone`, `address`, `gender`, `department`, `position`, `userlevel`, `active`, `online`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2150091, 'uploads/avatar.jpg', 'juls', 'Julius DS. Mateo', 'mateojulius98@yahoo.com', '$2y$10$zFi78mFIEEf.93NfZYE/w.GtOaoM8QCO6UERukOXtDksezwUdfCKu', 0, '', 'Male', 'Web Integration', 'Associate', '1', 1, 0, '0yDDUV4qqi01SPVg4inJU9gQttR65ZqU4FGR6GpLGEq3dDSuYAibShYL7LPQ', '2016-05-17 04:04:52', '2016-06-09 02:02:22'),
(2, 21500113, 'uploads/avatar.jpg', 'renan', 'renan caluag', 'renan@gmail.com', '$2y$10$EJIPhDEXHoCXcaKEzTjxquasrrHXqwD/nJirv3eQCxN733dAFx87u', 0, '', 'Male', 'Web Integration', 'Associate', '3', 1, 0, '98xIFfbMkRhfMGZJIVHXssnWlbh1Hz91PNhs7PssxZhFbq9M3U2P8MOj3fMN', '2016-05-26 02:25:52', '2016-06-09 01:22:39'),
(3, 12, 'xcvcx', 'ace', 'vcxvxcv', 'cxvxcvxc', '$2y$10$EJIPhDEXHoCXcaKEzTjxquasrrHXqwD/nJirv3eQCxN733dAFx87u', 2121211, 'vxcvxcvxcv', 'cvxcvcxv', 'xcvxcvxcv', 'xcvxcvcxv', '3', 1, 0, 'VnuErTOHtHiBg8jP3q4NruJkKZZHymSpXOjg9ZeCGcRVGcd2g68OSQSwvlks', NULL, '2016-06-08 03:42:31'),
(4, 0, '', 'Jemuel', 'Walasak', '', '', 0, '', '', '', '', '', 0, 0, NULL, NULL, '2016-06-01 02:20:44'),
(5, 23234, '', '', 'Jemuel', 'sadasd@gmail.com', '', 234, '', '', '', '', '', 0, 1, NULL, NULL, '2016-06-01 02:20:45'),
(6, 232344, '', '', 'Renan Caluag', 'sadassdd@gmail.com', '', 233434, '', '', '', '', '', 0, 1, NULL, NULL, '2016-06-01 02:20:46'),
(7, 2324534, '', '', 'Doms', 'sadfdghasd@gmail.com', '', 234, '', '', '', '', '', 0, 1, NULL, NULL, '2016-06-01 02:20:47'),
(66, 2323, '', '', 'King', 'emdfdfdfgsdfail@gmail.com', '', 123, '', '', '', '', '', 1, 1, NULL, NULL, '2016-06-01 02:16:30'),
(90, 567, '', '', 'Jegs', 'email@gmail.com', '', 123, '', '', '', '', '', 1, 1, NULL, NULL, '2016-06-01 02:16:30'),
(91, 5267, '', '', 'Linford', 'emadfdfil@gmail.com', '', 123, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(188, 1273, 'dsfsf', 'sdfdsf', 'sfsdfdsf', 'sdfdsmmyyuy7f@gmail.com', '12313', 0, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(568, 56567, '', '', 'Asasdasd', 'dsfsdfdfsdf@gmail.com', '', 21313, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(934, 5, '', '', 'Jumar', 'emdfdfdfgfail@gmail.com', '', 123, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(2313, 3, 'dsfsf', 'sdfdsf', 'sfsdfdfgfgsf', 'sdfggfdsf@gmail.com', 'sdfgffsdf', 0, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(9034, 56734, '', '', 'JohnRey', 'emdfdfdfail@gmail.com', '', 123, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(234413, 344, 'dsfsf', 'sdfdsf', 'sfsdfdfgfgsf', 'sdf44ggfdsf@gmail.com', 'sdf44gffsdf', 0, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(12312313, 123, 'dsfsf', 'sdfdsf', 'sfsdfdsf', 'sdfdsf@gmail.com', 'sdfsdf', 0, '', '', '', '', '', 1, 1, NULL, NULL, NULL),
(4294967295, 2147483647, '', '', 'A2343242424d', 'dsf234234sdfdfsdf@gmail.com', '', 22342343, '', '', '', '', '', 0, 1, NULL, '2016-05-30 16:00:00', '2016-06-01 02:21:07');

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483647;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
