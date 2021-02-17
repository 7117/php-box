/*
 Navicat MySQL Data Transfer

 Source Server         : 本地
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : grade

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 09/06/2020 12:25:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for laravel_books
-- ----------------------------
DROP TABLE IF EXISTS `laravel_books`;
CREATE TABLE `laravel_books`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) UNSIGNED NULL DEFAULT NULL,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_books
-- ----------------------------
INSERT INTO `laravel_books` VALUES (1, 19, '《莎士比亚》');
INSERT INTO `laravel_books` VALUES (2, 20, '《悲惨世界》');
INSERT INTO `laravel_books` VALUES (3, 21, '《西游记》');
INSERT INTO `laravel_books` VALUES (4, 24, '《红楼梦》');
INSERT INTO `laravel_books` VALUES (5, 25, '《圣经》');
INSERT INTO `laravel_books` VALUES (6, 26, '《三个代表》');
INSERT INTO `laravel_books` VALUES (7, 27, '《国富论》');
INSERT INTO `laravel_books` VALUES (8, 29, '《道德情操论》');
INSERT INTO `laravel_books` VALUES (9, 79, '《资本论》');
INSERT INTO `laravel_books` VALUES (10, 19, '《热情天堂》');
INSERT INTO `laravel_books` VALUES (11, 19, '《完美人生》');
INSERT INTO `laravel_books` VALUES (29, 19, '《哈利波特》');
INSERT INTO `laravel_books` VALUES (30, NULL, '《项链王》');

-- ----------------------------
-- Table structure for laravel_one
-- ----------------------------
DROP TABLE IF EXISTS `laravel_one`;
CREATE TABLE `laravel_one`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `user` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '学生名',
  `math` tinyint(3) UNSIGNED NOT NULL COMMENT '数学成绩',
  `chinese` tinyint(3) NOT NULL,
  `english` tinyint(3) NOT NULL,
  `create_time` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for laravel_profiles
-- ----------------------------
DROP TABLE IF EXISTS `laravel_profiles`;
CREATE TABLE `laravel_profiles`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) NOT NULL,
  `hobby` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` smallint(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_profiles
-- ----------------------------
INSERT INTO `laravel_profiles` VALUES (1, 19, '喜欢大姐姐', 1);
INSERT INTO `laravel_profiles` VALUES (2, 20, '特爱吃肉', 0);
INSERT INTO `laravel_profiles` VALUES (3, 21, '朽木露琪亚', -1);
INSERT INTO `laravel_profiles` VALUES (4, 24, '暗恋小红', 2);
INSERT INTO `laravel_profiles` VALUES (5, 25, '毕迪丽', 1);
INSERT INTO `laravel_profiles` VALUES (6, 26, '特兰克斯', -1);
INSERT INTO `laravel_profiles` VALUES (7, 27, '琦玉爷爷', 1);
INSERT INTO `laravel_profiles` VALUES (8, 29, '有空就修行', 1);
INSERT INTO `laravel_profiles` VALUES (9, 79, '会长大人', 0);

-- ----------------------------
-- Table structure for laravel_role_user
-- ----------------------------
DROP TABLE IF EXISTS `laravel_role_user`;
CREATE TABLE `laravel_role_user`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` mediumint(8) UNSIGNED NOT NULL,
  `role_id` mediumint(8) UNSIGNED NOT NULL,
  `details` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 90 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_role_user
-- ----------------------------
INSERT INTO `laravel_role_user` VALUES (1, 19, 2, '嗯');
INSERT INTO `laravel_role_user` VALUES (2, 20, 4, '哈');
INSERT INTO `laravel_role_user` VALUES (3, 21, 5, '哦');
INSERT INTO `laravel_role_user` VALUES (4, 24, 1, '呵');
INSERT INTO `laravel_role_user` VALUES (5, 25, 3, '哒');
INSERT INTO `laravel_role_user` VALUES (6, 19, 3, '啪');
INSERT INTO `laravel_role_user` VALUES (7, 21, 4, '咯');
INSERT INTO `laravel_role_user` VALUES (8, 19, 1, '啦');
INSERT INTO `laravel_role_user` VALUES (89, 99, 4, '啦');
INSERT INTO `laravel_role_user` VALUES (87, 99, 2, '啦');
INSERT INTO `laravel_role_user` VALUES (86, 99, 1, '啪');

-- ----------------------------
-- Table structure for laravel_roles
-- ----------------------------
DROP TABLE IF EXISTS `laravel_roles`;
CREATE TABLE `laravel_roles`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_roles
-- ----------------------------
INSERT INTO `laravel_roles` VALUES (1, '超级管理员');
INSERT INTO `laravel_roles` VALUES (2, '评论审核专员');
INSERT INTO `laravel_roles` VALUES (3, '图片监察员');
INSERT INTO `laravel_roles` VALUES (4, '帐户处理专员');
INSERT INTO `laravel_roles` VALUES (5, '广告投放专员');

-- ----------------------------
-- Table structure for laravel_two
-- ----------------------------
DROP TABLE IF EXISTS `laravel_two`;
CREATE TABLE `laravel_two`  (
  `uid` mediumint(8) UNSIGNED NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '男',
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_two
-- ----------------------------
INSERT INTO `laravel_two` VALUES (1, '男');
INSERT INTO `laravel_two` VALUES (2, '女');
INSERT INTO `laravel_two` VALUES (3, '男');
INSERT INTO `laravel_two` VALUES (4, '男');
INSERT INTO `laravel_two` VALUES (25, '女');

-- ----------------------------
-- Table structure for laravel_users
-- ----------------------------
DROP TABLE IF EXISTS `laravel_users`;
CREATE TABLE `laravel_users`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自动编号',
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` char(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` char(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '男',
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `price` decimal(8, 2) UNSIGNED NOT NULL DEFAULT 0.00,
  `details` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `uid` smallint(6) NULL DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0 COMMENT '状态',
  `list` json NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL DEFAULT '1997-01-01 01:01:01' COMMENT '创建时间',
  `updated_at` datetime(0) NOT NULL DEFAULT '1997-01-01 01:01:01' COMMENT '修改时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of laravel_users
-- ----------------------------
INSERT INTO `laravel_users` VALUES (19, '蜡笔小新', '123', '男', 'xiaoxin@163.com', 60.00, '123', 1001, -1, '{\"id\": 19, \"uid\": 1010}', NULL, '2016-06-27 16:45:26', '2016-06-27 16:45:26');
INSERT INTO `laravel_users` VALUES (20, '路飞', '123', '男', 'lufei@163.com', 70.00, '123', 1002, 0, NULL, NULL, '2016-06-27 16:55:56', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (21, '黑崎一护', '456', '男', 'yihu@163.com', 80.00, '123', 1003, 1, NULL, NULL, '2016-07-27 17:22:16', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (24, '小明', '123', '男', 'xiaoming@163.com', 90.00, '123', 1004, 2, NULL, NULL, '2016-08-27 23:50:52', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (25, '孙悟饭', '123', '男', 'wufan@163.com', 100.00, '123', 1005, -1, NULL, NULL, '2016-08-28 18:02:53', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (26, '孙悟天', '123', '男', 'wutian@163.com', 110.00, '123', NULL, 0, NULL, NULL, '2016-09-28 22:07:38', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (27, '樱桃小丸子', '123', '女', 'yingtao@163.com', 77.00, '123', 1007, 1, NULL, NULL, '2016-10-29 10:53:58', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (29, '孙悟空', '123', '男', 'wukong@163.com', 100.00, '123', 1008, 2, NULL, NULL, '2018-12-11 10:09:36', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (76, '李白', '123', '男', 'UPPER(EMAIL)', 52.00, '123', 1011, 0, NULL, NULL, '2019-10-28 10:00:39', '2019-12-25 13:28:04');
INSERT INTO `laravel_users` VALUES (79, '辉夜', '123', '女', 'HUIYE@163.COM', 91.00, '123', 1009, -3, NULL, NULL, '2019-09-20 22:01:42', '2020-04-07 10:16:11');
INSERT INTO `laravel_users` VALUES (80, '李黑', '123', '男', 'lihei@163.com', 99.00, '123', 1010, 0, NULL, NULL, '1997-01-01 01:01:01', '1997-01-01 01:01:01');
INSERT INTO `laravel_users` VALUES (99, '辉夜', '123', '男', 'HUIYE@163.COM', 0.00, '123', NULL, 0, NULL, NULL, '2020-05-04 04:52:06', '2020-05-04 04:52:06');

SET FOREIGN_KEY_CHECKS = 1;
