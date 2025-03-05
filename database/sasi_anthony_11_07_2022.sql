-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-07-2022 a las 15:45:37
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sasi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_desktop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_tablet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_movil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `texto_principal` mediumtext COLLATE utf8mb4_unicode_ci,
  `texto_secundario` longtext COLLATE utf8mb4_unicode_ci,
  `boton` int(11) NOT NULL,
  `height` int(11) NOT NULL DEFAULT '100',
  `pagina` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `nombre_banner`, `imagen_desktop`, `imagen_tablet`, `imagen_movil`, `texto_principal`, `texto_secundario`, `boton`, `height`, `pagina`, `created_at`, `updated_at`) VALUES
(1, 'Banner Home', 'banners\\July2022\\4ZK2IwOicXh4VAyrVWD1.jpg', NULL, 'banners\\July2022\\EkiZAx9ExrEXoj1Ik14i.jpg', 'DESCUBRE LOS <br>\r\nCURSOS ONLINE <br>\r\nQUE TENEMOS PARA TI', NULL, 1, 50, 1, '2022-07-04 19:30:00', '2022-07-08 19:31:46'),
(2, 'Banner_ap', 'banners\\July2022\\gJJ2Io4bfQN1heqqrq8l.jpg', NULL, 'banners\\July2022\\PdceTPZtmUrZcpZcNNTG.jpg', 'CONTENIDO AL <br> ALCANCE DE TU MANO <br> \r\nDESDE NUESTRA APP', NULL, 1, 100, 1, '2022-07-05 18:04:00', '2022-07-08 19:32:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`, `icono`) VALUES
(3, NULL, 1, 'Crecimiento Profesional', 'crecimiento-profesional', '2022-06-28 20:17:38', '2022-07-05 00:20:56', 'categories\\July2022\\hqaOotIq3wEr3Hp7GrgC.png'),
(4, NULL, 2, 'Estilo de Vida', 'estilo-de-vida', '2022-06-28 20:18:16', '2022-07-05 00:20:07', 'categories\\July2022\\meDxIBpcNxoSjKNZaXQb.png'),
(5, NULL, 3, 'Vida Sana', 'vida-sana', '2022-06-28 20:18:55', '2022-07-05 00:19:49', 'categories\\July2022\\GH1fhVkoSGU1nWlEQ3UJ.png'),
(6, NULL, 4, 'Populares', 'populares', '2022-06-28 20:19:48', '2022-07-05 00:20:27', 'categories\\July2022\\Ub5iYV1PQaduL6Z6IBiD.png'),
(7, NULL, 5, 'Recientes', 'recientes', '2022-06-28 20:20:26', '2022-07-05 00:21:10', 'categories\\July2022\\1u2UY2nXyjEbWQ0fpQmw.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'voyager::seeders.data_rows.roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 6),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, '{}', 7),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, '{}', 2),
(31, 5, 'category_id', 'select_multiple', 'Category', 0, 0, 1, 1, 1, 0, '{\"default\":\"0\",\"options\":{\"0\":\"Seleccione una Categoria\",\"3\":\"Crecimiento Profesional\",\"4\":\"Estilo de Vida\",\"5\":\"Vida Sana\",\"6\":\"Populares\",\"7\":\"Recientes\"}}', 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, '{}', 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 0, 0, 1, 1, 1, 1, '{}', 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, '{}', 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, '{}', 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, '{}', 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(57, 7, 'nombre_producto', 'text', 'Nombre del Producto', 1, 1, 1, 1, 1, 1, '{}', 2),
(58, 7, 'descripcion', 'rich_text_box', 'Descripción', 1, 1, 1, 1, 1, 1, '{}', 3),
(59, 7, 'categorias', 'select_multiple', 'Categorias', 1, 1, 1, 1, 1, 1, '{\"default\":\"Seleccionar\",\"options\":{\"\":\"Selecionar\",\".Emprendimiento\":\"Emprendimiento\",\".Crecimiento_Profesional\":\"Crecimiento Profesional\",\".Estilo_de_Vida\":\"Estilo de Vida\",\".Proximamente\":\"Proximamente\",\".Vida_Sana\":\"Vida Sana\",\".Web\":\"Web\"}}', 4),
(60, 7, 'id_lms', 'number', 'id del LMS', 1, 1, 1, 1, 1, 1, '{}', 5),
(61, 7, 'precio', 'text', 'Precio', 1, 1, 1, 1, 1, 1, '{}', 6),
(62, 7, 'sku', 'text', 'Sku', 1, 1, 1, 1, 1, 1, '{}', 7),
(63, 7, 'url_video', 'text', 'Url Video', 1, 1, 1, 1, 1, 1, '{}', 8),
(64, 7, 'nombre_profesor', 'text', 'Nombre Profesor', 1, 1, 1, 1, 1, 1, '{}', 9),
(65, 7, 'descripcion_profesor', 'text_area', 'Descripcion Profesor', 1, 1, 1, 1, 1, 1, '{}', 10),
(66, 7, 'imagen_profesor', 'image', 'Imagen Profesor', 1, 1, 1, 1, 1, 1, '{}', 11),
(67, 7, 'titulo_profesor', 'text', 'Titulo Profesor', 1, 1, 1, 1, 1, 1, '{}', 12),
(68, 7, 'duracion', 'number', 'Duracion', 1, 1, 1, 1, 1, 1, '{}', 13),
(69, 7, 'sesiones', 'number', 'Sesiones', 0, 1, 1, 1, 1, 1, '{}', 14),
(70, 7, 'imagen_producto', 'image', 'Imagen Producto', 1, 1, 1, 1, 1, 1, '{}', 15),
(71, 7, 'estatus_id', 'select_dropdown', 'Estatus Id', 1, 1, 1, 1, 1, 1, '{\"default\":\"Seleccionar\",\"options\":{\"0\":\"Selecionar\",\"1\":\"Activo\",\"2\":\"Inactivo\"}}', 16),
(72, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 17),
(73, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 18),
(74, 8, 'id', 'text', 'Id', 1, 1, 1, 0, 0, 0, '{}', 1),
(75, 8, 'nombre_banner', 'text', 'Nombre Banner', 1, 1, 1, 1, 1, 1, '{}', 2),
(76, 8, 'imagen_desktop', 'image', 'Imagen Desktop', 1, 1, 1, 1, 1, 1, '{\"resize\":{},\"quality\":\"100%\",\"upsize\":false,\"thumbnails\":[]}', 3),
(77, 8, 'imagen_tablet', 'image', 'Imagen Tablet', 0, 1, 1, 1, 1, 1, '{\"resize\":{},\"quality\":\"100%\",\"upsize\":false,\"thumbnails\":[]}', 4),
(78, 8, 'imagen_movil', 'image', 'Imagen Movil', 0, 1, 1, 1, 1, 1, '{\"resize\":{},\"quality\":\"100%\",\"upsize\":false,\"thumbnails\":[]}', 5),
(79, 8, 'texto_principal', 'text_area', 'Texto Principal', 0, 1, 1, 1, 1, 1, '{}', 6),
(80, 8, 'texto_secundario', 'text_area', 'Texto Secundario', 0, 1, 1, 1, 1, 1, '{}', 7),
(81, 8, 'boton', 'select_dropdown', 'Tiene Botón', 1, 1, 1, 1, 1, 1, '{\"default\":\"Seleccionar Opci\\u00f3n\",\"options\":{\"1\":\"Si\",\"2\":\"No\"}}', 8),
(82, 8, 'height', 'number', 'Altura del Banner', 1, 1, 1, 1, 1, 1, '{}', 9),
(83, 8, 'pagina', 'select_dropdown', 'Pagina del Banner', 1, 1, 1, 1, 1, 1, '{\"default\":\"Seleccionar P\\u00e1gina\",\"options\":{\"1\":\"Home\",\"2\":\"Cursos\",\"3\":\"Empresa\"}}', 10),
(84, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 11),
(85, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 12),
(86, 4, 'icono', 'image', 'Icono', 0, 1, 1, 1, 1, 1, '{}', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-06-14 00:40:45', '2022-07-05 00:18:05'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2022-06-14 00:40:45', '2022-06-28 20:33:29'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(7, 'products', 'products', 'Product', 'Products', 'voyager-shop', 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":\"id\",\"scope\":null}', '2022-06-17 01:10:05', '2022-07-11 18:37:04'),
(8, 'banners', 'banners', 'Banner', 'Banners', 'voyager-photo', 'App\\Banner', NULL, NULL, NULL, 1, 0, '{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"desc\",\"default_search_key\":\"nombre_banner\",\"scope\":null}', '2022-06-28 19:28:17', '2022-07-04 23:55:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2022-06-14 00:40:23', '2022-06-14 00:40:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2022-06-14 00:40:23', '2022-06-14 00:40:23', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2022-06-14 00:40:23', '2022-06-14 00:40:23', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 8, '2022-06-14 00:40:45', '2022-06-14 00:40:45', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 6, '2022-06-14 00:40:45', '2022-06-14 00:40:45', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 7, '2022-06-14 00:40:45', '2022-06-14 00:40:45', 'voyager.pages.index', NULL),
(14, 1, 'Products', '', '_self', 'voyager-shop', NULL, NULL, 15, '2022-06-17 01:10:05', '2022-06-17 01:10:05', 'voyager.products.index', NULL),
(15, 1, 'Banners', '', '_self', 'voyager-photo', NULL, NULL, 16, '2022-06-28 19:28:17', '2022-06-28 19:28:17', 'voyager.banners.index', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2016_01_01_000000_create_pages_table', 2),
(26, '2016_01_01_000000_create_posts_table', 2),
(27, '2016_02_15_204651_create_categories_table', 2),
(28, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2022-06-14 00:40:45', '2022-06-14 00:40:45');

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
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(2, 'browse_bread', NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(3, 'browse_database', NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(4, 'browse_media', NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(5, 'browse_compass', NULL, '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(6, 'browse_menus', 'menus', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(7, 'read_menus', 'menus', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(8, 'edit_menus', 'menus', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(9, 'add_menus', 'menus', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(10, 'delete_menus', 'menus', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(11, 'browse_roles', 'roles', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(12, 'read_roles', 'roles', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(13, 'edit_roles', 'roles', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(14, 'add_roles', 'roles', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(15, 'delete_roles', 'roles', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(16, 'browse_users', 'users', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(17, 'read_users', 'users', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(18, 'edit_users', 'users', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(19, 'add_users', 'users', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(20, 'delete_users', 'users', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(21, 'browse_settings', 'settings', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(22, 'read_settings', 'settings', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(23, 'edit_settings', 'settings', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(24, 'add_settings', 'settings', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(25, 'delete_settings', 'settings', '2022-06-14 00:40:23', '2022-06-14 00:40:23'),
(26, 'browse_categories', 'categories', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(27, 'read_categories', 'categories', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(28, 'edit_categories', 'categories', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(29, 'add_categories', 'categories', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(30, 'delete_categories', 'categories', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(31, 'browse_posts', 'posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(32, 'read_posts', 'posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(33, 'edit_posts', 'posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(34, 'add_posts', 'posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(35, 'delete_posts', 'posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(36, 'browse_pages', 'pages', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(37, 'read_pages', 'pages', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(38, 'edit_pages', 'pages', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(39, 'add_pages', 'pages', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(40, 'delete_pages', 'pages', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(41, 'browse_products', 'products', '2022-06-17 01:10:05', '2022-06-17 01:10:05'),
(42, 'read_products', 'products', '2022-06-17 01:10:05', '2022-06-17 01:10:05'),
(43, 'edit_products', 'products', '2022-06-17 01:10:05', '2022-06-17 01:10:05'),
(44, 'add_products', 'products', '2022-06-17 01:10:05', '2022-06-17 01:10:05'),
(45, 'delete_products', 'products', '2022-06-17 01:10:05', '2022-06-17 01:10:05'),
(46, 'browse_banners', 'banners', '2022-06-28 19:28:17', '2022-06-28 19:28:17'),
(47, 'read_banners', 'banners', '2022-06-28 19:28:17', '2022-06-28 19:28:17'),
(48, 'edit_banners', 'banners', '2022-06-28 19:28:17', '2022-06-28 19:28:17'),
(49, 'add_banners', 'banners', '2022-06-28 19:28:17', '2022-06-28 19:28:17'),
(50, 'delete_banners', 'banners', '2022-06-28 19:28:17', '2022-06-28 19:28:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2022-06-14 00:40:45', '2022-06-14 00:40:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorias` json NOT NULL,
  `id_lms` int(11) NOT NULL,
  `precio` float NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_profesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_profesor` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_profesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_profesor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracion` int(11) NOT NULL,
  `sesiones` int(11) DEFAULT '0',
  `imagen_producto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre_producto`, `descripcion`, `categorias`, `id_lms`, `precio`, `sku`, `url_video`, `nombre_profesor`, `descripcion_profesor`, `imagen_profesor`, `titulo_profesor`, `duracion`, `sesiones`, `imagen_producto`, `estatus_id`, `created_at`, `updated_at`) VALUES
(1, 'Excel Basico', '<p class=\"elementor-heading-title elementor-size-default\">Junto a Sasi te presentamos nuestro Curso Excel intermedio.</p>\r\n<p class=\"elementor-heading-title elementor-size-default\">Sabias qu&eacute; Excel es uno de los programas m&aacute;s preguntados en las entrevistas de trabajo pero esto no tiene por qu&eacute; ser tan intimidante. Atr&eacute;vete y aprender&aacute;s las funciones y herramientas m&aacute;s importantes de este programa para as&iacute; lucirte con el orden de tus datos y hojas de calculo.</p>\r\n<p>Primero, Buscamos que en este curso puedas aprender a c&oacute;mo utilizar las funciones, formulas y herramientas m&aacute;s importantes de Excel. Te ense&ntilde;aremos cu&aacute;ndo, c&oacute;mo y d&oacute;nde debes usarlas para as&iacute; sacarles el mayor provecho. Como resultado, lograras construir reportes que destaquen sobre todos los dem&aacute;s. &iexcl;Por lo tanto, es el minuto de que puedas lucirte con Excel!</p>\r\n<p>Es por eso que, este curso 100% online est&aacute; dirigido a cualquier persona que tenga ganas de aprender m&aacute;s sobre esta herramienta. Te servir&aacute; si es que manejas un nivel b&aacute;sico del programa o si est&aacute;s reci&eacute;n conoci&eacute;ndola. Solo necesitaras disponer de Excel 2010 en adelante y contar con un m&iacute;nimo de familiaridad con el uso de planillas.</p>\r\n<p>&iquest;Cu&aacute;ndo inicia el curso Excel intermedio? Todo el contenido de este curso es 100% online, con clases a las que tendr&aacute;s acceso luego de la compra del curso. Puedes iniciar y desarrollar este curso en los tiempos y lugar que m&aacute;s te acomode, y luego, volver a verlo cuantas veces quieras.</p>\r\n<p>No necesitas haber tenido un curso de nivel b&aacute;sico, ya que en este curso revisaras las formulas mas importantes en Excel, que necesitaras para llegar al nivel intermedio; partiendo por las m&aacute;s b&aacute;sicas.</p>\r\n<p>CONTENIDOS DEL CURSO EXCEL INTERMEDIO</p>\r\n<p>&nbsp;</p>\r\n<div class=\"elementor-element elementor-element-77541033 elementor-widget elementor-widget-heading\" data-id=\"77541033\" data-element_type=\"widget\" data-widget_type=\"heading.default\">\r\n<div class=\"elementor-widget-container\">\r\n<ul>\r\n<li><strong>Sesi&oacute;n </strong>1: <strong>Funciones b&aacute;sicas</strong><br />Herramientas y conceptos: Operadores matem&aacute;ticos, funciones anidadas<br />Funciones cubiertas: SUMA, PROMEDIO, MIN, MAX, CONTAR, CONTARA</li>\r\n<li><strong>Sesi&oacute;n </strong>2: <strong>Herramientas &uacute;tiles I<br /></strong>Herramientas y conceptos: Fijar celdas, ordenar, filtrar</li>\r\n<li><strong>Sesi&oacute;n </strong>3: <strong>Funciones l&oacute;gicas</strong><br />Herramientas y conceptos: Operadores l&oacute;gicos, m&aacute;s funciones anidadas<br />Funciones cubiertas: SI, Y, O, SI.ERROR</li>\r\n<li><strong>Sesi&oacute;n </strong>4: <strong>Funciones de fecha<br /></strong>Herramientas y conceptos: Funcionamiento de fechas en Excel<br />Funciones cubiertas: A&Ntilde;O, MES, DIA, DIASEM, HOY, DIA.LAB, DIAS.LAB</li>\r\n<li><strong>Sesi&oacute;n </strong>5: <strong>Herramientas &uacute;tiles II<br /></strong>Herramientas y conceptos: Formatos, atajos de teclado, pegado especial, quitar duplicados, tipos de archivo Excel</li>\r\n<li><strong>Sesi&oacute;n </strong>6: <strong>Funciones condicionales<br /></strong>Herramientas y conceptos: Eficiencia<strong><br /></strong>Funciones cubiertas: SUMAR.SI.CONJUNTO, CONTAR.SI.CONJUNTO, PROMEDIO.SI.CONJUNTO</li>\r\n<li><strong>Sesi&oacute;n </strong>7: <strong>Funciones de b&uacute;squeda<br /></strong>Herramientas y conceptos: Eficiencia<strong><br /></strong>Funciones cubiertas: BUSCARV, COLUMNA, INDICE, COINCIDIR</li>\r\n<li><strong>Sesi&oacute;n </strong>8: <strong>Funciones de texto<br /></strong>Herramientas y conceptos: Texto en columnas, funciones recursivas<br />Funciones cubiertas: MAYUSC, MINUSC, NOMPROPIO, LARGO, IZQUIERDA, DERECHA, TEXTO, &amp;, ESPACIOS, ENCONTRAR, SUSTITUIR, UNIRCADENAS</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n</div>\r\n</div>', '[\".Crecimiento_Profesional\"]', 603, 10990, 'curso-excel-intermedio-2', 'https://vimeo.com/659144536', 'Juan José Cifuentes', 'Ingeniero Civil Industrial de la Universidad Católica de Chile. Amante del análisis y resolución de problemas, planillero por excelencia y fanático de la tecnología. Profesor del curso de construcción de modelo de datos y Excel en diferentes universidades del país.', 'products\\July2022\\AOg7jjWphJuPjjrd5vYe.png', 'Instructor', 0, 8, 'products\\July2022\\0J80iMmiQOieAeY0znE6.png', 1, '2022-07-11 18:28:00', '2022-07-11 18:37:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2022-06-14 00:04:58', '2022-06-14 00:04:58'),
(2, 'user', 'Normal User', '2022-06-14 00:40:23', '2022-06-14 00:40:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2022-06-14 00:40:45', '2022-06-14 00:40:45'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2022-06-14 00:40:45', '2022-06-14 00:40:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'anthony', 'aescalona@vgroup.cl', 'users/default.png', NULL, '$2y$10$yxWTJC375LOk3OIBk09i5eekcQFJW5W55EJvNs.0Fv/H45ebj033a', 'xatB8O7ZZVzc7o8XfWNQOBORvTzwqzao1dilyoO5pLZGcNa2S5OuZWaJfKPZ', NULL, '2022-06-14 00:04:03', '2022-06-14 00:04:58'),
(2, 1, 'fran', 'fbello@vgroup.cl', 'users/default.png', NULL, '$10$AseLdCi26S3WYgw/vdbZJuCCPTcYgG086nUbuRPh51s0YYTYa4aG2', 'dtPzZjv1WrdkjrYLJ33YTRxkwXWdUCQDnaoO6P1ROpqHkJpCETiHQ2sf809v', NULL, '2022-06-14 00:04:03', '2022-06-14 00:04:58'),
(3, 1, 'ariel', 'avillalobosvgroup.cl', 'users/default.png', NULL, '$10$3xgulgwX12ExGVEawjRRZ.EYb09he0QOJpU5wPbxUJKEyxUeeTFFO', 'dtPzZjv1WrdkjrYLJ33YTRxkwXWdUCQDnaoO6P1ROpqHkJpCETiHQ2sf809v', NULL, '2022-06-14 00:04:03', '2022-06-14 00:04:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `role_id`) VALUES
(1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indices de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indices de la tabla `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indices de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indices de la tabla `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
