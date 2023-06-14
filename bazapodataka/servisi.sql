-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 11:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servisi`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `DodajIzvrseneRadove` (IN `IDServisaParametar` INT(10), IN `BrojSasijeParametar` INT(17), IN `RadoviParametar` INT(10), IN `ImePrezimeKlijentaParametar` VARCHAR(40), IN `BrRadnihSatiParametar` INT(10), IN `DatumPocetkaRadovaParametar` DATE, `DatumKrajaRadovaParametar` DATE, `CenaParametar` INT(15))   BEGIN
INSERT INTO `izvrsenirad` (`IDServisa`, `BrojSasije`, `Radovi`, `ImePrezimeKlijenta`, `BrRadnihSati`,`DatumPocetkaRadova`,`DatumKrajaRadova`,`Cena`) VALUES (IDServisaParametar, BrojSasijeParametar, RadoviParametar, ImePrezimeKlijentaParametar, BrRadnihSatiParametar, DatumPocetkaRadovaParametar, DatumKrajaRadovaParametar,CenaParametar);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `izvrsenirad`
--

CREATE TABLE `izvrsenirad` (
  `IDServisa` int(10) NOT NULL,
  `BrojSasije` int(17) NOT NULL,
  `Radovi` int(10) NOT NULL,
  `ImePrezimeKlijenta` varchar(40) NOT NULL,
  `BrRadnihSati` int(10) NOT NULL,
  `DatumPocetkaRadova` date NOT NULL,
  `DatumKrajaRadova` date NOT NULL,
  `Cena` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `izvrsenirad`
--

INSERT INTO `izvrsenirad` (`IDServisa`, `BrojSasije`, `Radovi`, `ImePrezimeKlijenta`, `BrRadnihSati`, `DatumPocetkaRadova`, `DatumKrajaRadova`, `Cena`) VALUES
(1, 2147483647, 1, 'Nikola Zindovic', 5, '2023-03-10', '2023-03-10', 8000),
(2, 1242342353, 1, 'Predrag Novokmet', 6, '2023-03-10', '2023-03-10', 1200),
(3, 2147483647, 2, 'Nikola Zindovic', 2, '2023-03-10', '2023-03-10', 6500);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `IDKORISNIKA` int(11) NOT NULL,
  `PREZIME` varchar(50) NOT NULL,
  `IME` varchar(40) NOT NULL,
  `EMAIL` varchar(60) NOT NULL,
  `KORISNICKOIME` varchar(30) NOT NULL,
  `SIFRA` varchar(30) NOT NULL,
  `URLSLike` varchar(250) DEFAULT NULL,
  `statusucesca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKORISNIKA`, `PREZIME`, `IME`, `EMAIL`, `KORISNICKOIME`, `SIFRA`, `URLSLike`, `statusucesca`) VALUES
(1, 'Novokmet', 'Pedja', 'np@gmail.com', 'pedja', '123', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `rad`
--

CREATE TABLE `rad` (
  `Sifra` int(10) NOT NULL,
  `NazivRada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rad`
--

INSERT INTO `rad` (`Sifra`, `NazivRada`) VALUES
(1, 'Veliki Servis'),
(2, 'Mali Servis');

-- --------------------------------------------------------

--
-- Stand-in structure for view `svipodacioizvrsenimradovima`
-- (See below for the actual view)
--
CREATE TABLE `svipodacioizvrsenimradovima` (
`IDServisa` int(10)
,`BrojSasije` int(17)
,`ImePrezimeKlijenta` varchar(40)
,`NazivRada` varchar(100)
,`Cena` int(15)
);

-- --------------------------------------------------------

--
-- Structure for view `svipodacioizvrsenimradovima`
--
DROP TABLE IF EXISTS `svipodacioizvrsenimradovima`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `svipodacioizvrsenimradovima`  AS SELECT `izvrsenirad`.`IDServisa` AS `IDServisa`, `izvrsenirad`.`BrojSasije` AS `BrojSasije`, `izvrsenirad`.`ImePrezimeKlijenta` AS `ImePrezimeKlijenta`, `rad`.`NazivRada` AS `NazivRada`, `izvrsenirad`.`Cena` AS `Cena` FROM (`izvrsenirad` join `rad` on(`izvrsenirad`.`Radovi` = `rad`.`Sifra`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `izvrsenirad`
--
ALTER TABLE `izvrsenirad`
  ADD PRIMARY KEY (`IDServisa`),
  ADD KEY `rad` (`Radovi`);

--
-- Indexes for table `rad`
--
ALTER TABLE `rad`
  ADD PRIMARY KEY (`Sifra`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `izvrsenirad`
--
ALTER TABLE `izvrsenirad`
  ADD CONSTRAINT `izvrsenirad_ibfk_1` FOREIGN KEY (`Radovi`) REFERENCES `rad` (`Sifra`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
