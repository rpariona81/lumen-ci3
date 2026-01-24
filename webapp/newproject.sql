/*
Navicat MySQL Data Transfer

Source Server         : wsl24-MariaDB
Source Server Version : 50505
Source Host           : 172.27.106.45:3306
Source Database       : newproject

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2026-01-23 22:31:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('185', '2026_01_07_041248_t_sessions', '1');
INSERT INTO `migrations` VALUES ('186', '2026_01_08_041253_t_roles', '1');
INSERT INTO `migrations` VALUES ('187', '2026_01_08_043812_t_clients', '1');
INSERT INTO `migrations` VALUES ('188', '2026_01_09_041232_t_users', '1');
INSERT INTO `migrations` VALUES ('189', '2026_01_09_041257_t_menus', '1');
INSERT INTO `migrations` VALUES ('190', '2026_01_09_041948_t_password_reset_tokens', '1');
INSERT INTO `migrations` VALUES ('191', '2026_01_09_043219_t_role_user', '1');
INSERT INTO `migrations` VALUES ('192', '2026_01_10_035405_create_catalogs_table', '1');
INSERT INTO `migrations` VALUES ('193', '2026_01_10_040142_create_careers_table', '1');
INSERT INTO `migrations` VALUES ('194', '2026_01_10_041322_create_offer_clients_table', '1');
INSERT INTO `migrations` VALUES ('195', '2026_01_10_045109_create_ebooks_table', '1');
INSERT INTO `migrations` VALUES ('196', '2026_01_10_051133_client_ebook', '1');
INSERT INTO `migrations` VALUES ('197', '2026_01_15_033152_client_repo', '1');
INSERT INTO `migrations` VALUES ('198', '2026_01_15_035752_client_ebook_views', '1');
INSERT INTO `migrations` VALUES ('199', '2026_01_22_193558_client_career', '1');

-- ----------------------------
-- Table structure for `password_reset_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `t_careers`
-- ----------------------------
DROP TABLE IF EXISTS `t_careers`;
CREATE TABLE `t_careers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `career_name` varchar(255) NOT NULL,
  `career_description` varchar(255) NOT NULL,
  `career_code` varchar(255) NOT NULL,
  `career_alias` varchar(255) NOT NULL,
  `career_display` varchar(255) NOT NULL,
  `career_related` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_careers
-- ----------------------------
INSERT INTO `t_careers` VALUES ('1', 'Computer Science', 'Study of computers and computational systems.', 'CS101', 'CompSci', 'Computer Science', 'Engineering', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_careers` VALUES ('2', 'Business Administration', 'Study of business management and operations.', 'BA201', 'BizAdmin', 'Business Administration', 'Management', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_careers` VALUES ('3', 'Mechanical Engineering', 'Design and manufacture of mechanical systems.', 'ME301', 'MechEng', 'Mechanical Engineering', 'Engineering', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_careers` VALUES ('4', 'Psychology', 'Study of mind and behavior.', 'PSY401', 'Psych', 'Psychology', 'Social Sciences', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_careers` VALUES ('5', 'Graphic Design', 'Art and practice of planning and projecting ideas and experiences.', 'GD501', 'GraphDesign', 'Graphic Design', 'Arts', '2026-01-23 15:32:01', '2026-01-23 15:32:01');

-- ----------------------------
-- Table structure for `t_catalogs`
-- ----------------------------
DROP TABLE IF EXISTS `t_catalogs`;
CREATE TABLE `t_catalogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(255) NOT NULL,
  `catalog_description` varchar(255) DEFAULT NULL,
  `catalog_alias` varchar(255) NOT NULL,
  `catalog_display` varchar(255) DEFAULT NULL,
  `catalog_code` varchar(255) DEFAULT NULL,
  `catalog_ico` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_catalogs_catalog_name_unique` (`catalog_name`),
  UNIQUE KEY `t_catalogs_catalog_code_unique` (`catalog_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_catalogs
-- ----------------------------
INSERT INTO `t_catalogs` VALUES ('1', 'Undergraduate Programs', 'Programs leading to a bachelor\'s degree.', 'Undergrad', 'Undergraduate Programs', 'UG2024', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_catalogs` VALUES ('2', 'Graduate Programs', 'Programs leading to a master\'s or doctoral degree.', 'Grad', 'Graduate Programs', 'GR2024', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_catalogs` VALUES ('3', 'Professional Certifications', 'Certification programs for professional development.', 'ProfCert', 'Professional Certifications', 'PC2024', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_catalogs` VALUES ('4', 'Online Courses', 'Courses offered in an online format.', 'Online', 'Online Courses', 'OC2024', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_catalogs` VALUES ('5', 'Short-term Workshops', 'Intensive workshops on specific topics.', 'Workshops', 'Short-term Workshops', 'SW2024', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01');

-- ----------------------------
-- Table structure for `t_clients`
-- ----------------------------
DROP TABLE IF EXISTS `t_clients`;
CREATE TABLE `t_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_ruc_uid` varchar(255) DEFAULT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_logo` varchar(255) DEFAULT NULL,
  `client_verified_at` timestamp NULL DEFAULT NULL,
  `client_display` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `client_date_license` date DEFAULT NULL,
  `client_weburl` varchar(255) DEFAULT NULL,
  `client_subdomain` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_clients_client_email_unique` (`client_email`),
  UNIQUE KEY `t_clients_client_name_unique` (`client_name`),
  UNIQUE KEY `t_clients_client_ruc_uid_unique` (`client_ruc_uid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_clients
-- ----------------------------
INSERT INTO `t_clients` VALUES ('1', '123456789011', 'client01@example.com', 'Client 01', 'logo_client_01.png', '2026-01-23 15:32:02', 'Client 01 Display Name', '1', '2027-01-23', 'https://www.client01.com', '127.0', '2026-01-23 15:32:02', '2026-01-23 15:32:02');
INSERT INTO `t_clients` VALUES ('2', '100456789011', 'client02@example.com', 'Client 02', 'logo_client_02.png', '2026-01-23 15:32:00', 'Client 02 Display Name', '1', '2027-01-23', 'https://www.client02.com', 'client02', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_clients` VALUES ('3', '123456789013', 'client03@example.com', 'Client 03', 'logo_client_03.png', '2026-01-23 15:32:00', 'Client 03 Display Name', '1', '2027-01-23', 'https://www.client03.com', 'client03', '2026-01-23 15:32:00', '2026-01-23 15:32:00');

-- ----------------------------
-- Table structure for `t_client_career`
-- ----------------------------
DROP TABLE IF EXISTS `t_client_career`;
CREATE TABLE `t_client_career` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_career_name` varchar(255) NOT NULL,
  `client_career_description` varchar(255) DEFAULT NULL,
  `client_career_display` varchar(255) DEFAULT NULL,
  `client_career_related` varchar(255) DEFAULT NULL,
  `career_available` tinyint(1) NOT NULL DEFAULT 1,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_client_career
-- ----------------------------
INSERT INTO `t_client_career` VALUES ('1', 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', 'Study of computers and computational systems.', 'Arq. de Plataformas y Servicios TI', 'Computación e Informática', '1', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_career` VALUES ('2', 'Desarrollo de Sistemas de Información', 'Study of computers and computational systems.', 'Desarrollo de Sistemas de Información', 'Computación e Informática', '1', '2', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_career` VALUES ('3', 'Enfermería Técnica', 'Care body human and health.', 'Enfermería Técnica', 'Ciencias de la Salud', '1', '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_career` VALUES ('4', 'Enfermería Técnica', 'Care body human and health.', 'Enfermería Técnica', 'Ciencias de la Salud', '1', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_career` VALUES ('5', 'Enfermería Técnica', 'Care body human and health.', 'Enfermería Técnica', 'Ciencias de la Salud', '1', '2', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_career` VALUES ('6', 'Farmacia Técnica', 'Care body human and health.', 'Farmacia Técnica', 'Ciencias de la Salud', '1', '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);

-- ----------------------------
-- Table structure for `t_client_ebook`
-- ----------------------------
DROP TABLE IF EXISTS `t_client_ebook`;
CREATE TABLE `t_client_ebook` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `ebook_id` bigint(20) unsigned NOT NULL,
  `client_ebook_categories` varchar(255) DEFAULT NULL,
  `client_ebook_tags` varchar(255) DEFAULT NULL,
  `authorized` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_client_ebook
-- ----------------------------
INSERT INTO `t_client_ebook` VALUES ('1', '1', '1', null, 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('2', '2', '1', null, 'Enfermería Técnica, Farmacia Técnica, Laboratorio Clínico, Podología', '1', '2026-01-23 15:32:01', '2026-01-23 18:15:14');
INSERT INTO `t_client_ebook` VALUES ('3', '1', '2', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('4', '2', '2', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('5', '3', '2', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('6', '2', '3', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('7', '3', '3', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('8', '1', '4', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('9', '2', '4', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('10', '2', '5', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('11', '3', '5', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('12', '1', '6', null, 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('13', '3', '6', null, 'Desarrollo de Sistemas de Información', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('14', '1', '7', null, 'Arquitectura de Plataformas y Servicios de Tecnologías de la Información', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('15', '3', '7', null, 'Desarrollo de Sistemas de Información', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('16', '2', '8', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('17', '3', '8', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('18', '2', '9', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('19', '3', '9', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('20', '1', '10', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('21', '2', '10', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('22', '3', '10', null, 'Laboratorio Clínico', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('23', '1', '11', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('24', '2', '11', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('25', '1', '12', null, 'Enfermería Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('26', '2', '12', null, 'Farmacia Técnica', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_client_ebook` VALUES ('27', '3', '12', null, 'Laboratorio Clínico', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');

-- ----------------------------
-- Table structure for `t_client_repository`
-- ----------------------------
DROP TABLE IF EXISTS `t_client_repository`;
CREATE TABLE `t_client_repository` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `repo_code` varchar(255) DEFAULT NULL,
  `repo_isbn` varchar(255) DEFAULT NULL,
  `repo_title` varchar(255) DEFAULT NULL,
  `repo_alias` varchar(255) DEFAULT NULL,
  `repo_display` varchar(255) DEFAULT NULL,
  `repo_type` varchar(255) DEFAULT NULL,
  `repo_format` varchar(255) DEFAULT NULL,
  `repo_author` varchar(255) DEFAULT NULL,
  `repo_editorial` varchar(255) DEFAULT NULL,
  `repo_year` year(4) DEFAULT NULL,
  `repo_pages` int(11) DEFAULT NULL,
  `repo_front_page` varchar(255) DEFAULT NULL,
  `repo_details` text DEFAULT NULL,
  `repo_url` varchar(255) DEFAULT NULL,
  `repo_file` varchar(255) DEFAULT NULL,
  `repo_categories` varchar(255) DEFAULT NULL,
  `repo_tags` varchar(255) DEFAULT NULL,
  `repo_size` varchar(255) DEFAULT NULL,
  `repo_available` tinyint(1) NOT NULL DEFAULT 1,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_client_repository_repo_code_unique` (`repo_code`),
  UNIQUE KEY `t_client_repository_repo_isbn_unique` (`repo_isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=10000013 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_client_repository
-- ----------------------------
INSERT INTO `t_client_repository` VALUES ('10000001', '9420801160', '9787792123445', 'Guia Del Estudiante Pasteleria', null, 'Pastelería - Guía Del Estudiante', 'Ebook', 'PDF', 'Aida Ludeña Sánchez', 'Centro de Servicios para la Capacitación Laboral y Desarrollo - CAPLAB', '2020', '150', 'front_page_1.jpg', 'Una guía completa para estudiantes de pastelería.', 'http://example.com/repo1', 'repo1.pdf', 'Cocina, Pastelería', 'pastelería, cocina, guía', null, '1', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_repository` VALUES ('10000002', '172540026X', '9782094005925', 'Manual de Cocina Saludable', null, 'Cocina Saludable - Manual', 'Ebook', 'ePub', 'Carlos Pérez Gómez', 'Editorial Salud y Vida', '2021', '200', 'front_page_2.jpg', 'Manual para una cocina más saludable.', 'http://example.com/repo2', 'repo2.epub', 'Cocina, Salud', 'cocina, saludable, manual', null, '1', '2', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_repository` VALUES ('10000003', '4450686721', '9785452570424', 'Técnicas de Repostería Moderna', null, 'Repostería Moderna - Técnicas', 'Ebook', 'PDF', 'Lucía Fernández Martínez', 'Gastronomía y Arte Editorial', '2019', '180', 'front_page_3.jpg', 'Explora las técnicas más modernas en repostería.', 'http://example.com/repo3', 'repo3.pdf', 'Cocina, Repostería', 'repostería, moderna, técnicas', null, '1', '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_client_repository` VALUES ('10000004', 'e63ea0cc-a8f9-48cc-b84c-13101eda9d5a', null, 'De prueba', null, null, null, null, '', '', '2022', '9999', null, null, '/home/ronaldpa/project-lumen-ci3/webapp/uploads/pdf/17692051277_RonaldPariona_fichaRUC.pdf', '17692051277_RonaldPariona_fichaRUC.pdf', null, null, null, '1', '2', null, '2026-01-23 16:58:08', null);
INSERT INTO `t_client_repository` VALUES ('10000005', '00015455502', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000006', '00015455503', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000007', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000008', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000009', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000010', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000011', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);
INSERT INTO `t_client_repository` VALUES ('10000012', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '1', '2', null, null, null);

-- ----------------------------
-- Table structure for `t_ebooks`
-- ----------------------------
DROP TABLE IF EXISTS `t_ebooks`;
CREATE TABLE `t_ebooks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ebook_code` varchar(255) DEFAULT NULL,
  `ebook_isbn` varchar(255) DEFAULT NULL,
  `ebook_title` varchar(255) DEFAULT NULL,
  `ebook_alias` varchar(255) DEFAULT NULL,
  `ebook_display` varchar(255) DEFAULT NULL,
  `ebook_type` varchar(255) DEFAULT NULL,
  `ebook_format` varchar(255) DEFAULT NULL,
  `ebook_author` varchar(255) DEFAULT NULL,
  `ebook_editorial` varchar(255) DEFAULT NULL,
  `ebook_year` year(4) DEFAULT NULL,
  `ebook_pages` int(11) DEFAULT NULL,
  `ebook_front_page` varchar(255) DEFAULT NULL,
  `ebook_details` text DEFAULT NULL,
  `ebook_url` varchar(255) DEFAULT NULL,
  `ebook_file` varchar(255) DEFAULT NULL,
  `ebook_categories` varchar(255) DEFAULT NULL,
  `ebook_tags` varchar(255) DEFAULT NULL,
  `ebook_size` varchar(255) DEFAULT NULL,
  `ebook_available` tinyint(1) NOT NULL DEFAULT 1,
  `catalog_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_ebooks_ebook_code_unique` (`ebook_code`),
  UNIQUE KEY `t_ebooks_ebook_isbn_unique` (`ebook_isbn`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_ebooks
-- ----------------------------
INSERT INTO `t_ebooks` VALUES ('1', '011001', '9797655008864', 'Guia Del Estudiante Pasteleria', 'GUIA DEL ESTUDIANTE PASTELERIA', 'Pastelería - Guía Del Estudiante', null, 'PDF', 'Aida Ludeña Sánchez', 'Centro de Servicios para la Capacitación Laboral y Desarrollo - CAPLAB', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'GUIA_DEL_ESTUDIANTE_PASTELERIA.pdf', null, 'Pastelería, Cocina, Repostería', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('2', '011002', '9781548984434', 'Manual de Cocina Saludable', 'MANUAL DE COCINA SALUDABLE', 'Cocina Saludable - Manual', null, 'ePub', 'Carlos Pérez Gómez', 'Editorial Salud y Vida', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'MANUAL_DE_COCINA_SALUDABLE.epub', null, 'Cocina Saludable, Nutrición, Bienestar', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('3', '011003', '9791983866325', 'Técnicas de Repostería Moderna', 'TÉCNICAS DE REPOSTERÍA MODERNA', 'Repostería Moderna - Técnicas', null, 'PDF', 'Lucía Fernández Martínez', 'Gastronomía y Arte Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'TECNICAS_DE_REPOSTERIA_MODERNA.pdf', null, 'Repostería, Técnicas, Cocina', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('4', '011004', '9787315352260', 'Cocina Internacional para Principiantes', 'COCINA INTERNACIONAL PARA PRINCIPIANTES', 'Cocina Internacional - Principiantes', null, 'ePub', 'María López Rodríguez', 'Mundo Culinario Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'COCINA_INTERNACIONAL_PARA_PRINCIPIANTES.epub', null, 'Cocina Internacional, Cocina, Recetas', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('5', '011005', '9791788490329', 'Fundamentos de la Cocina Vegetariana', 'FUNDAMENTOS DE LA COCINA VEGETARIANA', 'Cocina Vegetariana - Fundamentos', null, 'PDF', 'Javier Ramírez Sánchez', 'Vida Saludable Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'FUNDAMENTOS_DE_LA_COCINA_VEGETARIANA.pdf', null, 'Cocina Vegetariana, Saludable, Nutrición', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('6', '011006', '9791683450763', 'Postres y Dulces Tradicionales', 'POSTRES Y DULCES TRADICIONALES', 'Dulces Tradicionales - Postres', null, 'ePub', 'Ana Gómez Torres', 'Sabores del Mundo Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'POSTRES_Y_DULCES_TRADICIONALES.epub', null, 'Postres, Dulces, Repostería', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('7', '011007', '9797114317742', 'Cocina Rápida y Fácil para Todos', 'COCINA RÁPIDA Y FÁCIL PARA TODOS', 'Cocina Rápida - Fácil para Todos', null, 'PDF', 'Sofía Hernández Ruiz', 'Editorial Cocina Práctica', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'COCINA_RAPIDA_Y_FACIL_PARA_TODOS.pdf', null, 'Cocina Rápida, Fácil, Recetas', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('8', '011008', '9790623128977', 'Cocina Gourmet para Ocasiones Especiales', 'COCINA GOURMET PARA OCASIONES ESPECIALES', 'Cocina Gourmet - Ocasiones Especiales', null, 'ePub', 'Diego Martínez López', 'Gastronomía de Lujo Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'COCINA_GOURMET_PARA_OCASIONES_ESPECIALES.epub', null, 'Cocina Gourmet, Lujo, Recetas', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('9', '011009', '9790568020701', 'Cocina Internacional Avanzada', 'COCINA INTERNACIONAL AVANZADA', 'Cocina Internacional - Avanzada', null, 'PDF', 'Elena Sánchez García', 'Mundo Culinario Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'COCINA_INTERNACIONAL_AVANZADA.pdf', null, 'Cocina Internacional, Avanzada, Recetas', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('10', '011010', '9796951969824', 'Técnicas de Cocina Profesional', 'TÉCNICAS DE COCINA PROFESIONAL', 'Cocina Profesional - Técnicas', null, 'ePub', 'Fernando Ruiz Pérez', 'Gastronomía y Arte Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'TECNICAS_DE_COCINA_PROFESIONAL.epub', null, 'Cocina Profesional, Técnicas, Gastronomía', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('11', '011011', '9786935673038', 'Cocina Saludable para Niños', 'COCINA SALUDABLE PARA NIÑOS', 'Cocina Saludable - Niños', null, 'PDF', 'Laura Torres Mendoza', 'Editorial Salud y Vida', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'COCINA_SALUDABLE_PARA_NINOS.pdf', null, 'Cocina Saludable, Niños, Nutrición', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);
INSERT INTO `t_ebooks` VALUES ('12', '011012', '9790136542659', 'Repostería Creativa para Fiestas', 'REPOSTERÍA CREATIVA PARA FIESTAS', 'Repostería Creativa - Fiestas', null, 'ePub', 'Marta Ramírez Vázquez', 'Sabores del Mundo Editorial', null, null, null, null, 'https://subway.ibookhub.net/repo/17296057365_1001_fundamentosfibraoptica.pdf', 'REPOSTERIA_CREATIVA_PARA_FIESTAS.epub', null, 'Repostería Creativa, Fiestas, Celebraciones', null, '1', null, '2026-01-23 15:32:01', '2026-01-23 15:32:01', null);

-- ----------------------------
-- Table structure for `t_ebooks_views`
-- ----------------------------
DROP TABLE IF EXISTS `t_ebooks_views`;
CREATE TABLE `t_ebooks_views` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `ebook_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_ebooks_views
-- ----------------------------
INSERT INTO `t_ebooks_views` VALUES ('1', '1', '1', '1', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_ebooks_views` VALUES ('2', '2', '2', '2', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_ebooks_views` VALUES ('3', '3', '3', '3', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_ebooks_views` VALUES ('4', '2', '10000002', '7', '1', '2026-01-23 18:04:19', '2026-01-23 18:04:19');
INSERT INTO `t_ebooks_views` VALUES ('5', '2', '1', '7', '1', '2026-01-23 18:05:35', '2026-01-23 18:05:35');
INSERT INTO `t_ebooks_views` VALUES ('6', '2', '1', '8', '1', '2026-01-23 18:24:24', '2026-01-23 18:24:24');
INSERT INTO `t_ebooks_views` VALUES ('7', '2', '1', '9', '1', '2026-01-23 18:39:55', '2026-01-23 18:39:55');

-- ----------------------------
-- Table structure for `t_offer_clients`
-- ----------------------------
DROP TABLE IF EXISTS `t_offer_clients`;
CREATE TABLE `t_offer_clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint(20) unsigned NOT NULL,
  `career_offered_code` varchar(255) DEFAULT NULL,
  `career_offered` varchar(255) NOT NULL,
  `level_offered` varchar(255) DEFAULT NULL,
  `career_timeframe` varchar(255) DEFAULT NULL,
  `knowledge_area` varchar(255) DEFAULT NULL,
  `career_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_offer_clients
-- ----------------------------
INSERT INTO `t_offer_clients` VALUES ('1', '1', 'P002', 'Computer Science', 'Bachelor', '4 years', 'Engineering', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_offer_clients` VALUES ('3', '3', 'P003', 'Graphic Design', 'Diploma', '1 year', 'Arts', '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_offer_clients` VALUES ('4', '1', 'P005', 'Mechanical Engineering', 'Bachelor', '4 years', 'Engineering', '1', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_offer_clients` VALUES ('5', '2', 'P006', 'Psychology', 'Master', '2 years', 'Social Sciences', '2', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_offer_clients` VALUES ('6', '3', 'P005', 'Data Science', 'PhD', '3 years', 'Engineering', '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_offer_clients` VALUES ('7', '2', 'P001', 'Astronomia', null, null, null, null, '2026-01-23 15:32:32', '2026-01-23 15:32:32');

-- ----------------------------
-- Table structure for `t_roles`
-- ----------------------------
DROP TABLE IF EXISTS `t_roles`;
CREATE TABLE `t_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `rolename` varchar(255) NOT NULL,
  `roledisplay` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_roles
-- ----------------------------
INSERT INTO `t_roles` VALUES ('1', 'sysadmin', 'System Administrator', 'admin', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('2', 'administrator', 'Administrador', 'admin', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('3', 'director', 'Director', 'admin', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('4', 'analyst', 'Analista', 'admin', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('5', 'support', 'Soporte', 'admin', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('6', 'user', 'Usuario', 'user', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_roles` VALUES ('7', 'trial', 'Visitante', 'user', '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');

-- ----------------------------
-- Table structure for `t_role_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_role_user`;
CREATE TABLE `t_role_user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `verified` bigint(20) unsigned NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_role_user
-- ----------------------------
INSERT INTO `t_role_user` VALUES ('1', '6', '1', '1', null, null);
INSERT INTO `t_role_user` VALUES ('2', '2', '2', '1', null, null);
INSERT INTO `t_role_user` VALUES ('3', '2', '3', '1', null, null);
INSERT INTO `t_role_user` VALUES ('4', '2', '4', '1', null, null);
INSERT INTO `t_role_user` VALUES ('5', '6', '5', '1', null, null);
INSERT INTO `t_role_user` VALUES ('6', '6', '6', '1', null, null);
INSERT INTO `t_role_user` VALUES ('7', '6', '7', '1', null, null);
INSERT INTO `t_role_user` VALUES ('8', '6', '8', '1', null, null);
INSERT INTO `t_role_user` VALUES ('9', '6', '9', '1', null, null);
INSERT INTO `t_role_user` VALUES ('10', '6', '10', '1', null, null);

-- ----------------------------
-- Table structure for `t_sessions`
-- ----------------------------
DROP TABLE IF EXISTS `t_sessions`;
CREATE TABLE `t_sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext DEFAULT NULL,
  `data` mediumblob NOT NULL,
  `last_activity` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t_sessions_user_id_index` (`user_id`),
  KEY `t_sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_sessions
-- ----------------------------
INSERT INTO `t_sessions` VALUES ('af4k3f7fj7snmsp3hekodcddk3lrrulq', null, '127.0.0.1', null, null, 0x5F5F63695F6C6173745F726567656E65726174657C693A313736393230393630323B557365727C733A353A2261646D696E223B456D61696C7C733A31343A2261646D696E4064656D6F2E636F6D223B526F6C657C733A31333A2241646D696E6973747261646F72223B436C69656E747C733A393A22436C69656E74203032223B557365725F67756172647C733A353A2261646D696E223B69734C6F676765647C623A313B, null, '1769209615');
INSERT INTO `t_sessions` VALUES ('ecd84pfem46i8ig5k8b4hgls3c59dtbk', null, '127.0.0.1', null, null, 0x5F5F63695F6C6173745F726567656E65726174657C693A313736393231343834373B5F5F63695F766172737C613A313A7B733A373A2273756363657373223B733A333A226F6C64223B7D737563636573737C733A38353A22536F6C69636974756420726563696269646120636F6E20C3A97869746F2C2073652061637469766172C3A1207375206375656E74612064656E74726F206465206C6173207072C3B378696D6173203234206872732E223B, null, '1769215262');

-- ----------------------------
-- Table structure for `t_users`
-- ----------------------------
DROP TABLE IF EXISTS `t_users`;
CREATE TABLE `t_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email_subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` datetime DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `client_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `t_users_email_unique` (`email`),
  UNIQUE KEY `t_users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of t_users
-- ----------------------------
INSERT INTO `t_users` VALUES ('1', 'Austen', 'Hilpert', 'userdemo@demo.com', 'userdemo', null, null, '$2y$10$jYPCGRPCQsgj9WTY9PLmDO2n6oRgjHtxnj9zBOvmPuZTlXqi1uoLW', '1', '1', null, null, null, '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_users` VALUES ('2', 'Cleveland', 'Nitzsche', 'admin@demo.com', 'admin', null, null, '$2y$10$jRBXBiuCgC/HD8MS/tl54e4MdjuxjunkDhGPQ7qyvf6jwihWTZs9S', '1', '1', null, '2026-01-23 18:43:19', '127.0.0.1', '2', '2026-01-23 15:32:00', '2026-01-23 18:43:19');
INSERT INTO `t_users` VALUES ('3', 'Britney', 'Goyette', 'support@demo.com', 'support', null, null, '$2y$10$jl4tn5tsOxoZXsSoNhIaPeJ9eYjMKC3TUkQIrYr1iIp9QGzeY57BK', '1', '1', null, null, null, '3', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_users` VALUES ('4', 'Lisette', 'Swift', 'user@example.com', 'user', null, null, '$2y$10$J9ZNxbHFTq8Cc8LVK8k72u2.w.ndH18K3E7GtZac26aT3QFNJoCX.', '1', '1', null, null, null, '1', '2026-01-23 15:32:00', '2026-01-23 15:32:00');
INSERT INTO `t_users` VALUES ('5', 'Emmet', 'Will', 'student@example.com', 'student', null, null, '$2y$10$/QY3tyjqltOo85./kt.hauBSw3rZTxf7FKy9LHsEHb7T3d.Zc.7Bu', '1', '1', null, null, null, '2', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_users` VALUES ('6', 'Estella', 'Beer', 'graduated@example.com', 'graduated', null, null, '$2y$10$y1jcupK4J6HooZc9rql3oOAb176aSodD8jkvCEo6PyvNN77MFG13m', '1', '1', null, null, null, '3', '2026-01-23 15:32:01', '2026-01-23 15:32:01');
INSERT INTO `t_users` VALUES ('7', 'Ruben', 'Blades', 'rblades@example.com', '64d139ef-da8e-4a4f-9064-9a05d5a0e538', null, null, '$2y$10$xOu6kXiuq5f/bxXWtahp6OqhC9ImMEtoLe.LS6Y4TdTs.FLHUUPmq', '1', '1', 'MTIzNDU2Nzg=', '2026-01-23 18:04:07', '127.0.0.1', '2', '2026-01-23 17:58:53', '2026-01-23 18:04:07');
INSERT INTO `t_users` VALUES ('8', 'Jhon', 'Doe', 'jdoe@example.com', '148d52da-61c2-4240-98f9-00d579aa1eb0', null, null, '$2y$10$YHS3bvCKvTXrOZ682aXVKuzhYd79YpG7jVWkIiao.2zQbxViWcJnC', '1', '1', 'MTIzNDU2Nzg=', '2026-01-23 18:23:55', '127.0.0.1', '2', '2026-01-23 18:09:56', '2026-01-23 18:23:55');
INSERT INTO `t_users` VALUES ('9', 'Abraham', 'Barros', 'abarros@example.com', 'c7db1e5b-1a30-4616-b112-1bccb6cd45c2', null, null, '$2y$10$4.LMQBRpPgwvXQRXK4vvsuNPwe5PnW8MZ4.uz9OHfiElaPlm.BpgK', '1', '1', 'MTIzNDU2Nzg=', '2026-01-23 18:39:15', '127.0.0.1', '2', '2026-01-23 18:36:22', '2026-01-23 18:39:15');
INSERT INTO `t_users` VALUES ('10', 'Roberto', 'Blades', 'robertoblades@example.com', 'ba48d7f8-0f3c-45d9-93c1-95fc1c17fc1d', null, null, '$2y$10$.ya0PJQg6RBrvoWM9VGwzufuP8FTZIMywbfScKmtHHGyVAZyoUC/e', '0', '0', 'MTIzNDU2Nzg=', null, null, '1', '2026-01-23 19:41:02', '2026-01-23 19:41:02');
