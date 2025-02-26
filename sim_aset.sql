-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Nov 2024 pada 13.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_aset`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asset`
--

CREATE TABLE `asset` (
  `id_asset` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `no_asset` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `merk` text NOT NULL,
  `jml_asset` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asset`
--

INSERT INTO `asset` (`id_asset`, `id_barang`, `id_lokasi`, `no_asset`, `id_user`, `merk`, `jml_asset`) VALUES
(1, 1, 1, LT-501, 'T.860.06.MA40.072', 'Zyrex', '1'),
(2, 2, 2, LT-502, 'PSP280602363704AA22700', 'Acer', '1'),
-- --------------------------------------------------------

--
-- Struktur dari tabel `asset_kep`
--

CREATE TABLE `asset_kep` (
  `id_asset_kep` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_kep` varchar(15) NOT NULL,
  `nama_asset_kep` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asset_kep`
--

INSERT INTO `asset_kep` (`id_asset_kep`, `id_pengaduan`, `tgl_kep`, `nama_asset_kep`) VALUES
(1, 1, '2022-11-20', 'Laptop Asus Seri-A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(125) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`) VALUES
(1, 'Laptop', 'buah'),
(2, 'Tanah', 'meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Asset Tetap'),
(2, 'Asset Sementara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_asset`
--

CREATE TABLE `lokasi_asset` (
  `id_lokasi` int(11) NOT NULL,
  `nama_lokasi` varchar(125) NOT NULL,
  `alamat_lengkap` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi_asset`
--

INSERT INTO `lokasi_asset` (`id_lokasi`, `nama_lokasi`, `alamat_lengkap`) VALUES
(1, 'Kantor', 'Jl. Dr. Susanto , Kaborongan, Pati Lor, Kec. Pati, Kabupaten Pati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monitoring`
--

CREATE TABLE `monitoring` (
  `id_monitoring` int(11) NOT NULL,
  `id_asset` int(11) NOT NULL,
  `tgl_monitoring` varchar(125) NOT NULL,
  `hasil_monitoring` text NOT NULL,
  `gambar_asset_monitoring` text NOT NULL,
  `faktor_penyebab` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `monitoring`
--

INSERT INTO `monitoring` (`id_monitoring`, `id_asset`, `tgl_monitoring`, `hasil_monitoring`, `gambar_asset_monitoring`, `faktor_penyebab`) VALUES
(1, 2, '2023-11-12', '<p>Memiliki Kinerja yang menurun</p>', 'laptop.png', '<p>Butuh Penggantian RAM</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `id_monitoring` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tgl_pengaduan` varchar(15) NOT NULL,
  `total_pengaduan` int(11) NOT NULL,
  `status_pengaduan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_monitoring`, `id_user`, `tgl_pengaduan`, `total_pengaduan`, `status_pengaduan`) VALUES
(1, 1, 1, '2022-11-20', 1, 2);

-- --------------------------------------------------------


--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `no_badge` text NOT NULL,
  `tlp_ext` int(11) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(125) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_badge`, `tlp_ext`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '9388', '3015', 'admin', 'admin', 1),
(2, 'Tim TI', '9373', '3016', 'timti', 'timti', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asset`
--
ALTER TABLE `asset`
  ADD PRIMARY KEY (`id_asset`);

--
-- Indeks untuk tabel `asset_kep`
--
ALTER TABLE `asset_kep`
  ADD PRIMARY KEY (`id_asset_kep`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `lokasi_asset`
--
ALTER TABLE `lokasi_asset`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  ADD PRIMARY KEY (`id_monitoring`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  ADD PRIMARY KEY (`id_penyusutan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asset`
--
ALTER TABLE `asset`
  MODIFY `id_asset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `asset_kep`
--
ALTER TABLE `asset_kep`
  MODIFY `id_asset_kep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `lokasi_asset`
--
ALTER TABLE `lokasi_asset`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `monitoring`
--
ALTER TABLE `monitoring`
  MODIFY `id_monitoring` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penyusutan`
--
ALTER TABLE `penyusutan`
  MODIFY `id_penyusutan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
