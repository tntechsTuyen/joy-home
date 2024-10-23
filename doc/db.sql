-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.3.0-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for joy_home
CREATE DATABASE IF NOT EXISTS `joy_home` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `joy_home`;

-- Dumping structure for table joy_home.auth_record
CREATE TABLE IF NOT EXISTS `auth_record` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip` text DEFAULT NULL,
  `device` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_auth_record_ip` (`ip`(768))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.auth_record: ~0 rows (approximately)

-- Dumping structure for table joy_home.channel
CREATE TABLE IF NOT EXISTS `channel` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `id_type` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_channel_code` (`code`(768)),
  KEY `IDX_channel_id_type` (`id_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.channel: ~0 rows (approximately)

-- Dumping structure for table joy_home.channel_message
CREATE TABLE IF NOT EXISTS `channel_message` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_channel` bigint(20) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `id_parent` varchar(254) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_channel_message_id_channel` (`id_channel`),
  KEY `IDX_channel_message_id_user` (`id_user`),
  KEY `IDX_channel_message_id_parent` (`id_parent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.channel_message: ~0 rows (approximately)

-- Dumping structure for table joy_home.channel_user
CREATE TABLE IF NOT EXISTS `channel_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_channel` bigint(20) DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `last_read_time` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_channel_user_id_channel` (`id_channel`),
  KEY `IDX_channel_user_id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.channel_user: ~0 rows (approximately)

-- Dumping structure for table joy_home.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `key` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `updated_date` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.config: ~1 rows (approximately)
INSERT INTO `config` (`id`, `key`, `name`, `value`, `type`, `created_date`, `updated_date`) VALUES
	(1, 'user_receive_message', NULL, '1', 'INT', '2024-10-23 08:00:00', '2024-10-23 08:00:00');

-- Dumping structure for table joy_home.form_cate
CREATE TABLE IF NOT EXISTS `form_cate` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_form_info` bigint(20) DEFAULT NULL,
  `id_parent` bigint(20) DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_form_step_cate_id_form_info` (`id_form_info`),
  KEY `IDX_form_step_cate_id_parent` (`id_parent`),
  KEY `IDX_form_step_cate_code` (`code`(768)),
  KEY `IDX_form_cate_id_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.form_cate: ~9 rows (approximately)
INSERT INTO `form_cate` (`id`, `id_form_info`, `id_parent`, `id_status`, `sort`, `type`, `code`, `name`, `description`, `created_date`, `updated_date`) VALUES
	(1, NULL, 0, NULL, 0, 'default', 'ad62e3a4-bd2c-412f-eaf5-67f5ed8760b8', 'ROOT', 'ROOT MAIN', '2024-10-12 13:25:20', '2024-10-12 13:25:20'),
	(2, 3, 0, NULL, 0, 'default', '39a9b8ab-3843-48d9-fabf-1c8410cef9cc', 'ROOT', 'ROOT MAIN', '2024-10-12 15:00:00', '2024-10-12 15:00:00'),
	(8, 3, 2, NULL, 1, 'default', '7f2d8ca1-71ab-45c6-9e28-eb4e56f78272', 'Test 1', 'Test 1', '2024-10-13 10:14:35', '2024-10-13 20:42:44'),
	(9, 3, 2, NULL, 2, 'default', '89dcd31a-6d96-480d-8ee7-39ca64406641', 'Test 2', 'Test 2', '2024-10-13 10:18:47', '2024-10-13 10:18:47'),
	(10, 3, 2, NULL, 3, 'default', '74b36abe-f879-4f13-8396-02a61c14078f', 'Test 3', 'Test 3', '2024-10-13 10:20:10', '2024-10-13 10:20:10'),
	(11, 3, 2, NULL, 4, 'default', 'c4cc5ebb-9b8f-4c9a-9afd-146626b4f1e2', 'Test 4', 'Test 4', '2024-10-13 10:26:46', '2024-10-13 10:26:46'),
	(13, 3, 8, NULL, 5, 'file', 'a34e8ffe-5057-4d0f-d0b9-db489a9ecd16', 'Step 1', '11111', '2024-10-13 16:05:07', '2024-10-13 16:05:07'),
	(14, 3, 8, NULL, 6, 'file', '5c6de967-3d5d-44a0-9e3d-297485aa97ef', 'Step 2', 'Nội dung mới', '2024-10-13 16:05:30', '2024-10-13 16:05:30'),
	(15, 4, 0, NULL, 0, NULL, 'b388e175-4aec-4100-9dc1-047a53b938bc', 'ROOT', 'ROOT MAIN', '2024-10-14 09:43:30', '2024-10-14 09:43:30');

-- Dumping structure for table joy_home.form_group
CREATE TABLE IF NOT EXISTS `form_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_parent` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_form_cate_id_parent` (`id_parent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.form_group: ~2 rows (approximately)
INSERT INTO `form_group` (`id`, `id_parent`, `code`, `name`, `description`, `created_date`, `updated_date`) VALUES
	(1, NULL, 'a3d4ff66-a619-4d58-f864-3d45b4cc7f0e', 'Group 1', 'Content Group 1', '2024-10-12 10:27:54', '2024-10-12 10:43:21'),
	(2, NULL, '477af156-7d0a-40dd-f2cf-ad16b8383eeb', 'Group 2', 'Group 2', '2024-10-12 12:21:48', '2024-10-14 10:38:13');

-- Dumping structure for table joy_home.form_info
CREATE TABLE IF NOT EXISTS `form_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_form_group` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `html_content` text DEFAULT NULL,
  `thumb_url` text DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_form_info_id_form_cate` (`id_form_group`),
  KEY `IDX_form_info_code` (`code`(768)),
  KEY `IDX_form_info_id_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.form_info: ~4 rows (approximately)
INSERT INTO `form_info` (`id`, `id_form_group`, `code`, `name`, `description`, `html_content`, `thumb_url`, `id_status`, `created_date`, `updated_date`) VALUES
	(1, 1, 'cc6ecce1-5131-4225-be2d-56fd18e0ae62', 'Course 1', 'Course 1', NULL, '', 1, '2024-10-12 12:30:56', '2024-10-12 12:30:56'),
	(2, 1, '3f00d001-872c-482f-8b4f-b7703b73653f', 'Course 2', 'Course 2', NULL, '', 1, '2024-10-12 13:25:20', '2024-10-12 13:25:20'),
	(3, 1, '49730550-9397-41dc-a609-cf10834ea444', 'Course 3', 'Course 3', NULL, '', 1, '2024-10-12 15:00:00', '2024-10-12 15:00:00'),
	(4, 2, '95ed7d2d-9337-4350-85c1-aa0d4c29d1e5', 'Course 4', 'Course 4', NULL, 'uploads/2024/10/14/b7549c6b-6024-4cb3-f8c4-1ac2934d7c67.png', 1, '2024-10-14 09:43:30', '2024-10-14 10:38:23');

-- Dumping structure for table joy_home.form_step
CREATE TABLE IF NOT EXISTS `form_step` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_form_cate` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `id_type` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDX_form_step_info_code` (`code`) USING HASH,
  KEY `IDX_form_step_info_id_form_step_cate` (`id_form_cate`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.form_step: ~3 rows (approximately)
INSERT INTO `form_step` (`id`, `id_form_cate`, `code`, `name`, `content`, `id_type`, `created_date`, `updated_date`) VALUES
	(1, 8, 'a706c649-871a-40f9-b3b8-76a12ff6677c', 'Test 1.1', '', 0, '2024-10-13 15:53:17', '2024-10-13 15:53:17'),
	(2, 8, 'a34e8ffe-5057-4d0f-d0b9-db489a9ecd16', 'Step 1', 'uploads/2024/10/14/43854b83-04bb-4c99-dc84-2ef6dd2a5435.png', 2, '2024-10-13 16:05:07', '2024-10-13 16:05:07'),
	(3, 8, '5c6de967-3d5d-44a0-9e3d-297485aa97ef', 'Step 2', '<p><b><u>Test content 2</u></b></p><p><span style="background-color: rgb(255, 0, 0);">ABCDE</span></p>', 1, '2024-10-13 16:05:30', '2024-10-13 16:05:30');

-- Dumping structure for table joy_home.media
CREATE TABLE IF NOT EXISTS `media` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `id_type` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `tmp_name` text DEFAULT NULL,
  `path` text DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDX_media_code` (`code`) USING HASH,
  KEY `IDX_media_id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.media: ~19 rows (approximately)
INSERT INTO `media` (`id`, `id_user`, `id_type`, `code`, `name`, `tmp_name`, `path`, `size`, `created_date`) VALUES
	(1, 0, 0, NULL, NULL, NULL, NULL, NULL, '2024-10-13 14:59:53'),
	(2, 0, 0, 'e9b8d9a8-c214-45f3-b720-a4c3e3f22c03', 'IMG_0440.JPG', 'C:\\Windows\\Temp\\php372B.tmp', NULL, 1625913, '2024-10-13 15:07:08'),
	(3, 0, 0, '76b36d8d-c50b-4ed2-ba8d-1214fe2c4b30', 'IMG_0440.JPG', 'C:\\Windows\\Temp\\phpA1FC.tmp', 'uploads/2024/10/13/76b36d8d-c50b-4ed2-ba8d-1214fe2c4b30.jpg', 1625913, '2024-10-13 15:07:35'),
	(4, 0, 0, 'a6bf80d9-c198-44a8-d713-5d3ed4e9b1d5', 'IMG_0440.JPG', 'C:\\Windows\\Temp\\php527B.tmp', 'uploads/2024/10/13/a6bf80d9-c198-44a8-d713-5d3ed4e9b1d5.jpg', 1625913, '2024-10-13 15:20:21'),
	(5, 0, 0, 'a49da552-5e00-411d-c3e8-529de495420d', 'IMG_0440.JPG', 'C:\\Windows\\Temp\\php7C57.tmp', 'uploads/2024/10/14/a49da552-5e00-411d-c3e8-529de495420d.jpg', 1625913, '2024-10-14 09:37:08'),
	(6, 0, 0, '73f84a62-bcb2-4c1e-8319-3849e4f925ac', '6.PNG', 'C:\\Windows\\Temp\\php61B6.tmp', 'uploads/2024/10/14/73f84a62-bcb2-4c1e-8319-3849e4f925ac.png', 3758, '2024-10-14 09:42:29'),
	(7, 0, 0, '1a7838b7-d130-4312-d11c-5cdf46251809', '6.PNG', 'C:\\Windows\\Temp\\phpC3EB.tmp', 'uploads/2024/10/14/1a7838b7-d130-4312-d11c-5cdf46251809.png', 3758, '2024-10-14 09:42:54'),
	(8, 0, 0, '682e6067-7988-4f7a-ff2a-05f029e77da4', '6.PNG', 'C:\\Windows\\Temp\\php4CD3.tmp', 'uploads/2024/10/14/682e6067-7988-4f7a-ff2a-05f029e77da4.png', 3758, '2024-10-14 09:43:29'),
	(9, 0, 0, '379aa70d-426d-4622-b837-426492d19f14', '6.PNG', 'C:\\Windows\\Temp\\php8C1F.tmp', 'uploads/2024/10/14/379aa70d-426d-4622-b837-426492d19f14.png', 3758, '2024-10-14 09:43:45'),
	(10, 0, 0, 'e4224cc4-82b6-482b-8249-9f4d0b0f9772', '6.PNG', 'C:\\Windows\\Temp\\php1B12.tmp', 'uploads/2024/10/14/e4224cc4-82b6-482b-8249-9f4d0b0f9772.png', 3758, '2024-10-14 09:44:22'),
	(11, 0, 0, '10fc7409-92c0-40f4-eb58-60b82ebcc5af', '6.PNG', 'C:\\Windows\\Temp\\phpC2B.tmp', 'uploads/2024/10/14/10fc7409-92c0-40f4-eb58-60b82ebcc5af.png', 3758, '2024-10-14 10:13:48'),
	(12, 0, 0, 'dabf50bd-0b5e-4237-d5a0-6e4d84f00eec', '6.PNG', 'C:\\Windows\\Temp\\php30D7.tmp', 'uploads/2024/10/14/dabf50bd-0b5e-4237-d5a0-6e4d84f00eec.png', 3758, '2024-10-14 10:18:19'),
	(13, 0, 0, 'd390d9b6-166d-4272-9a1e-7dc11cea3166', '6.PNG', 'C:\\Windows\\Temp\\php5E43.tmp', 'uploads/2024/10/14/d390d9b6-166d-4272-9a1e-7dc11cea3166.png', 3758, '2024-10-14 10:21:48'),
	(14, 0, 0, '5f6abb7c-9c79-4e2c-f654-d96bf1845d7e', '354735879_639125761162777_7982625726639455080_n.jpg', 'C:\\Windows\\Temp\\phpFCFB.tmp', 'uploads/2024/10/14/5f6abb7c-9c79-4e2c-f654-d96bf1845d7e.jpg', 194878, '2024-10-14 10:24:39'),
	(15, 0, 0, '45ff9a6f-6f7b-4c5e-f326-41354dd56a92', '354735879_639125761162777_7982625726639455080_n.jpg', 'C:\\Windows\\Temp\\php6E60.tmp', 'uploads/2024/10/14/45ff9a6f-6f7b-4c5e-f326-41354dd56a92.jpg', 194878, '2024-10-14 10:29:30'),
	(16, 0, 0, '21259a37-7da3-42d8-d9f2-18e32273283e', '6.PNG', 'C:\\Windows\\Temp\\php3DC7.tmp', 'uploads/2024/10/14/21259a37-7da3-42d8-d9f2-18e32273283e.png', 3758, '2024-10-14 10:30:23'),
	(17, 0, 0, 'b7549c6b-6024-4cb3-f8c4-1ac2934d7c67', '6.PNG', 'C:\\Windows\\Temp\\php1D55.tmp', 'uploads/2024/10/14/b7549c6b-6024-4cb3-f8c4-1ac2934d7c67.png', 3758, '2024-10-14 10:32:26'),
	(18, 0, 0, '7f33ef90-ff03-4ddf-cb62-a0ee6f2f0be9', '6.PNG', 'C:\\Windows\\Temp\\php2B0B.tmp', 'uploads/2024/10/14/7f33ef90-ff03-4ddf-cb62-a0ee6f2f0be9.png', 3758, '2024-10-14 11:06:21'),
	(19, 0, 0, '43854b83-04bb-4c99-dc84-2ef6dd2a5435', '6.PNG', 'C:\\Windows\\Temp\\phpCA6F.tmp', 'uploads/2024/10/14/43854b83-04bb-4c99-dc84-2ef6dd2a5435.png', 3758, '2024-10-14 11:09:13');

-- Dumping structure for table joy_home.order
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `id_user` bigint(20) DEFAULT NULL,
  `id_pack_info` bigint(20) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.order: ~0 rows (approximately)
INSERT INTO `order` (`id`, `code`, `id_user`, `id_pack_info`, `price`, `id_status`, `description`, `created_date`, `updated_date`) VALUES
	(1, '83976b4a-f36b-4f40-fe42-a98f6aa38102', 1, 1, 150000, 6, '', '2024-10-20 23:35:59', '2024-10-20 23:35:59');

-- Dumping structure for table joy_home.pack_form
CREATE TABLE IF NOT EXISTS `pack_form` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pack_info` bigint(20) DEFAULT NULL,
  `id_form_info` bigint(20) DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_pack_form_id_pack_info` (`id_pack_info`),
  KEY `IDX_pack_form_id_form_info` (`id_form_info`),
  KEY `IDX_pack_form_id_status` (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.pack_form: ~3 rows (approximately)
INSERT INTO `pack_form` (`id`, `id_pack_info`, `id_form_info`, `id_status`, `created_date`, `updated_date`) VALUES
	(1, 1, 1, 4, '2024-10-14 22:29:49', '2024-10-14 22:29:49'),
	(2, 1, 2, 4, '2024-10-14 22:29:49', '2024-10-14 22:29:49'),
	(3, 1, 3, 3, '2024-10-21 00:10:48', '2024-10-21 00:10:48');

-- Dumping structure for table joy_home.pack_info
CREATE TABLE IF NOT EXISTS `pack_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content_html` text DEFAULT NULL,
  `thumb_url` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_pack_info_code` (`code`(768))
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.pack_info: ~3 rows (approximately)
INSERT INTO `pack_info` (`id`, `code`, `name`, `description`, `content_html`, `thumb_url`, `price`, `created_date`, `updated_date`) VALUES
	(1, 'a68280d0-ba40-4d95-900a-2e6b62a0a440', 'Chiếc túi thần kỳ', 'Sản phẩm thực hành để cha mẹ chơi mà học cùng con hằng ngày ở nhà', '<p class="mt-3 mb-0">Đây là một sản phẩm thực hành để cha mẹ chơi mà học cùng con hằng ngày ở nhà giúp trẻ:</p>\r\n<p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Phát huy được tối đa năng lực của bản thân</p>\r\n<p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Xây dựng thói quen tập trung trong học tập</p>\r\n<p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Chuyên chú hoàn thành công việc được giao</p>\r\n<p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Tự tin, tự giác, tự lập</p>\r\n<p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Tăng cường khả năng suy nghĩ độc lập, giải quyết vấn đề.</p>', 'user/asset/img/cd8ee1f482ded4009fb50aa570b23dc9_1200_80.webp', 150000, '2024-10-14 14:47:40', '2024-10-20 09:28:28'),
	(2, 'f30cd42c-a0e6-4d2f-acb9-22ab6d03fc87', 'Em bé sơ sinh Montessori', 'Hướng dẫn cha mẹ về cách chăm sóc tôn trọng và phát triển trí lực cho trẻ từ 0-12 tháng', '<p class="mt-3 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Đây là một khóa học chuyên sâu dành cho các cha mẹ muốn học và áp dụng phương pháp Montessori từ khi con sinh ra đến 1 tuổi.</p><p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Những kiến thức trong khóa học sẽ giúp bố mẹ nuôi dạy những đứa trẻ hạnh phúc, có trách nhiệm, độc lập trong suy nghĩ, nghị lực trong đời sống, và biết cách đối nhân xử thế với những người xung quanh. </p>', 'user/asset/img/e298eea0760a2edabcc1a3fb3d37536d_1200_80.webp', 250000, '2024-10-20 09:31:55', '2024-10-20 09:31:55'),
	(3, 'c95d6bb0-4b11-4c45-9d5b-343419bc0b7c', 'Em bé biết đi Montessori', 'Hướng dẫn cha mẹ về cách chăm sóc tôn trọng và phát triển trí lực cho trẻ từ 12-36 tháng', '<p class="mt-3 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Đây là một khóa học chuyên sâu dành cho các cha mẹ muốn học tập và áp dụng phương pháp Montessori từ khi con trong giai đoạn 1 đến 3 tuổi. </p><p class="mt-1 mb-0"><i class="fas fa-check-circle me-2 text-secondary"></i>Những kiến thức trong khóa học sẽ giúp bố mẹ nuôi dạy những đứa trẻ hạnh phúc, có trách nhiệm, độc lập trong suy nghĩ, nghị lực trong đời sống, và biết cách đối nhân xử thế với những người xung quanh.</p>', 'user/asset/img/a9bd92197730cde4e022768ae8c36fd1_1200_80.webp', 350000, '2024-10-20 09:33:32', '2024-10-20 09:33:32');

-- Dumping structure for table joy_home.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `key` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `thumb` text DEFAULT NULL,
  `id_type` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.post: ~0 rows (approximately)

-- Dumping structure for table joy_home.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.role: ~3 rows (approximately)
INSERT INTO `role` (`id`, `code`, `name`, `description`) VALUES
	(1, 'admin', 'Quản trị viên', 'Quản trị hệ thống'),
	(2, 'student', 'Học viên', 'Học viên'),
	(3, 'guest', 'Khách vãng lai', 'Khách vãng lai');

-- Dumping structure for table joy_home.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `tbl_name` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_status_tbl_name` (`tbl_name`(768))
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.status: ~16 rows (approximately)
INSERT INTO `status` (`id`, `code`, `name`, `description`, `tbl_name`) VALUES
	(1, 'active', 'Hoạt động', NULL, 'user'),
	(2, 'un-active', 'Không hoạt động', NULL, 'user'),
	(3, 'active', 'Hoạt động', NULL, 'pack_form'),
	(4, 'un-active', 'Không hoạt động', NULL, 'pack_form'),
	(5, 'process', 'Đang xử lý', NULL, ''),
	(6, 'approve', 'Phê duyệt', NULL, 'order'),
	(7, 'reject', 'Từ chối', NULL, 'order'),
	(9, 'none', 'Chưa học', NULL, 'user_pack_form'),
	(10, 'process', 'Đang học', NULL, 'user_pack_form'),
	(11, 'finish', 'Hoàn thành', NULL, 'user_pack_form'),
	(12, 'none', 'Chưa học', NULL, 'user_pack_form_step'),
	(13, 'process', 'Đang học', NULL, 'user_pack_form_step'),
	(14, 'finish', 'Chưa học', NULL, 'user_pack_form_step'),
	(15, 'init', 'Khởi tạo', NULL, 'order'),
	(16, 'payment', 'Thanh toán', NULL, 'order'),
	(17, 'cancel', 'Hủy', NULL, 'order');

-- Dumping structure for table joy_home.type
CREATE TABLE IF NOT EXISTS `type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `code` varchar(254) DEFAULT NULL,
  `name` varchar(254) DEFAULT NULL,
  `ext` varchar(254) DEFAULT NULL,
  `tbl_name` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_type_tbl_name` (`tbl_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.type: ~4 rows (approximately)
INSERT INTO `type` (`id`, `code`, `name`, `ext`, `tbl_name`) VALUES
	(1, '1fafbc07-d5b3-49b3-8095-e44145fbad36', 'Văn bản', 'text', 'form_step'),
	(2, '544c87b4-80f3-4d97-a0ab-7119cc3bba1c', 'File ảnh', 'image/*', 'form_step'),
	(3, '89ada801-058b-4fa8-8d1b-0598371fd039', 'File PDF', 'application/pdf', 'form_step'),
	(4, 'af97369f-8cce-4a21-8284-5ef21e4ae65f', 'File video', 'video/*', 'form_step');

-- Dumping structure for table joy_home.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `uuid` text DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `full_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `avatar_url` text DEFAULT NULL,
  `id_role` bigint(20) DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDX_user_uuid` (`uuid`) USING HASH,
  KEY `FK_user_role` (`id_role`),
  KEY `FK_user_status` (`id_status`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_user_status` FOREIGN KEY (`id_status`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.user: ~2 rows (approximately)
INSERT INTO `user` (`id`, `uuid`, `username`, `password`, `full_name`, `email`, `phone`, `address`, `birth`, `gender`, `avatar_url`, `id_role`, `id_status`, `created_date`, `updated_date`) VALUES
	(1, 'e2438867-2c16-4d1e-8930-d86d6421903f', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Administrator', 'admin@site.com', '012345678', 'BN', '2024-10-01', b'0', '', 1, 1, '2024-10-06 17:01:52', '2024-10-10 22:04:53'),
	(2, 'a88111ce-2d0a-4429-efd7-1f4c39f420e1', 'admin1', '81dc9bdb52d04dc20036dbd8313ed055', 'administrator', 'admin@site.com', '12345', 'BN', '2024-10-04', b'0', '', 1, 1, '2024-10-12 10:17:11', '2024-10-12 10:17:11');

-- Dumping structure for table joy_home.user_meta
CREATE TABLE IF NOT EXISTS `user_meta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `meta_key` text DEFAULT NULL,
  `meta_value` text DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IDX_user_meta_id_user_meta_key` (`id_user`,`meta_key`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.user_meta: ~0 rows (approximately)

-- Dumping structure for table joy_home.user_pack_form
CREATE TABLE IF NOT EXISTS `user_pack_form` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) DEFAULT NULL,
  `id_order` bigint(20) DEFAULT NULL,
  `id_form_info` bigint(20) DEFAULT NULL,
  `id_pack_info` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `process` text DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.user_pack_form: ~0 rows (approximately)
INSERT INTO `user_pack_form` (`id`, `id_user`, `id_order`, `id_form_info`, `id_pack_info`, `code`, `process`, `id_status`, `created_date`, `updated_date`) VALUES
	(1, 1, 1, 3, 1, 'a6bf17c4-73ca-4f2d-84c2-eeccc9f2294c', '0', 9, '2024-10-21 00:17:06', '2024-10-21 00:17:06');

-- Dumping structure for table joy_home.user_pack_form_step
CREATE TABLE IF NOT EXISTS `user_pack_form_step` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user_pack_form` bigint(20) DEFAULT NULL,
  `id_step_info` bigint(20) DEFAULT NULL,
  `code` text DEFAULT NULL,
  `id_status` bigint(20) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table joy_home.user_pack_form_step: ~3 rows (approximately)
INSERT INTO `user_pack_form_step` (`id`, `id_user_pack_form`, `id_step_info`, `code`, `id_status`, `created_date`, `updated_date`) VALUES
	(1, 1, 1, '2767044a-8f07-11ef-9229-581122c23725', 12, '2024-10-21 00:17:06', '2024-10-21 00:17:06'),
	(2, 1, 2, '2767089c-8f07-11ef-9229-581122c23725', 12, '2024-10-21 00:17:06', '2024-10-21 00:17:06'),
	(3, 1, 3, '27670a18-8f07-11ef-9229-581122c23725', 12, '2024-10-21 00:17:06', '2024-10-21 00:17:06');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
