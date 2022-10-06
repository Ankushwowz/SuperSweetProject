-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 01:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supersweet`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `avatar1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_cover1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `biography` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `name`, `dob`, `avatar1`, `background_cover1`, `overview`, `biography`, `created_at`, `updated_at`) VALUES
(12, 'Mia Khalifa', '2022-07-06', '1655505413.mia-khalifa.jpg', '1655506172.4c3a9160-536c-4f33-9962-2566efcc8faf.jpg', 'Mia Khalifa is a Lebanese-American media personality, former pornographic actress and webcam model. She began acting in pornography in October 2014, becoming the most viewed performer on Pornhub in two months', 'Mia Khalifa is a Lebanese-American media personality, former pornographic actress and webcam model. She began acting in pornography in October 2014, becoming the most viewed performer on Pornhub in two months. \r\nBorn: 10 February 1993 (age 29 years), Beirut, Lebanon\r\nHeight: 1.57 m\r\nAlma mater: University of Texas at El Paso (BA)\r\nEducation: Massanutten Military Academy\r\nNationality: American, Lebanese', '2022-06-17 17:06:53', '2022-06-21 17:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `admin_avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@admin.com', '1655917808.clinic.png', NULL, '$2y$10$4HQsnSS.kjkYkMX2Erlo9.Co7/JLC7HquFbymuLq3oOpG53wgKTU2', NULL, '2022-06-16 10:11:41', '2022-06-22 11:40:08'),
(6, 'Aman Sharma', 'amansharma@yopmail.com', '1655917709.family.png', NULL, '$2y$10$Hv.7bQl.EK7dzI7SW/NnQ.FM3Zdgu.QLiDjG9KKnwwOAAcRMHwxUS', NULL, '2022-06-22 11:17:04', '2022-06-22 11:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Indian', '2022-06-16 10:11:41', '2022-06-16 13:26:07'),
(2, 'Cartoon', '2022-06-16 10:11:41', '2022-06-16 13:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

CREATE TABLE `films` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `actors` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_covers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `year`, `categories`, `actors`, `overview`, `background_covers`, `video`, `created_at`, `updated_at`) VALUES
(4, 'Development test 1', '2023', '2', '12', 'This is Dummy Testing', '1655924446.miakhalifa.jpg', '1655913096.big_buck_bunny_720p_10mb.mp4', '2022-06-22 10:21:36', '2022-06-22 13:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `film_actor`
--

CREATE TABLE `film_actor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `actor_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_actor`
--

INSERT INTO `film_actor` (`id`, `film_id`, `actor_id`, `created_at`, `updated_at`) VALUES
(2, 4, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `film_category`
--

CREATE TABLE `film_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `film_category`
--

INSERT INTO `film_category` (`id`, `film_id`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2020_06_02_095050_create_admins_table', 1),
(10, '2020_06_03_195558_laratrust_setup_tables', 1),
(11, '2020_06_04_194447_create_films_table', 1),
(12, '2020_06_04_232843_create_categories_table', 1),
(13, '2020_06_05_001446_create_film_category_table', 1),
(14, '2020_06_05_120307_create_ratings_table', 1),
(15, '2020_06_07_080359_create_reviews_table', 1),
(16, '2020_06_07_090829_create_favorites_table', 1),
(17, '2020_06_07_150108_create_actors_table', 1),
(18, '2020_06_07_163648_create_film_actor_table', 1),
(19, '2020_06_07_172955_create_messages_table', 1),
(20, '2022_06_16_213700_create_payment_settings_table', 2),
(23, '2022_06_21_172417_create_subscriptions_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'kxwizYC8Ec5qrLJUA6hownARtpjPYIkcAYrSvCEZ', NULL, 'http://localhost', 1, 0, 0, '2022-06-16 09:46:13', '2022-06-16 09:46:13'),
(2, NULL, 'Laravel Password Grant Client', 'uEAaEV0ICf7fRXBQaXOTjXXJcrkPqYjeUTBAoJpa', 'users', 'http://localhost', 0, 1, 0, '2022-06-16 09:46:13', '2022-06-16 09:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-06-16 09:46:13', '2022-06-16 09:46:13');

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
-- Table structure for table `payment_settings`
--

CREATE TABLE `payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `live_mode` tinyint(4) NOT NULL DEFAULT 0,
  `test_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_publishable_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_secret_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `live_publishable_key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'create_admins', 'Create Admins', 'Create Admins', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(2, 'read_admins', 'Read Admins', 'Read Admins', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(3, 'update_admins', 'Update Admins', 'Update Admins', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(4, 'delete_admins', 'Delete Admins', 'Delete Admins', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(5, 'create_clients', 'Create Clients', 'Create Clients', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(6, 'read_clients', 'Read Clients', 'Read Clients', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(7, 'update_clients', 'Update Clients', 'Update Clients', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(8, 'delete_clients', 'Delete Clients', 'Delete Clients', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(9, 'create_films', 'Create Films', 'Create Films', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(10, 'read_films', 'Read Films', 'Read Films', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(11, 'update_films', 'Update Films', 'Update Films', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(12, 'delete_films', 'Delete Films', 'Delete Films', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(13, 'create_categories', 'Create Categories', 'Create Categories', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(14, 'read_categories', 'Read Categories', 'Read Categories', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(15, 'update_categories', 'Update Categories', 'Update Categories', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(16, 'delete_categories', 'Delete Categories', 'Delete Categories', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(17, 'create_actors', 'Create Actors', 'Create Actors', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(18, 'read_actors', 'Read Actors', 'Read Actors', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(19, 'update_actors', 'Update Actors', 'Update Actors', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(20, 'delete_actors', 'Delete Actors', 'Delete Actors', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(21, 'read_ratings', 'Read Ratings', 'Read Ratings', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(22, 'delete_ratings', 'Delete Ratings', 'Delete Ratings', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(23, 'read_reviews', 'Read Reviews', 'Read Reviews', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(24, 'delete_reviews', 'Delete Reviews', 'Delete Reviews', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(25, 'read_messages', 'Read Messages', 'Read Messages', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(26, 'delete_messages', 'Delete Messages', 'Delete Messages', '2022-06-16 10:11:40', '2022-06-16 10:11:40');

-- --------------------------------------------------------

--
-- Table structure for table `permission_admin`
--

CREATE TABLE `permission_admin` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_admin`
--

INSERT INTO `permission_admin` (`permission_id`, `admin_id`, `user_type`) VALUES
(1, 1, 'App\\Admin'),
(2, 1, 'App\\Admin'),
(3, 1, 'App\\Admin'),
(4, 1, 'App\\Admin'),
(5, 1, 'App\\Admin'),
(6, 1, 'App\\Admin'),
(7, 1, 'App\\Admin'),
(8, 1, 'App\\Admin'),
(9, 1, 'App\\Admin'),
(10, 1, 'App\\Admin'),
(11, 1, 'App\\Admin'),
(12, 1, 'App\\Admin'),
(13, 1, 'App\\Admin'),
(14, 1, 'App\\Admin'),
(15, 1, 'App\\Admin'),
(16, 1, 'App\\Admin'),
(17, 1, 'App\\Admin'),
(18, 1, 'App\\Admin'),
(19, 1, 'App\\Admin'),
(20, 1, 'App\\Admin'),
(21, 1, 'App\\Admin'),
(22, 1, 'App\\Admin'),
(23, 1, 'App\\Admin'),
(24, 1, 'App\\Admin'),
(25, 1, 'App\\Admin'),
(26, 1, 'App\\Admin'),
(1, 6, 'App\\Admin'),
(2, 6, 'App\\Admin'),
(3, 6, 'App\\Admin'),
(4, 6, 'App\\Admin'),
(5, 6, 'App\\Admin'),
(6, 6, 'App\\Admin'),
(7, 6, 'App\\Admin'),
(8, 6, 'App\\Admin');

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
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `film_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'super_admin', 'Super Admin', 'Super Admin', '2022-06-16 10:11:40', '2022-06-16 10:11:40'),
(2, 'admin', 'Admin', 'Admin', '2022-06-16 10:11:41', '2022-06-16 10:11:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admin`
--

INSERT INTO `role_admin` (`role_id`, `admin_id`, `user_type`) VALUES
(1, 1, 'App\\Admin'),
(2, 6, 'App\\Admin');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_duration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_time` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `plan_name`, `plan_duration`, `plan_time`, `plan_price`, `plan_description`, `subscription_image`, `subscription_status`, `created_at`, `updated_at`) VALUES
(1, 'Test2222222', '122222222222', 'month', '2002222222', 'This is Testing22222222222', '1655847831.WhatsApp Image 2022-06-09 at 10.13.45 PM.jpeg', '1', '2022-06-21 14:37:54', '2022-06-21 17:05:42'),
(2, 'Test222', '1', 'month', '800', 'This is Testing Plan 2', '1655842657.WhatsApp Image 2022-06-09 at 10.13.46 PM.jpeg', '0', '2022-06-21 14:47:37', '2022-06-21 17:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'UserName', 'FirstName', 'LastName', 'user@app.com', NULL, NULL, '$2y$10$r2DdOlRCJUQX23vMAYkCbeqzaEqw7Jyxr0kKzVGzmiVUJAms3yGvm', NULL, '2022-06-16 10:11:41', '2022-06-16 10:11:41'),
(3, 'user2', 'user2', 'user2', 'user2@app.com', NULL, NULL, '$2y$10$mqTdTyKHCVo.nsvsW4IJEOVFGpr5R.t4yQoF4ZGA6xsyoUR1zHBO.', NULL, '2022-06-16 10:11:41', '2022-06-16 10:11:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actors_name_unique` (`name`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favorites_user_id_film_id_unique` (`user_id`,`film_id`),
  ADD KEY `favorites_film_id_foreign` (`film_id`);

--
-- Indexes for table `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `films_name_unique` (`name`);

--
-- Indexes for table `film_actor`
--
ALTER TABLE `film_actor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `film_actor_film_id_actor_id_unique` (`film_id`,`actor_id`),
  ADD KEY `film_actor_actor_id_foreign` (`actor_id`);

--
-- Indexes for table `film_category`
--
ALTER TABLE `film_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `film_category_film_id_category_id_unique` (`film_id`,`category_id`),
  ADD KEY `film_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment_settings`
--
ALTER TABLE `payment_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD PRIMARY KEY (`admin_id`,`permission_id`,`user_type`),
  ADD KEY `permission_admin_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ratings_user_id_film_id_unique` (`user_id`,`film_id`),
  ADD KEY `ratings_film_id_foreign` (`film_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_film_id_foreign` (`film_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`admin_id`,`role_id`,`user_type`),
  ADD KEY `role_admin_role_id_foreign` (`role_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_plan_name_unique` (`plan_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `films`
--
ALTER TABLE `films`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `film_actor`
--
ALTER TABLE `film_actor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `film_category`
--
ALTER TABLE `film_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_settings`
--
ALTER TABLE `payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_actor`
--
ALTER TABLE `film_actor`
  ADD CONSTRAINT `film_actor_actor_id_foreign` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_actor_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `film_category`
--
ALTER TABLE `film_category`
  ADD CONSTRAINT `film_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `film_category_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_admin`
--
ALTER TABLE `permission_admin`
  ADD CONSTRAINT `permission_admin_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_film_id_foreign` FOREIGN KEY (`film_id`) REFERENCES `films` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD CONSTRAINT `role_admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
