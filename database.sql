-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2019 at 02:15 PM
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
-- Table structure for table `detail_transaksi`
--

CREATE TABLE IF NOT EXISTS `detail_transaksi` (
`id_detail` int(11) NOT NULL,
  `id_transaksi` varchar(6) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail`, `id_transaksi`, `id_barang`, `jumlah`, `subtotal`) VALUES
(1, 'TR0001', 10, 2, 1400000),
(2, 'TR0001', 3, 1, 30000);

--
-- Triggers `detail_transaksi`
--
DELIMITER //
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `detail_transaksi`
 FOR EACH ROW BEGIN
	UPDATE inventori SET stok= stok-NEW.jumlah
    WHERE id_barang= NEW.id_barang;
    END
//
DELIMITER ;
DELIMITER //
CREATE TRIGGER `pengembalian_stok2` BEFORE DELETE ON `detail_transaksi`
 FOR EACH ROW BEGIN
	UPDATE inventori SET stok= stok+OLD.jumlah
    WHERE id_barang= OLD.id_barang;
    END
//
DELIMITER ;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventori`
--

INSERT INTO `inventori` (`id_barang`, `nama_barang`, `nama`, `stok`, `harga`) VALUES
(3, 'Usb Type C', 'Aksesoris', 7, 30000),
(6, 'Laptop Asus A442UR', 'Laptop', 2, 700000),
(7, 'Asus ROG Strix 4779', 'Laptop', 1, 17000000),
(8, 'ADATA RAM 4GB DDR4 ', 'Aksesoris', 8, 500000),
(9, 'Keyboard Logitech Mechanical RGB Vintage core i7', 'Aksesoris', 127, 1000000),
(10, 'Hardisk Seagate 1TB USB 3.0', 'Aksesoris', 6, 700000);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(9, 3, 1, '2019-12-05', 1),
(10, 3, 3, '2019-12-06', 1),
(11, 3, 3, '2019-12-11', 1),
(12, 6, 2, '2019-12-11', 1),
(13, 7, 1, '2019-12-11', 1),
(14, 3, 7, '2019-12-13', 1),
(15, 9, 2147483647, '2019-12-13', 1);

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
(1, 'Destino Dewantara Pratama', 'Perumahan Mastrip Blok T3, Kec Sumbersari, Kab Jember', '089683184615', 'destino'),
(2, 'Aldy Noverianto Pratama', 'Sidoarjo', '0895621117335', 'Aldy Pratama');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(6) NOT NULL,
  `id_pegawai` tinyint(4) NOT NULL,
  `tanggal` date NOT NULL,
  `total_belanja` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pegawai`, `tanggal`, `total_belanja`, `pembayaran`, `kembalian`) VALUES
('TR0001', 1, '2019-12-13', 1430000, 1500000, 70000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_tmp`
--

CREATE TABLE IF NOT EXISTS `transaksi_tmp` (
`id_tmp` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `id_pegawai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `transaksi_tmp`
--
DELIMITER //
CREATE TRIGGER `pengembalian_stok` BEFORE DELETE ON `transaksi_tmp`
 FOR EACH ROW BEGIN
	UPDATE inventori SET stok= stok+OLD.jumlah
    WHERE id_barang= OLD.id_barang;
    END
//
DELIMITER ;

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
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
 ADD PRIMARY KEY (`id_detail`), ADD KEY `id_transaksi` (`id_transaksi`);

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
 ADD PRIMARY KEY (`id_tmp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inventori`
--
ALTER TABLE `inventori`
MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `inventori_masuk`
--
ALTER TABLE `inventori_masuk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id_pegawai` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_tmp`
--
ALTER TABLE `transaksi_tmp`
MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
