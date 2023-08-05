-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2023 at 01:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdm_ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_user` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `masyarakat`
--

INSERT INTO `masyarakat` (`id_user`, `nik`, `nama`, `username`, `password`, `telp`, `level`) VALUES
(3, '98787867679246', 'Masyarakat 1', 'masyarakat1', '72ce908807f5f6426ad0e4100e7a7af6', '0987654332', 'masyarakat'),
(4, '1271197182910754', 'Achmad Syahrian', 'masyarakat2', '22f7ee24d04366ef973c3ed933536fc8', '089528126200', 'masyarakat'),
(6, '1212', 'asd', 'asd', '7815696ecbf1c96e6894b779456d330e', '1212', 'masyarakat');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(79, '2023-03-01', '98787867679246', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, fugiat aspernatur? Nam quasi repudiandae ullam quam, incidunt deleniti natus a dolor atque culpa vitae pariatur amet dolore explicabo quisquam, fugiat illo? Maiores commodi laborum nisi ea quia cum magnam dicta non. Fugit id aspernatur sint saepe, inventore, eius laboriosam, quo numquam magnam modi ullam labore asperiores error nesciunt non eveniet dolorum animi? Similique, magnam pariatur reiciendis, quibusdam corrupti hic quo porro repudiandae ad natus laudantium obcaecati cum repellendus. Cupiditate sapiente sequi magni rem, nemo autem! Architecto explicabo dolores fugiat quos.', '63feb5b5744ac.pengaduan.png', 'selesai'),
(81, '2023-03-01', '1271197182910754', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis, quasi qui! Facilis, hic numquam consectetur illo perferendis atque a cum, voluptatum cupiditate velit error facere aliquam similique quam iste, sint ratione? Odit culpa cupiditate eveniet consectetur dignissimos enim iure eligendi!', '63fed40b39d10.pexels-valdemaras-d-1647962.jpg', 'ditolak'),
(82, '2023-03-01', '98787867679246', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo eius voluptates neque iusto itaque corporis, nemo dignissimos facere inventore voluptatum nihil natus ipsum, nostrum pariatur dolorum illum vitae odit ducimus. Iure dolorum suscipit voluptates consequatur fuga. Repellendus molestias porro explicabo laboriosam deleniti eius, numquam at, sit inventore provident maxime quaerat.', '63fef309df2cb.wallpaperflare.com_wallpaper.jpg', 'selesai'),
(83, '2023-03-01', '98787867679246', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet inventore qui voluptatibus distinctio cumque! Sed eum autem consequatur dolores tempore aliquam tempora repudiandae veniam placeat ipsum repellat quis asperiores sunt, sequi beatae nihil, explicabo mollitia aut molestiae! Ipsa unde animi corporis aperiam pariatur quia doloremque, totam impedit facere voluptas assumenda fugit odit. Nobis obcaecati qui vel eius ab fugit itaque ullam voluptate similique porro consectetur quasi consequuntur provident iste facere fugiat, ut tempore hic ratione alias incidunt sapiente quas ipsa!', '63fef3158b441.wallpaperflare.com_wallpaper (1).jpg', 'selesai'),
(84, '2023-03-01', '98787867679246', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aspernatur officiis ipsam odit beatae possimus rerum iste temporibus, dolorum alias quos tenetur eius quasi provident quia laboriosam quae, libero id ea neque ullam? Quis, ea. Officiis distinctio modi dolore excepturi non, assumenda molestiae nisi iusto necessitatibus.', '63fef32bbc072.BAL00320.jpg', 'selesai'),
(85, '2023-03-01', '1271197182910754', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat debitis, distinctio laboriosam rerum sequi consectetur? Repellendus, molestiae quo voluptate tempora neque, modi, vero nisi minus vitae deserunt eaque ex similique! Voluptates impedit numquam eos cumque aperiam laborum fugiat, quibusdam voluptate fugit laudantium consectetur totam rerum! Pariatur hic quis natus quo tempore corrupti magnam vero temporibus. Odio provident repellendus laboriosam. Sunt ipsam dicta est voluptatem adipisci necessitatibus aliquid? Dignissimos magni, doloremque ratione, aliquid porro officiis incidunt veniam voluptatum error aspernatur voluptas?', '63fefb92873a9.Screenshot (18).png', 'selesai'),
(87, '2023-03-02', '1271197182910754', 'blablablablablablablablablablablabla', '64000e71868e1.Screenshot (21).png', 'selesai'),
(89, '2023-03-06', '98787867679246', 'Parit di desa sukamundur selalu tersumbat!', '6405ddcdc326c.Screenshot (30).png', 'selesai'),
(90, '2023-03-07', '98787867679246', 'Rumah saya hancurs', '64068c8cdf515.Screenshot (14).png', 'selesai'),
(92, '2023-03-07', '98787867679246', 'asd', '64075810110e7.Screenshot (14).png', 'ditolak'),
(93, '2023-03-08', '1271197182910754', 'Raowkoakwoakaw', '6407e48d644c4.Screenshot (8).png', 'ditolak'),
(94, '2023-03-08', '1271197182910754', 'Pengaduan satu', '6407f8a1b7232.Screenshot (25).png', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Pak Achmad', 'petugas1', 'b53fe7751b37e40ff34d012c7774d65f', '089518891018', 'petugas'),
(3, 'Admin S.Kom', 'admin', '21232f297a57a5a743894a0e4a801fc3', '081250456725', 'admin'),
(4, 'Pak Syahrian', 'petugas2', 'ac5604a8b8504d4ff5b842480df02e91', '089528126200', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(5, 82, '2023-03-02', 'Laporan diterima, kami akan segera mengatasinya..!', 1),
(6, 83, '2023-03-02', 'Kami akan mengirim anggota untuk memeriksa keadaan disana', 1),
(7, 79, '2023-03-02', 'asd', 1),
(8, 84, '2023-03-02', 'asd', 1),
(9, 85, '2023-03-02', 'Terima kasih telah melapor\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Sed soluta odit nobis eligendi aliquid rem explicabo officia magni adipisci dolorum, distinctio sapiente aspernatur enim atque, laboriosam similique voluptates commodi facere veniam corporis temporibus totam ut ratione. A delectus voluptas quis, praesentium nesciunt vel necessitatibus minus culpa ullam nisi fugit sed!', 4),
(10, 89, '2023-03-06', 'terima kasih telah melapor, kami akan mengatasinya..', 4),
(11, 90, '2023-03-07', 'Kami akan memperbaikinya!', 1),
(12, 87, '2023-03-07', 'wawawawawawaw', 4),
(13, 94, '2023-03-08', 'kami akan mengatasinya', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
