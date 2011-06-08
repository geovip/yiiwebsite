/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : dulichvietnam

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2011-06-05 23:32:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_adsvertisment`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_adsvertisment`;
CREATE TABLE `tbl_adsvertisment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_file` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_adsvertisment
-- ----------------------------
INSERT INTO tbl_adsvertisment VALUES ('5', 'Google', 'http://www.google.com.vn', '1305013649_ps_logo2.png', '2011-05-09 10:03:27', '2011-05-10 15:47:29');
INSERT INTO tbl_adsvertisment VALUES ('6', 'Toàn Cầu Xanh', 'http://toancauxanh.vn/', '1305013794_webdev.jpg', '2011-05-10 15:49:54', '2011-05-10 15:49:54');

-- ----------------------------
-- Table structure for `tbl_album`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_album`;
CREATE TABLE `tbl_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `owner_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT NULL,
  `comment_count` int(11) DEFAULT NULL,
  `search` tinyint(4) DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_album
-- ----------------------------
INSERT INTO tbl_album VALUES ('20', 'Montes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id tristique sem. Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio', 'user', '1', '2', '2011-04-17 16:34:22', '2011-04-17 16:34:22', null, '80', '14', '1', 'wall', null);
INSERT INTO tbl_album VALUES ('19', 'Langies', '“ Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”', 'user', '1', '2', '2011-04-17 16:33:07', '2011-04-17 16:33:07', null, '19', '4', '1', 'wall', null);
INSERT INTO tbl_album VALUES ('18', 'Denona', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id tristique sem. Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend.', 'user', '1', '1', '2011-04-17 16:31:43', '2011-04-17 16:31:43', null, '5', '1', '1', 'wall', null);
INSERT INTO tbl_album VALUES ('21', 'Ronaem', 'Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.\r\nNulla consequat massa quis enim.', 'user', '1', '1', '2011-04-17 17:32:18', '2011-04-17 17:32:18', null, '1', '1', '1', 'wall', null);

-- ----------------------------
-- Table structure for `tbl_api`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_api`;
CREATE TABLE `tbl_api` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_api
-- ----------------------------
INSERT INTO tbl_api VALUES ('1', '14', '708a3e');
INSERT INTO tbl_api VALUES ('2', '1', '9cac87');
INSERT INTO tbl_api VALUES ('3', '15', 'ad1ea5');
INSERT INTO tbl_api VALUES ('4', '18', 'b32035');

-- ----------------------------
-- Table structure for `tbl_category`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO tbl_category VALUES ('1', '1', 'Tour', 'album', '2011-03-20 17:01:35', '2011-03-20 17:01:39');
INSERT INTO tbl_category VALUES ('2', '1', 'DL', 'album', '2011-03-27 21:07:43', '2011-03-27 21:07:46');
INSERT INTO tbl_category VALUES ('4', null, 'Chau a', '', null, null);
INSERT INTO tbl_category VALUES ('5', null, 'Bãi biển', '', null, null);

-- ----------------------------
-- Table structure for `tbl_comment`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resource_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `resource_id` int(11) DEFAULT NULL,
  `poster_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poster_id` int(11) DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_comment
