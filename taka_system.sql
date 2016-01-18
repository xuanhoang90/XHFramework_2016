-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2016 at 07:49 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `taka_system`
--
CREATE DATABASE IF NOT EXISTS `taka_system` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `taka_system`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE IF NOT EXISTS `admin_data` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `company` text COLLATE utf8_unicode_ci NOT NULL,
  `avatar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`name`, `email`, `company`, `avatar`) VALUES
('Xuân Hoàng', 'nevergiveup.xuanhoang@gmail.com', 'TAKA', 1),
('Xuân Hoàng', 'nevergiveup.xuanhoang@gmail.com', 'TAKA', 1),
('Xuân Hoàng', 'nevergiveup.xuanhoang@gmail.com', 'TAKA', 1),
('Xuân Hoàng', 'nevergiveup.xuanhoang@gmail.com', 'TAKA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` double NOT NULL AUTO_INCREMENT,
  `object_id` double NOT NULL,
  `parent_id` double NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `liked` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `liked_data` text COLLATE utf8_unicode_ci NOT NULL,
  `unliked` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unliked_data` text COLLATE utf8_unicode_ci NOT NULL,
  `post_by` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`) VALUES
('main_menu', ''),
('theme', 'tpl-02'),
('main_menu', ''),
('theme', 'tpl-02'),
('main_menu', ''),
('theme', 'tpl-02');

-- --------------------------------------------------------

--
-- Table structure for table `cp_history`
--

CREATE TABLE IF NOT EXISTS `cp_history` (
  `id` double NOT NULL AUTO_INCREMENT,
  `member` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employ`
--

CREATE TABLE IF NOT EXISTS `employ` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `security` text COLLATE utf8_unicode_ci NOT NULL,
  `image` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employ`
--

INSERT INTO `employ` (`id`, `name`, `display_name`, `password`, `permission`, `email`, `security`, `image`) VALUES
(1, 'employ', 'Xuân Hoàng', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'full', 'info@hoang.taka.com', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE IF NOT EXISTS `follow` (
  `id` double NOT NULL AUTO_INCREMENT,
  `object_id` double NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` double NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `link` text COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `object`
--

CREATE TABLE IF NOT EXISTS `object` (
  `id` double NOT NULL AUTO_INCREMENT,
  `parent` double NOT NULL,
  `type` int(11) NOT NULL,
  `viewed` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` double NOT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `object_desciption`
--

CREATE TABLE IF NOT EXISTS `object_desciption` (
  `id` double NOT NULL AUTO_INCREMENT,
  `object_id` double NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `object_description`
--

CREATE TABLE IF NOT EXISTS `object_description` (
  `id` double NOT NULL AUTO_INCREMENT,
  `object_id` double NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` double NOT NULL AUTO_INCREMENT,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_description`
--

CREATE TABLE IF NOT EXISTS `page_description` (
  `id` double NOT NULL AUTO_INCREMENT,
  `page_id` double NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` double NOT NULL AUTO_INCREMENT,
  `object_id` double NOT NULL,
  `base_price` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` double NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `object_type` int(11) NOT NULL,
  `object_id` double NOT NULL,
  `lang_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `web_data`
--

CREATE TABLE IF NOT EXISTS `web_data` (
  `id` double NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `database` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `web_data`
--

INSERT INTO `web_data` (`id`, `domain`, `admin_name`, `admin_pwd`, `hint`, `database`, `size`, `folder`, `startdate`, `date_end`) VALUES
(12, 'http://multisite.taka.com', 'xuanhoang', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'hoang', 'taka__hoang_taka_com', '300', 'data__hoang_taka_com', '2015-09-11 03:28:26', '0000-00-00 00:00:00'),
(13, 'http://mtbweb.com', 'xuanhoang', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'hoang', 'taka__mtbweb_com', '100', 'data__mtbweb_com', '2015-09-11 03:28:26', '0000-00-00 00:00:00'),
(14, 'test.abc.com', 'acasdasdsad', 'bff149a0b87f5b0e00d9dd364e9ddaa0', 'asdasdas', 'taka__', '100', 'data__', '2015-09-29 19:12:40', '0000-00-00 00:00:00'),
(15, 'http://helohoang.com', 'asdasd', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', 'taka__helohoang_com', '123', 'data__helohoang_com', '2015-09-29 19:22:05', '0000-00-00 00:00:00'),
(16, 'http://helohoang.com.vn', 'dasdad', 'a8f5f167f44f4964e6c998dee827110c', 'asdasd', 'taka__helohoang_com_vn', '123', 'data__helohoang_com_vn', '2015-09-29 19:23:07', '0000-00-00 00:00:00'),
(17, 'http://helohoang1.com', 'sdasd', 'c99a11a53a3748269e3f86d7ac38df11', 'sadasd', 'taka__helohoang1_com', '123', 'data__helohoang1_com', '2015-09-29 19:40:07', '0000-00-00 00:00:00'),
(18, 'http://demotaka.com', 'xuanhoang', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'hoang', 'taka__demotaka_com', '50', 'data__demotaka_com', '2015-09-29 19:41:14', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
