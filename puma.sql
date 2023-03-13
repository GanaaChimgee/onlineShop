-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Mrz 2023 um 18:05
-- Server-Version: 10.4.27-MariaDB
-- PHP-Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `puma`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `customer`
--

INSERT INTO `customer` (`id`, `NAME`, `email`, `PASSWORD`) VALUES
(1, 'Max', 'max@g.com', '1234m'),
(2, 'Gana', 'gana@g.at', '0000'),
(3, 'Ben', 'ben@g.de', '9999'),
(4, 'Amar', 'amar@gmail.com', '1234'),
(5, '', 'thai@mail.com', '$2y$10$MWf..5YHayGBRU1VYIjfB.cQOCTsA9XrPExS.vSj1X7YpjVz/.OVu'),
(7, ' no name', 'tuser1@mail.com', '$2y$10$eELv7W.cN5.9p./cmTyTS.61WZ25/YQAorkQwztf.4A51OIqNTrKy'),
(8, ' user2', 'user2@shop.at', '$2y$10$BQxrhVKUE1VZx6Q9vAa4Wev8JIl1iaoTQoTRxMcXfjFMXYG27kZcC'),
(9, ' gana', 'gana@real.at', '$2y$10$GZQoI1eBQ2w2rxs9A92Gd.t.cz/IBkkk0okZWHPdlPxlQiMUKNbf2'),
(10, ' thai', 'thai@test.at', '$2y$10$kr3dBPOUW6pArZjbSQr0ZOloZh.ZplhBk5is74v97egDGC1rDHy7u'),
(11, ' mike', 'milian@mail.com', '$2y$10$IQ.32UKtO2o81fTzHnuYd.GNXh6azj3ClvZJObAYGKcJO.x46YHx2'),
(12, ' Tokyo', 'tokyo@gmail.com', '$2y$10$A1Zfv/CZx7C673feiazyXOWSruLvXb5KVxGBZyuMLZxUOr0NofqQ2'),
(13, ' ben', 'ben@gmail.com', '$2y$10$.qm679UpttXKi/FMSbQ46.xteLp1UXnah7YJfkjdWbRU0TpSuyk6q'),
(14, ' Haruko', 'haruko@mail.com', '$2y$10$UP9bpkw.iwkg5Zn4jrNoH.yvhh6sU0t6qLlKwg1C2sWRIpzCpgRCW');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `note`) VALUES
(1, 10, NULL),
(30, 5, 'asdasd'),
(49, 5, ''),
(58, 12, ''),
(64, 8, 'i want to cancel my order :(');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `product`
--

INSERT INTO `product` (`id`, `NAME`, `color`, `price`, `image`) VALUES
(1, 'Lenovo', 'black', 1000, 'https://picsum.photos/seed/picsum/200/200'),
(2, 'DELL', 'black', 1100, 'https://picsum.photos/200/200'),
(3, 'HP', 'black', 1050, 'https://picsum.photos/200/200'),
(4, 'Xiaomi', 'white', 1001, 'https://picsum.photos/id/870/200/200'),
(5, 'Macbook PRO', 'space gray', 2000, 'https://picsum.photos/seed/picsum/200/200');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `product_in_order`
--

CREATE TABLE `product_in_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `product_in_order`
--

INSERT INTO `product_in_order` (`order_id`, `product_id`) VALUES
(49, 1),
(58, 2),
(58, 3),
(64, 1),
(64, 2),
(64, 3),
(64, 4),
(64, 5);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indizes für die Tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_in_order_ibfk_2` (`product_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT für Tabelle `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `product_in_order`
--
ALTER TABLE `product_in_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints der Tabelle `product_in_order`
--
ALTER TABLE `product_in_order`
  ADD CONSTRAINT `product_in_order_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_in_order_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
