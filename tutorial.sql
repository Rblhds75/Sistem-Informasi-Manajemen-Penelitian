-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jul 2024 pada 15.39
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tutorial`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbdana`
--

CREATE TABLE `dbdana` (
  `Iddana` int(11) NOT NULL,
  `jenispenelitian` enum('Personal','Kelompok','Instansi') DEFAULT NULL,
  `anggarandana` enum('< Rp.1.000.000','Rp.1.000.000 - Rp.5.000.000','> Rp.5.000.000') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbdana`
--

INSERT INTO `dbdana` (`Iddana`, `jenispenelitian`, `anggarandana`) VALUES
(1, 'Personal', ''),
(2, 'Personal', '< Rp.1.000.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbjurnal`
--

CREATE TABLE `dbjurnal` (
  `Idjurnal` int(11) NOT NULL,
  `namajurnal` varchar(200) DEFAULT NULL,
  `temajurnal` enum('Teknologi','Kesehatan','Sosial','Hukum','Budaya') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbjurnal`
--

INSERT INTO `dbjurnal` (`Idjurnal`, `namajurnal`, `temajurnal`) VALUES
(1, 'Jurnal Teknik', 'Teknologi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbpeneliti`
--

CREATE TABLE `dbpeneliti` (
  `idpeneliti` int(11) NOT NULL,
  `namapeneliti` varchar(200) DEFAULT NULL,
  `jeniskel` enum('Pria','Wanita') DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `pendidikan` enum('SMA','D3','D4','S1','S2','S3') DEFAULT NULL,
  `namainstansi` varchar(50) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `notelepon` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbpeneliti`
--

INSERT INTO `dbpeneliti` (`idpeneliti`, `namapeneliti`, `jeniskel`, `email`, `pendidikan`, `namainstansi`, `kota`, `alamat`, `notelepon`) VALUES
(1004, 'Wily', 'Pria', 'Wilyqwerty@gmail.com', 'S1', 'UGM', 'Yogyakarta', 'Jl. Hangjebat No.15', '081224567890'),
(1234, 'Muhammad Febrian', 'Pria', 'mhdfebrian@gmail.com', 'S1', 'UMRI', 'Pekanbaru', 'JL. Kulim', '081234567890'),
(3432, 'luve', 'Wanita', 'lupe@mail.com', 'S1', 'UMRI', 'Pekanbaru', 'Jln. Melati', '08554565656'),
(5000, 'Iball', 'Pria', 'ribalhds@gmail.com', 'S1', 'UMRI', 'Medan', 'Jl. Sisimangaraja', '081233456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbpublikasi`
--

CREATE TABLE `dbpublikasi` (
  `Idpublikasi` int(11) NOT NULL,
  `tglsubmit` date DEFAULT NULL,
  `jenispublikasi` enum('Artikel','Paper','Jurnal') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dbpublikasi`
--

INSERT INTO `dbpublikasi` (`Idpublikasi`, `tglsubmit`, `jenispublikasi`) VALUES
(1, '2024-07-06', 'Artikel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dbrekap`
--

CREATE TABLE `dbrekap` (
  `Idrekap` int(11) NOT NULL,
  `Idpeneliti` int(11) DEFAULT NULL,
  `Idjurnal` int(11) DEFAULT NULL,
  `Iddana` int(11) DEFAULT NULL,
  `Idpublikasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`) VALUES
(1, 'wilysuris', 'wilyqwerty@gmail.com', 17, 'kepo'),
(2, 'ribal', 'ribalulala@gmail.com', 15, 'admin'),
(3, 'ribal', 'ribalhds@gmail.com', 10, 'user12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dbdana`
--
ALTER TABLE `dbdana`
  ADD PRIMARY KEY (`Iddana`);

--
-- Indeks untuk tabel `dbjurnal`
--
ALTER TABLE `dbjurnal`
  ADD PRIMARY KEY (`Idjurnal`);

--
-- Indeks untuk tabel `dbpeneliti`
--
ALTER TABLE `dbpeneliti`
  ADD PRIMARY KEY (`idpeneliti`);

--
-- Indeks untuk tabel `dbpublikasi`
--
ALTER TABLE `dbpublikasi`
  ADD PRIMARY KEY (`Idpublikasi`);

--
-- Indeks untuk tabel `dbrekap`
--
ALTER TABLE `dbrekap`
  ADD PRIMARY KEY (`Idrekap`),
  ADD KEY `Idpeneliti` (`Idpeneliti`,`Idjurnal`,`Iddana`,`Idpublikasi`),
  ADD KEY `Idpublikasi` (`Idpublikasi`),
  ADD KEY `Iddana` (`Iddana`),
  ADD KEY `Idjurnal` (`Idjurnal`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dbdana`
--
ALTER TABLE `dbdana`
  MODIFY `Iddana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dbjurnal`
--
ALTER TABLE `dbjurnal`
  MODIFY `Idjurnal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dbpublikasi`
--
ALTER TABLE `dbpublikasi`
  MODIFY `Idpublikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dbrekap`
--
ALTER TABLE `dbrekap`
  MODIFY `Idrekap` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dbrekap`
--
ALTER TABLE `dbrekap`
  ADD CONSTRAINT `dbrekap_ibfk_1` FOREIGN KEY (`Idpeneliti`) REFERENCES `dbpeneliti` (`idpeneliti`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dbrekap_ibfk_2` FOREIGN KEY (`Idpublikasi`) REFERENCES `dbpublikasi` (`Idpublikasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dbrekap_ibfk_3` FOREIGN KEY (`Iddana`) REFERENCES `dbdana` (`Iddana`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dbrekap_ibfk_4` FOREIGN KEY (`Idjurnal`) REFERENCES `dbjurnal` (`Idjurnal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
