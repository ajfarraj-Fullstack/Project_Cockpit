-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2026 at 03:30 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perfmon`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_projects`
--

DROP TABLE IF EXISTS `assigned_projects`;
CREATE TABLE IF NOT EXISTS `assigned_projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `file_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_assigned_project` (`project_id`),
  KEY `fk_assigned_file` (`file_id`),
  KEY `fk_assigned_created_by` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assigned_projects`
--

INSERT INTO `assigned_projects` (`id`, `project_id`, `file_id`, `created_at`, `created_by`, `updated_at`) VALUES
(13, 27, 0, '2026-01-19 14:06:00', 1, '2026-01-19 14:06:00'),
(12, 26, 0, '2026-01-19 14:05:07', 1, '2026-01-19 14:05:07'),
(11, 25, 0, '2026-01-18 15:43:59', 1, '2026-01-18 15:43:59'),
(10, 24, 0, '2026-01-18 14:58:07', 1, '2026-01-18 14:58:07'),
(9, 23, 0, '2026-01-18 14:53:00', 1, '2026-01-18 14:53:00'),
(8, 22, 0, '2026-01-18 14:41:34', 1, '2026-01-18 14:41:34'),
(7, 21, 0, '2026-01-18 14:37:03', 1, '2026-01-18 14:37:03'),
(14, 28, 0, '2026-01-19 15:05:27', 1, '2026-01-19 15:05:27'),
(15, 29, 0, '2026-01-19 22:48:44', 1, '2026-01-19 22:48:44'),
(16, 30, 0, '2026-01-20 20:13:31', 1, '2026-01-20 20:13:31'),
(17, 31, 0, '2026-01-20 21:37:17', 1, '2026-01-20 21:37:17'),
(18, 32, 0, '2026-01-23 21:52:42', 1, '2026-01-23 21:52:42'),
(19, 33, 0, '2026-01-26 16:10:25', 1, '2026-01-26 16:10:25'),
(20, 34, 0, '2026-01-26 16:11:10', 1, '2026-01-26 16:11:10'),
(21, 35, 0, '2026-01-28 13:56:45', 1, '2026-01-28 13:56:45'),
(22, 36, 0, '2026-01-28 13:57:11', 1, '2026-01-28 13:57:11'),
(23, 37, 0, '2026-01-28 14:02:09', 1, '2026-01-28 14:02:09'),
(24, 38, 0, '2026-01-28 14:05:53', 1, '2026-01-28 14:05:53'),
(25, 39, 0, '2026-01-28 14:06:12', 1, '2026-01-28 14:06:12'),
(26, 40, 0, '2026-01-29 13:17:25', 1, '2026-01-29 13:17:25');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_file` varchar(255) NOT NULL,
  `path_file` varchar(500) NOT NULL,
  `user_id` int DEFAULT NULL,
  `kpi_id` int DEFAULT NULL,
  `assigned_project_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_file_user` (`user_id`),
  KEY `fk_file_created_by` (`created_by`),
  KEY `fk_file_kpi` (`kpi_id`),
  KEY `fk_file_project` (`assigned_project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name_file`, `path_file`, `user_id`, `kpi_id`, `assigned_project_id`, `created_at`, `created_by`, `updated_at`) VALUES
(29, 'تفاصيل التنفيذ.docx', 'uploads/projects/28/1768824327_تفاصيل التنفيذ.docx', 1, 0, 14, '2026-01-19 15:05:27', 1, '2026-01-19 15:05:27'),
(28, 'تفاصيل التنفيذ.docx', 'uploads/projects/27/1768820760_تفاصيل التنفيذ.docx', 1, 0, 13, '2026-01-19 14:06:00', 1, '2026-01-19 14:06:00'),
(27, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/25/1768740239_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 11, '2026-01-18 15:43:59', 1, '2026-01-18 15:43:59'),
(26, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/25/1768740239_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 11, '2026-01-18 15:43:59', 1, '2026-01-18 15:43:59'),
(25, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/24/1768737487_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 10, '2026-01-18 14:58:07', 1, '2026-01-18 14:58:07'),
(24, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/24/1768737487_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 10, '2026-01-18 14:58:07', 1, '2026-01-18 14:58:07'),
(19, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/21/1768736223_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 7, '2026-01-18 14:37:03', 1, '2026-01-18 14:37:03'),
(23, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/23/1768737180_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 9, '2026-01-18 14:53:00', 1, '2026-01-18 14:53:00'),
(82, 'screencapture-iso-lms-online-moodle-manager-pyp-certifcates-php-2026-01-21-14_09_29.png', 'uploads/projects/34/1769434611_screencapture-iso-lms-online-moodle-manager-pyp-certifcates-php-2026-01-21-14_09_29.png', 1, NULL, 0, '2026-01-26 16:36:51', 1, '2026-01-26 16:36:51'),
(22, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/23/1768737180_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 9, '2026-01-18 14:53:00', 1, '2026-01-18 14:53:00'),
(20, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/22/1768736494_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 8, '2026-01-18 14:41:34', 1, '2026-01-18 14:41:34'),
(30, '1768740239_Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/28/1768824327_1768740239_Ahmad Farraj-CV-2025-compressed.pdf', 1, 0, 14, '2026-01-19 15:05:27', 1, '2026-01-19 15:05:27'),
(31, 'تفاصيل التنفيذ.docx', 'uploads/projects/29/1768852124_تفاصيل التنفيذ.docx', 1, 0, 15, '2026-01-19 22:48:44', 1, '2026-01-19 22:48:44'),
(33, 'تفاصيل التنفيذ (1).docx', 'file_696fca90f23ef8.81430796.docx', 0, NULL, NULL, '2026-01-20 21:33:52', 0, '2026-01-20 21:33:52'),
(34, 'تفاصيل التنفيذ (1).docx', 'uploads/projects/31/1768934237_تفاصيل التنفيذ (1).docx', 1, 0, 17, '2026-01-20 21:37:17', 1, '2026-01-20 21:37:17'),
(37, 'class.png', 'uploads/projects/17/1769197298_class.png', 1, 12, 17, '2026-01-23 22:41:38', 1, '2026-01-23 22:41:38'),
(38, 'dashbord.png', 'uploads/projects/17/1769197622_dashbord.png', 0, 12, 17, '2026-01-23 22:47:02', 0, '2026-01-23 22:47:02'),
(39, 'navbar.png', 'uploads/projects/17/1769197797_navbar.png', 0, 12, 17, '2026-01-23 22:49:57', 0, '2026-01-23 22:49:57'),
(86, 'Ahmad Farraj-CV-2025-compressed.pdf', 'uploads/projects/20/1769592899_Ahmad Farraj-CV-2025-compressed.pdf', 1, 6, 20, '2026-01-28 12:34:59', 1, '2026-01-28 12:34:59'),
(85, '1769449488_screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 'uploads/projects/34/1769449962_1769449488_screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 1, NULL, 20, '2026-01-26 20:52:42', 1, '2026-01-26 20:52:42'),
(84, 'screencapture-localhost-menaqual-checkbox-php-2026-01-22-14_06_42.png', 'uploads/projects/34/1769449603_screencapture-localhost-menaqual-checkbox-php-2026-01-22-14_06_42.png', 1, NULL, 20, '2026-01-26 20:46:43', 1, '2026-01-26 20:46:43'),
(81, 'screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 'uploads/projects/34/1769433086_screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 1, NULL, 0, '2026-01-26 16:11:26', 1, '2026-01-26 16:11:26'),
(83, 'screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 'uploads/projects/34/1769449488_screencapture-localhost-menaqual-2026-01-22-14_03_20.png', 1, NULL, 20, '2026-01-26 20:44:48', 1, '2026-01-26 20:44:48'),
(79, 'screencapture-localhost-menaqual-admin-php-2026-01-22-14_08_40.png', 'file_6977657fbc2062.49822495.png', 1, NULL, NULL, '2026-01-26 16:00:47', 1, '2026-01-26 16:00:47'),
(76, 'incoming.png', 'uploads/projects/18/1769283365_incoming.png', 1, 14, 18, '2026-01-24 22:36:05', 1, '2026-01-24 22:36:05'),
(75, '12.png', 'uploads/projects/18/1769276410_12.png', 1, 6, 18, '2026-01-24 20:40:10', 1, '2026-01-24 20:40:10'),
(78, 'screencapture-localhost-menaqual-admin-php-2026-01-22-14_09_04.png', 'file_6977656118fbd0.21765730.png', 1, NULL, NULL, '2026-01-26 16:00:17', 1, '2026-01-26 16:00:17'),
(66, '12.png', 'uploads/projects/17/1769255700_12.png', 1, 12, 17, '2026-01-24 14:55:00', 1, '2026-01-24 14:55:00'),
(77, 'screencapture-localhost-menaqual-admin-php-2026-01-22-14_09_04.png', 'file_69776524a6dbd4.17068927.png', 1, NULL, NULL, '2026-01-26 15:59:16', 1, '2026-01-26 15:59:16'),
(74, 'incoming.png', 'uploads/projects/18/1769276224_incoming.png', 1, 6, 18, '2026-01-24 20:37:04', 1, '2026-01-24 20:37:04'),
(87, 'screencapture-localhost-Project-Cockpit-reportemployee-php-2026-01-28-12_35_14.png', 'uploads/projects/35/1769597805_screencapture-localhost-Project-Cockpit-reportemployee-php-2026-01-28-12_35_14.png', 1, 0, 21, '2026-01-28 13:56:45', 1, '2026-01-28 13:56:45'),
(88, 'screencapture-localhost-Project-Cockpit-reportemployee-php-2026-01-28-12_35_06.png', 'uploads/projects/35/1769597805_screencapture-localhost-Project-Cockpit-reportemployee-php-2026-01-28-12_35_06.png', 1, 0, 21, '2026-01-28 13:56:45', 1, '2026-01-28 13:56:45'),
(89, 'Screenshot 2026-01-25 152143.png', 'uploads/projects/36/1769597831_Screenshot 2026-01-25 152143.png', 1, 0, 22, '2026-01-28 13:57:11', 1, '2026-01-28 13:57:11'),
(90, '147852369.png', 'uploads/projects/36/1769597846_147852369.png', 1, NULL, 22, '2026-01-28 13:57:26', 1, '2026-01-28 13:57:26'),
(91, '15151515.png', 'uploads/projects/22/1769597887_15151515.png', 1, 10, 22, '2026-01-28 13:58:07', 1, '2026-01-28 13:58:07'),
(92, '147852369.png', 'uploads/projects/37/1769598129_147852369.png', 1, 0, 23, '2026-01-28 14:02:09', 1, '2026-01-28 14:02:09'),
(93, 'navbar.png', 'uploads/projects/37/1769598129_navbar.png', 1, 0, 23, '2026-01-28 14:02:09', 1, '2026-01-28 14:02:09'),
(94, '147852369.png', 'uploads/projects/38/1769598353_147852369.png', 1, 0, 24, '2026-01-28 14:05:53', 1, '2026-01-28 14:05:53'),
(95, 'navbar.png', 'uploads/projects/38/1769598353_navbar.png', 1, 0, 24, '2026-01-28 14:05:53', 1, '2026-01-28 14:05:53'),
(96, 'incoming.png', 'uploads/projects/39/1769598372_incoming.png', 1, 0, 25, '2026-01-28 14:06:12', 1, '2026-01-28 14:06:12'),
(97, 'navbar.png', 'uploads/projects/39/1769598372_navbar.png', 1, 0, 25, '2026-01-28 14:06:12', 1, '2026-01-28 14:06:12'),
(98, 'dashbord.png', 'uploads/projects/25/1769598636_dashbord.png', 1, 12, 25, '2026-01-28 14:10:36', 1, '2026-01-28 14:10:36'),
(99, 'incoming.png', 'uploads/projects/25/1769598733_incoming.png', 1, 12, 25, '2026-01-28 14:12:13', 1, '2026-01-28 14:12:13'),
(100, 'Dashboard (6).pdf', 'uploads/projects/39/1769604952_Dashboard (6).pdf', 1, NULL, 25, '2026-01-28 15:55:52', 1, '2026-01-28 15:55:52'),
(101, 'screencapture-localhost-menaqual-dashboard-php-2026-01-22-14_06_52.png', 'uploads/projects/40/1769681845_screencapture-localhost-menaqual-dashboard-php-2026-01-22-14_06_52.png', 1, 0, 26, '2026-01-29 13:17:25', 1, '2026-01-29 13:17:25'),
(102, 'screencapture-localhost-menaqual-admin-php-2026-01-22-14_08_48.png', 'uploads/projects/40/1769681845_screencapture-localhost-menaqual-admin-php-2026-01-22-14_08_48.png', 1, 0, 26, '2026-01-29 13:17:25', 1, '2026-01-29 13:17:25'),
(103, 'screencapture-localhost-menaqual-2026-01-22-14_05_15.png', 'uploads/projects/40/1769681881_screencapture-localhost-menaqual-2026-01-22-14_05_15.png', 1, NULL, 26, '2026-01-29 13:18:01', 1, '2026-01-29 13:18:01'),
(104, 'screencapture-localhost-menaqual-admin-php-2026-01-22-14_08_56.png', 'uploads/projects/26/1769682092_screencapture-localhost-menaqual-admin-php-2026-01-22-14_08_56.png', 1, 16, 26, '2026-01-29 13:21:32', 1, '2026-01-29 13:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `file_kpis_assigned`
--

DROP TABLE IF EXISTS `file_kpis_assigned`;
CREATE TABLE IF NOT EXISTS `file_kpis_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_id` int NOT NULL,
  `kpi_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `file_id` (`file_id`,`kpi_id`),
  KEY `fk_fka_kpi` (`kpi_id`),
  KEY `fk_fka_created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kpis`
