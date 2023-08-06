-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 17, 2022 at 10:34 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookspotdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresstbls`
--

DROP TABLE IF EXISTS `addresstbls`;
CREATE TABLE IF NOT EXISTS `addresstbls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `addresstype` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresstbls`
--

INSERT INTO `addresstbls` (`id`, `userid`, `fullname`, `phone`, `address`, `city`, `addresstype`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Talha tanveer', '03002186506', 'D3', 'Karachi', 'Home', 54700, 'pending', '2022-06-17 15:23:49', '2022-06-17 15:23:49'),
(2, 3, 'Zain', '03002186506', 'D4', 'Lahore', 'Office', 54700, 'pending', '2022-06-17 16:40:23', '2022-06-17 16:40:23');

-- --------------------------------------------------------

--
-- Table structure for table `authortbls`
--

DROP TABLE IF EXISTS `authortbls`;
CREATE TABLE IF NOT EXISTS `authortbls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `authorname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authortbls`
--

INSERT INTO `authortbls` (`id`, `authorname`, `created_at`, `updated_at`) VALUES
(1, 'Jhone Steben', '2022-06-16 13:04:28', '2022-06-16 13:04:28'),
(2, 'David King', '2022-06-16 13:05:46', '2022-06-16 13:05:46'),
(3, 'John Klok', '2022-06-16 13:06:40', '2022-06-16 13:06:40'),
(4, 'Jules Boutin', '2022-06-16 13:07:51', '2022-06-16 13:07:51'),
(5, 'Ichae Semos', '2022-06-16 13:09:07', '2022-06-16 13:09:07'),
(6, 'Attilio Marzi', '2022-06-16 13:10:07', '2022-06-16 13:10:07'),
(7, 'Henry Jurk', '2022-06-16 13:11:23', '2022-06-16 13:11:23'),
(8, 'Argele Intili', '2022-06-16 13:12:25', '2022-06-16 13:12:25'),
(9, 'Jules Boutin', '2022-06-16 13:19:09', '2022-06-16 13:19:09'),
(10, 'Kusti Franti', '2022-06-16 13:20:09', '2022-06-16 13:20:09'),
(11, 'Jhone Steben', '2022-06-16 13:21:11', '2022-06-16 13:21:11'),
(12, 'John Klok', '2022-06-16 13:22:08', '2022-06-16 13:22:08'),
(13, 'John Klok', '2022-06-17 17:12:18', '2022-06-17 17:12:18'),
(14, 'Jhone Steben', '2022-06-17 17:27:44', '2022-06-17 17:27:44'),
(15, 'John Klok', '2022-06-17 17:30:44', '2022-06-17 17:30:44'),
(16, 'Ichae Semos', '2022-06-17 17:31:52', '2022-06-17 17:31:52'),
(17, 'Jules Boutin', '2022-06-17 17:32:24', '2022-06-17 17:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `booktbls`
--

DROP TABLE IF EXISTS `booktbls`;
CREATE TABLE IF NOT EXISTS `booktbls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookimage` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookcategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookauthor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bookprice` int(11) NOT NULL,
  `bookdate` date NOT NULL DEFAULT '2022-06-16',
  `bookpdf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booktbls_bookcategory_foreign` (`bookcategory`),
  KEY `booktbls_bookauthor_foreign` (`bookauthor`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `booktbls`
--

INSERT INTO `booktbls` (`id`, `bookimage`, `bookname`, `bookcategory`, `bookauthor`, `bookprice`, `bookdate`, `bookpdf`, `created_at`, `updated_at`) VALUES
(17, '680546461.04.jpg', 'Little Black Book', 'Arts Books', 'Jules Boutin', 399, '2022-06-16', '670826890.915118403.34116984.dtfhghg.pdf', '2022-06-17 17:32:24', '2022-06-17 17:32:24'),
(16, '1408664192.03.jpg', 'The Catcher in the Rye', 'Horror Story', 'Ichae Semos', 1239, '2022-06-16', '818272453.1369571676.1439055367.34116984.dtfhghg.pdf', '2022-06-17 17:31:52', '2022-06-17 17:31:52'),
(15, '355859208.02.jpg', 'Take On The Risk', 'History Books', 'John Klok', 1399, '2022-06-16', '1921665117.2048071068.1018891725.1439055367.34116984.dtfhghg.pdf', '2022-06-17 17:30:44', '2022-06-17 17:30:44'),
(14, '781740609.01.jpg', 'Reading on the World', 'General Books', 'Jhone Steben', 699, '2022-06-16', '1518094296.585332249.1803715552.1439055367.34116984.dtfhghg.pdf', '2022-06-17 17:27:44', '2022-06-17 17:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `categorytbls`
--

DROP TABLE IF EXISTS `categorytbls`;
CREATE TABLE IF NOT EXISTS `categorytbls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorytbls`
--

INSERT INTO `categorytbls` (`id`, `categoryname`, `created_at`, `updated_at`) VALUES
(1, 'General Books', '2022-06-16 13:04:28', '2022-06-16 13:04:28'),
(2, 'History Books', '2022-06-16 13:05:46', '2022-06-16 13:05:46'),
(3, 'Horror Story', '2022-06-16 13:06:40', '2022-06-16 13:06:40'),
(4, 'Arts Books', '2022-06-16 13:07:51', '2022-06-16 13:07:51'),
(5, 'Comics & Mangas', '2022-06-16 13:09:07', '2022-06-16 13:09:07'),
(6, 'Computers & Internet', '2022-06-16 13:10:07', '2022-06-16 13:10:07'),
(7, 'Sports', '2022-06-16 13:11:23', '2022-06-16 13:11:23'),
(8, 'Sports', '2022-06-16 13:12:25', '2022-06-16 13:12:25'),
(9, 'Business & Economics', '2022-06-16 13:19:09', '2022-06-16 13:19:09'),
(10, 'Film & Photography', '2022-06-16 13:20:09', '2022-06-16 13:20:09'),
(11, 'Travel & Tourism', '2022-06-16 13:21:11', '2022-06-16 13:21:11'),
(12, 'Horror Story', '2022-06-16 13:22:08', '2022-06-16 13:22:08'),
(13, 'Horror Story', '2022-06-17 17:12:18', '2022-06-17 17:12:18'),
(14, 'General Books', '2022-06-17 17:27:44', '2022-06-17 17:27:44'),
(15, 'History Books', '2022-06-17 17:30:44', '2022-06-17 17:30:44'),
(16, 'Horror Story', '2022-06-17 17:31:52', '2022-06-17 17:31:52'),
(17, 'Arts Books', '2022-06-17 17:32:24', '2022-06-17 17:32:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '2014_10_12_000000_create_users_table', 4),
(37, '2014_10_12_100000_create_password_resets_table', 4),
(38, '2019_08_19_000000_create_failed_jobs_table', 4),
(39, '2022_05_17_082635_create_categorytbls_table', 4),
(40, '2022_05_17_152859_create_booktbls_table', 4),
(41, '2022_05_19_092842_create_authortbls_table', 4),
(42, '2022_05_29_072619_create_shoppingcarttbls_table', 4),
(33, '2022_06_05_132846_create_addresstbls_table', 2),
(34, '2022_06_05_140403_create_addresstbls_table', 3),
(43, '2022_06_05_142958_create_addresstbls_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcarttbls`
--

DROP TABLE IF EXISTS `shoppingcarttbls`;
CREATE TABLE IF NOT EXISTS `shoppingcarttbls` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shoppingcarttbls_bookid_foreign` (`bookid`),
  KEY `shoppingcarttbls_userid_foreign` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date` date NOT NULL DEFAULT '2022-06-16',
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `phone`, `country`, `city`, `password`, `Date`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '03002186506', 'pakistan', 'karachi', '$2y$10$kv7u/lIt1kiWVQLwpVKjYeZwNyc9Wu52eBtrOUIJiucFmBgULZnt.', '2022-06-16', 1, NULL, '2022-06-16 12:50:57', '2022-06-16 12:50:57'),
(2, 'talha', 'talha@aptechgdn.net', NULL, '03002186506', 'Pakistan', 'Karachi', '$2y$10$gI/x3/.FPerL2HW9oCXt3eoKofWZWFZ2TZP8eCcYpveKgyJzdLB6G', '2022-06-16', 0, NULL, '2022-06-17 15:06:40', '2022-06-17 15:06:40'),
(3, 'Zain', 'zain@gmail.com', NULL, '03222047720', 'Pakistan', 'Lahore', '$2y$10$bgcdvpvLCSGURleOc19VIOfSusKOD0JL0buh7cY3UtjBOOYCCKNuu', '2022-06-16', 0, NULL, '2022-06-17 16:31:36', '2022-06-17 16:31:36'),
(4, 'Maham', 'maham@gmail.com', NULL, '03123569811', 'Pakistan', 'Islamabad', '$2y$10$8oQ3bUXbyv85dvh0EpjXn.gBP1jlLT97gAq45p4hWr2slahzSnLQO', '2022-06-16', 0, NULL, '2022-06-17 16:52:55', '2022-06-17 16:52:55');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
