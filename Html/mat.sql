
-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2016-08-02 20:19:04
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mat`
--

-- --------------------------------------------------------

--
-- 表的结构 `mat_admin`
--

CREATE TABLE `mat_admin` (
  `admin_id` mediumint(6) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `lastloginip` varchar(15) DEFAULT '0',
  `lastlogintime` int(10) UNSIGNED DEFAULT '0',
  `email` varchar(40) DEFAULT '',
  `realname` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(4) NOT NULL COMMENT '2 为后台  1 为前台'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_admin`
--

INSERT INTO `mat_admin` (`admin_id`, `username`, `password`, `lastloginip`, `lastlogintime`, `email`, `realname`, `status`, `type`) VALUES
(1, 'woya', 'b286d1dbaf041bae4267f79264ca9640', '2130706433', 1470098520, 'tracywxh0830@126.com', '张三', 1, 2),
(5, 'wgq', 'b286d1dbaf041bae4267f79264ca9640', '0', 0, '1234', 'bao', 1, 1),
(6, '1', 'a0209b0f6a016196c9178386b7dea98b', '2130706433', 1470048897, '1', '1', 1, 1),
(7, '1', 'a0209b0f6a016196c9178386b7dea98b', '0', 0, '1', '1', 1, 2),
(8, '1', 'a0209b0f6a016196c9178386b7dea98b', '0', 0, '1', '1', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `mat_menu`
--

CREATE TABLE `mat_menu` (
  `menu_id` smallint(6) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL DEFAULT '',
  `parentid` smallint(6) NOT NULL DEFAULT '0',
  `m` varchar(20) NOT NULL DEFAULT '',
  `c` varchar(20) NOT NULL DEFAULT '',
  `f` varchar(20) NOT NULL DEFAULT '',
  `data` varchar(100) NOT NULL DEFAULT '',
  `listorder` smallint(6) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `type` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_menu`
--

INSERT INTO `mat_menu` (`menu_id`, `name`, `parentid`, `m`, `c`, `f`, `data`, `listorder`, `status`, `type`) VALUES
(1, '菜单管理', 0, 'admin', 'menu', 'index', '', 12, 1, 1),
(3, '新闻', 0, 'home', 'cat', 'index', '', 4, 1, 0),
(4, '科技', 0, 'home', 'cat ', 'index', '', 5, 1, 0),
(5, '娱乐', 0, 'home', 'cat', 'index', '', 2, 1, 0),
(6, '文章管理', 0, 'admin', 'content', 'index', '', 21, 1, 1),
(8, '体育', 0, 'home', 'cat', 'index', '', 0, 1, 0),
(9, '推荐位管理', 0, 'admin', 'position', 'index', '', 91, 1, 1),
(10, '推荐位内容管理', 0, 'admin', 'positioncontent', 'index', '', 10, 1, 1),
(11, '基本管理', 0, 'admin', 'basic', 'index', '', 1, 1, 1),
(13, '用户管理', 0, 'admin', 'user', 'index', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mat_news`
--

CREATE TABLE `mat_news` (
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `catid` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(80) NOT NULL DEFAULT '',
  `small_title` varchar(30) NOT NULL DEFAULT '',
  `title_font_color` varchar(250) DEFAULT NULL COMMENT '标题颜色',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `keywords` char(40) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL COMMENT '文章描述',
  `posids` varchar(250) NOT NULL DEFAULT '',
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `copyfrom` varchar(250) DEFAULT NULL COMMENT '来源',
  `username` char(20) NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_news`
--

INSERT INTO `mat_news` (`news_id`, `catid`, `title`, `small_title`, `title_font_color`, `thumb`, `keywords`, `description`, `posids`, `listorder`, `status`, `copyfrom`, `username`, `create_time`, `update_time`, `count`) VALUES
(17, 3, 'test', 'test', '#5674ed', '', 'sss', 'sss', '', 17, 1, '0', 'admin', 1455756856, 0, 0),
(18, 3, '你好ssss', '你好', '#ed568b', '', '你好', '你好sssss  ss', '', 21, 1, '3', 'admin', 1455756999, 0, 0),
(19, 4, '你想要 iPhone 7 在哪方面做出改变？', '你想要 iPhone 7 在哪方面做出改变？', '#3A5FCD', '/upload/2016/07/29/579b69753566f.jpg', 'iPhone 7', 'iPhone 7', '', 19, 1, '1', 'admin', 1456673467, 0, 0),
(20, 3, '事实上', '11', '', '', '1', '11', '', 20, 1, '0', 'admin', 1456674909, 0, 0),
(21, 3, '习近平今日下午出席解放军代表团全体会议', '习近平出席解放军代表团全体会议', '', '', '中共中央总书记 国家主席 中央军委主席 习近平', '中共中央总书记', '', 0, 1, '1', 'admin', 1457854896, 0, 16),
(22, 12, '李克强让部长们当第一新闻发言人', '李克强让部长们当第一新闻发言人', '', '', '李克强  新闻发言人', '部长直接面对媒体回应关切，还能直接读到民情民生民意，而不是看别人的舆情汇报。', '', 0, 1, '0', 'admin', 1457855362, 0, 19),
(23, 3, '重庆美女球迷争芳斗艳', '重庆美女球迷争芳斗艳', '', '', '重庆美女 球迷 争芳斗艳', '重庆美女球迷争芳斗艳', '', 0, 1, '0', 'admin', 1457855680, 0, 4),
(24, 3, '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '', '', '中超 汪嵩世界波  富力客场 1-0力擒泰达', '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '', 0, 1, '0', 'admin', 1457856460, 0, 13),
(25, 4, '均衡与旗舰？魅族 MX6 / PRO 6 主观对比体验', '魅族 MX6 / PRO 6 主观对比体验', '#3A5FCD', '/upload/2016/07/29/579b693631ec7.jpg', '魅族 MX6 / PRO 6', '魅族 MX6 / PRO 6', '', 120, 1, '1', 'woya', 1469120042, 0, 0),
(26, 4, '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', 'Galaxy S7 edge 蝙蝠侠特别版', '#3A5FCD', '/upload/2016/07/29/579b6907d160b.jpg', 'Galaxy S7 edge', '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', '', 15, 1, '1', 'woya', 1469120150, 0, 0),
(27, 5, '《新大头儿子和小头爸爸2一日成才》全国上映', '新大头儿子和小头爸爸2一日成才', '', '/upload/2016/08/02/579f7847c8f23.jpg', '动画片', '大头儿子', '', 0, 1, '0', 'woya', 1470068843, 0, 0),
(28, 5, '《大鱼海棠》迟来12年是“神坑”还是“神作”', '大鱼海棠', '#DC143C', '/upload/2016/08/02/579f79ae0c72f.jpg', '动画片', '大鱼海棠', '', 0, 1, '0', 'woya', 1470069213, 0, 0),
(29, 5, '不撕逼没人看！女神们离“现象级”很远', '不撕逼没人看！女神们离“现象级”很远', '', '/upload/2016/08/02/579f7a5180e77.jpg', '演艺圈', '娱乐新闻', '', 0, 1, '0', 'woya', 1470069353, 0, 0),
(30, 8, '巴赫出席新闻发布会回应治安问题 称奥运村很棒', '巴赫出席新闻发布会回应治安问题 称奥运村很棒', '#DC143C', '/upload/2016/08/02/579f7be008fa4.jpg', '巴赫', '巴赫', '', 0, 1, '0', 'woya', 1470069758, 0, 0),
(31, 8, 'NO.1 孙杨已做好一切准备', 'NO.1 孙杨已做好一切准备', '#3A5FCD', '/upload/2016/08/02/579f7cbada46e.jpg', '孙杨', '孙杨', '', 0, 1, '0', 'woya', 1470069967, 0, 0),
(32, 8, '朝鲜入驻奥运村举行升旗 金日成徽章抢镜', '朝鲜入驻奥运村举行升旗 金日成徽章抢镜', '#DC143C', '/upload/2016/08/02/579f7d43d60cb.jpg', '朝鲜', '朝鲜', '', 0, 1, '0', 'woya', 1470070106, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mat_news_content`
--

CREATE TABLE `mat_news_content` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `content` mediumtext NOT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_news_content`
--

INSERT INTO `mat_news_content` (`id`, `news_id`, `content`, `create_time`, `update_time`) VALUES
(7, 17, '&lt;p&gt;\r\n	gsdggsgsgsgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	sgsg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	gsdgsg \r\n&lt;/p&gt;\r\n&lt;p style=&quot;text-align:center;&quot;&gt;\r\n	       ggg\r\n&lt;/p&gt;', 1455756856, 0),
(8, 18, '&lt;p&gt;\r\n	你好\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	我很好dsggfg\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	gsgfgdfgd\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;br /&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	gggg\r\n&lt;/p&gt;', 1455756999, 0),
(9, 19, '&lt;span style=&quot;font-family:monospace;font-size:medium;line-height:normal;&quot;&gt;按照惯例，还有两个月，备受瞩目的下一代 iPhone 就要来了。不出意外，这款新机会被命名为 iPhone 7。&lt;/span&gt;', 1456673467, 0),
(10, 20, '111', 1456674909, 0),
(11, 21, '&lt;p&gt;\r\n	&lt;span style=&quot;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 3月13日下午，中共中央总书记、国家主席、中央军委主席习近平出席十二届全国人大四次会议解放军代表团全体会议，并发表重要讲话。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;&lt;img src=&quot;/upload/2016/03/13/56e519acb12ee.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;', 1457854896, 0),
(12, 22, '&lt;p style=&quot;font-size:16px;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; “部长通道”是今年两会一大亮点，成为两会开放透明和善待媒体的一个象征。在这个通道上，以往记者拉着喊着部长接受采访的场景不见了，变为部长主动站出来回应关切，甚至变成部长排队10多分钟等着接受采访。媒体报道称，两会前李克强总理接连两次“发话”，要求各部委主要负责人“要积极回应舆论关切”。部长主动放料，使这个通道上传出了很多新闻，如交通部长对拥堵费传闻的回应，人社部部长称网传延迟退休时间表属误读等。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;img src=&quot;/upload/2016/03/13/56e51b7fcd445.jpg&quot; alt=&quot;&quot; /&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	&amp;nbsp; &amp;nbsp; &amp;nbsp; 记者之所以喜欢跑两会，原因之一是两会上高官云集，能“堵”到、“逮”到、“抢”到很多大新闻——现在不需要堵、逮和抢，部长们主动曝料，打通了各种阻隔，树立了开明开放的政府形象。期待“部长通道”不只在两会期间存在，最好能成为一种官媒交流、官民沟通的常态化新闻通道。\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:16px;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;&quot;&gt;\r\n	&lt;span style=&quot;font-family:\'Microsoft YaHei\', u5FAEu8F6Fu96C5u9ED1, Arial, SimSun, u5B8Bu4F53;font-size:16px;line-height:32px;&quot;&gt;部长们多面对媒体多发言，不仅能提高自身的媒介素养，也带动部门新闻发言人，更加重视与媒体沟通。部长直接面对媒体回应关切，还能直接读到民情民生民意，而不是看别人的舆情汇报。&lt;/span&gt;\r\n&lt;/p&gt;', 1457855362, 0),
(13, 23, '&lt;p&gt;\r\n	&lt;span style=&quot;color:#666666;font-family:\'Microsoft Yahei\', 微软雅黑, SimSun, 宋体, \'Arial Narrow\', serif;font-size:14px;line-height:28px;background-color:#FFFFFF;&quot;&gt;&amp;nbsp; &amp;nbsp; &amp;nbsp; 2016年3月13日，2016年中超联赛第2轮：重庆力帆vs河南建业，主场美女球迷争芳斗艳。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p&gt;\r\n	&lt;span style=&quot;color:#666666;font-family:\'Microsoft Yahei\', 微软雅黑, SimSun, 宋体, \'Arial Narrow\', serif;font-size:14px;line-height:28px;background-color:#FFFFFF;&quot;&gt;&lt;img src=&quot;/upload/2016/03/13/56e51cb17542e.png&quot; alt=&quot;&quot; /&gt;&lt;img src=&quot;/upload/2016/03/13/56e51cb180f8a.png&quot; alt=&quot;&quot; /&gt;&lt;br /&gt;\r\n&lt;/span&gt;\r\n&lt;/p&gt;', 1457855680, 0),
(14, 24, '<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	新浪体育讯　　北京时间2016年3月12日晚7点35分，2016年中超联赛第2轮的一场比赛在天津水滴体育场进行。由天津泰达主场对阵广州富力。上半场双方机会都不多，<strong>下半场第57分钟，常飞亚左路护住皮球回做，汪嵩迎球直接远射世界波破门。随后天津泰达尽管全力进攻，但伊万诺维奇和迪亚涅都浪费了近在咫尺的机会</strong>，最终不得不0-1主场告负。\r\n</p>\r\n<p>\r\n	<img src="/upload/2016/03/13/56e51f63a5742.png" alt="" width="474" height="301" title="" align="" /> \r\n</p>\r\n<p>\r\n	由于首轮中超对阵北京国安的比赛延期举行，因此本场比赛实际上是天津泰达本赛季的首次亮相。新援蒙特罗领衔锋线，两名外援中后卫均首发出场。另一方面，在首轮主场不敌中超新贵河北华夏之后，本赛季球员流失较多的广州富力也许不得不早早开始他们的保级谋划。本场陈志钊红牌停赛，澳大利亚外援吉安努顶替了上轮首发的肖智。\r\n</p>\r\n<p>\r\n	广州富力显然更快地适应了比赛节奏。第3分钟，吉安努前插领球大步杀入禁区形成单刀，回防的赞纳迪内果断放铲化解险情。第8分钟，雷纳尔迪尼奥左路踩单车过人后低平球传中，约万诺维奇伸出大长腿将球挡出底线。第14分钟，富力队左路传中到远点，聂涛头球解围险些失误，送出本场比赛第一个角球。\r\n</p>\r\n<p>\r\n	天津队中场的配合逐渐找到一些感觉。第23分钟，天津队通过一连串小配合打到左路，周海滨下底传中被挡出底线。角球被富力队顶出后天津队二次将球传到禁区前沿，蒙特罗转身后射门但软弱无力被程月磊得到。第27分钟，约万诺维奇断球后直塞蒙特罗，蒙特罗转身晃开后卫在禁区外大力轰门打高。第29分钟，瓦格纳任意球吊入禁区，程月磊出击失误没有击到球，天津队后点将球再次传中，姜至鹏在对方夹击下奋力将球顶出底线。\r\n</p>\r\n<p>\r\n	双方都没有太好的打开僵局的办法，开始陷入苦战。第33分钟，常飞亚左路晃开空档突然起脚，皮球擦着近门柱稍稍偏出底线。第43分钟，白岳峰被雷纳尔迪尼奥断球得手，后者利用速度甩开约万诺维奇，低平球传中又躲过了赞纳迪内的滑铲，但吉安努门前近在咫尺的推射被杨启鹏神奇地单腿挡出！双方半场只得0-0互交白卷。\r\n</p>\r\n<p>\r\n	中场休息双方都没有换人。第47分钟，蒙特罗前场扣过多名对方队员后将球交给周海滨，但周海滨传中时禁区内的胡人天越位在先。第51分钟，王嘉楠右路晃开聂涛下底，但传中球又高又远。第54分钟，雷纳尔迪尼奥中场拿球挑过李本舰，后者无奈将其放倒吃到黄牌。第57分钟，常飞亚左路护住皮球回做，汪嵩迎球直接远射，杨启鹏鞭长莫及，皮球呼啸着直挂远角！世界波！富力队客场1-0取得领先。\r\n</p>\r\n<p>\r\n	第62分钟，瓦格纳任意球吊到禁区，程月磊再次拿球脱手，幸亏张耀坤将球踢出了边线。天津队率先做出调整，迪亚涅和周通两名前锋登场换下郭皓和瓦格纳。第64分钟，天津队右路传中，周通禁区内甩头攻门，程月磊侧扑将球得到。富力队并未保守。第66分钟，常飞亚左路连续盘带杀入禁区，小角度射门打偏。不过一分钟，雷纳尔迪尼奥禁区右角远射，皮球在门前反弹后稍稍偏出。\r\n</p>\r\n<p>\r\n	第71分钟，吉安努禁区角上回做，常飞亚跟进远射，杨启鹏单掌将球托出。天津队马上打出反击，蒙特罗禁区内转身将球分到右路，胡人天的传中找到后排插上的周海滨，但后者的大力头球顶得太正被程月磊侯个正着。富力队肖智换下卢琳。第74分钟，迪亚涅依靠强壮的身体杀入禁区直塞，蒙特罗停球后射门被密集防守的后卫挡出。\r\n</p>\r\n<p>\r\n	于洋换下雷纳尔迪尼奥，富力队加强防守。第81分钟，天津队角球开出，迪亚涅甩头攻门顶偏。天津队连续得到角球机会。第85分钟，天津队角球二次进攻，周通传中，蒙特罗后点头球回做，约万诺维奇离门不到两米处转身扫射竟然将球踢飞！\r\n</p>\r\n<div id="ad_33" class="otherContent_01" style="margin:10px 20px 10px 0px;padding:4px;">\r\n	<iframe width="300px" height="250px" frameborder="0" src="http://img.adbox.sina.com.cn/ad/28543.html">\r\n	</iframe>\r\n</div>\r\n<p>\r\n	天津队范柏群换下李本舰。富力队用宁安换下常飞亚。第88分钟，胡人天战术犯规吃到黄牌。天津队久攻不下，第90分钟，赞纳迪内40米开外远射打偏。第93分钟，蒙特罗左路传中，迪亚涅头球争顶下来之后顺势扫射，皮球贴着横梁高出。广州富力最终将优势保持到了终场取得三分。\r\n</p>\r\n<p>\r\n	进球信息：\r\n</p>\r\n<p>\r\n	天津泰达：无。\r\n</p>\r\n<p>\r\n	广州富力：第58分钟，卢琳左路回做，汪嵩跟上远射破网。\r\n</p>\r\n<p>\r\n	黄牌信息：\r\n</p>\r\n<p>\r\n	天津泰达：第54分钟，李本舰。第88分钟，胡人天。\r\n</p>\r\n<p>\r\n	广州富力：无。\r\n</p>\r\n<p>\r\n	红牌信息：\r\n</p>\r\n<p>\r\n	无。\r\n</p>\r\n<p>\r\n	双方出场阵容：\r\n</p>\r\n<p>\r\n	天津泰达（4-5-1）：29-杨启鹏，23-聂涛、3-赞纳迪内、5-约万诺维奇、19-白岳峰，6-周海滨、7-李本舰（86分钟，28-范柏群）、8-胡人天、11-瓦格纳（63分钟，9-迪亚涅）、22-郭皓（63分钟，33-周通），10-蒙特罗；\r\n</p>\r\n<p>\r\n	广州富力（4-5-1）：1-程月磊，11-姜至鹏、5-张耀坤、22-张贤秀、28-王嘉楠，7-斯文森、21-常飞亚（88分钟，15-宁安）、23-卢琳（73分钟，29-肖智）、31-雷纳尔迪尼奥（77分钟，3-于洋）、33-汪嵩，9-吉安努。\r\n</p>\r\n<p>\r\n	（卢小挠）\r\n</p>\r\n<div>\r\n</div>\r\n<div style="font-size:0px;">\r\n</div>\r\n<p>\r\n	<br />\r\n</p>', 1457856460, 0),
(15, 25, '&lt;div style=&quot;text-align:left;&quot;&gt;\r\n	&lt;span style=&quot;line-height:1.5;&quot;&gt;&lt;span style=&quot;font-family:monospace;font-size:medium;line-height:normal;&quot;&gt;7 月 19 日，魅族的“梦想”系列新机 — MX6 正式与我们见面了，相比魅族的 PRO 系列，MX 系列才是众多魅友们所期待的，毕竟这一经典的系列曾经是如此让魅友们为之赞叹。自行车v&lt;/span&gt;&lt;/span&gt;&lt;span style=&quot;line-height:1.5;&quot;&gt;&lt;/span&gt;\r\n&lt;/div&gt;', 1469120042, 0),
(16, 26, '&lt;span style=&quot;font-family:monospace;font-size:medium;line-height:normal;&quot;&gt;&lt;span style=&quot;font-family:monospace;font-size:medium;line-height:normal;&quot;&gt;在三星的 Galaxy S7 / S7 edge 发布之初，我对她便一见钟情。而关于三星 Galaxy S7 edge 这款手机的内容，相信尾巴们已经看了很多很多，因此这篇文章里面，就仅仅是做一个简单的图赏。&lt;/span&gt;&lt;/span&gt;', 1469120150, 0),
(17, 27, '由中央电视台央视动画倾情打造的大电影《新大头儿子和小头爸爸2一日成才》将于2016年8月19日在全国上映。这个暑假，围裙妈妈变身“陪读”家长，大头儿子也将成为一名“小小上班族”，小头爸爸一心想带着大头儿子“逃离暑假”，“大头”一家人的“成才之路”艰辛而曲折。在电影中，王成功博士首次亮相，其一手打造的“一日成才”计划也初露端倪。与此同时，林永健父子倾情加盟并首次为动画电影配音，着实令人期待。', 1470068843, 0),
(18, 28, '2015年堪称中国本土动画复兴的起始之年，2016年估计也将成为中国动画行业的“大年”。2015年在“自来水”的支持下强势逆袭的《大圣归来》已经在制作舞台剧版本，其他衍生品的开发也进行得有声有色;2016年的开年动画《小门神》虽然口碑不如预计的火爆，但是其中对中国传统文化的展现和明显区别于欧美、日本漫画的画风还是让中国观众觉得“大有可为”。更重要的是，就在本周，被网友戏称为国产动画“跳票之王”的“神坑”动画《大鱼海棠》再次宣布定档——这部从2004年开始策划，从2008年开始筹备的电影也许终于要在2016年7月8日暑期档与观众见面了。', 1470069213, 0),
(19, 29, '这是个综艺漫天飞的年代，但一看就是花了大价钱、请来各种大牌明星的综艺节目还是少数。也正因为如此，这些付出了极大成本的综艺，到头来却无声无息地就落幕了，才真正让人跌破眼镜。事实上，很多综艺无论是从规模、嘉宾还是宣传力度来看，都是奔着现象级去的，结果出来的效果，却往往不尽如人意，数据和话题都不太好看，网友关注也很低，现象级更是开玩笑。', 1470069353, 0),
(20, 30, '&lt;p class=&quot;f_left&quot; style=&quot;font-size:18px;text-indent:2em;font-family:&amp;quot;color:#404040;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;span&gt;中新网里约热内卢7月31日电(记者 卢岩)里约奥运会即将打响，但巴西的筹备工作依然遭到不少质疑和指责。国际奥委会主席巴赫在今天召开的新闻发布会上为东道主打气，并回应了外界最为关注的治安问题。&lt;/span&gt;\r\n&lt;/p&gt;\r\n&lt;p style=&quot;font-size:18px;text-indent:2em;font-family:&amp;quot;color:#404040;text-align:justify;background-color:#FFFFFF;&quot;&gt;\r\n	&lt;a href=&quot;http://2016.163.com/keywords/5/f/5df48d6b/1.html&quot; target=&quot;_blank&quot;&gt;巴赫&lt;/a&gt;并不讳言此前媒体报道过的东道主筹备工作中的种种问题，昨天的国际奥委会执委会也对里约的情况进行了磋商。他坦言几天前要离开欧洲时，曾看到过关于奥运村的一些令人担心的新闻。抵达巴西后，他直接从机场前往奥运村一探究竟。\r\n&lt;/p&gt;', 1470069758, 0),
(21, 31, '&lt;span style=&quot;color:#404040;font-family:&amp;quot;font-size:18px;line-height:32px;background-color:#FFFFFF;&quot;&gt;北京时间8月1日上午，中国&lt;/span&gt;&lt;a href=&quot;http://2016.163.com/keywords/6/3/6e386cf3/1.html&quot; target=&quot;_blank&quot;&gt;游泳&lt;/a&gt;&lt;span style=&quot;color:#404040;font-family:&amp;quot;font-size:18px;line-height:32px;background-color:#FFFFFF;&quot;&gt;队抵达里约，他们很快在当地时间31日晚上来到比赛场馆进行适应性训练。中国队的最大夺金热门人物&lt;/span&gt;&lt;a href=&quot;http://2016.163.com/keywords/5/5/5b596768/1.html&quot; target=&quot;_blank&quot;&gt;孙杨&lt;/a&gt;&lt;span style=&quot;color:#404040;font-family:&amp;quot;font-size:18px;line-height:32px;background-color:#FFFFFF;&quot;&gt;只在主比赛馆待了大约1分钟左右，就被主管教练张亚东叫到训练馆去进行热身训练。针对今年男子400米自由泳的劲敌霍顿，张亚东说：“我经历了很多届奥运会，世界第一也经常遇到，但每次赢的都是我（的队员）。”&lt;/span&gt;', 1470069967, 0),
(22, 32, '&lt;span style=&quot;color:#888888;font-family:宋体, Arial, sans-serif;line-height:21.6px;background-color:#FFFFFF;&quot;&gt;2016年7月31日，巴西里约热内卢，朝鲜代表团入住奥运村举行升旗仪式，朝鲜成员佩戴的金日成、金正日徽章颇为抢镜。&lt;/span&gt;&lt;span style=&quot;color:#888888;font-family:宋体, Arial, sans-serif;line-height:21.6px;background-color:#FFFFFF;&quot;&gt;2016年7月31日，巴西里约热内卢，朝鲜代表团入住奥运村举行升旗仪式，朝鲜成员佩戴的金日成、金正日徽章颇为抢镜。&lt;/span&gt;&lt;span style=&quot;color:#888888;font-family:宋体, Arial, sans-serif;line-height:21.6px;background-color:#FFFFFF;&quot;&gt;2016年7月31日，巴西里约热内卢，朝鲜代表团入住奥运村举行升旗仪式，朝鲜成员佩戴的金日成、金正日徽章颇为抢镜。&lt;/span&gt;&lt;span style=&quot;color:#888888;font-family:宋体, Arial, sans-serif;line-height:21.6px;background-color:#FFFFFF;&quot;&gt;2016年7月31日，巴西里约热内卢，朝鲜代表团入住奥运村举行升旗仪式，朝鲜成员佩戴的金日成、金正日徽章颇为抢镜。&lt;/span&gt;&lt;span style=&quot;color:#888888;font-family:宋体, Arial, sans-serif;line-height:21.6px;background-color:#FFFFFF;&quot;&gt;2016年7月31日，巴西里约热内卢，朝鲜代表团入住奥运村举行升旗仪式，朝鲜成员佩戴的金日成、金正日徽章颇为抢镜。&lt;/span&gt;', 1470070106, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mat_position`
--

CREATE TABLE `mat_position` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `description` char(100) DEFAULT NULL,
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_position`
--

INSERT INTO `mat_position` (`id`, `name`, `status`, `description`, `create_time`, `update_time`) VALUES
(1, '首页大图', 1, '展示首页大图的推荐位1', 1455634352, 0),
(4, '首页娱乐', 1, '娱乐内容推荐位', 1456665873, 0),
(2, '首页新闻', 1, '新闻内容推荐位', 1456665873, 0),
(3, '首页科技', 1, '科技内容推荐位', 1456665873, 0),
(5, '首页体育', 1, '体育内容推荐位', 1456665873, 0);

-- --------------------------------------------------------

--
-- 表的结构 `mat_position_content`
--

CREATE TABLE `mat_position_content` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `position_id` int(5) UNSIGNED NOT NULL,
  `title` varchar(30) NOT NULL DEFAULT '',
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) DEFAULT NULL,
  `news_id` mediumint(8) UNSIGNED NOT NULL,
  `listorder` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `update_time` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mat_position_content`
--

INSERT INTO `mat_position_content` (`id`, `position_id`, `title`, `thumb`, `url`, `news_id`, `listorder`, `status`, `create_time`, `update_time`) VALUES
(80, 4, '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', '/upload/2016/07/29/579b6907d160b.jpg', NULL, 26, 0, -1, 1469120150, 0),
(81, 5, '你想要 iPhone 7 在哪方面做出改变？', '/upload/2016/07/29/579b69753566f.jpg', NULL, 19, 0, -1, 1456673467, 0),
(76, 3, '均衡与旗舰？魅族 MX6 / PRO 6 主观对比体验', '/upload/2016/07/29/579b693631ec7.jpg', NULL, 25, 0, 1, 1469120042, 0),
(77, 3, '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', '/upload/2016/07/29/579b6907d160b.jpg', NULL, 26, 0, 1, 1469120150, 0),
(79, 4, '均衡与旗舰？魅族 MX6 / PRO 6 主观对比体验', '/upload/2016/07/29/579b693631ec7.jpg', NULL, 25, 0, -1, 1469120042, 0),
(78, 4, '你想要 iPhone 7 在哪方面做出改变？', '/upload/2016/07/29/579b69753566f.jpg', NULL, 19, 0, -1, 1456673467, 0),
(55, 1, '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', '/upload/2016/07/29/579b6907d160b.jpg', NULL, 26, 3, 1, 1469120150, 0),
(54, 1, '均衡与旗舰？魅族 MX6 / PRO 6 主观对比体验', '/upload/2016/07/29/579b693631ec7.jpg', NULL, 25, 1, 1, 1469120042, 0),
(53, 1, '你想要 iPhone 7 在哪方面做出改变？', '/upload/2016/07/29/579b69753566f.jpg', NULL, 19, 0, 1, 1456673467, 0),
(75, 3, '你想要 iPhone 7 在哪方面做出改变？', '/upload/2016/07/29/579b69753566f.jpg', NULL, 19, 0, 1, 1456673467, 0),
(73, 2, '重庆美女球迷争芳斗艳', '', NULL, 23, 0, 1, 1457855680, 0),
(74, 2, '中超-汪嵩世界波制胜 富力客场1-0力擒泰达', '', NULL, 24, 0, 1, 1457856460, 0),
(72, 2, '习近平今日下午出席解放军代表团全体会议', '', NULL, 21, 0, 1, 1457854896, 0),
(82, 5, '均衡与旗舰？魅族 MX6 / PRO 6 主观对比体验', '/upload/2016/07/29/579b693631ec7.jpg', NULL, 25, 0, -1, 1469120042, 0),
(83, 5, '致命诱惑，Galaxy S7 edge 蝙蝠侠特别版', '/upload/2016/07/29/579b6907d160b.jpg', NULL, 26, 0, -1, 1469120150, 0),
(84, 4, '《新大头儿子和小头爸爸2一日成才》全国上映', '/upload/2016/08/02/579f7847c8f23.jpg', NULL, 27, 0, 1, 1470068843, 0),
(85, 4, '《大鱼海棠》迟来12年是“神坑”还是“神作”', '/upload/2016/08/02/579f79ae0c72f.jpg', NULL, 28, 0, 1, 1470069213, 0),
(86, 4, '不撕逼没人看！女神们离“现象级”很远', '/upload/2016/08/02/579f7a5180e77.jpg', NULL, 29, 0, 1, 1470069353, 0),
(87, 5, '巴赫出席新闻发布会回应治安问题 称奥运村很棒', '/upload/2016/08/02/579f7be008fa4.jpg', NULL, 30, 0, 1, 1470069758, 0),
(88, 5, 'NO.1 孙杨已做好一切准备', '/upload/2016/08/02/579f7cbada46e.jpg', NULL, 31, 0, 1, 1470069967, 0),
(89, 5, '朝鲜入驻奥运村举行升旗 金日成徽章抢镜', '/upload/2016/08/02/579f7d43d60cb.jpg', NULL, 32, 0, 1, 1470070106, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mat_admin`
--
ALTER TABLE `mat_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `mat_menu`
--
ALTER TABLE `mat_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `listorder` (`listorder`),
  ADD KEY `parentid` (`parentid`),
  ADD KEY `module` (`m`,`c`,`f`);

--
-- Indexes for table `mat_news`
--
ALTER TABLE `mat_news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `status` (`status`,`listorder`,`news_id`),
  ADD KEY `listorder` (`catid`,`status`,`listorder`,`news_id`),
  ADD KEY `catid` (`catid`,`status`,`news_id`);

--
-- Indexes for table `mat_news_content`
--
ALTER TABLE `mat_news_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `mat_position`
--
ALTER TABLE `mat_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mat_position_content`
--
ALTER TABLE `mat_position_content`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mat_admin`
--
ALTER TABLE `mat_admin`
  MODIFY `admin_id` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `mat_menu`
--
ALTER TABLE `mat_menu`
  MODIFY `menu_id` smallint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- 使用表AUTO_INCREMENT `mat_news`
--
ALTER TABLE `mat_news`
  MODIFY `news_id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- 使用表AUTO_INCREMENT `mat_news_content`
--
ALTER TABLE `mat_news_content`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 使用表AUTO_INCREMENT `mat_position`
--
ALTER TABLE `mat_position`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- 使用表AUTO_INCREMENT `mat_position_content`
--
ALTER TABLE `mat_position_content`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
