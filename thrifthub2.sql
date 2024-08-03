-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 02, 2023 at 03:43 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thrifthub2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bName` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`, `bName`, `status`) VALUES
(1, '1.jpg', '1', 1),
(2, '3.PNG', '2', 1),
(3, '2.jpg', 'shoes', 1),
(4, '63.jpg', 'furniture', 1),
(6, '4.jpg', 'Toys', 1),
(7, '51.jpg', 'Phone', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart2`
--

CREATE TABLE `cart2` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart2`
--

INSERT INTO `cart2` (`id`, `user_id`, `product_id`, `name`, `price`, `image`, `quantity`) VALUES
(65, 5, 8, 'Floral Embroidered Polo T-shirt', '1900', 'http://localhost/ThriftHub/uploads/product/651584201_Floral-Embroidered-Polo-T-shirt.jpg', 1),
(87, 12, 39, 'Kodak Ultra Limited Edition!!!', '7000', 'http://localhost/ThriftHub/uploads/product/248025808_product-3.jpg', 1),
(88, 12, 28, 'TBK Magnetic Bracelet Unisex', '3000', 'http://localhost/ThriftHub/uploads/product/527996969_TBK Magnetic Bracelet For Unisex Fashion Access', 1),
(89, 12, 37, 'Fishy fishy teddy', '580', 'http://localhost/ThriftHub/uploads/product/234117349_il_340x270.1175428660_rjop.jpg', 1),
(100, 15, 39, 'Kodak Ultra Limited Edition!!!', '7000', 'http://localhost/ThriftHub/uploads/product/248025808_product-3.jpg', 1),
(101, 15, 28, 'TBK Magnetic Bracelet Unisex', '3000', 'http://localhost/ThriftHub/uploads/product/527996969_TBK Magnetic Bracelet For Unisex Fashion Access', 1),
(102, 15, 24, 'Gaming chair Streelseries', '3000', 'http://localhost/ThriftHub/uploads/product/791262106_chair_natural.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `category`, `status`) VALUES
(2, 'Clothing & Shoes', 1),
(4, 'Toys & Entertainments', 1),
(1, 'Jewellery & Accessories', 1),
(3, 'Home & Living', 1),
(90, 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produkto`
--

CREATE TABLE `produkto` (
  `id` int NOT NULL,
  `categories_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `qty` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `best_seller` int DEFAULT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produkto`
--

INSERT INTO `produkto` (`id`, `categories_id`, `name`, `price`, `qty`, `image`, `description`, `best_seller`, `meta_keyword`, `status`) VALUES
(1, 4, 'Realme C3 (Frozen Blue, 64 GB) (4 GB RAM)', 8499, 10, '799153645_303b4a46-a701-4b43-b9c1-d98a2b53422f.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus scelerisque quis nisi porta congue. Aenean sed maximus ligula. Vestibulum quis eros id ex condimentum lacinia. Nam interdum finibus odio, sit amet commodo erat varius sed. In at velit velit. Nullam vitae gravida mi. Donec aliquet nunc non ipsum bibendum, et elementum nibh lobortis. Fusce tempor elit at mauris luctus euismod. Donec eu massa eros. Aenean maximus vitae nisl ut sollicitudin. Aenean urna arcu, laoreet at ante eget, maximus mattis lacus. Mauris dapibus tellus quis risus maximus molestie. Curabitur eget tortor tellus.', 1, 'Realme C3 (Frozen Blue, 64 GB) (4 GB RAM)', 1),
(2, 0, 'APPLE IPHONE 11 PRO MAX (512GB) - MIDNIGHT GREEN', 1300, 7, '942626953_iphone.jpg', 'Curabitur eget augue dolor. Curabitur id dapibus massa. Vestibulum at enim quis metus ultrices posuere vitae sit amet eros. Morbi et libero pellentesque, efficitur odio nec, congue lorem. Vestibulum faucibus, risus eget pretium efficitur, neque nulla eleifend purus, non venenatis lorem ligula vel nulla. Fusce finibus efficitur sapien vitae laoreet. Integer imperdiet justo sed tellus dictum, at egestas arcu finibus. Fusce et augue elit. Praesent tincidunt purus in purus dictum volutpat. Aenean tempus ut leo nec laoreet. Vestibulum ut est neque.', 1, 'APPLE IPHONE 11 PRO MAX (512GB) - MIDNIGHT GREEN', 1),
(3, 0, 'Samsung Galaxy S10 Plus 1TB (Ceramic White, 12GB RAM)', 4000, 5, '567328558_samsung-galaxy-s10-plus-1tb-ceramic-white-12gb-ram-.jpg', 'Nullam a nunc et lorem ornare faucibus. Etiam tortor lacus, auctor eget enim at, tincidunt dignissim magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin tincidunt eros eget felis tempor, id volutpat ipsum lacinia. Donec scelerisque risus non purus scelerisque tristique. Mauris enim ligula, condimentum sed iaculis nec, porttitor eu nunc. Sed hendrerit vel arcu vitae iaculis. Phasellus vehicula molestie leo. Nullam purus lorem, tincidunt vitae tristique non, imperdiet ut urna.', 0, 'Samsung Galaxy S10 Plus 1TB (Ceramic White, 12GB RAM)', 1),
(4, 2, 'SHEEN-SOLID TROUSER-OLIVE', 1200, 3, '697347005_2__1538219531_49.204.69.38_600x.jpg', 'Duis a felis congue, feugiat est non, suscipit quam. In elit lacus, auctor sed lacus eget, egestas consectetur leo. Duis pellentesque pharetra ante, ac ornare nibh faucibus id. Integer pulvinar malesuada nisl. Nulla vel orci nunc. Nullam a tellus eu ex ullamcorper mollis. Donec commodo ligula a accumsan fermentum. Mauris sed orci lacinia, posuere leo molestie, pretium mi. Cras sodales, neque id cursus fermentum, mi purus vehicula sem, vel laoreet lorem justo id tortor. Sed ut urna ut ipsum vestibulum commodo. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Ut commodo ullamcorper quam non pulvinar.', 0, 'SHEEN-SOLID TROUSER-OLIVE', 1),
(5, 2, 'NATURE-LINEN SHIRT-GREEN', 2399, 8, '812581380_nature_green-0224_600x.jpg', 'Nunc auctor turpis ante, eget bibendum mi mollis in. Aliquam quis neque ut libero malesuada auctor. Aliquam interdum enim at commodo gravida. Donec nisl sem, molestie ut quam quis, vulputate venenatis ipsum. Aenean quis ex ut magna accumsan fringilla. Quisque id ex massa. Sed libero ante, fringilla ac condimentum in, porttitor ac risus. Integer mattis odio nec nunc semper imperdiet. In porttitor tellus eget sapien vulputate, eu euismod lacus aliquet. Maecenas molestie elit augue, sit amet fringilla dolor congue et. Nunc eu libero auctor, sollicitudin lectus quis, porta ligula. In vel ullamcorper risus. Nullam viverra, mi sit amet laoreet luctus, urna nisl pharetra orci, at condimentum nisl lorem elementum ipsum.', 0, 'T-Shirt, NATURE-LINEN SHIRT-GREEN', 1),
(6, 2, 'Monte Carlo Turquoise Blue Solid Collar T Shirt', 1500, 8, '931830512__8-(1)-E5x-104831-NJD.jpg', 'Duis in risus quis lectus dictum fringilla. Aenean tempor pellentesque velit id ullamcorper. Ut id aliquam odio. Morbi id pharetra libero, ut tempor nisi. Maecenas a lectus nec risus maximus rutrum. Mauris vel elit ut magna semper laoreet nec sed magna. Quisque eleifend vel sem non malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum eget posuere orci, eu ultrices sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sit amet ex dictum nisl bibendum elementum non in turpis. In bibendum ipsum nunc, bibendum lacinia lacus maximus eu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vivamus aliquam lacus quis urna tristique suscipit. Praesent vitae mi mollis dui facilisis convallis eu faucibus augue.', 0, 'Monte Carlo Turquoise Blue Solid Collar T Shirt', 1),
(7, 77, 'Floral Print Polo T-shirt', 1350, 7, '309027777_Floral-Print-Polo-T-shirt.jpg', 'Nunc auctor turpis ante, eget bibendum mi mollis in. Aliquam quis neque ut libero malesuada auctor. Aliquam interdum enim at commodo gravida. Donec nisl sem, molestie ut quam quis, vulputate venenatis ipsum. Aenean quis ex ut magna accumsan fringilla. Quisque id ex massa. Sed libero ante, fringilla ac condimentum in, porttitor ac risus. Integer mattis odio nec nunc semper imperdiet. In porttitor tellus eget sapien vulputate, eu euismod lacus aliquet. Maecenas molestie elit augue, sit amet fringilla dolor congue et. Nunc eu libero auctor, sollicitudin lectus quis, porta ligula. In vel ullamcorper risus. Nullam viverra, mi sit amet laoreet luctus, urna nisl pharetra orci, at condimentum nisl lorem elementum ipsum.', 0, 'Floral Print Polo T-shirt', 1),
(8, 2, 'Floral Embroidered Polo T-shirt', 1900, 10, '651584201_Floral-Embroidered-Polo-T-shirt.jpg', 'Vestibulum in auctor turpis. Quisque hendrerit eget turpis et molestie. Phasellus nec nibh a lacus rhoncus eleifend. Donec suscipit id diam non mattis. Fusce eu luctus leo. Etiam eget dui libero. Etiam eros lorem, rhoncus et convallis eget, tempus vel tellus. Nam at diam quis nisl tincidunt aliquam. Quisque placerat magna non libero interdum varius vel id risus. Vivamus mollis maximus fermentum. Donec eget nulla dui. Sed ultricies malesuada metus, non feugiat purus fringilla ac. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer accumsan, tortor id eleifend varius, lacus velit aliquam ex, in dignissim sem eros ac erat. Vestibulum ac arcu tortor.', 1, 'Floral Embroidered Polo T-shirt', 1),
(9, 77, 'Floral Print Polo T-shirt Latest', 1560, 10, '526258680_Floral-Print-Polo-T-shirt1.jpg', 'aximus rutrum. Mauris vel elit ut magna semper laoreet nec sed magna. Quisque eleifend vel sem non malesuada. Interdum et malesuada fames ac ante ipsum primis in faucibus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum eget posuere orci, eu ultrices sapien. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam sit amet ex d', 1, 'Floral Print Polo T-shirt Latest', 1),
(11, 2, 'Test1', 50, 10, '457926432_697347005_2__1538219531_49.204.69.38_600x.jpg', 'test', 0, '', 1),
(13, 4, 'Iphone 14 Max with TV', 1000, 100, '622969544_942626953_iphone.jpg', 'very good', 1, 'Iphone', 1),
(14, 2, 'Shoe Nike Free Air Force', 1000, 7, '958434606_pngwing.com (1).png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim', 1, 'sneakers, Sneakers, shoes', 1),
(15, 2, 'Nike Air Zoom Winflo 8', 2800, 2, '577094574_1426156.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim', 0, 'shoes,girl shoes', 1),
(16, 2, 'Gucci Women’s Jogger Pants', 650, 30, '292469235_download.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim', 0, 'pants, women pants, girl pants', 1),
(18, 2, 'Grey Shirt', 150, 100, '943518794_tshirt_PNG5448.png', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim', 1, 'shirt,grey,grey shirt', 1),
(22, 3, 'Flower Vase Delight', 300, 7, '747411479_pngwing.com (2).png', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 0, 'vase, flower vase, flower', 1),
(23, 3, 'Mirror of Truth', 2890, 10, '974968289_3-36374_mirror-background-png-mirror-png-transparent-png.png', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 0, 'mirror.salamin,glass', 1),
(24, 3, 'Gaming chair Streelseries', 3000, 50, '791262106_chair_natural.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 1, 'chair,steel,steel chair,gaming,gaming chair', 1),
(25, 3, 'Small Narnia Portal Cabinet', 7000, 1, '549928655_B6-SHA_00000.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 0, 'cabinet,narnia,portal', 1),
(26, 3, 'Balisong Kitchen Knife', 790, 30, '747746950_BEN62-2__07130.1533221902.500.750.jpg', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 0, 'knife,balisong,self defense, defense', 1),
(27, 1, 'Gold Cubic Zirconia Butterfly Bracelet', 1980, 10, '886753154_TBK 18K Gold Cubic Zirconia Butterfly Bracelet For Women Accessories 196B.PNG', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 0, 'bracelete,braceletes,gold,Zirconia', 1),
(28, 1, 'TBK Magnetic Bracelet Unisex', 3000, 15, '527996969_TBK Magnetic Bracelet For Unisex Fashion Accessories Hypoallergenic 947B.PNG', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellendus, deserunt.', 1, 'bracelete,TBK,unisex', 1),
(29, 1, 'Daisy Sunflower Pendant Necklace', 2900, 16, '693844707_Daisy Sunflower Pendant Necklace Korean New Ins Girl Accessories.PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'daisy flower,pendant,necklace', 1),
(30, 1, 'TBK Gold Hitagi Pendant Necklace', 5890, 5, '733449815_TBK 18K Gold Hitagi Pendant Necklace for Women Star Moon Planet Hypoallergenic Accessories 229n.PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'TBK,gold,pendant,necklace,hitagi,18k', 1),
(31, 1, 'Bangkok Rosegold  earrings', 6800, 5, '537163473_Bangkok Rosegold loop or hoop glitters earrings[Tytiffany].PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'Tytiffany,earrings,bangkok,gold,rose', 1),
(32, 1, 'Retro Bangkok Rosegold plated stud earrings tytiffany', 7980, 4, '747036328_REA527 Retro U-Shape Bangkok rosegold plated good quality hoop stud earrings tytiffany.PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'tytiffany,earrings,rosegold,bangkok,retro', 1),
(33, 1, 'Callie Gold Kiana Promise Ring', 5580, 14, '187762831_Callie 18k Gold Plated Kiana Promise Ring Adjustable Shop.callie.PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'callie,gold,ring,kiana,promise', 1),
(34, 1, 'Cartier Gold Ring', 7600, 9, '234542455_Cartier.PNG', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'Cartier,gold,ring', 1),
(35, 4, 'Kidzoona Puzzle', 500, 50, '356548661_il_340x270.3996602937_8jbp.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'kids,puzzle,games,toys', 1),
(36, 4, 'Ebony Wood Chess board 21\" set', 200, 100, '808734465_il_794xN.3609809597_e2ft.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'chess,wood,ebony,games,puzzle,toys', 1),
(37, 4, 'Fishy fishy teddy', 580, 50, '234117349_il_340x270.1175428660_rjop.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'fishy,fish,doll,toys,kids,teddy bear', 1),
(38, 4, 'Loris Plush Plushie Cuddly Toy', 690, 50, '405347127_il_340x270.866408041_qn1z.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 0, 'toy,cuddle,kids,plushie.teddy bear,teddy,loris', 1),
(39, 4, 'Kodak Ultra Limited Edition!!!', 7000, 1, '248025808_product-3.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis non iste sequi cupiditate tempora iure. Velit accusamus saepe harum sed.', 1, 'kodak,camera,limited,edition,gadget', 1),
(41, 81, 'testing', 1, 1, '971216032_1.PNG', 'test', 0, 'test,testing,for requirements,requirements', 1),
(42, 83, 'testproduct1', 2, 2, '646665860_favpng_iphone-x-samsung-galaxy-s8-iphone-7-smartphone.png', 'test1', 1, 'one,two,three,test', 1),
(44, 87, 'testproduct', 2, 2, '821496581_favpng_iphone-x-samsung-galaxy-s8-iphone-7-smartphone.png', 'test', 0, 'one,two,three,try,test', 1),
(98, 89, 'edgy', 2, 2, '142305124_418852942656137_6428095903284536387_n.jpg', 'asdasd', NULL, 'asdads', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int NOT NULL,
  `cat_id` int NOT NULL DEFAULT '0',
  `subcategory` varchar(25) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `cat_id`, `subcategory`) VALUES
(11, 3, 'Furnitures'),
(111, 87, 'testsub'),
(9, 2, 'Shoes'),
(8, 2, 'Shirts'),
(7, 2, 'Tshirt'),
(113, 89, 'testsub1'),
(85, 3, 'Home decor'),
(84, 1, 'Earringss'),
(70, 1, 'Necklaces'),
(2, 1, 'Rings'),
(71, 1, 'Braceletes'),
(13, 3, 'Kitchen & Dining'),
(14, 4, 'Stuffed Animals'),
(15, 4, 'Games & Puzzles'),
(16, 4, 'Mobiles & Gadgets'),
(108, 83, 'testsub'),
(112, 88, 'testsub'),
(105, 81, 'test1'),
(103, 2, 'Pants');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `username`, `name`, `email`, `image`, `password`, `date`, `status`) VALUES
(18, 'hudairie1', 'test', 'haha2@yahoo.com', 'Number_1-53.jpg', '123', '2022-12-30 08:20:31', 1),
(19, 'hay2', 'hay', 'haha6@yahoo.com', 'Number_1-54.jpg', '123', '2022-12-30 08:20:47', 1),
(20, 'sample1', 'sample1', 'sample1@gmail', '140666462_1060986331090555_7121325879584653140_n.jpg', '202cb962ac59075b964b07152d234b70', '2022-12-30 08:23:35', 1),
(21, 'sample2', 'sample 2', 'sample2@yahoo.com', 'IMG-8262.jpg', '202cb962ac59075b964b07152d234b70', '2022-12-30 08:45:46', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cart2`
--
ALTER TABLE `cart2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `produkto`
--
ALTER TABLE `produkto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD UNIQUE KEY `subcat_id` (`subcat_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart2`
--
ALTER TABLE `cart2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `produkto`
--
ALTER TABLE `produkto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
