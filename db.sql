-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: 179.188.16.171
-- Generation Time: 09-Out-2016 às 00:28
-- Versão do servidor: 5.6.30-76.3-log
-- PHP Version: 5.6.24-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brand_controle`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_APP_HISTORICO_COMPRAS`
--

CREATE TABLE `BRC_APP_HISTORICO_COMPRAS` (
  `id` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `dt_compra` date NOT NULL,
  `qtde` int(5) NOT NULL,
  `produto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `marca` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `rating` double(2,1) DEFAULT NULL,
  `comentario` text COLLATE latin1_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_APP_HISTORICO_COMPRAS`
--

INSERT INTO `BRC_APP_HISTORICO_COMPRAS` (`id`, `valor`, `dt_compra`, `qtde`, `produto`, `marca`, `rating`, `comentario`) VALUES
(1, 139.99, '2016-07-16', 1, 'T SHIRT CHIFFON MALHA', 'Shoulder', NULL, NULL),
(2, 89.99, '2016-08-07', 1, 'T-SHIRT BORBOLETAS METALIZADAS', 'Shoulder', 5.0, 'perfeita'),
(3, 89.99, '2016-08-10', 1, 'T-SHIRT LIBELULAS COLOR', 'Shoulder', NULL, NULL),
(4, 99.99, '2016-08-13', 1, 'T-SHIRT BEIJA FLOR', 'Shoulder', NULL, NULL),
(5, 179.99, '2016-08-21', 1, 'COLAR GRAVATA', 'Shoulder', 3.5, 'bom'),
(6, 247.26, '2016-08-27', 1, 'VESTIDO FLUIDO VISCOLINHO', 'Shoulder', NULL, NULL),
(7, 110.99, '2016-05-02', 1, 'CALCA SKINNY PONTO ROMA', 'Shoulder', 4.0, 'bom'),
(8, 413.10, '2016-05-31', 1, 'BLAZER CREPE', 'Shoulder', 3.0, ''),
(9, 99.99, '2016-09-07', 1, 'CINTO METAL PEDRAS', 'Shoulder', NULL, NULL),
(10, 199.00, '2016-09-26', 1, 'BERMUDA DETONADO', 'Shoulder', 5.0, 'otimo produto');

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_CAMPANHA`
--

CREATE TABLE `BRC_CAMPANHA` (
  `ID` int(11) NOT NULL,
  `FILIAL` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `CONCEITO` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `VALOR` decimal(10,2) DEFAULT NULL,
  `PERCENTUAL` int(5) DEFAULT NULL,
  `DT_INICIO` date DEFAULT NULL,
  `DT_LIMITE` date NOT NULL,
  `MARCA` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_CAMPANHA`
--

INSERT INTO `BRC_CAMPANHA` (`ID`, `FILIAL`, `CONCEITO`, `VALOR`, `PERCENTUAL`, `DT_INICIO`, `DT_LIMITE`, `MARCA`, `CREATED_AT`, `UPDATED_AT`) VALUES
(6, 'Todas', 'B', 300.00, NULL, '2016-10-05', '2017-08-22', 'Shoulder', '2016-09-25 19:07:18', '2016-10-06 02:14:58'),
(10, 'Todas', 'E', 100.00, NULL, NULL, '2016-12-31', 'Shoulder', '2016-09-26 12:20:46', '2016-09-26 12:20:46'),
(21, 'BOURBON', 'A', 300.00, NULL, '2016-10-10', '2016-12-31', 'Shoulder', '2016-10-03 22:50:14', '2016-10-05 12:45:38'),
(22, 'ANALIA FRANCO', 'B', NULL, 10, '2016-10-10', '2016-12-31', 'Shoulder', '2016-10-03 22:50:49', '2016-10-06 22:16:43'),
(23, 'Todas', 'A', NULL, 10, '2016-10-04', '2016-12-31', 'Shoulder', '2016-10-04 22:42:52', '2016-10-04 22:42:52'),
(24, 'CIDADE SAO PAULO', 'A', 250.00, NULL, '2016-10-06', '2016-11-06', 'Shoulder', '2016-10-06 02:14:26', '2016-10-06 02:14:26'),
(26, 'Todas', 'A', 100.00, NULL, '2016-10-06', '2016-12-31', 'Shoulder', '2016-10-07 00:43:40', '2016-10-07 00:43:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_MARCAS`
--

CREATE TABLE `BRC_MARCAS` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_MARCAS`
--

INSERT INTO `BRC_MARCAS` (`ID`, `NOME`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'Shoulder', '2016-09-16 18:26:14', '2016-09-16 18:26:14');

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_NEWSLETTER`
--

CREATE TABLE `BRC_NEWSLETTER` (
  `ID` int(11) NOT NULL,
  `EMAIL` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_NEWSLETTER`
--

INSERT INTO `BRC_NEWSLETTER` (`ID`, `EMAIL`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 'yuri.calabrez@gmail.com', '2016-09-07 23:14:31', '2016-09-07 23:14:31'),
(2, 'mkfiuza@hotmail.com', '2016-09-07 23:17:20', '2016-09-07 23:17:20'),
(3, 'lu_neusa@hotmail.com', '2016-09-07 23:22:39', '2016-09-07 23:22:39'),
(9, 'douglas_faustino_1989@hotmail.com', '2016-09-09 12:51:21', '2016-09-09 12:51:21'),
(10, 'rafael.aro31@gmail.com', '2016-09-12 16:53:22', '2016-09-12 16:53:22'),
(11, 'amandahque@gmail.com', '2016-09-12 23:28:29', '2016-09-12 23:28:29'),
(12, 'asousa@gimba.com.br', '2016-09-12 23:30:36', '2016-09-12 23:30:36'),
(13, 'dkchevi@hotmail.com', '2016-09-12 23:54:39', '2016-09-12 23:54:39'),
(14, 'tigotigo2007@gmail.com', '2016-09-14 21:06:58', '2016-09-14 21:06:58'),
(15, 'rafael.aro@especialistadolar.com.br', '2016-10-05 00:15:44', '2016-10-05 00:15:44');

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_TAB_CLIENTE_R_VA`
--

CREATE TABLE `BRC_TAB_CLIENTE_R_VA` (
  `MESES_AUSENTE` int(11) DEFAULT NULL,
  `QTDE_CLIENTES` int(11) DEFAULT NULL,
  `VA` decimal(14,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_TAB_CLIENTE_R_VA`
--

INSERT INTO `BRC_TAB_CLIENTE_R_VA` (`MESES_AUSENTE`, `QTDE_CLIENTES`, `VA`) VALUES
(2, 22744, 453.19),
(3, 34811, 398.48),
(4, 26422, 434.22),
(5, 16179, 452.39),
(6, 13647, 480.20),
(7, 11442, 434.90),
(8, 16407, 359.65),
(9, 24028, 370.99),
(10, 24635, 435.43),
(11, 13355, 417.24),
(12, 8841, 474.35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_TAB_LOJAS`
--

CREATE TABLE `BRC_TAB_LOJAS` (
  `CODIGO_FILIAL` char(6) CHARACTER SET latin1 NOT NULL,
  `FILIAL` varchar(25) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_TAB_LOJAS`
--

INSERT INTO `BRC_TAB_LOJAS` (`CODIGO_FILIAL`, `FILIAL`) VALUES
('ALP035', 'ALPHAVILLE               '),
('AFR014', 'ANALIA FRANCO            '),
('BAL063', 'BALNEARIO SHOPPING       '),
('BGI021', 'BARIGUI                  '),
('BSA043', 'BARRA SALVADOR           '),
('BAR048', 'BARRA SHOPPING           '),
('BSU023', 'BARRA SUL                '),
('BHS028', 'BH SHOPPING              '),
('BOU020', 'BOURBON                  '),
('BWA039', 'BOURBON WALLIG           '),
('BRA013', 'BRASILIA                 '),
('CAM005', 'CAMPINAS                 '),
('CDSB2C', 'CDSP E-COMMERCE          '),
('CNO009', 'CENTER NORTE             '),
('CSP064', 'CIDADE SAO PAULO'),
('CPA046', 'CONTINENTE PARK          '),
('CPL038', 'CRYSTAL PLAZA            '),
('DMM057', 'DIAMOND                  '),
('ELD042', 'ELDORADO                 '),
('GAL047', 'GALLERIA                 '),
('GVI029', 'GRANJA VIANA'),
('HIG011', 'HIGIENOPOLIS             '),
('IBI010', 'IBIRAPUERA'),
('IBR027', 'IGUATEMI BRASILIA        '),
('IES052', 'IGUATEMI ESPLANADA       '),
('IFO030', 'IGUATEMI FORTALEZA'),
('IPO045', 'IGUATEMI PORTO ALEGRE    '),
('ISP058', 'IGUATEMI SAO PAULO       '),
('IRP060', 'IGUATEMI SJ RIO PRETO    '),
('IPA036', 'IPANEMA                  '),
('JKI037', 'JK IGUATEMI              '),
('JUN059', 'JUNDIAI SHOPPING         '),
('MET055', 'METROPOLITANO            '),
('MOR008', 'MORUMBI                  '),
('MUE017', 'MUELLER'),
('NEU062', 'NEUMARKT BLUMENAU        '),
('OFR016', 'OSCAR FREIRE             '),
('OBR041', 'OUTLET PREMIUM BRASILIA  '),
('OIT033', 'OUTLET PREMIUM ITUPEVA   '),
('PSC065', 'PARK SAO CAETANO         '),
('PDP050', 'PARQUE D PEDRO           '),
('PMA066', 'PARQUE MAIA              '),
('PAU012', 'PAULISTA                 '),
('PCF069', 'PLAZA CASA FORTE         '),
('PBE031', 'PRAIA DE BELAS           '),
('REC025', 'RECIFE                   '),
('RIB053', 'RIBEIRAO SHOPPING        '),
('RDB032', 'RIO DESIGN BARRA SHOPPING'),
('RMA044', 'RIO MAR                  '),
('RMF061', 'RIO MAR FORTALEZA        '),
('RSU067', 'RIO SUL                  '),
('SNO034', 'SALVADOR NORTE SHOPPING  '),
('SAL018', 'SALVADOR SHOPPING        '),
('SUR054', 'SANTA URSULA             '),
('SAV022', 'SAVASSI                  '),
('UBE056', 'UBERLANDIA               '),
('VOL051', 'VILA OLIMPIA.            '),
('VLO049', 'VILLA LOBOS              ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_TAB_QTDECLIENTES_LOJA_TOP4`
--

CREATE TABLE `BRC_TAB_QTDECLIENTES_LOJA_TOP4` (
  `FILIAL` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `QTDE_CLIENTES` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_TAB_QTDECLIENTES_LOJA_TOP4`
--

INSERT INTO `BRC_TAB_QTDECLIENTES_LOJA_TOP4` (`FILIAL`, `QTDE_CLIENTES`) VALUES
('MORUMBI                  ', 17889),
('BRASILIA                 ', 10046),
('IGUATEMI PORTO ALEGRE    ', 10001),
('IBIRAPUERA               ', 9983);

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_TAB_VENDA_CONCEITO_12M`
--

CREATE TABLE `BRC_TAB_VENDA_CONCEITO_12M` (
  `CONCEITO` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `VA` decimal(38,2) DEFAULT NULL,
  `QTDE_CLIENTES` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_TAB_VENDA_CONCEITO_12M`
--

INSERT INTO `BRC_TAB_VENDA_CONCEITO_12M` (`CONCEITO`, `VA`, `QTDE_CLIENTES`) VALUES
('A', 197.40, 2991),
('B', 197.38, 7994),
('C', 192.52, 30937),
('D', 168.66, 259182),
('E', 160.20, 32),
('F', 123.54, 403);

-- --------------------------------------------------------

--
-- Estrutura da tabela `BRC_USUARIOS`
--

CREATE TABLE `BRC_USUARIOS` (
  `ID` int(11) NOT NULL,
  `ID_MARCA` int(11) NOT NULL,
  `EMAIL` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `SENHA` varchar(60) COLLATE latin1_general_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UPDATED_AT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `BRC_USUARIOS`
--

INSERT INTO `BRC_USUARIOS` (`ID`, `ID_MARCA`, `EMAIL`, `SENHA`, `CREATED_AT`, `UPDATED_AT`) VALUES
(1, 1, 'shoulder@shoulder.com.br', '$2y$10$FzJeSULepX3MA5lvIqgX7uki7CUIiqJUtN0Pc1UaMwLAKKKdJsDJS', '2016-09-16 18:28:09', '2016-09-16 18:28:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BRC_APP_HISTORICO_COMPRAS`
--
ALTER TABLE `BRC_APP_HISTORICO_COMPRAS`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `BRC_CAMPANHA`
--
ALTER TABLE `BRC_CAMPANHA`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `BRC_MARCAS`
--
ALTER TABLE `BRC_MARCAS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `BRC_NEWSLETTER`
--
ALTER TABLE `BRC_NEWSLETTER`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `BRC_USUARIOS`
--
ALTER TABLE `BRC_USUARIOS`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BRC_APP_HISTORICO_COMPRAS`
--
ALTER TABLE `BRC_APP_HISTORICO_COMPRAS`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `BRC_CAMPANHA`
--
ALTER TABLE `BRC_CAMPANHA`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `BRC_MARCAS`
--
ALTER TABLE `BRC_MARCAS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `BRC_NEWSLETTER`
--
ALTER TABLE `BRC_NEWSLETTER`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `BRC_USUARIOS`
--
ALTER TABLE `BRC_USUARIOS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
