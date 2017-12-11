-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 04 Des 2017 pada 23.18
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_akses`
--

CREATE TABLE `tb_akses` (
  `id` int(11) NOT NULL,
  `username` varchar(12) DEFAULT NULL,
  `password` text,
  `idLevel` int(11) DEFAULT NULL,
  `status` enum('open','close') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_akses`
--

INSERT INTO `tb_akses` (`id`, `username`, `password`, `idLevel`, `status`) VALUES
(37, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'open'),
(38, 'ustadz', '17ddfda58362a5c91bec8361fadbb635', 2, 'open'),
(39, 'santri', '7d1959dcd37659e4cfdc794945cea9a8', 3, 'open');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `idKategori` int(4) NOT NULL,
  `kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`idKategori`, `kategori`) VALUES
(1, 'Pengasuh'),
(2, 'Pengurus'),
(3, 'Santri'),
(4, 'Warga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `kode_kelas` varchar(20) NOT NULL,
  `grade` enum('1 Awaliyah','2 Awaliyah','1 Wustho','2 Wustho','1 Ulya','2 Ulya','Mutakhorrijin') DEFAULT NULL,
  `th_pel` enum('2014-2015','2015-2016','2016-2017','2017-2018','2018-2019','2019-2020') NOT NULL,
  `kode_ustadz` char(10) NOT NULL,
  `kelas` enum('Kelas A','Kelas B','Kelas C','Kelas D') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`kode_kelas`, `grade`, `th_pel`, `kode_ustadz`, `kelas`) VALUES
('20171ibb', '1 Awaliyah', '2017-2018', '002', 'Kelas B'),
('20171iba', '1 Awaliyah', '2017-2018', '055', 'Kelas A'),
('20171ibc', '2 Awaliyah', '2017-2018', '008', 'Kelas A'),
('20171ibd', '2 Awaliyah', '2017-2018', '066', 'Kelas B'),
('20171ibe', '1 Wustho', '2017-2018', '003', 'Kelas A'),
('20171ibf', '2 Wustho', '2017-2018', '055', 'Kelas A'),
('20171ibg', '1 Ulya', '2017-2018', '002', 'Kelas A'),
('20171ibh', '2 Ulya', '2014-2015', '008', 'Kelas A'),
('20171ibi', 'Mutakhorrijin', '2017-2018', '066', 'Kelas A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kitab`
--

