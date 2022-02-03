-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Waktu pembuatan: 03 Feb 2022 pada 10.42
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `approve_history`
--

CREATE TABLE `approve_history` (
  `id` int(11) NOT NULL,
  `id_mirs` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0=setuju, 1=tidak',
  `komentar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `approve_history`
--

INSERT INTO `approve_history` (`id`, `id_mirs`, `user_id`, `status`, `komentar`, `created_at`, `updated_at`) VALUES
(2, 2, 19, 0, 'mantap', NULL, NULL),
(3, 3, 17, 0, 'fsdfsdfsd', '2022-02-03 06:04:51', '2022-02-03 06:04:51'),
(4, 1, 17, 1, 'dfgdfg', '2022-02-03 06:14:40', '2022-02-03 06:14:40'),
(5, 4, 17, 0, 'dd', '2022-02-03 06:18:37', '2022-02-03 06:18:37'),
(6, 2, 19, 0, 'ok', '2022-02-03 06:19:42', '2022-02-03 06:19:42'),
(7, 4, 19, 0, 'ok', '2022-02-03 06:20:02', '2022-02-03 06:20:02'),
(8, 2, 17, 0, 'ok', '2022-02-03 06:48:47', '2022-02-03 06:48:47'),
(9, 3, 19, 1, 'qty habis', '2022-02-03 06:57:27', '2022-02-03 06:57:27'),
(10, 3, 32, 0, 'sdfsdf', '2022-02-03 09:17:49', '2022-02-03 09:17:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `block`
--

CREATE TABLE `block` (
  `id` bigint(11) NOT NULL,
  `ha` float NOT NULL,
  `block` char(10) NOT NULL,
  `sph` int(11) NOT NULL,
  `yph` char(10) NOT NULL,
  `sub_div` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `block`
--

INSERT INTO `block` (`id`, `ha`, `block`, `sph`, `yph`, `sub_div`) VALUES
(1, 36.57, '001', 141, '2008', '1B'),
(2, 18.04, '002', 146, '2008', '1B'),
(3, 18.27, '003', 141, '2013', '1B'),
(4, 36.49, '004', 135, '2013', '1B'),
(5, 26.1, '015', 133, '2007', '1B'),
(6, 37.8, '016', 129, '2007', '1B'),
(7, 33.92, '017', 121, '2007', '1B'),
(8, 31.79, '018', 100, '2007', '1B'),
(9, 18.39, '029', 126, '2007', '1B'),
(10, 18.86, '030', 103, '2007', '1B'),
(11, 18.8, '031', 115, '2007', '1B'),
(12, 38.4, '032', 128, '2007', '1B'),
(13, 36.92, '033', 136, '2007', '1B'),
(14, 38.15, '034', 132, '2007', '1B'),
(15, 18.05, '043', 133, '2007', '1B'),
(16, 38.23, '044', 122, '2008', '1B'),
(17, 38.08, '045', 124, '2008', '1B'),
(18, 37.76, '046', 128, '2007', '1B'),
(19, 36.64, '047', 127, '2007', '1B'),
(20, 37.74, '048', 135, '2007', '1B'),
(21, 20.42, '057', 128, '2007', '1B'),
(22, 42.46, '058', 128, '2008', '1B'),
(23, 26.32, '059', 137, '2008', '1B'),
(24, 37.83, '060', 138, '2008', '1B'),
(25, 45.38, '069', 132, '2008', '1B'),
(26, 18.19, '202', 136, '2013', '1B'),
(27, 8.99, '215', 131, '2016', '1B'),
(28, 6.28, '218', 133, '2016', '1B'),
(29, 18.81, '229', 127, '2008', '1B'),
(30, 19.11, '230', 124, '2008', '1B'),
(31, 19.17, '231', 130, '2008', '1B'),
(32, 18.71, '243', 129, '2008', '1B'),
(33, 21.06, '257', 125, '2008', '1B'),
(34, 2.11, '303', 142, '2014', '1B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(30) NOT NULL,
  `level_divisi` int(2) NOT NULL COMMENT 'HANYA LEVEL TINGKATAN DIVISI SAJA\r\n',
  `level_access` int(2) NOT NULL COMMENT '/*\r\nROLE\r\n5 = KELUARKAN STOK\r\n4 = APPROVE\r\n3 = APPROVE\r\n2 = ORDER & APPROVE\r\n1 = RECEIVED & ORDER\r\n*/'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`, `level_divisi`, `level_access`) VALUES
