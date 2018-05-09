-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tempo de Geração: 09/05/2018 às 01:55
-- Versão do servidor: 5.5.57-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `sistema_mer`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razaoSocial` varchar(100) NOT NULL,
  `cnpj` int(13) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Fazendo dump de dados para tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `razaoSocial`, `cnpj`, `endereco`) VALUES
(2, 'Editora Arquiero', 123456, 'Rua A, Centro, VilaVelha'),
(3, 'Editora Intrinseca Ltda.', 456123, 'R Marques De Sao Vicente, 99, Sala 301\r\nGavea, Rio De Janeiro \r\nRJ, CEP 22451-041'),
(5, 'EDITORA SEXTANTE', 142358, 'RUA VOLUNTÃRIOS DA PÃTRIA, 45, SALA 1404  BOTAFOGO - CEP 22270-000  RIO DE JANEIRO - RJ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
