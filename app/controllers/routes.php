

<?php
require_once ("./app/Route.php");
require_once ("./app/Auth.php");

if (isset($route)) {
    $route->set("", function() {
        include ("./resources/view/index.php");
    });

    $route->set("login", function() {
        include ("./resources/view/auth/frmLogin.html");
    });

    $route->set("doLogin", function() {
        $dataLogin = [
            'username' => $_POST["username"],
            'password' => $_POST["password"]
        ];
        // var_dump($dataLogin);
        // die;
        Auth::login($dataLogin);
    });

    $route->set("admin", function() {
        include ("./resources/view/layout/admin/master.php");
    });

    $route->set("permission-group.index", function() {
        // lấy view
        include ("./resources/view/layout/admin/master.php");
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("index");
    });
}

