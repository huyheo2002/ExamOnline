<?php

require_once "./app/Auth.php";
require_once "./app/Route.php";

class AdminController 
{
    public function index()
    {
        return Route::redirect(Route::path('permission-group.index'));
    }
}