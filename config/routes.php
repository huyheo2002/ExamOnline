<?php

require_once ("./app/Route.php");
require_once ("./app/Auth.php");

// All user
Route::set("", fn() => Route::redirect(Route::path("home")));
Route::set("home", ["controllers/HomeController", "index"]);
Route::set("register", ["controllers/auth/RegisterController", "showRegisterForm"]);
Route::set("doRegister", ["controllers/auth/RegisterController", "register"]);
Route::set("login", ["controllers/auth/LoginController", "showLoginForm"]);
Route::set("doLogin", ["controllers/auth/LoginController", "login"]);
Route::set("logout", ["controllers/auth/LoginController", "logout"]);
Route::set("profile.show", ["controllers/HomeController", "showProfile"]);
Route::set("profile.edit", ["controllers/HomeController", "editProfile"]);
Route::set("profile.update", ["controllers/HomeController", "updateProfile"]);
Route::set("test.index", ["controllers/HomeController", "indexTest"]);
Route::set("test.take", ["controllers/HomeController", "takeTest"]);
Route::set("test.eval", ["controllers/HomeController", "evalTest"]);

// Admin only
Route::set("admin", ["controllers/admin/AdminController", "index"]);
// Quản lý hệ thống
Route::resource("permission-group", "controllers/admin/PermissionGroupController");
Route::resource("permission", "controllers/admin/PermissionController");
Route::resource("user", "controllers/admin/UserController");
Route::resource("role", "controllers/admin/RoleController");
// Quản lý đề thi
Route::resource("category", "controllers/admin/CategoryController");
Route::resource("question", "controllers/admin/QuestionController");
Route::resource("exam", "controllers/admin/ExamController");

// AJAX
Route::set("getQuestionsFromCategory", ["controllers/AJAXController", "getQuestionsFromCategory"]);
Route::set("getExamsFromCategory", ["controllers/AJAXController", "getExamsFromCategory"]);