-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2020 at 01:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistemkasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(20) NOT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `spesifikasi` varchar(145) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `harga` double NOT NULL,
  `imei` varchar(25) DEFAULT NULL,
  `qrcode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `merk`, `tipe`, `spesifikasi`, `image`, `harga`, `imei`, `qrcode`) VALUES
('122', 'Samsung', 'S10', '<p>8 GB DDR4 Memory</p>\r\n<p>254 GB SSD</p>', 'samsung.png', 45000, '7249174919414', '122.png'),
('1322', 'iPhone', 'Nitro5', '<h6>Memory 8GB / 1000GB HDD</h6>\r\n<h6>Intel i5</h6>\r\n<h6>NVIDIA 1050 RTX</h6>', 'acer.jpg', 1000000, '724917491941411', '1322.png'),
('352995091779962', 'Apple', 'iPhone 8', '<p>64GB Silver Second</p>', 'ip8_silver.jpg', 4000000, '352995091779962', '352995091779962.png'),
('353055101384821', 'Apple', 'iPhone XR', '<p>64GB Black Second Original</p>', 'iphone-xr-black-select-2018093.png', 6900000, '353055101384821', '353055101384821.png'),
('353063107465651', 'Apple', 'iPhone XR', '<p>64GB Black Second Original</p>', 'iphone-xr-black-select-2018094.png', 6900000, '353063107465651', '353063107465651.png'),
('353067106737572', 'iPhone', 'iPhone XR', '<p>64GB Red Second Original</p>', 'iphone-xr-red-select-2018091.png', 6900000, '353067106737572', '353067106737572.png'),
('353068101848216', 'Apple', 'iPhone XR', '<p>64GB Red Second Original</p>', 'iphone-xr-red-select-2018094.png', 7500000, '353068101848216', '353068101848216.png'),
('353239101462429', 'iPhone', 'iPhone 11 Pro', '<p>64GB Midnight Green Second Original</p>', 'iphone-11-pro-midnight-green-select-2019.png', 13500000, '353239101462429', '353239101462429.png'),
('353244104489296', 'iPhone', 'iPhone 11 Pro', '<p>64GB Gold Second Original</p>', 'iphone-11-pro-gold-select-2019.png', 13500000, '353244104489296', '353244104489296.png'),
('353245102636895', 'iPhone', 'iPhone 11 Pro', '<p>64GB Space Gray Second Original</p>', 'iphone-11-pro-space-select-2019.png', 13500000, '353245102636895', '353245102636895.png'),
('353253071917007', 'Apple', 'iPhone 6S', '<p>64GB Gray Second</p>', 'ip6s-gray.jpg', 0, '353253071917007', '353253071917007.png'),
('353255075681034', 'Apple', 'iPhone 6S', '<p>64GB Gold Second</p>', 'ip6s-gold.jpg', 0, '353255075681034', '353255075681034.png'),
('353290076815091', 'Apple', 'iPhone 6S Plus', '<p>128GB Gray Second</p>', 'ip6splus-gray.jpg', 0, '353290076815091', '353290076815091.png'),
('354911092837012', 'iPhone', 'iPhone 7', '<p>32GB Black Matte Second</p>', 'iPhone7_JetBlack-min.jpg', 2900000, '354911092837012', '354911092837012.png'),
('355732075701164', 'Apple', 'iPhone 6S Plus', '<p>128GB Rosegold Second</p>', 'ip6splus-rosegold.jpg', 0, '355732075701164', '355732075701164.png'),
('355833089973940', 'iPhone', 'iPhone 7', '<p>32GB Black Matte Second</p>', 'iPhone7_JetBlack-min1.jpg', 2900000, '355833089973940', '355833089973940.png'),
('356110094374821', 'Apple', 'iPhone 8 Plus', '<p>256GB Gray Second</p>', '8plus_grey.jpg', 6500000, '356110094374821', '356110094374821.png'),
('356111091210687', 'Apple', 'iPhone 8 Plus', '<p>64GB Silver Original</p>', 'refurb-iphone8plus-silver.jpg', 6000000, '356111091210687', '356111091210687.png'),
('356166094700035', 'iPhone', 'iPhone XS', '<p>64GB Gray Second Original</p>', 'refurb-iphone-xs-spacegray.jpg', 0, '356166094700035', '356166094700035.png'),
('356418102130170', 'iPhone', 'iPhone XR', '<p>128GB Black Dual SIM Second</p>', 'iphone-xr-black-select-2018091.png', 8200000, '356418102130170', '356418102130170.png'),
('356436105716175', 'Apple', 'iPhone XR', '<p>64GB Red Second Original</p>', 'iphone-xr-red-select-2018093.png', 6900000, '356436105716175', '356436105716175.png'),
('356438101399885', 'Apple', 'iPhone XR', '<p>64GB White Second Original</p>', 'iphone-xr-white-64gb3.png', 6900000, '356438101399885', '356438101399885.png'),
('356443102609502', 'Apple', 'iPhone XR', '<p>64GB White Second Original</p>', 'iphone-xr-white-64gb1.png', 6900000, '356443102609502', '356443102609502.png'),
('356571087207742', 'Apple', 'iPhone 7 Plus', '<p>128GB Blackmatte New</p>', '7_plus_black_1.jpg', 6450000, '356571087207742', '356571087207742.png'),
('356571087328944', 'iPhone', 'iPhone 7 Plus', '<p>128 GB RoseGold New</p>', 'iphone-7-plus-rose-gold.png', 6450000, '356571087328944', '356571087328944.png'),
('356709089318048', 'Apple', 'iPhone 8 Plus', '<p>256GB Gold Second</p>', 'iphone_8_plus_gold_31.jpg', 6500000, '356709089318048', '356709089318048.png'),
('356731087925889', 'Apple', 'iPhone 8', '<p>64GB Silver Second</p>', 'ip8_silver1.jpg', 4000000, '356731087925889', '356731087925889.png'),
('357334099512644', 'Apple', 'iPhone XR', '<p>64GB Red Second Original</p>', 'iphone-xr-red-select-2018092.png', 6900000, '357334099512644', '357334099512644.png'),
('357343098676268', 'Apple', 'iPhone XR', '<p>64GB Black Second Original</p>', 'iphone-xr-black-select-2018092.png', 6900000, '357343098676268', '357343098676268.png'),
('357344098389746', 'iPhone', 'iPhone XR', '<p>64GB Black Second Original</p>', 'iphone-xr-black-select-201809.png', 6900000, '357344098389746', '357344098389746.png'),
('357345095281034', 'Apple', 'iPhone XR', '<p>128GB Black Second Original</p>', 'iphone-xr-black-select-2018095.png', 8500000, '357345095281034', '357345095281034.png'),
('357346096033648', 'iPhone', 'iPhone XR', '<p>64GB Red Second Original</p>', 'iphone-xr-red-select-201809.png', 6900000, '357346096033648', '357346096033648.png'),
('357346099758951', 'iPhone', 'iPhone XR', '<p>64GB White Second Original</p>', 'iphone-xr-white-64gb.png', 0, '357346099758951', '357346099758951.png'),
('358627091373439', 'Apple', 'iPhone 8 Plus', '<p>64GB Gold Second Original</p>', 'iphone_8_plus_gold_3.jpg', 6000000, '358627091373439', '358627091373439.png'),
('C02TN3Q0HV2L', 'Apple', 'Macbook Pro', '<p>8/256GB 13\'\' Touchbar Retina 2017</p>', 'mac_2017_13inchi.jpg', 16500000, 'C02TN3Q0HV2L', 'C02TN3Q0HV2L.png'),
('FH7VJ0ZMJ5X0', 'Apple', 'Apple Watch Series 3', '<p>38MM Gray Sport</p>', '38-alu-space-sport-black-nc-1up.png', 2800000, 'FH7VJ0ZMJ5X0', 'FH7VJ0ZMJ5X0.png'),
('FHLVQNVEJ6GG', 'Apple', 'Apple Watch Series 3', '<p>42mm Rosegold</p>', 'ap_3_42mm.jpg', 2950000, 'FHLVQNVEJ6GG', 'FHLVQNVEJ6GG.png'),
('O02XT18MJ1GJ', 'Apple', 'iMac Retina 5K', '<p>27\'\' 2017</p>', 'imac27inch2017.png', 20000000, 'C02XT18MJ1GJ', 'O02XT18MJ1GJ.png');

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE `kasir` (
  `no_id` varchar(20) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(2) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `nohp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`no_id`, `nama`, `jk`, `tanggal_lahir`, `tempat_lahir`, `image`, `nohp`) VALUES
