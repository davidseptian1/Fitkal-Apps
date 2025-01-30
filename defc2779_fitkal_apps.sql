-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jan 2025 pada 16.19
-- Versi server: 10.11.10-MariaDB-cll-lve
-- Versi PHP: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `defc2779_fitkal_apps`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bmi`
--

CREATE TABLE `bmi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `berat_badan` float NOT NULL,
  `tinggi_badan` int(11) NOT NULL,
  `bmi` float NOT NULL,
  `kategori_bmi` varchar(255) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bmi`
--

INSERT INTO `bmi` (`id`, `user_id`, `berat_badan`, `tinggi_badan`, `bmi`, `kategori_bmi`, `tanggal`) VALUES
(1, 1, 80, 170, 27.6817, 'Kelebihan Berat Badan', '2025-01-29'),
(2, 1, 80, 160, 31.25, 'Obesitas', '2025-01-29'),
(3, 1, 70, 179, 21.847, 'Normal', '2025-01-29'),
(4, 1, 70, 170, 24.2215, 'Normal', '2025-01-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `calorie_calculations`
--

CREATE TABLE `calorie_calculations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `activity_level` varchar(20) NOT NULL,
  `tdee` int(11) NOT NULL,
  `calculation_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `target_weight` float NOT NULL,
  `time_to_goal` int(11) NOT NULL,
  `bmi` float DEFAULT NULL,
  `bmi_category` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `calorie_calculations`
--

INSERT INTO `calorie_calculations` (`id`, `user_id`, `age`, `weight`, `height`, `gender`, `activity_level`, `tdee`, `calculation_date`, `target_weight`, `time_to_goal`, `bmi`, `bmi_category`, `created_at`) VALUES
(1, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 09:13:03', 60, 6, NULL, NULL, '2025-01-29 10:50:00'),
(2, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:44:26', 65, 3, 24.2215, 'Normal weight', '2025-01-29 10:50:00'),
(3, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:46:36', 65, 3, 24.2215, 'Normal weight', '2025-01-29 10:50:00'),
(4, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:50:08', 65, 3, 24.2215, 'Normal weight', '2025-01-29 10:50:08'),
(5, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:50:28', 60, 6, 24.2215, 'Normal weight', '2025-01-29 10:50:28'),
(6, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:52:57', 60, 6, 24.2215, 'Normal weight', '2025-01-29 10:52:57'),
(7, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:53:17', 60, 6, 24.2215, 'Normal weight', '2025-01-29 10:53:17'),
(8, 1, 25, 70, 170, 'male', 'light', 2352, '2025-01-29 10:53:27', 60, 6, 24.2215, 'Normal weight', '2025-01-29 10:53:27'),
(9, 2, 24, 70, 170, 'male', 'light', 2362, '2025-01-29 15:53:20', 60, 6, 24.2215, 'Normal weight', '2025-01-29 15:53:20'),
(10, 2, 24, 70, 170, 'male', 'light', 2362, '2025-01-29 15:53:51', 60, 6, 24.2215, 'Normal weight', '2025-01-29 15:53:51'),
(11, 2, 24, 70, 170, 'male', 'light', 2362, '2025-01-29 15:54:11', 60, 6, 24.2215, 'Normal weight', '2025-01-29 15:54:11'),
(12, 2, 24, 70, 170, 'male', 'light', 2362, '2025-01-30 07:37:56', 60, 6, 24.2215, 'Normal weight', '2025-01-30 07:37:56'),
(13, 5, 24, 70, 170, 'male', 'light', 2362, '2025-01-30 07:42:27', 60, 6, 24.2215, 'Normal weight', '2025-01-30 07:42:27'),
(14, 5, 24, 70, 170, 'male', 'light', 2362, '2025-01-30 07:42:33', 60, 6, 24.2215, 'Normal weight', '2025-01-30 07:42:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kategori` enum('sayur','makanan_ringan','makanan_berat','jus_buah') NOT NULL,
  `status_ekonomi` enum('hemat','gajian','sultan','anak_kuliahan','anak_sekolahan') NOT NULL,
  `kalori` int(11) NOT NULL,
  `protein` decimal(5,2) NOT NULL,
  `lemak` decimal(5,2) NOT NULL,
  `karbo` decimal(5,2) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `nama`, `kategori`, `status_ekonomi`, `kalori`, `protein`, `lemak`, `karbo`, `gambar`) VALUES
