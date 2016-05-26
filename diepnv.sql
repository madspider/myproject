-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 01:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diepnv`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_24_045309_create_mst_category_table', 0),
('2016_05_24_045309_create_mst_common_table', 0),
('2016_05_24_045309_create_mst_common_item_table', 0),
('2016_05_24_045309_create_mst_image_table', 0),
('2016_05_24_045309_create_mst_product_table', 0),
('2016_05_24_045309_create_mst_user_table', 0),
('2016_05_24_045309_create_trn_category_product_table', 0),
('2016_05_24_045309_create_trn_product_image_table', 0),
('2016_05_24_045521_create_mst_category_table', 0),
('2016_05_24_045521_create_mst_common_table', 0),
('2016_05_24_045521_create_mst_common_item_table', 0),
('2016_05_24_045521_create_mst_image_table', 0),
('2016_05_24_045521_create_mst_product_table', 0),
('2016_05_24_045521_create_mst_user_table', 0),
('2016_05_24_045521_create_trn_category_product_table', 0),
('2016_05_24_045521_create_trn_product_image_table', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mst_category`
--

CREATE TABLE `mst_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(128) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_category`
--

INSERT INTO `mst_category` (`category_id`, `category_name`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`, `description`) VALUES
(1, 'hàng tiêu dùng', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_common`
--

CREATE TABLE `mst_common` (
  `name` varchar(256) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_common`
--

INSERT INTO `mst_common` (`name`, `id`) VALUES
('abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_common_item`
--

CREATE TABLE `mst_common_item` (
  `item_group_cd` int(11) NOT NULL,
  `item_key` int(11) NOT NULL,
  `item_value` varchar(128) DEFAULT NULL,
  `option_value1` varchar(128) DEFAULT NULL,
  `option_value2` varchar(128) DEFAULT NULL,
  `option_value3` varchar(128) DEFAULT NULL,
  `item_order` int(11) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_image`
--

CREATE TABLE `mst_image` (
  `image_id` int(11) NOT NULL,
  `image_name` varchar(256) NOT NULL,
  `directory` varchar(128) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_image`
--

INSERT INTO `mst_image` (`image_id`, `image_name`, `directory`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`) VALUES
(1, '20160517174355447.jpg', '1\\1', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(2, '20160517174359935.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(3, '20160517174402318.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(4, '20160517174402324.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(5, '20160517174818352.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(6, '20160517174818357.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(7, '20160517174818360.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(8, '20160517174818363.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(9, '20160517174818366.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(10, '20160517174933133.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(11, '20160517175330819.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(12, '20160517175737660.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(13, '20160517175755038.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(14, '20160517180451690.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(15, '20160517180451694.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(16, '20160517180451698.jpg', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(17, '20160517180451700.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(18, '20160517180451702.png', '11', 999, '2016-05-17', 999, '2016-05-17', NULL, NULL),
(19, '20160518092856101.jpg', '11', 999, '2016-05-18', 999, '2016-05-18', NULL, NULL),
(20, '20160518092856118.jpg', '11', 999, '2016-05-18', 999, '2016-05-18', NULL, NULL),
(21, '20160518092953731.png', '11', 999, '2016-05-18', 999, '2016-05-18', NULL, NULL),
(22, '20160519111537129.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(23, '20160519112830522.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(24, '20160519112843547.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(25, '20160519112950968.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(26, '20160519112951056.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(27, '20160519113001399.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(28, '20160519113001443.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(29, '20160519113002348.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(30, '20160519113019078.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(31, '20160519114206096.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(32, '20160519114241969.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(33, '20160519114703956.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(34, '20160519114915424.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(35, '20160519115000191.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(36, '20160519115000194.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(37, '20160519115023097.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(38, '20160519115410348.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(39, '20160519115528515.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(40, '20160519115610148.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(41, '20160519115810778.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(42, '20160519115829361.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(43, '20160519115841357.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(44, '20160519115859998.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(45, '20160519115914958.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(46, '20160519120206090.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(47, '20160519120329943.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(48, '20160519120341086.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(49, '20160519120439024.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(50, '20160519120439083.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(51, '20160519120442477.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(52, '20160519120444321.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(53, '20160519120447439.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(54, '20160519120612248.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(55, '20160519120615046.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(56, '20160519120617316.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(57, '20160519124138673.PNG', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(58, '20160519171446317.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(59, '20160519171638542.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(60, '20160519171836959.', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(61, '20160519173835324.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(62, '20160519173907962.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(63, '20160519175324972.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(64, '20160519175447583.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(65, '20160519175506638.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(66, '20160519180637148.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(67, '20160519181417700.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(68, '20160519181538909.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(69, '20160519181551254.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(70, '20160519181640287.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(71, '20160519181727002.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(72, '20160519184150054.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(73, '20160519184230818.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(74, '20160519184348142.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(75, '20160519185609541.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(76, '20160519185658294.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(77, '20160519190911692.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(78, '20160519192018316.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(79, '20160519192145061.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(80, '20160519192249461.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(81, '20160519192249465.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(82, '20160519192305671.jpg', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(83, '20160519192305675.png', '11', 999, '2016-05-19', 999, '2016-05-19', NULL, NULL),
(84, '20160520092717016.png', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(85, '20160520092759922.png', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(86, '20160520092855563.png', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(87, '20160520104256413.png', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(88, '20160520105456518.jpg', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(89, '20160520105458072.jpg', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(90, '20160520105458522.jpg', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(91, '20160520105458736.jpg', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL),
(92, '20160520105514791.jpg', '11', 999, '2016-05-20', 999, '2016-05-20', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_product`
--

CREATE TABLE `mst_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `current_price` float DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_product`
--

INSERT INTO `mst_product` (`product_id`, `product_name`, `description`, `current_price`, `old_price`, `amount`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`) VALUES
(1, 'T? áo 1m6 - 3 cánh pano ', 'S?n ph?m t? qu?n áo v?i 3 ng?n riêng bi?t thu?t ti?n cho vi?c s? d?ng, d? n?p ??t ...', 12000, 30000, 5, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `user_id` int(11) NOT NULL,
  `login_id` varchar(128) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `login_date` date DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`user_id`, `login_id`, `password`, `login_date`, `last_name`, `first_name`, `email`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`) VALUES
(1, 'admin', '123456', '2016-05-17', 'diep12123', 'diep12123', 'ngodiep.csuit@gmail.com', 999, '2016-04-28', 999, '2016-05-17', NULL, NULL),
(2, '323', '123456', '2016-05-04', '12312312vvv', '12312312vvv', 'vand@gm.uit.edu.vn', 999, '2016-04-28', 999, '2016-05-04', NULL, NULL),
(3, 'diep111', '123456', '2016-05-16', 'ad', 'vv', 'vv@gmail.com', 999, '2016-05-16', 999, '2016-05-16', NULL, NULL),
(4, '12', '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'fff', '123456', '2016-05-17', 'ff', 'ff', 'uitm1adspider@gmail.com', 999, '2016-05-16', 999, '2016-05-17', NULL, NULL),
(6, '12', '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '12', '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '12', '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '12', '1111', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '323', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trn_category_product`
--

CREATE TABLE `trn_category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trn_category_product`
--

INSERT INTO `trn_category_product` (`category_id`, `product_id`, `description`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trn_product_image`
--

CREATE TABLE `trn_product_image` (
  `product_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `created_user_id` int(11) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `updated_user_id` int(11) DEFAULT NULL,
  `updated_date` date DEFAULT NULL,
  `removed_user_id` int(11) DEFAULT NULL,
  `removed_date` date DEFAULT NULL,
  `main_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trn_product_image`
--

INSERT INTO `trn_product_image` (`product_id`, `image_id`, `created_user_id`, `created_date`, `updated_user_id`, `updated_date`, `removed_user_id`, `removed_date`, `main_flag`) VALUES
(1, 1, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 2, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 3, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 4, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 5, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 6, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 7, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 8, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 9, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 10, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 11, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 12, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 13, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 14, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 15, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 16, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 17, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 18, 999, '2016-05-17', 999, '2016-05-17', NULL, NULL, NULL),
(1, 19, 999, '2016-05-18', 999, '2016-05-18', NULL, NULL, NULL),
(1, 20, 999, '2016-05-18', 999, '2016-05-18', NULL, NULL, NULL),
(1, 21, 999, '2016-05-18', 999, '2016-05-18', NULL, NULL, NULL),
(1, 22, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 23, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 24, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 25, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 26, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 27, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 28, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 29, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 30, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 31, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 32, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 33, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 34, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 35, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 36, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 37, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 38, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 39, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 40, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 41, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 42, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 43, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 44, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 45, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 46, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 47, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 48, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 49, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 50, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 51, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 52, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 53, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 54, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 55, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 56, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 57, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 58, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 59, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 60, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 61, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 62, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 63, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 64, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 65, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 66, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 67, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 68, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 69, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 70, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 71, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 72, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 73, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 74, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 75, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 76, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 77, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 78, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 79, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 80, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 81, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 82, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 83, 999, '2016-05-19', 999, '2016-05-19', NULL, NULL, NULL),
(1, 84, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 85, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 86, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 87, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 88, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 89, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 90, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 91, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL),
(1, 92, 999, '2016-05-20', 999, '2016-05-20', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_category`
--
ALTER TABLE `mst_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `mst_common`
--
ALTER TABLE `mst_common`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mst_common_item`
--
ALTER TABLE `mst_common_item`
  ADD PRIMARY KEY (`item_group_cd`,`item_key`);

--
-- Indexes for table `mst_image`
--
ALTER TABLE `mst_image`
  ADD PRIMARY KEY (`image_name`);

--
-- Indexes for table `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `trn_category_product`
--
ALTER TABLE `trn_category_product`
  ADD PRIMARY KEY (`category_id`,`product_id`);

--
-- Indexes for table `trn_product_image`
--
ALTER TABLE `trn_product_image`
  ADD PRIMARY KEY (`product_id`,`image_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
