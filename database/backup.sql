DROP TABLE IF EXISTS `exams_questions`;
DROP TABLE IF EXISTS `users_exams`;
DROP TABLE IF EXISTS `exams`;
DROP TABLE IF EXISTS `answers`;
DROP TABLE IF EXISTS `questions`;
DROP TABLE IF EXISTS `users_categories`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;
DROP TABLE IF EXISTS `roles_permissions`;
DROP TABLE IF EXISTS `roles`;
DROP TABLE IF EXISTS `permissions`;
DROP TABLE IF EXISTS `permission_groups`;

-- nhóm quyền
CREATE TABLE `permission_groups`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

-- phân quyền
CREATE TABLE `permissions`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255) UNIQUE NOT NULL,
  `key` varchar(255) UNIQUE NOT NULL,
  `permission_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups`(`id`)
);

-- vai trò
CREATE TABLE `roles`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

-- kết nối nhiều :V (bảng nối)
CREATE TABLE `roles_permissions`  (
  `permission_id` int(10) UNSIGNED,
  `role_id` int(10) UNSIGNED,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`),
  FOREIGN KEY (`permission_id`) REFERENCES `permissions`(`id`)
);

-- người dùng
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50),
  `email` varchar(50),
  `username` varchar(50),
  `password` varchar(50),
  `phone` varchar(50) NULL,
  `role_id` int(10) UNSIGNED,
  `avatar` varchar(255),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`role_id`) REFERENCES `roles`(`id`)
);

-- danh mục (chủ đề của câu hỏi/đề thi)
CREATE TABLE `categories` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
);

-- bổ nhiệm danh mục cho người dùng (giáo viên có thể ra đề về chủ đề nào)
CREATE TABLE `users_categories` (
  `user_id` int(10) UNSIGNED,
  `category_id` int(10) UNSIGNED,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`)
);

-- câu hỏi
CREATE TABLE `questions` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `content` varchar(255),
  `category_id` int(10) UNSIGNED,
  `created_by` int(10) UNSIGNED COMMENT 'user_id',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
);

-- đề thi
CREATE TABLE `exams` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(255),
  `category_id` int(10) UNSIGNED,
  `created_by` int(10) UNSIGNED COMMENT 'user_id',
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`),
  FOREIGN KEY (`created_by`) REFERENCES `users`(`id`)
);

-- câu hỏi đề thi (ngân hàng câu hỏi :v) (bảng nối)
CREATE TABLE `exams_questions` (
  `exam_id` int(10) UNSIGNED,
  `question_id` int(10) UNSIGNED,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`question_id`) REFERENCES `questions`(`id`),
  FOREIGN KEY (`exam_id`) REFERENCES `exams`(`id`)
);

-- câu trả lời
CREATE TABLE `answers` (
  `id` int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `content` varchar(255),
  `correct` Boolean,
  `question_id` int(10) UNSIGNED,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`question_id`) REFERENCES `questions`(`id`)
);

-- bảng nối user với exam
CREATE TABLE `users_exams`  (
  `user_id` int(10) UNSIGNED,
  `exam_id` int(10) UNSIGNED,
  `result` double,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users`(`id`),
  FOREIGN KEY (`exam_id`) REFERENCES `exams`(`id`)
);

