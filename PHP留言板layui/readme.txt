 使用声明：

 本程序旨给PHP初学者一个演示示例，不得用于商业用途，否则造成任何损失，我们不承担任何责任！


 如果在安装使用中碰到问题，请加QQ学习群：52581432

 * =====================================================================
 * 本程序是用助于初学PHP者更加快速的加入到实战中，从实战中更快的掌握PHP知识，更快的成长。
 * 签于前期未得反馈，只展示留言本增、改、删功能
 * 未加入后台管理及管理员权限功能，如果有这方面的需求或是想更加快速的学习PHP知识，
 * 欢迎加入PHP实战群一起学习与探讨，不收任何费用。QQ群：52581432
 * 有什么问题也可以在群里面反馈。
 * =====================================================================


 * 以下是建数据库代码

 CREATE TABLE `www_message` (
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`title` varchar(50) DEFAULT NULL COMMENT '标题',
`content` varchar(200) DEFAULT '' COMMENT '内容',
`reply_content` varchar(200) DEFAULT '' COMMENT '回复内容',
`create_time` char(12) DEFAULT NULL COMMENT '创建时间',
`reply_time` char(12) DEFAULT NULL COMMENT '回复时间',
`uip` char(16) DEFAULT NULL COMMENT '用户IP',
`status` tinyint(1) DEFAULT '0' COMMENT '是否审核',
PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;