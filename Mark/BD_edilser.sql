-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2020 a las 07:27:57
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mark1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) UNSIGNED NOT NULL,
  `dpi` bigint(20) UNSIGNED NOT NULL,
  `primerNombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundoNombre` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tercerNombre` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primerApellido` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundoApellido` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoCasado` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `idEmpresa`, `dpi`, `primerNombre`, `segundoNombre`, `tercerNombre`, `primerApellido`, `segundoApellido`, `apellidoCasado`, `fechaNacimiento`) VALUES
(1, 1, 1231211234567, 'jose', 'irene', NULL, 'juarez', 'garcias', NULL, '1993-05-22'),
(8, 1, 1245445454545, 'jorge', 'mayen', NULL, 'jhgjhg', 'jhghjg', 'mayen', '2020-07-28'),
(9, 1, 1111111111111, 'Jaime', 'alejandro', NULL, 'Noj', 'garcia', NULL, '1990-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) UNSIGNED NOT NULL,
  `dpi` bigint(20) NOT NULL,
  `primerNombre` int(11) NOT NULL,
  `segundoNombre` int(11) NOT NULL,
  `tercerNombre` int(11) DEFAULT NULL,
  `primerApellido` int(11) NOT NULL,
  `segundoApellido` int(11) DEFAULT NULL,
  `apellidoCasado` int(11) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientevehiculo`
--

CREATE TABLE `clientevehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCliente` bigint(20) UNSIGNED NOT NULL,
  `idVehiculo` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientevehiculo`
--

INSERT INTO `clientevehiculo` (`id`, `idCliente`, `idVehiculo`) VALUES
(16, 1, 2),
(17, 9, 10),
(18, 1, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciondetalle`
--

CREATE TABLE `cotizaciondetalle` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idCotizacionencabezado` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cotizaciondetalle`
--

INSERT INTO `cotizaciondetalle` (`id`, `idCotizacionencabezado`, `tipo`, `descripcion`, `cantidad`, `valor`) VALUES
(48, 23, 'REPUESTO', 'filtro de aire', 1, '100.00'),
(49, 23, 'REPUESTO', 'pastillas', 2, '120.00'),
(50, 23, 'MO', 'Reparacion', NULL, '1000.00'),
(51, 23, 'OT', 'torno', NULL, '250.00'),
(52, 23, 'KMI', 'KMS de ingreso', NULL, '1250.00'),
(53, 23, 'KMN', 'KMS de proximo servicio', NULL, '1500.00'),
(54, 23, 'NOTAS', 'fgfdgdfgdfgd dg dg d gd fgd gdfg df dgf', NULL, NULL),
(61, 26, 'REPUESTO', 'dfgdf', 1, '4.00'),
(62, 26, 'MO', 'dfghfhf', NULL, '334.00'),
(63, 26, 'NOG', '12', NULL, '0.00'),
(64, 26, 'REQUERIMIENTO', 'Cambio de pastillas delanteras, traseras, bufas traseras y manesilla izquierda. Servicio necesarios para el buen funcionamiento de la ambulancia No. 213, marca Ford Transit,modelo 2013,Placa O-650BBT.', NULL, NULL),
(65, 26, 'CALIDAD', 'original Ford', NULL, NULL),
(66, 26, 'TIEMPO', '2 dias habiles despues de haber recibido la orden de compra', NULL, NULL),
(67, 26, 'GARANTIA', '7 meses', NULL, NULL),
(68, 26, 'OBSERVACIONES', 'se recomienda cambiar las llantas para el siguiente servicio', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacionencabezado`
--

CREATE TABLE `cotizacionencabezado` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) UNSIGNED NOT NULL,
  `idClienteVehiculo` bigint(20) UNSIGNED NOT NULL,
  `tipo` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cotizacionencabezado`
--

INSERT INTO `cotizacionencabezado` (`id`, `idEmpresa`, `idClienteVehiculo`, `tipo`, `fecha`, `total`, `estado`) VALUES
(23, 1, 16, 1, '2020-09-08', '1590.00', 1),
(26, 1, 16, 2, '2020-09-12', '338.00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idPais` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `departamento` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idPais`, `id`, `departamento`, `created_at`, `updated_at`) VALUES
(1, 2, 'Guatemala', '2020-08-27 20:33:57', '2020-08-27 20:33:57'),
(1, 3, 'El Progreso', '2020-08-28 22:24:09', '2020-08-28 22:24:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empresa` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDireccion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `empresa`, `idDireccion`) VALUES
(1, 'Gallo 25', 122),
(7, 'Pepsi', 1997),
(8, 'IGGS', 157);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nit` bigint(20) NOT NULL,
  `empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(11) UNSIGNED NOT NULL,
  `marca` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `idEmpresa`, `marca`) VALUES
