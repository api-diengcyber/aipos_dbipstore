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

 Date: 06/03/2024 14:59:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for produk_retail_mutasi
-- ----------------------------
DROP TABLE IF EXISTS `produk_retail_mutasi`;
CREATE TABLE `produk_retail_mutasi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_toko` int NULL DEFAULT NULL,
  `id_users` int NULL DEFAULT NULL,
  `tgl` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_produk` int NULL DEFAULT NULL,
  `id_users_asal` int NULL DEFAULT NULL,
  `id_users_tujuan` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of produk_retail_mutasi
-- ----------------------------
INSERT INTO `produk_retail_mutasi` VALUES (5, 158, 1, '06-03-2024', 3, 1, 3, 'Pindah Stok');
INSERT INTO `produk_retail_mutasi` VALUES (6, 158, 1, '06-03-2024', 1, 1, 3, 'Pindah');
INSERT INTO `produk_retail_mutasi` VALUES (7, 158, 1, '06-03-2024', 2, 1, 3, 'Pindah');

SET FOREIGN_KEY_CHECKS = 1;
