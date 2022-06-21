-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2022 at 02:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `city_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_lokasi`, `review`, `created_at`) VALUES
(2, 1, 4, 'Good place for family gathering.... Trust me...', '2022-06-19 12:20:25'),
(3, 1, 6, 'Nice place to show soccer. Nice place to buy cloth at night', '2022-06-19 12:20:34'),
(4, 2, 4, 'I also like this places', '2022-06-19 12:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `tour_sites`
--

CREATE TABLE `tour_sites` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `caption` text NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour_sites`
--

INSERT INTO `tour_sites` (`id`, `nama`, `caption`, `deskripsi`, `gambar`, `lokasi`, `created_at`, `updated_at`) VALUES
(1, 'Monumen Tugu Pahlawan', 'Monumen peringatan ikonik yang menawarkan museum 2 lantai dengan pameran Pertempuran Surabaya 1945.', 'Monumen Tugu Pahlawan adalah sebuah penghormatan kepada para pejuang di Surabaya yang gugur mempertahankan kemerdekaan Indonesia, khususnya di Surabaya. Di areal Tugu Pahlawan juga terdapat sebuah museum perjuangan tentang pertempuran 10 November 1945 di Surabaya.\r\n\r\nDi dalam museum dilengkapi dengan berbagai diorama statis maupun elektronik yang sangat menarik untuk mengetahui sejarah di Surabaya. Kami juga menayangkan film pertempuran dengan visual efek Video Mapping yang sangat menarik.\r\n\r\nTiket masuk museum sebesar Rp 5000,-/orang. GRATIS untuk PELAJAR dan MAHASISWA dengan menunjukkan KARTU PELAJAR atau KARTU TANDA MAHASISWA (KTM)', 'tugu.jpg', '-7.2458404,112.7213382', '2022-06-17 11:41:27', '2022-06-16 12:55:55'),
(2, 'Tunjungan Plaza', 'Mega Mall CBD mewah dengan bioskop, department store & merek fesyen yang berpusat di sekitar 2 atrium utama.', 'Mega Mall CBD mewah dengan bioskop, department store & merek fesyen yang berpusat di sekitar 2 atrium utama.', 'tunjungan.jpg', '-7.262363,112.7362491', '2022-06-17 11:41:27', '2022-06-16 12:56:19'),
(4, 'Pantai Kenjeran', 'Pantai Kenjeran di Surabaya, Wisata Alam dengan Aneka Wahana', 'Lokasi Pantai Kenjeran Lama ini berada di Jalan Pantai Ria Kenjeran, Kelurahan Kenjeran, Kecamatan Bulak. Lokasinya sangat mudah dijangkau kendaraan pribadi ataupun angkutan umum.Pantai Kenjeran di Surabaya, Wisata Alam dengan Aneka Wahana', '62ac6a91dd3b5.jpg', '-7.2380563,112.7933168', '2022-06-17 11:51:13', '2022-06-17 11:51:13'),
(6, 'StadiumGelora 10 November', 'Stadion kebanggaan arek - arek Suroboyo yang di sebut bonek mania ini lebih sering dipergunakan untuk menggelar latihan sepak bola.', 'Stadion ini menjadi salah satu stadion penyelenggara Babak 8 Besar Divisi Utama Liga Indonesia 2007 yang terdadak, karena terjadinya perpindahan penyelenggaraan dari Stadion Brawijaya ke Stadion Gelora Delta dan akhirnya terjadi kekosongan tempat penyelenggara untuk menggelar secara bersamaan pertandingan pada hari pertandingan terakhir,dan stadion ini d bangun pas hari perjuangan indonesia 10 november 1945', '62adc99e2c255.jpg', '-7.2517491,112.7561559', '2022-06-18 12:48:04', '2022-06-18 12:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `password`) VALUES
(1, 'John', 'johndoe', 'john@gmail.com', '$2y$10$SnDMGSjXxSC9J2H.ORIDy.d0TGMjd2nLyOFjt.ai.LyYgMLjCzQIe'),
(2, 'Andi', 'andiuser', 'andi@gmail.com', '$2y$10$H54LEraOyVPgGthFgAihCururN95oYEfQgrOpE2QrtM/W2.Mqttsu'),
(3, 'Budi', 'budiuser', 'budi@gmail.com', '$2y$10$kL7hO578f50CKKjSH7X3heEiUNxBy.uSrBm1/.nAHdaBjk5o3SQmi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_sites`
--
ALTER TABLE `tour_sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tour_sites`
--
ALTER TABLE `tour_sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
