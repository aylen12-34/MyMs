-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2025 a las 15:07:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `myms`
--
-- Crear la base de datos 'myms'
CREATE DATABASE IF NOT EXISTS `myms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Usar la base de datos creada
USE `myms`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ci` int(11) NOT NULL,
  `telf` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ci`, `telf`, `nombre`) VALUES
(93782, '235456', 'aylen'),
(12398755, '60387793', 'Mia'),
(32412321, '213213213', 'zahir'),
(222221111, '33333', 'lorgio'),
(343434343, '34343434343', 'lorgio'),
(2147483647, '789032', 'mathy');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cantidad` varchar(45) DEFAULT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `idproducto` int(11) NOT NULL,
  `preciounitario` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cantidad`, `producto`, `idproducto`, `preciounitario`) VALUES
('3', 'brownie', 456, '70'),
('6', 'brownie', 324324, '70');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `cliente` varchar(45) DEFAULT NULL,
  `numtelf` int(11) NOT NULL,
  `producto` varchar(45) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`cliente`, `numtelf`, `producto`, `cantidad`) VALUES
('gene', 2453678, 'frappe+brownie', 3),
('carlos', 23432424, 'brownie', 345),
('mathy', 23432565, 'torta', 2),
('carlos p', 43654765, 'brownie', 3),
('genesis', 62783947, 'te + crossant', 3),
('sebas', 66655555, 'frappe de oreo', 3),
('arturo', 394443661, 'chocolate color esteban', 35);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`numtelf`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
