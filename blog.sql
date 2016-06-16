-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2016 at 06:06 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comm` int(5) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `comm_date` int(11) NOT NULL,
  `id_user` int(5) DEFAULT NULL,
  `id_post` int(5) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `comm_status` int(5) NOT NULL,
  PRIMARY KEY (`id_comm`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id_comm`, `text`, `comm_date`, `id_user`, `id_post`, `name`, `email`, `comm_status`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus leo id tellus. ', 1466091793, 1, 8, 'admin', 'mail@mail.com', 0),
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus leo id tellus. ', 1466091797, 1, 8, 'admin', 'mail@mail.com', 0),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus leo id tellus. ', 1466091800, 1, 8, 'admin', 'mail@mail.com', 0),
(4, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092675, 1, 9, 'admin', 'mail@mail.com', 0),
(5, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092679, 1, 9, 'admin', 'mail@mail.com', 0),
(6, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092682, 1, 9, 'admin', 'mail@mail.com', 0),
(7, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092693, 1, 8, 'admin', 'mail@mail.com', 0),
(8, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092696, 1, 8, 'admin', 'mail@mail.com', 0),
(9, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092699, 1, 8, 'admin', 'mail@mail.com', 0),
(10, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092715, 1, 7, 'admin', 'mail@mail.com', 0),
(11, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092718, 1, 7, 'admin', 'mail@mail.com', 0),
(12, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092720, 1, 7, 'admin', 'mail@mail.com', 0),
(13, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092727, 1, 7, 'admin', 'mail@mail.com', 0),
(14, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092738, 1, 6, 'admin', 'mail@mail.com', 0),
(15, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092741, 1, 6, 'admin', 'mail@mail.com', 0),
(16, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092743, 1, 6, 'admin', 'mail@mail.com', 0),
(17, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092855, 1, 4, 'admin', 'mail@mail.com', 0),
(18, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092857, 1, 4, 'admin', 'mail@mail.com', 0),
(19, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092860, 1, 4, 'admin', 'mail@mail.com', 0),
(20, 'PELLENTESQUE LOBORTIS CONDIMENTUM SAPIEN, NON TEMPOR SEM ELEMENTUM QUIS. DONEC PORTA, MASSA EU SUSCIPIT VOLUTPAT, LIBERO TELLUS ELEIFEND NIBH, A LACINIA RISUS L', 1466092862, 1, 4, 'admin', 'mail@mail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `categorie` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `link`, `categorie`) VALUES
(1, 'Home', '', 0),
(2, 'Category1', 'categories/show/2', 1),
(3, 'Category2', 'categories/show/3', 1),
(4, 'Category3', 'categories/show/4', 1),
(6, 'Category4', 'categories/show/6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id_picture` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_picture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(5) NOT NULL AUTO_INCREMENT,
  `subject` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `post_date` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `categorie` int(50) NOT NULL,
  `post_status` int(5) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id_post`, `subject`, `about`, `text`, `cover`, `post_date`, `id_user`, `categorie`, `post_status`) VALUES
(1, 'Lorem ipsum dolor sit ame', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus leo id tellus.', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092021, 1, 2, 1),
(2, 'Lorem ipsum dolor sit ame', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus leo id tellus.', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466091963, 1, 2, 1),
(3, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092080, 1, 3, 1),
(4, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092097, 1, 2, 1),
(5, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092114, 1, 3, 1),
(6, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092134, 1, 3, 1),
(7, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092158, 1, 4, 1),
(8, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Lorem ipsum dolor sit amet, Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	adipiscing elit. Morbi dictum, lacus sed vestibulum gravida, enim quam malesuada mi, sollicitudin malesuada mi ipsum a erat. Vestibulum lectus ligula, posuere eu efficitur at, fermentum nec nibh. Vestibulum accumsan lacinia augue sed posuere. Nunc dictum dapibus nunc, eu vulputate libero posuere eget. Duis et libero neque. Aliquam facilisis molestie erat. Morbi nisl nisi, consequat at varius sed, tincidunt nec diam. Vivamus sit amet eros arcu. Cras massa eros, pellentesque at pretium sed, dapibus quis velit. Mauris sodales erat sed mattis fermentum. Praesent faucibus feugiat dignissim. Etiam quis neque vel est sagittis so', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092173, 1, 6, 1),
(9, 'Pellentesque lobortis con', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l	Pellentesque lobortis condimentum sapien, non tempor sem elementum quis. Donec porta, massa eu suscipit volutpat, libero tellus eleifend nibh, a lacinia risus l', 'images/user_picture/Broccolini-Construction-Offices-by-Rubin-et-Rotman-Architectes-Montreal-Canada.jpg', 1466092243, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_picture`
--

CREATE TABLE IF NOT EXISTS `post_picture` (
  `id_post` int(5) NOT NULL,
  `id_picture` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_picture`
--

INSERT INTO `post_picture` (`id_post`, `id_picture`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(4, 1),
(4, 2),
(4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(5) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(5) NOT NULL,
  `user_status` int(2) NOT NULL,
  `picture` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`, `role`, `user_status`, `picture`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'mail@mail.com', 1, 1, 'images/user_picture/user.jpg'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'proba@gmail.com', 2, 1, 'images/user_picture/user.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id_video` int(5) NOT NULL AUTO_INCREMENT,
  `id_post` int(5) NOT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_post`, `link`) VALUES
(1, 4, 'https://www.youtube.com/embed/5zqTI6S-pMI'),
(2, 5, 'https://www.youtube.com/embed/5zqTI6S-pMI');

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE IF NOT EXISTS `voting` (
  `id_vote` int(5) NOT NULL AUTO_INCREMENT,
  `id_post` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  PRIMARY KEY (`id_vote`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=104 ;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`id_vote`, `id_post`, `id_user`) VALUES
(1, 7, 1),
(2, 8, 2),
(3, 0, 0),
(4, 0, 0),
(5, 0, 0),
(6, 0, 0),
(7, 0, 0),
(8, 0, 1),
(9, 0, 1),
(10, 0, 0),
(11, 0, 0),
(12, 7, 0),
(13, 8, 0),
(14, 8, 0),
(15, 8, 0),
(16, 8, 0),
(17, 8, 0),
(18, 8, 0),
(19, 8, 0),
(20, 8, 0),
(21, 8, 1),
(22, 8, 1),
(23, 8, 1),
(24, 8, 1),
(25, 8, 1),
(26, 8, 1),
(27, 0, 1),
(28, 8, 1),
(29, 8, 1),
(30, 8, 1),
(31, 8, 1),
(32, 8, 1),
(33, 8, 1),
(34, 8, 1),
(35, 8, 1),
(36, 8, 1),
(37, 7, 1),
(38, 7, 1),
(39, 7, 1),
(40, 7, 1),
(41, 7, 1),
(42, 7, 1),
(43, 0, 1),
(44, 9, 1),
(45, 9, 1),
(46, 9, 1),
(47, 9, 1),
(48, 9, 1),
(49, 9, 1),
(50, 9, 1),
(51, 9, 0),
(52, 8, 0),
(53, 6, 0),
(54, 6, 0),
(55, 6, 0),
(56, 6, 0),
(57, 6, 0),
(58, 6, 0),
(59, 6, 0),
(60, 6, 0),
(61, 6, 0),
(62, 6, 0),
(63, 6, 0),
(64, 6, 0),
(65, 6, 0),
(66, 6, 0),
(67, 9, 1),
(68, 9, 1),
(69, 8, 1),
(70, 8, 0),
(71, 9, 0),
(72, 8, 0),
(73, 8, 0),
(74, 8, 0),
(75, 8, 0),
(76, 8, 0),
(77, 8, 0),
(78, 8, 0),
(79, 8, 0),
(80, 8, 0),
(81, 8, 0),
(82, 8, 0),
(83, 8, 0),
(84, 8, 0),
(85, 8, 0),
(86, 8, 0),
(87, 8, 0),
(88, 8, 0),
(89, 8, 0),
(90, 9, 0),
(91, 8, 0),
(92, 8, 0),
(93, 8, 1),
(94, 9, 0),
(95, 4, 0),
(96, 4, 0),
(97, 4, 0),
(98, 9, 0),
(99, 8, 0),
(100, 8, 0),
(101, 6, 1),
(102, 10, 1),
(103, 8, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
