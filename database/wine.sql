# Host: localhost  (Version: 5.5.47)
# Date: 2017-07-06 23:33:57
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tdc_gt_iteminfo"
#

CREATE TABLE `tdc_gt_iteminfo` (
  `TDC_GT_ItemID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TDC_GT_ItemName` varchar(400) NOT NULL,
  `TDC_GT_ItemNo` varchar(40) DEFAULT NULL,
  `TDC_GT_ItemPrice` decimal(10,2) DEFAULT NULL COMMENT '扫码价',
  `TDC_GT_UnifyPrice` decimal(10,2) DEFAULT NULL COMMENT '统一零售价',
  `TDC_GT_CountryOfOrigin_Ref` int(10) DEFAULT NULL,
  `TDC_GT_leaveFactoryDate` date DEFAULT NULL COMMENT '出厂日期',
  `TDC_GT_PortOfShipment_Ref` int(10) DEFAULT NULL,
  `TDC_GT_SalePlatform_Ref` int(10) DEFAULT NULL,
  `TDC_GT_InspectionDate` date DEFAULT NULL,
  `TDC_GT_InspectionNo` varchar(40) DEFAULT NULL,
  `TDC_GT_DeclarationDate` date DEFAULT NULL,
  `TDC_GT_DeclarationNo` varchar(40) DEFAULT NULL,
  `TDC_GT_ShopID_Ref` int(10) DEFAULT NULL,
  `TDC_GT_Status` smallint(6) NOT NULL DEFAULT '0',
  `TDC_GT_ExamineTime` datetime DEFAULT NULL,
  `TDC_GT_AddTime` datetime DEFAULT NULL,
  PRIMARY KEY (`TDC_GT_ItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_gt_iteminfo"
#

INSERT INTO `tdc_gt_iteminfo` VALUES (1,'红酒','123456',123.00,124.00,1,'2016-05-18',NULL,NULL,NULL,NULL,NULL,NULL,1,0,NULL,NULL);

#
# Structure for table "tdc_master"
#

CREATE TABLE `tdc_master` (
  `TDC_No` bigint(20) NOT NULL AUTO_INCREMENT,
  `TDC_URL` varchar(200) DEFAULT NULL,
  `TDC_FWID` varchar(20) DEFAULT NULL,
  `TDC_Count` int(10) NOT NULL DEFAULT '0',
  `TDC_Active` varchar(10) NOT NULL DEFAULT 'N',
  `TDC_FWTime` datetime DEFAULT NULL,
  `TDC_ShopID_Ref` int(10) DEFAULT NULL,
  `TDC_ItemID_Ref` bigint(20) DEFAULT NULL,
  `TDC_TradeForm_Ref` int(10) DEFAULT NULL,
  `TDC_TYPE` int(4) DEFAULT NULL,
  `Function_Type` int(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`TDC_No`),
  UNIQUE KEY `TDC_FWID` (`TDC_FWID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_master"
#

INSERT INTO `tdc_master` VALUES (1,'http://hj.zzguojilugang.com/wine/index.php/Qr_Code/show?tdcno=AGM=','5793561300166',0,'Y',NULL,NULL,1,NULL,1,1);

#
# Structure for table "tdc_origininfo"
#

CREATE TABLE `tdc_origininfo` (
  `TDC_OriginID` int(10) NOT NULL AUTO_INCREMENT,
  `TDC_OriginName` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`TDC_OriginID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_origininfo"
#

INSERT INTO `tdc_origininfo` VALUES (1,'德国'),(3,'西班牙');

#
# Structure for table "tdc_shopinfo"
#

CREATE TABLE `tdc_shopinfo` (
  `TDC_ShopID` int(10) NOT NULL AUTO_INCREMENT,
  `TDC_SellerName` varchar(200) NOT NULL,
  `TDC_ShopContactPerson` varchar(200) DEFAULT NULL,
  `TDC_ShopPhoneNo` varchar(200) DEFAULT NULL,
  `TDC_ShopEmail` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`TDC_ShopID`),
  UNIQUE KEY `TDC_SellerName` (`TDC_SellerName`),
  UNIQUE KEY `TDC_SellerName_2` (`TDC_SellerName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_shopinfo"
#

INSERT INTO `tdc_shopinfo` VALUES (1,'深圳公司','ypj','1234567890','12567@qq.com');

#
# Structure for table "tdc_user"
#

CREATE TABLE `tdc_user` (
  `TDC_id` int(2) NOT NULL AUTO_INCREMENT,
  `User_Id` varchar(20) DEFAULT NULL,
  `User_Name` varchar(20) DEFAULT NULL,
  `User_Password` varchar(20) DEFAULT NULL,
  `User_Tag` tinyint(1) DEFAULT NULL,
  `User_Platform` int(20) NOT NULL,
  `User_Register_Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`TDC_id`),
  UNIQUE KEY `id` (`TDC_id`),
  UNIQUE KEY `User_Id` (`User_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_user"
#

INSERT INTO `tdc_user` VALUES (16,'admin','admin','admin718',NULL,0,'2016-12-23 15:06:27');
