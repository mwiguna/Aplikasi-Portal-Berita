-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2016 at 02:39 PM
-- Server version: 5.7.16-0ubuntu0.16.10.1
-- PHP Version: 7.0.8-3ubuntu3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dilihat` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beritas`
--

INSERT INTO `beritas` (`id`, `judul`, `kategori`, `foto`, `isi`, `path`, `dilihat`, `created_at`, `updated_at`) VALUES
(4, 'Donald Trump Jadi Presiden Kuvukiland!!', 'Nasional, Ekonomi', '2016_11_13_11_03_48_logic.jpg', '<p>Telah dapat dipastikan bahwa Donald Trump akan menjadi presiden Kuvukiland!! Itu wajar, karena pesaing nya kepala suku semua, diduga warga tidak mau lagi berada dalam pemeritahan suku. Mereka berbondong-bondong ingin mengubah pemerintahan mereka ke menjadi republik!\r\nDonald trump bekerja sama dengan Paman Gober agar dapat mengatur pemerintahannya.</p>', 'Donald-Trump-Jadi-Presiden-Kuvukiland!!', 98, '2016-12-01 04:03:48', '2016-12-04 04:05:36'),
(5, 'Nvidia Keluarkan Seri GTX1080 Terbaru', 'Teknologi, Olahraga', '2016_11_13_11_40_24_newsf.jpg', '<p>Ini dia terbaru dari NVIDIA!&nbsp;Untuk memastikan kenyamanan penggunaan internet ada baiknya kita batasi saja berapa banyak klien atau host yang disediakan oleh DHCP server dari modem. Yang saya gunakan disini adalah TP-LINK TD-W8151N, untuk model lainnya tidak ada perbedaan signifikan jadi tinggal diadaptasikan saja.</p>', 'Nvidia-Keluarkan-Seri-GTX1080-Terbaru', 23, '2016-12-02 04:40:24', '2016-12-06 03:06:03'),
(8, 'Pemain Golf KALAH dari Pemain Catur!! (Wtf!!??)', 'Olahraga', '2016_11_13_18_08_19_p9220572.jpg', '<p>The PHP development team announces the immediate availability of PHP 7.1.0 Release Candidate 6. This release is the sixth and final release candidate for 7.1.0. All users of PHP are encouraged to test this version carefully, and report any bugs and incompatibilities in the bug tracking system.</p><p>The PHP development team announces the immediate availability of PHP 7.1.0 Release Candidate 5. This release is the fifth release candidate for 7.1.0. All users of PHP are encouraged to test this version carefully, and report any bugs and incompatibilities in the bug tracking system.</p>', 'Pemain-Golf-KALAH-dari-Pemain-Catur!!-(Wtf!!)', 257, '2016-12-03 11:08:19', '2016-12-06 03:15:01'),
(9, 'Apa yang Terjadi Jika Perang Dunia Ketiga?', 'Nasional, Health', '2016_11_14_09_54_08_Selection_004.png', '<p>Akankah anak SMK menyerang???? &nbsp;Masih misteri!</p>', 'Apa-yang-Terjadi-Jika-Perang-Dunia-Ketiga', 163, '2016-11-13 11:30:08', '2016-12-06 03:03:36'),
(10, 'Aksi Damai', 'Nasional', '2016_12_06_10_09_30_Selection_003.png', '<p>Aksi damai berjalan lancar.</p>', 'Aksi-Damai', 1, '2016-12-06 03:09:30', '2016-12-06 03:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `isi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `isi`, `created_at`, `updated_at`) VALUES
(12, 2, 10, 0, 'Saya ini', '2016-11-17 15:43:48', '2016-11-17 15:43:48'),
(13, 2, 4, 0, 'Keren! Apalagi waktu gober geleng2 di jalan itu gan!', '2016-11-17 15:45:03', '2016-11-17 15:45:03'),
(15, 2, 8, 0, 'Judul sama isi kok gak sesuai mas? Jangan2 ini konspirasi ya?', '2016-11-17 16:03:53', '2016-11-17 16:03:53'),
(17, 2, 8, 0, 'maaf mas keteken', '2016-11-17 16:04:49', '2016-11-17 16:04:49'),
(18, 2, 8, 0, 'apa sih lagi ya hehe coba', '2016-11-17 16:05:30', '2016-11-18 03:19:38'),
(19, 2, 10, 0, 'Apa nya?', '2016-11-17 16:07:36', '2016-11-17 16:07:36'),
(20, 2, 10, 0, 'Apa nya sayang', '2016-11-17 16:26:06', '2016-11-17 16:26:06'),
(21, 2, 10, 0, 'tes lagi ah', '2016-11-17 16:27:49', '2016-11-17 16:27:49'),
(22, 2, 8, 0, 'hehe dedek', '2016-11-18 03:22:12', '2016-11-18 03:22:12'),
(23, 2, 9, 0, 'Misteri ini!', '2016-11-25 02:45:15', '2016-11-25 02:45:15'),
(25, 1, 9, 0, '@Tiqa jadi gini sistem nya masih ngabal', '2016-11-25 03:47:12', '2016-11-25 03:47:12'),
(30, 1, 9, 25, 'oke pak!', '2016-11-27 12:25:20', '2016-11-27 12:25:20'),
(31, 1, 9, 25, 'Apanya?', '2016-11-27 12:42:28', '2016-11-27 12:42:28'),
(32, 1, 8, 17, 'Gapapa sayang', '2016-11-27 12:56:57', '2016-11-27 12:56:57'),
(33, 1, 8, 17, 'apaan sih', '2016-11-27 13:00:18', '2016-11-27 13:00:18'),
(34, 2, 9, 25, ':)', '2016-11-27 15:07:52', '2016-11-27 15:07:52'),
(35, 2, 9, 23, 'Apanya dek?', '2016-11-29 03:03:06', '2016-11-29 03:03:06'),
(36, 2, 9, 23, 'de', '2016-11-29 03:03:16', '2016-11-29 03:03:16'),
(37, 2, 9, 23, 'gak sih', '2016-11-29 03:03:56', '2016-11-29 03:03:56'),
(38, 2, 4, 13, 'yaya', '2016-11-29 03:05:33', '2016-11-29 03:05:33'),
(39, 1, 9, 25, 'tes', '2016-12-04 04:11:52', '2016-12-04 04:11:52'),
(40, 3, 5, 0, 'Mantap gan', '2016-12-06 03:06:16', '2016-12-06 03:06:16'),
(41, 3, 8, 18, 'iya', '2016-12-06 03:07:21', '2016-12-06 03:07:21');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `ir` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `parent_id`, `ir`, `created_at`, `updated_at`) VALUES
(10, 1, 8, 17, 0, '2016-11-27 13:57:35', '2016-11-27 13:57:35'),
(11, 1, 8, 15, 0, '2016-11-27 13:57:36', '2016-11-27 13:57:36'),
(14, 2, 8, 17, 0, '2016-11-27 14:30:16', '2016-11-27 14:30:16'),
(18, 2, 4, 13, 0, '2016-11-29 03:12:59', '2016-11-29 03:12:59'),
(20, 2, 9, 25, 0, '2016-11-29 03:28:36', '2016-11-29 03:28:36'),
(21, 1, 8, 18, 0, '2016-11-29 03:35:56', '2016-11-29 03:35:56'),
(22, 1, 9, 25, 0, '2016-12-04 04:12:03', '2016-12-04 04:12:03'),
(23, 3, 8, 18, 0, '2016-12-06 03:07:29', '2016-12-06 03:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_11_12_154139_create_table_berita', 2),
(4, '2016_11_17_140815_create_table_comment', 3),
(5, '2016_11_27_132409_create_table_like', 4),
(6, '2016_11_29_023748_create_table_notification', 5),
(7, '2016_11_29_040545_create_table_visitors', 6);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parentuser_id` int(11) DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `post_id`, `parent_id`, `parentuser_id`, `type`, `created_at`, `updated_at`) VALUES
(2, 2, 4, 13, 2, 0, '2016-11-29 03:05:33', '2016-11-29 03:05:33'),
(3, 2, 4, 13, 2, 0, '2016-11-29 03:12:59', '2016-11-29 03:12:59'),
(4, 2, 9, 23, 2, 1, '2016-11-29 03:15:44', '2016-11-29 03:15:44'),
(5, 2, 9, 25, 1, 1, '2016-11-29 03:28:36', '2016-11-29 03:28:36'),
(6, 1, 8, 18, 2, 1, '2016-11-29 03:35:57', '2016-11-29 03:35:57'),
(7, 1, 9, 25, 1, 0, '2016-12-04 04:11:52', '2016-12-04 04:11:52'),
(8, 1, 9, 25, 1, 1, '2016-12-04 04:12:03', '2016-12-04 04:12:03'),
(9, 3, 8, 18, 2, 0, '2016-12-06 03:07:21', '2016-12-06 03:07:21'),
(10, 3, 8, 18, 2, 1, '2016-12-06 03:07:29', '2016-12-06 03:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'profile.png',
  `alamat` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `nohp` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profile`, `alamat`, `tgl_lahir`, `nohp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Portal Berita', 'admin@portal.com', '$2y$10$7.er79dZ/Wtm.1EJkKZTROaTxGZ11L0lAJmINE1KXuHcWHmhbmoyS', 'profile.png', '', '0000-00-00', '', 'UZdCNUyv1rYiO3yKooxMhRPTg4OJP2HNI6FLyBA5TEPsY0jfQBaMaIxGaPZf', '2016-11-12 04:33:38', '2016-12-03 21:12:12'),
(2, 'Tiqa', 'tiqa@portal.com', '$2y$10$LYZc0V5gCl6DDFDC8wGFne7Z4pFCeGnKxYViDL.T8fn9vekPOuxZ2', 'profile_navy.png', 'Jambi', '1997-02-05', '', '3DWjoezG0K6SgKXPGowtah4v1SCaZVXvpDzFdyChlsQF9sewQB6qtgf4Unmu', '2016-11-12 09:20:12', '2016-11-28 20:44:22'),
(3, 'Andi ', 'andi@gmail.com', '$2y$10$Jsx/BY98zPvzvhCVNQozL.0QuCS3nLTl13RYwDU1BJYKqLbbdwmCG', 'profile.png', NULL, NULL, NULL, 'vObvWZCnw9TyvDoUkKUhZaect95JAIAELypHO0Etn9BAtut4eVbThaeZrb3Y', '2016-12-05 20:05:29', '2016-12-05 20:07:51');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `created_at`, `updated_at`) VALUES
(1, '2016-11-29 04:10:09', '2016-11-29 04:10:09'),
(2, '2016-11-29 04:10:18', '2016-11-29 04:10:18'),
(3, '2016-11-29 04:15:05', '2016-11-29 04:15:05'),
(4, '2016-11-29 04:15:07', '2016-11-29 04:15:07'),
(5, '2016-10-29 04:15:09', '2016-11-29 04:15:09'),
(6, '2016-11-28 04:15:10', '2016-11-29 04:15:10'),
(7, '2016-12-04 03:50:55', '2016-12-04 03:50:55'),
(8, '2016-12-04 04:04:42', '2016-12-04 04:04:42'),
(9, '2016-12-04 04:05:36', '2016-12-04 04:05:36'),
(10, '2016-12-04 04:06:11', '2016-12-04 04:06:11'),
(11, '2016-12-04 04:11:46', '2016-12-04 04:11:46'),
(12, '2016-12-04 04:12:01', '2016-12-04 04:12:01'),
(13, '2016-12-04 04:12:05', '2016-12-04 04:12:05'),
(14, '2016-12-06 03:03:36', '2016-12-06 03:03:36'),
(15, '2016-12-06 03:03:50', '2016-12-06 03:03:50'),
(16, '2016-12-06 03:06:03', '2016-12-06 03:06:03'),
(17, '2016-12-06 03:06:50', '2016-12-06 03:06:50'),
(18, '2016-12-06 03:09:45', '2016-12-06 03:09:45'),
(19, '2016-12-06 03:15:02', '2016-12-06 03:15:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `beritas_path_unique` (`path`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
