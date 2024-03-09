-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2024 at 08:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aipos_phone`
--

-- --------------------------------------------------------

--
-- Table structure for table `aipos_blog`
--

CREATE TABLE IF NOT EXISTS `aipos_blog` (
`id` int(11) NOT NULL,
  `tgl_upload` varchar(30) DEFAULT NULL,
  `tgl_blog` varchar(30) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `isi` text,
  `ket` varchar(200) DEFAULT NULL,
  `baca` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `vote_rating` int(11) NOT NULL,
  `share` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_blog`
--

INSERT INTO `aipos_blog` (`id`, `tgl_upload`, `tgl_blog`, `judul`, `isi`, `ket`, `baca`, `rating`, `vote_rating`, `share`) VALUES
(1, '14-03-2018 10:45:01', '01-03-2018 7:00:00', 'Selamat datang di AIPOS', '<p><span>Selamat datang di AIPOS.<o></o></span></p><p><span><br bogus="1"></span></p><p><span>Alhamdulillah puji syukur kehadirat Allah SWTÃ‚Â  telah melipahkan segenap rahmat-Nya sehigga kami dari Dieng Cyber dapat menyelesaikan aplikasi kasir, cafÃƒÂ© dan toko online AIPOSÃ‚Â </span><span>sejak 2017 lalu hingga mulai hari ini berada di tangan Anda.</span></p><p><span>Terimakasih kami haturkan atas kepercayaan Anda kepada produk kami, semoga layanan kami dapat memberikan kemudahan bagi usaha Anda.AIPOS dibangun dengan arsitektur client server berbasis cloud namun dapat di operasionalkan secara offline tanpa adanya internet.</span></p><p><span>Jangan lupa untuk segera mengaktifkan akun Anda supaya layanan informasi melalui email dapat diterima dengan baik.</span></p><p><span>Kunjungi menu panduan AIPOS melalui menu Panduan. Panduan berupa video di youtube ataupun panduan tertulis yang dapat Anda cetak.</span></p><p><span>Jika Anda masih mendapatkan kesulitan jangan sungkan untuk langsung melakukan kontak kepada kami baik melalui media social facebook ataupun whatsapp yang telah kami cantumkan.</span></p><p><span>AIPOS Retail Restaurant With E-Commerce ini masih dalam fase pengembangan berkelanjutan terima kasih atas masukan dan saran Anda.<o></o></span></p><p><span><br bogus="1"></span></p><p><span>Salam AIPOS<o></o></span></p><p><span><br bogus="1"></span></p><p><span><br bogus="1"></span></p><p><span><br bogus="1"></span></p>', '', 4, 0, 0, 0),
(2, '14-03-2018 10:58:53', '01-03-2018 7:10:00', 'Catatan Keuangan (Menu Baru)', '<p><br></p><p><span>Mengingat kebutuhan akan pencatatan keuangan pengganti buku yang lebih praktis, kami mengembangkan catatan keuangan digital yang telah terintegrasi dalam sistem AIPOS. Menu catatan keuangan ini dapat dilakukan terpisah meski Anda tidak menggunakan fungsi AIPOS, contohnya bagi Anda yang ingin menuliskan pemasukan dan pengeluaran harian lalu melihat kembali laporan pemasukan pengeluaran anda baik tiap hari, minggu, bulan, tahun atau periode yang Anda inginkan. Berikut menu tersebut :</span></p><p><span><img src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-53-54-764-com.diengcyber.aipos.png" alt="" width="260" height="462" src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-53-54-764-com.diengcyber.aipos.png" style="display: block; margin-left: auto; margin-right: auto;"></span></p><p><span><br bogus="1"></span></p><p><br></p><p><span>Menu Pemasukan dan Pengeluaran Kas :Ã‚Â <o></o></span></p><p><span><img src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-05-276-com.diengcyber.aipos.png" width="260" height="462" caption="false" src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-05-276-com.diengcyber.aipos.png" style="display: block; margin-left: auto; margin-right: auto;"><br><img src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-27-143-com.diengcyber.aipos.png" width="259" height="462" caption="false" src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-27-143-com.diengcyber.aipos.png" style="display: block; margin-left: auto; margin-right: auto;">Ã‚Â Ã‚Â </span></p><p><span><br bogus="1"></span></p><p><span>Menu Laporan Arus Kas :Ã‚Â </span></p><p><span><img src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-50-677-com.diengcyber.aipos.png" alt="" width="260" height="462" src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-54-50-677-com.diengcyber.aipos.png" style="display: block; margin-left: auto; margin-right: auto;"></span></p><p><span><img src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-55-22-156-com.diengcyber.aipos.png" alt="" width="260" height="462" src="https://aipos.id/galeri/blog/tinymce-Screenshot-2018-03-14-09-55-22-156-com.diengcyber.aipos.png" style="display: block; margin-left: auto; margin-right: auto;"><br bogus="1"></span></p><p><br></p>', '', 41, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `aipos_blog_gambar`
--

CREATE TABLE IF NOT EXISTS `aipos_blog_gambar` (
`id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_blog_gambar`
--

INSERT INTO `aipos_blog_gambar` (`id`, `id_blog`, `gambar`, `level`) VALUES
(1, 1, 'http://aipos.id/galeri/blog/logo_aipos.png', 1),
(2, 2, 'http://aipos.id/galeri/blog/Screenshot_2018-03-14-09-53-54-764_com_diengcyber_aipos.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aipos_blog_kategori`
--

CREATE TABLE IF NOT EXISTS `aipos_blog_kategori` (
`id` int(11) NOT NULL,
  `id_blog` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_blog_kategori`
--

INSERT INTO `aipos_blog_kategori` (`id`, `id_blog`, `id_kategori`) VALUES
(4, 1, 1),
(5, 1, 2),
(6, 1, 3),
(10, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `aipos_faq_i_k`
--

CREATE TABLE IF NOT EXISTS `aipos_faq_i_k` (
`id` int(11) NOT NULL,
  `id_s_k` int(11) DEFAULT NULL,
  `isi_kategori` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_faq_i_k`
--

INSERT INTO `aipos_faq_i_k` (`id`, `id_s_k`, `isi_kategori`) VALUES
(1, 1, 'ISI FAQ 2');

-- --------------------------------------------------------

--
-- Table structure for table `aipos_faq_k`
--

CREATE TABLE IF NOT EXISTS `aipos_faq_k` (
`id` int(11) NOT NULL,
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_faq_k`
--

INSERT INTO `aipos_faq_k` (`id`, `kategori`) VALUES
(1, 'E-Commerce'),
(2, 'Restaurant'),
(3, 'Retail');

-- --------------------------------------------------------

--
-- Table structure for table `aipos_faq_s_k`
--

CREATE TABLE IF NOT EXISTS `aipos_faq_s_k` (
`id` int(11) NOT NULL,
  `id_k` int(11) DEFAULT NULL,
  `sub_kategori` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_faq_s_k`
--

INSERT INTO `aipos_faq_s_k` (`id`, `id_k`, `sub_kategori`) VALUES
(1, 1, 'SUB FAQ 1');

-- --------------------------------------------------------

--
-- Table structure for table `aipos_kategori_blog`
--

CREATE TABLE IF NOT EXISTS `aipos_kategori_blog` (
`id` int(11) NOT NULL,
  `kategori` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aipos_kategori_blog`
--

INSERT INTO `aipos_kategori_blog` (`id`, `kategori`) VALUES
(1, 'Retail'),
(2, 'Restaurant'),
(3, 'Olshop');

-- --------------------------------------------------------

--
-- Table structure for table `aipos_login_attempts`
--

CREATE TABLE IF NOT EXISTS `aipos_login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `aipos_users`
--

CREATE TABLE IF NOT EXISTS `aipos_users` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` varchar(150) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `aipos_users`
--

INSERT INTO `aipos_users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `alamat`, `level`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$08$LqQY2J89oFycTH291fr79ufJEotKCVikla.wnvzXfIdFhlcUeW7eG', '', 'admin@admin.com', '', '', NULL, '', 1268889823, 1520225134, 1, 'Admin', 'istrator', 'ADMIN', '0', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `aipos_users_groups`
--

CREATE TABLE IF NOT EXISTS `aipos_users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `akun` varchar(50) DEFAULT NULL,
  `parent` varchar(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `id_toko`, `kode`, `akun`, `parent`, `uid`, `ket`) VALUES
(1, 158, '1', 'Beban Biaya', NULL, NULL, ''),
(2, 158, '1.01', 'Aktiva Lancar', NULL, NULL, ''),
(4, 158, '1.01.02', 'Piutang', NULL, NULL, ''),
(5, 158, '1.01.02.01', 'Piutang Usaha', NULL, NULL, ''),
(6, 158, '1.01.02.02', 'APLIKASI DI BAYAR DI MUKA', NULL, NULL, ''),
(7, 158, '1.01.02.05', 'Marketplace', NULL, NULL, ''),
(8, 158, '1.01.03', 'Kas', NULL, NULL, ''),
(9, 158, '1.01.03.01', 'Bank', NULL, NULL, ''),
(10, 158, '1.01.03.01.01', 'Bank BCA', NULL, NULL, ''),
(11, 158, '1.01.03.01.02', 'Bank BRI', NULL, NULL, ''),
(12, 158, '1.01.03.02', 'Kas Pak Edi', NULL, NULL, ''),
(13, 158, '1.01.03.03', 'Kas Kecil', NULL, NULL, ''),
(14, 158, '1.01.03.04', 'Kas OUTLET', NULL, NULL, ''),
(15, 158, '1.01.03.05', 'Diskon', NULL, NULL, ''),
(17, 158, '1.01.05', 'persediaan bahan baku', NULL, NULL, ''),
(18, 158, '1.01.06', 'iklan Dibayar Dimuka', NULL, NULL, ''),
(19, 158, '1.01.07', 'persediaan barang setengah jadi', NULL, NULL, ''),
(20, 158, '1.02', 'Aktiva Tetap', NULL, NULL, ''),
(21, 158, '1.02.01', 'Tanah', NULL, NULL, ''),
(22, 158, '1.02.02', 'Kendaraan', NULL, NULL, ''),
(23, 158, '1.02.03', 'Komputer', NULL, NULL, ''),
(24, 158, '1.02.04', 'mesin', NULL, NULL, ''),
(25, 158, '1.02.05', 'Sewa dibayar dimuka', NULL, NULL, ''),
(26, 158, '1.02.06', 'Peralatan', NULL, NULL, ''),
(27, 158, '1.02.07', 'Inventaris Pantry', NULL, NULL, ''),
(28, 158, '1.02.08', 'Inventaris Advertiser', NULL, NULL, ''),
(29, 158, '1.02.09', 'GEDUNG', NULL, NULL, ''),
(30, 158, '1.02.10', 'Handphone Operasional', NULL, NULL, ''),
(31, 158, '1.02.11', 'perlengkapan', NULL, NULL, ''),
(32, 158, '2', 'Pasiva', NULL, NULL, ''),
(33, 158, '2.01', 'Hutang Dagang', NULL, NULL, ''),
(34, 158, '2.02', 'Hutang Karyawan', NULL, NULL, ''),
(35, 158, '2.03', 'Modal Usaha', NULL, NULL, ''),
(36, 158, '2.04', 'Laba di tahan', NULL, NULL, ''),
(37, 158, '2.05', 'Laba/rugi', NULL, NULL, ''),
(39, 158, '3', 'Pendapatan', NULL, NULL, ''),
(40, 158, '3.01', 'Penambahan Nilai Aset', NULL, NULL, ''),
(41, 158, '3.02', 'Penjualan Aset', NULL, NULL, ''),
(42, 158, '3.03', 'Penjualan', NULL, NULL, ''),
(43, 158, '3.03.01', 'Penjualan Barang', NULL, NULL, ''),
(44, 158, '3.03.03', 'Pendapatan Ongkir', NULL, NULL, ''),
(45, 158, '3.04', 'Jasa', NULL, NULL, ''),
(46, 158, '3.05', 'Pendapatan Toko', NULL, NULL, ''),
(47, 158, '3.06', 'Pendapatan Selisih Ongkir', NULL, NULL, ''),
(48, 158, '3.07', 'Pendapatan Lain-lain', NULL, NULL, ''),
(49, 158, '3.07.01', 'Pendapatan Bunga Bank', NULL, NULL, ''),
(50, 158, '3.07.02', 'Pendapatan Cash Back', NULL, NULL, ''),
(51, 158, '3.07.03', 'Pendapatan Jasa COD', NULL, NULL, ''),
(52, 158, '4', 'Biaya dan Pendapatan', NULL, NULL, ''),
(53, 158, '4.01', 'Biaya Umum dan Administrasi', NULL, NULL, ''),
(54, 158, '4.01.01', 'Gaji Karyawan Kantor', NULL, NULL, ''),
(55, 158, '4.01.02', 'Biaya ATK', NULL, NULL, ''),
(56, 158, '4.01.03', 'Biaya Telpon dan Internet', NULL, NULL, ''),
(57, 158, '4.01.04', 'Biaya Listrik', NULL, NULL, ''),
(58, 158, '4.01.05', 'Biaya PDAM', NULL, NULL, ''),
(59, 158, '4.01.06', 'Biaya Lain-lain', NULL, NULL, ''),
(60, 158, '4.01.07', 'Biaya Pemeliharaan Bangunan', NULL, NULL, ''),
(61, 158, '4.01.08', 'Biaya Pemeliharaan Kendaraan', NULL, NULL, ''),
(62, 158, '4.01.09', 'Biaya Pemeliharaan Inventaris', NULL, NULL, ''),
(63, 158, '4.01.10', 'Biaya BPJS Ketenagakerjaan', NULL, NULL, ''),
(64, 158, '4.01.11', 'Biaya BPJS Kesehatan', NULL, NULL, ''),
(65, 158, '4.01.12', 'Biaya Tunjangan Hari Raya', NULL, NULL, ''),
(66, 158, '4.01.13', 'Biaya Konsumsi', NULL, NULL, ''),
(67, 158, '4.01.14', 'Biaya Pulsa CS', NULL, NULL, ''),
(68, 158, '4.01.15', 'Biaya Aplikasi', NULL, NULL, ''),
(69, 158, '4.01.16', 'Biaya Operasional', NULL, NULL, ''),
(70, 158, '4.01.18', 'Biaya Administrasi Bank', NULL, NULL, ''),
(71, 158, '4.01.19', 'Gaji DIbayar Dimuka', NULL, NULL, ''),
(72, 158, '4.01.20', 'Ongkir Diibayar Dimuka', NULL, NULL, ''),
(73, 158, '4.02', 'Penjualan', NULL, NULL, ''),
(74, 158, '4.02.01', 'Biaya Ongkir', NULL, NULL, ''),
(75, 158, '4.02.02', 'Biaya Iklan Facebook', NULL, NULL, ''),
(76, 158, '4.02.03', 'Biaya Packing', NULL, NULL, ''),
(77, 158, '4.02.04', 'Operasional', NULL, NULL, ''),
(78, 158, '4.02.05', 'Biaya Iklan Google', NULL, NULL, ''),
(79, 158, '4.02.06', 'Biaya Lain lain', NULL, NULL, ''),
(80, 158, '4.02.07', 'Beban Garansi', NULL, NULL, ''),
(81, 158, '4.02.08', 'Pajak Perusahaan', NULL, NULL, ''),
(82, 158, '4.02.09', 'Biaya Gaji Karyawan', NULL, NULL, ''),
(83, 158, '4.03', 'HPP', NULL, NULL, ''),
(84, 158, '4.04', 'Retur Penjualan', NULL, NULL, ''),
(85, 158, '4.05', 'Penyusutan Nilai Aset', NULL, NULL, ''),
(86, 158, '4.06', 'Pendapatan dan Biaya diluar Usaha', NULL, NULL, ''),
(87, 158, '4.06.02', 'Biaya diluar Usaha', NULL, NULL, ''),
(88, 158, '4.06.03', 'AMAL PERUSAHAAN', NULL, NULL, ''),
(89, 158, '4.07', 'Refund Kelebihan Transfer', NULL, NULL, ''),
(90, 158, '4.02.10', 'Biaya Promosi', NULL, NULL, ''),
(91, 158, '1.01.08', 'PERSEDIAAN BAHAN PEMBANTU', NULL, NULL, ''),
(92, 158, '4.01.21', 'coba', NULL, NULL, ''),
(93, 158, '4.02.11', 'Penjualan Masuk', NULL, NULL, ''),
(94, 158, '1.03', 'Testing', NULL, NULL, ''),
(95, 158, '4.04.01', 'tets cek', NULL, NULL, ''),
(96, 158, '3.03.04', 'Penjualan Produk', 'Penjualan', NULL, ''),
(97, 158, '1', 'bank', 'bank', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `akun_asli`
--

CREATE TABLE IF NOT EXISTS `akun_asli` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `akun` varchar(50) DEFAULT NULL,
  `parent` varchar(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_asli`
--

INSERT INTO `akun_asli` (`id`, `id_toko`, `kode`, `akun`, `parent`, `uid`, `ket`) VALUES
(1, 0, '1', 'Aktiva', NULL, NULL, ''),
(2, 0, '1.01', 'Aktiva Lancar', NULL, NULL, ''),
(3, 0, '1.01.01', 'Bank', NULL, NULL, ''),
(4, 0, '1.01.02', 'Piutang', NULL, NULL, ''),
(5, 0, '1.01.03', 'Kas', NULL, NULL, ''),
(6, 0, '1.02', 'Aktiva Tetap', NULL, NULL, ''),
(7, 0, '1.02.01', 'Tanah', NULL, NULL, ''),
(8, 0, '1.02.02', 'Kendaraan', NULL, NULL, ''),
(9, 0, '1.02.03', 'Komputer', NULL, NULL, ''),
(10, 0, '1.02.04', 'Investasi', NULL, NULL, ''),
(11, 0, '2', 'Pasiva', NULL, NULL, ''),
(12, 158, '2.01', 'Hutang Dagang', NULL, NULL, ''),
(13, 0, '2.02', 'Modal', NULL, NULL, ''),
(14, 0, '2.05', 'Laba / Rugi', NULL, NULL, ''),
(15, 0, '3', 'Pendapatan', NULL, NULL, ''),
(16, 0, '3.01', 'Penambahan Nilai Aset', NULL, NULL, ''),
(17, 0, '3.02', 'Penjualan Aset', NULL, NULL, ''),
(18, 0, '3.03', 'Penjualan', NULL, NULL, ''),
(19, 0, '3.03.01', 'Penjualan Barang', NULL, NULL, ''),
(20, 0, '3.04', 'Jasa', NULL, NULL, ''),
(21, 0, '4', 'Biaya dan Pendapatan', NULL, NULL, ''),
(23, 0, '4.05', 'Penyusutan Nilai Aset', NULL, NULL, ''),
(24, 0, '4.02', 'Penjualan', NULL, NULL, ''),
(43, 158, '2.01.01', 'Hutang CV. MITRA BOGA SUKSES INDONESIA', 'supplier', 353, ''),
(44, 0, '4.03', 'HPP', NULL, NULL, ''),
(45, 0, '1.01.02.01', 'Piutang Usaha', NULL, NULL, ''),
(46, 0, '1.01.04', 'Persediaan', NULL, NULL, ''),
(47, 0, '1.02.05', 'Sewa dibayar dimuka', NULL, NULL, ''),
(48, 0, '1.02.06', 'Peralatan', NULL, NULL, ''),
(49, 158, '4.02.01.01', 'Beban Sewa', NULL, NULL, ''),
(57, 0, '3.05', 'Pendapatan Toko', NULL, NULL, ''),
(59, 0, '2.04', 'PPN Keluaran', NULL, NULL, ''),
(61, 158, '4.02.01.02', 'Beban Bensin', NULL, NULL, ''),
(62, 0, '3.05', 'Retur Penjualan', NULL, NULL, ''),
(65, 0, '4.04', 'Retur Pembelian', NULL, NULL, ''),
(67, 0, '1.01.03.02', 'Kas Besar', NULL, NULL, ''),
(68, 0, '1.01.03.03', 'Kas Kecil', NULL, NULL, ''),
(71, 158, '4.02.01.03', 'Beban ATK', NULL, NULL, ''),
(72, 158, '4.02.01.04', 'Operasional', NULL, NULL, ''),
(75, 0, '2.03', 'PPN Keluaran yang harus dibayar', NULL, NULL, 'PPN faktur sudah di filter, sementara tidak masuk ke kas karena ada dua PPN, untuk kas besar marketing harus dikurangi PPN ini dahulu'),
(76, 158, '1.01.03.04', 'Bon Sementara', NULL, NULL, ''),
(77, 158, '1.01.03.04.01', 'Kas Pak Esti', NULL, NULL, ''),
(79, 158, '1.01.03.04.02', 'Kas Ida', NULL, NULL, ''),
(80, 158, '1.01.03.04.03', 'Kas Oki', NULL, NULL, ''),
(81, 158, '1.01.03.04.04', 'Kas Istiharoh', NULL, NULL, ''),
(82, 158, '1.01.03.04.05', 'Kas Adi', NULL, NULL, ''),
(83, 0, '1.01.03.01', 'Bank', NULL, NULL, ''),
(84, 158, '1.01.03.01.01', 'Bank BCA', NULL, NULL, ''),
(85, 158, '1.01.03.01.02', 'Bank BRI', NULL, NULL, ''),
(86, 158, '4.01', 'Biaya Umum dan Administrasi', NULL, NULL, ''),
(87, 158, '4.01.01', 'Gaji Karyawan Kantor', NULL, NULL, ''),
(88, 158, '4.01.02', 'Biaya ATK', NULL, NULL, ''),
(89, 158, '4.01.03', 'Biaya Telpon dan Internet', NULL, NULL, ''),
(90, 158, '4.01.04', 'Biaya Listrik', NULL, NULL, ''),
(91, 158, '4.01.05', 'Biaya PDAM', NULL, NULL, ''),
(92, 158, '4.01.06', 'Biaya Lain-lain', NULL, NULL, ''),
(93, 158, '4.02.01.05', 'Gaji Sales', NULL, NULL, ''),
(94, 158, '4.02.02', 'Banjarnegara', NULL, NULL, ''),
(95, 158, '4.02.01', 'Wonosobo', NULL, NULL, ''),
(96, 158, '4.02.03', 'Purwokerto', NULL, NULL, ''),
(97, 158, '4.02.01.06', 'Biaya Kemas', NULL, NULL, ''),
(98, 158, '4.02.01.07', 'Biaya Bongkar, Makan', NULL, NULL, ''),
(100, 158, '4.01.07', 'Biaya Pemeliharaan Bangunan', NULL, NULL, ''),
(101, 158, '4.01.08', 'Biaya Pemeliharaan Kendaraan', NULL, NULL, ''),
(102, 158, '4.01.09', 'Biaya Pemeliharaan Inventaris', NULL, NULL, ''),
(103, 158, '4.01.10', 'Biaya BPJS Ketenagakerjaan', NULL, NULL, ''),
(104, 158, '4.01.11', 'Biaya BPJS Kesehatan', NULL, NULL, ''),
(105, 158, '4.01.12', 'Biaya Tunjangan Hari Raya', NULL, NULL, ''),
(106, 158, '4.02.01.08', 'Biaya Insentif', NULL, NULL, ''),
(107, 158, '4.06', 'Pendapatan dan Biaya diluar Usaha', NULL, NULL, ''),
(108, 158, '4.06.01', 'Pendapatan Lain-lain', NULL, NULL, ''),
(109, 158, '4.06.02', 'Biaya diluar Usaha', NULL, NULL, ''),
(110, 158, '4.02.02.01', 'Beban Sewa', NULL, NULL, ''),
(111, 158, '4.02.02.02', 'Beban Bensin', NULL, NULL, ''),
(112, 158, '4.02.02.03', 'Beban ATK', NULL, NULL, ''),
(113, 158, '4.02.02.04', 'Operasional', NULL, NULL, ''),
(114, 158, '4.02.02.05', 'Gaji Sales', NULL, NULL, ''),
(115, 158, '4.02.02.06', 'Biaya Kemas', NULL, NULL, ''),
(116, 158, '4.02.02.07', 'Biaya Bongkar, Makan', NULL, NULL, ''),
(117, 158, '4.02.02.08', 'Biaya Insentif', NULL, NULL, ''),
(118, 158, '4.02.03.01', 'Beban Sewa', NULL, NULL, ''),
(119, 158, '4.02.03.02', 'Beban Bensin', NULL, NULL, ''),
(120, 158, '4.02.03.03', 'Beban ATK', NULL, NULL, ''),
(121, 158, '4.02.03.04', 'Operasional', NULL, NULL, ''),
(122, 158, '4.02.03.05', 'Gaji Sales', NULL, NULL, ''),
(123, 158, '4.02.03.06', 'Biaya Kemas', NULL, NULL, ''),
(124, 158, '4.02.03.07', 'Biaya Bongkar, Makan', NULL, NULL, ''),
(125, 158, '4.02.03.08', 'Biaya Insentif', NULL, NULL, ''),
(126, 158, '2.02.01', 'Modal Usaha', NULL, NULL, ''),
(127, 158, '2.01.02', 'Hutang CV. MUTIARA KEMBAR', 'supplier', 346, ''),
(128, 158, '2.01.03', 'Hutang CV. PUTRA MATAHARI SEJAHTERA', 'supplier', 338, ''),
(129, 158, '2.01.04', 'Hutang 	PT. CATUR WANGSA INDAH', 'supplier', 340, ''),
(130, 158, '2.01.05', 'Hutang PT. DAIRYFOOD INTERNUSA', 'supplier', 342, ''),
(131, 158, '2.01.06', 'Hutang PT. DUTA HARMONY INDONESIA', 'supplier', 339, ''),
(132, 158, '2.01.07', 'Hutang PT. HERBATAMA INDO PERKASA', 'supplier', 349, ''),
(133, 158, '2.01.08', 'Hutang PT. HESSEN UNION INDONESIA', 'supplier', 341, ''),
(134, 158, '2.01.09', 'Hutang PT. HOLYLAND FOOD INDONESIA', 'supplier', 350, ''),
(135, 158, '2.01.10', 'Hutang PT. MITRA SEHATI SEKATA PURWOKERTO', 'supplier', 344, ''),
(136, 158, '2.01.11', 'Hutang 	PT. MULIA ARTHA SEJATI', 'supplier', 347, ''),
(138, 158, '2.01.12', 'Hutang PT. PANCA SURYA ABADI', 'supplier', 351, ''),
(139, 158, '2.01.13', 'Hutang PT. POWER MAXX INDONESIA', 'supplier', 345, ''),
(140, 158, '2.01.14', 'Hutang PT. SEKAWAN KOSMETIK WASANTARA', 'supplier', 343, ''),
(141, 158, '2.01.15', 'Hutang PT. SINGAMAS INDONESIA', 'supplier', 352, ''),
(142, 158, '2.01.16', 'Hutang PT. TRIJAYA TANGGUH', 'supplier', 348, ''),
(160, 158, '1.01.02.02', 'PPN Masukkan', NULL, NULL, ''),
(162, 158, '1.01.03.05', 'Diskon', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `akun_copy`
--

CREATE TABLE IF NOT EXISTS `akun_copy` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(20) DEFAULT NULL,
  `akun` varchar(50) DEFAULT NULL,
  `parent` varchar(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=227 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_copy`
--

INSERT INTO `akun_copy` (`id`, `id_toko`, `kode`, `akun`, `parent`, `uid`, `ket`) VALUES
(1, 0, '1', 'Aktiva', NULL, NULL, ''),
(2, 0, '1.01', 'Aktiva Lancar', NULL, NULL, ''),
(3, 0, '1.01.01', 'Bank', NULL, NULL, ''),
(4, 0, '1.01.02', 'Piutang', NULL, NULL, ''),
(5, 0, '1.01.03', 'Kas', NULL, NULL, ''),
(6, 0, '1.02', 'Aktiva Tetap', NULL, NULL, ''),
(7, 0, '1.02.01', 'Tanah', NULL, NULL, ''),
(8, 0, '1.02.02', 'Kendaraan', NULL, NULL, ''),
(9, 0, '1.02.03', 'Komputer', NULL, NULL, ''),
(10, 0, '1.02.04', 'Investasi', NULL, NULL, ''),
(11, 0, '2', 'Pasiva', NULL, NULL, ''),
(12, 158, '2.01', 'Hutang Dagang', NULL, NULL, ''),
(13, 0, '2.02', 'Modal', NULL, NULL, ''),
(14, 0, '2.05', 'Laba / Rugi', NULL, NULL, ''),
(15, 0, '3', 'Pendapatan', NULL, NULL, ''),
(16, 0, '3.01', 'Penambahan Nilai Aset', NULL, NULL, ''),
(17, 0, '3.02', 'Penjualan Aset', NULL, NULL, ''),
(18, 0, '3.03', 'Penjualan', NULL, NULL, ''),
(19, 0, '3.03.01', 'Penjualan Barang', NULL, NULL, ''),
(20, 0, '3.04', 'Jasa', NULL, NULL, ''),
(21, 0, '4', 'Biaya dan Pendapatan', NULL, NULL, ''),
(23, 0, '4.05', 'Penyusutan Nilai Aset', NULL, NULL, ''),
(24, 0, '4.02', 'Penjualan', NULL, NULL, ''),
(44, 158, '4.03', 'HPP', NULL, NULL, ''),
(45, 0, '1.01.02.01', 'Piutang Usaha', NULL, NULL, ''),
(46, 158, '1.01.04', 'Persediaan', NULL, NULL, ''),
(47, 0, '1.02.05', 'Sewa dibayar dimuka', NULL, NULL, ''),
(48, 0, '1.02.06', 'Peralatan', NULL, NULL, ''),
(57, 0, '3.05', 'Pendapatan Toko', NULL, NULL, ''),
(65, 0, '4.04', 'Retur Penjualan', NULL, NULL, ''),
(67, 0, '1.01.03.02', 'Kas Besar', NULL, NULL, ''),
(83, 0, '1.01.03.01', 'Bank', NULL, NULL, ''),
(84, 158, '1.01.03.01.01', 'Bank BCA', 'bank', 3, ''),
(85, 158, '1.01.03.01.02', 'Bank BRI 1', 'bank', 1, ''),
(86, 158, '4.01', 'Biaya Umum dan Administrasi', NULL, NULL, ''),
(87, 158, '4.01.01', 'Gaji Karyawan Kantor', NULL, NULL, ''),
(88, 158, '4.01.02', 'Biaya ATK', NULL, NULL, ''),
(89, 158, '4.01.03', 'Biaya Telpon dan Internet', NULL, NULL, ''),
(90, 158, '4.01.04', 'Biaya Listrik', NULL, NULL, ''),
(91, 158, '4.01.05', 'Biaya PDAM', NULL, NULL, ''),
(92, 158, '4.01.06', 'Biaya Lain-lain', NULL, NULL, ''),
(100, 158, '4.01.07', 'Biaya Pemeliharaan Bangunan', NULL, NULL, ''),
(101, 158, '4.01.08', 'Biaya Pemeliharaan Kendaraan', NULL, NULL, ''),
(102, 158, '4.01.09', 'Biaya Pemeliharaan Inventaris', NULL, NULL, ''),
(103, 158, '4.01.10', 'Biaya BPJS Ketenagakerjaan', NULL, NULL, ''),
(104, 158, '4.01.11', 'Biaya BPJS Kesehatan', NULL, NULL, ''),
(105, 158, '4.01.12', 'Biaya Tunjangan Hari Raya', NULL, NULL, ''),
(107, 158, '4.06', 'Pendapatan dan Biaya diluar Usaha', NULL, NULL, ''),
(108, 158, '3.07', 'Pendapatan Lain-lain', NULL, NULL, ''),
(109, 158, '4.06.02', 'Biaya diluar Usaha', NULL, NULL, ''),
(126, 158, '2.02.01', 'Modal Usaha', NULL, NULL, ''),
(162, 158, '1.01.03.05', 'Diskon', NULL, NULL, ''),
(163, 158, '1.01.03.01.03', 'Bank Mandiri1', 'bank', 4, ''),
(164, 158, '1.01.03.01.04', 'Bank Mandiri 2', 'bank', 0, ''),
(165, 158, '1.01.03.01.05', 'Bank Jenius', 'bank', NULL, ''),
(166, 158, '1.01.03.03', 'Kas Kecil', 'bank', 0, ''),
(167, 158, '1.01.03.01.07', 'M POSPAY', 'bank', 5, ''),
(171, 158, '1.01.02.05', 'Marketplace', 'piutang', 4, ''),
(178, 158, '4.02.01', 'Biaya Ongkir', NULL, NULL, ''),
(179, 158, '4.02.02', 'Biaya Iklan Facebook', NULL, NULL, ''),
(180, 158, '4.02.03', 'Biaya Packing', NULL, NULL, ''),
(181, 158, '4.02.04', 'Operasional', NULL, NULL, ''),
(182, 158, '4.02.05', 'Biaya Iklan Google', NULL, NULL, ''),
(183, 158, '4.02.06', 'Biaya Lain lain', NULL, NULL, ''),
(184, 158, '4.01.13', 'Biaya Konsumsi', NULL, NULL, ''),
(185, 158, '4.01.14', 'Biaya Pulsa CS', NULL, NULL, ''),
(186, 158, '4.01.15', 'Biaya Aplikasi', NULL, NULL, ''),
(188, 158, '4.02.07', 'Beban Garansi', NULL, NULL, ''),
(190, 158, '4.02.08', 'Pajak Perusahaan', NULL, NULL, ''),
(193, 158, '3.06', 'Pendapatan Selisih Ongkir', NULL, NULL, ''),
(194, 158, '3.03.03', 'Pendapatan Ongkir', NULL, NULL, ''),
(196, 158, '2.02.02', 'Laba di tahan', NULL, NULL, ''),
(197, 158, '4.07', 'Refund Kelebihan Transfer', NULL, NULL, ''),
(198, 158, '4.01.16', 'Biaya Operasional', NULL, NULL, ''),
(199, 158, '4.02.09', 'Biaya Gaji Karyawan', NULL, NULL, ''),
(201, 158, '2.01.01', 'Saldo Terbuka BRI 1', 'bank2', 1, ''),
(202, 158, '2.01.02', 'Saldo Terbuka BCA', 'bank2', 3, ''),
(203, 158, '2.01.03', 'Saldo Terbuka Mandiri 1', 'bank2', 4, ''),
(204, 158, '4.01.18', 'Biaya Administrasi Bank', NULL, NULL, ''),
(205, 158, '2.01.04', 'Saldo Terbuka Mandiri 2', 'bank2', 5, ''),
(206, 158, '4.01.19', 'Gaji DIbayar Dimuka', NULL, NULL, ''),
(207, 158, '4.01.20', 'Ongkir Diibayar Dimuka', NULL, NULL, ''),
(208, 158, '2.01.05', 'Hutang Gaji Karyawan', NULL, NULL, ''),
(209, 158, '2.01.06', 'Hutang Ongkir', NULL, NULL, ''),
(211, 158, '1.02.07', 'Inventaris Pantry', NULL, NULL, ''),
(212, 158, '1.02.08', 'Inventaris Advertiser', NULL, NULL, ''),
(213, 158, '1.02.09', 'Infrastruktur', NULL, NULL, ''),
(214, 158, '1.02.10', 'Handphone Operasional', NULL, NULL, ''),
(215, 158, '1.02.11', 'Inventaris Admin', NULL, NULL, ''),
(216, 158, '2.02.03', 'Modal Perusahaan (Barang)', NULL, NULL, ''),
(217, 158, '4.06.03', 'AMAL PERUSAHAAN', NULL, NULL, ''),
(218, 158, '3.07.01', 'Pendapatan Bunga Bank', NULL, NULL, ''),
(219, 158, '3.07.02', 'Pendapatan Cash Back', NULL, NULL, ''),
(220, 158, '3.07.03', 'Pendapatan Jasa COD', NULL, NULL, ''),
(221, 158, '2.02.04', 'Aktiva Tetap Kantor', NULL, NULL, ''),
(223, 158, '1.99', 'Penyesuaian Aktiva D/K', NULL, NULL, ''),
(224, 158, '2.99', 'Penyesuaian Pasiva D/K', NULL, NULL, ''),
(226, 158, '1.01.03.01.09', 'Danamon', 'bank', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `akun_iklan`
--

CREATE TABLE IF NOT EXISTS `akun_iklan` (
  `id` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `akun` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akun_sederhana`
--

CREATE TABLE IF NOT EXISTS `akun_sederhana` (
`id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `jenis` int(11) DEFAULT NULL,
  `nama_akun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=672 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `akun_sederhana`
--

INSERT INTO `akun_sederhana` (`id`, `id_akun`, `id_toko`, `jenis`, `nama_akun`) VALUES
(1, 442, 63, 1, 'Hasil Usaha'),
(2, 443, 63, 1, 'Gaji'),
(3, 444, 63, 1, 'Bonus'),
(4, 445, 63, 2, 'Makan'),
(5, 446, 63, 2, 'Transportasi'),
(6, 447, 63, 2, 'Listrik'),
(7, 448, 63, 2, 'PDAM'),
(8, 449, 63, 2, 'Pulsa'),
(9, 450, 63, 2, 'Gaji Karyawan'),
(10, 451, 63, 2, 'Belanja Umum'),
(11, 452, 94, 1, 'Hasil Usaha'),
(12, 453, 94, 1, 'Gaji'),
(13, 454, 94, 1, 'Bonus'),
(14, 455, 94, 2, 'Makan'),
(15, 456, 94, 2, 'Transportasi'),
(16, 457, 94, 2, 'Listrik'),
(17, 458, 94, 2, 'PDAM'),
(18, 459, 94, 2, 'Pulsa'),
(19, 460, 94, 2, 'Gaji Karyawan'),
(20, 461, 94, 2, 'Belanja Umum'),
(21, 462, 115, 1, 'Hasil Usaha'),
(22, 463, 115, 1, 'Gaji'),
(23, 464, 115, 1, 'Bonus'),
(24, 465, 115, 2, 'Makan'),
(25, 466, 115, 2, 'Transportasi'),
(26, 467, 115, 2, 'Listrik'),
(27, 468, 115, 2, 'PDAM'),
(28, 469, 115, 2, 'Pulsa'),
(29, 470, 115, 2, 'Gaji Karyawan'),
(30, 471, 115, 2, 'Belanja Umum'),
(31, 472, 116, 1, 'Hasil Usaha'),
(32, 473, 116, 1, 'Gaji'),
(33, 474, 116, 1, 'Bonus'),
(34, 475, 116, 2, 'Makan'),
(35, 476, 116, 2, 'Transportasi'),
(36, 477, 116, 2, 'Listrik'),
(37, 478, 116, 2, 'PDAM'),
(38, 479, 116, 2, 'Pulsa'),
(39, 480, 116, 2, 'Gaji Karyawan'),
(40, 481, 116, 2, 'Belanja Umum'),
(41, 482, 117, 1, 'Hasil Usaha'),
(42, 483, 117, 1, 'Gaji'),
(43, 484, 117, 1, 'Bonus'),
(44, 485, 117, 2, 'Makan'),
(45, 486, 117, 2, 'Transportasi'),
(46, 487, 117, 2, 'Listrik'),
(47, 488, 117, 2, 'PDAM'),
(48, 489, 117, 2, 'Pulsa'),
(49, 490, 117, 2, 'Gaji Karyawan'),
(50, 491, 117, 2, 'Belanja Umum'),
(51, 492, 118, 1, 'Hasil Usaha'),
(52, 493, 118, 1, 'Gaji'),
(53, 494, 118, 1, 'Bonus'),
(54, 495, 118, 2, 'Makan'),
(55, 496, 118, 2, 'Transportasi'),
(56, 497, 118, 2, 'Listrik'),
(57, 498, 118, 2, 'PDAM'),
(58, 499, 118, 2, 'Pulsa'),
(59, 500, 118, 2, 'Gaji Karyawan'),
(60, 501, 118, 2, 'Belanja Umum'),
(61, 502, 119, 1, 'Hasil Usaha'),
(62, 503, 119, 1, 'Gaji'),
(63, 504, 119, 1, 'Bonus'),
(64, 505, 119, 2, 'Makan'),
(65, 506, 119, 2, 'Transportasi'),
(66, 507, 119, 2, 'Listrik'),
(67, 508, 119, 2, 'PDAM'),
(68, 509, 119, 2, 'Pulsa'),
(69, 510, 119, 2, 'Gaji Karyawan'),
(70, 511, 119, 2, 'Belanja Umum'),
(71, 512, 120, 1, 'Hasil Usaha'),
(72, 513, 120, 1, 'Gaji'),
(73, 514, 120, 1, 'Bonus'),
(74, 515, 120, 2, 'Makan'),
(75, 516, 120, 2, 'Transportasi'),
(76, 517, 120, 2, 'Listrik'),
(77, 518, 120, 2, 'PDAM'),
(78, 519, 120, 2, 'Pulsa'),
(79, 520, 120, 2, 'Gaji Karyawan'),
(80, 521, 120, 2, 'Belanja Umum'),
(81, 522, 121, 1, 'Hasil Usaha'),
(82, 523, 121, 1, 'Gaji'),
(83, 524, 121, 1, 'Bonus'),
(84, 525, 121, 2, 'Makan'),
(85, 526, 121, 2, 'Transportasi'),
(86, 527, 121, 2, 'Listrik'),
(87, 528, 121, 2, 'PDAM'),
(88, 529, 121, 2, 'Pulsa'),
(89, 530, 121, 2, 'Gaji Karyawan'),
(90, 531, 121, 2, 'Belanja Umum'),
(91, 532, 122, 1, 'Hasil Usaha'),
(92, 533, 122, 1, 'Gaji'),
(93, 534, 122, 1, 'Bonus'),
(94, 535, 122, 2, 'Makan'),
(95, 536, 122, 2, 'Transportasi'),
(96, 537, 122, 2, 'Listrik'),
(97, 538, 122, 2, 'PDAM'),
(98, 539, 122, 2, 'Pulsa'),
(99, 540, 122, 2, 'Gaji Karyawan'),
(100, 541, 122, 2, 'Belanja Umum'),
(101, 542, 123, 1, 'Hasil Usaha'),
(102, 543, 123, 1, 'Gaji'),
(103, 544, 123, 1, 'Bonus'),
(104, 545, 123, 2, 'Makan'),
(105, 546, 123, 2, 'Transportasi'),
(106, 547, 123, 2, 'Listrik'),
(107, 548, 123, 2, 'PDAM'),
(108, 549, 123, 2, 'Pulsa'),
(109, 550, 123, 2, 'Gaji Karyawan'),
(110, 551, 123, 2, 'Belanja Umum'),
(111, 552, 124, 1, 'Hasil Usaha'),
(112, 553, 124, 1, 'Gaji'),
(113, 554, 124, 1, 'Bonus'),
(114, 555, 124, 2, 'Makan'),
(115, 556, 124, 2, 'Transportasi'),
(116, 557, 124, 2, 'Listrik'),
(117, 558, 124, 2, 'PDAM'),
(118, 559, 124, 2, 'Pulsa'),
(119, 560, 124, 2, 'Gaji Karyawan'),
(120, 561, 124, 2, 'Belanja Umum'),
(121, 562, 125, 1, 'Hasil Usaha'),
(122, 563, 125, 1, 'Gaji'),
(123, 564, 125, 1, 'Bonus'),
(124, 565, 125, 2, 'Makan'),
(125, 566, 125, 2, 'Transportasi'),
(126, 567, 125, 2, 'Listrik'),
(127, 568, 125, 2, 'PDAM'),
(128, 569, 125, 2, 'Pulsa'),
(129, 570, 125, 2, 'Gaji Karyawan'),
(130, 571, 125, 2, 'Belanja Umum'),
(131, 572, 126, 1, 'Hasil Usaha'),
(132, 573, 126, 1, 'Gaji'),
(133, 574, 126, 1, 'Bonus'),
(134, 575, 126, 2, 'Makan'),
(135, 576, 126, 2, 'Transportasi'),
(136, 577, 126, 2, 'Listrik'),
(137, 578, 126, 2, 'PDAM'),
(138, 579, 126, 2, 'Pulsa'),
(139, 580, 126, 2, 'Gaji Karyawan'),
(140, 581, 126, 2, 'Belanja Umum'),
(141, 582, 127, 1, 'Hasil Usaha'),
(142, 583, 127, 1, 'Gaji'),
(143, 584, 127, 1, 'Bonus'),
(144, 585, 127, 2, 'Makan'),
(145, 586, 127, 2, 'Transportasi'),
(146, 587, 127, 2, 'Listrik'),
(147, 588, 127, 2, 'PDAM'),
(148, 589, 127, 2, 'Pulsa'),
(149, 590, 127, 2, 'Gaji Karyawan'),
(150, 591, 127, 2, 'Belanja Umum'),
(151, 592, 128, 1, 'Hasil Usaha'),
(152, 593, 128, 1, 'Gaji'),
(153, 594, 128, 1, 'Bonus'),
(154, 595, 128, 2, 'Makan'),
(155, 596, 128, 2, 'Transportasi'),
(156, 597, 128, 2, 'Listrik'),
(157, 598, 128, 2, 'PDAM'),
(158, 599, 128, 2, 'Pulsa'),
(159, 600, 128, 2, 'Gaji Karyawan'),
(160, 601, 128, 2, 'Belanja Umum'),
(161, 602, 129, 1, 'Hasil Usaha'),
(162, 603, 129, 1, 'Gaji'),
(163, 604, 129, 1, 'Bonus'),
(164, 605, 129, 2, 'Makan'),
(165, 606, 129, 2, 'Transportasi'),
(166, 607, 129, 2, 'Listrik'),
(167, 608, 129, 2, 'PDAM'),
(168, 609, 129, 2, 'Pulsa'),
(169, 610, 129, 2, 'Gaji Karyawan'),
(170, 611, 129, 2, 'Belanja Umum'),
(171, 612, 130, 1, 'Hasil Usaha'),
(172, 613, 130, 1, 'Gaji'),
(173, 614, 130, 1, 'Bonus'),
(174, 615, 130, 2, 'Makan'),
(175, 616, 130, 2, 'Transportasi'),
(176, 617, 130, 2, 'Listrik'),
(177, 618, 130, 2, 'PDAM'),
(178, 619, 130, 2, 'Pulsa'),
(179, 620, 130, 2, 'Gaji Karyawan'),
(180, 621, 130, 2, 'Belanja Umum'),
(181, 622, 131, 1, 'Hasil Usaha'),
(182, 623, 131, 1, 'Gaji'),
(183, 624, 131, 1, 'Bonus'),
(184, 625, 131, 2, 'Makan'),
(185, 626, 131, 2, 'Transportasi'),
(186, 627, 131, 2, 'Listrik'),
(187, 628, 131, 2, 'PDAM'),
(188, 629, 131, 2, 'Pulsa'),
(189, 630, 131, 2, 'Gaji Karyawan'),
(190, 631, 131, 2, 'Belanja Umum'),
(191, 632, 132, 1, 'Hasil Usaha'),
(192, 633, 132, 1, 'Gaji'),
(193, 634, 132, 1, 'Bonus'),
(194, 635, 132, 2, 'Makan'),
(195, 636, 132, 2, 'Transportasi'),
(196, 637, 132, 2, 'Listrik'),
(197, 638, 132, 2, 'PDAM'),
(198, 639, 132, 2, 'Pulsa'),
(199, 640, 132, 2, 'Gaji Karyawan'),
(200, 641, 132, 2, 'Belanja Umum'),
(201, 642, 133, 1, 'Hasil Usaha'),
(202, 643, 133, 1, 'Gaji'),
(203, 644, 133, 1, 'Bonus'),
(204, 645, 133, 2, 'Makan'),
(205, 646, 133, 2, 'Transportasi'),
(206, 647, 133, 2, 'Listrik'),
(207, 648, 133, 2, 'PDAM'),
(208, 649, 133, 2, 'Pulsa'),
(209, 650, 133, 2, 'Gaji Karyawan'),
(210, 651, 133, 2, 'Belanja Umum'),
(211, 652, 134, 1, 'Hasil Usaha'),
(212, 653, 134, 1, 'Gaji'),
(213, 654, 134, 1, 'Bonus'),
(214, 655, 134, 2, 'Makan'),
(215, 656, 134, 2, 'Transportasi'),
(216, 657, 134, 2, 'Listrik'),
(217, 658, 134, 2, 'PDAM'),
(218, 659, 134, 2, 'Pulsa'),
(219, 660, 134, 2, 'Gaji Karyawan'),
(220, 661, 134, 2, 'Belanja Umum'),
(221, 662, 135, 1, 'Hasil Usaha'),
(222, 663, 135, 1, 'Gaji'),
(223, 664, 135, 1, 'Bonus'),
(224, 665, 135, 2, 'Makan'),
(225, 666, 135, 2, 'Transportasi'),
(226, 667, 135, 2, 'Listrik'),
(227, 668, 135, 2, 'PDAM'),
(228, 669, 135, 2, 'Pulsa'),
(229, 670, 135, 2, 'Gaji Karyawan'),
(230, 671, 135, 2, 'Belanja Umum'),
(231, 672, 136, 1, 'Hasil Usaha'),
(232, 673, 136, 1, 'Gaji'),
(233, 674, 136, 1, 'Bonus'),
(234, 675, 136, 2, 'Makan'),
(235, 676, 136, 2, 'Transportasi'),
(236, 677, 136, 2, 'Listrik'),
(237, 678, 136, 2, 'PDAM'),
(238, 679, 136, 2, 'Pulsa'),
(239, 680, 136, 2, 'Gaji Karyawan'),
(240, 681, 136, 2, 'Belanja Umum'),
(241, 682, 137, 1, 'Hasil Usaha'),
(242, 683, 137, 1, 'Gaji'),
(243, 684, 137, 1, 'Bonus'),
(244, 685, 137, 2, 'Makan'),
(245, 686, 137, 2, 'Transportasi'),
(246, 687, 137, 2, 'Listrik'),
(247, 688, 137, 2, 'PDAM'),
(248, 689, 137, 2, 'Pulsa'),
(249, 690, 137, 2, 'Gaji Karyawan'),
(250, 691, 137, 2, 'Belanja Umum'),
(251, 692, 138, 1, 'Hasil Usaha'),
(252, 693, 138, 1, 'Gaji'),
(253, 694, 138, 1, 'Bonus'),
(254, 695, 138, 2, 'Makan'),
(255, 696, 138, 2, 'Transportasi'),
(256, 697, 138, 2, 'Listrik'),
(257, 698, 138, 2, 'PDAM'),
(258, 699, 138, 2, 'Pulsa'),
(259, 700, 138, 2, 'Gaji Karyawan'),
(260, 701, 138, 2, 'Belanja Umum'),
(261, 702, 139, 1, 'Hasil Usaha'),
(262, 703, 139, 1, 'Gaji'),
(263, 704, 139, 1, 'Bonus'),
(264, 705, 139, 2, 'Makan'),
(265, 706, 139, 2, 'Transportasi'),
(266, 707, 139, 2, 'Listrik'),
(267, 708, 139, 2, 'PDAM'),
(268, 709, 139, 2, 'Pulsa'),
(269, 710, 139, 2, 'Gaji Karyawan'),
(270, 711, 139, 2, 'Belanja Umum'),
(271, 712, 140, 1, 'Hasil Usaha'),
(272, 713, 140, 1, 'Gaji'),
(273, 714, 140, 1, 'Bonus'),
(274, 715, 140, 2, 'Makan'),
(275, 716, 140, 2, 'Transportasi'),
(276, 717, 140, 2, 'Listrik'),
(277, 718, 140, 2, 'PDAM'),
(278, 719, 140, 2, 'Pulsa'),
(279, 720, 140, 2, 'Gaji Karyawan'),
(280, 721, 140, 2, 'Belanja Umum'),
(281, 722, 141, 1, 'Hasil Usaha'),
(282, 723, 141, 1, 'Gaji'),
(283, 724, 141, 1, 'Bonus'),
(284, 725, 141, 2, 'Makan'),
(285, 726, 141, 2, 'Transportasi'),
(286, 727, 141, 2, 'Listrik'),
(287, 728, 141, 2, 'PDAM'),
(288, 729, 141, 2, 'Pulsa'),
(289, 730, 141, 2, 'Gaji Karyawan'),
(290, 731, 141, 2, 'Belanja Umum'),
(291, 732, 142, 1, 'Hasil Usaha'),
(292, 733, 142, 1, 'Gaji'),
(293, 734, 142, 1, 'Bonus'),
(294, 735, 142, 2, 'Makan'),
(295, 736, 142, 2, 'Transportasi'),
(296, 737, 142, 2, 'Listrik'),
(297, 738, 142, 2, 'PDAM'),
(298, 739, 142, 2, 'Pulsa'),
(299, 740, 142, 2, 'Gaji Karyawan'),
(300, 741, 142, 2, 'Belanja Umum'),
(301, 742, 143, 1, 'Hasil Usaha'),
(302, 743, 143, 1, 'Gaji'),
(303, 744, 143, 1, 'Bonus'),
(304, 745, 143, 2, 'Makan'),
(305, 746, 143, 2, 'Transportasi'),
(306, 747, 143, 2, 'Listrik'),
(307, 748, 143, 2, 'PDAM'),
(308, 749, 143, 2, 'Pulsa'),
(309, 750, 143, 2, 'Gaji Karyawan'),
(310, 751, 143, 2, 'Belanja Umum'),
(311, 752, 144, 1, 'Hasil Usaha'),
(312, 753, 144, 1, 'Gaji'),
(313, 754, 144, 1, 'Bonus'),
(314, 755, 144, 2, 'Makan'),
(315, 756, 144, 2, 'Transportasi'),
(316, 757, 144, 2, 'Listrik'),
(317, 758, 144, 2, 'PDAM'),
(318, 759, 144, 2, 'Pulsa'),
(319, 760, 144, 2, 'Gaji Karyawan'),
(320, 761, 144, 2, 'Belanja Umum'),
(321, 762, 145, 1, 'Hasil Usaha'),
(322, 763, 145, 1, 'Gaji'),
(323, 764, 145, 1, 'Bonus'),
(324, 765, 145, 2, 'Makan'),
(325, 766, 145, 2, 'Transportasi'),
(326, 767, 145, 2, 'Listrik'),
(327, 768, 145, 2, 'PDAM'),
(328, 769, 145, 2, 'Pulsa'),
(329, 770, 145, 2, 'Gaji Karyawan'),
(330, 771, 145, 2, 'Belanja Umum'),
(331, 772, 146, 1, 'Hasil Usaha'),
(332, 773, 146, 1, 'Gaji'),
(333, 774, 146, 1, 'Bonus'),
(334, 775, 146, 2, 'Makan'),
(335, 776, 146, 2, 'Transportasi'),
(336, 777, 146, 2, 'Listrik'),
(337, 778, 146, 2, 'PDAM'),
(338, 779, 146, 2, 'Pulsa'),
(339, 780, 146, 2, 'Gaji Karyawan'),
(340, 781, 146, 2, 'Belanja Umum'),
(341, 782, 147, 1, 'Hasil Usaha'),
(342, 783, 147, 1, 'Gaji'),
(343, 784, 147, 1, 'Bonus'),
(344, 785, 147, 2, 'Makan'),
(345, 786, 147, 2, 'Transportasi'),
(346, 787, 147, 2, 'Listrik'),
(347, 788, 147, 2, 'PDAM'),
(348, 789, 147, 2, 'Pulsa'),
(349, 790, 147, 2, 'Gaji Karyawan'),
(350, 791, 147, 2, 'Belanja Umum'),
(351, 792, 148, 1, 'Hasil Usaha'),
(352, 793, 148, 1, 'Gaji'),
(353, 794, 148, 1, 'Bonus'),
(354, 795, 148, 2, 'Makan'),
(355, 796, 148, 2, 'Transportasi'),
(356, 797, 148, 2, 'Listrik'),
(357, 798, 148, 2, 'PDAM'),
(358, 799, 148, 2, 'Pulsa'),
(359, 800, 148, 2, 'Gaji Karyawan'),
(360, 801, 148, 2, 'Belanja Umum'),
(361, 802, 149, 1, 'Hasil Usaha'),
(362, 803, 149, 1, 'Gaji'),
(363, 804, 149, 1, 'Bonus'),
(364, 805, 149, 2, 'Makan'),
(365, 806, 149, 2, 'Transportasi'),
(366, 807, 149, 2, 'Listrik'),
(367, 808, 149, 2, 'PDAM'),
(368, 809, 149, 2, 'Pulsa'),
(369, 810, 149, 2, 'Gaji Karyawan'),
(370, 811, 149, 2, 'Belanja Umum'),
(371, 812, 150, 1, 'Hasil Usaha'),
(372, 813, 150, 1, 'Gaji'),
(373, 814, 150, 1, 'Bonus'),
(374, 815, 150, 2, 'Makan'),
(375, 816, 150, 2, 'Transportasi'),
(376, 817, 150, 2, 'Listrik'),
(377, 818, 150, 2, 'PDAM'),
(378, 819, 150, 2, 'Pulsa'),
(379, 820, 150, 2, 'Gaji Karyawan'),
(380, 821, 150, 2, 'Belanja Umum'),
(381, 822, 151, 1, 'Hasil Usaha'),
(382, 823, 151, 1, 'Gaji'),
(383, 824, 151, 1, 'Bonus'),
(384, 825, 151, 2, 'Makan'),
(385, 826, 151, 2, 'Transportasi'),
(386, 827, 151, 2, 'Listrik'),
(387, 828, 151, 2, 'PDAM'),
(388, 829, 151, 2, 'Pulsa'),
(389, 830, 151, 2, 'Gaji Karyawan'),
(390, 831, 151, 2, 'Belanja Umum'),
(391, 832, 152, 1, 'Hasil Usaha'),
(392, 833, 152, 1, 'Gaji'),
(393, 834, 152, 1, 'Bonus'),
(394, 835, 152, 2, 'Makan'),
(395, 836, 152, 2, 'Transportasi'),
(396, 837, 152, 2, 'Listrik'),
(397, 838, 152, 2, 'PDAM'),
(398, 839, 152, 2, 'Pulsa'),
(399, 840, 152, 2, 'Gaji Karyawan'),
(400, 841, 152, 2, 'Belanja Umum'),
(401, 842, 153, 1, 'Hasil Usaha'),
(402, 843, 153, 1, 'Gaji'),
(403, 844, 153, 1, 'Bonus'),
(404, 845, 153, 2, 'Makan'),
(405, 846, 153, 2, 'Transportasi'),
(406, 847, 153, 2, 'Listrik'),
(407, 848, 153, 2, 'PDAM'),
(408, 849, 153, 2, 'Pulsa'),
(409, 850, 153, 2, 'Gaji Karyawan'),
(410, 851, 153, 2, 'Belanja Umum'),
(411, 852, 154, 1, 'Hasil Usaha'),
(412, 853, 154, 1, 'Gaji'),
(413, 854, 154, 1, 'Bonus'),
(414, 855, 154, 2, 'Makan'),
(415, 856, 154, 2, 'Transportasi'),
(416, 857, 154, 2, 'Listrik'),
(417, 858, 154, 2, 'PDAM'),
(418, 859, 154, 2, 'Pulsa'),
(419, 860, 154, 2, 'Gaji Karyawan'),
(420, 861, 154, 2, 'Belanja Umum'),
(421, 862, 155, 1, 'Hasil Usaha'),
(422, 863, 155, 1, 'Gaji'),
(423, 864, 155, 1, 'Bonus'),
(424, 865, 155, 2, 'Makan'),
(425, 866, 155, 2, 'Transportasi'),
(426, 867, 155, 2, 'Listrik'),
(427, 868, 155, 2, 'PDAM'),
(428, 869, 155, 2, 'Pulsa'),
(429, 870, 155, 2, 'Gaji Karyawan'),
(430, 871, 155, 2, 'Belanja Umum'),
(431, 872, 155, 1, 'Lemburan'),
(432, 873, 156, 1, 'Hasil Usaha'),
(433, 874, 156, 1, 'Gaji'),
(434, 875, 156, 1, 'Bonus'),
(435, 876, 156, 2, 'Makan'),
(436, 877, 156, 2, 'Transportasi'),
(437, 878, 156, 2, 'Listrik'),
(438, 879, 156, 2, 'PDAM'),
(439, 880, 156, 2, 'Pulsa'),
(440, 881, 156, 2, 'Gaji Karyawan'),
(441, 882, 156, 2, 'Belanja Umum'),
(442, 1, 157, 1, 'Hasil Usaha'),
(443, 2, 157, 1, 'Gaji'),
(444, 3, 157, 1, 'Bonus'),
(445, 4, 157, 2, 'Makan'),
(446, 5, 157, 2, 'Transportasi'),
(447, 6, 157, 2, 'Listrik'),
(448, 7, 157, 2, 'PDAM'),
(449, 8, 157, 2, 'Pulsa'),
(450, 9, 157, 2, 'Gaji Karyawan'),
(451, 10, 157, 2, 'Belanja Umum'),
(452, 1, 158, 1, 'Hasil Usaha'),
(453, 2, 158, 1, 'Gaji'),
(454, 3, 158, 1, 'Bonus'),
(455, 4, 158, 2, 'Makan'),
(456, 5, 158, 2, 'Transportasi'),
(457, 6, 158, 2, 'Listrik'),
(458, 7, 158, 2, 'PDAM'),
(459, 8, 158, 2, 'Pulsa'),
(460, 9, 158, 2, 'Gaji Karyawan'),
(461, 10, 158, 2, 'Belanja Umum'),
(462, 1, 159, 1, 'Hasil Usaha'),
(463, 2, 159, 1, 'Gaji'),
(464, 3, 159, 1, 'Bonus'),
(465, 4, 159, 2, 'Makan'),
(466, 5, 159, 2, 'Transportasi'),
(467, 6, 159, 2, 'Listrik'),
(468, 7, 159, 2, 'PDAM'),
(469, 8, 159, 2, 'Pulsa'),
(470, 9, 159, 2, 'Gaji Karyawan'),
(471, 10, 159, 2, 'Belanja Umum'),
(472, 1, 160, 1, 'Hasil Usaha'),
(473, 2, 160, 1, 'Gaji'),
(474, 3, 160, 1, 'Bonus'),
(475, 4, 160, 2, 'Makan'),
(476, 5, 160, 2, 'Transportasi'),
(477, 6, 160, 2, 'Listrik'),
(478, 7, 160, 2, 'PDAM'),
(479, 8, 160, 2, 'Pulsa'),
(480, 9, 160, 2, 'Gaji Karyawan'),
(481, 10, 160, 2, 'Belanja Umum'),
(482, 1, 161, 1, 'Hasil Usaha'),
(483, 2, 161, 1, 'Gaji'),
(484, 3, 161, 1, 'Bonus'),
(485, 4, 161, 2, 'Makan'),
(486, 5, 161, 2, 'Transportasi'),
(487, 6, 161, 2, 'Listrik'),
(488, 7, 161, 2, 'PDAM'),
(489, 8, 161, 2, 'Pulsa'),
(490, 9, 161, 2, 'Gaji Karyawan'),
(491, 10, 161, 2, 'Belanja Umum'),
(492, 1, 162, 1, 'Hasil Usaha'),
(493, 2, 162, 1, 'Gaji'),
(494, 3, 162, 1, 'Bonus'),
(495, 4, 162, 2, 'Makan'),
(496, 5, 162, 2, 'Transportasi'),
(497, 6, 162, 2, 'Listrik'),
(498, 7, 162, 2, 'PDAM'),
(499, 8, 162, 2, 'Pulsa'),
(500, 9, 162, 2, 'Gaji Karyawan'),
(501, 10, 162, 2, 'Belanja Umum'),
(502, 1, 163, 1, 'Hasil Usaha'),
(503, 2, 163, 1, 'Gaji'),
(504, 3, 163, 1, 'Bonus'),
(505, 4, 163, 2, 'Makan'),
(506, 5, 163, 2, 'Transportasi'),
(507, 6, 163, 2, 'Listrik'),
(508, 7, 163, 2, 'PDAM'),
(509, 8, 163, 2, 'Pulsa'),
(510, 9, 163, 2, 'Gaji Karyawan'),
(511, 10, 163, 2, 'Belanja Umum'),
(512, 1, 164, 1, 'Hasil Usaha'),
(513, 2, 164, 1, 'Gaji'),
(514, 3, 164, 1, 'Bonus'),
(515, 4, 164, 2, 'Makan'),
(516, 5, 164, 2, 'Transportasi'),
(517, 6, 164, 2, 'Listrik'),
(518, 7, 164, 2, 'PDAM'),
(519, 8, 164, 2, 'Pulsa'),
(520, 9, 164, 2, 'Gaji Karyawan'),
(521, 10, 164, 2, 'Belanja Umum'),
(522, 1, 165, 1, 'Hasil Usaha'),
(523, 2, 165, 1, 'Gaji'),
(524, 3, 165, 1, 'Bonus'),
(525, 4, 165, 2, 'Makan'),
(526, 5, 165, 2, 'Transportasi'),
(527, 6, 165, 2, 'Listrik'),
(528, 7, 165, 2, 'PDAM'),
(529, 8, 165, 2, 'Pulsa'),
(530, 9, 165, 2, 'Gaji Karyawan'),
(531, 10, 165, 2, 'Belanja Umum'),
(532, 1, 166, 1, 'Hasil Usaha'),
(533, 2, 166, 1, 'Gaji'),
(534, 3, 166, 1, 'Bonus'),
(535, 4, 166, 2, 'Makan'),
(536, 5, 166, 2, 'Transportasi'),
(537, 6, 166, 2, 'Listrik'),
(538, 7, 166, 2, 'PDAM'),
(539, 8, 166, 2, 'Pulsa'),
(540, 9, 166, 2, 'Gaji Karyawan'),
(541, 10, 166, 2, 'Belanja Umum'),
(542, 1, 167, 1, 'Hasil Usaha'),
(543, 2, 167, 1, 'Gaji'),
(544, 3, 167, 1, 'Bonus'),
(545, 4, 167, 2, 'Makan'),
(546, 5, 167, 2, 'Transportasi'),
(547, 6, 167, 2, 'Listrik'),
(548, 7, 167, 2, 'PDAM'),
(549, 8, 167, 2, 'Pulsa'),
(550, 9, 167, 2, 'Gaji Karyawan'),
(551, 10, 167, 2, 'Belanja Umum'),
(552, 1, 168, 1, 'Hasil Usaha'),
(553, 2, 168, 1, 'Gaji'),
(554, 3, 168, 1, 'Bonus'),
(555, 4, 168, 2, 'Makan'),
(556, 5, 168, 2, 'Transportasi'),
(557, 6, 168, 2, 'Listrik'),
(558, 7, 168, 2, 'PDAM'),
(559, 8, 168, 2, 'Pulsa'),
(560, 9, 168, 2, 'Gaji Karyawan'),
(561, 10, 168, 2, 'Belanja Umum'),
(562, 1, 169, 1, 'Hasil Usaha'),
(563, 2, 169, 1, 'Gaji'),
(564, 3, 169, 1, 'Bonus'),
(565, 4, 169, 2, 'Makan'),
(566, 5, 169, 2, 'Transportasi'),
(567, 6, 169, 2, 'Listrik'),
(568, 7, 169, 2, 'PDAM'),
(569, 8, 169, 2, 'Pulsa'),
(570, 9, 169, 2, 'Gaji Karyawan'),
(571, 10, 169, 2, 'Belanja Umum'),
(572, 1, 170, 1, 'Hasil Usaha'),
(573, 2, 170, 1, 'Gaji'),
(574, 3, 170, 1, 'Bonus'),
(575, 4, 170, 2, 'Makan'),
(576, 5, 170, 2, 'Transportasi'),
(577, 6, 170, 2, 'Listrik'),
(578, 7, 170, 2, 'PDAM'),
(579, 8, 170, 2, 'Pulsa'),
(580, 9, 170, 2, 'Gaji Karyawan'),
(581, 10, 170, 2, 'Belanja Umum'),
(582, 1, 171, 1, 'Hasil Usaha'),
(583, 2, 171, 1, 'Gaji'),
(584, 3, 171, 1, 'Bonus'),
(585, 4, 171, 2, 'Makan'),
(586, 5, 171, 2, 'Transportasi'),
(587, 6, 171, 2, 'Listrik'),
(588, 7, 171, 2, 'PDAM'),
(589, 8, 171, 2, 'Pulsa'),
(590, 9, 171, 2, 'Gaji Karyawan'),
(591, 10, 171, 2, 'Belanja Umum'),
(592, 1, 172, 1, 'Hasil Usaha'),
(593, 2, 172, 1, 'Gaji'),
(594, 3, 172, 1, 'Bonus'),
(595, 4, 172, 2, 'Makan'),
(596, 5, 172, 2, 'Transportasi'),
(597, 6, 172, 2, 'Listrik'),
(598, 7, 172, 2, 'PDAM'),
(599, 8, 172, 2, 'Pulsa'),
(600, 9, 172, 2, 'Gaji Karyawan'),
(601, 10, 172, 2, 'Belanja Umum'),
(602, 1, 173, 1, 'Hasil Usaha'),
(603, 2, 173, 1, 'Gaji'),
(604, 3, 173, 1, 'Bonus'),
(605, 4, 173, 2, 'Makan'),
(606, 5, 173, 2, 'Transportasi'),
(607, 6, 173, 2, 'Listrik'),
(608, 7, 173, 2, 'PDAM'),
(609, 8, 173, 2, 'Pulsa'),
(610, 9, 173, 2, 'Gaji Karyawan'),
(611, 10, 173, 2, 'Belanja Umum'),
(612, 1, 174, 1, 'Hasil Usaha'),
(613, 2, 174, 1, 'Gaji'),
(614, 3, 174, 1, 'Bonus'),
(615, 4, 174, 2, 'Makan'),
(616, 5, 174, 2, 'Transportasi'),
(617, 6, 174, 2, 'Listrik'),
(618, 7, 174, 2, 'PDAM'),
(619, 8, 174, 2, 'Pulsa'),
(620, 9, 174, 2, 'Gaji Karyawan'),
(621, 10, 174, 2, 'Belanja Umum'),
(622, 1, 175, 1, 'Hasil Usaha'),
(623, 2, 175, 1, 'Gaji'),
(624, 3, 175, 1, 'Bonus'),
(625, 4, 175, 2, 'Makan'),
(626, 5, 175, 2, 'Transportasi'),
(627, 6, 175, 2, 'Listrik'),
(628, 7, 175, 2, 'PDAM'),
(629, 8, 175, 2, 'Pulsa'),
(630, 9, 175, 2, 'Gaji Karyawan'),
(631, 10, 175, 2, 'Belanja Umum'),
(632, 1, 176, 1, 'Hasil Usaha'),
(633, 2, 176, 1, 'Gaji'),
(634, 3, 176, 1, 'Bonus'),
(635, 4, 176, 2, 'Makan'),
(636, 5, 176, 2, 'Transportasi'),
(637, 6, 176, 2, 'Listrik'),
(638, 7, 176, 2, 'PDAM'),
(639, 8, 176, 2, 'Pulsa'),
(640, 9, 176, 2, 'Gaji Karyawan'),
(641, 10, 176, 2, 'Belanja Umum'),
(642, 1, 0, 1, 'Hasil Usaha'),
(643, 2, 0, 1, 'Gaji'),
(644, 3, 0, 1, 'Bonus'),
(645, 4, 0, 2, 'Makan'),
(646, 5, 0, 2, 'Transportasi'),
(647, 6, 0, 2, 'Listrik'),
(648, 7, 0, 2, 'PDAM'),
(649, 8, 0, 2, 'Pulsa'),
(650, 9, 0, 2, 'Gaji Karyawan'),
(651, 10, 0, 2, 'Belanja Umum'),
(652, 1, 181, 1, 'Hasil Usaha'),
(653, 2, 181, 1, 'Gaji'),
(654, 3, 181, 1, 'Bonus'),
(655, 4, 181, 2, 'Makan'),
(656, 5, 181, 2, 'Transportasi'),
(657, 6, 181, 2, 'Listrik'),
(658, 7, 181, 2, 'PDAM'),
(659, 8, 181, 2, 'Pulsa'),
(660, 9, 181, 2, 'Gaji Karyawan'),
(661, 10, 181, 2, 'Belanja Umum'),
(662, 1, 182, 1, 'Hasil Usaha'),
(663, 2, 182, 1, 'Gaji'),
(664, 3, 182, 1, 'Bonus'),
(665, 4, 182, 2, 'Makan'),
(666, 5, 182, 2, 'Transportasi'),
(667, 6, 182, 2, 'Listrik'),
(668, 7, 182, 2, 'PDAM'),
(669, 8, 182, 2, 'Pulsa'),
(670, 9, 182, 2, 'Gaji Karyawan'),
(671, 10, 182, 2, 'Belanja Umum');

-- --------------------------------------------------------

--
-- Table structure for table `arus_kas`
--

CREATE TABLE IF NOT EXISTS `arus_kas` (
  `id_arus_kas` int(11) NOT NULL,
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `id_kas` int(11) DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arus_kas`
--

INSERT INTO `arus_kas` (`id_arus_kas`, `id`, `id_toko`, `tgl`, `id_kas`, `id_akun`, `nominal`, `ket`) VALUES
(2, 7, 158, '21-09-2018', 2, 4, 150000, 'makan'),
(3, 10, 158, '06-03-2024', 1, 2, 100000, 'aadadd');

-- --------------------------------------------------------

--
-- Table structure for table `beban`
--

CREATE TABLE IF NOT EXISTS `beban` (
`id_beban` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `input_by` int(11) NOT NULL,
  `bulan` varchar(10) DEFAULT NULL,
  `nama` varchar(220) DEFAULT NULL,
  `hari_aktif` varchar(80) DEFAULT NULL,
  `lembur` int(11) DEFAULT NULL,
  `target` int(11) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `nominal_lembur` double DEFAULT NULL,
  `nominal_target` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `beban`
--

INSERT INTO `beban` (`id_beban`, `id_toko`, `id_users`, `input_by`, `bulan`, `nama`, `hari_aktif`, `lembur`, `target`, `nominal`, `nominal_lembur`, `nominal_target`) VALUES
(23, 158, NULL, 0, '03-2024', 'Kontrakan RUKO', '30', NULL, NULL, 30000000, 0, 0),
(24, 158, 5, 2, '03-2024', NULL, '12', 2, 1, 1200000, 200000, 100000),
(25, 158, 3, 1, '03-2024', NULL, '20', 12, 3, 3000000, 120000, 35000),
(26, 158, 7, 6, '03-2024', NULL, '12', 2, 3, 1111, 222, 333);

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE IF NOT EXISTS `bulan` (
`id` int(11) NOT NULL,
  `bulan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'JANUARI'),
(2, 'FEBRUARI'),
(3, 'MARET'),
(4, 'APRIL'),
(5, 'MEI'),
(6, 'JUNI'),
(7, 'JULI'),
(8, 'AGUSTUS'),
(9, 'SEPTEMBER'),
(10, 'OKTOBER'),
(11, 'NOVEMBER'),
(12, 'DESEMBER');

-- --------------------------------------------------------

--
-- Table structure for table `cabang`
--

CREATE TABLE IF NOT EXISTS `cabang` (
  `id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang`
--

INSERT INTO `cabang` (`id`, `id_toko`, `nama`, `jenis`) VALUES
(1, 158, '', 'pusat'),
(2, 158, 'CABANG 1', 'outlet'),
(3, 158, 'CABANG 2', 'outlet'),
(4, 158, 'CABANG 3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_server`
--

CREATE TABLE IF NOT EXISTS `client_server` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama_client` varchar(30) DEFAULT NULL,
  `printer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dapur`
--

CREATE TABLE IF NOT EXISTS `dapur` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nm_dapur` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dapur`
--

INSERT INTO `dapur` (`id`, `id_toko`, `nm_dapur`) VALUES
(2, 23, 'Dapur 1'),
(3, 50, 'Dapur 1'),
(4, 54, 'Dapur 1'),
(5, 67, 'Dapur 1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_meja`
--

CREATE TABLE IF NOT EXISTS `detail_meja` (
`id` int(11) NOT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_orders` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_mekanik`
--

CREATE TABLE IF NOT EXISTS `detail_mekanik` (
`id` int(11) NOT NULL,
  `id_toko` int(10) DEFAULT NULL,
  `id_orders` int(10) DEFAULT NULL,
  `id_mekanik` int(10) DEFAULT NULL,
  `plat` varchar(20) DEFAULT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_mobile`
--

CREATE TABLE IF NOT EXISTS `email_mobile` (
`id` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `perangkat` varchar(100) DEFAULT NULL,
  `last_sync` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_mobile`
--

INSERT INTO `email_mobile` (`id`, `email`, `perangkat`, `last_sync`) VALUES
(1, '', '23 / calypso / calypso appcrawler / calypso', '10-06-2018 01:11:45'),
(2, NULL, NULL, '27-01-2018 13:55:55'),
(3, 'diengcyberwsb@gmail.com', '19 / armani / hm 1s / armani', '08-05-2018 17:13:51'),
(4, 'hisamusama@gmail.com', '17 / oppo72_14079 / r831k / oppo72_14079', '18-03-2018 11:00:04'),
(5, 'ahmadlazim97@gmail.com', '24 / h1 / lg-h830 / h1_global_com', '22-04-2018 08:17:16'),
(6, 'alfianuraisya@gmail.com', '24 / advan_5060 / 5060 / 5060', '16-03-2018 18:25:30'),
(7, 'alvlaz.ss@gmail.com', '24 / hero2lte / sm-g935f / hero2ltexx', '19-05-2018 19:44:49'),
(8, 'elviansalavin@gmail.com', '25 / rolex / redmi 4a / rolex', '28-04-2018 16:35:47'),
(9, 'cv.munifputra@gmail.com', '23 / land / redmi 3x / land', '15-03-2018 16:13:24'),
(10, 'agung.matematika@gmail.com', '24 / on7xelte / sm-g610f / on7xeltedd', '17-03-2018 20:15:43'),
(11, 'aqellaabi@yahoo.com', '22 / a1601 / a1601 / a1601', '16-03-2018 11:10:48'),
(12, 'lutfifatofani@gmail.com', '19 / f01f / f-01f / f01f', '16-03-2018 12:57:51'),
(13, 'nurjanahs081@gmail.com', '23 / santoni / redmi 4x / santoni', '11-04-2018 16:48:33'),
(14, 'raifalraifalhaq007@gmail.com', '22 / a37f / a37f / a37f', '16-03-2018 20:41:06'),
(15, 'trenaseegmiller-linkedin@gmail.com', '23 / bullhead / nexus 5x / bullhead', '17-03-2018 10:01:23'),
(16, 'ajiengineering07@gmail.com', '23 / 1606 / vivo 1606 / 1606', '21-03-2018 20:26:29'),
(17, 'aqilarois@gmail.com', '24 / j7y17lte / sm-j730g / j7y17ltedx', '21-03-2018 17:22:55'),
(18, 'epikrosianapangesti1996@gmail.com', '23 / rolex / redmi 4a / rolex', '17-03-2018 21:24:44'),
(19, 'happyhousedigitalphotography@gmail.com', '23 / cph1701 / cph1701 / cph1701', '18-03-2018 13:51:17'),
(20, 'atiks.giyarti@gmail.com', '25 / rolex / redmi 4a / rolex', '18-03-2018 09:06:44'),
(21, 'aprilia.nkurnia349@yahoo.com', '22 / grandprimeve3g / sm-g531h / grandprimeve3gxx', '18-03-2018 09:52:10'),
(22, 'ayu081391@gmail.com', '23 / 1606 / vivo 1606 / 1606', '18-03-2018 22:46:29'),
(23, 'teranois3131@gmail.com', '19 / vivalto3gvn / sm-g313hz / vivalto3gvndx', '19-03-2018 09:30:26'),
(24, 'bonavista.zld@gmail.com', '16 / mint / gt-s5282 / mintxx', '19-03-2018 19:04:18'),
(25, 'vinniarlita352@gmail.com', '19 / 1201 / 1201 / 1201', '19-03-2018 14:55:43'),
(26, 'ika34331@gmail.com', '22 / a37f / a37f / a37f', '21-03-2018 20:11:35'),
(27, 'mhtal1000@yahoo.com', '25 / santoni / redmi 4x / santoni', '21-03-2018 21:15:57'),
(28, 'inyexxsaey15681@gmail.com', '23 / santoni / redmi 4x / santoni', '21-03-2018 21:30:16'),
(29, 'thoriqyahya9@gmail.com', '23 / land / redmi 3s / land', '30-04-2018 21:14:06'),
(30, 'yuniar_ndut@yahoo.com', '25 / 1718 / vivo 1718 / 1718', '27-03-2018 13:51:54'),
(31, 'lismanto.armada@gmail.com', '22 / a1601 / a1601 / a1601', '31-03-2018 04:58:06'),
(32, 'innapramulia@gmail.com', '21 / gt5note8lte / sm-p355 / gt5note8ltexx', '20-05-2018 17:21:12'),
(33, 'ichaquenby@gmail.com', '22 / x9009 / x9009 / x9009', '02-04-2018 14:41:27'),
(34, 'home_sweet_tanos@yahoo.co.id', '19 / kanas / sm-g355h / kanas3gxx', '03-04-2018 09:37:13'),
(35, 'supratono1401@gmail.com', '23 / cph1609 / cph1609 / cph1609', '16-04-2018 23:29:06'),
(36, 'randhi.kirimemail@gmail.com', '24 / mido / redmi note 4 / mido', '25-04-2018 22:17:42'),
(37, 'tenmilyards@gmail.com', '21 / asus_z011 / asus_z011dd / ww_z011', '18-04-2018 17:13:11'),
(38, 'shalandashimmin-linkedin@gmail.com', '23 / bullhead / nexus 5x / bullhead', '22-04-2018 15:12:21'),
(39, 'sofanjunianto@gmail.com', '21 / z00a_1 / asus_z00ad / ww_z00a', '24-04-2018 11:30:24'),
(40, 'banguntriadhi@gmail.com', '23 / cancro / mi 4w / cancro_wc_lte', '30-04-2018 16:19:59'),
(41, 'desta.hatmoko83@gmail.com', '23 / b26d2h / andromax b26d2h / b26d2h', '27-04-2018 23:29:27'),
(42, 'vie.bintar@yahoo.com', '22 / j2lte / sm-j200g / j2ltedd', '11-05-2018 20:24:40'),
(43, 'htvonlinesoftware@gmail.com', '22 / me1ds / lg-k130 / me1ds_global_com', '30-04-2018 12:52:36'),
(44, 'karynburriss-linkedin@gmail.com', '23 / bullhead / nexus 5x / bullhead', '30-04-2018 13:42:45'),
(45, 'alfhagemilang@gmail.com', '26 / dreamlte / sm-g950f / dreamltexx', '02-05-2018 12:51:47'),
(46, 'wonosobozone@gmail.com', '23 / rolex / redmi 4a / rolex', '02-05-2018 13:13:47'),
(47, 'suroyo-28@windowslive.com', '22 / j1acevelte / sm-j111f / j1aceveltejv', '07-05-2018 09:23:15'),
(48, 'bantengnusantara@gmail.com', '24 / zeroflte / sm-g920f / zerofltexx', '06-05-2018 03:15:23'),
(49, 'bdi.hartono@gmail.com', '24 / 1714 / vivo 1714 / 1714', '18-05-2018 21:18:04'),
(50, 'bokier100582@gmail.com', '10 / gt-s5830 / gt-s5830 / gt-s5830', '19-05-2018 08:42:52'),
(51, 'sayahakamaulana@gmail.com', '22 / hwscl-q / huawei scl-l21 / scl-l21', '20-05-2018 18:30:17'),
(52, 'phoenixvanhallen@gmail.com', '24 / mido / redmi note 4 / mido', '22-05-2018 19:00:46'),
(53, 'liendawatyv@gmail.com', '23 / cph1613 / cph1613 / cph1613', '24-05-2018 17:16:25'),
(54, 'amir1016md@gmail.com', '22 / a37f / a37f / a37f', '26-05-2018 21:41:12'),
(55, 'ppssembung18@gmail.com', '24 / mido / redmi note 4 / mido', '27-05-2018 17:33:02'),
(56, 'rizaldi.omp@gmail.com', '27 / 1727id / vivo 1727 / 1727id', '27-05-2018 21:47:31'),
(57, 'lgdarmawan@yahoo.co.id', '25 / cph1723 / cph1723 / cph1723', '17-06-2018 10:35:08'),
(58, 'temekaogilvie-linkedin@gmail.com', '23 / bullhead / nexus 5x / bullhead', '29-05-2018 10:49:46'),
(59, 'andrips77@gmail.com', '25 / jason / mi note 3 / jason', '05-06-2018 09:40:02'),
(60, 'hacker.kudou0@gmail.com', '25 / riva / redmi 5a / riva', '08-06-2018 20:06:18'),
(61, 'abraham.edward11406@gmail.com', '25 / cph1723 / cph1723 / cph1723', '14-06-2018 13:29:04'),
(62, 'cutkaty4@gmail.com', '25 / santoni / redmi 4x / santoni', '23-06-2018 17:25:49'),
(63, 'rogergramling-linkedin@gmail.com', '23 / bullhead / nexus 5x / bullhead', '28-06-2018 00:46:26');

-- --------------------------------------------------------

--
-- Table structure for table `expedisi`
--

CREATE TABLE IF NOT EXISTS `expedisi` (
`id` int(11) NOT NULL,
  `nama_expedisi` varchar(30) NOT NULL,
  `kode_warna` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expedisi`
--

INSERT INTO `expedisi` (`id`, `nama_expedisi`, `kode_warna`) VALUES
(1, 'JNE', 'blue'),
(2, 'TIKI', 'green'),
(3, 'JNT', 'red'),
(4, 'POS', 'white');

-- --------------------------------------------------------

--
-- Table structure for table `faktur_retail`
--

CREATE TABLE IF NOT EXISTS `faktur_retail` (
`id` int(11) NOT NULL,
  `id_faktur` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `dp` double NOT NULL,
  `total` double NOT NULL,
  `ppn_nominal` double NOT NULL,
  `total_ppn` double NOT NULL,
  `deadline` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `pembayaran` int(3) NOT NULL,
  `mig` int(11) NOT NULL,
  `type` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `id_bank` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faktur_retail2`
--

CREATE TABLE IF NOT EXISTS `faktur_retail2` (
`id` int(11) NOT NULL,
  `id_faktur` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `no_faktur` varchar(50) DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `dp` varchar(50) DEFAULT NULL,
  `deadline` varchar(20) DEFAULT NULL,
  `pembayaran` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `format_nota`
--

CREATE TABLE IF NOT EXISTS `format_nota` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `format` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `format_nota`
--

INSERT INTO `format_nota` (`id`, `id_toko`, `id_users`, `format`) VALUES
(1, 161, 1, 'praktis2'),
(2, 158, 1, 'praktis2'),
(3, 158, 2, 'praktis2');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_detail_temp`
--

CREATE TABLE IF NOT EXISTS `gaji_detail_temp` (
`id` int(11) NOT NULL,
  `id_gaji_temp` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama_pegawai` varchar(255) DEFAULT NULL,
  `jam_kerja` text,
  `total_jam` int(11) DEFAULT NULL,
  `total_lembur` int(11) DEFAULT NULL,
  `gaji` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_detail_temp`
--

INSERT INTO `gaji_detail_temp` (`id`, `id_gaji_temp`, `id_users`, `nama_pegawai`, `jam_kerja`, `total_jam`, `total_lembur`, `gaji`, `keterangan`) VALUES
(1, 1, 6, 'lestari', '(8)', 8, 0, 64000, ''),
(2, 1, 7, 'sinur', '(8)', 8, 0, 64000, ''),
(3, 1, 8, 'sisur', '(8)', 8, 2, 76000, ''),
(4, 1, 9, 'fatimah', '(8)', 8, 0, 64000, ''),
(5, 1, 10, 'siti komariyah', '(8)', 8, 0, 64000, ''),
(6, 1, 11, 'mustika', '(8)', 8, 0, 64000, ''),
(7, 1, 12, 'kustiyah', '(8)', 8, 0, 64000, ''),
(8, 1, 13, 'sri haryati', '(10)', 10, 2, 92000, ''),
(9, 1, 14, 'agus purnomo', '(8)', 8, 0, 64000, ''),
(10, 1, 15, 'leni', '(8)', 8, 0, 64000, ''),
(11, 1, 16, 'koyi', '(8)', 8, 0, 64000, ''),
(12, 1, 17, 'sihom', '(8)', 8, 0, 64000, ''),
(13, 1, 18, 'fa''i', '(8)', 8, 0, 64000, ''),
(14, 1, 19, 'darus', '(8)', 8, 0, 64000, ''),
(15, 1, 20, 'srihatun', '(8)', 8, 0, 64000, ''),
(16, 1, 21, 'rinawati', '(8)', 8, 0, 64000, ''),
(17, 1, 22, 'santi', '(8)', 8, 0, 64000, ''),
(18, 1, 23, 'imbuh', '(8)', 8, 0, 64000, ''),
(19, 1, 0, '', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `gaji_temp`
--

CREATE TABLE IF NOT EXISTS `gaji_temp` (
`id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `dari` varchar(20) DEFAULT NULL,
  `sampai` varchar(20) DEFAULT NULL,
  `gaji_perjam` varchar(10) DEFAULT NULL,
  `jam_lembur` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gaji_temp`
--

INSERT INTO `gaji_temp` (`id`, `judul`, `dari`, `sampai`, `gaji_perjam`, `jam_lembur`) VALUES
(1, '', '20-08-2019', '20-08-2019', '8000', '6000');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `group_cs`
--

CREATE TABLE IF NOT EXISTS `group_cs` (
`id` int(11) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  `id_advertiser` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_cs`
--

INSERT INTO `group_cs` (`id`, `group`, `id_advertiser`) VALUES
(2, 'TANGGUH HERBASKIN', 79),
(3, 'INDICA HERBASKIN', 80),
(5, 'WAHID GRACILI', 78),
(7, 'WAHID HERBASKIN', 78),
(8, 'INDICA GRACILI', 80),
(9, 'TANGGUH GRACILI', 79),
(11, 'Diah Herbaskin', 1485);

--
-- Triggers `group_cs`
--
DELIMITER //
CREATE TRIGGER `delete_detail` AFTER DELETE ON `group_cs`
 FOR EACH ROW BEGIN
DELETE FROM group_cs_detail WHERE id_group = OLD.id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `group_cs_detail`
--

CREATE TABLE IF NOT EXISTS `group_cs_detail` (
`id` int(11) NOT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=336 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_cs_detail`
--

INSERT INTO `group_cs_detail` (`id`, `id_cs`, `id_group`) VALUES
(300, 7, 5),
(301, 5, 5),
(302, 201, 5),
(307, 6, 8),
(308, 10, 8),
(309, 26, 3),
(310, 22, 3),
(311, 27, 3),
(312, 29, 3),
(320, 19, 2),
(321, 20, 2),
(322, 21, 2),
(323, 16, 11),
(324, 23, 11),
(325, 28, 11),
(326, 13, 9),
(327, 24, 9),
(328, 30, 9),
(329, 170, 9),
(330, 4, 9),
(331, 8, 9),
(332, 25, 9),
(333, 15, 7),
(334, 18, 7),
(335, 20, 7);

-- --------------------------------------------------------

--
-- Table structure for table `group_produk_cs`
--

CREATE TABLE IF NOT EXISTS `group_produk_cs` (
`id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_produk_cs`
--

INSERT INTO `group_produk_cs` (`id`, `id_produk`, `group`) VALUES
(3, 2, 'GRACILI'),
(4, 1, 'HERBASKIN');

--
-- Triggers `group_produk_cs`
--
DELIMITER //
CREATE TRIGGER `delete_detail_copy` AFTER DELETE ON `group_produk_cs`
 FOR EACH ROW BEGIN
DELETE FROM group_cs_detail WHERE id_group = OLD.id;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `group_produk_cs_detail`
--

CREATE TABLE IF NOT EXISTS `group_produk_cs_detail` (
`id` int(11) NOT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_produk_cs_detail`
--

INSERT INTO `group_produk_cs_detail` (`id`, `id_cs`, `id_group`) VALUES
(37, 2, 5),
(38, 5, 5),
(39, 4, 5),
(75, 15, 4),
(76, 16, 4),
(77, 17, 4),
(78, 18, 4),
(79, 19, 4),
(80, 20, 4),
(81, 21, 4),
(82, 22, 4),
(83, 23, 4),
(84, 26, 4),
(85, 27, 4),
(86, 28, 4),
(87, 29, 4),
(88, 30, 6),
(103, 2, 3),
(104, 4, 3),
(105, 5, 3),
(106, 6, 3),
(107, 7, 3),
(108, 8, 3),
(109, 9, 3),
(110, 10, 3),
(111, 13, 3),
(112, 24, 3),
(113, 25, 3),
(114, 170, 3),
(115, 201, 3),
(116, 30, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama_gudang` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `id_toko`, `nama_gudang`, `stok`) VALUES
(1, 158, 'Gudang Utama', 100);

-- --------------------------------------------------------

--
-- Table structure for table `hpp`
--

CREATE TABLE IF NOT EXISTS `hpp` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` bigint(20) DEFAULT NULL,
  `hpp_rata` double DEFAULT NULL,
  `hpp_fifo` double DEFAULT NULL,
  `hpp_lifo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrd_blog`
--

CREATE TABLE IF NOT EXISTS `hrd_blog` (
`id` int(11) NOT NULL,
  `tgl_buat` date DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_blog`
--

INSERT INTO `hrd_blog` (`id`, `tgl_buat`, `judul`, `isi`) VALUES
(1, '2020-03-30', 'Asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `hrd_data_absensi`
--

CREATE TABLE IF NOT EXISTS `hrd_data_absensi` (
`id` int(11) NOT NULL,
  `tgl_buat` date DEFAULT NULL,
  `tgl_absensi` date DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrd_data_cuti`
--

CREATE TABLE IF NOT EXISTS `hrd_data_cuti` (
`id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_dibuat` date NOT NULL,
  `no_surat_cuti` varchar(50) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL,
  `approved` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_data_cuti`
--

INSERT INTO `hrd_data_cuti` (`id`, `id_karyawan`, `tgl_dibuat`, `no_surat_cuti`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `total`, `approved`) VALUES
(5, 7, '2020-03-28', '', '2020-03-28', '2020-03-28', 'test', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hrd_data_gaji`
--

CREATE TABLE IF NOT EXISTS `hrd_data_gaji` (
`id` int(11) NOT NULL,
  `tgl_dibuat` date DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `bulan_tahun` varchar(20) DEFAULT NULL,
  `gaji_pokok` varchar(12) DEFAULT NULL,
  `tunjangan_kesehatan` varchar(12) DEFAULT NULL,
  `tunjangan_transportasi` varchar(12) DEFAULT NULL,
  `tunjangan_lainya` varchar(12) DEFAULT NULL,
  `potongan_absen` varchar(12) DEFAULT NULL,
  `potongan_1` varchar(12) DEFAULT NULL,
  `potongan_2` varchar(12) DEFAULT NULL,
  `potongan_lainya` varchar(12) DEFAULT NULL,
  `fee_closing` varchar(12) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_data_gaji`
--

INSERT INTO `hrd_data_gaji` (`id`, `tgl_dibuat`, `id_karyawan`, `bulan_tahun`, `gaji_pokok`, `tunjangan_kesehatan`, `tunjangan_transportasi`, `tunjangan_lainya`, `potongan_absen`, `potongan_1`, `potongan_2`, `potongan_lainya`, `fee_closing`) VALUES
(1, '2020-03-30', 3, '2020-01', '1000000', '100000', '100000', '120000', '0', '100', '100', '100', '1635000');

-- --------------------------------------------------------

--
-- Table structure for table `hrd_informasi`
--

CREATE TABLE IF NOT EXISTS `hrd_informasi` (
  `id` int(11) NOT NULL,
  `tata_tertib` text,
  `visi_misi` text,
  `profile_perusahaan` text,
  `budaya_perusahaan` text,
  `janji_momiku` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_informasi`
--

INSERT INTO `hrd_informasi` (`id`, `tata_tertib`, `visi_misi`, `profile_perusahaan`, `budaya_perusahaan`, `janji_momiku`) VALUES
(0, '<ol><li xss="removed"><font face="PT Serif, serif"><span xss="removed">Setiap karyawan wajib mentaati ketentuan-ketentuan dalam Perjanjian Kerja, Peraturan perusahaan, tata tertib kerja ini, maupun peraturan-peraturan pelaksanaannya.</span></font></li><li xss="removed"><font face="PT Serif, serif"><span xss="removed">Setiap karyawan wajib mentaati perintah atasannya, sejauh perintah tersebut diberikan dengan sah dan tidak bertentangan dengan Peraturan Perusahaan.</span></font></li><li xss="removed">Setiap karyawan wajib melaksanakan tugasnya sebaik mungkin, dan dengan penuh tanggung jawab.</li><li xss="removed"><font face="PT Serif, serif"><span xss="removed">Setiap karyawan diharapkan untuk berpenampilan rapi, terpelihara serta mengenakan pakaian yang menunjukkan sikap kerja profesional.</span></font></li><li xss="removed"><font face="PT Serif, serif"><span xss="removed">Wajib menjaga ketertiban, kebersihan dan keserasian di lingkungan Perusahaan.</span></font></li><li xss="removed"><font face="PT Serif, serif"><span xss="removed">Setiap karyawan wajib bertingkah laku yang baik dan sopan, sesuai dengan tata krama pergaulan yang umum.</span></font></li></ol>', '<p xss=removed><span xss=removed>Visi : Menjadi Lembaga Keuangan yang Unggul dalam Layanan dan Kinerja</span></p><p xss=removed><span xss=removed>Misi :</span></p><div class="insertads" xss=removed></div><ol xss=removed><li xss=removed><span xss=removed>Memberikan layanan prima dan solusi yang bernilai tambah kepada seluruh nasabah, dan selaku mitra pilihan utama.</span></li><li xss=removed><span xss=removed>Meningkatkan nilai investasi yang unggul bagi investor.</span></li><li xss=removed><span xss=removed>Menciptakan kondisi terbaik bagi karyawan sebagai kebanggaan untuk berkarya dan berprestasi.</span></li><li xss=removed><span xss=removed>Meningkatkan kepedulian dan tanggung jawab kepada lingkungan dan komunitas.</span></li><li xss=removed><span xss=removed>Menjadi acuan pelaksanaan kepatuhan dan tata kelola perusahaan yang baik bagi industri.</span></li></ol>', 'Menjadi Perusahaan di bidang industri pupuk, kimia dan agribisnis kelas dunia yang tumbuh dan berkelanjutan.', 'Menjalankan bisnis produk-produk pupuk, kimia serta portofolio investasi dibidang kimia, agro, energi, trading dan jasa pelayanan pabrik yang bersaing tinggi;\r\nMengoptimalkan nilai perusahaan melalui bisnis inti dan pengembangan bisnis baru yang dapat meningkatkan pendapatan dan menunjang Program Kedaulatan Pangan Nasional;\r\nMengoptimalkan utilisasi sumber daya di lingkungan sekitar maupun pasar global yang didukung oleh SDM yang berwawasan internasional dengan menerapkan teknologi terdepan', 'Memastikan nihil bahaya dalam setiap kegiatan operasional dan bisnis\r\nBermitra dengan para pelanggan untuk mewujudkan solusi-solusi berbeda dan inovatif.\r\nMengembangkan Sumber Daya Manusia yang berkinerja tinggi melalui lingkungan kerja yang beragam dan melibatkan setiap individu didalamnya.\r\nMenciptakan nilai yang sama dan solusi-solusi yamh berkelanjutan bagi para pemangku kepentingan.');

-- --------------------------------------------------------

--
-- Table structure for table `hrd_jabatan`
--

CREATE TABLE IF NOT EXISTS `hrd_jabatan` (
`id` int(11) NOT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_jabatan`
--

INSERT INTO `hrd_jabatan` (`id`, `jabatan`, `id_level`) VALUES
(1, 'CS', 2),
(2, 'Trainer dan coordinator', 99),
(3, 'HRD', 99),
(4, 'Manager', 5),
(5, 'Accounting', 99),
(6, 'Admin', 1),
(7, 'Advertiser', 10),
(8, 'Konten Creator', 99),
(9, 'Konten Writer', 99);

-- --------------------------------------------------------

--
-- Table structure for table `hrd_karyawan`
--

CREATE TABLE IF NOT EXISTS `hrd_karyawan` (
`id` int(11) NOT NULL,
  `id_users` int(2) DEFAULT NULL,
  `id_status_karyawan` int(2) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `nip` varchar(20) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `scan_ktp` varchar(200) DEFAULT NULL,
  `scan_buku_nikah` varchar(200) DEFAULT NULL,
  `scan_npwp` varchar(200) DEFAULT NULL,
  `scan_bpjs_ketenagakerjaan` varchar(200) DEFAULT NULL,
  `scan_bpjs_kesehatan` varchar(200) DEFAULT NULL,
  `scan_rek_gaji` varchar(200) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `certificate` text,
  `sisa_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrd_pengaturan_gaji`
--

CREATE TABLE IF NOT EXISTS `hrd_pengaturan_gaji` (
`id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `gaji_pokok` varchar(12) NOT NULL,
  `tunjangan_kesehatan` varchar(12) NOT NULL,
  `tunjangan_transportasi` varchar(12) NOT NULL,
  `tunjangan_lainya` varchar(12) NOT NULL,
  `potongan_1` varchar(12) NOT NULL,
  `potongan_2` varchar(12) NOT NULL,
  `potongan_lainya` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hrd_status_karyawan`
--

CREATE TABLE IF NOT EXISTS `hrd_status_karyawan` (
`id` int(11) NOT NULL,
  `status_karyawan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hrd_status_karyawan`
--

INSERT INTO `hrd_status_karyawan` (`id`, `status_karyawan`) VALUES
(1, 'Training'),
(2, 'Kontrak'),
(3, 'Tetap'),
(4, 'Resign');

-- --------------------------------------------------------

--
-- Table structure for table `hrd_tidak_masuk`
--

CREATE TABLE IF NOT EXISTS `hrd_tidak_masuk` (
`id` int(11) NOT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `tgl_absen` date DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hutang`
--

CREATE TABLE IF NOT EXISTS `hutang` (
`id` int(11) NOT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_faktur` int(11) DEFAULT NULL,
  `deadline` varchar(30) CHARACTER SET latin1 NOT NULL,
  `barcode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `barang` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `hutang` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kurang` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hutang_bayar`
--

CREATE TABLE IF NOT EXISTS `hutang_bayar` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `tgl_bayar` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `ket` varchar(255) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incentif`
--

CREATE TABLE IF NOT EXISTS `incentif` (
`id` int(11) NOT NULL,
  `target_1_bulan` double NOT NULL,
  `effective_call` int(11) NOT NULL,
  `outlet_aktif` int(11) NOT NULL,
  `new_outlet` int(11) NOT NULL,
  `bdr_target_1_bulan` double NOT NULL,
  `bdr_effective_call` int(11) NOT NULL,
  `bdr_outlet_aktif` int(11) NOT NULL,
  `bdr_new_outlet` int(11) NOT NULL,
  `point_target_1_bulan` int(11) NOT NULL,
  `point_effective_call` int(11) NOT NULL,
  `point_outlet_aktif` int(11) NOT NULL,
  `point_new_outlet` int(11) NOT NULL,
  `point_1` varchar(50) DEFAULT NULL,
  `point_2` varchar(50) DEFAULT NULL,
  `point_3` varchar(50) DEFAULT NULL,
  `point_4` varchar(50) DEFAULT NULL,
  `point_5` varchar(50) DEFAULT NULL,
  `rew_point_1` double NOT NULL,
  `rew_point_2` double NOT NULL,
  `rew_point_3` double NOT NULL,
  `rew_point_4` double NOT NULL,
  `rew_point_5` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inkubasi`
--

CREATE TABLE IF NOT EXISTS `inkubasi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) NOT NULL,
  `progress` int(11) NOT NULL,
  `catatan` text,
  `karyawan_masuk` int(11) DEFAULT NULL,
  `karyawan_tidak_masuk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inkubasi`
--

INSERT INTO `inkubasi` (`id`, `id_toko`, `id_users`, `tgl`, `progress`, `catatan`, `karyawan_masuk`, `karyawan_tidak_masuk`) VALUES
(1, 158, 2, '19-08-2019', 40, 'Da', 1, 17),
(2, 158, 2, '20-08-2019', 20, 'A', 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `inkubasi_barang`
--

CREATE TABLE IF NOT EXISTS `inkubasi_barang` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_inkubasi` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `keranjang` double NOT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `inkubasi_barang`
--

INSERT INTO `inkubasi_barang` (`id`, `id_toko`, `id_users`, `id_inkubasi`, `id_produk`, `expire_date`, `keranjang`, `cup`, `rusak`, `total`) VALUES
(19, 158, 2, 1, 21, NULL, 0, 0, 0, 0),
(20, 158, 2, 1, 22, NULL, 0, 0, 0, 0),
(21, 158, 2, 1, 23, NULL, 10, 5, 1, 964),
(22, 158, 2, 1, 24, NULL, 0, 0, 0, 0),
(23, 158, 2, 1, 25, NULL, 0, 0, 0, 0),
(24, 158, 2, 1, 35, NULL, 0, 0, 0, 0),
(25, 158, 2, 2, 21, NULL, 0, 0, 0, 0),
(26, 158, 2, 2, 22, NULL, 1, 20, 0, 116),
(27, 158, 2, 2, 23, NULL, 0, 0, 0, 0),
(28, 158, 2, 2, 24, NULL, 0, 0, 0, 0),
(29, 158, 2, 2, 25, NULL, 0, 0, 0, 0),
(30, 158, 2, 2, 35, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inkubasi_barang_temp`
--

CREATE TABLE IF NOT EXISTS `inkubasi_barang_temp` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `keranjang` double NOT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `inkubasi_barang_temp`
--

INSERT INTO `inkubasi_barang_temp` (`id`, `id_toko`, `id_users`, `id_produk`, `expire_date`, `keranjang`, `cup`, `rusak`, `total`) VALUES
(37, 158, 2, 21, NULL, 0, 0, 0, 0),
(38, 158, 2, 22, NULL, 0, 0, 0, 0),
(39, 158, 2, 23, NULL, 0, 0, 0, 0),
(40, 158, 2, 24, NULL, 0, 0, 0, 0),
(41, 158, 2, 25, NULL, 0, 0, 0, 0),
(42, 158, 2, 35, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inkubasi_barang_update`
--

CREATE TABLE IF NOT EXISTS `inkubasi_barang_update` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_inkubasi` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `keranjang` double NOT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `inkubasi_barang_update`
--

INSERT INTO `inkubasi_barang_update` (`id`, `id_toko`, `id_users`, `id_inkubasi`, `id_produk`, `expire_date`, `keranjang`, `cup`, `rusak`, `total`) VALUES
(19, 158, 2, 1, 21, NULL, 0, 0, 0, 0),
(20, 158, 2, 1, 22, NULL, 0, 0, 0, 0),
(21, 158, 2, 1, 23, NULL, 10, 5, 1, 14),
(22, 158, 2, 1, 24, NULL, 0, 0, 0, 0),
(23, 158, 2, 1, 25, NULL, 0, 0, 0, 0),
(24, 158, 2, 1, 35, NULL, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inkubasi_karyawan`
--

CREATE TABLE IF NOT EXISTS `inkubasi_karyawan` (
`id` int(11) NOT NULL,
  `id_inkubasi` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inkubasi_karyawan`
--

INSERT INTO `inkubasi_karyawan` (`id`, `id_inkubasi`, `id_users`) VALUES
(4, 1, 14),
(5, 2, 14),
(6, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `jam_kerja`
--

CREATE TABLE IF NOT EXISTS `jam_kerja` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_pegawai` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `jam_masuk` varchar(30) DEFAULT NULL,
  `jam_pulang` varchar(30) DEFAULT NULL,
  `lembur` varchar(50) DEFAULT NULL,
  `tidak_masuk` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_kerja`
--

INSERT INTO `jam_kerja` (`id`, `id_toko`, `id_users`, `id_pegawai`, `tgl`, `jam_masuk`, `jam_pulang`, `lembur`, `tidak_masuk`, `status`, `keterangan`) VALUES
(1, 158, 2, 14, '16-08-2019', '08:00:00', '09:40:05', NULL, 0, 2, NULL),
(2, 158, 2, 19, '16-08-2019', '08:00:00', '09:40:04', NULL, NULL, 2, NULL),
(3, 158, 2, 14, '19-08-2019', '08:00:00', NULL, NULL, 0, 1, NULL),
(4, 158, 2, 14, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(5, 158, 2, 19, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(6, 158, 2, 18, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(7, 158, 2, 9, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(8, 158, 2, 23, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(9, 158, 2, 16, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(10, 158, 2, 12, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(11, 158, 2, 15, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(12, 158, 2, 6, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(13, 158, 2, 11, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(14, 158, 2, 21, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(15, 158, 2, 22, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(16, 158, 2, 17, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(17, 158, 2, 7, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(18, 158, 2, 8, '20-08-2019', '08:00:00', '16:00:00', '2', NULL, 2, NULL),
(19, 158, 2, 10, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL),
(20, 158, 2, 13, '20-08-2019', '08:00:00', '18:00:00', '2', NULL, 2, NULL),
(21, 158, 2, 20, '20-08-2019', '08:00:00', '16:00:00', NULL, NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_menu`
--

CREATE TABLE IF NOT EXISTS `jenis_menu` (
`id` int(11) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE IF NOT EXISTS `jurnal` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jurnal` int(11) DEFAULT NULL COMMENT 'id_jurnal untuk sync server',
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `id_proses` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `id_akun` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1138 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `jurnal`
--

INSERT INTO `jurnal` (`id`, `id_users`, `id_jurnal`, `id_toko`, `kode`, `tgl`, `id_proses`, `id_piutang`, `id_hutang`, `id_akun`, `id_transaksi`, `no_faktur`, `keterangan`, `debet`, `kredit`) VALUES
(16, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060001-1', '06-06-2020', 1, 0, 0, '5', 0, '42006060001', '', 170000, 0),
(17, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060001-1', '06-06-2020', 1, 0, 0, '83', 0, '42006060001', '', 129875, 0),
(18, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060001-1', '06-06-2020', 1, 0, 0, '43', 0, '42006060001', '', 0, 170000),
(19, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060001-1', '06-06-2020', 1, 0, 0, '16', 0, '42006060001', '', 0, 129875),
(20, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060002-1', '06-06-2020', 2, 0, 0, '5', 0, '42006060002', '', 120000, 0),
(21, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060002-1', '06-06-2020', 2, 0, 0, '83', 0, '42006060002', '', 91015, 0),
(22, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060002-1', '06-06-2020', 2, 0, 0, '43', 0, '42006060002', '', 0, 120000),
(23, 1, NULL, 158, 'PENJUALAN-KREDIT-42006060002-1', '06-06-2020', 2, 0, 0, '16', 0, '42006060002', '', 0, 91015),
(24, 1, NULL, 158, 'PELUNASAN-42006060002-1', '06-06-2020', 0, 0, 0, '11', 0, '', '', 100000, 0),
(25, 1, NULL, 158, 'PELUNASAN-42006060002-1', '06-06-2020', 0, 0, 0, '6', 0, '', '', 0, 0),
(26, 1, NULL, 158, 'PELUNASAN-42006060002-1', '06-06-2020', 0, 0, 0, '44', 0, '', '', 0, 0),
(27, 1, NULL, 158, 'PERSEDIAAN-1', '02-06-2020', NULL, NULL, NULL, '19', 0, NULL, 'Barang Setengah Jadi', 36740800, 0),
(28, 1, NULL, 158, 'PERSEDIAAN-1', '02-06-2020', NULL, NULL, NULL, '35', 0, NULL, 'Barang Setengah Jadi', 0, 36740800),
(29, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090001-1', '09-06-2020', 3, 0, 0, '5', 0, '42006090001', '', 40000, 0),
(30, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090001-1', '09-06-2020', 3, 0, 0, '83', 0, '42006090001', '', 25975, 0),
(31, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090001-1', '09-06-2020', 3, 0, 0, '43', 0, '42006090001', '', 0, 40000),
(32, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090001-1', '09-06-2020', 3, 0, 0, '16', 0, '42006090001', '', 0, 25975),
(33, 1, NULL, 158, 'PENJUALAN-TUNAI-42006090002-1', '09-06-2020', 4, 0, 0, '14', 0, '42006090002', '', 34000, 0),
(34, 1, NULL, 158, 'PENJUALAN-TUNAI-42006090002-1', '09-06-2020', 4, 0, 0, '83', 0, '42006090002', '', 25975, 0),
(35, 1, NULL, 158, 'PENJUALAN-TUNAI-42006090002-1', '09-06-2020', 4, 0, 0, '43', 0, '42006090002', '', 0, 34000),
(36, 1, NULL, 158, 'PENJUALAN-TUNAI-42006090002-1', '09-06-2020', 4, 0, 0, '16', 0, '42006090002', '', 0, 25975),
(37, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090003-1', '09-06-2020', 5, 0, 0, '5', 0, '42006090003', '', 40000, 0),
(38, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090003-1', '09-06-2020', 5, 0, 0, '83', 0, '42006090003', '', 25975, 0),
(39, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090003-1', '09-06-2020', 5, 0, 0, '43', 0, '42006090003', '', 0, 40000),
(40, 1, NULL, 158, 'PENJUALAN-KREDIT-42006090003-1', '09-06-2020', 5, 0, 0, '16', 0, '42006090003', '', 0, 25975),
(41, 1, NULL, 158, 'RETUR-JUAL-1', '09-06-2020', 0, 0, 0, '6', 0, '', '', 0, 40000),
(42, 1, NULL, 158, 'RETUR-JUAL-1', '09-06-2020', 0, 0, 0, '84', 0, '', '', 40000, 0),
(43, 1, NULL, 158, 'RETUR-JUAL-1', '09-06-2020', 0, 0, 0, '83', 0, '', '', 0, 25975),
(44, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '5', 0, NULL, '', 155049000, 0),
(45, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '10', 0, NULL, '', 10467000, 0),
(46, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '11', 0, NULL, '', 10000039, 0),
(47, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '1', 0, NULL, '', 13106945, 0),
(48, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '21', 0, NULL, '', 400000000, 0),
(49, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '22', 0, NULL, '', 76800000, 0),
(50, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '23', 0, NULL, '', 7500000, 0),
(51, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '24', 0, NULL, '', 42000000, 0),
(52, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '25', 0, NULL, '', 500000, 0),
(53, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '26', 0, NULL, '', 51886000, 0),
(54, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '27', 0, NULL, '', 300000, 0),
(55, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '29', 0, NULL, '', 400000000, 0),
(56, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '30', 0, NULL, '', 5500000, 0),
(57, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '31', 0, NULL, '', 58146300, 0),
(58, 1, NULL, 158, 'PENYESUAIAN-AKTIVA-1', '02-06-2020', NULL, NULL, NULL, '35', 0, NULL, '', 0, 1312552842),
(59, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160001-1', '16-06-2020', 5, 0, 0, '14', 0, '42006160001', '', 90000, 0),
(60, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160001-1', '16-06-2020', 5, 0, 0, '83', 0, '42006160001', '', 53850, 0),
(61, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160001-1', '16-06-2020', 5, 0, 0, '74', 0, '42006160001', '', 0, 0),
(62, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160001-1', '16-06-2020', 5, 0, 0, '43', 0, '42006160001', '', 0, 90000),
(63, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160002-1', '16-06-2020', 6, 0, 0, '14', 0, '42006160002', '', 22000, 0),
(64, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160002-1', '16-06-2020', 6, 0, 0, '83', 0, '42006160002', '', 111400, 0),
(65, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160002-1', '16-06-2020', 6, 0, 0, '74', 0, '42006160002', '', 0, 0),
(66, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160002-1', '16-06-2020', 6, 0, 0, '43', 0, '42006160002', '', 0, 22000),
(67, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160003-1', '16-06-2020', 7, 0, 0, '14', 0, '42006160003', '', 175000, 0),
(68, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160003-1', '16-06-2020', 7, 0, 0, '83', 0, '42006160003', '', 130080, 0),
(69, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160003-1', '16-06-2020', 7, 0, 0, '74', 0, '42006160003', '', 0, 0),
(70, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160003-1', '16-06-2020', 7, 0, 0, '43', 0, '42006160003', '', 0, 175000),
(71, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006160004-1', '16-06-2020', 8, 0, 0, '83', 0, '12006160004', '', 1174000, 0),
(72, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006160004-1', '16-06-2020', 8, 0, 0, '74', 0, '12006160004', '', 0, 0),
(73, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006160004-1', '16-06-2020', 8, 0, 0, '43', 0, '12006160004', '', 0, 1100000),
(74, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160005-1', '16-06-2020', 9, 0, 0, '14', 0, '42006160005', '', 0, 0),
(75, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160005-1', '16-06-2020', 9, 0, 0, '83', 0, '42006160005', '', 0, 0),
(76, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160005-1', '16-06-2020', 9, 0, 0, '74', 0, '42006160005', '', 0, 0),
(77, 1, NULL, 158, 'PENJUALAN-TUNAI-42006160005-1', '16-06-2020', 9, 0, 0, '43', 0, '42006160005', '', 0, 0),
(78, 1, NULL, 158, 'PENJUALAN-TUNAI-42006170001-1', '17-06-2020', 10, 0, 0, '14', 0, '42006170001', '', 111000, 0),
(79, 1, NULL, 158, 'PENJUALAN-TUNAI-42006170001-1', '17-06-2020', 10, 0, 0, '83', 0, '42006170001', '', 78950, 0),
(80, 1, NULL, 158, 'PENJUALAN-TUNAI-42006170001-1', '17-06-2020', 10, 0, 0, '74', 0, '42006170001', '', 0, 0),
(81, 1, NULL, 158, 'PENJUALAN-TUNAI-42006170001-1', '17-06-2020', 10, 0, 0, '43', 0, '42006170001', '', 0, 111000),
(82, 1, NULL, 158, 'PENJUALAN-TUNAI-42006180001-1', '18-06-2020', 11, 0, 0, '14', 0, '42006180001', '', 60000, 0),
(83, 1, NULL, 158, 'PENJUALAN-TUNAI-42006180001-1', '18-06-2020', 11, 0, 0, '83', 0, '42006180001', '', 35900, 0),
(84, 1, NULL, 158, 'PENJUALAN-TUNAI-42006180001-1', '18-06-2020', 11, 0, 0, '74', 0, '42006180001', '', 0, 0),
(85, 1, NULL, 158, 'PENJUALAN-TUNAI-42006180001-1', '18-06-2020', 11, 0, 0, '43', 0, '42006180001', '', 0, 60000),
(86, 1, NULL, 158, 'PENJUALAN-TUNAI-42006190001-1', '19-06-2020', 12, 0, 0, '14', 0, '42006190001', '', 2200, 0),
(87, 1, NULL, 158, 'PENJUALAN-TUNAI-42006190001-1', '19-06-2020', 12, 0, 0, '83', 0, '42006190001', '', 0, 0),
(88, 1, NULL, 158, 'PENJUALAN-TUNAI-42006190001-1', '19-06-2020', 12, 0, 0, '74', 0, '42006190001', '', 0, 0),
(89, 1, NULL, 158, 'PENJUALAN-TUNAI-42006190001-1', '19-06-2020', 12, 0, 0, '43', 0, '42006190001', '', 0, 2200),
(90, 1, NULL, 158, 'PEMBELIAN-TUNAI-1', '19-06-2020', 2, 0, 0, '12', 0, '190620801', '', 0, 300000),
(91, 1, NULL, 158, 'PEMBELIAN-PRO-KREDIT-1', '19-06-2020', 3, 0, 18, '33', 0, '190620112', '', 0, 2105360),
(92, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006190002-1', '19-06-2020', 13, 0, 0, '83', 0, '12006190002', '', 1500750, 0),
(93, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006190002-1', '19-06-2020', 13, 0, 0, '74', 0, '12006190002', '', 0, 0),
(94, 1, NULL, 158, 'PENJUALAN-TRANSFER-12006190002-1', '19-06-2020', 13, 0, 0, '43', 0, '12006190002', '', 0, 2625000),
(113, 1, NULL, 158, 'VER-PEMBAYARAN-42006180001-1', '18-06-2020', 0, 0, 0, '6', 0, '', '', 0, 0),
(114, 1, NULL, 158, 'VER-PEMBAYARAN-42006180001-1', '18-06-2020', 0, 0, 0, '44', 0, '', '', 0, 0),
(115, 1, NULL, 158, 'VER-PEMBAYARAN-42006180001-1', '18-06-2020', 0, 0, 0, '43', 0, '', '', 0, 0),
(116, 1, NULL, 158, 'VER-PEMBAYARAN-42006180001-1', '18-06-2020', 0, 0, 0, '83', 0, '', '', 35900, 0),
(131, 1, NULL, 158, 'VER-PEMBAYARAN-42006190001-1', '19-06-2020', 0, 0, 0, '6', 0, '', '', 0, 0),
(132, 1, NULL, 158, 'VER-PEMBAYARAN-42006190001-1', '19-06-2020', 0, 0, 0, '44', 0, '', '', 0, 0),
(133, 1, NULL, 158, 'VER-PEMBAYARAN-42006190001-1', '19-06-2020', 0, 0, 0, '43', 0, '', '', 0, 0),
(134, 1, NULL, 158, 'VER-PEMBAYARAN-42006190001-1', '19-06-2020', 0, 0, 0, '83', 0, '', '', 32000, 0),
(135, 1, NULL, 158, 'VER-PEMBAYARAN-12006190002-1', '19-06-2020', 0, 0, 0, '44', 0, '', '', 0, 0),
(136, 1, NULL, 158, 'VER-PEMBAYARAN-12006190002-1', '19-06-2020', 0, 0, 0, '43', 0, '', '', 0, 0),
(137, 1, NULL, 158, 'VER-PEMBAYARAN-12006190002-1', '19-06-2020', 0, 0, 0, '83', 0, '', '', 1500750, 0),
(138, 1, NULL, 158, 'PENJUALAN-TUNAI-42006200001-1', '20-06-2020', 14, 0, 0, '14', 0, '42006200001', '', 106000, 0),
(139, 1, NULL, 158, 'PENJUALAN-TUNAI-42006200001-1', '20-06-2020', 14, 0, 0, '83', 0, '42006200001', '', 69950, 0),
(140, 1, NULL, 158, 'PENJUALAN-TUNAI-42006200001-1', '20-06-2020', 14, 0, 0, '74', 0, '42006200001', '', 0, 0),
(141, 1, NULL, 158, 'PENJUALAN-TUNAI-42006200001-1', '20-06-2020', 14, 0, 0, '43', 0, '42006200001', '', 0, 106000),
(142, 1, NULL, 158, 'PENJUALAN-TUNAI-42101280001-1', '28-01-2021', 15, 0, 0, '14', 0, '42101280001', '', 0, 0),
(143, 1, NULL, 158, 'PENJUALAN-TUNAI-42101280001-1', '28-01-2021', 15, 0, 0, '83', 0, '42101280001', '', 0, 0),
(144, 1, NULL, 158, 'PENJUALAN-TUNAI-42101280001-1', '28-01-2021', 15, 0, 0, '74', 0, '42101280001', '', 0, 0),
(145, 1, NULL, 158, 'PENJUALAN-TUNAI-42101280001-1', '28-01-2021', 15, 0, 0, '43', 0, '42101280001', '', 0, 0),
(146, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050001-1', '05-02-2022', 16, 0, 0, '14', 0, '42202050001', '', 20300, 0),
(147, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050001-1', '05-02-2022', 16, 0, 0, '83', 0, '42202050001', '', 8975, 0),
(148, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050001-1', '05-02-2022', 16, 0, 0, '74', 0, '42202050001', '', 0, 7800),
(149, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050001-1', '05-02-2022', 16, 0, 0, '43', 0, '42202050001', '', 0, 12500),
(150, 1, NULL, 158, 'PENJUALAN-TUNAI-22202050002-1', '05-02-2022', 17, 0, 0, '14', 0, '22202050002', '', 72500, 0),
(151, 1, NULL, 158, 'PENJUALAN-TUNAI-22202050002-1', '05-02-2022', 17, 0, 0, '83', 0, '22202050002', '', 8975, 0),
(152, 1, NULL, 158, 'PENJUALAN-TUNAI-22202050002-1', '05-02-2022', 17, 0, 0, '74', 0, '22202050002', '', 0, 60000),
(153, 1, NULL, 158, 'PENJUALAN-TUNAI-22202050002-1', '05-02-2022', 17, 0, 0, '43', 0, '22202050002', '', 0, 12500),
(154, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(155, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(156, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(157, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(158, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(159, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(160, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(161, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(162, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(163, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(164, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(165, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(166, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(167, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(168, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(169, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(170, 1, NULL, 158, 'VER-PEMBAYARAN-42202050001-1', '05-02-2022', 0, 0, 0, '6', 0, '', '', -12000, 0),
(171, 1, NULL, 158, 'VER-PEMBAYARAN-42202050001-1', '05-02-2022', 0, 0, 0, '44', 0, '', '', 0, 7800),
(172, 1, NULL, 158, 'VER-PEMBAYARAN-42202050001-1', '05-02-2022', 0, 0, 0, '43', 0, '', '', 0, -19800),
(173, 1, NULL, 158, 'VER-PEMBAYARAN-42202050001-1', '05-02-2022', 0, 0, 0, '83', 0, '', '', 8975, 0),
(174, 1, NULL, 158, 'VER-PEMBAYARAN-22202050002-1', '05-02-2022', 0, 0, 0, '7', 0, '', '', 0, 0),
(175, 1, NULL, 158, 'VER-PEMBAYARAN-22202050002-1', '05-02-2022', 0, 0, 0, '44', 0, '', '', 0, 60000),
(176, 1, NULL, 158, 'VER-PEMBAYARAN-22202050002-1', '05-02-2022', 0, 0, 0, '43', 0, '', '', 0, -60000),
(177, 1, NULL, 158, 'VER-PEMBAYARAN-22202050002-1', '05-02-2022', 0, 0, 0, '83', 0, '', '', 8975, 0),
(179, 1, NULL, 158, 'PEMBELIAN-TUNAI-2', '05-02-2022', 4, 0, 0, '12', 0, '050222101', '', 0, 0),
(180, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(181, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(182, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(183, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(184, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(185, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(186, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(187, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(188, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050003-1', '05-02-2022', 18, 0, 0, '14', 0, '42202050003', '', 17500, 0),
(189, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050003-1', '05-02-2022', 18, 0, 0, '83', 0, '42202050003', '', 8975, 0),
(190, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050003-1', '05-02-2022', 18, 0, 0, '74', 0, '42202050003', '', 0, 5000),
(191, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050003-1', '05-02-2022', 18, 0, 0, '43', 0, '42202050003', '', 0, 12500),
(192, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '6', 0, '', '', 0, 0),
(193, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '44', 0, '', '', 0, 0),
(194, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '43', 0, '', '', 0, 0),
(195, 1, NULL, 158, 'VER-PEMBAYARAN--1', '--', 0, 0, 0, '83', 0, '', '', 0, 0),
(196, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050004-1', '05-02-2022', 19, 0, 0, '14', 0, '42202050004', '', 18500, 0),
(197, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050004-1', '05-02-2022', 19, 0, 0, '83', 0, '42202050004', '', 8975, 0),
(198, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050004-1', '05-02-2022', 19, 0, 0, '74', 0, '42202050004', '', 0, 6000),
(199, 1, NULL, 158, 'PENJUALAN-TUNAI-42202050004-1', '05-02-2022', 19, 0, 0, '43', 0, '42202050004', '', 0, 12500),
(200, 1, NULL, 158, 'RETUR-JUAL-2', '05-02-2022', 0, 0, 0, '6', 0, '', '', 0, 10000),
(201, 1, NULL, 158, 'RETUR-JUAL-2', '05-02-2022', 0, 0, 0, '84', 0, '', '', 10000, 0),
(202, 1, NULL, 158, 'RETUR-JUAL-2', '05-02-2022', 0, 0, 0, '83', 0, '', '', 0, 33600),
(203, 1, NULL, 158, 'PENJUALAN-TUNAI-42202070001-1', '07-02-2022', 20, 0, 0, '14', 0, '42202070001', '', 12500, 0),
(204, 1, NULL, 158, 'PENJUALAN-TUNAI-42202070001-1', '07-02-2022', 20, 0, 0, '83', 0, '42202070001', '', 8975, 0),
(205, 1, NULL, 158, 'PENJUALAN-TUNAI-42202070001-1', '07-02-2022', 20, 0, 0, '74', 0, '42202070001', '', 0, 0),
(206, 1, NULL, 158, 'PENJUALAN-TUNAI-42202070001-1', '07-02-2022', 20, 0, 0, '43', 0, '42202070001', '', 0, 12500),
(207, 1, NULL, 158, 'PENJUALAN-KREDIT-42202070002-1', '07-02-2022', 21, 0, 0, '5', 0, '42202070002', '', 16500, 0),
(208, 1, NULL, 158, 'PENJUALAN-KREDIT-42202070002-1', '07-02-2022', 21, 0, 0, '83', 0, '42202070002', '', 8975, 0),
(209, 1, NULL, 158, 'PENJUALAN-KREDIT-42202070002-1', '07-02-2022', 21, 0, 0, '74', 0, '42202070002', '', 0, 4000),
(210, 1, NULL, 158, 'PENJUALAN-KREDIT-42202070002-1', '07-02-2022', 21, 0, 0, '43', 0, '42202070002', '', 0, 12500),
(211, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080001-1', '08-02-2022', 22, 0, 0, '14', 0, '42202080001', '', 792000, 0),
(212, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080001-1', '08-02-2022', 22, 0, 0, '83', 0, '42202080001', '', 502800, 0),
(213, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080001-1', '08-02-2022', 22, 0, 0, '74', 0, '42202080001', '', 0, 0),
(214, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080001-1', '08-02-2022', 22, 0, 0, '43', 0, '42202080001', '', 0, 792000),
(215, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080002-1', '08-02-2022', 23, 0, 0, '14', 0, '42202080002', '', 0, 0),
(216, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080002-1', '08-02-2022', 23, 0, 0, '83', 0, '42202080002', '', 0, 0),
(217, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080002-1', '08-02-2022', 23, 0, 0, '74', 0, '42202080002', '', 0, 0),
(218, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080002-1', '08-02-2022', 23, 0, 0, '43', 0, '42202080002', '', 0, 0),
(219, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080003-1', '08-02-2022', 24, 0, 0, '14', 0, '42202080003', '', 33000, 0),
(220, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080003-1', '08-02-2022', 24, 0, 0, '83', 0, '42202080003', '', 17375, 0),
(221, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080003-1', '08-02-2022', 24, 0, 0, '74', 0, '42202080003', '', 0, 0),
(222, 1, NULL, 158, 'PENJUALAN-TUNAI-42202080003-1', '08-02-2022', 24, 0, 0, '43', 0, '42202080003', '', 0, 33000),
(223, 1, NULL, 158, 'J1-1', '08-02-2022', NULL, NULL, NULL, '13', 0, NULL, 'Beli makan', 0, 12000),
(224, 1, NULL, 158, 'J1-1', '08-02-2022', NULL, NULL, NULL, '79', 0, NULL, 'Beli makan', 12000, 0),
(225, 1, NULL, 158, 'PEMBELIAN-KONSINYASI-TUNAI-1', '10-02-2022', 5, 0, 0, '12', 0, '1002221401', '', 0, 187000),
(226, 1, NULL, 158, 'PEMBELIAN-KONSINYASI-TUNAI-2', '11-02-2022', 6, 0, 0, '12', 0, '110222201', '', 0, 365000),
(227, 1, NULL, 158, 'PEMBELIAN-KONSINYASI-TUNAI-3', '11-02-2022', 7, 0, 0, '12', 0, '110222202', '', 0, 10000),
(228, 1, NULL, 158, 'PEMBELIAN-KONSINYASI-TUNAI-4', '11-02-2022', 8, 0, 0, '12', 0, '110222303', '', 0, 15000),
(229, 1, NULL, 158, 'PEMBELIAN-KONSINYASI-TUNAI-5', '11-02-2022', 9, 0, 0, '12', 0, '110222204', '', 0, 330000),
(230, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120001-1', '12-02-2022', 25, 0, 0, '14', 0, '42202120001', '', 146500, 0),
(231, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120001-1', '12-02-2022', 25, 0, 0, '83', 0, '42202120001', '', 97030, 0),
(232, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120001-1', '12-02-2022', 25, 0, 0, '74', 0, '42202120001', '', 0, 0),
(233, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120001-1', '12-02-2022', 25, 0, 0, '43', 0, '42202120001', '', 0, 146500),
(234, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120002-1', '12-02-2022', 26, 0, 0, '14', 0, '42202120002', '', 0, 0),
(235, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120002-1', '12-02-2022', 26, 0, 0, '83', 0, '42202120002', '', 0, 0),
(236, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120002-1', '12-02-2022', 26, 0, 0, '74', 0, '42202120002', '', 0, 0),
(237, 1, NULL, 158, 'PENJUALAN-TUNAI-42202120002-1', '12-02-2022', 26, 0, 0, '43', 0, '42202120002', '', 0, 0),
(238, 1, NULL, 158, 'PENJUALAN-TUNAI-42202150001-1', '15-02-2022', 27, 0, 0, '14', 0, '42202150001', '', 12500, 0),
(239, 1, NULL, 158, 'PENJUALAN-TUNAI-42202150001-1', '15-02-2022', 27, 0, 0, '83', 0, '42202150001', '', 21975, 0),
(240, 1, NULL, 158, 'PENJUALAN-TUNAI-42202150001-1', '15-02-2022', 27, 0, 0, '74', 0, '42202150001', '', 0, 0),
(241, 1, NULL, 158, 'PENJUALAN-TUNAI-42202150001-1', '15-02-2022', 27, 0, 0, '43', 0, '42202150001', '', 0, 12500),
(242, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200001-1', '20-02-2024', 259, 0, 0, '14', 0, '42402200001', '', 0, 0),
(243, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200001-1', '20-02-2024', 259, 0, 0, '83', 0, '42402200001', '', 0, 0),
(244, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200001-1', '20-02-2024', 259, 0, 0, '74', 0, '42402200001', '', 0, 0),
(245, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200001-1', '20-02-2024', 259, 0, 0, '43', 0, '42402200001', '', 0, 0),
(246, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200002-1', '20-02-2024', 260, 0, 0, '14', 0, '42402200002', '', 0, 0),
(247, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200002-1', '20-02-2024', 260, 0, 0, '83', 0, '42402200002', '', 0, 0),
(248, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200002-1', '20-02-2024', 260, 0, 0, '74', 0, '42402200002', '', 0, 0),
(249, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200002-1', '20-02-2024', 260, 0, 0, '43', 0, '42402200002', '', 0, 0),
(250, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200003-1', '20-02-2024', 261, 0, 0, '14', 0, '42402200003', '', 0, 0),
(251, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200003-1', '20-02-2024', 261, 0, 0, '83', 0, '42402200003', '', 0, 0),
(252, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200003-1', '20-02-2024', 261, 0, 0, '74', 0, '42402200003', '', 0, 0),
(253, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200003-1', '20-02-2024', 261, 0, 0, '43', 0, '42402200003', '', 0, 0),
(254, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200004-1', '20-02-2024', 262, 0, 0, '14', 0, '42402200004', '', 0, 0),
(255, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200004-1', '20-02-2024', 262, 0, 0, '83', 0, '42402200004', '', 0, 0),
(256, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200004-1', '20-02-2024', 262, 0, 0, '74', 0, '42402200004', '', 0, 0),
(257, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200004-1', '20-02-2024', 262, 0, 0, '43', 0, '42402200004', '', 0, 0),
(258, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200005-1', '20-02-2024', 263, 0, 0, '14', 0, '42402200005', '', 0, 0),
(259, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200005-1', '20-02-2024', 263, 0, 0, '83', 0, '42402200005', '', 0, 0),
(260, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200005-1', '20-02-2024', 263, 0, 0, '74', 0, '42402200005', '', 0, 0),
(261, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200005-1', '20-02-2024', 263, 0, 0, '43', 0, '42402200005', '', 0, 0),
(262, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200006-1', '20-02-2024', 264, 0, 0, '14', 0, '42402200006', '', 0, 0),
(263, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200006-1', '20-02-2024', 264, 0, 0, '83', 0, '42402200006', '', 0, 0),
(264, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200006-1', '20-02-2024', 264, 0, 0, '74', 0, '42402200006', '', 0, 0),
(265, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200006-1', '20-02-2024', 264, 0, 0, '43', 0, '42402200006', '', 0, 0),
(266, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200007-1', '20-02-2024', 265, 0, 0, '14', 0, '42402200007', '', 0, 0),
(267, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200007-1', '20-02-2024', 265, 0, 0, '83', 0, '42402200007', '', 0, 0),
(268, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200007-1', '20-02-2024', 265, 0, 0, '74', 0, '42402200007', '', 0, 0),
(269, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200007-1', '20-02-2024', 265, 0, 0, '43', 0, '42402200007', '', 0, 0),
(270, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200008-1', '20-02-2024', 266, 0, 0, '14', 0, '42402200008', '', 0, 0),
(271, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200008-1', '20-02-2024', 266, 0, 0, '83', 0, '42402200008', '', 1975, 0),
(272, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200008-1', '20-02-2024', 266, 0, 0, '74', 0, '42402200008', '', 0, 0),
(273, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200008-1', '20-02-2024', 266, 0, 0, '43', 0, '42402200008', '', 0, 0),
(274, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200009-1', '20-02-2024', 267, 0, 0, '14', 0, '42402200009', '', 0, 0),
(275, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200009-1', '20-02-2024', 267, 0, 0, '83', 0, '42402200009', '', 17890, 0),
(276, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200009-1', '20-02-2024', 267, 0, 0, '74', 0, '42402200009', '', 0, 0),
(277, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200009-1', '20-02-2024', 267, 0, 0, '43', 0, '42402200009', '', 0, 0),
(278, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200010-1', '20-02-2024', 268, 0, 0, '14', 0, '42402200010', '', 0, 0),
(279, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200010-1', '20-02-2024', 268, 0, 0, '83', 0, '42402200010', '', 1975, 0),
(280, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200010-1', '20-02-2024', 268, 0, 0, '74', 0, '42402200010', '', 0, 0),
(281, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200010-1', '20-02-2024', 268, 0, 0, '43', 0, '42402200010', '', 0, 0),
(282, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200011-1', '20-02-2024', 269, 0, 0, '14', 0, '42402200011', '', 0, 0),
(283, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200011-1', '20-02-2024', 269, 0, 0, '83', 0, '42402200011', '', 16800, 0),
(284, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200011-1', '20-02-2024', 269, 0, 0, '74', 0, '42402200011', '', 0, 0),
(285, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200011-1', '20-02-2024', 269, 0, 0, '43', 0, '42402200011', '', 0, 0),
(286, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200012-1', '20-02-2024', 270, 0, 0, '14', 0, '42402200012', '', 13000, 0),
(287, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200012-1', '20-02-2024', 270, 0, 0, '83', 0, '42402200012', '', 8400, 0),
(288, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200012-1', '20-02-2024', 270, 0, 0, '74', 0, '42402200012', '', 0, 0),
(289, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200012-1', '20-02-2024', 270, 0, 0, '43', 0, '42402200012', '', 0, 13000),
(290, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-1', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 371000, 0),
(291, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-1', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 253000, 0),
(292, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-1', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(293, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-1', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 371000),
(294, 1, NULL, 158, 'PENJUALAN-KREDIT-undefined2402200014-1', '20-02-2024', 272, 0, 0, '5', 0, 'undefined2402200014', '', 100000, 0),
(295, 1, NULL, 158, 'PENJUALAN-KREDIT-undefined2402200014-1', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 52600, 0),
(296, 1, NULL, 158, 'PENJUALAN-KREDIT-undefined2402200014-1', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(297, 1, NULL, 158, 'PENJUALAN-KREDIT-undefined2402200014-1', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 100000),
(298, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-1', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200015', '', 100000, 0),
(299, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-1', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200015', '', 52600, 0),
(300, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-1', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200015', '', 0, 0),
(301, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-1', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200015', '', 0, 100000),
(302, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-1', '20-02-2024', 274, 0, 0, '14', 0, 'undefined2402200016', '', 0, 0),
(303, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-1', '20-02-2024', 274, 0, 0, '83', 0, 'undefined2402200016', '', 1600, 0),
(304, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-1', '20-02-2024', 274, 0, 0, '74', 0, 'undefined2402200016', '', 0, 0),
(305, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-1', '20-02-2024', 274, 0, 0, '43', 0, 'undefined2402200016', '', 0, 0),
(306, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-1', '20-02-2024', 275, 0, 0, '14', 0, 'undefined2402200017', '', 0, 0),
(307, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-1', '20-02-2024', 275, 0, 0, '83', 0, 'undefined2402200017', '', 0, 0),
(308, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-1', '20-02-2024', 275, 0, 0, '74', 0, 'undefined2402200017', '', 0, 0),
(309, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-1', '20-02-2024', 275, 0, 0, '43', 0, 'undefined2402200017', '', 0, 0),
(310, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-2', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 20000, 0),
(311, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-2', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 17000, 0),
(312, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-2', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(313, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-2', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 20000),
(314, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-1', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 100000, 0),
(315, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-1', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 52600, 0),
(316, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-1', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(317, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-1', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 100000),
(318, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-2', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200015', '', 0, 0),
(319, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-2', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200015', '', 1090, 0),
(320, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-2', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200015', '', 0, 0),
(321, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-2', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200015', '', 0, 0),
(322, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-2', '20-02-2024', 274, 0, 0, '14', 0, 'undefined2402200016', '', 0, 0),
(323, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-2', '20-02-2024', 274, 0, 0, '83', 0, 'undefined2402200016', '', 975, 0),
(324, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-2', '20-02-2024', 274, 0, 0, '74', 0, 'undefined2402200016', '', 0, 0),
(325, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-2', '20-02-2024', 274, 0, 0, '43', 0, 'undefined2402200016', '', 0, 0),
(326, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-3', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(327, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-3', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 975, 0),
(328, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-3', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(329, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-3', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(330, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-4', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 20000, 0),
(331, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-4', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 17000, 0),
(332, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-4', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(333, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-4', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 20000),
(334, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined24022014-1', '20-02-2024', 272, 0, 0, '14', 0, 'undefined24022014', '', 0, 0),
(335, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined24022014-1', '20-02-2024', 272, 0, 0, '83', 0, 'undefined24022014', '', 1000, 0),
(336, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined24022014-1', '20-02-2024', 272, 0, 0, '74', 0, 'undefined24022014', '', 0, 0),
(337, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined24022014-1', '20-02-2024', 272, 0, 0, '43', 0, 'undefined24022014', '', 0, 0),
(338, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200000-1', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200000', '', 0, 0),
(339, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200000-1', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200000', '', 16800, 0),
(340, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200000-1', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200000', '', 0, 0),
(341, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200000-1', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200000', '', 0, 0),
(342, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-5', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 170000, 0),
(343, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-5', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 98400, 0),
(344, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-5', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(345, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-5', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 170000),
(346, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-2', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 10000, 0),
(347, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-2', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 0, 0),
(348, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-2', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(349, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-2', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 10000),
(350, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-3', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200015', '', 0, 0),
(351, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-3', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200015', '', 1090, 0),
(352, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-3', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200015', '', 0, 0),
(353, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-3', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200015', '', 0, 0),
(354, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-3', '20-02-2024', 274, 0, 0, '14', 0, 'undefined2402200016', '', 0, 0),
(355, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-3', '20-02-2024', 274, 0, 0, '83', 0, 'undefined2402200016', '', 0, 0),
(356, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-3', '20-02-2024', 274, 0, 0, '74', 0, 'undefined2402200016', '', 0, 0),
(357, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-3', '20-02-2024', 274, 0, 0, '43', 0, 'undefined2402200016', '', 0, 0),
(358, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-2', '20-02-2024', 275, 0, 0, '14', 0, 'undefined2402200017', '', 0, 0),
(359, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-2', '20-02-2024', 275, 0, 0, '83', 0, 'undefined2402200017', '', 25200, 0),
(360, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-2', '20-02-2024', 275, 0, 0, '74', 0, 'undefined2402200017', '', 0, 0),
(361, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-2', '20-02-2024', 275, 0, 0, '43', 0, 'undefined2402200017', '', 0, 0),
(362, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-6', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(363, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-6', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 16800, 0),
(364, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-6', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(365, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-6', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(366, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-7', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(367, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-7', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 25200, 0),
(368, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-7', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(369, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-7', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(370, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-8', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 22000, 0),
(371, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-8', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 13090, 0),
(372, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-8', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(373, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-8', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 22000),
(374, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-9', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(375, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-9', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 25200, 0),
(376, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-9', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(377, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-9', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(378, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-10', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(379, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-10', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 25200, 0),
(380, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-10', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(381, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-10', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(382, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-11', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(383, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-11', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 16800, 0),
(384, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-11', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(385, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-11', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(386, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-3', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 0, 0),
(387, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-3', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 16800, 0),
(388, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-3', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(389, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-3', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 0),
(390, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-12', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(391, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-12', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 0, 0),
(392, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-12', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(393, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-12', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(394, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-4', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 0, 0),
(395, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-4', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 0, 0),
(396, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-4', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(397, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-4', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 0),
(398, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-13', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 2200, 0),
(399, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-13', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 1600, 0),
(400, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-13', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(401, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-13', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 2200),
(402, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-5', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 0, 0),
(403, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-5', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 25200, 0),
(404, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-5', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(405, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-5', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 0),
(406, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-4', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200015', '', 0, 0),
(407, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-4', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200015', '', 16800, 0),
(408, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-4', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200015', '', 0, 0),
(409, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-4', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200015', '', 0, 0),
(410, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-14', '20-02-2024', 271, 0, 0, '14', 0, 'undefined2402200013', '', 0, 0),
(411, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-14', '20-02-2024', 271, 0, 0, '83', 0, 'undefined2402200013', '', 0, 0),
(412, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-14', '20-02-2024', 271, 0, 0, '74', 0, 'undefined2402200013', '', 0, 0),
(413, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200013-14', '20-02-2024', 271, 0, 0, '43', 0, 'undefined2402200013', '', 0, 0),
(414, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-6', '20-02-2024', 272, 0, 0, '14', 0, 'undefined2402200014', '', 0, 0),
(415, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-6', '20-02-2024', 272, 0, 0, '83', 0, 'undefined2402200014', '', 975, 0),
(416, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-6', '20-02-2024', 272, 0, 0, '74', 0, 'undefined2402200014', '', 0, 0),
(417, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200014-6', '20-02-2024', 272, 0, 0, '43', 0, 'undefined2402200014', '', 0, 0),
(418, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-5', '20-02-2024', 273, 0, 0, '14', 0, 'undefined2402200015', '', 0, 0),
(419, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-5', '20-02-2024', 273, 0, 0, '83', 0, 'undefined2402200015', '', 25200, 0),
(420, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-5', '20-02-2024', 273, 0, 0, '74', 0, 'undefined2402200015', '', 0, 0),
(421, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200015-5', '20-02-2024', 273, 0, 0, '43', 0, 'undefined2402200015', '', 0, 0),
(422, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-4', '20-02-2024', 274, 0, 0, '14', 0, 'undefined2402200016', '', 0, 0),
(423, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-4', '20-02-2024', 274, 0, 0, '83', 0, 'undefined2402200016', '', 25200, 0),
(424, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-4', '20-02-2024', 274, 0, 0, '74', 0, 'undefined2402200016', '', 0, 0),
(425, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200016-4', '20-02-2024', 274, 0, 0, '43', 0, 'undefined2402200016', '', 0, 0),
(426, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-3', '20-02-2024', 275, 0, 0, '14', 0, 'undefined2402200017', '', 0, 0),
(427, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-3', '20-02-2024', 275, 0, 0, '83', 0, 'undefined2402200017', '', 16800, 0),
(428, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-3', '20-02-2024', 275, 0, 0, '74', 0, 'undefined2402200017', '', 0, 0),
(429, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200017-3', '20-02-2024', 275, 0, 0, '43', 0, 'undefined2402200017', '', 0, 0),
(430, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200018-1', '20-02-2024', 276, 0, 0, '14', 0, 'undefined2402200018', '', 0, 0),
(431, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200018-1', '20-02-2024', 276, 0, 0, '83', 0, 'undefined2402200018', '', 1975, 0),
(432, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200018-1', '20-02-2024', 276, 0, 0, '74', 0, 'undefined2402200018', '', 0, 0),
(433, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200018-1', '20-02-2024', 276, 0, 0, '43', 0, 'undefined2402200018', '', 0, 0),
(434, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200019-1', '20-02-2024', 277, 0, 0, '14', 0, 'undefined2402200019', '', 0, 0),
(435, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200019-1', '20-02-2024', 277, 0, 0, '83', 0, 'undefined2402200019', '', 0, 0),
(436, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200019-1', '20-02-2024', 277, 0, 0, '74', 0, 'undefined2402200019', '', 0, 0),
(437, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200019-1', '20-02-2024', 277, 0, 0, '43', 0, 'undefined2402200019', '', 0, 0),
(438, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200020-1', '20-02-2024', 278, 0, 0, '14', 0, 'undefined2402200020', '', 0, 0),
(439, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200020-1', '20-02-2024', 278, 0, 0, '83', 0, 'undefined2402200020', '', 1975, 0),
(440, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200020-1', '20-02-2024', 278, 0, 0, '74', 0, 'undefined2402200020', '', 0, 0),
(441, 1, NULL, 158, 'PENJUALAN-TUNAI-undefined2402200020-1', '20-02-2024', 278, 0, 0, '43', 0, 'undefined2402200020', '', 0, 0),
(442, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200013-1', '20-02-2024', 271, 0, 0, '14', 0, '42402200013', '', 20000, 0),
(443, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200013-1', '20-02-2024', 271, 0, 0, '83', 0, '42402200013', '', 17000, 0),
(444, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200013-1', '20-02-2024', 271, 0, 0, '74', 0, '42402200013', '', 0, 0),
(445, 1, NULL, 158, 'PENJUALAN-TUNAI-42402200013-1', '20-02-2024', 271, 0, 0, '43', 0, '42402200013', '', 0, 20000),
(446, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210001-1', '21-02-2024', 272, 0, 0, '14', 0, '42402210001', '', 1303333, 0),
(447, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210001-1', '21-02-2024', 272, 0, 0, '83', 0, '42402210001', '', 840000, 0),
(448, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210001-1', '21-02-2024', 272, 0, 0, '74', 0, '42402210001', '', 0, 0),
(449, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210001-1', '21-02-2024', 272, 0, 0, '43', 0, '42402210001', '', 0, 1303333),
(450, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-1', '21-02-2024', 273, 0, 0, '14', 0, '42402210002', '', 40000, 0),
(451, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-1', '21-02-2024', 273, 0, 0, '83', 0, '42402210002', '', 25975, 0),
(452, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-1', '21-02-2024', 273, 0, 0, '74', 0, '42402210002', '', 0, 0),
(453, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-1', '21-02-2024', 273, 0, 0, '43', 0, '42402210002', '', 0, 40000),
(454, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-2', '21-02-2024', 273, 0, 0, '14', 0, '42402210002', '', 22000, 0),
(455, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-2', '21-02-2024', 273, 0, 0, '83', 0, '42402210002', '', 13090, 0),
(456, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-2', '21-02-2024', 273, 0, 0, '74', 0, '42402210002', '', 0, 0),
(457, 1, NULL, 158, 'PENJUALAN-TUNAI-42402210002-2', '21-02-2024', 273, 0, 0, '43', 0, '42402210002', '', 0, 22000),
(458, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220001-1', '22-02-2024', 274, 0, 0, '14', 0, '42402220001', '', 13000, 0),
(459, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220001-1', '22-02-2024', 274, 0, 0, '83', 0, '42402220001', '', 8400, 0),
(460, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220001-1', '22-02-2024', 274, 0, 0, '74', 0, '42402220001', '', 0, 0),
(461, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220001-1', '22-02-2024', 274, 0, 0, '43', 0, '42402220001', '', 0, 13000),
(462, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220002-1', '22-02-2024', 275, 0, 0, '14', 0, '42402220002', '', 40000, 0),
(463, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220002-1', '22-02-2024', 275, 0, 0, '83', 0, '42402220002', '', 33000, 0),
(464, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220002-1', '22-02-2024', 275, 0, 0, '74', 0, '42402220002', '', 0, 0),
(465, 1, NULL, 158, 'PENJUALAN-TUNAI-42402220002-1', '22-02-2024', 275, 0, 0, '43', 0, '42402220002', '', 0, 40000),
(466, 1, NULL, 158, 'RETUR-JUAL-3', '22-02-2024', 0, 0, 0, '6', 0, '', '', 0, 6000),
(467, 1, NULL, 158, 'RETUR-JUAL-3', '22-02-2024', 0, 0, 0, '84', 0, '', '', 6000, 0),
(468, 1, NULL, 158, 'RETUR-JUAL-3', '22-02-2024', 0, 0, 0, '83', 0, '', '', 0, 5000),
(469, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230001-1', '23-02-2024', 276, 0, 0, '83', 0, '12402230001', '', 100000, 0),
(470, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230001-1', '23-02-2024', 276, 0, 0, '74', 0, '12402230001', '', 0, 0),
(471, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230001-1', '23-02-2024', 276, 0, 0, '43', 0, '12402230001', '', 0, 200000),
(472, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230002-1', '23-02-2024', 277, 0, 0, '83', 0, '12402230002', '', 100000, 0),
(473, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230002-1', '23-02-2024', 277, 0, 0, '74', 0, '12402230002', '', 0, 0),
(474, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230002-1', '23-02-2024', 277, 0, 0, '43', 0, '12402230002', '', 0, 200000),
(475, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230001-1', '23-02-2024', 1, 0, 0, '14', 0, '42402230001', '', 220000, 0),
(476, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230001-1', '23-02-2024', 1, 0, 0, '83', 0, '42402230001', '', 120000, 0),
(477, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230001-1', '23-02-2024', 1, 0, 0, '74', 0, '42402230001', '', 0, 0),
(478, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230001-1', '23-02-2024', 1, 0, 0, '43', 0, '42402230001', '', 0, 220000),
(480, 1, NULL, 158, 'PEMBELIAN-TUNAI-3', '23-02-2024', 10, 0, 0, '12', 0, '2302241501', '', 0, 0),
(481, 1, NULL, 158, 'PEMBELIAN-TUNAI-4', '23-02-2024', 11, 0, 0, '12', 0, '23022412102', '', 0, 600000),
(482, 1, NULL, 158, 'PEMBELIAN-TUNAI-5', '23-02-2024', 12, 0, 0, '12', 0, '23022412103', '', 0, 190000),
(483, 1, NULL, 158, 'PEMBELIAN-TUNAI-6', '23-02-2024', 13, 0, 0, '12', 0, '23022412104', '', 0, 1010000),
(484, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230002-1', '23-02-2024', 2, 0, 0, '14', 0, '42402230002', '', 22000, 0),
(485, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230002-1', '23-02-2024', 2, 0, 0, '83', 0, '42402230002', '', 15400, 0);
INSERT INTO `jurnal` (`id`, `id_users`, `id_jurnal`, `id_toko`, `kode`, `tgl`, `id_proses`, `id_piutang`, `id_hutang`, `id_akun`, `id_transaksi`, `no_faktur`, `keterangan`, `debet`, `kredit`) VALUES
(486, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230002-1', '23-02-2024', 2, 0, 0, '74', 0, '42402230002', '', 0, 0),
(487, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230002-1', '23-02-2024', 2, 0, 0, '43', 0, '42402230002', '', 0, 22000),
(488, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230003-1', '23-02-2024', 3, 0, 0, '14', 0, '42402230003', '', 13000, 0),
(489, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230003-1', '23-02-2024', 3, 0, 0, '83', 0, '42402230003', '', 8400, 0),
(490, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230003-1', '23-02-2024', 3, 0, 0, '74', 0, '42402230003', '', 0, 0),
(491, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230003-1', '23-02-2024', 3, 0, 0, '43', 0, '42402230003', '', 0, 13000),
(492, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230004-1', '23-02-2024', 4, 0, 0, '14', 0, '42402230004', '', 0, 0),
(493, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230004-1', '23-02-2024', 4, 0, 0, '83', 0, '42402230004', '', 1090, 0),
(494, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230004-1', '23-02-2024', 4, 0, 0, '74', 0, '42402230004', '', 0, 0),
(495, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230004-1', '23-02-2024', 4, 0, 0, '43', 0, '42402230004', '', 0, 0),
(496, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230005-1', '23-02-2024', 5, 0, 0, '14', 0, '42402230005', '', 22000, 0),
(497, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230005-1', '23-02-2024', 5, 0, 0, '83', 0, '42402230005', '', 13090, 0),
(498, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230005-1', '23-02-2024', 5, 0, 0, '74', 0, '42402230005', '', 0, 0),
(499, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230005-1', '23-02-2024', 5, 0, 0, '43', 0, '42402230005', '', 0, 22000),
(500, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230006-1', '23-02-2024', 6, 0, 0, '14', 0, '42402230006', '', 17000, 0),
(501, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230006-1', '23-02-2024', 6, 0, 0, '83', 0, '42402230006', '', 14000, 0),
(502, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230006-1', '23-02-2024', 6, 0, 0, '74', 0, '42402230006', '', 0, 0),
(503, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230006-1', '23-02-2024', 6, 0, 0, '43', 0, '42402230006', '', 0, 17000),
(504, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230007-1', '23-02-2024', 7, 0, 0, '14', 0, '42402230007', '', 12500, 0),
(505, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230007-1', '23-02-2024', 7, 0, 0, '83', 0, '42402230007', '', 8975, 0),
(506, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230007-1', '23-02-2024', 7, 0, 0, '74', 0, '42402230007', '', 0, 0),
(507, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230007-1', '23-02-2024', 7, 0, 0, '43', 0, '42402230007', '', 0, 12500),
(508, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230008-1', '23-02-2024', 8, 0, 0, '14', 0, '42402230008', '', 12500, 0),
(509, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230008-1', '23-02-2024', 8, 0, 0, '83', 0, '42402230008', '', 8975, 0),
(510, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230008-1', '23-02-2024', 8, 0, 0, '74', 0, '42402230008', '', 0, 0),
(511, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230008-1', '23-02-2024', 8, 0, 0, '43', 0, '42402230008', '', 0, 12500),
(512, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230009-1', '23-02-2024', 9, 0, 0, '14', 0, '42402230009', '', 12500, 0),
(513, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230009-1', '23-02-2024', 9, 0, 0, '83', 0, '42402230009', '', 8975, 0),
(514, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230009-1', '23-02-2024', 9, 0, 0, '74', 0, '42402230009', '', 0, 0),
(515, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230009-1', '23-02-2024', 9, 0, 0, '43', 0, '42402230009', '', 0, 12500),
(516, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230010-1', '23-02-2024', 10, 0, 0, '14', 0, '42402230010', '', 0, 0),
(517, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230010-1', '23-02-2024', 10, 0, 0, '83', 0, '42402230010', '', 1600, 0),
(518, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230010-1', '23-02-2024', 10, 0, 0, '74', 0, '42402230010', '', 0, 0),
(519, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230010-1', '23-02-2024', 10, 0, 0, '43', 0, '42402230010', '', 0, 0),
(520, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230011-1', '23-02-2024', 11, 0, 0, '14', 0, '42402230011', '', 0, 0),
(521, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230011-1', '23-02-2024', 11, 0, 0, '83', 0, '42402230011', '', 0, 0),
(522, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230011-1', '23-02-2024', 11, 0, 0, '74', 0, '42402230011', '', 0, 0),
(523, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230011-1', '23-02-2024', 11, 0, 0, '43', 0, '42402230011', '', 0, 0),
(524, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230012-1', '23-02-2024', 12, 0, 0, '14', 0, '42402230012', '', 2222, 0),
(525, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230012-1', '23-02-2024', 12, 0, 0, '83', 0, '42402230012', '', 1111, 0),
(526, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230012-1', '23-02-2024', 12, 0, 0, '74', 0, '42402230012', '', 0, 0),
(527, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230012-1', '23-02-2024', 12, 0, 0, '43', 0, '42402230012', '', 0, 2222),
(528, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230013-1', '23-02-2024', 13, 0, 0, '14', 0, '42402230013', '', 0, 0),
(529, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230013-1', '23-02-2024', 13, 0, 0, '83', 0, '42402230013', '', 0, 0),
(530, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230013-1', '23-02-2024', 13, 0, 0, '74', 0, '42402230013', '', 0, 0),
(531, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230013-1', '23-02-2024', 13, 0, 0, '43', 0, '42402230013', '', 0, 0),
(532, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230014-1', '23-02-2024', 14, 0, 0, '14', 0, '42402230014', '', 100000, 0),
(533, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230014-1', '23-02-2024', 14, 0, 0, '83', 0, '42402230014', '', 52600, 0),
(534, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230014-1', '23-02-2024', 14, 0, 0, '74', 0, '42402230014', '', 0, 0),
(535, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230014-1', '23-02-2024', 14, 0, 0, '43', 0, '42402230014', '', 0, 100000),
(536, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230015-1', '23-02-2024', 15, 0, 0, '14', 0, '42402230015', '', 0, 0),
(537, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230015-1', '23-02-2024', 15, 0, 0, '83', 0, '42402230015', '', 1600, 0),
(538, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230015-1', '23-02-2024', 15, 0, 0, '74', 0, '42402230015', '', 0, 0),
(539, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230015-1', '23-02-2024', 15, 0, 0, '43', 0, '42402230015', '', 0, 0),
(540, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230016-1', '23-02-2024', 16, 0, 0, '14', 0, '42402230016', '', 0, 0),
(541, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230016-1', '23-02-2024', 16, 0, 0, '83', 0, '42402230016', '', 25200, 0),
(542, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230016-1', '23-02-2024', 16, 0, 0, '74', 0, '42402230016', '', 0, 0),
(543, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230016-1', '23-02-2024', 16, 0, 0, '43', 0, '42402230016', '', 0, 0),
(544, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230017-1', '23-02-2024', 17, 0, 0, '14', 0, '42402230017', '', 22000, 0),
(545, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230017-1', '23-02-2024', 17, 0, 0, '83', 0, '42402230017', '', 13090, 0),
(546, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230017-1', '23-02-2024', 17, 0, 0, '74', 0, '42402230017', '', 0, 0),
(547, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230017-1', '23-02-2024', 17, 0, 0, '43', 0, '42402230017', '', 0, 22000),
(548, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230018-1', '23-02-2024', 18, 0, 0, '14', 0, '42402230018', '', 100000, 0),
(549, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230018-1', '23-02-2024', 18, 0, 0, '83', 0, '42402230018', '', 52600, 0),
(550, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230018-1', '23-02-2024', 18, 0, 0, '74', 0, '42402230018', '', 0, 0),
(551, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230018-1', '23-02-2024', 18, 0, 0, '43', 0, '42402230018', '', 0, 100000),
(552, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230019-1', '23-02-2024', 19, 0, 0, '14', 0, '42402230019', '', 0, 0),
(553, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230019-1', '23-02-2024', 19, 0, 0, '83', 0, '42402230019', '', 16800, 0),
(554, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230019-1', '23-02-2024', 19, 0, 0, '74', 0, '42402230019', '', 0, 0),
(555, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230019-1', '23-02-2024', 19, 0, 0, '43', 0, '42402230019', '', 0, 0),
(556, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230020-1', '23-02-2024', 20, 0, 0, '14', 0, '42402230020', '', 0, 0),
(557, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230020-1', '23-02-2024', 20, 0, 0, '83', 0, '42402230020', '', 25200, 0),
(558, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230020-1', '23-02-2024', 20, 0, 0, '74', 0, '42402230020', '', 0, 0),
(559, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230020-1', '23-02-2024', 20, 0, 0, '43', 0, '42402230020', '', 0, 0),
(560, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230021-1', '23-02-2024', 21, 0, 0, '14', 0, '42402230021', '', 22000, 0),
(561, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230021-1', '23-02-2024', 21, 0, 0, '83', 0, '42402230021', '', 13090, 0),
(562, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230021-1', '23-02-2024', 21, 0, 0, '74', 0, '42402230021', '', 0, 0),
(563, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230021-1', '23-02-2024', 21, 0, 0, '43', 0, '42402230021', '', 0, 22000),
(564, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230022-1', '23-02-2024', 22, 0, 0, '14', 0, '42402230022', '', 0, 0),
(565, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230022-1', '23-02-2024', 22, 0, 0, '83', 0, '42402230022', '', 0, 0),
(566, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230022-1', '23-02-2024', 22, 0, 0, '74', 0, '42402230022', '', 0, 0),
(567, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230022-1', '23-02-2024', 22, 0, 0, '43', 0, '42402230022', '', 0, 0),
(568, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230023-1', '23-02-2024', 23, 0, 0, '14', 0, '42402230023', '', 12500, 0),
(569, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230023-1', '23-02-2024', 23, 0, 0, '83', 0, '42402230023', '', 8975, 0),
(570, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230023-1', '23-02-2024', 23, 0, 0, '74', 0, '42402230023', '', 0, 0),
(571, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230023-1', '23-02-2024', 23, 0, 0, '43', 0, '42402230023', '', 0, 12500),
(572, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230024-1', '23-02-2024', 24, 0, 0, '14', 0, '42402230024', '', 30000, 0),
(573, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230024-1', '23-02-2024', 24, 0, 0, '83', 0, '42402230024', '', 28000, 0),
(574, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230024-1', '23-02-2024', 24, 0, 0, '74', 0, '42402230024', '', 0, 0),
(575, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230024-1', '23-02-2024', 24, 0, 0, '43', 0, '42402230024', '', 0, 30000),
(576, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230025-1', '23-02-2024', 25, 0, 0, '14', 0, '42402230025', '', 0, 0),
(577, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230025-1', '23-02-2024', 25, 0, 0, '83', 0, '42402230025', '', 1600, 0),
(578, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230025-1', '23-02-2024', 25, 0, 0, '74', 0, '42402230025', '', 0, 0),
(579, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230025-1', '23-02-2024', 25, 0, 0, '43', 0, '42402230025', '', 0, 0),
(580, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230026-1', '23-02-2024', 26, 0, 0, '14', 0, '42402230026', '', 22000, 0),
(581, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230026-1', '23-02-2024', 26, 0, 0, '83', 0, '42402230026', '', 13090, 0),
(582, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230026-1', '23-02-2024', 26, 0, 0, '74', 0, '42402230026', '', 0, 0),
(583, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230026-1', '23-02-2024', 26, 0, 0, '43', 0, '42402230026', '', 0, 22000),
(584, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230027-1', '23-02-2024', 27, 0, 0, '14', 0, '42402230027', '', 200000, 0),
(585, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230027-1', '23-02-2024', 27, 0, 0, '83', 0, '42402230027', '', 100000, 0),
(586, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230027-1', '23-02-2024', 27, 0, 0, '74', 0, '42402230027', '', 0, 0),
(587, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230027-1', '23-02-2024', 27, 0, 0, '43', 0, '42402230027', '', 0, 200000),
(588, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230028-1', '23-02-2024', 28, 0, 0, '14', 0, '42402230028', '', 200000, 0),
(589, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230028-1', '23-02-2024', 28, 0, 0, '83', 0, '42402230028', '', 100000, 0),
(590, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230028-1', '23-02-2024', 28, 0, 0, '74', 0, '42402230028', '', 0, 0),
(591, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230028-1', '23-02-2024', 28, 0, 0, '43', 0, '42402230028', '', 0, 200000),
(592, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230029-1', '23-02-2024', 29, 0, 0, '14', 0, '42402230029', '', 0, 0),
(593, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230029-1', '23-02-2024', 29, 0, 0, '83', 0, '42402230029', '', 25200, 0),
(594, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230029-1', '23-02-2024', 29, 0, 0, '74', 0, '42402230029', '', 0, 0),
(595, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230029-1', '23-02-2024', 29, 0, 0, '43', 0, '42402230029', '', 0, 0),
(596, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230030-1', '23-02-2024', 30, 0, 0, '14', 0, '42402230030', '', 170000, 0),
(597, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230030-1', '23-02-2024', 30, 0, 0, '83', 0, '42402230030', '', 98400, 0),
(598, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230030-1', '23-02-2024', 30, 0, 0, '74', 0, '42402230030', '', 0, 0),
(599, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230030-1', '23-02-2024', 30, 0, 0, '43', 0, '42402230030', '', 0, 170000),
(600, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230031-1', '23-02-2024', 31, 0, 0, '14', 0, '42402230031', '', 12500, 0),
(601, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230031-1', '23-02-2024', 31, 0, 0, '83', 0, '42402230031', '', 8975, 0),
(602, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230031-1', '23-02-2024', 31, 0, 0, '74', 0, '42402230031', '', 0, 0),
(603, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230031-1', '23-02-2024', 31, 0, 0, '43', 0, '42402230031', '', 0, 12500),
(604, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230032-1', '23-02-2024', 32, 0, 0, '14', 0, '42402230032', '', 0, 0),
(605, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230032-1', '23-02-2024', 32, 0, 0, '83', 0, '42402230032', '', 25200, 0),
(606, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230032-1', '23-02-2024', 32, 0, 0, '74', 0, '42402230032', '', 0, 0),
(607, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230032-1', '23-02-2024', 32, 0, 0, '43', 0, '42402230032', '', 0, 0),
(608, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230033-1', '23-02-2024', 33, 0, 0, '14', 0, '42402230033', '', 6000, 0),
(609, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230033-1', '23-02-2024', 33, 0, 0, '83', 0, '42402230033', '', 5000, 0),
(610, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230033-1', '23-02-2024', 33, 0, 0, '74', 0, '42402230033', '', 0, 0),
(611, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230033-1', '23-02-2024', 33, 0, 0, '43', 0, '42402230033', '', 0, 6000),
(612, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230034-1', '23-02-2024', 34, 0, 0, '14', 0, '42402230034', '', 0, 0),
(613, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230034-1', '23-02-2024', 34, 0, 0, '83', 0, '42402230034', '', 16800, 0),
(614, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230034-1', '23-02-2024', 34, 0, 0, '74', 0, '42402230034', '', 0, 0),
(615, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230034-1', '23-02-2024', 34, 0, 0, '43', 0, '42402230034', '', 0, 0),
(616, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230035-1', '23-02-2024', 35, 0, 0, '14', 0, '42402230035', '', 0, 0),
(617, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230035-1', '23-02-2024', 35, 0, 0, '83', 0, '42402230035', '', 1090, 0),
(618, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230035-1', '23-02-2024', 35, 0, 0, '74', 0, '42402230035', '', 0, 0),
(619, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230035-1', '23-02-2024', 35, 0, 0, '43', 0, '42402230035', '', 0, 0),
(620, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230036-1', '23-02-2024', 36, 0, 0, '14', 0, '42402230036', '', 0, 0),
(621, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230036-1', '23-02-2024', 36, 0, 0, '83', 0, '42402230036', '', 975, 0),
(622, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230036-1', '23-02-2024', 36, 0, 0, '74', 0, '42402230036', '', 0, 0),
(623, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230036-1', '23-02-2024', 36, 0, 0, '43', 0, '42402230036', '', 0, 0),
(624, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230037-1', '23-02-2024', 37, 0, 0, '14', 0, '42402230037', '', 30000, 0),
(625, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230037-1', '23-02-2024', 37, 0, 0, '83', 0, '42402230037', '', 28000, 0),
(626, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230037-1', '23-02-2024', 37, 0, 0, '74', 0, '42402230037', '', 0, 0),
(627, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230037-1', '23-02-2024', 37, 0, 0, '43', 0, '42402230037', '', 0, 30000),
(628, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230038-1', '23-02-2024', 38, 0, 0, '14', 0, '42402230038', '', 15000, 0),
(629, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230038-1', '23-02-2024', 38, 0, 0, '83', 0, '42402230038', '', 0, 0),
(630, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230038-1', '23-02-2024', 38, 0, 0, '74', 0, '42402230038', '', 0, 0),
(631, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230038-1', '23-02-2024', 38, 0, 0, '43', 0, '42402230038', '', 0, 15000),
(632, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230039-1', '23-02-2024', 39, 0, 0, '14', 0, '42402230039', '', 22000, 0),
(633, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230039-1', '23-02-2024', 39, 0, 0, '83', 0, '42402230039', '', 13090, 0),
(634, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230039-1', '23-02-2024', 39, 0, 0, '74', 0, '42402230039', '', 0, 0),
(635, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230039-1', '23-02-2024', 39, 0, 0, '43', 0, '42402230039', '', 0, 22000),
(636, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230040-1', '23-02-2024', 40, 0, 0, '14', 0, '42402230040', '', 0, 0),
(637, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230040-1', '23-02-2024', 40, 0, 0, '83', 0, '42402230040', '', 25200, 0),
(638, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230040-1', '23-02-2024', 40, 0, 0, '74', 0, '42402230040', '', 0, 0),
(639, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230040-1', '23-02-2024', 40, 0, 0, '43', 0, '42402230040', '', 0, 0),
(640, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230041-1', '23-02-2024', 41, 0, 0, '14', 0, '42402230041', '', 12500, 0),
(641, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230041-1', '23-02-2024', 41, 0, 0, '83', 0, '42402230041', '', 8975, 0),
(642, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230041-1', '23-02-2024', 41, 0, 0, '74', 0, '42402230041', '', 0, 0),
(643, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230041-1', '23-02-2024', 41, 0, 0, '43', 0, '42402230041', '', 0, 12500),
(644, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230042-1', '23-02-2024', 42, 0, 0, '14', 0, '42402230042', '', 12500, 0),
(645, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230042-1', '23-02-2024', 42, 0, 0, '83', 0, '42402230042', '', 8975, 0),
(646, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230042-1', '23-02-2024', 42, 0, 0, '74', 0, '42402230042', '', 0, 0),
(647, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230042-1', '23-02-2024', 42, 0, 0, '43', 0, '42402230042', '', 0, 12500),
(648, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230043-1', '23-02-2024', 43, 0, 0, '14', 0, '42402230043', '', 2200, 0),
(649, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230043-1', '23-02-2024', 43, 0, 0, '83', 0, '42402230043', '', 1600, 0),
(650, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230043-1', '23-02-2024', 43, 0, 0, '74', 0, '42402230043', '', 0, 0),
(651, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230043-1', '23-02-2024', 43, 0, 0, '43', 0, '42402230043', '', 0, 2200),
(652, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230044-1', '23-02-2024', 44, 0, 0, '14', 0, '42402230044', '', 6000, 0),
(653, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230044-1', '23-02-2024', 44, 0, 0, '83', 0, '42402230044', '', 5000, 0),
(654, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230044-1', '23-02-2024', 44, 0, 0, '74', 0, '42402230044', '', 0, 0),
(655, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230044-1', '23-02-2024', 44, 0, 0, '43', 0, '42402230044', '', 0, 6000),
(656, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230045-1', '23-02-2024', 45, 0, 0, '14', 0, '42402230045', '', 22000, 0),
(657, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230045-1', '23-02-2024', 45, 0, 0, '83', 0, '42402230045', '', 13090, 0),
(658, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230045-1', '23-02-2024', 45, 0, 0, '74', 0, '42402230045', '', 0, 0),
(659, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230045-1', '23-02-2024', 45, 0, 0, '43', 0, '42402230045', '', 0, 22000),
(660, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230046-1', '23-02-2024', 46, 0, 0, '14', 0, '42402230046', '', 0, 0),
(661, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230046-1', '23-02-2024', 46, 0, 0, '83', 0, '42402230046', '', 1090, 0),
(662, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230046-1', '23-02-2024', 46, 0, 0, '74', 0, '42402230046', '', 0, 0),
(663, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230046-1', '23-02-2024', 46, 0, 0, '43', 0, '42402230046', '', 0, 0),
(664, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230047-1', '23-02-2024', 47, 0, 0, '14', 0, '42402230047', '', 0, 0),
(665, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230047-1', '23-02-2024', 47, 0, 0, '83', 0, '42402230047', '', 1975, 0),
(666, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230047-1', '23-02-2024', 47, 0, 0, '74', 0, '42402230047', '', 0, 0),
(667, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230047-1', '23-02-2024', 47, 0, 0, '43', 0, '42402230047', '', 0, 0),
(668, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230048-1', '23-02-2024', 48, 0, 0, '14', 0, '42402230048', '', 40000, 0),
(669, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230048-1', '23-02-2024', 48, 0, 0, '83', 0, '42402230048', '', 33000, 0),
(670, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230048-1', '23-02-2024', 48, 0, 0, '74', 0, '42402230048', '', 0, 0),
(671, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230048-1', '23-02-2024', 48, 0, 0, '43', 0, '42402230048', '', 0, 40000),
(672, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230049-1', '23-02-2024', 49, 0, 0, '14', 0, '42402230049', '', 0, 0),
(673, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230049-1', '23-02-2024', 49, 0, 0, '83', 0, '42402230049', '', 1975, 0),
(674, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230049-1', '23-02-2024', 49, 0, 0, '74', 0, '42402230049', '', 0, 0),
(675, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230049-1', '23-02-2024', 49, 0, 0, '43', 0, '42402230049', '', 0, 0),
(676, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230050-1', '23-02-2024', 50, 0, 0, '14', 0, '42402230050', '', 13000, 0),
(677, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230050-1', '23-02-2024', 50, 0, 0, '83', 0, '42402230050', '', 0, 0),
(678, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230050-1', '23-02-2024', 50, 0, 0, '74', 0, '42402230050', '', 0, 0),
(679, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230050-1', '23-02-2024', 50, 0, 0, '43', 0, '42402230050', '', 0, 13000),
(680, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230051-1', '23-02-2024', 51, 0, 0, '14', 0, '42402230051', '', 0, 0),
(681, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230051-1', '23-02-2024', 51, 0, 0, '83', 0, '42402230051', '', 16800, 0),
(682, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230051-1', '23-02-2024', 51, 0, 0, '74', 0, '42402230051', '', 0, 0),
(683, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230051-1', '23-02-2024', 51, 0, 0, '43', 0, '42402230051', '', 0, 0),
(684, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230052-1', '23-02-2024', 52, 0, 0, '14', 0, '42402230052', '', 0, 0),
(685, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230052-1', '23-02-2024', 52, 0, 0, '83', 0, '42402230052', '', 0, 0),
(686, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230052-1', '23-02-2024', 52, 0, 0, '74', 0, '42402230052', '', 0, 0),
(687, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230052-1', '23-02-2024', 52, 0, 0, '43', 0, '42402230052', '', 0, 0),
(688, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230053-1', '23-02-2024', 53, 0, 0, '14', 0, '42402230053', '', 0, 0),
(689, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230053-1', '23-02-2024', 53, 0, 0, '83', 0, '42402230053', '', 25200, 0),
(690, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230053-1', '23-02-2024', 53, 0, 0, '74', 0, '42402230053', '', 0, 0),
(691, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230053-1', '23-02-2024', 53, 0, 0, '43', 0, '42402230053', '', 0, 0),
(692, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230054-1', '23-02-2024', 54, 0, 0, '14', 0, '42402230054', '', 0, 0),
(693, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230054-1', '23-02-2024', 54, 0, 0, '83', 0, '42402230054', '', 25200, 0),
(694, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230054-1', '23-02-2024', 54, 0, 0, '74', 0, '42402230054', '', 0, 0),
(695, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230054-1', '23-02-2024', 54, 0, 0, '43', 0, '42402230054', '', 0, 0),
(696, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230055-1', '23-02-2024', 55, 0, 0, '14', 0, '42402230055', '', 0, 0),
(697, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230055-1', '23-02-2024', 55, 0, 0, '83', 0, '42402230055', '', 25200, 0),
(698, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230055-1', '23-02-2024', 55, 0, 0, '74', 0, '42402230055', '', 0, 0),
(699, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230055-1', '23-02-2024', 55, 0, 0, '43', 0, '42402230055', '', 0, 0),
(700, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230056-1', '23-02-2024', 56, 0, 0, '14', 0, '42402230056', '', 0, 0),
(701, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230056-1', '23-02-2024', 56, 0, 0, '83', 0, '42402230056', '', 25200, 0),
(702, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230056-1', '23-02-2024', 56, 0, 0, '74', 0, '42402230056', '', 0, 0),
(703, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230056-1', '23-02-2024', 56, 0, 0, '43', 0, '42402230056', '', 0, 0),
(704, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230057-1', '23-02-2024', 57, 0, 0, '14', 0, '42402230057', '', 22000, 0),
(705, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230057-1', '23-02-2024', 57, 0, 0, '83', 0, '42402230057', '', 13090, 0),
(706, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230057-1', '23-02-2024', 57, 0, 0, '74', 0, '42402230057', '', 0, 0),
(707, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230057-1', '23-02-2024', 57, 0, 0, '43', 0, '42402230057', '', 0, 22000),
(708, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230058-1', '23-02-2024', 58, 0, 0, '14', 0, '42402230058', '', 22000, 0),
(709, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230058-1', '23-02-2024', 58, 0, 0, '83', 0, '42402230058', '', 13090, 0),
(710, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230058-1', '23-02-2024', 58, 0, 0, '74', 0, '42402230058', '', 0, 0),
(711, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230058-1', '23-02-2024', 58, 0, 0, '43', 0, '42402230058', '', 0, 22000),
(712, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230059-1', '23-02-2024', 59, 0, 0, '14', 0, '42402230059', '', 0, 0),
(713, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230059-1', '23-02-2024', 59, 0, 0, '83', 0, '42402230059', '', 1975, 0),
(714, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230059-1', '23-02-2024', 59, 0, 0, '74', 0, '42402230059', '', 0, 0),
(715, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230059-1', '23-02-2024', 59, 0, 0, '43', 0, '42402230059', '', 0, 0),
(716, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230060-1', '23-02-2024', 60, 0, 0, '14', 0, '42402230060', '', 0, 0),
(717, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230060-1', '23-02-2024', 60, 0, 0, '83', 0, '42402230060', '', 975, 0),
(718, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230060-1', '23-02-2024', 60, 0, 0, '74', 0, '42402230060', '', 0, 0),
(719, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230060-1', '23-02-2024', 60, 0, 0, '43', 0, '42402230060', '', 0, 0),
(720, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230061-1', '23-02-2024', 61, 0, 0, '14', 0, '42402230061', '', 0, 0),
(721, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230061-1', '23-02-2024', 61, 0, 0, '83', 0, '42402230061', '', 0, 0),
(722, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230061-1', '23-02-2024', 61, 0, 0, '74', 0, '42402230061', '', 0, 0),
(723, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230061-1', '23-02-2024', 61, 0, 0, '43', 0, '42402230061', '', 0, 0),
(724, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230062-1', '23-02-2024', 62, 0, 0, '14', 0, '42402230062', '', 6000, 0),
(725, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230062-1', '23-02-2024', 62, 0, 0, '83', 0, '42402230062', '', 5000, 0),
(726, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230062-1', '23-02-2024', 62, 0, 0, '74', 0, '42402230062', '', 0, 0),
(727, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230062-1', '23-02-2024', 62, 0, 0, '43', 0, '42402230062', '', 0, 6000),
(728, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230063-1', '23-02-2024', 63, 0, 0, '5', 0, '42402230063', '', 12500, 0),
(729, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230063-1', '23-02-2024', 63, 0, 0, '83', 0, '42402230063', '', 8975, 0),
(730, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230063-1', '23-02-2024', 63, 0, 0, '74', 0, '42402230063', '', 0, 0),
(731, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230063-1', '23-02-2024', 63, 0, 0, '43', 0, '42402230063', '', 0, 12500),
(732, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230064-1', '23-02-2024', 64, 0, 0, '14', 0, '42402230064', '', 170000, 0),
(733, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230064-1', '23-02-2024', 64, 0, 0, '83', 0, '42402230064', '', 98400, 0),
(734, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230064-1', '23-02-2024', 64, 0, 0, '74', 0, '42402230064', '', 0, 0),
(735, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230064-1', '23-02-2024', 64, 0, 0, '43', 0, '42402230064', '', 0, 170000),
(736, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230065-1', '23-02-2024', 65, 0, 0, '14', 0, '42402230065', '', 0, 0),
(737, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230065-1', '23-02-2024', 65, 0, 0, '83', 0, '42402230065', '', 25200, 0),
(738, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230065-1', '23-02-2024', 65, 0, 0, '74', 0, '42402230065', '', 0, 0),
(739, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230065-1', '23-02-2024', 65, 0, 0, '43', 0, '42402230065', '', 0, 0),
(740, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230066-1', '23-02-2024', 66, 0, 0, '14', 0, '42402230066', '', 0, 0),
(741, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230066-1', '23-02-2024', 66, 0, 0, '83', 0, '42402230066', '', 1090, 0),
(742, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230066-1', '23-02-2024', 66, 0, 0, '74', 0, '42402230066', '', 0, 0),
(743, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230066-1', '23-02-2024', 66, 0, 0, '43', 0, '42402230066', '', 0, 0),
(744, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230067-1', '23-02-2024', 67, 0, 0, '14', 0, '42402230067', '', 0, 0),
(745, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230067-1', '23-02-2024', 67, 0, 0, '83', 0, '42402230067', '', 16800, 0),
(746, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230067-1', '23-02-2024', 67, 0, 0, '74', 0, '42402230067', '', 0, 0),
(747, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230067-1', '23-02-2024', 67, 0, 0, '43', 0, '42402230067', '', 0, 0),
(748, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230068-1', '23-02-2024', 68, 0, 0, '14', 0, '42402230068', '', 420000, 0),
(749, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230068-1', '23-02-2024', 68, 0, 0, '83', 0, '42402230068', '', 220000, 0),
(750, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230068-1', '23-02-2024', 68, 0, 0, '74', 0, '42402230068', '', 0, 0),
(751, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230068-1', '23-02-2024', 68, 0, 0, '43', 0, '42402230068', '', 0, 420000),
(752, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230069-1', '23-02-2024', 69, 0, 0, '14', 0, '42402230069', '', 420000, 0),
(753, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230069-1', '23-02-2024', 69, 0, 0, '83', 0, '42402230069', '', 220000, 0),
(754, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230069-1', '23-02-2024', 69, 0, 0, '74', 0, '42402230069', '', 0, 0),
(755, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230069-1', '23-02-2024', 69, 0, 0, '43', 0, '42402230069', '', 0, 420000),
(756, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230070-1', '23-02-2024', 70, 0, 0, '14', 0, '42402230070', '', 620000, 0),
(757, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230070-1', '23-02-2024', 70, 0, 0, '83', 0, '42402230070', '', 320000, 0),
(758, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230070-1', '23-02-2024', 70, 0, 0, '74', 0, '42402230070', '', 0, 0),
(759, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230070-1', '23-02-2024', 70, 0, 0, '43', 0, '42402230070', '', 0, 620000),
(760, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230071-1', '23-02-2024', 71, 0, 0, '14', 0, '42402230071', '', 20000, 0),
(761, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230071-1', '23-02-2024', 71, 0, 0, '83', 0, '42402230071', '', 17000, 0),
(762, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230071-1', '23-02-2024', 71, 0, 0, '74', 0, '42402230071', '', 0, 0),
(763, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230071-1', '23-02-2024', 71, 0, 0, '43', 0, '42402230071', '', 0, 20000),
(764, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230072-1', '23-02-2024', 72, 0, 0, '14', 0, '42402230072', '', 20000, 0),
(765, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230072-1', '23-02-2024', 72, 0, 0, '83', 0, '42402230072', '', 17000, 0),
(766, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230072-1', '23-02-2024', 72, 0, 0, '74', 0, '42402230072', '', 0, 0),
(767, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230072-1', '23-02-2024', 72, 0, 0, '43', 0, '42402230072', '', 0, 20000),
(768, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230073-1', '23-02-2024', 73, 0, 0, '14', 0, '42402230073', '', 170000, 0),
(769, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230073-1', '23-02-2024', 73, 0, 0, '83', 0, '42402230073', '', 98400, 0),
(770, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230073-1', '23-02-2024', 73, 0, 0, '74', 0, '42402230073', '', 0, 0),
(771, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230073-1', '23-02-2024', 73, 0, 0, '43', 0, '42402230073', '', 0, 170000),
(772, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230074-1', '23-02-2024', 74, 0, 0, '14', 0, '42402230074', '', 0, 0),
(773, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230074-1', '23-02-2024', 74, 0, 0, '83', 0, '42402230074', '', 975, 0),
(774, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230074-1', '23-02-2024', 74, 0, 0, '74', 0, '42402230074', '', 0, 0),
(775, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230074-1', '23-02-2024', 74, 0, 0, '43', 0, '42402230074', '', 0, 0),
(776, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230075-1', '23-02-2024', 75, 0, 0, '14', 0, '42402230075', '', 40000, 0),
(777, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230075-1', '23-02-2024', 75, 0, 0, '83', 0, '42402230075', '', 34000, 0),
(778, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230075-1', '23-02-2024', 75, 0, 0, '74', 0, '42402230075', '', 0, 0),
(779, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230075-1', '23-02-2024', 75, 0, 0, '43', 0, '42402230075', '', 0, 40000),
(780, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230076-1', '23-02-2024', 76, 0, 0, '14', 0, '42402230076', '', 200000, 0),
(781, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230076-1', '23-02-2024', 76, 0, 0, '83', 0, '42402230076', '', 100000, 0),
(782, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230076-1', '23-02-2024', 76, 0, 0, '74', 0, '42402230076', '', 0, 0),
(783, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230076-1', '23-02-2024', 76, 0, 0, '43', 0, '42402230076', '', 0, 200000),
(784, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230077-1', '23-02-2024', 77, 0, 0, '14', 0, '42402230077', '', 220000, 0),
(785, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230077-1', '23-02-2024', 77, 0, 0, '83', 0, '42402230077', '', 120000, 0),
(786, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230077-1', '23-02-2024', 77, 0, 0, '74', 0, '42402230077', '', 0, 0),
(787, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230077-1', '23-02-2024', 77, 0, 0, '43', 0, '42402230077', '', 0, 220000),
(788, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230078-1', '23-02-2024', 78, 0, 0, '14', 0, '42402230078', '', 200000, 0),
(789, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230078-1', '23-02-2024', 78, 0, 0, '83', 0, '42402230078', '', 100000, 0),
(790, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230078-1', '23-02-2024', 78, 0, 0, '74', 0, '42402230078', '', 0, 0),
(791, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230078-1', '23-02-2024', 78, 0, 0, '43', 0, '42402230078', '', 0, 200000),
(792, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230079-1', '23-02-2024', 79, 0, 0, '14', 0, '42402230079', '', 200000, 0),
(793, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230079-1', '23-02-2024', 79, 0, 0, '83', 0, '42402230079', '', 100000, 0),
(794, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230079-1', '23-02-2024', 79, 0, 0, '74', 0, '42402230079', '', 0, 0),
(795, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230079-1', '23-02-2024', 79, 0, 0, '43', 0, '42402230079', '', 0, 200000),
(796, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230080-1', '23-02-2024', 80, 0, 0, '14', 0, '42402230080', '', 220000, 0),
(797, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230080-1', '23-02-2024', 80, 0, 0, '83', 0, '42402230080', '', 120000, 0),
(798, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230080-1', '23-02-2024', 80, 0, 0, '74', 0, '42402230080', '', 0, 0),
(799, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230080-1', '23-02-2024', 80, 0, 0, '43', 0, '42402230080', '', 0, 220000),
(800, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230081-1', '23-02-2024', 81, 0, 0, '14', 0, '42402230081', '', 180000, 0),
(801, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230081-1', '23-02-2024', 81, 0, 0, '83', 0, '42402230081', '', 100000, 0),
(802, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230081-1', '23-02-2024', 81, 0, 0, '74', 0, '42402230081', '', 0, 0),
(803, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230081-1', '23-02-2024', 81, 0, 0, '43', 0, '42402230081', '', 0, 180000),
(804, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230082-1', '23-02-2024', 82, 0, 0, '14', 0, '42402230082', '', 576000, 0),
(805, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230082-1', '23-02-2024', 82, 0, 0, '83', 0, '42402230082', '', 340000, 0),
(806, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230082-1', '23-02-2024', 82, 0, 0, '74', 0, '42402230082', '', 0, 0),
(807, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230082-1', '23-02-2024', 82, 0, 0, '43', 0, '42402230082', '', 0, 576000),
(808, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230083-1', '23-02-2024', 83, 0, 0, '14', 0, '42402230083', '', 596000, 0),
(809, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230083-1', '23-02-2024', 83, 0, 0, '83', 0, '42402230083', '', 340000, 0),
(810, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230083-1', '23-02-2024', 83, 0, 0, '74', 0, '42402230083', '', 0, 0),
(811, 1, NULL, 158, 'PENJUALAN-TUNAI-42402230083-1', '23-02-2024', 83, 0, 0, '43', 0, '42402230083', '', 0, 596000),
(812, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230084-1', '23-02-2024', 84, 0, 0, '5', 0, '42402230084', '', 420000, 0),
(813, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230084-1', '23-02-2024', 84, 0, 0, '83', 0, '42402230084', '', 220000, 0),
(814, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230084-1', '23-02-2024', 84, 0, 0, '74', 0, '42402230084', '', 0, 0),
(815, 1, NULL, 158, 'PENJUALAN-KREDIT-42402230084-1', '23-02-2024', 84, 0, 0, '43', 0, '42402230084', '', 0, 420000),
(816, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230085-1', '23-02-2024', 85, 0, 0, '83', 0, '12402230085', '', 100000, 0),
(817, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230085-1', '23-02-2024', 85, 0, 0, '74', 0, '12402230085', '', 0, 0),
(818, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402230085-1', '23-02-2024', 85, 0, 0, '43', 0, '12402230085', '', 0, 200000),
(819, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270002-1', '27-02-2024', 87, 0, 0, '14', 0, '42402270002', '', 13000, 0),
(820, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270002-1', '27-02-2024', 87, 0, 0, '83', 0, '42402270002', '', 8400, 0),
(821, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270002-1', '27-02-2024', 87, 0, 0, '74', 0, '42402270002', '', 0, 0),
(822, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270002-1', '27-02-2024', 87, 0, 0, '43', 0, '42402270002', '', 0, 13000),
(823, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-1', '27-02-2024', 92, 0, 0, '14', 0, '42402270007', '', 200000, 0),
(824, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-1', '27-02-2024', 92, 0, 0, '83', 0, '42402270007', '', 100000, 0),
(825, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-1', '27-02-2024', 92, 0, 0, '74', 0, '42402270007', '', 0, 0),
(826, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-1', '27-02-2024', 92, 0, 0, '43', 0, '42402270007', '', 0, 200000),
(827, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-1', '27-02-2024', 93, 0, 0, '14', 0, '42402270008', '', 200000, 0),
(828, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-1', '27-02-2024', 93, 0, 0, '83', 0, '42402270008', '', 100000, 0),
(829, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-1', '27-02-2024', 93, 0, 0, '74', 0, '42402270008', '', 0, 0),
(830, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-1', '27-02-2024', 93, 0, 0, '43', 0, '42402270008', '', 0, 200000),
(831, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270039-1', '27-02-2024', 124, 0, 0, '14', 0, '42402270039', '', 200000, 0),
(832, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270039-1', '27-02-2024', 124, 0, 0, '83', 0, '42402270039', '', 100000, 0),
(833, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270039-1', '27-02-2024', 124, 0, 0, '74', 0, '42402270039', '', 0, 0),
(834, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270039-1', '27-02-2024', 124, 0, 0, '43', 0, '42402270039', '', 0, 200000),
(835, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270053-1', '27-02-2024', 138, 0, 0, '14', 0, '42402270053', '', 220000, 0),
(836, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270053-1', '27-02-2024', 138, 0, 0, '83', 0, '42402270053', '', 120000, 0),
(837, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270053-1', '27-02-2024', 138, 0, 0, '74', 0, '42402270053', '', 0, 0),
(838, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270053-1', '27-02-2024', 138, 0, 0, '43', 0, '42402270053', '', 0, 220000),
(839, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270056-1', '27-02-2024', 141, 0, 0, '83', 0, '12402270056', '', 120000, 0),
(840, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270056-1', '27-02-2024', 141, 0, 0, '74', 0, '12402270056', '', 0, 0),
(841, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270056-1', '27-02-2024', 141, 0, 0, '43', 0, '12402270056', '', 0, 220000),
(842, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270006-1', '27-02-2024', 6, 0, 0, '83', 0, '12402270006', '', 25200, 0),
(843, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270006-1', '27-02-2024', 6, 0, 0, '74', 0, '12402270006', '', 0, 0),
(844, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270006-1', '27-02-2024', 6, 0, 0, '43', 0, '12402270006', '', 0, 0),
(845, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-2', '27-02-2024', 7, 0, 0, '14', 0, '42402270007', '', 200000, 0),
(846, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-2', '27-02-2024', 7, 0, 0, '83', 0, '42402270007', '', 100000, 0),
(847, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-2', '27-02-2024', 7, 0, 0, '74', 0, '42402270007', '', 0, 0),
(848, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270007-2', '27-02-2024', 7, 0, 0, '43', 0, '42402270007', '', 0, 200000),
(849, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270011-1', '27-02-2024', 11, 0, 0, '14', 0, '42402270011', '', 220000, 0),
(850, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270011-1', '27-02-2024', 11, 0, 0, '83', 0, '42402270011', '', 120000, 0),
(851, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270011-1', '27-02-2024', 11, 0, 0, '74', 0, '42402270011', '', 0, 0),
(852, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270011-1', '27-02-2024', 11, 0, 0, '43', 0, '42402270011', '', 0, 220000),
(853, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270017-1', '27-02-2024', 17, 0, 0, '5', 0, '42402270017', '', 200000, 0),
(854, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270017-1', '27-02-2024', 17, 0, 0, '83', 0, '42402270017', '', 100000, 0),
(855, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270017-1', '27-02-2024', 17, 0, 0, '74', 0, '42402270017', '', 0, 0),
(856, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270017-1', '27-02-2024', 17, 0, 0, '43', 0, '42402270017', '', 0, 200000),
(857, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270001-1', '27-02-2024', 1, 0, 0, '14', 0, '42402270001', '', 220000, 0),
(858, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270001-1', '27-02-2024', 1, 0, 0, '83', 0, '42402270001', '', 120000, 0),
(859, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270001-1', '27-02-2024', 1, 0, 0, '74', 0, '42402270001', '', 0, 0),
(860, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270001-1', '27-02-2024', 1, 0, 0, '43', 0, '42402270001', '', 0, 220000),
(861, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270002-1', '27-02-2024', 2, 0, 0, '5', 0, '42402270002', '', 200000, 0),
(862, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270002-1', '27-02-2024', 2, 0, 0, '83', 0, '42402270002', '', 100000, 0),
(863, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270002-1', '27-02-2024', 2, 0, 0, '74', 0, '42402270002', '', 0, 0),
(864, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270002-1', '27-02-2024', 2, 0, 0, '43', 0, '42402270002', '', 0, 200000),
(865, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270003-1', '27-02-2024', 3, 0, 0, '83', 0, '12402270003', '', 120000, 0),
(866, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270003-1', '27-02-2024', 3, 0, 0, '74', 0, '12402270003', '', 0, 0),
(867, 1, NULL, 158, 'PENJUALAN-TRANSFER-12402270003-1', '27-02-2024', 3, 0, 0, '43', 0, '12402270003', '', 0, 220000),
(868, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270007-1', '27-02-2024', 7, 0, 0, '5', 0, '42402270007', '', 20000, 0),
(869, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270007-1', '27-02-2024', 7, 0, 0, '83', 0, '42402270007', '', 17000, 0),
(870, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270007-1', '27-02-2024', 7, 0, 0, '74', 0, '42402270007', '', 0, 0),
(871, 1, NULL, 158, 'PENJUALAN-KREDIT-42402270007-1', '27-02-2024', 7, 0, 0, '43', 0, '42402270007', '', 0, 20000),
(872, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-2', '27-02-2024', 8, 0, 0, '14', 0, '42402270008', '', 220000, 0),
(873, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-2', '27-02-2024', 8, 0, 0, '83', 0, '42402270008', '', 120000, 0),
(874, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-2', '27-02-2024', 8, 0, 0, '74', 0, '42402270008', '', 0, 0),
(875, 1, NULL, 158, 'PENJUALAN-TUNAI-42402270008-2', '27-02-2024', 8, 0, 0, '43', 0, '42402270008', '', 0, 220000),
(876, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-1', '28-02-2024', 10, 0, 0, '14', 0, '42402280002', '', 7000000, 0),
(877, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-1', '28-02-2024', 10, 0, 0, '83', 0, '42402280002', '', 6000000, 0),
(878, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-1', '28-02-2024', 10, 0, 0, '74', 0, '42402280002', '', 0, 0),
(879, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-1', '28-02-2024', 10, 0, 0, '43', 0, '42402280002', '', 0, 7000000),
(880, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280003-1', '28-02-2024', 11, 0, 0, '14', 0, '42402280003', '', 7000000, 0),
(881, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280003-1', '28-02-2024', 11, 0, 0, '83', 0, '42402280003', '', 6000000, 0),
(882, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280003-1', '28-02-2024', 11, 0, 0, '74', 0, '42402280003', '', 0, 0),
(883, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280003-1', '28-02-2024', 11, 0, 0, '43', 0, '42402280003', '', 0, 7000000),
(884, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280001-1', '28-02-2024', 1, 0, 0, '14', 0, '42402280001', '', 7000000, 0),
(885, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280001-1', '28-02-2024', 1, 0, 0, '83', 0, '42402280001', '', 6000000, 0),
(886, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280001-1', '28-02-2024', 1, 0, 0, '74', 0, '42402280001', '', 0, 0),
(887, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280001-1', '28-02-2024', 1, 0, 0, '43', 0, '42402280001', '', 0, 7000000),
(888, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-2', '28-02-2024', 2, 0, 0, '14', 0, '42402280002', '', 200000, 0),
(889, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-2', '28-02-2024', 2, 0, 0, '83', 0, '42402280002', '', 100000, 0),
(890, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-2', '28-02-2024', 2, 0, 0, '74', 0, '42402280002', '', 0, 0),
(891, 1, NULL, 158, 'PENJUALAN-TUNAI-42402280002-2', '28-02-2024', 2, 0, 0, '43', 0, '42402280002', '', 0, 200000),
(892, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290001-1', '29-02-2024', 1, 0, 0, '14', 0, '42402290001', '', 6999999, 0),
(893, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290001-1', '29-02-2024', 1, 0, 0, '83', 0, '42402290001', '', 6000000, 0),
(894, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290001-1', '29-02-2024', 1, 0, 0, '74', 0, '42402290001', '', 0, 0),
(895, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290001-1', '29-02-2024', 1, 0, 0, '43', 0, '42402290001', '', 0, 6999999),
(896, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290002-1', '29-02-2024', 2, 0, 0, '14', 0, '42402290002', '', 3500000, 0),
(897, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290002-1', '29-02-2024', 2, 0, 0, '83', 0, '42402290002', '', 3000000, 0),
(898, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290002-1', '29-02-2024', 2, 0, 0, '74', 0, '42402290002', '', 0, 0),
(899, 1, NULL, 158, 'PENJUALAN-TUNAI-42402290002-1', '29-02-2024', 2, 0, 0, '43', 0, '42402290002', '', 0, 3500000),
(900, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010001-1', '01-03-2024', 3, 0, 0, '14', 0, '42403010001', '', 6999999, 0),
(901, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010001-1', '01-03-2024', 3, 0, 0, '83', 0, '42403010001', '', 6000000, 0),
(902, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010001-1', '01-03-2024', 3, 0, 0, '74', 0, '42403010001', '', 0, 0),
(903, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010001-1', '01-03-2024', 3, 0, 0, '43', 0, '42403010001', '', 0, 6999999),
(904, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010002-1', '01-03-2024', 4, 0, 0, '14', 0, '42403010002', '', 6999999, 0),
(905, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010002-1', '01-03-2024', 4, 0, 0, '83', 0, '42403010002', '', 6000000, 0),
(906, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010002-1', '01-03-2024', 4, 0, 0, '74', 0, '42403010002', '', 0, 0),
(907, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010002-1', '01-03-2024', 4, 0, 0, '43', 0, '42403010002', '', 0, 6999999),
(908, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010003-1', '01-03-2024', 5, 0, 0, '14', 0, '42403010003', '', 6999999, 0),
(909, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010003-1', '01-03-2024', 5, 0, 0, '83', 0, '42403010003', '', 6000000, 0),
(910, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010003-1', '01-03-2024', 5, 0, 0, '74', 0, '42403010003', '', 0, 0),
(911, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010003-1', '01-03-2024', 5, 0, 0, '43', 0, '42403010003', '', 0, 6999999),
(912, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010004-1', '01-03-2024', 6, 0, 0, '14', 0, '42403010004', '', 6999999, 0),
(913, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010004-1', '01-03-2024', 6, 0, 0, '83', 0, '42403010004', '', 6000000, 0),
(914, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010004-1', '01-03-2024', 6, 0, 0, '74', 0, '42403010004', '', 0, 0),
(915, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010004-1', '01-03-2024', 6, 0, 0, '43', 0, '42403010004', '', 0, 6999999),
(916, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010005-1', '01-03-2024', 7, 0, 0, '14', 0, '42403010005', '', 7999999, 0),
(917, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010005-1', '01-03-2024', 7, 0, 0, '83', 0, '42403010005', '', 7000000, 0),
(918, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010005-1', '01-03-2024', 7, 0, 0, '74', 0, '42403010005', '', 0, 0),
(919, 7, NULL, 158, 'PENJUALAN-TUNAI-42403010005-1', '01-03-2024', 7, 0, 0, '43', 0, '42403010005', '', 0, 7999999),
(920, 1, NULL, 158, 'PEMBELIAN-TUNAI-7', '01-03-2024', 1, 0, 0, '12', 0, '01032412201', '', 0, 14000000),
(921, 1, NULL, 158, 'PEMBELIAN-TUNAI-8', '01-03-2024', 2, 0, 0, '12', 0, '01032412202', '', 0, 12000000),
(922, 8, NULL, 158, 'PENJUALAN-TUNAI-42403010006-1', '01-03-2024', 8, 0, 0, '14', 0, '42403010006', '', 7999999, 0),
(923, 8, NULL, 158, 'PENJUALAN-TUNAI-42403010006-1', '01-03-2024', 8, 0, 0, '83', 0, '42403010006', '', 7000000, 0),
(924, 8, NULL, 158, 'PENJUALAN-TUNAI-42403010006-1', '01-03-2024', 8, 0, 0, '74', 0, '42403010006', '', 0, 0),
(925, 8, NULL, 158, 'PENJUALAN-TUNAI-42403010006-1', '01-03-2024', 8, 0, 0, '43', 0, '42403010006', '', 0, 7999999),
(926, 2, NULL, 158, 'PENJUALAN-TUNAI-42403010010-1', '01-03-2024', 12, 0, 0, '14', 0, '42403010010', '', 6999999, 0),
(927, 2, NULL, 158, 'PENJUALAN-TUNAI-42403010010-1', '01-03-2024', 12, 0, 0, '83', 0, '42403010010', '', 6000000, 0);
INSERT INTO `jurnal` (`id`, `id_users`, `id_jurnal`, `id_toko`, `kode`, `tgl`, `id_proses`, `id_piutang`, `id_hutang`, `id_akun`, `id_transaksi`, `no_faktur`, `keterangan`, `debet`, `kredit`) VALUES
(928, 2, NULL, 158, 'PENJUALAN-TUNAI-42403010010-1', '01-03-2024', 12, 0, 0, '74', 0, '42403010010', '', 0, 0),
(929, 2, NULL, 158, 'PENJUALAN-TUNAI-42403010010-1', '01-03-2024', 12, 0, 0, '43', 0, '42403010010', '', 0, 6999999),
(930, 2, NULL, 158, 'PEMBELIAN-TUNAI-9', '01-03-2024', 1, 0, 0, '12', 0, '01032412201', '', 0, 6000000),
(931, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010011-1', '01-03-2024', 13, 0, 0, '14', 0, '42403010011', '', 6999999, 0),
(932, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010011-1', '01-03-2024', 13, 0, 0, '83', 0, '42403010011', '', 6000000, 0),
(933, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010011-1', '01-03-2024', 13, 0, 0, '74', 0, '42403010011', '', 0, 0),
(934, 1, NULL, 158, 'PENJUALAN-TUNAI-42403010011-1', '01-03-2024', 13, 0, 0, '43', 0, '42403010011', '', 0, 6999999),
(935, 1, NULL, 158, 'PEMBELIAN-TUNAI-10', '01-03-2024', 2, 0, 0, '12', 0, '01032412202', '', 0, 350000000),
(936, 3, NULL, 158, 'PEMBELIAN-TUNAI-11', '01-03-2024', 3, 0, 0, '12', 0, '01032412203', '', 0, 6000000),
(937, 1, NULL, 158, 'PEMBELIAN-TUNAI-12', '01-03-2024', 4, 0, 0, '12', 0, '01032412204', '', 0, 600000000),
(938, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020001-1', '02-03-2024', 14, 0, 0, '14', 0, '42403020001', '', 8500000, 0),
(939, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020001-1', '02-03-2024', 14, 0, 0, '83', 0, '42403020001', '', 8000000, 0),
(940, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020001-1', '02-03-2024', 14, 0, 0, '74', 0, '42403020001', '', 0, 0),
(941, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020001-1', '02-03-2024', 14, 0, 0, '43', 0, '42403020001', '', 0, 8500000),
(942, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-1', '02-03-2024', 15, 0, 0, '14', 0, '42403020002', '', 9300000, 0),
(943, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-1', '02-03-2024', 15, 0, 0, '83', 0, '42403020002', '', 8000000, 0),
(944, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-1', '02-03-2024', 15, 0, 0, '74', 0, '42403020002', '', 0, 0),
(945, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-1', '02-03-2024', 15, 0, 0, '43', 0, '42403020002', '', 0, 9300000),
(946, 1, NULL, 158, 'PEMBELIAN-TUNAI-13', '02-03-2024', 5, 0, 0, '12', 0, '02032412201', '', 0, 7000000),
(947, 1, NULL, 158, 'PEMBELIAN-TUNAI-14', '02-03-2024', 6, 0, 0, '12', 0, '02032412202', '', 0, 7000000),
(948, 3, NULL, 158, 'PEMBELIAN-TUNAI-15', '02-03-2024', 7, 0, 0, '12', 0, '02032412203', '', 0, 7000000),
(949, 1, NULL, 158, 'PEMBELIAN-TUNAI-16', '02-03-2024', 2, 0, 0, '12', 0, '02032412202', '', 0, 7000000),
(950, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020001-2', '02-03-2024', 1, 0, 0, '14', 0, '42403020001', '', 7800000, 0),
(951, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020001-2', '02-03-2024', 1, 0, 0, '83', 0, '42403020001', '', 7000000, 0),
(952, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020001-2', '02-03-2024', 1, 0, 0, '74', 0, '42403020001', '', 0, 0),
(953, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020001-2', '02-03-2024', 1, 0, 0, '43', 0, '42403020001', '', 0, 7800000),
(954, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-2', '02-03-2024', 2, 0, 0, '14', 0, '42403020002', '', 7800000, 0),
(955, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-2', '02-03-2024', 2, 0, 0, '83', 0, '42403020002', '', 7000000, 0),
(956, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-2', '02-03-2024', 2, 0, 0, '74', 0, '42403020002', '', 0, 0),
(957, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020002-2', '02-03-2024', 2, 0, 0, '43', 0, '42403020002', '', 0, 7800000),
(958, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020003-1', '02-03-2024', 3, 0, 0, '14', 0, '42403020003', '', 7800000, 0),
(959, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020003-1', '02-03-2024', 3, 0, 0, '83', 0, '42403020003', '', 7000000, 0),
(960, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020003-1', '02-03-2024', 3, 0, 0, '74', 0, '42403020003', '', 0, 0),
(961, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020003-1', '02-03-2024', 3, 0, 0, '43', 0, '42403020003', '', 0, 7800000),
(962, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020004-1', '02-03-2024', 4, 0, 0, '14', 0, '42403020004', '', 15600000, 0),
(963, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020004-1', '02-03-2024', 4, 0, 0, '83', 0, '42403020004', '', 14000000, 0),
(964, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020004-1', '02-03-2024', 4, 0, 0, '74', 0, '42403020004', '', 0, 0),
(965, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020004-1', '02-03-2024', 4, 0, 0, '43', 0, '42403020004', '', 0, 15600000),
(966, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020005-1', '02-03-2024', 5, 0, 0, '14', 0, '42403020005', '', 7800000, 0),
(967, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020005-1', '02-03-2024', 5, 0, 0, '83', 0, '42403020005', '', 42000000, 0),
(968, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020005-1', '02-03-2024', 5, 0, 0, '74', 0, '42403020005', '', 0, 0),
(969, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020005-1', '02-03-2024', 5, 0, 0, '43', 0, '42403020005', '', 0, 7800000),
(970, 1, NULL, 158, 'PEMBELIAN-TUNAI-17', '02-03-2024', 3, 0, 0, '12', 0, '02032412203', '', 0, 5000000),
(971, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020006-1', '02-03-2024', 6, 0, 0, '14', 0, '42403020006', '', 5000000, 0),
(972, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020006-1', '02-03-2024', 6, 0, 0, '83', 0, '42403020006', '', 5000000, 0),
(973, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020006-1', '02-03-2024', 6, 0, 0, '74', 0, '42403020006', '', 0, 0),
(974, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020006-1', '02-03-2024', 6, 0, 0, '43', 0, '42403020006', '', 0, 5000000),
(975, 1, NULL, 158, 'PEMBELIAN-TUNAI-18', '02-03-2024', 4, 0, 0, '12', 0, '02032412204', '', 0, 20000000),
(976, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020007-1', '02-03-2024', 7, 0, 0, '14', 0, '42403020007', '', 5000000, 0),
(977, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020007-1', '02-03-2024', 7, 0, 0, '83', 0, '42403020007', '', 5000000, 0),
(978, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020007-1', '02-03-2024', 7, 0, 0, '74', 0, '42403020007', '', 0, 0),
(979, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020007-1', '02-03-2024', 7, 0, 0, '43', 0, '42403020007', '', 0, 5000000),
(980, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020008-1', '02-03-2024', 8, 0, 0, '14', 0, '42403020008', '', 5000000, 0),
(981, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020008-1', '02-03-2024', 8, 0, 0, '83', 0, '42403020008', '', 5000000, 0),
(982, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020008-1', '02-03-2024', 8, 0, 0, '74', 0, '42403020008', '', 0, 0),
(983, 3, NULL, 158, 'PENJUALAN-TUNAI-42403020008-1', '02-03-2024', 8, 0, 0, '43', 0, '42403020008', '', 0, 5000000),
(984, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020009-1', '02-03-2024', 9, 0, 0, '14', 0, '42403020009', '', 5000000, 0),
(985, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020009-1', '02-03-2024', 9, 0, 0, '83', 0, '42403020009', '', 5000000, 0),
(986, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020009-1', '02-03-2024', 9, 0, 0, '74', 0, '42403020009', '', 0, 0),
(987, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020009-1', '02-03-2024', 9, 0, 0, '43', 0, '42403020009', '', 0, 5000000),
(988, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020010-1', '02-03-2024', 10, 0, 0, '14', 0, '42403020010', '', 5000000, 0),
(989, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020010-1', '02-03-2024', 10, 0, 0, '83', 0, '42403020010', '', 5000000, 0),
(990, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020010-1', '02-03-2024', 10, 0, 0, '74', 0, '42403020010', '', 0, 0),
(991, 1, NULL, 158, 'PENJUALAN-TUNAI-42403020010-1', '02-03-2024', 10, 0, 0, '43', 0, '42403020010', '', 0, 5000000),
(992, 1, NULL, 158, 'PEMBELIAN-TUNAI-19', '02-03-2024', 5, 0, 0, '12', 0, '02032412205', '', 0, 30000000),
(993, 3, NULL, 158, 'PEMBELIAN-TUNAI-20', '02-03-2024', 6, 0, 0, '12', 0, '02032412206', '', 0, 5000000),
(994, 1, NULL, 158, 'PEMBELIAN-TUNAI-21', '02-03-2024', 1, 0, 0, '12', 0, '02032412201', '', 0, 13500000),
(995, 3, NULL, 158, 'PEMBELIAN-TUNAI-22', '02-03-2024', 2, 0, 0, '12', 0, '02032412202', '', 0, 5000000),
(996, 1, NULL, 158, 'PEMBELIAN-TUNAI-23', '02-03-2024', 3, 0, 0, '12', 0, '02032412203', '', 0, 5000000),
(997, 3, NULL, 158, 'PEMBELIAN-TUNAI-24', '02-03-2024', 4, 0, 0, '12', 0, '02032412204', '', 0, 7000000),
(998, 3, NULL, 158, 'PEMBELIAN-TUNAI-25', '02-03-2024', 5, 0, 0, '12', 0, '02032412205', '', 0, 4500000),
(999, 3, NULL, 158, 'PEMBELIAN-TUNAI-26', '02-03-2024', 6, 0, 0, '12', 0, '020324706', '', 0, 7000000),
(1000, 3, NULL, 158, 'PEMBELIAN-TUNAI-27', '02-03-2024', 7, 0, 0, '12', 0, '02032412207', '', 0, 6000000),
(1001, 1, NULL, 158, 'PEMBELIAN-TUNAI-28', '02-03-2024', 8, 0, 0, '12', 0, '02032412208', '', 0, 18000000),
(1002, 1, NULL, 158, 'PEMBELIAN-TUNAI-29', '02-03-2024', 9, 0, 0, '12', 0, '02032412209', '', 0, 6000000),
(1003, 1, NULL, 158, 'PEMBELIAN-TUNAI-30', '02-03-2024', 3, 0, 0, '12', 0, '020324403', '', 0, 555555),
(1004, 1, NULL, 158, 'PEMBELIAN-TUNAI-31', '04-03-2024', 2, 0, 0, '12', 0, '04032412302', '', 0, 11000000),
(1005, 1, NULL, 158, 'PENJUALAN-TUNAI-42403040001-1', '04-03-2024', 1, 0, 0, '14', 0, '42403040001', '', 11700000, 0),
(1006, 1, NULL, 158, 'PENJUALAN-TUNAI-42403040001-1', '04-03-2024', 1, 0, 0, '83', 0, '42403040001', '', 11000000, 0),
(1007, 1, NULL, 158, 'PENJUALAN-TUNAI-42403040001-1', '04-03-2024', 1, 0, 0, '74', 0, '42403040001', '', 0, 0),
(1008, 1, NULL, 158, 'PENJUALAN-TUNAI-42403040001-1', '04-03-2024', 1, 0, 0, '43', 0, '42403040001', '', 0, 11700000),
(1009, 3, NULL, 158, 'PENJUALAN-TUNAI-42403040002-1', '04-03-2024', 2, 0, 0, '14', 0, '42403040002', '', 11700000, 0),
(1010, 3, NULL, 158, 'PENJUALAN-TUNAI-42403040002-1', '04-03-2024', 2, 0, 0, '83', 0, '42403040002', '', 11000000, 0),
(1011, 3, NULL, 158, 'PENJUALAN-TUNAI-42403040002-1', '04-03-2024', 2, 0, 0, '74', 0, '42403040002', '', 0, 0),
(1012, 3, NULL, 158, 'PENJUALAN-TUNAI-42403040002-1', '04-03-2024', 2, 0, 0, '43', 0, '42403040002', '', 0, 11700000),
(1013, 1, NULL, 158, 'PEMBELIAN-TUNAI-32', '04-03-2024', 3, 0, 0, '12', 0, '04032412303', '', 0, 33000000),
(1014, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-1', '06-03-2024', 5, 0, 0, '14', 0, '42403060001', '', 11700000, 0),
(1015, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-1', '06-03-2024', 5, 0, 0, '83', 0, '42403060001', '', 11000000, 0),
(1016, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-1', '06-03-2024', 5, 0, 0, '74', 0, '42403060001', '', 0, 0),
(1017, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-1', '06-03-2024', 5, 0, 0, '43', 0, '42403060001', '', 0, 11700000),
(1018, 1, NULL, 158, 'PEMBELIAN-TUNAI-33', '06-03-2024', 4, 0, 0, '12', 0, '06032412321', '', 0, 11000000),
(1019, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-2', '06-03-2024', 1, 0, 0, '14', 0, '42403060001', '', 6500000, 0),
(1020, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-2', '06-03-2024', 1, 0, 0, '83', 0, '42403060001', '', 6000000, 0),
(1021, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-2', '06-03-2024', 1, 0, 0, '74', 0, '42403060001', '', 0, 0),
(1022, 1, NULL, 158, 'PENJUALAN-TUNAI-42403060001-2', '06-03-2024', 1, 0, 0, '43', 0, '42403060001', '', 0, 6500000),
(1023, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-1', '07-03-2024', 2, 0, 0, '14', 0, '42403070001', '', 12333, 0),
(1024, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-1', '07-03-2024', 2, 0, 0, '83', 0, '42403070001', '', 121111, 0),
(1025, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-1', '07-03-2024', 2, 0, 0, '74', 0, '42403070001', '', 0, 0),
(1026, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-1', '07-03-2024', 2, 0, 0, '43', 0, '42403070001', '', 0, 12333),
(1027, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-2', '07-03-2024', 2, 0, 0, '14', 0, '42403070001', '', 12333, 0),
(1028, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-2', '07-03-2024', 2, 0, 0, '83', 0, '42403070001', '', 121111, 0),
(1029, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-2', '07-03-2024', 2, 0, 0, '74', 0, '42403070001', '', 0, 0),
(1030, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070001-2', '07-03-2024', 2, 0, 0, '43', 0, '42403070001', '', 0, 12333),
(1031, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070002-1', '07-03-2024', 3, 0, 0, '14', 0, '42403070002', '', 77777, 0),
(1032, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070002-1', '07-03-2024', 3, 0, 0, '83', 0, '42403070002', '', 6666, 0),
(1033, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070002-1', '07-03-2024', 3, 0, 0, '74', 0, '42403070002', '', 0, 0),
(1034, 3, NULL, 158, 'PENJUALAN-TUNAI-42403070002-1', '07-03-2024', 3, 0, 0, '43', 0, '42403070002', '', 0, 77777),
(1035, 3, NULL, 158, 'PEMBELIAN-TUNAI-34', '07-03-2024', 2, 0, 0, '12', 0, '07032412302', '', 0, 2500000),
(1036, 3, NULL, 158, 'PEMBELIAN-TUNAI-35', '07-03-2024', 2, 0, 0, '12', 0, '07032412302', '', 0, 0),
(1037, 1, NULL, 158, 'PEMBELIAN-TUNAI-36', '07-03-2024', 2, 0, 0, '12', 0, '07032412302', '', 0, 0),
(1038, 3, NULL, 158, 'PEMBELIAN-TUNAI-37', '07-03-2024', 2, 0, 0, '12', 0, '07032412305', '', 0, 2000),
(1039, 3, NULL, 158, 'PEMBELIAN-TUNAI-38', '07-03-2024', 3, 0, 0, '12', 0, '07032412326', '', 0, 3000),
(1040, 1, NULL, 158, 'RETUR-JUAL-4', '07-03-2024', 0, 0, 0, '6', 0, '', '', 0, 53535),
(1041, 1, NULL, 158, 'RETUR-JUAL-4', '07-03-2024', 0, 0, 0, '84', 0, '', '', 53535, 0),
(1042, 1, NULL, 158, 'RETUR-JUAL-4', '07-03-2024', 0, 0, 0, '83', 0, '', '', 0, 23434),
(1043, 1, NULL, 158, 'RETUR-JUAL-5', '07-03-2024', 0, 0, 0, '6', 0, '', '', 0, 567567),
(1044, 1, NULL, 158, 'RETUR-JUAL-5', '07-03-2024', 0, 0, 0, '84', 0, '', '', 567567, 0),
(1045, 1, NULL, 158, 'RETUR-JUAL-5', '07-03-2024', 0, 0, 0, '83', 0, '', '', 0, 345345),
(1046, 1, NULL, 158, 'PENJUALAN-TUNAI-42403070001-3', '07-03-2024', 1, 0, 0, '14', 0, '42403070001', '', 567567, 0),
(1047, 1, NULL, 158, 'PENJUALAN-TUNAI-42403070001-3', '07-03-2024', 1, 0, 0, '83', 0, '42403070001', '', 345345, 0),
(1048, 1, NULL, 158, 'PENJUALAN-TUNAI-42403070001-3', '07-03-2024', 1, 0, 0, '74', 0, '42403070001', '', 0, 0),
(1049, 1, NULL, 158, 'PENJUALAN-TUNAI-42403070001-3', '07-03-2024', 1, 0, 0, '43', 0, '42403070001', '', 0, 567567),
(1050, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080001-1', '08-03-2024', 2, 0, 0, '14', 0, '42403080001', '', 22222222, 0),
(1051, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080001-1', '08-03-2024', 2, 0, 0, '83', 0, '42403080001', '', 11111111, 0),
(1052, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080001-1', '08-03-2024', 2, 0, 0, '74', 0, '42403080001', '', 0, 0),
(1053, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080001-1', '08-03-2024', 2, 0, 0, '43', 0, '42403080001', '', 0, 22222222),
(1054, 1, NULL, 158, 'RETUR-JUAL-6', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 22222222),
(1055, 1, NULL, 158, 'RETUR-JUAL-6', '08-03-2024', 0, 0, 0, '84', 0, '', '', 22222222, 0),
(1056, 1, NULL, 158, 'RETUR-JUAL-6', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 11111111),
(1057, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080002-1', '08-03-2024', 3, 0, 0, '14', 0, '42403080002', '', 545465, 0),
(1058, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080002-1', '08-03-2024', 3, 0, 0, '83', 0, '42403080002', '', 3434, 0),
(1059, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080002-1', '08-03-2024', 3, 0, 0, '74', 0, '42403080002', '', 0, 0),
(1060, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080002-1', '08-03-2024', 3, 0, 0, '43', 0, '42403080002', '', 0, 545465),
(1061, 1, NULL, 158, 'RETUR-JUAL-7', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 545465),
(1062, 1, NULL, 158, 'RETUR-JUAL-7', '08-03-2024', 0, 0, 0, '84', 0, '', '', 545465, 0),
(1063, 1, NULL, 158, 'RETUR-JUAL-7', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 3434),
(1064, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080003-1', '08-03-2024', 4, 0, 0, '14', 0, '42403080003', '', 545465, 0),
(1065, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080003-1', '08-03-2024', 4, 0, 0, '83', 0, '42403080003', '', 3434, 0),
(1066, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080003-1', '08-03-2024', 4, 0, 0, '74', 0, '42403080003', '', 0, 0),
(1067, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080003-1', '08-03-2024', 4, 0, 0, '43', 0, '42403080003', '', 0, 545465),
(1068, 1, NULL, 158, 'RETUR-JUAL-8', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 22222222),
(1069, 1, NULL, 158, 'RETUR-JUAL-8', '08-03-2024', 0, 0, 0, '84', 0, '', '', 22222222, 0),
(1070, 1, NULL, 158, 'RETUR-JUAL-8', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 11111111),
(1071, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080004-1', '08-03-2024', 5, 0, 0, '14', 0, '42403080004', '', 555555, 0),
(1072, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080004-1', '08-03-2024', 5, 0, 0, '83', 0, '42403080004', '', 44444, 0),
(1073, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080004-1', '08-03-2024', 5, 0, 0, '74', 0, '42403080004', '', 0, 0),
(1074, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080004-1', '08-03-2024', 5, 0, 0, '43', 0, '42403080004', '', 0, 555555),
(1075, 1, NULL, 158, 'RETUR-JUAL-9', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 555555),
(1076, 1, NULL, 158, 'RETUR-JUAL-9', '08-03-2024', 0, 0, 0, '84', 0, '', '', 555555, 0),
(1077, 1, NULL, 158, 'RETUR-JUAL-9', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 44444),
(1078, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080005-1', '08-03-2024', 6, 0, 0, '14', 0, '42403080005', '', 45, 0),
(1079, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080005-1', '08-03-2024', 6, 0, 0, '83', 0, '42403080005', '', 44, 0),
(1080, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080005-1', '08-03-2024', 6, 0, 0, '74', 0, '42403080005', '', 0, 0),
(1081, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080005-1', '08-03-2024', 6, 0, 0, '43', 0, '42403080005', '', 0, 45),
(1082, 1, NULL, 158, 'RETUR-JUAL-10', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 45),
(1083, 1, NULL, 158, 'RETUR-JUAL-10', '08-03-2024', 0, 0, 0, '84', 0, '', '', 45, 0),
(1084, 1, NULL, 158, 'RETUR-JUAL-10', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 44),
(1085, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080006-1', '08-03-2024', 7, 0, 0, '14', 0, '42403080006', '', 88, 0),
(1086, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080006-1', '08-03-2024', 7, 0, 0, '83', 0, '42403080006', '', 77, 0),
(1087, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080006-1', '08-03-2024', 7, 0, 0, '74', 0, '42403080006', '', 0, 0),
(1088, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080006-1', '08-03-2024', 7, 0, 0, '43', 0, '42403080006', '', 0, 88),
(1089, 1, NULL, 158, 'RETUR-JUAL-11', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 88),
(1090, 1, NULL, 158, 'RETUR-JUAL-11', '08-03-2024', 0, 0, 0, '84', 0, '', '', 88, 0),
(1091, 1, NULL, 158, 'RETUR-JUAL-11', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 77),
(1092, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080007-1', '08-03-2024', 8, 0, 0, '14', 0, '42403080007', '', 88, 0),
(1093, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080007-1', '08-03-2024', 8, 0, 0, '83', 0, '42403080007', '', 77, 0),
(1094, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080007-1', '08-03-2024', 8, 0, 0, '74', 0, '42403080007', '', 0, 0),
(1095, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080007-1', '08-03-2024', 8, 0, 0, '43', 0, '42403080007', '', 0, 88),
(1096, 1, NULL, 158, 'RETUR-JUAL-12', '08-03-2024', 0, 0, 0, '13', 0, '', '', 0, 0),
(1097, 1, NULL, 158, 'RETUR-JUAL-12', '08-03-2024', 0, 0, 0, '84', 0, '', '', 0, 0),
(1098, 1, NULL, 158, 'RETUR-JUAL-12', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 0),
(1099, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080008-1', '08-03-2024', 9, 0, 0, '14', 0, '42403080008', '', 555555, 0),
(1100, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080008-1', '08-03-2024', 9, 0, 0, '83', 0, '42403080008', '', 44444, 0),
(1101, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080008-1', '08-03-2024', 9, 0, 0, '74', 0, '42403080008', '', 0, 0),
(1102, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080008-1', '08-03-2024', 9, 0, 0, '43', 0, '42403080008', '', 0, 555555),
(1103, 1, NULL, 158, 'RETUR-JUAL-13', '08-03-2024', 0, 0, 0, '13', 0, '', '', 0, 555555),
(1104, 1, NULL, 158, 'RETUR-JUAL-13', '08-03-2024', 0, 0, 0, '84', 0, '', '', 555555, 0),
(1105, 1, NULL, 158, 'RETUR-JUAL-13', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 44444),
(1106, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080009-1', '08-03-2024', 10, 0, 0, '14', 0, '42403080009', '', 200000, 0),
(1107, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080009-1', '08-03-2024', 10, 0, 0, '83', 0, '42403080009', '', 100000, 0),
(1108, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080009-1', '08-03-2024', 10, 0, 0, '74', 0, '42403080009', '', 0, 0),
(1109, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080009-1', '08-03-2024', 10, 0, 0, '43', 0, '42403080009', '', 0, 200000),
(1110, 2, NULL, 158, 'RETUR-JUAL-14', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 1100000),
(1111, 2, NULL, 158, 'RETUR-JUAL-14', '08-03-2024', 0, 0, 0, '84', 0, '', '', 1100000, 0),
(1112, 2, NULL, 158, 'RETUR-JUAL-14', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 1000000),
(1113, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080010-1', '08-03-2024', 11, 0, 0, '14', 0, '42403080010', '', 4534, 0),
(1114, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080010-1', '08-03-2024', 11, 0, 0, '83', 0, '42403080010', '', 4234, 0),
(1115, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080010-1', '08-03-2024', 11, 0, 0, '74', 0, '42403080010', '', 0, 0),
(1116, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080010-1', '08-03-2024', 11, 0, 0, '43', 0, '42403080010', '', 0, 4534),
(1117, 2, NULL, 158, 'RETUR-JUAL-15', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 4534),
(1118, 2, NULL, 158, 'RETUR-JUAL-15', '08-03-2024', 0, 0, 0, '84', 0, '', '', 4534, 0),
(1119, 2, NULL, 158, 'RETUR-JUAL-15', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 4234),
(1120, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080011-1', '08-03-2024', 12, 0, 0, '14', 0, '42403080011', '', 5, 0),
(1121, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080011-1', '08-03-2024', 12, 0, 0, '83', 0, '42403080011', '', 444, 0),
(1122, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080011-1', '08-03-2024', 12, 0, 0, '74', 0, '42403080011', '', 0, 0),
(1123, 1, NULL, 158, 'PENJUALAN-TUNAI-42403080011-1', '08-03-2024', 12, 0, 0, '43', 0, '42403080011', '', 0, 5),
(1124, 1, NULL, 158, 'RETUR-JUAL-16', '08-03-2024', 0, 0, 0, '6', 0, '', '', 0, 5),
(1125, 1, NULL, 158, 'RETUR-JUAL-16', '08-03-2024', 0, 0, 0, '84', 0, '', '', 5, 0),
(1126, 1, NULL, 158, 'RETUR-JUAL-16', '08-03-2024', 0, 0, 0, '83', 0, '', '', 0, 444),
(1127, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080012-1', '08-03-2024', 13, 0, 0, '14', 0, '42403080012', '', 1100000, 0),
(1128, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080012-1', '08-03-2024', 13, 0, 0, '83', 0, '42403080012', '', 1000000, 0),
(1129, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080012-1', '08-03-2024', 13, 0, 0, '74', 0, '42403080012', '', 0, 0),
(1130, 2, NULL, 158, 'PENJUALAN-TUNAI-42403080012-1', '08-03-2024', 13, 0, 0, '43', 0, '42403080012', '', 0, 1100000),
(1131, 1, NULL, 158, 'PENJUALAN-TUNAI-42403090001-1', '09-03-2024', 1, 0, 0, '14', 0, '42403090001', '', 222222, 0),
(1132, 1, NULL, 158, 'PENJUALAN-TUNAI-42403090001-1', '09-03-2024', 1, 0, 0, '83', 0, '42403090001', '', 155555, 0),
(1133, 1, NULL, 158, 'PENJUALAN-TUNAI-42403090001-1', '09-03-2024', 1, 0, 0, '74', 0, '42403090001', '', 0, 0),
(1134, 1, NULL, 158, 'PENJUALAN-TUNAI-42403090001-1', '09-03-2024', 1, 0, 0, '43', 0, '42403090001', '', 0, 222222),
(1135, 6, NULL, 158, 'RETUR-JUAL-17', '09-03-2024', 0, 0, 0, '6', 0, '', '', 0, 222222),
(1136, 6, NULL, 158, 'RETUR-JUAL-17', '09-03-2024', 0, 0, 0, '84', 0, '', '', 222222, 0),
(1137, 6, NULL, 158, 'RETUR-JUAL-17', '09-03-2024', 0, 0, 0, '83', 0, '', '', 0, 155555);

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_back`
--

CREATE TABLE IF NOT EXISTS `jurnal_back` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jurnal` int(11) DEFAULT NULL COMMENT 'id_jurnal untuk sync server',
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `id_proses` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `id_akun` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_copy`
--

CREATE TABLE IF NOT EXISTS `jurnal_copy` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jurnal` int(11) DEFAULT NULL COMMENT 'id_jurnal untuk sync server',
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `id_proses` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `id_akun` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_januari_repair`
--

CREATE TABLE IF NOT EXISTS `jurnal_januari_repair` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_jurnal` int(11) DEFAULT NULL COMMENT 'id_jurnal untuk sync server',
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `id_proses` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `id_hutang` int(11) DEFAULT NULL,
  `id_akun` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_transaksi` int(11) NOT NULL,
  `no_faktur` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `keterangan` varchar(300) COLLATE latin1_general_ci DEFAULT NULL,
  `debet` double NOT NULL,
  `kredit` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_manual`
--

CREATE TABLE IF NOT EXISTS `jurnal_manual` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `kode` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `jurnal_manual`
--

INSERT INTO `jurnal_manual` (`id`, `id_toko`, `kode`, `id_akun`) VALUES
(1, 158, 'SALDOPIUTANG', 168),
(2, 158, 'SALDOPIUTANG', 169),
(3, 158, 'SALDOPIUTANG', 170),
(4, 158, 'SALDOPIUTANG', 171),
(5, 158, 'SALDOPIUTANG', 172),
(6, 158, 'SALDOPIUTANG', 173),
(7, 158, 'SALDOPIUTANG', 18);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE IF NOT EXISTS `kategori_produk` (
`id_kategori` int(11) NOT NULL,
  `id_kategori_2` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_supplier` int(11) DEFAULT NULL,
  `nama_kategori` varchar(100) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `id_kategori_2`, `id_toko`, `id_users`, `id_supplier`, `nama_kategori`) VALUES
(17, 1, 158, 1, NULL, 'SMART WATCH'),
(18, 2, 158, 1, NULL, 'SMARTPHONE');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL,
  `is_private_key` tinyint(1) NOT NULL,
  `ip_addresses` text,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'CFFBE38FDCCF605284B578B15B5C791D', 0, 0, 0, NULL, '2017-12-13 11:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `kode_transaksi`
--

CREATE TABLE IF NOT EXISTS `kode_transaksi` (
`id` int(11) NOT NULL,
  `menu_proses` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `kode` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `var` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kode_transaksi`
--

INSERT INTO `kode_transaksi` (`id`, `menu_proses`, `kode`, `var`, `ket`) VALUES
(1, 'penjualan', 'JENIS_PEMBAYARAN', '$pembayaran', 'number; 1 = "tunai" atau 2 = "kredit"'),
(2, 'penjualan', 'NO_FAKTUR', '$no_faktur', 'text;'),
(3, 'penjualan', 'ID_ORDERS', '$id_orders', 'number;'),
(4, 'penjualan', 'ID_PIUTANG', '$id_piutang', 'number;'),
(5, 'penjualan', 'TOTAL_NOMINAL', '$total', 'number;'),
(6, 'penjualan', 'TOTAL_HPP', '$hpp', 'number;'),
(7, 'penjualan', 'TOTAL_PPN', '$ppn_nominal', 'number;'),
(8, 'penjualan', 'TOTAL_NOMINAL_DAN_PPN', '$total_ppn', 'number;'),
(9, 'penjualan', 'MEMBER', '$ada_member', 'boolean;'),
(10, 'fakturpembelian', 'JENIS_PEMBAYARAN', '$pembayaran', 'number; 1 = "tunai" atau 2 = "kredit"'),
(11, 'fakturpembelian', 'UANG_MUKA', '$dp', 'number;'),
(12, 'fakturpembelian', 'ID_FAKTUR', '$id_faktur', 'number;'),
(13, 'fakturpembelian', 'NO_FAKTUR', '$no_faktur', 'number;'),
(14, 'pembelian', 'JENIS_PEMBAYARAN', '$pembayaran', 'number; 1 = "hutang" selain 1 "tunai"'),
(15, 'pembelian', 'TOTAL_BAYAR', '$fr_total', 'number;'),
(16, 'pembelian', 'ID_HUTANG', '$id_hutang', 'number;'),
(17, 'piutang', 'NOMINAL_BAYAR', '$jumlah_bayar', 'number;'),
(18, 'hutang', 'NOMINAL_SISA_HUTANG', '$sisa_hutang', 'number;'),
(19, 'hutang', 'NOMINAL_BAYAR', '$nominal', 'number;'),
(20, 'penjualan', 'MEMBER_PKP', '$pkp', 'boolean;'),
(21, 'pembelian', 'TOTAL_HARGA_BRUTO', '$total_bruto', 'number;'),
(22, 'pembelian', 'NOMINAL_PPN', '$nominal_ppn', 'number;'),
(23, 'pembelian', 'NOMINAL_DISKON', '$nominal_diskon', 'number;'),
(24, 'penjualan', 'NOMINAL_DISKON', '$total_diskon', 'number;'),
(25, 'pembelian', 'ID_FAKTUR', '$id_faktur', 'number;'),
(26, 'pembelian', 'ID_SUPPLIER', '$id_supplier', 'number;'),
(27, 'pembelian', 'NO_FAKTUR', '$no_faktur', 'number;'),
(28, 'hutang', 'KODE_AKUN_KREDIT', '$akun_kredit', 'text;'),
(29, 'hutang', 'ID_SUPPLIER', '$id_supplier', 'number;'),
(30, 'buatretur', 'ID_FAKTUR', '$id_faktur', 'number;'),
(31, 'buatretur', 'JENIS_PEMBAYARAN_PEMBELIAN', '$pembayaran', 'number; 1 = "hutang" selain 1 "tunai"'),
(32, 'buatretur', 'ID_SUPPLIER', '$id_supplier', 'number;'),
(33, 'buatretur', 'NOMINAL_RETUR', '$total', 'number;'),
(34, 'buatretur', 'SALDO_HUTANG', '$kurang', 'number;'),
(35, 'buatreturjual', 'ID_FAKTUR', '$id_faktur', 'number;'),
(36, 'buatreturjual', 'ID_RETUR', '$id_retur', 'number;'),
(37, 'buatreturjual', 'JENIS', '$jenis', 'text; "manual" / "otomatis"'),
(38, 'pembelian', 'TGL', '$tgl', 'date;'),
(39, 'penjualan', 'TUNAI_3', '$nominal_tunai', 'number;'),
(40, 'penjualan', 'TRANSFER_3', '$nominal_transfer', 'number;'),
(41, 'penjualan', 'HUTANG_3', '$nominal_hutang', 'number;'),
(42, 'penjualan', 'AKUN_TRANSFER_3', '$akun_transfer', 'text;'),
(43, 'verifikasibayar', 'NOMINAL', '$jml_subtotal', 'number;'),
(44, 'verifikasibayar', 'ONGKIR', '$row_bayar->ongkir', 'number;'),
(45, 'verifikasibayar', 'ID_ORDERS', '$id_tbl_order', 'number;'),
(46, 'verifikasibayar', 'ID_BANK', '$id_bank', 'number;'),
(47, 'verifikasibayar', 'NOMINAL_HPP', '$jml_hpp', 'number;'),
(48, 'verifikasibayar', 'NOMINAL_ONGKIR', '$nominal_ongkir', 'number;'),
(49, 'verifikasibayar', 'ID_MEDIA', '$media', 'number; 1 = Whatsapp, 2 = Shopee, 3 = Tokopedia, 4 = COD'),
(50, 'verifikasibayar', 'BIAYA_LAIN', '$biaya_lain', 'number;'),
(51, 'verifikasibayar', 'NO_INVOICE', '$no_invoice', 'number;'),
(52, 'verifikasibayar', 'TGL', '$tgl', 'date;'),
(53, 'buatreturjual', 'TOTAL', '$total', 'number;'),
(54, 'penjualan', 'NAMA_MEMBER', '$nama_member', 'text;'),
(55, 'buatreturjual', 'PILIHAN', '$fpilihan', 'number; 1 = stok mati, 0 = stok kembali'),
(56, 'buatreturjual', 'TOTAL_HPP', '$total_hpp', 'number;'),
(57, 'piutang', 'ID_BANK', '$id_bank', 'number;'),
(58, 'piutang', 'NO_FAKTUR', '$no_faktur', 'number;'),
(59, 'buatreturjual', 'PEMBAYARAN', '$pembayaran', 'number;'),
(60, 'buatreturjual', 'NO_FAKTUR', '$no_faktur', 'number;'),
(61, 'piutang', 'ID_MEDIA', '$media', 'number;'),
(62, 'penjualan', 'MEMBER_UID', '$uid_akun', 'number;'),
(63, 'buatreturjual', 'ONGKIR', '$ongkir', 'number;'),
(64, 'saldoterbuka', 'TGL', '$tgl', 'number;'),
(65, 'saldoterbuka', 'NOMINAL', '$jml_subtotal', 'number'),
(66, 'saldoterbuka', 'ONGKIR', '$row_bayar->ongkir', 'number'),
(67, 'saldoterbuka', 'ID_ORDERS', '$id_tbl_order', 'number'),
(68, 'saldoterbuka', 'ID_BANK', '$id_bank', 'number'),
(69, 'saldoterbuka', 'NOMINAL_HPP', '$jml_hpp', 'number'),
(70, 'saldoterbuka', 'ID_MEDIA', '$media', 'number 1 = Whatsapp, 2 = Shopee, 3 = Tokopedia, 4 = COD'),
(71, 'saldoterbuka', 'BIAYA_LAIN', '$biaya_lain', 'number'),
(72, 'saldoterbuka', 'NO_INVOICE', '$no_invoice', 'number'),
(73, 'saldoterbuka', 'NOMINAL_ONGKIR', '$nominal_ongkir', 'number'),
(74, 'piutang', 'ONGKIR', '$ongkir', 'number;'),
(75, 'piutang', 'MEMBER_UID', '$uid_akun', 'number;'),
(76, 'piutang', 'TGL_BAYAR', '$tgl_bayar', 'date;'),
(77, 'penjualan', 'ID_BANK', '$id_bank', 'number;'),
(78, 'penjualan', 'ONGKIR', '$ongkir', 'number;'),
(79, 'pembelianproduksi', 'TGL', '$tgl', 'date;'),
(80, 'pembelianproduksi', 'NO_FAKTUR', '$no_faktur', 'number;'),
(81, 'pembelianproduksi', 'ID_SUPPLIER', '$id_supplier', 'number;'),
(82, 'pembelianproduksi', 'ID_FAKTUR', '$id_faktur', 'number;'),
(83, 'pembelianproduksi', 'ID_HUTANG', '$id_hutang', 'number;'),
(84, 'pembelianproduksi', 'NOMINAL_DISKON', '$nominal_diskon', 'number;'),
(85, 'pembelianproduksi', 'NOMINAL_PPN', '$nominal_ppn', 'number;'),
(86, 'pembelianproduksi', 'JENIS_PEMBAYARAN', '$pembayaran', 'number; 1 = "hutang" selain 1 "tunai"'),
(87, 'pembelianproduksi', 'TOTAL_BAYAR', '$fr_total', 'number;'),
(88, 'pembelianproduksi', 'TOTAL_HARGA_BRUTO', '$total_bruto', 'number;'),
(89, 'pembeliankonsinyasi', 'NOMINAL_DISKON', '$nominal_diskon', 'number;'),
(90, 'pembeliankonsinyasi', 'TGL', '$tgl', 'date;'),
(91, 'pembeliankonsinyasi', 'NO_FAKTUR', '$no_faktur', 'number;'),
(92, 'pembeliankonsinyasi', 'ID_SUPPLIER', '$id_supplier', 'number;'),
(93, 'pembeliankonsinyasi', 'ID_FAKTUR', '$id_faktur', 'number;'),
(94, 'pembeliankonsinyasi', 'JENIS_PEMBAYARAN', '$pembayaran', 'number; 1 = "hutang" selain 1 "tunai"'),
(95, 'pembeliankonsinyasi', 'NOMINAL_PPN', '$nominal_ppn', 'number;'),
(96, 'pembeliankonsinyasi', 'TOTAL_HARGA_BRUTO', '$total_bruto', 'number;'),
(97, 'pembeliankonsinyasi', 'TOTAL_BAYAR', '$fr_total', 'number;'),
(98, 'pembeliankonsinyasi', 'ID_HUTANG', '$id_hutang', 'number;'),
(99, 'pembelian', 'ID_BANK', '$bank', 'number;'),
(100, 'pembelianproduksi', 'ID_BANK', '$bank', 'number;'),
(101, 'pembeliankonsinyasi', 'ID_BANK', '$bank', 'number;');

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE IF NOT EXISTS `konversi` (
`id` int(11) NOT NULL,
  `mata_uang` varchar(30) DEFAULT NULL,
  `konversi` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konversi`
--

INSERT INTO `konversi` (`id`, `mata_uang`, `konversi`) VALUES
(1, 'Dollar', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE IF NOT EXISTS `kota` (
`id` int(11) NOT NULL,
  `nama_kota` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama_kota`) VALUES
(1, 'WONOSOBO'),
(2, 'BANJARNEGARA'),
(3, 'SOLO');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_adv`
--

CREATE TABLE IF NOT EXISTS `laporan_adv` (
`id` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `konversi` double DEFAULT NULL,
  `klik` double DEFAULT NULL,
  `view` double DEFAULT NULL,
  `anggaran` double DEFAULT NULL,
  `akun_1` double DEFAULT NULL COMMENT 'akun iklan',
  `akun_2` double DEFAULT NULL,
  `akun_3` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_adv`
--

INSERT INTO `laporan_adv` (`id`, `id_group`, `id_produk`, `tanggal`, `konversi`, `klik`, `view`, `anggaran`, `akun_1`, `akun_2`, `akun_3`) VALUES
(1, 1, 2, '03-11-2019', 11, 464, 199, 486573, 0, 0, NULL),
(2, 1, 2, '04-11-2019', 22, 528, 252, 502653, 0, 0, NULL),
(3, 2, 1, '04-11-2019', 73, 1751, 766, 3580362, 3580362, 3580362, NULL),
(8, 2, 1, '05-11-2019', 140, 4059, 1853, 94599885, 94599885, 94599885, NULL),
(9, 1, 2, '06-11-2019', 25, 962, 303, 988593, 0, 0, NULL),
(10, 1, 2, '05-11-2019', 17, 414, 207, 505366, 0, 0, NULL),
(11, 1, 2, '07-11-2019', 30, 1267, 535, 1241922, 0, 0, NULL),
(12, 2, 1, '07-11-2019', 166, 3599, 1722, 8933155, 0, 0, NULL),
(13, 1, 2, '08-11-2019', 7, 342, 93, 750006, 0, 0, NULL),
(14, 1, 2, '09-11-2019', 1, 110, 11, 123148, 0, 0, NULL),
(15, 1, 2, '10-11-2019', 0, 87, 16, 46280, 0, 0, NULL),
(16, 3, 1, '11-11-2019', 72, 2009, 1743, 1392963, 0, 0, NULL),
(17, 1, 2, '12-11-2019', 39, 574, 293, 1127932, 0, 0, NULL),
(18, 1, 2, '13-11-2019', 55, 575, 290, 1411593, 1411593, 1411593, NULL),
(19, 1, 2, '14-11-2019', 78, 817, 383, 1786766, 0, 0, NULL),
(20, 1, 2, '15-11-2019', 75, 1083, 520, 2342247, 0, 0, NULL),
(21, 1, 2, '18-11-2019', 24, 274, 187, 633083, 0, 0, NULL),
(22, 1, 2, '17-11-2019', 48, 459, 265, 1037629, 0, 0, NULL),
(23, 1, 2, '16-11-2019', 86, 1009, 506, 2267147, 0, 0, NULL),
(24, 1, 2, '19-11-2019', 88, 1287, 627, 2803100, 0, 0, NULL),
(25, 1, 2, '20-11-2019', 82, 1141, 543, 2171241, 0, 0, NULL),
(26, 1, 2, '21-11-2019', 124, 2481, 1124, 2843126, 0, 0, NULL),
(27, 1, 2, '22-11-2019', 13, 203, 93, 484255, 0, 0, NULL),
(28, 1, 2, '28-11-2019', 43, 1725, 922, 2004847, 0, 0, NULL),
(29, 1, 2, '29-11-2019', 55, 2451, 1241, 2031543, 0, 0, NULL),
(30, 1, 2, '01-12-2019', 27, 1643, 848, 638464, 0, 0, NULL),
(31, 1, 2, '03-12-2019', 1, 56, 26, 33559, 0, 0, NULL),
(32, 3, 2, '03-12-2019', 128, 3292, 2911, 5781997, 0, 0, NULL),
(33, 3, 1, '03-12-2019', 338, 9200, 8282, 12865017, 0, 0, NULL),
(34, 3, 2, '04-12-2019', 139, 3430, 3004, 5602833, 0, 0, NULL),
(35, 3, 1, '04-12-2019', 273, 7387, 6421, 9643158, 0, 0, NULL),
(36, 1, 2, '04-12-2019', 0, 36, 7, 110640, 0, 0, NULL),
(37, 1, 2, '05-12-2019', 2, 18, 8, 68034, 0, 0, NULL),
(38, 1, 2, '15-12-2019', 3, 62, 37, 212216, 0, 0, NULL),
(39, 3, 2, '15-12-2019', 61, 1376, 1213, 1566132, 0, 0, NULL),
(40, 3, 2, '14-12-2019', 77, 1209, 1086, 1256601, 0, 0, NULL),
(41, 3, 1, '15-12-2019', 214, 6706, 5745, 9267288, 0, 0, NULL),
(42, 3, 1, '14-12-2019', 171, 5808, 5005, 9165404, 0, 0, NULL),
(43, 1, 2, '14-12-2019', 5, 81, 43, 274122, 0, 0, NULL),
(44, 2, 1, '15-12-2019', 1, 1, 1, 1, 0, 0, NULL),
(45, 2, 1, '14-12-2019', 1, 1, 1, 1, 0, 0, NULL),
(46, 5, 2, '16-12-2019', 16, 451, 235, 1601267, 0, 0, NULL),
(47, 2, 2, '20-12-2019', 9, 107, 58, 240329, 0, 0, NULL),
(48, 5, 2, '23-12-2019', 21, 208, 140, 1072829, 0, 0, NULL),
(49, 5, 2, '24-12-2019', 19, 376, 225, 1059785, 0, 0, NULL),
(50, 5, 2, '25-12-2019', 19, 351, 205, 1067038, 0, 0, NULL),
(51, 5, 2, '26-12-2019', 15, 262, 117, 738853, 0, 0, NULL),
(52, 5, 2, '28-12-2019', 3, 84, 48, 193759, 0, 0, NULL),
(53, 5, 2, '29-12-2019', 4, 114, 52, 367095, 0, 0, NULL),
(54, 5, 2, '02-01-2020', 21, 354, 155, 1022530, 0, 0, NULL),
(56, 5, 2, '03-01-2020', 15, 341, 129, 1072775, 0, 0, NULL),
(57, 5, 2, '04-01-2020', 15, 343, 143, 1003191, 0, 0, NULL),
(58, 5, 2, '05-01-2020', 44, 715, 275, 1578159, 0, 0, NULL),
(59, 5, 1, '04-01-2020', 24, 324, 175, 1061046, 0, 0, NULL),
(60, 5, 1, '05-01-2020', 28, 434, 225, 1236048, 0, 0, NULL),
(61, 5, 2, '06-01-2020', 27, 575, 226, 1330196, 0, 0, NULL),
(62, 5, 1, '06-01-2020', 24, 324, 162, 1135654, 0, 0, NULL),
(63, 5, 1, '07-01-2020', 18, 369, 183, 1352317, 0, 0, NULL),
(64, 5, 2, '07-01-2020', 16, 350, 143, 760929, 0, 0, NULL),
(65, 5, 1, '08-01-2020', 19, 283, 165, 1182735, 0, 0, NULL),
(66, 5, 1, '09-01-2020', 17, 315, 163, 1157736, 0, 0, NULL),
(67, 5, 1, '10-01-2020', 4, 169, 75, 860948, 0, 0, NULL),
(68, 5, 2, '13-01-2020', 6, 108, 58, 259409, 0, 0, NULL),
(69, 7, 1, '13-01-2020', 8, 139, 73, 513267, 513267, 513267, NULL),
(70, 5, 2, '12-01-2020', 12, 173, 89, 417492, 0, 0, NULL),
(71, 5, 1, '12-01-2020', 9, 209, 113, 638876, 0, 0, NULL),
(72, 7, 1, '11-01-2020', 34, 265, 134, 925725, 925725, 925725, NULL),
(73, 5, 2, '11-01-2020', 9, 144, 88, 404971, 0, 0, NULL),
(75, 8, 2, '13-01-2020', 66, 1609, 1480, 1676072, 1676072, 1676072, NULL),
(76, 3, 0, '13-01-2020', 182, 3955, 3635, 3731763, 0, 0, NULL),
(77, 2, 1, '13-01-2020', 239, 2199, 1078, 2648280, 0, 0, NULL),
(78, 9, 2, '13-01-2020', 114, 520, 317, 707122, 0, 0, NULL),
(79, 5, 2, '14-01-2020', 43, 418, 179, 836475, 0, 0, NULL),
(80, 7, 1, '14-01-2020', 13, 114, 51, 437061, 0, 0, NULL),
(81, 3, 1, '14-01-2020', 235, 4320, 3891, 4841060, 4841060, 4841060, NULL),
(82, 8, 2, '14-01-2020', 98, 1642, 1487, 2, 0, 0, NULL),
(83, 5, 2, '15-01-2020', 60, 482, 221, 982942, 0, 0, NULL),
(84, 7, 1, '15-01-2020', 31, 211, 79, 609418, 0, 0, NULL),
(85, 5, 2, '16-01-2020', 141, 758, 386, 1360713, 1, 1, NULL),
(92, 5, 2, '26-01-2020', 272, 1843, 856, 3076533, 0, 0, NULL),
(93, 5, 2, '25-01-2020', 415, 2109, 1122, 3229553, 0, 0, NULL),
(94, 5, 2, '24-01-2020', 154, 857, 506, 1473840, 0, 0, NULL),
(95, 5, 2, '23-01-2020', 175, 973, 574, 1908678, 0, 0, NULL),
(96, 5, 2, '22-01-2020', 173, 1104, 617, 2060090, 0, 0, NULL),
(97, 5, 2, '21-01-2020', 155, 548, 352, 1323073, 0, 0, NULL),
(98, 5, 2, '20-01-2020', 161, 745, 423, 1254092, 0, 0, NULL),
(99, 5, 2, '19-01-2020', 171, 855, 518, 1329664, 0, 0, NULL),
(100, 5, 2, '18-01-2020', 152, 781, 455, 1405050, 0, 0, NULL),
(101, 5, 2, '17-01-2020', 123, 678, 383, 1322747, 0, 0, NULL),
(102, 7, 1, '26-01-2020', 93, 917, 362, 1256698, 0, 0, NULL),
(103, 7, 1, '17-01-2020', 87, 789, 318, 1478058, 0, 0, NULL),
(104, 7, 1, '18-01-2020', 114, 646, 281, 1329583, 0, 0, NULL),
(105, 7, 1, '19-01-2020', 76, 538, 233, 959559, 0, 0, NULL),
(106, 7, 1, '20-01-2020', 127, 664, 434, 1420017, 0, 0, NULL),
(107, 7, 1, '21-01-2020', 139, 757, 442, 1633778, 0, 0, NULL),
(108, 7, 1, '22-01-2020', 191, 1712, 920, 3312433, 0, 0, NULL),
(109, 7, 1, '23-01-2020', 266, 1623, 973, 3252970, 0, 0, NULL),
(110, 7, 1, '24-01-2020', 143, 1069, 642, 1488162, 0, 0, NULL),
(111, 7, 1, '25-01-2020', 178, 1291, 812, 1600159, 0, 0, NULL),
(112, 5, 2, '12-02-2020', 148, 980, 529, 2422959, 0, 0, NULL),
(113, 7, 1, '12-02-2020', 188, 1230, 637, 2929743, 0, 0, NULL),
(114, 3, 1, '12-02-2020', 298, 4783, 4362, 5523585, 0, 0, NULL),
(115, 11, 1, '13-02-2020', 69, 629, 351, 1389434, 0, 0, NULL),
(116, 5, 2, '13-02-2020', 129, 866, 509, 2078108, 0, 0, NULL),
(117, 7, 1, '13-02-2020', 251, 1059, 592, 2756904, 0, 0, NULL),
(118, 9, 0, '13-02-2020', 272, 1677, 787, 0, 0, 0, NULL),
(119, 2, 1, '13-02-2020', 243, 1341, 787, 0, 0, 0, NULL),
(120, 5, 2, '14-02-2020', 156, 932, 529, 2411155, 0, 0, NULL),
(121, 7, 1, '14-02-2020', 231, 914, 513, 1943657, 0, 0, NULL),
(122, 5, 2, '15-02-2020', 168, 1095, 576, 2979782, 0, 0, NULL),
(123, 5, 2, '16-02-2020', 41, 128, 73, 314876, 0, 0, NULL),
(124, 7, 1, '15-02-2020', 152, 889, 527, 1888124, 0, 0, NULL),
(125, 7, 1, '16-02-2020', 85, 560, 371, 1263211, 0, 0, NULL),
(126, 5, 2, '17-02-2020', 105, 788, 328, 2084527, 0, 0, NULL),
(127, 7, 1, '17-02-2020', 89, 566, 332, 1515535, 0, 0, NULL),
(128, 5, 2, '18-02-2020', 107, 833, 374, 2136607, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aktivitas`
--

CREATE TABLE IF NOT EXISTS `laporan_aktivitas` (
`id` int(11) NOT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT '',
  `leads` int(11) DEFAULT NULL,
  `totalan` int(11) DEFAULT NULL,
  `closing` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_aktivitas_detail`
--

CREATE TABLE IF NOT EXISTS `laporan_aktivitas_detail` (
`id` int(11) NOT NULL,
  `id_laporan` bigint(20) DEFAULT NULL,
  `media` int(11) DEFAULT NULL COMMENT 'wa = 1, shopee = 2, tokopedia = 3, cod = 4',
  `id_produk` int(11) DEFAULT NULL COMMENT 'hb = 1, gc = 2',
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_order`
--

CREATE TABLE IF NOT EXISTS `laporan_order` (
`id` int(11) NOT NULL,
  `no_invoice` varchar(30) COLLATE latin1_general_ci DEFAULT '',
  `id_cs` int(11) DEFAULT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'update tanggal pas isi pertama',
  `media` int(11) DEFAULT NULL COMMENT 'wa = 1, shopee = 2, tokopedia = 3, cod = 4',
  `nama_pembeli` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat` text COLLATE latin1_general_ci,
  `no_hp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `kodepos` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `selisih` double DEFAULT NULL,
  `biaya_lain` double DEFAULT NULL COMMENT 'isi biaya cod',
  `nominal` double DEFAULT NULL,
  `tanggal_transfer` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bank` int(11) DEFAULT NULL COMMENT '1 bri 2 bca 3 mandiri tabel bank',
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` varchar(0) COLLATE latin1_general_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1 = menunggu admin, 2 = diproses, 3 = dikirim, 4 = selesai, 5 = request cancel, 6 = canceled',
  `no_resi` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_expedisi` int(11) NOT NULL,
  `keterangan` text COLLATE latin1_general_ci NOT NULL,
  `detail_pembeli` text COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_order_detail`
--

CREATE TABLE IF NOT EXISTS `laporan_order_detail` (
`id` int(11) NOT NULL,
  `id_order` bigint(20) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`id` int(11) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `id_cabang`, `level`, `keterangan`) VALUES
(1, 1, 1, 'admin'),
(2, 2, 3, 'admin outlet'),
(3, 2, 2, 'sales outlet'),
(4, 2, 6, 'member'),
(5, 2, 7, 'member reseller');

-- --------------------------------------------------------

--
-- Table structure for table `level_pengaturan_akuntansi`
--

CREATE TABLE IF NOT EXISTS `level_pengaturan_akuntansi` (
`id` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level_pengaturan_akuntansi`
--

INSERT INTO `level_pengaturan_akuntansi` (`id`, `level`) VALUES
(1, 'Biaya'),
(2, 'HPP'),
(3, 'PPn');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`id` int(11) unsigned NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
`id` int(11) NOT NULL,
  `id_toko` bigint(20) NOT NULL,
  `nm_meja` varchar(50) DEFAULT NULL,
  `jml_kursi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
`id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_toko` bigint(20) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `kode` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `telp` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tgl_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `diskon` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `deposit` double DEFAULT NULL,
  `pkp` int(11) NOT NULL,
  `persen_pajak` double NOT NULL,
  `id_kota` int(11) NOT NULL DEFAULT '1',
  `id_pil_harga` int(11) NOT NULL,
  `uid_akun` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=327 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `id_member`, `id_toko`, `id_sales`, `id_users`, `kode`, `nama`, `alamat`, `telp`, `tgl_lahir`, `diskon`, `deposit`, `pkp`, `persen_pajak`, `id_kota`, `id_pil_harga`, `uid_akun`, `id_gudang`) VALUES
(1, 1, 158, 1, 1, 'RG001', 'Adi Wibowo', 'Grobogan', '08562732933', '12/9/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(2, 2, 158, 1, 1, 'RG002', 'M ZAKY PRATAMA ADJIE', 'KP.RAWA KALONG RT.002/021 NO.2 , SETIAMEKAR , TAMBUN SELATAN , KABUPATEN BEKASI 17510', '089509284102', '7/30/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(3, 3, 158, 1, 1, 'RG003', 'Hajar Mayang L.P', 'Cluster Grenada Perum Graha Cikarang Blok F7 No 4 Rt 2 Rw 19, Kel. Simpangan Kec. Cikarang Utara Kab. Bekasi', '0812-9941-6612', '8/20/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(4, 4, 158, 1, 1, 'RG004', 'moh.fawwaz', 'cilemahabang raya u.5 no.97 cikarang baru', '081381955482', '2/15/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(5, 5, 158, 1, 1, 'RG005', 'Aisyah Dewi', 'Diamond Golden Cinere', '087887494263', '5/27/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(6, 6, 158, 1, 1, 'RG006', 'Adam Nurohman', 'Perumahan Warnasari Indah FWA.98 No.01 RT.02 RW.06 Kel. Warnasari Kec. Citangkil Kota Cilegon, Banten', '085711867591', '3/5/1994', '', NULL, 0, 0, 1, 0, 0, 0),
(7, 7, 158, 1, 1, 'RG007', 'Heri Wahyu P', 'Permata depok sektor mutiara B4 no 12 kel pondok Jaya kec cipayung', '081807990450', '', '', NULL, 0, 0, 1, 0, 0, 0),
(8, 8, 158, 1, 1, 'RG008', 'RIMA SISKASARI', 'Jl. RAYA BLORA - CEPU, WONOREJO LORONG 4 RT. 09 RW. 13 CEPU KAB. BLORA', '082221066785', '10/30/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(9, 9, 158, 1, 1, 'RG009', 'Tokhidin', 'Jln.Masjid Karangjati Margasari Kab.Tegal', '085229413398', '9/19/1976', '', NULL, 0, 0, 1, 0, 0, 0),
(10, 10, 158, 1, 1, 'RG010', 'Feni Indriastuti', 'JL.Pucang gading Raya RT 03 RW 09 Batursari - Mranggen. DEMAK', '085742218505', '7/20/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(11, 11, 158, 1, 1, 'RG011', 'Feni Indriastuti', 'JL.Pucang gading raya RT 03 RW 09 Kel.Batursari Kec.Mranggen Kab.Demak', '085742218505', '7/20/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(12, 12, 158, 1, 1, 'RG012', 'Hariyanto', 'Jl tropodo 1barat rt21 rw02. Waru-sidoarjo', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(13, 13, 158, 1, 1, 'RG013', 'Tri har', '"Blunyah Rejo tr2/930', '082220341583', '', '', NULL, 0, 0, 1, 0, 0, 0),
(14, 14, 158, 1, 1, 'RG014', 'Mahmud soleko', 'dayu lor rt 17 banyurip ssambungmacan sragen jawa tengah', '085226465573', '6/24/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(15, 15, 158, 1, 1, 'RG015', 'Muchamad mufrod', 'Perum villa mutiara blok m81 no 17 rt 06 rw 11,wanajaya, Cibitung,bekasi.jawa barat', '081316565004', '9/8/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(16, 16, 158, 1, 1, 'RG016', 'Kurota Aini', 'Jln P Diponegoro Gang 3 No 55a Rt 002/003 desa/kel Karangwaru kec Tulungagung kab Tulungagung', '082245611756', '12/30/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(17, 17, 158, 1, 1, 'RG017', 'Desy Ristiana Putri', 'Ds. Ngemplak Lor RT 01 RW 01 kec Margoyoso kab Pati', '081329557556', '8/12/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(18, 18, 158, 1, 1, 'RG018', 'Lazuardhi Dwi Irawan', 'Jl. Pahlawan No.1 RT/RW 02/05 Karangsari Giyanti (Toko ATK Arjuna)', '085643524333', '4/23/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(19, 19, 158, 1, 1, 'RG019', 'muhammad nizam ali', 'Tersobo rt 3 rw 2 prembun kebumen', '087755949819', '5/12/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(20, 20, 158, 1, 1, 'RG020', 'Herlina Reski', 'Jl.g.kidul rt 13 no 31 talang banjar jambi timur 36142', '085273989790', '11/2/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(21, 21, 158, 1, 1, 'RG021', 'Dliaul Khnifah', 'Kalibeber Rt 5 Rw 13, Mekarsari', '081362795131', '12/4/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(22, 22, 158, 1, 1, 'RG022', 'Vivit Fitriyani', 'Jl. Lawu No. 9 Oro oro Dowo Klojen Malang', '083128962161', '4/29/1974', '', NULL, 0, 0, 1, 0, 0, 0),
(23, 23, 158, 1, 1, 'RG023', 'sandy', 'Jl. Teri Cilacap', '085888982990', '', '', NULL, 0, 0, 1, 0, 0, 0),
(24, 24, 158, 1, 1, 'RG024', 'Naryo', 'Perum Serpong Terrace E8/19. Jl Raya Viktor BSD, Tangerabg Selatan', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(25, 25, 158, 1, 1, 'RG025', 'Rofika safitria', 'Villa mutiara cikarang 2 nlok c7 no 5 cikarang selatan 17550', '085711032967', '6/15/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(26, 26, 158, 1, 1, 'RG026', 'Anita Fibrianti Rahayuningtyas', 'Puri candi bugang blok f.6 kalierang wonosobo', '081326930279', '2/28/1979', '', NULL, 0, 0, 1, 0, 0, 0),
(27, 27, 158, 1, 1, 'RG027', 'SARWANTO', 'PERUMAHAN BUMI CIKARANG MAKMUR (BCM) BLOK D12 NO 2', '082312330005', '5/25/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(28, 28, 158, 1, 1, 'RG028', 'Aryo', 'Serpong terrace E8/19 -jl Raya Viktor BSD', '081511265002', '', '', NULL, 0, 0, 1, 0, 0, 0),
(29, 29, 158, 1, 1, 'RG029', 'Savitri', 'Milano 8 no. 32 gading serpong tangerang', '081224344075', '2/2/1975', '', NULL, 0, 0, 1, 0, 0, 0),
(30, 30, 158, 1, 1, 'RG030', 'Indah Vidiastri', 'Jl. Anang Hasyim perum PWI blok D. Samarinda', '08125511048', '8/11/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(31, 31, 158, 1, 1, 'RG031', 'Eko Santoso Pribadi', 'Perumahan Jaten Permai Indah ,JL PUSPONYIDRO NO 15,RT 02/RW 19,KALURAHAN JATEN,KECAMATAN JATEN,KABUPATEN KARANGANYAR', '081215279899', '4/8/1979', '', NULL, 0, 0, 1, 0, 0, 0),
(32, 32, 158, 1, 1, 'RG032', 'Gany Adhiatma ', 'Kuripan RT 5 RW 2 Watumalang Wonosobo', '082237233449', '9/12/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(33, 33, 158, 1, 1, 'RG033', 'Dimas Aditya seftiandi', 'Jl Nusantara GN2 Kaliwates jember', '089502167255', '9/5/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(34, 34, 158, 1, 1, 'RG034', 'Nurdiyah Ratnani', 'Talaga Bestari cluster Harmony Blok HU no.2 Balaraja timur kab. Tangerang', '081903622349', '2/11/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(35, 35, 158, 1, 1, 'RG035', 'Sabrina Subhastian', 'Perumahan Argo Residence Blok C14A Tlogojati, Wonosobo', '082323560065', '7/23/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(36, 36, 158, 1, 1, 'RG036', 'Maskhun Setyawan', 'Kwaluhan RT.01/01, Madusari, Secang, Magelang', '085729307000', '1/17/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(37, 37, 158, 1, 1, 'RG037', 'Maryam', 'Pagedangan Tumenggungan Selomerto Wonosobo', '082227111200', '4/11/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(38, 38, 158, 1, 1, 'RG038', 'Siti Isdahlia', 'Jl. Guru-guru 1 LK. 1 RT.3 No. 154 Kel. Sukadana Kec. Kota Kayuagung Kab. OKI 30611', '+6285788203266', '8/6/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(39, 39, 158, 1, 1, 'RG039', 'Kurniadi ', 'Gisting permai blok 21,kec.gisting,kab.Tanggamus lampung, kode pos 35378', '085273135237', '10/19/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(40, 40, 158, 1, 1, 'RG040', 'Rina maryani', 'Kp karanganyar', '083820386251', '1/24/2001', '', NULL, 0, 0, 1, 0, 0, 0),
(41, 41, 158, 1, 1, 'RG041', 'Fatina nurbaiti', 'DS. Mlandi Rt 02/02 Garung Wonosobo', '085780252997', '1/17/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(42, 42, 158, 1, 1, 'RG042', 'HAIVA PUTRI SETIAWATI', 'Desa pabedilan wetan RT12 RW03 blok kajepit kecamatan pabedilan kabupaten Cirebon', '+6591028372', '12/15/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(43, 43, 158, 1, 1, 'RG043', 'Muhammad Taufik Zas', 'Desa Lhok Gajah, Kecamatan Kuala Batee, Kabupaten Aceh Barat Daya, Provinsi Aceh', '08126416415', '4/4/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(44, 44, 158, 1, 1, 'RG044', 'Solehudin', 'Jl.kayu mas tengah 3 RT.009/04 no.45 Pulo gadung , Jakarta timur 13260', '08878807167', '10/19/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(45, 45, 158, 1, 1, 'RG045', 'Muhammad Mustofa (Ragiel Saput', 'Perumahan Asli Permai Blok BB No 28 RT 09 RW 05 Kramatan WONOSOBO Jateng', '085729278055', '9/20/1974', '', NULL, 0, 0, 1, 0, 0, 0),
(46, 46, 158, 1, 1, 'RG046', 'Siti Sarah', 'Jl Bulak Timur, Cipayung, Depok', '081911463225', '7/9/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(47, 47, 158, 1, 1, 'RG047', 'Ida Rohmah', 'Desa Mengori RT 02 RW 03 Pemalang', '087832905785', '12/16/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(48, 48, 158, 1, 1, 'RG048', 'Solikhin', 'Tempel RT 34 RW 08 Kel Purbayan Kec Kotagede Yogyakarta', '08121552139', '11/8/1973', '', NULL, 0, 0, 1, 0, 0, 0),
(49, 49, 158, 1, 1, 'RG049', 'Arif Fitriyanto', 'Krakalsantren rt2/rw2 kertek', '087734142728', '5/8/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(50, 50, 158, 1, 1, 'RG050', 'Arif Adhi Saputro', 'Ds. Dilem, Tawang, Susukan, Kab. Semarang', '081914598086', '5/14/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(51, 51, 158, 1, 1, 'RG051', 'Erni widyaningsih', 'Kepatihan rt 006 rw 005 kec. Leksono kab. Wonosobo', '082226223690', '4/10/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(52, 52, 158, 1, 1, 'RG052', 'dicky iriawan ', 'jl yudistira no 3 salatiga', '081915554585', '11/8/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(53, 53, 158, 1, 1, 'RG053', 'Adi W', 'Rejosari Grobogan', '08562732933', '12/11/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(54, 54, 158, 1, 1, 'RG054', 'Adi W', 'Rejosari Grobogan', '08562732933', '12/11/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(55, 55, 158, 1, 1, 'RG055', 'Kharina Kurniawati', 'Tegalmulyo RT 02 RW 05, Kepek, Wonosari, Gununvkidul, D.I. Yogyakarta', '081226807161', '1/12/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(56, 56, 158, 1, 1, 'RG056', 'Larasati', 'Mlati Tegal Rt 005 Rw 020 No 01, Kel.Sendangadi Kec. Mlati Kab. SLEMAN 55285', '089673611128', '6/17/1980', '', NULL, 0, 0, 1, 0, 0, 0),
(57, 57, 158, 1, 1, 'COBA1', 'Coba doang', 'wafdsfas', '+628995944995', '12/21/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(58, 58, 158, 1, 1, 'WOZO1', 'Ilham Ardha', 'Wonosobozone', '085729145241', '8/9/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(59, 59, 158, 1, 1, 'PG001', 'Fajar Khoirudin', 'RT01/RW02 desa pagerejo, kec kertek, kab wonosobo', '081291111243', '3/25/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(60, 60, 158, 1, 1, 'PG002', 'Uswatun aulia hasanah', 'Cikarang, bekasi', '085786228161', '10/16/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(61, 61, 158, 1, 1, 'PG003', 'Daniel haryoyuwono wirawan', 'Perak bpm no. 18 , Klaten', '082221232380', '12/23/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(62, 62, 158, 1, 1, 'PG004', 'Windy ', 'DS. Brayut RT. 04 RW. 29, Pandowoharjo, Sleman, DIY', '083128810891', '4/27/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(63, 63, 158, 1, 1, 'PG005', 'Mely Krisita', 'Jl. Samoja dlm no 29/121 RT. 005 RW.007, kel. Samoja. Kec. Batununggal', '+6281903973727', '5/21/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(64, 64, 158, 1, 1, 'PG006', 'Nur azizah', 'Kenjer kertek wonosobo', '08562595951', '8/19/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(65, 65, 158, 1, 1, 'PG007', 'PUGUH HAFID LURRIZKA', 'Kalikluwih RT 001/006 Kelurahan Leksono Kec.Leksono Kab. Wonosobo 56362', '081225473050', '6/29/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(66, 66, 158, 1, 1, 'PG008', 'Fitris Hendrawan', 'Sumberejo RT.7 RW.3 Wadaslintang', '085743978786', '2/19/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(67, 67, 158, 1, 1, 'PG009', 'AHMAD HIDAYAT PRATAMA', 'Dusun kritik Desa Pakunn kec.selomerto kab.wonosobo', '085712237370', '4/24/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(68, 68, 158, 1, 1, 'PG010', 'HANIF DWI PRAYOGO', 'Jl.HM sujan no 898 RT 02 Rw 01 Desa Mernek. Kec. Maos Kab. Cilacap', '082226789196', '8/10/1994', '', NULL, 0, 0, 1, 0, 0, 0),
(69, 69, 158, 1, 1, 'PG011', 'Anjang Diah Saputri', 'Ds.siwatu, Des. Bumiroso, kec. Watumalang, Kab. Wonosobo', '085858455299', '7/6/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(70, 70, 158, 1, 1, 'PG012', 'Rudi Hartanto', 'Kalicecep, RT 18 RW 1, Bejiarum, Kertek, Wonosobo', '085729442733', '2/26/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(71, 71, 158, 1, 1, 'PG013', 'Komarudin', 'Jl. Ahmad dahlan gang haji dulloh RT01/02 kec. Cipondoh kel.petir tangerang', '0895423776789', '4/25/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(72, 72, 158, 1, 1, 'PG014', 'Alfian fathul hakim', 'Sidojoyo Rt 03 Rw 10 Pagerkukuh Wonosobo', '081215891020', '4/9/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(73, 73, 158, 1, 1, 'PG015', 'siti rukoyah', 'prumbanan rt 05 rw 04 desa purwojati kecamatan kertek kabupaten wonosobo', '085876827841', '6/15/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(74, 74, 158, 1, 1, 'PG016', 'HANIEK RAHMAWATI', 'Jambusari kertek wonosobo', '085235337743', '5/29/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(75, 75, 158, 1, 1, 'PG017', 'Ardhan Nugrahakjl', 'Jl Delima No. 16 rt 002 rw 03 kelurahan ceger kecamatam cipayung jakarta timur', '082249222264', '3/20/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(76, 76, 158, 1, 1, 'PG018', 'Arinda Detya Susalit', 'Perum Harmoni Residence blok RBB no. 01 Jl. Noor Aidi, RT 06, kec. Tanta, kab. Tabalong, Kalimantan Selatan', '085743000149', '12/4/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(77, 77, 158, 1, 1, 'PG019', 'Khozin', 'Desa Pinayungan Jl Sukadana 1 Gang RCTI depan SMP N 1 Telukjambe Timur RT 03/RW 01 Kontrakan Hj. Acep Sutisna No 9 Kec Telukjambe Timur Kab. Karawang Prov. Jawa Barat 41311', '082220637482', '4/29/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(78, 78, 158, 1, 1, 'PG020', 'warsiyah', 'Jln komplek carina sayang no 90.felamboyan rt08 rw012.rawa buaya.cengkareng.jakarta barat .kode pos 11740', '083872484440', '5/25/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(79, 79, 158, 1, 1, 'PG021', 'Sarengat Oka', '"OKA COTTON CANDY\nKabutuh, RT.13/RW.5, Kabutuh, Ngadikusuman, Kec. Kertek, Kabupaten Wonosobo, Jawa Tengah 56371"\r\n', '085292628888', '7/27/1970', '', NULL, 0, 0, 1, 0, 0, 0),
(80, 80, 158, 1, 1, 'PG022', 'Widoyo', 'Rejosari tambi kejaja\r\n', '085726874166', '8/8/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(81, 81, 158, 1, 1, 'PG023', 'Lailatul hijriyah', '"Perumahan Green Garden Blok b2/26 Rt 01/ RW 33 kel Nagasari . Kec karawang barat. Kab karawang \nJawa Barat"\r\n', '085814767675', '9/23/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(82, 82, 158, 1, 1, 'PG024', 'Ruwiyati', '"Jl.pegangsaan 2\nKp.Rawa Indah rt/rw 05/03 no 16\nKel.Pegangsaan 2 \nKec.Kelapa Gading (jakut)"\r\n', '087888716764', '5/7/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(83, 83, 158, 1, 1, 'PG025', 'Akhmat Subiyakto', 'Ds.Kuripan Rt04/01 Kec.Garung Kab.Wonosobo', '0856-4193-2866', '5/29/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(84, 84, 158, 1, 1, 'PG026', 'Reza', 'sariagung gang wijaya kusuma, no 15 rt 3 rw 10-wonosobo', '081338584498', '10/1/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(85, 85, 158, 1, 1, 'PG027', 'Anggita Indah Adianingsih', 'JL AMD BANTARGEBANG RT 04 RW 01 No. 226,Kode Pos: 17151,Bekasi,Jawa Barat', '08989352771', '8/25/2000', '', NULL, 0, 0, 1, 0, 0, 0),
(86, 86, 158, 1, 1, 'PG028', 'Siti Maryam', 'Gondang, RT/RW, 01/01. Watumalang, Wonosobo', '085200814000', '4/26/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(87, 87, 158, 1, 1, 'PG029', 'Muhamad Azhar Alfikri ', 'Kotakombo RT.3 RW.1 Randusari, Kepil, Wonosobo', '?+62 882?1578?5049?', '5/10/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(88, 88, 158, 1, 1, 'PG030', 'Suyanti', 'Wonokasihan Rt 04Rw04, sojokerto kecamatan leksono,kabupaten wonosobo', '081339933100', '1/8/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(89, 89, 158, 1, 1, 'PG031', 'Nasir', 'Jl Jurang Blimbing no B12 rt04 rw04 Tembalang Semarang', '081285874833', '7/7/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(90, 90, 158, 1, 1, 'PG032', 'Imam Adi', 'Derongisor rt08 rw01 kec Mojotengah kab Wonosobo', '082141808050', '9/16/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(91, 91, 158, 1, 1, 'PG033', 'Monica Aulia Putri', 'Kel. Tambakaji RT 6/13, Kec. Ngalian, Kota Semarang', '081392739364', '11/24/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(92, 92, 158, 1, 1, 'PG034', 'Muhammad Iqbal Riyanto', 'Krajan RT/RW 002/002 Larangan Kulon Mojotengah Wonosobo', '081542945070', '8/19/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(93, 93, 158, 1, 1, 'PG035', 'Widoyo', 'Rejosari rt 01 re 01 tambi, kejajar', '085726871466', '8/8/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(94, 94, 158, 1, 1, 'PG037', 'Hanif setiawan', 'Garung butuh kecamatan kalikajar kabupaten Wonosobo RT 9 RW 3', '081353725522', '8/30/2001', '', NULL, 0, 0, 1, 0, 0, 0),
(95, 95, 158, 1, 1, 'PG038', 'Suci mawarni', 'Macanan Mojosari RT / RW 01/01 bansari Temanggung', '085779502761', '12/28/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(96, 96, 158, 1, 1, 'PG039', 'meiko', 'Jln swadaya 1 Rt 04 Rw 09 no 2 pejaten timur pasar minggu jakarta selatan', '082122290415', '5/21/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(97, 97, 158, 1, 1, 'PG040', 'Saat mustajab waliulloh', 'Rt:03/Rw:08,ds jambusari kec kretek', '085747316435', '19-04-99', '', NULL, 0, 0, 1, 0, 0, 0),
(98, 98, 158, 1, 1, 'PG041', 'Anggita Indah Adianingsih', 'JL. AMD BANTARGEBANG RT 04 RW 01, No. 226, Kode pos : 17151, Bekasi, Jawa Barat', '08989352771', '25-08-2000', '', NULL, 0, 0, 1, 0, 0, 0),
(99, 99, 158, 1, 1, 'PG042', 'ANGGITA INDAH ADIANINGSIH', 'JL AMD BANTARGEBANG RT 04 RW 01, No. 226, Kode Pos : 17151,Bekasi,Jawa Barat', '08989353771', '25-08-2000', '', NULL, 0, 0, 1, 0, 0, 0),
(100, 100, 158, 1, 1, 'PG043', 'ALFINA WIDAYANTI', 'Dk. Bakalan RT.10 RW.02 DS. Sidoharjo', '082322063481', '05 Oktober 2009', '', NULL, 0, 0, 1, 0, 0, 0),
(101, 101, 158, 1, 1, 'PG044', 'Barokah yuwono saputro', 'Temanggung rt/13 rw/03, Winongsari, Kaliwiro, Wonosobo', '083104076762', '20/05/2003', '', NULL, 0, 0, 1, 0, 0, 0),
(102, 102, 158, 1, 1, 'PG056', 'Sulis Eka Setyawati', 'Kecitran legok RT 03 RW 02', '082323700150', '19 February 2004', '', NULL, 0, 0, 1, 0, 0, 0),
(103, 103, 158, 1, 1, 'PG057', 'Nova Indah', 'Bima Groove Residence Blok 1 E No.3 Dukuh Bima Lambangsari Tambun Selatan Bekasi 17510', '081586277313', '30 November 1978', '', NULL, 0, 0, 1, 0, 0, 0),
(104, 104, 158, 1, 1, 'PG058', 'Rina wati', 'Wonobungkah rt 08 rw 07 kel.jlamprang', '0895332609706', '21 maret 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(105, 105, 158, 1, 1, 'PG059', 'Putri kinanti', 'Kaliasem rt 24 rw 7', '085292147907', '06 september 1999', '', NULL, 0, 0, 1, 0, 0, 0),
(106, 106, 158, 1, 1, 'PG060', 'Yuliana Latifah', 'Wonokerto RT 04, RW 03, Leksono, Wonosobo', '085726266552', '19 Januari 1997', '', NULL, 0, 0, 1, 0, 0, 0),
(107, 107, 158, 1, 1, 'PG062', 'Adit Satriansah', 'Sarimulyo Indah Rt09/Rw02 Tawangsari, Wonosobo.', '081338362739', '1 Juli 2002', '', NULL, 0, 0, 1, 0, 0, 0),
(108, 108, 158, 1, 1, 'PG063', 'SegiMuntaqo', 'Lemiring(05/07), Ngalian, Wadaslintang, Wonosobo', '089688033340', '09 mei  1999', '', NULL, 0, 0, 1, 0, 0, 0),
(109, 109, 158, 1, 1, 'PG064', 'HENDRIANTO', 'Jalan ciberang rt 01 rw 06 nomer 129 ciherang tapos depok', '081287792420', '14 maret 1986', '', NULL, 0, 0, 1, 0, 0, 0),
(110, 110, 158, 1, 1, 'PG065', 'Hendi Pibee Group', 'JL. JOLONTORO Gg Melati no 10 Campursari Jarakasari Wonosobo', '081391888057', '24 / 10 / 1988', '', NULL, 0, 0, 1, 0, 0, 0),
(111, 111, 158, 1, 1, 'PG066', 'ririn laila', 'manggisan lama rt3 rw8 mudal mojotengah wonosobo', '081329564987', '25-7-1993', '', NULL, 0, 0, 1, 0, 0, 0),
(112, 112, 158, 1, 1, 'PG067', 'Lumatun arofah', 'Sawangan 02/03 tumenggungan, Selomerto wonosobo', '+62 831-1730-2655', '16 maret 2000', '', NULL, 0, 0, 1, 0, 0, 0),
(113, 113, 158, 1, 1, 'PG068', 'Dyah Aridha Wardyani ', '"Rusun BNN \nJl. HR Edi Sukma Km. 21, Watesjaya, Cigombong, Bogor"\r\n', '085228831322', '14 Oktober 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(114, 114, 158, 1, 1, 'PG069', 'Titik hermi toviptiati', 'Jln veteran no 67 sudagaran rt 1 rw 5 wonosobo timur', '081327069809', '16051965', '', NULL, 0, 0, 1, 0, 0, 0),
(115, 115, 158, 1, 1, 'PG070', 'Santi Riyani', 'Jalan Pesantren no 45 Kelurahan kedung halang kota bogor', '085697007400', '05 Mei 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(116, 116, 158, 1, 1, 'PG071', 'Rokhanah ', 'Jln. Kyai Muntang Jaraksari RT. 02 RW. 02 Wonosobo 56314', '085329130187', '01/12/79', '', NULL, 0, 0, 1, 0, 0, 0),
(117, 117, 158, 1, 1, 'PG072', 'Donny Cahya Christian', 'Jalan Tanjung Selatan 2 blok E no 3b', '085251996766', '19 Mei 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(118, 118, 158, 1, 1, 'PG073', 'Latif Maulana Yusuf', 'Desa Salamerta , Kec.Mandiraja , Kab.Banjarnegara', '082145796265', '31 Desember 2001', '', NULL, 0, 0, 1, 0, 0, 0),
(119, 119, 158, 1, 1, 'PG074', 'Sulistyaningrum', 'Perum griya bantarindah', '087837142009', '28 maret 1982', '', NULL, 0, 0, 1, 0, 0, 0),
(120, 120, 158, 1, 1, 'PG075', 'Bayu Widiantoro', 'Watububan rt3 rw2, gedanganak, Ungaran timur, kab.semarang', '08984014303', '5 September 1994', '', NULL, 0, 0, 1, 0, 0, 0),
(121, 121, 158, 1, 1, 'PG076', 'Juli Pratikno', 'Somawangi rt 03 rw 03, Kec. Mandiraja, Kab. Banjarnegara', '089648691057', '18 Juli 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(122, 122, 158, 1, 1, 'PG077', 'Bayu Widiantoro', 'Watububan rt3 rw2 gedanganak ,Ungara timur,kab. Semarang', '08984014303', '5 September 1994', '', NULL, 0, 0, 1, 0, 0, 0),
(123, 123, 158, 1, 1, 'PG078', 'Sodik bawono ', '"Kec: kalibening \nKel:kalisat kidul \nKab:banjarnegara.\nkodepos 53456"\r\n', '085280605275', '24/05/83', '', NULL, 0, 0, 1, 0, 0, 0),
(124, 124, 158, 1, 1, 'PG079', 'Tantri', 'Sumberan Utara 117 RT 03 RW 01 Wonosobo', '0895354948700', '09 Maret 1976', '', NULL, 0, 0, 1, 0, 0, 0),
(125, 125, 158, 1, 1, 'PG080', 'Ispriyati', 'Villa Amarta 2 no B10, jalan elang 2, sawah lama , Ciputat, Tangerang Selatan', '082310104049', '1 Mei 1958', '', NULL, 0, 0, 1, 0, 0, 0),
(126, 126, 158, 1, 1, 'PG081', 'Huda Rachman', 'Toko Laris Frozenfood Jl. Moch. Toha no. 12 kedungarum Kuningan Jawa barat. Samping Garuda Cell.', '081355200744', '19-03-1980', '', NULL, 0, 0, 1, 0, 0, 0),
(127, 127, 158, 1, 1, 'PG082', 'muhamad rokib', 'jl. beneteng portugis km.4, rumah bpk.sukatam ,dk. grobogan Rt/Rw.03/03 ds.ujungwatu kec.donorojo kab.jepara', 'hp.081326937224/WA.08520003751', '14 oktober 1995', '', NULL, 0, 0, 1, 0, 0, 0),
(128, 128, 158, 1, 1, 'PG083', 'Naryangingsih', 'Kebumen RT 01 RW 03 kebumen , Pringsurat temanggung', '081328735567', '22 Juli 1967', '', NULL, 0, 0, 1, 0, 0, 0),
(129, 129, 158, 1, 1, 'PG084', 'teguh evan setiawan', 'kronjo, kab.tangerang prov.banten', '085712976046', '11agustus1988', '', NULL, 0, 0, 1, 0, 0, 0),
(130, 130, 158, 1, 1, 'PG085', 'Rokhanah ', 'Jln. Kyai Muntang Jaraksari RT. 02 RW. 02 Wonosobo 56314', '085329130187', '01/12/79', '', NULL, 0, 0, 1, 0, 0, 0),
(131, 131, 158, 1, 1, 'PG086', 'Muthiana Anifah', 'Jambusari RT 04 RW 08 kertek wonoWono', '085229999677', '3 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(132, 132, 158, 1, 1, 'PG087', 'Muthiana Anifah', 'Jambusari RT 04 RW 08 kertek Wonosobo', '085229999677', '3 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(133, 133, 158, 1, 1, 'PG088', 'Kharisma aprillia', 'Perum Bluru Permai EF-17, RT/RW 10/11, Kel. Bluru Kidul, KAB. SIDOARJO, SIDOARJO, JAWA TIMUR, ID, 61233', '087702918059', '12041997', '', NULL, 0, 0, 1, 0, 0, 0),
(134, 134, 158, 1, 1, 'PG089', 'Asep sambas', 'Tambakmekar Jalancagak', '085223244646', '7 - 12 - 1993', '', NULL, 0, 0, 1, 0, 0, 0),
(135, 135, 158, 1, 1, 'PG090', 'Rian Triana', 'Perumahan grand mutiara kosambi blok o4 no 8 desa Blendung kec Klari kab Karawang Jawa barat', '082211507466/085719527951', '22 juli 192', '', NULL, 0, 0, 1, 0, 0, 0),
(136, 136, 158, 1, 1, 'PG091', 'Latifah', 'Penawangan Tawangsari Wonosobo', '089675288457', '15011989', '', NULL, 0, 0, 1, 0, 0, 0),
(137, 137, 158, 1, 1, 'PG092', 'Sigit Mei Setiawan', 'Mirombo RT 5/2 Rojoimo Wonosobo', '081328050700', '28 Mei 1970', '', NULL, 0, 0, 1, 0, 0, 0),
(138, 138, 158, 1, 1, 'PG093', 'khafid akhyar', 'desa Pecarikan RT. 01 RW. 01 Kec. Prembun Kebumen', '081232812617', '15', '', NULL, 0, 0, 1, 0, 0, 0),
(139, 139, 158, 1, 1, 'PG094', 'tri puji astuti ', 'puri krakatau hijau D3 no 17 kecamatan grogol kelurahan kotasari', '085210203191', '23 02 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(140, 140, 158, 1, 1, 'PG095', 'safira arumawati', 'pederesan besar no.96 rt.03 rw.04 kebonagung, semarang timur', '08562639289', '20 feb 90', '', NULL, 0, 0, 1, 0, 0, 0),
(141, 141, 158, 1, 1, 'PG096', 'Ratna Marta sari', 'Ngadireso,ngadikusuman 6/7,kertek,wonosobo', '082135632940', '10 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(142, 142, 158, 1, 1, 'PGO97', 'Trisno Sujati', 'Jambusari RT 07 RW 07 Kertek', '08562919066', '17-03-1985', '', NULL, 0, 0, 1, 0, 0, 0),
(143, 143, 158, 1, 1, 'PG098', 'Hendrawan Prasetiyo Dhany', 'Penjaringan Asri VI no 37 (PS 2F no 39) Surabaya, 60297', '081330332220', '24 Juli 1975', '', NULL, 0, 0, 1, 0, 0, 0),
(144, 144, 158, 1, 1, 'PG099', 'Fala Azita', '"Familia Urban\nCluster Dharmawangsa Blok CF/10 Jln.Mandor Demong Pedurenan Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157"\r\n', '087877884770', '14 Januari 1986', '', NULL, 0, 0, 1, 0, 0, 0),
(145, 145, 158, 1, 1, 'PG100', 'Lili Irkhanah', 'Dk Duwet rt7 rw1 kel cepiring. kec cepiring. kab kendal', '081567736417', '21 Sept 1990', '', NULL, 0, 0, 1, 0, 0, 0),
(146, 146, 158, 1, 1, 'PG101', 'TRI TEGUH SETYAWAN', 'Sumberejo, wadaslintang, wonosobo', '0812-9174-8040', '22 juli 1995', '', NULL, 0, 0, 1, 0, 0, 0),
(147, 147, 158, 1, 1, 'PG102', 'Arinto Surya', 'Gubragan, Mudal, Mojotengah', '085229864128', '29-11-1991', '', NULL, 0, 0, 1, 0, 0, 0),
(148, 148, 158, 1, 1, 'PG103', 'Ernawati', 'Kemloko mojoagung plantungan', '082220937464', '22 juli 1979', '', NULL, 0, 0, 1, 0, 0, 0),
(149, 149, 158, 1, 1, 'PG104', 'Handoko Kendro', 'Bausasran dn3/789A', '081328339900', '10/11/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(150, 150, 158, 1, 1, 'PG105', 'Eliana', 'cluster griya prima lestari RT 02/03 gang laimun babakan mustikasari mustikajaya', '087886373981', '13 juni 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(151, 151, 158, 1, 1, 'PG106', 'Dzikrona saputra', 'Kemiri rt 03 rw 02 kec. Sigaluh kab. Banjarnegara', '085729696394', '20/07/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(152, 152, 158, 1, 1, 'PG107', 'Avif Hernowo', 'Jalan Promasan, RT04/RW01, Desa Margosari, Kec. Limbangan', '082140245112', '15/11/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(153, 153, 158, 1, 1, 'PG108', 'Noviyah', 'Jln.Hamad kp bakung rt01 rw05 Cilodong depok patokan rumah sebelah musholla al-taqwa bakung', '087788956111', '03/11/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(154, 154, 158, 1, 1, 'PG109', 'JUNI EFRIYANTO', 'SIYONO RT/RW:003/002, BOJASARI, KERTEK', '085327487969', '12/06/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(155, 155, 158, 1, 1, 'PG110', 'MUHAMAD RIFAN', 'GANG PERINTIS KP.NAROGONG RT009 RW 003 DESA.KEMBANGKUNING KEC.KLAPANUNGGAL 16872', '089610305831', '04121994', '', NULL, 0, 0, 1, 0, 0, 0),
(156, 156, 158, 1, 1, 'PG111', 'Arif Prasetyo', 'Plarangan RT 04 RW 01 Karanganyar kebumen', '085227079579', '20', '', NULL, 0, 0, 1, 0, 0, 0),
(157, 157, 158, 1, 1, 'PG112', 'Rahayu Diah Tri Utami', 'Sidamukti RT 03 RW 09 kelurahan krandegan kecamatan banjarnegara kabupaten banjarnegara', '081225756169/085727650500', '05/05/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(158, 158, 158, 1, 1, 'PG113', 'Antonnius suratno', 'DS jeruk gulung Balongsono madiun', '089682219967', '10/11/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(159, 159, 158, 1, 1, 'PG114', 'ARIF SUBEKTI ', 'TEGALSARI KECAMATAN GARUNG KABUPATEN WONOSOBO', '085729200426', '14/01/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(160, 160, 158, 1, 1, 'PG115', 'Muhammad adha ardiansyafri', 'Simanis, rt6/10 , pecekelan, sapuran wonosobo', '087802570955', '1/2/2004', '', NULL, 0, 0, 1, 0, 0, 0),
(161, 161, 158, 1, 1, 'PG116', 'Sudariyah', 'Rumah susun Marunda blok A3/207 Cilincing jakarta utara', '081311314434', '25/04/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(162, 162, 158, 1, 1, 'PG117', 'Ulin nasikhah', 'Mendongan rt01/05 gondowulan kepil wonosoWo', '082324527622', '11/09/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(163, 163, 158, 1, 1, 'PG118', 'TOYIB RIFAI', 'Jlamprang rt 3 rw 4 wonosobo', '085228606988', '25/12/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(164, 164, 158, 1, 1, 'PG119', 'Rofi''athul Ummah', 'Teges Wetan, Rt 03 RW 02, Desa Wirogaten, Kec. Mirit. Kab. Kebumen', '085600024294', '11/07/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(165, 165, 158, 1, 1, 'PG120', 'Saiful ilmi', 'Cendana adiwarno selomerto wonosobo', '082236280562', '04', '', NULL, 0, 0, 1, 0, 0, 0),
(166, 166, 158, 1, 1, 'PG121', 'ulin nasikhah', 'mendongan rt 001/005 gondowulan kepil wonosobo', '082324527622', '11/09/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(167, 167, 158, 1, 1, 'PG122', 'Iman saeful bahri', 'Desa sariyoso rt 01 2 kec wonosobo kab wonosobo', '082112819529', '15/05/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(168, 168, 158, 1, 1, 'PG123', 'Rafika Magfiroh', 'Jl. Dieng km3 kalianget rt 03 rw 12 Wonosobo', '082136155005', '05/02/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(169, 169, 158, 1, 1, 'PG124', 'liza efrida arisanti', 'jl.kijang rt.04 rw02 kel.trayeman slawi tegal', '0895422997449', '05/07/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(170, 170, 158, 1, 1, 'PG125', 'Stephanie Tan', 'Jl. Gn. Catur IV Blok II No. 7', '081999370333', '30/11/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(171, 171, 158, 1, 1, 'PG126', 'Siti fitriyani', 'Jlan ketapang desa padaharja dukuh kedawung', '082235488785', '03/03/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(172, 172, 158, 1, 1, 'PG127', 'Yulia rachmawati ', 'Jln pinang Gg II nmr 68 rt04/05 lagoa Jakarta Utara', '081310739871', '26/07/1975', '', NULL, 0, 0, 1, 0, 0, 0),
(173, 173, 158, 1, 1, 'PG128', 'Mutiah', '"Jambu rt 01/05 kel\nWonokromo kec.mojotengah"\r\n', '082324500941', '21/12/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(174, 174, 158, 1, 1, 'PG129', 'Susi Harmoko', 'Taman Jatisari Permai Cluster Bali 1 Blok R 14 Jatisari Jatiasih Bekasi Selatan', '08128290168', '11/10/1972', '', NULL, 0, 0, 1, 0, 0, 0),
(175, 175, 158, 1, 1, 'AG130', 'Saeful Sabarajati', 'Jl Kedoya Raya Gang Sekolah Al Hamidiyah Rt 08 RW 02 No 49 Kedoya Selatan Kebon Jeruk Jakbar 11520', '081297961987', '06/01/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(176, 176, 158, 1, 1, 'AG131', 'Supriyanto', 'Perumahan GeKaBei Regency B.30 Belakang PT Embe Tekstil RT 020 RW 007 Desa Plumbon Kecamatan Plumbon Kabupaten Cirebon', '085643036161', '05/04/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(177, 177, 158, 1, 1, 'RG132', 'Rinaldi', 'Daan Mogot Arcadia Blok B4/ 22, Kelurahan Batuceper, kecamatan Batuceper, kota Tangerang 15122', '085603308688', '25/02/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(178, 178, 158, 1, 1, 'RG133', 'Riski Oktavia', 'Riski Oktavia', '082260559205', '22101994', '', NULL, 0, 0, 1, 0, 0, 0),
(179, 179, 158, 1, 1, 'RG134', 'Mea dewi', 'Jetis,sumbeewulan,selomerto', '085718620489', '29/05/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(180, 180, 158, 1, 1, 'TG135', 'Randhi Pratama', 'Pujowinatan PA I / 720 Pakualaman, Yogyakarta', '085293598095', '04/04/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(181, 181, 158, 1, 1, 'RG136', 'M Zaky Pratama Adjie', 'Gang Mushola Kp.Rawa Kalong RT.002 RW.021 No.2 , Desa SetiaMekar , Tambun Selatan , Kabupaten Bekasi 17510', '089509284102', '30/07/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(182, 182, 158, 1, 1, 'RG137', 'Hendra Kurniawan', 'Jl Batu Wadas B1 Perumahan Wadas Residence 1 RT 6 RW 3 Kel Batuampar Kec Kramatjati Jakarta Timur', '08119696605', '04/01/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(183, 183, 158, 1, 1, '', 'Titian ningrum', 'Desa sumbersari, sentaan 2, rt01/rw05, banyuurip, purworejo, 54171', '081229208776', '14 juli 1988', '', NULL, 0, 0, 1, 0, 0, 0),
(184, 184, 158, 1, 1, 'FTH001', 'MAHKOTA DIENG', 'SIYONO', '081319446123', '', '', NULL, 0, 0, 1, 0, 0, 0),
(185, 185, 158, 1, 1, 'FTH002', 'HARMONI', 'SIYONO', '082323561584', '', '', NULL, 0, 0, 1, 0, 0, 0),
(186, 186, 158, 1, 1, 'FTH003', 'MIE ONGKLOK BU SITI', 'MARONG', '085228654636', '', '', NULL, 0, 0, 1, 0, 0, 0),
(187, 187, 158, 1, 1, 'FTH004', 'MUGI BAROKAH', 'KERTEK', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(188, 188, 158, 1, 1, 'FTH005', 'M3 SUMBER REJEKI', 'KERTEK', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(189, 189, 158, 1, 1, 'FTH006', 'ANUGRAH 1', 'KRAKAL', '022863329525', '', '', NULL, 0, 0, 1, 0, 0, 0),
(190, 190, 158, 1, 1, 'FTH007', 'ANUGRAH 2', 'KRAKAL', '085227207575', '', '', NULL, 0, 0, 1, 0, 0, 0),
(191, 191, 158, 1, 1, 'FTH008', 'BU SITI', 'KRAKAL', '081317346333', '', '', NULL, 0, 0, 1, 0, 0, 0),
(192, 192, 158, 1, 1, 'FTH009', 'PODO MORO', 'KRAKAL', '087834451123', '', '', NULL, 0, 0, 1, 0, 0, 0),
(193, 193, 158, 1, 1, 'FTH010', 'podo moro 2', 'BUTUH', '081227448971', '', '', NULL, 0, 0, 1, 0, 0, 0),
(194, 194, 158, 1, 1, 'FTH011', 'DEWI VAZZA', 'KRAKAL', '088806680197', '', '', NULL, 0, 0, 1, 0, 0, 0),
(195, 195, 158, 1, 1, 'FTH012', 'TIGA PUTRI', 'KRAKAL', '08122598489', '', '', NULL, 0, 0, 1, 0, 0, 0),
(196, 196, 158, 1, 1, 'FTH013', 'BINTANG', 'KRAKAL', '085117215406', '', '', NULL, 0, 0, 1, 0, 0, 0),
(197, 197, 158, 1, 1, 'FTH014', 'AMALIA', 'Jl Raya kertek km 1 Jambusari karangluhur Kertek wonosobo', '085526292228', '', '', NULL, 0, 0, 1, 0, 0, 0),
(198, 198, 158, 1, 1, 'FTH015', 'RM SELERA', 'SIJAMBU', '085200522414', '', '', NULL, 0, 0, 1, 0, 0, 0),
(199, 199, 158, 1, 1, 'FTH016', 'BU TOMO', 'SIJAMBU', '081252667139', '', '', NULL, 0, 0, 1, 0, 0, 0),
(200, 200, 158, 1, 1, 'FTH017', 'PAK SUPARJO', 'SEJAMBU', '082227229155', '', '', NULL, 0, 0, 1, 0, 0, 0),
(201, 201, 158, 1, 1, 'FTH018', 'BU NUNUNG', 'KERTEL', '081327309995', '', '', NULL, 0, 0, 1, 0, 0, 0),
(202, 202, 158, 1, 1, 'FTH019', 'ESSRI', 'SEJAMBU', '081372308504', '', '', NULL, 0, 0, 1, 0, 0, 0),
(203, 203, 158, 1, 1, 'FTH020', 'SADINA', 'KERTEK', '085325120660', '', '', NULL, 0, 0, 1, 0, 0, 0),
(204, 204, 158, 1, 1, 'FTH021', 'DUA PUTRI', 'KERTEK', 'tutup', '', '', NULL, 0, 0, 1, 0, 0, 0),
(205, 205, 158, 1, 1, 'FTH022', 'AMANDA', 'SIJAMBU', '082220749487', '', '', NULL, 0, 0, 1, 0, 0, 0),
(206, 206, 158, 1, 1, 'FTH023', 'LUCKY', 'SIJAMBU', '085290000960', '', '', NULL, 0, 0, 1, 0, 0, 0),
(207, 207, 158, 1, 1, 'FTH024', 'ZANUAR BUAH', 'SIJAMBU', '085227721000', '', '', NULL, 0, 0, 1, 0, 0, 0),
(208, 208, 158, 1, 1, 'FTH025', 'sahabat', 'KERTEK', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(209, 209, 158, 1, 1, 'FTH026', 'RATU', 'SIYONO KENTENG', '085227717959', '', '', NULL, 0, 0, 1, 0, 0, 0),
(210, 210, 158, 1, 1, 'FTH027', 'SPBU SIYONO', 'POM SIYONO', '0841326077400', '', '', NULL, 0, 0, 1, 0, 0, 0),
(211, 211, 158, 1, 1, 'FTH028', 'RM SINDORO SUMBING', 'CAPAR', '082230585936', '', '', NULL, 0, 0, 1, 0, 0, 0),
(212, 212, 158, 1, 1, 'FTH029', 'BUDHE WIWIN', 'BINANGUN', '081328517266', '', '', NULL, 0, 0, 1, 0, 0, 0),
(213, 213, 158, 1, 1, 'FTH030', 'SEKAR RAOS', 'MENDOLO', '08121524405', '', '', NULL, 0, 0, 1, 0, 0, 0),
(214, 214, 158, 1, 1, 'FTH031', 'SRI REJEKI MBINANGUN', 'BINANGUN', '085248001083', '', '', NULL, 0, 0, 1, 0, 0, 0),
(215, 215, 158, 1, 1, 'FTH032', 'SM 2 KEDEWAN', 'KEDEWAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(216, 216, 158, 1, 1, 'FTH033', 'SM 3 KEDEWAN', 'KEDEWAN', '081390257497', '', '', NULL, 0, 0, 1, 0, 0, 0),
(217, 217, 158, 1, 1, 'FTH034', 'SRI REJEKI PAHLAWAN', 'PAHLAWAN', '082113556452', '', '', NULL, 0, 0, 1, 0, 0, 0),
(218, 218, 158, 1, 1, 'FTH035', 'JIKANA KURAHAN', 'SAYANGAN', '08232670066', '', '', NULL, 0, 0, 1, 0, 0, 0),
(219, 219, 158, 1, 1, 'FTH036', 'SM NGASINAN', 'NGASINAN', '082247450825', '', '', NULL, 0, 0, 1, 0, 0, 0),
(220, 220, 158, 1, 1, 'FTH037', 'SURYA M MENDOLO', 'MENDOLO', '081212759666', '', '', NULL, 0, 0, 1, 0, 0, 0),
(221, 221, 158, 1, 1, 'FTH038', 'SURYA M SUDAGARAN', 'SUDAGARAN', '081326513343', '', '', NULL, 0, 0, 1, 0, 0, 0),
(222, 222, 158, 1, 1, 'FTH039', 'TRIO', 'KOTA', '085601151622', '', '', NULL, 0, 0, 1, 0, 0, 0),
(223, 223, 158, 1, 1, 'FTH040', 'ANEKA BOGA', 'KOTA', '073016537846', '', '', NULL, 0, 0, 1, 0, 0, 0),
(224, 224, 158, 1, 1, 'FTH041', 'ANEKA', 'KOTA', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(225, 225, 158, 1, 1, 'FTH042', 'ANYAR BAKERY', 'Jl Angkatan 45 No 55 Wonosobo', '082323120303', '', '', NULL, 0, 0, 1, 0, 0, 0),
(226, 226, 158, 1, 1, 'FTH043', 'WIJAYA', 'KOTA', '082137333000', '', '', NULL, 0, 0, 1, 0, 0, 0),
(227, 227, 158, 1, 1, 'FTH044', 'SINAR INDAH', 'KOTA', '089505902503', '', '', NULL, 0, 0, 1, 0, 0, 0),
(228, 228, 158, 1, 1, 'FTH045', 'SAGON BU NING', 'KOTA', '0823229473374', '', '', NULL, 0, 0, 1, 0, 0, 0),
(229, 229, 158, 1, 1, 'FTH046', 'BISMO 2', 'KOTA', '08122930071', '', '', NULL, 0, 0, 1, 0, 0, 0),
(230, 230, 158, 1, 1, 'FTH047', 'LUKITO KAUMAN', 'KAUMAN', '0286321421', '', '', NULL, 0, 0, 1, 0, 0, 0),
(231, 231, 158, 1, 1, 'FTH048', 'CITRA DIENG SABUK ALU', 'NJURITAN', '085291298988', '', '', NULL, 0, 0, 1, 0, 0, 0),
(232, 232, 158, 1, 1, 'FTH049', 'PUTRA SM SIDOJOYO 5', 'SIDOJOYO', '081226410753', '', '', NULL, 0, 0, 1, 0, 0, 0),
(233, 233, 158, 1, 1, 'FTH050', 'MARING REJEKI', 'MOROMBI', '08122678236', '', '', NULL, 0, 0, 1, 0, 0, 0),
(234, 234, 158, 1, 1, 'FTH051', 'YUNDA MANDALA', 'MENDOLO', '081391272199', '', '', NULL, 0, 0, 1, 0, 0, 0),
(235, 235, 158, 1, 1, 'FTH052', 'TOKO IRKHAM', 'MENDOLO', '085640602404', '', '', NULL, 0, 0, 1, 0, 0, 0),
(236, 236, 158, 1, 1, 'FTH053', 'TERM BU YATI', 'TERMINAL', '085728625869', '', '', NULL, 0, 0, 1, 0, 0, 0),
(237, 237, 158, 1, 1, 'FTH054', 'TERM ITA BU TORO', 'TERMINAL MENDOLO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(238, 238, 158, 1, 1, 'FTH055', 'TERM MAK ITI BU AWAN', 'TERMINAL MENDOLO', '81391340345', '', '', NULL, 0, 0, 1, 0, 0, 0),
(239, 239, 158, 1, 1, 'FTH056', 'TERM BU RU', 'TERMINAL MENDOLO', '85325951876', '', '', NULL, 0, 0, 1, 0, 0, 0),
(240, 240, 158, 1, 1, 'FTH057', 'TERM IBRA TOUR', 'TERMINAL MENDOLO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(241, 241, 158, 1, 1, 'FTH058', 'TERM M2 CELL BU MENUK', 'TERMINAL MENDOLO', '085325033160', '', '', NULL, 0, 0, 1, 0, 0, 0),
(242, 242, 158, 1, 1, 'FTH059', 'TERM MULYA INDAH', 'TERMINAL MENDOLO', '081327422940', '', '', NULL, 0, 0, 1, 0, 0, 0),
(243, 243, 158, 1, 1, 'FTH060', 'TERM CAHAYA BARU', 'TERMINAL MENDOLO', '081328415558', '', '', NULL, 0, 0, 1, 0, 0, 0),
(244, 244, 158, 1, 1, 'FTH061', 'TERM MBAK WIDI', 'TERMINAL MENDOLO', '082325631111', '', '', NULL, 0, 0, 1, 0, 0, 0),
(245, 245, 158, 1, 1, 'FTH062', 'TERM BU BIN', 'TERMINAL MENDOLO', '081328476044', '', '', NULL, 0, 0, 1, 0, 0, 0),
(246, 246, 158, 1, 1, 'FTH063', 'TERM BU ROIMAH', 'TERMINAL MENDOLO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(247, 247, 158, 1, 1, 'FTH064', 'TERM BU HAR', 'TERMINAL MENDOLO', '082323561144', '', '', NULL, 0, 0, 1, 0, 0, 0),
(248, 248, 158, 1, 1, 'FTH065', 'TERM BU WATI', 'Jl. Raya Kertek No.45, Bumireso, Kec. Wonosobo, 56351', '082325303111', '', '', NULL, 0, 0, 1, 0, 0, 0),
(249, 249, 158, 1, 1, 'FTH066', 'TERM BU DIDIK', 'l.A.Yani No.112 Wonosobo Barat Wonosobo, Wonosobo', '085729219533', '', '', NULL, 0, 0, 1, 0, 0, 0),
(250, 250, 158, 1, 1, 'FTH067', 'TERM DAMRI BU YUNI', 'TERMINAL MENDOLO', '082136476000', '', '', NULL, 0, 0, 1, 0, 0, 0),
(251, 251, 158, 1, 1, 'FTH068', 'TERM BU TURAH', 'TERMINAL MENDOLO', '081227238320', '', '', NULL, 0, 0, 1, 0, 0, 0),
(252, 252, 158, 1, 1, 'FTH069', 'DIENG PLATEAU', 'WONOBUNGKAH', '085328434567', '', '', NULL, 0, 0, 1, 0, 0, 0),
(253, 253, 158, 1, 1, 'FTH070', 'term bu iin', 'TERMINAL MENDOLO', '081226821914', '', '', NULL, 0, 0, 1, 0, 0, 0),
(254, 254, 158, 1, 1, 'FTH071', 'PRAPATAN SUMBERAN', 'SUMBERAN KOTA', '081215067540', '', '', NULL, 0, 0, 1, 0, 0, 0),
(255, 255, 158, 1, 1, 'FTH072', 'POM KLERANG', 'POM KLERANG', '082136095775', '', '', NULL, 0, 0, 1, 0, 0, 0),
(256, 256, 158, 1, 1, 'FTH073', 'SIDOJOYO', 'SIDOJOYO', '085227701999', '', '', NULL, 0, 0, 1, 0, 0, 0),
(257, 257, 158, 1, 1, 'FTH074', 'MIE ONGKLOK MUHADI', 'SETOPAN', '081225188827', '', '', NULL, 0, 0, 1, 0, 0, 0),
(258, 258, 158, 1, 1, 'FTH075', 'AMPEL BOGA', 'NGAMPEL TAWANGSARI', '081353491611', '', '', NULL, 0, 0, 1, 0, 0, 0),
(259, 259, 158, 1, 1, 'FTH076', 'MUSTIKA', 'NGAMPEL TAWANGSARI', '081327375929', '', '', NULL, 0, 0, 1, 0, 0, 0),
(260, 260, 158, 1, 1, 'FTH077', 'PUTRA SM BINTAR JAYA', 'SELOMERTO', '081804136811', '', '', NULL, 0, 0, 1, 0, 0, 0),
(261, 261, 158, 1, 1, 'FTH078', 'BAKSO GONDANG', 'KLEDONG', '081261768094', '', '', NULL, 0, 0, 1, 0, 0, 0),
(262, 262, 158, 1, 1, 'FTH079', 'ARKAN GONDANG', 'KLEDONG', '085747875539', '', '', NULL, 0, 0, 1, 0, 0, 0),
(263, 263, 158, 1, 1, 'FTH080', 'GAYATRI', 'KLEDONG', '085729339194', '', '', NULL, 0, 0, 1, 0, 0, 0),
(264, 264, 158, 1, 1, 'FTH081', 'GRAHA MAS GERGONDOK', 'KLEDONG', '082323394766', '', '', NULL, 0, 0, 1, 0, 0, 0),
(265, 265, 158, 1, 1, 'FTH082', 'KURNIA EMBUNG', 'KLEDONG', '085814943893', '', '', NULL, 0, 0, 1, 0, 0, 0),
(266, 266, 158, 1, 1, 'FTH083', 'SABAR MAKMUR 1', 'KLEDONG', '085293699328', '', '', NULL, 0, 0, 1, 0, 0, 0),
(267, 267, 158, 1, 1, 'FTH084', 'KOPI JEGROS', 'KLEDONG', '08122649510', '', '', NULL, 0, 0, 1, 0, 0, 0),
(268, 268, 158, 1, 1, 'FTH085', 'ANGGUN', 'KLEDONG', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(269, 269, 158, 1, 1, 'FTH086', 'TOKO BUNGA KLEDUNG', 'KLEDONG', '08143012638', '', '', NULL, 0, 0, 1, 0, 0, 0),
(270, 270, 158, 1, 1, 'FTH087', 'sm tlahab', 'KLEDONG', '082235181180', '', '', NULL, 0, 0, 1, 0, 0, 0),
(271, 271, 158, 1, 1, 'FTH088', 'DANA REAL', 'KLEDONG', '085602044791', '', '', NULL, 0, 0, 1, 0, 0, 0),
(272, 272, 158, 1, 1, 'FTH089', 'bu narti kalianget', 'KALIANGET', '085227406414', '', '', NULL, 0, 0, 1, 0, 0, 0),
(273, 273, 158, 1, 1, 'FTH090', 'bu siti rohani kalianget', 'KALIANGET', '08970624405', '', '', NULL, 0, 0, 1, 0, 0, 0),
(274, 274, 158, 1, 1, 'FTH091', 'bu turiah', 'KALIANGET', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(275, 275, 158, 1, 1, 'FTH092', 'bu tarminah kalianget', 'KALIANGET', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(276, 276, 158, 1, 1, 'FTH093', 'bu wahidun kalianget', 'KALIANGET', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(277, 277, 158, 1, 1, 'FTH094', 'sabar makmur 6 kenteng', 'KERTEK', '085540324150', '', '', NULL, 0, 0, 1, 0, 0, 0),
(278, 278, 158, 1, 1, 'FTH095', 'harmoni 2', 'KERTEK', '085200815555', '', '', NULL, 0, 0, 1, 0, 0, 0),
(279, 279, 158, 1, 1, 'FTH096', 'GARDU PANDANG', 'DIENG', '082257035833', '', '', NULL, 0, 0, 1, 0, 0, 0),
(280, 280, 158, 1, 1, 'FTH097', 'mutiara berkah', 'KLEDUNG', '088232108432', '', '', NULL, 0, 0, 1, 0, 0, 0),
(281, 281, 158, 1, 1, 'FTH098', 'OSENG DJAWA', 'KLEDUNG', '081325372310', '', '', NULL, 0, 0, 1, 0, 0, 0),
(282, 282, 158, 1, 1, 'FTH099', 'SURYA MART RECO', 'KLEDUNG', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(283, 283, 158, 1, 1, 'FTH100', 'TOKO BUDI', 'TEMPAL SARI ', '081225563360', '', '', NULL, 0, 0, 1, 0, 0, 0),
(284, 284, 158, 1, 1, 'FTH101', 'CAHAYA MART ', 'BARAT KECAMATAN KALIKAJAR', '0853272225142', '', '', NULL, 0, 0, 1, 0, 0, 0),
(285, 285, 158, 1, 1, 'FTH102', 'LILI MART', 'BARAT KECAMATAN KALIKAJAR', '085702470816', '', '', NULL, 0, 0, 1, 0, 0, 0),
(286, 286, 158, 1, 1, 'FTH103', 'USAHA BARU', 'DEPAN POLSEK KALIKAJAR', '081327020709', '', '', NULL, 0, 0, 1, 0, 0, 0),
(287, 287, 158, 1, 1, 'FTH104', 'MALL KALI KAJAR', 'BARAT POM KALIKAJAR', '081227643753', '', '', NULL, 0, 0, 1, 0, 0, 0),
(288, 288, 158, 1, 1, 'FTH105', 'BANGKIT MART', 'DEKAT ALUN ALUN SAPURAN', '085712410481', '', '', NULL, 0, 0, 1, 0, 0, 0),
(289, 289, 158, 1, 1, 'FTH106', 'ROSALIA', 'TERMINAL SAWANGAN WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(290, 290, 158, 1, 1, 'FTH107', 'TOKO BERKAH', 'SAWANGAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(291, 291, 158, 1, 1, 'FTH108', 'dieng indah sawangan', 'TERMINAL SAWANGAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(292, 292, 158, 1, 1, 'FTH109', 'bu peni sawangan', 'TERMINAL SAWANGAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(293, 293, 158, 1, 1, 'FTH110', 'NUSANTARA', 'SAWANGAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(294, 294, 158, 1, 1, 'FTH111', 'simanis kali kajar', 'SAPURAN', '082264419835', '', '', NULL, 0, 0, 1, 0, 0, 0),
(295, 295, 158, 1, 1, 'FTH112', 'prapatan kali jajar', 'SAMPING POLSEK KALIKAJAR', '081328189576', '', '', NULL, 0, 0, 1, 0, 0, 0),
(296, 296, 158, 1, 1, 'FTH113', 'bu bandrio', 'TEMPELSARI', '082138650049', '', '', NULL, 0, 0, 1, 0, 0, 0),
(297, 297, 158, 1, 1, 'FTH114', 'toko keluarga', 'DEPAN PASAR KERTEK', '082322012993', '', '', NULL, 0, 0, 1, 0, 0, 0),
(298, 298, 158, 1, 1, 'FT H115', 'BU UMI KALIANGET', 'KALIANGET', '085607358966', '', '', NULL, 0, 0, 1, 0, 0, 0),
(299, 299, 158, 1, 1, 'FTH116', 'SINCHAN SITATRI', 'SILATRI', '081336719962', '', '', NULL, 0, 0, 1, 0, 0, 0),
(300, 300, 158, 1, 1, 'FTH117', 'POM KLEDUNG', 'SPBU KLEDUNG', '085799162790', '', '', NULL, 0, 0, 1, 0, 0, 0),
(301, 301, 158, 1, 1, 'FTH118', 'TEH TAMBI TANJUNGSARI', 'KOPERASI TEH TAMBI DEPAN TAMAN WISATA TANJUNG SARI', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(302, 302, 158, 1, 1, 'FTH119', 'BERKAH SILENTO', 'SEBELUM PERTIGAAN SILENTO KIRI JALAN', '081326635350', '', '', NULL, 0, 0, 1, 0, 0, 0),
(303, 303, 158, 1, 1, 'FTH120', 'SILATRI INDAH', 'REST AREA SILATRI', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(304, 304, 158, 1, 1, 'FTH121', 'BINTANG MANDIRI', 'DEPAN SPBU KALIKAJAR', '08157670083', '', '', NULL, 0, 0, 1, 0, 0, 0),
(305, 305, 158, 1, 1, 'FTH122', 'DENDENG TIVI', 'SELATAN BANK BCA WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(306, 306, 158, 1, 1, 'FTH123', 'TANI JIWO', 'DIENG KULON, PERTIGAAN MENUJU HOTEL GATUTKACA', '081215954487', '', '', NULL, 0, 0, 1, 0, 0, 0),
(307, 307, 158, 1, 1, 'FTH124', 'RUMAH MAKAN ALDAN', 'SIDOJOYO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(308, 308, 158, 1, 1, 'FTH125', 'CAFETARIA ADINA', 'LONGKRANG', '085226508355', '', '', NULL, 0, 0, 1, 0, 0, 0),
(309, 309, 158, 1, 1, 'FTH126', 'MIE ONGKLOK BU WATI', 'BUGANGAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(310, 310, 158, 1, 1, 'FTH127', 'CARAMEL', 'DEPAN KANTOR IMIGRASI KAB. WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(311, 311, 158, 1, 1, 'FTH128', '', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(312, 312, 158, 1, 1, 'FTH129', 'MALL KLEDUNG', 'TUTUP', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(313, 313, 158, 1, 1, 'FTH130', 'CAFE SURYATJI', 'SEBELUM SPBU KLEDUNG KANAN JALAN', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(314, 314, 158, 1, 1, 'FTH131', 'MONALISA', 'TOKO KELONTONG DEPAN RUMAH MAKAN DIENG PASS KLEDUNG', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(315, 315, 158, 1, 1, 'FTH132', 'PENDOWO LIMO', 'MENDOLO DEPAN RSI', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(316, 316, 158, 1, 1, 'FTH133', 'MBAK LIA', 'TERMINAL WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(317, 317, 158, 1, 1, 'FTH134', 'KANAYA', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(318, 318, 158, 1, 1, 'FTH135', 'MIRASI', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(319, 319, 158, 1, 1, 'FTH136', 'TOKO RENDI', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(320, 320, 158, 1, 1, 'FTH137', 'RAUD', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(321, 321, 158, 1, 1, 'FTH138', 'ARIGAR', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(322, 322, 158, 1, 1, 'FTH139', 'ASHRAF', 'WONOSOBO KOTA', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(323, 323, 158, 1, 1, 'FTH140', 'MBAK US', 'MADUKARA', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(324, 324, 158, 1, 1, 'FTH141', 'KIOS 65', '', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(325, 325, 158, 1, 1, 'FTH142', 'MAHESA', 'TERMINAL WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(326, 326, 158, 1, 1, 'FTH143', 'MBAK ARUM', 'TERMINAL WONOSOBO', '', '', '', NULL, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member_copy`
--

CREATE TABLE IF NOT EXISTS `member_copy` (
`id` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `id_toko` bigint(20) NOT NULL,
  `id_sales` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `kode` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `nama` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `telp` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tgl_lahir` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `diskon` varchar(30) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `deposit` double DEFAULT NULL,
  `pkp` int(11) NOT NULL,
  `persen_pajak` double NOT NULL,
  `id_kota` int(11) NOT NULL DEFAULT '1',
  `id_pil_harga` int(11) NOT NULL,
  `uid_akun` int(11) NOT NULL,
  `id_gudang` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=184 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `member_copy`
--

INSERT INTO `member_copy` (`id`, `id_member`, `id_toko`, `id_sales`, `id_users`, `kode`, `nama`, `alamat`, `telp`, `tgl_lahir`, `diskon`, `deposit`, `pkp`, `persen_pajak`, `id_kota`, `id_pil_harga`, `uid_akun`, `id_gudang`) VALUES
(1, 1, 158, 1, 1, 'RG001', 'Adi Wibowo', 'Grobogan', '08562732933', '12/9/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(2, 2, 158, 1, 1, 'RG002', 'M ZAKY PRATAMA ADJIE', 'KP.RAWA KALONG RT.002/021 NO.2 , SETIAMEKAR , TAMBUN SELATAN , KABUPATEN BEKASI 17510', '089509284102', '7/30/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(3, 3, 158, 1, 1, 'RG003', 'Hajar Mayang L.P', 'Cluster Grenada Perum Graha Cikarang Blok F7 No 4 Rt 2 Rw 19, Kel. Simpangan Kec. Cikarang Utara Kab. Bekasi', '0812-9941-6612', '8/20/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(4, 4, 158, 1, 1, 'RG004', 'moh.fawwaz', 'cilemahabang raya u.5 no.97 cikarang baru', '081381955482', '2/15/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(5, 5, 158, 1, 1, 'RG005', 'Aisyah Dewi', 'Diamond Golden Cinere', '087887494263', '5/27/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(6, 6, 158, 1, 1, 'RG006', 'Adam Nurohman', 'Perumahan Warnasari Indah FWA.98 No.01 RT.02 RW.06 Kel. Warnasari Kec. Citangkil Kota Cilegon, Banten', '085711867591', '3/5/1994', '', NULL, 0, 0, 1, 0, 0, 0),
(7, 7, 158, 1, 1, 'RG007', 'Heri Wahyu P', 'Permata depok sektor mutiara B4 no 12 kel pondok Jaya kec cipayung', '081807990450', '', '', NULL, 0, 0, 1, 0, 0, 0),
(8, 8, 158, 1, 1, 'RG008', 'RIMA SISKASARI', 'Jl. RAYA BLORA - CEPU, WONOREJO LORONG 4 RT. 09 RW. 13 CEPU KAB. BLORA', '082221066785', '10/30/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(9, 9, 158, 1, 1, 'RG009', 'Tokhidin', 'Jln.Masjid Karangjati Margasari Kab.Tegal', '085229413398', '9/19/1976', '', NULL, 0, 0, 1, 0, 0, 0),
(10, 10, 158, 1, 1, 'RG010', 'Feni Indriastuti', 'JL.Pucang gading Raya RT 03 RW 09 Batursari - Mranggen. DEMAK', '085742218505', '7/20/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(11, 11, 158, 1, 1, 'RG011', 'Feni Indriastuti', 'JL.Pucang gading raya RT 03 RW 09 Kel.Batursari Kec.Mranggen Kab.Demak', '085742218505', '7/20/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(12, 12, 158, 1, 1, 'RG012', 'Hariyanto', 'Jl tropodo 1barat rt21 rw02. Waru-sidoarjo', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(13, 13, 158, 1, 1, 'RG013', 'Tri har', '"Blunyah Rejo tr2/930', '082220341583', '', '', NULL, 0, 0, 1, 0, 0, 0),
(14, 14, 158, 1, 1, 'RG014', 'Mahmud soleko', '"', '085226465573', '6/24/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(15, 15, 158, 1, 1, 'RG015', 'Muchamad mufrod', 'dayu lor rt 17 banyurip ssambungmacan sragen jawa tengah', '081316565004', '9/8/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(16, 16, 158, 1, 1, 'RG016', 'Kurota Aini', 'Perum villa mutiara blok m81 no 17 rt 06 rw 11,wanajaya, Cibitung,bekasi.jawa barat', '082245611756', '12/30/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(17, 17, 158, 1, 1, 'RG017', 'Desy Ristiana Putri', 'Jln P Diponegoro Gang 3 No 55a Rt 002/003 desa/kel Karangwaru kec Tulungagung kab Tulungagung', '081329557556', '8/12/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(18, 18, 158, 1, 1, 'RG018', 'Lazuardhi Dwi Irawan', 'Ds. Ngemplak Lor RT 01 RW 01 kec Margoyoso kab Pati', '085643524333', '4/23/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(19, 19, 158, 1, 1, 'RG019', 'muhammad nizam ali', 'Jl. Pahlawan No.1 RT/RW 02/05 Karangsari Giyanti (Toko ATK Arjuna)', '087755949819', '5/12/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(20, 20, 158, 1, 1, 'RG020', 'Herlina Reski', 'Tersobo rt 3 rw 2 prembun kebumen', '085273989790', '11/2/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(21, 21, 158, 1, 1, 'RG021', 'Dliaul Khnifah', 'Jl.g.kidul rt 13 no 31 talang banjar jambi timur 36142', '081362795131', '12/4/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(22, 22, 158, 1, 1, 'RG022', 'Vivit Fitriyani', 'Kalibeber Rt 5 Rw 13, Mekarsari', '083128962161', '4/29/1974', '', NULL, 0, 0, 1, 0, 0, 0),
(23, 23, 158, 1, 1, 'RG023', '', 'Jl. Lawu No. 9 Oro oro Dowo Klojen Malang', '085888982990', '', '', NULL, 0, 0, 1, 0, 0, 0),
(24, 24, 158, 1, 1, 'RG024', 'Naryo', 'Jl. Teri Cilacap', '', '', '', NULL, 0, 0, 1, 0, 0, 0),
(25, 25, 158, 1, 1, 'RG025', 'Rofika safitria', 'Perum Serpong Terrace E8/19. Jl Raya Viktor BSD, Tangerabg Selatan', '085711032967', '6/15/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(26, 26, 158, 1, 1, 'RG026', 'Anita Fibrianti Rahayuningtyas', 'Villa mutiara cikarang 2 nlok c7 no 5 cikarang selatan 17550', '081326930279', '2/28/1979', '', NULL, 0, 0, 1, 0, 0, 0),
(27, 27, 158, 1, 1, 'RG027', 'SARWANTO', 'Puri candi bugang blok f.6 kalierang wonosobo', '082312330005', '5/25/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(28, 28, 158, 1, 1, 'RG028', 'Aryo', 'PERUMAHAN BUMI CIKARANG MAKMUR (BCM) BLOK D12 NO 2', '081511265002', '', '', NULL, 0, 0, 1, 0, 0, 0),
(29, 29, 158, 1, 1, 'RG029', 'Savitri', 'Serpong terrace E8/19 -jl Raya Viktor BSD', '081224344075', '2/2/1975', '', NULL, 0, 0, 1, 0, 0, 0),
(30, 30, 158, 1, 1, 'RG030', 'Indah Vidiastri', 'Milano 8 no. 32 gading serpong tangerang', '08125511048', '8/11/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(31, 31, 158, 1, 1, 'RG031', 'Eko Santoso Pribadi', 'Jl. Anang Hasyim perum PWI blok D. Samarinda', '081215279899', '4/8/1979', '', NULL, 0, 0, 1, 0, 0, 0),
(32, 32, 158, 1, 1, 'RG032', 'Gany Adhiatma ', 'Perumahan Jaten Permai Indah ,JL PUSPONYIDRO NO 15,RT 02/RW 19,KALURAHAN JATEN,KECAMATAN JATEN,KABUPATEN KARANGANYAR', '082237233449', '9/12/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(33, 33, 158, 1, 1, 'RG033', 'Dimas Aditya seftiandi', 'Kuripan RT 5 RW 2 Watumalang Wonosobo', '089502167255', '9/5/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(34, 34, 158, 1, 1, 'RG034', 'Nurdiyah Ratnani', 'Jl Nusantara GN2 Kaliwates jember', '081903622349', '2/11/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(35, 35, 158, 1, 1, 'RG035', 'Sabrina Subhastian', 'Talaga Bestari cluster Harmony Blok HU no.2 Balaraja timur kab. Tangerang', '082323560065', '7/23/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(36, 36, 158, 1, 1, 'RG036', 'Maskhun Setyawan', 'Perumahan Argo Residence Blok C14A Tlogojati, Wonosobo', '085729307000', '1/17/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(37, 37, 158, 1, 1, 'RG037', 'Maryam', 'Kwaluhan RT.01/01, Madusari, Secang, Magelang', '082227111200', '4/11/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(38, 38, 158, 1, 1, 'RG038', 'Siti Isdahlia', 'Pagedangan Tumenggungan Selomerto Wonosobo', '+6285788203266', '8/6/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(39, 39, 158, 1, 1, 'RG039', 'Kurniadi ', 'Jl. Guru-guru 1 LK. 1 RT.3 No. 154 Kel. Sukadana Kec. Kota Kayuagung Kab. OKI 30611', '085273135237', '10/19/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(40, 40, 158, 1, 1, 'RG040', 'Rina maryani', 'Gisting permai blok 21,kec.gisting,kab.Tanggamus lampung, kode pos 35378', '083820386251', '1/24/2001', '', NULL, 0, 0, 1, 0, 0, 0),
(41, 41, 158, 1, 1, 'RG041', 'Fatina nurbaiti', 'Kp karanganyar ', '085780252997', '1/17/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(42, 42, 158, 1, 1, 'RG042', 'HAIVA PUTRI SETIAWATI', 'DS. Mlandi Rt 02/02 Garung Wonosobo', '+6591028372', '12/15/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(43, 43, 158, 1, 1, 'RG043', 'Muhammad Taufik Zas', 'Desa pabedilan wetan RT12 RW03 blok kajepit kecamatan pabedilan kabupaten Cirebon', '08126416415', '4/4/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(44, 44, 158, 1, 1, 'RG044', 'Solehudin', 'Desa Lhok Gajah, Kecamatan Kuala Batee, Kabupaten Aceh Barat Daya, Provinsi Aceh', '08878807167', '10/19/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(45, 45, 158, 1, 1, 'RG045', 'Muhammad Mustofa (Ragiel Saput', 'Jl.kayu mas tengah 3 RT.009/04 no.45 Pulo gadung , Jakarta timur 13260', '085729278055', '9/20/1974', '', NULL, 0, 0, 1, 0, 0, 0),
(46, 46, 158, 1, 1, 'RG046', 'Siti Sarah', 'Perumahan Asli Permai Blok BB No 28 RT 09 RW 05 Kramatan WONOSOBO Jateng', '081911463225', '7/9/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(47, 47, 158, 1, 1, 'RG047', 'Ida Rohmah', 'Jl Bulak Timur, Cipayung, Depok', '087832905785', '12/16/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(48, 48, 158, 1, 1, 'RG048', 'Solikhin', 'Desa Mengori RT 02 RW 03 Pemalang', '08121552139', '11/8/1973', '', NULL, 0, 0, 1, 0, 0, 0),
(49, 49, 158, 1, 1, 'RG049', 'Arif Fitriyanto', 'Tempel RT 34 RW 08 Kel Purbayan Kec Kotagede Yogyakarta', '087734142728', '5/8/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(50, 50, 158, 1, 1, 'RG050', 'Arif Adhi Saputro', 'Krakalsantren rt2/rw2 kertek ', '081914598086', '5/14/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(51, 51, 158, 1, 1, 'RG051', 'Erni widyaningsih', 'Ds. Dilem, Tawang, Susukan, Kab. Semarang', '082226223690', '4/10/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(52, 52, 158, 1, 1, 'RG052', 'dicky iriawan ', 'Kepatihan rt 006 rw 005 kec. Leksono kab. Wonosobo', '081915554585', '11/8/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(53, 53, 158, 1, 1, 'RG053', 'Adi W', 'jl yudistira no 3 salatiga ', '08562732933', '12/11/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(54, 54, 158, 1, 1, 'RG054', 'Adi W', 'Rejosari Grobogan', '08562732933', '12/11/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(55, 55, 158, 1, 1, 'RG055', 'Kharina Kurniawati', 'Rejosari Grobogan', '081226807161', '1/12/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(56, 56, 158, 1, 1, 'RG056', 'Larasati', 'Tegalmulyo RT 02 RW 05, Kepek, Wonosari, Gununvkidul, D.I. Yogyakarta', '089673611128', '6/17/1980', '', NULL, 0, 0, 1, 0, 0, 0),
(57, 57, 158, 1, 1, 'COBA1', 'Coba doang', 'Mlati Tegal Rt 005 Rw 020 No 01,  Kel.Sendangadi Kec. Mlati Kab. SLEMAN 55285', '+628995944995', '12/21/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(58, 58, 158, 1, 1, 'WOZO1', 'Ilham Ardha', 'wafdsfas', '085729145241', '8/9/1991', '', NULL, 0, 0, 1, 0, 0, 0),
(59, 59, 158, 1, 1, 'PG001', 'Fajar Khoirudin', 'Wonosobozone', '081291111243', '3/25/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(60, 60, 158, 1, 1, 'PG002', 'Uswatun aulia hasanah', 'RT01/RW02 desa pagerejo, kec kertek, kab wonosobo', '085786228161', '10/16/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(61, 61, 158, 1, 1, 'PG003', 'Daniel haryoyuwono wirawan', 'Cikarang, bekasi', '082221232380', '12/23/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(62, 62, 158, 1, 1, 'PG004', 'Windy ', 'Perak bpm no. 18 , Klaten', '083128810891', '4/27/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(63, 63, 158, 1, 1, 'PG005', 'Mely Krisita', 'DS. Brayut RT. 04 RW. 29, Pandowoharjo, Sleman, DIY', '+6281903973727', '5/21/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(64, 64, 158, 1, 1, 'PG006', 'Nur azizah', 'Jl. Samoja dlm no 29/121 RT. 005 RW.007, kel. Samoja. Kec. Batununggal', '08562595951', '8/19/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(65, 65, 158, 1, 1, 'PG007', 'PUGUH HAFID LURRIZKA', 'Kenjer kertek wonosobo', '081225473050', '6/29/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(66, 66, 158, 1, 1, 'PG008', 'Fitris Hendrawan', 'Kalikluwih RT 001/006 Kelurahan Leksono Kec.Leksono Kab. Wonosobo 56362', '085743978786', '2/19/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(67, 67, 158, 1, 1, 'PG009', 'AHMAD HIDAYAT PRATAMA', 'Sumberejo RT.7 RW.3 Wadaslintang', '085712237370', '4/24/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(68, 68, 158, 1, 1, 'PG010', 'HANIF DWI PRAYOGO', 'Dusun kritik Desa Pakunn kec.selomerto kab.wonosobo', '082226789196', '8/10/1994', '', NULL, 0, 0, 1, 0, 0, 0),
(69, 69, 158, 1, 1, 'PG011', 'Anjang Diah Saputri', 'Jl.HM sujan no 898 RT 02 Rw 01 Desa Mernek. Kec. Maos Kab. Cilacap', '085858455299', '7/6/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(70, 70, 158, 1, 1, 'PG012', 'Rudi Hartanto', 'Ds.siwatu, Des. Bumiroso, kec. Watumalang, Kab. Wonosobo', '085729442733', '2/26/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(71, 71, 158, 1, 1, 'PG013', 'Komarudin', 'Kalicecep, RT 18 RW 1, Bejiarum, Kertek, Wonosobo', '0895423776789', '4/25/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(72, 72, 158, 1, 1, 'PG014', 'Alfian fathul hakim', 'Jl. Ahmad dahlan gang haji dulloh RT01/02 kec. Cipondoh kel.petir tangerang', '081215891020', '4/9/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(73, 73, 158, 1, 1, 'PG015', 'siti rukoyah', 'Sidojoyo Rt 03 Rw 10 Pagerkukuh Wonosobo', '085876827841', '6/15/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(74, 74, 158, 1, 1, 'PG016', 'HANIEK RAHMAWATI', 'prumbanan rt 05 rw 04 desa purwojati kecamatan kertek kabupaten wonosobo ', '085235337743', '5/29/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(75, 75, 158, 1, 1, 'PG017', 'Ardhan Nugrahakjl', 'Jambusari kertek wonosobo', '082249222264', '3/20/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(76, 76, 158, 1, 1, 'PG018', 'Arinda Detya Susalit', 'Jl Delima No. 16 rt 002 rw 03 kelurahan ceger kecamatam cipayung jakarta timur', '085743000149', '12/4/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(77, 77, 158, 1, 1, 'PG019', 'Khozin', 'Perum Harmoni Residence blok RBB no. 01 Jl. Noor Aidi, RT 06, kec. Tanta,  kab. Tabalong, Kalimantan Selatan', '082220637482', '4/29/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(78, 78, 158, 1, 1, 'PG020', 'warsiyah', 'Desa Pinayungan Jl Sukadana 1 Gang RCTI depan SMP N 1 Telukjambe Timur RT 03/RW 01 Kontrakan Hj. Acep Sutisna No 9 Kec Telukjambe Timur Kab. Karawang Prov. Jawa Barat 41311', '083872484440', '5/25/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(79, 79, 158, 1, 1, 'PG021', 'Sarengat Oka', 'Jln komplek carina sayang no 90.felamboyan rt08 rw012.rawa buaya.cengkareng.jakarta barat .kode pos 11740', '085292628888', '7/27/1970', '', NULL, 0, 0, 1, 0, 0, 0),
(80, 80, 158, 1, 1, 'PG022', 'Widoyo', '"OKA COTTON CANDY', '085726874166', '8/8/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(81, 81, 158, 1, 1, 'PG023', 'Lailatul hijriyah', 'Kabutuh, RT.13/RW.5, Kabutuh, Ngadikusuman, Kec. Kertek, Kabupaten Wonosobo, Jawa Tengah 56371"', '085814767675', '9/23/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(82, 82, 158, 1, 1, 'PG024', 'Ruwiyati', 'Rejosari tambi kejaja', '087888716764', '5/7/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(83, 83, 158, 1, 1, 'PG025', 'Akhmat Subiyakto', '"Perumahan Green Garden Blok b2/26 Rt 01/ RW 33 kel Nagasari . Kec karawang barat. Kab karawang ', '0856-4193-2866', '5/29/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(84, 84, 158, 1, 1, 'PG026', 'Reza', 'Jawa Barat"', '081338584498', '10/1/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(85, 85, 158, 1, 1, 'PG027', 'Anggita Indah Adianingsih', '"Jl.pegangsaan 2', '08989352771', '8/25/2000', '', NULL, 0, 0, 1, 0, 0, 0),
(86, 86, 158, 1, 1, 'PG028', 'Siti Maryam', 'Kp.Rawa Indah rt/rw 05/03 no 16', '085200814000', '4/26/2020', '', NULL, 0, 0, 1, 0, 0, 0),
(87, 87, 158, 1, 1, 'PG029', 'Muhamad Azhar Alfikri ', 'Kel.Pegangsaan 2 ', '?+62 882?1578?5049?', '5/10/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(88, 88, 158, 1, 1, 'PG030', 'Suyanti', 'Kec.Kelapa Gading (jakut)"', '081339933100', '1/8/1990', '', NULL, 0, 0, 1, 0, 0, 0),
(89, 89, 158, 1, 1, 'PG031', 'Nasir', 'Ds.Kuripan Rt04/01 Kec.Garung Kab.Wonosobo', '081285874833', '7/7/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(90, 90, 158, 1, 1, 'PG032', 'Imam Adi', 'sariagung gang wijaya kusuma, no 15 rt 3 rw 10-wonosobo', '082141808050', '9/16/2019', '', NULL, 0, 0, 1, 0, 0, 0),
(91, 91, 158, 1, 1, 'PG033', 'Monica Aulia Putri', 'JL AMD BANTARGEBANG RT 04 RW 01 No. 226,Kode Pos: 17151,Bekasi,Jawa Barat', '081392739364', '11/24/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(92, 92, 158, 1, 1, 'PG034', 'Muhammad Iqbal Riyanto', 'Gondang, RT/RW, 01/01. Watumalang, Wonosobo', '081542945070', '8/19/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(93, 93, 158, 1, 1, 'PG035', 'Widoyo', 'Kotakombo  RT.3 RW.1 Randusari, Kepil, Wonosobo ', '085726871466', '8/8/1984', '', NULL, 0, 0, 1, 0, 0, 0),
(94, 94, 158, 1, 1, 'PG037', 'Hanif setiawan', 'Wonokasihan Rt 04Rw04, sojokerto kecamatan leksono,kabupaten wonosobo', '081353725522', '8/30/2001', '', NULL, 0, 0, 1, 0, 0, 0),
(95, 95, 158, 1, 1, 'PG038', 'Suci mawarni', 'Jl Jurang Blimbing no B12 rt04 rw04 Tembalang Semarang', '085779502761', '12/28/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(96, 96, 158, 1, 1, 'PG039', 'meiko', 'Derongisor rt08 rw01 kec Mojotengah kab Wonosobo', '082122290415', '5/21/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(97, 97, 158, 1, 1, 'PG040', 'Saat mustajab waliulloh', 'Kel. Tambakaji RT 6/13, Kec. Ngalian, Kota Semarang', '085747316435', '19-04-99', '', NULL, 0, 0, 1, 0, 0, 0),
(98, 98, 158, 1, 1, 'PG041', 'Anggita Indah Adianingsih', 'Krajan RT/RW 002/002 Larangan Kulon Mojotengah Wonosobo', '08989352771', '25-08-2000', '', NULL, 0, 0, 1, 0, 0, 0),
(99, 99, 158, 1, 1, 'PG042', 'ANGGITA INDAH ADIANINGSIH', 'Rejosari rt 01 re 01 tambi, kejajar', '08989353771', '25-08-2000', '', NULL, 0, 0, 1, 0, 0, 0),
(100, 100, 158, 1, 1, 'PG043', 'ALFINA WIDAYANTI', 'Garung butuh kecamatan kalikajar kabupaten Wonosobo RT 9 RW 3', '082322063481', '05 Oktober 2009', '', NULL, 0, 0, 1, 0, 0, 0),
(101, 101, 158, 1, 1, 'PG044', 'Barokah yuwono saputro', 'Macanan Mojosari RT / RW 01/01 bansari Temanggung ', '083104076762', '20/05/2003', '', NULL, 0, 0, 1, 0, 0, 0),
(102, 102, 158, 1, 1, 'PG056', 'Sulis Eka Setyawati', 'Jln swadaya 1 Rt 04 Rw 09 no 2 pejaten timur pasar minggu jakarta selatan', '082323700150', '19 February 2004', '', NULL, 0, 0, 1, 0, 0, 0),
(103, 103, 158, 1, 1, 'PG057', 'Nova Indah', 'Rt:03/Rw:08,ds jambusari kec kretek', '081586277313', '30 November 1978', '', NULL, 0, 0, 1, 0, 0, 0),
(104, 104, 158, 1, 1, 'PG058', 'Rina wati', 'JL. AMD BANTARGEBANG RT 04 RW 01, No. 226, Kode pos : 17151, Bekasi, Jawa Barat', '0895332609706', '21 maret 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(105, 105, 158, 1, 1, 'PG059', 'Putri kinanti', 'JL AMD BANTARGEBANG RT 04 RW 01, No. 226, Kode Pos : 17151,Bekasi,Jawa Barat', '085292147907', '06 september 1999', '', NULL, 0, 0, 1, 0, 0, 0),
(106, 106, 158, 1, 1, 'PG060', 'Yuliana Latifah', 'Dk. Bakalan RT.10 RW.02 DS. Sidoharjo', '085726266552', '19 Januari 1997', '', NULL, 0, 0, 1, 0, 0, 0),
(107, 107, 158, 1, 1, 'PG062', 'Adit Satriansah', 'Temanggung rt/13 rw/03, Winongsari, Kaliwiro,  Wonosobo', '081338362739', '1 Juli 2002', '', NULL, 0, 0, 1, 0, 0, 0),
(108, 108, 158, 1, 1, 'PG063', 'SegiMuntaqo', 'Kecitran legok RT 03 RW 02', '089688033340', '09 mei  1999', '', NULL, 0, 0, 1, 0, 0, 0),
(109, 109, 158, 1, 1, 'PG064', 'HENDRIANTO', 'Bima Groove Residence Blok 1 E No.3 Dukuh Bima Lambangsari Tambun Selatan Bekasi 17510', '081287792420', '14 maret 1986', '', NULL, 0, 0, 1, 0, 0, 0),
(110, 110, 158, 1, 1, 'PG065', 'Hendi Pibee Group', 'Wonobungkah rt 08 rw 07 kel.jlamprang', '081391888057', '24 / 10 / 1988', '', NULL, 0, 0, 1, 0, 0, 0),
(111, 111, 158, 1, 1, 'PG066', 'ririn laila', 'Kaliasem rt 24 rw 7', '081329564987', '25-7-1993', '', NULL, 0, 0, 1, 0, 0, 0),
(112, 112, 158, 1, 1, 'PG067', 'Lumatun arofah', 'Wonokerto RT 04, RW 03, Leksono, Wonosobo', '+62 831-1730-2655', '16 maret 2000', '', NULL, 0, 0, 1, 0, 0, 0),
(113, 113, 158, 1, 1, 'PG068', 'Dyah Aridha Wardyani ', 'Sarimulyo Indah Rt09/Rw02 Tawangsari, Wonosobo.', '085228831322', '14 Oktober 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(114, 114, 158, 1, 1, 'PG069', 'Titik hermi toviptiati', 'Lemiring(05/07), Ngalian, Wadaslintang, Wonosobo', '081327069809', '16051965', '', NULL, 0, 0, 1, 0, 0, 0),
(115, 115, 158, 1, 1, 'PG070', 'Santi Riyani', 'Jalan ciberang rt 01 rw 06 nomer 129 ciherang tapos depok', '085697007400', '05 Mei 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(116, 116, 158, 1, 1, 'PG071', 'Rokhanah ', 'JL. JOLONTORO Gg Melati no 10 Campursari Jarakasari Wonosobo', '085329130187', '01/12/79', '', NULL, 0, 0, 1, 0, 0, 0),
(117, 117, 158, 1, 1, 'PG072', 'Donny Cahya Christian', 'manggisan lama rt3 rw8 mudal mojotengah wonosobo', '085251996766', '19 Mei 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(118, 118, 158, 1, 1, 'PG073', 'Latif Maulana Yusuf', 'Sawangan 02/03 tumenggungan, Selomerto wonosobo', '082145796265', '31 Desember 2001', '', NULL, 0, 0, 1, 0, 0, 0),
(119, 119, 158, 1, 1, 'PG074', 'Sulistyaningrum', '"Rusun BNN ', '087837142009', '28 maret 1982', '', NULL, 0, 0, 1, 0, 0, 0),
(120, 120, 158, 1, 1, 'PG075', 'Bayu Widiantoro', 'Jl. HR Edi Sukma Km. 21, Watesjaya, Cigombong, Bogor "', '08984014303', '5 September 1994', '', NULL, 0, 0, 1, 0, 0, 0),
(121, 121, 158, 1, 1, 'PG076', 'Juli Pratikno', 'Jln veteran no 67 sudagaran rt 1 rw 5 wonosobo timur', '089648691057', '18 Juli 1992', '', NULL, 0, 0, 1, 0, 0, 0),
(122, 122, 158, 1, 1, 'PG077', 'Bayu Widiantoro', 'Jalan Pesantren no 45 Kelurahan kedung halang kota bogor', '08984014303', '5 September 1994', '', NULL, 0, 0, 1, 0, 0, 0),
(123, 123, 158, 1, 1, 'PG078', 'Sodik bawono ', 'Jln. Kyai Muntang Jaraksari RT. 02 RW. 02 Wonosobo 56314', '085280605275', '24/05/83', '', NULL, 0, 0, 1, 0, 0, 0),
(124, 124, 158, 1, 1, 'PG079', 'Tantri', 'Jalan Tanjung Selatan 2 blok E no 3b', '0895354948700', '09 Maret 1976', '', NULL, 0, 0, 1, 0, 0, 0),
(125, 125, 158, 1, 1, 'PG080', 'Ispriyati', 'Desa Salamerta , Kec.Mandiraja , Kab.Banjarnegara', '082310104049', '1 Mei 1958', '', NULL, 0, 0, 1, 0, 0, 0),
(126, 126, 158, 1, 1, 'PG081', 'Huda Rachman', 'Perum griya bantarindah', '081355200744', '19-03-1980', '', NULL, 0, 0, 1, 0, 0, 0),
(127, 127, 158, 1, 1, 'PG082', 'muhamad rokib', 'Watububan rt3 rw2, gedanganak, Ungaran timur, kab.semarang', 'hp.081326937224/WA.08520003751', '14 oktober 1995', '', NULL, 0, 0, 1, 0, 0, 0),
(128, 128, 158, 1, 1, 'PG083', 'Naryangingsih', 'Somawangi rt 03 rw 03, Kec. Mandiraja, Kab. Banjarnegara', '081328735567', '22 Juli 1967', '', NULL, 0, 0, 1, 0, 0, 0),
(129, 129, 158, 1, 1, 'PG084', 'teguh evan setiawan', 'Watububan rt3 rw2 gedanganak ,Ungara timur,kab. Semarang', '085712976046', '11agustus1988', '', NULL, 0, 0, 1, 0, 0, 0),
(130, 130, 158, 1, 1, 'PG085', 'Rokhanah ', '"Kec: kalibening ', '085329130187', '01/12/79', '', NULL, 0, 0, 1, 0, 0, 0),
(131, 131, 158, 1, 1, 'PG086', 'Muthiana Anifah', 'Kel:kalisat kidul ', '085229999677', '3 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(132, 132, 158, 1, 1, 'PG087', 'Muthiana Anifah', 'Kab:banjarnegara.', '085229999677', '3 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(133, 133, 158, 1, 1, 'PG088', 'Kharisma aprillia', ' kodepos 53456"', '087702918059', '12041997', '', NULL, 0, 0, 1, 0, 0, 0),
(134, 134, 158, 1, 1, 'PG089', 'Asep sambas', 'Sumberan Utara 117 RT 03 RW 01 Wonosobo', '085223244646', '7 - 12 - 1993', '', NULL, 0, 0, 1, 0, 0, 0),
(135, 135, 158, 1, 1, 'PG090', 'Rian Triana', 'Villa Amarta 2 no B10, jalan elang 2, sawah lama , Ciputat, Tangerang Selatan', '082211507466/085719527951', '22 juli 192', '', NULL, 0, 0, 1, 0, 0, 0),
(136, 136, 158, 1, 1, 'PG091', 'Latifah', 'Toko Laris Frozenfood Jl. Moch. Toha no. 12 kedungarum Kuningan Jawa barat. Samping Garuda Cell.', '089675288457', '15011989', '', NULL, 0, 0, 1, 0, 0, 0),
(137, 137, 158, 1, 1, 'PG092', 'Sigit Mei Setiawan', 'jl. beneteng portugis km.4, rumah bpk.sukatam ,dk. grobogan Rt/Rw.03/03 ds.ujungwatu kec.donorojo kab.jepara', '081328050700', '28 Mei 1970', '', NULL, 0, 0, 1, 0, 0, 0),
(138, 138, 158, 1, 1, 'PG093', 'khafid akhyar', 'Kebumen RT 01 RW 03 kebumen , Pringsurat temanggung', '081232812617', '15', '', NULL, 0, 0, 1, 0, 0, 0),
(139, 139, 158, 1, 1, 'PG094', 'tri puji astuti ', 'kronjo, kab.tangerang prov.banten', '085210203191', '23 02 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(140, 140, 158, 1, 1, 'PG095', 'safira arumawati', 'Jln. Kyai Muntang Jaraksari RT. 02 RW. 02 Wonosobo 56314', '08562639289', '20 feb 90', '', NULL, 0, 0, 1, 0, 0, 0),
(141, 141, 158, 1, 1, 'PG096', 'Ratna Marta sari', 'Jambusari RT 04 RW 08 kertek wonoWono', '082135632940', '10 Maret 1989', '', NULL, 0, 0, 1, 0, 0, 0),
(142, 142, 158, 1, 1, 'PGO97', 'Trisno Sujati', 'Jambusari RT 04 RW 08 kertek Wonosobo', '08562919066', '17-03-1985', '', NULL, 0, 0, 1, 0, 0, 0),
(143, 143, 158, 1, 1, 'PG098', 'Hendrawan Prasetiyo Dhany', 'Perum Bluru Permai EF-17, RT/RW 10/11, Kel. Bluru Kidul, KAB. SIDOARJO, SIDOARJO, JAWA TIMUR, ID, 61233', '081330332220', '24 Juli 1975', '', NULL, 0, 0, 1, 0, 0, 0),
(144, 144, 158, 1, 1, 'PG099', 'Fala Azita', 'Tambakmekar Jalancagak', '087877884770', '14 Januari 1986', '', NULL, 0, 0, 1, 0, 0, 0),
(145, 145, 158, 1, 1, 'PG100', 'Lili Irkhanah', 'Perumahan grand mutiara kosambi blok o4 no 8 desa Blendung kec Klari kab Karawang Jawa barat', '081567736417', '21 Sept 1990', '', NULL, 0, 0, 1, 0, 0, 0),
(146, 146, 158, 1, 1, 'PG101', 'TRI TEGUH SETYAWAN', 'Penawangan Tawangsari Wonosobo', '0812-9174-8040', '22 juli 1995', '', NULL, 0, 0, 1, 0, 0, 0),
(147, 147, 158, 1, 1, 'PG102', 'Arinto Surya', 'Mirombo RT 5/2 Rojoimo Wonosobo', '085229864128', '29-11-1991', '', NULL, 0, 0, 1, 0, 0, 0),
(148, 148, 158, 1, 1, 'PG103', 'Ernawati', 'desa Pecarikan RT. 01 RW. 01 Kec. Prembun Kebumen', '082220937464', '22 juli 1979', '', NULL, 0, 0, 1, 0, 0, 0),
(149, 149, 158, 1, 1, 'PG104', 'Handoko Kendro', 'puri krakatau hijau D3 no 17 kecamatan grogol kelurahan kotasari', '081328339900', '10/11/1996', '', NULL, 0, 0, 1, 0, 0, 0),
(150, 150, 158, 1, 1, 'PG105', 'Eliana', 'pederesan besar no.96 rt.03 rw.04 kebonagung, semarang timur', '087886373981', '13 juni 1985', '', NULL, 0, 0, 1, 0, 0, 0),
(151, 151, 158, 1, 1, 'PG106', 'Dzikrona saputra', 'Ngadireso,ngadikusuman 6/7,kertek,wonosobo', '085729696394', '20/07/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(152, 152, 158, 1, 1, 'PG107', 'Avif Hernowo', 'Jambusari RT 07 RW 07 Kertek', '082140245112', '15/11/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(153, 153, 158, 1, 1, 'PG108', 'Noviyah', 'Penjaringan Asri VI no 37 (PS 2F no 39) Surabaya, 60297', '087788956111', '03/11/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(154, 154, 158, 1, 1, 'PG109', 'JUNI EFRIYANTO', '"Familia Urban', '085327487969', '12/06/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(155, 155, 158, 1, 1, 'PG110', 'MUHAMAD RIFAN', 'Cluster Dharmawangsa Blok CF/10 Jln.Mandor Demong Pedurenan Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157 "', '089610305831', '04121994', '', NULL, 0, 0, 1, 0, 0, 0),
(156, 156, 158, 1, 1, 'PG111', 'Arif Prasetyo', 'Dk Duwet rt7 rw1 kel cepiring. kec cepiring. kab kendal', '085227079579', '20', '', NULL, 0, 0, 1, 0, 0, 0),
(157, 157, 158, 1, 1, 'PG112', 'Rahayu Diah Tri Utami', 'Sumberejo, wadaslintang, wonosobo', '081225756169/085727650500', '05/05/1998', '', NULL, 0, 0, 1, 0, 0, 0),
(158, 158, 158, 1, 1, 'PG113', 'Antonnius suratno', 'Gubragan, Mudal, Mojotengah', '089682219967', '10/11/1985', '', NULL, 0, 0, 1, 0, 0, 0),
(159, 159, 158, 1, 1, 'PG114', 'ARIF SUBEKTI ', 'Kemloko mojoagung plantungan', '085729200426', '14/01/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(160, 160, 158, 1, 1, 'PG115', 'Muhammad adha ardiansyafri', 'Bausasran dn3/789A', '087802570955', '1/2/2004', '', NULL, 0, 0, 1, 0, 0, 0),
(161, 161, 158, 1, 1, 'PG116', 'Sudariyah', 'cluster griya prima lestari RT 02/03 gang laimun babakan mustikasari mustikajaya', '081311314434', '25/04/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(162, 162, 158, 1, 1, 'PG117', 'Ulin nasikhah', 'Kemiri rt 03 rw 02 kec. Sigaluh kab. Banjarnegara', '082324527622', '11/09/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(163, 163, 158, 1, 1, 'PG118', 'TOYIB RIFAI', 'Jalan Promasan,  RT04/RW01, Desa Margosari,  Kec. Limbangan', '085228606988', '25/12/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(164, 164, 158, 1, 1, 'PG119', 'Rofi''athul Ummah', 'Jln.Hamad kp bakung rt01 rw05 Cilodong depok patokan rumah sebelah musholla al-taqwa bakung ', '085600024294', '11/07/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(165, 165, 158, 1, 1, 'PG120', 'Saiful ilmi', 'SIYONO RT/RW:003/002, BOJASARI, KERTEK', '082236280562', '04', '', NULL, 0, 0, 1, 0, 0, 0),
(166, 166, 158, 1, 1, 'PG121', 'ulin nasikhah', 'GANG PERINTIS KP.NAROGONG RT009 RW 003 DESA.KEMBANGKUNING KEC.KLAPANUNGGAL 16872', '082324527622', '11/09/1993', '', NULL, 0, 0, 1, 0, 0, 0),
(167, 167, 158, 1, 1, 'PG122', 'Iman saeful bahri', 'Plarangan RT 04 RW 01 Karanganyar kebumen', '082112819529', '15/05/1981', '', NULL, 0, 0, 1, 0, 0, 0),
(168, 168, 158, 1, 1, 'PG123', 'Rafika Magfiroh', 'Sidamukti RT 03 RW 09 kelurahan krandegan kecamatan banjarnegara kabupaten banjarnegara', '082136155005', '05/02/1997', '', NULL, 0, 0, 1, 0, 0, 0),
(169, 169, 158, 1, 1, 'PG124', 'liza efrida arisanti', 'DS jeruk gulung Balongsono madiun', '0895422997449', '05/07/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(170, 170, 158, 1, 1, 'PG125', 'Stephanie Tan', 'TEGALSARI KECAMATAN GARUNG KABUPATEN WONOSOBO ', '081999370333', '30/11/1982', '', NULL, 0, 0, 1, 0, 0, 0),
(171, 171, 158, 1, 1, 'PG126', 'Siti fitriyani', 'Simanis, rt6/10 , pecekelan, sapuran wonosobo', '082235488785', '03/03/1995', '', NULL, 0, 0, 1, 0, 0, 0),
(172, 172, 158, 1, 1, 'PG127', 'Yulia rachmawati ', 'Rumah susun Marunda blok A3/207 Cilincing  jakarta utara', '081310739871', '26/07/1975', '', NULL, 0, 0, 1, 0, 0, 0),
(173, 173, 158, 1, 1, 'PG128', 'Mutiah', 'Mendongan rt01/05 gondowulan kepil wonosoWo', '082324500941', '21/12/1992', '', NULL, 0, 0, 1, 0, 0, 0),
(174, 174, 158, 1, 1, 'PG129', 'Susi Harmoko', 'Jlamprang rt 3 rw 4 wonosobo', '08128290168', '11/10/1972', '', NULL, 0, 0, 1, 0, 0, 0),
(175, 175, 158, 1, 1, 'AG130', 'Saeful Sabarajati', 'Teges Wetan, Rt 03 RW 02, Desa Wirogaten, Kec. Mirit. Kab. Kebumen', '081297961987', '06/01/1987', '', NULL, 0, 0, 1, 0, 0, 0),
(176, 176, 158, 1, 1, 'AG131', 'Supriyanto', 'Cendana adiwarno selomerto wonosobo', '085643036161', '05/04/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(177, 177, 158, 1, 1, 'RG132', 'Rinaldi', 'mendongan rt 001/005 gondowulan kepil wonosobo', '085603308688', '25/02/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(178, 178, 158, 1, 1, 'RG133', 'Riski Oktavia', 'Desa sariyoso rt 01 2 kec wonosobo kab wonosobo', '082260559205', '22101994', '', NULL, 0, 0, 1, 0, 0, 0),
(179, 179, 158, 1, 1, 'RG134', 'Mea dewi', 'Jl. Dieng km3 kalianget rt 03 rw 12 Wonosobo', '085718620489', '29/05/1989', '', NULL, 0, 0, 1, 0, 0, 0),
(180, 180, 158, 1, 1, 'TG135', 'Randhi Pratama', 'jl.kijang rt.04 rw02 kel.trayeman slawi tegal', '085293598095', '04/04/1988', '', NULL, 0, 0, 1, 0, 0, 0),
(181, 181, 158, 1, 1, 'RG136', 'M Zaky Pratama Adjie', 'Jl. Gn. Catur IV Blok II No. 7', '089509284102', '30/07/1999', '', NULL, 0, 0, 1, 0, 0, 0),
(182, 182, 158, 1, 1, 'RG137', 'Hendra Kurniawan', 'Jlan ketapang desa padaharja dukuh kedawung', '08119696605', '04/01/1983', '', NULL, 0, 0, 1, 0, 0, 0),
(183, 183, 158, 1, 1, '', 'Titian ningrum', 'Jln pinang Gg II nmr 68 rt04/05 lagoa Jakarta Utara ', '081229208776', '14 juli 1988', '', NULL, 0, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` int(11) NOT NULL,
  `id_toko` bigint(20) DEFAULT NULL,
  `kode` varchar(30) NOT NULL DEFAULT '',
  `nm_menu` varchar(30) NOT NULL DEFAULT '',
  `satuan` varchar(30) NOT NULL DEFAULT '',
  `harga` varchar(30) NOT NULL DEFAULT '',
  `diskon` varchar(30) NOT NULL DEFAULT '',
  `gambar` varchar(150) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `id_toko`, `kode`, `nm_menu`, `satuan`, `harga`, `diskon`, `gambar`) VALUES
(7, 50, 'A001', 'Mie Ayam', 'porsi', '7500', '0', NULL),
(8, 50, 'A002', 'Bakso', 'porsi', '8000', '0', NULL),
(9, 50, 'A003', 'Siomay', 'porsi', '6000', '15', NULL),
(10, 50, 'A004', 'Nasi Goreng', 'porsi', '10000', '0', NULL),
(13, 50, 'MENU23', 'MENU 1', 'porsi', '8000', '0', NULL),
(14, 54, 'MKN-1', 'udang goreng', 'porsi', '12000', '0', NULL),
(15, 54, 'MKN-2', 'nazi goreng', 'porsi', '6000', '0', NULL),
(16, 54, 'MNM-1', 'kopi hitam', 'gelas', '3000', '0', NULL),
(17, 54, 'MNM-2', 'es teh', 'gelas', '2000', '0', NULL),
(18, 54, 'MNM-3', 'teh', 'gelas', '2000', '0', NULL),
(19, 54, 'MKN-3', 'mie goreng', 'porsi', '7000', '0', NULL),
(20, 54, 'MKN-4', 'sop merah', 'porsi', '15000', '0', NULL),
(21, 67, '1', 'Nasi Goreng Special', 'Porsi', '12000', '1000', NULL),
(22, 67, '2', 'Bebek Goreng Saus Tiram', 'Porsi', '17000', '1000', NULL),
(23, 67, '3', 'Ayam Bakar Super Pedas', 'Porsi', '15000', '1000', NULL),
(26, 156, 'AY-01', 'Nasi Goreng Special', 'Porsi', '12000', '0', 'nasi-01'),
(27, 156, 'FLD-01', 'FILLED MIGNON', 'Porsi', '40000', '0', 'fld-01');

-- --------------------------------------------------------

--
-- Table structure for table `migrasi`
--

CREATE TABLE IF NOT EXISTS `migrasi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `migrasi` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `catatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_stok`
--

CREATE TABLE IF NOT EXISTS `mutasi_stok` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `user_asal` int(11) DEFAULT NULL,
  `user_tujuan` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `faktur` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_stok_temp`
--

CREATE TABLE IF NOT EXISTS `mutasi_stok_temp` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE IF NOT EXISTS `ongkir` (
`id` int(11) NOT NULL,
  `id_order` bigint(20) DEFAULT NULL,
  `ongkir` double DEFAULT NULL,
  `potongan_ongkir` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id`, `id_order`, `ongkir`, `potongan_ongkir`) VALUES
(1, 3, NULL, NULL),
(2, 3, NULL, NULL),
(3, 3, NULL, NULL),
(4, 3, NULL, NULL),
(5, 3, NULL, NULL),
(6, 3, NULL, NULL),
(7, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `opsi`
--

CREATE TABLE IF NOT EXISTS `opsi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_opsi` int(11) DEFAULT NULL,
  `opsi` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4407 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsi`
--

INSERT INTO `opsi` (`id`, `id_toko`, `id_opsi`, `opsi`) VALUES
(1, 128, 1, 0),
(2, 128, 2, 1),
(3, 128, 3, 1),
(4, 128, 4, 1),
(5, 128, 1, 0),
(6, 128, 2, 1),
(7, 128, 3, 1),
(8, 128, 4, 1),
(9, 128, 1, 0),
(10, 128, 2, 1),
(11, 128, 3, 1),
(12, 128, 4, 1),
(13, 128, 1, 0),
(14, 128, 2, 1),
(15, 128, 3, 1),
(16, 128, 4, 1),
(17, 128, 1, 0),
(18, 128, 2, 1),
(19, 128, 3, 1),
(20, 128, 4, 1),
(21, 128, 1, 0),
(22, 128, 2, 1),
(23, 128, 3, 1),
(24, 128, 4, 1),
(25, 156, 1, 1),
(26, 156, 2, 1),
(27, 156, 3, 1),
(28, 156, 4, 1),
(29, 157, 1, 0),
(30, 157, 2, 1),
(31, 157, 3, 1),
(32, 157, 4, 1),
(33, 157, 1, 0),
(34, 157, 2, 1),
(35, 157, 3, 1),
(36, 157, 4, 1),
(37, 157, 1, 0),
(38, 157, 2, 1),
(39, 157, 3, 1),
(40, 157, 4, 1),
(41, 157, 1, 0),
(42, 157, 2, 1),
(43, 157, 3, 1),
(44, 157, 4, 1),
(45, 156, 1, 1),
(46, 156, 2, 1),
(47, 156, 3, 1),
(48, 156, 4, 1),
(49, 157, 1, 0),
(50, 157, 2, 1),
(51, 157, 3, 1),
(52, 157, 4, 1),
(53, 157, 1, 0),
(54, 157, 2, 1),
(55, 157, 3, 1),
(56, 157, 4, 1),
(57, 157, 1, 0),
(58, 157, 2, 1),
(59, 157, 3, 1),
(60, 157, 4, 1),
(61, 157, 1, 0),
(62, 157, 2, 1),
(63, 157, 3, 1),
(64, 157, 4, 1),
(65, 157, 1, 0),
(66, 157, 2, 1),
(67, 157, 3, 1),
(68, 157, 4, 1),
(69, 156, 1, 1),
(70, 156, 2, 1),
(71, 156, 3, 1),
(72, 156, 4, 1),
(73, 0, 1, 0),
(74, 0, 2, 1),
(75, 0, 3, 1),
(76, 0, 4, 1),
(77, 0, 1, 0),
(78, 0, 2, 1),
(79, 0, 3, 1),
(80, 0, 4, 1),
(81, 157, 1, 0),
(82, 157, 2, 1),
(83, 157, 3, 1),
(84, 157, 4, 1),
(85, 157, 1, 0),
(86, 157, 2, 1),
(87, 157, 3, 1),
(88, 157, 4, 1),
(89, 157, 1, 0),
(90, 157, 2, 1),
(91, 157, 3, 1),
(92, 157, 4, 1),
(93, 157, 1, 0),
(94, 157, 2, 1),
(95, 157, 3, 1),
(96, 157, 4, 1),
(97, 157, 1, 0),
(98, 157, 2, 1),
(99, 157, 3, 1),
(100, 157, 4, 1),
(101, 156, 1, 1),
(102, 156, 2, 1),
(103, 156, 3, 1),
(104, 156, 4, 1),
(105, 63, 1, 0),
(106, 63, 2, 1),
(107, 63, 3, 1),
(108, 63, 4, 1),
(109, 63, 1, 0),
(110, 63, 2, 1),
(111, 63, 3, 1),
(112, 63, 4, 1),
(113, 53, 1, 2),
(114, 53, 2, 1),
(115, 53, 3, 1),
(116, 53, 4, 1),
(117, 53, 1, 2),
(118, 53, 2, 1),
(119, 53, 3, 1),
(120, 53, 4, 1),
(121, 53, 1, 2),
(122, 53, 2, 1),
(123, 53, 3, 1),
(124, 53, 4, 1),
(125, 53, 1, 2),
(126, 53, 2, 1),
(127, 53, 3, 1),
(128, 53, 4, 1),
(129, 157, 1, 0),
(130, 157, 2, 1),
(131, 157, 3, 1),
(132, 157, 4, 1),
(133, 53, 1, 2),
(134, 53, 2, 1),
(135, 53, 3, 1),
(136, 53, 4, 1),
(137, 53, 1, 2),
(138, 53, 2, 1),
(139, 53, 3, 1),
(140, 53, 4, 1),
(141, 157, 1, 0),
(142, 157, 2, 1),
(143, 157, 3, 1),
(144, 157, 4, 1),
(145, 157, 1, 0),
(146, 157, 2, 1),
(147, 157, 3, 1),
(148, 157, 4, 1),
(149, 157, 1, 0),
(150, 157, 2, 1),
(151, 157, 3, 1),
(152, 157, 4, 1),
(153, 157, 1, 0),
(154, 157, 2, 1),
(155, 157, 3, 1),
(156, 157, 4, 1),
(157, 63, 1, 0),
(158, 63, 2, 1),
(159, 63, 3, 1),
(160, 63, 4, 1),
(161, 83, 1, 0),
(162, 83, 2, 1),
(163, 83, 3, 1),
(164, 83, 4, 1),
(165, 63, 1, 0),
(166, 63, 2, 1),
(167, 63, 3, 1),
(168, 63, 4, 1),
(169, 157, 1, 0),
(170, 157, 2, 1),
(171, 157, 3, 1),
(172, 157, 4, 1),
(173, 63, 1, 0),
(174, 63, 2, 1),
(175, 63, 3, 1),
(176, 63, 4, 1),
(177, 63, 1, 0),
(178, 63, 2, 1),
(179, 63, 3, 1),
(180, 63, 4, 1),
(181, 63, 1, 0),
(182, 63, 2, 1),
(183, 63, 3, 1),
(184, 63, 4, 1),
(185, 63, 1, 0),
(186, 63, 2, 1),
(187, 63, 3, 1),
(188, 63, 4, 1),
(189, 13, 1, 0),
(190, 13, 2, 1),
(191, 13, 3, 1),
(192, 13, 4, 1),
(193, 13, 1, 0),
(194, 13, 2, 1),
(195, 13, 3, 1),
(196, 13, 4, 1),
(197, 13, 1, 0),
(198, 13, 2, 1),
(199, 13, 3, 1),
(200, 13, 4, 1),
(201, 13, 1, 0),
(202, 13, 2, 1),
(203, 13, 3, 1),
(204, 13, 4, 1),
(205, 13, 1, 0),
(206, 13, 2, 1),
(207, 13, 3, 1),
(208, 13, 4, 1),
(209, 13, 1, 0),
(210, 13, 2, 1),
(211, 13, 3, 1),
(212, 13, 4, 1),
(213, 13, 1, 0),
(214, 13, 2, 1),
(215, 13, 3, 1),
(216, 13, 4, 1),
(217, 13, 1, 0),
(218, 13, 2, 1),
(219, 13, 3, 1),
(220, 13, 4, 1),
(221, 83, 1, 0),
(222, 83, 2, 1),
(223, 83, 3, 1),
(224, 83, 4, 1),
(225, 13, 1, 0),
(226, 13, 2, 1),
(227, 13, 3, 1),
(228, 13, 4, 1),
(229, 83, 1, 0),
(230, 83, 2, 1),
(231, 83, 3, 1),
(232, 83, 4, 1),
(233, 83, 1, 0),
(234, 83, 2, 1),
(235, 83, 3, 1),
(236, 83, 4, 1),
(237, 83, 1, 0),
(238, 83, 2, 1),
(239, 83, 3, 1),
(240, 83, 4, 1),
(241, 83, 1, 0),
(242, 83, 2, 1),
(243, 83, 3, 1),
(244, 83, 4, 1),
(245, 83, 1, 0),
(246, 83, 2, 1),
(247, 83, 3, 1),
(248, 83, 4, 1),
(249, 83, 1, 0),
(250, 83, 2, 1),
(251, 83, 3, 1),
(252, 83, 4, 1),
(253, 63, 1, 0),
(254, 63, 2, 1),
(255, 63, 3, 1),
(256, 63, 4, 1),
(257, 83, 1, 0),
(258, 83, 2, 1),
(259, 83, 3, 1),
(260, 83, 4, 1),
(261, 158, 1, 0),
(262, 158, 2, 1),
(263, 158, 3, 1),
(264, 158, 4, 1),
(265, 158, 1, 0),
(266, 158, 2, 1),
(267, 158, 3, 1),
(268, 158, 4, 1),
(269, 158, 1, 0),
(270, 158, 2, 1),
(271, 158, 3, 1),
(272, 158, 4, 1),
(273, 158, 1, 0),
(274, 158, 2, 1),
(275, 158, 3, 1),
(276, 158, 4, 1),
(277, 158, 1, 0),
(278, 158, 2, 1),
(279, 158, 3, 1),
(280, 158, 4, 1),
(281, 53, 1, 2),
(282, 53, 2, 1),
(283, 53, 3, 1),
(284, 53, 4, 1),
(285, 83, 1, 0),
(286, 83, 2, 1),
(287, 83, 3, 1),
(288, 83, 4, 1),
(289, 158, 1, 0),
(290, 158, 2, 1),
(291, 158, 3, 1),
(292, 158, 4, 1),
(293, 158, 1, 0),
(294, 158, 2, 1),
(295, 158, 3, 1),
(296, 158, 4, 1),
(297, 83, 1, 0),
(298, 83, 2, 1),
(299, 83, 3, 1),
(300, 83, 4, 1),
(301, 158, 1, 0),
(302, 158, 2, 1),
(303, 158, 3, 1),
(304, 158, 4, 1),
(305, 158, 1, 0),
(306, 158, 2, 1),
(307, 158, 3, 1),
(308, 158, 4, 1),
(309, 158, 1, 0),
(310, 158, 2, 1),
(311, 158, 3, 1),
(312, 158, 4, 1),
(313, 83, 1, 0),
(314, 83, 2, 1),
(315, 83, 3, 1),
(316, 83, 4, 1),
(317, 158, 1, 0),
(318, 158, 2, 1),
(319, 158, 3, 1),
(320, 158, 4, 1),
(321, 158, 1, 0),
(322, 158, 2, 1),
(323, 158, 3, 1),
(324, 158, 4, 1),
(325, 158, 1, 0),
(326, 158, 2, 1),
(327, 158, 3, 1),
(328, 158, 4, 1),
(329, 158, 1, 0),
(330, 158, 2, 1),
(331, 158, 3, 1),
(332, 158, 4, 1),
(333, 83, 1, 1),
(334, 83, 2, 1),
(335, 83, 3, 1),
(336, 83, 4, 1),
(337, 83, 1, 1),
(338, 83, 2, 1),
(339, 83, 3, 1),
(340, 83, 4, 1),
(341, 83, 1, 1),
(342, 83, 2, 1),
(343, 83, 3, 1),
(344, 83, 4, 1),
(345, 83, 1, 1),
(346, 83, 2, 1),
(347, 83, 3, 1),
(348, 83, 4, 1),
(349, 158, 1, 0),
(350, 158, 2, 1),
(351, 158, 3, 1),
(352, 158, 4, 1),
(353, 158, 1, 0),
(354, 158, 2, 1),
(355, 158, 3, 1),
(356, 158, 4, 1),
(357, 158, 1, 0),
(358, 158, 2, 1),
(359, 158, 3, 1),
(360, 158, 4, 1),
(361, 158, 1, 0),
(362, 158, 2, 1),
(363, 158, 3, 1),
(364, 158, 4, 1),
(365, 158, 1, 0),
(366, 158, 2, 1),
(367, 158, 3, 1),
(368, 158, 4, 1),
(369, 158, 1, 0),
(370, 158, 2, 1),
(371, 158, 3, 1),
(372, 158, 4, 1),
(373, 158, 1, 0),
(374, 158, 2, 1),
(375, 158, 3, 1),
(376, 158, 4, 1),
(377, 158, 1, 0),
(378, 158, 2, 1),
(379, 158, 3, 1),
(380, 158, 4, 1),
(381, 158, 1, 0),
(382, 158, 2, 1),
(383, 158, 3, 1),
(384, 158, 4, 1),
(385, 158, 1, 0),
(386, 158, 2, 1),
(387, 158, 3, 1),
(388, 158, 4, 1),
(389, 53, 1, 2),
(390, 53, 2, 1),
(391, 53, 3, 1),
(392, 53, 4, 1),
(393, 53, 1, 2),
(394, 53, 2, 1),
(395, 53, 3, 1),
(396, 53, 4, 1),
(397, 53, 1, 2),
(398, 53, 2, 1),
(399, 53, 3, 1),
(400, 53, 4, 1),
(401, 156, 1, 1),
(402, 156, 2, 1),
(403, 156, 3, 1),
(404, 156, 4, 1),
(405, 156, 1, 1),
(406, 156, 2, 1),
(407, 156, 3, 1),
(408, 156, 4, 1),
(409, 158, 1, 0),
(410, 158, 2, 1),
(411, 158, 3, 1),
(412, 158, 4, 1),
(413, 156, 1, 1),
(414, 156, 2, 1),
(415, 156, 3, 1),
(416, 156, 4, 1),
(417, 156, 1, 1),
(418, 156, 2, 1),
(419, 156, 3, 1),
(420, 156, 4, 1),
(421, 50, 1, 1),
(422, 50, 2, 1),
(423, 50, 3, 1),
(424, 50, 4, 1),
(425, 50, 1, 1),
(426, 50, 2, 1),
(427, 50, 3, 1),
(428, 50, 4, 1),
(429, 50, 1, 1),
(430, 50, 2, 1),
(431, 50, 3, 1),
(432, 50, 4, 1),
(433, 50, 1, 1),
(434, 50, 2, 1),
(435, 50, 3, 1),
(436, 50, 4, 1),
(437, 158, 1, 0),
(438, 158, 2, 1),
(439, 158, 3, 1),
(440, 158, 4, 1),
(441, 158, 1, 0),
(442, 158, 2, 1),
(443, 158, 3, 1),
(444, 158, 4, 1),
(445, 158, 1, 0),
(446, 158, 2, 1),
(447, 158, 3, 1),
(448, 158, 4, 1),
(449, 158, 1, 0),
(450, 158, 2, 1),
(451, 158, 3, 1),
(452, 158, 4, 1),
(453, 158, 1, 0),
(454, 158, 2, 1),
(455, 158, 3, 1),
(456, 158, 4, 1),
(457, 158, 1, 0),
(458, 158, 2, 1),
(459, 158, 3, 1),
(460, 158, 4, 1),
(461, 158, 1, 0),
(462, 158, 2, 1),
(463, 158, 3, 1),
(464, 158, 4, 1),
(465, 158, 1, 0),
(466, 158, 2, 1),
(467, 158, 3, 1),
(468, 158, 4, 1),
(469, 156, 1, 0),
(470, 156, 2, 1),
(471, 156, 3, 1),
(472, 156, 4, 1),
(473, 156, 1, 0),
(474, 156, 2, 1),
(475, 156, 3, 1),
(476, 156, 4, 1),
(477, 158, 1, 0),
(478, 158, 2, 1),
(479, 158, 3, 1),
(480, 158, 4, 1),
(481, 158, 1, 0),
(482, 158, 2, 1),
(483, 158, 3, 1),
(484, 158, 4, 1),
(485, 158, 1, 0),
(486, 158, 2, 1),
(487, 158, 3, 1),
(488, 158, 4, 1),
(489, 83, 1, 0),
(490, 83, 2, 1),
(491, 83, 3, 1),
(492, 83, 4, 1),
(493, 158, 1, 0),
(494, 158, 2, 1),
(495, 158, 3, 1),
(496, 158, 4, 1),
(497, 156, 1, 0),
(498, 156, 2, 1),
(499, 156, 3, 1),
(500, 156, 4, 1),
(501, 156, 1, 0),
(502, 156, 2, 1),
(503, 156, 3, 1),
(504, 156, 4, 1),
(505, 156, 1, 0),
(506, 156, 2, 1),
(507, 156, 3, 1),
(508, 156, 4, 1),
(509, 53, 1, 2),
(510, 53, 2, 1),
(511, 53, 3, 1),
(512, 53, 4, 1),
(513, 156, 1, 0),
(514, 156, 2, 1),
(515, 156, 3, 1),
(516, 156, 4, 1),
(517, 156, 1, 0),
(518, 156, 2, 1),
(519, 156, 3, 1),
(520, 156, 4, 1),
(521, 156, 1, 0),
(522, 156, 2, 1),
(523, 156, 3, 1),
(524, 156, 4, 1),
(525, 53, 1, 2),
(526, 53, 2, 1),
(527, 53, 3, 1),
(528, 53, 4, 1),
(529, 156, 1, 0),
(530, 156, 2, 1),
(531, 156, 3, 1),
(532, 156, 4, 1),
(533, 156, 1, 0),
(534, 156, 2, 1),
(535, 156, 3, 1),
(536, 156, 4, 1),
(537, 156, 1, 0),
(538, 156, 2, 1),
(539, 156, 3, 1),
(540, 156, 4, 1),
(541, 156, 1, 0),
(542, 156, 2, 1),
(543, 156, 3, 1),
(544, 156, 4, 1),
(545, 158, 1, 0),
(546, 158, 2, 1),
(547, 158, 3, 1),
(548, 158, 4, 1),
(549, 50, 1, 0),
(550, 50, 2, 1),
(551, 50, 3, 1),
(552, 50, 4, 1),
(553, 50, 1, 0),
(554, 50, 2, 1),
(555, 50, 3, 1),
(556, 50, 4, 1),
(557, 50, 1, 0),
(558, 50, 2, 1),
(559, 50, 3, 1),
(560, 50, 4, 1),
(561, 50, 1, 0),
(562, 50, 2, 1),
(563, 50, 3, 1),
(564, 50, 4, 1),
(565, 157, 1, 0),
(566, 157, 2, 1),
(567, 157, 3, 1),
(568, 157, 4, 1),
(569, 158, 1, 0),
(570, 158, 2, 1),
(571, 158, 3, 1),
(572, 158, 4, 1),
(573, 157, 1, 1),
(574, 157, 2, 1),
(575, 157, 3, 1),
(576, 157, 4, 1),
(577, 157, 1, 1),
(578, 157, 2, 1),
(579, 157, 3, 1),
(580, 157, 4, 1),
(581, 156, 1, 0),
(582, 156, 2, 1),
(583, 156, 3, 1),
(584, 156, 4, 1),
(585, 156, 1, 0),
(586, 156, 2, 1),
(587, 156, 3, 1),
(588, 156, 4, 1),
(589, 158, 1, 0),
(590, 158, 2, 1),
(591, 158, 3, 1),
(592, 158, 4, 1),
(593, 156, 1, 0),
(594, 156, 2, 1),
(595, 156, 3, 1),
(596, 156, 4, 1),
(597, 156, 1, 0),
(598, 156, 2, 1),
(599, 156, 3, 1),
(600, 156, 4, 1),
(601, 156, 1, 0),
(602, 156, 2, 1),
(603, 156, 3, 1),
(604, 156, 4, 1),
(605, 156, 1, 0),
(606, 156, 2, 1),
(607, 156, 3, 1),
(608, 156, 4, 1),
(609, 156, 1, 0),
(610, 156, 2, 1),
(611, 156, 3, 1),
(612, 156, 4, 1),
(613, 158, 1, 0),
(614, 158, 2, 1),
(615, 158, 3, 1),
(616, 158, 4, 1),
(617, 158, 1, 0),
(618, 158, 2, 1),
(619, 158, 3, 1),
(620, 158, 4, 1),
(621, 158, 1, 0),
(622, 158, 2, 1),
(623, 158, 3, 1),
(624, 158, 4, 1),
(625, 158, 1, 0),
(626, 158, 2, 1),
(627, 158, 3, 1),
(628, 158, 4, 1),
(629, 156, 1, 0),
(630, 156, 2, 1),
(631, 156, 3, 1),
(632, 156, 4, 1),
(633, 156, 1, 0),
(634, 156, 2, 1),
(635, 156, 3, 1),
(636, 156, 4, 1),
(637, 158, 1, 0),
(638, 158, 2, 1),
(639, 158, 3, 1),
(640, 158, 4, 1),
(641, 158, 1, 0),
(642, 158, 2, 1),
(643, 158, 3, 1),
(644, 158, 4, 1),
(645, 158, 1, 0),
(646, 158, 2, 1),
(647, 158, 3, 1),
(648, 158, 4, 1),
(649, 158, 1, 0),
(650, 158, 2, 1),
(651, 158, 3, 1),
(652, 158, 4, 1),
(653, 156, 1, 0),
(654, 156, 2, 1),
(655, 156, 3, 1),
(656, 156, 4, 1),
(657, 53, 1, 2),
(658, 53, 2, 1),
(659, 53, 3, 1),
(660, 53, 4, 1),
(661, 158, 1, 0),
(662, 158, 2, 1),
(663, 158, 3, 1),
(664, 158, 4, 1),
(665, 158, 1, 0),
(666, 158, 2, 1),
(667, 158, 3, 1),
(668, 158, 4, 1),
(669, 156, 1, 0),
(670, 156, 2, 1),
(671, 156, 3, 1),
(672, 156, 4, 1),
(673, 158, 1, 0),
(674, 158, 2, 1),
(675, 158, 3, 1),
(676, 158, 4, 1),
(677, 53, 1, 0),
(678, 53, 2, 1),
(679, 53, 3, 1),
(680, 53, 4, 1),
(681, 158, 1, 0),
(682, 158, 2, 1),
(683, 158, 3, 1),
(684, 158, 4, 1),
(685, 158, 5, 0),
(686, 158, 1, 0),
(687, 158, 2, 1),
(688, 158, 3, 1),
(689, 158, 4, 1),
(690, 158, 1, 0),
(691, 158, 2, 1),
(692, 158, 3, 1),
(693, 158, 4, 1),
(694, 158, 1, 0),
(695, 158, 2, 1),
(696, 158, 3, 1),
(697, 158, 4, 1),
(698, 158, 1, 0),
(699, 158, 2, 1),
(700, 158, 3, 1),
(701, 158, 4, 1),
(702, 158, 1, 0),
(703, 158, 2, 1),
(704, 158, 3, 1),
(705, 158, 4, 1),
(706, 158, 1, 0),
(707, 158, 2, 1),
(708, 158, 3, 1),
(709, 158, 4, 1),
(710, 157, 1, 1),
(711, 157, 2, 1),
(712, 157, 3, 1),
(713, 157, 4, 1),
(714, 157, 1, 1),
(715, 157, 2, 1),
(716, 157, 3, 1),
(717, 157, 4, 1),
(718, 158, 1, 0),
(719, 158, 2, 1),
(720, 158, 3, 1),
(721, 158, 4, 1),
(722, 157, 1, 1),
(723, 157, 2, 1),
(724, 157, 3, 1),
(725, 157, 4, 1),
(726, 158, 1, 0),
(727, 158, 2, 1),
(728, 158, 3, 1),
(729, 158, 4, 1),
(730, 158, 1, 0),
(731, 158, 2, 1),
(732, 158, 3, 1),
(733, 158, 4, 1),
(734, 158, 1, 0),
(735, 158, 2, 1),
(736, 158, 3, 1),
(737, 158, 4, 1),
(738, 158, 1, 0),
(739, 158, 2, 1),
(740, 158, 3, 1),
(741, 158, 4, 1),
(742, 158, 1, 0),
(743, 158, 2, 1),
(744, 158, 3, 1),
(745, 158, 4, 1),
(746, 158, 1, 0),
(747, 158, 2, 1),
(748, 158, 3, 1),
(749, 158, 4, 1),
(750, 158, 1, 0),
(751, 158, 2, 1),
(752, 158, 3, 1),
(753, 158, 4, 1),
(754, 158, 1, 0),
(755, 158, 2, 1),
(756, 158, 3, 1),
(757, 158, 4, 1),
(758, 158, 1, 0),
(759, 158, 2, 1),
(760, 158, 3, 1),
(761, 158, 4, 1),
(762, 158, 1, 0),
(763, 158, 2, 1),
(764, 158, 3, 1),
(765, 158, 4, 1),
(766, 158, 1, 0),
(767, 158, 2, 1),
(768, 158, 3, 1),
(769, 158, 4, 1),
(770, 156, 1, 0),
(771, 156, 2, 1),
(772, 156, 3, 1),
(773, 156, 4, 1),
(774, 156, 5, 1),
(775, 156, 1, 1),
(776, 156, 2, 1),
(777, 156, 3, 1),
(778, 156, 4, 1),
(779, 158, 1, 0),
(780, 158, 2, 1),
(781, 158, 3, 1),
(782, 158, 4, 1),
(783, 158, 1, 0),
(784, 158, 2, 1),
(785, 158, 3, 1),
(786, 158, 4, 1),
(787, 158, 1, 0),
(788, 158, 2, 1),
(789, 158, 3, 1),
(790, 158, 4, 1),
(791, 158, 1, 0),
(792, 158, 2, 1),
(793, 158, 3, 1),
(794, 158, 4, 1),
(795, 158, 1, 0),
(796, 158, 2, 1),
(797, 158, 3, 1),
(798, 158, 4, 1),
(799, 156, 1, 1),
(800, 156, 2, 1),
(801, 156, 3, 1),
(802, 156, 4, 1),
(803, 156, 1, 0),
(804, 156, 2, 1),
(805, 156, 3, 1),
(806, 156, 4, 1),
(807, 158, 1, 0),
(808, 158, 2, 1),
(809, 158, 3, 1),
(810, 158, 4, 1),
(811, 158, 1, 0),
(812, 158, 2, 1),
(813, 158, 3, 1),
(814, 158, 4, 1),
(815, 156, 1, 1),
(816, 156, 2, 1),
(817, 156, 3, 1),
(818, 156, 4, 1),
(819, 156, 1, 1),
(820, 156, 2, 1),
(821, 156, 3, 1),
(822, 156, 4, 1),
(823, 159, 1, 1),
(824, 159, 2, 1),
(825, 159, 3, 1),
(826, 159, 4, 1),
(827, 159, 1, 1),
(828, 159, 2, 1),
(829, 159, 3, 1),
(830, 159, 4, 1),
(831, 156, 1, 1),
(832, 156, 2, 1),
(833, 156, 3, 1),
(834, 156, 4, 1),
(835, 159, 1, 0),
(836, 159, 2, 1),
(837, 159, 3, 1),
(838, 159, 4, 1),
(839, 159, 1, 0),
(840, 159, 2, 1),
(841, 159, 3, 1),
(842, 159, 4, 1),
(843, 159, 1, 0),
(844, 159, 2, 1),
(845, 159, 3, 1),
(846, 159, 4, 1),
(847, 156, 1, 1),
(848, 156, 2, 1),
(849, 156, 3, 1),
(850, 156, 4, 1),
(851, 156, 1, 1),
(852, 156, 2, 1),
(853, 156, 3, 1),
(854, 156, 4, 1),
(855, 158, 1, 0),
(856, 158, 2, 1),
(857, 158, 3, 1),
(858, 158, 4, 1),
(859, 156, 1, 1),
(860, 156, 2, 1),
(861, 156, 3, 1),
(862, 156, 4, 1),
(863, 159, 1, 0),
(864, 159, 2, 1),
(865, 159, 3, 1),
(866, 159, 4, 1),
(867, 159, 5, 1),
(868, 158, 1, 0),
(869, 158, 2, 1),
(870, 158, 3, 1),
(871, 158, 4, 1),
(872, 158, 1, 0),
(873, 158, 2, 1),
(874, 158, 3, 1),
(875, 158, 4, 1),
(876, 158, 1, 0),
(877, 158, 2, 1),
(878, 158, 3, 1),
(879, 158, 4, 1),
(880, 158, 1, 0),
(881, 158, 2, 1),
(882, 158, 3, 1),
(883, 158, 4, 1),
(884, 158, 1, 0),
(885, 158, 2, 1),
(886, 158, 3, 1),
(887, 158, 4, 1),
(888, 158, 1, 0),
(889, 158, 2, 1),
(890, 158, 3, 1),
(891, 158, 4, 1),
(892, 158, 1, 0),
(893, 158, 2, 1),
(894, 158, 3, 1),
(895, 158, 4, 1),
(896, 158, 1, 0),
(897, 158, 2, 1),
(898, 158, 3, 1),
(899, 158, 4, 1),
(900, 158, 1, 0),
(901, 158, 2, 1),
(902, 158, 3, 1),
(903, 158, 4, 1),
(904, 158, 1, 0),
(905, 158, 2, 1),
(906, 158, 3, 1),
(907, 158, 4, 1),
(908, 158, 1, 0),
(909, 158, 2, 1),
(910, 158, 3, 1),
(911, 158, 4, 1),
(912, 158, 1, 0),
(913, 158, 2, 1),
(914, 158, 3, 1),
(915, 158, 4, 1),
(916, 158, 1, 0),
(917, 158, 2, 1),
(918, 158, 3, 1),
(919, 158, 4, 1),
(920, 158, 1, 0),
(921, 158, 2, 1),
(922, 158, 3, 1),
(923, 158, 4, 1),
(924, 159, 1, 0),
(925, 159, 2, 1),
(926, 159, 3, 1),
(927, 159, 4, 1),
(928, 158, 1, 0),
(929, 158, 2, 1),
(930, 158, 3, 1),
(931, 158, 4, 1),
(932, 158, 1, 0),
(933, 158, 2, 1),
(934, 158, 3, 1),
(935, 158, 4, 1),
(936, 158, 1, 0),
(937, 158, 2, 1),
(938, 158, 3, 1),
(939, 158, 4, 1),
(940, 158, 1, 0),
(941, 158, 2, 1),
(942, 158, 3, 1),
(943, 158, 4, 1),
(944, 160, 1, 1),
(945, 160, 2, 1),
(946, 160, 3, 1),
(947, 160, 4, 1),
(948, 160, 1, 1),
(949, 160, 2, 1),
(950, 160, 3, 1),
(951, 160, 4, 1),
(952, 158, 1, 0),
(953, 158, 2, 1),
(954, 158, 3, 1),
(955, 158, 4, 1),
(956, 158, 1, 0),
(957, 158, 2, 1),
(958, 158, 3, 1),
(959, 158, 4, 1),
(960, 158, 1, 0),
(961, 158, 2, 1),
(962, 158, 3, 1),
(963, 158, 4, 1),
(964, 158, 1, 0),
(965, 158, 2, 1),
(966, 158, 3, 1),
(967, 158, 4, 1),
(968, 158, 1, 0),
(969, 158, 2, 1),
(970, 158, 3, 1),
(971, 158, 4, 1),
(972, 158, 1, 0),
(973, 158, 2, 1),
(974, 158, 3, 1),
(975, 158, 4, 1),
(976, 158, 1, 0),
(977, 158, 2, 1),
(978, 158, 3, 1),
(979, 158, 4, 1),
(980, 158, 1, 0),
(981, 158, 2, 1),
(982, 158, 3, 1),
(983, 158, 4, 1),
(984, 158, 1, 0),
(985, 158, 2, 1),
(986, 158, 3, 1),
(987, 158, 4, 1),
(988, 158, 1, 0),
(989, 158, 2, 1),
(990, 158, 3, 1),
(991, 158, 4, 1),
(992, 158, 1, 0),
(993, 158, 2, 1),
(994, 158, 3, 1),
(995, 158, 4, 1),
(996, 158, 1, 0),
(997, 158, 2, 1),
(998, 158, 3, 1),
(999, 158, 4, 1),
(1000, 158, 1, 0),
(1001, 158, 2, 1),
(1002, 158, 3, 1),
(1003, 158, 4, 1),
(1004, 158, 1, 0),
(1005, 158, 2, 1),
(1006, 158, 3, 1),
(1007, 158, 4, 1),
(1008, 158, 1, 0),
(1009, 158, 2, 1),
(1010, 158, 3, 1),
(1011, 158, 4, 1),
(1012, 156, 1, 1),
(1013, 156, 2, 1),
(1014, 156, 3, 1),
(1015, 156, 4, 1),
(1016, 158, 1, 0),
(1017, 158, 2, 1),
(1018, 158, 3, 1),
(1019, 158, 4, 1),
(1020, 156, 1, 1),
(1021, 156, 2, 1),
(1022, 156, 3, 1),
(1023, 156, 4, 1),
(1024, 158, 1, 0),
(1025, 158, 2, 1),
(1026, 158, 3, 1),
(1027, 158, 4, 1),
(1028, 158, 1, 0),
(1029, 158, 2, 1),
(1030, 158, 3, 1),
(1031, 158, 4, 1),
(1032, 158, 1, 0),
(1033, 158, 2, 1),
(1034, 158, 3, 1),
(1035, 158, 4, 1),
(1036, 158, 1, 0),
(1037, 158, 2, 1),
(1038, 158, 3, 1),
(1039, 158, 4, 1),
(1040, 156, 1, 0),
(1041, 156, 2, 1),
(1042, 156, 3, 1),
(1043, 156, 4, 1),
(1044, 161, 1, 0),
(1045, 161, 2, 0),
(1046, 161, 3, 1),
(1047, 161, 4, 1),
(1048, 161, 1, 0),
(1049, 161, 2, 0),
(1050, 161, 3, 1),
(1051, 161, 4, 1),
(1052, 161, 1, 0),
(1053, 161, 2, 0),
(1054, 161, 3, 1),
(1055, 161, 4, 1),
(1056, 161, 1, 0),
(1057, 161, 2, 0),
(1058, 161, 3, 1),
(1059, 161, 4, 1),
(1060, 158, 1, 0),
(1061, 158, 2, 1),
(1062, 158, 3, 1),
(1063, 158, 4, 1),
(1064, 161, 1, 0),
(1065, 161, 2, 0),
(1066, 161, 3, 1),
(1067, 161, 4, 1),
(1068, 161, 5, 1),
(1069, 161, 6, 10),
(1070, 161, 1, 0),
(1071, 161, 2, 0),
(1072, 161, 3, 1),
(1073, 161, 4, 1),
(1074, 161, 1, 0),
(1075, 161, 2, 0),
(1076, 161, 3, 1),
(1077, 161, 4, 1),
(1078, 161, 1, 0),
(1079, 161, 2, 0),
(1080, 161, 3, 1),
(1081, 161, 4, 1),
(1082, 161, 1, 0),
(1083, 161, 2, 0),
(1084, 161, 3, 1),
(1085, 161, 4, 1),
(1086, 161, 1, 0),
(1087, 161, 2, 0),
(1088, 161, 3, 1),
(1089, 161, 4, 1),
(1090, 162, 1, 0),
(1091, 162, 2, 1),
(1092, 162, 3, 1),
(1093, 162, 4, 1),
(1094, 163, 1, 0),
(1095, 163, 2, 1),
(1096, 163, 3, 1),
(1097, 163, 4, 1),
(1098, 164, 1, 0),
(1099, 164, 2, 1),
(1100, 164, 3, 1),
(1101, 164, 4, 1),
(1102, 161, 1, 0),
(1103, 161, 2, 0),
(1104, 161, 3, 1),
(1105, 161, 4, 1),
(1106, 161, 1, 0),
(1107, 161, 2, 0),
(1108, 161, 3, 1),
(1109, 161, 4, 1),
(1110, 161, 1, 0),
(1111, 161, 2, 0),
(1112, 161, 3, 1),
(1113, 161, 4, 1),
(1114, 161, 1, 0),
(1115, 161, 2, 0),
(1116, 161, 3, 1),
(1117, 161, 4, 1),
(1118, 161, 1, 0),
(1119, 161, 2, 0),
(1120, 161, 3, 1),
(1121, 161, 4, 1),
(1122, 161, 1, 0),
(1123, 161, 2, 0),
(1124, 161, 3, 1),
(1125, 161, 4, 1),
(1126, 161, 1, 0),
(1127, 161, 2, 0),
(1128, 161, 3, 1),
(1129, 161, 4, 1),
(1130, 53, 1, 1),
(1131, 53, 2, 1),
(1132, 53, 3, 1),
(1133, 53, 4, 1),
(1134, 161, 1, 0),
(1135, 161, 2, 0),
(1136, 161, 3, 1),
(1137, 161, 4, 1),
(1138, 161, 1, 0),
(1139, 161, 2, 0),
(1140, 161, 3, 1),
(1141, 161, 4, 1),
(1142, 161, 1, 0),
(1143, 161, 2, 0),
(1144, 161, 3, 1),
(1145, 161, 4, 1),
(1146, 165, 1, 0),
(1147, 165, 2, 1),
(1148, 165, 3, 1),
(1149, 165, 4, 1),
(1150, 166, 1, 0),
(1151, 166, 2, 1),
(1152, 166, 3, 1),
(1153, 166, 4, 1),
(1154, 167, 1, 0),
(1155, 167, 2, 1),
(1156, 167, 3, 1),
(1157, 167, 4, 1),
(1158, 168, 1, 0),
(1159, 168, 2, 1),
(1160, 168, 3, 1),
(1161, 168, 4, 1),
(1162, 169, 1, 0),
(1163, 169, 2, 1),
(1164, 169, 3, 1),
(1165, 169, 4, 1),
(1166, 170, 1, 0),
(1167, 170, 2, 1),
(1168, 170, 3, 1),
(1169, 170, 4, 1),
(1170, 171, 1, 0),
(1171, 171, 2, 1),
(1172, 171, 3, 1),
(1173, 171, 4, 1),
(1174, 172, 1, 0),
(1175, 172, 2, 1),
(1176, 172, 3, 1),
(1177, 172, 4, 1),
(1178, 173, 1, 0),
(1179, 173, 2, 1),
(1180, 173, 3, 1),
(1181, 173, 4, 1),
(1182, 174, 1, 0),
(1183, 174, 2, 1),
(1184, 174, 3, 1),
(1185, 174, 4, 1),
(1186, 175, 1, 0),
(1187, 175, 2, 1),
(1188, 175, 3, 1),
(1189, 175, 4, 1),
(1190, 176, 1, 0),
(1191, 176, 2, 1),
(1192, 176, 3, 1),
(1193, 176, 4, 1),
(1194, 161, 1, 0),
(1195, 161, 2, 0),
(1196, 161, 3, 1),
(1197, 161, 4, 1),
(1198, 161, 1, 0),
(1199, 161, 2, 0),
(1200, 161, 3, 1),
(1201, 161, 4, 1),
(1202, 161, 1, 0),
(1203, 161, 2, 0),
(1204, 161, 3, 1),
(1205, 161, 4, 1),
(1206, 161, 1, 0),
(1207, 161, 2, 0),
(1208, 161, 3, 1),
(1209, 161, 4, 1),
(1210, 161, 1, 0),
(1211, 161, 2, 0),
(1212, 161, 3, 1),
(1213, 161, 4, 1),
(1214, 13, 1, 0),
(1215, 13, 2, 1),
(1216, 13, 3, 1),
(1217, 13, 4, 1),
(1218, 158, 1, 0),
(1219, 158, 2, 1),
(1220, 158, 3, 1),
(1221, 158, 4, 1),
(1222, 161, 1, 0),
(1223, 161, 2, 0),
(1224, 161, 3, 1),
(1225, 161, 4, 1),
(1226, 161, 1, 0),
(1227, 161, 2, 0),
(1228, 161, 3, 1),
(1229, 161, 4, 1),
(1230, 161, 1, 0),
(1231, 161, 2, 0),
(1232, 161, 3, 1),
(1233, 161, 4, 1),
(1234, 161, 1, 0),
(1235, 161, 2, 0),
(1236, 161, 3, 1),
(1237, 161, 4, 1),
(1238, 161, 1, 0),
(1239, 161, 2, 0),
(1240, 161, 3, 1),
(1241, 161, 4, 1),
(1242, 161, 1, 0),
(1243, 161, 2, 0),
(1244, 161, 3, 1),
(1245, 161, 4, 1),
(1246, 161, 1, 0),
(1247, 161, 2, 0),
(1248, 161, 3, 1),
(1249, 161, 4, 1),
(1250, 161, 1, 0),
(1251, 161, 2, 0),
(1252, 161, 3, 1),
(1253, 161, 4, 1),
(1254, 176, 1, 0),
(1255, 176, 2, 1),
(1256, 176, 3, 1),
(1257, 176, 4, 1),
(1258, 176, 1, 0),
(1259, 176, 2, 1),
(1260, 176, 3, 1),
(1261, 176, 4, 1),
(1262, 176, 1, 0),
(1263, 176, 2, 1),
(1264, 176, 3, 1),
(1265, 176, 4, 1),
(1266, 176, 1, 0),
(1267, 176, 2, 1),
(1268, 176, 3, 1),
(1269, 176, 4, 1),
(1270, 161, 1, 0),
(1271, 161, 2, 0),
(1272, 161, 3, 1),
(1273, 161, 4, 1),
(1274, 176, 1, 0),
(1275, 176, 2, 1),
(1276, 176, 3, 1),
(1277, 176, 4, 1),
(1278, 161, 1, 0),
(1279, 161, 2, 0),
(1280, 161, 3, 1),
(1281, 161, 4, 1),
(1282, 177, 1, 0),
(1283, 177, 2, 0),
(1284, 177, 3, 1),
(1285, 177, 4, 1),
(1286, 177, 6, 10),
(1287, 176, 6, 10),
(1288, 0, 1, 0),
(1289, 0, 2, 1),
(1290, 0, 3, 1),
(1291, 0, 4, 1),
(1292, 0, 5, 1),
(1293, 0, 6, 10),
(1294, 181, 1, 1),
(1295, 181, 2, 1),
(1296, 181, 3, 1),
(1297, 181, 4, 1),
(1298, 181, 5, 1),
(1299, 181, 6, 10),
(1300, 161, 1, 0),
(1301, 161, 2, 1),
(1302, 161, 3, 1),
(1303, 161, 4, 1),
(1304, 158, 1, 0),
(1305, 158, 2, 1),
(1306, 158, 3, 1),
(1307, 158, 4, 1),
(1308, 158, 6, 10),
(1309, 158, 1, 0),
(1310, 158, 2, 1),
(1311, 158, 3, 1),
(1312, 158, 4, 1),
(1313, 182, 1, 0),
(1314, 182, 2, 1),
(1315, 182, 3, 1),
(1316, 182, 4, 1),
(1317, 182, 5, 1),
(1318, 182, 6, 10),
(1319, 182, 1, 0),
(1320, 182, 2, 1),
(1321, 182, 3, 1),
(1322, 182, 4, 1),
(1323, 161, 1, 0),
(1324, 161, 2, 1),
(1325, 161, 3, 1),
(1326, 161, 4, 1),
(1327, 161, 1, 0),
(1328, 161, 2, 1),
(1329, 161, 3, 1),
(1330, 161, 4, 1),
(1331, 161, 1, 0),
(1332, 161, 2, 1),
(1333, 161, 3, 1),
(1334, 161, 4, 1),
(1335, 161, 1, 0),
(1336, 161, 2, 1),
(1337, 161, 3, 1),
(1338, 161, 4, 1),
(1339, 158, 1, 0),
(1340, 158, 2, 1),
(1341, 158, 3, 1),
(1342, 158, 4, 1),
(1343, 161, 1, 0),
(1344, 161, 2, 1),
(1345, 161, 3, 1),
(1346, 161, 4, 1),
(1347, 158, 1, 0),
(1348, 158, 2, 1),
(1349, 158, 3, 1),
(1350, 158, 4, 1),
(1351, 158, 1, 0),
(1352, 158, 2, 1),
(1353, 158, 3, 1),
(1354, 158, 4, 1),
(1355, 158, 1, 0),
(1356, 158, 2, 1),
(1357, 158, 3, 1),
(1358, 158, 4, 1),
(1359, 161, 1, 0),
(1360, 161, 2, 1),
(1361, 161, 3, 1),
(1362, 161, 4, 1),
(1363, 158, 1, 0),
(1364, 158, 2, 1),
(1365, 158, 3, 1),
(1366, 158, 4, 1),
(1367, 158, 1, 0),
(1368, 158, 2, 1),
(1369, 158, 3, 1),
(1370, 158, 4, 1),
(1371, 161, 1, 0),
(1372, 161, 2, 1),
(1373, 161, 3, 1),
(1374, 161, 4, 1),
(1375, 158, 1, 0),
(1376, 158, 2, 1),
(1377, 158, 3, 1),
(1378, 158, 4, 1),
(1379, 158, 1, 0),
(1380, 158, 2, 1),
(1381, 158, 3, 1),
(1382, 158, 4, 1),
(1383, 158, 1, 0),
(1384, 158, 2, 1),
(1385, 158, 3, 1),
(1386, 158, 4, 1),
(1387, 158, 1, 0),
(1388, 158, 2, 1),
(1389, 158, 3, 1),
(1390, 158, 4, 1),
(1391, 161, 1, 0),
(1392, 161, 2, 1),
(1393, 161, 3, 1),
(1394, 161, 4, 1),
(1395, 158, 1, 0),
(1396, 158, 2, 1),
(1397, 158, 3, 1),
(1398, 158, 4, 1),
(1399, 158, 1, 0),
(1400, 158, 2, 1),
(1401, 158, 3, 1),
(1402, 158, 4, 1),
(1403, 158, 1, 0),
(1404, 158, 2, 1),
(1405, 158, 3, 1),
(1406, 158, 4, 1),
(1407, 158, 1, 0),
(1408, 158, 2, 1),
(1409, 158, 3, 1),
(1410, 158, 4, 1),
(1411, 161, 1, 0),
(1412, 161, 2, 1),
(1413, 161, 3, 1),
(1414, 161, 4, 1),
(1415, 158, 1, 0),
(1416, 158, 2, 1),
(1417, 158, 3, 1),
(1418, 158, 4, 1),
(1419, 158, 1, 0),
(1420, 158, 2, 1),
(1421, 158, 3, 1),
(1422, 158, 4, 1),
(1423, 158, 1, 0),
(1424, 158, 2, 1),
(1425, 158, 3, 1),
(1426, 158, 4, 1),
(1427, 158, 1, 0),
(1428, 158, 2, 1),
(1429, 158, 3, 1),
(1430, 158, 4, 1),
(1431, 158, 1, 0),
(1432, 158, 2, 1),
(1433, 158, 3, 1),
(1434, 158, 4, 1),
(1435, 161, 1, 0),
(1436, 161, 2, 1),
(1437, 161, 3, 1),
(1438, 161, 4, 1),
(1439, 158, 1, 0),
(1440, 158, 2, 1),
(1441, 158, 3, 1),
(1442, 158, 4, 1),
(1443, 158, 1, 0),
(1444, 158, 2, 1),
(1445, 158, 3, 1),
(1446, 158, 4, 1),
(1447, 158, 1, 0),
(1448, 158, 2, 1),
(1449, 158, 3, 1),
(1450, 158, 4, 1),
(1451, 161, 1, 0),
(1452, 161, 2, 1),
(1453, 161, 3, 1),
(1454, 161, 4, 1),
(1455, 158, 1, 0),
(1456, 158, 2, 1),
(1457, 158, 3, 1),
(1458, 158, 4, 1),
(1459, 158, 1, 0),
(1460, 158, 2, 1),
(1461, 158, 3, 1),
(1462, 158, 4, 1),
(1463, 158, 1, 0),
(1464, 158, 2, 1),
(1465, 158, 3, 1),
(1466, 158, 4, 1),
(1467, 158, 1, 0),
(1468, 158, 2, 1),
(1469, 158, 3, 1),
(1470, 158, 4, 1),
(1471, 158, 1, 0),
(1472, 158, 2, 1),
(1473, 158, 3, 1),
(1474, 158, 4, 1),
(1475, 158, 1, 0),
(1476, 158, 2, 1),
(1477, 158, 3, 1),
(1478, 158, 4, 1),
(1479, 158, 1, 0),
(1480, 158, 2, 1),
(1481, 158, 3, 1),
(1482, 158, 4, 1),
(1483, 158, 1, 0),
(1484, 158, 2, 1),
(1485, 158, 3, 1),
(1486, 158, 4, 1),
(1487, 158, 1, 0),
(1488, 158, 2, 1),
(1489, 158, 3, 1),
(1490, 158, 4, 1),
(1491, 158, 1, 0),
(1492, 158, 2, 1),
(1493, 158, 3, 1),
(1494, 158, 4, 1),
(1495, 158, 1, 0),
(1496, 158, 2, 1),
(1497, 158, 3, 1),
(1498, 158, 4, 1),
(1499, 158, 1, 0),
(1500, 158, 2, 1),
(1501, 158, 3, 1),
(1502, 158, 4, 1),
(1503, 158, 1, 0),
(1504, 158, 2, 1),
(1505, 158, 3, 1),
(1506, 158, 4, 1),
(1507, 158, 1, 0),
(1508, 158, 2, 1),
(1509, 158, 3, 1),
(1510, 158, 4, 1),
(1511, 158, 1, 0),
(1512, 158, 2, 1),
(1513, 158, 3, 1),
(1514, 158, 4, 1),
(1515, 158, 1, 0),
(1516, 158, 2, 1),
(1517, 158, 3, 1),
(1518, 158, 4, 1),
(1519, 158, 1, 0),
(1520, 158, 2, 1),
(1521, 158, 3, 1),
(1522, 158, 4, 1),
(1523, 158, 1, 0),
(1524, 158, 2, 1),
(1525, 158, 3, 1),
(1526, 158, 4, 1),
(1527, 158, 1, 0),
(1528, 158, 2, 1),
(1529, 158, 3, 1),
(1530, 158, 4, 1),
(1531, 161, 1, 0),
(1532, 161, 2, 1),
(1533, 161, 3, 1),
(1534, 161, 4, 1),
(1535, 158, 1, 0),
(1536, 158, 2, 1),
(1537, 158, 3, 1),
(1538, 158, 4, 1),
(1539, 158, 1, 0),
(1540, 158, 2, 1),
(1541, 158, 3, 1),
(1542, 158, 4, 1),
(1543, 158, 1, 0),
(1544, 158, 2, 1),
(1545, 158, 3, 1),
(1546, 158, 4, 1),
(1547, 158, 1, 0),
(1548, 158, 2, 1),
(1549, 158, 3, 1),
(1550, 158, 4, 1),
(1551, 161, 1, 0),
(1552, 161, 2, 1),
(1553, 161, 3, 1),
(1554, 161, 4, 1),
(1555, 158, 1, 0),
(1556, 158, 2, 1),
(1557, 158, 3, 1),
(1558, 158, 4, 1),
(1559, 158, 1, 0),
(1560, 158, 2, 1),
(1561, 158, 3, 1),
(1562, 158, 4, 1),
(1563, 158, 1, 0),
(1564, 158, 2, 1),
(1565, 158, 3, 1),
(1566, 158, 4, 1),
(1567, 158, 1, 0),
(1568, 158, 2, 1),
(1569, 158, 3, 1),
(1570, 158, 4, 1),
(1571, 158, 1, 0),
(1572, 158, 2, 1),
(1573, 158, 3, 1),
(1574, 158, 4, 1),
(1575, 158, 1, 0),
(1576, 158, 2, 1),
(1577, 158, 3, 1),
(1578, 158, 4, 1),
(1579, 158, 1, 0),
(1580, 158, 2, 1),
(1581, 158, 3, 1),
(1582, 158, 4, 1),
(1583, 158, 1, 0),
(1584, 158, 2, 1),
(1585, 158, 3, 1),
(1586, 158, 4, 1),
(1587, 158, 1, 0),
(1588, 158, 2, 1),
(1589, 158, 3, 1),
(1590, 158, 4, 1),
(1591, 158, 1, 0),
(1592, 158, 2, 1),
(1593, 158, 3, 1),
(1594, 158, 4, 1),
(1595, 158, 1, 0),
(1596, 158, 2, 1),
(1597, 158, 3, 1),
(1598, 158, 4, 1),
(1599, 158, 1, 0),
(1600, 158, 2, 1),
(1601, 158, 3, 1),
(1602, 158, 4, 1),
(1603, 158, 1, 0),
(1604, 158, 2, 1),
(1605, 158, 3, 1),
(1606, 158, 4, 1),
(1607, 158, 1, 0),
(1608, 158, 2, 1),
(1609, 158, 3, 1),
(1610, 158, 4, 1),
(1611, 158, 1, 0),
(1612, 158, 2, 1),
(1613, 158, 3, 1),
(1614, 158, 4, 1),
(1615, 158, 1, 0),
(1616, 158, 2, 1),
(1617, 158, 3, 1),
(1618, 158, 4, 1),
(1619, 158, 1, 0),
(1620, 158, 2, 1),
(1621, 158, 3, 1),
(1622, 158, 4, 1),
(1623, 158, 1, 0),
(1624, 158, 2, 1),
(1625, 158, 3, 1),
(1626, 158, 4, 1),
(1627, 158, 1, 0),
(1628, 158, 2, 1),
(1629, 158, 3, 1),
(1630, 158, 4, 1),
(1631, 158, 1, 0),
(1632, 158, 2, 1),
(1633, 158, 3, 1),
(1634, 158, 4, 1),
(1635, 158, 1, 0),
(1636, 158, 2, 1),
(1637, 158, 3, 1),
(1638, 158, 4, 1),
(1639, 158, 1, 0),
(1640, 158, 2, 1),
(1641, 158, 3, 1),
(1642, 158, 4, 1),
(1643, 158, 1, 0),
(1644, 158, 2, 1),
(1645, 158, 3, 1),
(1646, 158, 4, 1),
(1647, 158, 1, 0),
(1648, 158, 2, 1),
(1649, 158, 3, 1),
(1650, 158, 4, 1),
(1651, 158, 1, 0),
(1652, 158, 2, 1),
(1653, 158, 3, 1),
(1654, 158, 4, 1),
(1655, 158, 1, 0),
(1656, 158, 2, 1),
(1657, 158, 3, 1),
(1658, 158, 4, 1),
(1659, 158, 1, 0),
(1660, 158, 2, 1),
(1661, 158, 3, 1),
(1662, 158, 4, 1),
(1663, 158, 1, 0),
(1664, 158, 2, 1),
(1665, 158, 3, 1),
(1666, 158, 4, 1),
(1667, 158, 1, 0),
(1668, 158, 2, 1),
(1669, 158, 3, 1),
(1670, 158, 4, 1),
(1671, 158, 1, 0),
(1672, 158, 2, 1),
(1673, 158, 3, 1),
(1674, 158, 4, 1),
(1675, 158, 1, 0),
(1676, 158, 2, 1),
(1677, 158, 3, 1),
(1678, 158, 4, 1),
(1679, 158, 1, 0),
(1680, 158, 2, 1),
(1681, 158, 3, 1),
(1682, 158, 4, 1),
(1683, 158, 1, 0),
(1684, 158, 2, 1),
(1685, 158, 3, 1),
(1686, 158, 4, 1),
(1687, 158, 1, 0),
(1688, 158, 2, 1),
(1689, 158, 3, 1),
(1690, 158, 4, 1),
(1691, 158, 1, 0),
(1692, 158, 2, 1),
(1693, 158, 3, 1),
(1694, 158, 4, 1),
(1695, 158, 1, 0),
(1696, 158, 2, 1),
(1697, 158, 3, 1),
(1698, 158, 4, 1),
(1699, 158, 1, 0),
(1700, 158, 2, 1),
(1701, 158, 3, 1),
(1702, 158, 4, 1),
(1703, 158, 1, 0),
(1704, 158, 2, 1),
(1705, 158, 3, 1),
(1706, 158, 4, 1),
(1707, 158, 1, 0),
(1708, 158, 2, 1),
(1709, 158, 3, 1),
(1710, 158, 4, 1),
(1711, 158, 1, 0),
(1712, 158, 2, 1),
(1713, 158, 3, 1),
(1714, 158, 4, 1),
(1715, 158, 1, 0),
(1716, 158, 2, 1),
(1717, 158, 3, 1),
(1718, 158, 4, 1),
(1719, 158, 1, 0),
(1720, 158, 2, 1),
(1721, 158, 3, 1),
(1722, 158, 4, 1),
(1723, 158, 1, 0),
(1724, 158, 2, 1),
(1725, 158, 3, 1),
(1726, 158, 4, 1),
(1727, 158, 1, 0),
(1728, 158, 2, 1),
(1729, 158, 3, 1),
(1730, 158, 4, 1),
(1731, 158, 1, 0),
(1732, 158, 2, 1),
(1733, 158, 3, 1),
(1734, 158, 4, 1),
(1735, 158, 1, 0),
(1736, 158, 2, 1),
(1737, 158, 3, 1),
(1738, 158, 4, 1),
(1739, 158, 1, 0),
(1740, 158, 2, 1),
(1741, 158, 3, 1),
(1742, 158, 4, 1),
(1743, 158, 1, 0),
(1744, 158, 2, 1),
(1745, 158, 3, 1),
(1746, 158, 4, 1),
(1747, 158, 1, 0),
(1748, 158, 2, 1),
(1749, 158, 3, 1),
(1750, 158, 4, 1),
(1751, 158, 1, 0),
(1752, 158, 2, 1),
(1753, 158, 3, 1),
(1754, 158, 4, 1),
(1755, 158, 1, 0),
(1756, 158, 2, 1),
(1757, 158, 3, 1),
(1758, 158, 4, 1),
(1759, 158, 1, 0),
(1760, 158, 2, 1),
(1761, 158, 3, 1),
(1762, 158, 4, 1),
(1763, 158, 1, 0),
(1764, 158, 2, 1),
(1765, 158, 3, 1),
(1766, 158, 4, 1),
(1767, 158, 1, 0),
(1768, 158, 2, 1),
(1769, 158, 3, 1),
(1770, 158, 4, 1),
(1771, 158, 1, 0),
(1772, 158, 2, 1),
(1773, 158, 3, 1),
(1774, 158, 4, 1),
(1775, 158, 1, 0),
(1776, 158, 2, 1),
(1777, 158, 3, 1),
(1778, 158, 4, 1),
(1779, 158, 1, 0),
(1780, 158, 2, 1),
(1781, 158, 3, 1),
(1782, 158, 4, 1),
(1783, 158, 1, 0),
(1784, 158, 2, 1),
(1785, 158, 3, 1),
(1786, 158, 4, 1),
(1787, 158, 1, 0),
(1788, 158, 2, 1),
(1789, 158, 3, 1),
(1790, 158, 4, 1),
(1791, 158, 1, 0),
(1792, 158, 2, 1),
(1793, 158, 3, 1),
(1794, 158, 4, 1),
(1795, 158, 1, 0),
(1796, 158, 2, 1),
(1797, 158, 3, 1),
(1798, 158, 4, 1),
(1799, 158, 1, 0),
(1800, 158, 2, 1),
(1801, 158, 3, 1),
(1802, 158, 4, 1),
(1803, 158, 1, 0),
(1804, 158, 2, 1),
(1805, 158, 3, 1),
(1806, 158, 4, 1),
(1807, 158, 1, 0),
(1808, 158, 2, 1),
(1809, 158, 3, 1),
(1810, 158, 4, 1),
(1811, 158, 1, 0),
(1812, 158, 2, 1),
(1813, 158, 3, 1),
(1814, 158, 4, 1),
(1815, 158, 1, 0),
(1816, 158, 2, 1),
(1817, 158, 3, 1),
(1818, 158, 4, 1),
(1819, 158, 1, 0),
(1820, 158, 2, 1),
(1821, 158, 3, 1),
(1822, 158, 4, 1),
(1823, 158, 1, 0),
(1824, 158, 2, 1),
(1825, 158, 3, 1),
(1826, 158, 4, 1),
(1827, 158, 1, 0),
(1828, 158, 2, 1),
(1829, 158, 3, 1),
(1830, 158, 4, 1),
(1831, 158, 1, 0),
(1832, 158, 2, 1),
(1833, 158, 3, 1),
(1834, 158, 4, 1),
(1835, 158, 1, 0),
(1836, 158, 2, 1),
(1837, 158, 3, 1),
(1838, 158, 4, 1),
(1839, 158, 1, 0),
(1840, 158, 2, 1),
(1841, 158, 3, 1),
(1842, 158, 4, 1),
(1843, 158, 1, 0),
(1844, 158, 2, 1),
(1845, 158, 3, 1),
(1846, 158, 4, 1),
(1847, 161, 1, 0),
(1848, 161, 2, 1),
(1849, 161, 3, 1),
(1850, 161, 4, 1),
(1851, 158, 1, 0),
(1852, 158, 2, 1),
(1853, 158, 3, 1),
(1854, 158, 4, 1),
(1855, 158, 1, 0),
(1856, 158, 2, 1),
(1857, 158, 3, 1),
(1858, 158, 4, 1),
(1859, 158, 1, 0),
(1860, 158, 2, 1),
(1861, 158, 3, 1),
(1862, 158, 4, 1),
(1863, 158, 1, 0),
(1864, 158, 2, 1),
(1865, 158, 3, 1),
(1866, 158, 4, 1),
(1867, 158, 1, 0),
(1868, 158, 2, 1),
(1869, 158, 3, 1),
(1870, 158, 4, 1),
(1871, 158, 1, 0),
(1872, 158, 2, 1),
(1873, 158, 3, 1),
(1874, 158, 4, 1),
(1875, 158, 1, 0),
(1876, 158, 2, 1),
(1877, 158, 3, 1),
(1878, 158, 4, 1),
(1879, 158, 1, 0),
(1880, 158, 2, 1),
(1881, 158, 3, 1),
(1882, 158, 4, 1),
(1883, 158, 1, 0),
(1884, 158, 2, 1),
(1885, 158, 3, 1),
(1886, 158, 4, 1),
(1887, 158, 1, 0),
(1888, 158, 2, 1),
(1889, 158, 3, 1),
(1890, 158, 4, 1),
(1891, 158, 1, 0),
(1892, 158, 2, 1),
(1893, 158, 3, 1),
(1894, 158, 4, 1),
(1895, 158, 1, 0),
(1896, 158, 2, 1),
(1897, 158, 3, 1),
(1898, 158, 4, 1),
(1899, 158, 1, 0),
(1900, 158, 2, 1),
(1901, 158, 3, 1),
(1902, 158, 4, 1),
(1903, 158, 1, 0),
(1904, 158, 2, 1),
(1905, 158, 3, 1),
(1906, 158, 4, 1),
(1907, 158, 1, 0),
(1908, 158, 2, 1),
(1909, 158, 3, 1),
(1910, 158, 4, 1),
(1911, 158, 1, 0),
(1912, 158, 2, 1),
(1913, 158, 3, 1),
(1914, 158, 4, 1),
(1915, 158, 1, 0),
(1916, 158, 2, 1),
(1917, 158, 3, 1),
(1918, 158, 4, 1),
(1919, 158, 1, 0),
(1920, 158, 2, 1),
(1921, 158, 3, 1),
(1922, 158, 4, 1),
(1923, 158, 1, 0),
(1924, 158, 2, 1),
(1925, 158, 3, 1),
(1926, 158, 4, 1),
(1927, 158, 1, 0),
(1928, 158, 2, 1),
(1929, 158, 3, 1),
(1930, 158, 4, 1),
(1931, 158, 1, 0),
(1932, 158, 2, 1),
(1933, 158, 3, 1),
(1934, 158, 4, 1),
(1935, 158, 1, 0),
(1936, 158, 2, 1),
(1937, 158, 3, 1),
(1938, 158, 4, 1),
(1939, 158, 1, 0),
(1940, 158, 2, 1),
(1941, 158, 3, 1),
(1942, 158, 4, 1),
(1943, 158, 1, 0),
(1944, 158, 2, 1),
(1945, 158, 3, 1),
(1946, 158, 4, 1),
(1947, 158, 1, 0),
(1948, 158, 2, 1),
(1949, 158, 3, 1),
(1950, 158, 4, 1),
(1951, 158, 1, 0),
(1952, 158, 2, 1),
(1953, 158, 3, 1),
(1954, 158, 4, 1),
(1955, 158, 1, 0),
(1956, 158, 2, 1),
(1957, 158, 3, 1),
(1958, 158, 4, 1),
(1959, 158, 1, 0),
(1960, 158, 2, 1),
(1961, 158, 3, 1),
(1962, 158, 4, 1),
(1963, 158, 1, 0),
(1964, 158, 2, 1),
(1965, 158, 3, 1),
(1966, 158, 4, 1),
(1967, 158, 1, 0),
(1968, 158, 2, 1),
(1969, 158, 3, 1),
(1970, 158, 4, 1),
(1971, 158, 1, 0),
(1972, 158, 2, 1),
(1973, 158, 3, 1),
(1974, 158, 4, 1),
(1975, 158, 1, 0),
(1976, 158, 2, 1),
(1977, 158, 3, 1),
(1978, 158, 4, 1),
(1979, 158, 1, 0),
(1980, 158, 2, 1),
(1981, 158, 3, 1),
(1982, 158, 4, 1),
(1983, 158, 1, 0),
(1984, 158, 2, 1),
(1985, 158, 3, 1),
(1986, 158, 4, 1),
(1987, 158, 1, 0),
(1988, 158, 2, 1),
(1989, 158, 3, 1),
(1990, 158, 4, 1),
(1991, 158, 1, 0),
(1992, 158, 2, 1),
(1993, 158, 3, 1),
(1994, 158, 4, 1),
(1995, 158, 1, 0),
(1996, 158, 2, 1),
(1997, 158, 3, 1),
(1998, 158, 4, 1),
(1999, 158, 1, 0),
(2000, 158, 2, 1),
(2001, 158, 3, 1),
(2002, 158, 4, 1),
(2003, 158, 1, 0),
(2004, 158, 2, 1),
(2005, 158, 3, 1),
(2006, 158, 4, 1),
(2007, 158, 1, 0),
(2008, 158, 2, 1),
(2009, 158, 3, 1),
(2010, 158, 4, 1),
(2011, 158, 1, 0),
(2012, 158, 2, 1),
(2013, 158, 3, 1),
(2014, 158, 4, 1),
(2015, 158, 1, 0),
(2016, 158, 2, 1),
(2017, 158, 3, 1),
(2018, 158, 4, 1),
(2019, 158, 1, 0),
(2020, 158, 2, 1),
(2021, 158, 3, 1),
(2022, 158, 4, 1),
(2023, 158, 1, 0),
(2024, 158, 2, 1),
(2025, 158, 3, 1),
(2026, 158, 4, 1),
(2027, 158, 1, 0),
(2028, 158, 2, 1),
(2029, 158, 3, 1),
(2030, 158, 4, 1),
(2031, 158, 1, 0),
(2032, 158, 2, 1),
(2033, 158, 3, 1),
(2034, 158, 4, 1),
(2035, 158, 1, 0),
(2036, 158, 2, 1),
(2037, 158, 3, 1),
(2038, 158, 4, 1),
(2039, 158, 1, 0),
(2040, 158, 2, 1),
(2041, 158, 3, 1),
(2042, 158, 4, 1),
(2043, 158, 1, 0),
(2044, 158, 2, 1),
(2045, 158, 3, 1),
(2046, 158, 4, 1),
(2047, 158, 1, 0),
(2048, 158, 2, 1),
(2049, 158, 3, 1),
(2050, 158, 4, 1),
(2051, 158, 1, 0),
(2052, 158, 2, 1),
(2053, 158, 3, 1),
(2054, 158, 4, 1),
(2055, 158, 1, 0),
(2056, 158, 2, 1),
(2057, 158, 3, 1),
(2058, 158, 4, 1),
(2059, 158, 1, 0),
(2060, 158, 2, 1),
(2061, 158, 3, 1),
(2062, 158, 4, 1),
(2063, 158, 1, 0),
(2064, 158, 2, 1),
(2065, 158, 3, 1),
(2066, 158, 4, 1),
(2067, 158, 1, 0),
(2068, 158, 2, 1),
(2069, 158, 3, 1),
(2070, 158, 4, 1),
(2071, 158, 1, 0),
(2072, 158, 2, 1),
(2073, 158, 3, 1),
(2074, 158, 4, 1),
(2075, 158, 1, 0),
(2076, 158, 2, 1),
(2077, 158, 3, 1),
(2078, 158, 4, 1),
(2079, 158, 1, 0),
(2080, 158, 2, 1),
(2081, 158, 3, 1),
(2082, 158, 4, 1),
(2083, 158, 1, 0),
(2084, 158, 2, 1),
(2085, 158, 3, 1),
(2086, 158, 4, 1),
(2087, 158, 1, 0),
(2088, 158, 2, 1),
(2089, 158, 3, 1),
(2090, 158, 4, 1),
(2091, 158, 1, 0),
(2092, 158, 2, 1),
(2093, 158, 3, 1),
(2094, 158, 4, 1),
(2095, 158, 1, 0),
(2096, 158, 2, 1),
(2097, 158, 3, 1),
(2098, 158, 4, 1),
(2099, 158, 1, 0),
(2100, 158, 2, 1),
(2101, 158, 3, 1),
(2102, 158, 4, 1),
(2103, 158, 1, 0),
(2104, 158, 2, 1),
(2105, 158, 3, 1),
(2106, 158, 4, 1),
(2107, 158, 1, 0),
(2108, 158, 2, 1),
(2109, 158, 3, 1),
(2110, 158, 4, 1),
(2111, 158, 1, 0),
(2112, 158, 2, 1),
(2113, 158, 3, 1),
(2114, 158, 4, 1),
(2115, 158, 1, 0),
(2116, 158, 2, 1),
(2117, 158, 3, 1),
(2118, 158, 4, 1),
(2119, 158, 1, 0),
(2120, 158, 2, 1),
(2121, 158, 3, 1),
(2122, 158, 4, 1),
(2123, 158, 1, 0),
(2124, 158, 2, 1),
(2125, 158, 3, 1),
(2126, 158, 4, 1),
(2127, 158, 1, 0),
(2128, 158, 2, 1),
(2129, 158, 3, 1),
(2130, 158, 4, 1),
(2131, 158, 1, 0),
(2132, 158, 2, 1),
(2133, 158, 3, 1),
(2134, 158, 4, 1),
(2135, 158, 1, 0),
(2136, 158, 2, 1),
(2137, 158, 3, 1),
(2138, 158, 4, 1),
(2139, 158, 1, 0),
(2140, 158, 2, 1),
(2141, 158, 3, 1),
(2142, 158, 4, 1),
(2143, 158, 1, 0),
(2144, 158, 2, 1),
(2145, 158, 3, 1),
(2146, 158, 4, 1),
(2147, 158, 1, 0),
(2148, 158, 2, 1),
(2149, 158, 3, 1),
(2150, 158, 4, 1),
(2151, 158, 1, 0),
(2152, 158, 2, 1),
(2153, 158, 3, 1),
(2154, 158, 4, 1),
(2155, 158, 1, 0),
(2156, 158, 2, 1),
(2157, 158, 3, 1),
(2158, 158, 4, 1),
(2159, 158, 1, 0),
(2160, 158, 2, 1),
(2161, 158, 3, 1),
(2162, 158, 4, 1),
(2163, 158, 1, 0),
(2164, 158, 2, 1),
(2165, 158, 3, 1),
(2166, 158, 4, 1),
(2167, 158, 1, 0),
(2168, 158, 2, 1),
(2169, 158, 3, 1),
(2170, 158, 4, 1),
(2171, 158, 1, 0),
(2172, 158, 2, 1),
(2173, 158, 3, 1),
(2174, 158, 4, 1),
(2175, 158, 1, 0),
(2176, 158, 2, 1),
(2177, 158, 3, 1),
(2178, 158, 4, 1),
(2179, 158, 1, 0),
(2180, 158, 2, 1),
(2181, 158, 3, 1),
(2182, 158, 4, 1),
(2183, 158, 1, 0),
(2184, 158, 2, 1),
(2185, 158, 3, 1),
(2186, 158, 4, 1),
(2187, 158, 1, 0),
(2188, 158, 2, 1),
(2189, 158, 3, 1),
(2190, 158, 4, 1),
(2191, 158, 1, 0),
(2192, 158, 2, 1),
(2193, 158, 3, 1),
(2194, 158, 4, 1),
(2195, 158, 1, 0),
(2196, 158, 2, 1),
(2197, 158, 3, 1),
(2198, 158, 4, 1),
(2199, 158, 1, 0),
(2200, 158, 2, 1),
(2201, 158, 3, 1),
(2202, 158, 4, 1),
(2203, 158, 1, 0),
(2204, 158, 2, 1),
(2205, 158, 3, 1),
(2206, 158, 4, 1),
(2207, 158, 1, 0),
(2208, 158, 2, 1),
(2209, 158, 3, 1),
(2210, 158, 4, 1),
(2211, 158, 1, 0),
(2212, 158, 2, 1),
(2213, 158, 3, 1),
(2214, 158, 4, 1),
(2215, 158, 1, 0),
(2216, 158, 2, 1),
(2217, 158, 3, 1),
(2218, 158, 4, 1),
(2219, 158, 1, 0),
(2220, 158, 2, 1),
(2221, 158, 3, 1),
(2222, 158, 4, 1),
(2223, 158, 1, 0),
(2224, 158, 2, 1),
(2225, 158, 3, 1),
(2226, 158, 4, 1),
(2227, 158, 1, 0),
(2228, 158, 2, 1),
(2229, 158, 3, 1),
(2230, 158, 4, 1),
(2231, 158, 1, 0),
(2232, 158, 2, 1),
(2233, 158, 3, 1),
(2234, 158, 4, 1),
(2235, 158, 1, 0),
(2236, 158, 2, 1),
(2237, 158, 3, 1),
(2238, 158, 4, 1),
(2239, 158, 1, 0),
(2240, 158, 2, 1),
(2241, 158, 3, 1),
(2242, 158, 4, 1),
(2243, 158, 1, 0),
(2244, 158, 2, 1),
(2245, 158, 3, 1),
(2246, 158, 4, 1),
(2247, 158, 1, 0),
(2248, 158, 2, 1),
(2249, 158, 3, 1),
(2250, 158, 4, 1),
(2251, 158, 1, 0),
(2252, 158, 2, 1),
(2253, 158, 3, 1),
(2254, 158, 4, 1),
(2255, 158, 1, 0),
(2256, 158, 2, 1),
(2257, 158, 3, 1),
(2258, 158, 4, 1),
(2259, 158, 1, 0),
(2260, 158, 2, 1),
(2261, 158, 3, 1),
(2262, 158, 4, 1),
(2263, 158, 1, 0),
(2264, 158, 2, 1),
(2265, 158, 3, 1),
(2266, 158, 4, 1),
(2267, 158, 1, 0),
(2268, 158, 2, 1),
(2269, 158, 3, 1),
(2270, 158, 4, 1),
(2271, 158, 1, 0),
(2272, 158, 2, 1),
(2273, 158, 3, 1),
(2274, 158, 4, 1),
(2275, 158, 1, 0),
(2276, 158, 2, 1),
(2277, 158, 3, 1),
(2278, 158, 4, 1),
(2279, 158, 1, 0),
(2280, 158, 2, 1),
(2281, 158, 3, 1),
(2282, 158, 4, 1),
(2283, 158, 1, 0),
(2284, 158, 2, 1),
(2285, 158, 3, 1),
(2286, 158, 4, 1),
(2287, 158, 1, 0),
(2288, 158, 2, 1),
(2289, 158, 3, 1),
(2290, 158, 4, 1),
(2291, 158, 1, 0),
(2292, 158, 2, 1),
(2293, 158, 3, 1),
(2294, 158, 4, 1),
(2295, 158, 1, 0),
(2296, 158, 2, 1),
(2297, 158, 3, 1),
(2298, 158, 4, 1),
(2299, 158, 1, 0),
(2300, 158, 2, 1),
(2301, 158, 3, 1),
(2302, 158, 4, 1),
(2303, 158, 1, 0),
(2304, 158, 2, 1),
(2305, 158, 3, 1),
(2306, 158, 4, 1),
(2307, 158, 1, 0),
(2308, 158, 2, 1),
(2309, 158, 3, 1),
(2310, 158, 4, 1),
(2311, 158, 1, 0),
(2312, 158, 2, 1),
(2313, 158, 3, 1),
(2314, 158, 4, 1),
(2315, 158, 1, 0),
(2316, 158, 2, 1),
(2317, 158, 3, 1),
(2318, 158, 4, 1),
(2319, 158, 1, 0),
(2320, 158, 2, 1),
(2321, 158, 3, 1),
(2322, 158, 4, 1),
(2323, 158, 1, 0),
(2324, 158, 2, 1),
(2325, 158, 3, 1),
(2326, 158, 4, 1),
(2327, 158, 1, 0),
(2328, 158, 2, 1),
(2329, 158, 3, 1),
(2330, 158, 4, 1),
(2331, 161, 1, 0),
(2332, 161, 2, 1),
(2333, 161, 3, 1),
(2334, 161, 4, 1),
(2335, 158, 1, 0),
(2336, 158, 2, 1),
(2337, 158, 3, 1),
(2338, 158, 4, 1),
(2339, 158, 1, 0),
(2340, 158, 2, 1),
(2341, 158, 3, 1),
(2342, 158, 4, 1),
(2343, 158, 1, 0),
(2344, 158, 2, 1),
(2345, 158, 3, 1),
(2346, 158, 4, 1),
(2347, 158, 1, 0),
(2348, 158, 2, 1),
(2349, 158, 3, 1),
(2350, 158, 4, 1),
(2351, 158, 1, 0),
(2352, 158, 2, 1),
(2353, 158, 3, 1),
(2354, 158, 4, 1),
(2355, 158, 1, 0),
(2356, 158, 2, 1),
(2357, 158, 3, 1),
(2358, 158, 4, 1),
(2359, 158, 1, 0),
(2360, 158, 2, 1),
(2361, 158, 3, 1),
(2362, 158, 4, 1),
(2363, 158, 1, 0),
(2364, 158, 2, 1),
(2365, 158, 3, 1),
(2366, 158, 4, 1),
(2367, 158, 1, 0),
(2368, 158, 2, 1),
(2369, 158, 3, 1),
(2370, 158, 4, 1),
(2371, 158, 1, 0),
(2372, 158, 2, 1),
(2373, 158, 3, 1),
(2374, 158, 4, 1),
(2375, 158, 1, 0),
(2376, 158, 2, 1),
(2377, 158, 3, 1),
(2378, 158, 4, 1),
(2379, 158, 1, 0),
(2380, 158, 2, 1),
(2381, 158, 3, 1),
(2382, 158, 4, 1),
(2383, 158, 1, 0),
(2384, 158, 2, 1),
(2385, 158, 3, 1),
(2386, 158, 4, 1),
(2387, 158, 1, 0),
(2388, 158, 2, 1),
(2389, 158, 3, 1),
(2390, 158, 4, 1),
(2391, 158, 1, 0),
(2392, 158, 2, 1),
(2393, 158, 3, 1),
(2394, 158, 4, 1),
(2395, 158, 1, 0),
(2396, 158, 2, 1),
(2397, 158, 3, 1),
(2398, 158, 4, 1),
(2399, 158, 1, 0),
(2400, 158, 2, 1),
(2401, 158, 3, 1),
(2402, 158, 4, 1),
(2403, 158, 1, 0),
(2404, 158, 2, 1),
(2405, 158, 3, 1),
(2406, 158, 4, 1),
(2407, 158, 1, 0),
(2408, 158, 2, 1),
(2409, 158, 3, 1),
(2410, 158, 4, 1),
(2411, 158, 1, 0),
(2412, 158, 2, 1),
(2413, 158, 3, 1),
(2414, 158, 4, 1),
(2415, 158, 1, 0),
(2416, 158, 2, 1),
(2417, 158, 3, 1),
(2418, 158, 4, 1),
(2419, 158, 1, 0),
(2420, 158, 2, 1),
(2421, 158, 3, 1),
(2422, 158, 4, 1),
(2423, 158, 1, 0),
(2424, 158, 2, 1),
(2425, 158, 3, 1),
(2426, 158, 4, 1),
(2427, 161, 1, 0),
(2428, 161, 2, 1),
(2429, 161, 3, 1),
(2430, 161, 4, 1),
(2431, 158, 1, 0),
(2432, 158, 2, 1),
(2433, 158, 3, 1),
(2434, 158, 4, 1),
(2435, 158, 1, 0),
(2436, 158, 2, 1),
(2437, 158, 3, 1),
(2438, 158, 4, 1),
(2439, 161, 1, 0),
(2440, 161, 2, 1),
(2441, 161, 3, 1),
(2442, 161, 4, 1),
(2443, 158, 1, 0),
(2444, 158, 2, 1),
(2445, 158, 3, 1),
(2446, 158, 4, 1),
(2447, 158, 1, 0),
(2448, 158, 2, 1),
(2449, 158, 3, 1),
(2450, 158, 4, 1),
(2451, 158, 1, 0),
(2452, 158, 2, 1),
(2453, 158, 3, 1),
(2454, 158, 4, 1),
(2455, 158, 1, 0),
(2456, 158, 2, 1),
(2457, 158, 3, 1),
(2458, 158, 4, 1),
(2459, 158, 1, 0),
(2460, 158, 2, 1),
(2461, 158, 3, 1),
(2462, 158, 4, 1),
(2463, 158, 1, 0),
(2464, 158, 2, 1),
(2465, 158, 3, 1),
(2466, 158, 4, 1),
(2467, 158, 1, 0),
(2468, 158, 2, 1),
(2469, 158, 3, 1),
(2470, 158, 4, 1),
(2471, 158, 1, 0),
(2472, 158, 2, 1),
(2473, 158, 3, 1),
(2474, 158, 4, 1),
(2475, 158, 1, 0),
(2476, 158, 2, 1),
(2477, 158, 3, 1),
(2478, 158, 4, 1),
(2479, 158, 1, 0),
(2480, 158, 2, 1),
(2481, 158, 3, 1),
(2482, 158, 4, 1),
(2483, 158, 1, 0),
(2484, 158, 2, 1),
(2485, 158, 3, 1),
(2486, 158, 4, 1),
(2487, 158, 1, 0),
(2488, 158, 2, 1),
(2489, 158, 3, 1),
(2490, 158, 4, 1),
(2491, 158, 1, 0),
(2492, 158, 2, 1),
(2493, 158, 3, 1),
(2494, 158, 4, 1),
(2495, 158, 1, 0),
(2496, 158, 2, 1),
(2497, 158, 3, 1),
(2498, 158, 4, 1),
(2499, 158, 1, 0),
(2500, 158, 2, 1),
(2501, 158, 3, 1),
(2502, 158, 4, 1),
(2503, 158, 1, 0),
(2504, 158, 2, 1),
(2505, 158, 3, 1),
(2506, 158, 4, 1),
(2507, 158, 1, 0),
(2508, 158, 2, 1),
(2509, 158, 3, 1),
(2510, 158, 4, 1),
(2511, 158, 1, 0),
(2512, 158, 2, 1),
(2513, 158, 3, 1),
(2514, 158, 4, 1),
(2515, 158, 1, 0),
(2516, 158, 2, 1),
(2517, 158, 3, 1),
(2518, 158, 4, 1),
(2519, 158, 1, 0),
(2520, 158, 2, 1),
(2521, 158, 3, 1),
(2522, 158, 4, 1),
(2523, 158, 1, 0),
(2524, 158, 2, 1),
(2525, 158, 3, 1),
(2526, 158, 4, 1),
(2527, 158, 1, 0),
(2528, 158, 2, 1),
(2529, 158, 3, 1),
(2530, 158, 4, 1),
(2531, 158, 1, 0),
(2532, 158, 2, 1),
(2533, 158, 3, 1),
(2534, 158, 4, 1),
(2535, 158, 1, 0),
(2536, 158, 2, 1),
(2537, 158, 3, 1),
(2538, 158, 4, 1),
(2539, 158, 1, 0),
(2540, 158, 2, 1),
(2541, 158, 3, 1),
(2542, 158, 4, 1),
(2543, 158, 1, 0),
(2544, 158, 2, 1),
(2545, 158, 3, 1),
(2546, 158, 4, 1),
(2547, 158, 1, 0),
(2548, 158, 2, 1),
(2549, 158, 3, 1),
(2550, 158, 4, 1),
(2551, 161, 1, 0),
(2552, 161, 2, 1),
(2553, 161, 3, 1),
(2554, 161, 4, 1),
(2555, 158, 1, 0),
(2556, 158, 2, 1),
(2557, 158, 3, 1),
(2558, 158, 4, 1),
(2559, 158, 1, 0),
(2560, 158, 2, 1),
(2561, 158, 3, 1),
(2562, 158, 4, 1),
(2563, 158, 1, 0),
(2564, 158, 2, 1),
(2565, 158, 3, 1),
(2566, 158, 4, 1),
(2567, 158, 1, 0),
(2568, 158, 2, 1),
(2569, 158, 3, 1),
(2570, 158, 4, 1),
(2571, 158, 1, 0),
(2572, 158, 2, 1),
(2573, 158, 3, 1),
(2574, 158, 4, 1),
(2575, 158, 1, 0),
(2576, 158, 2, 1),
(2577, 158, 3, 1),
(2578, 158, 4, 1),
(2579, 158, 1, 0),
(2580, 158, 2, 1),
(2581, 158, 3, 1),
(2582, 158, 4, 1),
(2583, 158, 1, 0),
(2584, 158, 2, 1),
(2585, 158, 3, 1),
(2586, 158, 4, 1),
(2587, 158, 1, 0),
(2588, 158, 2, 1),
(2589, 158, 3, 1),
(2590, 158, 4, 1),
(2591, 158, 1, 0),
(2592, 158, 2, 1),
(2593, 158, 3, 1),
(2594, 158, 4, 1),
(2595, 158, 1, 0),
(2596, 158, 2, 1),
(2597, 158, 3, 1),
(2598, 158, 4, 1),
(2599, 158, 1, 0),
(2600, 158, 2, 1),
(2601, 158, 3, 1),
(2602, 158, 4, 1),
(2603, 158, 1, 0),
(2604, 158, 2, 1),
(2605, 158, 3, 1),
(2606, 158, 4, 1),
(2607, 158, 1, 0),
(2608, 158, 2, 1),
(2609, 158, 3, 1),
(2610, 158, 4, 1),
(2611, 158, 1, 0),
(2612, 158, 2, 1),
(2613, 158, 3, 1),
(2614, 158, 4, 1),
(2615, 158, 1, 0),
(2616, 158, 2, 1),
(2617, 158, 3, 1),
(2618, 158, 4, 1),
(2619, 158, 1, 0),
(2620, 158, 2, 1),
(2621, 158, 3, 1),
(2622, 158, 4, 1),
(2623, 158, 1, 0),
(2624, 158, 2, 1),
(2625, 158, 3, 1),
(2626, 158, 4, 1),
(2627, 158, 1, 0),
(2628, 158, 2, 1),
(2629, 158, 3, 1),
(2630, 158, 4, 1),
(2631, 158, 1, 0),
(2632, 158, 2, 1),
(2633, 158, 3, 1),
(2634, 158, 4, 1),
(2635, 158, 1, 0),
(2636, 158, 2, 1),
(2637, 158, 3, 1),
(2638, 158, 4, 1),
(2639, 158, 1, 0),
(2640, 158, 2, 1),
(2641, 158, 3, 1),
(2642, 158, 4, 1),
(2643, 158, 1, 0),
(2644, 158, 2, 1),
(2645, 158, 3, 1),
(2646, 158, 4, 1),
(2647, 158, 1, 0),
(2648, 158, 2, 1),
(2649, 158, 3, 1),
(2650, 158, 4, 1),
(2651, 158, 1, 0),
(2652, 158, 2, 1),
(2653, 158, 3, 1),
(2654, 158, 4, 1),
(2655, 158, 1, 0),
(2656, 158, 2, 1),
(2657, 158, 3, 1),
(2658, 158, 4, 1),
(2659, 158, 1, 0),
(2660, 158, 2, 1),
(2661, 158, 3, 1),
(2662, 158, 4, 1),
(2663, 158, 1, 0),
(2664, 158, 2, 1),
(2665, 158, 3, 1),
(2666, 158, 4, 1),
(2667, 158, 1, 0),
(2668, 158, 2, 1),
(2669, 158, 3, 1),
(2670, 158, 4, 1),
(2671, 158, 1, 0),
(2672, 158, 2, 1),
(2673, 158, 3, 1),
(2674, 158, 4, 1),
(2675, 158, 1, 0),
(2676, 158, 2, 1),
(2677, 158, 3, 1),
(2678, 158, 4, 1),
(2679, 158, 1, 0),
(2680, 158, 2, 1),
(2681, 158, 3, 1),
(2682, 158, 4, 1),
(2683, 158, 1, 0),
(2684, 158, 2, 1),
(2685, 158, 3, 1),
(2686, 158, 4, 1),
(2687, 158, 1, 0),
(2688, 158, 2, 1),
(2689, 158, 3, 1),
(2690, 158, 4, 1),
(2691, 158, 1, 0),
(2692, 158, 2, 1),
(2693, 158, 3, 1),
(2694, 158, 4, 1),
(2695, 158, 1, 0),
(2696, 158, 2, 1),
(2697, 158, 3, 1),
(2698, 158, 4, 1),
(2699, 158, 1, 0),
(2700, 158, 2, 1),
(2701, 158, 3, 1),
(2702, 158, 4, 1),
(2703, 158, 1, 0),
(2704, 158, 2, 1),
(2705, 158, 3, 1),
(2706, 158, 4, 1),
(2707, 158, 1, 0),
(2708, 158, 2, 1),
(2709, 158, 3, 1),
(2710, 158, 4, 1),
(2711, 158, 1, 0),
(2712, 158, 2, 1),
(2713, 158, 3, 1),
(2714, 158, 4, 1),
(2715, 158, 1, 0),
(2716, 158, 2, 1),
(2717, 158, 3, 1),
(2718, 158, 4, 1),
(2719, 158, 1, 0),
(2720, 158, 2, 1),
(2721, 158, 3, 1),
(2722, 158, 4, 1),
(2723, 158, 1, 0),
(2724, 158, 2, 1),
(2725, 158, 3, 1),
(2726, 158, 4, 1),
(2727, 158, 1, 0),
(2728, 158, 2, 1),
(2729, 158, 3, 1),
(2730, 158, 4, 1),
(2731, 158, 1, 0),
(2732, 158, 2, 1),
(2733, 158, 3, 1),
(2734, 158, 4, 1),
(2735, 158, 1, 0),
(2736, 158, 2, 1),
(2737, 158, 3, 1),
(2738, 158, 4, 1),
(2739, 158, 1, 0),
(2740, 158, 2, 1),
(2741, 158, 3, 1),
(2742, 158, 4, 1),
(2743, 158, 1, 0),
(2744, 158, 2, 1),
(2745, 158, 3, 1),
(2746, 158, 4, 1),
(2747, 158, 1, 0),
(2748, 158, 2, 1),
(2749, 158, 3, 1),
(2750, 158, 4, 1),
(2751, 158, 1, 0),
(2752, 158, 2, 1),
(2753, 158, 3, 1),
(2754, 158, 4, 1),
(2755, 158, 1, 0),
(2756, 158, 2, 1),
(2757, 158, 3, 1),
(2758, 158, 4, 1),
(2759, 158, 1, 0),
(2760, 158, 2, 1),
(2761, 158, 3, 1),
(2762, 158, 4, 1),
(2763, 158, 1, 0),
(2764, 158, 2, 1),
(2765, 158, 3, 1),
(2766, 158, 4, 1),
(2767, 158, 1, 0),
(2768, 158, 2, 1),
(2769, 158, 3, 1),
(2770, 158, 4, 1),
(2771, 158, 1, 0),
(2772, 158, 2, 1),
(2773, 158, 3, 1),
(2774, 158, 4, 1),
(2775, 158, 1, 0),
(2776, 158, 2, 1),
(2777, 158, 3, 1),
(2778, 158, 4, 1),
(2779, 158, 1, 0),
(2780, 158, 2, 1),
(2781, 158, 3, 1),
(2782, 158, 4, 1),
(2783, 158, 1, 0),
(2784, 158, 2, 1),
(2785, 158, 3, 1),
(2786, 158, 4, 1),
(2787, 158, 1, 0),
(2788, 158, 2, 1),
(2789, 158, 3, 1),
(2790, 158, 4, 1),
(2791, 158, 1, 0),
(2792, 158, 2, 1),
(2793, 158, 3, 1),
(2794, 158, 4, 1),
(2795, 158, 1, 0),
(2796, 158, 2, 1),
(2797, 158, 3, 1),
(2798, 158, 4, 1),
(2799, 158, 1, 0),
(2800, 158, 2, 1),
(2801, 158, 3, 1),
(2802, 158, 4, 1),
(2803, 158, 1, 0),
(2804, 158, 2, 1),
(2805, 158, 3, 1),
(2806, 158, 4, 1),
(2807, 158, 1, 0),
(2808, 158, 2, 1),
(2809, 158, 3, 1),
(2810, 158, 4, 1),
(2811, 158, 1, 0),
(2812, 158, 2, 1),
(2813, 158, 3, 1),
(2814, 158, 4, 1),
(2815, 158, 1, 0),
(2816, 158, 2, 1),
(2817, 158, 3, 1),
(2818, 158, 4, 1),
(2819, 158, 1, 0),
(2820, 158, 2, 1),
(2821, 158, 3, 1),
(2822, 158, 4, 1),
(2823, 158, 1, 0),
(2824, 158, 2, 1),
(2825, 158, 3, 1),
(2826, 158, 4, 1),
(2827, 158, 1, 0),
(2828, 158, 2, 1),
(2829, 158, 3, 1),
(2830, 158, 4, 1),
(2831, 158, 1, 0),
(2832, 158, 2, 1),
(2833, 158, 3, 1),
(2834, 158, 4, 1),
(2835, 158, 1, 0),
(2836, 158, 2, 1),
(2837, 158, 3, 1),
(2838, 158, 4, 1),
(2839, 158, 1, 0),
(2840, 158, 2, 1),
(2841, 158, 3, 1),
(2842, 158, 4, 1),
(2843, 158, 1, 0),
(2844, 158, 2, 1),
(2845, 158, 3, 1),
(2846, 158, 4, 1),
(2847, 158, 1, 0),
(2848, 158, 2, 1),
(2849, 158, 3, 1),
(2850, 158, 4, 1),
(2851, 158, 1, 0),
(2852, 158, 2, 1),
(2853, 158, 3, 1),
(2854, 158, 4, 1),
(2855, 158, 1, 0),
(2856, 158, 2, 1),
(2857, 158, 3, 1),
(2858, 158, 4, 1),
(2859, 158, 1, 0),
(2860, 158, 2, 1),
(2861, 158, 3, 1),
(2862, 158, 4, 1),
(2863, 158, 1, 0),
(2864, 158, 2, 1),
(2865, 158, 3, 1),
(2866, 158, 4, 1),
(2867, 158, 1, 0),
(2868, 158, 2, 1),
(2869, 158, 3, 1),
(2870, 158, 4, 1),
(2871, 158, 1, 0),
(2872, 158, 2, 1),
(2873, 158, 3, 1),
(2874, 158, 4, 1),
(2875, 158, 1, 0),
(2876, 158, 2, 1),
(2877, 158, 3, 1),
(2878, 158, 4, 1),
(2879, 158, 1, 0),
(2880, 158, 2, 1),
(2881, 158, 3, 1),
(2882, 158, 4, 1),
(2883, 158, 1, 0),
(2884, 158, 2, 1),
(2885, 158, 3, 1),
(2886, 158, 4, 1),
(2887, 158, 1, 0),
(2888, 158, 2, 1),
(2889, 158, 3, 1),
(2890, 158, 4, 1),
(2891, 158, 1, 0),
(2892, 158, 2, 1),
(2893, 158, 3, 1),
(2894, 158, 4, 1),
(2895, 158, 1, 0),
(2896, 158, 2, 1),
(2897, 158, 3, 1),
(2898, 158, 4, 1),
(2899, 158, 1, 0),
(2900, 158, 2, 1),
(2901, 158, 3, 1),
(2902, 158, 4, 1),
(2903, 158, 1, 0),
(2904, 158, 2, 1),
(2905, 158, 3, 1),
(2906, 158, 4, 1),
(2907, 158, 1, 0),
(2908, 158, 2, 1),
(2909, 158, 3, 1),
(2910, 158, 4, 1),
(2911, 158, 1, 0),
(2912, 158, 2, 1),
(2913, 158, 3, 1),
(2914, 158, 4, 1),
(2915, 158, 1, 0),
(2916, 158, 2, 1),
(2917, 158, 3, 1),
(2918, 158, 4, 1),
(2919, 158, 1, 0),
(2920, 158, 2, 1),
(2921, 158, 3, 1),
(2922, 158, 4, 1),
(2923, 158, 1, 0),
(2924, 158, 2, 1),
(2925, 158, 3, 1),
(2926, 158, 4, 1),
(2927, 158, 1, 0),
(2928, 158, 2, 1),
(2929, 158, 3, 1),
(2930, 158, 4, 1),
(2931, 158, 1, 0),
(2932, 158, 2, 1),
(2933, 158, 3, 1),
(2934, 158, 4, 1),
(2935, 158, 1, 0),
(2936, 158, 2, 1),
(2937, 158, 3, 1),
(2938, 158, 4, 1),
(2939, 158, 1, 0),
(2940, 158, 2, 1),
(2941, 158, 3, 1),
(2942, 158, 4, 1),
(2943, 158, 1, 0),
(2944, 158, 2, 1),
(2945, 158, 3, 1),
(2946, 158, 4, 1),
(2947, 158, 1, 0),
(2948, 158, 2, 1),
(2949, 158, 3, 1),
(2950, 158, 4, 1),
(2951, 158, 1, 0),
(2952, 158, 2, 1),
(2953, 158, 3, 1),
(2954, 158, 4, 1),
(2955, 158, 1, 0),
(2956, 158, 2, 1),
(2957, 158, 3, 1),
(2958, 158, 4, 1),
(2959, 158, 1, 0),
(2960, 158, 2, 1),
(2961, 158, 3, 1),
(2962, 158, 4, 1),
(2963, 158, 1, 0),
(2964, 158, 2, 1),
(2965, 158, 3, 1),
(2966, 158, 4, 1),
(2967, 158, 1, 0),
(2968, 158, 2, 1),
(2969, 158, 3, 1),
(2970, 158, 4, 1),
(2971, 158, 1, 0),
(2972, 158, 2, 1),
(2973, 158, 3, 1),
(2974, 158, 4, 1),
(2975, 158, 1, 0),
(2976, 158, 2, 1),
(2977, 158, 3, 1),
(2978, 158, 4, 1),
(2979, 158, 1, 0),
(2980, 158, 2, 1),
(2981, 158, 3, 1),
(2982, 158, 4, 1),
(2983, 158, 1, 0),
(2984, 158, 2, 1),
(2985, 158, 3, 1),
(2986, 158, 4, 1),
(2987, 158, 1, 0),
(2988, 158, 2, 1),
(2989, 158, 3, 1),
(2990, 158, 4, 1),
(2991, 158, 1, 0),
(2992, 158, 2, 1),
(2993, 158, 3, 1),
(2994, 158, 4, 1),
(2995, 158, 1, 0),
(2996, 158, 2, 1),
(2997, 158, 3, 1),
(2998, 158, 4, 1),
(2999, 158, 1, 0),
(3000, 158, 2, 1),
(3001, 158, 3, 1),
(3002, 158, 4, 1),
(3003, 158, 1, 0),
(3004, 158, 2, 1),
(3005, 158, 3, 1),
(3006, 158, 4, 1),
(3007, 158, 1, 0),
(3008, 158, 2, 1),
(3009, 158, 3, 1),
(3010, 158, 4, 1),
(3011, 158, 1, 0),
(3012, 158, 2, 1),
(3013, 158, 3, 1),
(3014, 158, 4, 1),
(3015, 158, 1, 0),
(3016, 158, 2, 1),
(3017, 158, 3, 1);
INSERT INTO `opsi` (`id`, `id_toko`, `id_opsi`, `opsi`) VALUES
(3018, 158, 4, 1),
(3019, 158, 1, 0),
(3020, 158, 2, 1),
(3021, 158, 3, 1),
(3022, 158, 4, 1),
(3023, 158, 1, 0),
(3024, 158, 2, 1),
(3025, 158, 3, 1),
(3026, 158, 4, 1),
(3027, 158, 1, 0),
(3028, 158, 2, 1),
(3029, 158, 3, 1),
(3030, 158, 4, 1),
(3031, 158, 1, 0),
(3032, 158, 2, 1),
(3033, 158, 3, 1),
(3034, 158, 4, 1),
(3035, 158, 1, 0),
(3036, 158, 2, 1),
(3037, 158, 3, 1),
(3038, 158, 4, 1),
(3039, 158, 1, 0),
(3040, 158, 2, 1),
(3041, 158, 3, 1),
(3042, 158, 4, 1),
(3043, 158, 1, 0),
(3044, 158, 2, 1),
(3045, 158, 3, 1),
(3046, 158, 4, 1),
(3047, 158, 1, 0),
(3048, 158, 2, 1),
(3049, 158, 3, 1),
(3050, 158, 4, 1),
(3051, 158, 1, 0),
(3052, 158, 2, 1),
(3053, 158, 3, 1),
(3054, 158, 4, 1),
(3055, 158, 1, 0),
(3056, 158, 2, 1),
(3057, 158, 3, 1),
(3058, 158, 4, 1),
(3059, 158, 1, 0),
(3060, 158, 2, 1),
(3061, 158, 3, 1),
(3062, 158, 4, 1),
(3063, 158, 1, 0),
(3064, 158, 2, 1),
(3065, 158, 3, 1),
(3066, 158, 4, 1),
(3067, 158, 1, 0),
(3068, 158, 2, 1),
(3069, 158, 3, 1),
(3070, 158, 4, 1),
(3071, 158, 1, 0),
(3072, 158, 2, 1),
(3073, 158, 3, 1),
(3074, 158, 4, 1),
(3075, 158, 1, 0),
(3076, 158, 2, 1),
(3077, 158, 3, 1),
(3078, 158, 4, 1),
(3079, 158, 1, 0),
(3080, 158, 2, 1),
(3081, 158, 3, 1),
(3082, 158, 4, 1),
(3083, 158, 1, 0),
(3084, 158, 2, 1),
(3085, 158, 3, 1),
(3086, 158, 4, 1),
(3087, 158, 1, 0),
(3088, 158, 2, 1),
(3089, 158, 3, 1),
(3090, 158, 4, 1),
(3091, 158, 1, 0),
(3092, 158, 2, 1),
(3093, 158, 3, 1),
(3094, 158, 4, 1),
(3095, 158, 1, 0),
(3096, 158, 2, 1),
(3097, 158, 3, 1),
(3098, 158, 4, 1),
(3099, 158, 1, 0),
(3100, 158, 2, 1),
(3101, 158, 3, 1),
(3102, 158, 4, 1),
(3103, 158, 1, 0),
(3104, 158, 2, 1),
(3105, 158, 3, 1),
(3106, 158, 4, 1),
(3107, 158, 1, 0),
(3108, 158, 2, 1),
(3109, 158, 3, 1),
(3110, 158, 4, 1),
(3111, 158, 1, 0),
(3112, 158, 2, 1),
(3113, 158, 3, 1),
(3114, 158, 4, 1),
(3115, 158, 1, 0),
(3116, 158, 2, 1),
(3117, 158, 3, 1),
(3118, 158, 4, 1),
(3119, 158, 1, 0),
(3120, 158, 2, 1),
(3121, 158, 3, 1),
(3122, 158, 4, 1),
(3123, 158, 1, 0),
(3124, 158, 2, 1),
(3125, 158, 3, 1),
(3126, 158, 4, 1),
(3127, 158, 1, 0),
(3128, 158, 2, 1),
(3129, 158, 3, 1),
(3130, 158, 4, 1),
(3131, 158, 1, 0),
(3132, 158, 2, 1),
(3133, 158, 3, 1),
(3134, 158, 4, 1),
(3135, 158, 1, 0),
(3136, 158, 2, 1),
(3137, 158, 3, 1),
(3138, 158, 4, 1),
(3139, 158, 1, 0),
(3140, 158, 2, 1),
(3141, 158, 3, 1),
(3142, 158, 4, 1),
(3143, 158, 1, 0),
(3144, 158, 2, 1),
(3145, 158, 3, 1),
(3146, 158, 4, 1),
(3147, 158, 1, 0),
(3148, 158, 2, 1),
(3149, 158, 3, 1),
(3150, 158, 4, 1),
(3151, 158, 1, 0),
(3152, 158, 2, 1),
(3153, 158, 3, 1),
(3154, 158, 4, 1),
(3155, 158, 1, 0),
(3156, 158, 2, 1),
(3157, 158, 3, 1),
(3158, 158, 4, 1),
(3159, 158, 1, 0),
(3160, 158, 2, 1),
(3161, 158, 3, 1),
(3162, 158, 4, 1),
(3163, 158, 1, 0),
(3164, 158, 2, 1),
(3165, 158, 3, 1),
(3166, 158, 4, 1),
(3167, 158, 1, 0),
(3168, 158, 2, 1),
(3169, 158, 3, 1),
(3170, 158, 4, 1),
(3171, 158, 1, 0),
(3172, 158, 2, 1),
(3173, 158, 3, 1),
(3174, 158, 4, 1),
(3175, 158, 1, 0),
(3176, 158, 2, 1),
(3177, 158, 3, 1),
(3178, 158, 4, 1),
(3179, 158, 1, 0),
(3180, 158, 2, 1),
(3181, 158, 3, 1),
(3182, 158, 4, 1),
(3183, 158, 1, 0),
(3184, 158, 2, 1),
(3185, 158, 3, 1),
(3186, 158, 4, 1),
(3187, 158, 1, 0),
(3188, 158, 2, 1),
(3189, 158, 3, 1),
(3190, 158, 4, 1),
(3191, 158, 1, 0),
(3192, 158, 2, 1),
(3193, 158, 3, 1),
(3194, 158, 4, 1),
(3195, 158, 1, 0),
(3196, 158, 2, 1),
(3197, 158, 3, 1),
(3198, 158, 4, 1),
(3199, 158, 1, 0),
(3200, 158, 2, 1),
(3201, 158, 3, 1),
(3202, 158, 4, 1),
(3203, 158, 1, 0),
(3204, 158, 2, 1),
(3205, 158, 3, 1),
(3206, 158, 4, 1),
(3207, 158, 1, 0),
(3208, 158, 2, 1),
(3209, 158, 3, 1),
(3210, 158, 4, 1),
(3211, 158, 1, 0),
(3212, 158, 2, 1),
(3213, 158, 3, 1),
(3214, 158, 4, 1),
(3215, 158, 1, 0),
(3216, 158, 2, 1),
(3217, 158, 3, 1),
(3218, 158, 4, 1),
(3219, 158, 1, 0),
(3220, 158, 2, 1),
(3221, 158, 3, 1),
(3222, 158, 4, 1),
(3223, 158, 1, 0),
(3224, 158, 2, 1),
(3225, 158, 3, 1),
(3226, 158, 4, 1),
(3227, 158, 1, 0),
(3228, 158, 2, 1),
(3229, 158, 3, 1),
(3230, 158, 4, 1),
(3231, 158, 1, 0),
(3232, 158, 2, 1),
(3233, 158, 3, 1),
(3234, 158, 4, 1),
(3235, 158, 1, 0),
(3236, 158, 2, 1),
(3237, 158, 3, 1),
(3238, 158, 4, 1),
(3239, 158, 1, 0),
(3240, 158, 2, 1),
(3241, 158, 3, 1),
(3242, 158, 4, 1),
(3243, 158, 1, 0),
(3244, 158, 2, 1),
(3245, 158, 3, 1),
(3246, 158, 4, 1),
(3247, 158, 1, 0),
(3248, 158, 2, 1),
(3249, 158, 3, 1),
(3250, 158, 4, 1),
(3251, 158, 1, 0),
(3252, 158, 2, 1),
(3253, 158, 3, 1),
(3254, 158, 4, 1),
(3255, 158, 1, 0),
(3256, 158, 2, 1),
(3257, 158, 3, 1),
(3258, 158, 4, 1),
(3259, 158, 1, 0),
(3260, 158, 2, 1),
(3261, 158, 3, 1),
(3262, 158, 4, 1),
(3263, 158, 1, 0),
(3264, 158, 2, 1),
(3265, 158, 3, 1),
(3266, 158, 4, 1),
(3267, 158, 1, 0),
(3268, 158, 2, 1),
(3269, 158, 3, 1),
(3270, 158, 4, 1),
(3271, 158, 1, 0),
(3272, 158, 2, 1),
(3273, 158, 3, 1),
(3274, 158, 4, 1),
(3275, 158, 1, 0),
(3276, 158, 2, 1),
(3277, 158, 3, 1),
(3278, 158, 4, 1),
(3279, 158, 1, 0),
(3280, 158, 2, 1),
(3281, 158, 3, 1),
(3282, 158, 4, 1),
(3283, 158, 1, 0),
(3284, 158, 2, 1),
(3285, 158, 3, 1),
(3286, 158, 4, 1),
(3287, 158, 1, 0),
(3288, 158, 2, 1),
(3289, 158, 3, 1),
(3290, 158, 4, 1),
(3291, 158, 1, 0),
(3292, 158, 2, 1),
(3293, 158, 3, 1),
(3294, 158, 4, 1),
(3295, 158, 1, 0),
(3296, 158, 2, 1),
(3297, 158, 3, 1),
(3298, 158, 4, 1),
(3299, 158, 1, 0),
(3300, 158, 2, 1),
(3301, 158, 3, 1),
(3302, 158, 4, 1),
(3303, 158, 1, 0),
(3304, 158, 2, 1),
(3305, 158, 3, 1),
(3306, 158, 4, 1),
(3307, 158, 1, 0),
(3308, 158, 2, 1),
(3309, 158, 3, 1),
(3310, 158, 4, 1),
(3311, 158, 1, 0),
(3312, 158, 2, 1),
(3313, 158, 3, 1),
(3314, 158, 4, 1),
(3315, 158, 1, 0),
(3316, 158, 2, 1),
(3317, 158, 3, 1),
(3318, 158, 4, 1),
(3319, 158, 1, 0),
(3320, 158, 2, 1),
(3321, 158, 3, 1),
(3322, 158, 4, 1),
(3323, 158, 1, 0),
(3324, 158, 2, 1),
(3325, 158, 3, 1),
(3326, 158, 4, 1),
(3327, 158, 1, 0),
(3328, 158, 2, 1),
(3329, 158, 3, 1),
(3330, 158, 4, 1),
(3331, 158, 1, 0),
(3332, 158, 2, 1),
(3333, 158, 3, 1),
(3334, 158, 4, 1),
(3335, 158, 1, 0),
(3336, 158, 2, 1),
(3337, 158, 3, 1),
(3338, 158, 4, 1),
(3339, 158, 1, 0),
(3340, 158, 2, 1),
(3341, 158, 3, 1),
(3342, 158, 4, 1),
(3343, 158, 1, 0),
(3344, 158, 2, 1),
(3345, 158, 3, 1),
(3346, 158, 4, 1),
(3347, 158, 1, 0),
(3348, 158, 2, 1),
(3349, 158, 3, 1),
(3350, 158, 4, 1),
(3351, 158, 1, 0),
(3352, 158, 2, 1),
(3353, 158, 3, 1),
(3354, 158, 4, 1),
(3355, 158, 1, 0),
(3356, 158, 2, 1),
(3357, 158, 3, 1),
(3358, 158, 4, 1),
(3359, 158, 1, 0),
(3360, 158, 2, 1),
(3361, 158, 3, 1),
(3362, 158, 4, 1),
(3363, 158, 1, 0),
(3364, 158, 2, 1),
(3365, 158, 3, 1),
(3366, 158, 4, 1),
(3367, 158, 1, 0),
(3368, 158, 2, 1),
(3369, 158, 3, 1),
(3370, 158, 4, 1),
(3371, 158, 1, 0),
(3372, 158, 2, 1),
(3373, 158, 3, 1),
(3374, 158, 4, 1),
(3375, 158, 1, 0),
(3376, 158, 2, 1),
(3377, 158, 3, 1),
(3378, 158, 4, 1),
(3379, 158, 1, 0),
(3380, 158, 2, 1),
(3381, 158, 3, 1),
(3382, 158, 4, 1),
(3383, 158, 1, 0),
(3384, 158, 2, 1),
(3385, 158, 3, 1),
(3386, 158, 4, 1),
(3387, 158, 1, 0),
(3388, 158, 2, 1),
(3389, 158, 3, 1),
(3390, 158, 4, 1),
(3391, 158, 1, 0),
(3392, 158, 2, 1),
(3393, 158, 3, 1),
(3394, 158, 4, 1),
(3395, 158, 1, 0),
(3396, 158, 2, 1),
(3397, 158, 3, 1),
(3398, 158, 4, 1),
(3399, 158, 1, 0),
(3400, 158, 2, 1),
(3401, 158, 3, 1),
(3402, 158, 4, 1),
(3403, 158, 1, 0),
(3404, 158, 2, 1),
(3405, 158, 3, 1),
(3406, 158, 4, 1),
(3407, 158, 1, 0),
(3408, 158, 2, 1),
(3409, 158, 3, 1),
(3410, 158, 4, 1),
(3411, 158, 1, 0),
(3412, 158, 2, 1),
(3413, 158, 3, 1),
(3414, 158, 4, 1),
(3415, 158, 1, 0),
(3416, 158, 2, 1),
(3417, 158, 3, 1),
(3418, 158, 4, 1),
(3419, 158, 1, 0),
(3420, 158, 2, 1),
(3421, 158, 3, 1),
(3422, 158, 4, 1),
(3423, 158, 1, 0),
(3424, 158, 2, 1),
(3425, 158, 3, 1),
(3426, 158, 4, 1),
(3427, 158, 1, 0),
(3428, 158, 2, 1),
(3429, 158, 3, 1),
(3430, 158, 4, 1),
(3431, 158, 1, 0),
(3432, 158, 2, 1),
(3433, 158, 3, 1),
(3434, 158, 4, 1),
(3435, 158, 1, 0),
(3436, 158, 2, 1),
(3437, 158, 3, 1),
(3438, 158, 4, 1),
(3439, 158, 1, 0),
(3440, 158, 2, 1),
(3441, 158, 3, 1),
(3442, 158, 4, 1),
(3443, 158, 1, 0),
(3444, 158, 2, 1),
(3445, 158, 3, 1),
(3446, 158, 4, 1),
(3447, 158, 1, 0),
(3448, 158, 2, 1),
(3449, 158, 3, 1),
(3450, 158, 4, 1),
(3451, 158, 1, 0),
(3452, 158, 2, 1),
(3453, 158, 3, 1),
(3454, 158, 4, 1),
(3455, 158, 1, 0),
(3456, 158, 2, 1),
(3457, 158, 3, 1),
(3458, 158, 4, 1),
(3459, 158, 1, 0),
(3460, 158, 2, 1),
(3461, 158, 3, 1),
(3462, 158, 4, 1),
(3463, 158, 1, 0),
(3464, 158, 2, 1),
(3465, 158, 3, 1),
(3466, 158, 4, 1),
(3467, 158, 1, 0),
(3468, 158, 2, 1),
(3469, 158, 3, 1),
(3470, 158, 4, 1),
(3471, 158, 1, 0),
(3472, 158, 2, 1),
(3473, 158, 3, 1),
(3474, 158, 4, 1),
(3475, 158, 1, 0),
(3476, 158, 2, 1),
(3477, 158, 3, 1),
(3478, 158, 4, 1),
(3479, 158, 1, 0),
(3480, 158, 2, 1),
(3481, 158, 3, 1),
(3482, 158, 4, 1),
(3483, 158, 1, 0),
(3484, 158, 2, 1),
(3485, 158, 3, 1),
(3486, 158, 4, 1),
(3487, 158, 1, 0),
(3488, 158, 2, 1),
(3489, 158, 3, 1),
(3490, 158, 4, 1),
(3491, 158, 1, 0),
(3492, 158, 2, 1),
(3493, 158, 3, 1),
(3494, 158, 4, 1),
(3495, 158, 1, 0),
(3496, 158, 2, 1),
(3497, 158, 3, 1),
(3498, 158, 4, 1),
(3499, 158, 1, 0),
(3500, 158, 2, 1),
(3501, 158, 3, 1),
(3502, 158, 4, 1),
(3503, 158, 1, 0),
(3504, 158, 2, 1),
(3505, 158, 3, 1),
(3506, 158, 4, 1),
(3507, 158, 1, 0),
(3508, 158, 2, 1),
(3509, 158, 3, 1),
(3510, 158, 4, 1),
(3511, 158, 1, 0),
(3512, 158, 2, 1),
(3513, 158, 3, 1),
(3514, 158, 4, 1),
(3515, 158, 1, 0),
(3516, 158, 2, 1),
(3517, 158, 3, 1),
(3518, 158, 4, 1),
(3519, 158, 1, 0),
(3520, 158, 2, 1),
(3521, 158, 3, 1),
(3522, 158, 4, 1),
(3523, 158, 1, 0),
(3524, 158, 2, 1),
(3525, 158, 3, 1),
(3526, 158, 4, 1),
(3527, 158, 1, 0),
(3528, 158, 2, 1),
(3529, 158, 3, 1),
(3530, 158, 4, 1),
(3531, 158, 1, 0),
(3532, 158, 2, 1),
(3533, 158, 3, 1),
(3534, 158, 4, 1),
(3535, 158, 1, 0),
(3536, 158, 2, 1),
(3537, 158, 3, 1),
(3538, 158, 4, 1),
(3539, 158, 1, 0),
(3540, 158, 2, 1),
(3541, 158, 3, 1),
(3542, 158, 4, 1),
(3543, 158, 1, 0),
(3544, 158, 2, 1),
(3545, 158, 3, 1),
(3546, 158, 4, 1),
(3547, 158, 1, 0),
(3548, 158, 2, 1),
(3549, 158, 3, 1),
(3550, 158, 4, 1),
(3551, 158, 1, 0),
(3552, 158, 2, 1),
(3553, 158, 3, 1),
(3554, 158, 4, 1),
(3555, 158, 1, 0),
(3556, 158, 2, 1),
(3557, 158, 3, 1),
(3558, 158, 4, 1),
(3559, 158, 1, 0),
(3560, 158, 2, 1),
(3561, 158, 3, 1),
(3562, 158, 4, 1),
(3563, 158, 1, 0),
(3564, 158, 2, 1),
(3565, 158, 3, 1),
(3566, 158, 4, 1),
(3567, 158, 1, 0),
(3568, 158, 2, 1),
(3569, 158, 3, 1),
(3570, 158, 4, 1),
(3571, 158, 1, 0),
(3572, 158, 2, 1),
(3573, 158, 3, 1),
(3574, 158, 4, 1),
(3575, 158, 1, 0),
(3576, 158, 2, 1),
(3577, 158, 3, 1),
(3578, 158, 4, 1),
(3579, 158, 1, 0),
(3580, 158, 2, 1),
(3581, 158, 3, 1),
(3582, 158, 4, 1),
(3583, 158, 1, 0),
(3584, 158, 2, 1),
(3585, 158, 3, 1),
(3586, 158, 4, 1),
(3587, 158, 1, 0),
(3588, 158, 2, 1),
(3589, 158, 3, 1),
(3590, 158, 4, 1),
(3591, 158, 1, 0),
(3592, 158, 2, 1),
(3593, 158, 3, 1),
(3594, 158, 4, 1),
(3595, 158, 1, 0),
(3596, 158, 2, 1),
(3597, 158, 3, 1),
(3598, 158, 4, 1),
(3599, 158, 1, 0),
(3600, 158, 2, 1),
(3601, 158, 3, 1),
(3602, 158, 4, 1),
(3603, 158, 1, 0),
(3604, 158, 2, 1),
(3605, 158, 3, 1),
(3606, 158, 4, 1),
(3607, 158, 1, 0),
(3608, 158, 2, 1),
(3609, 158, 3, 1),
(3610, 158, 4, 1),
(3611, 158, 1, 0),
(3612, 158, 2, 1),
(3613, 158, 3, 1),
(3614, 158, 4, 1),
(3615, 158, 1, 0),
(3616, 158, 2, 1),
(3617, 158, 3, 1),
(3618, 158, 4, 1),
(3619, 158, 1, 0),
(3620, 158, 2, 1),
(3621, 158, 3, 1),
(3622, 158, 4, 1),
(3623, 158, 1, 0),
(3624, 158, 2, 1),
(3625, 158, 3, 1),
(3626, 158, 4, 1),
(3627, 158, 1, 0),
(3628, 158, 2, 1),
(3629, 158, 3, 1),
(3630, 158, 4, 1),
(3631, 158, 1, 0),
(3632, 158, 2, 1),
(3633, 158, 3, 1),
(3634, 158, 4, 1),
(3635, 158, 1, 0),
(3636, 158, 2, 1),
(3637, 158, 3, 1),
(3638, 158, 4, 1),
(3639, 158, 1, 0),
(3640, 158, 2, 1),
(3641, 158, 3, 1),
(3642, 158, 4, 1),
(3643, 158, 1, 0),
(3644, 158, 2, 1),
(3645, 158, 3, 1),
(3646, 158, 4, 1),
(3647, 158, 1, 0),
(3648, 158, 2, 1),
(3649, 158, 3, 1),
(3650, 158, 4, 1),
(3651, 158, 1, 0),
(3652, 158, 2, 1),
(3653, 158, 3, 1),
(3654, 158, 4, 1),
(3655, 158, 1, 0),
(3656, 158, 2, 1),
(3657, 158, 3, 1),
(3658, 158, 4, 1),
(3659, 158, 1, 0),
(3660, 158, 2, 1),
(3661, 158, 3, 1),
(3662, 158, 4, 1),
(3663, 158, 1, 0),
(3664, 158, 2, 1),
(3665, 158, 3, 1),
(3666, 158, 4, 1),
(3667, 158, 1, 0),
(3668, 158, 2, 1),
(3669, 158, 3, 1),
(3670, 158, 4, 1),
(3671, 158, 1, 0),
(3672, 158, 2, 1),
(3673, 158, 3, 1),
(3674, 158, 4, 1),
(3675, 158, 1, 0),
(3676, 158, 2, 1),
(3677, 158, 3, 1),
(3678, 158, 4, 1),
(3679, 158, 1, 0),
(3680, 158, 2, 1),
(3681, 158, 3, 1),
(3682, 158, 4, 1),
(3683, 158, 1, 0),
(3684, 158, 2, 1),
(3685, 158, 3, 1),
(3686, 158, 4, 1),
(3687, 158, 1, 0),
(3688, 158, 2, 1),
(3689, 158, 3, 1),
(3690, 158, 4, 1),
(3691, 158, 1, 0),
(3692, 158, 2, 1),
(3693, 158, 3, 1),
(3694, 158, 4, 1),
(3695, 158, 1, 0),
(3696, 158, 2, 1),
(3697, 158, 3, 1),
(3698, 158, 4, 1),
(3699, 158, 1, 0),
(3700, 158, 2, 1),
(3701, 158, 3, 1),
(3702, 158, 4, 1),
(3703, 158, 1, 0),
(3704, 158, 2, 1),
(3705, 158, 3, 1),
(3706, 158, 4, 1),
(3707, 158, 1, 0),
(3708, 158, 2, 1),
(3709, 158, 3, 1),
(3710, 158, 4, 1),
(3711, 158, 1, 0),
(3712, 158, 2, 1),
(3713, 158, 3, 1),
(3714, 158, 4, 1),
(3715, 158, 1, 0),
(3716, 158, 2, 1),
(3717, 158, 3, 1),
(3718, 158, 4, 1),
(3719, 158, 1, 0),
(3720, 158, 2, 1),
(3721, 158, 3, 1),
(3722, 158, 4, 1),
(3723, 158, 1, 0),
(3724, 158, 2, 1),
(3725, 158, 3, 1),
(3726, 158, 4, 1),
(3727, 158, 1, 0),
(3728, 158, 2, 1),
(3729, 158, 3, 1),
(3730, 158, 4, 1),
(3731, 158, 1, 0),
(3732, 158, 2, 1),
(3733, 158, 3, 1),
(3734, 158, 4, 1),
(3735, 158, 1, 0),
(3736, 158, 2, 1),
(3737, 158, 3, 1),
(3738, 158, 4, 1),
(3739, 158, 1, 0),
(3740, 158, 2, 1),
(3741, 158, 3, 1),
(3742, 158, 4, 1),
(3743, 158, 1, 0),
(3744, 158, 2, 1),
(3745, 158, 3, 1),
(3746, 158, 4, 1),
(3747, 158, 1, 0),
(3748, 158, 2, 1),
(3749, 158, 3, 1),
(3750, 158, 4, 1),
(3751, 158, 1, 0),
(3752, 158, 2, 1),
(3753, 158, 3, 1),
(3754, 158, 4, 1),
(3755, 158, 1, 0),
(3756, 158, 2, 1),
(3757, 158, 3, 1),
(3758, 158, 4, 1),
(3759, 158, 1, 0),
(3760, 158, 2, 1),
(3761, 158, 3, 1),
(3762, 158, 4, 1),
(3763, 158, 1, 0),
(3764, 158, 2, 1),
(3765, 158, 3, 1),
(3766, 158, 4, 1),
(3767, 158, 1, 0),
(3768, 158, 2, 1),
(3769, 158, 3, 1),
(3770, 158, 4, 1),
(3771, 158, 1, 0),
(3772, 158, 2, 1),
(3773, 158, 3, 1),
(3774, 158, 4, 1),
(3775, 158, 1, 0),
(3776, 158, 2, 1),
(3777, 158, 3, 1),
(3778, 158, 4, 1),
(3779, 158, 1, 0),
(3780, 158, 2, 1),
(3781, 158, 3, 1),
(3782, 158, 4, 1),
(3783, 158, 1, 0),
(3784, 158, 2, 1),
(3785, 158, 3, 1),
(3786, 158, 4, 1),
(3787, 158, 1, 0),
(3788, 158, 2, 1),
(3789, 158, 3, 1),
(3790, 158, 4, 1),
(3791, 158, 1, 0),
(3792, 158, 2, 1),
(3793, 158, 3, 1),
(3794, 158, 4, 1),
(3795, 158, 1, 0),
(3796, 158, 2, 1),
(3797, 158, 3, 1),
(3798, 158, 4, 1),
(3799, 158, 1, 0),
(3800, 158, 2, 1),
(3801, 158, 3, 1),
(3802, 158, 4, 1),
(3803, 158, 1, 0),
(3804, 158, 2, 1),
(3805, 158, 3, 1),
(3806, 158, 4, 1),
(3807, 158, 1, 0),
(3808, 158, 2, 1),
(3809, 158, 3, 1),
(3810, 158, 4, 1),
(3811, 158, 1, 0),
(3812, 158, 2, 1),
(3813, 158, 3, 1),
(3814, 158, 4, 1),
(3815, 158, 1, 0),
(3816, 158, 2, 1),
(3817, 158, 3, 1),
(3818, 158, 4, 1),
(3819, 158, 1, 0),
(3820, 158, 2, 1),
(3821, 158, 3, 1),
(3822, 158, 4, 1),
(3823, 158, 1, 0),
(3824, 158, 2, 1),
(3825, 158, 3, 1),
(3826, 158, 4, 1),
(3827, 158, 1, 0),
(3828, 158, 2, 1),
(3829, 158, 3, 1),
(3830, 158, 4, 1),
(3831, 158, 1, 0),
(3832, 158, 2, 1),
(3833, 158, 3, 1),
(3834, 158, 4, 1),
(3835, 158, 1, 0),
(3836, 158, 2, 1),
(3837, 158, 3, 1),
(3838, 158, 4, 1),
(3839, 158, 1, 0),
(3840, 158, 2, 1),
(3841, 158, 3, 1),
(3842, 158, 4, 1),
(3843, 158, 1, 0),
(3844, 158, 2, 1),
(3845, 158, 3, 1),
(3846, 158, 4, 1),
(3847, 158, 1, 0),
(3848, 158, 2, 1),
(3849, 158, 3, 1),
(3850, 158, 4, 1),
(3851, 158, 1, 0),
(3852, 158, 2, 1),
(3853, 158, 3, 1),
(3854, 158, 4, 1),
(3855, 158, 1, 0),
(3856, 158, 2, 1),
(3857, 158, 3, 1),
(3858, 158, 4, 1),
(3859, 158, 1, 0),
(3860, 158, 2, 1),
(3861, 158, 3, 1),
(3862, 158, 4, 1),
(3863, 158, 1, 0),
(3864, 158, 2, 1),
(3865, 158, 3, 1),
(3866, 158, 4, 1),
(3867, 158, 1, 0),
(3868, 158, 2, 1),
(3869, 158, 3, 1),
(3870, 158, 4, 1),
(3871, 158, 1, 0),
(3872, 158, 2, 1),
(3873, 158, 3, 1),
(3874, 158, 4, 1),
(3875, 158, 1, 0),
(3876, 158, 2, 1),
(3877, 158, 3, 1),
(3878, 158, 4, 1),
(3879, 158, 1, 0),
(3880, 158, 2, 1),
(3881, 158, 3, 1),
(3882, 158, 4, 1),
(3883, 158, 1, 0),
(3884, 158, 2, 1),
(3885, 158, 3, 1),
(3886, 158, 4, 1),
(3887, 158, 1, 0),
(3888, 158, 2, 1),
(3889, 158, 3, 1),
(3890, 158, 4, 1),
(3891, 158, 1, 0),
(3892, 158, 2, 1),
(3893, 158, 3, 1),
(3894, 158, 4, 1),
(3895, 158, 1, 0),
(3896, 158, 2, 1),
(3897, 158, 3, 1),
(3898, 158, 4, 1),
(3899, 158, 1, 0),
(3900, 158, 2, 1),
(3901, 158, 3, 1),
(3902, 158, 4, 1),
(3903, 158, 1, 0),
(3904, 158, 2, 1),
(3905, 158, 3, 1),
(3906, 158, 4, 1),
(3907, 158, 1, 0),
(3908, 158, 2, 1),
(3909, 158, 3, 1),
(3910, 158, 4, 1),
(3911, 158, 1, 0),
(3912, 158, 2, 1),
(3913, 158, 3, 1),
(3914, 158, 4, 1),
(3915, 158, 1, 0),
(3916, 158, 2, 1),
(3917, 158, 3, 1),
(3918, 158, 4, 1),
(3919, 158, 1, 0),
(3920, 158, 2, 1),
(3921, 158, 3, 1),
(3922, 158, 4, 1),
(3923, 158, 1, 0),
(3924, 158, 2, 1),
(3925, 158, 3, 1),
(3926, 158, 4, 1),
(3927, 158, 1, 0),
(3928, 158, 2, 1),
(3929, 158, 3, 1),
(3930, 158, 4, 1),
(3931, 158, 1, 0),
(3932, 158, 2, 1),
(3933, 158, 3, 1),
(3934, 158, 4, 1),
(3935, 158, 1, 0),
(3936, 158, 2, 1),
(3937, 158, 3, 1),
(3938, 158, 4, 1),
(3939, 158, 1, 0),
(3940, 158, 2, 1),
(3941, 158, 3, 1),
(3942, 158, 4, 1),
(3943, 158, 1, 0),
(3944, 158, 2, 1),
(3945, 158, 3, 1),
(3946, 158, 4, 1),
(3947, 158, 1, 0),
(3948, 158, 2, 1),
(3949, 158, 3, 1),
(3950, 158, 4, 1),
(3951, 158, 1, 0),
(3952, 158, 2, 1),
(3953, 158, 3, 1),
(3954, 158, 4, 1),
(3955, 158, 1, 0),
(3956, 158, 2, 1),
(3957, 158, 3, 1),
(3958, 158, 4, 1),
(3959, 158, 1, 0),
(3960, 158, 2, 1),
(3961, 158, 3, 1),
(3962, 158, 4, 1),
(3963, 158, 1, 0),
(3964, 158, 2, 1),
(3965, 158, 3, 1),
(3966, 158, 4, 1),
(3967, 158, 1, 0),
(3968, 158, 2, 1),
(3969, 158, 3, 1),
(3970, 158, 4, 1),
(3971, 158, 1, 0),
(3972, 158, 2, 1),
(3973, 158, 3, 1),
(3974, 158, 4, 1),
(3975, 158, 1, 0),
(3976, 158, 2, 1),
(3977, 158, 3, 1),
(3978, 158, 4, 1),
(3979, 158, 1, 0),
(3980, 158, 2, 1),
(3981, 158, 3, 1),
(3982, 158, 4, 1),
(3983, 158, 1, 0),
(3984, 158, 2, 1),
(3985, 158, 3, 1),
(3986, 158, 4, 1),
(3987, 158, 1, 0),
(3988, 158, 2, 1),
(3989, 158, 3, 1),
(3990, 158, 4, 1),
(3991, 158, 1, 0),
(3992, 158, 2, 1),
(3993, 158, 3, 1),
(3994, 158, 4, 1),
(3995, 158, 1, 0),
(3996, 158, 2, 1),
(3997, 158, 3, 1),
(3998, 158, 4, 1),
(3999, 158, 1, 0),
(4000, 158, 2, 1),
(4001, 158, 3, 1),
(4002, 158, 4, 1),
(4003, 158, 1, 0),
(4004, 158, 2, 1),
(4005, 158, 3, 1),
(4006, 158, 4, 1),
(4007, 158, 1, 0),
(4008, 158, 2, 1),
(4009, 158, 3, 1),
(4010, 158, 4, 1),
(4011, 158, 1, 0),
(4012, 158, 2, 1),
(4013, 158, 3, 1),
(4014, 158, 4, 1),
(4015, 158, 1, 0),
(4016, 158, 2, 1),
(4017, 158, 3, 1),
(4018, 158, 4, 1),
(4019, 158, 1, 0),
(4020, 158, 2, 1),
(4021, 158, 3, 1),
(4022, 158, 4, 1),
(4023, 158, 1, 0),
(4024, 158, 2, 1),
(4025, 158, 3, 1),
(4026, 158, 4, 1),
(4027, 158, 1, 0),
(4028, 158, 2, 1),
(4029, 158, 3, 1),
(4030, 158, 4, 1),
(4031, 158, 1, 0),
(4032, 158, 2, 1),
(4033, 158, 3, 1),
(4034, 158, 4, 1),
(4035, 158, 1, 0),
(4036, 158, 2, 1),
(4037, 158, 3, 1),
(4038, 158, 4, 1),
(4039, 158, 1, 0),
(4040, 158, 2, 1),
(4041, 158, 3, 1),
(4042, 158, 4, 1),
(4043, 158, 1, 0),
(4044, 158, 2, 1),
(4045, 158, 3, 1),
(4046, 158, 4, 1),
(4047, 158, 1, 0),
(4048, 158, 2, 1),
(4049, 158, 3, 1),
(4050, 158, 4, 1),
(4051, 158, 1, 0),
(4052, 158, 2, 1),
(4053, 158, 3, 1),
(4054, 158, 4, 1),
(4055, 158, 1, 0),
(4056, 158, 2, 1),
(4057, 158, 3, 1),
(4058, 158, 4, 1),
(4059, 158, 1, 0),
(4060, 158, 2, 1),
(4061, 158, 3, 1),
(4062, 158, 4, 1),
(4063, 158, 1, 0),
(4064, 158, 2, 1),
(4065, 158, 3, 1),
(4066, 158, 4, 1),
(4067, 158, 1, 0),
(4068, 158, 2, 1),
(4069, 158, 3, 1),
(4070, 158, 4, 1),
(4071, 158, 1, 0),
(4072, 158, 2, 1),
(4073, 158, 3, 1),
(4074, 158, 4, 1),
(4075, 158, 1, 0),
(4076, 158, 2, 1),
(4077, 158, 3, 1),
(4078, 158, 4, 1),
(4079, 158, 1, 0),
(4080, 158, 2, 1),
(4081, 158, 3, 1),
(4082, 158, 4, 1),
(4083, 158, 1, 0),
(4084, 158, 2, 1),
(4085, 158, 3, 1),
(4086, 158, 4, 1),
(4087, 158, 1, 0),
(4088, 158, 2, 1),
(4089, 158, 3, 1),
(4090, 158, 4, 1),
(4091, 158, 1, 0),
(4092, 158, 2, 1),
(4093, 158, 3, 1),
(4094, 158, 4, 1),
(4095, 158, 1, 0),
(4096, 158, 2, 1),
(4097, 158, 3, 1),
(4098, 158, 4, 1),
(4099, 158, 1, 0),
(4100, 158, 2, 1),
(4101, 158, 3, 1),
(4102, 158, 4, 1),
(4103, 158, 1, 0),
(4104, 158, 2, 1),
(4105, 158, 3, 1),
(4106, 158, 4, 1),
(4107, 158, 1, 0),
(4108, 158, 2, 1),
(4109, 158, 3, 1),
(4110, 158, 4, 1),
(4111, 158, 1, 0),
(4112, 158, 2, 1),
(4113, 158, 3, 1),
(4114, 158, 4, 1),
(4115, 158, 1, 0),
(4116, 158, 2, 1),
(4117, 158, 3, 1),
(4118, 158, 4, 1),
(4119, 158, 1, 0),
(4120, 158, 2, 1),
(4121, 158, 3, 1),
(4122, 158, 4, 1),
(4123, 158, 1, 0),
(4124, 158, 2, 1),
(4125, 158, 3, 1),
(4126, 158, 4, 1),
(4127, 158, 1, 0),
(4128, 158, 2, 1),
(4129, 158, 3, 1),
(4130, 158, 4, 1),
(4131, 158, 1, 0),
(4132, 158, 2, 1),
(4133, 158, 3, 1),
(4134, 158, 4, 1),
(4135, 158, 1, 0),
(4136, 158, 2, 1),
(4137, 158, 3, 1),
(4138, 158, 4, 1),
(4139, 158, 1, 0),
(4140, 158, 2, 1),
(4141, 158, 3, 1),
(4142, 158, 4, 1),
(4143, 158, 1, 0),
(4144, 158, 2, 1),
(4145, 158, 3, 1),
(4146, 158, 4, 1),
(4147, 158, 1, 0),
(4148, 158, 2, 1),
(4149, 158, 3, 1),
(4150, 158, 4, 1),
(4151, 158, 1, 0),
(4152, 158, 2, 1),
(4153, 158, 3, 1),
(4154, 158, 4, 1),
(4155, 158, 1, 0),
(4156, 158, 2, 1),
(4157, 158, 3, 1),
(4158, 158, 4, 1),
(4159, 158, 1, 0),
(4160, 158, 2, 1),
(4161, 158, 3, 1),
(4162, 158, 4, 1),
(4163, 158, 1, 0),
(4164, 158, 2, 1),
(4165, 158, 3, 1),
(4166, 158, 4, 1),
(4167, 158, 1, 0),
(4168, 158, 2, 1),
(4169, 158, 3, 1),
(4170, 158, 4, 1),
(4171, 158, 1, 0),
(4172, 158, 2, 1),
(4173, 158, 3, 1),
(4174, 158, 4, 1),
(4175, 158, 1, 0),
(4176, 158, 2, 1),
(4177, 158, 3, 1),
(4178, 158, 4, 1),
(4179, 158, 1, 0),
(4180, 158, 2, 1),
(4181, 158, 3, 1),
(4182, 158, 4, 1),
(4183, 158, 1, 0),
(4184, 158, 2, 1),
(4185, 158, 3, 1),
(4186, 158, 4, 1),
(4187, 158, 1, 0),
(4188, 158, 2, 1),
(4189, 158, 3, 1),
(4190, 158, 4, 1),
(4191, 158, 1, 0),
(4192, 158, 2, 1),
(4193, 158, 3, 1),
(4194, 158, 4, 1),
(4195, 158, 1, 0),
(4196, 158, 2, 1),
(4197, 158, 3, 1),
(4198, 158, 4, 1),
(4199, 158, 1, 0),
(4200, 158, 2, 1),
(4201, 158, 3, 1),
(4202, 158, 4, 1),
(4203, 158, 1, 0),
(4204, 158, 2, 1),
(4205, 158, 3, 1),
(4206, 158, 4, 1),
(4207, 158, 1, 0),
(4208, 158, 2, 1),
(4209, 158, 3, 1),
(4210, 158, 4, 1),
(4211, 158, 1, 0),
(4212, 158, 2, 1),
(4213, 158, 3, 1),
(4214, 158, 4, 1),
(4215, 158, 1, 0),
(4216, 158, 2, 1),
(4217, 158, 3, 1),
(4218, 158, 4, 1),
(4219, 158, 1, 0),
(4220, 158, 2, 1),
(4221, 158, 3, 1),
(4222, 158, 4, 1),
(4223, 158, 1, 0),
(4224, 158, 2, 1),
(4225, 158, 3, 1),
(4226, 158, 4, 1),
(4227, 158, 1, 0),
(4228, 158, 2, 1),
(4229, 158, 3, 1),
(4230, 158, 4, 1),
(4231, 158, 1, 0),
(4232, 158, 2, 1),
(4233, 158, 3, 1),
(4234, 158, 4, 1),
(4235, 158, 1, 0),
(4236, 158, 2, 1),
(4237, 158, 3, 1),
(4238, 158, 4, 1),
(4239, 158, 1, 0),
(4240, 158, 2, 1),
(4241, 158, 3, 1),
(4242, 158, 4, 1),
(4243, 158, 1, 0),
(4244, 158, 2, 1),
(4245, 158, 3, 1),
(4246, 158, 4, 1),
(4247, 158, 1, 0),
(4248, 158, 2, 1),
(4249, 158, 3, 1),
(4250, 158, 4, 1),
(4251, 158, 1, 0),
(4252, 158, 2, 1),
(4253, 158, 3, 1),
(4254, 158, 4, 1),
(4255, 158, 1, 0),
(4256, 158, 2, 1),
(4257, 158, 3, 1),
(4258, 158, 4, 1),
(4259, 158, 1, 0),
(4260, 158, 2, 1),
(4261, 158, 3, 1),
(4262, 158, 4, 1),
(4263, 158, 1, 0),
(4264, 158, 2, 1),
(4265, 158, 3, 1),
(4266, 158, 4, 1),
(4267, 158, 1, 0),
(4268, 158, 2, 1),
(4269, 158, 3, 1),
(4270, 158, 4, 1),
(4271, 158, 1, 0),
(4272, 158, 2, 1),
(4273, 158, 3, 1),
(4274, 158, 4, 1),
(4275, 158, 1, 0),
(4276, 158, 2, 1),
(4277, 158, 3, 1),
(4278, 158, 4, 1),
(4279, 158, 1, 0),
(4280, 158, 2, 1),
(4281, 158, 3, 1),
(4282, 158, 4, 1),
(4283, 158, 1, 0),
(4284, 158, 2, 1),
(4285, 158, 3, 1),
(4286, 158, 4, 1),
(4287, 158, 1, 0),
(4288, 158, 2, 1),
(4289, 158, 3, 1),
(4290, 158, 4, 1),
(4291, 158, 1, 0),
(4292, 158, 2, 1),
(4293, 158, 3, 1),
(4294, 158, 4, 1),
(4295, 158, 1, 0),
(4296, 158, 2, 1),
(4297, 158, 3, 1),
(4298, 158, 4, 1),
(4299, 158, 1, 0),
(4300, 158, 2, 1),
(4301, 158, 3, 1),
(4302, 158, 4, 1),
(4303, 158, 1, 0),
(4304, 158, 2, 1),
(4305, 158, 3, 1),
(4306, 158, 4, 1),
(4307, 158, 1, 0),
(4308, 158, 2, 1),
(4309, 158, 3, 1),
(4310, 158, 4, 1),
(4311, 158, 1, 0),
(4312, 158, 2, 1),
(4313, 158, 3, 1),
(4314, 158, 4, 1),
(4315, 158, 1, 0),
(4316, 158, 2, 1),
(4317, 158, 3, 1),
(4318, 158, 4, 1),
(4319, 158, 1, 0),
(4320, 158, 2, 1),
(4321, 158, 3, 1),
(4322, 158, 4, 1),
(4323, 158, 1, 0),
(4324, 158, 2, 1),
(4325, 158, 3, 1),
(4326, 158, 4, 1),
(4327, 158, 1, 0),
(4328, 158, 2, 1),
(4329, 158, 3, 1),
(4330, 158, 4, 1),
(4331, 158, 1, 0),
(4332, 158, 2, 1),
(4333, 158, 3, 1),
(4334, 158, 4, 1),
(4335, 158, 1, 0),
(4336, 158, 2, 1),
(4337, 158, 3, 1),
(4338, 158, 4, 1),
(4339, 158, 1, 0),
(4340, 158, 2, 1),
(4341, 158, 3, 1),
(4342, 158, 4, 1),
(4343, 158, 1, 0),
(4344, 158, 2, 1),
(4345, 158, 3, 1),
(4346, 158, 4, 1),
(4347, 158, 1, 0),
(4348, 158, 2, 1),
(4349, 158, 3, 1),
(4350, 158, 4, 1),
(4351, 158, 1, 0),
(4352, 158, 2, 1),
(4353, 158, 3, 1),
(4354, 158, 4, 1),
(4355, 158, 1, 0),
(4356, 158, 2, 1),
(4357, 158, 3, 1),
(4358, 158, 4, 1),
(4359, 158, 1, 0),
(4360, 158, 2, 1),
(4361, 158, 3, 1),
(4362, 158, 4, 1),
(4363, 158, 1, 0),
(4364, 158, 2, 1),
(4365, 158, 3, 1),
(4366, 158, 4, 1),
(4367, 158, 1, 0),
(4368, 158, 2, 1),
(4369, 158, 3, 1),
(4370, 158, 4, 1),
(4371, 158, 1, 0),
(4372, 158, 2, 1),
(4373, 158, 3, 1),
(4374, 158, 4, 1),
(4375, 158, 1, 0),
(4376, 158, 2, 1),
(4377, 158, 3, 1),
(4378, 158, 4, 1),
(4379, 158, 1, 0),
(4380, 158, 2, 1),
(4381, 158, 3, 1),
(4382, 158, 4, 1),
(4383, 158, 1, 0),
(4384, 158, 2, 1),
(4385, 158, 3, 1),
(4386, 158, 4, 1),
(4387, 158, 1, 0),
(4388, 158, 2, 1),
(4389, 158, 3, 1),
(4390, 158, 4, 1),
(4391, 158, 1, 0),
(4392, 158, 2, 1),
(4393, 158, 3, 1),
(4394, 158, 4, 1),
(4395, 158, 1, 0),
(4396, 158, 2, 1),
(4397, 158, 3, 1),
(4398, 158, 4, 1),
(4399, 158, 1, 0),
(4400, 158, 2, 1),
(4401, 158, 3, 1),
(4402, 158, 4, 1),
(4403, 158, 1, 0),
(4404, 158, 2, 1),
(4405, 158, 3, 1),
(4406, 158, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_orders` int(11) NOT NULL,
  `id_orders_2` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_sales` int(11) NOT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `pembeli` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_pembeli` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_pembeli` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bukan_member` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `no_hp` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `kodepos` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT NULL,
  `tgl_order` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `jam_order` time DEFAULT NULL,
  `nominal` double NOT NULL,
  `ongkir` double NOT NULL,
  `saldo` double NOT NULL,
  `selisih` double NOT NULL,
  `biaya_lain` double NOT NULL COMMENT 'isi biaya cod',
  `subtotal` double NOT NULL,
  `laba` double NOT NULL,
  `bayar` double NOT NULL,
  `diskon_member` int(11) NOT NULL,
  `kembali` double NOT NULL,
  `laba_bersih` double NOT NULL,
  `valid` int(11) NOT NULL,
  `media` int(11) DEFAULT NULL COMMENT 'wa = 1, shopee = 2, tokopedia = 3, cod = 4',
  `tanggal_transfer` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bank` int(11) DEFAULT NULL,
  `email` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `tanggal_lahir` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1 = menunggu admin, 2 = diproses, 3 = dikirim, 4 = selesai, 5 = request cancel, 6 = canceled',
  `no_resi` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `id_expedisi` int(11) DEFAULT NULL,
  `keterangan` text COLLATE latin1_general_ci,
  `d_nama` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `d_alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `d_hp` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `koli` int(11) NOT NULL,
  `p_nama` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `p_alamat` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `p_hp` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `nominal_transfer` double NOT NULL,
  `nominal_split` double NOT NULL,
  `diskon` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
`id_orders` int(11) NOT NULL,
  `id_orders_2` int(11) NOT NULL,
  `id_orders_sales` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `pil_harga` int(11) NOT NULL,
  `jumlah` double(5,0) NOT NULL,
  `jumlah_bonus` double NOT NULL,
  `harga_satuan` double NOT NULL,
  `harga_jual` double NOT NULL,
  `id_karyawan` int(5) DEFAULT NULL,
  `diskon` double NOT NULL,
  `diskon2` double NOT NULL,
  `diskon3` double NOT NULL,
  `potongan` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `json` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `harga_satuan_2` double DEFAULT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_lainnya`
--

CREATE TABLE IF NOT EXISTS `orders_lainnya` (
`id` int(11) NOT NULL,
  `id_orders` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `no_nota` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_pil_penjualan_lainnya` int(11) NOT NULL,
  `barang` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `nama_pembeli` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `no_hp` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_pembeli` varchar(150) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_sales_temp`
--

CREATE TABLE IF NOT EXISTS `orders_sales_temp` (
`id` int(11) NOT NULL,
  `id_orders_temp` int(5) NOT NULL,
  `tgl` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` bigint(20) NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` int(11) DEFAULT NULL,
  `diskon2` int(11) DEFAULT NULL,
  `diskon3` int(11) DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `acc_sales` int(11) NOT NULL,
  `acc_admin` int(11) NOT NULL,
  `selesai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_stok`
--

CREATE TABLE IF NOT EXISTS `orders_stok` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `id_orders_2` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `orders_stok`
--
DELIMITER //
CREATE TRIGGER `ondelete` AFTER DELETE ON `orders_stok`
 FOR EACH ROW BEGIN
UPDATE stok_produk sp SET sp.stok = sp.stok + OLD.jumlah WHERE sp.id_produk = OLD.id_produk AND sp.id_pembelian = OLD.id_pembelian;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
`id_orders_temp` int(11) NOT NULL,
  `id_orders_sales` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` bigint(20) NOT NULL,
  `pil_harga` int(11) NOT NULL,
  `jumlah` double NOT NULL,
  `jumlah_bonus` double NOT NULL,
  `diskon` float DEFAULT NULL,
  `diskon2` float DEFAULT NULL,
  `diskon3` float DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `harga_jual` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders_verifikasi`
--

CREATE TABLE IF NOT EXISTS `orders_verifikasi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_orders` int(11) DEFAULT NULL,
  `tgl_kirim` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `panduan`
--

CREATE TABLE IF NOT EXISTS `panduan` (
`id` int(11) NOT NULL,
  `versi_aipos` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `src` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panduan`
--

INSERT INTO `panduan` (`id`, `versi_aipos`, `level`, `src`, `keterangan`) VALUES
(1, 1, 1, 'assets/pdf/masuk.pdf', 'PDF PANDUAN DAFTAR'),
(2, 2, 1, 'assets/pdf/masuk.pdf', 'PDF PANDUAN DAFTAR'),
(3, 1, 1, 'assets/pdf/retail/admin.pdf', 'PDF PANDUAN ADMIN'),
(4, 1, 2, 'assets/pdf/retail/kasir.pdf', 'PDF PANDUAN KASIR'),
(5, 2, 1, 'assets/pdf/restaurant/admin.pdf', 'PDF PANDUAN ADMIN'),
(6, 2, 2, 'assets/pdf/restaurant/kasir.pdf', 'PDF PANDUAN KASIR'),
(7, 2, 3, 'assets/pdf/restaurant/pelayan.pdf', 'PDF PANDUAN PELAYAN');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `id_harga` int(11) NOT NULL,
  `deposit` double DEFAULT NULL,
  `tgl_lahir` varchar(30) DEFAULT NULL,
  `desa` varchar(50) DEFAULT NULL,
  `pekerjaan` int(11) DEFAULT NULL,
  `jk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_faktur` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_expire` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `id_supplier` int(11) NOT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `total_bayar` double NOT NULL,
  `ppn` double NOT NULL,
  `harga_satuan_2` double DEFAULT NULL,
  `mig` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_temp`
--

CREATE TABLE IF NOT EXISTS `pembelian_temp` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_temp_update`
--

CREATE TABLE IF NOT EXISTS `pembelian_temp_update` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_faktur` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `harga_satuan` double NOT NULL,
  `jumlah` double NOT NULL,
  `diskon` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pembelian_temp_update`
--

INSERT INTO `pembelian_temp_update` (`id`, `id_users`, `id_toko`, `id_faktur`, `id_pembelian`, `id_produk`, `expire_date`, `harga_satuan`, `jumlah`, `diskon`, `subtotal`) VALUES
(1, 1, 158, 1, 1, 1, '07-03-2099', 3000000, 1, 0, 3000000),
(2, 1, 158, 1, 2, 2, '07-03-2099', 44444, 1, 0, 44444),
(3, 1, 158, 1, 3, 3, '07-03-2099', 50000, 1, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_akuntansi`
--

CREATE TABLE IF NOT EXISTS `pengaturan_akuntansi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `kode` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_jurnal`
--

CREATE TABLE IF NOT EXISTS `pengaturan_jurnal` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_pil_jurnal` int(11) DEFAULT NULL,
  `id_akun` int(11) DEFAULT NULL,
  `debet` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_jurnal`
--

INSERT INTO `pengaturan_jurnal` (`id`, `id_toko`, `id_pil_jurnal`, `id_akun`, `debet`, `kredit`) VALUES
(1, 13, 1, 1, 1, 0),
(2, 13, 1, 11, 1, 0),
(3, 13, 1, 15, 1, 0),
(4, 13, 1, 21, 1, 0),
(5, 13, 1, 1, 0, 1),
(6, 13, 1, 11, 0, 1),
(7, 13, 1, 15, 0, 1),
(8, 13, 1, 21, 0, 1),
(9, 13, 4, 1, 1, 0),
(10, 13, 4, 1, 0, 1),
(11, 13, 5, 1, 1, 0),
(12, 13, 5, 1, 0, 1),
(15, 53, 2, 0, 1, 0),
(16, 53, 2, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan_transaksi`
--

CREATE TABLE IF NOT EXISTS `pengaturan_transaksi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `menu_proses` varchar(100) DEFAULT NULL,
  `kode` text
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan_transaksi`
--

INSERT INTO `pengaturan_transaksi` (`id`, `id_toko`, `menu_proses`, `kode`) VALUES
(1, 158, 'penjualan', '@NOFAKTUR: = @NO_FAKTUR:;\r\n@IDPROSES: = @ID_ORDERS:;\r\n\r\nif (@JENIS_PEMBAYARAN: == 1) { // tunai\r\n  @KODEJURNAL: = "PENJUALAN-TUNAI-".@NO_FAKTUR:;\r\n  @DEBET:("1.01.03.04", @TOTAL_NOMINAL:); // KAS OUTLET\r\n  @DEBET:("4.03", @TOTAL_HPP:); // HPP\r\n  @KREDIT:("4.02.01", @ONGKIR:);\r\n  @KREDIT:("3.03.01", @TOTAL_NOMINAL:-@ONGKIR:); // Penjualan\r\n  @KREDIT:("1.01.04", @TOTAL_HPP:); // Persediaan\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: == 2) { // kredit\r\n  @KODEJURNAL: = "PENJUALAN-KREDIT-".@NO_FAKTUR:;\r\n  @IDPIUTANG: = @ID_PIUTANG:;\r\n  if (!empty(@MEMBER_UID:)) {\r\n    @DEBET:(@GETACCOUNTFROMID:(''piutang'', @MEMBER_UID:), @TOTAL_NOMINAL:); // piutang\r\n  } else {\r\n    @DEBET:("1.01.02.01", @TOTAL_NOMINAL:); // Piutang\r\n  }\r\n  @DEBET:("4.03", @TOTAL_HPP:); // HPP\r\n  @KREDIT:("4.02.01", @ONGKIR:);\r\n  @KREDIT:("3.03.01", @TOTAL_NOMINAL:-@ONGKIR:); // Penjualan\r\n  @KREDIT:("1.01.04", @TOTAL_HPP:); // Persediaan\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: == 3) {\r\n  @KODEJURNAL: = "PENJUALAN-TRANSFER-".@NO_FAKTUR:;\r\n  @DEBET:("4.03", @TOTAL_HPP:); // HPP\r\n  @DEBET:(@GETACCOUNTFROMID:(''bank'', @ID_BANK:), @TOTAL_NOMINAL:); // HPP\r\n  @KREDIT:("4.02.01", @ONGKIR:);\r\n  @KREDIT:("3.03.01", @TOTAL_NOMINAL:-@ONGKIR:); // Penjualan\r\n  @KREDIT:("1.01.04", @TOTAL_HPP:); // Persediaan\r\n}\r\n'),
(2, 158, 'fakturpembelian', '@KODEJURNAL: = "FAKTUR-PEMBELIAN";\r\n@IDPROSES: = @ID_FAKTUR:;\r\n@NOFAKTUR: = @NO_FAKTUR:;\r\n\r\nif (@JENIS_PEMBAYARAN: == 1) { // TUNAI\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: == 2) { // KREDIT\r\n}'),
(3, 158, 'piutang', '// if jika no invoice 2 / 3 kredit piutang marketplace\r\n\r\nif (@ID_MEDIA: == "2" || @ID_MEDIA: == "3") {\r\n  @KODEJURNAL: = "PELUNASAN-MP-".@NO_FAKTUR:;\r\n  @DEBET:("1.01.03.01.02", @NOMINAL_BAYAR:); // BANK BRI\r\n  @KREDIT:("1.01.02.05", @NOMINAL_BAYAR:+@ONGKIR:); // PIUTANG MARKETPLCAE\r\n  @DEBET:("3.03.03", @ONGKIR:); // ONGKIR\r\n\r\n} else {\r\n  @KODEJURNAL: = "PELUNASAN-".@NO_FAKTUR:;\r\n  @TANGGAL: = @TGL_BAYAR:;\r\n  @DEBET:("1.01.03.01.02", @NOMINAL_BAYAR:); // BANK BRI\r\n  if (!empty(@MEMBER_UID:)) {\r\n    @KREDIT:(@GETACCOUNTFROMID:(''piutang'', @MEMBER_UID:), @NOMINAL_BAYAR:+@ONGKIR:); // PIUTANG MEMBER\r\n  } else {\r\n    @KREDIT:("1.01.02.02", @MEMBER_UID:); // PIUTANG COD\r\n  }\r\n  @DEBET:("3.03.03", @ONGKIR:); // ONGKIR\r\n\r\n}\r\n'),
(4, 158, 'pembelian', '@IDPROSES: = @ID_FAKTUR:;\r\n@IDHUTANG: = @ID_HUTANG:;\r\n@NOFAKTUR: = @NO_FAKTUR:;\r\n@TANGGAL:  = @TGL:;\r\n\r\nif (@JENIS_PEMBAYARAN: == 1) { // hutang / kredit\r\n  @KODEJURNAL: = "PEMBELIAN-KREDIT";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("2.01", @TOTAL_BAYAR:); // HUTANG\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: != 1) { // tunai\r\n  @KODEJURNAL: = "PEMBELIAN-TUNAI";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("1.01.03.02", @TOTAL_BAYAR:); // KAS\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n'),
(5, 158, 'hutang', '@KODEJURNAL: = "HUTANG-BAYAR";\r\n\r\n@KREDIT:("1.01.03.02", @NOMINAL_BAYAR:); // Kas besar\r\n@DEBET:("2.01", @NOMINAL_BAYAR:); // Hutang Dagang'),
(6, 158, 'buatretur', '@KODEJURNAL: = "RETUR-PEMBELIAN";\r\n@IDPROSES: = @ID_FAKTUR:;\r\n\r\nif (@JENIS_PEMBAYARAN_PEMBELIAN:=="1") { // HUTANG/KREDIT DARI PEMBELIAN\r\n  @DEBET:(@GETACCOUNTFROMID:(''supplier'', @ID_SUPPLIER:), @NOMINAL_RETUR:); // Hutang Supplier\r\n  @KREDIT:(''1.01.04'', @NOMINAL_RETUR:); // Persediaan\r\n} else {\r\n  @DEBET:(''1.01.03.02'', @NOMINAL_RETUR:); // Kas Besar\r\n  @KREDIT:(''1.01.04'', @NOMINAL_RETUR:); // Persediaan\r\n}'),
(7, 158, 'verifikasibayar', '@KODEJURNAL: = "VER-PEMBAYARAN-".@NO_INVOICE:."";\r\n@TANGGAL: = @TGL:;\r\n\r\nif (@ID_MEDIA: == "1") {\r\n    @DEBET:(@GETACCOUNTFROMID:("bank", @ID_BANK:), @NOMINAL_ONGKIR:); // BANK\r\n    @KREDIT:("3.03.03", @ONGKIR:); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n\r\n} else if (@ID_MEDIA: == "2" || @ID_MEDIA: == "3") {\r\n    @DEBET:("1.01.02.05", @NOMINAL_ONGKIR:); // PIUTANG Marketplace\r\n    @KREDIT:("3.03.03", @ONGKIR:); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n\r\n} else {\r\n    @DEBET:("1.01.02.02", @NOMINAL_ONGKIR:); // PIUTANG COD\r\n    @KREDIT:("3.03.03", @ONGKIR:+@BIAYA_LAIN); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n}'),
(8, 158, 'buatreturjual', '@KODEJURNAL: = "RETUR-JUAL";\r\n\r\nif (@JENIS: == "manual") {\r\n\r\n  if (@PILIHAN:==0) {\r\n    @KREDIT:("1.01.02.02", @TOTAL:); // PIUTANG COD\r\n    @DEBET:("1.01.04", @TOTAL_HPP:); // PERSEDIAAN\r\n    @DEBET:("4.04", @TOTAL:); // RETUR COD\r\n    @KREDIT:("4.03", @TOTAL_HPP:); // HPP\r\n  } else {\r\n    @KREDIT:("1.01.03.03", @TOTAL:); // KAS KECIL\r\n    @DEBET:("1.01.04", @TOTAL_HPP:); // PERSEDIAAN\r\n    @DEBET:("4.04", @TOTAL:); // RETUR COD\r\n    @KREDIT:("4.03", @TOTAL_HPP:); // HPP\r\n  }\r\n\r\n} else {\r\n\r\n  if (@PEMBAYARAN:=="5") { // COD\r\n    @KODEJURNAL: = "RETUR-COD-".@NO_FAKTUR:;\r\n    @DEBET:("4.04", @TOTAL:); // RETUR COD\r\n    @DEBET:("1.01.04", @TOTAL_HPP:); // PERSEDIAAN\r\n    @KREDIT:("1.01.02.02", @TOTAL:+@ONGKIR:); // PIUTANG COD\r\n    @KREDIT:("4.03", @TOTAL_HPP:); // HPP\r\n    @DEBET:("3.03.03", @ONGKIR:); // ONGKIR\r\n\r\n  } else if (@PEMBAYARAN:=="6") { // GARANSI\r\n    @KODEJURNAL: = "RETUR-GARANSI-".@NO_FAKTUR:;\r\n    @KREDIT:("1.01.03.03", @TOTAL:); // KAS KECIL\r\n    @DEBET:("4.04", @TOTAL:); // RETUR COD\r\n  }\r\n\r\n}\r\n'),
(9, 158, 'saldoterbuka', '@KODEJURNAL: = "VER-SALDO-TERBUKA-".@NO_INVOICE:."";\r\n@TANGGAL: = @TGL:;\r\n\r\nif (@ID_MEDIA: == "1") {\r\n    @DEBET:(@GETACCOUNTFROMID:("bank2", @ID_BANK:), @NOMINAL_ONGKIR:); // BANK SALDO TERBUKA\r\n    @KREDIT:("3.03.03", @ONGKIR:); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n\r\n} else if (@ID_MEDIA: == "2" || @ID_MEDIA: == "3") {\r\n    @DEBET:("1.01.02.05", @NOMINAL_ONGKIR:); // PIUTANG Marketplace\r\n    @KREDIT:("3.03.03", @ONGKIR:); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n\r\n} else {\r\n    @DEBET:("1.01.02.02", @NOMINAL_ONGKIR:); // PIUTANG COD\r\n    @KREDIT:("3.03.03", @ONGKIR:+@BIAYA_LAIN); // Ongkir\r\n    @KREDIT:("3.03.01", @NOMINAL_ONGKIR:-@ONGKIR:); // Penjualan Barang\r\n    @DEBET:("4.03", @NOMINAL_HPP:);\r\n    @KREDIT:("1.01.04", @NOMINAL_HPP:);\r\n}'),
(10, 158, 'pembelianproduksi', '@IDPROSES: = @ID_FAKTUR:;\r\n@IDHUTANG: = @ID_HUTANG:;\r\n@NOFAKTUR: = @NO_FAKTUR:;\r\n@TANGGAL:  = @TGL:;\r\n\r\nif (@JENIS_PEMBAYARAN: == 1) { // hutang / kredit\r\n  @KODEJURNAL: = "PEMBELIAN-PRO-KREDIT";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("2.01", @TOTAL_BAYAR:); // HUTANG\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: != 1) { // tunai\r\n  @KODEJURNAL: = "PEMBELIAN-PRO-TUNAI";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("1.01.03.02", @TOTAL_BAYAR:); // KAS\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n'),
(11, 158, 'pembeliankonsinyasi', '@IDPROSES: = @ID_FAKTUR:;\r\n@IDHUTANG: = @ID_HUTANG:;\r\n@NOFAKTUR: = @NO_FAKTUR:;\r\n@TANGGAL:  = @TGL:;\r\n\r\nif (@JENIS_PEMBAYARAN: == 1) { // hutang / kredit\r\n  @KODEJURNAL: = "PEMBELIAN-KONSINYASI-KREDIT";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("2.01", @TOTAL_BAYAR:); // HUTANG\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n\r\nif (@JENIS_PEMBAYARAN: != 1) { // tunai\r\n  @KODEJURNAL: = "PEMBELIAN-KONSINYASI-TUNAI";\r\n  @DEBET:("1.01.04", @TOTAL_BAYAR:); // Persediaan\r\n  // @DEBET:("2.04", @NOMINAL_PPN:); // PPn Keluaran\r\n  @KREDIT:("1.01.03.02", @TOTAL_BAYAR:); // KAS\r\n  // @KREDIT:("1.01.03.05", @NOMINAL_DISKON:); // DISKON\r\n}\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan`
--

CREATE TABLE IF NOT EXISTS `pengemasan` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) NOT NULL,
  `tgl_produksi` varchar(30) NOT NULL,
  `progress` int(11) DEFAULT NULL,
  `catatan` text,
  `karyawan_masuk` int(11) NOT NULL,
  `karyawan_tidak_masuk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengemasan`
--

INSERT INTO `pengemasan` (`id`, `id_toko`, `id_users`, `tgl`, `tgl_produksi`, `progress`, `catatan`, `karyawan_masuk`, `karyawan_tidak_masuk`) VALUES
(1, 158, 2, '20-08-2019', '20-08-2019', 20, 'a', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan_barang`
--

CREATE TABLE IF NOT EXISTS `pengemasan_barang` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_pengemasan` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pengemasan_barang`
--

INSERT INTO `pengemasan_barang` (`id`, `id_toko`, `id_users`, `id_pengemasan`, `id_produk`, `posisi`, `expire_date`, `cup`, `rusak`, `total`, `sisa_kemarin`, `ambil_baru`, `sisa`, `terpakai`) VALUES
(131, 158, 2, 1, 21, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(132, 158, 2, 1, 22, 0, NULL, 116, 0, 116, 0, 0, 0, 0),
(133, 158, 2, 1, 23, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(134, 158, 2, 1, 24, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(135, 158, 2, 1, 25, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(136, 158, 2, 1, 35, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(137, 158, 2, 1, 40, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(138, 158, 2, 1, 41, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(139, 158, 2, 1, 42, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(140, 158, 2, 1, 43, 1, NULL, 0, 0, 0, 0, 5, 1, 4),
(141, 158, 2, 1, 44, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(142, 158, 2, 1, 45, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(143, 158, 2, 1, 46, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(144, 158, 2, 1, 26, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(145, 158, 2, 1, 27, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(146, 158, 2, 1, 28, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(147, 158, 2, 1, 29, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(148, 158, 2, 1, 30, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(149, 158, 2, 1, 31, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(150, 158, 2, 1, 32, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(151, 158, 2, 1, 33, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(152, 158, 2, 1, 34, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(153, 158, 2, 1, 37, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(154, 158, 2, 1, 38, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(155, 158, 2, 1, 39, 2, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan_barang_temp`
--

CREATE TABLE IF NOT EXISTS `pengemasan_barang_temp` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pengemasan_barang_temp`
--

INSERT INTO `pengemasan_barang_temp` (`id`, `id_toko`, `id_users`, `id_produk`, `posisi`, `expire_date`, `cup`, `rusak`, `total`, `sisa_kemarin`, `ambil_baru`, `sisa`, `terpakai`) VALUES
(235, 158, 2, 21, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(236, 158, 2, 22, 0, NULL, 116, 0, 116, 0, 0, 0, 0),
(237, 158, 2, 23, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(238, 158, 2, 24, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(239, 158, 2, 25, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(240, 158, 2, 35, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(241, 158, 2, 40, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(242, 158, 2, 41, 1, NULL, 0, 0, 0, 1, 0, 0, 0),
(243, 158, 2, 42, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(244, 158, 2, 43, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(245, 158, 2, 44, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(246, 158, 2, 45, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(247, 158, 2, 46, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(248, 158, 2, 26, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(249, 158, 2, 27, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(250, 158, 2, 28, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(251, 158, 2, 29, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(252, 158, 2, 30, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(253, 158, 2, 31, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(254, 158, 2, 32, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(255, 158, 2, 33, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(256, 158, 2, 34, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(257, 158, 2, 36, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(258, 158, 2, 37, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(259, 158, 2, 38, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(260, 158, 2, 39, 2, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan_barang_update`
--

CREATE TABLE IF NOT EXISTS `pengemasan_barang_update` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_pengemasan` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `posisi` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `cup` double NOT NULL,
  `rusak` double NOT NULL,
  `total` double NOT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=360 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `pengemasan_barang_update`
--

INSERT INTO `pengemasan_barang_update` (`id`, `id_toko`, `id_users`, `id_pengemasan`, `id_produk`, `posisi`, `expire_date`, `cup`, `rusak`, `total`, `sisa_kemarin`, `ambil_baru`, `sisa`, `terpakai`) VALUES
(335, 158, 2, 1, 21, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(336, 158, 2, 1, 22, 0, NULL, 116, 0, 116, 0, 0, 0, 0),
(337, 158, 2, 1, 23, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(338, 158, 2, 1, 24, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(339, 158, 2, 1, 25, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(340, 158, 2, 1, 35, 0, NULL, 0, 0, 0, 0, 0, 0, 0),
(341, 158, 2, 1, 40, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(342, 158, 2, 1, 41, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(343, 158, 2, 1, 42, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(344, 158, 2, 1, 43, 1, NULL, 0, 0, 0, 0, 5, 1, 4),
(345, 158, 2, 1, 44, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(346, 158, 2, 1, 45, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(347, 158, 2, 1, 46, 1, NULL, 0, 0, 0, 0, 0, 0, 0),
(348, 158, 2, 1, 26, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(349, 158, 2, 1, 27, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(350, 158, 2, 1, 28, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(351, 158, 2, 1, 29, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(352, 158, 2, 1, 30, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(353, 158, 2, 1, 31, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(354, 158, 2, 1, 32, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(355, 158, 2, 1, 33, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(356, 158, 2, 1, 34, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(357, 158, 2, 1, 37, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(358, 158, 2, 1, 38, 2, NULL, 0, 0, 0, 0, 0, 0, 0),
(359, 158, 2, 1, 39, 2, NULL, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengemasan_karyawan`
--

CREATE TABLE IF NOT EXISTS `pengemasan_karyawan` (
`id` int(11) NOT NULL,
  `id_pengemasan` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengemasan_karyawan`
--

INSERT INTO `pengemasan_karyawan` (`id`, `id_pengemasan`, `id_users`) VALUES
(91, 1, 6),
(92, 1, 7),
(93, 1, 8),
(94, 1, 9),
(95, 1, 10),
(96, 1, 11),
(97, 1, 12),
(98, 1, 13),
(99, 1, 14),
(100, 1, 15),
(101, 1, 16),
(102, 1, 17),
(103, 1, 18),
(104, 1, 19),
(105, 1, 20),
(106, 1, 21),
(107, 1, 22),
(108, 1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `penguji`
--

CREATE TABLE IF NOT EXISTS `penguji` (
`id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nama_usaha` varchar(100) DEFAULT NULL,
  `deskripsi_usaha` text,
  `pendidikan` int(11) DEFAULT NULL,
  `lama_usaha` varchar(30) DEFAULT NULL,
  `jabatan` varchar(20) DEFAULT NULL,
  `hp_wa` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
`id` int(11) NOT NULL,
  `id_toko` bigint(20) DEFAULT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `tgl` varchar(30) NOT NULL DEFAULT '',
  `id_menu` int(11) DEFAULT NULL,
  `nm_menu` varchar(30) NOT NULL DEFAULT '',
  `harga` varchar(30) NOT NULL DEFAULT '',
  `id_member` int(11) DEFAULT NULL,
  `nm_orang` varchar(30) NOT NULL DEFAULT '',
  `jumlah` varchar(30) NOT NULL DEFAULT '',
  `total_bayar` varchar(30) NOT NULL DEFAULT '',
  `ket` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyesuaian_stok`
--

CREATE TABLE IF NOT EXISTS `penyesuaian_stok` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `tgl_penyesuaian` varchar(30) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pil_bank`
--

CREATE TABLE IF NOT EXISTS `pil_bank` (
`id` int(11) NOT NULL,
  `bank` varchar(30) DEFAULT NULL,
  `no_rek` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_bank`
--

INSERT INTO `pil_bank` (`id`, `bank`, `no_rek`) VALUES
(1, 'BRI', NULL),
(3, 'BCA', NULL),
(4, 'MANDIRI', '4234');

-- --------------------------------------------------------

--
-- Table structure for table `pil_jurnal`
--

CREATE TABLE IF NOT EXISTS `pil_jurnal` (
`id` int(11) NOT NULL,
  `kode` varchar(50) DEFAULT NULL,
  `nama_jurnal` varchar(100) DEFAULT NULL,
  `active` varchar(20) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_jurnal`
--

INSERT INTO `pil_jurnal` (`id`, `kode`, `nama_jurnal`, `active`, `link`) VALUES
(1, 'RT-JU', 'Umum', 'active_rtju', 'jurnal_retail/umum_create'),
(2, 'RT-JKM', 'Penerimaan Kas', 'active_rtjkm', 'jurnal_retail/penerimaan_kas_create'),
(3, 'RT-JKK', 'Pengeluaran Kas', 'active_rtjkk', 'jurnal_retail/pengeluaran_kas_create'),
(4, 'RT-JBP', 'Pembayaran Piutang', 'active_rtjbp', 'jurnal_retail/bayar_piutang_create'),
(5, 'RT-JBH', 'Pembayaran Hutang', 'active_rtjbh', 'jurnal_retail/bayar_hutang_create');

-- --------------------------------------------------------

--
-- Table structure for table `pil_media`
--

CREATE TABLE IF NOT EXISTS `pil_media` (
`id` int(11) NOT NULL,
  `media` varchar(30) DEFAULT NULL,
  `scheme` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_media`
--

INSERT INTO `pil_media` (`id`, `media`, `scheme`) VALUES
(1, 'Whatsapp', 'success'),
(4, 'COD', 'primary');

-- --------------------------------------------------------

--
-- Table structure for table `pil_menu`
--

CREATE TABLE IF NOT EXISTS `pil_menu` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_parent` int(11) NOT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `var_active` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `pil_menu`
--

INSERT INTO `pil_menu` (`id`, `id_toko`, `id_parent`, `nama_menu`, `controller`, `var_active`, `icon`, `status`) VALUES
(1, 158, 0, 'Dashboard', 'admin', 'active_home', 'home', 0),
(2, 158, 0, 'Penjualan', '#', '', 'shopping-cart', 0),
(3, 158, 2, 'Order Sales', 'admin/order_sales', 'active_order_sales', 'caret-right', 0),
(4, 158, 2, 'Order Sales DIterima', 'admin/order_sales/diterima', 'active_order_sales_diterima', 'caret-right', 0),
(5, 158, 2, 'Penjualan', 'admin/penjualan_retail/create', 'active_penjualan_create', 'caret-right', 0),
(6, 158, 2, 'Retur Penjualan', 'admin/retur_jual', 'active_retur_penjualan', 'caret-right', 0),
(7, 158, 2, 'Retur Penjualan Manual', 'admin/retur_jual2/create', 'active_retur_penjualan_manual_create', 'caret-right', 0),
(8, 158, 0, 'Pembelian', '#', '', 'gift', 0),
(9, 158, 8, 'Pembelian Langsung', 'admin/pembelian_produk_langsung/create', 'active_pembelian_create', 'caret-right', 0),
(10, 158, 8, 'Pembelian Dari Produksi', 'admin/pembelian/create/produksi', 'active_pembelian_produksi_create', 'caret-right', 0),
(11, 158, 8, 'Pembelian Konsinyasi', 'admin/pembelian/create/konsinyasi', 'active_pembelian_konsinyasi_create', 'caret-right', 0),
(12, 158, 8, 'Retur Pembelian', 'admin/retur/create', 'active_retur_pembelian_create', 'caret-right', 0),
(13, 158, 0, 'Jurnal\r\n', '#', '', 'flag', 1),
(14, 158, 13, 'Data Akun', 'admin/akun_retail', 'active_akun', 'caret-right', 1),
(15, 158, 13, 'Pengaturan Transaksi', 'admin/pengaturan_transaksi', 'active_pengaturan_transaksi', 'caret-right', 1),
(16, 158, 13, 'Pilihan Transaksi', 'admin/pil_transaksi', 'active_pil_transaksi', 'caret-right', 1),
(17, 158, 13, 'Buat Jurnal', 'admin/jurnal_retail/buat_jurnal', 'active_buat_jurnal', 'caret-right', 1),
(18, 158, 13, 'Buat Jurnal Manual', 'admin/jurnal/create', 'active_jurnal_create', 'caret-right', 1),
(19, 158, 13, 'Data Jurnal', 'admin/jurnal', 'active_jurnal_list', 'caret-right', 1),
(20, 158, 13, 'Penyesuaian Jurnal', 'admin/penyesuaian_jurnal', 'active_peny_jurnal', 'caret-right', 1),
(21, 158, 0, 'Manajemen Data', '#', '', 'hdd-o', 0),
(22, 158, 21, 'Salesman', 'admin/pegawai_retail', 'active_pegawai', 'caret-right', 0),
(23, 158, 21, 'Pelanggan', 'admin/member_retail', 'active_pelanggan', 'caret-right', 0),
(24, 158, 21, 'Penjualan', 'admin/penjualan_retail', 'active_penjualan', 'caret-right', 0),
(25, 158, 21, 'Pembelian', 'admin/pembelian', 'active_pembelian', 'caret-right', 0),
(26, 158, 21, 'Bank', 'admin/pil_bank', 'active_bank', 'caret-right', 0),
(27, 158, 21, 'Piutang Marketplace', 'admin/piutang_retail', 'active_piutang', 'caret-right', 0),
(28, 158, 21, 'Piutang', 'admin/piutang2', 'active_piutang2', 'caret-right', 0),
(29, 158, 21, 'Hutang', 'admin/hutang_retail', 'active_hutang', 'caret-right', 0),
(30, 158, 21, 'Supplier', 'admin/supplier_retail', 'active_supplier', 'caret-right', 0),
(31, 158, 21, 'Validasi Data', 'admin/validasi', 'active_validasi', 'caret-right', 0),
(32, 158, 0, 'Manajemen Produk', '#', '', 'inbox', 0),
(33, 158, 32, 'Data Produk', 'admin/produk_retail', 'active_produk', 'caret-right', 0),
(34, 158, 32, 'Kategori Produk', 'admin/kategori_produk_retail', 'active_kategori_produk', 'caret-right', 0),
(35, 158, 32, 'Satuan Produk', 'admin/satuan_produk', 'active_satuan_produk', 'caret-right', 0),
(36, 158, 37, 'Penyesuaian Stok', 'admin/penyesuaian_stok', 'active_penyesuaian_stok', 'caret-right', 0),
(37, 158, 0, 'Data Stok', '#', '', 'clock-o', 0),
(38, 158, 37, 'Mutasi Stok', 'admin/mutasi_stok', 'active_mutasi_stok', 'caret-right', 0),
(39, 158, 37, 'Data Stok', 'admin/laporan_retail/stok_produk', 'active_stok_gudang', 'caret-right', 0),
(40, 158, 0, 'Laporan', '#', '', 'list', 0),
(41, 158, 40, 'Stok Produk', 'admin/laporan_retail/stok_produk', 'active_lap_stok_produk', 'caret-right', 0),
(42, 158, 40, 'Stok Mati', 'admin/laporan_retail/stok_mati', 'active_lap_stok_mati', 'caret-right', 0),
(43, 158, 40, 'Penjualan', 'admin/laporan_retail/penjualan', 'active_lap_penjualan', 'caret-right', 0),
(44, 158, 40, 'Pembelian', 'admin/laporan_retail/pembelian', 'active_lap_pembelian', 'caret-right', 0),
(45, 158, 40, 'Retur Penjualan', 'admin/laporan_retur', 'active_lap_retur_penjualan', 'caret-right', 0),
(46, 158, 40, 'Pelunasan Marketplace', 'admin/laporan_piutang', 'active_lap_piutang_c', 'caret-right', 0),
(47, 158, 40, 'Piutang Reseller', 'admin/laporan_retail/piutang', 'active_lap_piutang', 'caret-right', 0),
(48, 158, 40, 'Hutang', 'admin/laporan_retail/hutang', 'active_lap_hutang', 'caret-right', 0),
(49, 158, 40, 'Kasir', 'admin/laporan_retail/kasir', 'active_lap_kasir', 'caret-right', 0),
(50, 158, 40, 'Buku Besar 1', 'admin/laporan_retail/buku_besar_1', 'active_lap_bukubesar_1', 'caret-right', 1),
(51, 158, 40, 'Buku Besar 2', 'admin/laporan_retail/buku_besar_2', 'active_lap_bukubesar_2', 'caret-right', 1),
(52, 158, 40, 'Neraca', 'admin/laporan_retail/neraca', 'active_lap_neraca', 'caret-right', 1),
(53, 158, 40, 'Laba Rugi', 'admin/laporan_retail/labarugi', 'active_lap_labarugi', 'caret-right', 1),
(54, 158, 0, 'Laporan Tambahan', 'admin/laporan', 'active_lap2', 'list', 0),
(55, 158, 0, 'Manajemen Sales', '#', '', 'shopping-cart', 0),
(56, 158, 55, 'Group Advertising CS', 'admin/group_cs', 'active_group_cs', 'caret-right', 0),
(57, 158, 55, 'Group Produk CS', 'admin/group_produk_cs', 'active_group_produk_cs', 'caret-right', 0),
(58, 158, 0, 'Laporan Aktivitas CS', '#', '', 'clipboard', 0),
(59, 158, 58, 'Laporan CS', 'admin/laporan_cs/aktivitas', 'active_aktivitas_cs', 'caret-right', 0),
(60, 158, 58, 'Laporan Total', 'admin/laporan_cs/aktivitas_total', 'active_aktivitas_total_cs', 'caret-right', 0),
(61, 158, 58, 'Laporan Total By Sistem', 'admin/laporan_cs/aktivitas_total_sistem', 'active_aktivitas_total_cs_sistem', 'caret-right', 0),
(62, 158, 58, 'Laporan Bulanan', 'admin/laporan_cs/aktivitas_bulanan', 'active_aktivitas_bulanan', 'caret-right', 0),
(63, 158, 58, 'Laporan Harian', 'admin/laporan_cs/aktivitas_harian', 'active_aktivitas_harian', 'caret-right', 0),
(64, 158, 0, 'Laporan Order CS', 'admin/laporan_cs', 'active_order_cs', 'edit', 0),
(65, 158, 0, 'Packing', '#', '', 'gift', 1),
(66, 158, 65, 'Packing Order', 'admin/packing', 'active_packing', 'caret-right', 1),
(67, 158, 0, 'Unduh Excel', 'admin/excel', 'active_unduh_excel', 'file', 0),
(68, 158, 0, 'Analisa', '#', '', 'book', 1),
(69, 158, 68, 'Grafik', 'admin/grafik', 'active_grafik', 'caret-right', 1),
(70, 158, 68, 'Penjualan Supplier', 'admin/principal', 'active_principal', 'caret-right', 1),
(71, 158, 68, 'Analisa Supplier', 'admin/principal/timeseries', 'active_principal_timeseries', 'caret-right', 1),
(72, 158, 68, 'Analisa Produk', 'admin/analisa/produk', 'active_analisa_produk', 'caret-right', 1),
(73, 158, 68, 'Analisa Sales', 'admin/analisa/salesman', 'active_analisa_sales', 'caret-right', 1),
(74, 158, 0, 'Pengaturan', '#', '', 'cogs', 0),
(75, 158, 74, 'Printer', 'admin/printer_retail', 'active_printer', 'caret-right', 0),
(76, 158, 74, 'Pengguna', 'admin/user_retail', 'active_user', 'caret-right', 0),
(77, 158, 74, 'Reset Data', 'admin/reset_retail', 'active_reset', 'caret-right', 0),
(78, 158, 74, 'Lain lain', 'admin/pengaturan/lain_lain', 'active_lain_lain', 'caret-right', 0),
(79, 158, 74, 'Setting Menu', 'admin/pil_menu', 'active_pil_menu', 'caret-right', 0),
(80, 158, 0, 'Catatan Kas', '#', 'active_kas', 'exchange', 0),
(82, 158, 80, 'Pemasukan', 'admin/arus_kas/masuk', 'active_arus_kas_masuk', 'download', 0),
(83, 158, 80, 'Pengeluaran', NULL, NULL, NULL, 0),
(84, 158, 80, 'Arus Kas', NULL, NULL, NULL, 0),
(85, 158, 80, 'Pengeluaran', 'admin/arus_kas/keluar', 'active_arus_kas_keluar', 'download', 0),
(86, 158, 80, 'Arus Kas', 'admin/arus_kas/arus', 'active_arus_kas', 'download', 0),
(87, 158, 0, 'Beban', NULL, 'beban_active', 'user', 0),
(88, 158, 87, 'Karyawan', 'admin/pegawai_beban/karyawan', 'beban_karyawan_active', 'download', 0),
(89, 158, 87, 'Bukan Karyawan', 'admin/pegawai_beban/non_karyawan', 'beban_non_karyawan_active', 'download', 0),
(90, 158, 8, 'Pembelian', 'admin/pembelian/create', 'active_pembelian_create', 'caret-right', 0),
(91, 158, 0, 'Data Stok', '#', 'active_data_stok', 'clock-o', 0),
(92, 158, 91, 'Mutasi Stok', 'admin/mutasi_stok', 'active_data_stok', 'caret-right', 0),
(93, 158, 0, 'Tukar Tambah', 'admin/tukarphone', 'active_tukar_phone', 'exchange', 0),
(94, 158, 37, 'Mutasi Stok', 'admin/produk_retail_mutasi', 'active_data_stok', 'caret-right', 0),
(95, 158, 40, 'Retur Pembelian', 'admin/retur/', 'active_retur_pembelian', 'caret-right', 0),
(96, 158, 40, 'Retur Pembelian', 'admin/retur', 'active_retur_pembelian', 'caret-right', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pil_modul`
--

CREATE TABLE IF NOT EXISTS `pil_modul` (
`id` int(11) NOT NULL,
  `nama_modul` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_modul`
--

INSERT INTO `pil_modul` (`id`, `nama_modul`) VALUES
(1, 'FREE'),
(2, 'BASIC'),
(3, 'MEDIUM'),
(4, 'FULL'),
(5, 'FULL 2');

-- --------------------------------------------------------

--
-- Table structure for table `pil_pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pil_pekerjaan` (
`id` int(11) NOT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_pekerjaan`
--

INSERT INTO `pil_pekerjaan` (`id`, `pekerjaan`) VALUES
(1, 'Belum / Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar / Mahasiswa'),
(4, 'Pensiunan'),
(5, 'Pegawai Negeri Sipil'),
(6, 'Tentara Nasional Indonesia'),
(7, 'Kepolisian RI'),
(8, 'Perdagangan'),
(9, 'Petani / Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan / Perikanan'),
(12, 'Industri'),
(13, 'Konstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Karyawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian Lepas'),
(20, 'Buruh Tani / Perkebunan'),
(21, 'Buruh Nelayan / Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las / Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Penata Rambut'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Mekanik'),
(35, 'Tukang Gigi'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penterjemah'),
(41, 'Imam Masjid'),
(42, 'Pendeta'),
(43, 'Pastur'),
(44, 'Wartawan'),
(45, 'Ustadz / Mubaligh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahkamah Konstitusi'),
(54, 'Anggota Kabinet / Kementerian'),
(55, 'Duta Besar'),
(56, 'Gubernur'),
(57, 'Wakil Gubernur'),
(58, 'Bupati'),
(59, 'Wakil Bupati'),
(60, 'Walikota'),
(61, 'Wakil Walikota'),
(62, 'Anggota DPRD Propinsi'),
(63, 'Anggota DPRD Kabupaten / Kota'),
(64, 'Dosen'),
(65, 'Guru'),
(66, 'Pilot'),
(67, 'Pengacara'),
(68, 'Notaris'),
(69, 'Arsitek'),
(70, 'Akuntan'),
(71, 'Konsultan'),
(72, 'Dokter'),
(73, 'Bidan'),
(74, 'Perawat'),
(75, 'Apoteker'),
(76, 'Psikiater / Psikolog'),
(77, 'Penyiar Televisi'),
(78, 'Penyiar Radio'),
(79, 'Pelaut'),
(80, 'Peneliti'),
(81, 'Sopir'),
(82, 'Pialang'),
(83, 'Paranormal'),
(84, 'Pedagang'),
(85, 'Perangkat Desa'),
(86, 'Kepala Desa'),
(87, 'Biarawati'),
(88, 'Wiraswasta');

-- --------------------------------------------------------

--
-- Table structure for table `pil_penjualan_lainnya`
--

CREATE TABLE IF NOT EXISTS `pil_penjualan_lainnya` (
`id` int(11) NOT NULL,
  `penjualan_lainnya` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_penjualan_lainnya`
--

INSERT INTO `pil_penjualan_lainnya` (`id`, `penjualan_lainnya`) VALUES
(1, 'Parkir');

-- --------------------------------------------------------

--
-- Table structure for table `pil_transaksi`
--

CREATE TABLE IF NOT EXISTS `pil_transaksi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `kode_transaksi` varchar(255) DEFAULT NULL,
  `nama_transaksi` varchar(255) DEFAULT NULL,
  `id_debet` int(11) DEFAULT NULL,
  `id_kredit` int(11) DEFAULT NULL,
  `id_pil_transaksi` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pil_transaksi`
--

INSERT INTO `pil_transaksi` (`id`, `id_toko`, `kode_transaksi`, `nama_transaksi`, `id_debet`, `id_kredit`, `id_pil_transaksi`) VALUES
(1, 158, 'Bayar Gaji Karyawan', 'Bayar Gaji Karyawan', 82, 12, 0),
(2, 158, 'Pengeluaran di bawah 500k', 'Pengeluaran di bawah 500k', 69, 13, 0),
(3, 158, 'Pembelian Peralatan', 'Pembelian Peralatan', 26, 12, 0),
(4, 158, 'Pembelian Perlengkapan', 'Pembelian Perlengkapan', 31, 12, 0),
(5, 158, 'Pembelian Carica', 'Pembelian Carica', 17, 12, 0),
(6, 158, 'Bayar LIstrik', 'Bayar LIstrik', 57, 12, 0),
(7, 158, 'Promosi', 'Promosi', 90, 12, 0),
(8, 158, 'Pindah Kas', 'Pindah Kas', 14, 12, 0),
(9, 158, 'Hutang Karyawan', 'Hutang Karyawan', 34, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE IF NOT EXISTS `piutang` (
`id` int(11) NOT NULL,
  `id_piutang` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `jumlah_hutang` double DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `tanggal` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `deadline` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_order` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piutang_bayar`
--

CREATE TABLE IF NOT EXISTS `piutang_bayar` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_piutang` int(11) DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `ket` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piutang_list`
--

CREATE TABLE IF NOT EXISTS `piutang_list` (
`id` int(11) NOT NULL,
  `id_piutang` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_pembeli` int(11) DEFAULT NULL,
  `jumlah_hutang` double DEFAULT NULL,
  `jumlah_bayar` double DEFAULT NULL,
  `sisa` double DEFAULT NULL,
  `tanggal` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `deadline` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `tgl_order` varchar(30) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `printer_mode`
--

CREATE TABLE IF NOT EXISTS `printer_mode` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `opsi` int(3) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `printer_mode`
--

INSERT INTO `printer_mode` (`id`, `id_toko`, `id_user`, `opsi`) VALUES
(1, 158, 1, 2),
(6, 158, 2, 2),
(7, 158, 3, 2),
(8, 158, 4, 2),
(9, 158, 5, 2),
(10, 158, 5, 2),
(11, 158, 6, 2),
(12, 158, 7, 2),
(13, 158, 8, 2),
(14, 158, 9, 2),
(15, 158, 10, 2),
(16, 158, 11, 2),
(17, 158, 12, 2),
(18, 158, 5, 2),
(19, 158, 6, 2),
(20, 158, 7, 2),
(21, 158, 8, 2),
(22, 158, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE IF NOT EXISTS `produksi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) NOT NULL,
  `pengupasan_mulai` varchar(30) NOT NULL,
  `pengupasan_selesai` varchar(30) DEFAULT NULL,
  `pengepresan_mulai` varchar(30) DEFAULT NULL,
  `pengepresan_selesai` varchar(30) DEFAULT NULL,
  `catatan` text,
  `karyawan_masuk` int(11) NOT NULL,
  `karyawan_tidak_masuk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id`, `id_toko`, `id_users`, `tgl`, `pengupasan_mulai`, `pengupasan_selesai`, `pengepresan_mulai`, `pengepresan_selesai`, `catatan`, `karyawan_masuk`, `karyawan_tidak_masuk`) VALUES
(1, 158, 2, '18-08-2019', '9:24:00', '9:24:00', '9:24:00', '9:24:00', '', 0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `produksi_barang`
--

CREATE TABLE IF NOT EXISTS `produksi_barang` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produksi` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `rusak` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_barang_temp`
--

CREATE TABLE IF NOT EXISTS `produksi_barang_temp` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `rusak` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_barang_update`
--

CREATE TABLE IF NOT EXISTS `produksi_barang_update` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produksi` int(11) DEFAULT NULL,
  `id_produk` int(11) NOT NULL,
  `expire_date` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `sisa_kemarin` double NOT NULL,
  `ambil_baru` double NOT NULL,
  `sisa` double NOT NULL,
  `rusak` double NOT NULL,
  `terpakai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produksi_karyawan`
--

CREATE TABLE IF NOT EXISTS `produksi_karyawan` (
`id` int(11) NOT NULL,
  `id_produksi` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_restaurant`
--

CREATE TABLE IF NOT EXISTS `produk_restaurant` (
`id_produk` int(5) NOT NULL,
  `id_toko` bigint(20) DEFAULT NULL,
  `id_supplier` int(5) NOT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci,
  `harga_beli` int(20) NOT NULL,
  `harga` int(20) NOT NULL,
  `stok` int(5) NOT NULL,
  `satuan` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(200) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_retail`
--

CREATE TABLE IF NOT EXISTS `produk_retail` (
`id_produk` int(11) NOT NULL,
  `id_produk_2` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `barcode` bigint(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(30) COLLATE latin1_general_ci DEFAULT NULL,
  `nama_produk` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `deskripsi` text COLLATE latin1_general_ci,
  `harga_1` double NOT NULL,
  `harga_2` double DEFAULT NULL,
  `harga_3` double DEFAULT NULL,
  `harga_4` double NOT NULL,
  `harga_5` double NOT NULL,
  `harga_6` double NOT NULL,
  `harga_7` double NOT NULL,
  `satuan` int(11) NOT NULL,
  `berat` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `mingros` int(11) NOT NULL,
  `diskon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `rak` int(11) DEFAULT NULL,
  `dibeli` int(5) NOT NULL DEFAULT '1',
  `gambar` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `us` int(11) NOT NULL,
  `hpp_awal` double NOT NULL,
  `stok_awal` double NOT NULL,
  `jenis` int(11) NOT NULL DEFAULT '0' COMMENT '0 PRODUK BIASA, 1 BAHAN',
  `harga_beli` double DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk_retail_mutasi`
--

CREATE TABLE IF NOT EXISTS `produk_retail_mutasi` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_users_asal` int(11) DEFAULT NULL,
  `id_users_tujuan` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `produk_retail_temp`
--

CREATE TABLE IF NOT EXISTS `produk_retail_temp` (
`id` int(11) NOT NULL,
  `id_temp` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `barcode` varchar(200) DEFAULT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `harga_1` double NOT NULL,
  `harga_2` double NOT NULL,
  `harga_3` double NOT NULL,
  `mingros` int(11) DEFAULT NULL,
  `hpp` double NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE IF NOT EXISTS `retur` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_faktur` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_pembelian` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `alasan` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_jual`
--

CREATE TABLE IF NOT EXISTS `retur_jual` (
`id` int(11) NOT NULL,
  `id_retur` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_retur` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_faktur` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_cs` int(11) DEFAULT NULL,
  `pembeli` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_pembeli` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `bukan_member` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `diskon_member` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `ppn` double NOT NULL,
  `total_ppn` double NOT NULL,
  `retur` int(11) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_jual_detail`
--

CREATE TABLE IF NOT EXISTS `retur_jual_detail` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_retur` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_orders_detail` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `pilihan` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `retur_jual_gudang_detail_temp`
--

CREATE TABLE IF NOT EXISTS `retur_jual_gudang_detail_temp` (
`id` int(11) NOT NULL,
  `id_retur` varchar(255) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_orders_detail` int(11) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `subtotal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_jual_gudang_temp`
--

CREATE TABLE IF NOT EXISTS `retur_jual_gudang_temp` (
`id` int(11) NOT NULL,
  `id_orders` int(11) DEFAULT NULL,
  `id_retur` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_retur` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `no_faktur` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `nama_kustomer` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `pembeli` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `alamat_pembeli` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `bukan_member` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `diskon_member` int(11) DEFAULT NULL,
  `total` double NOT NULL,
  `ppn` double NOT NULL,
  `total_ppn` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retur_jual_temp`
--

CREATE TABLE IF NOT EXISTS `retur_jual_temp` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_orders_detail` int(11) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `potongan` double DEFAULT NULL,
  `manual` int(11) NOT NULL,
  `pilihan` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rorders`
--

CREATE TABLE IF NOT EXISTS `rorders` (
`id_orders` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `id_meja` int(11) NOT NULL,
  `pembeli` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `bukan_member` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `pembayaran` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT NULL,
  `tgl_order` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `jam_order` time NOT NULL,
  `nominal` double DEFAULT NULL,
  `laba` double DEFAULT NULL,
  `bayar` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rorders_detail`
--

CREATE TABLE IF NOT EXISTS `rorders_detail` (
  `id_orders` bigint(20) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_meja` int(11) NOT NULL,
  `id_pelayan` int(11) DEFAULT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rorders_temp`
--

CREATE TABLE IF NOT EXISTS `rorders_temp` (
`id_orders_temp` int(5) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_meja` int(11) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `saldo_terbuka`
--

CREATE TABLE IF NOT EXISTS `saldo_terbuka` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `no_faktur` varchar(50) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `saldo_terbuka`
--

INSERT INTO `saldo_terbuka` (`id`, `id_toko`, `no_faktur`) VALUES
(1, 158, '2200403008'),
(2, 158, '2200403013');

-- --------------------------------------------------------

--
-- Table structure for table `sample_produk`
--

CREATE TABLE IF NOT EXISTS `sample_produk` (
`id` int(11) NOT NULL,
  `barcode` varchar(11) DEFAULT NULL,
  `produk` varchar(50) DEFAULT NULL,
  `kategori` int(11) DEFAULT NULL,
  `harga1` double DEFAULT NULL,
  `harga2` double DEFAULT NULL,
  `harga3` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sample_produk`
--

INSERT INTO `sample_produk` (`id`, `barcode`, `produk`, `kategori`, `harga1`, `harga2`, `harga3`) VALUES
(1, '11111111', 'Produk 1', 1, 10000, 9000, 8000),
(2, '11111112', 'Produk 2', 1, 11000, 10000, 9000),
(3, '11111113', 'Produk 3', 1, 12000, 11000, 10000),
(4, '11111114', 'Produk 4', 1, 13000, 12000, 11000),
(5, '11111115', 'Produk 5', 2, 14000, 13000, 12000),
(6, '11111116', 'Produk 6', 2, 15000, 14000, 13000),
(7, '11111117', 'Produk 7', 2, 16000, 15000, 14000),
(8, '11111118', 'Produk 8', 2, 17000, 16000, 15000),
(9, '11111119', 'Produk 9', 3, 18000, 17000, 16000),
(10, '11111120', 'Produk 10', 3, 19000, 18000, 17000),
(11, '11111121', 'Produk 11', 4, 20000, 19000, 18000),
(12, '11111122', 'Produk 12', 4, 21000, 20000, 19000),
(13, '11111123', 'Produk 13', 5, 22000, 21000, 20000),
(14, '11111124', 'Produk 14', 5, 23000, 22000, 21000),
(15, '11111125', 'Produk 15', 6, 24000, 23000, 22000),
(16, '11111126', 'Produk 16', 6, 25000, 24000, 23000),
(17, '11111127', 'Produk 17', 6, 26000, 25000, 24000),
(18, '11111128', 'Produk 18', 6, 27000, 26000, 25000),
(19, '11111129', 'Produk 19', 6, 28000, 27000, 26000),
(20, '11111130', 'Produk 20', 7, 29000, 28000, 27000),
(21, '11111131', 'Produk 21', 7, 30000, 29000, 28000),
(22, '11111132', 'Produk 22', 7, 31000, 30000, 29000),
(23, '11111133', 'Produk 23', 8, 32000, 31000, 30000),
(24, '11111134', 'Produk 24', 8, 33000, 32000, 31000),
(25, '11111135', 'Produk 25', 8, 34000, 33000, 32000),
(26, '11111136', 'Produk 26', 8, 35000, 34000, 33000),
(27, '11111137', 'Produk 27', 9, 36000, 35000, 34000),
(28, '11111138', 'Produk 28', 9, 37000, 36000, 35000),
(29, '11111139', 'Produk 29', 10, 38000, 37000, 36000),
(30, '11111140', 'Produk 30', 10, 39000, 38000, 37000),
(31, '11111141', 'Produk 31', 11, 40000, 39000, 38000),
(32, '11111142', 'Produk 32', 11, 41000, 40000, 39000),
(33, '11111143', 'Produk 33', 12, 42000, 41000, 40000),
(34, '11111144', 'Produk 34', 13, 43000, 42000, 41000),
(35, '11111145', 'Produk 35', 13, 44000, 43000, 42000),
(36, '11111146', 'Produk 36', 14, 45000, 44000, 43000),
(37, '11111147', 'Produk 37', 14, 46000, 45000, 44000),
(38, '11111148', 'Produk 38', 15, 47000, 46000, 45000),
(39, '11111149', 'Produk 39', 16, 48000, 47000, 46000),
(40, '11111150', 'Produk 40', 16, 49000, 48000, 47000);

-- --------------------------------------------------------

--
-- Table structure for table `satuan_produk`
--

CREATE TABLE IF NOT EXISTS `satuan_produk` (
`id` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `satuan` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `sub_satuan` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `satuan_produk`
--

INSERT INTO `satuan_produk` (`id`, `id_satuan`, `id_toko`, `id_users`, `satuan`, `sub_satuan`, `jumlah`) VALUES
(9, 1, 158, 1, 'Pcs', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE IF NOT EXISTS `server` (
`id` int(11) NOT NULL,
  `nama_server` varchar(30) DEFAULT NULL,
  `hostname` varchar(20) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `db_name` varchar(20) DEFAULT NULL,
  `last_update_patch` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id`, `nama_server`, `hostname`, `username`, `password`, `db_name`, `last_update_patch`) VALUES
(1, 'SERVER', 'localhost', 'root', NULL, 'arr', '10-11-2017 12:26:01');

-- --------------------------------------------------------

--
-- Table structure for table `setting_retur`
--

CREATE TABLE IF NOT EXISTS `setting_retur` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `update_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_retur`
--

INSERT INTO `setting_retur` (`id`, `id_toko`, `jenis`, `update_stok`) VALUES
(1, 158, 'jual', 0);

-- --------------------------------------------------------

--
-- Table structure for table `split_bayar`
--

CREATE TABLE IF NOT EXISTS `split_bayar` (
`id_split` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `pembayaran` int(11) NOT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `deadline` int(11) DEFAULT NULL,
  `nominal` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `split_bayar`
--

INSERT INTO `split_bayar` (`id_split`, `id_orders`, `id_toko`, `pembayaran`, `id_bank`, `deadline`, `nominal`) VALUES
(72, 9, 158, 1, 1, 0, 999999),
(73, 10, 158, 3, 3, 0, 999999),
(74, 11, 158, 2, 1, 2, 1999999);

-- --------------------------------------------------------

--
-- Table structure for table `stok_gudang`
--

CREATE TABLE IF NOT EXISTS `stok_gudang` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_gudang` int(50) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `tgl_update` varchar(30) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_produk`
--

CREATE TABLE IF NOT EXISTS `stok_produk` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_retur` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `stok_before` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=195 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok_produk`
--

INSERT INTO `stok_produk` (`id`, `id_users`, `id_toko`, `id_pembelian`, `id_retur`, `id_produk`, `stok`, `stok_before`) VALUES
(193, 2, 158, 1, NULL, 4, 1, 0),
(194, 2, 158, 2, NULL, 5, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stok_produk_mati`
--

CREATE TABLE IF NOT EXISTS `stok_produk_mati` (
`id` int(11) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga_satuan` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_so`
--

CREATE TABLE IF NOT EXISTS `stok_so` (
`id` int(11) NOT NULL,
  `id_stok_info` int(11) DEFAULT NULL,
  `tgl_so` varchar(30) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `stok_so` double DEFAULT NULL,
  `penyesuaian` double DEFAULT NULL,
  `verifikasi` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok_so_info`
--

CREATE TABLE IF NOT EXISTS `stok_so_info` (
`id` int(11) NOT NULL,
  `tgl_so` varchar(30) DEFAULT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_satuan`
--

CREATE TABLE IF NOT EXISTS `sub_satuan` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
`id_supplier` int(5) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `nama_supplier` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `kota` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `telp` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin DEFAULT NULL,
  `fax` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `cp` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `telp_cp` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `ket` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `kode_akun` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `id_toko`, `id_users`, `nama_supplier`, `alamat`, `kota`, `telp`, `fax`, `cp`, `telp_cp`, `ket`, `kode_akun`) VALUES
(123, 158, 1, 'IP STORE', 'Jl. Mawar No 04, Jakarta Barat', 'Jakarta Barat', '45345345', '6546577', '65445645', '64564566', '-', '');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_akun`
--

CREATE TABLE IF NOT EXISTS `tabel_akun` (
`id` int(11) NOT NULL,
  `jenis` int(11) DEFAULT NULL,
  `nama_akun` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tampilan`
--

CREATE TABLE IF NOT EXISTS `tampilan` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `warna` varchar(10) DEFAULT NULL,
  `navbar` varchar(20) DEFAULT NULL,
  `sidebar` varchar(20) DEFAULT NULL,
  `breadcrumbs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tampilan`
--

INSERT INTO `tampilan` (`id`, `id_toko`, `warna`, `navbar`, `sidebar`, `breadcrumbs`) VALUES
(1, 13, 'skin-3', NULL, NULL, NULL),
(2, 17, 'skin-2', NULL, NULL, NULL),
(3, 53, 'no-skin', NULL, NULL, NULL),
(4, 65, 'no-skin', NULL, NULL, NULL),
(5, 63, 'no-skin', NULL, NULL, NULL),
(6, 111, 'no-skin', NULL, NULL, NULL),
(7, 157, 'no-skin', NULL, NULL, NULL),
(8, 158, 'no-skin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE IF NOT EXISTS `toko` (
`id` int(11) NOT NULL,
  `nama_toko` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(225) CHARACTER SET latin1 DEFAULT NULL,
  `telp` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `versi_aipos` int(11) NOT NULL,
  `id_modul` int(11) DEFAULT NULL,
  `last_update` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `first_register` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `expired` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `last_sync` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `id_kota` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat`, `telp`, `versi_aipos`, `id_modul`, `last_update`, `first_register`, `expired`, `last_sync`, `foto`, `id_kota`) VALUES
(158, 'PHONE STORE', 'FACTORY OUTLET', '082137509999', 1, 3, NULL, '05-08-2019', '23-09-2025', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tukarphone`
--

CREATE TABLE IF NOT EXISTS `tukarphone` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `id_users` int(11) DEFAULT NULL,
  `tgl` varchar(30) DEFAULT NULL,
  `id_sales` int(11) DEFAULT NULL,
  `id_orders` int(11) DEFAULT NULL,
  `id_faktur` int(11) DEFAULT NULL,
  `nama_penukar` varchar(255) DEFAULT NULL,
  `alamat_penukar` varchar(255) DEFAULT NULL,
  `no_hp_penukar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
`id` int(11) NOT NULL,
  `versi_aipos` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `no` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `src` varchar(200) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`id`, `versi_aipos`, `level`, `no`, `judul`, `src`, `keterangan`) VALUES
(1, 1, 1, 1, 'TUTORIAL 1', '<iframe width="560" height="315" src="https://www.youtube.com/embed/ozAJ0spojLA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 'MENDAFTAR'),
(2, 1, 1, 2, 'TUTORIAL 2', '<iframe width="560" height="315" src="https://www.youtube.com/embed/0vzbnFh-Ik0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 'MODE ADMIN'),
(3, 1, 2, 3, 'TUTORIAL KASIR', '<iframe width="560" height="315" src="https://www.youtube.com/embed/H8EJHqgEFv4" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 'MODE KASIR'),
(4, 2, 3, 5, 'TUTORIAL PELAYAN', '<iframe width="560" height="315" src="https://www.youtube.com/embed/C0OiQOiujrg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 'MODE PELAYAN'),
(5, 2, 1, 4, 'TUTORIAL MODE ADMIN', '<iframe width="560" height="315" src="https://www.youtube.com/embed/bV2Jd-vEH34" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>', 'MODE ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `ucapan`
--

CREATE TABLE IF NOT EXISTS `ucapan` (
`id` int(11) NOT NULL,
  `id_toko` int(10) DEFAULT NULL,
  `ucapan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ucapan`
--

INSERT INTO `ucapan` (`id`, `id_toko`, `ucapan`) VALUES
(1, 158, 'Terima kasih atas kunjungan Anda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `id_users` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_cabang` int(11) DEFAULT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `active_email` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `level` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT 'users-profile.svg',
  `token` varchar(255) DEFAULT NULL,
  `onlogin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2301 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_users`, `id_toko`, `id_cabang`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `active_email`, `first_name`, `last_name`, `company`, `phone`, `alamat`, `level`, `foto`, `token`, `onlogin`) VALUES
(3, 1, 158, 1, '127.0.0.1', 'admin', '$2a$08$LqQY2J89oFycTH291fr79ufJEotKCVikla.wnvzXfIdFhlcUeW7eG', '', 'admin', '', NULL, NULL, 'g1OjsUfCcndfMhcowP8ZEu', 1268889823, 1709967440, 1, 0, 'Admin', 'PUSAT', 'ADMIN', '0', 'WONOSOBO', 1, '1572832533161-jpg.jpg', '1', '1'),
(2284, 2, 158, 2, '::1', 'cabang1@email.com', '$2y$08$pXKda7dssAYLXTUrCBgphesaSgjT/EStGo0LEsHkEEq4AKYcCBXnO', NULL, 'cabang1@email.com', NULL, NULL, NULL, NULL, 1709280955, 1709966873, 1, 0, 'CABANG1', 'TOKO', '', '0', 'WONOSOBO', 2, '', NULL, NULL),
(2285, 3, 158, 3, '::1', 'cabang2@email.com', '$2y$08$M1Bc9YTFxmi24isPcVMsQ.CFejzrB8WhluZK/V5ydB32M7AOcwZAO', NULL, 'cabang2@email.com', NULL, NULL, NULL, NULL, 1709281029, 1709865233, 1, 0, 'CABANG2', 'TOKO', '', '0', 'WONOSOBO', 2, '', NULL, NULL),
(2286, 4, 158, 4, '::1', 'cabang3@email.com', '$2y$08$E6pZMZIqRQTKtbJ1PXU9DuOfTjcU0RwvVpMAxa.RSQ4PEjJdd02Ma', NULL, 'cabang3@email.com', NULL, NULL, NULL, NULL, 1709281101, 1709803755, 1, 0, 'CABANG3', 'GUDANG', '', '0', 'BANJARNEGARA', 2, '', NULL, NULL),
(2296, 5, 158, 2, '::1', 'salescabang1@email.com', '$2y$08$Sd8VQGE96lXW/4hYMrbTj.V0BFZxfB3O.ZuA.m2Qf8TwRW8Hi1zAa', NULL, 'salescabang1@email.com', NULL, NULL, NULL, NULL, 1709887298, 1709966963, 1, 0, 'sales', 'cabang 1', '', '234234', 'Wonosobo', 8, '', NULL, NULL),
(2297, 6, 158, 1, '127.0.0.1', 'supervisor@email.com', '$2y$08$Elb.jJJKwIRFAttivFJOFeIHItj4IJlwitFfu0.oZwdiPi.R1eJEe', NULL, 'supervisor@email.com', NULL, NULL, NULL, NULL, 1709891158, 1709965951, 1, 0, 'SUPER', 'VISOR', '', '0', 'WONOSOBO', 4, '', NULL, NULL),
(2298, 7, 158, 1, '127.0.0.1', 'hrd@email.com', '$2y$08$z1IbgWGx38snLZc6FjlxN.CoG.rFEFWNFDxgYv8dzvkT4pSlryH/i', NULL, 'hrd@email.com', NULL, NULL, NULL, NULL, 1709891197, NULL, 1, 0, 'HR', 'D', '', '0', 'WONOSOBO', 5, '', NULL, NULL),
(2299, 8, 158, 1, '127.0.0.1', 'manager@email.com', '$2y$08$T9ECs3V6sUECR0E.jTfYKumx94GPxSuwu8peZMnS4LRh/WhV15Bma', NULL, 'manager@email.com', NULL, NULL, NULL, NULL, 1709891233, NULL, 1, 0, 'MANA', 'GER', '', '0', 'WONOSOBO', 6, '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2244 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 25, 2),
(4, 26, 2),
(5, 54, 2),
(6, 55, 2),
(7, 56, 2),
(8, 57, 2),
(9, 58, 2),
(10, 59, 2),
(11, 60, 2),
(12, 61, 2),
(13, 62, 2),
(14, 63, 2),
(15, 64, 2),
(16, 65, 2),
(17, 66, 2),
(18, 72, 2),
(20, 73, 2),
(21, 74, 2),
(22, 75, 2),
(23, 76, 2),
(24, 77, 2),
(25, 78, 2),
(26, 79, 2),
(27, 80, 2),
(28, 81, 2),
(29, 82, 2),
(30, 83, 2),
(31, 84, 2),
(32, 85, 2),
(33, 86, 2),
(34, 87, 2),
(35, 88, 2),
(36, 89, 2),
(37, 90, 2),
(38, 91, 2),
(39, 92, 2),
(40, 93, 2),
(41, 94, 2),
(42, 95, 2),
(43, 96, 2),
(44, 97, 2),
(45, 98, 2),
(46, 99, 2),
(47, 100, 2),
(48, 101, 2),
(49, 102, 2),
(51, 103, 2),
(50, 104, 2),
(52, 105, 2),
(53, 106, 2),
(54, 107, 2),
(55, 108, 2),
(56, 109, 2),
(57, 110, 2),
(58, 111, 2),
(59, 112, 2),
(60, 113, 2),
(61, 114, 2),
(62, 115, 2),
(63, 116, 2),
(64, 117, 2),
(65, 118, 2),
(66, 119, 2),
(67, 120, 2),
(68, 121, 2),
(69, 122, 2),
(70, 123, 2),
(71, 124, 2),
(72, 125, 2),
(73, 126, 2),
(74, 127, 2),
(75, 128, 2),
(76, 129, 2),
(77, 130, 2),
(78, 131, 2),
(79, 132, 2),
(80, 133, 2),
(81, 134, 2),
(82, 135, 2),
(83, 136, 2),
(84, 137, 2),
(85, 138, 2),
(86, 139, 2),
(87, 140, 2),
(88, 141, 2),
(89, 142, 2),
(90, 143, 2),
(91, 144, 2),
(92, 145, 2),
(93, 146, 2),
(94, 147, 2),
(95, 148, 2),
(96, 149, 2),
(97, 150, 2),
(98, 151, 2),
(99, 152, 2),
(100, 153, 2),
(101, 154, 2),
(102, 155, 2),
(104, 156, 2),
(103, 157, 2),
(105, 158, 2),
(106, 159, 2),
(107, 160, 2),
(108, 161, 2),
(109, 162, 2),
(110, 163, 2),
(111, 164, 2),
(112, 165, 2),
(113, 166, 2),
(114, 167, 2),
(115, 168, 2),
(116, 169, 2),
(117, 170, 2),
(118, 171, 2),
(119, 172, 2),
(120, 173, 2),
(121, 174, 2),
(122, 175, 2),
(123, 176, 2),
(124, 177, 2),
(125, 178, 2),
(126, 179, 2),
(127, 180, 2),
(128, 181, 2),
(129, 182, 2),
(130, 183, 2),
(131, 184, 2),
(132, 185, 2),
(133, 186, 2),
(134, 187, 2),
(135, 188, 2),
(136, 189, 2),
(137, 190, 2),
(138, 191, 2),
(139, 192, 2),
(140, 193, 2),
(141, 194, 2),
(142, 195, 2),
(143, 196, 2),
(144, 197, 2),
(145, 198, 2),
(146, 199, 2),
(147, 200, 2),
(148, 201, 2),
(149, 202, 2),
(150, 203, 2),
(151, 204, 2),
(152, 205, 2),
(153, 206, 2),
(154, 207, 2),
(155, 208, 2),
(156, 209, 2),
(157, 210, 2),
(158, 211, 2),
(159, 212, 2),
(160, 213, 2),
(161, 214, 2),
(162, 215, 2),
(163, 216, 2),
(164, 217, 2),
(165, 218, 2),
(166, 219, 2),
(167, 220, 2),
(168, 221, 2),
(169, 222, 2),
(170, 223, 2),
(171, 224, 2),
(172, 225, 2),
(173, 226, 2),
(174, 227, 2),
(175, 228, 2),
(176, 229, 2),
(177, 230, 2),
(178, 231, 2),
(179, 232, 2),
(180, 233, 2),
(181, 234, 2),
(182, 235, 2),
(183, 236, 2),
(184, 237, 2),
(185, 238, 2),
(186, 239, 2),
(187, 240, 2),
(188, 241, 2),
(189, 242, 2),
(190, 243, 2),
(191, 244, 2),
(192, 245, 2),
(193, 246, 2),
(194, 247, 2),
(195, 248, 2),
(196, 249, 2),
(197, 250, 2),
(198, 251, 2),
(199, 252, 2),
(200, 253, 2),
(201, 254, 2),
(202, 255, 2),
(203, 256, 2),
(204, 257, 2),
(205, 258, 2),
(206, 259, 2),
(207, 260, 2),
(208, 261, 2),
(209, 262, 2),
(210, 263, 2),
(211, 264, 2),
(212, 265, 2),
(213, 266, 2),
(214, 267, 2),
(215, 268, 2),
(216, 269, 2),
(217, 270, 2),
(218, 271, 2),
(219, 272, 2),
(220, 273, 2),
(221, 274, 2),
(222, 275, 2),
(223, 276, 2),
(224, 277, 2),
(225, 278, 2),
(226, 279, 2),
(227, 280, 2),
(228, 281, 2),
(229, 282, 2),
(230, 283, 2),
(231, 284, 2),
(232, 285, 2),
(233, 286, 2),
(234, 287, 2),
(235, 288, 2),
(236, 289, 2),
(237, 290, 2),
(238, 291, 2),
(239, 292, 2),
(240, 293, 2),
(241, 294, 2),
(242, 295, 2),
(243, 296, 2),
(244, 297, 2),
(245, 298, 2),
(246, 299, 2),
(247, 300, 2),
(248, 301, 2),
(249, 302, 2),
(250, 303, 2),
(251, 304, 2),
(252, 305, 2),
(253, 306, 2),
(254, 307, 2),
(255, 308, 2),
(256, 309, 2),
(257, 310, 2),
(258, 311, 2),
(259, 312, 2),
(260, 313, 2),
(261, 314, 2),
(262, 315, 2),
(263, 316, 2),
(264, 317, 2),
(265, 318, 2),
(266, 319, 2),
(267, 320, 2),
(268, 321, 2),
(269, 322, 2),
(270, 323, 2),
(271, 324, 2),
(272, 325, 2),
(273, 326, 2),
(274, 327, 2),
(275, 328, 2),
(276, 329, 2),
(277, 330, 2),
(278, 331, 2),
(279, 332, 2),
(280, 333, 2),
(281, 334, 2),
(282, 335, 2),
(283, 336, 2),
(284, 337, 2),
(287, 338, 2),
(286, 339, 2),
(285, 340, 2),
(288, 341, 2),
(289, 342, 2),
(290, 343, 2),
(291, 344, 2),
(292, 345, 2),
(293, 346, 2),
(294, 347, 2),
(295, 348, 2),
(296, 349, 2),
(297, 350, 2),
(298, 351, 2),
(299, 352, 2),
(300, 353, 2),
(301, 354, 2),
(302, 355, 2),
(303, 356, 2),
(304, 357, 2),
(305, 358, 2),
(306, 359, 2),
(307, 360, 2),
(308, 361, 2),
(309, 362, 2),
(310, 363, 2),
(311, 364, 2),
(312, 365, 2),
(313, 366, 2),
(314, 367, 2),
(315, 368, 2),
(316, 369, 2),
(317, 370, 2),
(318, 371, 2),
(319, 372, 2),
(320, 373, 2),
(321, 374, 2),
(322, 375, 2),
(323, 376, 2),
(324, 377, 2),
(325, 378, 2),
(326, 379, 2),
(327, 380, 2),
(328, 381, 2),
(329, 382, 2),
(330, 383, 2),
(331, 384, 2),
(332, 385, 2),
(333, 386, 2),
(334, 387, 2),
(335, 388, 2),
(336, 389, 2),
(337, 390, 2),
(338, 391, 2),
(339, 392, 2),
(340, 393, 2),
(341, 394, 2),
(342, 395, 2),
(343, 396, 2),
(344, 397, 2),
(345, 398, 2),
(346, 399, 2),
(347, 400, 2),
(348, 401, 2),
(349, 402, 2),
(350, 403, 2),
(351, 404, 2),
(352, 405, 2),
(353, 406, 2),
(354, 407, 2),
(355, 408, 2),
(356, 409, 2),
(357, 410, 2),
(358, 411, 2),
(359, 412, 2),
(360, 413, 2),
(361, 414, 2),
(362, 415, 2),
(363, 416, 2),
(364, 417, 2),
(365, 418, 2),
(366, 419, 2),
(367, 420, 2),
(368, 421, 2),
(369, 422, 2),
(370, 423, 2),
(371, 424, 2),
(372, 425, 2),
(373, 426, 2),
(374, 427, 2),
(375, 428, 2),
(376, 429, 2),
(377, 430, 2),
(378, 431, 2),
(379, 432, 2),
(380, 433, 2),
(381, 434, 2),
(382, 435, 2),
(383, 436, 2),
(384, 437, 2),
(385, 438, 2),
(386, 439, 2),
(387, 440, 2),
(388, 441, 2),
(389, 442, 2),
(390, 443, 2),
(391, 444, 2),
(392, 445, 2),
(393, 446, 2),
(394, 447, 2),
(395, 448, 2),
(396, 449, 2),
(397, 450, 2),
(398, 451, 2),
(399, 452, 2),
(400, 453, 2),
(401, 454, 2),
(402, 455, 2),
(403, 456, 2),
(404, 457, 2),
(405, 458, 2),
(406, 459, 2),
(407, 460, 2),
(408, 461, 2),
(409, 462, 2),
(410, 463, 2),
(411, 464, 2),
(412, 465, 2),
(413, 466, 2),
(414, 467, 2),
(415, 468, 2),
(416, 469, 2),
(417, 470, 2),
(418, 471, 2),
(419, 472, 2),
(420, 473, 2),
(421, 474, 2),
(422, 475, 2),
(423, 476, 2),
(424, 477, 2),
(425, 478, 2),
(426, 479, 2),
(427, 480, 2),
(428, 481, 2),
(429, 482, 2),
(430, 483, 2),
(431, 484, 2),
(432, 485, 2),
(433, 486, 2),
(434, 487, 2),
(435, 488, 2),
(436, 489, 2),
(437, 490, 2),
(438, 491, 2),
(439, 492, 2),
(440, 493, 2),
(441, 494, 2),
(442, 495, 2),
(443, 496, 2),
(444, 497, 2),
(445, 498, 2),
(446, 499, 2),
(447, 500, 2),
(448, 501, 2),
(449, 502, 2),
(450, 503, 2),
(451, 504, 2),
(452, 505, 2),
(453, 506, 2),
(454, 507, 2),
(455, 508, 2),
(456, 509, 2),
(457, 510, 2),
(458, 511, 2),
(459, 512, 2),
(460, 513, 2),
(461, 514, 2),
(462, 515, 2),
(463, 516, 2),
(464, 517, 2),
(465, 518, 2),
(466, 519, 2),
(467, 520, 2),
(468, 521, 2),
(469, 522, 2),
(470, 523, 2),
(471, 524, 2),
(472, 525, 2),
(473, 526, 2),
(474, 527, 2),
(475, 528, 2),
(476, 529, 2),
(477, 530, 2),
(478, 531, 2),
(479, 532, 2),
(480, 533, 2),
(481, 534, 2),
(482, 535, 2),
(483, 536, 2),
(484, 537, 2),
(485, 538, 2),
(486, 539, 2),
(487, 540, 2),
(488, 541, 2),
(489, 542, 2),
(490, 543, 2),
(491, 544, 2),
(492, 545, 2),
(493, 546, 2),
(494, 547, 2),
(495, 548, 2),
(496, 549, 2),
(497, 550, 2),
(498, 551, 2),
(499, 552, 2),
(500, 553, 2),
(501, 554, 2),
(502, 555, 2),
(503, 556, 2),
(504, 557, 2),
(505, 558, 2),
(506, 559, 2),
(507, 560, 2),
(508, 561, 2),
(509, 562, 2),
(510, 563, 2),
(511, 564, 2),
(512, 565, 2),
(513, 566, 2),
(514, 567, 2),
(515, 568, 2),
(516, 569, 2),
(517, 570, 2),
(518, 571, 2),
(519, 572, 2),
(520, 573, 2),
(521, 574, 2),
(522, 575, 2),
(523, 576, 2),
(524, 577, 2),
(525, 578, 2),
(526, 579, 2),
(527, 580, 2),
(528, 581, 2),
(529, 582, 2),
(530, 583, 2),
(531, 584, 2),
(532, 585, 2),
(533, 586, 2),
(534, 587, 2),
(535, 588, 2),
(536, 589, 2),
(537, 590, 2),
(538, 591, 2),
(539, 592, 2),
(540, 593, 2),
(541, 594, 2),
(542, 595, 2),
(543, 596, 2),
(544, 597, 2),
(545, 598, 2),
(546, 599, 2),
(547, 600, 2),
(548, 601, 2),
(549, 602, 2),
(550, 603, 2),
(551, 604, 2),
(552, 605, 2),
(553, 606, 2),
(554, 607, 2),
(555, 608, 2),
(556, 609, 2),
(557, 610, 2),
(558, 611, 2),
(559, 612, 2),
(560, 613, 2),
(561, 614, 2),
(562, 615, 2),
(563, 616, 2),
(564, 617, 2),
(565, 618, 2),
(566, 619, 2),
(567, 620, 2),
(568, 621, 2),
(569, 622, 2),
(570, 623, 2),
(571, 624, 2),
(572, 625, 2),
(573, 626, 2),
(574, 627, 2),
(575, 628, 2),
(576, 629, 2),
(577, 630, 2),
(578, 631, 2),
(579, 632, 2),
(580, 633, 2),
(581, 634, 2),
(582, 635, 2),
(583, 636, 2),
(584, 637, 2),
(585, 638, 2),
(586, 639, 2),
(587, 640, 2),
(588, 641, 2),
(589, 642, 2),
(590, 643, 2),
(591, 644, 2),
(592, 645, 2),
(593, 646, 2),
(594, 647, 2),
(595, 648, 2),
(596, 649, 2),
(597, 650, 2),
(598, 651, 2),
(599, 652, 2),
(600, 653, 2),
(601, 654, 2),
(602, 655, 2),
(603, 656, 2),
(604, 657, 2),
(605, 658, 2),
(606, 659, 2),
(607, 660, 2),
(608, 661, 2),
(609, 662, 2),
(610, 663, 2),
(611, 664, 2),
(612, 665, 2),
(613, 666, 2),
(614, 667, 2),
(615, 668, 2),
(616, 669, 2),
(617, 670, 2),
(618, 671, 2),
(619, 672, 2),
(620, 673, 2),
(621, 674, 2),
(622, 675, 2),
(623, 676, 2),
(624, 677, 2),
(625, 678, 2),
(626, 679, 2),
(627, 680, 2),
(628, 681, 2),
(629, 682, 2),
(630, 683, 2),
(631, 684, 2),
(632, 685, 2),
(633, 686, 2),
(634, 687, 2),
(635, 688, 2),
(636, 689, 2),
(637, 690, 2),
(638, 691, 2),
(639, 692, 2),
(640, 693, 2),
(641, 694, 2),
(642, 695, 2),
(643, 696, 2),
(644, 697, 2),
(645, 698, 2),
(646, 699, 2),
(647, 700, 2),
(648, 701, 2),
(649, 702, 2),
(650, 703, 2),
(651, 704, 2),
(652, 705, 2),
(653, 706, 2),
(654, 707, 2),
(655, 708, 2),
(656, 709, 2),
(657, 710, 2),
(658, 711, 2),
(659, 712, 2),
(660, 713, 2),
(661, 714, 2),
(662, 715, 2),
(663, 716, 2),
(664, 717, 2),
(665, 718, 2),
(666, 719, 2),
(667, 720, 2),
(668, 721, 2),
(669, 722, 2),
(670, 723, 2),
(671, 724, 2),
(672, 725, 2),
(673, 726, 2),
(674, 727, 2),
(675, 728, 2),
(676, 729, 2),
(677, 730, 2),
(678, 731, 2),
(679, 732, 2),
(680, 733, 2),
(681, 734, 2),
(682, 735, 2),
(683, 736, 2),
(684, 737, 2),
(685, 738, 2),
(686, 739, 2),
(687, 740, 2),
(688, 741, 2),
(689, 742, 2),
(690, 743, 2),
(691, 744, 2),
(692, 745, 2),
(693, 746, 2),
(694, 747, 2),
(695, 748, 2),
(696, 749, 2),
(697, 750, 2),
(698, 751, 2),
(699, 752, 2),
(700, 753, 2),
(701, 754, 2),
(702, 755, 2),
(703, 756, 2),
(704, 757, 2),
(705, 758, 2),
(706, 759, 2),
(707, 760, 2),
(708, 761, 2),
(709, 762, 2),
(710, 763, 2),
(711, 764, 2),
(712, 765, 2),
(713, 766, 2),
(714, 767, 2),
(715, 768, 2),
(716, 769, 2),
(717, 770, 2),
(718, 771, 2),
(719, 772, 2),
(720, 773, 2),
(721, 774, 2),
(722, 775, 2),
(723, 776, 2),
(724, 777, 2),
(725, 778, 2),
(726, 779, 2),
(727, 780, 2),
(728, 781, 2),
(729, 782, 2),
(730, 783, 2),
(731, 784, 2),
(732, 785, 2),
(733, 786, 2),
(734, 787, 2),
(735, 788, 2),
(736, 789, 2),
(737, 790, 2),
(738, 791, 2),
(739, 792, 2),
(740, 793, 2),
(741, 794, 2),
(742, 795, 2),
(743, 796, 2),
(744, 797, 2),
(745, 798, 2),
(746, 799, 2),
(747, 800, 2),
(748, 801, 2),
(749, 802, 2),
(750, 803, 2),
(751, 804, 2),
(752, 805, 2),
(753, 806, 2),
(754, 807, 2),
(755, 808, 2),
(756, 809, 2),
(757, 810, 2),
(758, 811, 2),
(759, 812, 2),
(760, 813, 2),
(761, 814, 2),
(762, 815, 2),
(763, 816, 2),
(764, 817, 2),
(765, 818, 2),
(766, 819, 2),
(767, 820, 2),
(768, 821, 2),
(769, 822, 2),
(770, 823, 2),
(771, 824, 2),
(772, 825, 2),
(773, 826, 2),
(774, 827, 2),
(775, 828, 2),
(776, 829, 2),
(777, 830, 2),
(778, 831, 2),
(779, 832, 2),
(780, 833, 2),
(781, 834, 2),
(782, 835, 2),
(783, 836, 2),
(784, 837, 2),
(785, 838, 2),
(786, 839, 2),
(787, 840, 2),
(788, 841, 2),
(789, 842, 2),
(790, 843, 2),
(791, 844, 2),
(792, 845, 2),
(793, 846, 2),
(794, 847, 2),
(795, 848, 2),
(796, 849, 2),
(797, 850, 2),
(798, 851, 2),
(799, 852, 2),
(800, 853, 2),
(801, 854, 2),
(802, 855, 2),
(803, 856, 2),
(804, 857, 2),
(805, 858, 2),
(806, 859, 2),
(807, 860, 2),
(808, 861, 2),
(809, 862, 2),
(810, 863, 2),
(811, 864, 2),
(812, 865, 2),
(813, 866, 2),
(814, 867, 2),
(815, 868, 2),
(816, 869, 2),
(817, 870, 2),
(818, 871, 2),
(819, 872, 2),
(820, 873, 2),
(821, 874, 2),
(822, 875, 2),
(823, 876, 2),
(824, 877, 2),
(825, 878, 2),
(826, 879, 2),
(827, 880, 2),
(828, 881, 2),
(829, 882, 2),
(830, 883, 2),
(831, 884, 2),
(832, 885, 2),
(833, 886, 2),
(834, 887, 2),
(835, 888, 2),
(836, 889, 2),
(837, 890, 2),
(839, 891, 2),
(838, 892, 2),
(840, 893, 2),
(841, 894, 2),
(842, 895, 2),
(843, 896, 2),
(844, 897, 2),
(845, 898, 2),
(846, 899, 2),
(847, 900, 2),
(848, 901, 2),
(849, 902, 2),
(850, 903, 2),
(851, 904, 2),
(852, 905, 2),
(853, 906, 2),
(854, 907, 2),
(855, 908, 2),
(856, 909, 2),
(857, 910, 2),
(858, 911, 2),
(859, 912, 2),
(860, 913, 2),
(861, 914, 2),
(862, 915, 2),
(863, 916, 2),
(864, 917, 2),
(865, 918, 2),
(866, 919, 2),
(867, 920, 2),
(868, 921, 2),
(869, 922, 2),
(870, 923, 2),
(871, 924, 2),
(872, 925, 2),
(873, 926, 2),
(874, 927, 2),
(875, 928, 2),
(876, 929, 2),
(877, 930, 2),
(878, 931, 2),
(879, 932, 2),
(880, 933, 2),
(881, 934, 2),
(882, 935, 2),
(883, 936, 2),
(884, 937, 2),
(885, 938, 2),
(886, 939, 2),
(887, 940, 2),
(888, 941, 2),
(889, 942, 2),
(890, 943, 2),
(891, 944, 2),
(892, 945, 2),
(893, 946, 2),
(894, 947, 2),
(895, 948, 2),
(896, 949, 2),
(897, 950, 2),
(898, 951, 2),
(899, 952, 2),
(900, 953, 2),
(901, 954, 2),
(902, 955, 2),
(903, 956, 2),
(904, 957, 2),
(905, 958, 2),
(906, 959, 2),
(907, 960, 2),
(908, 961, 2),
(909, 962, 2),
(910, 963, 2),
(911, 964, 2),
(912, 965, 2),
(913, 966, 2),
(914, 967, 2),
(915, 968, 2),
(916, 969, 2),
(917, 970, 2),
(918, 971, 2),
(919, 972, 2),
(920, 973, 2),
(921, 974, 2),
(922, 975, 2),
(923, 976, 2),
(924, 977, 2),
(925, 978, 2),
(926, 979, 2),
(927, 980, 2),
(928, 981, 2),
(929, 982, 2),
(930, 983, 2),
(931, 984, 2),
(932, 985, 2),
(933, 986, 2),
(934, 987, 2),
(935, 988, 2),
(936, 989, 2),
(937, 990, 2),
(938, 991, 2),
(939, 992, 2),
(940, 993, 2),
(941, 994, 2),
(942, 995, 2),
(943, 996, 2),
(944, 997, 2),
(945, 998, 2),
(946, 999, 2),
(947, 1000, 2),
(948, 1001, 2),
(949, 1002, 2),
(950, 1003, 2),
(951, 1004, 2),
(952, 1005, 2),
(953, 1006, 2),
(954, 1007, 2),
(955, 1008, 2),
(956, 1009, 2),
(957, 1010, 2),
(958, 1011, 2),
(959, 1012, 2),
(960, 1013, 2),
(961, 1014, 2),
(962, 1015, 2),
(963, 1016, 2),
(964, 1017, 2),
(965, 1018, 2),
(966, 1019, 2),
(967, 1020, 2),
(968, 1021, 2),
(969, 1022, 2),
(970, 1023, 2),
(971, 1024, 2),
(972, 1025, 2),
(973, 1026, 2),
(974, 1027, 2),
(975, 1028, 2),
(976, 1029, 2),
(977, 1030, 2),
(978, 1031, 2),
(979, 1032, 2),
(980, 1033, 2),
(981, 1034, 2),
(982, 1035, 2),
(983, 1036, 2),
(984, 1037, 2),
(985, 1038, 2),
(986, 1039, 2),
(987, 1040, 2),
(988, 1041, 2),
(989, 1042, 2),
(990, 1043, 2),
(991, 1044, 2),
(992, 1045, 2),
(993, 1046, 2),
(994, 1047, 2),
(995, 1048, 2),
(996, 1049, 2),
(997, 1050, 2),
(998, 1051, 2),
(999, 1052, 2),
(1000, 1053, 2),
(1001, 1054, 2),
(1002, 1055, 2),
(1003, 1056, 2),
(1004, 1057, 2),
(1005, 1058, 2),
(1006, 1059, 2),
(1007, 1060, 2),
(1008, 1061, 2),
(1009, 1062, 2),
(1010, 1063, 2),
(1011, 1064, 2),
(1012, 1065, 2),
(1013, 1066, 2),
(1014, 1067, 2),
(1015, 1068, 2),
(1016, 1069, 2),
(1017, 1070, 2),
(1018, 1071, 2),
(1019, 1072, 2),
(1020, 1073, 2),
(1021, 1074, 2),
(1022, 1075, 2),
(1023, 1076, 2),
(1024, 1077, 2),
(1025, 1078, 2),
(1026, 1079, 2),
(1027, 1080, 2),
(1028, 1081, 2),
(1029, 1082, 2),
(1030, 1083, 2),
(1031, 1084, 2),
(1032, 1085, 2),
(1033, 1086, 2),
(1034, 1087, 2),
(1035, 1088, 2),
(1036, 1089, 2),
(1037, 1090, 2),
(1038, 1091, 2),
(1039, 1092, 2),
(1040, 1093, 2),
(1041, 1094, 2),
(1042, 1095, 2),
(1043, 1096, 2),
(1044, 1097, 2),
(1045, 1098, 2),
(1046, 1099, 2),
(1047, 1100, 2),
(1048, 1101, 2),
(1049, 1102, 2),
(1050, 1103, 2),
(1051, 1104, 2),
(1052, 1105, 2),
(1053, 1106, 2),
(1054, 1107, 2),
(1055, 1108, 2),
(1056, 1109, 2),
(1057, 1110, 2),
(1058, 1111, 2),
(1059, 1112, 2),
(1060, 1113, 2),
(1061, 1114, 2),
(1062, 1115, 2),
(1063, 1116, 2),
(1064, 1117, 2),
(1065, 1118, 2),
(1066, 1119, 2),
(1067, 1120, 2),
(1068, 1121, 2),
(1069, 1122, 2),
(1070, 1123, 2),
(1071, 1124, 2),
(1072, 1125, 2),
(1073, 1126, 2),
(1074, 1127, 2),
(1075, 1128, 2),
(1076, 1129, 2),
(1077, 1130, 2),
(1078, 1131, 2),
(1079, 1132, 2),
(1080, 1133, 2),
(1081, 1134, 2),
(1082, 1135, 2),
(1083, 1136, 2),
(1084, 1137, 2),
(1085, 1138, 2),
(1086, 1139, 2),
(1087, 1140, 2),
(1088, 1141, 2),
(1089, 1142, 2),
(1090, 1143, 2),
(1091, 1144, 2),
(1092, 1145, 2),
(1093, 1146, 2),
(1094, 1147, 2),
(1095, 1148, 2),
(1096, 1149, 2),
(1097, 1150, 2),
(1098, 1151, 2),
(1099, 1152, 2),
(1100, 1153, 2),
(1101, 1154, 2),
(1102, 1155, 2),
(1103, 1156, 2),
(1104, 1157, 2),
(1105, 1158, 2),
(1106, 1159, 2),
(1107, 1160, 2),
(1108, 1161, 2),
(1109, 1162, 2),
(1110, 1163, 2),
(1111, 1164, 2),
(1112, 1165, 2),
(1113, 1166, 2),
(1114, 1167, 2),
(1115, 1168, 2),
(1116, 1169, 2),
(1117, 1170, 2),
(1118, 1171, 2),
(1119, 1172, 2),
(1120, 1173, 2),
(1121, 1174, 2),
(1122, 1175, 2),
(1123, 1176, 2),
(1124, 1177, 2),
(1125, 1178, 2),
(1126, 1179, 2),
(1127, 1180, 2),
(1128, 1181, 2),
(1129, 1182, 2),
(1130, 1183, 2),
(1131, 1184, 2),
(1132, 1185, 2),
(1133, 1186, 2),
(1134, 1187, 2),
(1135, 1188, 2),
(1136, 1189, 2),
(1137, 1190, 2),
(1139, 1191, 2),
(1138, 1192, 2),
(1140, 1193, 2),
(1141, 1194, 2),
(1142, 1195, 2),
(1143, 1196, 2),
(1144, 1197, 2),
(1145, 1198, 2),
(1146, 1199, 2),
(1147, 1200, 2),
(1148, 1201, 2),
(1149, 1202, 2),
(1150, 1203, 2),
(1151, 1204, 2),
(2031, 1205, 1),
(1152, 1207, 2),
(1153, 1208, 2),
(1154, 1209, 2),
(1155, 1210, 2),
(1156, 1211, 2),
(1157, 1212, 2),
(1158, 1213, 2),
(1159, 1214, 2),
(1160, 1215, 2),
(1161, 1216, 2),
(1162, 1217, 2),
(1163, 1218, 2),
(1164, 1219, 2),
(1165, 1220, 2),
(1166, 1221, 2),
(1167, 1222, 2),
(1168, 1223, 2),
(1169, 1224, 2),
(1170, 1225, 2),
(1171, 1226, 2),
(1172, 1227, 2),
(1173, 1228, 2),
(1174, 1229, 2),
(1175, 1230, 2),
(1176, 1231, 2),
(1177, 1232, 2),
(1178, 1233, 2),
(1179, 1234, 2),
(1180, 1235, 2),
(1181, 1236, 2),
(1182, 1237, 2),
(1183, 1238, 2),
(1184, 1239, 2),
(1185, 1240, 2),
(1186, 1241, 2),
(1187, 1242, 2),
(1188, 1243, 2),
(1189, 1244, 2),
(1190, 1245, 2),
(1191, 1246, 2),
(1192, 1247, 2),
(1193, 1248, 2),
(1194, 1249, 2),
(1195, 1250, 2),
(1196, 1251, 2),
(1197, 1252, 2),
(1198, 1253, 2),
(1199, 1254, 2),
(1200, 1255, 2),
(1201, 1256, 2),
(1202, 1257, 2),
(1203, 1258, 2),
(1204, 1259, 2),
(1205, 1260, 2),
(1206, 1261, 2),
(1207, 1262, 2),
(1208, 1263, 2),
(1209, 1264, 2),
(1210, 1265, 2),
(1211, 1266, 2),
(1212, 1267, 2),
(1213, 1268, 2),
(1214, 1269, 2),
(1215, 1270, 2),
(1216, 1271, 2),
(1217, 1272, 2),
(1218, 1273, 2),
(1219, 1274, 2),
(1220, 1275, 2),
(1221, 1276, 2),
(1222, 1277, 2),
(1223, 1278, 2),
(1224, 1279, 2),
(1225, 1280, 2),
(1226, 1281, 2),
(1227, 1282, 2),
(1228, 1283, 2),
(1229, 1284, 2),
(1230, 1285, 2),
(1231, 1286, 2),
(1232, 1287, 2),
(1233, 1288, 2),
(1234, 1289, 2),
(1235, 1290, 2),
(1236, 1291, 2),
(1237, 1292, 2),
(1238, 1293, 2),
(1239, 1294, 2),
(1240, 1295, 2),
(1241, 1296, 2),
(1242, 1297, 2),
(1243, 1298, 2),
(1244, 1299, 2),
(1245, 1300, 2),
(1246, 1301, 2),
(1247, 1302, 2),
(1248, 1303, 2),
(1249, 1304, 2),
(1250, 1305, 2),
(1251, 1306, 2),
(1252, 1307, 2),
(1253, 1308, 2),
(1254, 1309, 2),
(1255, 1310, 2),
(1256, 1311, 2),
(1257, 1312, 2),
(1258, 1313, 2),
(1259, 1314, 2),
(1260, 1315, 2),
(1261, 1316, 2),
(1262, 1317, 2),
(1263, 1318, 2),
(1264, 1319, 2),
(1265, 1320, 2),
(1266, 1321, 2),
(1267, 1322, 2),
(1268, 1323, 2),
(1269, 1324, 2),
(1270, 1325, 2),
(1271, 1326, 2),
(1272, 1327, 2),
(1273, 1328, 2),
(1274, 1329, 2),
(1275, 1330, 2),
(1276, 1331, 2),
(1277, 1332, 2),
(1278, 1333, 2),
(1279, 1334, 2),
(1280, 1335, 2),
(1281, 1336, 2),
(1282, 1337, 2),
(1283, 1338, 2),
(1284, 1339, 2),
(1285, 1340, 2),
(1286, 1341, 2),
(1287, 1342, 2),
(1288, 1343, 2),
(1289, 1344, 2),
(1290, 1345, 2),
(1291, 1346, 2),
(1292, 1347, 2),
(1293, 1348, 2),
(1294, 1349, 2),
(1295, 1350, 2),
(1296, 1351, 2),
(1297, 1352, 2),
(1298, 1353, 2),
(1299, 1354, 2),
(1300, 1355, 2),
(1301, 1356, 2),
(1302, 1357, 2),
(1303, 1358, 2),
(1304, 1359, 2),
(1305, 1360, 2),
(1306, 1361, 2),
(1307, 1362, 2),
(1308, 1363, 2),
(1309, 1364, 2),
(1310, 1365, 2),
(1311, 1366, 2),
(1312, 1367, 2),
(1313, 1368, 2),
(1314, 1369, 2),
(1315, 1370, 2),
(1316, 1371, 2),
(1317, 1372, 2),
(1318, 1373, 2),
(1319, 1374, 2),
(1320, 1375, 2),
(1321, 1376, 2),
(1322, 1377, 2),
(1323, 1378, 2),
(1324, 1379, 2),
(1325, 1380, 2),
(1326, 1381, 2),
(1327, 1382, 2),
(1328, 1383, 2),
(1329, 1384, 2),
(1330, 1385, 2),
(1331, 1386, 2),
(1332, 1387, 2),
(1333, 1388, 2),
(1334, 1389, 2),
(1335, 1390, 2),
(1336, 1391, 2),
(1337, 1392, 2),
(1338, 1393, 2),
(1339, 1394, 2),
(1340, 1395, 2),
(1341, 1396, 2),
(1342, 1397, 2),
(1343, 1398, 2),
(1344, 1399, 2),
(1345, 1400, 2),
(1346, 1401, 2),
(1347, 1402, 2),
(1348, 1403, 2),
(1349, 1404, 2),
(1350, 1405, 2),
(1351, 1406, 2),
(1352, 1407, 2),
(1353, 1408, 2),
(1354, 1409, 2),
(1355, 1410, 2),
(1356, 1411, 2),
(1357, 1412, 2),
(1358, 1413, 2),
(1359, 1414, 2),
(1360, 1415, 2),
(1361, 1416, 2),
(1362, 1417, 2),
(1363, 1418, 2),
(1364, 1419, 2),
(1365, 1420, 2),
(1366, 1421, 2),
(1367, 1422, 2),
(1368, 1423, 2),
(1369, 1424, 2),
(1370, 1425, 2),
(1371, 1426, 2),
(1372, 1427, 2),
(1373, 1428, 2),
(1374, 1429, 2),
(1375, 1430, 2),
(1376, 1431, 2),
(1377, 1432, 2),
(1378, 1433, 2),
(1379, 1434, 2),
(1380, 1435, 2),
(1381, 1436, 2),
(1382, 1437, 2),
(1383, 1438, 2),
(1384, 1439, 2),
(1385, 1440, 2),
(1386, 1441, 2),
(1387, 1442, 2),
(1388, 1443, 2),
(1389, 1444, 2),
(1390, 1445, 2),
(1391, 1446, 2),
(1392, 1447, 2),
(1393, 1448, 2),
(1394, 1449, 2),
(1395, 1450, 2),
(1396, 1451, 2),
(1397, 1452, 2),
(1398, 1453, 2),
(1399, 1454, 2),
(1400, 1455, 2),
(1401, 1456, 2),
(1402, 1457, 2),
(1403, 1458, 2),
(1404, 1459, 2),
(1405, 1460, 2),
(1406, 1461, 2),
(1407, 1462, 2),
(1408, 1463, 2),
(1409, 1464, 2),
(1410, 1465, 2),
(1411, 1466, 2),
(1412, 1467, 2),
(1413, 1468, 2),
(1414, 1469, 2),
(1415, 1470, 2),
(1416, 1471, 2),
(1417, 1472, 2),
(1418, 1473, 2),
(1419, 1474, 2),
(1420, 1475, 2),
(1421, 1476, 2),
(1422, 1477, 2),
(1423, 1478, 2),
(1424, 1479, 2),
(1425, 1480, 2),
(1426, 1481, 2),
(1427, 1482, 2),
(1428, 1483, 2),
(1429, 1484, 2),
(1430, 1485, 2),
(1431, 1486, 2),
(1432, 1487, 2),
(1433, 1488, 2),
(1434, 1489, 2),
(1435, 1490, 2),
(1436, 1491, 2),
(1437, 1492, 2),
(1438, 1493, 2),
(1439, 1494, 2),
(1440, 1495, 2),
(1441, 1496, 2),
(1442, 1497, 2),
(1443, 1498, 2),
(1444, 1499, 2),
(1445, 1500, 2),
(1446, 1501, 2),
(1447, 1502, 2),
(1448, 1503, 2),
(1449, 1504, 2),
(1450, 1505, 2),
(1451, 1506, 2),
(1452, 1507, 2),
(1453, 1508, 2),
(1454, 1509, 2),
(1455, 1510, 2),
(1456, 1511, 2),
(1457, 1512, 2),
(1458, 1513, 2),
(1459, 1514, 2),
(1460, 1515, 2),
(1461, 1516, 2),
(1462, 1517, 2),
(1463, 1518, 2),
(1464, 1519, 2),
(1466, 1520, 2),
(1465, 1521, 2),
(1467, 1522, 2),
(1468, 1523, 2),
(1469, 1524, 2),
(1470, 1525, 2),
(1471, 1526, 2),
(1472, 1527, 2),
(1473, 1528, 2),
(1474, 1529, 2),
(1475, 1530, 2),
(1476, 1531, 2),
(1477, 1532, 2),
(1478, 1533, 2),
(1479, 1534, 2),
(1480, 1535, 2),
(1481, 1536, 2),
(1482, 1537, 2),
(1483, 1538, 2),
(1484, 1539, 2),
(1485, 1540, 2),
(1486, 1541, 2),
(1487, 1542, 2),
(1488, 1543, 2),
(1489, 1545, 2),
(1490, 1546, 2),
(1491, 1547, 2),
(1492, 1548, 2),
(1493, 1549, 2),
(1494, 1550, 2),
(1495, 1551, 2),
(1496, 1552, 2),
(1497, 1553, 2),
(1498, 1554, 2),
(1499, 1555, 2),
(1500, 1556, 2),
(1501, 1557, 2),
(1502, 1558, 2),
(1503, 1559, 2),
(1504, 1560, 2),
(1505, 1561, 2),
(1506, 1562, 2),
(1507, 1563, 2),
(1508, 1564, 2),
(1509, 1565, 2),
(1510, 1566, 2),
(1511, 1567, 2),
(1512, 1568, 2),
(1513, 1569, 2),
(1514, 1570, 2),
(1515, 1571, 2),
(1516, 1572, 2),
(1517, 1573, 2),
(1518, 1574, 2),
(1519, 1575, 2),
(1520, 1576, 2),
(1521, 1577, 2),
(1522, 1578, 2),
(1523, 1579, 2),
(1524, 1580, 2),
(1525, 1581, 2),
(1526, 1582, 2),
(1527, 1583, 2),
(1528, 1584, 2),
(1529, 1585, 2),
(1530, 1586, 2),
(1531, 1587, 2),
(1532, 1588, 2),
(1533, 1589, 2),
(1534, 1590, 2),
(1535, 1591, 2),
(1536, 1592, 2),
(1537, 1593, 2),
(1538, 1594, 2),
(1539, 1595, 2),
(1540, 1596, 2),
(1541, 1597, 2),
(1542, 1598, 2),
(1543, 1599, 2),
(1544, 1600, 2),
(1545, 1601, 2),
(1546, 1602, 2),
(1547, 1603, 2),
(1548, 1604, 2),
(1549, 1605, 2),
(1550, 1606, 2),
(1551, 1607, 2),
(1552, 1608, 2),
(1553, 1609, 2),
(1554, 1610, 2),
(1555, 1611, 2),
(1556, 1612, 2),
(1557, 1613, 2),
(1558, 1614, 2),
(1559, 1615, 2),
(1560, 1616, 2),
(1561, 1617, 2),
(1562, 1618, 2),
(1563, 1619, 2),
(1564, 1620, 2),
(1565, 1621, 2),
(1566, 1622, 2),
(1567, 1623, 2),
(1568, 1624, 2),
(1569, 1625, 2),
(1570, 1626, 2),
(1571, 1627, 2),
(1572, 1628, 2),
(1573, 1629, 2),
(1574, 1630, 2),
(1575, 1631, 2),
(1576, 1632, 2),
(1577, 1633, 2),
(1578, 1634, 2),
(1579, 1635, 2),
(1580, 1636, 2),
(1581, 1637, 2),
(1582, 1638, 2),
(1583, 1639, 2),
(1584, 1640, 2),
(1585, 1641, 2),
(1586, 1642, 2),
(1587, 1643, 2),
(1588, 1644, 2),
(1589, 1645, 2),
(1590, 1646, 2),
(1591, 1647, 2),
(1592, 1648, 2),
(1593, 1649, 2),
(1594, 1650, 2),
(1595, 1651, 2),
(1596, 1652, 2),
(1597, 1653, 2),
(1598, 1654, 2),
(1599, 1655, 2),
(1600, 1656, 2),
(1601, 1657, 2),
(1602, 1658, 2),
(1603, 1659, 2),
(1604, 1660, 2),
(1605, 1661, 2),
(1606, 1662, 2),
(1607, 1663, 2),
(1608, 1664, 2),
(1609, 1665, 2),
(1610, 1666, 2),
(1611, 1667, 2),
(1612, 1668, 2),
(1613, 1669, 2),
(1614, 1670, 2),
(1615, 1671, 2),
(1616, 1672, 2),
(1617, 1673, 2),
(1618, 1674, 2),
(1619, 1675, 2),
(1620, 1676, 2),
(1621, 1677, 2),
(1622, 1678, 2),
(1623, 1679, 2),
(1624, 1680, 2),
(1625, 1681, 2),
(1626, 1682, 2),
(1627, 1683, 2),
(1628, 1684, 2),
(1629, 1685, 2),
(1630, 1686, 2),
(1631, 1687, 2),
(1632, 1688, 2),
(1633, 1689, 2),
(1634, 1690, 2),
(1635, 1691, 2),
(1636, 1692, 2),
(1637, 1693, 2),
(1638, 1694, 2),
(1639, 1695, 2),
(1640, 1696, 2),
(1641, 1697, 2),
(1642, 1698, 2),
(1643, 1699, 2),
(1644, 1700, 2),
(1645, 1701, 2),
(1646, 1702, 2),
(1647, 1703, 2),
(1648, 1704, 2),
(1649, 1705, 2),
(1650, 1706, 2),
(1651, 1707, 2),
(1652, 1708, 2),
(1653, 1709, 2),
(1654, 1710, 2),
(1655, 1711, 2),
(1656, 1712, 2),
(1657, 1713, 2),
(1658, 1714, 2),
(1659, 1715, 2),
(1660, 1716, 2),
(1661, 1717, 2),
(1662, 1718, 2),
(1663, 1719, 2),
(1664, 1720, 2),
(1665, 1721, 2),
(1666, 1722, 2),
(1667, 1723, 2),
(1668, 1724, 2),
(1669, 1725, 2),
(1670, 1726, 2),
(1671, 1727, 2),
(1672, 1728, 2),
(1673, 1729, 2),
(1674, 1730, 2),
(1675, 1731, 2),
(1676, 1732, 2),
(1677, 1733, 2),
(1678, 1734, 2),
(1679, 1735, 2),
(1680, 1736, 2),
(1681, 1737, 2),
(1682, 1738, 2),
(1683, 1739, 2),
(1684, 1740, 2),
(1685, 1741, 2),
(1686, 1742, 2),
(1687, 1743, 2),
(1688, 1744, 2),
(1689, 1745, 2),
(1690, 1746, 2),
(1691, 1747, 2),
(1692, 1748, 2),
(1693, 1749, 2),
(1694, 1750, 2),
(1695, 1751, 2),
(1696, 1752, 2),
(1697, 1753, 2),
(1698, 1754, 2),
(1699, 1755, 2),
(1700, 1756, 2),
(1701, 1757, 2),
(1702, 1758, 2),
(1703, 1759, 2),
(1704, 1760, 2),
(1705, 1761, 2),
(1706, 1762, 2),
(1707, 1763, 2),
(1708, 1764, 2),
(1709, 1765, 2),
(1710, 1766, 2),
(1711, 1767, 2),
(1712, 1768, 2),
(1713, 1769, 2),
(1714, 1770, 2),
(1715, 1771, 2),
(1716, 1772, 2),
(1717, 1773, 2),
(1718, 1774, 2),
(1719, 1775, 2),
(1720, 1776, 2),
(1721, 1777, 2),
(1722, 1778, 2),
(1723, 1779, 2),
(1724, 1780, 2),
(1725, 1781, 2),
(1726, 1782, 2),
(1727, 1783, 2),
(1728, 1784, 2),
(1729, 1785, 2),
(1730, 1786, 2),
(1731, 1787, 2),
(1732, 1788, 2),
(1733, 1789, 2),
(1734, 1790, 2),
(1735, 1791, 2),
(1736, 1792, 2),
(1737, 1793, 2),
(1738, 1794, 2),
(1739, 1795, 2),
(1740, 1796, 2),
(1741, 1797, 2),
(1742, 1798, 2),
(1743, 1799, 2),
(1744, 1800, 2),
(1745, 1801, 2),
(1746, 1802, 2),
(1747, 1803, 2),
(1748, 1804, 2),
(1749, 1805, 2),
(1750, 1806, 2),
(1751, 1807, 2),
(1752, 1808, 2),
(1753, 1809, 2),
(1754, 1810, 2),
(1755, 1811, 2),
(1756, 1812, 2),
(1757, 1813, 2),
(1758, 1814, 2),
(1759, 1815, 2),
(1760, 1816, 2),
(1761, 1817, 2),
(1762, 1818, 2),
(1763, 1819, 2),
(1764, 1820, 2),
(1765, 1821, 2),
(1766, 1822, 2),
(1767, 1823, 2),
(1768, 1824, 2),
(1769, 1825, 2),
(1770, 1826, 2),
(1771, 1827, 2),
(1772, 1828, 2),
(1773, 1829, 2),
(1774, 1830, 2),
(1775, 1831, 2),
(1776, 1832, 2),
(1777, 1833, 2),
(1778, 1834, 2),
(1779, 1835, 2),
(1780, 1836, 2),
(1781, 1837, 2),
(1782, 1838, 2),
(1783, 1839, 2),
(1784, 1840, 2),
(1785, 1841, 2),
(1786, 1842, 2),
(1787, 1843, 2),
(1788, 1844, 2),
(1789, 1845, 2),
(1790, 1846, 2),
(1791, 1847, 2),
(1792, 1848, 2),
(1793, 1849, 2),
(1794, 1850, 2),
(1795, 1851, 2),
(1796, 1852, 2),
(1797, 1853, 2),
(1798, 1854, 2),
(1799, 1855, 2),
(1800, 1856, 2),
(1801, 1857, 2),
(1802, 1858, 2),
(1803, 1859, 2),
(1804, 1860, 2),
(1805, 1861, 2),
(1806, 1862, 2),
(1807, 1863, 2),
(1808, 1864, 2),
(1809, 1865, 2),
(1810, 1866, 2),
(1811, 1867, 2),
(1812, 1868, 2),
(1813, 1869, 2),
(1814, 1870, 2),
(1815, 1871, 2),
(1816, 1872, 2),
(1817, 1873, 2),
(1818, 1874, 2),
(1819, 1875, 2),
(1820, 1876, 2),
(1821, 1877, 2),
(1822, 1878, 2),
(1823, 1879, 2),
(1824, 1880, 2),
(1825, 1881, 2),
(1826, 1882, 2),
(1827, 1883, 2),
(1828, 1884, 2),
(1829, 1885, 2),
(1830, 1886, 2),
(1831, 1887, 2),
(1832, 1888, 2),
(1833, 1889, 2),
(1834, 1890, 2),
(1835, 1891, 2),
(1836, 1892, 2),
(1837, 1893, 2),
(1838, 1894, 2),
(1839, 1895, 2),
(1840, 1896, 2),
(1841, 1897, 2),
(1842, 1898, 2),
(1843, 1899, 2),
(1844, 1900, 2),
(1845, 1901, 2),
(1846, 1902, 2),
(1847, 1903, 2),
(1848, 1904, 2),
(1849, 1905, 2),
(1850, 1906, 2),
(1851, 1907, 2),
(1852, 1908, 2),
(1853, 1909, 2),
(1854, 1910, 2),
(1855, 1911, 2),
(1856, 1912, 2),
(1857, 1913, 2),
(1858, 1914, 2),
(1859, 1915, 2),
(1860, 1916, 2),
(1861, 1917, 2),
(1862, 1918, 2),
(1863, 1919, 2),
(1864, 1920, 2),
(1865, 1921, 2),
(1866, 1922, 2),
(1867, 1923, 2),
(1868, 1924, 2),
(1869, 1925, 2),
(1870, 1926, 2),
(1871, 1927, 2),
(1872, 1928, 2),
(1873, 1929, 2),
(1874, 1930, 2),
(1875, 1931, 2),
(1876, 1932, 2),
(1877, 1933, 2),
(1878, 1934, 2),
(1879, 1935, 2),
(1880, 1936, 2),
(1881, 1937, 2),
(1882, 1938, 2),
(1883, 1939, 2),
(1884, 1940, 2),
(1885, 1941, 2),
(1886, 1942, 2),
(1887, 1943, 2),
(1888, 1944, 2),
(1889, 1945, 2),
(1890, 1946, 2),
(1891, 1947, 2),
(1892, 1948, 2),
(1893, 1949, 2),
(1894, 1950, 2),
(1895, 1951, 2),
(1896, 1952, 2),
(1897, 1953, 2),
(1898, 1954, 2),
(1899, 1955, 2),
(1900, 1956, 2),
(1901, 1957, 2),
(1902, 1958, 2),
(1903, 1959, 2),
(1904, 1960, 2),
(1905, 1961, 2),
(1906, 1962, 2),
(1907, 1963, 2),
(1908, 1964, 2),
(1909, 1965, 2),
(1910, 1966, 2),
(1911, 1967, 2),
(1912, 1968, 2),
(1913, 1969, 2),
(1914, 1970, 2),
(1915, 1971, 2),
(1916, 1972, 2),
(1917, 1973, 2),
(1918, 1974, 2),
(1919, 1975, 2),
(1920, 1976, 2),
(1921, 1977, 2),
(1922, 1978, 2),
(1923, 1979, 2),
(1924, 1980, 2),
(1925, 1981, 2),
(1926, 1982, 2),
(1927, 1983, 2),
(1928, 1984, 2),
(1929, 1985, 2),
(1930, 1986, 2),
(1931, 1987, 2),
(1932, 1988, 2),
(1933, 1989, 2),
(1934, 1990, 2),
(1935, 1991, 2),
(1936, 1992, 2),
(1937, 1993, 2),
(1938, 1994, 2),
(1939, 1995, 2),
(1940, 1996, 2),
(1941, 1997, 2),
(1942, 1998, 2),
(1943, 1999, 2),
(1944, 2000, 2),
(1945, 2001, 2),
(1946, 2002, 2),
(1947, 2003, 2),
(1948, 2004, 2),
(1949, 2005, 2),
(1950, 2006, 2),
(1951, 2007, 2),
(1952, 2008, 2),
(1953, 2009, 2),
(1954, 2010, 2),
(1955, 2011, 2),
(1956, 2012, 2),
(1957, 2013, 2),
(1958, 2014, 2),
(1959, 2015, 2),
(1960, 2016, 2),
(1961, 2017, 2),
(1962, 2018, 2),
(1963, 2019, 2),
(1964, 2020, 2),
(1965, 2021, 2),
(1966, 2022, 2),
(1967, 2023, 2),
(1968, 2024, 2),
(1969, 2025, 2),
(1970, 2026, 2),
(1971, 2027, 2),
(1972, 2028, 2),
(1973, 2029, 2),
(1974, 2030, 2),
(1975, 2031, 2),
(1976, 2032, 2),
(1977, 2033, 2),
(1978, 2034, 2),
(1979, 2035, 2),
(1980, 2036, 2),
(1981, 2037, 2),
(1982, 2038, 2),
(1983, 2039, 2),
(1984, 2040, 2),
(1985, 2041, 2),
(1986, 2042, 2),
(1987, 2043, 2),
(1988, 2044, 2),
(1989, 2045, 2),
(1990, 2046, 2),
(1991, 2047, 2),
(1992, 2048, 2),
(1993, 2049, 2),
(1994, 2050, 2),
(1995, 2051, 2),
(1996, 2052, 2),
(1997, 2053, 2),
(1998, 2054, 2),
(1999, 2055, 2),
(2000, 2056, 2),
(2001, 2057, 2),
(2002, 2058, 2),
(2003, 2059, 2),
(2004, 2060, 2),
(2005, 2061, 2),
(2006, 2062, 2),
(2007, 2063, 2),
(2008, 2064, 2),
(2009, 2065, 2),
(2010, 2066, 2),
(2011, 2067, 2),
(2012, 2068, 2),
(2013, 2069, 2),
(2014, 2070, 2),
(2015, 2071, 2),
(2016, 2072, 2),
(2017, 2073, 2),
(2018, 2074, 2),
(2019, 2075, 2),
(2020, 2076, 2),
(2021, 2077, 2),
(2022, 2078, 2),
(2023, 2079, 2),
(2024, 2080, 2),
(2025, 2081, 2),
(2026, 2082, 2),
(2027, 2083, 2),
(2028, 2084, 2),
(2029, 2085, 2),
(2030, 2086, 2),
(2032, 2089, 2),
(2033, 2090, 2),
(2034, 2091, 2),
(2035, 2092, 2),
(2036, 2093, 2),
(2037, 2094, 2),
(2038, 2095, 2),
(2039, 2096, 2),
(2040, 2097, 2),
(2041, 2098, 2),
(2042, 2099, 2),
(2043, 2100, 2),
(2044, 2101, 2),
(2045, 2102, 2),
(2046, 2103, 2),
(2047, 2104, 2),
(2048, 2105, 2),
(2049, 2106, 2),
(2050, 2107, 2),
(2051, 2108, 2),
(2052, 2109, 2),
(2053, 2110, 2),
(2054, 2111, 2),
(2055, 2112, 2),
(2056, 2113, 2),
(2057, 2114, 2),
(2058, 2115, 2),
(2059, 2116, 2),
(2060, 2117, 2),
(2061, 2118, 2),
(2062, 2119, 2),
(2063, 2120, 2),
(2064, 2121, 2),
(2065, 2122, 2),
(2066, 2123, 2),
(2067, 2124, 2),
(2068, 2125, 2),
(2069, 2126, 2),
(2070, 2127, 2),
(2071, 2128, 2),
(2072, 2129, 2),
(2073, 2130, 2),
(2074, 2131, 2),
(2075, 2132, 2),
(2076, 2133, 2),
(2077, 2134, 2),
(2078, 2135, 2),
(2079, 2136, 2),
(2080, 2137, 2),
(2081, 2138, 2),
(2082, 2139, 2),
(2083, 2140, 2),
(2084, 2141, 2),
(2085, 2142, 2),
(2086, 2143, 2),
(2087, 2144, 2),
(2088, 2145, 2),
(2089, 2146, 2),
(2090, 2147, 2),
(2091, 2148, 2),
(2092, 2149, 2),
(2093, 2150, 2),
(2094, 2151, 2),
(2095, 2152, 2),
(2096, 2153, 2),
(2097, 2154, 2),
(2098, 2155, 2),
(2099, 2156, 2),
(2100, 2157, 2),
(2101, 2158, 2),
(2102, 2159, 2),
(2103, 2160, 2),
(2104, 2161, 2),
(2105, 2162, 2),
(2106, 2163, 2),
(2107, 2164, 2),
(2108, 2165, 2),
(2109, 2166, 2),
(2110, 2167, 2),
(2111, 2168, 2),
(2112, 2169, 2),
(2113, 2170, 2),
(2114, 2171, 2),
(2115, 2172, 2),
(2116, 2173, 2),
(2117, 2174, 2),
(2118, 2175, 2),
(2119, 2176, 2),
(2120, 2177, 2),
(2121, 2178, 2),
(2122, 2179, 2),
(2123, 2181, 2),
(2124, 2182, 2),
(2125, 2183, 2),
(2126, 2184, 2),
(2127, 2185, 2),
(2128, 2186, 2),
(2129, 2187, 2),
(2130, 2188, 2),
(2131, 2189, 2),
(2132, 2190, 2),
(2133, 2191, 2),
(2134, 2192, 2),
(2135, 2193, 2),
(2136, 2194, 2),
(2137, 2195, 2),
(2138, 2196, 2),
(2139, 2197, 2),
(2140, 2198, 2),
(2141, 2199, 2),
(2142, 2200, 2),
(2143, 2201, 2),
(2144, 2202, 2),
(2145, 2203, 2),
(2146, 2204, 2),
(2147, 2205, 2),
(2148, 2206, 2),
(2149, 2207, 2),
(2150, 2208, 2),
(2151, 2209, 2),
(2152, 2210, 2),
(2153, 2211, 2),
(2154, 2212, 2),
(2155, 2213, 2),
(2156, 2214, 2),
(2157, 2215, 2),
(2158, 2216, 2),
(2159, 2217, 2),
(2160, 2218, 2),
(2161, 2219, 2),
(2162, 2220, 2),
(2163, 2221, 2),
(2164, 2222, 2),
(2165, 2223, 2),
(2166, 2224, 2),
(2167, 2225, 2),
(2168, 2226, 2),
(2169, 2227, 2),
(2170, 2228, 2),
(2171, 2229, 2),
(2172, 2230, 2),
(2173, 2231, 2),
(2174, 2232, 2),
(2175, 2233, 2),
(2176, 2234, 2),
(2177, 2235, 2),
(2178, 2236, 2),
(2179, 2237, 2),
(2180, 2238, 2),
(2181, 2239, 2),
(2182, 2240, 2),
(2183, 2241, 2),
(2184, 2242, 2),
(2185, 2243, 2),
(2186, 2244, 2),
(2187, 2245, 2),
(2188, 2246, 2),
(2189, 2247, 2),
(2190, 2248, 2),
(2191, 2249, 2),
(2192, 2250, 2),
(2193, 2251, 2),
(2194, 2252, 2),
(2195, 2253, 2),
(2196, 2254, 2),
(2197, 2255, 2),
(2198, 2256, 2),
(2199, 2257, 2),
(2200, 2258, 2),
(2201, 2259, 2),
(2202, 2260, 2),
(2203, 2261, 2),
(2204, 2262, 2),
(2205, 2263, 2),
(2206, 2264, 2),
(2207, 2265, 2),
(2208, 2266, 2),
(2209, 2267, 2),
(2210, 2268, 2),
(2211, 2269, 2),
(2212, 2270, 2),
(2213, 2271, 2),
(2214, 2272, 2),
(2215, 2273, 2),
(2216, 2274, 2),
(2217, 2275, 2),
(2218, 2276, 2),
(2219, 2277, 2),
(2221, 2278, 2),
(2222, 2279, 2),
(2223, 2280, 2),
(2224, 2281, 2),
(2225, 2282, 2),
(2226, 2283, 2),
(2227, 2284, 2),
(2228, 2285, 2),
(2229, 2286, 2),
(2230, 2287, 2),
(2231, 2288, 2),
(2232, 2289, 2),
(2233, 2290, 2),
(2234, 2291, 2),
(2235, 2292, 2),
(2236, 2293, 2),
(2237, 2294, 2),
(2238, 2295, 2),
(2239, 2296, 2),
(2240, 2297, 2),
(2241, 2298, 2),
(2242, 2299, 2),
(2243, 2300, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_level_lookup`
--

CREATE TABLE IF NOT EXISTS `users_level_lookup` (
  `id` int(11) NOT NULL,
  `level` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_level_lookup`
--

INSERT INTO `users_level_lookup` (`id`, `level`) VALUES
(1, 'ADMIN'),
(2, 'KASIR'),
(3, 'GUDANG'),
(4, 'SUPERVISOR'),
(5, 'HRD'),
(6, 'MANAGER'),
(7, 'ADMIN DIREKSI'),
(8, 'SALES');

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE IF NOT EXISTS `user_menu` (
`id` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `id_menu` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `id_toko`, `level`, `id_menu`) VALUES
(1, 158, 1, '1'),
(2, 158, 1, '2'),
(3, 158, 1, '5'),
(4, 158, 1, '7'),
(5, 158, 1, '8'),
(6, 158, 1, '9'),
(7, 158, 1, '12'),
(8, 158, 1, '21'),
(9, 158, 1, '24'),
(10, 158, 1, '25'),
(11, 158, 1, '26'),
(12, 158, 1, '30'),
(13, 158, 1, '32'),
(14, 158, 1, '33'),
(15, 158, 1, '34'),
(16, 158, 1, '35'),
(17, 158, 1, '37'),
(18, 158, 1, '36'),
(19, 158, 1, '39'),
(20, 158, 1, '94'),
(21, 158, 1, '40'),
(22, 158, 1, '41'),
(23, 158, 1, '43'),
(24, 158, 1, '44'),
(25, 158, 1, '45'),
(26, 158, 1, '49'),
(27, 158, 1, '95'),
(28, 158, 1, '74'),
(29, 158, 1, '75'),
(30, 158, 1, '76'),
(31, 158, 1, '77'),
(32, 158, 1, '78'),
(33, 158, 1, '79'),
(34, 158, 1, '80'),
(35, 158, 1, '82'),
(36, 158, 1, '85'),
(37, 158, 1, '86'),
(38, 158, 1, '87'),
(39, 158, 1, '88'),
(40, 158, 1, '89'),
(41, 158, 1, '93'),
(42, 158, 2, '1'),
(43, 158, 2, '2'),
(44, 158, 2, '5'),
(45, 158, 2, '7'),
(46, 158, 2, '8'),
(47, 158, 2, '9'),
(48, 158, 2, '12'),
(49, 158, 2, '21'),
(50, 158, 2, '24'),
(51, 158, 2, '25'),
(52, 158, 2, '32'),
(53, 158, 2, '33'),
(54, 158, 2, '34'),
(55, 158, 2, '35'),
(56, 158, 2, '37'),
(57, 158, 2, '36'),
(58, 158, 2, '38'),
(59, 158, 2, '39'),
(60, 158, 2, '40'),
(61, 158, 2, '41'),
(62, 158, 2, '43'),
(63, 158, 2, '44'),
(64, 158, 2, '45'),
(65, 158, 2, '95'),
(66, 158, 2, '74'),
(67, 158, 2, '75'),
(68, 158, 2, '76'),
(69, 158, 2, '77'),
(70, 158, 2, '78'),
(71, 158, 2, '79'),
(72, 158, 2, '80'),
(73, 158, 2, '85'),
(74, 158, 2, '86'),
(75, 158, 2, '87'),
(76, 158, 2, '88'),
(77, 158, 2, '89'),
(78, 158, 2, '93'),
(79, 158, 3, '1'),
(80, 158, 3, '2'),
(81, 158, 3, '5'),
(82, 158, 3, '7'),
(83, 158, 3, '8'),
(84, 158, 3, '9'),
(85, 158, 3, '12'),
(86, 158, 3, '21'),
(87, 158, 3, '24'),
(88, 158, 3, '25'),
(89, 158, 3, '32'),
(90, 158, 3, '33'),
(91, 158, 3, '34'),
(92, 158, 3, '35'),
(93, 158, 3, '37'),
(94, 158, 3, '39'),
(95, 158, 3, '40'),
(96, 158, 3, '43'),
(97, 158, 3, '44'),
(98, 158, 3, '45'),
(99, 158, 3, '74'),
(100, 158, 3, '75'),
(101, 158, 3, '80'),
(102, 158, 3, '85'),
(103, 158, 3, '86'),
(104, 158, 3, '93'),
(105, 158, 4, '1'),
(106, 158, 4, '2'),
(107, 158, 4, '5'),
(108, 158, 4, '7'),
(109, 158, 4, '8'),
(110, 158, 4, '9'),
(111, 158, 4, '32'),
(112, 158, 4, '33'),
(113, 158, 4, '34'),
(114, 158, 4, '35'),
(115, 158, 4, '40'),
(116, 158, 4, '41'),
(117, 158, 4, '43'),
(118, 158, 4, '44'),
(119, 158, 4, '45'),
(120, 158, 4, '74'),
(121, 158, 4, '76'),
(122, 158, 4, '80'),
(123, 158, 4, '82'),
(124, 158, 4, '85'),
(125, 158, 4, '86'),
(126, 158, 4, '87'),
(127, 158, 4, '88'),
(128, 158, 4, '89'),
(129, 158, 5, '1'),
(130, 158, 5, '74'),
(131, 158, 5, '76'),
(132, 158, 5, '80'),
(133, 158, 5, '82'),
(134, 158, 5, '85'),
(135, 158, 5, '86'),
(136, 158, 5, '87'),
(137, 158, 5, '88'),
(138, 158, 5, '89'),
(139, 158, 6, '1'),
(140, 158, 7, '1'),
(141, 158, 8, '1'),
(142, 158, 8, '2'),
(143, 158, 8, '5'),
(144, 158, 8, '7'),
(145, 158, 8, '32'),
(146, 158, 8, '33'),
(147, 158, 8, '34'),
(148, 158, 8, '35'),
(149, 158, 8, '40'),
(150, 158, 8, '43'),
(151, 158, 8, '44'),
(152, 158, 8, '45'),
(153, 158, 8, '74'),
(154, 158, 8, '75'),
(155, 158, 8, '80'),
(156, 158, 8, '82'),
(157, 158, 8, '85'),
(158, 158, 8, '86');

-- --------------------------------------------------------

--
-- Table structure for table `versi_aipos`
--

CREATE TABLE IF NOT EXISTS `versi_aipos` (
`id` int(11) NOT NULL,
  `versi_aipos` varchar(10) DEFAULT NULL,
  `last_update` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `versi_aipos`
--

INSERT INTO `versi_aipos` (`id`, `versi_aipos`, `last_update`) VALUES
(1, 'RETAIL', '03-11-2016'),
(2, 'RESTAURANT', '01-11-2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aipos_blog`
--
ALTER TABLE `aipos_blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_blog_gambar`
--
ALTER TABLE `aipos_blog_gambar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_blog_kategori`
--
ALTER TABLE `aipos_blog_kategori`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_faq_i_k`
--
ALTER TABLE `aipos_faq_i_k`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_faq_k`
--
ALTER TABLE `aipos_faq_k`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_faq_s_k`
--
ALTER TABLE `aipos_faq_s_k`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_kategori_blog`
--
ALTER TABLE `aipos_kategori_blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_login_attempts`
--
ALTER TABLE `aipos_login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_users`
--
ALTER TABLE `aipos_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aipos_users_groups`
--
ALTER TABLE `aipos_users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_asli`
--
ALTER TABLE `akun_asli`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_copy`
--
ALTER TABLE `akun_copy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_iklan`
--
ALTER TABLE `akun_iklan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `akun_sederhana`
--
ALTER TABLE `akun_sederhana`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `arus_kas`
--
ALTER TABLE `arus_kas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beban`
--
ALTER TABLE `beban`
 ADD PRIMARY KEY (`id_beban`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang`
--
ALTER TABLE `cabang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_server`
--
ALTER TABLE `client_server`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dapur`
--
ALTER TABLE `dapur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_meja`
--
ALTER TABLE `detail_meja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_mekanik`
--
ALTER TABLE `detail_mekanik`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_mobile`
--
ALTER TABLE `email_mobile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expedisi`
--
ALTER TABLE `expedisi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faktur_retail`
--
ALTER TABLE `faktur_retail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faktur_retail2`
--
ALTER TABLE `faktur_retail2`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `format_nota`
--
ALTER TABLE `format_nota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji_detail_temp`
--
ALTER TABLE `gaji_detail_temp`
 ADD PRIMARY KEY (`id`), ADD KEY `gaji_temp` (`id_gaji_temp`);

--
-- Indexes for table `gaji_temp`
--
ALTER TABLE `gaji_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_cs`
--
ALTER TABLE `group_cs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_cs_detail`
--
ALTER TABLE `group_cs_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_produk_cs`
--
ALTER TABLE `group_produk_cs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_produk_cs_detail`
--
ALTER TABLE `group_produk_cs_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hpp`
--
ALTER TABLE `hpp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_blog`
--
ALTER TABLE `hrd_blog`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_data_absensi`
--
ALTER TABLE `hrd_data_absensi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_data_cuti`
--
ALTER TABLE `hrd_data_cuti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_data_gaji`
--
ALTER TABLE `hrd_data_gaji`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_informasi`
--
ALTER TABLE `hrd_informasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_jabatan`
--
ALTER TABLE `hrd_jabatan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_karyawan`
--
ALTER TABLE `hrd_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_pengaturan_gaji`
--
ALTER TABLE `hrd_pengaturan_gaji`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_status_karyawan`
--
ALTER TABLE `hrd_status_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hrd_tidak_masuk`
--
ALTER TABLE `hrd_tidak_masuk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hutang_bayar`
--
ALTER TABLE `hutang_bayar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `incentif`
--
ALTER TABLE `incentif`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkubasi`
--
ALTER TABLE `inkubasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkubasi_barang`
--
ALTER TABLE `inkubasi_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkubasi_barang_temp`
--
ALTER TABLE `inkubasi_barang_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkubasi_barang_update`
--
ALTER TABLE `inkubasi_barang_update`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inkubasi_karyawan`
--
ALTER TABLE `inkubasi_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam_kerja`
--
ALTER TABLE `jam_kerja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_back`
--
ALTER TABLE `jurnal_back`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_copy`
--
ALTER TABLE `jurnal_copy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_januari_repair`
--
ALTER TABLE `jurnal_januari_repair`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_manual`
--
ALTER TABLE `jurnal_manual`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
 ADD PRIMARY KEY (`id_kategori`), ADD KEY `id_kategori_2` (`id_kategori_2`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_transaksi`
--
ALTER TABLE `kode_transaksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_adv`
--
ALTER TABLE `laporan_adv`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_aktivitas`
--
ALTER TABLE `laporan_aktivitas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_aktivitas_detail`
--
ALTER TABLE `laporan_aktivitas_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_order`
--
ALTER TABLE `laporan_order`
 ADD PRIMARY KEY (`id`), ADD KEY `no_invoice` (`no_invoice`);

--
-- Indexes for table `laporan_order_detail`
--
ALTER TABLE `laporan_order_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `level_pengaturan_akuntansi`
--
ALTER TABLE `level_pengaturan_akuntansi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_copy`
--
ALTER TABLE `member_copy`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrasi`
--
ALTER TABLE `migrasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_stok`
--
ALTER TABLE `mutasi_stok`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_stok_temp`
--
ALTER TABLE `mutasi_stok_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `opsi`
--
ALTER TABLE `opsi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_orders`), ADD KEY `id_orders_2` (`id_orders_2`), ADD KEY `id_orders_2_2` (`id_orders_2`), ADD KEY `no_faktur` (`no_faktur`), ADD KEY `id_sales` (`id_sales`), ADD KEY `id_users` (`id_users`), ADD KEY `media` (`media`), ADD KEY `bank` (`bank`), ADD KEY `status` (`status`), ADD KEY `pembayaran` (`pembayaran`), ADD KEY `no_resi` (`no_resi`), ADD KEY `id_expedisi` (`id_expedisi`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
 ADD PRIMARY KEY (`id_orders`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_orders_2` (`id_orders_2`);

--
-- Indexes for table `orders_lainnya`
--
ALTER TABLE `orders_lainnya`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_sales_temp`
--
ALTER TABLE `orders_sales_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_stok`
--
ALTER TABLE `orders_stok`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_temp`
--
ALTER TABLE `orders_temp`
 ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `orders_verifikasi`
--
ALTER TABLE `orders_verifikasi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panduan`
--
ALTER TABLE `panduan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian_temp`
--
ALTER TABLE `pembelian_temp`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`), ADD KEY `id_toko` (`id_toko`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pembelian_temp_update`
--
ALTER TABLE `pembelian_temp_update`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_akuntansi`
--
ALTER TABLE `pengaturan_akuntansi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_jurnal`
--
ALTER TABLE `pengaturan_jurnal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan_transaksi`
--
ALTER TABLE `pengaturan_transaksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan`
--
ALTER TABLE `pengemasan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan_barang`
--
ALTER TABLE `pengemasan_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan_barang_temp`
--
ALTER TABLE `pengemasan_barang_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan_barang_update`
--
ALTER TABLE `pengemasan_barang_update`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengemasan_karyawan`
--
ALTER TABLE `pengemasan_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penguji`
--
ALTER TABLE `penguji`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penyesuaian_stok`
--
ALTER TABLE `penyesuaian_stok`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pil_bank`
--
ALTER TABLE `pil_bank`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_jurnal`
--
ALTER TABLE `pil_jurnal`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_media`
--
ALTER TABLE `pil_media`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_menu`
--
ALTER TABLE `pil_menu`
 ADD PRIMARY KEY (`id`) USING BTREE, ADD KEY `id_parent` (`id_parent`) USING BTREE;

--
-- Indexes for table `pil_modul`
--
ALTER TABLE `pil_modul`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_pekerjaan`
--
ALTER TABLE `pil_pekerjaan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_penjualan_lainnya`
--
ALTER TABLE `pil_penjualan_lainnya`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pil_transaksi`
--
ALTER TABLE `pil_transaksi`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang_bayar`
--
ALTER TABLE `piutang_bayar`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang_list`
--
ALTER TABLE `piutang_list`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `printer_mode`
--
ALTER TABLE `printer_mode`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_barang`
--
ALTER TABLE `produksi_barang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_barang_temp`
--
ALTER TABLE `produksi_barang_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_barang_update`
--
ALTER TABLE `produksi_barang_update`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produksi_karyawan`
--
ALTER TABLE `produksi_karyawan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_restaurant`
--
ALTER TABLE `produk_restaurant`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_retail`
--
ALTER TABLE `produk_retail`
 ADD PRIMARY KEY (`id_produk`), ADD KEY `id_produk_2` (`id_produk_2`), ADD KEY `id_produk_2_2` (`id_produk_2`), ADD KEY `id_produk_2_3` (`id_produk_2`), ADD KEY `id_kategori` (`id_kategori`), ADD KEY `id_kategori_2` (`id_kategori`), ADD KEY `satuan` (`satuan`);

--
-- Indexes for table `produk_retail_mutasi`
--
ALTER TABLE `produk_retail_mutasi`
 ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `produk_retail_temp`
--
ALTER TABLE `produk_retail_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_jual`
--
ALTER TABLE `retur_jual`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_jual_detail`
--
ALTER TABLE `retur_jual_detail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_jual_gudang_detail_temp`
--
ALTER TABLE `retur_jual_gudang_detail_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_jual_gudang_temp`
--
ALTER TABLE `retur_jual_gudang_temp`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retur_jual_temp`
--
ALTER TABLE `retur_jual_temp`
 ADD PRIMARY KEY (`id`), ADD KEY `id_toko` (`id_toko`), ADD KEY `id_users` (`id_users`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_orders_detail` (`id_orders_detail`);

--
-- Indexes for table `rorders`
--
ALTER TABLE `rorders`
 ADD PRIMARY KEY (`id_orders`);

--
-- Indexes for table `rorders_temp`
--
ALTER TABLE `rorders_temp`
 ADD PRIMARY KEY (`id_orders_temp`);

--
-- Indexes for table `saldo_terbuka`
--
ALTER TABLE `saldo_terbuka`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sample_produk`
--
ALTER TABLE `sample_produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan_produk`
--
ALTER TABLE `satuan_produk`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_retur`
--
ALTER TABLE `setting_retur`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `split_bayar`
--
ALTER TABLE `split_bayar`
 ADD PRIMARY KEY (`id_split`);

--
-- Indexes for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_produk`
--
ALTER TABLE `stok_produk`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`), ADD KEY `id_produk_2` (`id_produk`), ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `stok_produk_mati`
--
ALTER TABLE `stok_produk_mati`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `stok_so`
--
ALTER TABLE `stok_so`
 ADD PRIMARY KEY (`id`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `stok_so_info`
--
ALTER TABLE `stok_so_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_satuan`
--
ALTER TABLE `sub_satuan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
 ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tampilan`
--
ALTER TABLE `tampilan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tukarphone`
--
ALTER TABLE `tukarphone`
 ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucapan`
--
ALTER TABLE `ucapan`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD KEY `id_users` (`id_users`), ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`), ADD KEY `fk_users_groups_users1_idx` (`user_id`), ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `users_level_lookup`
--
ALTER TABLE `users_level_lookup`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
 ADD PRIMARY KEY (`id`) USING BTREE, ADD KEY `id_menu` (`id_menu`) USING BTREE, ADD KEY `level` (`level`) USING BTREE;

--
-- Indexes for table `versi_aipos`
--
ALTER TABLE `versi_aipos`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aipos_blog`
--
ALTER TABLE `aipos_blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aipos_blog_gambar`
--
ALTER TABLE `aipos_blog_gambar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `aipos_blog_kategori`
--
ALTER TABLE `aipos_blog_kategori`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `aipos_faq_i_k`
--
ALTER TABLE `aipos_faq_i_k`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aipos_faq_k`
--
ALTER TABLE `aipos_faq_k`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aipos_faq_s_k`
--
ALTER TABLE `aipos_faq_s_k`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aipos_kategori_blog`
--
ALTER TABLE `aipos_kategori_blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `aipos_login_attempts`
--
ALTER TABLE `aipos_login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `aipos_users`
--
ALTER TABLE `aipos_users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `aipos_users_groups`
--
ALTER TABLE `aipos_users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `akun_asli`
--
ALTER TABLE `akun_asli`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=163;
--
-- AUTO_INCREMENT for table `akun_copy`
--
ALTER TABLE `akun_copy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=227;
--
-- AUTO_INCREMENT for table `akun_sederhana`
--
ALTER TABLE `akun_sederhana`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=672;
--
-- AUTO_INCREMENT for table `arus_kas`
--
ALTER TABLE `arus_kas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `beban`
--
ALTER TABLE `beban`
MODIFY `id_beban` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `client_server`
--
ALTER TABLE `client_server`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `dapur`
--
ALTER TABLE `dapur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail_meja`
--
ALTER TABLE `detail_meja`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_mekanik`
--
ALTER TABLE `detail_mekanik`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_mobile`
--
ALTER TABLE `email_mobile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `expedisi`
--
ALTER TABLE `expedisi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `faktur_retail`
--
ALTER TABLE `faktur_retail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `faktur_retail2`
--
ALTER TABLE `faktur_retail2`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `format_nota`
--
ALTER TABLE `format_nota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `gaji_detail_temp`
--
ALTER TABLE `gaji_detail_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `gaji_temp`
--
ALTER TABLE `gaji_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_cs`
--
ALTER TABLE `group_cs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `group_cs_detail`
--
ALTER TABLE `group_cs_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT for table `group_produk_cs`
--
ALTER TABLE `group_produk_cs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `group_produk_cs_detail`
--
ALTER TABLE `group_produk_cs_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hpp`
--
ALTER TABLE `hpp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hrd_blog`
--
ALTER TABLE `hrd_blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hrd_data_absensi`
--
ALTER TABLE `hrd_data_absensi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hrd_data_cuti`
--
ALTER TABLE `hrd_data_cuti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `hrd_data_gaji`
--
ALTER TABLE `hrd_data_gaji`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hrd_jabatan`
--
ALTER TABLE `hrd_jabatan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `hrd_karyawan`
--
ALTER TABLE `hrd_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hrd_pengaturan_gaji`
--
ALTER TABLE `hrd_pengaturan_gaji`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hrd_status_karyawan`
--
ALTER TABLE `hrd_status_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hrd_tidak_masuk`
--
ALTER TABLE `hrd_tidak_masuk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hutang_bayar`
--
ALTER TABLE `hutang_bayar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `incentif`
--
ALTER TABLE `incentif`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `inkubasi`
--
ALTER TABLE `inkubasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `inkubasi_barang`
--
ALTER TABLE `inkubasi_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `inkubasi_barang_temp`
--
ALTER TABLE `inkubasi_barang_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `inkubasi_barang_update`
--
ALTER TABLE `inkubasi_barang_update`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `inkubasi_karyawan`
--
ALTER TABLE `inkubasi_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jam_kerja`
--
ALTER TABLE `jam_kerja`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `jenis_menu`
--
ALTER TABLE `jenis_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1138;
--
-- AUTO_INCREMENT for table `jurnal_back`
--
ALTER TABLE `jurnal_back`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurnal_copy`
--
ALTER TABLE `jurnal_copy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurnal_januari_repair`
--
ALTER TABLE `jurnal_januari_repair`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jurnal_manual`
--
ALTER TABLE `jurnal_manual`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kode_transaksi`
--
ALTER TABLE `kode_transaksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `laporan_adv`
--
ALTER TABLE `laporan_adv`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
--
-- AUTO_INCREMENT for table `laporan_aktivitas`
--
ALTER TABLE `laporan_aktivitas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_aktivitas_detail`
--
ALTER TABLE `laporan_aktivitas_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_order`
--
ALTER TABLE `laporan_order`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `laporan_order_detail`
--
ALTER TABLE `laporan_order_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level_pengaturan_akuntansi`
--
ALTER TABLE `level_pengaturan_akuntansi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=327;
--
-- AUTO_INCREMENT for table `member_copy`
--
ALTER TABLE `member_copy`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `migrasi`
--
ALTER TABLE `migrasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutasi_stok`
--
ALTER TABLE `mutasi_stok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mutasi_stok_temp`
--
ALTER TABLE `mutasi_stok_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `opsi`
--
ALTER TABLE `opsi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4407;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders_lainnya`
--
ALTER TABLE `orders_lainnya`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_sales_temp`
--
ALTER TABLE `orders_sales_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_stok`
--
ALTER TABLE `orders_stok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_temp`
--
ALTER TABLE `orders_temp`
MODIFY `id_orders_temp` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `orders_verifikasi`
--
ALTER TABLE `orders_verifikasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `panduan`
--
ALTER TABLE `panduan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT for table `pembelian_temp`
--
ALTER TABLE `pembelian_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembelian_temp_update`
--
ALTER TABLE `pembelian_temp_update`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengaturan_akuntansi`
--
ALTER TABLE `pengaturan_akuntansi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengaturan_jurnal`
--
ALTER TABLE `pengaturan_jurnal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pengaturan_transaksi`
--
ALTER TABLE `pengaturan_transaksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pengemasan`
--
ALTER TABLE `pengemasan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengemasan_barang`
--
ALTER TABLE `pengemasan_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `pengemasan_barang_temp`
--
ALTER TABLE `pengemasan_barang_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `pengemasan_barang_update`
--
ALTER TABLE `pengemasan_barang_update`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=360;
--
-- AUTO_INCREMENT for table `pengemasan_karyawan`
--
ALTER TABLE `pengemasan_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `penguji`
--
ALTER TABLE `penguji`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `penyesuaian_stok`
--
ALTER TABLE `penyesuaian_stok`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pil_bank`
--
ALTER TABLE `pil_bank`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pil_jurnal`
--
ALTER TABLE `pil_jurnal`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pil_media`
--
ALTER TABLE `pil_media`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pil_menu`
--
ALTER TABLE `pil_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `pil_modul`
--
ALTER TABLE `pil_modul`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pil_pekerjaan`
--
ALTER TABLE `pil_pekerjaan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `pil_penjualan_lainnya`
--
ALTER TABLE `pil_penjualan_lainnya`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pil_transaksi`
--
ALTER TABLE `pil_transaksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piutang_bayar`
--
ALTER TABLE `piutang_bayar`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `piutang_list`
--
ALTER TABLE `piutang_list`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `printer_mode`
--
ALTER TABLE `printer_mode`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `produksi`
--
ALTER TABLE `produksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `produksi_barang`
--
ALTER TABLE `produksi_barang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_barang_temp`
--
ALTER TABLE `produksi_barang_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_barang_update`
--
ALTER TABLE `produksi_barang_update`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produksi_karyawan`
--
ALTER TABLE `produksi_karyawan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk_restaurant`
--
ALTER TABLE `produk_restaurant`
MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk_retail`
--
ALTER TABLE `produk_retail`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT for table `produk_retail_mutasi`
--
ALTER TABLE `produk_retail_mutasi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk_retail_temp`
--
ALTER TABLE `produk_retail_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur`
--
ALTER TABLE `retur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `retur_jual`
--
ALTER TABLE `retur_jual`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `retur_jual_detail`
--
ALTER TABLE `retur_jual_detail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `retur_jual_gudang_detail_temp`
--
ALTER TABLE `retur_jual_gudang_detail_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_jual_gudang_temp`
--
ALTER TABLE `retur_jual_gudang_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retur_jual_temp`
--
ALTER TABLE `retur_jual_temp`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rorders`
--
ALTER TABLE `rorders`
MODIFY `id_orders` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rorders_temp`
--
ALTER TABLE `rorders_temp`
MODIFY `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saldo_terbuka`
--
ALTER TABLE `saldo_terbuka`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sample_produk`
--
ALTER TABLE `sample_produk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `satuan_produk`
--
ALTER TABLE `satuan_produk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting_retur`
--
ALTER TABLE `setting_retur`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `split_bayar`
--
ALTER TABLE `split_bayar`
MODIFY `id_split` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `stok_gudang`
--
ALTER TABLE `stok_gudang`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_produk`
--
ALTER TABLE `stok_produk`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `stok_produk_mati`
--
ALTER TABLE `stok_produk_mati`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_so`
--
ALTER TABLE `stok_so`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stok_so_info`
--
ALTER TABLE `stok_so_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_satuan`
--
ALTER TABLE `sub_satuan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
MODIFY `id_supplier` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=124;
--
-- AUTO_INCREMENT for table `tabel_akun`
--
ALTER TABLE `tabel_akun`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tampilan`
--
ALTER TABLE `tampilan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `tukarphone`
--
ALTER TABLE `tukarphone`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ucapan`
--
ALTER TABLE `ucapan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2301;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2244;
--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `versi_aipos`
--
ALTER TABLE `versi_aipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `aipos_users_groups`
--
ALTER TABLE `aipos_users_groups`
ADD CONSTRAINT `aipos_users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `aipos_users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `gaji_detail_temp`
--
ALTER TABLE `gaji_detail_temp`
ADD CONSTRAINT `gaji_detail_temp_ibfk_1` FOREIGN KEY (`id_gaji_temp`) REFERENCES `gaji_temp` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_detail`
--
ALTER TABLE `orders_detail`
ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk_retail` (`id_produk_2`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk_retail` (`id_produk_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk_retail` (`id_produk_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penyesuaian_stok`
--
ALTER TABLE `penyesuaian_stok`
ADD CONSTRAINT `penyesuaian_stok_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk_retail` (`id_produk_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk_retail`
--
ALTER TABLE `produk_retail`
ADD CONSTRAINT `produk_retail_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_produk` (`id_kategori_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stok_produk_mati`
--
ALTER TABLE `stok_produk_mati`
ADD CONSTRAINT `stok_produk_mati_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk_retail` (`id_produk_2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
