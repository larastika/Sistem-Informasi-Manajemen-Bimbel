-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2024 at 03:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simbel`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` varchar(100) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama_guru` varchar(256) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telp` varchar(256) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `id_user`, `nama_guru`, `jekel`, `alamat`, `telp`, `temp`) VALUES
('G-001', 'U-0022', 'Guru', 'P', 'Bengkulu', '08786899', 10);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_guru` varchar(100) NOT NULL,
  `id_jenis_program` int(11) NOT NULL,
  `hari` varchar(200) NOT NULL,
  `jam` time NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mapel`, `id_guru`, `id_jenis_program`, `hari`, `jam`, `keterangan`) VALUES
(45, 1, 'G-001', 11, 'senin', '08:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_program`
--

CREATE TABLE `jenis_program` (
  `id_jenis_program` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `harga` double NOT NULL,
  `kuota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_program`
--

INSERT INTO `jenis_program` (`id_jenis_program`, `id_program`, `harga`, `kuota`) VALUES
(11, 12, 50000, 10),
(12, 13, 10000000, 7),
(13, 14, 14000000, 4),
(14, 15, 300000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `keterangan`) VALUES
(1, 'TWK', ''),
(2, 'TIU', ''),
(3, 'Psikolgi', ''),
(4, 'Bahasa Inggris', ''),
(5, 'Matematika', ''),
(6, 'Bahasa Indonesia', ''),
(7, 'Latihan Fisik', ''),
(8, 'Berenang', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(100) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `jenis_pembayaran` varchar(250) NOT NULL,
  `bukti` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pendaftaran`, `tgl_bayar`, `jumlah_bayar`, `jenis_pembayaran`, `bukti`, `status`, `keterangan`, `temp`) VALUES
('PBY2981', 1, '2121-02-17', 600000, '', 'sat1.jpg', 2, '', 1),
('PBY29810', 8, '2024-05-17', 10000000, '', 'Picture9.jpg', 1, '', 10),
('PBY29811', 9, '2024-05-17', 3000000, '', 'Picture71.jpg', 1, '', 11),
('PBY29812', 10, '2024-05-18', 14000000, '', '', 2, '', 13),
('PBY29814', 11, '0000-00-00', 0, '', '', 0, '', 14),
('PBY2982', 2, '2121-02-22', 600000, '', 'SATRIA-RAHMAT-PUTRA1-removebg-preview.png', 2, '', 2),
('PBY2983', 3, '2024-05-17', 14000000, '', 'Picture3.png', 1, '', 5),
('PBY2986', 4, '2024-05-17', 14000000, '', 'Picture4.jpg', 1, '', 6),
('PBY2987', 5, '2024-05-17', 14000000, '', 'Picture5.jpg', 1, '', 7),
('PBY2988', 6, '2024-05-17', 5000000, '', 'Picture6.jpg', 1, '', 8),
('PBY2989', 7, '2024-05-17', 5000000, '', 'Picture7.jpg', 1, '', 9);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `id_jenis_program` int(11) NOT NULL,
  `id_user` varchar(200) NOT NULL,
  `harga` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `id_jenis_program`, `id_user`, `harga`, `status`) VALUES
(1, 3, 'U-002', 600000, 1),
(2, 3, 'U-003', 600000, 1),
(3, 1, 'U-0015', 14000000, 0),
(4, 1, 'U-0016', 14000000, 0),
(5, 1, 'U-0017', 14000000, 0),
(6, 2, 'U-0018', 5000000, 0),
(7, 2, 'U-0019', 5000000, 0),
(8, 4, 'U-0020', 10000000, 0),
(9, 3, 'U-0021', 3000000, 0),
(10, 14, 'U-0024', 14000000, 1),
(11, 12, 'U-0025', 50000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` varchar(200) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `nama_siswa` varchar(256) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_lahir` varchar(200) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sekolah` varchar(256) NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `pekerjaan_ortu` varchar(250) NOT NULL,
  `alamat` text NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `id_user`, `nama_siswa`, `kelas`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `sekolah`, `nama_ortu`, `pekerjaan_ortu`, `alamat`, `temp`) VALUES
('S-001', 'U-002', 'Satria Rahmat Putra', '3', 'L', 'padang', '2021-02-08', 'SMP N 11 PADANG', 'Nur', 'swasta', 'Jl.Rimbo Data Rt.03 Rw.01, Kelurahan Banda Buek, Kecamatan Lubuk Kilangan, Padang', 1),
('S-002', 'U-003', 'hexa', '3', 'P', 'Payakumbuh', '2021-02-22', 'SMP N 11 PADANG', 'Nur', '-', 'Jl.Rimbo Data Rt.03 Rw.01, Kelurahan Banda Buek, Kecamatan Lubuk Kilangan, Padang', 2),
('S-003', 'U-0024', 'Siswa', '12', 'P', 'Bengkulu', '2007-02-06', 'SMA 1', 'Agus', 'Wiraswasta', 'Bengkulu', 3);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_pendaftaran`
--

CREATE TABLE `siswa_pendaftaran` (
  `id_siswa_pendaftaran` int(11) NOT NULL,
  `id_siswa` varchar(200) NOT NULL,
  `id_pendaftaran` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa_pendaftaran`
--

INSERT INTO `siswa_pendaftaran` (`id_siswa_pendaftaran`, `id_siswa`, `id_pendaftaran`, `status`, `keterangan`) VALUES
(5, 'S-001', 1, 1, 'lunas'),
(7, 'S-002', 2, 1, 'lunas'),
(8, 'S-003', 10, 1, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `nama_program`) VALUES
(12, 'WTC'),
(13, 'ATC'),
(14, 'HTC'),
(15, 'AKD & PSI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `image` varchar(150) NOT NULL,
  `password` varchar(260) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `no_telp`, `image`, `password`, `role_id`, `is_active`, `date_created`, `temp`) VALUES
('0', 'admin', 'admin@gmail.com', 0, 'default.png', '$2y$10$hWI2gkMUd9sX06bgXu6QIO7GPIlqUHEeMAd3AC5qqXCIX7N5qv.AS', 1, 1, 1601653500, 1),
('U-002', 'Satria Rahmat Putra', 'satriarahmatputra@gmail.com', 2147483647, 'default.png', '$2y$10$n1hr70uFOPx9fEGHf5qc4eSfMOT8rHEfGDhl7vDkaZxqUmtNMFMdO', 2, 1, 1613550185, 2),
('U-003', 'hexa', 'hexa@gmail.com', 2147483647, 'default.png', '$2y$10$d.RDLGYlVnps7oc1RqUJu.eeuqwmOTR/vLCbZf.bGYU6Lzvz0kH2u', 2, 1, 1614009384, 3),
('U-0015', 'Jupentus Nainggolan', 'Jupentusnainggolan@gmail.com', 813, 'default.png', '$2y$10$Vx3PCAgGoSlbEFiy6EOq6eHd2uenxopQhVTmk90sb26w53YckmF.C', 2, 0, 1715919050, 15),
('U-0016', 'Marfeo Lara Sandi', 'Marfeo@gmail.com', 895, 'default.png', '$2y$10$1mGQM8eW0i/jQ8p5X580hO9iVHNK4LbDeu17uMSi6Nz2UIs9ghIyi', 2, 0, 1715919289, 16),
('U-0017', 'Putria Balqis Zahrani', 'putribalqis@gmail.com', 823, 'default.png', '$2y$10$3DbrPnaU7kLllLKwXMm1SuTpxt3ItyB9ELc.QGNJ.1XsCDhTlF8wC', 2, 0, 1715919500, 17),
('U-0018', 'Harry Septian M', 'harrys@gmail.com', 822, 'default.png', '$2y$10$dFeBgFlYsEQgd.Zf3qpiju.lZFZF6B.VI6nQEFeQmiC2CcRw77FJK', 2, 0, 1715919922, 18),
('U-0019', 'Theofani BR Tampubolon', 'theofanibr@gmail.com', 831, 'default.png', '$2y$10$rOBn98l8gR90oREXvjHUauvPD2v0bXf8KxjTcCOZ7HxlhuxjGQrs6', 2, 0, 1715920040, 19),
('U-0020', 'M. Rizyah Axcello', 'rizyahaxcello@gmail.com', 821, 'default.png', '$2y$10$MrVoPSN2k4tTOK47BMXFGewWNFolMnZXf5jTLHiGINokZureD2l5y', 2, 0, 1715925993, 20),
('U-0021', 'Khazanah Zangglani J.A', 'khazanahz@gmail.com', 2147483647, 'default.png', '$2y$10$aiXw1oDUMZkfyYn8tuQDXuKa74x5Zmv/Wd4cDD3Y5CN4.UjYsju.W', 2, 0, 1715926205, 21),
('U-0022', 'Guru', 'Guru@gmail.com', 0, 'default.png', '$2y$10$b/vbu4o2vdSgpsFEdqCyNuV8JRZq.fkE4CPMX5a9u2x8nUP3NGsCS', 3, 1, 1716009515, 23),
('U-0024', 'Siswa', 'siswa@gmail.com', 825719018, 'default.png', '$2y$10$gtJfHTil2U.xL3WauEN75enmVcG0akFUwc2iD7miv/5UNvyQesLti', 2, 1, 1716010349, 24),
('U-0025', 'swd', 'asjaj@gmail.com', 335, 'default.png', '$2y$10$he3oQ6XRebXlEV5NElZJrOIYfc0531sXg7V.UNGuo9wnPQpO6wMHe', 2, 0, 1716023542, 25);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(12, 1, 1),
(13, 1, 2),
(14, 1, 3),
(16, 2, 5),
(17, 2, 4),
(18, 1, 6),
(19, 2, 7),
(20, 3, 11),
(21, 1, 9),
(22, 3, 10),
(23, 2, 12),
(24, 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Dashboard'),
(2, 'Program'),
(3, 'Konfirmasi'),
(4, 'Dashboard'),
(5, 'Biodata'),
(6, 'jadwal'),
(7, 'Jadwal'),
(9, 'Data'),
(10, 'Dashboard'),
(11, 'Jadwal'),
(12, 'Akun'),
(13, 'Akun');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `role` varchar(130) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `role`) VALUES
(1, 'admin'),
(2, 'siswa'),
(3, 'guru');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `url` varchar(120) NOT NULL,
  `icon` varchar(120) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(17, 1, 'Dashboard', 'Admin', 'fas fa-fw fa-user-circle', 1),
(18, 1, 'pegawai', 'Pegawai', 'fas fa-fw fa-user-circle', 0),
(19, 2, 'Program', 'Program', '', 1),
(20, 2, 'Jenis Program', 'Program/index_JP', '', 1),
(23, 3, 'Konfirmasi Siswa', 'Konfirmasi/siswa', '', 1),
(24, 5, 'Data Diri', 'datadiri', '', 1),
(25, 4, 'Dashboard', 'siswa', '', 1),
(26, 6, 'Kelola jadwal', 'jadwal', '', 1),
(27, 3, 'Konfirmasi Guru', 'konfirmasi/guru', '', 1),
(28, 7, 'jadwal ku', 'siswa/jadwal', '', 1),
(29, 11, 'Mengajar', 'guru/jadwal', '', 1),
(30, 9, 'Guru', 'data', '', 1),
(31, 9, 'siswa', 'data/siswa', '', 1),
(32, 10, 'Dashboard', 'guru', '', 1),
(33, 12, 'Ganti Password', 'siswa/ganti_pass', '', 1),
(34, 13, 'Ganti Password', 'guru/ganti-password', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `temp` (`temp`),
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenis_program`
--
ALTER TABLE `jenis_program`
  ADD PRIMARY KEY (`id_jenis_program`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD UNIQUE KEY `temp` (`temp`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `temp` (`temp`);

--
-- Indexes for table `siswa_pendaftaran`
--
ALTER TABLE `siswa_pendaftaran`
  ADD PRIMARY KEY (`id_siswa_pendaftaran`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`temp`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `jenis_program`
--
ALTER TABLE `jenis_program`
  MODIFY `id_jenis_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa_pendaftaran`
--
ALTER TABLE `siswa_pendaftaran`
  MODIFY `id_siswa_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