-- ----------------------------
INSERT INTO tbl_comment VALUES ('1', 'photo_comment', '4', 'user', '1', 'anh dep lam', '2011-04-04 23:36:11');
INSERT INTO tbl_comment VALUES ('2', 'photo_comment', '4', 'user', '1', 'Hoa dep', '2011-04-04 23:39:39');
INSERT INTO tbl_comment VALUES ('3', 'photo_comment', '4', 'user', '1', 'Lan hoa', '2011-04-04 23:40:18');
INSERT INTO tbl_comment VALUES ('4', 'photo_comment', '4', 'user', '1', 'displayout', '2011-04-04 23:42:11');
INSERT INTO tbl_comment VALUES ('5', 'photo_comment', '4', 'user', '1', 'set layout', '2011-04-04 23:52:40');
INSERT INTO tbl_comment VALUES ('6', 'photo_comment', '4', 'user', '1', 'dan vine', '2011-04-04 23:54:48');
INSERT INTO tbl_comment VALUES ('7', 'photo_comment', '1', 'user', '1', 'Comment photo', '2011-04-05 22:41:55');
INSERT INTO tbl_comment VALUES ('8', 'photo_comment', '1', 'user', '1', 'Photo mobile', '2011-04-05 22:52:19');
INSERT INTO tbl_comment VALUES ('9', 'photo_comment', '1', 'user', '1', 'Mobile dang giam gia', '2011-04-05 22:56:02');
INSERT INTO tbl_comment VALUES ('10', 'photo_comment', '1', 'user', '1', 'chua login thi phai', '2011-04-05 22:58:02');
INSERT INTO tbl_comment VALUES ('11', 'photo_comment', '1', 'user', '1', 'logi roi', '2011-04-05 22:59:04');
INSERT INTO tbl_comment VALUES ('12', 'photo_comment', '1', 'user', '1', 'Thong bao di', '2011-04-05 23:00:39');
INSERT INTO tbl_comment VALUES ('13', 'photo_comment', '5', 'user', '1', 'Anh duoc', '2011-04-05 23:17:12');
INSERT INTO tbl_comment VALUES ('14', 'photo_comment', '5', 'user', '1', 'Style van chua duoc cool', '2011-04-05 23:24:42');
INSERT INTO tbl_comment VALUES ('16', 'photo_comment', '5', 'user', '1', 'comment count', '2011-04-06 00:04:45');
INSERT INTO tbl_comment VALUES ('17', 'photo_comment', '5', 'user', '1', 'ab,c', '2011-04-06 00:05:15');
INSERT INTO tbl_comment VALUES ('18', 'photo_comment', '5', 'user', '1', '1dad', '2011-04-06 00:06:24');
INSERT INTO tbl_comment VALUES ('19', 'photo_comment', '5', 'user', '1', 'Comment tren album', '2011-04-06 00:11:22');
INSERT INTO tbl_comment VALUES ('20', 'photo_comment', '5', 'user', '1', 'Comment gio moi duoc save();', '2011-04-06 00:27:11');
INSERT INTO tbl_comment VALUES ('21', 'photo_comment', '5', 'user', '1', 'flash success', '2011-04-06 00:28:01');
INSERT INTO tbl_comment VALUES ('22', 'photo_comment', '5', 'user', '1', 'Dang thu nghiem', '2011-04-06 00:29:57');
INSERT INTO tbl_comment VALUES ('23', 'photo_comment', '2', 'user', '1', 'Điện thoại đời mới\r\n', '2011-04-06 22:17:58');
INSERT INTO tbl_comment VALUES ('24', 'photo_comment', '2', 'user', '1', 'Bây giờ làm cho album', '2011-04-06 22:18:10');
INSERT INTO tbl_comment VALUES ('46', 'photo_comment', '39', 'user', '1', 'Dien thoai cool', '2011-04-17 16:45:57');
INSERT INTO tbl_comment VALUES ('45', 'photo_comment', '35', 'user', '1', 'Buc anh that tuyet voi luon', '2011-04-17 16:43:02');
INSERT INTO tbl_comment VALUES ('43', 'album_comment', '20', 'user', '1', 'Very good', '2011-04-17 16:35:25');
INSERT INTO tbl_comment VALUES ('44', 'photo_comment', '36', 'user', '1', 'Tacke hoa', '2011-04-17 16:35:52');
INSERT INTO tbl_comment VALUES ('29', 'photo_comment', '4', 'user', '1', 'Rating nào\r\n', '2011-04-06 23:04:12');
INSERT INTO tbl_comment VALUES ('30', 'photo_comment', '6', 'user', '1', 'alu', '2011-04-09 15:53:42');
INSERT INTO tbl_comment VALUES ('92', 'photo_comment', '37', 'user', '14', 'RAt dep', '2011-05-03 17:06:39');
INSERT INTO tbl_comment VALUES ('47', 'album_comment', '20', 'user', '1', 'vuon nhiet doi', '2011-04-17 17:27:35');
INSERT INTO tbl_comment VALUES ('48', 'album_comment', '20', 'user', '1', 'Day la khu vuon nhan tao', '2011-04-17 17:27:49');
INSERT INTO tbl_comment VALUES ('49', 'album_comment', '20', 'user', '1', 'Dung vay? chung toi da toi do vai lan roi', '2011-04-17 17:28:04');
INSERT INTO tbl_comment VALUES ('95', 'photo_comment', '37', 'user', '1', 'Dễ thương.', '2011-05-22 17:29:27');
INSERT INTO tbl_comment VALUES ('51', 'photo_comment', '36', 'user', '1', 'DAy la mua ma tac ke hoa di kiem moi', '2011-04-17 17:29:37');
INSERT INTO tbl_comment VALUES ('52', 'photo_comment', '39', 'user', '1', 'Muon mua cai ni', '2011-04-17 20:26:04');
INSERT INTO tbl_comment VALUES ('55', 'album_comment', '20', 'user', '1', 'Thiet khong do', '2011-04-22 01:38:48');
INSERT INTO tbl_comment VALUES ('89', 'album_comment', '20', 'user', '14', 'Khi nao co dip phai toi moi duoc', '2011-05-03 16:08:03');
INSERT INTO tbl_comment VALUES ('84', 'album_comment', '21', 'user', '1', 'RAt dep', '2011-05-03 15:25:55');
INSERT INTO tbl_comment VALUES ('83', 'album_comment', '18', 'user', '1', 'Rat tuyet', '2011-05-03 15:24:23');
INSERT INTO tbl_comment VALUES ('63', 'photo_comment', '36', 'user', '1', 'Khong co google.com', '2011-04-22 18:03:26');
INSERT INTO tbl_comment VALUES ('67', 'album_comment', '20', 'user', '1', 'Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”', '2011-04-25 22:49:49');
INSERT INTO tbl_comment VALUES ('68', 'photo_comment', '36', 'user', '1', 'Nunc nec ipsum sed nisi dictum mollis. Praesent malesuada mauris a odio adipiscing mollis. In varius tincidunt elit vitae eleifend. Etiam fermentum suscipit est vel aliquet. ”', '2011-04-25 22:49:57');
INSERT INTO tbl_comment VALUES ('70', 'photo_comment', '32', 'user', '1', 'Cool', '2011-04-26 00:17:49');
INSERT INTO tbl_comment VALUES ('71', 'photo_comment', '35', 'user', '1', 'cool', '2011-05-01 11:21:58');
INSERT INTO tbl_comment VALUES ('86', 'photo_comment', '36', 'user', '14', 'Buc nay chup khi nao vay?', '2011-05-03 16:03:44');
INSERT INTO tbl_comment VALUES ('94', 'photo_comment', '36', 'user', '1', 'Van dep', '2011-05-12 02:09:53');
INSERT INTO tbl_comment VALUES ('96', 'album_comment', '20', 'user', '1', 'Lâu ngày xem lại thấy tuyệt thật:)', '2011-05-29 10:17:13');

