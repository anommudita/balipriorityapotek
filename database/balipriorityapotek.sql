-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2023 pada 18.33
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balipriorityapotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_invoice`
--

CREATE TABLE `form_invoice` (
  `id` int(11) NOT NULL,
  `nomor_invoice` varchar(128) NOT NULL,
  `dokter` int(11) NOT NULL,
  `no_rekam_medis` varchar(6) NOT NULL,
  `nama_pasien` int(11) NOT NULL,
  `tindakan1` int(11) NOT NULL,
  `diskon1` varchar(128) NOT NULL,
  `harga1` varchar(128) NOT NULL,
  `tindakan2` int(11) NOT NULL,
  `diskon2` varchar(128) NOT NULL,
  `harga2` varchar(128) NOT NULL,
  `tindakan3` int(11) NOT NULL,
  `diskon3` varchar(128) NOT NULL,
  `harga3` varchar(128) NOT NULL,
  `tindakan4` int(11) NOT NULL,
  `diskon4` varchar(128) NOT NULL,
  `harga4` varchar(128) NOT NULL,
  `tindakan5` int(11) NOT NULL,
  `diskon5` varchar(128) NOT NULL,
  `harga5` varchar(128) NOT NULL,
  `jenis_obat` int(11) NOT NULL,
  `jumlah_obat` int(11) NOT NULL,
  `jenis_obat2` int(11) NOT NULL,
  `jumlah_obat2` int(11) NOT NULL,
  `jenis_obat3` int(11) NOT NULL,
  `jumlah_obat3` int(11) NOT NULL,
  `jenis_obat4` int(11) NOT NULL,
  `jumlah_obat4` int(11) NOT NULL,
  `jenis_obat5` int(11) NOT NULL,
  `jumlah_obat5` int(11) NOT NULL,
  `pajak` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_invoice`
--

