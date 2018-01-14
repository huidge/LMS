-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2018-01-02 13:21:46
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--
CREATE DATABASE IF NOT EXISTS `db_library` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_library`;

-- --------------------------------------------------------

--
-- 表的结构 `tb_bookcase`
--

DROP TABLE IF EXISTS `tb_bookcase`;
CREATE TABLE `tb_bookcase` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_bookcase`
--

INSERT INTO `tb_bookcase` (`id`, `name`) VALUES
(49, 'VC书架'),
(50, 'VB书架'),
(51, 'Delphi书架'),
(46, 'PHP书架'),
(48, 'net书架'),
(37, 'ASP图书架'),
(47, 'JSP书架');

-- --------------------------------------------------------

--
-- 表的结构 `tb_bookinfo`
--

DROP TABLE IF EXISTS `tb_bookinfo`;
CREATE TABLE `tb_bookinfo` (
  `barcode` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `bookname` varchar(70) CHARACTER SET gb2312 DEFAULT NULL,
  `typeid` int(10) UNSIGNED DEFAULT NULL,
  `author` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `translator` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `ISBN` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `price` float(8,2) DEFAULT NULL,
  `page` int(10) UNSIGNED DEFAULT NULL,
  `bookcase` int(10) UNSIGNED DEFAULT NULL,
  `storage` int(10) UNSIGNED DEFAULT NULL,
  `inTime` date DEFAULT NULL,
  `operator` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `del` tinyint(1) DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_bookinfo`
--

INSERT INTO `tb_bookinfo` (`barcode`, `bookname`, `typeid`, `author`, `translator`, `ISBN`, `price`, `page`, `bookcase`, `storage`, `inTime`, `operator`, `del`, `id`) VALUES
('123456789', 'PHP数据库系统开发完全手册', 1, '邹天思、潘凯华、刘中华', 'me', '7-121', 65.00, 530, 46, 666, '2007-12-07', 'Tsoft', 0, 5),
('123454321', 'PHP开发实战1200例', 2, '刘中华、潘凯华', 'hehe', '7-121', 89.00, 730, 46, 299, '2011-01-25', 'Tsoft', 0, 6),
('9787115154101', 'Visual Basic控件参考大全', 5, '高春艳、刘彬彬', '无', '7-121', 86.00, 777, 50, 10, '2007-12-06', 'Tsoft', 0, 20);

-- --------------------------------------------------------

--
-- 表的结构 `tb_booktype`
--

DROP TABLE IF EXISTS `tb_booktype`;
CREATE TABLE `tb_booktype` (
  `id` int(10) UNSIGNED NOT NULL,
  `typename` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `days` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_booktype`
--

INSERT INTO `tb_booktype` (`id`, `typename`, `days`) VALUES
(1, '数据库技术', 30),
(2, '宝典系列', 45),
(3, '信息科学技术', 20),
(5, '计算机程序设计', 30);

-- --------------------------------------------------------

--
-- 表的结构 `tb_borrow`
--

DROP TABLE IF EXISTS `tb_borrow`;
CREATE TABLE `tb_borrow` (
  `id` int(10) UNSIGNED NOT NULL,
  `readerid` int(10) UNSIGNED DEFAULT NULL,
  `bookid` int(10) DEFAULT NULL,
  `borrowTime` date DEFAULT NULL,
  `backTime` date DEFAULT NULL,
  `operator` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `ifback` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_borrow`
--

INSERT INTO `tb_borrow` (`id`, `readerid`, `bookid`, `borrowTime`, `backTime`, `operator`, `ifback`) VALUES
(14, 1, 6, '2011-01-25', '2011-01-28', 'Tsoft', 1),
(42, 1, 2, '2007-12-06', '2008-01-05', 'Tsoft', 0),
(49, 18, 2, '2007-12-07', '2008-01-06', 'Tsoft', 0),
(48, 18, 20, '2007-12-06', '2007-12-06', 'Tsoft', 1),
(33, 11, 2, '2007-12-05', '2007-12-05', 'Tsoft', 0),
(47, 18, 20, '2007-12-06', '2007-12-06', 'Tsoft', 1),
(46, 16, 20, '2007-12-06', '2018-01-25', 'huidge', 0),
(45, 1, 5, '2007-12-06', '2017-12-26', 'huidge', 1),
(44, 11, 2, '2007-12-06', '2008-01-05', 'Tsoft', 0),
(43, 1, 5, '2007-12-06', '2018-01-25', 'huidge', 0),
(50, 0, 2, '2011-01-25', '2011-02-24', 'Tsoft', 0),
(51, 0, 2, '2011-01-25', '2011-02-24', 'Tsoft', 0),
(52, 1, 6, '2017-12-26', '2017-12-26', 'huidge', 0),
(53, 18, 6, '2017-12-26', '2018-01-25', 'huidge', 0),
(54, 2, 20, '2017-12-26', '2018-01-25', 'huidge', 0),
(55, 1, 20, '2017-12-26', '2018-01-25', 'huidge', 0);

-- --------------------------------------------------------

--
-- 表的结构 `tb_library`
--

DROP TABLE IF EXISTS `tb_library`;
CREATE TABLE `tb_library` (
  `id` int(10) UNSIGNED NOT NULL,
  `libraryname` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `curator` varchar(10) CHARACTER SET gb2312 DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `address` varchar(100) CHARACTER SET gb2312 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET gb2312 DEFAULT NULL,
  `url` varchar(100) CHARACTER SET gb2312 DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `introduce` text CHARACTER SET gb2312
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_library`
--

INSERT INTO `tb_library` (`id`, `libraryname`, `curator`, `tel`, `address`, `email`, `url`, `createDate`, `introduce`) VALUES
(1, 'Web图书馆管理系统', '郭志辉', '1363444****', '河南科技大学开元校区', 'huidge@iutlook.com', 'http://lib.guozhihui.top', '2017-12-22', '博、学、精、深');

-- --------------------------------------------------------

--
-- 表的结构 `tb_manager`
--

DROP TABLE IF EXISTS `tb_manager`;
CREATE TABLE `tb_manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `pwd` varchar(30) CHARACTER SET gb2312 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_manager`
--

INSERT INTO `tb_manager` (`id`, `name`, `pwd`) VALUES
(1, 'MR', 'mrsoft'),
(22, 'lx', 'lx'),
(23, 'al', 'al'),
(24, 'huidge', 'huidge'),
(28, 'test', 'test');

-- --------------------------------------------------------

--
-- 表的结构 `tb_parameter`
--

DROP TABLE IF EXISTS `tb_parameter`;
CREATE TABLE `tb_parameter` (
  `id` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED DEFAULT NULL,
  `validity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_parameter`
--

INSERT INTO `tb_parameter` (`id`, `cost`, `validity`) VALUES
(1, 120, 12);

-- --------------------------------------------------------

--
-- 表的结构 `tb_publishing`
--

DROP TABLE IF EXISTS `tb_publishing`;
CREATE TABLE `tb_publishing` (
  `ISBN` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `pubname` varchar(30) CHARACTER SET gb2312 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_publishing`
--

INSERT INTO `tb_publishing` (`ISBN`, `pubname`) VALUES
('7-115', '清华出版社'),
('7-111', '机械工业出版'),
('7-121', '人民邮电出版社');

-- --------------------------------------------------------

--
-- 表的结构 `tb_purview`
--

DROP TABLE IF EXISTS `tb_purview`;
CREATE TABLE `tb_purview` (
  `id` int(11) NOT NULL DEFAULT '0',
  `sysset` tinyint(1) DEFAULT '0',
  `readerset` tinyint(1) DEFAULT '0',
  `bookset` tinyint(1) DEFAULT '0',
  `borrowback` tinyint(1) DEFAULT '0',
  `sysquery` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_purview`
--

INSERT INTO `tb_purview` (`id`, `sysset`, `readerset`, `bookset`, `borrowback`, `sysquery`) VALUES
(22, 1, 1, 1, 0, 0),
(1, 1, 1, 1, 1, 1),
(24, 1, 1, 1, 1, 1),
(28, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `tb_reader`
--

DROP TABLE IF EXISTS `tb_reader`;
CREATE TABLE `tb_reader` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `sex` varchar(4) CHARACTER SET gb2312 DEFAULT NULL,
  `barcode` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `vocation` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `paperType` varchar(10) CHARACTER SET gb2312 DEFAULT NULL,
  `paperNO` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `tel` varchar(20) CHARACTER SET gb2312 DEFAULT NULL,
  `email` varchar(100) CHARACTER SET gb2312 DEFAULT NULL,
  `createDate` date DEFAULT NULL,
  `operator` varchar(30) CHARACTER SET gb2312 DEFAULT NULL,
  `remark` mediumtext CHARACTER SET gb2312,
  `typeid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_reader`
--

INSERT INTO `tb_reader` (`id`, `name`, `sex`, `barcode`, `vocation`, `birthday`, `paperType`, `paperNO`, `tel`, `email`, `createDate`, `operator`, `remark`, `typeid`) VALUES
(1, '陈丽', '女', '123456789', '职员', '1980-09-29', '身份证', '22010412331***', '13633333****', 'wgh***@s**u.com', '2006-05-27', 'admin', '哈哈', 4),
(2, '张勇', '男', '3214555555', '职员', '1983-02-22', '军官证', '2201043222******', '113655422555', 'dream****@**u.com', '2006-05-27', 'admin', '??', 1),
(16, '小丽', '女', '123456', '程序员', '1985-02-25', '身份证', '54515452***', '136********', 'xl***@163.com', '2007-12-06', 'Tsoft', '无', 16),
(8, '纯净水', '女', '13579', '职员', '1982-12-14', '身份证', '2220000000***', '1375666***', '44**@sina.com', '2006-06-10', 'mr', '图书迷', 14),
(19, '小刚', '男', '222222', '硬件维护', '1982-05-06', '身份证', '2132123*****', '136********', 'xg**@163.com', '2007-12-06', 'Tsoft', '无', 20),
(11, '小凡', '女', '1255***', 'IT业', '1980-02-25', '工作证', '55255**', '421552***', '53**34@sina.com', '2007-12-01', 'Tsoft', '我是一个图书迷', 13),
(18, '小欣', '女', '111111', '程序员', '1985-02-25', '身份证', '21212345546***', '136********', 'xx***@163.com', '2007-12-06', 'Tsoft', '无', 14),
(20, '陈丽', '女', '123456789', '职员', '1980-09-29', '身份证', '22010412331***', '13633333****', 'wgh***@s**u.com', '2017-12-28', '', '哈哈', 4),
(21, '陈丽', '女', '123456789', '职员', '1980-09-29', '身份证', '22010412331***', '13633333****', 'wgh***@s**u.com', '2017-12-28', '', '哈哈', 4),
(22, '陈丽', '女', '123456789', '职员', '1980-09-29', '身份证', '22010412331***', '13633333****', 'wgh***@s**u.com', '2017-12-28', '', '哈哈', 4),
(23, '陈丽', '女', '123456789', '职员', '1980-09-29', '身份证', '22010412331***', '13633333****', 'wgh***@s**u.com', '2017-12-28', '', '哈哈', 4);

-- --------------------------------------------------------

--
-- 表的结构 `tb_readertype`
--

DROP TABLE IF EXISTS `tb_readertype`;
CREATE TABLE `tb_readertype` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET gb2312 DEFAULT NULL,
  `number` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `tb_readertype`
--

INSERT INTO `tb_readertype` (`id`, `name`, `number`) VALUES
(1, '学生', 4),
(4, '公务员', 5),
(14, '图书爱好者', 3),
(15, '教师', 2),
(16, '程序员', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bookcase`
--
ALTER TABLE `tb_bookcase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bookinfo`
--
ALTER TABLE `tb_bookinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_booktype`
--
ALTER TABLE `tb_booktype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_borrow`
--
ALTER TABLE `tb_borrow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_library`
--
ALTER TABLE `tb_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_manager`
--
ALTER TABLE `tb_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_parameter`
--
ALTER TABLE `tb_parameter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_purview`
--
ALTER TABLE `tb_purview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reader`
--
ALTER TABLE `tb_reader`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_readertype`
--
ALTER TABLE `tb_readertype`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `tb_bookcase`
--
ALTER TABLE `tb_bookcase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- 使用表AUTO_INCREMENT `tb_bookinfo`
--
ALTER TABLE `tb_bookinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- 使用表AUTO_INCREMENT `tb_booktype`
--
ALTER TABLE `tb_booktype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `tb_borrow`
--
ALTER TABLE `tb_borrow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- 使用表AUTO_INCREMENT `tb_library`
--
ALTER TABLE `tb_library`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tb_manager`
--
ALTER TABLE `tb_manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `tb_parameter`
--
ALTER TABLE `tb_parameter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `tb_reader`
--
ALTER TABLE `tb_reader`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `tb_readertype`
--
ALTER TABLE `tb_readertype`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