(2, 1, 'Toyota'),
(3, 8, 'Honda'),
(4, 1, 'Isuzu'),
(5, 8, 'Mitsubishi'),
(6, 7, 'Lexus'),
(8, 1, 'VMW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2020_08_08_031125_create_companies', 3),
(5, '2020_08_08_033658_create_clients', 4),
(6, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(7, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(8, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(9, '2016_06_01_000004_create_oauth_clients_table', 5),
(10, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(11, '2020_02_22_071312_create_permission_tables', 6),
(12, '2020_08_18_144947_create_empresas_table', 6),
(13, '2020_08_18_145036_create_clientes_table', 6),
(14, '2020_08_19_185431_create_pais_table', 6),
(15, '2020_08_26_211038_create_departamento_table', 7),
(16, '2020_08_27_152640_create_municipio_table', 8),
(17, '2020_09_02_222630_create_clientevehiculo', 9),
(18, '2020_09_02_224330_create_cotizacion_encabezado', 10),
(19, '2020_09_02_224406_create_cotizacion_detalle', 10),
(20, '2020_09_02_233211_create_cotizacion_detalle', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `idMarca` bigint(11) UNSIGNED NOT NULL,
  `modelo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id`, `idMarca`, `modelo`) VALUES
(1, 2, 'Venza'),
(4, 2, 'corolla'),
(5, 2, 'yaris'),
(6, 3, 'civic'),
(7, 3, 'CR-V'),
(10, 4, 'D-max'),
(11, 5, 'L-200'),
(12, 5, 'Outlander'),
(13, 6, 'RC'),
(14, 6, 'GS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPais` bigint(20) UNSIGNED NOT NULL,
  `idDepartamento` bigint(20) UNSIGNED NOT NULL,
  `municipio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id`, `idPais`, `idDepartamento`, `municipio`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Guatemala', '2020-08-28 19:55:27', '2020-08-28 23:24:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pais` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'Guatemala', NULL, NULL),
(2, 'Honduras', NULL, NULL),
(3, 'El Salvador', NULL, '2020-08-20 12:36:27'),
(4, 'Nicaragua', '2020-08-20 09:25:53', '2020-08-20 09:25:53'),
(5, 'Costa Rica', '2020-08-21 23:08:21', '2020-08-21 23:08:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `idEmpresa` bigint(11) UNSIGNED NOT NULL,
  `tipo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`id`, `idEmpresa`, `tipo`) VALUES
(2, 1, 'Camioneta'),
(3, 1, 'Pickup'),
(4, 1, 'Hatchback'),
(5, 1, 'sedán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'edilser', 'a@a.com', NULL, '$2y$10$sHcH..YZaqjm3X.B9TsTN.oyE6uG7tUeaucIOxAlC/xnL8kyNeWxy', NULL, '2020-08-07 11:08:39', '2020-08-07 11:08:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idEmpresa` bigint(20) UNSIGNED NOT NULL,
  `idMarca` bigint(20) UNSIGNED NOT NULL,
  `idModelo` bigint(20) UNSIGNED NOT NULL,
  `idTipo` bigint(20) UNSIGNED NOT NULL,
  `placa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chasis` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motor` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `año` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`id`, `idEmpresa`, `idMarca`, `idModelo`, `idTipo`, `placa`, `chasis`, `motor`, `color`, `año`) VALUES
(2, 8, 2, 1, 2, '610hlp', 'jh4gh443gfdd', 'd54542', 'blanco', 2020),
(10, 1, 6, 13, 5, '450YHJ', 'KJ45K6GJ45K6G4K565', 'D345454', 'azul', 2018),
(11, 1, 2, 4, 5, '345TYU', 'JHG54J654JHJG45', 'D455454', 'verde', 2005);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_idempresa_foreign` (`idEmpresa`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clientes_dpi_unique` (`dpi`),
  ADD KEY `clientes_idempresa_foreign` (`idEmpresa`);

--
-- Indices de la tabla `clientevehiculo`
--
ALTER TABLE `clientevehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientevehiculo_idcliente_foreign` (`idCliente`),
  ADD KEY `clientevehiculo_idvehiculo_foreign` (`idVehiculo`);

--
-- Indices de la tabla `cotizaciondetalle`
--
ALTER TABLE `cotizaciondetalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotizaciondetalle_idcotizacionencabezado_foreign` (`idCotizacionencabezado`);

--
-- Indices de la tabla `cotizacionencabezado`
--
ALTER TABLE `cotizacionencabezado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotizacionencabezado_idempresa_foreign` (`idEmpresa`),
  ADD KEY `cotizacionencabezado_idclientevehiculo_foreign` (`idClienteVehiculo`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamento_idpais_foreign` (`idPais`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_idempresa_foreign` (`idEmpresa`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelo_idmarca_foreign` (`idMarca`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipio_idpais_foreign` (`idPais`),
  ADD KEY `municipio_iddepartamento_foreign` (`idDepartamento`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipovehiculo_idempresa_foreign` (`idEmpresa`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo_idempresa_foreign` (`idEmpresa`),
  ADD KEY `vehiculo_idmarca_foreign` (`idMarca`),
  ADD KEY `vehiculo_idmodelo_foreign` (`idModelo`),
  ADD KEY `vehiculo_idtipo_foreign` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientevehiculo`
--
ALTER TABLE `clientevehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `cotizaciondetalle`
--
ALTER TABLE `cotizaciondetalle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `cotizacionencabezado`
--
ALTER TABLE `cotizacionencabezado`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresas` (`id`);

--
-- Filtros para la tabla `clientevehiculo`
--
ALTER TABLE `clientevehiculo`
  ADD CONSTRAINT `clientevehiculo_idcliente_foreign` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `clientevehiculo_idvehiculo_foreign` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`id`);

--
-- Filtros para la tabla `cotizaciondetalle`
--
ALTER TABLE `cotizaciondetalle`
  ADD CONSTRAINT `cotizaciondetalle_idcotizacionencabezado_foreign` FOREIGN KEY (`idCotizacionencabezado`) REFERENCES `cotizacionencabezado` (`id`);

--
-- Filtros para la tabla `cotizacionencabezado`
--
ALTER TABLE `cotizacionencabezado`
  ADD CONSTRAINT `cotizacionencabezado_idclientevehiculo_foreign` FOREIGN KEY (`idClienteVehiculo`) REFERENCES `clientevehiculo` (`id`),
  ADD CONSTRAINT `cotizacionencabezado_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_idpais_foreign` FOREIGN KEY (`idPais`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_idmarca_foreign` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_iddepartamento_foreign` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`id`),
  ADD CONSTRAINT `municipio_idpais_foreign` FOREIGN KEY (`idPais`) REFERENCES `pais` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD CONSTRAINT `tipovehiculo_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_idempresa_foreign` FOREIGN KEY (`idEmpresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `vehiculo_idmarca_foreign` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`id`),
  ADD CONSTRAINT `vehiculo_idmodelo_foreign` FOREIGN KEY (`idModelo`) REFERENCES `modelo` (`id`),
  ADD CONSTRAINT `vehiculo_idtipo_foreign` FOREIGN KEY (`idTipo`) REFERENCES `tipovehiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
