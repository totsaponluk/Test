-- phpMyAdmin SQL Dump
-- version 3.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 08, 2011 at 07:11 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `job1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(45) collate utf8_unicode_ci default NULL,
  `password` varchar(45) collate utf8_unicode_ci default NULL,
  `email` varchar(225) collate utf8_unicode_ci default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'totsapon', '47290790', 'totsaponk@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE IF NOT EXISTS `ads` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(225) collate utf8_unicode_ci NOT NULL,
  `link` varchar(225) collate utf8_unicode_ci NOT NULL,
  `picture` varchar(225) collate utf8_unicode_ci NOT NULL,
  `width` varchar(10) collate utf8_unicode_ci NOT NULL,
  `height` varchar(10) collate utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `title`, `link`, `picture`, `width`, `height`, `status`) VALUES
(1, ' Ad. 1( 592 x 85 )', 'http://www.google.co.com', '4e0c2fc5e98e9', '', '', 1),
(2, 'Ad. 2 ( 410 x 50 )', 'http://www.mthai.com', '', '', '', 1),
(3, 'Ad. 3 ( 200 x 40 )', '', '', '', '', 1),
(4, 'Ad. 4 ( 200 x 40 )', '', '', '', '', 1),
(5, 'Ad. 5 ( 300 x 40 )', '', '', '', '', 1),
(6, 'Ad. 6 ( 80 x 80 )', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advisors`
--

