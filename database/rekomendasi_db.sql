-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Jun 2024 pada 02.10
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekomendasi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `buku_id` int NOT NULL,
  `judul` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `penulis` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `penerbit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tahun` int NOT NULL,
  `favorit` int NOT NULL DEFAULT '0',
  `penonton` decimal(8,4) NOT NULL,
  `halaman` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `judul`, `rating`, `sinopsis`, `gambar`, `penulis`, `penerbit`, `tahun`, `favorit`, `penonton`, `halaman`) VALUES
(2, 'Tentang Kamu', 5.9, 'Legenda dari Jawa Barat tentang seorang anak laki-laki bernama Sangkuriang yang mencari ibunya dan tanpa sengaja jatuh cinta padanya. Kisah ini penuh dengan tragedi dan kutukan.', 'TentangKamu.jpeg', 'Tere Liye', 'Gramedia Pustaka Utama', 2009, 1, 10.0610, '344 halaman'),
(3, 'Laskar Pelangi', 8.1, 'Mengisahkan tentang perjuangan sepuluh anak dari keluarga miskin di Belitung untuk meraih mimpi mereka di sekolah dasar Muhammadiyah. Novel ini penuh dengan semangat, humor, dan nilai-nilai persahabatan yang mengharukan.', 'LaskarPelangi.jpeg', 'Andrea Hirata', 'Bentang Pustaka', 2005, 1, 9.1251, ''),
(4, 'Atomic Habits', 6.4, 'Buku ini akan menjelaskan mengenai suatu hal yang kecil bisa berdampak besar pada kehidupan seseorang. Perubahan-perubahan kecil akan menjadikan sesuatu hal yang luar biasa. Caranya dengan melakukannya secara rutin dan telaten.\r\nSelain itu, dalam buku ini terdapat juga contoh nyata kebiasaan kecil yang memiliki dampak besar.', 'AtomicHabits.png', 'James Clear', 'Gramedia Pustaka Utama', 2019, 2, 6.8586, ''),
(5, 'Berani Tidak Disukai', 6.7, 'Buku ini terdiri dari 5 bab yang mampu mengajarkan bagaimana seseorang mampu menentukan arah hidup. Selain itu, menuntun untuk bebas dari trauma masa lalu dan beban ekspektasi orang lain. \r\nKonsep dari buku ini lebih mengajak untuk berdiskusi dan tidak terkesan menggurui. Jadi, pembaca akan merasa nyaman dan membuka wawasan tentang bagaimana penerimaan diri.', 'BeraniTidakDisukai.jpg', 'Ichiro Kishimi dan Fumitake Koga', 'Gramedia Pustaka Utama', 2016, 0, 6.3919, ''),
(6, 'Kambing Jantan', 7.0, 'Buku ini merupakan kumpulan cerita ringan yang menghibur dengan sentuhan humor khas Raditya Dika. Melalui gaya tulisan yang sederhana dan lucu, Raditya mampu menghadirkan berbagai kejadian kocak yang dialaminya di luar negeri, mulai dari kesulitan beradaptasi dengan budaya baru, hingga kejadian-kejadian lucu yang terjadi dalam kehidupan sehari-hari.', 'KambingJantan.jpeg', 'Raditya Dika', 'Gagas Media', 2005, 0, 6.3156, ''),
(7, 'Seribu Wajah Ayah', 7.9, 'Seorang anak perempuan yang merantau ke luar negeri kembali ke rumah setelah ayahnya meninggal. Di sana, ia menemukan album foto yang berisi kenangan masa lalunya bersama sang ayah dan belajar memahami berbagai sisi ayahnya yang tidak pernah ia ketahui sebelumnya.', 'SeribuWajahAyah.png', 'Nurun Ala', 'Gramedia Pustaka Utama', 2020, 0, 5.8609, '240 halaman'),
(8, 'Patuhi Rules!', 5.3, 'Kisah tentang sekelompok anak SMA yang terjebak dalam permainan berbahaya yang disebut \"Rules\". Permainan ini penuh misteri dan memaksa mereka untuk mengikuti berbagai aturan yang aneh dan berbahaya.', 'PatuhiRules.jpg', 'Luluk HF', 'Gramedia Pustaka Utama', 2018, 0, 5.5029, '256 halaman'),
(9, 'Rumah Kaca', 6.5, 'Novel sejarah yang berlatar belakang masa penjajahan Belanda di Indonesia. Kisah ini menceritakan tentang perjuangan seorang pemuda bernama Kurniawan untuk melawan penjajah dan mencari jati dirinya.', 'RumahKaca.jpg', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 2002, 0, 5.2534, '448 halaman'),
(10, 'Novel Catatan Pembunuhan Sang Novelis (Malice)', 6.0, 'Novel misteri tentang seorang editor yang dituduh membunuh novelis terkenal. Kisah ini penuh dengan ketegangan dan plot twist yang mengejutkan.', 'NovelCatatanPembunuhanSangNovelis.jpg', 'Keigo Higashino', 'Gramedia Pustaka Utama', 2012, 0, 4.8916, '344 halaman'),
(11, 'Perpustakaan Tengah Malam (The Midnight Library)', 7.9, 'Kisah tentang seorang wanita bernama Nora Seed yang merasa hidupnya gagal dan memutuskan untuk bunuh diri. Namun, di ambang kematian, dia menemukan sebuah perpustakaan ajaib yang berisi buku-buku tentang kehidupan alternatifnya.', 'TheMidnightLibrary.jpg', 'Matt Haig', 'Gramedia Pustaka Utama', 2020, 1, 4.7194, '320 halaman'),
(12, 'Habibie & Ainun', 7.6, 'Film ini didasarkan pada memoar yang ditulis oleh Presiden ketiga Indonesia dan salah satu insinyur terkenal di dunia, B.J. Habibie tentang istrinya, Hasri Ainun Habibie.', 'habibie.jpg', 'Faozan Rizal', 'Reza Rahadian, Bunga Citra Lestari, Tio Pakusadewo', 2012, 0, 4.6012, ''),
(13, 'Pengabdi Setan', 6.5, 'Setelah meninggal karena penyakit aneh yang dideritanya selama 3 tahun, seorang ibu kembali ke rumah untuk menjemput anak-anaknya.', 'ps.jpg', 'Joko Anwar', 'Tara Basro, Bront Palarae, Dimas Aditya', 2017, 0, 4.2061, ''),
(14, 'Warkop DKI Reborn: Jangkrik Boss! Part 2', 5.5, 'Petualangan Dono, Kasino, dan Indro berlanjut. Mereka harus mencari harta karun itu untuk membayar utangnya. Mereka melakukan perjalanan ke Malaysia sebagai tujuan pertama mereka, namun tas dengan kode harta karun tersebut ditukar dengan milik wanita Malaysia.', 'warkopreborn2.jpg', 'Anggy Umbara\r\n\r\n', 'Abimana Aryasatya, Vino G. Bastian, Tora Sudiro', 2017, 0, 4.0831, ''),
(15, 'Badarawuhi Di Desa Penari', 6.3, 'Desa ini masih menyimpan banyak misteri. Sepotong demi sepotong misteri terungkap, termasuk teror dari entitas yang paling ditakuti yakni Badarawuhi.', 'badarawuhi.jpg', 'Kimo Stamboel', 'Aulia Sarah, Maudy Effrosina, Jourdy Pranata', 2024, 0, 4.0101, ''),
(16, 'Siksa Kubur', 7.1, 'Menceritakan tentang siksa kubur yang terjadi setelah seseorang dikuburkan.', 'siksakubur.jpg', 'Joko Anwar', 'Faradina Mufti, Reza Rahadian, Widuri Puteri', 2024, 0, 4.0008, ''),
(17, 'Ayat-ayat Cinta', 6.9, 'Seorang pria yang mencoba melewati hubungan rumit dengan cara Islami.', 'ayatcinta.jpg', 'Hanung Bramantyo', 'Fedi Nuril, Rianti Cartwright, Carissa Putri', 2008, 0, 3.6761, ''),
(18, 'Ada Apa dengan Cinta? 2', 7.3, '14 tahun setelah percintaan mereka dimulai di sekolah menengah, Rangga dan Cinta bersatu kembali di Yogyakarta untuk mengakhiri hubungan mereka setelah Rangga meninggalkan Cinta tanpa penjelasan bertahun-tahun sebelumnya.', 'aadc2.jpg', 'Riri Riza', 'Nicholas Saputra, Dian Sastrowardoyo, Titi Kamal', 2016, 0, 3.6655, ''),
(19, 'Suzzanna: Bernapas dalam Kubur', 5.5, 'Setelah seorang wanita hamil dibunuh, arwahnya berusaha membalas dendam terhadap para pembunuh yang semakin ketakutan, yang bertekad menghabisinya selamanya.', 'suzanna.jpg', 'Rocky Soraya', 'Luna Maya, Herjunot Ali, T. Rifnu Wikana', 2018, 0, 3.3461, ''),
(20, 'Di Ambang Kematian', 6.1, 'Nadia, satu-satunya yang selamat dari nasib tragis keluarganya, bergulat dengan ancaman pengorbanan ayahnya saat dia menghadapi kehidupan yang berada di ujung tanduk.', 'ambangkematian.jpg', 'Azhar Kinoi Lubis', 'Taskya Namya, T. Rifnu Wikana, Wafda Saifan Lubis', 2023, 0, 3.3020, ''),
(21, 'Milea: Suara dari Dilan', 6.2, 'Keputusan berpisah dengan Dilan diambil Milea sebagai peringatan agar Dilan menjauhi geng motor. Namun perpisahan yang tadinya hanya gertakan bagi Milea menjadi perpisahan yang bertahan hingga mereka lulus kuliah dan beranjak dewasa.', 'milea.jpg', 'Fajar Bustomi, Pidi Baiq', 'Iqbaal Dhiafakhri Ramadhan, Vanesha Prescilla, Ira Wibowo', 2020, 0, 3.1578, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `favorit`
--

CREATE TABLE `favorit` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `favorit`
--

INSERT INTO `favorit` (`id`, `user_id`, `buku_id`) VALUES
(40, 6, 3),
(42, 6, 11),
(45, 6, 2),
(46, 9, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `id` int NOT NULL,
  `buku_id` int NOT NULL,
  `genre_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`id`, `buku_id`, `genre_id`) VALUES
(1, 3, 2),
(3, 2, 3),
(4, 4, 4),
(5, 4, 2),
(6, 5, 5),
(7, 5, 1),
(8, 5, 6),
(12, 6, 5),
(13, 7, 2),
(14, 7, 5),
(16, 8, 5),
(17, 8, 1),
(18, 9, 5),
(20, 10, 1),
(21, 10, 3),
(22, 11, 4),
(23, 11, 5),
(26, 12, 5),
(28, 13, 5),
(29, 13, 1),
(30, 13, 6),
(31, 14, 4),
(32, 14, 2),
(33, 15, 1),
(34, 15, 6),
(35, 15, 3),
(36, 16, 5),
(37, 16, 1),
(38, 16, 3),
(39, 17, 5),
(41, 19, 5),
(42, 19, 1),
(44, 18, 5),
(46, 20, 5),
(48, 20, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genres`
--

CREATE TABLE `genres` (
  `genre_id` int NOT NULL,
  `genre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genres`
--

INSERT INTO `genres` (`genre_id`, `genre`) VALUES
(1, 'Horror'),
(2, 'Comedy'),
(3, 'Fiksi'),
(4, 'Non-Fiksi'),
(5, 'Self Improvement'),
(6, 'Historical');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentar_id` int NOT NULL,
  `buku_id` int NOT NULL,
  `komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_komentar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_rating` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentar_id`, `buku_id`, `komentar`, `tanggal_komentar`, `user_rating`, `user_id`) VALUES
(3, 2, 'keren', '2024-05-27 08:59:26', 8, 3),
(4, 2, 'bagus', '2024-05-27 09:01:06', 5, 4),
(7, 4, 'sadasd', '2024-05-27 14:25:22', 10, 6),
(8, 4, 'Bagus bro', '2024-05-27 14:28:31', 7, 3),
(9, 2, 'sadasdasd', '2024-05-28 04:31:13', 10, 6),
(10, 3, 'keren', '2024-05-29 05:21:26', 8, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`) VALUES
(3, 'admin', '$2y$10$jzOUsqyjEJ2RcnYd6nM/r.Znovj.VjzZVuZ9ssDcwsTmT9GrBUCOS', 'Admin'),
(4, 'admin1', '$2y$10$So0jDABohixT9v.UVTDO9.lKZ/rkSweTyL0xzGNkfl/S8QY7DCZLa', 'Admin1'),
(6, 'vino', '$2y$10$EgBFRsrpS7SsGVeFojesWuPLUu9VOoN0fJIqhd6AKdX9vJh1TNsOS', 'Alvino'),
(8, 'baron', '$2y$10$57oyJBtCydeLVfuJjqYTuusoUCtqu2RXQhkhlPk94e2yklMkBc6Hu', 'akbar'),
(9, 'fauzan', '$2y$10$ecG37eMrFfdbjOMwsULy3.tCwyqyKmeg5iTygdLT4VfLL.rb8r3Ja', 'Fauzan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `watchlist`
--

CREATE TABLE `watchlist` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `buku_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `watchlist`
--

INSERT INTO `watchlist` (`id`, `user_id`, `buku_id`) VALUES
(44, 6, 4),
(49, 6, 5),
(53, 6, 2),
(54, 9, 3),
(55, 9, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indeks untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indeks untuk tabel `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentar_id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `watchlist`
--
ALTER TABLE `watchlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `favorit`
--
ALTER TABLE `favorit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `watchlist`
--
ALTER TABLE `watchlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `favorit`
--
ALTER TABLE `favorit`
  ADD CONSTRAINT `favorit_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorit_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);

--
-- Ketidakleluasaan untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD CONSTRAINT `genre_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `genre_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genre_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);

--
-- Ketidakleluasaan untuk tabel `watchlist`
--
ALTER TABLE `watchlist`
  ADD CONSTRAINT `watchlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `watchlist_ibfk_2` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`buku_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
