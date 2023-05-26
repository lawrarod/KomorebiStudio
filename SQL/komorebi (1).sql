-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2023 a las 20:11:36
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `komorebi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `número` varchar(12) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `prácticas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `nombre`, `apellidos`, `email`, `número`, `puesto`, `prácticas`) VALUES
(1, 'Lawra', 'Rodríguez Rodríguez', 'email@email.com', '659664861', 'Directora Jefe', 0),
(2, 'Yaiza', 'Rey Rodríguez', 'hola@email.com', '659664862', 'Empleada', 0),
(3, 'Marta', 'Ezpeleta Sarrión', 'adeu@email.com', '659664863', 'Empleada', 1),
(4, 'Alba', 'Navarro Margaritti', 'paso@email.com', '659664864', 'Empleada', 0),
(5, 'Aurora', 'Maria Cèlia', 'sofia@email.com', '659664861', 'Coordinadora de Proyectos', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados_proyectos`
--

CREATE TABLE `empleados_proyectos` (
  `idEmpleados` int(11) DEFAULT NULL,
  `idProyectos` int(11) DEFAULT NULL,
  `idEmpleados_Proyectos` int(11) NOT NULL,
  `finalizado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idProyectos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `localizacion` varchar(45) DEFAULT NULL,
  `presupuesto` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `URL_Imagenes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idProyectos`, `nombre`, `localizacion`, `presupuesto`, `fecha_inicio`, `fecha_fin`, `Descripcion`, `URL_Imagenes`) VALUES
(1, 'Piscina Interior', 'Marbella', 40, '2023-04-28', '2023-06-28', 'Piscina interior en chalet de lujo', '../Proyectos/img/images.jpg'),
(2, 'Piscina Exterior', 'Oliva', 60, '2023-04-15', '2023-06-20', 'Piscina exterior en chalet de lujo', '../Proyectos/img/FRAN-SILVESTRE-ARQUITECTOS-VALENCIA-BALINT-HOUSE-1520x621-942x531.jpg'),
(3, 'Casa Blaca', 'Almerimar', 2, '2023-04-01', '2023-10-28', 'Construcción de casa minimalista en urbanizac', '../Proyectos/img/feature_image.jpg'),
(4, 'Salón', 'Gibraltar', 25, '2023-03-28', '2023-04-28', 'Salón-comedor con ventanales concepto abierto', '../Proyectos/img/Casa-Sardinera-de-Ramon-Esteve-18-Copiar.jpg'),
(5, 'Jardín Minimalista', 'Calpe', 16, '2022-04-28', '2023-06-28', 'Jardín minimalista con cesped natural en cons', '../Proyectos/img/Thomsen-22.jpg'),
(6, 'Casa Geométrica', 'Granada', 3, '2021-02-04', '2022-02-10', 'Casa con motivo geométrico con fachada blanca', '../Proyectos/img/OHLAB_CASA-MM_6.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`);

--
-- Indices de la tabla `empleados_proyectos`
--
ALTER TABLE `empleados_proyectos`
  ADD PRIMARY KEY (`idEmpleados_Proyectos`),
  ADD KEY `fk_empleados_empleados_proyectos` (`idEmpleados`),
  ADD KEY `fk_proyectos_empleados_proyectos` (`idProyectos`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idProyectos`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleados_proyectos`
--
ALTER TABLE `empleados_proyectos`
  ADD CONSTRAINT `fk_empleados_empleados_proyectos` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`),
  ADD CONSTRAINT `fk_proyectos_empleados_proyectos` FOREIGN KEY (`idProyectos`) REFERENCES `proyectos` (`idProyectos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
