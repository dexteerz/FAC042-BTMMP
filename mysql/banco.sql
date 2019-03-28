-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 28-Mar-2019 às 05:41
-- Versão do servidor: 10.3.12-MariaDB
-- versão do PHP: 7.2.17RC1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1355671`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valorDiaria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`idCategoria`, `descricao`, `valorDiaria`) VALUES
(1, 'MINI', '121.07'),
(2, 'ECONOMICO', '100.17'),
(3, 'COMPACTO', '105.13'),
(4, 'STANDARD', '115.92'),
(5, 'INTERMEDIARIO', '114.68'),
(6, 'PREMIUM', '200.24'),
(7, 'FULL-SIZE', '250.33'),
(8, 'SUV', '140.92'),
(9, 'ESPECIAL', '200.24'),
(10, 'LUXO', '367.82'),
(11, 'CONVERSIVEL', '180.30'),
(12, 'MINIVAN', '185.21'),
(13, 'VAN', '208.32'),
(14, 'UTILITARIOS', '240.87'),
(15, 'PICK-UP', '236.55');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_extrareserva`
--

CREATE TABLE `tbl_extrareserva` (
  `idExtraReserva` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `idReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_extrareserva`
--

INSERT INTO `tbl_extrareserva` (`idExtraReserva`, `descricao`, `valor`, `idReserva`) VALUES
(18, 'MANUTENÇÃO NO VEICULO', '500.00', 51),
(19, 'MANUTENÇÃO NO VEICULO', '78.99', 52),
(20, 'LIMPEZA NO VEICULO', '98.76', 52),
(21, 'MANUTENÇÃO NO VEICULO', '50.00', 53),
(22, 'REABASTECIMENTO DE COMBUSTIVEL', '10.00', 53),
(23, 'LIMPEZA NO VEICULO', '150.00', 53);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_formapagamento`
--

CREATE TABLE `tbl_formapagamento` (
  `idFormaPagamento` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_formapagamento`
--

INSERT INTO `tbl_formapagamento` (`idFormaPagamento`, `descricao`, `status`) VALUES
(1, 'CARTAO DE CREDITO', 1),
(2, 'CARTAO DE DEBITO', 1),
(3, 'DINHEIRO', 1),
(4, 'MILHAS', 1),
(5, 'BOLETO', 1),
(6, 'BITCOINS', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_perfilusuario`
--

CREATE TABLE `tbl_perfilusuario` (
  `idPerfilUsuario` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_perfilusuario`
--

INSERT INTO `tbl_perfilusuario` (`idPerfilUsuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Funcionario'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_reserva`
--

CREATE TABLE `tbl_reserva` (
  `idReserva` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `idFormaPagamento` int(11) NOT NULL,
  `data_checkin` date DEFAULT NULL,
  `data_checkout` date DEFAULT NULL,
  `data_reserva` timestamp NOT NULL DEFAULT current_timestamp(),
  `valorReserva` decimal(10,2) NOT NULL,
  `dano` tinyint(1) NOT NULL DEFAULT 0,
  `sujo` tinyint(1) NOT NULL DEFAULT 0,
  `desabastecido` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`idReserva`, `idVeiculo`, `idUsuario`, `data_inicio`, `data_fim`, `idFormaPagamento`, `data_checkin`, `data_checkout`, `data_reserva`, `valorReserva`, `dano`, `sujo`, `desabastecido`) VALUES
(38, 59, 3, '2018-01-09', '2018-01-11', 1, '2018-01-09', '2018-01-11', '2018-01-08 22:00:00', '600.00', 0, 0, 0),
(41, 19, 3, '2018-03-09', '2018-03-11', 1, '2018-03-09', '2018-03-11', '2018-03-08 22:00:00', '530.00', 0, 0, 0),
(42, 41, 3, '2018-05-09', '2018-05-11', 1, '2018-05-09', '2018-05-11', '2018-05-08 21:00:00', '330.00', 0, 0, 0),
(43, 23, 3, '2018-05-09', '2018-05-11', 1, '2018-05-09', '2018-05-11', '2018-05-08 21:00:00', '990.00', 0, 0, 0),
(44, 21, 3, '2018-06-09', '2018-06-11', 3, '2018-06-09', '2018-06-11', '2018-06-08 21:00:00', '600.00', 0, 0, 0),
(45, 24, 3, '2018-02-09', '2018-02-11', 1, '2018-02-09', '2018-02-11', '2018-02-08 22:00:00', '350.00', 0, 0, 0),
(46, 43, 3, '2018-08-09', '2018-08-11', 2, '2018-08-09', '2018-08-11', '2018-08-08 21:00:00', '580.00', 0, 0, 0),
(47, 33, 3, '2018-08-09', '2018-08-11', 1, '2018-08-09', '2018-08-11', '2018-08-08 21:00:00', '350.00', 0, 0, 0),
(48, 59, 3, '2018-10-09', '2018-10-11', 1, '2018-10-09', '2018-10-11', '2018-10-08 21:00:00', '900.00', 0, 0, 0),
(49, 32, 3, '2018-11-09', '2018-11-11', 1, '2018-11-09', '2018-11-11', '2018-11-08 22:00:00', '230.00', 0, 0, 0),
(50, 33, 3, '2018-11-09', '2018-11-11', 1, '2018-11-09', '2018-11-11', '2018-11-08 22:00:00', '450.00', 0, 0, 0),
(51, 41, 3, '2018-11-24', '2018-12-01', 6, '2018-11-23', '2018-11-23', '2018-11-23 21:49:08', '1201.19', 1, 0, 0),
(52, 59, 1, '2018-11-24', '2018-11-28', 1, '2018-11-24', '2018-11-24', '2018-11-23 22:50:45', '978.71', 1, 1, 0),
(53, 42, 11, '2018-11-23', '2018-11-30', 6, '2018-11-24', '2018-11-24', '2018-11-23 23:53:31', '911.19', 1, 1, 1),
(54, 47, 1, '2019-01-11', '2019-01-11', 3, '2019-01-12', NULL, '2019-01-12 01:49:14', '180.30', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `idUsuario` int(11) NOT NULL,
  `idPerfilUsuario` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`idUsuario`, `idPerfilUsuario`, `cpf`, `nome`, `email`, `senha`, `endereco`, `dt_cadastro`, `status`) VALUES
(1, 1, '2', 'Admin', 'admin@admin', 'admin', 'Rua La casa do Carallo', '2018-10-29 18:00:00', 1),
(2, 2, '3', 'Funcionario', 'funcionario@funcionario', 'funcionario', 'Rua La casa do Carallo', '2018-10-29 19:00:00', 1),
(3, 3, '4', 'Usuario', 'usuario@usuario', 'usuario', 'Rua La casa do Carallo', '2018-10-29 19:00:00', 0),
(11, 3, '122.121.212-21', 'maria', 'maria@maria', 'Ma1234', 'ruda da csa', '2018-11-23 23:51:43', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_veiculo`
--

CREATE TABLE `tbl_veiculo` (
  `idVeiculo` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `dt_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbl_veiculo`
--

INSERT INTO `tbl_veiculo` (`idVeiculo`, `placa`, `chassi`, `modelo`, `cor`, `idCategoria`, `status`, `dt_cadastro`) VALUES
(19, 'HYQ-0415', '9 B D 1 7 8 2 2 6 W 1 2 3 4 5 6 7', 'FIESTA', 'VERMELHO', 3, 1, '2018-11-23 03:22:35'),
(20, 'HYA-2205', '9 B A 1 3 8 2 1 5 G 1 2 3 9 4 6 5', 'UP', 'PRETO ', 3, 1, '2018-11-23 03:23:21'),
(21, 'HUU-5343', '9 B F 1 3 8 1 5 3 M 1 2 3 8 4 3 1', 'UNO', 'AZUL', 3, 1, '2018-11-23 03:24:01'),
(22, 'HYV-0595', '9 B I 1 5 7 4 5 2 P 1 2 3 8 4 3 3 ', 'KWID', 'PRATA', 3, 1, '2018-11-23 03:24:42'),
(23, 'HUW-1807', '9 B L 2 9 7 1 5 3 P 1 2 3 8 4 3 4', 'KA', 'CINZA', 3, 1, '2018-11-23 03:25:20'),
(24, 'HVT-9865', '9 B Y 2 9 7 1 8 9 P 1 2 3 5 4 2 7', 'QQ', 'GRAFITE', 3, 1, '2018-11-23 03:25:49'),
(25, 'HYU-8082', '9 B F 1 2 8 7 5 3 M 1 2 4 8 4 3 1', 'MOBI', 'VERDE', 3, 1, '2018-11-23 03:26:18'),
(26, 'HUH-9674', '9 B C 1 3 8 2 1 5 O 1 2 3 9 4 6 2', 'FIESTA', 'PRETO ', 3, 1, '2018-11-23 03:28:43'),
(27, 'HVU-5240', '9 B A 1 3 8 2 1 5 G 1 2 3 9 4 6 ', 'ONIX', 'PRATA', 3, 1, '2018-11-23 03:29:20'),
(28, 'HEV-9704', '9 B D 1 7 8 2 2 6 G 1 2 3 4 5 6 0', 'TORO', 'VERMELHO', 15, 1, '2018-11-23 04:04:21'),
(29, 'GQO-6097', '9 B E 1 9 8 2 5 6 B 1 0 3 4 3 6 5', 'HILUX', 'PRETO ', 15, 1, '2018-11-23 04:04:57'),
(30, 'GYW-7199', '9 B S 1 9 8 2 1 6 C 1 0 3 4 3 2 4', 'S10', 'AZUL', 15, 1, '2018-11-23 04:05:25'),
(31, 'HKC-8943', '9 B H 0 7 8 2 0 6 I 1 0 3 5 3 2 7', 'RANGER', 'PRATA', 15, 1, '2018-11-23 04:05:55'),
(32, 'GPC-4388', '9 B T 1 9 8 2 2 6 R 1 0 5 4 8 2 1', 'OROCH', 'CINZA', 15, 1, '2018-11-23 04:06:25'),
(33, 'HGT-1816', '9 B S 2 5 8 2 3 6 S 1 0 0 4 3 2 7', 'L200', 'GRAFITE', 15, 1, '2018-11-23 04:06:54'),
(34, 'HHH-2912', '9 B 6 2 5 8 8 2 6 S 1 0 0 4 3 2 0', 'AMAROK', 'VERDE', 15, 1, '2018-11-23 04:07:27'),
(35, 'HBM-5638', '9 B U 1 9 7 2 1 6 C 1 0 3 5 3 2 8', 'FRONTIER', 'PRETO ', 15, 1, '2018-11-23 04:08:12'),
(36, 'GMI-9395', '9 B Q 9 5 7 2 1 9 C 1 0 3 5 3 2 0', 'RAM', 'PRATA', 15, 1, '2018-11-23 04:08:40'),
(37, 'GPM-0236', '9 B C 1 3 8 1 5 3 W 1 2 3 8 4 3 6', 'SIENA', 'BRANCO', 2, 1, '2018-11-23 04:24:20'),
(38, 'GZV-9881', '9 B T 6 3 8 1 5 3 W 5 2 3 8 4 3 9', 'CIVIC', 'PRETO', 2, 1, '2018-11-23 04:25:10'),
(39, 'GSU-3583', '9 B U 6 3 7 1 5 3 D 5 9 3 2 4 3 0', 'CITY', 'PRATA', 2, 1, '2018-11-23 04:25:55'),
(40, 'GPK-3635', '9 B Y 4 3 7 0 5 3 D 5 9 3 2 5 3 7', 'VOYAGE', 'AZUL', 2, 1, '2018-11-23 04:26:34'),
(41, 'GVE-0331', '9 B A 2 3 7 0 5 3 D 6 9 3 2 1 3 6', 'VIRTUS', 'PRATA', 2, 1, '2018-11-23 04:27:05'),
(42, 'HMH-6809', '9 B D 1 3 8 0 5 3 D 7 8 3 2 1 3 0', 'KA+', 'VERMELHO', 2, 1, '2018-11-23 04:27:44'),
(43, 'GLO-2719', '9 B E 1 3 8 0 5 3 D 7 8 3 5 1 3 9', 'PRISMA', 'PRATA', 2, 1, '2018-11-23 04:28:15'),
(44, 'GUI-6711', '9 B A 1 3 7 0 5 5 D 7 8 5 2 1 8 8', 'COROLLA', 'PRATA', 2, 1, '2018-11-23 04:28:49'),
(45, 'HIZ-9923', '9 B Q 8 3 7 0 5 9 D 6 9 1 2 1 4 6', 'HB20S', 'PRATA', 2, 1, '2018-11-23 04:29:21'),
(46, 'HBN-8130', '9 B T 5 3 7 0 5 4 D 6 9 7 2 1 5 9', 'SENTRA', 'PRETO', 2, 1, '2018-11-23 04:29:55'),
(47, 'MAC-0954', '9 B T 5 3 7 0 5 4 D 6 9 0 293 1 8', 'EVOQUE', 'PRETO', 11, 2, '2018-11-23 17:25:56'),
(48, 'DGF-7876', '9 B E 1 3 8 0 5 3 D 7 8 3 5 1 8 9', 'CABRIOLET', 'AZUL', 11, 1, '2018-11-23 17:32:17'),
(49, 'AWM-5479', '9 B E 7 3 8 0 5 3 D 7 8 3 5 1 3 0', 'CABRIO', 'PRATA', 11, 1, '2018-11-23 17:36:56'),
(50, 'MJK-8711', '9 B E 6 3 8 0 5 3 D 7 8 3 5 1 3 1', 'SLC', 'AMARELO', 11, 1, '2018-11-23 17:38:58'),
(51, 'LKJ-0108', '9 B E 1 3 8 0 5 3 D 7 8 3 5 1 3 0', 'BOXSTER', 'VERDE', 11, 1, '2018-11-23 17:41:00'),
(52, 'CSQ-9827', '9 B E 9 3 8 0 5 3 D 7 8 3 5 9 3 5', 'CAMARO', 'AMARELO', 11, 1, '2018-11-23 17:42:24'),
(53, 'HYU-7612', '9 B E 0 3 8 0 5 3 D 7 8 3 5 1 3 8', 'CABRIOLETE 3.0', 'AZUL', 11, 1, '2018-11-23 17:43:42'),
(54, 'JUN-9821', '9 B E 1 3 8 0 5 1 D 7 8 3 5 1 3 4', 'S63 CABRIO', 'PRETO', 11, 1, '2018-11-23 17:44:45'),
(55, 'NBV-8192', '9 B E 1 3 8 1 2 3 D 7 8 3 5 1 3 9', 'C300 CABRIOLETE', 'PRETO', 11, 1, '2018-11-23 17:46:27'),
(56, 'NMJ-0121', '9 B E 1 3 8 0 5 3 D 7 8 3 5 1 3 7', '430i CABRIO', 'PRATA', 11, 1, '2018-11-23 17:48:43'),
(57, 'BGH-0923', '9 B E 1 3  3 D 7 8 3 8 0 55 1 3 9', 'Onix 1.4 LT', 'VERMELHO', 9, 1, '2018-11-23 17:53:56'),
(58, 'OIK-8901', '9 B E 1 3 8 8 5 3 D 7 9 3 5 1 3 0', 'Spin 1.8 LT', 'VERDE', 9, 1, '2018-11-23 17:55:56'),
(59, 'NHJ-0992', '9 B E 1 3 9 7 5 3 D 7 8 3 5 1 3 9', 'Aircross 1.6 Live', 'PRETO', 9, 1, '2018-11-23 17:57:28'),
(60, 'MLO-6372', '9 B E 1 3 8 0 5 3 D 7 8 3 1 1 3 9', 'C4 Lounge', 'AMARELO', 9, 1, '2018-11-23 17:58:33'),
(61, 'BCM-9283', '9 B E 1 3 8 0 5 3 D 7 8 9 5 1 3 8', 'Argo 1.3 Drive', 'AZUL', 9, 1, '2018-11-23 18:00:00'),
(62, 'LAK-0932', '9 B E 1 3 1 3 5 3 D 7 8 3 5 1 3 0', 'Argo 1.8 Precision', 'PRATA', 9, 1, '2018-11-23 18:01:45'),
(63, 'JDS-8394', '9 B E 1 3 8 0 0 0 D 7 8 3 5 1 3 9', 'Mobi 1.0 Drive', 'GRAFITE', 9, 1, '2018-11-23 18:07:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `tbl_extrareserva`
--
ALTER TABLE `tbl_extrareserva`
  ADD PRIMARY KEY (`idExtraReserva`),
  ADD KEY `fk_idReserva` (`idReserva`);

--
-- Indexes for table `tbl_formapagamento`
--
ALTER TABLE `tbl_formapagamento`
  ADD PRIMARY KEY (`idFormaPagamento`);

--
-- Indexes for table `tbl_perfilusuario`
--
ALTER TABLE `tbl_perfilusuario`
  ADD PRIMARY KEY (`idPerfilUsuario`);

--
-- Indexes for table `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_idUsuario` (`idUsuario`),
  ADD KEY `fk_idFormaPagamento` (`idFormaPagamento`),
  ADD KEY `fk_idVeiculo` (`idVeiculo`);

--
-- Indexes for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_idPerfilUsuario` (`idPerfilUsuario`);

--
-- Indexes for table `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  ADD PRIMARY KEY (`idVeiculo`),
  ADD KEY `fk_idCategoria` (`idCategoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_extrareserva`
--
ALTER TABLE `tbl_extrareserva`
  MODIFY `idExtraReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_formapagamento`
--
ALTER TABLE `tbl_formapagamento`
  MODIFY `idFormaPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_perfilusuario`
--
ALTER TABLE `tbl_perfilusuario`
  MODIFY `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  MODIFY `idVeiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tbl_extrareserva`
--
ALTER TABLE `tbl_extrareserva`
  ADD CONSTRAINT `fk_idReserva` FOREIGN KEY (`idReserva`) REFERENCES `tbl_reserva` (`idReserva`);

--
-- Limitadores para a tabela `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_idFormaPagamento` FOREIGN KEY (`idFormaPagamento`) REFERENCES `tbl_formapagamento` (`idFormaPagamento`),
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_idVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `tbl_veiculo` (`idVeiculo`);

--
-- Limitadores para a tabela `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_idPerfilUsuario` FOREIGN KEY (`idPerfilUsuario`) REFERENCES `tbl_perfilusuario` (`idPerfilUsuario`);

--
-- Limitadores para a tabela `tbl_veiculo`
--
ALTER TABLE `tbl_veiculo`
  ADD CONSTRAINT `fk_idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`idCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
