-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2023 a las 16:16:51
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `passwd` varchar(45) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_usuario`, `nombre`, `passwd`, `token`) VALUES
(1, 'Laura', '469d3fd94d1173078a48444725ff7a28d2a4dcfc', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `numero` varchar(12) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  `practicas` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpleados`, `nombre`, `apellidos`, `email`, `numero`, `puesto`, `practicas`) VALUES
(1, 'Lawra', 'Rodríguez Rodríguez', 'email@email.com', '659664861', 'Directora Jefe', 0),
(2, 'Yaiza', 'Rey Rodríguez', 'hola@email.com', '659664862', 'Jefa Adjunta', 0),
(3, 'Marta', 'Ezpeleta Sarrión', 'adeu@email.com', '659664863', 'Empleada', 1),
(4, 'Alba', 'Navarro Margaritti', 'paso@email.com', '659664864', 'Empleada', 0),
(5, 'Aurora', 'Maria Cèlia', 'sofia@email.com', '659664861', 'Coordinadora de Proyectos', 0),
(6, 'Javier', 'Badosa', 'cucu@gmail.com', '677513159', 'Empleado', 1),
(8, 'Manuel', 'Pérez', 'manu@manu.es', '4756515545', 'empleado', 0),
(9, 'Jan', 'Do', 'do@do.com', '845845653', 'empleado', 1),
(10, 'Juana', 'Do', 'doi@doi.com', '66666666666', 'empleada', 0),
(11, 'Pablo', 'Valencia', 'pablo@hola.com', '78964486', 'empleado', 1),
(12, 'Carla', 'Mesa', 'mesa@manu.es', '4756235545', 'empleada', 0);

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
  `Descripcion` varchar(2000) DEFAULT NULL,
  `URL_Imagenes` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idProyectos`, `nombre`, `localizacion`, `presupuesto`, `fecha_inicio`, `fecha_fin`, `Descripcion`, `URL_Imagenes`) VALUES
(1, 'Piscina Exterior', 'Marbella', 16000, '2021-03-12', '2021-06-12', 'Piscina exterior de lujo situada en el jardín de una amplia construcción minimalista de arquitectura blanca situada en el sur de la península.', 'images.jpg'),
(2, 'Chalet Blanco', 'Oliva', 60000000, '2023-04-15', '2023-06-20', 'La zona residencial en la que se nos encontramos se caracteriza por un parcelario muy pequeño y estrecho, de lo que resultan viviendas compactas de escasa superficie. La premisa del proyecto era conseguir una vivienda con el programa de una gran y exclusiva vivienda.\r\n\r\nPor ello recurrimos a potenciar aquellos espacios que consiguen la sensación de amplitud.\r\n\r\nEl salón, que ocupa la mayor parte de la planta baja, posee un gran ventanal abierto a los jardines exteriores y a la piscina desbordante. ', 'feature_image.jpg'),
(3, 'Casa Blanca', 'Almerimar', 2000000, '2023-04-01', '2023-10-28', ' Situado en un entorno privilegiado, el proyecto busca adueñarse del paisaje, adentrándose en él a través de sus muros, que se prolongan hacia el jardín, uniendo interior y exterior. A su vez, estos planos articulan la parcela, creando diferentes jardines para cada estancia de la casa, unos privados de menor tamaño, otros más abiertos y públicos.\n\nLos planos horizontales, suelo y cubierta, prolongan la vivienda más allá de sus límites, y la dotan de una proporción horizontal, acercándola al terreno, al mismo tiempo que se despega de él.', 'FRAN-SILVESTRE-ARQUITECTOS-VALENCIA-BALINT-HOUSE-1520x621-942x531.jpg'),
(4, 'Salón abierto', 'Gibraltar', 25000, '2023-03-28', '2023-04-28', 'Un modelo de vivienda cómoda, acogedora y amplia, en dos plantas con espacio suficiente para la familia y además con zona aparte para invitados. La casa perfecta para pasar periodos de vacaciones o para residir permanentemente en el clima cálido de la costa mediterránea.\r\nDistribución: cuatro dormitorios (uno con vestidor), tres cuartos de baño, recibidor, dos porches, salón, comedor, cocina y recibidor en 211 metros cuadrados útiles.\r\nAdemás, jardín, piscina privada y parking para dos coches.', 'Casa-Sardinera-de-Ramon-Esteve-18-Copiar.jpg'),
(5, 'Jardín Minimalista', 'Calpe', 16000, '2022-04-28', '2023-06-28', 'Ubicada en una parcela con pendiente de una zona residencial de Alicante, se diseñó esta casa unifamiliar, que ofrece a los propietarios privacidad y apertura.  El diseño moderno y actual resultante muestra una fachada de piedra, cerrada en el nivel de entrada, que proporciona privacidad y constituye una base sólida desde la cual la vivienda se transforma en apertura y transparencia cuando alcanza los niveles superiores al tiempo que irrumpe en el jardín privado de detrás.\n\nUn patio interior totalmente acristalado penetra a través de los pisos superiores, permitiendo la entrada de la luz natural en el centro de la casa. ', 'Thomsen-22.jpg'),
(6, 'Casa Geométrica', 'Granada', 3000000, '2021-02-04', '2022-02-10', 'Nuestro cliente deseaba renovar por completo esta vivienda tradicional y convertirla en una elegante y moderna casa de vacaciones que consiguiese un mejor aprovechamiento de los espacios interiores y exteriores.\n\nLa creación de una ventana de grandes dimensiones consigue la comunicación de cocina, comedor y sala de estar con el comedor al aire libre y el espacio de ocio que da a una nueva piscina con jacuzzi.\n\nLa balaustrada tradicional de la escalera externa se reemplazó por una barandilla de vidrio y aluminio que se extiende para crear un garaje cubierto.', 'OHLAB_CASA-MM_6.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_usuario`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados_proyectos`
--
ALTER TABLE `empleados_proyectos`
  MODIFY `idEmpleados_Proyectos` int(11) NOT NULL AUTO_INCREMENT;

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
