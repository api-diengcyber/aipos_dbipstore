/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100138 (10.1.38-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : aipos_phone

 Target Server Type    : MySQL
 Target Server Version : 100138 (10.1.38-MariaDB)
 File Encoding         : 65001

 Date: 05/03/2024 10:25:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tukarphone
-- ----------------------------
DROP TABLE IF EXISTS `tukarphone`;
CREATE TABLE `tukarphone`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_toko` int NULL DEFAULT NULL,
  `id_users` int NULL DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_sales` int NULL DEFAULT NULL,
  `id_orders` int NULL DEFAULT NULL,
  `id_faktur` int NULL DEFAULT NULL,
  `nama_penukar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_penukar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `no_hp_penukar` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tukarphone
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
