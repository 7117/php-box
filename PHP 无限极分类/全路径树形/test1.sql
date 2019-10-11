/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : test1

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 09/10/2019 23:29:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions`  (
  `session_id` int(11) NULL DEFAULT NULL,
  `session_data` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `session_expires` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES (0, 'use|s:3:\"sun\";age|i:233;email|s:11:\"sun@fox.com\";', '1570630054');

-- ----------------------------
-- Table structure for sort
-- ----------------------------
DROP TABLE IF EXISTS `sort`;
CREATE TABLE `sort`  (
  `id` int(11) NOT NULL,
  `pid` int(11) NULL DEFAULT NULL,
  `catename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cateorder` int(11) NULL DEFAULT NULL,
  `createtime` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sort
-- ----------------------------
INSERT INTO `sort` VALUES (1, 0, '新闻', 0, 0);
INSERT INTO `sort` VALUES (2, 0, '图片', 0, 0);
INSERT INTO `sort` VALUES (3, 1, '国内新闻', 0, 0);
INSERT INTO `sort` VALUES (4, 1, '国际新闻', 0, 0);
INSERT INTO `sort` VALUES (5, 3, '北京新闻', 0, 0);
INSERT INTO `sort` VALUES (6, 4, '美国新闻', 0, 0);
INSERT INTO `sort` VALUES (7, 2, '美女图片', 0, 0);
INSERT INTO `sort` VALUES (8, 2, '风景图片', 0, 0);
INSERT INTO `sort` VALUES (9, 7, '日韩明星', 0, 0);
INSERT INTO `sort` VALUES (10, 9, '日本动作片', 0, 0);
INSERT INTO `sort` VALUES (0, NULL, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
