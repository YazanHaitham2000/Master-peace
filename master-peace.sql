-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 08:06 PM
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
-- Database: `master-peace`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `home_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `home_id`, `user_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(15, 31, 4, '2024-10-10', '21:58:00', '2024-10-10 11:53:03', '2024-10-10 11:53:03'),
(16, 53, 4, '2024-10-23', '01:35:00', '2024-10-10 14:30:48', '2024-10-10 14:30:48'),
(17, 38, 3, '2024-10-30', '02:56:00', '2024-10-10 14:51:13', '2024-10-10 14:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'rent', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'sale', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `home_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `rating`, `user_id`, `home_id`, `created_at`, `updated_at`) VALUES
(1, 'صبثبسببرسي', 1, 4, 41, '2024-10-09 14:42:12', '2024-10-09 14:42:12'),
(2, 'good', 5, 4, 41, '2024-10-09 14:45:34', '2024-10-09 14:45:34'),
(3, 'nice', 4, 4, 41, '2024-10-09 14:56:04', '2024-10-09 14:56:04'),
(8, 'nice', 4, 4, 41, '2024-10-10 05:54:39', '2024-10-10 05:54:39'),
(11, 'dsvggesesarges', 4, 4, 31, '2024-10-10 11:52:40', '2024-10-10 11:52:40'),
(12, 'asqw', 3, 3, 51, '2024-10-10 13:46:06', '2024-10-10 13:46:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Yazan Abo Sbeah', 'khaitham1999@gmail.com', 'Job', 'frdsgsetdhrdjrdyjyrd', '2024-10-10 07:37:28', '2024-10-10 07:37:28'),
(2, 'ali', 'ali@gmail.com', 'wwww', 'sgrdhdsfhftjtdfjrthnfjftx', '2024-10-10 07:38:20', '2024-10-10 07:38:20'),
(3, 'ahmad', 'ahmad@gmail.com', 'vfhtse', 'argsdjntdk,yflbfsjftlkjrt', '2024-10-10 07:38:52', '2024-10-10 07:38:52'),
(4, 'cvscsa', 'brd@gbfdh.ty', 'rfwagw', 'herhre6ujr', '2024-10-10 09:24:49', '2024-10-10 09:24:49'),
(5, 'Yazan Abo Sbeah', 'khaitham1999@gmail.com', 'wwww', 'ggg', '2024-10-10 09:32:16', '2024-10-10 09:32:16'),
(6, 'Yazan Abo Sbeah', 'khaitham1999@gmail.com', 'ءئريري', 'ريئرءلابءيلا', '2024-10-10 11:30:12', '2024-10-10 11:30:12'),
(7, 'tamer', 'trtr@cddc', 'Job', 'sgsehrjtkgdjdtktdy', '2024-10-10 11:51:30', '2024-10-10 11:51:30');

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
-- Table structure for table `favorite_homes`
--

CREATE TABLE `favorite_homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `home_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homes`
--

CREATE TABLE `homes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `bedrooms` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homes`
--

INSERT INTO `homes` (`id`, `name`, `category_id`, `created_at`, `updated_at`, `user_id`, `price`, `area`, `rooms`, `bathrooms`, `bedrooms`, `location`) VALUES
(31, 'hom2', 2, '2024-10-07 15:25:25', '2024-10-07 15:25:25', 3, 2222.00, 230, 5, 3, 5, 'Amman'),
(38, 'home55', 2, '2024-10-08 13:26:21', '2024-10-08 13:26:21', 8, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'yazan', 1, '2024-10-09 05:46:01', '2024-10-10 14:05:04', 3, 200000.00, 230, 6, 3, 4, 'amman'),
(51, 'eeeeeeeeeee', 1, '2024-10-10 13:29:25', '2024-10-10 13:29:25', 3, 34534.00, 4325, 4234, 3, 33, 'amman'),
(53, 'basil', 1, '2024-10-10 13:55:43', '2024-10-10 13:55:43', 3, 1123456.00, 23, 34, 33, 33, 'amman');

-- --------------------------------------------------------

--
-- Table structure for table `home_user`
--

CREATE TABLE `home_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `home_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `home_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `url`, `user_id`, `home_id`, `created_at`, `updated_at`) VALUES
(11, 'http://localhost:8000/storage/images/WiZ2cgqVquI2GKkQqOhXHw09YKuOQxVRZKSW3GPe.jpg', NULL, NULL, '2024-10-06 07:13:37', '2024-10-06 07:13:37'),
(12, 'http://localhost:8000/storage/images/qFq7asXnNej0VrvQvoHLRf0ngc9TejpA6WhvyjUc.jpg', NULL, NULL, '2024-10-06 08:51:44', '2024-10-06 08:51:44'),
(13, 'http://localhost:8000/storage/images/vfbVAxytpwKVvNJLATuZxJrBL81pua1utIGYOoIO.jpg', NULL, NULL, '2024-10-06 08:53:52', '2024-10-06 08:53:52'),
(14, 'images/0YUAUsNofTLt2Kd4qe1Q6ww6jmydN3NYr8f594G8.jpg', NULL, NULL, '2024-10-06 09:31:25', '2024-10-06 09:31:25'),
(15, 'http://localhost:8000/storage/images/skKpcGubS18xxhxHCagtVTG6pkrWCcIWt8b6hnYL.jpg', NULL, NULL, '2024-10-06 11:17:47', '2024-10-06 11:17:47'),
(19, 'http://localhost:8000/storage/images/370UYPgjhuOl81z7yB9dQfD3ykvPwk3pSDiApzfm.jpg', NULL, NULL, '2024-10-06 12:21:06', '2024-10-06 12:21:06'),
(22, 'http://localhost:8000/storage/images/w5yN6rZJ6aNfQn2MvUK6JfsFnd0RlWchLCNlszbA.jpg', NULL, NULL, '2024-10-06 12:55:11', '2024-10-06 12:55:11'),
(23, 'http://localhost:8000/storage/images/neNufqx8GIKdMj7dhBp3NiGbl7rxTYZjilKsDfEQ.jpg', NULL, NULL, '2024-10-06 13:01:34', '2024-10-06 13:01:34'),
(24, 'http://localhost:8000/storage/images/hEpbxKwpMkHrl7fZy1IL67WdE4EVn3XnABrb4GAz.jpg', NULL, NULL, '2024-10-06 13:08:49', '2024-10-06 13:08:49'),
(25, 'http://localhost:8000/storage/images/kSIWItKoOz4IR8OrVV5TJ3QLME9CJbcQGLzNLYjF.jpg', NULL, NULL, '2024-10-06 13:11:08', '2024-10-06 13:11:08'),
(26, 'http://localhost:8000/storage/images/fOuigu1Nm6UK9P7r533sECOCJtNeh092OAROcWIN.jpg', NULL, NULL, '2024-10-06 13:12:43', '2024-10-06 13:12:43'),
(27, 'http://localhost:8000/storage/images/5KlCgnodbhkM1SYNRmYrwn3LdEOdRnRb28bfCwRx.jpg', NULL, NULL, '2024-10-07 08:47:56', '2024-10-07 08:47:56'),
(28, 'http://localhost:8000/storage/images/MCviCm8ejqBA50x5I0g0px8BqKaRgdUnGU3kDgC0.jpg', NULL, NULL, '2024-10-07 15:25:24', '2024-10-07 15:25:24'),
(29, 'http://localhost:8000/storage/images/YXTsvklHyVEUq7dJ7f4PaTrvhkuq9KcL6VKkwm52.jpg', NULL, 31, '2024-10-07 15:25:25', '2024-10-07 15:25:25'),
(30, 'http://localhost:8000/storage/images/qiLOL1Xrpo3eS6nKadIg7jhaLYoUPso2SCQfb4xY.jpg', NULL, NULL, '2024-10-07 15:26:10', '2024-10-07 15:26:10'),
(31, 'http://localhost:8000/storage/images/OWatZOSGvOViC3Pmih3m2SU5ybUwjkibFpaoiodZ.jpg', NULL, NULL, '2024-10-07 15:26:10', '2024-10-07 15:26:10'),
(32, 'http://localhost:8000/storage/images/e7aS4ezAMtUSyoWETWizmJM46Z6Z0zMiSvSdUzgn.jpg', NULL, NULL, '2024-10-07 16:20:58', '2024-10-07 16:20:58'),
(33, 'http://localhost:8000/storage/images/6cAgR0jDRLakJbXIlWrvBnUsUEswZar9BgXsONah.jpg', NULL, NULL, '2024-10-07 16:21:37', '2024-10-07 16:21:37'),
(34, 'images/46hpT4GBYuvd9peBGBJyyL45LB2C77oJtRnzso7i.jpg', NULL, NULL, '2024-10-08 12:47:50', '2024-10-08 12:47:50'),
(35, 'images/50zAyT4HaOcgp0IegvPYMw3WkknuENu4YQRUrBCT.jpg', NULL, NULL, '2024-10-08 12:52:29', '2024-10-08 12:52:29'),
(36, 'images/otHi6nJy7skr8eAAVQTNCkeswxcT9ZlQyt0Nfiie.jpg', NULL, NULL, '2024-10-08 12:52:29', '2024-10-08 12:52:29'),
(37, 'images/9qqvdCF9P96KVJj6AwGccFlTe0MXhznPnKWxpmRH.jpg', NULL, NULL, '2024-10-08 12:52:29', '2024-10-08 12:52:29'),
(38, 'images/nWDWZCRQu0b3vOn2XKSliFK4Q5nxlPyFlPkLTNsg.jpg', NULL, NULL, '2024-10-08 12:52:29', '2024-10-08 12:52:29'),
(39, 'http://localhost:8000/storage/images/DRJvL767ls96623F7QLcxHzxZUGncqh7qcSmpAV1.jpg', NULL, 38, '2024-10-08 13:26:21', '2024-10-08 13:26:21'),
(40, 'http://localhost:8000/storage/images/qCdwxbbdqYWxUo5DLHVEBololwQ5eF5QOzwBSj2D.jpg', NULL, 38, '2024-10-08 13:26:21', '2024-10-08 13:26:21'),
(41, 'images/AHqvH2KU75OEFk3mXqLVEPyB4AjM1P027xwTnyVV.jpg', NULL, NULL, '2024-10-08 13:31:19', '2024-10-08 13:31:19'),
(42, 'images/rV1L5VeEKrLZbdxP0lDMGVbkf4u0zjeLYCwUIg3V.jpg', NULL, NULL, '2024-10-08 13:32:01', '2024-10-08 13:32:01'),
(43, 'images/BJR9Rxf0l4cDZ1XH5MwG90z6IYY3FFZP7iB0pian.jpg', NULL, NULL, '2024-10-08 13:32:01', '2024-10-08 13:32:01'),
(44, 'images/RvLvAwoTY3uejCwmmBo7iNam5jcRjpg9dg0gokwy.jpg', NULL, NULL, '2024-10-08 13:32:01', '2024-10-08 13:32:01'),
(45, 'images/DGsJ7YBIgGBHVwmxts4k7icPWsibThFcYMZ8xXos.jpg', NULL, NULL, '2024-10-08 13:32:01', '2024-10-08 13:32:01'),
(46, 'http://localhost:8000/storage/images/0vhioFTWKi4FJ5jnALa8aFgTlv0eeqBeiy76Nkga.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(47, 'http://localhost:8000/storage/images/y2ug81tz9z8NcUDCQtkqSXNzKM99qi9PhgHCo2vY.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(48, 'http://localhost:8000/storage/images/To4FHvcWpBvR7RKIlxFrcHaW3E11qMNzuIQDlL2y.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(49, 'http://localhost:8000/storage/images/PQSKSeyy0udBpiVsusSKbVDtHsgtd4wBsdOi9gMF.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(50, 'http://localhost:8000/storage/images/usLILoCaWBBjBTWtRoZHBMGUI7tchBl8c6Bzzgkn.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(51, 'http://localhost:8000/storage/images/rnGb8s9zklW2Pjk1Qdnk6oot5qFQgkgFw3fwIAo8.jpg', NULL, 41, '2024-10-09 05:46:02', '2024-10-09 05:46:02'),
(52, 'images/wUSY2qBaL6PsXonq0jbuNfnS53VJIaPZdzbjVeTf.jpg', NULL, NULL, '2024-10-09 08:15:02', '2024-10-09 08:15:02'),
(53, 'images/smd12pawCHbNOejf2LL582dGI8Pk70lePKEPYEVy.jpg', NULL, NULL, '2024-10-09 08:15:02', '2024-10-09 08:15:02'),
(54, 'images/jBhi9kIJj4XepGjxBtnfs7OmDaM996mh2nIDbisM.jpg', NULL, NULL, '2024-10-09 08:15:02', '2024-10-09 08:15:02'),
(55, 'http://localhost:8000/storage/images/0hmSny2yZrIiXW2DTJIJyBc8pD6NNWB13ugqLFHs.jpg', NULL, NULL, '2024-10-10 12:34:19', '2024-10-10 12:34:19'),
(56, 'http://localhost:8000/storage/images/5sY0mirZkViKstVDI3Zy5DWsjD1MoiqmtxHlE8ct.jpg', NULL, NULL, '2024-10-10 12:34:19', '2024-10-10 12:34:19'),
(57, 'http://localhost:8000/storage/images/9eP3N25ewoO0oKhfmuCg68OXaaRS8TTOqEhFYrw4.jpg', NULL, NULL, '2024-10-10 12:34:19', '2024-10-10 12:34:19'),
(58, 'http://localhost:8000/storage/images/4BVVMzZFnV3xzoEuRHRR1wDeqtgthFeseaPrSZHd.jpg', NULL, NULL, '2024-10-10 12:40:26', '2024-10-10 12:40:26'),
(59, 'http://localhost:8000/storage/images/szRE5svMau31GwQhrxrb85B6uJaN8fReRUixekBu.jpg', NULL, NULL, '2024-10-10 12:40:26', '2024-10-10 12:40:26'),
(60, 'http://localhost:8000/storage/images/p42YXO0ObeMxHc3zq7L4CYTPVL4eF21rCjH3tUJu.jpg', NULL, NULL, '2024-10-10 12:40:26', '2024-10-10 12:40:26'),
(61, 'http://localhost:8000/storage/images/BHdatLF4e26VMRAMWXZRB8I0P6x2utt2gvfk9xan.jpg', NULL, NULL, '2024-10-10 12:44:18', '2024-10-10 12:44:18'),
(62, 'http://localhost:8000/storage/images/VGdVDZUwR5yKlFYJN067by0mx557tVw31jxB6anf.jpg', NULL, NULL, '2024-10-10 12:44:18', '2024-10-10 12:44:18'),
(63, 'http://localhost:8000/storage/images/cfLra5srxmdb3LG5GFrIGlv2Rc0pGlWj53pWIgvB.jpg', NULL, NULL, '2024-10-10 12:44:18', '2024-10-10 12:44:18'),
(64, 'http://localhost:8000/storage/images/T0TSl0yZnZswfq3bajFZSrcSxEDrSmvKCMa1phgD.jpg', NULL, NULL, '2024-10-10 12:46:36', '2024-10-10 12:46:36'),
(65, 'http://localhost:8000/storage/images/MnJtAxbYbvQJ6GzSy4uuwRTaCaCo6hKzJCWBE862.jpg', NULL, NULL, '2024-10-10 12:46:36', '2024-10-10 12:46:36'),
(66, 'http://localhost:8000/storage/images/Af6WsTioLAcJ9KYPM8MBBu06xuQaPJMWAuMWH7bi.jpg', NULL, NULL, '2024-10-10 12:46:36', '2024-10-10 12:46:36'),
(67, 'http://localhost:8000/storage/images/6tTQN7yPUpI9urM4aznFZ3AIKsHLfcTvyST5Xpfi.jpg', NULL, NULL, '2024-10-10 13:04:20', '2024-10-10 13:04:20'),
(68, 'http://localhost:8000/storage/images/jZgQfbcVXOcohCU5ixBwjCaoFEgCbl8KTH0OMUCV.jpg', NULL, NULL, '2024-10-10 13:04:20', '2024-10-10 13:04:20'),
(69, 'http://localhost:8000/storage/images/3ukSWCAx9IvpCI7f4xxpWLGng6Od21oAv2UouIYz.jpg', NULL, NULL, '2024-10-10 13:04:20', '2024-10-10 13:04:20'),
(70, 'http://localhost:8000/storage/images/Ggfpt6y9uiiUPgFGmfidksY4NLaDtAxEvecamG5J.jpg', NULL, NULL, '2024-10-10 13:11:44', '2024-10-10 13:11:44'),
(71, 'http://localhost:8000/storage/images/da6b3RxxjiaX9FNPcv0gEwy5RC0SkQd5GF2H7vWB.jpg', NULL, NULL, '2024-10-10 13:11:44', '2024-10-10 13:11:44'),
(72, 'http://localhost:8000/storage/images/koKNVPh2N4dW0r4difqeuENHx5Uc9vXDMpYCpRzY.jpg', NULL, NULL, '2024-10-10 13:11:44', '2024-10-10 13:11:44'),
(73, 'http://localhost:8000/storage/images/UNFD56SFDDd0HzUFaxUK0UXfhwIfy5nx5xrxFgdf.jpg', NULL, NULL, '2024-10-10 13:15:08', '2024-10-10 13:15:08'),
(74, 'http://localhost:8000/storage/images/OupfQvXNk98uQcVNdSZTCFVy2NDn5SKVJCFQ70CE.jpg', NULL, NULL, '2024-10-10 13:15:08', '2024-10-10 13:15:08'),
(75, 'http://localhost:8000/storage/images/c8GHRj7xkfGtYYXeufBDzYLjrkUclFbc5l9iONil.jpg', NULL, NULL, '2024-10-10 13:15:08', '2024-10-10 13:15:08'),
(76, 'http://localhost:8000/storage/images/Ann9TdcS8m8eCEk9mzqMOMngcUhahnv9A1Hzmvks.jpg', NULL, NULL, '2024-10-10 13:19:18', '2024-10-10 13:19:18'),
(77, 'http://localhost:8000/storage/images/sozR6kTCKAJak5xylcdCLikflIUBIvi4Io4cJ1U9.jpg', NULL, 51, '2024-10-10 13:29:25', '2024-10-10 13:29:25'),
(78, 'http://localhost:8000/storage/images/KtrS1MPUqNevxf4lfADCFb7nh1VPBCLGF0UCs89y.jpg', NULL, 51, '2024-10-10 13:29:25', '2024-10-10 13:29:25'),
(79, 'http://localhost:8000/storage/images/TTLxkRLGLPZF9bYyvlQJW5ZkWfa88iHgvmZ6h6BU.jpg', NULL, 51, '2024-10-10 13:29:25', '2024-10-10 13:29:25'),
(80, 'http://localhost:8000/storage/images/CAE4mVLPOEQSzPgvDiTqgIgGfQVVRcjZAxldZEhc.jpg', NULL, NULL, '2024-10-10 13:53:31', '2024-10-10 13:53:31'),
(81, 'http://localhost:8000/storage/images/9LZY7bKBN6e9TgZFnbU1SnIMhgtblJdJyBN0qkBX.jpg', NULL, NULL, '2024-10-10 13:53:31', '2024-10-10 13:53:31'),
(82, 'http://localhost:8000/storage/images/dzO5QGHU9wT9o1QE4n9f6X8WZJ9wG6X24V9O19Dz.jpg', NULL, NULL, '2024-10-10 13:53:31', '2024-10-10 13:53:31'),
(83, 'http://localhost:8000/storage/images/WMNsh4Y1fjXHl2CQSiIaB2xMO8XlYeBvBrMEjrlO.jpg', NULL, 53, '2024-10-10 13:55:43', '2024-10-10 13:55:43');

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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_09_01_071446_create_roles_table', 1),
(5, '2024_09_01_071545_create_users_table', 1),
(6, '2024_09_01_071614_create_categories_table', 1),
(7, '2024_09_01_071627_create_homes_table', 1),
(8, '2024_09_01_071639_create_comments_table', 1),
(9, '2024_09_01_071702_create_favorite_homes_table', 1),
(10, '2024_09_01_071717_create_images_table', 1),
(11, '2024_09_01_071931_create_home_user_table', 1),
(12, '2024_10_09_174049_add_rating_to_comments_table', 2),
(13, '2024_10_09_182229_create_appointments_table', 3),
(14, '2024_10_10_103331_create_contacts_table', 4),
(15, '2024_10_10_125830_add_details_to_homes_table', 5),
(16, '2024_10_10_130625_add_bedrooms_and_location_to_homes_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'owner', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'tenant', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Yazan Abo Sbeah', 'khaitham1999@gmail.com', NULL, '$2y$12$7Buhm23VtXw8MS7wu0/Xoeru35BP5lzAA46eEQwT8ljwxcpwesFtm', 3, NULL, '2024-10-04 09:25:50', '2024-10-10 09:31:12'),
(3, 'yazan haitham1', 'yazan@gmail.com', NULL, '$2y$12$ButpZCFdQuj1a6bYVzhxuud58RnpJ4O9Ro2vGkF2lgxeIv67SYyhS', 1, NULL, '2024-10-05 08:25:27', '2024-10-10 15:00:54'),
(4, 'action', 'admin@example.com', NULL, '$2y$12$uqWmkiscLiDo3wP93xnUL.C9FZkgUnVYeFtSwxstgbvlY428qna9m', 2, NULL, '2024-10-05 08:25:58', '2024-10-10 11:53:38'),
(5, 'yazan 2222', '98o7yu@gregt.uyi', NULL, '$2y$12$628bQnYgDk4FkbRY3SH6A.lK6cM20QdQ2iTRLQM4U4I8h6ZAVbB8O', 1, NULL, '2024-10-05 11:59:29', '2024-10-05 11:59:29'),
(7, 'action3232', 'eyed@fr', NULL, '$2y$12$NwPTFVlEKNyybnaZ9fFy4up800Ft48FXenFbvvsn30EDpmhUo1Ss.', 1, NULL, '2024-10-06 09:11:07', '2024-10-06 09:11:07'),
(8, 'Yazan Abo Sbeah', 'y@y.y', NULL, '$2y$12$o7AzzjnyvGVfdpS0whWPbu9j7FoY44LU0gKKDZCJ/4bQsxUfANxPS', 1, NULL, '2024-10-08 13:25:08', '2024-10-08 13:25:08'),
(9, 'Yazan Abo Sbeah', 'yy@yy.com', NULL, '$2y$12$LiOL5uMkr4gkA/YlV09Uke.WOvVHWfKt76KKcpsMqyL/ORDt4WHXa', 2, NULL, '2024-10-09 15:29:08', '2024-10-09 15:29:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_home_id_foreign` (`home_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_home_id_foreign` (`home_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorite_homes`
--
ALTER TABLE `favorite_homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_homes_user_id_foreign` (`user_id`),
  ADD KEY `favorite_homes_home_id_foreign` (`home_id`);

--
-- Indexes for table `homes`
--
ALTER TABLE `homes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `homes_category_id_foreign` (`category_id`);

--
-- Indexes for table `home_user`
--
ALTER TABLE `home_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `home_user_user_id_foreign` (`user_id`),
  ADD KEY `home_user_home_id_foreign` (`home_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`),
  ADD KEY `images_home_id_foreign` (`home_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorite_homes`
--
ALTER TABLE `favorite_homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homes`
--
ALTER TABLE `homes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `home_user`
--
ALTER TABLE `home_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorite_homes`
--
ALTER TABLE `favorite_homes`
  ADD CONSTRAINT `favorite_homes_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorite_homes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `homes`
--
ALTER TABLE `homes`
  ADD CONSTRAINT `homes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `home_user`
--
ALTER TABLE `home_user`
  ADD CONSTRAINT `home_user_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `home_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_home_id_foreign` FOREIGN KEY (`home_id`) REFERENCES `homes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
