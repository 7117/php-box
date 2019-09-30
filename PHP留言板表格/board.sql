SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for board
-- ----------------------------
DROP TABLE IF EXISTS `board`;
CREATE TABLE `board` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `author` varchar(50) DEFAULT NULL COMMENT '回复时间',
  `message` varchar(16) DEFAULT NULL COMMENT '用户IP',
  `dateline` varchar(70) DEFAULT '0' COMMENT '是否审核',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of board
-- ----------------------------
INSERT INTO `board` VALUES ('1', 'cdc', 'csscs', 'cscscs', '19-09-23 07:09:05');
INSERT INTO `board` VALUES ('2', 'cdc', 'csscs', 'cscscs', '19-09-23 07:09:43');
INSERT INTO `board` VALUES ('3', '111', '111', '111', '19-09-23 07:09:42');
INSERT INTO `board` VALUES ('4', '222', '222', '222', '19-09-23 07:09:00');
INSERT INTO `board` VALUES ('5', '111111', '11111', '11111', '19-09-23 07:09:40');
