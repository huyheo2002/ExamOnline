<?php

require_once ("./app/Route.php");
require_once ("./app/Auth.php");

Route::set("", fn() => Route::redirect(Route::path("home")));
Route::set("home", ["controllers/HomeController", "index"]);
Route::set("register", ["controllers/auth/RegisterController", "showRegisterForm"]);
Route::set("doRegister", ["controllers/auth/RegisterController", "register"]);
Route::set("login", ["controllers/auth/LoginController", "showLoginForm"]);
Route::set("doLogin", ["controllers/auth/LoginController", "login"]);
Route::set("logout", ["controllers/auth/LoginController", "logout"]);

Route::set("admin", ["controllers/admin/AdminController", "index"]);
// ql he thong
Route::resource("permission-group", "controllers/admin/PermissionGroupController");
Route::resource("permission", "controllers/admin/PermissionController");
Route::resource("user", "controllers/admin/UserController");
Route::resource("role", "controllers/admin/RoleController");
// ngan hang de thi
Route::resource("category", "controllers/admin/CategoryController");


