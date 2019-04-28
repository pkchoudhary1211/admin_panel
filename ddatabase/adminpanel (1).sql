-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:01 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `client_manager`
--

CREATE TABLE `client_manager` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_manager`
--

INSERT INTO `client_manager` (`id`, `user_id`, `manager_id`, `created_at`, `updated_at`) VALUES
(1, 39, 38, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_04_13_043906_entrust_setup_tables', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(2, 1, 'name', 'wIH9ubg6XzL0FhMFT5mR2KsUTzoGjJWD0990JRDC', 'localhost/callback/', 0, 0, 0, '2019-04-13 01:14:12', '2019-04-13 01:14:12'),
(4, 3, 'Prakash choudhary121', 'INPCbsQF8frOSCj4NnO8MINoMqtVrzoPEcVTndBS', 'localhost/callback/', 0, 0, 0, '2019-04-15 05:09:55', '2019-04-15 05:09:55'),
(5, 11, 'name121', 'QnPiMnOvEO8Fkdns5zky2UcjgwhFik1U5vjpqNgN', 'localhost/callback/', 0, 0, 0, '2019-04-15 05:10:38', '2019-04-15 05:10:38'),
(9, 37, 'api', 'ySZLHnrk56NsL1JzpSFQoHHTemmu4jgUzeqeBZ0R', 'localhost/callback/', 1, 0, 0, '2019-04-17 04:49:24', '2019-04-17 04:49:24'),
(11, 39, 'name', 'vh85BWihTlJGDprSnEZkAfqUSL4VlSfUGRHvEHEN', 'localhost/callback/', 1, 0, 0, '2019-04-17 06:41:44', '2019-04-17 06:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(15, 'add-user', 'add user', 'you can add add user', '2019-04-17 03:16:16', '2019-04-17 03:16:16'),
(16, 'view-user', 'view user', 'you can view user', '2019-04-17 03:16:45', '2019-04-17 03:16:45'),
(17, 'edit-user', 'edit user', 'you can edit user', '2019-04-17 03:17:06', '2019-04-17 03:17:06'),
(18, 'add-client', 'add client', 'you can add client', '2019-04-17 03:17:30', '2019-04-17 03:17:30'),
(19, 'view-client', 'view client', 'you can view client', '2019-04-17 03:17:59', '2019-04-17 03:17:59'),
(20, 're-client', 'Re generate client', 'you can regenrate', '2019-04-17 03:18:45', '2019-04-17 03:18:45'),
(21, 'add-permission', 'add permission', 'you can add permission', '2019-04-17 03:19:39', '2019-04-17 03:19:39'),
(23, 'view-permission', 'view-permission', 'you can  view permission', '2019-04-17 03:20:13', '2019-04-17 03:20:13'),
(24, 'edit-permission', 'edit  permission', 'you can edit permission', '2019-04-17 03:20:59', '2019-04-17 03:20:59'),
(25, 'add-role', 'add role', 'you can add role', '2019-04-17 03:21:46', '2019-04-17 03:21:46'),
(26, 'view-role', 'view role', 'you can view role', '2019-04-17 03:22:11', '2019-04-17 03:22:11'),
(27, 'edit-role', 'edit role', 'you can edit role', '2019-04-17 03:22:29', '2019-04-17 03:22:29'),
(28, 'view-profile', 'view profile', 'You can View Profile', '2019-04-17 03:30:32', '2019-04-17 03:30:32'),
(29, 'self-secret', 'Self Secret', 'Loged In user Secret', '2019-04-17 07:38:39', '2019-04-17 07:38:39');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(15, 28),
(16, 28),
(16, 31),
(17, 28),
(18, 28),
(19, 28),
(19, 29),
(19, 31),
(20, 28),
(20, 30),
(21, 31),
(23, 31),
(24, 31),
(25, 31),
(26, 28),
(26, 31),
(27, 31),
(28, 30),
(28, 31),
(29, 30);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(28, 'admin', 'Admin', 'You are Admin', '2019-04-17 03:26:05', '2019-04-17 03:26:05'),
(29, 'account-manager', 'Account manager', 'You Are Account Manager', '2019-04-17 03:27:34', '2019-04-17 03:27:34'),
(30, 'user', 'User', 'You  Are User', '2019-04-17 03:32:09', '2019-04-17 03:32:09'),
(31, 'developer', 'Developer', 'You Are developer', '2019-04-17 03:33:03', '2019-04-17 03:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `updated_at`) VALUES
(37, 28, NULL),
(38, 29, NULL),
(39, 30, NULL),
(40, 31, NULL),
(41, 29, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temp_email`
--

