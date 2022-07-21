-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2022 pada 09.39
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satukopi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_detail_pembelian`
--

CREATE TABLE `dt_detail_pembelian` (
  `id_detail` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_detail_pembelian`
--

INSERT INTO `dt_detail_pembelian` (`id_detail`, `id_pembelian`, `id_menu`, `pembelian`) VALUES
(29, 16, 2, 1),
(30, 16, 1, 1),
(31, 17, 2, 3),
(32, 17, 5, 1),
(33, 17, 7, 1),
(34, 18, 1, 1),
(35, 18, 11, 1),
(36, 18, 10, 2),
(37, 19, 3, 1),
(38, 19, 8, 1),
(39, 20, 1, 1),
(40, 21, 2, 1),
(41, 21, 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_event`
--

CREATE TABLE `dt_event` (
  `id_event` int(255) NOT NULL,
  `tema` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(255) NOT NULL,
  `pelaksana` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_event`
--

INSERT INTO `dt_event` (`id_event`, `tema`, `tanggal`, `jam`, `pelaksana`, `keterangan`, `foto`) VALUES
(23, 'SOUNDALIVE#2', '2021-12-24', '16:00', 'IKABAMA UMSIDA', 'Perayaan ulang tahun UKM Ikabama Umsida yang ke 10 tahun', '1749562361_event1.jpg'),
(24, 'SOUNDALIVE#3', '2021-11-24', '13:00', 'IKABAMA UMSIDA', 'Perayaan ulang tahun UKM Ikabama Umsida yang ke 11 tahun', '1313862350_event2.jpg'),
(25, 'Buka Puasa Bersama', '2021-07-21', '15:00', 'The Voice', 'Buka puasa bersama perkumpulan musik se sidoarjo', '1132160164_event3.jpg'),
(26, 'Penggalangan Dana', '2021-10-20', '16:00', 'IKABAMA UMSIDA', 'Penggalangan dana untuk sahabat-sahabat kita yang membutuhkan', '1224890323_event4.jpg'),
(27, 'SOUNDALIVE#4', '2021-11-18', '13:00', 'IKABAMA UMSIDA', 'Perayaan ulang tahun UKM IKABAMA UMSIDA yang ke 22 tahun ', '621586552_event2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_menu`
--

CREATE TABLE `dt_menu` (
  `id_menu` int(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `tipe` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_menu`
--

INSERT INTO `dt_menu` (`id_menu`, `nama_produk`, `harga`, `tipe`, `keterangan`, `foto`) VALUES
(1, 'V60', '10000', 'minuman coffee', 'Kopi yang dibuat dengan cara di drip yang nantinya menghasilkan rasa kopi yang khas', '2004621159_menu1.jpg'),
(2, 'Affogato', '14000', 'minuman coffee', 'Kopi yang di campur dengan es krim vanila untuk memberikan rasa manis dalam kopi ', '1408321255_menu2.jpg'),
(3, 'Banana Killer', '12000', 'minuman coffee', 'kopi yang diberikan perasa pisang dan tambahan susu dapat memberikan kombinasi rasa yang pas dan enak', '2109893243_menu3.jpg'),
(4, 'Moccachino', '12000', 'minuman coffee', 'Kopi dengan campuran coklat yang kuat dan dapat memberikan rasa kopi dengan pahitnya coklat', '1237332929_menu4.jpg'),
(5, 'Cappuchino', '12000', 'minuman coffee', 'Kopi dengan campuran susu dan di buat dengan alat khusus dapat memberikan rasa kopi yang creemy dan pas', '239602322_menu5.jpg'),
(6, 'Choco Cheese', '15000', 'minuman non coffee', 'Minuman Coklat yang diberikan perasa keju dengan toping Choco dapat memberikan rasa yang enak di mulut', '2025738078_menu6.jpg'),
(7, 'Marie Regal Frape', '15000', 'minuman non coffee', 'Minuman Coklat yang di campur dengan susu dan di taburi toping biskuit sehingga dapat memberikan rasa yang pas dari beberapa campuran yang ada', '1431057473_menu7.jpg'),
(8, 'Donut', '7000', 'makanan', 'Donat yang di berikan toping berbagai jenis coklat yang dicairkan dan di tambahkan lagi dengan toping yang lain anda dapat memilih toping yang tersedia', '1907765266_menu8.jpg'),
(9, 'Stawberry Juice', '10000', 'minuman non coffee', 'Stawberry yang di blender hingga halus dan di campurkan dengan susu dapat memberikan rasa yang lembut dan enak di mulut', '776284748_menu9.jpg'),
(10, 'Vietnam Drip', '8000', 'minuman coffee', 'Kopi yang dibuat dengan cara khusus yang nantinya memberikan aroma kopi yang nikmat dengan ditambahkannya susu ', '1292173866_menu10.jpg'),
(11, 'French Fries', '10000', 'makanan', 'Kentang Goreng yang nantinya di berikan beberapa bumbu dengan tambahan saus dan mayones', '1658152905_menu11.jpg'),
(12, 'Avocado Latte', '12000', 'minuman coffee', 'Kopi yang dicampurkan dengan perasa alpukat yang nantinya dapat memberikan rasa kopi dengan beberapa rasa alpukat dan enak di mulut ', '769190175_menu12.jpg'),
(13, 'Red Valvet Latte', '12000', 'minuman coffee', 'Kopi yang dicampurkan dengan perasa stawberry dan susu sehingga dapat memberikan campuran rasa yang pas dan enak dimulut', '444183574_menu13.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_pembelian`
--

CREATE TABLE `dt_pembelian` (
  `id_pembelian` int(255) UNSIGNED NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `waktu` varchar(255) NOT NULL,
  `total_menu` varchar(255) NOT NULL,
  `total_bayar` int(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `status` enum('0','1','2','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_pembelian`
--

INSERT INTO `dt_pembelian` (`id_pembelian`, `nama`, `alamat`, `kelas`, `kategori`, `waktu`, `total_menu`, `total_bayar`, `foto`, `id_user`, `kondisi`, `status`) VALUES
(16, 'Andre Aulia R. R.', 'Jl Sukodono no 52', '', 'umum', '2022-01-20 08:20', '2', 34000, '420103744_566379048_bukti.jpg', 53, 'Sudah Diantar', '2'),
(17, 'Andre Aulia R. R.', 'Perumahan Tanggulangin no 25 RT 5', '', 'umum', '2022-01-20 08:21', '5', 79000, '576302702_1032620518_bukti.jpg', 53, 'Sudah Diantar', '2'),
(18, 'Yuda Putra', '', 'USAHA PERJALANAN WISATA 2 KELAS 2', 'siswa', '2022-01-20 08:40', '4', 41000, '121767403_1573010510_bukti.jpg', 55, 'Sudah Diantar', '2'),
(19, 'Yuda Putra', '', 'PERHOTELAN 3 KELAS 2', 'siswa', '2022-01-20 08:40', '2', 24000, '1763455081_1032620518_bukti.jpg', 55, 'Masih Diproses', '1'),
(20, 'Achmad Reza Maulana ', 'Jl Gelam No 25 RT 8 RW 3', '', 'umum', '2022-01-20 08:41', '1', 20000, '', 56, 'Belum bayar', '0'),
(21, 'Achmad Reza Maulana ', '', 'PERHOTELAN 3 KELAS 2', 'siswa', '2022-01-20 08:41', '2', 31000, '', 56, 'Belum bayar', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dt_user`
--

CREATE TABLE `dt_user` (
  `id_user` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `jabatan` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dt_user`
--

INSERT INTO `dt_user` (`id_user`, `nama`, `alamat`, `telepon`, `foto`, `jabatan`, `username`, `password`) VALUES
(52, 'Faisal Akbar Putra', 'Jl. Lingkar Barat no 26 RT3', '08299383674844', '774810333_profil.jpg', 'owner', 'owner', 'owner'),
(53, 'Andre Aulia R. R.', 'Desa Lebo Kecamatan Candi', '08628364829393', '1616935527_profil2.jpg', 'pembeli', 'pembeli', 'pembeli'),
(54, 'Achmad Fajar Akbar', 'Desa Sumorame no 2 b26', '08935271816233', '1330342486_profil3.jpg', 'barista', 'barista', 'barista'),
(55, 'Yuda Putra', 'Desa kebun jeruk no 25 RT 5 RW 8', '08748263484733', '1892279449_profil4.jpg', 'pembeli', 'pembeli2', 'pembeli2'),
(56, 'Achmad Reza Maulana ', 'Jl tulangan no 20 B67', '089263836748', '977882181_profil9.jpg', 'pembeli', 'pembeli3', 'pembeli3'),
(57, 'Alifian Maulana Akbar', 'Perumahan Kahuripan NO 52 RT 8', '08537364782828', '472309275_profil7.jpg', 'pembeli', 'pembeli4', 'pembeli4'),
(58, 'Ezra Eka Maulidia', 'Desa Candi No 78 RW 9 RT 6', '08263736272', '673750456_profil8.jpg', 'pembeli', 'pembeli5', 'pembeli5');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dt_detail_pembelian`
--
ALTER TABLE `dt_detail_pembelian`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `dt_event`
--
ALTER TABLE `dt_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `dt_menu`
--
ALTER TABLE `dt_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `dt_pembelian`
--
ALTER TABLE `dt_pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `dt_user`
--
ALTER TABLE `dt_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dt_detail_pembelian`
--
ALTER TABLE `dt_detail_pembelian`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `dt_event`
--
ALTER TABLE `dt_event`
  MODIFY `id_event` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `dt_menu`
--
ALTER TABLE `dt_menu`
  MODIFY `id_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `dt_pembelian`
--
ALTER TABLE `dt_pembelian`
  MODIFY `id_pembelian` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `dt_user`
--
ALTER TABLE `dt_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
