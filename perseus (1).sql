-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-11-2019 a las 12:28:06
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perseus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_productos`
--

CREATE TABLE `imagenes_productos` (
  `id_imagen` int(11) NOT NULL,
  `imagen_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` int(20) NOT NULL,
  `categoria` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `categoria`, `imagen`) VALUES
(15, 'Zapato Dino Butelli', 1700, 'zapatos', '1570343312_1570343312-zapatos-hombre-argentina-vestir-dino-butelli-moda-argentina.jpg'),
(16, 'Saco Gris', 1200, 'sacos', '1570343235_1570343234-jijo.jpg'),
(17, 'Reloj Negro', 1399, 'relojes', '1570343297_1570343297-Montre-Femme-moderno-negro-de-moda-reloj-de-cuarzo-de-acero-inoxidable-de-la-malla-de_b5a29a40-b376-41a6-8f7d-b17e17875d1c.jpg'),
(18, 'Zapato MocasÃ­n ', 2200, 'zapatos', '1570343394_1570343393-dsadasddsafadsf.jpg'),
(19, 'Reloj R45', 2300, 'relojes', '1570346201_1570346201-reloj.jpg'),
(20, 'Reloj Rolex', 4999, 'relojes', '1570346264_1570346264-rolex-oyster-perpetual-submariner-date-40-mm-116610-lv-verde.jpg'),
(22, 'Pantalones Azul Marino', 2100, 'pantalones', '1570347253_1570347253-dockers-1849-951392-1-zoom2.jpg'),
(23, 'Camisa Negra', 1300, 'camisas', '1570347389_1570347389-valkymia-3603-154872-1-product.jpg'),
(24, 'Abrigo Negro', 2999, 'abrigos', '1571742095_1571742095-aa1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(90) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_spanish_ci NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `verified`, `token`, `password`) VALUES
(1, '123', '123@gmail.com', 0, '5f37a7943e904d5e4a50cba692aaa449481a00e8b1301a1568173b8e4cdd52889acdf94ebb67bc3fae9e3da4bd76b4364bd0', '$2y$10$zpSr89DnhPdsMMs/irbnz.8A.MnXQ8jKMZAJSOmBwmldeZyJMcSxm');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes_productos`
--
ALTER TABLE `imagenes_productos`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
