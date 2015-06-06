/*
Navicat MySQL Data Transfer

Source Server         : isorange
Source Server Version : 50148
Source Host           : hdm-128.hichina.com:3306
Source Database       : hdm1280189_db

Target Server Type    : MYSQL
Target Server Version : 50148
File Encoding         : 65001

Date: 2015-06-06 16:52:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_admin2`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin2`;
CREATE TABLE `tbl_admin2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `checked` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_admin2
-- ----------------------------
INSERT INTO `tbl_admin2` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');
