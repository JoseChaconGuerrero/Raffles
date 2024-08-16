-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2024 a las 20:51:15
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
(2, '12', '10'),
(3, '18', '21'),
(4, '19', '18'),
(5, '20', '18'),
(6, '21', '18'),
(7, '24', '22'),
(8, '27', '25'),
(9, '28', '25');

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
(24, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Buenas', '25/11/2023 10:09 am', '190.97.226.146', 'SI', 'SI', NULL),
(25, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Buenas', '25/11/2023 10:09 am', '190.97.226.146', 'SI', 'SI', NULL),
(26, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Sapo', '25/11/2023 10:09 am', '190.97.226.146', 'SI', 'SI', NULL),
(27, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Sapo', '25/11/2023 10:09 am', '190.97.226.146', 'SI', 'SI', NULL),
(28, 'freddy@gmail.com', 18, 'sosa ', 19, 'que hay', '25/11/2023 10:09 am', '190.97.226.146', 'SI', 'SI', NULL),
(29, 'freddy@gmail.com', 18, 'sosa ', 19, 'mamelo', '25/11/2023 10:10 am', '190.97.226.146', 'SI', 'SI', NULL),
(30, 'freddy@gmail.com', 18, 'sosa ', 19, NULL, '25/11/2023 10:10 am', '190.97.226.146', 'SI', 'SI', 'a2ab09e0ef.jpg'),
(31, 'supersosa@gmail.com', 19, 'freddy ', 18, NULL, '25/11/2023 10:11 am', '190.97.226.146', 'SI', 'SI', 'ad5417497f.jpg'),
(32, 'supersosa@gmail.com', 19, 'freddy ', 18, NULL, '25/11/2023 10:12 am', '190.97.226.146', 'SI', 'SI', 'b492ed5602.png'),
(33, 'freddy@gmail.com', 18, 'sosa ', 19, NULL, '25/11/2023 12:21 pm', '190.97.226.146', 'SI', 'SI', 'c69d05cd68.png'),
(34, 'freddy@gmail.com', 18, 'sosa ', 19, 'epa', '25/11/2023 12:22 pm', '190.97.226.146', 'SI', 'SI', NULL),
(35, 'freddy@gmail.com', 18, 'sosa ', 19, 'como estas', '25/11/2023 12:22 pm', '190.97.226.146', 'SI', 'SI', NULL),
(36, 'freddy@gmail.com', 18, 'sosa ', 19, 'man', '25/11/2023 12:22 pm', '190.97.226.146', 'SI', 'SI', NULL),
(37, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa', '25/11/2023 12:23 pm', '190.97.226.146', 'SI', 'SI', NULL),
(38, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa', '25/11/2023 12:23 pm', '190.97.226.146', 'SI', 'SI', NULL),
(39, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Envia Doble', '25/11/2023 12:23 pm', '190.97.226.146', 'SI', 'SI', NULL),
(40, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Envia Doble', '25/11/2023 12:23 pm', '190.97.226.146', 'SI', 'SI', NULL),
(41, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa gafo', '25/11/2023 01:29 pm', '190.97.226.146', 'SI', 'SI', NULL),
(42, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa gafo', '25/11/2023 01:29 pm', '190.97.226.146', 'SI', 'SI', NULL),
(43, 'freddy@gmail.com', 18, 'sosa ', 19, 'mochelo', '25/11/2023 03:12 pm', '190.97.226.146', 'SI', 'SI', NULL),
(44, 'yeicker136@gmail.com', 20, 'freddy ', 18, '.', '27/11/2023 08:02 pm', '190.97.232.150', 'SI', 'SI', NULL),
(45, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando.', '27/11/2023 08:02 pm', '190.97.232.150', 'SI', 'SI', NULL),
(46, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando 2.', '27/11/2023 08:03 pm', '190.97.232.150', 'SI', 'SI', NULL),
(47, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando 3.', '27/11/2023 08:03 pm', '190.97.232.150', 'SI', 'SI', NULL),
(48, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando 4', '27/11/2023 08:03 pm', '190.97.232.150', 'SI', 'SI', NULL),
(49, 'yeicker136@gmail.com', 20, 'freddy ', 18, NULL, '27/11/2023 08:03 pm', '190.97.232.150', 'SI', 'SI', '445d38e85a.gif'),
(50, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando a ver duplicaciones.', '27/11/2023 08:05 pm', '190.97.232.150', 'SI', 'SI', NULL),
(51, 'yeicker136@gmail.com', 20, 'freddy ', 18, '¿Se duplica?', '27/11/2023 08:05 pm', '190.97.232.150', 'SI', 'SI', NULL),
(52, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando cinco.', '27/11/2023 08:05 pm', '190.97.232.150', 'SI', 'SI', NULL),
(53, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando seis.', '27/11/2023 08:06 pm', '190.97.232.150', 'SI', 'SI', NULL),
(54, 'yeicker136@gmail.com', 20, 'freddy ', 18, 'Probando siete', '27/11/2023 08:06 pm', '190.97.232.150', 'SI', 'SI', NULL),
(55, 'yeicker136@gmail.com', 20, 'sosa ', 19, 'Sí', '27/11/2023 08:08 pm', '190.97.232.150', 'SI', 'SI', NULL),
(56, 'yeicker136@gmail.com', 20, 'sosa ', 19, 'Hola', '27/11/2023 08:08 pm', '190.97.232.150', 'SI', 'SI', NULL),
(57, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Probando', '27/11/2023 08:30 pm', '190.97.232.150', 'SI', 'SI', NULL),
(58, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Probando', '27/11/2023 08:30 pm', '190.97.232.150', 'SI', 'SI', NULL),
(59, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Otra vez', '27/11/2023 08:30 pm', '190.97.232.150', 'SI', 'SI', NULL),
(60, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Otra vez', '27/11/2023 08:30 pm', '190.97.232.150', 'SI', 'SI', NULL),
(61, 'supersosa@gmail.com', 19, 'freddy ', 18, 'hola', '27/11/2023 08:31 pm', '190.97.232.150', 'SI', 'SI', NULL),
(62, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ok', '27/11/2023 08:31 pm', '190.97.232.150', 'SI', 'SI', NULL),
(63, 'supersosa@gmail.com', 19, 'freddy ', 18, 'probando', '27/11/2023 08:31 pm', '190.97.232.150', 'SI', 'SI', NULL),
(64, 'supersosa@gmail.com', 19, 'freddy ', 18, 'OK', '27/11/2023 08:34 pm', '190.97.232.150', 'SI', 'SI', NULL),
(65, 'supersosa@gmail.com', 19, 'freddy ', 18, 'DALE', '27/11/2023 08:34 pm', '190.97.232.150', 'SI', 'SI', NULL),
(66, 'supersosa@gmail.com', 19, 'freddy ', 18, 'PROBANDO', '27/11/2023 08:34 pm', '190.97.232.150', 'SI', 'SI', NULL),
(67, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ULTIMO MENSAJE', '27/11/2023 08:42 pm', '190.97.232.150', 'SI', 'SI', NULL),
(68, 'supersosa@gmail.com', 19, 'freddy ', 18, 'probando', '27/11/2023 08:47 pm', '190.97.232.150', 'SI', 'SI', NULL),
(69, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ok probando', '27/11/2023 08:47 pm', '190.97.232.150', 'SI', 'SI', NULL),
(70, 'freddy@gmail.com', 18, 'nassjohar ', 21, NULL, '12/12/2023 02:52 pm', '38.41.40.69', 'SI', 'SI', '8ca615ce50.png'),
(71, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'qeeee', '12/12/2023 02:53 pm', '38.41.40.69', 'SI', 'SI', NULL),
(72, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'dgfdgdfgdfgfdgfd', '12/12/2023 02:54 pm', '38.41.40.69', 'SI', 'SI', NULL),
(73, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'hjhgjghjhgjhgjhgj', '12/12/2023 02:54 pm', '38.41.40.69', 'SI', 'SI', NULL),
(74, 'freddy@gmail.com', 18, 'sosa ', 19, 'ola', '12/12/2023 02:55 pm', '38.41.40.69', 'SI', 'SI', NULL),
(75, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'ola', '12/12/2023 02:56 pm', '38.41.40.69', 'SI', 'SI', NULL),
(76, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'ola', '12/12/2023 02:56 pm', '38.41.40.69', 'SI', 'SI', NULL),
(77, 'supersosa@gmail.com', 19, 'freddy ', 18, 'I', '12/12/2023 02:56 pm', '38.41.40.69', 'SI', 'SI', NULL),
(78, 'freddy@gmail.com', 18, 'sosa ', 19, 'ffggdgd', '12/12/2023 02:56 pm', '38.41.40.69', 'SI', 'SI', NULL),
(79, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Holaaaaa', '12/12/2023 02:57 pm', '38.41.40.69', 'SI', 'SI', NULL),
(80, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ok', '13/12/2023 03:23 pm', '190.97.232.150', 'SI', 'SI', NULL),
(81, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ok', '13/12/2023 03:24 pm', '190.97.232.150', 'SI', 'SI', NULL),
(82, 'supersosa@gmail.com', 19, 'freddy ', 18, 'ok', '13/12/2023 03:28 pm', '190.97.232.150', 'SI', 'SI', NULL),
(83, 'supersosa@gmail.com', 19, 'freddy ', 18, 'probando', '13/12/2023 03:28 pm', '190.97.232.150', 'SI', 'SI', NULL),
(84, 'freddy@gmail.com', 18, 'sosa ', 19, 'Holaa', '16/12/2023 11:08 am', '38.41.41.91', 'SI', 'SI', NULL),
(85, 'freddy@gmail.com', 18, 'nassjohar ', 21, 'Holaa', '16/12/2023 11:38 am', '38.41.41.91', 'NO', 'NO', NULL),
(86, 'freddy@gmail.com', 18, 'sosa ', 19, 'Holaaa', '16/12/2023 11:38 am', '38.41.41.91', 'SI', 'SI', NULL),
(87, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Hola', '16/12/2023 11:40 am', '38.41.41.91', 'SI', 'SI', NULL),
(88, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Hola', '16/12/2023 11:40 am', '38.41.41.91', 'SI', 'SI', NULL),
(89, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa', '16/12/2023 11:40 am', '38.41.41.91', 'SI', 'SI', NULL),
(90, 'supersosa@gmail.com', 19, 'freddy ', 18, 'Epa', '16/12/2023 11:40 am', '38.41.41.91', 'SI', 'SI', NULL),
(91, 'freddy@gmail.com', 18, 'nassjohar ', 21, NULL, '26/01/2024 03:46 pm', '38.41.41.26', 'NO', 'NO', '3f0140640e.png');

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
(18, 'freddy', 'freddy@gmail.com', '1', '1', '', '$2y$10$OgrAntijMjqiV3..QhiIquIES9f72xn57ryIaU5M2CjhDx3zO86aO', '9265d7469e.png', 'Disconnect', '22/11/2023 10:11 am', '26/01/2024 03:45 pm'),
(19, 'sosa', 'supersosa@gmail.com', '0', '1', '', '$2y$10$12t3Cp.qFf8J7fuB/71XCe45WgPPKnBZdQmtZONsqPodW3tzcZdbm', '11cb6e8713.png', 'Disconnect', '22/11/2023 03:07 pm', '16/12/2023 11:40 am'),
(21, 'nassjohar', 'nasspernia30@gmail.com', '0', '1', '', '$2y$10$Nl3dLs0U7223/LTwzaQKfOxv4fN/9MzQUuwrdbyNCNDKZpMX5WHvu', '1c611ac118.png', 'Disconnect', '12/12/2023 02:47 pm', '12/12/2023 02:57 pm'),
(22, 'drophex', 'admin@drophexx.com', '1', '1', '', '123456', NULL, 'Disconnect', NULL, NULL),
(25, 'jose', 'jose@gmail.com', '0', '1', '', '$2y$10$V/MqVxa4kUwaJsPP/iwEG.p5kwhjfAxeMNeeSFigG9rJojcl23Tnu', '1aa8e92204.jpg', 'Connected', '24/04/2024 01:00 pm', '24/04/2024 02:50 pm'),
(27, '1232', '1233@gmail.com', '1', '1', '', '$2y$10$XjMbkjbaEmbiEqUhnX0naex0Wlx6GYYt6Au/DStiK4z05Poj2Uw.a', 'dc5cad81bf.png', 'Disconnect', '24/04/2024 01:05 pm', '24/04/2024 01:34 pm'),
(28, 'manuel', 'manuel@gmail.com', '1', '1', 'cczz2848e6', '$2y$10$5o5wGFE2Cd7oNITH3LJmfeVHHcnsLtGZSU2CHocVQGEAdbWxrhCmC', '35b2db7709.jpg', 'Disconnect', '24/04/2024 02:34 pm', '24/04/2024 01:40 pm');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `msjs`
--
ALTER TABLE `msjs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
