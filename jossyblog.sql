-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2023 at 02:10 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jossyblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `about` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `fullname`, `profile`, `about`, `phone`, `profile_image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 'profile.png', NULL, '08101518298', NULL, 'admin@gmail.com', NULL, '$2y$10$v63hqWvfnpcepr0cYkpj/.9/Xnu266KGHW4aKsWp2qZ9BCHCFCV0e', NULL, '2023-08-10 10:37:42', '2023-08-27 12:43:44'),
(2, 'Duru Chigemezu', 'profile.png', NULL, '08101518298', NULL, 'duruchigemez99u@gmail.com', NULL, '$2y$10$hH8fInR/7.vu8TnzP/VS6.qUWRjjbyYiUAnTBgLlbLVXyma7WmPku', NULL, '2023-08-26 11:18:50', '2023-08-26 11:18:50'),
(4, 'Duru Chigemezu', 'profile.png', NULL, '08101518298', NULL, 'duruchigemezu@gmail.com', NULL, '$2y$10$JDYJqm9WTrG00qBL3tRNtuoxCiLawN0qpq1KXWDhWaek/vIxMgLMS', NULL, '2023-08-26 11:25:10', '2023-08-26 11:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE IF NOT EXISTS `advertisements` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `position` enum('header','body','right','footer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `title`, `admin_id`, `content`, `banner`, `start_date`, `end_date`, `is_active`, `position`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'how', 1, 'hjggjh', 'FKjXAlxF1SZ4ApPpmCyh.jpg', '2023-08-19 00:00:00', '2023-08-25 00:00:00', 1, 'body', 0, '2023-08-16 20:21:20', '2023-08-16 20:21:20'),
(3, 'Jumia', 1, 'Advert from Jumia', 'AXa5uXu2eJBNTaetCRjo.jpg', '2023-08-10 00:00:00', '2023-08-18 00:00:00', 1, 'footer', 0, '2023-08-27 09:15:15', '2023-08-27 09:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `v_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `audio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','declined') COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `trending` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_views` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `admin_id`, `category_id`, `name`, `slug`, `image`, `other_image`, `video`, `v_status`, `audio`, `status`, `slide`, `trending`, `body`, `total_views`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Duru Chigemezu', 'duru-chigemezu', 'LK8nBCVNwijc6WCx8ujB.jpg', NULL, NULL, '0', NULL, 'approved', '0', '0', '', 1, '2023-08-09 10:10:06', '2023-08-26 16:33:44'),
(7, 1, 1, 'War in Ghana', 'war-in-ghana', 'kL6iqKNVoHaL0pYN2G0H.jpg', NULL, NULL, '0', NULL, 'approved', '0', '1', '<div>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</div><div><br></div><h4 class=\"mb_head\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px 0px 10px; border: 0px; outline: 0px; font-weight: 600; font-size: 18px; font-family: Poppins, sans-serif; vertical-align: baseline; color: rgb(41, 41, 41);\">Middle Post Heading</h4><div>Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus at leo dignissim congue. Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor . Aliquam et elit eu nunc rhoncus viverra quis at felis. Sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla purus Lorem ipsum dosectetur adipisicing elit at leo dignissim congue. Mauris elementum accumsan leo vel tempor</div>', 1, '2023-08-16 13:46:14', '2023-08-26 17:16:58'),
(8, 1, 1, 'War in Ghana', 'diamond', 'pjwjhcMGvxx7tHd56sVq.jpg', NULL, NULL, '0', NULL, 'approved', '1', '0', '<div>What is Lorem Ipsum?</div><br />\r\n<br />\r\n<div>Lorem Ipsum is simply dummy text<br />\r\nof the printing and typesetting industry. Lorem Ipsum has been the industry\'s<br />\r\nstandard dummy text ever since the 1500s, when an unknown printer took a galley<br />\r\nof type and scrambled it to make a type specimen book. It has survived not only<br />\r\nfive centuries, but also the leap into electronic typesetting, remaining<br />\r\nessentially unchanged. It was popularised in the 1960s with the release of<br />\r\nLetraset sheets containing Lorem Ipsum passages, and more recently with desktop<br />\r\npublishing software like Aldus PageMaker including versions of Lorem Ipsum.</div><br />\r\n<br />\r\n<div><o:p>&nbsp;</o:p></div><br />\r\n<br />\r\n<div>Why do we use it?</div><br />\r\n<br />\r\n<div>It is a long established fact<br />\r\nthat a reader will be distracted by the readable content of a page when looking<br />\r\nat its layout. The point of using Lorem Ipsum is that it has a more-or-less<br />\r\nnormal distribution of letters, as opposed to using \'Content here, content<br />\r\nhere\', making it look like readable English. Many desktop publishing packages<br />\r\nand web page editors now use Lorem Ipsum as their default model text, and a<br />\r\nsearch for \'lorem ipsum\' will uncover many web sites still in their infancy.<br />\r\nVarious versions have evolved over the years, sometimes by accident, sometimes<br />\r\non purpose (injected humour and the like).</div><br />\r\n<br />\r\n<div><o:p>&nbsp;</o:p></div><br />\r\n<br />\r\n<div>Where does it come from?</div><br />\r\n<br />\r\n<div>Contrary to popular belief,<br />\r\nLorem Ipsum is not simply random text. It has roots in a piece of classical<br />\r\nLatin literature from 45 BC, making it over 2000 years old. Richard McClintock,<br />\r\na Latin professor at Hampden-Sydney College in Virginia, looked up one of the<br />\r\nmore obscure Latin words, consectetur, from a Lorem Ipsum passage, and going<br />\r\nthrough the cites of the word in classical literature, discovered the<br />\r\nundoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of<br />\r\n\"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by<br />\r\nCicero, written in 45 BC. This book is a treatise on the theory of ethics, very<br />\r\npopular during the Renaissance. The first line of Lorem Ipsum, \"Lorem<br />\r\nipsum dolor sit amet..\", comes from a line in section 1.10.32.</div>', 1, '2023-08-16 14:45:01', '2023-08-16 15:17:02'),
(9, 1, 1, 'fxtradegloballtd@gmail.com', 'fxtradegloballtd-at-gmailcom', 'RAWYprBtVUJrCZ4vFl2Y.jpg', NULL, NULL, '0', NULL, 'approved', '0', '0', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></div>', 1, '2023-08-22 14:49:48', '2023-08-27 06:26:30'),
(10, 1, 1, 'Peace Keeping Mission', 'peace-keeping-mission', 'IYqoVyJonJoUCpFT904R.jpg', NULL, '1693054806.mp4', '0', NULL, 'approved', '0', '1', '<font color=\"#7b8898\" face=\"Arial\"><span style=\"font-size: 26px;\"></span></font><span style=\"font-size:16px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.&nbsp;<br>\r\n<br>\r\nUt enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.<br>\r\n<br>\r\n&nbsp;Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est labo</span><span style=\"font-size:14px;\">rum.</span><div><font color=\"#7b8898\" face=\"Arial\"><span style=\"font-size: 26px;\"></span></font><br></div>', 1, '2023-08-26 12:00:06', '2023-08-27 07:33:06'),
(14, 1, 1, 'Peace Keeping Mission', 'peace-keeping-mission', 'o5NXaiyo3dTh5WTuVX5H.jpg', NULL, '1693123503.mp4', '1', NULL, 'approved', '0', '0', '<div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></div><div><br></div><div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div></div>', NULL, '2023-08-27 07:05:03', '2023-08-27 07:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `admin_id`, `name`, `banner`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Educations', '16915835271827387297.jpg', 'educations', 'approved', '2023-08-06 13:02:57', '2023-08-09 11:18:47'),
(2, 1, 'Sport', 'banner', 'sport', 'approved', '2023-08-06 13:06:35', '2023-08-06 13:06:35'),
(5, 1, 'Technology', '1691583471493697981.jpg', 'technology', 'approved', '2023-08-09 11:17:51', '2023-08-09 11:17:51'),
(6, 1, 'News', '16915835001781229971.jpg', 'news', 'approved', '2023-08-09 11:18:20', '2023-08-09 11:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `blog_id`, `name`, `email`, `message`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, 'Duru Chigemezu', 'duruchigemezu@gmail.com', 'how are you', 'profile.png', '2023-08-10 16:42:46', '2023-08-10 16:42:46'),
(2, 2, 'Admin', 'fxtradegloballtd@gmail.com', 'What is all this I don\'t like this post', 'profile.png', '2023-08-11 09:44:48', '2023-08-11 09:44:48'),
(3, 2, 'User', 'webscientist@gmail.com', 'how are you doing', 'profile.png', '2023-08-11 09:46:58', '2023-08-11 09:46:58'),
(4, 10, 'Duru Chigemezu', 'fxtradegloballtd@gmail.com', 'how  is it true', 'profile.png', '2023-08-27 07:06:14', '2023-08-27 07:06:14'),
(5, 10, 'fxtradegloballtd@gmail.com', 'fxtradegloballtd@gmail.com', 'what is that', 'profile.png', '2023-08-27 07:07:35', '2023-08-27 07:07:35');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estatus` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pstatus` enum('pending','approved') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `email`, `estatus`, `phone`, `pstatus`, `created_at`, `updated_at`) VALUES
(2, 'fxtradegloballtd@gmail.com', 'pending', '08101518298', 'approved', '2023-08-08 10:51:29', '2023-08-08 10:51:29'),
(3, 'webscientist@gmail.com', 'approved', '16627711066', 'approved', '2023-08-08 13:15:04', '2023-08-08 13:15:04');

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
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
CREATE TABLE IF NOT EXISTS `general_settings` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `sitename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatstatus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `sitename`, `description`, `logo`, `favicon`, `address`, `copyright`, `chatstatus`, `link`, `footer`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Jossyblog', 'Step into the world of JossyBlog.Com, your go-to destination for inspiration, knowledge, and reliable resources to foster your personal growth and empowerment. At JossyBlog.Com, we are passionate about sharing valuable and inspiring content with our readers. Our mission is to provide a platform where individuals can find information, insights, and inspiration to enhance various aspects of their lives.', '16914220231036219658.png', '1691422023930851529.png', 'ABERDEEN, UNITED KINGDOM', '© JossyBlog 2023 . All rights reserved.', 'Jossyblog limited', '<!--Start of Tawk.to Script-->     <script type=\"text/javascript\">     var Tawk_API = Tawk_API || {},         Tawk_LoadStart = new Date();     (function() {         var s1 = document.createElement(\"script\"),             s0 = document.getElementsByTagName(\"script\")[0];         s1.async = true;         s1.src = \'https://embed.tawk.to/64c7afe4cc26a871b02c5860/1h6m0e69t\';         s1.charset = \'UTF-8\';         s1.setAttribute(\'crossorigin\', \'*\');         s0.parentNode.insertBefore(s1, s0);     })();     </script>     <!--End of Tawk.to Script-->', 'Jossyblog limited blog', 'Step into the world of JossyBlog.Com, your go-to destination for inspiration, knowledge, and reliable resources to foster your personal growth and empowerment.', NULL, '2023-08-09 09:24:58');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_07_26_132253_create_admins_table', 5),
(10, '2023_08_05_182653_create_general_settings_table', 2),
(7, '2023_08_05_184439_create_categories_table', 1),
(12, '2023_08_05_185116_create_blogs_table', 4),
(11, '2023_08_08_112416_create_contacts_table', 3),
(14, '2023_08_10_165358_create_post_views_table', 6),
(15, '2023_08_10_165414_create_comments_table', 6),
(16, '2023_08_10_165436_create_reply_comments_table', 6),
(18, '2023_08_14_112230_create_advertisements_table', 7),
(19, '2023_08_25_170536_create_request_forms_table', 8),
(20, '2023_08_26_161447_create_quotes_table', 9);

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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

DROP TABLE IF EXISTS `post_views`;
CREATE TABLE IF NOT EXISTS `post_views` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`id`, `blog_id`, `ip`, `count`, `created_at`, `updated_at`) VALUES
(4, 1, '127.0.0.1', 1, '2023-08-11 12:42:41', '2023-08-11 12:42:41'),
(5, 2, '127.0.0.1', 1, '2023-08-11 12:43:43', '2023-08-11 12:43:43'),
(6, 7, '127.0.0.1', 1, '2023-08-16 13:46:41', '2023-08-16 13:46:41'),
(7, 8, '127.0.0.1', 1, '2023-08-16 15:04:09', '2023-08-16 15:04:09'),
(8, 9, '127.0.0.1', 1, '2023-08-25 11:47:46', '2023-08-25 11:47:46'),
(9, 10, '127.0.0.1', 1, '2023-08-26 14:00:02', '2023-08-26 14:00:02'),
(10, 12, '127.0.0.1', 1, '2023-08-26 17:26:49', '2023-08-26 17:26:49'),
(11, 13, '127.0.0.1', 1, '2023-08-26 17:30:22', '2023-08-26 17:30:22');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

DROP TABLE IF EXISTS `quotes`;
CREATE TABLE IF NOT EXISTS `quotes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus. Donec auctor et urnaLorem ipsum dolor sit amet, consectetur adipiscing elit. Cras lacinia magna vel molestie faucibus.Cras lacinia magna vel molestie faucibus.', '2023-08-27 12:06:11', '2023-08-27 12:06:11'),
(3, 'how are', '2023-08-27 12:56:43', '2023-08-27 12:56:43');

-- --------------------------------------------------------

--
-- Table structure for table `reply_comments`
--

DROP TABLE IF EXISTS `reply_comments`;
CREATE TABLE IF NOT EXISTS `reply_comments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `blog_id` bigint UNSIGNED NOT NULL,
  `comment_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reply_comments`
--

INSERT INTO `reply_comments` (`id`, `blog_id`, `comment_id`, `name`, `message`, `profile`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Diamond', 'testings', 'profile.png', '2023-08-10 17:12:09', '2023-08-10 17:12:09'),
(2, 2, 1, 'Admin', 'what do you mean', 'profile.png', '2023-08-11 09:45:53', '2023-08-11 09:45:53'),
(3, 2, 2, 'Duru Chigemezu', 'test', 'profile.png', '2023-08-11 11:49:31', '2023-08-11 11:49:31'),
(4, 2, 3, 'Duru Chigemezu', 'mdsfjkl', 'profile.png', '2023-08-11 11:50:08', '2023-08-11 11:50:08'),
(5, 10, 4, 'Diamond', 'no', 'profile.png', '2023-08-27 07:07:15', '2023-08-27 07:07:15'),
(6, 10, 4, 'Admin', 'yes', 'profile.png', '2023-08-27 07:07:54', '2023-08-27 07:07:54'),
(7, 10, 4, 'Peace Keeping Mission', 'how', 'profile.png', '2023-08-27 07:08:26', '2023-08-27 07:08:26'),
(8, 10, 5, 'Diamond', 'how', 'profile.png', '2023-08-27 07:18:01', '2023-08-27 07:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `request_forms`
--

DROP TABLE IF EXISTS `request_forms`;
CREATE TABLE IF NOT EXISTS `request_forms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Un-Read','Read') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_forms`
--

INSERT INTO `request_forms` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Duru Chigemezu', 'duruchigemezu@gmail.com', 'what is the system all about', 'Read', '2023-08-27 09:16:13', '2023-08-27 09:16:34'),
(2, 'ThANKGOD MEGA', 'fxtradegloballtd@gmail.com', 'In publishing and graphic design, Lorem ipsum (/ˌlɔː.rəm ˈɪp.səm/) is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available. It is also used to temporarily replace text in a process called greeking, which allows designers to consider the form of a webpage or publication, without the meaning of the text influencing the design.\r\n\r\nLorem ipsum is typically a corrupted version of De finibus bonorum et malorum, a 1st-century BC text by the Roman statesman and philosopher Cicero, with words altered, added, and removed to make it nonsensical and improper Latin. The first two words themselves are a truncation of \'dolorem ipsum\' (\'pain itself\').\r\n\r\nVersions of the Lorem ipsum text have been used in typesetting at least since the 1960s, when it was popularized by advertisements for Letraset transfer sheets.[1] Lorem ipsum was introduced to the digital world in the mid-1980s, when Aldus employed it in graphic and word-processing templates for its desktop publishing program PageMaker. Other popular word processors, including Pages and Microsoft Word, have since adopted Lorem ipsum,[2] as have many LaTeX packages,[3][4][5] web content managers such as Joomla! and WordPress, and CSS libraries such as Semantic UI.[6]', 'Read', '2023-08-26 13:01:08', '2023-08-26 15:21:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','suspended') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
