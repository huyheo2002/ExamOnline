DROP TABLE IF EXISTS `permissions`;
DROP TABLE IF EXISTS `permission_groups`;
DROP TABLE IF EXISTS `roles_permissions`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `permission_groups`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
--   PRIMARY KEY (`id`) USING BTREE,
);

CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL,
  `key` varchar(255) UNIQUE NOT NULL,
  `permisstion_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`permisstion_group_id`) REFERENCES permission_groups(`id`)
);

CREATE TABLE `roles_permissions`  (
  `permission_id` int(10),
  `role_id` int(10),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `roles`  (
  `id` int(10) PRIMARY KEY,
  `name` varchar(255),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE `users`  (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50),
  `email` varchar(50),
  `username` varchar(50),
  `password` varchar(50),
  `phone` varchar(50) NULL,
  `address` varchar(50),
  `school_id` int(10) NULL,
  `type` int(10) NULL,
  `parent_id` int(10) NULL,
  `verified_at` TIMESTAMP NULL DEFAULT NULL,
  `social_type` int(10),
  `social_id` varchar(50) UNIQUE NULL,
  `social_name` varchar(50) NULL,
  `social_nickname` varchar(50) NULL,
  `social_avatar` varchar(50) NULL,
  `description` varchar(50) NULL
);



