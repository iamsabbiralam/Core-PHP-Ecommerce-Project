-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 02:26 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trendy_bloom`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `add_id` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`add_id`, `email`, `address`, `city`, `country`) VALUES
(4, 'reza@gmail.com', '16/2, Daben babu road', 'Khulna', 'Bangladesh'),
(5, 'adiyat@gmail.com', '16/2, Daben babu road', 'Khulna', 'Bangladesh'),
(6, 'nurr@gmail.com', 'Bk Roy Road', 'Khulna', 'Bangladesh'),
(7, 'nurr@gmail.com', 'Bk Roy Road', 'Khulna', 'Bangladesh'),
(8, 'nurr@gmail.com', 'Bk Roy Road', 'Khulna', 'Bangladesh'),
(9, 'adiyat@gmail.com', 'Hazi ismail road', 'Khulna', 'Bangladesh'),
(10, 'efty@gmail.com', '137 Bk ray road', 'Khulna', 'Bangladesh'),
(11, 'sabbir@gmail.com', '16/2, Daben babu road', 'Khulna', 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(3) NOT NULL,
  `a_pic` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_pic`, `name`, `email`, `pass`, `phone`, `address`, `role`) VALUES
(1, 'DSC_3231.JPG', 'Sabbir Alam', 'admin@gmail.com', '808de62abc5fe6380db8497b1331a1d0', '01715039303', '16/2, Daben Babu Road, Khulna', 'Admin'),
(2, '78953785_1763046700504340_8018439083883757568_o.jpg', 'Sk Taslim Ahmed Efty', 'taslim@gmail.com', '83dfa85963aa85886363370042b288cb', '01719393563', '137 BK Roy road, Dalmil more khulna ', 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `crt_id` int(11) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`crt_id`, `u_email`, `pid`, `p_name`, `p_price`, `qty`, `price_total`) VALUES
(24, 'efty@gmail.com', 4, 'Smart TV', 50000, 1, 50000),
(40, 'efty@gmail.com', 9, 'Samsung A50', 25000, 1, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cat_name`) VALUES
(1, 'Jewelleries'),
(2, 'Electronics'),
(3, 'Stationary'),
(4, 'Mobiles'),
(6, 'Furniture');

-- --------------------------------------------------------

--
-- Table structure for table `paymethod`
--

CREATE TABLE `paymethod` (
  `pay_id` int(3) NOT NULL,
  `pay_method` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`pay_id`, `pay_method`) VALUES
(1, 'Cash on Delivery'),
(2, 'NRB Debit Card'),
(4, 'DBBL Debit Card');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(8) NOT NULL,
  `p_desc` longtext NOT NULL,
  `p_brand` varchar(200) NOT NULL,
  `p_stock` int(5) NOT NULL,
  `p_pic` varchar(200) NOT NULL,
  `p_gallery` varchar(240) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `p_name`, `p_price`, `p_desc`, `p_brand`, `p_stock`, `p_pic`, `p_gallery`) VALUES
(4, 2, 'Smart TV', 50000, 'This is a smart TV', 'Samsung', 5, 'OIP.jpg', ''),
(5, 3, 'Double A4 Paper', 350, 'Made in Thailand', 'Double A', 45, 'OIP (1).jpg', ''),
(7, 4, 'iPhone 12 Max Pro', 130000, 'iPhone 12 max pro black edition', 'iPhone', 10, 'iPhone 12.jpg', ''),
(8, 4, 'Samsung M31', 26000, 'Samsung Galaxy is a series of computing and mobile computing devices that are designed, manufactured and marketed by Samsung Electronics.', 'Samsung', 10, 'samsung-galaxy-m31-2-955x1024-1_2.jpg', ''),
(9, 4, 'Samsung A50', 25000, 'Samsung Galaxy is a series of computing and mobile computing devices that are designed, manufactured and marketed by Samsung Electronics. Very good phone.', 'Samsung', 12, 'R8162dec66ccac9bdd61e3b18ca5df591.jpg', ''),
(11, 6, 'TV Table', 25000, 'This is a TV table.', 'Hatil', 9, 'crosley-furniture-lafayette-buffet-server-sideboard-cabinet-with-wine-storage-in-classic-cherry-finish-kf42001bch-5.jpg', ''),
(12, 6, 'Sofa Set', 120000, 'This is a sofa set which is made form wood.', 'Hatil', 8, 'Re5338c3a196fbe84ad6eb15a9e9c2a29.jpg', ''),
(13, 3, 'Faber castell coloured pencils', 250, 'Faber-Castell is one of the world\'s largest and oldest manufacturers of pens, pencils, other office supplies and art supplies, as well as high-end writing instruments and luxury leather goods.', 'Faber castell', 99, '116530_10_PM1.jpg', ''),
(14, 1, 'Payel ', 300, 'This is a payel', 'Citygold', 20, '146762335_225544092609756_3428952928237935718_o.jpg', ''),
(15, 1, 'Lipstick', 59, 'Matte & liquid matte lipsticks.', 'China', 100, '154325254_235697168261115_1341770888182404497_o.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `sid` int(3) NOT NULL,
  `s_rate` int(5) NOT NULL,
  `s_city` varchar(200) NOT NULL,
  `s_country` varchar(200) NOT NULL,
  `s_time` int(5) NOT NULL,
  `s_method` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`sid`, `s_rate`, `s_city`, `s_country`, `s_time`, `s_method`) VALUES
(1, 50, 'Khulna', 'Bangladesh', 3, 'SA Paribahan'),
(2, 100, 'Dhaka', 'Bangladesh', 6, 'Sundarban Curiar');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `ch_id` int(11) NOT NULL,
  `order_ids` text NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `shipping_cost` int(11) NOT NULL,
  `pay_method` varchar(200) NOT NULL,
  `final_total` int(11) NOT NULL,
  `order_status` varchar(200) NOT NULL,
  `checkout_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`ch_id`, `order_ids`, `u_email`, `shipping_cost`, `pay_method`, `final_total`, `order_status`, `checkout_time`) VALUES
