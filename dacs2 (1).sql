-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 04:38 AM
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
-- Database: `dacs2`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `role_id`, `created_at`, `updated_at`) VALUES
(4, 'haizuka12345', 'haizuka12345', 8, '2022-09-20 09:51:23', '2022-09-30 16:39:56'),
(10, 'havana123457758', 'havana123457758', 4, '2022-09-22 16:13:48', '2022-09-22 16:13:48'),
(12, '1', '11', 8, '2022-09-24 09:34:44', '2022-09-24 09:34:44'),
(17, 'admin', 'admin111111', 4, '2022-10-31 06:16:35', '2022-10-31 06:16:35'),
(18, 'HaiZuka', '123456', 4, '2022-11-01 14:58:36', '2022-11-01 14:58:36'),
(19, 'havana1', 'havana1', 4, '2022-11-21 09:25:38', '2022-11-21 09:25:38'),
(20, 'havana12', 'havana12', 4, '2022-11-21 09:28:52', '2022-11-21 09:28:52'),
(21, 'havana1234', 'havana1234', 4, '2022-12-04 10:54:01', '2022-12-04 10:54:01'),
(22, 'havana0', 'havana0', 4, '2022-12-04 11:02:09', '2022-12-04 11:02:09');

-- --------------------------------------------------------

--
-- Table structure for table `auto_banks`
--

CREATE TABLE `auto_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `amount` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `transactionNumber` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auto_banks`
--

INSERT INTO `auto_banks` (`id`, `user_id`, `amount`, `created_at`, `updated_at`, `transactionNumber`) VALUES
(2, 4, 10000, '2022-11-27 14:27:13', '2022-11-27 14:27:13', '2517'),
(3, 4, 12000, '2022-11-27 14:28:55', '2022-11-27 14:28:55', '2518'),
(4, 4, 12000, '2022-11-27 14:55:23', '2022-11-27 14:55:23', '2520'),
(5, 4, 21000, '2022-11-27 14:57:26', '2022-11-27 14:57:26', '2521'),
(6, 4, 10000, '2022-11-27 15:03:09', '2022-11-27 15:03:09', '2522'),
(8, 4, 12345, '2022-11-27 15:28:01', '2022-11-27 15:28:01', '2524'),
(9, 4, 10000, '2022-11-27 15:28:34', '2022-11-27 15:28:34', '2525');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `shortName` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `shortName`, `number`, `password`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Á Châu', 'ACB', '5563331', 'Zuka030203', '24D135D8-2EE7-0832-D352-352228A2AE49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `current_price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_orders`
--