-- insert
-- permission_groups
INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`) 
VALUES 
(NULL, 'Quản lý nhóm quyền', current_timestamp(), NULL), 
(NULL, 'Quản lý quyền', current_timestamp(), NULL), 
(NULL, 'Quản lý vai trò', current_timestamp(), NULL), 
(NULL, 'Quản lý người dùng', current_timestamp(), NULL),
(NULL, 'Quản lý danh mục', current_timestamp(), NULL),
(NULL, 'Quản lý câu hỏi', current_timestamp(), NULL),
(NULL, 'Quản lý đề thi', current_timestamp(), NULL);

-- permission
INSERT INTO `permissions` (`id`, `name`, `key`, `permission_group_id`, `created_at`, `updated_at`) 
VALUES 
(NULL, 'Xem danh sách nhóm quyền', 'viewAny-permission-group', '1', current_timestamp(), NULL), 
(NULL, 'Xem nhóm quyền', 'view-permission-group', '1', current_timestamp(), NULL),
(NULL, 'Thêm mới nhóm quyền', 'create-permission-group', '1', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa nhóm quyền', 'update-permission-group', '1', current_timestamp(), NULL),
(NULL, 'Xóa bỏ nhóm quyền', 'delete-permission-group', '1', current_timestamp(), NULL),
(NULL, 'Xem danh sách quyền', 'viewAny-permission', '2', current_timestamp(), NULL), 
(NULL, 'Xem quyền', 'view-permission', '2', current_timestamp(), NULL),
(NULL, 'Thêm mới quyền', 'create-permission', '2', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa quyền', 'update-permission', '2', current_timestamp(), NULL),
(NULL, 'Xóa bỏ quyền', 'delete-permission', '2', current_timestamp(), NULL),
(NULL, 'Xem danh sách vai trò', 'viewAny-role', '3', current_timestamp(), NULL), 
(NULL, 'Xem vai trò', 'view-role', '3', current_timestamp(), NULL),
(NULL, 'Thêm mới vai trò', 'create-role', '3', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa vai trò', 'update-role', '3', current_timestamp(), NULL),
(NULL, 'Xóa bỏ vai trò', 'delete-role', '3', current_timestamp(), NULL),
(NULL, 'Xem danh sách người dùng', 'viewAny-user', '4', current_timestamp(), NULL), 
(NULL, 'Xem người dùng', 'view-user', '4', current_timestamp(), NULL),
(NULL, 'Thêm mới người dùng', 'create-user', '4', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa người dùng', 'update-user', '4', current_timestamp(), NULL),
(NULL, 'Xóa bỏ người dùng', 'delete-user', '4', current_timestamp(), NULL),
(NULL, 'Xem danh sách danh mục', 'viewAny-category', '5', current_timestamp(), NULL), 
(NULL, 'Xem danh mục', 'view-category', '5', current_timestamp(), NULL),
(NULL, 'Thêm mới danh mục', 'create-category', '5', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa danh mục', 'update-category', '5', current_timestamp(), NULL),
(NULL, 'Xóa bỏ danh mục', 'delete-category', '5', current_timestamp(), NULL),
(NULL, 'Xem danh sách câu hỏi', 'viewAny-question', '6', current_timestamp(), NULL), 
(NULL, 'Xem câu hỏi', 'view-question', '6', current_timestamp(), NULL),
(NULL, 'Thêm mới câu hỏi', 'create-question', '6', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa câu hỏi', 'update-question', '6', current_timestamp(), NULL),
(NULL, 'Xóa bỏ câu hỏi', 'delete-question', '6', current_timestamp(), NULL),
(NULL, 'Xem danh sách đề thi', 'viewAny-exam', '7', current_timestamp(), NULL), 
(NULL, 'Xem đề thi', 'view-exam', '7', current_timestamp(), NULL),
(NULL, 'Thêm mới đề thi', 'create-exam', '7', current_timestamp(), NULL),
(NULL, 'Chỉnh sửa đề thi', 'update-exam', '7', current_timestamp(), NULL),
(NULL, 'Xóa bỏ đề thi', 'delete-exam', '7', current_timestamp(), NULL);

-- roles
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`)
VALUES
(NULL, 'Admin', current_timestamp(), NULL),
(NULL, 'Nhân viên', current_timestamp(), NULL), 
(NULL, 'Giáo viên', current_timestamp(), NULL), 
(NULL, 'Học viên', current_timestamp(), NULL);

