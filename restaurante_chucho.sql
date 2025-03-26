-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2025 a las 20:59:36
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
(1, 'fotos/image-Photoroom.png', 'queso', 'Fialmentyo', 100.00);

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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `Tipo_de_Usuario` int(20) DEFAULT NULL,
  `Eliminar` int(20) DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `token_recuperacion` varchar(255) DEFAULT NULL,
  `expira_token` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `correo`, `telefono`, `contrasena`, `Tipo_de_Usuario`, `Eliminar`, `fecha_ingreso`, `token_recuperacion`, `expira_token`) VALUES
(1, NULL, 'jose adrain', 'joseadrian_v12@hotmail.com', '9991228240', '$2y$10$A.r3SbIznDftjr61urcOfuN.oDNvjJmBApsiV111NsLzOUQZOLj0K', 0, 0, '2025-03-02', 'bf1ad97d24332ed61bb074a694883968a5e83b0a4ff2af30181d85ab6e98d3719daa8be7b830de42a57103004881594322ff', '2025-03-12 20:56:43'),
(2, NULL, 'jose adrain', 'joseadrian_v@hotmail.com', '9992339876', 'Dinorey123', 0, 0, '2025-03-03', NULL, NULL),
(3, NULL, 'elewna', 'elena.cventura@gmail.com', '9998273663', '$2y$10$yQxCNNaD3RqP4/ZzIa4tjeldkta3BXdFVAVB.YRmBRkjG2If4X16K', 0, 0, '2025-03-12', 'cce4f86e730a7be5bd350c1cd77511a55f0c135d087ca2eac20dc1c4f243d2ab6df7b42af4ce2a569b314ab6a4ca3d36b7be', '2025-03-12 21:06:20');

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
