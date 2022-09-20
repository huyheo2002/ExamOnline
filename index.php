<?php

require_once("./app/DB.php");
require_once("./app/Route.php");
require_once("./app/Auth.php");

include_once("./app/controllers/routes.php");
include_once "./app/controllers/gates.php"; // Phân quyền
            
Route::handle($_GET["page"] ?? "");