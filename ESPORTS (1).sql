SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE DATABASE ESPORTS DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ESPORTS;

CREATE TABLE USUARIO(
ID_USUARIO INT NOT NULL auto_increment primary KEY,
NOME varchar(100) NOT NULL,
LOGIN_EMAIL VARCHAR(100) NOT NULL,
SENHA VARCHAR(50) NOT NULL,
ADM VARCHAR(1) NOT NULL,
DATA_CADASTRO datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE TOPICO_FORUM(
ID_TOPICO_FORUM INT NOT NULL auto_increment primary KEY,
DESCRICAO TEXT NOT null,
DATA_CADASTRO datetime NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE POSTAGEM(
ID_POSTAGEM int NOT null auto_increment primary KEY,
MENSAGEM TEXT not NULL,
DATA_PUBLICACAO datetime NOT NULL,
ID_TOPICO_FORUM INT NOT NULL,
ID_USUARIO int NOT NULL,
FOREIGN KEY (ID_TOPICO_FORUM) REFERENCES TOPICO_FORUM(ID_TOPICO_FORUM),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

create table MENSAGEM(
ID_MENSAGEM int not null auto_increment primary key,
TEXTO text not null,
DATA_ENVIO timestamp NOT NULL,
ID_USUARIO int NOT NULL,
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO),
ID_CHAT int NOT null,
FOREIGN KEY (ID_CHAT) REFERENCES CHAT(ID_CHAT)
);

CREATE TABLE CHAT(
ID_CHAT int NOT null auto_increment primary KEY,
ID_MENSAGEM int NOT NULL,
FOREIGN KEY (ID_MENSAGEM) REFERENCES MENSAGEM(ID_MENSAGEM)
);

CREATE TABLE CATEGORIA(
ID_CATEGORIA INT NOT NULL PRIMARY KEY auto_increment,
NOME VARCHAR(250)
)ENGINE=InnoDB DEFAULT charset=utf8;

CREATE TABLE NOTICIA(
ID_NOTICIA INT NOT NULL PRIMARY KEY auto_increment,
TITULO VARCHAR(200)NOT NULL,
DESCRICAO VARCHAR(250) NOT NULL,
TEXTO TEXT NOT NULL,
DIA TIMESTAMP,
IMAGEM VARCHAR(255) NOT NULL,
CATEGORIA INT,
ID_USUARIO int NOT NULL,
foreign key(CATEGORIA) references CATEGORIA(ID_CATEGORIA),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIO(ID_USUARIO)
)ENGINE=InnoDB DEFAULT charset=utf8;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO CATEGORIA (ID_CATEGORIA,NOME) VALUES
(1,'LEAGUE OF LEGENDS'),
(2,'RAINBOW SIX'),
(3,'FREE FIRE'),
(4,'FORTNITE'),
(5,'COUNTER STRIKE GLOBAL OFENSIVE');
select * from CATEGORIA ;


