-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-11-2023 a las 17:33:49
-- Versión del servidor: 10.11.5-MariaDB-1:10.11.5+maria~ubu2204
-- Versión de PHP: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pers_emmu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `id_catedra` int(11) NOT NULL,
  `fecha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_historial`
--

CREATE TABLE `asistencia_historial` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_catedra` int(11) NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id` bigint(11) NOT NULL,
  `dni` int(255) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `nota_cuatri1` varchar(11) DEFAULT NULL,
  `fecha_cuatri1` date DEFAULT NULL,
  `nota_cuatri2` varchar(11) DEFAULT NULL,
  `fecha_cuatri2` date DEFAULT NULL,
  `fecha_final` date NOT NULL,
  `nota_final` varchar(11) DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  `modalidad` varchar(10) NOT NULL,
  `tomo` varchar(15) NOT NULL,
  `pagina` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones_historial`
--

CREATE TABLE `calificaciones_historial` (
  `id` bigint(20) NOT NULL,
  `catedra_id` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre_carrera` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id`, `nombre_carrera`, `created_at`, `updated_at`) VALUES
(1, 'PIANO - Jóvenes y Adultos', '2023-08-07 22:48:02', '2023-08-07 22:48:02'),
(2, 'GUITARRA - Jóvenes y Adultos', '2023-09-19 03:58:42', '2023-09-19 03:59:08'),
(3, 'VIOLIN - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 03:59:20', '2023-10-23 20:17:34'),
(4, 'VIOLONCELLO - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 03:59:32', '2023-10-23 20:17:53'),
(5, 'SAXO - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 03:59:46', '2023-10-23 20:18:03'),
(6, 'CLARINETE - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 03:59:56', '2023-10-23 20:18:14'),
(7, 'FLAUTA TRAVERSA - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 04:00:10', '2023-10-23 20:18:26'),
(8, 'CANTO - Jóvenes y Adultos (Piano Complementario)', '2023-09-19 04:00:24', '2023-10-23 20:18:36'),
(9, 'PIANO - Niños, niñas y adolescentes', '2023-09-19 04:00:55', '2023-09-19 04:00:55'),
(10, 'GUITARRA - Niños, niñas y adolescentes', '2023-09-19 04:01:23', '2023-09-19 04:01:23'),
(11, 'VIOLIN - Niños, niñas y adolescentes', '2023-09-19 04:01:29', '2023-09-19 04:01:29'),
(12, 'VIOLONCELLO - Niños, niñas y adolescentes', '2023-09-19 04:01:38', '2023-09-19 04:01:38'),
(13, 'SAXO - Niños, niñas y adolescentes', '2023-09-19 04:01:49', '2023-09-19 04:01:49'),
(14, 'CLARINETE - Niños, niñas y adolescentes', '2023-09-19 04:01:59', '2023-09-19 04:01:59'),
(15, 'FLAUTA TRAVERSA - Niños, niñas y adolescentes', '2023-09-19 04:02:35', '2023-09-19 04:02:39'),
(16, 'TALLER - CORO INFANTIL', '2023-09-19 04:03:06', '2023-09-19 04:03:06'),
(17, 'TALLER - CORO DE ADULTOS', '2023-09-19 04:03:16', '2023-09-19 04:03:16'),
(18, 'TALLER - VOCACIONAL', '2023-09-19 04:03:30', '2023-09-19 04:03:30'),
(19, 'CORO AMANECER', '2023-10-18 19:29:35', '2023-10-18 19:29:35'),
(20, 'VIOLIN - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:12', '2023-10-23 20:19:12'),
(21, 'FLAUTA TRAVERSA - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:21', '2023-10-23 20:19:21'),
(22, 'VIOLONCELLO - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:28', '2023-10-23 20:19:28'),
(23, 'SAXO - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:38', '2023-10-23 20:19:38'),
(24, 'CLARINETE - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:45', '2023-10-23 20:19:45'),
(25, 'CANTO - Jóvenes y Adultos (Guitarra Complementaria)', '2023-10-23 20:19:59', '2023-10-23 20:19:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catedras`
--

