-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2020 at 03:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orchid`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_keuangan`
--

CREATE TABLE `akun_keuangan` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_keuangan`
--

INSERT INTO `akun_keuangan` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_keuangan', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akun_marketing`
--

CREATE TABLE `akun_marketing` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_marketing`
--

INSERT INTO `akun_marketing` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_marketing', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '085923192389');

-- --------------------------------------------------------

--
-- Table structure for table `akun_project_manager`
--

CREATE TABLE `akun_project_manager` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_project_manager`
--

INSERT INTO `akun_project_manager` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_pm', 'Octavian', 'teuing', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `akun_purchasing`
--

CREATE TABLE `akun_purchasing` (
  `ktp` varchar(16) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun_purchasing`
--

INSERT INTO `akun_purchasing` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('123', '123', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, NULL),
('admin_purchasing', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_barang_pr`
--

CREATE TABLE `angsuran_barang_pr` (
  `ID_angsuran_bayar_pr` varchar(10) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `sisa_pembayaran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_barang_pr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_bulanan`
--

CREATE TABLE `angsuran_bulanan` (
  `ID_angsuran_bulanan` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_angsuran_bulanan` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_invoice_angsuran_bulanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran_bulanan`
--

INSERT INTO `angsuran_bulanan` (`ID_angsuran_bulanan`, `no_ktp`, `angsuran_ke`, `tanggal`, `bulan`, `tahun`, `nominal_angsuran_bulanan`, `sisa_angsuran`, `status`, `ID_invoice_angsuran_bulanan`) VALUES
('AB001', '3273172510970001', 1, 10, 10, 2010, 6000000, 189000000, 0, 'IAB001');

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_dp`
--

CREATE TABLE `angsuran_dp` (
  `ID_dp` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_angsuran_dp` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `ID_invoice_dp` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_injek`
--

CREATE TABLE `angsuran_injek` (
  `ID_injek` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal_injek` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `ID_invoice_injek` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `angsuran_lain`
--

CREATE TABLE `angsuran_lain` (
  `ID_angsuran_lain` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_angsuran` varchar(100) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `nominal_angsuran_lain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angsuran_lain`
--

INSERT INTO `angsuran_lain` (`ID_angsuran_lain`, `no_ktp`, `nama_angsuran`, `angsuranke`, `nominal_angsuran_lain`) VALUES
('AL001', '3273172510970001', 'can ayaan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `barang_pr`
--

CREATE TABLE `barang_pr` (
  `ID_barang_pr` varchar(10) NOT NULL,
  `ID_pr` varchar(10) NOT NULL,
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `lama_cicilan` int(11) NOT NULL,
  `ID_angsuran_barang_pr` varchar(10) NOT NULL,
  `waktu_tunggu` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `approve_oleh` varchar(200) NOT NULL,
  `tanggal_approve` date NOT NULL,
  `tanggal_pr` date NOT NULL,
  `ID_pm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_keuangan_project`
--

CREATE TABLE `catatan_keuangan_project` (
  `ID_catatan_keuangan_project` varchar(10) NOT NULL,
  `ID_project` varchar(10) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pekerjaan_sesuai_ktp` varchar(255) NOT NULL,
  `tempat_tanggal_lahir` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `jumlah_tanggungan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `status_rumah` varchar(50) NOT NULL,
  `lama_menetap` int(11) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `lama_bekerja` int(11) NOT NULL,
  `nama_tempat_bekerja` varchar(100) NOT NULL,
  `alamat_tempat_bekerja` text NOT NULL,
  `income_bulanan` int(11) NOT NULL,
  `income_bulanan_pasangan` int(11) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `nama_kontak_darurat` varchar(50) NOT NULL,
  `alamat_kontak_darurat` text NOT NULL,
  `nomor_kontak_darurat` varchar(20) NOT NULL,
  `status_pembangunan` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`no_ktp`, `nama`, `pekerjaan_sesuai_ktp`, `tempat_tanggal_lahir`, `status`, `jumlah_tanggungan`, `alamat`, `no_telepon`, `status_rumah`, `lama_menetap`, `pekerjaan`, `lama_bekerja`, `nama_tempat_bekerja`, `alamat_tempat_bekerja`, `income_bulanan`, `income_bulanan_pasangan`, `no_rekening`, `nama_kontak_darurat`, `alamat_kontak_darurat`, `nomor_kontak_darurat`, `status_pembangunan`) VALUES
('3273172510970001', 'octavian', '', '', '', 0, '', '', '', 0, '', 0, '', '', 0, 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_pelengkap`
--

CREATE TABLE `dokumen_pelengkap` (
  `no_ktp` varchar(20) NOT NULL,
  `fc_ktp` varchar(255) NOT NULL,
  `fc_kk` varchar(255) NOT NULL,
  `slip_gaji` varchar(255) NOT NULL,
  `laporan_keuangan_usaha` varchar(255) NOT NULL,
  `laporan_rekening` varchar(255) NOT NULL,
  `surat_persetujuan_suami_istri` varchar(255) NOT NULL,
  `surat_persetujuan_pembayaran_kredit` varchar(255) NOT NULL,
  `surat_rekomendasi` varchar(255) NOT NULL,
  `surat_perjanjian_agunan_barang` varchar(255) NOT NULL,
  `surat_perjanjian_penjaminan_personal` varchar(255) NOT NULL,
  `slip_gaji_penjamin_personal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fee_marketing`
--

CREATE TABLE `fee_marketing` (
  `ID_fee_marketing` varchar(10) NOT NULL,
  `persen` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `ID_angsuran_bulanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_ledger`
--

CREATE TABLE `general_ledger` (
  `nomor` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_angsuran_bulanan`
--

CREATE TABLE `invoice_angsuran_bulanan` (
  `ID_invoice_angsuran_bulanan` varchar(10) NOT NULL,
  `ID_angsuran_bulanan` varchar(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `type_pembayaran` varchar(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_dp`
--

CREATE TABLE `invoice_dp` (
  `ID_invoice_dp` varchar(10) NOT NULL,
  `ID_dp` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `type_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_injek`
--

CREATE TABLE `invoice_injek` (
  `ID_invoice_injek` varchar(10) NOT NULL,
  `ID_injek` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `type_pembayaran` varchar(10) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id_journal` varchar(10) NOT NULL,
  `nomor_gl` varchar(10) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_po`
--

CREATE TABLE `pembayaran_po` (
  `ID_pembayaran_po` varchar(10) NOT NULL,
  `ID_po` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `faktur` varchar(200) NOT NULL,
  `ID_finance` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `preorder`
--

CREATE TABLE `preorder` (
  `ID_po` varchar(10) NOT NULL,
  `ID_barang_pr` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `ID_purchasing` varchar(10) NOT NULL,
  `status` varchar(200) NOT NULL,
  `ID_pembayaran_po` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `ID_project` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `unit_kosong` int(11) NOT NULL,
  `unit_isi` int(11) NOT NULL,
  `ID_catatan_keuangan_project` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_request`
--

CREATE TABLE `purchasing_request` (
  `ID_pr` varchar(10) NOT NULL,
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `ID_barang_pr` varchar(10) NOT NULL,
  `tanggal_pr` date NOT NULL,
  `ID_pm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `ID_unit` varchar(10) NOT NULL,
  `ID_project` varchar(10) NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `type` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit_dipesan`
--

CREATE TABLE `unit_dipesan` (
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `no_ktp` varchar(2) NOT NULL,
  `DP` int(11) NOT NULL,
  `lama_angsuran_dp` int(11) NOT NULL,
  `angsuran_bulanan` int(11) NOT NULL,
  `lama_angsuran` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ID_marketing` varchar(10) NOT NULL,
  `ID_unit` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_keuangan`
--
ALTER TABLE `akun_keuangan`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `akun_marketing`
--
ALTER TABLE `akun_marketing`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `akun_project_manager`
--
ALTER TABLE `akun_project_manager`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `akun_purchasing`
--
ALTER TABLE `akun_purchasing`
  ADD PRIMARY KEY (`ktp`);

--
-- Indexes for table `angsuran_barang_pr`
--
ALTER TABLE `angsuran_barang_pr`
  ADD PRIMARY KEY (`ID_angsuran_bayar_pr`),
  ADD KEY `ID_barang_pr` (`ID_barang_pr`);

--
-- Indexes for table `angsuran_bulanan`
--
ALTER TABLE `angsuran_bulanan`
  ADD PRIMARY KEY (`ID_angsuran_bulanan`),
  ADD KEY `ID_invoice_angsuran_bulanan` (`ID_invoice_angsuran_bulanan`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `angsuran_dp`
--
ALTER TABLE `angsuran_dp`
  ADD PRIMARY KEY (`ID_dp`),
  ADD KEY `ID_invoice_dp` (`ID_invoice_dp`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `angsuran_injek`
--
ALTER TABLE `angsuran_injek`
  ADD PRIMARY KEY (`ID_injek`),
  ADD KEY `ID_invoice_injek` (`ID_invoice_injek`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `angsuran_lain`
--
ALTER TABLE `angsuran_lain`
  ADD PRIMARY KEY (`ID_angsuran_lain`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `barang_pr`
--
ALTER TABLE `barang_pr`
  ADD PRIMARY KEY (`ID_barang_pr`),
  ADD KEY `ID_angsuran_barang_pr` (`ID_angsuran_barang_pr`),
  ADD KEY `approve_oleh` (`approve_oleh`),
  ADD KEY `ID_pr` (`ID_pr`),
  ADD KEY `ID_pm` (`ID_pm`),
  ADD KEY `ID_unit_dipesan` (`ID_unit_dipesan`);

--
-- Indexes for table `catatan_keuangan_project`
--
ALTER TABLE `catatan_keuangan_project`
  ADD PRIMARY KEY (`ID_catatan_keuangan_project`),
  ADD KEY `ID_project` (`ID_project`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indexes for table `dokumen_pelengkap`
--
ALTER TABLE `dokumen_pelengkap`
  ADD PRIMARY KEY (`no_ktp`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indexes for table `fee_marketing`
--
ALTER TABLE `fee_marketing`
  ADD PRIMARY KEY (`ID_fee_marketing`),
  ADD KEY `ID_angsuran` (`ID_angsuran_bulanan`),
  ADD KEY `ID_unit_dipesan` (`ID_unit_dipesan`);

--
-- Indexes for table `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `invoice_angsuran_bulanan`
--
ALTER TABLE `invoice_angsuran_bulanan`
  ADD PRIMARY KEY (`ID_invoice_angsuran_bulanan`),
  ADD KEY `ID_angsuran_bulanan` (`ID_angsuran_bulanan`);

--
-- Indexes for table `invoice_dp`
--
ALTER TABLE `invoice_dp`
  ADD PRIMARY KEY (`ID_invoice_dp`),
  ADD KEY `ID_dp` (`ID_dp`);

--
-- Indexes for table `invoice_injek`
--
ALTER TABLE `invoice_injek`
  ADD PRIMARY KEY (`ID_invoice_injek`),
  ADD KEY `ID_injek` (`ID_injek`);

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id_journal`),
  ADD KEY `nomor_gl` (`nomor_gl`);

--
-- Indexes for table `pembayaran_po`
--
ALTER TABLE `pembayaran_po`
  ADD PRIMARY KEY (`ID_pembayaran_po`),
  ADD KEY `ID_po` (`ID_po`),
  ADD KEY `ID_finance` (`ID_finance`);

--
-- Indexes for table `preorder`
--
ALTER TABLE `preorder`
  ADD PRIMARY KEY (`ID_po`),
  ADD KEY `ID_purchasing` (`ID_purchasing`),
  ADD KEY `ID_pembayaran_po` (`ID_pembayaran_po`),
  ADD KEY `ID_barang_pr` (`ID_barang_pr`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID_project`),
  ADD KEY `ID_catatan_keuangan_project` (`ID_catatan_keuangan_project`);

--
-- Indexes for table `purchasing_request`
--
ALTER TABLE `purchasing_request`
  ADD PRIMARY KEY (`ID_pr`),
  ADD KEY `ID_barang_pr` (`ID_barang_pr`),
  ADD KEY `ID_pm` (`ID_pm`),
  ADD KEY `ID_unit_dipesan` (`ID_unit_dipesan`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`ID_unit`),
  ADD KEY `ID_project` (`ID_project`);

--
-- Indexes for table `unit_dipesan`
--
ALTER TABLE `unit_dipesan`
  ADD PRIMARY KEY (`ID_unit_dipesan`),
  ADD KEY `ID_unit` (`ID_unit`),
  ADD KEY `ID_marketing` (`ID_marketing`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `angsuran_bulanan`
--
ALTER TABLE `angsuran_bulanan`
  ADD CONSTRAINT `angsuran_bulanan_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `angsuran_dp`
--
ALTER TABLE `angsuran_dp`
  ADD CONSTRAINT `angsuran_dp_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `angsuran_injek`
--
ALTER TABLE `angsuran_injek`
  ADD CONSTRAINT `angsuran_injek_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `angsuran_lain`
--
ALTER TABLE `angsuran_lain`
  ADD CONSTRAINT `angsuran_lain_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_pr`
--
ALTER TABLE `barang_pr`
  ADD CONSTRAINT `barang_pr_ibfk_1` FOREIGN KEY (`ID_unit_dipesan`) REFERENCES `unit_dipesan` (`ID_unit_dipesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_keuangan_project`
--
ALTER TABLE `catatan_keuangan_project`
  ADD CONSTRAINT `catatan_keuangan_project_ibfk_1` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokumen_pelengkap`
--
ALTER TABLE `dokumen_pelengkap`
  ADD CONSTRAINT `dokumen_pelengkap_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fee_marketing`
--
ALTER TABLE `fee_marketing`
  ADD CONSTRAINT `fee_marketing_ibfk_2` FOREIGN KEY (`ID_unit_dipesan`) REFERENCES `unit_dipesan` (`ID_unit_dipesan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fee_marketing_ibfk_3` FOREIGN KEY (`ID_angsuran_bulanan`) REFERENCES `angsuran_bulanan` (`ID_angsuran_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_angsuran_bulanan`
--
ALTER TABLE `invoice_angsuran_bulanan`
  ADD CONSTRAINT `invoice_angsuran_bulanan_ibfk_1` FOREIGN KEY (`ID_angsuran_bulanan`) REFERENCES `angsuran_bulanan` (`ID_angsuran_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_angsuran_bulanan_ibfk_2` FOREIGN KEY (`ID_invoice_angsuran_bulanan`) REFERENCES `angsuran_bulanan` (`ID_invoice_angsuran_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_dp`
--
ALTER TABLE `invoice_dp`
  ADD CONSTRAINT `invoice_dp_ibfk_1` FOREIGN KEY (`ID_dp`) REFERENCES `angsuran_dp` (`ID_dp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_dp_ibfk_2` FOREIGN KEY (`ID_invoice_dp`) REFERENCES `angsuran_dp` (`ID_invoice_dp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `invoice_injek`
--
ALTER TABLE `invoice_injek`
  ADD CONSTRAINT `invoice_injek_ibfk_1` FOREIGN KEY (`ID_injek`) REFERENCES `angsuran_injek` (`ID_injek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_injek_ibfk_2` FOREIGN KEY (`ID_invoice_injek`) REFERENCES `angsuran_injek` (`ID_invoice_injek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_1` FOREIGN KEY (`id_journal`) REFERENCES `general_ledger` (`nomor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran_po`
--
ALTER TABLE `pembayaran_po`
  ADD CONSTRAINT `pembayaran_po_ibfk_1` FOREIGN KEY (`ID_po`) REFERENCES `preorder` (`ID_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `preorder`
--
ALTER TABLE `preorder`
  ADD CONSTRAINT `preorder_ibfk_2` FOREIGN KEY (`ID_barang_pr`) REFERENCES `barang_pr` (`ID_barang_pr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_dipesan`
--
ALTER TABLE `unit_dipesan`
  ADD CONSTRAINT `unit_dipesan_ibfk_1` FOREIGN KEY (`ID_unit`) REFERENCES `unit` (`ID_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_dipesan_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
