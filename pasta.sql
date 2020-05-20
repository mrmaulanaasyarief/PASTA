-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.38-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for db_pasta
DROP DATABASE IF EXISTS `db_pasta`;
CREATE DATABASE IF NOT EXISTS `db_pasta` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db_pasta`;

-- Dumping structure for table db_pasta.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pasta.barang: ~3 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
REPLACE INTO `barang` (`id_barang`, `nama_barang`, `deskripsi`, `stok`, `harga`) VALUES
	(1, 'Kursi', 'Kursi lipat', 1000, 5000),
	(2, 'Meja', 'Meja Makan', 23, 10000);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- Dumping structure for table db_pasta.item_pemesanan
DROP TABLE IF EXISTS `item_pemesanan`;
CREATE TABLE IF NOT EXISTS `item_pemesanan` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kuantitas` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_item`),
  KEY `id_pemesanan` (`id_pemesanan`),
  KEY `id_barang` (`id_barang`),
  CONSTRAINT `FK_item_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  CONSTRAINT `FK_item_pemesanan` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pasta.item_pemesanan: ~3 rows (approximately)
/*!40000 ALTER TABLE `item_pemesanan` DISABLE KEYS */;
REPLACE INTO `item_pemesanan` (`id_item`, `id_pemesanan`, `id_barang`, `kuantitas`, `harga`, `total_harga`) VALUES
	(1, 1, 2, 10, 10000, 100000),
	(2, 1, 1, 10, 5000, 50000),
	(3, 4, 2, 1, 10000, 10000);
/*!40000 ALTER TABLE `item_pemesanan` ENABLE KEYS */;

-- Dumping structure for table db_pasta.pembayaran
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE IF NOT EXISTS `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_pembayaran` varchar(255) NOT NULL,
  `tanggal_pembayaran` varchar(50) DEFAULT '',
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pasta.pembayaran: ~0 rows (approximately)
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
REPLACE INTO `pembayaran` (`id_pembayaran`, `jenis_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`, `keterangan`, `status_pembayaran`, `id_pemesanan`) VALUES
	(2, '1', '05/20/2020 9:34 PM', '', 'A.N Delan', 2, 1);
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;

-- Dumping structure for table db_pasta.pemesanan
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal_pemesanan` varchar(50) DEFAULT NULL,
  `durasi` int(11) NOT NULL,
  `total_item` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_pemesanan` int(1) NOT NULL,
  PRIMARY KEY (`id_pemesanan`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_pemesanan_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pasta.pemesanan: ~1 rows (approximately)
/*!40000 ALTER TABLE `pemesanan` DISABLE KEYS */;
REPLACE INTO `pemesanan` (`id_pemesanan`, `id_user`, `tanggal_pemesanan`, `durasi`, `total_item`, `total_harga`, `status_pemesanan`) VALUES
	(1, 2, '05/29/2020 9:00 PM', 5, 20, 150000, 1),
	(4, 1, '05/20/2020 9:40 AM', 0, 0, 0, 0);
/*!40000 ALTER TABLE `pemesanan` ENABLE KEYS */;

-- Dumping structure for table db_pasta.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jk` int(1) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_user` int(1) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_pasta.user: ~2 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
REPLACE INTO `user` (`id_user`, `nama`, `jk`, `alamat`, `email`, `telp`, `password`, `jenis_user`) VALUES
	(1, 'Delan', 0, 'Bandung', 'delan@upi.edu', '081081081081', '21232f297a57a5a743894a0e4a801fc3', 0),
	(2, 'Abuy', 0, 'Bandung', 'abuy@upi.edu', '081081081081', '91ec1f9324753048c0096d036a694f86', 1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
