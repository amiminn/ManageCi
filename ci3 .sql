-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2022 pada 16.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_barang`
--

CREATE TABLE `tbl_barang` (
  `ID` int(11) NOT NULL,
  `KODEBRG` varchar(10) NOT NULL,
  `NAMABRG` varchar(100) NOT NULL,
  `SATUAN` varchar(10) NOT NULL,
  `HARGABELI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dbeli`
--

CREATE TABLE `tbl_dbeli` (
  `ID` int(11) NOT NULL,
  `NOTRANSAKSI` varchar(10) NOT NULL,
  `KODEBRG` varchar(10) NOT NULL,
  `HARGABELI` int(11) NOT NULL,
  `QTY` int(11) NOT NULL,
  `DISKON` int(11) NOT NULL,
  `DISKONRP` int(11) NOT NULL,
  `TOTALRP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hbeli`
--

CREATE TABLE `tbl_hbeli` (
  `ID` int(11) NOT NULL,
  `NOTRANSAKSI` varchar(10) NOT NULL,
  `KODESPL` varchar(10) NOT NULL,
  `TGLBELI` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hutang`
--

CREATE TABLE `tbl_hutang` (
  `ID` int(11) NOT NULL,
  `NOTRANSAKSI` varchar(10) NOT NULL,
  `KODESPL` varchar(10) NOT NULL,
  `TGLBELI` datetime NOT NULL DEFAULT current_timestamp(),
  `TOTALHUTANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `KODEBRG` varchar(10) NOT NULL,
  `QTYBELI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `ID` int(11) NOT NULL,
  `KODESPL` varchar(10) NOT NULL,
  `NAMASPL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbl_dbeli`
--
ALTER TABLE `tbl_dbeli`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbl_hbeli`
--
ALTER TABLE `tbl_hbeli`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_barang`
--
ALTER TABLE `tbl_barang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_dbeli`
--
ALTER TABLE `tbl_dbeli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_hbeli`
--
ALTER TABLE `tbl_hbeli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_hutang`
--
ALTER TABLE `tbl_hutang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
