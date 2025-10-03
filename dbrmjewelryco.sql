-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2025 at 11:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbrmjewelryco`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `user_name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', 'admin@gmail.com', '$2y$12$WRJSh8wKnZcQpUWMCaDSDuUmZql5vTzbzEvE69kMpZBZcY7O4vJs6', NULL, '2025-09-29 12:32:43', '2025-09-29 12:32:43');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Rings', '2025-09-29 16:32:57', '2025-09-29 16:32:57'),
(2, 'Pendants', '2025-09-29 16:32:57', '2025-09-29 16:32:57'),
(3, 'Earrings', '2025-09-29 16:32:57', '2025-09-29 16:32:57'),
(4, 'Bracelets', '2025-09-29 16:32:57', '2025-09-29 16:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(29, '0001_01_01_000000_create_users_table', 1),
(30, '0001_01_01_000001_create_cache_table', 1),
(31, '0001_01_01_000002_create_jobs_table', 1),
(32, '2025_09_23_134028_create_admins_table', 1),
(33, '2025_09_23_134028_create_categories_table', 1),
(34, '2025_09_23_134028_create_orders_table', 1),
(35, '2025_09_23_134028_create_products_table', 1),
(36, '2025_09_23_134029_create_order_product_table', 1),
(37, '2025_09_23_134029_create_payments_table', 1),
(38, '2025_09_23_134029_create_shipments_table', 1),
(39, '2025_09_23_144329_create_personal_access_tokens_table', 1),
(40, '2025_09_23_183256_add_two_factor_columns_to_users_table', 1),
(41, '2025_09_23_184106_add_user_type_to_users_table', 1),
(42, '2025_09_30_190700_add_total_price_to_orders_table', 2),
(43, '2025_10_01_183357_create_activities_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `total_price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `status`, `total_price`, `created_at`, `updated_at`) VALUES
(10, 3, '2025-10-01', 'completed', 10000.00, '2025-10-01 23:26:03', '2025-10-01 23:29:12'),
(11, 3, '2025-10-01', 'pending', 14500.00, '2025-10-01 23:30:59', '2025-10-01 23:30:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `custom_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `custom_name`, `quantity`) VALUES
(24, 10, 18, 'Cushion Citrine Ring', 1),
(25, 11, 19, 'Pear Sea Blue Topaz Ring', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin', 3, 'admin-api-token', '598caa4ab302ccdeeed807e967465c0de9aadcbed2a553f99b549b45b433199f', '[\"*\"]', NULL, NULL, '2025-09-29 12:40:36', '2025-09-29 12:40:36'),
(2, 'App\\Models\\Admin', 3, 'admin-api-token', '898dfe42d45c15c021a755d5e1af46ca4ea203978b48697507a22de21c3be49c', '[\"*\"]', NULL, NULL, '2025-09-29 12:45:17', '2025-09-29 12:45:17'),
(3, 'App\\Models\\Admin', 3, 'admin-api-token', '9d27365eb5274b25baa3cc42c375c144cdbf050fa331be5fad25340e5e62dd9a', '[\"*\"]', NULL, NULL, '2025-09-29 12:51:21', '2025-09-29 12:51:21'),
(4, 'App\\Models\\Admin', 3, 'admin-api-token', 'ed34e79a958dbc1d3a33750ecb8effe7f3472d0a47b66c977aeca07103fa5a17', '[\"*\"]', NULL, NULL, '2025-09-29 13:00:14', '2025-09-29 13:00:14'),
(5, 'App\\Models\\Admin', 3, 'admin-api-token', '72507b2bfdf8242e54ed7789bab24c5aad5d07877d8c6468f079cdc1f9d874c6', '[\"*\"]', NULL, NULL, '2025-09-29 13:01:31', '2025-09-29 13:01:31'),
(6, 'App\\Models\\Admin', 3, 'admin-api-token', '8ebe3f431b1cdfd8cfab39e7ea7e10032d29e2a80d8e0d0e1629f80716f5ea54', '[\"*\"]', NULL, NULL, '2025-09-29 13:10:55', '2025-09-29 13:10:55'),
(7, 'App\\Models\\Admin', 3, 'admin-api-token', '1dc49d3119a75b8c3a30286e0d152f8b3a825651eb50f69013678775170ddf2e', '[\"*\"]', NULL, NULL, '2025-09-29 13:12:17', '2025-09-29 13:12:17'),
(8, 'App\\Models\\Admin', 3, 'admin-api-token', '150e3f5f65edca95add956419798c4adb21426a8cf67b87938f638a6285f2eff', '[\"*\"]', NULL, NULL, '2025-09-29 13:12:55', '2025-09-29 13:12:55'),
(9, 'App\\Models\\Admin', 3, 'admin-api-token', 'a21807e349c94cfb3c707617edd9179b3604954a3189254d0f900587b808e9c7', '[\"*\"]', NULL, NULL, '2025-09-29 13:13:52', '2025-09-29 13:13:52'),
(10, 'App\\Models\\Admin', 3, 'admin-api-token', 'a6ff9c156887569de7f7538ba085972f56586329a4574d46f2bf9594f773a618', '[\"*\"]', NULL, NULL, '2025-09-29 13:16:40', '2025-09-29 13:16:40'),
(11, 'App\\Models\\Admin', 3, 'admin-api-token', '77cfeac92db61c09985ed8b00cc5663732f02a17267769b86e0b7376a73fe5c7', '[\"*\"]', NULL, NULL, '2025-09-29 13:22:58', '2025-09-29 13:22:58'),
(12, 'App\\Models\\Admin', 3, 'admin-api-token', '5a56b31f85507c00551444a0da5f3114f3f499ff3a300e056e99a127cd754545', '[\"*\"]', NULL, NULL, '2025-09-29 13:48:19', '2025-09-29 13:48:19'),
(13, 'App\\Models\\Admin', 3, 'admin-api-token', '4296619bebc9ba79f557e18cf0b8d315f9ba117ac4db585e0e4126b569b3764e', '[\"*\"]', NULL, NULL, '2025-09-29 13:55:12', '2025-09-29 13:55:12'),
(14, 'App\\Models\\Admin', 3, 'admin-api-token', 'd71f342438d32e832c95d40604e7310c54a5bc252edd9a52ca180e40be76e938', '[\"*\"]', NULL, NULL, '2025-09-29 14:07:54', '2025-09-29 14:07:54'),
(15, 'App\\Models\\Admin', 3, 'admin-api-token', '4a8ffbff594dcc364306176e9ac7847cd0ba754ed91a7f01157afaa30229d8b4', '[\"*\"]', NULL, NULL, '2025-09-29 14:14:55', '2025-09-29 14:14:55'),
(16, 'App\\Models\\Admin', 3, 'admin-api-token', '34397bcde7c43a19c14f8bbf02945873cc9b26e020fd6b9579fd882f14362892', '[\"*\"]', NULL, NULL, '2025-09-29 14:19:09', '2025-09-29 14:19:09'),
(17, 'App\\Models\\Admin', 3, 'admin-api-token', '174be5b133426debe22d0bd8a759d0654535aec414c94e6b7cf8b57473879f0c', '[\"*\"]', NULL, NULL, '2025-09-29 14:19:27', '2025-09-29 14:19:27'),
(18, 'App\\Models\\Admin', 3, 'admin-api-token', 'cb5c0aded837e97e3ec2ad68ddb426fa0ac3c2e6579f8959aed072efee559a0d', '[\"*\"]', NULL, NULL, '2025-09-29 14:34:07', '2025-09-29 14:34:07'),
(19, 'App\\Models\\Admin', 3, 'admin-api-token', 'e22c71acd8739ac6d348c8294c45893f557fb5523200389cef3f4317d420a37b', '[\"*\"]', NULL, NULL, '2025-09-29 14:34:21', '2025-09-29 14:34:21'),
(20, 'App\\Models\\Admin', 3, 'admin-api-token', '45cb92915764d4f236067e98de5e47a881eb34409e49a928819f3fc04a6a56fe', '[\"*\"]', NULL, NULL, '2025-09-29 14:35:22', '2025-09-29 14:35:22'),
(21, 'App\\Models\\Admin', 3, 'admin-api-token', '23db42fe8ba58562d297c20e0ef87a9a83fe2351f2a2decd75b92b640f5cc43d', '[\"*\"]', NULL, NULL, '2025-09-29 14:39:17', '2025-09-29 14:39:17'),
(22, 'App\\Models\\Admin', 3, 'admin-api-token', '8f3502f111a41a997a2161bd6853c8f338130ada041fe46d6632b837c5437679', '[\"*\"]', NULL, NULL, '2025-09-29 14:45:10', '2025-09-29 14:45:10'),
(23, 'App\\Models\\Admin', 3, 'admin-api-token', 'ed857ff865235927927316f306ca8d7f9c3337c25547c3ea9f13f62a861d516d', '[\"*\"]', NULL, NULL, '2025-09-29 14:45:37', '2025-09-29 14:45:37'),
(24, 'App\\Models\\Admin', 3, 'admin-api-token', '2d6bfcf4fb8165e34c9daca63b7e8dfdcfc8fbc4f6c5f7a5e59d8343aeec4d79', '[\"*\"]', NULL, NULL, '2025-09-29 14:49:24', '2025-09-29 14:49:24'),
(25, 'App\\Models\\Admin', 3, 'admin-api-token', '25bb100c6d171537b7398efd6e82d8462fddba6fb3ed573cc87b560be05d7771', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:25', '2025-09-29 15:11:25'),
(26, 'App\\Models\\Admin', 3, 'admin-api-token', '489d28d2606f67595f4383d3105141b526f05c0132d981efa553748bd083ed61', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:27', '2025-09-29 15:11:27'),
(27, 'App\\Models\\Admin', 3, 'admin-api-token', 'f4202950cdf381d4e8670c5eaf79721f1ebea977ac5c2579dbd75cb05babdec3', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:28', '2025-09-29 15:11:28'),
(28, 'App\\Models\\Admin', 3, 'admin-api-token', '42f7c91f0aaa710200e6678a9c1c9c3bce8dddb19c26989f10b57485d8b56e7b', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:28', '2025-09-29 15:11:28'),
(29, 'App\\Models\\Admin', 3, 'admin-api-token', 'f043b4bd87926eefbd996aed12b2bcb2e0fa085d2072fc5c02657d2c57e3aa36', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:29', '2025-09-29 15:11:29'),
(30, 'App\\Models\\Admin', 3, 'admin-api-token', 'be40e80c6a4d2349582498e5f8fe6054a06ee55d48dc8f403c0ba03e70dd5f21', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:29', '2025-09-29 15:11:29'),
(31, 'App\\Models\\Admin', 3, 'admin-api-token', '5886f701975b861e2a370111c0e5fd1140f49f8c3237759b8bf196a8cb460285', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:30', '2025-09-29 15:11:30'),
(32, 'App\\Models\\Admin', 3, 'admin-api-token', '1904cc7d1841bbd7388f19720f8c7850655b33d0615a0e111ae0df7a603a82ee', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:31', '2025-09-29 15:11:31'),
(33, 'App\\Models\\Admin', 3, 'admin-api-token', '251c642c70c2b9dd76f53a1f5d6f550aed228b9976388f6380c06da74ff956d7', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:31', '2025-09-29 15:11:31'),
(34, 'App\\Models\\Admin', 3, 'admin-api-token', '31e2bf2afc70a79ffe0176b385e7b758a8cbc843f92fce1eb26ca5142d7d85b7', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:32', '2025-09-29 15:11:32'),
(35, 'App\\Models\\Admin', 3, 'admin-api-token', 'c6850016070a86004a55e2c46bda2b27b10f350b84770665d5e4d5727e2f02ea', '[\"*\"]', NULL, NULL, '2025-09-29 15:11:54', '2025-09-29 15:11:54'),
(36, 'App\\Models\\Admin', 3, 'admin-api-token', '95299d6468eee1bb643b4a71ad90f099bad0c5bfae2b2c8990afddad007a4d47', '[\"*\"]', NULL, NULL, '2025-09-29 15:12:02', '2025-09-29 15:12:02'),
(37, 'App\\Models\\Admin', 3, 'admin-api-token', '65723701f3170af84afc596c67ed28dba0ddc9cdbfda440e18f4887876e32b40', '[\"*\"]', NULL, NULL, '2025-09-29 15:16:26', '2025-09-29 15:16:26'),
(38, 'App\\Models\\Admin', 3, 'admin-api-token', 'ad27b5dad78cd74c100a47db31b57b8947be9783c056996867659ba6cec4eedc', '[\"*\"]', NULL, NULL, '2025-09-29 15:16:36', '2025-09-29 15:16:36'),
(39, 'App\\Models\\Admin', 3, 'admin-api-token', '1a94d9bb32eacf55588793de151c028f7e5e529f9e8e6adf1ea30fea74caa034', '[\"*\"]', NULL, NULL, '2025-09-29 15:16:45', '2025-09-29 15:16:45'),
(40, 'App\\Models\\Admin', 3, 'admin-api-token', '4627891dbc0cdb3b2039d388be94af4e5a20d7133afe16fd5c4dcac6fd66f1a0', '[\"*\"]', NULL, NULL, '2025-09-29 15:17:00', '2025-09-29 15:17:00'),
(41, 'App\\Models\\User', 3, 'user-api-token', '769f5ac9e4d611a53774f41883da20d4e7f30f9acdcff02b8da1fb7a919e7108', '[\"*\"]', NULL, NULL, '2025-09-30 15:15:17', '2025-09-30 15:15:17'),
(42, 'App\\Models\\User', 3, 'user-api-token', 'e460927bb3076d938ac8b4ebbd540b01d6ef28c3117dd376ff625578b245a190', '[\"*\"]', '2025-09-30 15:20:13', NULL, '2025-09-30 15:19:08', '2025-09-30 15:20:13'),
(44, 'App\\Models\\Admin', 1, 'admin-api-token', '96090bdde3b7f8d7d6c7103cfed404c8ee63e4c443c4be8bec199ff8952da9f9', '[\"*\"]', '2025-09-30 16:29:11', NULL, '2025-09-30 16:25:14', '2025-09-30 16:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `quantity`, `image`, `category_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(17, 'Red Garnet Ring', NULL, 12500.00, 10, 'images/products/1759266247_hring.jpg', 1, 1, '2025-10-01 04:04:07', '2025-10-02 05:06:21'),
(18, 'Cushion Citrine Ring', NULL, 10000.00, 15, 'images/products/1759303139_ring2.jpg', 1, 1, '2025-10-01 14:18:59', '2025-10-01 14:18:59'),
(19, 'Pear Sea Blue Topaz Ring', NULL, 14500.00, 4, 'images/products/1759303294_ring3.jpg', 1, 1, '2025-10-01 14:20:16', '2025-10-01 14:21:34'),
(20, 'Peridot Crown Ring', NULL, 9000.00, 2, 'images/products/1759303264_ring6.jpg', 1, 1, '2025-10-01 14:21:04', '2025-10-01 14:21:04'),
(21, 'Multi-Color Gemstone Ring', NULL, 20000.00, 1, 'images/products/1759303381_ring7.jpg', 1, 1, '2025-10-01 14:23:01', '2025-10-01 14:23:01'),
(22, 'Amethyst Ring', NULL, 12500.00, 10, 'images/products/1759303417_ring5.jpg', 1, 1, '2025-10-01 14:23:37', '2025-10-01 14:23:37'),
(23, 'Blue Sapphire Ring', NULL, 15000.00, 7, 'images/products/1759303535_ring4.jpg', 1, 1, '2025-10-01 14:25:35', '2025-10-01 14:25:35'),
(24, 'Small Citrine Round Ring', NULL, 17000.00, 12, 'images/products/1759303584_ring9.jpg', 1, 1, '2025-10-01 14:26:24', '2025-10-01 14:26:24'),
(25, 'Cushion Cut Garnet Ring', NULL, 12500.00, 4, 'images/products/1759303615_ring8.jpg', 1, 1, '2025-10-01 14:26:55', '2025-10-01 17:18:03'),
(26, 'Blue Topaz Drop Pendant', NULL, 13000.00, 4, 'images/products/1759303718_pendant3.jpg', 2, 1, '2025-10-01 14:28:38', '2025-10-01 14:29:54'),
(27, 'Garnet Deer Antler Pendant', NULL, 15000.00, 1, 'images/products/1759303813_pendant1.jpg', 2, 1, '2025-10-01 14:29:37', '2025-10-01 14:30:13'),
(28, 'Amethyst Silver Pendant', NULL, 8000.00, 1, 'images/products/1759303865_pendant2.jpg', 2, 1, '2025-10-01 14:31:05', '2025-10-01 14:31:05'),
(29, 'Peridot Heart Pendant', NULL, 12500.00, 1, 'images/products/1759303900_pendant5.jpg', 2, 1, '2025-10-01 14:31:40', '2025-10-01 14:31:40'),
(30, 'White Topaz Pendant', NULL, 7000.00, 2, 'images/products/1759303942_pendant4.jpg', 2, 1, '2025-10-01 14:32:22', '2025-10-01 14:32:22'),
(31, 'Multi Color Gemstone Pendant', NULL, 22000.00, 1, 'images/products/1759304009_hpendant.jpg', 2, 1, '2025-10-01 14:33:29', '2025-10-02 05:06:51'),
(32, 'Small Garnet Pendant', NULL, 8200.00, 20, 'images/products/1759304193_pendant6.jpg', 2, 1, '2025-10-01 14:36:33', '2025-10-01 14:36:33'),
(33, 'Blue Topaz Eye Pendant', NULL, 20000.00, 2, 'images/products/1759304247_pendant7.jpg', 2, 1, '2025-10-01 14:37:27', '2025-10-01 14:37:27'),
(34, 'OvalAmethyst Pendant', NULL, 12500.00, 5, 'images/products/1759304331_pendant8.jpg', 2, 1, '2025-10-01 14:38:51', '2025-10-01 14:39:17'),
(35, 'Amethyst Silver Earrings', NULL, 18000.00, 3, 'images/products/1759304563_ear5.jpg', 3, 1, '2025-10-01 14:42:43', '2025-10-01 14:42:43'),
(36, 'Garnet Cushion Earrings', NULL, 13000.00, 3, 'images/products/1759304645_ear2.jpg', 3, 1, '2025-10-01 14:44:05', '2025-10-01 14:44:05'),
(37, 'Peridot Pair Earrings', NULL, 12500.00, 10, 'images/products/1759304691_ear4.jpg', 3, 1, '2025-10-01 14:44:51', '2025-10-01 14:44:51'),
(38, 'Blue Sapphire Earrings', NULL, 23000.00, 2, 'images/products/1759304766_ear3.jpg', 3, 1, '2025-10-01 14:46:06', '2025-10-01 14:46:29'),
(39, 'Blue Topaz Cocktail Drop Earrings', NULL, 17200.00, 1, 'images/products/1759304841_hear.jpg', 3, 1, '2025-10-01 14:47:21', '2025-10-02 05:07:19'),
(40, 'Amethyst Earings', NULL, 100000.00, 10, 'images/products/1759304947_ear9.jpg', 3, 1, '2025-10-01 14:49:07', '2025-10-01 14:49:07'),
(41, 'Small Blue Topaz Earrings', NULL, 10000.00, 5, 'images/products/1759305025_ear6.jpg', 3, 1, '2025-10-01 14:50:25', '2025-10-01 14:50:25'),
(42, 'Oval Blue Sapphire Earrings', NULL, 25000.00, 10, 'images/products/1759305085_ear7.jpg', 3, 1, '2025-10-01 14:51:25', '2025-10-01 14:51:25'),
(43, 'Garnet Cocktail Drop Earrings', NULL, 18000.00, 10, 'images/products/1759305120_ear8.jpg', 3, 1, '2025-10-01 14:52:00', '2025-10-01 14:52:00'),
(44, 'Multi color Gem Bracelets', NULL, 20000.00, 5, 'images/products/1759305222_bracelet1.jpg', 4, 1, '2025-10-01 14:53:42', '2025-10-01 14:53:42'),
(45, 'Garnet Bracelets', NULL, 30000.00, 10, 'images/products/1759305249_bracelet4.jpg', 4, 1, '2025-10-01 14:54:09', '2025-10-01 14:54:09'),
(46, 'Moonstone Bracelets', NULL, 15000.00, 15, 'images/products/1759305286_bracelet6.jpg', 4, 1, '2025-10-01 14:54:46', '2025-10-01 14:54:46'),
(47, 'Topaz Bracelets', NULL, 28000.00, 15, 'images/products/1759305324_bracelet5.jpg', 4, 1, '2025-10-01 14:55:24', '2025-10-01 14:55:24'),
(49, 'Aquamarine Dot Bracelets', NULL, 30000.00, 1, 'images/products/1759305380_bracelet3.jpg', 4, 1, '2025-10-01 14:56:20', '2025-10-01 14:56:20'),
(50, 'Peridot Bracelets', NULL, 19000.00, 8, 'images/products/1759305500_bracelet2.jpg', 4, 1, '2025-10-01 14:58:20', '2025-10-01 17:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `shipment_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'user', 'user@gmail.com', 'user', NULL, '$2y$12$Vyn8JQ94hEk.QGH06zY/8uK5gOmjwq1VAC6rwU5c28d63WiPDLhnK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-09-29 22:55:25', '2025-09-29 22:55:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_user_name_unique` (`user_name`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipments_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipments`
--
ALTER TABLE `shipments`
  ADD CONSTRAINT `shipments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
