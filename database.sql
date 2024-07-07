-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 07, 2024 at 04:20 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--
CREATE DATABASE IF NOT EXISTS `assignment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `assignment`;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sales_status` enum('available','out_of_stock') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `sales_status`, `image`) VALUES
(1, 'Smartphone', 'Electronics', 299.99, 'available', 'https://img.fruugo.com/product/2/26/391720262_max.jpg'),
(2, 'Laptop', 'Electronics', 199.99, 'out_of_stock', 'https://www.aptronixindia.com/media/catalog/product/m/b/mbp14-spacegray-select-202110_1.jpeg'),
(3, 'Fiction Book', 'Books', 9.99, 'available', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1546910265i/2._UX187_.jpg'),
(4, 'Non-Fiction Book', 'Books', 14.99, 'available', 'https://cdn.kobo.com/book-images/5d17e601-2e54-4b11-869b-470fb6cba2e6/353/569/90/False/self-publish-succeed-the-no-boring-books-way-to-writing-a-non-fiction-book-that-sells.jpg'),
(5, 'T-Shirt', 'Clothing', 49.99, 'out_of_stock', 'https://m.media-amazon.com/images/I/51SRYIm1jSL._AC_UF894,1000_QL80_.jpg'),
(6, 'Jeans', 'Clothing', 79.99, 'available', 'https://i.insider.com/644939a6b81bcf001837266c?width=1005&format=jpeg&auto=webp'),
(7, 'Sofa', 'Furniture', 499.99, 'available', 'https://www.ikea.com/in/en/images/products/vimle-3-seat-sofa-gunnared-medium-grey__0514368_pe639441_s5.jpg'),
(8, 'Dining Table', 'Furniture', 399.99, 'out_of_stock', 'https://png.pngtree.com/png-vector/20220101/ourlarge/pngtree-dining-table-png-image_4127058.png'),
(9, 'Thor Avenger Action Figure', 'Toys', 19.99, 'available', 'https://techdelivers.com/image/cache/catalog/toys/TY-HERO4-1-550x550h.jpg'),
(10, 'Board Game', 'Toys', 29.99, 'out_of_stock', 'https://m.media-amazon.com/images/I/717HaDTjqOL._AC_UF1000,1000_QL80_.jpg'),
(11, 'Blender', 'Kitchen', 39.99, 'available', 'https://images-cdn.ubuy.co.in/652235167d1071066610b4ed-ninja-kitchen-system-72-oz-blender.jpg'),
(12, 'Microwave', 'Kitchen', 24.99, 'available', 'https://res.cloudinary.com/sharp-consumer-eu/image/fetch/w_3000,f_auto/https://s3.infra.brandquad.io/accounts-media/SHRP/DAM/origin/c7c9dc3a-b720-11ec-bd5f-eecbf35dfbeb.jpg'),
(13, 'Headphones', 'Electronics', 89.99, 'available', 'https://images-eu.ssl-images-amazon.com/images/I/71pGjUwrUlL._AC_UL210_SR210,210_.jpg'),
(14, 'Smartwatch', 'Electronics', 129.99, 'out_of_stock', 'https://m.media-amazon.com/images/I/61ZjlBOp+rL.jpg'),
(15, 'Comic Book', 'Books', 5.99, 'available', 'https://i.etsystatic.com/6273866/r/il/6e2913/2813443667/il_570xN.2813443667_bwz0.jpg'),
(16, 'Albert Einstien Biography', 'Books', 12.99, 'out_of_stock', 'https://m.media-amazon.com/images/I/714AEmihCVL._AC_UF1000,1000_QL80_.jpg'),
(17, 'Jacket', 'Clothing', 99.99, 'available', 'https://5.imimg.com/data5/SELLER/Default/2022/2/WC/AP/UD/148088711/61nghbz2z8l-ux569-.jpg'),
(18, 'Sneakers', 'Clothing', 59.99, 'out_of_stock', 'https://i.pinimg.com/originals/b0/b5/f7/b0b5f7e6c519b6c1dd1d60b4c231a27f.jpg'),
(19, 'Coffee Table', 'Furniture', 299.99, 'available', 'https://www.godrejinterio.com/imagestore/B2C/56121403SD00262/56121403SD00262_A2_803x602.jpg'),
(20, 'Bookshelf', 'Furniture', 199.99, 'out_of_stock', 'https://ii1.pepperfry.com/media/catalog/product/k/r/1100x1210/kryss-sheesham-wood-book-shelf-in-honey-oak-finish-kryss-sheesham-wood-book-shelf-in-honey-oak-finis-opxmkd.jpg'),
(21, 'Stuffed Animal', 'Toys', 14.99, 'available', 'https://images-cdn.ubuy.co.in/6341d6db12cb34730132acf9-stuffed-bunny-animal-with-carrot-soft.jpg'),
(22, 'Puzzle', 'Toys', 24.99, 'out_of_stock', 'https://rukminim2.flixcart.com/image/850/1000/xif0q/board-game/s/5/e/4-toddler-wooden-puzzle-3-in-1-number-shaped-abc-alphabet-wooden-original-imagqst5ph9rwh9b.jpeg?q=90&crop=false'),
(23, 'Cookware Set', 'Kitchen', 49.99, 'available', 'https://5.imimg.com/data5/MF/UW/MY-22740806/15-piece-nonstick-stay-cool-handle-cookware-set-2c-black-500x500.jpg'),
(24, 'Toaster', 'Kitchen', 29.99, 'available', 'https://images-cdn.ubuy.co.in/654303df7d9a4319292aae3b-hamilton-beach-2-slice-toaster.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
