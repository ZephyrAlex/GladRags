-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 03 apr 2017 kl 16:54
-- Serverversion: 10.1.13-MariaDB
-- PHP-version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `glad_rags`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Fnamn` varchar(25) NOT NULL,
  `Enamn` varchar(255) NOT NULL,
  `Epost` varchar(225) NOT NULL,
  `AdminID` varchar(255) NOT NULL,
  `pwd` varchar(1000) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `admin`
--

INSERT INTO `admin` (`ID`, `Fnamn`, `Enamn`, `Epost`, `AdminID`, `pwd`, `token`) VALUES
(15, 'jsl', 'kl', 'mats.c.frolund@me.com', 'hj', '$2y$10$.5.ApJJ2nISvXu.TSYO1cO6HORtU5bgK/zUsdgKpaZjkt8JN/SJB2', 'r3n84jht7');

-- --------------------------------------------------------

--
-- Tabellstruktur `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `brand_img` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `brand_address` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `contact_phone` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `contact_mail` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `message` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `employee_img` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `role` varchar(55) COLLATE utf8_swedish_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `text` text COLLATE utf8_swedish_ci NOT NULL,
  `text_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `img1` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `img2` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `img3` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `img4` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) COLLATE utf8_swedish_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_swedish_ci NOT NULL,
  `epost` varchar(255) COLLATE utf8_swedish_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `epost`, `token`) VALUES
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `veckans_erbjudande`
--

CREATE TABLE `veckans_erbjudande` (
  `ID` int(11) NOT NULL,
  `Bildnamn` varchar(255) NOT NULL DEFAULT 'Upload/',
  `Rubrik` varchar(255) NOT NULL,
  `Info` varchar(12000) NOT NULL,
  `StartDatum` date NOT NULL,
  `SlutDatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `AdminID` (`AdminID`);

--
-- Index för tabell `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Index för tabell `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index för tabell `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Index för tabell `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Index för tabell `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `veckans_erbjudande`
--
ALTER TABLE `veckans_erbjudande`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT för tabell `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT för tabell `veckans_erbjudande`
--
ALTER TABLE `veckans_erbjudande`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
