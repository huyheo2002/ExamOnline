<?php

// tương tự include trong c++
require_once("./app/DB.php");
require_once("./app/Route.php");
require_once("./app/Auth.php");


include_once("./app/controllers/routes.php");
Route::handle($_GET["page"] ?? "");









