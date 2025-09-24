-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2025 at 06:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommercedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `ID` int(5) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `pprice` int(10) NOT NULL,
  `pimg` varchar(100) NOT NULL,
  `pquantity` int(20) NOT NULL,
  `pdesc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`ID`, `pname`, `pprice`, `pimg`, `pquantity`, `pdesc`) VALUES
(12, 'Morobe Bilas', 143, '1757683377780.jpg', 1, 'Headdress for Laddy '),
(13, 'Oro', 134, '1758335518688.jpg', 2, 'Tapa cloths and headlet for man'),
(14, 'Boar tust', 123, 'necklace.jfif', 2, 'from Morobe'),
(15, 'muruk feathers', 40, 'cassowary-removebg-preview.png', 1, 'muruk'),
(16, 'new paradise', 123, 'WHPHeaddress.jfif', 2, 'headdress'),
(17, 'Boar tusk single', 45, 'hb.jpg', 1, 'from sepik'),
(18, 'Madang bilum costume', 57, '1757679076384.jpg', 1, 'For Woman '),
(19, 'Hagen traditional bi', 26, '1757679941381.jpg', 1, 'headdress and purpur for ladies');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID` int(5) NOT NULL,
  `product_name` varchar(20) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID`, `product_name`, `product_price`, `product_image`, `product_desc`) VALUES
(27, 'Muruk', 130, 'p1.jpg', 'Cassowary Feathers'),
(28, 'Boar tusk', 134, 'p25.jpg', 'Boar'),
(29, 'Boar tust', 123, 'necklace.jfif', 'from Morobe');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `ID` int(10) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_mail` varchar(50) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(20) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ordered',
  `Delivery_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ordered`
--

INSERT INTO `ordered` (`ID`, `customer_name`, `customer_mail`, `customer_address`, `product_name`, `product_price`, `product_image`, `status`, `Delivery_Date`) VALUES
(7, 'Mawat Banu', 'mbanu@example.com', 'Wasu', 'Kumul', 100, '3-removebg-preview.png', 'ordered', '2025-08-28'),
(8, 'Helmut Bangi', 'hbangi2019@gmail.com', 'Bumayong', 'footware', 43, 'p32.jpg', 'ordered', '2025-09-10'),
(9, 'Helmut Bangi', 'hbangi2019@gmail.com', 'Bumayong', 'Boar tusk single', 45, 'hb.jpg', 'ordered', '2025-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(5) NOT NULL,
  `customer_name` varchar(20) NOT NULL,
  `customer_mail` varchar(30) NOT NULL,
  `customer_phone` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `customer_name`, `customer_mail`, `customer_phone`, `username`, `password`) VALUES
(3, 'Hele', 'hele@example.com', 761465125, 'Hele', 'hele123'),
(4, 'Mawat Banu', 'mbanu@example.com', 325153514, 'Mawat', 'mawat123'),
(5, 'Enoch Wimbera', 'ewimbera@exampl.com', 13435173, 'Enoch', 'enoch123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
