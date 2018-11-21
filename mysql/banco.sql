SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `tbl_categoria` (
  `idCategoria` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valorDiaria` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


CREATE TABLE `tbl_extrareserva` (
  `idExtraReserva` int(11) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `idReserva` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE `tbl_formapagamento` (
  `idFormaPagamento` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_formapagamento` (`idFormaPagamento`, `descricao`, `status`) VALUES
(1, 'CARTAO DE CREDITO', 1),
(2, 'CARTAO DE DEBITO', 1),
(3, 'DINHEIRO', 1),
(4, 'MILHAS', 1),
(5, 'BOLETO', 1),
(6, 'BITCOINS', 1);



CREATE TABLE `tbl_perfilusuario` (
  `idPerfilUsuario` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_perfilusuario` (`idPerfilUsuario`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Funcionario'),
(3, 'Usuario');



CREATE TABLE `tbl_reserva` (
  `idReserva` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `data_inicio` datetime NOT NULL,
  `data_fim` datetime NOT NULL,
  `idFormaPagamento` int(11) NOT NULL,
  `data_checkin` datetime DEFAULT NULL,
  `data_chekout` datetime DEFAULT NULL,
  `data_reserva` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valorReserva` decimal(10,2) NOT NULL,
  `dano` tinyint(1) NOT NULL DEFAULT '0',
  `sujo` tinyint(1) NOT NULL DEFAULT '0',
  `desabastecido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_reserva` (`idReserva`, `idVeiculo`, `idUsuario`, `data_inicio`, `data_fim`, `idFormaPagamento`, `data_checkin`, `data_chekout`, `data_reserva`, `valorReserva`, `dano`, `sujo`, `desabastecido`) VALUES
(1, 3, 2, '2018-11-19 00:00:00', '2018-11-21 00:00:00', 4, NULL, NULL, '2018-11-19 22:47:49', '0.00', 0, 0, 0);



CREATE TABLE `tbl_usuario` (
  `idUsuario` int(11) NOT NULL,
  `idPerfilUsuario` int(11) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `endereco` varchar(250) NOT NULL,
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_usuario` (`idUsuario`, `idPerfilUsuario`, `cpf`, `nome`, `email`, `senha`, `endereco`, `dt_cadastro`, `status`) VALUES
(1, 1, '1', 'Breno Teixeira', 'inf.teixeira@gmail.com', '123123', 'Rua La casa do Carallo', '2018-10-29 16:59:00', 1),
(2, 1, '2', 'Admin', 'admin@admin', 'admin', 'Rua La casa do Carallo', '2018-10-29 18:00:00', 1),
(3, 2, '3', 'Funcionario', 'funcionario@funcionario', 'funcionario', 'Rua La casa do Carallo', '2018-10-29 19:00:00', 1),
(4, 3, '4', 'Usuario', 'usuario@usuario', 'usuario', 'Rua La casa do Carallo', '2018-10-29 19:00:00', 0),
(5, 3, '1', 'teste 1', 'teste@teste1', '123', 'aa', '2018-10-29 16:59:00', 1),
(6, 2, '00000022520', 'brunolog97@gmail.com', 'inf.teixeira@222', 'admias', 'rua pedro cabral, 346', '2018-11-01 03:00:00', 1),
(7, 1, 'novo', 'novo', 'novo@novo', 'nov', 'novo', '2018-11-01 03:56:59', 1),
(8, 3, '129.381.029-38', 'joao etc e tal', 'joao@joao', 'joao123A', 'sahdkajshdkajhsdk', '2018-11-19 21:46:52', 1);



CREATE TABLE `tbl_veiculo` (
  `idVeiculo` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `cor` varchar(50) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `tbl_veiculo` (`idVeiculo`, `placa`, `chassi`, `modelo`, `cor`, `idCategoria`, `status`, `dt_cadastro`) VALUES
(1, 'XXX-3212', 'AAAA', 'MODELO 1', 'PRETO', 2, 1, '2018-11-02 14:23:52'),
(2, 'AAA-5123', 'BBBB', 'MODELO 2', 'ROSA', 7, 1, '2018-11-02 14:23:52'),
(3, 'ADW-1231', 'CCCC', 'MODELO 3', 'AZUL', 2, 1, '2018-11-02 14:23:52'),
(4, 'CAA-1345', 'DDDD', 'MODELO 4', 'PRETO', 7, 1, '2018-11-02 14:23:52'),
(5, 'VVD-6760', 'EEEE', 'MODELO 5', 'PRETO', 2, 1, '2018-11-02 14:23:52'),
(6, 'CXS-6543', 'FFFF', 'MODELO 6', 'PRATA', 1, 0, '2018-11-02 14:23:52'),
(7, 'CCC-5141', 'GGGG', 'MODELO 7', 'PRATA', 2, 1, '2018-11-02 14:23:52'),
(8, 'VAS-1809', 'HHHH', 'MODELO 8', 'AZUL', 10, 1, '2018-11-02 14:23:52'),
(9, 'FFF-8645', 'IIII', 'MODELO 9', 'AZUL', 7, 0, '2018-11-02 14:23:53'),
(10, 'CAA-8999', 'JJJJ', 'MODELO 10', 'PRETO', 5, 1, '2018-11-02 14:23:53'),
(11, 'DSS-2351', 'KKKK', 'MODELO 11', 'AMARELO', 2, 1, '2018-11-02 14:23:53'),
(12, 'CXZ-5161', 'LLL', 'MODELO 12', 'ROSA', 10, 0, '2018-11-04 21:56:21'),
(13, 'ZXC-2166', 'QQQQ', 'MODELO 13', 'AMARELO', 14, 1, '2018-11-02 14:23:53'),
(14, 'XXA-7899', 'GGG', 'MODELO 99', 'AMARELO', 2, 1, '2018-11-04 21:56:16'),
(15, 'AAA-3210', '123', 'CARRO', 'PRETO', 15, 0, '2018-11-04 21:44:29');


ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`idCategoria`);


ALTER TABLE `tbl_extrareserva`
  ADD PRIMARY KEY (`idExtraReserva`),
  ADD KEY `fk_idReserva` (`idReserva`);


ALTER TABLE `tbl_formapagamento`
  ADD PRIMARY KEY (`idFormaPagamento`);


ALTER TABLE `tbl_perfilusuario`
  ADD PRIMARY KEY (`idPerfilUsuario`);


ALTER TABLE `tbl_reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `fk_idUsuario` (`idUsuario`),
  ADD KEY `fk_idFormaPagamento` (`idFormaPagamento`),
  ADD KEY `fk_idVeiculo` (`idVeiculo`);


ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_idPerfilUsuario` (`idPerfilUsuario`);


ALTER TABLE `tbl_veiculo`
  ADD PRIMARY KEY (`idVeiculo`),
  ADD KEY `fk_idCategoria` (`idCategoria`);


ALTER TABLE `tbl_categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE `tbl_extrareserva`
  MODIFY `idExtraReserva` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `tbl_formapagamento`
  MODIFY `idFormaPagamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `tbl_perfilusuario`
  MODIFY `idPerfilUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


ALTER TABLE `tbl_reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `tbl_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;


ALTER TABLE `tbl_veiculo`
  MODIFY `idVeiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE `tbl_extrareserva`
  ADD CONSTRAINT `fk_idReserva` FOREIGN KEY (`idReserva`) REFERENCES `tbl_reserva` (`idReserva`);


ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `fk_idFormaPagamento` FOREIGN KEY (`idFormaPagamento`) REFERENCES `tbl_formapagamento` (`idFormaPagamento`),
  ADD CONSTRAINT `fk_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `tbl_usuario` (`idUsuario`),
  ADD CONSTRAINT `fk_idVeiculo` FOREIGN KEY (`idVeiculo`) REFERENCES `tbl_veiculo` (`idVeiculo`);


ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_idPerfilUsuario` FOREIGN KEY (`idPerfilUsuario`) REFERENCES `tbl_perfilusuario` (`idPerfilUsuario`);


ALTER TABLE `tbl_veiculo`
  ADD CONSTRAINT `fk_idCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `tbl_categoria` (`idCategoria`);
COMMIT;
