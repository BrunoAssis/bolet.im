-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 30/10/2013 às 19:14:01
-- Versão do Servidor: 5.5.34-0ubuntu0.13.04.1
-- Versão do PHP: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `boletim`
--

--
-- Extraindo dados da tabela `batches`
--

INSERT INTO `batches` (`id`, `school_id`, `course_id`, `year_id`, `description`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 1, 1, 1, '8 A', '2013-07-18 09:46:04', 1, '2013-07-18 09:46:04', 1),
(2, 1, 1, 1, '8 B', '2013-07-23 15:04:12', 1, '2013-07-23 15:04:12', 1);

--
-- Extraindo dados da tabela `batch_grades`
--

INSERT INTO `batch_grades` (`id`, `subject_id`, `batch_id`, `period_id`, `grade`, `cumulative_avg`, `students_number`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(433, 1, 1, 1, 6.667, 6.667, 3, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(434, 2, 1, 1, 7.167, 7.167, 3, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(435, 3, 1, 1, 8.000, 8.000, 3, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(436, 4, 1, 1, 8.000, 8.000, 3, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(437, 1, 2, 1, 7.000, 7.000, 2, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(438, 2, 2, 1, 7.000, 7.000, 2, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(439, 3, 2, 1, 7.000, 7.000, 2, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(440, 4, 2, 1, 5.000, 5.000, 2, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(441, 1, 1, 2, 8.500, 7.583, 3, '2013-07-26 09:53:54', 1, '2013-07-26 09:53:54', 1),
(442, 2, 1, 2, 7.667, 7.417, 3, '2013-07-26 09:53:54', 1, '2013-07-26 09:53:54', 1),
(443, 3, 1, 2, 8.167, 8.083, 3, '2013-07-26 09:53:54', 1, '2013-07-26 09:53:54', 1),
(444, 4, 1, 2, 6.667, 7.333, 3, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(445, 1, 2, 2, 7.000, 7.000, 2, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(446, 2, 2, 2, 6.000, 6.500, 2, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(447, 3, 2, 2, 7.000, 7.000, 2, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(448, 4, 2, 2, 7.500, 6.250, 2, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(449, 1, 1, 3, 7.333, 7.500, 3, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(450, 2, 1, 3, 6.833, 7.222, 3, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(451, 3, 1, 3, 6.667, 7.611, 3, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(452, 4, 1, 3, 8.500, 7.722, 3, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(453, 1, 2, 3, 9.000, 7.667, 2, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(454, 2, 2, 3, 6.500, 6.500, 2, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(455, 3, 2, 3, 8.000, 7.334, 2, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(456, 4, 2, 3, 6.500, 6.334, 2, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1);

--
-- Extraindo dados da tabela `courses`
--

INSERT INTO `courses` (`id`, `level`, `description`, `abbr`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 8, '8 série - Ensino Fundamental II', '8 série - EF II', '2013-07-18 09:45:42', 1, '2013-07-18 09:45:42', 1);

--
-- Extraindo dados da tabela `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `subject_id`, `batch_id`, `period_id`, `grade`, `batch_ranking`, `school_ranking`, `cumulative_avg`, `cumulative_avg_batch_ranking`, `cumulative_avg_school_ranking`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 1, 1, 1, 1, 8.000, 1, 1, 8.000, 1, 1, '2013-07-18 14:37:48', 1, '2013-07-26 09:53:11', 1),
(2, 1, 2, 1, 1, 7.500, 2, 2, 7.500, 2, 2, '2013-07-18 14:37:55', 1, '2013-07-26 09:53:11', 1),
(3, 1, 3, 1, 1, 8.000, 2, 2, 8.000, 2, 2, '2013-07-18 14:38:05', 1, '2013-07-26 09:53:11', 1),
(4, 1, 4, 1, 1, 9.000, 1, 1, 9.000, 1, 1, '2013-07-18 14:38:15', 1, '2013-07-26 09:53:11', 1),
(5, 1, 1, 1, 2, 8.500, 2, 2, 8.250, 1, 1, '2013-07-18 14:40:26', 1, '2013-07-26 09:53:55', 1),
(6, 1, 2, 1, 2, 8.000, 1, 1, 7.750, 1, 1, '2013-07-18 14:40:36', 1, '2013-07-26 09:53:55', 1),
(7, 1, 3, 1, 2, 8.500, 2, 2, 8.250, 2, 2, '2013-07-18 14:40:46', 1, '2013-07-26 09:53:55', 1),
(8, 1, 4, 1, 2, 8.000, 1, 1, 8.500, 1, 1, '2013-07-18 14:40:59', 1, '2013-07-26 09:53:55', 1),
(9, 1, 1, 1, 3, 9.000, 1, 1, 8.500, 1, 1, '2013-07-18 14:49:01', 1, '2013-07-26 09:54:03', 1),
(10, 1, 2, 1, 3, 8.500, 1, 1, 8.000, 1, 1, '2013-07-18 14:49:13', 1, '2013-07-26 09:54:04', 1),
(11, 1, 3, 1, 3, 9.000, 1, 1, 8.500, 2, 2, '2013-07-18 14:49:24', 1, '2013-07-26 09:54:04', 1),
(13, 1, 4, 1, 3, 7.500, 2, 2, 8.167, 1, 1, '2013-07-18 14:49:48', 1, '2013-07-26 09:54:04', 1),
(14, 2, 1, 1, 1, 5.000, 3, 4, 5.000, 3, 4, '2013-07-23 14:54:25', 1, '2013-07-26 09:53:11', 1),
(15, 2, 2, 1, 1, 6.000, 3, 3, 6.000, 3, 3, '2013-07-23 14:54:25', 1, '2013-07-26 09:53:11', 1),
(16, 2, 3, 1, 1, 7.000, 3, 3, 7.000, 3, 3, '2013-07-23 14:54:25', 1, '2013-07-26 09:53:11', 1),
(17, 2, 4, 1, 1, 8.000, 2, 2, 8.000, 2, 2, '2013-07-23 14:54:25', 1, '2013-07-26 09:53:11', 1),
(18, 2, 1, 1, 2, 9.000, 1, 1, 7.000, 3, 4, '2013-07-23 14:54:37', 1, '2013-07-26 09:53:55', 1),
(19, 2, 2, 1, 2, 8.000, 1, 1, 7.000, 3, 3, '2013-07-23 14:54:37', 1, '2013-07-26 09:53:55', 1),
(20, 2, 3, 1, 2, 7.000, 3, 4, 7.000, 3, 4, '2013-07-23 14:54:37', 1, '2013-07-26 09:53:55', 1),
(21, 2, 4, 1, 2, 6.000, 2, 3, 7.000, 2, 2, '2013-07-23 14:54:37', 1, '2013-07-26 09:53:55', 1),
(22, 2, 1, 1, 3, 7.000, 2, 2, 7.000, 2, 3, '2013-07-23 14:54:50', 1, '2013-07-26 09:54:03', 1),
(23, 2, 2, 1, 3, 5.000, 3, 4, 6.333, 3, 4, '2013-07-23 14:54:50', 1, '2013-07-26 09:54:04', 1),
(24, 2, 3, 1, 3, 3.000, 3, 3, 5.667, 3, 5, '2013-07-23 14:54:50', 1, '2013-07-26 09:54:04', 1),
(25, 2, 4, 1, 3, 9.000, 1, 1, 7.667, 2, 2, '2013-07-23 14:54:51', 1, '2013-07-26 09:54:04', 1),
(26, 3, 1, 1, 1, 7.000, 2, 2, 7.000, 2, 2, '2013-07-23 15:02:54', 1, '2013-07-26 09:53:11', 1),
(27, 3, 2, 1, 1, 8.000, 1, 1, 8.000, 1, 1, '2013-07-23 15:02:54', 1, '2013-07-26 09:53:11', 1),
(28, 3, 3, 1, 1, 9.000, 1, 1, 9.000, 1, 1, '2013-07-23 15:02:54', 1, '2013-07-26 09:53:11', 1),
(29, 3, 4, 1, 1, 7.000, 3, 3, 7.000, 3, 3, '2013-07-23 15:02:55', 1, '2013-07-26 09:53:11', 1),
(30, 3, 1, 1, 2, 8.000, 3, 3, 7.500, 2, 3, '2013-07-23 15:03:01', 1, '2013-07-26 09:53:55', 1),
(31, 3, 2, 1, 2, 7.000, 2, 2, 7.500, 2, 2, '2013-07-23 15:03:01', 1, '2013-07-26 09:53:55', 1),
(32, 3, 3, 1, 2, 9.000, 1, 1, 9.000, 1, 1, '2013-07-23 15:03:01', 1, '2013-07-26 09:53:55', 1),
(33, 3, 4, 1, 2, 6.000, 2, 3, 6.500, 3, 3, '2013-07-23 15:03:01', 1, '2013-07-26 09:53:55', 1),
(34, 3, 1, 1, 3, 6.000, 3, 3, 7.000, 2, 3, '2013-07-23 15:03:09', 1, '2013-07-26 09:54:03', 1),
(35, 3, 2, 1, 3, 7.000, 2, 2, 7.333, 2, 2, '2013-07-23 15:03:09', 1, '2013-07-26 09:54:04', 1),
(36, 3, 3, 1, 3, 8.000, 2, 2, 8.667, 1, 1, '2013-07-23 15:03:09', 1, '2013-07-26 09:54:04', 1),
(37, 3, 4, 1, 3, 9.000, 1, 1, 7.333, 3, 3, '2013-07-23 15:03:09', 1, '2013-07-26 09:54:04', 1),
(38, 4, 1, 2, 1, 8.000, 1, 1, 8.000, 1, 1, '2013-07-23 15:20:43', 1, '2013-07-26 09:53:11', 1),
(39, 4, 2, 2, 1, 6.000, 2, 3, 6.000, 2, 3, '2013-07-23 15:20:43', 1, '2013-07-26 09:53:11', 1),
(40, 4, 3, 2, 1, 7.000, 1, 3, 7.000, 1, 3, '2013-07-23 15:20:43', 1, '2013-07-26 09:53:11', 1),
(41, 4, 4, 2, 1, 5.000, 1, 4, 5.000, 1, 4, '2013-07-23 15:20:43', 1, '2013-07-26 09:53:11', 1),
(42, 4, 1, 2, 2, 8.000, 1, 3, 8.000, 1, 2, '2013-07-23 15:20:52', 1, '2013-07-26 09:53:55', 1),
(43, 4, 2, 2, 2, 7.000, 1, 2, 6.500, 1, 4, '2013-07-23 15:20:52', 1, '2013-07-26 09:53:55', 1),
(44, 4, 3, 2, 2, 6.000, 2, 5, 6.500, 2, 5, '2013-07-23 15:20:52', 1, '2013-07-26 09:53:55', 1),
(45, 4, 4, 2, 2, 8.000, 1, 1, 6.500, 1, 3, '2013-07-23 15:20:52', 1, '2013-07-26 09:53:55', 1),
(46, 4, 1, 2, 3, 9.000, 1, 1, 8.333, 1, 2, '2013-07-23 15:20:58', 1, '2013-07-26 09:54:03', 1),
(47, 4, 2, 2, 3, 6.000, 2, 3, 6.333, 2, 4, '2013-07-23 15:20:58', 1, '2013-07-26 09:54:04', 1),
(48, 4, 3, 2, 3, 8.000, 1, 2, 7.000, 2, 4, '2013-07-23 15:20:58', 1, '2013-07-26 09:54:04', 1),
(49, 4, 4, 2, 3, 7.000, 1, 3, 6.667, 1, 4, '2013-07-23 15:20:58', 1, '2013-07-26 09:54:04', 1),
(50, 5, 1, 2, 1, 6.000, 2, 3, 6.000, 2, 3, '2013-07-23 15:22:22', 1, '2013-07-26 09:53:11', 1),
(51, 5, 2, 2, 1, 8.000, 1, 1, 8.000, 1, 1, '2013-07-23 15:22:22', 1, '2013-07-26 09:53:11', 1),
(52, 5, 3, 2, 1, 7.000, 1, 3, 7.000, 1, 3, '2013-07-23 15:22:22', 1, '2013-07-26 09:53:11', 1),
(53, 5, 4, 2, 1, 5.000, 1, 4, 5.000, 1, 4, '2013-07-23 15:22:22', 1, '2013-07-26 09:53:11', 1),
(54, 5, 1, 2, 2, 6.000, 2, 4, 6.000, 2, 5, '2013-07-23 15:22:29', 1, '2013-07-26 09:53:55', 1),
(55, 5, 2, 2, 2, 5.000, 2, 3, 6.500, 1, 4, '2013-07-23 15:22:29', 1, '2013-07-26 09:53:55', 1),
(56, 5, 3, 2, 2, 8.000, 1, 3, 7.500, 1, 3, '2013-07-23 15:22:29', 1, '2013-07-26 09:53:55', 1),
(57, 5, 4, 2, 2, 7.000, 2, 2, 6.000, 2, 4, '2013-07-23 15:22:29', 1, '2013-07-26 09:53:55', 1),
(58, 5, 1, 2, 3, 9.000, 1, 1, 7.000, 2, 3, '2013-07-23 15:22:37', 1, '2013-07-26 09:54:03', 1),
(59, 5, 2, 2, 3, 7.000, 1, 2, 6.667, 1, 3, '2013-07-23 15:22:37', 1, '2013-07-26 09:54:04', 1),
(60, 5, 3, 2, 3, 8.000, 1, 2, 7.667, 1, 3, '2013-07-23 15:22:37', 1, '2013-07-26 09:54:04', 1),
(61, 5, 4, 2, 3, 6.000, 2, 4, 6.000, 2, 5, '2013-07-23 15:22:37', 1, '2013-07-26 09:54:04', 1);

--
-- Extraindo dados da tabela `periods`
--

INSERT INTO `periods` (`id`, `year_id`, `order`, `description`, `abbr`, `start_date`, `end_date`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 1, 1, 'Bimestre 1', '1º Bim', '2013-02-01', '2013-03-31', '2013-07-18 09:47:24', 1, '2013-07-18 09:47:24', 1),
(2, 1, 2, 'Bimestre 2', '2º Bim', '2013-04-01', '2013-06-30', '2013-07-18 10:09:45', 1, '2013-07-18 10:09:45', 1),
(3, 1, 3, 'Bimestre 3', '3º Bim', '2013-07-01', '2013-09-30', '2013-07-18 10:10:25', 1, '2013-07-18 10:10:25', 1),
(4, 1, 4, 'Bimestre 4', '4º Bim', '2013-10-01', '2013-11-30', '2013-07-18 10:10:59', 1, '2013-07-18 10:10:59', 1);

--
-- Extraindo dados da tabela `schools`
--

INSERT INTO `schools` (`id`, `name`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 'Escola Estadual José Propício', '2013-07-18 09:45:00', 1, '2013-07-22 18:23:14', 1),
(2, 'Lorem ipsum dolor sit amet', '2013-07-24 11:01:32', 1, '2013-07-24 11:01:32', 1),
(3, 'Pellentesque habitant morbi', '2013-07-24 11:01:58', 1, '2013-07-24 11:01:58', 1),
(4, 'Nam in tincidunt nunc', '2013-07-24 11:02:06', 1, '2013-07-24 11:02:06', 1),
(5, 'Maecenas nec massa', '2013-07-24 11:02:17', 1, '2013-07-24 11:02:17', 1),
(6, 'Phasellus sagittis eget', '2013-07-24 11:02:50', 1, '2013-07-24 11:02:50', 1),
(7, 'Nunc egestas diam varius', '2013-07-24 11:04:03', 1, '2013-07-24 11:04:03', 1),
(8, 'Proin accumsan pretium', '2013-07-24 11:04:20', 1, '2013-07-24 11:04:20', 1),
(9, 'Vestibulum ut turpis risus', '2013-07-24 11:04:47', 1, '2013-07-24 11:04:47', 1),
(10, 'Quisque ligula neque', '2013-07-24 11:04:58', 1, '2013-07-24 11:04:58', 1),
(11, 'Praesent sapien turpis', '2013-07-24 11:05:11', 1, '2013-07-24 11:05:11', 1);

--
-- Extraindo dados da tabela `school_grades`
--

INSERT INTO `school_grades` (`id`, `subject_id`, `school_id`, `period_id`, `grade`, `cumulative_avg`, `students_number`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(206, 1, 1, 1, 6.834, 6.834, 5, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(207, 2, 1, 1, 7.084, 7.084, 5, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(208, 3, 1, 1, 7.500, 7.500, 5, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(209, 4, 1, 1, 6.500, 6.500, 5, '2013-07-26 09:53:11', 1, '2013-07-26 09:53:11', 1),
(210, 1, 1, 2, 7.750, 7.292, 5, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(211, 2, 1, 2, 6.834, 6.959, 5, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(212, 3, 1, 2, 7.584, 7.542, 5, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(213, 4, 1, 2, 7.084, 6.792, 5, '2013-07-26 09:53:55', 1, '2013-07-26 09:53:55', 1),
(214, 1, 1, 3, 8.167, 7.584, 5, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(215, 2, 1, 3, 6.667, 6.861, 5, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(216, 3, 1, 3, 7.334, 7.473, 5, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1),
(217, 4, 1, 3, 7.500, 7.028, 5, '2013-07-26 09:54:03', 1, '2013-07-26 09:54:03', 1);

--
-- Extraindo dados da tabela `students`
--

INSERT INTO `students` (`id`, `user_id`, `school_id`, `batch_id`, `name`, `birthdate`, `students_registry`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 1, 1, 1, 'Dolor Sit Lorem Ipsum', '1995-07-18', '123.456.789-01', '2013-07-18 09:53:08', 1, '2013-07-18 09:53:08', 1),
(2, NULL, 1, 1, 'Maria Souza Costa', '2001-11-11', '987.654.321-01', '2013-07-23 14:53:27', 1, '2013-07-23 14:53:27', 1),
(3, NULL, 1, 1, 'Manoer Sirva Sorza', '2005-02-22', '852963741.02', '2013-07-23 15:02:35', 1, '2013-07-23 15:02:35', 1),
(4, NULL, 1, 2, 'Lorem Ipsum Dolor Sit', '2006-06-06', '06062006', '2013-07-23 15:20:30', 1, '2013-07-23 15:20:30', 1),
(5, NULL, 1, 2, 'Nulla Porttitor Mattis Dui', '2005-05-05', '05052005', '2013-07-23 15:22:08', 1, '2013-07-23 15:22:08', 1);

--
-- Extraindo dados da tabela `subjects`
--

INSERT INTO `subjects` (`id`, `description`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 'Geografia', '2013-07-18 14:36:36', 1, '2013-07-18 14:36:36', 1),
(2, 'História', '2013-07-18 14:36:45', 1, '2013-07-18 14:36:45', 1),
(3, 'Matemática', '2013-07-18 14:36:51', 1, '2013-07-18 14:36:51', 1),
(4, 'Português', '2013-07-18 14:37:04', 1, '2013-07-18 14:37:04', 1),
(5, 'Sociologia', '2013-07-24 15:13:55', 1, '2013-07-24 15:13:55', 1);

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `group`, `email_verified`, `email_token`, `active`, `last_login`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 'teste@teste.com', 'd1764ce243f75d2fbd0b80e5e320a84a7ecaeb58', 'admin', 0, '', 1, '2013-07-18 09:32:00', '2013-07-18 09:33:07', 1, '2013-07-18 09:33:07', 1);

--
-- Extraindo dados da tabela `years`
--

INSERT INTO `years` (`id`, `year`, `created`, `created_user_id`, `modified`, `modified_user_id`) VALUES
(1, 2013, '2013-07-18 09:45:52', 1, '2013-07-18 09:45:52', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