-- ----------------------------
-- Table structure for `tbl_contact`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE `tbl_contact` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `creation_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_contact
-- ----------------------------
INSERT INTO tbl_contact VALUES ('1', 'Huỳnh Gia Quyền', 'huynhnv88@gmail.com', 'Gửi mail', 'Thông điệp', '2011-05-28 00:12:01');
INSERT INTO tbl_contact VALUES ('3', 'Quach Thanh Danh', 'thanhdanh@webdev.vn', 'Tim hieu he thong ban hang', 'Toi dang can tim mot he thong ban hang truc tuyen, cac ban co the giup toi:)', '2011-05-29 10:05:49');

-- ----------------------------
-- Table structure for `tbl_file`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_file`;
CREATE TABLE `tbl_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_file_id` int(11) DEFAULT NULL,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `storage_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `storage_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_major` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_minor` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` bigint(20) DEFAULT NULL,
  `hash` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_file
-- ----------------------------
INSERT INTO tbl_file VALUES ('78', '77', 'orgin', 'user', '1', '1', '2011-04-17 16:44:39', '2011-04-17 16:44:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app4_1303029879.jpg', 'jpg', 'ringtone_app4_1303029879.jpg', 'image', 'jpeg', '7525', 'f24e61caf4ae5221a4c5d2631e5c3acd');
INSERT INTO tbl_file VALUES ('79', null, 'thumb', 'user', '1', '1', '2011-04-17 16:44:39', '2011-04-17 16:44:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app5_1303029879_thumb.jpg', 'jpg', 'ringtone_app5_1303029879_thumb.jpg', 'image', 'jpeg', '9359', 'c9b8466df8107f2f2ad314307757e70b');
INSERT INTO tbl_file VALUES ('73', null, 'thumb', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/img_2_1303029298_thumb.jpg', 'jpg', 'img_2_1303029298_thumb.jpg', 'image', 'jpeg', '7218', '3766cfbd1ec29292b8759449c8557b00');
INSERT INTO tbl_file VALUES ('71', null, 'thumb', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_4_1303029298_thumb.jpg', 'jpg', 'port_4_1303029298_thumb.jpg', 'image', 'jpeg', '11478', 'ba0148804ae69f08cb82486de54b88cc');
INSERT INTO tbl_file VALUES ('72', '71', 'orgin', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_4_1303029298.jpg', 'jpg', 'port_4_1303029298.jpg', 'image', 'jpeg', '21634', 'ba0148804ae69f08cb82486de54b88cc');
INSERT INTO tbl_file VALUES ('65', null, 'thumb', 'user', '1', '1', '2011-04-17 16:33:48', '2011-04-17 16:33:48', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_4_1303029228_thumb.jpg', 'jpg', 'simple_img_4_1303029228_thumb.jpg', 'image', 'jpeg', '6887', 'f6039e8b02ae6b17ed84a91a79a73389');
INSERT INTO tbl_file VALUES ('64', '63', 'orgin', 'user', '1', '1', '2011-04-17 16:33:48', '2011-04-17 16:33:48', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_2_1303029228.jpg', 'jpg', 'simple_img_2_1303029228.jpg', 'image', 'jpeg', '68321', '393f7acc1a5cb656c02f1acc2acfc701');
INSERT INTO tbl_file VALUES ('63', null, 'thumb', 'user', '1', '1', '2011-04-17 16:33:48', '2011-04-17 16:33:48', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_2_1303029228_thumb.jpg', 'jpg', 'simple_img_2_1303029228_thumb.jpg', 'image', 'jpeg', '5738', '393f7acc1a5cb656c02f1acc2acfc701');
INSERT INTO tbl_file VALUES ('59', null, 'thumb', 'user', '1', '1', '2011-04-17 16:32:18', '2011-04-17 16:32:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/img_1_1303029138_thumb.jpg', 'jpg', 'img_1_1303029138_thumb.jpg', 'image', 'jpeg', '17117', 'eee8bf7101e532ed7f354e71d4079cc9');
INSERT INTO tbl_file VALUES ('60', '59', 'orgin', 'user', '1', '1', '2011-04-17 16:32:18', '2011-04-17 16:32:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/img_1_1303029138.jpg', 'jpg', 'img_1_1303029138.jpg', 'image', 'jpeg', '33753', 'eee8bf7101e532ed7f354e71d4079cc9');
INSERT INTO tbl_file VALUES ('61', null, 'thumb', 'user', '1', '1', '2011-04-17 16:32:18', '2011-04-17 16:32:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/about_2_1303029138_thumb.jpg', 'jpg', 'about_2_1303029138_thumb.jpg', 'image', 'jpeg', '16355', '452e753f1432d66198361225c53c5b7e');
INSERT INTO tbl_file VALUES ('62', '61', 'orgin', 'user', '1', '1', '2011-04-17 16:32:18', '2011-04-17 16:32:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/about_2_1303029138.jpg', 'jpg', 'about_2_1303029138.jpg', 'image', 'jpeg', '25009', '452e753f1432d66198361225c53c5b7e');
INSERT INTO tbl_file VALUES ('13', null, 'thumb', 'user', '1', '1', '2011-04-10 16:57:13', '2011-04-10 16:57:13', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/na5_1302425833_thumb.jpg', 'jpg', 'na5_1302425833_thumb.jpg', 'image', 'jpeg', '4117', '59f2ee67a886747fc2c9061c8f409bc9');
INSERT INTO tbl_file VALUES ('14', '13', 'orgin', 'user', '1', '1', '2011-04-10 16:57:13', '2011-04-10 16:57:13', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/na5_1302425833.jpg', 'jpg', 'na5_1302425833.jpg', 'image', 'jpeg', '34166', '59f2ee67a886747fc2c9061c8f409bc9');
INSERT INTO tbl_file VALUES ('76', '75', 'orgin', 'user', '1', '1', '2011-04-17 16:44:38', '2011-04-17 16:44:38', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app3_1303029878.jpg', 'jpg', 'ringtone_app3_1303029878.jpg', 'image', 'jpeg', '8238', '04dec58ff039c23195d370da64fb05ca');
INSERT INTO tbl_file VALUES ('74', '73', 'orgin', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/img_2_1303029298.jpg', 'jpg', 'img_2_1303029298.jpg', 'image', 'jpeg', '11986', '3766cfbd1ec29292b8759449c8557b00');
INSERT INTO tbl_file VALUES ('75', null, 'thumb', 'user', '1', '1', '2011-04-17 16:44:38', '2011-04-17 16:44:38', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app3_1303029878_thumb.jpg', 'jpg', 'ringtone_app3_1303029878_thumb.jpg', 'image', 'jpeg', '8340', '04dec58ff039c23195d370da64fb05ca');
INSERT INTO tbl_file VALUES ('77', null, 'thumb', 'user', '1', '1', '2011-04-17 16:44:39', '2011-04-17 16:44:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app4_1303029879_thumb.jpg', 'jpg', 'ringtone_app4_1303029879_thumb.jpg', 'image', 'jpeg', '8421', 'f24e61caf4ae5221a4c5d2631e5c3acd');
INSERT INTO tbl_file VALUES ('19', null, 'thumb', 'user', '1', '1', '2011-04-10 16:57:14', '2011-04-10 16:57:14', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/na3_1302425834_thumb.jpg', 'jpg', 'na3_1302425834_thumb.jpg', 'image', 'jpeg', '3636', '98e5e6f96c58273b814a3165c22dfb6c');
INSERT INTO tbl_file VALUES ('20', '19', 'orgin', 'user', '1', '1', '2011-04-10 16:57:14', '2011-04-10 16:57:14', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/na3_1302425834.jpg', 'jpg', 'na3_1302425834.jpg', 'image', 'jpeg', '68469', '98e5e6f96c58273b814a3165c22dfb6c');
INSERT INTO tbl_file VALUES ('70', '69', 'orgin', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_3_1303029298.jpg', 'jpg', 'port_3_1303029298.jpg', 'image', 'jpeg', '39515', '646372f6d60546bf05065fce32c2700a');
INSERT INTO tbl_file VALUES ('66', '65', 'orgin', 'user', '1', '1', '2011-04-17 16:33:48', '2011-04-17 16:33:48', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_4_1303029228.jpg', 'jpg', 'simple_img_4_1303029228.jpg', 'image', 'jpeg', '113792', 'f6039e8b02ae6b17ed84a91a79a73389');
INSERT INTO tbl_file VALUES ('67', null, 'thumb', 'user', '1', '1', '2011-04-17 16:33:49', '2011-04-17 16:33:49', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_5_1303029229_thumb.jpg', 'jpg', 'simple_img_5_1303029229_thumb.jpg', 'image', 'jpeg', '6530', 'b62e4bb5add0b794a3a9ec69f473fb0c');
INSERT INTO tbl_file VALUES ('68', '67', 'orgin', 'user', '1', '1', '2011-04-17 16:33:49', '2011-04-17 16:33:49', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/simple_img_5_1303029229.jpg', 'jpg', 'simple_img_5_1303029229.jpg', 'image', 'jpeg', '125305', 'b62e4bb5add0b794a3a9ec69f473fb0c');
INSERT INTO tbl_file VALUES ('69', null, 'thumb', 'user', '1', '1', '2011-04-17 16:34:58', '2011-04-17 16:34:58', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_3_1303029298_thumb.jpg', 'jpg', 'port_3_1303029298_thumb.jpg', 'image', 'jpeg', '19963', '646372f6d60546bf05065fce32c2700a');
INSERT INTO tbl_file VALUES ('80', '79', 'orgin', 'user', '1', '1', '2011-04-17 16:44:39', '2011-04-17 16:44:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/ringtone_app5_1303029879.jpg', 'jpg', 'ringtone_app5_1303029879.jpg', 'image', 'jpeg', '7814', 'c9b8466df8107f2f2ad314307757e70b');
INSERT INTO tbl_file VALUES ('81', null, 'thumb', 'user', '1', '1', '2011-04-17 17:33:18', '2011-04-17 17:33:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_5_1303032798_thumb.jpg', 'jpg', 'port_5_1303032798_thumb.jpg', 'image', 'jpeg', '12448', '869e237bd8f0f4ee9a724754a167105b');
INSERT INTO tbl_file VALUES ('82', '81', 'orgin', 'user', '1', '1', '2011-04-17 17:33:18', '2011-04-17 17:33:18', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_5_1303032798.jpg', 'jpg', 'port_5_1303032798.jpg', 'image', 'jpeg', '23500', '869e237bd8f0f4ee9a724754a167105b');
INSERT INTO tbl_file VALUES ('83', null, 'thumb', 'user', '1', '1', '2011-04-17 17:33:19', '2011-04-17 17:33:19', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_6_1303032798_thumb.jpg', 'jpg', 'port_6_1303032798_thumb.jpg', 'image', 'jpeg', '15013', 'a7b4ba85135f9e1e67ffb5d78991f484');
INSERT INTO tbl_file VALUES ('84', '83', 'orgin', 'user', '1', '1', '2011-04-17 17:33:19', '2011-04-17 17:33:19', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/port_6_1303032798.jpg', 'jpg', 'port_6_1303032798.jpg', 'image', 'jpeg', '28963', 'a7b4ba85135f9e1e67ffb5d78991f484');
INSERT INTO tbl_file VALUES ('99', null, 'thumb', 'user', '1', '1', '2011-05-01 10:32:35', '2011-05-01 10:32:35', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217154_thumb.gif', 'gif', 'huy_tt_1304217154_thumb.gif', null, null, '1739', null);
INSERT INTO tbl_file VALUES ('100', '99', 'orgin', 'user', '1', '1', '2011-05-01 10:32:35', '2011-05-01 10:32:35', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217154.gif', 'gif', 'huy_tt_1304217154.gif', null, null, null, null);
INSERT INTO tbl_file VALUES ('101', null, 'thumb', 'user', '1', '1', '2011-05-01 10:39:49', '2011-05-01 10:39:49', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217588_thumb.gif', 'gif', 'huy_tt_1304217588_thumb.gif', null, null, '1739', null);
INSERT INTO tbl_file VALUES ('102', '101', 'orgin', 'user', '1', '1', '2011-05-01 10:39:49', '2011-05-01 10:39:49', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217588.gif', 'gif', 'huy_tt_1304217588.gif', null, null, null, null);
INSERT INTO tbl_file VALUES ('103', null, 'thumb', 'user', '1', '1', '2011-05-01 10:42:39', '2011-05-01 10:42:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/highmusic_1304217759_thumb.gif', 'gif', 'highmusic_1304217759_thumb.gif', null, null, '4173', null);
INSERT INTO tbl_file VALUES ('104', '103', 'orgin', 'user', '1', '1', '2011-05-01 10:42:39', '2011-05-01 10:42:39', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/highmusic_1304217759.gif', 'gif', 'highmusic_1304217759.gif', null, null, null, null);
INSERT INTO tbl_file VALUES ('105', null, 'thumb', 'user', '1', '1', '2011-05-01 10:42:59', '2011-05-01 10:42:59', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217779_thumb.gif', 'gif', 'huy_tt_1304217779_thumb.gif', null, null, '1739', null);
INSERT INTO tbl_file VALUES ('106', '105', 'orgin', 'user', '1', '1', '2011-05-01 10:42:59', '2011-05-01 10:42:59', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/huy_tt_1304217779.gif', 'gif', 'huy_tt_1304217779.gif', null, null, null, null);
INSERT INTO tbl_file VALUES ('107', null, 'thumb', 'user', '1', '1', '2011-05-01 10:47:44', '2011-05-01 10:47:44', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/alone_1304218064_thumb.jpg', 'jpg', 'alone_1304218064_thumb.jpg', null, null, '1296', null);
INSERT INTO tbl_file VALUES ('108', '107', 'orgin', 'user', '1', '1', '2011-05-01 10:47:44', '2011-05-01 10:47:44', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/alone_1304218064.jpg', 'jpg', 'alone_1304218064.jpg', null, null, null, null);
INSERT INTO tbl_file VALUES ('137', null, 'thumb', 'user', '1', '1', '2011-05-18 21:34:17', '2011-05-18 21:34:17', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/%5Bwallcoo_1305725656_thumb.jpg', 'jpg', '%5Bwallcoo_1305725656_thumb.jpg', 'image', 'jpeg', '6327', '27d6ea5f318128ad952a72919f1e47d7');
INSERT INTO tbl_file VALUES ('138', '137', 'orgin', 'user', '1', '1', '2011-05-18 21:34:17', '2011-05-18 21:34:17', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/%5Bwallcoo_1305725656.jpg', 'jpg', '%5Bwallcoo_1305725656.jpg', 'image', 'jpeg', '238856', '27d6ea5f318128ad952a72919f1e47d7');
INSERT INTO tbl_file VALUES ('143', null, 'thumb', 'user', '1', '1', '2011-05-19 00:13:25', '2011-05-19 00:13:25', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/billar_webdev_1305735205_thumb.jpg', 'jpg', 'billar_webdev_1305735205_thumb.jpg', 'image', 'jpeg', '24243', '79080f37246e175584d0495735da0378');
INSERT INTO tbl_file VALUES ('144', '143', 'orgin', 'user', '1', '1', '2011-05-19 00:13:25', '2011-05-19 00:13:25', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/billar_webdev_1305735205.jpg', 'jpg', 'billar_webdev_1305735205.jpg', 'image', 'jpeg', '120158', '79080f37246e175584d0495735da0378');
INSERT INTO tbl_file VALUES ('145', null, 'thumb', 'user', '1', '1', '2011-05-19 00:16:02', '2011-05-19 00:16:02', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/alone_1305735361_thumb.jpg', 'jpg', 'alone_1305735361_thumb.jpg', 'image', 'jpeg', '10642', 'ecb30adec00f32af73e81589f38fdeb0');
INSERT INTO tbl_file VALUES ('146', '145', 'orgin', 'user', '1', '1', '2011-05-19 00:16:02', '2011-05-19 00:16:02', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/alone_1305735361.jpg', 'jpg', 'alone_1305735361.jpg', 'image', 'jpeg', '36294', 'ecb30adec00f32af73e81589f38fdeb0');
INSERT INTO tbl_file VALUES ('147', null, 'thumb', 'user', '1', '1', '2011-05-19 00:19:11', '2011-05-19 00:19:11', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/god_baby_1305735550_thumb.jpg', 'jpg', 'god_baby_1305735550_thumb.jpg', 'image', 'jpeg', '12617', '6ed244a4ec017da50ac46def398a88de');
INSERT INTO tbl_file VALUES ('148', '147', 'orgin', 'user', '1', '1', '2011-05-19 00:19:11', '2011-05-19 00:19:11', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/god_baby_1305735550.jpg', 'jpg', 'god_baby_1305735550.jpg', 'image', 'jpeg', '17883', '6ed244a4ec017da50ac46def398a88de');
INSERT INTO tbl_file VALUES ('159', null, 'thumb', 'user', '1', '1', '2011-05-19 00:56:20', '2011-05-19 00:56:20', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/Image093_1305737780_thumb.jpg', 'jpg', 'Image093_1305737780_thumb.jpg', 'image', 'jpeg', '8159', '9db4227b9b1e60896a9dc66eb6cdf8ca');
INSERT INTO tbl_file VALUES ('160', '159', 'orgin', 'user', '1', '1', '2011-05-19 00:56:20', '2011-05-19 00:56:20', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/Image093_1305737780.jpg', 'jpg', 'Image093_1305737780.jpg', 'image', 'jpeg', '375107', '9db4227b9b1e60896a9dc66eb6cdf8ca');
INSERT INTO tbl_file VALUES ('161', null, 'thumb', 'user', '1', '1', '2011-05-19 00:58:19', '2011-05-19 00:58:19', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/Image058_1305737899_thumb.jpg', 'jpg', 'Image058_1305737899_thumb.jpg', 'image', 'jpeg', '9629', '0c7b5179fa95de1f2a868bf535c029bd');
INSERT INTO tbl_file VALUES ('162', '161', 'orgin', 'user', '1', '1', '2011-05-19 00:58:19', '2011-05-19 00:58:19', 'local', 'D:\\xampp1.7.3\\xampp\\htdocs\\yiiwebsite\\dulichvietnam\\protected/uploads/Image058_1305737899.jpg', 'jpg', 'Image058_1305737899.jpg', 'image', 'jpeg', '546063', '0c7b5179fa95de1f2a868bf535c029bd');

-- ----------------------------
-- Table structure for `tbl_photo`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_photo`;
CREATE TABLE `tbl_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `owner_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `file_id` int(11) DEFAULT NULL,
  `view_count` int(11) DEFAULT '0',
  `comment_count` int(11) DEFAULT '0',
  `rating` float DEFAULT NULL,
  `total` float DEFAULT '0',
  `lat` float DEFAULT NULL,
  `lag` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_photo
