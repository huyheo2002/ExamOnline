

<?php
require_once ("./app/Route.php");
require_once ("./app/Auth.php");

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
    // var_dump($dataLogin);
    // die;
    Auth::login($dataLogin);
});

Route::set("admin", function() {
    Route::redirect(Route::path("permission-group.index"));
});

Route::resource("permission-group", "PermissionGroupController");
Route::resource("permission", "PermissionController");