-- roles_permissions
INSERT INTO `roles_permissions` (`permission_id`, `role_id`, `created_at`, `updated_at`)
VALUES
-- admin
('1', '1', current_timestamp(), NULL),
('2', '1', current_timestamp(), NULL),
('3', '1', current_timestamp(), NULL),
('4', '1', current_timestamp(), NULL),
('5', '1', current_timestamp(), NULL),
('6', '1', current_timestamp(), NULL),
('7', '1', current_timestamp(), NULL),
('8', '1', current_timestamp(), NULL),
('9', '1', current_timestamp(), NULL),
('10', '1', current_timestamp(), NULL),
('11', '1', current_timestamp(), NULL),
('12', '1', current_timestamp(), NULL),
('13', '1', current_timestamp(), NULL),
('14', '1', current_timestamp(), NULL),
('15', '1', current_timestamp(), NULL),
('16', '1', current_timestamp(), NULL),
('17', '1', current_timestamp(), NULL),
('18', '1', current_timestamp(), NULL),
('19', '1', current_timestamp(), NULL),
('20', '1', current_timestamp(), NULL),
('21', '1', current_timestamp(), NULL),
('22', '1', current_timestamp(), NULL),
('23', '1', current_timestamp(), NULL),
('24', '1', current_timestamp(), NULL),
('25', '1', current_timestamp(), NULL),
('26', '1', current_timestamp(), NULL),
('27', '1', current_timestamp(), NULL),
('28', '1', current_timestamp(), NULL),
('29', '1', current_timestamp(), NULL),
('30', '1', current_timestamp(), NULL),
('31', '1', current_timestamp(), NULL),
('32', '1', current_timestamp(), NULL),
('33', '1', current_timestamp(), NULL),
('34', '1', current_timestamp(), NULL),
('35', '1', current_timestamp(), NULL),
-- nhân viên
('1', '2', current_timestamp(), NULL),
('2', '2', current_timestamp(), NULL),
('6', '2', current_timestamp(), NULL),
('7', '2', current_timestamp(), NULL),
('11', '2', current_timestamp(), NULL),
('12', '2', current_timestamp(), NULL),
('16', '2', current_timestamp(), NULL),
('17', '2', current_timestamp(), NULL),
('21', '2', current_timestamp(), NULL),
('22', '2', current_timestamp(), NULL),
('26', '2', current_timestamp(), NULL),
('27', '2', current_timestamp(), NULL),
('31', '2', current_timestamp(), NULL),
('32', '2', current_timestamp(), NULL),
-- giáo viên
('26', '3', current_timestamp(), NULL),
('27', '3', current_timestamp(), NULL),
('28', '3', current_timestamp(), NULL),
('29', '3', current_timestamp(), NULL),
('30', '3', current_timestamp(), NULL),
('31', '3', current_timestamp(), NULL),
('32', '3', current_timestamp(), NULL),
('33', '3', current_timestamp(), NULL),
('34', '3', current_timestamp(), NULL),
('35', '3', current_timestamp(), NULL);

-- user
INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `phone`, `role_id`, `avatar`) 
VALUES 
(NULL, 'Nguyễn Văn Huy', 'huy.admin@gmail.com', 'huyadmin', '123', '0123456789', '1', NULL),
(NULL, 'Nhân viên Nguyên', 'nguyen.staff@gmail.com', 'nvnguyen', '123', '0123456987', '2', NULL),
(NULL, 'Giáo viên Văn', 'van.teacher@gmail.com', 'gvvan', '123', '0123654789', '3', NULL),
(NULL, 'Giáo viên Ngọc', 'ngoc.teacher@gmail.com', 'gvngoc', '123', '0123654987', '3', NULL),
(NULL, 'Học viên Long', 'long.student@gmail.com', 'hvlong', '123', '0321456789', '4', NULL),
(NULL, 'Học viên Vy', 'vy.student@gmail.com', 'hvvy', '123', '0321456987', '4', NULL),
(NULL, 'Học viên Hải', 'hai.student@gmail.com', 'hvhai', '123', '0321654789', '4', NULL),
(NULL, 'Học viên Huy', 'huy.student@gmail.com', 'hvhuy', '123', '0321654987', '4', NULL);

-- category
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) 
VALUES
(NULL, 'Văn hoá & Xã hội', NULL, NULL),
(NULL, 'Triết học đại cương', NULL, NULL),
(NULL, '300 bài code thiếu nhi', NULL, NULL),
(NULL, 'Tư tưởng Hồ Chí Minh', NULL, NULL);

-- users_categories
INSERT INTO `users_categories` (`user_id`, `category_id`, `created_at`, `updated_at`) 
VALUES
('3', '1', NULL, NULL),
('4', '2', NULL, NULL),
('3', '3', NULL, NULL),
('4', '4', NULL, NULL);

-- questions
INSERT INTO `questions` (`id`, `content`, `category_id`, `created_by`, `created_at`, `updated_at`) 
VALUES
(NULL, 'Hai món ăn không thể thiếu của ngày lễ Tạ ơn là gì?', '1', '1', NULL, NULL),
(NULL, 'Ai là người đặt tên cho con đường Thanh Niên?', '1', '3', NULL, NULL),
(NULL, 'Phong trào Duy Tân do ai sáng lập?', '1', '1', NULL, NULL),
(NULL, 'Truyện Kiều có tất cả bao nhiêu câu lục bát', '1', '3', NULL, NULL),
(NULL, 'Rừng U Minh thuộc tỉnh nào?', '1', '1', NULL, NULL),
(NULL, 'Lễ hội óc-om-boóc là lễ cúng trăng của đồng bào nào?', '1', '3', NULL, NULL),
(NULL, 'Nơi nào đựơc mệnh danh là Thiên hạ đệ nhất kỳ quan?', '1', '1', NULL, NULL),
(NULL, 'Đạo giáo do ai sáng lập?', '1', '3', NULL, NULL),
(NULL, 'Nội dung', '1', '1', NULL, NULL);

