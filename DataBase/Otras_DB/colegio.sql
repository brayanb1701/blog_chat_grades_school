-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2019 a las 08:38:47
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_alumno`
--

CREATE TABLE `colegio_alumno` (
  `alumno_ident` varchar(10) NOT NULL,
  `alumno_nombres` varchar(40) NOT NULL,
  `alumno_apellidos` varchar(40) NOT NULL,
  `alumno_email` varchar(100) NOT NULL,
  `alumno_edad` int(11) NOT NULL,
  `codigo_curso` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio_alumno`
--

INSERT INTO `colegio_alumno` (`alumno_ident`, `alumno_nombres`, `alumno_apellidos`, `alumno_email`, `alumno_edad`, `codigo_curso`) VALUES
('1005370012', 'Juan', 'Rodriguez', 'juanrodri@gmail.com', 15, '10a'),
('1005498302', 'Maria Camila', 'Mendoza Sandoval', 'mariac31@gmail.com', 16, '10b'),
('1005630048', 'Diego', 'Orejuela Niño', 'diegorej@gmail.com', 18, '11b'),
('1005728394', 'Luisa', 'Perez', 'luisa54@gmail.com', 17, '11a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_asignatura`
--

CREATE TABLE `colegio_asignatura` (
  `asignatura_codigo` int(11) NOT NULL,
  `asignatura_nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio_asignatura`
--

INSERT INTO `colegio_asignatura` (`asignatura_codigo`, `asignatura_nombre`) VALUES
(1, 'Matematicas'),
(2, 'Ingles'),
(3, 'Español'),
(4, 'Sociales'),
(5, 'Filosofia'),
(6, 'Fisica'),
(7, 'Quimica'),
(8, 'Biologia'),
(9, 'Educacion Fisica'),
(10, 'Etica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_curso`
--

CREATE TABLE `colegio_curso` (
  `curso_codigo` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio_curso`
--

INSERT INTO `colegio_curso` (`curso_codigo`) VALUES
('10a'),
('10b'),
('11a'),
('11b'),
('1a'),
('2a'),
('2b'),
('3a'),
('3b'),
('4a'),
('4b'),
('5a'),
('5b'),
('6a'),
('6b'),
('7a'),
('7b'),
('8a'),
('8b'),
('9a'),
('9b');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_notas`
--

CREATE TABLE `colegio_notas` (
  `id` int(11) NOT NULL,
  `ident_alumno` varchar(10) NOT NULL,
  `codigo_asignatura` int(11) NOT NULL,
  `anno` year(4) NOT NULL,
  `periodo` varchar(1) NOT NULL,
  `nota1` int(11) DEFAULT NULL,
  `nota2` int(11) DEFAULT NULL,
  `nota3` int(11) DEFAULT NULL,
  `nota4` int(11) DEFAULT NULL,
  `acum` int(11) DEFAULT NULL,
  `definitiva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_profesor`
--

CREATE TABLE `colegio_profesor` (
  `profesor_ident` varchar(10) NOT NULL,
  `profesor_nombres` varchar(40) NOT NULL,
  `profesor_apellidos` varchar(40) NOT NULL,
  `profesor_email` varchar(100) NOT NULL,
  `profesor_edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio_profesor`
--

INSERT INTO `colegio_profesor` (`profesor_ident`, `profesor_nombres`, `profesor_apellidos`, `profesor_email`, `profesor_edad`) VALUES
('30193843', 'Daniela', 'Jaimes', 'danijaimes@outlook.com', 28),
('5723193', 'Mauricio', 'Miranda', 'maurom@gmail.com', 35),
('5922813', 'Daniel', 'Quijano', 'danielq12@hotmail.com', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_profesor_curso_asignatura`
--

CREATE TABLE `colegio_profesor_curso_asignatura` (
  `id` int(11) NOT NULL,
  `ident_profesor` varchar(10) NOT NULL,
  `codigo_curso` varchar(3) NOT NULL,
  `codigo_asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colegio_profesor_curso_asignatura`
--

INSERT INTO `colegio_profesor_curso_asignatura` (`id`, `ident_profesor`, `codigo_curso`, `codigo_asignatura`) VALUES
(1, '5922813', '11a', 2),
(2, '30193843', '10a', 1),
(3, '30193843', '11a', 1),
(4, '5723193', '10b', 5),
(5, '5723193', '10a', 5),
(6, '30193843', '10b', 2),
(7, '30193843', '11b', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_profesor_curso_msg`
--

CREATE TABLE `colegio_profesor_curso_msg` (
  `id` int(11) NOT NULL,
  `ident_profesor` varchar(10) NOT NULL,
  `codigo_curso` varchar(3) NOT NULL,
  `mensaje` text NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio_profesor_estudiante_msg`
--

CREATE TABLE `colegio_profesor_estudiante_msg` (
  `id` int(11) NOT NULL,
  `ident_profesor` varchar(10) NOT NULL,
  `ident_alumno` varchar(10) NOT NULL,
  `sender` varchar(10) NOT NULL,
  `mensaje` text NOT NULL,
  `hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colegio_alumno`
--
ALTER TABLE `colegio_alumno`
  ADD PRIMARY KEY (`alumno_ident`),
  ADD KEY `codigo_curso` (`codigo_curso`);

--
-- Indices de la tabla `colegio_asignatura`
--
ALTER TABLE `colegio_asignatura`
  ADD PRIMARY KEY (`asignatura_codigo`);

--
-- Indices de la tabla `colegio_curso`
--
ALTER TABLE `colegio_curso`
  ADD PRIMARY KEY (`curso_codigo`);

--
-- Indices de la tabla `colegio_notas`
--
ALTER TABLE `colegio_notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ident_alumno` (`ident_alumno`),
  ADD KEY `codigo_asignatura` (`codigo_asignatura`);

--
-- Indices de la tabla `colegio_profesor`
--
ALTER TABLE `colegio_profesor`
  ADD PRIMARY KEY (`profesor_ident`);

--
-- Indices de la tabla `colegio_profesor_curso_asignatura`
--
ALTER TABLE `colegio_profesor_curso_asignatura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_asignatura` (`codigo_asignatura`),
  ADD KEY `ident_profesor` (`ident_profesor`),
  ADD KEY `codigo_curso` (`codigo_curso`);

--
-- Indices de la tabla `colegio_profesor_curso_msg`
--
ALTER TABLE `colegio_profesor_curso_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigo_curso` (`codigo_curso`),
  ADD KEY `ident_profesor` (`ident_profesor`);

--
-- Indices de la tabla `colegio_profesor_estudiante_msg`
--
ALTER TABLE `colegio_profesor_estudiante_msg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ident_alumno` (`ident_alumno`),
  ADD KEY `ident_profesor` (`ident_profesor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colegio_asignatura`
--
ALTER TABLE `colegio_asignatura`
  MODIFY `asignatura_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `colegio_notas`
--
ALTER TABLE `colegio_notas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colegio_profesor_curso_asignatura`
--
ALTER TABLE `colegio_profesor_curso_asignatura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `colegio_profesor_curso_msg`
--
ALTER TABLE `colegio_profesor_curso_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `colegio_profesor_estudiante_msg`
--
ALTER TABLE `colegio_profesor_estudiante_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colegio_alumno`
--
ALTER TABLE `colegio_alumno`
  ADD CONSTRAINT `colegio_alumno_ibfk_1` FOREIGN KEY (`codigo_curso`) REFERENCES `colegio_curso` (`curso_codigo`);

--
-- Filtros para la tabla `colegio_notas`
--
ALTER TABLE `colegio_notas`
  ADD CONSTRAINT `colegio_notas_ibfk_1` FOREIGN KEY (`ident_alumno`) REFERENCES `colegio_alumno` (`alumno_ident`),
  ADD CONSTRAINT `colegio_notas_ibfk_2` FOREIGN KEY (`codigo_asignatura`) REFERENCES `colegio_asignatura` (`asignatura_codigo`);

--
-- Filtros para la tabla `colegio_profesor_curso_asignatura`
--
ALTER TABLE `colegio_profesor_curso_asignatura`
  ADD CONSTRAINT `colegio_profesor_curso_asignatura_ibfk_1` FOREIGN KEY (`codigo_asignatura`) REFERENCES `colegio_asignatura` (`asignatura_codigo`),
  ADD CONSTRAINT `colegio_profesor_curso_asignatura_ibfk_2` FOREIGN KEY (`ident_profesor`) REFERENCES `colegio_profesor` (`profesor_ident`),
  ADD CONSTRAINT `colegio_profesor_curso_asignatura_ibfk_3` FOREIGN KEY (`codigo_curso`) REFERENCES `colegio_curso` (`curso_codigo`);

--
-- Filtros para la tabla `colegio_profesor_curso_msg`
--
ALTER TABLE `colegio_profesor_curso_msg`
  ADD CONSTRAINT `colegio_profesor_curso_msg_ibfk_1` FOREIGN KEY (`codigo_curso`) REFERENCES `colegio_curso` (`curso_codigo`),
  ADD CONSTRAINT `colegio_profesor_curso_msg_ibfk_2` FOREIGN KEY (`ident_profesor`) REFERENCES `colegio_profesor` (`profesor_ident`);

--
-- Filtros para la tabla `colegio_profesor_estudiante_msg`
--
ALTER TABLE `colegio_profesor_estudiante_msg`
  ADD CONSTRAINT `colegio_profesor_estudiante_msg_ibfk_1` FOREIGN KEY (`ident_alumno`) REFERENCES `colegio_alumno` (`alumno_ident`),
  ADD CONSTRAINT `colegio_profesor_estudiante_msg_ibfk_2` FOREIGN KEY (`ident_profesor`) REFERENCES `colegio_profesor` (`profesor_ident`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
