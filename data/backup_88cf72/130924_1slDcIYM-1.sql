# Identify: MTM3OTk5MjA5NywyLjAsdWNob21lcyxtdWx0aXZvbCwx
# <?exit();?>
# UCenter Home Multi-Volume Data Dump Vol.1
# Version: UCenter Home 2.0
# Time: 2013-09-24 11:08:17
# Type: uchomes
# Table Prefix: tdgeos_uchome_
#
# UCenter Home: http://u.discuz.net
# Please visit our website for newest infomation about UCenter Home
# ---------------------------------------------------------


DROP TABLE IF EXISTS tdgeos_uchome_ad;
CREATE TABLE tdgeos_uchome_ad (
  adid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '1',
  title varchar(50) NOT NULL DEFAULT '',
  pagetype varchar(20) NOT NULL DEFAULT '',
  adcode text NOT NULL,
  system tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (adid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_adminsession;
CREATE TABLE tdgeos_uchome_adminsession (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  ip char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  errorcount tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_adminsession VALUES ('1','61.149.197.132','1379992097','-1');

DROP TABLE IF EXISTS tdgeos_uchome_album;
CREATE TABLE tdgeos_uchome_album (
  albumid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  albumname varchar(50) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  updatetime int(10) unsigned NOT NULL DEFAULT '0',
  picnum smallint(6) unsigned NOT NULL DEFAULT '0',
  pic varchar(60) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(10) NOT NULL DEFAULT '',
  target_ids text NOT NULL,
  PRIMARY KEY (albumid),
  KEY uid (uid,updatetime),
  KEY updatetime (updatetime)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO tdgeos_uchome_album VALUES ('1','鎴戠殑鐩稿唽','2','jhonm','1379237183','1379237183','1','201309/15/2_1379237183sk1T.jpg.thumb.jpg','1','0','','');

DROP TABLE IF EXISTS tdgeos_uchome_appcreditlog;
CREATE TABLE tdgeos_uchome_appcreditlog (
  logid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appname varchar(60) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  credit mediumint(8) unsigned NOT NULL DEFAULT '0',
  note text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (logid),
  KEY uid (uid,dateline),
  KEY appid (appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_blacklist;
CREATE TABLE tdgeos_uchome_blacklist (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  buid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,buid),
  KEY uid (uid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_block;
CREATE TABLE tdgeos_uchome_block (
  bid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  blockname varchar(40) NOT NULL DEFAULT '',
  blocksql text NOT NULL,
  cachename varchar(30) NOT NULL DEFAULT '',
  cachetime smallint(6) unsigned NOT NULL DEFAULT '0',
  startnum tinyint(3) unsigned NOT NULL DEFAULT '0',
  num tinyint(3) unsigned NOT NULL DEFAULT '0',
  perpage tinyint(3) unsigned NOT NULL DEFAULT '0',
  htmlcode text NOT NULL,
  PRIMARY KEY (bid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_blog;
CREATE TABLE tdgeos_uchome_blog (
  blogid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  classid smallint(6) unsigned NOT NULL DEFAULT '0',
  viewnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  replynum mediumint(8) unsigned NOT NULL DEFAULT '0',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  pic char(120) NOT NULL DEFAULT '',
  picflag tinyint(1) NOT NULL DEFAULT '0',
  noreply tinyint(1) NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  `password` char(10) NOT NULL DEFAULT '',
  click_1 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_2 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_3 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_4 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_5 smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (blogid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_blogfield;
CREATE TABLE tdgeos_uchome_blogfield (
  blogid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tag varchar(255) NOT NULL DEFAULT '',
  message mediumtext NOT NULL,
  postip varchar(20) NOT NULL DEFAULT '',
  related text NOT NULL,
  relatedtime int(10) unsigned NOT NULL DEFAULT '0',
  target_ids text NOT NULL,
  hotuser text NOT NULL,
  magiccolor tinyint(6) NOT NULL DEFAULT '0',
  magicpaper tinyint(6) NOT NULL DEFAULT '0',
  magiccall tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (blogid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_class;
CREATE TABLE tdgeos_uchome_class (
  classid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  classname char(40) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (classid),
  KEY uid (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_click;
CREATE TABLE tdgeos_uchome_click (
  clickid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  icon varchar(100) NOT NULL DEFAULT '',
  idtype varchar(15) NOT NULL DEFAULT '',
  displayorder tinyint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (clickid),
  KEY idtype (idtype,displayorder)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 AUTO_INCREMENT=16;

INSERT INTO tdgeos_uchome_click VALUES ('1','璺繃','luguo.gif','blogid','0');
INSERT INTO tdgeos_uchome_click VALUES ('2','闆蜂汉','leiren.gif','blogid','0');
INSERT INTO tdgeos_uchome_click VALUES ('3','鎻℃墜','woshou.gif','blogid','0');
INSERT INTO tdgeos_uchome_click VALUES ('4','椴滆姳','xianhua.gif','blogid','0');
INSERT INTO tdgeos_uchome_click VALUES ('5','楦¤泲','jidan.gif','blogid','0');
INSERT INTO tdgeos_uchome_click VALUES ('6','婕備寒','piaoliang.gif','picid','0');
INSERT INTO tdgeos_uchome_click VALUES ('7','閰锋瘷','kubi.gif','picid','0');
INSERT INTO tdgeos_uchome_click VALUES ('8','闆蜂汉','leiren.gif','picid','0');
INSERT INTO tdgeos_uchome_click VALUES ('9','椴滆姳','xianhua.gif','picid','0');
INSERT INTO tdgeos_uchome_click VALUES ('10','楦¤泲','jidan.gif','picid','0');
INSERT INTO tdgeos_uchome_click VALUES ('11','鎼炵瑧','gaoxiao.gif','tid','0');
INSERT INTO tdgeos_uchome_click VALUES ('12','杩锋儜','mihuo.gif','tid','0');
INSERT INTO tdgeos_uchome_click VALUES ('13','闆蜂汉','leiren.gif','tid','0');
INSERT INTO tdgeos_uchome_click VALUES ('14','椴滆姳','xianhua.gif','tid','0');
INSERT INTO tdgeos_uchome_click VALUES ('15','楦¤泲','jidan.gif','tid','0');

DROP TABLE IF EXISTS tdgeos_uchome_clickuser;
CREATE TABLE tdgeos_uchome_clickuser (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype varchar(15) NOT NULL DEFAULT '',
  clickid smallint(6) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  KEY id (id,idtype,dateline),
  KEY uid (uid,idtype,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_comment;
CREATE TABLE tdgeos_uchome_comment (
  cid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype varchar(20) NOT NULL DEFAULT '',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  author varchar(15) NOT NULL DEFAULT '',
  ip varchar(20) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  magicflicker tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY authorid (authorid,idtype),
  KEY id (id,idtype,dateline)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3;

INSERT INTO tdgeos_uchome_comment VALUES ('1','2','1','picid','2','jhonm','61.149.193.120','1379237194','涓夊ぇ','0');
INSERT INTO tdgeos_uchome_comment VALUES ('2','2','1','picid','2','jhonm','61.149.193.120','1379237226','<img src=\"image/face/4.gif\" class=\"face\">','0');

DROP TABLE IF EXISTS tdgeos_uchome_config;
CREATE TABLE tdgeos_uchome_config (
  var varchar(30) NOT NULL DEFAULT '',
  datavalue text NOT NULL,
  PRIMARY KEY (var)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_config VALUES ('sitename','鎴戠殑绌洪棿');
INSERT INTO tdgeos_uchome_config VALUES ('template','default');
INSERT INTO tdgeos_uchome_config VALUES ('adminemail','webmaster@uhome.study365.org');
INSERT INTO tdgeos_uchome_config VALUES ('onlinehold','1800');
INSERT INTO tdgeos_uchome_config VALUES ('timeoffset','8');
INSERT INTO tdgeos_uchome_config VALUES ('maxpage','100');
INSERT INTO tdgeos_uchome_config VALUES ('starcredit','100');
INSERT INTO tdgeos_uchome_config VALUES ('starlevelnum','5');
INSERT INTO tdgeos_uchome_config VALUES ('cachemode','database');
INSERT INTO tdgeos_uchome_config VALUES ('cachegrade','0');
INSERT INTO tdgeos_uchome_config VALUES ('allowcache','1');
INSERT INTO tdgeos_uchome_config VALUES ('allowdomain','0');
INSERT INTO tdgeos_uchome_config VALUES ('allowrewrite','0');
INSERT INTO tdgeos_uchome_config VALUES ('allowwatermark','0');
INSERT INTO tdgeos_uchome_config VALUES ('allowftp','0');
INSERT INTO tdgeos_uchome_config VALUES ('holddomain','www|*blog*|*space*|x');
INSERT INTO tdgeos_uchome_config VALUES ('mtagminnum','5');
INSERT INTO tdgeos_uchome_config VALUES ('feedday','7');
INSERT INTO tdgeos_uchome_config VALUES ('feedmaxnum','100');
INSERT INTO tdgeos_uchome_config VALUES ('feedfilternum','10');
INSERT INTO tdgeos_uchome_config VALUES ('importnum','100');
INSERT INTO tdgeos_uchome_config VALUES ('maxreward','10');
INSERT INTO tdgeos_uchome_config VALUES ('singlesent','50');
INSERT INTO tdgeos_uchome_config VALUES ('groupnum','8');
INSERT INTO tdgeos_uchome_config VALUES ('closeregister','0');
INSERT INTO tdgeos_uchome_config VALUES ('closeinvite','0');
INSERT INTO tdgeos_uchome_config VALUES ('close','0');
INSERT INTO tdgeos_uchome_config VALUES ('networkpublic','1');
INSERT INTO tdgeos_uchome_config VALUES ('networkpage','1');
INSERT INTO tdgeos_uchome_config VALUES ('seccode_register','1');
INSERT INTO tdgeos_uchome_config VALUES ('uc_tagrelated','1');
INSERT INTO tdgeos_uchome_config VALUES ('manualmoderator','1');
INSERT INTO tdgeos_uchome_config VALUES ('linkguide','1');
INSERT INTO tdgeos_uchome_config VALUES ('showall','1');
INSERT INTO tdgeos_uchome_config VALUES ('sendmailday','0');
INSERT INTO tdgeos_uchome_config VALUES ('realname','0');
INSERT INTO tdgeos_uchome_config VALUES ('namecheck','0');
INSERT INTO tdgeos_uchome_config VALUES ('namechange','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowviewspace','1');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowfriend','1');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowpoke','1');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowdoing','1');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowblog','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowalbum','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowthread','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowshare','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowcomment','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowpost','0');
INSERT INTO tdgeos_uchome_config VALUES ('showallfriendnum','10');
INSERT INTO tdgeos_uchome_config VALUES ('feedtargetblank','1');
INSERT INTO tdgeos_uchome_config VALUES ('feedread','1');
INSERT INTO tdgeos_uchome_config VALUES ('feedhotnum','3');
INSERT INTO tdgeos_uchome_config VALUES ('feedhotday','2');
INSERT INTO tdgeos_uchome_config VALUES ('feedhotmin','3');
INSERT INTO tdgeos_uchome_config VALUES ('feedhiddenicon','friend,profile,task,wall');
INSERT INTO tdgeos_uchome_config VALUES ('uc_tagrelatedtime','86400');
INSERT INTO tdgeos_uchome_config VALUES ('privacy','a:2:{s:4:\"view\";a:12:{s:5:\"index\";i:0;s:7:\"profile\";i:0;s:6:\"friend\";i:0;s:4:\"wall\";i:0;s:4:\"feed\";i:0;s:4:\"mtag\";i:0;s:5:\"event\";i:0;s:5:\"doing\";i:0;s:4:\"blog\";i:0;s:5:\"album\";i:0;s:5:\"share\";i:0;s:4:\"poll\";i:0;}s:4:\"feed\";a:21:{s:5:\"doing\";i:1;s:4:\"blog\";i:1;s:6:\"upload\";i:1;s:5:\"share\";i:1;s:4:\"poll\";i:1;s:8:\"joinpoll\";i:1;s:6:\"thread\";i:1;s:4:\"post\";i:1;s:4:\"mtag\";i:1;s:5:\"event\";i:1;s:4:\"join\";i:1;s:6:\"friend\";i:1;s:7:\"comment\";i:1;s:4:\"show\";i:1;s:9:\"spaceopen\";i:1;s:6:\"credit\";i:1;s:6:\"invite\";i:1;s:4:\"task\";i:1;s:7:\"profile\";i:1;s:5:\"album\";i:1;s:5:\"click\";i:1;}}');
INSERT INTO tdgeos_uchome_config VALUES ('cronnextrun','1379989920');
INSERT INTO tdgeos_uchome_config VALUES ('my_status','0');
INSERT INTO tdgeos_uchome_config VALUES ('uniqueemail','1');
INSERT INTO tdgeos_uchome_config VALUES ('updatestat','1');
INSERT INTO tdgeos_uchome_config VALUES ('my_showgift','1');
INSERT INTO tdgeos_uchome_config VALUES ('topcachetime','60');
INSERT INTO tdgeos_uchome_config VALUES ('newspacenum','3');
INSERT INTO tdgeos_uchome_config VALUES ('sitekey','e360fc2E340313EM');
INSERT INTO tdgeos_uchome_config VALUES ('siteallurl','');
INSERT INTO tdgeos_uchome_config VALUES ('licensed','0');
INSERT INTO tdgeos_uchome_config VALUES ('debuginfo','0');
INSERT INTO tdgeos_uchome_config VALUES ('miibeian','');
INSERT INTO tdgeos_uchome_config VALUES ('headercharset','0');
INSERT INTO tdgeos_uchome_config VALUES ('avatarreal','0');
INSERT INTO tdgeos_uchome_config VALUES ('uc_dir','');
INSERT INTO tdgeos_uchome_config VALUES ('my_ip','');
INSERT INTO tdgeos_uchome_config VALUES ('closereason','');
INSERT INTO tdgeos_uchome_config VALUES ('checkemail','0');
INSERT INTO tdgeos_uchome_config VALUES ('regipdate','');
INSERT INTO tdgeos_uchome_config VALUES ('my_closecheckupdate','0');
INSERT INTO tdgeos_uchome_config VALUES ('openxmlrpc','0');
INSERT INTO tdgeos_uchome_config VALUES ('domainroot','');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowpoll','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowevent','0');
INSERT INTO tdgeos_uchome_config VALUES ('name_allowuserapp','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowviewphoto','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowfriend','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowpoke','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowwall','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowcomment','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowdoing','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowblog','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowalbum','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowthread','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowpoll','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowevent','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowshare','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowpost','0');
INSERT INTO tdgeos_uchome_config VALUES ('video_allowuserapp','0');
INSERT INTO tdgeos_uchome_config VALUES ('ftpurl','');
INSERT INTO tdgeos_uchome_config VALUES ('newspaceavatar','0');
INSERT INTO tdgeos_uchome_config VALUES ('newspacerealname','0');
INSERT INTO tdgeos_uchome_config VALUES ('newspacevideophoto','0');

DROP TABLE IF EXISTS tdgeos_uchome_creditlog;
CREATE TABLE tdgeos_uchome_creditlog (
  clid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  rid mediumint(8) unsigned NOT NULL DEFAULT '0',
  total mediumint(8) unsigned NOT NULL DEFAULT '0',
  cyclenum mediumint(8) unsigned NOT NULL DEFAULT '0',
  credit mediumint(8) unsigned NOT NULL DEFAULT '0',
  experience mediumint(8) unsigned NOT NULL DEFAULT '0',
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  info text NOT NULL,
  `user` text NOT NULL,
  app text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (clid),
  KEY uid (uid,rid),
  KEY dateline (dateline)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 AUTO_INCREMENT=15;

INSERT INTO tdgeos_uchome_creditlog VALUES ('1','3','1','1','1','10','0','0','','','','1377503281');
INSERT INTO tdgeos_uchome_creditlog VALUES ('2','3','10','1','1','15','15','0','','','','1377503281');
INSERT INTO tdgeos_uchome_creditlog VALUES ('3','1','1','1','1','10','0','0','','','','1377503322');
INSERT INTO tdgeos_uchome_creditlog VALUES ('4','1','10','15','1','15','15','0','','','','1379987696');
INSERT INTO tdgeos_uchome_creditlog VALUES ('5','4','1','1','1','10','0','0','','','','1377585422');
INSERT INTO tdgeos_uchome_creditlog VALUES ('6','4','10','1','1','15','15','0','','','','1377585422');
INSERT INTO tdgeos_uchome_creditlog VALUES ('7','2','1','1','1','10','0','0','','','','1378510254');
INSERT INTO tdgeos_uchome_creditlog VALUES ('8','2','10','4','1','15','15','0','','','','1379338492');
INSERT INTO tdgeos_uchome_creditlog VALUES ('9','5','1','1','1','10','0','0','','','','1378800605');
INSERT INTO tdgeos_uchome_creditlog VALUES ('10','5','10','4','1','15','15','0','','','','1379832874');
INSERT INTO tdgeos_uchome_creditlog VALUES ('11','5','3','1','1','40','40','0','','','','1378801355');
INSERT INTO tdgeos_uchome_creditlog VALUES ('12','2','11','1','1','1','1','0','','5','','1379225211');
INSERT INTO tdgeos_uchome_creditlog VALUES ('13','2','17','1','1','2','2','0','','','','1379237183');
INSERT INTO tdgeos_uchome_creditlog VALUES ('14','1','5','1','1','15','15','0','','','','1379856461');

DROP TABLE IF EXISTS tdgeos_uchome_creditrule;
CREATE TABLE tdgeos_uchome_creditrule (
  rid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  rulename char(20) NOT NULL DEFAULT '',
  `action` char(20) NOT NULL DEFAULT '',
  cycletype tinyint(1) NOT NULL DEFAULT '0',
  cycletime int(10) NOT NULL DEFAULT '0',
  rewardnum tinyint(2) NOT NULL DEFAULT '1',
  rewardtype tinyint(1) NOT NULL DEFAULT '1',
  norepeat tinyint(1) NOT NULL DEFAULT '0',
  credit mediumint(8) unsigned NOT NULL DEFAULT '0',
  experience mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (rid),
  KEY `action` (`action`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 AUTO_INCREMENT=48;

INSERT INTO tdgeos_uchome_creditrule VALUES ('1','寮€閫氱┖闂?,'register','0','0','1','1','0','10','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('2','瀹炲悕璁よ瘉','realname','0','0','1','1','0','20','20');
INSERT INTO tdgeos_uchome_creditrule VALUES ('3','閭璁よ瘉','realemail','0','0','1','1','0','40','40');
INSERT INTO tdgeos_uchome_creditrule VALUES ('4','鎴愬姛閭€璇峰ソ鍙?,'invitefriend','4','0','20','1','0','10','10');
INSERT INTO tdgeos_uchome_creditrule VALUES ('5','璁剧疆澶村儚','setavatar','0','0','1','1','0','15','15');
INSERT INTO tdgeos_uchome_creditrule VALUES ('6','瑙嗛璁よ瘉','videophoto','0','0','1','1','0','40','40');
INSERT INTO tdgeos_uchome_creditrule VALUES ('7','鎴愬姛涓炬姤','report','4','0','0','1','0','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('8','鏇存柊璁板綍','updatemood','1','0','3','1','0','3','3');
INSERT INTO tdgeos_uchome_creditrule VALUES ('9','鐑偣淇℃伅','hotinfo','4','0','0','1','0','10','10');
INSERT INTO tdgeos_uchome_creditrule VALUES ('10','姣忓ぉ鐧婚檰','daylogin','1','0','1','1','0','15','15');
INSERT INTO tdgeos_uchome_creditrule VALUES ('11','璁块棶鍒汉绌洪棿','visit','1','0','10','1','2','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('12','鎵撴嫑鍛?,'poke','1','0','10','1','2','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('13','鐣欒█','guestbook','1','0','20','1','2','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('14','琚暀瑷€','getguestbook','1','0','5','1','2','1','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('15','鍙戣〃璁板綍','doing','1','0','5','1','0','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('16','鍙戣〃鍏憡','publishblog','1','0','3','1','0','5','5');
INSERT INTO tdgeos_uchome_creditrule VALUES ('17','涓婁紶鍥剧墖','uploadimage','1','0','10','1','0','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('18','鎷嶅ぇ澶磋创','camera','1','0','5','1','0','3','3');
INSERT INTO tdgeos_uchome_creditrule VALUES ('19','鍙戣〃璇濋','publishthread','1','0','5','1','0','5','5');
INSERT INTO tdgeos_uchome_creditrule VALUES ('20','鍥炲璇濋','replythread','1','0','10','1','1','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('21','鍒涘缓鎶曠エ','createpoll','1','0','5','1','0','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('22','鍙備笌鎶曠エ','joinpoll','1','0','10','1','1','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('23','鍙戣捣娲诲姩','createevent','1','0','1','1','0','3','3');
INSERT INTO tdgeos_uchome_creditrule VALUES ('24','鍙備笌娲诲姩','joinevent','1','0','1','1','1','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('25','鎺ㄨ崘娲诲姩','recommendevent','4','0','0','1','0','10','10');
INSERT INTO tdgeos_uchome_creditrule VALUES ('26','鍙戣捣鍒嗕韩','createshare','1','0','3','1','0','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('27','璇勮','comment','1','0','40','1','1','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('28','琚瘎璁?,'getcomment','1','0','20','1','1','1','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('29','瀹夎搴旂敤','installapp','4','0','0','1','3','5','5');
INSERT INTO tdgeos_uchome_creditrule VALUES ('30','浣跨敤搴旂敤','useapp','1','0','10','1','3','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('31','淇℃伅琛ㄦ€?,'click','1','0','10','1','1','1','1');
INSERT INTO tdgeos_uchome_creditrule VALUES ('32','淇敼瀹炲悕','editrealname','0','0','1','0','0','5','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('33','鏇存敼閭璁よ瘉','editrealemail','0','0','1','0','0','5','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('34','澶村儚琚垹闄?,'delavatar','0','0','1','0','0','10','10');
INSERT INTO tdgeos_uchome_creditrule VALUES ('35','鑾峰彇閭€璇风爜','invitecode','0','0','1','0','0','0','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('36','鎼滅储涓€娆?,'search','0','0','1','0','0','1','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('37','鍏憡瀵煎叆','blogimport','0','0','1','0','0','10','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('38','淇敼鍩熷悕','modifydomain','0','0','1','0','0','5','0');
INSERT INTO tdgeos_uchome_creditrule VALUES ('39','鍏憡琚垹闄?,'delblog','0','0','1','0','0','10','10');
INSERT INTO tdgeos_uchome_creditrule VALUES ('40','璁板綍琚垹闄?,'deldoing','0','0','1','0','0','2','2');
INSERT INTO tdgeos_uchome_creditrule VALUES ('41','鍥剧墖琚垹闄?,'delimage','0','0','1','0','0','4','4');
INSERT INTO tdgeos_uchome_creditrule VALUES ('42','鎶曠エ琚垹闄?,'delpoll','0','0','1','0','0','4','4');
INSERT INTO tdgeos_uchome_creditrule VALUES ('43','璇濋琚垹闄?,'delthread','0','0','1','0','0','4','4');
INSERT INTO tdgeos_uchome_creditrule VALUES ('44','娲诲姩琚垹闄?,'delevent','0','0','1','0','0','6','6');
INSERT INTO tdgeos_uchome_creditrule VALUES ('45','鍒嗕韩琚垹闄?,'delshare','0','0','1','0','0','4','4');
INSERT INTO tdgeos_uchome_creditrule VALUES ('46','鐣欒█琚垹闄?,'delguestbook','0','0','1','0','0','4','4');
INSERT INTO tdgeos_uchome_creditrule VALUES ('47','璇勮琚垹闄?,'delcomment','0','0','1','0','0','2','2');

DROP TABLE IF EXISTS tdgeos_uchome_cron;
CREATE TABLE tdgeos_uchome_cron (
  cronid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  filename char(50) NOT NULL DEFAULT '',
  lastrun int(10) unsigned NOT NULL DEFAULT '0',
  nextrun int(10) unsigned NOT NULL DEFAULT '0',
  weekday tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (cronid),
  KEY nextrun (available,nextrun)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 AUTO_INCREMENT=6;

INSERT INTO tdgeos_uchome_cron VALUES ('1','1','system','鏇存柊娴忚鏁扮粺璁?,'log.php','1379991443','1379991600','-1','-1','-1','0	5	10	15	20	25	30	35	40	45	50	55');
INSERT INTO tdgeos_uchome_cron VALUES ('2','1','system','娓呯悊杩囨湡feed','cleanfeed.php','1379987760','1380049440','-1','-1','3','4');
INSERT INTO tdgeos_uchome_cron VALUES ('3','1','system','娓呯悊涓汉閫氱煡','cleannotification.php','1379987761','1380056760','-1','-1','5','6');
INSERT INTO tdgeos_uchome_cron VALUES ('4','1','system','鍚屾UC鐨刦eed','getfeed.php','1379989623','1379989920','-1','-1','-1','2	7	12	17	22	27	32	37	42	47	52');
INSERT INTO tdgeos_uchome_cron VALUES ('5','1','system','娓呯悊鑴氬嵃鍜屾渶鏂拌瀹?,'cleantrace.php','1379987760','1380045780','-1','-1','2','3');

DROP TABLE IF EXISTS tdgeos_uchome_data;
CREATE TABLE tdgeos_uchome_data (
  var varchar(20) NOT NULL DEFAULT '',
  datavalue text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (var)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_data VALUES ('mail','a:9:{s:8:\"mailsend\";s:1:\"2\";s:13:\"maildelimiter\";s:1:\"0\";s:12:\"mailusername\";s:1:\"1\";s:6:\"server\";s:18:\"smtp.exmail.qq.com\";s:4:\"port\";s:2:\"25\";s:4:\"auth\";s:1:\"1\";s:4:\"from\";s:19:\"tdgeos@study365.org\";s:13:\"auth_username\";s:19:\"tdgeos@study365.org\";s:13:\"auth_password\";s:12:\"AB1234567890\";}','1379340381');
INSERT INTO tdgeos_uchome_data VALUES ('setting','a:14:{s:10:\"thumbwidth\";s:3:\"100\";s:11:\"thumbheight\";s:3:\"100\";s:13:\"maxthumbwidth\";s:0:\"\";s:14:\"maxthumbheight\";s:0:\"\";s:13:\"watermarkfile\";s:0:\"\";s:12:\"watermarkpos\";s:1:\"4\";s:6:\"ftpssl\";s:1:\"0\";s:7:\"ftphost\";s:0:\"\";s:7:\"ftpport\";s:0:\"\";s:7:\"ftpuser\";s:0:\"\";s:11:\"ftppassword\";s:0:\"\";s:7:\"ftppasv\";s:1:\"0\";s:6:\"ftpdir\";s:0:\"\";s:10:\"ftptimeout\";s:0:\"\";}','1379340381');
INSERT INTO tdgeos_uchome_data VALUES ('network','a:5:{s:4:\"blog\";a:2:{s:4:\"hot1\";s:1:\"3\";s:5:\"cache\";s:3:\"600\";}s:3:\"pic\";a:2:{s:4:\"hot1\";s:1:\"3\";s:5:\"cache\";s:3:\"700\";}s:6:\"thread\";a:2:{s:4:\"hot1\";s:1:\"3\";s:5:\"cache\";s:3:\"800\";}s:5:\"event\";a:1:{s:5:\"cache\";s:3:\"900\";}s:4:\"poll\";a:1:{s:5:\"cache\";s:3:\"500\";}}','1377503266');
INSERT INTO tdgeos_uchome_data VALUES ('newspacelist','a:3:{i:0;a:6:{s:3:\"uid\";s:1:\"5\";s:8:\"username\";s:8:\"wzxaini9\";s:4:\"name\";s:0:\"\";s:10:\"namestatus\";s:1:\"0\";s:11:\"videostatus\";s:1:\"0\";s:8:\"dateline\";s:10:\"1378800605\";}i:1;a:6:{s:3:\"uid\";s:1:\"4\";s:8:\"username\";s:6:\"cjhonm\";s:4:\"name\";s:0:\"\";s:10:\"namestatus\";s:1:\"0\";s:11:\"videostatus\";s:1:\"0\";s:8:\"dateline\";s:10:\"1377585422\";}i:2;a:6:{s:3:\"uid\";s:1:\"3\";s:8:\"username\";s:8:\"admin110\";s:4:\"name\";s:0:\"\";s:10:\"namestatus\";s:1:\"0\";s:11:\"videostatus\";s:1:\"0\";s:8:\"dateline\";s:10:\"1377503281\";}}','1378800605');
INSERT INTO tdgeos_uchome_data VALUES ('reason','','0');
INSERT INTO tdgeos_uchome_data VALUES ('registerrule','','0');
INSERT INTO tdgeos_uchome_data VALUES ('backupdir','88cf72','1379992094');

DROP TABLE IF EXISTS tdgeos_uchome_docomment;
CREATE TABLE tdgeos_uchome_docomment (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  upid int(10) unsigned NOT NULL DEFAULT '0',
  doid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  ip varchar(20) NOT NULL DEFAULT '',
  grade smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY doid (doid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_doing;
CREATE TABLE tdgeos_uchome_doing (
  doid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  `from` varchar(20) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  ip varchar(20) NOT NULL DEFAULT '',
  replynum int(10) unsigned NOT NULL DEFAULT '0',
  mood smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (doid),
  KEY uid (uid,dateline),
  KEY dateline (dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_event;
CREATE TABLE tdgeos_uchome_event (
  eventid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  title varchar(80) NOT NULL DEFAULT '',
  classid smallint(6) unsigned NOT NULL DEFAULT '0',
  province varchar(20) NOT NULL DEFAULT '',
  city varchar(20) NOT NULL DEFAULT '',
  location varchar(80) NOT NULL DEFAULT '',
  poster varchar(60) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  deadline int(10) unsigned NOT NULL DEFAULT '0',
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  public tinyint(3) NOT NULL DEFAULT '0',
  membernum mediumint(8) unsigned NOT NULL DEFAULT '0',
  follownum mediumint(8) unsigned NOT NULL DEFAULT '0',
  viewnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  grade tinyint(3) NOT NULL DEFAULT '0',
  recommendtime int(10) unsigned NOT NULL DEFAULT '0',
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  picnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  threadnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  updatetime int(10) unsigned NOT NULL DEFAULT '0',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (eventid),
  KEY grade (grade,recommendtime),
  KEY membernum (membernum),
  KEY uid (uid,eventid),
  KEY tagid (tagid,eventid),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_eventclass;
CREATE TABLE tdgeos_uchome_eventclass (
  classid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  classname varchar(80) NOT NULL DEFAULT '',
  poster tinyint(1) NOT NULL DEFAULT '0',
  template text NOT NULL,
  displayorder mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (classid),
  UNIQUE KEY classname (classname)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

INSERT INTO tdgeos_uchome_eventclass VALUES ('1','鐢熸椿/鑱氫細','0','璐圭敤璇存槑锛歕r\n闆嗗悎鍦扮偣锛歕r\n鐫€瑁呰姹傦細\r\n鑱旂郴鏂瑰紡锛歕r\n娉ㄦ剰浜嬮」锛?,'1');
INSERT INTO tdgeos_uchome_eventclass VALUES ('2','鍑鸿/鏃呮父','0','璺嚎璇存槑:\r\n璐圭敤璇存槑:\r\n瑁呭瑕佹眰:\r\n浜ら€氬伐鍏?\r\n闆嗗悎鍦扮偣:\r\n鑱旂郴鏂瑰紡:\r\n娉ㄦ剰浜嬮」:','2');
INSERT INTO tdgeos_uchome_eventclass VALUES ('3','姣旇禌/杩愬姩','0','璐圭敤璇存槑锛歕r\n闆嗗悎鍦扮偣锛歕r\n鐫€瑁呰姹傦細\r\n鍦哄湴浠嬬粛锛歕r\n鑱旂郴鏂瑰紡锛歕r\n娉ㄦ剰浜嬮」锛?,'4');
INSERT INTO tdgeos_uchome_eventclass VALUES ('4','鐢靛奖/婕斿嚭','0','鍓ф儏浠嬬粛锛歕r\n璐圭敤璇存槑锛歕r\n闆嗗悎鍦扮偣锛歕r\n鑱旂郴鏂瑰紡锛歕r\n娉ㄦ剰浜嬮」锛?,'3');
INSERT INTO tdgeos_uchome_eventclass VALUES ('5','鏁欒偛/璁插骇','0','涓诲姙鍗曚綅锛歕r\n娲诲姩涓婚锛歕r\n璐圭敤璇存槑锛歕r\n闆嗗悎鍦扮偣锛歕r\n鑱旂郴鏂瑰紡锛歕r\n娉ㄦ剰浜嬮」锛?,'5');
INSERT INTO tdgeos_uchome_eventclass VALUES ('6','鍏跺畠','0','','6');

DROP TABLE IF EXISTS tdgeos_uchome_eventfield;
CREATE TABLE tdgeos_uchome_eventfield (
  eventid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  detail text NOT NULL,
  template varchar(255) NOT NULL DEFAULT '',
  limitnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  verify tinyint(1) NOT NULL DEFAULT '0',
  allowpic tinyint(1) NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowinvite tinyint(1) NOT NULL DEFAULT '0',
  allowfellow tinyint(1) NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  PRIMARY KEY (eventid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_eventinvite;
CREATE TABLE tdgeos_uchome_eventinvite (
  eventid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  touid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tousername char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (eventid,touid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_eventpic;
CREATE TABLE tdgeos_uchome_eventpic (
  picid mediumint(8) unsigned NOT NULL DEFAULT '0',
  eventid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (picid),
  KEY eventid (eventid,picid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_feed;
CREATE TABLE tdgeos_uchome_feed (
  feedid int(10) unsigned NOT NULL AUTO_INCREMENT,
  appid smallint(6) unsigned NOT NULL DEFAULT '0',
  icon varchar(30) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  friend tinyint(1) NOT NULL DEFAULT '0',
  hash_template varchar(32) NOT NULL DEFAULT '',
  hash_data varchar(32) NOT NULL DEFAULT '',
  title_template text NOT NULL,
  title_data text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image_1 varchar(255) NOT NULL DEFAULT '',
  image_1_link varchar(255) NOT NULL DEFAULT '',
  image_2 varchar(255) NOT NULL DEFAULT '',
  image_2_link varchar(255) NOT NULL DEFAULT '',
  image_3 varchar(255) NOT NULL DEFAULT '',
  image_3_link varchar(255) NOT NULL DEFAULT '',
  image_4 varchar(255) NOT NULL DEFAULT '',
  image_4_link varchar(255) NOT NULL DEFAULT '',
  target_ids text NOT NULL,
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype varchar(15) NOT NULL DEFAULT '',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (feedid),
  KEY uid (uid,dateline),
  KEY dateline (dateline),
  KEY hot (hot),
  KEY id (id,idtype)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 AUTO_INCREMENT=11;

INSERT INTO tdgeos_uchome_feed VALUES ('9','3','profile','1','admin','1379772042','0','03e4475f7a79e5ebbbe25847fba63210','db15a7b643fe99872e68215eac2929f8','{actor} 鏇存柊浜嗚嚜宸辩殑鏁欒偛鎯呭喌','a:0:{}','','a:0:{}','','','','','','','','','','','0','','0');
INSERT INTO tdgeos_uchome_feed VALUES ('10','3','profile','1','admin','1379937913','0','24ffccd31b36d7ec6f4427c5e444fb25','0438762c64ab7c317879ef2e5629f4f7','{actor} 鏇存柊浜嗚嚜宸辩殑鍩烘湰璧勬枡','a:0:{}','','a:0:{}','','','','','','','','','','','0','','0');

DROP TABLE IF EXISTS tdgeos_uchome_friend;
CREATE TABLE tdgeos_uchome_friend (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fusername varchar(15) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  gid smallint(6) unsigned NOT NULL DEFAULT '0',
  note varchar(50) NOT NULL DEFAULT '',
  num mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fuid),
  KEY fuid (fuid),
  KEY `status` (uid,`status`,num,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_friendguide;
CREATE TABLE tdgeos_uchome_friendguide (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fusername char(15) NOT NULL DEFAULT '',
  num smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fuid),
  KEY uid (uid,num)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_friendlog;
CREATE TABLE tdgeos_uchome_friendlog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action` varchar(10) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fuid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_invite;
CREATE TABLE tdgeos_uchome_invite (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `code` varchar(20) NOT NULL DEFAULT '',
  fuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fusername varchar(15) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  email varchar(100) NOT NULL DEFAULT '',
  appid mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY uid (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_log;
CREATE TABLE tdgeos_uchome_log (
  logid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype char(20) NOT NULL DEFAULT '',
  PRIMARY KEY (logid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_magic;
CREATE TABLE tdgeos_uchome_magic (
  mid varchar(15) NOT NULL DEFAULT '',
  `name` varchar(30) NOT NULL DEFAULT '',
  description text NOT NULL,
  forbiddengid text NOT NULL,
  charge smallint(6) unsigned NOT NULL DEFAULT '0',
  experience smallint(6) unsigned NOT NULL DEFAULT '0',
  provideperoid int(10) unsigned NOT NULL DEFAULT '0',
  providecount smallint(6) unsigned NOT NULL DEFAULT '0',
  useperoid int(10) unsigned NOT NULL DEFAULT '0',
  usecount smallint(6) unsigned NOT NULL DEFAULT '0',
  displayorder smallint(6) unsigned NOT NULL DEFAULT '0',
  custom text NOT NULL,
  `close` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (mid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_magic VALUES ('invisible','闅愯韩鑽?,'璁╄嚜宸遍殣韬櫥褰曪紝涓嶆樉绀哄湪绾匡紝24灏忔椂鍐呮湁鏁?,'','50','5','86400','10','86400','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('friendnum','濂藉弸澧炲鍗?,'鍦ㄥ厑璁告坊鍔犵殑鏈€澶氬ソ鍙嬫暟闄愬埗澶栵紝澧炲姞10涓ソ鍙嬪悕棰?,'','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('attachsize','闄勪欢澧炲鍗?,'浣跨敤涓€娆★紝鍙互缁欒嚜宸卞鍔?10M 鐨勯檮浠剁┖闂?,'','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('thunder','闆烽福涔嬪０','鍙戝竷涓€鏉″叏绔欎俊鎭紝璁╁ぇ瀹剁煡閬撹嚜宸变笂绾夸簡','','500','5','86400','5','86400','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('updateline','鏁戠敓鍦?,'鎶婃寚瀹氬璞＄殑鍙戝竷鏃堕棿鏇存柊涓哄綋鍓嶆椂闂?,'','200','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('downdateline','鏃剁┖鏈?,'鎶婃寚瀹氬璞＄殑鍙戝竷鏃堕棿淇敼涓鸿繃鍘荤殑鏃堕棿','','250','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('color','褰╄壊鐏?,'鎶婃寚瀹氬璞＄殑鏍囬鍙樻垚褰╄壊鐨?,'','50','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('hot','鐑偣鐏?,'鎶婃寚瀹氬璞＄殑鐑害澧炲姞绔欑偣鎺ㄨ崘鐨勭儹鐐瑰€?,'','50','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('visit','浜掕鍗?,'闅忔満閫夋嫨10涓ソ鍙嬶紝鍚戝叾鎵撴嫑鍛笺€佺暀瑷€鎴栬闂┖闂?,'','20','2','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('icon','褰╄櫣铔?,'缁欐寚瀹氬璞＄殑鏍囬鍓嶉潰澧炲姞鍥炬爣锛堟渶澶?涓浘鏍囷級','','20','2','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('flicker','褰╄櫣鐐?,'璁╄瘎璁恒€佺暀瑷€鐨勬枃瀛楅棯鐑佽捣鏉?,'','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('gift','绾㈠寘鍗?,'鍦ㄨ嚜宸辩殑绌洪棿鍩嬩笅绉垎绾㈠寘閫佺粰鏉ヨ鑰?,'','20','2','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('superstar','瓒呯骇鏄庢槦','鍦ㄤ釜浜轰富椤碉紝缁欒嚜宸辩殑澶村儚澧炲姞瓒呯骇鏄庢槦鏍囪瘑','','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('viewmagiclog','鍏崷闀?,'鏌ョ湅鎸囧畾鐢ㄦ埛鏈€杩戜娇鐢ㄧ殑閬撳叿璁板綍','','100','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('viewmagic','閫忚闀?,'鏌ョ湅鎸囧畾鐢ㄦ埛褰撳墠鎸佹湁鐨勯亾鍏?,'','100','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('viewvisitor','鍋风闀?,'鏌ョ湅鎸囧畾鐢ㄦ埛鏈€杩戣闂繃鐨?0涓┖闂?,'','100','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('call','鐐瑰悕鍗?,'鍙戦€氱煡缁欒嚜宸辩殑濂藉弸锛岃浠栦滑鏉ユ煡鐪嬫寚瀹氱殑瀵硅薄','','50','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('coupon','浠ｉ噾鍒?,'璐拱閬撳叿鏃舵姌鎹竴瀹氶噺鐨勭Н鍒?,'','0','0','0','0','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('frame','鐩告','缁欒嚜宸辩殑鐓х墖娣讳笂鐩告','','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('bgimage','淇＄焊','缁欐寚瀹氱殑瀵硅薄娣诲姞淇＄焊鑳屾櫙','','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('doodle','娑傞甫鏉?,'鍏佽鍦ㄧ暀瑷€銆佽瘎璁虹瓑鎿嶄綔鏃朵娇鐢ㄦ秱楦︽澘','','30','3','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('anonymous','鍖垮悕鍗?,'鍦ㄦ寚瀹氱殑鍦版柟锛岃鑷繁鐨勫悕瀛楁樉绀轰负鍖垮悕','','50','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('reveal','鐓у闀?,'鍙互鏌ョ湅涓€娆″尶鍚嶇敤鎴风殑鐪熷疄韬唤','','100','5','86400','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('license','閬撳叿杞璁稿彲璇?,'浣跨敤璁稿彲璇侊紝灏嗛亾鍏疯禒閫佺粰鎸囧畾濂藉弸','','10','1','3600','999','0','1','0','','0');
INSERT INTO tdgeos_uchome_magic VALUES ('detector','鎺㈡祴鍣?,'鎺㈡祴鍩嬩簡绾㈠寘鐨勭┖闂?,'','10','1','86400','999','0','1','0','','0');

DROP TABLE IF EXISTS tdgeos_uchome_magicinlog;
CREATE TABLE tdgeos_uchome_magicinlog (
  logid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  mid varchar(15) NOT NULL DEFAULT '',
  count smallint(6) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(3) unsigned NOT NULL DEFAULT '0',
  fromid mediumint(8) unsigned NOT NULL DEFAULT '0',
  credit smallint(6) unsigned NOT NULL DEFAULT '0',
  dateline int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (logid),
  KEY uid (uid,dateline),
  KEY `type` (`type`,fromid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_magicstore;
CREATE TABLE tdgeos_uchome_magicstore (
  mid varchar(15) NOT NULL DEFAULT '',
  `storage` smallint(6) unsigned NOT NULL DEFAULT '0',
  lastprovide int(10) unsigned NOT NULL DEFAULT '0',
  sellcount int(8) unsigned NOT NULL DEFAULT '0',
  sellcredit int(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (mid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_magicstore VALUES ('invisible','10','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('friendnum','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('attachsize','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('thunder','5','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('updateline','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('downdateline','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('color','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('hot','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('visit','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('icon','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('flicker','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('gift','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('superstar','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('viewmagiclog','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('viewmagic','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('viewvisitor','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('call','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('frame','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('bgimage','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('doodle','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('anonymous','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('reveal','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('license','999','1379828654','0','0');
INSERT INTO tdgeos_uchome_magicstore VALUES ('detector','999','1379828654','0','0');

DROP TABLE IF EXISTS tdgeos_uchome_magicuselog;
CREATE TABLE tdgeos_uchome_magicuselog (
  logid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  mid varchar(15) NOT NULL DEFAULT '',
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype varchar(20) NOT NULL DEFAULT '',
  count mediumint(8) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  expire int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (logid),
  KEY uid (uid,mid),
  KEY id (id,idtype)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_mailcron;
CREATE TABLE tdgeos_uchome_mailcron (
  cid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  touid mediumint(8) unsigned NOT NULL DEFAULT '0',
  email varchar(100) NOT NULL DEFAULT '',
  sendtime int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (cid),
  KEY sendtime (sendtime)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 AUTO_INCREMENT=10;


DROP TABLE IF EXISTS tdgeos_uchome_mailqueue;
CREATE TABLE tdgeos_uchome_mailqueue (
  qid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  cid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` text NOT NULL,
  message text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (qid),
  KEY mcid (cid,dateline)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 AUTO_INCREMENT=12;


DROP TABLE IF EXISTS tdgeos_uchome_member;
CREATE TABLE tdgeos_uchome_member (
  uid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  username char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (uid)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 AUTO_INCREMENT=21;

INSERT INTO tdgeos_uchome_member VALUES ('3','admin110','f0223078cb700fdfd7e007367a8cbf70');
INSERT INTO tdgeos_uchome_member VALUES ('1','admin','df6838c00c2ee902aeee7a8e97d8349c');
INSERT INTO tdgeos_uchome_member VALUES ('4','cjhonm','b5468cc386bf62ab00662bcbedeb87df');
INSERT INTO tdgeos_uchome_member VALUES ('2','jhonm','1c0bc0b9a921fed82a683fa4290e64eb');
INSERT INTO tdgeos_uchome_member VALUES ('5','wzxaini9','040f63882c4e651a4e89d09bb3aaefdb');

DROP TABLE IF EXISTS tdgeos_uchome_mtag;
CREATE TABLE tdgeos_uchome_mtag (
  tagid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  tagname varchar(40) NOT NULL DEFAULT '',
  fieldid smallint(6) NOT NULL DEFAULT '0',
  membernum mediumint(8) unsigned NOT NULL DEFAULT '0',
  threadnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  postnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  `close` tinyint(1) NOT NULL DEFAULT '0',
  announcement text NOT NULL,
  pic varchar(150) NOT NULL DEFAULT '',
  closeapply tinyint(1) NOT NULL DEFAULT '0',
  joinperm tinyint(1) NOT NULL DEFAULT '0',
  viewperm tinyint(1) NOT NULL DEFAULT '0',
  threadperm tinyint(1) NOT NULL DEFAULT '0',
  postperm tinyint(1) NOT NULL DEFAULT '0',
  recommend tinyint(1) NOT NULL DEFAULT '0',
  moderator varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (tagid),
  KEY tagname (tagname),
  KEY threadnum (threadnum)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_mtaginvite;
CREATE TABLE tdgeos_uchome_mtaginvite (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fromuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fromusername char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,tagid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_myapp;
CREATE TABLE tdgeos_uchome_myapp (
  appid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appname varchar(60) NOT NULL DEFAULT '',
  narrow tinyint(1) NOT NULL DEFAULT '0',
  flag tinyint(1) NOT NULL DEFAULT '0',
  version mediumint(8) unsigned NOT NULL DEFAULT '0',
  displaymethod tinyint(1) NOT NULL DEFAULT '0',
  displayorder smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (appid),
  KEY flag (flag,displayorder)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_myinvite;
CREATE TABLE tdgeos_uchome_myinvite (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  typename varchar(100) NOT NULL DEFAULT '',
  appid mediumint(8) NOT NULL DEFAULT '0',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  fromuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  touid mediumint(8) unsigned NOT NULL DEFAULT '0',
  myml text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  `hash` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY `hash` (`hash`),
  KEY uid (touid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_notification;
CREATE TABLE tdgeos_uchome_notification (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  authorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  author varchar(15) NOT NULL DEFAULT '',
  note text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY uid (uid,`new`,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_pic;
CREATE TABLE tdgeos_uchome_pic (
  picid mediumint(8) NOT NULL AUTO_INCREMENT,
  albumid mediumint(8) unsigned NOT NULL DEFAULT '0',
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  postip varchar(20) NOT NULL DEFAULT '',
  filename varchar(100) NOT NULL DEFAULT '',
  title varchar(255) NOT NULL DEFAULT '',
  `type` varchar(20) NOT NULL DEFAULT '',
  size int(10) unsigned NOT NULL DEFAULT '0',
  filepath varchar(60) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  click_6 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_7 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_8 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_9 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_10 smallint(6) unsigned NOT NULL DEFAULT '0',
  magicframe tinyint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (picid),
  KEY albumid (albumid,dateline),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

INSERT INTO tdgeos_uchome_pic VALUES ('1','1','0','2','jhonm','1379237183','61.149.193.120','index鍓湰.jpg','澶у濂斤紝鎴戞柊浼犱簡涓€寮犵収鐗?,'image/jpeg','315228','201309/15/2_1379237183sk1T.jpg','1','0','0','0','0','0','0','0','0');

DROP TABLE IF EXISTS tdgeos_uchome_picfield;
CREATE TABLE tdgeos_uchome_picfield (
  picid mediumint(8) unsigned NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  PRIMARY KEY (picid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_piclocation;
CREATE TABLE tdgeos_uchome_piclocation (
  picid mediumint(8) NOT NULL,
  longitude double NOT NULL,
  latitude double NOT NULL,
  location varchar(100) NOT NULL,
  PRIMARY KEY (picid),
  UNIQUE KEY picid (picid)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS tdgeos_uchome_poke;
CREATE TABLE tdgeos_uchome_poke (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fromuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  fromusername varchar(15) NOT NULL DEFAULT '',
  note varchar(255) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  iconid smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,fromuid),
  KEY uid (uid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_poll;
CREATE TABLE tdgeos_uchome_poll (
  pid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  voternum mediumint(8) unsigned NOT NULL DEFAULT '0',
  replynum mediumint(8) unsigned NOT NULL DEFAULT '0',
  multiple tinyint(1) NOT NULL DEFAULT '0',
  maxchoice tinyint(3) NOT NULL DEFAULT '0',
  sex tinyint(1) NOT NULL DEFAULT '0',
  noreply tinyint(1) NOT NULL DEFAULT '0',
  credit mediumint(8) unsigned NOT NULL DEFAULT '0',
  percredit mediumint(8) unsigned NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  lastvote int(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (pid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY voternum (voternum),
  KEY dateline (dateline),
  KEY lastvote (lastvote),
  KEY hot (hot),
  KEY percredit (percredit)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_pollfield;
CREATE TABLE tdgeos_uchome_pollfield (
  pid mediumint(8) unsigned NOT NULL DEFAULT '0',
  notify tinyint(1) NOT NULL DEFAULT '0',
  message text NOT NULL,
  summary text NOT NULL,
  `option` text NOT NULL,
  invite text NOT NULL,
  hotuser text NOT NULL,
  PRIMARY KEY (pid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_polloption;
CREATE TABLE tdgeos_uchome_polloption (
  oid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  pid mediumint(8) unsigned NOT NULL DEFAULT '0',
  votenum mediumint(8) unsigned NOT NULL DEFAULT '0',
  `option` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (oid),
  KEY pid (pid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_polluser;
CREATE TABLE tdgeos_uchome_polluser (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  pid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `option` text NOT NULL,
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,pid),
  KEY pid (pid,dateline),
  KEY uid (uid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_post;
CREATE TABLE tdgeos_uchome_post (
  pid int(10) unsigned NOT NULL AUTO_INCREMENT,
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  ip varchar(20) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  message text NOT NULL,
  pic varchar(255) NOT NULL DEFAULT '',
  isthread tinyint(1) NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  PRIMARY KEY (pid),
  KEY tid (tid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_profield;
CREATE TABLE tdgeos_uchome_profield (
  fieldid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(80) NOT NULL DEFAULT '',
  note varchar(255) NOT NULL DEFAULT '',
  formtype varchar(20) NOT NULL DEFAULT '0',
  inputnum smallint(3) unsigned NOT NULL DEFAULT '0',
  choice text NOT NULL,
  mtagminnum smallint(6) unsigned NOT NULL DEFAULT '0',
  manualmoderator tinyint(1) NOT NULL DEFAULT '0',
  manualmember tinyint(1) NOT NULL DEFAULT '0',
  displayorder tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (fieldid)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4;

INSERT INTO tdgeos_uchome_profield VALUES ('1','娓告垙绀惧洟','','text','100','','0','0','1','1');
INSERT INTO tdgeos_uchome_profield VALUES ('2','鏌愭煇绀惧洟','','text','100','','0','0','1','2');
INSERT INTO tdgeos_uchome_profield VALUES ('3','鐢熸椿绀惧洟','','text','100','','0','0','1','3');

DROP TABLE IF EXISTS tdgeos_uchome_profilefield;
CREATE TABLE tdgeos_uchome_profilefield (
  fieldid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  title varchar(80) NOT NULL DEFAULT '',
  note varchar(255) NOT NULL DEFAULT '',
  formtype varchar(20) NOT NULL DEFAULT '0',
  maxsize tinyint(3) unsigned NOT NULL DEFAULT '0',
  required tinyint(1) NOT NULL DEFAULT '0',
  invisible tinyint(1) NOT NULL DEFAULT '0',
  allowsearch tinyint(1) NOT NULL DEFAULT '0',
  choice text NOT NULL,
  displayorder tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (fieldid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_report;
CREATE TABLE tdgeos_uchome_report (
  rid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  id mediumint(8) unsigned NOT NULL DEFAULT '0',
  idtype varchar(15) NOT NULL DEFAULT '',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  num smallint(6) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  reason text NOT NULL,
  uids text NOT NULL,
  PRIMARY KEY (rid),
  KEY id (id,idtype,num,dateline),
  KEY `new` (`new`,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_session;
CREATE TABLE tdgeos_uchome_session (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  lastactivity int(10) unsigned NOT NULL DEFAULT '0',
  ip int(10) unsigned NOT NULL DEFAULT '0',
  magichidden tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  KEY lastactivity (lastactivity),
  KEY ip (ip)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_session VALUES ('1','admin','df6838c00c2ee902aeee7a8e97d8349c','1379991443','61149197','0');

DROP TABLE IF EXISTS tdgeos_uchome_share;
CREATE TABLE tdgeos_uchome_share (
  sid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  title_template text NOT NULL,
  body_template text NOT NULL,
  body_data text NOT NULL,
  body_general text NOT NULL,
  image varchar(255) NOT NULL DEFAULT '',
  image_link varchar(255) NOT NULL DEFAULT '',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  hotuser text NOT NULL,
  PRIMARY KEY (sid),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline),
  KEY hot (hot),
  KEY dateline (dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_show;
CREATE TABLE tdgeos_uchome_show (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  credit int(10) unsigned NOT NULL DEFAULT '0',
  note varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (uid),
  KEY credit (credit)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_space;
CREATE TABLE tdgeos_uchome_space (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  groupid smallint(6) unsigned NOT NULL DEFAULT '0',
  credit int(10) NOT NULL DEFAULT '0',
  experience int(10) NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  `name` char(20) NOT NULL DEFAULT '',
  namestatus tinyint(1) NOT NULL DEFAULT '0',
  videostatus tinyint(1) NOT NULL DEFAULT '0',
  domain char(15) NOT NULL DEFAULT '',
  friendnum int(10) unsigned NOT NULL DEFAULT '0',
  viewnum int(10) unsigned NOT NULL DEFAULT '0',
  notenum int(10) unsigned NOT NULL DEFAULT '0',
  addfriendnum smallint(6) unsigned NOT NULL DEFAULT '0',
  mtaginvitenum smallint(6) unsigned NOT NULL DEFAULT '0',
  eventinvitenum smallint(6) unsigned NOT NULL DEFAULT '0',
  myinvitenum smallint(6) unsigned NOT NULL DEFAULT '0',
  pokenum smallint(6) unsigned NOT NULL DEFAULT '0',
  doingnum smallint(6) unsigned NOT NULL DEFAULT '0',
  blognum smallint(6) unsigned NOT NULL DEFAULT '0',
  albumnum smallint(6) unsigned NOT NULL DEFAULT '0',
  threadnum smallint(6) unsigned NOT NULL DEFAULT '0',
  pollnum smallint(6) unsigned NOT NULL DEFAULT '0',
  eventnum smallint(6) unsigned NOT NULL DEFAULT '0',
  sharenum smallint(6) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  updatetime int(10) unsigned NOT NULL DEFAULT '0',
  lastsearch int(10) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  lastlogin int(10) unsigned NOT NULL DEFAULT '0',
  lastsend int(10) unsigned NOT NULL DEFAULT '0',
  attachsize int(10) unsigned NOT NULL DEFAULT '0',
  addsize int(10) unsigned NOT NULL DEFAULT '0',
  addfriend smallint(6) unsigned NOT NULL DEFAULT '0',
  flag tinyint(1) NOT NULL DEFAULT '0',
  newpm smallint(6) unsigned NOT NULL DEFAULT '0',
  avatar tinyint(1) NOT NULL DEFAULT '0',
  regip char(15) NOT NULL DEFAULT '',
  ip int(10) unsigned NOT NULL DEFAULT '0',
  mood smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  KEY username (username),
  KEY domain (domain),
  KEY ip (ip),
  KEY updatetime (updatetime),
  KEY mood (mood)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_space VALUES ('3','1','25','15','admin110','','0','0','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1377503281','0','0','0','1377503281','0','0','0','0','1','0','0','114.255.218.20','114255218','0');
INSERT INTO tdgeos_uchome_space VALUES ('1','11','250','240','admin','','1','0','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1377503322','1379856461','0','0','1379988788','0','0','0','0','0','0','1','114.255.218.20','61149197','0');
INSERT INTO tdgeos_uchome_space VALUES ('4','0','25','15','cjhonm','','0','0','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1377585422','0','0','0','1377585422','0','0','0','0','0','0','0','114.255.218.20','114255218','0');
INSERT INTO tdgeos_uchome_space VALUES ('2','0','73','63','jhonm','xushuai','1','0','','0','2','0','0','0','0','0','0','0','0','1','0','0','0','0','1378510254','1379237183','0','0','1379338492','0','315228','0','0','0','0','0','123.66.148.147','122070094','0');
INSERT INTO tdgeos_uchome_space VALUES ('5','1','110','100','wzxaini9','','0','0','','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','1378800605','0','0','0','1379846051','0','0','0','0','1','0','0','222.129.55.206','222129045','0');

DROP TABLE IF EXISTS tdgeos_uchome_spacefield;
CREATE TABLE tdgeos_uchome_spacefield (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  sex tinyint(1) NOT NULL DEFAULT '0',
  email varchar(100) NOT NULL DEFAULT '',
  newemail varchar(100) NOT NULL DEFAULT '',
  emailcheck tinyint(1) NOT NULL DEFAULT '0',
  mobile varchar(40) NOT NULL DEFAULT '',
  qq varchar(20) NOT NULL DEFAULT '',
  msn varchar(80) NOT NULL DEFAULT '',
  msnrobot varchar(15) NOT NULL DEFAULT '',
  msncstatus tinyint(1) NOT NULL DEFAULT '0',
  videopic varchar(32) NOT NULL DEFAULT '',
  birthyear smallint(6) unsigned NOT NULL DEFAULT '0',
  birthmonth tinyint(3) unsigned NOT NULL DEFAULT '0',
  birthday tinyint(3) unsigned NOT NULL DEFAULT '0',
  blood varchar(5) NOT NULL DEFAULT '',
  marry tinyint(1) NOT NULL DEFAULT '0',
  birthprovince varchar(20) NOT NULL DEFAULT '',
  birthcity varchar(20) NOT NULL DEFAULT '',
  resideprovince varchar(20) NOT NULL DEFAULT '',
  residecity varchar(20) NOT NULL DEFAULT '',
  note text NOT NULL,
  spacenote text NOT NULL,
  authstr varchar(20) NOT NULL DEFAULT '',
  theme varchar(20) NOT NULL DEFAULT '',
  nocss tinyint(1) NOT NULL DEFAULT '0',
  menunum smallint(6) unsigned NOT NULL DEFAULT '0',
  css text NOT NULL,
  privacy text NOT NULL,
  friend mediumtext NOT NULL,
  feedfriend mediumtext NOT NULL,
  sendmail text NOT NULL,
  magicstar tinyint(1) NOT NULL DEFAULT '0',
  magicexpire int(10) unsigned NOT NULL DEFAULT '0',
  timeoffset varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_spacefield VALUES ('3','0','','','0','','','','','0','','0','0','0','','0','','','','','','','','','0','0','','','','','','0','0','');
INSERT INTO tdgeos_uchome_spacefield VALUES ('1','2','233434343@163.com','','0','','','','','0','','0','0','0','','0','','','','','','','','t13','0','0','','','','','','0','0','');
INSERT INTO tdgeos_uchome_spacefield VALUES ('4','0','123@163.com','','0','','','','','0','','0','0','0','','0','','','','','','','','','0','0','','','','','','0','0','');
INSERT INTO tdgeos_uchome_spacefield VALUES ('2','2','jhonm@126.com','','0','','','','','0','','0','0','0','','0','','','','','','','','','0','0','','','','','','0','0','');
INSERT INTO tdgeos_uchome_spacefield VALUES ('5','0','wzxaini9@vip.qq.com','','1','','','','','0','','0','0','0','','0','','','','','','','','','0','0','','','','','','0','0','');

DROP TABLE IF EXISTS tdgeos_uchome_spaceinfo;
CREATE TABLE tdgeos_uchome_spaceinfo (
  infoid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(20) NOT NULL DEFAULT '',
  subtype varchar(20) NOT NULL DEFAULT '',
  title text NOT NULL,
  subtitle varchar(255) NOT NULL DEFAULT '',
  friend tinyint(1) NOT NULL DEFAULT '0',
  startyear smallint(6) unsigned NOT NULL DEFAULT '0',
  endyear smallint(6) unsigned NOT NULL DEFAULT '0',
  startmonth smallint(6) unsigned NOT NULL DEFAULT '0',
  endmonth smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (infoid),
  KEY uid (uid)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 AUTO_INCREMENT=26;

INSERT INTO tdgeos_uchome_spaceinfo VALUES ('9','2','base','birthcity','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('8','2','base','blood','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('7','2','base','birth','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('6','2','base','marry','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('10','2','base','residecity','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('18','1','contact','qq','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('17','1','contact','mobile','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('19','1','contact','msn','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('20','1','edu','','鍖椾含甯堣寖澶у','淇℃伅瀛﹂櫌','0','2010','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('21','1','base','marry','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('22','1','base','birth','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('23','1','base','blood','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('24','1','base','birthcity','','','0','0','0','0','0');
INSERT INTO tdgeos_uchome_spaceinfo VALUES ('25','1','base','residecity','','','0','0','0','0','0');

DROP TABLE IF EXISTS tdgeos_uchome_spacelog;
CREATE TABLE tdgeos_uchome_spacelog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  opuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  opusername char(15) NOT NULL DEFAULT '',
  flag tinyint(1) NOT NULL DEFAULT '0',
  expiration int(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid),
  KEY flag (flag)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_stat;
CREATE TABLE tdgeos_uchome_stat (
  daytime int(10) unsigned NOT NULL DEFAULT '0',
  login smallint(6) unsigned NOT NULL DEFAULT '0',
  register smallint(6) unsigned NOT NULL DEFAULT '0',
  invite smallint(6) unsigned NOT NULL DEFAULT '0',
  appinvite smallint(6) unsigned NOT NULL DEFAULT '0',
  doing smallint(6) unsigned NOT NULL DEFAULT '0',
  blog smallint(6) unsigned NOT NULL DEFAULT '0',
  pic smallint(6) unsigned NOT NULL DEFAULT '0',
  poll smallint(6) unsigned NOT NULL DEFAULT '0',
  `event` smallint(6) unsigned NOT NULL DEFAULT '0',
  `share` smallint(6) unsigned NOT NULL DEFAULT '0',
  thread smallint(6) unsigned NOT NULL DEFAULT '0',
  docomment smallint(6) unsigned NOT NULL DEFAULT '0',
  blogcomment smallint(6) unsigned NOT NULL DEFAULT '0',
  piccomment smallint(6) unsigned NOT NULL DEFAULT '0',
  pollcomment smallint(6) unsigned NOT NULL DEFAULT '0',
  pollvote smallint(6) unsigned NOT NULL DEFAULT '0',
  eventcomment smallint(6) unsigned NOT NULL DEFAULT '0',
  eventjoin smallint(6) unsigned NOT NULL DEFAULT '0',
  sharecomment smallint(6) unsigned NOT NULL DEFAULT '0',
  post smallint(6) unsigned NOT NULL DEFAULT '0',
  wall smallint(6) unsigned NOT NULL DEFAULT '0',
  poke smallint(6) unsigned NOT NULL DEFAULT '0',
  click smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (daytime)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_stat VALUES ('20130826','2','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130827','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130901','2','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130907','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130909','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130910','3','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130915','2','0','0','0','0','0','1','0','0','0','0','0','0','2','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130916','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');
INSERT INTO tdgeos_uchome_stat VALUES ('20130917','3','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');

DROP TABLE IF EXISTS tdgeos_uchome_statuser;
CREATE TABLE tdgeos_uchome_statuser (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  daytime int(10) unsigned NOT NULL DEFAULT '0',
  `type` char(20) NOT NULL DEFAULT '',
  KEY uid (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_statuser VALUES ('1','0','login');
INSERT INTO tdgeos_uchome_statuser VALUES ('5','0','login');

DROP TABLE IF EXISTS tdgeos_uchome_tag;
CREATE TABLE tdgeos_uchome_tag (
  tagid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  tagname char(30) NOT NULL DEFAULT '',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  blognum smallint(6) unsigned NOT NULL DEFAULT '0',
  `close` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (tagid),
  KEY tagname (tagname)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_tagblog;
CREATE TABLE tdgeos_uchome_tagblog (
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  blogid mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tagid,blogid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_tagspace;
CREATE TABLE tdgeos_uchome_tagspace (
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  grade smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (tagid,uid),
  KEY grade (tagid,grade),
  KEY uid (uid,grade)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_task;
CREATE TABLE tdgeos_uchome_task (
  taskid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  available tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  note text NOT NULL,
  num mediumint(8) unsigned NOT NULL DEFAULT '0',
  maxnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  image varchar(150) NOT NULL DEFAULT '',
  filename varchar(50) NOT NULL DEFAULT '',
  starttime int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  nexttime int(10) unsigned NOT NULL DEFAULT '0',
  nexttype varchar(20) NOT NULL DEFAULT '',
  credit smallint(6) NOT NULL DEFAULT '0',
  displayorder smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (taskid),
  KEY displayorder (displayorder)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 AUTO_INCREMENT=8;

INSERT INTO tdgeos_uchome_task VALUES ('1','1','鏇存柊涓€涓嬭嚜宸辩殑澶村儚','澶村儚灏辨槸浣犲湪杩欓噷鐨勪釜浜哄舰璞°€?br>璁剧疆鑷繁鐨勫ご鍍忓悗锛屼細璁╂洿澶氱殑鏈嬪弸璁颁綇鎮ㄣ€?,'0','0','image/task/avatar.gif','avatar.php','0','0','0','','20','1');
INSERT INTO tdgeos_uchome_task VALUES ('2','1','灏嗕釜浜鸿祫鏂欒ˉ鍏呭畬鏁?,'鎶婅嚜宸辩殑涓汉璧勬枡濉啓瀹屾暣鍚с€?br>杩欐牱鎮ㄤ細琚洿澶氱殑鏈嬪弸鎵惧埌鐨勶紝绯荤粺涔熶細甯偍鎵惧埌鏈嬪弸銆?,'0','0','image/task/profile.gif','profile.php','0','0','0','2','20','0');
INSERT INTO tdgeos_uchome_task VALUES ('3','1','鍙戣〃鑷繁鐨勭涓€绡囧叕鍛?,'鐜板湪锛屽氨鍐欎笅鑷繁鐨勭涓€绡囧叕鍛婂惂銆?br>涓庡ぇ瀹朵竴璧峰垎浜嚜宸辩殑鐢熸椿鎰熸偀銆?,'0','0','image/task/blog.gif','blog.php','0','0','0','','5','3');
INSERT INTO tdgeos_uchome_task VALUES ('4','1','瀵绘壘骞舵坊鍔犱簲浣嶅ソ鍙?,'鏈変簡濂藉弸锛屾偍鍙戠殑鍏憡銆佸浘鐗囩瓑浼氳濂藉弸鍙婃椂鐪嬪埌骞朵紶鎾嚭鍘伙紱<br>鎮ㄤ篃浼氬湪棣栭〉鏂逛究鍙婃椂鐨勭湅鍒板ソ鍙嬬殑鏈€鏂板姩鎬併€?,'0','0','image/task/friend.gif','friend.php','0','0','0','','50','4');
INSERT INTO tdgeos_uchome_task VALUES ('5','1','楠岃瘉婵€娲昏嚜宸辩殑閭','濉啓鑷繁鐪熷疄鐨勯偖绠卞湴鍧€骞堕獙璇侀€氳繃銆?br>鎮ㄥ彲浠ュ湪蹇樿瀵嗙爜鐨勬椂鍊欎娇鐢ㄨ閭鍙栧洖鑷繁鐨勫瘑鐮侊紱<br>杩樺彲浠ュ強鏃舵帴鍙楃珯鍐呯殑濂藉弸閫氱煡绛夌瓑銆?,'0','0','image/task/email.gif','email.php','0','0','0','','10','5');
INSERT INTO tdgeos_uchome_task VALUES ('6','1','閭€璇?0涓柊鏈嬪弸鍔犲叆','閭€璇蜂竴涓嬭嚜宸辩殑QQ濂藉弸鎴栬€呴偖绠辫仈绯讳汉锛岃浜叉湅濂藉弸涓€璧锋潵鍔犲叆鎴戜滑鍚с€?,'0','0','image/task/friend.gif','invite.php','0','0','0','','100','6');
INSERT INTO tdgeos_uchome_task VALUES ('7','1','棰嗗彇姣忔棩璁块棶澶хぜ鍖?,'姣忓ぉ鐧诲綍璁块棶鑷繁鐨勪富椤碉紝灏卞彲棰嗗彇澶хぜ鍖呫€?,'0','0','image/task/gift.gif','gift.php','0','0','0','day','5','99');

DROP TABLE IF EXISTS tdgeos_uchome_thread;
CREATE TABLE tdgeos_uchome_thread (
  tid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  tagid mediumint(8) unsigned NOT NULL DEFAULT '0',
  eventid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` char(80) NOT NULL DEFAULT '',
  magiccolor tinyint(6) unsigned NOT NULL DEFAULT '0',
  magicegg tinyint(6) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  viewnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  replynum mediumint(8) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  lastauthor char(15) NOT NULL DEFAULT '',
  lastauthorid mediumint(8) unsigned NOT NULL DEFAULT '0',
  displayorder tinyint(1) unsigned NOT NULL DEFAULT '0',
  digest tinyint(1) NOT NULL DEFAULT '0',
  hot mediumint(8) unsigned NOT NULL DEFAULT '0',
  click_11 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_12 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_13 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_14 smallint(6) unsigned NOT NULL DEFAULT '0',
  click_15 smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (tid),
  KEY tagid (tagid,displayorder,lastpost),
  KEY uid (uid,lastpost),
  KEY lastpost (lastpost),
  KEY topicid (topicid,dateline),
  KEY eventid (eventid,lastpost)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_topic;
CREATE TABLE tdgeos_uchome_topic (
  topicid mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  `subject` varchar(80) NOT NULL DEFAULT '',
  message mediumtext NOT NULL,
  jointype varchar(255) NOT NULL DEFAULT '',
  joingid varchar(255) NOT NULL DEFAULT '',
  pic varchar(100) NOT NULL DEFAULT '',
  thumb tinyint(1) NOT NULL DEFAULT '0',
  remote tinyint(1) NOT NULL DEFAULT '0',
  joinnum mediumint(8) unsigned NOT NULL DEFAULT '0',
  lastpost int(10) unsigned NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  endtime int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (topicid),
  KEY lastpost (lastpost),
  KEY joinnum (joinnum)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_topicuser;
CREATE TABLE tdgeos_uchome_topicuser (
  id mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  topicid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (id),
  KEY uid (uid,dateline),
  KEY topicid (topicid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


DROP TABLE IF EXISTS tdgeos_uchome_userapp;
CREATE TABLE tdgeos_uchome_userapp (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appname varchar(60) NOT NULL DEFAULT '',
  privacy tinyint(1) NOT NULL DEFAULT '0',
  allowsidenav tinyint(1) NOT NULL DEFAULT '0',
  allowfeed tinyint(1) NOT NULL DEFAULT '0',
  allowprofilelink tinyint(1) NOT NULL DEFAULT '0',
  narrow tinyint(1) NOT NULL DEFAULT '0',
  menuorder smallint(6) NOT NULL DEFAULT '0',
  displayorder smallint(6) NOT NULL DEFAULT '0',
  KEY uid (uid,appid),
  KEY menuorder (uid,menuorder),
  KEY displayorder (uid,displayorder)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_userappfield;
CREATE TABLE tdgeos_uchome_userappfield (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  appid mediumint(8) unsigned NOT NULL DEFAULT '0',
  profilelink text NOT NULL,
  myml text NOT NULL,
  KEY uid (uid,appid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_userevent;
CREATE TABLE tdgeos_uchome_userevent (
  eventid mediumint(8) unsigned NOT NULL DEFAULT '0',
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username varchar(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  fellow mediumint(8) unsigned NOT NULL DEFAULT '0',
  template varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (eventid,uid),
  KEY uid (uid,dateline),
  KEY eventid (eventid,`status`,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_usergroup;
CREATE TABLE tdgeos_uchome_usergroup (
  gid smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  grouptitle varchar(20) NOT NULL DEFAULT '',
  system tinyint(1) NOT NULL DEFAULT '0',
  banvisit tinyint(1) NOT NULL DEFAULT '0',
  explower int(10) NOT NULL DEFAULT '0',
  maxfriendnum smallint(6) unsigned NOT NULL DEFAULT '0',
  maxattachsize int(10) unsigned NOT NULL DEFAULT '0',
  allowhtml tinyint(1) NOT NULL DEFAULT '0',
  allowcomment tinyint(1) NOT NULL DEFAULT '0',
  searchinterval smallint(6) unsigned NOT NULL DEFAULT '0',
  searchignore tinyint(1) NOT NULL DEFAULT '0',
  postinterval smallint(6) unsigned NOT NULL DEFAULT '0',
  spamignore tinyint(1) NOT NULL DEFAULT '0',
  videophotoignore tinyint(1) NOT NULL DEFAULT '0',
  allowblog tinyint(1) NOT NULL DEFAULT '0',
  allowdoing tinyint(1) NOT NULL DEFAULT '0',
  allowupload tinyint(1) NOT NULL DEFAULT '0',
  allowshare tinyint(1) NOT NULL DEFAULT '0',
  allowmtag tinyint(1) NOT NULL DEFAULT '0',
  allowthread tinyint(1) NOT NULL DEFAULT '0',
  allowpost tinyint(1) NOT NULL DEFAULT '0',
  allowcss tinyint(1) NOT NULL DEFAULT '0',
  allowpoke tinyint(1) NOT NULL DEFAULT '0',
  allowfriend tinyint(1) NOT NULL DEFAULT '0',
  allowpoll tinyint(1) NOT NULL DEFAULT '0',
  allowclick tinyint(1) NOT NULL DEFAULT '0',
  allowevent tinyint(1) NOT NULL DEFAULT '0',
  allowmagic tinyint(1) NOT NULL DEFAULT '0',
  allowpm tinyint(1) NOT NULL DEFAULT '0',
  allowviewvideopic tinyint(1) NOT NULL DEFAULT '0',
  allowmyop tinyint(1) NOT NULL DEFAULT '0',
  allowtopic tinyint(1) NOT NULL DEFAULT '0',
  allowstat tinyint(1) NOT NULL DEFAULT '0',
  magicdiscount tinyint(1) NOT NULL DEFAULT '0',
  verifyevent tinyint(1) NOT NULL DEFAULT '0',
  edittrail tinyint(1) NOT NULL DEFAULT '0',
  domainlength smallint(6) unsigned NOT NULL DEFAULT '0',
  closeignore tinyint(1) NOT NULL DEFAULT '0',
  seccode tinyint(1) NOT NULL DEFAULT '0',
  color varchar(10) NOT NULL DEFAULT '',
  icon varchar(100) NOT NULL DEFAULT '',
  manageconfig tinyint(1) NOT NULL DEFAULT '0',
  managenetwork tinyint(1) NOT NULL DEFAULT '0',
  manageprofilefield tinyint(1) NOT NULL DEFAULT '0',
  manageprofield tinyint(1) NOT NULL DEFAULT '0',
  manageusergroup tinyint(1) NOT NULL DEFAULT '0',
  managefeed tinyint(1) NOT NULL DEFAULT '0',
  manageshare tinyint(1) NOT NULL DEFAULT '0',
  managedoing tinyint(1) NOT NULL DEFAULT '0',
  manageblog tinyint(1) NOT NULL DEFAULT '0',
  managetag tinyint(1) NOT NULL DEFAULT '0',
  managetagtpl tinyint(1) NOT NULL DEFAULT '0',
  managealbum tinyint(1) NOT NULL DEFAULT '0',
  managecomment tinyint(1) NOT NULL DEFAULT '0',
  managemtag tinyint(1) NOT NULL DEFAULT '0',
  managethread tinyint(1) NOT NULL DEFAULT '0',
  manageevent tinyint(1) NOT NULL DEFAULT '0',
  manageeventclass tinyint(1) NOT NULL DEFAULT '0',
  managecensor tinyint(1) NOT NULL DEFAULT '0',
  managead tinyint(1) NOT NULL DEFAULT '0',
  managesitefeed tinyint(1) NOT NULL DEFAULT '0',
  managebackup tinyint(1) NOT NULL DEFAULT '0',
  manageblock tinyint(1) NOT NULL DEFAULT '0',
  managetemplate tinyint(1) NOT NULL DEFAULT '0',
  managestat tinyint(1) NOT NULL DEFAULT '0',
  managecache tinyint(1) NOT NULL DEFAULT '0',
  managecredit tinyint(1) NOT NULL DEFAULT '0',
  managecron tinyint(1) NOT NULL DEFAULT '0',
  managename tinyint(1) NOT NULL DEFAULT '0',
  manageapp tinyint(1) NOT NULL DEFAULT '0',
  managetask tinyint(1) NOT NULL DEFAULT '0',
  managereport tinyint(1) NOT NULL DEFAULT '0',
  managepoll tinyint(1) NOT NULL DEFAULT '0',
  manageclick tinyint(1) NOT NULL DEFAULT '0',
  managemagic tinyint(1) NOT NULL DEFAULT '0',
  managemagiclog tinyint(1) NOT NULL DEFAULT '0',
  managebatch tinyint(1) NOT NULL DEFAULT '0',
  managedelspace tinyint(1) NOT NULL DEFAULT '0',
  managetopic tinyint(1) NOT NULL DEFAULT '0',
  manageip tinyint(1) NOT NULL DEFAULT '0',
  managehotuser tinyint(1) NOT NULL DEFAULT '0',
  managedefaultuser tinyint(1) NOT NULL DEFAULT '0',
  managespacegroup tinyint(1) NOT NULL DEFAULT '0',
  managespaceinfo tinyint(1) NOT NULL DEFAULT '0',
  managespacecredit tinyint(1) NOT NULL DEFAULT '0',
  managespacenote tinyint(1) NOT NULL DEFAULT '0',
  managevideophoto tinyint(1) NOT NULL DEFAULT '0',
  managelog tinyint(1) NOT NULL DEFAULT '0',
  magicaward text NOT NULL,
  PRIMARY KEY (gid)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 AUTO_INCREMENT=13;

INSERT INTO tdgeos_uchome_usergroup VALUES ('1','绔欑偣绠＄悊鍛?,'-1','0','0','0','0','1','1','0','1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','0','0','1','1','0','red','image/group/admin.gif','1','1','1','1','1','1','1','1','1','1','0','1','1','1','1','1','1','1','1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','');
INSERT INTO tdgeos_uchome_usergroup VALUES ('2','淇℃伅绠＄悊鍛?,'-1','0','0','0','0','1','1','0','1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','0','0','3','1','0','blue','image/group/infor.gif','0','0','0','0','0','1','1','1','1','1','0','1','1','1','1','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO tdgeos_uchome_usergroup VALUES ('3','璐靛VIP','1','0','0','0','0','1','1','0','1','0','1','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','0','0','0','0','3','0','0','green','image/group/vip.gif','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO tdgeos_uchome_usergroup VALUES ('7','澶т笁','0','0','730','300','100','1','1','10','1','10','0','0','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','0','0','0','0','3','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','a:0:{}');
INSERT INTO tdgeos_uchome_usergroup VALUES ('6','澶т簩','0','0','365','200','50','0','1','30','0','30','0','0','1','1','1','1','1','1','1','0','1','1','1','1','1','1','1','0','1','0','0','0','0','0','5','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','a:0:{}');
INSERT INTO tdgeos_uchome_usergroup VALUES ('11','澶т竴','0','0','0','50','10','0','0','60','0','60','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','a:0:{}');
INSERT INTO tdgeos_uchome_usergroup VALUES ('8','绂佹鍙戣█','-1','0','0','1','1','0','0','9999','0','9999','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','99','0','1','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO tdgeos_uchome_usergroup VALUES ('9','绂佹璁块棶','-1','1','0','1','1','0','0','9999','0','9999','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','1','0','99','0','1','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','');
INSERT INTO tdgeos_uchome_usergroup VALUES ('10','璺汉鐢?,'0','0','-999999999','50','10','0','0','60','0','60','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','a:0:{}');
INSERT INTO tdgeos_uchome_usergroup VALUES ('12','澶у洓','0','0','1095','50','10','0','0','60','0','60','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','','','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','a:0:{}');

DROP TABLE IF EXISTS tdgeos_uchome_userlog;
CREATE TABLE tdgeos_uchome_userlog (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  `action` char(10) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_usermagic;
CREATE TABLE tdgeos_uchome_usermagic (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  username char(15) NOT NULL DEFAULT '',
  mid varchar(15) NOT NULL DEFAULT '',
  count smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,mid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_usertask;
CREATE TABLE tdgeos_uchome_usertask (
  uid mediumint(8) unsigned NOT NULL,
  username char(15) NOT NULL DEFAULT '',
  taskid smallint(6) unsigned NOT NULL DEFAULT '0',
  credit smallint(6) NOT NULL DEFAULT '0',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  isignore tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,taskid),
  KEY isignore (isignore,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS tdgeos_uchome_visitor;
CREATE TABLE tdgeos_uchome_visitor (
  uid mediumint(8) unsigned NOT NULL DEFAULT '0',
  vuid mediumint(8) unsigned NOT NULL DEFAULT '0',
  vusername char(15) NOT NULL DEFAULT '',
  dateline int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (uid,vuid),
  KEY dateline (uid,dateline)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO tdgeos_uchome_visitor VALUES ('5','2','jhonm','1379225211');