CREATE TABLE IF NOT EXISTS `advisors` (
  `id` int(11) NOT NULL auto_increment,
  `picture` varchar(225) collate utf8_unicode_ci default NULL,
  `name` varchar(225) collate utf8_unicode_ci default NULL,
  `career` text collate utf8_unicode_ci,
  `affliation` text collate utf8_unicode_ci,
  `pr` text collate utf8_unicode_ci,
  `introduce` text collate utf8_unicode_ci NOT NULL,
  `email` varchar(225) collate utf8_unicode_ci default NULL,
  `create_at` datetime default NULL,
  `update_at` datetime default NULL,
  `status` tinyint(4) default NULL,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`categories_id`),
  KEY `fk_advisors_categories` (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `advisors`
--

INSERT INTO `advisors` (`id`, `picture`, `name`, `career`, `affliation`, `pr`, `introduce`, `email`, `create_at`, `update_at`, `status`, `categories_id`) VALUES
(5, NULL, 'asdasd', '', '', '', '', '', '2011-06-28 05:40:46', '2011-06-28 05:40:46', NULL, 1),
(6, NULL, 'wrwerwr', 'wrwrwer', '', '', '', '', '2011-06-28 05:41:26', '2011-06-28 05:41:26', NULL, 1),
(7, NULL, 'ddddddddddd', 'fsdfsf', '', '', '', '', '2011-06-28 05:44:01', '2011-06-28 05:44:01', NULL, 1),
(10, NULL, '', '', '', '', '', '', '2011-06-28 06:10:49', '2011-06-28 06:10:49', NULL, 1),
(11, NULL, 'dddffff', '', '', '', '', '', '2011-06-28 06:35:30', '2011-06-28 06:35:30', NULL, 1),
(12, NULL, 'ddsasdasd', '', '', '', '', '', '2011-06-28 06:42:01', '2011-06-28 06:42:01', NULL, 1),
(13, '4e09cd074ed7eDSC00010.jpg', 'กระต่าย', '', '', '', '', '', '2011-06-28 06:50:17', '2011-06-28 07:45:59', NULL, 1),
(14, '4e09c790e2df7DSC00001.jpg', '', '', '', '', '', '', '2011-06-28 06:54:49', '2011-06-28 07:22:40', NULL, 1),
(15, '4e0afb86115b9no-image2.png', 'cartoon ci', '    登録企業リストを見る登録企業リストを見る\n    登録企業リストを見る登録企業リストを見る\n    登録企業リストを見る登録企業リストを見る\n\n翻訳・通訳\n氏名：小堤　一郎\n所属：Ohmi Corporation Co., Ltd.\n経歴：東京工業大学化学工学卒。日揮（株）原子力事業本部。タイで翻訳、通訳会社経営。1994年タイ商務省からビジネスマンオブザイヤー受賞。\n', 'ram 2', 'i''m tooood', 'introduce test', '', '2011-06-28 07:19:35', '2011-07-08 02:25:24', NULL, 2),
(16, '4e09c72343525DSC00007.JPG', '', '', '', '', '', '', '2011-06-28 07:20:51', '2011-06-28 07:20:51', NULL, 1),
(17, '4e09c72e23bf7DSC00003.JPG', 'totsapon', '', 'affliation', 'prrdsflja;lsdjf;ajdf', '', 'totsaponk@gmail.com', '2011-06-28 07:21:02', '2011-06-28 11:50:12', NULL, 2),
(18, '4e09c78119780DSC00007.JPG', '', '', '', '', '', '', '2011-06-28 07:22:25', '2011-06-28 07:22:25', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `business_types`
--

CREATE TABLE IF NOT EXISTS `business_types` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(225) collate utf8_unicode_ci default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `business_types`
--

INSERT INTO `business_types` (`id`, `name`, `status`) VALUES
(1, '翻訳・通訳', NULL),
(2, '会社設立・ビザ・会計', NULL),
(3, '仕入れサポート・業務代行', NULL),
(4, '法律事務所', NULL),
(5, 'イベント・企画', NULL),
(6, '人材紹介', NULL),
(7, '不動産', NULL),
(8, '市場調査・マーケティング', NULL),
(9, 'コンピュータ', NULL),
(10, '広告・デザイン', NULL),
(11, '印刷', NULL),
(12, 'エアチケット', NULL),
(13, 'レンタカー', NULL),
(14, 'レンタルオフィス', NULL),
(15, '工場・プラント設計', NULL),
(16, 'リース', NULL),
(17, '運送・通関', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(225) collate utf8_unicode_ci default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(1, 'testtttt', NULL),
(2, 'dddddd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL auto_increment,
  `logo` varchar(225) collate utf8_unicode_ci default NULL,
  `pic1` varchar(225) collate utf8_unicode_ci NOT NULL,
  `pic2` varchar(225) collate utf8_unicode_ci NOT NULL,
  `name` mediumtext collate utf8_unicode_ci,
  `director_name` varchar(225) collate utf8_unicode_ci default NULL,
  `capital` varchar(225) collate utf8_unicode_ci default NULL,
  `establish` varchar(225) collate utf8_unicode_ci default NULL,
  `address` varchar(225) collate utf8_unicode_ci default NULL,
  `seals_point` text collate utf8_unicode_ci,
  `business_detail` text collate utf8_unicode_ci,
  `create_at` datetime default NULL,
  `update_at` datetime default NULL,
  `email` varchar(225) collate utf8_unicode_ci default NULL,
  `business_types_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`business_types_id`),
  KEY `fk_companies_business_types1` (`business_types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `logo`, `pic1`, `pic2`, `name`, `director_name`, `capital`, `establish`, `address`, `seals_point`, `business_detail`, `create_at`, `update_at`, `email`, `business_types_id`) VALUES
(1, '4e0aa400d6dc0banner.jpg', '', '', 'test', 'director name', 'capital', 'establish', '151/2 สุขุมวิทย์ ซอยไรดี', 'seals point', 'business detail', '2011-06-27 21:59:56', '2011-06-28 23:03:12', 'email@email.com', 3),
(2, '4e09ea7584d48DSC00007.JPG', '', '', 'sdf', '', '', '', '', '', '', '2011-06-28 09:51:33', '2011-06-28 09:51:33', '', 1),
(3, '4e16ad0d8679c', '4e16ae9a20366', '4e16ae9a21298', 'giglo', 'director name', 'เงินทุน', 'จัดตั้ง', '151/2 สุขุมวิทย์ ซอยไรดี', 'seals points', 'business detail', '2011-06-28 23:49:39', '2011-07-08 02:15:38', '', 16);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(225) collate utf8_unicode_ci default NULL,
  `content` text collate utf8_unicode_ci,
  `create_at` datetime default NULL,
  `update_at` datetime default NULL,
  `status` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `create_at`, `update_at`, `status`) VALUES
(1, 'ผลโพลเพื่อไทยชนะขาด!!!', 'ผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาดผลโพลเพื่อไทยชนะขาด', '2011-06-27 11:04:36', '2011-06-27 11:10:42', NULL),
(4, 'ระแวง', 'ระวัง', '2011-06-27 11:57:42', '2011-06-27 11:57:42', NULL),
(5, 'สวัดดีชาวโลก', '<p>\n	<span style="color:#ff0000;">ดกดอำกดอกอ</span></p>\n', '2011-06-28 10:10:25', '2011-06-28 10:10:25', NULL),
(6, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:55:07', '2011-06-28 10:55:07', NULL),
(7, 'ผลโพลเพื่อไทยชนะขาด!!!', 'ผลโพลเพื่อไทยชนะขาด!!!', '2011-06-28 10:55:17', '2011-06-28 10:55:17', NULL),
(8, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:55:27', '2011-06-28 10:55:27', NULL),
(9, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:55:37', '2011-06-28 10:55:37', NULL),
(10, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:55:50', '2011-06-28 10:55:50', NULL),
(11, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:56:04', '2011-06-28 10:56:04', NULL),
(12, 'ผลโพลเพื่อไทยชนะขาด!!!', '<p>\n	ผลโพลเพื่อไทยชนะขาด!!!</p>\n', '2011-06-28 10:56:33', '2011-06-28 10:56:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(25) collate utf8_unicode_ci NOT NULL,
  `password` int(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `webcontents`
--

CREATE TABLE IF NOT EXISTS `webcontents` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(225) collate utf8_unicode_ci NOT NULL,
  `content` text collate utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `webcontents`
--

INSERT INTO `webcontents` (`id`, `title`, `content`, `create_at`, `update_at`) VALUES
(1, 'หมา', '<ul>\n	<li>\n		<span style="color:#40e0d0;">หหหหหหหหหหหหหหหห</span></li>\n	<li>\n		<span style="color:#afeeee;">่ดเ่ดเ่</span></li>\n	<li>\n		<span style="color:#ffff00;">ีีีีะพะพพพ</span></li>\n</ul>\n', '0000-00-00 00:00:00', '2011-06-28 10:15:17'),
(2, '', '', '2011-06-27 11:51:57', '2011-06-27 11:51:57');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `advisors`
--
ALTER TABLE `advisors`
  ADD CONSTRAINT `fk_advisors_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `fk_companies_business_types1` FOREIGN KEY (`business_types_id`) REFERENCES `business_types` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
