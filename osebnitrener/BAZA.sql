-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Gostitelj: sql306.infinityfree.com
-- Čas nastanka: 18. jun 2025 ob 04.09
-- Različica strežnika: 10.6.19-MariaDB
-- Različica PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Zbirka podatkov: `if0_39050571_osebnitrener`
--

-- --------------------------------------------------------

--
-- Struktura tabele `clanki`
--

CREATE TABLE `clanki` (
  `id_c` int(11) NOT NULL,
  `naslov` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `clanki`
--

INSERT INTO `clanki` (`id_c`, `naslov`, `opis`, `id_u`) VALUES
(1, 'Pitje vode je zelo pomembno', 'Voda (H20) je zelo pomembna za življenje.', 4);

-- --------------------------------------------------------

--
-- Struktura tabele `komentarji`
--

CREATE TABLE `komentarji` (
  `id_k` int(11) NOT NULL,
  `ime` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_c` int(11) DEFAULT NULL,
  `id_u` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `komentarji`
--

INSERT INTO `komentarji` (`id_k`, `ime`, `opis`, `id_c`, `id_u`) VALUES
(1, '', 'res je', 1, 4),
(2, '', 'kjhgfds', 1, 5);

-- --------------------------------------------------------

--
-- Struktura tabele `opreme`
--

CREATE TABLE `opreme` (
  `id_o` int(11) NOT NULL,
  `ime` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tip` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_t` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `opreme`
--

INSERT INTO `opreme` (`id_o`, `ime`, `tip`, `opis`, `id_t`) VALUES
(1, 'Utez', 'Tezka', 'aaaa', 1);

-- --------------------------------------------------------

--
-- Struktura tabele `prijave`
--

CREATE TABLE `prijave` (
  `id_pr` int(11) NOT NULL,
  `datum_prijave` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_u` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `programi`
--

CREATE TABLE `programi` (
  `id_p` int(11) NOT NULL,
  `ime` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cena` float NOT NULL,
  `trajanje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `programi`
--

INSERT INTO `programi` (`id_p`, `ime`, `opis`, `cena`, `trajanje`) VALUES
(22, 'Vaje za moc', 'naporne vaje', 55.49, '2025-06-05 17:00:00');

-- --------------------------------------------------------

--
-- Struktura tabele `programi_treningi`
--

CREATE TABLE `programi_treningi` (
  `id_tp` int(11) NOT NULL,
  `id_t` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `slike`
--

CREATE TABLE `slike` (
  `id_s` int(11) NOT NULL,
  `url` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `id_c` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

-- --------------------------------------------------------

--
-- Struktura tabele `treningi`
--

CREATE TABLE `treningi` (
  `id_t` int(11) NOT NULL,
  `ime` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `trajanje` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `treningi`
--

INSERT INTO `treningi` (`id_t`, `ime`, `opis`, `trajanje`) VALUES
(1, 'Biceps curl', 'dvigovanje', '2025-06-17 18:48:30');

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki`
--

CREATE TABLE `uporabniki` (
  `id_u` int(11) NOT NULL,
  `ime` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `priimek` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `geslo` varchar(256) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rojstni_datum` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `spol` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `visina` float NOT NULL,
  `teza` float NOT NULL,
  `id_vu` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabniki`
--

INSERT INTO `uporabniki` (`id_u`, `ime`, `priimek`, `email`, `geslo`, `rojstni_datum`, `spol`, `visina`, `teza`, `id_vu`) VALUES
(1, 'tej', 'verbi?', 'tej.verbic@gmai.com', '1d8bdecc62d4572f3bb81b76e6971f1672c5d171', '2025-06-02 07:00:00', 'moški', 260, 85, 2),
(2, 'Martin', 'Tuk', 'martin.tuk@scv.si', '35738871c1d6e546e1d4559ad402adca6ee6f5a5', '2025-05-28 07:00:00', 'moški', 185, 80, 2),
(3, 'admin', 'admin', 'admin@admin.si', '1f6751fbad0230755e790b1f2e6a6efb08320594', '2007-12-25 08:00:00', 'zenski', 170, 60, 2),
(4, 'admin', 'admin', 'admin@admin.com', '1f6751fbad0230755e790b1f2e6a6efb08320594', '2025-06-17 17:21:48', 'moški', 187, 80, 1),
(5, 'Maša', 'Marinšek', 'masa@gmail.com', 'da84f29087bb43013ca22c66a52f9a35dd8a23bb', '2025-06-12 07:00:00', 'ženski', 160, 60, 2);

-- --------------------------------------------------------

--
-- Struktura tabele `uporabniki_programi`
--

CREATE TABLE `uporabniki_programi` (
  `id_uporabnik_program` int(11) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `datum_prijave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Odloži podatke za tabelo `uporabniki_programi`
--

INSERT INTO `uporabniki_programi` (`id_uporabnik_program`, `id_u`, `id_p`, `datum_prijave`) VALUES
(1, 3, 21, '2025-06-12 11:48:08');

-- --------------------------------------------------------

--
-- Struktura tabele `vrsta_uporabniki`
--

CREATE TABLE `vrsta_uporabniki` (
  `id_vu` int(11) NOT NULL,
  `ime` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `opis` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_slovenian_ci;

--
-- Indeksi zavrženih tabel
--

--
-- Indeksi tabele `clanki`
--
ALTER TABLE `clanki`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `IX_Relationship10` (`id_u`);

--
-- Indeksi tabele `komentarji`
--
ALTER TABLE `komentarji`
  ADD PRIMARY KEY (`id_k`),
  ADD KEY `IX_Relationship4` (`id_c`),
  ADD KEY `IX_Relationship12` (`id_u`);

--
-- Indeksi tabele `opreme`
--
ALTER TABLE `opreme`
  ADD PRIMARY KEY (`id_o`),
  ADD KEY `IX_Relationship11` (`id_t`);

--
-- Indeksi tabele `prijave`
--
ALTER TABLE `prijave`
  ADD PRIMARY KEY (`id_pr`),
  ADD KEY `IX_Relationship5` (`id_u`),
  ADD KEY `IX_Relationship6` (`id_p`);

--
-- Indeksi tabele `programi`
--
ALTER TABLE `programi`
  ADD PRIMARY KEY (`id_p`);

--
-- Indeksi tabele `programi_treningi`
--
ALTER TABLE `programi_treningi`
  ADD PRIMARY KEY (`id_tp`),
  ADD KEY `IX_Relationship8` (`id_t`),
  ADD KEY `IX_Relationship9` (`id_p`);

--
-- Indeksi tabele `slike`
--
ALTER TABLE `slike`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `IX_Relationship3` (`id_c`);

--
-- Indeksi tabele `treningi`
--
ALTER TABLE `treningi`
  ADD PRIMARY KEY (`id_t`);

--
-- Indeksi tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  ADD PRIMARY KEY (`id_u`),
  ADD KEY `IX_Relationship2` (`id_vu`);

--
-- Indeksi tabele `uporabniki_programi`
--
ALTER TABLE `uporabniki_programi`
  ADD PRIMARY KEY (`id_uporabnik_program`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Indeksi tabele `vrsta_uporabniki`
--
ALTER TABLE `vrsta_uporabniki`
  ADD PRIMARY KEY (`id_vu`);

--
-- AUTO_INCREMENT zavrženih tabel
--

--
-- AUTO_INCREMENT tabele `clanki`
--
ALTER TABLE `clanki`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT tabele `komentarji`
--
ALTER TABLE `komentarji`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT tabele `opreme`
--
ALTER TABLE `opreme`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT tabele `prijave`
--
ALTER TABLE `prijave`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `programi`
--
ALTER TABLE `programi`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT tabele `programi_treningi`
--
ALTER TABLE `programi_treningi`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `slike`
--
ALTER TABLE `slike`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT tabele `treningi`
--
ALTER TABLE `treningi`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT tabele `uporabniki`
--
ALTER TABLE `uporabniki`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT tabele `uporabniki_programi`
--
ALTER TABLE `uporabniki_programi`
  MODIFY `id_uporabnik_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT tabele `vrsta_uporabniki`
--
ALTER TABLE `vrsta_uporabniki`
  MODIFY `id_vu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
