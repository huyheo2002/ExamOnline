<?php

require_once "./app/Gate.php";
require_once "./app/DB.php";
require_once "./app/Auth.php";

// Lấy toàn bộ permission từ database
$sql = "SELECT * FROM `permissions`";
$globalPermissions = DB::execute($sql);

if (Auth::check()) { // Đã đăng nhập
    // Lấy các permission mà user có
    $sql = "SELECT `permissions`.* FROM `roles_permissions`, `permissions` WHERE ((`roles_permissions`.`role_id` = :role_id) AND (`permissions`.`id` = `roles_permissions`.`permission_id`))";
    $userPermissions = DB::execute($sql, [
        "role_id" => Auth::user()["role_id"],
    ]);
    $userPermissionIds = array_map(fn($userPermission) => $userPermission["id"], $userPermissions);

    // Phân quyền
    foreach ($globalPermissions as $globalPermission) {
        Gate::set($globalPermission["key"], fn() => in_array($globalPermission["id"], $userPermissionIds));
    }
} else { // Chưa đăng nhập
    // Không có quyền gì hết
    foreach ($globalPermissions as $globalPermission) {
        Gate::set($globalPermission["key"], fn() => false);
    }
}