--

DROP TABLE IF EXISTS `kpis`;
CREATE TABLE IF NOT EXISTS `kpis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kpiName` varchar(255) NOT NULL,
  `kpiCode` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kpis`
--

INSERT INTO `kpis` (`id`, `kpiName`, `kpiCode`, `created_at`, `created_by`, `updated_at`) VALUES
(10, 'التنسيق مع المقاولين', 'KPI-002', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(12, 'الإشراف على التنفيذ الميداني', 'KPI-003', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(14, 'test', '004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(15, 'الاشرلف الميداني', 'KPI-0004', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(16, 'الاشراف', 'KPI005', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `kpis_project_assigned`
--

DROP TABLE IF EXISTS `kpis_project_assigned`;
CREATE TABLE IF NOT EXISTS `kpis_project_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `assign_project_id` int NOT NULL,
  `kpi_id` int NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `taskSummary` text NOT NULL,
  `status` enum('pending','edit','approved') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'pending',
  `taskStartDate` date NOT NULL,
  `taskEndDate` date NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_kpa_kpi` (`kpi_id`),
  KEY `fk_kpa_created_by` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kpis_project_assigned`
--

INSERT INTO `kpis_project_assigned` (`id`, `assign_project_id`, `kpi_id`, `user_id`, `taskSummary`, `status`, `taskStartDate`, `taskEndDate`, `created_at`, `created_by`, `updated_at`) VALUES
(14, 15, 6, '3', 'test', 'pending', '2026-01-31', '2026-02-05', '2026-01-20 13:23:13', 0, '2026-01-20 13:23:13'),
(13, 14, 12, '3', 'test', 'pending', '2026-01-07', '2026-01-10', '2026-01-20 01:18:24', 0, '2026-01-20 01:18:24'),
(26, 12, 6, '3', 'test 1', 'pending', '2026-01-24', '2026-01-24', '2026-01-23 20:57:35', 0, '2026-01-23 20:57:35'),
(25, 17, 12, '11', 'asdasdasd', 'pending', '2026-01-08', '2026-01-31', '2026-01-21 15:33:30', 0, '2026-01-21 15:33:30'),
(18, 17, 14, '3', 'شسيسشي', 'pending', '2026-01-01', '2026-01-24', '2026-01-21 14:36:03', 0, '2026-01-21 14:36:03'),
(19, 16, 12, '3', 'asdsad', 'pending', '2026-01-12', '2026-01-17', '2026-01-21 15:04:02', 0, '2026-01-21 15:04:02'),
(20, 16, 10, '1', 'adsadasd', 'pending', '2026-01-16', '2026-01-17', '2026-01-21 15:15:22', 0, '2026-01-31 16:55:05'),
(21, 15, 12, '3', 'شسيشسيشسي', 'pending', '2025-12-31', '2026-01-31', '2026-01-21 15:23:15', 0, '2026-01-21 15:23:15'),
(22, 15, 14, '11', 'شيشسيسشيسشي', 'pending', '2026-01-31', '2026-01-31', '2026-01-21 15:23:56', 0, '2026-01-21 15:23:56'),
(23, 16, 6, '3', 'لالالالالالالالالالالالالالالالالالالالالالالا', 'pending', '2026-01-22', '2026-01-31', '2026-01-21 15:26:38', 0, '2026-01-31 16:51:59'),
(24, 7, 6, '11', 'ببببب', 'pending', '2026-01-21', '2026-01-31', '2026-01-21 15:28:22', 0, '2026-01-21 15:28:22'),
(27, 18, 10, '3', 'شسيشسيشسي', 'approved', '2026-01-20', '2026-01-08', '2026-01-24 02:54:04', 0, '2026-01-25 11:24:08'),
(28, 18, 6, '3', '00000', 'pending', '2026-01-24', '2026-01-31', '2026-01-24 20:32:55', 1, '2026-01-24 22:21:26'),
(30, 18, 14, '1', 'asdsadasd', 'approved', '2026-01-24', '2026-01-31', '2026-01-24 22:01:03', 1, '2026-01-24 22:12:54'),
(29, 17, 10, '3', 'ggggggggggggg', 'pending', '2026-01-24', '2026-01-24', '2026-01-24 21:08:10', 1, '2026-01-24 21:08:10'),
(31, 18, 12, '3', 'MBMBMMB', 'pending', '2026-01-24', '2026-01-31', '2026-01-24 22:35:41', 1, '2026-01-24 22:35:41'),
(32, 18, 6, '1', 'aaD', 'pending', '2026-01-24', '2026-01-29', '2026-01-24 23:05:35', 1, '2026-01-24 23:05:35'),
(33, 18, 10, '1', 'SADAS', 'pending', '2026-01-24', '2026-02-07', '2026-01-24 23:05:56', 1, '2026-01-24 23:05:56'),
(34, 18, 10, '3', 'SADAS', 'pending', '2026-01-24', '2026-02-07', '2026-01-24 23:05:56', 1, '2026-01-24 23:05:56'),
(35, 18, 10, '11', 'SADAS', 'pending', '2026-01-24', '2026-02-07', '2026-01-24 23:05:56', 1, '2026-01-24 23:05:56'),
(36, 18, 15, '1', 'ADAS', 'pending', '2026-01-23', '2026-01-28', '2026-01-24 23:07:35', 1, '2026-01-24 23:07:35'),
(37, 18, 15, '3', 'ADAS', 'pending', '2026-01-23', '2026-01-28', '2026-01-24 23:07:35', 1, '2026-01-24 23:07:35'),
(38, 18, 15, '11', 'ADAS', 'pending', '2026-01-23', '2026-01-28', '2026-01-24 23:07:35', 1, '2026-01-24 23:07:35'),
(39, 18, 15, '10', 'ADAS', 'pending', '2026-01-23', '2026-01-28', '2026-01-24 23:07:35', 1, '2026-01-24 23:07:35'),
(40, 18, 6, '3', 'gmhghjghjgj', 'edit', '2026-01-25', '2026-01-31', '2026-01-25 11:23:20', 1, '2026-01-26 13:01:00'),
(41, 18, 10, '3', 'سسسس', 'pending', '2026-01-26', '2026-01-31', '2026-01-26 12:36:18', 1, '2026-01-26 12:36:18'),
(42, 20, 6, '3', 'تانتاتنانتاتنا', 'approved', '2026-01-31', '2026-01-31', '2026-01-26 20:56:20', 1, '2026-01-28 15:54:55'),
(43, 20, 10, '3', 'jhkjhjkhkj', 'pending', '2026-01-31', '2026-02-07', '2026-01-26 23:41:08', 1, '2026-01-26 23:41:08'),
(44, 22, 10, '11', 'assa', 'pending', '2026-01-28', '2026-01-31', '2026-01-28 13:57:48', 1, '2026-01-28 13:57:48'),
(45, 25, 12, '11', 'اسلام بليز ارفقي التقرير الخاص فيكي باسرع وقت  شستينمشستينمشسمني  نشتسينمتشسنمي شسميتشسميتشمسني نتنشسينمتشسي', 'pending', '2026-01-28', '2026-01-31', '2026-01-28 14:09:35', 1, '2026-01-28 15:40:59'),
(46, 20, 12, '11', 'dfdfef', 'pending', '2026-01-31', '2026-02-07', '2026-01-28 15:54:22', 1, '2026-01-28 15:54:22'),
(47, 26, 16, '13', 'DLASJDLKJASDL', 'approved', '2026-01-29', '2026-01-31', '2026-01-29 13:20:44', 1, '2026-01-29 13:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) NOT NULL,
  `budgetProject` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectName`, `budgetProject`, `created_at`, `created_by`, `updated_at`) VALUES
(21, 'sdkjasl', '400', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(28, 'ISO city group', '1800000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(27, 'GTAMAMA', '180000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(26, 'BBBGTA', '18000000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(25, 'GTA', '1800000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(24, 'ssss', '150000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(23, 'hgjh', '999', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(22, 'sjc', '180000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(29, '', '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(30, 'SJC Qatar', '80000000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(31, 'شقق وعمارات أبراج السادس', '35000,000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(32, 'مشاريع مدن الأيزو ', '2000,0000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 'مشروع فيلا ناعور', '2000,000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(34, 'مشروع إسكان ضاحية الأمير راشد', '250,000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(35, 'GTA', '2000000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(36, 'ss', '12132', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(37, 'GTA', '1550022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(38, 'GTA', '1550022', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(39, 'GTA', '2500000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(40, 'مشروع إسكان ضاحية الأمير راشد2', '200000', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_file_assigned`
--

DROP TABLE IF EXISTS `project_file_assigned`;
CREATE TABLE IF NOT EXISTS `project_file_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_id` int NOT NULL,
  `assigned_project_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `file_id` (`file_id`,`assigned_project_id`),
  KEY `fk_pfa_project` (`assigned_project_id`),
  KEY `fk_pfa_created_by` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_file_assigned`
--

INSERT INTO `project_file_assigned` (`id`, `file_id`, `assigned_project_id`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 24, 10, '2026-01-18 14:58:07', 1, '2026-01-18 14:58:07'),
(2, 25, 10, '2026-01-18 14:58:07', 1, '2026-01-18 14:58:07'),
(3, 26, 11, '2026-01-18 15:43:59', 1, '2026-01-18 15:43:59'),
(4, 27, 11, '2026-01-18 15:43:59', 1, '2026-01-18 15:43:59'),
(5, 28, 13, '2026-01-19 14:06:00', 1, '2026-01-19 14:06:00'),
(6, 29, 14, '2026-01-19 15:05:27', 1, '2026-01-19 15:05:27'),
(7, 30, 14, '2026-01-19 15:05:27', 1, '2026-01-19 15:05:27'),
(8, 31, 15, '2026-01-19 22:48:44', 1, '2026-01-19 22:48:44'),
(10, 33, 0, '2026-01-20 21:33:52', 0, '2026-01-20 21:33:52'),
(11, 34, 17, '2026-01-20 21:37:17', 1, '2026-01-20 21:37:17'),
(14, 77, 0, '2026-01-26 15:59:16', 1, '2026-01-26 15:59:16'),
(15, 78, 0, '2026-01-26 16:00:17', 1, '2026-01-26 16:00:17'),
(16, 79, 0, '2026-01-26 16:00:47', 1, '2026-01-26 16:00:47'),
(19, 82, 0, '2026-01-26 16:36:51', 1, '2026-01-26 16:36:51'),
(18, 81, 0, '2026-01-26 16:11:26', 1, '2026-01-26 16:11:26'),
(20, 83, 20, '2026-01-26 20:44:48', 1, '2026-01-26 20:44:48'),
(21, 84, 20, '2026-01-26 20:46:43', 1, '2026-01-26 20:46:43'),
(22, 85, 20, '2026-01-26 20:52:42', 1, '2026-01-26 20:52:42'),
(23, 87, 21, '2026-01-28 13:56:45', 1, '2026-01-28 13:56:45'),
(24, 88, 21, '2026-01-28 13:56:45', 1, '2026-01-28 13:56:45'),
(25, 89, 22, '2026-01-28 13:57:11', 1, '2026-01-28 13:57:11'),
(26, 90, 22, '2026-01-28 13:57:26', 1, '2026-01-28 13:57:26'),
(27, 92, 23, '2026-01-28 14:02:09', 1, '2026-01-28 14:02:09'),
(28, 93, 23, '2026-01-28 14:02:09', 1, '2026-01-28 14:02:09'),
(29, 94, 24, '2026-01-28 14:05:53', 1, '2026-01-28 14:05:53'),
(30, 95, 24, '2026-01-28 14:05:53', 1, '2026-01-28 14:05:53'),
(31, 96, 25, '2026-01-28 14:06:12', 1, '2026-01-28 14:06:12'),
(32, 97, 25, '2026-01-28 14:06:12', 1, '2026-01-28 14:06:12'),
(33, 100, 25, '2026-01-28 15:55:52', 1, '2026-01-28 15:55:52'),
(34, 101, 26, '2026-01-29 13:17:25', 1, '2026-01-29 13:17:25'),
(35, 102, 26, '2026-01-29 13:17:25', 1, '2026-01-29 13:17:25'),
(36, 103, 26, '2026-01-29 13:18:01', 1, '2026-01-29 13:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nameReport` varchar(255) NOT NULL,
  `value` int NOT NULL,
  `summary` text,
  `kpi_project_assigned_id` int DEFAULT NULL,
  `report_file_assigned_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_report_kpi` (`kpi_project_assigned_id`),
  KEY `fk_report_file` (`report_file_assigned_id`),
  KEY `fk_report_user` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `nameReport`, `value`, `summary`, `kpi_project_assigned_id`, `report_file_assigned_id`, `created_at`, `created_by`, `updated_at`) VALUES
(42, '000', 0, 'SDSAKDL;ASKD', 47, 46, '2026-01-29 13:21:32', 1, '2026-01-29 13:21:32'),
(41, '000', 0, 'سشيشسيشسيشسي', 45, 45, '2026-01-28 14:12:13', 1, '2026-01-28 14:12:13'),
(40, 'طلب مواد', 0, 'هذا التقرير ايمنمبسيب تسينمتبيسنمتبيس ىسينمتبنمسيب منتسينمبتسيمنب ', 45, 44, '2026-01-28 14:10:36', 1, '2026-01-28 14:10:36'),
(39, 'طلب مواد', 1552, 'sdasdasdasd', 44, 43, '2026-01-28 13:58:07', 1, '2026-01-28 13:58:07'),
(38, 'طلب مواد', 15000, 'الرجاء الاطلاع على المرفق ادناه يوجد طلب خاص في شراء حديد ', 42, 42, '2026-01-28 12:34:59', 1, '2026-01-28 12:34:59'),
(37, '123132', 132131, 'SDSADSDAS', 30, 41, '2026-01-24 22:36:05', 1, '2026-01-24 22:36:05'),
(36, '444', 14444, '13213131', 28, 40, '2026-01-24 20:40:10', 1, '2026-01-24 20:40:10'),
(27, '1321321', 1123131, '132121', 25, 31, '2026-01-24 14:55:00', 1, '2026-01-24 14:55:00'),
(34, '1321321', 13131321, '321231321', 27, 38, '2026-01-24 20:36:44', 1, '2026-01-24 20:36:44'),
(31, '000000', 0, 'jkkjkj', 27, 35, '2026-01-24 17:32:45', 1, '2026-01-24 19:23:55'),
(35, '1321321', 1912113213, '132131321', 28, 39, '2026-01-24 20:37:04', 1, '2026-01-24 20:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `report_file_assigned`
--

DROP TABLE IF EXISTS `report_file_assigned`;
CREATE TABLE IF NOT EXISTS `report_file_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `file_id` int NOT NULL,
  `kpi_project_assigned_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `file_id` (`file_id`,`kpi_project_assigned_id`),
  KEY `fk_pfa_project` (`kpi_project_assigned_id`),
  KEY `fk_pfa_created_by` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `report_file_assigned`
--

INSERT INTO `report_file_assigned` (`id`, `file_id`, `kpi_project_assigned_id`, `user_id`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 0, 25, 0, '2026-01-23 22:35:31', 0, '2026-01-23 22:35:31'),
(2, 37, 25, 1, '2026-01-23 22:41:38', 1, '2026-01-23 22:41:38'),
(3, 38, 25, 0, '2026-01-23 22:47:02', 0, '2026-01-23 22:47:02'),
(4, 39, 25, 0, '2026-01-23 22:49:57', 0, '2026-01-23 22:49:57'),
(46, 104, 47, 1, '2026-01-29 13:21:32', 1, '2026-01-29 13:21:32'),
(45, 99, 45, 1, '2026-01-28 14:12:13', 1, '2026-01-28 14:12:13'),
(44, 98, 45, 1, '2026-01-28 14:10:36', 1, '2026-01-28 14:10:36'),
(43, 91, 44, 1, '2026-01-28 13:58:07', 1, '2026-01-28 13:58:07'),
(42, 86, 42, 1, '2026-01-28 12:34:59', 1, '2026-01-28 12:34:59'),
(41, 76, 30, 1, '2026-01-24 22:36:05', 1, '2026-01-24 22:36:05'),
(40, 75, 28, 1, '2026-01-24 20:40:10', 1, '2026-01-24 20:40:10'),
(39, 74, 28, 1, '2026-01-24 20:37:04', 1, '2026-01-24 20:37:04'),
(35, 70, 27, 1, '2026-01-24 17:32:45', 1, '2026-01-24 17:32:45'),
(38, 73, 27, 1, '2026-01-24 20:36:44', 1, '2026-01-24 20:36:44'),
(31, 66, 25, 1, '2026-01-24 14:55:00', 1, '2026-01-24 14:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `fullName`, `jobTitle`, `password`, `role`, `created_at`, `created_by`, `updated_at`) VALUES
(1, 'Admin', 'full Admin', 'Eng', '$2y$10$K.3OlP/S83kKg6GJhLD3buSu5fuTHuBhKwYOdz2Og42Bi1cxyqBri', 'admin', '2026-01-14 17:06:57', 0, '2026-01-14 17:06:57'),
(3, 'Ahmad', 'Ahmad Farraj', 'Eng', '$2y$10$K.3OlP/S83kKg6GJhLD3buSu5fuTHuBhKwYOdz2Og42Bi1cxyqBri', 'user', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 'islam', 'islam farraj', 'Eng', '$2y$10$r906mIj63ktRU.StffZZteh83ZOMag7X.phYKSNCx/6hsYm12ybhO', 'user', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(13, 'AYA', 'FARAAJ', 'ENG', '$2y$10$fJEy9JdGnl7RU5ox5ebhSOPCLqHTD7F1AES8AziPuMOgrfpOwSa7a', 'user', '2026-01-29 13:19:02', 0, '0000-00-00 00:00:00'),
(10, 'Husaim', 'husaim farraj', 'SW', '$2y$10$XfQch60AqATSeAdVvF1U6OwUyION81ZGBu2wQdGWF7xUOva4yJgda', 'user', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_project_assigned`
--

DROP TABLE IF EXISTS `user_project_assigned`;
CREATE TABLE IF NOT EXISTS `user_project_assigned` (
  `id` int NOT NULL AUTO_INCREMENT,
  `project_id` int NOT NULL,
  `user_id` int NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int DEFAULT NULL,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `project_id` (`project_id`,`user_id`),
  KEY `fk_upa_user` (`user_id`),
  KEY `fk_upa_created_by` (`created_by`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
