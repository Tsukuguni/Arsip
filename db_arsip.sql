-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2023 pada 04.50
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_tgl` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_datasrt`
--

CREATE TABLE `tb_datasrt` (
  `id_surat` int(11) NOT NULL,
  `nomor_surat` varchar(100) NOT NULL,
  `perihal_surat` varchar(255) NOT NULL,
  `asal_surat` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  `kategori` enum('SPT','SK','SP','SPK','Undangan','TerkaitPendidikan','Permohonan','SuratCuti','Kwitansi','Usulan','SuratMasuk') NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_datasrt`
--

INSERT INTO `tb_datasrt` (`id_surat`, `nomor_surat`, `perihal_surat`, `asal_surat`, `deskripsi`, `foto`, `kategori`, `tgl`) VALUES
(39, 'T-000.1.5/11502/SET', 'FORMULIR BERITA', 'SETDA', '', 'Formulir Berita.jpeg', 'SuratMasuk', '2023-10-04 01:54:59'),
(40, '800.1.11.1/1289.DPPAD/X/2023', 'SURAT PERINTAH TUGAS (SPT)', 'KEPEGAWAIAN', 'Surat undangan dari Balai Penjamin Mutu Pendidikan Provinsi Papua, Nomor : 1453/C7.33/PP.01.22/2023, Tanggal 27 September 2023 Perihal : Undangan Peserta Rapat Koordinasi Persiapan Pendampingan Peningkatan Nilai Raport Tahun 2023', '1696483650.jpeg', 'SPT', '2023-10-05 05:27:30'),
(41, '094/1289.DPPAD/IX/2023', 'SURAT PERINTAH TUGAS (SPT)', 'KEPEGAWAIAN', 'DPA SKPD Dinas Pendidikan, Perpustakaan dan Arsip Daerah Provinsi Papua Tahun 2023 Nomor : DPA/A.1/1.01.2.23.2.24.01.0000/001/2023 Tanggal 6 Februari 2023, Kode Kegiatan 5.1.02.04.01 tentang Belanja Perjalanan Dinas Dalam Negeri.', '1696484952.jpeg', 'SPT', '2023-10-05 05:49:12'),
(42, '800.1.11.1/1290.DPPAD/IX/2023', 'SURAT PERINTAH TUGAS (SPT)', 'PERPUSTAKAAN', 'Surat dari Perpustakaan Nasional RI Nomor : B.5021/4/PPM.05/VIII.2023, Tanggal 28 Agustus 2023, Perihal Undangan Musyawarah Nasional VII dan Sejarah Literasi GPMB Tahun 2023.', '1696485143.jpeg', 'SPT', '2023-10-05 05:52:23'),
(43, '800.1.11.1/1292.DPPAD/IX/2023', 'SURAT PERINTAH TUGAS (SPT)', 'KEPEGAWAIAN', 'Surat Kepala Dinas Pendidikan Kabupaten Mimika Nomor : 420/718/2023 Tanggaal 21 September 2023 perihal Permohonan Narasumber Kegiatan Pelatihan Teknis Proktor Asesmen Nasional (ASN) jenjang SD Sederajat Tahun 2023', '1696485910.jpeg', 'SPT', '2023-10-05 06:05:10'),
(44, '882.3/1277.DPPAD/IX/2023', 'SURAT KETERANGAN', 'KEPEGAWAIAN', '', '1696556829.jpeg', 'SK', '2023-10-06 01:47:09'),
(45, '800.1.3.1/1277.DPPAD/IX/2023', 'SURAT KETERANGAN KESEDIAAN MENERIMA', 'KEPEGAWAIAN', 'Bermaksud untuk dialih tugaskan/pindah menjadi Aparatur Sipil Negara (ASN) pada SLB Negeri 1 Jayapura, Dinas Pendidikan, Perpustakaan dan Arsip Daerah Provinsi Papua, sesuai dengan permohonan yang bersangkutan', '1696557097.jpeg', 'SK', '2023-10-06 01:51:37'),
(46, '800.1.3.1/1216.DPPAD/IX/2023', 'SURAT KETERANGAN KESEDIAAN MENERIMA', 'KEPEGAWAIAN', 'Bermaksud untuk dialih tugaskan/pindah menjadi Pegawai Negeri Sipil di Dinas Pendidikan, Perpustakaan dan Arsip Daerah Provinsi Papua sesuai permohonan yang bersangkutan', '1696557324.jpeg', 'SK', '2023-10-06 01:55:24'),
(47, '800.1.3.1/1279.DPPAD/IX/2023', 'SURAT KETERANGAN KESEDIAAN MENERIMA', 'KEPEGAWAIAN', 'SK Ditujukan Kepada : Tasmi, S.Pd', '1696567224.jpeg', 'SK', '2023-10-06 04:40:24'),
(48, '800.1267.DPPAD/IX/2023', 'SURAT KETERANGAN', 'KEPEGAWAIAN', 'Yang bersangkutan yang namanya tertera di atas adalah benar - benar Pensiunan ASN pada Dinas Pendidikan, Perpustakaan dan Arsip Daerah Provinsi Papuadan telah mendapatkan Surat Persetujuan Teknis Kepala Kantor Regional IV Badan Kepegawaian Negara dengan N', '1696567457.jpeg', 'SK', '2023-10-06 04:44:17'),
(49, '912/1250.DPPAD/IX/2023', 'Permohonan Penerbitan SPD untuk Belanja DAK', 'KEUANGAN', '', '1696567566.jpeg', 'Permohonan', '2023-10-06 04:46:06'),
(50, '800.1.11.6/1291.B.DPPAD/IX/2023', 'SURAT CUTI TAHUNAN', 'KEPEGAWAIAN', 'Diberikan Cuti Tahunan kepada Pegawai Negeri Sipil di Dinas Pendidikan, Perpustakaan dan Arsip Daerah Provinsi Papua ', '1696567709.jpeg', 'SuratCuti', '2023-10-06 04:48:29'),
(52, '900.1.3.1/1236.DPPAD/IX/2023', 'Permohonan Review DAK Penugasan SP2D dan BAST SLB Tahun 2023', 'PKLK', 'Sehubungan dengan pelaksanaan kegiatan DAK Fisik dan Non Fisik DAK\r\nPenugasan SP2D dan Pengadaan Peralatan Teknologi, Informasi dan Komunikasi (TIK) Sekolah Luar Biasa (SLB), melaui BAST Pengadaan TIK dari pihak penyedia yang telah di serahkan ke pihak se', '1696571237.jpeg', 'Permohonan', '2023-10-06 05:47:17'),
(53, '045/1226.DPPAD/IX/2023', 'Perbaikan Database Kepegawaian', 'KEPEGAWAIAN', 'Perbaikan Database Pegawai HEROINA B.A LEWERISSA, S.Sos', '1696571765.jpeg', 'Permohonan', '2023-10-06 05:56:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tglsurat`
--

CREATE TABLE `tb_tglsurat` (
  `id_tgl` int(11) NOT NULL,
  `tgl` varchar(50) NOT NULL,
  `thn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_tglsurat`
--

INSERT INTO `tb_tglsurat` (`id_tgl`, `tgl`, `thn`) VALUES
(0, 'dfg', 0),
(44, '25 September', 2023),
(40, '02 Oktober', 2023),
(41, '29 September', 2023),
(42, '29 September', 2023),
(43, '29 September', 2023),
(45, '14 September', 2023),
(39, '02 Oktober', 2023),
(46, '06 September', 2023),
(47, '14 September', 2023),
(48, '21 September', 2023),
(49, '13 September', 2023),
(50, '29 September', 2023),
(52, '11 September', 2023),
(53, '8 September', 2023),
(54, 'gfdsg', 0),
(55, 'vsdv', 0),
(56, 'asfd', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `createdat`) VALUES
(1, 'Yoriichi', 'sun', '21232f297a57a5a743894a0e4a801fc3', '2023-05-23 01:08:40'),
(6, 'Kokushibo', 'moon', 'c84258e9c39059a89ab77d846ddab909', '2023-06-14 04:58:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_menu` (`id`,`id_surat`,`id_tgl`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_surat`),
  ADD KEY `id_prdkextra` (`id_tgl`);

--
-- Indeks untuk tabel `tb_datasrt`
--
ALTER TABLE `tb_datasrt`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_produk` (`id_surat`);

--
-- Indeks untuk tabel `tb_tglsurat`
--
ALTER TABLE `tb_tglsurat`
  ADD KEY `id_prdkextra` (`id_tgl`),
  ADD KEY `tgl` (`tgl`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_arsip`
--
ALTER TABLE `tb_arsip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_datasrt`
--
ALTER TABLE `tb_datasrt`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD CONSTRAINT `tb_arsip_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_arsip_ibfk_4` FOREIGN KEY (`id_surat`) REFERENCES `tb_datasrt` (`id_surat`),
  ADD CONSTRAINT `tb_arsip_ibfk_5` FOREIGN KEY (`id_tgl`) REFERENCES `tb_tglsurat` (`id_tgl`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
