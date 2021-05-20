-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-05-2021 a las 17:15:45
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.4.13

DROP DATABASE IF EXISTS Intelcost_bienes;
CREATE DATABASE Intelcost_bienes;

use Intelcost_bienes;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

DROP TABLE IF EXISTS `inmuebles`;

CREATE TABLE `inmuebles` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Ciudad` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Precio` varchar(255) NOT NULL,
  `Codigo_Postal`int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_inmuebles` (
  `Id` int(10) UNSIGNED NOT NULL,
  `Id_inmueble` int(10) UNSIGNED NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `inmuebles`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `user_inmuebles`
  ADD PRIMARY KEY (`Id`);

ALTER TABLE `inmuebles`
  MODIFY `Id` int(10) UNSIGNED NOT NULL;

ALTER TABLE `user_inmuebles`
  MODIFY `Id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


