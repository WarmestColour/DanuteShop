-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2021 at 09:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parduotuve`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_userid`
--

CREATE TABLE `cart_userid` (
  `id` int(11) NOT NULL,
  `vartotojo_id` int(11) NOT NULL,
  `prekes_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `cart_userid`
--

INSERT INTO `cart_userid` (`id`, `vartotojo_id`, `prekes_id`) VALUES
(2, 0, 3),
(3, 0, 1),
(4, 0, 3),
(5, 0, 1),
(6, 0, 2),
(7, 0, 2),
(8, 0, 3),
(9, 0, 2),
(10, 0, 2),
(11, 0, 5),
(12, 0, 5),
(13, 0, 1),
(14, 0, 1),
(15, 0, 1),
(16, 0, 1),
(17, 0, 1),
(18, 0, 3),
(19, 0, 5),
(20, 0, 6),
(21, 0, 7),
(22, 0, 3),
(23, 0, 2),
(24, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorijos`
--

CREATE TABLE `kategorijos` (
  `kategorijos_ID` smallint(6) NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `kategorijos`
--

INSERT INTO `kategorijos` (`kategorijos_ID`, `pavadinimas`) VALUES
(1, 'laisvalaikio prekės'),
(2, 'statybinės prekės'),
(3, 'švieži gaminiai'),
(4, 'šaldyti gaminiai');

-- --------------------------------------------------------

--
-- Table structure for table `prekes`
--

CREATE TABLE `prekes` (
  `prekes_ID` int(11) NOT NULL,
  `pavadinimas` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL,
  `kategorijos_ID` smallint(6) NOT NULL,
  `kaina` double(10,2) NOT NULL,
  `kiekis` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `prekes`
--

INSERT INTO `prekes` (`prekes_ID`, `pavadinimas`, `kategorijos_ID`, `kaina`, `kiekis`) VALUES
(1, 'Batutas', 1, 89.99, 5),
(2, 'Šokdynė', 1, 2.99, 20),
(3, 'Rauginti kopūstai, 500g', 3, 0.99, 50),
(4, 'Pomidorai, 1kg', 3, 2.49, 100),
(5, 'Šaldyti ančiuviai, 400g', 4, 4.99, 20),
(6, 'Koldūnai VIČI, 400g', 4, 3.19, 100),
(7, 'Teptukas', 2, 8.99, 100),
(8, 'Veržliaraktis', 2, 12.99, 50);

-- --------------------------------------------------------

--
-- Table structure for table `vartotojai`
--

CREATE TABLE `vartotojai` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL,
  `password` varchar(255) COLLATE utf16_lithuanian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `vartotojai`
--

INSERT INTO `vartotojai` (`id`, `name`, `lastname`, `password`) VALUES
(1, 'Vasilijus', 'Raudonasis', 'caras4life'),
(2, 'Imunas', 'Globulinas', 'feelgood123');

-- --------------------------------------------------------

--
-- Table structure for table `vertinimas`
--

CREATE TABLE `vertinimas` (
  `user_ID` int(11) DEFAULT NULL,
  `vidurkis` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_lithuanian_ci;

--
-- Dumping data for table `vertinimas`
--

INSERT INTO `vertinimas` (`user_ID`, `vidurkis`) VALUES
(0, 0),
(0, 3.8),
(0, 3.2),
(0, 3.8),
(0, 2.8),
(0, 3),
(0, 0),
(0, 0),
(0, 3),
(0, 4.2),
(0, 2.8),
(0, 2.8),
(0, 2.8),
(0, 2.8),
(1, 2.8),
(1, 2.8),
(1, 2.8),
(1, 2.8),
(1, 2.8),
(1, 2.8),
(1, 2.8),
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_userid`
--
ALTER TABLE `cart_userid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategorijos`
--
ALTER TABLE `kategorijos`
  ADD PRIMARY KEY (`kategorijos_ID`);

--
-- Indexes for table `prekes`
--
ALTER TABLE `prekes`
  ADD PRIMARY KEY (`prekes_ID`),
  ADD KEY `kategorijos_ID` (`kategorijos_ID`);

--
-- Indexes for table `vartotojai`
--
ALTER TABLE `vartotojai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_userid`
--
ALTER TABLE `cart_userid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prekes`
--
ALTER TABLE `prekes`
  ADD CONSTRAINT `prekes_ibfk_1` FOREIGN KEY (`kategorijos_ID`) REFERENCES `kategorijos` (`kategorijos_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
