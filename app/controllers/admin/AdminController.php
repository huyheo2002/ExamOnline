<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";

class AdminController 
{
    public function index()
    {
        return include("./resources/view/admin/dashboard.php");
    }
}