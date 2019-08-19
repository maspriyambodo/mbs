/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : mbs

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 19/08/2019 12:12:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _mst_datapens
-- ----------------------------
DROP TABLE IF EXISTS `_mst_datapens`;
CREATE TABLE `_mst_datapens`  (
  `notas` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namapensiunan` varchar(44) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_pensiunan` date NULL DEFAULT NULL,
  `penpok` decimal(10, 0) NULL DEFAULT NULL,
  `nama_penerima` varchar(44) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_penerima` date NULL DEFAULT NULL,
  `alm_peserta` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(38) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota_kab` varchar(41) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` decimal(10, 0) NULL DEFAULT NULL,
  `kodebyr` bigint(20) NULL DEFAULT NULL,
  `nmkanbyr` varchar(52) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmtpensiun` date NULL DEFAULT NULL,
  `nomor_skep` varchar(33) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_skep` date NULL DEFAULT NULL,
  `norek` bigint(20) NULL DEFAULT NULL,
  `penerbit_skep` varchar(44) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `npwp` bigint(20) NULL DEFAULT NULL,
  `telepon` bigint(20) NULL DEFAULT NULL,
  `kodecabang` int(11) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1. unvisited, 2. visited',
  `tele_status` int(11) NULL DEFAULT NULL COMMENT '1. uncalling, 2.calling'
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for absensi
-- ----------------------------
DROP TABLE IF EXISTS `absensi`;
CREATE TABLE `absensi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'relasi dengan mst_karyawan',
  `tanggal` date NULL DEFAULT NULL,
  `jam_masuk` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jam_keluar` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `absen` int(11) NULL DEFAULT NULL COMMENT '1. hadir, 2.sakit, 3.ijin, 4.alfa',
  `alasan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for interaksi_telemarketing
-- ----------------------------
DROP TABLE IF EXISTS `interaksi_telemarketing`;
CREATE TABLE `interaksi_telemarketing`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_lap` date NULL DEFAULT NULL,
  `jam_lap` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NIKSALES` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMASALES` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NOTAS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMAPENSIUNAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TGL_LAHIR_PENSIUNAN` date NULL DEFAULT NULL,
  `NAMAPENERIMA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TGL_LAHIR_PENERIMA` date NULL DEFAULT NULL,
  `ALAMAT` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KELURAHAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KECAMATAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `JENIS_KOTA` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KOTA_KAB` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `PROVINSI` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KODEPOS` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TELEPON` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KODE_INTERAKSI` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_feedback` varchar(4) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KET_INTERKASI` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KETERANGAN` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HP_STATUS` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `HP_NOMINAL` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `stat` int(11) NULL DEFAULT NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lap_interaksi
-- ----------------------------
DROP TABLE IF EXISTS `lap_interaksi`;
CREATE TABLE `lap_interaksi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_interaksi` int(11) NULL DEFAULT NULL COMMENT '1. rencana, 2. ots',
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nopen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pensiunan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_pensiunan` date NULL DEFAULT NULL,
  `penerima` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_penerima` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_baru` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kabupaten` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_interaksikunj` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat_valid` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `bertemu_pensiunan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `manfaatpens_btpn` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `hp_status` int(1) NULL DEFAULT NULL COMMENT 'hot prospek status',
  `hp_nominal` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ttd` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1. active, 2. non-active, 3. delete',
  `nom_tb` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_pencairan` date NULL DEFAULT NULL,
  `img_simulasi` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL COMMENT 'screenshot simulasi',
  `syscreateuser` int(11) NULL DEFAULT NULL COMMENT 'diambil dari table usr_adm column id',
  `syscreatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL,
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1113 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lap_pict
-- ----------------------------
DROP TABLE IF EXISTS `lap_pict`;
CREATE TABLE `lap_pict`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `nopen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_input` date NULL DEFAULT NULL,
  `path` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 442 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lap_rencana
-- ----------------------------
DROP TABLE IF EXISTS `lap_rencana`;
CREATE TABLE `lap_rencana`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `nopen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `visit_status` int(11) NULL DEFAULT NULL COMMENT '1. unvisited, 2. visited',
  `syscreatedate` datetime(0) NULL DEFAULT NULL,
  `syscreateuser` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'relasi dengan id user_adm',
  `sysupdatedate` date NULL DEFAULT NULL COMMENT 'tanggal interaksi',
  `sysupdateuser` int(11) NULL DEFAULT NULL COMMENT 'relasi dengan id user_adm',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for lap_simulasi
-- ----------------------------
DROP TABLE IF EXISTS `lap_simulasi`;
CREATE TABLE `lap_simulasi`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `nopen` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pict` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci COMMENT = 'untuk triger / relasi \r\nlaporan interaksi marketing > nik & nopen' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for m_kodepos
-- ----------------------------
DROP TABLE IF EXISTS `m_kodepos`;
CREATE TABLE `m_kodepos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelurahan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kecamatan` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kabupaten` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `provinsi` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kodepos` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `ixkodepos`(`kodepos`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81249 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for m_salesarea
-- ----------------------------
DROP TABLE IF EXISTS `m_salesarea`;
CREATE TABLE `m_salesarea`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `provinsi` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kabupaten` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT current_timestamp() ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mst_datapens
-- ----------------------------
DROP TABLE IF EXISTS `mst_datapens`;
CREATE TABLE `mst_datapens`  (
  `notas` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `namapensiunan` varchar(44) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_pensiunan` date NULL DEFAULT NULL,
  `penpok` decimal(10, 0) NULL DEFAULT NULL,
  `nama_penerima` varchar(44) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir_penerima` date NULL DEFAULT NULL,
  `alm_peserta` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(38) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(36) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota_kab` varchar(41) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` decimal(10, 0) NULL DEFAULT NULL,
  `nmkanbyr` varchar(52) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` bigint(20) NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1. unvisited, 2. visited',
  PRIMARY KEY (`notas`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'data pensiunan sudah di filter dengan umur pensiunan mulai dari umur 73 sd 80 atau umur penerima mulai dari 73 sd 80' ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mst_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `mst_karyawan`;
CREATE TABLE `mst_karyawan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` int(1) NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelurahan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kecamatan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_perkawinan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_karyawan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tanggal_masuk` date NULL DEFAULT NULL,
  `lokasi_kerja` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT NULL COMMENT '1. aktif\r\n2. non-aktif',
  `reason` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `penpok` bigint(20) NULL DEFAULT NULL,
  `syscreateuser` int(11) NULL DEFAULT NULL,
  `syscreatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysupdateuser` int(11) NULL DEFAULT NULL,
  `sysupdatedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `sysdeleteuser` int(11) NULL DEFAULT NULL,
  `sysdeletedate` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 64 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for mst_kodeinteraksi
-- ----------------------------
DROP TABLE IF EXISTS `mst_kodeinteraksi`;
CREATE TABLE `mst_kodeinteraksi`  (
  `kode_group` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_kunjungan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for norut
-- ----------------------------
DROP TABLE IF EXISTS `norut`;
CREATE TABLE `norut`  (
  `norut` int(11) NULL DEFAULT NULL,
  `nik` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `spv` bigint(20) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for pengajuan_pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan_pinjaman`;
CREATE TABLE `pengajuan_pinjaman`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_pengajuan` date NULL DEFAULT NULL,
  `jam_pengajuan` time(0) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `penpok` decimal(10, 0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_gaji
-- ----------------------------
DROP TABLE IF EXISTS `t_gaji`;
CREATE TABLE `t_gaji`  (
  `nik` bigint(20) NOT NULL,
  `limit1` bigint(20) NULL DEFAULT NULL,
  `persen1` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `limit2` bigint(20) NULL DEFAULT NULL,
  `persen2` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `limit3` bigint(20) NULL DEFAULT NULL,
  `persen3` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nik`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for usr_adm
-- ----------------------------
DROP TABLE IF EXISTS `usr_adm`;
CREATE TABLE `usr_adm`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` bigint(20) NULL DEFAULT NULL,
  `uname` varchar(25) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'using case sensitive',
  `pwd` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `usr_mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `hak_akses` int(11) NULL DEFAULT NULL COMMENT '1. Superuser, \r\n2. Sales, \r\n3. Marketing, \r\n4. Supervisor, \r\n5. ABL',
  `pict` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 45 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
