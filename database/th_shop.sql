-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 06:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `th_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-24 16:21:18', '20-04-2022 01:01:09 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `categoryDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `creationDate`, `updationDate`, `categoryDescription`) VALUES
(25, 'Honda', '2022-04-20 00:04:42', NULL, 'các sản phẩm đến từ Honda'),
(26, 'SYM', '2022-04-20 00:05:00', NULL, 'các sảm phẩm đến từ SYM\r\n'),
(27, 'SUZUKI', '2022-04-20 00:05:21', NULL, 'các sản phẩm đến từ SUZUKI'),
(28, 'YAMAHA', '2022-04-20 00:06:31', NULL, 'các sản phẩm đến từ YAMAHA');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(9, 7, '34', 1, '2022-04-20 13:27:24', 'Debit / Credit card', NULL),
(10, 7, '30', 1, '2022-04-20 13:50:10', 'COD', NULL),
(11, 7, '30', 3, '2022-04-20 15:01:58', 'COD', NULL),
(12, 7, '31', 1, '2022-04-20 15:02:34', 'COD', NULL),
(13, 7, '33', 1, '2022-04-20 15:02:34', 'COD', NULL),
(14, 7, '34', 1, '2022-04-20 15:02:34', 'COD', NULL),
(15, 7, '30', 1, '2022-04-20 16:00:32', 'COD', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `name`, `review`, `reviewDate`) VALUES
(9, 30, 'Phan Thái Hiền', 'sản phẩm ok', '2022-04-20 14:25:19'),
(12, 30, 'hiền', '123', '2022-04-20 15:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage`, `postingDate`, `updationDate`) VALUES
(30, 25, 'lốp xe ', 'Honda', 90000, 100000, '<strong style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Lốp sau xe Air Blade 125</strong><span style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; text-align: justify; font-size: 14px;\">&nbsp;ChengShin</span><br>', '1491278944621.jpg', '2022-04-20 05:46:56', NULL),
(31, 25, 'Má phanh trước xe Exciter', 'SYM', 490000, 500000, '<span style=\"color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Sản xuất theo tiêu chuẩn của Nhật, được sản xuất và đóng gói tại công ty Elig Việt Nam (Nhà sản xuất và cung cấp má phanh xe máy và ô tô cho các hãng Honda, Yamaha, Suzuki…)</span><br>', '1431139905875.jpg', '2022-04-20 08:16:03', NULL),
(32, 27, 'Đĩa phanh xe Hayate chính hãng Suzuki', 'SUZUKI', 380000, 400000, '<span style=\"color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Đĩa phanh xe Hayate chính hãng nhập khẩu&nbsp;trực tiếp&nbsp;Suzuki Việt Nam</span><br>', '5c8c636187bfa-dia-phanh-xe-hayate-chinh-hang.jpg', '2022-04-20 08:16:57', NULL),
(33, 26, 'Lốp độ xe Exciter', 'SYM', 980000, 1000000, '<h1 class=\"tieude\" style=\"box-sizing: border-box; font-size: 22px; margin-top: 20px; font-family: sans-serif; font-weight: 500; line-height: 1.1; color: rgb(27, 110, 255); text-align: justify;\">Lốp độ xe Exciter</h1>', '1491382090734.jpg', '2022-04-20 08:30:19', NULL),
(34, 28, 'Bộ khóa xe Exciter 4 số chính hãng Yamaha', 'YAMAHA', 90000, 100000, '<p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Bộ khóa xe gồm: Khóa yên, khóa điện và 2 chìa khóa.</p><ul style=\"box-sizing: border-box; list-style: none; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\"><li style=\"box-sizing: border-box;\">Xuất xứ: Yamaha sản xuất</li><li style=\"box-sizing: border-box;\">Chất lượng tốt, an toàn, mẫu mã đẹp, là lựa chọn tốt cho quý khách khi cần thay thế</li></ul><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Giá trên đã bao gồm công lắp ráp.</p>', '1432034405936.jpg', '2022-04-20 08:34:14', NULL),
(35, 25, 'Dầu máy xe Air blade Mobil 1 Gold', 'HonDa', 90000, 100000, '<em style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Sản phẩm&nbsp;<strong style=\"box-sizing: border-box;\">dầu máy xe Air Blade Mobil 1 Gold xe Air Blade</strong>&nbsp;là một trong những sản phẩm nừm trong top đầu chất lượng tốt nhất trên thị trường hiện nay. Xe Air Blade là dòng xe được ưa chuộng nhiều nhất trên thị trường xe tay ga ở Việt Nam hiện nay vì thế dầu nhớt cho xe cũng được quan tâm nhiều. Bạn mong muốn có những lựa chọn sao cho giá cả hợp lý nhưng phải đảm bảo chất lượng và an toàn khi tham gia lưu thông, dầu nhớt Mobil 1 Gold nhập khẩu từ Mỹ&nbsp;là một lựa chọn thông minh cho chủ nhân các xe Air Blade.</em><br>', 'a.jpg', '2022-04-20 14:39:35', NULL),
(36, 25, 'Còi xe', 'HonDa', 60000, 90000, '<p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Xuất sứ:&nbsp; NIKKO Thái Lan. Nhà sản xuất còi ô tô xe máy hàng đầu Thái Lan</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Điện áp sử dụng: 12V – Phù hợp cho mọi xe máy tại Việt Nam.</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Ưu điểm:</p><ul style=\"box-sizing: border-box; list-style: none; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\"><li style=\"box-sizing: border-box;\">Tuổi thọ cao, thời gian sử dụng lâu.</li><li style=\"box-sizing: border-box;\">Hoạt động tốt trong các điều kiện môi trường khác nhau: bụi, nước, ẩm ướt, lạnh…</li><li style=\"box-sizing: border-box;\">Dễ dàng lắp ráp và cân chỉnh.</li></ul>', 'Sff4cabe829324bbc810eb5dcf06b91a2H.jpg', '2022-04-20 14:44:47', NULL),
(37, 25, 'Bộ bánh răng láp xe SH 2013 chính hãng Honda', 'HonDa', 90000, 100000, '<p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Xuất xứ: Honda Việt Nam hoặc Honda Thái Lan.</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Thành phần: 4 bánh răng trục láp.</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Vật liệu: Thép hợp kim cao cấp theo tiêu chuẩn Nhật bản.</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Chuẩn thông số kỹ thuật, có độ ổn định và độ bền cao.</p><p style=\"box-sizing: border-box; color: rgb(0, 0, 0); font-family: sans-serif; font-size: 15px; text-align: justify;\">Giá trên đã bao gồm công dịch vụ lắp ráp và bảo dưỡng các chi tiết liên quan.</p>', '1431245529725.jpg', '2022-04-20 14:46:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `createDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `address`, `district`, `province`, `createDate`, `updationDate`) VALUES
(1, 'Phan Thái Hiền', 'phanthaihien000@gmail.com', '0937760152', 'f925916e2754e5e03f75dd58a5733251', 'KTX B ĐH Cần Thơ', 'Ninh Kiều', 'Cần Thơ', '2017-02-04 19:30:50', ''),
(7, 'Phan Thái Hiền', 'hien@gmail.com', '0937760152', '202cb962ac59075b964b07152d234b70', 'KTX B khu 2 đại học Cần Thơ', 'Cần Thơ', 'Quận Ninh Kiều', '2022-04-20 09:36:30', '20-04-2022 03:46:51 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
