<?php

require_once ("./app/Route.php");
require_once ("./app/Auth.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

Route::set("", function() {
    include ("./resources/view/index.php");
});

Route::set("login", function() {
    include ("./resources/view/auth/frmLogin.html");
});

Route::set("doLogin", function() {
    $dataLogin = [
        'username' => $_POST["username"],
        'password' => $_POST["password"]
    ];

    Auth::login($dataLogin);

    switch (Auth::user()['role_id'])
    {
        case 1:
            
        case 2:
            
        case 3:
            Route::redirect(Route::path("admin")); // Chuyển hướng đến đích mong muốn
            break;
        case 4:
            Route::redirect(Route::path("")); // Chuyển hướng đến đích mong muốn
            break;
    }
});

Route::set("logout", function() {
    Auth::logout();

    Route::redirect(Route::root());
});

Route::set("admin", function() {
    Route::redirect(Route::path("permission-group.index"));
});

// ql he thong
Route::resource("permission-group", "PermissionGroupController");
Route::resource("permission", "PermissionController");
Route::resource("user", "UserController");
Route::resource("role", "RoleController");
// ngan hang de thi
Route::resource("category", "CategoryController");