(1, 'FC', 1, 1),
(2, 'FO', 5, 2),
(3, 'DM', 1, 3),
(4, 'EM', 5, 4),
(5, 'KERANI/SK', 5, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gl`
--

CREATE TABLE `gl` (
  `id` int(11) NOT NULL,
  `kode` char(12) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gl`
--

INSERT INTO `gl` (`id`, `kode`, `deskripsi`) VALUES
(1, '1001001', 'LAND - FREE HOLD'),
(2, '1001002', 'LAND - LEASE HOLD'),
(3, '1001003', 'LAND - SETTLEMENT OF GARAPAN LAND'),
(4, '1001004', 'LAND - TACTICAL FUND'),
(5, '1001005', 'LAND - GOVERNMENT APPLICATION'),
(6, '1001006', 'LAND - LAND RIGHTS'),
(7, '1002001', 'BUILDINGS - PERMANENT'),
(8, '1002002', 'BUILDINGS - SEMI PERMANENT'),
(9, '1002003', 'INFRASTRUCTURE'),
(10, '1002005', 'TANK & PIPING'),
(11, '1002006', 'AUC - INFRASTRUCTURE'),
(12, '1003001', 'MACHINERY'),
(13, '1004001', 'TOOLS & EQUIPMENT'),
(14, '1004002', 'ELECTRIC INSTALLATION'),
(15, '1004003', 'WATER INSTALLATION'),
(16, '1004004', 'DOMESTIC EQUIPMENT'),
(17, '1005001', 'FURNITURE & FIXTURES'),
(18, '1006001', 'VEHICLE - GENERAL AFFAIR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hirarki`
--

CREATE TABLE `hirarki` (
  `id` int(11) NOT NULL,
  `nama_hirarki` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hirarki`
--

INSERT INTO `hirarki` (`id`, `nama_hirarki`) VALUES
(1, 'HIRARKI SUHTIAMI 1'),
(2, 'HIRARKI SUHTIAMI 2'),
(3, 'HIRARKI NUR AROFAT 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hirarki_line`
--

CREATE TABLE `hirarki_line` (
  `id` int(11) NOT NULL,
  `id_hirarki` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hirarki_line`
--

INSERT INTO `hirarki_line` (`id`, `id_hirarki`, `id_karyawan`) VALUES
(1, 1, 17),
(2, 1, 19),
(3, 1, 27),
(4, 2, 18),
(5, 2, 30),
(6, 3, 20),
(7, 3, 29),
(8, 1, 32),
(9, 2, 32);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mirs`
--

CREATE TABLE `mirs` (
  `id` int(11) NOT NULL,
  `no_mirs` char(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `divisi` int(11) NOT NULL,
  `request_by` int(11) NOT NULL,
  `approved_by` char(30) DEFAULT NULL,
  `issue_by` char(30) DEFAULT NULL,
  `received_by` char(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) DEFAULT NULL COMMENT '0=done, null/selain = masih on'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mirs`
--

INSERT INTO `mirs` (`id`, `no_mirs`, `date`, `divisi`, `request_by`, `approved_by`, `issue_by`, `received_by`, `created_at`, `updated_at`, `status`) VALUES
(1, 'mirs20220202031628', '2022-02-02 16:25:50', 2, 27, NULL, NULL, NULL, '2022-02-02 08:16:28', '2022-02-02 08:16:28', NULL),
(2, 'mirs20220202032108', '2022-02-02 15:56:09', 2, 27, NULL, NULL, NULL, '2022-02-02 08:21:08', '2022-02-02 08:21:08', NULL),
(3, 'mirs20220202032128', '2022-02-02 15:56:11', 2, 27, NULL, NULL, NULL, '2022-02-02 08:21:28', '2022-02-02 08:21:28', NULL),
(4, 'mirs20220202103051', '2022-02-02 15:56:13', 2, 27, NULL, NULL, NULL, '2022-02-02 15:30:51', '2022-02-02 15:30:51', NULL),
(5, 'mirs20220203043816', '2022-02-02 21:38:16', 2, 30, NULL, NULL, NULL, '2022-02-03 09:38:16', '2022-02-03 09:38:16', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mirs_line`
--

CREATE TABLE `mirs_line` (
  `id` int(11) NOT NULL,
  `id_mirs` int(11) DEFAULT NULL,
  `id_zmm` int(11) DEFAULT NULL,
  `chargeto_id` int(11) DEFAULT NULL,
  `qty` int(7) DEFAULT NULL,
  `qty_approved` int(7) DEFAULT NULL,
  `ttl_amount` float DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL COMMENT 'gl\r\n\r\n',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mirs_line`
--

INSERT INTO `mirs_line` (`id`, `id_mirs`, `id_zmm`, `chargeto_id`, `qty`, `qty_approved`, `ttl_amount`, `account_id`, `updated_at`, `created_at`) VALUES
(1, 1, 3, 3, 4, NULL, NULL, 3, '2022-02-02 08:16:28', '2022-02-02 08:16:28'),
(2, 1, 8, 14, 7, NULL, NULL, 11, '2022-02-02 08:16:28', '2022-02-02 08:16:28'),
(3, 2, 3, 4, 5, NULL, 1, 3, '2022-02-02 08:21:08', '2022-02-02 08:21:08'),
(4, 2, 3, 17, 45, NULL, 9, 4, '2022-02-02 08:21:08', '2022-02-02 08:21:08'),
(5, 3, 3, 4, 5, 23, 1.05, 3, '2022-02-03 09:17:49', '2022-02-02 08:21:28'),
(6, 3, 3, 17, 45, 3, 9.45, 4, '2022-02-03 09:17:49', '2022-02-02 08:21:28'),
(7, 4, 10, 18, 5, NULL, 0.5, 12, '2022-02-02 15:30:51', '2022-02-02 15:30:51'),
(8, 4, 9, 16, 6, NULL, 19.2, 13, '2022-02-02 15:30:51', '2022-02-02 15:30:51'),
(9, 5, 10, 20, 34, NULL, 3.4, 14, '2022-02-03 09:38:16', '2022-02-03 09:38:16'),
(10, 5, 9, 20, 5, NULL, 16, 15, '2022-02-03 09:38:16', '2022-02-03 09:38:16'),
(11, 5, 9, 21, 6, NULL, 19.2, 13, '2022-02-03 09:38:16', '2022-02-03 09:38:16'),
(12, 5, 10, 33, 6, NULL, 0.6, 16, '2022-02-03 09:38:16', '2022-02-03 09:38:16'),
(13, 5, 10, 5, 12, NULL, 1.2, 14, '2022-02-03 09:38:16', '2022-02-03 09:38:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nama_lengkap`, `id_divisi`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin', '', 4, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'zJNAzg3a4Gbo6mzxsmqjNrLEpKZvoW0Q712ug6lkDI1q5y2uXfdWeLAyVD16', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(16, 'NUR AROFAT', 'nur@gmail.com', 'NUR AROFAT', 5, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'vuoeFY81zHHiIIulJL1DlOd7sF9CKV1Vb898GTwwZRBTnlGAbbkJIN5EE5vm', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(17, 'MIKAEL TD', 'mikael@gmail.com', 'MIKAEL TD', 4, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'H9ore88juKEW0B4F1d1ilfpAvV6GVNASM3OJRkkURyKSPRpMrMc5C4Tk4Tb1', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(18, 'ARIF B', 'arif@gmail.com', 'ARIF B', 4, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(19, 'DERRY CANDIA', 'derry@gmail.com', 'DERRY CANDIA', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'J6jVEXnCzOkqxmBdmk2apnO8y15ZfdOKiCwGaZZ4ewf3SlaNQdm2frVOgdpU', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(20, 'KARDO RICO', 'kardo@gmail.com', 'KARDO RICO', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(21, 'IMAM M', 'imam@gmail.com', 'IMAM M', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(22, 'RAHMAT LUBIS', 'rahmat@gmail.com', 'RAHMAT LUBIS', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(23, 'M AFIF', 'marif@gmail.com', 'm afif', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(24, 'JASMEN H', 'jasmen@gmail.com', 'JASMEN H', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(25, 'SIGIT D', 'sigit@gmail.com', 'SIGIT D', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(26, 'SALAMAT HS', 'salamat@gmail.com', 'SALAMAT HS', 3, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(27, 'AGUS', 'agus@gmail.com', 'AGUS', 2, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'j4SZJ0AHRpEcKuILeG7X9uxfVf4Tj0crEKFI7h8wrBmsuS0FAopVZ2v8r51R', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(28, 'ARIS', 'aris@gmail.com', 'ARIS', 2, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(29, 'CHUSNI', 'chusni@gmail.com', 'CHUSNI', 2, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(30, 'EKO', 'eko@gmail.com', 'EKO', 2, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'J7pqZky6iA9kxsmOFGDN7CnqHe0tM6RbEKZzYkExnMbqBzIHsk06ibxEucBw', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(31, 'JONLI', 'jonli@gmail.com', 'JONLI', 2, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', '', '2022-01-27 18:52:11', '2022-01-27 18:52:11'),
(32, 'suhtiami', 'suhtiami@gmail.com', 'suhtiami', 5, '2022-01-27 18:52:11', '$2y$10$5q4e5ZIN2zu8u9ZGH4T8vuE3kW/62vSNslOOARDT6WQCeJ1aoRr6a', 'kD5AvPA9d8hqFMLjNJWVG2fAOAHi89ZJ7zVzGo8AxjqDMhC9sy0iw5MpXJg1', '2022-01-27 18:52:11', '2022-01-27 18:52:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `zmm`
--

CREATE TABLE `zmm` (
  `id` bigint(11) NOT NULL,
  `material_code` char(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `uom` char(8) NOT NULL,
  `begin` float NOT NULL,
  `end` int(6) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `zmm`
--

INSERT INTO `zmm` (`id`, `material_code`, `deskripsi`, `uom`, `begin`, `end`, `price`) VALUES
(2, 'N03.0001003.00065', 'ANGLE,STRUCTURAL,80 MM,6 M,3 MM,PC', 'PC', 8, 13, 29.12),
(3, 'N03.0006001.00009', 'BRUSH,PAINT,25.4 MM (1\"),SYNTHETIC FIBER', 'PC', 29, 13, 0.21),
(4, 'N03.0006001.00012', 'BRUSH,PAINT,101.6 MM (4\"),SYNTHETIC FIBE', 'PC', 5, 13, 1.06),
(5, 'N03.0006001.00013', 'BRUSH,PAINT,127 MM (5\"),SYNTHETIC FIBER', 'PC', 16, 13, 1.38),
(6, 'N03.0006001.00020', 'BRUSH,PAINT,4\",FABRICS,WITHOUT HANDLE,PC', 'PC', 36, 13, 0.44),
(7, 'N03.0006001.00064', 'BRUSH,PAINT,7\",FABRICS,PLASTIC,PC', 'PC', 4, 13, 1.26),
(8, 'N03.0007002.00011', 'BUILDING MATERIALS,ADHESIVE,CAN', 'CAN', 12, 13, 2.44),
(9, 'N03.0007002.00037', 'ADHESIVE,TUB', 'TUB', 5, 13, 3.2),
(10, 'N03.0007010.00006', 'BUILDING MATERIALS,CEMENT,KG', 'KG', 23, 13, 0.1),
(11, 'N03.0007015.00026', 'DOOR,PC', 'PC', 3, 13, 13.77);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `approve_history`
--
ALTER TABLE `approve_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gl`
--
ALTER TABLE `gl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hirarki_line`
--
ALTER TABLE `hirarki_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mirs`
--
ALTER TABLE `mirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mirs_line`
--
ALTER TABLE `mirs_line`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `zmm`
--
ALTER TABLE `zmm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `approve_history`
--
ALTER TABLE `approve_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `block`
--
ALTER TABLE `block`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gl`
--
ALTER TABLE `gl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `hirarki`
--
ALTER TABLE `hirarki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `hirarki_line`
--
ALTER TABLE `hirarki_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mirs`
--
ALTER TABLE `mirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `mirs_line`
--
ALTER TABLE `mirs_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `zmm`
--
ALTER TABLE `zmm`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
