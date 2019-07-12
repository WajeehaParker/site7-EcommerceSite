-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 03:07 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`) VALUES
(1, 'Sizes'),
(2, 'Colors'),
(3, 'Model-No'),
(4, 'Brands'),
(6, 'jewellery Attribute');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_value`
--

CREATE TABLE `attributes_value` (
  `attribute_value_id` int(11) NOT NULL,
  `value` varchar(200) NOT NULL,
  `attribute_name_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_value`
--

INSERT INTO `attributes_value` (`attribute_value_id`, `value`, `attribute_name_id`) VALUES
(1, 'Large', 1),
(2, 'Medium', 1),
(3, 'Small', 1),
(4, 'XL', 1),
(5, 'Blue', 2),
(6, 'Black', 2),
(7, 'Grey', 2),
(8, 'Off White', 2),
(9, 'Ht-6783', 3),
(10, 'Samsung', 4),
(12, 'Ash', 2),
(13, 'Gold Plated', 6),
(14, 'Q-900', 3),
(16, 'Lenovo', 4),
(17, 'T420', 3),
(19, 'Gold Plated', 2),
(21, 'Red', 2),
(22, 'NVO-X3', 3),
(23, 'White', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_detail_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_amount` int(11) NOT NULL,
  `pro_fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_detail_id`, `order_no`, `order_id`, `pro_price`, `pro_quantity`, `pro_amount`, `pro_fk_id`) VALUES
(1, 3333, 2, 4, 2, 8, 91),
(2, 76936780, 50, 43232, 2, 86464, 91),
(3, 76936780, 50, 670, 3, 2010, 92),
(4, 1501496803, 51, 670, 3, 2010, 92),
(5, 1796212449, 52, 43232, 1, 43232, 91);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`status_id`, `status`) VALUES
(1, 'Cancel'),
(2, 'Pending'),
(3, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `pro_image_id` int(11) NOT NULL,
  `Image Name` varchar(80) NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`pro_image_id`, `Image Name`, `image_path`, `product_id`) VALUES
(22, 'download (1).jpg4202.png4903.png1486.png', 'proimage/download (1).jpg4202.png4903.png1486.png', 91),
(23, 'download (2).jpg4.png3537.png', 'proimage/download (2).jpg4.png3537.png', 91),
(24, 'download (3).jpg855.png2822.png', 'proimage/download (3).jpg855.png2822.png', 91),
(25, 'download (2).jpg4.png3537.png2805.png', 'proimage/download (2).jpg4.png3537.png2805.png', 92),
(26, '160518_automatisierung_der_bodenab_passenger_boarding_bridge_a380_c_thyssenkrupp', 'proimage/160518_automatisierung_der_bodenab_passenger_boarding_bridge_a380_c_thyssenkrupp_image_w521_h350.jpg690.png', 93),
(27, 'download (1).jpg1488.png', 'proimage/download (1).jpg1488.png', 93),
(28, 'download (2).jpg3828.png', 'proimage/download (2).jpg3828.png', 93),
(29, 'download (3).jpg1189.png', 'proimage/download (3).jpg1189.png', 93),
(30, 'download (5).jpg4632.png', 'proimage/download (5).jpg4632.png', 94),
(31, 'download.jpg2496.png', 'proimage/download.jpg2496.png', 94),
(32, 'eub-20086844.jpg3713.png', 'proimage/eub-20086844.jpg3713.png', 94),
(33, 'images (2).jpg4082.png', 'proimage/images (2).jpg4082.png', 94),
(34, 'images (3).jpg1890.png', 'proimage/images (3).jpg1890.png', 94),
(35, 'images (4).jpg2280.png', 'proimage/images (4).jpg2280.png', 94),
(36, 'images (6).jpg4481.png', 'proimage/images (6).jpg4481.png', 94),
(37, 'images (7).jpg944.png', 'proimage/images (7).jpg944.png', 94),
(38, 'images (8).jpg3026.png', 'proimage/images (8).jpg3026.png', 94),
(39, 'images (10).jpg2055.png', 'proimage/images (10).jpg2055.png', 94),
(40, 'images (11).jpg1704.png', 'proimage/images (11).jpg1704.png', 94),
(41, 'images (12).jpg1872.png', 'proimage/images (12).jpg1872.png', 94),
(42, 'images (10).jpg306.png', 'proimage/images (10).jpg306.png', 95),
(43, 'images (11).jpg2559.png', 'proimage/images (11).jpg2559.png', 95),
(44, 'images (12).jpg4435.png', 'proimage/images (12).jpg4435.png', 95),
(45, 'images (14).jpg836.png', 'proimage/images (14).jpg836.png', 95),
(46, 'images (15).jpg2833.png', 'proimage/images (15).jpg2833.png', 95),
(47, 'images (16).jpg1915.png', 'proimage/images (16).jpg1915.png', 95);

-- --------------------------------------------------------

--
-- Table structure for table `product_info`
--

CREATE TABLE `product_info` (
  `product__Info_id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `attribute_value_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_info`
--

INSERT INTO `product_info` (`product__Info_id`, `product_Id`, `attribute_id`, `attribute_value_Id`) VALUES
(94, 68, 2, 12),
(95, 69, 1, 2),
(96, 69, 3, 9),
(97, 70, 1, 2),
(98, 70, 2, 23),
(99, 71, 1, 1),
(100, 71, 2, 5),
(101, 76, 1, 3),
(102, 77, 1, 3),
(103, 78, 1, 3),
(104, 79, 1, 3),
(105, 80, 1, 3),
(106, 80, 2, 19),
(107, 80, 3, 17),
(108, 81, 1, 1),
(109, 81, 2, 5),
(110, 82, 1, 1),
(111, 83, 1, 1),
(112, 84, 1, 2),
(113, 85, 1, 3),
(114, 86, 1, 2),
(115, 89, 1, 3),
(116, 90, 1, 3),
(117, 91, 1, 1),
(118, 92, 1, 1),
(119, 93, 2, 7),
(120, 94, 1, 1),
(121, 93, 1, 2),
(122, 93, 2, 19),
(123, 93, 6, 13),
(124, 94, 1, 3),
(125, 95, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `reg_id` int(11) NOT NULL,
  `reg_name` varchar(60) NOT NULL,
  `reg_email` varchar(60) NOT NULL,
  `reg_password` varchar(60) NOT NULL,
  `reg_address` varchar(250) NOT NULL,
  `reg_city` varchar(60) NOT NULL,
  `reg_phone_no` varchar(20) NOT NULL,
  `registration_date` datetime NOT NULL,
  `res_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`reg_id`, `reg_name`, `reg_email`, `reg_password`, `reg_address`, `reg_city`, `reg_phone_no`, `registration_date`, `res_status`) VALUES
(1, ' Asim', 'asim@live.com', ' 123', 'abc lkisa saisad', ' karachi', ' 0900 78601', '2019-02-13 00:00:00', 'active'),
(2, ' ayesha', 'aye@live.com', ' 2412bed1612e569b73c77a62ce5cbf5b', 'sdxsadj sdxhsa', ' lahore', ' 090087234', '2019-02-13 01:58:17', 'Pending'),
(3, '  sam', 'sam@live.com', '  56fafa8964024efa410773781a5f9e93', 'sef dcds dcds', '  karachi', '  0900 78 601', '2019-02-13 02:34:39', 'Pending'),
(4, ' kim', 'kim@live.com', ' 98467a817e2ff8c8377c1bf085da7138', 'sad dwqe wqe1312', ' karachi', ' 21321', '2019-02-13 02:41:37', 'active'),
(5, ' dim', 'dim@live.com', ' 3a316d397e7a62d69d2226476479ceea', 'dim abc ', ' karachi', ' 0900 6788652', '2019-02-13 02:45:24', 'active'),
(6, 'sawera', 'sawera@live.com', 'ee3de220ba17d0f3b75222cf3e67891c', 'as fgh hjkl', 'karachi', '4324324378', '2019-02-20 00:37:42', 'Inactive'),
(7, ' sobi', 'sobi@live.com', ' c20ad4d76fe97759aa27a0c99bff6710', 'dsfdsfs fdssdfgha', ' lahore', ' 324432453254', '2019-02-20 15:13:12', 'active'),
(8, '  iqra ilyas', 'iqra@live.com', '  c20ad4d76fe97759aa27a0c99bff6710', 'yuiu sdas dsa', '  karachi', '  6578999877', '2019-02-20 15:13:46', 'active'),
(9, ' nimra', 'nim@LIVE.COM', ' c20ad4d76fe97759aa27a0c99bff6710', 'sad dwqe wqe1312', ' karachi', ' 23432432', '2019-02-20 15:14:24', 'Pending'),
(10, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '2019-03-20 18:27:19', 'Inactive'),
(11, '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', '2019-03-20 18:32:27', 'Inactive'),
(12, 'Sobia', 'sobia@live.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'dsfsdafsdfs', 'karachi', '5646546', '2019-03-20 18:44:15', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `password`) VALUES
(1, 'admin', 'admin@live.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(50, 'Jewellery'),
(52, 'Clothes'),
(53, 'Cups'),
(55, 'Logos'),
(57, 'Electronics'),
(58, 'laptops');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `o_date` datetime NOT NULL,
  `o_person_name` varchar(50) NOT NULL,
  `o_person_address` varchar(50) NOT NULL,
  `o_phone` varchar(50) NOT NULL,
  `sec_address` varchar(5) NOT NULL,
  `o_amount` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `o_date`, `o_person_name`, `o_person_address`, `o_phone`, `sec_address`, `o_amount`, `status_id`) VALUES
(1, '2019-03-17 00:00:00', 'dd', 'rtr', '65656565', 'ytryr', 666, 2),
(50, '2019-03-17 00:00:00', 'iqra', 'tyytyyty', '090078601', 'iuiui', 88474, 2),
(51, '2019-03-17 00:00:00', 'iop', 'rtr', '7877', 'trt', 2010, 2),
(52, '2019-03-20 17:24:48', 'anaya', 'ytuyfvh677', '2323294893', 'hihvb', 43232, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `availability` varchar(15) NOT NULL,
  `unit_price` float NOT NULL,
  `stock` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `cat_fk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `pro_name`, `availability`, `unit_price`, `stock`, `type`, `cat_fk_id`) VALUES
(74, ' Q Mobile600', ' Available', 1, 5, 0, 52),
(75, ' Q Mobile600', ' Available', 43232, 5, 0, 52),
(76, 'gold', 'Unavailable', 6000, 5, 1, 55),
(77, 'gold', 'Unavailable', 6000, 5, 0, 55),
(78, 'Q Mobile600', 'Unavailable', 43232, 5, 1, 55),
(79, 'Q Mobile600', 'Unavailable', 43232, 5, 1, 55),
(80, 'Lenovo', 'Available', 670, 5, 1, 55),
(81, 'sad', 'Unavailable', 43232, 6, 0, 53),
(82, 'Q Mobile600', 'Unavailable', 43232, 6, 0, 52),
(83, 'Mens', 'Available', 67, 6, 2, 52),
(84, 'Kid\'s wear', 'Unavailable', 6000, 54, 0, 52),
(85, 'sad', 'Unavailable', 11, 11, 0, 58),
(86, 'sss', 'Available', 15000, 3, 0, 55),
(87, 'Lenovo', 'Unavailable', 670, 3, 2, 52),
(88, 'Lenovo', 'Unavailable', 670, 3, 0, 53),
(89, 'Lenovo', 'Unavailable', 670, 6, 2, 55),
(90, 'Lenovo', 'Unavailable', 670, 6, 0, 55),
(91, 'Lenovo', 'Unavailable', 43232, 8, 2, 52),
(92, 'Lenovo', 'Unavailable', 670, 231, 1, 55),
(93, 'rtrtr', 'Unavailable', 444, 4, 0, 57),
(94, 'ring', 'Unavailable', 234, 4, 1, 57),
(95, 'white', 'Unavailable', 1234, 4, 2, 58);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `attributes_value`
--
ALTER TABLE `attributes_value`
  ADD PRIMARY KEY (`attribute_value_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`pro_image_id`);

--
-- Indexes for table `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`product__Info_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attributes_value`
--
ALTER TABLE `attributes_value`
  MODIFY `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `pro_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `product_info`
--
ALTER TABLE `product_info`
  MODIFY `product__Info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