(2, '3', 'reza@gmail.com', 50, 'Cash on Delivery', 260050, 'complete', '2021-02-21 19:23:55'),
(7, '9,10', 'reza@gmail.com', 50, 'Cash on Delivery', 25400, 'pending', '2021-02-24 08:39:56'),
(8, '11', 'reza@gmail.com', 50, 'Cash on Delivery', 400, 'confirm', '2021-02-24 08:40:31'),
(9, '12,13', 'adiyat@gmail.com', 50, 'Cash on Delivery', 170050, 'cencel', '2021-02-25 06:24:46'),
(10, '14,15', 'reza@gmail.com', 50, 'Cash on Delivery', 120300, 'processing', '2021-02-27 19:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `or_id` int(11) NOT NULL,
  `u_email` varchar(200) NOT NULL,
  `pid` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price_total` int(11) NOT NULL,
  `order_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`or_id`, `u_email`, `pid`, `p_name`, `p_price`, `qty`, `price_total`, `order_time`) VALUES
(3, 'reza@gmail.com', 7, 'iPhone 12 Max Pro', 130000, 2, 260000, '2021-02-21 19:23:55'),
(4, 'adiyat@gmail.com', 8, 'Samsung M31', 26000, 1, 26000, '2021-02-21 19:45:19'),
(5, 'adiyat@gmail.com', 5, 'Double A4 Paper', 350, 1, 350, '2021-02-21 19:45:19'),
(6, 'reza@gmail.com', 8, 'Samsung M31', 26000, 1, 26000, '2021-02-23 07:27:16'),
(7, 'reza@gmail.com', 5, 'Double A4 Paper', 350, 1, 350, '2021-02-23 07:31:54'),
(9, 'reza@gmail.com', 5, 'Double A4 Paper', 350, 1, 350, '2021-02-24 08:39:56'),
(10, 'reza@gmail.com', 11, 'TV Table', 25000, 1, 25000, '2021-02-24 08:39:56'),
(11, 'reza@gmail.com', 5, 'Double A4 Paper', 350, 1, 350, '2021-02-24 08:40:31'),
(12, 'adiyat@gmail.com', 4, 'Smart TV', 50000, 1, 50000, '2021-02-25 06:24:46'),
(13, 'adiyat@gmail.com', 12, 'Sofa Set', 120000, 1, 120000, '2021-02-25 06:24:46'),
(14, 'reza@gmail.com', 13, 'Faber castell coloured pencils', 250, 1, 250, '2021-02-27 19:48:55'),
(15, 'reza@gmail.com', 12, 'Sofa Set', 120000, 1, 120000, '2021-02-27 19:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transections`
--

CREATE TABLE `tbl_transections` (
  `t_id` int(11) NOT NULL,
  `ch_id` int(11) NOT NULL,
  `pay_method` varchar(100) NOT NULL,
  `trans_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transections`
--

INSERT INTO `tbl_transections` (`t_id`, `ch_id`, `pay_method`, `trans_time`) VALUES
(1, 1, 'Cash on Delivery', '2021-02-20 19:29:01'),
(2, 2, 'Cash on Delivery', '2021-02-21 19:23:55'),
(3, 3, 'Cash on Delivery', '2021-02-21 19:45:19'),
(4, 4, 'Cash on Delivery', '2021-02-23 07:27:16'),
(5, 5, 'Cash on Delivery', '2021-02-23 07:31:54'),
(6, 6, 'Cash on Delivery', '2021-02-23 07:56:37'),
(7, 7, 'Cash on Delivery', '2021-02-24 08:39:56'),
(8, 8, 'Cash on Delivery', '2021-02-24 08:40:31'),
(9, 9, 'Cash on Delivery', '2021-02-25 06:24:46'),
(10, 10, 'Cash on Delivery', '2021-02-27 19:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_pic` varchar(200) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `r_Time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_pic`, `fullname`, `email`, `pwd`, `phone`, `gender`, `dob`, `address`, `city`, `country`, `status`, `token`, `r_Time`) VALUES
(1, '88151749_101232028161647_7162824939311988736_o.jpg', 'Nurul Islam', 'nurr@gmail.com', '9a809ff27acf11b5fc90f1982eb67eb8', '0820923920', 'M', '1995-10-20', 'Bk Roy Road', 'Khulna', 'Bangladesh', 'active', '903a9228ff623d459a513a17c8e350ad', '2021-02-28 14:04:06.000000'),
(2, '151681167_3832303043519601_197950738307172008_n.jpg', 'Adiyat Siddique', 'adiyat@gmail.com', '166cb14e2985fc4ff3f80d71f74bc249', '01681950322', 'M', '2018-05-08', 'Hazi ismail road', 'Khulna', 'Bangladesh', 'active', 'f72c19b8337448fc8c6471e08e72d2d8', '2021-02-28 14:10:34.000000'),
(3, '131568684_2233282253480780_1265515038876975365_o.jpg', 'Sk Taslim Ahmed Efty', 'efty@gmail.com', '83dfa85963aa85886363370042b288cb', '01719393563', 'M', '1995-03-15', '137 Bk ray road', 'Khulna', 'Bangladesh', 'active', '9ef10258938007e02b3f9bb94de4057e', '2021-02-28 14:13:32.000000'),
(4, '', 'Sabbir Alam', 'sabbir@gmail.com', '808de62abc5fe6380db8497b1331a1d0', '01715039303', 'M', '1995-08-28', '16/2, Daben babu road', 'Khulna', 'Bangladesh', 'active', 'db26cbea14ed38b613cf71247e1a38d4', '2021-02-28 14:19:20.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`crt_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`ch_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`or_id`);

--
-- Indexes for table `tbl_transections`
--
ALTER TABLE `tbl_transections`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `add_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `crt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paymethod`
--
ALTER TABLE `paymethod`
  MODIFY `pay_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `ch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_transections`
--
ALTER TABLE `tbl_transections`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
