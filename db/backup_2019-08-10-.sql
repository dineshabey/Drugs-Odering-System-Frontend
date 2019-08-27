-- Dumping tables for database: `drugs_ordering_db`


SET FOREIGN_KEY_CHECKS=0; 


-- Dumping structure for table: `customer_added_item`

DROP TABLE IF EXISTS `customer_added_item`;
CREATE TABLE `customer_added_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cus_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `item_discount` double(10,2) NOT NULL DEFAULT '0.00',
  `item_unit_price` double(10,2) NOT NULL,
  `item_qty` double(10,2) NOT NULL,
  `item_tot_price` double(10,2) NOT NULL,
  `pay_status` int(2) NOT NULL DEFAULT '0' COMMENT 'No pay == 0 // payied == 1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: customer_added_item



-- Dumping structure for table: `customer_deatails`

DROP TABLE IF EXISTS `customer_deatails`;
CREATE TABLE `customer_deatails` (
  `cus_id` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `l_name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `coustomer_login_status` int(2) DEFAULT NULL,
  `account_status` int(2) DEFAULT '0' COMMENT 'account_status == 0 Active // account_status == 1 Deactive ',
  `reg_date` date DEFAULT NULL,
  `reg_time` time DEFAULT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: customer_deatails

INSERT INTO `customer_deatails` VALUES('1', 'dinesh', 'abeysinghe', 'a@gmail.com', 'Thattewa', 'siyambalagashena Road, Kadurugas Junction,', '712484476', '123', '', '0', '0000-00-00', '');
INSERT INTO `customer_deatails` VALUES('2', 'dinesh', 'abeysinghe', 'b@gmail.com', 'Thattewa', 'siyambalagashena Road, Kadurugas Junction,', '712484476', '456', '', '0', '2019-08-09', '');
INSERT INTO `customer_deatails` VALUES('3', 'dinesh', 'abeysinghe', 'c@gmail.com', 'Thattewa', 'siyambalagashena Road, Kadurugas Junction,', '712484476', '789', '', '0', '2019-08-09', '06:26:13');
INSERT INTO `customer_deatails` VALUES('4', 'dinesh', 'abeysinghe', 'd@gmail.com', 'Thattewa', 'siyambalagashena Road, Kadurugas Junction,', '712484476', '321', '', '0', '2019-08-09', '06:29:44');
INSERT INTO `customer_deatails` VALUES('5', 'dinesh', 'abeysinghe', 'e@gmail.com', 'Thattewa', 'siyambalagashena Road, Kadurugas Junction,', '712484476', '111', '', '0', '2019-08-09', '07:35:23');


-- Dumping structure for table: `in_sysprvlg`

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



-- Dumping data for table: in_sysprvlg

INSERT INTO `in_sysprvlg` VALUES('101', 'User Management', '1', 'User Management', 'User Management', 'usermanege.png', 'user_manegement_view.php', '111');
INSERT INTO `in_sysprvlg` VALUES('102', 'Item Managagement', '1', 'Item Managagement', 'Item Managagement', 'add_item.png', 'item_reg_view.php', '102');
INSERT INTO `in_sysprvlg` VALUES('200', 'Back Up', '1', 'Back Up', 'Back Up', 'backup.png', 'back_up_view.php', '200');


-- Dumping structure for table: `in_usr`

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
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;



-- Dumping data for table: in_usr

INSERT INTO `in_usr` VALUES('89', 'systemadmin', 'dinesh', 'abeysinghe', '188', '1843fd43ce17a7df90fc1a4db3a63a6cc82c89c1', '2018-12-28', '1', '', '', '2018-12-28', '10:38:33', '66565656', '565656565v', '', '', '', '1');
INSERT INTO `in_usr` VALUES('96', 'nalaka', 'nalaka', 'nawagathegama', '192', '87755fcafa59a5c1b6ecf301bf64d399753098c2', '2019-07-30', '1', 'a', '', '2019-07-30', '12:20:41', '45454', '889898998v', '', '', '', '1');


-- Dumping structure for table: `in_usrlevel`

