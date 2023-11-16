-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 12.34
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe_twins`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `beverages`
--

CREATE TABLE `beverages` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `type` enum('coffee','tea','milk') NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `img` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `beverages`
--

INSERT INTO `beverages` (`id`, `name`, `type`, `price`, `qty`, `img`) VALUES
(4, 'cappucino seger', 'milk', 5000, 3, 'assets/img/591509691_Boba Milk Tea Recipe by Tasty.jpeg'),
(5, 'es jeruk seger banget', 'coffee', 10000, 24, 'assets/img/2059422524_Blue Lagoon Mocktail.jpeg'),
(8, 'strawbery milks', '', 15000, 5, 'assets/img/1452214346_Korean Strawberry Milk Recipe.jpeg'),
(9, 'caramel milks', 'milk', 10000, 5, 'assets/img/1358702390_Dreamy Caramel Milkshake - Baking Mischief.jpeg'),
(10, 'oreo milks', 'milk', 15000, 8, 'assets/img/2088804307_Recette de milk-shake Oreo - Facile.jpeg'),
(11, 'starbucks', 'coffee', 50000, 5, 'assets/img/1272866254_Starbucks Mocha Syrup Recipe (Copycat).jpeg'),
(12, 'ice hot coffe chocolatee', 'coffee', 40000, 3, 'assets/img/777505710_This Iced Hot Cocoa Is Made With Chocolate Ice Cubes.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `img` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `qty`, `img`) VALUES
(4, 'steak', 10000, 2, 'assets/img/1453040118_steak.jpeg'),
(5, 'corndog gurih kacang hijau', 10000, 3, 'assets/img/1255737305_After this lockdown, we deserve this.jpeg'),
(29, 'ayam panggang', 10000, 5, 'assets/img/677658479_Resep Ayam Panggang Bumbu Rujak dari @lilyminarosa.jpeg'),
(30, 'pudding coklat', 15000, 5, 'assets/img/1480265866_Panna cotta al caffè con salsa al cacao, ricetta facile e veloce.jpeg'),
(31, 'sate ayam', 5000, 5, 'assets/img/997093124_sate.jpeg'),
(32, 'nuggett', 11000, 5, 'assets/img/684292562_Premium Photo _ Homemade chicken nuggets battered with panko.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `name` varchar(254) NOT NULL,
  `total` int(11) NOT NULL,
  `foods_id` int(11) DEFAULT NULL,
  `beverages_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `beverages`
--
ALTER TABLE `beverages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foods` (`foods_id`),
  ADD KEY `fk_beverages` (`beverages_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `beverages`
--
ALTER TABLE `beverages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`beverages_id`) REFERENCES `beverages` (`id`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`foods_id`) REFERENCES `foods` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
