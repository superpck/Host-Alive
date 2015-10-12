CREATE TABLE `cchangwat` (
  `changwatcode` varchar(2) NOT NULL,
  `changwatname` varchar(255) DEFAULT NULL,
  `zonecode` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`changwatcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `host_group` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `group_topic` varchar(45) DEFAULT NULL,
  `type` enum('ADMIN','HOSPITAL') DEFAULT 'HOSPITAL',
  `group_title` varchar(200) DEFAULT NULL,
  `page_title` varchar(200) DEFAULT NULL,
  `showmap` tinyint(1) DEFAULT '0',
  `lastupdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ref`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `host_user` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `id` varchar(20) DEFAULT NULL,
  `pname` varchar(20) DEFAULT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `hospcode` varchar(5) DEFAULT NULL,
  `office` varchar(50) DEFAULT NULL,
  `postion` varchar(50) DEFAULT NULL,
  `position_level` varchar(100) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `lastupdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ref`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `session` (
  `sessionid` varchar(128) NOT NULL,
  `date` datetime DEFAULT NULL,
  `userid` varchar(20) DEFAULT NULL,
  `device_info` varchar(200) DEFAULT NULL,
  `ip` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sessionid`),
  KEY `date` (`date`),
  KEY `ip` (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `host_detail` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `host` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `detail` text,
  `groupid` int(4) DEFAULT NULL,
  `port` varchar(50) NOT NULL DEFAULT '80',
  `tel` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `duration` int(11) NOT NULL DEFAULT '300' COMMENT 'Seconds',
  `lastcheck` datetime DEFAULT NULL,
  `laststatus` tinyint(2) NOT NULL DEFAULT '0',
  `active` enum('0','1') DEFAULT '1',
  `remark` text,
  `lastupdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ref`),
  UNIQUE KEY `host` (`host`,`groupid`),
  KEY `group` (`groupid`),
  KEY `userid` (`userid`),
  KEY `name` (`name`),
  KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `host_status` (
  `ref` int(11) NOT NULL AUTO_INCREMENT,
  `host` int(11) DEFAULT NULL,
  `port` varchar(5) DEFAULT NULL,
  `result` enum('0','1') DEFAULT '0',
  `date` datetime DEFAULT NULL,
  `duration` float(11,2) DEFAULT NULL,
  PRIMARY KEY (`ref`),
  KEY `host` (`host`),
  KEY `date` (`date`),
  CONSTRAINT `host_status_ibfk_1` FOREIGN KEY (`host`) REFERENCES `host_detail` (`ref`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `host_group` VALUES ('1', 'SUPERUSER', null, 'ADMIN', null, null, '0', now());
INSERT INTO `host_group` VALUES ('2', 'ADMIN', null, 'ADMIN', null, null, '0', now());
INSERT INTO `host_group` VALUES ('11', 'OFFICE', 'Status of your office', 'USER', 'Monitoring@OFFICE', 'Monitoring system of my Server', '0', now());

INSERT INTO `host_user` VALUES ('1', 'USER', 'นาย', 'ผู้ดูแลระบบ', '', 'OFFICE', null, null, null, 'ADMIN,OFFICE', now());

INSERT INTO `host_detail` VALUES ('1', '192.168.0.1', 'data server', null, '11', '22,80,8080,3306', null, 'example@mail.com', '1', '300', now(), null, null, null, now());
INSERT INTO `host_detail` VALUES ('2', 'google.com', 'google server', null, '11', '80', null, 'example@mail.com', '1', '300', now(), null, null, null, now());

-- ----------------------------
-- Records of cchangwat
-- ----------------------------
INSERT INTO `cchangwat` VALUES ('10', 'กรุงเทพมหานคร', '13');
INSERT INTO `cchangwat` VALUES ('11', 'สมุทรปราการ', '06');
INSERT INTO `cchangwat` VALUES ('12', 'นนทบุรี', '04');
INSERT INTO `cchangwat` VALUES ('13', 'ปทุมธานี', '04');
INSERT INTO `cchangwat` VALUES ('14', 'พระนครศรีอยุธยา', '04');
INSERT INTO `cchangwat` VALUES ('15', 'อ่างทอง', '04');
INSERT INTO `cchangwat` VALUES ('16', 'ลพบุรี', '04');
INSERT INTO `cchangwat` VALUES ('17', 'สิงห์บุรี', '04');
INSERT INTO `cchangwat` VALUES ('18', 'ชัยนาท', '03');
INSERT INTO `cchangwat` VALUES ('19', 'สระบุรี', '04');
INSERT INTO `cchangwat` VALUES ('20', 'ชลบุรี', '06');
INSERT INTO `cchangwat` VALUES ('21', 'ระยอง', '06');
INSERT INTO `cchangwat` VALUES ('22', 'จันทบุรี', '06');
INSERT INTO `cchangwat` VALUES ('23', 'ตราด', '06');
INSERT INTO `cchangwat` VALUES ('24', 'ฉะเชิงเทรา', '06');
INSERT INTO `cchangwat` VALUES ('25', 'ปราจีนบุรี', '06');
INSERT INTO `cchangwat` VALUES ('26', 'นครนายก', '04');
INSERT INTO `cchangwat` VALUES ('27', 'สระแก้ว', '06');
INSERT INTO `cchangwat` VALUES ('30', 'นครราชสีมา', '09');
INSERT INTO `cchangwat` VALUES ('31', 'บุรีรัมย์', '09');
INSERT INTO `cchangwat` VALUES ('32', 'สุรินทร์', '09');
INSERT INTO `cchangwat` VALUES ('33', 'ศรีสะเกษ', '10');
INSERT INTO `cchangwat` VALUES ('34', 'อุบลราชธานี', '10');
INSERT INTO `cchangwat` VALUES ('35', 'ยโสธร', '10');
INSERT INTO `cchangwat` VALUES ('36', 'ชัยภูมิ', '09');
INSERT INTO `cchangwat` VALUES ('37', 'อำนาจเจริญ', '10');
INSERT INTO `cchangwat` VALUES ('38', 'บึงกาฬ', '08');
INSERT INTO `cchangwat` VALUES ('39', 'หนองบัวลำภู', '08');
INSERT INTO `cchangwat` VALUES ('40', 'ขอนแก่น', '07');
INSERT INTO `cchangwat` VALUES ('41', 'อุดรธานี', '08');
INSERT INTO `cchangwat` VALUES ('42', 'เลย', '08');
INSERT INTO `cchangwat` VALUES ('43', 'หนองคาย', '08');
INSERT INTO `cchangwat` VALUES ('44', 'มหาสารคาม', '07');
INSERT INTO `cchangwat` VALUES ('45', 'ร้อยเอ็ด', '07');
INSERT INTO `cchangwat` VALUES ('46', 'กาฬสินธุ์', '07');
INSERT INTO `cchangwat` VALUES ('47', 'สกลนคร', '08');
INSERT INTO `cchangwat` VALUES ('48', 'นครพนม', '08');
INSERT INTO `cchangwat` VALUES ('49', 'มุกดาหาร', '10');
INSERT INTO `cchangwat` VALUES ('50', 'เชียงใหม่', '01');
INSERT INTO `cchangwat` VALUES ('51', 'ลำพูน', '01');
INSERT INTO `cchangwat` VALUES ('52', 'ลำปาง', '01');
INSERT INTO `cchangwat` VALUES ('53', 'อุตรดิตถ์', '02');
INSERT INTO `cchangwat` VALUES ('54', 'แพร่', '01');
INSERT INTO `cchangwat` VALUES ('55', 'น่าน', '01');
INSERT INTO `cchangwat` VALUES ('56', 'พะเยา', '01');
INSERT INTO `cchangwat` VALUES ('57', 'เชียงราย', '01');
INSERT INTO `cchangwat` VALUES ('58', 'แม่ฮ่องสอน', '01');
INSERT INTO `cchangwat` VALUES ('60', 'นครสวรรค์', '03');
INSERT INTO `cchangwat` VALUES ('61', 'อุทัยธานี', '03');
INSERT INTO `cchangwat` VALUES ('62', 'กำแพงเพชร', '03');
INSERT INTO `cchangwat` VALUES ('63', 'ตาก', '02');
INSERT INTO `cchangwat` VALUES ('64', 'สุโขทัย', '02');
INSERT INTO `cchangwat` VALUES ('65', 'พิษณุโลก', '02');
INSERT INTO `cchangwat` VALUES ('66', 'พิจิตร', '03');
INSERT INTO `cchangwat` VALUES ('67', 'เพชรบูรณ์', '02');
INSERT INTO `cchangwat` VALUES ('70', 'ราชบุรี', '05');
INSERT INTO `cchangwat` VALUES ('71', 'กาญจนบุรี', '05');
INSERT INTO `cchangwat` VALUES ('72', 'สุพรรณบุรี', '05');
INSERT INTO `cchangwat` VALUES ('73', 'นครปฐม', '05');
INSERT INTO `cchangwat` VALUES ('74', 'สมุทรสาคร', '05');
INSERT INTO `cchangwat` VALUES ('75', 'สมุทรสงคราม', '05');
INSERT INTO `cchangwat` VALUES ('76', 'เพชรบุรี', '05');
INSERT INTO `cchangwat` VALUES ('77', 'ประจวบคีรีขันธ์', '05');
INSERT INTO `cchangwat` VALUES ('80', 'นครศรีธรรมราช', '11');
INSERT INTO `cchangwat` VALUES ('81', 'กระบี่', '11');
INSERT INTO `cchangwat` VALUES ('82', 'พังงา', '11');
INSERT INTO `cchangwat` VALUES ('83', 'ภูเก็ต', '11');
INSERT INTO `cchangwat` VALUES ('84', 'สุราษฎร์ธานี', '11');
INSERT INTO `cchangwat` VALUES ('85', 'ระนอง', '11');
INSERT INTO `cchangwat` VALUES ('86', 'ชุมพร', '11');
INSERT INTO `cchangwat` VALUES ('90', 'สงขลา', '12');
INSERT INTO `cchangwat` VALUES ('91', 'สตูล', '12');
INSERT INTO `cchangwat` VALUES ('92', 'ตรัง', '12');
INSERT INTO `cchangwat` VALUES ('93', 'พัทลุง', '12');
INSERT INTO `cchangwat` VALUES ('94', 'ปัตตานี', '12');
INSERT INTO `cchangwat` VALUES ('95', 'ยะลา', '12');
INSERT INTO `cchangwat` VALUES ('96', 'นราธิวาส', '12');
INSERT INTO `cchangwat` VALUES ('99', 'ไม่ทราบ', '99');