CREATE TABLE `tb_kitab` (
  `kode_pelajaran` char(20) NOT NULL,
  `nama_pelajaran` char(50) DEFAULT NULL,
  `kitab` varchar(100) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kitab`
--

INSERT INTO `tb_kitab` (`kode_pelajaran`, `nama_pelajaran`, `kitab`, `grade`) VALUES
('25B', 'Qiro\'atul Kutub', 'Safinatun Naja', '1 Awaliyah'),
('25A', 'Fiqih', 'Fasholatan', '2 Awaliyah'),
('26A', 'Akhlaq', 'Birru Walidaikum', '1 Wustho'),
('26C', 'Akhlaq', 'Alala', '2 Wustho'),
('26B', 'Hadits', 'Budi Luhur', '1 Ulya'),
('26D', 'Bahasa Arab', 'Qiroatul \'Ashriyah', '2 Ulya'),
('27A', 'Pego', 'Ala Ngalah', 'Mutakhorrijin'),
('27B', 'Tahsinul Khot', 'Ala Ngalah', '1 Awaliyah'),
('22A', 'Nahwu', 'Nahwu Jawan', '1 Awaliyah'),
('23A', 'Akhlaq', 'Mathlab', '2 Awaliyah'),
('22C', 'Bahasa Arab', 'Ro\'sun Sirah', '1 Wustho'),
('23C', 'Tarikh & Hadits Syarif', 'TarikhHadits', '2 Wustho'),
('23B', 'Tauhid', 'Sullamud Diyanah', '1 Ulya'),
('23D', 'Tajwid & Tafsir', 'Syifa\'ul Jinan & Juz\'amma', '2 Ulya'),
('24A', 'Fiqih', 'Mabadiul Fiqhiyah I', 'Mutakhorrijin'),
('24C', 'Fiqih', 'Mabadiul Fiqhiyah II', '1 Awaliyah'),
('24B', 'Qiroatul Kutub', 'Sullamut Taufiq', '1 Awaliyah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_level`
--

CREATE TABLE `tb_level` (
  `id` int(11) NOT NULL,
  `level` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_level`
--

INSERT INTO `tb_level` (`id`, `level`) VALUES
(1, 'Staff Kemahasiswaan'),
(2, 'Kasubag'),
(3, 'Kasubag Fakultas'),
(4, 'Kabag'),
(5, 'Mahasiswa'),
(6, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `avatar` char(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`id_user`, `username`, `password`, `status`, `avatar`) VALUES
('admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'user.jpg'),
('055', 'ustadz', '17ddfda58362a5c91bec8361fadbb635', 'ustadz', 'avatar.png'),
('002', 'santri', '7d1959dcd37659e4cfdc794945cea9a8', 'santri', 'avatar.png'),
('S0001', 'S0001', 'T4gqgqZmq6f3h3t/lDQXr5Gbh2vmsFiBWwHEkTLz6/iU8gyHumY9XDM7mMDi0V4xDeXqpwSs847bIIzrKtkFpw==', 'santri', 'S0001.png'),
('008', '008', 'AB7iwBU3ogb/l3uxbmVLRtiteNiTRu8XyZ1Ngxr3EFa9rFsGQfQTXtzwyz5PJ9savbgj1syIVKHQQ6E9o/TmCA==', 'guru', '008.jpg'),
('S0018', 'S0018', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0017', 'S0017', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0016', 'S0016', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0015', 'S0015', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0014', 'S0014', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0013', 'S0013', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0012', 'S0012', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0011', 'S0011', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0010', 'S0010', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0009', 'S0009', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0008', 'S0008', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0007', 'S0007', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0006', 'S0006', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0005', 'S0005', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0004', 'S0004', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0003', 'S0003', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0002', 'S0002', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0019', 'S0019', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0020', 'S0020', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0021', 'S0021', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0022', 'S0022', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0023', 'S0023', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0024', 'S0024', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0025', 'S0025', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0026', 'S0026', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0027', 'S0027', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0028', 'S0028', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0029', 'S0029', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0030', 'S0030', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0031', 'S0031', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0032', 'S0032', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0033', 'S0033', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('S0034', 'S0034', 'QsiQJffbZ/P9H3EwRf7PpYLEJqJNhqUZD/Mkx6qOZiqlFJYAo+/knncKFIWRWaSbxT8l3AQia15HIiBtcH8xGA==', 'santri', 'avatar.png'),
('066', '066', 'awZe8D6ijvN750wckb40trX0bpD/H6cbWGw5liDfZf2deotoNdcNun/DgVpqe8Od0N4hYzVGUVF7NqnV8oCykg==', 'guru', '066.jpg'),
('admin1', 'admin1', 'Y4qiiyaPESKY3GTPynrX+pBUMZOhIMErhy6AIUSgTZLjckqSJB+yA/jBO0M1ulXn3Ecz5EnEhZLWOZms0iYtoA==', 'admin', ''),
('003', '003', 'pl5txnnj2F7LiSfTkLh78Xu/eAcjsksH8j/Pr8nrxntsc5oImKLfxAw1R8nMzs6CbeTu45BYotCQktM2aHAGdA==', 'guru', 'avatar.png'),
('nufail', 'nufail', 'IT3td6wMPrQvVClpHP5R3ajX2uLpdXLoyAVzLqiMHbHhtaA6gElSkBXP2TMAFuGuVhDa6mPmPkD9t/rMYeCwBQ==', 'admin', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_buku`
--

CREATE TABLE `tb_master_buku` (
  `idBuku` int(10) NOT NULL,
  `judulBuku` varchar(50) NOT NULL,
  `waktuMasuk` date DEFAULT NULL,
  `jumlahBuku` int(5) DEFAULT NULL,
  `penulisBuku` varchar(50) DEFAULT NULL,
  `tahunCetakBuku` int(5) DEFAULT NULL,
  `penerbitBuku` varchar(100) DEFAULT NULL,
  `kotaPenerbitBuku` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_buku`
--

INSERT INTO `tb_master_buku` (`idBuku`, `judulBuku`, `waktuMasuk`, `jumlahBuku`, `penulisBuku`, `tahunCetakBuku`, `penerbitBuku`, `kotaPenerbitBuku`) VALUES
(1, 'Matematika Kalkulus', '2017-12-04', 4, 'Andi Jogjakarta', 2016, 'Andi', 'Malang'),
(2, 'Statistika', '2017-12-26', 5, 'M. Iqbal Fauzi', 2017, 'Fauzi', 'Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_pinjam_dan_denda`
--

CREATE TABLE `tb_master_pinjam_dan_denda` (
  `idLamaPinjamDanDenda` int(10) NOT NULL,
  `jenisPeminjam` int(4) NOT NULL,
  `waktuPinjam` int(4) NOT NULL,
  `denda` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_pinjam_dan_denda`
--

INSERT INTO `tb_master_pinjam_dan_denda` (`idLamaPinjamDanDenda`, `jenisPeminjam`, `waktuPinjam`, `denda`) VALUES
(1, 2, 3, 3000),
(2, 3, 3, 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_rak`
--

CREATE TABLE `tb_master_rak` (
  `idRak` int(10) NOT NULL,
  `namaRak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_rak`
--

INSERT INTO `tb_master_rak` (`idRak`, `namaRak`) VALUES
(1, 'Ilmu Tajwid'),
(2, 'Ilmu Quran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `nilai_uas` double NOT NULL,
  `nilai_tugas` double NOT NULL,
  `semester` int(11) NOT NULL,
  `NIS` varchar(20) NOT NULL,
  `kode_kelas` char(10) NOT NULL,
  `kode_pelajaran` char(20) NOT NULL,
  `kode_guru` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_santri`
--

CREATE TABLE `tb_santri` (
  `NIS` varchar(20) NOT NULL,
  `nama_santri` varchar(50) NOT NULL,
  `gender` int(11) NOT NULL,
  `status_aktif` int(11) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date DEFAULT NULL,
  `kamar` varchar(5) DEFAULT NULL,
  `tmp_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_santri`
--

INSERT INTO `tb_santri` (`NIS`, `nama_santri`, `gender`, `status_aktif`, `nama_wali`, `alamat`, `tgl_masuk`, `kamar`, `tmp_lahir`, `tgl_lahir`) VALUES
('S0030', 'Mohamad Aditiya Rouf', 1, 1, 'Pangestu Wijaya', 'Pasuruan', '2017-05-23', 'A.07', 'Bojonegoro', '2017-05-11'),
('S0031', 'Mohammad Afandi Maulana', 1, 1, 'Roudfi Hidayatulloh', 'Pasuruan', '2017-04-23', 'E.17', 'Pasuruan', '2017-05-05'),
('S0032', 'MH. Ainun Najib', 2, 2, 'H. Subhan Bachtiar', 'Malang', '2017-05-01', 'F.11', 'Malang', '2017-05-01'),
('S0028', 'Moch. Nur Fajari', 1, 1, 'Nanang Subagiyo', 'Pasuruan', '2017-05-23', 'A.03', 'Jember', '2017-05-05'),
('S0029', 'Mochammad Badri Fahmi', 1, 1, 'Odie Setyawan Ashari', 'Pasuruan', '2017-05-23', 'E.23', 'Banyuwangi', '2017-05-06'),
('S0026', 'M. Zakariya', 1, 1, 'Muhammad Isa Asrori', 'Pasuruan', '2017-05-25', 'E.22', 'Bondowoso', '2017-05-19'),
('S0027', 'Malik Abdul Aziz', 1, 1, 'Muhammad Rojiqin', 'Pasuruan', '2017-05-25', 'F.11', 'Malang', '2017-09-08'),
('S0025', 'M. Zainul Amin', 1, 1, 'Muhammad Basthi Ulin Nuroin', 'Pasuruan', '2017-05-25', 'A.13', 'Situbondo', '2017-09-08'),
('S0023', 'M. Syaifudin Bahri', 1, 1, 'Mohammad Aliy Syamsuddin', 'Pasuruan', '2017-05-25', 'E.10', 'Probolinggo', '2017-09-08'),
('S0024', 'M. Syamsul Ma\'Arif', 1, 1, 'Muchammad Zulianto', 'Pasuruan', '2017-05-25', 'F.28', 'Sidoarjo', '2017-09-08'),
('S0021', 'M. Junaidi', 1, 1, 'Mochammad Yusron Amin', 'Pasuruan', '2017-05-25', 'E.06', 'Mojokerto', '2017-09-08'),
('S0022', 'M. Misbach Zulkarnaen', 1, 1, 'Moh. Hilmi Masud', 'Pasuruan', '2017-05-25', 'E.14', 'Gresik', '2017-09-08'),
('S0020', 'M. Izzudin Alwi Zuhri', 1, 1, 'Mochammad Afif Rosyadi', 'Pasuruan', '2017-05-25', 'E.32', 'Lamongan', '2017-09-08'),
('S0019', 'M. Fajar Rahmat Al Ghifari', 1, 1, 'Mastur Adi', 'Pasuruan', '2017-05-25', 'E.25', 'Tuban', '2017-09-08'),
('S0018', 'M. Fahrizal Nurdiansyah', 1, 1, 'M. Taqyuddin Al Muayyad', 'Pasuruan', '2017-05-25', 'E.17', 'Bojonegoro', '2017-09-08'),
('S0017', 'M. Bustam Hariri', 1, 1, 'M. Sahal Amiluddin', 'Pasuruan', '2017-05-25', 'F.10', 'Ngawi', '2017-09-08'),
('S0016', 'M. Bahruddin', 1, 1, 'M. Khoirul Anam', 'Pasuruan', '2012-10-24', 'E.29', 'Magetan', '2017-09-08'),
('S0015', 'M. Ainul Yaqin', 1, 1, 'M. Fuad Asrori', 'Pasuruan', '2012-09-04', 'A.03', 'Madiun', '2017-09-08'),
('S0014', 'M. Abdul Gofur', 1, 1, 'M. Firdana Yusuf', 'Pasuruan', '2012-11-01', 'E.16', 'Jombang', '2017-09-08'),
('S0011', 'Javier Rizky Pratama Finandry', 1, 1, 'M. Bahrul Ulum', 'Pasuruan', '2012-10-27', 'F.31', 'Ponorogo', '2017-09-08'),
('S0012', 'Jefri Pradanto', 1, 1, 'M. Bashitul Maruf', 'Pasuruan', '2012-09-05', 'F.09', 'Pacitan', '2017-09-08'),
('S0013', 'Kiki Nur Ikhsan', 1, 1, 'M. Fathul Anam ', 'Pasuruan', '2012-08-18', 'F.13', 'Trenggalek', '2017-09-08'),
('S0010', 'Fiki Firmansyah', 1, 1, 'M. Bahrul Ulum', 'Pasuruan', '2012-09-20', 'F.12', 'Tulungagung', '2017-09-08'),
('S0009', 'Fahmi Hidayatulloh', 1, 1, 'M. Bahrudin', 'Pasuruan', '2012-08-13', 'A.08', 'Blitar', '2017-09-08'),
('S0008', 'Edo Dwi Prasetyo', 1, 1, 'M. Anisul Afy', 'Pasuruan', '2012-09-18', 'E.15', 'Malang', '2017-09-08'),
('S0007', 'Ahmad Silmy Ibqoo\'ul C. A ', 1, 1, 'Khoirul Marufih ', 'Pasuruan', '2012-11-19', 'Gbk', 'Pacitan', '2017-09-08'),
('S0006', 'Ahmad Mufli', 1, 1, 'Fajar Hidayatulloh', 'Pasuruan', '2012-09-06', 'F.13', 'Pasuruan', '2010-12-08'),
('S0005', 'Adi Saputro', 1, 1, 'Bagus Sulistyawan', 'Pasuruan', '2017-05-25', 'E.22', 'Tuban', '2017-09-08'),
('S0004', 'Achmad Yusryansyah', 1, 1, 'Arya Azzah Rawani S.', 'Pasuruan', '2017-05-25', 'E.05', 'Pasuruan', '2017-09-08'),
('S0003', 'Abdur Rahman Wahid', 1, 1, 'Ahmad Ali Masyhudi', 'Pasuruan', '2017-05-25', 'E.16', 'Malang', '2017-09-08'),
('S0001', 'A. Royhan', 1, 1, 'Ach. Muzayyid An-Nashir', 'Pasuruan', '2017-05-25', 'E.22', 'Surabaya', '2017-05-25'),
('S0002', 'Abdul Majid', 1, 1, 'Ach. Nadhif Irfani Asad', 'Pasuruan', '2017-05-25', 'E.25', 'Malang', '2017-09-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi_peminjaman`
--

CREATE TABLE `tb_transaksi_peminjaman` (
  `idPeminjaman` int(11) NOT NULL,
  `NIS` varchar(20) DEFAULT NULL,
  `idBuku` int(11) DEFAULT NULL,
  `jumlahPinjam` int(11) DEFAULT NULL,
  `tanggalPeminjaman` date DEFAULT NULL,
  `tanggalPengembalian` date DEFAULT NULL,
  `denda` int(10) DEFAULT NULL,
  `statusPinjam` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `tb_transaksi_peminjaman`
--

INSERT INTO `tb_transaksi_peminjaman` (`idPeminjaman`, `NIS`, `idBuku`, `jumlahPinjam`, `tanggalPeminjaman`, `tanggalPengembalian`, `denda`, `statusPinjam`) VALUES
(17, 'S0008', 1, 1, '2017-12-05', '2017-12-25', NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ustadz`
--

CREATE TABLE `tb_ustadz` (
  `kode_ustadz` char(10) NOT NULL,
  `nama_ustadz` varchar(50) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `status_aktif` int(11) DEFAULT NULL,
  `alamat` text,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ustadz`
--

INSERT INTO `tb_ustadz` (`kode_ustadz`, `nama_ustadz`, `gender`, `status_aktif`, `alamat`, `tgl_lahir`, `no_telp`) VALUES
('055', 'Muhammad Nufail Fajri', 1, 1, 'Jl. Pesantren Malang', '2012-08-22', '+62856 4659 7876'),
('008', 'Bahruddin Zakariya', 1, 1, 'Pasuruan', '2008-11-28', '+62856 4950 7229'),
('066', 'Muslim Muhammad', 2, 2, 'Malang Indonesia', '2013-05-23', '+62857 3684 6056'),
('io', 'ok', 1, 2, 'ok', '2017-12-31', '8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_level` (`idLevel`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`idKategori`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`kode_kelas`),
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `kode_guru` (`kode_ustadz`);

--
-- Indexes for table `tb_kitab`
--
ALTER TABLE `tb_kitab`
  ADD PRIMARY KEY (`kode_pelajaran`),
  ADD UNIQUE KEY `kode_pelajaran` (`kode_pelajaran`);

--
-- Indexes for table `tb_level`
--
ALTER TABLE `tb_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_master_buku`
--
ALTER TABLE `tb_master_buku`
  ADD PRIMARY KEY (`idBuku`);

--
-- Indexes for table `tb_master_pinjam_dan_denda`
--
ALTER TABLE `tb_master_pinjam_dan_denda`
  ADD PRIMARY KEY (`idLamaPinjamDanDenda`),
  ADD KEY `jenisPeminjam` (`jenisPeminjam`);

--
-- Indexes for table `tb_master_rak`
--
ALTER TABLE `tb_master_rak`
  ADD PRIMARY KEY (`idRak`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`NIS`,`kode_kelas`,`kode_pelajaran`,`kode_guru`),
  ADD KEY `kode_pelajaran` (`kode_pelajaran`,`kode_guru`);

--
-- Indexes for table `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`NIS`),
  ADD UNIQUE KEY `NIS` (`NIS`);

--
-- Indexes for table `tb_transaksi_peminjaman`
--
ALTER TABLE `tb_transaksi_peminjaman`
  ADD PRIMARY KEY (`idPeminjaman`),
  ADD KEY `NIS` (`NIS`),
  ADD KEY `idBuku` (`idBuku`);

--
-- Indexes for table `tb_ustadz`
--
ALTER TABLE `tb_ustadz`
  ADD PRIMARY KEY (`kode_ustadz`),
  ADD UNIQUE KEY `kode_guru` (`kode_ustadz`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_akses`
--
ALTER TABLE `tb_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `idKategori` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_level`
--
ALTER TABLE `tb_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_master_buku`
--
ALTER TABLE `tb_master_buku`
  MODIFY `idBuku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_master_pinjam_dan_denda`
--
ALTER TABLE `tb_master_pinjam_dan_denda`
  MODIFY `idLamaPinjamDanDenda` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_master_rak`
--
ALTER TABLE `tb_master_rak`
  MODIFY `idRak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_transaksi_peminjaman`
--
ALTER TABLE `tb_transaksi_peminjaman`
  MODIFY `idPeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_akses`
--
ALTER TABLE `tb_akses`
  ADD CONSTRAINT `tb_akses_ibfk_1` FOREIGN KEY (`idLevel`) REFERENCES `tb_level` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_master_pinjam_dan_denda`
--
ALTER TABLE `tb_master_pinjam_dan_denda`
  ADD CONSTRAINT `tb_master_pinjam_dan_denda_ibfk_1` FOREIGN KEY (`jenisPeminjam`) REFERENCES `tb_kategori` (`idKategori`);

--
-- Ketidakleluasaan untuk tabel `tb_transaksi_peminjaman`
--
ALTER TABLE `tb_transaksi_peminjaman`
  ADD CONSTRAINT `tb_transaksi_peminjaman_ibfk_1` FOREIGN KEY (`idBuku`) REFERENCES `tb_master_buku` (`idBuku`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
