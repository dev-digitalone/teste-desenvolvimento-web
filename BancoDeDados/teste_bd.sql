-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Jun-2020 às 04:58
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste_bd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `publicacoes`
--

CREATE TABLE `publicacoes` (
  `id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `nomeUsuario` varchar(255) NOT NULL,
  `data` timestamp NOT NULL DEFAULT current_timestamp(),
  `idUsuario` int(255) NOT NULL,
  `editado` int(11) NOT NULL,
  `fotoAnexo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `publicacoes`
--

INSERT INTO `publicacoes` (`id`, `titulo`, `conteudo`, `nomeUsuario`, `data`, `idUsuario`, `editado`, `fotoAnexo`) VALUES
(1, 'Titulo teste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque viverra vestibulum purus, at rutrum dolor. Quisque ut rutrum odio. Curabitur vitae felis nec justo malesuada sagittis porttitor congue augue. Morbi ut molestie massa, vel interdum neque. ', 'Mateus Sanches', '2020-06-29 01:56:14', 1, 1, 'anexo-1.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `foto`) VALUES
(1, 'Mateus Chances', 'mateusan97@gmail.com', '8f9cf3f5789e16124f38936954a98668', 'user-1.jpg'),
(2, 'Mateus Sanches', 'mat_sanc@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `publicacoes`
--
ALTER TABLE `publicacoes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
