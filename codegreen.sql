/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100412
 Source Host           : localhost:3306
 Source Schema         : codegreen

 Target Server Type    : MySQL
 Target Server Version : 100412
 File Encoding         : 65001

 Date: 29/11/2020 11:13:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (17, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (18, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (19, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_11_27_135642_create_user_details_table', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for user_details
-- ----------------------------
DROP TABLE IF EXISTS `user_details`;
CREATE TABLE `user_details`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_details
-- ----------------------------
INSERT INTO `user_details` VALUES (1, 'Hello', 'jishnukrishnan30@gmail.com', '2020-11-13', 'test', '2020-11-29 04:46:02', '2020-11-29 04:46:02');
INSERT INTO `user_details` VALUES (2, 'Hello', 'jishnukrishnan30@gmail.com', '2020-11-13', 'test', '2020-11-29 04:48:43', '2020-11-29 04:48:43');
INSERT INTO `user_details` VALUES (3, 'Hello', 'jishnukrishnan30@gmail.com', '2020-11-13', 'test', '2020-11-29 04:50:13', '2020-11-29 04:50:13');
INSERT INTO `user_details` VALUES (4, 'Hello', 'jishnukrishnan30@gmail.com', '2020-11-13', 'test', '2020-11-29 04:53:32', '2020-11-29 04:53:32');
INSERT INTO `user_details` VALUES (5, 'Hello', 'jishnukrishnan30@gmail.com', '2020-11-13', 'test', '2020-11-29 04:56:03', '2020-11-29 04:56:03');
INSERT INTO `user_details` VALUES (6, 'Jishnu Krishnan', 'jishnukrishnan30@gmail.com', '2020-11-27', 'test', '2020-11-29 05:25:14', '2020-11-29 05:25:14');
INSERT INTO `user_details` VALUES (7, 'Jishnu Krishnan', 'jishnukrishnan30@gmail.com', '2020-11-27', 'test', '2020-11-29 05:26:23', '2020-11-29 05:35:00');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_details_id` bigint(20) NOT NULL,
  `otp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'test', '$2y$10$ueUCw80MVH5bTiRbt2BYAe1zfOkvmF8eWzMWP4rhDxfwNKLzSbCNG', 1, '303337', NULL, '2020-11-29 04:46:02', '2020-11-29 04:46:02');
INSERT INTO `users` VALUES (2, 'test', '$2y$10$ssVGdU4D8Luh6RcFVICiMOlUTqCvkT29gPYQb0mdQNelcLvaYnfqy', 2, '372027', NULL, '2020-11-29 04:48:43', '2020-11-29 04:48:43');
INSERT INTO `users` VALUES (3, 'test', '$2y$10$nGFzCRxj/HB0X9Xo73ORgu3DDgJ/McJuyi0DJKaG5qkr4uxPzAwLe', 3, '654071', NULL, '2020-11-29 04:50:14', '2020-11-29 04:50:14');
INSERT INTO `users` VALUES (4, 'test', '$2y$10$D5/VHABE238l5SY1ohx83.OSlDGiVfJbU2KoePisI9j/uYhl6k0Fu', 4, '106013', NULL, '2020-11-29 04:53:33', '2020-11-29 04:53:33');
INSERT INTO `users` VALUES (5, 'test', '$2y$10$mqbd2xZggsLCrHOpsiJiP.jt30rxqOveN21rouda6DVqORPlKLpoe', 5, '998943', '2020-11-29 00:00:00', '2020-11-29 04:56:04', '2020-11-29 04:59:36');
INSERT INTO `users` VALUES (6, 'test', '$2y$10$v6HC9UVGhKuFGUrRftY2TuSGwrrPtLk.1tgwK6lY27buwx3u6bXoO', 6, '308525', NULL, '2020-11-29 05:25:14', '2020-11-29 05:25:14');
INSERT INTO `users` VALUES (7, 'test', '$2y$10$vHcXCcNxg.7D.Asv5sggQOAOu2ANomBykS69gBy65Kx/.aP./y22a', 7, '767052', '2020-11-29 00:00:00', '2020-11-29 05:26:23', '2020-11-29 05:34:52');

SET FOREIGN_KEY_CHECKS = 1;
