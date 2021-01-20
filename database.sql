-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: iun. 18, 2020 la 02:28 PM
-- Versiune server: 10.4.10-MariaDB
-- Versiune PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `cristilicenta`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `afisare`
--

CREATE TABLE `afisare` (
  `id` int(11) NOT NULL,
  `temp` double NOT NULL,
  `umid` double NOT NULL,
  `gaz` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `afisare`
--

INSERT INTO `afisare` (`id`, `temp`, `umid`, `gaz`) VALUES
(1, 28.9, 63, 1000);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `caracteristici`
--

CREATE TABLE `caracteristici` (
  `id` int(11) NOT NULL,
  `temp` double NOT NULL,
  `umid` double NOT NULL,
  `gaz` double NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `caracteristici`
--

INSERT INTO `caracteristici` (`id`, `temp`, `umid`, `gaz`, `data`) VALUES
(26, 27.3, 62, 176, '2020-06-17 20:59:02'),
(27, 27.6, 68, 173, '2020-06-17 21:00:44'),
(28, 28.3, 63, 169, '2020-06-17 21:02:26'),
(29, 27.6, 62, 177, '2020-06-17 21:04:08'),
(30, 27.2, 63, 177, '2020-06-17 21:05:50'),
(31, 27, 63, 178, '2020-06-17 21:07:33'),
(32, 27, 63, 178, '2020-06-17 21:09:15'),
(33, 26.9, 64, 189, '2020-06-17 21:10:57'),
(34, 27.6, 62, 182, '2020-06-17 21:12:40'),
(35, 27.6, 60, 170, '2020-06-17 21:14:22'),
(36, 27.6, 61, 170, '2020-06-17 21:16:05'),
(37, 27.7, 61, 159, '2020-06-17 21:17:47'),
(38, 26.4, 62, 175, '2020-06-17 21:19:29'),
(39, 26.2, 60, 189, '2020-06-17 21:21:11'),
(40, 24.6, 58, 186, '2020-06-17 21:22:54');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `led`
--

CREATE TABLE `led` (
  `id` int(11) NOT NULL,
  `led` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `led`
--

INSERT INTO `led` (`id`, `led`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `magnet`
--

CREATE TABLE `magnet` (
  `id` int(11) NOT NULL,
  `magnet` int(11) NOT NULL,
  `foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `magnet`
--

INSERT INTO `magnet` (`id`, `magnet`, `foto`) VALUES
(1, 0, 716);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `motor`
--

CREATE TABLE `motor` (
  `id` int(11) NOT NULL,
  `motor` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `motor`
--

INSERT INTO `motor` (`id`, `motor`) VALUES
(1, '0');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `user`
--

CREATE TABLE `user` (
  `id_User` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `Nume` varchar(25) NOT NULL,
  `Prenume` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `user`
--

INSERT INTO `user` (`id_User`, `username`, `password`, `Nume`, `Prenume`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(2, 'admin10', 'admin10', 'cristi', 'macari');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `afisare`
--
ALTER TABLE `afisare`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `caracteristici`
--
ALTER TABLE `caracteristici`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `led`
--
ALTER TABLE `led`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `magnet`
--
ALTER TABLE `magnet`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `motor`
--
ALTER TABLE `motor`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_User`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `afisare`
--
ALTER TABLE `afisare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pentru tabele `caracteristici`
--
ALTER TABLE `caracteristici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT pentru tabele `led`
--
ALTER TABLE `led`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `magnet`
--
ALTER TABLE `magnet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `motor`
--
ALTER TABLE `motor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pentru tabele `user`
--
ALTER TABLE `user`
  MODIFY `id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
