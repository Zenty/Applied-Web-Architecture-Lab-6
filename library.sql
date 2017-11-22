-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 nov 2017 kl 16:07
-- Serverversion: 10.1.13-MariaDB
-- PHP-version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `library`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `authors`
--

CREATE TABLE `authors` (
  `authorid` int(11) NOT NULL,
  `author` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `SSN` char(50) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `authors`
--

INSERT INTO `authors` (`authorid`, `author`, `SSN`) VALUES
(1, 'Johan Kohlin', '1234567'),
(2, 'John Bauer', '2345678'),
(3, 'R. K. Rowling', '3456789'),
(4, 'Nolan Ideos', '4567890'),
(5, 'Me', '5678901');

-- --------------------------------------------------------

--
-- Tabellstruktur `books`
--

CREATE TABLE `books` (
  `bookid` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `reserved` tinyint(1) DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `ISBN` char(50) COLLATE utf8_swedish_ci NOT NULL,
  `pages` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `books`
--

INSERT INTO `books` (`bookid`, `title`, `reserved`, `duedate`, `ISBN`, `pages`) VALUES
(1, 'Wordpress for you', NULL, NULL, '235232353', 500),
(2, 'PHP the easy way', 1, '2017-11-02', '57545545', 333),
(3, 'The big bad wolf', NULL, NULL, '54334434', 333),
(4, 'No Idea', NULL, NULL, '2342567', 1000),
(5, 'Title', NULL, NULL, '35235235', 2),
(6, 'My PHP Experience', 1, '2017-11-02', '6347347', 10);

-- --------------------------------------------------------

--
-- Tabellstruktur `book_authors`
--

CREATE TABLE `book_authors` (
  `bookid` int(11) NOT NULL,
  `authorid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `book_authors`
--

INSERT INTO `book_authors` (`bookid`, `authorid`, `date`) VALUES
(1, 1, '2017-11-22 13:40:52'),
(2, 2, '2017-11-22 13:40:55'),
(3, 3, '2017-11-22 13:40:59'),
(4, 4, '2017-11-22 13:41:02'),
(5, 5, '2017-11-22 13:41:06'),
(6, 5, '2017-11-22 13:41:10');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_swedish_ci NOT NULL,
  `userpass` varchar(100) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`userid`, `username`, `userpass`) VALUES
(1, 'admin', '6367c48dd193d56ea7b0baad25b19455e529f5ee');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorid`);

--
-- Index för tabell `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookid`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `userpass` (`userpass`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `authors`
--
ALTER TABLE `authors`
  MODIFY `authorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT för tabell `books`
--
ALTER TABLE `books`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
