-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 07:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camarro_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas`, `id_kamar`, `fasilitas`) VALUES
(1, 1, '- Kamar berukuran luas 45 m2, kamar mandi shower dan bath up, coffee maker, sofa, LED TV 40 inch, AC.'),
(3, 2, '- Kamar berukuran luas 32 m2, kamar mandi shower, tempat tidur medium size, sofa, TV 32 inch, AC.\r\n'),
(4, 3, '-  Kamar berukuran luas 22 m2, kamar mandi shower, tempat tidur medium size, TV 24 inch, AC.');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `keterangan`, `foto`) VALUES
(1, 'Kolam Renang', '242-g11.jpg'),
(3, 'VIew tempat kumpul tepi pantai', '414-g7.jpg'),
(4, 'Tempat outdoor tepi pantai', '219-g4.jpg'),
(5, 'Tempat outdoor tepi pantai (2)', '706-g9.jpg'),
(6, 'View halaman luar atau depan kamar', '759-g5.jpg'),
(7, 'Tempat makan outdoor', '462-g8.jpg'),
(8, 'Kamar Tidur Superior', '672-k5.jpg'),
(10, 'Kamar Tidur Deluxe', '937-k1.jpg'),
(11, 'Kamar Tidur Standart', '269-k6.jpg'),
(12, 'Spa atau Pijat', '838-g12.jpg'),
(13, 'Tempat kumpul (2)', '85-g13.jpg'),
(14, 'Tempat kumpul (3)', '472-g14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(255) DEFAULT NULL,
  `fasilitas` text NOT NULL,
  `harga` int(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `tipe_kamar`, `fasilitas`, `harga`, `stock`, `foto`) VALUES
(1, 'SUPERIOR', '- Kamar berukuran luas 45 m2, kamar mandi shower dan bath up, coffee maker, sofa, LED TV 40 inch, AC.', 750000, 4, '399-k5.jpg'),
(2, 'DELUXE', '- Kamar berukuran luas 32 m2, kamar mandi shower, tempat tidur medium size, sofa, TV 32 inch, AC.', 500000, 3, '466-k1.jpg'),
(3, 'STANDART', '- Kamar berukuran luas 22 m2, kamar mandi shower, tempat tidur medium size, TV 24 inch, AC.', 350000, 3, '109-k6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `jml_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `hp_pemesan` varchar(255) DEFAULT NULL,
  `nama_tamu` varchar(255) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `check_in`, `check_out`, `jml_kamar`, `nama_pemesan`, `email_pemesan`, `hp_pemesan`, `nama_tamu`, `id_kamar`, `status`) VALUES
(2, '2022-05-18', '2022-05-19', '1', 'eyy', 'eyy@gmail.com', '0897654689', 'eyy', 1, '2'),
(3, '2022-05-23', '2022-05-24', '1', 'yiha', 'yiha@gmail.com', '08798654678', 'yiha', 2, '2'),
(5, '2022-05-18', '2022-05-19', '1', 'eren', 'eren@gmai.com', '097854', 'eren', 1, '2'),
(6, '2022-05-25', '2022-05-26', '1', 'sean', 'sean@gmail.com', '0876543', 'sean', 2, '1'),
(8, '2022-05-20', '2022-05-21', '2', 'putri', 'putri@gmail.com', '098776577', 'putri', 1, '1'),
(11, '2022-05-26', '2022-01-27', '1', 'febi', 'febi@gmail.com', '097675434', 'febi', 1, '2'),
(12, '2022-05-26', '2022-05-27', '1', 'joko', 'joko@gmail.com', '08765436789', 'joko', 1, '1'),
(13, '2022-05-27', '2022-05-28', '1', 'niki', 'niki@gmail.com', '0987654', 'niki', 1, '2'),
(14, '2022-05-27', '2022-05-28', '2', 'jake', 'jake@gmail.com', '0987654', 'jake', 2, '1'),
(15, '2022-05-30', '2022-05-31', '1', 'jay', 'jay@gmail.com', '087654334', 'jay', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tambah_kamar`
--

CREATE TABLE `tambah_kamar` (
  `id` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tambah_kamar`
--

INSERT INTO `tambah_kamar` (`id`, `id_kamar`, `qty`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 1),
(4, 2, 5),
(5, 1, 4),
(6, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', 'admin', '1'),
(3, 'Resepsionis', 'resepsionis', 'resepsionis', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tambah_kamar`
--
ALTER TABLE `tambah_kamar`
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
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tambah_kamar`
--
ALTER TABLE `tambah_kamar`
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
