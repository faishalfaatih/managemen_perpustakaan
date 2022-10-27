-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2022 pada 17.16
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dab_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_anggota`
--

CREATE TABLE `tab_anggota` (
  `no_anggota` int(10) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ulang_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_anggota`
--

INSERT INTO `tab_anggota` (`no_anggota`, `nama_anggota`, `email`, `no_hp`, `alamat`, `username`, `password`, `ulang_pass`) VALUES
(223344, 'Anggota Pertama', 'anggota.pertama@gmail.com', '081234567890', 'Yogyakarta', 'anggota1', 'dfb9e85bc0da607ff76e0559c62537e8', 'anggota'),
(223355, 'Anggota Kedua', 'anggota.kedua@gmail.com', '09123456789', 'Jawa Timur', 'anggota2', 'dfb9e85bc0da607ff76e0559c62537e8', 'anggota'),
(223366, 'Anggota Ketiga', 'anggota.ketiga@gmail.com', '089456654234', 'Jawa Tengah', 'anggota3', 'dfb9e85bc0da607ff76e0559c62537e8', 'anggota'),
(223377, 'Ragil', 'ragil@gmail.com', '0813242356', 'Yogyakarta', 'ragil', '67153c4ffb77b9d03276cad142a84e79', 'ragil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_buku`
--

CREATE TABLE `tab_buku` (
  `kode_buku` int(10) NOT NULL,
  `judul_buku` varchar(200) NOT NULL,
  `penulis_buku` varchar(200) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_buku`
--

INSERT INTO `tab_buku` (`kode_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun_terbit`) VALUES
(1234567890, 'Belajar HTML', 'Mark', 'Gramedia', '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_kembali`
--

CREATE TABLE `tab_kembali` (
  `kode_kembali` int(10) NOT NULL,
  `tgl_kembali` varchar(50) NOT NULL,
  `denda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_kembali`
--

INSERT INTO `tab_kembali` (`kode_kembali`, `tgl_kembali`, `denda`) VALUES
(2, '11-01-2021', '0'),
(3, '04-01-2022', '0 hari'),
(5, '24-02-2022', '37 hari (Rp 37000)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_petugas`
--

CREATE TABLE `tab_petugas` (
  `no_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ulang_pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_petugas`
--

INSERT INTO `tab_petugas` (`no_petugas`, `nama_petugas`, `username`, `password`, `ulang_pass`) VALUES
(112233, 'Petugas Perpustakaan', 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_pinjam`
--

CREATE TABLE `tab_pinjam` (
  `kode_pinjam` int(10) NOT NULL,
  `tgl_pinjam` varchar(50) NOT NULL,
  `jatuh_tempo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_pinjam`
--

INSERT INTO `tab_pinjam` (`kode_pinjam`, `tgl_pinjam`, `jatuh_tempo`) VALUES
(2, '04-01-2021', '11-01-2021'),
(3, '04-01-2022', '11-01-2022'),
(5, '11-01-2022', '18-01-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_transaksi`
--

CREATE TABLE `tab_transaksi` (
  `id_transaksi` int(10) NOT NULL,
  `kode_buku` int(10) NOT NULL,
  `no_anggota` int(10) NOT NULL,
  `no_petugas` int(10) NOT NULL,
  `kode_pinjam` int(10) NOT NULL,
  `kode_kembali` int(10) NOT NULL,
  `status` enum('Pinjam','Kembali') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tab_transaksi`
--

INSERT INTO `tab_transaksi` (`id_transaksi`, `kode_buku`, `no_anggota`, `no_petugas`, `kode_pinjam`, `kode_kembali`, `status`) VALUES
(26, 1234567890, 223355, 112233, 2, 2, 'Pinjam'),
(27, 1234567890, 223344, 112233, 3, 3, 'Kembali'),
(29, 1234567890, 223344, 112233, 5, 5, 'Kembali');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tab_anggota`
--
ALTER TABLE `tab_anggota`
  ADD PRIMARY KEY (`no_anggota`);

--
-- Indeks untuk tabel `tab_buku`
--
ALTER TABLE `tab_buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `tab_kembali`
--
ALTER TABLE `tab_kembali`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indeks untuk tabel `tab_petugas`
--
ALTER TABLE `tab_petugas`
  ADD PRIMARY KEY (`no_petugas`);

--
-- Indeks untuk tabel `tab_pinjam`
--
ALTER TABLE `tab_pinjam`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indeks untuk tabel `tab_transaksi`
--
ALTER TABLE `tab_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `kode_buku` (`kode_buku`),
  ADD KEY `no_anggota` (`no_anggota`),
  ADD KEY `no_petugas` (`no_petugas`),
  ADD KEY `tab_transaksi_ibfk_4` (`kode_pinjam`),
  ADD KEY `tab_transaksi_ibfk_5` (`kode_kembali`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tab_transaksi`
--
ALTER TABLE `tab_transaksi`
  MODIFY `id_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tab_transaksi`
--
ALTER TABLE `tab_transaksi`
  ADD CONSTRAINT `tab_transaksi_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `tab_buku` (`kode_buku`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tab_transaksi_ibfk_2` FOREIGN KEY (`no_anggota`) REFERENCES `tab_anggota` (`no_anggota`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tab_transaksi_ibfk_3` FOREIGN KEY (`no_petugas`) REFERENCES `tab_petugas` (`no_petugas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tab_transaksi_ibfk_4` FOREIGN KEY (`kode_pinjam`) REFERENCES `tab_pinjam` (`kode_pinjam`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tab_transaksi_ibfk_5` FOREIGN KEY (`kode_kembali`) REFERENCES `tab_kembali` (`kode_kembali`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
