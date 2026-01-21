-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2026 at 01:59 AM
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
  `ram_kapasitas` varchar(10) NOT NULL,
  `ssd_merk` varchar(255) DEFAULT NULL,
  `ssd_kapasitas` varchar(10) NOT NULL,
  `hdd_merk` varchar(255) DEFAULT NULL,
  `hdd_kapasitas` varchar(10) NOT NULL,
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
(1, 'zein devano', 'PC Standalone', '02216', 'Windows 11', NULL, 'kingston', '256 GB', 'samsung', '1 TB', 'hdd', '2 TB', 'ms office 2016', 'Genuine', '2016', 'sekretariat', 'zein', 'OK', 'ya', 'perangkatutama/TceKr0b79xvZaoRL5S287ZmMWJ35QfYOTsjMqTgd.png', '2026-01-05 00:40:34', '2026-01-05 00:47:20'),
(2, 'B', 'Laptop', '126', 'Windows 11', NULL, 'kingston', '1GB', 'samsung', '!TB', 'dd', '2 GB', 'ms office 2018', 'Genuine', '2019', '126A', 'B', 'OK', 'oke', 'perangkatutama/EXBplAYj8UMxvuIy4Yfc4dgwI2QXgNagaiylqheE.png', '2026-01-06 21:39:07', '2026-01-06 21:39:07'),
(3, 'B', 'Smartphone', '126', 'Windows 11', NULL, 'kingston', '1GB', 'samsung', '!TB', 'dd', '2 GB', 'ms office 2018', 'Genuine', '2019', '126A', 'B', 'Upgrade', 'ruusak', 'perangkatutama/msq5hthj70dnrbfCdaemRdjPYZiYbr4l5SZXabfC.png', '2026-01-06 21:42:43', '2026-01-06 21:42:43'),
(4, 'G-10', 'PC Server', '126', 'Windows 11', NULL, 'kingston', '1GB', 'samsung', '!TB', 'dd', '2 GB', 'ms office 2018', 'Genuine', '2019', '126A', 'B', 'Upgrade', 'blm bagus', 'perangkatutama/n6rnXYN2ULLo3wKggVFVpbCM0qS5OZhAxveIWv2w.png', '2026-01-07 00:17:05', '2026-01-07 00:17:05');

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
(2, 'agus', 'Scanner', '1231112', 'canon', 'lbs', 'sekertariat', 'agus', 'periferal/4XCxO8p0eeQjNJwSGOwLoH7tePTaigfPv8IbLF7x.png', 'masih oke', '2026-01-05 23:35:32', '2026-01-05 23:35:32'),
(3, 'bayu', 'AIO', '1097', 'HP', 'jetski', 'pelayanan', 'udin', 'periferal/WWUUNTviGZOFb6wIAFfI7AZrq05l57FBPcNWlaQA.png', 'lemot', '2026-01-06 00:50:54', '2026-01-06 00:50:54'),
(4, 'A', 'Printer', '12', 'epson', 'r', '12A', 'udin', 'periferal/RkeGqZboIKIh5xun7LEag81tAuKRnWbbyPnE7scE.png', 'no 3', '2026-01-06 21:35:57', '2026-01-06 21:35:57'),
(5, 'C', 'Akses Point', '128-A', 'hp', 'pro', '128B', 'santo', 'periferal/WzPrBSegKK6KUuKKAAEbpubZBZtl6X1a7VmNkhEe.png', 'ya masih oke', '2026-01-06 21:41:12', '2026-01-06 23:06:19'),
(6, 'C', 'Akses Point', '128', 'hp', 'pro', '128B', 'santo', 'periferal/tW6aWbemJ5yD1cWpViefJDPQGNiCVfxr1Lx1uTSN.png', 'ya masih oke', '2026-01-06 21:41:37', '2026-01-06 21:41:37'),
(7, 'D', 'Switch-Hub', '190', 'HP', 'pro', 'LT 120', 'Bagus', 'periferal/ZfaGYLilaRu47RcS1IQeuSFYsyacAj5JPFiZwhl0.png', 'ke-6', '2026-01-06 23:05:58', '2026-01-06 23:05:58'),
(8, 'E', 'Modem', '110', 'Epson', 'p', 'Sekertariat', 'budi', 'periferal/O21AS1QDsaxG7JdC82pkEYTfM9pWk3hBTUTpHdyI.png', 'baru01', '2026-01-06 23:07:51', '2026-01-06 23:08:38'),
(9, 'F', 'Printer', '917', 'HP', 'ca', 'lt 1', 'F', 'periferal/EL4ORM8EZKuKoGhSTtbMtZK19VEJNkP44vPkD1fU.png', 'jsajsaj', '2026-01-06 23:10:37', '2026-01-06 23:10:37'),
(10, 'G-9', 'Switch-Hub', '543', 'HP', 'prod', 'pelayanan', 'G-9', 'periferal/nP5Grr04HMwVQ4QXoHTNwnVFFP05JSXmlaayrN7O.png', 'bagus', '2026-01-06 23:11:38', '2026-01-06 23:11:38'),
(11, 'H-1', 'AIO', '998', 'canon', 'proj', 'IT', 'ari', 'periferal/qdT1sZkT7IMWsX9YlljkxD5bHWO8DMAmLKjHrHLb.png', 'b-', '2026-01-06 23:12:57', '2026-01-06 23:12:57'),
(12, 'I-11', 'Scanner', '134', 'HP', 'Pro', 'LTp', 'busi', 'periferal/ErOles6vF1e8mYmvyKP0HTSAmhwikNzXyGvuFCvq.png', 'ke-11', '2026-01-06 23:13:39', '2026-01-06 23:13:39');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_perangkat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_pemeliharaans`
--

INSERT INTO `request_pemeliharaans` (`id`, `tanggal_aduan`, `kerusakan`, `user_aduan`, `tanggal_penanganan`, `nama_penanganan`, `tindakan`, `status`, `created_at`, `updated_at`, `jenis_perangkat`) VALUES
(3, '2026-01-07', 'jaringan hilang', 'zein', '2026-01-16', 'pak budi', 'belum dikerjakan', 'Pending', '2026-01-05 23:33:51', '2026-01-07 00:43:30', 'zein devano'),
(4, '2026-02-05', 'jaringan hilang semua', 'zein', '2026-02-07', 'pak budi utomo', 'done', 'Selesai', '2026-01-06 00:41:01', '2026-01-06 00:41:01', 'zein devano'),
(5, '2026-01-06', 'perangkat lemot', 'bayu', '2026-01-07', 'agus', 'done semua', 'Selesai', '2026-01-06 00:52:04', '2026-01-06 00:52:04', 'bayu'),
(6, '2026-01-07', 'A', 'A', '2026-01-08', 'D', 'Y', 'Pending', '2026-01-06 23:35:28', '2026-01-07 01:21:06', 'zein devano'),
(7, '2026-01-07', 'R', 'R', NULL, NULL, NULL, 'Pending', '2026-01-06 23:42:30', '2026-01-06 23:42:30', 'zein devano'),
(8, '2026-01-08', 'y', 'y', NULL, NULL, NULL, 'Pending', '2026-01-06 23:42:54', '2026-01-06 23:42:54', 'zein devano'),
(9, '2026-01-09', 'k', 'k', NULL, NULL, NULL, 'Pending', '2026-01-06 23:43:23', '2026-01-06 23:43:23', 'zein devano'),
(10, '2026-01-08', 'p', 'p', NULL, NULL, NULL, 'Pending', '2026-01-06 23:43:57', '2026-01-06 23:43:57', 'zein devano'),
(11, '2026-01-10', 'Q', 'Q', NULL, NULL, NULL, 'Pending', '2026-01-06 23:44:22', '2026-01-06 23:44:22', 'zein devano'),
(12, '2026-01-20', 'c', 'C', NULL, NULL, NULL, 'Pending', '2026-01-06 23:44:54', '2026-01-06 23:44:54', 'zein devano'),
(13, '2026-01-15', 'B', 'B', NULL, NULL, NULL, 'Pending', '2026-01-06 23:45:16', '2026-01-06 23:45:16', 'zein devano'),
(14, '2026-01-29', 'Hhh', 'H', NULL, NULL, NULL, 'Selesai', '2026-01-06 23:45:37', '2026-01-07 01:04:52', 'zein devano');

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
('VnuGBmJNqhvvqxQtsgBGfVEgydUSEoJuMPj6llno', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN3V2YlhGWVJwSmJWT2VkT0lTNFU2Yks2VG05R2RiMzFFYk1adGs1SyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767774334);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periferals`
--
ALTER TABLE `periferals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_pemeliharaans`
--
ALTER TABLE `request_pemeliharaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
