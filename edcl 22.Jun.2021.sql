-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2021 at 07:19 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edcl`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`code`, `name`, `population`) VALUES
('BR', 'Brazil Brazil', 205722000),
('CA', 'Canada', 35985751),
('CN', 'China', 1375210000),
('DE', 'Germany', 81459000),
('FR', 'France', 64513242),
('GB', 'United Kingdom', 65097000),
('IN', 'India', 1285400000),
('KE', 'KENYA', 45000000),
('RU', 'Russia', 146519759),
('US', 'United States', 322976000);

-- --------------------------------------------------------

--
-- Table structure for table `indicator`
--

CREATE TABLE `indicator` (
  `id` int(11) NOT NULL,
  `indicator_framework_element_id` int(11) DEFAULT NULL,
  `indicator_name` varchar(500) NOT NULL COMMENT 'Name of indicator',
  `description` varchar(500) DEFAULT NULL COMMENT 'Description of indicator',
  `baseline_date` date DEFAULT NULL COMMENT 'Baseline Evaluation Date',
  `midline_date` date DEFAULT NULL COMMENT 'Midline Evaluation Date',
  `endline_date` date DEFAULT NULL COMMENT 'Endline Evaluation Date',
  `baseline_value` double DEFAULT 0 COMMENT 'Baseline Evaluation Value',
  `midline_value` double DEFAULT 0 COMMENT 'Midline Evaluation Value',
  `target_value` double DEFAULT 0 COMMENT 'Life of Project Target Value',
  `endline_value` double DEFAULT 0 COMMENT 'Endline Evaluation Value',
  `indicator_format_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Number or Percent',
  `data_period_id` int(11) NOT NULL DEFAULT 1 COMMENT 'Data Collection Frequency',
  `unit` varchar(20) DEFAULT NULL COMMENT 'Unit of Measure',
  `is_kpi` tinyint(1) NOT NULL DEFAULT 0,
  `indicator_comment` varchar(1000) DEFAULT NULL,
  `risk_assumption` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator`
--

INSERT INTO `indicator` (`id`, `indicator_framework_element_id`, `indicator_name`, `description`, `baseline_date`, `midline_date`, `endline_date`, `baseline_value`, `midline_value`, `target_value`, `endline_value`, `indicator_format_id`, `data_period_id`, `unit`, `is_kpi`, `indicator_comment`, `risk_assumption`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Impact indicator 1', 'Per-capita income increased (US$ )', '2017-06-01', NULL, NULL, 771, 801, 1240, 821, 2, 1, NULL, 1, 'Indicator Comment 1', 'Indicator Risk 1', NULL, NULL, '2021-06-21 12:57:25', 1),
(2, 1, 'Impact indicator 2', 'Human Development Index (HDI)', '2017-12-31', '2019-12-31', '2021-06-30', 0.524, 0.515, 0.5, 0.51, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 12:59:07', 1),
(3, 1, 'Impact indicator 3', '% of population living below poverty line reduced', '2019-06-30', NULL, NULL, 38.2, 0, 30, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:49:51', 1),
(4, 2, 'Outcome Indicator 1.1', '% reduction in post-harvest losses from improved and greened infrastructures', '2019-06-30', NULL, NULL, 0, 0, 10, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:50:42', 1),
(5, 2, 'Outcome Indicator 1.2', '% increase in knowledge of livelihood opportunities with electricity access', NULL, NULL, NULL, 8, 0, 80, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:52:33', 1),
(6, 2, 'Outcome Indicator 1.3', '% increase in economic enterprises for youth and women from the new enterprises', '2019-06-30', NULL, NULL, 0, 0, 15, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:54:04', 1),
(7, 3, 'Outcome Indicator 2.1', '% increase of HH with knowledge on vulnerability and resilience to climate change and gender responsiveness', '2019-06-30', NULL, NULL, 0, 0, 15, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:55:18', 1),
(8, 3, 'Outcome Indicator 2.2', 'Number of community groups with capacity to plan, implement and monitor adaptation programs', '2019-06-30', NULL, NULL, 0, 0, 4, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:55:50', 1),
(9, 3, 'Outcome Indicator 2.3', 'District level development plans and policies updated with climate risk management provisions', '2019-06-30', NULL, NULL, 1, 0, 3, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:57:38', 1),
(10, 4, 'Outcome Indicator 3.1', '% of infrastructure projects adopting specifications that takes into account anticipated climate risk for small rural infrastructure projects', '2019-06-30', NULL, NULL, 0, 0, 100, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:58:21', 1),
(11, 5, 'Output Indicator 1.1', 'No of HH with enhanced understanding and awareness of livelihood opportunities resulting from electrification', '2019-06-30', NULL, NULL, 36, 0, 110000, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 16:59:33', 1),
(12, 5, 'Output Indicator 1.2', 'No of HH with increased capacity to participate in market oriented enterprises', '2019-06-30', NULL, NULL, 0, 0, 110000, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:00:03', 1),
(13, 5, 'Output Indicator 1.3', 'No of value chain development activities supported ', '2019-06-30', NULL, NULL, 0, 0, 9, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:00:26', 1),
(14, 5, 'Output Indicator 1.4', '% of off-farm economic opportunities increased a. Total: 50% increase b. Women: 30% c. Youth: 20% ', '2019-06-30', NULL, NULL, 0, 0, 50, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:01:19', 1),
(15, 6, 'Output Indicator 2.1', 'No of Training on social dimensions of vulnerability and resilience to climate change conducted', '2019-06-30', NULL, NULL, 0, 0, 8, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:01:51', 1),
(16, 6, 'Output Indicator 2.2', 'No of Awareness campaigns on climate change impacts and promotion of gender-responsive climate adaptation conducted', '2019-06-30', NULL, NULL, 0, 0, 8, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:02:21', 1),
(17, 6, 'Output Indicator 2.3', 'No of Trainings for district administrations and communities on coordination and support on climate-resilient development planning at the local level conducted', '2019-06-30', NULL, NULL, 0, 0, 4, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:03:55', 1),
(18, 6, 'Output Indicator 2.4', 'No of community based planning, implementation and monitoring adaptation programs implemented', '2019-06-30', NULL, NULL, 0, 0, 6, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:03:24', 1),
(19, 7, 'Output Indicator 3.1', 'No of small projects built with specifications that take into account anticipated climate risks', '2019-06-30', NULL, NULL, 0, 0, 6, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:04:24', 1),
(20, 7, 'Output Indicator 3.2', 'No of markets upgraded', '2019-06-30', NULL, NULL, 0, 0, 4, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:04:44', 1),
(21, 7, 'Output Indicator 3.3', 'No of trainings and modules on climate risks on the design and construction of small-scale rural infrastructure', '2019-06-30', NULL, NULL, 0, 0, 0, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:08:17', 1),
(22, 8, 'Output Indicator 4.1', 'No of climate change adaption knowledge products developed and disseminated to the community', '2019-06-30', NULL, NULL, 0, 0, 9, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:05:32', 1),
(23, 8, 'Output Indicator 4.2', 'Conduct climate change adaptation practitioners event', '2019-06-30', NULL, NULL, 0, 0, 6, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:06:34', 1),
(24, 8, 'Output Indicator 4.3', 'Project Implementation Reviews', '2019-06-30', NULL, NULL, 0, 0, 4, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:07:56', 1),
(25, 9, 'Output Indicator 5.1', 'Project implementation progress reports conducted', '2019-06-30', NULL, NULL, 0, 0, 10, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:08:50', 1),
(26, 9, 'Output Indicator 5.2', 'Project Steering Committees conducted', '2019-06-30', NULL, NULL, 0, 0, 4, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:09:29', 1),
(27, 9, 'Output Indicator 5.3', 'Climate change adaptation practitioners events conducted', '2019-06-30', NULL, NULL, 0, 0, 2, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:09:56', 1),
(28, 9, 'Output Indicator 5.4', 'Project mid-term and final evaluation completed', '2019-06-30', NULL, NULL, 0, 0, 2, 0, 1, 1, NULL, 0, '', NULL, NULL, NULL, '2021-06-21 17:10:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indicator_category`
--

