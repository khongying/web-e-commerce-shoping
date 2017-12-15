/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : shop_doraemon

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-15 15:24:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for member
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` text,
  `phone` varchar(10) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('18', 'admin@gmail.com', '1234', 'Admin', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี', '0922720107', '1');
INSERT INTO `member` VALUES ('19', 'test@gmail.com', '1234', 'สมหญิง ร่ำรวย', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี ', '0922723107', '0');

-- ----------------------------
-- Table structure for payment
-- ----------------------------
DROP TABLE IF EXISTS `payment`;
CREATE TABLE `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_po_no` varchar(100) DEFAULT NULL,
  `name_post` varchar(255) DEFAULT NULL,
  `address_post` varchar(255) DEFAULT NULL,
  `phone_post` varchar(10) DEFAULT NULL,
  `img_post` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payment
-- ----------------------------
INSERT INTO `payment` VALUES ('4', 'PO201712143', 'สมหญิง ร่ำรวย', '15/10 ม.5 ต.พลิ้ว อ.แหลมสิงห์ จ.จันทบุรี ', '0922723107', '20171215071428_w4.jpg');

-- ----------------------------
-- Table structure for po
-- ----------------------------
DROP TABLE IF EXISTS `po`;
CREATE TABLE `po` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `po_no` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `member` varchar(100) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of po
-- ----------------------------
INSERT INTO `po` VALUES ('00001', 'PO201712140001', '1', '18', '2017-12-14 17:15:14');
INSERT INTO `po` VALUES ('00002', 'PO201712142', '1', '18', '2017-12-14 17:49:00');
INSERT INTO `po` VALUES ('00003', 'PO201712143', '2', '19', '2017-12-14 19:12:33');

-- ----------------------------
-- Table structure for po_item
-- ----------------------------
DROP TABLE IF EXISTS `po_item`;
CREATE TABLE `po_item` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ref_po_no` varchar(100) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `qty` int(100) DEFAULT NULL,
  `unit_price` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of po_item
-- ----------------------------
INSERT INTO `po_item` VALUES ('1', 'PO201712140001', 'B-001', '6', '199');
INSERT INTO `po_item` VALUES ('2', 'PO201712140001', 'T-001', '1', '199');
INSERT INTO `po_item` VALUES ('3', 'PO201712142', 'B-001', '1', '199');
INSERT INTO `po_item` VALUES ('4', 'PO201712142', 'C-003', '2', '200');
INSERT INTO `po_item` VALUES ('5', 'PO201712143', 'T-001', '1', '199');
INSERT INTO `po_item` VALUES ('6', 'PO201712143', 'C-003', '6', '200');

-- ----------------------------
-- Table structure for po_status
-- ----------------------------
DROP TABLE IF EXISTS `po_status`;
CREATE TABLE `po_status` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of po_status
-- ----------------------------
INSERT INTO `po_status` VALUES ('1', 'รอแจ้งชำระสินค้า');
INSERT INTO `po_status` VALUES ('2', 'ชำระสินค้าเรียบร้อยแล้ว');
INSERT INTO `po_status` VALUES ('3', 'กำลังจัดส่งสินค้า');
INSERT INTO `po_status` VALUES ('4', 'รอตรวจสอบ');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type_product` varchar(2) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `price` int(10) DEFAULT NULL,
  `total` int(10) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('1', 'B-001', 'กระเป๋าโดเลมอน', 'B', 'กระเป๋าโดเลมอน สีฟ้าสดใส น่ารักสุดๆ', '199', '10', '20171213080420_B12.jpg');
INSERT INTO `product` VALUES ('2', 'T-001', 'เสื้อลายโดเลมอน', 'T', 'น่ารักสุด ใส่ได้ทุกวัย', '199', '5', '20171214050318_t1.jpg');
INSERT INTO `product` VALUES ('3', 'C-003', 'เคส iPhone X ', 'C', 'เคส iPhone X ลายโดเลมอน ทนทาน สีไม่ตก', '200', '6', '20171214054651_c6.jpg');
INSERT INTO `product` VALUES ('4', 'S-005', 'รองสุดเก๋ ', 'S', 'รองสุดเก๋  ใส่ได้ทุกวัย', '450', '6', '20171214081959_s4.jpg');
INSERT INTO `product` VALUES ('5', 'W-006', 'G-Shock โดเลมอน', 'W', 'สวยมากๆเลย ', '350', '10', '20171214082137_w1.jpg');
