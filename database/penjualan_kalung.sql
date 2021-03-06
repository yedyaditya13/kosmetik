-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 21 Bulan Mei 2020 pada 01.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualankalung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(16, 13, 6, 1),
(17, 13, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Laptops', 'laptops'),
(2, 'Desktop PC', 'desktop-pc'),
(3, 'Tablets', 'tablets'),
(4, 'Smart Phones', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(1, 1, 1, 1),
(21, 1, 2, 1),
(22, 1, 3, 1),
(23, 2, 4, 1),
(24, 2, 5, 1),
(25, 1, 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`) VALUES
(1, 1, 'DELL Inspiron 15 7000 15.6', '<p>15-inch laptop ideal for gamers. Featuring the latest Intel&reg; processors for superior gaming performance, and life-like NVIDIA&reg; GeForce&reg; graphics and an advanced thermal cooling design.</p>\r\n', 'dell-inspiron-15-7000-15-6', 8990000, 'dell-inspiron-15-7000-15-6.jpg', '2020-05-21', 1),
(2, 1, 'MICROSOFT Surface Pro 4 & Typecover - 128 GB', '<p>Surface Pro 4 powers through everything you need to do, while being lighter than ever before</p>\r\n\r\n<p>The 12.3 PixelSense screen has extremely high contrast and low glare so you can work through the day without straining your eyes</p>\r\n\r\n<p>keyboard is not included and needed to be purchased separately</p>\r\n\r\n<p>Features an Intel Core i5 6th Gen (Skylake) Core,Wireless: 802.11ac Wi-Fi wireless networking; IEEE 802.11a/b/g/n compatible Bluetooth 4.0 wireless technology</p>\r\n\r\n<p>Ships in Consumer packaging.</p>\r\n', 'microsoft-surface-pro-4-typecover-128-gb', 7990000, 'microsoft-surface-pro-4-typecover-128-gb.jpg', '2018-05-10', 3),
(3, 1, 'DELL Inspiron 15 5000 15.6', '<p>Dell&#39;s 15.6-inch, midrange notebook is a bland, chunky block. It has long been the case that the Inspiron lineup lacks any sort of aesthetic muse, and the Inspiron 15 5000 follows this trend. It&#39;s a plastic, silver slab bearing Dell&#39;s logo in a mirror sheen.</p>\r\n\r\n<p>Lifting the lid reveals the 15.6-inch, 1080p screen surrounded by an almost offensively thick bezel and a plastic deck with a faux brushed-metal look. There&#39;s a fingerprint reader on the power button, and the keyboard is a black collection of island-style keys.</p>\r\n', 'dell-inspiron-15-5000-15-6', 5990000, 'dell-inspiron-15-5000-15-6.jpg', '2018-05-12', 1),
(4, 1, 'LENOVO Ideapad 320s-14IKB 14\" Laptop - Grey', '<p>- Made for portability with a slim, lightweight chassis design&nbsp;<br />\r\n<br />\r\n- Powerful processing helps you create and produce on the go&nbsp;<br />\r\n<br />\r\n- Full HD screen ensures crisp visuals for movies, web pages, photos and more&nbsp;<br />\r\n<br />\r\n- Enjoy warm, sparkling sound courtesy of two Harman speakers and Dolby Audio&nbsp;<br />\r\n<br />\r\n- Fast data transfer and high-quality video connection with USB-C and HDMI ports&nbsp;<br />\r\n<br />\r\nThe Lenovo&nbsp;<strong>IdeaPad 320s-14IKB 14&quot; Laptop</strong>&nbsp;is part of our Achieve range, which has the latest tech to help you develop your ideas and work at your best. It&#39;s great for editing complex documents, business use, editing photos, and anything else you do throughout the day.</p>\r\n', 'lenovo-ideapad-320s-14ikb-14-laptop-grey', 3990000, 'lenovo-ideapad-320s-14ikb-14-laptop-grey.jpg', '2018-05-10', 3),
(5, 3, 'APPLE 9.7\" iPad - 32 GB, Gold', '<p>9.7 inch Retina Display, 2048 x 1536 Resolution, Wide Color and True Tone Display</p>\r\n\r\n<p>Apple iOS 9, A9X chip with 64bit architecture, M9 coprocessor</p>\r\n\r\n<p>12 MP iSight Camera, True Tone Flash, Panorama (up to 63MP), Four-Speaker Audio</p>\r\n\r\n<p>Up to 10 Hours of Battery Life</p>\r\n\r\n<p>iPad Pro Supports Apple Smart Keyboard and Apple Pencil</p>\r\n', 'apple-9-7-ipad-32-gb-gold', 3390000, 'apple-9-7-ipad-32-gb-gold.jpg', '2020-05-20', 12),
(6, 1, 'DELL Inspiron 15 5000 15', '<p>15-inch laptop delivering an exceptional viewing experience, a head-turning finish and an array of options designed to elevate your entertainment, wherever you go.</p>\r\n', 'dell-inspiron-15-5000-15', 4490000, 'dell-inspiron-15-5000-15.jpg', '2020-05-20', 11),
(7, 3, 'APPLE 10.5\" iPad Pro - 64 GB, Space Grey (2017)', '<p>4K video recording at 30 fps</p>\r\n\r\n<p>12-megapixel camera</p>\r\n\r\n<p>Fingerprint resistant coating</p>\r\n\r\n<p>Antireflective coating</p>\r\n\r\n<p>Face Time video calling</p>\r\n', 'apple-10-5-ipad-pro-64-gb-space-grey-2017', 6190000, 'apple-10-5-ipad-pro-64-gb-space-grey-2017.jpg', '2020-05-21', 25);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(1, 12, 'pay-123', '2020-05-17'),
(2, 16, 'pay-456', '2020-05-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `address` text DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_on` date NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `activate_code` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `address`, `contact_info`, `image`, `status`, `created_on`, `firstname`, `lastname`, `activate_code`) VALUES
(12, 'yedyaditya@gmail.com', '$2y$10$xtZyzBAkNklCYe11oI0bs.jZ4MLLnNJyGYQNjJ59Q8EkLKSOhio02', 0, NULL, NULL, NULL, 1, '2020-05-16', 'yedy', 'aditya', 'ifkXKmdlctvW'),
(13, 'user@gmail.com', '$2y$10$L.orFfQD/Qbvvab3UFf57.fdhiUAUfHcJ2bFD6LQTEMNy62zrV28m', 0, NULL, NULL, 'user.png', 1, '2020-05-16', 'user', 'client', 'vH82QfbneZh6'),
(14, 'admin@gmail.com', '$2y$10$rt2e3UjtCzJ6s2S2e48Ig.NzMOhnodtLeHY578Q8ABhhv7ItEta4K', 1, NULL, NULL, NULL, 1, '2020-05-16', 'admin', 'user', 'ZLay4bWRh5C1'),
(15, 'yedyaditya0@gmail.com', '$2y$10$zLxniW68/3wQb40gKO4LjuMV6zjMkIwrO.zhkCJt3LXLBZSYLiWGe', 0, NULL, NULL, NULL, NULL, '2020-05-16', 'yedy', 'dita', 'nGrHD4Ntead5'),
(16, 'fundretest@gmail.com', '$2y$10$5ksHM/7HXndeTAaFVXoqQ.wo2hd2Q.MbgR20dLcs1SqeOvi2r.Ebq', 0, NULL, NULL, NULL, 1, '2020-05-16', 'fund', 'test', 'xc8SjDnO4vJA');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
