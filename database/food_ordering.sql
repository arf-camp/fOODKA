-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 12:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `email`) VALUES
(1, 'Admin1', 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `heading` varchar(500) NOT NULL,
  `sub_heading` varchar(500) NOT NULL,
  `link` varchar(100) NOT NULL,
  `link_txt` varchar(100) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `order_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `heading`, `sub_heading`, `link`, `link_txt`, `added_on`, `status`, `order_number`) VALUES
(3, '3369_546847873_banner-4.jpg', 'EAT FOOD FROM US ', 'BE HEALTHY', 'shop', 'ORDER NOW', '2021-05-04 01:12:11', 1, 1),
(4, '2068_chinese.jpg', 'EAT THE BEST FOOD OF THE WORLD', 'STAY SAFE', 'shop', 'SHOP NOW', '2021-05-04 01:13:25', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `order_number` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `order_number`, `status`, `added_on`) VALUES
(1, 'Drink', 1, 1, '2020-06-16 12:06:33'),
(2, 'Chinese', 4, 1, '2020-06-16 12:06:41'),
(3, 'South Indian', 3, 1, '2020-06-16 12:06:59'),
(4, 'Dessert', 7, 1, '2020-06-16 12:07:18'),
(6, 'murgh', 8, 1, '2021-06-03 08:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile`, `subject`, `message`, `added_on`) VALUES
(2, 'ARF', 'tysonfarib@gmail.com', '52542424', 'food', 'I have eat your food and got  diarrhoea.I will see you in court', '2021-05-04 04:10:53'),
(3, 'Md Ashequr Rahman Farib', 'asheqrahman2621@gmail.com', '01926219940', 'food', 'worst food', '2021-05-31 07:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code`
--

CREATE TABLE `coupon_code` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `coupon_type` enum('P','F') NOT NULL,
  `coupon_value` int(11) NOT NULL,
  `cart_min_value` int(11) NOT NULL,
  `expired_on` date NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code`
--

INSERT INTO `coupon_code` (`id`, `coupon_code`, `coupon_type`, `coupon_value`, `cart_min_value`, `expired_on`, `status`, `added_on`) VALUES
(1, 'udemy21', 'P', 30, 40, '2021-06-30', 1, '2021-04-28 06:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` (`id`, `name`, `mobile`, `password`, `status`, `added_on`) VALUES
(1, 'KARIM', '01926219940', '123', 1, '2021-04-28 06:48:55'),
(2, 'Narayan', '52542424', '1234', 1, '2021-06-20 05:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `dish` varchar(100) NOT NULL,
  `dish_detail` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `type` enum('veg','non-veg') NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `category_id`, `dish`, `dish_detail`, `image`, `type`, `status`, `added_on`) VALUES
(1, 1, 'MOJO', 'cold drink test', 'Mojo-Soft-Drink-1-Liter.jpg', 'non-veg', 1, '2021-04-29 19:09:13'),
(2, 2, 'Noodles', 'indian', '836724175_Vegetarian-Chowmein-Recipe-Step-By-Step-Instructions.jpg', 'veg', 1, '2021-04-30 12:53:14'),
(3, 4, 'roshogolla', 'kolkatan', '467_rosh2.jpg', 'veg', 1, '2021-04-30 02:02:17'),
(4, 1, '7 up ', 'cold drinks', '7 up.jpg', 'veg', 1, '2021-04-30 02:35:29'),
(5, 2, 'Noodles chinese', 'sold by per plate', '834_chinese.jpg', 'non-veg', 1, '2021-05-01 02:00:30'),
(6, 4, 'Mishti doi', 'tangail', '918_mishti-doi-recipe.jpg', 'veg', 1, '2021-05-01 04:08:27'),
(7, 6, 'Butter chicken', 'Butter Chicken or murgh makhani is a curry of chicken in a spiced tomato, butter, and cream sauce. It originated in India as a curry. It is similar to chicken tikka masala, which uses a tomato gravy', '305_butter-chicken-500x500.jpg', 'non-veg', 1, '2021-06-03 08:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `dish_cart`
--

CREATE TABLE `dish_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dish_detail_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dish_details`
--

CREATE TABLE `dish_details` (
  `id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish_details`
--

INSERT INTO `dish_details` (`id`, `dish_id`, `attribute`, `price`, `status`, `added_on`) VALUES
(1, 5, 'half', 202, 1, '2021-05-01 02:00:30'),
(4, 5, 'full', 250, 1, '2021-05-01 03:57:17'),
(5, 4, '1 litre', 45, 1, '2021-05-01 04:01:14'),
(6, 3, '1 kg ', 202, 1, '2021-05-01 04:03:38'),
(7, 3, '.5 kg', 100, 1, '2021-05-01 04:03:38'),
(8, 2, '1 plate', 50, 1, '2021-05-01 04:04:50'),
(9, 2, '5 plate', 200, 1, '2021-05-01 04:04:50'),
(10, 1, '1 litre', 70, 1, '2021-05-01 04:05:25'),
(11, 6, 'per hari ', 70, 1, '2021-05-01 04:08:27'),
(12, 6, 'per kolshi', 120, 1, '2021-05-01 04:08:27'),
(13, 7, 'half', 202, 1, '2021-06-03 08:25:45'),
(14, 7, 'full', 275, 1, '2021-06-03 08:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `dish_details_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `dish_details_id`, `price`, `qty`) VALUES
(1, 1, 6, 202, 1),
(2, 1, 4, 250, 2),
(3, 2, 10, 70, 2),
(4, 3, 13, 202, 1),
(5, 4, 8, 50, 1),
(6, 5, 8, 50, 1),
(7, 6, 5, 45, 1),
(8, 7, 5, 45, 3),
(9, 8, 5, 45, 1),
(10, 9, 10, 70, 1),
(11, 10, 7, 100, 6);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `total_price` float NOT NULL,
  `coupon_code` varchar(20) NOT NULL,
  `final_price` float NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `order_status` int(11) NOT NULL,
  `added_on` datetime NOT NULL,
  `delivered_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`id`, `user_id`, `name`, `email`, `mobile`, `address`, `total_price`, `coupon_code`, `final_price`, `zipcode`, `delivery_boy_id`, `payment_status`, `payment_type`, `payment_id`, `order_status`, `added_on`, `delivered_on`) VALUES
(1, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'khilgaon', 702, '', 0, '1219', 1, 'pending', '', '', 2, '2021-06-09 06:47:15', '2021-06-30 21:17:24'),
(2, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', '1383/8/15/3, Moulovirtec Shohor Khilgaon Rampura, Dhaka-1219', 140, '', 0, '1219', 2, 'success', 'cod', '', 2, '2021-06-14 06:11:32', '2021-06-30 21:17:24'),
(3, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', '1383/8/15/3, Moulovirtec Shohor Khilgaon Rampura, Dhaka-1219', 202, '', 0, '1219', 0, 'pending', 'cod', '', 2, '2021-06-20 06:12:33', '2021-06-30 21:17:24'),
(4, 2, 'sahan', 'asheqrahman2621@gmail.com', '01926219940', 'banani', 50, '', 0, '2341', 0, 'pending', 'cod', '', 1, '2021-06-20 10:10:41', '2021-06-30 21:17:24'),
(5, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', '12 taltola dhaka', 50, 'udemy21', 35, '1219', 1, 'pending', 'cod', '', 4, '2021-06-29 05:18:52', '2021-06-30 09:36:49'),
(6, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'khilgaon', 45, '', 45, '12121', 0, 'pending', '', '', 1, '2021-06-21 11:43:33', '2021-06-30 21:17:24'),
(7, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'khilgaon meradia', 135, '', 135, '1232', 0, 'pending', '', '', 1, '2021-06-21 11:47:48', '2021-06-30 21:17:24'),
(8, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'khilgaon meradia', 45, '', 45, '2313', 0, 'pending', '', '', 1, '2021-06-21 11:54:18', '2021-06-30 21:17:24'),
(9, 1, 'Farib', 'asheqrahman2621@gmail.com', '01926219940', ' Khilgaon Rampura', 70, '', 70, '1219', 0, 'pending', '', '', 4, '2021-07-02 12:01:22', '2021-06-30 21:17:24'),
(10, 1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'puran dhaka 23232', 600, '', 600, '11212', 0, 'pending', 'cod', '', 1, '2021-07-02 03:55:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `order_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `order_status`) VALUES
(1, 'pending'),
(2, 'cooking'),
(3, 'On the Way'),
(4, 'delivered'),
(5, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `dish_detail_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `order_id`, `dish_detail_id`, `rating`) VALUES
(1, 1, 9, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `cart_min_price` int(11) NOT NULL,
  `cart_min_price_msg` varchar(200) NOT NULL,
  `website_close` int(11) NOT NULL,
  `website_close_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `cart_min_price`, `cart_min_price_msg`, `website_close`, `website_close_msg`) VALUES
(1, 0, '', 0, 'website is closed now. You can checkout between 8 am to 10 pm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `added_on` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `email_verify` int(11) NOT NULL,
  `rand_str` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `mobile`, `password`, `added_on`, `status`, `email_verify`, `rand_str`) VALUES
(1, ' Farib', 'tysonfarib@gmail.com', '01926219940', 'arf', '2021-06-03 01:28:14', 1, 1, 'vnqraihcnpyejjw'),
(2, 'sahan', 'asheqrahman2621@gmail.com', '01926219940', 'sah1', '2021-06-03 06:16:31', 1, 1, 'qvufchdhraplfwb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code`
--
ALTER TABLE `coupon_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_cart`
--
ALTER TABLE `dish_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish_details`
--
ALTER TABLE `dish_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
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
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_code`
--
ALTER TABLE `coupon_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_boy`
--
ALTER TABLE `delivery_boy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dish_cart`
--
ALTER TABLE `dish_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `dish_details`
--
ALTER TABLE `dish_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
