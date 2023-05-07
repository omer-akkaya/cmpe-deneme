-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 May 2023, 21:06:15
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4
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
-- Veritabanı: `cmpe-deneme`
--

-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `name`)
VALUES (1, 'Painkiller'),
  (2, 'Stomach Medicine'),
  (3, 'Painkiller'),
  (4, 'Stomach Medicine'),
  (5, 'Heart Medicine'),
  (6, 'Skin Problems'),
  (7, 'Kidney Pain'),
  (8, 'Mudcle Pain');
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
-- --------------------------------------------------------
--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(11, 2) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;
--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (
    `id`,
    `name`,
    `price`,
    `description`,
    `category_id`,
    `is_featured`
  )
VALUES (
    1,
    'Parol',
    31.20,
    '\"PAROL is suitable for adults and children over 6 years old. Adults and 12 years old\r\nThe recommended dose in children over the age of 1-2 is 1-2 tablets, and if necessary the dose can be repeated every 4 hours.\r\nThe maximum daily dose is 4000 mg. However, it should not be used more than 4 doses in 24 hours. 6-12\r\nThe recommended dose in children between the ages of 4-6 is ½-1 tablet with an interval of 4-6 hours. daily high\r\nthe dose is 60 mg/kg in 10-15 mg/kg divided doses.\"\r\n',
    1,
    1
  ),
  (
    2,
    'MAJEZİK DUO ',
    82.00,
    '\"Ctinae 2 times 1 tablet (100 mg flurbiprofen, 8 mg thiocolgicoside), ie the maximum number of tablets in one day\r\n(200 mg flurbiprofen, 16 mg thiocolgicoside) afuiz after meals.\r\nTreatment time is 5-7 days.\r\nUnless recommended otherwise by the doctor, it should be used in the specified doses.\"\r\n',
    1,
    1
  ),
  (
    3,
    'APRANAX FORT ',
    31.00,
    '\"PAROL is suitable for adults and children over 6 years old. Adults and 12 years old\r\nThe recommended dose in children over the age of 1-2 is 1-2 tablets, and if necessary the dose can be repeated every 4 hours.\r\nThe maximum daily dose is 4000 mg. However, it should not be used more than 4 doses in 24 hours. 6-12\r\nThe recommended dose in children between the ages of 4-6 is ½-1 tablet with an interval of 4-6 hours. daily high\r\nthe dose is 60 mg/kg in 10-15 mg/kg divided doses.\"\r\n',
    1,
    1
  ),
  (
    4,
    'ARVALES ',
    82.00,
    '\"Ctinae 2 times 1 tablet (100 mg flurbiprofen, 8 mg thiocolgicoside), ie the maximum number of tablets in one day\r\n(200 mg flurbiprofen, 16 mg thiocolgicoside) afuiz after meals.\r\nTreatment time is 5-7 days.\r\nUnless recommended otherwise by the doctor, it should be used in the specified doses.\"\r\n',
    1,
    1
  ),
  (
    5,
    'VERMİDON ',
    31.00,
    '\"PAROL is suitable for adults and children over 6 years old. Adults and 12 years old\r\nThe recommended dose in children over the age of 1-2 is 1-2 tablets, and if necessary the dose can be repeated every 4 hours.\r\nThe maximum daily dose is 4000 mg. However, it should not be used more than 4 doses in 24 hours. 6-12\r\nThe recommended dose in children between the ages of 4-6 is ½-1 tablet with an interval of 4-6 hours. daily high\r\nthe dose is 60 mg/kg in 10-15 mg/kg divided doses.\"\r\n',
    1,
    0
  ),
  (
    6,
    'DOLOREX',
    31.00,
    '\"PAROL is suitable for adults and children over 6 years old. Adults and 12 years old\r\nThe recommended dose in children over the age of 1-2 is 1-2 tablets, and if necessary the dose can be repeated every 4 hours.\r\nThe maximum daily dose is 4000 mg. However, it should not be used more than 4 doses in 24 hours. 6-12\r\nThe recommended dose in children between the ages of 4-6 is ½-1 tablet with an interval of 4-6 hours. daily high\r\nthe dose is 60 mg/kg in 10-15 mg/kg divided doses.\"\r\n',
    1,
    0
  );
--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
ADD PRIMARY KEY (`id`);
--
-- Tablo için indeksler `customer`
--
ALTER TABLE `customer`
ADD PRIMARY KEY (`id`);
--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);
--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;
--
-- Tablo için AUTO_INCREMENT değeri `customer`
--
ALTER TABLE `customer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 29;
--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 7;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;