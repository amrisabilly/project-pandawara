-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2024 pada 11.57
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pandawara`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `date`, `link`, `image`) VALUES
(12, 'Beach Cleanup Campaign', 'Volunteers gather for a successful cleanup campaign at Parangtritis Beach.', '2024-12-15', '#', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60'),
(13, '500 Kilograms of Waste Collected', 'Over 500 kilograms of waste collected in our recent cleanup event.', '2024-12-15', '#', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60'),
(14, 'Restoring Natural Beauty', 'Community-driven efforts help restore the natural beauty of our environment.', '2024-12-15', '#', 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=60');

-- --------------------------------------------------------

--
-- Struktur dari tabel `local_hero`
--

CREATE TABLE `local_hero` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `local_hero`
--

INSERT INTO `local_hero` (`id`, `title`, `location`) VALUES
(5, 'Pantai Cibutun', 'https://statik.tempo.co/data/2023/10/04/id_1242606/1242606_720.jpg'),
(6, 'Kegiatan Rutin Mingguan', 'https://cdn0-production-images-kly.akamaized.net/_9JFZtLzn7Qpmo2K7Xw1-HGlXGM=/800x450/smart/filters:quality(75):strip_icc():format(webp)/kly-media-production/medias/4280274/original/083922600_1672736226-314024500_706369087077220_1758278816610169613_n.jpg'),
(7, 'Pantai Sukaraja', 'https://asset-2.tstatic.net/trends/foto/bank/images/ribuan-warga-dan-pandawara-group-membersihkan-pantai-sukaraja-bandar-lampung.jpg'),
(8, 'Pantai Labuan', 'https://asset.kompas.com/crops/K5G0gMbp3xSsHOcIuN56reVJ20I=/0x0:0x0/750x500/data/photo/2023/05/22/646b0178b7395.jpg'),
(9, 'Pantai Banten', 'https://asset.kompas.com/crops/K5G0gMbp3xSsHOcIuN56reVJ20I=/0x0:0x0/750x500/data/photo/2023/05/22/646b0178b7395.jpg'),
(10, 'Pantai Kesenden', 'https://asset.kompas.com/crops/K5G0gMbp3xSsHOcIuN56reVJ20I=/0x0:0x0/750x500/data/photo/2023/05/22/646b0178b7395.jpg'),
(11, 'Kali Krukut Depok', 'https://awsimages.detik.net.id/community/media/visual/2023/07/18/aksi-pandawara-grup-dan-pkt-bersihkan-sampah-di-krukut-depok-1_169.jpeg?w=600&q=90');

-- --------------------------------------------------------

--
-- Struktur dari tabel `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `team`
--

INSERT INTO `team` (`id`, `name`, `image`) VALUES
(5, 'Rafli', 'https://assets.promediateknologi.id/crop/161x395:720x808/750x500/webp/photo/2023/07/13/WhatsApp-Image-2023-07-13-at-125506-2706617667.jpeg'),
(6, 'Ikhsan', 'https://assets.promediateknologi.id/crop/198x360:936x934/750x500/webp/photo/2023/07/14/IMG_20230714_073851-2651395779.jpg'),
(7, 'Gilang', 'https://assets.promediateknologi.id/crop/75x266:680x726/750x500/webp/photo/2023/07/13/IMG_20230713_111232JPG-3179808416.jpg'),
(8, 'Agung', 'https://parboaboa.com/data/foto_pendukung/uploads/agung_panda.webp'),
(9, 'Rifqi', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRksYMTA84j25hvY-QVEWjeQ6x_UQEgkentQg&s');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'bima', '123'),
(2, 'admin1', 'password123'),
(3, 'admin2', 'admin456'),
(4, 'user_demo', 'demo789'),
(7, 'bimek', '$2y$10$CHwJUWLQoLvq.csdDFcOn.OPdHxGcWiObDW.syGgEFTZ2/qkeOhGi'),
(8, 'billy', '123'),
(9, 'qwe', '$2y$10$DIGAEH149OV.GKwa/9e1AO0JQQPWcMIovrPUqfcoBZIjs1xJ14uAy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `local_hero`
--
ALTER TABLE `local_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `local_hero`
--
ALTER TABLE `local_hero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
