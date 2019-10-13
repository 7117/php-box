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

 Date: 13/10/2019 13:36:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for full
-- ----------------------------
DROP TABLE IF EXISTS `full`;
CREATE TABLE `full`  (
  `id` int(11) NOT NULL,
  `catename` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cateorder` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ctime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of full
-- ----------------------------
INSERT INTO `full` VALUES (1, '手机', NULL, '', NULL);
INSERT INTO `full` VALUES (2, '功能手机', '1', '', NULL);
INSERT INTO `full` VALUES (3, '老人手机', '1,2', NULL, NULL);
INSERT INTO `full` VALUES (4, '儿童手机', '1,2', NULL, NULL);
INSERT INTO `full` VALUES (5, '智能手机', '1', NULL, NULL);
INSERT INTO `full` VALUES (6, '安卓手机', '1,5', NULL, NULL);
INSERT INTO `full` VALUES (7, 'ios手机', '1,5', NULL, NULL);
INSERT INTO `full` VALUES (8, 'win手机', '1,5', NULL, NULL);
INSERT INTO `full` VALUES (9, '色盲手机', '1,2,4', NULL, NULL);
INSERT INTO `full` VALUES (10, '大字手机', '1,2,3', NULL, NULL);

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
-- Table structure for shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `shop_cart`;
CREATE TABLE `shop_cart`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `productid` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `userid` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `num` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `price` float(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `createtime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of shop_cart
-- ----------------------------
INSERT INTO `shop_cart` VALUES (2, 2, 1, 11, 2000.00, '2019-10-01 01:29:15');
INSERT INTO `shop_cart` VALUES (1, 1, 1, 11, 1000.00, '2019-10-01 01:29:15');

-- ----------------------------
-- Table structure for shop_product
-- ----------------------------
DROP TABLE IF EXISTS `shop_product`;
CREATE TABLE `shop_product`  (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `describe` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` float(8, 2) NOT NULL DEFAULT 0.00,
  `originalprice` decimal(10, 2) NULL DEFAULT NULL,
  `inventory` smallint(5) UNSIGNED NULL DEFAULT 0,
  `categoryid` int(11) NULL DEFAULT NULL,
  `brandid` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `adminid` int(11) NULL DEFAULT NULL,
  `ishot` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isputaway` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `isonsale` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `onsaleprice` decimal(10, 2) NULL DEFAULT NULL,
  `cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updatetime` datetime NULL DEFAULT NULL,
  `createtime` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of shop_product
-- ----------------------------
INSERT INTO `shop_product` VALUES (1, 'sss', 'sss', 1000.00, 10.00, 21, 1, '2', 3, '4', '5', '6', 10.00, '222', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `shop_product` VALUES (2, 'sss', 'sss', 2000.00, 10.00, 21, 1, '2', 3, '4', '5', '6', 10.00, '222', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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

SET FOREIGN_KEY_CHECKS = 1;
