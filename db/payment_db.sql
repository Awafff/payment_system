-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 04:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` char(6) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `describe_product` text NOT NULL,
  `price_product` int(11) NOT NULL,
  `amount_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `describe_product`, `price_product`, `amount_product`) VALUES
('000001', 'Product 1', 'lorem dolor ipsum', 3000000, 1),
('000002', 'Product 2', 'lorem dolor ipsum', 3500000, 1),
('000003', 'Product 3', 'lorem dolor ipsum', 4000000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id_order` char(24) NOT NULL,
  `id_user` char(10) NOT NULL,
  `id_product` char(6) NOT NULL,
  `date_order` date NOT NULL,
  `price_order` int(11) NOT NULL,
  `status_order` enum('paid','unpaid','waiting','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id_order`, `id_user`, `id_product`, `date_order`, `price_order`, `status_order`) VALUES
('001100110000000220200903', '0011001100', '000002', '2020-09-03', 3500000, 'waiting'),
('001100110000000320200902', '0011001100', '000003', '2020-09-02', 4000000, 'unpaid'),
('001100110000000320200903', '0011001100', '000003', '2020-09-03', 4000000, 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `product_payment`
--

CREATE TABLE `product_payment` (
  `id_payment` char(32) NOT NULL,
  `date_payment` date NOT NULL,
  `img_payment` text NOT NULL,
  `descript_payment` text NOT NULL,
  `id_order` char(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_payment`
--

INSERT INTO `product_payment` (`id_payment`, `date_payment`, `img_payment`, `descript_payment`, `id_order`) VALUES
('00110011000000022020090320200903', '2020-09-03', 'assets/img/payment_confirmation/00110011002020090331220001100110000000220200903.jpg', 'test', '001100110000000220200903');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` char(12) NOT NULL,
  `username_user` varchar(20) NOT NULL,
  `fullname_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `type_user` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `fullname_user`, `password_user`, `email_user`, `type_user`) VALUES
('0011001100', 'user', 'user 1', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user@mail.com', 'user'),
('1100110011', 'admin', 'administrator', 'f5bb0c8de146c67b44babbf4e6584cc0', 'admin@mail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `product_payment`
--
ALTER TABLE `product_payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_order`
--
ALTER TABLE `product_order`
  ADD CONSTRAINT `product_order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `product_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `product_payment`
--
ALTER TABLE `product_payment`
  ADD CONSTRAINT `product_payment_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `product_order` (`id_order`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