INSERT INTO `detail_orders` (`id`, `product_id`, `order_id`, `quantity`, `current_price`, `created_at`, `updated_at`, `size_id`) VALUES
(9, 1, 6, 2, 3000000, '2022-10-30 14:51:10', '2022-10-30 14:51:10', 1),
(10, 4, 6, 1, 27000000, '2022-10-30 14:51:10', '2022-10-30 14:51:10', 1),
(11, 4, 7, 0, 27000000, '2022-10-30 14:56:35', '2022-10-30 14:56:35', 1),
(12, 1, 8, 10, 3000000, '2022-10-30 15:00:39', '2022-10-30 15:00:39', 1),
(13, 5, 10, 1, 1000000, '2022-10-30 15:12:13', '2022-10-30 15:12:13', 1),
(14, 1, 11, 1, 3000000, '2022-10-31 06:30:58', '2022-10-31 06:30:58', 1),
(15, 1, 12, 1, 3000000, '2022-11-01 08:55:06', '2022-11-01 08:55:06', 1),
(16, 1, 13, 8, 3000000, '2022-11-01 09:32:25', '2022-11-01 09:32:25', 1),
(17, 3, 13, 1, 30000000, '2022-11-01 09:32:25', '2022-11-01 09:32:25', 1),
(18, 4, 13, 1, 27000000, '2022-11-01 09:32:25', '2022-11-01 09:32:25', 1),
(19, 5, 13, 1, 1000000, '2022-11-01 09:32:25', '2022-11-01 09:32:25', 1),
(20, 6, 13, 7, 30000000, '2022-11-01 09:32:25', '2022-11-01 09:32:25', 1),
(21, 6, 14, 5, 30000000, '2022-11-01 09:45:46', '2022-11-01 09:45:46', 1),
(22, 6, 15, 2, 30000000, '2022-11-01 14:59:48', '2022-11-01 14:59:48', 1),
(23, 3, 15, 3, 30000000, '2022-11-01 14:59:48', '2022-11-01 14:59:48', 1),
(24, 1, 16, 1, 3000000, '2022-11-01 15:07:19', '2022-11-01 15:07:19', 1),
(25, 5, 16, 1, 1000000, '2022-11-01 15:07:19', '2022-11-01 15:07:19', 1),
(26, 1, 17, 3, 3000000, '2022-11-03 14:41:03', '2022-11-03 14:41:03', 1),
(27, 3, 17, 2, 30000000, '2022-11-03 14:41:03', '2022-11-03 14:41:03', 1),
(28, 1, 18, 2, 3000000, '2022-11-06 10:02:01', '2022-11-06 10:02:01', 1),
(29, 1, 19, 1, 3000000, '2022-11-06 10:08:48', '2022-11-06 10:08:48', 1),
(30, 1, 20, 1, 3000000, '2022-11-06 10:13:50', '2022-11-06 10:13:50', 1),
(31, 1, 21, 1, 3000000, '2022-11-19 04:16:45', '2022-11-19 04:16:45', 1),
(32, 1, 23, 1, 3000000, '2022-11-21 03:02:12', '2022-11-21 03:02:12', 1),
(33, 1, 24, 1, 3000000, '2022-11-21 03:05:47', '2022-11-21 03:05:47', 1),
(34, 1, 25, 1, 3000000, '2022-11-27 09:15:54', '2022-11-27 09:15:54', 1),
(35, 5, 26, 1, 1000000, '2022-11-29 10:00:23', '2022-11-29 10:00:23', 1),
(36, 4, 27, 1, 27000000, '2022-11-29 10:03:39', '2022-11-29 10:03:39', 1),
(37, 1, 28, 1, 3000000, '2022-12-04 15:11:42', '2022-12-04 15:11:42', 1),
(38, 1, 29, 1, 3000000, '2022-12-04 15:14:16', '2022-12-04 15:14:16', 2),
(39, 1, 37, 1, 3000000, '2022-12-04 15:22:42', '2022-12-04 15:22:42', 2),
(40, 5, 38, 1, 1000000, '2022-12-04 15:26:42', '2022-12-04 15:26:42', 3),
(41, 5, 39, 1, 1000000, '2022-12-04 15:27:36', '2022-12-04 15:27:36', 3),
(42, 1, 39, 1, 3000000, '2022-12-04 15:27:36', '2022-12-04 15:27:36', 2),
(43, 5, 40, 1, 1000000, '2022-12-04 15:29:32', '2022-12-04 15:29:32', 3),
(44, 9, 41, 1, 2000000, '2022-12-19 15:22:56', '2022-12-19 15:22:56', 2),
(45, 1, 41, 1, 3000000, '2022-12-19 15:22:56', '2022-12-19 15:22:56', 2),
(46, 1, 44, 1, 3000000, '2022-12-20 08:10:40', '2022-12-20 08:10:40', 3),
(47, 1, 45, 1, 3000000, '2022-12-20 08:12:54', '2022-12-20 08:12:54', 3),
(48, 1, 46, 1, 3000000, '2022-12-20 08:14:55', '2022-12-20 08:14:55', 3),
(49, 1, 47, 2, 3000000, '2022-12-20 08:19:36', '2022-12-20 08:19:36', 3),
(50, 5, 47, 1, 1000000, '2022-12-20 08:19:36', '2022-12-20 08:19:36', 3),
(51, 1, 48, 1, 3000000, '2022-12-21 06:13:27', '2022-12-21 06:13:27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2022_09_13_151021_create_roles_table', 1),
(3, '2022_09_17_162458_create_accounts_table', 2),
(5, '2022_09_17_162458_create_users_table', 3),
(7, '2022_09_25_162547_create_type_products_table', 4),
(8, '2022_09_25_200000_create_products_table', 5),
(9, '2022_10_02_162906_add__u_r_l_phone_address_to_users_table', 6),
(10, '2022_10_22_153856_create_carts_table', 7),
(13, '2022_10_22_153858_create_statuses_table', 8),
(14, '2022_10_22_154133_create_orders_table', 8),
(15, '2022_10_22_154237_create_detail_orders_table', 8),
(16, '2022_11_05_222847_add_money_to_users_table', 9),
(17, '2022_11_12_161654_create_sizes_table', 10),
(18, '2022_11_12_161936_create_product_sizes_table', 10),
(19, '2022_11_12_165626_add_size_product_to_carts_table', 11),
(20, '2022_11_26_160812_create_auto_banks_table', 12),
(21, '2022_11_27_155423_create_banks_table', 13),
(22, '2022_12_04_214552_add_size_product_to_detail_orders_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stt_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `stt_id`, `total_price`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 33000000, '2022-10-30 14:51:10', '2022-12-20 08:09:25'),
(7, 2, 1, 0, '2022-10-30 14:56:35', '2022-12-20 08:09:57'),
(8, 2, 1, 30000000, '2022-10-30 15:00:39', '2022-10-30 15:00:39'),
(9, 2, 1, 0, '2022-10-30 15:02:35', '2022-10-30 15:02:35'),
(10, 2, 4, 1000000, '2022-10-30 15:12:13', '2022-12-20 08:09:33'),
(11, 4, 3, 3000000, '2022-10-31 06:30:58', '2022-12-20 08:02:11'),
(12, 4, 3, 3000000, '2022-11-01 08:55:06', '2022-12-20 08:02:16'),
(13, 4, 3, 292000000, '2022-11-01 09:32:25', '2022-12-20 08:10:16'),
(14, 4, 3, 150000000, '2022-11-01 09:45:46', '2022-12-20 08:17:07'),
(15, 6, 2, 150000000, '2022-11-01 14:59:48', '2022-11-01 15:03:55'),
(16, 6, 1, 4000000, '2022-11-01 15:07:19', '2022-11-01 15:07:19'),
(17, 5, 1, 69000000, '2022-11-03 14:41:03', '2022-11-03 14:41:03'),
(18, 4, 3, 6000000, '2022-11-06 10:02:01', '2022-12-20 08:11:59'),
(19, 4, 3, 3000000, '2022-11-06 10:08:47', '2022-12-20 08:17:25'),
(20, 4, 3, 3000000, '2022-11-06 10:13:50', '2022-12-20 08:18:02'),
(21, 4, 1, 3000000, '2022-11-19 04:16:44', '2022-11-19 04:16:44'),
(22, 4, 1, 3000000, '2022-11-19 04:17:46', '2022-11-19 04:17:46'),
(23, 4, 2, 3000000, '2022-11-21 03:02:12', '2022-12-20 11:30:14'),
(24, 4, 1, 3000000, '2022-11-21 03:05:47', '2022-11-21 03:05:47'),
(25, 4, 5, 3000000, '2022-11-27 09:15:54', '2022-12-20 11:29:33'),
(26, 4, 1, 1000000, '2022-11-29 10:00:23', '2022-11-29 10:00:23'),
(27, 4, 3, 27000000, '2022-11-29 10:03:39', '2022-12-20 11:36:44'),
(28, 4, 3, 3000000, '2022-12-04 15:11:42', '2022-12-20 11:39:10'),
(29, 4, 1, 3000000, '2022-12-04 15:14:16', '2022-12-04 15:14:16'),
(30, 4, 3, 3000000, '2022-12-04 15:17:04', '2022-12-20 11:36:35'),
(31, 4, 3, 3000000, '2022-12-04 15:19:12', '2022-12-20 08:21:46'),
(32, 4, 3, 3000000, '2022-12-04 15:20:18', '2022-12-20 11:36:38'),
(33, 4, 1, 3000000, '2022-12-04 15:20:51', '2022-12-04 15:20:51'),
(34, 4, 1, 3000000, '2022-12-04 15:21:12', '2022-12-04 15:21:12'),
(35, 4, 1, 3000000, '2022-12-04 15:21:24', '2022-12-04 15:21:24'),
(36, 4, 1, 3000000, '2022-12-04 15:22:16', '2022-12-04 15:22:16'),
(37, 4, 1, 3000000, '2022-12-04 15:22:42', '2022-12-04 15:22:42'),
(38, 4, 1, 1000000, '2022-12-04 15:26:42', '2022-12-04 15:26:42'),
(39, 4, 3, 4000000, '2022-12-04 15:27:36', '2022-12-20 08:09:01'),
(40, 4, 1, 1000000, '2022-12-04 15:29:32', '2022-12-04 15:29:32'),
(41, 4, 1, 5000000, '2022-12-19 15:22:56', '2022-12-19 15:22:56'),
(42, 8, 3, 0, NULL, NULL),
(44, 4, 1, 3000000, '2022-12-20 08:10:40', '2022-12-20 08:10:40'),
(45, 4, 1, 3000000, '2022-12-20 08:12:54', '2022-12-20 08:12:54'),
(46, 4, 1, 3000000, '2022-12-20 08:14:55', '2022-12-20 08:14:55'),
(47, 4, 1, 7000000, '2022-12-20 08:19:36', '2022-12-20 08:19:36'),
(48, 4, 1, 3000000, '2022-12-21 06:13:27', '2022-12-21 06:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `URL` varchar(255) NOT NULL,
  `material` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type_id`, `name`, `description`, `URL`, `material`, `origin`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nhẫn vàng', 'Nhẫn trơn', 'images/8zKCFW3MThRYGOli7M2ZnSIgrrcpghiSUzb16MaL.jpg', 'vàng', 'Việt Nam', 3000000, NULL, '2022-12-04 16:44:08'),
(3, 2, 'Nhan kim cương', 'Hạt kim cương đính lên các mắt của dây chuyền', 'images/07Zr0KWZUCaxGq7lazD2b1qjQ5lBWbACuaeJt77N.jpg', 'Bạc và kim cương', 'Mỹ', 30000000, '2022-09-26 23:08:22', '2022-12-04 16:44:35'),
(4, 3, 'Dây chuyền vàng', 'bằng vàng 18k', 'images/LO9qGr97cM935AhxAiaMVhh1G7ItsbT1k3HmS3y3.jpg', 'vàng 18k', 'Việt Nam', 27000000, '2022-10-18 09:24:02', '2022-12-04 16:44:46'),
(5, 4, 'Vòng cỏ 4 lá', 'Bạc', 'images/XZbXf2g0zZL6iENLhDaJ6o49IB4AWseHQBdjHerk.jpg', 'Bạc', 'Mỹ', 1000000, '2022-10-18 09:25:10', '2022-12-04 16:45:09'),
(6, 4, 'Vòng tay', 'Hạt kim cương đính lên các mắt của dây', 'images/gzubHo6pLa1qzfC4N5gk9hOuzxUgo76E02RK8ml2.jpg', 'Bạc', 'Việt Nam', 30000000, '2022-10-22 15:28:23', '2022-12-04 16:45:52'),
(7, 2, 'Nhẫn bạc', 'Với sự phát triển của ngành kim hoàn, giới trẻ có rất nhiều cơ hội sở hữu các mẫu nhẫn cặp vô cùng ưng ý', 'images/QcML1NM3oZ43VyXqxAv3CCh4ClIWXKpb2HThplBZ.jpg', 'Bạc trắng', 'Việt Nam', 1000000, '2022-12-04 16:34:54', '2022-12-04 16:34:54'),
(8, 2, 'Nhẫn hoa', 'Với sự phát triển của ngành kim hoàn, giới trẻ có rất nhiều cơ hội sở hữu các mẫu nhẫn cặp vô cùng ưng ý.', 'images/Z8WfDqIc0a1juTJKd3CXs4MkltJVPuTX5h51LRa8.jpg', 'vàng 18k', 'Việt Nam', 1200000, '2022-12-04 16:36:49', '2022-12-04 16:36:49'),
(9, 4, 'Vòng cổ có 4 lá', 'Với sự phát triển của ngành kim hoàn, giới trẻ có rất nhiều cơ hội sở hữu các mẫu nhẫn cặp vô cùng ưng ý.', 'images/tMWM7VRwvUvhWgGeuJ5hcEAwWtIvvIvwNaTjrfAf.jpg', 'Bạc trắng', 'Việt Nam', 2000000, '2022-12-04 16:37:59', '2022-12-04 16:37:59'),
(10, 3, 'Dây chuyền mắt đại dương', 'Với sự phát triển của ngành kim hoàn, giới trẻ có rất nhiều cơ hội sở hữu các mẫu day chuyền vô cùng ưng ý.', 'images/KRUneP6Jhf4qG82rOQ9KcckDzEtuAkg6U0PYnPTm.jpg', 'Bạc trắng', 'Việt Nam', 30000000, '2022-12-04 16:40:17', '2022-12-04 16:40:17'),
(11, 2, 'Nhẫn Vàng', 'Mạ vàng', 'images/yCACjof9tR9rHItRLd2fBAxRq1ljl2VVAlsFtKCG.jpg', 'Đồng', 'Trung Quốc', 100000, '2022-12-19 15:52:48', '2022-12-19 15:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 4, 2, NULL, NULL),
(3, 5, 3, '2022-11-12 15:41:27', '2022-11-12 15:41:27'),
(6, 1, 2, '2022-11-19 03:26:29', '2022-11-19 03:26:29'),
(8, 7, 2, '2022-12-04 16:42:06', '2022-12-04 16:42:06'),
(9, 8, 2, '2022-12-04 16:42:16', '2022-12-04 16:42:16'),
(10, 9, 2, '2022-12-04 16:42:24', '2022-12-04 16:42:24'),
(11, 10, 2, '2022-12-04 16:42:35', '2022-12-04 16:42:35'),
(12, 11, 2, '2022-12-19 15:53:35', '2022-12-19 15:53:35'),
(13, 1, 3, '2022-12-19 15:54:06', '2022-12-19 15:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `description`, `color`, `created_at`, `updated_at`) VALUES
(4, 'user', 'Người dùng', 'success', '2022-09-14 15:20:54', '2022-09-14 15:20:54'),
(8, 'admin', 'Đây là mô tả', 'danger', '2022-09-18 14:21:42', '2022-09-24 09:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'M(20-25cm)', NULL, '2022-12-21 02:17:10'),
(2, 'L(20-30cm)', NULL, NULL),
(3, 'S(15-20cm)', '2022-11-12 13:53:53', '2022-11-12 14:14:11');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Đã đặt hàng', 'warning', NULL, NULL),
(2, 'Đang chuẩn bị hàng', 'primary', NULL, NULL),
(3, 'Đã hủy hàng', 'danger', NULL, NULL),
(4, 'Giao hàng thành công', 'success', NULL, NULL),
(5, 'Đang giao hàng', 'info', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Nhẫn', 'Để đeo vào tay', NULL, NULL),
(3, 'dây chuyền', 'abc', '2022-09-25 10:19:22', '2022-09-25 10:48:04'),
(4, 'Vòng tay', 'đeo tay', '2022-10-22 15:27:11', '2022-10-22 15:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL DEFAULT 'FullName',
  `birthday` datetime NOT NULL DEFAULT '2000-01-01 00:00:00',
  `gender` varchar(255) NOT NULL DEFAULT 'nam',
  `email` varchar(255) NOT NULL DEFAULT 'email@gmail.com',
  `phone` varchar(255) NOT NULL DEFAULT '0123456789',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `URL` varchar(255) NOT NULL DEFAULT 'images/avata.png',
  `address` varchar(255) NOT NULL DEFAULT 'Việt Nam',
  `money` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `account_id`, `fullname`, `birthday`, `gender`, `email`, `phone`, `created_at`, `updated_at`, `URL`, `address`, `money`) VALUES
(1, 4, 'Mỹ Linh', '2000-01-01 00:00:00', 'nam', 'email@gmail.com', '0123456789', NULL, NULL, 'images/avata.png', 'Việt Nam', 0),
(2, 10, 'FullName', '2000-01-01 00:00:00', 'nam', 'email@gmail.com', '0123456789', '2022-09-22 16:13:48', '2022-09-22 16:13:48', 'images/avata.png', 'Việt Nam', 0),
(4, 12, 'Phan Mỹ Linh', '2003-03-02 00:00:00', 'nu', 'linhptm.21it@vku.udn.vn', '0123456789', '2022-09-24 09:34:44', '2022-12-23 00:26:50', 'images/HDxxpUVTndxYuZgRDL2wXTrj6iZ4DN2rsjjik07d.jpg', 'Việt Nam', 49087345),
(5, 17, 'FullName', '2000-01-01 00:00:00', 'nam', 'email@gmail.com', '0123456789', '2022-10-31 06:16:35', '2022-10-31 06:16:35', 'images/avata.png', 'Việt Nam', 0),
(6, 18, 'Phan Đức Hải', '2000-01-01 00:00:00', 'nam', 'email@gmail.com', '0123456789', '2022-11-01 14:58:36', '2022-11-01 15:03:19', 'images/avata.png', 'Việt Nam', 0),
(7, 20, 'Phan Thị Mỹ Linh', '2000-01-01 00:00:00', 'nam', 'email@gmail.com', '0123456789', '2022-11-21 09:28:52', '2022-11-21 09:46:34', 'images/KBMKtC7HShPidybKh7w4U0fNA8FqtymbY1DPDCcg.jpg', 'Việt Nam', 0),
(8, 21, 'FullName', '2000-01-01 00:00:00', 'nam', 'havana12342@gmail.com', '0123456789', '2022-12-04 10:54:01', '2022-12-04 10:54:01', 'images/avata.png', 'Việt Nam', 0),
(9, 22, 'FullName', '2000-01-01 00:00:00', 'nam', 'linhptm.21it@vku.udn.vn', '0123456789', '2022-12-04 11:02:09', '2022-12-04 11:02:09', 'images/avata.png', 'Việt Nam', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accounts_role_id_foreign` (`role_id`);

--
-- Indexes for table `auto_banks`
--
ALTER TABLE `auto_banks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auto_banks_user_id_foreign` (`user_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_size_id_foreign` (`size_id`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_orders_product_id_foreign` (`product_id`),
  ADD KEY `detail_orders_order_id_foreign` (`order_id`),
  ADD KEY `detail_orders_size_id_foreign` (`size_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_stt_id_foreign` (`stt_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_type_id_foreign` (`type_id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sizes_product_id_foreign` (`product_id`),
  ADD KEY `product_sizes_size_id_foreign` (`size_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_account_id_foreign` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `auto_banks`
--
ALTER TABLE `auto_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `auto_banks`
--
ALTER TABLE `auto_banks`
  ADD CONSTRAINT `auto_banks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `carts_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD CONSTRAINT `detail_orders_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `detail_orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `detail_orders_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_stt_id_foreign` FOREIGN KEY (`stt_id`) REFERENCES `statuses` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `type_products` (`id`);

--
-- Constraints for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD CONSTRAINT `product_sizes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_sizes_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
