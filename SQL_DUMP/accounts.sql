/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `item` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `added_by` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `accounts` (`id`, `item`, `type`, `price`, `added_by`, `created_at`, `updated_at`) VALUES
	(1, 'pen', 'expense', '2000', 'accountant2@gmail.com', '2024-06-18 13:06:45', '2024-06-18 10:33:40'),
	(2, 'pencil', 'income', '2000', 'accountant@gmail.com', '2024-06-18 13:07:11', '2024-06-18 13:07:12'),
	(3, 'bookes', 'expense', '70', 'accountant2@gmail.com', NULL, NULL);

CREATE TABLE IF NOT EXISTS `backend_menu_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `backend_menu_items` (`id`, `parent_id`, `name`, `route_name`, `nav_order`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2, 'Create Accountants', 'add_accountants', '', '2024-06-18 10:45:22', '2024-06-18 10:45:23', NULL),
	(2, NULL, 'Accountants List', 'list_accountants', '2', '2024-06-18 10:47:33', '2024-06-18 10:47:34', NULL),
	(3, 2, 'Edit Accountants', 'edit_accountants', '', '2024-06-18 10:48:09', '2024-06-18 10:48:10', NULL),
	(4, 2, 'Delete Accountants', 'delete_accountants', '', '2024-06-18 10:48:54', '2024-06-18 10:48:55', NULL),
	(5, 7, 'Add Accounts', 'add_accounts', '', '2024-06-18 10:50:47', '2024-06-18 10:50:48', NULL),
	(6, 7, 'Edit Accounts', 'edit_accounts', '', '2024-06-18 10:51:46', '2024-06-18 10:51:47', NULL),
	(7, NULL, 'Accounts List', 'list_accounts', '3', '2024-06-18 10:52:13', '2024-06-18 10:52:14', NULL),
	(8, 7, 'Delete Accounts', 'delete_accounts', '', '2024-06-18 10:52:42', '2024-06-18 10:52:43', NULL),
	(9, NULL, 'Home', 'home', '1', '2024-06-18 10:56:39', '2024-06-18 10:56:41', NULL),
	(10, 2, 'Post Add Accountants Route', 'postaddaccountants', '', '2024-06-18 17:14:47', '2024-06-18 17:14:48', NULL),
	(11, 2, 'Update Accountant', 'update_accountants', '', '2024-06-18 17:14:49', '2024-06-18 17:14:50', NULL),
	(12, 7, 'Post Add Accounts', 'post_add_accounts', '', '2024-06-18 20:57:31', '2024-06-18 20:57:32', NULL),
	(13, 7, 'Update Accounts', 'update_accounts', '', '2024-06-18 21:32:20', '2024-06-18 21:32:21', NULL),
	(14, NULL, 'Roles', 'roles_list', '4', '2024-06-18 21:46:54', '2024-06-18 21:46:55', NULL),
	(15, NULL, 'Permissions', 'permission_list', '5', '2024-06-18 21:47:33', '2024-06-18 21:47:34', NULL),
	(16, 15, 'Add Permission', 'add_permission', '', '2024-06-18 21:48:11', '2024-06-18 21:48:13', NULL),
	(17, 15, 'Post Permission Route', 'post_add_permission', '', '2024-06-18 21:48:46', '2024-06-18 21:48:47', NULL),
	(18, 15, 'Delete Permission', 'delete_permission', '', '2024-06-18 21:54:44', '2024-06-18 21:54:45', NULL),
	(19, NULL, 'Menu List', 'menu_list', '6', '2024-06-18 21:55:40', '2024-06-18 21:55:41', NULL),
	(20, 15, 'Edit Permission', 'edit_permission', NULL, '2024-06-19 01:10:34', '2024-06-19 01:10:35', NULL),
	(21, 15, 'Update Permission', 'update_permission', NULL, '2024-06-19 01:12:11', '2024-06-19 01:12:13', NULL);

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role` text COLLATE utf8mb4_general_ci,
  `alias` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `roles` (`id`, `role`, `alias`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin', '2024-06-18 07:33:58', '2024-06-18 07:33:59'),
	(2, 'Accountant', 'accountant', '2024-06-18 07:34:38', '2024-06-18 07:34:40'),
	(3, 'Developer', 'developer', '2024-06-19 04:25:22', '2024-06-19 04:25:23'),
	(4, 'SuperAdmin', 'superadmin', '2024-06-19 04:40:02', '2024-06-19 04:40:03'),
	(5, 'QA', 'qa', '2024-06-19 04:40:16', '2024-06-19 04:40:17');

CREATE TABLE IF NOT EXISTS `role_has_menu` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int DEFAULT '0',
  `menu_id` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `role_has_menu` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 9, '2024-06-18 11:03:14', '2024-06-18 11:03:16'),
	(2, 1, 2, '2024-06-18 12:23:58', '2024-06-18 12:23:59'),
	(3, 1, 7, '2024-06-18 12:24:00', '2024-06-18 12:24:01'),
	(5, 1, 10, '2024-06-18 16:01:23', '2024-06-18 16:01:24'),
	(6, 1, 4, '2024-06-18 17:15:44', '2024-06-18 17:15:45'),
	(7, 1, 11, '2024-06-18 17:15:57', '2024-06-18 17:15:58'),
	(8, 1, 3, '2024-06-18 17:16:44', '2024-06-18 17:16:45'),
	(9, 2, 5, '2024-06-18 18:45:18', '2024-06-18 18:45:19'),
	(10, 2, 6, '2024-06-18 18:46:31', '2024-06-18 18:46:32'),
	(11, 2, 8, '2024-06-18 18:46:33', '2024-06-18 18:46:35'),
	(12, 2, 9, '2024-06-18 18:57:54', '2024-06-18 18:57:56'),
	(13, 2, 7, '2024-06-18 18:59:31', '2024-06-18 18:59:32'),
	(14, 2, 12, '2024-06-18 20:58:58', '2024-06-18 20:59:00'),
	(15, 2, 13, '2024-06-18 21:33:25', '2024-06-18 21:33:26'),
	(16, 1, 15, '2024-06-19 03:46:58', '2024-06-19 03:46:59'),
	(17, 1, 16, '2024-06-19 03:47:00', '2024-06-19 03:47:03'),
	(18, 1, 17, '2024-06-19 03:47:04', '2024-06-19 03:47:01'),
	(19, 1, 18, '2024-06-19 03:47:07', '2024-06-19 03:47:06'),
	(20, 1, 20, '2024-06-19 03:47:05', '2024-06-19 03:47:09'),
	(21, 1, 21, '2024-06-19 03:47:10', '2024-06-19 03:47:11'),
	(24, 1, 1, NULL, NULL),
	(25, 3, 1, NULL, NULL),
	(26, 3, 2, NULL, NULL),
	(27, 3, 3, NULL, NULL),
	(28, 3, 4, NULL, NULL),
	(29, 1, 14, NULL, NULL);

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `name`, `email`, `contact_no`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Jean Lobo', 'lobojeanz@gmail.com', '7090960721', 1, NULL, '12345', NULL, '2024-06-17 21:03:58', '2024-06-17 21:03:58'),
	(3, 'judith', 'judith@gmail.com', '65454546545', 1, NULL, '123456', NULL, '2024-06-17 21:05:35', '2024-06-17 21:05:35'),
	(4, 'Admin', 'admin@fyntune.com', '85296374', 1, NULL, 'password', NULL, '2024-06-17 21:18:45', '2024-06-17 21:18:45'),
	(5, 'Admin1', 'admin1@fyntune.com', '5646551', 1, NULL, 'password', NULL, '2024-06-17 21:20:01', '2024-06-17 21:20:01'),
	(6, 'Admin2', 'admin2@fyntune.com', '48454465', 1, NULL, 'password', NULL, '2024-06-17 21:20:30', '2024-06-17 21:20:30'),
	(7, 'Admin3', 'admin3@gmail.com', '45454546546', 1, NULL, 'password', NULL, '2024-06-17 21:23:12', '2024-06-17 21:23:12'),
	(8, 'Accountant', 'accountant@gmail.com', '545645445', 2, NULL, '12345', NULL, '2024-06-18 13:22:54', '2024-06-18 06:54:34'),
	(12, 'accountant2', 'accountant2@gmail.com', '7090960721', 2, NULL, '12345', NULL, '2024-06-18 05:35:07', '2024-06-18 05:35:07'),
	(17, 'accountant4', 'accountant4@gmail.com', '8529231512454', 2, NULL, '12345', NULL, '2024-06-18 23:19:00', '2024-06-18 23:19:12');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
