-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 20:17:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `todo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `profesorid` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `profesores` (`profesorid`, `username`, `apellido`, `email`, `password`, `estado`) VALUES
(1, 'Admin', 'Lopez', 'admin@ucateci.com', '$2y$10$yrEjEL9gXS8c6ReGvxwDlelU3pzGk5kDoiLk1ZNVsa2dMhy6Wq.lK', 'Activo'),
(2, 'Estudiante', 'Ara',  'estudiante@ucateci.com', '$2y$10$bf9f4J768oE.xn/NY.8H1.CH0viQ7X3p0rhgsPrzRx48eZ8ICWVBS', 'Activo'),
(3, 'Hector', 'Ara',  'hector@ucateci.com', '$2y$10$Q7IESxEAjLdu/akvObxex.3qIleZMUG4PD.P2XrLVCJikQRopwYDq', 'Activo');
--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `estudianteid` int(11) NOT NULL,
  `nombre` varchar(120) NOT NULL,
  `apellido` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`estudianteid`, `nombre`, `apellido`, `email`, `password`, `estado`) VALUES
(1, 'Jose', 'Ara',  'jose@ucateci.com', '$2y$10$MG4dBb8eslgckljzlZZXIuf99tbF..Ae6Cvy7JQH2gdKk/G3OGp5e', 'Activo'),
(2, 'Pedro', 'Ara',  'pedro123@ucateci.com', '$2y$10$TIwfpx7n2MydKNJajNfEN.qp.924cjE7AQN/b98qPEHWXeWaclZkm', 'Activo');

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `tareaid` int(11) NOT NULL AUTO_INCREMENT,
  `profesorid` int(11) NOT NULL,
  `titulo` varchar(120) NOT NULL,
  `asignacion` varchar(120) NOT NULL,
  `contenido` varchar(120) NOT NULL,
  `fecha_entrega` varchar(255) NOT NULL,
  `estado_tarea` varchar(120) NOT NULL,
  `estado` varchar(10) NOT NULL,

  PRIMARY KEY (`tareaid`),
	KEY `tareas_fk_profesorid` (`profesorid`),
	
	CONSTRAINT `tareas_fk_profesorid` FOREIGN KEY (`profesorid`) REFERENCES profesores (`profesorid`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`profesorid`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`estudianteid`);

--

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `profesorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiantes`
  MODIFY `estudianteid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
