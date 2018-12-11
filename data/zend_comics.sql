-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 11, 2018 at 01:21 PM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zend_comics`
--

-- --------------------------------------------------------

--
-- Table structure for table `sktd_characters`
--

DROP TABLE IF EXISTS `sktd_characters`;
CREATE TABLE IF NOT EXISTS `sktd_characters` (
  `character_id` int(11) NOT NULL AUTO_INCREMENT,
  `character_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `character_real_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `character_gender` tinyint(1) DEFAULT NULL,
  `character_short_description` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `character_main_description` longtext COLLATE utf8mb4_unicode_520_ci,
  `character_publisher_id` int(11) DEFAULT NULL,
  `character_picture_media_id` int(11) DEFAULT NULL,
  `character_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `character_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`character_id`),
  KEY `fk_sktd_characters_sktd_publishers1_idx` (`character_publisher_id`),
  KEY `fk_sktd_characters_sktd_media1_idx` (`character_picture_media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_characters`
--

INSERT INTO `sktd_characters` (`character_id`, `character_name`, `character_real_name`, `character_gender`, `character_short_description`, `character_main_description`, `character_publisher_id`, `character_picture_media_id`, `character_created`, `character_modified`) VALUES
(1, 'Supermane', 'Supermane', NULL, NULL, NULL, 1, NULL, '2018-09-06 21:52:53', '2018-09-08 08:23:31'),
(2, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 08:13:13', '2018-09-07 08:13:13'),
(3, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 08:14:00', '2018-09-07 08:14:00'),
(4, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 08:15:41', '2018-09-07 08:15:41'),
(5, 'N@ame of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 08:16:21', '2018-09-07 08:16:21'),
(6, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 08:16:28', '2018-09-07 08:16:28'),
(7, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 21:44:40', '2018-09-07 21:44:40'),
(8, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 21:46:00', '2018-09-07 21:46:00'),
(9, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 21:47:37', '2018-09-07 21:47:37'),
(10, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 21:49:02', '2018-09-07 21:49:02'),
(11, 'Name of the character', 'Real name of the character', NULL, NULL, NULL, NULL, NULL, '2018-09-07 21:59:06', '2018-09-07 21:59:06'),
(12, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-07 22:08:27', '2018-09-07 22:08:27'),
(13, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-07 22:08:53', '2018-09-07 22:08:53'),
(14, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:10:11', '2018-09-08 07:10:11'),
(15, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:11:52', '2018-09-08 07:11:52'),
(16, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:12:45', '2018-09-08 07:12:45'),
(17, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:13:14', '2018-09-08 07:13:14'),
(18, 'Sandeep Kumar', 'SK', NULL, NULL, NULL, NULL, NULL, '2018-09-08 07:13:25', '2018-09-08 07:13:25'),
(19, 'Hell Boy', 'Hd', NULL, NULL, NULL, NULL, NULL, '2018-09-08 10:34:36', '2018-09-08 10:34:36'),
(20, 'Hell Boy', 'Hd', NULL, NULL, NULL, NULL, NULL, '2018-09-08 12:02:15', '2018-09-08 12:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `sktd_character_gallery`
--

DROP TABLE IF EXISTS `sktd_character_gallery`;
CREATE TABLE IF NOT EXISTS `sktd_character_gallery` (
  `character_gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `character_gallery_character_id` int(11) NOT NULL,
  `character_gallery_media_id` int(11) NOT NULL,
  `character_gallery_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `character_gallery_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`character_gallery_id`),
  KEY `fk_sktd_character_gallery_sktd_media1_idx` (`character_gallery_media_id`),
  KEY `fk_sktd_character_gallery_sktd_characters1_idx` (`character_gallery_character_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sktd_log`
--

DROP TABLE IF EXISTS `sktd_log`;
CREATE TABLE IF NOT EXISTS `sktd_log` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` int(11) NOT NULL,
  `event` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url` varchar(2000) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `file` varchar(2000) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `line` int(11) NOT NULL,
  `error_type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `trace` text COLLATE utf8mb4_unicode_520_ci,
  `request_data` text COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_log`
--

INSERT INTO `sktd_log` (`id`, `date`, `type`, `event`, `url`, `file`, `line`, `error_type`, `trace`, `request_data`) VALUES
(1, '2018-09-09 08:54:14', 3, 'a sample exception preview', 'http://apigility.demo.application.local/error-preview', 'C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\samsonasik\\error-hero-module\\src\\Controller\\ErrorPreviewController.php', 13, 'Exception', '#0 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Controller\\AbstractActionController.php(78): ErrorHeroModule\\Controller\\ErrorPreviewController->exceptionAction()\n#1 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(322): Zend\\Mvc\\Controller\\AbstractActionController->onDispatch(Object(Zend\\Mvc\\MvcEvent))\n#2 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(179): Zend\\EventManager\\EventManager->triggerListeners(Object(Zend\\Mvc\\MvcEvent), Object(Closure))\n#3 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Controller\\AbstractController.php(106): Zend\\EventManager\\EventManager->triggerEventUntil(Object(Closure), Object(Zend\\Mvc\\MvcEvent))\n#4 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\DispatchListener.php(138): Zend\\Mvc\\Controller\\AbstractController->dispatch(Object(ZF\\ContentNegotiation\\Request), Object(Zend\\Http\\PhpEnvironment\\Response))\n#5 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(322): Zend\\Mvc\\DispatchListener->onDispatch(Object(Zend\\Mvc\\MvcEvent))\n#6 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(179): Zend\\EventManager\\EventManager->triggerListeners(Object(Zend\\Mvc\\MvcEvent), Object(Closure))\n#7 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Application.php(332): Zend\\EventManager\\EventManager->triggerEventUntil(Object(Closure), Object(Zend\\Mvc\\MvcEvent))\n#8 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\public\\index.php(59): Zend\\Mvc\\Application->run()\n#9 {main}', 'array (\n  \'request_method\' => \'GET\',\n  \'query_data\' => \n  array (\n  ),\n  \'body_data\' => \n  array (\n  ),\n  \'raw_data\' => \'\',\n  \'files_data\' => \n  array (\n  ),\n  \'cookie_data\' => \n  array (\n  ),\n)'),
(2, '2018-09-09 08:54:14', 3, 'Zend\\View\\Renderer\\PhpRenderer::render: Unable to render template \"404\"; resolver could not resolve to a file', 'http://apigility.demo.application.local/favicon.ico', 'C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-view\\src\\Renderer\\PhpRenderer.php', 498, 'Zend\\View\\Exception\\RuntimeException', '#0 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-view\\src\\View.php(207): Zend\\View\\Renderer\\PhpRenderer->render(NULL)\n#1 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-view\\src\\View.php(236): Zend\\View\\View->render(Object(Zend\\View\\Model\\ViewModel))\n#2 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-view\\src\\View.php(200): Zend\\View\\View->renderChildren(Object(Zend\\View\\Model\\ViewModel))\n#3 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\View\\Http\\DefaultRenderingStrategy.php(105): Zend\\View\\View->render(Object(Zend\\View\\Model\\ViewModel))\n#4 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(322): Zend\\Mvc\\View\\Http\\DefaultRenderingStrategy->render(Object(Zend\\Mvc\\MvcEvent))\n#5 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(171): Zend\\EventManager\\EventManager->triggerListeners(Object(Zend\\Mvc\\MvcEvent))\n#6 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Application.php(367): Zend\\EventManager\\EventManager->triggerEvent(Object(Zend\\Mvc\\MvcEvent))\n#7 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Application.php(326): Zend\\Mvc\\Application->completeRequest(Object(Zend\\Mvc\\MvcEvent))\n#8 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\public\\index.php(59): Zend\\Mvc\\Application->run()\n#9 {main}', 'array (\n  \'request_method\' => \'GET\',\n  \'query_data\' => \n  array (\n  ),\n  \'body_data\' => \n  array (\n  ),\n  \'raw_data\' => \'\',\n  \'files_data\' => \n  array (\n  ),\n  \'cookie_data\' => \n  array (\n  ),\n)'),
(3, '2018-09-09 13:18:29', 3, 'Argument 2 passed to MediaManager\\Service\\MediaService::__construct() must be an instance of MediaManager\\Model\\MediaTable, string given, called in C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\module\\MediaManager\\src\\Module.php on line 30', 'http://apigility.demo.application.local/characters', 'C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\module\\MediaManager\\src\\Service\\MediaService.php', 14, 'TypeError', '#0 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\module\\MediaManager\\src\\Module.php(30): MediaManager\\Service\\MediaService->__construct(Array, \'MediaManager\\\\Mo...\')\n#1 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(764): MediaManager\\Module->MediaManager\\{closure}(Object(Zend\\ServiceManager\\ServiceManager), \'MediaManager\\\\Se...\', NULL)\n#2 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(200): Zend\\ServiceManager\\ServiceManager->doCreate(\'MediaManager\\\\Se...\')\n#3 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\module\\ComicsApi\\Module.php(33): Zend\\ServiceManager\\ServiceManager->get(\'MediaManager\\\\Se...\')\n#4 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(764): ComicsApi\\Module->ComicsApi\\{closure}(Object(Zend\\ServiceManager\\ServiceManager), \'ComicsApi\\\\V1\\\\Re...\', NULL)\n#5 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(200): Zend\\ServiceManager\\ServiceManager->doCreate(\'ComicsApi\\\\V1\\\\Re...\')\n#6 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\module\\ComicsApi\\src\\V1\\Rest\\Characters\\CharactersResourceFactory.php(10): Zend\\ServiceManager\\ServiceManager->get(\'ComicsApi\\\\V1\\\\Re...\')\n#7 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(764): ComicsApi\\V1\\Rest\\Characters\\CharactersResourceFactory->__invoke(Object(Zend\\ServiceManager\\ServiceManager), \'ComicsApi\\\\V1\\\\Re...\', NULL)\n#8 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(200): Zend\\ServiceManager\\ServiceManager->doCreate(\'ComicsApi\\\\V1\\\\Re...\')\n#9 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zfcampus\\zf-rest\\src\\Factory\\RestControllerFactory.php(118): Zend\\ServiceManager\\ServiceManager->get(\'ComicsApi\\\\V1\\\\Re...\')\n#10 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(764): ZF\\Rest\\Factory\\RestControllerFactory->__invoke(Object(Zend\\ServiceManager\\ServiceManager), \'ComicsApi\\\\V1\\\\Re...\', NULL)\n#11 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\ServiceManager.php(200): Zend\\ServiceManager\\ServiceManager->doCreate(\'ComicsApi\\\\V1\\\\Re...\')\n#12 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-servicemanager\\src\\AbstractPluginManager.php(141): Zend\\ServiceManager\\ServiceManager->get(\'ComicsApi\\\\V1\\\\Re...\')\n#13 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\DispatchListener.php(102): Zend\\ServiceManager\\AbstractPluginManager->get(\'ComicsApi\\\\V1\\\\Re...\')\n#14 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(322): Zend\\Mvc\\DispatchListener->onDispatch(Object(Zend\\Mvc\\MvcEvent))\n#15 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-eventmanager\\src\\EventManager.php(179): Zend\\EventManager\\EventManager->triggerListeners(Object(Zend\\Mvc\\MvcEvent), Object(Closure))\n#16 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\vendor\\zendframework\\zend-mvc\\src\\Application.php(332): Zend\\EventManager\\EventManager->triggerEventUntil(Object(Closure), Object(Zend\\Mvc\\MvcEvent))\n#17 C:\\wamp\\www\\projects\\zend\\apigility-demo-application\\public\\index.php(59): Zend\\Mvc\\Application->run()\n#18 {main}', 'array (\n  \'request_method\' => \'POST\',\n  \'query_data\' => \n  array (\n  ),\n  \'body_data\' => \n  array (\n    \'character_name\' => \'Hell Boy\',\n    \'character_real_name\' => \'Hd\',\n    \'ddffff\' => \'dddd\',\n  ),\n  \'raw_data\' => \'\',\n  \'files_data\' => \n  array (\n    \'character_picture\' => \n    array (\n      \'name\' => \'WIN_20180322_22_18_37_Pro.jpg\',\n      \'type\' => \'image/jpeg\',\n      \'tmp_name\' => \'C:\\\\wamp\\\\tmp\\\\phpF684.tmp\',\n      \'error\' => 0,\n      \'size\' => 181111,\n    ),\n  ),\n  \'cookie_data\' => \n  array (\n  ),\n)');

-- --------------------------------------------------------

--
-- Table structure for table `sktd_media`
--

DROP TABLE IF EXISTS `sktd_media`;
CREATE TABLE IF NOT EXISTS `sktd_media` (
  `sktd_media_id` int(11) NOT NULL AUTO_INCREMENT,
  `sktd_media_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sktd_media_path` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sktd_media_type` varchar(45) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `sktd_media_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `sktd_media_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`sktd_media_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_access_tokens`
--

DROP TABLE IF EXISTS `sktd_oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `expires` timestamp NOT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`access_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_oauth_access_tokens`
--

INSERT INTO `sktd_oauth_access_tokens` (`access_token`, `client_id`, `user_id`, `expires`, `scope`) VALUES
('80b6cf8a4ccdefaf8f540f0c61fe1b23d568a428', 'testclient', NULL, '2018-09-09 22:39:45', NULL),
('b5f5688e9b4419f80448617beeabbbe92aa18c84', 'testclient', NULL, '2018-09-12 22:52:39', NULL),
('dd4498212178095adc3118a6c30830e4cd0510f3', 'testclient', NULL, '2018-09-12 22:13:50', NULL),
('e7075845c5fb6d9cc8d4223885f30db3aa35a644', 'testclient', NULL, '2018-09-09 22:36:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_authorization_codes`
--

DROP TABLE IF EXISTS `sktd_oauth_authorization_codes`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `redirect_uri` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `expires` timestamp NOT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `id_token` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`authorization_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_oauth_authorization_codes`
--

INSERT INTO `sktd_oauth_authorization_codes` (`authorization_code`, `client_id`, `user_id`, `redirect_uri`, `expires`, `scope`, `id_token`) VALUES
('3fad90cd52dc74001bf334e3ca2977b5cbecaea7', 'testclient', NULL, '/oauth/receivecode', '2018-09-09 12:53:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_clients`
--

DROP TABLE IF EXISTS `sktd_oauth_clients`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_clients` (
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `client_secret` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `redirect_uri` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `grant_types` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_oauth_clients`
--

INSERT INTO `sktd_oauth_clients` (`client_id`, `client_secret`, `redirect_uri`, `grant_types`, `scope`, `user_id`) VALUES
('testclient', '$2y$14$f3qml4G2hG6sxM26VMq.geDYbsS089IBtVJ7DlD05BoViS9PFykE2', '/oauth/receivecode', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_jwt`
--

DROP TABLE IF EXISTS `sktd_oauth_jwt`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_jwt` (
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `public_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_public_keys`
--

DROP TABLE IF EXISTS `sktd_oauth_public_keys`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_public_keys` (
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `public_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `private_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `encryption_algorithm` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT 'RS256'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_oauth_public_keys`
--

INSERT INTO `sktd_oauth_public_keys` (`client_id`, `public_key`, `private_key`, `encryption_algorithm`) VALUES
(NULL, '...', '...', 'RS256'),
('ClientID_One', '...', '...', 'RS256'),
('ClientID_Two', '...', '...', 'RS256'),
('testclient', 'qqq', 'aaa', 'RS256'),
('sandeep', 'sandeep', 'sandeep', 'HS256');

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `sktd_oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_refresh_tokens` (
  `refresh_token` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `expires` timestamp NOT NULL,
  `scope` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`refresh_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_scopes`
--

DROP TABLE IF EXISTS `sktd_oauth_scopes`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_scopes` (
  `type` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'supported',
  `scope` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `client_id` varchar(80) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `is_default` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sktd_oauth_users`
--

DROP TABLE IF EXISTS `sktd_oauth_users`;
CREATE TABLE IF NOT EXISTS `sktd_oauth_users` (
  `username` varchar(254) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(254) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `first_name` varchar(254) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `last_name` varchar(254) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_oauth_users`
--

INSERT INTO `sktd_oauth_users` (`username`, `password`, `first_name`, `last_name`) VALUES
('testuser', '$2y$14$f3qml4G2hG6sxM26VMq.geDYbsS089IBtVJ7DlD05BoViS9PFykE2', 'Test', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sktd_publishers`
--

DROP TABLE IF EXISTS `sktd_publishers`;
CREATE TABLE IF NOT EXISTS `sktd_publishers` (
  `publisher_id` int(11) NOT NULL AUTO_INCREMENT,
  `publisher_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `publisher_picture_media_id` int(11) DEFAULT NULL,
  `publisher_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `publisher_modified` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`publisher_id`),
  KEY `fk_sktd_publishers_sktd_media1_idx` (`publisher_picture_media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `sktd_publishers`
--

INSERT INTO `sktd_publishers` (`publisher_id`, `publisher_name`, `publisher_picture_media_id`, `publisher_created`, `publisher_modified`) VALUES
(1, 'Marvel Comics', NULL, '2018-09-08 08:23:05', '2018-09-08 08:23:05');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sktd_characters`
--
ALTER TABLE `sktd_characters`
  ADD CONSTRAINT `fk_sktd_characters_sktd_media1` FOREIGN KEY (`character_picture_media_id`) REFERENCES `sktd_media` (`sktd_media_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sktd_characters_sktd_publishers1` FOREIGN KEY (`character_publisher_id`) REFERENCES `sktd_publishers` (`publisher_id`) ON DELETE SET NULL;

--
-- Constraints for table `sktd_character_gallery`
--
ALTER TABLE `sktd_character_gallery`
  ADD CONSTRAINT `fk_sktd_character_gallery_sktd_characters1` FOREIGN KEY (`character_gallery_character_id`) REFERENCES `sktd_characters` (`character_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sktd_character_gallery_sktd_media1` FOREIGN KEY (`character_gallery_media_id`) REFERENCES `sktd_media` (`sktd_media_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sktd_publishers`
--
ALTER TABLE `sktd_publishers`
  ADD CONSTRAINT `fk_sktd_publishers_sktd_media1` FOREIGN KEY (`publisher_picture_media_id`) REFERENCES `sktd_media` (`sktd_media_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