(1, 'Salad Sayur', 'sayur', 'hemat', 150, 5.00, 7.00, 15.00, 'salad_sayur.jpg'),
(2, 'Sate Ayam', 'makanan_berat', 'gajian', 400, 25.00, 30.00, 10.00, 'sate_ayam.jpg'),
(3, 'Popcorn', 'makanan_ringan', 'anak_kuliahan', 120, 3.00, 7.00, 18.00, 'popcorn.jpg'),
(4, 'Jus Jeruk', 'jus_buah', 'sultan', 180, 3.00, 0.00, 45.00, 'jus_jeruk.jpg'),
(5, 'Smoothie Pisang', 'jus_buah', 'gajian', 220, 3.00, 2.00, 45.00, 'smoothie_pisang.jpg'),
(6, 'Mie Goreng', 'makanan_berat', 'hemat', 700, 25.00, 25.00, 85.00, 'mie_goreng.jpg'),
(7, 'Nasi Goreng', 'makanan_berat', 'gajian', 500, 15.00, 20.00, 60.00, 'nasi_goreng.jpg'),
(8, 'Keripik Kentang', 'makanan_ringan', 'anak_sekolahan', 250, 2.00, 15.00, 30.00, 'keripik_kentang.jpg'),
(9, 'Tahu Tempe', 'sayur', 'hemat', 100, 7.00, 5.00, 10.00, 'tahu_tempe.jpg'),
(10, 'Ayam Bakar', 'makanan_berat', 'gajian', 450, 40.00, 15.00, 5.00, 'ayam_bakar.jpg'),
(24, 'Ayam goreng', 'makanan_berat', 'anak_kuliahan', 260, 22.00, 15.00, 11.00, '1738162532_download.jpg'),
(25, 'Nasi padang', 'makanan_berat', 'anak_kuliahan', 664, 70.00, 15.00, 70.00, '1738163128_download (1).jpg'),
(26, 'Pempek', 'makanan_berat', 'anak_kuliahan', 39, 3.00, 1.00, 5.00, '1738163292_download (2).jpg'),
(27, 'Gudeg', 'makanan_berat', 'gajian', 127, 2.00, 5.00, 22.00, '1738163377_download (3).jpg'),
(28, 'Mie goreng Jawa', 'makanan_berat', 'anak_kuliahan', 229, 11.00, 5.00, 42.00, '1738163503_download (4).jpg'),
(29, 'Bihun goreng', 'makanan_berat', 'anak_kuliahan', 152, 6.00, 6.00, 18.00, '1738163616_download (5).jpg'),
(30, 'Roti bakar', 'makanan_ringan', 'anak_sekolahan', 307, 13.00, 6.00, 53.00, '1738163694_download (6).jpg'),
(31, 'Pisang goreng', 'makanan_ringan', 'anak_sekolahan', 68, 1.00, 4.00, 10.00, '1738163763_download (7).jpg'),
(32, 'Alpukat', 'jus_buah', 'hemat', 160, 14.66, 8.53, 2.00, '1738166543_Alpukat.jpg'),
(33, 'Alpukat', 'jus_buah', 'anak_kuliahan', 160, 14.66, 8.53, 2.00, '1738166609_Alpukat.jpg'),
(34, 'Alpukat', 'jus_buah', 'anak_sekolahan', 160, 14.66, 8.53, 2.00, '1738166646_Alpukat.jpg'),
(35, 'Alpukat', 'jus_buah', 'gajian', 160, 14.66, 8.53, 2.00, '1738166669_Alpukat.jpg'),
(36, 'Alpukat', 'jus_buah', 'sultan', 160, 14.66, 8.53, 2.00, '1738166690_Alpukat.jpg'),
(37, 'Anggur', 'jus_buah', 'gajian', 3, 0.04, 0.01, 0.90, '1738166784_Anggur.jpg'),
(38, 'Anggur', 'jus_buah', 'sultan', 3, 0.04, 0.01, 0.90, '1738166814_Anggur.jpg'),
(39, 'Anggur', 'jus_buah', 'anak_kuliahan', 3, 0.04, 0.01, 0.90, '1738166836_Anggur.jpg'),
(40, 'Blueberi', 'jus_buah', 'gajian', 57, 0.74, 0.33, 14.49, '1738167050_Blueberi.jpg'),
(41, 'Blueberi', 'jus_buah', 'sultan', 57, 0.74, 0.33, 14.49, '1738167081_Blueberi.jpg'),
(42, 'Blueberi', 'jus_buah', 'anak_kuliahan', 57, 0.74, 0.33, 14.49, '1738167098_Blueberi.jpg'),
(43, 'Pir', 'jus_buah', 'gajian', 58, 0.38, 0.12, 15.46, '1738167506_Pir.jpg'),
(44, 'Pir', 'jus_buah', 'sultan', 58, 0.38, 0.12, 15.46, '1738167532_Pir.jpg'),
(45, 'Pir', 'jus_buah', 'anak_kuliahan', 58, 0.38, 0.12, 15.46, '1738167579_Pir.jpg'),
(46, 'Ceri', 'jus_buah', 'hemat', 4, 0.07, 0.01, 1.09, '1738167716_ceri.jpg'),
(47, 'Ceri', 'jus_buah', 'anak_sekolahan', 4, 0.07, 0.01, 1.09, '1738167762_ceri.jpg'),
(48, 'Ceri', 'jus_buah', 'anak_kuliahan', 4, 0.07, 0.01, 1.09, '1738167798_ceri.jpg'),
(49, 'Jeruk', 'jus_buah', 'hemat', 62, 1.23, 0.16, 15.39, '1738167891_jeruk.jpg'),
(50, 'Jeruk', 'jus_buah', 'anak_sekolahan', 62, 1.23, 0.16, 15.39, '1738167926_jeruk.jpg'),
(51, 'Jeruk', 'jus_buah', 'anak_kuliahan', 62, 1.23, 0.16, 15.39, '1738167965_jeruk.jpg'),
(52, 'Jeruk', 'jus_buah', 'gajian', 62, 1.23, 0.16, 15.39, '1738167999_jeruk.jpg'),
(53, 'Jeruk', 'jus_buah', 'sultan', 62, 1.23, 0.16, 15.39, '1738168066_jeruk.jpg'),
(54, 'Kelapa', 'jus_buah', 'hemat', 354, 3.33, 33.49, 15.23, '1738168277_Kelapa.jpg'),
(55, 'Kelapa', 'jus_buah', 'gajian', 354, 3.33, 33.49, 15.23, '1738168341_Kelapa.jpg'),
(56, 'Kelapa', 'jus_buah', 'sultan', 354, 3.33, 33.49, 15.23, '1738168386_Kelapa.jpg'),
(57, 'Kelapa', 'jus_buah', 'anak_kuliahan', 354, 3.33, 33.49, 15.23, '1738168416_Kelapa.jpg'),
(58, 'Kelapa', 'jus_buah', 'anak_sekolahan', 354, 3.33, 33.49, 15.23, '1738168447_Kelapa.jpg'),
(59, 'Kelapa', 'jus_buah', 'anak_sekolahan', 354, 3.33, 33.49, 15.23, '1738168459_Kelapa.jpg'),
(60, 'Kismis', 'jus_buah', 'gajian', 299, 3.07, 0.46, 79.18, '1738168590_kismis.jpg'),
(61, 'Kismis', 'jus_buah', 'sultan', 299, 3.07, 0.46, 79.18, '1738168645_kismis.jpg'),
(62, 'Kismis', 'jus_buah', 'anak_kuliahan', 299, 3.07, 0.46, 79.18, '1738168701_kismis.jpg'),
(63, 'Kurma', 'jus_buah', 'gajian', 23, 0.20, 0.03, 6.23, '1738168778_Kurma.jpg'),
(64, 'Kurma', 'jus_buah', 'sultan', 23, 0.20, 0.03, 6.23, '1738168829_Kurma.jpg'),
(65, 'Mangga', 'jus_buah', 'hemat', 65, 0.51, 0.27, 17.00, '1738168912_Mangga.jpg'),
(66, 'Mangga', 'jus_buah', 'gajian', 65, 0.51, 0.27, 17.00, '1738168946_Mangga.jpg'),
(67, 'Mangga', 'jus_buah', 'sultan', 65, 0.51, 0.27, 17.00, '1738169029_Mangga.jpg'),
(68, 'Mangga', 'jus_buah', 'anak_kuliahan', 65, 0.51, 0.27, 17.00, '1738169056_Mangga.jpg'),
(69, 'Mangga', 'jus_buah', 'anak_sekolahan', 65, 0.51, 0.27, 17.00, '1738169082_Mangga.jpg'),
(70, 'Melon', 'jus_buah', 'gajian', 34, 0.84, 0.19, 8.16, '1738169188_Melon.jpeg'),
(71, 'Melon', 'jus_buah', 'sultan', 34, 0.84, 0.19, 8.16, '1738169230_Melon.jpeg'),
(72, 'Melon', 'jus_buah', 'anak_kuliahan', 34, 0.84, 0.19, 8.16, '1738169258_Melon.jpeg'),
(73, 'Nanas', 'jus_buah', 'gajian', 48, 0.54, 0.12, 12.63, '1738169939_Nanas.jpg'),
(74, 'Nanas', 'jus_buah', 'sultan', 48, 0.54, 0.12, 12.63, '1738169979_Nanas.jpg'),
(75, 'Nanas', 'jus_buah', 'anak_kuliahan', 48, 0.54, 0.12, 12.63, '1738170013_Nanas.jpg'),
(76, 'Nanas', 'jus_buah', 'hemat', 48, 0.54, 0.12, 12.63, '1738170045_Nanas.jpg'),
(77, 'Pisang goreng', 'makanan_ringan', 'anak_sekolahan', 68, 1.00, 4.00, 10.00, '1738170117_download (7).jpg'),
(78, 'Pepaya', 'jus_buah', 'hemat', 39, 0.61, 0.14, 9.81, '1738170153_Pepaya.jpg'),
(79, 'Ayam geprek', 'makanan_berat', 'anak_kuliahan', 263, 17.61, 18.00, 7.60, '1738170225_download (9).jpg'),
(80, 'Spaghetti', 'makanan_berat', 'gajian', 300, 10.00, 2.50, 60.00, '1738170381_download (10).jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `progress`
--

CREATE TABLE `progress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `berat_badan` float NOT NULL,
  `kalori_yang_dikonsumsi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `noted_progress` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `progress`
--

INSERT INTO `progress` (`id`, `user_id`, `berat_badan`, `kalori_yang_dikonsumsi`, `tanggal`, `noted_progress`) VALUES
(10, 1, 70, 1500, '2025-01-29', NULL),
(11, 1, 70, 0, '2025-01-29', NULL),
(12, 1, 70, 0, '2025-01-29', NULL),
(13, 1, 71, 0, '2025-01-30', NULL),
(14, 1, 69, 0, '2025-01-31', NULL),
(15, 1, 68, 0, '2025-01-31', 'semangat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_makanan`
--

CREATE TABLE `record_makanan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `makanan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `record_makanan`
--

INSERT INTO `record_makanan` (`id`, `user_id`, `makanan_id`, `tanggal`) VALUES
(6, 1, 9, '2025-01-29'),
(7, 1, 4, '2025-01-29'),
(8, 1, 1, '2025-01-29'),
(9, 1, 1, '2025-01-29'),
(10, 1, 2, '2025-01-29'),
(11, 1, 10, '2025-01-29'),
(12, 1, 3, '2025-01-29'),
(13, 1, 1, '2025-01-29'),
(14, 1, 1, '2025-01-29'),
(15, 1, 2, '2025-01-29'),
(16, 1, 10, '2025-01-29'),
(17, 1, 3, '2025-01-29'),
(18, 1, 1, '2025-01-29'),
(19, 1, 2, '2025-01-29'),
(20, 1, 10, '2025-01-29'),
(21, 1, 3, '2025-01-29'),
(22, 1, 1, '2025-01-29'),
(23, 2, 24, '2025-01-29'),
(24, 2, 24, '2025-01-29'),
(25, 2, 25, '2025-01-29'),
(26, 5, 8, '2025-01-30'),
(27, 5, 37, '2025-01-30'),
(28, 5, 57, '2025-01-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'david', 'david@gmail.com', '$2y$10$MrbJCBcwhtEXSq2VqroMKOmArtpGH.9IVknkm2b3f6xzNUvnxJy4O', '2025-01-29 09:08:10'),
(2, 'Silvia', 'silvia@gmail.com', '$2y$10$NjiU8MNrpvXiFn/Y8uOdUuNpb/7drS2lFJ9JWO7KrGLRiS9qkPN9y', '2025-01-29 13:34:20'),
(3, 'dapitganteng', 'dapit123@gmail.com', '$2y$10$uNXjyr4OGZt7f4mfvl4uNeY/iO0vms/f32BojGvoTuip4tEmuMHiG', '2025-01-29 13:34:36'),
(4, 'daffa123', 'daffa123@gmail.com', '$2y$10$A53aFvLGshcXG1zKEOEKbO./QiWC.UIuyn6dRfYytFdytkQA3Ls1G', '2025-01-30 05:16:52'),
(5, 'septian', 'septian@gmail.com', '$2y$10$Ozbb4zcsvCoyze8ThrEFIeXr5pg3qc7oxKOZLC0CCvu8b92deziZG', '2025-01-30 07:38:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bmi`
--
ALTER TABLE `bmi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `calorie_calculations`
--
ALTER TABLE `calorie_calculations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `record_makanan`
--
ALTER TABLE `record_makanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `makanan_id` (`makanan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bmi`
--
ALTER TABLE `bmi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `calorie_calculations`
--
ALTER TABLE `calorie_calculations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `progress`
--
ALTER TABLE `progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `record_makanan`
--
ALTER TABLE `record_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bmi`
--
ALTER TABLE `bmi`
  ADD CONSTRAINT `bmi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `calorie_calculations`
--
ALTER TABLE `calorie_calculations`
  ADD CONSTRAINT `calorie_calculations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `progress`
--
ALTER TABLE `progress`
  ADD CONSTRAINT `progress_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `record_makanan`
--
ALTER TABLE `record_makanan`
  ADD CONSTRAINT `record_makanan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `record_makanan_ibfk_2` FOREIGN KEY (`makanan_id`) REFERENCES `makanan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
