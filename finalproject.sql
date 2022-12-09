-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 10:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$hvnrmm3FEJL/SKBnsNByGuRDrhAFLLAOBDCklmDKZlG8Cf4whFmDi');

-- --------------------------------------------------------

--
-- Table structure for table `ankesat`
--

CREATE TABLE `ankesat` (
  `id` int(11) NOT NULL,
  `emri` varchar(100) NOT NULL,
  `mbiemri` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ankesa` varchar(350) NOT NULL,
  `permisimi` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ankesat`
--

INSERT INTO `ankesat` (`id`, `emri`, `mbiemri`, `numri_personal`, `email`, `ankesa`, `permisimi`) VALUES
(11, 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', 'Sjellje joprofesionale nga stafi mjeksor', '');

-- --------------------------------------------------------

--
-- Table structure for table `departamentet`
--

CREATE TABLE `departamentet` (
  `id` int(11) NOT NULL,
  `departamenti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departamentet`
--

INSERT INTO `departamentet` (`id`, `departamenti`) VALUES
(1, 'Kirurgji'),
(2, 'Neurologji'),
(3, 'Stomatologji'),
(4, 'Kardiologji'),
(7, 'Infermieri'),
(8, 'Pediatri'),
(11, 'Pulmologji');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_personal_info`
--

CREATE TABLE `doctor_personal_info` (
  `id` int(11) NOT NULL,
  `fullName` varchar(100) NOT NULL,
  `departamenti` varchar(100) NOT NULL,
  `gjinia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `biografia` varchar(350) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `telefoni` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_personal_info`
--

INSERT INTO `doctor_personal_info` (`id`, `fullName`, `departamenti`, `gjinia`, `email`, `biografia`, `foto`, `telefoni`, `username`, `password`) VALUES
(5, 'Oliver Johnson', 'Kardiologji', 'Mashkull', 'oliverJohnson@gmail.com', 'Shkollen e mesme e kreu ne Gjimnazin e shkencave natyrore Sami Frasheri. Studimet e nivelit bachelor i kreu ne Universitetin e Prishtines, ndersa masterin e kreu ne nje universitet perstigjioz ne Zvicer.', 'IMG-636cb0b10c5bf2.40508731.webp', '044753444', 'oliverJohnson', '$2y$10$pLv7bkVj6w.BnHaxAAzTdedEkJ2Cr9hykpYX2XFAoTT3CRwDN2LXa'),
(6, 'Emma  Williams', 'Stomatologji', 'Femer', 'emmaWilliams@gmail.com', 'Shkollen e mesme e kreu ne Gjimnazin e shkencave natyrore Sami Frasheri. Studimet e nivelit bachelor i kreu ne Universitetin e Prishtines.', 'IMG-636cb13c833aa2.31386692.webp', '045789159', 'emmaWilliams', '$2y$10$wDW8RlFIyIvLjUnhHO/ugOmDauh/cbn7.IbZHpXFHq3wgnuALisF.'),
(7, 'Charlotte  Brown', 'Pediatri', 'Femer', 'charlotteBrown@gmail.com', 'Shkollen e mesme e kreu ne Gjimnazin e shkencave natyrore Xhevdet Doda. Studimet e nivelit bachelor i kreu ne Universitetin e Prishtines, ndersa masterin e kreu ne nje universitet perstigjioz ne Austri.', 'IMG-636cb11f8751d7.27283875.jpg', '045789126', 'charlotteBrown', '$2y$10$L5Wb2ISBFFT8/YOgZXHYgeAZRUG27vAWhKS3QjyHCQGwlcDt3VGDG'),
(8, 'Emma Smith', 'Neurologji', 'Femer', 'emmaSmith@gmail.com', 'Shkollen e mesme e kreu ne Gjimnazin e shkencave natyrore Sami Frasheri. Studimet e nivelit bachelor i kreu ne Universitetin e Prishtines, ndersa masterin e kreu ne nje universitet perstigjioz ne Austri.', 'IMG-636cb1099cdde6.41963337.png', '045879996', 'emmaSmith', '$2y$10$yVai3Nv28YSFVYp0SO/rVuICvrrBOY9UMdWw3oP/qCH4TWuFjieCy'),
(10, 'Liam Smith', 'Kirurgji', 'Mashkull', 'liamSmith@gmail.com', 'Shkollen e mesme e kreu ne SHML Dr.Ali Sokoli. Studimet e nivelit bachelor i kreu ne Universitetin e Prishtines, ndersa masterin e kreu ne nje universitet perstigjioz ne Gjermani.', 'IMG-636cb1513422b8.85478755.webp', '045895753', 'liamSmith', '$2y$10$i3DMjwnnzRYRJTYu0f6IYuLYaWQwlNgXxhjCfScHfB6.gQhpYXLF6');

-- --------------------------------------------------------

--
-- Table structure for table `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `foto_src` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeria`
--

INSERT INTO `galeria` (`id`, `foto_src`) VALUES
(1, 'IMG-635468cf3fa1b7.72764286.jpg'),
(2, 'IMG-6354690d693763.22222472.jpg'),
(3, 'IMG-63546911014ca7.57409741.jpg'),
(4, 'IMG-635469156f2f58.96223814.png'),
(5, 'IMG-6361668e607565.79647024.jpg'),
(6, 'IMG-63546a751a8d20.56349852.jpg'),
(7, 'IMG-636166c0775f62.29488908.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `historia_e_termineve`
--

CREATE TABLE `historia_e_termineve` (
  `id` int(11) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `departamenti` varchar(100) NOT NULL,
  `pacienti` varchar(100) NOT NULL,
  `numri_personal` varchar(10) NOT NULL,
  `email_pacientit` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `diagnoza` varchar(250) NOT NULL,
  `recepti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historia_e_termineve`
--

INSERT INTO `historia_e_termineve` (`id`, `doktori`, `departamenti`, `pacienti`, `numri_personal`, `email_pacientit`, `data`, `ora`, `diagnoza`, `recepti`) VALUES
(59, 'Liam Smith', 'Kirurgji', 'Leart Ramadani', '1466408468', 'leart.ramadani06@gmail.com', '2022-11-30', '09:00:00', 'lorem ipsum', 'lorem ipsum'),
(60, 'Emma Smith', 'Neurologji', 'Leart Ramadani', '1466408468', 'leart.ramadani06@gmail.com', '2022-11-30', '12:00:00', 'lorem ipsum', 'lorem ipsum'),
(61, 'Charlotte  Brown', 'Pediatri', 'Leart Ramadani', '1466408468', 'leart.ramadani06@gmail.com', '2022-11-30', '08:00:00', 'lorem ipsum', 'lorem ipsum'),
(62, 'Oliver Johnson', 'Kardiologji', 'Leart Ramadani', '1466408468', 'leart.ramadani06@gmail.com', '2022-11-30', '08:00:00', 'lorem ipsum', 'lorem ipsum'),
(63, 'Emma  Williams', 'Stomatologji', 'Leart Ramadani', '1466408468', 'leart.ramadani06@gmail.com', '2022-11-30', '10:00:00', 'lorem ipsum', 'lorem ipsum');

-- --------------------------------------------------------

--
-- Table structure for table `kerkesatanulimit`
--

CREATE TABLE `kerkesatanulimit` (
  `id` int(11) NOT NULL,
  `emri_pacientit` varchar(100) NOT NULL,
  `mbiemri_pacientit` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoni` varchar(100) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `departamenti` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `arsyeja_anulimit` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kerkesatanulimit`
--

INSERT INTO `kerkesatanulimit` (`id`, `emri_pacientit`, `mbiemri_pacientit`, `numri_personal`, `email`, `telefoni`, `doktori`, `departamenti`, `data`, `ora`, `arsyeja_anulimit`) VALUES
(35, 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '044489949', 'Liam Smith', 'Kirurgji', '2022-11-30', '09:00:00', 'Arsyeje personale.');

-- --------------------------------------------------------

--
-- Table structure for table `orari`
--

CREATE TABLE `orari` (
  `id` int(11) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `departamenti` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `nga_ora` time NOT NULL,
  `deri_oren` time NOT NULL,
  `kohezgjatja` int(11) NOT NULL,
  `zene_deri` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orari`
--

INSERT INTO `orari` (`id`, `doktori`, `departamenti`, `data`, `nga_ora`, `deri_oren`, `kohezgjatja`, `zene_deri`) VALUES
(149, 'Oliver Johnson', 'Kardiologji', '2022-11-30', '08:00:00', '16:00:00', 20, '08:40:00'),
(150, 'Emma  Williams', 'Stomatologji', '2022-11-30', '10:00:00', '18:00:00', 30, '11:00:00'),
(151, 'Charlotte  Brown', 'Pediatri', '2022-11-30', '08:00:00', '16:00:00', 20, '08:40:00'),
(152, 'Emma Smith', 'Neurologji', '2022-11-30', '12:00:00', '18:00:00', 20, '12:40:00'),
(153, 'Liam Smith', 'Kirurgji', '2022-11-30', '09:00:00', '17:00:00', 15, '09:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `id` int(11) NOT NULL,
  `emri` varchar(100) NOT NULL,
  `mbiemri` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `gjinia` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefoni` varchar(100) NOT NULL,
  `ditlindja` date NOT NULL,
  `adresa` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `verification_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`id`, `emri`, `mbiemri`, `numri_personal`, `gjinia`, `email`, `telefoni`, `ditlindja`, `adresa`, `username`, `password`, `verification_status`) VALUES
(21, 'Leart', 'Ramadani', 1466408468, 'Mashkull', 'leart.ramadani06@gmail.com', '044489949', '2006-05-11', 'Agron Rrahmani', 'leartRamadani', '$2y$10$t7nnOHmaqzU3/x63CGG/o.78/8BfOHNUm22QVEqNT4.sNGSoZ4GiO', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `terminet`
--

CREATE TABLE `terminet` (
  `id` int(11) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `emri_pacientit` varchar(100) NOT NULL,
  `mbiemri_pacientit` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `email_pacientit` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminet`
--

INSERT INTO `terminet` (`id`, `doktori`, `emri_pacientit`, `mbiemri_pacientit`, `numri_personal`, `email_pacientit`, `data`, `ora`) VALUES
(477, 'Oliver Johnson', 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '2022-11-30', '08:20:00'),
(478, 'Emma  Williams', 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '2022-11-30', '10:30:00'),
(479, 'Charlotte  Brown', 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '2022-11-30', '08:20:00'),
(480, 'Emma Smith', 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '2022-11-30', '12:20:00'),
(481, 'Liam Smith', 'Leart', 'Ramadani', 1466408468, 'leart.ramadani06@gmail.com', '2022-11-30', '09:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `terminet_e_dyta`
--

CREATE TABLE `terminet_e_dyta` (
  `id` int(11) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `emri_pacientit` varchar(100) NOT NULL,
  `mbiemri_pacientit` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `email_pacientit` varchar(100) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `terminet_e_mia`
--

CREATE TABLE `terminet_e_mia` (
  `id` int(11) NOT NULL,
  `emri_pacientit` varchar(100) NOT NULL,
  `mbiemri_pacientit` varchar(100) NOT NULL,
  `numri_personal` int(10) NOT NULL,
  `doktori` varchar(100) NOT NULL,
  `departamenti` varchar(100) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `terminet_e_mia`
--

INSERT INTO `terminet_e_mia` (`id`, `emri_pacientit`, `mbiemri_pacientit`, `numri_personal`, `doktori`, `departamenti`, `data`, `ora`) VALUES
(371, 'Leart', 'Ramadani', 1466408468, 'Oliver Johnson', 'Kardiologji', '2022-11-30', '08:20:00'),
(372, 'Leart', 'Ramadani', 1466408468, 'Emma  Williams', 'Stomatologji', '2022-11-30', '10:30:00'),
(373, 'Leart', 'Ramadani', 1466408468, 'Charlotte  Brown', 'Pediatri', '2022-11-30', '08:20:00'),
(374, 'Leart', 'Ramadani', 1466408468, 'Emma Smith', 'Neurologji', '2022-11-30', '12:20:00'),
(375, 'Leart', 'Ramadani', 1466408468, 'Liam Smith', 'Kirurgji', '2022-11-30', '09:15:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ankesat`
--
ALTER TABLE `ankesat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departamentet`
--
ALTER TABLE `departamentet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_personal_info`
--
ALTER TABLE `doctor_personal_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historia_e_termineve`
--
ALTER TABLE `historia_e_termineve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kerkesatanulimit`
--
ALTER TABLE `kerkesatanulimit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orari`
--
ALTER TABLE `orari`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminet`
--
ALTER TABLE `terminet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminet_e_dyta`
--
ALTER TABLE `terminet_e_dyta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminet_e_mia`
--
ALTER TABLE `terminet_e_mia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ankesat`
--
ALTER TABLE `ankesat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `departamentet`
--
ALTER TABLE `departamentet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doctor_personal_info`
--
ALTER TABLE `doctor_personal_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `historia_e_termineve`
--
ALTER TABLE `historia_e_termineve`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `kerkesatanulimit`
--
ALTER TABLE `kerkesatanulimit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orari`
--
ALTER TABLE `orari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `patient_table`
--
ALTER TABLE `patient_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `terminet`
--
ALTER TABLE `terminet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=482;

--
-- AUTO_INCREMENT for table `terminet_e_dyta`
--
ALTER TABLE `terminet_e_dyta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `terminet_e_mia`
--
ALTER TABLE `terminet_e_mia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=376;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
