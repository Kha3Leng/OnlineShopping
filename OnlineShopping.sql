-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 24, 2022 at 12:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `OnlineShopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(15, 'Tatiania Curtoys', 'tcurtoys0', 'JpQ2f85dHbxS'),
(16, 'Free Crowson', 'fcrowson1', '5JcW7Tk1Eb'),
(17, 'Ki Megarry', 'kmegarry2', 'houYwdmlRj'),
(18, 'Sumner Santore', 'ssantore3', 'HyL051iOnvE'),
(19, 'Papagena Boc', 'pboc4', 'DWGK0Ol4'),
(20, 'Niles Fermin', 'nfermin5', 'fAkP1Q'),
(21, 'Melinde Semerad', 'msemerad6', 'bJfE6eQ9aCaH'),
(22, 'Thom Roke', 'troke7', 'STMW77uK7M'),
(23, 'Elroy Nozzolinii', 'enozzolinii8', 'AdPC5X'),
(24, 'Analise Castro', 'acastro9', 'xb5dMX'),
(25, 'Nerita Loughrey', 'nloughreya', 'G3cl1bY2stEg'),
(26, 'Cati Varndell', 'cvarndellb', 'U4cUpqrj'),
(27, 'Barrie Fuzzens', 'bfuzzensc', 'T88zSXqD3'),
(28, 'Marguerite Denidge', 'mdenidged', 'sWXt4anXVp'),
(29, 'Arlina Jellyman', 'ajellymane', 'O8KH4V1'),
(30, 'Ines Bigley', 'ibigleyf', 'fu8Yl6QXdi'),
(31, 'Leicester Masterson', 'lmastersong', 'VHlCZZ'),
(32, 'Oswell Biaggioni', 'obiaggionih', 'NaS5q9mq'),
(33, 'Patrizia Whewill', 'pwhewilli', 'T9Ux7F'),
(34, 'Sibeal Brennenstuhl', 'sbrennenstuhlj', 'BGG7vyghjIhp'),
(35, 'Moises Pettyfer', 'mpettyferk', 'qL7uo0tCD'),
(36, 'Merle Mixture', 'mmixturel', '3nLJ0ehFu'),
(37, 'Lionello Le Port', 'llem', 'YyiOcsREEF'),
(38, 'Tybalt Durtnall', 'tdurtnalln', 'jZTO0w'),
(39, 'Robinett Newling', 'rnewlingo', 'ycCIkwksl'),
(40, 'Aurlie Turford', 'aturfordp', '4SiDAtGQh'),
(41, 'Court Beathem', 'cbeathemq', '2S4hWIK'),
(42, 'Levin Rebillard', 'lrebillardr', 'WIH7JcR'),
(43, 'Shannan Breinlein', 'sbreinleins', 'auvBT71K'),
(44, 'Tiphany Coward', 'tcowardt', 'AKvjLqt'),
(45, 'Artair Rogliero', 'aroglierou', 'VsBqbYa'),
(46, 'Harmon Munford', 'hmunfordv', 'KlGXSd'),
(47, 'Stacia Lemerie', 'slemeriew', 'GhDnJeIkyz5T'),
(48, 'Camey Bromby', 'cbrombyx', 'mnxPYKW'),
(49, 'Georgi Rizzelli', 'grizzelliy', 'T4g6wLh9jiiT'),
(50, 'Tiena Kybird', 'tkybirdz', 'DSCIi2Q'),
(51, 'Vin Matveiko', 'vmatveiko10', 'gq0vUcL'),
(52, 'Byrom Stainer', 'bstainer11', 'Z1eXIb'),
(53, 'Kristo Dunphy', 'kdunphy12', 'nynMxfUmaR'),
(54, 'Carma Danielski', 'cdanielski13', 'K7Fa7Rhx6'),
(55, 'Brianne Craufurd', 'bcraufurd14', 'goHjdZCAG5RK'),
(56, 'Carlene Baseley', 'cbaseley15', '2TtaGSQ'),
(57, 'Shell Burbank', 'sburbank16', '9uueLrS'),
(58, 'Teressa Salle', 'tsalle17', 'QwxpBV3NrDz'),
(59, 'Garwood Easman', 'geasman18', 'pn6oGz'),
(60, 'Rhett Chisnall', 'rchisnall19', '6ilUAqYM8o82'),
(61, 'Demetra Sommerlie', 'dsommerlie1a', 'IYrqX2k'),
(62, 'Georgeanna Burkitt', 'gburkitt1b', 'rbtjGIX70p'),
(63, 'Packston Andric', 'pandric1c', 'KY69ItG'),
(64, 'Adella Gaytor', 'agaytor1d', 'GC1DzBAj6SPe'),
(65, 'admin', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(15, 'Food', 'category_76.jpeg', 'No', 'Yes'),
(16, 'Electronic', 'category_245.jpeg', 'Yes', 'Yes'),
(17, 'Book', 'category_605.jpg', 'Yes', 'Yes'),
(18, 'Cold Drink', 'category_66.jpeg', 'Yes', 'Yes'),
(19, 'Snack', 'category_941.jpeg', 'Yes', 'Yes'),
(20, 'Pharma', 'category_0.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(225) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `contact`, `email`, `address`) VALUES
(1, 'dfads', '123', '123122fa@d.c', 'a'),
(2, 'dfads', '123', '123122fa@d.c', 'a'),
(3, 'VIja', '+1231', '1231@da.c', 'asfa'),
(4, 'jia', '1231231', '1231@kl.d', 'afds'),
(5, 'asdfa', 'asfda', '2312@fda.c', '1231'),
(6, 'asdf', 'asdfa2', '1231@ldfc.c', 'asdf'),
(7, '1231', '123123', '12312@dfs.c', 'adf'),
(8, 'afsda', 'sfa', '13123121@d.cv', 'asfd'),
(9, 'adfsa', '1231', '1231@fadf.ghjfj', 'sfg\r\n'),
(10, 'asfda3e2', '1231', '123213@fa.d', 'ads'),
(11, 'Pearl Garza', '+1 (965) 297-5953', 'xupo@mailinator.com', 'Dolor incidunt inci'),
(12, 'Octavius Melendez', '+1 (706) 297-2962', 'gisun@mailinator.com', 'Rem fuga Est volup'),
(13, 'Kyle Levine', '+1 (592) 913-6326', 'siqon@mailinator.com', 'Quis ipsam optio au'),
(14, 'Kirsten Dixon', '+1 (656) 808-7533', 'zysuh@mailinator.com', 'Est obcaecati laboru'),
(15, 'TaShya Shelton', '+1 (309) 109-3512', 'kebej@mailinator.com', 'Animi repudiandae d'),
(16, 'Hoyt Blankenship', '+1 (553) 519-8675', 'qose@mailinator.com', 'Facere aut ea culpa '),
(17, 'Aphrodite Bird', '+1 (443) 158-5068', 'huki@mailinator.com', 'Maxime dolorem recus'),
(18, 'Pamela Mcfarland', '+1 (816) 933-2396', 'docu@mailinator.com', 'Id dicta necessitati'),
(19, 'Hashim Vaughn', '+1 (404) 677-1212', 'hepyr@mailinator.com', 'Dolor consequuntur s'),
(20, 'Hashim Vaughn', '+1 (404) 677-1212', 'hepyr@mailinator.com', 'Dolor consequuntur s'),
(21, 'Hashim Vaughn', '+1 (404) 677-1212', 'hepyr@mailinator.com', 'Dolor consequuntur s'),
(22, 'Hashim Vaughn', '+1 (404) 677-1212', 'hepyr@mailinator.com', 'Dolor consequuntur s'),
(23, 'Meghan Cline', '+1 (648) 835-9854', 'qaqu@mailinator.com', 'Est asperiores fugi'),
(24, 'Meghan Cline', '+1 (648) 835-9854', 'qaqu@mailinator.com', 'Est asperiores fugi'),
(25, 'Ebony Manning', '+1 (797) 224-9498', 'wyvu@mailinator.com', 'Natus impedit corru'),
(26, 'Nevada Bolton', '+1 (234) 898-2663', 'bucer@mailinator.com', 'Et dolor ad minim et'),
(27, 'Ray Campbell', '+1 (751) 482-8255', 'mywa@mailinator.com', 'Alias et blanditiis '),
(28, 'Latifah Holman', '+1 (581) 626-8041', 'qawud@mailinator.com', 'Ut in reiciendis in '),
(29, 'Chantale Herrera', '+1 (629) 989-2363', 'jiban@mailinator.com', 'Non qui ea in vero a'),
(30, 'Luke Barry', '+1 (796) 102-7135', 'zezaj@mailinator.com', 'Et dolor est obcaeca'),
(31, 'Marshall Pickett', '+1 (826) 875-5703', 'wuzahomoqa@mailinator.com', 'In et enim soluta qu'),
(32, 'Stephen Forbes', '+1 (564) 143-2611', 'maqep@mailinator.com', 'Voluptatibus consequ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `order_qty` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `order_qty`, `total`, `order_date`, `status`, `customer_id`) VALUES
(1, 8, 1, '1231.00', '2022-04-24 07:07:23', 'Delivered', 24),
(2, 8, 1, '1231.00', '2022-04-24 07:09:17', 'Cancelled', 10),
(3, 8, 17, '20927.00', '2022-04-24 07:11:02', 'Delivered', 11),
(4, 8, 623, '766913.00', '2022-04-24 07:11:49', 'Ordered', 12),
(5, 8, 996, '1226076.00', '2022-04-24 07:13:17', 'Ordered', 13),
(6, 8, 997, '1227307.00', '2022-04-24 07:13:35', 'Ordered', 14),
(7, 8, 592, '728752.00', '2022-04-24 07:15:30', 'Ordered', 15),
(8, 8, 582, '716442.00', '2022-04-24 07:15:56', 'Ordered', 16),
(9, 11, 796, '979876.00', '2022-04-24 07:17:27', 'Ordered', 17),
(10, 11, 725, '892475.00', '2022-04-24 07:17:46', 'Ordered', 18),
(11, 11, 444, '546564.00', '2022-04-24 07:19:25', 'Ordered', 19),
(12, 11, 444, '546564.00', '2022-04-24 07:19:31', 'Ordered', 20),
(13, 11, 444, '546564.00', '2022-04-24 07:19:34', 'Ordered', 21),
(14, 11, 444, '546564.00', '2022-04-24 07:19:37', 'Ordered', 22),
(15, 11, 404, '497324.00', '2022-04-24 07:19:46', 'Ordered', 23),
(16, 11, 404, '497324.00', '2022-04-24 07:20:16', 'Ordered', 24),
(17, 8, 829, '1020499.00', '2022-04-24 07:20:44', 'Ordered', 26),
(18, 8, 696, '856776.00', '2022-04-24 07:21:09', 'Ordered', 27),
(19, 8, 632, '777992.00', '2022-04-24 07:21:47', 'Ordered', 29),
(20, 8, 681, '838311.00', '2022-04-24 07:22:54', 'Ordered', 30),
(21, 9, 912, '1122672.00', '2022-04-24 07:25:01', 'Ordered', 31),
(22, 9, 559, '688129.00', '2022-04-24 07:27:27', 'Ordered', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(225) DEFAULT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(8, 'Lamp', 'this is lamp                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     ', '1231.00', 'product_3118.jpeg', 16, 'Yes', 'Yes'),
(9, 'Ramen', 'ramen', '1231.00', 'product_2872.jpeg', 15, 'Yes', 'Yes'),
(10, 'Bubble Tea', 'bubble Tea', '12312.00', 'product_8408.jpg', 15, 'Yes', 'Yes'),
(11, 'Spray', 'spary                            ', '1231.00', 'product_3468.jpeg', 15, 'Yes', 'Yes'),
(12, 'Iphone pro max', 'pro ', '12313123.00', 'product_3960.jpeg', 16, 'Yes', 'Yes'),
(13, 'Potato Chip', 'chip', '123123.00', 'product_1582.jpg', 19, 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
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
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
