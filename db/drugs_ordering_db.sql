/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50621
Source Host           : 127.0.0.1:3306
Source Database       : drugs_ordering_db

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2019-07-20 12:18:09
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for in_sysprvlg
-- ----------------------------
DROP TABLE IF EXISTS `in_sysprvlg`;
CREATE TABLE `in_sysprvlg` (
  `prvCode` int(11) NOT NULL,
  `prvName` varchar(100) NOT NULL,
  `prvStatus` int(3) NOT NULL DEFAULT '1',
  `usrPrvMnuName` varchar(100) NOT NULL,
  `usrPrvMnuName_sinhala` varchar(255) DEFAULT NULL,
  `usrPrvMnuIcon` varchar(45) DEFAULT '',
  `usrPrvMnuPath` varchar(100) NOT NULL,
  `usrPrnt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prvCode`),
  UNIQUE KEY `user_privilage_code` (`prvCode`),
  UNIQUE KEY `user_privilage_code_2` (`prvCode`,`prvName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of in_sysprvlg
-- ----------------------------
INSERT INTO `in_sysprvlg` VALUES ('0', '', '1', '', null, '', '', '0');
INSERT INTO `in_sysprvlg` VALUES ('100', 'Administrative Settings', '1', 'User Administration', 'Administrative', '', '', '0');
INSERT INTO `in_sysprvlg` VALUES ('101', 'User Management', '1', 'User Management', 'User Management', 'usermanege.png', 'user_manegement_view.php', '111');
INSERT INTO `in_sysprvlg` VALUES ('102', 'Item Managagement', '1', 'Item Managagement', 'Item Managagement', 'companies-in-png-2.png', 'item_reg_view.php', '102');
INSERT INTO `in_sysprvlg` VALUES ('103', 'Lecture Management', '1', 'Lecture Management', 'Lecture Management', 'cashier2.png', 'lecture_reg_view.php', '103');
INSERT INTO `in_sysprvlg` VALUES ('104', 'Course Management', '1', 'Course Management', 'Course Management', 'cashier2.png', 'cource_reg_view.php', '104');
INSERT INTO `in_sysprvlg` VALUES ('105', 'Student Management', '1', 'Student Management', 'Student Management', 'cashier2.png', 'student_reg_view.php', '105');
INSERT INTO `in_sysprvlg` VALUES ('106', 'Attendance Mark', '1', 'Attendance Mark', 'Attendance Mark', 'repo.png', 'attendance_mark_view.php', '106');
INSERT INTO `in_sysprvlg` VALUES ('107', 'Report', '1', 'Report', 'Report', 'repo.png', 'all_report_view.php', '107');
INSERT INTO `in_sysprvlg` VALUES ('200', 'Back Up', '1', 'Back Up', 'Back Up', 'backup.png', 'back_up_view.php', '200');

-- ----------------------------
-- Table structure for in_usr
-- ----------------------------
DROP TABLE IF EXISTS `in_usr`;
CREATE TABLE `in_usr` (
  `usrID` int(11) NOT NULL AUTO_INCREMENT,
  `usrName` varchar(50) NOT NULL DEFAULT '',
  `usrFName` varchar(100) DEFAULT NULL,
  `usrLName` varchar(100) DEFAULT NULL,
  `usrLevel` int(11) NOT NULL DEFAULT '1',
  `usrPwd` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `usrRegDate` date NOT NULL DEFAULT '0000-00-00',
  `usrStatus` int(1) NOT NULL DEFAULT '1',
  `usrAddress` varchar(200) DEFAULT NULL,
  `usrEmail` varchar(150) DEFAULT NULL,
  `lstLgDate` date NOT NULL,
  `lstLgTime` time NOT NULL,
  `usrEmpNo` varchar(100) DEFAULT NULL,
  `usrNIC` varchar(20) DEFAULT NULL,
  `usrMobileNo` varchar(20) DEFAULT NULL,
  `usrWorkTelNo` varchar(20) DEFAULT NULL,
  `usrHomeTelNo` varchar(20) DEFAULT NULL,
  `userBranchID` int(11) NOT NULL,
  PRIMARY KEY (`usrID`,`usrName`),
  UNIQUE KEY `usrEmpNo` (`usrEmpNo`),
  UNIQUE KEY `usrNIC` (`usrNIC`),
  UNIQUE KEY `usrEmpNo_2` (`usrEmpNo`,`usrNIC`),
  KEY `id` (`usrID`),
  KEY `user_level` (`usrLevel`),
  KEY `user_name` (`usrName`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of in_usr
-- ----------------------------
INSERT INTO `in_usr` VALUES ('89', 'gdadmin', '', '', '188', '360eef5c4f8809a466c9a87f6e2e1cd32e8013d8', '2018-12-28', '1', '', '', '2018-12-28', '10:38:33', '', '', '', '', '', '1');
INSERT INTO `in_usr` VALUES ('94', 'cashier1', '', '', '192', '137bcfbf2ebc227a0b6208ca266f0094f2954ecc', '2018-12-28', '1', '', '', '2018-12-28', '10:43:22', '455', '921475478V', '', '', '', '1');
INSERT INTO `in_usr` VALUES ('95', 'admin', 'admin', 'dmin', '188', '56e2636af1fedd1c6f89df1ea09bf1ba120f52e7', '2019-03-14', '1', '545', '', '2019-03-14', '02:43:38', '11', '925454544v', '', '', '', '1');

-- ----------------------------
-- Table structure for in_usrlevel
-- ----------------------------
DROP TABLE IF EXISTS `in_usrlevel`;
CREATE TABLE `in_usrlevel` (
  `lvID` int(11) NOT NULL AUTO_INCREMENT,
  `lvName` varchar(100) DEFAULT NULL,
  `usrLvlPrvSeq` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lvID`),
  UNIQUE KEY `usrLvlPrvSeq` (`usrLvlPrvSeq`),
  UNIQUE KEY `admin_level_name` (`lvName`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of in_usrlevel
-- ----------------------------
INSERT INTO `in_usrlevel` VALUES ('18', 'Super User', '20');
INSERT INTO `in_usrlevel` VALUES ('188', 'admin', '1');
INSERT INTO `in_usrlevel` VALUES ('192', 'User', '3');

-- ----------------------------
-- Table structure for in_usrlvlpriv
-- ----------------------------
DROP TABLE IF EXISTS `in_usrlvlpriv`;
CREATE TABLE `in_usrlvlpriv` (
  `usrLvl` int(11) NOT NULL,
  `usrPrivilage` int(11) NOT NULL,
  PRIMARY KEY (`usrLvl`,`usrPrivilage`),
  UNIQUE KEY `usrLvl` (`usrLvl`,`usrPrivilage`),
  KEY `usrPrivilage` (`usrPrivilage`),
  CONSTRAINT `in_usrlvlpriv_ibfk_1` FOREIGN KEY (`usrLvl`) REFERENCES `in_usrlevel` (`lvID`) ON UPDATE CASCADE,
  CONSTRAINT `in_usrlvlpriv_ibfk_2` FOREIGN KEY (`usrPrivilage`) REFERENCES `in_sysprvlg` (`prvCode`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of in_usrlvlpriv
-- ----------------------------

-- ----------------------------
-- Table structure for in_usrprvlg
-- ----------------------------
DROP TABLE IF EXISTS `in_usrprvlg`;
CREATE TABLE `in_usrprvlg` (
  `usrID` int(11) NOT NULL,
  `usrPrvCode` int(11) NOT NULL,
  PRIMARY KEY (`usrID`,`usrPrvCode`),
  UNIQUE KEY `usrID` (`usrID`,`usrPrvCode`),
  KEY `usrPrvCode` (`usrPrvCode`),
  CONSTRAINT `in_usrprvlg_ibfk_1` FOREIGN KEY (`usrID`) REFERENCES `in_usr` (`usrID`) ON UPDATE CASCADE,
  CONSTRAINT `in_usrprvlg_ibfk_2` FOREIGN KEY (`usrPrvCode`) REFERENCES `in_sysprvlg` (`prvCode`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of in_usrprvlg
-- ----------------------------
INSERT INTO `in_usrprvlg` VALUES ('95', '0');
INSERT INTO `in_usrprvlg` VALUES ('89', '100');
INSERT INTO `in_usrprvlg` VALUES ('94', '100');
INSERT INTO `in_usrprvlg` VALUES ('95', '100');
INSERT INTO `in_usrprvlg` VALUES ('89', '101');
INSERT INTO `in_usrprvlg` VALUES ('95', '101');
INSERT INTO `in_usrprvlg` VALUES ('89', '102');
INSERT INTO `in_usrprvlg` VALUES ('94', '102');
INSERT INTO `in_usrprvlg` VALUES ('95', '102');
INSERT INTO `in_usrprvlg` VALUES ('89', '103');
INSERT INTO `in_usrprvlg` VALUES ('94', '103');
INSERT INTO `in_usrprvlg` VALUES ('95', '103');
INSERT INTO `in_usrprvlg` VALUES ('89', '104');
INSERT INTO `in_usrprvlg` VALUES ('94', '104');
INSERT INTO `in_usrprvlg` VALUES ('95', '104');
INSERT INTO `in_usrprvlg` VALUES ('89', '105');
INSERT INTO `in_usrprvlg` VALUES ('95', '105');
INSERT INTO `in_usrprvlg` VALUES ('89', '106');
INSERT INTO `in_usrprvlg` VALUES ('94', '106');
INSERT INTO `in_usrprvlg` VALUES ('95', '106');
INSERT INTO `in_usrprvlg` VALUES ('89', '107');
INSERT INTO `in_usrprvlg` VALUES ('95', '107');
INSERT INTO `in_usrprvlg` VALUES ('89', '200');
INSERT INTO `in_usrprvlg` VALUES ('95', '200');

-- ----------------------------
-- Table structure for item_deatails
-- ----------------------------
DROP TABLE IF EXISTS `item_deatails`;
CREATE TABLE `item_deatails` (
  `item_id` int(10) NOT NULL AUTO_INCREMENT,
  `sub_cat_id` int(10) NOT NULL,
  `item_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `item_description` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  `item_discount` double(10,2) DEFAULT NULL,
  `item_image` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `item_video` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  `item_view_status` int(2) DEFAULT '0' COMMENT '0== Active / 1== Diactive',
  PRIMARY KEY (`item_id`),
  KEY `sub_cat_id` (`sub_cat_id`),
  CONSTRAINT `sub_cat_id` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of item_deatails
-- ----------------------------

-- ----------------------------
-- Table structure for main_cat
-- ----------------------------
DROP TABLE IF EXISTS `main_cat`;
CREATE TABLE `main_cat` (
  `main_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_cat_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `view_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0== Active / 1== Diactive',
  PRIMARY KEY (`main_cat_id`),
  KEY `main_cat` (`main_cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of main_cat
-- ----------------------------
INSERT INTO `main_cat` VALUES ('3', 'Bio Treetment', '0');
INSERT INTO `main_cat` VALUES ('7', 'Hearbs', '0');
INSERT INTO `main_cat` VALUES ('8', 'Vitamin', '0');
INSERT INTO `main_cat` VALUES ('9', 'Suppliment ', '0');
INSERT INTO `main_cat` VALUES ('15', 'Depressants', '0');
INSERT INTO `main_cat` VALUES ('17', 'Stimulants', '0');
INSERT INTO `main_cat` VALUES ('21', 'Eye Face cream', '0');

-- ----------------------------
-- Table structure for sub_cat
-- ----------------------------
DROP TABLE IF EXISTS `sub_cat`;
CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `view_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0== Active / 1== Diactive',
  PRIMARY KEY (`sub_cat_id`),
  KEY `main_cat_id` (`main_cat_id`),
  CONSTRAINT `main_cat` FOREIGN KEY (`main_cat_id`) REFERENCES `main_cat` (`main_cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of sub_cat
-- ----------------------------
INSERT INTO `sub_cat` VALUES ('1', '9', '', '0');
INSERT INTO `sub_cat` VALUES ('2', '9', '', '0');
INSERT INTO `sub_cat` VALUES ('3', '8', 'rer', '0');
INSERT INTO `sub_cat` VALUES ('4', '3', 'Bio vta', '0');
INSERT INTO `sub_cat` VALUES ('5', '9', 'dsd', '0');
INSERT INTO `sub_cat` VALUES ('6', '9', 'Aloe ', '0');
INSERT INTO `sub_cat` VALUES ('7', '15', 'Benziodiazepines', '0');
INSERT INTO `sub_cat` VALUES ('8', '15', 'Valium', '0');
INSERT INTO `sub_cat` VALUES ('9', '15', 'Rohypnol', '0');
INSERT INTO `sub_cat` VALUES ('10', '7', 'herbz', '0');
INSERT INTO `sub_cat` VALUES ('11', '9', 'Amino Acids ', '0');
INSERT INTO `sub_cat` VALUES ('12', '21', 'Eye Vitamin', '0');
INSERT INTO `sub_cat` VALUES ('13', '17', 'Ritalin', '0');
INSERT INTO `sub_cat` VALUES ('14', '17', 'Adderall', '0');
