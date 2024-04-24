-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2024 at 01:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tempahpustaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `bookingID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` bigint UNSIGNED DEFAULT NULL,
  `roomID` bigint UNSIGNED DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endtTime` time NOT NULL,
  `purpose` text COLLATE utf8mb4_unicode_ci,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `bookingID`, `userID`, `roomID`, `startDate`, `endDate`, `startTime`, `endtTime`, `purpose`, `status`, `created_at`, `updated_at`) VALUES
(1, '#GxJwy-00-2', 2, 1, '2024-04-03', '2024-04-03', '08:00:00', '16:00:00', 'Program Talk Kepimpinan Anjuran Kelab Kesatuan Pelajar Pantai Timur UTHM', 'ditolak', NULL, '2024-04-22 21:25:40'),
(3, '#lUg94-00-1', 3, 6, '2024-04-26', '2024-04-26', '08:00:00', '12:00:00', 'Perbincangan atas talian bersama Kelab Sahabat UTM', 'dibatalkan', '2024-04-23 15:33:25', '2024-04-23 16:22:07'),
(4, '#GtXbF-00-3', 3, 5, '2024-04-26', '2024-04-26', '08:15:00', '18:00:00', 'Program Talk Bicara Alumni Anjuran KKKP', 'dipohon', '2024-04-23 16:26:08', '2024-04-23 16:26:08');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint UNSIGNED NOT NULL,
  `ComplaintID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userID` bigint UNSIGNED DEFAULT NULL,
  `roomID` bigint UNSIGNED DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `ComplaintID`, `userID`, `roomID`, `category`, `complaint`, `feedback`, `status`, `created_at`, `updated_at`) VALUES
(1, '#ADUAN-01SAWE-00-2', 3, 6, 'Kemudahan', 'Smart TV tidak berfungsi - tidak boleh sambung ke WIFI', 'Maaf atas kesulitan yang diberi. Pihak kami melihat dan membuat semakan terhadap itu tersebut. Terima Kasih kerana memaklumkan kepada pihak kami untuk disegerakan baik pulih.', 'selesai', NULL, '2024-04-22 23:56:58'),
(2, '#ADUAN-bIjjS-00-3', 3, 1, 'kemudahan', 'Penghawa dingin tidak berfungsi', NULL, 'tiada tindakan', '2024-04-23 16:56:05', '2024-04-23 16:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_04_23_012405_create_rooms_table', 2),
(8, '2024_04_23_042822_create_bookings_table', 3),
(9, '2024_04_23_063807_create_complaints_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facility` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `location`, `capacity`, `facility`, `purpose`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Lestari 1', 'Aras 3', '50', '-1 Unit PA Sistem-1 Unit Projector-1 Unit Whiteboard', 'Taklimat/Kursus', 'ruang-UL345FNL-2024-04-23.jpg', NULL, '2024-04-23 10:19:15'),
(4, 'Tan Sri Johan Jaafar Corner', 'Aras 3', '10', '- Backdrop Staging- Set Sofa', 'Program Siaran Langsung / MOU', 'ruang-ysUmoOoI-2024-04-23.jpg', NULL, '2024-04-22 20:12:14'),
(5, 'Pentas Utama', 'Aras 2', '250', '- Backdrop Staging- Mini Pentas', 'Program Umum', 'ruang-nfBUV8ol-2024-04-23.jpg', NULL, '2024-04-22 20:12:23'),
(6, 'Makmal AI.LAB', 'Aras 2', '20', '- 1 Unit IDEA HUB TV- 2 Unit Smart TV- 1 Unit Live Conference Camera', 'Mesyuarat / Kursus / Perbincangan (Atas Talian)', 'ruang-r7MM2Lud-2024-04-23.jpg', NULL, '2024-04-22 20:13:10'),
(9, 'Lestari 2', 'Aras 3', '50', '- 1 Unit PA sistem - 1 Unit Projektor - 1 Unit White Board', 'Bengkel / Kursus / Seminar', 'ruang-SECUjNc4-2024-04-23.jpg', '2024-04-23 15:46:45', '2024-04-23 15:46:45'),
(10, 'Auditorium', 'Aras 3', '150', '- 1 Unit PA sistem - 1 Unit Projektor - 1 Unit White Board', 'Taklimat / Seminar / Bengkel', 'ruang-VCQKSbVN-2024-04-23.jpg', '2024-04-23 15:48:11', '2024-04-23 15:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `userID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `name`, `email`, `phoneNum`, `password`, `role`, `category`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@test', 'Abu Bin Ali', 'admin@gmail.com', '+6011-2345 7894', '$2y$12$xAWHdsl1H/uuxsz3lE2YquzuZkOyp2WaO6sI1izlOOq/O7Dh9wsZy', 'admin', 'Warga UTHM', 'aktif', NULL, '2024-04-22 06:14:08', '2024-04-23 10:48:06'),
(2, 'Amir01', 'Amir Imtiaz Bin Mohamad', 'amir21@gmail.com', '+6014-895 0014', '$2y$12$.mvkqjFkbggrozUY3KAkJeKKxsau/FGBF3xCJdPPWyIMjY2f0NycC', 'user', 'Warga UTHM', 'disekat', NULL, '2024-04-22 06:48:49', '2024-04-23 15:51:49'),
(3, 'NazrulUTHM', 'Naztul Alif Bin Saiful Hezri', 'nazrul@uthm.edu.my', '+6012-7844002', '$2y$12$pjEtbTKa.bTH1GtalRCXgu66ne8HGuIe2GgR.u/7br41jUaP36TNa', 'user', 'Warga UTHM', 'aktif', NULL, '2024-04-23 09:23:46', '2024-04-23 17:19:35'),
(4, 'SaifulMUTHM', 'Saiful Amri Bin Mutalib', 'saifulamri22@gmail.com', '+6017-7894561', '$2y$12$b.Q2qVJqBwS.QDtF04nf0eOQ6OknPr1.DkX5zvKQJtdEqyiJFYJfa', 'user', 'admin', 'aktif', NULL, '2024-04-23 15:05:04', '2024-04-23 15:18:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_userid_foreign` (`userID`),
  ADD KEY `bookings_roomid_foreign` (`roomID`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_userid_foreign` (`userID`),
  ADD KEY `complaints_roomid_foreign` (`roomID`);

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
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_roomid_foreign` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_roomid_foreign` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complaints_userid_foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
