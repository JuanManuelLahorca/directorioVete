-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2022 a las 12:00:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_directory`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `professional`
--

CREATE TABLE `professional` (
  `id_Professional` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Mail` varchar(30) NOT NULL,
  `Pass` varchar(200) NOT NULL,
  `Terms` tinyint(1) NOT NULL,
  `Role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `professional`
--

INSERT INTO `professional` (`id_Professional`, `Name`, `State`, `City`, `Phone`, `Mail`, `Pass`, `Terms`, `Role`) VALUES
(19, 'juan', 'Buenos Aires', 'Tandil', 23145678, 'juanmanuellahorca@gmail.com', '$2y$10$umznwFY1PCm0GAa7kdaw6urvvOWgDIdzKDAKjM4Ar2vOaIZKPpZMe', 0, 'a'),
(20, 'Soledad Schmidt', 'Buenos Aires', 'Tandil', 2255123456, 'sol@gmail.com', '$2y$10$f5MarpIsrV3a/.zBj7E9OewA3SNgtNN6b6l9LQYXEdCJY4B03HyYK', 0, 'u'),
(21, 'Melina', 'Buenos Aires', 'Tandil', 2494123456, 'melina@gmail.com', '$2y$10$S2xkusSa7xL8oLMS/VVjl.EHn69USkPFLC5tqcUgxaYcCGaWmMALu', 0, 'u'),
(22, 'Agustina Errico', 'Santa Fe', 'Rosario', 2494123456, 'agus@gmail.com', '$2y$10$BqK/WcdiAfwhJW5K1gEc1.GR42UvsiCS2dfq/vvlPw37JWsjMl6sO', 0, 'u');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `professional`
--
ALTER TABLE `professional`
  ADD PRIMARY KEY (`id_Professional`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `professional`
--
ALTER TABLE `professional`
  MODIFY `id_Professional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
