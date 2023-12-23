-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Dic 14, 2023 alle 09:36
-- Versione del server: 5.5.68-MariaDB
-- Versione PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fi_licursi`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `PAY_log`
--

CREATE TABLE `PAY_log` (
  `acc_no` int(10) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `PAY_log`
--

INSERT INTO `PAY_log` (`acc_no`, `time`) VALUES
(11, '2023-12-13 08:40:02'),
(22, '2023-12-14 09:09:27'),
(22, '2023-12-14 09:15:03'),
(11, '2023-12-14 09:32:53');

-- --------------------------------------------------------

--
-- Struttura della tabella `PAY_tran`
--

CREATE TABLE `PAY_tran` (
  `trans_id` int(11) NOT NULL,
  `acc_no` int(15) NOT NULL,
  `credit` int(15) NOT NULL,
  `debit` int(15) NOT NULL,
  `upamount` int(15) NOT NULL,
  `TIME` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `PAY_tran`
--

INSERT INTO `PAY_tran` (`trans_id`, `acc_no`, `credit`, `debit`, `upamount`, `TIME`) VALUES
(45, 11, 1, 0, 9730205, '2023-12-14 09:21:29'),
(46, 22, 0, 1, 9755142, '2023-12-14 09:21:29'),
(47, 22, 1, 0, 9755143, '2023-12-14 09:33:18'),
(48, 11, 0, 1, 9730204, '2023-12-14 09:33:18');

-- --------------------------------------------------------

--
-- Struttura della tabella `PAY_user`
--

CREATE TABLE `PAY_user` (
  `acc_no` int(15) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `documento` varchar(12) NOT NULL,
  `amount` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `PAY_user`
--

INSERT INTO `PAY_user` (`acc_no`, `name`, `pass`, `email`, `documento`, `amount`) VALUES
(11, 'io', 'R.123456', 'io@io.com', '100', 9730204),
(22, 'gino', 'R.123456', 'gbar@io.com', '200', 9755143);

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_Carrozza`
--

