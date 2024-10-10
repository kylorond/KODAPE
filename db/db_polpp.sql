-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 01:19 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_polpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cuti`
--

CREATE TABLE `tb_cuti` (
  `nip` varchar(35) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `sisaduatahun` int(11) NOT NULL,
  `sisasatutahun` int(11) NOT NULL,
  `sisasekarang` int(11) NOT NULL,
  `penyetuju` varchar(85) NOT NULL,
  `nama_penyetuju` varchar(70) NOT NULL,
  `nip_penyetuju` varchar(35) NOT NULL,
  `jenis_cuti` enum('Cuti Tahunan','Cuti Besar','Cuti Sakit','Cuti Melahirkan','Cuti Karena Alasan Penting','Cuti Diluar Tanggungan Negara') NOT NULL,
  `alasan_cuti` text NOT NULL,
  `mulai_cuti` varchar(35) NOT NULL,
  `sampai_cuti` varchar(35) NOT NULL,
  `alamat_cuti` varchar(70) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluarga`
--

CREATE TABLE `tb_keluarga` (
  `id_keluarga` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `keluarga` enum('Istri','Suami','Anak Tanggungan') NOT NULL,
  `nama_keluarga` varchar(70) NOT NULL,
  `jk` enum('Laki-laki','Perempuan') NOT NULL,
  `kelahiran` varchar(35) NOT NULL,
  `perkawinan` enum('Menikah','Cerai Hidup','Cerai Mati') NOT NULL,
  `tgl_perkawinan` varchar(35) NOT NULL,
  `pekerjaan` enum('ASN/TNI/POLRI','Wiraswasta','Ibu Rumah Tangga','Pelajar','Mahasiswa') NOT NULL,
  `keterangan` enum('Istri','Suami','AK','AT','AA') NOT NULL,
  `tgl_keterangan` varchar(35) NOT NULL,
  `lainnya` enum('Meninggal Dunia','Cerai Hidup','Cerai Mati','Tertunjang','Tidak Tertunjang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawaisatpolpp`
--

CREATE TABLE `tb_pegawaisatpolpp` (
  `id_pegawai` int(20) NOT NULL,
  `nip` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_honor` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_masuk` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` enum('Aktif','Pensiun','Mutasi') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tempat_lahir` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_lahir` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `agama` enum('Islam','Kristen Protestan','Kristen Katolik','Hindu','Buddha','Konghucu') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gol_darah` enum('A','A+','A-','B','B+','B-','O','O+','O-','AB','AB+','AB-') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_bpjs` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pangkat` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status_kepegawaian` enum('Pegawai','Tenaga Kontrak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `golongan` enum('I/a','I/b','I/c','I/d','II/a','II/b','II/c','II/d','III/a','III/b','III/c','III/d','IV/a','IV/b','IV/c','IV/d') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tmt_golongan` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kenaikan` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `pendidikan` enum('SMA','SMK','D-3','D-4','S-1','S-2','S-3') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `konsentrasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alumni` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun_lulus` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penempatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `unit` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `instansi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `masahonor` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `masagolongan` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gaji` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `terbilang` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_telp` varchar(17) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `npwp` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `karpeg` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_baju` enum('XS','S','M','L','XL','XXL','3XL','4XL') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_celana` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_topi` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ukuran_sepatu` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_rek` varchar(35) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pegawaisatpolpp`
--

INSERT INTO `tb_pegawaisatpolpp` (`id_pegawai`, `nip`, `tanggal_honor`, `tanggal_masuk`, `nama`, `keterangan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `gol_darah`, `no_bpjs`, `pangkat`, `status_kepegawaian`, `golongan`, `tmt_golongan`, `kenaikan`, `pendidikan`, `jurusan`, `konsentrasi`, `alumni`, `tahun_lulus`, `jabatan`, `penempatan`, `unit`, `instansi`, `masahonor`, `masagolongan`, `gaji`, `terbilang`, `no_telp`, `npwp`, `nik`, `karpeg`, `alamat`, `ukuran_baju`, `ukuran_celana`, `ukuran_topi`, `ukuran_sepatu`, `no_rek`) VALUES
(0, '112233112233', '2015-06-01', '2017-01-01', 'Pegawai Tiga', 'Mutasi', 'Kuala Kurun', '1994-06-12', 'Laki-laki', 'Islam', 'B-', '112233112233', 'Pengatur', 'Pegawai', 'II/b', '2022-07-01', '', 'SMA', 'Ilmu Pengetahuan Alam', 'Kimia', 'SMAN 2 Gunung Mas', '2012', 'Anggota Satuan Polisi Pamong Praja', 'Ketentraman dan Ketertiban Umum', 'Satuan Polisi Pamong Praja ', 'Provinsi Kalimantan Tengah', '', '', '3400000', '', '08888888828', '112233112233', '6262626262626', '01230123', 'Jl. Menteng I', 'XL', '33', '54', '43', '112233112233'),
(0, '123.123.123', '2022-01-05', '', 'Pegawai Empat', 'Aktif', 'Tamiang Layang', '2001-05-16', 'Perempuan', 'Kristen Katolik', 'O', '332211332211', '', 'Tenaga Kontrak', 'I/a', '', '', 'SMK', 'Akuntansi', 'Akuntansi', 'SMKN 1 Tamiang Layang', '2019', 'Anggota Satuan Polisi Pamong Praja', 'Pembinaan Masyarakat', 'Satuan Polisi Pamong Praja', 'Provinsi Kalimantan Tengah', '', '', '2800000', '', '088882828', '332211332211', '62923074934', '', 'Jl. G. Obos XII', 'M', '29', '53', '40', '332211332211'),
(0, '123123123', '2020-01-08', '2021-02-16', 'Pegawai Satu', 'Aktif', 'Buntok', '2000-09-14', 'Laki-laki', 'Kristen Protestan', 'AB', '123123123', 'Penata', 'Pegawai', 'III/a', '2020-02-01', '', 'S-1', 'Sistem Informasi', 'Database Programming', 'STMIK Palangkaraya', '2020', 'Anggota Satuan Polisi Pamong Praja', 'Pembinaan Masyarakat', 'Satuan Polisi Pamong Praja', 'Provinsi Kalimantan Tengah', '', '', '3200000', '', '0888888888', '123123123', '6222222222222', '0892384', 'Jl. Kutilang', 'XL', '35', '55', '43', '123123123'),
(0, '321321321', '1992-01-10', '1993-01-03', 'Pegawai Dua', 'Pensiun', 'Palangka Raya', '1959-02-24', 'Perempuan', 'Kristen Katolik', 'A+', '321321321', 'Pembina', 'Pegawai', 'IV/c', '2020-10-01', '', 'S-2', 'Sosial', 'Kemasyarakatan', 'Universitas Palangka Raya', '2002', 'Sekretaris', 'Sekretariat', 'Satuan Polisi Pamong Praja', 'Provinsi Kalimantan Tengah', '', '', '5200000', '', '0888888888', '321321321', '62222222782', '0808080', 'Jl. Hiu Putih', 'L', '30', '53', '41', '3213321321');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(70) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Super Admin','Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(14, 'Super Admin 2', 'admin', 'admin', 'Super Admin'),
(15, 'Ronaldo Dwi Anaku Aminu', 'user', 'user', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profilinstansi`
--

CREATE TABLE `tb_profilinstansi` (
  `id_profil` int(11) NOT NULL,
  `nama_instansi` text NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `kepala` varchar(70) NOT NULL,
  `nip` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_profilinstansi`
--

INSERT INTO `tb_profilinstansi` (`id_profil`, `nama_instansi`, `alamat`, `kepala`, `nip`) VALUES
(1, 'SATUAN POLISI PAMONG PRAJA PROVINSI KALIMANTAN TENGAH', 'Jalan Yos Sudarso No. 008 Palangka Raya, Kalimantan Tengah', 'BARU, S.Pd., M.Si.', '19700228 199803 1 007');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spk`
--

CREATE TABLE `tb_spk` (
  `nip` varchar(35) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `pendidikan` enum('SMA','SMK','D-3','D-4','S-1','S-2','S-3') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `gaji` varchar(45) NOT NULL,
  `no_rek` varchar(35) NOT NULL,
  `perjanjian` enum('Januari - Desember','Januari - Juni','Juli - Desember','Januari - Maret','April - Juni','Juli - September','Oktober - Desember') NOT NULL,
  `kode_surat` int(25) NOT NULL,
  `no_surat` int(25) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_pegawaisatpolpp`
--
ALTER TABLE `tb_pegawaisatpolpp`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tb_profilinstansi`
--
ALTER TABLE `tb_profilinstansi`
  ADD PRIMARY KEY (`id_profil`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
