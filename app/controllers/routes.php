

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
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("index");        
    });

    $route->set("permission-group.show", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("show");        
    });

    $route->set("permission-group.create", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("create");        
    });

    $route->set("permission-group.store", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("store");        
    });

    $route->set("permission-group.edit", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("edit");        
    });

    $route->set("permission-group.update", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("update");        
    });

    $route->set("permission-group.delete", function() {
        // lấy class
        $className = "PermissionGroupController";
        require_once "./app/controllers/admin/".$className.".php";
        $obj = new $className();
        $obj->handle("delete");        
    });
}

