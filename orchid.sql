-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2020 pada 04.06
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.4

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
-- Struktur dari tabel `akun_keuangan`
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
-- Dumping data untuk tabel `akun_keuangan`
--

INSERT INTO `akun_keuangan` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_keuangan', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_marketing`
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
-- Dumping data untuk tabel `akun_marketing`
--

INSERT INTO `akun_marketing` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_marketing', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '085923192389');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_project_manager`
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
-- Dumping data untuk tabel `akun_project_manager`
--

INSERT INTO `akun_project_manager` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('admin_pm', 'Octavian', 'teuing', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun_purchasing`
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
-- Dumping data untuk tabel `akun_purchasing`
--

INSERT INTO `akun_purchasing` (`ktp`, `nama`, `alamat`, `password`, `status`, `no_tlp`) VALUES
('123', '123', '123', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, NULL),
('admin_purchasing', 'Octavian', 'bebas', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_barang_pr`
--

CREATE TABLE `angsuran_barang_pr` (
  `ID_angsuran_barang_pr` varchar(10) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `sisa_pembayaran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_barang_pr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_bulanan`
--

CREATE TABLE `angsuran_bulanan` (
  `ID_angsuran_bulanan` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `date` date NOT NULL,
  `nominal_angsuran_bulanan` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_invoice_angsuran_bulanan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran_bulanan`
--

INSERT INTO `angsuran_bulanan` (`ID_angsuran_bulanan`, `no_ktp`, `angsuran_ke`, `tanggal`, `bulan`, `tahun`, `date`, `nominal_angsuran_bulanan`, `sisa_angsuran`, `status`, `ID_invoice_angsuran_bulanan`) VALUES
('AB0001', '3273172510970002', 1, 29, 6, 2020, '2020-06-29', 5833000, 64167000, 0, 'IAB0001'),
('AB0002', '3273172510970002', 2, 29, 7, 2020, '2020-07-29', 5833000, 58334000, 0, 'IAB0002'),
('AB0003', '3273172510970002', 3, 29, 8, 2020, '2020-08-29', 5833000, 52501000, 0, 'IAB0003'),
('AB0004', '3273172510970002', 4, 29, 9, 2020, '2020-09-29', 5833000, 46668000, 0, 'IAB0004'),
('AB0005', '3273172510970002', 5, 29, 10, 2020, '2020-10-29', 5833000, 40835000, 0, 'IAB0005'),
('AB0006', '3273172510970002', 6, 29, 11, 2020, '2020-11-29', 5833000, 35002000, 0, 'IAB0006'),
('AB0007', '3273172510970002', 7, 29, 12, 2020, '2020-12-29', 5833000, 29169000, 0, 'IAB0007'),
('AB0008', '3273172510970002', 8, 29, 1, 2021, '2021-01-29', 5833000, 23336000, 0, 'IAB0008'),
('AB0009', '3273172510970002', 9, 29, 2, 2021, '0000-00-00', 5833000, 17503000, 0, 'IAB0009'),
('AB0010', '3273172510970002', 10, 29, 3, 2021, '2021-03-29', 5833000, 11670000, 0, 'IAB0010'),
('AB0011', '3273172510970002', 11, 29, 4, 2021, '2021-04-29', 5833000, 5837000, 0, 'IAB0011'),
('AB0012', '3273172510970002', 12, 29, 5, 2021, '2021-05-29', 5837000, 0, 0, 'IAB0012');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_dp`
--

CREATE TABLE `angsuran_dp` (
  `ID_dp` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `date` date NOT NULL,
  `nominal_angsuran_dp` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_invoice_dp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran_dp`
--

INSERT INTO `angsuran_dp` (`ID_dp`, `no_ktp`, `angsuran_ke`, `tanggal`, `bulan`, `tahun`, `date`, `nominal_angsuran_dp`, `sisa_angsuran`, `status`, `ID_invoice_dp`) VALUES
('ADP0001', '3273172510970002', 1, 29, 6, 2020, '2020-06-29', 10000000, 20000000, 0, 'IDP0001'),
('ADP0002', '3273172510970002', 2, 29, 7, 2020, '2020-07-29', 10000000, 10000000, 0, 'IDP0002'),
('ADP0003', '3273172510970002', 3, 29, 8, 2020, '2020-08-29', 10000000, 0, 0, 'IDP0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_injek`
--

CREATE TABLE `angsuran_injek` (
  `ID_injek` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `date` date NOT NULL,
  `nominal_injek` int(11) NOT NULL,
  `sisa_angsuran` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `ID_invoice_injek` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran_injek`
--

INSERT INTO `angsuran_injek` (`ID_injek`, `no_ktp`, `angsuran_ke`, `tanggal`, `bulan`, `tahun`, `date`, `nominal_injek`, `sisa_angsuran`, `status`, `ID_invoice_injek`) VALUES
('AIJ0001', '3273172510970002', 1, 29, 8, 2021, '2021-08-29', 5000000, 5000000, 0, 'IIJ0001'),
('AIJ0002', '3273172510970002', 2, 29, 8, 2022, '2022-08-29', 5000000, 0, 0, 'IIJ0002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran_lain`
--

CREATE TABLE `angsuran_lain` (
  `ID_angsuran_lain` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_angsuran` varchar(100) NOT NULL,
  `angsuranke` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nominal_angsuran_lain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `angsuran_lain`
--

INSERT INTO `angsuran_lain` (`ID_angsuran_lain`, `no_ktp`, `nama_angsuran`, `angsuranke`, `jumlah`, `nominal_angsuran_lain`) VALUES
('er5I6d', '3273172510970003', 'Mobil', 11, 36, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_pr`
--

CREATE TABLE `barang_pr` (
  `ID_pr` varchar(10) NOT NULL,
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `nama_barang` varchar(200) NOT NULL,
  `harga_barang` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `total_harga` varchar(10) NOT NULL,
  `nama_supplier` varchar(200) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `lama_cicilan` varchar(10) NOT NULL,
  `waktu_tunggu` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tanggal_pr` date NOT NULL,
  `ID_pm` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang_pr`
--

INSERT INTO `barang_pr` (`ID_pr`, `ID_unit_dipesan`, `nama_barang`, `harga_barang`, `jumlah`, `total_harga`, `nama_supplier`, `jenis_pembayaran`, `lama_cicilan`, `waktu_tunggu`, `status`, `tanggal_pr`, `ID_pm`) VALUES
('PR0001', 'UD0001', 'Genteng Baja', '5000', '50', '250000', 'Genteng ID', 'cash', '0', '5 hari', '1', '2020-05-21', 'admin_pm'),
('PR0002', 'UD0001', 'BESI', '5000', '5', '25000', 'SUroto', 'cash', '0', '5 hari', '1', '2020-05-26', 'admin_pm'),
('PR0003', 'UD0001', 'Paku', '500', '100', '50000', 'Paku ID', 'cash', '0', '2 hari', '1', '0000-00-00', 'admin_pm'),
('PR0004', 'UD0001', 'Papan', '10000', '50', '500000', 'Papan ID', 'cash', '0', '5 hari', '1', '0000-00-00', 'admin_pm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
  `status_akad` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`no_ktp`, `nama`, `pekerjaan_sesuai_ktp`, `tempat_tanggal_lahir`, `status`, `jumlah_tanggungan`, `alamat`, `no_telepon`, `status_rumah`, `lama_menetap`, `pekerjaan`, `lama_bekerja`, `nama_tempat_bekerja`, `alamat_tempat_bekerja`, `income_bulanan`, `income_bulanan_pasangan`, `no_rekening`, `nama_kontak_darurat`, `alamat_kontak_darurat`, `nomor_kontak_darurat`, `status_akad`) VALUES
('3273172510970001', 'Octavian', 'Seniman', 'Bandung, 25 Oktober 1997', 'LAJANG', 0, 'JL.Kebon lega 1 rt.02 rw.02', '085923192389', 'Bersama orang Tua', 23, 'Seniman', 5, 'Wijaya Musik Entertaiment', 'Jalan Mananya ? ', 5000000, 0, '8100672571', 'Karwati', 'Kebon Lega 1', '083822584289', 0),
('3273172510970002', 'Customer2', 'Tidak Ada', 'Bandung, 25 Oktober 1997', 'Lajang', 0, 'Kebon LEga 1', '085923192389', 'Tinggal Bersama Orang Tua', 23, 'Tidak Ada', 2, 'Tidak Ada', 'Tidak Ada', 5000000, 5000000, '555555', '555555', 'Tidak Ada', '555555', 1),
('3273172510970003', 'octavian', '22', 'bandung', 'none', 0, 'none', '0', 'none', 2, '22', 22, '22', '22', 22, 22, '22', '22', '22', '22', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_pelengkap`
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

--
-- Dumping data untuk tabel `dokumen_pelengkap`
--

INSERT INTO `dokumen_pelengkap` (`no_ktp`, `fc_ktp`, `fc_kk`, `slip_gaji`, `laporan_keuangan_usaha`, `laporan_rekening`, `surat_persetujuan_suami_istri`, `surat_persetujuan_pembayaran_kredit`, `surat_rekomendasi`, `surat_perjanjian_agunan_barang`, `surat_perjanjian_penjaminan_personal`, `slip_gaji_penjamin_personal`) VALUES
('3273172510970001', '1587887872s.png', '1587887872c.png', '1587887872r.png', '1587887872e.png', '1587887872e1.png', '1587887872n.png', '1587887872c1.png', '1587887872a.png', '1587887872p.png', '1587887872t.png', '1587887872u.png'),
('3273172510970002', '1588655758g.jpg', '1588655758r.jpg', '1588655758e.jpg', '1588655758e1.jpg', '1588655758n.jpg', '1588655758-.jpg', '1588655758c.jpg', '1588655758a.jpg', '1588655758c1.jpg', '1588655758t.jpg', '1588655758u.jpg'),
('3273172510970003', '1590567417c.png', '1590567417o.png', '1590567417d.png', '1590567417e.png', '1590567417.png', '1590567417p.png', '1590567417n.png', '1590567417g.png', '1590567417.png', '15905674171.png', '15905674172.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_ledger`
--

CREATE TABLE `general_ledger` (
  `nomor` varchar(5) NOT NULL,
  `nama` varchar(46) DEFAULT NULL,
  `nominal` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `general_ledger`
--

INSERT INTO `general_ledger` (`nomor`, `nama`, `nominal`) VALUES
('1', 'Kas kecil', '1000'),
('10', 'Hutang Konsiyasi', '0'),
('11', 'Hutang Leverensir', '0'),
('11a', 'Uang Muka Penjualan', '0'),
('12', 'Share Holder loan', '0'),
('12a', 'Share Holder loan Adi Dharma', '0'),
('12b', 'Share Holder loan johanes', '0'),
('12c', 'Share Holder loan Ririn', '0'),
('13', 'Modal disetor', '1000'),
('13a', 'Modal Adi', '1000'),
('13b', 'Mohammad Arief', '1000'),
('13c', 'Samsunar', '1000'),
('13d', 'Adi Dharma', '1000'),
('14', 'Penjualan', '5000'),
('15', 'Biaya pokok penjualan', '1000'),
('16', 'Biaya Operasional Kantor', '0'),
('16a', 'Tagihan listrik, Air, Telp, mobil, Belanja ATK', '0'),
('16b', 'Petty Cash', '0'),
('16c', 'Medical Karyawan', '0'),
('17', 'Biaya Promosi/Marketing', '0'),
('18', 'Biaya sewa kantor', '0'),
('19', 'Marketing Fee', '0'),
('2', 'Bank', '50000'),
('20', 'Biaya listrik', '5000'),
('21', 'Biaya kurir', '5000'),
('22', 'Biaya Gaji', '1000'),
('23', 'Biaya Perijinan', '0'),
('23a', 'Biaya Pembuatan PT', '0'),
('23b', 'Rekomendasi Kel/Kecamatan/RW/RT', '0'),
('23c', 'Ijin Pemanfaatan tanah (IPT)', '0'),
('23d', 'Rekom Gubernur', '0'),
('23e', 'Blok Plan', '0'),
('23f', 'Kompensasi Lingkungan', '0'),
('23g', 'Biaya Notaris', '0'),
('23h', 'Biaya PBB Lahan', '0'),
('24', 'Biaya Tukang', '0'),
('25', 'Biaya Sewa Mobil', '0'),
('26', 'Biaya Bensin,toll dan parkir', '0'),
('27', 'Biaya Pajak', '5000'),
('28', 'Biaya Admin Bank', '0'),
('29', 'Pendapatan Bunga', '0'),
('3', 'Piutang Usaha', '0'),
('30', 'Entertainment', '0'),
('31', 'Biaya Donasi dan sumbangan', '0'),
('32', 'Biaya Pematangan Lahan', '0'),
('32a', 'Infrastruktur', '0'),
('32a1', 'Pembersihan lahan', '0'),
('32a10', 'Pengerjaan DPT', '0'),
('32a11', 'Pengerasan dan Pembuatan jalan', '0'),
('32a12', 'Pembuatan instalasi PLN', '0'),
('32a13', 'Pembuatan Jembatan', '0'),
('32a14', 'Pemasangan Paving Block', '0'),
('32a2', 'Cut & Fill (Pembentukan badan jalan & kavling)', '0'),
('32a3', 'Gerbang Masuk/Pos Jaga', '0'),
('32a4', 'Merk Perumahan', '0'),
('32a5', 'Pagar Beton Keliling', '0'),
('32a6', 'Pekerjaan Saluran Air Kotor', '0'),
('32a7', 'Pembuatan taman', '0'),
('32a8', 'Pemasangan Kansteen', '0'),
('32a9', 'Resapan Komunal', '0'),
('32b', 'Utilitas Penerangan Umum', '0'),
('32c', 'Fasos/Fasum', '0'),
('32c1', 'Sarana Ibadah (Mushola)', '0'),
('32c2', 'Play Ground', '0'),
('32c3', 'Kompensasi Tanah Makam', '0'),
('32c4', 'Pembuatan Direksi Kit & Gudang', '0'),
('32d', 'Pemeliharaan dan Pembinaan Lingkungan', '0'),
('32d1', 'Pembinaan Lingkungan (Polsek, Preman)', '0'),
('32d2', 'Petugas Kebersihan Sampah', '0'),
('32d3', 'Petugas Keamanan', '0'),
('33', 'Biaya Pembangunan', '0'),
('35', 'Biaya Pembebanan Per Unit', '0'),
('35a', 'Biaya Sambung PDAM', '0'),
('35b', 'Biaya Sambung Listrik (PLN/rumah)', '0'),
('35c', 'Biaya Sambung Air Bersih (Pompa listrik)', '0'),
('35d', 'Biaya Splitsing Sertipikat', '0'),
('35e', 'Biaya IMB (incl. Retribusinya)', '0'),
('35f', 'Biaya Maintenance (sebelum STB)', '0'),
('35g', 'Biaya Pembuatan Taman Halaman Depan', '0'),
('35h', 'Pagar pembatas kavling', '0'),
('35i', 'Peningkatan hak AJB ke SHM', '0'),
('4', 'Piutang Usaha kredit rumah', '0'),
('4a', 'Piutang Karyawan', '0'),
('5', 'Uang Muka Pembelian', '0'),
('6', 'Persediaan', '0'),
('6a', 'Barang jadi', '0'),
('6b', 'Pekerjaan dalam progress', '0'),
('7', 'Tanah dan Bangunan', '0'),
('8', 'Inventaris Kantor', '0'),
('9', 'Hutang Usaha', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_ledger_dagovillagegarden`
--

CREATE TABLE `general_ledger_dagovillagegarden` (
  `nomor` varchar(5) NOT NULL,
  `nama` varchar(46) DEFAULT NULL,
  `nominal` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `general_ledger_dagovillagegarden`
--

INSERT INTO `general_ledger_dagovillagegarden` (`nomor`, `nama`, `nominal`) VALUES
('1', 'Kas kecil', '0'),
('10', 'Hutang Konsiyasi', '0'),
('11', 'Hutang Leverensir', '0'),
('11a', 'Uang Muka Penjualan', '0'),
('12', 'Share Holder loan', '0'),
('12a', 'Share Holder loan Adi Dharma', '0'),
('12b', 'Share Holder loan johanes', '0'),
('12c', 'Share Holder loan Ririn', '0'),
('13', 'Modal disetor', '0'),
('13a', 'Modal Adi', '0'),
('13b', 'Mohammad Arief', '0'),
('13c', 'Samsunar', '0'),
('13d', 'Adi Dharma', '0'),
('14', 'Penjualan', '0'),
('15', 'Biaya pokok penjualan', '0'),
('16', 'Biaya Operasional Kantor', '0'),
('16a', 'Tagihan listrik, Air, Telp, mobil, Belanja ATK', '0'),
('16b', 'Petty Cash', '0'),
('16c', 'Medical Karyawan', '0'),
('17', 'Biaya Promosi/Marketing', '0'),
('18', 'Biaya sewa kantor', '0'),
('19', 'Marketing Fee', '0'),
('2', 'Bank', '0'),
('20', 'Biaya listrik', '0'),
('21', 'Biaya kurir', '0'),
('22', 'Biaya Gaji', '0'),
('23', 'Biaya Perijinan', '0'),
('23a', 'Biaya Pembuatan PT', '0'),
('23b', 'Rekomendasi Kel/Kecamatan/RW/RT', '0'),
('23c', 'Ijin Pemanfaatan tanah (IPT)', '0'),
('23d', 'Rekom Gubernur', '0'),
('23e', 'Blok Plan', '0'),
('23f', 'Kompensasi Lingkungan', '0'),
('23g', 'Biaya Notaris', '0'),
('23h', 'Biaya PBB Lahan', '0'),
('24', 'Biaya Tukang', '0'),
('25', 'Biaya Sewa Mobil', '0'),
('26', 'Biaya Bensin,toll dan parkir', '0'),
('27', 'Biaya Pajak', '0'),
('28', 'Biaya Admin Bank', '0'),
('29', 'Pendapatan Bunga', '0'),
('3', 'Piutang Usaha', '0'),
('30', 'Entertainment', '0'),
('31', 'Biaya Donasi dan sumbangan', '0'),
('32', 'Biaya Pematangan Lahan', '0'),
('32a', 'Infrastruktur', '0'),
('32a1', 'Pembersihan lahan', '0'),
('32a10', 'Pengerjaan DPT', '0'),
('32a11', 'Pengerasan dan Pembuatan jalan', '0'),
('32a12', 'Pembuatan instalasi PLN', '0'),
('32a13', 'Pembuatan Jembatan', '0'),
('32a14', 'Pemasangan Paving Block', '0'),
('32a2', 'Cut & Fill (Pembentukan badan jalan & kavling)', '0'),
('32a3', 'Gerbang Masuk/Pos Jaga', '0'),
('32a4', 'Merk Perumahan', '0'),
('32a5', 'Pagar Beton Keliling', '0'),
('32a6', 'Pekerjaan Saluran Air Kotor', '0'),
('32a7', 'Pembuatan taman', '0'),
('32a8', 'Pemasangan Kansteen', '0'),
('32a9', 'Resapan Komunal', '0'),
('32b', 'Utilitas Penerangan Umum', '0'),
('32c', 'Fasos/Fasum', '0'),
('32c1', 'Sarana Ibadah (Mushola)', '0'),
('32c2', 'Play Ground', '0'),
('32c3', 'Kompensasi Tanah Makam', '0'),
('32c4', 'Pembuatan Direksi Kit & Gudang', '0'),
('32d', 'Pemeliharaan dan Pembinaan Lingkungan', '0'),
('32d1', 'Pembinaan Lingkungan (Polsek, Preman)', '0'),
('32d2', 'Petugas Kebersihan Sampah', '0'),
('32d3', 'Petugas Keamanan', '0'),
('33', 'Biaya Pembangunan', '0'),
('35', 'Biaya Pembebanan Per Unit', '0'),
('35a', 'Biaya Sambung PDAM', '0'),
('35b', 'Biaya Sambung Listrik (PLN/rumah)', '0'),
('35c', 'Biaya Sambung Air Bersih (Pompa listrik)', '0'),
('35d', 'Biaya Splitsing Sertipikat', '0'),
('35e', 'Biaya IMB (incl. Retribusinya)', '0'),
('35f', 'Biaya Maintenance (sebelum STB)', '0'),
('35g', 'Biaya Pembuatan Taman Halaman Depan', '0'),
('35h', 'Pagar pembatas kavling', '0'),
('35i', 'Peningkatan hak AJB ke SHM', '0'),
('4', 'Piutang Usaha kredit rumah', '0'),
('4a', 'Piutang Karyawan', '0'),
('5', 'Uang Muka Pembelian', '0'),
('6', 'Persediaan', '0'),
('6a', 'Barang jadi', '0'),
('6b', 'Pekerjaan dalam progress', '0'),
('7', 'Tanah dan Bangunan', '0'),
('8', 'Inventaris Kantor', '0'),
('9', 'Hutang Usaha', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_ledger_muara`
--

CREATE TABLE `general_ledger_muara` (
  `nomor` varchar(5) NOT NULL,
  `nama` varchar(46) DEFAULT NULL,
  `nominal` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `general_ledger_muara`
--

INSERT INTO `general_ledger_muara` (`nomor`, `nama`, `nominal`) VALUES
('1', 'Kas kecil', '1000'),
('10', 'Hutang Konsiyasi', '0'),
('11', 'Hutang Leverensir', '0'),
('11a', 'Uang Muka Penjualan', '0'),
('12', 'Share Holder loan', '0'),
('12a', 'Share Holder loan Adi Dharma', '0'),
('12b', 'Share Holder loan johanes', '0'),
('12c', 'Share Holder loan Ririn', '0'),
('13', 'Modal disetor', '1000'),
('13a', 'Modal Adi', '53000'),
('13b', 'Mohammad Arief', '1000'),
('13c', 'Samsunar', '1000'),
('13d', 'Adi Dharma', '1000'),
('14', 'Penjualan', '5000'),
('15', 'Biaya pokok penjualan', '1000'),
('16', 'Biaya Operasional Kantor', '0'),
('16a', 'Tagihan listrik, Air, Telp, mobil, Belanja ATK', '0'),
('16b', 'Petty Cash', '0'),
('16c', 'Medical Karyawan', '0'),
('17', 'Biaya Promosi/Marketing', '0'),
('18', 'Biaya sewa kantor', '0'),
('19', 'Marketing Fee', '0'),
('2', 'Bank', '86000'),
('20', 'Biaya listrik', '16000'),
('21', 'Biaya kurir', '5000'),
('22', 'Biaya Gaji', '1000'),
('23', 'Biaya Perijinan', '0'),
('23a', 'Biaya Pembuatan PT', '0'),
('23b', 'Rekomendasi Kel/Kecamatan/RW/RT', '0'),
('23c', 'Ijin Pemanfaatan tanah (IPT)', '0'),
('23d', 'Rekom Gubernur', '0'),
('23e', 'Blok Plan', '0'),
('23f', 'Kompensasi Lingkungan', '0'),
('23g', 'Biaya Notaris', '0'),
('23h', 'Biaya PBB Lahan', '0'),
('24', 'Biaya Tukang', '0'),
('25', 'Biaya Sewa Mobil', '0'),
('26', 'Biaya Bensin,toll dan parkir', '0'),
('27', 'Biaya Pajak', '5000'),
('28', 'Biaya Admin Bank', '0'),
('29', 'Pendapatan Bunga', '0'),
('3', 'Piutang Usaha', '0'),
('30', 'Entertainment', '0'),
('31', 'Biaya Donasi dan sumbangan', '0'),
('32', 'Biaya Pematangan Lahan', '0'),
('32a', 'Infrastruktur', '0'),
('32a1', 'Pembersihan lahan', '0'),
('32a10', 'Pengerjaan DPT', '0'),
('32a11', 'Pengerasan dan Pembuatan jalan', '0'),
('32a12', 'Pembuatan instalasi PLN', '0'),
('32a13', 'Pembuatan Jembatan', '0'),
('32a14', 'Pemasangan Paving Block', '0'),
('32a2', 'Cut & Fill (Pembentukan badan jalan & kavling)', '0'),
('32a3', 'Gerbang Masuk/Pos Jaga', '0'),
('32a4', 'Merk Perumahan', '0'),
('32a5', 'Pagar Beton Keliling', '0'),
('32a6', 'Pekerjaan Saluran Air Kotor', '0'),
('32a7', 'Pembuatan taman', '0'),
('32a8', 'Pemasangan Kansteen', '0'),
('32a9', 'Resapan Komunal', '0'),
('32b', 'Utilitas Penerangan Umum', '0'),
('32c', 'Fasos/Fasum', '0'),
('32c1', 'Sarana Ibadah (Mushola)', '0'),
('32c2', 'Play Ground', '0'),
('32c3', 'Kompensasi Tanah Makam', '0'),
('32c4', 'Pembuatan Direksi Kit & Gudang', '0'),
('32d', 'Pemeliharaan dan Pembinaan Lingkungan', '0'),
('32d1', 'Pembinaan Lingkungan (Polsek, Preman)', '0'),
('32d2', 'Petugas Kebersihan Sampah', '0'),
('32d3', 'Petugas Keamanan', '0'),
('33', 'Biaya Pembangunan', '0'),
('35', 'Biaya Pembebanan Per Unit', '0'),
('35a', 'Biaya Sambung PDAM', '0'),
('35b', 'Biaya Sambung Listrik (PLN/rumah)', '0'),
('35c', 'Biaya Sambung Air Bersih (Pompa listrik)', '0'),
('35d', 'Biaya Splitsing Sertipikat', '0'),
('35e', 'Biaya IMB (incl. Retribusinya)', '0'),
('35f', 'Biaya Maintenance (sebelum STB)', '0'),
('35g', 'Biaya Pembuatan Taman Halaman Depan', '0'),
('35h', 'Pagar pembatas kavling', '0'),
('35i', 'Peningkatan hak AJB ke SHM', '0'),
('4', 'Piutang Usaha kredit rumah', '0'),
('4a', 'Piutang Karyawan', '0'),
('5', 'Uang Muka Pembelian', '0'),
('6', 'Persediaan', '0'),
('6a', 'Barang jadi', '0'),
('6b', 'Pekerjaan dalam progress', '0'),
('7', 'Tanah dan Bangunan', '0'),
('8', 'Inventaris Kantor', '0'),
('9', 'Hutang Usaha', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `general_ledger_singgasana`
--

CREATE TABLE `general_ledger_singgasana` (
  `nomor` varchar(5) NOT NULL,
  `nama` varchar(46) DEFAULT NULL,
  `nominal` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `general_ledger_singgasana`
--

INSERT INTO `general_ledger_singgasana` (`nomor`, `nama`, `nominal`) VALUES
('1', 'Kas kecil', '0'),
('10', 'Hutang Konsiyasi', '0'),
('11', 'Hutang Leverensir', '0'),
('11a', 'Uang Muka Penjualan', '0'),
('12', 'Share Holder loan', '0'),
('12a', 'Share Holder loan Adi Dharma', '0'),
('12b', 'Share Holder loan johanes', '0'),
('12c', 'Share Holder loan Ririn', '0'),
('13', 'Modal disetor', '0'),
('13a', 'Modal Adi', '0'),
('13b', 'Mohammad Arief', '0'),
('13c', 'Samsunar', '0'),
('13d', 'Adi Dharma', '0'),
('14', 'Penjualan', '0'),
('15', 'Biaya pokok penjualan', '0'),
('16', 'Biaya Operasional Kantor', '0'),
('16a', 'Tagihan listrik, Air, Telp, mobil, Belanja ATK', '0'),
('16b', 'Petty Cash', '0'),
('16c', 'Medical Karyawan', '0'),
('17', 'Biaya Promosi/Marketing', '0'),
('18', 'Biaya sewa kantor', '0'),
('19', 'Marketing Fee', '0'),
('2', 'Bank', '0'),
('20', 'Biaya listrik', '0'),
('21', 'Biaya kurir', '0'),
('22', 'Biaya Gaji', '0'),
('23', 'Biaya Perijinan', '0'),
('23a', 'Biaya Pembuatan PT', '0'),
('23b', 'Rekomendasi Kel/Kecamatan/RW/RT', '0'),
('23c', 'Ijin Pemanfaatan tanah (IPT)', '0'),
('23d', 'Rekom Gubernur', '0'),
('23e', 'Blok Plan', '0'),
('23f', 'Kompensasi Lingkungan', '0'),
('23g', 'Biaya Notaris', '0'),
('23h', 'Biaya PBB Lahan', '0'),
('24', 'Biaya Tukang', '0'),
('25', 'Biaya Sewa Mobil', '0'),
('26', 'Biaya Bensin,toll dan parkir', '0'),
('27', 'Biaya Pajak', '0'),
('28', 'Biaya Admin Bank', '0'),
('29', 'Pendapatan Bunga', '0'),
('3', 'Piutang Usaha', '0'),
('30', 'Entertainment', '0'),
('31', 'Biaya Donasi dan sumbangan', '0'),
('32', 'Biaya Pematangan Lahan', '0'),
('32a', 'Infrastruktur', '0'),
('32a1', 'Pembersihan lahan', '0'),
('32a10', 'Pengerjaan DPT', '0'),
('32a11', 'Pengerasan dan Pembuatan jalan', '0'),
('32a12', 'Pembuatan instalasi PLN', '0'),
('32a13', 'Pembuatan Jembatan', '0'),
('32a14', 'Pemasangan Paving Block', '0'),
('32a2', 'Cut & Fill (Pembentukan badan jalan & kavling)', '0'),
('32a3', 'Gerbang Masuk/Pos Jaga', '0'),
('32a4', 'Merk Perumahan', '0'),
('32a5', 'Pagar Beton Keliling', '0'),
('32a6', 'Pekerjaan Saluran Air Kotor', '0'),
('32a7', 'Pembuatan taman', '0'),
('32a8', 'Pemasangan Kansteen', '0'),
('32a9', 'Resapan Komunal', '0'),
('32b', 'Utilitas Penerangan Umum', '0'),
('32c', 'Fasos/Fasum', '0'),
('32c1', 'Sarana Ibadah (Mushola)', '0'),
('32c2', 'Play Ground', '0'),
('32c3', 'Kompensasi Tanah Makam', '0'),
('32c4', 'Pembuatan Direksi Kit & Gudang', '0'),
('32d', 'Pemeliharaan dan Pembinaan Lingkungan', '0'),
('32d1', 'Pembinaan Lingkungan (Polsek, Preman)', '0'),
('32d2', 'Petugas Kebersihan Sampah', '0'),
('32d3', 'Petugas Keamanan', '0'),
('33', 'Biaya Pembangunan', '0'),
('35', 'Biaya Pembebanan Per Unit', '0'),
('35a', 'Biaya Sambung PDAM', '0'),
('35b', 'Biaya Sambung Listrik (PLN/rumah)', '0'),
('35c', 'Biaya Sambung Air Bersih (Pompa listrik)', '0'),
('35d', 'Biaya Splitsing Sertipikat', '0'),
('35e', 'Biaya IMB (incl. Retribusinya)', '0'),
('35f', 'Biaya Maintenance (sebelum STB)', '0'),
('35g', 'Biaya Pembuatan Taman Halaman Depan', '0'),
('35h', 'Pagar pembatas kavling', '0'),
('35i', 'Peningkatan hak AJB ke SHM', '0'),
('4', 'Piutang Usaha kredit rumah', '0'),
('4a', 'Piutang Karyawan', '0'),
('5', 'Uang Muka Pembelian', '0'),
('6', 'Persediaan', '0'),
('6a', 'Barang jadi', '0'),
('6b', 'Pekerjaan dalam progress', '0'),
('7', 'Tanah dan Bangunan', '0'),
('8', 'Inventaris Kantor', '0'),
('9', 'Hutang Usaha', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_angsuran_bulanan`
--

CREATE TABLE `invoice_angsuran_bulanan` (
  `ID_invoice_angsuran_bulanan` varchar(10) NOT NULL,
  `ID_angsuran_bulanan` varchar(10) NOT NULL,
  `tanggal_pembayaran` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `ID_admin` varchar(10) NOT NULL,
  `type_pembayaran` varchar(50) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_dp`
--

CREATE TABLE `invoice_dp` (
  `ID_invoice_dp` varchar(10) NOT NULL,
  `ID_dp` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `ID_admin` varchar(10) NOT NULL,
  `type_pembayaran` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `invoice_injek`
--

CREATE TABLE `invoice_injek` (
  `ID_invoice_injek` varchar(10) NOT NULL,
  `ID_injek` varchar(10) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `nominal` int(11) NOT NULL,
  `ID_admin` varchar(10) NOT NULL,
  `type_pembayaran` varchar(10) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `nomor_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `journal`
--

CREATE TABLE `journal` (
  `id_journal` varchar(10) NOT NULL,
  `nomor_gl` varchar(10) NOT NULL,
  `nama_gl` varchar(100) NOT NULL,
  `debit` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal_input` varchar(100) NOT NULL,
  `ID_project` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `journal`
--

INSERT INTO `journal` (`id_journal`, `nomor_gl`, `nama_gl`, `debit`, `kredit`, `keterangan`, `tanggal_input`, `ID_project`) VALUES
('IJN0001', '2', 'Bank', 5000, 0, 'asd', '27/04/2020', 'PJ0001'),
('IJN0002', '13a', 'Modal Adi', 0, 5000, 'asd', '27/04/2020', 'PJ0001'),
('IJN0003', '2', 'Bank', 6000, 0, '', '27/04/2020', 'PJ0001'),
('IJN0004', '13a', 'Modal Adi', 0, 6000, '', '27/04/2020', 'PJ0001'),
('IJN0005', '4a', 'Piutang Karyawan', 5000, 0, '', '27/04/2020', 'PJ0001'),
('IJN0006', '2', 'Bank', 0, 5000, '', '27/04/2020', 'PJ0001'),
('IJN0007', '32a1', 'Pembersihan lahan', 0, 0, 'Lahan Kosong di garut selatan', '15/05/2020', 'PJ0001'),
('IJN0008', '2', 'Bank', 0, 0, 'Lahan Kosong di garut selatan', '15/05/2020', 'PJ0001'),
('IJN0009', '2', 'Bank', 1000, 0, '', '15/05/2020', 'PJ0001'),
('IJN0010', '13a', 'Modal Adi', 0, 1000, '', '15/05/2020', 'PJ0001'),
('IJN0011', '20', 'Biaya listrik', 1000, 0, 'bayar listrik', '15/05/2020', 'PJ0001'),
('IJN0012', '2', 'Bank', 0, 1000, 'bayar listrik', '15/05/2020', 'PJ0001'),
('IJN0013', '2', 'Bank', 1000, 0, '', '15/05/2020', 'PJ0001'),
('IJN0014', '13a', 'Modal Adi', 0, 1000, '', '15/05/2020', 'PJ0001'),
('IJN0015', '2', 'Bank', 50000, 0, '', '15/05/2020', 'PJ0001'),
('IJN0016', '13a', 'Modal Adi', 0, 50000, '', '15/05/2020', 'PJ0001'),
('IJN0017', '20', 'Biaya listrik', 10000, 0, '', '15/05/2020', 'PJ0001'),
('IJN0018', '2', 'Bank', 0, 10000, '', '15/05/2020', 'PJ0001'),
('IJN0019', '8', 'Inventaris Kantor', 5000, 0, 'Buku', '26/05/2020', 'PJ0001'),
('IJN0020', '2', 'Bank', 0, 5000, 'Buku', '26/05/2020', 'PJ0001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `marketing_fee`
--

CREATE TABLE `marketing_fee` (
  `ID_marketing_fee` varchar(10) NOT NULL,
  `ID_unit_dipesan` varchar(16) NOT NULL,
  `agen` varchar(50) NOT NULL,
  `inhouse` varchar(50) NOT NULL,
  `persenan` varchar(50) NOT NULL,
  `nominal_marketing_fee` varchar(50) NOT NULL,
  `nominal_closing_fee` varchar(50) NOT NULL,
  `direktur_fee` varchar(50) NOT NULL,
  `total_fee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_po`
--

CREATE TABLE `pembayaran_po` (
  `ID_pembayaran_po` varchar(10) NOT NULL,
  `ID_po` varchar(10) NOT NULL,
  `nominal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `faktur` varchar(200) NOT NULL,
  `ID_keuangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `po`
--

CREATE TABLE `po` (
  `ID_po` varchar(10) NOT NULL,
  `ID_barang_pr` varchar(10) NOT NULL,
  `ID_purchasing` varchar(16) NOT NULL,
  `tanggal_approve` varchar(100) NOT NULL,
  `dibayar` varchar(100) NOT NULL,
  `bukti_bayar` varchar(100) NOT NULL,
  `ID_keuangan` varchar(100) NOT NULL,
  `status_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `po`
--

INSERT INTO `po` (`ID_po`, `ID_barang_pr`, `ID_purchasing`, `tanggal_approve`, `dibayar`, `bukti_bayar`, `ID_keuangan`, `status_barang`) VALUES
('PO0001', 'PR0001', 'admin_purchasing', '21-05-2020', 'dibayar', 'cfa0e27d60ba580097e386b7e9570f47.png', 'admin_keuangan', 'Approved'),
('PO0002', 'PR0002', 'admin_purchasing', '21-05-2020', 'dibayar', '8b6470ccb7e04865d2b5212a0467dad0.png', 'admin_keuangan', 'Approved'),
('PO0003', 'PR0003', 'admin_purchasing', '27-05-2020', 'menunggu', '', 'admin_keuangan', 'Approved'),
('PO0004', 'PR0004', 'admin_purchasing', '27-05-2020', 'menunggu', '', 'admin_keuangan', 'Approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
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
  `nama_gl` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`ID_project`, `nama`, `alamat`, `deskripsi`, `foto`, `jumlah_unit`, `unit_kosong`, `unit_isi`, `nama_gl`) VALUES
('PJ0001', 'Muara', 'Jalan Peta No.205, Kota bandung ,  Jawa barat', 'Tempat dekat dengan pusat kota,10 menit dari pintu tol moch tohha', '667d62b08280496d149ed0c5a62b3c67.jpg', 100, 100, 0, 'general_ledger_muara'),
('PJ0002', 'Singgasana', 'Jalan Mekar Wangi abadi', 'Rumah Nyaman', '5db31501b68811102b2b087f830711f9.jpg', 100, 100, 0, 'general_ledger_singgasana'),
('PJ0003', 'Dago Village Garden', 'Dago Atas', 'Tempat Nyaman', '1ebf556a7db670944754f898c89296fa.png', 100, 96, 4, 'general_ledger_dagovillagegarden');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit`
--

CREATE TABLE `unit` (
  `ID_unit` varchar(10) NOT NULL,
  `ID_project` varchar(10) NOT NULL,
  `nomor` varchar(5) NOT NULL,
  `type` int(11) NOT NULL,
  `luas_bangunan` int(11) NOT NULL,
  `luas_tanah` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit`
--

INSERT INTO `unit` (`ID_unit`, `ID_project`, `nomor`, `type`, `luas_bangunan`, `luas_tanah`, `status`) VALUES
('UN0001', 'PJ0003', 'A', 36, 1000, 1000, 1),
('UN0002', 'PJ0003', 'B1', 36, 2000, 2000, 1),
('UN0003', 'PJ0003', 'B2', 36, 2000, 2000, 1),
('UN0004', 'PJ0003', 'B3', 36, 2000, 2000, 1),
('UN0005', 'PJ0003', 'B4', 36, 2000, 2000, 0),
('UN0006', 'PJ0003', 'B5', 36, 2000, 2000, 0),
('UN0007', 'PJ0003', 'B6', 36, 2000, 2000, 0),
('UN0008', 'PJ0003', 'B7', 36, 2000, 2000, 0),
('UN0009', 'PJ0003', 'B8', 36, 2000, 2000, 0),
('UN0010', 'PJ0003', 'B9', 36, 2000, 2000, 0),
('UN0011', 'PJ0003', 'B10', 36, 2000, 2000, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_dipesan`
--

CREATE TABLE `unit_dipesan` (
  `ID_unit_dipesan` varchar(10) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `DP` int(11) NOT NULL,
  `lama_angsuran_dp` int(11) NOT NULL,
  `angsuran_bulanan` int(11) NOT NULL,
  `lama_angsuran` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `ktp_marketing` varchar(16) NOT NULL,
  `ID_unit` varchar(10) NOT NULL,
  `ID_project` varchar(10) NOT NULL,
  `tanggal_akad` varchar(60) NOT NULL,
  `status_marketing_fee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `unit_dipesan`
--

INSERT INTO `unit_dipesan` (`ID_unit_dipesan`, `no_ktp`, `DP`, `lama_angsuran_dp`, `angsuran_bulanan`, `lama_angsuran`, `total_harga`, `ktp_marketing`, `ID_unit`, `ID_project`, `tanggal_akad`, `status_marketing_fee`) VALUES
('UD0001', '3273172510970001', 30000000, 6, 5375000, 12, 110000000, 'admin_marketing', 'UN0002', 'PJ0003', '19/05/2020', 'MENUNGGU'),
('UD0002', '3273172510970003', 30000000, 3, 5833000, 12, 110000000, 'admin_marketing', 'UN0001', 'PJ0003', '29/05/2020', 'MENUNGGU'),
('UD0003', '3273172510970002', 30000000, 3, 5833000, 12, 110000000, 'admin_marketing', 'UN0003', 'PJ0003', '29/05/2020', 'MENUNGGU'),
('UD0004', '3273172510970002', 30000000, 3, 5833000, 12, 110000000, 'admin_marketing', 'UN0004', 'PJ0003', '29/05/2020', 'MENUNGGU');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `ID_voucher` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nominal` varchar(50) NOT NULL,
  `expired` varchar(50) NOT NULL,
  `max_used` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`ID_voucher`, `nama`, `nominal`, `expired`, `max_used`) VALUES
('VC0001', 'Diskon Gila', '50', '2020-05-30', '10'),
('VC0002', 'Diskon Ramadha', '5', '2020-05-16', '10'),
('VC0003', 'Diskon Lebaran', '10', '2020-05-30', '10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun_keuangan`
--
ALTER TABLE `akun_keuangan`
  ADD PRIMARY KEY (`ktp`);

--
-- Indeks untuk tabel `akun_marketing`
--
ALTER TABLE `akun_marketing`
  ADD PRIMARY KEY (`ktp`);

--
-- Indeks untuk tabel `akun_project_manager`
--
ALTER TABLE `akun_project_manager`
  ADD PRIMARY KEY (`ktp`);

--
-- Indeks untuk tabel `akun_purchasing`
--
ALTER TABLE `akun_purchasing`
  ADD PRIMARY KEY (`ktp`),
  ADD KEY `ktp` (`ktp`);

--
-- Indeks untuk tabel `angsuran_barang_pr`
--
ALTER TABLE `angsuran_barang_pr`
  ADD PRIMARY KEY (`ID_angsuran_barang_pr`),
  ADD KEY `ID_barang_pr` (`ID_barang_pr`);

--
-- Indeks untuk tabel `angsuran_bulanan`
--
ALTER TABLE `angsuran_bulanan`
  ADD PRIMARY KEY (`ID_angsuran_bulanan`),
  ADD KEY `ID_invoice_angsuran_bulanan` (`ID_invoice_angsuran_bulanan`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `angsuran_dp`
--
ALTER TABLE `angsuran_dp`
  ADD PRIMARY KEY (`ID_dp`),
  ADD KEY `ID_invoice_dp` (`ID_invoice_dp`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `angsuran_injek`
--
ALTER TABLE `angsuran_injek`
  ADD PRIMARY KEY (`ID_injek`),
  ADD KEY `ID_invoice_injek` (`ID_invoice_injek`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `angsuran_lain`
--
ALTER TABLE `angsuran_lain`
  ADD PRIMARY KEY (`ID_angsuran_lain`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `barang_pr`
--
ALTER TABLE `barang_pr`
  ADD PRIMARY KEY (`ID_pr`),
  ADD KEY `ID_pr` (`ID_pr`),
  ADD KEY `ID_pm` (`ID_pm`),
  ADD KEY `ID_unit_dipesan` (`ID_unit_dipesan`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `dokumen_pelengkap`
--
ALTER TABLE `dokumen_pelengkap`
  ADD PRIMARY KEY (`no_ktp`),
  ADD KEY `no_ktp` (`no_ktp`);

--
-- Indeks untuk tabel `general_ledger`
--
ALTER TABLE `general_ledger`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `general_ledger_dagovillagegarden`
--
ALTER TABLE `general_ledger_dagovillagegarden`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `general_ledger_muara`
--
ALTER TABLE `general_ledger_muara`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `general_ledger_singgasana`
--
ALTER TABLE `general_ledger_singgasana`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `invoice_angsuran_bulanan`
--
ALTER TABLE `invoice_angsuran_bulanan`
  ADD PRIMARY KEY (`ID_invoice_angsuran_bulanan`),
  ADD KEY `ID_angsuran_bulanan` (`ID_angsuran_bulanan`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- Indeks untuk tabel `invoice_dp`
--
ALTER TABLE `invoice_dp`
  ADD PRIMARY KEY (`ID_invoice_dp`),
  ADD KEY `ID_dp` (`ID_dp`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- Indeks untuk tabel `invoice_injek`
--
ALTER TABLE `invoice_injek`
  ADD PRIMARY KEY (`ID_invoice_injek`),
  ADD KEY `ID_injek` (`ID_injek`),
  ADD KEY `ID_admin` (`ID_admin`);

--
-- Indeks untuk tabel `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id_journal`),
  ADD KEY `nomor_gl` (`nomor_gl`),
  ADD KEY `ID_project` (`ID_project`);

--
-- Indeks untuk tabel `marketing_fee`
--
ALTER TABLE `marketing_fee`
  ADD PRIMARY KEY (`ID_marketing_fee`),
  ADD KEY `ID_unit_dipesan` (`ID_unit_dipesan`);

--
-- Indeks untuk tabel `pembayaran_po`
--
ALTER TABLE `pembayaran_po`
  ADD PRIMARY KEY (`ID_pembayaran_po`),
  ADD KEY `ID_po` (`ID_po`),
  ADD KEY `ID_finance` (`ID_keuangan`);

--
-- Indeks untuk tabel `po`
--
ALTER TABLE `po`
  ADD PRIMARY KEY (`ID_po`),
  ADD KEY `ID_barang_pr` (`ID_barang_pr`),
  ADD KEY `ID_purchasing` (`ID_purchasing`);

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`ID_project`);

--
-- Indeks untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`ID_unit`),
  ADD KEY `ID_project` (`ID_project`);

--
-- Indeks untuk tabel `unit_dipesan`
--
ALTER TABLE `unit_dipesan`
  ADD PRIMARY KEY (`ID_unit_dipesan`),
  ADD KEY `ID_unit` (`ID_unit`),
  ADD KEY `no_ktp` (`no_ktp`),
  ADD KEY `ID_project` (`ID_project`),
  ADD KEY `ktp_marketing` (`ktp_marketing`);

--
-- Indeks untuk tabel `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID_voucher`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `angsuran_bulanan`
--
ALTER TABLE `angsuran_bulanan`
  ADD CONSTRAINT `angsuran_bulanan_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angsuran_dp`
--
ALTER TABLE `angsuran_dp`
  ADD CONSTRAINT `angsuran_dp_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angsuran_injek`
--
ALTER TABLE `angsuran_injek`
  ADD CONSTRAINT `angsuran_injek_ibfk_2` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `angsuran_lain`
--
ALTER TABLE `angsuran_lain`
  ADD CONSTRAINT `angsuran_lain_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang_pr`
--
ALTER TABLE `barang_pr`
  ADD CONSTRAINT `barang_pr_ibfk_1` FOREIGN KEY (`ID_unit_dipesan`) REFERENCES `unit_dipesan` (`ID_unit_dipesan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_pr_ibfk_2` FOREIGN KEY (`ID_pm`) REFERENCES `akun_project_manager` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dokumen_pelengkap`
--
ALTER TABLE `dokumen_pelengkap`
  ADD CONSTRAINT `dokumen_pelengkap_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoice_angsuran_bulanan`
--
ALTER TABLE `invoice_angsuran_bulanan`
  ADD CONSTRAINT `invoice_angsuran_bulanan_ibfk_1` FOREIGN KEY (`ID_angsuran_bulanan`) REFERENCES `angsuran_bulanan` (`ID_angsuran_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_angsuran_bulanan_ibfk_2` FOREIGN KEY (`ID_invoice_angsuran_bulanan`) REFERENCES `angsuran_bulanan` (`ID_invoice_angsuran_bulanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoice_dp`
--
ALTER TABLE `invoice_dp`
  ADD CONSTRAINT `invoice_dp_ibfk_1` FOREIGN KEY (`ID_dp`) REFERENCES `angsuran_dp` (`ID_dp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_dp_ibfk_2` FOREIGN KEY (`ID_invoice_dp`) REFERENCES `angsuran_dp` (`ID_invoice_dp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `invoice_injek`
--
ALTER TABLE `invoice_injek`
  ADD CONSTRAINT `invoice_injek_ibfk_1` FOREIGN KEY (`ID_injek`) REFERENCES `angsuran_injek` (`ID_injek`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_injek_ibfk_2` FOREIGN KEY (`ID_invoice_injek`) REFERENCES `angsuran_injek` (`ID_invoice_injek`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `journal`
--
ALTER TABLE `journal`
  ADD CONSTRAINT `journal_ibfk_2` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `marketing_fee`
--
ALTER TABLE `marketing_fee`
  ADD CONSTRAINT `marketing_fee_ibfk_1` FOREIGN KEY (`ID_unit_dipesan`) REFERENCES `unit_dipesan` (`ID_unit_dipesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_po`
--
ALTER TABLE `pembayaran_po`
  ADD CONSTRAINT `pembayaran_po_ibfk_1` FOREIGN KEY (`ID_po`) REFERENCES `preorder` (`ID_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `po`
--
ALTER TABLE `po`
  ADD CONSTRAINT `po_ibfk_1` FOREIGN KEY (`ID_purchasing`) REFERENCES `akun_purchasing` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `po_ibfk_2` FOREIGN KEY (`ID_barang_pr`) REFERENCES `barang_pr` (`ID_pr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `unit`
--
ALTER TABLE `unit`
  ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`ID_project`) REFERENCES `project` (`ID_project`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `unit_dipesan`
--
ALTER TABLE `unit_dipesan`
  ADD CONSTRAINT `unit_dipesan_ibfk_1` FOREIGN KEY (`no_ktp`) REFERENCES `customer` (`no_ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_dipesan_ibfk_2` FOREIGN KEY (`ID_unit`) REFERENCES `unit` (`ID_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_dipesan_ibfk_3` FOREIGN KEY (`ktp_marketing`) REFERENCES `akun_marketing` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
