-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2025 a las 22:30:15
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
-- Base de datos: `restaurante_chucho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE `comidas` (
  `id` int(5) NOT NULL,
  `ruta` varchar(255) DEFAULT NULL,
  `nombre_comida` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `comidas`
--

INSERT INTO `comidas` (`id`, `ruta`, `nombre_comida`, `descripcion`, `precio`) VALUES
(1, 'fotos/image-Photoroom.png', 'queso', 'Fialmentyo', 100.00),
(2, 'fotos/image-Photoroom.png', 'Hamburguesaa', 'Rico', 100.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complementos`
--

CREATE TABLE `complementos` (
  `id` int(5) NOT NULL,
  `nombre_complemento` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `complementos`
--

INSERT INTO `complementos` (`id`, `nombre_complemento`, `descripcion`, `precio`, `ruta`) VALUES
(0, 'Papas', 'Fuente de deseos', 100.00, 'fotos/Captura de pantalla 2024-05-15 114628.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `nombre_ingrediente` varchar(100) DEFAULT NULL,
  `ruta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre_ingrediente`, `ruta`) VALUES
(1, 'Sipa', 'fotos/Captura de pantalla 2024-09-10 115520.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(2) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`) VALUES
(1, 'Administrador'),
(2, 'empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `Eliminar` int(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `token_recuperacion` varchar(255) DEFAULT NULL,
  `expira_token` datetime DEFAULT NULL,
  `id_tipo1` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `telefono`, `contrasena`, `Eliminar`, `fecha_ingreso`, `token_recuperacion`, `expira_token`, `id_tipo1`) VALUES
(1, NULL, 'jose adrain', 'joseadrian_v12@hotmail.com', '9991228240', '$2y$10$olfRie/KLgrhBn4E2SyxSOfqSYWHcNxIrWzXs6nuc3i0DUhpgZULC', 0, '2025-03-02', NULL, NULL, 1),
(2, NULL, 'jose adrain', 'joseadrian_v@hotmail.com', '9992339876', 'Dinorey123', 0, '2025-03-03', NULL, NULL, 2),
(3, NULL, 'juan', 'prueba@gmail2.com', '9992339876', '$2y$10$hfH6mgpIYCOC6OhQa5uyfuwB2Ss7nu3hZg0LVdZWwkQbmGNaNV16S', NULL, '2030-12-14', NULL, NULL, 2),
(5, NULL, 'Juan', 'prueba3@gmail.com', '9992339876', '$2y$10$arqlFBfnvdItqoHYXDoEHO8NVAk.G2KScBPsDNunkG5i3d3uqmpq.', NULL, '2025-03-26', NULL, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comidas`
--
ALTER TABLE `comidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo1` (`id_tipo1`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_tipo1`) REFERENCES `tipo_usuario` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
