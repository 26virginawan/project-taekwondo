-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2022 at 03:00 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpusku_gc`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `npm` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `npm`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `prodi`, `created_at`, `updated_at`) VALUES
(1, 1, 10000353, 'Admin GC', 'Banjarmasin', '2018-01-01', 'P', 'TI', '2020-12-05 05:07:29', '2022-03-16 08:31:29'),
(2, 2, 10000375, 'User GC', 'Banjarmasin', '2019-01-01', 'L', 'TI', '2020-12-05 05:07:29', '2020-12-05 05:07:29');

-- --------------------------------------------------------

--
-- Table structure for table `atlet`
--

CREATE TABLE `atlet` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_registrasi` date DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `bb` varchar(20) NOT NULL,
  `tb` varchar(20) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `tingkat_sabuk` varchar(50) NOT NULL,
  `kelas` enum('reguler','pomsae','kyurugi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atlet`
--

INSERT INTO `atlet` (`id`, `nama`, `tgl_registrasi`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `bb`, `tb`, `no_hp`, `tingkat_sabuk`, `kelas`) VALUES
(1, 'dani listanto', '2022-02-02', 'Gresik', '2000-10-05', 'L', '55', '170', '0252252516', 'Hitam', 'reguler'),
(2, 'Vista Tenassa', '2022-02-22', 'Batu', '2012-12-12', 'P', '55', '165', '0564865412', 'Putih', 'pomsae'),
(3, 'wayhu hidayat', '2022-03-21', 'Malang', '2022-03-01', 'L', '60', '170', '0564865412', 'Hitam', 'kyurugi');

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `jenis`, `biaya`) VALUES
(2, 'Sepeda Motor', 10000),
(5, 'Mobil', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` enum('rak1','rak2','rak3') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `isbn`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_buku`, `deskripsi`, `lokasi`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Belajar Pemrograman Java', '9920392749', 'Abdul Kadir', 'PT. Restu Ibu', 2018, 19, 'Buku Pertama Belajar Pemrograman Java Utk Pemula', 'rak1', 'buku_java.jpg', '2020-12-05 05:07:28', '2022-02-25 01:30:02'),
(2, 'Pemrograman Android', '9920395559', 'Muhammad Nurhidayat', 'PT. Restu Guru', 2018, 14, 'Jurus Rahasia Menguasai Pemrograman Android', 'rak2', 'jurus_rahasia.jpg', '2020-12-05 05:07:28', '2022-02-23 22:26:50'),
(3, 'Android Application', '9920392000', 'Dina Aulia', 'PT. Restu Ayah', 2018, 5, 'Buku Pertama Belajar Pemrograman Java Utk Pemula', 'rak2', 'create_your.jpg', '2020-12-05 05:07:28', '2020-12-11 05:28:55'),
(4, 'percobaan', '123456', 'dhaniListanto', 'PT.Baca', 2019, 5, 'lakhskdhkshdsahdkshkshs', 'rak1', '65796-2020-12-05-12-40-31.jpg', '2020-12-05 05:40:31', '2020-12-06 06:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `daftarukt`
--

CREATE TABLE `daftarukt` (
  `id` int(11) NOT NULL,
  `tgl_buka` date DEFAULT NULL,
  `tgl_tutup` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftarukt`
--

INSERT INTO `daftarukt` (`id`, `tgl_buka`, `tgl_tutup`, `status`) VALUES
(1, '2022-03-16', '2022-03-19', 'Dibuka'),
(6, '2022-03-08', '2022-03-22', 'Ditutup');

-- --------------------------------------------------------

--
-- Table structure for table `dataprestasi`
--

CREATE TABLE `dataprestasi` (
  `id` int(50) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_acara` varchar(50) NOT NULL,
  `tgl_acara` date NOT NULL,
  `lokasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataprestasi`
--

INSERT INTO `dataprestasi` (`id`, `foto`, `nama`, `nama_acara`, `tgl_acara`, `lokasi`) VALUES
(1, NULL, 'Dani Listanto', 'Kejuaraan Kota batu', '2022-03-09', 'Batu'),
(2, NULL, 'Vista', 'Kejuaraan Provinsi', '2022-03-01', 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_06_17_070037_create_anggotas_table', 1),
(3, '2018_06_17_130244_create_bukus_table', 1),
(4, '2018_06_18_014155_create_transaksis_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` int(10) UNSIGNED NOT NULL,
  `buku_id` int(10) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `anggota_id`, `buku_id`, `tgl_pinjam`, `tgl_kembali`, `status`, `ket`, `created_at`, `updated_at`) VALUES
(3, 'TR00003', 2, 2, '2020-12-09', '2020-12-14', 'kembali', 'percobaan', '2020-12-08 21:46:44', '2020-12-08 21:49:47'),
(5, 'TR00005', 2, 2, '2020-12-11', '2020-12-14', 'kembali', 'dipinjamkan selama munngkin', '2020-12-11 05:21:12', '2020-12-11 05:21:49'),
(6, 'TR00006', 2, 3, '2020-12-11', '2020-12-14', 'kembali', 'dipinjamkan selama munngkin', '2020-12-11 05:26:16', '2020-12-11 05:28:55'),
(7, 'TR00007', 2, 2, '2020-12-27', '2021-01-01', 'kembali', 'percobaan', '2020-12-26 20:59:50', '2022-02-23 22:26:50'),
(8, 'TR00008', 2, 1, '2022-02-25', '2022-03-02', 'pinjam', 'wes', '2022-02-25 01:30:01', '2022-02-25 01:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `gambar`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123', '123456@gmail.com', '$2y$10$VE6IZOuWcyM0JM53HovDKOZo02VDtVqSu2vmZJxNG9nhb6gcLvMhy', NULL, 'admin', '9YNcUu5MwM1WOePvMJ2GHeaeyymBuhqZ77fjU5yE4wi0d6EZ5hKtTqz75R7r', '2020-12-05 05:07:28', '2020-12-05 05:07:28'),
(2, 'User', 'user123', '654321@gmail.com', '$2y$10$DNBR9ocM9mB/EL2iF.D0r.6ebUIw2xwesQRbSlxs74FJ8fXniKvF6', NULL, 'user', 'sohMf4Fp6YZeJ5Y9RNCQnxIg2ghT1G1WT8oG3vzYcUofAgf5IxIPZgNOT0Oz', '2020-12-05 05:07:28', '2020-12-05 05:07:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggota_user_id_foreign` (`user_id`);

--
-- Indexes for table `atlet`
--
ALTER TABLE `atlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftarukt`
--
ALTER TABLE `daftarukt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dataprestasi`
--
ALTER TABLE `dataprestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_anggota_id_foreign` (`anggota_id`),
  ADD KEY `transaksi_buku_id_foreign` (`buku_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `atlet`
--
ALTER TABLE `atlet`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daftarukt`
--
ALTER TABLE `daftarukt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `dataprestasi`
--
ALTER TABLE `dataprestasi`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `anggota_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
