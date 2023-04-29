-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Apr 2023 pada 23.10
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatans`
--

INSERT INTO `jabatans` (`id`, `name_jabatan`, `created_at`, `updated_at`) VALUES
(4, 'Manager', '2023-04-28 01:43:36', '2023-04-28 01:43:36'),
(5, 'Supervisor', '2023-04-28 01:43:36', '2023-04-28 01:43:36'),
(12, 'HRD', '2023-04-28 08:54:30', '2023-04-28 08:54:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_karyawan`
--

CREATE TABLE `jabatan_karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED NOT NULL,
  `jabatan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan_karyawan`
--

INSERT INTO `jabatan_karyawan` (`id`, `karyawan_id`, `jabatan_id`, `created_at`, `updated_at`) VALUES
(2, 1, 5, '2023-04-28 06:42:10', '2023-04-28 06:42:10'),
(3, 2, 4, '2023-04-28 07:50:33', '2023-04-28 07:50:33'),
(7, 6, 5, '2023-04-28 11:50:23', '2023-04-28 11:50:23'),
(8, 8, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(9, 8, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(10, 8, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(11, 9, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(12, 9, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(13, 10, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(14, 10, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(15, 11, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(16, 12, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(17, 12, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(18, 12, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(19, 13, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(20, 14, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(21, 15, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(22, 15, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(23, 16, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(24, 16, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(25, 16, 12, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(26, 17, 4, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(27, 17, 5, '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(28, 1, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(29, 2, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(30, 2, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(31, 6, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(32, 6, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(33, 6, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(34, 8, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(35, 8, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(36, 9, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(37, 9, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(38, 9, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(39, 10, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(40, 11, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(41, 12, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(42, 12, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(43, 13, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(44, 13, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(45, 14, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(46, 14, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(47, 14, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(48, 15, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(49, 15, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(50, 15, 5, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(51, 16, 12, '2023-04-28 12:10:11', '2023-04-28 12:10:11'),
(52, 17, 4, '2023-04-28 12:10:11', '2023-04-28 12:10:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_bergabung` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawans`
--

INSERT INTO `karyawans` (`id`, `name`, `username`, `unit_id`, `tanggal_bergabung`, `created_at`, `updated_at`) VALUES
(1, 'Artha Wiguna', 'adminn', 4, '2023-04-28', '2023-04-28 05:09:51', '2023-04-28 06:42:10'),
(2, 'Kinokino', 'user', 4, '2023-04-28', '2023-04-28 07:50:33', '2023-04-28 07:50:33'),
(6, 'Artha Wiguna', 'admind', 5, '2023-04-29', '2023-04-28 10:08:37', '2023-04-28 11:50:23'),
(8, 'Karyawan 1', 'karyawan1', 5, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(9, 'Karyawan 2', 'karyawan2', 6, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(10, 'Karyawan 3', 'karyawan3', 5, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(11, 'Karyawan 4', 'karyawan4', 4, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(12, 'Karyawan 5', 'karyawan5', 5, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(13, 'Karyawan 6', 'karyawan6', 4, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(14, 'Karyawan 7', 'karyawan7', 6, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(15, 'Karyawan 8', 'karyawan8', 6, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(16, 'Karyawan 9', 'karyawan9', 6, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23'),
(17, 'Karyawan 10', 'karyawan10', 6, '2023-04-28', '2023-04-28 12:09:23', '2023-04-28 12:09:23');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_27_013205_create_jabatans_table', 1),
(6, '2023_04_27_013925_create_units_table', 1),
(7, '2023_04_27_013926_create_karyawans_table', 1),
(8, '2023_04_28_093223_create_jabatan_karyawan_table', 2);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `name_unit`, `created_at`, `updated_at`) VALUES
(4, 'IT', '2023-04-28 01:43:36', '2023-04-28 01:43:36'),
(5, 'HRD', '2023-04-28 01:43:36', '2023-04-28 01:43:36'),
(6, 'Marketing', '2023-04-28 01:43:36', '2023-04-28 01:43:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eka Andriana', 'admin', 'ekaandrianaa04@gmail.com', NULL, '$2y$10$x8tYjSfyM1SVUjQ.9dPjWeUyuAdd.qwje1DxFiHRfAzRqCuJTn5uS', NULL, '2023-04-28 01:34:14', '2023-04-28 01:34:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jabatan_karyawan_karyawan_id_foreign` (`karyawan_id`),
  ADD KEY `jabatan_karyawan_jabatan_id_foreign` (`jabatan_id`);

--
-- Indeks untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `karyawans_username_unique` (`username`),
  ADD KEY `karyawans_unit_id_foreign` (`unit_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jabatan_karyawan`
--
ALTER TABLE `jabatan_karyawan`
  ADD CONSTRAINT `jabatan_karyawan_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatans` (`id`),
  ADD CONSTRAINT `jabatan_karyawan_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`);

--
-- Ketidakleluasaan untuk tabel `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
