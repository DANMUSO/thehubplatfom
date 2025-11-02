-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 02, 2025 at 06:25 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
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
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `queue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `business_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','pending','draft') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `locations_user_id_index` (`user_id`),
  KEY `locations_status_index` (`status`),
  KEY `locations_latitude_longitude_index` (`latitude`,`longitude`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `user_id`, `business_name`, `latitude`, `longitude`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, 'CEREALS PLATFORM', -1.20849100, 36.89662300, 'GREATE', 'active', '2025-10-22 00:55:04', '2025-10-22 00:59:45'),
(2, 2, 'House of Cars', -1.29440000, 36.79722800, 'GREAT', 'active', '2025-10-22 00:52:02', '2025-10-22 00:54:30'),
(4, 2, 'TheHub', -1.10100400, 37.01134000, 'CLASSIFIED ADS', 'active', '2025-10-22 00:58:32', '2025-10-22 00:58:51'),
(7, 3, 'Laptop Supplier', -1.28189500, 36.82264000, 'Maktop Technologies Ltd is a leading supplier and distributor of high-quality laptops and IT accessories across East Africa. Established in 2017, Maktop has built a strong reputation for reliability, affordability, and exceptional customer service.\r\n\r\nThe company partners with globally recognized brands such as HP, Dell, Lenovo, Acer, and Apple, ensuring genuine products with full manufacturer warranties. Maktop serves a diverse clientele — including corporates, learning institutions, government departments, and individual consumers — offering both retail and bulk supply options.', 'active', '2025-10-27 23:51:16', '2025-10-27 23:51:16'),
(6, 2, 'IT Services', -1.29620200, 36.79220600, NULL, 'pending', '2025-10-24 15:20:26', '2025-10-24 15:37:48'),
(8, 2, 'TheHub Juja', -1.23685400, 36.91997500, 'DescriptionDescriptionDescriptionDescriptionDescription', 'active', '2025-11-01 07:08:21', '2025-11-01 07:08:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_20_091909_add_social_fields_to_users_table', 1),
(5, '2025_09_20_102814_update_avatar_column_to_text', 1),
(6, '2025_10_01_040618_create_posts_table', 1),
(7, '2025_10_02_082503_create_payments_table', 1),
(8, '2025_10_03_080801_add_phone_to_users_table', 1),
(9, '2025_10_20_061908_create_pricing_tables', 1),
(10, '2025_10_22_035019_create_locations_table', 2),
(11, '2025_10_25_032105_add_location_id_to_posts_table', 3),
(12, '2025_10_26_111452_remove_location_column_from_posts_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('vehicles','realestate','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` enum('free','basic','premium','business') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_cycle` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpesa_checkout_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mpesa_receipt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `metadata` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`),
  KEY `payments_user_id_status_index` (`user_id`,`status`),
  KEY `payments_transaction_id_index` (`transaction_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `county` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','active','pending','expired') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `views` int NOT NULL DEFAULT '0',
  `inquiries` int NOT NULL DEFAULT '0',
  `photos` json DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `location_id` bigint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_location_id_foreign` (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `price`, `county`, `description`, `status`, `featured`, `views`, `inquiries`, `photos`, `user_id`, `created_at`, `updated_at`, `location_id`) VALUES
(2, '2021 Volvo XC60 AWD R Design Sunroof', 'vehicles', 6890000.00, 'Nairobi', '🔥 2021 VOLVO XC60 B6 AWD R Design 🔥 Panoramic Sunroof/ Low Mileage 44K Kms\r\n\r\nSpecs\r\n2000cc Petrol :: Automatic :: Premium Infotainment System :: Apple CarPlay & Android Auto :: 360 Degres Camera :: Memory Heated & Cooled Leather Seats :: Daytime Running Lights :: Steering Wheel Control :: Anti-Collision Assist :: Lane Keep Assist :: Electric Tailgate :: Proximity Parking Sensors :: R-Design Alloy Wheels :: Blindspot Monitoring :: Dual Exhausts :: Fog Lights :: Cruise Control :: Volvo Safety System :: Harman Kardon Speaker :: Low Mileage 44K Kms✨\r\n\r\nWITH LOTS MORE FEATURES ⚓\r\n\r\n💰 Price :: Ksh. 6,890,000/=\r\n\r\n💰Cash 🤝 OR 👇\r\n\r\n🔥Lipa Polepole🔥\r\n\r\n1. 🏦Bank Finance; Deposit 30%, Pay Balance in 5 Yrs\r\n\r\n2. 💵 Hire Purchase; Deposit 50%, Pay Balance in 2 Yrs\r\n\r\n🚘Trade in Accepted 🚗\r\n\r\n🛳We Import On Behalf ♎️', 'active', 1, 8, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-4_1761469835_68fde58b5792b.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-3_1761469836_68fde58c06622.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-10_1761469831_68fde5872a0bf.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-8_1761469832_68fde58826c3f.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-7_1761469833_68fde5890b419.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-6_1761469833_68fde589dd61a.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-5_1761469834_68fde58a9b3cb.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-2_1761469836_68fde58cb5b62.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2021-Volvo-XC60-AWD-1_1761469837_68fde58d93c17.webp\"]', 2, '2025-10-26 06:10:38', '2025-10-29 01:32:24', 2),
(7, '2018 Mazda CX-8 AWD Fully Loaded Lea', 'vehicles', 3900000.00, 'Embu', '🔥2018 MAZDA CX-8 Diesel🔥\r\nAWD/ Leather/ Fully Loaded\r\n\r\nSpecs\r\n2200cc Diesel :: Automatic :: 360 degrees Camera :: Steering Controls :: Premium Leather Heated Front & Rear Seats :: Multi Zone AC Controls :: Electric Memory Seats :: Front & Rear Armrest :: Power Boot :: Premium Sound System :: Heads Up Display :: Cruise Control :: Parking Sensors :: Back Camera :: Dual Exhausts :: Alloy Rims :: Daytime Running Lights :: Fog Lights :: Traction Control :: Lane Assist :: I-Stop Feature :: Rear Infotainment Screen ::\r\n\r\nWITH LOTS MORE FEATURES ⚓\r\n\r\nPrice :: Kshs 3,900,000/=\r\n\r\n💰Cash 🤝 OR 👇\r\n\r\n🔥LipaPolePole🔥\r\n\r\n1. 🏦Bank Finance; Deposit 30%, Pay Balance in 5 Yrs\r\n\r\n2. 💵Micro Finance; Deposit 50%, Pay Balance in 2 Yrs\r\n\r\n🚘Trade in Accepted\r\n\r\n🛳We import on behalf⚓️', 'active', 1, 10, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-3_1761470895_68fde9afa1a6f.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-2_1761470896_68fde9b06c995.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-7_1761470891_68fde9abca76e.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-6_1761470892_68fde9acdf62a.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-5_1761470893_68fde9ade6c03.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-4_1761470895_68fde9af03af9.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-3_1761470895_68fde9afa1a6f.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-2_1761470896_68fde9b06c995.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Mazda-CX-8-AWD-1_1761470897_68fde9b13e59c.webp\"]', 2, '2025-10-26 06:28:18', '2025-10-30 23:37:18', 2),
(6, '2018 BMW X3 xDrive20d MSport', 'vehicles', 4750000.00, 'Kabete, Kiambu', '🔥2018 MAZDA CX-8 Diesel🔥\r\nAWD/ Leather/ Fully Loaded\r\n\r\nSpecs\r\n2200cc Diesel :: Automatic :: 360 degrees Camera :: Steering Controls :: Premium Leather Heated Front & Rear Seats :: Multi Zone AC Controls :: Electric Memory Seats :: Front & Rear Armrest :: Power Boot :: Premium Sound System :: Heads Up Display :: Cruise Control :: Parking Sensors :: Back Camera :: Dual Exhausts :: Alloy Rims :: Daytime Running Lights :: Fog Lights :: Traction Control :: Lane Assist :: I-Stop Feature :: Rear Infotainment Screen ::\r\n\r\nWITH LOTS MORE FEATURES ⚓\r\n\r\nPrice :: Kshs 3,900,000/=\r\n\r\n💰Cash 🤝 OR 👇\r\n\r\n🔥LipaPolePole🔥\r\n\r\n1. 🏦Bank Finance; Deposit 30%, Pay Balance in 5 Yrs\r\n\r\n2. 💵Micro Finance; Deposit 50%, Pay Balance in 2 Yrs\r\n\r\n🚘Trade in Accepted\r\n\r\n🛳We import on behalf⚓️', 'active', 1, 43, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-3_1761471439_68fdebcf63f31.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-2_1761471440_68fdebd010f59.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-8_1761471435_68fdebcb338a5.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-7_1761471436_68fdebcc677b0.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-6_1761471437_68fdebcd225c7.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-5_1761471438_68fdebce0efcd.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-4_1761471438_68fdebceba8b5.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-BMW-X3-xDrive20d-1_1761471440_68fdebd0b35e5.webp\"]', 2, '2025-10-26 06:26:56', '2025-10-26 23:29:53', 2),
(8, '2018 Nissan Note', 'vehicles', 1240000.00, ', Kiambu', '🔥2018 NISSAN NOTE 🔥\r\n\r\nSpecs\r\n1200cc Engine :: Automatic Transmission :: Keyless Push to Start :: Eco-Mode :: Traction Control :: Idling Stop In Traffic :: Anti Collision Assist :: Lane Keep Assist :: Back Camera :: Parking Proximity Sensors :: Premium Fabric Interior :: 360° Camera :: Steering Controls :: Premium Fabric Interior :: AM/FM Radio :: Daytime Running Lights :: Low Mileage 73K\r\n\r\nWITH LOTS MORE FEATURES ⚓\r\n\r\n💰Price :: Ksh. 1,240,000/=\r\n\r\n💰Cash 🤝 OR 👇\r\n\r\n🔥Lipa Polepole🔥\r\n\r\n1. 🏦Bank Finance; Deposit 30%, Pay Balance in 5 Yrs\r\n\r\n2. 💵 Hire Purchase; Deposit 50%, Pay Balance in 2 Yrs\r\n\r\n🚘Trade in Accepted 🚗\r\n\r\n🛳We Import On Behalf ♎️', 'draft', 1, 3, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-5_1761470966_68fde9f6461a5.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-4_1761470967_68fde9f702489.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-3_1761470968_68fde9f819632.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-2_1761470968_68fde9f8d8ee9.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-9_1761470961_68fde9f178763.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-8_1761470963_68fde9f3d7846.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-7_1761470964_68fde9f4a60e7.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-6_1761470965_68fde9f591243.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/2018-Nissan-Note-1_1761470969_68fde9f98a962.webp\"]', 2, '2025-10-26 06:29:30', '2025-10-28 23:47:04', 2),
(10, 'HP EliteBook 830 G7 x360 Intel Core i5 10th Gen Processor 16GB RAM 512GB 13.3', 'electronics', 200000.00, ', Nairobi', 'Product Overview:\r\n\r\nExperience unparalleled versatility and performance with the HP EliteBook x360 830 G7, a cutting-edge 2-in-1 laptop designed to empower your productivity and creativity. Powered by the 8th Gen Intel Core i5-8365U processor, this laptop delivers robust performance for demanding tasks. With 16GB of DDR4 SDRAM, multitasking is seamless, allowing you to switch between applications effortlessly.\r\n\r\nVivid Full HD Touchscreen:\r\n\r\nThe HP EliteBook x360 830 G7 features a stunning 13.3\" Full HD IPS touchscreen display that offers vibrant colors and sharp details. Whether you\'re editing photos, watching videos, or giving presentations, the touchscreen functionality enhances your interaction and productivity. The integrated Intel UHD Graphics 620 ensures smooth visuals and supports light gaming and multimedia tasks.\r\n\r\nDesigned for Connectivity and Mobility:\r\n\r\nEquipped with a speedy 256GB PCIe SSD, the EliteBook x360 830 G7 provides ample storage for your files and applications while offering faster boot-up times and data access. Stay connected with advanced networking options including Bluetooth and Wi-Fi, ensuring seamless connectivity whether you\'re in the office or on the go.\r\n\r\nPremium Audio and Security Features:\r\n\r\nImmerse yourself in superior audio quality with Bang & Olufsen speakers, delivering rich sound for your entertainment and conference calls. The laptop also features a built-in webcam and microphone for video conferencing and collaboration.\r\n\r\nReliability and Warranty:\r\n\r\nEnjoy peace of mind with the included 6 months warranty, ensuring your investment is protected. The HP EliteBook x360 830 G7 is designed for durability and reliability, making it an ideal choice for professionals who require performance and versatility in a sleek and portable design.\r\n\r\nGeneral Specifications\r\n\r\n8th Gen Intel Core i5-8365U Processor\r\n16GB DDR4 SDRAM\r\n256GB PCIe SSD Storage\r\n13.3\" Full HD IPS Touchscreen Display\r\nIntel UHD Graphics 620\r\nBluetooth, Webcam, Wi-Fi\r\nFreeDOS Operating System\r\nAudio by Bang & Olufsen\r\n6 Months Warranty', 'active', 1, 3, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/3/s-l1200_1761620218_690030fa7d063.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/3/71yOtlZ9lzL_1761620219_690030fbea633.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/3/Touchscreen-Display-4_1761620220_690030fcb2b97.webp\"]', 3, '2025-10-27 23:57:01', '2025-10-30 23:38:29', 7),
(12, 'Modern 2-Bedroom Apartments for Sale in Kilimani off Argwings Kodhek Road', 'real-estate', 9100000.00, 'Mnarani, Kilifi', 'Harbour 2 Bedroom apartment for sale in Kilimani Options\r\nChoose from a variety of spacious 2-bedroom layouts, all offering natural lighting, open-plan living spaces, and high-end finishes.\r\n\r\n2 Bedroom, 1 En-suite (87 sqm) – From Ksh 9.1M Sold out\r\n2 Bedroom, 2 En-suite (103 sqm) – From Ksh 10.5M Sold Out\r\n2 Bedroom, 1 En-suite (105 sqm) – From Ksh 10.8M Sold out\r\n2 Bedroom, 2 En-suite (108 sqm) – From Ksh 11.1M\r\n2 Bedroom, 1 En-suite (111 sqm) – From Ksh 11.3M\r\nFlexible payment plans available – only 20% deposit required, with the balance payable in installments until completion.\r\n\r\nPrime Kilimani Location\r\nLive close to everything you need:\r\n\r\n International Schools: Braeburn, Cavina, Riara, and Makini\r\n Top Hospitals: Nairobi Women’s Hospital, Coptic, Nairobi Hospital\r\n Shopping Malls: Yaya Centre, Prestige Plaza, Junction Mall\r\n Restaurants & Cafes: Artcaffe, Java House, About Thyme, Cedars\r\n Business Hubs: CBD, Upper Hill, and Westlands within easy reach', 'active', 1, 3, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/living-room-1080x785 (1)_1761976731_6905a19bd787e.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/dining-1080x785_1761976734_6905a19e161a9.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/living-room-1080x785_1761976735_6905a19f8eb63.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/bathroom-1080x785_1761976736_6905a1a0ef4d8.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/alina-harbour3_1761976737_6905a1a1c1f7b.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/bedroom3-1080x785_1761976739_6905a1a377b69.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/dining2-Copy_1761976740_6905a1a449984.webp\"]', 2, '2025-11-01 02:59:00', '2025-11-01 03:15:30', 4),
(13, 'LUMINARA APARTMENTS FOR SALE IN WESTLANDS', 'real-estate', 6830000.00, 'Ngong Hills, Kajiado', 'Unit Types & Payment Plans\r\nBelow is a detailed breakdown of the available units, their sizes and launch pricing (for 100% payment); alternative payment plan pricing is also indicated where available.\r\n\r\nNote: All prices are indicative launch pricing and subject to change. Please confirm availability, payment schedules, and final terms with Azipa Real Estate.\r\n\r\n1-Bedroom (Compact) – approx. 56 sqm\r\n100% Payment: KES 6,830,000 (from) \r\nAlternative Payment Plans:\r\n20% deposit: ~ KES 7,420,000\r\n50% deposit: ~ KES 7,220,000 \r\nThis unit is ideal for single professionals or investors looking for strong rental yield in central Westlands.\r\n1-Bedroom (Premium) – approx. 65 sqm\r\n100% Payment: KES 7,230,000 (from) \r\nAlternative Payment Plans:\r\n20% deposit: ~ KES 7,820,000\r\n50% deposit: ~ KES 7,620,000 \r\nA slightly larger layout, offering added flexibility and premium specification.\r\n1-Bedroom (Luxury) – approx. 82 sqm\r\n100% Payment: KES 8,230,000 (from) \r\nAlternative Payment Plans:\r\n20% deposit: ~ KES 8,820,000\r\n50% deposit: ~ KES 8,620,000\r\nSuited to buyers wanting more spacious living or seeking higher-grade finishes and views.\r\n2 Bedroom (Luxury) – approx. 113 sqm\r\n100% Payment: KES 11,230,000 (from) \r\nAlternative Payment Plans:\r\n20% deposit: ~ KES 11,820,000\r\n50% deposit: ~ KES 11,620,000 \r\nDesigned for couples, small families or investors seeking premium two-bedroom apartments for sale in Westlands and the surrounding corridor — along Mogotio Road, near GTC and Parklands.', 'active', 1, 0, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Luminara-Apartments-external-1170x785_1761977297_6905a3d1985f6.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Luminara-Apartments-bar-1170x785_1761977299_6905a3d3026bf.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Luminara-Apartments-exterior-984x785_1761977300_6905a3d4174cc.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Luminara-Apartments-bedr-1170x785_1761977300_6905a3d4e6944.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Luminara-Apartments-entrance-1170x533_1761977301_6905a3d5c0506.webp\"]', 2, '2025-11-01 03:08:22', '2025-11-01 03:08:22', 4),
(14, 'Capital Garden Apartments for Sale in Kilimani, Nairobi', 'real-estate', 6800000.00, 'Inoi, Kirinyaga', 'Capital Garden apartments ;Available Units & Prices\r\nWhether you’re a first-time homebuyer, an investor, or a growing family, there’s a perfect space for you:\r\n\r\n1 Bedroom Apartments for Sale in Kilimani\r\n\r\n68 sqm – Kes. 7.15M\r\n71 sqm – Kes. 7.45M\r\n1 Bedroom + Study (78 sqm) – Kes. 8.2M\r\n2 Bedroom Apartments for Sale in Kilimani (All Master En-suite)\r\n\r\n94 sqm – Kes. 10.3 M\r\n96 sqm – Kes. 10.5 M\r\n100 sqm – Kes. 11 M\r\n102 sqm – Kes. 11.5 M\r\n3 Bedroom Apartments for Sale in Kilimani\r\n\r\n135 sqm (Master En-suite) – Kes. 14.15M\r\n173 sqm (2 En-suite + DSQ) – Kes. 18.6M\r\nKey Features & Amenities at Capital Garden apartments\r\nLive in a space where design meets lifestyle:\r\n Fully Equipped Gym with Skyline Views\r\n Swimming Pool for Adults and Kids\r\n Children’s Outdoor Play Area\r\n Relaxing Sauna for Wellness\r\n High-Speed Elevators (x3)\r\n Modern Lobby & Reception Area\r\n Ample Basement and Surface Parking\r\n Rooftop Entertainment Terrace with Breathtaking Views\r\n 24/7 Solar & Electric High-Pressure Water Supply\r\n European Standard Kitchens with Modern Finishes\r\n CCTV Surveillance, Intercom & Access Control Systems\r\n Backup Generator for Common Areas & Apartments\r\n Electric Fencing & 24hr Manned Security Gate\r\nPrime Location – At the Heart of Kilimani\r\nEnjoy unparalleled access to top Nairobi institutions and amenities:\r\n\r\nYaya Centre – 5 mins\r\nAdams Arcade – 6 mins\r\nPrestige Plaza – 7 mins\r\nNairobi Hospital & Aga Khan University Hospital\r\nMakini School, Cavina School & St. Nicholas\r\nInternational Schools nearby (Braeburn, French School, Riara Group)\r\nUN Offices & Westlands – 15 to 20 mins drive', 'active', 1, 1, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/mst-1170x785_1761977587_6905a4f3cc555.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/living-area-2-1170x785_1761977589_6905a4f5672fc.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/kitchen-shelves-1170x785_1761977590_6905a4f64e067.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/dinning-2-1170x785_1761977591_6905a4f708e6b.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/cooker-electric-1170x785_1761977592_6905a4f824cc2.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/beds-3-1170x785_1761977593_6905a4f915d50.webp\"]', 2, '2025-11-01 03:13:14', '2025-11-01 03:49:29', 4),
(15, 'Apple iPhone 17', 'phones', 167000.00, 'Kileleshwa, Nairobi', 'Unique Selling Points\r\nA19 Bionic Chip (3nm): Delivers unmatched speed, energy efficiency, and AI processing power. Ideal for multitasking, gaming, and pro-level workflows.\r\nSuper Retina XDR OLED Display (6.3-inch, 120Hz): Ultra-bright 3000 nits peak brightness with ProMotion for buttery-smooth visuals. Perfect for outdoor use and immersive content.\r\nAdvanced Dual 48MP Camera System: Features Deep Fusion, Photonic Engine, and Dolby Vision HDR. Captures stunning detail, even in low light.\r\nApple Intelligence Integration: Smart suggestions, real-time enhancements, and personalized automation powered by the Neural Engine.\r\nCenter Stage Front Camera (18MP): Keeps you perfectly framed during video calls and group selfies. Ideal for content creators and professionals.\r\nSpatial Photos & Cinematic Recording: Next-gen imaging features for immersive storytelling and pro-grade video production.\r\nPremium Build with Ceramic Shield 2: Stronger, sleeker, and more resistant to drops and scratches. IP68 rating ensures durability in all conditions.\r\nUSB-C Fast Charging + All-Day Battery (3700mAh): Charges faster, lasts longer. Stay powered through work, play, and travel.\r\niOS 18 with Enhanced Privacy & Productivity Tools: Seamless ecosystem integration, smarter widgets, and improved app control.\r\nColor Options That Pop: Choose from Mist Blue, Sage, Lavender, Black, or White—each crafted to reflect your style.', 'active', 1, 0, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/61WYeXatWNL._UF10001000_QL80_-800x800_1761980431_6905b00f13695.jpg\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/61vNxSF6qeL._UF10001000_QL80__1761980432_6905b01044072.jpg\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/61Da45h7jCL._UF10001000_QL80__1761980432_6905b010ec693.jpg\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/61FsQM3y5yL._UF10001000_QL80_ (1)_1761980433_6905b0119ca30.jpg\"]', 2, '2025-11-01 04:00:34', '2025-11-01 04:00:34', 4),
(16, 'Apple iPhone 13 Pro 256GB (Lipa pole pole)', 'phones', 65000.00, 'Kiamutugu, Kirinyaga', 'Pros of the Apple iPhone 13 Pro\r\nApple iPhone 13 Pro 128GB Price in Kenya - Phones & Tablets Kenya\r\n\r\nExceptional camera performance: The advanced camera system captures stunning images in various lighting conditions, making it perfect for photography lovers.\r\nFast and efficient A15 Bionic chip: This chip ensures that the iPhone 13 Pro runs smoothly, handling demanding applications and multitasking with ease.\r\nStunning Super Retina XDR display: The high-quality display enhances the visual experience, whether you’re watching movies or playing games.\r\nLonger battery life: Users can enjoy extended usage without worrying about frequent charging.\r\n5G connectivity: The iPhone 13 Pro supports 5G networks, providing faster download and streaming speeds.', 'active', 1, 1, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Apple_iPhone-13-Pro_Colors_09142021_big.jpg.slideshow-large_2x_1761980583_6905b0a7a70ae.jpg\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Apple-iPhone-13-Pro-b_1761980586_6905b0aa42e21.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Apple-iPhone-13-Pro-d_1761980587_6905b0ab06641.webp\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/Apple-iPhone-13-Pro_1761980587_6905b0abb58cd.webp\"]', 2, '2025-11-01 04:03:08', '2025-11-01 04:03:27', 4),
(17, 'TCL 65V6C ,65\" Inch Smart Google TV, 4K UHD HDR, Frameless Design-2025 MODEL (1YR WRTY)', 'electronics', 70890.00, 'Enkare Narok, Kajiado', 'Key Features:\r\n\r\n4K Ultra HD Resolution: Experience sharp and detailed visuals with a resolution of 3840 x 2160 pixels, bringing lifelike clarity to your favorite content. ​\r\n\r\nHigh Dynamic Range (HDR): Supports multiple HDR formats, including HDR10, HLG, HDR10+, and Dolby Vision, ensuring vibrant colors and enhanced contrast for a more realistic picture.\r\n\r\nAiPQ Processor: Utilizes TCL’s AiPQ Engine to optimize color, contrast, and clarity in real-time, delivering an enhanced viewing experience.\r\n\r\nMotion Clarity: Reduces motion blur, providing smooth and clear visuals during fast-paced action scenes.\r\n\r\nGame Master: Features HDMI 2.1 with Auto Low Latency Mode (ALLM) and Variable Refresh Rate (VRR), ensuring responsive gameplay with reduced input lag.\r\n\r\nDolby Atmos: Provides immersive audio quality, delivering multidimensional sound that enhances your entertainment experience. ​\r\n\r\nGoogle TV: Offers a personalized and intuitive interface, integrating movies, shows, live TV, and more from your apps and subscriptions.\r\n\r\nVoice Control: Compatible with Google Assistant and Alexa, allowing for hands-free operation and easy access to content.', 'active', 1, 2, 0, '[\"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/TCL3_1761980891_6905b1db3c248.jpg\", \"https://thehubplatform.s3.eu-central-1.amazonaws.com/posts/2/TCL1_1761980893_6905b1dda1def.jpg\"]', 2, '2025-11-01 04:08:14', '2025-11-01 07:27:41', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pricing_plans`
--

DROP TABLE IF EXISTS `pricing_plans`;
CREATE TABLE IF NOT EXISTS `pricing_plans` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `monthly_price` decimal(8,2) NOT NULL,
  `yearly_price` decimal(8,2) NOT NULL,
  `features` json NOT NULL,
  `ads_limit` int DEFAULT NULL,
  `photos_limit` int NOT NULL,
  `listing_days` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pricing_plans_category_plan_type_unique` (`category`,`plan_type`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_plans`
--

INSERT INTO `pricing_plans` (`id`, `category`, `plan_type`, `name`, `description`, `monthly_price`, `yearly_price`, `features`, `ads_limit`, `photos_limit`, `listing_days`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'vehicles', 'free', 'Basic Listing', 'Perfect for selling personal vehicles', 0.00, 0.00, '[\"3 ads/month\", \"5 photos\", \"30 days\"]', 3, 5, 30, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(2, 'vehicles', 'basic', 'Enhanced Visibility', 'Get more views for your vehicles', 149.00, 1430.00, '[\"10 ads/month\", \"15 photos\", \"45 days\", \"Priority\"]', 10, 15, 45, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(3, 'vehicles', 'premium', 'Featured Vehicles', 'Maximum exposure for dealers', 299.00, 2870.00, '[\"Unlimited ads\", \"25 photos\", \"60 days\", \"Featured\"]', NULL, 25, 60, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(4, 'realestate', 'free', 'Basic Listing', 'Perfect for individual property owners', 0.00, 0.00, '[\"2 ads/month\", \"8 photos\", \"45 days\"]', 2, 8, 45, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(5, 'realestate', 'basic', 'Enhanced Visibility', 'Ideal for landlords & sellers', 199.00, 1910.00, '[\"8 ads/month\", \"20 photos\", \"60 days\", \"Priority\"]', 8, 20, 60, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(6, 'realestate', 'premium', 'Agent & Developer', 'Maximum exposure for professionals', 499.00, 4790.00, '[\"Unlimited ads\", \"30 photos\", \"90 days\", \"Featured\"]', NULL, 30, 90, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(7, 'others', 'free', 'Basic Listing', 'Perfect for getting started', 0.00, 0.00, '[\"5 ads/month\", \"5 photos\", \"30 days\"]', 5, 5, 30, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(8, 'others', 'basic', 'Enhanced Visibility', 'Get more views with priority listing', 99.00, 950.00, '[\"15 ads/month\", \"10 photos\", \"45 days\"]', 15, 10, 45, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(9, 'others', 'premium', 'Featured Ad Posting', 'Stand out with featured placement', 199.00, 1910.00, '[\"Unlimited ads\", \"15 photos\", \"60 days\", \"Featured\"]', NULL, 15, 60, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38'),
(10, 'others', 'business', 'Enterprise Solution', 'Maximum exposure for your business', 399.00, 3830.00, '[\"Unlimited ads\", \"20 photos\", \"90 days\", \"Premium\"]', NULL, 20, 90, 1, '2025-10-20 03:46:38', '2025-10-20 03:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1SkOojq7Ue1JIt1X51CJvGmMfthMOsi02z5MGyId', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicDR5WEE0QXV1SmFhV3NwUFhGUWhldk1hekYyMTdOQUtQWTcyc1AyQiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hdXRoL2dvb2dsZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToic3RhdGUiO3M6NDA6Ilpic0pUYXZvMDJQaHVZTXFzYkJlWUdXQzhhWFo3d3FLeWdLQUI4T2ciO30=', 1761975193),
('pIRbItGlGhX6TiImbq5LltkVjQoAc5iakvdFI4mg', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2RRZ1Bvajh3TVBFaVo1NDNqd1E3SVBZOVY1RG1aTllFNlhpa2hoQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wb3N0cy9zdGF0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1761992841),
('Hq1nJs8J5Ka1Roe3NVEfR6SbBmY1UKowO9Fctbaj', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnZaMTJSaWppNHFwWEJ6ZDNNV0NXVWVLcW5raXZRU09iQ3R2MFV4VSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1762106445),
('SA944lO4udpEYR50hxQzFwaMvi1owgoal0oHHy7p', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnMxR1RnRTZlVzFUU1FxVzB5M09TR0gwUW9vdlZ6djJOcDlNYmlGbyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0LzE3Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1761992861),
('Fxzl45FJVec44A3kFdrwbJUJAqf34VVOaUvO3a65', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYTQzam5NaEJrZmNOdm4za0NvdkxpMHhxNElXYnZIMFZDa1RGRmxjeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToic3RhdGUiO3M6NDA6IjVDVXJjVXJqd1czeElRVVF2WXZ2dHJFcFdQbWV2dWVUd20xQWJkRkwiO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYXB2aWV3Ijt9fQ==', 1761880815),
('yufWXgdAbMNpyiL3DCNqG1TH1RKZsajWnI2hZRpB', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQkR5SE9mMGpDeUFNM3llajdTb3hubHBHRkdUNFVqd0dyQ1BST3hRQyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wb3N0cy9zdGF0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1761879221);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED DEFAULT NULL,
  `category` enum('vehicles','realestate','others') COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_type` enum('free','basic','premium','business') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_cycle` enum('monthly','yearly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `started_at` timestamp NOT NULL,
  `expires_at` timestamp NOT NULL,
  `cancelled_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subscriptions_payment_id_foreign` (`payment_id`),
  KEY `subscriptions_user_id_is_active_index` (`user_id`,`is_active`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_phone_index` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `phone_verified_at`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `provider`, `provider_id`, `avatar`) VALUES
(1, 'Test User', 'test@example.com', NULL, NULL, '2025-10-20 03:42:55', '$2y$12$znfwbd/IWmwWFe0kVTFEg.yGH/NYmmcKZYxWrTwm.zvaMT4UIOJFi', 'i95fW5kZ5Y', '2025-10-20 03:42:55', '2025-10-20 03:42:55', NULL, NULL, NULL),
(2, 'Daniel Kimani (Web and Mobile Developer)', 'kimdan2030@gmail.com', '+254703894372', '2025-10-29 01:13:01', NULL, '$2y$12$gAZakTOIDOukJdz4xgD3/uerUCJTRnaTNrjcCqYZNrqjNXYzy8pnW', NULL, '2025-10-20 03:43:46', '2025-10-29 01:13:01', 'google', '113397761188755363997', 'https://lh3.googleusercontent.com/a/ACg8ocIsf0DQSIeAChSY99emvXjk46X_4jMlzNw9UWAfP0kD30FZ4BRt=s96-c'),
(3, 'DAN KIM', 'keemdan345@gmail.com', NULL, NULL, NULL, '$2y$12$UDmZTBxp2u/.bcb8OkKV8eHicQrue7y.F36BoyEvc5qA0aMIVcDUa', NULL, '2025-10-27 23:46:14', '2025-10-27 23:46:14', 'google', '104480671064217566356', 'https://lh3.googleusercontent.com/a/ACg8ocKRpQpfBN6Xpxp2ZFo-OVptJrCCEVQLOve9aLsRN1O9R6X5dbwV=s96-c'),
(4, 'Alex Gachie', 'gachiealex918@gmail.com', NULL, NULL, NULL, '$2y$12$X30svX5kY3wa522YfnN8meliKBcwdvtgvLzZzMhBiZRlSqkM13JEG', NULL, '2025-10-30 23:39:26', '2025-10-30 23:39:26', 'google', '113647820641254178649', 'https://lh3.googleusercontent.com/a/ACg8ocLtziFE4pPJR4e7hy1PkYYDYCxGNgIwBBs-IuzzLVd80_cajg=s96-c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
