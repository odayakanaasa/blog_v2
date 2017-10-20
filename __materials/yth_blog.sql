-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-18 05:48:29
-- 服务器版本： 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yth_blog`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin_basic`
--

CREATE TABLE `admin_basic` (
  `name` varchar(50) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `descript` text NOT NULL,
  `pic` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin_basic`
--

INSERT INTO `admin_basic` (`name`, `pwd`, `descript`, `pic`) VALUES
('admin', 'e2257d91c288cf413165bb0256fce66a', '&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;img src=&quot;http://hlzblog-1252048472.file.myqcloud.com/Uploads/editor/20170603_u36kf.jpg&quot; alt=&quot;psb&quot; style=&quot;max-width: 100%;&quot;&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;​&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;font size=&quot;3&quot;&gt;他大一上期的时候，还是个每感到无聊就I拉着舍友一起出去开黑的人&lt;/font&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;br&gt;&lt;strong&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;直到大一下期的某天&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;他觉得打游戏 &amp;nbsp;&lt;/span&gt;&lt;img src=&quot;http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/96/huangliansj_thumb.gif&quot; style=&quot;line-height: 1; text-align: left;&quot;&gt;&amp;nbsp;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;都变得无聊起来&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;于是他想&lt;/strong&gt;&lt;/span&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;自己学点东西充实自己&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;当然，与计算机越相关越好&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;接下来一年多，他学了很多东西&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;PS、UI、HTML+CSS、Javascript、SEO、PHP、JSP、&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;Linux、Shell、Nginx、&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;Apache、&lt;/span&gt;&lt;/strong&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;Mysql、&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;Memcached、&lt;/span&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;Redis、Swoole、Sphinx、Yaf、HTTP、Websocket、Web安全&amp;nbsp;&lt;/span&gt;&lt;/strong&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;...&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;span style=&quot;color: rgb(0, 0, 255);&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;最开始的时候，他真的很菜，做很多东西都感觉坑&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;虽然云天河算是个勤学好问的人，但身边朋友会这么些东西的人也不多，他只好一个人爬坑&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 10px; color: rgb(128, 128, 128); font-family: 微软雅黑;&quot;&gt;当初Ajax&amp;nbsp;POST提交表单，他把触发函数写在button上，老是触发GET请求 &amp;nbsp;&lt;/span&gt;&lt;img src=&quot;http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/62/crazya_thumb.gif&quot; style=&quot;line-height: 1; text-align: left;&quot;&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 10px; color: rgb(128, 128, 128); font-family: 微软雅黑;&quot;&gt;他一个人花了三天 &amp;nbsp;&lt;/span&gt;&lt;img src=&quot;http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/b6/sb_thumb.gif&quot; style=&quot;line-height: 1; text-align: left;&quot;&gt;&amp;nbsp;&lt;span style=&quot;color: rgb(128, 128, 128); font-family: 微软雅黑; font-size: x-small;&quot;&gt;，才发现button在被form元素包裹的时候，默认type为submit&amp;nbsp;&lt;/span&gt;&lt;img src=&quot;http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/73/wq_thumb.gif&quot; style=&quot;line-height: 1; text-align: left;&quot;&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;其实，此外还有过很多坑&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;他曾经有过多次想放弃的念头，不过都因自己的座右铭&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(255, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;“享尽孤独，自繁华”&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(255, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(136, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;一次一次从摔倒的地方爬起&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(136, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(136, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;渐渐地，他对“web开发”这件事，有了对朋友一样的态度&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(136, 0, 0); font-family: 微软雅黑;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑; color: rgb(255, 0, 0);&quot;&gt;&lt;strong&gt;如果一定要给性别，一定还是女朋友&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-family: 微软雅黑; color: rgb(255, 0, 0);&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-family: 微软雅黑; color: rgb(255, 0, 0);&quot;&gt;毕竟除了上课期间，都是和TA在一起&lt;/span&gt;&lt;span style=&quot;line-height: 1; text-align: left;&quot;&gt;&amp;nbsp;&lt;/span&gt;&lt;img src=&quot;http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/19/heia_thumb.gif&quot; style=&quot;line-height: 1; text-align: left;&quot;&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;所以，云天河在大学期间也没什么机会谈场校园恋爱了&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;期待自己能变得更优秀一些吧，以后遇到对的人也好更有底气一点&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(128, 128, 128); text-align: right;&quot;&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(128, 128, 128); text-align: right;&quot;&gt;2017年6月3日 22:09:12 &amp;nbsp;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;strong style=&quot;font-size: 18px; color: rgb(128, 128, 128); text-align: right;&quot;&gt;&lt;br&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong style=&quot;text-align: right;&quot;&gt;&lt;span style=&quot;color: rgb(255, 0, 255);&quot;&gt;云天河&lt;/span&gt;&lt;span style=&quot;color: rgb(128, 128, 128);&quot;&gt;&amp;nbsp;著&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 'http://ww1.sinaimg.cn/large/006HJ39wgy1fg166thfzbj305k05k746.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `background_list`
--

CREATE TABLE `background_list` (
  `id` smallint(6) UNSIGNED NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `background_list`
--

INSERT INTO `background_list` (`id`, `url`) VALUES
(11, 'http://pic.90sjimg.com/back_pic/00/01/88/75/88e7bbdd8c5fd30c12706b6d1d1b55e7.jpg'),
(10, 'http://pic.90sjimg.com/back_pic/00/04/13/75/a2c11112141d88f6e78f26be88e4555c.jpg'),
(6, 'http://pic.90sjimg.com/back_pic/u/00/01/53/12/55e698904f67f.jpg'),
(7, 'http://pic.90sjimg.com/back_pic/u/00/05/60/99/55efeae2bef9b.jpg'),
(8, 'http://pic.90sjimg.com/back_pic/u/00/05/60/99/55eea32d51e90.jpg'),
(9, 'http://pic.90sjimg.com/back_pic/00/00/69/40/25df770aa0cd1c69a1a1ee195cc338ce.jpg'),
(13, 'http://pic.90sjimg.com/back_pic/u/00/02/82/06/561b457215461.jpg'),
(14, 'http://pic.90sjimg.com/back_pic/00/00/69/40/769ffe2ad7906100327880923cf5fe87.jpg'),
(15, 'http://pic.90sjimg.com/back_pic/qk/back_origin_pic/00/02/49/9418461d5368acb40bf79767f224f94b.jpg'),
(16, 'http://pic.90sjimg.com/back_pic/qk/back_origin_pic/00/02/08/2e84ca5c886ea02c7cb526a23c4daa74.jpg'),
(17, 'http://pic.90sjimg.com/back_pic/00/01/88/75/e57c567dbca15daa86bca10cc80da029.jpg'),
(18, 'http://pic.90sjimg.com/back_pic/00/00/69/40/6512da7390d8afc1b81fa7a5582d9622.jpg'),
(19, 'http://pic.90sjimg.com/back_pic/00/00/40/82/52168331b8c6747c63f7cfa0c77fb43c.jpg'),
(20, 'http://pic.90sjimg.com/back_pic/00/04/20/33/293d4b1c77019e654664d8df37303e52.jpg'),
(23, 'http://pic.90sjimg.com/back_pic/00/04/13/75/a7a1630d26a15db65cd4b1f76718c57f.jpg'),
(22, 'http://pic.90sjimg.com/back_pic/u/00/24/84/32/561f235389fae.jpg'),
(24, 'http://pic.90sjimg.com/back_pic/00/04/20/33/7902315425e8bc96d3939591caec0095.jpg'),
(26, 'http://pic.90sjimg.com/back_pic/qk/back_origin_pic/00/04/18/f520b159af318cda1dd6d92cecadc33d.JPG'),
(27, 'http://pic.90sjimg.com/back_pic/00/00/40/82/2814a6b8b2ba7f10fa533d92542db4f2.jpg'),
(28, 'http://pic.90sjimg.com/back_pic/qk/back_origin_pic/00/01/41/894cfff10a4c9f136fe794bf90e9de1f.jpg'),
(29, 'http://pic.90sjimg.com/back_pic/u/00/00/13/55/55fa4495c2762.jpg'),
(30, 'http://pic.90sjimg.com/back_pic/00/04/27/49/501e587a0601b9e1790b1402fc8388ea.jpg'),
(31, 'http://pic.90sjimg.com/back_pic/00/01/88/75/5b7c334ee26361f3d826451472f54ee6.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `blog_category_list`
--

CREATE TABLE `blog_category_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_category_list`
--

INSERT INTO `blog_category_list` (`id`, `title`) VALUES
(3, 'Mysql'),
(4, 'Javascript'),
(5, 'PHP'),
(6, 'HTML5'),
(7, 'CSS3'),
(8, 'Linux'),
(9, 'Web安全'),
(10, 'MariaDB'),
(11, 'UI'),
(12, 'SEO'),
(13, 'Redis'),
(14, '生活漫谈'),
(15, '书单'),
(16, '个人作品'),
(17, 'HTTP'),
(19, 'JAVA'),
(20, '语法专题'),
(21, 'Web性能'),
(22, '动漫');

-- --------------------------------------------------------

--
-- 表的结构 `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `blog_comment_reply`
--

CREATE TABLE `blog_comment_reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `floor_id` int(11) NOT NULL,
  `user_id` varchar(32) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_comment_reply`
--

INSERT INTO `blog_comment_reply` (`id`, `floor_id`, `user_id`, `content`, `time`) VALUES
(25, 12, '-1', '测试回复', '2017-06-23 09:08:07'),
(30, 13, '-1', '高中那会儿，第一次跟她接吻的时候，快亲上的时候她突然说等一下，我就纳闷了，她要干嘛？她从兜里拿出三个糖，就上好佳那种圆的糖，草莓苹果荔枝味，她问我，你挑一个？我指了一下那个荔枝的，然后问她要干嘛?她二话不说马上撕开包装，就把那颗糖给吃了，然后一把扯过我的脖子，我俩就接吻了。全程一股荔枝味。后来，她跟我说，人生那么长我没有自信能让你记住我，但是你既然喜欢吃荔枝味的糖，我只能让你记住我和你接吻时，是荔枝味的，这样以后你吃荔枝味的东西都能想起我，我和你接吻的味道。现在我俩分手了，每次吃荔枝味的东西都能想起她，家里固定有荔枝糖，想她了都会吃上一个，就像在跟她接吻，有机会想跟她说，人生那么长我可能要记着你一辈子了。后来，我有过两个女友也没有结果，时间也无法沉淀。终于有一天，我再也无法抑制我心中的那份感情，我决定去找她，我们要在一起。后来，经多方打听才知道，她毕业后去了自己想去的大学。而我，终于有一天找到她，开口的第一句：还记得那次荔枝糖的味道吗？她含着泪告诉我荔枝糖的味道我一直没忘记，不然我也不会开糖果店。我突然被感动的无以复加我接着说：那你一毕业后去了哪里读大学怎么过得这么好？她说：...', '2017-06-23 09:13:40'),
(27, 12, '-1', '3', '2017-06-23 09:08:20'),
(26, 12, '-1', '2', '2017-06-23 09:08:18'),
(29, 12, '-1', '5', '2017-06-23 09:08:24'),
(28, 12, '-1', '4', '2017-06-23 09:08:22');

-- --------------------------------------------------------

--
-- 表的结构 `blog_text`
--

CREATE TABLE `blog_text` (
  `cate_id` int(11) NOT NULL,
  `cover_url` varchar(150) NOT NULL,
  `title` varchar(50) NOT NULL,
  `descript` varchar(1000) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `raw_content` text NOT NULL,
  `content` text NOT NULL,
  `statistic` int(11) DEFAULT '0',
  `last_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sticky` tinyint(1) DEFAULT '0',
  `original` tinyint(1) NOT NULL DEFAULT '0',
  `bg_id` smallint(6) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `friend_link`
--

CREATE TABLE `friend_link` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `friend_link`
--

INSERT INTO `friend_link` (`id`, `title`, `url`) VALUES
(9, '云天河Mall - v2.0', 'http://mall.hlzblog.top/'),
(10, '云天河CSDN', 'http://blog.csdn.net/myboyli'),
(11, '云天河Github', 'https://github.com/HaleyLeoZhang'),
(15, '小文博客', 'http://www.az1314.cn/');

-- --------------------------------------------------------

--
-- 替换视图以便查看 `index_comment`
-- (See below for the actual view)
--
CREATE TABLE `index_comment` (
`article_id` int(11)
,`user_id` varchar(32)
,`time` timestamp
,`content` text
,`name` varchar(50)
,`pic` varchar(150)
);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` varchar(32) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pic` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `type`, `name`, `pic`) VALUES
('-1', 0, '云天河', 'http://oqx3r2n98.bkt.clouddn.com/17-6-25/39571626.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `user_behaviour`
--

CREATE TABLE `user_behaviour` (
  `ip` varchar(16) NOT NULL,
  `url` varchar(150) NOT NULL,
  `location` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user_deny_ip`
--

CREATE TABLE `user_deny_ip` (
  `ip` varchar(16) NOT NULL,
  `time` int(10) NOT NULL,
  `expire` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 视图结构 `index_comment`
--
DROP TABLE IF EXISTS `index_comment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `index_comment`  AS  (select `a`.`article_id` AS `article_id`,`a`.`user_id` AS `user_id`,`a`.`time` AS `time`,`a`.`content` AS `content`,`c`.`name` AS `name`,`c`.`pic` AS `pic` from ((`blog_comment` `a` left join `blog_text` `b` on((`b`.`id` = `a`.`article_id`))) join `user` `c` on((`c`.`id` = `a`.`user_id`))) order by `a`.`id` desc limit 5) union (select `a`.`article_id` AS `article_id`,`d`.`user_id` AS `user_id`,`d`.`time` AS `time`,`d`.`content` AS `content`,`c`.`name` AS `name`,`c`.`pic` AS `pic` from (((`blog_comment` `a` left join `blog_text` `b` on((`b`.`id` = `a`.`article_id`))) join `blog_comment_reply` `d` on((`d`.`floor_id` = `a`.`id`))) join `user` `c` on((`c`.`id` = `d`.`user_id`))) order by `d`.`id` desc limit 5) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `background_list`
--
ALTER TABLE `background_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_list`
--
ALTER TABLE `blog_category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `blog_comment_reply`
--
ALTER TABLE `blog_comment_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_text`
--
ALTER TABLE `blog_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_link`
--
ALTER TABLE `friend_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_behaviour`
--
ALTER TABLE `user_behaviour`
  ADD KEY `time` (`time`);

--
-- Indexes for table `user_deny_ip`
--
ALTER TABLE `user_deny_ip`
  ADD UNIQUE KEY `ip` (`ip`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `background_list`
--
ALTER TABLE `background_list`
  MODIFY `id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- 使用表AUTO_INCREMENT `blog_category_list`
--
ALTER TABLE `blog_category_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `blog_comment_reply`
--
ALTER TABLE `blog_comment_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `blog_text`
--
ALTER TABLE `blog_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `friend_link`
--
ALTER TABLE `friend_link`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