DROP TABLE IF EXISTS `in_usrlevel`;
CREATE TABLE `in_usrlevel` (
  `lvID` int(11) NOT NULL AUTO_INCREMENT,
  `lvName` varchar(100) DEFAULT NULL,
  `usrLvlPrvSeq` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`lvID`),
  UNIQUE KEY `usrLvlPrvSeq` (`usrLvlPrvSeq`),
  UNIQUE KEY `admin_level_name` (`lvName`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;



-- Dumping data for table: in_usrlevel

INSERT INTO `in_usrlevel` VALUES('18', 'Super User', '20');
INSERT INTO `in_usrlevel` VALUES('188', 'admin', '1');
INSERT INTO `in_usrlevel` VALUES('192', 'User', '3');


-- Dumping structure for table: `in_usrlvlpriv`

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



-- Dumping data for table: in_usrlvlpriv



-- Dumping structure for table: `in_usrprvlg`

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



-- Dumping data for table: in_usrprvlg

INSERT INTO `in_usrprvlg` VALUES('89', '101');
INSERT INTO `in_usrprvlg` VALUES('89', '102');
INSERT INTO `in_usrprvlg` VALUES('89', '200');
INSERT INTO `in_usrprvlg` VALUES('96', '102');


-- Dumping structure for table: `item_deatails`

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
  `vdo_status` int(1) DEFAULT '0' COMMENT '0 == no video // 1 == availabel vdo',
  `img_status` int(1) DEFAULT '0' COMMENT '0== no img // 1== availabel img',
  PRIMARY KEY (`item_id`),
  KEY `sub_cat_id` (`sub_cat_id`),
  CONSTRAINT `sub_cat_id` FOREIGN KEY (`sub_cat_id`) REFERENCES `sub_cat` (`sub_cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: item_deatails

INSERT INTO `item_deatails` VALUES('4', '24', 'Vitamin - A', ' Vitamins', '5000.00', '500.00', '235265.jpg', '', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('5', '3', 'B', '	How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value fro', '7000.00', '15000.00', '6 (Custom)93061.jpg', '', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('6', '3', 'Vitamin - C', '	How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value fro', '8000.00', '2000.00', '535699.jpg', '', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('7', '12', 'Night Cream', 'How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from', '33500.00', '1200.00', '5 (Custom)55375.jpg', '', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('8', '12', 'Face cream', ' Fcae ', '3500.00', '500.00', '2 (Custom)21071.jpg', '', '0', '1', '1');
INSERT INTO `item_deatails` VALUES('9', '3', 'E', 'value from the combo box using jQuery.How Can I get selected text value from', '5000.00', '200.00', '845062.jpg', '', '0', '1', '1');
INSERT INTO `item_deatails` VALUES('10', '3', 'D', '	How Can I get selected text value from the combo box using jQuery.How Can I get selected tlected text value from the combo box using jQuery.How ow Can I get selected text value from', '7500.00', '500.00', '465331.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('11', '24', 'Natural Vitamin', ' 	How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value fr', '7500.00', '250.00', '479394.jpg', '', '0', '1', '1');
INSERT INTO `item_deatails` VALUES('22', '3', 'A', 's', '7888.00', '444.00', '815741.jpg', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/_tBZM1sNT9M\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '1', '1', '1');
INSERT INTO `item_deatails` VALUES('24', '12', 'Test', 'e from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the com', '3500.00', '565.00', '228657.jpg', '', '0', '1', '1');
INSERT INTO `item_deatails` VALUES('26', '10', 'Herbs shampoo', '56', '4556.00', '656.00', '861157.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('27', '9', 'Rohypnol A', 'Not vitamin', '10000.00', '5000.00', '814680.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('28', '14', 'Milk Suppliment', 'Supliment', '6000.00', '250.00', '455520.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('29', '6', 'Axiio Oil supliment', 'Suplimen', '7800.00', '2500.00', '491692.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('30', '9', 'Rohypnol B', '5', '78565.00', '55.00', '210737.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('31', '29', 'Net Saree', 'Original net wedding saree', '5000.00', '2500.00', 'wedding-sarees-500x50018331.jpg', '<iframe width=\"727\" height=\"409\" src=\"https://www.youtube.com/embed/52WBAYeBCTc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', '0', '1', '1');
INSERT INTO `item_deatails` VALUES('32', '29', 'Laze saree', 'Laze saree', '15000.00', '100.00', '91zc0CBnbLL52929._UY550_', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('33', '29', 'Gold saree', 'Gold saree', '75000.00', '5000.00', 'EAVM-AxU0AA5Ywn16229.jpg', '-', '0', '0', '1');
INSERT INTO `item_deatails` VALUES('34', '24', 'Calcium', 'uery.How Can I get selected text value from the combo box using jQuery.How Can I get selected text value from the combo box using jQuery.How Can I get se', '5000.00', '200.00', 'calsium81398.jpg', '-', '0', '0', '1');


-- Dumping structure for table: `main_cat`

DROP TABLE IF EXISTS `main_cat`;
CREATE TABLE `main_cat` (
  `main_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_cat_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `view_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0== Active / 1== Diactive',
  PRIMARY KEY (`main_cat_id`),
  KEY `main_cat` (`main_cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: main_cat

INSERT INTO `main_cat` VALUES('3', 'Bio Treetment', '1');
INSERT INTO `main_cat` VALUES('7', 'Hearbs', '0');
INSERT INTO `main_cat` VALUES('8', 'Vitamin', '0');
INSERT INTO `main_cat` VALUES('9', 'Suppliment ', '0');
INSERT INTO `main_cat` VALUES('15', 'Depressants', '1');
INSERT INTO `main_cat` VALUES('17', 'Stimulants', '1');
INSERT INTO `main_cat` VALUES('21', 'Eye Face cream', '1');
INSERT INTO `main_cat` VALUES('22', 'Saree', '0');


-- Dumping structure for table: `sub_cat`

DROP TABLE IF EXISTS `sub_cat`;
CREATE TABLE `sub_cat` (
  `sub_cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `main_cat_id` int(10) NOT NULL,
  `sub_cat_name` varchar(200) COLLATE utf8_bin NOT NULL,
  `view_status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0== Active / 1== Diactive',
  PRIMARY KEY (`sub_cat_id`),
  KEY `main_cat_id` (`main_cat_id`),
  CONSTRAINT `main_cat` FOREIGN KEY (`main_cat_id`) REFERENCES `main_cat` (`main_cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: sub_cat

INSERT INTO `sub_cat` VALUES('1', '9', 'Green Tea Extract', '1');
INSERT INTO `sub_cat` VALUES('2', '9', 'Fiber & Prebiotics ', '1');
INSERT INTO `sub_cat` VALUES('3', '8', 'Later Vitamin', '0');
INSERT INTO `sub_cat` VALUES('4', '3', 'Bio vta', '0');
INSERT INTO `sub_cat` VALUES('5', '9', 'Bee Products ', '1');
INSERT INTO `sub_cat` VALUES('6', '9', 'Aloe x', '0');
INSERT INTO `sub_cat` VALUES('7', '15', 'Benziodiazepines', '0');
INSERT INTO `sub_cat` VALUES('8', '15', 'Valium', '0');
INSERT INTO `sub_cat` VALUES('9', '15', 'Rohypnol', '0');
INSERT INTO `sub_cat` VALUES('10', '7', 'herbz', '0');
INSERT INTO `sub_cat` VALUES('11', '9', 'Amino Acids Upaaa', '1');
INSERT INTO `sub_cat` VALUES('12', '21', 'Natural Cream ', '0');
INSERT INTO `sub_cat` VALUES('13', '17', 'Ritalin', '0');
INSERT INTO `sub_cat` VALUES('14', '17', 'Adderall', '0');
INSERT INTO `sub_cat` VALUES('24', '8', 'Multi Vitamins', '0');
INSERT INTO `sub_cat` VALUES('28', '21', 'Face white cream', '0');
INSERT INTO `sub_cat` VALUES('29', '22', 'Wedding Saree', '0');


-- Dumping structure for table: `web_cart`

DROP TABLE IF EXISTS `web_cart`;
CREATE TABLE `web_cart` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `item_id` int(2) DEFAULT NULL,
  `item_qty` int(10) DEFAULT NULL,
  `item_price` double(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_key` (`user_key`,`item_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Dumping data for table: web_cart

INSERT INTO `web_cart` VALUES('39', '::1', '34', '2', '10000.00');
INSERT INTO `web_cart` VALUES('43', '::1', '4', '3', '15000.00');
INSERT INTO `web_cart` VALUES('44', '::1', '31', '2', '10000.00');
INSERT INTO `web_cart` VALUES('45', '::1', '11', '1', '7500.00');
INSERT INTO `web_cart` VALUES('47', '::1', '29', '10', '78000.00');


SET FOREIGN_KEY_CHECKS=1; 

