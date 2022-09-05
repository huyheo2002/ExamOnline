<?php

require_once("./app/DB.php");
require_once("./app/Route.php");

$username = !empty($_POST["username"]) ? $_POST["username"] : "";
$password = !empty($_POST["password"]) ? $_POST["password"] : "";

if(!isset($db)){
    $db = new DB();
}

// $auth = new Auth();
// $auth->login("'".$username."'", "'".$password."'", $db);
