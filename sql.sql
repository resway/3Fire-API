CREATE DATABASE `3fire` default character set utf8 collate utf8_general_ci;

use 3fire;

-- user_group 用户分组表
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) DEFAULT NULL COMMENT '名称',
  `desc` varchar(50) DEFAULT NULL COMMENT '描述',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='用户分组表' AUTO_INCREMENT=1 ;

INSERT INTO `user_group` (`id`, `name`, `desc`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'admin', '超级管理员', NULL, NULL, NULL),
(2, 'user', '普通用户', NULL, NULL, NULL);

-- user 用户表
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `group_id` int(10) unsigned NOT NULL COMMENT '分组id',
  `username` varchar(20) DEFAULT NULL COMMENT '用户名',
  `password` char(32) DEFAULT NULL COMMENT '密码',
  `avatar` varchar(100) DEFAULT NULL COMMENT '用户头像地址',
  `status` tinyint(1) DEFAULT '1' COMMENT '启用状态:0禁用，1启用',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '最后登录时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  `update_ip` char(20) DEFAULT NULL COMMENT '最后登录ip',
  UNIQUE KEY(`username`),
  INDEX (`group_id`),
  INDEX (`username`),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表' AUTO_INCREMENT=1 ;

INSERT INTO `user` (`id`, `group_id`, `username`, `password`) VALUES
(1, 1, 'admin', '950ada08695e0ea06e4e2406ce4373b9'),
(2, 2, 'user', '1e69efd4ddb82d7fbe493a1aadfd330c');