INSERT INTO `form_invoice` (`id`, `nomor_invoice`, `dokter`, `no_rekam_medis`, `nama_pasien`, `tindakan1`, `diskon1`, `harga1`, `tindakan2`, `diskon2`, `harga2`, `tindakan3`, `diskon3`, `harga3`, `tindakan4`, `diskon4`, `harga4`, `tindakan5`, `diskon5`, `harga5`, `jenis_obat`, `jumlah_obat`, `jenis_obat2`, `jumlah_obat2`, `jenis_obat3`, `jumlah_obat3`, `jenis_obat4`, `jumlah_obat4`, `jenis_obat5`, `jumlah_obat5`, `pajak`, `total`, `date_created`) VALUES
(43, 'BPA-230806909621', 18, '000001', 58, 15, '50', '2500', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 21, 2, 23, 1, 0, 0, 0, 0, 0, 0, 10, 85250, '2023-08-06'),
(44, 'BPA-230806929495', 19, '000006', 59, 15, '50', '2500', 0, '0', '0', 0, '0', '0', 0, '0', '0', 0, '0', '0', 21, 2, 0, 0, 0, 0, 0, 0, 0, 0, 10, 79750, '2023-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pemeriksaan`
--

CREATE TABLE `form_pemeriksaan` (
  `id` int(11) NOT NULL,
  `no_rekam_medis` varchar(6) NOT NULL,
  `nama_pasien` int(11) NOT NULL,
  `nama_dokter` int(11) NOT NULL,
  `S` varchar(2000) NOT NULL,
  `O` varchar(2000) NOT NULL,
  `A` varchar(2000) NOT NULL,
  `P` varchar(2000) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_pemeriksaan`
--

INSERT INTO `form_pemeriksaan` (`id`, `no_rekam_medis`, `nama_pasien`, `nama_dokter`, `S`, `O`, `A`, `P`, `date_created`) VALUES
(34, '', 54, 18, '1', '1', '1', '1', '2023-07-30'),
(35, '', 56, 18, 'Subjek', 'Objektif', 'Assement', 'Plan', '2023-07-31'),
(36, '', 57, 18, 'We\'re operating an entire market,  the business podcast,  the segment of podcasting I think is by far going to be the most valuable is obviously the business podcast because who listens?  It\'s like the most successful people in the world listen because they want to continuously learn because they\'re building empires and they can turn that knowledge into profit.  But they don\'t sit around watching fucking YouTube videos.  They\'re learning,  they\'re using podcasts because they want to learn when their eyes are busy.  And so that\'s what makes it super powerful that a lot of podcasters don\'t actually understand one of the most superpowers of podcasting.', 'We\'re operating an entire market,  the business podcast,  the segment of podcasting I think is by far going to be the most valuable is obviously the business podcast because who listens?  It\'s like the most successful people in the world listen because they want to continuously learn because they\'re building empires and they can turn that knowledge into profit.  But they don\'t sit around watching fucking YouTube videos.  They\'re learning,  they\'re using podcasts because they want to learn when their eyes are busy.  And so that\'s what makes it super powerful that a lot of podcasters don\'t actually understand one of the most superpowers of podcasting.', 'We\'re operating an entire market,  the business podcast,  the segment of podcasting I think is by far going to be the most valuable is obviously the business podcast because who listens?  It\'s like the most successful people in the world listen because they want to continuously learn because they\'re building empires and they can turn that knowledge into profit.  But they don\'t sit around watching fucking YouTube videos.  They\'re learning,  they\'re using podcasts because they want to learn when their eyes are busy.  And so that\'s what makes it super powerful that a lot of podcasters don\'t actually understand one of the most superpowers of podcasting.', 'We\'re operating an entire market,  the business podcast,  the segment of podcasting I think is by far going to be the most valuable is obviously the business podcast because who listens?  It\'s like the most successful people in the world listen because they want to continuously learn because they\'re building empires and they can turn that knowledge into profit.  But they don\'t sit around watching fucking YouTube videos.  They\'re learning,  they\'re using podcasts because they want to learn when their eyes are busy.  And so that\'s what makes it super powerful that a lot of podcasters don\'t actually understand one of the most superpowers of podcasting.', '2023-07-31'),
(38, '000001', 58, 18, 'test2', 'test2', 'test2', 'test2', '2023-08-06'),
(40, '000006', 59, 19, 'ABCDEF', 'HIJKL', 'KLMNO', 'PQRSTUV', '2023-08-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_obat`
--

CREATE TABLE `jenis_obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(128) NOT NULL,
  `harga` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_obat`
--

INSERT INTO `jenis_obat` (`id`, `nama_obat`, `harga`, `date_created`) VALUES
(0, '-', '0', '2023-07-21'),
(21, 'Parasetamol', '35000', '2023-07-17'),
(23, 'Minyak Kayu Putih', '5000', '2023-07-17'),
(24, 'Panadol', '30000', '2023-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pajak`
--

CREATE TABLE `pajak` (
  `id` int(11) NOT NULL,
  `pajak` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pajak`
--

INSERT INTO `pajak` (`id`, `pajak`, `keterangan`, `date_created`) VALUES
(0, '0%', '-', '0000-00-00'),
(9, '0%', 'Gratis karena menggunakan member', '2023-07-16'),
(10, '10%', 'Pajak PPN', '2023-07-16'),
(11, '10%', 'Pajak 10%', '2023-07-20'),
(13, '50%', 'Pajak Mahal Bro!', '2023-07-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `no_rekam_medis` varchar(6) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`no_rekam_medis`, `nik`, `nama`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `alamat`, `no_telepon`, `date_created`) VALUES
('000003', '5108062401020001', 'Anom Mudita', '2002-01-24', '21 tahun 7 bulan', 'Perempuan', 'Street Kutilang number 10', '12345', '2023-08-06'),
('000004', '5108062401020002', 'Test hari ini', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'jalan kenari no 9 kaliuntu', '123', '2023-08-06'),
('000001', '5108062401020003', 'Anom Mudita', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'Street Kutilang number 10', '087715842117', '2023-08-06'),
('000002', '5108062401020005', 'Gede Jayadi', '2002-06-03', '21 tahun 1 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', '2023-07-30'),
('000005', '5108062401020006', 'test 05', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'Street Kutilang number 10', '087715842117', '2023-08-06'),
('000006', '5108062401020009', 'Test 8', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', '2023-08-06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `record_pasien`
--

CREATE TABLE `record_pasien` (
  `id` int(11) NOT NULL,
  `no_rm` varchar(128) NOT NULL,
  `nik` varchar(128) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` text NOT NULL,
  `dokter` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `status_invoice` int(11) NOT NULL,
  `status_periksa` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `record_pasien`
--

INSERT INTO `record_pasien` (`id`, `no_rm`, `nik`, `nama`, `tanggal_lahir`, `umur`, `jenis_kelamin`, `alamat`, `no_tlp`, `dokter`, `status`, `status_invoice`, `status_periksa`, `date_created`) VALUES
(54, 'BPA-23073064c66e7a873bb', '5108062401020005', 'Gede Jayadi', '2002-06-03', '21 tahun 1 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', 18, 3, 1, 1, '2023-07-30'),
(55, 'BPA-23073064c66e9fc3974', '5108062401020005', 'Gede Jayadi', '2002-06-03', '21 tahun 1 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', 18, 0, 0, 0, '2023-07-30'),
(56, 'BPA-23073164c6fed82bd4b', '5108062401020005', 'Gede Jayadi', '2002-06-03', '21 tahun 1 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', 18, 3, 1, 1, '2023-07-31'),
(57, 'BPA-23073164c71aae85643', '5108062401020005', 'Gede Jayadi', '2002-06-03', '21 tahun 1 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', 18, 3, 1, 1, '2023-08-06'),
(58, 'BPA-23080664cf208cd9d6d', '5108062401020003', 'Anom Mudita', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'Street Kutilang number 10', '087715842117', 18, 3, 2, 2, '2023-08-07'),
(59, 'BPA-23080664cf75458dfce', '5108062401020009', 'Test 8', '2002-01-24', '21 tahun 7 bulan', 'Laki-laki', 'Jalan Setia Budi, Banyuning Timur', '087715842117', 19, 3, 1, 1, '2023-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tindakan`
--

CREATE TABLE `tindakan` (
  `id` int(11) NOT NULL,
  `nama_tindakan` varchar(128) NOT NULL,
  `biaya` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tindakan`
--

INSERT INTO `tindakan` (`id`, `nama_tindakan`, `biaya`, `date_created`) VALUES
(0, '-', '0', '2023-07-21'),
(15, 'Mengecek tensi', '5000', '2023-07-15'),
(16, 'Mengecek gula', '35000', '2023-07-15'),
(17, 'mengecek suhu tubuh', '35000', '2023-07-16'),
(18, 'Mengecek Tinggi Badan', '35000', '2023-07-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(11) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `role_id`, `nama`, `username`, `password`, `status`, `foto`, `date_created`) VALUES
(1, 1, 'Admin', 'admin', '$2y$10$.fwrPQZbpv7KKeRq2L6oDugJoKeQ2bhnF4Agfi.tCk4QW8KOLfBUm', 1, 'default.png', '2023-07-08'),
(18, 2, 'Dokter A', 'doktera', '$2y$10$iKvRPJIMQSNHIBo8r50CB.DmqSC9JWAQyhL4iHSR5KWfe.Kay7DO6', 0, 'default.png', '2023-07-20'),
(19, 2, 'Dokter B', 'dokterb', '$2y$10$zu9yFk2LQSqOnen5U6el1e1P6t9kjmrk0zyJotuC0qfzgbX/Wmq5O', 1, 'default.png', '2023-07-15'),
(20, 2, 'Dokter C', 'dokterc', '$2y$10$cfnkAGALtoKWjwH5z1R4duguM8fqzHb3GNs28ACkYfDC.otCdxgEa', 0, 'default.png', '2023-07-15'),
(21, 2, 'Dokter D', 'dokterd', '$2y$10$zHt5me22T5YpIGuN2j/z3eCkEVtBFrCdK3SHEzFg8RPEGokgl76tO', 0, 'default.png', '2023-07-15'),
(22, 2, 'Dokter E', 'doktere', '$2y$10$rXHNfcfeE8U/glJhkV1TyuRXo4P9kAQ4WC8hZiJ0Z.EfiNSDUY4GK', 0, 'default.png', '2023-07-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `form_invoice`
--
ALTER TABLE `form_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tindakan1` (`tindakan1`),
  ADD KEY `tindakan2` (`tindakan2`),
  ADD KEY `jenis_obat` (`jenis_obat`),
  ADD KEY `pajak` (`pajak`),
  ADD KEY `nama_pasien` (`nama_pasien`),
  ADD KEY `dokter` (`dokter`),
  ADD KEY `tindakan3` (`tindakan3`),
  ADD KEY `tindakan4` (`tindakan4`),
  ADD KEY `tindakan5` (`tindakan5`),
  ADD KEY `jenis_obat2` (`jenis_obat2`),
  ADD KEY `jenis_obat3` (`jenis_obat3`),
  ADD KEY `jenis_obat4` (`jenis_obat4`),
  ADD KEY `jenis_obat5` (`jenis_obat5`);

--
-- Indeks untuk tabel `form_pemeriksaan`
--
ALTER TABLE `form_pemeriksaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama_dokter` (`nama_dokter`),
  ADD KEY `form_pemeriksaan_ibfk_2` (`nama_pasien`);

--
-- Indeks untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pajak`
--
ALTER TABLE `pajak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `record_pasien`
--
ALTER TABLE `record_pasien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dokter` (`dokter`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `form_invoice`
--
ALTER TABLE `form_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `form_pemeriksaan`
--
ALTER TABLE `form_pemeriksaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `jenis_obat`
--
ALTER TABLE `jenis_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `pajak`
--
ALTER TABLE `pajak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `record_pasien`
--
ALTER TABLE `record_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form_invoice`
--
ALTER TABLE `form_invoice`
  ADD CONSTRAINT `form_invoice_ibfk_1` FOREIGN KEY (`tindakan1`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_10` FOREIGN KEY (`tindakan5`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_11` FOREIGN KEY (`jenis_obat2`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_12` FOREIGN KEY (`jenis_obat3`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_13` FOREIGN KEY (`jenis_obat4`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_14` FOREIGN KEY (`jenis_obat5`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_2` FOREIGN KEY (`tindakan2`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_4` FOREIGN KEY (`jenis_obat`) REFERENCES `jenis_obat` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_5` FOREIGN KEY (`pajak`) REFERENCES `pajak` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_6` FOREIGN KEY (`nama_pasien`) REFERENCES `record_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_7` FOREIGN KEY (`dokter`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_8` FOREIGN KEY (`tindakan3`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_invoice_ibfk_9` FOREIGN KEY (`tindakan4`) REFERENCES `tindakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `form_pemeriksaan`
--
ALTER TABLE `form_pemeriksaan`
  ADD CONSTRAINT `form_pemeriksaan_ibfk_1` FOREIGN KEY (`nama_dokter`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_pemeriksaan_ibfk_2` FOREIGN KEY (`nama_pasien`) REFERENCES `record_pasien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `record_pasien`
--
ALTER TABLE `record_pasien`
  ADD CONSTRAINT `record_pasien_ibfk_1` FOREIGN KEY (`dokter`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `record_pasien_ibfk_2` FOREIGN KEY (`nik`) REFERENCES `pasien` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
