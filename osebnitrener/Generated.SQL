/*
Created: 8. 05. 2025
Modified: 22. 05. 2025
Model: MySQL 8.0
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table programi

CREATE TABLE `programi`
(
  `id_p` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(200) NOT NULL,
  `opis` Varchar(200),
  `cena` Float NOT NULL,
  `trajanje` Timestamp NOT NULL,
  PRIMARY KEY (`id_p`)
)
;

-- Table treningi

CREATE TABLE `treningi`
(
  `id_t` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(200) NOT NULL,
  `opis` Varchar(200),
  `trajanje` Timestamp NOT NULL,
  PRIMARY KEY (`id_t`)
)
;

-- Table opreme

CREATE TABLE `opreme`
(
  `id_o` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(200) NOT NULL,
  `tip` Varchar(200) NOT NULL,
  `opis` Varchar(200),
  `id_t` Int,
  PRIMARY KEY (`id_o`)
)
;

CREATE INDEX `IX_Relationship11` ON `opreme` (`id_t`)
;

-- Table uporabniki

CREATE TABLE `uporabniki`
(
  `id_u` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(50) NOT NULL,
  `priimek` Varchar(200) NOT NULL,
  `email` Varchar(50) NOT NULL,
  `geslo` Varchar(256) NOT NULL,
  `rojstni_datum` Timestamp NOT NULL,
  `spol` Varchar(10) NOT NULL,
  `visina` Float NOT NULL,
  `teza` Float NOT NULL,
  `id_vu` Int,
  PRIMARY KEY (`id_u`)
)
;

CREATE INDEX `IX_Relationship2` ON `uporabniki` (`id_vu`)
;

-- Table vrsta_uporabniki

CREATE TABLE `vrsta_uporabniki`
(
  `id_vu` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(50) NOT NULL,
  `opis` Varchar(200),
  PRIMARY KEY (`id_vu`)
)
;

-- Table clanki

CREATE TABLE `clanki`
(
  `id_c` Int NOT NULL AUTO_INCREMENT,
  `naslov` Varchar(50) NOT NULL,
  `opis` Varchar(200),
  `id_u` Int,
  PRIMARY KEY (`id_c`)
)
;

CREATE INDEX `IX_Relationship10` ON `clanki` (`id_u`)
;

-- Table slike

CREATE TABLE `slike`
(
  `id_s` Int NOT NULL AUTO_INCREMENT,
  `url` Varchar(200) NOT NULL,
  `opis` Varchar(200),
  `id_c` Int,
  PRIMARY KEY (`id_s`)
)
;

CREATE INDEX `IX_Relationship3` ON `slike` (`id_c`)
;

-- Table komentarji

CREATE TABLE `komentarji`
(
  `id_k` Int NOT NULL AUTO_INCREMENT,
  `ime` Varchar(200) NOT NULL,
  `opis` Varchar(200),
  `id_c` Int,
  `id_u` Int,
  PRIMARY KEY (`id_k`)
)
;

CREATE INDEX `IX_Relationship4` ON `komentarji` (`id_c`)
;

CREATE INDEX `IX_Relationship12` ON `komentarji` (`id_u`)
;

-- Table prijave

CREATE TABLE `prijave`
(
  `id_pr` Int NOT NULL AUTO_INCREMENT,
  `datum_prijave` Timestamp NOT NULL,
  `id_u` Int,
  `id_p` Int,
  PRIMARY KEY (`id_pr`)
)
;

CREATE INDEX `IX_Relationship5` ON `prijave` (`id_u`)
;

CREATE INDEX `IX_Relationship6` ON `prijave` (`id_p`)
;

-- Table programi_treningi

CREATE TABLE `programi_treningi`
(
  `id_tp` Int NOT NULL AUTO_INCREMENT,
  `id_t` Int,
  `id_p` Int,
  PRIMARY KEY (`id_tp`)
)
;

CREATE INDEX `IX_Relationship8` ON `programi_treningi` (`id_t`)
;

CREATE INDEX `IX_Relationship9` ON `programi_treningi` (`id_p`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `uporabniki` ADD CONSTRAINT `Relationship2` FOREIGN KEY (`id_vu`) REFERENCES `vrsta_uporabniki` (`id_vu`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `slike` ADD CONSTRAINT `Relationship3` FOREIGN KEY (`id_c`) REFERENCES `clanki` (`id_c`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `komentarji` ADD CONSTRAINT `Relationship4` FOREIGN KEY (`id_c`) REFERENCES `clanki` (`id_c`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `prijave` ADD CONSTRAINT `Relationship5` FOREIGN KEY (`id_u`) REFERENCES `uporabniki` (`id_u`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `prijave` ADD CONSTRAINT `Relationship6` FOREIGN KEY (`id_p`) REFERENCES `programi` (`id_p`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `programi_treningi` ADD CONSTRAINT `Relationship8` FOREIGN KEY (`id_t`) REFERENCES `treningi` (`id_t`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `programi_treningi` ADD CONSTRAINT `Relationship9` FOREIGN KEY (`id_p`) REFERENCES `programi` (`id_p`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `clanki` ADD CONSTRAINT `Relationship10` FOREIGN KEY (`id_u`) REFERENCES `uporabniki` (`id_u`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `opreme` ADD CONSTRAINT `Relationship11` FOREIGN KEY (`id_t`) REFERENCES `treningi` (`id_t`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

ALTER TABLE `komentarji` ADD CONSTRAINT `Relationship12` FOREIGN KEY (`id_u`) REFERENCES `uporabniki` (`id_u`) ON DELETE RESTRICT ON UPDATE RESTRICT
;

