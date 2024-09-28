-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Sep 2024 pada 07.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monev_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_angkatan`
--

CREATE TABLE `tbl_angkatan` (
  `kode_angkatan` varchar(3) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_angkatan`
--

INSERT INTO `tbl_angkatan` (`kode_angkatan`, `keterangan`) VALUES
('21', '2021'),
('22', '2022'),
('23', '2023'),
('30', '2030');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cross_auth`
--

CREATE TABLE `tbl_cross_auth` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `waktu` datetime NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cross_auth`
--

INSERT INTO `tbl_cross_auth` (`id`, `user`, `waktu`, `ket`) VALUES
(1, '42321018', '2024-08-26 20:00:45', 'Pengguna dengan username42321018melakukan cross \n    authority dengan akses sebagaiDosen'),
(2, '42321018', '2024-08-26 20:06:16', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \n    authority dengan akses sebagaiMahasiswa'),
(3, 'admin', '2024-08-26 20:24:04', 'Pengguna dengan username admin , nama: administrator sistem melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(4, '42321018', '2024-08-26 20:26:10', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \n    authority dengan akses sebagaiMahasiswa'),
(5, 'admin', '2024-08-26 21:02:22', 'Pengguna dengan username admin , nama: administrator sistem melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(6, 'admin', '2024-08-26 21:03:00', 'Pengguna dengan username admin , nama: administrator sistem melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(7, '157890', '2024-08-26 21:03:20', 'Pengguna dengan username 157890 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(8, '157890', '2024-08-26 21:03:31', 'Pengguna dengan username 157890 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(9, 'admin', '2024-08-26 21:04:46', 'Pengguna dengan username admin , nama: administrator sistem melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(10, '42321018', '2024-08-27 14:29:10', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(11, '42321018', '2024-08-27 14:31:27', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(12, '42321018', '2024-08-27 14:31:43', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(13, '111', '2024-09-05 16:22:01', 'Pengguna dengan username 111 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(14, '42321018', '2024-09-05 16:59:23', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(15, '111', '2024-09-05 18:15:53', 'Pengguna dengan username 111 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(16, '42321018', '2024-09-05 18:20:36', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(17, '111', '2024-09-05 18:26:00', 'Pengguna dengan username 111 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(18, '42321018', '2024-09-05 18:35:30', 'Pengguna dengan username 42321018 , nama: NAYLU SYIFA melakukan cross \r\n    authority dengan akses sebagaiMahasiswa'),
(19, '111', '2024-09-05 18:39:20', 'Pengguna dengan username 111 , nama: FUAIDA NABYLA M.KOM melakukan cross \r\n    authority dengan akses sebagaiDosen'),
(20, '', '2024-09-06 10:49:48', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(21, '', '2024-09-06 13:26:02', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(22, '', '2024-09-06 15:51:52', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(23, '', '2024-09-06 15:51:59', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(24, '', '2024-09-06 15:52:06', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(25, '', '2024-09-06 15:52:13', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(26, '', '2024-09-06 15:52:44', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(27, '', '2024-09-09 09:16:30', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(28, '', '2024-09-09 10:07:21', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(29, '', '2024-09-09 10:07:28', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(30, '', '2024-09-09 13:48:13', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(31, '', '2024-09-09 13:48:20', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(32, '', '2024-09-09 15:40:13', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(33, '', '2024-09-09 16:48:42', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(34, '', '2024-09-10 09:40:36', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(35, '', '2024-09-10 13:40:35', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(36, 'admin', '2024-09-10 16:46:52', 'Pengguna dengan username admin , nama: Administrator Sistem melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(37, '', '2024-09-11 08:47:00', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(38, '', '2024-09-11 09:49:52', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(39, '', '2024-09-11 13:57:43', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(40, '', '2024-09-12 09:54:36', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(41, '', '2024-09-17 10:50:06', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(42, '', '2024-09-17 13:25:03', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(43, '', '2024-09-17 14:45:26', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(44, '', '2024-09-18 09:40:43', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(45, '', '2024-09-18 13:22:20', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator'),
(46, '', '2024-09-25 10:25:02', 'Pengguna dengan username  , nama:  melakukan cross \r\n    authority dengan akses sebagaiAdministrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `status` int(1) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nidn`, `nama`, `email`, `kontak`, `status`, `foto`) VALUES
('111', 'FUAIDA NABYLA M.KOM', 'nabyla@gmail.com', '08998289991', 1, '../img/dosen/fotodosen1725858118.png'),
('112', 'YUSUF YUDHISTIRA M.KOM', 'yusuf@gmail.com', '00928827788', 2, '../img/dosen/fotodosen1725858190.png'),
('113', 'MUKRODIN M.KOM', 'Mukrodin@gmail.com', '08277189999', 1, ''),
('114', 'ACHMAD SYAUQI M.KOM', 'syauqi@gmail.com', '08271611777', 1, ''),
('115', 'EKO SUDRAJAT M.KOM', 'eko@gmail.com', '09277189991', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas_bimbingan`
--

CREATE TABLE `tbl_kelas_bimbingan` (
  `id_kelas` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `kode_periode` varchar(4) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `status` int(1) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `progres` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kelas_bimbingan`
--

INSERT INTO `tbl_kelas_bimbingan` (`id_kelas`, `nidn`, `kode_periode`, `nim`, `status`, `masa_berlaku`, `progres`) VALUES
(1, '111', 'P241', '42321018', 1, '2024-09-25', '3'),
(3, '111', 'P241', '42321021', 1, '2024-09-23', '1'),
(4, '113', 'P241', '42321022', 1, '2024-09-30', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id` int(1) NOT NULL,
  `elemen` varchar(50) NOT NULL,
  `lokasi_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_konfigurasi`
--

INSERT INTO `tbl_konfigurasi` (`id`, `elemen`, `lokasi_file`) VALUES
(1, 'logo-app', '../img/img.logoapp1725277102.png'),
(2, 'logo-tittlebar', '../img/img.logotitle1725327847.png'),
(3, 'SISTEM INFORMASI MONITORING SKRIPSI', 'kosong'),
(4, 'Pusat Sistem Informasi dan Komputerisasi', 'kosong'),
(5, 'UNIVERSITAS PERADABAN', 'kosong');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `angkatan` varchar(5) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `kelamin` varchar(1) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`nim`, `nama`, `prodi`, `status`, `angkatan`, `kontak`, `kelamin`, `foto`) VALUES
('42321018', 'NAYLU SYIFA', '423', 1, '21', '83861228265', 'P', '../img/mhs/fotomhsfotomhs1725865998.png'),
('42321019', 'NADIA NURUL ', '424', 2, '21', '89382727838', 'P', '../img/mhs/fotomhsfotomhs1725865998.png'),
('42321020', 'SITI SOFIATUN NISWAH', '424', 3, '21', '93383892992', 'P', '../img/mhs/fotomhsfotomhs1725866011.png'),
('42321021', 'DELA ANTIKA', '424', 1, '21', '83392772738', 'P', ''),
('42321022', 'AZMIA MUALIFAH', '423', 2, '21', '83729992022', 'P', ''),
('42321023', 'HALIZHA INTAN', '422', 3, '21', '87229010200', 'P', ''),
('42321024', 'LARAS SETIA', '424', 3, '21', '89928990021', 'P', ''),
('42321025', 'DANITA HAYYU S', '423', 4, '21', '38292832222', 'P', ''),
('42321026', 'ELGA LISTI', '423', 1, '21', '83728990022', 'P', ''),
('42321027', 'SRI MAYLANI PUTRI', '424', 1, '21', '86678822323', 'P', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mhs_bimbingan`
--

CREATE TABLE `tbl_mhs_bimbingan` (
  `id_kelas` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `kode_periode` varchar(4) NOT NULL,
  `id_progres` varchar(5) NOT NULL,
  `is_ulang_perpanjang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mhs_bimbingan`
--

INSERT INTO `tbl_mhs_bimbingan` (`id_kelas`, `nim`, `kode_periode`, `id_progres`, `is_ulang_perpanjang`) VALUES
(1, '42321018', 'P241', '4', '1'),
(1, '42321019', 'P241', '4', '1'),
(2, '42321020', 'P241', '3', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `username` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`username`, `password`, `nama_user`, `status`) VALUES
('111', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'FUAIDA NABYLA M.KOM', 1),
('112', '601ca99d55f00a2e8e736676b606a4d31d374fdd', 'YUSUF YUDHISTIRA M.KOM', 1),
('113', 'e993215bfdaa515f6ea00fafc1918f549119f993', 'MUKRODIN M.KOM', 1),
('114', 'ecb7937db58ec9dea0c47db88463d85e81143032', 'ACHMAD SYAUQI M.KOM', 1),
('115', 'efa6e44dfa0145249be273ecd84a97f534b04920', 'EKO SUDRAJAT M.KOM', 1),
('42321018', 'e6f7917199ed71d21a4f09c12ec43a67d2a62583', 'NAYLU SYIFA', 2),
('42321019', 'a91a3cfe2151d0d5ab93afe63188a3223d872623', 'NADIA NURUL ', 2),
('42321020', '11149d6fe71f931df6d797cc070a8c0085ce1b79', 'SITI SOFIATUN NISWAH', 2),
('42321021', 'f73483513465443d37b49c810b43ef55c80a92ff', 'DELA ANTIKA', 2),
('42321022', 'f4dcc5704e1274c2c34e7f5b50aae6bde404f517', 'AZMIA MUALIFAH', 2),
('42321023', '46293c176b2c9d1236a6e6735fac65b52b2e8d2f', 'HALIZHA INTAN', 2),
('42321024', '67743606ca997d13058d732ce30602addc79693c', 'LARAS SETIA', 2),
('42321025', 'd7ef731708dfd7cd2a6316b72d9bbe5674b22477', 'DANITA HAYYU S', 2),
('42321026', 'a8bfdd40555efedd94c220c882fa4b5b7da8b500', 'ELGA LISTI', 2),
('42321027', 'c78e843cbdc9fde21a29ef32a9274f76ec45d48d', 'SRI MAYLANI PUTRI', 2),
('42329039', '193b0313b2182dac0b8d23c34fcee3fd9eeb7223', 'NAYLU SYIFA S.KOM', 1),
('admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Administrator Sistem', 0),
('admin1', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'admin', 0),
('admin2', '315f166c5aca63a157f7d41007675cb44a948b33', 'adminupb', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_periode`
--

CREATE TABLE `tbl_periode` (
  `kode_periode` varchar(4) NOT NULL,
  `periode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_periode`
--

INSERT INTO `tbl_periode` (`kode_periode`, `periode`) VALUES
('P241', '2021-GANJIL'),
('P242', '2021-GENAP'),
('P243', '2022-GANJIL'),
('P245', '2026-GANJIL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`kode_prodi`, `nama_prodi`) VALUES
('421', 'FARMASI'),
('422', 'TE'),
('423', 'SISTEM INFORMASI'),
('424', 'INFORMATIKA'),
('425', 'AGRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_progres`
--

CREATE TABLE `tbl_progres` (
  `id_progres` int(1) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_progres`
--

INSERT INTO `tbl_progres` (`id_progres`, `keterangan`) VALUES
(0, 'Belum'),
(1, 'Judul'),
(2, 'Bab 1'),
(3, 'Bab 2'),
(4, 'Bab 3'),
(5, 'Bab 4'),
(6, 'Bab 5'),
(7, 'Selesai'),
(8, 'Tunda'),
(9, 'ulang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(1) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `status`) VALUES
(1, 'Aktif'),
(2, 'Non Aktif'),
(3, 'Cuti'),
(4, 'Drop out'),
(5, 'pased out');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_bimbingan`
--

CREATE TABLE `tb_detail_bimbingan` (
  `id` bigint(20) NOT NULL,
  `nidn` varchar(20) DEFAULT NULL,
  `nim` varchar(10) DEFAULT NULL,
  `tgl` datetime NOT NULL,
  `percakapan` text NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `keterangan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_bimbingan`
--

INSERT INTO `tb_detail_bimbingan` (`id`, `nidn`, `nim`, `tgl`, `percakapan`, `id_kelas`, `keterangan`) VALUES
(3, NULL, '42321018', '2024-09-06 14:34:54', 'assalamualaikum', 1, 1),
(4, NULL, '42321018', '2024-09-06 14:41:26', 'assalamualaikum', 1, 1),
(5, NULL, '42321018', '2024-09-06 14:41:59', 'assalamualaikum', 1, 1),
(6, NULL, '42321018', '2024-09-06 14:42:34', 'hm', 1, 1),
(7, NULL, '42321018', '2024-09-06 14:47:25', 'PUNTEN', 1, 1),
(8, '111', NULL, '2024-09-06 15:18:36', 'Y', 1, 1),
(9, '111', NULL, '2024-09-12 09:55:37', 'qq', 1, 1),
(10, '111', NULL, '2024-09-12 09:56:00', 'q', 1, 1),
(11, '111', NULL, '2024-09-12 09:59:15', 'qq', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_angkatan`
--
ALTER TABLE `tbl_angkatan`
  ADD PRIMARY KEY (`kode_angkatan`);

--
-- Indeks untuk tabel `tbl_cross_auth`
--
ALTER TABLE `tbl_cross_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `tbl_kelas_bimbingan`
--
ALTER TABLE `tbl_kelas_bimbingan`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `tbl_periode`
--
ALTER TABLE `tbl_periode`
  ADD PRIMARY KEY (`kode_periode`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `tbl_progres`
--
ALTER TABLE `tbl_progres`
  ADD PRIMARY KEY (`id_progres`);

--
-- Indeks untuk tabel `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_bimbingan`
--
ALTER TABLE `tb_detail_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_cross_auth`
--
ALTER TABLE `tbl_cross_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas_bimbingan`
--
ALTER TABLE `tbl_kelas_bimbingan`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_progres`
--
ALTER TABLE `tbl_progres`
  MODIFY `id_progres` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_bimbingan`
--
ALTER TABLE `tb_detail_bimbingan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
