-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2020 pada 02.00
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lets_teach`
--

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2020_02_05_102224_create_t_mapel', 1),
(9, '2020_02_05_103506_create_t_sub_mapel', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mapel`
--

CREATE TABLE `t_mapel` (
  `mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kode_mapel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sub_mapel`
--

CREATE TABLE `t_sub_mapel` (
  `sub_mapel_id` bigint(20) UNSIGNED NOT NULL,
  `kode_sub_mapel` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_sub_mapel` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`user_id`, `fullname`, `username`, `email`, `level`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ephraim Jehudah', 'Evra70', 'ephrajud@gmail.com', 'administrator', 'a65cf3ae974c36e0cd1f789f687829d9', 'Y', '', '2020-01-29 20:18:49', '2020-01-29 20:18:49'),
(2, 'Ephraim Jehudah', 'Evra77', 'ephrajuda@gmail.com', 'teacher', 'a65cf3ae974c36e0cd1f789f687829d9', 'Y', '', '2020-01-29 20:18:49', '2020-01-29 20:18:49'),
(3, 'Ephraim Jehudah', 'Evra777', 'ephrajudah@gmail.com', 'student', 'a65cf3ae974c36e0cd1f789f687829d9', 'Y', '', '2020-01-29 20:18:49', '2020-01-29 20:18:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_mapel`
--
ALTER TABLE `t_mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indeks untuk tabel `t_sub_mapel`
--
ALTER TABLE `t_sub_mapel`
  ADD PRIMARY KEY (`sub_mapel_id`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `t_user_username_unique` (`username`),
  ADD UNIQUE KEY `t_user_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `t_mapel`
--
ALTER TABLE `t_mapel`
  MODIFY `mapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_sub_mapel`
--
ALTER TABLE `t_sub_mapel`
  MODIFY `sub_mapel_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
