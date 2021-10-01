-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2021 pada 17.23
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` varchar(50) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kompetensi_keahlian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `kompetensi_keahlian`) VALUES
('DK001', 'XII TKJ 2', 'Teknik Komputer Jaringan'),
('DK002', 'XII MM 1', 'Multi Media'),
('DK003', 'XII TKJ 1', 'Teknik Komputer Jaringan'),
('DK004', 'XII RPL 2', 'Rekayasa Perangkat Lunak'),
('DK005', 'XII RPL 1', 'Rekayasa Perangkat Lunak'),
('DK006', 'XII TKJ 3', 'Teknik Komputer Jaringan'),
('DK007', 'XII MM 3', 'Multi Media'),
('DK008', 'X RPL 1', 'Rekayasa Perangkat Lunak'),
('DK009', 'X TKJ 1', 'Teknik Komputer Jaringan'),
('DK010', 'X RPL 2', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nisn` int(11) DEFAULT NULL,
  `bulan_dibayar` varchar(50) DEFAULT NULL,
  `no_bayar` varchar(50) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `id_spp` varchar(50) DEFAULT NULL,
  `ket` varchar(50) DEFAULT NULL,
  `id_petugas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nisn`, `bulan_dibayar`, `no_bayar`, `tgl_bayar`, `id_spp`, `ket`, `id_petugas`) VALUES
(1, 220701, 'Juli', '130720210918031803', '2021-07-13', 'DS001', 'LUNAS', 'DP001'),
(2, 220701, 'Agustus', '130720211554295429', '2021-07-13', 'DS001', 'LUNAS', 'DP001'),
(3, 220701, 'September', '120720211755245524', '2021-07-12', 'DS001', 'LUNAS', 'DP002'),
(4, 220701, 'Oktober', '130720210815141514', '2021-07-13', 'DS001', 'LUNAS', 'DP001'),
(5, 220701, 'November', NULL, NULL, 'DS001', NULL, NULL),
(6, 220701, 'Desember', NULL, NULL, 'DS001', NULL, NULL),
(7, 220701, 'januari', NULL, NULL, 'DS001', NULL, NULL),
(8, 220701, 'Februari', NULL, NULL, 'DS001', NULL, NULL),
(9, 220701, 'Maret', NULL, NULL, 'DS001', NULL, NULL),
(10, 220701, 'April', NULL, NULL, 'DS001', NULL, NULL),
(11, 220701, 'Mei', NULL, NULL, 'DS001', NULL, NULL),
(12, 220701, 'Juni', NULL, NULL, 'DS001', NULL, NULL),
(25, 220702, 'Juli', '120720211800180018', '2021-07-12', 'DS004', 'LUNAS', 'DP002'),
(26, 220702, 'Agustus', NULL, NULL, 'DS004', NULL, NULL),
(27, 220702, 'September', NULL, NULL, 'DS004', NULL, NULL),
(28, 220702, 'Oktober', NULL, NULL, 'DS004', NULL, NULL),
(29, 220702, 'November', NULL, NULL, 'DS004', NULL, NULL),
(30, 220702, 'Desember', NULL, NULL, 'DS004', NULL, NULL),
(31, 220702, 'januari', NULL, NULL, 'DS004', NULL, NULL),
(32, 220702, 'Februari', NULL, NULL, 'DS004', NULL, NULL),
(33, 220702, 'Maret', NULL, NULL, 'DS004', NULL, NULL),
(34, 220702, 'April', NULL, NULL, 'DS004', NULL, NULL),
(35, 220702, 'Mei', NULL, NULL, 'DS004', NULL, NULL),
(36, 220702, 'Juni', NULL, NULL, 'DS004', NULL, NULL),
(37, 220703, 'Juli', '130720211556345634', '2021-07-13', 'DS003', 'LUNAS', 'DP001'),
(38, 220703, 'Agustus', NULL, NULL, 'DS003', NULL, NULL),
(39, 220703, 'September', NULL, NULL, 'DS003', NULL, NULL),
(40, 220703, 'Oktober', NULL, NULL, 'DS003', NULL, NULL),
(41, 220703, 'November', NULL, NULL, 'DS003', NULL, NULL),
(42, 220703, 'Desember', NULL, NULL, 'DS003', NULL, NULL),
(43, 220703, 'januari', NULL, NULL, 'DS003', NULL, NULL),
(44, 220703, 'Februari', NULL, NULL, 'DS003', NULL, NULL),
(45, 220703, 'Maret', NULL, NULL, 'DS003', NULL, NULL),
(46, 220703, 'April', NULL, NULL, 'DS003', NULL, NULL),
(47, 220703, 'Mei', NULL, NULL, 'DS003', NULL, NULL),
(48, 220703, 'Juni', NULL, NULL, 'DS003', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
('DP001', 'admin', 'eb7e438ca67c4ae2275cb2d955532755', 'Talif', 'admin'),
('DP002', 'abdul', '202cb962ac59075b964b07152d234b70', 'Abdul', 'petugas'),
('DP003', 'siswa', '202cb962ac59075b964b07152d234b70', 'Talif', 'siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `id_spp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama`, `id_kelas`, `alamat`, `no_telp`, `id_spp`) VALUES
(220701, 12200761, 'Abdul Talif', 'DK005', 'Ciomas', '09876789876', 'DS001'),
(220702, 12200762, 'Naufal Hariz', 'DK002', 's', '32322', 'DS004'),
(220703, 12200763, 'Kriti Mauludin', 'DK006', 'Bogor', '0895723242', 'DS003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` varchar(50) NOT NULL,
  `tahun` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
('DS001', '2019/2020', 250000),
('DS002', '2018/2019', 200000),
('DS003', '2017/2018', 150000),
('DS004', '2021/2022', 300000),
('DS005', '2020/2021', 275000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
