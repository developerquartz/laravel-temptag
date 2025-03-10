-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 12:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jason_levey`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_id` bigint(20) NOT NULL,
  `blog_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_title_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `blog_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blog_meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `blog_category_id`, `blog_name`, `blog_slug`, `blog_title`, `blog_title_background_image`, `blog_feature_image`, `blog_content`, `is_active`, `blog_meta_keywords`, `blog_meta_desc`, `additional_images`, `created_at`, `updated_at`) VALUES
(1, 1, 'Blog 1', 'blog-1', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula', '1639378026_inner-banner.png', '1639385632_contact.png', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>\n<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\n<p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>\n<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>\n<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>\n<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>', 'Y', 'Blog 1 Keywords', 'Blog 1 Description', NULL, '2021-11-29 23:35:51', '2021-12-13 03:27:29'),
(6, 1, 'Blog 2', 'blog-2', 'Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu.', '1638254859_Koala.jpg', '1639385525_feature.jpg', '<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>\n<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>\n<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>\n<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\n<p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>', 'Y', 'Blog 3 Keywords', 'Blog 3 Description', NULL, '2021-11-30 01:16:38', '2021-12-13 03:28:08'),
(7, 1, 'Blog 3', 'blog-3', 'Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum', NULL, '1639391687_new-sec.png', '<p>Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>\n<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>\n<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>\n<p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>\n<p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi.</p>\n<p>Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.</p>', 'Y', 'Blog 3', 'Blog 3', NULL, '2021-12-13 03:29:33', '2021-12-13 05:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category_name`, `blog_category_slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Blog Category 1', 'blog-category-1', 'Y', '2021-12-13 00:52:42', '2021-12-13 00:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `cart_storage`
--

CREATE TABLE `cart_storage` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_storage`
--

INSERT INTO `cart_storage` (`id`, `cart_data`, `created_at`, `updated_at`) VALUES
('1_cart_conditions', 'a:0:{}', '2022-01-31 00:39:34', '2022-01-31 00:39:34'),
('1_cart_items', 'a:0:{}', '2022-01-31 00:39:26', '2022-01-31 00:39:34'),
('10_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:1;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:13:\"App\\DBStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:15:\"PM SKU: TEMPTAG\";s:5:\"price\";d:0.902;s:8:\"quantity\";i:100;s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2022-01-12 01:02:30', '2022-01-12 01:02:52'),
('2_cart_conditions', 'a:0:{}', '2021-12-21 04:19:26', '2022-02-01 01:49:56'),
('2_cart_items', 'O:32:\"Darryldecode\\Cart\\CartCollection\":2:{s:8:\"\0*\0items\";a:1:{i:1;O:32:\"Darryldecode\\Cart\\ItemCollection\":3:{s:9:\"\0*\0config\";a:6:{s:14:\"format_numbers\";b:0;s:8:\"decimals\";i:0;s:9:\"dec_point\";s:1:\".\";s:13:\"thousands_sep\";s:1:\",\";s:7:\"storage\";s:13:\"App\\DBStorage\";s:6:\"events\";N;}s:8:\"\0*\0items\";a:6:{s:2:\"id\";s:1:\"1\";s:4:\"name\";s:15:\"PM SKU: TEMPTAG\";s:5:\"price\";d:0.902;s:8:\"quantity\";s:2:\"50\";s:10:\"attributes\";O:41:\"Darryldecode\\Cart\\ItemAttributeCollection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}s:10:\"conditions\";a:0:{}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', '2021-12-21 04:19:09', '2022-02-01 01:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Temp Tag Category', 'temp-tag-category', 'Y', '2021-11-24 05:07:26', '2022-01-12 01:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `contact_forms`
--

CREATE TABLE `contact_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_id` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_forms`
--

INSERT INTO `contact_forms` (`id`, `first_name`, `last_name`, `email`, `phone`, `message`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sham', 'Sunder', 'Sham.sunder.ph@suffescom.com', '9781034135', 'Test Contact Message', 0, '2021-11-29 02:03:48', '2021-11-29 02:03:48');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_29_071835_create_roles_table', 1),
(8, '2021_11_11_094948_create_categories_table', 1),
(12, '2021_10_29_071846_create_role_user_table', 2),
(17, '2021_11_17_063742_create_pages_table', 3),
(23, '2021_11_25_094513_create_contact_forms_table', 5),
(24, '2021_11_26_044829_create_subscription_forms_table', 6),
(26, '2021_11_29_083454_create_blog_categories_table', 8),
(28, '2021_11_29_083519_create_blogs_table', 9),
(30, '2021_12_02_041658_create_cart_storage_table', 11),
(39, '2021_11_11_094854_create_products_table', 16),
(40, '2021_12_14_060603_create_quick_books_onlines_table', 16),
(41, '2021_12_08_104036_create_orders_table', 17),
(42, '2021_12_08_104140_create_order_items_table', 17),
(43, '2021_12_08_105936_create_transactions_table', 17),
(45, '2021_12_23_122912_create_ship_stations_table', 18),
(49, '2014_10_12_000000_create_users_table', 19),
(50, '2021_12_07_065420_create_user_addition_addresses_table', 19),
(51, '2021_12_10_052002_create_promocodes_table', 19),
(53, '2022_01_31_043401_create_social_media_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_total` double NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_total`, `transaction_id`, `transaction_status`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-19 00:13:58', '2022-01-19 00:13:58'),
(2, 2, 40.59, NULL, 'Complete', 'Processing', '2022-01-19 00:16:41', '2022-01-19 00:16:41'),
(14, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-21 06:17:44', '2022-01-21 06:17:44'),
(15, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-21 08:52:22', '2022-01-21 08:52:22'),
(16, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-23 23:10:11', '2022-01-23 23:10:11'),
(17, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-24 00:03:47', '2022-01-24 00:03:47'),
(18, 2, 45.1, NULL, 'Complete', 'Processing', '2022-01-24 01:06:04', '2022-01-24 01:06:04'),
(19, 2, 45.1, 'ch_3KLMHrDPEv8s3nVz1Du3GB8C', 'Complete', 'Processing', '2022-01-24 01:14:24', '2022-01-24 01:14:24'),
(20, 2, 90.2, 'ch_3KLNAvDPEv8s3nVz1O6Lvk6t', 'Complete', 'Processing', '2022-01-24 02:11:17', '2022-01-24 02:11:17'),
(21, 2, 45.1, 'ch_3KLRGcDPEv8s3nVz0yj0ervO', 'Complete', 'Processing', '2022-01-24 06:33:27', '2022-01-24 06:33:27'),
(22, 2, 45.1, 'ch_3KLRHhDPEv8s3nVz1djI0scB', 'Complete', 'Processing', '2022-01-24 06:34:34', '2022-01-24 06:34:34'),
(23, 2, 45.1, 'ch_3KLRKZDPEv8s3nVz2FN8e08y', 'Complete', 'Processing', '2022-01-24 06:37:32', '2022-01-24 06:37:32'),
(24, 2, 45.1, 'ch_3KLRMxDPEv8s3nVz1dff1eg7', 'Complete', 'Processing', '2022-01-24 06:40:00', '2022-01-24 06:40:00'),
(25, 2, 45.1, 'ch_3KLRQjDPEv8s3nVz175x5sPW', 'Complete', 'Processing', '2022-01-24 06:43:55', '2022-01-24 06:43:55'),
(26, 2, 45.1, 'ch_3KLRTSDPEv8s3nVz2VtMRxCS', 'Complete', 'Processing', '2022-01-24 06:46:43', '2022-01-24 06:46:43'),
(27, 2, 90.2, 'ch_3KLRWbDPEv8s3nVz1fvrBjmo', 'Complete', 'Processing', '2022-01-24 06:49:58', '2022-01-24 06:49:58'),
(28, 2, 45.1, 'ch_3KLRXsDPEv8s3nVz1N8GL8qn', 'Complete', 'Processing', '2022-01-24 06:51:16', '2022-01-24 06:51:16'),
(29, 2, 90.2, 'ch_3KLReVDPEv8s3nVz1uMI6vuQ', 'Complete', 'Processing', '2022-01-24 06:58:08', '2022-01-24 06:58:08'),
(30, 2, 45.1, 'ch_3KLRfZDPEv8s3nVz2d3x0rOJ', 'Complete', 'Processing', '2022-01-24 06:59:14', '2022-01-24 06:59:14'),
(31, 2, 45.1, 'ch_3KLRoqDPEv8s3nVz1iUughzM', 'Complete', 'Processing', '2022-01-24 07:08:49', '2022-01-24 07:08:49'),
(32, 2, 45.1, 'ch_3KLS8kDPEv8s3nVz2wgZvmwg', 'Complete', 'Processing', '2022-01-24 07:29:23', '2022-01-24 07:29:23'),
(33, 2, 90.2, 'ch_3KLSELDPEv8s3nVz2eg3Z160', 'Complete', 'Processing', '2022-01-24 07:35:10', '2022-01-24 07:35:10'),
(34, 2, 45.1, 'ch_3KLSLYDPEv8s3nVz0ljC47kz', 'Complete', 'Processing', '2022-01-24 07:42:37', '2022-01-24 07:42:37'),
(35, 2, 99.18, 'ch_3KLkZ6DPEv8s3nVz2FT9qF2Q', 'Complete', 'Processing', '2022-01-25 03:09:51', '2022-01-25 03:09:51'),
(36, 2, 40.59, 'ch_3KLlEsDPEv8s3nVz24P20y4p', 'Complete', 'Processing', '2022-01-25 03:53:01', '2022-01-25 03:53:01'),
(37, 2, 45.1, 'ch_3KLlJgDPEv8s3nVz1lYPTe8D', 'Complete', 'Processing', '2022-01-25 03:57:59', '2022-01-25 03:57:59'),
(38, 2, 40.59, 'ch_3KLlNuDPEv8s3nVz0hrMfxwn', 'Complete', 'Processing', '2022-01-25 04:02:21', '2022-01-25 04:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `product_price` double NOT NULL,
  `product_quantity` bigint(20) NOT NULL,
  `product_price_total` double NOT NULL,
  `coupon_applied` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `coupon_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `order_id`, `product_id`, `product_price`, `product_quantity`, `product_price_total`, `coupon_applied`, `coupon_amount`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-19 00:13:58', '2022-01-19 00:13:58'),
(2, 2, 2, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-19 00:16:41', '2022-01-19 00:16:41'),
(14, 2, 14, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-21 06:17:44', '2022-01-21 06:17:44'),
(15, 2, 15, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-21 08:52:22', '2022-01-21 08:52:22'),
(16, 2, 16, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-23 23:10:11', '2022-01-23 23:10:11'),
(17, 2, 17, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 00:03:47', '2022-01-24 00:03:47'),
(18, 2, 18, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 01:06:05', '2022-01-24 01:06:05'),
(19, 2, 19, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 01:14:24', '2022-01-24 01:14:24'),
(20, 2, 20, 1, 0.902, 100, 90.2, 'N', NULL, '2022-01-24 02:11:17', '2022-01-24 02:11:17'),
(21, 2, 21, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:33:27', '2022-01-24 06:33:27'),
(22, 2, 22, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:34:34', '2022-01-24 06:34:34'),
(23, 2, 23, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:37:32', '2022-01-24 06:37:32'),
(24, 2, 24, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:40:00', '2022-01-24 06:40:00'),
(25, 2, 25, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:43:55', '2022-01-24 06:43:55'),
(26, 2, 26, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:46:43', '2022-01-24 06:46:43'),
(27, 2, 27, 1, 0.902, 100, 90.2, 'N', NULL, '2022-01-24 06:49:58', '2022-01-24 06:49:58'),
(28, 2, 28, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:51:16', '2022-01-24 06:51:16'),
(29, 2, 29, 1, 0.902, 100, 90.2, 'N', NULL, '2022-01-24 06:58:08', '2022-01-24 06:58:08'),
(30, 2, 30, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 06:59:14', '2022-01-24 06:59:14'),
(31, 2, 31, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 07:08:49', '2022-01-24 07:08:49'),
(32, 2, 32, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 07:29:23', '2022-01-24 07:29:23'),
(33, 2, 33, 1, 0.902, 100, 90.2, 'N', NULL, '2022-01-24 07:35:10', '2022-01-24 07:35:10'),
(34, 2, 34, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-24 07:42:37', '2022-01-24 07:42:37'),
(35, 2, 35, 3, 0.1, 200, 20, 'N', NULL, '2022-01-25 03:09:51', '2022-01-25 03:09:51'),
(36, 2, 35, 1, 0.902, 100, 90.2, 'N', NULL, '2022-01-25 03:09:51', '2022-01-25 03:09:51'),
(37, 2, 36, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-25 03:53:01', '2022-01-25 03:53:01'),
(38, 2, 37, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-25 03:57:59', '2022-01-25 03:57:59'),
(39, 2, 38, 1, 0.902, 50, 45.1, 'N', NULL, '2022-01-25 04:02:21', '2022-01-25 04:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `page_meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_name`, `page_slug`, `page_title`, `page_title_background_image`, `page_feature_image`, `page_content`, `is_active`, `page_meta_keywords`, `page_meta_desc`, `additional_images`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'home', 'Home', '1639977266_banner-sec.jpg', '1637562348_car.png', '[{\"top_section\":[{\"title\":\"Temporary Vehicle Tags\",\"description\":\"<p>Temporary license plate paper used for the eTemp Registration Tag system in New Jersey</p>\"}],\"how_it_work_section_title\":[{\"title\":\"How it works\"}],\"how_it_work_section\":[{\"title\":\"Sign Up and register your account1\",\"description\":\"<p>Fill out the online application and account profile which includes the dealership 6-digit NJMVC ID# and Expiration Date.</p>\"},{\"title\":\"Get Approved\",\"description\":\"<p>A member of our team will review your credentials and approve your account to purchase Temp Tags.1</p>\"},{\"title\":\"Buy Now\",\"description\":\"<p>Once approved you will be able to make one time purchases or take advantage of our subscription service to automatic monthly shipments of temp tags to your dealership.</p>\"}],\"features_section\":[{\"title\":\"Features\",\"description\":\"<p>Temp Tags are New Jersey\'s Temporary Vehicle Tag service designed and built for dealerships to streamline the process of issuing and managing temporary vehicle tags.</p>\\n<ul>\\n<li>Weather resistant (cold, hot, wet, snow, wind, and humidity)</li>\\n<li>Tear proof</li>\\n<li>Chemical (oil) resistant</li>\\n<li>UV light/fade resistant</li>\\n<li>Matte finish (to eliminate glossy reflection at night)</li>\\n<li>Dry Toner/ Laser Printer Compatible</li>\\n</ul>\"}],\"buy_now_section_title\":[{\"title\":\"Buy Now\"}],\"product_ids\":[{\"product_id\":1}]}]', 'Y', 'keywords 2', 'desc meta', '{\"features_section_image\":\"1639977266_feature.jpg\",\"how_it_work_section_image1\":\"1639992581_mony.png\",\"how_it_work_section_image2\":\"1639977266_check2.png\",\"how_it_work_section_image3\":\"1639992581_check.png\"}', '2021-11-21 23:39:12', '2021-12-20 03:59:41'),
(2, 'About Us', 'about-us', 'Temp Tags New Jersey', '1637564660_inner-banner.png', '', '[{\"top_section\":[{\"title\":\"Temp Tags New Jersey\",\"description\":\"<p>After receiving approval from New Jersey Motor Vehicle Commission (NJMVC) and NIC, to supply Dealerships (Car, Motorcycle, Marinas) with the synthetic paper used to print New Jersey Temporary Vehicle Tags within the current New Jersey eTEMPTag Registration program, Finished Products, is proud to launch TemptagNJ.com</p>\"}],\"features_section\":[{\"title\":\"Finished Product LLC\",\"description\":\"<p>Finished Product was founded out of the need for Business Owners to connect with a partner that will not only provide creative solutions but also exemplary service.</p>\\n<ul>\\n<li>Custom Bags</li>\\n<li>Custom Printing</li>\\n<li>Auto Industry</li>\\n<li>Prescription Pads</li>\\n<li>Kitting and Packaging</li>\\n<li>Specialty Items (like Temptags)</li>\\n</ul>\\n<p>Call or email us today with any questions or quotations needed.</p>\",\"title_a_link\":\"https://www.finishedproductusa.com\"}]}]', 'Y', 'keywords 2', 'desc meta2', '{\"features_section_image\":\"1637571469_factory.jpg\",\"how_it_work_section_image1\":null,\"how_it_work_section_image2\":null,\"how_it_work_section_image3\":null}', '2021-11-22 01:34:20', '2021-12-20 01:23:36'),
(3, 'FAQ', 'faq', 'FAQ', '1637564768_inner-banner.png', '', '<div id=\"accordionFlushExample\" class=\"accordion accordion-flush\">\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingOne\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapseOne\" aria-expanded=\"false\" aria-controls=\"flush-collapseOne\"> How do I set up an account? </button></h2>\n<div id=\"flush-collapseOne\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingOne\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">TBD</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingTwo\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapseTwo\" aria-expanded=\"false\" aria-controls=\"flush-collapseTwo\"> I forgot my password, what can I do? </button></h2>\n<div id=\"flush-collapseTwo\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingTwo\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">TBD</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingThree\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapseThree\" aria-expanded=\"false\" aria-controls=\"flush-collapseThree\"> How can I edit my account information? </button></h2>\n<div id=\"flush-collapseThree\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingThree\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">TBD</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingfour\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapsefour\" aria-expanded=\"false\" aria-controls=\"flush-collapsefour\"> Why do I need to create an account to place an order? </button></h2>\n<div id=\"flush-collapsefour\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingfour\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">Only registered dealerships are able to purchase temptags. We must qualify that your company is a registered dealership before we can ship any orders.</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingfive\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapsefive\" aria-expanded=\"false\" aria-controls=\"flush-collapsefive\"> Who do I contact if I have a question about my recent order? </button></h2>\n<div id=\"flush-collapsefive\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingfive\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">Please send us an email at finishedproductllc@gmail.com or call us at (xxx) xxx-xxxx and one of our representatives will get back to you.</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingfive\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapsesix\" aria-expanded=\"false\" aria-controls=\"flush-collapsesix\"> How can I cancel my order? </button></h2>\n<div id=\"flush-collapsesix\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingfive\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">TBD</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingfive\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapseseven\" aria-expanded=\"false\" aria-controls=\"flush-collapseseven\"> What happens if my product is damaged or defective? </button></h2>\n<div id=\"flush-collapseseven\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingfive\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">Please send us an email at finishedproductllc@gmail.com or call us at (xxx) xxx-xxxx and one of our representatives will get back to you.</div>\n</div>\n</div>\n<div class=\"accordion-item\">\n<h2 id=\"flush-headingfive\" class=\"accordion-header\"><button class=\"accordion-button collapsed\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#flush-collapseeight\" aria-expanded=\"false\" aria-controls=\"flush-collapseeight\"> How can I learn more about the State of New Jersey Motor Vehicle Commission Temporary Vehicle Tags (Temp Tag) program? </button></h2>\n<div id=\"flush-collapseeight\" class=\"accordion-collapse collapse\" aria-labelledby=\"flush-headingfive\" data-bs-parent=\"#accordionFlushExample\">\n<div class=\"accordion-body\">Please visit https://www.njportal.com/MVC/TempTags/Default.aspx for more information on the State of New Jersey&rsquo;s program</div>\n</div>\n</div>\n</div>', 'Y', 'keywords3', 'desc meta3', '{\"features_section_image\":null,\"how_it_work_section_image1\":null,\"how_it_work_section_image2\":null,\"how_it_work_section_image3\":null}', '2021-11-22 01:36:08', '2021-11-24 04:10:18'),
(4, 'CONTACT US', 'contact-us', 'Get In Touch', '1637564816_inner-banner.png', '1637564924_contact-imh.png', '[{\"top_section\":[{\"title\":\"Get In Touch\",\"description\":\"<p><iframe style=\\\"border: 0;\\\" src=\\\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3018.2173479752205!2d-74.45429338466798!3d40.845151637395816!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3a79e06955555%3A0x9a362d42a1bd068b!2s8%20Campus%20Dr%20Suite%20105%2C%20Parsippany%2C%20NJ%2007054%2C%20USA!5e0!3m2!1sen!2sin!4v1639979031603!5m2!1sen!2sin\\\" width=\\\"600\\\" height=\\\"450\\\" allowfullscreen=\\\"allowfullscreen\\\"></iframe></p>\"}],\"how_it_work_section\":[{\"title\":\"4\",\"description\":\"<p>Parsippany, NJ</p>\"},{\"title\":\"Get Approved\",\"description\":\"<p>TempTagNJ@finishedproductusa.com</p>\"},{\"title\":\"Buy Now\",\"description\":\"<p>862-682-4765</p>\"}],\"features_section\":[{\"title\":\"Features\",\"description\":\"<p>Temp Tags are New Jersey\'s Temporary Vehicle Tag service designed and built for dealerships to streamline the process of issuing and managing temporary vehicle tags.</p>\\n<ul>\\n<li>Weather resistant (cold, hot, wet, snow, wind, and humidity)</li>\\n<li>Tear proof</li>\\n<li>Chemical (oil) resistant</li>\\n<li>UV light/fade resistant</li>\\n<li>Matte finish (to eliminate glossy reflection at night)</li>\\n<li>Dry Toner/ Laser Printer Compatible</li>\\n</ul>\"}]}]', 'Y', 'keywords 4', 'desc meta4', '{\"features_section_image\":\"1637563702_factory.jpg\",\"how_it_work_section_image1\":\"1637651056_pin.svg\",\"how_it_work_section_image2\":\"1637651056_email.svg\",\"how_it_work_section_image3\":\"1637650882_call.svg\"}', '2021-11-22 01:36:56', '2021-12-20 00:14:15'),
(5, 'Terms of Service', 'terms-of-service', 'Terms of Service', '1637658848_inner-banner.png', '', '<p>Samuel L. Jackson is arguably one of the most quotable Hollywood actors of all time. It&rsquo;s no surprise that a dummy text generator comprised of his quotes made our list. For those who don&rsquo;t appreciate the abundance of swear words, there is also a lite version with no profanity.</p>\n<p>Lorizzle is the most gangsta Lorem Ipsum there is. If you didn&rsquo;t know any better, you&rsquo;d think that Snoop Dogg actually created the dummy text for this site. While the site is extremely simple and offers limited functionality, the results are hilarious.</p>', 'Y', 'keywords Terms of Service', 'desc meta Terms of Service', NULL, '2021-11-23 03:44:08', '2021-11-23 03:44:08'),
(6, 'Privacy Policy', 'privacy-policy', 'Privacy Policy', '1637658906_inner-banner.png', '', '<h3>PRIVACY NOTICE</h3>\n<p><strong>Last updated December 15, 2021</strong></p>\n<p>Thank you for choosing to be part of our community at Finished Product LLC (\"Company,\" \"we,\" \"us,\" or \"our\"). We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about this privacy notice or our practices with regard to your personal information, please contact us at info@finishedproductusa.com.</p>\n<p>This privacy notice describes how we might use your information if you:</p>\n<ul>\n<li>Visit our website at <a href=\"#\"> http://www.temptagnj.com</a></li>\n<li>Engage with us in other related ways &acirc;&euro;&bull; including any sales, marketing, or events</li>\n</ul>\n<p>In this privacy notice, if we refer to:</p>\n<ul>\n<li>\"Website,\" we are referring to any website of ours that references or links to this policy</li>\n<li>\"Services,\" we are referring to our Website, and other related services, including any sales, marketing, or events</li>\n</ul>\n<p>The purpose of this privacy notice is to explain to you in the clearest way possible what information we collect, how we use it, and what rights you have in relation to it. If there are any terms in this privacy notice that you do not agree with, please discontinue use of our Services immediately.</p>\n<p><strong>Please read this privacy notice carefully, as it will help you understand what we do with the information that we collect.</strong></p>\n<h3>TABLE OF CONTENTS</h3>\n<ol>\n<li><a href=\"#q1\">WHAT INFORMATION DO WE COLLECT?</a></li>\n<li><a href=\"#q2\">HOW DO WE USE YOUR INFORMATION?</a></li>\n<li><a href=\"#q3\">WILL YOUR INFORMATION BE SHARED WITH ANYONE?</a></li>\n<li><a href=\"#q4\">DO WE USE COOKIES AND OTHER TRACKING TECHNOLOGIES?</a></li>\n<li><a href=\"#q5\">HOW LONG DO WE KEEP YOUR INFORMATION?</a></li>\n<li><a href=\"#q6\">HOW DO WE KEEP YOUR INFORMATION SAFE?</a></li>\n<li><a href=\"#q7\">WHAT ARE YOUR PRIVACY RIGHTS?</a></li>\n<li><a href=\"#q8\">CONTROLS FOR DO-NOT-TRACK FEATURES</a></li>\n<li><a href=\"#q9\">DO CALIFORNIA RESIDENTS HAVE SPECIFIC PRIVACY RIGHTS?</a></li>\n<li><a href=\"#q10\">DO WE MAKE UPDATES TO THIS NOTICE?</a></li>\n<li><a href=\"#11\">HOW CAN YOU CONTACT US ABOUT THIS NOTICE?</a></li>\n<li><a href=\"#12\">HOW CAN YOU REVIEW, UPDATE OR DELETE THE DATA WE COLLECT FROM YOU?</a></li>\n</ol>\n<h3 id=\"q1\">1. WHAT INFORMATION DO WE COLLECT?</h3>\n<p><strong>Personal information you disclose to us</strong></p>\n<p><strong>In Short:</strong><em> We collect personal information that you provide to us.In Short: We collect personal information that you provide to us</em></p>\n<p>We collect personal information that you voluntarily provide to us when you register on the Website, express an interest in obtaining information about us or our products and Services, when you participate in activities on the Website or otherwise when you contact us.</p>\n<p>The personal information that we collect depends on the context of your interactions with us and the Website, the choices you make and the products and features you use. The personal information we collect may include the following:</p>\n<p><strong>Personal Information Provided by You.</strong> We collect names; phone numbers; email addresses; mailing addresses; job titles; usernames; passwords; contact preferences; contact or authentication data; billing addresses; debit/credit card numbers; and other similar information.</p>\n<p><strong>Payment Data.</strong> We may collect data necessary to process your payment if you make purchases, such as your payment instrument number (such as a credit card number), and the security code associated with your payment instrument. All payment data is stored by Quickbook Payments. You may find their privacy notice link(s) here: <a href=\"#\">https://www.intuit.com/privacy/protect-your-privacy/</a>.</p>\n<p>All personal information that you provide to us must be true, complete and accurate, and you must notify us of any changes to such personal information.</p>\n<p><strong>Information automatically collected</strong></p>\n<p><em><strong>In Short: </strong>Some information &acirc;&euro;&rdquo; such as your Internet Protocol (IP) address and/or browser and device characteristics &acirc;&euro;&rdquo; is collected automatically when you visit our Website. </em></p>\n<p>We automatically collect certain information when you visit, use or navigate the Website. This information does not reveal your specific identity (like your name or contact information) but may include device and usage information, such as your IP address, browser and device characteristics, operating system, language preferences, referring URLs, device name, country, location, information about how and when you use our Website and other technical information. This information is primarily needed to maintain the security and operation of our Website, and for our internal analytics and reporting purposes.</p>\n<p>Like many businesses, we also collect information through cookies and similar technologies.</p>\n<p>The information we collect includes:</p>\n<ul>\n<li>Log and Usage Data. Log and usage data is service-related, diagnostic, usage and performance information our servers automatically collect when you access or use our Website and which we record in log files. Depending on how you interact with us, this log data may include your IP address, device information, browser type and settings and information about your activity in the Website (such as the date/time stamps associated with your usage, pages and files viewed, searches and other actions you take such as which features you use), device event information (such as system activity, error reports (sometimes called \'crash dumps\') and hardware settings).</li>\n<li>Device Data. We collect device data such as information about your computer, phone, tablet or other device you use to access the Website. Depending on the device used, this device data may include information such as your IP address (or proxy server), device and application identification numbers, location, browser type, hardware model Internet service provider and/or mobile carrier, operating system and system configuration information.</li>\n<li>Location Data. We collect location data such as information about your device\'s location, which can be either precise or imprecise. How much information we collect depends on the type and settings of the device you use to access the Website. For example, we may use GPS and other technologies to collect geolocation data that tells us your current location (based on your IP address). You can opt out of allowing us to collect this information either by refusing access to the information or by disabling your Location setting on your device. Note however, if you choose to opt out, you may not be able to use certain aspects of the Services.</li>\n</ul>\n<h3 id=\"q2\">2. HOW DO WE USE YOUR INFORMATION?</h3>\n<p><em><strong>In Short:</strong>We process your information for purposes based on legitimate business interests, the fulfillment of our contract with you, compliance with our legal obligations, and/or your consent. </em></p>\n<p>We use personal information collected via our Website for a variety of business purposes described below. We process your personal information for these purposes in reliance on our legitimate business interests, in order to enter into or perform a contract with you, with your consent, and/or for compliance with our legal obligations. We indicate the specific processing grounds we rely on next to each purpose listed below.</p>\n<p>We use the information we collect or receive:</p>\n<ul>\n<ul>\n<li><strong>To facilitate account creation and logon process. </strong>If you choose to link your account with us to a third-party account (such as your Google or Facebook account), we use the information you allowed us to collect from those third parties to facilitate account creation and logon process for the performance of the contract.</li>\n<li>To post testimonials. We post testimonials on our Website that may contain personal information. Prior to posting a testimonial, we will obtain your consent to use your name and the content of the testimonial. If you wish to update, or delete your testimonial, please contact us at info@finishedproductusa.com and be sure to include your name, testimonial location, and contact information.</li>\n<li>Request feedback. We may use your information to request feedback and to contact you about your use of our Website.</li>\n<li>To enable user-to-user communications. We may use your information in order to enable user-to-user communications with each user\'s consent.</li>\n<li>To manage user accounts. We may use your information for the purposes of managing our account and keeping it in working order.</li>\n<li>To send administrative information to you. We may use your personal information to send you product, service and new feature information and/or information about changes to our terms, conditions, and policies.</li>\n<li>To protect our Services. We may use your information as part of our efforts to keep our Website safe and secure (for example, for fraud monitoring and prevention).</li>\n<li>To enforce our terms, conditions and policies for business purposes, to comply with legal and regulatory requirements or in connection with our contract.</li>\n<li>To respond to legal requests and prevent harm. If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond.</li>\n<li>Fulfill and manage your orders. We may use your information to fulfill and manage your orders, payments, returns, and exchanges made through the Website.</li>\n<li>Administer prize draws and competitions. We may use your information to administer prize draws and competitions when you elect to participate in our competitions.</li>\n<li>To deliver and facilitate delivery of services to the user. We may use your information to provide you with the requested service.</li>\n<li>To respond to user inquiries/offer support to users. We may use your information to respond to your inquiries and solve any potential issues you might have with the use of our Services.</li>\n</ul>\n</ul>\n<p>To send you marketing and promotional communications. We and/or our third-party marketing partners may use the personal information you send to us for our marketing purposes, if this is in accordance with your marketing preferences. For example, when expressing an interest in obtaining information about us or our Website, subscribing to marketing or otherwise contacting us, we will collect personal information from you. You can opt-out of our marketing emails at any time (see the <a href=\"#\">WHAT ARE YOUR PRIVACY RIGHTS?\"</a> below).</p>\n<ul>\n<ul>\n<li>Deliver targeted advertising to you. We may use your information to develop and display personalized content and advertising (and work with third parties who do so) tailored to your interests and/or location and to measure its effectiveness.</li>\n<li>For other business purposes. We may use your information for other business purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Website, products, marketing and your experience. We may use and store this information in aggregated and anonymized form so that it is not associated with individual end users and does not include personal information.</li>\nTo post testimonials. We post testimonials on our Website that may contain personal information. Prior to posting a testimonial, we will obtain your consent to use your name and the content of the testimonial. If you wish to update, or delete your testimonial, please contact us at info@finishedproductusa.com and be sure to include your name, testimonial location, and contact information.\n<li>Request feedback. We may use your information to request feedback and to contact you about your use of our Website.</li>\n<li>To enable user-to-user communications. We may use your information in order to enable user-to-user communications with each user\'s consent.</li>\n<li>To manage user accounts. We may use your information for the purposes of managing our account and keeping it in working order.</li>\n<li>To send administrative information to you. We may use your personal information to send you product, service and new feature information and/or information about changes to our terms, conditions, and policies.</li>\n<li>To protect our Services. We may use your information as part of our efforts to keep our Website safe and secure (for example, for fraud monitoring and prevention).</li>\n<li>To enforce our terms, conditions and policies for business purposes, to comply with legal and regulatory requirements or in connection with our contract.</li>\n<li>To respond to legal requests and prevent harm. If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond.</li>\n<li>Fulfill and manage your orders. We may use your information to fulfill and manage your orders, payments, returns, and exchanges made through the Website.</li>\n<li>Administer prize draws and competitions. We may use your information to administer prize draws and competitions when you elect to participate in our competitions.</li>\n<li>To deliver and facilitate delivery of services to the user. We may use your information to provide you with the requested service.</li>\n<li>To respond to user inquiries/offer support to users. We may use your information to respond to your inquiries and solve any potential issues you might have with the use of our Services.</li>\n</ul>\n</ul>\n<p>To send you marketing and promotional communications. We and/or our third-party marketing partners may use the personal information you send to us for our marketing purposes, if this is in accordance with your marketing preferences. For example, when expressing an interest in obtaining information about us or our Website, subscribing to marketing or otherwise contacting us, we will collect personal information from you. You can opt-out of our marketing emails at any time (see the <a href=\"#\"> WHAT ARE YOUR PRIVACY RIGHTS?\"</a> below).</p>\n<ul>\n<li>Deliver targeted advertising to you. We may use your information to develop and display personalized content and advertising (and work with third parties who do so) tailored to your interests and/or location and to measure its effectiveness.</li>\n<li>For other business purposes. We may use your information for other business purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Website, products, marketing and your experience. We may use and store this information in aggregated and anonymized form so that it is not associated with individual end users and does not include personal information.</li>\n</ul>\n<h3 id=\"q3\">3. WILL YOUR INFORMATION BE SHARED WITH ANYONE?</h3>\n<p><em><strong>In Short:</strong> We only share information with your consent, to comply with laws, to provide you with services, to protect your rights, or to fulfill business obligations. </em></p>\n<p>We may process or share your data that we hold based on the following legal basis:</p>\n<ul>\n<li>Consent: We may process your data if you have given us specific consent to use your personal information for a specific purpose.</li>\n<li>Legitimate Interests: We may process your data when it is reasonably necessary to achieve our legitimate business interests.</li>\n<li>Performance of a Contract: Where we have entered into a contract with you, we may process your personal information to fulfill the terms of our contract.</li>\n<li>Legal Obligations: We may disclose your information where we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process, such as in response to a court order or a subpoena (including in response to public authorities to meet national security or law enforcement requirements).</li>\n<li>Vital Interests: We may disclose your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations involving potential threats to the safety of any person and illegal activities, or as evidence in litigation in which we are involved.</li>\n</ul>\n<p>More specifically, we may need to process your data or share your personal information in the following situations:</p>\n<ul>\n<li>Business Transfers. We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.</li>\n<li>Google Maps Platform APIs. We may share your information with certain Google Maps Platform APIs (e.g., Google Maps API, Place API). To find out more about Google&acirc;&euro;&trade;s Privacy Policy, please refer to this <a href=\"#\">link.</a></li>\n</ul>', 'Y', 'keywords Privacy Policy', 'meta Privacy Policy', NULL, '2021-11-23 03:45:06', '2021-12-20 06:28:27'),
(7, 'Return Policy', 'return-policy', 'Return Policy', '1637659194_inner-banner.png', '', '<p>Corporate ipsum is chalk full of over-used cliche business terms. For all the web developers and designers building, this one is definitely for you. While it does produce some great corporate word content, we would like to see some variety in paragraph length or the ability to select a word count.</p>\n<p>If you&rsquo;re a movie buff, this dummy text generator is right up your alley. Picksum Ipsum will generate some of the best lines from legendary Hollywood actors. The current lineup consists of Michael Caine, Clint Eastwood, Jim Carrey and Morgan Freeman. Simply pick your favorite actor, the number of paragraphs and away you go.</p>', 'Y', 'keywords Return Policy', 'meta Return Policy', NULL, '2021-11-23 03:49:54', '2021-11-26 04:31:00');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` bigint(20) DEFAULT 0,
  `product_price` double DEFAULT 0,
  `product_price_json` text COLLATE utf8mb4_unicode_ci DEFAULT '',
  `product_quantity_for_sale` bigint(20) DEFAULT 0,
  `product_available` bigint(20) DEFAULT 0,
  `product_detail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_specification` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_features` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_feature_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `additional_images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_home_page` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `product_quantity`, `product_price`, `product_price_json`, `product_quantity_for_sale`, `product_available`, `product_detail`, `product_description`, `product_specification`, `product_features`, `product_feature_image`, `additional_images`, `on_home_page`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'PM SKU: TEMPTAG', 25, 23, '[{\"price\":\"45.10\",\"quantity\":\"50\"},{\"price\":\"83.60\",\"quantity\":\"100\"},{\"quantity\":\"500\",\"price\":\"327.80\"},{\"quantity\":\"1000\",\"price\":\"602.80\"}]', 3, 1000, '<p>Temp Tag New Jersey, a disvision of Finished Products LLC, is approved by the State of New Jersey Motor Vehicle Commission (NJMVC)and NIC to be and authorized vendor of the paper used for the eTemp Registration Tag system. We have the paper that meets all of the specification of the NJMVC and NIC.</p>\n<p>Size 8 <sup>1</sup>/<sub>2</sub>\" x 11\"</p>', '<p>Temp Tag New Jersey, a disvision of Finished Products LLC, is approved by the State of New Jersey Motor Vehicle Commission (NJMVC)and NIC to be and authorized vendor of the paper used for the eTemp Registration Tag system. We have the paper that meets all of the specification of the NJMVC and NIC.</p>\n<p>Size 8 <sup>1</sup>/<sub>2</sub>\" x 11\"</p>', '<ul>\n<li>Two (2) holes will be drilled at the top of the paper to allow for adherence to the rear plate of the vehicle</li>\n<li>The paper will be perforated lengthwise across the paper in landscape mode to separate the template from the rest of the paper. It will also be perforated perpendicular ti the lengthwise perforation to create the temporary vehicle registration from the dealer copy of the tag.</li>\n</ul>', '<p>- 8.5\" x 11\"</p>\n<p>- Weather resistant (cold, hot, wet, snow, wind, and humidity)</p>\n<p>- Tear proof</p>\n<p>- Chemical (oil) resistant</p>\n<p>- UV light/fade resistant</p>\n<p>- Matte finish (to eliminate glossy reflection at night)</p>\n<p>-Dry Toner/ Laser Printer Compatible</p>\n<p>The paper will be drilled and perforated as follows:</p>\n<ul>\n<li>Two (2) holes at the top of the paper to allow for adherence to the rear plate of the vehicle</li>\n<li>Perforated lengthwise across the paper in landscape mode to separate the template from the rest of the paper</li>\n<li>Perforated perpendicular to the lengthwise perforation to create the temporary vehicle registration from the dealer copy of the tag.</li>\n</ul>', '1637907949_food.png', '{\"additional_image1\":\"1639049119_office-5169618_1639031529.jpg\",\"additional_image2\":\"\"}', 'Y', 'Y', '2021-11-25 13:55:49', '2021-12-21 06:41:00'),
(3, 1, 'Test Product 2', 0, 0, '[{\"quantity\":\"100\",\"price\":\"10\"}]', 0, 9999, '<p>Detail</p>', '<p>Description</p>', '<p>Specification</p>', '<p>Features</p>', '1640062065_Chrysanthemum.jpg', '{\"additional_image1\":\"1640062065_Desert.jpg\",\"additional_image2\":\"\"}', 'N', 'Y', '2021-12-20 23:17:45', '2021-12-20 23:17:45');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reward` double(10,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `data` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disposable` tinyint(1) NOT NULL DEFAULT 0,
  `expires_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `code`, `reward`, `quantity`, `data`, `is_disposable`, `expires_at`) VALUES
(1, 'ABWM-9SUA', 10.00, 100, '{\"promocode_type\":\"persentage\"}', 0, '2023-01-19 00:15:19'),
(2, 'DWYE-DZ4L', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(3, 'WAJU-6EQH', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(4, 'LP82-UW4X', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(5, 'F8E2-Z2KR', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(6, 'BZQB-N92Z', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(7, '7MUC-LF5K', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(8, 'PNJM-LM7S', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(9, 'MKZL-Z49B', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(10, 'TD2U-GGD7', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(11, '6NS5-G6JP', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(12, 'YLZZ-THR5', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(13, 'AFL7-9W2U', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(14, '34N2-23F6', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(15, '4SL3-AEHS', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(16, 'CEKV-MDAM', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(17, 'GSEC-QT7L', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(18, '9MMW-NU88', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(19, 'ECCZ-HW77', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(20, '4VD6-F44X', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(21, 'MWNK-YHMU', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(22, 'Y6ZS-3Z6P', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(23, 'AHM8-C33H', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(24, '8CFZ-PFEX', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(25, 'VSPS-CP78', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(26, '7PMP-RT37', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(27, 'H62K-HG86', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(28, '7TBQ-BNUJ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(29, 'LH45-CQHT', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(30, '94UU-KXAY', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(31, '86AN-FYQB', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(32, 'Z67E-LVKT', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(33, '6VPR-VS3U', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(34, '2PPJ-RHVJ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(35, '8ZL4-S3TF', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(36, 'YAGX-GJKN', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(37, 'PA6A-5AKU', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(38, 'NZKD-CP8N', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(39, 'XY87-GF2B', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(40, 'NX97-PSMX', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(41, 'NAXV-U47W', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(42, 'CR3M-WU9J', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(43, 'PPKC-GYGX', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(44, 'BDEV-GW84', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(45, '6HJT-5KXF', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(46, 'KMTS-B2NP', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(47, '8RHN-SY6M', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(48, '8FHH-WEDW', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(49, 'MQQB-F797', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(50, 'HBTC-K7FS', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(51, 'NBBT-VCYZ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(52, 'Y4P9-698G', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(53, 'VELM-PDLF', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(54, '9CQC-MU39', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(55, 'VV2W-VFD9', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(56, 'NZS7-RMHR', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(57, 'MJG5-YYWD', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(58, 'ALX9-39AN', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(59, 'TQGD-NZC6', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(60, 'EMMZ-N9ER', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(61, 'YFGX-2VM9', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(62, 'AZM5-CVYQ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(63, '4MD7-AV2G', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(64, 'Y2E3-4EWW', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(65, 'JCAN-5982', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(66, 'QSSH-76HT', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(67, '9XXL-PGWP', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(68, 'G46E-MP2L', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(69, 'MU5N-ZL2C', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(70, '95JA-3DAW', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(71, 'FZEH-QQV3', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(72, 'A8JR-DHZZ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(73, 'YEB9-KU4A', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(74, 'CEUT-UEPA', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(75, 'KDSX-GLY4', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(76, 'FK7D-4FA2', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(77, 'U875-8QDJ', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(78, '55VH-FBJF', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(79, 'ZRET-NGNS', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(80, 'EMDT-729G', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(81, 'HY5S-YUWC', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(82, 'YCB2-T6Z4', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(83, 'AJS9-MGDU', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(84, 'USBB-HWXL', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(85, 'ATGT-PXBE', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(86, 'NESH-3G8B', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(87, 'Y7E3-ZCEC', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(88, 'RML6-R3X3', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(89, 'GRJZ-3ABT', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(90, 'PB9M-Q9EK', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(91, '7ESX-X2J6', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(92, 'JAQA-3J7P', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(93, 'NUU9-2ZJ2', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(94, '3SBG-BY4K', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(95, 'DQKL-94BN', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(96, 'MSXV-6YTX', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(97, 'DDE7-2FFN', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(98, 'GFCU-542R', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(99, 'SDNJ-PRGT', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(100, 'QVFN-B6J7', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41'),
(101, 'YY6C-AUMX', 10.00, 100, '{\"promocode_type\":\"fixed\"}', 0, '2023-01-25 06:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `promocode_user`
--

CREATE TABLE `promocode_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `promocode_id` bigint(20) UNSIGNED NOT NULL,
  `used_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'user', 'Y', NULL, NULL),
(2, 'admin', 'Y', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Y', NULL, NULL),
(2, 2, 1, 'N', NULL, NULL),
(3, 3, 1, 'N', NULL, NULL),
(4, 4, 1, 'N', NULL, NULL),
(5, 5, 1, 'N', NULL, NULL),
(6, 7, 1, 'N', NULL, NULL),
(7, 8, 1, 'N', NULL, NULL),
(8, 9, 1, 'N', NULL, NULL),
(9, 10, 1, 'N', NULL, NULL),
(10, 11, 1, 'N', NULL, NULL),
(11, 12, 1, 'N', NULL, NULL),
(12, 13, 1, 'N', NULL, NULL),
(13, 14, 1, 'N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ship_stations`
--

CREATE TABLE `ship_stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `contact_info_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_info_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_info_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_linkedin_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media_instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `contact_info_address`, `contact_info_email`, `contact_info_phone`, `social_media_facebook_link`, `social_media_linkedin_link`, `social_media_instagram_link`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'Parsippany, NJ', 'tempTagNJ@finishedproductusa.com', '862-682-47651', 'https://www.facebook.com', 'https://www.linkedin.com/', 'https://www.instagram.com/', '<p>© 2021, <a href=\"https://www.finishedproductusa.com\" target=\"_blank\">Finished Product LLC</a>. All rights reserved.</p>', NULL, '2022-01-31 05:03:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_forms`
--

CREATE TABLE `subscription_forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `user_id` bigint(20) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_forms`
--

INSERT INTO `subscription_forms` (`id`, `email`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sham.suffescom@gmail.com', 0, '2021-11-29 06:41:29', '2021-11-29 06:41:29'),
(9, 'sham.suffescom@gmail.com', 0, '2021-12-01 06:33:09', '2021-12-01 06:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `plain_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealership_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `njvmc_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `njvmc_expiration_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `billing_address` bigint(20) NOT NULL DEFAULT 0,
  `delivery_address` bigint(20) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `plain_password`, `is_active`, `user_image`, `last_name`, `phone_number`, `dealership_name`, `njvmc_id`, `njvmc_expiration_date`, `street_address_1`, `street_address_2`, `zip`, `city`, `state`, `country`, `fax`, `billing_address`, `delivery_address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin1', 'admin@test.com', NULL, '$2y$10$rv0GzdgVW45Aq/31mNIEJOBAs2sIkGTD1qdiC9droOaiY6.q1OtNi', '12345678', 'Y', '1638357629_Hydrangeas.jpg', 'asdasd11', '9784125369', '', '', '', '', '', '', '', '', '', NULL, 0, 0, NULL, '2021-11-14 08:20:22', '2021-11-30 18:50:29'),
(2, 'Dealership1', 'user1@test.com', NULL, '$2y$10$lkg9gJg5QG.fNLYaQ.Ltyu3ZTsoW4mmUQEKu0LNynJVjX7HrK34SG', '123456', 'Y', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '13-12-2023', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', '1234', 0, 0, NULL, '2022-01-12 04:44:24', '2022-01-12 04:44:24'),
(3, 'Dealership', 'sham.suffescom@gmail.com', NULL, '$2y$10$u7h1ui19mb6M4Yt44ZTL/em9lNqI/en05LL1fNbKxw0.fze3FPeEy', '123456', 'Y', '1643008223_Chrysanthemum.jpg', '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 04:49:23', '2022-01-24 01:40:23'),
(4, 'Dealership', 'user1@gmail.com', NULL, '$2y$10$l6OsbS84MEjBO4w.LUI5g.LtlTQ3hcCUOlJumBJ0Mlgsvja7a9ELi', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 04:50:42', '2022-01-12 04:50:42'),
(5, 'Dealership', 'user2@gmail.com', NULL, '$2y$10$YZvNe035r3oCKWerPJXAQO4n29gAqeCT4Uf4gFtLJldpjhNS0P/2.', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 04:58:09', '2022-01-12 04:58:09'),
(7, 'Dealership', 'user3@gmail.com', NULL, '$2y$10$rCX.UuBGbfoSlOjY1AwjFOMfk5W.1LRZPwunbsINgSQQQDxSu.8gu', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 04:59:58', '2022-01-12 04:59:58'),
(8, 'Dealership', 'user4@gmail.com', NULL, '$2y$10$1HizrikNRVbnUp744gTovO31z0Ag/Fa6YA.wvPFIv9RMrVmZwU46.', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 05:01:49', '2022-01-12 05:01:49'),
(9, 'Dealership', 'user6@gmail.com', NULL, '$2y$10$hhX9OhkWaR9ygobPU5TZeeP0H6aIYVh5fAl3G85/IswGlJrSNJtry', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC1', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 05:02:35', '2022-01-12 05:02:35'),
(10, 'dasd', 'TESTUSER2@TEST.COM', NULL, '$2y$10$utzydqrpK7jwnzp1RaL65eif6FoklI6IJnYdxDeZEX2YwJ/T0Bcbi', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC2', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 06:55:40', '2022-01-12 06:55:40'),
(11, 'Dealership', 'user9@gmail.com', NULL, '$2y$10$MTv4Dzdvgj2yaHPg/Wp3mOWexHTg.JZFyHy3W02Eulpamig6eT4Le', '123456', 'N', NULL, '2', '08952369856', 'Dealership User 2', 'NJVMC9', '01-12-2022', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 0, 0, NULL, '2022-01-12 07:20:31', '2022-01-12 07:20:31'),
(12, 'test', 'user10@test.com', NULL, '$2y$10$tpL.JffIjRko480/GqfAVuMDZ/.ebdaNpQKyhcyyoF8zWL8xvhOCi', '123456', 'N', NULL, 'user10', '9632587410', 'Dealership10', 'NJVMC10', '25-01-2023', 'Test Dealership Address', 'Test Dealership Address 2', '152026', 'Muktsar', 'Punjab', 'India', '123456', 0, 0, NULL, '2022-01-23 23:44:51', '2022-01-24 04:46:07'),
(13, 'test', 'user11@test.com', NULL, '$2y$10$SziWgKgri/ls9pQGdfG42.ygSQLU1YCOPKvQLkQ/TITHmTNt/0HCe', '123456', 'Y', '1643019665_Desert.jpg', 'user11', '0147258369', 'Dealership11', 'NJVMC11', '08-05-2024', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', '258369741', 0, 0, NULL, '2022-01-24 04:51:06', '2022-01-24 04:51:06'),
(14, 'user', 'user12@test.com', NULL, '$2y$10$OnMCcYrf/KFBJETYTY1ItuNehnPch/w0SWm7WwotMk8souAmlC9Zq', '123456', 'Y', '1643019815_Hydrangeas.jpg', 'user12', '963258741', 'Dealership12', 'NJVMC12', '14-02-2024', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', '021458735', 0, 0, NULL, '2022-01-24 04:53:35', '2022-01-24 04:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `user_addition_addresses`
--

CREATE TABLE `user_addition_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dealership_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residential_address` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'N',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_addition_addresses`
--

INSERT INTO `user_addition_addresses` (`id`, `user_id`, `first_name`, `last_name`, `phone_number`, `dealership_name`, `street_address_1`, `street_address_2`, `zip`, `city`, `state`, `country`, `email`, `residential_address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@test.com', 'N', '2022-01-12 04:44:24', '2022-01-12 04:44:24'),
(2, 3, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user2@test.com', 'N', '2022-01-12 04:49:23', '2022-01-12 04:49:23'),
(3, 4, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 04:50:43', '2022-01-12 04:50:43'),
(4, 5, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 04:58:10', '2022-01-12 04:58:10'),
(5, 7, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 04:59:58', '2022-01-12 04:59:58'),
(6, 8, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 05:01:49', '2022-01-12 05:01:49'),
(7, 9, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 05:02:36', '2022-01-12 05:02:36'),
(8, 10, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'TESTUSER2@TEST.COM', 'N', '2022-01-12 06:55:40', '2022-01-12 06:55:40'),
(9, 11, 'Dealership', '2', '08952369856', NULL, 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user1@gmail.com', 'N', '2022-01-12 07:20:31', '2022-01-12 07:20:31'),
(10, 2, 'Dealership1', '2', '08952369856', 'Dealership User 2', 'Street Address 1', 'Street Address 2', '152026', 'Muktsar', 'Punjab', 'India', NULL, 'N', '2022-01-18 23:10:04', '2022-01-18 23:10:04'),
(11, 12, 'Test', 'User10', '9632587410', NULL, 'Test Shipping Address', 'Test Shipping Address 2', '152026', 'Muktsar', 'Punjab', NULL, 'user10@test.com', 'N', '2022-01-23 23:44:51', '2022-01-23 23:44:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_storage`
--
ALTER TABLE `cart_storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_storage_id_index` (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_forms`
--
ALTER TABLE `contact_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `promocodes_code_unique` (`code`);

--
-- Indexes for table `promocode_user`
--
ALTER TABLE `promocode_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promocode_user_user_id_foreign` (`user_id`),
  ADD KEY `promocode_user_promocode_id_foreign` (`promocode_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ship_stations`
--
ALTER TABLE `ship_stations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_forms`
--
ALTER TABLE `subscription_forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_addition_addresses`
--
ALTER TABLE `user_addition_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_forms`
--
ALTER TABLE `contact_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `promocode_user`
--
ALTER TABLE `promocode_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ship_stations`
--
ALTER TABLE `ship_stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscription_forms`
--
ALTER TABLE `subscription_forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_addition_addresses`
--
ALTER TABLE `user_addition_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `promocode_user`
--
ALTER TABLE `promocode_user`
  ADD CONSTRAINT `promocode_user_promocode_id_foreign` FOREIGN KEY (`promocode_id`) REFERENCES `promocodes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promocode_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
