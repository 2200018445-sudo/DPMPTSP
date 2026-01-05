-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2025 at 07:51 AM
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
-- Database: `magang2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_12_15_073510_create_periferals_table', 1),
(5, '2025_12_16_011810_create_perangkat_utamas_table', 1),
(6, '2025_12_17_042119_create_request_pemeliharaans_table', 1);

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
-- Table structure for table `perangkat_utamas`
--

CREATE TABLE `perangkat_utamas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perangkat` varchar(255) NOT NULL,
  `jenis_perangkat` varchar(255) NOT NULL,
  `id_perangkat` varchar(255) NOT NULL,
  `os` varchar(255) NOT NULL,
  `os_status` varchar(255) DEFAULT NULL,
  `ram_merk` varchar(255) NOT NULL,
  `ram_kapasitas` int(11) NOT NULL,
  `ssd_merk` varchar(255) DEFAULT NULL,
  `ssd_kapasitas` int(11) DEFAULT NULL,
  `hdd_merk` varchar(255) DEFAULT NULL,
  `hdd_kapasitas` int(11) DEFAULT NULL,
  `office_nama` varchar(255) DEFAULT NULL,
  `office_status` varchar(255) DEFAULT NULL,
  `tahun_produksi` year(4) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `pengguna` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perangkat_utamas`
--

INSERT INTO `perangkat_utamas` (`id`, `nama_perangkat`, `jenis_perangkat`, `id_perangkat`, `os`, `os_status`, `ram_merk`, `ram_kapasitas`, `ssd_merk`, `ssd_kapasitas`, `hdd_merk`, `hdd_kapasitas`, `office_nama`, `office_status`, `tahun_produksi`, `posisi`, `pengguna`, `status`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'zein devano', 'PC Standalone', '02216', 'Windows 11', NULL, 'kingston', 256, 'samsung', 1, 'hdd', 2, 'ms office 2016', 'Genuine', '2016', 'sekretariat', 'zein', 'Upgrade', 'ngelag', 'perangkatutama/ttK4WaEcmTQ6Kj1VIIBHbRrsPd4paipdszZ42mrM.png', '2025-12-29 19:16:41', '2025-12-29 19:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `periferals`
--

CREATE TABLE `periferals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_perangkat` varchar(255) NOT NULL,
  `jenis_perangkat` varchar(255) NOT NULL,
  `id_perangkat` varchar(255) NOT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `pengguna` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periferals`
--

INSERT INTO `periferals` (`id`, `nama_perangkat`, `jenis_perangkat`, `id_perangkat`, `merk`, `tipe`, `posisi`, `pengguna`, `foto`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'budiono', 'Switch-Hub', '0976', 'canon', 'lpb pro', 'tsp 1', 'budiono', 'periferal/5PunLUnhIkzoo3FaFaSy2FlK0VAzgqzjwegNHZoy.png', 'amann12', '2025-12-29 19:17:39', '2025-12-29 19:41:02');

-- --------------------------------------------------------

--
-- Table structure for table `request_pemeliharaans`
--

CREATE TABLE `request_pemeliharaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_aduan` date NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `user_aduan` varchar(255) NOT NULL,
  `tanggal_penanganan` date DEFAULT NULL,
  `nama_penanganan` varchar(255) DEFAULT NULL,
  `tindakan` text DEFAULT NULL,
  `status` enum('Pending','Selesai') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_pemeliharaans`
--

INSERT INTO `request_pemeliharaans` (`id`, `tanggal_aduan`, `kerusakan`, `user_aduan`, `tanggal_penanganan`, `nama_penanganan`, `tindakan`, `status`, `created_at`, `updated_at`) VALUES
(1, '2025-12-30', 'rusak mesinnya', 'zein', '2026-01-01', 'agus', 'blm bisa', 'Pending', '2025-12-29 19:18:31', '2025-12-29 19:39:29');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('js09fybHPzxSozofmZIdqTDvaALYbxXikFXDJ98f', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTFRkZnE3NDNvQklnYWtROWM2NEthMndVY3V0TTlEaW55N1FYaFJkcSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJhbmdrYXQtdXRhbWEiO3M6NToicm91dGUiO3M6MTQ6InBlcmFuZ2thdHV0YW1hIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767076868),
('oLwrMiAuYcZnnegnX23uiXisUk1KGsT6UgBuUmIY', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZ05NWE5ZYm83aEFnQlV2Y1FJQjVMMUN1U0xPZmFONm5namVsQm14aiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767068881);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@dpmptsp.bantul.go.id', NULL, '$2y$12$pXPUybB2Tk3GXzJowMGMRuy9TrUm.12NoNHELsKDMrd3DdCmVmsSG', NULL, '2025-12-29 20:48:11', '2025-12-29 20:48:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
-- Indexes for table `perangkat_utamas`
--
ALTER TABLE `perangkat_utamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periferals`
--
ALTER TABLE `periferals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_pemeliharaans`
--
ALTER TABLE `request_pemeliharaans`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `perangkat_utamas`
--
ALTER TABLE `perangkat_utamas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periferals`
--
ALTER TABLE `periferals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `request_pemeliharaans`
--
ALTER TABLE `request_pemeliharaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
