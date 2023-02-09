/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : db_kasir

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 09/02/2023 15:50:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_cust` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_cust` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES (13, 'Reni Mardiani', '087765764532', 'Karawaci, Tangerang');
INSERT INTO `tbl_customer` VALUES (14, 'Andri Slamet', '0857345216732', 'Pulo Gadung, Jakarta Timur');
INSERT INTO `tbl_customer` VALUES (15, 'Toni Sucipto', '089673452345', 'Tapos, Depok, Jawa Barat');
INSERT INTO `tbl_customer` VALUES (17, 'Ujang', '     ', 'v');
INSERT INTO `tbl_customer` VALUES (18, 'ddd', '   sfsfs1212', 'cxvcxvcxv');

-- ----------------------------
-- Table structure for tbl_dt_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dt_pembelian`;
CREATE TABLE `tbl_dt_pembelian`  (
  `id` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `kuantitas` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_dt_pembelian
-- ----------------------------
INSERT INTO `tbl_dt_pembelian` VALUES ('20220712110259', 25, 'Single Bed', 3000000, 5000000, 5);
INSERT INTO `tbl_dt_pembelian` VALUES ('20220928172444', 23, 'Double Bed', 2000000, 4000000, 4);
INSERT INTO `tbl_dt_pembelian` VALUES ('20220928173231', 24, 'Sofa Living Room', 1000000, 3000000, 4);
INSERT INTO `tbl_dt_pembelian` VALUES ('20220930101827', 2, 'Super Pedic', 2000000, 5000000, 1);

-- ----------------------------
-- Table structure for tbl_dt_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_dt_penjualan`;
CREATE TABLE `tbl_dt_penjualan`  (
  `id` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `kuantitas` int NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_dt_penjualan
-- ----------------------------
INSERT INTO `tbl_dt_penjualan` VALUES ('20220712110124', 23, 'Double Bed', 2000000, 4000000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220712110200', 23, 'Double Bed', 2000000, 4000000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220712162141', 26, 'Lemari 2 Pintu', 1000000, 2000000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220927222426', 23, 'Double Bed', 2000000, 4000000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220928164838', 24, 'Sofa Living Room', 1000000, 3000000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220928172648', 28, 'Soofa L Angel', 1000000, 7500000, 1);
INSERT INTO `tbl_dt_penjualan` VALUES ('20220930101703', 2, 'Super Pedic', 2000000, 5000000, 2);

-- ----------------------------
-- Table structure for tbl_ht_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ht_pembelian`;
CREATE TABLE `tbl_ht_pembelian`  (
  `id` varchar(14) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_supplier` int NOT NULL,
  `nama_supplier` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `waktu` datetime NOT NULL,
  `total_bayar` float NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_ht_pembelian
-- ----------------------------
INSERT INTO `tbl_ht_pembelian` VALUES ('20220712110259', 5, 'PT. COMFORTA', '2022-07-12 11:02:59', 15000000);
INSERT INTO `tbl_ht_pembelian` VALUES ('20220928172444', 5, 'PT. COMFORTA', '2022-09-28 17:24:44', 8000000);
INSERT INTO `tbl_ht_pembelian` VALUES ('20220928173202', 6, 'DUDI HERMAWAN', '2022-09-28 17:32:02', 0);
INSERT INTO `tbl_ht_pembelian` VALUES ('20220928173231', 6, 'DUDI HERMAWAN', '2022-09-28 17:32:31', 4000000);
INSERT INTO `tbl_ht_pembelian` VALUES ('20220930101827', 5, 'PT. COMFORTA', '2022-09-30 10:18:27', 2000000);

-- ----------------------------
-- Table structure for tbl_ht_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ht_penjualan`;
CREATE TABLE `tbl_ht_penjualan`  (
  `id` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_customer` int NOT NULL,
  `nama_cust` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp,
  `total_bayar` float NOT NULL,
  `kasir` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_ht_penjualan
-- ----------------------------
INSERT INTO `tbl_ht_penjualan` VALUES ('20220710194925', 2, 'Agus', '2022-07-10 19:49:25', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220710201538', 1, 'Udin', '2022-07-10 20:15:38', 4000000, 'Firman Saputra ');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220711162617', 1, 'Udin', '2022-07-11 16:26:17', 2000000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220711162619', 1, 'Udin', '2022-07-11 16:26:19', 2000000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220711162620', 1, 'Udin', '2022-07-11 16:26:20', 2000000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220712110032', 13, 'Reni Mardiani', '2022-07-12 11:00:32', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220712110034', 13, 'Reni Mardiani', '2022-07-12 11:00:34', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220712110035', 13, 'Reni Mardiani', '2022-07-12 11:00:35', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220712110200', 13, 'Reni Mardiani', '2022-07-12 11:02:00', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220712162141', 16, 'Udin', '2022-07-12 16:21:41', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220927222426', 14, 'Andri Slamet', '2022-09-27 22:24:26', 200000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220928164838', 13, 'Reni Mardiani', '2022-09-28 16:48:38', 500000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220928172648', 15, 'Toni Sucipto', '2022-09-28 17:26:48', 5000000, 'Firman Saputra');
INSERT INTO `tbl_ht_penjualan` VALUES ('20220930101703', 13, 'Reni Mardiani', '2022-09-30 10:17:03', 2000000, 'Firman Saputra');

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `merk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES (15, 'Spring Bed', 'Comforta');
INSERT INTO `tbl_kategori` VALUES (17, 'Partisi ', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (18, 'Sofa', 'Larose');
INSERT INTO `tbl_kategori` VALUES (19, 'Kitchen Set Ducco', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (20, 'Kitchen Set HPL', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (21, 'Meja Makan', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (22, 'Lemari  Baju', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (24, 'Meja Rias', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (25, 'Bunga Hias', 'Eliy\'s Furniture');
INSERT INTO `tbl_kategori` VALUES (26, 'Meja Belajar', 'Budi Store');
INSERT INTO `tbl_kategori` VALUES (27, 'uuu', 'Budi Store');

-- ----------------------------
-- Table structure for tbl_owner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_owner`;
CREATE TABLE `tbl_owner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_owner` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `no_hp` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_owner
-- ----------------------------
INSERT INTO `tbl_owner` VALUES (1, 'RE', '089686587345', 'Politeknik LP3I Kampus Tasikmalaya');
INSERT INTO `tbl_owner` VALUES (11, 'Firman', '089765674567', 'Ciamis');
INSERT INTO `tbl_owner` VALUES (12, 'Doni', '08976576789', 'Bandung');

-- ----------------------------
-- Table structure for tbl_pembelian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pembelian`;
CREATE TABLE `tbl_pembelian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produk` int NOT NULL,
  `id_supplier` int NULL DEFAULT NULL,
  `nama_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  `ket_update` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_pembelian
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_penjualan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_penjualan`;
CREATE TABLE `tbl_penjualan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_produk` int NOT NULL,
  `nama_produk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `jumlah` int NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_produk
-- ----------------------------
DROP TABLE IF EXISTS `tbl_produk`;
CREATE TABLE `tbl_produk`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int NOT NULL,
  `nama_produk` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kuantitas` int NOT NULL,
  `harga_beli` float NOT NULL,
  `harga_jual` float NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp,
  `update_date` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 141 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_produk
-- ----------------------------
INSERT INTO `tbl_produk` VALUES (3, 15, 'Solid Spine UK 100X200', 1, 7130700, 8340000, '2022-09-30 14:56:51', NULL);
INSERT INTO `tbl_produk` VALUES (5, 15, 'Solid Spine UK 120X200', 1, 8464500, 9900000, '2022-09-30 14:58:22', NULL);
INSERT INTO `tbl_produk` VALUES (7, 15, 'Solid Spine UK 160X200', 1, 10567800, 12360000, '2022-09-30 15:00:06', NULL);
INSERT INTO `tbl_produk` VALUES (9, 15, 'Solid Spine UK 180X200', 1, 11901600, 13920000, '2022-09-30 15:03:58', NULL);
INSERT INTO `tbl_produk` VALUES (10, 15, 'Solid Spine UK 200X200', 1, 13235400, 15480000, '2022-09-30 15:04:02', NULL);
INSERT INTO `tbl_produk` VALUES (12, 15, 'Comfort Dream UK 100X200', 1, 6822900, 7980000, '2022-09-30 15:07:01', NULL);
INSERT INTO `tbl_produk` VALUES (13, 15, 'Comfort Dream UK 120 x200', 1, 7848900, 9180000, '2022-09-30 15:07:05', NULL);
INSERT INTO `tbl_produk` VALUES (14, 15, 'Comfort Dream UK 160 x 200', 1, 9798300, 11460000, '2022-09-30 15:08:31', NULL);
INSERT INTO `tbl_produk` VALUES (15, 15, 'Comfort Dream UK 180X200', 1, 10670400, 12480000, '2022-09-30 15:08:35', NULL);
INSERT INTO `tbl_produk` VALUES (16, 15, 'Comfort Dream UK 200 x 200', 1, 11747700, 13740000, '2022-09-30 15:10:13', NULL);
INSERT INTO `tbl_produk` VALUES (17, 15, 'Comfort Choice UK 100 x 200', 1, 5719950, 11150000, '2022-09-30 15:16:11', NULL);
INSERT INTO `tbl_produk` VALUES (18, 15, 'Comfort Choice UK 120 x 200', 1, 6361200, 7440000, '2022-09-30 15:17:10', NULL);
INSERT INTO `tbl_produk` VALUES (19, 15, 'Comfort Choice UK 160 x 200', 1, 8259300, 9660000, '2022-09-30 15:17:57', NULL);
INSERT INTO `tbl_produk` VALUES (20, 15, 'Comfort Choice UK 180 x 200', 1, 9208350, 10770000, '2022-09-30 15:18:59', NULL);
INSERT INTO `tbl_produk` VALUES (21, 15, 'Comfort Choice UK 200 x 200', 1, 10003500, 11700000, '2022-09-30 15:20:00', NULL);
INSERT INTO `tbl_produk` VALUES (22, 15, 'Comfort Pedic UK 100 x 200', 1, 5130000, 6000000, '2022-09-30 15:24:11', NULL);
INSERT INTO `tbl_produk` VALUES (23, 15, 'Comfort Pedic UK 120 x 200', 1, 5873850, 6870000, '2022-09-30 15:25:56', NULL);
INSERT INTO `tbl_produk` VALUES (24, 15, 'Comfort Pedic UK 160X200', 1, 7361550, 8610000, '2022-09-30 15:25:59', NULL);
INSERT INTO `tbl_produk` VALUES (25, 15, 'Comfort Pedic UK 180 x 200', 1, 8310600, 9720000, '2022-09-30 15:27:44', NULL);
INSERT INTO `tbl_produk` VALUES (26, 15, 'Comfort Pedic UK 200 x 200', 1, 9285300, 10860000, '2022-09-30 15:33:35', NULL);
INSERT INTO `tbl_produk` VALUES (27, 15, 'Perfect Dream UK 90 x 200', 1, 4257900, 4980000, '2022-09-30 15:35:21', NULL);
INSERT INTO `tbl_produk` VALUES (28, 15, 'Perfect Dream UK 100X200', 1, 4257900, 4980000, '2022-09-30 15:35:24', NULL);
INSERT INTO `tbl_produk` VALUES (29, 15, 'Perfect Dream UK 120 X 200 ', 1, 5181300, 6060000, '2022-09-30 15:37:20', NULL);
INSERT INTO `tbl_produk` VALUES (30, 15, 'Perfect Dream UK 160X200', 1, 6515100, 7620000, '2022-09-30 15:37:27', NULL);
INSERT INTO `tbl_produk` VALUES (31, 0, 'Perfect Dream UK 180X200', 1, 7412850, 8670000, '2022-09-30 15:40:07', NULL);
INSERT INTO `tbl_produk` VALUES (34, 15, 'Perfect Dream UK 180 x 200', 1, 7412850, 8670000, '2022-09-30 15:43:48', NULL);
INSERT INTO `tbl_produk` VALUES (35, 0, 'Perfect Dream UK 200X200', 1, 8310600, 9720000, '2022-09-30 15:43:51', NULL);
INSERT INTO `tbl_produk` VALUES (36, 15, 'Perfect Dream UK 200 x 200', 1, 8310600, 9720000, '2022-09-30 15:45:36', NULL);
INSERT INTO `tbl_produk` VALUES (37, 15, 'Perfect Choice UK 90 x 200', 1, 4027050, 4710000, '2022-09-30 15:47:59', NULL);
INSERT INTO `tbl_produk` VALUES (38, 15, 'Perfect Choice 100X200', 1, 4360500, 5100000, '2022-09-30 15:48:03', NULL);
INSERT INTO `tbl_produk` VALUES (39, 15, 'Perfect Choice UK 160 x 200', 1, 6156000, 7200000, '2022-09-30 15:50:33', NULL);
INSERT INTO `tbl_produk` VALUES (40, 15, 'Perfect Choice 180X200', 1, 7002450, 8190000, '2022-09-30 15:50:36', NULL);
INSERT INTO `tbl_produk` VALUES (41, 15, 'Perfect Choice UK 200 x 200', 1, 7848900, 9180000, '2022-09-30 15:53:27', NULL);
INSERT INTO `tbl_produk` VALUES (42, 15, 'Perfect Pedic UK 90X200', 1, 3180600, 3720000, '2022-09-30 15:53:43', NULL);
INSERT INTO `tbl_produk` VALUES (43, 15, 'Perfect Pedic Uk 100 X 200', 1, 3385800, 3960000, '2022-09-30 15:56:34', NULL);
INSERT INTO `tbl_produk` VALUES (44, 15, 'Perfect Pedic UK 120X200', 1, 4027050, 4710000, '2022-09-30 15:59:32', NULL);
INSERT INTO `tbl_produk` VALUES (45, 15, 'Perfect Pedic UK 160 x 200', 1, 4899150, 5730000, '2022-09-30 16:02:24', NULL);
INSERT INTO `tbl_produk` VALUES (46, 15, 'Perfect Pedic UK 180X200', 1, 5566050, 6510000, '2022-09-30 16:02:26', NULL);
INSERT INTO `tbl_produk` VALUES (47, 15, 'Perfect Pedic UK 200 x 200', 1, 6309900, 7380000, '2022-09-30 16:04:36', NULL);
INSERT INTO `tbl_produk` VALUES (48, 15, 'Super Dream UK 90X200', 1, 5104350, 5970000, '2022-09-30 16:04:58', NULL);
INSERT INTO `tbl_produk` VALUES (49, 15, 'Super Dream UK 100 x 200', 1, 5489100, 6420000, '2022-09-30 16:06:21', NULL);
INSERT INTO `tbl_produk` VALUES (50, 15, 'Super Dream UK 120 x 200', 1, 6053400, 7080000, '2022-09-30 16:07:44', NULL);
INSERT INTO `tbl_produk` VALUES (51, 15, 'Super Dream UK 160X200', 1, 7438500, 8700000, '2022-09-30 16:07:49', NULL);
INSERT INTO `tbl_produk` VALUES (52, 15, 'Super Dream  UK 180 X 200', 1, 8208000, 9600000, '2022-09-30 16:12:26', NULL);
INSERT INTO `tbl_produk` VALUES (53, 15, 'Super Dream UK 200 x 200', 1, 9105750, 10650000, '2022-09-30 16:12:54', NULL);
INSERT INTO `tbl_produk` VALUES (54, 15, 'Super Choice UK 90X200', 1, 4437450, 5190000, '2022-09-30 16:14:49', NULL);
INSERT INTO `tbl_produk` VALUES (55, 15, 'Super Choice UK 100X200', 1, 4770900, 5580000, '2022-09-30 16:16:36', NULL);
INSERT INTO `tbl_produk` VALUES (56, 15, 'Super Choice UK 120 x 200', 1, 2847150, 3330000, '2022-09-30 16:16:38', NULL);
INSERT INTO `tbl_produk` VALUES (57, 15, 'Super Choice UK 160X200', 1, 6515100, 7620000, '2022-09-30 16:18:10', NULL);
INSERT INTO `tbl_produk` VALUES (58, 15, 'Super Choice UK 180 x 200', 1, 7182000, 8400000, '2022-09-30 16:19:11', NULL);
INSERT INTO `tbl_produk` VALUES (59, 15, 'Super Choice UK 200X200', 1, 7951500, 9300000, '2022-09-30 16:20:07', NULL);
INSERT INTO `tbl_produk` VALUES (60, 15, 'Super Pedic UK 90X200', 1, 4334850, 5070000, '2022-09-30 16:21:40', NULL);
INSERT INTO `tbl_produk` VALUES (61, 15, 'Super Pedic UK 100 x 200', 1, 4642650, 5430000, '2022-09-30 16:21:59', NULL);
INSERT INTO `tbl_produk` VALUES (62, 15, 'Super Pedic UK 120X200', 1, 5155650, 6030000, '2022-09-30 16:23:42', NULL);
INSERT INTO `tbl_produk` VALUES (63, 15, 'Super Pedic UK 160 x 200', 1, 6309900, 7380000, '2022-09-30 16:24:24', NULL);
INSERT INTO `tbl_produk` VALUES (64, 15, 'Super Pedic UK 180X200', 1, 6951150, 8130000, '2022-09-30 16:25:48', NULL);
INSERT INTO `tbl_produk` VALUES (65, 15, 'Super Pedic UK 200 x 2001', 1, 7720650, 9030000, '2022-09-30 16:26:23', NULL);
INSERT INTO `tbl_produk` VALUES (66, 15, 'Neo Star UK 90X200', 1, 3001050, 3510000, '2022-09-30 16:27:37', NULL);
INSERT INTO `tbl_produk` VALUES (67, 15, 'Neo Star UK 100 x 200 ', 1, 3267810, 3822000, '2022-09-30 16:28:37', NULL);
INSERT INTO `tbl_produk` VALUES (68, 15, 'Neo Star UK 120X200', 1, 3719250, 4350000, '2022-09-30 16:29:21', NULL);
INSERT INTO `tbl_produk` VALUES (69, 15, 'Neo Star UK 160  x 200', 1, 4370760, 5112000, '2022-09-30 16:30:35', NULL);
INSERT INTO `tbl_produk` VALUES (70, 15, 'Neo Star UK 180X200', 1, 4899150, 5730000, '2022-09-30 16:31:18', NULL);
INSERT INTO `tbl_produk` VALUES (71, 15, 'Neo Star UK 200 x 200', 1, 5422410, 6342000, '2022-09-30 16:32:41', NULL);
INSERT INTO `tbl_produk` VALUES (72, 15, 'Comfort Duo UK 90X200', 1, 5788500, 6810000, '2022-09-30 16:33:49', NULL);
INSERT INTO `tbl_produk` VALUES (73, 15, 'Comfort Duo UK 100 X 200', 1, 6247500, 7350000, '2022-09-30 16:35:10', NULL);
INSERT INTO `tbl_produk` VALUES (74, 15, 'Comfort Duo UK 120X200', 1, 6987000, 8220000, '2022-09-30 16:35:54', NULL);
INSERT INTO `tbl_produk` VALUES (76, 15, 'Perfect Teenager UK 90X200', 1, 4646100, 5466000, '2022-09-30 16:38:17', NULL);
INSERT INTO `tbl_produk` VALUES (77, 15, 'Perfect Teenager UK 100X200', 1, 4982700, 5862000, '2022-09-30 16:39:50', NULL);
INSERT INTO `tbl_produk` VALUES (80, 15, 'Perfect Teenager UK 120 x 200', 1, 5497800, 6468000, '2022-09-30 16:43:29', NULL);
INSERT INTO `tbl_produk` VALUES (81, 15, 'Super Teenager UK 90X200', 1, 4192200, 4932000, '2022-09-30 16:44:18', NULL);
INSERT INTO `tbl_produk` VALUES (82, 15, 'Super Teenager UK 100X200', 1, 4735800, 5262000, '2022-09-30 16:45:24', NULL);
INSERT INTO `tbl_produk` VALUES (83, 15, 'Super Teenager UK 120 x 200', 1, 4998000, 5880000, '2022-09-30 16:45:53', NULL);
INSERT INTO `tbl_produk` VALUES (84, 15, 'Star Family Uk 90X200', 1, 3763800, 4428000, '2022-09-30 16:46:47', NULL);
INSERT INTO `tbl_produk` VALUES (85, 15, 'Star Family Uk 100X200', 1, 4105500, 4830000, '2022-09-30 16:48:34', NULL);
INSERT INTO `tbl_produk` VALUES (86, 15, 'Star Family UK 120 x 200', 1, 4554300, 5358000, '2022-09-30 16:48:36', NULL);
INSERT INTO `tbl_produk` VALUES (94, 15, 'Tendre UK 90 x 200', 1, 1692900, 1980000, '2022-09-30 17:06:31', NULL);
INSERT INTO `tbl_produk` VALUES (95, 15, 'Tendre UK 100 x 200', 1, 1795500, 2100000, '2022-09-30 17:07:25', NULL);
INSERT INTO `tbl_produk` VALUES (96, 15, 'Tendre UK 120 x 200', 1, 1949400, 2280000, '2022-09-30 17:09:01', NULL);
INSERT INTO `tbl_produk` VALUES (97, 15, 'Tendre UK 160 x 200 ', 1, 2436750, 2850000, '2022-09-30 17:10:20', NULL);
INSERT INTO `tbl_produk` VALUES (98, 15, 'Tendre UK 180 x 200', 1, 2641950, 3090000, '2022-09-30 17:11:25', NULL);
INSERT INTO `tbl_produk` VALUES (99, 15, 'Tendre UK 200 x 200', 1, 2898450, 3390000, '2022-09-30 17:19:34', NULL);
INSERT INTO `tbl_produk` VALUES (100, 15, 'Adelio UK 90 x 200 ', 1, 1590300, 1860000, '2022-09-30 17:20:43', NULL);
INSERT INTO `tbl_produk` VALUES (101, 15, 'Adelio UK 100 x 200', 1, 1692900, 1980000, '2022-09-30 17:21:39', NULL);
INSERT INTO `tbl_produk` VALUES (102, 15, 'Adelio UK 120 x 200', 1, 34199500, 2160000, '2022-09-30 17:23:12', NULL);
INSERT INTO `tbl_produk` VALUES (103, 15, 'Adelio UK 160 x 200', 1, 2282850, 2670000, '2022-09-30 17:24:41', NULL);
INSERT INTO `tbl_produk` VALUES (104, 0, 'Adelio UK 180 x 200', 1, 2488050, 2910000, '2022-09-30 17:26:09', NULL);
INSERT INTO `tbl_produk` VALUES (105, 15, 'Adelio UK 200 x 200', 1, 2641950, 3090000, '2022-09-30 17:28:08', NULL);
INSERT INTO `tbl_produk` VALUES (106, 15, 'Linea UK 90 x 200', 1, 1487700, 1740000, '2022-09-30 17:29:49', NULL);
INSERT INTO `tbl_produk` VALUES (107, 15, 'Linea UK 100 x 200', 1, 1590300, 1860000, '2022-09-30 17:31:19', NULL);
INSERT INTO `tbl_produk` VALUES (108, 15, 'Linea UK 120 x 200', 1, 1744200, 2040000, '2022-09-30 17:33:23', NULL);
INSERT INTO `tbl_produk` VALUES (109, 15, 'Linea UK 160 x 200', 1, 2128950, 2490000, '2022-09-30 17:35:13', NULL);
INSERT INTO `tbl_produk` VALUES (110, 15, 'Linea UK 180 X 200', 1, 2282850, 2670000, '2022-09-30 17:36:56', NULL);
INSERT INTO `tbl_produk` VALUES (111, 15, 'Linea UK 200 x 200', 1, 2436750, 2850000, '2022-09-30 17:38:37', NULL);
INSERT INTO `tbl_produk` VALUES (112, 15, 'Areli UK 90 X 200', 1333800, 1560000, 0, '2022-09-30 17:39:41', NULL);
INSERT INTO `tbl_produk` VALUES (113, 15, 'Areli UK 100 x 200', 1, 1436400, 1680000, '2022-09-30 17:40:47', NULL);
INSERT INTO `tbl_produk` VALUES (114, 15, 'Areli UK 120 x  200', 1, 1590300, 1860000, '2022-09-30 17:41:51', NULL);
INSERT INTO `tbl_produk` VALUES (115, 15, 'Areli UK 160 x 200', 1, 1975050, 2310000, '2022-09-30 17:43:21', NULL);
INSERT INTO `tbl_produk` VALUES (116, 15, 'Areli UK 180 x 200', 1, 2128950, 2490000, '2022-09-30 17:44:37', NULL);
INSERT INTO `tbl_produk` VALUES (117, 15, 'Areli UK 200 x 200', 1, 2282850, 2670000, '2022-09-30 17:45:41', NULL);
INSERT INTO `tbl_produk` VALUES (118, 15, 'Diamante UK 90 x 200 ', 1, 872100, 1020000, '2022-09-30 17:47:46', NULL);
INSERT INTO `tbl_produk` VALUES (119, 15, 'Diamante UK 100 x 200', 1, 974700, 1140000, '2022-09-30 17:48:49', NULL);
INSERT INTO `tbl_produk` VALUES (120, 15, 'Diamante UK 120 x 200', 1, 1077300, 1260000, '2022-09-30 17:49:47', NULL);
INSERT INTO `tbl_produk` VALUES (121, 15, 'Diamante UK 160 x 200', 1, 1436400, 1680000, '2022-09-30 17:50:45', NULL);
INSERT INTO `tbl_produk` VALUES (122, 15, 'Diamante UK 180 x 200', 1, 1539000, 1800000, '2022-09-30 17:52:00', NULL);
INSERT INTO `tbl_produk` VALUES (123, 15, 'Diamante UK 200 x 200 ', 1, 1641600, 1920000, '2022-09-30 17:53:49', NULL);
INSERT INTO `tbl_produk` VALUES (124, 15, 'Velos UK 90 x 200', 1, 718200, 840000, '2022-09-30 17:55:14', NULL);
INSERT INTO `tbl_produk` VALUES (125, 15, 'Velos UK 100 x 200', 1, 769500, 900000, '2022-09-30 17:56:27', NULL);
INSERT INTO `tbl_produk` VALUES (126, 15, 'Velos UK 120 x 200 ', 1, 846450, 990000, '2022-09-30 17:57:51', NULL);
INSERT INTO `tbl_produk` VALUES (127, 15, 'Velos UK 160 x 200', 1, 1154250, 1350000, '2022-09-30 17:59:34', NULL);
INSERT INTO `tbl_produk` VALUES (128, 15, 'Velos 180 x 200', 1, 1256850, 1470000, '2022-09-30 18:02:02', NULL);
INSERT INTO `tbl_produk` VALUES (129, 15, 'Velos UK 200 x 200 ', 1, 1333800, 1560000, '2022-09-30 18:03:30', NULL);
INSERT INTO `tbl_produk` VALUES (130, 15, 'Alto UK 90 x 200', 1, 487350, 570000, '2022-09-30 18:04:45', NULL);
INSERT INTO `tbl_produk` VALUES (131, 15, 'Alto UK 100 x 200', 1, 538650, 630000, '2022-09-30 18:05:55', NULL);
INSERT INTO `tbl_produk` VALUES (132, 15, 'Alto UK 120 x 200', 1, 589950, 690000, '2022-09-30 18:07:11', NULL);
INSERT INTO `tbl_produk` VALUES (133, 15, 'Alto UK 160 x 200', 1, 769500, 900000, '2022-09-30 18:08:30', NULL);
INSERT INTO `tbl_produk` VALUES (134, 15, 'Alto UK 180 x 200', 1, 820800, 960000, '2022-09-30 18:09:53', NULL);
INSERT INTO `tbl_produk` VALUES (135, 15, 'Alto UK 200 x 200 ', 1, 872100, 1020000, '2022-09-30 18:14:40', NULL);
INSERT INTO `tbl_produk` VALUES (136, 15, 'Elegant Pillow ', 1, 100000, 200000, '2022-09-30 18:33:15', NULL);
INSERT INTO `tbl_produk` VALUES (137, 15, 'Elegant Bolster ', 1, 200000, 220000, '2022-09-30 18:34:04', NULL);
INSERT INTO `tbl_produk` VALUES (138, 15, 'Dacron Pillow', 1, 80000, 130000, '2022-09-30 18:34:57', NULL);
INSERT INTO `tbl_produk` VALUES (139, 15, 'Dacron Bolster', 1, 80000, 150000, '2022-09-30 18:35:36', NULL);
INSERT INTO `tbl_produk` VALUES (140, 27, 'abcd', 10, 500000, 800000, '2023-02-01 22:58:22', '2023-02-01 23:02:00');

-- ----------------------------
-- Table structure for tbl_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tbl_supplier`;
CREATE TABLE `tbl_supplier`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp_supplier` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_supplier` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_supplier
-- ----------------------------
INSERT INTO `tbl_supplier` VALUES (5, 'PT. COMFORTA', '081245326788', 'Cikarang, Jawa Barat');
INSERT INTO `tbl_supplier` VALUES (6, 'DUDI HERMAWAN', '089768567344', 'Bekasi, Jawa Barat');

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `akses` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'admin', 'admin', 'Firman Saputra', 'admin');
INSERT INTO `tbl_user` VALUES (2, 'kasir', 'kasir', 'Usep Saepudin', 'kasir');

-- ----------------------------
-- Triggers structure for table tbl_pembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `tambah_data_stok`;
delimiter ;;
CREATE TRIGGER `tambah_data_stok` AFTER INSERT ON `tbl_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET kuantitas = kuantitas+NEW.jumlah
	WHERE id = NEW.id_produk;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_pembelian
-- ----------------------------
DROP TRIGGER IF EXISTS `hapus_data_stok`;
delimiter ;;
CREATE TRIGGER `hapus_data_stok` AFTER DELETE ON `tbl_pembelian` FOR EACH ROW BEGIN
	UPDATE tbl_produk SET kuantitas = kuantitas-OLD.jumlah
	WHERE id = OLD.id_produk;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
