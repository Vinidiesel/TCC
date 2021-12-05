CREATE DATABASE ESPORTS DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ESPORTS;
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2021 às 03:58
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
(81, 'ola', '2021-10-14 20:23:50', 1),
(82, 'ola', '2021-10-16 22:08:18', 1),
(83, 'olá\r\n', '2021-10-18 21:03:40', 1),
(84, 'eu sei de tudo que vc fez', '2021-10-18 21:04:08', 1),
(85, 'ola', '2021-11-09 00:19:49', 1),
(86, 'ola', '2021-11-10 21:18:59', 10),
(87, 'ola', '2021-11-10 21:58:50', 1),
(88, 'ola', '2021-11-10 22:51:54', 1),
(89, 'ola', '2021-11-10 23:40:51', 12),
(99, 'ola', '2021-12-05 01:44:52', 1),
(100, 'ola', '2021-12-05 01:45:19', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `ID_NOTICIA` int(11) NOT NULL,
  `TITULO` text NOT NULL,
  `DESCRICAO` text NOT NULL,
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
(6, '<h1 class=\"content-head__title\" itemprop=\"headline\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: var(--font-line-height-compact); font-family: glbOpenSans, &quot;Open Sans&quot;, &quot;Avenir Next&quot;, Avenir, Inter, -apple-system, BlinkMacSystemFont, Roboto, &quot;Helvetica Neue&quot;, Helvetica, Arial, Noto, Ubuntu, &quot;Segoe UI&quot;, sans-serif; vertical-align: initial; color: rgb(17, 17, 17); letter-spacing: var(--font-size-110-responsive-display-letter-spacing); font-variation-settings: var(--font-variation-settings-display-normal-roman); font-feature-settings: var(--font-feature-settings-display-roman); background-color: rgb(255, 255, 255);\"><span style=\"font-style: italic; font-size: xx-large;\">Vilão de Arcane, Silco será novo personagem do TFT, revela Riot</span></h1>', '<h2 class=\"content-head__subtitle\" itemprop=\"alternativeHeadline\" style=\"box-sizing: inherit; margin: 0px; padding-top: 0px; padding-right: var(--spacing-40); padding-bottom: 0px; padding-left: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; line-height: var(--font-line-height-spaced); font-family: var(--font-family-book),var(--font-family-book-fallback); vertical-align: initial; color: rgb(85, 85, 85); letter-spacing: var(--font-size-60-responsive-book-letter-spacing); font-variation-settings: var(--font-variation-settings-book-normal-roman); font-feature-settings: var(--font-feature-settings-book-roman); background-color: rgb(255, 255, 255);\"><span style=\"font-size: x-large;\">Personagem chegará ao jogo no set 6.5, em fevereiro de 2022</span></h2> ', '<div class=\"mc-column content-text active-extra-styles active-capital-letter\" data-block-type=\"unstyled\" data-block-weight=\"58\" data-block-id=\"1\" style=\"box-sizing: inherit; margin-top: 0px; margin-right: auto; margin-bottom: var(--spacing-50); margin-left: auto; padding: 0px 1rem; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: var(--font-size-60-responsive-book); line-height: var(--font-line-height-spaced); font-family: var(--font-family-book),var(--font-family-book-fallback); vertical-align: initial; max-width: 42.5rem; width: 680px; float: none; letter-spacing: var(--font-size-60-responsive-book-letter-spacing); overflow-wrap: break-word; font-variation-settings: var(--font-variation-settings-book-normal-roman); font-feature-settings: var(--font-feature-settings-book-roman);\"><p class=\"content-text__container theme-color-primary-first-letter\" data-track-category=\"Link no Texto\" data-track-links=\"\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: initial;\">A Riot Games revelou nesta quarta-feira, que o vilão mais famoso de Arcane, série animada do&nbsp;<a href=\"https://ge.globo.com/esports/lol/noticia/lol-skins-runas-personagens-o-que-e-e-tudo-sobre-o-moba-da-riot-games.ghtml\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: var(--font-weight-bold); font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: initial; text-decoration-line: none; color: rgb(6, 170, 72);\">League of Legends</a>&nbsp;da Netflix, chegará ao Teamfight Tactics (TFT). Silco será uma das novidades do meio da atualização do set 6.5, que chegará em fevereiro de 2022. Contudo, a Riot comunicou que o personagem não chegará ao MOBA da desenvolvedora.</p></div><div class=\"wall protected-content\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: initial;\"><div class=\"row medium-uncollapsed content-media content-photo\" data-block-type=\"backstage-photo\" data-block-id=\"2\" style=\"box-sizing: inherit; margin: 2.5rem auto; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: opensans, helvetica, arial, sans-serif; vertical-align: initial; max-width: 85rem; clear: both; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><div class=\"mc-column content-media__container\" style=\"box-sizing: inherit; margin: 0px auto; padding: 0px 1rem; border: 0px; font: inherit; vertical-align: initial; max-width: 42.5rem; width: 680px; float: none;\"><div class=\"content-media-container glb-skeleton-box\" style=\"box-sizing: inherit; margin: 0px; padding: 276.062px 0px 0px; border: 0px; font: inherit; vertical-align: initial; --skeleton-beam:linear-gradient(90deg,rgba(255,255,255,0) 0,rgba(255,255,255,0.7) 50%,rgba(255,255,255,0) 100%); width: var(--skeleton-width,100px); min-height: var(--skeleton-height,100px); background-color: rgb(238, 238, 238); background-image: var(--skeleton-beam); background-size: 95% 100%; background-repeat: no-repeat; background-position: 793.09% 0px; animation: 1s linear 0s infinite normal none running bg-skeleton-box; position: relative; --skeleton-width: 100%; --skeleton-height: auto;\"><figure class=\"content-media-figure\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: initial; position: absolute; left: 0px; top: 0px; width: 648px; height: auto;\"><amp-img lightbox=\"lightbox-amp-carousel\" class=\"content-media-image i-amphtml-element i-amphtml-layout-responsive i-amphtml-layout-size-defined i-amphtml-built i-amphtml-layout\" srcset=\"https://s2.glbimg.com/IsscTMBqs_GQDWSaB5zSYt4e8LI=/0x0:1920x818/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 1000w, https://s2.glbimg.com/dBQ7DOTvKBD_VvEGR4R_UfjBePg=/0x0:1920x818/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 984w, https://s2.glbimg.com/SBuo2OZnWhlV53KjQQiLLsXb01M=/0x0:1920x818/640x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 640w, https://s2.glbimg.com/Cvegc8ogSCyFhwk-F4YX_oCRO7E=/0x0:1920x818/600x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 600w\" src=\"https://s2.glbimg.com/dBQ7DOTvKBD_VvEGR4R_UfjBePg=/0x0:1920x818/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg\" alt=\"Silco, vilão de Arcane — Foto: Divulgação/Netflix\" width=\"1920\" height=\"818\" layout=\"responsive\" noloading=\"\" i-amphtml-layout=\"responsive\" style=\"box-sizing: inherit; display: block; position: relative; overflow: hidden !important;\"><i-amphtml-sizer slot=\"i-amphtml-svc\" style=\"box-sizing: inherit; display: block !important; padding-top: 276.062px;\"></i-amphtml-sizer><img decoding=\"async\" sizes=\"(max-width: 1920px) 648px, 100vw\" alt=\"Silco, vilão de Arcane — Foto: Divulgação/Netflix\" srcset=\"https://s2.glbimg.com/IsscTMBqs_GQDWSaB5zSYt4e8LI=/0x0:1920x818/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 1000w, https://s2.glbimg.com/dBQ7DOTvKBD_VvEGR4R_UfjBePg=/0x0:1920x818/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 984w, https://s2.glbimg.com/SBuo2OZnWhlV53KjQQiLLsXb01M=/0x0:1920x818/640x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 640w, https://s2.glbimg.com/Cvegc8ogSCyFhwk-F4YX_oCRO7E=/0x0:1920x818/600x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg 600w\" src=\"https://s2.glbimg.com/dBQ7DOTvKBD_VvEGR4R_UfjBePg=/0x0:1920x818/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_bc8228b6673f488aa253bbcb03c80ec5/internal_photos/bs/2021/k/h/BLALDURVmoOmca81TnZA/arcane-critica-2.jpg\" class=\"i-amphtml-fill-content i-amphtml-replaced-content\" style=\"box-sizing: inherit; margin: auto; padding: 0px !important; border: none !important; font: inherit; vertical-align: initial; display: block; height: 0px; max-height: 100%; max-width: 100%; min-height: 100%; min-width: 100%; width: 0px; position: absolute; inset: 0px;\"></amp-img></figure></div></div></div><div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"26\" data-block-id=\"3\" style=\"box-sizing: inherit; margin-top: 0px; margin-right: auto; margin-bottom: var(--spacing-50); margin-left: auto; padding: 0px 1rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: var(--font-size-60-responsive-book); line-height: var(--font-line-height-spaced); font-family: var(--font-family-book),var(--font-family-book-fallback); vertical-align: initial; max-width: 42.5rem; width: 680px; float: none; letter-spacing: var(--font-size-60-responsive-book-letter-spacing); overflow-wrap: break-word; font-variation-settings: var(--font-variation-settings-book-normal-roman); font-feature-settings: var(--font-feature-settings-book-roman); color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"></div><div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"69\" data-block-id=\"4\" style=\"box-sizing: inherit; margin-top: 0px; margin-right: auto; margin-bottom: var(--spacing-50); margin-left: auto; padding: 0px 1rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: var(--font-size-60-responsive-book); line-height: var(--font-line-height-spaced); font-family: var(--font-family-book),var(--font-family-book-fallback); vertical-align: initial; max-width: 42.5rem; width: 680px; float: none; letter-spacing: var(--font-size-60-responsive-book-letter-spacing); overflow-wrap: break-word; font-variation-settings: var(--font-variation-settings-book-normal-roman); font-feature-settings: var(--font-feature-settings-book-roman); color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><p class=\"content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: initial;\">Apesar da chegada de Silco estar próxima, a desenvolvedora passou por alguns desafios para trazer o vilão para dentro do TFT. Isso porque a equipe adapta os campeões que vem do League of Legends e Silco é um personagem independente, que foi construído do zero. A Riot compartilhou algumas imagens da criação do personagem dentro do jogo, mas ressaltou que não está nada definido e alterações poderão acontecer.</p></div><div class=\"content-ads content-ads--reveal\" data-block-type=\"ads\" data-block-id=\"5\" style=\"box-sizing: inherit; margin: 0px auto; padding: 0px; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: 18px; line-height: inherit; font-family: opensans, helvetica, arial, sans-serif; vertical-align: initial; width: 970px; transition: height 0.9s ease 0s; overflow: hidden; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"></div><div class=\"mc-column content-text active-extra-styles \" data-block-type=\"unstyled\" data-block-weight=\"48\" data-block-id=\"6\" style=\"box-sizing: inherit; margin-top: 0px; margin-right: auto; margin-bottom: var(--spacing-50); margin-left: auto; padding: 0px 1rem; border: 0px; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-stretch: inherit; font-size: var(--font-size-60-responsive-book); line-height: var(--font-line-height-spaced); font-family: var(--font-family-book),var(--font-family-book-fallback); vertical-align: initial; max-width: 42.5rem; width: 680px; float: none; letter-spacing: var(--font-size-60-responsive-book-letter-spacing); overflow-wrap: break-word; font-variation-settings: var(--font-variation-settings-book-normal-roman); font-feature-settings: var(--font-feature-settings-book-roman); color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><p class=\"content-text__container \" data-track-category=\"Link no Texto\" data-track-links=\"\" style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font: inherit; vertical-align: initial;\">A Riot apenas divulgou imagens de Silco e não deu nenhum detalhe sobre o kit de habilidades que o vilão terá, só que será um \"mastermind\" em questão de combate. A desenvolvedora ainda revelou que outros personagens que não fazem parte de Runeterra poderão chegar ao TFT futuramente.</p></div></div> ', '2021-12-04 23:52:12', 'arcane-critica-2.jpg', 1, 1);

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
(2, 'Alguem legal', 'alguemlegal@123.com', '$2y$10$ISwRtRLgfSg4J.zavkwwUOWfKOtuMNTj9jNUrSTG6c/gUR1iQRbge', '2', '0000-00-00 00:00:00'),
(10, 'Vinicius Oliveira Inhesta Dos ', 'vinicius.santos933@etec.sp.gov.br', '$2y$10$wFqrsNwYTbNHuuXc3p8lqeq8xrmH.ZyHrRPtjoqFthJit3YtuVphi', '3', '0000-00-00 00:00:00'),
(14, 'Vinicius Inhesta', 'vinicius.santos933@etec.sp.gov.br', '$2y$10$ss3F3JN28Ex2i6dG/4DPf.L1/l5661U1kYf6f66ne3Eh1VXJawWmq', '1', '2021-12-03 12:09:41');

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
  MODIFY `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `ID_NOTICIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
