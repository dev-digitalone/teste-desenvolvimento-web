-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 24/06/2020 às 15:06
-- Versão do servidor: 5.7.30
-- Versão do PHP: 7.4.6
CREATE DATABASE IF NOT EXISTS `app_development`;

USE `app_development`;

SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  AUTOCOMMIT = 0;

START TRANSACTION;

SET
  time_zone = "+00:00";

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
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

-- --------------------------------------------------------
--
-- Estrutura para tabela `users`
--
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(245) NOT NULL,
  `email` varchar(245) NOT NULL,
  `password` varchar(245) NOT NULL,
  `avatar` varchar(245) NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

DROP TABLE IF EXISTS `token_users`;

CREATE TABLE `token_users` (
  `token_id` int(11) NOT NULL,
  `email` varchar(245) NOT NULL,
  `token` varchar(245) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Índices de tabelas apagadas
--
--
-- Índices de tabela `posts`
--
ALTER TABLE
  `posts`
ADD
  PRIMARY KEY (`post_id`),
ADD
  KEY `author_id` (`author_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--
--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE
  `posts`
MODIFY
  `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE
  `users`
MODIFY
  `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para dumps de tabelas
--
--
-- Restrições para tabelas `posts`
--
ALTER TABLE
  `posts`
ADD
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`user_id`);

COMMIT;

LOCK TABLES `users` WRITE;

INSERT INTO
  `users` (`user_id`, `name`, `email`, `password`, `avatar`)
VALUES
  (
    1,
    'Diego Dario',
    'diegodario88@gmail.com',
    '6d6354ece40846bf7fca65dfabd5d9d4',
    'https://icons.iconarchive.com/icons/diversity-avatars/avatars/512/robot-02-icon.png'
  ),
  (
    2,
    'Leonel Messi',
    'leonel.messi@barcelona.com.es',
    'd94d81a75c0e8c0aef4e46a08206426b',
    'https://i4.sndcdn.com/avatars-000431929956-oyygxy-t500x500.jpg'
  ),
  (
    3,
    'Fernando Carvalho',
    'fernando.carvalho@unisul.com.br',
    'cebdd715d4ecaafee8f147c2e85e0754',
    'https://pbs.twimg.com/profile_images/969073897189523456/rSuiu_Hr.jpg'
  ),
  (
    4,
    'Christiano Ronaldo',
    'christiano.ronaldo@juventus.com.it',
    '22e4a29fca09d9a15981388cddaed67a',
    'https://www.asbeiras.pt/wp-content/uploads/2019/11/NINTCHDBPICT000419417040-e1531424441631.jpg'
  ),
  (
    5,
    'Paulo Isidoro',
    'paulo.isidoro@hotmail.com',
    'dd41cb18c930753cbecf993f828603dc',
    'https://www.seven-wines.com/websites/se-winery//assets/images/avatar-01.jpg'
  ),
  (
    6,
    'admin',
    'admin@admin.adm',
    '21232f297a57a5a743894a0e4a801fc3',
    'https://relayfm.s3.amazonaws.com/uploads/user/avatar/71/user_avatar_Davidsparks_artwork.png'
  ),
  (
    7,
    'Ricardo Almeida',
    'ricardo.almeida@prado.net',
    '6720720054e9d24fbf6c20a831ff287e',
    'https://linktopin.com/assets/images/avatars/random-avatar2.jpg'
  ),
  (
    8,
    'Emanuelle Silva Soldado Américo Romão',
    'emanuelle@pop.com',
    '9d61e037ecd00b1005f3384d54fdcaf2',
    'https://i.pinimg.com/236x/a1/cc/de/a1ccdec6165633f43e0afd8df301a9c5--new-looks-people.jpg'
  ),
  (
    9,
    'Henrique dos Reis Amélio Bastião',
    'henrique@repes.com',
    '83a6c8fb8e054de73cb4f76c3c6f9701',
    'https://linktopin.com/assets/images/avatars/random-avatar3.jpg'
  );

UNLOCK TABLES;

LOCK TABLES `posts` WRITE;

INSERT INTO
  `posts` (
    `post_id`,
    `title`,
    `description`,
    `img_url`,
    `author_id`
  )
VALUES
  (
    1,
    'Test de emprego',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://www.hostinger.com.br/tutoriais/wp-content/uploads/sites/12/2018/05/20-sites-para-aprender-como-programar-de-gra%C3%A7a.png',
    1
  ),
  (
    2,
    'Steam sales is open....',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://gamehall.com.br/wp-content/uploads/2019/05/steam-gabe.jpg',
    6
  ),
  (
    3,
    'Titulo Easy',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://www.lance.com.br/files/article_main/uploads/2019/04/27/5cc4c4c67f26f.jpeg',
    2
  ),
  (
    4,
    'Titular eu?',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://conteudo.imguol.com.br/c/esporte/33/2015/09/12/lionel-messi-comeca-classico-contra-o-atletico-de-madri-no-banco-do-barcelona-1442084999039_615x300.jpg',
    2
  ),
  (
    5,
    'External HDs',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'http://lorempixel.com/600/400/technics',
    6
  ),
  (
    6,
    'Vai chover',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://www.bonde.com.br/img/bondenews/2018/10/img_1_3_4468.jpg',
    3
  ),
  (
    7,
    'SSD VS M2',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://i.ytimg.com/vi/V3AMz-xZ2VM/maxresdefault.jpg',
    5
  ),
  (
    8,
    'AMD OWNA INTEL!',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://adrenaline.com.br/uploads/chamadas/amd-agesa-update-ryzen-3-3300x-3100-0.jpg',
    7
  ),
  (
    9,
    'Existe Alguem Melhor que eu?',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://www.abrale.org.br/revista-online/wp-content/uploads/2018/07/imagem-mulher-flores.jpg',
    8
  ),
  (
    10,
    'Aquela vez que perdi para o Cafu',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'https://www.fcbarcelonanoticias.com/uploads/s1/40/48/75/noticia-267549_4_641x361.jpeg',
    4
  ),
  (
    11,
    'Fazendo.....',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum iure pariatur repellat quasi earum deleniti explicabo adipisci accusantium distinctio reprehenderit. Quo natus dolorum enim blanditiis aliquid corrupti at, delectus quod.',
    'http://lorempixel.com/600/400/abstract',
    9
  );

UNLOCK TABLES;