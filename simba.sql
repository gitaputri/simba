-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 04:00 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `JENIS_INVETARISASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `JENIS_BARANG` varchar(100) NOT NULL,
  `TGL_PEROLEHAN` varchar(100) NOT NULL,
  `SATUAN` varchar(100) NOT NULL,
  `KUANTITAS` int(100) NOT NULL,
  `HARGA_PEROLEHAN` int(100) NOT NULL,
  `AKM_PENYUSUTAN` varchar(100) NOT NULL,
  `NILAI_BUKU` varchar(100) NOT NULL,
  `KONDISI_BARANG` varchar(100) NOT NULL,
  `STATUS_BARANG` varchar(100) NOT NULL,
  `FAKTUR` varchar(100) DEFAULT NULL,
  `GAMBAR` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `KODE_LOKASI`, `JENIS_INVETARISASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `JENIS_BARANG`, `TGL_PEROLEHAN`, `SATUAN`, `KUANTITAS`, `HARGA_PEROLEHAN`, `AKM_PENYUSUTAN`, `NILAI_BUKU`, `KONDISI_BARANG`, `STATUS_BARANG`, `FAKTUR`, `GAMBAR`) VALUES
(102, 'SKL', 'CD', 'INV/SDN/DLG/CD/101', 'SKLH', 'MONITOR', 'SAMSUNG', 'ELEKTRONIK', '12/02/2020', 'UNIT', 5, 5000000, '2', '4', 'BAIK', 'BARU', '', ''),
(103, 'SKL', 'CD', 'INV/SDN/DLG/CD/103', 'SKLH', 'GUDANG', 'SAMSUNG', 'TIDAK BERGERAK', '12/12/2020', 'UNIT', 5, 15000000, '2', '4', 'BAIK', 'BEKAS', '', ''),
(105, 'KLS', 'BRG', 'INV/SDN/DLG/BRG/105', 'TEST', 'KOMPUTER', 'SAMSUNG', 'ELEKTRONIK', '12/12/2020', 'UNIT', 5, 15000000, '2', '4', 'RUSAK BERAT', 'BARU', '', ''),
(106, 'KLS', 'BRG', 'INV/SDN/DLG/BRG/106', 'TEST', 'KOMPUTER', 'SAMSUNG', 'TIDAK BERGERAK', '22/02/2020', 'UNIT', 5, 15000000, '2', '4', 'BAIK', 'BARU', '', NULL),
(107, 'SKL', 'BRG', 'INV/SDN/DLG/BRG/107', 'TEST', 'KOMPUTER', 'SAMSUNG', 'TIDAK BERGERAK', '22/02/2020', 'UNIT', 5, 15000000, '2', '4', 'BAIK', 'BEKAS', 'sunshop-tag-35x70.png', NULL),
(108, 'SKL', 'BRG', 'INV/SDN/DLG/BRG/108', 'SKLH', 'KOMPUTER', 'SAMSUNG', 'BERGERAK', '22/02/2020', 'UNIT', 5, 15000000, '2', '4', 'BAIK', 'BEKAS', 'a525cac95320edb9a963026bf7523957.jpg', '6706005004_1_1_1.jpg'),
(109, 'SKL', 'BRG', 'INV/SDN/DLG/BRG/109', 'SKLH', 'KOMPUTER', 'SAMSUNG', 'TIDAK BERGERAK', '12/12/2020', 'UNIT', 5, 15000000, '2', '4', 'RUSAK RINGAN', 'HIBAH', 'CARROT.png', 'sunshop-tag-35x701.png'),
(110, 'GDN', 'BRG', 'INV/SDN/DLG/BRG/110', 'NN', 'PROJECTOR', 'LG', 'ELEKTRONIK', '22/02/2020', 'UNIT', 5, 5000000, '2', '4', 'BAIK', 'BARU', 'Graphic1.png', 'LOGO_TIF.png'),
(111, 'GDN', 'TNH', 'INV/SDN/DLG/TNH/111', 'TEST', 'LAPANGAN', 'TEST', 'BERGERAK', '12/12/2020', 'UNIT', 5, 15000000, '2', '4', 'BAIK', 'BARU', '20d1f2c97bfdbaf3a258fb9e0a042853.jpg', '4879246.jpg'),
(112, 'SKL', 'JIJ', 'INV/SDN/DLG/JIJ/112', 'SKLH', 'KOMPUTER', 'SAMSUNG', 'BERGERAK', '12/02/2020', 'UNIT', 5, 15000000, '2', '4', 'RUSAK RINGAN', 'HIBAH', 'TEST1.jpg', 'TEST2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pemanfaatan`
--

CREATE TABLE `pemanfaatan` (
  `ID_PEMANFAATAN` varchar(20) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `HARGA_PEROLEHAN` int(100) NOT NULL,
  `STATUS_PEMANFAATAN` varchar(100) NOT NULL,
  `NAMA_SEWA` varchar(100) NOT NULL,
  `LAMA_SEWA` varchar(100) NOT NULL,
  `TANGGAL_SEWA` varchar(100) NOT NULL,
  `TANGGAL_KEMBALI` varchar(100) NOT NULL,
  `HARGA_SEWA` int(100) NOT NULL,
  `KONDISI_BARANG` varchar(100) NOT NULL,
  `JAMINAN` varchar(100) NOT NULL,
  `STATUS_VERIFIKASI` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemanfaatan`
--

INSERT INTO `pemanfaatan` (`ID_PEMANFAATAN`, `ID_BARANG`, `KODE_LOKASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `TANGGAL_PEROLEHAN`, `HARGA_PEROLEHAN`, `STATUS_PEMANFAATAN`, `NAMA_SEWA`, `LAMA_SEWA`, `TANGGAL_SEWA`, `TANGGAL_KEMBALI`, `HARGA_SEWA`, `KONDISI_BARANG`, `JAMINAN`, `STATUS_VERIFIKASI`) VALUES
('PMF126', 100, 'SKL', 'INV/SDN/DLG/JIJ/2', 'TEST', 'KOMPUTER', 'DELL', '12/02/2020', 15000000, 'Pinjam', 'andi', '11', '10/02/2020', '11/02/2020', 0, 'BAIK', 'ijazah', 'DITOLAK'),
('PMF127', 109, 'SKL', 'INV/SDN/DLG/BRG/109', 'SKLH', 'KOMPUTER', 'SAMSUNG', '12/12/2020', 15000000, 'Sewa', 'andi', '11', '10/02/2020', '11/02/2020', 2200000, 'BAIK', 'ijazah', 'DISETUJUI');

-- --------------------------------------------------------

--
-- Table structure for table `pemeliharaan`
--

CREATE TABLE `pemeliharaan` (
  `ID_PEMELIHARAAN` varchar(20) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `JENIS_BARANG` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `STATUS_PEMELIHARAAN` varchar(100) NOT NULL,
  `TANGGAL_PERBAIKAN` varchar(100) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `BIAYA` int(100) NOT NULL,
  `NOTA` varchar(100) NOT NULL,
  `STATUS_VERIFIKASI` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemeliharaan`
--

INSERT INTO `pemeliharaan` (`ID_PEMELIHARAAN`, `ID_BARANG`, `KODE_BARANG`, `NAMA_BARANG`, `MERK`, `JENIS_BARANG`, `TANGGAL_PEROLEHAN`, `STATUS_PEMELIHARAAN`, `TANGGAL_PERBAIKAN`, `KETERANGAN`, `BIAYA`, `NOTA`, `STATUS_VERIFIKASI`) VALUES
('PMH001', 100, 'INV/SDN/DLG/JIJ/2', 'KOMPUTER', 'DELL', 'ELEKTRONIK', '12/02/2020', 'Perbaikan Berat', '22/02/2020', 'ERROR', 250000, '', ''),
('PMH002', 1, 'INV/SDN/DLG/TNH/1', 'Komputer', 'HP', '', '29/05/2020', 'Perbaikan Ringan', '12/12/2020', 'RUSAK ', 50000, 'tag_sample.jpg', ''),
('PMH003', 110, 'INV/SDN/DLG/BRG/110', 'PROJECTOR', 'LG', 'ELEKTRONIK', '22/02/2020', 'Perbaikan Ringan', '12/02/2020', 'RUSAK ', 150000, 'b05d54dcb0459172f686172178986019.png', 'PROSES'),
('PMH004', 112, 'INV/SDN/DLG/JIJ/112', 'KOMPUTER', 'SAMSUNG', 'BERGERAK', '12/02/2020', 'Perbaikan Ringan', '12/02/2020', 'RUSAK ', 250000, '', 'PROSES');

-- --------------------------------------------------------

--
-- Table structure for table `pemusnahan`
--

CREATE TABLE `pemusnahan` (
  `ID_PEMUSNAHAN` varchar(20) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `HARGA` int(100) NOT NULL,
  `KONDISI` varchar(100) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `JUMLAH` int(100) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL,
  `PENGAJUAN` varchar(100) NOT NULL,
  `STATUS_VERIFIKASI` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemusnahan`
--

INSERT INTO `pemusnahan` (`ID_PEMUSNAHAN`, `ID_BARANG`, `KODE_LOKASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `TANGGAL_PEROLEHAN`, `HARGA`, `KONDISI`, `GAMBAR`, `JUMLAH`, `KETERANGAN`, `STATUS`, `PENGAJUAN`, `STATUS_VERIFIKASI`) VALUES
('PMS001', 105, 'KLS', 'INV/SDN/DLG/BRG/105', 'TEST', 'KOMPUTER', 'SAMSUNG', '12/12/2020', 15000000, '15000000', '', 10, 'RUSAK ', 'Barang Dalam Sengketa', 'Ditenggelamkan', ''),
('PMS002', 105, 'KLS', 'INV/SDN/DLG/BRG/105', 'TEST', 'KOMPUTER', 'SAMSUNG', '12/12/2020', 15000000, '15000000', '', 7, 'BOSAN', 'Barang Berlebih', 'Dihancurkan', 'DISETUJUI'),
('PMS003', 103, 'SKL', 'INV/SDN/DLG/CD/103', 'SKLH', 'GUDANG', 'SAMSUNG', '12/12/2020', 15000000, '15000000', '', 10, 'BOSAN', 'Barang Berlebih', 'Dihancurkan', 'PROSES');

-- --------------------------------------------------------

--
-- Table structure for table `penggunaan`
--

CREATE TABLE `penggunaan` (
  `ID_PENGGUNAAN` varchar(20) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `HARGA_PEROLEHAN` int(100) NOT NULL,
  `STATUS_KEPEMILIKAN` varchar(100) NOT NULL,
  `STATUS_PENGGUNAAN` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penggunaan`
--

INSERT INTO `penggunaan` (`ID_PENGGUNAAN`, `ID_BARANG`, `KODE_LOKASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `TANGGAL_PEROLEHAN`, `HARGA_PEROLEHAN`, `STATUS_KEPEMILIKAN`, `STATUS_PENGGUNAAN`) VALUES
('PGN002', 100, 'SKL', 'INV/SDN/DLG/JIJ/2', 'TEST', 'KOMPUTER', 'DELL', '12/02/2020', 15, 'Sewa', 'Disewakan'),
('PGN001', 100, 'SKL', 'INV/SDN/DLG/JIJ/2', 'TEST', 'KOMPUTER', 'DELL', '12/02/2020', 15000000, 'Milik Sendiri', 'Disewakan');

-- --------------------------------------------------------

--
-- Table structure for table `penghapusan`
--

CREATE TABLE `penghapusan` (
  `ID_PENGHAPUSAN` varchar(20) NOT NULL,
  `ID_PEMUSNAHAN` varchar(50) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `HARGA_PEROLEHAN` int(100) NOT NULL,
  `KONDISI` varchar(100) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `JUMLAH` int(100) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `STATUS_BARANG` varchar(100) NOT NULL,
  `PENGAJUAN` varchar(100) NOT NULL,
  `STATUS_HAPUS` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghapusan`
--

INSERT INTO `penghapusan` (`ID_PENGHAPUSAN`, `ID_PEMUSNAHAN`, `ID_BARANG`, `KODE_LOKASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `TANGGAL_PEROLEHAN`, `HARGA_PEROLEHAN`, `KONDISI`, `GAMBAR`, `JUMLAH`, `KETERANGAN`, `STATUS_BARANG`, `PENGAJUAN`, `STATUS_HAPUS`) VALUES
('HPS005', 'PMS001', 0, 'SKL', 'INV/SDN/DLG/BRG/104', 'TEST', 'KOMPUTER', 'SAMSUNG', '12/12/2020', 15000000, '15000000', '', 3, 'BOSAN', 'Barang Dalam Sengketa', 'Ditimbun', 'Barang Tidak Ditemukan'),
('HPS006', 'PMS001', 0, 'SKL', 'INV/SDN/DLG/BRG/104', 'TEST', 'KOMPUTER', 'SAMSUNG', '12/12/2020', 15000000, '15000000', '', 3, 'BOSAN', 'Barang Dalam Sengketa', 'Ditimbun', 'Barang Tidak Ditemukan');

-- --------------------------------------------------------

--
-- Table structure for table `pindahtangan`
--

CREATE TABLE `pindahtangan` (
  `ID_PINDAHTANGAN` varchar(20) NOT NULL,
  `ID_BARANG` bigint(20) NOT NULL,
  `KODE_LOKASI` varchar(100) NOT NULL,
  `KODE_BARANG` varchar(100) NOT NULL,
  `NUP` varchar(100) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `MERK` varchar(100) NOT NULL,
  `TANGGAL_PEROLEHAN` varchar(100) NOT NULL,
  `HARGA_PEROLEHAN` int(100) NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `STATUS_PINDAHTANGAN` varchar(100) NOT NULL,
  `KETERANGAN` varchar(100) NOT NULL,
  `KONDISI` varchar(100) NOT NULL,
  `NAMA_PENERIMA` varchar(100) NOT NULL,
  `TANGGAL_PINDAHTANGAN` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pindahtangan`
--

INSERT INTO `pindahtangan` (`ID_PINDAHTANGAN`, `ID_BARANG`, `KODE_LOKASI`, `KODE_BARANG`, `NUP`, `NAMA_BARANG`, `MERK`, `TANGGAL_PEROLEHAN`, `HARGA_PEROLEHAN`, `GAMBAR`, `STATUS_PINDAHTANGAN`, `KETERANGAN`, `KONDISI`, `NAMA_PENERIMA`, `TANGGAL_PINDAHTANGAN`) VALUES
('PDT010', 1, 'A', 'INV/SDN/DLG/TNH/1', '2', 'Komputer', 'HP', '29/05/2020', 10000000, '', 'Dihibahkan', 'BOSAN', 'BAIK', 'ABDUL', '20/20/2222');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` bigint(20) NOT NULL,
  `NAMA` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `NAMA`, `USERNAME`, `PASSWORD`, `STATUS`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'Gita', 'staffoky', '21232f297a57a5a743894a0e4a801fc3', 'Karyawan'),
(3, 'Kepala Sekolah', 'staffks', '5f4dcc3b5aa765d61d8327deb882cf99', 'Kepala Sekolah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`);

--
-- Indexes for table `pemanfaatan`
--
ALTER TABLE `pemanfaatan`
  ADD PRIMARY KEY (`ID_PEMANFAATAN`);

--
-- Indexes for table `pemeliharaan`
--
ALTER TABLE `pemeliharaan`
  ADD PRIMARY KEY (`ID_PEMELIHARAAN`);

--
-- Indexes for table `pemusnahan`
--
ALTER TABLE `pemusnahan`
  ADD PRIMARY KEY (`ID_PEMUSNAHAN`);

--
-- Indexes for table `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`ID_PENGGUNAAN`);

--
-- Indexes for table `penghapusan`
--
ALTER TABLE `penghapusan`
  ADD PRIMARY KEY (`ID_PENGHAPUSAN`);

--
-- Indexes for table `pindahtangan`
--
ALTER TABLE `pindahtangan`
  ADD PRIMARY KEY (`ID_PINDAHTANGAN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
