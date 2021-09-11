-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2020 pada 10.24
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `nomor_emoney` varchar(50) DEFAULT NULL,
  `pemilik_emoney` varchar(100) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `nomor_emoney`, `pemilik_emoney`, `tanggal_post`, `tanggal_update`) VALUES
(24, 6, 'Asep Saepuloh', 'aseps@yahoo.com', '081324461456', 'Bojong', '080920205ZCAL4YG', '2020-09-08 00:00:00', 380000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-08 20:55:50', '2020-09-08 18:55:50'),
(25, 6, 'Asep Saepuloh', 'aseps@yahoo.com', '081324461456', 'Bojong', '08092020X19AYQNQ', '2020-09-08 00:00:00', 68000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-08 21:11:12', '2020-09-08 19:11:12'),
(26, 6, 'Asep Saepuloh', 'aseps@yahoo.com', '081324461456', 'Bojong', '230920206QEOLXCP', '2020-09-23 00:00:00', 166000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-23 13:12:10', '2020-09-23 11:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'rak', 'Rak', 1, '2019-07-31 00:26:44'),
(2, 'jam-dinding', 'Jam Dinding', 2, '2019-07-31 00:27:53'),
(3, 'nomor-rumah', 'Nomor Rumah', 3, '2019-07-31 00:28:12'),
(5, 'rak-display', 'Rak Display', 5, '2019-07-31 00:31:39'),
(6, 'organizer', 'Organizer', 6, '2020-08-21 21:17:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `qrcode`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'The Everest Project Store', 'Memperindah Tampilan Rumah Anda', 'theeverestproject@gmail.com', 'http://theeverestproject.com', 'PRODUSEN NOMOR RUMAH MURAH', '', '+6281327461388', 'Jalan Pramuka no. 56, Giwangan, Yogyakarta', ' ', 'https://instagram.com/theeverestprojectnew', 'Produsen Nomor Rumah dan Aksesoris untuk memperindah tampilan rumah anda', 'everest.jpg', 'icon.PNG', 'frame4.png', '', '2020-08-19 07:19:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 'Aktif', 'Aden Sutisna', 'adensutisna@gmail.com', 'e5a42e3032651e42060fa2cfcb05a72833f2ec0f', '087666555444', 'Depok, Sleman', '2019-07-27 03:10:34', '2020-09-03 13:35:36'),
(2, 'Aktif', 'Febri Hariono', 'febrih@gmail.com', '6983fb423c4a4342d16170206afc05b1ae67412c', '081324461389', 'Nogosari', '2019-07-27 03:49:55', '2020-09-03 13:35:36'),
(3, 'Aktif', 'Deden Natsir', 'deden1@gmail.com', '2db19371f071ea1a3420828d0dcb0e6a9a3250de', '087666555678', 'Bandung', '2019-07-27 04:19:20', '2020-09-03 13:35:36'),
(4, 'Aktif', 'Ujang', 'ujangkasep@gmail.com', 'e6efe9b46c9f82ecdac25f8a52c07d864af07e57', '081324461388', 'Garut', '2019-07-28 17:43:31', '2020-09-03 13:35:36'),
(5, 'Aktif', 'Acep', 'acep11@gmail.com', '0f87b85b0e2f6ac84eaf05951f54804e57dc6501', '087666555321', 'Jln. Veteran, Umbulharjo', '2020-09-03 16:50:03', '2020-09-03 14:50:03'),
(6, 'Aktif', 'Asep Saepuloh', 'aseps@yahoo.com', '706bcb48a6a2eb09bd6715ee90c423f4a0779148', '081324461456', 'Bojong', '2019-07-28 21:23:38', '2020-09-03 13:35:36'),
(7, 'Aktif', 'Dani', 'dani123@gmail.com', 'c88f97bbebbf34c9f610ce5e712c560dd8d7b672', '089777656555', 'Umbulharjo', '2020-09-03 16:48:56', '2020-09-03 14:48:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(11, 4, 3, 'NR002', 'Nomor Rumah Akrilik Kotak Pos', 'nomor-rumah-akrilik-kotak-pos-nr002', '<p>NOMOR RUMAH AKRILIK MURAH 30 x 20 BENTUK KOTAK POS<br />\r\nNomor rumah yg sangat elegant, di desain khusus untuk menambah ke elegant an rumah anda<br />\r\nBahan:<br />\r\n* layer belakang akrilik warna tebal 2mm (warna bebas)<br />\r\n* layer depan/ font akrilik warna tebal 2mm (warna bebas)<br />\r\n* pemasangan menggunakan baut/ ditempel menggunakan isolasi 3m<br />\r\n* ukuran 30cm x 20cm</p>\r\n', 'Nomor Rumah', 50000, 100, '10.PNG', 1000, '30 x 20 cm', 'Publish', '2019-03-18 05:00:33', '2019-07-31 00:36:11'),
(12, 4, 3, 'NR001', 'Nomor Rumah Akrilik', 'nomor-rumah-akrilik-nr001', '<p>NOMOR RUMAH AKRILIK MURAH 30 x 20 BENTUK RUMAH KOTAK<br />\r\nNomor rumah yg sangat elegant, di desain khusus untuk menambah ke elegant an rumah anda<br />\r\nBahan:<br />\r\n* layer belakang akrilik warna tebal 2mm (warna bebas)<br />\r\n* layer depan/ font akrilik warna tebal 2mm (warna bebas)<br />\r\n* pemasangan menggunakan baut/ ditempel menggunakan isolasi 3m<br />\r\n* ukuran 30cm x 20cm</p>\r\n', 'Nomor Rumah', 50000, 100, '91.PNG', 1000, '30 x 20 cm', 'Publish', '2019-03-18 05:01:34', '2019-07-31 00:33:22'),
(13, 4, 2, 'JAM004', 'Jam Dinding LOGO MARVEL BLACK', 'jam-dinding-logo-marvel-black-jam004', '<p>&nbsp;</p>\r\n\r\n<p>JAM DINDING LOGO MARVEL BLACK<br />\r\nby everest project<br />\r\n<br />\r\nBAHAN&nbsp;<br />\r\nAkrilik Tebal 3mm<br />\r\n<br />\r\nWarna<br />\r\nHitam (Bisa custom Warna Lain)</p>\r\n', 'Jam Dinding', 320000, 50, '8.PNG', 1000, '20 x 20 cm', 'Publish', '2019-03-18 05:03:01', '2019-07-30 23:44:28'),
(14, 4, 2, 'JAM003', 'Jam Dinding Brick Lego', 'jam-dinding-brick-lego-jam003', '<p>JAM Dinding Brick Lego by everest project<br />\r\n<br />\r\nBAHAN&nbsp;<br />\r\nAkrilik Tebal 3mm<br />\r\n<br />\r\nWarna<br />\r\nBewarna (Bisa custom Warna Lain)</p>\r\n', 'Jam Dinding', 305000, 50, '7.PNG', 1000, '20 x 20 cm', 'Publish', '2019-03-18 05:04:09', '2019-07-30 23:41:24'),
(15, 4, 2, 'JAM002', 'Jam Dinding Mobile Legend', 'jam-dinding-mobile-legend-jam002', '<p>Jam dinding raksasa mickey head exclusive by everest project<br />\r\nHarga : 160.000<br />\r\nUkuran : 30x30cm<br />\r\nWarna, bentuk, ukuran bisa custom sesuka hati</p>\r\n', 'Jam Dinding', 160000, 50, '6.PNG', 500, '30 x 30 cm', 'Publish', '2019-03-18 05:05:28', '2019-07-30 23:30:57'),
(16, 4, 2, 'JAM001', 'Jam Dinding Avengers', 'jam-dinding-avengers-jam001', '<p>Jam dinding raksasa dentist exclusive by everest project<br />\r\nHarga : 160.000<br />\r\nUkuran : 30x30cm<br />\r\nWarna, bentuk, ukuran bisa custom sesuka hati</p>\r\n', 'Jam DInding', 160000, 50, '5.PNG', 500, '30 x 30 cm', 'Publish', '2019-03-18 05:07:03', '2019-07-30 23:29:22'),
(17, 4, 1, 'KS01', 'Rak Lanscape Coklat', 'rak-lanscape-coklat-ks01', '<p>LANDSCAPE COKLAT ISI 100<br />\r\nwarna list : Coklat,merah, biru, hitam, dan putih<br />\r\nwarna background : putih susu, hitam, bening<br />\r\n<br />\r\nsudah termasuk packing, belum termasuk ongkir<br />\r\n<br />\r\nspesifikasi :<br />\r\n* bahan akrilik tebal 2mm<br />\r\n* dimensi produk : 90,6 x 6,2 x 40,6 cm<br />\r\n* dimensi packaging : 94,6 x 10,2 x44,6cm<br />\r\n* berat packaging : 8,300 gr<br />\r\n* Ada Lubang untuk penggantung didinding dibagian logo atas (tidak tampak dari depan)<br />\r\n* Jumlah LOT : 10 Baris x 10 Kolom = 100 unit<br />\r\n* Ukuran Total Rack : 90,6 x 6,2 x 40,6<br />\r\n* Ukuran Setiap Kotak :9 cm x 4 cm x 4cm * Pintul Sleeding Mirip Etalase<br />\r\n* Produk ini sudah siap pakai</p>\r\n', 'Rak', 599000, 50, '41.PNG', 8, ' 90,6 x 6,2 x 40,6 cm', 'Publish', '2019-03-18 05:09:48', '2019-07-31 00:33:11'),
(18, 4, 1, 'RAK003', 'Rak LOL', 'rak-lol-rak003', '<p>Lemper Paling Wenak SeduRak LOL warna list : merah, biru, hitam, dan putih<br />\r\nwarna background : putih susu, hitam, bening<br />\r\n<br />\r\nsudah termasuk packing, belum termasuk ongkir<br />\r\n<br />\r\nspesifikasi :<br />\r\n* bahan akrilik tebal 2mm<br />\r\n* dimensi produk : 48 x 7,7x 64 cm<br />\r\n* dimensi packaging :36 x 25 x 10,5cm<br />\r\n* berat packaging : 5.300gram<br />\r\n* Ada Lubang untuk penggantung didinding dibagian logo atas (tidak tampak dari depan)<br />\r\n* Jumlah LOT :5 Baris x 6 Kolom = 30unit<br />\r\n* Ukuran Total Rack :48 x 7,5 x 64 cm<br />\r\n* Ukuran Setiap Kotak :7 x 5 x 11 cm<br />\r\n* Pintul Sleeding Mirip Etalase<br />\r\n* Produk ini sudah siap pakai</p>\r\n', 'Rak', 365000, 50, '3.PNG', 5300, '48 x 7,5 x 64 cm', 'Publish', '2019-03-18 05:10:40', '2019-07-31 00:33:04'),
(19, 4, 1, 'RAK002', 'Rak Tomica Exclusive', 'rak-tomica-exclusive-rak002', '<p>&nbsp;</p>\r\n\r\n<p>Tomica exclusive by everest project<br />\r\nwarna list : merah, biru, hitam, dan putih<br />\r\nwarna background : putih susu, hitam, bening<br />\r\n<br />\r\nsudah termasuk packing, belum termasuk ongkir<br />\r\n<br />\r\nSpesifikasi :<br />\r\n* bahan akrilik tebal 2mm<br />\r\n* dimensi produk : 48 x 7,7x 64 cm<br />\r\n* dimensi packaging :36 x 25 x 10,5cm<br />\r\n* berat packaging : 5.300gram<br />\r\n* Ada Lubang untuk penggantung didinding dibagian logo atas (tidak tampak dari depan)<br />\r\n* Jumlah LOT :5 Baris x 6 Kolom = 30unit<br />\r\n* Ukuran Total Rack :48 x 7,5 x 64 cm<br />\r\n* Ukuran Setiap Kotak :7 x 5 x 11 cm<br />\r\n* Pintul Sleeding Mirip Etalase<br />\r\n* Produk ini sudah siap pakai<br />\r\nPastikan Dahulu Ukuran Sebelum Order,<br />\r\n<br />\r\nProses menggunakan potongan laser sehingga presisi dan rapih.</p>\r\n', 'Rak', 495000, 50, '2.PNG', 5300, '48 x 7,5 x 64 cm', 'Publish', '2019-03-18 05:12:18', '2019-07-31 00:32:56'),
(22, 4, 5, 'RD001', 'Rak Display Hotwheels', 'rak-display-hotwheels-rd001', '<p>Rak Display Hotwheels 1:64<br />\r\nIsi 12 Lot</p>\r\n', 'Rak Display', 190000, 15, '12.PNG', 1000, '-', 'Publish', '2019-07-31 02:45:40', '2019-07-31 00:45:40'),
(29, 4, 2, 'jam1', 'Jam Dinding Be Positive', 'jam-dinding-be-positive-jam1', '<p>Jam Dinding Be Positive</p>\r\n\r\n<p>spesifikasi :<br />\r\n* bahan akrilik tebal 3mm<br />\r\n* dimensi produk 30x30cm<br />\r\n* dimensi packaging 35x35x5cm<br />\r\n* berat packaging 850gram<br />\r\n* mesin quartz swipe movement (tidak berisik)<br />\r\n* jarum custom<br />\r\n* kardus packing khusus untuk jam jadi tidak rusak<br />\r\n* bonus baterei AA 1pcs<br />\r\n* bonus bracket pemasangan ditembok<br />\r\n* bonus paku 2pcs</p>\r\n', 'Jam Dinding', 150000, 30, 'Jam_Be_Positive.PNG', 850, '30 x 30 cm', 'Publish', '2019-08-21 17:16:12', '2020-08-17 19:56:39'),
(30, 4, 2, 'jam12', 'Jam Dinding Uniqorn', 'jam-dinding-uniqorn-jam12', '<p>Jam Dinding Uniqorn</p>\r\n\r\n<p>spesifikasi :<br />\r\n* bahan akrilik tebal 3mm<br />\r\n* dimensi produk 30x30cm<br />\r\n* dimensi packaging 35x35x5cm<br />\r\n* berat packaging 850gram<br />\r\n* mesin quartz swipe movement (tidak berisik)<br />\r\n* jarum custom * kardus packing khusus untuk jam jadi tidak rusak<br />\r\n* bonus baterei AA 1pcs<br />\r\n* bonus bracket pemasangan ditembok<br />\r\n* bonus paku 2pcs</p>\r\n', 'Jam Dinding', 150000, 30, 'Jam_Uniqorn.PNG', 850, '30 x 30 cm', 'Publish', '2019-08-21 17:21:47', '2020-08-17 19:58:04'),
(32, 4, 1, 'rak32', 'Rak HotWheels Biru', 'rak-hotwheels-biru-rak32', '<p><strong>Rak HotWheels </strong></p>\r\n\r\n<p>Tersedia dalam beberapa warna</p>\r\n\r\n<p>biru, merah, kuning, hijau dan hitam</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p>No matter how fast you are, no one outruns their past</p>\r\n\r\n<p>---Dominic Toretto---</p>\r\n</blockquote>\r\n', 'Rak HotWheels', 200000, 10, 'Rak_Hotwheels_Biru.PNG', 1500, '60 x 60 cm', 'Publish', '2020-08-17 22:08:53', '2020-09-22 14:15:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(1, 'BANK BRI', '88293384883448', 'EVEREST PROJCT', NULL, '2019-08-13 17:50:41'),
(2, 'Bank BCA', '83410832048888912', 'ANDIKA KARULIAWAN', NULL, '2019-08-13 17:50:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(46, 6, '080920205ZCAL4YG', 32, 200000, 1, 200000, '2020-09-08 00:00:00', '2020-09-08 18:55:50'),
(47, 6, '080920205ZCAL4YG', 30, 150000, 1, 150000, '2020-09-08 00:00:00', '2020-09-08 18:55:50'),
(48, 6, '08092020X19AYQNQ', 11, 50000, 1, 50000, '2020-09-08 00:00:00', '2020-09-08 19:11:12'),
(49, 6, '230920206QEOLXCP', 30, 150000, 1, 150000, '2020-09-23 00:00:00', '2020-09-23 11:12:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'Adipati Dokmek', 'dokmek123@gmail.com', 'adokmek', '1a454c3db7d58fe24c63cce162104d0e86cfbd80', 'Admin', '2020-08-21 20:24:02'),
(2, 'Anggara', 'moch123@gmail.com', 'anggara123', '8cb2237d0679ca88db6464eac60da96345513964', 'Admin', '2019-07-23 13:27:37'),
(4, 'Moch Nova', 'moch1234@gmail.com', 'moch123', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', '2019-07-23 13:27:52'),
(5, 'Dokmek', 'adipatidokmek@gmail.com', 'dokmek', '9b20ef8e69f6561b72618bebfb3f4b11774958dc', 'Admin', '2020-08-21 19:31:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
