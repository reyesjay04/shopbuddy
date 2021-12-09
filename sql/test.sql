-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2019 at 10:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`user_id`, `username`, `email`, `password`) VALUES
(3, 'MD', 'md@gmail.com', '202cb962ac59075b964b07152d234b70'),
(4, 'arolthings', '123@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(5, 'Sampling1', 'Sampling@gmail.com', '202cb962ac59075b964b07152d234b70'),
(6, 'admin', 'admin@gmail.com', 'admin'),
(7, 'admin', 'admin@gmail.com', 'admin'),
(8, 'jean', 'jeanatega@yahoo.com', 'jean'),
(9, 'jay', 'jayjean@yahoo.com', 'jayjean');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(10, 'Health & Beauty'),
(13, 'Home Appliance'),
(14, 'Electronic Devices'),
(89, 'Clothes'),
(90, 'Accessories');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_id`, `supplier_id`, `color_name`) VALUES
(2, 0, 'Yellow'),
(3, 0, 'Red'),
(4, 0, 'Blue'),
(5, 0, 'Green'),
(6, 0, 'Gray'),
(7, 0, 'Red Flower'),
(8, 0, 'Blue Flower'),
(9, 0, 'White'),
(22, 0, 'Black');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` text NOT NULL,
  `password` text NOT NULL,
  `bpassword` varchar(50) NOT NULL,
  `validation_code` text NOT NULL,
  `profile` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_id`, `first_name`, `last_name`, `username`, `email`, `contact_number`, `password`, `bpassword`, `validation_code`, `profile`, `active`) VALUES
(44, 'irish', 'ycong', 'ayreesh', 'ycongirish@gmail.com', '09759067512', '81dc9bdb52d04dc20036dbd8313ed055', '1234', '9132', '26_02_2019_21_21_45_123.jpg', 1),
(45, 'Joanna ', 'jamero', 'joanna', 'jjreyes055@gmail.com', '09759067512', '202cb962ac59075b964b07152d234b70', '123', '0', 'mustard dress.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `delivery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `brgy` text NOT NULL,
  `municipality` text NOT NULL,
  `province` text NOT NULL,
  `landmark` text NOT NULL,
  `note` text NOT NULL,
  `zip` tinytext NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(255) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `user_id`, `full_name`, `contact_number`, `email`, `address`, `brgy`, `municipality`, `province`, `landmark`, `note`, `zip`, `date`, `time`, `active`) VALUES
