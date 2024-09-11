/*
 Navicat Premium Data Transfer

 Source Server         : starbright
 Source Server Type    : MySQL
 Source Server Version : 100428 (10.4.28-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : somsystem

 Target Server Type    : MySQL
 Target Server Version : 100428 (10.4.28-MariaDB)
 File Encoding         : 65001

 Date: 11/09/2024 17:05:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for address
-- ----------------------------
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address`  (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `municipality` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `barangay` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`address_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of address
-- ----------------------------
INSERT INTO `address` VALUES (1, 'Alba', '3', 'Allabon', '2024-09-06 10:39:08');
INSERT INTO `address` VALUES (2, 'Agno', '3', 'Aloleng', '2024-09-06 10:40:25');

-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `department_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of department
-- ----------------------------
INSERT INTO `department` VALUES (8, NULL, 'INSTITUTE OF NURSING');
INSERT INTO `department` VALUES (9, NULL, 'COLLEGE OF TEACHER EDUCATION');
INSERT INTO `department` VALUES (10, NULL, 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY');
INSERT INTO `department` VALUES (11, 'Bachelor Of Science', 'BSIT');
INSERT INTO `department` VALUES (12, 'Bachelor Of Science', 'asd');
INSERT INTO `department` VALUES (13, 'vsit', 'asd');

-- ----------------------------
-- Table structure for event_folders
-- ----------------------------
DROP TABLE IF EXISTS `event_folders`;
CREATE TABLE `event_folders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `folder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_folders
-- ----------------------------
INSERT INTO `event_folders` VALUES (1, 3, 'Organizations', '2024-09-11 13:15:34');

-- ----------------------------
-- Table structure for event_photos
-- ----------------------------
DROP TABLE IF EXISTS `event_photos`;
CREATE TABLE `event_photos`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `event_id` int NOT NULL,
  `photo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `folder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `uploaded_at` date NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `event_id`(`event_id` ASC) USING BTREE,
  CONSTRAINT `event_photos_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event_schedule` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_photos
-- ----------------------------
INSERT INTO `event_photos` VALUES (2, 2, 'events/66de9b9c46d68.jpg', NULL, NULL);
INSERT INTO `event_photos` VALUES (3, 2, 'events/66de9b9c4812e.png', NULL, NULL);
INSERT INTO `event_photos` VALUES (4, 2, 'events/66de9f2e833b8.jpg', NULL, NULL);
INSERT INTO `event_photos` VALUES (5, 3, '302597659_483170430485654_5599727337940796982_n.jpg', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (6, 3, 'documentary-envelope-2.jpg', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (7, 3, '302597659_483170430485654_5599727337940796982_n.jpg', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (8, 3, 'documentary-envelope-2.jpg', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (9, 3, 'mindanao zipcode.PNG', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (10, 3, 'Starbright Office Depot.png', 'Organization', '2024-09-11');
INSERT INTO `event_photos` VALUES (11, 3, 'about-us-photo2.png', 'Starbright', '2024-09-11');
INSERT INTO `event_photos` VALUES (12, 3, 'Capture.PNG', 'Starbright', '2024-09-11');
INSERT INTO `event_photos` VALUES (13, 3, 'about-us-photo2.png', 'Starbright', '2024-09-11');
INSERT INTO `event_photos` VALUES (14, 3, 'Capture.PNG', 'Starbright', '2024-09-11');
INSERT INTO `event_photos` VALUES (15, 3, 'ss -dashboard.png', 'Organizations', '2024-09-11');

-- ----------------------------
-- Table structure for event_schedule
-- ----------------------------
DROP TABLE IF EXISTS `event_schedule`;
CREATE TABLE `event_schedule`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date` date NULL DEFAULT NULL,
  `org_id` int NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of event_schedule
-- ----------------------------
INSERT INTO `event_schedule` VALUES (1, 'asd', 'uploads/documentary-envelope-2.jpg', '2024-09-01', 7, 'asd');
INSERT INTO `event_schedule` VALUES (2, 'asd', 'uploads/luffy_shen.png', '2024-09-01', 7, 'asd');
INSERT INTO `event_schedule` VALUES (3, 'asd', 'uploads/about-us-photo2.png', '2024-09-02', 7, 'asd');
INSERT INTO `event_schedule` VALUES (4, 'starbright', 'uploads/mindanao zipcode.PNG', '2024-09-03', 10, 'asd');

-- ----------------------------
-- Table structure for events_management
-- ----------------------------
DROP TABLE IF EXISTS `events_management`;
CREATE TABLE `events_management`  (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `date` date NULL DEFAULT NULL,
  `time` time NULL DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of events_management
-- ----------------------------

-- ----------------------------
-- Table structure for officers
-- ----------------------------
DROP TABLE IF EXISTS `officers`;
CREATE TABLE `officers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `officer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `officer_phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course` int NOT NULL,
  `year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organization_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `personal_statement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of officers
-- ----------------------------
INSERT INTO `officers` VALUES (19, '13', 'hdeuhf21@gmail.com', '09987654321', 0, '', '7', 'Treasurer', '');
INSERT INTO `officers` VALUES (20, '13', 'delacruzalyssa607@gmail.com', '09465379305', 0, '', '7', 'Vice President', '');
INSERT INTO `officers` VALUES (21, '10', 'yedhsnskdj@gmail.com', '99875443345', 0, '', '7', 'P.R.Os.', '');
INSERT INTO `officers` VALUES (23, 'Alyssa Dela Cruz', 'hdiwdni@gmail.com', '123456789', 0, '4th Year', '[value-7]', 'President', 'kjfhiuecenucej');

-- ----------------------------
-- Table structure for organizations
-- ----------------------------
DROP TABLE IF EXISTS `organizations`;
CREATE TABLE `organizations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `organization_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `organization_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `advisor_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp,
  `requirements` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of organizations
-- ----------------------------
INSERT INTO `organizations` VALUES (7, 'INFORMATION TECHNOLOGY STUDENT ORGANIZATION', 'Academic', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'abcdefg', 'rfsdxsz@gmail.com', '66b511a9a2d881.25436988.png', '2024-08-09', NULL);
INSERT INTO `organizations` VALUES (10, 'PSU-BC', 'Sports', 'COLLEGE OF ARTS SCIENCES AND TECHNOLOGY', 'aswa', 'aew@ghj.com', '66b597f1f24f47.45481820.jpg', '2024-08-09', NULL);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `middlename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `course` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `section` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `dob` date NOT NULL,
  `age` int NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `street` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `barangay` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `municipality` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (8, '20-BGU-190', 'Admin', 'admin', 'Dela Cruz', 'Alyssa', 'Lanorio', 'BS Information Technology', 'III', '3', 'Female', '2002-07-08', 22, 'delacruzalyssa607@gmail.com', '09465379305', 'zone 1', 'Vacante', 'Bautista', 'Pangasinan', 'Admin');
INSERT INTO `students` VALUES (10, '12-GYT-898', 'Alyssaaaa', '', 'edcsce', 'odoewdmw', 'iuijkre', 'BS Business Administration', 'II', '3', 'Female', '2004-08-09', 20, 'hdeuhf21@gmail.com', '09987654321', 'Namualan Sur', 'Diaz', 'Bautista', 'Pangasinan', 'Students');

SET FOREIGN_KEY_CHECKS = 1;
