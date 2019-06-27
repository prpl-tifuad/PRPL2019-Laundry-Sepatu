-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 18.39
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_sepatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotoproduk`
--

CREATE TABLE `fotoproduk` (
  `id_foto` int(11) NOT NULL,
  `nama_foto` varchar(50) NOT NULL,
  `ukuran` int(11) NOT NULL,
  `tipe` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fotoproduk`
--

INSERT INTO `fotoproduk` (`id_foto`, `nama_foto`, `ukuran`, `tipe`) VALUES
(1, 'standartclean.png', 13770, 'png'),
(2, 'deepclean.png', 15480, 'png'),
(3, 'kidsshoes.png', 10028, 'png'),
(4, 'bootsshoes.png', 8614, 'png'),
(5, 'repaint.png', 7674, 'png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_produk`
--

CREATE TABLE `item_produk` (
  `kode` varchar(10) NOT NULL,
  `layanan` varchar(500) NOT NULL,
  `waktu` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `id_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_produk`
--

INSERT INTO `item_produk` (`kode`, `layanan`, `waktu`, `harga`, `id_foto`) VALUES
('10', 'Standard Clean ', '30-Minutes ', 40000, 1),
('11', 'Deep Clean', '2-5 Days', 60000, 2),
('12', 'Kids Shoes', '2-Days', 30000, 3),
('13', 'Boots Shoes', '2-5 Days', 100000, 4),
('14', 'Repaint', '2-3 Weeks', 150000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelangan`
--

CREATE TABLE `pelangan` (
  `id_pelanggan` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan','','') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelangan`
--

INSERT INTO `pelangan` (`id_pelanggan`, `nama`, `jenis_kelamin`, `alamat`, `no_telepon`) VALUES
('236', 'luthfi', 'perempuan', 'sd', '0823444552342'),
('6544', 'DOnis', 'laki-laki', 'prambanan', '655'),
('980', 'fajar', 'laki-laki', 'Boyolali', '09876');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `id_pelanggan` varchar(100) NOT NULL,
  `jumlah_sepatu` int(11) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode`, `id_pelanggan`, `jumlah_sepatu`, `total`) VALUES
(3, '11', '236', 2, 120000),
(4, '14', '980', 3, 450000),
(5, '13', '6544', 2, 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'azmi', '92bf65da1c4396693d41fdd97a974ed6'),
(3, 'dimas', '204dbecad53defb7dbc16b48c787ad1a'),
(4, 'lutfi', '058423550ceb79e91919260bfe8cf2cf'),
(5, 'aji', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `fotoproduk`
--
ALTER TABLE `fotoproduk`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `item_produk`
--
ALTER TABLE `item_produk`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_foto` (`id_foto`);

--
-- Indeks untuk tabel `pelangan`
--
ALTER TABLE `pelangan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`) USING BTREE;

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `kode_2` (`kode`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `fotoproduk`
--
ALTER TABLE `fotoproduk`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `item_produk`
--
ALTER TABLE `item_produk`
  ADD CONSTRAINT `item_produk_ibfk_1` FOREIGN KEY (`id_foto`) REFERENCES `fotoproduk` (`id_foto`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `item_produk` (`kode`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelangan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