(1, 44, 'Joanna Jamero', '09972779636', 'ycongirish@gmail.com', 'Makati', 'Mapulang lupa', '300', '18', 'Note', 'Note', '123', '2019-03-01', '11:20:36', 0),
(2, 45, 'Joanna Jamero', '09759067512', 'jjreyes055@gmail.com', 'Blk 16 lot 32 ', 'Mapulang lupa', '279', '17', 'market', 'rg', '1111', '2019-03-01', '13:32:30', 0),
(3, 45, 'Joanna Jamero', '09972779636', 'jjreyes055@gmail.com', 'Makati', 'Mapulang lupa', '279', '17', 'cbv', 'rg', '1111', '2019-03-01', '13:43:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `municipality`
--

CREATE TABLE `municipality` (
  `mn_id` int(11) NOT NULL,
  `province_id` int(11) NOT NULL,
  `mn_name` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `municipality`
--

INSERT INTO `municipality` (`mn_id`, `province_id`, `mn_name`, `active`) VALUES
(1, 1, 'Bangued', 1),
(2, 1, 'Boliney', 1),
(3, 1, 'Bucay', 1),
(4, 1, 'Bucloc', 1),
(5, 1, 'Daguioman', 1),
(6, 1, 'Danglas', 1),
(7, 1, 'Dolores', 1),
(8, 1, 'Lacub', 1),
(9, 1, 'Lagangilang', 1),
(10, 1, 'Lagayan', 1),
(11, 1, 'Langiden', 1),
(12, 1, 'La Paz', 1),
(13, 1, 'Licuan~Baay', 1),
(14, 1, 'Luba', 1),
(15, 1, 'Malibcong', 1),
(16, 1, 'Manabo', 1),
(17, 1, 'Penarrubia', 1),
(18, 1, 'Pidigan', 1),
(19, 1, 'Pilar', 1),
(20, 1, 'Sallapadan', 1),
(21, 1, 'San Isidro', 1),
(22, 1, 'San Juan', 1),
(23, 1, 'San Quintin', 1),
(24, 1, 'Tayum', 1),
(25, 1, 'Tineg', 1),
(26, 1, 'Tubo', 1),
(27, 1, 'Villaviciosa', 1),
(28, 2, 'Buenavista', 1),
(29, 2, 'Butuan City', 1),
(30, 2, 'Cabadbaran City', 1),
(31, 2, 'Carmen', 1),
(32, 2, 'Jabonga', 1),
(33, 2, 'Kitcharao', 1),
(34, 2, 'Las Nieves', 1),
(35, 2, 'Magallanes', 1),
(36, 2, 'Nasipit', 1),
(37, 2, 'Remedios T. Romualdez', 1),
(38, 2, 'Santiago', 1),
(39, 2, 'Tubay', 1),
(40, 3, 'Bayugan City', 1),
(41, 3, 'Bunawan', 1),
(42, 3, 'Esperanza', 1),
(43, 3, 'La Paz', 1),
(44, 3, 'Loreto', 1),
(45, 3, 'Prosperidad', 1),
(46, 3, 'Rosario', 1),
(47, 3, 'San Francisco', 1),
(48, 3, 'San Luis', 1),
(49, 3, 'Santa Josefa', 1),
(50, 3, 'Sibagat', 1),
(51, 3, 'Talacogon', 1),
(52, 3, 'Trento', 1),
(53, 3, 'Veruela', 1),
(54, 4, 'Altavas', 1),
(55, 4, 'Balete', 1),
(56, 4, 'Banga', 1),
(57, 4, 'Batan', 1),
(58, 4, 'Buruanga', 1),
(59, 4, 'Ibajay', 1),
(60, 4, 'Kalibo', 1),
(61, 4, 'Lezo', 1),
(62, 4, 'Libacao', 1),
(63, 4, 'Madalag', 1),
(64, 4, 'Makato', 1),
(65, 4, 'Malay', 1),
(66, 4, 'Malinao', 1),
(67, 4, 'Nabas', 1),
(68, 4, 'New Washington', 1),
(69, 4, 'Numancia', 1),
(70, 4, 'Tangalan', 1),
(71, 5, 'Bacacay', 1),
(72, 5, 'Camalig', 1),
(73, 5, 'Daraga', 1),
(74, 5, 'Guinobatan', 1),
(75, 5, 'Jovellar', 1),
(76, 5, 'Legazpi City', 1),
(77, 5, 'Libon', 1),
(78, 5, 'Ligao City', 1),
(79, 5, 'Malilipot', 1),
(80, 5, 'Malinao', 1),
(81, 5, 'Manito', 1),
(82, 5, 'Oas', 1),
(83, 5, 'Pio Duran', 1),
(84, 5, 'Polangui', 1),
(85, 5, 'Rapu~Rapu', 1),
(86, 5, 'Santo Domingo', 1),
(87, 5, 'Tabaco City', 1),
(88, 5, 'Tiwi', 1),
(89, 6, 'Anini~Y', 1),
(90, 6, 'Barbaza', 1),
(91, 6, 'Belison', 1),
(92, 6, 'Bugasong', 1),
(93, 6, 'Caluya', 1),
(94, 6, 'Culasi', 1),
(95, 6, 'Hamtic', 1),
(96, 6, 'Laua~an', 1),
(97, 6, 'Libertad', 1),
(98, 6, 'Pandan', 1),
(99, 6, 'Patnongon', 1),
(100, 6, 'San Jose', 1),
(101, 6, 'San Remigio', 1),
(102, 6, 'Sebaste', 1),
(103, 6, 'Sibalom', 1),
(104, 6, 'Tibiao', 1),
(105, 6, 'Tobias Fornier', 1),
(106, 6, 'Valderrama', 1),
(107, 8, 'Baler', 1),
(108, 8, 'Casiguran', 1),
(109, 8, 'Dilasag', 1),
(110, 8, 'Dinalungan', 1),
(111, 8, 'Dingalan', 1),
(112, 8, 'Dipaculao', 1),
(113, 8, 'Maria Aurora', 1),
(114, 8, 'San Luis', 1),
(115, 9, 'Akbar', 1),
(116, 9, 'Al~Barka', 1),
(117, 9, 'Hadji Mohammad Ajul', 1),
(118, 9, 'Hadji Muhtamad', 1),
(119, 9, 'Isabela City', 1),
(120, 9, 'Lamitan City', 1),
(121, 9, 'Lantawan', 1),
(122, 9, 'Maluso', 1),
(123, 9, 'Tabuan~Lasa', 1),
(124, 9, 'Tuburan', 1),
(125, 9, 'Ungkaya Pukan', 1),
(126, 10, 'Abucay', 1),
(127, 10, 'Bagac', 1),
(128, 10, 'Balanga City', 1),
(129, 10, 'Dinalupihan', 1),
(130, 10, 'Hermosa', 1),
(131, 10, 'Limay', 1),
(132, 10, 'Mariveles', 1),
(133, 10, 'Morong', 1),
(134, 10, 'Orani', 1),
(135, 10, 'Orion', 1),
(136, 10, 'Pilar', 1),
(137, 10, 'Samal', 1),
(138, 12, 'Agoncillo', 1),
(139, 12, 'Alitagtag', 1),
(140, 12, 'Balayan', 1),
(141, 12, 'Balete', 1),
(142, 12, 'Batangas City', 1),
(143, 12, 'Bauan', 1),
(144, 12, 'Calaca', 1),
(145, 12, 'Calatagan', 1),
(146, 12, 'Cuenca', 1),
(147, 12, 'Ibaan', 1),
(148, 12, 'Laurel', 1),
(149, 12, 'Lemery', 1),
(150, 12, 'Lian', 1),
(151, 12, 'Lipa City', 1),
(152, 12, 'Lobo', 1),
(153, 12, 'Mabini', 1),
(154, 12, 'Malvar', 1),
(155, 12, 'Mataasnakahoy', 1),
(156, 12, 'Nasugbu', 1),
(157, 12, 'Padre Garcia', 1),
(158, 12, 'Rosario', 1),
(159, 12, 'San Jose', 1),
(160, 12, 'San Juan', 1),
(161, 12, 'San Luis', 1),
(162, 12, 'San Nicolas', 1),
(163, 12, 'San Pascual', 1),
(164, 12, 'Santa Teresita', 1),
(165, 12, 'Santo Tomas', 1),
(166, 12, 'Taal', 1),
(167, 12, 'Talisay', 1),
(168, 12, 'Tanauan City', 1),
(169, 12, 'Taysan', 1),
(170, 12, 'Tingloy', 1),
(171, 12, 'Tuy', 1),
(172, 13, 'Atok', 1),
(173, 13, 'Baguio City', 1),
(174, 13, 'Bakun', 1),
(175, 13, 'Bokod', 1),
(176, 13, 'Buguias', 1),
(177, 13, 'Itogon', 1),
(178, 13, 'Kabayan', 1),
(179, 13, 'Kapangan', 1),
(180, 13, 'Kibungan', 1),
(181, 13, 'La Trinidad', 1),
(182, 13, 'Mankayan', 1),
(183, 13, 'Sablan', 1),
(184, 13, 'Tuba', 1),
(185, 13, 'Tublay', 1),
(186, 14, 'Almeria', 1),
(187, 14, 'Biliran', 1),
(188, 14, 'Cabucgayan', 1),
(189, 14, 'Caibiran', 1),
(190, 14, 'Culaba', 1),
(191, 14, 'Kawayan', 1),
(192, 14, 'Maripipi', 1),
(193, 14, 'Naval', 1),
(194, 15, 'lburquerque', 1),
(195, 15, 'Alicia', 1),
(196, 15, 'Anda', 1),
(197, 15, 'Antequera', 1),
(198, 15, 'Baclayon', 1),
(199, 15, 'Balilihan', 1),
(200, 15, 'Batuan', 1),
(201, 15, 'Bien Unido', 1),
(202, 15, 'Bilar', 1),
(203, 15, 'Buenavista', 1),
(204, 15, 'Calape', 1),
(205, 15, 'Candijay', 1),
(206, 15, 'Carmen', 1),
(207, 15, 'Catigbian', 1),
(208, 15, 'Clarin', 1),
(209, 15, 'Corella', 1),
(210, 15, 'Cortes', 1),
(211, 15, 'Dagohoy', 1),
(212, 15, 'Danao', 1),
(213, 15, 'Dauis', 1),
(214, 15, 'Dimiao', 1),
(215, 15, 'Duero', 1),
(216, 15, 'Garcia Hernandez', 1),
(217, 15, 'Getafe', 1),
(218, 15, 'Guindulman', 1),
(219, 15, 'Inabanga', 1),
(220, 15, 'Jagna', 1),
(221, 15, 'Lila', 1),
(222, 15, 'Loay', 1),
(223, 15, 'Loboc', 1),
(224, 15, 'Loon', 1),
(225, 15, 'Mabini', 1),
(226, 15, 'Maribojoc', 1),
(227, 15, 'Panglao', 1),
(228, 15, 'Pilar', 1),
(229, 15, 'Pres. Carlos P. Garcia', 1),
(230, 15, 'Sagbayan', 1),
(231, 15, 'San Isidro', 1),
(232, 15, 'San Miguel', 1),
(233, 15, 'Sevilla', 1),
(234, 15, 'Sierra Bullones', 1),
(235, 15, 'Sikatuna', 1),
(236, 15, 'Tagbilaran City', 1),
(237, 15, 'Talibon', 1),
(238, 15, 'Trinidad', 1),
(239, 15, 'Tubigon', 1),
(240, 15, 'Ubay', 1),
(241, 15, 'Valencia', 1),
(242, 16, 'Baungon', 1),
(243, 16, 'Cabanglasan', 1),
(244, 16, 'Damulog', 1),
(245, 16, 'Dangcagan', 1),
(246, 16, 'Don Carlos', 1),
(247, 16, 'Impasug~ong', 1),
(248, 16, 'Kadingilan', 1),
(249, 16, 'Kalilangan', 1),
(250, 16, 'Kibawe', 1),
(251, 16, 'Kitaotao', 1),
(252, 16, 'Lantapan', 1),
(253, 16, 'Libona', 1),
(254, 16, 'Malaybalay City', 1),
(255, 16, 'Malitbog', 1),
(256, 16, 'Manolo Fortich', 1),
(257, 16, 'Maramag', 1),
(258, 16, 'Pangantucan', 1),
(259, 16, 'Quezon', 1),
(260, 16, 'San Fernando', 1),
(261, 16, 'Sumilao', 1),
(262, 16, 'Talakag', 1),
(263, 16, 'Valencia City', 1),
(264, 17, 'Angat', 1),
(265, 17, 'Balagtas', 1),
(266, 17, 'Baliuag', 1),
(267, 17, 'Bocaue', 1),
(268, 17, 'Bulacan', 1),
(269, 17, 'Bustos', 1),
(270, 17, 'Calumpit', 1),
(271, 17, 'Dona Remedios Trinidad', 1),
(272, 17, 'Guiguinto', 1),
(273, 17, 'Hagonoy', 1),
(274, 17, 'Malolos City', 1),
(275, 17, 'Marilao', 1),
(276, 17, 'Meycauayan City', 1),
(277, 17, 'Norzagaray', 1),
(278, 17, 'Obando', 1),
(279, 17, 'Pandi', 1),
(280, 17, 'Paombong', 1),
(281, 17, 'Plaridel', 1),
(282, 17, 'Pulilan', 1),
(283, 17, 'San Ildefonso', 1),
(284, 17, 'San Jose Del Monte City', 1),
(285, 17, 'San Miguel', 1),
(286, 17, 'San Rafael', 1),
(287, 17, 'Santa Maria', 1),
(288, 18, 'Abulug', 1),
(289, 18, 'Alcala', 1),
(290, 18, 'Allacapan', 1),
(291, 18, 'Amulung', 1),
(292, 18, 'Aparri', 1),
(293, 18, 'Baggao', 1),
(294, 18, 'Ballesteros', 1),
(295, 18, 'Buguey', 1),
(296, 18, 'Calayan', 1),
(297, 18, 'Camalaniugan', 1),
(298, 18, 'Claveria', 1),
(299, 18, 'Enrile', 1),
(300, 18, 'Gattaran', 1),
(301, 18, 'Gonzaga', 1),
(302, 18, 'Iguig', 1),
(303, 18, 'Lal~Lo', 1),
(304, 18, 'Lasam', 1),
(305, 18, 'Pamplona', 1),
(306, 18, 'Penablanca', 1),
(307, 18, 'Piat', 1),
(308, 18, 'Rizal', 1),
(309, 18, 'Sanchez~Mira', 1),
(310, 18, 'Santa Ana', 1),
(311, 18, 'Santa Praxedes', 1),
(312, 18, 'Santa Teresita', 1),
(313, 18, 'Santo Nino', 1),
(314, 18, 'Solana', 1),
(315, 18, 'Tuao', 1),
(316, 18, 'Tuguegarao City', 1),
(317, 19, 'Basud', 1),
(318, 19, 'Capalonga', 1),
(319, 19, 'Daet', 1),
(320, 19, 'Jose Panganiban', 1),
(321, 19, 'Labo', 1),
(322, 19, 'Mercedes', 1),
(323, 19, 'Paracale', 1),
(324, 19, 'San Lorenzo Ruiz', 1),
(325, 19, 'Santa Elena', 1),
(326, 19, 'San Vicente', 1),
(327, 19, 'Talisay', 1),
(328, 19, 'Vinzons', 1),
(329, 20, 'Baao', 1),
(330, 20, 'Balatan', 1),
(331, 20, 'Bato', 1),
(332, 20, 'Bombon', 1),
(333, 20, 'Buhi', 1),
(334, 20, 'Bula', 1),
(335, 20, 'Cabusao', 1),
(336, 20, 'Calabanga', 1),
(337, 20, 'Camaligan', 1),
(338, 20, 'Canaman', 1),
(339, 20, 'Caramoan', 1),
(340, 20, 'Del Gallego', 1),
(341, 20, 'Gainza', 1),
(342, 20, 'Garchitorena', 1),
(343, 20, 'Goa', 1),
(344, 20, 'Iriga City', 1),
(345, 20, 'Lagonoy', 1),
(346, 20, 'Libmanan', 1),
(347, 20, 'Lupi', 1),
(348, 20, 'Magarao', 1),
(349, 20, 'Milaor', 1),
(350, 20, 'Minalabac', 1),
(351, 20, 'Nabua', 1),
(352, 20, 'Naga City', 1),
(353, 20, 'Ocampo', 1),
(354, 20, 'Pamplona', 1),
(355, 20, 'Pasacao', 1),
(356, 20, 'Pili', 1),
(357, 20, 'Presentacion', 1),
(358, 20, 'Ragay', 1),
(359, 20, 'Sagnay', 1),
(360, 20, 'San Fernando', 1),
(361, 20, 'San Jose', 1),
(362, 20, 'Sipocot', 1),
(363, 20, 'Siruma', 1),
(364, 20, 'Tigaon', 1),
(365, 20, 'Tinambac', 1),
(366, 21, 'Catarman', 1),
(367, 21, 'Guinsiliban', 1),
(368, 21, 'Mahinog', 1),
(369, 21, 'Mambajao', 1),
(370, 21, 'Sagay', 1),
(371, 22, 'Cuartero', 1),
(372, 22, 'Dao', 1),
(373, 22, 'Dumalag', 1),
(374, 22, 'Dumarao', 1),
(375, 22, 'Ivisan', 1),
(376, 22, 'Jamindan', 1),
(377, 22, 'Ma~ayon', 1),
(378, 22, 'Mambusao', 1),
(379, 22, 'Panay', 1),
(380, 22, 'Panitan', 1),
(381, 22, 'Pilar', 1),
(382, 22, 'Pontevedra', 1),
(383, 22, 'President Roxas', 1),
(384, 22, 'Roxas City', 1),
(385, 22, 'Sapi~an', 1),
(386, 22, 'Sigma', 1),
(387, 22, 'Tapaz', 1),
(388, 23, 'Bagamanoc', 1),
(389, 23, 'Baras', 1),
(390, 23, 'Bato', 1),
(391, 23, 'Caramoran', 1),
(392, 23, 'Gigmoto', 1),
(393, 23, 'Pandan', 1),
(394, 23, 'Panganiban', 1),
(395, 23, 'San Andres', 1),
(396, 23, 'San Miguel', 1),
(397, 23, 'Viga', 1),
(398, 23, 'Virac', 1),
(399, 24, 'Alfonso', 1),
(400, 24, 'Amadeo', 1),
(401, 24, 'Bacoor', 1),
(402, 24, 'Carmona', 1),
(403, 24, 'Cavite City', 1),
(404, 24, 'Dasmarinas City', 1),
(405, 24, 'Gen. Mariano Alvarez', 1),
(406, 24, 'General Emilio Aguinaldo', 1),
(407, 24, 'General Trias', 1),
(408, 24, 'Imus', 1),
(409, 24, 'Indang', 1),
(410, 24, 'Kawit', 1),
(411, 24, 'Magallanes', 1),
(412, 24, 'Maragondon', 1),
(413, 24, 'Mendez', 1),
(414, 24, 'Naic', 1),
(415, 24, 'Noveleta', 1),
(416, 24, 'Rosario', 1),
(417, 24, 'Silang', 1),
(418, 24, 'Tagaytay City', 1),
(419, 24, 'Tanza', 1),
(420, 24, 'Ternate', 1),
(421, 24, 'Trece Martires City', 1),
(422, 25, 'Alcantara', 1),
(423, 25, 'Alcoy', 1),
(424, 25, 'Alegria', 1),
(425, 25, 'Aloguinsan', 1),
(426, 25, 'Argao', 1),
(427, 25, 'Asturias', 1),
(428, 25, 'Badian', 1),
(429, 25, 'Balamban', 1),
(430, 25, 'Bantayan', 1),
(431, 25, 'Barili', 1),
(432, 25, 'Bogo City', 1),
(433, 25, 'Boljoon', 1),
(434, 25, 'Borbon', 1),
(435, 25, 'Carcar City', 1),
(436, 25, 'Carmen', 1),
(437, 25, 'Catmon', 1),
(438, 25, 'Cebu City', 1),
(439, 25, 'Compostela', 1),
(440, 25, 'Consolacion', 1),
(441, 25, 'Cordoba', 1),
(442, 25, 'Daanbantayan', 1),
(443, 25, 'Dalaguete', 1),
(444, 25, 'Danao City', 1),
(445, 25, 'Dumanjug', 1),
(446, 25, 'Ginatilan', 1),
(447, 25, 'Lapu~Lapu City', 1),
(448, 25, 'Liloan', 1),
(449, 25, 'Madridejos', 1),
(450, 25, 'Malabuyoc', 1),
(451, 25, 'Mandaue City', 1),
(452, 25, 'Medellin', 1),
(453, 25, 'Minglanilla', 1),
(454, 25, 'Moalboal', 1),
(455, 25, 'Naga City', 1),
(456, 25, 'Oslob', 1),
(457, 25, 'Pilar', 1),
(458, 25, 'Pinamungahan', 1),
(459, 25, 'Poro', 1),
(460, 25, 'Ronda', 1),
(461, 25, 'Samboan', 1),
(462, 25, 'San Fernando', 1),
(463, 25, 'San Francisco', 1),
(464, 25, 'San Remigio', 1),
(465, 25, 'Santa Fe', 1),
(466, 25, 'Santander', 1),
(467, 25, 'Sibonga', 1),
(468, 25, 'Sogod', 1),
(469, 25, 'Tabogon', 1),
(470, 25, 'Tabuelan', 1),
(471, 25, 'Talisay City', 1),
(472, 25, 'Toledo City', 1),
(473, 25, 'Tuburan', 1),
(474, 25, 'Tudela', 1),
(475, 26, 'Compostela', 1),
(476, 26, 'Laak', 1),
(477, 26, 'Mabini', 1),
(478, 26, 'Maco', 1),
(479, 26, 'Maragusan', 1),
(480, 26, 'Mawab', 1),
(481, 26, 'Monkayo', 1),
(482, 26, 'Montevista', 1),
(483, 26, 'Nabunturan', 1),
(484, 26, 'New Bataan', 1),
(485, 26, 'Pantukan', 1),
(486, 27, 'cotabato city', 1),
(487, 28, 'Asuncion', 1),
(488, 28, 'Braulio E. Dujali', 1),
(489, 28, 'Carmen', 1),
(490, 28, 'Island Garden City Of Samal', 1),
(491, 28, 'Kapalong', 1),
(492, 28, 'New Corella', 1),
(493, 28, 'Panabo City', 1),
(494, 28, 'San Isidro', 1),
(495, 28, 'Santo Tomas', 1),
(496, 28, 'Tagum City', 1),
(497, 28, 'Talaingod', 1),
(498, 29, 'Bansalan', 1),
(499, 29, 'Davao City', 1),
(500, 29, 'Digos City', 1),
(501, 29, 'Don Marcelino', 1),
(502, 29, 'Hagonoy', 1),
(503, 29, 'Jose Abad Santos', 1),
(504, 29, 'Kiblawan', 1),
(505, 29, 'Magsaysay', 1),
(506, 29, 'Malalag', 1),
(507, 29, 'Malita', 1),
(508, 29, 'Matanao', 1),
(509, 29, 'Padada', 1),
(510, 29, 'Santa Cruz', 1),
(511, 29, 'Santa Maria', 1),
(512, 29, 'Sarangani', 1),
(513, 29, 'Sulop', 1),
(514, 31, 'Baganga', 1),
(515, 31, 'Banaybanay', 1),
(516, 31, 'Boston', 1),
(517, 31, 'Caraga', 1),
(518, 31, 'Cateel', 1),
(519, 31, 'Governor Generoso', 1),
(520, 32, 'Basilisa', 1),
(521, 32, 'Cagdianao', 1),
(522, 32, 'Dinagat', 1),
(523, 32, 'Libjo', 1),
(524, 32, 'Loreto', 1),
(525, 32, 'San Jose', 1),
(526, 33, 'Arteche', 1),
(527, 33, 'Balangiga', 1),
(528, 33, 'Balangkayan', 1),
(529, 33, 'Borongan City', 1),
(530, 33, 'Can~Avid', 1),
(531, 33, 'Dolores', 1),
(532, 33, 'General Macarthur', 1),
(533, 33, 'Giporlos', 1),
(534, 33, 'Guiuan', 1),
(535, 33, 'Hernani', 1),
(536, 33, 'Jipapad', 1),
(537, 33, 'Lawaan', 1),
(538, 33, 'Llorente', 1),
(539, 33, 'Maslog', 1),
(540, 33, 'Maydolong', 1),
(541, 33, 'Mercedes', 1),
(542, 33, 'Oras', 1),
(543, 33, 'Quinapondan', 1),
(544, 33, 'Salcedo', 1),
(545, 33, 'San Julian', 1),
(546, 33, 'San Policarpo', 1),
(547, 33, 'Sulat', 1),
(548, 33, 'Taft', 1),
(549, 34, 'Buenavista', 1),
(550, 34, 'Jordan', 1),
(551, 34, 'Nueva Valencia', 1),
(552, 34, 'San Lorenzo', 1),
(553, 34, 'Sibunag', 1),
(554, 35, 'Aguinaldo', 1),
(555, 35, 'Alfonso Lista', 1),
(556, 35, 'Asipulo', 1),
(557, 35, 'Banaue', 1),
(558, 35, 'Hingyon', 1),
(559, 35, 'Hungduan', 1),
(560, 35, 'Kiangan', 1),
(561, 35, 'Lagawe', 1),
(562, 35, 'Lamut', 1),
(563, 35, 'Mayoyao', 1),
(564, 35, 'Tinoc', 1),
(565, 36, 'Adams', 1),
(566, 36, 'Bacarra', 1),
(567, 36, 'Badoc', 1),
(568, 36, 'Bangui', 1),
(569, 36, 'Banna', 1),
(570, 36, 'Batac City', 1),
(571, 36, 'Burgos', 1),
(572, 36, 'Carasi', 1),
(573, 36, 'Currimao', 1),
(574, 36, 'Dingras', 1),
(575, 36, 'Dumalneg', 1),
(576, 36, 'Laoag City', 1),
(577, 36, 'Marcos', 1),
(578, 36, 'Nueva Era', 1),
(579, 36, 'Pagudpud', 1),
(580, 36, 'Paoay', 1),
(581, 36, 'Pasuquin', 1),
(582, 36, 'Piddig', 1),
(583, 36, 'Pinili', 1),
(584, 36, 'San Nicolas', 1),
(585, 36, 'Sarrat', 1),
(586, 36, 'Solsona', 1),
(587, 36, 'Vintar', 1),
(588, 37, 'Alilem', 1),
(589, 37, 'Banayoyo', 1),
(590, 37, 'Bantay', 1),
(591, 37, 'Burgos', 1),
(592, 37, 'Cabugao', 1),
(593, 37, 'Candon City', 1),
(594, 37, 'Caoayan', 1),
(595, 37, 'Cervantes', 1),
(596, 37, 'Galimuyod', 1),
(597, 37, 'Gregorio Del Pilar', 1),
(598, 37, 'Lidlidda', 1),
(599, 37, 'Magsingal', 1),
(600, 37, 'Nagbukel', 1),
(601, 37, 'Narvacan', 1),
(602, 37, 'Quirino', 1),
(603, 37, 'Salcedo', 1),
(604, 37, 'San Emilio', 1),
(605, 37, 'San Esteban', 1),
(606, 37, 'San Ildefonso', 1),
(607, 37, 'San Juan', 1),
(608, 37, 'Santa', 1),
(609, 37, 'Santa Catalina', 1),
(610, 37, 'Santa Cruz', 1),
(611, 37, 'Santa Lucia', 1),
(612, 37, 'Santa Maria', 1),
(613, 37, 'Santiago', 1),
(614, 37, 'Santo Domingo', 1),
(615, 37, 'San Vicente', 1),
(616, 37, 'Sigay', 1),
(617, 37, 'Sinait', 1),
(618, 37, 'Sugpon', 1),
(619, 37, 'Suyo', 1),
(620, 37, 'Tagudin', 1),
(621, 37, 'Vigan City', 1),
(622, 38, 'Ajuy', 1),
(623, 38, 'Alimodian', 1),
(624, 38, 'Anilao', 1),
(625, 38, 'Badiangan', 1),
(626, 38, 'Balasan', 1),
(627, 38, 'Banate', 1),
(628, 38, 'Barotac Nuevo', 1),
(629, 38, 'Barotac Viejo', 1),
(630, 38, 'Batad', 1),
(631, 38, 'Bingawan', 1),
(632, 38, 'Cabatuan', 1),
(633, 38, 'Calinog', 1),
(634, 38, 'Carles', 1),
(635, 38, 'Concepcion', 1),
(636, 38, 'Dingle', 1),
(637, 38, 'Duenas', 1),
(638, 38, 'Dumangas', 1),
(639, 38, 'Estancia', 1),
(640, 38, 'Guimbal', 1),
(641, 38, 'Igbaras', 1),
(642, 38, 'Iloilo City', 1),
(643, 38, 'Janiuay', 1),
(644, 38, 'Lambunao', 1),
(645, 38, 'Leganes', 1),
(646, 38, 'Lemery', 1),
(647, 38, 'Leon', 1),
(648, 38, 'Maasin', 1),
(649, 38, 'Miagao', 1),
(650, 38, 'Mina', 1),
(651, 38, 'New Lucena', 1),
(652, 38, 'Oton', 1),
(653, 38, 'Passi City', 1),
(654, 38, 'Pavia', 1),
(655, 38, 'Pototan', 1),
(656, 38, 'San Dionisio', 1),
(657, 38, 'San Enrique', 1),
(658, 38, 'San Joaquin', 1),
(659, 38, 'San Miguel', 1),
(660, 38, 'San Rafael', 1),
(661, 38, 'Santa Barbara', 1),
(662, 38, 'Sara', 1),
(663, 38, 'Tigbauan', 1),
(664, 38, 'Tubungan', 1),
(665, 38, 'Zarraga', 1),
(666, 39, 'Alicia', 1),
(667, 39, 'Angadanan', 1),
(668, 39, 'Aurora', 1),
(669, 39, 'Benito Soliven', 1),
(670, 39, 'Burgos', 1),
(671, 39, 'Cabagan', 1),
(672, 39, 'Cabatuan', 1),
(673, 39, 'Cauayan City', 1),
(674, 39, 'Cordon', 1),
(675, 39, 'Delfin Albano', 1),
(676, 39, 'Dinapigue', 1),
(677, 39, 'Divilacan', 1),
(678, 39, 'Echague', 1),
(679, 39, 'Gamu', 1),
(680, 39, 'Ilagan', 1),
(681, 39, 'Jones', 1),
(682, 39, 'Luna', 1),
(683, 39, 'Maconacon', 1),
(684, 39, 'Mallig', 1),
(685, 39, 'Naguilian', 1),
(686, 39, 'Palanan', 1),
(687, 39, 'Quezon', 1),
(688, 39, 'Quirino', 1),
(689, 39, 'Ramon', 1),
(690, 39, 'Reina Mercedes', 1),
(691, 39, 'Roxas', 1),
(692, 39, 'San Agustin', 1),
(693, 39, 'San Guillermo', 1),
(694, 39, 'San Isidro', 1),
(695, 39, 'San Manuel', 1),
(696, 39, 'San Mariano', 1),
(697, 39, 'San Mateo', 1),
(698, 39, 'San Pablo', 1),
(699, 39, 'Santa Maria', 1),
(700, 39, 'Santiago City', 1),
(701, 39, 'Santo Tomas', 1),
(702, 39, 'Tumauini', 1),
(703, 40, 'Balbalan', 1),
(704, 40, 'Lubuagan', 1),
(705, 40, 'Pasil', 1),
(706, 40, 'Pinukpuk', 1),
(707, 40, 'Rizal', 1),
(708, 40, 'Tabuk City', 1),
(709, 40, 'Tanudan', 1),
(710, 40, 'Tinglayan', 1),
(711, 41, 'Agoo', 1),
(712, 41, 'Aringay', 1),
(713, 41, 'Bacnotan', 1),
(714, 41, 'Bagulin', 1),
(715, 41, 'Balaoan', 1),
(716, 41, 'Bangar', 1),
(717, 41, 'Bauang', 1),
(718, 41, 'Burgos', 1),
(719, 41, 'Caba', 1),
(720, 41, 'Luna', 1),
(721, 41, 'Naguilian', 1),
(722, 41, 'Pugo', 1),
(723, 41, 'Rosario', 1),
(724, 41, 'San Fernando City', 1),
(725, 41, 'San Gabriel', 1),
(726, 41, 'San Juan', 1),
(727, 41, 'Santol', 1),
(728, 41, 'Santo Tomas', 1),
(729, 41, 'Sudipen', 1),
(730, 41, 'Tubao', 1),
(731, 42, 'Alaminos', 1),
(732, 42, 'Bay', 1),
(733, 42, 'Binan City', 1),
(734, 42, 'Cabuyao', 1),
(735, 42, 'Calamba City', 1),
(736, 42, 'Calauan', 1),
(737, 42, 'Cavinti', 1),
(738, 42, 'Famy', 1),
(739, 42, 'Kalayaan', 1),
(740, 42, 'Liliw', 1),
(741, 42, 'Los Banos', 1),
(742, 42, 'Luisiana', 1),
(743, 42, 'Lumban', 1),
(744, 42, 'Mabitac', 1),
(745, 42, 'Magdalena', 1),
(746, 42, 'Majayjay', 1),
(747, 42, 'Nagcarlan', 1),
(748, 42, 'Paete', 1),
(749, 42, 'Pagsanjan', 1),
(750, 42, 'Pakil', 1),
(751, 42, 'Pangil', 1),
(752, 42, 'Pila', 1),
(753, 42, 'Rizal', 1),
(754, 42, 'San Pablo City', 1),
(755, 42, 'San Pedro', 1),
(756, 42, 'Santa Cruz', 1),
(757, 42, 'Santa Maria', 1),
(758, 42, 'Santa Rosa City', 1),
(759, 42, 'Siniloan', 1),
(760, 42, 'Victoria', 1),
(761, 43, 'Bacolod', 1),
(762, 43, 'Baloi', 1),
(763, 43, 'Baroy', 1),
(764, 43, 'Iligan City', 1),
(765, 43, 'Kapatagan', 1),
(766, 43, 'Kauswagan', 1),
(767, 43, 'Kolambugan', 1),
(768, 43, 'Lala', 1),
(769, 43, 'Linamon', 1),
(770, 43, 'Magsaysay', 1),
(771, 43, 'Maigo', 1),
(772, 43, 'Matungao', 1),
(773, 43, 'Munai', 1),
(774, 43, 'Nunungan', 1),
(775, 43, 'Pantao Ragat', 1),
(776, 43, 'Pantar', 1),
(777, 43, 'Poona Piagapo', 1),
(778, 43, 'Salvador', 1),
(779, 43, 'Sapad', 1),
(780, 43, 'Sultan Naga Dimaporo', 1),
(781, 43, 'Tagoloan', 1),
(782, 43, 'Tangcal', 1),
(783, 43, 'Tubod', 1),
(784, 44, 'Bacolod~Kalawi', 1),
(785, 44, 'Balabagan', 1),
(786, 44, 'Balindong', 1),
(787, 44, 'Bayang', 1),
(788, 44, 'Binidayan', 1),
(789, 44, 'Buadiposo~Buntong', 1),
(790, 44, 'Bubong', 1),
(791, 44, 'Bumbaran', 1),
(792, 44, 'Butig', 1),
(793, 44, 'Calanogas', 1),
(794, 44, 'Ditsaan~Ramain', 1),
(795, 44, 'Ganassi', 1),
(796, 44, 'Kapai', 1),
(797, 44, 'Kapatagan', 1),
(798, 44, 'Lumba~Bayabao', 1),
(799, 44, 'Lumbaca~Unayan', 1),
(800, 44, 'Lumbatan', 1),
(801, 44, 'Lumbayanague', 1),
(802, 44, 'Madalum', 1),
(803, 44, 'Madamba', 1),
(804, 44, 'Maguing', 1),
(805, 44, 'Malabang', 1),
(806, 44, 'Marantao', 1),
(807, 44, 'Marogong', 1),
(808, 44, 'Masiu', 1),
(809, 44, 'Mulondo', 1),
(810, 44, 'Pagayawan', 1),
(811, 44, 'Piagapo', 1),
(812, 44, 'Picong', 1),
(813, 44, 'Poona Bayabao', 1),
(814, 44, 'Pualas', 1),
(815, 44, 'Saguiaran', 1),
(816, 44, 'Sultan Dumalondong', 1),
(817, 44, 'Tagoloan Ii', 1),
(818, 44, 'Tamparan', 1),
(819, 44, 'Taraka', 1),
(820, 44, 'Tubaran', 1),
(821, 44, 'Tugaya', 1),
(822, 44, 'Wao', 1),
(823, 45, 'Abuyog', 1),
(824, 45, 'Alangalang', 1),
(825, 45, 'Albuera', 1),
(826, 45, 'Babatngon', 1),
(827, 45, 'Barugo', 1),
(828, 45, 'Bato', 1),
(829, 45, 'Baybay City', 1),
(830, 45, 'Burauen', 1),
(831, 45, 'Capoocan', 1),
(832, 45, 'Carigara', 1),
(833, 45, 'Dagami', 1),
(834, 45, 'Dulag', 1),
(835, 45, 'Hilongos', 1),
(836, 45, 'Hindang', 1),
(837, 45, 'Inopacan', 1),
(838, 45, 'Isabel', 1),
(839, 45, 'Jaro', 1),
(840, 45, 'Javier', 1),
(841, 45, 'Julita', 1),
(842, 45, 'Kananga', 1),
(843, 45, 'La Paz', 1),
(844, 45, 'Leyte', 1),
(845, 45, 'Macarthur', 1),
(846, 45, 'Mahaplag', 1),
(847, 45, 'Matag~Ob', 1),
(848, 45, 'Matalom', 1),
(849, 45, 'Mayorga', 1),
(850, 45, 'Merida', 1),
(851, 45, 'Ormoc City', 1),
(852, 45, 'Palo', 1),
(853, 45, 'Palompon', 1),
(854, 45, 'Pastrana', 1),
(855, 45, 'San Isidro', 1),
(856, 45, 'San Miguel', 1),
(857, 45, 'Santa Fe', 1),
(858, 45, 'Tabango', 1),
(859, 45, 'Tabontabon', 1),
(860, 45, 'Tacloban City', 1),
(861, 45, 'Tanauan', 1),
(862, 45, 'Tolosa', 1),
(863, 45, 'Tunga', 1),
(864, 45, 'Villaba', 1),
(865, 46, 'Ampatuan', 1),
(866, 46, 'Barira', 1),
(867, 46, 'Buldon', 1),
(868, 46, 'Buluan', 1),
(869, 46, 'Datu Abdullah Sangki', 1),
(870, 46, 'Datu Anggal Midtimbang', 1),
(871, 46, 'Datu Blah T. Sinsuat', 1),
(872, 46, 'Datu Hoffer Ampatuan', 1),
(873, 46, 'Datu Odin Sinsuat', 1),
(874, 46, 'Datu Paglas', 1),
(875, 46, 'Datu Piang', 1),
(876, 46, 'Datu Salibo', 1),
(877, 46, 'Datu Saudi~Ampatuan', 1),
(878, 46, 'Datu Unsay', 1),
(879, 46, 'Gen. S. K. Pendatun', 1),
(880, 46, 'Guindulungan', 1),
(881, 46, 'Kabuntalan', 1),
(882, 46, 'Mamasapano', 1),
(883, 46, 'Mangudadatu', 1),
(884, 46, 'Matanog', 1),
(885, 46, 'Northern Kabuntalan', 1),
(886, 46, 'Pagagawan', 1),
(887, 46, 'Pagalungan', 1),
(888, 46, 'Paglat', 1),
(889, 46, 'Pandag', 1),
(890, 46, 'Parang', 1),
(891, 46, 'Rajah Buayan', 1),
(892, 46, 'Shariff Aguak', 1),
(893, 46, 'Shariff Saydona Mustapha', 1),
(894, 46, 'South Upi', 1),
(895, 46, 'Sultan Kudarat', 1),
(896, 46, 'Sultan Mastura', 1),
(897, 46, 'Sultan Sa Barongis', 1),
(898, 46, 'Talayan', 1),
(899, 46, 'Talitay', 1),
(900, 46, 'Upi', 1),
(901, 47, 'Boac', 1),
(902, 47, 'Buenavista', 1),
(903, 47, 'Gasan', 1),
(904, 47, 'Mogpog', 1),
(905, 47, 'Santa Cruz', 1),
(906, 47, 'Torrijo', 1),
(907, 48, 'Aroroy', 1),
(908, 48, 'Baleno', 1),
(909, 48, 'Balud', 1),
(910, 48, 'Batuan', 1),
(911, 48, 'Cataingan', 1),
(912, 48, 'Cawayan', 1),
(913, 48, 'Claveria', 1),
(914, 48, 'Dimasalang', 1),
(915, 48, 'Esperanza', 1),
(916, 48, 'Mandaon', 1),
(917, 48, 'Masbate City', 1),
(918, 48, 'Milagros', 1),
(919, 48, 'Mobo', 1),
(920, 48, 'Monreal', 1),
(921, 48, 'Palanas', 1),
(922, 48, 'Pio V. Corpuz', 1),
(923, 48, 'Placer', 1),
(924, 48, 'San Fernando', 1),
(925, 48, 'San Jacinto', 1),
(926, 48, 'San Pascual', 1),
(927, 48, 'Uson', 1),
(928, 49, 'Metro Manila~Caloocan', 1),
(929, 49, 'Metro Manila~Las Pinas', 1),
(930, 49, 'Metro Manila~Makati', 1),
(931, 49, 'Metro Manila~Malabon', 1),
(932, 49, 'Metro Manila~Mandaluyong', 1),
(933, 49, 'Metro Manila~Manila', 1),
(934, 49, 'Metro Manila~Marikina', 1),
(935, 49, 'Metro Manila~Muntinlupa', 1),
(936, 49, 'Metro Manila~Navotas', 1),
(937, 49, 'Metro Manila~Paranaque', 1),
(938, 49, 'Metro Manila~Pasay', 1),
(939, 49, 'Metro Manila~Pasig', 1),
(940, 49, 'Metro Manila~Pateros', 1),
(941, 49, 'Metro Manila~Quezon City', 1),
(942, 49, 'Metro Manila~San Juan', 1),
(943, 49, 'Metro Manila~Taguig', 1),
(944, 49, 'Metro Manila~Valenzuela', 1),
(945, 50, 'Aloran', 1),
(946, 50, 'Baliangao', 1),
(947, 50, 'Bonifacio', 1),
(948, 50, 'Calamba', 1),
(949, 50, 'Clarin', 1),
(950, 50, 'Concepcion', 1),
(951, 50, 'Don Victoriano Chiongbian', 1),
(952, 50, 'Jimenez', 1),
(953, 50, 'Lopez Jaena', 1),
(954, 50, 'Oroquieta City', 1),
(955, 50, 'Ozamis City', 1),
(956, 50, 'Panaon', 1),
(957, 50, 'Plaridel', 1),
(958, 50, 'Sapang Dalaga', 1),
(959, 50, 'Sinacaban', 1),
(960, 50, 'Tangub City', 1),
(961, 50, 'Tudela', 1),
(962, 51, 'Alubijid', 1),
(963, 51, 'Balingasag', 1),
(964, 51, 'Balingoan', 1),
(965, 51, 'Binuangan', 1),
(966, 51, 'Cagayan De Oro City', 1),
(967, 51, 'Claveria', 1),
(968, 51, 'El Salvador City', 1),
(969, 51, 'Gingoog City', 1),
(970, 51, 'Gitagum', 1),
(971, 51, 'Initao', 1),
(972, 51, 'Jasaan', 1),
(973, 51, 'Kinoguitan', 1),
(974, 51, 'Lagonglong', 1),
(975, 51, 'Laguindingan', 1),
(976, 51, 'Libertad', 1),
(977, 51, 'Lugait', 1),
(978, 51, 'Magsaysay', 1),
(979, 51, 'Manticao', 1),
(980, 51, 'Medina', 1),
(981, 51, 'Naawan', 1),
(982, 51, 'Opol', 1),
(983, 51, 'Salay', 1),
(984, 51, 'Sugbongcogon', 1),
(985, 51, 'Tagoloan', 1),
(986, 51, 'Talisayan', 1),
(987, 51, 'Villanueva', 1),
(988, 52, 'Barlig', 1),
(989, 52, 'Bauko', 1),
(990, 52, 'Besao', 1),
(991, 52, 'Bontoc', 1),
(992, 52, 'Natonin', 1),
(993, 52, 'Paracelis', 1),
(994, 52, 'Sabangan', 1),
(995, 52, 'Sadanga', 1),
(996, 52, 'Sagada', 1),
(997, 52, 'Tadian', 1),
(998, 53, 'Bacolod City', 1),
(999, 53, 'Bago City', 1),
(1000, 53, 'Binalbagan', 1),
(1001, 53, 'Cadiz City', 1),
(1002, 53, 'Calatrava', 1),
(1003, 53, 'Candoni', 1),
(1004, 53, 'Cauayan', 1),
(1005, 53, 'Enrique B. Magalona', 1),
(1006, 53, 'Escalante City', 1),
(1007, 53, 'Himamaylan City', 1),
(1008, 53, 'Hinigaran', 1),
(1009, 53, 'Hinoba~an', 1),
(1010, 53, 'Ilog', 1),
(1011, 53, 'Isabela', 1),
(1012, 53, 'Kabankalan City', 1),
(1013, 53, 'La Carlota City', 1),
(1014, 53, 'La Castellana', 1),
(1015, 53, 'Manapla', 1),
(1016, 53, 'Moises Padilla', 1),
(1017, 53, 'Murcia', 1),
(1018, 53, 'Pontevedra', 1),
(1019, 53, 'Pulupandan', 1),
(1020, 53, 'Sagay City', 1),
(1021, 53, 'Salvador Benedicto', 1),
(1022, 53, 'San Carlos City', 1),
(1023, 53, 'San Enrique', 1),
(1024, 53, 'Silay City', 1),
(1025, 53, 'Sipalay City', 1),
(1026, 53, 'Talisay City', 1),
(1027, 53, 'Toboso', 1),
(1028, 53, 'Valladolid', 1),
(1029, 53, 'Victorias City', 1),
(1030, 54, 'Amlan', 1),
(1031, 54, 'Ayungon', 1),
(1032, 54, 'Bacong', 1),
(1033, 54, 'Bais City', 1),
(1034, 54, 'Basay', 1),
(1035, 54, 'Bayawan City', 1),
(1036, 54, 'Bindoy', 1),
(1037, 54, 'Canlaon City', 1),
(1038, 54, 'Dauin', 1),
(1039, 54, 'Dumaguete City', 1),
(1040, 54, 'Guihulngan City', 1),
(1041, 54, 'Jimalalud', 1),
(1042, 54, 'La Libertad', 1),
(1043, 54, 'Mabinay', 1),
(1044, 54, 'Manjuyod', 1),
(1045, 54, 'Pamplona', 1),
(1046, 54, 'San Jose', 1),
(1047, 54, 'Santa Catalina', 1),
(1048, 54, 'Siaton', 1),
(1049, 54, 'Sibulan', 1),
(1050, 54, 'Tanjay City', 1),
(1051, 54, 'Tayasan', 1),
(1052, 54, 'Valencia', 1),
(1053, 54, 'Vallehermoso', 1),
(1054, 54, 'Zamboanguita', 1),
(1055, 55, 'Alamada', 1),
(1056, 55, 'Aleosan', 1),
(1057, 55, 'Antipas', 1),
(1058, 55, 'Arakan', 1),
(1059, 55, 'Banisilan', 1),
(1060, 55, 'Carmen', 1),
(1061, 55, 'Kabacan', 1),
(1062, 55, 'Kidapawan City', 1),
(1063, 55, 'Libungan', 1),
(1064, 55, 'Magpet', 1),
(1065, 55, 'Makilala', 1),
(1066, 55, 'Matalam', 1),
(1067, 55, 'Midsayap', 1),
(1068, 55, 'Pigkawayan', 1),
(1069, 55, 'Pikit', 1),
(1070, 55, 'President Roxas', 1),
(1071, 55, 'Tulunan', 1),
(1072, 56, 'Allen', 1),
(1073, 56, 'Biri', 1),
(1074, 56, 'Bobon', 1),
(1075, 56, 'Capul', 1),
(1076, 56, 'Catarman', 1),
(1077, 56, 'Catubig', 1),
(1078, 56, 'Gamay', 1),
(1079, 56, 'Laoang', 1),
(1080, 56, 'Lapinig', 1),
(1081, 56, 'Las Navas', 1),
(1082, 56, 'Lavezares', 1),
(1083, 56, 'Lope De Vega', 1),
(1084, 56, 'Mapanas', 1),
(1085, 56, 'Mondragon', 1),
(1086, 56, 'Palapag', 1),
(1087, 56, 'Pambujan', 1),
(1088, 56, 'Rosario', 1),
(1089, 56, 'San Antonio', 1),
(1090, 56, 'San Isidro', 1),
(1091, 56, 'San Jose', 1),
(1092, 56, 'San Roque', 1),
(1093, 56, 'San Vicente', 1),
(1094, 56, 'Silvino Lobos', 1),
(1095, 56, 'Victoria', 1),
(1096, 57, 'Aliaga', 1),
(1097, 57, 'Bongabon', 1),
(1098, 57, 'Cabanatuan City', 1),
(1099, 57, 'Cabiao', 1),
(1100, 57, 'Carranglan', 1),
(1101, 57, 'Cuyapo', 1),
(1102, 57, 'Gabaldon', 1),
(1103, 57, 'Gapan City', 1),
(1104, 57, 'General Mamerto Natividad', 1),
(1105, 57, 'General Tinio', 1),
(1106, 57, 'Guimba', 1),
(1107, 57, 'Jaen', 1),
(1108, 57, 'Laur', 1),
(1109, 57, 'Licab', 1),
(1110, 57, 'Llanera', 1),
(1111, 57, 'Lupao', 1),
(1112, 57, 'Nampicuan', 1),
(1113, 57, 'Palayan City', 1),
(1114, 57, 'Pantabangan', 1),
(1115, 57, 'Penaranda', 1),
(1116, 57, 'Quezon', 1),
(1117, 57, 'Rizal', 1),
(1118, 57, 'San Antonio', 1),
(1119, 57, 'San Isidro', 1),
(1120, 57, 'San Jose City', 1),
(1121, 57, 'San Leonardo', 1),
(1122, 57, 'Santa Rosa', 1),
(1123, 57, 'Santo Domingo', 1),
(1124, 57, 'Science City Of Munoz', 1),
(1125, 57, 'Talavera', 1),
(1126, 57, 'Talugtug', 1),
(1127, 57, 'Zaragoza', 1),
(1128, 58, 'Alfonso Castaneda', 1),
(1129, 58, 'Ambaguio', 1),
(1130, 58, 'Aritao', 1),
(1131, 58, 'Bagabag', 1),
(1132, 58, 'Bambang', 1),
(1133, 58, 'Bayombong', 1),
(1134, 58, 'Diadi', 1),
(1135, 58, 'Dupax Del Norte', 1),
(1136, 58, 'Dupax Del Sur', 1),
(1137, 58, 'Kasibu', 1),
(1138, 58, 'Kayapa', 1),
(1139, 58, 'Quezon', 1),
(1140, 58, 'Santa Fe', 1),
(1141, 58, 'Solano', 1),
(1142, 58, 'Villaverde', 1),
(1143, 59, 'Abra De Ilog', 1),
(1144, 59, 'Calintaan', 1),
(1145, 59, 'Looc', 1),
(1146, 59, 'Lubang', 1),
(1147, 59, 'Magsaysay', 1),
(1148, 59, 'Mamburao', 1),
(1149, 59, 'Paluan', 1),
(1150, 59, 'Rizal', 1),
(1151, 59, 'Sablayan', 1),
(1152, 59, 'San Jose', 1),
(1153, 59, 'Santa Cruz', 1),
(1154, 60, 'Baco', 1),
(1155, 60, 'Bansud', 1),
(1156, 60, 'Bongabong', 1),
(1157, 60, 'Bulalacao', 1),
(1158, 60, 'Calapan City', 1),
(1159, 60, 'Gloria', 1),
(1160, 60, 'Mansalay', 1),
(1161, 60, 'Naujan', 1),
(1162, 60, 'Pinamalayan', 1),
(1163, 60, 'Pola', 1),
(1164, 60, 'Puerto Galera', 1),
(1165, 60, 'Roxas', 1),
(1166, 60, 'San Teodoro', 1),
(1167, 60, 'Socorro', 1),
(1168, 60, 'Victoria', 1),
(1169, 61, 'Aborlan', 1),
(1170, 61, 'Agutaya', 1),
(1171, 61, 'Araceli', 1),
(1172, 61, 'Balabac', 1),
(1173, 61, 'Bataraza', 1),
(1174, 61, 'Brooke\'s Point', 1),
(1175, 61, 'Busuanga', 1),
(1176, 61, 'Cagayancillo', 1),
(1177, 61, 'Coron', 1),
(1178, 61, 'Culion', 1),
(1179, 61, 'Cuyo', 1),
(1180, 61, 'Dumaran', 1),
(1181, 61, 'El Nido', 1),
(1182, 61, 'Kalayaan', 1),
(1183, 61, 'Linapacan', 1),
(1184, 61, 'Magsaysay', 1),
(1185, 61, 'Narra', 1),
(1186, 61, 'Puerto Princesa City', 1),
(1187, 61, 'Quezon', 1),
(1188, 61, 'Rizal', 1),
(1189, 61, 'Roxas', 1),
(1190, 61, 'San Vicente', 1),
(1191, 61, 'Sofronio Espanola', 1),
(1192, 61, 'Taytay', 1),
(1193, 62, 'Angeles City', 1),
(1194, 62, 'Apalit', 1),
(1195, 62, 'Arayat', 1),
(1196, 62, 'Bacolor', 1),
(1197, 62, 'Candaba', 1),
(1198, 62, 'Floridablanca', 1),
(1199, 62, 'Guagua', 1),
(1200, 62, 'Lubao', 1),
(1201, 62, 'Mabalacat', 1),
(1202, 62, 'Macabebe', 1),
(1203, 62, 'Magalang', 1),
(1204, 62, 'Masantol', 1),
(1205, 62, 'Mexico', 1),
(1206, 62, 'Minalin', 1),
(1207, 62, 'Porac', 1),
(1208, 62, 'San Fernando City', 1),
(1209, 62, 'San Luis', 1),
(1210, 62, 'San Simon', 1),
(1211, 62, 'Santa Ana', 1),
(1212, 62, 'Santa Rita', 1),
(1213, 62, 'Santo Tomas', 1),
(1214, 62, 'Sasmuan', 1),
(1215, 63, 'Agno', 1),
(1216, 63, 'Aguilar', 1),
(1217, 63, 'Alaminos City', 1),
(1218, 63, 'Alcala', 1),
(1219, 63, 'Anda', 1),
(1220, 63, 'Asingan', 1),
(1221, 63, 'Balungao', 1),
(1222, 63, 'Bani', 1),
(1223, 63, 'Basista', 1),
(1224, 63, 'Bautista', 1),
(1225, 63, 'Bayambang', 1),
(1226, 63, 'Binalonan', 1),
(1227, 63, 'Binmaley', 1),
(1228, 63, 'Bolinao', 1),
(1229, 63, 'Bugallon', 1),
(1230, 63, 'Burgos', 1),
(1231, 63, 'Calasiao', 1),
(1232, 63, 'Dagupan City', 1),
(1233, 63, 'Dasol', 1),
(1234, 63, 'Infanta', 1),
(1235, 63, 'Labrador', 1),
(1236, 63, 'Laoac', 1),
(1237, 63, 'Lingayen', 1),
(1238, 63, 'Mabini', 1),
(1239, 63, 'Malasiqui', 1),
(1240, 63, 'Manaoag', 1),
(1241, 63, 'Mangaldan', 1),
(1242, 63, 'Mangatarem', 1),
(1243, 63, 'Mapandan', 1),
(1244, 63, 'Natividad', 1),
(1245, 63, 'Pozorrubio', 1),
(1246, 63, 'Rosales', 1),
(1247, 63, 'San Carlos City', 1),
(1248, 63, 'San Fabian', 1),
(1249, 63, 'San Jacinto', 1),
(1250, 63, 'San Manuel', 1),
(1251, 63, 'San Nicolas', 1),
(1252, 63, 'San Quintin', 1),
(1253, 63, 'Santa Barbara', 1),
(1254, 63, 'Santa Maria', 1),
(1255, 63, 'Santo Tomas', 1),
(1256, 63, 'Sison', 1),
(1257, 63, 'Sual', 1),
(1258, 63, 'Tayug', 1),
(1259, 63, 'Umingan', 1),
(1260, 63, 'Urbiztondo', 1),
(1261, 63, 'Urdaneta City', 1),
(1262, 63, 'Villasis', 1),
(1263, 64, 'Agdangan', 1),
(1264, 64, 'Alabat', 1),
(1265, 64, 'Atimonan', 1),
(1266, 64, 'Buenavista', 1),
(1267, 64, 'Burdeos', 1),
(1268, 64, 'Calauag', 1),
(1269, 64, 'Candelaria', 1),
(1270, 64, 'Catanauan', 1),
(1271, 64, 'Dolores', 1),
(1272, 64, 'General Luna', 1),
(1273, 64, 'General Nakar', 1),
(1274, 64, 'Guinayangan', 1),
(1275, 64, 'Gumaca', 1),
(1276, 64, 'Infanta', 1),
(1277, 64, 'Jomalig', 1),
(1278, 64, 'Lopez', 1),
(1279, 64, 'Lucban', 1),
(1280, 64, 'Lucena City', 1),
(1281, 64, 'Macalelon', 1),
(1282, 64, 'Mauban', 1),
(1283, 64, 'Mulanay', 1),
(1284, 64, 'Padre Burgos', 1),
(1285, 64, 'Pagbilao', 1),
(1286, 64, 'Panukulan', 1),
(1287, 64, 'Patnanungan', 1),
(1288, 64, 'Perez', 1),
(1289, 64, 'Pitogo', 1),
(1290, 64, 'Plaridel', 1),
(1291, 64, 'Polillo', 1),
(1292, 64, 'Quezon', 1),
(1293, 64, 'Real', 1),
(1294, 64, 'Sampaloc', 1),
(1295, 64, 'San Andres', 1),
(1296, 64, 'San Antonio', 1),
(1297, 64, 'San Francisco', 1),
(1298, 64, 'San Narciso', 1),
(1299, 64, 'Sariaya', 1),
(1300, 64, 'Tagkawayan', 1),
(1301, 64, 'Tayabas City', 1),
(1302, 64, 'Tiaong', 1),
(1303, 64, 'Unisan', 1),
(1304, 65, 'Aglipay', 1),
(1305, 65, 'Cabarroguis', 1),
(1306, 65, 'Diffun', 1),
(1307, 65, 'Maddela', 1),
(1308, 65, 'Nagtipunan', 1),
(1309, 65, 'Saguday', 1),
(1310, 66, 'Angono', 1),
(1311, 66, 'Antipolo City', 1),
(1312, 66, 'Baras', 1),
(1313, 66, 'Binangonan', 1),
(1314, 66, 'Cainta', 1),
(1315, 66, 'Cardona', 1),
(1316, 66, 'Jala~Jala', 1),
(1317, 66, 'Morong', 1),
(1318, 66, 'Pililla', 1),
(1319, 66, 'Rodriguez', 1),
(1320, 66, 'San Mateo', 1),
(1321, 66, 'Tanay', 1),
(1322, 66, 'Taytay', 1),
(1323, 66, 'Teresa', 1),
(1324, 67, 'Alcantara', 1),
(1325, 67, 'Banton', 1),
(1326, 67, 'Cajidiocan', 1),
(1327, 67, 'Calatrava', 1),
(1328, 67, 'Concepcion', 1),
(1329, 67, 'Corcuera', 1),
(1330, 67, 'Ferrol', 1),
(1331, 67, 'Looc', 1),
(1332, 67, 'Magdiwang', 1),
(1333, 67, 'Odiongan', 1),
(1334, 67, 'Romblon', 1),
(1335, 67, 'San Agustin', 1),
(1336, 67, 'San Andres', 1),
(1337, 67, 'San Fernando', 1),
(1338, 67, 'San Jose', 1),
(1339, 67, 'Santa Fe', 1),
(1340, 67, 'Santa Maria', 1),
(1341, 69, 'Alabel', 1),
(1342, 69, 'Glan', 1),
(1343, 69, 'Kiamba', 1),
(1344, 69, 'Maasim', 1),
(1345, 69, 'Maitum', 1),
(1346, 69, 'Malapatan', 1),
(1347, 69, 'Malungon', 1),
(1348, 70, 'Enrique Villanueva', 1),
(1349, 70, 'Larena', 1),
(1350, 70, 'Lazi', 1),
(1351, 70, 'Maria', 1),
(1352, 70, 'San Juan', 1),
(1353, 70, 'Siquijor', 1),
(1354, 71, 'Barcelona', 1),
(1355, 71, 'Bulan', 1),
(1356, 71, 'Bulusan', 1),
(1357, 71, 'Casiguran', 1),
(1358, 71, 'Castilla', 1),
(1359, 71, 'Donsol', 1),
(1360, 71, 'Gubat', 1),
(1361, 71, 'Irosin', 1),
(1362, 71, 'Juban', 1),
(1363, 71, 'Magallanes', 1),
(1364, 71, 'Matnog', 1),
(1365, 71, 'Pilar', 1),
(1366, 71, 'Prieto Diaz', 1),
(1367, 71, 'Santa Magdalena', 1),
(1368, 71, 'Sorsogon City', 1),
(1369, 72, 'Banga', 1),
(1370, 72, 'General Santos City', 1),
(1371, 72, 'Koronadal City', 1),
(1372, 72, 'Lake Sebu', 1),
(1373, 72, 'Norala', 1),
(1374, 72, 'Polomolok', 1),
(1375, 72, 'Santo Nino', 1),
(1376, 72, 'Surallah', 1),
(1377, 72, 'Tampakan', 1),
(1378, 72, 'Tantangan', 1),
(1379, 72, 'Tupi', 1),
(1380, 73, 'Anahawan', 1),
(1381, 73, 'Bontoc', 1),
(1382, 73, 'Hinunangan', 1),
(1383, 73, 'Hinundayan', 1),
(1384, 73, 'Libagon', 1),
(1385, 73, 'Liloan', 1),
(1386, 73, 'Limasawa', 1),
(1387, 73, 'Maasin City', 1),
(1388, 73, 'Macrohon', 1),
(1389, 73, 'Malitbog', 1),
(1390, 73, 'Padre Burgos', 1),
(1391, 73, 'Pintuyan', 1),
(1392, 73, 'Saint Bernard', 1),
(1393, 73, 'San Francisco', 1),
(1394, 73, 'San Juan', 1),
(1395, 73, 'San Ricardo', 1),
(1396, 73, 'Silago', 1),
(1397, 73, 'Sogod', 1),
(1398, 73, 'Tomas Oppus', 1),
(1399, 74, 'Bagumbayan', 1),
(1400, 74, 'Columbio', 1),
(1401, 74, 'Esperanza', 1),
(1402, 74, 'Isulan', 1),
(1403, 74, 'Kalamansig', 1),
(1404, 74, 'Lambayong', 1),
(1405, 74, 'Lebak', 1),
(1406, 74, 'Lutayan', 1),
(1407, 74, 'Palimbang', 1),
(1408, 74, 'President Quirino', 1),
(1409, 74, 'Sen. Ninoy Aquino', 1),
(1410, 74, 'Tacurong City', 1),
(1411, 75, 'Hadji Panglima Tahil', 1),
(1412, 75, 'Indanan', 1),
(1413, 75, 'Jolo', 1),
(1414, 75, 'Kalingalan Caluang', 1),
(1415, 75, 'Lugus', 1),
(1416, 75, 'Luuk', 1),
(1417, 75, 'Maimbung', 1),
(1418, 75, 'Old Panamao', 1),
(1419, 75, 'Omar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ordered_products`
--

CREATE TABLE `ordered_products` (
  `ord_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` double NOT NULL,
  `total_price` double NOT NULL,
  `date_ordered` varchar(50) NOT NULL,
  `time_ordered` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_products`
--

INSERT INTO `ordered_products` (`ord_id`, `user_id`, `supplier_id`, `delivery_id`, `product_id`, `product_title`, `color`, `size`, `quantity`, `total_price`, `date_ordered`, `time_ordered`, `status`) VALUES
(1, 44, 19, 1, 93, 'Sweater Shirt', 'Gray', 'S', 3, 998.55, '2019-03-01', '11:20:36', 3),
(2, 45, 19, 2, 94, 'Gilas Pilipinas Shirt', 'Black', 'S', 1, 418.95, '2019-03-01', '13:32:30', 1),
(3, 45, 23, 3, 109, 'Penshoppe Mustard Dress', 'Yellow', 'S', 3, 3, '2019-03-01', '13:43:50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_transaction` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `order_currency` varchar(255) NOT NULL,
  `date_ordered` varchar(50) NOT NULL,
  `time_ordered` varchar(50) NOT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_transaction`, `order_status`, `order_currency`, `date_ordered`, `time_ordered`, `active`) VALUES
(11, 1664, '1', 'Completed', 'PHP', '2019-02-26', '19:37:29', 0),
(12, 524, '1', 'Completed', 'PHP', '2019-02-26', '19:41:28', 0),
(13, 1048, '1', 'Completed', 'PHP', '2019-02-27', '00:01:43', 0),
(14, 18639, '3', 'Completed', 'PHP', '2019-02-27', '23:59:39', 0),
(15, 333, '1', 'Completed', 'PHP', '2019-02-28', '00:02:17', 0),
(16, 1157, '1', 'Completed', 'PHP', '2019-02-28', '00:08:08', 0),
(17, 524, '1', 'Completed', 'PHP', '2019-02-28', '00:10:37', 0),
(18, 579, '1', 'Completed', 'PHP', '2019-02-28', '00:30:38', 0),
(19, 524, '1', 'Completed', 'PHP', '2019-02-28', '00:36:59', 0),
(20, 17068, '2', 'Completed', 'PHP', '2019-02-28', '01:09:34', 0),
(21, 1714, '2', 'Completed', 'PHP', '2019-02-28', '01:57:44', 0),
(22, 697, '2', 'Completed', 'PHP', '2019-02-28', '04:03:58', 0),
(23, 6504, '3', 'Completed', 'PHP', '2019-03-01', '07:43:52', 0),
(24, 666, '1', 'Completed', 'PHP', '2019-03-01', '09:48:53', 0),
(25, 999, '1', 'Completed', 'PHP', '2019-03-01', '11:20:36', 0),
(26, 419, '1', 'Completed', 'PHP', '2019-03-01', '13:32:30', 0),
(27, 3030, '1', 'Completed', 'PHP', '2019-03-01', '13:43:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `uc_id` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `commission` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `short_desc` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `date_created` date NOT NULL,
  `time_created` time NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_category_id`, `uc_id`, `product_price`, `commission`, `total_price`, `product_quantity`, `product_description`, `short_desc`, `product_image`, `supplier_id`, `company_name`, `date_created`, `time_created`, `active`) VALUES
(93, 'Sweater Shirt', 89, 12, 317, 5, 332.85, 87, '-Autumn Clothing Men\'s Long-sleeved T-shirt\r\n-Men\'s Short Sleeve man\r\n-Heat-tech round Neckline T-shirt\r\n-Trend Base Shirt\r\n-Cotton Sweater Clothes\r\n\r\nBrand: OEM', 'T-Shirt', 'Sweater Shirt.jpg', 19, 'Shop Buddy 2', '2019-02-26', '06:34:41', 1),
(94, 'Gilas Pilipinas Shirt', 89, 12, 399, 5, 418.95, 99, '-Affordable\r\n-Premium Quality\r\n-With Different Colors\r\n-Sporty\r\n-Affordable\r\n-Premium Quality\r\n-With Different Colors\r\n-Sporty\r\n-Cotton-Blend Fabric\r\n\r\nAvailable sizes.\r\n-S (27\"/19\") \r\n-M (28\"/20\") \r\n-L (29\"/21\") \r\n-XL (30\"/22\") \r\n-XXL (31\"23\")', 'T-shirt', 'gilas shirt.jpg', 19, 'Shop Buddy 2', '2019-02-26', '06:46:41', 1),
(95, 'Michael Jordan Shirt', 89, 12, 399, 5, 418.95, 100, '-Tshirt Quality: 100% Ring Spun Cotton\r\n-Cotton & Stretchable\r\n-Round Neck\r\n-Double needle sleeve and bottom hems\r\n-Compatible for Mens\r\n-Material Use in Print: Embossed Fabric-Like Texture\r\n-Digitally Printed', 'T-shirt', 'Jordan Shirt.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:01:41', 1),
(96, 'Nike Just Do It Shirt', 89, 12, 490, 5, 514.5, 93, '-100% Cotton\r\n-Made in Good Materials\r\n-Dry Function\r\n-Light weight\r\n-High Grade Fabric', 'T-shirt', 'Nike.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:10:41', 1),
(99, 'Maybelline 3in1 set', 10, 0, 99, 20, 118.8, 99, '-Maybelline ALLinALL.Mart 3in1 Mascara, Eyeliner and Powder\r\n-Mascara, Eyeliner and Powder set for that complete perfect look\r\n-Long Lasting colors\r\n-Waterproof\r\n-Dermatologist and Ophthalmologist Tested for safety\r\n-Lashblast 24HR\r\n-3in1 Mascara+Eyeliner+Powder', 'Mascara+Eyeliner+Powder', 'Maybelline.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:17:41', 1),
(100, 'Huawei Nova 3i 128GB- 4GB', 14, 17, 14990, 10, 16489, 47, '-Freebies may vary color\r\n-Display : 6.3 inches FHD+ 2340 x 1080, 409 PPI\r\n-2.5D Curved Glass\r\n-GPU :Mali-G51 w/ GPU Turbo Tech\r\n-OS : Android Oreo 8.1\r\n-HiSilicon Kirin 710 4x cortex a73 2.2ghz + 4x cortex a53 1.7ghz Octa-core\r\n-Dual Front Camera : 24MP+2MP\r\n-Dual Rear Camera : 16MP+2MP\r\n-Internal Storage : 128GBROM\r\n-micro SD card slot: support up to 256 GB\r\n-Memory : 4GB RAM\r\n-Battery : 3340 mAh non-removable\r\n-Micro USB, USB 2.0\r\n-Dual 4G, Dual-VoLTE\r\n-OTG USB Supported\r\n-Dual-SIM (nano, hybrid)\r\n-Fingerprint scanner\r\n-360 face unlock', 'Huawei Nova 3i', 'huawei-nova-3i-black-front_1.jpg', 9, 'Homeline', '2019-02-26', '07:29:41', 1),
(101, 'EB Advance Shade and Light Contour Palette', 10, 0, 395, 10, 434.5, 100, '-Nude\r\n\r\nBrand: Ever Bilena', 'Contour', 'Ever_Bilena_Advance_Shade_and_Light_Contour_Palette_L_1.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:35:41', 1),
(102, 'RYX SKINCERITY CLEANSER & SERUM SET', 10, 0, 520, 10, 572, 100, '- Prevent Breakouts\r\n- Controls Oilness Without Drying The Skin\r\n- Remove Deeper Seated Debris\r\n- Cleanse Pores\r\n- Exfoliates\r\n- Whitening\r\n- Pore Minimizer\r\n- Redness Relief\r\n- Hydration\r\n- Light & Fast Absorbing\r\n- Smoothing Fine Lines & Reducing Age Spots\r\n- Skin Repair', 'Cleanser & Serum', 'RYX.JPG', 19, 'Shop Buddy 2', '2019-02-26', '07:38:41', 1),
(103, 'Xiaomi Mi Pad 4', 14, 18, 10580, 10, 11638, 79, '-Xiaomi Mi Pad 4 3GB+32GB 8 Inch 13MP+5MP Android 8.1 6000mAh Wifi Version\r\n-The item we sold is global rom,if you upgrade to the MIUI 9 by yourself then apprear fastroot.We don\'t provide the warranty.If the official publish the lasted OS MIUI -9,Then you can upgrade it by yourself via OTA\r\n-8.0 inchestouchscreen\r\n-1920x1200 pixels\r\n-Qualcomm Snapdragon 660\r\n-2.2GHz octa-core\r\n-WIFI Edition: 3GB RAM+32GB ROM\r\n-Non-removable Li-Po 6000 mAh battery\r\n-AI Face Unlock feature\r\n-dual microphones, stereo speakers\r\n-f/2.0 cameras -- 5 megapixels on the front and 13 megapixels on the back\r\n-We need to break seal to install Google Play Store', 'Xiaomi Mi Pad 4', 'a4c8e6132238cb12ece3421f50e9e737.jpg', 9, 'Homeline', '2019-02-26', '08:29:41', 1),
(105, 'Suave Professionals Sleek Cream', 10, 27, 170, 10, 187, 58, '-Suave Professionals Sleek Cream 3.5oz\r\n-This lightweight cream, containing silk protein and vitamin E, helps smooth hair for all day frizz control.\r\n-Up to 100% frizz-free when using Sleek Shampoo Conditioner, and Anti-Frizz Cream\r\n-Meets CA and NY Clean Air Standards.', 'Suave Professionals Sleek Cream 3.5oz', 'suave_professionals_sleek_anti-frizz_cream_3.5_oz_new_look.jpeg', 9, 'Homeline', '2019-02-26', '08:33:41', 1),
(106, 'LSjewelry Zircon 14K Gold Money Capture Frog', 90, 23, 488, 7, 522.16, 100, '-Gold plated it will never fade, it is made from High Grade Quality Materials Good for all skin type (Hypoallergenic)\r\n\r\nMaterial: 316L Stainless Steel (Never Fade)\r\n-It is stainless Steel material, not alloy, stainless steel never fade color, and comfortable for your skin.\r\n\r\nCondition: Brand New\r\n-Perfect For Gifts, Party and Special Occassion.\r\n-Unique and Stylish design\r\n-Suitable for any occasion\r\n-Latest design\r\n-Ideal for gift\r\n-Due to different computer monitors/calibrations colors may vary slightly from the picture.\r\n\r\nNecklace, Earrings, Rings 3in1 Jewelry Set', '3in1 Jewelry Set', 'jewelries.jpg', 19, 'Shop Buddy 2', '2019-02-26', '08:36:41', 1),
(107, 'Couple G-Shock (OEM)', 90, 24, 3099, 10, 3408.9, 100, '-(GA110 & BA110 Black Gold )\r\n-Stainless Back Case & Buckle\r\n-Resin Rubber Strap\r\n-Water Resistant 50 Meters\r\n-Thailand Assembled\r\n-China Movement (JAPAN Version)\r\n-Not Authentic. OEM only.\r\n-In-House 6 mos. Warranty.\r\n-GA110 -Autolight Option\r\n-BA110- Autolight Option\r\n-Chronograph\r\n-Stop Watch\r\n-Alarms\r\n-World Time\r\n-Dual Time Display\r\n-Calendar\r\n-LED Backlight', 'Watches', 'Jam-Tangan-G-shock-Couple-Baby-G-couple.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:33:53', 1),
(108, 'Anti Radiation Unisex Glass', 90, 25, 189, 6, 200.34, 0, '-A factory direct shop for Eye wears. We supply the most trendy designs with an affordable and reasonable price.\r\n-Anti-Radiation Lenses\r\n-Replaceable Lens\r\n-Disclaimer:Some optical shops might refuse the lens replacement of your frame. Some shops have a policy of prioritizing their product but rest assured that there are other optical shops or even a skilled optocian would be glad to replace.\r\n\r\nMFSunnies Computer Anti Radiation/Blue light Replaceable Full metal unisex eyeglass #3018', 'Eyeglass', 'anti radiation glass.jpg', 19, 'Shop Buddy 2', '2019-02-26', '07:33:53', 1),
(109, 'Penshoppe Mustard Dress', 89, 13, 1000, 1, 1010, 97, 'Regular Fit\r\nCircular Knit\r\nRibbed\r\nAbove knee\r\nShort sleeve\r\nWith wrap front', 'Penshoppe Mustard Dress', 'mustard dress.jpg', 23, 'Jams clothing', '2019-03-01', '13:39:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `pc_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `add_id` int(11) NOT NULL,
  `province` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`add_id`, `province`, `price`, `active`) VALUES
(1, 'Abra', 350, 1),
(2, 'Agusan Del Norte', 600, 1),
(3, 'Agusan del Sur', 600, 1),
(4, 'Aklan  ', 500, 1),
(5, 'Albay ', 350, 1),
(6, 'Antique                ', 500, 1),
(7, 'Apayao', 350, 1),
(8, 'Aurora', 350, 1),
(9, 'Basilan', 600, 1),
(10, 'Bataan', 350, 1),
(11, 'Batanes', 400, 1),
(12, 'Batangas', 350, 1),
(13, 'Benguet', 350, 1),
(14, 'Biliran', 500, 1),
(15, 'Bohol', 500, 1),
(16, 'Bukidnon', 600, 1),
(17, 'Bulacan', 100, 1),
(18, 'Cagayan', 350, 1),
(19, 'Camarines Norte', 350, 1),
(20, 'Camarines Sur', 350, 1),
(21, 'Camiguin', 600, 1),
(22, 'Capiz', 500, 1),
(23, 'Cataduanes', 500, 1),
(24, 'Cavite', 350, 1),
(25, 'Cebu', 500, 1),
(26, 'Compostela Valley', 600, 1),
(27, 'Cotabato', 600, 1),
(28, 'Davao Del Norte', 600, 1),
(29, 'Davao Del Sur', 600, 1),
(30, 'Davao Occidental', 600, 1),
(31, 'Davao Oriental', 600, 1),
(32, 'Dinagat Island', 600, 1),
(33, 'Estern Samar', 500, 1),
(34, 'Guimaras', 500, 1),
(35, 'Ifugao', 350, 1),
(36, 'locos Norte', 350, 1),
(37, 'Ilocos Sur', 350, 1),
(38, 'Iloilo', 500, 1),
(39, 'Isabela', 350, 1),
(40, 'Kalinga', 350, 1),
(41, 'La Union', 350, 1),
(42, 'Laguna', 350, 1),
(43, 'Lanao Del Norte', 600, 1),
(44, 'Lanao Del Sur', 600, 1),
(45, 'Leyte', 500, 1),
(46, 'Maguindanao', 600, 1),
(47, 'Marinduque', 350, 1),
(48, 'Masbate', 350, 1),
(49, 'Metro Manila', 200, 1),
(50, 'Misamis Occidental', 600, 1),
(51, 'Misamis Oriental', 500, 1),
(52, 'Mountain Provice', 350, 1),
(53, 'Negros Occidental', 500, 1),
(54, 'Negros Oriental', 500, 1),
(55, 'North Cotobato', 600, 1),
(56, 'Northern Samar', 500, 1),
(57, 'Nueva Ecija', 350, 1),
(58, 'Nueva Vizcaya', 350, 1),
(59, 'Occidetal Mindoro', 350, 1),
(60, 'Oriental Mindoro', 350, 1),
(61, 'Palawan', 400, 1),
(62, 'Pampanga', 350, 1),
(63, 'Pangasinan', 350, 1),
(64, 'Quezon', 350, 1),
(65, 'Quirino', 350, 1),
(66, 'Rizal', 350, 1),
(67, 'Romblon', 350, 1),
(68, 'Samar', 500, 1),
(69, 'Sarangani', 600, 1),
(70, 'Siquijor', 500, 1),
(71, 'Sorsogon', 350, 1),
(72, 'South Cotabato', 600, 1),
(73, 'Southern Leyte', 500, 1),
(74, 'Sultan Kudarat', 600, 1),
(75, 'Sulu', 600, 1),
(76, 'Surigao Del Norte', 600, 1),
(77, 'Surigao Del Sur', 600, 1),
(78, 'Tarlac', 350, 1),
(79, 'Tawi-tawi', 600, 1),
(80, 'Western Samar', 500, 1),
(81, 'Zambales', 350, 1),
(82, 'Zambaoanga Del Norte', 600, 1),
(83, 'Zamboanga Del Sur', 600, 1),
(84, 'Zamboanga Sibugay', 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_price` float NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `size_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `supplier_id`, `size_name`) VALUES
(5, 0, 'S'),
(6, 0, 'M'),
(7, 0, 'L'),
(8, 0, 'XL'),
(9, 0, 'XXL'),
(10, 0, 'XXXL');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `slide_id` int(11) NOT NULL,
  `slide_title` varchar(255) NOT NULL,
  `slide_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email_address` text NOT NULL,
  `contact_number` text NOT NULL,
  `address` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `picture` varchar(255) NOT NULL,
  `validation_code` text NOT NULL,
  `active` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `company_name`, `email_address`, `contact_number`, `address`, `username`, `password`, `picture`, `validation_code`, `active`) VALUES
(9, 'Homeline', 'shopbuddy@gmail.com', '09051560423', '123', 'shopbud', '202cb962ac59075b964b07152d234b70', '', '0', 1),
(10, 'Laz A Da', 'asd@yahoo.com', '09051560423', '123', 'reyesjay', '202cb962ac59075b964b07152d234b70', '', '0', 1),
(18, 'Shop Buddy 1', 'jjreyes055@gmail.com', '09355347864', '123', '123', '202cb962ac59075b964b07152d234b70', '', '0', 1),
(19, 'Shop Buddy 2', 'jeegsaw04@gmail.com', '09355347864', 'asdasdasd', 'SI 123', '202cb962ac59075b964b07152d234b70', '', '0', 1),
(22, 'Baggers', 'ycongirish@gmail.com', '09759067512', 'Sto nino', 'Irishycong', '202cb962ac59075b964b07152d234b70', '', '0', 1),
(23, 'Jams clothing', 'joannamjamero@gmail.com', '09355347864', 'Blk 16 Lot 34 Brgy Mapulang Lupa Pandi ', 'jams', '202cb962ac59075b964b07152d234b70', '', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temporder`
--

CREATE TABLE `temporder` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_total_price` double NOT NULL,
  `product_quantity` double NOT NULL,
  `quantity` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `size` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temporder`
--

INSERT INTO `temporder` (`order_id`, `product_id`, `product_title`, `product_price`, `product_total_price`, `product_quantity`, `quantity`, `user_id`, `product_image`, `supplier_id`, `color`, `size`) VALUES
(4, 93, 'Sweater Shirt', 332.85, 332.85, 89, 1, 45, 'Sweater Shirt.jpg', 19, 'Gray', 'S'),
(5, 93, 'Sweater Shirt', 332.85, 332.85, 88, 1, 44, 'Sweater Shirt.jpg', 19, 'Gray', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `under_categories`
--

CREATE TABLE `under_categories` (
  `uc_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `uc_name` varchar(50) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `under_categories`
--

INSERT INTO `under_categories` (`uc_id`, `cat_id`, `uc_name`, `active`) VALUES
(12, 89, 'Men', 1),
(13, 89, 'Women', 1),
(17, 14, 'Mobiles', 1),
(18, 14, 'Tablets', 1),
(19, 14, 'Cameras', 1),
(20, 14, 'Computer', 1),
(23, 90, 'Jewelries', 1),
(24, 90, 'Watches', 1),
(25, 90, 'Shades', 1),
(26, 10, 'women', 1),
(27, 10, 'men', 1),
(28, 90, 'Necklace', 1);

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `ps_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`ps_id`, `supplier_id`, `variation_name`, `product_id`, `type`, `active`) VALUES
(21, 10, 'M', 87, 'S', 1),
(22, 19, 'M', 56, 'S', 1),
(24, 19, 'XXXL', 56, 'S', 1),
(26, 22, 'S', 89, 'S', 1),
(27, 22, 'M', 89, 'S', 1),
(28, 19, 'XXL', 56, 'S', 1),
(30, 19, 'S', 56, 'S', 1),
(31, 19, 'XL', 56, 'S', 1),
(46, 19, 'XXXL', 56, 'S', 1),
(47, 19, 'Black', 56, 'C', 1),
(48, 19, 'M', 56, 'S', 1),
(49, 19, 'S', 89, 'S', 1),
(50, 19, 'M', 89, 'S', 1),
(51, 19, 'L', 89, 'S', 1),
(52, 19, 'Yellow', 89, 'C', 1),
(53, 19, 'M', 90, 'S', 1),
(54, 19, 'L', 90, 'S', 1),
(55, 19, 'XL', 90, 'S', 1),
(56, 19, 'Red', 90, 'C', 1),
(57, 19, 'Blue', 90, 'C', 1),
(58, 19, 'Green', 90, 'C', 1),
(59, 19, 'S', 93, 'S', 1),
(60, 19, 'M', 93, 'S', 1),
(61, 19, 'L', 93, 'S', 1),
(62, 19, 'XL', 93, 'S', 1),
(63, 19, 'Gray', 93, 'C', 1),
(64, 19, 'Black', 93, 'C', 1),
(65, 19, 'XL', 92, 'S', 1),
(66, 19, 'XXL', 92, 'S', 1),
(67, 19, 'L', 92, 'S', 1),
(68, 19, 'Red Flower', 90, 'C', 1),
(69, 19, 'Blue Flower', 90, 'C', 1),
(70, 19, 'White', 90, 'C', 1),
(71, 19, 'Black', 90, 'C', 1),
(72, 19, 'White', 93, 'C', 1),
(73, 19, 'Blue', 92, 'C', 1),
(74, 19, 'S', 94, 'S', 1),
(75, 19, 'M', 94, 'S', 1),
(76, 19, 'L', 94, 'S', 1),
(77, 19, 'XL', 94, 'S', 1),
(78, 19, 'XXL', 94, 'S', 1),
(79, 19, 'Black', 94, 'C', 1),
(80, 19, 'Red', 94, 'C', 1),
(81, 19, 'Blue', 94, 'C', 1),
(82, 19, 'White', 94, 'C', 1),
(83, 19, 'S', 95, 'S', 1),
(84, 19, 'M', 95, 'S', 1),
(85, 19, 'L', 95, 'S', 1),
(86, 19, 'XXL', 95, 'S', 1),
(88, 19, 'Black', 95, 'C', 1),
(89, 19, 'S', 96, 'S', 1),
(90, 19, 'M', 96, 'S', 1),
(91, 19, 'L', 96, 'S', 1),
(92, 19, 'XL', 96, 'S', 1),
(94, 19, 'Black', 96, 'C', 1),
(95, 19, 'White', 96, 'C', 1),
(96, 19, 'White', 96, 'C', 1),
(97, 19, 'Yellow', 89, 'C', 1),
(100, 19, 'Yellow', 89, 'C', 1),
(101, 19, 'XXXL', 96, 'S', 1),
(102, 19, 'XXXL', 96, 'S', 1),
(103, 23, 'S', 109, 'S', 1),
(104, 23, 'Yellow', 109, 'C', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`delivery_id`);

--
-- Indexes for table `municipality`
--
ALTER TABLE `municipality`
  ADD PRIMARY KEY (`mn_id`);

--
-- Indexes for table `ordered_products`
--
ALTER TABLE `ordered_products`
  ADD PRIMARY KEY (`ord_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`add_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slide_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temporder`
--
ALTER TABLE `temporder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `under_categories`
--
ALTER TABLE `under_categories`
  ADD PRIMARY KEY (`uc_id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`ps_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `delivery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `municipality`
--
ALTER TABLE `municipality`
  MODIFY `mn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1420;

--
-- AUTO_INCREMENT for table `ordered_products`
--
ALTER TABLE `ordered_products`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `temporder`
--
ALTER TABLE `temporder`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `under_categories`
--
ALTER TABLE `under_categories`
  MODIFY `uc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