-- answers
INSERT INTO `answers` (`id`, `content`, `correct`, `question_id`, `created_at`, `updated_at`) 
VALUES
(NULL, 'Gà tây và ngô', '1', '1', NULL, NULL),
(NULL, 'Khoai tây và ngô', '0', '1', NULL, NULL),
(NULL, 'Súp gà và khoai tây', '0', '1', NULL, NULL),
(NULL, 'Súp gà và ngô', '0', '1', NULL, NULL),
(NULL, 'Võ Nguyên Giáp', '0', '2', NULL, NULL),
(NULL, 'Nguyễn Tấn Dũng', '0', '2', NULL, NULL),
(NULL, 'Hồ Chí Minh', '1', '2', NULL, NULL),
(NULL, 'Phạm Văn Đồng', '0', '2', NULL, NULL),
(NULL, 'Phan Bội Châu', '0', '3', NULL, NULL),
(NULL, 'Phan Châu Trinh', '1', '3', NULL, NULL),
(NULL, 'Nguyễn Ái Quốc', '0', '3', NULL, NULL),
(NULL, 'Phan Chu Trinh', '0', '3', NULL, NULL),
(NULL, '3254 câu', '1', '4', NULL, NULL),
(NULL, '3260 câu', '0', '4', NULL, NULL),
(NULL, '4254 câu', '0', '4', NULL, NULL),
(NULL, '2254 câu', '0', '4', NULL, NULL),
(NULL, 'Tiền Giang', '0', '5', NULL, NULL),
(NULL, 'Hậu Giang', '0', '5', NULL, NULL),
(NULL, 'Cà Mau', '1', '5', NULL, NULL),
(NULL, 'Kiên Giang', '0', '5', NULL, NULL),
(NULL, 'Dân tộc Tày', '0', '6', NULL, NULL),
(NULL, 'Dân tộc Thái', '0', '6', NULL, NULL),
(NULL, 'Dân tộc Khơ me', '1', '6', NULL, NULL),
(NULL, 'Dân tộc Mèo', '0', '6', NULL, NULL),
(NULL, 'Đèo Ngang', '0', '7', NULL, NULL),
(NULL, 'Đèo Cả', '0', '7', NULL, NULL),
(NULL, 'Đèo Hải Vân', '1', '7', NULL, NULL),
(NULL, 'Hồ Ba Bể', '0', '7', NULL, NULL),
(NULL, 'Khổng Tử', '0', '8', NULL, NULL),
(NULL, 'Lão Tử', '1', '8', NULL, NULL),
(NULL, 'Đạo Tử', '0', '8', NULL, NULL),
(NULL, 'Hồng Tử', '0', '8', NULL, NULL),
(NULL, 'Nội dung', '0', '9', NULL, NULL);

-- Exams
INSERT INTO `exams` (`id`, `name`, `category_id`, `created_by`, `created_at`, `updated_at`) 
VALUES
(NULL, 'Trắc nghiệm về Kiến thức Văn hóa Xã hội', '1', '3', NULL, NULL),
(NULL, 'Trắc nghiệm về Kiến thức Văn hóa Xã hội 2', '1', '3', NULL, NULL),
(NULL, 'Tên', '1', '1', NULL, NULL);

-- exams_questions
INSERT INTO `exams_questions` (`exam_id`, `question_id`, `created_at`, `updated_at`) 
VALUES
('1', '1', NULL, NULL),
('1', '5', NULL, NULL),
('1', '6', NULL, NULL),
('1', '7', NULL, NULL),
('2', '2', NULL, NULL),
('2', '3', NULL, NULL),
('2', '4', NULL, NULL),
('2', '8', NULL, NULL),
('3', '9', NULL, NULL);

-- users_exams
INSERT INTO `users_exams` (`user_id`, `exam_id`, `result`, `created_at`, `updated_at`) 
VALUES
('1', '1', '10', NULL, NULL),
('2', '1', '5', NULL, NULL),
('3', '1', '7.5', NULL, NULL),
('8', '1', '2.5', NULL, NULL),
('1', '3', '0', NULL, NULL);