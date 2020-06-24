-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 24/06/2020 às 15:06
-- Versão do servidor: 5.7.30
-- Versão do PHP: 7.4.6
CREATE DATABASE  IF NOT EXISTS `app_development`;
USE `app_development`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `app_development`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `title` varchar(245) NOT NULL,
  `description` varchar(245) NOT NULL,
  `img_url` varchar(245) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int(11) NOT NULL COMMENT 'chave estrangeira referente ao users id'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(245) NOT NULL,
  `email` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);
COMMIT;

LOCK TABLES `users` WRITE;
INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Diego Dario', 'diegodario88@gmail.com', '6d6354ece40846bf7fca65dfabd5d9d4'),
(2, 'Leonel Messi', 'leonel.messi@barcelona.com.es', 'd94d81a75c0e8c0aef4e46a08206426b'),
(3, 'Fernando Carvalho', 'fernando.carvalho@unisul.com.br', 'cebdd715d4ecaafee8f147c2e85e0754'),
(4, 'Christiano Ronaldo', 'christiano.ronaldo@juventus.com.it', '22e4a29fca09d9a15981388cddaed67a'),
(5, 'Paulo Isidoro', 'paulo.isidoro@hotmail.com', 'dd41cb18c930753cbecf993f828603dc'),
(6, 'admin', 'admin@admin.adm', '21232f297a57a5a743894a0e4a801fc3'),
(7, 'Ricardo Almeida', 'ricardo.almeida@prado.net', '6720720054e9d24fbf6c20a831ff287e'),
(8, 'Emanuelle Silva Soldado Américo Romão', 'emanuelle@pop.com', '9d61e037ecd00b1005f3384d54fdcaf2'),
(9, 'Henrique dos Reis Amélio Bastião', 'henrique@repes.com', '83a6c8fb8e054de73cb4f76c3c6f9701');
UNLOCK TABLES;

LOCK TABLES `posts` WRITE;
INSERT INTO `posts` (`post_id`, `title`, `description`, `img_url`, `author_id`) VALUES
(1, 'Test de emprego', 'participando de um teste', 'https://carreirasolo.org/wp-content/uploads/2017/10/man-on-mountain-victory-SLDR.jpg', 1),
(2, 'Titulos', 'foi facil demais ganhar do real','img', 2),
(3, 'External HDs', 'Hds para backup', 'img', 6);
UNLOCK TABLES;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;