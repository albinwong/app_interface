/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-06-11 20:09:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for app
-- ----------------------------
DROP TABLE IF EXISTS `app`;
CREATE TABLE `app` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'APP类型名称 如:安卓手机',
  `is_encryption` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否加密 1加密 0不加密',
  `key` varchar(20) NOT NULL DEFAULT '0' COMMENT '加密key',
  `image_size` text COMMENT '按json存储',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL COMMENT '更新时间',
  `status` tinyint(1) NOT NULL COMMENT '状态 1正常 0删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='客户端表';

-- ----------------------------
-- Records of app
-- ----------------------------
INSERT INTO `app` VALUES ('1', '安卓pad', '1', 'ss', null, '0', '0', '1');
INSERT INTO `app` VALUES ('2', '安卓手机', '1', 'test@126.com', null, '0', '0', '0');
INSERT INTO `app` VALUES ('3', 'iphone', '1', 'iphone', null, '0', '0', '0');
INSERT INTO `app` VALUES ('4', 'ipad', '1', 'ipad&sg2', null, '0', '0', '0');

-- ----------------------------
-- Table structure for cates
-- ----------------------------
DROP TABLE IF EXISTS `cates`;
CREATE TABLE `cates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL COMMENT '父级分类id',
  `path` varchar(255) NOT NULL COMMENT '分类层级',
  `status` tinyint(10) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cates
-- ----------------------------
INSERT INTO `cates` VALUES ('1', '男1装1', '0', '0', '1');
INSERT INTO `cates` VALUES ('2', '衬衫', '0', '0', '1');
INSERT INTO `cates` VALUES ('3', '西服', '1', '0,1', '1');
INSERT INTO `cates` VALUES ('4', '西裤', '3', '0,1,3', '1');

-- ----------------------------
-- Table structure for error_log
-- ----------------------------
DROP TABLE IF EXISTS `error_log`;
CREATE TABLE `error_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` int(11) DEFAULT NULL,
  `did` varchar(11) DEFAULT NULL,
  `version_id` int(11) DEFAULT NULL,
  `version_mini` varchar(255) DEFAULT NULL,
  `error_log` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of error_log
-- ----------------------------
INSERT INTO `error_log` VALUES ('1', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182378');
INSERT INTO `error_log` VALUES ('2', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182565');
INSERT INTO `error_log` VALUES ('3', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182645');
INSERT INTO `error_log` VALUES ('4', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182733');
INSERT INTO `error_log` VALUES ('5', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182750');
INSERT INTO `error_log` VALUES ('6', '1', '1', '1', '20140731', 'jdsakljlgsdgsag', '1497182800');

-- ----------------------------
-- Table structure for version_upgrade
-- ----------------------------
DROP TABLE IF EXISTS `version_upgrade`;
CREATE TABLE `version_upgrade` (
  `id` smallint(4) unsigned NOT NULL AUTO_INCREMENT,
  `app_id` smallint(4) unsigned NOT NULL DEFAULT '0' COMMENT '客户端id ''1'' 安卓',
  `version_id` smallint(4) unsigned DEFAULT '0' COMMENT '大版本号id',
  `version_mini` mediumint(8) unsigned DEFAULT '0' COMMENT '小版本号',
  `version_code` varchar(10) DEFAULT NULL COMMENT '版本标识1.2',
  `type` tinyint(2) unsigned DEFAULT NULL COMMENT '是否升级 1升级,0不升级,2强制升级',
  `apk_url` varchar(255) DEFAULT NULL,
  `upgrade_point` varchar(255) DEFAULT NULL COMMENT '升级提示',
  `status` tinyint(2) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='版本升级信息表';

-- ----------------------------
-- Records of version_upgrade
-- ----------------------------
INSERT INTO `version_upgrade` VALUES ('1', '1', '2', '1', '2.1', '1', 'http://imooc.com', '有新功能,赶快更新吧!', '1', null, null);
