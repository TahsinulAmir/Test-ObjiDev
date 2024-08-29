-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2024 at 04:58 AM
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
-- Database: `db-objidev-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_id` bigint(20) UNSIGNED NOT NULL,
  `penerbit_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `thn_terbit` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul_buku`, `penulis_id`, `penerbit_id`, `kategori_id`, `thn_terbit`, `jumlah`, `deskripsi`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Malin Kundang', 3, 2, 1, 2000, 4, 'Ini buku malin kundang', NULL, '2024-08-28 19:58:14', '2024-08-28 19:58:14'),
(2, 'Perjuangan Pahlawan', 2, 1, 3, 2010, 3, 'Ini buku perjuangan pahlawan', NULL, '2024-08-28 19:58:14', '2024-08-28 19:58:14'),
(3, 'Sang Pahlawan', 3, 1, 3, 2010, 6, 'Ini buku sang pahlawan', NULL, '2024-08-28 19:58:14', '2024-08-28 19:58:14'),
(4, 'Mencari Nemo', 2, 2, 2, 2003, 19, 'Ini buku mencari nemo', NULL, '2024-08-28 19:58:14', '2024-08-28 19:58:14'),
(5, 'Jas Merah', 2, 3, 2, 1999, 6, 'Ini buku jas merah', NULL, '2024-08-28 19:58:14', '2024-08-28 19:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`id`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'Cerita Rakyat', '2024-08-28 19:58:06', '2024-08-28 19:58:06'),
(2, 'Cerita Fiksi', '2024-08-28 19:58:06', '2024-08-28 19:58:06'),
(3, 'Sejarah', '2024-08-28 19:58:06', '2024-08-28 19:58:06');

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
(21, '0001_01_01_000000_create_users_table', 1),
(22, '2024_08_27_072334_create_kategori_buku_table', 1),
(23, '2024_08_27_072431_create_penerbit_buku_table', 1),
(24, '2024_08_27_072458_create_buku_table', 1);

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
-- Table structure for table `penerbit_buku`
--

CREATE TABLE `penerbit_buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `no_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `deskripsi_penerbit` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penerbit_buku`
--

INSERT INTO `penerbit_buku` (`id`, `nama`, `alamat`, `no_phone`, `email`, `website`, `deskripsi_penerbit`, `created_at`, `updated_at`) VALUES
(1, 'Alex Publisher', 'Sleman', '09882346724', 'alex.publisher@alexpublisher.id', NULL, NULL, '2024-08-28 19:58:10', '2024-08-28 19:58:10'),
(2, 'CV. Bintang Raya', 'Bandung', '92342734785', 'bintangraya@bintangraya.id', NULL, NULL, '2024-08-28 19:58:10', '2024-08-28 19:58:10'),
(3, 'PT. Medeka', 'Jakarta', '3294792834979', 'merdeka@merdeka.com', NULL, NULL, '2024-08-28 19:58:10', '2024-08-28 19:58:10');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_phone` bigint(20) DEFAULT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `role` enum('admin','penulis') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_phone`, `gender`, `role`, `alamat`, `foto`, `deskripsi`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', 12345564, 'L', 'admin', 'Yogyakarta', NULL, NULL, '$2y$12$5wY4LF4nPwH8ZDIYEOqooOoDf8rnbKDx.ytYy/TpjjO2nZvIZSUGS', '2024-08-28 19:57:59', 'vQcvr7OepF', '2024-08-28 19:58:01', '2024-08-28 19:58:01'),
(2, 'Amir', 'amir@gmail.com', 123435564, 'L', 'penulis', 'Semarang', NULL, NULL, '$2y$12$jDI5YgLHraVlWKUozdy3/OtATJmYrE/W4G5Qixc8jVXsgNkVROq2u', '2024-08-28 19:58:01', '9aftWdDDYW', '2024-08-28 19:58:01', '2024-08-28 19:58:01'),
(3, 'Tahsinul', 'tahsinul@gmail.com', 123435564, 'L', 'penulis', 'Surabaya', NULL, NULL, '$2y$12$B6DFyTYr.UdZa03UNuFQS.zzVrD40mtHg/jZbrfjerSr0H6U0vjJS', '2024-08-28 19:58:01', '0WfwGdVBIl', '2024-08-28 19:58:02', '2024-08-28 19:58:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_penulis_id_foreign` (`penulis_id`),
  ADD KEY `buku_penerbit_id_foreign` (`penerbit_id`),
  ADD KEY `buku_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `penerbit_buku`
--
ALTER TABLE `penerbit_buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_buku` (`id`),
  ADD CONSTRAINT `buku_penerbit_id_foreign` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit_buku` (`id`),
  ADD CONSTRAINT `buku_penulis_id_foreign` FOREIGN KEY (`penulis_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