CREATE TABLE `catedras` (
  `id` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `dni_profesor` int(11) NOT NULL,
  `cupos` int(11) NOT NULL,
  `aula` varchar(255) NOT NULL,
  `aula_dia2` varchar(255) NOT NULL,
  `dia1` varchar(255) NOT NULL,
  `hora_comienzo_dia1` varchar(255) NOT NULL,
  `hora_finalizacion_dia1` varchar(255) NOT NULL,
  `dia2` varchar(255) NOT NULL,
  `hora_comienzo_dia2` varchar(255) NOT NULL,
  `hora_finalizacion_dia2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catedras`
--

INSERT INTO `catedras` (`id`, `id_materia`, `dni_profesor`, `cupos`, `aula`, `aula_dia2`, `dia1`, `hora_comienzo_dia1`, `hora_finalizacion_dia1`, `dia2`, `hora_comienzo_dia2`, `hora_finalizacion_dia2`, `created_at`, `updated_at`) VALUES
(8, 1, 33079951, 30, '4', '4', 'LUNES', '16:00', '17:45', 'MIERCOLES', '16:00', '17:45', '2023-10-10 20:00:33', '2023-11-09 18:39:09'),
(9, 1, 33079951, 30, '4', '4', 'LUNES', '20:00', '21:45', 'MIERCOLES', '20:00', '21:45', '2023-10-10 20:01:23', '2023-10-10 20:01:23'),
(10, 10, 35267311, 40, 'SALA DE EXPOSICIONES', '2', 'MIERCOLES', '20:00', '21:45', 'VIERNES', '20:00', '21:45', '2023-10-12 01:30:37', '2023-10-12 15:03:53'),
(11, 20, 36992069, 40, 'SUM', '3', 'MIERCOLES', '20:00', '21:45', 'VIERNES', '20:00', '21:45', '2023-10-12 01:31:37', '2023-10-12 15:04:12'),
(12, 32, 32595931, 40, '1', '4', 'MIERCOLES', '18:00', '19:45', 'VIERNES', '18:00', '19:45', '2023-10-12 01:32:55', '2023-10-12 01:32:55'),
(13, 43, 32595931, 20, '1', '4', 'MIERCOLES', '20:00', '21:45', 'VIERNES', '20:00', '21:45', '2023-10-12 01:34:07', '2023-10-12 01:34:07'),
(14, 2, 36992069, 60, '3', '-', 'VIERNES', '18:00', '19:45', '-', '-', '-', '2023-10-12 01:34:59', '2023-10-12 23:08:48'),
(15, 11, 36992069, 40, 'SUM', '3', 'MIERCOLES', '18:00', '19:45', '-', '-', '-', '2023-10-12 01:35:54', '2023-10-12 15:30:05'),
(16, 21, 23469231, 70, 'SALA DE EXPOSICIONES', 'SALA DE EXPOSICIONES', 'MARTES', '19:30', '21:45', 'JUEVES', '20:00', '21:45', '2023-10-12 01:37:14', '2023-10-12 15:04:50'),
(17, 33, 23469231, 20, 'SALA DE EXPOSICIONES', 'SALA DE EXPOSICIONES', 'MARTES', '19:30', '21:45', 'JUEVES', '20:00', '21:45', '2023-10-12 01:38:30', '2023-10-12 15:05:09'),
(18, 44, 23469231, 20, 'SALA DE EXPOSICIONES', 'SALA DE EXPOSICIONES', 'MARTES', '19:30', '21:45', 'JUEVES', '20:00', '21:45', '2023-10-12 01:39:03', '2023-10-12 15:06:25'),
(19, 9, 14563173, 20, 'SUM', '-', 'LUNES', '14:20', '16:00', '-', '-', '-', '2023-10-12 01:40:02', '2023-10-12 15:06:37'),
(20, 9, 14563173, 20, 'SUM', '-', 'LUNES', '18:00', '19:20', '-', '-', '-', '2023-10-12 01:40:29', '2023-10-12 15:06:48'),
(21, 9, 14563173, 20, 'SUM', '-', 'MIERCOLES', '14:20', '16:00', '-', '-', '-', '2023-10-12 01:40:52', '2023-10-12 15:06:58'),
(22, 64, 14563173, 30, 'SUM', '-', 'LUNES', '19:20', '21:45', '-', '-', '-', '2023-10-12 01:41:44', '2023-10-12 15:07:10'),
(23, 65, 14563173, 30, 'SUM', '-', 'LUNES', '19:20', '21:45', '-', '-', '-', '2023-10-12 01:42:18', '2023-10-12 15:07:23'),
(24, 66, 14563173, 30, 'SUM', '-', 'LUNES', '19:20', '21:45', '-', '-', '-', '2023-10-12 01:42:50', '2023-10-12 15:07:34'),
(29, 61, 34890053, 20, '3', '-', 'MARTES', '15:40', '17:00', '-', '-', '-', '2023-10-12 15:10:26', '2023-10-12 15:10:26'),
(30, 62, 18617319, 20, '3', '-', 'MIERCOLES', '17:00', '18:00', '-', '-', '-', '2023-10-12 15:11:41', '2023-10-12 15:12:54'),
(31, 63, 18617319, 20, '3', '-', 'MIERCOLES', '17:00', '18:00', '-', '-', '-', '2023-10-12 15:12:43', '2023-10-12 15:12:43'),
(32, 59, 18617319, 20, '2', '-', 'LUNES', '17:00', '18:00', '-', '-', '-', '2023-10-12 15:14:17', '2023-10-12 15:14:17'),
(33, 60, 34890053, 20, '3', '-', 'MARTES', '17:00', '18:00', '-', '-', '-', '2023-10-12 15:15:32', '2023-10-12 15:15:32'),
(34, 19, 14819672, 30, '2', '-', 'JUEVES', '20:00', '21:20', '-', '-', '-', '2023-10-12 15:17:32', '2023-10-12 15:17:32'),
(35, 28, 14819672, 30, '2', '-', 'JUEVES', '16:00', '17:45', '-', '-', '-', '2023-10-12 15:18:24', '2023-10-12 15:18:24'),
(36, 31, 37008728, 0, '2', '-', 'MIERCOLES', '18:00', '19:40', '-', '-', '-', '2023-10-12 15:19:45', '2023-10-12 15:20:33'),
(37, 42, 37008728, 0, '2', '-', 'MIERCOLES', '18:00', '19:40', '-', '-', '-', '2023-10-12 15:22:05', '2023-10-12 15:22:05'),
(38, 53, 37008728, 0, '2', '-', 'MIERCOLES', '18:00', '19:40', '-', '-', '-', '2023-10-12 15:23:15', '2023-10-12 15:23:15'),
(39, 29, 36992069, 20, '3', '-', 'JUEVES', '18:00', '19:45', '-', '-', '-', '2023-10-12 15:29:20', '2023-10-12 15:29:20'),
(40, 40, 18010922, 20, '1', '-', 'JUEVES', '16:40', '18:00', '-', '-', '-', '2023-10-12 15:31:54', '2023-10-12 15:31:54'),
(41, 51, 18010922, 20, '1', '-', 'JUEVES', '16:40', '18:00', '-', '-', '-', '2023-10-12 15:32:22', '2023-10-12 15:32:22'),
(42, 30, 32595931, 0, '2', '-', 'MARTES', '18:00', '19:20', '-', '-', '-', '2023-10-12 15:34:10', '2023-10-12 15:34:10'),
(43, 41, 14819672, 0, '2', '-', 'JUEVES', '18:00', '19:45', '-', '-', '-', '2023-10-12 15:35:20', '2023-10-12 15:35:20'),
(44, 52, 14819672, 0, '2', '-', 'JUEVES', '18:00', '19:45', '-', '-', '-', '2023-10-12 15:43:13', '2023-10-12 15:43:31'),
(45, 67, 32595931, 30, '2', '4', 'MARTES', '16:40', '18:00', 'VIERNES', '16:40', '18:00', '2023-10-12 15:45:12', '2023-10-12 15:51:07'),
(46, 67, 42674390, 20, '1', 'SUM', 'MARTES', '19:20', '20:40', 'JUEVES', '19:20', '20:40', '2023-10-12 15:48:15', '2023-10-12 15:48:15'),
(47, 75, 32595931, 20, '3', 'VIRTUAL', 'MARTES', '19:20', '20:30', 'JUEVES', '19:20', '20:30', '2023-10-12 15:50:49', '2023-10-12 15:50:49'),
(48, 83, 36992069, 20, 'VIRTUAL', '4', 'MARTES', '20:30', '21:45', 'JUEVES', '20:30', '21:45', '2023-10-12 15:53:05', '2023-10-12 15:53:05'),
(49, 91, 23469231, 20, 'VIRTUAL', 'SUM', 'MARTES', '18:00', '19:30', 'VIERNES', '18:00', '19:30', '2023-10-12 15:54:51', '2023-10-12 15:54:51'),
(50, 68, 34890053, 30, 'SUM', 'SUM', 'MARTES', '18:00', '19:20', 'VIERNES', '19:40', '21:40', '2023-10-12 15:56:34', '2023-10-12 15:56:34'),
(51, 76, 34890053, 30, 'SUM', 'SUM', 'MARTES', '18:00', '19:20', 'VIERNES', '19:40', '21:40', '2023-10-12 15:57:56', '2023-10-12 15:57:56'),
(52, 84, 34890053, 20, 'SUM', 'SUM', 'MARTES', '19:20', '20:40', 'VIERNES', '19:40', '21:40', '2023-10-12 15:59:12', '2023-10-12 16:00:57'),
(53, 92, 34890053, 20, 'SUM', 'SUM', 'MARTES', '19:20', '20:40', 'VIERNES', '19:40', '21:40', '2023-10-12 15:59:54', '2023-10-12 16:01:16'),
(54, 69, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:02:14', '2023-10-12 16:02:14'),
(55, 77, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:12:23', '2023-10-12 16:12:23'),
(56, 85, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:13:07', '2023-10-12 16:13:07'),
(57, 93, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:13:42', '2023-10-12 16:13:42'),
(58, 3, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:14:06', '2023-10-12 16:14:06'),
(59, 12, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:14:30', '2023-10-12 16:14:30'),
(60, 22, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:15:20', '2023-10-12 16:15:20'),
(61, 34, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:15:48', '2023-10-12 16:15:48'),
(62, 45, 34890053, 0, '1', '-', 'VIERNES', '18:00', '19:40', '-', '-', '-', '2023-10-12 16:16:25', '2023-10-12 16:16:25'),
(63, 69, 42674390, 0, '1', '1', 'MARTES', '16:00', '19:00', 'MARTES', '20:40', '21:40', '2023-10-12 16:17:19', '2023-10-12 16:17:19'),
(64, 77, 42674390, 0, '1', '1', 'MARTES', '16:00', '19:00', 'MARTES', '20:40', '21:40', '2023-10-12 16:18:07', '2023-10-12 16:18:07'),
(65, 85, 42674390, 0, '1', '1', 'MARTES', '16:00', '19:00', 'MARTES', '20:40', '21:40', '2023-10-12 16:20:00', '2023-10-12 16:20:00'),
(66, 93, 42674390, 0, '1', '1', 'MARTES', '16:00', '19:00', 'MARTES', '20:40', '21:40', '2023-10-12 16:20:36', '2023-10-12 16:20:36'),
(67, 3, 42674390, 0, '1', '1', 'JUEVES', '18:00', '19:00', 'JUEVES', '20:40', '21:40', '2023-10-12 16:21:10', '2023-10-12 16:21:10'),
(68, 12, 42674390, 0, '1', '1', 'JUEVES', '18:00', '19:00', 'JUEVES', '20:40', '21:40', '2023-10-12 16:22:20', '2023-10-12 16:22:20'),
(69, 22, 42674390, 0, '1', '1', 'JUEVES', '18:00', '19:00', 'JUEVES', '20:40', '21:40', '2023-10-12 16:22:52', '2023-10-12 16:22:52'),
(70, 34, 42674390, 0, '1', '1', 'JUEVES', '18:00', '19:00', 'JUEVES', '20:40', '21:40', '2023-10-12 16:23:22', '2023-10-12 16:23:22'),
(71, 45, 42674390, 0, '1', '1', 'JUEVES', '18:00', '19:00', 'JUEVES', '20:40', '21:40', '2023-10-12 16:23:50', '2023-10-12 16:23:50'),
(72, 2, 35267311, 0, '1', '-', 'LUNES', '14:00', '17:00', '-', '-', '-', '2023-10-12 16:24:27', '2023-10-12 16:24:27'),
(73, 12, 35267311, 0, '1', '-', 'LUNES', '14:00', '17:00', '-', '-', '-', '2023-10-12 16:24:50', '2023-10-12 16:24:50'),
(74, 22, 35267311, 0, '1', '-', 'LUNES', '14:00', '17:00', '-', '-', '-', '2023-10-12 16:26:01', '2023-10-12 16:26:01'),
(75, 34, 35267311, 0, '1', '-', 'LUNES', '14:00', '17:00', '-', '-', '-', '2023-10-12 16:26:55', '2023-10-12 16:26:55'),
(76, 45, 35267311, 0, '1', '-', 'LUNES', '14:00', '17:00', '-', '-', '-', '2023-10-12 16:27:16', '2023-10-12 16:27:16'),
(77, 69, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:28:14', '2023-10-12 16:28:14'),
(78, 77, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:31:21', '2023-10-12 16:31:21'),
(79, 85, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:31:40', '2023-10-12 16:31:40'),
(80, 93, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:31:59', '2023-10-12 16:31:59'),
(81, 3, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:32:16', '2023-10-12 16:32:16'),
(82, 12, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:32:35', '2023-10-12 16:32:35'),
(83, 22, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:32:56', '2023-10-12 16:32:56'),
(84, 34, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:33:23', '2023-10-12 16:33:23'),
(85, 45, 18010922, 0, '1', '-', 'JUEVES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:33:47', '2023-10-12 16:33:47'),
(86, 99, 94455913, 0, '3', '-', 'LUNES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:34:58', '2023-10-12 16:34:58'),
(87, 100, 94455913, 0, '3', '-', 'LUNES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:35:18', '2023-10-12 16:35:18'),
(88, 101, 94455913, 0, '3', '-', 'LUNES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:35:37', '2023-10-12 16:35:37'),
(89, 102, 94455913, 0, '3', '-', 'LUNES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:35:58', '2023-10-12 16:35:58'),
(90, 103, 94455913, 0, '3', '-', 'MIERCOLES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:36:36', '2023-10-12 16:36:36'),
(91, 104, 94455913, 0, '3', '-', 'MIERCOLES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:37:09', '2023-10-12 16:37:09'),
(92, 105, 94455913, 0, '3', '-', 'MIERCOLES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:37:30', '2023-10-12 16:37:30'),
(93, 106, 94455913, 0, '3', '-', 'MIERCOLES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:37:52', '2023-10-12 16:37:52'),
(94, 107, 94455913, 0, '3', '-', 'MIERCOLES', '14:00', '20:00', '-', '-', '-', '2023-10-12 16:38:11', '2023-10-12 16:38:11'),
(95, 99, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:40:10', '2023-10-12 16:40:10'),
(96, 100, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:40:35', '2023-10-12 16:40:35'),
(97, 101, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:40:59', '2023-10-12 16:40:59'),
(98, 102, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:41:18', '2023-10-12 16:41:18'),
(99, 103, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:42:22', '2023-10-12 16:42:22'),
(100, 104, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:42:43', '2023-10-12 16:42:43'),
(101, 105, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:43:05', '2023-10-12 16:43:05'),
(102, 106, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:43:30', '2023-10-12 16:43:30'),
(103, 107, 14819672, 0, '2', '-', 'JUEVES', '14:00', '16:00', '-', '-', '-', '2023-10-12 16:43:51', '2023-10-12 16:43:51'),
(104, 70, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:44:40', '2023-10-12 16:44:40'),
(105, 78, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:45:01', '2023-10-12 16:45:01'),
(106, 86, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:45:28', '2023-10-12 16:45:28'),
(107, 94, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:45:49', '2023-10-12 16:45:49'),
(108, 4, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:46:10', '2023-10-12 16:46:10'),
(109, 13, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:46:31', '2023-10-12 16:46:31'),
(110, 23, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:46:51', '2023-10-12 16:46:51'),
(111, 35, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:47:12', '2023-10-12 16:47:12'),
(112, 46, 23416635, 0, '2', '-', 'VIERNES', '14:40', '20:00', '-', '-', '-', '2023-10-12 16:47:34', '2023-10-12 16:47:34'),
(113, 4, 33079951, 0, '4', '4', 'LUNES', '18:00', '20:00', 'MIERCOLES', '18:00', '20:00', '2023-10-12 16:48:29', '2023-10-12 16:48:29'),
(114, 13, 33079951, 0, '4', '4', 'LUNES', '18:00', '20:00', 'MIERCOLES', '18:00', '20:00', '2023-10-12 16:48:59', '2023-10-12 16:48:59'),
(115, 23, 33079951, 0, '4', '4', 'LUNES', '18:00', '20:00', 'MIERCOLES', '18:00', '20:00', '2023-10-12 16:49:32', '2023-10-12 16:49:32'),
(116, 35, 33079951, 0, '4', '4', 'LUNES', '18:00', '20:00', 'MIERCOLES', '18:00', '20:00', '2023-10-12 16:49:59', '2023-10-12 16:49:59'),
(117, 46, 33079951, 0, '4', '4', 'LUNES', '18:00', '20:00', 'MIERCOLES', '18:00', '20:00', '2023-10-12 16:50:24', '2023-10-12 16:50:24'),
(118, 72, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:50:53', '2023-10-12 16:50:53'),
(119, 80, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:51:17', '2023-10-12 16:51:17'),
(120, 88, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:52:00', '2023-10-12 16:52:00'),
(121, 96, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:52:21', '2023-10-12 16:52:21'),
(122, 6, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:52:45', '2023-10-12 16:52:45'),
(123, 15, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:53:06', '2023-10-12 16:53:06'),
(124, 25, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:53:28', '2023-10-12 16:53:28'),
(125, 37, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:53:50', '2023-10-12 16:53:50'),
(126, 48, 23469231, 0, 'SUM', '-', 'VIERNES', '14:00', '18:00', '-', '-', '-', '2023-10-12 16:54:14', '2023-10-12 16:54:14'),
(127, 73, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:55:07', '2023-10-12 16:55:07'),
(128, 81, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:55:54', '2023-10-12 16:55:54'),
(129, 89, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:56:27', '2023-10-12 16:56:27'),
(130, 97, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:57:02', '2023-10-12 16:57:02'),
(131, 7, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:57:31', '2023-10-12 16:57:31'),
(132, 16, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:57:59', '2023-10-12 16:57:59'),
(133, 26, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:58:36', '2023-10-12 16:58:36'),
(134, 38, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:59:09', '2023-10-12 16:59:09'),
(135, 49, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 16:59:48', '2023-10-12 16:59:48'),
(136, 74, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:00:54', '2023-10-12 17:00:54'),
(137, 82, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:01:27', '2023-10-12 17:01:27'),
(138, 90, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:02:01', '2023-10-12 17:02:01'),
(139, 98, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:02:35', '2023-10-12 17:02:35'),
(140, 8, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:03:18', '2023-10-12 17:03:18'),
(141, 17, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:03:44', '2023-10-12 17:03:44'),
(142, 27, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:04:11', '2023-10-12 17:04:11'),
(143, 39, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:04:39', '2023-10-12 17:04:39'),
(144, 50, 37008728, 0, '2', '2', 'MIERCOLES', '16:00', '18:00', 'MIERCOLES', '19.50', '21:40', '2023-10-12 17:05:11', '2023-10-12 17:05:11'),
(145, 71, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:07:17', '2023-10-12 17:07:17'),
(146, 79, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:08:04', '2023-10-12 17:08:04'),
(147, 87, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:08:44', '2023-10-12 17:08:44'),
(148, 95, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:09:17', '2023-10-12 17:09:17'),
(149, 5, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:09:44', '2023-10-12 17:09:44'),
(150, 14, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:10:25', '2023-10-12 17:10:25'),
(151, 24, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:10:55', '2023-10-12 17:10:55'),
(152, 36, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:11:27', '2023-10-12 17:11:27'),
(153, 47, 24170023, 0, '4', '4', 'MARTES', '18:00', '19:20', 'JUEVES', '17:00', '19:20', '2023-10-12 17:11:52', '2023-10-12 17:11:52'),
(154, 54, 34890053, 0, '3', '1', 'LUNES', '17:40', '20:00', 'MIERCOLES', '14:00', '17:00', '2023-10-12 17:13:22', '2023-10-12 17:13:22'),
(155, 55, 34890053, 0, '3', '1', 'LUNES', '17:40', '20:00', 'MIERCOLES', '14:00', '17:00', '2023-10-12 17:14:00', '2023-10-12 17:14:24'),
(156, 56, 34890053, 0, '3', '1', 'LUNES', '14:40', '20:00', 'MIERCOLES', '14:00', '17:00', '2023-10-12 17:15:00', '2023-10-12 17:15:00'),
(157, 57, 34890053, 0, '3', '1', 'LUNES', '17:40', '20:00', 'MIERCOLES', '14:00', '17:00', '2023-10-12 17:15:31', '2023-10-12 17:15:31'),
(158, 58, 34890053, 0, '3', '1', 'LUNES', '17:40', '20:00', 'MIERCOLES', '14:00', '17:00', '2023-10-12 17:16:11', '2023-10-12 17:16:11'),
(159, 54, 18617319, 0, '2', '3', 'LUNES', '18:00', '21:50', 'MIERCOLES', '18:00', '21:50', '2023-10-12 17:16:48', '2023-10-12 17:16:48'),
(160, 55, 18617319, 0, '2', '3', 'LUNES', '18:00', '21:50', 'MIERCOLES', '18:00', '21:50', '2023-10-12 17:17:25', '2023-10-12 17:17:25'),
(161, 56, 18617319, 0, '2', '3', 'LUNES', '18:00', '21:50', 'MIERCOLES', '18:00', '21:50', '2023-10-12 17:18:03', '2023-10-12 17:18:03'),
(162, 57, 18617319, 0, '2', '3', 'LUNES', '18:00', '21:50', 'MIERCOLES', '18:00', '21:50', '2023-10-12 17:18:03', '2023-10-12 17:18:20'),
(163, 58, 18617319, 0, '2', '3', 'LUNES', '18:00', '21:50', 'MIERCOLES', '18:00', '21:50', '2023-10-12 17:19:03', '2023-10-12 17:19:03'),
(164, 108, 36992069, 0, 'SALA DE EXPOSICIONES', '-', 'MIERCOLES', '16:30', '18:00', '-', '-', '-', '2023-10-12 17:19:28', '2023-10-12 17:19:28'),
(165, 109, 36992069, 0, 'SUM', '-', 'JUEVES', '17:00', '18:00', '-', '-', '-', '2023-10-12 17:19:48', '2023-10-12 17:19:48'),
(166, 110, 13782182, 0, '2', '-', 'MIERCOLES', '14:00', '16:00', '-', '-', '-', '2023-10-18 19:37:52', '2023-10-18 19:37:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativas`
--

CREATE TABLE `correlativas` (
  `id` int(10) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_correlativa` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `correlativas`
--

INSERT INTO `correlativas` (`id`, `id_materia`, `id_correlativa`, `created_at`, `updated_at`) VALUES
(1, 10, 1, NULL, NULL),
(2, 11, 2, NULL, NULL),
(3, 12, 3, NULL, NULL),
(4, 13, 4, NULL, NULL),
(5, 14, 5, NULL, NULL),
(6, 15, 6, NULL, NULL),
(7, 16, 7, NULL, NULL),
(8, 17, 8, NULL, NULL),
(9, 18, 9, NULL, NULL),
(10, 20, 2, NULL, NULL),
(11, 20, 10, NULL, NULL),
(12, 21, 11, NULL, NULL),
(13, 22, 12, NULL, NULL),
(14, 23, 13, NULL, NULL),
(15, 24, 14, NULL, NULL),
(16, 25, 15, NULL, NULL),
(17, 26, 16, NULL, NULL),
(18, 27, 17, NULL, NULL),
(19, 28, 19, NULL, NULL),
(20, 32, 20, NULL, NULL),
(21, 32, 11, NULL, NULL),
(22, 33, 21, NULL, NULL),
(23, 34, 22, NULL, NULL),
(24, 35, 23, NULL, NULL),
(25, 36, 24, NULL, NULL),
(26, 37, 25, NULL, NULL),
(27, 38, 26, NULL, NULL),
(28, 39, 27, NULL, NULL),
(29, 42, 31, NULL, NULL),
(30, 43, 32, NULL, NULL),
(31, 43, 21, NULL, NULL),
(32, 44, 33, NULL, NULL),
(33, 45, 34, NULL, NULL),
(34, 46, 35, NULL, NULL),
(35, 47, 36, NULL, NULL),
(36, 48, 37, NULL, NULL),
(37, 49, 38, NULL, NULL),
(38, 50, 39, NULL, NULL),
(39, 53, 42, NULL, NULL),
(40, 55, 54, NULL, NULL),
(41, 56, 55, NULL, NULL),
(42, 57, 56, NULL, NULL),
(43, 58, 57, NULL, NULL),
(44, 60, 59, NULL, NULL),
(45, 62, 61, NULL, NULL),
(46, 63, 62, NULL, NULL),
(47, 64, 18, NULL, NULL),
(48, 65, 64, NULL, NULL),
(49, 66, 65, NULL, NULL),
(50, 75, 67, NULL, NULL),
(51, 76, 68, NULL, NULL),
(52, 77, 69, NULL, NULL),
(53, 78, 70, NULL, NULL),
(54, 79, 71, NULL, NULL),
(55, 80, 72, NULL, NULL),
(56, 81, 73, NULL, NULL),
(57, 82, 74, NULL, NULL),
(58, 100, 99, NULL, NULL),
(59, 101, 100, NULL, NULL),
(60, 102, 101, NULL, NULL),
(61, 104, 103, NULL, NULL),
(62, 105, 104, NULL, NULL),
(63, 106, 105, NULL, NULL),
(64, 107, 106, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id` bigint(11) NOT NULL,
  `dni` int(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nacimiento` date NOT NULL,
  `celular` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `localidad` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `carrera` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examenes_fechas`
--

CREATE TABLE `examenes_fechas` (
  `id` int(11) NOT NULL,
  `id_catedra` int(11) NOT NULL,
  `aula` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_comienzo` varchar(255) NOT NULL,
  `hora_finalizacion` varchar(255) NOT NULL,
  `presidente` int(11) NOT NULL,
  `vocal1` int(11) NOT NULL,
  `vocal2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `examenes_fechas`
--

INSERT INTO `examenes_fechas` (`id`, `id_catedra`, `aula`, `fecha`, `hora_comienzo`, `hora_finalizacion`, `presidente`, `vocal1`, `vocal2`, `created_at`, `updated_at`) VALUES
(14, 35, 2, '2023-12-21', '14:00', '16:00', 14819672, 13782182, 14563173, '2023-10-23 19:12:50', '2023-10-23 19:13:19'),
(15, 34, 4, '2023-12-22', '14:00', '16:00', 23469231, 14563173, 34890053, '2023-10-23 19:14:04', '2023-10-23 19:14:04'),
(16, 102, 2, '2023-12-09', '16:00', '18:00', 14819672, 23416635, 18617319, '2023-10-23 19:14:53', '2023-10-23 19:14:53'),
(17, 43, 1, '2023-12-12', '14:00', '16:00', 33079951, 18617319, 14563173, '2023-10-23 19:15:36', '2023-10-23 19:15:36'),
(18, 18, 4, '2023-12-22', '16:00', '18:00', 13782182, 13782182, 18010922, '2023-10-23 19:16:07', '2023-10-23 19:16:07'),
(19, 143, 1, '2023-12-23', '14:00', '16:00', 18617319, 33079951, 13782182, '2023-10-23 19:17:08', '2023-10-23 19:17:08'),
(20, 152, 2, '2023-12-13', '16:00', '18:00', 24170023, 13782182, 23416635, '2023-10-23 19:17:42', '2023-10-23 19:17:42'),
(21, 84, 4, '2023-12-28', '14:00', '16:00', 14819672, 14563173, 42674390, '2023-10-23 19:18:16', '2023-10-23 19:18:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_examenes`
--

CREATE TABLE `inscripciones_examenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni` int(11) NOT NULL,
  `id_fecha_examen` int(11) NOT NULL,
  `condicion` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones_materias`
--

CREATE TABLE `inscripciones_materias` (
  `id` int(10) UNSIGNED NOT NULL,
  `dni` int(11) NOT NULL,
  `id_catedra` int(11) NOT NULL,
  `condicion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `modalidad` varchar(255) NOT NULL,
  `link_programa` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre_materia`, `modalidad`, `link_programa`, `created_at`, `updated_at`) VALUES
(1, 'LENGUAJE MUSICAL - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1b7fnPP2zQFeoFX1jCOYodKoCjvR7Lyiz/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', NULL, '2023-10-31 19:35:14'),
(2, 'CORO - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1Vp7v3pdGDzJvpyjSjfEJeTKi-o3NawJT/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', NULL, '2023-10-31 19:46:00'),
(3, 'PIANO - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1uhk5qzFwPmoysUzK90q1ehUw0lL0ot8E/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', NULL, '2023-10-31 19:46:13'),
(4, 'VIOLIN - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1O35mSfT6dme2qGrO5yEyBKx7zrtLHMAw/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', NULL, '2023-10-31 19:46:37'),
(5, 'VIOLONCELLO - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1IhpR4rViAsoILu9CFPZ9_LzYPusX9sKw/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', NULL, '2023-10-31 19:46:46'),
(6, 'FLAUTA TRAVERSA - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1Ynz_Yse9nJWqBsbfipSXH4MEhjaTdmau/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-06 21:58:36', '2023-10-31 19:46:58'),
(7, 'SAXO - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1u2Yucrq66dcd_CdjoHRsroLq1JFhaHHs/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:28:41', '2023-10-31 19:47:10'),
(8, 'CLARINETE - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/14bL3fI5mW0L9BgEB_iul5dpvsTJ6rYi4/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:28:55', '2023-10-31 19:47:28'),
(9, 'TRABAJO CORPORAL 1', 'ANUAL', 'https://docs.google.com/document/d/1EPgpDtc0Lrcpunx_pLa7Ru0oq2I1cmof/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:29:06', '2023-10-31 19:48:01'),
(10, 'LENGUAJE MUSICAL - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1eMeHx_2Go0olu4BiR7Oj7Xv9lR5h2OcW/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:29:25', '2023-10-31 19:48:12'),
(11, 'CORO - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1Q3FYstUIIzvdkt0r1pKZuCBWsVj01sJl/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:29:37', '2023-10-31 19:48:26'),
(12, 'PIANO - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1BYt3fx099_ZF3GKAseuWZ3WN6bln2h0X/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:29:53', '2023-10-31 19:48:37'),
(13, 'VIOLIN - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/14N30Wt02C7uyIqc0YVHcoc-ze0W5JmBc/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:30:02', '2023-10-31 19:48:50'),
(14, 'VIOLONCELLO - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1-cBpK8CBZZKboGFTFJkqn1xXpVJVHlX5/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:30:19', '2023-09-08 19:30:19'),
(15, 'FLAUTA TRAVERSA - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1h_tS4gYepqX4o7KTXt4IVX799eeW-CnW/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:30:30', '2023-09-08 19:30:30'),
(16, 'SAXO - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1L_dqmbIMrR2tlBKtXYjCwbKrWlyEsIX8/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:30:39', '2023-09-08 19:30:44'),
(17, 'CLARINETE - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1F0svUK599kOc6BCbQlGz5GoRfNkYRrLW/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:30:54', '2023-09-08 19:30:54'),
(18, 'TRABAJO CORPORAL 2', 'ANUAL', 'https://docs.google.com/document/d/1tci8t6qJDful9hIGScIryJbpsGHXxQr8/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:31:07', '2023-09-08 19:31:07'),
(19, 'APRECIACION MUSICAL 1', 'ANUAL', 'https://docs.google.com/document/d/1b9v-WsCrB6rRSmHJAfam7PW-AtZeh5dI/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:31:19', '2023-09-08 19:31:24'),
(20, 'LENGUAJE MUSICAL - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1tS81rPAAJG_GUWCTaOQYTbvYoArYWzfY/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:31:35', '2023-09-08 19:31:35'),
(21, 'CORO - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1GQ28fRIEb74ldI06AbY7jFy3Htp9KrQV/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:31:46', '2023-09-08 19:31:46'),
(22, 'PIANO - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1w42sBVQmOx3JYJC_Ta_eBjLNs0pyu85H/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:32:00', '2023-09-08 19:32:00'),
(23, 'VIOLIN - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/11wYCGYJGLW1j6y9sliJgW2MwLPn96oGD/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:32:12', '2023-09-08 19:32:12'),
(24, 'VIOLONCELLO - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/19yv7strpQuSuTyU3rDpWvfMRb59YV0AT/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:32:23', '2023-09-08 19:32:23'),
(25, 'FLAUTA TRAVERSA - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1opCW9IoXsZEBFEawF1KUMvIiuwR1wCUb/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:32:39', '2023-09-08 19:32:39'),
(26, 'SAXO - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1XaBRe7LdPd2BngfZU8aMGF6PlC300WJD/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:32:52', '2023-09-08 19:32:52'),
(27, 'CLARINETE - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1JHjTuwCOR8oUeWS7fWCIH_2qHn3udVbU/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:33:05', '2023-09-08 19:33:05'),
(28, 'APRECIACION MUSICAL 2', 'ANUAL', 'https://docs.google.com/document/d/1NWcct4ibTDhT6ec4PmGusnqRYlo9KvOJ/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:33:18', '2023-09-08 19:33:18'),
(29, 'PIANO COMPLEMENTARIO 1', 'ANUAL', 'https://docs.google.com/document/d/1NSBNly4RDMdWLa94_WYP8aDbxZS8K95p/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:33:28', '2023-09-08 19:33:28'),
(30, 'GUITARRA COMPLEMENTARIA 1', 'ANUAL', 'https://docs.google.com/document/d/11MplwjwXIPAkb6E-IFqxzlJjUNGPoEEX/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:33:40', '2023-09-08 19:33:40'),
(31, 'PRACTICA DE CONJUNTO 1', 'ANUAL', 'https://docs.google.com/document/d/1zln_SmduAR_0l4tL9kO3JpDS6s4qRZxq/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:33:50', '2023-09-08 19:33:50'),
(32, 'LENGUAJE MUSICAL - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1WzmMAqpNao2h2E0JmSQNGwZlDBsmfN9U/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:34:05', '2023-09-08 19:34:05'),
(33, 'CORO - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/18LqhRNrBL7tOKeRaR-9YO7I67yhAUlRi/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:34:15', '2023-09-08 19:34:15'),
(34, 'PIANO - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1dU5_pWHge9xOndjBYHxHoehus7KWbkQU/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:34:23', '2023-09-08 19:34:23'),
(35, 'VIOLIN - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1hLCj_WYQ5uhsdWuk93Lft8cfiaU6ch5S/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:34:42', '2023-09-08 19:34:42'),
(36, 'VIOLONCELLO - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1DHE3NMZFDr6kwWpoxf-9DBupQ6tuxMT-/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:34:56', '2023-09-08 19:34:56'),
(37, 'FLAUTA TRAVERSA - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1sb5p4mykDBruTaXXlLzouYEXx6sNKJvW/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:35:11', '2023-09-08 19:35:11'),
(38, 'SAXO - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1RXXyWxeAkYxqI-9qCY_S9FLktmhsVmxh/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:35:26', '2023-09-08 19:35:26'),
(39, 'CLARINETE - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/18XpjERgnmGgz4wHMHarDeUbY1lF0fq_C/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:35:39', '2023-09-08 19:35:39'),
(40, 'PIANO COMPLEMENTARIO 2', 'ANUAL', 'https://docs.google.com/document/d/1-K-Y8nOhb1Z71XW7JHJAeXxHWVjyCsVw/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:35:49', '2023-09-08 19:35:49'),
(41, 'GUITARRA COMPLEMENTARIA 2', 'ANUAL', 'https://docs.google.com/document/d/1rofi-ccCbQi_RhoPHPodyZ2naff7xXV0/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:35:59', '2023-09-08 19:35:59'),
(42, 'PRACTICA DE CONJUNTO 2', 'ANUAL', 'https://docs.google.com/document/d/166mlE2EDj9AKPRBr64pNRLvnMJVsMRmu/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:36:12', '2023-09-08 19:36:12'),
(43, 'ARMONIA', 'ANUAL', 'https://docs.google.com/document/d/1j8WctrVXxC6P1ueLwuLo3QPsIikgbyiP/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:36:20', '2023-09-08 19:36:20'),
(44, 'CORO - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1WGxF7G6V6USXXmIB57GFhWhhevGSZ9q0/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:36:34', '2023-09-08 19:36:34'),
(45, 'PIANO - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1vB5KI75n_sfgZfZB3bJ4txAYOPOzeUn3/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:36:44', '2023-09-08 19:36:44'),
(46, 'VIOLIN - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1Gse4KwvAY0wXO6_4oXE8Xv9hzvW9iYqV/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:36:52', '2023-09-08 19:36:52'),
(47, 'VIOLONCELLO - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1cmxaeY1GIdZPbgNEAhVauz4MiOvwCDgU/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:37:04', '2023-09-08 19:37:04'),
(48, 'FLAUTA TRAVERSA - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1z6eGhBu21MZ7KwPsQRxdwz3YOBbtKFTi/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:37:14', '2023-09-08 19:37:14'),
(49, 'SAXO - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1ZR4MJYJMc8cTULdOc4JVsVxS2isF0Vz3/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:37:24', '2023-09-08 19:37:24'),
(50, 'CLARINETE - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1GHQW1pj7ILGnlOYJHmI9zK3jwnn78NRy/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:37:35', '2023-09-08 19:37:35'),
(51, 'PIANO COMPLEMENTARIO 3', 'ANUAL', 'https://docs.google.com/document/d/177wPq-kocxYI2Tn8kcP0AGj4Gxx4XetS/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:37:46', '2023-09-08 19:37:46'),
(52, 'GUITARRA COMPLEMENTARIA 3', 'ANUAL', 'https://docs.google.com/document/d/1vwcoXtiQMiAhs-2nkXRl4my9qpM70NTE/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:00', '2023-09-08 19:38:00'),
(53, 'PRACTICA DE CONJUNTO 3', 'ANUAL', 'https://docs.google.com/document/d/1TAuNa-jp2Ivov4G-PcVd1wfhKlIqIJHH/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:12', '2023-09-08 19:38:12'),
(54, 'CANTO - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/102LRgLwS7Cf7InYdcU6AMwx9GBnvagJx/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:26', '2023-09-08 19:38:26'),
(55, 'CANTO - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1T24PUxf2GZEclcTfiCBENjCdXX-TTAY1/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:37', '2023-09-08 19:38:37'),
(56, 'CANTO - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1ElD1GE_L-9tQ38huBzzp0MXjCzEB8Un5/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:49', '2023-09-08 19:38:49'),
(57, 'CANTO - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1obxs54PNHeE5W_14osVo8KZtOHxY_gF0/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:38:56', '2023-09-08 19:38:56'),
(58, 'CANTO - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1UGW2sgf_c9JV_AyooCEkffK6d6Qz0NqM/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:39:04', '2023-09-08 19:39:04'),
(59, 'FONIATRIA 1', 'ANUAL', 'https://docs.google.com/document/d/1yD_gapoHV69CzNk35FMFfEmB26jKydqU/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:39:15', '2023-09-08 19:39:15'),
(60, 'FONIATRIA 2', 'ANUAL', 'https://docs.google.com/document/d/1r6k2zu7NcC3Vaq4oCp5DQVY8-G5UalWb/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:39:23', '2023-09-08 19:39:23'),
(61, 'FONETICA ITALIANA', 'ANUAL', 'https://docs.google.com/document/d/1d3UtOlUGh-nTRS1t1IgKFbRSBxzz8LYF/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:39:39', '2023-09-08 19:39:39'),
(62, 'FONETICA ALEMANA', 'ANUAL', 'https://docs.google.com/document/d/1gQjocs0UG95PdzI9HjgTwXCOKHzxPCIe/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:39:51', '2023-09-08 19:39:51'),
(63, 'FONETICA FRANCESA', 'ANUAL', 'https://docs.google.com/document/d/1-1MCds9t9hOqoiOz68smAGoNjrwKZ01B/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:40:01', '2023-09-08 19:40:01'),
(64, 'INTERPRETACION ESCENICA 1', 'ANUAL', 'https://docs.google.com/document/d/1qNqzMVStx0zzHr6e7F5YcndlIm_ZEvpA/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:40:20', '2023-09-08 19:40:20'),
(65, 'INTERPRETACION ESCENICA 2', 'ANUAL', 'https://docs.google.com/document/d/1zImDsyBXIXcp-BoC18Dw0ODS29Q3A-GI/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:40:43', '2023-09-08 19:40:43'),
(66, 'INTERPRETACION ESCENICA 3', 'ANUAL', 'https://docs.google.com/document/d/1pI4KO7LGCsak_wDLnenf8BNYNe561WSi/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:40:55', '2023-09-08 19:40:55'),
(67, 'LENGUAJE MUSICAL - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1NPlScdKWZlFrXNNiuBMIR_xxTnxpl4Ut/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 19:41:11', '2023-09-08 19:41:11'),
(68, 'CORO - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1JRxZkyVu6ia6qlhd2novbNf1v9rLlTOp/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:43:23', '2023-09-08 20:43:23'),
(69, 'PIANO - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1HeSTxsr_dk4d3Gnl9jTXBzWislplyuyw/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:43:40', '2023-09-08 20:43:40'),
(70, 'VIOLIN - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/11XSeg2lmkX9hs75VGQCV12fyLG0C9BW3/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:45:10', '2023-09-08 20:45:10'),
(71, 'VIOLONCELLO - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1vTtrpOa3kyZapVX8B7760eZXVePYPBKf/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:45:31', '2023-09-08 20:45:31'),
(72, 'FLAUTA TRAVERSA - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/14vUzsi62OQ39EPbDicg4DVYue54DV_jj/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:45:48', '2023-09-08 20:45:48'),
(73, 'SAXO - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1oPN68YiVj7GwE5tS4dXgAa8J2zxgKTPp/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:45:59', '2023-09-08 20:45:59'),
(74, 'CLARINETE - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/12_uli3KS8EmaOikxCjuF7OtR_d4yTaI-/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:46:10', '2023-09-08 20:46:10'),
(75, 'LENGUAJE MUSICAL - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1Tq5uhKXWZo8Ulb7RT_0_QaGJYnfWSPdp/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:46:30', '2023-09-08 20:46:30'),
(76, 'CORO - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/19B2H191xNwQknPg4e4kelLVkB9-WakG-/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:47:55', '2023-09-08 20:47:55'),
(77, 'PIANO - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1nxSo2kFNDybTTDMRO1yoI8tzOalH2ZS9/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:48:09', '2023-09-08 20:48:09'),
(78, 'VIOLIN - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1Ji9hr_-a06OvCi3q9H6I1U3dWHc9wdzP/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:48:24', '2023-09-08 20:48:24'),
(79, 'VIOLONCELLO - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1gJ71hTZB9TbAdGnFmXSL4eNZ_pQQR_mX/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:48:40', '2023-09-08 20:48:40'),
(80, 'FLAUTA TRAVERSA - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1tg7IOlGB-wScPMzPUuyShP1PE2z0u3k8/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:48:50', '2023-09-08 20:48:50'),
(81, 'SAXO - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/11m2gA6Zbby2wB7qDM27PUVn8PLXucXRN/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:49:06', '2023-09-08 20:49:06'),
(82, 'CLARINETE - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1CeuArqMU9ZIlm6ICgptAhjPFkjcwF-Gr/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:49:23', '2023-09-08 20:49:23'),
(83, 'LENGUAJE MUSICAL - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/13PvlEzyMocDZuQX6GJAOyr2Ny_AaCMvb/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:49:32', '2023-09-08 20:49:32'),
(84, 'CORO - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1pn5nre21K0QVTMIhnLvIcb680OP2HPxy/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:49:46', '2023-09-08 20:49:46'),
(85, 'PIANO - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1WCJFcIlcVDZ1jvcbP92HFDewBLaV47Lk/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:49:56', '2023-09-08 20:49:56'),
(86, 'VIOLIN - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1NXQYTb0TcCXi7reFqalrccOJzDQL_mPv/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:50:06', '2023-09-08 20:50:06'),
(87, 'VIOLONCELLO - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/13wQKbk-omPvs5qpecBsKug0zw5HMRHHK/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:50:18', '2023-09-08 20:50:18'),
(88, 'FLAUTA TRAVERSA - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1vc4lkp5qYNcag35YRSBnfh-KO1zBG-mY/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:50:29', '2023-09-08 20:50:29'),
(89, 'SAXO - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1-dJMD6MdPqLcC8EXSPbr9gyrhG3nLStL/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:50:39', '2023-09-08 20:50:39'),
(90, 'CLARINETE - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1cPjHVzhJw2EyOKz-duBbT-KnP2s8vIes/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:50:52', '2023-09-08 20:50:52'),
(91, 'LENGUAJE MUSICAL - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1KF5eeGjAxAs-EYY0FTt5OSkYRp4AuZGO/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:51:05', '2023-09-08 20:51:05'),
(92, 'CORO - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1ZQI4N5KDUK61bocRE-5SuoprL0s_lAnT/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:51:17', '2023-09-08 20:51:17'),
(93, 'PIANO - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1G11bXRkh_wo9IYM2eIp89WMBOGmKBqcb/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:51:30', '2023-09-08 20:51:30'),
(94, 'VIOLIN - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1_VW203oSqeEdZHxL3Qz5E1mLGXJ37iXd/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:51:42', '2023-09-08 20:51:42'),
(95, 'VIOLONCELLO - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/19deba5KPqGg-QxyMteXtNp8lywCQjm49/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:51:53', '2023-09-08 20:51:53'),
(96, 'FLAUTA TRAVERSA - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1ifv0K1aOo9XjqBrWBVSK3aNu1T0Bh2HQ/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:52:05', '2023-09-08 20:52:05'),
(97, 'SAXO - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1SptBy60Sk7TgkMvHdnzBQePBcnq6TCno/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:52:19', '2023-09-08 20:52:19'),
(98, 'CLARINETE - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1Ytzwf4BFoE6V51gA8tgvmX79T5AxCk0Z/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:52:30', '2023-09-08 20:52:30'),
(99, 'GUITARRA - MODULO 1', 'ANUAL', 'https://docs.google.com/document/d/1eri5o8gEsPmMNKhLiw1rMhTogwqsw4hL/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:52:41', '2023-09-08 20:52:41'),
(100, 'GUITARRA - MODULO 2', 'ANUAL', 'https://docs.google.com/document/d/1BPje5C7LsPBUkKtHKrXAV-Y8wailC_oq/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:52:50', '2023-09-08 20:52:50'),
(101, 'GUITARRA - MODULO 3', 'ANUAL', 'https://docs.google.com/document/d/1aLaNGcm6B4KSxVjij83B61XUEHU0prEO/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:01', '2023-09-08 20:53:01'),
(102, 'GUITARRA - MODULO 4', 'ANUAL', 'https://docs.google.com/document/d/1QdYLVuMq7x507J-oENGnKRah5to0Rdgs/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:12', '2023-09-08 20:53:12'),
(103, 'GUITARRA - INTRODUCTORIO 1', 'ANUAL', 'https://docs.google.com/document/d/1wPOEi3GFgrAThqPwLTKM4S2QmEtz1N3z/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:25', '2023-09-08 20:53:25'),
(104, 'GUITARRA - INTRODUCTORIO 2', 'ANUAL', 'https://docs.google.com/document/d/1d3z-aVP0yTXqBBKJys0RGCuSoZ-PyJ-q/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:34', '2023-09-08 20:53:34'),
(105, 'GUITARRA - BASICO 1', 'ANUAL', 'https://docs.google.com/document/d/1Jnrwkl7riuCoziLFh_yPP-6fDU6H9ONo/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:49', '2023-09-08 20:53:49'),
(106, 'GUITARRA - BASICO 2', 'ANUAL', 'https://docs.google.com/document/d/1AIssedTEzZtyPHuqpkMmRm3R3TZpMqcj/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:53:58', '2023-09-08 20:53:58'),
(107, 'GUITARRA - BASICO 3', 'ANUAL', 'https://docs.google.com/document/d/1Owxn6z4PA5iPGQ_0LM_Co2cwbFJoTMeD/edit?usp=drive_link&ouid=107221807239283716444&rtpof=true&sd=true', '2023-09-08 20:54:06', '2023-09-08 20:54:06'),
(108, 'CORO DE ADULTOS', 'ANUAL', NULL, '2023-10-11 22:06:05', '2023-10-11 22:06:05'),
(109, 'CORO INFANTIL', 'ANUAL', NULL, '2023-10-11 22:06:26', '2023-10-11 22:06:26'),
(110, 'CORO AMANECER', 'ANUAL', NULL, '2023-10-18 19:36:46', '2023-10-18 19:36:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_x_carreras`
--

CREATE TABLE `materias_x_carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias_x_carreras`
--

INSERT INTO `materias_x_carreras` (`id`, `id_carrera`, `id_materia`, `created_at`, `updated_at`) VALUES
(11, 9, 67, '2023-10-10 17:10:11', '2023-10-10 17:10:11'),
(12, 9, 68, '2023-10-10 17:13:45', '2023-10-10 17:13:45'),
(13, 9, 69, '2023-10-10 17:14:00', '2023-10-10 17:14:00'),
(14, 9, 75, '2023-10-10 17:14:17', '2023-10-10 17:14:17'),
(15, 9, 76, '2023-10-10 17:14:40', '2023-10-10 17:14:40'),
(16, 9, 77, '2023-10-10 17:15:11', '2023-10-10 17:15:11'),
(17, 9, 83, '2023-10-10 17:15:42', '2023-10-10 17:15:42'),
(18, 9, 84, '2023-10-10 17:15:59', '2023-10-10 17:16:36'),
(19, 9, 85, '2023-10-10 17:16:20', '2023-10-10 17:16:20'),
(20, 9, 91, '2023-10-10 17:16:59', '2023-10-10 17:16:59'),
(21, 9, 92, '2023-10-10 17:17:17', '2023-10-10 17:17:17'),
(22, 9, 93, '2023-10-10 17:17:33', '2023-10-10 17:17:33'),
(23, 10, 67, '2023-10-10 17:17:52', '2023-10-10 17:17:52'),
(24, 10, 68, '2023-10-10 17:18:06', '2023-10-10 17:18:06'),
(25, 10, 99, '2023-10-10 17:18:18', '2023-10-10 17:18:18'),
(26, 10, 75, '2023-10-10 17:18:43', '2023-10-10 17:18:43'),
(27, 10, 76, '2023-10-10 17:18:54', '2023-10-10 17:18:54'),
(28, 10, 100, '2023-10-10 17:19:09', '2023-10-10 17:19:09'),
(29, 10, 83, '2023-10-10 17:19:50', '2023-10-10 17:19:50'),
(30, 10, 84, '2023-10-10 17:20:01', '2023-10-10 17:20:01'),
(31, 10, 101, '2023-10-10 17:20:12', '2023-10-10 17:20:12'),
(32, 10, 102, '2023-10-10 17:20:45', '2023-10-10 17:27:11'),
(33, 10, 91, '2023-10-10 17:21:02', '2023-10-10 17:21:02'),
(35, 10, 92, '2023-10-10 17:27:25', '2023-10-10 17:27:25'),
(36, 11, 67, '2023-10-10 17:27:45', '2023-10-10 17:27:45'),
(37, 11, 68, '2023-10-10 17:28:06', '2023-10-10 17:28:06'),
(38, 11, 70, '2023-10-10 17:28:19', '2023-10-10 17:28:19'),
(39, 11, 75, '2023-10-10 17:28:36', '2023-10-10 17:28:36'),
(40, 11, 76, '2023-10-10 17:28:50', '2023-10-10 17:28:50'),
(41, 11, 78, '2023-10-10 17:29:01', '2023-10-10 17:29:01'),
(42, 11, 83, '2023-10-10 17:29:17', '2023-10-10 17:29:17'),
(43, 11, 84, '2023-10-10 17:29:32', '2023-10-10 17:29:32'),
(44, 11, 86, '2023-10-10 17:29:44', '2023-10-10 17:29:44'),
(45, 11, 91, '2023-10-10 17:29:57', '2023-10-10 17:29:57'),
(46, 11, 92, '2023-10-10 17:30:14', '2023-10-10 17:30:14'),
(47, 11, 94, '2023-10-10 17:30:40', '2023-10-10 17:30:40'),
(48, 15, 67, '2023-10-10 17:31:30', '2023-10-10 17:31:30'),
(49, 15, 68, '2023-10-10 17:31:41', '2023-10-10 17:31:41'),
(50, 15, 72, '2023-10-10 17:31:52', '2023-10-10 17:31:52'),
(51, 15, 75, '2023-10-10 17:32:11', '2023-10-10 17:32:11'),
(52, 15, 76, '2023-10-10 17:32:21', '2023-10-10 17:32:21'),
(53, 15, 80, '2023-10-10 17:32:34', '2023-10-10 17:32:34'),
(54, 15, 83, '2023-10-10 17:33:09', '2023-10-10 17:33:09'),
(55, 15, 84, '2023-10-10 17:33:19', '2023-10-10 17:33:19'),
(56, 15, 88, '2023-10-10 17:33:30', '2023-10-10 17:33:30'),
(57, 15, 91, '2023-10-10 17:33:43', '2023-10-10 17:33:43'),
(58, 15, 92, '2023-10-10 17:33:53', '2023-10-10 17:33:53'),
(59, 15, 96, '2023-10-10 17:34:11', '2023-10-10 17:34:11'),
(60, 12, 67, '2023-10-10 17:35:19', '2023-10-10 17:35:19'),
(61, 12, 75, '2023-10-10 17:35:40', '2023-10-10 17:35:40'),
(62, 12, 83, '2023-10-10 17:36:10', '2023-10-10 17:36:10'),
(63, 12, 91, '2023-10-10 17:36:20', '2023-10-10 17:36:20'),
(64, 12, 68, '2023-10-10 17:36:29', '2023-10-10 17:36:29'),
(65, 12, 76, '2023-10-10 17:36:41', '2023-10-10 17:36:41'),
(66, 12, 84, '2023-10-10 17:37:00', '2023-10-10 17:37:00'),
(67, 12, 92, '2023-10-10 17:37:10', '2023-10-10 17:37:10'),
(68, 12, 71, '2023-10-10 17:37:22', '2023-10-10 17:37:22'),
(69, 12, 79, '2023-10-10 17:37:29', '2023-10-10 17:37:29'),
(70, 12, 87, '2023-10-10 17:37:39', '2023-10-10 17:37:44'),
(71, 12, 95, '2023-10-10 17:37:52', '2023-10-10 17:37:52'),
(72, 13, 67, '2023-10-10 17:38:32', '2023-10-10 17:38:32'),
(73, 13, 75, '2023-10-10 17:38:48', '2023-10-10 17:38:48'),
(74, 13, 83, '2023-10-10 17:38:59', '2023-10-10 17:38:59'),
(75, 13, 91, '2023-10-10 17:39:11', '2023-10-10 17:39:11'),
(76, 13, 68, '2023-10-10 17:39:26', '2023-10-10 17:39:26'),
(77, 13, 76, '2023-10-10 17:39:39', '2023-10-10 17:39:39'),
(78, 13, 84, '2023-10-10 17:39:52', '2023-10-10 17:39:52'),
(79, 13, 92, '2023-10-10 17:40:04', '2023-10-10 17:40:12'),
(80, 13, 73, '2023-10-10 17:40:28', '2023-10-10 17:40:28'),
(81, 13, 81, '2023-10-10 17:40:42', '2023-10-10 17:40:42'),
(82, 13, 89, '2023-10-10 17:40:57', '2023-10-10 17:40:57'),
(83, 13, 97, '2023-10-10 17:41:11', '2023-10-10 17:41:11'),
(84, 14, 67, '2023-10-10 17:41:27', '2023-10-10 17:41:27'),
(85, 14, 75, '2023-10-10 17:41:45', '2023-10-10 17:41:45'),
(86, 14, 83, '2023-10-10 17:41:56', '2023-10-10 17:41:56'),
(87, 14, 91, '2023-10-10 17:42:12', '2023-10-10 17:42:12'),
(88, 14, 68, '2023-10-10 17:42:22', '2023-10-10 17:42:22'),
(89, 14, 76, '2023-10-10 17:42:34', '2023-10-10 17:42:34'),
(90, 14, 84, '2023-10-10 17:42:44', '2023-10-10 17:42:44'),
(91, 14, 92, '2023-10-10 17:42:57', '2023-10-10 17:43:07'),
(92, 14, 74, '2023-10-10 17:43:17', '2023-10-10 17:43:17'),
(93, 14, 82, '2023-10-10 17:43:29', '2023-10-10 17:43:29'),
(94, 14, 90, '2023-10-10 17:43:38', '2023-10-10 17:43:38'),
(95, 14, 98, '2023-10-10 17:43:49', '2023-10-10 17:43:49'),
(96, 1, 1, '2023-10-11 21:00:35', '2023-10-11 21:00:35'),
(97, 1, 2, '2023-10-11 21:00:48', '2023-10-11 21:00:48'),
(98, 1, 9, '2023-10-11 21:01:13', '2023-10-11 21:01:13'),
(99, 1, 10, '2023-10-11 21:01:29', '2023-10-11 21:01:29'),
(100, 1, 11, '2023-10-11 21:01:41', '2023-10-11 21:01:41'),
(101, 1, 18, '2023-10-11 21:01:55', '2023-10-11 21:01:55'),
(102, 1, 19, '2023-10-11 21:02:08', '2023-10-11 21:02:08'),
(103, 1, 20, '2023-10-11 21:02:21', '2023-10-11 21:02:21'),
(104, 1, 21, '2023-10-11 21:02:30', '2023-10-11 21:02:30'),
(105, 1, 28, '2023-10-11 21:02:40', '2023-10-11 21:02:40'),
(106, 1, 31, '2023-10-11 21:02:51', '2023-10-11 21:02:51'),
(107, 1, 32, '2023-10-11 21:03:05', '2023-10-11 21:03:05'),
(108, 1, 33, '2023-10-11 21:03:13', '2023-10-11 21:03:13'),
(109, 1, 42, '2023-10-11 21:03:24', '2023-10-11 21:03:24'),
(110, 1, 43, '2023-10-11 21:03:35', '2023-10-11 21:03:35'),
(111, 1, 44, '2023-10-11 21:03:45', '2023-10-11 21:03:45'),
(112, 1, 53, '2023-10-11 21:04:05', '2023-10-11 21:04:05'),
(113, 1, 3, '2023-10-11 21:04:20', '2023-10-11 21:04:20'),
(114, 1, 12, '2023-10-11 21:04:30', '2023-10-11 21:04:30'),
(115, 1, 22, '2023-10-11 21:04:40', '2023-10-11 21:04:40'),
(116, 1, 34, '2023-10-11 21:04:55', '2023-10-11 21:04:55'),
(117, 1, 45, '2023-10-11 21:05:13', '2023-10-11 21:05:13'),
(118, 2, 1, '2023-10-11 21:05:28', '2023-10-11 21:05:28'),
(119, 2, 2, '2023-10-11 21:05:37', '2023-10-11 21:05:37'),
(120, 2, 9, '2023-10-11 21:05:49', '2023-10-11 21:05:49'),
(121, 2, 10, '2023-10-11 21:06:05', '2023-10-11 21:06:05'),
(122, 2, 11, '2023-10-11 21:06:16', '2023-10-11 21:06:16'),
(123, 2, 18, '2023-10-11 21:06:31', '2023-10-11 21:06:31'),
(124, 2, 19, '2023-10-11 21:06:41', '2023-10-11 21:06:41'),
(125, 2, 20, '2023-10-11 21:06:52', '2023-10-11 21:06:52'),
(126, 2, 21, '2023-10-11 21:07:02', '2023-10-11 21:07:02'),
(127, 2, 28, '2023-10-11 21:07:12', '2023-10-11 21:07:12'),
(128, 2, 31, '2023-10-11 21:07:23', '2023-10-11 21:07:23'),
(129, 2, 32, '2023-10-11 21:07:35', '2023-10-11 21:07:35'),
(130, 2, 33, '2023-10-11 21:07:46', '2023-10-11 21:07:46'),
(131, 2, 42, '2023-10-11 21:07:58', '2023-10-11 21:07:58'),
(132, 2, 43, '2023-10-11 21:08:06', '2023-10-11 21:08:06'),
(133, 2, 44, '2023-10-11 21:08:17', '2023-10-11 21:08:17'),
(134, 2, 53, '2023-10-11 21:08:27', '2023-10-11 21:08:27'),
(135, 2, 103, '2023-10-11 21:08:39', '2023-10-11 21:08:39'),
(136, 2, 104, '2023-10-11 21:08:49', '2023-10-11 21:08:49'),
(137, 2, 105, '2023-10-11 21:09:00', '2023-10-11 21:09:00'),
(138, 2, 106, '2023-10-11 21:09:08', '2023-10-11 21:09:08'),
(139, 2, 107, '2023-10-11 21:09:20', '2023-10-11 21:09:20'),
(140, 3, 1, '2023-10-11 21:09:33', '2023-10-11 21:09:33'),
(141, 3, 2, '2023-10-11 21:09:42', '2023-10-11 21:09:42'),
(142, 3, 9, '2023-10-11 21:09:58', '2023-10-11 21:09:58'),
(143, 3, 10, '2023-10-11 21:10:11', '2023-10-11 21:10:11'),
(144, 3, 11, '2023-10-11 21:10:21', '2023-10-11 21:10:21'),
(145, 3, 18, '2023-10-11 21:10:33', '2023-10-11 21:10:33'),
(146, 3, 19, '2023-10-11 21:10:40', '2023-10-11 21:10:40'),
(147, 3, 20, '2023-10-11 21:10:57', '2023-10-11 21:10:57'),
(148, 3, 21, '2023-10-11 21:11:05', '2023-10-11 21:11:05'),
(149, 3, 28, '2023-10-11 21:11:15', '2023-10-11 21:11:15'),
(150, 3, 31, '2023-10-11 21:11:26', '2023-10-11 21:11:26'),
(152, 3, 29, '2023-10-11 21:15:23', '2023-10-11 21:15:23'),
(153, 3, 32, '2023-10-11 21:15:35', '2023-10-11 21:15:35'),
(154, 3, 33, '2023-10-11 21:15:44', '2023-10-11 21:15:44'),
(156, 3, 40, '2023-10-11 21:16:03', '2023-10-11 21:16:03'),
(157, 3, 42, '2023-10-11 21:16:14', '2023-10-11 21:16:14'),
(158, 3, 43, '2023-10-11 21:16:21', '2023-10-11 21:16:21'),
(159, 3, 44, '2023-10-11 21:16:31', '2023-10-11 21:16:31'),
(161, 3, 51, '2023-10-11 21:16:52', '2023-10-11 21:16:52'),
(162, 3, 53, '2023-10-11 21:17:04', '2023-10-11 21:17:04'),
(163, 3, 4, '2023-10-11 21:17:14', '2023-10-11 21:17:14'),
(164, 3, 13, '2023-10-11 21:17:27', '2023-10-11 21:17:27'),
(165, 3, 23, '2023-10-11 21:17:39', '2023-10-11 21:17:39'),
(166, 3, 35, '2023-10-11 21:17:50', '2023-10-11 21:17:50'),
(167, 3, 46, '2023-10-11 21:18:01', '2023-10-11 21:18:01'),
(168, 7, 1, '2023-10-11 21:19:41', '2023-10-11 21:19:41'),
(169, 7, 2, '2023-10-11 21:19:54', '2023-10-11 21:19:54'),
(170, 7, 9, '2023-10-11 21:20:08', '2023-10-11 21:20:08'),
(171, 7, 10, '2023-10-11 21:20:23', '2023-10-11 21:20:23'),
(172, 7, 11, '2023-10-11 21:20:36', '2023-10-11 21:20:36'),
(173, 7, 18, '2023-10-11 21:20:51', '2023-10-11 21:20:51'),
(174, 7, 19, '2023-10-11 21:21:01', '2023-10-11 21:21:01'),
(175, 7, 20, '2023-10-11 21:21:12', '2023-10-11 21:21:12'),
(176, 7, 21, '2023-10-11 21:21:20', '2023-10-11 21:21:20'),
(177, 7, 28, '2023-10-11 21:21:29', '2023-10-11 21:21:29'),
(178, 7, 31, '2023-10-11 21:21:38', '2023-10-11 21:21:38'),
(180, 7, 29, '2023-10-11 21:21:59', '2023-10-11 21:21:59'),
(181, 7, 32, '2023-10-11 21:22:12', '2023-10-11 21:22:12'),
(182, 7, 33, '2023-10-11 21:22:20', '2023-10-11 21:22:20'),
(184, 7, 40, '2023-10-11 21:22:43', '2023-10-11 21:22:43'),
(185, 7, 42, '2023-10-11 21:22:56', '2023-10-11 21:22:56'),
(186, 7, 43, '2023-10-11 21:23:05', '2023-10-11 21:23:05'),
(187, 7, 44, '2023-10-11 21:23:13', '2023-10-11 21:23:13'),
(189, 7, 51, '2023-10-11 21:23:33', '2023-10-11 21:23:33'),
(190, 7, 53, '2023-10-11 21:23:43', '2023-10-11 21:23:43'),
(191, 7, 6, '2023-10-11 21:23:56', '2023-10-11 21:23:56'),
(192, 7, 15, '2023-10-11 21:24:06', '2023-10-11 21:24:06'),
(193, 7, 25, '2023-10-11 21:24:16', '2023-10-11 21:24:16'),
(194, 7, 37, '2023-10-11 21:24:26', '2023-10-11 21:24:26'),
(195, 7, 48, '2023-10-11 21:24:35', '2023-10-11 21:24:35'),
(196, 4, 1, '2023-10-11 21:24:51', '2023-10-11 21:24:51'),
(197, 4, 2, '2023-10-11 21:25:01', '2023-10-11 21:25:01'),
(198, 4, 9, '2023-10-11 21:25:16', '2023-10-11 21:25:16'),
(199, 4, 10, '2023-10-11 21:25:27', '2023-10-11 21:25:27'),
(200, 4, 11, '2023-10-11 21:25:39', '2023-10-11 21:25:39'),
(201, 4, 18, '2023-10-11 21:25:52', '2023-10-11 21:25:52'),
(202, 4, 19, '2023-10-11 21:26:01', '2023-10-11 21:26:01'),
(203, 4, 20, '2023-10-11 21:26:11', '2023-10-11 21:26:11'),
(204, 4, 21, '2023-10-11 21:26:20', '2023-10-11 21:26:20'),
(205, 4, 28, '2023-10-11 21:26:29', '2023-10-11 21:26:29'),
(206, 4, 31, '2023-10-11 21:26:42', '2023-10-11 21:26:42'),
(208, 4, 29, '2023-10-11 21:27:02', '2023-10-11 21:27:02'),
(209, 4, 32, '2023-10-11 21:27:12', '2023-10-11 21:27:12'),
(210, 4, 33, '2023-10-11 21:27:20', '2023-10-11 21:27:20'),
(212, 4, 40, '2023-10-11 21:27:46', '2023-10-11 21:27:46'),
(213, 4, 42, '2023-10-11 21:27:58', '2023-10-11 21:27:58'),
(214, 4, 43, '2023-10-11 21:28:05', '2023-10-11 21:28:05'),
(215, 4, 44, '2023-10-11 21:28:17', '2023-10-11 21:28:17'),
(217, 4, 51, '2023-10-11 21:28:39', '2023-10-11 21:28:39'),
(218, 4, 53, '2023-10-11 21:28:50', '2023-10-11 21:28:50'),
(219, 4, 5, '2023-10-11 21:29:03', '2023-10-11 21:29:03'),
(220, 4, 14, '2023-10-11 21:29:13', '2023-10-11 21:29:13'),
(221, 4, 24, '2023-10-11 21:29:23', '2023-10-11 21:29:23'),
(222, 4, 36, '2023-10-11 21:29:35', '2023-10-11 21:29:35'),
(223, 4, 47, '2023-10-11 21:29:44', '2023-10-11 21:29:44'),
(224, 5, 1, '2023-10-11 21:30:42', '2023-10-11 21:30:42'),
(225, 5, 2, '2023-10-11 21:30:52', '2023-10-11 21:30:52'),
(226, 5, 9, '2023-10-11 21:31:03', '2023-10-11 21:31:03'),
(227, 5, 10, '2023-10-11 21:31:14', '2023-10-11 21:31:14'),
(228, 5, 11, '2023-10-11 21:31:25', '2023-10-11 21:31:25'),
(229, 5, 18, '2023-10-11 21:31:39', '2023-10-11 21:31:39'),
(230, 5, 19, '2023-10-11 21:31:46', '2023-10-11 21:31:46'),
(231, 5, 20, '2023-10-11 21:31:59', '2023-10-11 21:31:59'),
(232, 5, 21, '2023-10-11 21:32:09', '2023-10-11 21:32:09'),
(233, 5, 28, '2023-10-11 21:32:18', '2023-10-11 21:32:18'),
(234, 5, 31, '2023-10-11 21:32:31', '2023-10-11 21:32:31'),
(236, 5, 29, '2023-10-11 21:32:53', '2023-10-11 21:32:53'),
(237, 5, 32, '2023-10-11 21:33:07', '2023-10-11 21:33:07'),
(238, 5, 33, '2023-10-11 21:33:16', '2023-10-11 21:33:16'),
(240, 5, 40, '2023-10-11 21:33:38', '2023-10-11 21:33:38'),
(241, 5, 42, '2023-10-11 21:33:50', '2023-10-11 21:33:50'),
(242, 5, 43, '2023-10-11 21:33:57', '2023-10-11 21:33:57'),
(243, 5, 44, '2023-10-11 21:34:06', '2023-10-11 21:34:06'),
(245, 5, 51, '2023-10-11 21:34:31', '2023-10-11 21:34:31'),
(246, 5, 53, '2023-10-11 21:34:40', '2023-10-11 21:34:40'),
(247, 5, 7, '2023-10-11 21:34:53', '2023-10-11 21:34:53'),
(248, 5, 16, '2023-10-11 21:35:04', '2023-10-11 21:35:04'),
(249, 5, 26, '2023-10-11 21:35:15', '2023-10-11 21:35:15'),
(250, 5, 38, '2023-10-11 21:35:26', '2023-10-11 21:35:26'),
(251, 5, 49, '2023-10-11 21:35:37', '2023-10-11 21:35:37'),
(252, 6, 1, '2023-10-11 21:35:53', '2023-10-11 21:35:53'),
(253, 6, 2, '2023-10-11 21:36:02', '2023-10-11 21:36:02'),
(254, 6, 9, '2023-10-11 21:36:16', '2023-10-11 21:36:16'),
(255, 6, 10, '2023-10-11 21:36:30', '2023-10-11 21:36:30'),
(256, 6, 11, '2023-10-11 21:36:43', '2023-10-11 21:36:43'),
(257, 6, 18, '2023-10-11 21:36:54', '2023-10-11 21:36:54'),
(258, 6, 19, '2023-10-11 21:37:02', '2023-10-11 21:37:02'),
(259, 6, 20, '2023-10-11 21:37:15', '2023-10-11 21:37:15'),
(260, 6, 21, '2023-10-11 21:37:24', '2023-10-11 21:37:24'),
(261, 6, 28, '2023-10-11 21:37:34', '2023-10-11 21:37:34'),
(262, 6, 31, '2023-10-11 21:37:45', '2023-10-11 21:37:45'),
(264, 6, 29, '2023-10-11 21:38:06', '2023-10-11 21:38:06'),
(265, 6, 32, '2023-10-11 21:38:28', '2023-10-11 21:38:28'),
(266, 6, 33, '2023-10-11 21:38:36', '2023-10-11 21:38:36'),
(268, 6, 40, '2023-10-11 21:38:53', '2023-10-11 21:38:53'),
(269, 6, 42, '2023-10-11 21:39:02', '2023-10-11 21:39:02'),
(270, 6, 43, '2023-10-11 21:39:10', '2023-10-11 21:39:10'),
(271, 6, 44, '2023-10-11 21:39:20', '2023-10-11 21:39:20'),
(273, 6, 51, '2023-10-11 21:39:38', '2023-10-11 21:39:38'),
(274, 6, 53, '2023-10-11 21:39:53', '2023-10-11 21:39:53'),
(275, 6, 8, '2023-10-11 21:40:01', '2023-10-11 21:40:01'),
(276, 6, 17, '2023-10-11 21:40:09', '2023-10-11 21:40:09'),
(277, 6, 27, '2023-10-11 21:40:17', '2023-10-11 21:40:17'),
(278, 6, 39, '2023-10-11 21:40:24', '2023-10-11 21:40:24'),
(279, 6, 50, '2023-10-11 21:40:32', '2023-10-11 21:40:32'),
(280, 8, 1, '2023-10-11 21:40:51', '2023-10-11 21:40:51'),
(281, 8, 2, '2023-10-11 21:41:00', '2023-10-11 21:41:00'),
(282, 8, 9, '2023-10-11 21:41:10', '2023-10-11 21:41:10'),
(283, 8, 61, '2023-10-11 21:41:19', '2023-10-11 21:41:19'),
(284, 8, 59, '2023-10-11 21:41:28', '2023-10-11 21:41:28'),
(285, 8, 10, '2023-10-11 21:41:37', '2023-10-11 21:41:37'),
(286, 8, 11, '2023-10-11 21:41:45', '2023-10-11 21:41:45'),
(287, 8, 18, '2023-10-11 21:41:57', '2023-10-11 21:41:57'),
(288, 8, 19, '2023-10-11 21:42:04', '2023-10-11 21:42:04'),
(289, 8, 62, '2023-10-11 21:42:13', '2023-10-11 21:42:13'),
(290, 8, 60, '2023-10-11 21:42:22', '2023-10-11 21:42:22'),
(291, 8, 20, '2023-10-11 21:42:32', '2023-10-11 21:42:32'),
(292, 8, 21, '2023-10-11 21:42:40', '2023-10-11 21:42:40'),
(293, 8, 28, '2023-10-11 21:42:50', '2023-10-11 21:42:50'),
(294, 8, 31, '2023-10-11 21:43:03', '2023-10-11 21:43:03'),
(296, 8, 29, '2023-10-11 21:43:20', '2023-10-11 21:43:20'),
(297, 8, 63, '2023-10-11 21:43:29', '2023-10-11 21:43:29'),
(298, 8, 64, '2023-10-11 21:43:38', '2023-10-11 21:43:38'),
(299, 8, 32, '2023-10-11 21:43:47', '2023-10-11 21:43:47'),
(300, 8, 33, '2023-10-11 21:44:00', '2023-10-11 21:44:00'),
(302, 8, 40, '2023-10-11 21:44:25', '2023-10-11 21:44:25'),
(303, 8, 42, '2023-10-11 21:44:38', '2023-10-11 21:44:38'),
(304, 8, 65, '2023-10-11 21:44:50', '2023-10-11 21:44:50'),
(305, 8, 43, '2023-10-11 21:44:58', '2023-10-11 21:44:58'),
(306, 8, 44, '2023-10-11 21:45:07', '2023-10-11 21:45:07'),
(308, 8, 51, '2023-10-11 21:45:28', '2023-10-11 21:45:28'),
(309, 8, 66, '2023-10-11 21:45:37', '2023-10-11 21:45:37'),
(310, 8, 54, '2023-10-11 21:45:46', '2023-10-11 21:45:46'),
(311, 8, 55, '2023-10-11 21:45:53', '2023-10-11 21:45:53'),
(312, 8, 56, '2023-10-11 21:46:00', '2023-10-11 21:46:00'),
(313, 8, 57, '2023-10-11 21:46:06', '2023-10-11 21:46:06'),
(314, 8, 58, '2023-10-11 21:46:14', '2023-10-11 21:46:14'),
(315, 17, 108, '2023-10-11 22:06:55', '2023-10-11 22:06:55'),
(316, 16, 109, '2023-10-11 22:07:10', '2023-10-11 22:07:10'),
(317, 19, 110, '2023-10-18 19:37:02', '2023-10-18 19:37:02'),
(318, 20, 1, '2023-10-23 20:21:07', '2023-10-23 20:21:07'),
(319, 20, 2, '2023-10-23 20:21:24', '2023-10-23 20:21:24'),
(320, 20, 9, '2023-10-23 20:21:44', '2023-10-23 20:21:44'),
(321, 20, 10, '2023-10-23 20:21:58', '2023-10-23 20:21:58'),
(322, 20, 11, '2023-10-23 20:22:14', '2023-10-23 20:22:14'),
(323, 20, 19, '2023-10-23 20:22:23', '2023-10-23 20:22:23'),
(324, 20, 20, '2023-10-23 20:22:37', '2023-10-23 20:22:37'),
(325, 20, 21, '2023-10-23 20:22:50', '2023-10-23 20:22:50'),
(326, 20, 28, '2023-10-23 20:22:59', '2023-10-23 20:22:59'),
(327, 20, 31, '2023-10-23 20:23:23', '2023-10-23 20:23:23'),
(328, 20, 30, '2023-10-23 20:23:35', '2023-10-23 20:23:35'),
(329, 20, 32, '2023-10-23 20:23:47', '2023-10-23 20:23:47'),
(330, 20, 33, '2023-10-23 20:23:59', '2023-10-23 20:23:59'),
(331, 20, 41, '2023-10-23 20:24:19', '2023-10-23 20:24:19'),
(332, 20, 42, '2023-10-23 20:24:31', '2023-10-23 20:24:31'),
(333, 20, 43, '2023-10-23 20:24:47', '2023-10-23 20:24:47'),
(334, 20, 44, '2023-10-23 20:25:02', '2023-10-23 20:25:02'),
(335, 20, 52, '2023-10-23 20:25:13', '2023-10-23 20:25:13'),
(336, 20, 53, '2023-10-23 20:26:29', '2023-10-23 20:26:29'),
(337, 20, 4, '2023-10-23 20:26:45', '2023-10-23 20:26:45'),
(338, 20, 13, '2023-10-23 20:27:18', '2023-10-23 20:27:18'),
(339, 20, 23, '2023-10-23 20:27:30', '2023-10-23 20:27:30'),
(340, 20, 35, '2023-10-23 20:27:41', '2023-10-23 20:27:41'),
(341, 20, 46, '2023-10-23 20:27:55', '2023-10-23 20:27:55'),
(342, 21, 1, '2023-10-23 20:28:23', '2023-10-23 20:28:23'),
(343, 21, 2, '2023-10-23 20:28:42', '2023-10-23 20:28:42'),
(344, 21, 9, '2023-10-23 20:28:53', '2023-10-23 20:28:53'),
(345, 21, 10, '2023-10-23 20:29:13', '2023-10-23 20:29:13'),
(346, 21, 11, '2023-10-23 20:29:24', '2023-10-23 20:29:24'),
(347, 21, 18, '2023-10-23 20:29:34', '2023-10-23 20:29:34'),
(348, 21, 19, '2023-10-23 20:29:55', '2023-10-23 20:29:55'),
(349, 21, 20, '2023-10-23 20:30:08', '2023-10-23 20:30:08'),
(350, 21, 21, '2023-10-23 20:30:17', '2023-10-23 20:30:17'),
(351, 21, 28, '2023-10-23 20:30:23', '2023-10-23 20:30:23'),
(352, 21, 31, '2023-10-23 20:30:33', '2023-10-23 20:30:33'),
(353, 21, 30, '2023-10-23 20:30:44', '2023-10-23 20:30:44'),
(354, 21, 32, '2023-10-23 20:30:54', '2023-10-23 20:30:54'),
(355, 21, 33, '2023-10-23 20:31:05', '2023-10-23 20:31:05'),
(356, 21, 41, '2023-10-23 20:31:16', '2023-10-23 20:31:16'),
(357, 21, 42, '2023-10-23 20:31:26', '2023-10-23 20:31:26'),
(358, 21, 43, '2023-10-23 20:31:35', '2023-10-23 20:31:35'),
(359, 21, 44, '2023-10-23 20:31:44', '2023-10-23 20:31:44'),
(360, 21, 52, '2023-10-23 20:31:54', '2023-10-23 20:31:54'),
(361, 21, 53, '2023-10-23 20:32:05', '2023-10-23 20:32:05'),
(362, 21, 6, '2023-10-23 20:32:16', '2023-10-23 20:32:16'),
(363, 21, 15, '2023-10-23 20:32:26', '2023-10-23 20:32:26'),
(364, 21, 25, '2023-10-23 20:32:35', '2023-10-23 20:32:35'),
(365, 21, 37, '2023-10-23 20:32:47', '2023-10-23 20:32:47'),
(366, 21, 48, '2023-10-23 20:33:04', '2023-10-23 20:33:04'),
(367, 22, 1, '2023-10-23 20:33:38', '2023-10-23 20:34:20'),
(368, 22, 2, '2023-10-23 20:34:10', '2023-10-23 20:34:10'),
(369, 22, 9, '2023-10-23 20:34:32', '2023-10-23 20:34:32'),
(370, 22, 10, '2023-10-23 20:34:45', '2023-10-23 20:34:45'),
(371, 22, 11, '2023-10-23 20:34:57', '2023-10-23 20:34:57'),
(372, 22, 18, '2023-10-23 20:35:09', '2023-10-23 20:35:09'),
(373, 22, 19, '2023-10-23 20:35:19', '2023-10-23 20:35:19'),
(374, 22, 20, '2023-10-23 20:35:29', '2023-10-23 20:35:29'),
(375, 22, 21, '2023-10-23 20:35:45', '2023-10-23 20:35:45'),
(376, 22, 28, '2023-10-23 20:35:54', '2023-10-23 20:35:54'),
(377, 22, 31, '2023-10-23 20:36:06', '2023-10-23 20:36:06'),
(378, 22, 30, '2023-10-23 20:37:17', '2023-10-23 20:37:17'),
(379, 22, 32, '2023-10-23 20:37:30', '2023-10-23 20:37:30'),
(380, 22, 33, '2023-10-23 20:37:42', '2023-10-23 20:37:42'),
(381, 22, 41, '2023-10-23 20:37:53', '2023-10-23 20:37:53'),
(382, 22, 42, '2023-10-23 20:38:06', '2023-10-23 20:38:06'),
(383, 22, 43, '2023-10-23 20:38:17', '2023-10-23 20:38:17'),
(384, 22, 44, '2023-10-23 20:38:29', '2023-10-23 20:38:29'),
(385, 22, 52, '2023-10-23 20:38:40', '2023-10-23 20:38:40'),
(386, 22, 53, '2023-10-23 20:38:53', '2023-10-23 20:38:53'),
(387, 22, 5, '2023-10-23 20:39:17', '2023-10-23 20:39:17'),
(388, 22, 14, '2023-10-23 20:39:32', '2023-10-23 20:39:32'),
(389, 22, 24, '2023-10-23 20:39:49', '2023-10-23 20:39:49'),
(390, 22, 36, '2023-10-23 20:40:08', '2023-10-23 20:40:08'),
(391, 22, 47, '2023-10-23 20:40:23', '2023-10-23 20:40:23'),
(392, 23, 1, '2023-10-23 20:40:45', '2023-10-23 20:40:45'),
(393, 23, 2, '2023-10-23 20:40:58', '2023-10-23 20:40:58'),
(394, 23, 9, '2023-10-23 20:41:08', '2023-10-23 20:41:08'),
(395, 23, 10, '2023-10-23 20:41:19', '2023-10-23 20:41:19'),
(396, 23, 11, '2023-10-23 20:41:51', '2023-10-23 20:42:01'),
(397, 23, 18, '2023-10-23 20:42:14', '2023-10-23 20:42:14'),
(398, 23, 19, '2023-10-23 20:42:22', '2023-10-23 20:42:22'),
(399, 23, 20, '2023-10-23 20:42:34', '2023-10-23 20:42:34'),
(400, 23, 21, '2023-10-23 20:42:43', '2023-10-23 20:42:43'),
(401, 23, 28, '2023-10-23 20:42:51', '2023-10-23 20:42:51'),
(402, 23, 31, '2023-10-23 20:43:04', '2023-10-23 20:43:04'),
(403, 23, 30, '2023-10-23 20:43:20', '2023-10-23 20:43:20'),
(404, 23, 32, '2023-10-23 20:43:30', '2023-10-23 20:43:30'),
(405, 23, 33, '2023-10-23 20:43:40', '2023-10-23 20:43:40'),
(406, 23, 41, '2023-10-23 20:43:51', '2023-10-23 20:43:51'),
(407, 23, 42, '2023-10-23 20:44:01', '2023-10-23 20:44:01'),
(408, 23, 43, '2023-10-23 20:44:12', '2023-10-23 20:44:12'),
(409, 23, 44, '2023-10-23 20:44:21', '2023-10-23 20:44:21'),
(410, 23, 52, '2023-10-23 20:44:32', '2023-10-23 20:44:32'),
(411, 23, 53, '2023-10-23 20:44:42', '2023-10-23 20:44:42'),
(412, 23, 7, '2023-10-23 20:44:52', '2023-10-23 20:44:52'),
(413, 23, 16, '2023-10-23 20:45:03', '2023-10-23 20:45:03'),
(414, 23, 26, '2023-10-23 20:45:11', '2023-10-23 20:45:11'),
(415, 23, 38, '2023-10-23 20:45:23', '2023-10-23 20:45:23'),
(416, 23, 49, '2023-10-23 20:45:32', '2023-10-23 20:45:32'),
(417, 24, 1, '2023-10-23 20:45:56', '2023-10-23 20:45:56'),
(418, 24, 2, '2023-10-23 20:46:07', '2023-10-23 20:46:07'),
(419, 24, 9, '2023-10-23 20:46:21', '2023-10-23 20:46:21'),
(420, 24, 10, '2023-10-23 20:46:34', '2023-10-23 20:46:44'),
(421, 24, 11, '2023-10-23 20:46:56', '2023-10-23 20:46:56'),
(422, 24, 18, '2023-10-23 20:47:10', '2023-10-23 20:47:10'),
(423, 24, 19, '2023-10-23 20:47:19', '2023-10-23 20:47:19'),
(424, 24, 20, '2023-10-23 20:47:27', '2023-10-23 20:47:27'),
(425, 24, 21, '2023-10-23 20:47:36', '2023-10-23 20:47:36'),
(426, 24, 28, '2023-10-23 20:47:44', '2023-10-23 20:47:44'),
(427, 24, 31, '2023-10-23 20:47:52', '2023-10-23 20:47:52'),
(428, 24, 30, '2023-10-23 20:48:04', '2023-10-23 20:48:04'),
(429, 24, 32, '2023-10-23 20:48:14', '2023-10-23 20:48:14'),
(430, 24, 33, '2023-10-23 20:48:23', '2023-10-23 20:48:23'),
(431, 24, 41, '2023-10-23 20:48:34', '2023-10-23 20:48:34'),
(432, 24, 42, '2023-10-23 20:48:43', '2023-10-23 20:48:43'),
(433, 24, 43, '2023-10-23 20:48:51', '2023-10-23 20:48:51'),
(434, 24, 44, '2023-10-23 20:49:03', '2023-10-23 20:49:03'),
(435, 24, 52, '2023-10-23 20:49:16', '2023-10-23 20:49:16'),
(436, 24, 53, '2023-10-23 20:49:27', '2023-10-23 20:49:27'),
(437, 24, 8, '2023-10-23 20:49:37', '2023-10-23 20:49:37'),
(438, 24, 17, '2023-10-23 20:49:47', '2023-10-23 20:49:47'),
(439, 24, 27, '2023-10-23 20:49:56', '2023-10-23 20:49:56'),
(440, 24, 39, '2023-10-23 20:50:06', '2023-10-23 20:50:06'),
(441, 24, 50, '2023-10-23 20:50:16', '2023-10-23 20:50:16'),
(442, 25, 1, '2023-10-23 20:50:33', '2023-10-23 20:50:33'),
(443, 25, 2, '2023-10-23 20:50:44', '2023-10-23 20:50:44'),
(444, 25, 9, '2023-10-23 20:50:54', '2023-10-23 20:50:54'),
(445, 25, 61, '2023-10-23 20:51:06', '2023-10-23 20:51:06'),
(446, 25, 59, '2023-10-23 20:51:22', '2023-10-23 20:51:22'),
(447, 25, 10, '2023-10-23 20:51:31', '2023-10-23 20:51:31'),
(448, 25, 11, '2023-10-23 20:51:42', '2023-10-23 20:51:42'),
(449, 25, 18, '2023-10-23 20:51:53', '2023-10-23 20:51:53'),
(450, 25, 19, '2023-10-23 20:52:01', '2023-10-23 20:52:01'),
(451, 25, 62, '2023-10-23 20:52:10', '2023-10-23 20:52:10'),
(452, 25, 60, '2023-10-23 20:52:21', '2023-10-23 20:52:21'),
(453, 25, 20, '2023-10-23 20:52:30', '2023-10-23 20:52:30'),
(454, 25, 21, '2023-10-23 20:52:38', '2023-10-23 20:52:38'),
(455, 25, 28, '2023-10-23 20:52:46', '2023-10-23 20:52:46'),
(456, 25, 31, '2023-10-23 20:52:54', '2023-10-23 20:52:54'),
(457, 25, 30, '2023-10-23 20:53:07', '2023-10-23 20:53:07'),
(458, 25, 63, '2023-10-23 20:53:17', '2023-10-23 20:53:17'),
(459, 25, 64, '2023-10-23 20:53:27', '2023-10-23 20:53:27'),
(460, 25, 32, '2023-10-23 20:53:39', '2023-10-23 20:53:39'),
(461, 25, 33, '2023-10-23 20:53:48', '2023-10-23 20:53:48'),
(462, 25, 41, '2023-10-23 20:54:02', '2023-10-23 20:54:02'),
(463, 25, 42, '2023-10-23 20:54:11', '2023-10-23 20:54:11'),
(464, 25, 42, '2023-10-23 20:54:11', '2023-10-23 20:54:11'),
(465, 25, 65, '2023-10-23 20:54:24', '2023-10-23 20:54:24'),
(466, 25, 43, '2023-10-23 20:54:32', '2023-10-23 20:54:32'),
(467, 25, 44, '2023-10-23 20:54:40', '2023-10-23 20:54:40'),
(468, 25, 52, '2023-10-23 20:54:52', '2023-10-23 20:54:52'),
(469, 25, 53, '2023-10-23 20:55:04', '2023-10-23 20:55:04'),
(470, 25, 66, '2023-10-23 20:55:15', '2023-10-23 20:55:15'),
(471, 25, 54, '2023-10-23 20:55:23', '2023-10-23 20:55:23'),
(472, 25, 55, '2023-10-23 20:55:31', '2023-10-23 20:55:31'),
(473, 25, 56, '2023-10-23 20:55:40', '2023-10-23 20:55:40'),
(474, 25, 57, '2023-10-23 20:55:50', '2023-10-23 20:55:50'),
(475, 25, 58, '2023-10-23 20:55:58', '2023-10-23 20:55:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_12_025535_personas', 1),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2023_07_10_074104_CreateEstudiantesTableNew', 3),
(8, '2023_07_10_074104_CreateCarrerasTable', 4),
(9, '2023_07_10_074104_CreateInscripcionesMateriasTable', 5),
(10, '2023_07_10_074104_CreateInscripcionesExamenesTable', 6),
(11, '2023_07_10_074104_CreateMateriasxCarrera', 7),
(12, '2023_07_10_074104_CreateMateriasTable', 8),
(13, '2023_07_10_074104_CreateCorrelativasTable', 9),
(14, '2023_07_10_074104_CreateExamenesFechasTable', 10),
(15, '2023_07_10_074104_CreateCatedrasTable', 11),
(16, '2023_07_10_074104_CreateProfesoresTable', 12),
(17, '2023_07_10_074104_CreateCalificacionesTable', 13),
(18, '2023_07_10_074104_CreateCalificacionesTableNew', 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('LUISDELVALLE@GMAIL.COM', '$2y$10$KZ3flYknJzpj2ViOXFmPyuYKbT/6JabSH6xxdQSxd5VmykEnLZVRO', '2023-09-27 03:09:04'),
('ROMINAFERNANDEZ+2@GMAIL.COM', '$2y$10$sakTQE5J/FHrlQZmVKcz4.UGE8aL90UbUV.7dYIRjwd7EkR0xZd9m', '2023-10-31 22:50:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `nacimiento` date NOT NULL,
  `celular` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ingreso` int(11) NOT NULL,
  `horas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `dni`, `apellido`, `nombre`, `nacimiento`, `celular`, `mail`, `ingreso`, `horas`, `created_at`, `updated_at`) VALUES
(18, 13782182, 'CURA', 'LILIANA ISABEL', '1957-10-03', '1165395775', 'LILIANA40CURA@YAHOO.COM.AR', 2019, 2, '2023-10-18 19:35:33', '2023-10-18 19:35:33'),
(14, 14563173, 'URDAPILLETA', 'EMILIO WALTER', '1960-10-23', '1168697138', 'URDAPILLETAEMILIO@GMAIL.COM', 2005, 10, '2023-10-10 19:51:46', '2023-10-10 19:51:46'),
(12, 14819672, 'PERCOSSI', 'EDUARDO JUAN', '1961-11-15', '1133020292', 'EDUARDOPERCOSSI@GMAIL.COM', 2013, 7, '2023-10-10 19:48:52', '2023-10-10 19:48:52'),
(6, 18010922, 'DIAZ MINOLI', 'MARIA DEL LUJAN', '1949-06-22', '1133704641', 'MARADIAZMINOLI@YAHOO.COM.AR', 2008, 4, '2023-10-10 19:27:38', '2023-10-10 19:27:38'),
(4, 18617319, 'VÖLK', 'ANDREA PAOLA', '1967-02-03', '1153743796', 'PAOLAVOLK7@GMAIL.COM', 2021, 10, '2023-07-31 23:48:54', '2023-10-10 19:23:39'),
(9, 23416635, 'GONZALEZ ZEOLLA', 'MARIA PAULA', '1973-07-29', '1151489296', 'PAULAZEOLLA@HOTMAIL.COM', 2008, 5, '2023-10-10 19:36:54', '2023-10-10 19:36:54'),
(16, 23469231, 'MASTRANGO', 'GISELDA', '1973-06-24', '1131362808', 'GISELDAM@GMAIL.COM', 2023, 12, '2023-10-11 20:57:17', '2023-10-11 20:57:17'),
(17, 24170023, 'DELLA VALLE', 'PATRICIO MARTÍN', '1974-09-02', '1168742970', 'CHELOPATO74@GMAIL.COM', 2023, 4, '2023-10-11 20:58:34', '2023-10-11 20:58:34'),
(11, 32595931, 'MORALES', 'CARLOS ESTEBAN', '1987-02-18', '1130869986', 'ESTEZAGNER@GMAIL.COM', 2016, 14, '2023-10-10 19:47:10', '2023-10-10 19:47:10'),
(13, 33079951, 'STAROPOLI', 'GABRIELA MARINA', '1987-07-23', '1148899992', 'G_STAROPOLI@YAHOO.COM.AR', 2013, 12, '2023-10-10 19:50:18', '2023-10-10 19:50:18'),
(2, 34890053, 'GIL', 'NICOLAS', '1989-10-24', '1141958729', 'WAGNERIANOANDROID@GMAIL.COM', 2017, 16, '2023-07-12 10:38:09', '2023-10-10 19:10:32'),
(10, 35267311, 'LOPEZ', 'DIEGO RICARDO', '1990-06-05', '1124671062', 'DIEGORICARDOLOPEZ@GMAIL.COM', 2021, 13, '2023-10-10 19:38:48', '2023-10-10 19:38:48'),
(7, 36992069, 'FUCILI', 'PRISCILA PAULA', '1992-07-14', '1153850454', 'PRISCIFUCILI@HOTMAIL.COM', 2022, 15, '2023-10-10 19:33:25', '2023-10-10 19:33:25'),
(8, 37008728, 'FUNGO', 'FEDERICO', '1992-06-26', '1159037620', 'FUNGO.FEDERICO@GMAIL.COM', 2022, 5, '2023-10-10 19:34:43', '2023-10-10 19:34:43'),
(15, 42674390, 'ZIGART', 'ARIANA', '2000-06-29', '1165209618', 'ZIGARTARIANA@GMAIL.COM', 2022, 7, '2023-10-10 19:53:50', '2023-10-10 19:53:50'),
(5, 94455913, 'CUADROS PRADILLA', 'RICARDO', '1985-04-30', '1169349133', 'RICARDOCUADROSP@GMAIL.COM', 2010, 10, '2023-10-10 19:25:29', '2023-10-10 19:25:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(11) NOT NULL,
  `dni` int(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `dni`, `tipo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 38142329, 'admin', 'FORMICHELLI SANTIAGO ELIAS', 'SANTIFORM@GMAIL.COM', NULL, '$2y$10$L2HzRlxIZbl1.XOaRJCTueOGjxGqIxd0mvy5Q5pHO48H6KM6dHrtK', 'w89UK8o6KcK1RqbpJSjZvYvlo5eGoioxJCLzPb1KM9AtVy4vlnwmrnpKY171', '2023-04-12 07:16:04', '2023-10-18 20:29:02'),
(19, 31013373, 'admin', 'BOGO GABRIELA', 'emmu3fdireccion@gmail.com', NULL, '$2a$12$fcdZ7/VNB0L8ZHsAKMLfGusE/MJpfuALXK8Cv.QnBylDZvfErRyvC', 'gdeK3UrqaihXPrDVUx5BDyI0owdRJkHWCJ9qJHxJZc8pXIh5lcFxD58XKLiS', NULL, NULL),
(20, 94455913, 'profesor', 'CUADROS PRADILLA RICARDO', 'RICARDOCUADROSP@GMAIL.COM', NULL, '$2y$10$88tn.H3pkZoQBlJXzSwyZ.22eB1xvrO4JSRcqwwhyj0HmufJRflEq', NULL, NULL, NULL),
(21, 18010922, 'profesor', 'DIAZ MINOLI MARIA DEL LUJAN', 'MARADIAZMINOLI@YAHOO.COM.AR', NULL, '$2y$10$YSZuqzg6zKA5DS4OpsyjKODRqd8OF7bGR6C40Pf0pBZsgu1DYCTDW', NULL, NULL, NULL),
(22, 36992069, 'profesor', 'FUCILI PRISCILA PAULA', 'PRISCIFUCILI@HOTMAIL.COM', NULL, '$2y$10$INVQ6.eSdUl.OQgv.xpqHeX27IrbFWJD0mVF83wzh/whswKjEJJUm', NULL, NULL, NULL),
(23, 37008728, 'profesor', 'FUNGO FEDERICO', 'FUNGO.FEDERICO@GMAIL.COM', NULL, '$2y$10$czqe9nfd1vkiVKdG38bcM.BSrswPXrVxo5EKGOFCSl6Z/oMQhbLNG', NULL, NULL, NULL),
(24, 23416635, 'profesor', 'GONZALEZ ZEOLLA MARIA PAULA', 'PAULAZEOLLA@HOTMAIL.COM', NULL, '$2y$10$csv5LM69ZxveU2eMazaQSu./CiOjgGcentw9ilAA.OoizxqIAM2ue', NULL, NULL, NULL),
(25, 35267311, 'profesor', 'LOPEZ DIEGO RICARDO', 'DIEGORICARDOLOPEZ@GMAIL.COM', NULL, '$2y$10$8jIQcdkORbcmgJUF4mwCVewEkMWbnP6uO9ISMmpWdKDmT4LaUOENW', NULL, NULL, NULL),
(26, 32595931, 'profesor', 'MORALES CARLOS ESTEBAN', 'ESTEZAGNER@GMAIL.COM', NULL, '$2y$10$WBX6YCUdJbYe4TowWv3sM.NQbIR8xYqEItpGaSqFIG.jGnV5T/sI6', NULL, NULL, NULL),
(27, 14819672, 'profesor', 'PERCOSSI EDUARDO JUAN', 'EDUARDOPERCOSSI@GMAIL.COM', NULL, '$2y$10$a5E46ntMDNXGJ1NUeYe6I.mXD8hqc99JD4bkEiofN9xUJp7AJfIdq', NULL, NULL, NULL),
(28, 33079951, 'profesor', 'STAROPOLI GABRIELA MARINA', 'G_STAROPOLI@YAHOO.COM.AR', NULL, '$2y$10$KN10gy3ch9EtQKa/2YeY2O9ZRIMNbNtqd0zHSWomjBcio9igdX5s6', NULL, NULL, NULL),
(29, 14563173, 'profesor', 'URDAPILLETA EMILIO WALTER', 'URDAPILLETAEMILIO@GMAIL.COM', NULL, '$2y$10$oaplHJQ5Fc8jvR/2AQ2p0u40fy5y010jGraCTsPFwM11M3jAfT7mu', NULL, NULL, NULL),
(30, 42674390, 'profesor', 'ZIGART ARIANA', 'ZIGARTARIANA@GMAIL.COM', NULL, '$2y$10$mel1ujl.dw74LE44xGsYMu4TKqdrroDenW7EiI/epRhYltbXl0GSC', NULL, NULL, NULL),
(31, 23469231, 'profesor', 'MASTRANGO GISELDA', 'GISELDAM@GMAIL.COM', NULL, '$2y$10$oPHgqSgTJWIsXamkKiFS6uHN0eYrEqt5Sc1DddxrU1zXasje6ly/G', NULL, NULL, NULL),
(32, 24170023, 'profesor', 'DELLA VALLE PATRICIO MARTÍN', 'CHELOPATO74@GMAIL.COM', NULL, '$2y$10$GbrFSE7t.kNgT5NgoRgJbO1IHxvI8.gYEdvpa.6F/OzYDbsNtMktW', NULL, NULL, NULL),
(33, 18617319, 'profesor', 'VÖLK ANDREA PAOLA', 'PAOLAVOLK7@GMAIL.COM', NULL, '$2a$12$9x2oeToOtfWTy2iCoXIUqeMoharvPa01i7k8DpvZ6NGD5HbAltyyC', NULL, NULL, NULL),
(34, 34890053, 'profesor', 'GIL NICOLAS', 'WAGNERIANOANDROID@GMAIL.COM', NULL, '$2a$12$G2pao39q9mSx3jQ.yEQY5Ogef4aNYkQGBxMZP90V2YzT9bJD99rMK', NULL, NULL, NULL),
(35, 13782182, 'profesor', 'CURA LILIANA ISABEL', 'LILIANA40CURA@YAHOO.COM.AR', NULL, '$2y$10$cz5KkClnYmH5.bSBePgFmuhB/omh84oCIpV0RnhCC.pzKS.Z9wwt6', NULL, NULL, NULL),
(36, 123456789, 'admin', 'EMMU Administración', 'administracion@gmail.com', NULL, '$2a$12$juWyHBu6yEHIAmmT06Mcg.uzKY1i9NtSUdvlSuZ8QFabPmo7lJ2F6', 'g52JQyBOXA4sC0f72g5Vq4nDbQ8Mh6A6FeYUOzMV03dMHtSFjaCS8djwJYTI', NULL, NULL),
(69, 44319046, 'admin', 'ARRIOLA MICAELA AYELEN', 'micaarriola467@gmail.com', NULL, '$2a$12$HyM.3RrhQfp9Zo8lUvEYAOrNbbRJHDIkrv1aMBjmuL6dLLgkPzdza', NULL, NULL, NULL),
(70, 35799215, 'admin', 'CARBALLA MARILYN SOLEDAD', 'marilynsoledad61@gmail.com', NULL, '$2a$12$HyM.3RrhQfp9Zo8lUvEYAOrNbbRJHDIkrv1aMBjmuL6dLLgkPzdza', NULL, NULL, NULL),
(71, 34504438, 'admin', 'FERNANDEZ ROMINA PAULA', 'rominafernandez618@gmail.com', NULL, '$2a$12$HyM.3RrhQfp9Zo8lUvEYAOrNbbRJHDIkrv1aMBjmuL6dLLgkPzdza', NULL, NULL, NULL),
(72, 38142324, 'estudiante', 'LAMARCA TUMAMA', '213123', NULL, '$2y$10$O1hlpfTCVdY3knrfPXlchOyBjGiTrS5BrwBeAsQ/gvIZ1/HyxaYda', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `id_catedra` (`id_catedra`);

--
-- Indices de la tabla `asistencia_historial`
--
ALTER TABLE `asistencia_historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catedra` (`id_catedra`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `calificaciones_historial`
--
ALTER TABLE `calificaciones_historial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `catedra_id` (`catedra_id`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `catedras`
--
ALTER TABLE `catedras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_profesor` (`dni_profesor`);

--
-- Indices de la tabla `correlativas`
--
ALTER TABLE `correlativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_correlativa` (`id_correlativa`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `carrera` (`carrera`),
  ADD KEY `id_2` (`id`);

--
-- Indices de la tabla `examenes_fechas`
--
ALTER TABLE `examenes_fechas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_presidente` (`presidente`),
  ADD KEY `id_vocal1` (`vocal1`),
  ADD KEY `id_vocal2` (`vocal2`),
  ADD KEY `id_catedra` (`id_catedra`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `inscripciones_examenes`
--
ALTER TABLE `inscripciones_examenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `id_fecha_examen` (`id_fecha_examen`);

--
-- Indices de la tabla `inscripciones_materias`
--
ALTER TABLE `inscripciones_materias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`),
  ADD KEY `id_catedra` (`id_catedra`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias_x_carreras`
--
ALTER TABLE `materias_x_carreras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_carrera` (`id_carrera`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asistencia_historial`
--
ALTER TABLE `asistencia_historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calificaciones_historial`
--
ALTER TABLE `calificaciones_historial`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catedras`
--
ALTER TABLE `catedras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `examenes_fechas`
--
ALTER TABLE `examenes_fechas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones_examenes`
--
ALTER TABLE `inscripciones_examenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscripciones_materias`
--
ALTER TABLE `inscripciones_materias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias_x_carreras`
--
ALTER TABLE `materias_x_carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=476;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `estudiantes` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_catedra`) REFERENCES `catedras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `asistencia_historial`
--
ALTER TABLE `asistencia_historial`
  ADD CONSTRAINT `asistencia_historial_ibfk_1` FOREIGN KEY (`id_catedra`) REFERENCES `catedras` (`id`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `estudiantes` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `calificaciones_historial`
--
ALTER TABLE `calificaciones_historial`
  ADD CONSTRAINT `calificaciones_historial_ibfk_1` FOREIGN KEY (`catedra_id`) REFERENCES `catedras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catedras`
--
ALTER TABLE `catedras`
  ADD CONSTRAINT `catedras_ibfk_1` FOREIGN KEY (`dni_profesor`) REFERENCES `profesores` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `catedras_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `correlativas`
--
ALTER TABLE `correlativas`
  ADD CONSTRAINT `correlativas_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`),
  ADD CONSTRAINT `correlativas_ibfk_2` FOREIGN KEY (`id_correlativa`) REFERENCES `materias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`carrera`) REFERENCES `carreras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `examenes_fechas`
--
ALTER TABLE `examenes_fechas`
  ADD CONSTRAINT `examenes_fechas_ibfk_1` FOREIGN KEY (`presidente`) REFERENCES `profesores` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `examenes_fechas_ibfk_2` FOREIGN KEY (`vocal1`) REFERENCES `profesores` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `examenes_fechas_ibfk_3` FOREIGN KEY (`vocal2`) REFERENCES `profesores` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `examenes_fechas_ibfk_4` FOREIGN KEY (`id_catedra`) REFERENCES `catedras` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inscripciones_examenes`
--
ALTER TABLE `inscripciones_examenes`
  ADD CONSTRAINT `inscripciones_examenes_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `estudiantes` (`dni`),
  ADD CONSTRAINT `inscripciones_examenes_ibfk_2` FOREIGN KEY (`id_fecha_examen`) REFERENCES `examenes_fechas` (`id`);

--
-- Filtros para la tabla `inscripciones_materias`
--
ALTER TABLE `inscripciones_materias`
  ADD CONSTRAINT `inscripciones_materias_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `estudiantes` (`dni`),
  ADD CONSTRAINT `inscripciones_materias_ibfk_2` FOREIGN KEY (`id_catedra`) REFERENCES `catedras` (`id`);

--
-- Filtros para la tabla `materias_x_carreras`
--
ALTER TABLE `materias_x_carreras`
  ADD CONSTRAINT `materias_x_carreras_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `materias_x_carreras_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