CREATE TABLE `temp_email` (
  `temp_user_id` int(11) NOT NULL,
  `temp_user_email` varchar(50) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `update_user_password`
--

CREATE TABLE `update_user_password` (
  `id` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `token` varchar(900) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `update_user_password`
--

INSERT INTO `update_user_password` (`id`, `user_email`, `token`, `updated_at`, `created_at`) VALUES
(9, 'pkchoudh1211@gmail.com', 'eyJpdiI6IkJra2sxRFR0YitCbXRka2dEU3VLY1E9PSIsInZhbHVlIjoiRyt0YWVqMlN6ZWVIcGtHbGpVckdUM012YW1Gd0hzYVFaM1JhMlRrbFMxSDNmbkpVeHM3V1ZHR1JSWlZIeFc1TWxPYnZYRmNvXC9CRHJKOWV2bDBXUWxRPT0iLCJtYWMiOiJkYWI4NTg0YjEyZDMyZWRkNjA1OWUzMjRhYzEzOWU5Y2MyOTdlYTk4M2JhZGQ1MGY0Y2QyOTliYTJlMGE5MThkIn0=eyJpdiI6IjUyNWVjSUpxWXE5eVwvSTJBWDhuSmJ3PT0iLCJ2YWx1ZSI6IkpJaFdKUWY3UTE3N0k0S1pneGR5WjFpZ2ZzaDBLak01SDRzSk1SMjV1NTBwak9sUEtNRW9WUkRCeHpPZCs1Wk9cL2dDVTVkRThJaTVaR3VUMmtXcG0yVkdMU082emUycGRkMGZJREhXRjhpemQyWnhLNk44cmZaazJWMXA4cGlXVlplQmVDMWNXTVdPQzF1NHBpSWR0QXZLUkRIZUdKWHNyc20rUXR1NXlqOUE9IiwibWFjIjoiM2ZjNmE5OWFjYTk4YThiZTQ4ZDcwNDc1MmQ2YzljNWY1OGE2NjliYzFiMjM1YjliNDU3YmFmNTdmYjQ1YWVjNyJ9eyJpdiI6IllYcEl1QUZhRlJqMVVyYUowWGwzS1E9PSIsInZhbHVlIjoibEpScEtad0tRM0Vid0RFXC9oZ2N2b3dJUU9MV2ZkK0NlSEtHZUtHRDErNnM9IiwibWFjIjoiYmU1ZWU0Y2VhNWYxYWI2NjQ4OTk4ZDBiNDJlZDVjZGU2MDM1NTQ4MDg2ZTUzZDNkMzNkZjU4MWZjMjMyYjA3YSJ9', '2019-04-17', '2019-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(37, 'Admin', 'admin@gmail.com', NULL, '$2y$10$5xWl4DlegQ23SJMmqTOnuuFhu/s8fC1KeWEUlEBu20XW6og8Ezyjy', NULL, '2019-04-17 03:33:38', '2019-04-17 03:58:35'),
(38, 'accountmanager', 'manager@gmail.com', NULL, '$2y$10$dYZmlQxAJcRx0bc2GSBgMea8druku97W6HmE2zr1tRQx1DeEnbpwS', NULL, '2019-04-17 03:34:16', '2019-04-17 03:58:04'),
(39, 'Prakash', 'ram123@gmail.com', NULL, '$2y$10$u83eB3R2a0msqRHh7Plf1O1Y/5WCImHRBm.ZXwEPM8fSwCjhL2Otu', NULL, '2019-04-17 03:34:47', '2019-04-18 05:46:58'),
(40, 'developer', 'developer@gmail.com', NULL, '$2y$10$gBDZvHp.2RcgoXqJ.3I0NeY1ldBW6Bkoe.IgTNWbwK12ou98yXFhe', NULL, '2019-04-17 03:35:15', '2019-04-17 03:57:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client_manager`
--
ALTER TABLE `client_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `update_user_password`
--
ALTER TABLE `update_user_password`
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
-- AUTO_INCREMENT for table `client_manager`
--
ALTER TABLE `client_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `update_user_password`
--
ALTER TABLE `update_user_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
