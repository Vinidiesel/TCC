CREATE DATABASE ESPORTS DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ESPORTS;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Out-2021 às 00:03
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `esports`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOME` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOME`) VALUES
(1, 'LEAGUE OF LEGENDS'),
(2, 'RAINBOW SIX'),
(3, 'FREE FIRE'),
(4, 'FORTNITE'),
(5, 'COUNTER STRIKE GLOBAL OFENSIVE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `ID_MENSAGEM` int(11) NOT NULL,
  `TEXTO` text NOT NULL,
  `DATA_ENVIO` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`ID_MENSAGEM`, `TEXTO`, `DATA_ENVIO`, `ID_USUARIO`) VALUES
(81, 'ola', '2021-10-14 20:23:50', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `ID_NOTICIA` int(11) NOT NULL,
  `TITULO` varchar(200) NOT NULL,
  `DESCRICAO` varchar(250) NOT NULL,
  `TEXTO` text NOT NULL,
  `DIA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `IMAGEM` varchar(255) NOT NULL,
  `CATEGORIA` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`ID_NOTICIA`, `TITULO`, `DESCRICAO`, `TEXTO`, `DIA`, `IMAGEM`, `CATEGORIA`, `ID_USUARIO`) VALUES
(1, 'ola', ' sei la', ' sei la', '2021-10-06 21:04:02', 'Bungee-Jumping.jpg', 1, 1),
(2, 'ola', 'jbsdjs', 'dfsdfsdf', '2021-10-14 20:36:17', '', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagem`
--

CREATE TABLE `postagem` (
  `ID_POSTAGEM` int(11) NOT NULL,
  `MENSAGEM` text NOT NULL,
  `DATA_PUBLICACAO` datetime NOT NULL,
  `ID_TOPICO_FORUM` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico_forum`
--

CREATE TABLE `topico_forum` (
  `ID_TOPICO_FORUM` int(11) NOT NULL,
  `DESCRICAO` text NOT NULL,
  `DATA_CADASTRO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `LOGIN_EMAIL` varchar(100) NOT NULL,
  `SENHA` varchar(240) NOT NULL,
  `ADM` varchar(1) NOT NULL,
  `DATA_CADASTRO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `NOME`, `LOGIN_EMAIL`, `SENHA`, `ADM`, `DATA_CADASTRO`) VALUES
(1, 'Vinicius Inhesta', 'inhesta10@gmail.com', '$2y$10$ISwRtRLgfSg4J.zavkwwUOWfKOtuMNTj9jNUrSTG6c/gUR1iQRbge', '1', '0000-00-00 00:00:00'),
(2, 'Alguem legal', 'alguemlegal@123.com', '$2y$10$ISwRtRLgfSg4J.zavkwwUOWfKOtuMNTj9jNUrSTG6c/gUR1iQRbge', '2', '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`ID_MENSAGEM`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`ID_NOTICIA`),
  ADD KEY `CATEGORIA` (`CATEGORIA`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Índices para tabela `postagem`
--
ALTER TABLE `postagem`
  ADD PRIMARY KEY (`ID_POSTAGEM`),
  ADD KEY `ID_TOPICO_FORUM` (`ID_TOPICO_FORUM`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`);

--
-- Índices para tabela `topico_forum`
--
ALTER TABLE `topico_forum`
  ADD PRIMARY KEY (`ID_TOPICO_FORUM`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `ID_NOTICIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `postagem`
--
ALTER TABLE `postagem`
  MODIFY `ID_POSTAGEM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `topico_forum`
--
ALTER TABLE `topico_forum`
  MODIFY `ID_TOPICO_FORUM` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD CONSTRAINT `mensagem_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `noticia_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Limitadores para a tabela `postagem`
--
ALTER TABLE `postagem`
  ADD CONSTRAINT `postagem_ibfk_1` FOREIGN KEY (`ID_TOPICO_FORUM`) REFERENCES `topico_forum` (`ID_TOPICO_FORUM`),
  ADD CONSTRAINT `postagem_ibfk_2` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
