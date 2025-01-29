-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2025 at 03:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_alternativu`
--

CREATE TABLE `t_alternativu` (
  `id_alt` int(11) NOT NULL,
  `naran_alt` varchar(10) NOT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_alternativu`
--

INSERT INTO `t_alternativu` (`id_alt`, `naran_alt`, `id_pessoa`) VALUES
(1, 'A1', 1),
(2, 'A2', 2),
(3, 'A3', 3),
(4, 'A4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `t_detalho_krt`
--

CREATE TABLE `t_detalho_krt` (
  `id_detalho` int(11) NOT NULL,
  `id_alt` int(11) NOT NULL,
  `id_regis` int(11) NOT NULL,
  `valors` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_detalho_krt`
--

INSERT INTO `t_detalho_krt` (`id_detalho`, `id_alt`, `id_regis`, `valors`) VALUES
(31, 1, 1, 2.98),
(32, 1, 2, 500.00),
(34, 2, 1, 2.60),
(35, 2, 2, 100.00),
(37, 3, 1, 2.68),
(38, 3, 2, 300.00),
(39, 4, 1, 3.50),
(40, 4, 2, 700.00),
(61, 1, 9, 22.00),
(62, 2, 9, 23.00),
(63, 3, 9, 21.00),
(64, 4, 9, 24.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_kasu`
--

CREATE TABLE `t_kasu` (
  `id_kasu` int(11) NOT NULL,
  `naran_kasu` varchar(255) NOT NULL,
  `status` varchar(12) NOT NULL,
  `data_registu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kasu`
--

INSERT INTO `t_kasu` (`id_kasu`, `naran_kasu`, `status`, `data_registu`) VALUES
(1, 'Bolsu Estudu ba materadu', 'Y', '2024-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `t_kriteiro`
--

CREATE TABLE `t_kriteiro` (
  `id_kriteiro` int(11) NOT NULL,
  `kriteiro` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_kriteiro`
--

INSERT INTO `t_kriteiro` (`id_kriteiro`, `kriteiro`, `status`) VALUES
(1, 'Kriteiro ba Bulsu Estudu Matradu', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `t_pessoa`
--

CREATE TABLE `t_pessoa` (
  `id_pessoa` int(11) NOT NULL,
  `naran` varchar(255) NOT NULL,
  `sexu` enum('Mane','Feto') NOT NULL,
  `data_moris` date NOT NULL,
  `id_kasu` int(11) NOT NULL,
  `abilidade` text NOT NULL,
  `nivel_edu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pessoa`
--

INSERT INTO `t_pessoa` (`id_pessoa`, `naran`, `sexu`, `data_moris`, `id_kasu`, `abilidade`, `nivel_edu`) VALUES
(1, 'Onio', 'Mane', '2024-05-10', 1, 'skjldaldasl', 'skjldaldasl'),
(2, 'Clarinho', 'Mane', '2001-05-06', 1, 'Engenhaira Infoenatica', 'Lisensatura da Engenaria Informatica'),
(3, 'Octofianos', 'Mane', '2002-05-01', 1, 'Software developer', 'Lisensatura da Engenaria Informatica'),
(4, 'Carmelita', 'Feto', '1998-05-16', 1, 'Sistema informasaun', 'Lisesensatura da edukasaun');

-- --------------------------------------------------------

--
-- Table structure for table `t_preferensia`
--

CREATE TABLE `t_preferensia` (
  `id_preferensia` int(11) NOT NULL,
  `preferensia` varchar(100) NOT NULL,
  `status` varchar(5) NOT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_preferensia`
--

INSERT INTO `t_preferensia` (`id_preferensia`, `preferensia`, `status`, `data`) VALUES
(5, 'Preferensia ba bolsu estudu mastradu', 'Y', '2024-05-16');

-- --------------------------------------------------------

--
-- Table structure for table `t_ranking`
--

CREATE TABLE `t_ranking` (
  `id_ranking` int(11) NOT NULL,
  `id_alt` int(11) NOT NULL,
  `valor` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_ranking`
--

INSERT INTO `t_ranking` (`id_ranking`, `id_alt`, `valor`) VALUES
(69, 1, 0.7143),
(70, 2, 0.8497),
(71, 3, 0.7162),
(72, 4, 0.7545);

-- --------------------------------------------------------

--
-- Table structure for table `t_registu_krt`
--

CREATE TABLE `t_registu_krt` (
  `id_reagis` int(11) NOT NULL,
  `naran_kriteiro` varchar(200) NOT NULL,
  `deskrisaun_krt` varchar(200) NOT NULL,
  `id_kriteiro` int(11) NOT NULL,
  `karakter_kriteiro` varchar(20) NOT NULL,
  `id_valor_prefe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_registu_krt`
--

INSERT INTO `t_registu_krt` (`id_reagis`, `naran_kriteiro`, `deskrisaun_krt`, `id_kriteiro`, `karakter_kriteiro`, `id_valor_prefe`) VALUES
(1, 'K1', 'Valor IPC', 1, 'Benefit', 1),
(2, 'K2', 'Vensimentu I/A', 1, 'Cost', 2),
(9, 'K3', 'Idade', 1, 'Cost', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_somatorio`
--

CREATE TABLE `t_somatorio` (
  `id_soma` int(11) NOT NULL,
  `id_alt` int(11) NOT NULL,
  `id_resgistu_krt` int(11) NOT NULL,
  `valor_soma` decimal(10,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_somatorio`
--

INSERT INTO `t_somatorio` (`id_soma`, `id_alt`, `id_resgistu_krt`, `valor_soma`) VALUES
(203, 1, 1, 0.4257),
(204, 1, 2, 0.0500),
(205, 1, 9, 0.2386),
(206, 2, 1, 0.3714),
(207, 2, 2, 0.2500),
(208, 2, 9, 0.2283),
(209, 3, 1, 0.3829),
(210, 3, 2, 0.0833),
(211, 3, 9, 0.2500),
(212, 4, 1, 0.5000),
(213, 4, 2, 0.0357),
(214, 4, 9, 0.2188);

-- --------------------------------------------------------

--
-- Table structure for table `t_subkriteria`
--

CREATE TABLE `t_subkriteria` (
  `id_sub` int(11) NOT NULL,
  `subkriteria` varchar(200) NOT NULL,
  `valor_sub_krt` int(11) NOT NULL,
  `id_registu_krt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_valor_pre`
--

CREATE TABLE `t_valor_pre` (
  `id_valor` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `id_preferensia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_valor_pre`
--

INSERT INTO `t_valor_pre` (`id_valor`, `valor`, `id_preferensia`) VALUES
(1, 50, 5),
(2, 25, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_alternativu`
--
ALTER TABLE `t_alternativu`
  ADD PRIMARY KEY (`id_alt`),
  ADD KEY `id_pessoa` (`id_pessoa`);

--
-- Indexes for table `t_detalho_krt`
--
ALTER TABLE `t_detalho_krt`
  ADD PRIMARY KEY (`id_detalho`),
  ADD KEY `id_regis` (`id_regis`),
  ADD KEY `id_alt` (`id_alt`);

--
-- Indexes for table `t_kasu`
--
ALTER TABLE `t_kasu`
  ADD PRIMARY KEY (`id_kasu`);

--
-- Indexes for table `t_kriteiro`
--
ALTER TABLE `t_kriteiro`
  ADD PRIMARY KEY (`id_kriteiro`);

--
-- Indexes for table `t_pessoa`
--
ALTER TABLE `t_pessoa`
  ADD PRIMARY KEY (`id_pessoa`),
  ADD KEY `id_kasu` (`id_kasu`);

--
-- Indexes for table `t_preferensia`
--
ALTER TABLE `t_preferensia`
  ADD PRIMARY KEY (`id_preferensia`);

--
-- Indexes for table `t_ranking`
--
ALTER TABLE `t_ranking`
  ADD PRIMARY KEY (`id_ranking`),
  ADD KEY `id_alt` (`id_alt`);

--
-- Indexes for table `t_registu_krt`
--
ALTER TABLE `t_registu_krt`
  ADD PRIMARY KEY (`id_reagis`),
  ADD KEY `id_kriteiro` (`id_kriteiro`),
  ADD KEY `id_valor_prefe` (`id_valor_prefe`);

--
-- Indexes for table `t_somatorio`
--
ALTER TABLE `t_somatorio`
  ADD PRIMARY KEY (`id_soma`),
  ADD KEY `id_resgistu_krt` (`id_resgistu_krt`),
  ADD KEY `id_alt` (`id_alt`);

--
-- Indexes for table `t_subkriteria`
--
ALTER TABLE `t_subkriteria`
  ADD PRIMARY KEY (`id_sub`),
  ADD KEY `id_registu_krt` (`id_registu_krt`);

--
-- Indexes for table `t_valor_pre`
--
ALTER TABLE `t_valor_pre`
  ADD PRIMARY KEY (`id_valor`),
  ADD KEY `id_preferensia` (`id_preferensia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_alternativu`
--
ALTER TABLE `t_alternativu`
  MODIFY `id_alt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_detalho_krt`
--
ALTER TABLE `t_detalho_krt`
  MODIFY `id_detalho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `t_kasu`
--
ALTER TABLE `t_kasu`
  MODIFY `id_kasu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_kriteiro`
--
ALTER TABLE `t_kriteiro`
  MODIFY `id_kriteiro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pessoa`
--
ALTER TABLE `t_pessoa`
  MODIFY `id_pessoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_preferensia`
--
ALTER TABLE `t_preferensia`
  MODIFY `id_preferensia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `t_ranking`
--
ALTER TABLE `t_ranking`
  MODIFY `id_ranking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `t_registu_krt`
--
ALTER TABLE `t_registu_krt`
  MODIFY `id_reagis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_somatorio`
--
ALTER TABLE `t_somatorio`
  MODIFY `id_soma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `t_subkriteria`
--
ALTER TABLE `t_subkriteria`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_valor_pre`
--
ALTER TABLE `t_valor_pre`
  MODIFY `id_valor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_alternativu`
--
ALTER TABLE `t_alternativu`
  ADD CONSTRAINT `t_alternativu_ibfk_1` FOREIGN KEY (`id_pessoa`) REFERENCES `t_pessoa` (`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_detalho_krt`
--
ALTER TABLE `t_detalho_krt`
  ADD CONSTRAINT `t_detalho_krt_ibfk_1` FOREIGN KEY (`id_regis`) REFERENCES `t_registu_krt` (`id_reagis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_detalho_krt_ibfk_2` FOREIGN KEY (`id_alt`) REFERENCES `t_alternativu` (`id_alt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_pessoa`
--
ALTER TABLE `t_pessoa`
  ADD CONSTRAINT `t_pessoa_ibfk_1` FOREIGN KEY (`id_kasu`) REFERENCES `t_kasu` (`id_kasu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_ranking`
--
ALTER TABLE `t_ranking`
  ADD CONSTRAINT `t_ranking_ibfk_1` FOREIGN KEY (`id_alt`) REFERENCES `t_alternativu` (`id_alt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_registu_krt`
--
ALTER TABLE `t_registu_krt`
  ADD CONSTRAINT `t_registu_krt_ibfk_1` FOREIGN KEY (`id_kriteiro`) REFERENCES `t_kriteiro` (`id_kriteiro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_registu_krt_ibfk_2` FOREIGN KEY (`id_valor_prefe`) REFERENCES `t_valor_pre` (`id_valor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_somatorio`
--
ALTER TABLE `t_somatorio`
  ADD CONSTRAINT `t_somatorio_ibfk_1` FOREIGN KEY (`id_resgistu_krt`) REFERENCES `t_registu_krt` (`id_reagis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_somatorio_ibfk_2` FOREIGN KEY (`id_alt`) REFERENCES `t_alternativu` (`id_alt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_subkriteria`
--
ALTER TABLE `t_subkriteria`
  ADD CONSTRAINT `t_subkriteria_ibfk_1` FOREIGN KEY (`id_registu_krt`) REFERENCES `t_registu_krt` (`id_reagis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_valor_pre`
--
ALTER TABLE `t_valor_pre`
  ADD CONSTRAINT `t_valor_pre_ibfk_1` FOREIGN KEY (`id_preferensia`) REFERENCES `t_preferensia` (`id_preferensia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
