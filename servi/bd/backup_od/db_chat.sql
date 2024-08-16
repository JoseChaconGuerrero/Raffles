-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2023 a las 22:30:11
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clickuser`
--

CREATE TABLE `clickuser` (
  `id` int(10) NOT NULL,
  `UserIdSession` varchar(50) DEFAULT NULL,
  `clickUser` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clickuser`
--

INSERT INTO `clickuser` (`id`, `UserIdSession`, `clickUser`) VALUES
(1, '10', '12'),
(2, '12', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `msjs`
--

CREATE TABLE `msjs` (
  `id` int(11) NOT NULL,
  `user` varchar(250) DEFAULT NULL,
  `user_id` int(250) DEFAULT NULL,
  `to_user` varchar(250) DEFAULT NULL,
  `to_id` int(250) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `fecha` varchar(250) DEFAULT NULL,
  `nombre_equipo_user` varchar(250) DEFAULT NULL,
  `leido` varchar(100) DEFAULT NULL,
  `sonido` varchar(10) DEFAULT NULL,
  `archivos` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `msjs`
--

INSERT INTO `msjs` (`id`, `user`, `user_id`, `to_user`, `to_id`, `message`, `fecha`, `nombre_equipo_user`, `leido`, `sonido`, `archivos`) VALUES
(1, 'marco@gmail.com', 12, 'Yeicker Colmenares ', 10, 'Hola', '23/09/2023 10:46 am', 'Russo', 'SI', NULL, NULL),
(2, 'marco@gmail.com', 12, 'Yeicker Colmenares ', 10, 'Necesito que hagas algo.', '23/09/2023 10:47 am', 'Russo', 'SI', NULL, NULL),
(3, 'marco@gmail.com', 12, 'Yeicker Colmenares ', 10, NULL, '23/09/2023 10:47 am', 'Russo', 'SI', NULL, '6748998f8b.gif'),
(4, 'marco@gmail.com', 12, 'Yeicker Colmenares ', 10, 'Vale funciona perfecto, pero tarda un momento en llegar los mensajes.', '23/09/2023 10:47 am', 'Russo', 'SI', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(250) DEFAULT NULL,
  `email_user` varchar(250) DEFAULT NULL,
  `cargo_sistema` varchar(100) NOT NULL DEFAULT '0',
  `verificacion_correo` varchar(100) NOT NULL DEFAULT '0',
  `token_user` varchar(150) NOT NULL,
  `password` varchar(250) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  `fecha_registro` varchar(50) DEFAULT NULL,
  `fecha_session` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre_apellido`, `email_user`, `cargo_sistema`, `verificacion_correo`, `token_user`, `password`, `imagen`, `estatus`, `fecha_registro`, `fecha_session`) VALUES
(1, 'Urian', 'dev@gmail.com', '0', '0', '', '$2y$10$ysOZo2KGH4w/7CnHfnyf1OrlN7JkzMEv7JzFQCsh9ZlksOEvDYuv6', '6593d72014.jpeg', 'Inactiva', '09/09/2023 02:32 pm', '09/09/2023 02:51 pm'),
(2, 'Brenda', 'brenda@gmail.com', '0', '0', '', '$2y$10$KaytI.EMiwTaOE9pDTVMSeVy7foOKWsQaPBD8r3RU4OY2zml/SyR.', 'f0b0045e42.jpg', 'Inactiva', '09/09/2023 02:52 pm', '09/09/2023 02:53 pm'),
(3, 'Abelardo Perez', 'abelardo@gmail.com', '0', '0', '', '$2y$10$qil5sHQ8aRAgIxLH54ETUukHTHuWmJwSobFe4hoP6k4URyjEIrOG.', '6f842c4fe3.jpeg', 'Inactiva', '09/09/2023 02:53 pm', '09/09/2023 02:54 pm'),
(4, 'Cristian R.', 'cristian@hotmail.com', '0', '0', '', '$2y$10$xDZn40SPhfMagbYTsz4MZ.1L7XD.VN5OIcJCZzjrWWnvE5HjWtOci', '45d9649ddf.png', 'Activo', '09/09/2023 02:54 pm', NULL),
(5, 'Roxana D', 'roxana@gmail.com', '0', '0', '', '$2y$10$kxPmU9mvpCM.KZgKUH0houoIHfD2w.xD2KD5czjjZxo6L53uGBihW', 'da4808ea74.png', 'Activo', '09/09/2023 02:57 pm', NULL),
(6, 'Franco E.', 'franco@gmail.com', '0', '0', '', '$2y$10$5VLSB3NqFVjCOE.I8ooEY.kV9S1c96zDWDweaXH7RdG15v2p/RAIC', '17d760c7b0.jpeg', 'Activo', '09/09/2023 02:57 pm', NULL),
(7, 'Chica Mala', 'chica@gmail.com', '0', '0', '', '$2y$10$f6otTzetZ4Two1zcKowYxudasE.rD4CFXmVdn98zR5vHkMVtYNEe2', '2689136cbf.webp', 'Activo', '09/09/2023 02:59 pm', NULL),
(8, 'Deyna Castellano', 'deyna@gmail.com', '0', '0', '', '$2y$10$iHn2vpc.qc.eYPcE2aWsiOVm9gAyek4NeVZr/Qfvoo31e7JQsNF9S', 'c02d4a11e0.jpg', 'Activo', '09/09/2023 03:00 pm', NULL),
(9, 'Urian V.', 'urian@gmail.com', '0', '0', '', '$2y$10$Jw1IU3IGpSpMUHmr7jcdUOjc8OH0Mte0SpBUsfgGtm7GP7t2DEMze', '529a73c510.png', 'Activo', '09/09/2023 03:01 pm', NULL),
(11, 'Mariano Silva', 'mariano@gmail.com', '0', '0', '', '$2y$10$LpoTcrBuDObaRjiWlTtMkeDmOL2JU58vmX0MGLRhAl8rhIKquOOm.', 'e983da05b9.jpg', 'Activo', '23/09/2023 10:45 am', NULL),
(12, 'Marcos Jimenez', 'marco@gmail.com', '0', '0', '', '$2y$10$bSnSHuV32heHD7x3Ns8cpezYEs7J/Hhcq4DdG7I6SSK3TXLMD91pa', 'eb5946f0ed.jpg', 'Activo', '23/09/2023 10:46 am', NULL),
(13, 'prueba', 'prueba1@gmail.com', '0', '0', '', '$2y$10$5ZHU/mJOYfTPOpNW8ZArYuyDRwS4fxC8Jod.VB8RcIOmf7S939uXa', '45fbf35503.png', 'Activo', '23/09/2023 11:43 am', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clickuser`
--
ALTER TABLE `clickuser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `msjs`
--
ALTER TABLE `msjs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clickuser`
--
ALTER TABLE `clickuser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `msjs`
--
ALTER TABLE `msjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
