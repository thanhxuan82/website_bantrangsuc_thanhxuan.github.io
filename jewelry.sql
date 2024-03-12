-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 09, 2021 lúc 03:14 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `jewelry`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresspayments`
--

CREATE TABLE `addresspayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresspayments`
--

INSERT INTO `addresspayments` (`id`, `user`, `phone`, `city`, `district`, `address`, `created_at`, `updated_at`) VALUES
(1, 14, '+84825512635', 'Hồ Chí Minh', 'Bình Thạnh', '392/2 Ung Văn Khiêm', '2021-03-22 07:39:16', '2021-03-22 07:39:16'),
(2, 15, '+84825512635', 'Hồ Chí Minh', 'Bình Thạnh', '392/2 Ung Văn Khiêm', '2021-03-22 21:00:12', '2021-03-22 21:00:12'),
(3, 19, '+84825512635', 'Hồ Chí Minh', 'Trảng Bom', '392/2 Ung Văn Khiêm', '2021-04-09 06:22:42', '2021-04-09 06:22:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalquantity` int(11) NOT NULL,
  `totalprice` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `user`, `address`, `totalquantity`, `totalprice`, `date`, `time`, `status`, `created_at`, `updated_at`) VALUES
(15, 14, '1', 2, 35, '2021-04-13', '19:27:39', 2, '2021-04-13 05:27:39', '2021-04-13 05:29:10'),
(16, 15, '2', 1, 1500, '2021-04-13', '22:29:28', 2, '2021-04-13 08:29:28', '2021-04-13 08:51:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user`, `product`, `content`, `date`, `time`, `created_at`, `updated_at`) VALUES
(54, 19, 7, 'hello', '2021-04-09', '20:19:09', '2021-04-09 06:19:09', '2021-04-09 06:19:09'),
(55, 19, 7, 'nam', '2021-04-11', '10:03:10', '2021-04-10 20:03:10', '2021-04-10 20:03:10'),
(56, 19, 14, 'anh tuan dep trai', '2021-04-13', '18:50:23', '2021-04-13 04:50:23', '2021-04-13 04:50:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailbills`
--

CREATE TABLE `detailbills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product` int(11) NOT NULL,
  `bill` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailbills`
--

INSERT INTO `detailbills` (`id`, `product`, `bill`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(15, 15, 15, 1, 20, '2021-04-13 05:27:40', '2021-04-13 05:27:40'),
(16, 12, 15, 1, 15, '2021-04-13 05:27:40', '2021-04-13 05:27:40'),
(17, 14, 16, 1, 1500, '2021-04-13 08:29:28', '2021-04-13 08:29:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2021_03_06_060156_add_image_to_users', 2),
(14, '2021_03_09_060909_create_products_table', 3),
(15, '2021_03_10_151411_create_votes_table', 4),
(17, '2021_03_14_131409_create_comments_table', 5),
(24, '2021_03_21_120531_create_bills_table', 6),
(25, '2021_03_21_121058_create_detailbills_table', 6),
(26, '2021_03_21_140213_create_addresspayments_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `image1`, `image2`, `image3`, `image4`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(7, '14K Gold Anime Inspired Pendant, Iced Out 5A Cubic Zirconia', 'Gold', 'This 14K Gold Vegeta Pendant Micro Paving technique to put 5A CZ stones.  Package Content: 1pc. Iced Out 14K Gold Vegeta Pendant 1pc. Stainless Steel Rope Chain in 18k Gold 20/22/24 Inch  🔥 Handcrafted Anime Series Pendants By Zirona Crown 🔥  💯💯 PREMIUM QUALITY AND AFFORDABLE JEWELRIES  ', 'product-zvJ526.jpg', 'product-qJj336.jpg', 'product-ldS905.jpg', 'product-w2K573.jpg', 91, 110.00, '2021-03-09 05:19:18', '2021-04-02 06:05:33'),
(11, 'Punk Hip Hop Chain Pendant Personalized Necklace for Men\'s Women\'s Jewelr', 'Diamond', 'Description: Weight: 29g Chain length: 24inch  Pendant length: 5.0cm*3.5cm Chain Type: Rope Chain Color: Silver, Gold Quantity: 1 Pc  Product type: Pendant Necklaces', 'product-1Hz527.jpeg', 'product-r5s51.jpeg', 'product-iM0632.jpeg', 'product-oBT505.jpeg', 20, 39.00, '2021-04-13 04:29:10', '2021-04-13 04:29:10'),
(12, 'Fashion Man Necklace Pendant Necklace Chian Necklace Jewelry', 'Gemstone', 'Package:1pc Item Type:necklace Style: Trendy Material:Alloy Weight:13g Size:55+5cm Occasion:Wedding, Party, Cocktail, Engagement, Gift Make you more special and attractive. Perfect gifts for your friends and yourself.  Product type: Men Necklaces', 'product-xEE482.jpeg', 'product-g9K164.jpeg', 'product-XIU878.jpeg', 'product-LFG218.jpeg', 10, 15.00, '2021-04-13 04:32:49', '2021-04-13 04:32:49'),
(13, 'Hip Hop Iced Gold Plated SON GOKU', 'Diamond', 'PENDANT SIZE: 2\" & 2.25\"  CHAIN LENGTH: 18\" 20\" 24\" 30\" 11mm CUBAN CHAIN  GOLD plated over alloy.', 'product-5Sh295.jpg', 'product-k6o254.jpg', 'product-DKb398.jpg', 'product-Lut60.jpg', 5, 60.00, '2021-04-13 04:38:32', '2021-04-13 04:38:32'),
(14, '925 Silver Moissanite Diamond pass diamond tester DBZ Goku', 'Diamond', '*** Handcrafted *** Made to order *** USA CERTIFIED NICKEL FREE - hypoallergenic & Environmental friendly *** VS1 High Quality Moissanite stone \"\"For Any Other Design Contact Us. We will make your dream true in the jewelry\"\" We are making made to order jewelry in the \'custom order\' like cartoon pendant, letter pendant, logo pendant, photo pendant, engraving pendant, etc.', 'product-sox803.jpg', 'product-T9U53.jpg', 'product-nxU565.jpg', 'product-ZzE513.jpg', 19, 1500.00, '2021-04-13 04:42:14', '2021-04-13 08:51:25'),
(15, 'Love Hugging Hand Stackable Ring', 'Gold', 'Material : Brass Inner Size : 17-18mm - Adjustable Size Color : 24k Shiny Gold Plated Quantity : Optional', 'product-7hA832.jpg', 'product-DFZ611.jpg', 'product-slJ736.jpg', 'product-tQT77.jpg', 40, 20.00, '2021-04-13 04:43:44', '2021-04-13 04:43:44'),
(16, 'Snake Ring Silver Boho Vintage', 'Sliver', 'Snake Ring Silver Boho Vintage  Made from stainless steel - 100% Guaranteed to Never fade. Making This the perfect ring for daily wear.', 'product-PDX348.jpg', 'product-LNi712.jpg', 'product-Los532.jpg', 'product-ZGK59.jpg', 30, 14.00, '2021-04-13 04:45:32', '2021-04-13 04:45:32'),
(17, '14K White Gold 5X Layered 8 Teeth Grillz, Gold CZ Grillz', 'Gold', 'Handmade 8 Teeth Slugs Grillz with handset Cubic Zirconia Stones Grillz Description: Color:White Gold', 'product-q9n345.jpg', 'product-d4q876.jpg', 'product-KWJ393.jpg', 'product-PMr435.jpg', 20, 16.00, '2021-04-13 04:48:34', '2021-04-13 04:48:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_at`, `created_at`, `role`, `image`) VALUES
(14, 'Minh Tiến', 'cominhtien30@gmail.com', NULL, '$2y$10$o2ByL0Q.4NKvQhPnIjnnC.u2MhHjPGf5lPQ3WItBJqd84Bbdb2rki', NULL, '2021-03-21 06:55:57', '2021-03-04 07:36:10', 2, '14.jpg'),
(15, 'Minh Tiến', 'lop11a6.nhom6@gmail.com', NULL, NULL, NULL, '2021-04-13 15:25:58', '2021-03-04 11:32:50', 2, '15.png'),
(19, 'Admin', 'admin@gmail.com', NULL, '$2y$10$xuIFn8LUA9ZIbawUJUL1Z.SOec00KpWbdLIZcgg.rILFHrqsJZv2i', NULL, '2021-03-07 05:25:04', '2021-03-07 05:25:04', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `votes`
--

CREATE TABLE `votes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `product` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `votes`
--

INSERT INTO `votes` (`id`, `user`, `product`, `star`, `created_at`, `updated_at`) VALUES
(19, 15, 7, 5, '2021-03-25 05:46:07', '2021-03-25 05:46:11'),
(20, 15, 8, 4, '2021-03-25 05:46:16', '2021-03-25 05:46:20'),
(21, 14, 7, 1, '2021-03-25 05:46:36', '2021-03-25 05:46:40'),
(22, 14, 8, 3, '2021-03-25 05:46:44', '2021-03-25 05:46:48'),
(23, 15, 5, 0, '2021-03-25 18:48:02', '2021-03-25 18:48:02'),
(24, 19, 7, 5, '2021-03-26 00:33:32', '2021-04-10 20:03:02'),
(25, 19, 8, 0, '2021-03-26 00:34:01', '2021-03-26 00:34:01'),
(26, 14, 4, 0, '2021-04-02 04:22:50', '2021-04-02 04:22:50'),
(27, 14, 5, 0, '2021-04-02 04:28:18', '2021-04-02 04:28:18'),
(28, 19, 5, 0, '2021-04-09 04:46:57', '2021-04-09 04:46:57'),
(29, 19, 11, 3, '2021-04-13 04:29:30', '2021-04-13 04:54:52'),
(30, 19, 12, 3, '2021-04-13 04:49:29', '2021-04-13 04:57:14'),
(31, 19, 13, 0, '2021-04-13 04:49:32', '2021-04-13 04:49:32'),
(32, 19, 17, 0, '2021-04-13 04:49:37', '2021-04-13 04:49:37'),
(33, 19, 16, 0, '2021-04-13 04:49:44', '2021-04-13 04:49:44'),
(34, 19, 15, 0, '2021-04-13 04:49:49', '2021-04-13 04:49:49'),
(35, 19, 14, 0, '2021-04-13 04:49:57', '2021-04-13 04:49:57'),
(36, 14, 11, 5, '2021-04-13 04:58:42', '2021-04-13 04:58:47'),
(37, 14, 12, 0, '2021-04-13 05:27:01', '2021-04-13 05:27:01'),
(38, 15, 14, 5, '2021-04-13 08:26:28', '2021-04-13 08:26:35'),
(39, 15, 13, 3, '2021-04-13 08:26:41', '2021-04-13 08:26:51');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresspayments`
--
ALTER TABLE `addresspayments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detailbills`
--
ALTER TABLE `detailbills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresspayments`
--
ALTER TABLE `addresspayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `detailbills`
--
ALTER TABLE `detailbills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `votes`
--
ALTER TABLE `votes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
