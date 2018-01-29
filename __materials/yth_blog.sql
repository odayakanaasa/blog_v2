-- phpMyAdmin SQL Dump
-- version 4.7.0-beta1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2018-01-29 18:54:25
-- 服务器版本： 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- 转存表中的数据 `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `article_id`, `user_id`, `content`, `time`) VALUES
(1, 0, '-1', '测测', '2017-11-18 01:20:13'),
(2, 0, '-1', '测测2', '2017-11-18 01:20:19'),
(3, 0, '-1', '测测3', '2017-11-18 01:20:24'),
(4, 0, '-1', '测测4', '2017-11-18 01:20:32'),
(5, 0, '-1', '测测5', '2017-11-18 01:20:38'),
(6, 0, '-1', '测测6', '2017-11-18 01:20:43'),
(7, 0, '-1', '测测6', '2017-11-18 01:20:48'),
(8, 0, '-1', '高中那会儿，第一次跟她接吻的时候，快亲上的时候她突然说等一下，我就纳闷了，她要干嘛？她从兜里拿出三个糖，就上好佳那种圆的糖，草莓苹果荔枝味，她问我，你挑一个？我指了一下那个荔枝的，然后问她要干嘛?她二话不说马上撕开包装，就把那颗糖给吃了，然后一把扯过我的脖子，我俩就接吻了。全程一股荔枝味。后来，她跟我说，人生那么长我没有自信能让你记住我，但是你既然喜欢吃荔枝味的糖，我只能让你记住我和你接吻时，是荔枝味的，这样以后你吃荔枝味的东西都能想起我，我和你接吻的味道。现在我俩分手了，每次吃荔枝味的东西都能想起她，家里固定有荔枝糖，想她了都会吃上一个，就像在跟她接吻，有机会想跟她说，人生那么长我可能要记着你一辈子了。后来，我有过两个女友也没有结果，时间也无法沉淀。终于有一天，我再也无法抑制我心中的那份感情，我决定去找她，我们要在一起。后来，经多方打听才知道，她毕业后去了自己想去的大学。而我，终于有一天找到她，开口的第一句：还记得那次荔枝糖的味道吗？她含着泪告诉我荔枝糖的味道我一直没忘记，不然我也不会开糖果店。我突然被感动的无以复加我接着说：那你一毕业后去了哪里读大学怎么过得这么好？她说：...', '2017-11-18 01:22:00'),
(9, 0, '-1', '测测', '2018-01-28 10:04:27'),
(10, 0, '-1', '测测', '2018-01-28 10:04:30'),
(11, 0, '-1', '测测', '2018-01-28 10:04:32'),
(12, 0, '-1', '测测', '2018-01-28 10:04:36'),
(13, 0, '-1', '测测', '2018-01-28 10:04:38');

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
  `raw_content` mediumtext NOT NULL,
  `content` mediumtext NOT NULL,
  `statistic` int(11) DEFAULT '0',
  `last_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sticky` tinyint(1) DEFAULT '0',
  `original` tinyint(1) NOT NULL DEFAULT '0',
  `bg_id` smallint(6) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `blog_text`
--

INSERT INTO `blog_text` (`cate_id`, `cover_url`, `title`, `descript`, `type`, `raw_content`, `content`, `statistic`, `last_time`, `time`, `sticky`, `original`, `bg_id`, `id`) VALUES
(4, 'http://oqx3r2n98.bkt.clouddn.com/17-8-19/9202211.jpg', '虚拟机VirtualBox安装MAC OS 10.12图文教程', 'xx', 1, '<p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">1、VirtualBox虚拟机</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">下载地址：https://www.virtualbox.org/</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">特别提醒：推荐官方下载，安装VirtualBox虚拟机的时候请保持默认安装位置（就是直接点下一步，不要自己修改安装位置）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">2、macOS 10.12 Sierra Final by TechReviews.vmdk--虚拟镜像文件</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">下载地址：<a href=\"http://pan.baidu.com/s/1o7VmnCQ\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); text-decoration: underline;\" _href=\"http://pan.baidu.com/s/1o7VmnCQ\">百度网盘</a>（提取码：zu4w）本来想弄迅雷bt的 太麻烦，先凑合着用吧</p><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><h3 style=\"margin-top: 10px; margin-bottom: 10px; color: rgb(255, 255, 255); font-size: 16px; font-weight: bold; line-height: 1.5; font-family: Arial, Helvetica, sans-serif; white-space: normal; background: rgb(178, 178, 178);\">VirtualBox虚拟机安装Mac OS 10.12图文教程的具体步骤</h3><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">首先，新建虚拟机，直接切换到专家模式，然后在名称处输入MacOS10.12，内存建议设置4096MB或者更多，虚拟硬盘选择前面下载的那个macOS 10.12 Sierra Final by TechReviews.vmdk文件，然后点击创建。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920170959103-2028134509.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">创建完毕后，点击设置，处理器数量更改为2</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171230665-1881366137.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">主板选项里面把软驱去掉。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171319181-222607817.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">显示选项里面把显存设置为128MB。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171408025-970245958.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\">。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">点击OK保存设置，接着关闭虚拟机，以管理员身份运行命令提示符（cmd）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171629103-1693965571.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">如图所示，输入：cd \"C:\\Program Files\\Oracle\\VirtualBox\\\" 进入VirtualBox目录，然后依次输入以下内容</p><div class=\"cnblogs_code\" style=\"margin-top: 5px; margin-bottom: 5px; padding: 5px; border: 1px solid rgb(204, 204, 204); overflow: auto; white-space: normal; font-family: \'Courier New\' !important; font-size: 12px !important; background-color: rgb(245, 245, 245);\"><div class=\"cnblogs_code_toolbar\" style=\"margin-top: 5px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a title=\"复制代码\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-decoration: underline; border: none !important;\"><img src=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" style=\"margin: 0px; padding: 0px; max-width: 900px;\"></a></span></div><pre style=\"font-family: \'Courier New\' !important;\">VBoxManage.exe modifyvm <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> --cpuidset <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">00000001</span> 000106e5 <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">00100800</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\"> 0098e3fd bfebfbff\n\nVBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiSystemProduct</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">iMac11,3</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiSystemVersion</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">1.0</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiBoardProduct</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">Iloveapple</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/smc/0/Config/DeviceKey</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">ourhardworkbythesewordsguardedpleasedontsteal(c)AppleComputerInc</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/smc/0/Config/GetKeyFromRealSMC</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">1</span></pre><div class=\"cnblogs_code_toolbar\" style=\"margin-top: 5px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a title=\"复制代码\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-decoration: underline; border: none !important;\"><img src=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" style=\"margin: 0px; padding: 0px; max-width: 900px;\"></a></span></div></div><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">输入完毕后，打开虚拟机，启动创建的虚拟机，出现下面的界面。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920172730884-495036467.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">走完过后就会出现图形安装界面，为英文，进入系统后可以修改为中文。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920173728071-1980693671.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择China，点击continue</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093548384-1454740395.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择中文拼音输入法</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093523415-2118343848.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择Don‘t</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093716150-1321774609.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不启用定位</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;<img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093813087-1022544988.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不登录苹果账号。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093909478-719221844.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">同意。Agree</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><span class=\"lightbox-hover\" style=\"margin: 0px; padding: 0px;\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094202556-1157636372.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></span></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">输入用户名和密码（切换为英文是按大小写锁定键）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094336040-848878238.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">时区选择中国。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094402400-482889722.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不发送统计</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094436775-1547865705.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">这里可以不打勾，不启用Siri。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094505728-1572898111.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">设置完毕，就会进入系统。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img src=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094542056-531969419.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">OK，VirtualBox虚拟机安装Mac OS的教程到这里就完毕了</p><p><br></p>', '<p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">1、VirtualBox虚拟机</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">下载地址：https://www.virtualbox.org/</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">特别提醒：推荐官方下载，安装VirtualBox虚拟机的时候请保持默认安装位置（就是直接点下一步，不要自己修改安装位置）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">2、macOS 10.12 Sierra Final by TechReviews.vmdk--虚拟镜像文件</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">下载地址：<a rel=\"nofollow\"   href=\"http://pan.baidu.com/s/1o7VmnCQ\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); text-decoration: underline;\" _href=\"http://pan.baidu.com/s/1o7VmnCQ\">百度网盘</a>（提取码：zu4w）本来想弄迅雷bt的 太麻烦，先凑合着用吧</p><hr style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><h3 style=\"margin-top: 10px; margin-bottom: 10px; color: rgb(255, 255, 255); font-size: 16px; font-weight: bold; line-height: 1.5; font-family: Arial, Helvetica, sans-serif; white-space: normal; background: rgb(178, 178, 178);\">VirtualBox虚拟机安装Mac OS 10.12图文教程的具体步骤</h3><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">首先，新建虚拟机，直接切换到专家模式，然后在名称处输入MacOS10.12，内存建议设置4096MB或者更多，虚拟硬盘选择前面下载的那个macOS 10.12 Sierra Final by TechReviews.vmdk文件，然后点击创建。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920170959103-2028134509.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">创建完毕后，点击设置，处理器数量更改为2</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171230665-1881366137.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">主板选项里面把软驱去掉。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171319181-222607817.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">显示选项里面把显存设置为128MB。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171408025-970245958.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\">。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">点击OK保存设置，接着关闭虚拟机，以管理员身份运行命令提示符（cmd）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920171629103-1693965571.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">如图所示，输入：cd \"C:\\Program Files\\Oracle\\VirtualBox\\\" 进入VirtualBox目录，然后依次输入以下内容</p><div class=\"cnblogs_code\" style=\"margin-top: 5px; margin-bottom: 5px; padding: 5px; border: 1px solid rgb(204, 204, 204); overflow: auto; white-space: normal; font-family: \'Courier New\' !important; font-size: 12px !important; background-color: rgb(245, 245, 245);\"><div class=\"cnblogs_code_toolbar\" style=\"margin-top: 5px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a title=\"复制代码\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-decoration: underline; border: none !important;\"><img   class=\"lazy_pic\" data-original=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" style=\"margin: 0px; padding: 0px; max-width: 900px;\"></a></span></div><pre style=\"font-family: \'Courier New\' !important;\">VBoxManage.exe modifyvm <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> --cpuidset <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">00000001</span> 000106e5 <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">00100800</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\"> 0098e3fd bfebfbff\n\nVBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiSystemProduct</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">iMac11,3</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiSystemVersion</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">1.0</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/efi/0/Config/DmiBoardProduct</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">Iloveapple</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/smc/0/Config/DeviceKey</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">ourhardworkbythesewordsguardedpleasedontsteal(c)AppleComputerInc</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5 !important;\">VBoxManage setextradata </span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">MacOS10.12</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">VBoxInternal/Devices/smc/0/Config/GetKeyFromRealSMC</span><span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 0); line-height: 1.5 !important;\">\"</span> <span style=\"margin: 0px; padding: 0px; color: rgb(128, 0, 128); line-height: 1.5 !important;\">1</span></pre><div class=\"cnblogs_code_toolbar\" style=\"margin-top: 5px;\"><span class=\"cnblogs_code_copy\" style=\"margin: 0px; padding: 0px 5px 0px 0px; line-height: 1.5 !important;\"><a title=\"复制代码\" style=\"margin: 0px; padding: 0px; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; text-decoration: underline; border: none !important;\"><img   class=\"lazy_pic\" data-original=\"https://common.cnblogs.com/images/copycode.gif\" alt=\"复制代码\" style=\"margin: 0px; padding: 0px; max-width: 900px;\"></a></span></div></div><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">输入完毕后，打开虚拟机，启动创建的虚拟机，出现下面的界面。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920172730884-495036467.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">走完过后就会出现图形安装界面，为英文，进入系统后可以修改为中文。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170920173728071-1980693671.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择China，点击continue</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093548384-1454740395.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择中文拼音输入法</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093523415-2118343848.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">选择Don‘t</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093716150-1321774609.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不启用定位</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;<img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093813087-1022544988.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不登录苹果账号。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921093909478-719221844.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">同意。Agree</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><span class=\"lightbox-hover\" style=\"margin: 0px; padding: 0px;\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094202556-1157636372.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></span></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">输入用户名和密码（切换为英文是按大小写锁定键）</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094336040-848878238.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">时区选择中国。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094402400-482889722.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">不发送统计</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094436775-1547865705.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">这里可以不打勾，不启用Siri。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094505728-1572898111.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">设置完毕，就会进入系统。</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\"><img   class=\"lazy_pic\" data-original=\"http://images2017.cnblogs.com/blog/1067491/201709/1067491-20170921094542056-531969419.png\" alt=\"\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: initial; max-width: 900px;\"></p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">&nbsp;</p><p style=\"margin: 10px auto; color: rgb(73, 73, 73); font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22.4px; white-space: normal; background-color: rgb(244, 237, 227);\">OK，VirtualBox虚拟机安装Mac OS的教程到这里就完毕了</p><p><br></p>', 105, '2018-01-28 08:53:45', '2017-08-19 13:44:48', 0, 0, 27, 3);
INSERT INTO `blog_text` (`cate_id`, `cover_url`, `title`, `descript`, `type`, `raw_content`, `content`, `statistic`, `last_time`, `time`, `sticky`, `original`, `bg_id`, `id`) VALUES
(5, 'http://pic.90sjimg.com/back_pic/00/04/27/49/501e587a0601b9e1790b1402fc8388ea.jpg', '张力&amp;翟雪 - 课程设计', '课程设计readme.md', 0, '## 需求分析\n现在饭店人员较多、人流量较大，管理、统计都有挺大的麻烦，  \n于是我们打算做么一个管理系统，  \n帮助饭店分配人手各司其职及其行为记录，  \n顺便完成月账单统计以方便对账、通过我们对数据的统计，  \n规划饭店能更好的推出新的受欢迎的口味的菜品，  \n并对卖得不好的菜品进行调整  \n\n## 架构\n这是一款基于thinkphp5的作品，采用 [PSR-2](http://www.php-fig.org/psr/psr-2/) 规范  \n\n## API文档\nAPI接口文档基于[apidoc](http://apidocjs.com/)  \n\n    apidoc -i application/controller -o public/doc\n\n## 小组分工\n\n> 翟雪\n\n - 内部人员管理的登录、注册的相关接口逻辑书写  \n - 订单管理的下单、取消下单、订单进度相关接口逻辑书写  \n - 订单确认相关接口逻辑书写  \n - 菜品管理的相关逻辑接口的书写  \n - 结算管理的相关逻辑接口的书写  \n - 趋势分析管理的相关逻辑接口的书写  \n\n> 张力\n\n - 美工设计：图片美化，用户体验度  \n - 结算管理的相关逻辑接口的书写  \n - 后台所有逻辑接口文档的书写  \n - 本次数据库的设计  \n\n## 功能简介\n\n * 点餐人员管理  \n    * 初始化[依据他们给的帐号和名称]点餐员与配菜员，他们初次登录密码均为8位随机密码，登录后可查看  \n    * 后台超级管理员可完成对应的增删改查功能  \n * 订单管理  \n    * 点餐员选择用户所说的菜，可选择并动态标明数量与备注\n    * 点餐员可以取消未配菜的订单\n    * 也可查看订单进度\n * 配菜管理\n    * 可查看进行中的订单\n    * 可确认订单已完成\n * 菜品管理\n    * 菜的名字与价格和上架状态的增删改查\n * 结算管理\n     * 分类查看已取消的订单历史详情与操作人与操作时间\n     * 分类查看已确认订单的历史详情与操作人与操作时间\n     * 以月和那个月的具体哪天来搜索时间段内的所有订单与总价\n * 趋势分析[在指定月的前题下]\n    * 统计这个月卖得好的前10个菜\n    * 统计这个月卖得不好的前10个菜\n    * 统计销量趋势\n\n## 参考文献\n[1] 孟凡荣．数据库原理与应用．中国矿业大学，2009（8）28-30[2] 郑人杰，殷人昆.软件工程概论[M].北京：清华大学出版社，1998.  \n[3] 胡菘.Dreamweaver完美网页设计[M].中国青年电子出版社,2010.5  \n[4] （澳）威利，（澳）汤姆森. PHP和MySQL Web开发 （原书第4版）[M].机械工业  \n[5] （美）赞德斯彻.深入PHP：面向对象、模式与实践(第3版)[M].人民邮电出版社,2011.7出版社,2009.4  \n[6] Patrick.Expert PHP and MySQL Galbraith [M]. WROX PR/PEER INFORMATION INC,2010.3  \n[7] 杨宇.PHP典型模块与项目实战大全[M].清华大学出版社,2012.1', '<h2>需求分析</h2>\n\n<p>现在饭店人员较多、人流量较大，管理、统计都有挺大的麻烦，<br />\n于是我们打算做么一个管理系统，<br />\n帮助饭店分配人手各司其职及其行为记录，<br />\n顺便完成月账单统计以方便对账、通过我们对数据的统计，<br />\n规划饭店能更好的推出新的受欢迎的口味的菜品，<br />\n并对卖得不好的菜品进行调整  </p>\n\n<h2>架构</h2>\n\n<p>这是一款基于thinkphp5的作品，采用 <a rel=\"nofollow\"   href=\"http://www.php-fig.org/psr/psr-2/\">PSR-2</a> 规范  </p>\n\n<h2>API文档</h2>\n\n<p>API接口文档基于<a rel=\"nofollow\"   href=\"http://apidocjs.com/\">apidoc</a>  </p>\n\n<pre><code>apidoc -i application/controller -o public/doc\n</code></pre>\n\n<h2>小组分工</h2>\n\n<blockquote>\n  <p>翟雪</p>\n</blockquote>\n\n<ul>\n<li>内部人员管理的登录、注册的相关接口逻辑书写  </li>\n<li>订单管理的下单、取消下单、订单进度相关接口逻辑书写  </li>\n<li>订单确认相关接口逻辑书写  </li>\n<li>菜品管理的相关逻辑接口的书写  </li>\n<li>结算管理的相关逻辑接口的书写  </li>\n<li>趋势分析管理的相关逻辑接口的书写  </li>\n</ul>\n\n<blockquote>\n  <p>张力</p>\n</blockquote>\n\n<ul>\n<li>美工设计：图片美化，用户体验度  </li>\n<li>结算管理的相关逻辑接口的书写  </li>\n<li>后台所有逻辑接口文档的书写  </li>\n<li>本次数据库的设计  </li>\n</ul>\n\n<h2>功能简介</h2>\n\n<ul>\n<li>点餐人员管理  \n\n<ul>\n<li>初始化[依据他们给的帐号和名称]点餐员与配菜员，他们初次登录密码均为8位随机密码，登录后可查看  </li>\n<li>后台超级管理员可完成对应的增删改查功能  </li>\n</ul></li>\n<li>订单管理  \n\n<ul>\n<li>点餐员选择用户所说的菜，可选择并动态标明数量与备注</li>\n<li>点餐员可以取消未配菜的订单</li>\n<li>也可查看订单进度</li>\n</ul></li>\n<li>配菜管理\n\n<ul>\n<li>可查看进行中的订单</li>\n<li>可确认订单已完成</li>\n</ul></li>\n<li>菜品管理\n\n<ul>\n<li>菜的名字与价格和上架状态的增删改查</li>\n</ul></li>\n<li>结算管理\n\n<ul>\n<li>分类查看已取消的订单历史详情与操作人与操作时间</li>\n<li>分类查看已确认订单的历史详情与操作人与操作时间</li>\n<li>以月和那个月的具体哪天来搜索时间段内的所有订单与总价</li>\n</ul></li>\n<li>趋势分析[在指定月的前题下]\n\n<ul>\n<li>统计这个月卖得好的前10个菜</li>\n<li>统计这个月卖得不好的前10个菜</li>\n<li>统计销量趋势</li>\n</ul></li>\n</ul>\n\n<h2>参考文献</h2>\n\n<p>[1] 孟凡荣．数据库原理与应用．中国矿业大学，2009（8）28-30[2] 郑人杰，殷人昆.软件工程概论[M].北京：清华大学出版社，1998.<br />\n[3] 胡菘.Dreamweaver完美网页设计[M].中国青年电子出版社,2010.5<br />\n[4] （澳）威利，（澳）汤姆森. PHP和MySQL Web开发 （原书第4版）[M].机械工业<br />\n[5] （美）赞德斯彻.深入PHP：面向对象、模式与实践(第3版)[M].人民邮电出版社,2011.7出版社,2009.4<br />\n[6] Patrick.Expert PHP and MySQL Galbraith [M]. WROX PR/PEER INFORMATION INC,2010.3<br />\n[7] 杨宇.PHP典型模块与项目实战大全[M].清华大学出版社,2012.1</p>\n', 11, '2018-01-28 09:07:50', '2017-12-18 14:33:39', 0, 0, 29, 4),
(8, 'http://oqx3r2n98.bkt.clouddn.com/17-12-21/53385611.jpg', 'Docker学习笔记(2)--Docker常用命令', 'dokcer常用指令', 0, '## 1. 查看docker信息（version、info）\n\n    # 查看docker版本  \n    docker version  \n      \n    # 显示docker系统的信息  \n    docker info \n\n## 2. 对image的操作（search、pull、images、rmi、history）\n\n    # 检索image  \n    docker search image_name  \n      \n    # 下载image  \n    docker pull image_name  \n      \n    # 列出镜像列表; -a, --all=false Show all images; --no-trunc=false Don\'t truncate output; -q, --quiet=false Only show numeric IDs  \n    docker images  \n      \n    # 删除一个或者多个镜像; -f, --force=false Force; --no-prune=false Do not delete untagged parents  \n    docker rmi image_name  \n      \n    # 显示一个镜像的历史; --no-trunc=false Don\'t truncate output; -q, --quiet=false Only show numeric IDs  \n    docker history image_name  \n\n## 3. 启动容器（run）\n\ndocker容器可以理解为在沙盒中运行的进程。  \n这个沙盒包含了该进程运行所必须的资源，包括文件系统、系统类库、shell 环境等等。  \n但这个沙盒默认是不会运行任何程序的。  \n你需要在沙盒中运行一个进程来启动某一个容器。  \n这个进程是该容器的唯一进程，所以当该进程结束的时候，容器也会完全的停止。  \n\n    # 在容器中运行\"echo\"命令，输出\"hello word\"  \n    docker run image_name echo \"hello word\"  \n      \n    # 交互式进入容器中  \n    docker run -i -t image_name /bin/bash  \n      \n      \n    # 在容器中安装新的程序  \n    docker run image_name apt-get install -y app_name  \n\nNote：    \n在执行apt-get 命令的时候，要带上-y参数。  \n如果不指定-y参数的话，apt-get命令会进入交互模式，需要用户输入命令来进行确认，但在docker环境中是无法响应这种交互的。  \napt-get 命令执行完毕之后，容器就会停止，但对容器的改动不会丢失。  \n\n## 4. 查看容器（ps）\n\n    # 列出当前所有正在运行的container  \n    docker ps  \n    # 列出所有的container  \n    docker ps -a  \n    # 列出最近一次启动的container  \n    docker ps -l  \n\n## 5. 保存对容器的修改（commit）\n当你对某一个容器做了修改之后（通过在容器中运行某一个命令），  \n可以把对容器的修改保存下来，这样下次可以从保存后的最新状态运行该容器。  \n\n    # 保存对容器的修改; -a, --author=\"\" Author; -m, --message=\"\" Commit message  \n    docker commit ID new_image_name  \n\nNote：  \nimage相当于类，container相当于实例，不过可以动态给实例安装新软件，  \n然后把这个container用commit命令固化成一个image。\n\n## 6. 对容器的操作（rm、stop、start、kill、logs、diff、top、cp、restart、attach）\n\n    # 删除所有容器  \n    docker rm `docker ps -a -q`  \n      \n    # 删除单个容器; -f, --force=false; -l, --link=false Remove the specified link and not the underlying container; -v, --volumes=false Remove the volumes associated to the container  \n    docker rm Name/ID  \n      \n    # 停止、启动、杀死一个容器  \n    docker stop Name/ID  \n    docker start Name/ID  \n    docker kill Name/ID  \n      \n    # 从一个容器中取日志; -f, --follow=false Follow log output; -t, --timestamps=false Show timestamps  \n    docker logs Name/ID  \n      \n    # 列出一个容器里面被改变的文件或者目录，list列表会显示出三种事件，A 增加的，D 删除的，C 被改变的  \n    docker diff Name/ID  \n      \n    # 显示一个运行的容器里面的进程信息  \n    docker top Name/ID  \n      \n    # 从容器里面拷贝文件/目录到本地一个路径  \n    docker cp Name:/container_path to_path  \n    docker cp ID:/container_path to_path  \n      \n    # 重启一个正在运行的容器; -t, --time=10 Number of seconds to try to stop for before killing the container, Default=10  \n    docker restart Name/ID  \n      \n    # 附加到一个运行的容器上面; --no-stdin=false Do not attach stdin; --sig-proxy=true Proxify all received signal to the process  \n    docker attach ID  \n\nNote：  \nattach命令允许你查看或者影响一个运行的容器。  \n你可以在同一时间attach同一个容器。  \n你也可以从一个容器中脱离出来，是从CTRL-C。\n\n## 7. 保存和加载镜像（save、load）\n当需要把一台机器上的镜像迁移到另一台机器的时候，需要保存镜像与加载镜像。  \n\n    # 保存镜像到一个tar包; -o, --output=\"\" Write to an file  \n    docker save image_name -o file_path  \n    # 加载一个tar包格式的镜像; -i, --input=\"\" Read from a tar archive file  \n    docker load -i file_path  \n      \n    # 机器a  \n    docker save image_name > /home/save.tar  \n    # 使用scp将save.tar拷到机器b上，然后：  \n    docker load < /home/save.tar  \n\n## 8、 登录registry server（login）\n\n    # 登陆registry server; -e, --email=\"\" Email; -p, --password=\"\" Password; -u, --username=\"\" Username  \n    docker login \n\n## 9. 发布image（push）\n\n    # 发布docker镜像  \n    docker push new_image_name  \n\n## 10.  根据Dockerfile 构建出一个容器\n\n    #build  \n          --no-cache=false Do not use cache when building the image  \n          -q, --quiet=false Suppress the verbose output generated by the containers  \n          --rm=true Remove intermediate containers after a successful build  \n          -t, --tag=\"\" Repository name (and optionally a tag) to be applied to the resulting image in case of success  \n    docker build -t image_name Dockerfile_path', '<h2>1. 查看docker信息（version、info）</h2>\n\n<pre><code># 查看docker版本  \ndocker version  \n\n# 显示docker系统的信息  \ndocker info \n</code></pre>\n\n<h2>2. 对image的操作（search、pull、images、rmi、history）</h2>\n\n<pre><code># 检索image  \ndocker search image_name  \n\n# 下载image  \ndocker pull image_name  \n\n# 列出镜像列表; -a, --all=false Show all images; --no-trunc=false Don\'t truncate output; -q, --quiet=false Only show numeric IDs  \ndocker images  \n\n# 删除一个或者多个镜像; -f, --force=false Force; --no-prune=false Do not delete untagged parents  \ndocker rmi image_name  \n\n# 显示一个镜像的历史; --no-trunc=false Don\'t truncate output; -q, --quiet=false Only show numeric IDs  \ndocker history image_name  \n</code></pre>\n\n<h2>3. 启动容器（run）</h2>\n\n<p>docker容器可以理解为在沙盒中运行的进程。<br />\n这个沙盒包含了该进程运行所必须的资源，包括文件系统、系统类库、shell 环境等等。<br />\n但这个沙盒默认是不会运行任何程序的。<br />\n你需要在沙盒中运行一个进程来启动某一个容器。<br />\n这个进程是该容器的唯一进程，所以当该进程结束的时候，容器也会完全的停止。  </p>\n\n<pre><code># 在容器中运行\"echo\"命令，输出\"hello word\"  \ndocker run image_name echo \"hello word\"  \n\n# 交互式进入容器中  \ndocker run -i -t image_name /bin/bash  \n\n\n# 在容器中安装新的程序  \ndocker run image_name apt-get install -y app_name  \n</code></pre>\n\n<p>Note：<br />\n在执行apt-get 命令的时候，要带上-y参数。<br />\n如果不指定-y参数的话，apt-get命令会进入交互模式，需要用户输入命令来进行确认，但在docker环境中是无法响应这种交互的。<br />\napt-get 命令执行完毕之后，容器就会停止，但对容器的改动不会丢失。  </p>\n\n<h2>4. 查看容器（ps）</h2>\n\n<pre><code># 列出当前所有正在运行的container  \ndocker ps  \n# 列出所有的container  \ndocker ps -a  \n# 列出最近一次启动的container  \ndocker ps -l  \n</code></pre>\n\n<h2>5. 保存对容器的修改（commit）</h2>\n\n<p>当你对某一个容器做了修改之后（通过在容器中运行某一个命令），<br />\n可以把对容器的修改保存下来，这样下次可以从保存后的最新状态运行该容器。  </p>\n\n<pre><code># 保存对容器的修改; -a, --author=\"\" Author; -m, --message=\"\" Commit message  \ndocker commit ID new_image_name  \n</code></pre>\n\n<p>Note：<br />\nimage相当于类，container相当于实例，不过可以动态给实例安装新软件，<br />\n然后把这个container用commit命令固化成一个image。</p>\n\n<h2>6. 对容器的操作（rm、stop、start、kill、logs、diff、top、cp、restart、attach）</h2>\n\n<pre><code># 删除所有容器  \ndocker rm `docker ps -a -q`  \n\n# 删除单个容器; -f, --force=false; -l, --link=false Remove the specified link and not the underlying container; -v, --volumes=false Remove the volumes associated to the container  \ndocker rm Name/ID  \n\n# 停止、启动、杀死一个容器  \ndocker stop Name/ID  \ndocker start Name/ID  \ndocker kill Name/ID  \n\n# 从一个容器中取日志; -f, --follow=false Follow log output; -t, --timestamps=false Show timestamps  \ndocker logs Name/ID  \n\n# 列出一个容器里面被改变的文件或者目录，list列表会显示出三种事件，A 增加的，D 删除的，C 被改变的  \ndocker diff Name/ID  \n\n# 显示一个运行的容器里面的进程信息  \ndocker top Name/ID  \n\n# 从容器里面拷贝文件/目录到本地一个路径  \ndocker cp Name:/container_path to_path  \ndocker cp ID:/container_path to_path  \n\n# 重启一个正在运行的容器; -t, --time=10 Number of seconds to try to stop for before killing the container, Default=10  \ndocker restart Name/ID  \n\n# 附加到一个运行的容器上面; --no-stdin=false Do not attach stdin; --sig-proxy=true Proxify all received signal to the process  \ndocker attach ID  \n</code></pre>\n\n<p>Note：<br />\nattach命令允许你查看或者影响一个运行的容器。<br />\n你可以在同一时间attach同一个容器。<br />\n你也可以从一个容器中脱离出来，是从CTRL-C。</p>\n\n<h2>7. 保存和加载镜像（save、load）</h2>\n\n<p>当需要把一台机器上的镜像迁移到另一台机器的时候，需要保存镜像与加载镜像。  </p>\n\n<pre><code># 保存镜像到一个tar包; -o, --output=\"\" Write to an file  \ndocker save image_name -o file_path  \n# 加载一个tar包格式的镜像; -i, --input=\"\" Read from a tar archive file  \ndocker load -i file_path  \n\n# 机器a  \ndocker save image_name &gt; /home/save.tar  \n# 使用scp将save.tar拷到机器b上，然后：  \ndocker load &lt; /home/save.tar  \n</code></pre>\n\n<h2>8、 登录registry server（login）</h2>\n\n<pre><code># 登陆registry server; -e, --email=\"\" Email; -p, --password=\"\" Password; -u, --username=\"\" Username  \ndocker login \n</code></pre>\n\n<h2>9. 发布image（push）</h2>\n\n<pre><code># 发布docker镜像  \ndocker push new_image_name  \n</code></pre>\n\n<h2>10.  根据Dockerfile 构建出一个容器</h2>\n\n<pre><code>#build  \n      --no-cache=false Do not use cache when building the image  \n      -q, --quiet=false Suppress the verbose output generated by the containers  \n      --rm=true Remove intermediate containers after a successful build  \n      -t, --tag=\"\" Repository name (and optionally a tag) to be applied to the resulting image in case of success  \ndocker build -t image_name Dockerfile_path\n</code></pre>\n', 19, '2018-01-25 07:12:00', '2017-12-21 01:06:01', 0, 0, 17, 5);

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

--
-- 转存表中的数据 `user_behaviour`
--

INSERT INTO `user_behaviour` (`ip`, `url`, `location`, `time`) VALUES
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-21 08:33:44'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-23 13:31:53'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-23 13:31:54'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-23 13:32:05'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-23 13:32:16'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-23 13:33:00'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2017-07-23 13:33:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-28 00:09:48'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-29 12:52:00'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-07-29 12:52:03'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-29 12:52:04'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 12:52:06'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 12:57:28'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 13:10:51'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-29 13:23:27'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 13:23:31'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 13:24:24'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-07-29 13:24:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-07-30 06:35:07'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-01 06:35:57'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-01 14:41:55'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-03 08:00:38'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-05 14:25:37'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-07 15:13:55'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-10 00:20:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-12 01:41:20'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-14 02:31:07'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-16 04:26:16'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-18 05:52:11'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-20 06:37:22'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-23 05:17:34'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-08-28 05:57:56'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-01 12:34:49'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-04 02:21:39'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-06 02:22:23'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-08 03:03:26'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-11 01:25:29'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-13 02:37:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-15 03:15:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-17 04:50:08'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-19 07:18:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-23 11:11:52'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-27 11:23:16'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-29 12:24:32'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-09-29 13:31:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-09 03:40:33'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-11 07:25:47'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-13 07:30:11'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-16 06:21:19'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-18 06:59:53'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-19 14:27:35'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-19 14:27:38'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-19 14:27:40'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2017-10-19 14:27:42'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:31:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:46'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:50'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 02:33:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 04:34:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 04:40:03'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 04:40:29'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 04:41:27'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 05:48:44'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:48:46'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:48:47'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:48:48'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:48:49'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:48:50'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 05:52:48'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 05:52:49'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:52:50'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 05:59:39'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 05:59:40'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 05:59:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 07:49:11'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:33:48'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 16:33:51'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:34:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:41:43'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 16:41:44'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:42:01'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:42:14'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:42:18'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:43:08'),
('127.0.0.1', 'http://web.blog.com/Article.html?id=3', '', '2017-10-20 16:43:10'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:43:15'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:47:08'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:47:35'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:47:40'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:47:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:49:31'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:49:36'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:50:03'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:59:50'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 16:59:53'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-20 17:13:33'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-10-20 17:13:36'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-22 13:14:26'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-23 01:19:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-23 01:28:52'),
('127.0.0.1', 'http://web.blog.com/?search=dg', '', '2017-10-23 01:28:55'),
('127.0.0.1', 'http://web.blog.com/?search=dg', '', '2017-10-23 01:30:49'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-25 00:32:15'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-27 03:01:16'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-10-30 01:44:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-01 02:37:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-03 03:11:29'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-05 04:12:56'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-07 04:40:35'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-09 08:31:26'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-14 00:17:19'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-16 11:28:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-11-18 01:19:18'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-11-18 01:19:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:20:17'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 00:20:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:23:00'),
('127.0.0.1', 'http://web.blog.com/?cate_id=4', '', '2017-12-04 00:23:03'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 00:23:05'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:23:14'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 00:23:16'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2017-12-04 00:23:19'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2017-12-04 00:24:22'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:31:15'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2017-12-04 00:40:21'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 00:44:43'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 00:46:20'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:53:03'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:53:04'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 00:53:07'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:54:14'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 00:55:25'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:09'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:11'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:12'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:13'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:14'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:15'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:35'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:36'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:02:37'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:03:13'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:03:15'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:04:20'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:04:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 01:04:29'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 01:14:47'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 01:15:35'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 01:16:08'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:16:12'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:16:15'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 01:16:21'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:16:24'),
('127.0.0.1', 'http://web.blog.com/Article/3', '', '2017-12-04 01:16:26'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:16:31'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:24:42'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:53:10'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:58:31'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:58:36'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:59:07'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 01:59:09'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 01:59:12'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2017-12-04 02:02:13'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 02:17:01'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 02:17:03'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 02:17:06'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 02:17:08'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 02:17:10'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 02:17:13'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 02:17:21'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:04:03'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:04:06'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:04:08'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:24:39'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:24:46'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:25:00'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:27:25'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:48:22'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 03:48:23'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 03:48:25'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 03:48:28'),
('127.0.0.1', 'http://web.blog.com/Article?id=3', '', '2017-12-04 03:48:57'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 03:48:57'),
('127.0.0.1', 'http://web.blog.com/?cate_id=4', '', '2017-12-04 03:49:02'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2017-12-04 03:49:06'),
('127.0.0.1', 'http://web.blog.com/?cate_id=4', '', '2017-12-04 03:49:24'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2017-12-04 03:49:26'),
('127.0.0.1', 'http://web.blog.com/?search=sdas', '', '2017-12-04 03:49:28'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 03:50:06'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 03:53:15'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:22:31'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:24:35'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:34:10'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:34:57'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:34:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:35:00'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:35:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:35:03'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:35:54'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:35:56'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:38:13'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:38:38'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:38:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:38:49'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:38:50'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:38:52'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:38:54'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:38:59'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:39:01'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:03'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:05'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:39:07'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:11'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:12'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:39:16'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:19'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:39:20'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:33'),
('127.0.0.1', 'http://web.blog.com/?cate_id=4', '', '2017-12-04 05:39:40'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:39:48'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:39:50'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:40:23'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:40:29'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:40:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:41:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:42:36'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:42:44'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:44:28'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:46:49'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:48:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:48:33'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:48:46'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:48:58'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:49:22'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:49:23'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:49:24'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:49:54'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:49:55'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:49:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:50:51'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:51:18'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 05:53:00'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:56:48'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:57:12'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:58:16'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:58:38'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 05:59:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 06:00:05'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-04 06:00:39'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-12-04 06:02:22'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-12-04 06:02:26'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-12-04 06:02:39'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-12-04 06:02:41'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-04 06:03:14'),
('127.0.0.1', 'http://web.blog.com/About', '', '2017-12-04 06:03:15'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-04 06:05:59'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-05 02:23:25'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-06 15:54:08'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-09 00:59:36'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-11 02:18:00'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-11 14:37:32'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-11 14:37:40'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2017-12-11 14:37:46'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-11 14:38:07'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-12 14:32:53'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-12 14:32:57'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-13 03:47:10'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-15 03:58:54'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-18 06:11:45'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-18 14:32:31'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-20 06:40:00'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-21 00:53:44'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-22 08:44:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-25 02:07:23'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-27 03:06:04'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:27:55'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:27:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:30:33'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:31:26'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2017-12-29 06:31:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:31:40'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2017-12-29 06:31:46'),
('127.0.0.1', 'http://web.blog.com/Article/4.html', '', '2017-12-29 06:31:51'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-29 06:31:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 06:32:19'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 07:33:53'),
('127.0.0.1', 'http://web.blog.com/Article/4.html', '', '2017-12-29 07:34:45'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-29 07:39:28'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-29 10:45:29'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-29 10:45:36'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2017-12-29 10:45:40'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-30 14:06:13'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2017-12-30 14:31:23'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-30 14:32:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2017-12-31 05:31:14'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-03 02:59:44'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-06 01:04:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-08 03:15:26'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-12 02:57:37'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-12 09:18:06'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-12 09:18:10'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-13 15:09:13'),
('127.0.0.1', 'http://web.blog.com/About', '', '2018-01-13 15:09:14'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2018-01-13 15:09:16'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2018-01-13 15:09:20'),
('127.0.0.1', 'http://web.blog.com/Flexible/memorabilia.html', '', '2018-01-13 15:09:53'),
('127.0.0.1', 'http://web.blog.com/Board', '', '2018-01-13 15:11:41'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 15:22:35'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-13 15:44:35'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 15:44:36'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 15:44:38'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 15:54:07'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-13 16:19:38'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 16:19:39'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-13 16:22:53'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 07:15:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 07:15:02'),
('127.0.0.1', 'http://web.blog.com/books/', '', '2018-01-14 07:15:02'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 07:36:49'),
('127.0.0.1', 'http://web.blog.com/Article/4.html', '', '2018-01-14 07:37:09'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-14 07:37:13'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 15:44:16'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 15:46:47'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 15:52:58'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 15:53:20'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 15:54:15'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2018-01-14 15:54:34'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-14 16:36:42'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 16:36:45'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 16:37:10'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 16:38:51'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-14 16:41:23'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-16 07:34:01'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-17 16:06:39'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-17 16:06:41'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-18 13:59:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-19 06:43:52'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2018-01-19 06:43:54'),
('127.0.0.1', 'http://web.blog.com/?search=x', '', '2018-01-19 06:43:55'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2018-01-19 06:54:28'),
('127.0.0.1', 'http://web.blog.com/?search=x', '', '2018-01-19 06:54:35'),
('127.0.0.1', 'http://web.blog.com/?search=a', '', '2018-01-19 06:54:37'),
('127.0.0.1', 'http://web.blog.com/?search=a', '', '2018-01-19 06:54:41'),
('127.0.0.1', 'http://web.blog.com/?search=', '', '2018-01-19 06:54:44'),
('127.0.0.1', 'http://web.blog.com/?search=d', '', '2018-01-19 06:54:49'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-19 06:58:02'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-19 07:09:44'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-19 07:09:46'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-19 07:39:49'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-19 07:39:51'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-22 10:52:03'),
('127.0.0.1', 'http://web.blog.com/Article/4.html', '', '2018-01-22 10:52:05'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:52:09'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:52:20'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:54:02'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:54:41'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:55:08'),
('127.0.0.1', 'http://web.blog.com/Article/3.html', '', '2018-01-22 10:55:18'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-22 11:21:33'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-24 15:11:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-24 15:18:02'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-24 15:18:09'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-24 15:18:15'),
('127.0.0.1', 'http://web.blog.com/Article/5.html', '', '2018-01-24 15:42:37'),
('192.168.1.101', 'http://192.168.1.101/', '', '2018-01-25 04:41:30'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-25 07:00:43'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-27 07:28:15'),
('127.0.0.1', 'http://web.blog.com/', '', '2018-01-27 07:28:15'),
('::1', 'http://localhost/', '', '2018-01-28 15:29:08');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- 使用表AUTO_INCREMENT `blog_comment_reply`
--
ALTER TABLE `blog_comment_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- 使用表AUTO_INCREMENT `blog_text`
--
ALTER TABLE `blog_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `friend_link`
--
ALTER TABLE `friend_link`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
