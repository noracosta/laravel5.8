-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 08, 2020 at 09:47 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel5.8`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `url` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `order` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `icon` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_id`, `name`, `url`, `order`, `icon`, `created_at`, `updated_at`) VALUES
(1, 0, 'Configuración', '/', 1, 'fas fa-cog', '2020-01-23 13:00:41', '2020-02-24 23:23:06'),
(2, 1, 'Menús', 'admin/menus', 1, 'fas fa-bars', '2020-01-23 13:01:29', '2020-02-24 23:05:56'),
(3, 1, 'Menús - Roles', 'admin/menus_roles', 4, 'fas fa-server', '2020-01-23 13:02:51', '2020-02-24 23:05:56'),
(4, 0, 'Usuarios', 'admin/users', 2, 'fas fa-users', '2020-02-16 19:32:35', '2020-02-24 23:29:31'),
(5, 1, 'Permisos', 'admin/permissions', 3, 'fas fa-lock', '2020-02-21 20:39:13', '2020-02-24 23:05:56'),
(6, 1, 'Permisos - Roles', 'admin/permissions_roles', 5, 'fas fa-user-lock', '2020-02-21 20:42:55', '2020-02-24 23:05:56'),
(7, 1, 'Roles', 'admin/roles', 2, 'fas fa-user-tag', '2020-02-24 01:47:56', '2020-02-24 23:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `menus_roles`
--

CREATE TABLE `menus_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus_roles`
--

INSERT INTO `menus_roles` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 5, NULL, NULL),
(5, 1, 6, NULL, NULL),
(6, 1, 4, NULL, NULL),
(7, 1, 7, NULL, NULL),
(9, 1, 1, NULL, NULL),
(15, 2, 4, NULL, NULL);

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
(29, '2019_12_31_230608_create_users_table', 1),
(30, '2019_12_31_232609_create_roles_table', 1),
(31, '2019_12_31_232706_create_permissions_table', 1),
(32, '2019_12_31_232905_create_users_roles_table', 1),
(33, '2019_12_31_234057_create_permissions_roles_table', 1),
(34, '2019_12_31_234510_create_banners_table', 1),
(35, '2020_01_22_192015_create_menus_table', 1),
(36, '2020_01_22_193413_create_menus_roles_table', 1);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Agregar menu', 'agregar-menu', '2020-02-24 13:53:16', '2020-02-24 14:57:38'),
(2, 'Editar menu', 'editar-menu', '2020-02-24 14:00:24', '2020-02-24 14:57:47'),
(3, 'Ver menu', 'ver-menu', '2020-02-24 14:00:43', '2020-02-24 14:58:05'),
(4, 'Eliminar menu', 'eliminar-menu', '2020-02-24 14:00:51', '2020-02-24 14:57:55'),
(5, 'Agregar menu rol', 'agregar-menu-rol', '2020-03-08 21:03:43', '2020-03-08 21:03:43'),
(6, 'Ver menu rol', 'ver-menu-rol', '2020-03-08 21:03:56', '2020-03-08 21:05:42'),
(7, 'Agregar permiso', 'agregar-permiso', '2020-03-08 21:08:36', '2020-03-08 21:08:36'),
(8, 'Editar permiso', 'editar-permiso', '2020-03-08 21:08:50', '2020-03-08 21:08:50'),
(9, 'Eliminar permiso', 'eliminar-permiso', '2020-03-08 21:09:07', '2020-03-08 21:09:07'),
(10, 'Ver permiso', 'ver-permiso', '2020-03-08 21:09:22', '2020-03-08 21:09:22'),
(11, 'Agregar permiso rol', 'agregar-permiso-rol', '2020-03-08 21:15:35', '2020-03-08 21:15:35'),
(12, 'Ver permiso rol', 'ver-permiso-rol', '2020-03-08 21:15:51', '2020-03-08 21:15:51'),
(13, 'Agregar rol', 'agregar-rol', '2020-03-08 21:17:50', '2020-03-08 21:17:50'),
(14, 'Editar rol', 'editar-rol', '2020-03-08 21:18:01', '2020-03-08 21:18:01'),
(15, 'Eliminar rol', 'eliminar-rol', '2020-03-08 21:18:12', '2020-03-08 21:18:12'),
(16, 'Ver rol', 'ver-rol', '2020-03-08 21:18:29', '2020-03-08 21:18:29'),
(17, 'Agregar usuario', 'agregar-usuario', '2020-03-08 21:20:59', '2020-03-08 21:20:59'),
(18, 'Editar usuario', 'editar-usuario', '2020-03-08 21:21:07', '2020-03-08 21:21:07'),
(19, 'Eliminar usuario', 'eliminar-usuario', '2020-03-08 21:21:14', '2020-03-08 21:21:14'),
(20, 'Ver usuario', 'ver-usuario', '2020-03-08 21:21:21', '2020-03-08 21:21:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `permissions_roles`
--

INSERT INTO `permissions_roles` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, NULL, NULL),
(14, 1, 14, NULL, NULL),
(15, 1, 15, NULL, NULL),
(16, 1, 16, NULL, NULL),
(17, 1, 17, NULL, NULL),
(18, 1, 18, NULL, NULL),
(19, 1, 19, NULL, NULL),
(20, 1, 20, NULL, NULL),
(21, 2, 17, NULL, NULL),
(22, 2, 18, NULL, NULL),
(23, 2, 19, NULL, NULL),
(24, 2, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_spanish_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'superadministrador', '2020-02-16 20:12:01', '2020-02-24 23:24:24'),
(2, 'administrador', '2020-02-16 03:00:00', '2020-02-24 23:24:48'),
(3, 'editor', '2019-07-23 03:00:00', '2020-02-24 23:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nora Costa', 'noraalejandracosta@gmail.com', NULL, '$2y$10$O.RKehfj366ISAl2jH68D.NMtHNbmtFhQaWf5qxl8mZv/cmsu6/Qe', '8EeobcUXJ5hHCymDdcFcx0C8c09VYuCVRk4MgOQNi7vUoIrkjl8QWsnHMlfg', NULL, '2020-02-26 21:51:21');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_roles`
--
ALTER TABLE `menus_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menus_roles_roles` (`role_id`),
  ADD KEY `fk_menus_roles_menus` (`menu_id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_permissions_roles_roles` (`role_id`),
  ADD KEY `fk_permissions_roles_permissions` (`permission_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_roles_roles` (`role_id`),
  ADD KEY `fk_users_roles_users` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `menus_roles`
--
ALTER TABLE `menus_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus_roles`
--
ALTER TABLE `menus_roles`
  ADD CONSTRAINT `fk_menus_roles_menus` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `fk_menus_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD CONSTRAINT `fk_permissions_roles_permissions` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `fk_permissions_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD CONSTRAINT `fk_users_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `fk_users_roles_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
