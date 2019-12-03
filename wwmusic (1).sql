-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Dic 03, 2019 alle 22:57
-- Versione del server: 10.4.8-MariaDB
-- Versione PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwmusic`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `brand`
--

INSERT INTO `brand` (`id_brand`, `name_brand`) VALUES
(1, 'Fender'),
(2, 'Ibanez'),
(3, 'Gibson'),
(4, 'Pearl'),
(5, 'Tama'),
(6, 'Yamaha');

-- --------------------------------------------------------

--
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `id_categ` int(5) NOT NULL,
  `name_categ` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `category`
--

INSERT INTO `category` (`id_categ`, `name_categ`) VALUES
(1, 'Chitarre'),
(2, 'Bassi'),
(3, 'Tastiere'),
(4, 'Batterie');

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `id_product` int(7) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `categ_product` int(5) NOT NULL,
  `brand_product` int(5) NOT NULL,
  `description_product` varchar(500) DEFAULT NULL,
  `price_product` double DEFAULT NULL,
  `image_product` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `categ_product`, `brand_product`, `description_product`, `price_product`, `image_product`) VALUES
(1, 'Export Fusion', 4, 4, NULL, 699, 'export_fusion.png'),
(2, 'Les Paul Standard', 1, 3, NULL, 2599, 'lespaul.png'),
(3, 'Precision American Standard', 2, 1, NULL, 1699, 'precision.png'),
(4, 'PSR SX700', 3, 6, NULL, 1129, 'psrsx700.png'),
(5, 'AM ULTRA Stratocaster MN Texas Tea', 1, 1, NULL, 1979, 'stratocaster.png'),
(6, 'American Professional Telecaster MN Black', 1, 1, NULL, 1589, 'telecaster.png'),
(7, 'BTB1826 NTL Natural', 2, 2, NULL, 1539, 'btb1826.png'),
(8, 'RM52KH6C CCM', 4, 5, NULL, 589, 'rm52kh6c.png'),
(9, 'PSR SX900', 3, 6, NULL, 1959, 'psrsx900.png');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_categ`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `categ_product` (`categ_product`),
  ADD KEY `brand_product` (`brand_product`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `id_categ` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`categ_product`) REFERENCES `category` (`id_categ`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`brand_product`) REFERENCES `brand` (`id_brand`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
