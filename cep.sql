-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Fev-2019 às 14:03
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cep`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cep_tab`
--

CREATE TABLE `cep_tab` (
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(45) NOT NULL,
  `complemento` varchar(45) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `localidade` varchar(45) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `unidade` varchar(20) NOT NULL,
  `ibge` varchar(20) NOT NULL,
  `guia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cep_tab`
--

INSERT INTO `cep_tab` (`cep`, `logradouro`, `complemento`, `bairro`, `localidade`, `uf`, `unidade`, `ibge`, `guia`) VALUES
('', '', '', '', '', '', '', '', ''),
('83301010', 'Avenida GetÃºlio Vargas', '', 'Centro', 'Piraquara', 'PR', '', '4119509', ''),
('83304090', 'Avenida AntÃ´nio Meireles Sobrinho', '', 'Planta Meireles Sobrinho', 'Piraquara', 'PR', '', '4119509', ''),
('83304270', 'Rua da Paz', '', 'Planta Deodoro', 'Piraquara', 'PR', '', '4119509', ''),
('83323125', 'Rodovia JoÃ£o Leopoldo Jacomel', 'de 12637 ao fim - lado Ã­mpar', 'EstÃ¢ncia Pinhais', 'Pinhais', 'PR', '', '4119152', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cep_tab`
--
ALTER TABLE `cep_tab`
  ADD PRIMARY KEY (`cep`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
