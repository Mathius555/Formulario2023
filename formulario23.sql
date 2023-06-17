-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2021 a las 02:44:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/* base de datos de formulario 2023 */

CREATE TABLE 'usuario'(
  'Id_usuario' INT NOT NULL PRIMARY KEY,
  'nombre' VARCHAR (200) Not NULL,
  'apellido' VARCHAR (200) Not NULL,
   'DNI' INT (100) Not NULL,
  'telefono' INT (100) NOT NULL,
  'email' VARCHAR (200) Not NULL
  );
