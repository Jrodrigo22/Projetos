-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30/03/2025 às 16:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbpokemon`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(30) DEFAULT NULL,
  `TIPO_1` varchar(30) DEFAULT NULL,
  `TIPO_2` varchar(30) DEFAULT NULL,
  `HABITAT` varchar(30) DEFAULT NULL,
  `COR` varchar(50) DEFAULT NULL,
  `EVOLUCAO` int(1) DEFAULT NULL,
  `ALTURA` float DEFAULT NULL,
  `PESO` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pokemon`
--

INSERT INTO `pokemon` (`ID`, `NOME`, `TIPO_1`, `TIPO_2`, `HABITAT`, `COR`, `EVOLUCAO`, `ALTURA`, `PESO`) VALUES
(1, 'Geodude', 'Pedra', 'Terra', 'Montanha', 'Cinzento', 1, 0.4, 20),
(2, 'Diglett', 'Terra', 'Não tens', 'Caverna', 'Castanho', 1, 0.2, 0.8),
(3, 'Abra', 'Psíquico', 'Não tens', 'Urbano', 'Amarelo', 1, 0.9, 19.5),
(4, 'Lapras', 'Água', 'Gelo', 'Mar', 'Azul', 1, 2.5, 220),
(5, 'Staryu', 'Água', 'Não tens', 'Mar', 'Castanho, Amarelo', 1, 0.8, 34.5),
(6, 'Dratini', 'Dragão', 'Não tens', 'Borda de água', 'Azul', 1, 1.8, 3.3),
(7, 'Bulbasaur', 'Grama', 'Veneno', 'Prados', 'Verde', 1, 0.7, 6.9),
(8, 'Squirtle', 'Água', 'Não tens', 'Borda de água', 'Azul', 1, 0.5, 9),
(9, 'Charmander', 'Fogo', 'Não tens', 'Montanha', 'Laranja', 1, 0.6, 8.5),
(10, 'Weedle', 'Inseto', 'Veneno', 'Floresta', 'Castanho', 1, 0.3, 3.2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
