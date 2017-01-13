CREATE DATABASE Zikwel;
USE Zikwel;

CREATE TABLE `bestellingen` (
    `id` INT(8) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
    `klant` INT(8) NOT NULL,
    `broodje` VARCHAR(64) NOT NULL,
    `beleg` VARCHAR(512) NOT NULL
);

CREATE TABLE `klanten` (
    `id` INT(8) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
    `naam` VARCHAR(256) NOT NULL,
    `adresgegevens` VARCHAR(512) NOT NULL,
    `rekeningid` INT(8)
);

CREATE TABLE `rekeningen` (
    `id` INT(8) PRIMARY KEY NOT NULL UNIQUE AUTO_INCREMENT,
    `naam` VARCHAR(256) NOT NULL,
    `IBAN` VARCHAR(32) NOT NULL
);