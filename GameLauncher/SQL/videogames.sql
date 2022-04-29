-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 27, 2022 alle 19:11
-- Versione del server: 10.4.17-MariaDB
-- Versione PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videogames`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `games`
--

CREATE TABLE `games` (
  `gameCode` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `games`
--

INSERT INTO `games` (`gameCode`, `description`, `img`, `name`, `link`) VALUES
('CAMPOMINATO', 'Gioco di campo di minato', '../PNG/campo_minato.png', 'Campo Minato', '../Minigames/campoMinato/index.html'),
('SNAKE', 'Gioco di snake', '../PNG/snake.png', 'Snake', '../Minigames/snake/index.html');

-- --------------------------------------------------------

--
-- Struttura della tabella `scores`
--

CREATE TABLE `scores` (
  `userID` int(11) NOT NULL,
  `gameCode` varchar(256) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameCode`);

--
-- Indici per le tabelle `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`userID`,`gameCode`),
  ADD KEY `fkscoresusers` (`userID`),
  ADD KEY `fkscoresgames` (`gameCode`) USING BTREE;

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fkscoresgames` FOREIGN KEY (`gameCode`) REFERENCES `games` (`gameCode`),
  ADD CONSTRAINT `fkscoresusers` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
