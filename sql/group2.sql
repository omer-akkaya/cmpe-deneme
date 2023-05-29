-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2023 at 02:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `cmpe-deneme`
--

-- --------------------------------------------------------
--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `basket`
--

-- --------------------------------------------------------
--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo_url` varchar(50) NOT NULL,
  `banner_url` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `photo_url`, `banner_url`)
VALUES (
    1,
    'Cleaners',
    'public/cleansers.png',
    'public/cilt-banner.png'
  ),
  (
    2,
    'Hair Care',
    'public/hair-care.png',
    'public/hero.png'
  ),
  (
    3,
    'Dental Care',
    'public/dental-care.jpg',
    'public/hero.png'
  ),
  (
    4,
    'Face Care',
    'public/face-care.png',
    'public/hero.png'
  ),
  (
    5,
    'Vitamins',
    'public/vitamins.png',
    'public/vitamin-banner.png'
  ),
  (
    6,
    'Baby Care',
    'public/baby-care.png',
    'public/baby-banner.png'
  );
-- --------------------------------------------------------
--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `adress` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (
    `id`,
    `name`,
    `email`,
    `password`,
    `is_admin`,
    `adress`
  )
VALUES (1, 'admin', 'admin', 'admin', 1, '');
-- --------------------------------------------------------
--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total_price` decimal(11, 2) NOT NULL,
  `adress` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` decimal(11, 2) NOT NULL,
  `count` int(11) NOT NULL,
  `total_price` decimal(11, 2) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `order_details`
--

-- --------------------------------------------------------
--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(11, 2) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (
    `id`,
    `name`,
    `price`,
    `description`,
    `category_id`,
    `photo`
  )
VALUES (
    21,
    'Maruderm Oil Based Cleanser 400 Ml',
    299.90,
    'Removes sunscreen and heavy make-up in one go. It is suitable for use of all skin types for double-stage cleansing. It is also very effective in removing eye make-up. It does not burn the eyes.\n\n\n',
    1,
    'public/maruderm.jpg'
  ),
  (
    22,
    'CeraVe Facial Cleansing Gel',
    249.90,
    'Does not contain perfume, Sles, and SLS.\nwhile purifying the skin of excess dirt and oil,\nit opens the pores and reduces the appearance of imperfections. Use by massaging your wet skin on your face, then rinse with plenty of water.\n',
    1,
    'public/cerave.jpg'
  ),
  (
    23,
    'Agarta Purifying Facial Cleansing Gel',
    98.90,
    'Thanks to its natural fruit, alpha and beta acids, it not only adjusts the sebum balance of the skin but also,.\n provides the necessary moisture, giving your face shine and moisture with regular use. Use by massaging your wet skin on your face, then rinse with plenty of water.\n',
    1,
    'public/agarta.jpg'
  ),
  (
    24,
    'La Roche Posay Effaclar Facial Cleansing ',
    317.90,
    'Deeply cleansed skin is relaxed and refreshed.\nThe skin is purified from excess sebum and regains its natural glow day by day. Contains La Roche Posay thermal water with anti-irritation and soothing-relaxing effects. Free of soap, coloring matter, alcohol and paraben. Use by massaging your wet skin on your face, then rinse with plenty of water.',
    1,
    'public/la-roche.jpg'
  ),
  (
    25,
    'Farmasi Keratin Therapy Repair Spray',
    229.90,
    'Thanks to the keratin in its content, it strengthens the broken and burnt hair. organic and antiallergic. Use by massaging the scalp before washing. Let it stay on the scalp for at least 2-3 hours and rinse with plenty of water.\n',
    2,
    'public/farmasi.jpg'
  ),
  (
    26,
    'Urban Aloe Vera Hair Care Serum',
    318.75,
    'Color protecting liquid hair care cream containing pure coconut oil and aloe vera has been developed for colored, highlighted and damaged hair.  It helps to increase the permanence by protecting the hair color and gives shine.\nA small amount of product is applied evenly on the hair. Does not require rinsing. It can be applied to your dry hair as a mask treatment before shampooing and then rinsed.\n',
    2,
    'public/urban.jpg'
  ),
  (
    27,
    'Morfose Hair Care Repair Foam',
    88.00,
    'Morfose Milk Therapy Hair Foam is a unique product that revitalizes and repairs hair and offers intensive care. It not only shapes your hair, but also nourishes and protects it.\nIt gives shine and volume. Shake the bottle before use.\nSqueeze a little into your palm by turning it upside down.\n\n',
    2,
    'public/morfose.jpg'
  ),
  (
    28,
    'Xmile Teeth Whitening Pen',
    159.00,
    'Cleans tooth enamel most effectively\nIt is very effective for bad breath and mouth care.\nThanks to our ultra-soft brush, our specially designed teeth whitening pen for teeth cleaning and teeth whitening,\n you can easily clean and care for your teeth.\n',
    3,
    'public/xmile.jpg'
  ),
  (
    29,
    'Colgate Total Health Interface Floss',
    66.90,
    'It is an essential part of your daily oral care.\nIt helps to reduce gum problems and prevent tooth decay by cleaning the plaque between the teeth and under the gum line.\nColgate Total® Professional Gum Health floss (50M) helps prevent the formation of stains by preventing the formation of tartar between the teeth for whiter teeth.\nIt glides easily between teeth.\n',
    3,
    'public/colgate-total.jpg'
  ),
  (
    30,
    'Colgate toothpaste',
    94.95,
    'Breakthrough formula with Zinc and Arginine helps protect teeth, tongue, cheeks and gums. Arginine Helps weaken the plaque structure and increases the transport of zinc to the oral surfaces.',
    3,
    'public/colgate-toothpaste.jpg'
  ),
  (
    32,
    'Nivea Luminous630 High Sun Protection Anti-Blemish',
    279.90,
    'Provides oil control on the skin\nMoisturizes, mattifies and smoothes the skin.\nIt helps to reduce the appearance of skin blemishes and fight against their re-occurrence.\nWith its advanced texture, it provides a more even skin tone and an enlightened complexion.\n',
    4,
    'public/nivea.jpg'
  ),
  (
    33,
    'Bepanthol Derma Skin Care Cream 100 ml',
    163.70,
    'It moisturizes and protects the exfoliated, cracked and tense skin due to skin dryness due to external factors. \nThanks to the ProVitamin B5 it contains, it moisturizes the skin and protects the skin barrier against external factors.\nWith its soft and light texture, it is quickly absorbed and does not leave a feeling of \noiliness while giving a feeling of coolness to the skin.\n',
    4,
    'public/bepanthol.jpg'
  ),
  (
    34,
    'Neutrogena Anti-Wrinkle Care Cream ',
    301.90,
    'Visibly reduces the appearance of fine lines and deep wrinkles\nReduces the appearance of age spots to make skin look smoother and healthier\nReduces the appearance of crows feet and dark circles\nVisibly reduces dark spots caused by sun exposure\n',
    4,
    'public/neutrogena.jpg'
  ),
  (
    35,
    'Solgar Vitamin B12 1000 Mcg 100 Sublingual Table',
    261.90,
    'It does not contain sugar, salt, starch. It does not contain potential allergens such as yeast, wheat, gluten, soy and dairy products.\nNo artificial flavors, colorants or preservatives were used.\nIt is also suitable for use by vegan and vegetarian individuals.\n',
    5,
    'public/solgar.jpg'
  ),
  (
    36,
    'Pharmaton 30 Tablets - Biotin, Iron, Vitamin B',
    156.50,
    'It is a food supplement containing 12 vitamins and 6 minerals in its special formula developed to support the\n daily nutritional supplement needs of women.\nContributes to the protection of hair, skin and nails\nContributes to Energy Formation Metabolism: Vitamins B1, B2, B3, B5, B6, B12, C and Biotin, Magnesium, \n',
    5,
    'public/pharmaton.jpg'
  ),
  (
    37,
    'Multibiotin 5000 Mcg 60 Tablets- Biotin, Iron, Zin',
    158.00,
    'Ingredients Biotin , Zinc, Iron\nThere is no gelatin or animal gelatin. Our product is in tablet form.\nThere is no harm in using our product with any food supplement.\nOur products do not contain titanium dioxide and similar objectionable substances.\n',
    5,
    'public/multibiotin.jpg'
  ),
  (
    38,
    'MorBebe Lux Baby Washing Sponge',
    59.90,
    'Rubberized Baby Washing Sponge, The elastic band of this specially designed product allows you to use\n it with one hand while your other hand is free to hold the baby. \nIt allows you to wash your baby safely and comfortably. It is both a practical and a pleasant accessory.\n',
    6,
    'public/morbebe.jpg'
  ),
  (
    39,
    'Mustela Gentle Shampoo Baby Shampoo',
    144.00,
    'Chamomile extract shampoo, suitable for use from birth, is specially formulated for fine and sensitive hair . \nof babies and children\nThe 500 ml bottle is ideal for daily washing and easy combing of the hair of newborns, babies and children,\nincluding newborns leaving the neonatal intensive care unit. \nLeaves a uniquely pleasant scent on the skin\nrinses easily and does not sting\n',
    6,
    'public/mustela.jpg'
  ),
  (
    40,
    'Jack N-Jill Baby Face and Body Lotion with Natural',
    149.90,
    'It has all-natural ingredients.\nSince our skin is exposed to external factors from the moment we are born, many babies, \nchildren and adults may experience skin deformation and need a light moisturizer to help heal and protect the skin.\nWe recommend this ultra-precise formula for newborns.\n',
    6,
    'public/jack.jpg'
  );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`, `product_id`),
  ADD KEY `product_id` (`product_id`);
--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);
--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`, `order_id`, `product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);
--
-- Indexes for table `products`
--
ALTER TABLE `products`
ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 389;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 34;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 92;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 156;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 43;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;