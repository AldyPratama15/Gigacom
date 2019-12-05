-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 02:04 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventori`
--

CREATE TABLE IF NOT EXISTS `inventori` (
`id_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `stok` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`id_barang`, `nama_barang`, `nama`, `stok`, `harga`) VALUES
(3, 'Usb Type C', 'Aksesoris', 0, 30000),
(6, 'Laptop Asus A442UR', 'Laptop', 25, 700000),
(7, 'Asus ROG Strix 4779', 'Laptop', 0, 17000000);

-- --------------------------------------------------------

--
-- Table structure for table `inventori_masuk`
--

CREATE TABLE IF NOT EXISTS `inventori_masuk` (
`id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pegawai` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori_masuk`
--

INSERT INTO `inventori_masuk` (`id`, `id_barang`, `stok`, `tanggal`, `id_pegawai`) VALUES
(1, 6, 3, '2019-10-17', 1),
(2, 3, 3, '2019-10-17', 1),
(3, 3, 4, '2019-10-17', 1),
(5, 3, 3, '2019-11-27', 1),
(6, 7, 3, '2019-12-02', 1),
(7, 7, 2, '2019-12-02', 1),
(8, 7, 1, '2019-12-02', 1),
(9, 3, 1, '2019-12-05', 1);

--
-- Triggers `inventori_masuk`
--
DELIMITER //
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `inventori_masuk`
 FOR EACH ROW BEGIN
	UPDATE inventori SET stok= stok+NEW.stok
    WHERE id_barang= NEW.id_barang;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`nama`) VALUES
('Aksesoris'),
('Laptop'),
('Printer');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id_pegawai` tinyint(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama`, `alamat`, `telp`, `username`) VALUES
(1, 'Destino Putra Dewantara', 'Perumahan Mastrip Blok T3, Kec Sumbersari, Kab Jember', '089683184615', 'destino'),
(2, 'Aldy Noverianto Pratama', 'Sidoarjo', '0895621117335', 'Aldy Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id_transaksi` int(11) NOT NULL,
  `id_pegawai` tinyint(4) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tmp`
--

CREATE TABLE IF NOT EXISTS `transaksi_tmp` (
`id_transaksi` int(11) NOT NULL,
  `id_pegawai` tinyint(4) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` tinyint(4) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `jabatan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `jabatan`) VALUES
('Aldy Pratama', 'pratama', 'Karyawan'),
('destino', 'destino123', 'Karyawan'),
('Superuser', 'Superuser', 'Owner');

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewsupplai`
--
CREATE TABLE IF NOT EXISTS `viewsupplai` (
`id_supplai` int(11)
,`namabarang` text
,`stokbarang` int(11)
,`tanggalbeli` date
,`namapegawai` varchar(30)
);
-- --------------------------------------------------------

--
-- Structure for view `viewsupplai`
--
DROP TABLE IF EXISTS `viewsupplai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewsupplai` AS select `inventori_masuk`.`id` AS `id_supplai`,`inventori`.`nama_barang` AS `namabarang`,`inventori_masuk`.`stok` AS `stokbarang`,`inventori_masuk`.`tanggal` AS `tanggalbeli`,`pegawai`.`nama` AS `namapegawai` from ((`inventori_masuk` join `inventori`) join `pegawai`) where ((`inventori_masuk`.`id_barang` = `inventori`.`id_barang`) and (`inventori_masuk`.`id_pegawai` = `pegawai`.`id_pegawai`));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventori`
--
ALTER TABLE `inventori`
 ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `inventori_masuk`
--
ALTER TABLE `inventori_masuk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `inventori_masuk`
--
ALTER TABLE `inventori_masuk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