('121216', 'Baim', 'L', '2018-01-26', 'Jakarta', 'user1.jpg', '0'),
('121218', 'Rian', 'L', '2018-01-26', 'Bandung', 'user3.jpg', '0'),
('121227', 'Yoga A', 'P', '2020-07-15', 'Yogyakarta', 'yoga.jpg', '13');

-- --------------------------------------------------------

--
-- Table structure for table `laporantabel`
--

CREATE TABLE `laporantabel` (
  `id` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `purchase` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporantabel`
--

INSERT INTO `laporantabel` (`id`, `bulan`, `purchase`, `sale`, `profit`) VALUES
(1, 'Januari', 2000, 3000, 1000),
(2, 'Februari', 4500, 5000, 500),
(3, 'Maret', 3000, 4500, 1500),
(4, 'April', 2000, 3000, 1000),
(5, 'Mei', 2000, 4000, 2000),
(6, 'Juni', 2200, 3000, 800),
(7, 'Juli', 5000, 7000, 2000),
(8, 'Agustus', 5100, 7300, 4500),
(9, 'September', 1123, 2040, 3350),
(10, 'Oktober', 3300, 4532, 7000),
(11, 'November', 6501, 4450, 6700),
(12, 'Desember', 5422, 4345, 8870);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(10) NOT NULL,
  `tanggal_pengeluaran` date DEFAULT NULL,
  `jenis_pengeluaran` varchar(40) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tanggal_pengeluaran`, `jenis_pengeluaran`, `deskripsi`, `biaya`) VALUES
