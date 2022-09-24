<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

include_once("./config/routes.php");
include_once "./config/gates.php"; // Phân quyền
            
Route::handle($_GET["page"] ?? "");