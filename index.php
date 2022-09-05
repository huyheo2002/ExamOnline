<?php

// tương tự include trong c++
require_once("./app/DB.php");
require_once("./app/Route.php");
require_once("./app/Auth.php");

$db = new DB();
// -> dùng để gọi method
// key => value 
// $db->dropTable("users");

include("./migrations/create_tables.php");

$router = new Route();

$router->handle($_GET["page"] ?? "");






