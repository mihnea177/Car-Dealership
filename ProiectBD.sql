-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2024 at 05:58 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ProiectBD`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `AdminID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`AdminID`, `Email`, `Parola`, `Nume`, `Prenume`) VALUES
(1, 'admin1@gmail.com', 'admin', 'NumeAdmin', 'PrenumeAdmin'),
(2, 'admin2@gmail.com', 'admin', 'Nume2Admin', 'Prenume2Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Angajati`
--

CREATE TABLE `Angajati` (
  `AngajatID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `NrTelefon` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Angajati`
--

INSERT INTO `Angajati` (`AngajatID`, `Email`, `Parola`, `Nume`, `Prenume`, `NrTelefon`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', '0000000000'),
(2, 'angajat1@gmail.com', 'angajat1parola', 'NAngajat', 'PAngajat', '0722000000'),
(3, 'rares.ilie13@gmail.com', 'mihaisandu', 'Ilie', 'Rares', '0723358895');

-- --------------------------------------------------------

--
-- Table structure for table `Clase`
--

CREATE TABLE `Clase` (
  `ClasaID` int(11) NOT NULL,
  `NumeClasa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Clase`
--

INSERT INTO `Clase` (`ClasaID`, `NumeClasa`) VALUES
(1, 'Sedan'),
(2, 'SUV'),
(3, 'Hatchback'),
(4, 'Coupe');

-- --------------------------------------------------------

--
-- Table structure for table `Clienti`
--

CREATE TABLE `Clienti` (
  `ClientID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Parola` varchar(100) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `NrTelefon` char(10) NOT NULL,
  `Adresa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Clienti`
--

INSERT INTO `Clienti` (`ClientID`, `Email`, `Parola`, `Nume`, `Prenume`, `NrTelefon`, `Adresa`) VALUES
(1, 'admin@mail.com', 'admin', 'admin', 'admin', '0000000000', NULL),
(2, 'andrei@gmail.com', 'andreigmail', 'Popescu', 'Andrei', '0700123456', NULL),
(3, 'email@email.com', 'parola', 'nume', 'prenume', '0700000000', NULL),
(4, 'client@gmail.com', 'parola', 'Clienttt', 'PrenumeClient', '0785643255', NULL),
(5, 'mihaid@gmail.com', 'parola', 'Mihai', 'Dumitru', '0722354678', NULL),
(6, 'vladtz@gmail.com', 'oparola', 'Vlad', 'Tepes', '0722567843', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Contracte`
--

CREATE TABLE `Contracte` (
  `ContractID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL,
  `AngajatID` int(11) NOT NULL,
  `MasinaID` int(11) NOT NULL,
  `TipContract` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Contracte`
--

INSERT INTO `Contracte` (`ContractID`, `ClientID`, `AngajatID`, `MasinaID`, `TipContract`) VALUES
(1, 2, 2, 1, 'Plata integrala'),
(2, 5, 2, 5, 'Leasing'),
(3, 5, 2, 8, 'Leasing'),
(4, 5, 2, 8, 'Leasing'),
(5, 6, 2, 6, 'Plata in 2 rate');

-- --------------------------------------------------------

--
-- Table structure for table `Dotari`
--

CREATE TABLE `Dotari` (
  `DotareID` int(11) NOT NULL,
  `NumeDotare` varchar(50) NOT NULL,
  `DescriereDotare` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Dotari`
--

INSERT INTO `Dotari` (`DotareID`, `NumeDotare`, `DescriereDotare`) VALUES
(1, 'Lumini', 'Masina dispune de pachetul de lumini LED'),
(2, 'Climatizare', 'Climatizare reglabila pe zone'),
(3, 'Infotainment', 'Sistem de infotainment cu Carplay'),
(4, 'Stergatoare', 'Masina este echipata cu senzori de ploaie, stergatoarele vor porni automat');

-- --------------------------------------------------------

--
-- Table structure for table `Masini`
--

CREATE TABLE `Masini` (
  `MasinaID` int(11) NOT NULL,
  `NrSasiu` char(17) NOT NULL,
  `Marca` varchar(50) NOT NULL,
  `Model` varchar(100) NOT NULL,
  `Clasa` int(11) NOT NULL,
  `Culoare` varchar(100) DEFAULT NULL,
  `AnFabricatie` char(4) DEFAULT NULL,
  `Poza` varchar(300) NOT NULL,
  `Disponibilitate` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Masini`
--

INSERT INTO `Masini` (`MasinaID`, `NrSasiu`, `Marca`, `Model`, `Clasa`, `Culoare`, `AnFabricatie`, `Poza`, `Disponibilitate`) VALUES
(1, 'V0000000000000001', 'Dacia', 'Logan 0.9', 1, 'Alb', '2020', '1.jpg', 1),
(2, 'V0000000000000002', 'Mercedes', 'GLE', 2, 'Negru', '2022', '2.jpg', NULL),
(3, 'V0000000000000003', 'Volkswagen', 'Golf', 3, 'Gri', '2015', '3.jpg', NULL),
(4, 'V0000000000000004', 'BMW', 'M3', 4, 'Portocaliu', '2009', '4.jpg', NULL),
(5, 'V0000000000000005', 'Renault', 'Megane', 1, 'Negru', '2021', '5.jpg', 1),
(6, 'V0000000000000006', 'BMW', 'X5', 2, 'Negru', '2022', '6.jpg', 1),
(7, 'V0000000000000007', 'Seat', 'Leon', 3, 'Alb', '2016', '7.jpg', NULL),
(8, 'V0000000000000008', 'Porsche', '911', 4, 'Verde', '2022', '8.jpg', 1),
(9, 'V0000000000000009', 'Ford', 'Focus', 3, 'Albastru', '2022', '9.jpg', NULL),
(10, 'V0000000000000010', 'Skoda', 'Octavia', 1, 'Verde', '2022', '10.png', NULL),
(11, 'V0000000000000011', 'Fiat', 'Punto', 3, 'Rosu', '2005', 'Exotic-Red.jpg', NULL),
(12, 'V0000000000000012', 'Fiat', 'Panda', 3, 'Rosu', '2015', 'Red-Panda-(RED)_680x430.png', NULL),
(13, 'V0000000000000013', 'Opel', 'Insignia', 1, 'Negru', '2012', '3241980_opel-insignia_1.jpg', NULL),
(14, 'asda', 'asda', 'asda', 3, 'asdas', '1231', '10.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Masini_Dotari`
--

CREATE TABLE `Masini_Dotari` (
  `MDID` int(11) NOT NULL,
  `MasinaID` int(11) NOT NULL,
  `DotareID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Masini_Dotari`
--

INSERT INTO `Masini_Dotari` (`MDID`, `MasinaID`, `DotareID`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 2, 3),
(5, 2, 4),
(6, 3, 1),
(7, 3, 2),
(8, 4, 1),
(9, 4, 2),
(10, 4, 4),
(11, 5, 3),
(12, 6, 3),
(13, 6, 1),
(14, 7, 2),
(15, 8, 1),
(16, 8, 2),
(17, 8, 3),
(18, 8, 4),
(19, 13, 1),
(20, 13, 2),
(21, 14, 2),
(22, 14, 3),
(23, 14, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `Angajati`
--
ALTER TABLE `Angajati`
  ADD PRIMARY KEY (`AngajatID`);

--
-- Indexes for table `Clase`
--
ALTER TABLE `Clase`
  ADD PRIMARY KEY (`ClasaID`);

--
-- Indexes for table `Clienti`
--
ALTER TABLE `Clienti`
  ADD PRIMARY KEY (`ClientID`);

--
-- Indexes for table `Contracte`
--
ALTER TABLE `Contracte`
  ADD PRIMARY KEY (`ContractID`),
  ADD KEY `ClientID` (`ClientID`),
  ADD KEY `AngajatID` (`AngajatID`),
  ADD KEY `MasinaID` (`MasinaID`);

--
-- Indexes for table `Dotari`
--
ALTER TABLE `Dotari`
  ADD PRIMARY KEY (`DotareID`);

--
-- Indexes for table `Masini`
--
ALTER TABLE `Masini`
  ADD PRIMARY KEY (`MasinaID`),
  ADD KEY `Clasa` (`Clasa`);

--
-- Indexes for table `Masini_Dotari`
--
ALTER TABLE `Masini_Dotari`
  ADD PRIMARY KEY (`MDID`),
  ADD KEY `MasinaID` (`MasinaID`),
  ADD KEY `DotareID` (`DotareID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Angajati`
--
ALTER TABLE `Angajati`
  MODIFY `AngajatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Clase`
--
ALTER TABLE `Clase`
  MODIFY `ClasaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Clienti`
--
ALTER TABLE `Clienti`
  MODIFY `ClientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Contracte`
--
ALTER TABLE `Contracte`
  MODIFY `ContractID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Dotari`
--
ALTER TABLE `Dotari`
  MODIFY `DotareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Masini`
--
ALTER TABLE `Masini`
  MODIFY `MasinaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Masini_Dotari`
--
ALTER TABLE `Masini_Dotari`
  MODIFY `MDID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Contracte`
--
ALTER TABLE `Contracte`
  ADD CONSTRAINT `contracte_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `Clienti` (`ClientID`),
  ADD CONSTRAINT `contracte_ibfk_2` FOREIGN KEY (`AngajatID`) REFERENCES `Angajati` (`AngajatID`),
  ADD CONSTRAINT `contracte_ibfk_3` FOREIGN KEY (`MasinaID`) REFERENCES `Masini` (`MasinaID`);

--
-- Constraints for table `Masini`
--
ALTER TABLE `Masini`
  ADD CONSTRAINT `masini_ibfk_1` FOREIGN KEY (`Clasa`) REFERENCES `Clase` (`ClasaID`);

--
-- Constraints for table `Masini_Dotari`
--
ALTER TABLE `Masini_Dotari`
  ADD CONSTRAINT `masini_dotari_ibfk_1` FOREIGN KEY (`MasinaID`) REFERENCES `Masini` (`MasinaID`),
  ADD CONSTRAINT `masini_dotari_ibfk_2` FOREIGN KEY (`DotareID`) REFERENCES `Dotari` (`DotareID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
