-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2025 a las 08:57:19
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
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `numero_pedido` varchar(50) NOT NULL,
  `nombre_comida` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `ingredientes_excluidos` text DEFAULT NULL,
  `tipo` enum('comida','complemento') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `numero_pedido`, `nombre_comida`, `cantidad`, `precio`, `ingredientes_excluidos`, `tipo`) VALUES
(1, 'PED43A45613', 'Hamburguesa Clasica', 1, 65.00, 'Moztasa, Cebolla', 'comida'),
(2, 'PED43A45613', 'Hamburguesa con papas', 5, 80.00, 'Pepinillos', 'comida'),
(3, 'PED43A45613', 'Refresco Pepsi de 500 mil', 1, 25.00, 'Ninguno', 'comida'),
(4, 'PED43A45613', 'Papas fritas Chicas', 1, 25.00, 'Ninguno', 'comida'),
(5, 'PED936AAD76', 'Hamburguesa con papas', 1, 80.00, 'Moztasa, Pepinillos', 'comida'),
(6, 'PED936AAD76', 'Hamburguesa Clasica', 5, 65.00, 'Ninguno', 'comida'),
(7, 'PED936AAD76', 'Hamburguesa de pollo.', 3, 80.00, 'Moztasa, Cebolla, Pepinillos, Jitomate', 'comida'),
(8, 'PED936AAD76', 'Refresco Pepsi de 500 mil', 10, 25.00, 'Ninguno', 'comida'),
(9, 'PEDDF4496D7', 'Hamburguesa Clasica', 4, 65.00, 'Moztasa, Pepinillos', 'comida'),
(10, 'PED0A4B41B0', 'Cono Helado', 1, 15.00, 'Ninguno', 'comida'),
(11, 'PED13AAEFA0', 'Hamburguesa Clasica', 1, 65.00, 'Moztasa, Pepinillos', 'comida'),
(12, 'PED13AAEFA0', 'Papas fritas Chicas', 1, 25.00, 'Ninguno', 'comida'),
(13, 'PED13AAEFA0', 'Hamburguesa de pollo.', 1, 80.00, 'Moztasa, Pepinillos', 'comida'),
(14, 'PED28A1DA4B', 'Hamburguesa Clasica', 1, 65.00, 'Moztasa', 'comida'),
(15, 'PED28A1DA4B', 'Hamburguesa con papas', 5, 80.00, 'Jitomate', 'comida'),
(16, 'PED28A1DA4B', 'Hamburguesa Suprema', 2, 120.00, 'Ninguno', 'comida'),
(17, 'PED95135854', 'Hamburguesa de pollo.', 5, 80.00, 'Moztasa', 'comida'),
(18, 'PED95135854', 'Refresco Pepsi de 500 mil', 4, 25.00, 'Ninguno', 'comida'),
(19, 'PEDEE0F1F61', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(20, 'PED8E736912', 'Hamburguesa con papas', 1, 80.00, 'Ninguno', 'comida'),
(21, 'PED579621F2', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(22, 'PED6E4F36A0', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(23, 'PED33C17512', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(24, 'PED747D6990', 'Hamburguesa con papas', 4, 80.00, 'Cebolla, Pepinillos', 'comida'),
(25, 'PED747D6990', 'Pay de Queso', 1, 35.00, 'Ninguno', 'comida'),
(26, 'PED747D6990', 'Hamburguesa Suprema 2', 1, 130.00, 'Ninguno', 'comida'),
(27, 'PEDA79F40CB', 'Cono Helado', 3, 15.00, 'Ninguno', 'comida'),
(28, 'PED6BB8CB9B', 'Hamburguesa Clasica', 5, 65.00, 'Moztasa, Pepinillos', 'comida'),
(29, 'PED6BB8CB9B', 'Hamburguesa Suprema', 10, 120.00, 'Cebolla, Jitomate', 'comida'),
(30, 'PED0122FDB6', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(31, 'PED83BFCDFE', 'Hamburguesa de pollo.', 1, 80.00, 'Moztasa, Pepinillos', 'comida'),
(32, 'PEDA3DFEF7A', 'Hamburguesa de pollo.', 2, 80.00, 'Moztasa', 'comida'),
(33, 'PEDA3DFEF7A', 'Hamburguesa Clasica', 4, 65.00, 'Pepinillos', 'comida'),
(34, 'PEDA3DFEF7A', 'Hamburguesa Suprema 2', 1, 130.00, 'Ninguno', 'comida'),
(35, 'PEDA3DFEF7A', 'Refresco Pepsi de 500 mil', 6, 25.00, 'Ninguno', 'comida'),
(36, 'PED6822A292', 'Hamburguesa Clasica', 1, 65.00, 'Pepinillos', 'comida'),
(37, 'PED6822A292', 'Hamburguesa con papas', 1, 80.00, 'Ninguno', 'comida'),
(38, 'PED6822A292', 'Hamburguesa Suprema', 1, 120.00, 'Ninguno', 'comida'),
(39, 'PED17F6E9CD', 'Pay de Queso', 1, 35.00, 'Ninguno', 'comida'),
(40, 'PED9A2EEA5D', 'Papas fritas Chicas', 1, 25.00, 'Ninguno', 'comida'),
(41, 'PED0D53F663', 'Refresco Pepsi de 500 mil', 1, 25.00, 'Ninguno', 'comida'),
(42, 'PED49D64225', 'Hamburguesa con papas', 3, 80.00, 'Moztasa, Pepinillos', 'comida'),
(43, 'PED49D64225', 'Hamburguesa Suprema', 1, 120.00, 'Moztasa, Jitomate', 'comida'),
(44, 'PED49D64225', 'Cono Helado', 1, 15.00, 'Ninguno', 'comida'),
(45, 'PED3776D396', 'Hamburguesa Clasica', 10, 65.00, 'Moztasa, Jitomate', 'comida'),
(46, 'PED3776D396', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida'),
(47, 'PED3776D396', 'Hamburguesa Clasica', 3, 65.00, 'Pepinillos', 'comida'),
(48, 'PED9231188B', 'Papas fritas Chicas', 3, 25.00, 'Ninguno', 'comida'),
(49, 'PED2D8636C2', 'Hamburguesa con papas', 1, 80.00, 'Moztasa, Cebolla, Jitomate, Pepinillos', 'comida'),
(50, 'PEDD9D2B6A9', 'Hamburguesa con papas', 2, 80.00, 'Moztasa, Cebolla, Jitomate', 'comida'),
(51, 'PEDD9D2B6A9', 'Hamburguesa Clasica', 1, 65.00, 'Moztasa, Cebolla, Jitomate', 'comida'),
(52, 'PEDD9D2B6A9', 'Hamburguesa Suprema', 1, 120.00, 'Moztasa, Cebolla, Jitomate', 'comida'),
(53, 'PED21FE9879', 'Hamburguesa Clasica', 1, 65.00, 'Ninguno', 'comida');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
