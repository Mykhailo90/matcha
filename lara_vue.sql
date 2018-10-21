-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Oct 21, 2018 at 09:06 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lara_vue`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_send_id` int(10) UNSIGNED NOT NULL,
  `user_to_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` int(10) UNSIGNED NOT NULL,
  `who_id` int(10) UNSIGNED NOT NULL,
  `user_to_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `who_id`, `user_to_id`, `created_at`, `updated_at`) VALUES
(1, 637, 495, '2018-10-21 07:39:11', '2018-10-21 07:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `ignores`
--

CREATE TABLE `ignores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_send_id` int(10) UNSIGNED NOT NULL,
  `user_to_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `user_interest_id` int(10) UNSIGNED NOT NULL,
  `interst_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`user_interest_id`, `interst_name`) VALUES
(1, 'Рыбалка'),
(2, 'Чтение'),
(3, 'Музыка'),
(4, 'Кино'),
(5, 'sex'),
(6, 'alcohol'),
(7, 'test1'),
(8, 'test2'),
(9, 'животные'),
(10, 'коты'),
(11, 'животные'),
(12, 'коты'),
(13, 'животные'),
(14, 'коты'),
(15, 'животные'),
(16, 'коты');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `msg` text COLLATE utf8_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_10_03_094150_create_interests_table', 1),
(4, '2018_10_03_094620_create_user_interests_table', 1),
(5, '2018_10_09_160828_create_friends_table', 1),
(6, '2018_10_09_160843_create_ignores_table', 1),
(7, '2018_10_09_161959_create_guests_table', 1),
(8, '2018_10_12_135915_create_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'bi-sexual',
  `country` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `city` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `longitude` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `latitude` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `avatar` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/incognito.png',
  `photo1` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/incognito.png',
  `photo2` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/incognito.png',
  `photo3` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/incognito.png',
  `photo4` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/img/incognito.png',
  `short_info` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `age` int(11) NOT NULL DEFAULT '18',
  `birth_date` date NOT NULL DEFAULT '1977-10-10',
  `check_location` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `sexpreferences` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `fame_rating` int(11) NOT NULL DEFAULT '0',
  `first_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `last_name` varchar(191) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `gender`, `country`, `city`, `longitude`, `latitude`, `avatar`, `photo1`, `photo2`, `photo3`, `photo4`, `short_info`, `age`, `birth_date`, `check_location`, `status`, `sexpreferences`, `fame_rating`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(354, 'sadswan602', '6@gmail.com', '2018-09-04 12:00:06', '4629db81155112b7b1ad6bfea6da229a2d1de8622940a915baead8387b42662f', NULL, 'male', 'Ukraine', 'Kyiv', '30.491345', '50.451021', 'https://randomuser.me/api/portraits/med/men/36.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text6', 18, '1977-10-10', 1, 0, 'girls', 40, 'wade', 'thompson', NULL, NULL),