-- ----------------------------
INSERT INTO tbl_photo VALUES ('36', 'Than lan xanh', 'Eror sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2011-04-17 16:34:58', '2011-04-17 16:34:58', '20', 'user', '1', '71', '89', '10', '5', '1', '15.3535', '108.721');
INSERT INTO tbl_photo VALUES ('31', null, null, '2011-04-17 16:32:18', '2011-04-17 16:32:18', '18', 'user', '1', '61', '9', '0', '0', '0', '15.8139', '107.753');
INSERT INTO tbl_photo VALUES ('32', null, null, '2011-04-17 16:33:48', '2011-04-17 16:33:48', '19', 'user', '1', '63', '4', '1', '0', '0', '14.7063', '107.632');
INSERT INTO tbl_photo VALUES ('33', 'abc', null, '2011-04-17 16:33:48', '2011-04-17 16:33:48', '19', 'user', '1', '65', '1', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('34', null, null, '2011-04-17 16:33:49', '2011-04-17 16:33:49', '19', 'user', '1', '67', '0', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('35', 'Latter', 'Eror sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2011-04-17 16:34:58', '2011-04-17 16:34:58', '20', 'user', '1', '69', '17', '2', '0', '0', '15.6552', '107.825');
INSERT INTO tbl_photo VALUES ('30', null, null, '2011-04-17 16:32:18', '2011-04-17 16:32:18', '18', 'user', '1', '59', '4', '0', '0', '0', '13.9944', '108.618');
INSERT INTO tbl_photo VALUES ('42', null, null, '2011-04-17 17:33:19', '2011-04-17 17:33:19', '21', 'user', '1', '83', '6', '1', '0', '0', '13.685', '107.354');
INSERT INTO tbl_photo VALUES ('40', null, null, '2011-04-17 16:44:39', '2011-04-17 16:44:39', '18', 'user', '1', '79', '0', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('41', null, null, '2011-04-17 17:33:18', '2011-04-17 17:33:18', '21', 'user', '1', '81', '0', '0', '0', '0', '10.7214', '106.652');
INSERT INTO tbl_photo VALUES ('38', null, null, '2011-04-17 16:44:38', '2011-04-17 16:44:38', '18', 'user', '1', '75', '0', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('37', 'Direct', 'Eror sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.', '2011-04-17 16:34:58', '2011-04-17 16:34:58', '20', 'user', '1', '73', '24', '5', '0', '0', '13.7864', '109.2');
INSERT INTO tbl_photo VALUES ('39', null, null, '2011-04-17 16:44:39', '2011-04-17 16:44:39', '18', 'user', '1', '77', '2', '2', '0', '0', '16.1888', '107.918');
INSERT INTO tbl_photo VALUES ('57', null, null, '2011-05-19 00:13:25', '2011-05-19 00:13:25', '18', 'user', '1', '143', '0', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('58', null, null, '2011-05-19 00:16:02', '2011-05-19 00:16:02', '18', 'user', '1', '145', '0', '0', '0', '0', null, null);
INSERT INTO tbl_photo VALUES ('59', null, null, '2011-05-19 00:19:11', '2011-05-19 00:19:11', '18', 'user', '1', '147', '0', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for `tbl_place`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_place`;
CREATE TABLE `tbl_place` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `content` text CHARACTER SET utf8,
  `type` enum('coffee','company','restaurant','shop') DEFAULT 'shop',
  `address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `img_file` varchar(255) DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `long` float DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_place
-- ----------------------------
INSERT INTO tbl_place VALUES ('7', 'Kathy Coffee', 'Kathy Coffee Nguyễn Trác, Hải Châu, Đà Nẵng', 'Kathy Coffee Nguyễn Trác, Hải Châu, Đà Nẵng', 'coffee', 'Nguyễn Trác, Hải Châu, Đà Nẵng', '1305012830_kathy.png', '16.0393', '108.21', '2011-05-10 15:33:50', '2011-05-10 15:33:50');
INSERT INTO tbl_place VALUES ('8', 'Cà Phê Bar Hợp Phố', 'Cà Phê Bar Hợp Phố 50, Lê Đình Lý, Q.Thanh Khê', 'Cà Phê Bar Hợp Phố 50, Lê Đình Lý, Q.Thanh Khê', 'coffee', '50, Lê Đình Lý, Q.Thanh Khê, Đà Nẵng', '1305012903_hoppho.png', '16.06', '108.211', '2011-05-10 15:35:03', '2011-05-10 15:35:03');
INSERT INTO tbl_place VALUES ('9', 'Cà Phê Tiếng Tơ Đồng ', 'Cà Phê Tiếng Tơ Đồng 15, Phan Thành Tài, Q.Hải Châu ', 'Cà Phê Tiếng Tơ Đồng 15, Phan Thành Tài, Q.Hải Châu\r\n', 'coffee', '15, Phan Thành Tài, Q.Hải Châu, Đà Nẵng', '1305013011_todong.png', '16.0539', '108.221', '2011-05-10 15:36:51', '2011-05-10 15:36:51');
INSERT INTO tbl_place VALUES ('10', 'Cà Phê Bar Bucks', 'Cà Phê Bar Bucks', 'Cà Phê Bar Bucks', 'coffee', '376 - 378, 2 Tháng 9, Q.Hải Châu, Đà Nẵng', '1305013124_saobucks.jpg', '16.0595', '108.223', '2011-05-10 15:38:44', '2011-05-10 15:38:44');
INSERT INTO tbl_place VALUES ('5', 'Cà Phê Wonder', 'Cà Phê Wonder - 167 Lê Lợi, phường Hải Châu 1, Hải Châu, Đà Nẵng', 'Nhật ngữ Đông Du Đà Nẵng, 167 Lê Lợi, phường Hải Châu 1, Hải Châu, Đà Nẵng', 'coffee', 'Nhật ngữ Đông Du Đà Nẵng, 167 Lê Lợi, phường Hải Châu 1, Hải Châu, Đà Nẵng', '1305012677_k-wonder.png', '16.0716', '108.22', '2011-05-10 15:29:26', '2011-05-10 15:31:17');
INSERT INTO tbl_place VALUES ('6', 'Cà Phê Phương Nam', 'Cà Phê Phương Nam', 'Cà Phê Phương Nam 68, Phan Chu Trinh, Q.Hải Châu', 'coffee', '68, Phan Chu Trinh, Q.Hải Châu, Đà Nẵng', '1305012635_phuongnam.png', '16.0622', '108.22', '2011-05-10 15:30:35', '2011-05-10 15:30:35');
INSERT INTO tbl_place VALUES ('11', 'Cà Phê 10 Trần Quốc Toản', 'Cà Phê 10 Trần Quốc Toản', 'Cà Phê 10 Trần Quốc Toản', 'coffee', '10, Trần Quốc Toản, Q.Hải Châu, Đà Nẵng', '1305013196_10-tqt.jpg', '16.0662', '108.222', '2011-05-10 15:39:56', '2011-05-10 15:39:56');

-- ----------------------------
-- Table structure for `tbl_rating`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_rating`;
CREATE TABLE `tbl_rating` (
  `rating` tinyint(11) unsigned NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_id` int(11) NOT NULL,
  PRIMARY KEY (`rating`,`photo_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_rating
-- ----------------------------
INSERT INTO tbl_rating VALUES ('5', '1', '36');

-- ----------------------------
-- Table structure for `tbl_report`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_report`;
CREATE TABLE `tbl_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `subject_type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `read` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_report
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_searchs`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_searchs`;
CREATE TABLE `tbl_searchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `keywords` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `hidden` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_searchs
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_user`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayname` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_id` int(11) DEFAULT NULL,
  `password` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `website` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `information` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `type` enum('user','admin') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO tbl_user VALUES ('1', 'huynhnv88', 'huynhnv@gmail.com', '0935928298', 'Huynh Gia Quyen', '107', 'e10adc3949ba59abbe56e057f20f883e', null, '2011-03-27 21:32:58', '2011-05-01 10:47:44', 'http://toancauxanh.vn', 'About you. I want to go around the world and photograph many thing I like, And you?Do you want to go with me.', 'admin');
INSERT INTO tbl_user VALUES ('14', 'hoangkaka', 'hoang@gmail.com', '930394033049', 'Hoang Nguyen', null, 'aacb1807b71b1267ad8a20bb78f931f9', null, '2011-05-03 16:03:07', '2011-05-03 16:03:07', null, null, 'user');
INSERT INTO tbl_user VALUES ('15', 'jellydn', 'dunghd@webdev.vn', '', 'dunghd@webdev.vn', null, '4297f44b13955235245b2497399d7a93', null, '2011-05-08 11:00:45', '2011-05-08 11:00:45', null, null, 'admin');
INSERT INTO tbl_user VALUES ('18', 'test', 'testuser@gmail.com', '', 'dunghd@webdev.vn', null, '123qwe123', null, '2011-05-09 23:35:35', '2011-05-09 23:35:35', null, null, 'user');