(1, '1901-01-11', 'Pengeluaran Harian', 'baju', 2500),
(12, '2020-07-07', 'Kebutuhan Teknisi', 'sapu', 1000),
(17, '2020-07-06', 'Kebutuhan Kasir', '<p>MAkan Bersama</p>', 50000),
(18, '2020-07-01', 'Kebutuhan Kasir', '<p>llPg</p>', 425000),
(20, '2020-07-30', 'Pengeluaran Harian', '<p>Makan Ayam</p>', 770000);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `jk` varchar(11) NOT NULL,
  `tempat_lahir` varchar(25) CHARACTER SET utf16 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `nohp` varchar(14) NOT NULL,
  `jenis_user` varchar(10) NOT NULL COMMENT '1=''admin'',2=''kasir'',3="teknisi'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `full_name`, `password`, `jk`, `tempat_lahir`, `tanggal_lahir`, `image`, `nohp`, `jenis_user`) VALUES
('1001', 'admin2', 'admin', '$2y$05$12mNzXkYKPtmQ6Q28H48COjfomD6wxr9l12gAf3/vF5Xzu1dLF9g2', 'Laki-Laki', 'Bali', '2017-03-02', 'admin1.jpg', '082981917172', 'Admin'),
('12212121212120', 'admin', 'Admin', '$2y$05$uIF50DRTImQ752Q18.m8I.cEBLrpC9ORjGoCLlVPN9SiiYkF6inlm', 'Perempuan', 'Indonesia', '2020-01-01', 'admin.jpg', '08781122', 'Admin'),
('196506122020061003', 'telly', 'Telly Lee', '$2y$05$HucONEANhZKZ3byAic4AdOft5hcdBZlXgXf70o2xRjNmisSdvRIbm', 'Laki-Laki', '...', '2020-08-10', '', '...', 'Teknisi'),
('198008102020081001', 'imamriadi', 'Imam Riadi', '$2y$05$ebeIzxoKCRnuSV91xQVLcOwPdh7bNfXCNW6tU31/5ywJbzfp7ucv6', 'Laki-Laki', '...', '2020-08-10', '', '08156854308', 'Admin'),
('199703032020032002', 'lestari', 'Lestari', '$2y$05$T/CU7GfK.ln3wpUc6MIRDeRKbbQoRrrne.HDZWJmPeUSZYR49kSUe', 'Perempuan', 'Bantul', '1997-03-03', '', '08979006000', 'Admin'),
('200203242020031005', 'turibius', 'Turibius Sugiharto', '$2y$05$0MxIzgxYzov7qGFgliJIDesFBEt0d0Wc2AyOAmdJUHWvx3KBhnn72', 'Laki-Laki', '...', '2020-08-10', '', '...', 'Teknisi'),
('200204222020041004', 'faris', 'Faris Maulana Al-Akwan', '$2y$05$gMVoihgaiQmYtoD03o.oVeHMmVHcjsPw5VbSHLBQe1hiNQxZ.Onma', 'Laki-Laki', '...', '2020-08-10', '', '...', 'Teknisi'),
('200205182020051006', 'aji', 'Denilson Aji Santoso', '$2y$05$GHf/DBquqyY.YRkMpT/B7.sLXPuKo/smcRiD8TuozGvsxQG6eG/fS', 'Laki-Laki', '...', '2020-08-10', '', '...', 'Kasir'),
('2147483647', 'teknisi', 'Mukti', '$2y$05$rmNYwzWEnMXwGr.3ftmzL.46sQGHR0g/EeAyYjXcY/GIHaA8mvxsu', 'Laki-Laki', 'Indonesia', '2020-04-27', '100_51.jpg', '087811139999', 'Teknisi'),
('90182818212', 'kasir', 'Hanif', '$2y$05$cp9aha5WVJmOec94Ybxzw.9uAukXJZqM1zKi0bH0WuHt/QdtJo98G', 'Laki-Laki', 'Indonesia', '2020-02-01', 'hanif1.jpg', '0811212', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `selesaiservice`
--

CREATE TABLE `selesaiservice` (
  `id_transaksi` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `id_petugas` varchar(20) DEFAULT NULL,
  `biaya` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `garansi` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `tunai` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kembalian` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selesaiservice`
--

INSERT INTO `selesaiservice` (`id_transaksi`, `tanggal_selesai`, `id_petugas`, `biaya`, `garansi`, `tunai`, `kembalian`) VALUES
('20200803001', '2020-08-03', '2147483647', '400000', '7 Hari', NULL, NULL),
('20200804002', '2020-08-07', '2147483647', '100000', '7 Hari', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `tanggalservice` date DEFAULT NULL,
  `merk` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `garansi` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kerusakan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `lama` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `biaya` double DEFAULT NULL,
  `idteknisi` varchar(16) CHARACTER SET utf8 NOT NULL,
  `idtransaksi` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`tanggalservice`, `merk`, `garansi`, `kerusakan`, `lama`, `biaya`, `idteknisi`, `idtransaksi`) VALUES
('2020-06-09', 'samsung', '1 minggu', 'lcd', '2hari', 100000, '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(20) CHARACTER SET utf8 NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 NOT NULL,
  `jk` varchar(11) CHARACTER SET utf8 NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nohp` int(14) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 NOT NULL,
  `tempat_lahir` varchar(25) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama`, `jk`, `tanggal_lahir`, `nohp`, `image`, `tempat_lahir`) VALUES
('12121212', 'an', 'P', '2020-03-05', 1224, 'an.jpg', 'Malaysia'),
('8888', 'aaa', 'L', '1996-07-04', 13, 'aaa.gif', 'Malaysia'),
('88880', 'aaa', 'Laki-Laki', '2020-07-08', 11, 'aaa1.gif', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `tmp`
--

CREATE TABLE `tmp` (
  `kode_barang` varchar(5) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `imei` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tmptrbelibyr`
--

CREATE TABLE `tmptrbelibyr` (
  `tunai` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kembalian` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tmptrbelibyr`
--

INSERT INTO `tmptrbelibyr` (`tunai`, `kembalian`) VALUES
('', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmptrservice`
--

CREATE TABLE `tmptrservice` (
  `imei` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `merk` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `estimasi` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `kerusakan` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tmptrserviceselesai`
--

CREATE TABLE `tmptrserviceselesai` (
  `nama_pelanggan` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tunai` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kembalian` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `garansi` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `biaya` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_service` date DEFAULT NULL,
  `id_transaksi` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `imei` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `merk` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kerusakan` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tmptrttbyr`
--

CREATE TABLE `tmptrttbyr` (
  `tunai` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kembalian` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `alasan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `detail` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksikasir`
--

CREATE TABLE `transaksikasir` (
  `id_transaksi` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `kode_barang` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `id_petugas` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksikasir`
--

INSERT INTO `transaksikasir` (`id_transaksi`, `kode_barang`, `tanggal_transaksi`, `id_petugas`) VALUES
('0000', '122', '2020-07-07', '7'),
('20200712001', '122', '2020-07-12', '2147483647'),
('20200712002', '122', '2020-07-12', '2147483647'),
('20200712002', '1322', '2020-07-12', '2147483647'),
('00001', '122', '2020-07-12', '8'),
('20200713003', '122', '2020-07-13', '90182818212'),
('20200713003', '1921', '2020-07-13', '90182818212'),
('20200713004', '122', '2020-07-13', '90182818212'),
('20200713004', '1921', '2020-07-13', '90182818212'),
('20200716005', '122', '2020-07-16', '90182818212'),
('20200716006', '122', '0000-00-00', '90182818212'),
('20200716007', '122', '2020-07-16', '90182818212'),
('20200716008', '122', '2020-07-16', '90182818212'),
('20200716008', '1322', '2020-07-16', '90182818212'),
('20200716009', '1322', '2020-07-16', '90182818212'),
('20200716009', '122', '2020-07-16', '90182818212'),
('20200717010', '122', '2020-07-17', '90182818212'),
('20200718011', '122', '2020-07-18', '90182818212'),
('20200718011', '1921', '2020-07-18', '90182818212'),
('20200718011', '1322', '2020-07-18', '90182818212'),
('20200806012', '122', '2020-08-06', '90182818212');

-- --------------------------------------------------------

--
-- Table structure for table `transaksiteknisi`
--

CREATE TABLE `transaksiteknisi` (
  `id_transaksi` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_service` date NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `id_petugas` int(16) NOT NULL,
  `merk` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `imei` varchar(30) CHARACTER SET utf8 DEFAULT NULL,
  `kerusakan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `estimasi` varchar(10) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksiteknisi`
--

INSERT INTO `transaksiteknisi` (`id_transaksi`, `tanggal_service`, `status`, `id_petugas`, `merk`, `imei`, `kerusakan`, `estimasi`) VALUES
('20200804002', '2020-08-02', 'Y', 2147483647, 'Galaxy Note 10', '324999', 'Retak LCD', '2 Hari'),
('20200813003', '2020-08-13', 'N', 2147483647, 'Samsung  A80', '724917491941412', 'Ganti Baterai', '2 Hari');

-- --------------------------------------------------------

--
-- Table structure for table `transaksitukartambah`
--

CREATE TABLE `transaksitukartambah` (
  `id_transaksi` varchar(12) CHARACTER SET utf8 DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `nama_pelanggan` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `detail` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `alasan` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `harga_jual` double NOT NULL,
  `id_petugas` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `kode_barang` varchar(20) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksitukartambah`
--

INSERT INTO `transaksitukartambah` (`id_transaksi`, `tanggal_transaksi`, `nama_pelanggan`, `detail`, `alasan`, `harga_jual`, `id_petugas`, `kode_barang`) VALUES
('20200730010', '2020-07-30', 'Mukti', 'Acer Nitro 7', 'butuh uang', 2000000, '90182818212', '35299'),
('20200807011', '2020-08-07', 'Mukti', 'iPhone 5', 'Butuh Uang', 1000000, '90182818212', '122'),
('20200807012', '2020-08-07', 'Mukti', 'iPhone 5', 'Butuh Uang', 1000000, '90182818212', '1322'),
('20200807012', '2020-08-07', 'Mukti', 'iPhone 5', 'Butuh Uang', 1000000, '90182818212', '122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`no_id`);

--
-- Indexes for table `laporantabel`
--
ALTER TABLE `laporantabel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laporantabel`
--
ALTER TABLE `laporantabel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `idtransaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
