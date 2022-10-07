-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 07, 2022 lúc 09:11 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `background_img`
--

CREATE TABLE `background_img` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `background_img`
--

INSERT INTO `background_img` (`id`, `url`, `created_at`, `updated_at`) VALUES
(1, 'assets/img/background/home_slider_image_1.jpg', NULL, NULL),
(2, 'assets/img/background/home_slider_image_2.jpg', NULL, NULL),
(3, 'assets/img/background/home_slider_image_3.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_products`
--

CREATE TABLE `brand_products` (
  `id` int(11) NOT NULL,
  `products_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand_products`
--

INSERT INTO `brand_products` (`id`, `products_id`, `url`, `created_at`, `updated_at`) VALUES
(1, NULL, 'assets/img/ysl.jpg', NULL, NULL),
(2, NULL, 'assets/img/caudalie.jpg', NULL, NULL),
(3, NULL, 'assets/img/chanel.jpg', NULL, NULL),
(4, NULL, 'assets/img/dior.jpg', NULL, NULL),
(5, NULL, 'assets/img/mac.jpg', NULL, NULL),
(6, NULL, 'assets/img/nars.jpg', NULL, NULL),
(7, NULL, 'assets/img/kiels.jpg', NULL, NULL),
(8, NULL, 'assets/img/loreal.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `status` enum('Delivery','Received') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT 'Delivery',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_code`, `full_name`, `phone`, `email`, `address`, `total_price`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, '', 'hungcdpk53@gmail.com', 123456789, 'hungcdpk53@gmail.com', '192 Lê Trọng Tấn', 0, '', 'Delivery', '2022-09-11 19:50:02', '2022-09-11 19:50:02'),
(2, NULL, '', 'test1@gmail.com', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 30132, 'tét', 'Delivery', '2022-09-11 19:59:51', '2022-09-11 19:59:51'),
(3, NULL, '', 'test2@gmail.com', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 30132, '', 'Delivery', '2022-09-11 20:05:59', '2022-09-11 20:05:59'),
(4, NULL, '', 'test@gmail.com', 91234567, 'test@gmail.com', '192 Lê Trọng Tấn', 37800, 'kkkk', 'Delivery', '2022-09-11 20:06:51', '2022-09-11 20:06:51'),
(5, NULL, '', 'hungcdpk53@gmail.com', 123456789, 'hungcdpk53@gmail.com', '192 Lê Trọng Tấn', 47520, 'kkkk', 'Delivery', '2022-09-11 20:23:14', '2022-09-11 20:23:14'),
(6, NULL, '', 'Hungnguyen', 328930303, 'hungnguyen@gmail.com', '192 Lê Trọng Tấn', 9612, 'kkkk', 'Delivery', '2022-09-11 22:42:29', '2022-09-11 22:42:29'),
(7, NULL, '', 'Hungnguyen', 328930303, 'hungnguyen@gmail.com', '06 Hồ Tùng Mậu', 9612, '', 'Delivery', '2022-09-11 22:46:07', '2022-09-11 22:46:07'),
(8, 12, '', 'Hungnguyen', 328930303, 'hungnguyen@gmail.com', '06 Hồ Tùng Mậu', 9612, '', 'Delivery', '2022-09-11 22:49:01', '2022-09-11 22:49:01'),
(9, 0, '', 'Hungnguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 9612, '', 'Delivery', '2022-09-11 22:49:30', '2022-09-11 22:49:30'),
(10, 0, '', 'hung nguyen', 123456789, 'hungcdpk53@gmail.com', '192 Lê Trọng Tấn', 7344, '', 'Delivery', '2022-09-11 22:50:27', '2022-09-11 22:50:27'),
(11, 0, '', 'Hungnguyen213123213123', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 27000, 'kkkk', 'Delivery', '2022-09-15 23:20:34', '2022-09-15 23:20:34'),
(12, 0, '', 'hung nguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 8640, 'kkkk', 'Delivery', '2022-09-15 23:53:56', '2022-09-15 23:53:56'),
(13, 0, 'NMH132995440', 'Hungnguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 4320, 'kkkk', 'Delivery', '2022-09-16 00:45:35', '2022-09-16 00:45:35'),
(14, 0, 'NMH245650182', 'Hungnguyen', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 8640, 'kkkk', 'Delivery', '2022-09-16 00:47:52', '2022-09-16 00:47:52'),
(15, 0, 'NMH901661888', 'Hungnguyen213123213123', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 9612, 'kkkk', 'Delivery', '2022-09-16 00:51:39', '2022-09-16 00:51:39'),
(16, 0, 'NMH449137701', 'Hungnguyen', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 7452, 'kkkk', 'Delivery', '2022-09-16 00:52:48', '2022-09-16 00:52:48'),
(17, 0, 'NMH893414486', 'Hungnguyen', 919191919, 'test1@gmail.com', '192 Lê Trọng Tấn', 0, 'kkkk', 'Delivery', '2022-09-16 00:55:14', '2022-09-16 00:55:14'),
(18, 0, 'NMH441568840', 'hung nguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 9612, '', 'Delivery', '2022-09-16 00:55:49', '2022-09-16 00:55:49'),
(19, 0, 'NMH298796762', 'Hungnguyen', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 8532, '', 'Delivery', '2022-09-16 01:01:24', '2022-09-16 01:01:24'),
(20, 0, 'NMH482963899', 'Hungnguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 43092, 'tét', 'Delivery', '2022-09-18 20:48:10', '2022-09-18 20:48:10'),
(21, 0, 'NMH812260162', 'Hungnguyen', 123456789, 'test1@gmail.com', '192 Lê Trọng Tấn', 12528, 'kkkk', 'Delivery', '2022-09-18 20:57:02', '2022-09-18 20:57:02'),
(22, 12, 'NMH587504697', 'hung nguyen', 328930303, 'hungnguyen@gmail.com', '192 Lê Trọng Tấn', 5400, '', 'Delivery', '2022-09-23 23:25:26', '2022-09-23 23:25:26'),
(23, 0, 'NMH605489798', 'Hungnguyen', 123456789, 'test2@gmail.com', '192 Lê Trọng Tấn', 4320, 'kkkk', 'Delivery', '2022-09-23 23:26:36', '2022-09-23 23:26:36'),
(24, 12, 'NMH762605552', 'ung', 328930303, 'hungnguyen@gmail.com', '192 Lê Trọng Tấn', 5400, '', 'Delivery', '2022-09-24 21:30:02', '2022-09-24 21:30:02'),
(27, 0, 'NMH185231600', 'Thị Phương Nguyễn', 395547289, 'test1@gmail.com', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', 4104, 'kkkk', 'Delivery', '2022-09-25 19:47:10', '2022-09-25 19:47:10'),
(28, 0, 'NMH768837398', 'Thị Phương Nguyễn', 395547289, 'test2@gmail.com', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', 4320, '', 'Delivery', '2022-09-25 19:49:06', '2022-09-25 19:49:06'),
(29, 0, 'NMH297949416', 'Thị Phương Nguyễn', 395547289, 'test1@gmail.com', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', 3132, '', 'Delivery', '2022-09-25 19:59:29', '2022-09-25 19:59:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `gendre` enum('Nam','Nữ','Unisex') CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `price` double(8,0) NOT NULL,
  `promo` double(8,0) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `gendre`, `price`, `promo`, `description`, `url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Miss Dior', 'Dior', '', 4000, 2700, 'Eau de Parfum', 'assets/img/missdior.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(2, 'Sauvage', 'Dior', '', 2900, 2500, 'Eau de Parfum 50ml', 'assets/img/sauvage.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(3, 'Black Opium', 'Yves Saint Laurent', '', 5000, 2500, 'Eau de Parfum', 'assets/img/blackopium.png', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(4, 'J\'adore', 'Dior', '', 3900, 2800, 'Eau de Parfum 100ml', 'assets/img/jadore.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(5, 'Libre', 'Yves Saint Laurent', '', 5000, 2500, 'Eau de Parfum', 'assets/img/libre.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(6, 'Mon Paris', 'Yves Saint Laurent', '', 4000, 3400, 'Eau de Parfum', 'assets/img/monparis.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(7, 'Dior Joy', 'Dior', '', 3800, 3000, 'Eau de Toilette 100ml', 'assets/img/diorjoy.jpg', 'Active', '2022-08-21 18:39:04', '2022-08-21 18:39:04'),
(8, 'La nuit de l\'homme', 'Yves Saint Laurent', '', 4000, 2700, 'Eau de Parfum', 'assets/img/lanuitdelhomme.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(9, 'Chanel N5', 'Chanel', '', 4000, NULL, 'Eau de Parfum', 'assets/img/chaneln5.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(10, 'Bleu de Chanel', 'Chanel', '', 4000, NULL, 'Eau de Parfum', 'assets/img/bleudechanel.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(11, 'Chanel Gabrielle', 'Chanel', '', 4000, NULL, 'Eau de Parfum', 'assets/img/chanelgabrielle.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(12, 'Coco Chanel', 'Chanel', '', 4000, NULL, 'Eau de Parfum', 'assets/img/cocochanel.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(14, 'CK One', 'Calvin klein', '', 4000, NULL, 'Eau de Parfum', 'assets/img/ckone.jpg', 'Active', '2022-08-21 10:08:42', '2022-08-21 10:08:42'),
(18, 'La roche posay retinol B3 ', 'La roche posay', 'Nữ', 1000, 200, 'Serum', 'assets/img/la-roche-posay-retinol-b3-serum-anti-rides-30-ml.jpg', 'Active', '2022-10-07 18:20:59', '2022-10-07 18:20:59'),
(19, 'La roche posay retinol B4', 'La roche posay', 'Unisex', 1000, 200, 'Serum', 'assets/img/5d9fe3a4df9e39c0608f.PNG', 'Inactive', '2022-10-07 18:28:58', '2022-10-07 14:03:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register_admin`
--

CREATE TABLE `register_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gendre` enum('Nam','Nữ') NOT NULL,
  `type` enum('Super_Admin','Admin') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `register_admin`
--

INSERT INTO `register_admin` (`id`, `email`, `phone`, `full_name`, `password`, `gendre`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'hungnguyen@gmail.com', 123456789, 'Hùng Nguyễn', '123456', 'Nam', 'Super_Admin', 'Active', '2022-09-26 22:25:51', '2022-09-26 22:25:51'),
(2, 'test@gmail.com', 123422323, 'Nguyễn', '12345', 'Nam', 'Admin', 'Active', '2022-09-26 22:25:51', '2022-09-26 22:25:51'),
(3, 'user11@gmail.com', 1232123, 'fullname', '123456', 'Nam', 'Super_Admin', 'Active', '2022-10-04 00:48:27', '2022-10-04 00:48:27'),
(4, 'user2@gmail.com', 395547229, 'Thị Phương Nguyễn', 'e10adc3949ba59abbe56e057f20f883e', 'Nữ', '', '', '2022-10-04 00:50:51', '2022-10-04 00:50:51'),
(5, 'gogeta@gmail.com', 123929292, 'Gogeta', '14e1b600b1fd579f47433b88e8d85291', 'Nam', 'Super_Admin', 'Inactive', '2022-10-04 00:55:44', '2022-10-04 00:55:44'),
(6, 'vegeta@gmail.com', 395547229, 'Vegeta', 'e10adc3949ba59abbe56e057f20f883e', 'Nam', 'Super_Admin', 'Active', '2022-10-04 01:10:11', '2022-10-04 01:10:11'),
(7, 'chunk@gmail.com', 395547229, 'Chunk', 'e10adc3949ba59abbe56e057f20f883e', 'Nam', 'Admin', 'Active', '2022-10-04 01:12:35', '2022-10-04 01:12:35'),
(8, 'chichi@gmail.com', 2147483647, 'Chichi', 'e10adc3949ba59abbe56e057f20f883e', 'Nữ', 'Admin', 'Active', '2022-10-04 01:14:49', '2022-10-04 01:14:49'),
(9, 'satoru@gmail.com', 395542211, 'Gojo Satoru1', 'ed851c3cf42ef944529be42acb8fd40e', 'Nam', 'Super_Admin', 'Active', '2022-10-04 22:18:45', '2022-10-04 22:18:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gendre` enum('Men','Women','Unisex') NOT NULL DEFAULT 'Unisex',
  `birthday` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('admin','client') NOT NULL DEFAULT 'client',
  `status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `email`, `phone`, `full_name`, `address`, `gendre`, `birthday`, `password`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'user@gmail.com', '0123456789', 'Test User', 'Ha noi', '', '0000-00-00', 'a970a7e3b359f88a4732b56050822888', 'client', 'Inactive', '2022-08-28 19:05:22', '2022-10-06 10:33:39'),
(2, 'user2@gmail.com', '0123456789', 'Test User 2', 'Da nang', 'Unisex', '2022-09-05', '123456789', 'client', 'Active', '2022-08-28 19:05:22', '2022-08-28 19:05:22'),
(3, 'user3@gmail.com', '0123456789', 'Test User 3', 'Hoi An', 'Unisex', '2022-09-05', '123456789', 'client', 'Active', '2022-08-28 19:05:22', '2022-08-28 19:05:22'),
(4, 'hungcdpk53@gmail.com', '098282828', 'hùng', 'định công', 'Men', '2022-09-08', 'e10adc3949ba59abbe56e057f20f883e', 'client', 'Active', NULL, NULL),
(7, 'user4@gmail.com', 'sss', 'fullname', 'address', 'Men', '0000-00-00', 'd41d8cd98f00b204e9800998ecf8427e', 'client', 'Active', '2022-09-05 14:44:15', '2022-09-05 14:44:15'),
(10, 'test1@gmail.com', '0981234567', 'User Test', NULL, 'Men', '2022-08-30', 'fcea920f7412b5da7be0cf42b8c93759', 'client', 'Active', '2022-09-05 16:16:04', '2022-09-05 16:16:04'),
(11, 'test@gmail.com', '0892342343', 'User Test 2', NULL, 'Men', '2022-09-05', 'e10adc3949ba59abbe56e057f20f883e', 'client', 'Active', '2022-09-05 16:19:29', '2022-09-05 16:19:29'),
(12, 'hungnguyen@gmail.com', '0328930303', 'User Test 3', '192 Lê Trọng Tấn', 'Men', '2012-02-29', '123456', 'client', 'Active', '2022-09-05 16:21:24', '2022-09-05 16:21:24'),
(15, 'hungnguyen1@gmail.com', '0395547289', 'Thị Phương Nguyễn', 'Số 31 Ngách 473 Ngõ 192 Lê Trọng Tấn', '', '0000-00-00', 'e10adc3949ba59abbe56e057f20f883e', 'client', 'Active', '2022-10-04 18:53:03', '2022-10-04 18:53:03'),
(16, 'gogeta@gmail.com', '012312312312', 'gogeta', '06 Hồ Tùng Mậu', '', '2000-01-01', '10ed1697617fe7758b4236d5b791286c', 'client', 'Active', '2022-10-04 18:53:42', '2022-10-06 10:38:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `background_img`
--
ALTER TABLE `background_img`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand_products`
--
ALTER TABLE `brand_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `register_admin`
--
ALTER TABLE `register_admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `background_img`
--
ALTER TABLE `background_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `brand_products`
--
ALTER TABLE `brand_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `register_admin`
--
ALTER TABLE `register_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
