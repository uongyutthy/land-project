/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50725
 Source Host           : localhost:3306
 Source Schema         : land

 Target Server Type    : MySQL
 Target Server Version : 50725
 File Encoding         : 65001

 Date: 14/09/2019 22:10:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for group_profiles
-- ----------------------------
DROP TABLE IF EXISTS `group_profiles`;
CREATE TABLE `group_profiles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `record_status_id` smallint(5) unsigned NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `gro_pro_name_UNIQUE` (`name`),
  KEY `record_status_id` (`record_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of group_profiles
-- ----------------------------
BEGIN;
INSERT INTO `group_profiles` VALUES (1, 'Administrator', 1, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (2, 'Manager', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (3, 'Wah Supervisor', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (4, 'Purchase Officer', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (5, 'Viewer', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (6, 'Purchase Officer - Report', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (7, 'Senior Purchase Officer', 0, NULL, NULL, NULL, NULL);
INSERT INTO `group_profiles` VALUES (8, 'Wah Assistant', 0, NULL, NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
BEGIN;
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 1);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 40);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 41);
INSERT INTO `model_has_roles` VALUES (1, 'App\\User', 43);
INSERT INTO `model_has_roles` VALUES (4, 'App\\User', 51);
COMMIT;

-- ----------------------------
-- Table structure for permission_groups
-- ----------------------------
DROP TABLE IF EXISTS `permission_groups`;
CREATE TABLE `permission_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permission_groups
-- ----------------------------
BEGIN;
INSERT INTO `permission_groups` VALUES (1, 'User');
INSERT INTO `permission_groups` VALUES (2, 'Role');
INSERT INTO `permission_groups` VALUES (3, 'Item');
INSERT INTO `permission_groups` VALUES (4, 'BOQ Purpose');
INSERT INTO `permission_groups` VALUES (5, 'House block');
INSERT INTO `permission_groups` VALUES (6, 'Project');
INSERT INTO `permission_groups` VALUES (7, 'House Type');
INSERT INTO `permission_groups` VALUES (8, 'House');
INSERT INTO `permission_groups` VALUES (9, 'Issue Purpose');
INSERT INTO `permission_groups` VALUES (10, 'Supplier');
INSERT INTO `permission_groups` VALUES (11, 'Delivery Term');
INSERT INTO `permission_groups` VALUES (12, 'UOM');
INSERT INTO `permission_groups` VALUES (13, 'Department');
INSERT INTO `permission_groups` VALUES (14, 'Engineer Request');
INSERT INTO `permission_groups` VALUES (15, 'Bill of Quantity');
INSERT INTO `permission_groups` VALUES (16, 'Purchase Order');
INSERT INTO `permission_groups` VALUES (17, 'Invoice');
INSERT INTO `permission_groups` VALUES (18, 'Goods Receive Note');
INSERT INTO `permission_groups` VALUES (19, 'Goods Issue Note');
INSERT INTO `permission_groups` VALUES (20, 'Goods Return Note');
INSERT INTO `permission_groups` VALUES (21, 'Goods Transfer Note');
INSERT INTO `permission_groups` VALUES (22, 'Goods Transfer Note');
INSERT INTO `permission_groups` VALUES (23, 'Adjustment');
INSERT INTO `permission_groups` VALUES (24, 'Item Category');
INSERT INTO `permission_groups` VALUES (25, 'Staff');
INSERT INTO `permission_groups` VALUES (26, 'Staff Position');
INSERT INTO `permission_groups` VALUES (27, 'Report');
COMMIT;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission_group_id` int(11) DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of permissions
-- ----------------------------
BEGIN;
INSERT INTO `permissions` VALUES (1, 'create-user', 'Create user', 1, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (2, 'edit-user', 'Edit-user', 1, 'web', '2019-04-04 23:17:10', '2019-04-04 23:17:13');
INSERT INTO `permissions` VALUES (3, 'delete-user', 'Delete user', 1, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:14');
INSERT INTO `permissions` VALUES (4, 'user-list', 'User list', 1, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (5, 'role-list', 'Role list', 2, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (6, 'create-role', 'Create role', 2, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (7, 'item-list', 'Item list', 3, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (8, 'create-item', 'Create item', 3, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (9, 'edit-item', 'Edit item', 3, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (10, 'delete-item', 'Delete item', 3, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (11, 'boq-purpose-list', 'BOQ purpose list', 4, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (12, 'create-boq-purpose', 'Create BOQ purpose', 4, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (13, 'edit-boq-purpose', 'Edit BOQ purpose', 4, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (14, 'delete-boq-purpose', 'Delete BOQ purpose', 4, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (15, 'house-block-list', 'House block list', 5, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (16, 'create-house-block', 'Create house block', 5, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (17, 'edit-house-block', 'Edit house block', 5, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (18, 'delete-house-block', 'Delete house block', 5, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (19, 'project-list', 'Project list', 6, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (20, 'house-type-list', 'House type list', 7, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (21, 'house-list', 'House list', 8, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (22, 'issue-purpose-list', 'Issue purpose list', 9, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (23, 'create-issue-purpose', 'Create issue purpose', 9, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (24, 'edit-issue-purpose', 'Edit issue purpose', 9, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (25, 'delete-issue-purpose', 'Delete issue purpose', 9, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (26, 'supplier-list', 'Supplier list', 10, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (27, 'create-supplier', 'Create supplier', 10, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (28, 'edit-supplier', 'Edit supplier', 10, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (29, 'delete-supplier', 'Delete supplier', 10, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (30, 'delivery-term-list', 'Delivery term list', 11, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (31, 'create-delivery-term', 'Create delivery term', 11, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (32, 'edit-delivery-term', 'Edit delivery term', 11, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (33, 'delete-delivery-term', 'Delete delivery term', 11, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (34, 'uom-list', 'UOM list', 12, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (35, 'create-uom', 'Create UOM', 12, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (36, 'edit-uom', 'Edit UOM', 12, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (37, 'delete-uom', 'Delete UOM', 12, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (38, 'department-list', 'Department list', 13, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (39, 'create-department', 'Create department', 13, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (40, 'edit-department', 'Edit department', 13, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (41, 'delete-department', 'Delete department', 13, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (42, 'er-list', 'Engineer request list', 14, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (43, 'create-er', 'Create engineer request', 14, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (44, 'edit-er', 'Edit engineer request', 14, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (45, 'delete-er', 'Delete engineer request', 14, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (46, 'boq-list', 'BOQ list', 15, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (47, 'create-boq', 'Create BOQ', 15, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (48, 'edit-boq', 'Edit BOQ', 15, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (49, 'delete-boq', 'Delete BOQ', 15, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (50, 'po-list', 'Purchase order list', 16, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (51, 'create-po', 'Create purchase order', 16, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (52, 'edit-po', 'Edit purchase order', 16, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (53, 'delete-po', 'Delete purchase order', 16, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (54, 'invoice-list', 'Invoice list', 17, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (55, 'create-invoice', 'Create invoice', 17, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (56, 'edit-invoice', 'Edit invoice', 17, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (57, 'delete-invoice', 'Delete invoice', 17, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (58, 'grn-list', 'Goods receive note list', 18, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (59, 'create-grn', 'Create goods receive note', 18, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (60, 'edit-grn', 'Edit goods receive note', 18, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (61, 'delete-grn', 'Delete goods receive note', 18, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (62, 'gin-list', 'Goods issue note list', 19, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (63, 'create-gin', 'Create goods issue note', 19, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (64, 'edit-gin', 'Edit goods issue note', 19, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (65, 'delete-gin', 'Delete goods issue note', 19, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (66, 'gren-list', 'Goods return note list', 20, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (67, 'create-gren', 'Create goods return note', 20, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (68, 'edit-gren', 'Edit goods return note', 20, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (69, 'delete-gren', 'Delete goods return note', 20, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (70, 'gtn-list', 'Goods transfer note list', 21, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (71, 'create-gtn', 'Create goods transfer note', 21, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (72, 'edit-gtn', 'Edit goods transfer note', 21, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (73, 'delete-gtn', 'Delete goods transfer note', 21, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (74, 'gtn-list', 'Goods transfer note list', 22, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (75, 'create-gtn', 'Create goods transfer note', 22, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (76, 'edit-gtn', 'Edit goods transfer note', 22, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (77, 'delete-gtn', 'Delete goods transfer note', 22, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (78, 'adjustment-list', 'Adjustment list', 23, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (79, 'create-adjustment', 'Create adjustment', 23, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (80, 'edit-adjustment', 'Edit adjustment', 23, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (81, 'delete-adjustment', 'Delete adjustment', 23, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (83, 'edit-role', 'Edit role', 2, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (85, 'delete-role', 'Delete role', 2, 'web', '2019-04-04 23:17:12', '2019-04-04 23:17:12');
INSERT INTO `permissions` VALUES (86, 'item-category-list', 'Item category list', 24, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (87, 'create-item-category', 'Create item category', 24, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (88, 'edit-item-category', 'Edit item category', 24, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (89, 'delete-item-category', 'Delete item category', 24, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (90, 'staff-list', 'Staff list', 25, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (91, 'create-staff', 'Create staff', 25, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (92, 'edit-staff', 'Edit staff', 25, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (93, 'delete-staff', 'Delete staff', 25, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (94, 'staff-position-list', 'Staff position list', 26, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (95, 'create-staff-position', 'Create staff position', 26, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (96, 'edit-staff-position', 'Edit staff position', 26, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (97, 'delete-staff-position', 'Delete staff position', 26, 'web', '2019-04-04 16:10:48', '2019-04-04 16:10:48');
INSERT INTO `permissions` VALUES (98, 'verify-er', 'Verify', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (99, 'reject-verify-er', 'Reject after verify', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (100, 'reject-approve-er', 'Reject after approve', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (101, 'approve-er', 'Approve', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (102, 'revise-er', 'Revise', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (103, 'verify-boq', 'Verify', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (104, 'reject-verify-boq', 'Reject after verify', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (105, 'reject-approve-boq', 'Reject after approve', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (106, 'approve-boq', 'Approve', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (107, 'revise-boq', 'Revise', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (108, 'verify-gin', 'Verify', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (109, 'reject-verify-gin', 'Reject after verify', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (110, 'reject-approve-gin', 'Reject after approve', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (111, 'approve-gin', 'Approve', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (112, 'revise-gin', 'Revise', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (113, 'verify-grn', 'Verify', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (114, 'reject-verify-grn', 'Reject after verify', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (115, 'reject-approve-grn', 'Reject after approve', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (116, 'approve-grn', 'Approve', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (117, 'revise-grn', 'Revise', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (118, 'verify-gren', 'Verify', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (119, 'reject-verify-gren', 'Reject after verify', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (120, 'reject-approve-gren', 'Reject after approve', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (121, 'approve-gren', 'Approve', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (122, 'revise-gren', 'Revise', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (123, 'verify-po', 'Verify', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (124, 'reject-verify-po', 'Reject after verify', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (125, 'reject-approve-po', 'Reject after approve', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (126, 'approve-po', 'Approve', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (127, 'revise-po', 'Revise', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (128, 'verify-invoice', 'Verify', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (129, 'reject-verify-invoice', 'Reject after verify', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (130, 'reject-approve-invoice', 'Reject after approve', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (131, 'approve-invoice', 'Approve', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (132, 'revise-invoice', 'Revise', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (133, 'verify-adjustment', 'Verify', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (134, 'reject-verify-adjustment', 'Reject after verify', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (135, 'reject-approve-adjustment', 'Reject after approve', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (136, 'approve-adjustment', 'Approve', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (137, 'revise-adjustment', 'Revise', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (138, 'pending-adjustment', 'Pending', 23, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (139, 'pending-boq', 'Pending', 15, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (140, 'pending-er', 'Pending', 14, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (141, 'pending-gin', 'Pending', 19, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (142, 'pending-gren', 'Pending', 20, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (143, 'pending-grn', 'Pending', 18, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (144, 'pending-invoice', 'Pending', 17, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (145, 'pending-po', 'Pending', 16, 'web', '2019-07-30 00:00:00', NULL);
INSERT INTO `permissions` VALUES (146, 'report-list', 'Report List', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (147, 'generate-stock-on-hand-report', 'Generate Stock On Hand Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (148, 'export-stock-on-hand-report', 'Export Stock On Hand Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (149, 'report-list', 'Report List', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (150, 'generate-stock-on-hand-report', 'Generate Stock On Hand Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (151, 'export-stock-on-hand-report', 'Export Stock On Hand Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (152, 'generate-gin-report', 'Generate Goods Issue Note Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (153, 'export-gin-report', 'Export Goods Issue Note Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (154, 'generate-po-report', 'Generate Purchase Order Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (155, 'export-po-report', 'Export Purchase Order Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (156, 'generate-delivery-alert-report', 'Generate Delivery Alert Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (157, 'export-delivery-alert-report', 'Export Delivery Alert Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (158, 'generate-boq-report', 'Generate Boq Report', 27, 'web', NULL, NULL);
INSERT INTO `permissions` VALUES (159, 'export-boq-report', 'Export Boq Report', 27, 'web', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
BEGIN;
INSERT INTO `role_has_permissions` VALUES (1, 1);
INSERT INTO `role_has_permissions` VALUES (2, 1);
INSERT INTO `role_has_permissions` VALUES (3, 1);
INSERT INTO `role_has_permissions` VALUES (4, 1);
INSERT INTO `role_has_permissions` VALUES (5, 1);
INSERT INTO `role_has_permissions` VALUES (6, 1);
INSERT INTO `role_has_permissions` VALUES (7, 1);
INSERT INTO `role_has_permissions` VALUES (8, 1);
INSERT INTO `role_has_permissions` VALUES (9, 1);
INSERT INTO `role_has_permissions` VALUES (10, 1);
INSERT INTO `role_has_permissions` VALUES (11, 1);
INSERT INTO `role_has_permissions` VALUES (12, 1);
INSERT INTO `role_has_permissions` VALUES (13, 1);
INSERT INTO `role_has_permissions` VALUES (14, 1);
INSERT INTO `role_has_permissions` VALUES (15, 1);
INSERT INTO `role_has_permissions` VALUES (16, 1);
INSERT INTO `role_has_permissions` VALUES (17, 1);
INSERT INTO `role_has_permissions` VALUES (18, 1);
INSERT INTO `role_has_permissions` VALUES (19, 1);
INSERT INTO `role_has_permissions` VALUES (20, 1);
INSERT INTO `role_has_permissions` VALUES (21, 1);
INSERT INTO `role_has_permissions` VALUES (22, 1);
INSERT INTO `role_has_permissions` VALUES (23, 1);
INSERT INTO `role_has_permissions` VALUES (24, 1);
INSERT INTO `role_has_permissions` VALUES (25, 1);
INSERT INTO `role_has_permissions` VALUES (26, 1);
INSERT INTO `role_has_permissions` VALUES (27, 1);
INSERT INTO `role_has_permissions` VALUES (28, 1);
INSERT INTO `role_has_permissions` VALUES (29, 1);
INSERT INTO `role_has_permissions` VALUES (30, 1);
INSERT INTO `role_has_permissions` VALUES (31, 1);
INSERT INTO `role_has_permissions` VALUES (32, 1);
INSERT INTO `role_has_permissions` VALUES (33, 1);
INSERT INTO `role_has_permissions` VALUES (34, 1);
INSERT INTO `role_has_permissions` VALUES (35, 1);
INSERT INTO `role_has_permissions` VALUES (36, 1);
INSERT INTO `role_has_permissions` VALUES (37, 1);
INSERT INTO `role_has_permissions` VALUES (38, 1);
INSERT INTO `role_has_permissions` VALUES (39, 1);
INSERT INTO `role_has_permissions` VALUES (40, 1);
INSERT INTO `role_has_permissions` VALUES (41, 1);
INSERT INTO `role_has_permissions` VALUES (42, 1);
INSERT INTO `role_has_permissions` VALUES (43, 1);
INSERT INTO `role_has_permissions` VALUES (44, 1);
INSERT INTO `role_has_permissions` VALUES (45, 1);
INSERT INTO `role_has_permissions` VALUES (46, 1);
INSERT INTO `role_has_permissions` VALUES (47, 1);
INSERT INTO `role_has_permissions` VALUES (48, 1);
INSERT INTO `role_has_permissions` VALUES (49, 1);
INSERT INTO `role_has_permissions` VALUES (50, 1);
INSERT INTO `role_has_permissions` VALUES (51, 1);
INSERT INTO `role_has_permissions` VALUES (52, 1);
INSERT INTO `role_has_permissions` VALUES (53, 1);
INSERT INTO `role_has_permissions` VALUES (54, 1);
INSERT INTO `role_has_permissions` VALUES (55, 1);
INSERT INTO `role_has_permissions` VALUES (56, 1);
INSERT INTO `role_has_permissions` VALUES (57, 1);
INSERT INTO `role_has_permissions` VALUES (58, 1);
INSERT INTO `role_has_permissions` VALUES (59, 1);
INSERT INTO `role_has_permissions` VALUES (60, 1);
INSERT INTO `role_has_permissions` VALUES (61, 1);
INSERT INTO `role_has_permissions` VALUES (62, 1);
INSERT INTO `role_has_permissions` VALUES (63, 1);
INSERT INTO `role_has_permissions` VALUES (64, 1);
INSERT INTO `role_has_permissions` VALUES (65, 1);
INSERT INTO `role_has_permissions` VALUES (66, 1);
INSERT INTO `role_has_permissions` VALUES (67, 1);
INSERT INTO `role_has_permissions` VALUES (68, 1);
INSERT INTO `role_has_permissions` VALUES (69, 1);
INSERT INTO `role_has_permissions` VALUES (70, 1);
INSERT INTO `role_has_permissions` VALUES (71, 1);
INSERT INTO `role_has_permissions` VALUES (72, 1);
INSERT INTO `role_has_permissions` VALUES (73, 1);
INSERT INTO `role_has_permissions` VALUES (74, 1);
INSERT INTO `role_has_permissions` VALUES (75, 1);
INSERT INTO `role_has_permissions` VALUES (76, 1);
INSERT INTO `role_has_permissions` VALUES (77, 1);
INSERT INTO `role_has_permissions` VALUES (78, 1);
INSERT INTO `role_has_permissions` VALUES (79, 1);
INSERT INTO `role_has_permissions` VALUES (80, 1);
INSERT INTO `role_has_permissions` VALUES (81, 1);
INSERT INTO `role_has_permissions` VALUES (83, 1);
INSERT INTO `role_has_permissions` VALUES (85, 1);
INSERT INTO `role_has_permissions` VALUES (86, 1);
INSERT INTO `role_has_permissions` VALUES (87, 1);
INSERT INTO `role_has_permissions` VALUES (88, 1);
INSERT INTO `role_has_permissions` VALUES (89, 1);
INSERT INTO `role_has_permissions` VALUES (90, 1);
INSERT INTO `role_has_permissions` VALUES (91, 1);
INSERT INTO `role_has_permissions` VALUES (92, 1);
INSERT INTO `role_has_permissions` VALUES (93, 1);
INSERT INTO `role_has_permissions` VALUES (94, 1);
INSERT INTO `role_has_permissions` VALUES (95, 1);
INSERT INTO `role_has_permissions` VALUES (96, 1);
INSERT INTO `role_has_permissions` VALUES (97, 1);
INSERT INTO `role_has_permissions` VALUES (98, 1);
INSERT INTO `role_has_permissions` VALUES (99, 1);
INSERT INTO `role_has_permissions` VALUES (100, 1);
INSERT INTO `role_has_permissions` VALUES (101, 1);
INSERT INTO `role_has_permissions` VALUES (102, 1);
INSERT INTO `role_has_permissions` VALUES (103, 1);
INSERT INTO `role_has_permissions` VALUES (104, 1);
INSERT INTO `role_has_permissions` VALUES (105, 1);
INSERT INTO `role_has_permissions` VALUES (106, 1);
INSERT INTO `role_has_permissions` VALUES (107, 1);
INSERT INTO `role_has_permissions` VALUES (108, 1);
INSERT INTO `role_has_permissions` VALUES (109, 1);
INSERT INTO `role_has_permissions` VALUES (110, 1);
INSERT INTO `role_has_permissions` VALUES (111, 1);
INSERT INTO `role_has_permissions` VALUES (112, 1);
INSERT INTO `role_has_permissions` VALUES (113, 1);
INSERT INTO `role_has_permissions` VALUES (114, 1);
INSERT INTO `role_has_permissions` VALUES (115, 1);
INSERT INTO `role_has_permissions` VALUES (116, 1);
INSERT INTO `role_has_permissions` VALUES (117, 1);
INSERT INTO `role_has_permissions` VALUES (118, 1);
INSERT INTO `role_has_permissions` VALUES (119, 1);
INSERT INTO `role_has_permissions` VALUES (120, 1);
INSERT INTO `role_has_permissions` VALUES (121, 1);
INSERT INTO `role_has_permissions` VALUES (122, 1);
INSERT INTO `role_has_permissions` VALUES (123, 1);
INSERT INTO `role_has_permissions` VALUES (124, 1);
INSERT INTO `role_has_permissions` VALUES (125, 1);
INSERT INTO `role_has_permissions` VALUES (126, 1);
INSERT INTO `role_has_permissions` VALUES (127, 1);
INSERT INTO `role_has_permissions` VALUES (128, 1);
INSERT INTO `role_has_permissions` VALUES (129, 1);
INSERT INTO `role_has_permissions` VALUES (130, 1);
INSERT INTO `role_has_permissions` VALUES (131, 1);
INSERT INTO `role_has_permissions` VALUES (132, 1);
INSERT INTO `role_has_permissions` VALUES (133, 1);
INSERT INTO `role_has_permissions` VALUES (134, 1);
INSERT INTO `role_has_permissions` VALUES (135, 1);
INSERT INTO `role_has_permissions` VALUES (136, 1);
INSERT INTO `role_has_permissions` VALUES (137, 1);
INSERT INTO `role_has_permissions` VALUES (138, 1);
INSERT INTO `role_has_permissions` VALUES (139, 1);
INSERT INTO `role_has_permissions` VALUES (140, 1);
INSERT INTO `role_has_permissions` VALUES (141, 1);
INSERT INTO `role_has_permissions` VALUES (142, 1);
INSERT INTO `role_has_permissions` VALUES (143, 1);
INSERT INTO `role_has_permissions` VALUES (144, 1);
INSERT INTO `role_has_permissions` VALUES (145, 1);
INSERT INTO `role_has_permissions` VALUES (146, 1);
INSERT INTO `role_has_permissions` VALUES (147, 1);
INSERT INTO `role_has_permissions` VALUES (148, 1);
INSERT INTO `role_has_permissions` VALUES (150, 1);
INSERT INTO `role_has_permissions` VALUES (151, 1);
INSERT INTO `role_has_permissions` VALUES (152, 1);
INSERT INTO `role_has_permissions` VALUES (153, 1);
INSERT INTO `role_has_permissions` VALUES (154, 1);
INSERT INTO `role_has_permissions` VALUES (155, 1);
INSERT INTO `role_has_permissions` VALUES (156, 1);
INSERT INTO `role_has_permissions` VALUES (157, 1);
INSERT INTO `role_has_permissions` VALUES (158, 1);
INSERT INTO `role_has_permissions` VALUES (159, 1);
COMMIT;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of roles
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES (1, 'admin', 'Administrator', 'web', '2019-04-05 13:48:28', '2019-04-05 13:48:28');
INSERT INTO `roles` VALUES (4, 'cashier', NULL, 'web', '2019-04-05 15:35:50', '2019-04-05 15:35:50');
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_lang` char(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record_status_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `last_login_ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `record_status_id` (`record_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Administrator', 'admin@admin.com', 'admin@admin.com', '$2y$10$tOg1Tt4tOOe4cWySMd064uZH7TMKxZAsgSNOOb4IDC9WHXSFsocEO', '', NULL, 'en', 'RxeqDpSnOEYxDLcAwRaFyseaOvwMmhiVWH2NnjPoUqQ1RHjjHt5eJ1XH9lxg', 1, '2018-09-09 08:09:10', '2019-08-21 15:24:23', '2018-09-13 02:06:09', '127.0.0.1');
INSERT INTO `users` VALUES (37, 'test', 'test', 'test@example.com', '$2y$10$WNBMOIsuMof16R/0ExRBpeArI9.7xtFbXYlMvOlDpD2C86/F8wyRq', 'profile_pictures/aADu0LgFXnCjg3pGR7UvB8VLJMG6sTwARTe4k4qe.jpeg', 'test', NULL, 'lTGlQjq5fBFPJVP9f7hrrokP8uokMRws2GVUtefVq8y81yEQj8n6qzioR8WX', 1, '2019-04-02 16:04:06', '2019-04-05 17:27:08', NULL, NULL);
INSERT INTO `users` VALUES (39, 'john', 'john', 'john@example.com', '$2y$10$06zdVCLrgVn/O0FK5sywcey83Zj8ppTRnI8LWuNdHg47k2QIFf7tu', 'profile_pictures/L8CPlKZSG4x6IQfNILaak6UalZ6aTxb6AbJrPu8c.jpeg', 'test', NULL, NULL, 1, '2019-04-02 17:59:42', '2019-04-03 15:04:04', NULL, NULL);
INSERT INTO `users` VALUES (40, 'tester1', 'tester1', NULL, '$2y$10$TGBaVjnL5Ifn9uxivq7s6e3O60u50peqJfRDuRBt45P4Kidfe9eZ6', NULL, NULL, NULL, NULL, 1, '2019-04-05 15:44:25', '2019-04-05 15:44:25', NULL, NULL);
INSERT INTO `users` VALUES (41, 'tester2', 'tester2', NULL, '$2y$10$H.CiuCAdfaAIIMFpwTFwLeoiyeNVmgtcw9Ah24byWRUGFUzfryy8S', 'profile_pictures/QSkOBtNJrmVC22x7wjR8P710aEnZe7oPW7SwobpE.jpeg', NULL, NULL, NULL, 1, '2019-04-05 15:51:17', '2019-04-05 15:51:17', NULL, NULL);
INSERT INTO `users` VALUES (51, 'tester3', 'tester3', NULL, '$2y$10$rPx8/e9AMM0wm1N4wjDpmuCwRRG5fJuqxEPR0C8uN1Bi.mSteeHnO', NULL, NULL, NULL, NULL, 1, '2019-04-06 14:55:54', '2019-04-06 14:55:54', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users_logs
-- ----------------------------
DROP TABLE IF EXISTS `users_logs`;
CREATE TABLE `users_logs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

SET FOREIGN_KEY_CHECKS = 1;