CREATE TABLE `SFT_Carrozza` (
  `idCarrozza` int(11) NOT NULL,
  `tipoCarrozza` varchar(50) DEFAULT NULL,
  `capacita` int(11) DEFAULT NULL,
  `stato` enum('disponibile','assegnato') DEFAULT 'disponibile'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_Carrozza`
--

INSERT INTO `SFT_Carrozza` (`idCarrozza`, `tipoCarrozza`, `capacita`, `stato`) VALUES
(1, 'Carrozze serie 1928 B1', 36, 'disponibile'),
(2, 'Carrozze serie 1928 B2', 36, 'disponibile'),
(3, 'Carrozze serie 1928 B3', 36, 'disponibile'),
(4, 'Carrozze serie 1930 C6', 48, 'disponibile'),
(5, 'Carrozze serie 1930 C9', 48, 'disponibile'),
(6, 'Carrozza serie 1952 C12', 52, 'disponibile'),
(7, 'Bagagliai serie 1910 cd1', 12, 'disponibile'),
(8, 'Bagagliai serie 1910 cd2', 12, 'disponibile');

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_classseats`
--

CREATE TABLE `SFT_classseats` (
  `trainno` int(11) NOT NULL,
  `sp` varchar(50) NOT NULL COMMENT 'Starting_Point',
  `dp` varchar(50) NOT NULL COMMENT 'Destination_Point',
  `doj` date NOT NULL,
  `class` varchar(10) NOT NULL,
  `fare` int(11) NOT NULL,
  `seatsleft` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_composizioneTreno`
--

CREATE TABLE `SFT_composizioneTreno` (
  `idTreno` int(11) NOT NULL,
  `idLocomotiva` int(11) DEFAULT NULL,
  `idCarrozza` int(11) DEFAULT NULL,
  `tname` varchar(50) NOT NULL COMMENT 'Nome Treno',
  `sp` varchar(50) NOT NULL COMMENT 'Stazione Partenza',
  `st` time NOT NULL COMMENT 'Orario Arrivo',
  `dp` varchar(50) NOT NULL COMMENT 'Stazione di Destinazione',
  `dt` time NOT NULL,
  `dd` varchar(10) DEFAULT NULL COMMENT 'Giorno',
  `distance` int(11) NOT NULL COMMENT 'Distanza',
  `ncarrozza` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_composizioneTreno`
--

INSERT INTO `SFT_composizioneTreno` (`idTreno`, `idLocomotiva`, `idCarrozza`, `tname`, `sp`, `st`, `dp`, `dt`, `dd`, `distance`, `ncarrozza`) VALUES
(13, NULL, NULL, 'AN 56.2', 'Torre Spavento', '08:00:00', 'Villa San Felice', '10:00:00', '1', 54, NULL),
(15, NULL, NULL, 'AN 56.2', 'Torre Spavento', '10:36:00', 'Villa San Felice', '15:36:00', '15/11/2023', 49, NULL),
(16, NULL, NULL, 'AN 56.2', 'Torre Spavento', '00:37:00', 'Villa Pietrosa', '05:42:00', '2', 5, 'Carrozze serie 1928 B1'),
(17, NULL, NULL, 'AN 56.2', 'Torre Spavento', '00:37:00', 'Villa Pietrosa', '05:42:00', '2', 5, 'Carrozze serie 1928 B1'),
(18, NULL, NULL, 'AN 56.2', 'Torre Spavento', '00:37:00', 'Villa Pietrosa', '05:42:00', '2', 5, 'Carrozze serie 1928 B1');

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_haTratta`
--

CREATE TABLE `SFT_haTratta` (
  `idStazione` int(11) DEFAULT NULL,
  `idTratta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_Motrice`
--

CREATE TABLE `SFT_Motrice` (
  `idLocomotiva` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipoLocomotiva` enum('locomotiva','automotrice') DEFAULT NULL,
  `capacita` int(11) DEFAULT NULL,
  `stato` enum('disponibile','assegnato') DEFAULT 'disponibile'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_Motrice`
--

INSERT INTO `SFT_Motrice` (`idLocomotiva`, `nome`, `tipoLocomotiva`, `capacita`, `stato`) VALUES
(1, 'AN 56.2', 'automotrice', 56, 'disponibile'),
(2, 'AN 56.4', 'automotrice', 56, 'disponibile'),
(3, 'SFT.3 Cavour', 'locomotiva', 0, 'disponibile'),
(4, 'SFT.4 Vittorio Emanuele', 'locomotiva', 0, 'disponibile'),
(5, 'SFT.6 Garibaldi', 'locomotiva', 0, 'disponibile');

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_schedule`
--

CREATE TABLE `SFT_schedule` (
  `id` int(11) NOT NULL,
  `trainno` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `arrival_time` time NOT NULL,
  `departure_time` time NOT NULL DEFAULT '00:00:00',
  `distance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_schedule`
--

INSERT INTO `SFT_schedule` (`id`, `trainno`, `nome`, `arrival_time`, `departure_time`, `distance`) VALUES
(42, 0, 'Rocca Pietrosa', '22:30:00', '22:30:00', 0),
(43, 0, 'SFT.6 Garibaldi', '22:40:00', '22:45:00', 4),
(44, 0, 'Porto Spigola', '23:33:00', '23:33:00', 15),
(45, 0, 'Torre Spavento', '08:00:00', '08:00:00', 0),
(46, 0, 'AN 56.2', '08:05:00', '08:10:00', 2),
(47, 0, 'AN 56.2', '08:20:00', '08:25:00', 5),
(48, 0, 'AN 56.2', '08:35:00', '08:40:00', 4),
(49, 0, 'AN 56.2', '08:50:00', '08:55:00', 7),
(50, 0, 'AN 56.2', '09:10:00', '09:15:00', 7),
(51, 0, 'AN 56.2', '09:25:00', '09:30:00', 8),
(52, 0, 'AN 56.2', '09:40:00', '09:45:00', 6),
(53, 0, 'AN 56.2', '09:55:00', '10:00:00', 8),
(54, 0, 'AN 56.2', '10:15:00', '10:20:00', 8),
(55, 0, 'Villa San Felice', '10:00:00', '10:00:00', 54),
(56, 0, 'Torre Spavento', '10:36:00', '10:36:00', 0),
(57, 0, 'AN 56.2', '10:50:00', '10:55:00', 30),
(58, 0, 'AN 56.2', '11:22:00', '11:45:00', 10),
(59, 0, 'AN 56.2', '11:55:00', '15:30:00', 5),
(60, 0, 'Villa San Felice', '15:36:00', '15:36:00', 49),
(61, 0, 'Rocca Pietrosa', '03:37:00', '03:37:00', 0),
(62, 0, 'Porto Spigola', '04:37:00', '04:37:00', 20),
(63, 0, 'Torre Spavento', '00:37:00', '00:37:00', 0),
(64, 0, 'Villa Pietrosa', '05:42:00', '05:42:00', 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_Stazione`
--

CREATE TABLE `SFT_Stazione` (
  `idSTazione` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `distanza` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_Stazione`
--

INSERT INTO `SFT_Stazione` (`idSTazione`, `nome`, `distanza`) VALUES
(1, 'Torre Spavento', 0),
(2, 'Prato Terra', 2.7),
(3, 'Rocca Pietrosa', 7.58),
(4, 'Villa Pietrosa', 12.68),
(5, 'Villa Santa maria', 16.9),
(6, 'Pietra Santa Maria', 23.95),
(7, 'Castro Marino', 31.5),
(8, 'Porto Spigola', 39.5),
(9, 'Porto San Felice', 46),
(10, 'Villa San Felice', 54.68);

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_Tratta`
--

CREATE TABLE `SFT_Tratta` (
  `idTratta` int(11) NOT NULL,
  `stPartenza` int(11) NOT NULL,
  `stArrivo` int(11) NOT NULL,
  `distanza` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_utenteRegistrato`
--

CREATE TABLE `SFT_utenteRegistrato` (
  `username` varchar(20) NOT NULL,
  `postiPrenotati` int(11) DEFAULT NULL,
  `idutenteRegistrato` int(11) NOT NULL,
  `password` char(40) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cognome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_utenteRegistrato`
--

INSERT INTO `SFT_utenteRegistrato` (`username`, `postiPrenotati`, `idutenteRegistrato`, `password`, `nome`, `cognome`, `email`, `registration_date`) VALUES
('', NULL, 3, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'den', 'xioping', 'den@io.com', '2023-09-23 09:51:14'),
('', NULL, 4, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'sol', 'lasi', 'sol@io.com', '2023-09-23 10:05:06'),
('', NULL, 5, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'vasco', 'rossi', 'vrossi@io.com', '2023-09-24 10:50:18'),
('', NULL, 6, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'gi', 'gio', 'gi@io.com', '2023-09-25 08:08:29'),
('', NULL, 7, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'tre', 'tre', 'tre@io.com', '2023-09-25 08:15:09'),
('', NULL, 8, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'bar', 'can', 'bar@io.com', '2023-09-25 08:17:02'),
('', NULL, 9, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'ter', 'ter', 'ter@io.com', '2023-09-25 08:19:13'),
('', NULL, 10, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'ciro', 'immobile', 'anfame@io.com', '2023-09-25 11:51:48'),
('', NULL, 11, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'mar', 'sey', 'sey@io.com', '2023-09-25 11:52:35'),
('nicname', NULL, 12, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'nic', 'name', 'nic@io.com', '2023-09-25 12:20:31'),
('', NULL, 13, 'f953abd51c33d158f46e9034b1937b3c3890b0cc', 'foxy', 'lady', 'flady@io.com', '2023-10-06 16:50:19'),
('', NULL, 14, '7a69fc5c5879c30ed87588d768934d7c1354ee08', 'valentina', 'mastrullo', 'vmastrullo@io.com', '2023-10-16 16:36:50'),
('', NULL, 15, '2fce4218c1d6c3f047a8eb5d52d0458207080a58', 'primo', 'utente', 'primoutente@io.com', '2023-12-03 09:03:54'),
('', NULL, 16, '2fce4218c1d6c3f047a8eb5d52d0458207080a58', 'io', 'io', 'io@io.com', '2023-12-03 09:27:26'),
('', NULL, 17, '2fce4218c1d6c3f047a8eb5d52d0458207080a58', 'nebbia', 'suicolli', 'nebbia@io.com', '2023-12-08 08:52:55');

-- --------------------------------------------------------

--
-- Struttura della tabella `SFT_utentiBackOffice`
--

CREATE TABLE `SFT_utentiBackOffice` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `profile` enum('backoffice_amministrativo','backoffice_esercizio') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `SFT_utentiBackOffice`
--

INSERT INTO `SFT_utentiBackOffice` (`id`, `username`, `password`, `nome`, `cognome`, `mail`, `profile`) VALUES
(1, 'acimarosa', 'pwdcimarosa', 'antonio', 'cimarosa', 'acimarosa@sft.it', 'backoffice_amministrativo'),
(2, 'gbramieri', 'pwdbramieri', 'gino', 'bramieri', 'gbramieri@sft.it', 'backoffice_esercizio');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `PAY_tran`
--
ALTER TABLE `PAY_tran`
  ADD PRIMARY KEY (`trans_id`),
  ADD UNIQUE KEY `trans_id` (`trans_id`);

--
-- Indici per le tabelle `PAY_user`
--
ALTER TABLE `PAY_user`
  ADD PRIMARY KEY (`acc_no`),
  ADD UNIQUE KEY `aadhar` (`documento`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `SFT_Carrozza`
--
ALTER TABLE `SFT_Carrozza`
  ADD PRIMARY KEY (`idCarrozza`);

--
-- Indici per le tabelle `SFT_classseats`
--
ALTER TABLE `SFT_classseats`
  ADD PRIMARY KEY (`trainno`,`sp`,`dp`,`doj`,`class`),
  ADD KEY `class` (`class`),
  ADD KEY `sp` (`sp`,`dp`),
  ADD KEY `dp` (`dp`);

--
-- Indici per le tabelle `SFT_composizioneTreno`
--
ALTER TABLE `SFT_composizioneTreno`
  ADD PRIMARY KEY (`idTreno`),
  ADD KEY `idLocomotiva` (`idLocomotiva`),
  ADD KEY `idCarrozza` (`idCarrozza`),
  ADD KEY `sp` (`sp`),
  ADD KEY `dp` (`dp`);

--
-- Indici per le tabelle `SFT_haTratta`
--
ALTER TABLE `SFT_haTratta`
  ADD KEY `idStazione` (`idStazione`),
  ADD KEY `idTratta` (`idTratta`);

--
-- Indici per le tabelle `SFT_Motrice`
--
ALTER TABLE `SFT_Motrice`
  ADD PRIMARY KEY (`idLocomotiva`);

--
-- Indici per le tabelle `SFT_schedule`
--
ALTER TABLE `SFT_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainno` (`trainno`),
  ADD KEY `sname` (`nome`),
  ADD KEY `id` (`id`),
  ADD KEY `distance` (`distance`),
  ADD KEY `id_2` (`id`);

--
-- Indici per le tabelle `SFT_Stazione`
--
ALTER TABLE `SFT_Stazione`
  ADD PRIMARY KEY (`idSTazione`);

--
-- Indici per le tabelle `SFT_Tratta`
--
ALTER TABLE `SFT_Tratta`
  ADD PRIMARY KEY (`idTratta`),
  ADD KEY `stPartenza` (`stPartenza`),
  ADD KEY `stArrivo` (`stArrivo`);

--
-- Indici per le tabelle `SFT_utenteRegistrato`
--
ALTER TABLE `SFT_utenteRegistrato`
  ADD PRIMARY KEY (`idutenteRegistrato`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indici per le tabelle `SFT_utentiBackOffice`
--
ALTER TABLE `SFT_utentiBackOffice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `PAY_tran`
--
ALTER TABLE `PAY_tran`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT per la tabella `SFT_composizioneTreno`
--
ALTER TABLE `SFT_composizioneTreno`
  MODIFY `idTreno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `SFT_schedule`
--
ALTER TABLE `SFT_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT per la tabella `SFT_Stazione`
--
ALTER TABLE `SFT_Stazione`
  MODIFY `idSTazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `SFT_utenteRegistrato`
--
ALTER TABLE `SFT_utenteRegistrato`
  MODIFY `idutenteRegistrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `SFT_utentiBackOffice`
--
ALTER TABLE `SFT_utentiBackOffice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `SFT_composizioneTreno`
--
ALTER TABLE `SFT_composizioneTreno`
  ADD CONSTRAINT `SFT_composizioneTreno_ibfk_1` FOREIGN KEY (`idLocomotiva`) REFERENCES `SFT_Motrice` (`idLocomotiva`),
  ADD CONSTRAINT `SFT_composizioneTreno_ibfk_2` FOREIGN KEY (`idCarrozza`) REFERENCES `SFT_Carrozza` (`idCarrozza`);

--
-- Limiti per la tabella `SFT_haTratta`
--
ALTER TABLE `SFT_haTratta`
  ADD CONSTRAINT `SFT_haTratta_ibfk_1` FOREIGN KEY (`idStazione`) REFERENCES `SFT_Stazione` (`idStazione`),
  ADD CONSTRAINT `SFT_haTratta_ibfk_2` FOREIGN KEY (`idTratta`) REFERENCES `SFT_Tratta` (`idTratta`);

--
-- Limiti per la tabella `SFT_Tratta`
--
ALTER TABLE `SFT_Tratta`
  ADD CONSTRAINT `SFT_Tratta_ibfk_1` FOREIGN KEY (`stPartenza`) REFERENCES `SFT_Stazione` (`idStazione`),
  ADD CONSTRAINT `SFT_Tratta_ibfk_2` FOREIGN KEY (`stArrivo`) REFERENCES `SFT_Stazione` (`idStazione`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
