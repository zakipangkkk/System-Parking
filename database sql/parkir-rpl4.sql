-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2026 at 01:31 PM
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
-- Database: `parkir-rpl4`
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
(4, '2026_02_09_121350_tb_user', 1),
(5, '2026_02_09_121538_tb_area_parkir', 1),
(6, '2026_02_09_121713_tb_tarif', 1),
(7, '2026_02_09_121815_tb_kendaraan', 1),
(8, '2026_02_09_121934_tb_transaksi', 1),
(9, '2026_02_09_122049_tb_log_aktivitas', 1);

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
('ylnuJITCrLoAOa1wvw2JgKP0Q4RyYRHBgwRL7kbZ', 9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicnJodmdmdjZLbFZsNXBsMnVRemwzYkJMQWNST2lGeWJ4YkJRbXZYdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC91c2VyIjtzOjU6InJvdXRlIjtzOjEwOiJ1c2VyLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1776935791);

-- --------------------------------------------------------

--
-- Table structure for table `tb_area_parkir`
--

CREATE TABLE `tb_area_parkir` (
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `nama_area` varchar(50) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `terisi` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_area_parkir`
--

INSERT INTO `tb_area_parkir` (`id_area`, `nama_area`, `kapasitas`, `terisi`, `created_at`, `updated_at`) VALUES
(1, 'Area AA', 50, 21, NULL, '2026-04-22 18:42:54'),
(2, 'Area B', 40, 16, NULL, '2026-04-21 22:57:22'),
(3, 'Area C', 30, 10, NULL, '2026-04-23 02:12:33'),
(4, 'Area D', 20, 5, NULL, NULL),
(5, 'Area VIP', 11, 3, NULL, '2026-04-22 19:06:32'),
(6, 'area z', 12, 0, '2026-04-22 19:08:44', '2026-04-23 02:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_tarif` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `plat_nomor`, `jenis_kendaraan`, `warna`, `pemilik`, `created_at`, `updated_at`, `id_tarif`) VALUES
(1, 'B 1234 AAA', 'motor', 'Hitam', 'Andi', NULL, '2026-03-27 18:50:35', 0),
(2, 'B 5678 BB', 'mobil', 'Putih', 'Budi', NULL, NULL, 0),
(3, 'D 9101 CC', 'motor', 'Merah', 'Citra', NULL, NULL, 0),
(4, 'F 2222 DD', 'mobil', 'Hitam', 'Dewi', NULL, NULL, 0),
(5, 'B 9999 EE', 'motor', 'Biru', 'Eko', NULL, NULL, 0),
(6, 'B 25029', 'vario', 'pinl', 'zaki', '2026-03-27 08:09:26', '2026-03-27 08:09:26', 0),
(7, 'B 4321', 'honda', 'biru', 'adit', '2026-03-29 05:08:36', '2026-03-29 05:08:36', 0),
(8, 'B 4321', 'honda', 'biru', 'adit', '2026-04-14 06:00:58', '2026-04-14 06:00:58', 0),
(9, 'B 12345', 'honda', 'biru', 'adit', '2026-04-14 06:14:39', '2026-04-14 06:14:39', NULL),
(10, 'B 098', 'mobil', 'pinkk', 'khilat', '2026-04-19 04:41:55', '2026-04-22 19:19:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_aktivitas`
--

CREATE TABLE `tb_log_aktivitas` (
  `id_log` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_log_aktivitas`
--

INSERT INTO `tb_log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu_aktivitas`, `created_at`, `updated_at`) VALUES
(3, 3, 'Proses kendaraan keluar', '2026-02-01 10:30:00', NULL, NULL),
(5, 4, 'Melihat laporan parkir', '2026-02-01 11:00:00', NULL, NULL),
(6, 9, 'User membuka log aktivitas', '2026-04-18 08:55:56', '2026-04-18 01:55:56', '2026-04-18 01:55:56'),
(7, 9, 'User membuka log aktivitas', '2026-04-18 08:56:50', '2026-04-18 01:56:50', '2026-04-18 01:56:50'),
(8, 9, 'User membuka log aktivitas', '2026-04-18 08:57:08', '2026-04-18 01:57:08', '2026-04-18 01:57:08'),
(9, 9, 'User membuka log aktivitas', '2026-04-18 08:57:30', '2026-04-18 01:57:30', '2026-04-18 01:57:30'),
(10, 8, 'Kendaraan masuk ID: ', '2026-04-23 02:33:34', '2026-04-22 19:33:34', '2026-04-22 19:33:34'),
(11, 8, 'kendaraan masuk ', '2026-04-23 08:46:18', '2026-04-23 01:46:18', '2026-04-23 01:46:18'),
(12, 9, 'LOGIN - User masuk ke sistem', '2026-04-23 09:03:17', '2026-04-23 02:03:17', '2026-04-23 02:03:17'),
(13, 9, 'User masuk ke sistem', '2026-04-23 09:07:33', '2026-04-23 02:07:33', '2026-04-23 02:07:33'),
(14, 8, 'User masuk ke sistem', '2026-04-23 09:10:42', '2026-04-23 02:10:42', '2026-04-23 02:10:42'),
(15, 8, 'kendaraan masuk ', '2026-04-23 09:10:59', '2026-04-23 02:10:59', '2026-04-23 02:10:59'),
(16, 8, 'kendaraan masuk ', '2026-04-23 09:11:16', '2026-04-23 02:11:16', '2026-04-23 02:11:16'),
(17, 8, 'kendaraan masuk ', '2026-04-23 09:11:20', '2026-04-23 02:11:20', '2026-04-23 02:11:20'),
(18, 8, 'kendaraan masuk ', '2026-04-23 09:11:22', '2026-04-23 02:11:22', '2026-04-23 02:11:22'),
(19, 9, 'User masuk ke sistem', '2026-04-23 09:11:30', '2026-04-23 02:11:30', '2026-04-23 02:11:30'),
(20, 8, 'User masuk ke sistem', '2026-04-23 09:12:00', '2026-04-23 02:12:00', '2026-04-23 02:12:00'),
(21, 8, 'kendaraan masuk ', '2026-04-23 09:12:15', '2026-04-23 02:12:15', '2026-04-23 02:12:15'),
(22, 8, 'kendaraan masuk ', '2026-04-23 09:12:28', '2026-04-23 02:12:28', '2026-04-23 02:12:28'),
(23, 8, 'kendaraan keluar ', '2026-04-23 09:12:31', '2026-04-23 02:12:31', '2026-04-23 02:12:31'),
(24, 8, 'kendaraan keluar ', '2026-04-23 09:12:33', '2026-04-23 02:12:33', '2026-04-23 02:12:33'),
(25, 9, 'User masuk ke sistem', '2026-04-23 09:12:42', '2026-04-23 02:12:42', '2026-04-23 02:12:42'),
(26, 10, 'User masuk ke sistem', '2026-04-23 09:12:56', '2026-04-23 02:12:56', '2026-04-23 02:12:56'),
(27, 9, 'User masuk ke sistem', '2026-04-23 09:13:11', '2026-04-23 02:13:11', '2026-04-23 02:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` bigint(20) UNSIGNED NOT NULL,
  `jenis_kendaraan` enum('motor','mobil','lainnya') NOT NULL,
  `tarif_per_jam` decimal(10,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `jenis_kendaraan`, `tarif_per_jam`, `created_at`, `updated_at`) VALUES
(1, 'motor', 2000, NULL, NULL),
(2, 'mobil', 5000, NULL, NULL),
(3, 'lainnya', 7000, NULL, NULL),
(5, 'mobil', 6000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_parkir` bigint(20) UNSIGNED NOT NULL,
  `id_kendaraan` bigint(20) UNSIGNED NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `id_tarif` bigint(20) UNSIGNED NOT NULL,
  `durasi_jam` int(11) DEFAULT NULL,
  `biaya_total` decimal(10,0) DEFAULT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_area` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_parkir`, `id_kendaraan`, `waktu_masuk`, `waktu_keluar`, `id_tarif`, `durasi_jam`, `biaya_total`, `status`, `id_user`, `id_area`, `created_at`, `updated_at`) VALUES
(1, 6, '2026-03-29 13:10:57', '2026-03-29 13:13:22', 1, 0, 0, 'keluar', 7, 1, '2026-03-29 06:10:57', '2026-03-29 06:13:22'),
(2, 6, '2026-03-29 13:19:23', '2026-03-29 13:25:34', 1, 0, 0, 'keluar', 7, 1, '2026-03-29 06:19:23', '2026-03-29 06:25:34'),
(3, 6, '2026-03-29 13:43:32', '2026-03-29 13:43:35', 1, 0, 0, 'keluar', 7, 1, '2026-03-29 06:43:32', '2026-03-29 06:43:35'),
(4, 6, '2026-03-31 04:35:32', '2026-03-31 04:35:44', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 21:35:32', '2026-03-30 21:35:44'),
(5, 6, '2026-03-31 05:32:31', '2026-03-31 05:33:48', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 22:32:31', '2026-03-30 22:33:48'),
(6, 6, '2026-03-31 05:34:37', '2026-03-31 05:34:54', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 22:34:37', '2026-03-30 22:34:54'),
(7, 6, '2026-03-31 05:52:25', '2026-03-31 05:52:51', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 22:52:25', '2026-03-30 22:52:51'),
(8, 6, '2026-03-31 06:03:26', '2026-03-31 06:04:25', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 23:03:26', '2026-03-30 23:04:25'),
(9, 6, '2026-03-31 06:08:44', '2026-03-31 06:09:26', 1, 0, 0, 'keluar', 7, 1, '2026-03-30 23:08:44', '2026-03-30 23:09:26'),
(10, 6, '2026-03-31 06:12:58', '2026-04-18 09:39:48', 1, -435, -870000, 'keluar', 7, 1, '2026-03-30 23:12:58', '2026-04-18 02:39:48'),
(11, 7, '2026-04-14 13:01:43', '2026-04-18 09:39:16', 1, -92, -184000, 'keluar', 8, 2, '2026-04-14 06:01:43', '2026-04-18 02:39:16'),
(12, 6, '2026-04-18 09:40:53', '2026-04-18 10:15:37', 2, 0, 0, 'keluar', 8, 1, '2026-04-18 02:40:53', '2026-04-18 03:15:37'),
(13, 6, '2026-04-18 10:17:59', '2026-04-18 10:21:36', 1, 0, 0, 'keluar', 8, 1, '2026-04-18 03:17:59', '2026-04-18 03:21:36'),
(14, 6, '2026-04-18 10:24:30', '2026-04-18 10:27:22', 1, 0, 0, 'keluar', 8, 1, '2026-04-18 03:24:30', '2026-04-18 03:27:22'),
(15, 6, '2026-04-18 10:28:19', '2026-04-18 10:28:23', 1, 0, 0, 'keluar', 8, 1, '2026-04-18 03:28:19', '2026-04-18 03:28:23'),
(16, 6, '2026-04-18 10:29:08', '2026-04-18 10:32:24', 1, 0, 0, 'keluar', 8, 1, '2026-04-18 03:29:08', '2026-04-18 03:32:24'),
(17, 6, '2026-04-18 10:44:48', '2026-04-18 10:50:32', 1, NULL, -183, 'keluar', 8, 1, '2026-04-18 03:44:48', '2026-04-18 03:50:32'),
(18, 6, '2026-04-18 10:52:58', '2026-04-18 10:57:32', 1, NULL, 167, 'keluar', 8, 2, '2026-04-18 03:52:58', '2026-04-18 03:57:32'),
(19, 6, '2026-04-18 11:01:28', '2026-04-18 11:06:22', 1, NULL, 20000, 'keluar', 8, 1, '2026-04-18 04:01:28', '2026-04-18 04:06:22'),
(20, 6, '2026-04-18 11:10:48', '2026-04-18 11:13:06', 1, NULL, 276405, 'keluar', 8, 1, '2026-04-18 04:10:48', '2026-04-18 04:13:06'),
(21, 6, '2026-04-18 11:13:55', '2026-04-18 11:14:52', 5, NULL, 343303, 'keluar', 8, 2, '2026-04-18 04:13:55', '2026-04-18 04:14:52'),
(22, 10, '2026-04-19 11:42:14', '2026-04-19 11:42:19', 2, NULL, 25607, 'keluar', 8, 1, '2026-04-19 04:42:14', '2026-04-19 04:42:19'),
(23, 6, '2026-04-19 12:37:06', '2026-04-19 12:37:09', 1, NULL, 7590, 'keluar', 8, 1, '2026-04-19 05:37:06', '2026-04-19 05:37:09'),
(24, 6, '2026-04-20 00:54:00', '2026-04-20 00:55:35', 2, NULL, 478012, 'keluar', 8, 3, '2026-04-19 17:54:00', '2026-04-19 17:55:35'),
(25, 6, '2026-04-20 01:09:17', '2026-04-20 01:15:10', 1, NULL, 707276, 'keluar', 8, 1, '2026-04-19 18:09:17', '2026-04-19 18:15:10'),
(26, 6, '2026-04-20 01:25:34', '2026-04-20 01:31:14', 1, NULL, 681720, 'keluar', 8, 1, '2026-04-19 18:25:34', '2026-04-19 18:31:14'),
(27, 6, '2026-04-20 01:33:52', '2026-04-20 01:33:57', 1, NULL, 11095, 'keluar', 8, 1, '2026-04-19 18:33:52', '2026-04-19 18:33:57'),
(28, 6, '2026-04-21 07:25:28', '2026-04-21 07:25:55', 1, NULL, 55350, 'keluar', 8, 1, '2026-04-21 00:25:28', '2026-04-21 00:25:55'),
(29, 6, '2026-04-22 03:49:43', '2026-04-22 05:15:20', 1, NULL, 10275732, 'keluar', 8, 1, '2026-04-21 20:49:43', '2026-04-21 22:15:20'),
(30, 6, '2026-04-22 05:54:49', '2026-04-22 05:54:54', 1, NULL, 11125, 'keluar', 8, 1, '2026-04-21 22:54:49', '2026-04-21 22:54:54'),
(31, 6, '2026-04-22 05:57:22', '2026-04-22 05:57:27', 1, NULL, 10151, 'keluar', 8, 2, '2026-04-21 22:57:22', '2026-04-21 22:57:27'),
(32, 6, '2026-04-22 06:01:34', '2026-04-22 06:03:29', 1, NULL, 231714, 'keluar', 8, 1, '2026-04-21 23:01:34', '2026-04-21 23:03:29'),
(33, 6, '2026-04-22 06:04:29', '2026-04-22 06:04:55', 1, NULL, 53726, 'keluar', 8, 1, '2026-04-21 23:04:29', '2026-04-21 23:04:55'),
(34, 10, '2026-04-23 02:20:30', '2026-04-23 02:20:35', 2, NULL, 27851, 'keluar', 8, 6, '2026-04-22 19:20:30', '2026-04-22 19:20:35'),
(35, 10, '2026-04-23 02:28:51', '2026-04-23 08:40:55', 1, NULL, 44649533, 'keluar', 8, 6, '2026-04-22 19:28:51', '2026-04-23 01:40:55'),
(36, 6, '2026-04-23 02:33:34', '2026-04-23 08:40:58', 1, NULL, 44089771, 'keluar', 8, 6, '2026-04-22 19:33:34', '2026-04-23 01:40:58'),
(37, 6, '2026-04-23 08:46:18', '2026-04-23 08:46:22', 1, NULL, 9710, 'keluar', 8, 6, '2026-04-23 01:46:18', '2026-04-23 01:46:22'),
(38, 6, '2026-04-23 09:10:58', '2026-04-23 09:11:20', 1, NULL, 45140, 'keluar', 8, 6, '2026-04-23 02:10:58', '2026-04-23 02:11:20'),
(39, 10, '2026-04-23 09:11:16', '2026-04-23 09:11:22', 2, NULL, 33833, 'keluar', 8, 3, '2026-04-23 02:11:16', '2026-04-23 02:11:22'),
(40, 6, '2026-04-23 09:12:15', '2026-04-23 09:12:31', 1, NULL, 33701, 'keluar', 8, 3, '2026-04-23 02:12:15', '2026-04-23 02:12:31'),
(41, 10, '2026-04-23 09:12:28', '2026-04-23 09:12:33', 1, NULL, 11687, 'keluar', 8, 3, '2026-04-23 02:12:28', '2026-04-23 02:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','petugas','owner') NOT NULL,
  `status_aktif` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`, `status_aktif`, `created_at`, `updated_at`) VALUES
(3, 'Petugas Dua', 'petugas2', 'petugas123', 'petugas', 1, NULL, NULL),
(4, 'Owner Parkir', 'owner', 'owner123', 'owner', 1, NULL, NULL),
(5, 'User Umum', 'user1', 'user123', 'petugas', 1, NULL, NULL),
(7, 'jekk', 'jekkk', '$2y$12$Cjbo86WNE9FjBLTwWMZyYOiZEjjjElptJ//2jrYa1oSHXoy5mp/dW', 'admin', 1, '2026-03-29 05:42:44', '2026-03-29 05:42:44'),
(8, 'petugas', 'petugas', '$2y$12$Oz0FN0yVe91vJgff5J9V/eNJdhj4E98jo9Xz94ErhyucHfpm8UYlm', 'petugas', 1, '2026-04-14 05:25:56', '2026-04-14 05:25:56'),
(9, 'admink', 'admink', '$2y$12$/HeFkMoGBrhLLYzfX3GFPujqsPSTvqpTHH9vv3iX1uUSL8h4ImJg.', 'admin', 1, '2026-04-14 05:32:42', '2026-04-14 05:32:42'),
(10, 'ownerrr', 'ownerr', '$2y$12$enDGutDOlPkRHwKGLH8XX.ReYjvEoDoYfdD0viasIllI.5Bfbrx8m', 'owner', 1, '2026-04-19 05:30:33', '2026-04-19 05:30:33'),
(11, 'admin satu', 'admin satu', '$2y$12$dO7I9qrqF2N.CpVInelJpuHjFGtxYXRlJazasCddM1eYwFTvMqBze', 'admin', 1, '2026-04-23 02:15:24', '2026-04-23 02:15:24'),
(12, 'petugas satu', 'petugas satu', '$2y$12$gZZ3gTn0hh4xTXuf7ZO8t.lRW3aHH9P0jLMSlh9anNCP8o1ecWL2e', 'petugas', 1, '2026-04-23 02:15:54', '2026-04-23 02:15:54'),
(13, 'owner satu', 'owner satu', '$2y$12$ZoKDTwB5iJSCeXkCdZyVO.ryn6CRQBk59a4KdyJcT09yi5V6SAqRW', 'owner', 1, '2026-04-23 02:16:30', '2026-04-23 02:16:30');

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
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `tb_log_aktivitas_id_user_foreign` (`id_user`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `tb_transaksi_id_kendaraan_foreign` (`id_kendaraan`),
  ADD KEY `tb_transaksi_id_tarif_foreign` (`id_tarif`),
  ADD KEY `tb_transaksi_id_user_foreign` (`id_user`),
  ADD KEY `tb_transaksi_id_area_foreign` (`id_area`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user_username_unique` (`username`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_area_parkir`
--
ALTER TABLE `tb_area_parkir`
  MODIFY `id_area` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  MODIFY `id_log` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_parkir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD CONSTRAINT `tb_log_aktivitas_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_id_area_foreign` FOREIGN KEY (`id_area`) REFERENCES `tb_area_parkir` (`id_area`),
  ADD CONSTRAINT `tb_transaksi_id_kendaraan_foreign` FOREIGN KEY (`id_kendaraan`) REFERENCES `tb_kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `tb_transaksi_id_tarif_foreign` FOREIGN KEY (`id_tarif`) REFERENCES `tb_tarif` (`id_tarif`),
  ADD CONSTRAINT `tb_transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
