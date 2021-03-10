-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.5.8-MariaDB - Arch Linux
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para sistema_publicacoes_teste
CREATE DATABASE IF NOT EXISTS `sistema_publicacoes_teste` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `sistema_publicacoes_teste`;

-- Copiando estrutura para tabela sistema_publicacoes_teste.Posts
CREATE TABLE IF NOT EXISTS `Posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_url` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `author` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `author` (`author`),
  CONSTRAINT `Posts_ibfk_1` FOREIGN KEY (`author`) REFERENCES `Users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sistema_publicacoes_teste.Posts: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `Posts` DISABLE KEYS */;
INSERT INTO `Posts` (`id`, `title`, `description`, `img_url`, `created_at`, `author`) VALUES
	(1, 'materia_q', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nulla eros. Nullam commodo lobortis vulputate.', 'https%3A%2F%2Fwww.w3schools.com%2Fcss%2Fparis.jpg', '2021-03-09 23:48:17', 1),
	(2, 'img2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nulla eros. Nullam commodo lobortis vulputate.', 'https%3A%2F%2Fwww.w3schools.com%2Fcss%2Fparis.jpg', '2021-03-09 19:16:48', 1),
	(8, 'materia_editada3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non nulla eros. Nullam commodo lobortis vulputate.', 'https%3A%2F%2Fwww.w3schools.com%2Fcss%2Fparis.jpg', '2021-03-09 23:48:03', 1),
	(15, 'dsdasda', 'dsadas', 'https%3A%2F%2Fwww.w3schools.com%2Fcss%2Fparis.jpg', '2021-03-09 23:47:48', 21);
/*!40000 ALTER TABLE `Posts` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_publicacoes_teste.Users
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sistema_publicacoes_teste.Users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` (`id`, `name`, `email`, `password`) VALUES
	(1, 'Geovane', 'geovane.c.oliveira.ldr@gmail.com', 'f15d2e0d997e9aba46798686e28cd36ec462ae45889ce3eb2ceadfa028ca8d60366dc55aecfeadf50fd3958cf494338b197c618a5aeec5c72546d91a1c23ac2diAQGaTGBlou4nt95a/jVm+1KRA74WsP6tUCULKwQjuM='),
	(21, 'fulano de tal', 'fulano2@teste.com', '7367ee122c025a0552f614bec125ac0b6feac12fa626643cae371cd6dec68bf50df12ce4ca591bae1ec223f7eb57acd3065dd3f8f4a15d211b881c568c716758QV8slbym+WktfEPWZxx3rm1MRaf5KuEHO5/dnE01ylM='),
	(23, 'cicrano', 'cicrano@email.com', '4871cac8c49238d157d205d470450c018570d17c46fa3d0bc7d3e1c3c8b51a3e0309fa374bafb2c3e3306eeac91127fdcee99dbea2b7e3e149741f9fd464bec1Vpa3AJH6erTPhME+xjp+GI0ZleF2/9vR7ucre5gNkKY='),
	(24, 'beltrano', 'beltrano@teste.com', '131183d61dfd4de1a7ab201236b673cc7e02127b1a5db189e6167dc87e096a45507a885048ad01131d34d0c8a4ca917129f51cd4c5522d5621859f175ecb502eNl59XdyJ6YRDha81l8ooVugEiLjPrUV+IL8ssm2ASKE=');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;

-- Copiando estrutura para tabela sistema_publicacoes_teste.Verification_Keys
CREATE TABLE IF NOT EXISTS `Verification_Keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(245) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_user_id_fk` (`user_id`),
  CONSTRAINT `post_user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `Users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sistema_publicacoes_teste.Verification_Keys: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `Verification_Keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `Verification_Keys` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
