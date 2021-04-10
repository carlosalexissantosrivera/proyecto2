-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-04-2021 a las 00:04:31
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `password`) VALUES
(3, 'Juan', '$2y$12$fquFH7XyDT6B6zRH763tPeP/CJC58cUOzHxCTXnAN2sDJp1HpvUSO'),
(2, 'Pedro', '$2y$12$ImoPTskdDbXEPFe51geN.uTs3ugDMHlKZM6djT/DnuPzeJqW3hN96'),
(1, 'CARLOS', '$2y$12$yzxqXPXorCUTXKDA6Nq61upbKQ1YQcbo6bvoVT0IZ9UbMQnQ7QKvK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

DROP TABLE IF EXISTS `contactos`;
CREATE TABLE IF NOT EXISTS `contactos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) DEFAULT NULL,
  `Nacimiento` varchar(15) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `Sexo` varchar(15) DEFAULT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Facebook` varchar(50) DEFAULT NULL,
  `Carrera` varchar(30) DEFAULT NULL,
  `Semestre` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`Id`, `Nombre`, `Apellido`, `Nacimiento`, `Edad`, `Sexo`, `Telefono`, `Facebook`, `Carrera`, `Semestre`) VALUES
(1, 'Abraham', 'Hernandez  ', '10/01/97  ', 22, 'Hombre  ', '5512121212', 'Abraham Hernandez  ', 'Contabilidad', 5),
(2, 'Adan', 'Rocha  ', '30/11/95  ', 24, 'Hombre  ', '5534678900', 'Adan Rocha', 'Administracion', 1),
(5, 'Alfonso', 'Arevalo', '06/10/1994', 25, 'Hombre', '5580077188', 'Alfonso G Arevalo', 'Informatica', 10),
(23, 'Andrea', 'Perez', '01/01/1997', 23, 'Mujer', '5544332211', 'Andrea Perez', 'Informatica', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
