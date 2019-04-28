-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2019 at 03:37 PM
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
(1, 1, 'Prakash choudhary', 'vkVy9NKDrhJnYbmdqa3Rb45qWBrTmAVOmcCQjShC', 'localhost/callback/', 0, 0, 0, '2019-04-13 00:32:40', '2019-04-13 00:32:40'),
(2, 1, 'name', 'wIH9ubg6XzL0FhMFT5mR2KsUTzoGjJWD0990JRDC', 'localhost/callback/', 0, 0, 0, '2019-04-13 01:14:12', '2019-04-13 01:14:12'),
(3, 1, 'Prakash choudhary', '3okDcHEga43IJmayMeS5jJNhgV7d2qQTzKRHKkTO', 'localhost/callback/', 0, 0, 0, '2019-04-15 04:21:27', '2019-04-15 04:21:27'),
(4, 3, 'Prakash choudhary121', 'INPCbsQF8frOSCj4NnO8MINoMqtVrzoPEcVTndBS', 'localhost/callback/', 0, 0, 0, '2019-04-15 05:09:55', '2019-04-15 05:09:55'),
(5, 11, 'name121', 'QnPiMnOvEO8Fkdns5zky2UcjgwhFik1U5vjpqNgN', 'localhost/callback/', 0, 0, 0, '2019-04-15 05:10:38', '2019-04-15 05:10:38'),
(6, 1, 'name33', '2CZA0DeH81DyTGA320Dckwk2Bs1dJbztK9r8fAOp', 'localhost/callback/', 1, 0, 0, '2019-04-15 06:56:02', '2019-04-15 06:56:02'),
(7, 1, 'Prakash choudhary22334', 'BOFn50By8fq9ks4oqRp0sIDYM2EeAkbYV57bXgQV', 'localhost/callback/', 0, 1, 0, '2019-04-15 06:59:07', '2019-04-15 06:59:07');

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
(1, 'Prakash choudhary', NULL, 'test', '2019-04-13 00:19:22', '2019-04-13 00:19:22'),
(2, 'name', 'tests', 'hello wrold', '2019-04-13 03:41:13', '2019-04-13 03:41:13'),
(4, 'name122', 'tests44', 'hello wrold duniya', '2019-04-13 03:42:31', '2019-04-15 01:15:51'),
(5, 'dfg', 'df', 'sd', '2019-04-15 00:58:10', '2019-04-15 00:58:10'),
(6, 'xd', 'ds', 'xfgdf', '2019-04-15 00:58:57', '2019-04-15 00:58:57'),
(8, 'name225', 'pk121', 'test', '2019-04-15 03:48:13', '2019-04-15 03:48:13');

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
(2, 25),
(4, 23),
(5, 25);

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
(1, 'Prakash choudhary', 'pk', 'detils', '2019-04-13 03:53:05', '2019-04-13 03:53:05'),
(3, 'Prakash', 'pk121', 'detils', '2019-04-13 03:54:04', '2019-04-13 03:54:04'),
(4, 'Prakash 3', 'pk121', 'detils', '2019-04-13 03:54:19', '2019-04-13 03:54:19'),
(5, 'name22', 'pk', 'xd', '2019-04-13 04:20:20', '2019-04-13 04:20:20'),
(7, 'name33', 'pk', 'mast', '2019-04-13 04:29:42', '2019-04-13 04:29:42'),
(8, 'name43', 'pk', 'mast', '2019-04-13 04:30:38', '2019-04-13 04:30:38'),
(9, '3322r', 'pkee', 'ee', '2019-04-13 04:32:06', '2019-04-13 04:32:06'),
(10, '332ww', 'pkee', 'ee', '2019-04-13 04:32:53', '2019-04-13 04:32:53'),
(11, '332w', 'pkee', 'ee', '2019-04-13 04:33:51', '2019-04-13 04:33:51'),
(13, '332we', 'pkee', 'ee', '2019-04-13 04:34:39', '2019-04-13 04:34:39'),
(15, '332weju', 'pkee', 'ee', '2019-04-13 04:35:33', '2019-04-13 04:35:33'),
(16, '332weju444', 'pkee', 'ee', '2019-04-13 04:35:51', '2019-04-13 04:35:51'),
(17, '332weju449', 'pkee', 'ee', '2019-04-13 04:36:10', '2019-04-13 04:36:10'),
(18, 'nameii', 'pk', 'rte', '2019-04-13 04:38:36', '2019-04-13 04:38:36'),
(19, 'nameidfg', 'pk', 'rte', '2019-04-13 04:39:07', '2019-04-13 04:39:07'),
(20, 'ppapa', 'pk', 'rte', '2019-04-13 04:42:14', '2019-04-13 04:42:14'),
(22, 'name22xd', 'pk', 'sfsd', '2019-04-13 04:44:26', '2019-04-13 04:44:26'),
(23, 'Prakash 1', 'pk121', 'detils', '2019-04-13 04:45:09', '2019-04-14 23:55:13'),
(24, 'Prakash choudhar111', 'pkee', 'test', '2019-04-15 03:52:58', '2019-04-15 03:52:58'),
(25, 'sdsd44', 'sdsd mast', 'test', '2019-04-15 03:56:37', '2019-04-15 05:57:58');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 9),
(3, 23),
(8, 4),
(9, 1),
(10, 24),
(11, 5),
(12, 9);

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
(1, 'pk mast', 'pkchoudhary121mast@gmail.com', NULL, '$2y$10$zLFBkPpLhHhsUKZ04eBeaOx6xhLYqgaNFYihfdsufixBaFKx2yjCu', NULL, '2019-04-12 23:15:22', '2019-04-15 00:38:00'),
(2, 'Prakash choudhary', 'pkchoudry1211@gmail.com', NULL, '$2y$10$sE5/ANQYaaMIFdtq65P5re8v9LuEyE81tg6eJYOAlBURCz28UUMkO', NULL, '2019-04-13 06:49:16', '2019-04-13 06:49:16'),
(3, 'Prakash', 'pkchoudr211@gmail.com', NULL, '$2y$10$0WGHsrKad.pCcyDTH3RfZ.pg/jBcaGidi84YUAI7bAxiZaXTWIkcy', NULL, '2019-04-13 06:49:44', '2019-04-15 01:19:59'),
(4, 'Prakash choudhary', 'pkchoudr21@gmail.com', NULL, '$2y$10$mgWhRGNtwYym4DLuBKpGDuTpeLiSvhawxm0blmEWELTT3XPKe8lvC', NULL, '2019-04-13 06:50:24', '2019-04-13 06:50:24'),
(6, 'Prakash choudhary', 'pkchoudr21@mail.com', NULL, '$2y$10$ThkerUxGxoYv1uQf/KfgzeazGW2yCEY1W1AV/Wa/daz3lzrDZmauG', NULL, '2019-04-13 06:51:03', '2019-04-13 06:51:03'),
(7, 'Prakash choudhary', 'pkchoudr21@mil.com', NULL, '$2y$10$Djo1Grf1vv191xG7UxZAaeABg161VXxQkxejlCWcU0V3NS9hLJwA6', NULL, '2019-04-13 06:51:29', '2019-04-13 06:51:29'),
(8, 'Prakash choudhary', 'pkchoudr21@mil.om', NULL, '$2y$10$0.ATZIyIO/wJR2ZojalCiegdDmdaO4xRXKSTI5RdyCQo4EK2aOKum', NULL, '2019-04-13 06:51:48', '2019-04-13 06:51:48'),
(9, 'pkchoudharyss1211@gmail.com', 'pkchoudharyss1211@gmail.com', NULL, '$2y$10$K.9pJHr2ck5vhqYFetdiEeLUVRGrk9O8x57D2Vz9I1.qX6KlPeR3K', NULL, '2019-04-15 04:09:40', '2019-04-15 04:09:40'),
(10, 'Prakash choudhary', 'pkchoudha@gmail.com', NULL, '$2y$10$5pQqjCHoLVPg17dpVAEV6uQsR6VBkdh5pC/L4MdEFdERWxF6kni0G', NULL, '2019-04-15 04:12:02', '2019-04-15 04:12:02'),
(11, 'kaushik  Thakkar', 'sdfsd@gmail.com', NULL, '$2y$10$HR0HN0Ve6QEXgJAGQRVf/eh38LZkiklzrdGtsG2Q71.Q6H4DRufI.', NULL, '2019-04-15 05:03:02', '2019-04-15 05:03:02'),
(12, 'qq', 'pkchoudhary1211www@gmail.com', NULL, '$2y$10$yGav2emN9cQSzW2YZb7I9ud5XvRtotVJup8.FnVcmPn8auGjXZv9W', NULL, '2019-04-15 07:58:51', '2019-04-15 07:58:51');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
