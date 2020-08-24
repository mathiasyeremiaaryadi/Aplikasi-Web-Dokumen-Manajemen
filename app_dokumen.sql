-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2018 pada 10.17
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `app_dokumen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
`id` int(11) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `user_id`) VALUES
(4, 'Google', 27),
(6, 'Oracle', 26);

-- --------------------------------------------------------

--
-- Struktur dari tabel `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
`id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `file` varchar(255) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `log` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `docs`
--

INSERT INTO `docs` (`id`, `judul`, `file`, `deskripsi`, `tanggal`, `user_id`, `kategori_id`, `log`) VALUES
(20, 'Penjualan 2018', 'file_docs/Penjualan 2018.docx', 'wfwfdfs', '2018-06-12 19:03:44', 21, 4, '0000-00-00 00:00:00'),
(23, 'Paduan Karyawan Baru', 'file_docs/Paduan Karyawan Baru.docx', 'Paduan dan petunjuk untuk karyawan baru, agar mereka bisa mengikuti aturan perusahaan', '2018-06-06 10:05:20', 21, 4, '0000-00-00 00:00:00'),
(24, 'Penawaran 2019', 'file_docs/Penawaran 2019.pdf', 'Paduan 2019', '2018-06-06 10:16:19', 21, 4, '0000-00-00 00:00:00'),
(25, 'Penjualan 2018', 'file_docs/Penjualan 2018.pdf', 'fssdwd2d2d', '2018-06-06 10:29:48', 21, 2, '0000-00-00 00:00:00'),
(26, 'Pemasaran 2019', 'file_docs/Pemasaran 2019.txt', 'FWFSDFWEFDSFSF', '2018-06-12 18:40:30', 21, 4, '0000-00-00 00:00:00'),
(27, 'Pembayaran LIstrik', 'file_docs/Pembayaran LIstrik.docx', 'Ini penting', '2018-06-15 12:28:16', 21, 4, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `docs_tag`
--

CREATE TABLE IF NOT EXISTS `docs_tag` (
`id` int(11) NOT NULL,
  `docs_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `divisi_id`, `user_id`) VALUES
(1, 'Keuangan', 4, NULL),
(2, 'Event', 4, NULL),
(4, 'Event', NULL, 21),
(5, 'Rapat', NULL, 21),
(6, 'THR', NULL, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `divisi_id` int(11) DEFAULT NULL,
  `member` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `foto`, `divisi_id`, `member`) VALUES
(21, 'Mathias Yeremia Aryadi', 'mathiasy123@gmail.com', '$2y$10$BTchh.JrGe98lhK9eBUpQulWpmwP50uuhIh6GfgRF/q5jxxLUcZ.K', 'image/uploads/.jpg', 4, '2018-06-10'),
(26, 'kami123', 'kami@gmail.com', '$2y$10$BEKGfI/ITzulSPVcQFhJzeD/OqAL7XYlFN12/OooG9dkwOshzI2MO', 'image/uploads/kami123.jpg', 4, '0000-00-00'),
(27, 'Kiki', 'kiki123@gmail.com', '$2y$10$Ph0qbdPb/Lmv69ZeBubnhOX/4PLnggFCzof1T1uaSBpXCVqKQ64Qu', 'image/uploads/Kiki.jpg', 4, '0000-00-00'),
(28, 'Bahahaha', 'bahaha@gmail.com', '$2y$10$.bOaMvUEhEqYZe0xAlbZLe3n6Lsbv3.QcCPdAm.yeZXKEHpxfJc2O', 'image/uploads/Bahahaha.jpg', 6, '0000-00-00'),
(29, 'Daisuki', 'oppai123@gmail.com', '$2y$10$RZmJjT9FrqEgchtjEmEBLO1yx2C9bm/wWLl9VA2.2acYWwtGQGW.y', 'image/uploads/Daisuki.jpg', 4, '2018-06-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`,`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `docs`
--
ALTER TABLE `docs`
 ADD PRIMARY KEY (`id`), ADD KEY `kategori_id` (`kategori_id`), ADD KEY `id` (`id`,`kategori_id`), ADD KEY `id_2` (`id`,`kategori_id`), ADD KEY `user_id` (`user_id`), ADD KEY `id_3` (`id`,`user_id`);

--
-- Indexes for table `docs_tag`
--
ALTER TABLE `docs_tag`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`,`docs_id`,`tag_id`), ADD KEY `id_2` (`id`), ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`), ADD KEY `id_2` (`id`), ADD KEY `divisi_id` (`divisi_id`), ADD KEY `id_3` (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`,`nama`), ADD KEY `id_2` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`,`divisi_id`), ADD KEY `divisi_id` (`divisi_id`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`), ADD KEY `id_4` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `docs`
--
ALTER TABLE `docs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `docs_tag`
--
ALTER TABLE `docs_tag`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `divisi`
--
ALTER TABLE `divisi`
ADD CONSTRAINT `divisi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `docs`
--
ALTER TABLE `docs`
ADD CONSTRAINT `docs_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `docs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `docs_tag`
--
ALTER TABLE `docs_tag`
ADD CONSTRAINT `docs_tag_ibfk_1` FOREIGN KEY (`id`) REFERENCES `docs` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `docs_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kategori`
--
ALTER TABLE `kategori`
ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON UPDATE CASCADE,
ADD CONSTRAINT `kategori_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