(414, 'orangerabbit303', '7@gmail.com', '2018-09-04 12:00:07', 'dd2ea1cd74423292e8bd8e009b5f2eda586b60ffdb92e358e87ddc0a2c688352', NULL, 'bi-sexual', 'Ukraine', 'Kyiv', '30.471858', '50.475831', 'https://randomuser.me/api/portraits/med/men/92.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text7', 18, '1969-04-06', 1, 1, 'boys', 50, 'dustin', 'hughes', NULL, NULL),
(415, 'bluemeercat844', '2@gmail.com', '2018-09-04 12:00:02', '7469f8bdbcf678d2e7678826125a5f113b11fdabf22d71735b29a918257f0853', NULL, 'male', 'Ukraine', 'Kyiv', '30.464209', '50.463818', 'https://randomuser.me/api/portraits/med/men/91.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text2', 18, '1983-05-20', 1, 0, 'girls', 40, 'bernard', 'palmer', NULL, NULL),
(418, 'orangesnake647', '8@gmail.com', '2018-09-04 12:00:08', '50bb8e00f34f61cd68a1216fe6ed1b64040b236e79ca3ea355cc315c45023c18', NULL, 'bi-sexual', 'Ukraine', 'Kyiv', '30.467387', '50.459289', 'https://randomuser.me/api/portraits/med/women/33.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text8', 18, '1948-11-02', 1, 0, 'girls', 40, 'hayley', 'jackson', NULL, NULL),
(419, 'Natali', '3@gmail.com', '2018-09-04 12:00:03', '3cac5b0a94942dc23352b452ea747e47ee3dbd129a4ea3833d5f0f8e9a72ab25', NULL, 'female', 'Ukraine', 'Kyiv', '30.597198', '50.446294', 'https://randomuser.me/api/portraits/med/women/6.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text3', 18, '1952-10-31', 1, 1, 'boys', 50, 'emily', 'soto', NULL, NULL),
(420, 'beautifulkoala471', '9@gmail.com', '2018-09-04 12:00:09', 'f23beb44a0900dd73d5b42f04e5d52e03b6273cc642f778e2de2455f5492c4d2', NULL, 'female', 'Ukraine', 'Dnepropetrovsk', '34.997200', '48.467697', 'https://randomuser.me/api/portraits/med/men/9.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text9', 18, '1993-05-06', 1, 1, 'boys', 50, 'آدرین', 'جعفری', NULL, NULL),
(421, 'ticklishostrich657', '4@gmail.com', '2018-09-04 12:00:04', 'ff611f745860181c11f0752ee2856bfdba8db698dba7d4908adfa9e0ea8f8bdc', NULL, 'male', 'Ukraine', 'Dnepropetrovsk', '35.000118', '48.469077', 'https://randomuser.me/api/portraits/med/men/2.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text4', 18, '1947-10-09', 1, 0, 'girls', 40, 'ekkehart', 'schade', NULL, NULL),
(423, 'tinybear618', '10@gmail.com', '2018-09-04 12:00:10', '5771589d49a4fe67e6047f905298a6d4a5f7bc136daf9bae6585edd371096b05', NULL, 'male', 'Ukraine', 'Dnepropetrovsk', '34.996556', '48.467583', 'https://randomuser.me/api/portraits/med/women/31.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text10', 18, '1975-03-25', 1, 0, 'bi_sexual', 40, 'ümmügülsüm', 'werleman', NULL, NULL),
(424, 'silverladybug377', '5@gmail.com', '2018-09-04 12:00:05', 'af7f28efa5a5ae377897535990bac4a05c914b31c2fc9fbd96264ce05f2ab97a', NULL, 'female', 'Ukraine', 'Dnepropetrovsk', '35.000172', '48.470635', 'https://randomuser.me/api/portraits/med/women/7.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text5', 18, '1989-11-18', 1, 1, 'boys', 50, 'isabella', 'henry', NULL, NULL),
(426, 'bigelephant260', '11@gmail.com', '2018-09-04 12:00:11', 'f849c9ae9d2c248b60a42eaf933b4c98bb1c6f8c7f9d2e9e72424e27ce985d58', NULL, 'female', 'Ukraine', 'Dnepropetrovsk', '35.002823', '48.474249', 'https://randomuser.me/api/portraits/med/women/47.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text11', 18, '1950-04-25', 1, 1, 'girls', 50, 'ivanice', 'martins', NULL, NULL),
(429, 'bluefrog504', '12@gmail.com', '2018-09-04 12:00:12', 'd38d3ead9d0896239b6371f9165af7d68c50ffd47e8d5718f06b49861a6da9fa', NULL, 'male', 'Ukraine', 'Zaporizhzhia', '35.160616', '47.873131', 'https://randomuser.me/api/portraits/med/men/60.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text12', 18, '1972-06-22', 1, 0, 'boys', 40, 'eemeli', 'lammi', NULL, NULL),
(432, 'tinyrabbit633', '13@gmail.com', '2018-09-04 12:00:13', 'f9da8d7e995db38d2d06f978e4f1ab4b30d6c9d91adbaf3985b4222e20771f92', NULL, 'female', 'Ukraine', 'Zaporizhzhia', '35.217862', '47.812739', 'https://randomuser.me/api/portraits/med/women/29.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text13', 18, '1979-12-31', 1, 1, 'girls', 50, 'vanessa', 'lambert', NULL, NULL),
(435, 'organicladybug524', '14@gmail.com', '2018-09-04 12:00:14', 'f8826a74b883e9ed7f7b32fe7e887a1e392fe80a087e70ea644c39f1a726a757', NULL, 'male', 'Ukraine', 'Zaporizhzhia', '35.216875', '47.806673', 'https://randomuser.me/api/portraits/med/women/92.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text14', 18, '1991-03-13', 1, 0, 'boys', 40, 'joy', 'neal', NULL, NULL),
(438, 'tinyswan489', '15@gmail.com', '2018-09-04 12:00:15', '15495c84715a193492754b3e777977a4a135890e1ac2174c12d95461e3f5719b', NULL, 'female', 'Ukraine', 'Zaporizhzhia', '35.217873', '47.803945', 'https://randomuser.me/api/portraits/med/men/20.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text15', 18, '1971-05-13', 1, 1, 'girls', 50, 'dimitrios', 'ganser', NULL, NULL),
(441, 'beautifulmouse290', '16@gmail.com', '2018-09-04 12:00:16', 'd542ec2481f3cceb7560f08990be2d52f5db3015ba282ef3bec7fd5e75950914', NULL, 'male', 'Ukraine', 'Zaporizhzhia', '35.217047', '47.802669', 'https://randomuser.me/api/portraits/med/men/48.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text16', 18, '1993-09-14', 1, 0, 'boys', 40, 'gregorio', 'ortega', NULL, NULL),
(444, 'blueostrich336', '17@gmail.com', '2018-09-04 12:00:17', '4e934da2c714ad5d958e189fb89ca2454c1c6265bc004320dafa5866c0d76324', NULL, 'female', 'Ukraine', 'Zaporizhzhia', '35.218581', '47.801887', 'https://randomuser.me/api/portraits/med/women/92.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text17', 18, '1994-12-13', 1, 1, 'girls', 50, 'elena', 'van rens', NULL, NULL),
(447, 'organicbear400', '18@gmail.com', '2018-09-04 12:00:18', '2bcec130319ecf2ed175e05307c526fc1c86b0de12a54a6312c960f873f22285', NULL, 'bi-sexual', 'Ukraine', 'Zaporizhzhia', '35.217106', '47.803918', 'https://randomuser.me/api/portraits/med/men/26.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text18', 18, '1982-03-26', 1, 0, 'boys', 40, 'jose', 'lopez', NULL, NULL),
(450, 'bluebutterfly921', '19@gmail.com', '2018-09-04 12:00:19', '09908a9e5ecb8a9c8ae090eb74c34bfb17995f3255ca6d03f0515e3b5e468b29', NULL, 'female', 'Ukraine', 'Zaporizhzhia', '35.218635', '47.805503', 'https://randomuser.me/api/portraits/med/women/86.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text19', 18, '1984-03-03', 1, 1, 'girls', 50, 'christiane', 'bernard', NULL, NULL),
(453, 'happybutterfly880', '20@gmail.com', '2018-09-04 12:00:20', '8383499aad9910e711de5f38e237ec64400340ccb6a116939300153f4094342e', NULL, 'male', 'Ukraine', 'L\'viv', '23.988221', '49.855841', 'https://randomuser.me/api/portraits/med/women/3.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text20', 18, '1969-04-25', 1, 0, 'bi_sexual', 40, 'tia', 'dieleman', NULL, NULL),
(456, 'yellowladybug529', '21@gmail.com', '2018-09-04 12:00:21', '1be4b1af1404b0dfe3cc89305039277f7042c2fe52dcbab56b5ed462b15b19fa', NULL, 'female', 'Ukraine', 'L\'viv', '23.989723', '49.852479', 'https://randomuser.me/api/portraits/med/men/20.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text21', 18, '1955-06-15', 1, 1, 'girls', 50, 'jesus', 'holland', NULL, NULL),
(459, 'redrabbit228', '22@gmail.com', '2018-09-04 12:00:22', '68d93c6ffbb11792b9608cd1d749641e4cb9252c4f76a1ab47bbdc1ecfd63b28', NULL, 'male', 'Ukraine', 'L\'viv', '24.035999', '49.827497', 'https://randomuser.me/api/portraits/med/women/68.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text22', 18, '1970-09-05', 1, 0, 'boys', 40, 'marilise', 'dias', NULL, NULL),
(462, 'purplelion148', '23@gmail.com', '2018-09-04 12:00:23', '753ccf33cc057e32c2cde2b8969a62fee7441f063b684b1687d8804bd78d303d', NULL, 'bi-sexual', 'Ukraine', 'L\'viv', '24.036189', '49.827331', 'https://randomuser.me/api/portraits/med/women/1.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text23', 18, '1957-11-24', 1, 1, 'girls', 50, 'stacy', 'mendoza', NULL, NULL),
(465, 'happymouse553', '24@gmail.com', '2018-09-04 12:00:24', '4339c26b79b8fed1a5e8f2b50f354f6983e6e7f5fb191b91e46c34d30e69d89c', NULL, 'male', 'Ukraine', 'L\'viv', '24.041523', '49.866697', 'https://randomuser.me/api/portraits/med/men/20.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text24', 18, '1957-04-17', 1, 0, 'boys', 40, 'آراد', 'حیدری', NULL, NULL),
(468, 'happygorilla897', '25@gmail.com', '2018-09-04 12:00:25', '29c9741ad6cd73325a61b9c0b501b2e25698e787d42bedd9435ebff951da5fe4', NULL, 'bi-sexual', 'Ukraine', 'L\'viv', '24.041609 ', '49.866227', 'https://randomuser.me/api/portraits/med/women/71.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text25', 18, '1948-11-28', 1, 1, 'girls', 50, 'maélie', 'roy', NULL, NULL),
(471, 'smallleopard729', '26@gmail.com', '2018-09-04 12:00:26', 'f01f52192c864e092c339e4c6c295ef579076f2328ddad79964642628c6e4a69', NULL, 'male', 'Ukraine', 'L\'viv', '24.047227', '78.8519 49.868122', 'https://randomuser.me/api/portraits/med/women/17.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text26', 18, '1995-08-04', 1, 0, 'boys', 40, 'margaret', 'ruppert', NULL, NULL),
(474, 'organicsnake961', '28@gmail.com', '2018-09-04 12:00:28', 'c422688d0e26f47a1da4076d4f966bbb91141e370b1224335215a6e0e401f720', NULL, 'male', 'Ukraine', 'Kharkiv', '36.234198', '50.013270', 'https://randomuser.me/api/portraits/med/men/10.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text28', 18, '1985-10-10', 1, 0, 'boys', 40, 'tristan', 'christensen', NULL, NULL),
(477, 'heavyelephant594', '29@gmail.com', '2018-09-04 12:00:29', '29c8aab4a08ee30e5003dcb76f763618db66a5858bf305aa7b55443f508e3701', NULL, 'female', 'Ukraine', 'Kharkiv', '36.235764', '50.012070', 'https://randomuser.me/api/portraits/med/men/77.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text29', 18, '1945-09-24', 1, 1, 'girls', 50, 'albert', 'diez', NULL, NULL),
(480, 'bigsnake523', '30@gmail.com', '2018-09-04 12:00:30', '6dc30411f5abba3b68e243be04880914a1e8b85e9e3f24b9f759eb88726cb411', NULL, 'male', 'Ukraine', 'Kharkiv', '36.234670', '50.009505', 'https://randomuser.me/api/portraits/med/men/7.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text30', 18, '1960-11-19', 1, 0, 'bi_sexual', 40, 'gonzalo', 'vega', NULL, NULL),
(483, 'silverkoala180', '31@gmail.com', '2018-09-04 12:00:31', '12657955a8d780031bd6ba4d03d1637b4f3317d6b1c34cda5259dc49543678e4', NULL, 'female', 'Ukraine', 'Kharkiv', '36.233538', '50.006903', 'https://randomuser.me/api/portraits/med/men/13.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text31', 18, '1994-02-26', 1, 1, 'girls', 50, 'jeffrey', 'bryant', NULL, NULL),
(486, 'smallelephant709', '32@gmail.com', '2018-09-04 12:00:32', '4196d3ef3c080938713058b9bdb7b9630f92e265c68f40e25186d89657220e08', NULL, 'male', 'Ukraine', 'Kharkiv', '36.234852', '50.006400', 'https://randomuser.me/api/portraits/med/men/56.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text32', 18, '1971-01-11', 1, 0, 'boys', 40, 'andy', 'spijkerboer', NULL, NULL),
(489, 'orangebear947', '33@gmail.com', '2018-09-04 12:00:33', 'ad6f43e946413bc21f0274e2d3d4941df566e7089f32506a713f5bedf8913519', NULL, 'female', 'Ukraine', 'Odesa', '30.660052', '46.449680', 'https://randomuser.me/api/portraits/med/men/60.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text33', 18, '1987-11-22', 1, 1, 'girls', 50, 'gökhan', 'atan', NULL, NULL),
(492, 'angrypeacock444', '34@gmail.com', '2018-09-04 12:00:34', '7a8eaea208ceaa15a397f5656aa44d9d693cbbfd6c93ea0ae512ea45b748a7d6', NULL, 'male', 'Ukraine', 'Odesa', '30.659537', '46.448364', 'https://randomuser.me/api/portraits/med/women/32.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text34', 18, '1976-04-26', 1, 0, 'boys', 40, 'kate', 'grant', NULL, NULL),
(495, 'orangegorilla960', '35@gmail.com', '2018-09-04 12:00:35', '30170b604d1a31a03d01dbd29b9e4bb788d47deccad3196cb539f9fd4a88be80', NULL, 'female', 'Ukraine', 'Odesa', '30.658861', '46.446087', 'https://randomuser.me/api/portraits/med/women/88.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text35', 18, '1945-12-21', 1, 1, 'girls', 50, 'ملینا', 'گلشن', NULL, NULL),
(498, 'yellowbird899', '36@gmail.com', '2018-09-04 12:00:36', 'acf2362fcae435c5ce5924c2148ae7fb0559a8ad8657dacae3d0dba1f4cc6fac', NULL, 'bi-sexual', 'Ukraine', 'Odesa', '30.659108', '46.445059', 'https://randomuser.me/api/portraits/med/women/33.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text36', 18, '1975-07-28', 1, 0, 'boys', 40, 'rose', 'larson', NULL, NULL),
(501, 'beautifulkoala491', '37@gmail.com', '2018-09-04 12:00:37', '576d3a6b2a0cb175f5b7f784fe38e4dffed583ee321405fe432a60b369a0c302', NULL, 'female', 'Ukraine', 'Odesa', '30.662346', '46.455692', 'https://randomuser.me/api/portraits/med/women/88.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text37', 18, '1990-11-20', 1, 1, 'girls', 50, 'katrin', 'henne', NULL, NULL),
(504, 'happyelephant518', '38@gmail.com', '2018-09-04 12:00:38', 'b5298d40d6185ff8e66be2e807d4b91d09bbd94f1dd5412ac8583faecb7ee760', NULL, 'male', 'Ukraine', 'Chernivtsi', '25.945631', '48.345269', 'https://randomuser.me/api/portraits/med/women/30.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text38', 18, '1955-05-13', 1, 0, 'boys', 40, 'zoe', 'silden', NULL, NULL),
(507, 'happymouse981', '39@gmail.com', '2018-09-04 12:00:39', 'e05eb5cc40cc2c090db2ba15d279861e387ac7942fd6868ddc6fd4c3645d9720', NULL, 'bi-sexual', 'Ukraine', 'Chernivtsi', '25.945148', '48.344848', 'https://randomuser.me/api/portraits/med/women/23.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text39', 18, '1986-11-05', 1, 1, 'girls', 50, 'ava', 'morel', NULL, NULL),
(510, 'greengorilla391', '40@gmail.com', '2018-09-04 12:00:40', 'f539e197cd2b10fa6e36192d220f7a59158d0e906d81e8c0415bce0fadacf6cd', NULL, 'male', 'Ukraine', 'Chernivtsi', '25.944944', '48.345675', 'https://randomuser.me/api/portraits/med/women/68.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text40', 18, '1960-06-29', 1, 0, 'bi_sexual', 40, 'marinice', 'campos', NULL, NULL),
(513, 'ticklishlion399', '41@gmail.com', '2018-09-04 12:00:41', '67f8074786c8444aec7156be4598b241983caff4a7460c794494207e830f6ca7', NULL, 'female', 'Ukraine', 'Chernivtsi', '25.940008', '48.343415', 'https://randomuser.me/api/portraits/med/women/72.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text41', 18, '1987-12-11', 1, 1, 'girls', 50, 'alba', 'romero', NULL, NULL),
(516, 'angrydog222', '42@gmail.com', '2018-09-04 12:00:42', 'e3e5c3977d8876a4007a1b8b2ef0db09c61857d6818e9eb5bb11e7418ec68636', NULL, 'male', 'Ukraine', 'Chernivtsi', '25.938431', '48.343493', 'https://randomuser.me/api/portraits/med/men/48.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text42', 18, '1959-02-09', 1, 0, 'boys', 40, 'cornelius', 'huisjes', NULL, NULL),
(519, 'sadfish589', '43@gmail.com', '2018-09-04 12:00:43', 'face1a6e7722a73339de27219edf01f71a1a0c3d36594e42201380a443a61435', NULL, 'female', 'Ukraine', 'Ivano-Frankivs\'k', '24.712496', '48.915600', 'https://randomuser.me/api/portraits/med/women/77.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text43', 18, '1970-09-01', 1, 1, 'girls', 50, 'هستی', 'كامياران', NULL, NULL),
(522, 'bluesnake123', '44@gmail.com', '2018-09-04 12:00:44', '6638bd4fc5ed287809eb95d9d741c142da77306a0580a1d5ca44db2a7fd96411', NULL, 'male', 'Ukraine', 'Ivano-Frankivs\'k', '24.711842', '48.915071', 'https://randomuser.me/api/portraits/med/men/31.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text44', 18, '1973-05-10', 1, 0, 'boys', 40, 'davut', 'özberk', NULL, NULL),
(525, 'goldenmouse823', '45@gmail.com', '2018-09-04 12:00:45', 'be67a4aad21833150f50d4889bcb98f81fa75d37c730ba66596a88de987667d5', NULL, 'female', 'Ukraine', 'Ivano-Frankivs\'k', '24.711252', '48.913654', 'https://randomuser.me/api/portraits/med/women/15.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text45', 18, '1986-09-07', 1, 1, 'girls', 50, 'brooklyn', 'hughes', NULL, NULL),
(528, 'blueduck184', '46@gmail.com', '2018-09-04 12:00:46', '9d57a7fc1bcbe244b2f7b23661c70c564802e3dbe30ac04c27cf262de747f88d', NULL, 'male', 'Ukraine', 'Ivano-Frankivs\'k', '24.711563', '48.910650', 'https://randomuser.me/api/portraits/med/men/43.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text46', 18, '1983-02-16', 1, 0, 'boys', 40, 'ruthger', 'appels', NULL, NULL),
(531, 'whitetiger535', '47@gmail.com', '2018-09-04 12:00:47', '10db47c62038a96bca69fd4bb167777c93c7f381261b828563838da112eecccd', NULL, 'bi-sexual', 'Ukraine', 'Ivano-Frankivs\'k', '24.708484', '48.910100', 'https://randomuser.me/api/portraits/med/women/51.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text47', 18, '1948-01-28', 1, 1, 'girls', 50, 'kristen', 'garrett', NULL, NULL),
(534, 'blackbutterfly830', '48@gmail.com', '2018-09-04 12:00:48', '75d89f7110486a9671b46440b561729b2b32eb84a5f0d2b496cf2242676cf6b7', NULL, 'male', 'Ukraine', 'Ivano-Frankivs\'k', '24.711499', '48.909211', 'https://randomuser.me/api/portraits/med/women/39.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text48', 18, '1960-08-31', 1, 0, 'boys', 40, 'emma', 'lavoie', NULL, NULL),
(537, 'beautifulsnake133', '49@gmail.com', '2018-09-04 12:00:49', '770539ba10a58cbed825b7118378bf72ccaf3329da90e8f66dacb29d98b43326', NULL, 'female', 'Ukraine', 'Rivne', '26.228530', '50.617400', 'https://randomuser.me/api/portraits/med/men/65.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text49', 18, '1948-06-08', 1, 1, 'girls', 50, 'johnny', 'berry', NULL, NULL),
(540, 'bigswan968', '50@gmail.com', '2018-09-04 12:00:50', '5a0fec9b1d1d18ff81a6cf09a7b2d4131739340d5e225fce01b488fab648c87a', NULL, 'male', 'Ukraine', 'Rivne', '26.228337', '50.616185', 'https://randomuser.me/api/portraits/med/women/70.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text50', 18, '1981-08-13', 1, 0, 'bi_sexual', 40, 'georgette', 'lefevre', NULL, NULL),
(543, 'lazybutterfly794', '51@gmail.com', '2018-09-04 12:00:51', '336430a4cd05e48d0aed9e17a6b1d5f5871ff119ca45bdfef2437b7d79d8fce6', NULL, 'female', 'Ukraine', 'Rivne', '26.229040', '50.614657', 'https://randomuser.me/api/portraits/med/men/47.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text51', 18, '1951-11-26', 1, 1, 'girls', 50, 'jakob', 'rashid', NULL, NULL),
(546, 'silverwolf954', '52@gmail.com', '2018-09-04 12:00:52', '29e6f3e70a9b66cace90a0eff5ff6600a0b6ce1fb5b49f8bf94c6d5168e24aa5', NULL, 'bi-sexual', 'Ukraine', 'Rivne', '26.229206', '50.614643', 'https://randomuser.me/api/portraits/med/women/53.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text52', 18, '1966-07-13', 1, 0, 'boys', 40, 'nina', 'guillaume', NULL, NULL),
(548, 'heavyleopard644', '53@gmail.com', '2018-09-04 12:00:53', 'df45c77f05c2ab4197c079cee5de763683ea37c08a42ac8e4c9267165de9cd33', NULL, 'female', 'sandøya', 'trøndelag', '-50.4352', '-17.5308', 'https://randomuser.me/api/portraits/med/men/13.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text53', 18, '1959-07-06', 1, 1, 'girls', 50, 'johannes', 'øvergaard', NULL, NULL),
(552, 'redswan883', '54@gmail.com', '2018-09-04 12:00:54', '4f7f54d9d026665dea0e180c3a2d626b634ceba641d24c635e32f14181f8a461', NULL, 'male', 'birmingham', 'gwent', '76.1551', '73.2149', 'https://randomuser.me/api/portraits/med/men/83.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text54', 18, '1961-11-22', 1, 0, 'boys', 40, 'wesley', 'sanchez', NULL, NULL),
(558, 'redgorilla120', '55@gmail.com', '2018-09-04 12:00:55', 'c4c4191f2c2c5ab5b7771007aecfa5f19d6cec4888036734a04c8e111b377edf', NULL, 'female', 'warstein', 'nordrhein-westfalen', '170.2782', '42.9187', 'https://randomuser.me/api/portraits/med/men/47.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text55', 18, '1988-04-01', 1, 1, 'girls', 50, 'ingo', 'seeger', NULL, NULL),
(627, 'lazycat222', '56@gmail.com', '2018-09-04 12:00:56', 'aff456ecd615a72dfeb3d037867f9d69b065d2e29c079239e34e2486720ddc2b', NULL, 'male', 'sutton', 'new brunswick', '-126.9671', '81.2636', 'https://randomuser.me/api/portraits/med/women/2.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text56', 18, '1972-01-01', 1, 0, 'boys', 40, 'julia', 'young', NULL, NULL),
(630, 'sadostrich108', '57@gmail.com', '2018-09-04 12:00:57', '42453395f18c5cad74a7cc65f05ad17437e18f5b12461894fdc3546ed881042d', NULL, 'female', 'móstoles', 'ceuta', '94.1094', '77.4683', 'https://randomuser.me/api/portraits/med/men/86.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text57', 18, '1948-11-06', 1, 1, 'girls', 50, 'daniel', 'sanz', NULL, NULL),
(633, 'browndog636', '58@gmail.com', '2018-09-04 12:00:58', 'eacf7b6892fb9174bd31afee073529961741c4753d6eec498e52fead5b6a033d', NULL, 'male', 'بیرجند', 'گلستان', '68.5001', '53.3209', 'https://randomuser.me/api/portraits/med/women/91.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text58', 18, '1949-03-25', 1, 0, 'boys', 40, 'آوینا', 'کریمی', NULL, NULL),
(636, 'smallelephant906', '59@gmail.com', '2018-09-04 12:00:59', '019a8332fa4b9b5d1ac32f07684687366ddc59c74fa9068c5fe6c6f1bf3dfd61', NULL, 'female', 'botucatu', 'minas gerais', '140.9145', '35.7245', 'https://randomuser.me/api/portraits/med/women/62.jpg', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', '/img/incognito.png', 'short_info_text59', 18, '1965-12-26', 1, 1, 'girls', 50, 'gilcenira', 'silva', NULL, NULL),
(637, 'Misha', '0660330233@ukr.net', '2018-10-07 18:00:00', '$2y$10$DQ5VDG2MWDHsmjPkPomUOO7CNUNKA5lk/ViiaeyiUfRVywEmY1xAa', 'q2XumWndu3wgI0aw0pgy1O3YlLTryeDy5Nqkt0twLmvdM3WyWqY9KwcuChWn', 'Male', 'Ukraine', 'Kyiv', '30.462262', '50.469227', 'images/1539063624.jpg', '/img/incognito.png', 'images/1539096554.jpg', '/img/incognito.png', '/img/incognito.png', 'none', 16, '1977-10-10', 1, 0, 'Women', 0, 'Misha', 'Sarapii', '2018-09-26 06:38:27', '2018-10-21 07:33:08');

-- --------------------------------------------------------

--
-- Table structure for table `user_interests`
--

CREATE TABLE `user_interests` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `interest_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_interests`
--

INSERT INTO `user_interests` (`user_id`, `interest_id`) VALUES
(637, 9),
(637, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ignores`
--
ALTER TABLE `ignores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`user_interest_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_index` (`sender_id`),
  ADD KEY `messages_receiver_id_index` (`receiver_id`),
  ADD KEY `messages_sender_id_read_index` (`sender_id`,`read`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD KEY `user_interests_user_id_foreign` (`user_id`),
  ADD KEY `user_interests_interest_id_foreign` (`interest_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ignores`
--
ALTER TABLE `ignores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `user_interest_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=638;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_interests`
--
ALTER TABLE `user_interests`
  ADD CONSTRAINT `user_interests_interest_id_foreign` FOREIGN KEY (`interest_id`) REFERENCES `interests` (`user_interest_id`),
  ADD CONSTRAINT `user_interests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
