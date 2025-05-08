-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2025 a las 08:56:27
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
-- Base de datos: `yommi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `numero_pedido` varchar(50) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `estado` enum('pendiente','completado') DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `numero_pedido`, `usuario_id`, `total`, `fecha_pedido`, `estado`) VALUES
(1, 'PED43A45613', 1, 515.00, '2024-12-02 16:43:29', 'completado'),
(2, 'PED936AAD76', 1, 895.00, '2024-12-02 16:47:04', 'pendiente'),
(3, 'PEDDF4496D7', 1, 260.00, '2024-12-02 17:31:13', 'pendiente'),
(4, 'PED0A4B41B0', 1, 15.00, '2024-12-02 17:41:08', 'completado'),
(5, 'PED13AAEFA0', 1, 170.00, '2024-12-02 18:13:30', 'completado'),
(6, 'PED28A1DA4B', 1, 705.00, '2024-12-02 18:52:32', 'completado'),
(7, 'PED95135854', 1, 500.00, '2024-12-02 19:06:27', 'pendiente'),
(8, 'PEDEE0F1F61', 1, 65.00, '2024-12-02 19:08:25', 'pendiente'),
(9, 'PED8E736912', 1, 80.00, '2024-12-02 19:10:30', 'pendiente'),
(10, 'PED579621F2', 1, 65.00, '2024-12-02 19:13:22', 'pendiente'),
(11, 'PED6E4F36A0', 1, 65.00, '2024-12-02 19:19:13', 'pendiente'),
(12, 'PED33C17512', 1, 65.00, '2024-12-02 19:25:24', 'pendiente'),
(13, 'PED747D6990', 1, 485.00, '2024-12-02 19:37:05', 'pendiente'),
(14, 'PEDA79F40CB', 1, 45.00, '2024-12-02 19:56:23', 'pendiente'),
(15, 'PED6BB8CB9B', 1, 1525.00, '2024-12-02 20:05:00', 'pendiente'),
(16, 'PED0122FDB6', 1, 65.00, '2024-12-02 20:15:53', 'pendiente'),
(17, 'PED83BFCDFE', 1, 80.00, '2024-12-02 20:19:01', 'completado'),
(18, 'PEDA3DFEF7A', 1, 700.00, '2024-12-02 20:24:46', 'pendiente'),
(19, 'PED6822A292', 1, 265.00, '2024-12-02 20:27:30', 'completado'),
(20, 'PED17F6E9CD', 1, 35.00, '2024-12-02 20:32:16', 'completado'),
(21, 'PED9A2EEA5D', 1, 25.00, '2024-12-02 20:32:52', 'pendiente'),
(22, 'PED0D53F663', 1, 25.00, '2024-12-02 20:34:05', 'completado'),
(23, 'PED49D64225', 1, 375.00, '2024-12-02 21:16:00', 'pendiente'),
(24, 'PED3776D396', 1, 910.00, '2024-12-02 21:21:12', 'pendiente'),
(25, 'PED9231188B', 1, 75.00, '2025-03-23 22:07:49', 'completado'),
(26, 'PED2D8636C2', 1, 80.00, '2025-03-23 22:15:16', 'pendiente'),
(27, 'PEDD9D2B6A9', 1, 345.00, '2025-04-09 18:03:54', 'pendiente'),
(28, 'PED21FE9879', 1, 65.00, '2025-04-26 00:48:34', 'pendiente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