CREATE TABLE `indicator_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator_category`
--

INSERT INTO `indicator_category` (`id`, `category_name`, `description`, `display_order`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Impacts', 'the long-term, cumulative effect of programs/ interventions over time on what they ultimately aim to change.', 1, NULL, NULL, '2021-06-17 23:16:01', 1),
(2, 'Outcomes', 'short-term and medium-term effect of an intervention\'s output such as change in knowledge, attitudes, beliefs, behavior.', 2, NULL, NULL, '2021-06-17 18:15:08', 1),
(3, 'Outputs', 'the results of program/ intervention activities; the direct products or deliverables of program/ intervention activities.', 3, NULL, NULL, '2021-06-17 18:15:16', 1),
(4, 'Activities', 'the actions designed to meet a project’s objectives.', 4, NULL, NULL, '2021-06-17 18:15:24', 1),
(5, 'Inputs', 'the financial, human and material resources used in a program/ intervention.', 5, NULL, NULL, '2021-06-17 18:15:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `indicator_format`
--

CREATE TABLE `indicator_format` (
  `id` int(11) NOT NULL,
  `format` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator_format`
--

INSERT INTO `indicator_format` (`id`, `format`) VALUES
(1, 'Number'),
(2, 'Percent');

-- --------------------------------------------------------

--
-- Table structure for table `indicator_framework_element`
--

CREATE TABLE `indicator_framework_element` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `indicator_category_id` int(11) NOT NULL,
  `element` varchar(1000) NOT NULL COMMENT 'Framework Element Name like Output1, Input 2',
  `description` varchar(1000) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `indicator_framework_element`
--

INSERT INTO `indicator_framework_element` (`id`, `project_id`, `indicator_category_id`, `element`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, 'Impacts', 'Improved quality of life for the Rwandan People', NULL, NULL, '2021-06-17 23:04:51', 1),
(2, 1, 2, 'Outcome 1', 'Diversified, strengthened and climate resilient rural livelihood opportunities for vulnerable women and men in the project intervention area.', NULL, NULL, '2021-06-17 23:05:07', 1),
(3, 1, 2, 'Outcome 2', 'Community driven adaptation and reduced vulnerability to climate change.', NULL, NULL, '2021-06-17 23:05:16', 1),
(4, 1, 2, 'Outcome 3', 'Increased resilience of small scale rural infrastructure to climate change.', NULL, NULL, '2021-06-17 23:05:25', 1),
(5, 1, 3, 'Output 1', 'Climate resilient opportunities developed for rural Households.', NULL, NULL, '2021-06-17 23:05:34', 1),
(6, 1, 3, 'Output 2', 'Community driven adaptation and climate risk reduction processes adopted.', NULL, NULL, '2021-06-17 23:05:43', 1),
(7, 1, 3, 'Output 3', 'Climate resilient small scale rural infrastructure constructed.', NULL, NULL, '2021-06-17 23:05:51', 1),
(8, 1, 3, 'Output 4', 'Monitoring and Evaluation.', NULL, NULL, '2021-06-17 23:06:00', 1),
(9, 1, 3, 'Output 5', 'Project is efficiently managed, monitored and evaluated.', NULL, NULL, '2021-06-17 23:06:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_role`
--

CREATE TABLE `member_role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_role`
--

INSERT INTO `member_role` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Edit Access'),
(3, 'Data Entry'),
(4, 'View Only');

-- --------------------------------------------------------

--
-- Table structure for table `milestone`
--

CREATE TABLE `milestone` (
  `milestoneID` int(11) NOT NULL,
  `indicatorID` int(11) NOT NULL,
  `mDate` date NOT NULL COMMENT 'Milestone Date',
  `milestone` varchar(500) NOT NULL COMMENT 'Milestone Value'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `milestone`
--

INSERT INTO `milestone` (`milestoneID`, `indicatorID`, `mDate`, `milestone`) VALUES
(1, 1, '2017-12-01', '770'),
(2, 1, '2018-06-01', '779'),
(3, 1, '2018-12-01', '788'),
(4, 1, '2019-06-01', '804'),
(5, 1, '2019-12-01', '814'),
(6, 1, '2020-06-01', '820'),
(7, 1, '2020-12-01', '834'),
(8, 1, '2021-06-01', '844'),
(9, 2, '2017-12-01', '0.524'),
(10, 2, '2018-06-01', '0.522'),
(11, 2, '2018-12-01', '0.52'),
(12, 2, '2019-06-01', '0.518'),
(13, 2, '2019-12-01', '0.516'),
(14, 2, '2020-06-01', '0.514'),
(15, 2, '2020-12-01', '0.512'),
(16, 2, '2021-06-01', '0.51'),
(17, 3, '2017-12-01', '38.2'),
(18, 3, '2018-06-01', '37'),
(19, 3, '2018-12-01', '36'),
(20, 3, '2019-06-01', '35'),
(21, 3, '2019-12-01', '34'),
(22, 3, '2020-06-01', '33'),
(23, 3, '2020-12-01', '32'),
(24, 3, '2021-06-01', '31'),
(25, 4, '2017-12-01', '35'),
(26, 4, '2018-06-01', '30'),
(27, 4, '2018-12-01', '30'),
(28, 4, '2019-06-01', '20'),
(29, 4, '2019-12-01', '20'),
(30, 4, '2020-06-01', '15'),
(31, 4, '2020-12-01', '15'),
(32, 4, '2021-06-01', '15'),
(33, 5, '2017-12-01', '30'),
(34, 5, '2018-06-01', '40'),
(35, 5, '2018-12-01', '50'),
(36, 5, '2019-06-01', '60'),
(37, 5, '2019-12-01', '70'),
(38, 5, '2020-06-01', '70'),
(39, 5, '2020-12-01', '75'),
(40, 5, '2021-06-01', '77'),
(41, 6, '2017-12-01', '0'),
(42, 6, '2018-06-01', '0'),
(43, 6, '2018-12-01', '0'),
(44, 6, '2019-06-01', '0'),
(45, 6, '2019-12-01', '0'),
(46, 6, '2020-06-01', '0'),
(47, 6, '2020-12-01', '0'),
(48, 6, '2021-06-01', '0'),
(49, 7, '2017-12-01', '0'),
(50, 7, '2018-06-01', '5'),
(51, 7, '2018-12-01', '5'),
(52, 7, '2019-06-01', '10'),
(53, 7, '2019-12-01', '10'),
(54, 7, '2020-06-01', '11'),
(55, 7, '2020-12-01', '12'),
(56, 7, '2021-06-01', '13'),
(57, 8, '2017-12-01', '0'),
(58, 8, '2018-06-01', '2'),
(59, 8, '2018-12-01', '2'),
(60, 8, '2019-06-01', '2'),
(61, 8, '2019-12-01', '2'),
(62, 8, '2020-06-01', '2.5'),
(63, 8, '2020-12-01', '2.5'),
(64, 8, '2021-06-01', '2.5'),
(65, 9, '2017-12-01', '1'),
(66, 9, '2018-06-01', '1'),
(67, 9, '2018-12-01', '1'),
(68, 9, '2019-06-01', '1'),
(69, 9, '2019-12-01', '2'),
(70, 9, '2020-06-01', '2'),
(71, 9, '2020-12-01', '2'),
(72, 9, '2021-06-01', '2'),
(73, 10, '2017-12-01', '0'),
(74, 10, '2018-06-01', '0'),
(75, 10, '2018-12-01', '0'),
(76, 10, '2019-06-01', '0'),
(77, 10, '2019-12-01', '20'),
(78, 10, '2020-06-01', '50'),
(79, 10, '2020-12-01', '60'),
(80, 10, '2021-06-01', '60'),
(81, 11, '2017-12-01', '0'),
(82, 11, '2018-06-01', '25000'),
(83, 11, '2018-12-01', '50000'),
(84, 11, '2019-06-01', '75000'),
(85, 11, '2019-12-01', '100000'),
(86, 11, '2020-06-01', '110000'),
(87, 11, '2020-12-01', '110000'),
(88, 11, '2021-06-01', '110000'),
(89, 12, '2017-12-01', '0'),
(90, 12, '2018-06-01', '0'),
(91, 12, '2018-12-01', '50000'),
(92, 12, '2019-06-01', '75000'),
(93, 12, '2019-12-01', '75000'),
(94, 12, '2020-06-01', '80000'),
(95, 12, '2020-12-01', '80000'),
(96, 12, '2021-06-01', '90000'),
(97, 13, '2017-12-01', '0'),
(98, 13, '2018-06-01', '0'),
(99, 13, '2018-12-01', '5'),
(100, 13, '2019-06-01', '5'),
(101, 13, '2019-12-01', '7'),
(102, 13, '2020-06-01', '7'),
(103, 13, '2020-12-01', '9'),
(104, 13, '2021-06-01', '9'),
(105, 14, '2017-12-01', '0'),
(106, 14, '2018-06-01', '0'),
(107, 14, '2018-12-01', '10'),
(108, 14, '2019-06-01', '20'),
(109, 14, '2019-12-01', '30'),
(110, 14, '2020-06-01', '40'),
(111, 14, '2020-12-01', '50'),
(112, 14, '2021-06-01', '50'),
(113, 15, '2017-12-01', '1'),
(114, 15, '2018-06-01', '2'),
(115, 15, '2018-12-01', '4'),
(116, 15, '2019-06-01', '4'),
(117, 15, '2019-12-01', '6'),
(118, 15, '2020-06-01', '6'),
(119, 15, '2020-12-01', '8'),
(120, 15, '2021-06-01', '8'),
(121, 16, '2017-12-01', '2'),
(122, 16, '2018-06-01', '2'),
(123, 16, '2018-12-01', '4'),
(124, 16, '2019-06-01', '4'),
(125, 16, '2019-12-01', '6'),
(126, 16, '2020-06-01', '6'),
(127, 16, '2020-12-01', '8'),
(128, 16, '2021-06-01', '8'),
(129, 17, '2017-12-01', '0'),
(130, 17, '2018-06-01', '1'),
(131, 17, '2018-12-01', '2'),
(132, 17, '2019-06-01', '3'),
(133, 17, '2019-12-01', '3'),
(134, 17, '2020-06-01', '4'),
(135, 17, '2020-12-01', '4'),
(136, 17, '2021-06-01', '4'),
(137, 18, '2017-12-01', '2'),
(138, 18, '2018-06-01', '2'),
(139, 18, '2018-12-01', '2'),
(140, 18, '2019-06-01', '2'),
(141, 18, '2019-12-01', '4'),
(142, 18, '2020-06-01', '4'),
(143, 18, '2020-12-01', '5'),
(144, 18, '2021-06-01', '5'),
(145, 19, '2017-12-01', '0'),
(146, 19, '2018-06-01', '0'),
(147, 19, '2018-12-01', '2'),
(148, 19, '2019-06-01', '2'),
(149, 19, '2019-12-01', '4'),
(150, 19, '2020-06-01', '4'),
(151, 19, '2020-12-01', '5'),
(152, 19, '2021-06-01', '5'),
(153, 20, '2017-12-01', '0'),
(154, 20, '2018-06-01', '0'),
(155, 20, '2018-12-01', '2'),
(156, 20, '2019-06-01', '2'),
(157, 20, '2019-12-01', '2'),
(158, 20, '2020-06-01', '4'),
(159, 20, '2020-12-01', '3'),
(160, 20, '2021-06-01', '3'),
(161, 21, '2017-12-01', '0'),
(162, 21, '2018-06-01', '0'),
(163, 21, '2018-12-01', '0'),
(164, 21, '2019-06-01', '0'),
(165, 21, '2019-12-01', '0'),
(166, 21, '2020-06-01', '0'),
(167, 21, '2020-12-01', '0'),
(168, 21, '2021-06-01', '0'),
(169, 22, '2017-12-01', '0'),
(170, 22, '2018-06-01', '0'),
(171, 22, '2018-12-01', '3'),
(172, 22, '2019-06-01', '3'),
(173, 22, '2019-12-01', '6'),
(174, 22, '2020-06-01', '6'),
(175, 22, '2020-12-01', '7'),
(176, 22, '2021-06-01', '7'),
(177, 23, '2017-12-01', '0'),
(178, 23, '2018-06-01', '0'),
(179, 23, '2018-12-01', '0'),
(180, 23, '2019-06-01', '3'),
(181, 23, '2019-12-01', '3'),
(182, 23, '2020-06-01', '6'),
(183, 23, '2020-12-01', '6'),
(184, 23, '2021-06-01', '6'),
(185, 24, '2017-12-01', '0'),
(186, 24, '2018-06-01', '1'),
(187, 24, '2018-12-01', '2'),
(188, 24, '2019-06-01', '3'),
(189, 24, '2019-12-01', '3'),
(190, 24, '2020-06-01', '4'),
(191, 24, '2020-12-01', '4'),
(192, 24, '2021-06-01', '4'),
(193, 25, '2017-12-01', '1'),
(194, 25, '2018-06-01', '2'),
(195, 25, '2018-12-01', '3'),
(196, 25, '2019-06-01', '4'),
(197, 25, '2019-12-01', '5'),
(198, 25, '2020-06-01', '6'),
(199, 25, '2020-12-01', '7'),
(200, 25, '2021-06-01', '8'),
(201, 26, '2017-12-01', '0'),
(202, 26, '2018-06-01', '1'),
(203, 26, '2018-12-01', '1'),
(204, 26, '2019-06-01', '2'),
(205, 26, '2019-12-01', '2'),
(206, 26, '2020-06-01', '3'),
(207, 26, '2020-12-01', '3'),
(208, 26, '2021-06-01', '3'),
(209, 27, '2017-12-01', '0'),
(210, 27, '2018-06-01', '0'),
(211, 27, '2018-12-01', '1'),
(212, 27, '2019-06-01', '1'),
(213, 27, '2019-12-01', '1'),
(214, 27, '2020-06-01', '1'),
(215, 27, '2020-12-01', '1'),
(216, 27, '2021-06-01', '1'),
(217, 28, '2017-12-01', '0'),
(218, 28, '2018-06-01', '0'),
(219, 28, '2018-12-01', '0'),
(220, 28, '2019-06-01', '0'),
(221, 28, '2019-12-01', '1'),
(222, 28, '2020-06-01', '1'),
(223, 28, '2020-12-01', '1'),
(224, 28, '2021-06-01', '1');

-- --------------------------------------------------------

--
-- Table structure for table `period`
--

CREATE TABLE `period` (
  `id` int(11) NOT NULL,
  `period_name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `period`
--

INSERT INTO `period` (`id`, `period_name`, `description`) VALUES
(1, 'Annual', '1st Jan - 31st Dec'),
(2, 'Semi-Annual', '1st Jan - 30th June, 1st Jul - 31st Dec'),
(3, 'Quarterly', '1st Jan - 31st Mar, 1st Apr - 30th Jun, 1st Jul - 31st Aug, 1st Sep - 31st Dec'),
(4, 'Monthly', '1st to last day of the month for 12 calendar months'),
(5, 'Daily', 'every single day in a calendar year');

-- --------------------------------------------------------

--
-- Table structure for table `progress`
--

CREATE TABLE `progress` (
  `progress_id` int(11) NOT NULL,
  `progress` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `progress`
--

INSERT INTO `progress` (`progress_id`, `progress`) VALUES
(1, 'Increasing'),
(2, 'Decreasing');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL COMMENT 'Project id',
  `status_id` int(11) NOT NULL COMMENT 'Project status id',
  `project_code` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT 'project code',
  `project_title` varchar(1000) CHARACTER SET utf8 NOT NULL COMMENT 'project title',
  `start_date` date NOT NULL COMMENT 'Project Start Date',
  `end_date` date NOT NULL COMMENT 'Project End Date',
  `description` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `project_comment` varchar(1000) DEFAULT NULL,
  `budget_amount` double NOT NULL DEFAULT 0 COMMENT 'Project budget amount',
  `report_period_id` int(11) NOT NULL DEFAULT 2 COMMENT 'Project report period [Annual, Semi-annual, Quarterly etc]',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='Store Project Details';

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `status_id`, `project_code`, `project_title`, `start_date`, `end_date`, `description`, `project_comment`, `budget_amount`, `report_period_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 2, 'Climate Change', ' Increasing Climate Change Adaptive Capacity of Rwandan Communities', '2016-12-31', '2021-12-31', 'Increasing the adaptive capacity of vulnerable Rwandan communities to adapt to the adverse effects of climate change: Livelihood diversification and investment in rural infrastructures', 'Project Comment 1', 8824749, 3, NULL, NULL, '2021-06-16 22:59:00', NULL),
(3, 1, 'Rural Block 2/23A', 'Rural Electrification', '2020-01-01', '2024-12-31', 'Rural Electrification', 'Rural Electrification', 1000000, 1, NULL, NULL, '2021-06-19 21:10:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_data`
--

CREATE TABLE `project_data` (
  `id` int(11) NOT NULL,
  `project_data_type_id` int(11) NOT NULL COMMENT 'Target or Milestone',
  `indicator_id` int(11) NOT NULL,
  `value_date` date NOT NULL COMMENT 'date data is collected',
  `value` double NOT NULL COMMENT 'value of data collected',
  `data_comment` varchar(1000) NOT NULL COMMENT 'Comment on data collected',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_data`
--

INSERT INTO `project_data` (`id`, `project_data_type_id`, `indicator_id`, `value_date`, `value`, `data_comment`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 1, '2017-12-31', 774, 'Target Dec 2017', '2021-06-19 10:47:26', 1, '2021-06-19 15:12:24', 1),
(2, 2, 1, '2021-12-31', 775, 'Milestone Dec 2017', '2021-06-19 10:47:26', 1, '2021-06-19 10:47:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_data_type`
--

CREATE TABLE `project_data_type` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_data_type`
--

INSERT INTO `project_data_type` (`id`, `type`) VALUES
(1, 'Target'),
(2, 'Milestone');

-- --------------------------------------------------------

--
-- Table structure for table `project_partner`
--

CREATE TABLE `project_partner` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `organization_name` varchar(500) NOT NULL,
  `role` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `organization_address` varchar(500) CHARACTER SET utf8 NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_partner`
--

INSERT INTO `project_partner` (`id`, `project_id`, `organization_name`, `role`, `organization_address`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Rwanda Government.', 'Government', 'Rwanda', NULL, NULL, '2021-06-17 23:12:57', 1),
(2, 1, 'EDCL - THE ENERGY DEVELOPMENT CORPORATION LIMITED', 'Implementing Agency', 'EDCL.', NULL, NULL, '2021-06-17 23:09:15', 1),
(5, 1, 'AFDB - African Development Bank', 'Donor', 'Rwanda,', NULL, NULL, '2021-06-17 23:09:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_risk`
--

CREATE TABLE `project_risk` (
  `id` int(11) NOT NULL COMMENT 'Risk ID',
  `project_id` int(11) NOT NULL COMMENT 'Project ID',
  `risk_code` varchar(500) NOT NULL COMMENT 'Project Risk Code',
  `description` varchar(500) DEFAULT NULL COMMENT 'Project Risk Description',
  `mitigation` varchar(500) DEFAULT NULL COMMENT 'Mitigation Measure',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_risk`
--

INSERT INTO `project_risk` (`id`, `project_id`, `risk_code`, `description`, `mitigation`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Risk 1', 'Climatic conditions (destructive rains and unpredictable seasons) hamper project interventions (planting etc.).', 'The project will build in flexibility in terms of resource disbursement to enable communities to bring forward project interventions if necessary.', NULL, NULL, '2021-06-17 23:11:38', 1),
(2, 1, 'Risk 3', 'High costs and insufficient supply of electricity impedes livelihood diversification.', 'Project will invest in a range of livelihood opportunities with varying power requirements.', NULL, NULL, '2021-06-17 23:12:17', 1),
(3, 1, 'Risk 4', 'Inadequate political and social support for mainstreaming climate change considerations into the development processes,', 'Project to identify and secure the services of a consultant to work with communities and the government in an participatory monitoring.', NULL, NULL, '2021-06-19 21:30:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_status`
--

CREATE TABLE `project_status` (
  `id` int(11) NOT NULL,
  `project_status_name` varchar(500) CHARACTER SET utf8 NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_status`
--

INSERT INTO `project_status` (`id`, `project_status_name`, `description`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Pipeline/identification', 'The project is being scoped or planned.', NULL, NULL, '2021-06-17 16:54:04', 1),
(2, 'Implementation', 'The project is currently being implemented.', NULL, NULL, '2021-06-17 16:54:14', 1),
(3, 'Finalisation', 'Physical activity is complete or the final disbursement has been made.', NULL, NULL, '2021-06-17 16:54:22', 1),
(4, 'Closed', 'Physical activity is complete or the final disbursement has been made, but the activity remains open pending financial sign off or M&E.', NULL, NULL, '2021-06-17 16:54:31', 1),
(5, 'Cancelled', 'The project has been cancelled.', NULL, NULL, '2021-06-17 16:54:39', 1),
(6, 'Suspended', 'The project has been temporarily suspended.', NULL, NULL, '2021-06-17 16:54:47', 1);

-- --------------------------------------------------------

--
-- Table structure for table `project_team`
--

CREATE TABLE `project_team` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `member_name` varchar(500) NOT NULL,
  `member_role_id` int(11) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_team`
--

INSERT INTO `project_team` (`id`, `project_id`, `member_name`, `member_role_id`) VALUES
(1, 1, 'Peter Muchiri', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL COMMENT 'User ID',
  `username` varchar(45) NOT NULL COMMENT 'User Name',
  `password` varchar(200) NOT NULL COMMENT 'User Password',
  `authKey` varchar(32) NOT NULL COMMENT 'Authentication Key',
  `access_token` varchar(255) NOT NULL COMMENT 'Access Token',
  `rememberMe` tinyint(1) NOT NULL DEFAULT 0,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `passwordResetTokenExpire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `authKey`, `access_token`, `rememberMe`, `password_reset_token`, `passwordResetTokenExpire`) VALUES
(1, 'admin', '$2y$13$Gl1R6XRe/81ROUsEvCht0ejIAyM1VQv8yW3AZOkT56OVshTgaFiRi', 'test100key', '100-token', 0, NULL, 0),
(2, 'demo', '$2y$13$aLprK.Ac4xA3NGuCuxwbUuzK7Wk17gPA3U65CIU7o7Yg0rfAuN3.e', 'test101key', '101-token', 0, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `indicator`
--
ALTER TABLE `indicator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicator_format_id` (`indicator_format_id`),
  ADD KEY `indicator_framework_element_id` (`indicator_framework_element_id`),
  ADD KEY `data_period_id` (`data_period_id`);

--
-- Indexes for table `indicator_category`
--
ALTER TABLE `indicator_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `displayOrder` (`display_order`),
  ADD UNIQUE KEY `display_order` (`display_order`);

--
-- Indexes for table `indicator_format`
--
ALTER TABLE `indicator_format`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicator_framework_element`
--
ALTER TABLE `indicator_framework_element`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicator_category_id` (`indicator_category_id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `member_role`
--
ALTER TABLE `member_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `milestone`
--
ALTER TABLE `milestone`
  ADD PRIMARY KEY (`milestoneID`),
  ADD KEY `indicatorID` (`indicatorID`);

--
-- Indexes for table `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progress`
--
ALTER TABLE `progress`
  ADD PRIMARY KEY (`progress_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`),
  ADD KEY `statusID` (`status_id`),
  ADD KEY `report_period_id` (`report_period_id`);

--
-- Indexes for table `project_data`
--
ALTER TABLE `project_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `indicator_id` (`indicator_id`),
  ADD KEY `project_data_type_id` (`project_data_type_id`);

--
-- Indexes for table `project_data_type`
--
ALTER TABLE `project_data_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_partner`
--
ALTER TABLE `project_partner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projectID` (`project_id`);

--
-- Indexes for table `project_risk`
--
ALTER TABLE `project_risk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `project_status`
--
ALTER TABLE `project_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_team`
--
ALTER TABLE `project_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indicator`
--
ALTER TABLE `indicator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `indicator_category`
--
ALTER TABLE `indicator_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `indicator_format`
--
ALTER TABLE `indicator_format`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indicator_framework_element`
--
ALTER TABLE `indicator_framework_element`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member_role`
--
ALTER TABLE `member_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `period`
--
ALTER TABLE `period`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `progress`
--
ALTER TABLE `progress`
  MODIFY `progress_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Project id', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_data`
--
ALTER TABLE `project_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_data_type`
--
ALTER TABLE `project_data_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `project_partner`
--
ALTER TABLE `project_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `project_risk`
--
ALTER TABLE `project_risk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Risk ID', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `project_status`
--
ALTER TABLE `project_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `project_team`
--
ALTER TABLE `project_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'User ID', AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indicator`
--
ALTER TABLE `indicator`
  ADD CONSTRAINT `indicator_ibfk_1` FOREIGN KEY (`indicator_format_id`) REFERENCES `indicator_format` (`id`),
  ADD CONSTRAINT `indicator_ibfk_2` FOREIGN KEY (`indicator_framework_element_id`) REFERENCES `indicator_framework_element` (`id`),
  ADD CONSTRAINT `indicator_ibfk_3` FOREIGN KEY (`data_period_id`) REFERENCES `period` (`id`);

--
-- Constraints for table `indicator_framework_element`
--
ALTER TABLE `indicator_framework_element`
  ADD CONSTRAINT `indicator_framework_element_ibfk_1` FOREIGN KEY (`indicator_category_id`) REFERENCES `indicator_category` (`id`),
  ADD CONSTRAINT `indicator_framework_element_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `milestone`
--
ALTER TABLE `milestone`
  ADD CONSTRAINT `milestone_ibfk_1` FOREIGN KEY (`indicatorID`) REFERENCES `indicator` (`id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `project_status` (`id`),
  ADD CONSTRAINT `project_ibfk_2` FOREIGN KEY (`report_period_id`) REFERENCES `period` (`id`);

--
-- Constraints for table `project_data`
--
ALTER TABLE `project_data`
  ADD CONSTRAINT `project_data_ibfk_1` FOREIGN KEY (`indicator_id`) REFERENCES `indicator` (`id`),
  ADD CONSTRAINT `project_data_ibfk_2` FOREIGN KEY (`project_data_type_id`) REFERENCES `project_data_type` (`id`);

--
-- Constraints for table `project_partner`
--
ALTER TABLE `project_partner`
  ADD CONSTRAINT `project_partner_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);

--
-- Constraints for table `project_risk`
--
ALTER TABLE `project_risk`
  ADD CONSTRAINT `project_risk_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
