-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2021 at 12:46 AM
-- Server version: 5.7.33-log-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer_portal_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_crop_image_table`
--

CREATE TABLE `add_crop_image_table` (
  `ID` int(50) NOT NULL,
  `Crop_id` varchar(120) NOT NULL,
  `E_mail_id` varchar(120) NOT NULL,
  `crop_name` varchar(150) NOT NULL,
  `crop_status` varchar(150) NOT NULL,
  `crop_category` varchar(120) NOT NULL,
  `crop_quantity` int(120) NOT NULL,
  `crop_price` int(120) NOT NULL,
  `crop_image` varchar(200) NOT NULL,
  `crop_description` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_crop_image_table`
--

INSERT INTO `add_crop_image_table` (`ID`, `Crop_id`, `E_mail_id`, `crop_name`, `crop_status`, `crop_category`, `crop_quantity`, `crop_price`, `crop_image`, `crop_description`) VALUES
(82, '27195', 'dineshnb66@gmail.com', 'Carrot', 'APPROVED', 'Vegetable', 2, 40, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Carrot_17438945.jpg', 'Carrot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(83, '83818', 'dineshnb66@gmail.com', 'Beetroot', 'APPROVED', 'Vegetable', 17, 45, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Beetroot_12095177.png', 'Beetroot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(84, '10696', 'dineshnb66@gmail.com', 'BitterGourd', 'APPROVED', 'Vegetable', 28, 65, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_BitterGourd_31292342.png', 'Bitter Gourd is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(85, '18456', 'dineshnb66@gmail.com', 'Cabbage', 'APPROVED', 'Vegetable', 80, 45, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Cabbage_19637762.jpg', 'Cabbage is the good Product and healthy vegetable and it is enriched with Vitamin B and C and it can be stored for 3 weeks.'),
(86, '23702', 'dineshnb66@gmail.com', 'Apple', 'APPROVED', 'Fruits', 23, 70, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Apple_81720908.jpg', 'Apple is the good and healthy Fruit and it is Enriched with Vitamin A and E and it can be stored for 4 weeks.'),
(87, '26543', 'dineshnb66@gmail.com', 'Grape', 'APPROVED', 'Fruits', 26, 80, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Grape_22169122.jpg', 'Grape is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.'),
(88, '72891', 'dineshnb66@gmail.com', 'Pineapple', 'APPROVED', 'Fruits', 30, 80, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Pineapple_34208366.jpg', 'Pineapple is the Sweetest Fruit and it is enriched with Vitamin A and E and it can be stored for 5 weeks. and it is good for health'),
(89, '81096', 'dineshnb66@gmail.com', 'Carrot', 'NOTAPPROVED', 'Vegetable', 50, 30, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Carrot_33646246.png', 'Carrot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(91, '29003', 'dineshnb66@gmail.com', 'Buckwheat', 'APPROVED', 'FoodGrains', 36, 120, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Buckwheat_15816287.jpeg', 'High in protein (13-15%), second highest only to oats, and rich in the amino acid lysine. Contains vitamins B1, C and E.'),
(95, '17065', 'dineshnb66@gmail.com', 'Cucumber', 'APPROVED', 'Vegetable', 7, 60, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Cucumber_34362082.png', 'Cucumber is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(96, '23502', 'dineshnb66@gmail.com', 'Saamai', 'APPROVED', 'Millets', 22, 130, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Saamai_11359918.jpg', 'Saamai is the good Product and healthy Millets and it is enriched with Vitamin A and beta-carotene and it can be stored for 6 Month'),
(97, '23215', 'dineshnb66@gmail.com', 'Varagu', 'APPROVED', 'Millets', 35, 120, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Varagu_34024242.jpg', 'Varagu is the good Product and healthy Millets and it is enriched with Vitamin A and beta-carotene and it can be stored for 7months.'),
(98, '73430', 'basavarajappa223@gmail.com', 'Brinjal', 'APPROVED', 'Vegetable', 60, 35, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 'Brinjal is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(99, '24427', 'basavarajappa223@gmail.com', 'Cabbage', 'APPROVED', 'Vegetable', 60, 45, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Cabbage_64276625.jpg', 'Cabbage is the good Product and healthy vegetable and it is enriched with Vitamin B and C and it can be stored for 3 weeks.'),
(100, '23033', 'basavarajappa223@gmail.com', 'Carrot', 'APPROVED', 'Vegetable', 80, 50, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Carrot_30740289.png', 'Carrot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(101, '19094', 'basavarajappa223@gmail.com', 'Beetroot', 'APPROVED', 'Vegetable', 28, 55, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Beetroot_12649538.png', 'Beetroot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(102, '17850', 'basavarajappa223@gmail.com', 'Apple', 'APPROVED', 'Fruits', 25, 70, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Apple_18908508.jpg', 'Apple is the good and healthy Fruit and it is Enriched with Vitamin A and E and it can be stored for 4 weeks.'),
(103, '11301', 'basavarajappa223@gmail.com', 'Cherry', 'APPROVED', 'Fruits', 45, 60, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Cherry_20129275.jpg', 'Charry is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.'),
(104, '55624', 'basavarajappa223@gmail.com', 'Varagu', 'APPROVED', 'Millets', 40, 125, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Varagu_49492265.jpg', 'Varagu is the good Product and healthy Millets and it is enriched with Vitamin A and beta-carotene and it can be stored for 7 months.'),
(105, '23523', 'basavarajappa223@gmail.com', 'Paddy', 'APPROVED', 'FoodGrains', 50, 60, '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Paddy_31411335.jpeg', 'High in protein (17-30%), Third highest only to oats, and rich in the amino acid lysine. Contains vitamins B1, C and E.'),
(106, '13356', 'akshayhegde56@gmail.com', 'Beetroot', 'APPROVED', 'Vegetable', 40, 50, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Beetroot_11112824.png', 'Beetroot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(107, '26287', 'akshayhegde56@gmail.com', 'Brinjal', 'APPROVED', 'Vegetable', 0, 35, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Brinjal_58275303.png', 'Brinjal is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(108, '25764', 'akshayhegde56@gmail.com', 'Carrot', 'APPROVED', 'Vegetable', 60, 45, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Carrot_32250558.png', 'Carrot is the good Product and healthy vegetable and it is enriched with Vitamin A and beta-carotene and it can be stored for 2 weeks.'),
(109, '33958', 'akshayhegde56@gmail.com', 'Cabbage', 'APPROVED', 'Vegetable', 40, 50, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Cabbage_49258522.jpg', 'Cabbage is the good Product and healthy vegetable and it is enriched with Vitamin B and C and it can be stored for 3 weeks.'),
(110, '83127', 'akshayhegde56@gmail.com', 'Cherry', 'APPROVED', 'Fruits', 24, 50, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Cherry_30805531.jpg', 'Charry is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.'),
(111, '15473', 'akshayhegde56@gmail.com', 'Orange', 'APPROVED', 'Fruits', 26, 70, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Orange_33547798.jpg', 'Orange is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.'),
(112, '14578', 'akshayhegde56@gmail.com', 'Varagu', 'REJECTED', 'Millets', 40, 189, '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Varagu_23002327.jpg', 'Grape is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.'),
(113, '95914', 'dineshnb66@gmail.com', 'Brinjal', 'REJECTED', 'Vegetable', 50, 30, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Brinjal_48650422.png', 'Good product with good Quality '),
(114, '25055', 'dineshnb66@gmail.com', 'Grape', 'REJECTED', 'Fruits', 30, 20, '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Grape_24168009.jpg', 'Grape is the good and healthy Fruit and it is enriched with Vitamin B and E and it can be stored for 3 weeks.');

-- --------------------------------------------------------

--
-- Table structure for table `crop_category`
--

CREATE TABLE `crop_category` (
  `ID` varchar(120) NOT NULL,
  `category_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop_category`
--

INSERT INTO `crop_category` (`ID`, `category_name`) VALUES
('FoodGrains', 'Food Grains'),
('Fruits', 'Fruits'),
('Millets', 'Millets'),
('Vegetable', 'Vegetable');

-- --------------------------------------------------------

--
-- Table structure for table `crop_category_items`
--

CREATE TABLE `crop_category_items` (
  `ID` varchar(150) NOT NULL,
  `name` varchar(100) NOT NULL,
  `Crop_Category` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop_category_items`
--

INSERT INTO `crop_category_items` (`ID`, `name`, `Crop_Category`) VALUES
('Apple', 'Apple', 'Fruits'),
('Beetroot', 'Beetroot', 'Vegetable'),
('BitterGourd', 'BitterGourd', 'Vegetable'),
('Brinjal', 'Brinjal', 'Vegetable'),
('Buckwheat', 'Buckwheat', 'FoodGrains'),
('Cabbage', 'Cabbage', 'Vegetable'),
('Carrot', 'Carrot', 'Vegetable'),
('Cherry', 'Cherry', 'Fruits'),
('Cucumber', 'Cucumber', 'Vegetable'),
('Grape', 'Grape', 'Fruits'),
('Orange', 'Orange', 'Fruits'),
('Paddy', 'Paddy', 'FoodGrains'),
('Pineapple', 'Pineapple', 'Fruits'),
('Rice', 'Rice', 'FoodGrains'),
('Saamai', 'Saamai', 'Millets'),
('Varagu', 'Varagu', 'Millets');

-- --------------------------------------------------------

--
-- Table structure for table `crop_comments`
--

CREATE TABLE `crop_comments` (
  `ID` int(120) NOT NULL,
  `Crop_id` int(120) NOT NULL,
  `order_id` bigint(120) NOT NULL,
  `purchaser_name` varchar(120) NOT NULL,
  `crop_rating` varchar(120) NOT NULL,
  `comments` varchar(120) NOT NULL,
  `date_of_comments` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crop_comments`
--

INSERT INTO `crop_comments` (`ID`, `Crop_id`, `order_id`, `purchaser_name`, `crop_rating`, `comments`, `date_of_comments`) VALUES
(17, 73430, 226643715376, 'Dinesh N B', '5', 'Good product with faster delivery', '2021-06-25 06:22:02'),
(18, 27195, 230202251134, 'Akshay Hegde', '5', 'Good Product And Healthy Vegetable', '2021-06-25 20:03:47'),
(19, 83818, 108604035203, 'Akshay Hegde', '5', 'Good Product with faster Delivery', '2021-06-25 20:05:27'),
(20, 17065, 213986633506, 'Akshay Hegde', '4', 'Good and Healthy Product\r\n', '2021-06-25 20:11:18'),
(21, 26543, 209424954018, 'Akshay Hegde', '5', 'Good And Healthy Fruit', '2021-06-25 20:12:08'),
(22, 23702, 346194307034, 'Akshay Hegde', '4', 'Good And Healthy Fruit\r\n ', '2021-06-25 20:12:40'),
(23, 83818, 204179370481, 'Rajappa N M', '4', 'Good Product and healthy vegetable\r\n', '2021-06-25 20:17:13'),
(24, 27195, 955495637408, 'Rajappa N M', '5', 'Good Product', '2021-06-25 20:17:25'),
(25, 17065, 330522476948, 'Rajappa N M', '4', 'Good Product And Healthy vegetable\r\n ', '2021-06-25 20:17:59'),
(26, 72891, 187912202336, 'Rajappa N M', '5', 'Good Product', '2021-06-25 20:18:16'),
(27, 26543, 327499517696, 'Rajappa N M', '4', 'Good Product', '2021-06-25 20:18:33'),
(28, 83818, 247674981413, 'Avinash Patil', '5', 'Good Product', '2021-06-25 20:25:06'),
(29, 27195, 713671448323, 'Avinash Patil', '5', 'Healthy And Good Carrot', '2021-06-25 20:26:19'),
(30, 23502, 431832720387, 'Avinash Patil', '4', 'Good Product', '2021-06-25 20:26:39'),
(31, 72891, 292600538622, 'Avinash Patil', '2', 'Bad Quality Don\'t Buy It', '2021-06-25 20:27:08'),
(32, 29003, 328100174208, 'Avinash Patil', '4', 'Good Product\r\n', '2021-06-25 20:27:25'),
(33, 10696, 331238659607, 'Avinash Patil', '5', 'Good and Healthy Product', '2021-06-25 20:27:44'),
(34, 26287, 319034906665, 'Dinesh N B', '5', 'Good Product', '2021-06-25 20:30:50'),
(35, 15473, 127221546318, 'Dinesh N B', '2', 'Bad Qaulity', '2021-06-25 20:32:24'),
(36, 17850, 129900530141, 'Dinesh N B', '5', 'Good Product', '2021-06-25 20:32:36'),
(41, 73430, 237307858938, 'Dinesh N B', '3', 'Good product and slower delivery', '2021-06-29 03:56:07'),
(42, 73430, 220780964113, 'Dinesh N B', '5', 'Good product and slower delivery', '2021-06-29 03:56:27'),
(43, 83818, 267808879630, 'Avinash Patil', '5', 'Good product', '2021-07-02 10:11:42'),
(44, 83127, 324656916206, 'Avinash Patil', '4', 'Super Product', '2021-07-02 10:13:06'),
(45, 23702, 588698834882, 'Avinash Patil', '5', 'good', '2021-07-08 18:08:09'),
(46, 73430, 273976060331, 'Dinesh N B', '5', 'Good Product\r\n', '2021-07-09 22:53:43'),
(47, 15473, 297369970752, 'Dinesh N B', '2', 'bad product', '2021-07-09 22:54:14'),
(48, 13356, 993203563958, 'Dinesh N B', '4', 'Good Product', '2021-07-09 22:54:38'),
(49, 13356, 191336852127, 'Dinesh N B', '3', 'Good product\r\n', '2021-07-09 22:55:03'),
(50, 19094, 199125500247, 'Dinesh N B', '2', 'Bad Product', '2021-07-09 22:55:23'),
(51, 73430, 305037514728, 'Dinesh N B', '1', 'Bad Product', '2021-07-09 22:55:54'),
(52, 73430, 130053528196, 'Dinesh N B', '1', 'Bad Product', '2021-07-09 22:56:31'),
(53, 73430, 104774025435, 'Dinesh N B', '3', 'Bad product', '2021-07-09 22:56:59'),
(54, 26287, 570077633832, 'Dinesh N B', '5', 'Good Product', '2021-07-09 22:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_user_address_table`
--

CREATE TABLE `farmer_user_address_table` (
  `ID` int(50) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `E_mail_id` varchar(150) NOT NULL,
  `default_address` varchar(120) NOT NULL,
  `User_Type` varchar(120) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `pin_code` int(120) NOT NULL,
  `country` varchar(120) NOT NULL,
  `user_state` varchar(120) NOT NULL,
  `user_city` varchar(120) NOT NULL,
  `village` varchar(120) NOT NULL,
  `house_number` varchar(120) NOT NULL,
  `landmark` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_user_address_table`
--

INSERT INTO `farmer_user_address_table` (`ID`, `first_name`, `last_name`, `full_name`, `E_mail_id`, `default_address`, `User_Type`, `phone_number`, `pin_code`, `country`, `user_state`, `user_city`, `village`, `house_number`, `landmark`) VALUES
(32, '', '', 'AVINASH PATIL', 'patilavinash0021@gmail.com', 'DEFAULT', 'PURCHASER', 8310334570, 585202, 'India', 'Karnataka', 'Yadgiri', 'Gulsharam', 'H. no. 124 near post office gulsaram', 'Gulsaram'),
(33, '', '', 'Amit', 'amittorne9900@gmail.com', 'DEFAULT', 'PURCHASER', 8746064478, 585402, 'India', 'Karnataka', 'Bidar', 'Aliember', 'Hmm No - 118 ', 'near janwada road'),
(34, 'Dinesh', 'N B', '', 'dineshnb66@gmail.com', '', 'FARMER', 8660706741, 577228, 'India', 'Karnataka', 'Tarikere', 'Neralakere', 'House No 15th, 2nd Main Road', 'Near Om Shakthi Temple'),
(36, 'Rajappa', 'N M', '', 'basavarajappa223@gmail.com', 'DEFAULT', 'FARMER', 9482753641, 577228, 'India', 'Karnataka', 'Tarikere', 'Neralakere', 'House No 14th, 2nd Main Road', 'Near Grama panchayat Nearlekere'),
(37, 'Akshay', 'Hegde', '', 'akshayhegde56@gmail.com', 'DEFAULT', 'FARMER', 9448201679, 581450, 'India', 'Karnataka', 'Siddapur', 'Hegnoor', 'House No 12th, 4th Main Road', 'Near Gandhi Circle'),
(38, '', '', 'Manasa H R', 'Manasa662@gmail.com', 'DEFAULT', 'PURCHASER', 8660706752, 577228, 'India', 'Karnataka', 'Tarikere', 'Doranalu', 'House no 12, 14the cross', 'near nackdhaya school'),
(46, 'sdf', 'sdf', '', 'sdf@gmail.com', 'DEFAULT', 'FARMER', 9482753645, 577228, 'India', 'Karnataka', 'Tarikere', 'Belanahalli', 'eurt', 'ert'),
(47, 'Dinesh', 'N B', '', 'dineshnb66@gmail.com', 'DEFAULT', 'FARMER', 9482753641, 577228, 'India', 'Karnataka', 'Tarikere', 'Amruthapura', 'House no 12th, 2nd main road', 'Near on shakthi temple');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_user_favourite`
--

CREATE TABLE `farmer_user_favourite` (
  `ID` int(120) NOT NULL,
  `Crop_id` int(120) NOT NULL,
  `E_mail_id` varchar(120) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_user_favourite`
--

INSERT INTO `farmer_user_favourite` (`ID`, `Crop_id`, `E_mail_id`, `first_name`, `last_name`) VALUES
(83, 33958, 'basavarajappa223@gmail.com', 'Akshay', 'Hegde'),
(84, 83818, 'basavarajappa223@gmail.com', 'Dinesh', 'N B'),
(85, 23215, 'basavarajappa223@gmail.com', 'Dinesh', 'N B'),
(86, 29003, 'basavarajappa223@gmail.com', 'Dinesh', 'N B'),
(87, 10696, 'patilavinash0021@gmail.com', 'Dinesh', 'N B'),
(88, 23502, 'patilavinash0021@gmail.com', 'Dinesh', 'N B'),
(91, 83127, 'patilavinash0021@gmail.com', 'Akshay', 'Hegde'),
(101, 10696, 'Manasa662@gmail.com', 'Dinesh', 'N B'),
(103, 27195, 'sdf@gmail.com', 'Dinesh', 'N B'),
(104, 27195, 'sdf@gmail.com', 'Dinesh', 'N B'),
(105, 83127, 'sdf@gmail.com', 'Akshay', 'Hegde'),
(111, 23033, 'patilavinash0021@gmail.com', 'Rajappa', 'N M'),
(112, 23523, 'dineshnb66@gmail.com', 'Rajappa', 'N M'),
(113, 33958, 'dineshnb66@gmail.com', 'Akshay', 'Hegde');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_crop_item`
--

CREATE TABLE `purchased_crop_item` (
  `ID` int(120) NOT NULL,
  `order_id` bigint(120) NOT NULL,
  `User_Type` varchar(120) NOT NULL,
  `Crop_id` int(120) NOT NULL,
  `crop_name` varchar(120) NOT NULL,
  `crop_category` varchar(120) NOT NULL,
  `crop_image` varchar(120) NOT NULL,
  `crop_price` int(120) NOT NULL,
  `total_quantity` int(120) NOT NULL,
  `selected_quantity` int(120) NOT NULL,
  `total_price` int(120) NOT NULL,
  `purchaser_name` varchar(120) NOT NULL,
  `purchaser_phone_number` bigint(120) NOT NULL,
  `farmer_E_mail_id` varchar(120) NOT NULL,
  `purchaser_E_mail_id` varchar(120) NOT NULL,
  `date_of_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased_crop_item`
--

INSERT INTO `purchased_crop_item` (`ID`, `order_id`, `User_Type`, `Crop_id`, `crop_name`, `crop_category`, `crop_image`, `crop_price`, `total_quantity`, `selected_quantity`, `total_price`, `purchaser_name`, `purchaser_phone_number`, `farmer_E_mail_id`, `purchaser_E_mail_id`, `date_of_order`) VALUES
(38, 108604035203, 'FARMER', 83818, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Beetroot_12095177.png', 45, 60, 1, 45, 'Akshay Hegde', 9448201679, 'dineshnb66@gmail.com', 'akshayhegde56@gmail.com', '2021-06-25'),
(40, 226643715376, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 40, 12, 420, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(41, 319034906665, 'FARMER', 26287, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Brinjal_58275303.png', 35, 40, 15, 525, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(42, 230202251134, 'FARMER', 27195, 'Carrot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Carrot_17438945.jpg', 40, 70, 20, 800, 'Akshay Hegde', 9448201679, 'dineshnb66@gmail.com', 'akshayhegde56@gmail.com', '2021-06-25'),
(43, 213986633506, 'FARMER', 17065, 'Cucumber', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Cucumber_34362082.png', 60, 40, 13, 780, 'Akshay Hegde', 9448201679, 'dineshnb66@gmail.com', 'akshayhegde56@gmail.com', '2021-06-25'),
(44, 346194307034, 'FARMER', 23702, 'Apple', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Apple_81720908.jpg', 70, 60, 15, 1050, 'Akshay Hegde', 9448201679, 'dineshnb66@gmail.com', 'akshayhegde56@gmail.com', '2021-06-25'),
(45, 209424954018, 'FARMER', 26543, 'Grape', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Grape_22169122.jpg', 80, 48, 10, 800, 'Akshay Hegde', 9448201679, 'dineshnb66@gmail.com', 'akshayhegde56@gmail.com', '2021-06-25'),
(46, 204179370481, 'FARMER', 83818, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Beetroot_12095177.png', 45, 58, 15, 675, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(47, 955495637408, 'FARMER', 27195, 'Carrot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Carrot_17438945.jpg', 40, 50, 12, 480, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(48, 330522476948, 'FARMER', 17065, 'Cucumber', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Cucumber_34362082.png', 60, 27, 20, 1200, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(49, 111310681330, 'FARMER', 23702, 'Apple', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Apple_81720908.jpg', 70, 45, 12, 840, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(50, 327499517696, 'FARMER', 26543, 'Grape', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Grape_22169122.jpg', 80, 38, 12, 960, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(51, 187912202336, 'FARMER', 72891, 'Pineapple', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Pineapple_34208366.jpg', 80, 50, 5, 400, 'Rajappa N M', 9482753641, 'dineshnb66@gmail.com', 'basavarajappa223@gmail.com', '2021-06-25'),
(52, 247674981413, 'PURCHASER', 83818, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Beetroot_12095177.png', 45, 43, 14, 630, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(53, 713671448323, 'PURCHASER', 27195, 'Carrot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Carrot_17438945.jpg', 40, 38, 15, 600, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(54, 539554954451, 'PURCHASER', 10696, 'BitterGourd', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_BitterGourd_31292342.png', 65, 57, 12, 780, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(55, 292600538622, 'PURCHASER', 72891, 'Pineapple', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Pineapple_34208366.jpg', 80, 45, 15, 1200, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(56, 588698834882, 'PURCHASER', 23702, 'Apple', 'Fruits', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Apple_81720908.jpg', 70, 33, 10, 700, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(57, 331238659607, 'PURCHASER', 10696, 'BitterGourd', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_BitterGourd_31292342.png', 65, 45, 12, 780, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(58, 328100174208, 'PURCHASER', 29003, 'Buckwheat', 'FoodGrains', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Buckwheat_15816287.jpeg', 120, 50, 14, 1680, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(59, 431832720387, 'PURCHASER', 23502, 'Saamai', 'Millets', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Saamai_11359918.jpg', 130, 30, 8, 1040, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-25'),
(60, 127221546318, 'FARMER', 15473, 'Orange', 'Fruits', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Orange_33547798.jpg', 70, 50, 12, 840, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(61, 129900530141, 'FARMER', 17850, 'Apple', 'Fruits', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Apple_18908508.jpg', 70, 40, 15, 1050, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(62, 237307858938, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 28, 9, 315, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(63, 220780964113, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 19, 12, 420, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-06-25'),
(64, 267808879630, 'PURCHASER', 83818, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_Beetroot_12095177.png', 45, 29, 12, 540, 'Avinash Patil', 8310334570, 'dineshnb66@gmail.com', 'patilavinash0021@gmail.com', '2021-06-26'),
(65, 324656916206, 'PURCHASER', 83127, 'Cherry', 'Fruits', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Cherry_30805531.jpg', 50, 36, 12, 600, 'Avinash Patil', 8310334570, 'akshayhegde56@gmail.com', 'patilavinash0021@gmail.com', '2021-06-26'),
(66, 273976060331, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 7, 5, 175, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-06-27'),
(67, 297369970752, 'FARMER', 15473, 'Orange', 'Fruits', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Orange_33547798.jpg', 70, 38, 12, 840, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-06-27'),
(68, 993203563958, 'FARMER', 13356, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Beetroot_11112824.png', 50, 60, 8, 400, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-06-30'),
(69, 191336852127, 'FARMER', 13356, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Beetroot_11112824.png', 50, 52, 12, 600, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-06-30'),
(70, 199125500247, 'FARMER', 19094, 'Beetroot', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Beetroot_12649538.png', 55, 40, 12, 660, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-07-01'),
(71, 305037514728, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 2, 2, 70, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-07-02'),
(72, 167725823187, 'PURCHASER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 80, 2, 70, 'Manasa H R', 8660706752, 'basavarajappa223@gmail.com', 'Manasa662@gmail.com', '2021-07-03'),
(73, 317427959826, 'PURCHASER', 10696, 'BitterGourd', 'Vegetable', '../UploadedFarmerDocuments/dineshnb66/UploadedCrop/CropImage_BitterGourd_31292342.png', 65, 33, 5, 325, 'Manasa H R', 8660706752, 'dineshnb66@gmail.com', 'Manasa662@gmail.com', '2021-07-03'),
(74, 130053528196, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 78, 1, 35, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-07-04'),
(75, 104774025435, 'FARMER', 73430, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/basavarajappa223/UploadedCrop/CropImage_Brinjal_25589822.png', 35, 77, 77, 2695, 'Dinesh N B', 8660706741, 'basavarajappa223@gmail.com', 'dineshnb66@gmail.com', '2021-07-04'),
(76, 570077633832, 'FARMER', 26287, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Brinjal_58275303.png', 35, 25, 12, 420, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-07-09'),
(77, 847686084693, 'FARMER', 26287, 'Brinjal', 'Vegetable', '../UploadedFarmerDocuments/akshayhegde56/UploadedCrop/CropImage_Brinjal_58275303.png', 35, 13, 13, 455, 'Dinesh N B', 8660706741, 'akshayhegde56@gmail.com', 'dineshnb66@gmail.com', '2021-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_farmer_information`
--

CREATE TABLE `sign_up_farmer_information` (
  `ID` int(50) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `E_mail_id` varchar(150) NOT NULL,
  `User_Type` varchar(120) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `P_N_status` varchar(150) NOT NULL,
  `profile_picture` varchar(150) NOT NULL,
  `land_document` varchar(150) NOT NULL,
  `aadhar_document` varchar(150) NOT NULL,
  `document_status` varchar(150) NOT NULL,
  `cre_password` varchar(150) NOT NULL,
  `date_time_of_sign_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up_farmer_information`
--

INSERT INTO `sign_up_farmer_information` (`ID`, `first_name`, `last_name`, `E_mail_id`, `User_Type`, `date_of_birth`, `phone_number`, `P_N_status`, `profile_picture`, `land_document`, `aadhar_document`, `document_status`, `cre_password`, `date_time_of_sign_up`) VALUES
(9, 'Dinesh', 'N B', 'dineshnb66@gmail.com', 'FARMER', '1999-06-07', 8660706741, 'SUCCESS', '../UploadedFarmerDocuments/dineshnb66/profile_dineshnb66_31399724.jpg', '../UploadedFarmerDocuments/dineshnb66/LandDocument_dineshnb66_31399724.pdf', '../UploadedFarmerDocuments/dineshnb66/AadharDocument_dineshnb66_31399724.pdf', 'ACTIVE', '$2y$10$3GHcMyu12wWnVczPnz6T6e6T5.UJ3O4hjIvudrkyatBHwytRAk7Ze', '2021-06-23 08:15:31'),
(10, 'Akshay', 'Hegde', 'akshayhegde56@gmail.com', 'FARMER', '1999-03-04', 9448201679, 'SUCCESS', '../UploadedFarmerDocuments/akshayhegde56/profile_akshayhegde56_56094226.jpg', '../UploadedFarmerDocuments/akshayhegde56/LandDocument_akshayhegde56_56094226.pdf', '../UploadedFarmerDocuments/akshayhegde56/AadharDocument_akshayhegde56_56094226.pdf', 'ACTIVE', '$2y$10$B01hp0vhC1q5xP1YbzKI.uFCR1hypeQeNHOFj5W2F8GU2jjN1pQga', '2021-06-25 00:47:56'),
(11, 'Rajappa', 'N M', 'basavarajappa223@gmail.com', 'FARMER', '1984-03-02', 9482753641, 'SUCCESS', '../UploadedFarmerDocuments/basavarajappa223/profile_basavarajappa223_34578198.jpg', '../UploadedFarmerDocuments/basavarajappa223/LandDocument_basavarajappa223_34578198.pdf', '../UploadedFarmerDocuments/basavarajappa223/AadharDocument_basavarajappa223_34578198.pdf', 'ACTIVE', '$2y$10$r6YtYuvTlaYDXxfHPQbJSOWyzFmYyjHQ2uy0b8Ku.3GJUY9SfyCqa', '2021-06-25 02:00:31'),
(12, 'sdf', 'sdf', 'sdf@gmail.com', 'FARMER', '2021-07-14', 9482753645, 'SUCCESS', '../UploadedFarmerDocuments/sdf/profile_sdf_21176395.jpg', '../UploadedFarmerDocuments/sdf/LandDocument_sdf_21176395.pdf', '../UploadedFarmerDocuments/sdf/AadharDocument_sdf_21176395.pdf', 'ACTIVE', '$2y$10$orrK1oQhdjGDgfRK2yrTW.b5g5kj6lmaFmoH461U6l.RuN93CQ/ae', '2021-07-04 22:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `sign_up_user_information`
--

CREATE TABLE `sign_up_user_information` (
  `ID` int(50) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `E_mail_id` varchar(150) NOT NULL,
  `User_Type` varchar(120) NOT NULL,
  `date_of_birth` date NOT NULL,
  `user_gender` varchar(120) NOT NULL,
  `phone_number` bigint(15) NOT NULL,
  `cre_password` varchar(150) NOT NULL,
  `date_time_of_sign_up` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sign_up_user_information`
--

INSERT INTO `sign_up_user_information` (`ID`, `full_name`, `E_mail_id`, `User_Type`, `date_of_birth`, `user_gender`, `phone_number`, `cre_password`, `date_time_of_sign_up`) VALUES
(10, 'Avinash Patil', 'patilavinash0021@gmail.com', 'PURCHASER', '1999-05-13', 'Male', 8310334570, '$2y$10$VLSPsUfi3TCl29cNvwaFl.jlx4Il2QGI1Ifjhfc6M2W7acZb2mGDi', '2021-06-23 07:59:22'),
(11, 'Amit', 'amittorne9900@gmail.com', 'PURCHASER', '1999-10-16', 'Male', 8746064478, '$2y$10$shLPGX6rrvb1T.nRFXGaJejpyJYjZX1VjbVOeRUWEh.NDA2G2Ey0G', '2021-06-23 08:02:53'),
(12, 'Akshay Hegde', 'sam12@gmail.com', 'PURCHASER', '2021-06-03', 'Male', 9448201632, '$2y$10$TtYe6arfygDdqRJ9psMj7uA6505gUypTmsLJDM8CPO3GMjLG7mtR2', '2021-06-24 20:36:55'),
(13, 'Akshay na heg', 'sam123@gmail.com', 'PURCHASER', '2021-06-03', 'Male', 9448201631, '$2y$10$vHl1hghXClFymVnDCSuOgeF8ZKJW1p9YR6iiuuTGRSfSyL9a2x1fe', '2021-06-25 00:07:21'),
(14, 'Jinga', 'J@g.com', 'PURCHASER', '1990-06-25', 'Male', 9036523522, '$2y$10$GpDvMg3spVYqbWddHGdBoeo5yNV6QzDzi1iOPeCURVXjcLzgc3yO6', '2021-06-25 04:58:20'),
(15, 'Abcd', 'New12@gmail.com', 'PURCHASER', '2021-06-25', 'Male', 9876543121, '$2y$10$DDB1r.zdLSNYnrZQogt6auXlWDhYI9yRsZPcrdg0yeOwheYxcSDFC', '2021-06-25 10:19:36'),
(16, 'Manasa H R', 'Manasa662@gmail.com', 'PURCHASER', '1999-06-02', 'Male', 8660706752, '$2y$10$sdfY.oGW3q2fQzM86kj7YenrLFUnvgCaOJb1ycLuiPt.VPwrdaCW6', '2021-07-03 06:20:09');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_information`
--

CREATE TABLE `user_profile_information` (
  `ID` int(50) NOT NULL,
  `E_mail_id` varchar(150) NOT NULL,
  `Profile_Status` varchar(150) NOT NULL,
  `Default_profile` varchar(200) NOT NULL,
  `Actual_profile_image` varchar(200) NOT NULL,
  `date_of_profile_update_info` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile_information`
--

INSERT INTO `user_profile_information` (`ID`, `E_mail_id`, `Profile_Status`, `Default_profile`, `Actual_profile_image`, `date_of_profile_update_info`) VALUES
(9, 'patilavinash0021@gmail.com', 'YES', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '../UploadUserProfile/User_profile_patilavinash0021_33199299.jpg', '2021-07-08 18:05:29'),
(10, 'amittorne9900@gmail.com', 'YES', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '../UploadUserProfile/User_profile_amittorne9900_17185413.jpeg', '2021-07-09 23:05:40'),
(11, 'sam12@gmail.com', 'NO', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '2021-06-24 20:36:55'),
(12, 'sam123@gmail.com', 'NO', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '2021-06-25 00:07:21'),
(13, 'J@g.com', 'NO', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '2021-06-25 04:58:20'),
(14, 'New12@gmail.com', 'NO', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '2021-06-25 10:19:36'),
(15, 'Manasa662@gmail.com', 'YES', 'https://previews.123rf.com/images/salamatik/salamatik1801/salamatik180100019/92979836-profile-anonymous-face-icon-gray-silhouette-person-male-default-avatar-photo-placeholder-isolated-on.jpg', '../UploadUserProfile/User_profile_Manasa662_24656421.jpg', '2021-07-03 06:42:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_crop_image_table`
--
ALTER TABLE `add_crop_image_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `crop_category`
--
ALTER TABLE `crop_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `crop_category_items`
--
ALTER TABLE `crop_category_items`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `crop_comments`
--
ALTER TABLE `crop_comments`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `farmer_user_address_table`
--
ALTER TABLE `farmer_user_address_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `farmer_user_favourite`
--
ALTER TABLE `farmer_user_favourite`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `purchased_crop_item`
--
ALTER TABLE `purchased_crop_item`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sign_up_farmer_information`
--
ALTER TABLE `sign_up_farmer_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sign_up_user_information`
--
ALTER TABLE `sign_up_user_information`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_profile_information`
--
ALTER TABLE `user_profile_information`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_crop_image_table`
--
ALTER TABLE `add_crop_image_table`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `crop_comments`
--
ALTER TABLE `crop_comments`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `farmer_user_address_table`
--
ALTER TABLE `farmer_user_address_table`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `farmer_user_favourite`
--
ALTER TABLE `farmer_user_favourite`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `purchased_crop_item`
--
ALTER TABLE `purchased_crop_item`
  MODIFY `ID` int(120) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `sign_up_farmer_information`
--
ALTER TABLE `sign_up_farmer_information`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sign_up_user_information`
--
ALTER TABLE `sign_up_user_information`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_profile_information`
--
ALTER TABLE `user_profile_information`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
