-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 04:49 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_user`
--

CREATE TABLE `tbl_admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` enum('A','SA','U') DEFAULT NULL COMMENT 'A - Admin, SA-super Admin, U- users',
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin_user`
--

INSERT INTO `tbl_admin_user` (`id`, `name`, `username`, `password`, `role`, `status`, `created_date`, `updated_date`) VALUES
(1, 'Manikandan', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'A', 'A', '2021-02-27 19:13:46', '2021-02-27 19:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `sku` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL,
  `special_price` varchar(20) NOT NULL,
  `upload_img` text NOT NULL,
  `description` text NOT NULL,
  `position` int(11) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_name`, `sku`, `price`, `special_price`, `upload_img`, `description`, `position`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Ne Producct', 'PRO930759', '4,000.00', '2,800.00', '1239641566.jpg,1287693688.jpg', '<p> </p>\r\n<div style=\"margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\"> </div>\r\n<p> </p>\r\n<div style=\"margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: #000000; font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;\">\r\n<p style=\"margin: 0px 0px 15px; padding: 0px; text-align: left;\"><strong style=\"margin: 0px; padding: 0px;\">Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>', 0, 'A', '2021-03-01 09:15:55', '2021-03-01 09:15:55'),
(2, 'mens Producct', 'PRO200548', '2,000.00', '1,000.00', '184978023.jpg,1895149899.jpg', '<p>Lorem Ipsum is simply dummied text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, w</p>', 0, 'A', '2021-03-01 09:17:32', '2021-03-01 09:17:32'),
(3, 'new Product', 'PRO883221', '3,500.00', '2,800.00', '1533208844.jpg,115993947.jpg', '<p><span style=\"font-family: \'Open Sans\', Arial, sans-serif; text-align: justify;\">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using</span></p>', 0, 'A', '2021-03-01 09:18:34', '2021-03-01 09:18:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_user`
--
ALTER TABLE `tbl_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
