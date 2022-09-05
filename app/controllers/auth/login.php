<?php

require_once("./app/Database.php");
require_once("./app/Auth.php");
require_once("./app/Route.php");

$username = !empty($_POST["username"]) ? $_POST["username"] : "";
$password = !empty($_POST["password"]) ? $_POST["password"] : "";

if(!isset($db)){
    $db = new Database();
}

$auth = new Auth();
$auth->login("'".$username."'", "'".$password."'", $db);
