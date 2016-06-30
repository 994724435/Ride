-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2016 �?01 �?28 �?15:52
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `diss`
--
CREATE DATABASE IF NOT EXISTS `diss` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `diss`;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_article`
--

CREATE TABLE IF NOT EXISTS `bbs_article` (
  `articleid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章编号',
  `cateid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '文章分类编号',
  `subject` char(80) NOT NULL DEFAULT '' COMMENT '文章标题(中文)',
  `brief` varchar(255) NOT NULL DEFAULT '' COMMENT '文章介绍(中文)',
  `message` mediumtext NOT NULL COMMENT '文章内容(中文)',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户编号',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发表时间',
  `update_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `ip` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发表时IP',
  `seo_title` varchar(80) NOT NULL DEFAULT '',
  `seo_keywords` varchar(80) NOT NULL DEFAULT '',
  `seo_description` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`articleid`),
  KEY `cateid_articleid` (`cateid`,`articleid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_attach`
--

CREATE TABLE IF NOT EXISTS `bbs_attach` (
  `aid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tid` int(11) NOT NULL DEFAULT '0',
  `pid` int(11) NOT NULL DEFAULT '0',
  `uid` int(11) NOT NULL DEFAULT '0',
  `filesize` int(8) unsigned NOT NULL DEFAULT '0',
  `width` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `height` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `filename` char(120) NOT NULL DEFAULT '',
  `orgfilename` char(120) NOT NULL DEFAULT '',
  `filetype` char(7) NOT NULL DEFAULT '',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `comment` char(100) NOT NULL DEFAULT '',
  `downloads` int(11) NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0',
  `golds` int(11) NOT NULL DEFAULT '0',
  `rmbs` int(11) NOT NULL DEFAULT '0',
  `isimage` tinyint(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `pid` (`pid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_banip`
--

CREATE TABLE IF NOT EXISTS `bbs_banip` (
  `banid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip0` smallint(11) NOT NULL DEFAULT '0',
  `ip1` smallint(11) NOT NULL DEFAULT '0',
  `ip2` smallint(11) NOT NULL DEFAULT '0',
  `ip3` smallint(11) NOT NULL DEFAULT '0',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`banid`),
  KEY `ip0` (`ip0`,`ip1`,`ip2`,`ip3`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_cache`
--

CREATE TABLE IF NOT EXISTS `bbs_cache` (
  `k` char(32) NOT NULL DEFAULT '',
  `v` mediumtext NOT NULL,
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_cache`
--

INSERT INTO `bbs_cache` (`k`, `v`, `expiry`) VALUES
('grouplist', '{"0":{"gid":"0","name":"游客组","agreesfrom":"0","agreesto":"0","maxagrees":"20","allowread":"1","allowagree":"1","allowthread":"0","allowpost":"1","allowattach":"0","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"1":{"gid":"1","name":"管理员组","agreesfrom":"0","agreesto":"0","maxagrees":"10000","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"1","allowupdate":"1","allowdelete":"1","allowmove":"1","allowbanuser":"1","allowdeleteuser":"1","allowviewip":"1","allowcustomurl":"1"},"2":{"gid":"2","name":"超级版主组","agreesfrom":"0","agreesto":"0","maxagrees":"200","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"1","allowupdate":"1","allowdelete":"1","allowmove":"1","allowbanuser":"1","allowdeleteuser":"1","allowviewip":"1","allowcustomurl":"1"},"4":{"gid":"4","name":"版主组","agreesfrom":"0","agreesto":"0","maxagrees":"50","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"1","allowupdate":"1","allowdelete":"1","allowmove":"1","allowbanuser":"1","allowdeleteuser":"0","allowviewip":"1","allowcustomurl":"1"},"5":{"gid":"5","name":"实习版主组","agreesfrom":"0","agreesto":"0","maxagrees":"0","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"1","allowupdate":"1","allowdelete":"0","allowmove":"1","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"1"},"6":{"gid":"6","name":"待验证用户组","agreesfrom":"0","agreesto":"0","maxagrees":"0","allowread":"1","allowagree":"0","allowthread":"0","allowpost":"1","allowattach":"0","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"7":{"gid":"7","name":"禁止用户组","agreesfrom":"0","agreesto":"0","maxagrees":"0","allowread":"0","allowagree":"0","allowthread":"0","allowpost":"0","allowattach":"0","allowdown":"0","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"101":{"gid":"101","name":"一级用户组","agreesfrom":"0","agreesto":"50","maxagrees":"20","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"102":{"gid":"102","name":"二级用户组","agreesfrom":"50","agreesto":"200","maxagrees":"40","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"103":{"gid":"103","name":"三级用户组","agreesfrom":"200","agreesto":"1000","maxagrees":"80","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"104":{"gid":"104","name":"四级用户组","agreesfrom":"1000","agreesto":"10000","maxagrees":"160","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"},"105":{"gid":"105","name":"五级用户组","agreesfrom":"10000","agreesto":"10000000","maxagrees":"320","allowread":"1","allowagree":"1","allowthread":"1","allowpost":"1","allowattach":"1","allowdown":"1","allowtop":"0","allowupdate":"0","allowdelete":"0","allowmove":"0","allowbanuser":"0","allowdeleteuser":"0","allowviewip":"0","allowcustomurl":"0"}}', 0),
('thread_lastpid_list', '[]', 0),
('runtime', '{"users":1,"posts":0,"threads":0,"todayusers":0,"todayposts":0,"todaythreads":0,"onlines":1,"cron_1_last_date":1453537043,"cron_2_last_date":1453478400}', 0),
('setting', 'null', 0),
('thread_top_list', '[]', 0),
('friendlinklist', '[]', 1453537343),
('forumlist', '{"1":{"fid":"1","name":"默认版块","rank":"0","threads":"0","todayposts":"0","todaythreads":"0","brief":"默认版块介绍","accesson":"0","orderby":"0","create_date":"0","icon":"0","moduids":"","seo_title":"","seo_keywords":"","create_date_fmt":"1970-1-1","icon_url":"static/forum.png","accesslist":[],"modlist":[],"newtids":[]}}', 1453537350),
('forum_tids_lastpid_1', '[]', 0),
('onlinelist_1', '[{"sid":"56a2f79265358","uid":"0","gid":"0","fid":"1","url":"/bbs/forum-1.htm","ip":"0","useragent":"Mozilla/5.0 (Windows NT 6.3; WOW","data":"","last_date":"1453537294","last_date_fmt":"2016-1-23","groupname":"游客组","username":"游客"}]', 1453537355);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_forum`
--

CREATE TABLE IF NOT EXISTS `bbs_forum` (
  `fid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(16) NOT NULL DEFAULT '',
  `rank` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `threads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `todayposts` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `todaythreads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `brief` text NOT NULL,
  `accesson` int(11) unsigned NOT NULL DEFAULT '0',
  `orderby` tinyint(11) NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `icon` int(11) unsigned NOT NULL DEFAULT '0',
  `moduids` char(120) NOT NULL DEFAULT '',
  `seo_title` char(64) NOT NULL DEFAULT '',
  `seo_keywords` char(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bbs_forum`
--

INSERT INTO `bbs_forum` (`fid`, `name`, `rank`, `threads`, `todayposts`, `todaythreads`, `brief`, `accesson`, `orderby`, `create_date`, `icon`, `moduids`, `seo_title`, `seo_keywords`) VALUES
(1, '默认版块', 0, 0, 0, 0, '默认版块介绍', 0, 0, 0, 0, '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_forum_access`
--

CREATE TABLE IF NOT EXISTS `bbs_forum_access` (
  `fid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` int(11) unsigned NOT NULL DEFAULT '0',
  `allowread` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowagree` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowthread` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowpost` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowattach` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `allowdown` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`,`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_friendlink`
--

CREATE TABLE IF NOT EXISTS `bbs_friendlink` (
  `linkid` bigint(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` smallint(11) NOT NULL DEFAULT '0',
  `rank` smallint(11) NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `name` char(32) NOT NULL DEFAULT '',
  `url` char(64) NOT NULL DEFAULT '',
  PRIMARY KEY (`linkid`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_group`
--

CREATE TABLE IF NOT EXISTS `bbs_group` (
  `gid` smallint(6) unsigned NOT NULL,
  `name` char(20) NOT NULL DEFAULT '',
  `agreesfrom` int(11) NOT NULL DEFAULT '0',
  `agreesto` int(11) NOT NULL DEFAULT '0',
  `maxagrees` int(11) NOT NULL DEFAULT '0',
  `allowread` int(11) NOT NULL DEFAULT '0',
  `allowagree` int(11) NOT NULL DEFAULT '0',
  `allowthread` int(11) NOT NULL DEFAULT '0',
  `allowpost` int(11) NOT NULL DEFAULT '0',
  `allowattach` int(11) NOT NULL DEFAULT '0',
  `allowdown` int(11) NOT NULL DEFAULT '0',
  `allowtop` int(11) NOT NULL DEFAULT '0',
  `allowupdate` int(11) NOT NULL DEFAULT '0',
  `allowdelete` int(11) NOT NULL DEFAULT '0',
  `allowmove` int(11) NOT NULL DEFAULT '0',
  `allowbanuser` int(11) NOT NULL DEFAULT '0',
  `allowdeleteuser` int(11) NOT NULL DEFAULT '0',
  `allowviewip` int(11) unsigned NOT NULL DEFAULT '0',
  `allowcustomurl` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_group`
--

INSERT INTO `bbs_group` (`gid`, `name`, `agreesfrom`, `agreesto`, `maxagrees`, `allowread`, `allowagree`, `allowthread`, `allowpost`, `allowattach`, `allowdown`, `allowtop`, `allowupdate`, `allowdelete`, `allowmove`, `allowbanuser`, `allowdeleteuser`, `allowviewip`, `allowcustomurl`) VALUES
(0, '游客组', 0, 0, 20, 1, 1, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(1, '管理员组', 0, 0, 10000, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, '超级版主组', 0, 0, 200, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(4, '版主组', 0, 0, 50, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1),
(5, '实习版主组', 0, 0, 0, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0, 0, 1),
(6, '待验证用户组', 0, 0, 0, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '禁止用户组', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(101, '一级用户组', 0, 50, 20, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(102, '二级用户组', 50, 200, 40, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(103, '三级用户组', 200, 1000, 80, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(104, '四级用户组', 1000, 10000, 160, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0),
(105, '五级用户组', 10000, 10000000, 320, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_guest_agree`
--

CREATE TABLE IF NOT EXISTS `bbs_guest_agree` (
  `ip` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `sid` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`sid`,`pid`),
  KEY `ip` (`ip`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_ipaccess`
--

CREATE TABLE IF NOT EXISTS `bbs_ipaccess` (
  `ip` int(11) unsigned NOT NULL,
  `mails` smallint(11) NOT NULL DEFAULT '0',
  `users` smallint(11) NOT NULL DEFAULT '0',
  `threads` smallint(11) NOT NULL DEFAULT '0',
  `posts` smallint(11) NOT NULL DEFAULT '0',
  `attachs` smallint(11) NOT NULL DEFAULT '0',
  `attachsizes` smallint(11) NOT NULL DEFAULT '0',
  `last_date` int(11) NOT NULL DEFAULT '0',
  `actions` int(11) NOT NULL DEFAULT '0',
  `action1` int(11) NOT NULL DEFAULT '0',
  `action2` int(11) NOT NULL DEFAULT '0',
  `action3` int(11) NOT NULL DEFAULT '0',
  `action4` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_kv`
--

CREATE TABLE IF NOT EXISTS `bbs_kv` (
  `k` char(32) NOT NULL DEFAULT '',
  `v` mediumtext NOT NULL,
  `expiry` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_kv`
--

INSERT INTO `bbs_kv` (`k`, `v`, `expiry`) VALUES
('runtime_append', '{"cron_1_last_date":1453537043,"cron_2_last_date":1453478400}', 0);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_modlog`
--

CREATE TABLE IF NOT EXISTS `bbs_modlog` (
  `logid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `subject` char(32) NOT NULL DEFAULT '',
  `comment` char(64) NOT NULL DEFAULT '',
  `rmbs` int(11) NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `action` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`logid`),
  KEY `uid` (`uid`,`logid`),
  KEY `tid` (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_myagree`
--

CREATE TABLE IF NOT EXISTS `bbs_myagree` (
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `touid` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_mythread`
--

CREATE TABLE IF NOT EXISTS `bbs_mythread` (
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_online`
--

CREATE TABLE IF NOT EXISTS `bbs_online` (
  `sid` char(16) NOT NULL DEFAULT '0',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `gid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `fid` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `url` char(32) NOT NULL DEFAULT '',
  `ip` int(11) unsigned NOT NULL DEFAULT '0',
  `useragent` char(32) NOT NULL DEFAULT '',
  `data` char(255) NOT NULL DEFAULT '',
  `last_date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`sid`),
  KEY `last_date` (`last_date`),
  KEY `fid` (`fid`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_online`
--

INSERT INTO `bbs_online` (`sid`, `uid`, `gid`, `fid`, `url`, `ip`, `useragent`, `data`, `last_date`) VALUES
('56a2f79265358', 0, 0, 1, '/bbs/forum-1.htm', 0, 'Mozilla/5.0 (Windows NT 6.3; WOW', '', 1453537294);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_post`
--

CREATE TABLE IF NOT EXISTS `bbs_post` (
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `isfirst` int(11) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `userip` int(11) unsigned NOT NULL DEFAULT '0',
  `sid` char(16) NOT NULL DEFAULT '',
  `images` smallint(3) NOT NULL DEFAULT '0',
  `files` smallint(3) NOT NULL DEFAULT '0',
  `agrees` int(11) unsigned NOT NULL DEFAULT '0',
  `message` longtext NOT NULL,
  PRIMARY KEY (`pid`),
  KEY `tid` (`tid`,`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_post_agree`
--

CREATE TABLE IF NOT EXISTS `bbs_post_agree` (
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `touid` int(11) unsigned NOT NULL DEFAULT '0',
  `pid` int(11) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_table_day`
--

CREATE TABLE IF NOT EXISTS `bbs_table_day` (
  `year` smallint(11) unsigned NOT NULL DEFAULT '0' COMMENT '年',
  `month` tinyint(11) unsigned NOT NULL DEFAULT '0' COMMENT '月',
  `day` tinyint(11) unsigned NOT NULL DEFAULT '0' COMMENT '日',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  `table` char(16) NOT NULL DEFAULT '' COMMENT '表名',
  `maxid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最大ID',
  `count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '总数',
  PRIMARY KEY (`year`,`month`,`day`,`table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bbs_table_day`
--

INSERT INTO `bbs_table_day` (`year`, `month`, `day`, `create_date`, `table`, `maxid`, `count`) VALUES
(2016, 1, 23, 1453508243, 'bbs_thread', 0, 0),
(2016, 1, 23, 1453508243, 'bbs_post', 0, 0),
(2016, 1, 23, 1453508243, 'bbs_user', 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread`
--

CREATE TABLE IF NOT EXISTS `bbs_thread` (
  `fid` smallint(6) NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `uid` int(11) unsigned NOT NULL DEFAULT '0',
  `sid` char(16) NOT NULL DEFAULT '',
  `userip` int(11) unsigned NOT NULL DEFAULT '0',
  `subject` char(128) NOT NULL DEFAULT '',
  `url_on` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0',
  `last_date` int(11) unsigned NOT NULL DEFAULT '0',
  `views` int(11) unsigned NOT NULL DEFAULT '0',
  `posts` int(11) unsigned NOT NULL DEFAULT '0',
  `agrees` int(11) unsigned NOT NULL DEFAULT '0',
  `images` tinyint(3) NOT NULL DEFAULT '0',
  `files` tinyint(3) NOT NULL DEFAULT '0',
  `mods` tinyint(3) NOT NULL DEFAULT '0',
  `closed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `firstpid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastuid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastpid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `fid` (`fid`,`tid`),
  KEY `fid_2` (`fid`,`lastpid`),
  KEY `fid_3` (`fid`,`agrees`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread_lastpid`
--

CREATE TABLE IF NOT EXISTS `bbs_thread_lastpid` (
  `fid` int(11) unsigned NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `lastpid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  UNIQUE KEY `lastpid` (`lastpid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread_new`
--

CREATE TABLE IF NOT EXISTS `bbs_thread_new` (
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread_relate`
--

CREATE TABLE IF NOT EXISTS `bbs_thread_relate` (
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `rtid` int(11) unsigned NOT NULL DEFAULT '0',
  `uid` smallint(6) NOT NULL DEFAULT '0',
  KEY `tid` (`tid`,`rtid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread_top`
--

CREATE TABLE IF NOT EXISTS `bbs_thread_top` (
  `fid` smallint(6) NOT NULL DEFAULT '0',
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `top` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`tid`),
  KEY `top` (`top`,`tid`),
  KEY `fid` (`fid`,`top`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_thread_url`
--

CREATE TABLE IF NOT EXISTS `bbs_thread_url` (
  `tid` int(11) unsigned NOT NULL DEFAULT '0',
  `url` char(128) NOT NULL DEFAULT '',
  KEY `tid` (`tid`),
  KEY `url` (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `bbs_user`
--

CREATE TABLE IF NOT EXISTS `bbs_user` (
  `uid` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `gid` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '用户组编号',
  `email` char(40) NOT NULL DEFAULT '' COMMENT '邮箱',
  `username` char(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `realname` char(16) NOT NULL DEFAULT '' COMMENT '用户名',
  `idnumber` char(19) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `password_sms` char(16) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(16) NOT NULL DEFAULT '' COMMENT '密码混杂',
  `mobile` char(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `qq` char(15) NOT NULL DEFAULT '' COMMENT 'QQ',
  `threads` int(11) NOT NULL DEFAULT '0' COMMENT '发帖数',
  `posts` int(11) NOT NULL DEFAULT '0' COMMENT '回帖数',
  `myagrees` int(11) NOT NULL DEFAULT '0' COMMENT '被赞次数',
  `agrees` int(11) NOT NULL DEFAULT '0' COMMENT '被赞次数',
  `last_agree_date` int(11) NOT NULL DEFAULT '0',
  `today_agrees` int(11) NOT NULL DEFAULT '0',
  `credits` int(11) NOT NULL DEFAULT '0' COMMENT '积分',
  `golds` int(11) NOT NULL DEFAULT '0' COMMENT '金币',
  `rmbs` int(11) NOT NULL DEFAULT '0' COMMENT '人民币',
  `create_ip` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时IP',
  `create_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `login_ip` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时IP',
  `login_date` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `logins` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `avatar` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户最后更新图像时间',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `agrees` (`agrees`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `bbs_user`
--

INSERT INTO `bbs_user` (`uid`, `gid`, `email`, `username`, `realname`, `idnumber`, `password`, `password_sms`, `salt`, `mobile`, `qq`, `threads`, `posts`, `myagrees`, `agrees`, `last_agree_date`, `today_agrees`, `credits`, `golds`, `rmbs`, `create_ip`, `create_date`, `login_ip`, `login_date`, `logins`, `avatar`) VALUES
(1, 1, 'admin@admin.com', 'admin', '', '', 'd98bb50e808918dd45a8d92feafc4fa3', '', '123456', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
