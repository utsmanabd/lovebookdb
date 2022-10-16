-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2022 at 02:46 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovebook_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `myproduct`
--

CREATE TABLE `myproduct` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `kondisi` int(3) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `myproduct`
--

INSERT INTO `myproduct` (`id`, `judul`, `penulis`, `penerbit`, `tahun`, `deskripsi`, `kategori`, `kondisi`, `stok`, `harga`) VALUES
(1, 'Kata', 'Rintik Sedu', 'Gagas Media', 2018, '“Andai bisa sesederhana itu, aku tidak akan pernah mencintaimu sejak awal. Aku tidak akan mengambil risiko, mengorbankan perasaanku. Namun, semua ini diluar kendaliku” Nugraha.', 'Fiksi', 65, 2, 50000),
(2, 'Little Women and Good Wives', 'Louisa May Alcott', 'Kessinger', 2004, 'Amy looked relieved, but naughty Jo took her at her word, for during the first call she sat with every limb gracefully composed, every fold correctly draped, calm as a summer sea, cool as a snowbank, and as silent as the sphinx. In vain Mrs. Chester alluded to her \'charming novel\', and the Misses Chester introduced parties, picnics, the opera, and the fashions. Each and all were answered by a smile, a bow, and a demure \"Yes\" or \"No\" with the chill on.', 'Fiksi', 80, 4, 65000),
(3, 'How To Respect Myself', 'Yoon Hong Gyun', 'Transmedia Pustaka', 2020, 'Bagaimana anda menjaga dan mencintai diri sendiri? Metode Pelatihan Mandiri untuk Harga Diri ala Dokter Kejiwaan ‘dr. Yoon si Penjawab.', 'Nonfiksi', 70, 3, 45000),
(4, 'Sukarno', 'Anom Whani Wicaksana', 'Klik Media', 2018, 'Buku ini merangkum perjalanan hidup Sukarno mulai sejak masih kecil hingga wafat dan berupaya menempatkan Sukarno sebagai manusia yang lengkap.', 'Nonfiksi', 70, 1, 52000),
(5, 'Atomic Habits', 'James clear', 'Avery', 2018, 'Orang mengira ketika Anda ingin mengubah hidup, Anda perlu memikirkan hal-hal besar. Namun pakar kebiasaan terkenal kelas dunia James Clear telah menemukan sebuah cara lain. Ia tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil—dari mengerjakan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentar hasrat untuk menelepon. Ia menyebut semua tadi atomic habits.', 'Nonfiksi', 90, 3, 60000),
(6, 'enola holmes and the black barouche', 'nancy springer', 'wednesday book', 2021, 'Enola Holmes adalah adik perempuan dari saudara laki-lakinya yang lebih terkenal, Sherlock dan Mycroft. Tapi dia memiliki semua kecerdasan, keterampilan, dan kecenderungan detektif dari mereka berdua.', 'Fiksi', 60, 3, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@lovebook.com', '0139a3c5cf42394be982e766c93f5ed0'),
(2, 'Utsman', 'se1zl_utsman@apps.ipb.ac.id', '662474a07e665e1f4701afb68dc02ce3'),
(3, 'Utsman Abdurrahman', 'snubyellow@gmail.com', 'd61cc62e5dfd897187c0fd496dc3bb32'),
(4, 'Utsman Lagi', 'utsman@lagi.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `myproduct`
--
ALTER TABLE `myproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `myproduct`
--
ALTER TABLE `myproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
