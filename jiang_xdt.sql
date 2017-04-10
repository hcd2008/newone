/*
Navicat MySQL Data Transfer

Source Server         : phpstudy数据库
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : jiang_xdt

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-04-09 23:37:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bak
-- ----------------------------
DROP TABLE IF EXISTS `bak`;
CREATE TABLE `bak` (
  `id` int(11) NOT NULL DEFAULT '0',
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bak
-- ----------------------------
INSERT INTO `bak` VALUES ('1', '00:00:00', '09:03:00', '09:05:00', '1');
INSERT INTO `bak` VALUES ('79', '09:03:00', '09:13:00', '09:15:00', '2');
INSERT INTO `bak` VALUES ('80', '09:13:00', '09:23:00', '09:25:00', '3');
INSERT INTO `bak` VALUES ('81', '09:23:00', '09:33:00', '09:35:00', '4');
INSERT INTO `bak` VALUES ('82', '09:33:00', '09:43:00', '09:45:00', '5');
INSERT INTO `bak` VALUES ('83', '09:43:00', '09:53:00', '09:55:00', '6');
INSERT INTO `bak` VALUES ('84', '09:53:00', '10:03:00', '10:05:00', '7');
INSERT INTO `bak` VALUES ('85', '10:03:00', '10:13:00', '10:15:00', '8');
INSERT INTO `bak` VALUES ('86', '10:13:00', '10:23:00', '10:25:00', '9');
INSERT INTO `bak` VALUES ('87', '10:23:00', '10:33:00', '10:35:00', '10');
INSERT INTO `bak` VALUES ('88', '10:33:00', '10:43:00', '10:45:00', '11');
INSERT INTO `bak` VALUES ('89', '10:43:00', '10:53:00', '10:55:00', '12');
INSERT INTO `bak` VALUES ('90', '10:53:00', '11:03:00', '11:05:00', '13');
INSERT INTO `bak` VALUES ('91', '11:03:00', '11:13:00', '11:15:00', '14');
INSERT INTO `bak` VALUES ('92', '11:13:00', '11:23:00', '11:25:00', '15');
INSERT INTO `bak` VALUES ('93', '11:23:00', '11:33:00', '11:35:00', '16');
INSERT INTO `bak` VALUES ('94', '11:33:00', '11:43:00', '11:45:00', '17');
INSERT INTO `bak` VALUES ('95', '11:43:00', '11:53:00', '11:55:00', '18');
INSERT INTO `bak` VALUES ('96', '11:53:00', '12:03:00', '12:05:00', '19');
INSERT INTO `bak` VALUES ('97', '12:03:00', '12:13:00', '12:15:00', '20');
INSERT INTO `bak` VALUES ('98', '12:13:00', '12:23:00', '12:25:00', '21');
INSERT INTO `bak` VALUES ('99', '12:23:00', '12:33:00', '12:35:00', '22');
INSERT INTO `bak` VALUES ('100', '12:33:00', '12:43:00', '12:45:00', '23');
INSERT INTO `bak` VALUES ('101', '12:43:00', '12:53:00', '12:55:00', '24');
INSERT INTO `bak` VALUES ('102', '12:53:00', '13:03:00', '13:05:00', '25');
INSERT INTO `bak` VALUES ('103', '13:03:00', '13:13:00', '13:15:00', '26');
INSERT INTO `bak` VALUES ('104', '13:13:00', '13:23:00', '13:25:00', '27');
INSERT INTO `bak` VALUES ('105', '13:23:00', '13:33:00', '13:35:00', '28');
INSERT INTO `bak` VALUES ('106', '13:33:00', '13:43:00', '13:45:00', '29');
INSERT INTO `bak` VALUES ('107', '13:43:00', '13:53:00', '13:55:00', '30');
INSERT INTO `bak` VALUES ('108', '13:53:00', '14:03:00', '14:05:00', '31');
INSERT INTO `bak` VALUES ('109', '14:03:00', '14:13:00', '14:15:00', '32');
INSERT INTO `bak` VALUES ('110', '14:13:00', '14:23:00', '14:25:00', '33');
INSERT INTO `bak` VALUES ('111', '14:23:00', '14:33:00', '14:35:00', '34');
INSERT INTO `bak` VALUES ('112', '14:33:00', '14:43:00', '14:45:00', '35');
INSERT INTO `bak` VALUES ('113', '14:43:00', '14:53:00', '14:55:00', '36');
INSERT INTO `bak` VALUES ('114', '14:53:00', '15:03:00', '15:05:00', '37');
INSERT INTO `bak` VALUES ('115', '15:03:00', '15:13:00', '15:15:00', '38');
INSERT INTO `bak` VALUES ('116', '15:13:00', '15:23:00', '15:25:00', '39');
INSERT INTO `bak` VALUES ('117', '15:23:00', '15:33:00', '15:35:00', '40');
INSERT INTO `bak` VALUES ('118', '15:33:00', '15:43:00', '15:45:00', '41');
INSERT INTO `bak` VALUES ('119', '15:43:00', '15:53:00', '15:55:00', '42');
INSERT INTO `bak` VALUES ('120', '15:53:00', '16:03:00', '16:05:00', '43');
INSERT INTO `bak` VALUES ('121', '16:03:00', '16:13:00', '16:15:00', '44');
INSERT INTO `bak` VALUES ('122', '16:13:00', '16:23:00', '16:25:00', '45');
INSERT INTO `bak` VALUES ('123', '16:23:00', '16:33:00', '16:35:00', '46');
INSERT INTO `bak` VALUES ('124', '16:33:00', '16:43:00', '16:45:00', '47');
INSERT INTO `bak` VALUES ('125', '16:43:00', '16:53:00', '16:55:00', '48');
INSERT INTO `bak` VALUES ('126', '16:53:00', '17:03:00', '17:05:00', '49');
INSERT INTO `bak` VALUES ('127', '17:03:00', '17:13:00', '17:15:00', '50');
INSERT INTO `bak` VALUES ('128', '17:13:00', '17:23:00', '17:25:00', '51');
INSERT INTO `bak` VALUES ('129', '17:23:00', '17:33:00', '17:35:00', '52');
INSERT INTO `bak` VALUES ('130', '17:33:00', '17:43:00', '17:45:00', '53');
INSERT INTO `bak` VALUES ('131', '17:43:00', '17:53:00', '17:55:00', '54');
INSERT INTO `bak` VALUES ('132', '17:53:00', '18:03:00', '18:05:00', '55');
INSERT INTO `bak` VALUES ('133', '18:03:00', '18:13:00', '18:15:00', '56');
INSERT INTO `bak` VALUES ('134', '18:13:00', '18:23:00', '18:25:00', '57');
INSERT INTO `bak` VALUES ('135', '18:23:00', '18:33:00', '18:35:00', '58');
INSERT INTO `bak` VALUES ('136', '18:33:00', '18:43:00', '18:45:00', '59');
INSERT INTO `bak` VALUES ('137', '18:43:00', '18:53:00', '18:55:00', '60');
INSERT INTO `bak` VALUES ('138', '18:53:00', '19:03:00', '19:05:00', '61');
INSERT INTO `bak` VALUES ('139', '19:03:00', '19:13:00', '19:15:00', '62');
INSERT INTO `bak` VALUES ('140', '19:13:00', '19:23:00', '19:25:00', '63');
INSERT INTO `bak` VALUES ('141', '19:23:00', '19:33:00', '19:35:00', '64');
INSERT INTO `bak` VALUES ('142', '19:33:00', '19:43:00', '19:45:00', '65');
INSERT INTO `bak` VALUES ('143', '19:43:00', '19:53:00', '19:55:00', '66');
INSERT INTO `bak` VALUES ('144', '19:53:00', '20:03:00', '20:05:00', '67');
INSERT INTO `bak` VALUES ('145', '20:03:00', '20:13:00', '20:15:00', '68');
INSERT INTO `bak` VALUES ('146', '20:13:00', '20:23:00', '20:25:00', '69');
INSERT INTO `bak` VALUES ('147', '20:23:00', '20:33:00', '20:35:00', '70');
INSERT INTO `bak` VALUES ('148', '20:33:00', '20:43:00', '20:45:00', '71');
INSERT INTO `bak` VALUES ('149', '20:43:00', '20:53:00', '20:55:00', '72');
INSERT INTO `bak` VALUES ('150', '20:53:00', '21:03:00', '21:05:00', '73');
INSERT INTO `bak` VALUES ('151', '21:03:00', '21:13:00', '21:15:00', '74');
INSERT INTO `bak` VALUES ('152', '21:13:00', '21:23:00', '21:25:00', '75');
INSERT INTO `bak` VALUES ('153', '21:23:00', '21:33:00', '21:35:00', '76');
INSERT INTO `bak` VALUES ('154', '21:33:00', '21:43:00', '21:45:00', '77');
INSERT INTO `bak` VALUES ('155', '21:43:00', '21:53:00', '21:55:00', '78');

-- ----------------------------
-- Table structure for jiang_account
-- ----------------------------
DROP TABLE IF EXISTS `jiang_account`;
CREATE TABLE `jiang_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `lotteryid` int(11) DEFAULT NULL,
  `methodid` int(11) DEFAULT NULL,
  `money` double NOT NULL,
  `money_befor` double NOT NULL,
  `money_after` double NOT NULL,
  `accounttype` int(11) NOT NULL,
  `accountnum` varchar(100) DEFAULT NULL,
  `projectno` varchar(30) DEFAULT NULL,
  `ordernum` varchar(50) DEFAULT NULL,
  `tracenum` varchar(30) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `beizhu` varchar(100) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '0表示提款没有处理,1表示已处理了',
  `addtime` datetime DEFAULT NULL,
  `isbb` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `addtime` (`addtime`),
  KEY `accounttype` (`accounttype`),
  KEY `username` (`username`),
  KEY `state` (`state`),
  KEY `ordernum` (`ordernum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_account
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_accountzhidi
-- ----------------------------
DROP TABLE IF EXISTS `jiang_accountzhidi`;
CREATE TABLE `jiang_accountzhidi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `accountnum` int(11) NOT NULL,
  `accounttype` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_accountzhidi
-- ----------------------------
INSERT INTO `jiang_accountzhidi` VALUES ('1', '1', '投注扣款');
INSERT INTO `jiang_accountzhidi` VALUES ('2', '2', '追号扣款');
INSERT INTO `jiang_accountzhidi` VALUES ('3', '3', '撤单返款');
INSERT INTO `jiang_accountzhidi` VALUES ('4', '4', '游戏返点');
INSERT INTO `jiang_accountzhidi` VALUES ('5', '5', '追号返款');
INSERT INTO `jiang_accountzhidi` VALUES ('6', '6', '账户充值');
INSERT INTO `jiang_accountzhidi` VALUES ('7', '7', '账户提现');
INSERT INTO `jiang_accountzhidi` VALUES ('8', '8', '提现失败');
INSERT INTO `jiang_accountzhidi` VALUES ('9', '9', '奖金派送');
INSERT INTO `jiang_accountzhidi` VALUES ('10', '10', '代理返点');
INSERT INTO `jiang_accountzhidi` VALUES ('11', '12', '重复返奖扣款');
INSERT INTO `jiang_accountzhidi` VALUES ('12', '13', '重复返点扣款');
INSERT INTO `jiang_accountzhidi` VALUES ('13', '11', '活动增款');

-- ----------------------------
-- Table structure for jiang_admin
-- ----------------------------
DROP TABLE IF EXISTS `jiang_admin`;
CREATE TABLE `jiang_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_admin
-- ----------------------------
INSERT INTO `jiang_admin` VALUES ('65', 'admin', '202cb962ac59075b964b07152d234b70', '2016-02-21 23:23:59');

-- ----------------------------
-- Table structure for jiang_bank
-- ----------------------------
DROP TABLE IF EXISTS `jiang_bank`;
CREATE TABLE `jiang_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bankname` varchar(15) DEFAULT NULL,
  `banknum` varchar(50) DEFAULT NULL,
  `shoukuanname` varchar(20) DEFAULT NULL,
  `state` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_bank
-- ----------------------------
INSERT INTO `jiang_bank` VALUES ('1', '工商银行', '123', '定', '1');
INSERT INTO `jiang_bank` VALUES ('2', '财付通', '123', '定', '1');
INSERT INTO `jiang_bank` VALUES ('3', '支付宝', '123', '定', '1');
INSERT INTO `jiang_bank` VALUES ('4', '农业银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('5', '建设银行', '123', '定', '1');
INSERT INTO `jiang_bank` VALUES ('6', '交通银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('7', '招商银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('9', '其它银行', '仅供绑定', ' 仅供绑定', '0');
INSERT INTO `jiang_bank` VALUES ('10', '邮政储蓄', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('11', '中国银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('12', '交通银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('13', '华夏银行', '仅供绑定', ' 仅供绑定', '3');
INSERT INTO `jiang_bank` VALUES ('14', '光大银行', '仅供绑定', ' 仅供绑定', '3');

-- ----------------------------
-- Table structure for jiang_baobiao
-- ----------------------------
DROP TABLE IF EXISTS `jiang_baobiao`;
CREATE TABLE `jiang_baobiao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `regfrom` varchar(300) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `xiaofei` double(15,3) DEFAULT '0.000',
  `fandian` double(15,3) DEFAULT '0.000',
  `zhonjiang` double(15,3) DEFAULT '0.000',
  `yingkui` double(15,4) DEFAULT '0.0000',
  `qukuan` double(15,3) DEFAULT '0.000',
  `cunkuan` double(15,3) DEFAULT '0.000',
  `usertype` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `addtime` (`addtime`),
  KEY `regfrom` (`regfrom`)
) ENGINE=MyISAM AUTO_INCREMENT=152845 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_baobiao
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_chongzhi
-- ----------------------------
DROP TABLE IF EXISTS `jiang_chongzhi`;
CREATE TABLE `jiang_chongzhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ordernum` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `money` double NOT NULL,
  `message` varchar(255) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_chongzhi
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_chongzhiyl
-- ----------------------------
DROP TABLE IF EXISTS `jiang_chongzhiyl`;
CREATE TABLE `jiang_chongzhiyl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) DEFAULT NULL,
  `czmoney` double(15,3) DEFAULT NULL,
  `jjmoney` double(15,3) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of jiang_chongzhiyl
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_cq115_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_cq115_code`;
CREATE TABLE `jiang_cq115_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68173 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_cq115_code
-- ----------------------------
INSERT INTO `jiang_cq115_code` VALUES ('68172', '20160317-85', '04,03,06,01,11', '2016-02-22 11:38:25');

-- ----------------------------
-- Table structure for jiang_cq115_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_cq115_time`;
CREATE TABLE `jiang_cq115_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=255 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_cq115_time
-- ----------------------------
INSERT INTO `jiang_cq115_time` VALUES ('170', '00:00:00', '08:58:00', '09:01:00', '1');
INSERT INTO `jiang_cq115_time` VALUES ('171', '08:58:00', '09:08:30', '09:11:00', '2');
INSERT INTO `jiang_cq115_time` VALUES ('172', '09:08:00', '09:18:30', '09:21:00', '3');
INSERT INTO `jiang_cq115_time` VALUES ('173', '09:18:00', '09:28:30', '09:31:00', '4');
INSERT INTO `jiang_cq115_time` VALUES ('174', '09:28:00', '09:38:30', '09:41:00', '5');
INSERT INTO `jiang_cq115_time` VALUES ('175', '09:38:00', '09:48:30', '09:51:00', '6');
INSERT INTO `jiang_cq115_time` VALUES ('176', '09:48:00', '09:58:30', '10:01:00', '7');
INSERT INTO `jiang_cq115_time` VALUES ('177', '09:58:00', '10:08:30', '10:11:00', '8');
INSERT INTO `jiang_cq115_time` VALUES ('178', '10:08:00', '10:18:30', '10:21:00', '9');
INSERT INTO `jiang_cq115_time` VALUES ('179', '10:18:00', '10:28:30', '10:31:00', '10');
INSERT INTO `jiang_cq115_time` VALUES ('180', '10:28:00', '10:38:30', '10:41:00', '11');
INSERT INTO `jiang_cq115_time` VALUES ('181', '10:38:00', '10:48:30', '10:51:00', '12');
INSERT INTO `jiang_cq115_time` VALUES ('182', '10:48:00', '10:58:30', '11:01:00', '13');
INSERT INTO `jiang_cq115_time` VALUES ('183', '10:58:00', '11:08:30', '11:11:00', '14');
INSERT INTO `jiang_cq115_time` VALUES ('184', '11:08:00', '11:18:30', '11:21:00', '15');
INSERT INTO `jiang_cq115_time` VALUES ('185', '11:18:00', '11:28:30', '11:31:00', '16');
INSERT INTO `jiang_cq115_time` VALUES ('186', '11:28:00', '11:38:30', '11:41:00', '17');
INSERT INTO `jiang_cq115_time` VALUES ('187', '11:38:00', '11:48:30', '11:51:00', '18');
INSERT INTO `jiang_cq115_time` VALUES ('188', '11:48:00', '11:58:30', '12:01:00', '19');
INSERT INTO `jiang_cq115_time` VALUES ('189', '11:58:00', '12:08:30', '12:11:00', '20');
INSERT INTO `jiang_cq115_time` VALUES ('190', '12:08:00', '12:18:30', '12:21:00', '21');
INSERT INTO `jiang_cq115_time` VALUES ('191', '12:18:00', '12:28:30', '12:31:00', '22');
INSERT INTO `jiang_cq115_time` VALUES ('192', '12:28:00', '12:38:30', '12:41:00', '23');
INSERT INTO `jiang_cq115_time` VALUES ('193', '12:38:00', '12:48:30', '12:51:00', '24');
INSERT INTO `jiang_cq115_time` VALUES ('194', '12:48:00', '12:58:30', '13:01:00', '25');
INSERT INTO `jiang_cq115_time` VALUES ('195', '12:58:00', '13:08:30', '13:11:00', '26');
INSERT INTO `jiang_cq115_time` VALUES ('196', '13:08:00', '13:18:30', '13:21:00', '27');
INSERT INTO `jiang_cq115_time` VALUES ('197', '13:18:00', '13:28:30', '13:31:00', '28');
INSERT INTO `jiang_cq115_time` VALUES ('198', '13:28:00', '13:38:30', '13:41:00', '29');
INSERT INTO `jiang_cq115_time` VALUES ('199', '13:38:00', '13:48:30', '13:51:00', '30');
INSERT INTO `jiang_cq115_time` VALUES ('200', '13:48:00', '13:58:30', '14:01:00', '31');
INSERT INTO `jiang_cq115_time` VALUES ('201', '13:58:00', '14:08:30', '14:11:00', '32');
INSERT INTO `jiang_cq115_time` VALUES ('202', '14:08:00', '14:18:30', '14:21:00', '33');
INSERT INTO `jiang_cq115_time` VALUES ('203', '14:18:00', '14:28:30', '14:31:00', '34');
INSERT INTO `jiang_cq115_time` VALUES ('204', '14:28:00', '14:38:30', '14:41:00', '35');
INSERT INTO `jiang_cq115_time` VALUES ('205', '14:38:00', '14:48:30', '14:51:00', '36');
INSERT INTO `jiang_cq115_time` VALUES ('206', '14:48:00', '14:58:30', '15:01:00', '37');
INSERT INTO `jiang_cq115_time` VALUES ('207', '14:58:00', '15:08:30', '15:11:00', '38');
INSERT INTO `jiang_cq115_time` VALUES ('208', '15:08:00', '15:18:30', '15:21:00', '39');
INSERT INTO `jiang_cq115_time` VALUES ('209', '15:18:00', '15:28:30', '15:31:00', '40');
INSERT INTO `jiang_cq115_time` VALUES ('210', '15:28:00', '15:38:30', '15:41:00', '41');
INSERT INTO `jiang_cq115_time` VALUES ('211', '15:38:00', '15:48:30', '15:51:00', '42');
INSERT INTO `jiang_cq115_time` VALUES ('212', '15:48:00', '15:58:30', '16:01:00', '43');
INSERT INTO `jiang_cq115_time` VALUES ('213', '15:58:00', '16:08:30', '16:11:00', '44');
INSERT INTO `jiang_cq115_time` VALUES ('214', '16:08:00', '16:18:30', '16:21:00', '45');
INSERT INTO `jiang_cq115_time` VALUES ('215', '16:18:00', '16:28:30', '16:31:00', '46');
INSERT INTO `jiang_cq115_time` VALUES ('216', '16:28:00', '16:38:30', '16:41:00', '47');
INSERT INTO `jiang_cq115_time` VALUES ('217', '16:38:00', '16:48:30', '16:51:00', '48');
INSERT INTO `jiang_cq115_time` VALUES ('218', '16:48:00', '16:58:30', '17:01:00', '49');
INSERT INTO `jiang_cq115_time` VALUES ('219', '16:58:00', '17:08:30', '17:11:00', '50');
INSERT INTO `jiang_cq115_time` VALUES ('220', '17:08:00', '17:18:30', '17:21:00', '51');
INSERT INTO `jiang_cq115_time` VALUES ('221', '17:18:00', '17:28:30', '17:31:00', '52');
INSERT INTO `jiang_cq115_time` VALUES ('222', '17:28:00', '17:38:30', '17:41:00', '53');
INSERT INTO `jiang_cq115_time` VALUES ('223', '17:38:00', '17:48:30', '17:51:00', '54');
INSERT INTO `jiang_cq115_time` VALUES ('224', '17:48:00', '17:58:30', '18:01:00', '55');
INSERT INTO `jiang_cq115_time` VALUES ('225', '17:58:00', '18:08:30', '18:11:00', '56');
INSERT INTO `jiang_cq115_time` VALUES ('226', '18:08:00', '18:18:30', '18:21:00', '57');
INSERT INTO `jiang_cq115_time` VALUES ('227', '18:18:00', '18:28:30', '18:31:00', '58');
INSERT INTO `jiang_cq115_time` VALUES ('228', '18:28:00', '18:38:30', '18:41:00', '59');
INSERT INTO `jiang_cq115_time` VALUES ('229', '18:38:00', '18:48:30', '18:51:00', '60');
INSERT INTO `jiang_cq115_time` VALUES ('230', '18:48:00', '18:58:30', '19:01:00', '61');
INSERT INTO `jiang_cq115_time` VALUES ('231', '18:58:00', '19:08:30', '19:11:00', '62');
INSERT INTO `jiang_cq115_time` VALUES ('232', '19:08:00', '19:18:30', '19:21:00', '63');
INSERT INTO `jiang_cq115_time` VALUES ('233', '19:18:00', '19:28:30', '19:31:00', '64');
INSERT INTO `jiang_cq115_time` VALUES ('234', '19:28:00', '19:38:30', '19:41:00', '65');
INSERT INTO `jiang_cq115_time` VALUES ('235', '19:38:00', '19:48:30', '19:51:00', '66');
INSERT INTO `jiang_cq115_time` VALUES ('236', '19:48:00', '19:58:30', '20:01:00', '67');
INSERT INTO `jiang_cq115_time` VALUES ('237', '19:58:00', '20:08:30', '20:11:00', '68');
INSERT INTO `jiang_cq115_time` VALUES ('238', '20:08:00', '20:18:30', '20:21:00', '69');
INSERT INTO `jiang_cq115_time` VALUES ('239', '20:18:00', '20:28:30', '20:31:00', '70');
INSERT INTO `jiang_cq115_time` VALUES ('240', '20:28:00', '20:38:30', '20:41:00', '71');
INSERT INTO `jiang_cq115_time` VALUES ('241', '20:38:00', '20:48:30', '20:51:00', '72');
INSERT INTO `jiang_cq115_time` VALUES ('242', '20:48:00', '20:58:30', '21:01:00', '73');
INSERT INTO `jiang_cq115_time` VALUES ('243', '20:58:00', '21:08:30', '21:11:00', '74');
INSERT INTO `jiang_cq115_time` VALUES ('244', '21:08:00', '21:18:30', '21:21:00', '75');
INSERT INTO `jiang_cq115_time` VALUES ('245', '21:18:00', '21:28:30', '21:31:00', '76');
INSERT INTO `jiang_cq115_time` VALUES ('246', '21:28:00', '21:38:30', '21:41:00', '77');
INSERT INTO `jiang_cq115_time` VALUES ('247', '21:38:00', '21:48:30', '21:51:00', '78');
INSERT INTO `jiang_cq115_time` VALUES ('248', '21:48:00', '21:58:30', '22:01:00', '79');
INSERT INTO `jiang_cq115_time` VALUES ('249', '21:58:00', '22:08:30', '22:11:00', '80');
INSERT INTO `jiang_cq115_time` VALUES ('250', '22:08:00', '22:18:30', '22:21:00', '81');
INSERT INTO `jiang_cq115_time` VALUES ('251', '22:18:00', '22:28:30', '22:31:00', '82');
INSERT INTO `jiang_cq115_time` VALUES ('252', '22:28:00', '22:38:30', '22:41:00', '83');
INSERT INTO `jiang_cq115_time` VALUES ('253', '22:38:00', '22:48:30', '22:51:00', '84');
INSERT INTO `jiang_cq115_time` VALUES ('254', '22:48:00', '22:58:30', '23:01:00', '85');

-- ----------------------------
-- Table structure for jiang_dl115_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_dl115_code`;
CREATE TABLE `jiang_dl115_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77987 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_dl115_code
-- ----------------------------
INSERT INTO `jiang_dl115_code` VALUES ('77674', '20160219-84', '08,07,03,10,06', '2016-02-20 09:00:02');
INSERT INTO `jiang_dl115_code` VALUES ('77675', '20160220-01', '09,03,01,11,05', '2016-02-20 09:12:42');
INSERT INTO `jiang_dl115_code` VALUES ('77676', '20160220-02', '07,11,04,06,02', '2016-02-20 09:22:50');
INSERT INTO `jiang_dl115_code` VALUES ('77677', '20160220-03', '09,02,10,03,11', '2016-02-20 09:32:58');
INSERT INTO `jiang_dl115_code` VALUES ('77678', '20160220-04', '02,01,06,08,05', '2016-02-20 09:43:44');
INSERT INTO `jiang_dl115_code` VALUES ('77679', '20160220-05', '11,07,06,10,09', '2016-02-20 09:53:15');
INSERT INTO `jiang_dl115_code` VALUES ('77680', '20160220-06', '01,11,07,10,06', '2016-02-20 10:04:00');
INSERT INTO `jiang_dl115_code` VALUES ('77681', '20160220-07', '01,05,09,10,02', '2016-02-20 10:13:31');
INSERT INTO `jiang_dl115_code` VALUES ('77682', '20160220-08', '04,03,02,05,06', '2016-02-20 10:22:23');
INSERT INTO `jiang_dl115_code` VALUES ('77683', '20160220-09', '06,09,05,02,11', '2016-02-20 10:33:09');
INSERT INTO `jiang_dl115_code` VALUES ('77684', '20160220-10', '11,05,07,06,03', '2016-02-20 10:42:39');
INSERT INTO `jiang_dl115_code` VALUES ('77685', '20160220-11', '02,06,11,10,01', '2016-02-20 10:52:09');
INSERT INTO `jiang_dl115_code` VALUES ('77686', '20160220-12', '11,02,10,08,04', '2016-02-20 11:02:55');
INSERT INTO `jiang_dl115_code` VALUES ('77687', '20160220-13', '05,06,08,11,03', '2016-02-20 11:12:24');
INSERT INTO `jiang_dl115_code` VALUES ('77688', '20160220-14', '10,04,07,08,09', '2016-02-20 11:23:49');
INSERT INTO `jiang_dl115_code` VALUES ('77689', '20160220-15', '04,05,11,10,03', '2016-02-20 11:32:41');
INSERT INTO `jiang_dl115_code` VALUES ('77690', '20160220-16', '08,05,09,02,06', '2016-02-20 11:42:50');
INSERT INTO `jiang_dl115_code` VALUES ('77691', '20160220-17', '09,11,07,06,08', '2016-02-20 11:53:37');
INSERT INTO `jiang_dl115_code` VALUES ('77692', '20160220-18', '08,03,01,06,09', '2016-02-20 12:03:05');
INSERT INTO `jiang_dl115_code` VALUES ('77693', '20160220-19', '07,02,08,04,05', '2016-02-20 12:12:35');
INSERT INTO `jiang_dl115_code` VALUES ('77694', '20160220-20', '02,03,10,07,09', '2016-02-20 12:22:43');
INSERT INTO `jiang_dl115_code` VALUES ('77695', '20160220-21', '03,06,07,05,08', '2016-02-20 12:34:07');
INSERT INTO `jiang_dl115_code` VALUES ('77696', '20160220-22', '02,03,10,07,01', '2016-02-20 12:42:59');
INSERT INTO `jiang_dl115_code` VALUES ('77697', '20160220-23', '02,09,04,08,03', '2016-02-20 12:53:07');
INSERT INTO `jiang_dl115_code` VALUES ('77698', '20160220-24', '07,05,01,09,02', '2016-02-20 13:02:39');
INSERT INTO `jiang_dl115_code` VALUES ('77699', '20160220-25', '09,04,02,10,07', '2016-02-20 13:14:02');
INSERT INTO `jiang_dl115_code` VALUES ('77700', '20160220-26', '04,08,02,11,10', '2016-02-20 13:24:09');
INSERT INTO `jiang_dl115_code` VALUES ('77701', '20160220-27', '07,06,04,09,11', '2016-02-20 13:33:39');
INSERT INTO `jiang_dl115_code` VALUES ('77702', '20160220-28', '02,10,04,07,05', '2016-02-20 13:43:09');
INSERT INTO `jiang_dl115_code` VALUES ('77703', '20160220-29', '08,02,10,04,05', '2016-02-20 13:53:17');
INSERT INTO `jiang_dl115_code` VALUES ('77704', '20160220-30', '09,06,07,05,11', '2016-02-20 14:03:25');
INSERT INTO `jiang_dl115_code` VALUES ('77705', '20160220-31', '08,10,09,01,11', '2016-02-20 14:13:33');
INSERT INTO `jiang_dl115_code` VALUES ('77706', '20160220-32', '04,01,10,02,09', '2016-02-20 14:24:25');
INSERT INTO `jiang_dl115_code` VALUES ('77707', '20160220-33', '01,02,03,04,10', '2016-02-20 14:33:49');
INSERT INTO `jiang_dl115_code` VALUES ('77708', '20160220-34', '10,03,02,06,08', '2016-02-20 14:43:58');
INSERT INTO `jiang_dl115_code` VALUES ('77709', '20160220-35', '11,01,08,04,05', '2016-02-20 14:53:27');
INSERT INTO `jiang_dl115_code` VALUES ('77710', '20160220-36', '06,10,01,03,07', '2016-02-20 15:03:35');
INSERT INTO `jiang_dl115_code` VALUES ('77711', '20160220-37', '04,10,05,03,07', '2016-02-20 15:13:08');
INSERT INTO `jiang_dl115_code` VALUES ('77712', '20160220-38', '06,10,08,07,01', '2016-02-20 15:23:51');
INSERT INTO `jiang_dl115_code` VALUES ('77713', '20160220-39', '05,07,02,03,08', '2016-02-20 15:34:05');
INSERT INTO `jiang_dl115_code` VALUES ('77714', '20160220-40', '03,05,07,06,09', '2016-02-20 15:42:17');
INSERT INTO `jiang_dl115_code` VALUES ('77715', '20160220-41', '01,03,10,02,04', '2016-02-20 15:52:25');
INSERT INTO `jiang_dl115_code` VALUES ('77716', '20160220-42', '07,11,09,02,10', '2016-02-20 16:03:07');
INSERT INTO `jiang_dl115_code` VALUES ('77717', '20160220-43', '06,03,07,11,05', '2016-02-20 16:14:31');
INSERT INTO `jiang_dl115_code` VALUES ('77718', '20160220-44', '05,03,06,09,11', '2016-02-20 16:23:23');
INSERT INTO `jiang_dl115_code` VALUES ('77719', '20160220-45', '10,06,04,08,09', '2016-02-20 16:34:10');
INSERT INTO `jiang_dl115_code` VALUES ('77720', '20160220-46', '02,07,04,05,03', '2016-02-20 16:42:29');
INSERT INTO `jiang_dl115_code` VALUES ('77721', '20160220-47', '04,10,01,07,03', '2016-02-20 16:53:09');
INSERT INTO `jiang_dl115_code` VALUES ('77722', '20160220-48', '09,07,08,06,01', '2016-02-20 17:02:39');
INSERT INTO `jiang_dl115_code` VALUES ('77723', '20160220-49', '10,11,09,01,04', '2016-02-20 17:13:30');
INSERT INTO `jiang_dl115_code` VALUES ('77724', '20160220-50', '08,11,07,04,05', '2016-02-20 17:23:01');
INSERT INTO `jiang_dl115_code` VALUES ('77725', '20160220-51', '08,11,02,07,05', '2016-02-20 17:33:03');
INSERT INTO `jiang_dl115_code` VALUES ('77726', '20160220-52', '10,07,09,05,06', '2016-02-20 17:43:49');
INSERT INTO `jiang_dl115_code` VALUES ('77727', '20160220-53', '03,11,08,01,07', '2016-02-20 17:54:35');
INSERT INTO `jiang_dl115_code` VALUES ('77728', '20160220-54', '05,03,10,08,11', '2016-02-20 18:02:49');
INSERT INTO `jiang_dl115_code` VALUES ('77729', '20160220-55', '08,04,11,03,10', '2016-02-20 18:13:35');
INSERT INTO `jiang_dl115_code` VALUES ('77730', '20160220-56', '05,11,10,08,03', '2016-02-20 18:23:43');
INSERT INTO `jiang_dl115_code` VALUES ('77731', '20160220-57', '10,08,09,04,02', '2016-02-20 18:33:13');
INSERT INTO `jiang_dl115_code` VALUES ('77732', '20160220-58', '03,04,08,11,07', '2016-02-20 18:43:23');
INSERT INTO `jiang_dl115_code` VALUES ('77733', '20160220-59', '07,05,09,03,04', '2016-02-20 18:52:51');
INSERT INTO `jiang_dl115_code` VALUES ('77734', '20160220-60', '08,10,07,03,01', '2016-02-20 19:03:00');
INSERT INTO `jiang_dl115_code` VALUES ('77735', '20160220-61', '01,04,03,06,07', '2016-02-20 19:13:09');
INSERT INTO `jiang_dl115_code` VALUES ('77736', '20160220-62', '03,02,07,04,09', '2016-02-20 19:22:37');
INSERT INTO `jiang_dl115_code` VALUES ('77737', '20160220-63', '02,11,08,09,03', '2016-02-20 19:33:24');
INSERT INTO `jiang_dl115_code` VALUES ('77738', '20160220-64', '02,10,07,09,08', '2016-02-20 19:42:15');
INSERT INTO `jiang_dl115_code` VALUES ('77739', '20160220-65', '02,10,03,04,07', '2016-02-20 19:53:01');
INSERT INTO `jiang_dl115_code` VALUES ('77740', '20160220-66', '10,06,08,09,05', '2016-02-20 20:03:49');
INSERT INTO `jiang_dl115_code` VALUES ('77741', '20160220-67', '11,01,09,10,07', '2016-02-20 20:13:25');
INSERT INTO `jiang_dl115_code` VALUES ('77742', '20160220-68', '04,07,01,10,09', '2016-02-20 20:23:31');
INSERT INTO `jiang_dl115_code` VALUES ('77743', '20160220-69', '03,01,06,09,05', '2016-02-20 20:32:21');
INSERT INTO `jiang_dl115_code` VALUES ('77744', '20160220-70', '10,06,08,09,03', '2016-02-20 20:44:22');
INSERT INTO `jiang_dl115_code` VALUES ('77745', '20160220-71', '05,10,11,01,03', '2016-02-20 20:53:15');
INSERT INTO `jiang_dl115_code` VALUES ('77746', '20160220-72', '04,05,03,06,10', '2016-02-20 21:03:22');
INSERT INTO `jiang_dl115_code` VALUES ('77747', '20160220-73', '07,11,04,10,03', '2016-02-20 21:12:56');
INSERT INTO `jiang_dl115_code` VALUES ('77748', '20160220-74', '08,09,10,07,06', '2016-02-20 21:23:05');
INSERT INTO `jiang_dl115_code` VALUES ('77749', '20160220-75', '06,05,01,02,11', '2016-02-20 21:33:08');
INSERT INTO `jiang_dl115_code` VALUES ('77750', '20160220-76', '01,05,07,09,03', '2016-02-20 21:43:24');
INSERT INTO `jiang_dl115_code` VALUES ('77751', '20160220-77', '08,07,10,06,03', '2016-02-20 21:54:09');
INSERT INTO `jiang_dl115_code` VALUES ('77752', '20160220-78', '09,03,04,05,11', '2016-02-20 22:03:36');
INSERT INTO `jiang_dl115_code` VALUES ('77753', '20160220-80', '02,04,09,10,08', '2016-02-20 22:51:48');
INSERT INTO `jiang_dl115_code` VALUES ('77754', '20160220-83', '01,08,05,04,09', '2016-02-20 22:53:03');
INSERT INTO `jiang_dl115_code` VALUES ('77755', '20160220-84', '06,10,02,09,07', '2016-02-21 09:00:10');
INSERT INTO `jiang_dl115_code` VALUES ('77756', '20160221-01', '08,03,02,01,11', '2016-02-21 09:12:50');
INSERT INTO `jiang_dl115_code` VALUES ('77757', '20160221-02', '08,01,03,10,06', '2016-02-21 09:24:14');
INSERT INTO `jiang_dl115_code` VALUES ('77758', '20160221-03', '05,07,09,01,06', '2016-02-21 09:33:06');
INSERT INTO `jiang_dl115_code` VALUES ('77759', '20160221-04', '05,08,11,10,03', '2016-02-21 09:43:14');
INSERT INTO `jiang_dl115_code` VALUES ('77760', '20160221-05', '04,02,03,10,08', '2016-02-21 09:54:00');
INSERT INTO `jiang_dl115_code` VALUES ('77761', '20160221-06', '10,01,08,07,03', '2016-02-21 10:03:30');
INSERT INTO `jiang_dl115_code` VALUES ('77762', '20160221-07', '08,10,11,05,04', '2016-02-21 10:13:01');
INSERT INTO `jiang_dl115_code` VALUES ('77763', '20160221-08', '11,06,03,05,08', '2016-02-21 10:23:09');
INSERT INTO `jiang_dl115_code` VALUES ('77764', '20160221-09', '01,07,09,10,06', '2016-02-21 10:33:20');
INSERT INTO `jiang_dl115_code` VALUES ('77765', '20160221-10', '07,11,08,10,05', '2016-02-21 10:44:09');
INSERT INTO `jiang_dl115_code` VALUES ('77766', '20160221-11', '01,07,06,09,04', '2016-02-21 10:53:37');
INSERT INTO `jiang_dl115_code` VALUES ('77767', '20160221-12', '04,06,10,07,11', '2016-02-21 11:03:40');
INSERT INTO `jiang_dl115_code` VALUES ('77768', '20160221-13', '06,10,08,04,11', '2016-02-21 11:13:49');
INSERT INTO `jiang_dl115_code` VALUES ('77769', '20160221-14', '02,01,11,08,07', '2016-02-21 11:23:20');
INSERT INTO `jiang_dl115_code` VALUES ('77770', '20160221-15', '02,07,04,03,05', '2016-02-21 11:33:29');
INSERT INTO `jiang_dl115_code` VALUES ('77771', '20160221-16', '06,05,03,10,09', '2016-02-21 11:43:36');
INSERT INTO `jiang_dl115_code` VALUES ('77772', '20160221-17', '01,11,06,03,05', '2016-02-21 11:53:43');
INSERT INTO `jiang_dl115_code` VALUES ('77773', '20160221-18', '04,07,10,09,02', '2016-02-21 12:03:13');
INSERT INTO `jiang_dl115_code` VALUES ('77774', '20160221-19', '09,01,10,02,04', '2016-02-21 12:12:46');
INSERT INTO `jiang_dl115_code` VALUES ('77775', '20160221-20', '04,06,05,08,03', '2016-02-21 12:22:50');
INSERT INTO `jiang_dl115_code` VALUES ('77776', '20160221-21', '06,09,11,10,05', '2016-02-21 12:33:36');
INSERT INTO `jiang_dl115_code` VALUES ('77777', '20160221-22', '03,10,06,11,02', '2016-02-21 12:43:44');
INSERT INTO `jiang_dl115_code` VALUES ('77778', '20160221-23', '04,06,01,08,09', '2016-02-21 12:53:53');
INSERT INTO `jiang_dl115_code` VALUES ('77779', '20160221-24', '07,03,04,09,06', '2016-02-21 13:02:52');
INSERT INTO `jiang_dl115_code` VALUES ('77780', '20160221-25', '06,05,02,09,11', '2016-02-21 13:12:53');
INSERT INTO `jiang_dl115_code` VALUES ('77781', '20160221-26', '02,03,05,08,07', '2016-02-21 13:23:01');
INSERT INTO `jiang_dl115_code` VALUES ('77782', '20160221-27', '09,05,01,03,04', '2016-02-21 13:33:50');
INSERT INTO `jiang_dl115_code` VALUES ('77783', '20160221-28', '06,05,09,08,11', '2016-02-21 13:43:17');
INSERT INTO `jiang_dl115_code` VALUES ('77784', '20160221-29', '05,01,10,04,07', '2016-02-21 13:54:03');
INSERT INTO `jiang_dl115_code` VALUES ('77785', '20160221-30', '04,02,03,05,11', '2016-02-21 14:02:55');
INSERT INTO `jiang_dl115_code` VALUES ('77786', '20160221-31', '01,06,09,07,11', '2016-02-21 14:13:03');
INSERT INTO `jiang_dl115_code` VALUES ('77787', '20160221-32', '10,05,02,07,09', '2016-02-21 14:23:24');
INSERT INTO `jiang_dl115_code` VALUES ('77788', '20160221-33', '03,05,10,01,08', '2016-02-21 14:34:35');
INSERT INTO `jiang_dl115_code` VALUES ('77789', '20160221-34', '10,05,06,02,01', '2016-02-21 14:43:28');
INSERT INTO `jiang_dl115_code` VALUES ('77790', '20160221-35', '04,03,01,07,11', '2016-02-21 14:54:51');
INSERT INTO `jiang_dl115_code` VALUES ('77791', '20160221-36', '03,09,11,05,10', '2016-02-21 15:03:43');
INSERT INTO `jiang_dl115_code` VALUES ('77792', '20160221-37', '08,05,10,04,11', '2016-02-21 15:13:13');
INSERT INTO `jiang_dl115_code` VALUES ('77793', '20160221-38', '07,10,09,01,11', '2016-02-21 15:23:21');
INSERT INTO `jiang_dl115_code` VALUES ('77794', '20160221-39', '08,09,11,03,07', '2016-02-21 15:33:29');
INSERT INTO `jiang_dl115_code` VALUES ('77795', '20160221-40', '11,06,01,05,02', '2016-02-21 15:43:37');
INSERT INTO `jiang_dl115_code` VALUES ('77796', '20160221-41', '10,09,01,06,02', '2016-02-21 15:54:24');
INSERT INTO `jiang_dl115_code` VALUES ('77797', '20160221-42', '09,05,11,01,10', '2016-02-21 16:03:15');
INSERT INTO `jiang_dl115_code` VALUES ('77798', '20160221-43', '11,05,01,02,04', '2016-02-21 16:14:01');
INSERT INTO `jiang_dl115_code` VALUES ('77799', '20160221-44', '01,07,04,05,10', '2016-02-21 16:22:53');
INSERT INTO `jiang_dl115_code` VALUES ('77800', '20160221-45', '04,07,03,10,01', '2016-02-21 16:33:01');
INSERT INTO `jiang_dl115_code` VALUES ('77801', '20160221-46', '05,07,02,10,01', '2016-02-21 16:42:31');
INSERT INTO `jiang_dl115_code` VALUES ('77802', '20160221-47', '03,08,09,02,07', '2016-02-21 16:52:39');
INSERT INTO `jiang_dl115_code` VALUES ('77803', '20160221-48', '04,08,03,02,09', '2016-02-21 17:02:48');
INSERT INTO `jiang_dl115_code` VALUES ('77804', '20160221-49', '05,10,06,04,02', '2016-02-21 17:12:55');
INSERT INTO `jiang_dl115_code` VALUES ('77805', '20160221-50', '06,08,04,02,10', '2016-02-21 17:23:03');
INSERT INTO `jiang_dl115_code` VALUES ('77806', '20160221-51', '02,01,04,11,09', '2016-02-21 17:33:11');
INSERT INTO `jiang_dl115_code` VALUES ('77807', '20160221-52', '07,05,02,01,03', '2016-02-21 17:43:19');
INSERT INTO `jiang_dl115_code` VALUES ('77808', '20160221-53', '04,02,08,11,03', '2016-02-21 17:54:05');
INSERT INTO `jiang_dl115_code` VALUES ('77809', '20160221-54', '02,09,07,03,11', '2016-02-21 18:02:57');
INSERT INTO `jiang_dl115_code` VALUES ('77810', '20160221-55', '09,05,08,03,07', '2016-02-21 18:13:05');
INSERT INTO `jiang_dl115_code` VALUES ('77811', '20160221-56', '05,02,03,06,04', '2016-02-21 18:22:35');
INSERT INTO `jiang_dl115_code` VALUES ('77812', '20160221-57', '11,04,05,01,06', '2016-02-21 18:32:05');
INSERT INTO `jiang_dl115_code` VALUES ('77813', '20160221-58', '09,02,07,05,10', '2016-02-21 18:43:29');
INSERT INTO `jiang_dl115_code` VALUES ('77814', '20160221-59', '09,10,07,11,06', '2016-02-21 18:51:43');
INSERT INTO `jiang_dl115_code` VALUES ('77815', '20160221-60', '10,08,09,07,05', '2016-02-21 19:02:31');
INSERT INTO `jiang_dl115_code` VALUES ('77816', '20160221-61', '07,02,11,10,03', '2016-02-21 19:12:37');
INSERT INTO `jiang_dl115_code` VALUES ('77817', '20160221-62', '04,09,02,06,03', '2016-02-21 19:23:23');
INSERT INTO `jiang_dl115_code` VALUES ('77818', '20160221-63', '10,04,05,02,07', '2016-02-21 19:32:53');
INSERT INTO `jiang_dl115_code` VALUES ('77819', '20160221-64', '10,09,07,04,01', '2016-02-21 19:43:04');
INSERT INTO `jiang_dl115_code` VALUES ('77820', '20160221-65', '02,07,08,03,09', '2016-02-21 19:52:31');
INSERT INTO `jiang_dl115_code` VALUES ('77821', '20160221-66', '09,03,01,06,08', '2016-02-21 20:03:18');
INSERT INTO `jiang_dl115_code` VALUES ('77822', '20160221-67', '01,03,06,02,08', '2016-02-21 20:13:26');
INSERT INTO `jiang_dl115_code` VALUES ('77823', '20160221-68', '10,06,07,02,01', '2016-02-21 20:22:56');
INSERT INTO `jiang_dl115_code` VALUES ('77824', '20160221-69', '08,05,06,04,09', '2016-02-21 20:33:04');
INSERT INTO `jiang_dl115_code` VALUES ('77825', '20160221-70', '02,11,07,04,05', '2016-02-21 20:43:12');
INSERT INTO `jiang_dl115_code` VALUES ('77826', '20160221-71', '11,08,03,07,06', '2016-02-21 20:52:42');
INSERT INTO `jiang_dl115_code` VALUES ('77827', '20160221-72', '11,01,05,06,03', '2016-02-21 21:03:28');
INSERT INTO `jiang_dl115_code` VALUES ('77828', '20160221-73', '06,10,07,09,05', '2016-02-21 21:14:17');
INSERT INTO `jiang_dl115_code` VALUES ('77829', '20160221-74', '01,09,02,04,03', '2016-02-21 21:23:07');
INSERT INTO `jiang_dl115_code` VALUES ('77830', '20160221-75', '03,11,09,10,07', '2016-02-21 21:33:52');
INSERT INTO `jiang_dl115_code` VALUES ('77831', '20160221-76', '06,08,04,11,10', '2016-02-21 21:43:22');
INSERT INTO `jiang_dl115_code` VALUES ('77832', '20160221-77', '05,07,11,10,08', '2016-02-21 21:53:31');
INSERT INTO `jiang_dl115_code` VALUES ('77833', '20160221-78', '08,05,10,06,03', '2016-02-21 22:03:38');
INSERT INTO `jiang_dl115_code` VALUES ('77834', '20160221-84', '04,07,06,03,05', '2016-02-22 09:00:25');
INSERT INTO `jiang_dl115_code` VALUES ('77835', '20160222-01', '02,04,10,01,05', '2016-02-22 09:13:43');
INSERT INTO `jiang_dl115_code` VALUES ('77836', '20160222-02', '05,08,06,03,10', '2016-02-22 09:23:51');
INSERT INTO `jiang_dl115_code` VALUES ('77837', '20160222-03', '07,11,04,10,01', '2016-02-22 09:33:59');
INSERT INTO `jiang_dl115_code` VALUES ('77838', '20160222-04', '11,09,05,10,06', '2016-02-22 09:42:51');
INSERT INTO `jiang_dl115_code` VALUES ('77839', '20160222-05', '11,09,08,05,06', '2016-02-22 09:52:59');
INSERT INTO `jiang_dl115_code` VALUES ('77840', '20160222-06', '10,11,05,07,08', '2016-02-22 10:03:07');
INSERT INTO `jiang_dl115_code` VALUES ('77841', '20160222-07', '09,08,01,06,04', '2016-02-22 10:13:16');
INSERT INTO `jiang_dl115_code` VALUES ('77842', '20160222-08', '11,06,09,10,01', '2016-02-22 10:23:24');
INSERT INTO `jiang_dl115_code` VALUES ('77843', '20160222-09', '09,07,03,04,08', '2016-02-22 10:33:32');
INSERT INTO `jiang_dl115_code` VALUES ('77844', '20160222-10', '05,11,07,02,04', '2016-02-22 10:43:45');
INSERT INTO `jiang_dl115_code` VALUES ('77845', '20160222-11', '04,02,03,01,11', '2016-02-22 10:52:32');
INSERT INTO `jiang_dl115_code` VALUES ('77846', '20160222-12', '01,04,06,09,03', '2016-02-22 11:02:40');
INSERT INTO `jiang_dl115_code` VALUES ('77847', '20160222-13', '01,03,10,05,06', '2016-02-22 11:12:48');
INSERT INTO `jiang_dl115_code` VALUES ('77848', '20160222-14', '04,06,07,05,01', '2016-02-22 11:22:49');
INSERT INTO `jiang_dl115_code` VALUES ('77849', '20160222-15', '07,09,01,11,10', '2016-02-22 11:32:58');
INSERT INTO `jiang_dl115_code` VALUES ('77850', '20160222-16', '07,11,06,02,04', '2016-02-22 11:43:05');
INSERT INTO `jiang_dl115_code` VALUES ('77851', '20160222-17', '01,02,06,07,04', '2016-02-22 11:53:13');
INSERT INTO `jiang_dl115_code` VALUES ('77852', '20160222-18', '04,01,05,07,08', '2016-02-22 12:03:21');
INSERT INTO `jiang_dl115_code` VALUES ('77853', '20160222-19', '10,11,05,04,08', '2016-02-22 12:12:26');
INSERT INTO `jiang_dl115_code` VALUES ('77854', '20160222-20', '08,07,05,02,03', '2016-02-22 12:22:59');
INSERT INTO `jiang_dl115_code` VALUES ('77855', '20160222-21', '01,06,11,07,02', '2016-02-22 12:33:45');
INSERT INTO `jiang_dl115_code` VALUES ('77856', '20160222-22', '02,11,10,07,09', '2016-02-22 12:43:15');
INSERT INTO `jiang_dl115_code` VALUES ('77857', '20160222-23', '07,02,10,03,05', '2016-02-22 12:52:48');
INSERT INTO `jiang_dl115_code` VALUES ('77858', '20160222-24', '05,09,08,11,04', '2016-02-22 13:02:53');
INSERT INTO `jiang_dl115_code` VALUES ('77859', '20160222-25', '05,02,08,03,01', '2016-02-22 13:13:05');
INSERT INTO `jiang_dl115_code` VALUES ('77860', '20160222-26', '10,04,07,02,05', '2016-02-22 13:23:13');
INSERT INTO `jiang_dl115_code` VALUES ('77861', '20160222-27', '06,04,07,08,02', '2016-02-22 13:33:21');
INSERT INTO `jiang_dl115_code` VALUES ('77862', '20160222-28', '08,10,07,03,01', '2016-02-22 13:42:52');
INSERT INTO `jiang_dl115_code` VALUES ('77863', '20160222-29', '08,03,09,11,05', '2016-02-22 13:52:22');
INSERT INTO `jiang_dl115_code` VALUES ('77864', '20160222-30', '10,02,05,11,03', '2016-02-22 14:02:30');
INSERT INTO `jiang_dl115_code` VALUES ('77865', '20160222-31', '02,10,01,07,05', '2016-02-22 14:13:16');
INSERT INTO `jiang_dl115_code` VALUES ('77866', '20160222-32', '07,08,11,01,10', '2016-02-22 14:24:02');
INSERT INTO `jiang_dl115_code` VALUES ('77867', '20160222-33', '05,02,01,04,08', '2016-02-22 14:34:10');
INSERT INTO `jiang_dl115_code` VALUES ('77868', '20160222-34', '02,04,11,09,07', '2016-02-22 14:43:40');
INSERT INTO `jiang_dl115_code` VALUES ('77869', '20160222-35', '11,05,02,07,04', '2016-02-22 14:53:10');
INSERT INTO `jiang_dl115_code` VALUES ('77870', '20160222-36', '01,08,05,09,02', '2016-02-22 15:03:18');
INSERT INTO `jiang_dl115_code` VALUES ('77871', '20160222-37', '07,04,06,05,08', '2016-02-22 15:12:48');
INSERT INTO `jiang_dl115_code` VALUES ('77872', '20160222-38', '06,09,07,08,11', '2016-02-22 15:22:56');
INSERT INTO `jiang_dl115_code` VALUES ('77873', '20160222-39', '06,05,11,03,08', '2016-02-22 15:33:04');
INSERT INTO `jiang_dl115_code` VALUES ('77874', '20160222-40', '03,10,05,08,11', '2016-02-22 15:41:57');
INSERT INTO `jiang_dl115_code` VALUES ('77875', '20160222-41', '06,10,11,02,07', '2016-02-22 15:54:47');
INSERT INTO `jiang_dl115_code` VALUES ('77876', '20160222-42', '01,03,07,10,04', '2016-02-22 16:03:31');
INSERT INTO `jiang_dl115_code` VALUES ('77877', '20160222-43', '08,04,05,11,06', '2016-02-22 16:14:09');
INSERT INTO `jiang_dl115_code` VALUES ('77878', '20160222-44', '03,11,08,06,09', '2016-02-22 16:23:39');
INSERT INTO `jiang_dl115_code` VALUES ('77879', '20160222-45', '02,08,03,07,10', '2016-02-22 16:33:10');
INSERT INTO `jiang_dl115_code` VALUES ('77880', '20160222-46', '01,09,04,02,11', '2016-02-22 16:43:55');
INSERT INTO `jiang_dl115_code` VALUES ('77881', '20160222-47', '10,04,07,05,01', '2016-02-22 16:52:47');
INSERT INTO `jiang_dl115_code` VALUES ('77882', '20160222-48', '05,07,08,06,02', '2016-02-22 17:03:33');
INSERT INTO `jiang_dl115_code` VALUES ('77883', '20160222-49', '09,08,07,11,03', '2016-02-22 17:13:04');
INSERT INTO `jiang_dl115_code` VALUES ('77884', '20160222-50', '05,06,03,07,02', '2016-02-22 17:24:28');
INSERT INTO `jiang_dl115_code` VALUES ('77885', '20160222-51', '01,08,02,11,03', '2016-02-22 17:34:36');
INSERT INTO `jiang_dl115_code` VALUES ('77886', '20160222-52', '11,02,06,01,10', '2016-02-22 17:43:28');
INSERT INTO `jiang_dl115_code` VALUES ('77887', '20160222-53', '06,01,10,11,08', '2016-02-22 17:54:14');
INSERT INTO `jiang_dl115_code` VALUES ('77888', '20160222-54', '07,06,02,11,09', '2016-02-22 18:02:28');
INSERT INTO `jiang_dl115_code` VALUES ('77889', '20160222-55', '09,03,11,04,07', '2016-02-22 18:12:34');
INSERT INTO `jiang_dl115_code` VALUES ('77890', '20160222-56', '02,04,01,05,08', '2016-02-22 18:23:58');
INSERT INTO `jiang_dl115_code` VALUES ('77891', '20160222-57', '03,08,04,01,10', '2016-02-22 18:32:51');
INSERT INTO `jiang_dl115_code` VALUES ('77892', '20160222-58', '06,11,05,04,07', '2016-02-22 18:42:58');
INSERT INTO `jiang_dl115_code` VALUES ('77893', '20160222-59', '08,10,09,04,06', '2016-02-22 18:53:44');
INSERT INTO `jiang_dl115_code` VALUES ('77894', '20160222-60', '10,11,05,06,02', '2016-02-22 19:03:14');
INSERT INTO `jiang_dl115_code` VALUES ('77895', '20160222-61', '01,11,04,09,10', '2016-02-22 19:13:22');
INSERT INTO `jiang_dl115_code` VALUES ('77896', '20160222-62', '02,07,06,03,10', '2016-02-22 19:22:52');
INSERT INTO `jiang_dl115_code` VALUES ('77897', '20160222-63', '01,04,11,09,07', '2016-02-22 19:34:16');
INSERT INTO `jiang_dl115_code` VALUES ('77898', '20160222-64', '01,07,09,03,10', '2016-02-22 19:45:02');
INSERT INTO `jiang_dl115_code` VALUES ('77899', '20160222-65', '08,09,06,02,10', '2016-02-22 19:53:54');
INSERT INTO `jiang_dl115_code` VALUES ('77900', '20160222-66', '04,09,07,11,01', '2016-02-22 20:03:25');
INSERT INTO `jiang_dl115_code` VALUES ('77901', '20160222-67', '09,06,11,01,03', '2016-02-22 20:12:55');
INSERT INTO `jiang_dl115_code` VALUES ('77902', '20160222-68', '10,08,11,07,03', '2016-02-22 20:23:03');
INSERT INTO `jiang_dl115_code` VALUES ('77903', '20160222-69', '10,01,11,09,05', '2016-02-22 20:32:32');
INSERT INTO `jiang_dl115_code` VALUES ('77904', '20160222-70', '05,03,11,06,10', '2016-02-22 20:43:19');
INSERT INTO `jiang_dl115_code` VALUES ('77905', '20160222-71', '04,02,08,06,03', '2016-02-22 20:53:28');
INSERT INTO `jiang_dl115_code` VALUES ('77906', '20160222-72', '09,06,05,01,03', '2016-02-22 21:02:57');
INSERT INTO `jiang_dl115_code` VALUES ('77907', '20160222-73', '02,01,03,08,11', '2016-02-22 21:13:05');
INSERT INTO `jiang_dl115_code` VALUES ('77908', '20160222-74', '01,09,07,03,02', '2016-02-22 21:23:13');
INSERT INTO `jiang_dl115_code` VALUES ('77909', '20160222-75', '02,06,11,03,04', '2016-02-22 21:33:22');
INSERT INTO `jiang_dl115_code` VALUES ('77910', '20160222-76', '03,10,09,02,08', '2016-02-22 21:42:13');
INSERT INTO `jiang_dl115_code` VALUES ('77911', '20160222-77', '03,09,08,05,11', '2016-02-22 21:53:37');
INSERT INTO `jiang_dl115_code` VALUES ('77912', '20160222-78', '05,08,11,01,02', '2016-02-22 22:04:32');
INSERT INTO `jiang_dl115_code` VALUES ('77913', '20160327-06', '11,08,02,03,09', '2016-03-27 10:03:41');
INSERT INTO `jiang_dl115_code` VALUES ('77914', '20160327-07', '08,06,01,05,02', '2016-03-27 10:13:11');
INSERT INTO `jiang_dl115_code` VALUES ('77915', '20160327-08', '05,03,09,11,01', '2016-03-27 10:22:44');
INSERT INTO `jiang_dl115_code` VALUES ('77916', '20160327-09', '02,10,03,05,04', '2016-03-27 10:34:08');
INSERT INTO `jiang_dl115_code` VALUES ('77917', '20160327-10', '04,06,05,03,10', '2016-03-27 10:42:22');
INSERT INTO `jiang_dl115_code` VALUES ('77918', '20160327-11', '09,05,02,01,04', '2016-03-27 10:52:30');
INSERT INTO `jiang_dl115_code` VALUES ('77919', '20160327-12', '05,10,08,06,01', '2016-03-27 11:02:38');
INSERT INTO `jiang_dl115_code` VALUES ('77920', '20160327-13', '07,04,11,01,09', '2016-03-27 11:13:24');
INSERT INTO `jiang_dl115_code` VALUES ('77921', '20160327-14', '08,05,10,09,11', '2016-03-27 11:22:16');
INSERT INTO `jiang_dl115_code` VALUES ('77922', '20160327-15', '05,01,04,03,07', '2016-03-27 11:33:02');
INSERT INTO `jiang_dl115_code` VALUES ('77923', '20160327-16', '09,05,06,04,07', '2016-03-27 11:43:10');
INSERT INTO `jiang_dl115_code` VALUES ('77924', '20160327-17', '10,11,04,02,09', '2016-03-27 11:52:02');
INSERT INTO `jiang_dl115_code` VALUES ('77925', '20160327-18', '10,11,09,08,06', '2016-03-27 12:03:26');
INSERT INTO `jiang_dl115_code` VALUES ('77926', '20160327-19', '07,06,09,08,02', '2016-03-27 12:13:35');
INSERT INTO `jiang_dl115_code` VALUES ('77927', '20160327-20', '07,10,04,09,06', '2016-03-27 12:23:04');
INSERT INTO `jiang_dl115_code` VALUES ('77928', '20160327-21', '08,11,04,03,02', '2016-03-27 12:32:34');
INSERT INTO `jiang_dl115_code` VALUES ('77929', '20160327-22', '11,08,07,02,09', '2016-03-27 12:43:20');
INSERT INTO `jiang_dl115_code` VALUES ('77930', '20160327-23', '11,08,01,07,09', '2016-03-27 12:52:50');
INSERT INTO `jiang_dl115_code` VALUES ('77931', '20160327-24', '02,05,09,11,10', '2016-03-27 13:02:20');
INSERT INTO `jiang_dl115_code` VALUES ('77932', '20160327-25', '04,08,05,01,09', '2016-03-27 13:12:32');
INSERT INTO `jiang_dl115_code` VALUES ('77933', '20160327-26', '07,10,06,02,04', '2016-03-27 13:22:36');
INSERT INTO `jiang_dl115_code` VALUES ('77934', '20160327-27', '11,04,09,01,10', '2016-03-27 13:33:22');
INSERT INTO `jiang_dl115_code` VALUES ('77935', '20160327-28', '07,08,02,10,04', '2016-03-27 13:42:15');
INSERT INTO `jiang_dl115_code` VALUES ('77936', '20160327-29', '11,04,08,01,10', '2016-03-27 13:53:01');
INSERT INTO `jiang_dl115_code` VALUES ('77937', '20160327-30', '10,06,01,02,08', '2016-03-27 14:03:09');
INSERT INTO `jiang_dl115_code` VALUES ('77938', '20160327-31', '10,09,06,03,07', '2016-03-27 14:12:01');
INSERT INTO `jiang_dl115_code` VALUES ('77939', '20160327-32', '06,07,02,10,01', '2016-03-27 14:22:47');
INSERT INTO `jiang_dl115_code` VALUES ('77940', '20160327-33', '11,10,04,03,08', '2016-03-27 14:32:20');
INSERT INTO `jiang_dl115_code` VALUES ('77941', '20160327-34', '03,09,02,07,05', '2016-03-27 14:43:03');
INSERT INTO `jiang_dl115_code` VALUES ('77942', '20160327-35', '09,06,05,04,01', '2016-03-27 14:53:11');
INSERT INTO `jiang_dl115_code` VALUES ('77943', '20160327-36', '09,11,05,06,04', '2016-03-27 15:02:41');
INSERT INTO `jiang_dl115_code` VALUES ('77944', '20160327-37', '01,10,08,07,03', '2016-03-27 15:12:49');
INSERT INTO `jiang_dl115_code` VALUES ('77945', '20160327-38', '01,08,07,11,05', '2016-03-27 15:22:19');
INSERT INTO `jiang_dl115_code` VALUES ('77946', '20160327-39', '02,01,04,07,03', '2016-03-27 15:32:27');
INSERT INTO `jiang_dl115_code` VALUES ('77947', '20160327-40', '07,09,03,10,01', '2016-03-27 15:43:14');
INSERT INTO `jiang_dl115_code` VALUES ('77948', '20160327-41', '06,07,05,03,08', '2016-03-27 15:52:43');
INSERT INTO `jiang_dl115_code` VALUES ('77949', '20160327-42', '01,02,06,04,08', '2016-03-27 16:02:51');
INSERT INTO `jiang_dl115_code` VALUES ('77950', '20160327-43', '11,10,04,07,09', '2016-03-27 16:12:59');
INSERT INTO `jiang_dl115_code` VALUES ('77951', '20160327-44', '05,10,11,04,03', '2016-03-27 16:22:29');
INSERT INTO `jiang_dl115_code` VALUES ('77952', '20160327-45', '04,11,09,06,03', '2016-03-27 16:31:59');
INSERT INTO `jiang_dl115_code` VALUES ('77953', '20160327-46', '05,07,09,01,02', '2016-03-27 16:42:45');
INSERT INTO `jiang_dl115_code` VALUES ('77954', '20160327-47', '10,01,06,09,03', '2016-03-27 16:52:53');
INSERT INTO `jiang_dl115_code` VALUES ('77955', '20160327-48', '03,09,07,02,06', '2016-03-27 17:02:24');
INSERT INTO `jiang_dl115_code` VALUES ('77956', '20160327-49', '01,06,02,05,10', '2016-03-27 17:13:10');
INSERT INTO `jiang_dl115_code` VALUES ('77957', '20160327-50', '09,10,08,04,02', '2016-03-27 17:22:40');
INSERT INTO `jiang_dl115_code` VALUES ('77958', '20160327-51', '11,08,01,10,03', '2016-03-27 17:32:48');
INSERT INTO `jiang_dl115_code` VALUES ('77959', '20160327-52', '10,02,05,11,06', '2016-03-27 17:42:56');
INSERT INTO `jiang_dl115_code` VALUES ('77960', '20160327-53', '03,02,10,07,08', '2016-03-27 17:53:04');
INSERT INTO `jiang_dl115_code` VALUES ('77961', '20160327-54', '02,03,09,08,11', '2016-03-27 18:03:12');
INSERT INTO `jiang_dl115_code` VALUES ('77962', '20160327-55', '08,04,07,06,10', '2016-03-27 18:13:20');
INSERT INTO `jiang_dl115_code` VALUES ('77963', '20160327-56', '05,07,03,02,11', '2016-03-27 18:22:50');
INSERT INTO `jiang_dl115_code` VALUES ('77964', '20160327-57', '04,10,11,06,08', '2016-03-27 18:32:20');
INSERT INTO `jiang_dl115_code` VALUES ('77965', '20160327-58', '04,07,09,02,03', '2016-03-27 18:42:29');
INSERT INTO `jiang_dl115_code` VALUES ('77966', '20160327-59', '06,01,07,03,08', '2016-03-27 18:52:36');
INSERT INTO `jiang_dl115_code` VALUES ('77967', '20160327-60', '05,01,04,09,07', '2016-03-27 19:02:44');
INSERT INTO `jiang_dl115_code` VALUES ('77968', '20160327-61', '02,09,01,06,03', '2016-03-27 19:13:30');
INSERT INTO `jiang_dl115_code` VALUES ('77969', '20160327-62', '06,11,08,02,10', '2016-03-27 19:22:22');
INSERT INTO `jiang_dl115_code` VALUES ('77970', '20160327-63', '11,07,01,04,06', '2016-03-27 19:33:46');
INSERT INTO `jiang_dl115_code` VALUES ('77971', '20160327-64', '05,09,04,08,10', '2016-03-27 19:42:38');
INSERT INTO `jiang_dl115_code` VALUES ('77972', '20160327-65', '06,07,01,11,04', '2016-03-27 19:52:47');
INSERT INTO `jiang_dl115_code` VALUES ('77973', '20160327-66', '11,10,07,06,08', '2016-03-27 20:03:33');
INSERT INTO `jiang_dl115_code` VALUES ('77974', '20160327-67', '11,06,02,10,04', '2016-03-27 20:13:06');
INSERT INTO `jiang_dl115_code` VALUES ('77975', '20160327-68', '10,01,05,11,07', '2016-03-27 20:23:49');
INSERT INTO `jiang_dl115_code` VALUES ('77976', '20160327-69', '05,10,08,01,11', '2016-03-27 20:32:41');
INSERT INTO `jiang_dl115_code` VALUES ('77977', '20160327-70', '07,02,03,11,10', '2016-03-27 20:44:05');
INSERT INTO `jiang_dl115_code` VALUES ('77978', '20160327-71', '11,10,04,06,09', '2016-03-27 20:52:57');
INSERT INTO `jiang_dl115_code` VALUES ('77979', '20160327-72', '03,11,09,10,08', '2016-03-27 21:03:05');
INSERT INTO `jiang_dl115_code` VALUES ('77980', '20160327-73', '08,02,04,07,03', '2016-03-27 21:12:35');
INSERT INTO `jiang_dl115_code` VALUES ('77981', '20160327-74', '01,03,10,08,11', '2016-03-27 21:22:43');
INSERT INTO `jiang_dl115_code` VALUES ('77982', '20160327-75', '01,06,09,11,08', '2016-03-27 21:33:29');
INSERT INTO `jiang_dl115_code` VALUES ('77983', '20160327-76', '04,11,01,05,02', '2016-03-27 21:43:37');
INSERT INTO `jiang_dl115_code` VALUES ('77984', '20160327-77', '01,02,05,07,09', '2016-03-27 21:53:45');
INSERT INTO `jiang_dl115_code` VALUES ('77985', '20160327-78', '07,06,02,01,09', '2016-03-27 22:02:37');
INSERT INTO `jiang_dl115_code` VALUES ('77986', '20160811-41', '02,01,09,03,05', '2016-08-11 15:56:50');

-- ----------------------------
-- Table structure for jiang_dl115_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_dl115_time`;
CREATE TABLE `jiang_dl115_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=220 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_dl115_time
-- ----------------------------
INSERT INTO `jiang_dl115_time` VALUES ('1', '00:00:00', '09:08:00', '09:10:00', '1');
INSERT INTO `jiang_dl115_time` VALUES ('143', '09:08:00', '09:18:00', '09:20:00', '2');
INSERT INTO `jiang_dl115_time` VALUES ('144', '09:18:00', '09:28:00', '09:30:00', '3');
INSERT INTO `jiang_dl115_time` VALUES ('145', '09:28:00', '09:38:00', '09:40:00', '4');
INSERT INTO `jiang_dl115_time` VALUES ('146', '09:38:00', '09:48:00', '09:50:00', '5');
INSERT INTO `jiang_dl115_time` VALUES ('147', '09:48:00', '09:58:00', '10:00:00', '6');
INSERT INTO `jiang_dl115_time` VALUES ('148', '09:58:00', '10:08:00', '10:10:00', '7');
INSERT INTO `jiang_dl115_time` VALUES ('149', '10:08:00', '10:18:00', '10:20:00', '8');
INSERT INTO `jiang_dl115_time` VALUES ('150', '10:18:00', '10:28:00', '10:30:00', '9');
INSERT INTO `jiang_dl115_time` VALUES ('151', '10:28:00', '10:38:00', '10:40:00', '10');
INSERT INTO `jiang_dl115_time` VALUES ('152', '10:38:00', '10:48:00', '10:50:00', '11');
INSERT INTO `jiang_dl115_time` VALUES ('153', '10:48:00', '10:58:00', '11:00:00', '12');
INSERT INTO `jiang_dl115_time` VALUES ('154', '10:58:00', '11:08:00', '11:10:00', '13');
INSERT INTO `jiang_dl115_time` VALUES ('155', '11:08:00', '11:18:00', '11:20:00', '14');
INSERT INTO `jiang_dl115_time` VALUES ('156', '11:18:00', '11:28:00', '11:30:00', '15');
INSERT INTO `jiang_dl115_time` VALUES ('157', '11:28:00', '11:38:00', '11:40:00', '16');
INSERT INTO `jiang_dl115_time` VALUES ('158', '11:38:00', '11:48:00', '11:50:00', '17');
INSERT INTO `jiang_dl115_time` VALUES ('159', '11:48:00', '11:58:00', '12:00:00', '18');
INSERT INTO `jiang_dl115_time` VALUES ('160', '11:58:00', '12:08:00', '12:10:00', '19');
INSERT INTO `jiang_dl115_time` VALUES ('161', '12:08:00', '12:18:00', '12:20:00', '20');
INSERT INTO `jiang_dl115_time` VALUES ('162', '12:18:00', '12:28:00', '12:30:00', '21');
INSERT INTO `jiang_dl115_time` VALUES ('163', '12:28:00', '12:38:00', '12:40:00', '22');
INSERT INTO `jiang_dl115_time` VALUES ('164', '12:38:00', '12:48:00', '12:50:00', '23');
INSERT INTO `jiang_dl115_time` VALUES ('165', '12:48:00', '12:58:00', '13:00:00', '24');
INSERT INTO `jiang_dl115_time` VALUES ('166', '12:58:00', '13:08:00', '13:10:00', '25');
INSERT INTO `jiang_dl115_time` VALUES ('167', '13:08:00', '13:18:00', '13:20:00', '26');
INSERT INTO `jiang_dl115_time` VALUES ('168', '13:18:00', '13:28:00', '13:30:00', '27');
INSERT INTO `jiang_dl115_time` VALUES ('169', '13:28:00', '13:38:00', '13:40:00', '28');
INSERT INTO `jiang_dl115_time` VALUES ('170', '13:38:00', '13:48:00', '13:50:00', '29');
INSERT INTO `jiang_dl115_time` VALUES ('171', '13:48:00', '13:58:00', '14:00:00', '30');
INSERT INTO `jiang_dl115_time` VALUES ('172', '13:58:00', '14:08:00', '14:10:00', '31');
INSERT INTO `jiang_dl115_time` VALUES ('173', '14:08:00', '14:18:00', '14:20:00', '32');
INSERT INTO `jiang_dl115_time` VALUES ('174', '14:18:00', '14:28:00', '14:30:00', '33');
INSERT INTO `jiang_dl115_time` VALUES ('175', '14:28:00', '14:38:00', '14:40:00', '34');
INSERT INTO `jiang_dl115_time` VALUES ('176', '14:38:00', '14:48:00', '14:50:00', '35');
INSERT INTO `jiang_dl115_time` VALUES ('177', '14:48:00', '14:58:00', '15:00:00', '36');
INSERT INTO `jiang_dl115_time` VALUES ('178', '14:58:00', '15:08:00', '15:10:00', '37');
INSERT INTO `jiang_dl115_time` VALUES ('179', '15:08:00', '15:18:00', '15:20:00', '38');
INSERT INTO `jiang_dl115_time` VALUES ('180', '15:18:00', '15:28:00', '15:30:00', '39');
INSERT INTO `jiang_dl115_time` VALUES ('181', '15:28:00', '15:38:00', '15:40:00', '40');
INSERT INTO `jiang_dl115_time` VALUES ('182', '15:38:00', '15:48:00', '15:50:00', '41');
INSERT INTO `jiang_dl115_time` VALUES ('183', '15:48:00', '15:58:00', '16:00:00', '42');
INSERT INTO `jiang_dl115_time` VALUES ('184', '15:58:00', '16:08:00', '16:10:00', '43');
INSERT INTO `jiang_dl115_time` VALUES ('185', '16:08:00', '16:18:00', '16:20:00', '44');
INSERT INTO `jiang_dl115_time` VALUES ('186', '16:18:00', '16:28:00', '16:30:00', '45');
INSERT INTO `jiang_dl115_time` VALUES ('187', '16:28:00', '16:38:00', '16:40:00', '46');
INSERT INTO `jiang_dl115_time` VALUES ('188', '16:38:00', '16:48:00', '16:50:00', '47');
INSERT INTO `jiang_dl115_time` VALUES ('189', '16:48:00', '16:58:00', '17:00:00', '48');
INSERT INTO `jiang_dl115_time` VALUES ('190', '16:58:00', '17:08:00', '17:10:00', '49');
INSERT INTO `jiang_dl115_time` VALUES ('191', '17:08:00', '17:18:00', '17:20:00', '50');
INSERT INTO `jiang_dl115_time` VALUES ('192', '17:18:00', '17:28:00', '17:30:00', '51');
INSERT INTO `jiang_dl115_time` VALUES ('193', '17:28:00', '17:38:00', '17:40:00', '52');
INSERT INTO `jiang_dl115_time` VALUES ('194', '17:38:00', '17:48:00', '17:50:00', '53');
INSERT INTO `jiang_dl115_time` VALUES ('195', '17:48:00', '17:58:00', '18:00:00', '54');
INSERT INTO `jiang_dl115_time` VALUES ('196', '17:58:00', '18:08:00', '18:10:00', '55');
INSERT INTO `jiang_dl115_time` VALUES ('197', '18:08:00', '18:18:00', '18:20:00', '56');
INSERT INTO `jiang_dl115_time` VALUES ('198', '18:18:00', '18:28:00', '18:30:00', '57');
INSERT INTO `jiang_dl115_time` VALUES ('199', '18:28:00', '18:38:00', '18:40:00', '58');
INSERT INTO `jiang_dl115_time` VALUES ('200', '18:38:00', '18:48:00', '18:50:00', '59');
INSERT INTO `jiang_dl115_time` VALUES ('201', '18:48:00', '18:58:00', '19:00:00', '60');
INSERT INTO `jiang_dl115_time` VALUES ('202', '18:58:00', '19:08:00', '19:10:00', '61');
INSERT INTO `jiang_dl115_time` VALUES ('203', '19:08:00', '19:18:00', '19:20:00', '62');
INSERT INTO `jiang_dl115_time` VALUES ('204', '19:18:00', '19:28:00', '19:30:00', '63');
INSERT INTO `jiang_dl115_time` VALUES ('205', '19:28:00', '19:38:00', '19:40:00', '64');
INSERT INTO `jiang_dl115_time` VALUES ('206', '19:38:00', '19:48:00', '19:50:00', '65');
INSERT INTO `jiang_dl115_time` VALUES ('207', '19:48:00', '19:58:00', '20:00:00', '66');
INSERT INTO `jiang_dl115_time` VALUES ('208', '19:58:00', '20:08:00', '20:10:00', '67');
INSERT INTO `jiang_dl115_time` VALUES ('209', '20:08:00', '20:18:00', '20:20:00', '68');
INSERT INTO `jiang_dl115_time` VALUES ('210', '20:18:00', '20:28:00', '20:30:00', '69');
INSERT INTO `jiang_dl115_time` VALUES ('211', '20:28:00', '20:38:00', '20:40:00', '70');
INSERT INTO `jiang_dl115_time` VALUES ('212', '20:38:00', '20:48:00', '20:50:00', '71');
INSERT INTO `jiang_dl115_time` VALUES ('213', '20:48:00', '20:58:00', '21:00:00', '72');
INSERT INTO `jiang_dl115_time` VALUES ('214', '20:58:00', '21:08:00', '21:10:00', '73');
INSERT INTO `jiang_dl115_time` VALUES ('215', '21:08:00', '21:18:00', '21:20:00', '74');
INSERT INTO `jiang_dl115_time` VALUES ('216', '21:18:00', '21:28:00', '21:30:00', '75');
INSERT INTO `jiang_dl115_time` VALUES ('217', '21:28:00', '21:38:00', '21:40:00', '76');
INSERT INTO `jiang_dl115_time` VALUES ('218', '21:38:00', '21:48:00', '21:50:00', '77');
INSERT INTO `jiang_dl115_time` VALUES ('219', '21:48:00', '21:58:00', '22:00:00', '78');

-- ----------------------------
-- Table structure for jiang_fenghong
-- ----------------------------
DROP TABLE IF EXISTS `jiang_fenghong`;
CREATE TABLE `jiang_fenghong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `addtime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_fenghong
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_fenghongxiaofei
-- ----------------------------
DROP TABLE IF EXISTS `jiang_fenghongxiaofei`;
CREATE TABLE `jiang_fenghongxiaofei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `addtime` date DEFAULT NULL,
  `xiaofei` double(15,4) DEFAULT NULL,
  `fandian` double(15,4) DEFAULT NULL,
  `zhonjiang` double(15,4) DEFAULT NULL,
  `yingkui` double(15,4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12848 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_fenghongxiaofei
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_fucai_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_fucai_code`;
CREATE TABLE `jiang_fucai_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1461 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_fucai_code
-- ----------------------------
INSERT INTO `jiang_fucai_code` VALUES ('1455', '2016044', '*,*,0,1,0', '2016-02-20 20:34:47');
INSERT INTO `jiang_fucai_code` VALUES ('1456', '2016045', '*,*,6,9,2', '2016-02-21 20:35:53');
INSERT INTO `jiang_fucai_code` VALUES ('1457', '2016046', '*,*,3,8,3', '2016-02-22 20:34:24');
INSERT INTO `jiang_fucai_code` VALUES ('1458', '2016079', '*,*,0,7,5', '2016-03-27 20:30:58');
INSERT INTO `jiang_fucai_code` VALUES ('1459', '2016080', '*,*,2,6,1', '2016-03-27 20:36:58');
INSERT INTO `jiang_fucai_code` VALUES ('1460', '2016216', '*,*,3,3,4', '2016-08-11 15:56:33');

-- ----------------------------
-- Table structure for jiang_fucai_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_fucai_time`;
CREATE TABLE `jiang_fucai_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_fucai_time
-- ----------------------------
INSERT INTO `jiang_fucai_time` VALUES ('1', '00:00:01', '20:00:00', '20:20:00', '1');

-- ----------------------------
-- Table structure for jiang_gd115_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_gd115_code`;
CREATE TABLE `jiang_gd115_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81978 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_gd115_code
-- ----------------------------
INSERT INTO `jiang_gd115_code` VALUES ('81649', '20160220-01', '07,08,01,11,05', '2016-02-20 09:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81650', '20160220-02', '02,03,10,05,11', '2016-02-20 09:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81651', '20160220-03', '06,03,10,04,05', '2016-02-20 09:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81652', '20160220-04', '02,01,09,11,05', '2016-02-20 09:42:12');
INSERT INTO `jiang_gd115_code` VALUES ('81653', '20160220-05', '04,03,10,06,02', '2016-02-20 09:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81654', '20160220-06', '07,09,05,08,06', '2016-02-20 10:03:12');
INSERT INTO `jiang_gd115_code` VALUES ('81655', '20160220-07', '08,02,10,06,01', '2016-02-20 10:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81656', '20160220-08', '11,06,10,07,02', '2016-02-20 10:21:57');
INSERT INTO `jiang_gd115_code` VALUES ('81657', '20160220-09', '03,06,09,05,04', '2016-02-20 10:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81658', '20160220-10', '01,06,08,11,02', '2016-02-20 10:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81659', '20160220-11', '07,08,05,01,03', '2016-02-20 10:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81660', '20160220-12', '01,05,07,08,02', '2016-02-20 11:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81661', '20160220-13', '05,09,06,02,10', '2016-02-20 11:13:42');
INSERT INTO `jiang_gd115_code` VALUES ('81662', '20160220-14', '11,03,02,04,05', '2016-02-20 11:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81663', '20160220-15', '10,08,07,02,05', '2016-02-20 11:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81664', '20160220-16', '07,05,03,04,02', '2016-02-20 11:42:14');
INSERT INTO `jiang_gd115_code` VALUES ('81665', '20160220-17', '05,03,06,02,07', '2016-02-20 11:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81666', '20160220-18', '08,02,07,11,10', '2016-02-20 12:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81667', '20160220-19', '05,03,08,10,09', '2016-02-20 12:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81668', '20160220-20', '08,04,07,02,11', '2016-02-20 12:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81669', '20160220-21', '07,03,11,02,06', '2016-02-20 12:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81670', '20160220-22', '07,06,09,08,04', '2016-02-20 12:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81671', '20160220-23', '03,01,07,08,05', '2016-02-20 12:53:27');
INSERT INTO `jiang_gd115_code` VALUES ('81672', '20160220-24', '09,06,11,02,07', '2016-02-20 13:03:14');
INSERT INTO `jiang_gd115_code` VALUES ('81673', '20160220-25', '05,07,04,02,08', '2016-02-20 13:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81674', '20160220-26', '11,07,08,03,06', '2016-02-20 13:22:43');
INSERT INTO `jiang_gd115_code` VALUES ('81675', '20160220-27', '02,03,11,01,10', '2016-02-20 13:31:42');
INSERT INTO `jiang_gd115_code` VALUES ('81676', '20160220-28', '08,04,03,05,09', '2016-02-20 13:42:12');
INSERT INTO `jiang_gd115_code` VALUES ('81677', '20160220-29', '01,06,11,05,07', '2016-02-20 13:53:31');
INSERT INTO `jiang_gd115_code` VALUES ('81678', '20160220-30', '06,04,10,01,09', '2016-02-20 14:02:28');
INSERT INTO `jiang_gd115_code` VALUES ('81679', '20160220-31', '04,10,11,02,06', '2016-02-20 14:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81680', '20160220-32', '02,04,11,08,06', '2016-02-20 14:22:01');
INSERT INTO `jiang_gd115_code` VALUES ('81681', '20160220-33', '07,09,03,06,01', '2016-02-20 14:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81682', '20160220-34', '01,05,08,03,09', '2016-02-20 14:43:01');
INSERT INTO `jiang_gd115_code` VALUES ('81683', '20160220-35', '01,03,10,07,11', '2016-02-20 14:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81684', '20160220-36', '08,05,01,10,09', '2016-02-20 15:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81685', '20160220-37', '02,06,05,11,09', '2016-02-20 15:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81686', '20160220-38', '08,04,07,03,01', '2016-02-20 15:23:27');
INSERT INTO `jiang_gd115_code` VALUES ('81687', '20160220-39', '02,01,03,04,07', '2016-02-20 15:33:12');
INSERT INTO `jiang_gd115_code` VALUES ('81688', '20160220-40', '04,03,10,07,02', '2016-02-20 15:42:17');
INSERT INTO `jiang_gd115_code` VALUES ('81689', '20160220-41', '01,07,06,05,04', '2016-02-20 15:53:31');
INSERT INTO `jiang_gd115_code` VALUES ('81690', '20160220-42', '02,09,04,07,03', '2016-02-20 16:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81691', '20160220-43', '02,07,10,11,03', '2016-02-20 16:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81692', '20160220-44', '02,05,10,06,03', '2016-02-20 16:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81693', '20160220-45', '08,07,11,03,05', '2016-02-20 16:33:12');
INSERT INTO `jiang_gd115_code` VALUES ('81694', '20160220-46', '05,04,09,01,07', '2016-02-20 16:43:43');
INSERT INTO `jiang_gd115_code` VALUES ('81695', '20160220-47', '10,06,11,05,01', '2016-02-20 16:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81696', '20160220-48', '03,08,09,05,11', '2016-02-20 17:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81697', '20160220-49', '07,02,08,03,01', '2016-02-20 17:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81698', '20160220-50', '06,07,11,05,01', '2016-02-20 17:22:00');
INSERT INTO `jiang_gd115_code` VALUES ('81699', '20160220-51', '10,09,05,07,03', '2016-02-20 17:31:43');
INSERT INTO `jiang_gd115_code` VALUES ('81700', '20160220-52', '04,03,05,02,06', '2016-02-20 17:42:58');
INSERT INTO `jiang_gd115_code` VALUES ('81701', '20160220-53', '01,06,04,08,11', '2016-02-20 17:51:58');
INSERT INTO `jiang_gd115_code` VALUES ('81702', '20160220-54', '06,03,11,08,04', '2016-02-20 18:03:58');
INSERT INTO `jiang_gd115_code` VALUES ('81703', '20160220-55', '07,04,09,03,10', '2016-02-20 18:12:58');
INSERT INTO `jiang_gd115_code` VALUES ('81704', '20160220-56', '04,10,08,07,06', '2016-02-20 18:21:58');
INSERT INTO `jiang_gd115_code` VALUES ('81705', '20160220-57', '11,06,07,01,05', '2016-02-20 18:32:28');
INSERT INTO `jiang_gd115_code` VALUES ('81706', '20160220-58', '08,11,03,06,01', '2016-02-20 18:42:58');
INSERT INTO `jiang_gd115_code` VALUES ('81707', '20160220-59', '04,11,07,05,06', '2016-02-20 18:52:43');
INSERT INTO `jiang_gd115_code` VALUES ('81708', '20160220-60', '03,07,04,09,05', '2016-02-20 19:03:13');
INSERT INTO `jiang_gd115_code` VALUES ('81709', '20160220-61', '07,09,01,06,04', '2016-02-20 19:13:43');
INSERT INTO `jiang_gd115_code` VALUES ('81710', '20160220-62', '09,05,04,10,06', '2016-02-20 19:21:58');
INSERT INTO `jiang_gd115_code` VALUES ('81711', '20160220-63', '11,08,02,09,07', '2016-02-20 19:33:13');
INSERT INTO `jiang_gd115_code` VALUES ('81712', '20160220-64', '05,08,04,10,02', '2016-02-20 19:43:05');
INSERT INTO `jiang_gd115_code` VALUES ('81713', '20160220-65', '09,10,11,06,05', '2016-02-20 19:52:02');
INSERT INTO `jiang_gd115_code` VALUES ('81714', '20160220-66', '03,05,11,06,08', '2016-02-20 20:02:32');
INSERT INTO `jiang_gd115_code` VALUES ('81715', '20160220-67', '04,05,06,09,01', '2016-02-20 20:13:00');
INSERT INTO `jiang_gd115_code` VALUES ('81716', '20160220-68', '06,03,08,09,01', '2016-02-20 20:22:02');
INSERT INTO `jiang_gd115_code` VALUES ('81717', '20160220-69', '05,02,04,09,06', '2016-02-20 20:33:17');
INSERT INTO `jiang_gd115_code` VALUES ('81718', '20160220-70', '06,08,09,05,01', '2016-02-20 20:42:15');
INSERT INTO `jiang_gd115_code` VALUES ('81719', '20160220-71', '07,09,03,02,11', '2016-02-20 20:52:01');
INSERT INTO `jiang_gd115_code` VALUES ('81720', '20160220-72', '07,10,09,01,08', '2016-02-20 21:02:30');
INSERT INTO `jiang_gd115_code` VALUES ('81721', '20160220-73', '04,06,02,03,05', '2016-02-20 21:12:16');
INSERT INTO `jiang_gd115_code` VALUES ('81722', '20160220-74', '09,11,06,02,08', '2016-02-20 21:22:01');
INSERT INTO `jiang_gd115_code` VALUES ('81723', '20160220-75', '01,07,10,11,09', '2016-02-20 21:32:30');
INSERT INTO `jiang_gd115_code` VALUES ('81724', '20160220-76', '10,09,01,06,11', '2016-02-20 21:42:18');
INSERT INTO `jiang_gd115_code` VALUES ('81725', '20160220-77', '05,07,02,09,11', '2016-02-20 21:53:34');
INSERT INTO `jiang_gd115_code` VALUES ('81726', '20160220-78', '06,07,05,11,02', '2016-02-20 22:02:34');
INSERT INTO `jiang_gd115_code` VALUES ('81727', '20160220-79', '10,08,05,06,04', '2016-02-20 22:13:03');
INSERT INTO `jiang_gd115_code` VALUES ('81728', '20160220-80', '06,04,02,09,11', '2016-02-20 22:22:45');
INSERT INTO `jiang_gd115_code` VALUES ('81729', '20160220-81', '09,08,01,06,10', '2016-02-20 22:31:45');
INSERT INTO `jiang_gd115_code` VALUES ('81730', '20160220-82', '07,09,06,03,02', '2016-02-20 22:41:35');
INSERT INTO `jiang_gd115_code` VALUES ('81731', '20160220-83', '09,05,11,02,10', '2016-02-20 22:52:52');
INSERT INTO `jiang_gd115_code` VALUES ('81732', '20160220-84', '05,04,10,03,11', '2016-02-20 23:02:19');
INSERT INTO `jiang_gd115_code` VALUES ('81733', '20160221-01', '05,10,02,07,03', '2016-02-21 09:13:28');
INSERT INTO `jiang_gd115_code` VALUES ('81734', '20160221-02', '01,09,04,08,07', '2016-02-21 09:22:28');
INSERT INTO `jiang_gd115_code` VALUES ('81735', '20160221-03', '02,08,03,07,04', '2016-02-21 09:32:13');
INSERT INTO `jiang_gd115_code` VALUES ('81736', '20160221-04', '11,04,06,02,01', '2016-02-21 09:43:29');
INSERT INTO `jiang_gd115_code` VALUES ('81737', '20160221-05', '03,01,05,06,10', '2016-02-21 09:51:43');
INSERT INTO `jiang_gd115_code` VALUES ('81738', '20160221-06', '02,07,10,08,09', '2016-02-21 10:02:58');
INSERT INTO `jiang_gd115_code` VALUES ('81739', '20160221-07', '04,11,08,05,02', '2016-02-21 10:11:58');
INSERT INTO `jiang_gd115_code` VALUES ('81740', '20160221-08', '10,09,08,01,05', '2016-02-21 10:23:14');
INSERT INTO `jiang_gd115_code` VALUES ('81741', '20160221-09', '01,03,10,02,09', '2016-02-21 10:31:33');
INSERT INTO `jiang_gd115_code` VALUES ('81742', '20160221-10', '10,09,06,08,04', '2016-02-21 10:42:52');
INSERT INTO `jiang_gd115_code` VALUES ('81743', '20160221-11', '08,10,06,05,07', '2016-02-21 10:52:28');
INSERT INTO `jiang_gd115_code` VALUES ('81744', '20160221-12', '11,09,02,05,03', '2016-02-21 11:02:58');
INSERT INTO `jiang_gd115_code` VALUES ('81745', '20160221-13', '03,06,05,01,10', '2016-02-21 11:13:33');
INSERT INTO `jiang_gd115_code` VALUES ('81746', '20160221-14', '02,05,09,01,07', '2016-02-21 11:22:32');
INSERT INTO `jiang_gd115_code` VALUES ('81747', '20160221-15', '01,08,09,11,10', '2016-02-21 11:32:58');
INSERT INTO `jiang_gd115_code` VALUES ('81748', '20160221-16', '07,04,02,09,06', '2016-02-21 11:42:43');
INSERT INTO `jiang_gd115_code` VALUES ('81749', '20160221-17', '09,05,02,06,08', '2016-02-21 11:51:45');
INSERT INTO `jiang_gd115_code` VALUES ('81750', '20160221-18', '01,03,04,10,09', '2016-02-21 12:02:13');
INSERT INTO `jiang_gd115_code` VALUES ('81751', '20160221-19', '03,07,02,11,09', '2016-02-21 12:12:46');
INSERT INTO `jiang_gd115_code` VALUES ('81752', '20160221-20', '09,06,02,05,08', '2016-02-21 12:22:28');
INSERT INTO `jiang_gd115_code` VALUES ('81753', '20160221-21', '06,08,10,04,11', '2016-02-21 12:32:15');
INSERT INTO `jiang_gd115_code` VALUES ('81754', '20160221-22', '11,08,01,07,10', '2016-02-21 12:42:43');
INSERT INTO `jiang_gd115_code` VALUES ('81755', '20160221-23', '02,04,06,05,03', '2016-02-21 12:52:28');
INSERT INTO `jiang_gd115_code` VALUES ('81756', '20160221-24', '03,11,10,09,07', '2016-02-21 13:02:14');
INSERT INTO `jiang_gd115_code` VALUES ('81757', '20160221-25', '09,03,08,04,05', '2016-02-21 13:11:58');
INSERT INTO `jiang_gd115_code` VALUES ('81758', '20160221-26', '11,05,03,04,08', '2016-02-21 13:23:13');
INSERT INTO `jiang_gd115_code` VALUES ('81759', '20160221-27', '09,03,04,11,07', '2016-02-21 13:32:14');
INSERT INTO `jiang_gd115_code` VALUES ('81760', '20160221-28', '07,01,11,03,05', '2016-02-21 13:41:58');
INSERT INTO `jiang_gd115_code` VALUES ('81761', '20160221-29', '06,10,07,03,02', '2016-02-21 13:52:28');
INSERT INTO `jiang_gd115_code` VALUES ('81762', '20160221-30', '02,10,01,04,07', '2016-02-21 14:03:44');
INSERT INTO `jiang_gd115_code` VALUES ('81763', '20160221-31', '05,10,11,01,09', '2016-02-21 14:12:43');
INSERT INTO `jiang_gd115_code` VALUES ('81764', '20160221-32', '10,01,11,03,06', '2016-02-21 14:22:34');
INSERT INTO `jiang_gd115_code` VALUES ('81765', '20160221-33', '10,09,05,07,01', '2016-02-21 14:32:58');
INSERT INTO `jiang_gd115_code` VALUES ('81766', '20160221-34', '08,06,10,01,09', '2016-02-21 14:42:02');
INSERT INTO `jiang_gd115_code` VALUES ('81767', '20160221-35', '06,11,05,09,01', '2016-02-21 14:53:13');
INSERT INTO `jiang_gd115_code` VALUES ('81768', '20160221-36', '05,11,10,06,02', '2016-02-21 15:02:14');
INSERT INTO `jiang_gd115_code` VALUES ('81769', '20160221-37', '08,03,02,06,04', '2016-02-21 15:12:44');
INSERT INTO `jiang_gd115_code` VALUES ('81770', '20160221-38', '09,11,05,04,08', '2016-02-21 15:21:44');
INSERT INTO `jiang_gd115_code` VALUES ('81771', '20160221-39', '10,09,01,11,02', '2016-02-21 15:32:59');
INSERT INTO `jiang_gd115_code` VALUES ('81772', '20160221-40', '05,02,03,04,08', '2016-02-21 15:42:44');
INSERT INTO `jiang_gd115_code` VALUES ('81773', '20160221-41', '11,06,03,09,01', '2016-02-21 15:52:30');
INSERT INTO `jiang_gd115_code` VALUES ('81774', '20160221-42', '04,03,01,11,10', '2016-02-21 16:01:29');
INSERT INTO `jiang_gd115_code` VALUES ('81775', '20160221-43', '10,07,08,06,01', '2016-02-21 16:13:29');
INSERT INTO `jiang_gd115_code` VALUES ('81776', '20160221-44', '08,09,06,11,04', '2016-02-21 16:21:44');
INSERT INTO `jiang_gd115_code` VALUES ('81777', '20160221-45', '02,03,09,01,10', '2016-02-21 16:32:59');
INSERT INTO `jiang_gd115_code` VALUES ('81778', '20160221-46', '06,05,03,11,04', '2016-02-21 16:43:29');
INSERT INTO `jiang_gd115_code` VALUES ('81779', '20160221-47', '04,06,08,02,07', '2016-02-21 16:53:14');
INSERT INTO `jiang_gd115_code` VALUES ('81780', '20160221-48', '08,04,01,09,06', '2016-02-21 17:02:59');
INSERT INTO `jiang_gd115_code` VALUES ('81781', '20160221-49', '11,09,07,02,03', '2016-02-21 17:11:59');
INSERT INTO `jiang_gd115_code` VALUES ('81782', '20160221-50', '02,10,11,04,05', '2016-02-21 17:21:44');
INSERT INTO `jiang_gd115_code` VALUES ('81783', '20160221-51', '01,11,03,04,09', '2016-02-21 17:32:14');
INSERT INTO `jiang_gd115_code` VALUES ('81784', '20160221-52', '01,05,07,10,03', '2016-02-21 17:43:29');
INSERT INTO `jiang_gd115_code` VALUES ('81785', '20160221-53', '09,02,11,05,04', '2016-02-21 17:53:14');
INSERT INTO `jiang_gd115_code` VALUES ('81786', '20160221-54', '09,03,01,10,04', '2016-02-21 18:02:17');
INSERT INTO `jiang_gd115_code` VALUES ('81787', '20160221-55', '09,04,11,06,07', '2016-02-21 18:11:59');
INSERT INTO `jiang_gd115_code` VALUES ('81788', '20160221-56', '06,01,03,10,08', '2016-02-21 18:22:29');
INSERT INTO `jiang_gd115_code` VALUES ('81789', '20160221-57', '07,02,03,06,09', '2016-02-21 18:32:59');
INSERT INTO `jiang_gd115_code` VALUES ('81790', '20160221-58', '07,10,03,11,06', '2016-02-21 18:41:59');
INSERT INTO `jiang_gd115_code` VALUES ('81791', '20160221-59', '07,02,11,04,01', '2016-02-21 18:52:29');
INSERT INTO `jiang_gd115_code` VALUES ('81792', '20160221-60', '10,01,07,11,05', '2016-02-21 19:02:59');
INSERT INTO `jiang_gd115_code` VALUES ('81793', '20160221-61', '07,03,10,04,02', '2016-02-21 19:13:30');
INSERT INTO `jiang_gd115_code` VALUES ('81794', '20160221-62', '07,04,01,05,10', '2016-02-21 19:22:29');
INSERT INTO `jiang_gd115_code` VALUES ('81795', '20160221-63', '09,06,11,07,04', '2016-02-21 19:33:00');
INSERT INTO `jiang_gd115_code` VALUES ('81796', '20160221-64', '06,04,07,08,03', '2016-02-21 19:42:44');
INSERT INTO `jiang_gd115_code` VALUES ('81797', '20160221-65', '02,01,07,04,08', '2016-02-21 19:52:30');
INSERT INTO `jiang_gd115_code` VALUES ('81798', '20160221-66', '08,06,01,05,09', '2016-02-21 20:02:14');
INSERT INTO `jiang_gd115_code` VALUES ('81799', '20160221-67', '04,07,05,10,09', '2016-02-21 20:12:00');
INSERT INTO `jiang_gd115_code` VALUES ('81800', '20160221-68', '06,05,11,09,04', '2016-02-21 20:22:32');
INSERT INTO `jiang_gd115_code` VALUES ('81801', '20160221-69', '09,03,01,08,07', '2016-02-21 20:32:14');
INSERT INTO `jiang_gd115_code` VALUES ('81802', '20160221-70', '03,09,08,06,07', '2016-02-21 20:42:44');
INSERT INTO `jiang_gd115_code` VALUES ('81803', '20160221-71', '10,07,01,06,02', '2016-02-21 20:51:44');
INSERT INTO `jiang_gd115_code` VALUES ('81804', '20160221-72', '04,03,08,02,09', '2016-02-21 21:02:14');
INSERT INTO `jiang_gd115_code` VALUES ('81805', '20160221-73', '09,08,07,01,04', '2016-02-21 21:13:30');
INSERT INTO `jiang_gd115_code` VALUES ('81806', '20160221-74', '04,11,05,03,06', '2016-02-21 21:23:14');
INSERT INTO `jiang_gd115_code` VALUES ('81807', '20160221-75', '03,08,09,04,10', '2016-02-21 21:33:44');
INSERT INTO `jiang_gd115_code` VALUES ('81808', '20160221-76', '02,08,01,03,07', '2016-02-21 21:42:44');
INSERT INTO `jiang_gd115_code` VALUES ('81809', '20160221-77', '07,03,05,11,10', '2016-02-21 21:53:15');
INSERT INTO `jiang_gd115_code` VALUES ('81810', '20160221-78', '06,05,02,01,08', '2016-02-21 22:03:00');
INSERT INTO `jiang_gd115_code` VALUES ('81811', '20160221-79', '10,09,08,04,02', '2016-02-21 22:13:30');
INSERT INTO `jiang_gd115_code` VALUES ('81812', '20160221-80', '08,11,09,06,07', '2016-02-21 22:22:30');
INSERT INTO `jiang_gd115_code` VALUES ('81813', '20160221-81', '03,02,09,10,06', '2016-02-21 22:33:00');
INSERT INTO `jiang_gd115_code` VALUES ('81814', '20160221-82', '05,10,11,02,01', '2016-02-21 22:42:45');
INSERT INTO `jiang_gd115_code` VALUES ('81815', '20160221-83', '02,10,04,09,01', '2016-02-21 22:53:15');
INSERT INTO `jiang_gd115_code` VALUES ('81816', '20160221-84', '05,06,02,09,11', '2016-02-21 23:02:15');
INSERT INTO `jiang_gd115_code` VALUES ('81817', '20160222-01', '01,02,03,04,05', '2016-02-22 09:13:31');
INSERT INTO `jiang_gd115_code` VALUES ('81818', '20160222-02', '01,11,06,07,09', '2016-02-22 09:23:17');
INSERT INTO `jiang_gd115_code` VALUES ('81819', '20160222-03', '01,04,09,07,08', '2016-02-22 09:33:01');
INSERT INTO `jiang_gd115_code` VALUES ('81820', '20160222-04', '07,01,02,04,08', '2016-02-22 09:42:46');
INSERT INTO `jiang_gd115_code` VALUES ('81821', '20160222-05', '06,01,05,07,08', '2016-02-22 09:52:31');
INSERT INTO `jiang_gd115_code` VALUES ('81822', '20160222-06', '06,04,01,07,05', '2016-02-22 10:03:01');
INSERT INTO `jiang_gd115_code` VALUES ('81823', '20160222-07', '10,09,02,01,11', '2016-02-22 10:12:01');
INSERT INTO `jiang_gd115_code` VALUES ('81824', '20160222-08', '04,09,05,02,01', '2016-02-22 10:22:31');
INSERT INTO `jiang_gd115_code` VALUES ('81825', '20160222-09', '08,01,06,07,03', '2016-02-22 10:33:02');
INSERT INTO `jiang_gd115_code` VALUES ('81826', '20160222-10', '04,09,08,07,01', '2016-02-22 10:43:32');
INSERT INTO `jiang_gd115_code` VALUES ('81827', '20160222-11', '09,03,08,01,05', '2016-02-22 10:53:17');
INSERT INTO `jiang_gd115_code` VALUES ('81828', '20160222-12', '03,04,05,02,09', '2016-02-22 11:02:16');
INSERT INTO `jiang_gd115_code` VALUES ('81829', '20160222-13', '10,02,08,05,03', '2016-02-22 11:12:46');
INSERT INTO `jiang_gd115_code` VALUES ('81830', '20160222-14', '03,08,09,01,05', '2016-02-22 11:23:10');
INSERT INTO `jiang_gd115_code` VALUES ('81831', '20160222-15', '04,09,02,08,01', '2016-02-22 11:32:10');
INSERT INTO `jiang_gd115_code` VALUES ('81832', '20160222-16', '05,07,02,04,09', '2016-02-22 11:42:40');
INSERT INTO `jiang_gd115_code` VALUES ('81833', '20160222-17', '06,05,09,03,08', '2016-02-22 11:52:26');
INSERT INTO `jiang_gd115_code` VALUES ('81834', '20160222-18', '03,05,07,01,10', '2016-02-22 12:02:12');
INSERT INTO `jiang_gd115_code` VALUES ('81835', '20160222-19', '07,04,01,03,11', '2016-02-22 12:12:04');
INSERT INTO `jiang_gd115_code` VALUES ('81836', '20160222-20', '10,02,05,01,09', '2016-02-22 12:22:26');
INSERT INTO `jiang_gd115_code` VALUES ('81837', '20160222-21', '07,02,06,05,09', '2016-02-22 12:32:11');
INSERT INTO `jiang_gd115_code` VALUES ('81838', '20160222-22', '09,06,02,05,07', '2016-02-22 12:42:43');
INSERT INTO `jiang_gd115_code` VALUES ('81839', '20160222-23', '04,03,07,11,06', '2016-02-22 12:52:26');
INSERT INTO `jiang_gd115_code` VALUES ('81840', '20160222-24', '08,03,01,07,04', '2016-02-22 13:02:10');
INSERT INTO `jiang_gd115_code` VALUES ('81841', '20160222-25', '10,09,01,02,06', '2016-02-22 13:11:55');
INSERT INTO `jiang_gd115_code` VALUES ('81842', '20160222-26', '08,09,06,05,07', '2016-02-22 13:22:26');
INSERT INTO `jiang_gd115_code` VALUES ('81843', '20160222-27', '10,02,05,07,09', '2016-02-22 13:32:56');
INSERT INTO `jiang_gd115_code` VALUES ('81844', '20160222-28', '03,05,04,08,06', '2016-02-22 13:42:40');
INSERT INTO `jiang_gd115_code` VALUES ('81845', '20160222-29', '04,06,08,02,10', '2016-02-22 13:53:11');
INSERT INTO `jiang_gd115_code` VALUES ('81846', '20160222-30', '10,05,06,04,03', '2016-02-22 14:02:57');
INSERT INTO `jiang_gd115_code` VALUES ('81847', '20160222-31', '06,07,03,01,09', '2016-02-22 14:12:41');
INSERT INTO `jiang_gd115_code` VALUES ('81848', '20160222-32', '05,08,06,03,02', '2016-02-22 14:21:41');
INSERT INTO `jiang_gd115_code` VALUES ('81849', '20160222-33', '06,04,11,05,07', '2016-02-22 14:32:11');
INSERT INTO `jiang_gd115_code` VALUES ('81850', '20160222-34', '05,08,03,01,11', '2016-02-22 14:42:41');
INSERT INTO `jiang_gd115_code` VALUES ('81851', '20160222-35', '10,11,08,03,07', '2016-02-22 14:53:12');
INSERT INTO `jiang_gd115_code` VALUES ('81852', '20160222-36', '05,10,07,06,11', '2016-02-22 15:02:11');
INSERT INTO `jiang_gd115_code` VALUES ('81853', '20160222-37', '11,09,01,07,04', '2016-02-22 15:12:00');
INSERT INTO `jiang_gd115_code` VALUES ('81854', '20160222-38', '05,08,07,09,11', '2016-02-22 15:22:27');
INSERT INTO `jiang_gd115_code` VALUES ('81855', '20160222-39', '01,06,11,07,02', '2016-02-22 15:32:11');
INSERT INTO `jiang_gd115_code` VALUES ('81856', '20160222-40', '07,10,11,02,03', '2016-02-22 15:42:42');
INSERT INTO `jiang_gd115_code` VALUES ('81857', '20160222-41', '10,09,03,05,04', '2016-02-22 15:51:48');
INSERT INTO `jiang_gd115_code` VALUES ('81858', '20160222-42', '07,05,04,11,02', '2016-02-22 16:03:03');
INSERT INTO `jiang_gd115_code` VALUES ('81859', '20160222-43', '11,05,01,07,04', '2016-02-22 16:12:46');
INSERT INTO `jiang_gd115_code` VALUES ('81860', '20160222-44', '02,07,04,10,08', '2016-02-22 16:22:32');
INSERT INTO `jiang_gd115_code` VALUES ('81861', '20160222-45', '07,11,01,02,08', '2016-02-22 16:33:03');
INSERT INTO `jiang_gd115_code` VALUES ('81862', '20160222-46', '03,08,11,01,06', '2016-02-22 16:42:02');
INSERT INTO `jiang_gd115_code` VALUES ('81863', '20160222-47', '07,01,02,04,09', '2016-02-22 16:52:32');
INSERT INTO `jiang_gd115_code` VALUES ('81864', '20160222-48', '04,10,07,02,03', '2016-02-22 17:01:32');
INSERT INTO `jiang_gd115_code` VALUES ('81865', '20160222-49', '02,04,10,09,05', '2016-02-22 17:12:47');
INSERT INTO `jiang_gd115_code` VALUES ('81866', '20160222-50', '06,07,04,11,01', '2016-02-22 17:21:47');
INSERT INTO `jiang_gd115_code` VALUES ('81867', '20160222-51', '05,09,11,10,06', '2016-02-22 17:33:47');
INSERT INTO `jiang_gd115_code` VALUES ('81868', '20160222-52', '04,05,07,10,03', '2016-02-22 17:42:02');
INSERT INTO `jiang_gd115_code` VALUES ('81869', '20160222-53', '06,01,11,02,03', '2016-02-22 17:52:33');
INSERT INTO `jiang_gd115_code` VALUES ('81870', '20160222-54', '10,03,07,01,11', '2016-02-22 18:02:17');
INSERT INTO `jiang_gd115_code` VALUES ('81871', '20160222-55', '06,01,02,09,07', '2016-02-22 18:12:35');
INSERT INTO `jiang_gd115_code` VALUES ('81872', '20160222-56', '11,08,10,06,05', '2016-02-22 18:22:20');
INSERT INTO `jiang_gd115_code` VALUES ('81873', '20160222-57', '01,09,08,07,04', '2016-02-22 18:33:35');
INSERT INTO `jiang_gd115_code` VALUES ('81874', '20160222-58', '06,09,10,07,02', '2016-02-22 18:41:50');
INSERT INTO `jiang_gd115_code` VALUES ('81875', '20160222-59', '07,01,10,06,03', '2016-02-22 18:53:05');
INSERT INTO `jiang_gd115_code` VALUES ('81876', '20160222-60', '03,11,08,05,02', '2016-02-22 19:02:50');
INSERT INTO `jiang_gd115_code` VALUES ('81877', '20160222-61', '10,04,07,09,11', '2016-02-22 19:11:50');
INSERT INTO `jiang_gd115_code` VALUES ('81878', '20160222-62', '08,06,04,07,02', '2016-02-22 19:22:20');
INSERT INTO `jiang_gd115_code` VALUES ('81879', '20160222-63', '10,04,11,05,07', '2016-02-22 19:32:05');
INSERT INTO `jiang_gd115_code` VALUES ('81880', '20160222-64', '05,07,04,08,01', '2016-02-22 19:43:20');
INSERT INTO `jiang_gd115_code` VALUES ('81881', '20160222-65', '03,09,04,05,07', '2016-02-22 19:52:20');
INSERT INTO `jiang_gd115_code` VALUES ('81882', '20160222-66', '04,03,10,09,11', '2016-02-22 20:03:35');
INSERT INTO `jiang_gd115_code` VALUES ('81883', '20160222-67', '11,05,04,02,10', '2016-02-22 20:12:35');
INSERT INTO `jiang_gd115_code` VALUES ('81884', '20160222-68', '06,04,11,01,08', '2016-02-22 20:23:05');
INSERT INTO `jiang_gd115_code` VALUES ('81885', '20160222-69', '08,06,04,09,01', '2016-02-22 20:32:05');
INSERT INTO `jiang_gd115_code` VALUES ('81886', '20160222-70', '02,06,11,03,07', '2016-02-22 20:42:36');
INSERT INTO `jiang_gd115_code` VALUES ('81887', '20160222-71', '08,04,07,10,03', '2016-02-22 20:53:06');
INSERT INTO `jiang_gd115_code` VALUES ('81888', '20160222-72', '05,08,11,04,01', '2016-02-22 21:02:06');
INSERT INTO `jiang_gd115_code` VALUES ('81889', '20160222-73', '03,07,04,02,01', '2016-02-22 21:11:51');
INSERT INTO `jiang_gd115_code` VALUES ('81890', '20160222-74', '04,01,05,08,02', '2016-02-22 21:23:06');
INSERT INTO `jiang_gd115_code` VALUES ('81891', '20160222-75', '11,05,06,07,02', '2016-02-22 21:32:06');
INSERT INTO `jiang_gd115_code` VALUES ('81892', '20160222-76', '01,07,06,03,08', '2016-02-22 21:43:21');
INSERT INTO `jiang_gd115_code` VALUES ('81893', '20160222-77', '11,04,03,09,06', '2016-02-22 21:52:21');
INSERT INTO `jiang_gd115_code` VALUES ('81894', '20160222-78', '04,01,09,08,07', '2016-02-22 22:03:36');
INSERT INTO `jiang_gd115_code` VALUES ('81895', '20160222-79', '09,08,03,04,07', '2016-02-22 22:12:36');
INSERT INTO `jiang_gd115_code` VALUES ('81896', '20160222-80', '03,07,01,06,08', '2016-02-22 22:23:52');
INSERT INTO `jiang_gd115_code` VALUES ('81897', '20160222-81', '03,09,01,06,08', '2016-02-22 22:33:36');
INSERT INTO `jiang_gd115_code` VALUES ('81898', '20160222-82', '09,01,10,03,07', '2016-02-22 22:43:22');
INSERT INTO `jiang_gd115_code` VALUES ('81899', '20160222-83', '02,11,09,08,03', '2016-02-22 22:53:06');
INSERT INTO `jiang_gd115_code` VALUES ('81900', '20160222-84', '06,03,05,02,04', '2016-02-22 23:02:06');
INSERT INTO `jiang_gd115_code` VALUES ('81901', '20160327-06', '01,10,04,05,09', '2016-03-27 10:03:48');
INSERT INTO `jiang_gd115_code` VALUES ('81902', '20160327-07', '09,02,08,07,01', '2016-03-27 10:12:03');
INSERT INTO `jiang_gd115_code` VALUES ('81903', '20160327-08', '09,05,07,01,04', '2016-03-27 10:22:41');
INSERT INTO `jiang_gd115_code` VALUES ('81904', '20160327-09', '06,11,08,03,07', '2016-03-27 10:33:12');
INSERT INTO `jiang_gd115_code` VALUES ('81905', '20160327-10', '08,05,03,02,11', '2016-03-27 10:43:41');
INSERT INTO `jiang_gd115_code` VALUES ('81906', '20160327-11', '01,04,08,06,10', '2016-03-27 10:52:41');
INSERT INTO `jiang_gd115_code` VALUES ('81907', '20160327-12', '06,05,01,09,07', '2016-03-27 11:02:26');
INSERT INTO `jiang_gd115_code` VALUES ('81908', '20160327-13', '09,06,10,11,08', '2016-03-27 11:12:56');
INSERT INTO `jiang_gd115_code` VALUES ('81909', '20160327-14', '06,10,04,09,07', '2016-03-27 11:22:41');
INSERT INTO `jiang_gd115_code` VALUES ('81910', '20160327-15', '09,02,10,06,07', '2016-03-27 11:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81911', '20160327-16', '08,10,02,09,01', '2016-03-27 11:42:56');
INSERT INTO `jiang_gd115_code` VALUES ('81912', '20160327-17', '11,02,04,07,05', '2016-03-27 11:52:41');
INSERT INTO `jiang_gd115_code` VALUES ('81913', '20160327-18', '06,10,01,02,05', '2016-03-27 12:03:57');
INSERT INTO `jiang_gd115_code` VALUES ('81914', '20160327-19', '08,11,05,07,02', '2016-03-27 12:12:11');
INSERT INTO `jiang_gd115_code` VALUES ('81915', '20160327-20', '06,01,09,03,02', '2016-03-27 12:22:41');
INSERT INTO `jiang_gd115_code` VALUES ('81916', '20160327-21', '02,01,06,07,03', '2016-03-27 12:32:26');
INSERT INTO `jiang_gd115_code` VALUES ('81917', '20160327-22', '11,06,02,05,09', '2016-03-27 12:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81918', '20160327-23', '09,10,11,02,03', '2016-03-27 12:51:56');
INSERT INTO `jiang_gd115_code` VALUES ('81919', '20160327-24', '04,06,05,03,09', '2016-03-27 13:03:12');
INSERT INTO `jiang_gd115_code` VALUES ('81920', '20160327-25', '05,06,09,04,11', '2016-03-27 13:12:11');
INSERT INTO `jiang_gd115_code` VALUES ('81921', '20160327-26', '06,10,11,01,08', '2016-03-27 13:22:41');
INSERT INTO `jiang_gd115_code` VALUES ('81922', '20160327-27', '10,07,02,04,08', '2016-03-27 13:32:26');
INSERT INTO `jiang_gd115_code` VALUES ('81923', '20160327-28', '02,05,01,09,06', '2016-03-27 13:42:56');
INSERT INTO `jiang_gd115_code` VALUES ('81924', '20160327-29', '08,03,09,07,05', '2016-03-27 13:52:41');
INSERT INTO `jiang_gd115_code` VALUES ('81925', '20160327-30', '02,07,01,03,10', '2016-03-27 14:02:26');
INSERT INTO `jiang_gd115_code` VALUES ('81926', '20160327-31', '11,08,02,01,06', '2016-03-27 14:12:11');
INSERT INTO `jiang_gd115_code` VALUES ('81927', '20160327-32', '07,11,01,04,03', '2016-03-27 14:21:57');
INSERT INTO `jiang_gd115_code` VALUES ('81928', '20160327-33', '09,11,10,04,08', '2016-03-27 14:32:28');
INSERT INTO `jiang_gd115_code` VALUES ('81929', '20160327-34', '05,07,03,10,01', '2016-03-27 14:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81930', '20160327-35', '07,04,08,02,11', '2016-03-27 14:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81931', '20160327-36', '06,01,07,02,10', '2016-03-27 15:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81932', '20160327-37', '07,02,10,11,08', '2016-03-27 15:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81933', '20160327-38', '09,03,11,02,05', '2016-03-27 15:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81934', '20160327-39', '03,04,07,11,05', '2016-03-27 15:33:12');
INSERT INTO `jiang_gd115_code` VALUES ('81935', '20160327-40', '10,05,11,09,07', '2016-03-27 15:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81936', '20160327-41', '01,02,04,07,09', '2016-03-27 15:53:27');
INSERT INTO `jiang_gd115_code` VALUES ('81937', '20160327-42', '10,01,07,08,02', '2016-03-27 16:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81938', '20160327-43', '01,06,07,05,10', '2016-03-27 16:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81939', '20160327-44', '11,03,04,02,05', '2016-03-27 16:22:42');
INSERT INTO `jiang_gd115_code` VALUES ('81940', '20160327-45', '06,11,04,08,05', '2016-03-27 16:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81941', '20160327-46', '09,03,07,05,08', '2016-03-27 16:42:12');
INSERT INTO `jiang_gd115_code` VALUES ('81942', '20160327-47', '11,07,10,06,09', '2016-03-27 16:51:57');
INSERT INTO `jiang_gd115_code` VALUES ('81943', '20160327-48', '11,05,06,01,08', '2016-03-27 17:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81944', '20160327-49', '11,04,01,03,07', '2016-03-27 17:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81945', '20160327-50', '07,05,03,06,08', '2016-03-27 17:21:57');
INSERT INTO `jiang_gd115_code` VALUES ('81946', '20160327-51', '01,02,07,10,08', '2016-03-27 17:32:27');
INSERT INTO `jiang_gd115_code` VALUES ('81947', '20160327-52', '01,03,08,09,02', '2016-03-27 17:42:12');
INSERT INTO `jiang_gd115_code` VALUES ('81948', '20160327-53', '06,10,09,01,07', '2016-03-27 17:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81949', '20160327-54', '09,01,08,03,02', '2016-03-27 18:02:27');
INSERT INTO `jiang_gd115_code` VALUES ('81950', '20160327-55', '02,03,10,09,01', '2016-03-27 18:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81951', '20160327-56', '10,09,08,01,03', '2016-03-27 18:23:27');
INSERT INTO `jiang_gd115_code` VALUES ('81952', '20160327-57', '03,07,05,06,08', '2016-03-27 18:33:12');
INSERT INTO `jiang_gd115_code` VALUES ('81953', '20160327-58', '05,01,03,04,02', '2016-03-27 18:42:12');
INSERT INTO `jiang_gd115_code` VALUES ('81954', '20160327-59', '04,09,01,06,11', '2016-03-27 18:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81955', '20160327-60', '06,09,02,05,07', '2016-03-27 19:02:30');
INSERT INTO `jiang_gd115_code` VALUES ('81956', '20160327-61', '10,02,06,09,11', '2016-03-27 19:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81957', '20160327-62', '07,10,08,04,09', '2016-03-27 19:21:57');
INSERT INTO `jiang_gd115_code` VALUES ('81958', '20160327-63', '10,03,06,04,02', '2016-03-27 19:33:13');
INSERT INTO `jiang_gd115_code` VALUES ('81959', '20160327-64', '07,09,02,05,11', '2016-03-27 19:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81960', '20160327-65', '02,08,03,11,05', '2016-03-27 19:52:42');
INSERT INTO `jiang_gd115_code` VALUES ('81961', '20160327-66', '02,01,10,09,08', '2016-03-27 20:03:12');
INSERT INTO `jiang_gd115_code` VALUES ('81962', '20160327-67', '05,09,03,01,04', '2016-03-27 20:12:12');
INSERT INTO `jiang_gd115_code` VALUES ('81963', '20160327-68', '01,05,02,07,04', '2016-03-27 20:23:27');
INSERT INTO `jiang_gd115_code` VALUES ('81964', '20160327-69', '09,03,10,07,04', '2016-03-27 20:33:13');
INSERT INTO `jiang_gd115_code` VALUES ('81965', '20160327-70', '06,04,02,07,10', '2016-03-27 20:42:57');
INSERT INTO `jiang_gd115_code` VALUES ('81966', '20160327-71', '01,06,10,07,09', '2016-03-27 20:53:28');
INSERT INTO `jiang_gd115_code` VALUES ('81967', '20160327-72', '06,04,02,08,11', '2016-03-27 21:02:28');
INSERT INTO `jiang_gd115_code` VALUES ('81968', '20160327-73', '02,04,08,06,10', '2016-03-27 21:12:57');
INSERT INTO `jiang_gd115_code` VALUES ('81969', '20160327-74', '02,06,05,07,03', '2016-03-27 21:23:28');
INSERT INTO `jiang_gd115_code` VALUES ('81970', '20160327-75', '05,07,03,02,11', '2016-03-27 21:31:43');
INSERT INTO `jiang_gd115_code` VALUES ('81971', '20160327-76', '01,02,08,03,07', '2016-03-27 21:42:13');
INSERT INTO `jiang_gd115_code` VALUES ('81972', '20160327-77', '11,05,06,09,07', '2016-03-27 21:51:58');
INSERT INTO `jiang_gd115_code` VALUES ('81973', '20160327-78', '09,06,05,01,07', '2016-03-27 22:02:28');
INSERT INTO `jiang_gd115_code` VALUES ('81974', '20160327-79', '05,08,07,03,02', '2016-03-27 22:12:58');
INSERT INTO `jiang_gd115_code` VALUES ('81975', '20160327-80', '05,11,03,01,10', '2016-03-27 22:24:14');
INSERT INTO `jiang_gd115_code` VALUES ('81976', '20160327-81', '05,08,04,02,07', '2016-03-27 22:32:28');
INSERT INTO `jiang_gd115_code` VALUES ('81977', '20160811-41', '03,10,11,08,09', '2016-08-11 15:56:49');

-- ----------------------------
-- Table structure for jiang_gd115_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_gd115_time`;
CREATE TABLE `jiang_gd115_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=287 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_gd115_time
-- ----------------------------
INSERT INTO `jiang_gd115_time` VALUES ('1', '00:00:00', '09:09:00', '09:10:00', '1');
INSERT INTO `jiang_gd115_time` VALUES ('204', '09:09:00', '09:19:00', '09:20:00', '2');
INSERT INTO `jiang_gd115_time` VALUES ('205', '09:19:00', '09:29:00', '09:30:00', '3');
INSERT INTO `jiang_gd115_time` VALUES ('206', '09:29:00', '09:39:00', '09:40:00', '4');
INSERT INTO `jiang_gd115_time` VALUES ('207', '09:39:00', '09:49:00', '09:50:00', '5');
INSERT INTO `jiang_gd115_time` VALUES ('208', '09:49:00', '09:59:00', '10:00:00', '6');
INSERT INTO `jiang_gd115_time` VALUES ('209', '09:59:00', '10:09:00', '10:10:00', '7');
INSERT INTO `jiang_gd115_time` VALUES ('210', '10:09:00', '10:19:00', '10:20:00', '8');
INSERT INTO `jiang_gd115_time` VALUES ('211', '10:19:00', '10:29:00', '10:30:00', '9');
INSERT INTO `jiang_gd115_time` VALUES ('212', '10:29:00', '10:39:00', '10:40:00', '10');
INSERT INTO `jiang_gd115_time` VALUES ('213', '10:39:00', '10:49:00', '10:50:00', '11');
INSERT INTO `jiang_gd115_time` VALUES ('214', '10:49:00', '10:59:00', '11:00:00', '12');
INSERT INTO `jiang_gd115_time` VALUES ('215', '10:59:00', '11:09:00', '11:10:00', '13');
INSERT INTO `jiang_gd115_time` VALUES ('216', '11:09:00', '11:19:00', '11:20:00', '14');
INSERT INTO `jiang_gd115_time` VALUES ('217', '11:19:00', '11:29:00', '11:30:00', '15');
INSERT INTO `jiang_gd115_time` VALUES ('218', '11:29:00', '11:39:00', '11:40:00', '16');
INSERT INTO `jiang_gd115_time` VALUES ('219', '11:39:00', '11:49:00', '11:50:00', '17');
INSERT INTO `jiang_gd115_time` VALUES ('220', '11:49:00', '11:59:00', '12:00:00', '18');
INSERT INTO `jiang_gd115_time` VALUES ('221', '11:59:00', '12:09:00', '12:10:00', '19');
INSERT INTO `jiang_gd115_time` VALUES ('222', '12:09:00', '12:19:00', '12:20:00', '20');
INSERT INTO `jiang_gd115_time` VALUES ('223', '12:19:00', '12:29:00', '12:30:00', '21');
INSERT INTO `jiang_gd115_time` VALUES ('224', '12:29:00', '12:39:00', '12:40:00', '22');
INSERT INTO `jiang_gd115_time` VALUES ('225', '12:39:00', '12:49:00', '12:50:00', '23');
INSERT INTO `jiang_gd115_time` VALUES ('226', '12:49:00', '12:59:00', '13:00:00', '24');
INSERT INTO `jiang_gd115_time` VALUES ('227', '12:59:00', '13:09:00', '13:10:00', '25');
INSERT INTO `jiang_gd115_time` VALUES ('228', '13:09:00', '13:19:00', '13:20:00', '26');
INSERT INTO `jiang_gd115_time` VALUES ('229', '13:19:00', '13:29:00', '13:30:00', '27');
INSERT INTO `jiang_gd115_time` VALUES ('230', '13:29:00', '13:39:00', '13:40:00', '28');
INSERT INTO `jiang_gd115_time` VALUES ('231', '13:39:00', '13:49:00', '13:50:00', '29');
INSERT INTO `jiang_gd115_time` VALUES ('232', '13:49:00', '13:59:00', '14:00:00', '30');
INSERT INTO `jiang_gd115_time` VALUES ('233', '13:59:00', '14:09:00', '14:10:00', '31');
INSERT INTO `jiang_gd115_time` VALUES ('234', '14:09:00', '14:19:00', '14:20:00', '32');
INSERT INTO `jiang_gd115_time` VALUES ('235', '14:19:00', '14:29:00', '14:30:00', '33');
INSERT INTO `jiang_gd115_time` VALUES ('236', '14:29:00', '14:39:00', '14:40:00', '34');
INSERT INTO `jiang_gd115_time` VALUES ('237', '14:39:00', '14:49:00', '14:50:00', '35');
INSERT INTO `jiang_gd115_time` VALUES ('238', '14:49:00', '14:59:00', '15:00:00', '36');
INSERT INTO `jiang_gd115_time` VALUES ('239', '14:59:00', '15:09:00', '15:10:00', '37');
INSERT INTO `jiang_gd115_time` VALUES ('240', '15:09:00', '15:19:00', '15:20:00', '38');
INSERT INTO `jiang_gd115_time` VALUES ('241', '15:19:00', '15:29:00', '15:30:00', '39');
INSERT INTO `jiang_gd115_time` VALUES ('242', '15:29:00', '15:39:00', '15:40:00', '40');
INSERT INTO `jiang_gd115_time` VALUES ('243', '15:39:00', '15:49:00', '15:50:00', '41');
INSERT INTO `jiang_gd115_time` VALUES ('244', '15:49:00', '15:59:00', '16:00:00', '42');
INSERT INTO `jiang_gd115_time` VALUES ('245', '15:59:00', '16:09:00', '16:10:00', '43');
INSERT INTO `jiang_gd115_time` VALUES ('246', '16:09:00', '16:19:00', '16:20:00', '44');
INSERT INTO `jiang_gd115_time` VALUES ('247', '16:19:00', '16:29:00', '16:30:00', '45');
INSERT INTO `jiang_gd115_time` VALUES ('248', '16:29:00', '16:39:00', '16:40:00', '46');
INSERT INTO `jiang_gd115_time` VALUES ('249', '16:39:00', '16:49:00', '16:50:00', '47');
INSERT INTO `jiang_gd115_time` VALUES ('250', '16:49:00', '16:59:00', '17:00:00', '48');
INSERT INTO `jiang_gd115_time` VALUES ('251', '16:59:00', '17:09:00', '17:10:00', '49');
INSERT INTO `jiang_gd115_time` VALUES ('252', '17:09:00', '17:19:00', '17:20:00', '50');
INSERT INTO `jiang_gd115_time` VALUES ('253', '17:19:00', '17:29:00', '17:30:00', '51');
INSERT INTO `jiang_gd115_time` VALUES ('254', '17:29:00', '17:39:00', '17:40:00', '52');
INSERT INTO `jiang_gd115_time` VALUES ('255', '17:39:00', '17:49:00', '17:50:00', '53');
INSERT INTO `jiang_gd115_time` VALUES ('256', '17:49:00', '17:59:00', '18:00:00', '54');
INSERT INTO `jiang_gd115_time` VALUES ('257', '17:59:00', '18:09:00', '18:10:00', '55');
INSERT INTO `jiang_gd115_time` VALUES ('258', '18:09:00', '18:19:00', '18:20:00', '56');
INSERT INTO `jiang_gd115_time` VALUES ('259', '18:19:00', '18:29:00', '18:30:00', '57');
INSERT INTO `jiang_gd115_time` VALUES ('260', '18:29:00', '18:39:00', '18:40:00', '58');
INSERT INTO `jiang_gd115_time` VALUES ('261', '18:39:00', '18:49:00', '18:50:00', '59');
INSERT INTO `jiang_gd115_time` VALUES ('262', '18:49:00', '18:59:00', '19:00:00', '60');
INSERT INTO `jiang_gd115_time` VALUES ('263', '18:59:00', '19:09:00', '19:10:00', '61');
INSERT INTO `jiang_gd115_time` VALUES ('264', '19:09:00', '19:19:00', '19:20:00', '62');
INSERT INTO `jiang_gd115_time` VALUES ('265', '19:19:00', '19:29:00', '19:30:00', '63');
INSERT INTO `jiang_gd115_time` VALUES ('266', '19:29:00', '19:39:00', '19:40:00', '64');
INSERT INTO `jiang_gd115_time` VALUES ('267', '19:39:00', '19:49:00', '19:50:00', '65');
INSERT INTO `jiang_gd115_time` VALUES ('268', '19:49:00', '19:59:00', '20:00:00', '66');
INSERT INTO `jiang_gd115_time` VALUES ('269', '19:59:00', '20:09:00', '20:10:00', '67');
INSERT INTO `jiang_gd115_time` VALUES ('270', '20:09:00', '20:19:00', '20:20:00', '68');
INSERT INTO `jiang_gd115_time` VALUES ('271', '20:19:00', '20:29:00', '20:30:00', '69');
INSERT INTO `jiang_gd115_time` VALUES ('272', '20:29:00', '20:39:00', '20:40:00', '70');
INSERT INTO `jiang_gd115_time` VALUES ('273', '20:39:00', '20:49:00', '20:50:00', '71');
INSERT INTO `jiang_gd115_time` VALUES ('274', '20:49:00', '20:59:00', '21:00:00', '72');
INSERT INTO `jiang_gd115_time` VALUES ('275', '20:59:00', '21:09:00', '21:10:00', '73');
INSERT INTO `jiang_gd115_time` VALUES ('276', '21:09:00', '21:19:00', '21:20:00', '74');
INSERT INTO `jiang_gd115_time` VALUES ('277', '21:19:00', '21:29:00', '21:30:00', '75');
INSERT INTO `jiang_gd115_time` VALUES ('278', '21:29:00', '21:39:00', '21:40:00', '76');
INSERT INTO `jiang_gd115_time` VALUES ('279', '21:39:00', '21:49:00', '21:50:00', '77');
INSERT INTO `jiang_gd115_time` VALUES ('280', '21:49:00', '21:59:00', '22:00:00', '78');
INSERT INTO `jiang_gd115_time` VALUES ('281', '21:59:00', '22:09:00', '22:10:00', '79');
INSERT INTO `jiang_gd115_time` VALUES ('282', '22:09:00', '22:19:00', '22:20:00', '80');
INSERT INTO `jiang_gd115_time` VALUES ('283', '22:19:00', '22:29:00', '22:30:00', '81');
INSERT INTO `jiang_gd115_time` VALUES ('284', '22:29:00', '22:39:00', '22:40:00', '82');
INSERT INTO `jiang_gd115_time` VALUES ('285', '22:39:00', '22:49:00', '22:50:00', '83');
INSERT INTO `jiang_gd115_time` VALUES ('286', '22:49:00', '22:59:00', '23:00:00', '84');

-- ----------------------------
-- Table structure for jiang_gonggao
-- ----------------------------
DROP TABLE IF EXISTS `jiang_gonggao`;
CREATE TABLE `jiang_gonggao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_gonggao
-- ----------------------------
INSERT INTO `jiang_gonggao` VALUES ('1', '顶部公告', '欢迎光临', '2016-10-05 00:00:00');
INSERT INTO `jiang_gonggao` VALUES ('2', '	汇华微信充值可添加微信转账至微信号： hhwxzf', '尊敬的客户： 由于春节期间时时彩官网停运，1月26日（农历十二月二十九）下午15点截止取款，春节期间，1月27号除夕开始时时彩停市7天，至2月3号初七恢复正常运营，期间从1月24日到2月10日期间将限制夜间取款到11点截至取款，元宵节过后将恢复原有取款时间。感谢您的支持，汇华国际娱乐平台全体工作人员祝您新春快乐！', '2017-04-06 00:00:00');
INSERT INTO `jiang_gonggao` VALUES ('3', '	平台工商卡停用中，需要充值请联系客服。', '汇华平台收款工商卡：6212262103006377212 石绍泉  目前停用中，充值错概不负责。需要充值请联系客服。', '2017-02-18 00:00:00');
INSERT INTO `jiang_gonggao` VALUES ('4', '2017年春节时时彩停市时间表', '尊敬的客户： 由于春节期间时时彩官网停运，1月26日（农历十二月二十九）下午15点截止取款，春节期间，1月27号除夕开始时时彩停市7天，至2月3号初七恢复正常运营，期间从1月24日到2月10日期间将限制夜间取款到11点截至取款，元宵节过后将恢复原有取款时间。感谢您的支持，汇华国际娱乐平台全体工作人员祝您新春快乐！', '2017-01-15 00:00:00');

-- ----------------------------
-- Table structure for jiang_hsc_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_hsc_code`;
CREATE TABLE `jiang_hsc_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_hsc_code
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_hsc_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_hsc_time`;
CREATE TABLE `jiang_hsc_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_hsc_time
-- ----------------------------
INSERT INTO `jiang_hsc_time` VALUES ('1', '00:00:00', '08:47:00', '08:49:00', '1');
INSERT INTO `jiang_hsc_time` VALUES ('168', '08:47:00', '08:57:00', '08:59:00', '2');
INSERT INTO `jiang_hsc_time` VALUES ('169', '08:57:00', '09:07:00', '09:09:00', '3');
INSERT INTO `jiang_hsc_time` VALUES ('170', '09:07:00', '09:17:00', '09:19:00', '4');
INSERT INTO `jiang_hsc_time` VALUES ('171', '09:17:00', '09:27:00', '09:29:00', '5');
INSERT INTO `jiang_hsc_time` VALUES ('172', '09:27:00', '09:37:00', '09:39:00', '6');
INSERT INTO `jiang_hsc_time` VALUES ('173', '09:37:00', '09:47:00', '09:49:00', '7');
INSERT INTO `jiang_hsc_time` VALUES ('174', '09:47:00', '09:57:00', '09:59:00', '8');
INSERT INTO `jiang_hsc_time` VALUES ('175', '09:57:00', '10:07:00', '10:09:00', '9');
INSERT INTO `jiang_hsc_time` VALUES ('176', '10:07:00', '10:17:00', '10:19:00', '10');
INSERT INTO `jiang_hsc_time` VALUES ('177', '10:17:00', '10:27:00', '10:29:00', '11');
INSERT INTO `jiang_hsc_time` VALUES ('178', '10:27:00', '10:37:00', '10:39:00', '12');
INSERT INTO `jiang_hsc_time` VALUES ('179', '10:37:00', '10:47:00', '10:49:00', '13');
INSERT INTO `jiang_hsc_time` VALUES ('180', '10:47:00', '10:57:00', '10:59:00', '14');
INSERT INTO `jiang_hsc_time` VALUES ('181', '10:57:00', '11:07:00', '11:09:00', '15');
INSERT INTO `jiang_hsc_time` VALUES ('182', '11:07:00', '11:17:00', '11:19:00', '16');
INSERT INTO `jiang_hsc_time` VALUES ('183', '11:17:00', '11:27:00', '11:29:00', '17');
INSERT INTO `jiang_hsc_time` VALUES ('184', '11:27:00', '11:37:00', '11:39:00', '18');
INSERT INTO `jiang_hsc_time` VALUES ('185', '11:37:00', '11:47:00', '11:49:00', '19');
INSERT INTO `jiang_hsc_time` VALUES ('186', '11:47:00', '11:57:00', '11:59:00', '20');
INSERT INTO `jiang_hsc_time` VALUES ('187', '11:57:00', '12:07:00', '12:09:00', '21');
INSERT INTO `jiang_hsc_time` VALUES ('188', '12:07:00', '12:17:00', '12:19:00', '22');
INSERT INTO `jiang_hsc_time` VALUES ('189', '12:17:00', '12:27:00', '12:29:00', '23');
INSERT INTO `jiang_hsc_time` VALUES ('190', '12:27:00', '12:37:00', '12:39:00', '24');
INSERT INTO `jiang_hsc_time` VALUES ('191', '12:37:00', '12:47:00', '12:49:00', '25');
INSERT INTO `jiang_hsc_time` VALUES ('192', '12:47:00', '12:57:00', '12:59:00', '26');
INSERT INTO `jiang_hsc_time` VALUES ('193', '12:57:00', '13:07:00', '13:09:00', '27');
INSERT INTO `jiang_hsc_time` VALUES ('194', '13:07:00', '13:17:00', '13:19:00', '28');
INSERT INTO `jiang_hsc_time` VALUES ('195', '13:17:00', '13:27:00', '13:29:00', '29');
INSERT INTO `jiang_hsc_time` VALUES ('196', '13:27:00', '13:37:00', '13:39:00', '30');
INSERT INTO `jiang_hsc_time` VALUES ('197', '13:37:00', '13:47:00', '13:49:00', '31');
INSERT INTO `jiang_hsc_time` VALUES ('198', '13:47:00', '13:57:00', '13:59:00', '32');
INSERT INTO `jiang_hsc_time` VALUES ('199', '13:57:00', '14:07:00', '14:09:00', '33');
INSERT INTO `jiang_hsc_time` VALUES ('200', '14:07:00', '14:17:00', '14:19:00', '34');
INSERT INTO `jiang_hsc_time` VALUES ('201', '14:17:00', '14:27:00', '14:29:00', '35');
INSERT INTO `jiang_hsc_time` VALUES ('202', '14:27:00', '14:37:00', '14:39:00', '36');
INSERT INTO `jiang_hsc_time` VALUES ('203', '14:37:00', '14:47:00', '14:49:00', '37');
INSERT INTO `jiang_hsc_time` VALUES ('204', '14:47:00', '14:57:00', '14:59:00', '38');
INSERT INTO `jiang_hsc_time` VALUES ('205', '14:57:00', '15:07:00', '15:09:00', '39');
INSERT INTO `jiang_hsc_time` VALUES ('206', '15:07:00', '15:17:00', '15:19:00', '40');
INSERT INTO `jiang_hsc_time` VALUES ('207', '15:17:00', '15:27:00', '15:29:00', '41');
INSERT INTO `jiang_hsc_time` VALUES ('208', '15:27:00', '15:37:00', '15:39:00', '42');
INSERT INTO `jiang_hsc_time` VALUES ('209', '15:37:00', '15:47:00', '15:49:00', '43');
INSERT INTO `jiang_hsc_time` VALUES ('210', '15:47:00', '15:57:00', '15:59:00', '44');
INSERT INTO `jiang_hsc_time` VALUES ('211', '15:57:00', '16:07:00', '16:09:00', '45');
INSERT INTO `jiang_hsc_time` VALUES ('212', '16:07:00', '16:17:00', '16:19:00', '46');
INSERT INTO `jiang_hsc_time` VALUES ('213', '16:17:00', '16:27:00', '16:29:00', '47');
INSERT INTO `jiang_hsc_time` VALUES ('214', '16:27:00', '16:37:00', '16:39:00', '48');
INSERT INTO `jiang_hsc_time` VALUES ('215', '16:37:00', '16:47:00', '16:49:00', '49');
INSERT INTO `jiang_hsc_time` VALUES ('216', '16:47:00', '16:57:00', '16:59:00', '50');
INSERT INTO `jiang_hsc_time` VALUES ('217', '16:57:00', '17:07:00', '17:09:00', '51');
INSERT INTO `jiang_hsc_time` VALUES ('218', '17:07:00', '17:17:00', '17:19:00', '52');
INSERT INTO `jiang_hsc_time` VALUES ('219', '17:17:00', '17:27:00', '17:29:00', '53');
INSERT INTO `jiang_hsc_time` VALUES ('220', '17:27:00', '17:37:00', '17:39:00', '54');
INSERT INTO `jiang_hsc_time` VALUES ('221', '17:37:00', '17:47:00', '17:49:00', '55');
INSERT INTO `jiang_hsc_time` VALUES ('222', '17:47:00', '17:57:00', '17:59:00', '56');
INSERT INTO `jiang_hsc_time` VALUES ('223', '17:57:00', '18:07:00', '18:09:00', '57');
INSERT INTO `jiang_hsc_time` VALUES ('224', '18:07:00', '18:17:00', '18:19:00', '58');
INSERT INTO `jiang_hsc_time` VALUES ('225', '18:17:00', '18:27:00', '18:29:00', '59');
INSERT INTO `jiang_hsc_time` VALUES ('226', '18:27:00', '18:37:00', '18:39:00', '60');
INSERT INTO `jiang_hsc_time` VALUES ('227', '18:37:00', '18:47:00', '18:49:00', '61');
INSERT INTO `jiang_hsc_time` VALUES ('228', '18:47:00', '18:57:00', '18:59:00', '62');
INSERT INTO `jiang_hsc_time` VALUES ('229', '18:57:00', '19:07:00', '19:09:00', '63');
INSERT INTO `jiang_hsc_time` VALUES ('230', '19:07:00', '19:17:00', '19:19:00', '64');
INSERT INTO `jiang_hsc_time` VALUES ('231', '19:17:00', '19:27:00', '19:29:00', '65');
INSERT INTO `jiang_hsc_time` VALUES ('232', '19:27:00', '19:37:00', '19:39:00', '66');
INSERT INTO `jiang_hsc_time` VALUES ('233', '19:37:00', '19:47:00', '19:49:00', '67');
INSERT INTO `jiang_hsc_time` VALUES ('234', '19:47:00', '19:57:00', '19:59:00', '68');
INSERT INTO `jiang_hsc_time` VALUES ('235', '19:57:00', '20:07:00', '20:09:00', '69');
INSERT INTO `jiang_hsc_time` VALUES ('236', '20:07:00', '20:17:00', '20:19:00', '70');
INSERT INTO `jiang_hsc_time` VALUES ('237', '20:17:00', '20:27:00', '20:29:00', '71');
INSERT INTO `jiang_hsc_time` VALUES ('238', '20:27:00', '20:37:00', '20:39:00', '72');
INSERT INTO `jiang_hsc_time` VALUES ('239', '20:37:00', '20:47:00', '20:49:00', '73');
INSERT INTO `jiang_hsc_time` VALUES ('240', '20:47:00', '20:57:00', '20:59:00', '74');
INSERT INTO `jiang_hsc_time` VALUES ('241', '20:57:00', '21:07:00', '21:09:00', '75');
INSERT INTO `jiang_hsc_time` VALUES ('242', '21:07:00', '21:17:00', '21:19:00', '76');
INSERT INTO `jiang_hsc_time` VALUES ('243', '21:17:00', '21:27:00', '21:29:00', '77');
INSERT INTO `jiang_hsc_time` VALUES ('244', '21:27:00', '21:37:00', '21:39:00', '78');
INSERT INTO `jiang_hsc_time` VALUES ('245', '21:37:00', '21:47:00', '21:49:00', '79');
INSERT INTO `jiang_hsc_time` VALUES ('246', '21:47:00', '21:57:00', '21:59:00', '80');
INSERT INTO `jiang_hsc_time` VALUES ('247', '21:57:00', '22:07:00', '22:09:00', '81');
INSERT INTO `jiang_hsc_time` VALUES ('248', '22:07:00', '22:17:00', '22:19:00', '82');
INSERT INTO `jiang_hsc_time` VALUES ('249', '22:17:00', '22:27:00', '22:29:00', '83');
INSERT INTO `jiang_hsc_time` VALUES ('250', '22:27:00', '22:37:00', '22:39:00', '84');

-- ----------------------------
-- Table structure for jiang_jiazj
-- ----------------------------
DROP TABLE IF EXISTS `jiang_jiazj`;
CREATE TABLE `jiang_jiazj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotteryname` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `money` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_jiazj
-- ----------------------------
INSERT INTO `jiang_jiazj` VALUES ('13', '广东十一选五', 'xueerai', '', '8100');
INSERT INTO `jiang_jiazj` VALUES ('14', '重庆时时彩', 'xujiale00', '', '8640');
INSERT INTO `jiang_jiazj` VALUES ('15', '排列三、五', 'zh38819769', '', '3480');
INSERT INTO `jiang_jiazj` VALUES ('16', '重庆时时彩', 'hynodj1757', '', '3800');
INSERT INTO `jiang_jiazj` VALUES ('17', '福彩3D', 'wxc001', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('18', '十一运夺金', 'lienb5', '', '5400');
INSERT INTO `jiang_jiazj` VALUES ('19', '重庆十一选五', 'zsxboss', '', '1780');
INSERT INTO `jiang_jiazj` VALUES ('20', '福彩3D', 'xiaoluo', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('21', '多乐彩', 'sanguosha', '', '2300');
INSERT INTO `jiang_jiazj` VALUES ('22', '重庆时时彩', 'liufei8888', '', '7480');
INSERT INTO `jiang_jiazj` VALUES ('23', '十一运夺金', 'youyou1213', '', '1500');
INSERT INTO `jiang_jiazj` VALUES ('24', '重庆时时彩', 'fengzheng', '', '3680');
INSERT INTO `jiang_jiazj` VALUES ('25', '重庆时时彩', 'baidu9605', '', '2700');
INSERT INTO `jiang_jiazj` VALUES ('26', '江西时时彩', 'zhangwenyuan', '', '3400');
INSERT INTO `jiang_jiazj` VALUES ('27', '重庆时时彩', 'xlarger', '', '680');
INSERT INTO `jiang_jiazj` VALUES ('28', '江西时时彩', '81866557', '', '3400');
INSERT INTO `jiang_jiazj` VALUES ('29', '时时乐', 'aishangni', '', '4280');
INSERT INTO `jiang_jiazj` VALUES ('30', '广东十一选五', 'pojun788', '', '625');
INSERT INTO `jiang_jiazj` VALUES ('31', '重庆时时彩', 'muniu4646', '', '1180');
INSERT INTO `jiang_jiazj` VALUES ('32', '广东十一选五', 'shlmjs', '', '480');
INSERT INTO `jiang_jiazj` VALUES ('33', '重庆时时彩', 'beiduofen', '', '1060');
INSERT INTO `jiang_jiazj` VALUES ('34', '江西时时彩', 'sansi590', '', '120');
INSERT INTO `jiang_jiazj` VALUES ('35', '十一运夺金', 'sanyefac', '', '480');
INSERT INTO `jiang_jiazj` VALUES ('36', '重庆时时彩', 'zhouyu49622', '', '5870');
INSERT INTO `jiang_jiazj` VALUES ('37', '重庆时时彩', 'xiaoliuye', '', '1690');
INSERT INTO `jiang_jiazj` VALUES ('38', '重庆时时彩', 'xiansheng', '', '3800');
INSERT INTO `jiang_jiazj` VALUES ('39', '江西时时彩', 'handed', '', '4800');
INSERT INTO `jiang_jiazj` VALUES ('40', '江西时时彩', 'meilaoban', '', '2100');
INSERT INTO `jiang_jiazj` VALUES ('41', '重庆时时彩', 'wanzhoukaoyu', '', '1680');
INSERT INTO `jiang_jiazj` VALUES ('42', '江西时时彩', 'zusangaoshou', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('43', '重庆时时彩', 'shidao007', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('44', '十一运夺金', '458201325', '', '11600');
INSERT INTO `jiang_jiazj` VALUES ('46', '重庆时时彩', 'taoyuan', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('47', '十一运夺金', 'xiaosa1314', '', '190');
INSERT INTO `jiang_jiazj` VALUES ('48', '重庆时时彩', 'bazhu999', '', '5760');
INSERT INTO `jiang_jiazj` VALUES ('49', '重庆时时彩', 'jieshao60', '', '5760');
INSERT INTO `jiang_jiazj` VALUES ('50', '重庆时时彩', 'langren', '', '5700');
INSERT INTO `jiang_jiazj` VALUES ('51', '广东十一选五', 'benshaoye', '', '4800');
INSERT INTO `jiang_jiazj` VALUES ('52', '重庆时时彩', 'fengkui', '', '4280');
INSERT INTO `jiang_jiazj` VALUES ('53', '重庆时时彩', 'facai8888888', '', '7480');
INSERT INTO `jiang_jiazj` VALUES ('54', '重庆时时彩', 'guozi888', '', '570');
INSERT INTO `jiang_jiazj` VALUES ('55', '新疆时时彩', 'tongdawei', '', '3800');
INSERT INTO `jiang_jiazj` VALUES ('56', '重庆时时彩', '164613134', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('57', '重庆时时彩', '78954633', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('58', '重庆时时彩', '23511456', '', '480');
INSERT INTO `jiang_jiazj` VALUES ('59', '重庆时时彩', '548542152', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('60', '广东十一选五', '875452411', '', '7');
INSERT INTO `jiang_jiazj` VALUES ('61', '重庆时时彩', 'shazhuang', '', '300');
INSERT INTO `jiang_jiazj` VALUES ('62', '重庆十一选五', '58842232', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('63', '重庆时时彩', '2154854840', '', '1900');
INSERT INTO `jiang_jiazj` VALUES ('64', '重庆时时彩', '11321356', '', '19300');
INSERT INTO `jiang_jiazj` VALUES ('65', '重庆时时彩', 'dheng', '', '1900');
INSERT INTO `jiang_jiazj` VALUES ('66', '重庆时时彩', 'lou1219', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('67', '重庆时时彩', 'sadamu', '', '5870');
INSERT INTO `jiang_jiazj` VALUES ('68', '重庆时时彩', 'xilige', '', '16900');
INSERT INTO `jiang_jiazj` VALUES ('70', '重庆时时彩', 'dafacai', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('71', '重庆时时彩', 'tenglong7788', '', '5870');
INSERT INTO `jiang_jiazj` VALUES ('72', '重庆时时彩', 'xiaoyisi', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('73', '重庆时时彩', 'xujiacheng', '', '19200');
INSERT INTO `jiang_jiazj` VALUES ('75', '重庆时时彩', 'nikex', '', '21800');
INSERT INTO `jiang_jiazj` VALUES ('76', '重庆时时彩', 'dongxie', '', '18000');
INSERT INTO `jiang_jiazj` VALUES ('77', '重庆时时彩', 'nibaichime', '', '8640');
INSERT INTO `jiang_jiazj` VALUES ('78', '十一运夺金', 'masheng', '', '1200');
INSERT INTO `jiang_jiazj` VALUES ('79', '重庆时时彩', 'fahaowubian', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('80', '重庆时时彩', 'heishaoyt', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('81', '重庆时时彩', 'caizhi', '', '3480');
INSERT INTO `jiang_jiazj` VALUES ('82', '重庆时时彩', 'chenliangshuai', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('83', '重庆时时彩', 'chenzzz', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('84', '江西时时彩', 'jianping', '', '570');
INSERT INTO `jiang_jiazj` VALUES ('85', '重庆时时彩', 'liuming', '', '5400');
INSERT INTO `jiang_jiazj` VALUES ('86', '重庆时时彩', 'fangnuo12', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('87', '重庆时时彩', 'dahai', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('88', '重庆时时彩', 'ly13585', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('89', '重庆时时彩', 'xiaomeiren', '', '1200');
INSERT INTO `jiang_jiazj` VALUES ('90', '重庆时时彩', 'liufeiaa999', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('91', '重庆时时彩', 'piaoking', '', '16400');
INSERT INTO `jiang_jiazj` VALUES ('92', '重庆时时彩', 'zhimeng04', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('93', '重庆时时彩', 'lalalala', '', '19200');
INSERT INTO `jiang_jiazj` VALUES ('94', '重庆时时彩', 'i905351694', '', '1800');
INSERT INTO `jiang_jiazj` VALUES ('95', '重庆时时彩', 'lishen', '', '5400');
INSERT INTO `jiang_jiazj` VALUES ('96', '重庆时时彩', 'gaici', '', '17800');
INSERT INTO `jiang_jiazj` VALUES ('97', '重庆时时彩', 'xixihaha', '', '1900');
INSERT INTO `jiang_jiazj` VALUES ('98', '重庆时时彩', 'likeyou', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('99', '重庆时时彩', '478748422', '', '680');
INSERT INTO `jiang_jiazj` VALUES ('100', '重庆时时彩', 'shennong', '', '480');
INSERT INTO `jiang_jiazj` VALUES ('101', '重庆时时彩', 'kaige8', '', '190');
INSERT INTO `jiang_jiazj` VALUES ('102', '重庆时时彩', 'jiehade', '', '280');
INSERT INTO `jiang_jiazj` VALUES ('103', '重庆时时彩', 'wukelang', '', '280');
INSERT INTO `jiang_jiazj` VALUES ('104', '重庆时时彩', 'wulai5888', '', '190');
INSERT INTO `jiang_jiazj` VALUES ('105', '重庆时时彩', 'tutu7878', '', '19');
INSERT INTO `jiang_jiazj` VALUES ('106', '重庆时时彩', 'shuaigfe', '', '1180');
INSERT INTO `jiang_jiazj` VALUES ('107', '重庆时时彩', 'baobaoka', '', '192');
INSERT INTO `jiang_jiazj` VALUES ('108', '重庆时时彩', 'laoshu', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('109', '重庆时时彩', 'haozi', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('110', '重庆时时彩', 'xiaomei', '', '6200');
INSERT INTO `jiang_jiazj` VALUES ('111', '重庆时时彩', 'dami', '', '190');
INSERT INTO `jiang_jiazj` VALUES ('112', '重庆时时彩', 'wahaha ', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('113', '重庆时时彩', 'xuedaren', '', '310');
INSERT INTO `jiang_jiazj` VALUES ('114', '重庆时时彩', 'yanyan0102', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('115', '重庆时时彩', 'wudi666', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('116', '重庆时时彩', 'gandong', '', '118');
INSERT INTO `jiang_jiazj` VALUES ('117', '重庆时时彩', 'huangjin', '', '176');
INSERT INTO `jiang_jiazj` VALUES ('118', '重庆时时彩', 'marry130682', '', '3840');
INSERT INTO `jiang_jiazj` VALUES ('119', '重庆时时彩', 'YHyubin230', '', '190');
INSERT INTO `jiang_jiazj` VALUES ('120', '重庆时时彩', 'longlong666', '', '384');
INSERT INTO `jiang_jiazj` VALUES ('121', '重庆时时彩', 'hongyan', '', '19.2');
INSERT INTO `jiang_jiazj` VALUES ('122', '广东十一选五', 'shiyingjie110', '', '178');
INSERT INTO `jiang_jiazj` VALUES ('123', '重庆时时彩', 'lvchan', '', '180');
INSERT INTO `jiang_jiazj` VALUES ('124', '江西时时彩', 'wozhuai', '', '600');
INSERT INTO `jiang_jiazj` VALUES ('125', '重庆时时彩', 'woshidaye', '', '900');
INSERT INTO `jiang_jiazj` VALUES ('126', '多乐彩', 'shencenping', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('127', '重庆时时彩', 'wuweidsa', '', '2880');
INSERT INTO `jiang_jiazj` VALUES ('128', '福彩3D', 'danwang', '', '1700');
INSERT INTO `jiang_jiazj` VALUES ('132', '新疆时时彩', 'jiangfang', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('133', '新疆时时彩', 'huhushengwei', '', '192');
INSERT INTO `jiang_jiazj` VALUES ('144', '新疆时时彩', 'huhushengwei', '', '6000');
INSERT INTO `jiang_jiazj` VALUES ('145', '江西时时彩', 'longdechuanren', '', '3000');
INSERT INTO `jiang_jiazj` VALUES ('146', '江西时时彩', 'asfjka', '', '5060');
INSERT INTO `jiang_jiazj` VALUES ('147', '江西时时彩', 'kkdfg', '', '5920');
INSERT INTO `jiang_jiazj` VALUES ('148', '重庆时时彩', 'eyqwe', '', '8965');
INSERT INTO `jiang_jiazj` VALUES ('149', '广东十一选五', 'sfAE12', '', '6500');
INSERT INTO `jiang_jiazj` VALUES ('150', '十一运夺金', 'rtywe', '', '4700');
INSERT INTO `jiang_jiazj` VALUES ('151', '重庆时时彩', 'suid', '', '19300');
INSERT INTO `jiang_jiazj` VALUES ('152', '江西时时彩', 'odirgujd', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('153', '重庆时时彩', 'dgdgh', '', '1900');
INSERT INTO `jiang_jiazj` VALUES ('154', '重庆时时彩', 'jyke', '', '3850');
INSERT INTO `jiang_jiazj` VALUES ('155', '重庆时时彩', 'drdryj', '', '5600');
INSERT INTO `jiang_jiazj` VALUES ('156', '十一运夺金', 'dhrts', '', '682');
INSERT INTO `jiang_jiazj` VALUES ('157', '新疆时时彩', 'sgdrtge', '', '3840');
INSERT INTO `jiang_jiazj` VALUES ('158', '江西时时彩', 'dgESD', '', '1920');
INSERT INTO `jiang_jiazj` VALUES ('159', '广东十一选五', 'dgrad', '', '560');
INSERT INTO `jiang_jiazj` VALUES ('160', '江西时时彩', 'sfgserg', '', '6554');
INSERT INTO `jiang_jiazj` VALUES ('161', '重庆时时彩', 'sgdsaa', '', '19200');
INSERT INTO `jiang_jiazj` VALUES ('162', '广东十一选五', 'tuargfd', '', '480');
INSERT INTO `jiang_jiazj` VALUES ('163', '新疆时时彩', 'asgdg', '', '7640');
INSERT INTO `jiang_jiazj` VALUES ('164', '江西时时彩', 'sdrgtha', '', '6110');
INSERT INTO `jiang_jiazj` VALUES ('165', '重庆时时彩', '', '', '0');
INSERT INTO `jiang_jiazj` VALUES ('166', '福彩3D', '245265', '', '340');

-- ----------------------------
-- Table structure for jiang_lastissue
-- ----------------------------
DROP TABLE IF EXISTS `jiang_lastissue`;
CREATE TABLE `jiang_lastissue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lotteryid` int(11) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `issue` (`issue`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of jiang_lastissue
-- ----------------------------
INSERT INTO `jiang_lastissue` VALUES ('1', '1', '160223023', '2016-02-23 01:55:51');
INSERT INTO `jiang_lastissue` VALUES ('2', '2', '10134408', '2013-12-08 13:49:06');
INSERT INTO `jiang_lastissue` VALUES ('3', '3', '20160222-096', '2016-02-23 02:00:16');
INSERT INTO `jiang_lastissue` VALUES ('4', '4', '-', '2016-08-11 15:31:59');
INSERT INTO `jiang_lastissue` VALUES ('5', '5', '20160811-11', '2016-08-11 15:32:09');
INSERT INTO `jiang_lastissue` VALUES ('6', '6', '20150513-73', '2015-05-13 21:09:01');
INSERT INTO `jiang_lastissue` VALUES ('7', '7', '20160811-41', '2016-08-11 15:56:50');
INSERT INTO `jiang_lastissue` VALUES ('8', '8', '20160811-41', '2016-08-11 15:56:49');
INSERT INTO `jiang_lastissue` VALUES ('9', '9', '2016216', '2016-08-11 15:56:33');
INSERT INTO `jiang_lastissue` VALUES ('10', '10', '16216', '2016-08-11 15:53:23');
INSERT INTO `jiang_lastissue` VALUES ('11', '11', '20160317-85', '2016-02-22 11:38:25');
INSERT INTO `jiang_lastissue` VALUES ('12', '12', 'fdfd', '2013-12-08 13:44:27');
INSERT INTO `jiang_lastissue` VALUES ('13', '13', '2015121', '2015-10-19 22:27:20');
INSERT INTO `jiang_lastissue` VALUES ('14', '14', 'fdfd', '2013-12-08 13:44:27');

-- ----------------------------
-- Table structure for jiang_lhc_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_lhc_code`;
CREATE TABLE `jiang_lhc_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  `sx` varchar(100) DEFAULT NULL,
  `sb` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_lhc_code
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_lhc_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_lhc_time`;
CREATE TABLE `jiang_lhc_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` datetime NOT NULL,
  `opentime` datetime NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_lhc_time
-- ----------------------------
INSERT INTO `jiang_lhc_time` VALUES ('20', '00:00:01', '2015-10-21 21:28:00', '2015-10-21 21:30:00', '2015122');
INSERT INTO `jiang_lhc_time` VALUES ('21', '00:00:01', '2015-10-24 21:28:00', '2015-10-24 21:30:00', '2015123');
INSERT INTO `jiang_lhc_time` VALUES ('22', '00:00:01', '2015-10-27 21:28:00', '2015-10-27 21:30:00', '2015124');
INSERT INTO `jiang_lhc_time` VALUES ('23', '00:00:01', '2015-10-29 21:28:00', '2015-10-29 21:30:00', '2015125');
INSERT INTO `jiang_lhc_time` VALUES ('24', '00:00:01', '2015-10-31 21:28:00', '2015-10-31 21:30:00', '2015126');
INSERT INTO `jiang_lhc_time` VALUES ('25', '00:00:01', '2015-11-03 21:28:00', '2015-11-03 21:30:00', '2015127');
INSERT INTO `jiang_lhc_time` VALUES ('26', '00:00:01', '2015-11-05 21:28:00', '2015-11-05 21:30:00', '2015128');
INSERT INTO `jiang_lhc_time` VALUES ('27', '00:00:01', '2015-11-07 21:28:00', '2015-11-07 21:30:00', '2015129');
INSERT INTO `jiang_lhc_time` VALUES ('28', '00:00:01', '2015-11-10 21:28:00', '2015-11-10 21:30:00', '2015130');
INSERT INTO `jiang_lhc_time` VALUES ('29', '00:00:01', '2015-11-12 21:28:00', '2015-11-12 21:30:00', '2015131');
INSERT INTO `jiang_lhc_time` VALUES ('30', '00:00:01', '2015-11-15 21:28:00', '2015-11-15 21:30:00', '2015132');
INSERT INTO `jiang_lhc_time` VALUES ('31', '00:00:01', '2015-11-17 21:28:00', '2015-11-17 21:30:00', '2015133');
INSERT INTO `jiang_lhc_time` VALUES ('32', '00:00:01', '2015-11-19 21:28:00', '2015-11-19 21:30:00', '2015134');
INSERT INTO `jiang_lhc_time` VALUES ('33', '00:00:01', '2015-11-22 21:28:00', '2015-11-22 21:30:00', '2015135');
INSERT INTO `jiang_lhc_time` VALUES ('34', '00:00:01', '2015-11-24 21:28:00', '2015-11-24 21:30:00', '2015136');
INSERT INTO `jiang_lhc_time` VALUES ('35', '00:00:01', '2015-11-26 21:28:00', '2015-11-26 21:30:00', '2015137');

-- ----------------------------
-- Table structure for jiang_login
-- ----------------------------
DROP TABLE IF EXISTS `jiang_login`;
CREATE TABLE `jiang_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `logtime` datetime NOT NULL,
  `logip` varchar(50) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0',
  `logkey` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `usertype` (`usertype`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_login
-- ----------------------------
INSERT INTO `jiang_login` VALUES ('1', 'admin', '2017-04-05 23:23:31', '127.0.0.1', '0', '8zgi0o');
INSERT INTO `jiang_login` VALUES ('2', 'admin', '2017-04-05 23:24:19', '127.0.0.1', '0', 'u0ycna');
INSERT INTO `jiang_login` VALUES ('3', 'admin', '2017-04-05 23:24:34', '127.0.0.1', '0', 'e4xtk5');
INSERT INTO `jiang_login` VALUES ('4', 'admin', '2017-04-05 23:29:09', '127.0.0.1', '0', '287yxl');
INSERT INTO `jiang_login` VALUES ('5', 'admin', '2017-04-07 22:56:35', '127.0.0.1', '0', 'ac2xdf');
INSERT INTO `jiang_login` VALUES ('6', 'admin', '2017-04-09 16:32:42', '127.0.0.1', '0', 'nc59u8');
INSERT INTO `jiang_login` VALUES ('7', 'admin', '2017-04-09 21:54:46', '127.0.0.1', '0', 'poh0fg');

-- ----------------------------
-- Table structure for jiang_lottery
-- ----------------------------
DROP TABLE IF EXISTS `jiang_lottery`;
CREATE TABLE `jiang_lottery` (
  `lotteryid` int(11) NOT NULL,
  `lotteryname` varchar(20) NOT NULL,
  `timetable` varchar(20) NOT NULL,
  PRIMARY KEY (`lotteryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_lottery
-- ----------------------------
INSERT INTO `jiang_lottery` VALUES ('1', '重庆时时彩', 'SscTime');
INSERT INTO `jiang_lottery` VALUES ('2', '黑龙江时时彩', 'HscTime');
INSERT INTO `jiang_lottery` VALUES ('3', '新疆时时彩', 'XjcTime');
INSERT INTO `jiang_lottery` VALUES ('4', '江西时时彩', 'XscTime');
INSERT INTO `jiang_lottery` VALUES ('5', '时时乐', 'SslTime');
INSERT INTO `jiang_lottery` VALUES ('6', '十一运夺金', 'Sd115Time');
INSERT INTO `jiang_lottery` VALUES ('7', '多乐彩', 'Dl115Time');
INSERT INTO `jiang_lottery` VALUES ('8', '广东十一选五', 'Gd115Time');
INSERT INTO `jiang_lottery` VALUES ('9', '福彩3D', 'FucaiTime');
INSERT INTO `jiang_lottery` VALUES ('10', '排列三、五', 'PlsTime');
INSERT INTO `jiang_lottery` VALUES ('11', '重庆十一选五', 'Cq115Time');
INSERT INTO `jiang_lottery` VALUES ('13', '香港六合彩', 'LhcTime');

-- ----------------------------
-- Table structure for jiang_message
-- ----------------------------
DROP TABLE IF EXISTS `jiang_message`;
CREATE TABLE `jiang_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `lotteryid` int(11) DEFAULT NULL,
  `issue` varchar(50) DEFAULT NULL,
  `yinkui` double(15,3) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lotteryid` (`lotteryid`),
  KEY `issue` (`issue`),
  KEY `username` (`username`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_message
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_method
-- ----------------------------
DROP TABLE IF EXISTS `jiang_method`;
CREATE TABLE `jiang_method` (
  `lotteryid` int(11) NOT NULL,
  `methodid` int(11) NOT NULL,
  `methodname` varchar(50) NOT NULL,
  `prize` double NOT NULL,
  PRIMARY KEY (`methodid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_method
-- ----------------------------
INSERT INTO `jiang_method` VALUES ('1', '13', '龙虎斗', '3.6');
INSERT INTO `jiang_method` VALUES ('1', '14', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('1', '15', '前三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('1', '16', '后三直选', '1800');
INSERT INTO `jiang_method` VALUES ('1', '17', '后三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('1', '18', '前三组三', '583');
INSERT INTO `jiang_method` VALUES ('1', '19', '前三组六', '300');
INSERT INTO `jiang_method` VALUES ('1', '20', '前三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('1', '21', '前三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('1', '22', '后三组三', '583');
INSERT INTO `jiang_method` VALUES ('1', '23', '后三组六', '300');
INSERT INTO `jiang_method` VALUES ('1', '24', '后三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('1', '25', '后三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('1', '26', '后三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('1', '27', '后三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('1', '28', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('1', '29', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('1', '30', '前二组选', '88');
INSERT INTO `jiang_method` VALUES ('1', '31', '后二组选', '88');
INSERT INTO `jiang_method` VALUES ('1', '32', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('1', '37', '前二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('1', '38', '后二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('1', '39', '前三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('1', '40', '前三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('2', '52', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('2', '53', '前三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('2', '54', '后三直选', '1800');
INSERT INTO `jiang_method` VALUES ('2', '55', '后三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('2', '56', '前三组三', '583');
INSERT INTO `jiang_method` VALUES ('2', '57', '前三组六', '300');
INSERT INTO `jiang_method` VALUES ('2', '58', '前三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('2', '59', '前三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('2', '60', '后三组三', '583');
INSERT INTO `jiang_method` VALUES ('2', '61', '后三组六', '300');
INSERT INTO `jiang_method` VALUES ('2', '62', '后三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('2', '63', '后三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('2', '64', '后三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('2', '65', '后三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('2', '66', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('2', '67', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('2', '68', '前二组选', '88');
INSERT INTO `jiang_method` VALUES ('2', '69', '后二组选', '88');
INSERT INTO `jiang_method` VALUES ('2', '70', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('2', '75', '前二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('2', '76', '后二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('3', '90', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('3', '91', '前三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('3', '92', '后三直选', '1800');
INSERT INTO `jiang_method` VALUES ('3', '93', '后三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('3', '94', '前三组三', '583');
INSERT INTO `jiang_method` VALUES ('3', '95', '前三组六', '300');
INSERT INTO `jiang_method` VALUES ('3', '96', '前三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('3', '97', '前三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('3', '98', '后三组三', '583');
INSERT INTO `jiang_method` VALUES ('3', '99', '后三组六', '300');
INSERT INTO `jiang_method` VALUES ('3', '100', '后三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('3', '101', '后三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('3', '102', '后三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('3', '103', '后三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('3', '104', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('3', '105', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('3', '106', '前二组选', '88');
INSERT INTO `jiang_method` VALUES ('3', '107', '后二组选', '88');
INSERT INTO `jiang_method` VALUES ('3', '108', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('3', '113', '前二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('3', '114', '后二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('3', '115', '前三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('3', '116', '前三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('4', '128', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('4', '129', '前三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('4', '130', '后三直选', '1800');
INSERT INTO `jiang_method` VALUES ('4', '131', '后三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('4', '132', '前三组三', '583');
INSERT INTO `jiang_method` VALUES ('4', '133', '前三组六', '300');
INSERT INTO `jiang_method` VALUES ('4', '134', '前三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('4', '135', '前三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('4', '136', '后三组三', '583');
INSERT INTO `jiang_method` VALUES ('4', '137', '后三组六', '300');
INSERT INTO `jiang_method` VALUES ('4', '138', '后三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('4', '139', '后三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('4', '140', '后三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('4', '141', '后三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('4', '142', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('4', '143', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('4', '144', '前二组选', '88');
INSERT INTO `jiang_method` VALUES ('4', '145', '后二组选', '88');
INSERT INTO `jiang_method` VALUES ('4', '146', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('4', '151', '前二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('4', '152', '后二大小单双', '6.72');
INSERT INTO `jiang_method` VALUES ('4', '153', '前三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('4', '154', '前三二码不定位', '31');
INSERT INTO `jiang_method` VALUES ('5', '164', '直选', '1800');
INSERT INTO `jiang_method` VALUES ('5', '165', '直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('5', '166', '组三', '600');
INSERT INTO `jiang_method` VALUES ('5', '167', '组六', '300');
INSERT INTO `jiang_method` VALUES ('5', '168', '混合组选', '600');
INSERT INTO `jiang_method` VALUES ('5', '169', '组选和值', '600');
INSERT INTO `jiang_method` VALUES ('5', '170', '一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('5', '171', '二码不定位', '33');
INSERT INTO `jiang_method` VALUES ('5', '172', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('5', '173', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('5', '174', '前二组选', '90');
INSERT INTO `jiang_method` VALUES ('5', '175', '后二组选', '90');
INSERT INTO `jiang_method` VALUES ('5', '176', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('5', '179', '前二大小单双', '7.2');
INSERT INTO `jiang_method` VALUES ('5', '180', '后二大小单双', '7.2');
INSERT INTO `jiang_method` VALUES ('6', '197', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('6', '198', '前三组选', '295.24');
INSERT INTO `jiang_method` VALUES ('6', '199', '前二直选', '198');
INSERT INTO `jiang_method` VALUES ('6', '200', '前二组选', '99');
INSERT INTO `jiang_method` VALUES ('6', '201', '前三不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('6', '202', '定位胆', '19.8');
INSERT INTO `jiang_method` VALUES ('6', '205', '定单双', '831');
INSERT INTO `jiang_method` VALUES ('6', '206', '猜中位', '32');
INSERT INTO `jiang_method` VALUES ('6', '207', '任选一中一', '3.9');
INSERT INTO `jiang_method` VALUES ('6', '208', '任选二中二', '9.9');
INSERT INTO `jiang_method` VALUES ('6', '209', '任选三中三', '29.7');
INSERT INTO `jiang_method` VALUES ('6', '210', '任选四中四', '118');
INSERT INTO `jiang_method` VALUES ('6', '211', '任选五中五', '831');
INSERT INTO `jiang_method` VALUES ('6', '212', '任选六中五', '138');
INSERT INTO `jiang_method` VALUES ('6', '213', '任选七中五', '39.6');
INSERT INTO `jiang_method` VALUES ('6', '214', '任选八中五', '14.8');
INSERT INTO `jiang_method` VALUES ('7', '231', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('7', '232', '前三组选', '295.24');
INSERT INTO `jiang_method` VALUES ('7', '233', '前二直选', '198');
INSERT INTO `jiang_method` VALUES ('7', '234', '前二组选', '99');
INSERT INTO `jiang_method` VALUES ('7', '235', '前三不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('7', '236', '定位胆', '19.8');
INSERT INTO `jiang_method` VALUES ('7', '239', '定单双', '831');
INSERT INTO `jiang_method` VALUES ('7', '240', '猜中位', '32');
INSERT INTO `jiang_method` VALUES ('7', '241', '任选一中一', '3.9');
INSERT INTO `jiang_method` VALUES ('7', '242', '任选二中二', '9.9');
INSERT INTO `jiang_method` VALUES ('7', '243', '任选三中三', '29.7');
INSERT INTO `jiang_method` VALUES ('7', '244', '任选四中四', '118');
INSERT INTO `jiang_method` VALUES ('7', '245', '任选五中五', '831');
INSERT INTO `jiang_method` VALUES ('7', '246', '任选六中五', '138');
INSERT INTO `jiang_method` VALUES ('7', '247', '任选七中五', '39.6');
INSERT INTO `jiang_method` VALUES ('7', '248', '任选八中五', '14.8');
INSERT INTO `jiang_method` VALUES ('8', '265', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('8', '266', '前三组选', '295.24');
INSERT INTO `jiang_method` VALUES ('8', '267', '前二直选', '198');
INSERT INTO `jiang_method` VALUES ('8', '268', '前二组选', '99');
INSERT INTO `jiang_method` VALUES ('8', '269', '前三不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('8', '270', '定位胆', '19.8');
INSERT INTO `jiang_method` VALUES ('8', '273', '定单双', '831');
INSERT INTO `jiang_method` VALUES ('8', '274', '猜中位', '32');
INSERT INTO `jiang_method` VALUES ('8', '275', '任选一中一', '3.9');
INSERT INTO `jiang_method` VALUES ('8', '276', '任选二中二', '9.9');
INSERT INTO `jiang_method` VALUES ('8', '277', '任选三中三', '29.7');
INSERT INTO `jiang_method` VALUES ('8', '278', '任选四中四', '118');
INSERT INTO `jiang_method` VALUES ('8', '279', '任选五中五', '831');
INSERT INTO `jiang_method` VALUES ('8', '280', '任选六中五', '138');
INSERT INTO `jiang_method` VALUES ('8', '281', '任选七中五', '39.6');
INSERT INTO `jiang_method` VALUES ('8', '282', '任选八中五', '14.8');
INSERT INTO `jiang_method` VALUES ('9', '294', '直选', '1800');
INSERT INTO `jiang_method` VALUES ('9', '295', '直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('9', '296', '组三', '585');
INSERT INTO `jiang_method` VALUES ('9', '297', '组六', '300');
INSERT INTO `jiang_method` VALUES ('9', '298', '混合组选', '615');
INSERT INTO `jiang_method` VALUES ('9', '299', '组选和值', '315');
INSERT INTO `jiang_method` VALUES ('9', '300', '一码不定位', '6.6');
INSERT INTO `jiang_method` VALUES ('9', '301', '二码不定位', '28');
INSERT INTO `jiang_method` VALUES ('9', '302', '前二直选', '180');
INSERT INTO `jiang_method` VALUES ('9', '303', '后二直选', '180');
INSERT INTO `jiang_method` VALUES ('9', '304', '前二组选', '70');
INSERT INTO `jiang_method` VALUES ('9', '305', '后二组选', '70');
INSERT INTO `jiang_method` VALUES ('9', '306', '定位胆', '18');
INSERT INTO `jiang_method` VALUES ('9', '309', '前二大小单双', '6.6');
INSERT INTO `jiang_method` VALUES ('9', '310', '后二大小单双', '6.6');
INSERT INTO `jiang_method` VALUES ('10', '322', '排三直选', '1800');
INSERT INTO `jiang_method` VALUES ('10', '323', '排三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('10', '324', '排三组三', '600');
INSERT INTO `jiang_method` VALUES ('10', '325', '排三组六', '300');
INSERT INTO `jiang_method` VALUES ('10', '326', '排三混合组选', '600');
INSERT INTO `jiang_method` VALUES ('10', '327', '排三组选和值', '600');
INSERT INTO `jiang_method` VALUES ('10', '328', '排三一码不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('10', '329', '排三二码不定位', '33');
INSERT INTO `jiang_method` VALUES ('10', '330', '排五前二直选', '180');
INSERT INTO `jiang_method` VALUES ('10', '331', '排五后二直选', '180');
INSERT INTO `jiang_method` VALUES ('10', '332', '排五前二组选', '85');
INSERT INTO `jiang_method` VALUES ('10', '333', '排五后二组选', '85');
INSERT INTO `jiang_method` VALUES ('10', '334', '排五定位胆', '18');
INSERT INTO `jiang_method` VALUES ('10', '339', '排五前二大小单双', '6.8');
INSERT INTO `jiang_method` VALUES ('10', '340', '排五后二大小单双', '6.8');
INSERT INTO `jiang_method` VALUES ('11', '358', '前三直选', '1800');
INSERT INTO `jiang_method` VALUES ('11', '359', '前三组选', '295.24');
INSERT INTO `jiang_method` VALUES ('11', '360', '前二直选', '198');
INSERT INTO `jiang_method` VALUES ('11', '361', '前二组选', '99');
INSERT INTO `jiang_method` VALUES ('11', '362', '前三不定位', '6.8');
INSERT INTO `jiang_method` VALUES ('11', '363', '定位胆', '19.8');
INSERT INTO `jiang_method` VALUES ('11', '366', '定单双', '831');
INSERT INTO `jiang_method` VALUES ('11', '367', '猜中位', '32');
INSERT INTO `jiang_method` VALUES ('11', '368', '任选一中一', '3.9');
INSERT INTO `jiang_method` VALUES ('11', '369', '任选二中二', '9.9');
INSERT INTO `jiang_method` VALUES ('11', '370', '任选三中三', '29.7');
INSERT INTO `jiang_method` VALUES ('11', '371', '任选四中四', '118');
INSERT INTO `jiang_method` VALUES ('11', '372', '任选五中五', '831');
INSERT INTO `jiang_method` VALUES ('11', '373', '任选六中五', '138');
INSERT INTO `jiang_method` VALUES ('11', '374', '任选七中五', '39.6');
INSERT INTO `jiang_method` VALUES ('11', '375', '任选八中五', '14.8');
INSERT INTO `jiang_method` VALUES ('1', '400', '五星直选', '180000');
INSERT INTO `jiang_method` VALUES ('1', '401', '前四直选', '18000');
INSERT INTO `jiang_method` VALUES ('1', '402', '后四直选', '18000');
INSERT INTO `jiang_method` VALUES ('1', '403', '中三直选', '1800');
INSERT INTO `jiang_method` VALUES ('1', '404', '中三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('1', '405', '中三组三', '583');
INSERT INTO `jiang_method` VALUES ('1', '406', '中三组六', '300');
INSERT INTO `jiang_method` VALUES ('1', '407', '中三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('1', '408', '中三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('1', '410', '任选三', '1800');
INSERT INTO `jiang_method` VALUES ('1', '411', '任选二', '180');
INSERT INTO `jiang_method` VALUES ('3', '440', '五星直选', '180000');
INSERT INTO `jiang_method` VALUES ('3', '441', '前四直选', '18000');
INSERT INTO `jiang_method` VALUES ('3', '442', '后四直选', '18000');
INSERT INTO `jiang_method` VALUES ('3', '443', '中三直选', '1800');
INSERT INTO `jiang_method` VALUES ('3', '444', '中三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('3', '445', '中三组三', '583');
INSERT INTO `jiang_method` VALUES ('3', '446', '中三组六', '300');
INSERT INTO `jiang_method` VALUES ('3', '447', '中三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('3', '448', '中三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('3', '450', '任选三', '1800');
INSERT INTO `jiang_method` VALUES ('3', '451', '任选二', '180');
INSERT INTO `jiang_method` VALUES ('4', '460', '五星直选', '180000');
INSERT INTO `jiang_method` VALUES ('4', '461', '前四直选', '18000');
INSERT INTO `jiang_method` VALUES ('4', '462', '后四直选', '18000');
INSERT INTO `jiang_method` VALUES ('4', '463', '中三直选', '1800');
INSERT INTO `jiang_method` VALUES ('4', '464', '中三直选和值', '1800');
INSERT INTO `jiang_method` VALUES ('4', '465', '中三组三', '583');
INSERT INTO `jiang_method` VALUES ('4', '466', '中三组六', '300');
INSERT INTO `jiang_method` VALUES ('4', '467', '中三混合组选', '583');
INSERT INTO `jiang_method` VALUES ('4', '468', '中三组选和值', '583');
INSERT INTO `jiang_method` VALUES ('4', '470', '任选三', '1800');
INSERT INTO `jiang_method` VALUES ('4', '471', '任选二', '180');
INSERT INTO `jiang_method` VALUES ('13', '500', '特码', '84');
INSERT INTO `jiang_method` VALUES ('13', '501', '色波', '84');
INSERT INTO `jiang_method` VALUES ('13', '502', '生肖', '84');
INSERT INTO `jiang_method` VALUES ('6', '20501', '5单0双', '145');
INSERT INTO `jiang_method` VALUES ('6', '20502', '4单1双', '12');
INSERT INTO `jiang_method` VALUES ('6', '20503', '3单2双', '4.3');
INSERT INTO `jiang_method` VALUES ('6', '20504', '2单3双', '6');
INSERT INTO `jiang_method` VALUES ('6', '20505', '1单4双', '29');
INSERT INTO `jiang_method` VALUES ('6', '20506', '0单5双', '860');
INSERT INTO `jiang_method` VALUES ('6', '20601', '猜中位03,09', '29.7');
INSERT INTO `jiang_method` VALUES ('6', '20602', '猜中位04,08', '15.2');
INSERT INTO `jiang_method` VALUES ('6', '20603', '猜中位05,07', '9.2');
INSERT INTO `jiang_method` VALUES ('6', '20604', '猜中位06', '8.6');
INSERT INTO `jiang_method` VALUES ('7', '23901', '5单0双', '145');
INSERT INTO `jiang_method` VALUES ('7', '23902', '4单1双', '12');
INSERT INTO `jiang_method` VALUES ('7', '23903', '3单2双', '4.3');
INSERT INTO `jiang_method` VALUES ('7', '23904', '2单3双', '6');
INSERT INTO `jiang_method` VALUES ('7', '23905', '1单4双', '29');
INSERT INTO `jiang_method` VALUES ('7', '23906', '0单5双', '860');
INSERT INTO `jiang_method` VALUES ('7', '24001', '猜中位03,09', '29.7');
INSERT INTO `jiang_method` VALUES ('7', '24002', '猜中位04,08', '15.2');
INSERT INTO `jiang_method` VALUES ('7', '24003', '猜中位05,07', '9.2');
INSERT INTO `jiang_method` VALUES ('7', '24004', '猜中位06', '8.6');
INSERT INTO `jiang_method` VALUES ('8', '27301', '5单0双', '145');
INSERT INTO `jiang_method` VALUES ('8', '27302', '4单1双', '12');
INSERT INTO `jiang_method` VALUES ('8', '27303', '3单2双', '4.3');
INSERT INTO `jiang_method` VALUES ('8', '27304', '2单3双', '6');
INSERT INTO `jiang_method` VALUES ('8', '27305', '1单4双', '29');
INSERT INTO `jiang_method` VALUES ('8', '27306', '0单5双', '860');
INSERT INTO `jiang_method` VALUES ('8', '27401', '猜中位03,09', '29.7');
INSERT INTO `jiang_method` VALUES ('8', '27402', '猜中位04,08', '15.2');
INSERT INTO `jiang_method` VALUES ('8', '27403', '猜中位05,07', '9.2');
INSERT INTO `jiang_method` VALUES ('8', '27404', '猜中位06', '8.6');
INSERT INTO `jiang_method` VALUES ('11', '36601', '5单0双', '145');
INSERT INTO `jiang_method` VALUES ('11', '36602', '4单1双', '12');
INSERT INTO `jiang_method` VALUES ('11', '36603', '3单2双', '4.3');
INSERT INTO `jiang_method` VALUES ('11', '36604', '2单3双', '6');
INSERT INTO `jiang_method` VALUES ('11', '36605', '1单4双', '29');
INSERT INTO `jiang_method` VALUES ('11', '36606', '0单5双', '860');
INSERT INTO `jiang_method` VALUES ('11', '36701', '猜中位03,09', '29.7');
INSERT INTO `jiang_method` VALUES ('11', '36702', '猜中位04,08', '15.2');
INSERT INTO `jiang_method` VALUES ('11', '36703', '猜中位05,07', '9.2');
INSERT INTO `jiang_method` VALUES ('11', '36704', '猜中位06', '8.6');

-- ----------------------------
-- Table structure for jiang_my18
-- ----------------------------
DROP TABLE IF EXISTS `jiang_my18`;
CREATE TABLE `jiang_my18` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `money` double(15,3) DEFAULT NULL,
  `ordernum` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `state` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `state` (`state`)
) ENGINE=MyISAM DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of jiang_my18
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_order
-- ----------------------------
DROP TABLE IF EXISTS `jiang_order`;
CREATE TABLE `jiang_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(30) NOT NULL COMMENT '期号',
  `lotteryid` int(11) NOT NULL,
  `methodid` int(11) NOT NULL,
  `projectno` varchar(20) DEFAULT NULL,
  `tracenum` varchar(20) NOT NULL,
  `ordernum` varchar(50) NOT NULL COMMENT '订单编号',
  `money` double NOT NULL DEFAULT '0',
  `username` varchar(50) NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `codes` text NOT NULL,
  `beishu` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `step` int(11) NOT NULL COMMENT '滑动条步进数',
  `traceif` int(11) NOT NULL DEFAULT '0',
  `tracestop` int(11) NOT NULL DEFAULT '1',
  `state` int(1) NOT NULL DEFAULT '0',
  `info` varchar(100) DEFAULT NULL,
  `prize` double NOT NULL COMMENT '奖金',
  `point` double NOT NULL COMMENT '返点',
  `zjprize` double DEFAULT '0',
  `kjcode` varchar(60) DEFAULT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue` (`issue`),
  KEY `addtime` (`addtime`),
  KEY `state` (`state`),
  KEY `username` (`username`),
  KEY `tracenum` (`tracenum`),
  KEY `projectno` (`projectno`)
) ENGINE=MyISAM AUTO_INCREMENT=8974018 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_order
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_orderinfo
-- ----------------------------
DROP TABLE IF EXISTS `jiang_orderinfo`;
CREATE TABLE `jiang_orderinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) CHARACTER SET ucs2 DEFAULT NULL,
  `ip` varchar(500) CHARACTER SET ucs2 DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `ordernum` varchar(500) CHARACTER SET ucs2 DEFAULT NULL,
  `lotteryid` int(11) DEFAULT NULL,
  `methodid` int(11) DEFAULT NULL,
  `issue` varchar(500) CHARACTER SET ucs2 DEFAULT NULL,
  `code` text CHARACTER SET ucs2,
  `money` double DEFAULT NULL,
  `bgname` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_orderinfo
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_orderzhidi
-- ----------------------------
DROP TABLE IF EXISTS `jiang_orderzhidi`;
CREATE TABLE `jiang_orderzhidi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statenum` int(11) NOT NULL,
  `statetype` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_orderzhidi
-- ----------------------------
INSERT INTO `jiang_orderzhidi` VALUES ('10', '0', '未开奖');
INSERT INTO `jiang_orderzhidi` VALUES ('11', '1', '已中奖');
INSERT INTO `jiang_orderzhidi` VALUES ('12', '2', '未中奖');
INSERT INTO `jiang_orderzhidi` VALUES ('13', '3', '已撤单');
INSERT INTO `jiang_orderzhidi` VALUES ('14', '4', '本人撤单');
INSERT INTO `jiang_orderzhidi` VALUES ('15', '5', '管理员撤单');
INSERT INTO `jiang_orderzhidi` VALUES ('16', '6', '开错奖撤单');
INSERT INTO `jiang_orderzhidi` VALUES ('17', '7', '系统撤单');

-- ----------------------------
-- Table structure for jiang_pls_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_pls_code`;
CREATE TABLE `jiang_pls_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1331 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_pls_code
-- ----------------------------
INSERT INTO `jiang_pls_code` VALUES ('1325', '16044', '0,1,2,8,6', '2016-02-20 20:38:09');
INSERT INTO `jiang_pls_code` VALUES ('1326', '16045', '6,1,2,6,0', '2016-02-21 20:45:46');
INSERT INTO `jiang_pls_code` VALUES ('1327', '16046', '1,2,6,2,1', '2016-02-22 20:42:01');
INSERT INTO `jiang_pls_code` VALUES ('1328', '16079', '3,9,0,0,8', '2016-03-27 20:30:57');
INSERT INTO `jiang_pls_code` VALUES ('1329', '16080', '6,7,0,2,0', '2016-03-27 20:38:27');
INSERT INTO `jiang_pls_code` VALUES ('1330', '16216', '3,9,8,0,3', '2016-08-11 15:53:23');

-- ----------------------------
-- Table structure for jiang_pls_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_pls_time`;
CREATE TABLE `jiang_pls_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_pls_time
-- ----------------------------
INSERT INTO `jiang_pls_time` VALUES ('1', '00:00:00', '20:00:00', '20:20:00', '1');

-- ----------------------------
-- Table structure for jiang_sd115_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_sd115_code`;
CREATE TABLE `jiang_sd115_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_sd115_code
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_sd115_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_sd115_time`;
CREATE TABLE `jiang_sd115_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=156 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_sd115_time
-- ----------------------------
INSERT INTO `jiang_sd115_time` VALUES ('1', '00:00:00', '09:03:00', '09:05:00', '1');
INSERT INTO `jiang_sd115_time` VALUES ('79', '09:03:00', '09:13:00', '09:15:00', '2');
INSERT INTO `jiang_sd115_time` VALUES ('80', '09:13:00', '09:23:00', '09:25:00', '3');
INSERT INTO `jiang_sd115_time` VALUES ('81', '09:23:00', '09:33:00', '09:35:00', '4');
INSERT INTO `jiang_sd115_time` VALUES ('82', '09:33:00', '09:43:00', '09:45:00', '5');
INSERT INTO `jiang_sd115_time` VALUES ('83', '09:43:00', '09:53:00', '09:55:00', '6');
INSERT INTO `jiang_sd115_time` VALUES ('84', '09:53:00', '10:03:00', '10:05:00', '7');
INSERT INTO `jiang_sd115_time` VALUES ('85', '10:03:00', '10:13:00', '10:15:00', '8');
INSERT INTO `jiang_sd115_time` VALUES ('86', '10:13:00', '10:23:00', '10:25:00', '9');
INSERT INTO `jiang_sd115_time` VALUES ('87', '10:23:00', '10:33:00', '10:35:00', '10');
INSERT INTO `jiang_sd115_time` VALUES ('88', '10:33:00', '10:43:00', '10:45:00', '11');
INSERT INTO `jiang_sd115_time` VALUES ('89', '10:43:00', '10:53:00', '10:55:00', '12');
INSERT INTO `jiang_sd115_time` VALUES ('90', '10:53:00', '11:03:00', '11:05:00', '13');
INSERT INTO `jiang_sd115_time` VALUES ('91', '11:03:00', '11:13:00', '11:15:00', '14');
INSERT INTO `jiang_sd115_time` VALUES ('92', '11:13:00', '11:23:00', '11:25:00', '15');
INSERT INTO `jiang_sd115_time` VALUES ('93', '11:23:00', '11:33:00', '11:35:00', '16');
INSERT INTO `jiang_sd115_time` VALUES ('94', '11:33:00', '11:43:00', '11:45:00', '17');
INSERT INTO `jiang_sd115_time` VALUES ('95', '11:43:00', '11:53:00', '11:55:00', '18');
INSERT INTO `jiang_sd115_time` VALUES ('96', '11:53:00', '12:03:00', '12:05:00', '19');
INSERT INTO `jiang_sd115_time` VALUES ('97', '12:03:00', '12:13:00', '12:15:00', '20');
INSERT INTO `jiang_sd115_time` VALUES ('98', '12:13:00', '12:23:00', '12:25:00', '21');
INSERT INTO `jiang_sd115_time` VALUES ('99', '12:23:00', '12:33:00', '12:35:00', '22');
INSERT INTO `jiang_sd115_time` VALUES ('100', '12:33:00', '12:43:00', '12:45:00', '23');
INSERT INTO `jiang_sd115_time` VALUES ('101', '12:43:00', '12:53:00', '12:55:00', '24');
INSERT INTO `jiang_sd115_time` VALUES ('102', '12:53:00', '13:03:00', '13:05:00', '25');
INSERT INTO `jiang_sd115_time` VALUES ('103', '13:03:00', '13:13:00', '13:15:00', '26');
INSERT INTO `jiang_sd115_time` VALUES ('104', '13:13:00', '13:23:00', '13:25:00', '27');
INSERT INTO `jiang_sd115_time` VALUES ('105', '13:23:00', '13:33:00', '13:35:00', '28');
INSERT INTO `jiang_sd115_time` VALUES ('106', '13:33:00', '13:43:00', '13:45:00', '29');
INSERT INTO `jiang_sd115_time` VALUES ('107', '13:43:00', '13:53:00', '13:55:00', '30');
INSERT INTO `jiang_sd115_time` VALUES ('108', '13:53:00', '14:03:00', '14:05:00', '31');
INSERT INTO `jiang_sd115_time` VALUES ('109', '14:03:00', '14:13:00', '14:15:00', '32');
INSERT INTO `jiang_sd115_time` VALUES ('110', '14:13:00', '14:23:00', '14:25:00', '33');
INSERT INTO `jiang_sd115_time` VALUES ('111', '14:23:00', '14:33:00', '14:35:00', '34');
INSERT INTO `jiang_sd115_time` VALUES ('112', '14:33:00', '14:43:00', '14:45:00', '35');
INSERT INTO `jiang_sd115_time` VALUES ('113', '14:43:00', '14:53:00', '14:55:00', '36');
INSERT INTO `jiang_sd115_time` VALUES ('114', '14:53:00', '15:03:00', '15:05:00', '37');
INSERT INTO `jiang_sd115_time` VALUES ('115', '15:03:00', '15:13:00', '15:15:00', '38');
INSERT INTO `jiang_sd115_time` VALUES ('116', '15:13:00', '15:23:00', '15:25:00', '39');
INSERT INTO `jiang_sd115_time` VALUES ('117', '15:23:00', '15:33:00', '15:35:00', '40');
INSERT INTO `jiang_sd115_time` VALUES ('118', '15:33:00', '15:43:00', '15:45:00', '41');
INSERT INTO `jiang_sd115_time` VALUES ('119', '15:43:00', '15:53:00', '15:55:00', '42');
INSERT INTO `jiang_sd115_time` VALUES ('120', '15:53:00', '16:03:00', '16:05:00', '43');
INSERT INTO `jiang_sd115_time` VALUES ('121', '16:03:00', '16:13:00', '16:15:00', '44');
INSERT INTO `jiang_sd115_time` VALUES ('122', '16:13:00', '16:23:00', '16:25:00', '45');
INSERT INTO `jiang_sd115_time` VALUES ('123', '16:23:00', '16:33:00', '16:35:00', '46');
INSERT INTO `jiang_sd115_time` VALUES ('124', '16:33:00', '16:43:00', '16:45:00', '47');
INSERT INTO `jiang_sd115_time` VALUES ('125', '16:43:00', '16:53:00', '16:55:00', '48');
INSERT INTO `jiang_sd115_time` VALUES ('126', '16:53:00', '17:03:00', '17:05:00', '49');
INSERT INTO `jiang_sd115_time` VALUES ('127', '17:03:00', '17:13:00', '17:15:00', '50');
INSERT INTO `jiang_sd115_time` VALUES ('128', '17:13:00', '17:23:00', '17:25:00', '51');
INSERT INTO `jiang_sd115_time` VALUES ('129', '17:23:00', '17:33:00', '17:35:00', '52');
INSERT INTO `jiang_sd115_time` VALUES ('130', '17:33:00', '17:43:00', '17:45:00', '53');
INSERT INTO `jiang_sd115_time` VALUES ('131', '17:43:00', '17:53:00', '17:55:00', '54');
INSERT INTO `jiang_sd115_time` VALUES ('132', '17:53:00', '18:03:00', '18:05:00', '55');
INSERT INTO `jiang_sd115_time` VALUES ('133', '18:03:00', '18:13:00', '18:15:00', '56');
INSERT INTO `jiang_sd115_time` VALUES ('134', '18:13:00', '18:23:00', '18:25:00', '57');
INSERT INTO `jiang_sd115_time` VALUES ('135', '18:23:00', '18:33:00', '18:35:00', '58');
INSERT INTO `jiang_sd115_time` VALUES ('136', '18:33:00', '18:43:00', '18:45:00', '59');
INSERT INTO `jiang_sd115_time` VALUES ('137', '18:43:00', '18:53:00', '18:55:00', '60');
INSERT INTO `jiang_sd115_time` VALUES ('138', '18:53:00', '19:03:00', '19:05:00', '61');
INSERT INTO `jiang_sd115_time` VALUES ('139', '19:03:00', '19:13:00', '19:15:00', '62');
INSERT INTO `jiang_sd115_time` VALUES ('140', '19:13:00', '19:23:00', '19:25:00', '63');
INSERT INTO `jiang_sd115_time` VALUES ('141', '19:23:00', '19:33:00', '19:35:00', '64');
INSERT INTO `jiang_sd115_time` VALUES ('142', '19:33:00', '19:43:00', '19:45:00', '65');
INSERT INTO `jiang_sd115_time` VALUES ('143', '19:43:00', '19:53:00', '19:55:00', '66');
INSERT INTO `jiang_sd115_time` VALUES ('144', '19:53:00', '20:03:00', '20:05:00', '67');
INSERT INTO `jiang_sd115_time` VALUES ('145', '20:03:00', '20:13:00', '20:15:00', '68');
INSERT INTO `jiang_sd115_time` VALUES ('146', '20:13:00', '20:23:00', '20:25:00', '69');
INSERT INTO `jiang_sd115_time` VALUES ('147', '20:23:00', '20:33:00', '20:35:00', '70');
INSERT INTO `jiang_sd115_time` VALUES ('148', '20:33:00', '20:43:00', '20:45:00', '71');
INSERT INTO `jiang_sd115_time` VALUES ('149', '20:43:00', '20:53:00', '20:55:00', '72');
INSERT INTO `jiang_sd115_time` VALUES ('150', '20:53:00', '21:03:00', '21:05:00', '73');
INSERT INTO `jiang_sd115_time` VALUES ('151', '21:03:00', '21:13:00', '21:15:00', '74');
INSERT INTO `jiang_sd115_time` VALUES ('152', '21:13:00', '21:23:00', '21:25:00', '75');
INSERT INTO `jiang_sd115_time` VALUES ('153', '21:23:00', '21:33:00', '21:35:00', '76');
INSERT INTO `jiang_sd115_time` VALUES ('154', '21:33:00', '21:43:00', '21:45:00', '77');
INSERT INTO `jiang_sd115_time` VALUES ('155', '21:43:00', '21:53:00', '21:55:00', '78');

-- ----------------------------
-- Table structure for jiang_ssc_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_ssc_code`;
CREATE TABLE `jiang_ssc_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `issue` (`issue`)
) ENGINE=MyISAM AUTO_INCREMENT=154996 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_ssc_code
-- ----------------------------
INSERT INTO `jiang_ssc_code` VALUES ('154995', '160223023', '2,3,4,6,5', '2016-02-23 01:55:51');
INSERT INTO `jiang_ssc_code` VALUES ('154994', '160223022', '1,0,9,2,2', '2016-02-23 01:51:02');
INSERT INTO `jiang_ssc_code` VALUES ('154993', '160223021', '3,3,4,5,5', '2016-02-23 01:46:12');
INSERT INTO `jiang_ssc_code` VALUES ('154992', '160223020', '0,9,3,6,3', '2016-02-23 01:40:53');
INSERT INTO `jiang_ssc_code` VALUES ('154991', '160223019', '3,7,3,9,8', '2016-02-23 01:35:52');
INSERT INTO `jiang_ssc_code` VALUES ('154990', '160223018', '2,0,0,7,9', '2016-02-23 01:31:05');
INSERT INTO `jiang_ssc_code` VALUES ('154989', '160223017', '0,8,4,2,6', '2016-02-23 01:26:01');
INSERT INTO `jiang_ssc_code` VALUES ('154988', '160223016', '9,5,5,8,1', '2016-02-23 01:20:57');
INSERT INTO `jiang_ssc_code` VALUES ('154987', '160223015', '1,6,9,9,5', '2016-02-23 01:15:57');
INSERT INTO `jiang_ssc_code` VALUES ('154986', '160223014', '7,8,3,8,2', '2016-02-23 01:10:52');
INSERT INTO `jiang_ssc_code` VALUES ('154985', '160223013', '5,6,6,8,6', '2016-02-23 01:05:58');
INSERT INTO `jiang_ssc_code` VALUES ('154984', '160223012', '5,6,9,0,6', '2016-02-23 01:00:59');
INSERT INTO `jiang_ssc_code` VALUES ('154983', '160223011', '5,7,1,8,3', '2016-02-23 00:55:55');
INSERT INTO `jiang_ssc_code` VALUES ('154982', '160223010', '0,0,2,5,5', '2016-02-23 00:51:01');
INSERT INTO `jiang_ssc_code` VALUES ('154981', '160223009', '1,9,6,5,0', '2016-02-23 00:45:59');
INSERT INTO `jiang_ssc_code` VALUES ('154980', '160223008', '0,9,7,0,0', '2016-02-23 00:41:08');
INSERT INTO `jiang_ssc_code` VALUES ('154979', '160223007', '1,5,1,1,8', '2016-02-23 00:35:54');
INSERT INTO `jiang_ssc_code` VALUES ('154978', '160223006', '4,9,1,3,3', '2016-02-23 00:30:54');
INSERT INTO `jiang_ssc_code` VALUES ('154977', '160223005', '9,7,9,1,9', '2016-02-23 00:26:01');
INSERT INTO `jiang_ssc_code` VALUES ('154976', '160223004', '3,5,2,1,6', '2016-02-23 00:20:52');
INSERT INTO `jiang_ssc_code` VALUES ('154975', '160223003', '8,6,6,9,8', '2016-02-23 00:15:59');
INSERT INTO `jiang_ssc_code` VALUES ('154974', '160223002', '6,4,0,2,4', '2016-02-23 00:10:50');
INSERT INTO `jiang_ssc_code` VALUES ('154973', '160223001', '1,6,1,9,2', '2016-02-23 00:05:56');
INSERT INTO `jiang_ssc_code` VALUES ('154972', '160222120', '5,9,9,9,2', '2016-02-23 00:01:07');
INSERT INTO `jiang_ssc_code` VALUES ('154971', '160222119', '7,2,3,8,0', '2016-02-22 23:55:51');
INSERT INTO `jiang_ssc_code` VALUES ('154970', '160222118', '1,6,3,0,0', '2016-02-22 23:50:54');
INSERT INTO `jiang_ssc_code` VALUES ('154969', '160222117', '2,6,2,6,3', '2016-02-22 23:45:58');
INSERT INTO `jiang_ssc_code` VALUES ('154968', '160222116', '9,9,2,9,9', '2016-02-22 23:41:04');
INSERT INTO `jiang_ssc_code` VALUES ('154967', '160222115', '7,5,6,2,1', '2016-02-22 23:35:55');
INSERT INTO `jiang_ssc_code` VALUES ('154966', '160222114', '2,0,5,9,4', '2016-02-22 23:30:55');
INSERT INTO `jiang_ssc_code` VALUES ('154965', '160222113', '4,6,0,8,1', '2016-02-22 23:26:02');
INSERT INTO `jiang_ssc_code` VALUES ('154964', '160222112', '4,6,8,3,2', '2016-02-22 23:21:06');
INSERT INTO `jiang_ssc_code` VALUES ('154963', '160222111', '6,1,3,1,6', '2016-02-22 23:15:59');
INSERT INTO `jiang_ssc_code` VALUES ('154962', '160222110', '2,4,7,7,6', '2016-02-22 23:10:55');
INSERT INTO `jiang_ssc_code` VALUES ('154961', '160222109', '8,7,3,4,4', '2016-02-22 23:06:01');
INSERT INTO `jiang_ssc_code` VALUES ('154960', '160222108', '8,3,7,1,2', '2016-02-22 23:00:58');
INSERT INTO `jiang_ssc_code` VALUES ('154959', '160222107', '3,7,4,9,5', '2016-02-22 22:55:59');
INSERT INTO `jiang_ssc_code` VALUES ('154958', '160222106', '8,2,7,6,4', '2016-02-22 22:50:49');
INSERT INTO `jiang_ssc_code` VALUES ('154957', '160222105', '5,6,2,2,2', '2016-02-22 22:45:55');
INSERT INTO `jiang_ssc_code` VALUES ('154956', '160222104', '6,7,2,0,2', '2016-02-22 22:40:51');
INSERT INTO `jiang_ssc_code` VALUES ('154955', '160222103', '8,7,0,9,0', '2016-02-22 22:35:57');
INSERT INTO `jiang_ssc_code` VALUES ('154954', '160222102', '6,9,4,2,4', '2016-02-22 22:30:52');
INSERT INTO `jiang_ssc_code` VALUES ('154953', '160222101', '8,1,2,0,2', '2016-02-22 22:25:58');
INSERT INTO `jiang_ssc_code` VALUES ('154952', '160222100', '2,2,1,0,4', '2016-02-22 22:20:59');
INSERT INTO `jiang_ssc_code` VALUES ('154951', '160222099', '0,9,9,8,9', '2016-02-22 22:15:55');
INSERT INTO `jiang_ssc_code` VALUES ('154950', '160222098', '4,4,9,5,0', '2016-02-22 22:11:01');
INSERT INTO `jiang_ssc_code` VALUES ('154949', '160222097', '7,5,0,7,5', '2016-02-22 22:06:16');
INSERT INTO `jiang_ssc_code` VALUES ('154948', '160222096', '5,5,5,3,1', '2016-02-22 22:00:59');
INSERT INTO `jiang_ssc_code` VALUES ('154947', '160222095', '0,8,3,0,6', '2016-02-22 21:51:01');
INSERT INTO `jiang_ssc_code` VALUES ('154946', '160222094', '1,7,5,1,5', '2016-02-22 21:40:58');
INSERT INTO `jiang_ssc_code` VALUES ('154945', '160222093', '4,8,4,2,6', '2016-02-22 21:30:59');
INSERT INTO `jiang_ssc_code` VALUES ('154944', '160222092', '0,0,2,2,2', '2016-02-22 21:20:56');
INSERT INTO `jiang_ssc_code` VALUES ('154943', '160222091', '4,2,6,2,9', '2016-02-22 21:11:07');
INSERT INTO `jiang_ssc_code` VALUES ('154942', '160222090', '8,5,8,4,4', '2016-02-22 21:00:51');
INSERT INTO `jiang_ssc_code` VALUES ('154941', '160222089', '4,2,8,3,9', '2016-02-22 20:50:58');
INSERT INTO `jiang_ssc_code` VALUES ('154940', '160222088', '5,1,0,4,8', '2016-02-22 20:40:59');
INSERT INTO `jiang_ssc_code` VALUES ('154939', '160222087', '9,6,5,8,5', '2016-02-22 20:30:57');
INSERT INTO `jiang_ssc_code` VALUES ('154938', '160222086', '5,3,3,4,6', '2016-02-22 20:20:54');
INSERT INTO `jiang_ssc_code` VALUES ('154937', '160222085', '3,4,0,1,4', '2016-02-22 20:10:56');
INSERT INTO `jiang_ssc_code` VALUES ('154936', '160222084', '5,8,8,3,8', '2016-02-22 20:00:57');
INSERT INTO `jiang_ssc_code` VALUES ('154935', '160222083', '3,6,4,8,2', '2016-02-22 19:50:54');
INSERT INTO `jiang_ssc_code` VALUES ('154934', '160222082', '7,0,1,8,6', '2016-02-22 19:40:56');
INSERT INTO `jiang_ssc_code` VALUES ('154933', '160222081', '8,1,3,0,8', '2016-02-22 19:30:57');
INSERT INTO `jiang_ssc_code` VALUES ('154932', '160222080', '6,9,5,6,4', '2016-02-22 19:20:54');
INSERT INTO `jiang_ssc_code` VALUES ('154931', '160222079', '0,7,1,2,0', '2016-02-22 19:11:06');
INSERT INTO `jiang_ssc_code` VALUES ('154930', '160222078', '4,4,3,0,7', '2016-02-22 19:00:57');
INSERT INTO `jiang_ssc_code` VALUES ('154929', '160222077', '6,4,6,0,0', '2016-02-22 18:50:59');
INSERT INTO `jiang_ssc_code` VALUES ('154928', '160222076', '9,1,2,7,6', '2016-02-22 18:41:00');
INSERT INTO `jiang_ssc_code` VALUES ('154927', '160222075', '1,5,4,6,7', '2016-02-22 18:31:07');
INSERT INTO `jiang_ssc_code` VALUES ('154926', '160222074', '9,5,9,4,3', '2016-02-22 18:21:08');
INSERT INTO `jiang_ssc_code` VALUES ('154925', '160222073', '7,8,2,5,9', '2016-02-22 18:11:01');
INSERT INTO `jiang_ssc_code` VALUES ('154924', '160222072', '6,4,5,4,9', '2016-02-22 18:00:56');
INSERT INTO `jiang_ssc_code` VALUES ('154923', '160222071', '9,4,6,2,8', '2016-02-22 17:50:57');
INSERT INTO `jiang_ssc_code` VALUES ('154922', '160222070', '1,8,7,6,4', '2016-02-22 17:40:58');
INSERT INTO `jiang_ssc_code` VALUES ('154921', '160222069', '6,8,3,6,8', '2016-02-22 17:31:00');
INSERT INTO `jiang_ssc_code` VALUES ('154920', '160222068', '5,7,9,1,8', '2016-02-22 17:20:56');
INSERT INTO `jiang_ssc_code` VALUES ('154919', '160222067', '3,1,7,8,7', '2016-02-22 17:10:58');
INSERT INTO `jiang_ssc_code` VALUES ('154918', '160222066', '2,2,5,2,2', '2016-02-22 17:00:58');
INSERT INTO `jiang_ssc_code` VALUES ('154917', '160222065', '7,5,8,5,7', '2016-02-22 16:51:00');
INSERT INTO `jiang_ssc_code` VALUES ('154916', '160222064', '4,7,6,8,2', '2016-02-22 16:41:01');
INSERT INTO `jiang_ssc_code` VALUES ('154915', '160222063', '8,0,1,1,8', '2016-02-22 16:31:04');
INSERT INTO `jiang_ssc_code` VALUES ('154914', '160222062', '8,7,2,7,6', '2016-02-22 16:21:04');
INSERT INTO `jiang_ssc_code` VALUES ('154913', '160222061', '0,8,6,2,9', '2016-02-22 16:10:54');
INSERT INTO `jiang_ssc_code` VALUES ('154912', '160222060', '8,6,0,0,5', '2016-02-22 16:01:08');
INSERT INTO `jiang_ssc_code` VALUES ('154911', '160222059', '9,9,8,1,3', '2016-02-22 15:51:14');
INSERT INTO `jiang_ssc_code` VALUES ('154910', '160222058', '8,5,5,7,2', '2016-02-22 15:41:01');
INSERT INTO `jiang_ssc_code` VALUES ('154909', '160222057', '8,6,4,4,5', '2016-02-22 15:31:03');
INSERT INTO `jiang_ssc_code` VALUES ('154908', '160222056', '3,8,3,8,9', '2016-02-22 15:20:54');
INSERT INTO `jiang_ssc_code` VALUES ('154907', '160222055', '4,6,0,0,5', '2016-02-22 15:11:02');
INSERT INTO `jiang_ssc_code` VALUES ('154906', '160222054', '6,1,2,2,4', '2016-02-22 15:00:58');
INSERT INTO `jiang_ssc_code` VALUES ('154905', '160222053', '0,9,8,0,9', '2016-02-22 14:51:00');
INSERT INTO `jiang_ssc_code` VALUES ('154904', '160222052', '9,0,2,7,6', '2016-02-22 14:41:12');
INSERT INTO `jiang_ssc_code` VALUES ('154903', '160222051', '9,6,1,7,8', '2016-02-22 14:31:13');
INSERT INTO `jiang_ssc_code` VALUES ('154902', '160222050', '1,6,9,9,9', '2016-02-22 14:20:55');
INSERT INTO `jiang_ssc_code` VALUES ('154901', '160222049', '0,4,9,4,9', '2016-02-22 14:10:52');
INSERT INTO `jiang_ssc_code` VALUES ('154900', '160222048', '9,4,9,3,2', '2016-02-22 14:00:49');
INSERT INTO `jiang_ssc_code` VALUES ('154899', '160222047', '9,8,2,6,8', '2016-02-22 13:50:57');
INSERT INTO `jiang_ssc_code` VALUES ('154898', '160222046', '1,9,3,3,5', '2016-02-22 13:40:49');
INSERT INTO `jiang_ssc_code` VALUES ('154897', '160222045', '6,2,0,5,1', '2016-02-22 13:30:50');
INSERT INTO `jiang_ssc_code` VALUES ('154896', '160222044', '8,8,1,9,0', '2016-02-22 13:20:49');
INSERT INTO `jiang_ssc_code` VALUES ('154895', '160222043', '9,0,8,6,1', '2016-02-22 13:10:56');
INSERT INTO `jiang_ssc_code` VALUES ('154894', '160222042', '5,6,6,1,9', '2016-02-22 13:00:55');
INSERT INTO `jiang_ssc_code` VALUES ('154893', '160222041', '6,7,8,6,3', '2016-02-22 12:50:47');
INSERT INTO `jiang_ssc_code` VALUES ('154892', '160222040', '6,6,0,3,6', '2016-02-22 12:41:00');
INSERT INTO `jiang_ssc_code` VALUES ('154891', '160222039', '7,2,9,1,0', '2016-02-22 12:31:04');
INSERT INTO `jiang_ssc_code` VALUES ('154890', '160222038', '7,5,6,8,0', '2016-02-22 12:20:49');
INSERT INTO `jiang_ssc_code` VALUES ('154889', '160222037', '5,6,1,5,4', '2016-02-22 12:11:18');
INSERT INTO `jiang_ssc_code` VALUES ('154888', '160222036', '3,5,3,9,9', '2016-02-22 12:00:53');
INSERT INTO `jiang_ssc_code` VALUES ('154887', '160222035', '4,5,2,8,0', '2016-02-22 11:51:01');
INSERT INTO `jiang_ssc_code` VALUES ('154886', '160222034', '7,9,9,2,8', '2016-02-22 11:46:57');
INSERT INTO `jiang_ssc_code` VALUES ('154885', '160222033', '7,8,1,7,0', '2016-02-22 11:40:16');
INSERT INTO `jiang_ssc_code` VALUES ('154636', '160220024', '8,1,7,5,8', '2016-02-20 10:01:13');
INSERT INTO `jiang_ssc_code` VALUES ('154637', '160220025', '5,9,1,6,0', '2016-02-20 10:11:16');
INSERT INTO `jiang_ssc_code` VALUES ('154638', '160220026', '5,4,0,0,8', '2016-02-20 10:21:15');
INSERT INTO `jiang_ssc_code` VALUES ('154639', '160220027', '2,8,9,2,8', '2016-02-20 10:31:12');
INSERT INTO `jiang_ssc_code` VALUES ('154640', '160220028', '0,6,4,3,0', '2016-02-20 10:41:04');
INSERT INTO `jiang_ssc_code` VALUES ('154641', '160220029', '7,8,1,4,7', '2016-02-20 10:51:12');
INSERT INTO `jiang_ssc_code` VALUES ('154642', '160220030', '9,0,6,1,9', '2016-02-20 11:01:05');
INSERT INTO `jiang_ssc_code` VALUES ('154643', '160220031', '7,8,4,4,8', '2016-02-20 11:11:18');
INSERT INTO `jiang_ssc_code` VALUES ('154644', '160220032', '1,8,9,9,7', '2016-02-20 11:21:03');
INSERT INTO `jiang_ssc_code` VALUES ('154645', '160220033', '7,0,7,3,3', '2016-02-20 11:30:56');
INSERT INTO `jiang_ssc_code` VALUES ('154646', '160220034', '4,6,3,1,8', '2016-02-20 11:40:58');
INSERT INTO `jiang_ssc_code` VALUES ('154647', '160220035', '8,8,5,9,0', '2016-02-20 11:51:06');
INSERT INTO `jiang_ssc_code` VALUES ('154648', '160220036', '2,4,8,5,9', '2016-02-20 12:01:17');
INSERT INTO `jiang_ssc_code` VALUES ('154649', '160220037', '0,5,2,2,0', '2016-02-20 12:11:17');
INSERT INTO `jiang_ssc_code` VALUES ('154650', '160220038', '4,2,8,4,7', '2016-02-20 12:20:59');
INSERT INTO `jiang_ssc_code` VALUES ('154651', '160220039', '4,7,0,1,6', '2016-02-20 12:31:21');
INSERT INTO `jiang_ssc_code` VALUES ('154652', '160220040', '6,6,7,8,7', '2016-02-20 12:41:13');
INSERT INTO `jiang_ssc_code` VALUES ('154653', '160220041', '6,0,5,3,6', '2016-02-20 12:51:02');
INSERT INTO `jiang_ssc_code` VALUES ('154654', '160220042', '8,8,4,6,4', '2016-02-20 13:01:15');
INSERT INTO `jiang_ssc_code` VALUES ('154655', '160220043', '6,1,1,9,8', '2016-02-20 13:11:16');
INSERT INTO `jiang_ssc_code` VALUES ('154656', '160220044', '8,8,6,6,4', '2016-02-20 13:21:06');
INSERT INTO `jiang_ssc_code` VALUES ('154657', '160220045', '6,6,1,2,0', '2016-02-20 13:31:08');
INSERT INTO `jiang_ssc_code` VALUES ('154658', '160220046', '4,8,1,3,3', '2016-02-20 13:40:57');
INSERT INTO `jiang_ssc_code` VALUES ('154659', '160220047', '9,2,6,5,5', '2016-02-20 13:51:19');
INSERT INTO `jiang_ssc_code` VALUES ('154660', '160220048', '1,1,5,1,3', '2016-02-20 14:01:07');
INSERT INTO `jiang_ssc_code` VALUES ('154661', '160220049', '0,7,5,6,9', '2016-02-20 14:11:10');
INSERT INTO `jiang_ssc_code` VALUES ('154662', '160220050', '2,8,0,4,7', '2016-02-20 14:21:13');
INSERT INTO `jiang_ssc_code` VALUES ('154663', '160220051', '8,6,4,4,7', '2016-02-20 14:31:17');
INSERT INTO `jiang_ssc_code` VALUES ('154664', '160220052', '9,4,9,4,8', '2016-02-20 14:41:08');
INSERT INTO `jiang_ssc_code` VALUES ('154665', '160220053', '3,4,0,0,1', '2016-02-20 14:51:15');
INSERT INTO `jiang_ssc_code` VALUES ('154666', '160220054', '6,5,2,5,2', '2016-02-20 15:01:24');
INSERT INTO `jiang_ssc_code` VALUES ('154667', '160220055', '1,5,3,0,1', '2016-02-20 15:11:16');
INSERT INTO `jiang_ssc_code` VALUES ('154668', '160220056', '4,0,3,3,8', '2016-02-20 15:21:11');
INSERT INTO `jiang_ssc_code` VALUES ('154669', '160220057', '9,0,7,3,3', '2016-02-20 15:31:22');
INSERT INTO `jiang_ssc_code` VALUES ('154670', '160220058', '5,8,6,0,5', '2016-02-20 15:41:16');
INSERT INTO `jiang_ssc_code` VALUES ('154671', '160220059', '8,8,8,4,9', '2016-02-20 15:51:15');
INSERT INTO `jiang_ssc_code` VALUES ('154672', '160220060', '1,9,0,9,6', '2016-02-20 16:00:56');
INSERT INTO `jiang_ssc_code` VALUES ('154673', '160220061', '6,3,9,1,5', '2016-02-20 16:11:08');
INSERT INTO `jiang_ssc_code` VALUES ('154674', '160220062', '7,5,4,5,1', '2016-02-20 16:21:12');
INSERT INTO `jiang_ssc_code` VALUES ('154675', '160220063', '1,1,0,3,4', '2016-02-20 16:31:09');
INSERT INTO `jiang_ssc_code` VALUES ('154676', '160220064', '9,9,9,2,6', '2016-02-20 16:41:15');
INSERT INTO `jiang_ssc_code` VALUES ('154677', '160220065', '8,4,1,6,8', '2016-02-20 16:51:07');
INSERT INTO `jiang_ssc_code` VALUES ('154678', '160220066', '0,8,4,0,1', '2016-02-20 17:01:01');
INSERT INTO `jiang_ssc_code` VALUES ('154679', '160220067', '9,6,8,1,6', '2016-02-20 17:11:14');
INSERT INTO `jiang_ssc_code` VALUES ('154680', '160220068', '4,2,3,6,1', '2016-02-20 17:21:25');
INSERT INTO `jiang_ssc_code` VALUES ('154681', '160220069', '7,1,9,4,1', '2016-02-20 17:31:04');
INSERT INTO `jiang_ssc_code` VALUES ('154682', '160220070', '6,5,7,0,5', '2016-02-20 17:41:05');
INSERT INTO `jiang_ssc_code` VALUES ('154683', '160220071', '3,7,5,9,4', '2016-02-20 17:51:07');
INSERT INTO `jiang_ssc_code` VALUES ('154684', '160220072', '1,5,8,2,1', '2016-02-20 18:01:10');
INSERT INTO `jiang_ssc_code` VALUES ('154685', '160220073', '8,5,0,1,0', '2016-02-20 18:11:03');
INSERT INTO `jiang_ssc_code` VALUES ('154686', '160220074', '9,5,9,3,0', '2016-02-20 18:21:11');
INSERT INTO `jiang_ssc_code` VALUES ('154687', '160220075', '2,1,7,7,0', '2016-02-20 18:31:14');
INSERT INTO `jiang_ssc_code` VALUES ('154688', '160220076', '8,4,4,0,9', '2016-02-20 18:41:14');
INSERT INTO `jiang_ssc_code` VALUES ('154689', '160220077', '3,4,9,6,6', '2016-02-20 18:51:14');
INSERT INTO `jiang_ssc_code` VALUES ('154690', '160220078', '9,3,7,2,1', '2016-02-20 19:01:27');
INSERT INTO `jiang_ssc_code` VALUES ('154691', '160220079', '1,1,7,0,7', '2016-02-20 19:10:54');
INSERT INTO `jiang_ssc_code` VALUES ('154692', '160220080', '0,4,9,9,8', '2016-02-20 19:21:26');
INSERT INTO `jiang_ssc_code` VALUES ('154693', '160220081', '3,2,3,6,9', '2016-02-20 19:31:19');
INSERT INTO `jiang_ssc_code` VALUES ('154694', '160220082', '1,3,3,6,7', '2016-02-20 19:41:04');
INSERT INTO `jiang_ssc_code` VALUES ('154695', '160220083', '5,8,5,2,8', '2016-02-20 19:51:06');
INSERT INTO `jiang_ssc_code` VALUES ('154696', '160220084', '2,2,7,0,6', '2016-02-20 20:01:06');
INSERT INTO `jiang_ssc_code` VALUES ('154697', '160220085', '9,2,2,5,0', '2016-02-20 20:11:15');
INSERT INTO `jiang_ssc_code` VALUES ('154698', '160220086', '2,6,6,4,8', '2016-02-20 20:21:02');
INSERT INTO `jiang_ssc_code` VALUES ('154699', '160220087', '1,4,2,6,9', '2016-02-20 20:31:16');
INSERT INTO `jiang_ssc_code` VALUES ('154700', '160220088', '7,5,8,6,4', '2016-02-20 20:41:06');
INSERT INTO `jiang_ssc_code` VALUES ('154701', '160220089', '8,5,6,9,3', '2016-02-20 20:51:11');
INSERT INTO `jiang_ssc_code` VALUES ('154702', '160220090', '1,1,8,9,6', '2016-02-20 21:01:31');
INSERT INTO `jiang_ssc_code` VALUES ('154703', '160220091', '7,8,6,4,5', '2016-02-20 21:11:03');
INSERT INTO `jiang_ssc_code` VALUES ('154704', '160220092', '8,1,8,0,0', '2016-02-20 21:21:06');
INSERT INTO `jiang_ssc_code` VALUES ('154705', '160220093', '3,1,4,3,3', '2016-02-20 21:31:13');
INSERT INTO `jiang_ssc_code` VALUES ('154706', '160220094', '5,9,1,2,8', '2016-02-20 21:41:11');
INSERT INTO `jiang_ssc_code` VALUES ('154707', '160220095', '3,9,5,2,8', '2016-02-20 21:51:38');
INSERT INTO `jiang_ssc_code` VALUES ('154708', '160220096', '1,2,4,2,1', '2016-02-20 22:01:27');
INSERT INTO `jiang_ssc_code` VALUES ('154709', '160220097', '8,5,9,4,3', '2016-02-20 22:06:27');
INSERT INTO `jiang_ssc_code` VALUES ('154710', '160220098', '5,0,4,8,3', '2016-02-20 22:11:20');
INSERT INTO `jiang_ssc_code` VALUES ('154711', '160220099', '2,0,3,0,7', '2016-02-20 22:16:11');
INSERT INTO `jiang_ssc_code` VALUES ('154712', '160220100', '6,1,8,3,6', '2016-02-20 22:21:15');
INSERT INTO `jiang_ssc_code` VALUES ('154713', '160220101', '0,3,3,0,1', '2016-02-20 22:26:18');
INSERT INTO `jiang_ssc_code` VALUES ('154714', '160220102', '8,4,5,8,4', '2016-02-20 22:31:12');
INSERT INTO `jiang_ssc_code` VALUES ('154715', '160220103', '2,2,3,6,4', '2016-02-20 22:36:06');
INSERT INTO `jiang_ssc_code` VALUES ('154716', '160220104', '8,9,1,4,7', '2016-02-20 22:41:29');
INSERT INTO `jiang_ssc_code` VALUES ('154717', '160220105', '2,6,5,5,3', '2016-02-20 22:46:18');
INSERT INTO `jiang_ssc_code` VALUES ('154718', '160220106', '9,9,6,4,9', '2016-02-20 22:51:15');
INSERT INTO `jiang_ssc_code` VALUES ('154719', '160220107', '0,3,5,8,8', '2016-02-20 22:56:08');
INSERT INTO `jiang_ssc_code` VALUES ('154720', '160220108', '5,5,7,7,7', '2016-02-20 23:01:15');
INSERT INTO `jiang_ssc_code` VALUES ('154721', '160220109', '3,6,8,0,0', '2016-02-20 23:06:08');
INSERT INTO `jiang_ssc_code` VALUES ('154722', '160220110', '5,7,7,4,8', '2016-02-20 23:11:39');
INSERT INTO `jiang_ssc_code` VALUES ('154723', '160220111', '7,4,1,8,3', '2016-02-20 23:16:20');
INSERT INTO `jiang_ssc_code` VALUES ('154724', '160220112', '1,1,4,1,7', '2016-02-20 23:21:27');
INSERT INTO `jiang_ssc_code` VALUES ('154725', '160220113', '3,9,9,9,7', '2016-02-20 23:26:13');
INSERT INTO `jiang_ssc_code` VALUES ('154726', '160220114', '0,2,8,8,8', '2016-02-20 23:31:10');
INSERT INTO `jiang_ssc_code` VALUES ('154727', '160220115', '6,3,5,9,7', '2016-02-20 23:36:09');
INSERT INTO `jiang_ssc_code` VALUES ('154728', '160220116', '7,2,6,4,9', '2016-02-20 23:41:18');
INSERT INTO `jiang_ssc_code` VALUES ('154729', '160220117', '5,2,1,1,6', '2016-02-20 23:46:09');
INSERT INTO `jiang_ssc_code` VALUES ('154730', '160220118', '4,9,5,5,4', '2016-02-20 23:50:52');
INSERT INTO `jiang_ssc_code` VALUES ('154731', '160220119', '6,2,0,8,5', '2016-02-20 23:55:56');
INSERT INTO `jiang_ssc_code` VALUES ('154732', '160220120', '1,9,9,9,7', '2016-02-21 00:01:38');
INSERT INTO `jiang_ssc_code` VALUES ('154733', '160221001', '3,5,5,0,6', '2016-02-21 00:05:58');
INSERT INTO `jiang_ssc_code` VALUES ('154734', '160221002', '3,0,2,3,3', '2016-02-21 00:11:05');
INSERT INTO `jiang_ssc_code` VALUES ('154735', '160221003', '0,3,4,9,8', '2016-02-21 00:15:56');
INSERT INTO `jiang_ssc_code` VALUES ('154736', '160221004', '2,1,1,8,4', '2016-02-21 00:20:59');
INSERT INTO `jiang_ssc_code` VALUES ('154737', '160221005', '3,0,4,1,6', '2016-02-21 00:26:08');
INSERT INTO `jiang_ssc_code` VALUES ('154738', '160221006', '9,4,1,7,0', '2016-02-21 00:30:56');
INSERT INTO `jiang_ssc_code` VALUES ('154739', '160221007', '1,9,9,7,8', '2016-02-21 00:36:19');
INSERT INTO `jiang_ssc_code` VALUES ('154740', '160221008', '4,6,8,7,7', '2016-02-21 00:40:49');
INSERT INTO `jiang_ssc_code` VALUES ('154741', '160221009', '4,4,4,6,2', '2016-02-21 00:46:02');
INSERT INTO `jiang_ssc_code` VALUES ('154742', '160221010', '8,3,2,5,2', '2016-02-21 00:51:06');
INSERT INTO `jiang_ssc_code` VALUES ('154743', '160221011', '8,9,4,1,9', '2016-02-21 00:56:02');
INSERT INTO `jiang_ssc_code` VALUES ('154744', '160221012', '0,5,3,6,1', '2016-02-21 01:01:08');
INSERT INTO `jiang_ssc_code` VALUES ('154745', '160221013', '3,8,6,9,6', '2016-02-21 01:06:02');
INSERT INTO `jiang_ssc_code` VALUES ('154746', '160221014', '7,1,1,3,7', '2016-02-21 01:10:53');
INSERT INTO `jiang_ssc_code` VALUES ('154747', '160221015', '7,3,8,8,9', '2016-02-21 01:16:05');
INSERT INTO `jiang_ssc_code` VALUES ('154748', '160221016', '9,8,1,2,4', '2016-02-21 01:21:02');
INSERT INTO `jiang_ssc_code` VALUES ('154749', '160221017', '7,4,8,5,7', '2016-02-21 01:25:56');
INSERT INTO `jiang_ssc_code` VALUES ('154750', '160221018', '1,2,4,3,6', '2016-02-21 01:31:00');
INSERT INTO `jiang_ssc_code` VALUES ('154751', '160221019', '5,0,5,5,4', '2016-02-21 01:36:02');
INSERT INTO `jiang_ssc_code` VALUES ('154752', '160221020', '0,1,8,5,8', '2016-02-21 01:40:57');
INSERT INTO `jiang_ssc_code` VALUES ('154753', '160221021', '4,0,2,2,5', '2016-02-21 01:46:10');
INSERT INTO `jiang_ssc_code` VALUES ('154754', '160221022', '5,5,9,1,1', '2016-02-21 01:51:27');
INSERT INTO `jiang_ssc_code` VALUES ('154755', '160221023', '2,2,0,3,7', '2016-02-21 01:56:00');
INSERT INTO `jiang_ssc_code` VALUES ('154756', '160221024', '2,7,0,7,2', '2016-02-21 10:00:52');
INSERT INTO `jiang_ssc_code` VALUES ('154757', '160221025', '7,3,7,7,8', '2016-02-21 10:10:49');
INSERT INTO `jiang_ssc_code` VALUES ('154758', '160221026', '0,9,7,8,1', '2016-02-21 10:20:52');
INSERT INTO `jiang_ssc_code` VALUES ('154759', '160221027', '3,2,3,0,8', '2016-02-21 10:33:09');
INSERT INTO `jiang_ssc_code` VALUES ('154760', '160221028', '2,0,4,0,2', '2016-02-21 10:40:53');
INSERT INTO `jiang_ssc_code` VALUES ('154761', '160221029', '5,3,2,9,7', '2016-02-21 10:50:46');
INSERT INTO `jiang_ssc_code` VALUES ('154762', '160221030', '9,6,8,9,0', '2016-02-21 11:01:02');
INSERT INTO `jiang_ssc_code` VALUES ('154763', '160221031', '6,8,2,4,1', '2016-02-21 11:11:00');
INSERT INTO `jiang_ssc_code` VALUES ('154764', '160221032', '0,8,5,5,9', '2016-02-21 11:20:56');
INSERT INTO `jiang_ssc_code` VALUES ('154765', '160221033', '5,7,4,7,3', '2016-02-21 11:30:53');
INSERT INTO `jiang_ssc_code` VALUES ('154766', '160221034', '8,4,2,1,2', '2016-02-21 11:40:52');
INSERT INTO `jiang_ssc_code` VALUES ('154767', '160221035', '4,9,7,5,8', '2016-02-21 11:51:06');
INSERT INTO `jiang_ssc_code` VALUES ('154768', '160221036', '0,0,6,8,1', '2016-02-21 12:01:09');
INSERT INTO `jiang_ssc_code` VALUES ('154769', '160221037', '5,4,9,4,5', '2016-02-21 12:10:56');
INSERT INTO `jiang_ssc_code` VALUES ('154770', '160221038', '7,1,2,8,1', '2016-02-21 12:20:58');
INSERT INTO `jiang_ssc_code` VALUES ('154771', '160221039', '7,8,9,3,1', '2016-02-21 12:31:01');
INSERT INTO `jiang_ssc_code` VALUES ('154772', '160221040', '2,0,3,6,7', '2016-02-21 12:40:56');
INSERT INTO `jiang_ssc_code` VALUES ('154773', '160221041', '6,8,0,8,4', '2016-02-21 12:50:53');
INSERT INTO `jiang_ssc_code` VALUES ('154774', '160221042', '5,0,4,8,9', '2016-02-21 13:00:55');
INSERT INTO `jiang_ssc_code` VALUES ('154775', '160221043', '1,4,3,4,1', '2016-02-21 13:10:53');
INSERT INTO `jiang_ssc_code` VALUES ('154776', '160221044', '5,8,8,3,0', '2016-02-21 13:21:10');
INSERT INTO `jiang_ssc_code` VALUES ('154777', '160221045', '5,6,5,6,8', '2016-02-21 13:30:47');
INSERT INTO `jiang_ssc_code` VALUES ('154778', '160221046', '9,9,8,3,1', '2016-02-21 13:40:45');
INSERT INTO `jiang_ssc_code` VALUES ('154779', '160221047', '4,0,0,7,3', '2016-02-21 13:50:56');
INSERT INTO `jiang_ssc_code` VALUES ('154780', '160221048', '2,8,7,2,3', '2016-02-21 14:00:56');
INSERT INTO `jiang_ssc_code` VALUES ('154781', '160221049', '9,0,2,1,4', '2016-02-21 14:11:01');
INSERT INTO `jiang_ssc_code` VALUES ('154782', '160221050', '6,0,3,6,2', '2016-02-21 14:20:53');
INSERT INTO `jiang_ssc_code` VALUES ('154783', '160221051', '3,6,9,4,5', '2016-02-21 14:31:03');
INSERT INTO `jiang_ssc_code` VALUES ('154784', '160221052', '1,8,7,0,0', '2016-02-21 14:41:02');
INSERT INTO `jiang_ssc_code` VALUES ('154785', '160221053', '1,9,1,5,2', '2016-02-21 14:51:02');
INSERT INTO `jiang_ssc_code` VALUES ('154786', '160221054', '6,2,4,9,3', '2016-02-21 15:00:52');
INSERT INTO `jiang_ssc_code` VALUES ('154787', '160221055', '3,4,4,8,7', '2016-02-21 15:11:04');
INSERT INTO `jiang_ssc_code` VALUES ('154788', '160221056', '4,9,8,3,3', '2016-02-21 15:20:52');
INSERT INTO `jiang_ssc_code` VALUES ('154789', '160221057', '4,8,2,1,2', '2016-02-21 15:30:54');
INSERT INTO `jiang_ssc_code` VALUES ('154790', '160221058', '7,0,3,2,9', '2016-02-21 15:40:57');
INSERT INTO `jiang_ssc_code` VALUES ('154791', '160221059', '5,1,1,9,1', '2016-02-21 15:50:58');
INSERT INTO `jiang_ssc_code` VALUES ('154792', '160221060', '7,6,2,0,5', '2016-02-21 16:00:50');
INSERT INTO `jiang_ssc_code` VALUES ('154793', '160221061', '4,3,5,0,0', '2016-02-21 16:10:58');
INSERT INTO `jiang_ssc_code` VALUES ('154794', '160221062', '9,4,5,5,7', '2016-02-21 16:20:55');
INSERT INTO `jiang_ssc_code` VALUES ('154795', '160221063', '3,9,4,4,6', '2016-02-21 16:30:51');
INSERT INTO `jiang_ssc_code` VALUES ('154796', '160221064', '5,4,6,5,2', '2016-02-21 16:40:57');
INSERT INTO `jiang_ssc_code` VALUES ('154797', '160221065', '6,7,1,6,9', '2016-02-21 16:50:55');
INSERT INTO `jiang_ssc_code` VALUES ('154798', '160221066', '0,5,7,4,8', '2016-02-21 17:00:56');
INSERT INTO `jiang_ssc_code` VALUES ('154799', '160221067', '4,0,9,0,0', '2016-02-21 17:10:59');
INSERT INTO `jiang_ssc_code` VALUES ('154800', '160221068', '7,7,6,4,6', '2016-02-21 17:20:51');
INSERT INTO `jiang_ssc_code` VALUES ('154801', '160221069', '2,1,1,3,6', '2016-02-21 17:30:54');
INSERT INTO `jiang_ssc_code` VALUES ('154802', '160221070', '0,9,1,0,7', '2016-02-21 17:40:52');
INSERT INTO `jiang_ssc_code` VALUES ('154803', '160221071', '3,8,9,4,3', '2016-02-21 17:50:56');
INSERT INTO `jiang_ssc_code` VALUES ('154804', '160221072', '7,5,0,7,5', '2016-02-21 18:00:52');
INSERT INTO `jiang_ssc_code` VALUES ('154805', '160221073', '0,3,0,4,3', '2016-02-21 18:10:55');
INSERT INTO `jiang_ssc_code` VALUES ('154806', '160221074', '1,4,3,6,8', '2016-02-21 18:20:58');
INSERT INTO `jiang_ssc_code` VALUES ('154807', '160221075', '7,9,4,3,4', '2016-02-21 18:30:49');
INSERT INTO `jiang_ssc_code` VALUES ('154808', '160221076', '9,8,7,5,8', '2016-02-21 18:41:03');
INSERT INTO `jiang_ssc_code` VALUES ('154809', '160221077', '6,2,5,6,0', '2016-02-21 18:50:55');
INSERT INTO `jiang_ssc_code` VALUES ('154810', '160221078', '6,2,1,3,9', '2016-02-21 19:00:59');
INSERT INTO `jiang_ssc_code` VALUES ('154811', '160221079', '4,1,9,4,3', '2016-02-21 19:10:51');
INSERT INTO `jiang_ssc_code` VALUES ('154812', '160221080', '7,1,3,9,3', '2016-02-21 19:20:59');
INSERT INTO `jiang_ssc_code` VALUES ('154813', '160221081', '6,3,8,2,1', '2016-02-21 19:30:52');
INSERT INTO `jiang_ssc_code` VALUES ('154814', '160221082', '4,5,8,6,7', '2016-02-21 19:40:59');
INSERT INTO `jiang_ssc_code` VALUES ('154815', '160221083', '7,7,4,0,4', '2016-02-21 19:50:57');
INSERT INTO `jiang_ssc_code` VALUES ('154816', '160221084', '4,6,4,1,1', '2016-02-21 20:00:59');
INSERT INTO `jiang_ssc_code` VALUES ('154817', '160221085', '4,8,4,0,8', '2016-02-21 20:11:01');
INSERT INTO `jiang_ssc_code` VALUES ('154818', '160221086', '4,2,9,2,9', '2016-02-21 20:20:54');
INSERT INTO `jiang_ssc_code` VALUES ('154819', '160221087', '8,9,8,1,3', '2016-02-21 20:30:51');
INSERT INTO `jiang_ssc_code` VALUES ('154820', '160221088', '6,1,3,6,2', '2016-02-21 20:40:49');
INSERT INTO `jiang_ssc_code` VALUES ('154821', '160221089', '5,4,7,9,4', '2016-02-21 20:51:02');
INSERT INTO `jiang_ssc_code` VALUES ('154822', '160221090', '0,8,7,8,2', '2016-02-21 21:01:02');
INSERT INTO `jiang_ssc_code` VALUES ('154823', '160221091', '0,0,5,7,9', '2016-02-21 21:10:46');
INSERT INTO `jiang_ssc_code` VALUES ('154824', '160221092', '5,7,2,2,7', '2016-02-21 21:20:53');
INSERT INTO `jiang_ssc_code` VALUES ('154825', '160221093', '6,6,6,9,7', '2016-02-21 21:30:58');
INSERT INTO `jiang_ssc_code` VALUES ('154826', '160221094', '2,9,7,0,0', '2016-02-21 21:41:04');
INSERT INTO `jiang_ssc_code` VALUES ('154827', '160221095', '5,6,3,7,6', '2016-02-21 21:50:53');
INSERT INTO `jiang_ssc_code` VALUES ('154828', '160221096', '3,3,2,0,9', '2016-02-21 22:00:56');
INSERT INTO `jiang_ssc_code` VALUES ('154829', '160221097', '3,5,1,4,2', '2016-02-21 22:05:50');
INSERT INTO `jiang_ssc_code` VALUES ('154830', '160221098', '5,7,3,0,2', '2016-02-21 22:10:53');
INSERT INTO `jiang_ssc_code` VALUES ('154831', '160221099', '8,8,8,8,5', '2016-02-21 22:15:46');
INSERT INTO `jiang_ssc_code` VALUES ('154832', '160221100', '6,6,9,7,5', '2016-02-21 22:20:46');
INSERT INTO `jiang_ssc_code` VALUES ('154833', '160221101', '5,9,4,8,4', '2016-02-21 22:25:54');
INSERT INTO `jiang_ssc_code` VALUES ('154834', '160221102', '0,9,7,7,7', '2016-02-21 22:30:48');
INSERT INTO `jiang_ssc_code` VALUES ('154835', '160221103', '1,5,8,2,3', '2016-02-21 22:35:53');
INSERT INTO `jiang_ssc_code` VALUES ('154836', '160221104', '0,8,2,7,7', '2016-02-21 22:40:58');
INSERT INTO `jiang_ssc_code` VALUES ('154837', '160221105', '0,4,7,8,6', '2016-02-21 22:45:50');
INSERT INTO `jiang_ssc_code` VALUES ('154838', '160221106', '8,3,3,5,5', '2016-02-21 22:50:50');
INSERT INTO `jiang_ssc_code` VALUES ('154839', '160221107', '0,7,9,6,1', '2016-02-21 22:56:04');
INSERT INTO `jiang_ssc_code` VALUES ('154840', '160221108', '1,4,5,1,9', '2016-02-21 23:00:57');
INSERT INTO `jiang_ssc_code` VALUES ('154841', '160221109', '1,9,2,9,2', '2016-02-21 23:05:51');
INSERT INTO `jiang_ssc_code` VALUES ('154842', '160221110', '3,6,7,4,3', '2016-02-21 23:10:54');
INSERT INTO `jiang_ssc_code` VALUES ('154843', '160221111', '8,0,7,6,7', '2016-02-21 23:15:53');
INSERT INTO `jiang_ssc_code` VALUES ('154844', '160221112', '8,5,7,7,6', '2016-02-21 23:20:57');
INSERT INTO `jiang_ssc_code` VALUES ('154845', '160221113', '5,2,2,8,1', '2016-02-21 23:25:53');
INSERT INTO `jiang_ssc_code` VALUES ('154846', '160221114', '3,7,8,2,3', '2016-02-21 23:30:54');
INSERT INTO `jiang_ssc_code` VALUES ('154847', '160221115', '0,4,8,5,9', '2016-02-21 23:35:49');
INSERT INTO `jiang_ssc_code` VALUES ('154848', '160221116', '7,2,3,5,2', '2016-02-21 23:40:58');
INSERT INTO `jiang_ssc_code` VALUES ('154849', '160221117', '9,5,2,7,0', '2016-02-21 23:45:52');
INSERT INTO `jiang_ssc_code` VALUES ('154850', '160221118', '8,9,0,5,9', '2016-02-21 23:50:46');
INSERT INTO `jiang_ssc_code` VALUES ('154851', '160221119', '7,3,2,9,5', '2016-02-21 23:55:54');
INSERT INTO `jiang_ssc_code` VALUES ('154852', '160221120', '3,3,9,7,2', '2016-02-22 00:00:53');
INSERT INTO `jiang_ssc_code` VALUES ('154853', '160222001', '0,1,6,6,2', '2016-02-22 00:05:56');
INSERT INTO `jiang_ssc_code` VALUES ('154854', '160222002', '9,5,2,0,1', '2016-02-22 00:10:50');
INSERT INTO `jiang_ssc_code` VALUES ('154855', '160222003', '9,3,0,8,5', '2016-02-22 00:15:48');
INSERT INTO `jiang_ssc_code` VALUES ('154856', '160222004', '7,1,2,8,0', '2016-02-22 00:20:57');
INSERT INTO `jiang_ssc_code` VALUES ('154857', '160222005', '9,6,8,4,5', '2016-02-22 00:25:51');
INSERT INTO `jiang_ssc_code` VALUES ('154858', '160222006', '7,7,1,7,5', '2016-02-22 00:30:57');
INSERT INTO `jiang_ssc_code` VALUES ('154859', '160222007', '8,6,3,7,3', '2016-02-22 00:35:54');
INSERT INTO `jiang_ssc_code` VALUES ('154860', '160222008', '5,2,1,1,0', '2016-02-22 00:40:53');
INSERT INTO `jiang_ssc_code` VALUES ('154861', '160222009', '5,8,0,9,3', '2016-02-22 00:45:51');
INSERT INTO `jiang_ssc_code` VALUES ('154862', '160222010', '3,6,6,3,2', '2016-02-22 00:50:55');
INSERT INTO `jiang_ssc_code` VALUES ('154863', '160222011', '7,3,8,2,5', '2016-02-22 00:55:59');
INSERT INTO `jiang_ssc_code` VALUES ('154864', '160222012', '2,4,8,7,5', '2016-02-22 01:01:01');
INSERT INTO `jiang_ssc_code` VALUES ('154865', '160222013', '9,9,9,3,3', '2016-02-22 01:05:51');
INSERT INTO `jiang_ssc_code` VALUES ('154866', '160222014', '8,5,0,5,8', '2016-02-22 01:10:59');
INSERT INTO `jiang_ssc_code` VALUES ('154867', '160222015', '7,5,8,1,2', '2016-02-22 01:15:57');
INSERT INTO `jiang_ssc_code` VALUES ('154868', '160222016', '3,2,9,0,4', '2016-02-22 01:20:51');
INSERT INTO `jiang_ssc_code` VALUES ('154869', '160222017', '3,5,4,6,2', '2016-02-22 01:25:50');
INSERT INTO `jiang_ssc_code` VALUES ('154870', '160222018', '7,5,4,8,0', '2016-02-22 01:30:47');
INSERT INTO `jiang_ssc_code` VALUES ('154871', '160222019', '1,5,0,4,9', '2016-02-22 01:35:53');
INSERT INTO `jiang_ssc_code` VALUES ('154872', '160222020', '1,4,3,5,8', '2016-02-22 01:40:52');
INSERT INTO `jiang_ssc_code` VALUES ('154873', '160222021', '5,2,7,7,6', '2016-02-22 01:45:56');
INSERT INTO `jiang_ssc_code` VALUES ('154874', '160222022', '1,0,5,0,6', '2016-02-22 01:50:55');
INSERT INTO `jiang_ssc_code` VALUES ('154875', '160222023', '7,1,6,0,4', '2016-02-22 01:55:49');
INSERT INTO `jiang_ssc_code` VALUES ('154876', '160222024', '8,7,8,9,1', '2016-02-22 11:25:59');
INSERT INTO `jiang_ssc_code` VALUES ('154877', '160222029', '6,6,3,9,2', '2016-02-22 11:27:41');
INSERT INTO `jiang_ssc_code` VALUES ('154878', '160222025', '6,1,1,9,9', '2016-02-22 11:27:58');
INSERT INTO `jiang_ssc_code` VALUES ('154879', '160222026', '3,4,7,4,3', '2016-02-22 11:28:30');
INSERT INTO `jiang_ssc_code` VALUES ('154880', '160222027', '3,4,3,9,5', '2016-02-22 11:28:52');
INSERT INTO `jiang_ssc_code` VALUES ('154881', '160222028', '2,3,8,5,3', '2016-02-22 11:29:33');
INSERT INTO `jiang_ssc_code` VALUES ('154882', '160222030', '1,2,9,3,6', '2016-02-22 11:29:50');
INSERT INTO `jiang_ssc_code` VALUES ('154883', '160222031', '4,6,6,2,7', '2016-02-22 11:30:53');
INSERT INTO `jiang_ssc_code` VALUES ('154884', '160222032', '5,9,3,1,0', '2016-02-22 11:31:12');

-- ----------------------------
-- Table structure for jiang_ssc_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_ssc_time`;
CREATE TABLE `jiang_ssc_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=287 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_ssc_time
-- ----------------------------
INSERT INTO `jiang_ssc_time` VALUES ('95', '00:00:01', '00:04:30', '00:05:00', '1');
INSERT INTO `jiang_ssc_time` VALUES ('96', '00:05:01', '00:09:30', '00:10:00', '2');
INSERT INTO `jiang_ssc_time` VALUES ('97', '00:10:01', '00:14:30', '00:15:00', '3');
INSERT INTO `jiang_ssc_time` VALUES ('98', '00:15:01', '00:19:30', '00:20:00', '4');
INSERT INTO `jiang_ssc_time` VALUES ('99', '00:20:01', '00:24:30', '00:25:00', '5');
INSERT INTO `jiang_ssc_time` VALUES ('100', '00:25:01', '00:29:30', '00:30:00', '6');
INSERT INTO `jiang_ssc_time` VALUES ('101', '00:30:01', '00:34:30', '00:35:00', '7');
INSERT INTO `jiang_ssc_time` VALUES ('102', '00:35:01', '00:39:30', '00:40:00', '8');
INSERT INTO `jiang_ssc_time` VALUES ('103', '00:40:01', '00:44:30', '00:45:00', '9');
INSERT INTO `jiang_ssc_time` VALUES ('104', '00:45:01', '00:49:30', '00:50:00', '10');
INSERT INTO `jiang_ssc_time` VALUES ('105', '00:50:01', '00:54:30', '00:55:00', '11');
INSERT INTO `jiang_ssc_time` VALUES ('106', '00:55:01', '00:59:30', '01:00:00', '12');
INSERT INTO `jiang_ssc_time` VALUES ('107', '01:00:01', '01:04:30', '01:05:00', '13');
INSERT INTO `jiang_ssc_time` VALUES ('108', '01:05:01', '01:09:30', '01:10:00', '14');
INSERT INTO `jiang_ssc_time` VALUES ('109', '01:10:01', '01:14:30', '01:15:00', '15');
INSERT INTO `jiang_ssc_time` VALUES ('110', '01:15:01', '01:19:30', '01:20:00', '16');
INSERT INTO `jiang_ssc_time` VALUES ('111', '01:20:01', '01:24:30', '01:25:00', '17');
INSERT INTO `jiang_ssc_time` VALUES ('112', '01:25:01', '01:29:30', '01:30:00', '18');
INSERT INTO `jiang_ssc_time` VALUES ('113', '01:30:01', '01:34:30', '01:35:00', '19');
INSERT INTO `jiang_ssc_time` VALUES ('114', '01:35:01', '01:39:30', '01:40:00', '20');
INSERT INTO `jiang_ssc_time` VALUES ('115', '01:40:01', '01:44:30', '01:45:00', '21');
INSERT INTO `jiang_ssc_time` VALUES ('116', '01:45:01', '01:49:30', '01:50:00', '22');
INSERT INTO `jiang_ssc_time` VALUES ('117', '01:50:01', '01:54:30', '01:55:00', '23');
INSERT INTO `jiang_ssc_time` VALUES ('118', '01:55:00', '09:59:30', '10:00:00', '24');
INSERT INTO `jiang_ssc_time` VALUES ('119', '10:00:00', '10:09:30', '10:10:00', '25');
INSERT INTO `jiang_ssc_time` VALUES ('192', '10:10:00', '10:19:30', '10:20:00', '26');
INSERT INTO `jiang_ssc_time` VALUES ('193', '10:20:00', '10:29:30', '10:30:00', '27');
INSERT INTO `jiang_ssc_time` VALUES ('194', '10:30:00', '10:39:30', '10:40:00', '28');
INSERT INTO `jiang_ssc_time` VALUES ('195', '10:40:00', '10:49:30', '10:50:00', '29');
INSERT INTO `jiang_ssc_time` VALUES ('196', '10:50:00', '10:59:30', '11:00:00', '30');
INSERT INTO `jiang_ssc_time` VALUES ('197', '11:00:00', '11:09:30', '11:10:00', '31');
INSERT INTO `jiang_ssc_time` VALUES ('198', '11:10:00', '11:19:30', '11:20:00', '32');
INSERT INTO `jiang_ssc_time` VALUES ('199', '11:20:00', '11:29:30', '11:30:00', '33');
INSERT INTO `jiang_ssc_time` VALUES ('200', '11:30:00', '11:39:30', '11:40:00', '34');
INSERT INTO `jiang_ssc_time` VALUES ('201', '11:40:00', '11:49:30', '11:50:00', '35');
INSERT INTO `jiang_ssc_time` VALUES ('202', '11:50:00', '11:59:30', '12:00:00', '36');
INSERT INTO `jiang_ssc_time` VALUES ('203', '12:00:00', '12:09:30', '12:10:00', '37');
INSERT INTO `jiang_ssc_time` VALUES ('204', '12:10:00', '12:19:30', '12:20:00', '38');
INSERT INTO `jiang_ssc_time` VALUES ('205', '12:20:00', '12:29:30', '12:30:00', '39');
INSERT INTO `jiang_ssc_time` VALUES ('206', '12:30:00', '12:39:30', '12:40:00', '40');
INSERT INTO `jiang_ssc_time` VALUES ('207', '12:40:00', '12:49:30', '12:50:00', '41');
INSERT INTO `jiang_ssc_time` VALUES ('208', '12:50:00', '12:59:30', '13:00:00', '42');
INSERT INTO `jiang_ssc_time` VALUES ('209', '13:00:00', '13:09:30', '13:10:00', '43');
INSERT INTO `jiang_ssc_time` VALUES ('210', '13:10:00', '13:19:30', '13:20:00', '44');
INSERT INTO `jiang_ssc_time` VALUES ('211', '13:20:00', '13:29:30', '13:30:00', '45');
INSERT INTO `jiang_ssc_time` VALUES ('212', '13:30:00', '13:39:30', '13:40:00', '46');
INSERT INTO `jiang_ssc_time` VALUES ('213', '13:40:00', '13:49:30', '13:50:00', '47');
INSERT INTO `jiang_ssc_time` VALUES ('214', '13:50:00', '13:59:30', '14:00:00', '48');
INSERT INTO `jiang_ssc_time` VALUES ('215', '14:00:00', '14:09:30', '14:10:00', '49');
INSERT INTO `jiang_ssc_time` VALUES ('216', '14:10:00', '14:19:30', '14:20:00', '50');
INSERT INTO `jiang_ssc_time` VALUES ('217', '14:20:00', '14:29:30', '14:30:00', '51');
INSERT INTO `jiang_ssc_time` VALUES ('218', '14:30:00', '14:39:30', '14:40:00', '52');
INSERT INTO `jiang_ssc_time` VALUES ('219', '14:40:00', '14:49:30', '14:50:00', '53');
INSERT INTO `jiang_ssc_time` VALUES ('220', '14:50:00', '14:59:30', '15:00:00', '54');
INSERT INTO `jiang_ssc_time` VALUES ('221', '15:00:00', '15:09:30', '15:10:00', '55');
INSERT INTO `jiang_ssc_time` VALUES ('222', '15:10:00', '15:19:30', '15:20:00', '56');
INSERT INTO `jiang_ssc_time` VALUES ('223', '15:20:00', '15:29:30', '15:30:00', '57');
INSERT INTO `jiang_ssc_time` VALUES ('224', '15:30:00', '15:39:30', '15:40:00', '58');
INSERT INTO `jiang_ssc_time` VALUES ('225', '15:40:00', '15:49:30', '15:50:00', '59');
INSERT INTO `jiang_ssc_time` VALUES ('226', '15:50:00', '15:59:30', '16:00:00', '60');
INSERT INTO `jiang_ssc_time` VALUES ('227', '16:00:00', '16:09:30', '16:10:00', '61');
INSERT INTO `jiang_ssc_time` VALUES ('228', '16:10:00', '16:19:30', '16:20:00', '62');
INSERT INTO `jiang_ssc_time` VALUES ('229', '16:20:00', '16:29:30', '16:30:00', '63');
INSERT INTO `jiang_ssc_time` VALUES ('230', '16:30:00', '16:39:30', '16:40:00', '64');
INSERT INTO `jiang_ssc_time` VALUES ('231', '16:40:00', '16:49:30', '16:50:00', '65');
INSERT INTO `jiang_ssc_time` VALUES ('232', '16:50:00', '16:59:30', '17:00:00', '66');
INSERT INTO `jiang_ssc_time` VALUES ('233', '17:00:00', '17:09:30', '17:10:00', '67');
INSERT INTO `jiang_ssc_time` VALUES ('234', '17:10:00', '17:19:30', '17:20:00', '68');
INSERT INTO `jiang_ssc_time` VALUES ('235', '17:20:00', '17:29:30', '17:30:00', '69');
INSERT INTO `jiang_ssc_time` VALUES ('236', '17:30:00', '17:39:30', '17:40:00', '70');
INSERT INTO `jiang_ssc_time` VALUES ('237', '17:40:00', '17:49:30', '17:50:00', '71');
INSERT INTO `jiang_ssc_time` VALUES ('238', '17:50:00', '17:59:30', '18:00:00', '72');
INSERT INTO `jiang_ssc_time` VALUES ('239', '18:00:00', '18:09:30', '18:10:00', '73');
INSERT INTO `jiang_ssc_time` VALUES ('240', '18:10:00', '18:19:30', '18:20:00', '74');
INSERT INTO `jiang_ssc_time` VALUES ('241', '18:20:00', '18:29:30', '18:30:00', '75');
INSERT INTO `jiang_ssc_time` VALUES ('242', '18:30:00', '18:39:30', '18:40:00', '76');
INSERT INTO `jiang_ssc_time` VALUES ('243', '18:40:00', '18:49:30', '18:50:00', '77');
INSERT INTO `jiang_ssc_time` VALUES ('244', '18:50:00', '18:59:30', '19:00:00', '78');
INSERT INTO `jiang_ssc_time` VALUES ('245', '19:00:00', '19:09:30', '19:10:00', '79');
INSERT INTO `jiang_ssc_time` VALUES ('246', '19:10:00', '19:19:30', '19:20:00', '80');
INSERT INTO `jiang_ssc_time` VALUES ('247', '19:20:00', '19:29:30', '19:30:00', '81');
INSERT INTO `jiang_ssc_time` VALUES ('248', '19:30:00', '19:39:30', '19:40:00', '82');
INSERT INTO `jiang_ssc_time` VALUES ('249', '19:40:00', '19:49:30', '19:50:00', '83');
INSERT INTO `jiang_ssc_time` VALUES ('250', '19:50:00', '19:59:30', '20:00:00', '84');
INSERT INTO `jiang_ssc_time` VALUES ('251', '20:00:00', '20:09:30', '20:10:00', '85');
INSERT INTO `jiang_ssc_time` VALUES ('252', '20:10:00', '20:19:30', '20:20:00', '86');
INSERT INTO `jiang_ssc_time` VALUES ('253', '20:20:00', '20:29:30', '20:30:00', '87');
INSERT INTO `jiang_ssc_time` VALUES ('254', '20:30:00', '20:39:30', '20:40:00', '88');
INSERT INTO `jiang_ssc_time` VALUES ('255', '20:40:00', '20:49:30', '20:50:00', '89');
INSERT INTO `jiang_ssc_time` VALUES ('256', '20:50:00', '20:59:30', '21:00:00', '90');
INSERT INTO `jiang_ssc_time` VALUES ('257', '21:00:00', '21:09:30', '21:10:00', '91');
INSERT INTO `jiang_ssc_time` VALUES ('258', '21:10:00', '21:19:30', '21:20:00', '92');
INSERT INTO `jiang_ssc_time` VALUES ('259', '21:20:00', '21:29:30', '21:30:00', '93');
INSERT INTO `jiang_ssc_time` VALUES ('260', '21:30:00', '21:39:30', '21:40:00', '94');
INSERT INTO `jiang_ssc_time` VALUES ('261', '21:40:00', '21:49:30', '21:50:00', '95');
INSERT INTO `jiang_ssc_time` VALUES ('262', '21:50:00', '21:59:30', '22:00:00', '96');
INSERT INTO `jiang_ssc_time` VALUES ('263', '22:00:00', '22:04:30', '22:05:00', '97');
INSERT INTO `jiang_ssc_time` VALUES ('264', '22:05:00', '22:09:30', '22:10:00', '98');
INSERT INTO `jiang_ssc_time` VALUES ('265', '22:10:00', '22:14:30', '22:15:00', '99');
INSERT INTO `jiang_ssc_time` VALUES ('266', '22:15:00', '22:19:30', '22:20:00', '100');
INSERT INTO `jiang_ssc_time` VALUES ('267', '22:20:00', '22:24:30', '22:25:00', '101');
INSERT INTO `jiang_ssc_time` VALUES ('268', '22:25:00', '22:29:30', '22:30:00', '102');
INSERT INTO `jiang_ssc_time` VALUES ('269', '22:30:00', '22:34:30', '22:35:00', '103');
INSERT INTO `jiang_ssc_time` VALUES ('270', '22:35:00', '22:39:30', '22:40:00', '104');
INSERT INTO `jiang_ssc_time` VALUES ('271', '22:40:00', '22:44:30', '22:45:00', '105');
INSERT INTO `jiang_ssc_time` VALUES ('272', '22:45:00', '22:49:30', '22:50:00', '106');
INSERT INTO `jiang_ssc_time` VALUES ('273', '22:50:00', '22:54:30', '22:55:00', '107');
INSERT INTO `jiang_ssc_time` VALUES ('274', '22:55:00', '22:59:30', '23:00:00', '108');
INSERT INTO `jiang_ssc_time` VALUES ('275', '23:00:00', '23:04:30', '23:05:00', '109');
INSERT INTO `jiang_ssc_time` VALUES ('276', '23:05:00', '23:09:30', '23:10:00', '110');
INSERT INTO `jiang_ssc_time` VALUES ('277', '23:10:00', '23:14:30', '23:15:00', '111');
INSERT INTO `jiang_ssc_time` VALUES ('278', '23:15:00', '23:19:30', '23:20:00', '112');
INSERT INTO `jiang_ssc_time` VALUES ('279', '23:20:00', '23:24:30', '23:25:00', '113');
INSERT INTO `jiang_ssc_time` VALUES ('280', '23:25:00', '23:29:30', '23:30:00', '114');
INSERT INTO `jiang_ssc_time` VALUES ('281', '23:30:00', '23:34:30', '23:35:00', '115');
INSERT INTO `jiang_ssc_time` VALUES ('282', '23:35:00', '23:39:30', '23:40:00', '116');
INSERT INTO `jiang_ssc_time` VALUES ('283', '23:40:00', '23:44:30', '23:45:00', '117');
INSERT INTO `jiang_ssc_time` VALUES ('284', '23:45:00', '23:49:30', '23:50:00', '118');
INSERT INTO `jiang_ssc_time` VALUES ('285', '23:50:00', '23:54:30', '23:55:00', '119');
INSERT INTO `jiang_ssc_time` VALUES ('286', '23:55:00', '23:59:00', '00:00:00', '120');

-- ----------------------------
-- Table structure for jiang_ssl_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_ssl_code`;
CREATE TABLE `jiang_ssl_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_ssl_code
-- ----------------------------
INSERT INTO `jiang_ssl_code` VALUES ('1', '20160811-11', '*,*,5,3,2', '2016-08-11 15:32:09');

-- ----------------------------
-- Table structure for jiang_ssl_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_ssl_time`;
CREATE TABLE `jiang_ssl_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_ssl_time
-- ----------------------------
INSERT INTO `jiang_ssl_time` VALUES ('1', '00:00:00', '10:28:00', '10:30:30', '1');
INSERT INTO `jiang_ssl_time` VALUES ('2', '10:28:00', '10:58:00', '11:00:00', '2');
INSERT INTO `jiang_ssl_time` VALUES ('3', '10:58:00', '11:28:00', '11:30:00', '3');
INSERT INTO `jiang_ssl_time` VALUES ('4', '11:28:00', '11:58:00', '12:00:00', '4');
INSERT INTO `jiang_ssl_time` VALUES ('5', '11:58:00', '12:28:00', '12:30:00', '5');
INSERT INTO `jiang_ssl_time` VALUES ('6', '12:28:00', '12:58:00', '13:00:00', '6');
INSERT INTO `jiang_ssl_time` VALUES ('7', '12:58:00', '13:28:00', '13:30:00', '7');
INSERT INTO `jiang_ssl_time` VALUES ('8', '13:28:00', '13:58:00', '14:00:00', '8');
INSERT INTO `jiang_ssl_time` VALUES ('9', '13:58:00', '14:28:00', '14:30:00', '9');
INSERT INTO `jiang_ssl_time` VALUES ('10', '14:28:00', '14:58:00', '15:00:00', '10');
INSERT INTO `jiang_ssl_time` VALUES ('11', '14:58:00', '15:28:00', '15:30:00', '11');
INSERT INTO `jiang_ssl_time` VALUES ('12', '15:28:00', '15:58:00', '16:00:00', '12');
INSERT INTO `jiang_ssl_time` VALUES ('13', '15:58:00', '16:28:00', '16:30:00', '13');
INSERT INTO `jiang_ssl_time` VALUES ('14', '16:28:00', '16:58:00', '17:00:00', '14');
INSERT INTO `jiang_ssl_time` VALUES ('15', '16:58:00', '17:28:00', '17:30:00', '15');
INSERT INTO `jiang_ssl_time` VALUES ('16', '17:28:00', '17:58:00', '18:00:00', '16');
INSERT INTO `jiang_ssl_time` VALUES ('17', '17:58:00', '18:28:00', '18:30:00', '17');
INSERT INTO `jiang_ssl_time` VALUES ('18', '18:28:00', '18:58:00', '19:00:00', '18');
INSERT INTO `jiang_ssl_time` VALUES ('19', '18:58:00', '19:28:00', '19:30:00', '19');
INSERT INTO `jiang_ssl_time` VALUES ('20', '19:28:00', '19:58:00', '20:00:00', '20');
INSERT INTO `jiang_ssl_time` VALUES ('21', '19:58:00', '20:28:00', '20:30:00', '21');
INSERT INTO `jiang_ssl_time` VALUES ('22', '20:28:00', '20:58:00', '21:00:00', '22');
INSERT INTO `jiang_ssl_time` VALUES ('23', '20:58:00', '21:28:00', '21:30:00', '23');

-- ----------------------------
-- Table structure for jiang_user
-- ----------------------------
DROP TABLE IF EXISTS `jiang_user`;
CREATE TABLE `jiang_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `usertype` int(11) NOT NULL DEFAULT '0',
  `money` double(15,4) NOT NULL DEFAULT '0.0000',
  `bankname` varchar(20) DEFAULT NULL,
  `banknum` varchar(66) DEFAULT NULL,
  `realname` varchar(20) DEFAULT NULL,
  `province` varchar(15) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `lock` int(11) NOT NULL DEFAULT '0',
  `state` int(11) DEFAULT '1',
  `regfrom` varchar(500) NOT NULL,
  `logins` int(11) NOT NULL DEFAULT '0',
  `onlinetime` datetime DEFAULT NULL,
  `logmsg` varchar(150) DEFAULT NULL,
  `rate_1` float NOT NULL,
  `rate_2` float NOT NULL,
  `addtime` datetime NOT NULL,
  `userpwd` varchar(50) DEFAULT NULL,
  `userpwd2` varchar(45) DEFAULT NULL,
  `mode` varchar(45) DEFAULT NULL,
  `currentmode` varchar(45) DEFAULT NULL,
  `dzyhck` double(15,4) DEFAULT '0.0000',
  `dzyhcktime` datetime DEFAULT NULL,
  `isplay` int(11) DEFAULT '1',
  `regcount` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `regfrom` (`regfrom`(333)),
  KEY `onlinetime` (`onlinetime`)
) ENGINE=MyISAM AUTO_INCREMENT=67417 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_user
-- ----------------------------
INSERT INTO `jiang_user` VALUES ('1', 'admin', '管理员', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '1', '0.0000', 'admin', 'admin', 'admin', '0', '0', '', '1', '1', '', '579', '2015-10-18 19:37:15', '000', '15', '9', '2011-05-10 13:12:18', '202cb962ac59075b964b07152d234b70', '123', '1,1,1,1', '4', '0.0000', null, '1', '21447');
INSERT INTO `jiang_user` VALUES ('20611', 'abc123', '简单可依赖', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '0', '0.0000', '5555555555', '55555555555555555555', '5555555', null, null, '0090', '1', '1', '|admin|', '203', '2015-07-28 21:06:59', '000', '5', '0', '2013-04-24 18:40:34', 'dc483e80a7a0bd9ef71d8cf973673924', '123', '0,0,0,1', '4', '0.0000', null, '1', '11');

-- ----------------------------
-- Table structure for jiang_webconfig
-- ----------------------------
DROP TABLE IF EXISTS `jiang_webconfig`;
CREATE TABLE `jiang_webconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(20) NOT NULL,
  `maxbonus` varchar(20) NOT NULL,
  `minbonus` varchar(20) NOT NULL,
  `rateid` double NOT NULL,
  `ratemin` double NOT NULL,
  `ratemax` double NOT NULL,
  `tkcishu` int(11) NOT NULL DEFAULT '0',
  `tkstarttime` time DEFAULT NULL,
  `tkendtime` time DEFAULT NULL,
  `tkminmoney` double NOT NULL,
  `tkmaxmoney` double NOT NULL,
  `czstarttime` time DEFAULT NULL,
  `czendtime` time DEFAULT NULL,
  `czminmoney` int(11) DEFAULT NULL,
  `czmaxmoney` int(11) DEFAULT NULL,
  `tkinfo` varchar(200) DEFAULT NULL,
  `isopenwinauto` int(11) NOT NULL DEFAULT '1' COMMENT '是否自动开奖',
  `isbaobiao` int(11) NOT NULL DEFAULT '1' COMMENT '是否开启报表查询',
  `isreg` int(11) NOT NULL DEFAULT '1' COMMENT '是否开启推荐注册',
  `regrate` int(11) NOT NULL DEFAULT '0' COMMENT '推荐注册起始返点',
  `isopenweb` int(11) NOT NULL DEFAULT '1',
  `53kf` varchar(45) DEFAULT NULL,
  `sscsrc` int(11) DEFAULT '1',
  `merid` varchar(133) DEFAULT NULL,
  `merchantkey` varchar(133) DEFAULT NULL,
  `xscsrc` int(11) DEFAULT '1',
  `xjcsrc` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_webconfig
-- ----------------------------
INSERT INTO `jiang_webconfig` VALUES ('1', '金博瀚国际', '1980', '1800', '0.1', '0.5', '7.9', '0', '10:00:00', '23:00:00', '100', '5000000', '00:00:00', '24:00:00', '50', '5000000', '单笔取款最低100元,取款1-3分钟内到账，如高峰期取款5分钟内到账，,取款需要消费充值金额的10%，为避免误会，请遵守平台制度\r\n取款处理成功请查下您的银行帐号,未到账情况请联系平台客服!', '1', '1', '1', '5', '1', '', '1', '', '', '1', '2');

-- ----------------------------
-- Table structure for jiang_xjc_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_xjc_code`;
CREATE TABLE `jiang_xjc_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107987 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_xjc_code
-- ----------------------------
INSERT INTO `jiang_xjc_code` VALUES ('107708', '20160220-001', '0,6,1,0,3', '2016-02-20 10:10:17');
INSERT INTO `jiang_xjc_code` VALUES ('107709', '20160220-002', '3,1,8,5,5', '2016-02-20 10:20:18');
INSERT INTO `jiang_xjc_code` VALUES ('107710', '20160220-003', '5,0,8,3,7', '2016-02-20 10:30:18');
INSERT INTO `jiang_xjc_code` VALUES ('107711', '20160220-004', '0,6,7,2,6', '2016-02-20 10:40:18');
INSERT INTO `jiang_xjc_code` VALUES ('107712', '20160220-005', '4,5,8,4,0', '2016-02-20 10:50:18');
INSERT INTO `jiang_xjc_code` VALUES ('107713', '20160220-006', '1,9,9,5,8', '2016-02-20 11:00:18');
INSERT INTO `jiang_xjc_code` VALUES ('107714', '20160220-007', '6,1,7,6,2', '2016-02-20 11:10:18');
INSERT INTO `jiang_xjc_code` VALUES ('107715', '20160220-008', '2,5,0,4,4', '2016-02-20 11:20:48');
INSERT INTO `jiang_xjc_code` VALUES ('107716', '20160220-009', '3,1,5,1,8', '2016-02-20 11:30:48');
INSERT INTO `jiang_xjc_code` VALUES ('107717', '20160220-010', '8,0,5,2,2', '2016-02-20 11:40:19');
INSERT INTO `jiang_xjc_code` VALUES ('107718', '20160220-011', '5,8,7,2,8', '2016-02-20 11:50:48');
INSERT INTO `jiang_xjc_code` VALUES ('107719', '20160220-012', '9,5,6,0,6', '2016-02-20 12:00:48');
INSERT INTO `jiang_xjc_code` VALUES ('107720', '20160220-013', '5,1,0,5,7', '2016-02-20 12:10:52');
INSERT INTO `jiang_xjc_code` VALUES ('107721', '20160220-014', '1,5,4,4,1', '2016-02-20 12:20:48');
INSERT INTO `jiang_xjc_code` VALUES ('107722', '20160220-015', '9,2,4,5,0', '2016-02-20 12:30:48');
INSERT INTO `jiang_xjc_code` VALUES ('107723', '20160220-016', '7,7,0,6,7', '2016-02-20 12:40:48');
INSERT INTO `jiang_xjc_code` VALUES ('107724', '20160220-017', '8,8,3,4,1', '2016-02-20 12:50:52');
INSERT INTO `jiang_xjc_code` VALUES ('107725', '20160220-018', '6,9,3,2,1', '2016-02-20 13:00:48');
INSERT INTO `jiang_xjc_code` VALUES ('107726', '20160220-019', '0,7,3,1,3', '2016-02-20 13:10:51');
INSERT INTO `jiang_xjc_code` VALUES ('107727', '20160220-020', '9,5,1,4,5', '2016-02-20 13:20:48');
INSERT INTO `jiang_xjc_code` VALUES ('107728', '20160220-021', '1,4,5,5,6', '2016-02-20 13:30:49');
INSERT INTO `jiang_xjc_code` VALUES ('107729', '20160220-022', '5,3,1,4,1', '2016-02-20 13:40:48');
INSERT INTO `jiang_xjc_code` VALUES ('107730', '20160220-023', '0,9,4,8,9', '2016-02-20 13:50:48');
INSERT INTO `jiang_xjc_code` VALUES ('107731', '20160220-024', '4,0,5,7,4', '2016-02-20 14:00:51');
INSERT INTO `jiang_xjc_code` VALUES ('107732', '20160220-025', '1,2,6,0,9', '2016-02-20 14:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107733', '20160220-026', '0,9,1,4,8', '2016-02-20 14:20:18');
INSERT INTO `jiang_xjc_code` VALUES ('107734', '20160220-027', '2,1,1,8,3', '2016-02-20 14:30:19');
INSERT INTO `jiang_xjc_code` VALUES ('107735', '20160220-028', '6,5,2,8,0', '2016-02-20 14:40:18');
INSERT INTO `jiang_xjc_code` VALUES ('107736', '20160220-029', '4,7,8,6,9', '2016-02-20 14:50:18');
INSERT INTO `jiang_xjc_code` VALUES ('107737', '20160220-030', '4,2,9,4,7', '2016-02-20 15:00:19');
INSERT INTO `jiang_xjc_code` VALUES ('107738', '20160220-031', '5,5,0,8,7', '2016-02-20 15:10:18');
INSERT INTO `jiang_xjc_code` VALUES ('107739', '20160220-032', '7,9,0,3,2', '2016-02-20 15:20:18');
INSERT INTO `jiang_xjc_code` VALUES ('107740', '20160220-033', '0,2,4,9,1', '2016-02-20 15:30:18');
INSERT INTO `jiang_xjc_code` VALUES ('107741', '20160220-034', '8,3,3,6,6', '2016-02-20 15:40:25');
INSERT INTO `jiang_xjc_code` VALUES ('107742', '20160220-035', '2,0,0,8,3', '2016-02-20 15:50:21');
INSERT INTO `jiang_xjc_code` VALUES ('107743', '20160220-036', '6,4,5,7,4', '2016-02-20 16:00:18');
INSERT INTO `jiang_xjc_code` VALUES ('107744', '20160220-037', '7,1,8,9,2', '2016-02-20 16:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107745', '20160220-038', '2,2,8,0,8', '2016-02-20 16:20:18');
INSERT INTO `jiang_xjc_code` VALUES ('107746', '20160220-039', '0,3,1,8,6', '2016-02-20 16:30:23');
INSERT INTO `jiang_xjc_code` VALUES ('107747', '20160220-040', '4,8,2,2,9', '2016-02-20 16:40:19');
INSERT INTO `jiang_xjc_code` VALUES ('107748', '20160220-041', '6,1,0,8,9', '2016-02-20 16:50:19');
INSERT INTO `jiang_xjc_code` VALUES ('107749', '20160220-042', '7,6,7,0,3', '2016-02-20 17:00:18');
INSERT INTO `jiang_xjc_code` VALUES ('107750', '20160220-043', '1,0,8,6,2', '2016-02-20 17:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107751', '20160220-044', '3,9,6,9,7', '2016-02-20 17:20:26');
INSERT INTO `jiang_xjc_code` VALUES ('107752', '20160220-045', '1,5,7,7,7', '2016-02-20 17:30:21');
INSERT INTO `jiang_xjc_code` VALUES ('107753', '20160220-046', '5,1,9,0,0', '2016-02-20 17:40:18');
INSERT INTO `jiang_xjc_code` VALUES ('107754', '20160220-047', '2,0,8,5,3', '2016-02-20 17:50:18');
INSERT INTO `jiang_xjc_code` VALUES ('107755', '20160220-048', '0,3,0,4,0', '2016-02-20 18:00:18');
INSERT INTO `jiang_xjc_code` VALUES ('107756', '20160220-049', '6,1,7,5,4', '2016-02-20 18:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107757', '20160220-050', '9,5,6,2,0', '2016-02-20 18:20:48');
INSERT INTO `jiang_xjc_code` VALUES ('107758', '20160220-051', '1,1,2,7,2', '2016-02-20 18:30:48');
INSERT INTO `jiang_xjc_code` VALUES ('107759', '20160220-052', '8,5,0,0,9', '2016-02-20 18:40:49');
INSERT INTO `jiang_xjc_code` VALUES ('107760', '20160220-053', '4,7,9,3,4', '2016-02-20 18:50:49');
INSERT INTO `jiang_xjc_code` VALUES ('107761', '20160220-054', '5,4,2,9,2', '2016-02-20 19:00:21');
INSERT INTO `jiang_xjc_code` VALUES ('107762', '20160220-055', '9,5,3,3,6', '2016-02-20 19:10:22');
INSERT INTO `jiang_xjc_code` VALUES ('107763', '20160220-056', '1,5,5,9,3', '2016-02-20 19:20:22');
INSERT INTO `jiang_xjc_code` VALUES ('107764', '20160220-057', '5,4,3,2,1', '2016-02-20 19:30:51');
INSERT INTO `jiang_xjc_code` VALUES ('107765', '20160220-058', '1,8,7,4,6', '2016-02-20 19:40:25');
INSERT INTO `jiang_xjc_code` VALUES ('107766', '20160220-059', '2,7,6,9,0', '2016-02-20 19:50:51');
INSERT INTO `jiang_xjc_code` VALUES ('107767', '20160220-060', '4,8,0,7,8', '2016-02-20 20:00:27');
INSERT INTO `jiang_xjc_code` VALUES ('107768', '20160220-061', '6,9,8,8,2', '2016-02-20 20:10:28');
INSERT INTO `jiang_xjc_code` VALUES ('107769', '20160220-062', '9,4,9,7,0', '2016-02-20 20:20:27');
INSERT INTO `jiang_xjc_code` VALUES ('107770', '20160220-063', '4,4,9,5,4', '2016-02-20 20:30:55');
INSERT INTO `jiang_xjc_code` VALUES ('107771', '20160220-064', '0,9,5,6,8', '2016-02-20 20:40:52');
INSERT INTO `jiang_xjc_code` VALUES ('107772', '20160220-065', '6,6,5,6,1', '2016-02-20 20:50:52');
INSERT INTO `jiang_xjc_code` VALUES ('107773', '20160220-066', '8,3,5,3,5', '2016-02-20 21:00:52');
INSERT INTO `jiang_xjc_code` VALUES ('107774', '20160220-068', '7,3,7,4,0', '2016-02-20 21:20:30');
INSERT INTO `jiang_xjc_code` VALUES ('107775', '20160220-069', '9,1,4,2,2', '2016-02-20 21:30:22');
INSERT INTO `jiang_xjc_code` VALUES ('107776', '20160220-070', '6,6,4,0,8', '2016-02-20 21:40:30');
INSERT INTO `jiang_xjc_code` VALUES ('107777', '20160220-071', '8,8,4,5,6', '2016-02-20 21:50:32');
INSERT INTO `jiang_xjc_code` VALUES ('107778', '20160220-072', '7,5,2,8,2', '2016-02-20 22:00:32');
INSERT INTO `jiang_xjc_code` VALUES ('107779', '20160220-073', '0,7,6,2,3', '2016-02-20 22:10:31');
INSERT INTO `jiang_xjc_code` VALUES ('107780', '20160220-074', '1,5,1,0,3', '2016-02-20 22:20:31');
INSERT INTO `jiang_xjc_code` VALUES ('107781', '20160220-075', '9,7,2,8,5', '2016-02-20 22:30:31');
INSERT INTO `jiang_xjc_code` VALUES ('107782', '20160220-076', '5,0,8,4,8', '2016-02-20 22:40:33');
INSERT INTO `jiang_xjc_code` VALUES ('107783', '20160220-077', '5,3,8,8,4', '2016-02-20 22:50:32');
INSERT INTO `jiang_xjc_code` VALUES ('107784', '20160220-078', '5,7,1,4,3', '2016-02-20 23:00:14');
INSERT INTO `jiang_xjc_code` VALUES ('107785', '20160220-079', '2,2,5,0,5', '2016-02-20 23:10:43');
INSERT INTO `jiang_xjc_code` VALUES ('107786', '20160220-080', '9,9,9,6,0', '2016-02-20 23:20:50');
INSERT INTO `jiang_xjc_code` VALUES ('107787', '20160220-081', '9,7,8,2,3', '2016-02-20 23:30:46');
INSERT INTO `jiang_xjc_code` VALUES ('107788', '20160220-082', '3,6,5,4,6', '2016-02-20 23:40:42');
INSERT INTO `jiang_xjc_code` VALUES ('107789', '20160220-083', '9,3,0,9,6', '2016-02-20 23:50:17');
INSERT INTO `jiang_xjc_code` VALUES ('107790', '20160220-084', '3,7,9,8,6', '2016-02-21 00:00:44');
INSERT INTO `jiang_xjc_code` VALUES ('107791', '20160220-085', '3,9,6,7,2', '2016-02-21 00:10:42');
INSERT INTO `jiang_xjc_code` VALUES ('107792', '20160220-086', '5,1,1,7,6', '2016-02-21 00:20:42');
INSERT INTO `jiang_xjc_code` VALUES ('107793', '20160220-087', '8,8,6,4,3', '2016-02-21 00:30:45');
INSERT INTO `jiang_xjc_code` VALUES ('107794', '20160220-088', '7,7,1,6,8', '2016-02-21 00:40:42');
INSERT INTO `jiang_xjc_code` VALUES ('107795', '20160220-089', '8,7,1,0,5', '2016-02-21 00:50:42');
INSERT INTO `jiang_xjc_code` VALUES ('107796', '20160220-090', '4,7,2,7,9', '2016-02-21 01:00:42');
INSERT INTO `jiang_xjc_code` VALUES ('107797', '20160220-091', '2,4,8,7,0', '2016-02-21 01:10:45');
INSERT INTO `jiang_xjc_code` VALUES ('107798', '20160220-092', '2,1,4,3,2', '2016-02-21 01:20:43');
INSERT INTO `jiang_xjc_code` VALUES ('107799', '20160220-093', '8,1,8,7,9', '2016-02-21 01:30:43');
INSERT INTO `jiang_xjc_code` VALUES ('107800', '20160220-094', '5,0,3,9,3', '2016-02-21 01:40:43');
INSERT INTO `jiang_xjc_code` VALUES ('107801', '20160220-095', '3,2,0,8,5', '2016-02-21 01:50:43');
INSERT INTO `jiang_xjc_code` VALUES ('107802', '20160220-096', '8,9,0,7,9', '2016-02-21 02:00:43');
INSERT INTO `jiang_xjc_code` VALUES ('107803', '20160221-001', '4,1,7,5,9', '2016-02-21 10:10:15');
INSERT INTO `jiang_xjc_code` VALUES ('107804', '20160221-002', '7,5,4,3,7', '2016-02-21 10:20:14');
INSERT INTO `jiang_xjc_code` VALUES ('107805', '20160221-003', '4,7,8,0,8', '2016-02-21 10:30:17');
INSERT INTO `jiang_xjc_code` VALUES ('107806', '20160221-012', '5,1,4,6,8', '2016-02-21 12:05:15');
INSERT INTO `jiang_xjc_code` VALUES ('107807', '20160221-013', '0,5,9,6,1', '2016-02-21 12:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107808', '20160221-014', '8,9,1,2,7', '2016-02-21 12:20:44');
INSERT INTO `jiang_xjc_code` VALUES ('107809', '20160221-015', '7,0,7,8,9', '2016-02-21 12:30:16');
INSERT INTO `jiang_xjc_code` VALUES ('107810', '20160221-016', '0,8,1,5,8', '2016-02-21 12:40:44');
INSERT INTO `jiang_xjc_code` VALUES ('107811', '20160221-017', '2,4,3,0,8', '2016-02-21 12:50:44');
INSERT INTO `jiang_xjc_code` VALUES ('107812', '20160221-018', '2,8,2,1,6', '2016-02-21 13:00:44');
INSERT INTO `jiang_xjc_code` VALUES ('107813', '20160221-019', '6,4,5,1,4', '2016-02-21 13:10:47');
INSERT INTO `jiang_xjc_code` VALUES ('107814', '20160221-020', '5,6,2,8,8', '2016-02-21 13:20:44');
INSERT INTO `jiang_xjc_code` VALUES ('107815', '20160221-021', '4,3,8,1,8', '2016-02-21 13:30:44');
INSERT INTO `jiang_xjc_code` VALUES ('107816', '20160221-022', '2,8,4,7,8', '2016-02-21 13:40:44');
INSERT INTO `jiang_xjc_code` VALUES ('107817', '20160221-023', '4,3,2,4,4', '2016-02-21 13:50:44');
INSERT INTO `jiang_xjc_code` VALUES ('107818', '20160221-024', '4,7,1,4,3', '2016-02-21 14:00:44');
INSERT INTO `jiang_xjc_code` VALUES ('107819', '20160221-025', '3,5,6,7,4', '2016-02-21 14:10:46');
INSERT INTO `jiang_xjc_code` VALUES ('107820', '20160221-026', '2,6,9,5,5', '2016-02-21 14:20:45');
INSERT INTO `jiang_xjc_code` VALUES ('107821', '20160221-027', '9,6,2,7,8', '2016-02-21 14:30:45');
INSERT INTO `jiang_xjc_code` VALUES ('107822', '20160221-028', '9,3,6,0,4', '2016-02-21 14:40:47');
INSERT INTO `jiang_xjc_code` VALUES ('107823', '20160221-029', '5,4,2,3,2', '2016-02-21 14:50:45');
INSERT INTO `jiang_xjc_code` VALUES ('107824', '20160221-030', '8,0,8,5,7', '2016-02-21 15:00:45');
INSERT INTO `jiang_xjc_code` VALUES ('107825', '20160221-031', '2,6,9,4,4', '2016-02-21 15:10:45');
INSERT INTO `jiang_xjc_code` VALUES ('107826', '20160221-032', '3,5,9,7,7', '2016-02-21 15:20:45');
INSERT INTO `jiang_xjc_code` VALUES ('107827', '20160221-033', '8,9,7,1,2', '2016-02-21 15:30:45');
INSERT INTO `jiang_xjc_code` VALUES ('107828', '20160221-034', '0,7,2,3,4', '2016-02-21 15:40:45');
INSERT INTO `jiang_xjc_code` VALUES ('107829', '20160221-035', '8,1,2,3,8', '2016-02-21 15:50:45');
INSERT INTO `jiang_xjc_code` VALUES ('107830', '20160221-036', '8,8,5,1,7', '2016-02-21 16:00:45');
INSERT INTO `jiang_xjc_code` VALUES ('107831', '20160221-037', '2,9,1,6,2', '2016-02-21 16:10:45');
INSERT INTO `jiang_xjc_code` VALUES ('107832', '20160221-038', '9,7,9,1,8', '2016-02-21 16:20:45');
INSERT INTO `jiang_xjc_code` VALUES ('107833', '20160221-039', '6,2,8,6,7', '2016-02-21 16:30:45');
INSERT INTO `jiang_xjc_code` VALUES ('107834', '20160221-040', '8,2,9,9,8', '2016-02-21 16:40:45');
INSERT INTO `jiang_xjc_code` VALUES ('107835', '20160221-041', '0,1,6,7,2', '2016-02-21 16:50:45');
INSERT INTO `jiang_xjc_code` VALUES ('107836', '20160221-042', '3,5,7,2,6', '2016-02-21 17:00:45');
INSERT INTO `jiang_xjc_code` VALUES ('107837', '20160221-043', '9,9,2,8,4', '2016-02-21 17:10:45');
INSERT INTO `jiang_xjc_code` VALUES ('107838', '20160221-044', '3,1,7,2,2', '2016-02-21 17:20:46');
INSERT INTO `jiang_xjc_code` VALUES ('107839', '20160221-045', '8,5,7,8,7', '2016-02-21 17:30:45');
INSERT INTO `jiang_xjc_code` VALUES ('107840', '20160221-046', '7,7,0,0,1', '2016-02-21 17:40:45');
INSERT INTO `jiang_xjc_code` VALUES ('107841', '20160221-047', '1,5,1,7,0', '2016-02-21 17:50:45');
INSERT INTO `jiang_xjc_code` VALUES ('107842', '20160221-048', '3,4,4,3,0', '2016-02-21 18:00:45');
INSERT INTO `jiang_xjc_code` VALUES ('107843', '20160221-049', '1,7,6,5,7', '2016-02-21 18:10:48');
INSERT INTO `jiang_xjc_code` VALUES ('107844', '20160221-050', '3,6,4,4,6', '2016-02-21 18:20:45');
INSERT INTO `jiang_xjc_code` VALUES ('107845', '20160221-051', '3,4,4,4,8', '2016-02-21 18:30:49');
INSERT INTO `jiang_xjc_code` VALUES ('107846', '20160221-052', '8,3,8,1,3', '2016-02-21 18:40:45');
INSERT INTO `jiang_xjc_code` VALUES ('107847', '20160221-053', '1,1,4,6,8', '2016-02-21 18:50:45');
INSERT INTO `jiang_xjc_code` VALUES ('107848', '20160221-054', '5,1,2,9,4', '2016-02-21 19:00:15');
INSERT INTO `jiang_xjc_code` VALUES ('107849', '20160221-055', '4,6,6,9,4', '2016-02-21 19:10:15');
INSERT INTO `jiang_xjc_code` VALUES ('107850', '20160221-056', '1,6,0,9,8', '2016-02-21 19:20:15');
INSERT INTO `jiang_xjc_code` VALUES ('107851', '20160221-057', '8,7,2,4,3', '2016-02-21 19:30:15');
INSERT INTO `jiang_xjc_code` VALUES ('107852', '20160221-058', '2,9,4,9,0', '2016-02-21 19:40:15');
INSERT INTO `jiang_xjc_code` VALUES ('107853', '20160221-059', '5,9,4,5,0', '2016-02-21 19:50:15');
INSERT INTO `jiang_xjc_code` VALUES ('107854', '20160221-060', '2,7,5,8,8', '2016-02-21 20:00:15');
INSERT INTO `jiang_xjc_code` VALUES ('107855', '20160221-061', '7,7,1,6,2', '2016-02-21 20:10:15');
INSERT INTO `jiang_xjc_code` VALUES ('107856', '20160221-062', '2,5,0,1,4', '2016-02-21 20:20:15');
INSERT INTO `jiang_xjc_code` VALUES ('107857', '20160221-063', '7,4,1,2,7', '2016-02-21 20:30:16');
INSERT INTO `jiang_xjc_code` VALUES ('107858', '20160221-064', '8,7,7,4,2', '2016-02-21 20:40:16');
INSERT INTO `jiang_xjc_code` VALUES ('107859', '20160221-065', '7,4,9,0,3', '2016-02-21 20:50:16');
INSERT INTO `jiang_xjc_code` VALUES ('107860', '20160221-066', '1,9,1,4,2', '2016-02-21 21:00:16');
INSERT INTO `jiang_xjc_code` VALUES ('107861', '20160221-067', '5,6,6,9,2', '2016-02-21 21:10:16');
INSERT INTO `jiang_xjc_code` VALUES ('107862', '20160221-068', '1,6,3,7,9', '2016-02-21 21:20:16');
INSERT INTO `jiang_xjc_code` VALUES ('107863', '20160221-069', '5,8,1,4,2', '2016-02-21 21:30:16');
INSERT INTO `jiang_xjc_code` VALUES ('107864', '20160221-070', '0,5,9,3,6', '2016-02-21 21:40:16');
INSERT INTO `jiang_xjc_code` VALUES ('107865', '20160221-071', '0,2,5,2,5', '2016-02-21 21:50:16');
INSERT INTO `jiang_xjc_code` VALUES ('107866', '20160221-072', '4,4,7,7,3', '2016-02-21 22:00:16');
INSERT INTO `jiang_xjc_code` VALUES ('107867', '20160221-073', '8,4,0,5,1', '2016-02-21 22:10:16');
INSERT INTO `jiang_xjc_code` VALUES ('107868', '20160221-074', '5,8,4,2,9', '2016-02-21 22:20:16');
INSERT INTO `jiang_xjc_code` VALUES ('107869', '20160221-075', '8,8,4,3,6', '2016-02-21 22:30:16');
INSERT INTO `jiang_xjc_code` VALUES ('107870', '20160221-076', '0,2,1,1,8', '2016-02-21 22:40:16');
INSERT INTO `jiang_xjc_code` VALUES ('107871', '20160221-077', '7,3,1,3,5', '2016-02-21 22:50:16');
INSERT INTO `jiang_xjc_code` VALUES ('107872', '20160221-078', '0,1,3,3,7', '2016-02-21 23:00:46');
INSERT INTO `jiang_xjc_code` VALUES ('107873', '20160221-079', '3,7,1,5,5', '2016-02-21 23:10:46');
INSERT INTO `jiang_xjc_code` VALUES ('107874', '20160221-080', '2,6,0,1,9', '2016-02-21 23:20:46');
INSERT INTO `jiang_xjc_code` VALUES ('107875', '20160221-081', '3,1,1,9,8', '2016-02-21 23:30:46');
INSERT INTO `jiang_xjc_code` VALUES ('107876', '20160221-082', '8,0,0,0,0', '2016-02-21 23:40:47');
INSERT INTO `jiang_xjc_code` VALUES ('107877', '20160221-083', '9,1,7,1,8', '2016-02-21 23:50:46');
INSERT INTO `jiang_xjc_code` VALUES ('107878', '20160221-084', '2,9,2,5,6', '2016-02-22 00:00:46');
INSERT INTO `jiang_xjc_code` VALUES ('107879', '20160221-085', '4,0,1,7,7', '2016-02-22 00:10:46');
INSERT INTO `jiang_xjc_code` VALUES ('107880', '20160221-086', '4,5,0,3,5', '2016-02-22 00:20:46');
INSERT INTO `jiang_xjc_code` VALUES ('107881', '20160221-087', '9,2,9,1,5', '2016-02-22 00:30:46');
INSERT INTO `jiang_xjc_code` VALUES ('107882', '20160221-088', '4,3,8,2,3', '2016-02-22 00:40:46');
INSERT INTO `jiang_xjc_code` VALUES ('107883', '20160221-089', '3,0,7,8,0', '2016-02-22 00:50:46');
INSERT INTO `jiang_xjc_code` VALUES ('107884', '20160221-090', '2,9,0,6,0', '2016-02-22 01:00:46');
INSERT INTO `jiang_xjc_code` VALUES ('107885', '20160221-091', '4,4,8,2,7', '2016-02-22 01:10:46');
INSERT INTO `jiang_xjc_code` VALUES ('107886', '20160221-092', '3,7,2,6,2', '2016-02-22 01:25:17');
INSERT INTO `jiang_xjc_code` VALUES ('107887', '20160221-093', '0,0,6,9,3', '2016-02-22 01:30:48');
INSERT INTO `jiang_xjc_code` VALUES ('107888', '20160221-094', '3,5,9,9,7', '2016-02-22 01:40:46');
INSERT INTO `jiang_xjc_code` VALUES ('107889', '20160221-095', '3,4,9,3,1', '2016-02-22 01:50:49');
INSERT INTO `jiang_xjc_code` VALUES ('107890', '20160221-096', '2,2,4,1,0', '2016-02-22 02:00:46');
INSERT INTO `jiang_xjc_code` VALUES ('107891', '20160222-001', '8,2,5,1,9', '2016-02-22 10:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107892', '20160222-002', '0,3,6,8,3', '2016-02-22 10:20:19');
INSERT INTO `jiang_xjc_code` VALUES ('107893', '20160222-003', '8,7,1,9,5', '2016-02-22 10:30:19');
INSERT INTO `jiang_xjc_code` VALUES ('107894', '20160222-004', '6,6,5,3,5', '2016-02-22 10:40:24');
INSERT INTO `jiang_xjc_code` VALUES ('107895', '20160222-005', '5,1,9,4,0', '2016-02-22 10:50:19');
INSERT INTO `jiang_xjc_code` VALUES ('107896', '20160222-006', '0,0,8,3,1', '2016-02-22 11:00:19');
INSERT INTO `jiang_xjc_code` VALUES ('107897', '20160222-007', '6,4,3,6,2', '2016-02-22 11:10:19');
INSERT INTO `jiang_xjc_code` VALUES ('107898', '20160222-008', '9,7,2,5,1', '2016-02-22 11:20:19');
INSERT INTO `jiang_xjc_code` VALUES ('107899', '20160222-009', '0,2,5,5,1', '2016-02-22 11:30:26');
INSERT INTO `jiang_xjc_code` VALUES ('107900', '20160222-010', '4,7,8,4,6', '2016-02-22 11:40:26');
INSERT INTO `jiang_xjc_code` VALUES ('107901', '20160222-011', '5,1,0,0,4', '2016-02-22 11:50:26');
INSERT INTO `jiang_xjc_code` VALUES ('107902', '20160222-012', '4,1,8,5,5', '2016-02-22 12:00:27');
INSERT INTO `jiang_xjc_code` VALUES ('107903', '20160222-013', '9,9,9,3,1', '2016-02-22 12:10:26');
INSERT INTO `jiang_xjc_code` VALUES ('107904', '20160222-014', '3,1,5,1,4', '2016-02-22 12:20:26');
INSERT INTO `jiang_xjc_code` VALUES ('107905', '20160222-015', '2,5,6,6,2', '2016-02-22 12:30:26');
INSERT INTO `jiang_xjc_code` VALUES ('107906', '20160222-016', '2,2,7,0,2', '2016-02-22 12:40:30');
INSERT INTO `jiang_xjc_code` VALUES ('107907', '20160222-017', '4,8,5,1,3', '2016-02-22 12:50:26');
INSERT INTO `jiang_xjc_code` VALUES ('107908', '20160222-018', '3,9,7,4,9', '2016-02-22 13:00:26');
INSERT INTO `jiang_xjc_code` VALUES ('107909', '20160222-019', '1,1,8,6,6', '2016-02-22 13:10:27');
INSERT INTO `jiang_xjc_code` VALUES ('107910', '20160222-020', '5,3,1,2,3', '2016-02-22 13:20:26');
INSERT INTO `jiang_xjc_code` VALUES ('107911', '20160222-021', '8,1,6,3,7', '2016-02-22 13:30:26');
INSERT INTO `jiang_xjc_code` VALUES ('107912', '20160222-022', '1,1,2,4,3', '2016-02-22 13:40:26');
INSERT INTO `jiang_xjc_code` VALUES ('107913', '20160222-023', '1,5,7,7,2', '2016-02-22 13:50:27');
INSERT INTO `jiang_xjc_code` VALUES ('107914', '20160222-024', '2,2,8,7,2', '2016-02-22 14:00:26');
INSERT INTO `jiang_xjc_code` VALUES ('107915', '20160222-025', '0,7,1,7,4', '2016-02-22 14:10:26');
INSERT INTO `jiang_xjc_code` VALUES ('107916', '20160222-026', '6,2,0,4,6', '2016-02-22 14:20:27');
INSERT INTO `jiang_xjc_code` VALUES ('107917', '20160222-027', '0,3,8,5,8', '2016-02-22 14:30:27');
INSERT INTO `jiang_xjc_code` VALUES ('107918', '20160222-028', '5,3,6,8,9', '2016-02-22 14:40:33');
INSERT INTO `jiang_xjc_code` VALUES ('107919', '20160222-029', '3,6,9,2,0', '2016-02-22 14:50:27');
INSERT INTO `jiang_xjc_code` VALUES ('107920', '20160222-030', '5,7,0,7,2', '2016-02-22 15:00:27');
INSERT INTO `jiang_xjc_code` VALUES ('107921', '20160222-031', '0,3,7,5,5', '2016-02-22 15:10:27');
INSERT INTO `jiang_xjc_code` VALUES ('107922', '20160222-032', '0,0,4,2,5', '2016-02-22 15:20:27');
INSERT INTO `jiang_xjc_code` VALUES ('107923', '20160222-033', '3,4,7,7,7', '2016-02-22 15:30:27');
INSERT INTO `jiang_xjc_code` VALUES ('107924', '20160222-034', '9,6,7,1,4', '2016-02-22 15:40:28');
INSERT INTO `jiang_xjc_code` VALUES ('107925', '20160222-035', '8,5,2,0,2', '2016-02-22 15:50:36');
INSERT INTO `jiang_xjc_code` VALUES ('107926', '20160222-036', '4,7,5,1,6', '2016-02-22 16:00:37');
INSERT INTO `jiang_xjc_code` VALUES ('107927', '20160222-037', '4,9,4,3,7', '2016-02-22 16:10:32');
INSERT INTO `jiang_xjc_code` VALUES ('107928', '20160222-038', '7,4,6,9,0', '2016-02-22 16:20:32');
INSERT INTO `jiang_xjc_code` VALUES ('107929', '20160222-039', '6,1,0,0,6', '2016-02-22 16:30:32');
INSERT INTO `jiang_xjc_code` VALUES ('107930', '20160222-040', '8,9,0,5,2', '2016-02-22 16:40:32');
INSERT INTO `jiang_xjc_code` VALUES ('107931', '20160222-041', '7,9,6,6,9', '2016-02-22 16:50:33');
INSERT INTO `jiang_xjc_code` VALUES ('107932', '20160222-042', '5,0,6,6,3', '2016-02-22 17:00:33');
INSERT INTO `jiang_xjc_code` VALUES ('107933', '20160222-043', '3,8,4,3,2', '2016-02-22 17:10:33');
INSERT INTO `jiang_xjc_code` VALUES ('107934', '20160222-044', '3,4,6,6,4', '2016-02-22 17:20:35');
INSERT INTO `jiang_xjc_code` VALUES ('107935', '20160222-045', '3,7,5,4,5', '2016-02-22 17:30:33');
INSERT INTO `jiang_xjc_code` VALUES ('107936', '20160222-046', '7,9,1,3,3', '2016-02-22 17:40:33');
INSERT INTO `jiang_xjc_code` VALUES ('107937', '20160222-047', '8,0,4,3,2', '2016-02-22 17:50:33');
INSERT INTO `jiang_xjc_code` VALUES ('107938', '20160222-048', '5,1,2,7,1', '2016-02-22 18:00:33');
INSERT INTO `jiang_xjc_code` VALUES ('107939', '20160222-049', '3,4,5,7,9', '2016-02-22 18:10:51');
INSERT INTO `jiang_xjc_code` VALUES ('107940', '20160222-050', '5,6,7,8,5', '2016-02-22 18:20:50');
INSERT INTO `jiang_xjc_code` VALUES ('107941', '20160222-051', '5,6,7,3,3', '2016-02-22 18:30:50');
INSERT INTO `jiang_xjc_code` VALUES ('107942', '20160222-052', '2,2,6,6,2', '2016-02-22 18:40:50');
INSERT INTO `jiang_xjc_code` VALUES ('107943', '20160222-053', '4,7,4,7,7', '2016-02-22 18:50:51');
INSERT INTO `jiang_xjc_code` VALUES ('107944', '20160222-054', '9,9,8,2,1', '2016-02-22 19:00:51');
INSERT INTO `jiang_xjc_code` VALUES ('107945', '20160222-055', '3,4,4,4,8', '2016-02-22 19:10:51');
INSERT INTO `jiang_xjc_code` VALUES ('107946', '20160222-056', '2,2,2,2,1', '2016-02-22 19:20:25');
INSERT INTO `jiang_xjc_code` VALUES ('107947', '20160222-057', '8,0,6,2,3', '2016-02-22 19:30:21');
INSERT INTO `jiang_xjc_code` VALUES ('107948', '20160222-058', '6,4,8,7,3', '2016-02-22 19:40:51');
INSERT INTO `jiang_xjc_code` VALUES ('107949', '20160222-059', '4,2,4,8,9', '2016-02-22 19:50:51');
INSERT INTO `jiang_xjc_code` VALUES ('107950', '20160222-060', '5,3,2,8,2', '2016-02-22 20:00:51');
INSERT INTO `jiang_xjc_code` VALUES ('107951', '20160222-061', '0,8,4,0,7', '2016-02-22 20:10:51');
INSERT INTO `jiang_xjc_code` VALUES ('107952', '20160222-062', '0,9,1,5,4', '2016-02-22 20:20:51');
INSERT INTO `jiang_xjc_code` VALUES ('107953', '20160222-063', '9,5,9,2,1', '2016-02-22 20:30:51');
INSERT INTO `jiang_xjc_code` VALUES ('107954', '20160222-064', '9,8,7,1,8', '2016-02-22 20:40:51');
INSERT INTO `jiang_xjc_code` VALUES ('107955', '20160222-065', '5,2,3,4,9', '2016-02-22 20:50:51');
INSERT INTO `jiang_xjc_code` VALUES ('107956', '20160222-066', '5,2,0,7,4', '2016-02-22 21:00:52');
INSERT INTO `jiang_xjc_code` VALUES ('107957', '20160222-067', '2,2,4,2,7', '2016-02-22 21:10:51');
INSERT INTO `jiang_xjc_code` VALUES ('107958', '20160222-068', '1,4,9,5,7', '2016-02-22 21:20:22');
INSERT INTO `jiang_xjc_code` VALUES ('107959', '20160222-069', '3,5,9,3,7', '2016-02-22 21:30:21');
INSERT INTO `jiang_xjc_code` VALUES ('107960', '20160222-070', '0,6,7,6,9', '2016-02-22 21:40:22');
INSERT INTO `jiang_xjc_code` VALUES ('107961', '20160222-071', '8,1,5,5,4', '2016-02-22 21:50:22');
INSERT INTO `jiang_xjc_code` VALUES ('107962', '20160222-072', '4,5,1,7,2', '2016-02-22 22:00:21');
INSERT INTO `jiang_xjc_code` VALUES ('107963', '20160222-073', '2,5,3,4,6', '2016-02-22 22:10:21');
INSERT INTO `jiang_xjc_code` VALUES ('107964', '20160222-074', '9,9,7,2,3', '2016-02-22 22:20:21');
INSERT INTO `jiang_xjc_code` VALUES ('107965', '20160222-075', '8,7,4,7,6', '2016-02-22 22:30:21');
INSERT INTO `jiang_xjc_code` VALUES ('107966', '20160222-076', '6,6,9,0,6', '2016-02-22 22:40:52');
INSERT INTO `jiang_xjc_code` VALUES ('107967', '20160222-077', '2,1,5,5,5', '2016-02-22 22:50:22');
INSERT INTO `jiang_xjc_code` VALUES ('107968', '20160222-078', '0,6,4,7,9', '2016-02-22 23:00:22');
INSERT INTO `jiang_xjc_code` VALUES ('107969', '20160222-079', '6,2,9,6,6', '2016-02-22 23:10:22');
INSERT INTO `jiang_xjc_code` VALUES ('107970', '20160222-080', '4,2,5,9,7', '2016-02-22 23:20:22');
INSERT INTO `jiang_xjc_code` VALUES ('107971', '20160222-081', '4,6,3,5,2', '2016-02-22 23:30:22');
INSERT INTO `jiang_xjc_code` VALUES ('107972', '20160222-082', '9,9,4,0,9', '2016-02-22 23:40:22');
INSERT INTO `jiang_xjc_code` VALUES ('107973', '20160222-083', '3,9,8,8,6', '2016-02-22 23:50:22');
INSERT INTO `jiang_xjc_code` VALUES ('107974', '20160222-084', '5,0,7,7,8', '2016-02-23 00:00:53');
INSERT INTO `jiang_xjc_code` VALUES ('107975', '20160222-085', '7,5,0,1,5', '2016-02-23 00:10:22');
INSERT INTO `jiang_xjc_code` VALUES ('107976', '20160222-086', '3,5,2,3,3', '2016-02-23 00:20:22');
INSERT INTO `jiang_xjc_code` VALUES ('107977', '20160222-087', '0,9,6,2,7', '2016-02-23 00:30:22');
INSERT INTO `jiang_xjc_code` VALUES ('107978', '20160222-088', '2,2,9,6,7', '2016-02-23 00:40:22');
INSERT INTO `jiang_xjc_code` VALUES ('107979', '20160222-089', '0,3,4,3,0', '2016-02-23 00:50:22');
INSERT INTO `jiang_xjc_code` VALUES ('107980', '20160222-090', '9,9,0,7,0', '2016-02-23 01:00:22');
INSERT INTO `jiang_xjc_code` VALUES ('107981', '20160222-091', '1,7,0,3,6', '2016-02-23 01:10:22');
INSERT INTO `jiang_xjc_code` VALUES ('107982', '20160222-092', '2,2,6,7,4', '2016-02-23 01:20:22');
INSERT INTO `jiang_xjc_code` VALUES ('107983', '20160222-093', '7,1,4,2,8', '2016-02-23 01:30:22');
INSERT INTO `jiang_xjc_code` VALUES ('107984', '20160222-094', '6,5,2,0,8', '2016-02-23 01:40:46');
INSERT INTO `jiang_xjc_code` VALUES ('107985', '20160222-095', '9,6,7,5,5', '2016-02-23 01:50:21');
INSERT INTO `jiang_xjc_code` VALUES ('107986', '20160222-096', '6,8,8,4,9', '2016-02-23 02:00:16');

-- ----------------------------
-- Table structure for jiang_xjc_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_xjc_time`;
CREATE TABLE `jiang_xjc_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=655 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_xjc_time
-- ----------------------------
INSERT INTO `jiang_xjc_time` VALUES ('1', '01:59:00', '10:08:00', '10:10:00', '1');
INSERT INTO `jiang_xjc_time` VALUES ('560', '10:08:00', '10:18:00', '10:20:00', '2');
INSERT INTO `jiang_xjc_time` VALUES ('561', '10:18:00', '10:28:00', '10:30:00', '3');
INSERT INTO `jiang_xjc_time` VALUES ('562', '10:28:00', '10:38:00', '10:40:00', '4');
INSERT INTO `jiang_xjc_time` VALUES ('563', '10:38:00', '10:48:00', '10:50:00', '5');
INSERT INTO `jiang_xjc_time` VALUES ('564', '10:48:00', '10:58:00', '11:00:00', '6');
INSERT INTO `jiang_xjc_time` VALUES ('565', '10:58:00', '11:08:00', '11:10:00', '7');
INSERT INTO `jiang_xjc_time` VALUES ('566', '11:08:00', '11:18:00', '11:20:00', '8');
INSERT INTO `jiang_xjc_time` VALUES ('567', '11:18:00', '11:28:00', '11:30:00', '9');
INSERT INTO `jiang_xjc_time` VALUES ('568', '11:28:00', '11:38:00', '11:40:00', '10');
INSERT INTO `jiang_xjc_time` VALUES ('569', '11:38:00', '11:48:00', '11:50:00', '11');
INSERT INTO `jiang_xjc_time` VALUES ('570', '11:48:00', '11:58:00', '12:00:00', '12');
INSERT INTO `jiang_xjc_time` VALUES ('571', '11:58:00', '12:08:00', '12:10:00', '13');
INSERT INTO `jiang_xjc_time` VALUES ('572', '12:08:00', '12:18:00', '12:20:00', '14');
INSERT INTO `jiang_xjc_time` VALUES ('573', '12:18:00', '12:28:00', '12:30:00', '15');
INSERT INTO `jiang_xjc_time` VALUES ('574', '12:28:00', '12:38:00', '12:40:00', '16');
INSERT INTO `jiang_xjc_time` VALUES ('575', '12:38:00', '12:48:00', '12:50:00', '17');
INSERT INTO `jiang_xjc_time` VALUES ('576', '12:48:00', '12:58:00', '13:00:00', '18');
INSERT INTO `jiang_xjc_time` VALUES ('577', '12:58:00', '13:08:00', '13:10:00', '19');
INSERT INTO `jiang_xjc_time` VALUES ('578', '13:08:00', '13:18:00', '13:20:00', '20');
INSERT INTO `jiang_xjc_time` VALUES ('579', '13:18:00', '13:28:00', '13:30:00', '21');
INSERT INTO `jiang_xjc_time` VALUES ('580', '13:28:00', '13:38:00', '13:40:00', '22');
INSERT INTO `jiang_xjc_time` VALUES ('581', '13:38:00', '13:48:00', '13:50:00', '23');
INSERT INTO `jiang_xjc_time` VALUES ('582', '13:48:00', '13:58:00', '14:00:00', '24');
INSERT INTO `jiang_xjc_time` VALUES ('583', '13:58:00', '14:08:00', '14:10:00', '25');
INSERT INTO `jiang_xjc_time` VALUES ('584', '14:08:00', '14:18:00', '14:20:00', '26');
INSERT INTO `jiang_xjc_time` VALUES ('585', '14:18:00', '14:28:00', '14:30:00', '27');
INSERT INTO `jiang_xjc_time` VALUES ('586', '14:28:00', '14:38:00', '14:40:00', '28');
INSERT INTO `jiang_xjc_time` VALUES ('587', '14:38:00', '14:48:00', '14:50:00', '29');
INSERT INTO `jiang_xjc_time` VALUES ('588', '14:48:00', '14:58:00', '15:00:00', '30');
INSERT INTO `jiang_xjc_time` VALUES ('589', '14:58:00', '15:08:00', '15:10:00', '31');
INSERT INTO `jiang_xjc_time` VALUES ('590', '15:08:00', '15:18:00', '15:20:00', '32');
INSERT INTO `jiang_xjc_time` VALUES ('591', '15:18:00', '15:28:00', '15:30:00', '33');
INSERT INTO `jiang_xjc_time` VALUES ('592', '15:28:00', '15:38:00', '15:40:00', '34');
INSERT INTO `jiang_xjc_time` VALUES ('593', '15:38:00', '15:48:00', '15:50:00', '35');
INSERT INTO `jiang_xjc_time` VALUES ('594', '15:48:00', '15:58:00', '16:00:00', '36');
INSERT INTO `jiang_xjc_time` VALUES ('595', '15:58:00', '16:08:00', '16:10:00', '37');
INSERT INTO `jiang_xjc_time` VALUES ('596', '16:08:00', '16:18:00', '16:20:00', '38');
INSERT INTO `jiang_xjc_time` VALUES ('597', '16:18:00', '16:28:00', '16:30:00', '39');
INSERT INTO `jiang_xjc_time` VALUES ('598', '16:28:00', '16:38:00', '16:40:00', '40');
INSERT INTO `jiang_xjc_time` VALUES ('599', '16:38:00', '16:48:00', '16:50:00', '41');
INSERT INTO `jiang_xjc_time` VALUES ('600', '16:48:00', '16:58:00', '17:00:00', '42');
INSERT INTO `jiang_xjc_time` VALUES ('601', '16:58:00', '17:08:00', '17:10:00', '43');
INSERT INTO `jiang_xjc_time` VALUES ('602', '17:08:00', '17:18:00', '17:20:00', '44');
INSERT INTO `jiang_xjc_time` VALUES ('603', '17:18:00', '17:28:00', '17:30:00', '45');
INSERT INTO `jiang_xjc_time` VALUES ('604', '17:28:00', '17:38:00', '17:40:00', '46');
INSERT INTO `jiang_xjc_time` VALUES ('605', '17:38:00', '17:48:00', '17:50:00', '47');
INSERT INTO `jiang_xjc_time` VALUES ('606', '17:48:00', '17:58:00', '18:00:00', '48');
INSERT INTO `jiang_xjc_time` VALUES ('607', '17:58:00', '18:08:00', '18:10:00', '49');
INSERT INTO `jiang_xjc_time` VALUES ('608', '18:08:00', '18:18:00', '18:20:00', '50');
INSERT INTO `jiang_xjc_time` VALUES ('609', '18:18:00', '18:28:00', '18:30:00', '51');
INSERT INTO `jiang_xjc_time` VALUES ('610', '18:28:00', '18:38:00', '18:40:00', '52');
INSERT INTO `jiang_xjc_time` VALUES ('611', '18:38:00', '18:48:00', '18:50:00', '53');
INSERT INTO `jiang_xjc_time` VALUES ('612', '18:48:00', '18:58:00', '19:00:00', '54');
INSERT INTO `jiang_xjc_time` VALUES ('613', '18:58:00', '19:08:00', '19:10:00', '55');
INSERT INTO `jiang_xjc_time` VALUES ('614', '19:08:00', '19:18:00', '19:20:00', '56');
INSERT INTO `jiang_xjc_time` VALUES ('615', '19:18:00', '19:28:00', '19:30:00', '57');
INSERT INTO `jiang_xjc_time` VALUES ('616', '19:28:00', '19:38:00', '19:40:00', '58');
INSERT INTO `jiang_xjc_time` VALUES ('617', '19:38:00', '19:48:00', '19:50:00', '59');
INSERT INTO `jiang_xjc_time` VALUES ('618', '19:48:00', '19:58:00', '20:00:00', '60');
INSERT INTO `jiang_xjc_time` VALUES ('619', '19:58:00', '20:08:00', '20:10:00', '61');
INSERT INTO `jiang_xjc_time` VALUES ('620', '20:08:00', '20:18:00', '20:20:00', '62');
INSERT INTO `jiang_xjc_time` VALUES ('621', '20:18:00', '20:28:00', '20:30:00', '63');
INSERT INTO `jiang_xjc_time` VALUES ('622', '20:28:00', '20:38:00', '20:40:00', '64');
INSERT INTO `jiang_xjc_time` VALUES ('623', '20:38:00', '20:48:00', '20:50:00', '65');
INSERT INTO `jiang_xjc_time` VALUES ('624', '20:48:00', '20:58:00', '21:00:00', '66');
INSERT INTO `jiang_xjc_time` VALUES ('625', '20:58:00', '21:08:00', '21:10:00', '67');
INSERT INTO `jiang_xjc_time` VALUES ('626', '21:08:00', '21:18:00', '21:20:00', '68');
INSERT INTO `jiang_xjc_time` VALUES ('627', '21:18:00', '21:28:00', '21:30:00', '69');
INSERT INTO `jiang_xjc_time` VALUES ('628', '21:28:00', '21:38:00', '21:40:00', '70');
INSERT INTO `jiang_xjc_time` VALUES ('629', '21:38:00', '21:48:00', '21:50:00', '71');
INSERT INTO `jiang_xjc_time` VALUES ('630', '21:48:00', '21:58:00', '22:00:00', '72');
INSERT INTO `jiang_xjc_time` VALUES ('631', '21:58:00', '22:08:00', '22:10:00', '73');
INSERT INTO `jiang_xjc_time` VALUES ('632', '22:08:00', '22:18:00', '22:20:00', '74');
INSERT INTO `jiang_xjc_time` VALUES ('633', '22:18:00', '22:28:00', '22:30:00', '75');
INSERT INTO `jiang_xjc_time` VALUES ('634', '22:28:00', '22:38:00', '22:40:00', '76');
INSERT INTO `jiang_xjc_time` VALUES ('635', '22:38:00', '22:48:00', '22:50:00', '77');
INSERT INTO `jiang_xjc_time` VALUES ('636', '22:48:00', '22:58:00', '23:00:00', '78');
INSERT INTO `jiang_xjc_time` VALUES ('637', '22:58:00', '23:08:00', '23:10:00', '79');
INSERT INTO `jiang_xjc_time` VALUES ('638', '23:08:00', '23:18:00', '23:20:00', '80');
INSERT INTO `jiang_xjc_time` VALUES ('639', '23:18:00', '23:28:00', '23:30:00', '81');
INSERT INTO `jiang_xjc_time` VALUES ('640', '23:28:00', '23:38:00', '23:40:00', '82');
INSERT INTO `jiang_xjc_time` VALUES ('641', '23:38:00', '23:48:00', '23:50:00', '83');
INSERT INTO `jiang_xjc_time` VALUES ('642', '23:48:00', '23:58:00', '00:00:00', '84');
INSERT INTO `jiang_xjc_time` VALUES ('643', '23:58:00', '00:08:00', '00:10:00', '85');
INSERT INTO `jiang_xjc_time` VALUES ('644', '00:08:00', '00:18:00', '00:20:00', '86');
INSERT INTO `jiang_xjc_time` VALUES ('645', '00:18:00', '00:28:00', '00:30:00', '87');
INSERT INTO `jiang_xjc_time` VALUES ('646', '00:28:00', '00:38:00', '00:40:00', '88');
INSERT INTO `jiang_xjc_time` VALUES ('647', '00:38:00', '00:48:00', '00:50:00', '89');
INSERT INTO `jiang_xjc_time` VALUES ('648', '00:48:00', '00:58:00', '01:00:00', '90');
INSERT INTO `jiang_xjc_time` VALUES ('649', '00:58:00', '01:08:00', '01:10:00', '91');
INSERT INTO `jiang_xjc_time` VALUES ('650', '01:08:00', '01:18:00', '01:20:00', '92');
INSERT INTO `jiang_xjc_time` VALUES ('651', '01:18:00', '01:28:00', '01:30:00', '93');
INSERT INTO `jiang_xjc_time` VALUES ('652', '01:28:00', '01:38:00', '01:40:00', '94');
INSERT INTO `jiang_xjc_time` VALUES ('653', '01:38:00', '01:48:00', '01:50:00', '95');
INSERT INTO `jiang_xjc_time` VALUES ('654', '01:48:00', '01:58:00', '02:00:00', '96');

-- ----------------------------
-- Table structure for jiang_xsc_code
-- ----------------------------
DROP TABLE IF EXISTS `jiang_xsc_code`;
CREATE TABLE `jiang_xsc_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(20) NOT NULL,
  `code` varchar(25) NOT NULL,
  `addtime` datetime NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9028 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_xsc_code
-- ----------------------------
INSERT INTO `jiang_xsc_code` VALUES ('9026', '20160102-084', '1,3,6,5,2', '2016-02-22 11:35:36');
INSERT INTO `jiang_xsc_code` VALUES ('9027', '-', ',,,,', '2016-08-11 15:31:59');

-- ----------------------------
-- Table structure for jiang_xsc_time
-- ----------------------------
DROP TABLE IF EXISTS `jiang_xsc_time`;
CREATE TABLE `jiang_xsc_time` (
  `id` int(11) NOT NULL DEFAULT '0',
  `begintime` time NOT NULL,
  `endtime` time NOT NULL,
  `opentime` time NOT NULL,
  `lottery_num` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jiang_xsc_time
-- ----------------------------

-- ----------------------------
-- Table structure for jiang_yeepay
-- ----------------------------
DROP TABLE IF EXISTS `jiang_yeepay`;
CREATE TABLE `jiang_yeepay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `money` double(10,3) DEFAULT NULL,
  `ordernum` varchar(300) CHARACTER SET utf8 DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `ordernum` (`ordernum`)
) ENGINE=MyISAM AUTO_INCREMENT=100561 DEFAULT CHARSET=ucs2;

-- ----------------------------
-- Records of jiang_yeepay
-- ----------------------------
INSERT INTO `jiang_yeepay` VALUES ('100559', 'piaohong', '1500.000', 'yeePay_ck1456154489923470', '2016-02-22 23:21:29');
INSERT INTO `jiang_yeepay` VALUES ('100556', 'zaizai008', '200.000', 'yeePay_ck1456150734910266', '2016-02-22 22:18:54');
INSERT INTO `jiang_yeepay` VALUES ('100557', 'nan911010', '500.000', 'yeePay_ck1456151392459400', '2016-02-22 22:29:52');
INSERT INTO `jiang_yeepay` VALUES ('100554', 'haiwubenben1', '500.000', 'yeePay_ck1456149215307749', '2016-02-22 21:53:35');

-- ----------------------------
-- Table structure for my18_pay_temp
-- ----------------------------
DROP TABLE IF EXISTS `my18_pay_temp`;
CREATE TABLE `my18_pay_temp` (
  `o_time` varchar(20) DEFAULT '',
  `dkind` varchar(50) DEFAULT '',
  `O_id` varchar(50) NOT NULL DEFAULT '',
  `XingWei` varchar(50) DEFAULT '',
  `M_name` varchar(50) DEFAULT '',
  `u_id` varchar(20) DEFAULT '',
  `addmoney` decimal(7,2) NOT NULL DEFAULT '0.00',
  `Zhuangtai` varchar(20) DEFAULT '',
  `H_fee` decimal(7,2) NOT NULL DEFAULT '0.00',
  `u_name` varchar(30) DEFAULT '',
  `p_money` decimal(7,2) NOT NULL DEFAULT '0.00',
  `a_money` decimal(7,2) NOT NULL DEFAULT '0.00',
  `b_money` decimal(7,2) NOT NULL DEFAULT '0.00',
  `Memo` varchar(50) DEFAULT '',
  `huikuanren` varchar(50) DEFAULT '',
  `p_type` varchar(20) DEFAULT '',
  PRIMARY KEY (`O_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gb2312;

-- ----------------------------
-- Records of my18_pay_temp
-- ----------------------------

-- ----------------------------
-- Procedure structure for chongzhi
-- ----------------------------
DROP PROCEDURE IF EXISTS `chongzhi`;
DELIMITER ;;
CREATE DEFINER=`jiang`@`%` PROCEDURE `chongzhi`(IN `j_ordernum` text,IN `j_uid` int,IN `j_money` double,IN `j_message` text)
BEGIN
	
	declare bExist int ;
        declare isUid int;
	declare j_data datetime;
	declare j_beforemoney double;
	declare j_aftermoney double;
	declare j_username varchar(50);
	set  j_data = NOW();
	select count(id) into bExist from jiang_chongzhi where ordernum=j_ordernum;
	if bExist =0 then
		select count(id) into isUid from jiang_user where id=j_uid;
			
			if isUid>0 then
					
					select money,username into j_beforemoney,j_username from jiang_user where id=j_uid;
					set j_aftermoney=j_beforemoney+j_money;
					
					
					insert into jiang_chongzhi  ( `ordernum`,uid,money,message,`addtime`)  values (j_ordernum,j_uid,j_money,j_message,j_data);	
					
					
					INSERT INTO `jiang_account` (`id`, `username`, `lotteryid`, `methodid`, `money`, `money_befor`, `money_after`, `accounttype`, `accountnum`, `projectno`, `ordernum`, `tracenum`, `issue`, `mode`, `beizhu`, `state`, `addtime`) VALUES (NULL, j_username, NULL, NULL, j_money, j_beforemoney, j_aftermoney, '6', j_ordernum, NULL,j_ordernum, NULL, NULL, NULL, j_message, '0',j_data);
					
					
					update jiang_user set money=money+j_money  where id=j_uid;
					select 0;
				else
				select 1;
			end if;
		else
		
		select  2;
	end if;
	
  
	
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `sdd`;
DELIMITER ;;
CREATE TRIGGER `sdd` BEFORE INSERT ON `my18_pay_temp` FOR EACH ROW My_T_P:BEGIN 
declare My_b DECIMAL(11,2);
declare My_un varchar (50) ;

set @o_time=NEW.o_time;set @dkind=NEW.dkind;set @O_id=NEW.O_id;set @xingwei=NEW.xingwei;set @M_name=NEW.M_name;set @U_id=NEW.U_id;set @addmoney=NEW.addmoney;set @zhuangtai=NEW.zhuangtai;set @H_fee=NEW.H_fee;set @huikuanren=NEW.huikuanren;set @p_type=NEW.p_type;set @a_money=NEW.a_money;set @b_money=NEW.b_money;set @p_money=NEW.p_money;set @U_name=NEW.U_name;set @Memo='My18提示:';if not exists (select money,username from jiang_user where id=@U_id) then leave My_T_P; end if;
  select money,username into My_b,My_un from jiang_user where id=@U_id limit 1;set @b=My_b;
set @un=My_un;

insert into jiang_account (accountnum,addtime,ordernum,username,money,money_befor,money_after,accounttype,beizhu,state) values (@O_id,@o_time,@O_id,@un,@addmoney,@b,@b+@addmoney,6,concat(cast(@Memo AS CHAR),cast(@M_name AS CHAR),cast(@P_type AS CHAR),cast('充值' AS CHAR),cast(@addmoney AS CHAR),cast('元  订单号:' AS CHAR),cast(@O_id AS CHAR),cast(' 交易时间:' AS CHAR),cast(@o_time as char)),0);
update jiang_user set money=@b+@addmoney+@H_fee where id=@U_id;
insert into jiang_my18 (username,money,ordernum,state,addtime) values (@un,@addmoney,@O_id,0,@o_time);

 END
;;
DELIMITER ;
